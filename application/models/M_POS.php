<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_POS extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all_po(){
        return $this->db->query("SELECT * FROM pos");
    }

    function select_all_detpo(){
        return $this->db->query("SELECT * FROM dpos");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }
}
