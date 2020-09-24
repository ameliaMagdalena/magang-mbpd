<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Line extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function cek_pic_line($id_pic){
        return $this->db->query("SELECT * FROM line WHERE id_user='$id_pic'");
    }

    function select_all(){
        return $this->db->query("SELECT * FROM line");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM line WHERE status_delete='0'");
    }

    function select_line_pic(){
        return $this->db->query("SELECT * FROM line,user WHERE line.status_delete='0' AND line.id_user = user.id_user");
    }

    function select_pic(){
        return $this->db->query("SELECT * FROM user,departemen,jabatan WHERE user.id_jabatan=jabatan.id_jabatan
        AND user.id_departemen=departemen.id_departemen AND jabatan.nama_jabatan='PIC' AND
         departemen.nama_departemen='Produksi' AND user.id_user NOT IN(SELECT id_user FROM line); ");
    }


    function cari_line($nama_line){
        return $this->db->query("SELECT * FROM line WHERE nama_line='$nama_line' AND status_delete='0' ");
    }

    function cari_line_id($id_line){
        return $this->db->query("SELECT * FROM line WHERE id_line='$id_line' AND status_delete='0' ");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT line.waktu_add, karyawan.nama_karyawan FROM line, user, karyawan
        WHERE line.id_line = '$id' AND line.user_add = user.id_user AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM line_logs WHERE id_line='$id' ORDER BY id_line_logs DESC");
    }
}
