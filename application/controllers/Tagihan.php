<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('flashData');
        $this->load->model('vmsModel','vm');
    }

    public function index(){
        template('tagihan/index', null);
    }

    public function tambah(){
        $idtransaksi = 'TRS'.date('y').''.date('m').''.date('d');
        $warga = $this->vm->getJoinTagihanWarga('tabletagihan.IdWarga, Keterangan')->result_array();
        $idiuran = $this->vm->getSelectData('MAX(IdIuran) as IdIuran','tableiuran');
        $iuran = $this->vm->getSelectWhereData('IdIuran','tableiuran',['IdIuran'=>$idiuran[0]['IdIuran']]);
        $tahun = $this->vm->getSelectWhereData('IdTahunIuran','tabletahuniuran',['IdTahunIuran'=>$this->vm->getSelectData('MAX(IdTahunIuran) as IdTahunIuran','tabletahuniuran')[0]['IdTahunIuran']]);
        $no=1;
        $data = [];
        $cek = $this->vm->getSelectGroup('*','tabletransaksi','InputTransaksi',['Idbulan'=>date('m'), 'IdTahun'=>$tahun[0]['IdTahunIuran']]);
        if($cek < 1){
            foreach ($warga as $wrg) {
                if($wrg['Keterangan'] !== null){
                    $data [] = [
                        'IdTransaksi' => $idtransaksi."".$wrg['IdWarga'],
                        'IdWarga' => $wrg['IdWarga'],
                        'NIK' => null,
                        'IdIuran' =>$iuran[0]['IdIuran'],
                        'IdBulan' => date('m'),
                        'IdTahun' => $tahun[0]['IdTahunIuran'],
                        'IdPetugas' => $this->session->userdata('IdPetugas'),
                        'JmlBayar' => 0,
                        'TanggalBayar' => date('Y-m-d H:i:s'),
                        'InputTransaksi' => date('Y-m-d H:i:s'),
                        'Keterangan' => 'Gratis'
        
                    ];
                }else{
                    $data [] = [
                        'IdTransaksi' => $idtransaksi."".$wrg['IdWarga'],
                        'IdWarga' => $wrg['IdWarga'],
                        'NIK' => null,
                        'IdIuran' =>$iuran[0]['IdIuran'],
                        'IdBulan' => date('m'),
                        'IdTahun' => $tahun[0]['IdTahunIuran'],
                        'IdPetugas' => null,
                        'JmlBayar' => null,
                        'TanggalBayar' => null,
                        'InputTransaksi' => date('Y-m-d H:i:s'),
                        'Keterangan' => null        
                    ];

                }
                $log [] = array(
                    'IdLogTransaksi' => '',
                    'LogAuthorTransaksi' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogKetTransaksi' => 'Menambah Data pada TABLETRANSAKSI | data IdWarga = '.$wrg['IdWarga'],
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                // $no++;
            }
            $hasil = $this->vm->insertBatch($data,'tabletransaksi');
            if($hasil){
                    $this->vm->insertBatch($log,'tablelogtransaksi');
                    $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'transaksi', 'type'=>'insert']);
                    redirect(base_url('Admin/datatransaksi'));
                }else{
                    $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'transaksi', 'type'=>'insert']);
                    redirect(base_url('Admin/datatransaksi'));
                }
        }else{
            $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'transaksi', 'type'=>'cek']);
            redirect(base_url('Admin/datatransaksi'));
        }
        // var_dump($cek);
            // var_dump($data);
    }
}