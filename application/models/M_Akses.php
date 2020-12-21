<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Akses extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }

    function data_user($email,$password){
        return $this->db->query("SELECT * FROM user,karyawan WHERE 
        user.email_user='$email' AND user.password_user='$password' AND 
        user.id_karyawan = karyawan.id_karyawan");
    }

    function data_users($id_karyawan){
        return $this->db->query("SELECT * FROM user,karyawan WHERE 
        user.id_karyawan = '$id_karyawan' AND 
        user.id_karyawan = karyawan.id_karyawan");
    }

    function jabatan_karyawan($id_karyawan){
        return $this->db->query("SELECT * FROM karyawan,jabatan_karyawan,spesifikasi_jabatan,jabatan,departemen
        WHERE karyawan.id_karyawan ='$id_karyawan' AND jabatan_karyawan.status_delete='0'AND 
        karyawan.id_karyawan = jabatan_karyawan.id_karyawan AND
        spesifikasi_jabatan.id_spesifikasi_jabatan = jabatan_karyawan.id_spesifikasi_jabatan
        AND jabatan.id_jabatan = spesifikasi_jabatan.id_jabatan 
        AND departemen.id_departemen  = spesifikasi_jabatan.id_departemen");
    }

}
