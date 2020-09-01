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

    function selectDetailSupplier($id){
        return $this->db->query("SELECT * FROM detail_supplier WHERE status_delete=0 AND id_supplier=$id");
    }

}
