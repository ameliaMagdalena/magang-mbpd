<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Karyawan extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM karyawan");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM karyawan WHERE status_delete='0'");
    }

    function cari_karyawan($nama_karyawan){
        return $this->db->query("SELECT * FROM karyawan WHERE nama_karyawan='$nama_karyawan' AND status_delete='0'");
    }

    function cari_karyawan_email($email){
        return $this->db->query("SELECT * FROM karyawan,user WHERE user.email_user='$email' AND user.id_karyawan = karyawan.id_karyawan
        AND karyawan.status_delete='0'");
    }

    function select_all_jabatan_karyawan(){
        return $this->db->query("SELECT * FROM jabatan_karyawan");
    }

    function select_all_jabatan_karyawans(){
        return $this->db->query("SELECT * FROM jabatan_karyawan,spesifikasi_jabatan,departemen,jabatan WHERE
        jabatan_karyawan.id_spesifikasi_jabatan = spesifikasi_jabatan.id_spesifikasi_jabatan AND
        spesifikasi_jabatan.id_jabatan = jabatan.id_jabatan AND spesifikasi_jabatan.id_departemen = departemen.id_departemen");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }






    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT user_add, waktu_add FROM departemen 
        WHERE id_departemen='$id'");
    }

    function cari_user($id){
        return $this->db->query("SELECT karyawan.nama_karyawan
        FROM user,karyawan WHERE user.id_user='$id' AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM departemen_logs WHERE id_departemen='$id' 
        ORDER BY id_departemen_logs DESC");
    }


}
