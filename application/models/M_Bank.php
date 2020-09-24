<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bank extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM bank");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM bank WHERE status_delete='0' ORDER BY nama_bank ASC");
    }

    
    function cari_bank($nama_bank){
        return $this->db->query("SELECT * FROM bank WHERE nama_bank='$nama_bank' AND status_delete='0'");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT bank.waktu_add, karyawan.nama_karyawan 
        FROM bank, user, karyawan WHERE
        bank.id_bank = '$id' AND bank.user_add = user.id_user AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM bank_logs WHERE id_bank='$id' ORDER BY id_bank_logs DESC");
    }
    
}
