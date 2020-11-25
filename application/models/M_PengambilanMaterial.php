<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PengambilanMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectPengambilanMaterial(){
        return $this->db->query("SELECT * FROM pengambilan_material
        WHERE status_delete = 0");
    }

    function selectAllPengambilanMaterial(){
        return $this->db->query("SELECT * FROM pengambilan_material");
    }

    function editPengambilanMaterial($data,$where){
        $this->db->update('pengambilan_material', $data, $where);
    }

}
