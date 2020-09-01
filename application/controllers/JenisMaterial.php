<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_JenisMaterial');
    }

	public function index(){
        $data['jenis_material'] = $this->M_JenisMaterial->selectJenisMaterialAktif()->result_array();
        $data['jumlah_jenis_material'] = $this->M_JenisMaterial->selectAllJenisMaterial()->num_rows();

        $data['sub_jenis_material'] = $this->M_JenisMaterial->selectAllSubJenisMaterial()->result_array();
        $data['sub_join'] = $this->M_JenisMaterial->selectSubJenisMaterialAktif()->result_array();
        $data['jumlah_sub_jenis_material'] = $this->M_JenisMaterial->selectAllSubJenisMaterial()->num_rows();
        
		$this->load->view('v_jenis_material', $data);
    }


    public function tambah_jenis_material(){
        $data = array(
            "id_jenis_material"=>$this->input->post("id_jenis_material"),
            "nama_jenis_material"=>$this->input->post("nama_jenis_material"),
            "kode_jenis_material"=>$this->input->post("kode_jenis_material"),
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_JenisMaterial->insertJenisMaterial($data);
        redirect('JenisMaterial');

        //$id['id_jenis_material'] = $this->input->post("id_jenis_material");
        //$this->load->view('v_jenis_material', $id);
    }

    public function tambah_sub_jenis_material(){
        $data = array(
            "id_sub_jenis_material"=>$this->input->post("id_sub_jenis_material"),
            "nama_sub_jenis_material"=>$this->input->post("nama_sub_jenis_material"),
            "kode_sub_jenis_material"=>$this->input->post("kode_sub_jenis_material"),
            "satuan_ukuran"=>$this->input->post("satuan"),
            "min_stok"=>$this->input->post("min_stok"),
            "max_stok"=>$this->input->post("max_stok"),
            "id_jenis_material"=>$this->input->post("id_jenis_material"),
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_JenisMaterial->insertSubJenisMaterial($data);
        redirect('JenisMaterial');
    }


    public function edit_supplier(){
        $where = array(
            "id_supplier" => $this->input->post("id_supplier"),
        );
        $data = array(
            "nama_supplier"=>$this->input->post("nama_supplier"),
            "no_telp_supplier"=>$this->input->post("no_telp_supplier"),
            "email_supplier"=>$this->input->post("email_supplier"),
            "alamat_supplier"=>$this->input->post("alamat_supplier"),
            "waktu_edit"=>date('Y-m-d H:i:s'),
            "user_edit"=>$_SESSION['id_user']
        );
        $this->M_Supplier->editSupplier($data, $where);
        redirect('Supplier');
    }

    public function hapus_supplier(){
        $where = array(
            "id_supplier" => $this->input->post("id_supplier"),
        );
        $data = array(
            "status_delete"=>"1",
            "user_delete"=>$_SESSION['id_user'],
            "waktu_delete"=>date('Y-m-d H:i:s')
        );
        $this->M_Supplier->hapusSupplier($data, $where);
        redirect('Supplier');
    }
}