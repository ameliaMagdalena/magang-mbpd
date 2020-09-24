<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UkuranProduk extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM ukuran_produk");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM ukuran_produk,jenis_produk WHERE 
        jenis_produk.id_jenis_produk = ukuran_produk.id_jenis_produk AND ukuran_produk.status_delete='0'");
    }

    function cari_ukuran_produk($id_jp,$ukuran,$satuan){
        return $this->db->query("SELECT * FROM ukuran_produk WHERE id_jenis_produk='$id_jp' AND ukuran_produk='$ukuran' 
        AND satuan_ukuran='$satuan' AND status_delete='0' ");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT ukuran_produk.waktu_add, karyawan.nama_karyawan FROM ukuran_produk, user, karyawan
        WHERE ukuran_produk.id_ukuran_produk = '$id' AND ukuran_produk.user_add = user.id_user AND
        user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM ukuran_produk_logs WHERE id_ukuran_produk='$id' ORDER BY id_ukuran_produk_logs DESC");
    }


}
