<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanMaterialProduksi extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PermintaanMaterialProduksi');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialProduksi->select_all_aktif()->result();
        $data['jumlah_ubmin']        = $this->M_PermintaanMaterialProduksi->get_jumlah_ubmin()->result();
    
        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_produksi_semua',$data);
    }

    public function belum_ditindaklanjuti(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialProduksi->select_all_aktif()->result();
        $data['jumlah_ubmin']        = $this->M_PermintaanMaterialProduksi->get_jumlah_ubmin()->result();
    
        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_produksi_belum_ditindaklanjuti',$data);
    }

    public function sedang_diproses(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialProduksi->select_all_aktif()->result();
        $data['jumlah_ubmin']        = $this->M_PermintaanMaterialProduksi->get_jumlah_ubmin()->result();
    
        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_produksi_sedang_diproses',$data);
    }

    public function material_tersedia(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialProduksi->select_all_aktif()->result();
        $data['jumlah_ubmin']        = $this->M_PermintaanMaterialProduksi->get_jumlah_ubmin()->result();
    
        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_produksi_material_tersedia',$data);
    }

    public function selesai(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialProduksi->select_all_aktif()->result();
        $data['jumlah_ubmin']        = $this->M_PermintaanMaterialProduksi->get_jumlah_ubmin()->result();
    
        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_produksi_selesai',$data);
    }

    public function  batal(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialProduksi->select_all_aktif()->result();
        $data['jumlah_ubmin']        = $this->M_PermintaanMaterialProduksi->get_jumlah_ubmin()->result();
    
        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_produksi_batal',$data);
    }

    public function ditolak(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialProduksi->select_all_aktif()->result();
        $data['jumlah_ubmin']        = $this->M_PermintaanMaterialProduksi->get_jumlah_ubmin()->result();
    
        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_produksi_ditolak',$data);
    }

    public function detail_permintaan(){
        $id = $this->input->post('id');

        $data['permat']       = $this->M_PermintaanMaterialProduksi->get_one_permat($id)->result_array();
        $data['detpermat']    = $this->M_PermintaanMaterialProduksi->get_one_detpermat($id)->result_array();
        $data['jm_detpermat'] = $this->M_PermintaanMaterialProduksi->get_one_detpermat($id)->num_rows();

        echo json_encode($data);
    }

    public function perubahan_permintaan(){
        $id = $this->input->post('id');

        $data['ubmin']    = $this->M_PermintaanMaterialProduksi->get_ubmin($id)->result_array();
        $data['jm_ubmin'] = $this->M_PermintaanMaterialProduksi->get_ubmin($id)->num_rows();

        echo json_encode($data);
    }

    public function edit_permintaan_pengambilan(){
        
    }

}
