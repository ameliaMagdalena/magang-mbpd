<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemasukanMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PemasukanMaterial');
        $this->load->model('M_Material');
        $this->load->model('M_Supplier');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['pemasukan'] = $this->M_PemasukanMaterial->selectPemasukanMaterialAktif()->result_array();
        $data['material'] = $this->M_Material->selectMaterialAktif()->result_array();
        
		$this->load->view('v_pemasukan_material', $data);
    }

    public function baru(){
        $data['pemasukan'] = $this->M_PemasukanMaterial->selectPemasukanMaterialAktif()->result_array();
        $data['jumlah_pemasukan'] = $this->M_PemasukanMaterial->selectPemasukanMaterialAktif()->num_rows();

        $data['supplier'] = $this->M_Supplier->selectDetailSupplierAktif()->result_array();
        $data['sub_jenis_material'] = $this->M_Material->selectSubJenisMaterialAktif()->result_array();
        
        $this->load->view('v_pemasukan_material_baru', $data);
    }

    public function tambah_pemasukan(){
        $id = $this->input->post("id_pemasukan_material");
        $data = array(
            "id_pemasukan_material" => $id,
            "id_sub_jenis_material" => $this->input->post('material'),
            "tanggal_masuk" => $this->input->post('tgl_masuk'),
            "jumlah_masuk" => $this->input->post('jumlah'),
            "keterangan_masuk" => $this->input->post('keterangan'),
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_PemasukanMaterial->insertPemasukanMaterial($data);
        redirect('PemasukanMaterial');
    }

    public function jenis_material(){
        $id = $this->input->post("id_supplier");
        $result = $this->M_PemasukanMaterial->selectHargaProduk($id)->result_array();
        echo json_encode($result);
    }

    
}