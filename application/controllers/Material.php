<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Material');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['material'] = $this->M_Material->selectMaterialAktif()->result_array();
        $data['jumlah_material'] = $this->M_Material->selectAllMaterial()->num_rows();
        $data['sub_jenis_material'] = $this->M_Material->selectSubJenisMaterialAktif()->result_array();
        //$data['jumlah_sub_jenis_material'] = $this->M_Material->selectAllSubJenisMaterial()->num_rows();
        
		$this->load->view('v_material', $data);
    }

    public function edit_material(){
        $where = array(
            "id_material" => $this->input->post("id_material"),
        );
        $data = array(
            "status_keluar"=>$this->input->post("status_keluar"),
            "waktu_edit"=>date('Y-m-d H:i:s'),
            "user_edit"=>$_SESSION['id_user']
        );
        $this->M_Material->editMaterial($data, $where);
        redirect('Material');
    }

    public function hapus_material(){
        $where = array(
            "id_material" => $this->input->post("id_material"),
        );
        $data = array(
            "status_delete"=>"1",
            "user_delete"=>$_SESSION['id_user'],
            "waktu_delete"=>date('Y-m-d H:i:s')
        );
        $this->M_Material->hapusMaterial($data, $where);
        redirect('Material');
    }

}