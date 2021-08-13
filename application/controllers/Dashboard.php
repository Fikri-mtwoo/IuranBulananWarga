<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('vmsModel');
        $this->load->library('form_validation');
        $this->load->helper('flashData');
    }

    public function index()
	{
        $this->load->library('encryption');
        if (!$this->session->userdata('status')) {
            redirect(base_url('Auth'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        if($this->session->userdata('role') === 'admin'){
            redirect(base_url('Dashboard/admin'));
        }
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('nik','Nama Warga','trim|required|callback_nik_validate');
        $this->form_validation->set_rules('bulan','Bulan','trim|required|callback_bulan_validate');
        // $this->form_validation->set_rules('petugas','Petugas','trim|required|callback_petugas_validate');
        $this->form_validation->set_rules('jmlbayar','Jumlah Bayar','trim|required', array('required'=>'Jumlah bayar tidak boleh kosong'));
        
        if($this->form_validation->run() == FALSE){
            $data['warga'] = $this->vmsModel->getAll('tablewarga');
            
            template('dashboard', $data);            
        }else{
            $idwarga        = $this->encryption->decrypt($this->input->post('nik',true));
            $idbulan        = $this->input->post('bulan',true);
            $idtahun        = $this->input->post('tahun',true);
            $idpetugas      = $this->session->userdata('IdPetugas');
            $jmlbayar       = $this->input->post('jmlbayar',true);
            $tanggalbayar   = date('Y-m-d H:i:s');
            $IdTransaksi    = $this->encryption->decrypt($this->input->post('transaksi',true));
            $data = array(
            'IdPetugas'=> $idpetugas,
            'JmlBayar'=> $jmlbayar,
            'TanggalBayar'=> $tanggalbayar
            );
            if($this->vmsModel->update('tabletransaksi',['IdTransaksi'=>$IdTransaksi, 'Idwarga'=>$idwarga, 'IdBulan'=>$idbulan, 'IdTahun'=>$idtahun],$data)){
                $data = array(
                    'IdLogTransaksi' => '',
                    'LogAuthorTransaksi' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogKetTransaksi' => 'Merubah TABLETRANSAKSI |sebesar Rp. '.$jmlbayar.' idwarga = '.$idwarga.'idtransaksi = '.$IdTransaksi,
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vmsModel->insert($data, 'tablelogtransaksi');
                $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'transaksi','type'=>'update']);
                redirect(base_url('Dashboard'));
            }else{
                $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'transaksi','type'=>'update']);
                redirect(base_url('Dashboard'));
            }
        }    
    }

    public function histori_transaksi(){
        if (!$this->session->userdata('status')) {
            redirect(base_url('Auth'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        if($this->session->userdata('role') === 'admin'){
            redirect(base_url('Dashboard/admin'));
        }
        template('histori_transaksi', $data=null); 
    }

    public function pengguna(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/pengguna'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'admin'){
            redirect(base_url('Dashboard/admin'));
        }
        $data['warga'] = $this->vmsModel->getSelect(array('NIK'=>$this->session->userdata('NIK')));
        $data['pengguna'] = $this->vmsModel->getJoin($data['warga']->Nama);
        $data['total'] = $this->vmsModel->getSum('tabletransaksi', array('NIK'=>$this->session->userdata('NIK')));
        template('pengguna', $data);
    }


    public function nik_validate(){
        if($this->input->post('nik') === 'none'){
            $this->form_validation->set_message('nik_validate','Nama warga tidak boleh kosong');
            return false;
        }else{
            return true;
        }
    }
    public function bulan_validate(){
        if($this->input->post('bulan') === 'none'){
            $this->form_validation->set_message('bulan_validate','Bulan tidak boleh kosong');
            return false;
        }else{
            return true;
        }
    }
    public function petugas_validate(){
        if($this->input->post('petugas') === 'none'){
            $this->form_validation->set_message('petugas_validate','Petugas tidak boleh kosong');
            return false;
        }else{
            return true;
        }
    }


    public function get_bulan(){
        $this->load->library('encryption');
        $id = $this->encryption->decrypt($this->input->post('id', true));
        $bulan = $this->vmsModel->getSelectWhereData('IdBulan, IdTahun','tabletransaksi',['Idwarga'=>$id, 'JmlBayar'=>null]);
        if($bulan){
            foreach ($bulan as $b) {
                $data [] = [
                    'warga' =>$this->input->post('id', true),
                    'iBulan'=> $b['IdBulan'],
                    'iTahun'=> $b['IdTahun'],
                    'bulan' => bulan($b['IdBulan']),
                    'tahun' => tahun($b['IdTahun'])
                ];
            }
        }else{
            $data = 'false';
        }
        echo json_encode($data);
    }
    public function get_iuran(){
        $this->load->library('encryption');
        $id = $this->encryption->decrypt($this->input->post('id', true));
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        $iurans = $this->vmsModel->getSelectWhereData('IdTransaksi, IdIuran','tabletransaksi',['IdWarga'=>$id, 'IdBulan'=>$bulan, 'IdTahun'=>$tahun]);
        $iuran = $this->vmsModel->getSelectWhereData('TotalIuran','tableiuran',['IdIuran'=>$iurans[0]['IdIuran']]);
        if($iuran){
            $data = [
                'transaksi' => $this->encryption->encrypt($iurans[0]['IdTransaksi']),
                'iuran' => $iuran[0]['TotalIuran']
            ];
        }else{
            $data = 'false';
        }
        echo json_encode($data);
    }
}