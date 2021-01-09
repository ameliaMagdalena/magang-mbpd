<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PembelianMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllPermintaanMaterial(){
        return $this->db->query("SELECT * FROM permintaan_pembelian");
    }

    function selectPermintaanPembelianAktif(){
        return $this->db->query("SELECT * FROM permintaan_pembelian a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        WHERE a.status_delete = 0");
    }

    function selectPermintaanPembeliannya($id){
        return $this->db->query("SELECT * FROM permintaan_pembelian a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        WHERE a.status_delete = 0 AND a.id_permintaan_pembelian='$id'");
    }

    function insertPermintaanPembelian($data){
        $this->db->insert('permintaan_pembelian', $data);
    }

    function editPermintaanPembelian($data,$where){
        $this->db->update('permintaan_pembelian', $data, $where);
    }

    function hapusPermintaanPembelian($data,$where){
        $this->db->update('permintaan_pembelian', $data, $where);
    }

    function selectPermintaanDanSupplier(){
        return $this->db->query("SELECT * FROM permintaan_pembelian a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        JOIN detail_supplier d ON b.id_sub_jenis_material = d.id_sub_jenis_material
        JOIN supplier e ON d.id_supplier = e.id_supplier
        WHERE a.status_delete = 0");
    }
    
    function selectPermintaanDanPO(){
        return $this->db->query("SELECT * FROM permintaan_pembelian a
        JOIN detail_purchase_order_supplier b ON a.id_detail_purchase_order_supplier = b.id_detail_purchase_order_supplier
        JOIN purchase_order_supplier c ON b.id_purchase_order_supplier = c.id_purchase_order_supplier
        WHERE a.status_delete = 0");
    }

    function selectSuppliernya(){
        return $this->db->query("SELECT * FROM permintaan_pembelian a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        JOIN detail_supplier d ON b.id_sub_jenis_material = d.id_sub_jenis_material
        JOIN supplier e ON d.id_supplier = e.id_supplier
        WHERE a.status_delete = 0 GROUP BY nama_supplier");
    }

}
