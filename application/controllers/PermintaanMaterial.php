<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PerencanaanMaterial');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_Dashboard');

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


		$this->load->view('v_permintaan_material', $data);
    }

    public function ajax(){
        $id             = $this->input->post('id');
        $data['permat'] = $this->M_PerencanaanMaterial->selectSatuPermintaanMaterial($id)->result_array();

        echo json_encode($data);
    }

    public function detail($id){
        /* $idnya = array(
            "id_permintaan_material" => $id
        ); */
        $data['id_permintaan'] = $id;
        $data['permintaan_material'] = $this->M_PerencanaanMaterial->selectSatuPermintaanMaterial($id)->result_array();
        $data['detail'] = $this->M_PerencanaanMaterial->selectSatuDetailPermintaanMaterial($id)->result_array();

		$this->load->view('v_detail_permintaan_material', $data);
    }

    public function setuju(){
        $where = array(
            'id_permintaan_material' => $this->input->post("idnyaa")
        );

        $data = array (
            "id_permintaan_material" => $this->input->post("idnyaa"),
            "status_permintaan" => $this->input->post("status"),
            "user_edit"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
        );
        $this->M_PerencanaanMaterial->editPermintaanMaterial($data, $where);
        
        if ($this->input->post("status") == 1 || $this->input->post("status") == 2){
            redirect('PermintaanMaterial/index/1');
        }
        else if ($this->input->post("status") == 3){
            redirect('PermintaanMaterial/index/2');
        }
        else{
            redirect('PermintaanMaterial/index/3');
        }
    }

    public function batal(){
        $where = array(
            'id_permintaan_material' => $this->input->post("idnya")
        );

        $data = array (
            "id_permintaan_material" => $this->input->post("idnya"),
            "status_permintaan" => $this->input->post("status"),
            "user_edit"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
        );
        $this->M_PerencanaanMaterial->editPermintaanMaterial($data, $where);
        echo $this->input->post("idnya");
        //redirect('PermintaanMaterial/index/3');
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

    public function proses_perencanaan($id){
        $data['id_permintaan'] = $id;
        $data['permintaan_material'] = $this->M_PerencanaanMaterial->selectSatuPermintaanMaterial($id)->result_array();
        $data['detail'] = $this->M_PerencanaanMaterial->selectSatuDetailPermintaanMaterial($id)->result_array();

        $data['pengambilan'] = $this->M_PerencanaanMaterial->selectPengambilanMaterial($id)->result_array();
        $result = $this->M_PerencanaanMaterial->selectKetersediaanMaterial($id)->result_array();
        $this->load->view('v_detail_perencanaan', $data);
    }
    
    public function ajax_ambil(){
        $id             = $this->input->post('id');
        $data['ambil'] = $this->M_PerencanaanMaterial->selectSatuPengambilanMaterial($id)->result_array();

        echo json_encode($data);
    }

    public function detailPermintaanSementara(){
        $this->load->view('detailPermintaanSementara');
    }

}