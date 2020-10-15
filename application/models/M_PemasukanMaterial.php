<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PemasukanMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllPemasukanMaterial(){
        return $this->db->query("SELECT * FROM pemasukan_material");
    }

    function selectPemasukanMaterialAktif(){
        return $this->db->query("SELECT * FROM pemasukan_material a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN detail_supplier c ON b.id_sub_jenis_material = c.id_sub_jenis_material
        WHERE a.status_delete=0");
    }

    function insertPemasukanMaterial($data){
        $this->db->insert('pemasukan_material', $data);
    }

    function editPemasukanMaterial($data,$where){
        $this->db->update('pemasukan_material', $data, $where);
    }

    function hapusPemasukanMaterial($data,$where){
        $this->db->update('pemasukan_material', $data, $where);
    }

}
