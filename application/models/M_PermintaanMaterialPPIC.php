<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PermintaanMaterialPPIC extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM permintaan_material,line WHERE permintaan_material.status_delete='0'
        AND permintaan_material.id_line=line.id_line  ");
    }
}
