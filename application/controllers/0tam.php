<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerencanaanProduksi extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PerencanaanProduksi');
        $this->load->model('M_Line');
        $this->load->model('M_POS');
        $this->load->model('M_Produk');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_SuratPerintahLembur');
        $this->load->model('M_Tetapan');

        $this->load->library('pdf');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }


}
