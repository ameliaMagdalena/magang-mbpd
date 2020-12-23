<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM produk");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM produk,jenis_produk WHERE produk.status_delete='0' 
        AND produk.id_jenis_produk=jenis_produk.id_jenis_produk ");
    }

    function select_all_jenis_material(){
        return $this->db->query("SELECT * FROM jenis_material WHERE status_delete='0' ");
    }

    function cari_material($id_jenis_material){
        return $this->db->query("SELECT * FROM sub_jenis_material,jenis_material WHERE 
        jenis_material.id_jenis_material = '$id_jenis_material' AND 
        jenis_material.id_jenis_material = sub_jenis_material.id_jenis_material");
    }

    function select_all_km(){
        return $this->db->query("SELECT * FROM konsumsi_material WHERE status_delete='0'");
    }

    function select_all_km_aktif(){
        return $this->db->query("SELECT * FROM konsumsi_material");
    }

    function select_all_ct(){
        return $this->db->query("SELECT * FROM cycle_time WHERE status_delete='0'");
    }

    function select_all_ct_lengkap(){
        return $this->db->query("SELECT * FROM cycle_time,produk,line WHERE cycle_time.id_produk = produk.id_produk
        AND cycle_time.id_line = line.id_line AND cycle_time.status_delete='0'");
    }

    function jumlah_ct_produk(){
        return $this->db->query("SELECT COUNT(cycle_time.id_cycle_time) AS jumlah_ct, produk.id_produk
        FROM produk,cycle_time WHERE produk.id_produk=cycle_time.id_produk GROUP BY produk.id_produk");
    }

    function select_all_detail_produk(){
        return $this->db->query("SELECT * FROM detail_produk WHERE status_delete='0'");
    }

    function select_all_detail_produk_semua(){
        return $this->db->query("SELECT * FROM detail_produk");
    }

    function select_ct_line($id_produk){
        return $this->db->query("SELECT * FROM cycle_time,produk,line WHERE cycle_time.id_produk = produk.id_produk
        AND cycle_time.id_line = line.id_line AND produk.id_produk ='$id_produk'");
    }

    function cari_produk($nama_produk){
        return $this->db->query("SELECT * FROM produk WHERE nama_produk='$nama_produk' AND status_delete='0'");
    }

    function cari_produk_by_kode($kode_produk){
        return $this->db->query("SELECT * FROM detail_produk WHERE kode_produk='$kode_produk' AND status_delete='0'");
    }

    function get_ukprod($id_jp){
        return $this->db->query("SELECT * FROM ukuran_produk WHERE id_jenis_produk='$id_jp' AND status_delete='0'");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

//cari berdasarkan id
    function dcari_produk($id_produk){
        return $this->db->query("SELECT * FROM produk,jenis_produk WHERE produk.id_produk='$id_produk' AND
        produk.id_jenis_produk=jenis_produk.id_jenis_produk");
    }

    function dcari_detail_produk($id_produk){
        return $this->db->query("SELECT * FROM detail_produk WHERE id_produk='$id_produk' AND status_delete='0' ");
    }

    function dcari_warna($id_produk){
        return $this->db->query("SELECT * FROM produk,detail_produk,warna WHERE produk.id_produk='$id_produk'
        AND produk.id_produk=detail_produk.id_produk AND warna.id_warna=detail_produk.id_warna");
    }

    function dcari_ct($id_produk){
        return $this->db->query("SELECT * FROM produk,cycle_time,line WHERE produk.id_produk='$id_produk'
        AND produk.id_produk=cycle_time.id_produk AND line.id_line=cycle_time.id_line");
    }

    function dcari_km($id_produk){
        return $this->db->query("SELECT * FROM produk,konsumsi_material,sub_jenis_material,line WHERE produk.id_produk='$id_produk'
        AND produk.id_produk=konsumsi_material.id_produk AND konsumsi_material.status_delete='0' AND
        sub_jenis_material.id_sub_jenis_material=konsumsi_material.id_sub_jenis_material AND
        line.id_line=konsumsi_material.id_line ");
    }

    function detail_produk_lengkap(){
        return $this->db->query("SELECT * FROM produk,detail_produk,warna,ukuran_produk WHERE 
        produk.id_produk=detail_produk.id_produk AND detail_produk.id_warna=warna.id_warna AND 
        detail_produk.id_ukuran_produk=ukuran_produk.id_ukuran_produk");
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT produk.waktu_add, karyawan.nama_karyawan FROM produk, user, karyawan
        WHERE produk.id_produk = '$id' AND produk.user_add = user.id_user AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM produk_logs WHERE id_produk='$id' ORDER BY id_produk_logs DESC");
    }

}
