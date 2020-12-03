<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanPembelianMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Dashboard');

    }

	public function index(){
		$this->load->view('v_permintaan_pembelian_material');
    }

    public function baru(){
		  $this->load->view('v_permintaan_pembelian_material_baru');
    }

    

    public function detailPermintaanPembelianSementara(){
        $this->load->view('detailPermintaanPembelianSementara');
    }

}