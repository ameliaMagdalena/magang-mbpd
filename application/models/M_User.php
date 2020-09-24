<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllUser(){
        return $this->db->query("SELECT * FROM user");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM user,karyawan WHERE user.id_karyawan = karyawan.id_karyawan
        AND user.status_delete='0'");
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_all_userjabatandepartemen(){
        return $this->db->query("SELECT  * FROM user,karyawan,jabatan_karyawan,spesifikasi_jabatan,departemen,jabatan
        WHERE user.id_karyawan = karyawan.id_karyawan AND karyawan.id_karyawan = jabatan_karyawan.id_karyawan
        AND spesifikasi_jabatan.id_spesifikasi_jabatan = jabatan_karyawan.id_spesifikasi_jabatan AND 
        jabatan.id_jabatan = spesifikasi_jabatan.id_jabatan AND 
        departemen.id_departemen = spesifikasi_jabatan.id_departemen");
    }

    function select_user_add($id){
        return $this->db->query("SELECT user_add, waktu_add FROM user 
        WHERE id_user='$id'");
    }

    function cari_user($id){
        return $this->db->query("SELECT karyawan.nama_karyawan
        FROM user,karyawan WHERE user.id_user='$id' AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM user_logs WHERE id_user='$id' 
        ORDER BY id_user_logs DESC");
    }
}
