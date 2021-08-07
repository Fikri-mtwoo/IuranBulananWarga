<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('flashData');
        $this->load->model('vmsModel','vm');
    }
    public function index(){
        template('iuran/index', null);
    }
    public function tambah(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('total','','trim|required',[
            'required' => 'Total Iuran tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('rincian','','trim|required',[
            'required' => 'Rincian Total tidak boleh kosong'
        ]);
        if($this->form_validation->run() == FALSE){ 
            template('iuran/tambah', null);
        }else{
           $data = [
               'TotalIuran' => $this->input->post('total', true),
               'RincianIuran' => $this->input->post('rincian', true),
               'TanggalBuat' => date('Y-m-d H:i:s')
           ];
           if($this->vm->insert($data, 'tableiuran')){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Menambahkan Data pada TABELIURAN | dengan total iuran '.$this->input->post('total',true),
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vm->insert($data, 'tablelog');
            $this->session->set_flashdata('flash','berhasil');
            redirect(base_url('Iuran'));
            }else{
            $this->session->set_flashdata('flash','gagal');
            redirect(base_url('Iuran'));
            }
        }
    }
}