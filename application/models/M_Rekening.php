<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rekening extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM rekening");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM rekening,bank WHERE rekening.id_bank = bank.id_bank AND
        rekening.status_delete='0'");
    }

    function select_default(){
        return $this->db->query("SELECT * FROM rekening,bank WHERE rekening.status_delete='0' 
        AND  rekening.keterangan ='1' AND rekening.id_bank=bank.id_bank");
    }

    function cari_rekening($nomor_rekening){
        return $this->db->query("SELECT * FROM rekening WHERE nomor_rekening='$nomor_rekening'
        AND status_delete='0' ");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_user_add($id){
        return $this->db->query("SELECT rekening.waktu_add, karyawan.nama_karyawan FROM rekening, user, karyawan WHERE
        rekening.id_rekening = '$id' AND rekening.user_add = user.id_user AND user.id_karyawan = karyawan.id_karyawan");
    }

    function select_log($id){
        return $this->db->query("SELECT * FROM rekening_logs WHERE id_rekening='$id' ORDER BY id_rekening_logs DESC");
    }
}
