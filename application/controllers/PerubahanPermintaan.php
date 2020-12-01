<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerubahanPermintaan extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PerencanaanMaterial');
        $this->load->model('M_PerubahanPermintaan');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }

    }

	public function index($status){
        $data['status'] = $status;
        $data['perubahan'] = $this->M_PerubahanPermintaan->selectPerubahanPermintaanAktif()->result_array();
        //$data['permintaan_material'] = $this->M_PerubahanPermintaan->selectPermintaanMaterial()->result_array();
        //$data['detail'] = $this->M_PerubahanPermintaan->selectDetailPermintaanMaterial()->result_array();

        $data['warna'] = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran'] = $this->M_UkuranProduk->select_all_aktif()->result();


		$this->load->view('v_perubahan_permintaan', $data);
    }

    public function ajax(){
        $id = $this->input->post('id');
        $data['ubah'] = $this->M_PerubahanPermintaan->selectSatuPerubahanPermintaan($id)->result_array();

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
            'id_perubahan_permintaan' => $this->input->post("idnyaa")
        );
        $data = array (
            "status" => $this->input->post("status"),
            "user_edit"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
        );
        $this->M_PerubahanPermintaan->editPerubahanPermintaan($data, $where);

        $where2 = array(
            'id_permintaan_material' => $this->input->post("idmintaa")
        );
        $data2 = array (
            "jumlah_minta" => $this->input->post("jumlahnyaa"),
            "user_edit"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
        );
        $this->M_PerencanaanMaterial->editPermintaanMaterial($data2, $where2);
        
        if ($this->input->post("status") == 1){
            redirect('PerubahanPermintaan/index/1');
        }
        else if ($this->input->post("status") == 2){
            redirect('PerubahanPermintaan/index/2');
        }
        else if ($this->input->post("status") == 3){
            redirect('PerubahanPermintaan/index/3');
        }
        else{
            redirect('PerubahanPermintaan/index/4');
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