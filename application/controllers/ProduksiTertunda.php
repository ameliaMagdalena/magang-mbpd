<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProduksiTertunda extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_ProduksiTertunda');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        
    }

    public function semua(){
        $data['prodtun'] = $this->M_ProduksiTertunda->get_semua()->result();
        $data['warna']   = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']  = $this->M_UkuranProduk->select_all_aktif()->result();

        $this->load->view('v_produksi_tertunda_semua',$data);
    }

    public function belum_diproses(){
        $data['prodtun'] = $this->M_ProduksiTertunda->get_semua()->result();
        $data['warna']   = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']  = $this->M_UkuranProduk->select_all_aktif()->result();

        $this->load->view('v_produksi_tertunda_semua',$data);
    }

    public function sedang_diproses(){
        $data['prodtun'] = $this->M_ProduksiTertunda->get_semua()->result();
        $data['warna']   = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']  = $this->M_UkuranProduk->select_all_aktif()->result();

        $this->load->view('v_produksi_tertunda_semua',$data);
    }

    public function selesai(){
        $data['prodtun'] = $this->M_ProduksiTertunda->get_semua()->result();

        $this->load->view('v_produksi_tertunda_semua',$data);
    }

    public function detail(){
        $id = $this->input->post('id');

        $data['prodtun']       = $this->M_ProduksiTertunda->get_one_prodtun($id)->result_array();
        $data['detprodtun']    = $this->M_ProduksiTertunda->get_one_detprodtun($id)->result_array();
        $data['jm_detprodtun'] = $this->M_ProduksiTertunda->get_one_detprodtun($id)->num_rows();


        $data['warna']   = $this->M_Warna->select_all_aktif()->result_array();
        $data['ukuran']  = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmwarna']   = $this->M_Warna->select_all_aktif()->num_rows();
        $data['jmukuran']  = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }



}
