<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanLembur extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }
    
    function select_all_aktif(){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND 
        (surat_perintah_lembur.status_spl BETWEEN 3 AND 5)");
    }

    function select_ll_pic($line,$tanggal){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND line.nama_line='$line' AND 
        (surat_perintah_lembur.status_spl BETWEEN 3 AND 5) AND surat_perintah_lembur.tanggal<='$tanggal' ");
    }

    function select_spl_pic_status($line,$status,$tanggal){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND line.nama_line='$line' AND
        surat_perintah_lembur.status_spl = '$status'  AND surat_perintah_lembur.tanggal<='$tanggal'");
    }

    function get_spl($id){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE surat_perintah_lembur.id_surat_perintah_lembur = '$id'
        AND surat_perintah_lembur.id_line = line.id_line");
    }

    function get_dspl($id){
        return $this->db->query("SELECT * FROM detail_surat_perintah_lembur,karyawan WHERE detail_surat_perintah_lembur.id_surat_perintah_lembur = '$id'
        AND detail_surat_perintah_lembur.status_delete = 0 AND detail_surat_perintah_lembur.id_karyawan = karyawan.id_karyawan");
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function select_ll_pic_status($line,$status){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND line.nama_line='$line' AND
        surat_perintah_lembur.status_spl = '$status' ");
    }
    
    function select_all_aktif_status($status){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND
        surat_perintah_lembur.status_spl = '$status' ");
    }
   

}
