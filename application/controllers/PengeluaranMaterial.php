<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Dashboard');

    }

	public function index(){
		$this->load->view('v_pengeluaran_material');
    }

    public function baru(){
		  $this->load->view('v_pengeluaran_material_baru');
    }

    public function jadwal(){
        $this->load->view('v_jadwal_pengeluaran_material');
    }

  
    
}