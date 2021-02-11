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
            $data['bulan'] = $this->vmsModel->getAll('tablebulaniuran');
            $data['petugas'] = $this->vmsModel->getAll('tablepetugas');
            
            template('dashboard', $data);            
        }else{
            $nik            = $this->input->post('nik',true);
            $bulan          = $this->input->post('bulan',true);
            $petugas        = $this->input->post('petugas',true);
            $jmlbayar       = $this->input->post('jmlbayar',true);
            $tanggalbayar   = date('Y-m-d');
            $IdTransaksi    = IdTransaksi();
            $data = array(
            'IdTransaksi'=> $IdTransaksi,
            'NIK'=> $this->encryption->decrypt($nik),
            'IdBulan'=> $this->encryption->decrypt($bulan),
            'IdPetugas'=> $this->encryption->decrypt($petugas),
            'JmlBayar'=> $jmlbayar,
            'TanggalBayar'=> $tanggalbayar
        );
            if($this->vmsModel->insert($data, 'tabletransaksi')){
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Menambahkan Transaksi |sebesar Rp. '.$jmlbayar.' atas nama = '.$this->encryption->decrypt($nik),
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vmsModel->insert($data, 'tablelog');
                $this->session->set_flashdata('flash','berhasil');
                redirect(base_url('Dashboard'));
            }else{
                $this->session->set_flashdata('flash','gagal');
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
}