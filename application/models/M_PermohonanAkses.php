<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PermohonanAkses extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_all_aktif(){
        return $this->db->query("SELECT permohonan_akses.id_permohonan_akses,permohonan_akses.id_data,permohonan_akses.id_user,
        permohonan_akses.tanggal,permohonan_akses.nama_permohonan_akses,permohonan_akses.keterangan,permohonan_akses.status_permohonan,
        karyawan.nama_karyawan
        FROM permohonan_akses,user,karyawan 
        WHERE permohonan_akses.status_delete='0' AND permohonan_akses.id_user=user.id_user AND user.id_karyawan=karyawan.id_karyawan
        ORDER BY permohonan_akses.id_permohonan_akses DESC ");
    }

    function select_all_aktif_by_user($id_user){
        return $this->db->query(" SELECT permohonan_akses.id_permohonan_akses,permohonan_akses.id_data,permohonan_akses.id_user,
        permohonan_akses.tanggal,permohonan_akses.nama_permohonan_akses,permohonan_akses.keterangan,permohonan_akses.status_permohonan,
        karyawan.nama_karyawan
        FROM permohonan_akses,user,karyawan 
        WHERE permohonan_akses.status_delete='0' AND permohonan_akses.id_user=user.id_user AND user.id_karyawan=karyawan.id_karyawan 
        AND permohonan_akses.id_user='$id_user' ORDER BY permohonan_akses.id_permohonan_akses DESC ");
    }

    function get_last_id(){
        return $this->db->query("SELECT id_permohonan_akses FROM permohonan_akses ORDER BY id_permohonan_akses DESC LIMIT 1");
    }
    
    function select_belum_selesai_by_id($id_user){
        return $this->db->query("SELECT * FROM permohonan_akses WHERE status_delete='0' AND (status_permohonan BETWEEN 0 AND 1)
        AND id_user='$id_user' ");
    }

    function get_one($id){
        return $this->db->query("SELECT * FROM permohonan_akses WHERE id_permohonan_akses='$id' ");
    }

    function get_one_id($id_data){
        return $this->db->query("SELECT id_permohonan_akses FROM permohonan_akses WHERE id_data='$id_data' AND status_permohonan='1'  ");
    }

    
}
