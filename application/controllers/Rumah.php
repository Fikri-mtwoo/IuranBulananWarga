<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('flashData');
        $this->load->model('vmsModel','vm');
    }
    public function index(){
        template('rumah/rumah',null);
    }
    public function tambahDataRumah(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('no_rumah','No Rumah','trim|required',[
            'required' => 'No Rumah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('status_rumah','Status Rumah','trim|required',[
            'required' => '%s tidak boleh kosong'
        ]);
        if($this->form_validation->run() == FALSE){
            template('rumah/tambah', null);
        }else{
            $data = [
                'NoRumah' => $this->input->post('no_rumah',true),
                'StatusRumah' => $this->input->post('status_rumah', true)
            ];
            if($this->vm->insert($data, 'tablerumah')){
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Menambahkan Data pada TABELRUMAH |rumah = . '.$this->input->post('no_rumah',true).' status rumah = '.$this->input->post('status_rumah', true),
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vm->insert($data, 'tablelog');
                $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'rumah', 'type'=>'insert']);
                redirect(base_url('Rumah'));
            }else{
                $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'rumah', 'type'=>'insert']);
                redirect(base_url('Rumah'));
            }
        }
    }
    public function get_data_rumah(){
        $rumah = $this->vm->getById('tablerumah',['IdRumah'=>$this->input->post('id',true)]);
        if($rumah){
            foreach ($rumah as $r) {
                $data = [
                    'id_rumah'=>$r['IdRumah'],
                    'no_rumah'=>$r['NoRumah'],
                    'status_rumah'=>$r['StatusRumah']
                ];
            }
        }else{
            $data = $rumah;
        }
        echo json_encode($data);
    }
    public function update_data_rumah(){
        $data = [
            "NoRumah" => $this->input->post('no_rumah',true),
            'StatusRumah' => $this->input->post('status_rumah',true)
        ];
        if($this->vm->update('tablerumah', ['IdRumah'=>$this->input->post('id_rumah')], $data)){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Merubah Data pada TABELRUMAH |rumah. '.$this->input->post('id_rumah',true),
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vm->insert($data, 'tablelog');
            $this->session->set_flashdata(['flash'=>'berhasil', 'name'=>'rumah', 'type'=>'update']);
            redirect(base_url('Rumah'));
        }else{
            $this->session->set_flashdata(['flash'=>'gagal', 'name'=>'rumah', 'type'=>'update']);
            redirect(base_url('Rumah'));
        }
    }





    public function nik_validate(){
        if($this->input->post('nik',true) === 'none'){
            $this->form_validation->set_message('nik_validate','Nama warga tidak boleh kosong');
            return false;
        }else{
            return true;
        }
    }
}