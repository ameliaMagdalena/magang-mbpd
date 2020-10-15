<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PembelianMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectPembelianMaterial(){
        return $this->db->query("SELECT * FROM pembelian_material
        WHERE status_delete = 0");
    }

    function selectAllPembelianMaterial(){
        return $this->db->query("SELECT * FROM pembelian_material");
    }

}
