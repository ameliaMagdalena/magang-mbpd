<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SpesifikasiJabatan extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM spesifikasi_jabatan");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM spesifikasi_jabatan,jabatan,departemen WHERE
        spesifikasi_jabatan.id_jabatan = jabatan.id_jabatan AND 
        spesifikasi_jabatan.id_departemen = departemen.id_departemen AND spesifikasi_jabatan.status_delete='0'");
    }

    function cari_spesifikasi_jabatan($id_departemen,$id_jabatan){
        return $this->db->query("SELECT * FROM spesifikasi_jabatan WHERE 
        id_departemen ='$id_departemen' AND  id_jabatan='$id_jabatan' AND status_delete='0'");
    }

    function cari_sjabatan($id_departemen){
        return $this->db->query("SELECT * FROM spesifikasi_jabatan,jabatan WHERE 
        id_departemen ='$id_departemen' AND spesifikasi_jabatan.id_jabatan = jabatan.id_jabatan 
        AND spesifikasi_jabatan.status_delete='0'");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }
    
    function select_user_add($id){
        return $this->db->query("SELECT user_add, waktu_add FROM spesifikasi_jabatan WHERE id_spesifikasi_jabatan='$id'");
    }

    function cari_user($id){
        return $this->db->query("SELECT karyawan.nama_karyawan
        FROM user,karyawan WHERE user.id_user='$id' AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM spesifikasi_jabatan_logs WHERE id_spesifikasi_jabatan='$id' 
        ORDER BY id_spesifikasi_jabatan_logs DESC");
    }

}
