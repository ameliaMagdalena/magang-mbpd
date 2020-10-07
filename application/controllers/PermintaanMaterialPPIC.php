<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanMaterialPPIC extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PermintaanMaterialPPIC');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['permintaan_material'] = $this->M_PermintaanMaterialPPIC->select_all_aktif()->result();

		$this->load->view('v_permintaan_material_ppic_semua',$data);
    }

   

}
