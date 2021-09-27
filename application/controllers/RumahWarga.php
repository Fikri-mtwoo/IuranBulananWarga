<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RumahWarga extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('flashData');
        $this->load->model('vmsModel','vm');
    }
    
    public function index(){
        $data['warga'] = $this->vm->getSelectData('IdWarga, Nama', 'tablewarga'); 
        template('rumahwarga/index', $data);
    }
    public function tambah(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('id_warga','','trim|required',[
            'required' => 'Nama Warga tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('id_rumah','','trim|required',[
            'required' => 'No Rumah tidak boleh kosong'
        ]);
        if($this->form_validation->run() == FALSE){
            $data['warga'] = $this->vm->getSelectData('IdWarga, Nama', 'tablewarga'); 
            $data['rumah'] = $this->vm->getSelectWhereData('IdRumah, NoRumah', 'tablerumah', ['StatusRumah'=>'tetap']); 
            template('rumahwarga/tambah', $data);
        }else{
            $waktu = new DateTime();
            $id = $waktu->getTimestamp();
            $data = [
                'IdRWarga' => $id,
                'IdWarga' => $this->input->post('id_warga',true),
                'IdRumah' => $this->input->post('id_rumah',true)
            ];           
            $tagihan = [
                'IdPemilikRumah' => $id,
                'IdWarga' => $this->input->post('id_warga',true)
            ];
            if($this->vm->insert($data, 'tablerwarga')){
                $cek_tagihan = $this->vm->getSelect('', 'tabletagihan', ['IdWarga'=>$this->input->post('id_warga',true)]);
                if($cek_tagihan == null){
                    $this->vm->insert($tagihan, 'tabletagihan');
                }
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Menambahkan Data pada TABELRWARGA |'.$this->input->post('id_rumah',true).'dan'.$this->input->post('id_warga'),
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vm->insert($data, 'tablelog');
                $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'rumahwarga', 'type'=>'insert']);
                redirect(base_url('RumahWarga'));
            }else{
                $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'rumahwarga', 'type'=>'insert']);
                redirect(base_url('RumahWarga'));
            }
        }
    }
    public function get_data_rumahwarga(){
        $rws = $this->vm->getJoinRumahWarga($this->input->post('id',true));
        if($rws){
            foreach ($rws as $rw) {
                $data = [
                    'id_rm' => $rw['IdRWarga'],
                    'id_warga'=>$rw['IdWarga'],
                    'id_rumah'=>$rw['IdRumah'],
                    'warga'=>$rw['Nama'],
                    'rumah'=>$rw['NoRumah']
                ];
            }
        }else{
            $data = $rws;
        }
        echo json_encode($data);
    }
    public function update(){
        $data = [
            "IdWarga" => $this->input->post('id_warga',true),
            "IdRumah" => $this->input->post('id_rumah',true)
        ];
        $tagihan = [
            'IdPemilikRumah' => $this->input->post('idrw',true),
            'IdWarga' => $this->input->post('id_warga',true)
        ];
        if($this->vm->update('tablerwarga', ['IdRWarga'=>$this->input->post('idrw',true)], $data)){
            $cek_pemilik = $this->vm->getSelect('', 'tablerwarga', ['IdWarga'=>$this->input->post('id_warga_lama',true)]);
            if($cek_pemilik == null){
                $cek_tagihan = $this->vm->getSelect('', 'tabletagihan', ['IdWarga'=>$this->input->post('id_warga',true)]);
                if($cek_tagihan == null){
                    $this->vm->delete('tabletagihan', ['IdWarga'=>$this->input->post('id_warga_lama',true)]);
                    $this->vm->insert($tagihan, 'tabletagihan');
                }else{
                    $this->vm->delete('tabletagihan', ['IdWarga'=>$this->input->post('id_warga_lama',true)]);
                }
            }else{
                $cek_tagihan = $this->vm->getSelect('', 'tabletagihan', ['IdWarga'=>$this->input->post('id_warga',true)]);
                if($cek_tagihan == null){
                    $this->vm->insert($tagihan, 'tabletagihan');
                }
            }
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Merubah Data pada TABELRWARGA |rumah. '.$this->input->post('id_rumah',true).' dan warga '.$this->input->post('id_warga'),
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vm->insert($data, 'tablelog');
            $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'rumahwarga', 'type'=>'update']);
            redirect(base_url('RumahWarga'));
        }else{
            $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'rumahwarga', 'type'=>'update']);
            redirect(base_url('RumahWarga'));
        }
    }
}