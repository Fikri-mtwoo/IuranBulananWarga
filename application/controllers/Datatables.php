<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminModel','admin');
        $this->load->model('petugasModel','petugas');
        $this->load->model('penggunaModel','pengguna');
        $this->load->model('transaksiModel','transaksi');
        $this->load->model('histori_transaksi_Model','ht');
    }
    public function get_data_user(){
        $list = $this->admin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NIK;
            $row[] = $field->Nama;
            $row[] = "<button type='button' class='btn btn-primary btnEdit' data-id='".$field->IdWarga."'>Edit</button>";
            $row[] = "<button type='button' class='btn btn-danger btnHapus' data-id='".$field->IdWarga."'>Hapus</button>";

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->admin->count_all(),
            "recordsFiltered" => $this->admin->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
    public function get_data_petugas(){
        $list = $this->petugas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NIK;
            $row[] = $field->NamaPetugas;
            $row[] = $field->Username;
            // $row[] = $field->PasswordPetugas;
            $row[] = "<button type='button' class='btn btn-primary btnEditPetugas' data-id='".$field->IdPetugas."'>Edit</button>";
            $row[] = "<button type='button' class='btn btn-danger ' data-id='".$field->IdPetugas."' data-nik='".$field->NIK."'>Hapus</button>";

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->petugas->count_all(),
            "recordsFiltered" => $this->petugas->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function get_data_pengguna(){
        $list = $this->pengguna->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NIK;
            $row[] = "<button type='button' class='btn btn-primary btnEditPengguna' data-id='".$field->IdPengguna."'>Ubah</button>";

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pengguna->count_all(),
            "recordsFiltered" => $this->pengguna->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function get_data_transaksi(){
        $list = $this->transaksi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->IdTransaksi;
            $row[] = $field->Nama;
            $row[] = $field->NamaBulan."/".$field->Tahun;
            $row[] = $field->NamaPetugas;
            $row[] = $field->JmlBayar;
            $row[] = $field->TanggalBayar;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->transaksi->count_all(),
            "recordsFiltered" => $this->transaksi->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function get_data_histori_transaksi(){
        $list = $this->ht->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->Nama;
            $row[] = $field->NamaBulan;
            $row[] = $field->NamaPetugas;
            $row[] = $field->JmlBayar;
            $row[] = $field->TanggalBayar;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ht->count_all(),
            "recordsFiltered" => $this->ht->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
}