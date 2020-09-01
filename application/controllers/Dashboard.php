<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        if($this->session->userdata('status_login') != "login"){
			    redirect('akses');
		    }
    }

	public function index(){
		$this->load->view('v_dashboard');
    }

  public function coba(){
    $this->load->view('0v_coba');
  }
    
}
