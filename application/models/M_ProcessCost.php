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

    function get_km($id_produk){
        return $this->db->query("SELECT * FROM produk,cycle_time,line WHERE produk.id_produk='$id_produk'
        AND produk.id_produk=cycle_time.id_produk AND cycle_time.id_line=line.id_line ");
    }
    
}
