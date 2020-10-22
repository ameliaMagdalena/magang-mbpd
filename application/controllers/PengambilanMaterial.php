<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengambilanMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

    }
    
    public function jadwal(){
        $this->load->view('v_jadwal_pengambilan_material');
    }

    
}