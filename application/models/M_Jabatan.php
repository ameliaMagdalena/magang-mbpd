<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jabatan extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM jabatan");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM jabatan WHERE status_delete='0' ORDER BY nama_jabatan ASC");
    }

    function cari_jabatan($nama_jabatan){
        return $this->db->query("SELECT * FROM jabatan WHERE nama_jabatan='$nama_jabatan' AND status_delete='0'");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT user_add, waktu_add FROM jabatan 
        WHERE id_jabatan='$id'");
    }

    function cari_user($id){
        return $this->db->query("SELECT karyawan.nama_karyawan
        FROM user,karyawan WHERE user.id_user='$id' AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM jabatan_logs WHERE id_jabatan='$id' 
        ORDER BY id_jabatan_logs DESC");
    }

}
