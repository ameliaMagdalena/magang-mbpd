<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Departemen extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM departemen");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM departemen WHERE status_delete='0' ORDER BY nama_departemen ASC");
    }

    function cari_departemen($nama_departemen){
        return $this->db->query("SELECT * FROM departemen WHERE nama_departemen='$nama_departemen' AND status_delete='0'");
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
