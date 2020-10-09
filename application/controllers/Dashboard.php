<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_SuratPerintahLembur');

        if($this->session->userdata('status_login') != "login"){
			    redirect('akses');
		    }
    }

	public function index(){
    $now = date('Y-m-d');
    //update spl batal
    $this->M_SuratPerintahLembur->cek_batal($now);

    //update status po

    //update bpbj
    

		$this->load->view('v_dashboard');
    }

  public function coba(){
    $this->load->view('0v_coba');
  }
    
}
