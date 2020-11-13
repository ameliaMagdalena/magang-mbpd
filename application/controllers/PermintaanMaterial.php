<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PerencanaanMaterial');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }

    }

	public function index($status){
        $id = $this->input->post('id');

        $data['status'] = $status;
        $data['permintaan_material'] = $this->M_PerencanaanMaterial->selectPermintaanMaterialAktif()->result_array();
        $data['detail'] = $this->M_PerencanaanMaterial->selectDetailPermintaanMaterialAktif()->result_array();

        $data['warna'] = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran'] = $this->M_UkuranProduk->select_all_aktif()->result();

        $data['permat'] = $this->M_PerencanaanMaterial->selectSatuPermintaanMaterial($id)->result_array();
        $data['detpermat'] = $this->M_PerencanaanMaterial->selectSatuDetailPermintaanMaterial($id)->result_array();

		$this->load->view('v_permintaan_material', $data);
    }

    public function detail($id){
        $idnya = array(
            "id_permintaan_material" => $id
        );
        $data['id_permintaan'] = $id;
        $data['permintaan_material'] = $this->M_PerencanaanMaterial->selectSatuPermintaanMaterial($idnya)->result_array();
        $data['detail'] = $this->M_PerencanaanMaterial->selectSatuDetailPermintaanMaterial($idnya)->result_array();

		$this->load->view('v_detail_permintaan_material', $data);
    }

    public function ketersediaan(){
        $id = $this->input->post("id_sub_jenis_material");
        $result = $this->M_PerencanaanMaterial->selectKetersediaanMaterial($id)->result_array();
        echo json_encode($result);
    }

    public function baru($jenis){
        if ($jenis == 'produk'){
            $this->load->view('v_permintaan_material_baru');
        }
        else{
            $this->load->view('v_permintaan_material_umum');
        }
    }

    public function detailPerencanaan(){
        $this->load->view('v_detail_perencanaan');
    }

    public function prosesPerencanaan(){
        $this->load->view('v_proses_perencanaan');
    }
    

    public function detailPermintaanSementara(){
        $this->load->view('detailPermintaanSementara');
    }

}