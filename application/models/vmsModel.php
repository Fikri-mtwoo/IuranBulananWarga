<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vmsModel extends CI_Model {
    public function getAll($table){
        return $this->db->get($table)->result_array();
    }
    public function insert($data, $table){
        
        return $this->db->insert($table, $data); 
    }
    public function getRow($table){
        return $this->db->count_all($table);
    }
    public function getById($table, $data){
        $query = $this->db->get_where($table, $data);
        if($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->result_array();
        }
    }
    public function getSelect($data){
        $this->db->select('Nama,NoRumah');
        $this->db->from('tablewarga');
        $this->db->where($data);
        return $this->db->get()->row();
    }
    public function getSum($table, $data){
        $this->db->select_sum('JmlBayar');
        $this->db->where($data);
        return $this->db->get($table)->row();
    }
    public function getJoin($data){
        $this->db->select('Nama,NamaBulan,TanggalBayar,JmlBayar,NamaPetugas');
        $this->db->from('tabletransaksi');
        $this->db->join('tablewarga', 'tablewarga.NIK = tabletransaksi.NIK', 'inner');
        $this->db->join('tablebulaniuran', 'tablebulaniuran.IdBulanIuran = tabletransaksi.IdBulan','inner');
        $this->db->join('tablepetugas', 'tablepetugas.IdPetugas = tabletransaksi.IdPetugas','inner');
        $this->db->where('Nama', $data);
        $this->db->order_by('IdBulanIuran', 'ASC');
        return $this->db->get()->result_array();
    }
    public function update($table, $id, $data){
        $this->db->where($id);
        return $this->db->update($table, $data);
    }
    public function delete($table, $id){
        $this->db->where($id);
        return $this->db->delete($table);
    }
    public function getSelectData($select, $tabel){
        $this->db->select($select);
        $this->db->from($tabel);
        return $this->db->get()->result_array();
    }
}