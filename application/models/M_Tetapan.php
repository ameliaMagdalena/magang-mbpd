<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tetapan extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM tetapan");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM tetapan WHERE status_delete='0'");
    }

    function cari_tetapan($nama_tetapan){
        return $this->db->query("SELECT * FROM tetapan WHERE nama_tetapan='$nama_tetapan'");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_processing_time(){
        return $this->db->query("SELECT isi_tetapan FROM tetapan WHERE nama_tetapan='Processing time' ");
    }

    function select_user_add($id){
        return $this->db->query("SELECT tetapan.waktu_add, karyawan.nama_karyawan FROM tetapan, user, karyawan
        WHERE tetapan.id_tetapan = '$id' AND tetapan.user_add = user.id_user 
        AND user.id_karyawan = karyawan.id_karyawan ");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM tetapan_logs WHERE id_tetapan='$id' ORDER BY id_tetapan_logs DESC");
    }

    function cari_tetapan_bynama($nama){
        return $this->db->query("SELECT isi_tetapan FROM tetapan WHERE nama_tetapan='$nama'");
    }

}
