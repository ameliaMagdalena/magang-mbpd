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

    function cari_nik($nik_karyawan){
        return $this->db->query("SELECT * FROM karyawan WHERE nik='$nik_karyawan' AND status_delete='0'");
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
        jabatan_karyawan.status_delete='0' AND
        jabatan_karyawan.id_spesifikasi_jabatan = spesifikasi_jabatan.id_spesifikasi_jabatan AND
        spesifikasi_jabatan.id_jabatan = jabatan.id_jabatan AND spesifikasi_jabatan.id_departemen = departemen.id_departemen");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function get_one_karyawan($id){
        return $this->db->query("SELECT * FROM karyawan WHERE id_karyawan='$id' ");
    }

    function get_one_user($id){
        return $this->db->query("SELECT * FROM user WHERE id_karyawan='$id' ");
    }

    function get_one_jabatan_karyawan($id){
        return $this->db->query("SELECT * FROM jabatan_karyawan,spesifikasi_jabatan,jabatan,departemen
        WHERE jabatan_karyawan.id_karyawan='$id' AND jabatan_karyawan.status_delete='0'
        AND jabatan_karyawan.id_spesifikasi_jabatan=spesifikasi_jabatan.id_spesifikasi_jabatan
        AND spesifikasi_jabatan.id_departemen=departemen.id_departemen AND spesifikasi_jabatan.id_jabatan=jabatan.id_jabatan ");
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function cari_user($id){
        return $this->db->query("SELECT karyawan.nama_karyawan
        FROM user,karyawan WHERE user.id_user='$id' AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_user_add($id){
        return $this->db->query("SELECT karyawan.waktu_add, karyawan.user_add FROM karyawan WHERE karyawan.id_karyawan = '$id' ");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM karyawan_logs WHERE id_karyawan='$id' ORDER BY id_karyawan_logs DESC");
    }
}
