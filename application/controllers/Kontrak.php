<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('flashData');
        $this->load->model('vmsModel','vm');
    }
    
    public function index(){
        $data['warga'] = $this->vm->getSelectData('IdWarga, Nama', 'tablewarga'); 
        template('kontrak/index', $data);
    }

    public function tambah(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('id_warga','Nama Warga','trim|required',[
            'required' => '%s tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('id_rumah','No Rumah','trim|required',[
            'required' => '%s tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jml_bulan','Jumlah Bulan','trim|required',[
            'required' => '%s tidak boleh kosong'
        ]);
        if($this->form_validation->run() == FALSE){
            $data['warga'] = $this->vm->getSelectData('IdWarga, Nama', 'tablewarga'); 
            $data['rumah'] = $this->vm->getSelectWhereData('IdRumah, NoRumah', 'tablerumah', ['StatusRumah'=>'kontrak']); 
            template('kontrak/tambah', $data);
        }else{
           $waktu = new DateTime();
           $id = $waktu->getTimestamp();
           $data = [
               'IdKontrak' => $id,
               'IdWarga' => $this->input->post('id_warga',true),
               'IdRumah' => $this->input->post('id_rumah',true),
               'JmlBulanKontrak' => $this->input->post('jml_bulan',true),
               'TanggalMasuk' => $waktu->format('Y-m-d'),
               'TanggalKeluar' => $waktu->modify('+'.$this->input->post('jml_bulan',true).' months')->format('Y-m-d'),
               'StatusKontrak' => 'baru',
           ];
           $tagihan = [
               'IdPemilikRumah' => $id,
               'IdWarga' => $this->input->post('id_warga',true),
               'StatusRumah' => 'kontrak'
           ];
           if($this->vm->insert($data, 'tablekontrak') && $this->vm->insert($tagihan, 'tabletagihan')){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Menambahkan Data pada TABLEKONTRAK | no rumah = '.$this->input->post('id_rumah',true).' dan nama warga =  '.$this->input->post('id_warga').' selama = '.$this->input->post('jml_bulan',true).'bulan, masuk pada tanggal '.$waktu->format('Y-m-d'),
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vm->insert($data, 'tablelog');
            $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'kontrak', 'type'=>'insert']);
            redirect(base_url('Kontrak'));
            }else{
            $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'kontrak', 'type'=>'insert']);
            redirect(base_url('Kontrak'));
            }
        }
    }

    public function get_data_rumahkontrak(){
        $kontrak = $this->vm->getJoinKontrak('tablewarga.IdWarga, tablekontrak.IdKontrak, tablerumah.IdRumah, Nama, NoRumah, JmlBulanKontrak, TanggalMasuk', ['IdKontrak'=>$this->input->post('id',true)])->result();
        if($kontrak){
            foreach ($kontrak as $k) {
                $data = [
                    'id_warga' => $k->IdWarga,
                    'id_kontrak' => $k->IdKontrak,
                    'id_rumah' =>$k->IdRumah,
                    "nama" => $k->Nama,
                    'no_rumah' => $k->NoRumah,
                    'jml_bulan' => $k->JmlBulanKontrak,
                    'tgl_masuk' => $k->TanggalMasuk
                ];
            }
        }else{
            $data = $kontrak;
        }
        echo json_encode($data);
    }

    public function update(){
        $waktu = new DateTime($this->input->post('tgl_masuk',true));
        $data = [
            "IdWarga" => $this->input->post('id_warga',true),
            "IdRumah" => $this->input->post('id_rumah',true),
            "JmlBulanKontrak" => $this->input->post('jml_bulan',true),
            "TanggalKeluar" => $waktu->modify('+'.$this->input->post('jml_bulan',true).' months')->format('Y-m-d')
        ];
        if($this->vm->update('tablekontrak', ['IdKontrak'=>$this->input->post('id_kontrak',true)], $data)){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Merubah Data pada TABLEKONTRAK |rumah. '.$this->input->post('id_rumah',true).' dan warga '.$this->input->post('id_warga').' menjadi selama = '.$this->input->post('jml_bulan',true).'bulan',
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vm->insert($data, 'tablelog');
            $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'kontrak', 'type'=>'update']);
            redirect(base_url('Kontrak'));
        }else{
            $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'kontrak', 'type'=>'update']);
            redirect(base_url('Kontrak'));
        }
    }

    public function selesai_kontrak(){
        $waktu = new DateTime();
        $data = [
            'TanggalKeluar' => $waktu->format('Y-m-d'),
            'StatusKontrak' => 'selesai'
        ];
        if($this->vm->update('tablekontrak',['IdKontrak'=>$this->input->post('id', true)], $data)){
            $this->vm->delete('tabletagihan', ['IdPemilikRumah'=>$this->input->post('id', true)]);
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Merubah Data pada TABLEKONTRAK |idkontrak. '.$this->input->post('id',true).'status kontrak menjadi selesai',
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vm->insert($data, 'tablelog');
            $data = array('pesan'=>'berhasil');
        }
        echo json_encode($data);
    }
}