<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('flashData');
        $this->load->library('form_validation');
        $this->load->model('vmsModel','vms');
    }

    public function admin(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/admin'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }

        $this->form_validation->set_rules('nik','NIK','trim|required|max_length[16]|is_unique[tablewarga.nik]');
        $this->form_validation->set_rules('no_rumah','No.Rumah','trim|required');
        $this->form_validation->set_rules('nama','Nama Warga','trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        if($this->form_validation->run() == FALSE){
            template('utama', $data='');
        }else{
            $nik = $this->input->post('nik', true);
            $nama = $this->input->post('nama', true);
            $no_rumah = $this->input->post('no_rumah', true);
            $data = array(
                'NIK'=>$nik,
                'Nama'=>$nama,
                'NoRumah'=>$no_rumah
            );
            if($this->vms->insert($data, 'tablewarga')){
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Menambahkan Data pada TABLEWARGA | data NIK = '.$nik,
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vms->insert($data, 'tablelog');
                $this->session->set_flashdata('flash','berhasil');
                redirect(base_url('Admin/admin'));
            }
        }
    }

    public function akunpetugas(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/admin'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        
        $this->form_validation->set_rules('nik','Nama Warga','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        if($this->form_validation->run() == FALSE){
            $data['warga'] = $this->vms->getAll('tablewarga');
            template('akun_petugas', $data);
        }else{
            $data = explode('/', $this->input->post('nik',true));
            $nik = $data[0];
            $nama = $data[1];
            $username = $this->input->post('username', true);
            $password = password_hash($this->input->post('password', true), PASSWORD_BCRYPT);
            $data = array(
                'IdPetugas'=> '',
                'NIK'=>$nik,
                'NamaPetugas'=>$nama,
                'Username'=>$username,
                'PasswordPetugas'=>$password
            );

            if($this->vms->insert($data, 'tablepetugas')){
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Menambahkan Data pada TABLEPETUGAS | data NIK = '.$nik,
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vms->insert($data, 'tablelog');
                $this->session->set_flashdata('flash','berhasil');
                redirect(base_url('Admin/akunpetugas'));
            }
        }
    }

    public function akunpengguna(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/admin'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }

        $this->form_validation->set_rules('nik','Nama Warga','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        if($this->form_validation->run() == FALSE){
            $data['warga'] = $this->vms->getAll('tablewarga');
            template('akun_pengguna', $data);
        }else{
            $nik = $this->input->post('nik', true);
            $password = password_hash($this->input->post('password', true), PASSWORD_BCRYPT);
            $data = array(
                'Idpengguna'=>'',
                'NIK'=>$nik,
                'PasswordPengguna'=>$password
            );

            if($this->vms->insert($data, 'tablepengguna')){
                $data = array(
                    'IdLog' => '',
                    'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                    'LogDes' => 'Menambahkan Data pada TABLEPENGGUNA | data NIK = '.$nik,
                    'LogCreated' => date('Y-m-d H:i:s')    
                );
                $this->vms->insert($data, 'tablelog');
                $this->session->set_flashdata('flash','berhasil');
                redirect(base_url('Admin/akunpengguna'));
            }
        }
    }

    public function datawarga(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/admin'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        // $data['warga'] = $this->vms->getAll('tablewarga');
            template('data_warga', $data=null);
           
    }

    public function update_data_warga(){
        $nik = $this->input->post('nik', true);
        $nama = $this->input->post('nama', true);
        $no_rumah = $this->input->post('no_rumah', true);
        $data = array(
            'Nama'=>$nama,
            'NoRumah'=>$no_rumah
        );
        if($this->vms->update('tablewarga',array('NIK'=>$nik),$data)){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Merubah Data pada TABLEWARGA | data NIK = '.$nik,
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vms->insert($data, 'tablelog');
            $this->session->set_flashdata('flash','berhasil');
            redirect(base_url('Admin/datawarga'));
        }
    }

    public function delete_data_warga(){
        $nik = $this->input->post('nik', true);
        $data = array(
            'NIK'=>$nik
        );
        if($this->vms->delete('tablewarga',$data)){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Menghapus Data pada TABLEWARGA | data NIK = '.$nik,
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vms->insert($data, 'tablelog');
            $data = array('pesan'=>'berhasil');
        }
        echo json_encode($data);
    }

    public function get_data_warga(){
        $id = $this->input->post('id',true);
        $warga = $this->vms->getById('tablewarga',array('NIK'=>$id));
        if($warga){
            foreach ($warga as $w) {
                $data = array(
                    'nik'=>$w['NIK'],
                    'namawarga'=>$w['Nama'],
                    'no_rumah'=>$w['NoRumah']
                );
            }
        }else{
            $data = $warga;
        }
        echo json_encode($data);
    }

    public function dataakunpetugas(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/admin'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        template('data_akun_petugas', $data='');
    }

    public function update_data_petugas(){
        $id = $this->input->post('id_petugas', true);
        $nama_petugas = $this->input->post('nama_petugas', true);
        $nik_petugas = $this->input->post('nik_petugas', true);
        $username_petugas = $this->input->post('username', true);
        $password_lama = $this->input->post('password_lama', true);
        $password_baru = $this->input->post('password_baru', true);
        
        if($password_baru == ''){
            $password_baru = $password_lama;
        }else{
            $password_baru = password_hash($password_baru, PASSWORD_BCRYPT);
        }
        $data = array(
            'NIK'=>$nik_petugas,
            'NamaPetugas'=>$nama_petugas,
            'Username'=>$username_petugas,
            'PasswordPetugas'=>$password_baru
        );
        if($this->vms->update('tablepetugas',array('IdPetugas'=>$id),$data)){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Merubah Data pada TABLEPETUGAS | data NIK = '.$nik_petugas,
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vms->insert($data, 'tablelog');
            $this->session->set_flashdata('flash','berhasil');
            redirect(base_url('Admin/dataakunpetugas'));
        }
    }

    public function delete_data_petugas(){
        $id = $this->input->post('id', true);
        $nik = $this->input->post('nik', true);
        $data = array(
            'IdPetugas'=>$id
        );
        if($this->vms->delete('tablepetugas',$data)){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Menghapus Data pada TABLEPETUGAS | data NIK = '.$nik,
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vms->insert($data, 'tablelog');
            $data = array('pesan'=>'berhasil');
        }
        echo json_encode($data);
    }

    public function get_data_petugas(){
        $id = $this->input->post('id',true);
        $petugas = $this->vms->getById('tablepetugas',array('IdPetugas'=>$id));
        if($petugas){
            foreach ($petugas as $p) {
                $data = array(
                    'id_petugas'=>$p['IdPetugas'],
                    'nik_petugas'=>$p['NIK'],
                    'nama_petugas'=>$p['NamaPetugas'],
                    'username_petugas'=>$p['Username'],
                    'password_petugas'=>$p['PasswordPetugas']
                );
            }
        }else{
            $data = $petugas;
        }
        echo json_encode($data);
    }


    public function dataakunpengguna(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/admin'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        template('data_akun_pengguna', $data='');
    }

    public function update_data_pengguna(){
        $id = $this->input->post('id_pengguna', true);
        $username_pengguna = $this->input->post('username_pengguna', true);
        $password_baru = $this->input->post('password_baru_pengguna', true);
        $password_baru = password_hash($password_baru, PASSWORD_BCRYPT);
        
        $data = array(
            'NIK'=>$username_pengguna,
            'PasswordPengguna'=>$password_baru
        );
        if($this->vms->update('tablepengguna',array('IdPengguna'=>$id),$data)){
            $data = array(
                'IdLog' => '',
                'LogAuthor' => $this->session->userdata('role').' | '.$this->session->userdata('Nama'),
                'LogDes' => 'Merubah Data pada TABLEPENGGUNA | data NIK = '.$username_pengguna,
                'LogCreated' => date('Y-m-d H:i:s')    
            );
            $this->vms->insert($data, 'tablelog');
            $this->session->set_flashdata('flash','berhasil');
            redirect(base_url('Admin/dataakunpengguna'));
        }
    }

    public function get_data_pengguna(){
        $id = $this->input->post('id',true);
        $pengguna = $this->vms->getById('tablepengguna',array('IdPengguna'=>$id));
        if($pengguna){
            foreach ($pengguna as $p) {
                $data = array(
                    'id_pengguna'=>$p['IdPengguna'],
                    'username_pengguna'=>$p['NIK'],
                    'password_pengguna'=>$p['PasswordPengguna'],
                );
            }
        }else{
            $data = $pengguna;
        }
        echo json_encode($data);
    }

    public function datatransaksi(){
        if(!$this->session->userdata('status')){
            redirect(base_url('Auth/admin'));
        }
        if($this->session->userdata('role') === 'petugas'){
            redirect(base_url('Dashboard'));
        }
        if($this->session->userdata('role') === 'pengguna'){
            redirect(base_url('Dashboard/pengguna'));
        }
        template('data_transaksi', $data='');
    }
}