<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PerubahanPermintaan extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectPerubahanPermintaanAktif(){
        return $this->db->query("SELECT * FROM perubahan_permintaan a
        JOIN permintaan_material b ON a.id_permintaan_material = b.id_permintaan_material
        JOIN detail_purchase_order_customer c ON b.id_detail_purchase_order_customer = c.id_detail_purchase_order_customer
        JOIN line d ON b.id_line = d.id_line
        JOIN detail_produk e ON c.id_detail_produk = e.id_detail_produk
        JOIN produk f ON e.id_produk = f.id_produk
        WHERE a.status_delete='0'");
    }

    function selectSatuPerubahanPermintaan($id){
        return $this->db->query("SELECT * FROM perubahan_permintaan a
        JOIN permintaan_material b ON a.id_permintaan_material = b.id_permintaan_material
        JOIN detail_purchase_order_customer c ON b.id_detail_purchase_order_customer = c.id_detail_purchase_order_customer
        JOIN line d ON b.id_line = d.id_line
        JOIN detail_produk e ON c.id_detail_produk = e.id_detail_produk
        JOIN produk f ON e.id_produk = f.id_produk
        WHERE a.status_delete=0 AND a.id_perubahan_permintaan='$id'");
    }

    function editPermintaanMaterial($data,$where){
        $this->db->update('permintaan_material', $data, $where);
    }

    function hapusPerubahanPermintaan($data,$where){
        $this->db->update('perubahan_permintaan', $data, $where);
    }

    // -------------------------- PERMINTAAN MATERIAL ------------------------- //
    // ------------------------------------------------------------------------ //
    function selectDetailPermintaanMaterialAktif(){
        return $this->db->query("SELECT * FROM perubahan_permintaan a
        JOIN permintaan_material b ON a.id_permintaan_material = b.id_permintaan_material
        JOIN detail_permintaan_material c ON b.id_permintaan_material = c.id_permintaan_material
        WHERE a.status_delete = '0' AND c.status_delete = '0'");
    }

    function selectSatuDetailPermintaanMaterial($id){
        return $this->db->query("SELECT * FROM perubahan_permintaan a
        JOIN permintaan_material b ON a.id_permintaan_material = b.id_permintaan_material
        JOIN detail_permintaan_material c ON b.id_permintaan_material = c.id_permintaan_material
        JOIN konsumsi_material d ON c.id_konsumsi_material = d.id_konsumsi_material
        JOIN sub_jenis_material e ON d.id_sub_jenis_material = e.id_sub_jenis_material
        WHERE a.status_delete = '0' AND a.id_permintaan_material='$id'");
    }

    /* function selectKetersediaanMaterial($id){
        return $this->db->query("SELECT * FROM material a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        WHERE a.status_delete = '0' AND a.status_keluar='0'
        AND a.id_sub_jenis_material='$id'");
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
    } */
}
