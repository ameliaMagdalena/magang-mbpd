<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerubahanHargaMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

    }

	public function index($status){
        $data['status'] = $status;
		$this->load->view('v_perubahan_harga_material', $data);
    }

    public function persetujuan(){
		  $this->load->view('v_perubahan_harga_material_persetujuan');
    }

    public function baru(){
        $this->load->view('v_perubahan_harga_material_baru');
  }

    
}