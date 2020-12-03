<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Supplier');
        $this->load->model('M_JenisMaterial');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['supplier'] = $this->M_Supplier->selectSupplierAktif()->result_array();
        $data['jumlah_supplier'] = $this->M_Supplier->selectAllSupplier()->num_rows();
        $data['jumlah_detail_supplier'] = $this->M_Supplier->selectAllDetailSupplier()->num_rows();

		$this->load->view('v_supplier', $data);
    }

    public function tambah_supplier(){
        $data = array(
            "id_supplier"=>$this->input->post("id_supplier"),
            "nama_supplier"=>$this->input->post("nama_supplier"),
            "alamat_supplier"=>$this->input->post("alamat_supplier"),
            "no_telp_supplier"=>$this->input->post("no_telp_supplier"),
            "email_supplier"=>$this->input->post("email_supplier"),
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_Supplier->insertSupplier($data);
        redirect('Supplier');
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

    //******************************* DETAIL SUPPLIER ***************************** */
    //***************************************************************************** */

    public function detail_supplier($id_supplier){
        $id = array(
            "id_supplier" => $id_supplier
        );
        $data['supplier'] = $this->M_Supplier->selectSatuSupplier($id)->result_array();
        $data['detail_sup'] = $this->M_Supplier->selectSatuDetailSupplier($id)->result_array();
        $data['jumlah_detail_sup'] = $this->M_Supplier->selectAllDetailSupplier()->num_rows();
        $data['sub_jenis'] = $this->M_Supplier->selectSubJenisMaterial()->result_array();
        $data['jenis_material'] = $this->M_JenisMaterial->selectJenisMaterialAktif()->result_array();

		$this->load->view('v_detail_supplier', $data);
    }

    public function insert_detail(){
        $id=$this->input->post("id_supplier");
        $data = array(
            "id_detail_supplier"=>$this->input->post("id_detail_sup"),
            "id_supplier"=>$id,
            "id_sub_jenis_material"=>$this->input->post("material"),
            "harga_material"=>$this->input->post("harga"),
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_Supplier->insertDetailSupplier($data);
        redirect('Supplier/detail_supplier/'.$id);
    }

    public function edit_detail_supplier(){
        $id=$this->input->post("id_supplier");
        $where = array(
            "id_detail_supplier" => $this->input->post("id_detail_sup"),
        );
        $data = array(
            "harga_material"=>$this->input->post("harga"),
            "waktu_edit"=>date('Y-m-d H:i:s'),
            "user_edit"=>$_SESSION['id_user']
        );
        $this->M_Supplier->editDetailSupplier($data, $where);
        redirect('Supplier/detail_supplier/'.$id);
    }

    public function hapus_detail_supplier(){
        $id=$this->input->post("id_supplier");
        $where = array(
            "id_detail_supplier" => $this->input->post("id_detail_sup"),
        );
        $data = array(
            "status_delete"=>"1",
            "user_delete"=>$_SESSION['id_user'],
            "waktu_delete"=>date('Y-m-d H:i:s')
        );
        $this->M_Supplier->hapusDetailSupplier($data, $where);
        redirect('Supplier/detail_supplier/'.$id);
    }

    
}
