<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Material extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllMaterial(){
        return $this->db->query("SELECT * FROM material");
    }

    function selectMaterialAktif(){
        return $this->db->query("SELECT * FROM material JOIN sub_jenis_material
        ON material.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material
        JOIN jenis_material ON jenis_material.id_jenis_material = sub_jenis_material.id_jenis_material
        JOIN supplier ON material.id_supplier = supplier.id_supplier
        WHERE material.status_delete=0");
    }

    function editMaterial($data,$where){
        $this->db->update('material', $data, $where);
    }

    function hapusMaterial($data,$where){
        $this->db->update('material', $data, $where);
    }



    function selectSubJenisMaterialAktif(){
        return $this->db->query("SELECT * FROM sub_jenis_material a
        JOIN jenis_material b ON a.id_jenis_material=b.id_jenis_material
        WHERE a.status_delete=0");
    }
}
