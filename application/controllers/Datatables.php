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
        $this->load->model('kontrakModel','km');
        $this->load->model('kebijakanModel','kbm');
        $this->load->model('tagihanModel','tm');
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
            if($field->Status == 0){
                $row[] = "<p class='text-center text-danger'>Belum Aktif</p>";
            }else{
                $row[] = "<p class='text-center text-success'>Aktif</p>";
            }
            if($field->Status == 0){
                $row[] = "<button type='button' class='btn btn-primary btnEditPetugas' data-id='".$field->IdPetugas."'>Edit</button> | <button type='button' class='btn btn-success btnAktifAkunPetugas' data-id='".$field->IdPetugas."'>Aktif</button>";
            }else{
                $row[] = "<button type='button' class='btn btn-primary btnEditPetugas' data-id='".$field->IdPetugas."'>Edit</button> | <button type='button' class='btn btn-danger btnNonAktifAkunPetugas' data-id='".$field->IdPetugas."'>Non Aktif</button>";
            }

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
            if($field->Status == 0){
                $row[] = "<p class='text-center text-danger'>Belum Aktif</p>";
            }else{
                $row[] = "<p class='text-center text-success'>Aktif</p>";
            }
            if($field->Status == 0){
                $row[] = "<button type='button' class='btn btn-primary btnEditPengguna' data-id='".$field->IdPengguna."'>Ubah Password</button> | <button type='button' class='btn btn-success btnAktifAkun' data-id='".$field->IdPengguna."'>Aktif Akun</button>";
            }else{
                $row[] = "<button type='button' class='btn btn-primary btnEditPengguna' data-id='".$field->IdPengguna."'>Ubah Password</button> | <button type='button' class='btn btn-danger btnNonAktifAkun' data-id='".$field->IdPengguna."'>Non Aktif Akun</button>";
            }

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
            $row[] = $field->NamaBulan."/".$field->IdTahun;
            $row[] = $field->NamaPetugas;
            $row[] = $field->JmlBayar;
            $row[] = $field->TanggalBayar;
            $row[] = $field->InputTransaksi;
            $row[] = $field->Keterangan;
            if($field->Keterangan == 'kosong'){
                $row[] = '<button type="button" class="btn btn-warning btnEditKet" data-id="'.$field->IdTransaksi.'">Keterangan</button>';
            }else if($field->Keterangan == 'Gratis'){
                $row[] = '<button type="button" class="btn btn-danger btnEditKebijakan" data-id="'.$field->IdTransaksi.'">Hapus Kebijakan</button>';
            }else{
                $row[] = '';
            }

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
            $row[] = $field->TotalIuran;
            $row[] = $field->NamaBulan.' / '.$field->IdTahun;
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
            $row[] = $field->StatusRumah;
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
    //menu kontrak
    public function get_data_kontrak(){
        $list = $this->km->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->Nama;
            $row[] = $field->NoRumah;
            $row[] = $field->JmlBulanKontrak." Bulan";
            $row[] = $field->TanggalMasuk;
            $row[] = $field->TanggalKeluar;
            $row[] = $field->StatusKontrak;
            if($field->StatusKontrak == 'selesai'){
                $row[] = "<button type='button' class='btn btn-primary btnEditKontrak' data-id='".$field->IdKontrak."'>Ubah</button>";
            }else{
                $row[] = "<button type='button' class='btn btn-primary btnEditKontrak' data-id='".$field->IdKontrak."'>Ubah</button> |<button type='button' class='btn btn-danger btnSelesai' data-id='".$field->IdKontrak."'>Selesai</button> ";
            }

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->km->count_all(),
            "recordsFiltered" => $this->km->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    //menu kebijakan
    public function get_data_kebijakan(){
        $list = $this->kbm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->Nama;
            $row[] = $field->Keterangan;
            $row[] = "<button type='button' class='btn btn-danger btnHapusKebijakan' data-id='".$field->IdKebijakan."'>Hapus</button>";

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kbm->count_all(),
            "recordsFiltered" => $this->kbm->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    //menu tagihan
    public function get_data_tagihan(){
        $list = $this->tm->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->Nama;
            $row[] = $field->StatusRumah;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tm->count_all(),
            "recordsFiltered" => $this->tm->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
}