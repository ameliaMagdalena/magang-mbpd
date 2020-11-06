<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ProcessCost extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all_produk(){
        return $this->db->query("SELECT * FROM produk WHERE status_delete='0' ");
    }

    
}
