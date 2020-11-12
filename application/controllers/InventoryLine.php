<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryLine extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->model('M_InventoryLine');

        $this->load->library('pdf');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
          }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
          }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
          }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
        }
        else{
            $data['inventory_line']        = $this->M_InventoryLine->select_all()->result(); 
        }
        $this->load->view('v_inventory_line',$data);
    }

    public function detail_inline(){
      $id = $this->input->post('id');

      $data['det_inline']    = $this->M_InventoryLine->get_detail_inline($id)->result_array();
      $data['jm_det_inline'] = $this->M_InventoryLine->get_detail_inline($id)->num_rows();

      echo json_encode($data);
    }
}
