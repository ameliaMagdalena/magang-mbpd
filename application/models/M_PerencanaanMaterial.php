<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PerencanaanMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectPermintaanMaterialAktif(){
        return $this->db->query("SELECT * FROM permintaan_material a
        JOIN detail_purchase_order_customer b ON a.id_detail_purchase_order_customer = b.id_detail_purchase_order_customer
        JOIN line c ON a.id_line = c.id_line
        JOIN detail_produk d ON b.id_detail_produk = d.id_detail_produk
        JOIN produk e ON d.id_produk = e.id_produk
        WHERE a.status_delete='0'");
    }

    function selectSatuPermintaanMaterial($id){
        return $this->db->query("SELECT * FROM permintaan_material a
        JOIN detail_purchase_order_customer b ON a.id_detail_purchase_order_customer = b.id_detail_purchase_order_customer
        JOIN line c ON a.id_line = c.id_line
        JOIN detail_produk d ON b.id_detail_produk = d.id_detail_produk
        JOIN produk e ON d.id_produk = e.id_produk
        WHERE a.status_delete=0 AND a.id_permintaan_material='$id'");
    }

    function insertPermintaanMaterial($data){
        $this->db->insert('permintaan_material', $data);
    }

    function editPermintaanMaterial($data,$where){
        $this->db->update('permintaan_material', $data, $where);
    }

    function hapusPermintaanMaterial($data,$where){
        $this->db->update('permintaan_material', $data, $where);
    }


    /* function get_one_permat($id){
        return $this->db->query(" SELECT * FROM permintaan_material,detail_purchase_order_customer,purchase_order_customer,line
        WHERE id_permintaan_material='$id' 
        AND permintaan_material.id_detail_purchase_order_customer=detail_purchase_order_customer.id_detail_purchase_order_customer 
        AND purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer 
        AND permintaan_material.id_line=line.id_line ");
    }

    function get_one_detpermat($id){
        return $this->db->query(" SELECT * FROM detail_permintaan_material,konsumsi_material,sub_jenis_material WHERE id_permintaan_material='$id' 
        AND detail_permintaan_material.status_delete='0'AND detail_permintaan_material.id_konsumsi_material=konsumsi_material.id_konsumsi_material
        AND sub_jenis_material.id_sub_jenis_material=konsumsi_material.id_sub_jenis_material");
    }*/

    function selectDetailPermintaanMaterialAktif(){
        return $this->db->query("SELECT * FROM detail_permintaan_material a
        JOIN permintaan_material b ON a.id_permintaan_material = b.id_permintaan_material
        JOIN konsumsi_material c ON a.id_konsumsi_material = c.id_konsumsi_material
        JOIN sub_jenis_material d ON c.id_sub_jenis_material = d.id_sub_jenis_material
        WHERE a.status_delete = '0'");
    }

    function selectSatuDetailPermintaanMaterial($id){
        return $this->db->query("SELECT * FROM detail_permintaan_material a
        JOIN permintaan_material b ON a.id_permintaan_material = b.id_permintaan_material
        JOIN konsumsi_material c ON a.id_konsumsi_material = c.id_konsumsi_material
        JOIN sub_jenis_material d ON c.id_sub_jenis_material = d.id_sub_jenis_material
        WHERE a.status_delete = '0' AND a.id_permintaan_material='$id'");
    }

    function selectSatuDetailPermintaan2($id){
        return $this->db->query("SELECT * FROM detail_permintaan_material a
        JOIN permintaan_material b ON a.id_permintaan_material = b.id_permintaan_material
        JOIN konsumsi_material c ON a.id_konsumsi_material = c.id_konsumsi_material
        JOIN sub_jenis_material d ON c.id_sub_jenis_material = d.id_sub_jenis_material
        WHERE a.status_delete = '0' AND a.id_detail_permintaan_material='$id'");
    }

    function selectKetersediaanMaterial(){
        return $this->db->query("SELECT * FROM material a
        JOIN pemasukan_material b ON a.id_pemasukan_material = b.id_pemasukan_material
        JOIN sub_jenis_material c ON b.id_sub_jenis_material = c.id_sub_jenis_material
        WHERE a.status_delete = '0' AND a.status_keluar='0'");
    }

    function selectPengambilanMaterial($id){
        return $this->db->query("SELECT * FROM pengambilan_material a
        JOIN detail_permintaan_material b ON a.id_detail_permintaan_material = b.id_detail_permintaan_material
        JOIN karyawan c ON a.id_karyawan = c.id_karyawan
        JOIN konsumsi_material d ON b.id_konsumsi_material = d.id_konsumsi_material
        WHERE a.status_delete = '0' AND b.id_permintaan_material='$id'");
    }

    function selectSatuPengambilanMaterial($id){
        return $this->db->query("SELECT * FROM pengambilan_material a
        JOIN detail_permintaan_material b ON a.id_detail_permintaan_material = b.id_detail_permintaan_material
        JOIN karyawan c ON a.id_karyawan = c.id_karyawan
        JOIN konsumsi_material d ON b.id_konsumsi_material = d.id_konsumsi_material
        JOIN permintaan_material e ON b.id_permintaan_material = e.id_permintaan_material
        JOIN line f ON e.id_line = f.id_line
        JOIN sub_jenis_material g ON d.id_sub_jenis_material = g.id_sub_jenis_material
        WHERE a.status_delete = '0' AND a.id_pengambilan_material='$id'");
    }

    function selectPengeluaranMaterial($id){
        return $this->db->query("SELECT * FROM pengambilan_material a
        JOIN detail_permintaan_material b ON a.id_detail_permintaan_material = b.id_detail_permintaan_material
        JOIN karyawan c ON a.id_karyawan = c.id_karyawan
        JOIN konsumsi_material d ON b.id_konsumsi_material = d.id_konsumsi_material
        JOIN pengeluaran_material e ON a.id_pengeluaran_material = e.id_pengeluaran_material
        WHERE a.status_delete = '0' 
        /* AND d.id_sub_jenis_material = e.id_sub_jenis_material */
        AND b.id_permintaan_material='$id' AND a.status_keluar=1");
    }
}
