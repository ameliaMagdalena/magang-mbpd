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
        JOIN jenis_material c ON b.id_jenis_material=c.id_jenis_material
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

    
    function selectPemasukanDN(){
        return $this->db->query("SELECT * FROM delivery_note a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        WHERE a.status_delete=0 AND a.status_pengesahan=1");
    }

    function selectTanggalTerima($id){
        return $this->db->query("SELECT tanggal_penerimaan FROM delivery_note
        WHERE status_delete=0 AND id_delivery_note='$id'");
    }

    function selectSupplierDN($id){
        return $this->db->query("SELECT nama_supplier FROM delivery_note a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        WHERE a.status_delete=0 AND a.id_delivery_note='$id'");
    }

    function selectMaterialAktif(){
        return $this->db->query("SELECT * FROM material a
        JOIN pemasukan_material b ON a.id_pemasukan_material = b.id_pemasukan_material
        JOIN sub_jenis_material c ON b.id_sub_jenis_material = c.id_sub_jenis_material
        JOIN jenis_material d ON c.id_jenis_material = d.id_jenis_material
        WHERE a.status_delete=0
        GROUP BY a.id_pemasukan_material");
    }

    
    function selectSatuanUkuran($id){
        return $this->db->query("SELECT satuan_ukuran FROM sub_jenis_material
        WHERE status_delete=0 AND id_sub_jenis_material='$id'");
    }

}
