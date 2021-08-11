<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vmsModel');
        $this->load->library('form_validation');
        // $this->load->helper('flashData');
    }
    
    public function index()
    {
        if($this->session->userdata('status') AND $this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }else if($this->session->userdata('status') AND $this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('username','Username', 'trim|required', array('required'=>'Username tidak boleh kosong'));
        $this->form_validation->set_rules('password','Password', 'trim|required', array('required'=>'Password tidak boleh kosong'));
        if($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }else{
            $user = $this->input->post('username', true);
            $pass = $this->input->post('password', true);
            $data = array(
                'Username' => $user
            );
            $login = $this->vmsModel->getById('tablepetugas', $data);
            if(password_verify($pass, $login[0]['PasswordPetugas'])){
                foreach ($login as $result) {
                    $data = array(
                        'IdPetugas' => $result['IdPetugas'],
                        'Nama' => $result['NamaPetugas'],
                        'status' => 'login',
                        'role'=> 'petugas'
                    );
                }
                $this->session->set_userdata($data);
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Melakukan Login',
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vmsModel->insert($data, 'tablelog');
                redirect(base_url('Dashboard'));
            }else{
                $this->session->set_flashdata('pesan','gagal');
                redirect('Auth');
            }
        }
    }

    public function pengguna(){
        if($this->session->userdata('status') AND $this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }else if($this->session->userdata('status') AND $this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('username','Username', 'trim|required', array('required'=>'Username tidak boleh kosong'));
        $this->form_validation->set_rules('password','Password', 'trim|required', array('required'=>'Password tidak boleh kosong'));
        if($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }else{
            $user = $this->input->post('username', true);
            $pass = $this->input->post('password', true);
            $data = array(
                'NIK' => $user
            );
            $login = $this->vmsModel->getById('tablepengguna', $data);
            if(password_verify($pass, $login[0]['PasswordPengguna'])){
                foreach ($login as $result) {
                    $data = array(
                        'IdPengguna' => $result['IdPengguna'],
                        'NIK' => $result['NIK'],
                        'status' => 'login',
                        'role'=> 'pengguna'
                    );
                }
                $this->session->set_userdata($data);
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('NIK'),
                    'LogDes' => 'Melakukan Login',
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vmsModel->insert($data, 'tablelog');
                redirect(base_url('Dashboard/pengguna'));
            }else{
                $this->session->set_flashdata('pesan','gagal');
                redirect('Auth/Pengguna');
            }
        }
    }

    public function admin(){
        if($this->session->userdata('status') AND $this->session->userdata('role') === 'admin'){
            redirect(base_url('Admin/admin'));
        }
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_rules('username','Username', 'trim|required', array('required'=>'Username tidak boleh kosong'));
        $this->form_validation->set_rules('password','Password', 'trim|required', array('required'=>'Password tidak boleh kosong'));
        if($this->form_validation->run() == FALSE){
            $this->load->view('admin');
        }else{
            $user = $this->input->post('username', true);
            $pass = $this->input->post('password', true);
            $data = array(
                'Username' => $user
            );
            $login = $this->vmsModel->getById('tablepetugas', $data);
            if(password_verify($pass, $login[0]['PasswordPetugas'])){
                foreach ($login as $result) {
                    $data = array(
                        'IdPetugas' => $result['IdPetugas'],
                        'Nama' => $result['NamaPetugas'],
                        'status' => 'login',
                        'role'=> 'admin'
                    );
                }
                $this->session->set_userdata($data);
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Melakukan Login',
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vmsModel->insert($data, 'tablelog');
                redirect(base_url('Admin/dashboard'));
            }else{
                $this->session->set_flashdata('pesan','gagal');
                redirect('Auth/admin');
            }
        }
    }

    public function logout()
    {
        $author='';
        if($this->session->userdata('NIK')){
            $author = $this->session->userdata('NIK');
        }else{
            $author = $this->session->userdata('Nama');
        }
        $data = array(
            'IdLog' => '',
            'LogAuthor' => $this->session->userdata('role').' | '.$author,
            'LogDes' => 'Melakukan Logout',
            'LogCreated' => date('Y-m-d H:i:s')    
        );
        $this->vmsModel->insert($data, 'tablelog');
        $this->session->sess_destroy();
        redirect('Auth');
    }
	

    

    
}
