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
        return $this->db->query("SELECT * FROM material a
        JOIN pemasukan_material b ON a.id_pemasukan_material = b.id_pemasukan_material
        JOIN sub_jenis_material c ON b.id_sub_jenis_material = c.id_sub_jenis_material
        JOIN jenis_material d ON c.id_jenis_material = d.id_jenis_material
        WHERE a.status_delete=0");
    }

    function insertMaterial($data){
        $this->db->insert('material', $data);
    }

    function editMaterial($data,$where){
        $this->db->update('material', $data, $where);
    }

    function hapusMaterial($data,$where){
        $this->db->update('material', $data, $where);
    }


    //------------------- MATERIAL SUPPLIER ---------------------//
    function selectAllMaterialSupplier(){
        return $this->db->query("SELECT * FROM material_supplier");
    }
    
    function selectMaterialSupplierAktif(){
        return $this->db->query("SELECT * FROM material_supplier a
        JOIN detail_delivery_note b ON a.id_detail_delivery_note=b.id_detail_delivery_note
        JOIN detail_purchase_order_supplier c ON b.id_detail_purchase_order_supplier=c.id_detail_purchase_order_supplier
        JOIN purchase_order_supplier d ON c.id_purchase_order_supplier=d.id_purchase_order_supplier
        JOIN supplier e ON d.id_supplier=e.id_supplier
        JOIN material f ON a.id_material=f.id_material
        JOIN pemasukan_material g ON f.id_pemasukan_material=g.id_pemasukan_material
        JOIN delivery_note h ON b.id_delivery_note=h.id_delivery_note
        WHERE a.status_delete=0");
    }

    function insertMaterialSupplier($data){
        $this->db->insert('material_supplier', $data);
    }

    function editMaterialSupplier($data,$where){
        $this->db->update('material_supplier', $data, $where);
    }

    function hapusMaterialSupplier($data,$where){
        $this->db->update('material_supplier', $data, $where);
    }


    //------------------- MATERIAL LINE ---------------------//
    function selectAllMaterialLine(){
        return $this->db->query("SELECT * FROM material_line");
    }

    function selectMaterialLineAktif(){
        return $this->db->query("SELECT * FROM material_line a
        JOIN material b ON a.id_material=b.id_material
        JOIN line c ON a.id_line=c.id_line
        JOIN pemasukan_material d ON b.id_pemasukan_material=d.id_pemasukan_material
        WHERE a.status_delete=0");
    }

    function insertMaterialLine($data){
        $this->db->insert('material_line', $data);
    }

    function edittMaterialLine($data,$where){
        $this->db->update('material_line', $data, $where);
    }

    function hapustMaterialLine($data,$where){
        $this->db->update('material_line', $data, $where);
    }



    function selectSubJenisMaterialAktif(){
        return $this->db->query("SELECT * FROM sub_jenis_material a
        JOIN jenis_material b ON a.id_jenis_material=b.id_jenis_material
        WHERE a.status_delete=0");
    }
}
