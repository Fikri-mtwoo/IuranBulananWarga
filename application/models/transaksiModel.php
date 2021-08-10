<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksiModel extends CI_Model {
    var $table = 'tabletransaksi';
    var $kolom_order = array(null,'IdTransaksi','Nama');
    var $kolom_cari = array('Nama','Tanggalbayar');
    var $order = array('IdTransaksi'=>'asc');

    private function get_datatables_query(){
        $this->db->select('tabletransaksi.IdTransaksi, tabletransaksi.IdWarga, tabletransaksi.IdIuran, tabletransaksi.IdBulan, tabletransaksi.IdTahun, tabletransaksi.IdPetugas, tabletransaksi.JmlBayar, tabletransaksi.TanggalBayar, tabletransaksi.InputTransaksi, tablewarga.Nama, tablebulaniuran.NamaBulan, tabletahuniuran.NamaTahun, tableiuran.TotalIuran,  tablepetugas.NamaPetugas');
        $this->db->from($this->table);
        $this->db->join('tablewarga', 'tablewarga.IdWarga = tabletransaksi.IdWarga', 'inner');
        $this->db->join('tablebulaniuran', 'tablebulaniuran.IdBulanIuran = tabletransaksi.IdBulan','inner');
        $this->db->join('tabletahuniuran', 'tabletahuniuran.IdTahunIuran = tabletransaksi.IdTahun','inner');
        $this->db->join('tableiuran', 'tableiuran.IdIuran = tabletransaksi.IdIuran','inner');
        $this->db->join('tablepetugas', 'tablepetugas.IdPetugas = tabletransaksi.IdPetugas','left');
        if($this->input->post('bulan')){
            $this->db->where('tabletransaksi.IdBulan', $this->input->post('bulan'));
        }
        if($this->input->post('tahun')){
            $this->db->where('tabletransaksi.IdTahun', $this->input->post('tahun'));
        }
        $i=0;
        foreach ($this->kolom_cari as $item) {
            if($_POST['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->kolom_cari) -1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
            if(isset($_POST['order'])){
                $this->db->order_by($this->kolom_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }else if(isset($this->order)){
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }
    }
    public function get_datatables()
    {
        $this->get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
}