<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_JenisProduk extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM jenis_produk");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM jenis_produk WHERE status_delete='0'");
    }

    function cari_jenis_produk($nama_jenis_produk){
        return $this->db->query("SELECT * FROM jenis_produk WHERE nama_jenis_produk='$nama_jenis_produk' AND 
        status_delete='0' ");
    }
    

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT jenis_produk.waktu_add, karyawan.nama_karyawan FROM jenis_produk, user, karyawan
        WHERE jenis_produk.id_jenis_produk = '$id' AND jenis_produk.user_add = user.id_user AND
        user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM jenis_produk_logs WHERE id_jenis_produk='$id' ORDER BY id_jenis_produk_logs DESC");
    }
    

}
