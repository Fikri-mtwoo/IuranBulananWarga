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
        $this->load->model('rumahModel','rm');
        $this->load->model('rumahwargaModel','rwm');
        $this->load->model('iuranModel','im');
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
            $row[] = "<button type='button' class='btn btn-danger btnHapus' data-id='".$field->NIK."'>Hapus</button>";

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
            $row[] = $field->TotalIuran;
            $row[] = $field->NamaBulan."/".$field->NamaTahun;
            $row[] = $field->NamaPetugas;
            $row[] = $field->JmlBayar;
            $row[] = $field->TanggalBayar;
            $row[] = $field->InputTransaksi;

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
    //menu rumah
    public function get_data_rumah(){
        $list = $this->rm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NoRumah;
            $row[] = "<button type='button' class='btn btn-primary btnEditRumah' data-id='".$field->IdRumah."'>Ubah</button>";

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->rm->count_all(),
            "recordsFiltered" => $this->rm->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    //menu rumah warga
    public function get_data_rumahwarga(){
        $list = $this->rwm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->NIK;
            $row[] = $field->Nama;
            $row[] = $field->NoRumah;
            $row[] = "<button type='button' class='btn btn-primary btnEditRumahWarga' data-id='".$field->IdRWarga."'>Ubah</button>";

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->rwm->count_all(),
            "recordsFiltered" => $this->rwm->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    //menu iuran 
    public function get_data_iuran(){
        $list = $this->im->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->TotalIuran;
            $row[] = $field->RincianIuran;
            $row[] = $field->TanggalBuat;
            // $row[] = "<button type='button' class='btn btn-primary btnEditRumahWarga' data-id='".$field->IdIuran."'>Ubah</button>";

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->im->count_all(),
            "recordsFiltered" => $this->im->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
}