<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Warna extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM warna");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM warna WHERE status_delete='0' ORDER BY nama_warna ASC");
    }

    function cari_warna($nama_warna){
        return $this->db->query("SELECT * FROM warna WHERE nama_warna='$nama_warna' AND status_delete='0'");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT warna.waktu_add, karyawan.nama_karyawan FROM warna, user, karyawan
        WHERE warna.id_warna = '$id' AND warna.user_add = user.id_user AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM warna_logs WHERE id_warna='$id' ORDER BY id_warna_logs DESC");
    }

}
