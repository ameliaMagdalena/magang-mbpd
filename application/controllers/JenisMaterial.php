<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_JenisMaterial');
        
        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['jenis_material'] = $this->M_JenisMaterial->selectJenisMaterialAktif()->result_array();
        $data['jumlah_jenis_material'] = $this->M_JenisMaterial->selectAllJenisMaterial()->num_rows();

        
        $data['material'] = $this->M_JenisMaterial->selectMaterial()->num_rows();
        
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
    

	public function sub_jenis_material($id){
        $idjenis = array(
            "id_jenis_material" => $id
        );
        $data['jenis_material'] = $this->M_JenisMaterial->selectSatuJenisMaterialAktif($idjenis)->result_array();

        $data['sub_jenis'] = $this->M_JenisMaterial->selectSubJenisMaterialAktif($idjenis)->result_array();
        $data['jumlah_sub'] = $this->M_JenisMaterial->selectAllSubJenisMaterial()->num_rows();
        
        $data['material'] = $this->M_JenisMaterial->selectMaterial()->result_array();
        
		$this->load->view('v_sub_jenis_material', $data);
    }

    public function edit_jenis_material(){
        $where = array(
            "id_jenis_material" => $this->input->post("id_jenis_material"),
        );
        
        $data = array(
            "nama_jenis_material"=>$this->input->post("nama_jenis_material"),
            "kode_jenis_material"=>$this->input->post("kode_jenis_material"),
            "waktu_edit"=>date('Y-m-d H:i:s'),
            "user_edit"=>$_SESSION['id_user']
        );
        $this->M_JenisMaterial->editJenisMaterial($data, $where);
        redirect('JenisMaterial');
    }

    public function hapus_jenis_material(){
        $where = array(
            "id_jenis_material" => $this->input->post("id_jenis_material"),
        );
        $data = array(
            "status_delete"=>"1",
            "user_delete"=>$_SESSION['id_user'],
            "waktu_delete"=>date('Y-m-d H:i:s')
        );
        $this->M_JenisMaterial->hapusJenisMaterial($data, $where);
        $this->M_JenisMaterial->hapusSubJenisMaterial($data, $where);
        redirect('JenisMaterial');
    }

    
    public function tambah_sub(){
        $idjenis = $this->input->post("id_jenis_material");
        $data = array(
            "id_sub_jenis_material"=>$this->input->post("id_sub_jenis_material"),
            "nama_sub_jenis_material"=>$this->input->post("nama_sub_jenis_material"),
            "kode_sub_jenis_material"=>$this->input->post("kode_sub_jenis_material"),
            "satuan_ukuran"=>$this->input->post("satuan"),
            "min_stok"=>$this->input->post("min_stok"),
            "max_stok"=>$this->input->post("max_stok"),
            "id_jenis_material"=>$idjenis,
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_JenisMaterial->insertSubJenisMaterial($data);
        redirect('JenisMaterial/sub_jenis_material/'.$idjenis);
    }

    public function edit_sub(){
        $idjenis = $this->input->post("id_jenis_material");
        $where = array(
            "id_sub_jenis_material" => $this->input->post("id_sub_jenis_material"),
        );
        
        $data = array(
            "id_sub_jenis_material"=>$this->input->post("id_sub_jenis_material"),
            "nama_sub_jenis_material"=>$this->input->post("nama_sub_jenis_material"),
            "kode_sub_jenis_material"=>$this->input->post("kode_sub_jenis_material"),
            "satuan_ukuran"=>$this->input->post("satuan"),
            "min_stok"=>$this->input->post("min_stok"),
            "max_stok"=>$this->input->post("max_stok"),
            "id_jenis_material"=>$idjenis,
            "waktu_edit"=>date('Y-m-d H:i:s'),
            "user_edit"=>$_SESSION['id_user']
        );
        $this->M_JenisMaterial->editSubJenisMaterial($data, $where);
        redirect('JenisMaterial/sub_jenis_material/'.$idjenis);
    }

    public function hapus_sub(){
        $idjenis = $this->input->post("id_jenis_material");
        $where = array(
            "id_sub_jenis_material" => $this->input->post("id_sub_jenis_material"),
        );
        $data = array(
            "status_delete"=>"1",
            "user_delete"=>$_SESSION['id_user'],
            "waktu_delete"=>date('Y-m-d H:i:s')
        );
        $this->M_JenisMaterial->hapusSubJenisMaterial($data, $where);
        redirect('JenisMaterial/sub_jenis_material/'.$idjenis);
    }
}