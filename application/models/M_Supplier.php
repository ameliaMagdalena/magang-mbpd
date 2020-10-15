<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Supplier extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllSupplier(){
        return $this->db->query("SELECT * FROM supplier");
    }

    function selectSupplierAktif(){
        return $this->db->query("SELECT * FROM supplier WHERE status_delete=0");
    }
    
    function selectSatuSupplier($id){
        return $this->db->query("SELECT * FROM supplier WHERE status_delete=0 AND id_supplier='" . $id['id_supplier'] . "'");
    }

    function insertSupplier($data){
        $this->db->insert('supplier', $data);
    }

    function editSupplier($data,$where){
        $this->db->update('supplier', $data, $where);
    }

    function hapusSupplier($data,$where){
        $this->db->update('supplier', $data, $where);
    }



    function selectAllDetailSupplier(){
        return $this->db->query("SELECT * FROM detail_supplier");
    }

    function selectDetailSupplierAktif(){
        return $this->db->query("SELECT * FROM detail_supplier a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        JOIN sub_jenis_material c ON a.id_sub_jenis_material = c.id_sub_jenis_material
        WHERE a.status_delete=0");
    }

    function selectSatuDetailSupplier($id){
        return $this->db->query("SELECT * FROM detail_supplier a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        WHERE a.status_delete=0 AND a.id_supplier='" . $id['id_supplier'] . "'");
    }



    function selectSubJenisMaterial(){
        return $this->db->query("SELECT * FROM sub_jenis_material a
        JOIN jenis_material b ON a.id_jenis_material = b.id_jenis_material
        WHERE a.status_delete=0");
    }
    
    function insertDetailSupplier($data){
        $this->db->insert('detail_supplier', $data);
    }

    function editDetailSupplier($data,$where){
        $this->db->update('detail_supplier', $data, $where);
    }

    function hapusDetailSupplier($data,$where){
        $this->db->update('detail_supplier', $data, $where);
    }
}
