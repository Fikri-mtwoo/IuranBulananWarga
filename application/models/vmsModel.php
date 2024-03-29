<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vmsModel extends CI_Model {
    public function getAll($table){
        return $this->db->get($table)->result_array();
    }
    public function insert($data, $table){
        
        return $this->db->insert($table, $data); 
    }
    public function insertBatch($data, $table){
        return $this->db->insert_batch($table, $data);
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
    public function getSelectWhereData($select, $tabel, $where){
        $this->db->select($select);
        $this->db->from($tabel);
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function getSelectGroup($select, $tabel, $group, $having){
        $this->db->select($select);
        $this->db->from($tabel);
        $this->db->group_by($group);
        $this->db->having($having);
        // return $this->db->get()->result();
        return $this->db->count_all_results();
    }
    public function getSelectGroupBy($select, $tabel, $group){
        $this->db->select($select);
        $this->db->from($tabel);
        $this->db->group_by($group);
        return $this->db->get();
    }
    public function getSelect($select, $table, $data){
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($data);
        return $this->db->get()->row();
    }
    public function getSum($table, $data){
        $this->db->select_sum('JmlBayar');
        $this->db->where($data);
        return $this->db->get($table)->row();
    }
    public function getJoin($data){
        $this->db->select('NoRumah');
        $this->db->from('tablerumah');
        $this->db->join('tablerwarga', 'tablerwarga.IdRumah = tablerumah.IdRumah');
        $this->db->where($data);
        return $this->db->get()->result_array();
    }
    public function getJoinIuran($data){
        $this->db->select('TotalIuran, RincianIuran');
        $this->db->from('tabletransaksi');
        $this->db->join('tableiuran','tableiuran.IdIuran = tabletransaksi.IdIuran');
        $this->db->where($data);
        $query =  $this->db->get();
        if($query->num_rows() == 0){
            return null;
        }else{
            return $query->row();
        }
    }
    public function getJoinRumahWarga($data){
        $this->db->select('tablerwarga.IdRWarga, tablerwarga.IdRumah, tablerwarga.IdWarga, tablewarga.Nama, tablerumah.NoRumah');
        $this->db->from('tablerwarga');
        $this->db->join('tablewarga', 'tablewarga.IdWarga = tablerwarga.IdWarga', 'inner');
        $this->db->join('tablerumah', 'tablerumah.IdRumah = tablerwarga.IdRumah','inner');
        $this->db->where('IdRWarga', $data);
        return $this->db->get()->result_array();
    }
    public function getJoinTransaksi($data){
        $this->db->select('IdBulan, tabletransaksi.IdPetugas, JmlBayar, TanggalBayar, NamaPetugas, Keterangan');
        $this->db->from('tabletransaksi');
        $this->db->join('tablepetugas','tablepetugas.IdPetugas = tabletransaksi.IdPetugas','left');
        $this->db->where($data);
        $query =  $this->db->get();
        if($query->num_rows() == 0){
            return null;
        }else{
            return $query->result_array();
        }
    }
    public function getJoinPengguna(){
        $this->db->select('tablerwarga.IdRWarga, tablewarga.IdWarga, tablewarga.Nama, tablewarga.NIK');
        $this->db->from('tablerwarga');
        $this->db->join('tablewarga', 'tablewarga.IdWarga = tablerwarga.IdWarga', 'inner');
        $query =  $this->db->get();
        if($query->num_rows() == 0){
            return null;
        }else{
            return $query->result_array();
        }
    }
    public function getJoinWarga($select){
        $this->db->select($select);
        $this->db->from('tablerwarga');
        $this->db->join('tablewarga', 'tablewarga.IdWarga = tablerwarga.IdWarga', 'inner');
        $this->db->group_by('tablerwarga.IdWarga');
        $query =  $this->db->get();
        if($query->num_rows() == 0){
            return null;
        }else{
            return $query;
        }
    }
    public function getJoinKontrak($select, $where){
        $this->db->select($select);
        $this->db->from('tablekontrak');
        $this->db->join('tablewarga', 'tablewarga.IdWarga = tablekontrak.IdWarga', 'inner');
        $this->db->join('tablerumah', 'tablerumah.IdRumah = tablekontrak.IdRumah', 'inner');
        $this->db->where($where);
        $query =  $this->db->get();
        if($query->num_rows() == 0){
            return null;
        }else{
            return $query;
        }
    }
    public function getJoinTagihan($select){
        $this->db->select($select);
        $this->db->from('tabletagihan');
        $this->db->join('tablewarga', 'tablewarga.IdWarga = tabletagihan.IdWarga', 'inner');
        $query =  $this->db->get();
        if($query->num_rows() == 0){
            return null;
        }else{
            return $query;
        }
    }
    public function getJoinTagihanWarga($select){
        $this->db->select($select);
        $this->db->from('tabletagihan');
        $this->db->join('tablekebijakan', 'tablekebijakan.IdWarga = tabletagihan.IdWarga', 'left');
        $query =  $this->db->get();
        if($query->num_rows() == 0){
            return null;
        }else{
            return $query;
        }
    }
}