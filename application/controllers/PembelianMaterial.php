<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembelianMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PembelianMaterial');
    }

	public function index(){
		$this->load->view('v_pembelian_material');
    }

    public function baru(){
		$this->load->view('v_pembelian_material_baru');
    }

    public function select($status){
      $data['status'] = $status;
      $this->load->view('v_pembelian_material_1', $data);
    }

    public function detailPOSuppSementara(){
        $this->load->view('detailPOSuppSementara');
    }

}