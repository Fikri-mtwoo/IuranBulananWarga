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
        
    }