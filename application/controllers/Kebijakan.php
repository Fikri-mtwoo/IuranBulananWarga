<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebijakan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('flashData');
        $this->load->model('vmsModel','vm');
    }

    public function index(){
        template('kebijakan/index', null);
    }

    public function tambah(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('id_warga','Nama Warga','trim|required',[
            'required' => '%s tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('keterangan','Keterangan Kebijakan','trim|required',[
            'required' => '%s tidak boleh kosong'
        ]);
        if($this->form_validation->run() == false){
            $data['warga'] = $this->vm->getJoinTagihan('tablewarga.IdWarga, Nama')->result_array();
            template('kebijakan/tambah',$data);
        }else{ 
            $data = [
                'IdWarga' => $this->input->post('id_warga', true),
                'Keterangan' => $this->input->post('keterangan', true)
            ];
            if($this->vm->insert($data, 'tablekebijakan')){
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Menambahkan Data pada TABLEKEBIJAKAN | nama warga =  '.$this->input->post('id_warga', true).' keterangan = '.$this->input->post('keterangan',true),
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vm->insert($data, 'tablelog');
                $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'kebijakan', 'type'=>'insert']);
                redirect(base_url('Kebijakan'));
                }else{
                $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'kebijakan', 'type'=>'insert']);
                redirect(base_url('Kebijakan'));
                }
        }
    }

    public function hapus_data_kebijakan(){
        if($this->vm->delete('tablekebijakan', ['IdKebijakan'=>$this->input->post('id', true)])){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Menghapus Data pada TABLEKEBIJAKAN | nama warga =  '.$this->input->post('id_warga', true),
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vm->insert($data, 'tablelog');
            $data = array('pesan'=>'berhasil');
        }
        echo json_encode($data);
    }
}