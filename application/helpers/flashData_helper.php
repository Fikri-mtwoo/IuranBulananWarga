<?php
if(! defined('BASEPATH')) exit('No direct script access allowed');
    if(! function_exists('pesanFlashdata')){
        // function pesanFlashData($type, $pesan){
        //     $CI = &get_instance();
        //     return $CI->session->set_flashdata('flash','<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">'.$pesan.'
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //     <span aria-hidden="true">&times;</span>
        //     </button>
        //     </div>');
        // }
        function template($layout, $data){
            $ci = &get_instance();
            $ci->load->view('template/header');
            $ci->load->view('template/sidebar');
            $ci->load->view('template/navbar');
            $ci->load->view($layout, $data);
            $ci->load->view('template/footer');
        }
        function IdTransaksi(){
            $ci = &get_instance();
            $ci->load->model('vmsModel','vms');
            $angka = $ci->vms->getRow('tabletransaksi');
            return $hasil = 'Tran'.($angka+1);
        }
        function tahun($tahun){
            $ci = &get_instance();
            $ci->load->model('vmsModel','vm');
            $nama_tahun = $ci->vm->getSelectWhereData('NamaTahun','tabletahuniuran',['IdTahunIuran'=>$tahun]);
            return $nama_tahun[0]['NamaTahun'];
        }
        function bulan($bulan){
            switch ($bulan) {
                case '1':
                    return "Januari";
                    break;
                
                case '2':
                    return "Februari";
                    break;
                
                case '3':
                    return "Maret";
                    break;
                
                case '4':
                    return "April";
                    break;
                
                case '5':
                    return "Mei";
                    break;
                
                case '6':
                    return "Juni";
                    break;
                
                case '7':
                    return "Juli";
                    break;
                
                case '8':
                    return "Agustus";
                    break;
                
                case '9':
                    return "September";
                    break;
                
                case '10':
                    return "Oktober";
                    break;
                
                case '11':
                    return "November";
                    break;
                
                case '12':
                    return "Desember";
                    break;
                
                default:
                    return "";
                    break;
            }
        }
        
    }