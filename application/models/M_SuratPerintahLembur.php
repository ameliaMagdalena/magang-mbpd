<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SuratPerintahLembur extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all(){
        return $this->db->query("SELECT * FROM surat_perintah_lembur");
    }

    function select_all_dspl(){
        return $this->db->query("SELECT * FROM detail_surat_perintah_lembur");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line");
    }

    function select_all_aktif_status($status){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND
        surat_perintah_lembur.status_spl = '$status' ");
    }

    function select_spl_pic($line){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND line.nama_line='$line' ");
    }

    function select_spl_pic_status1($line,$status){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND line.nama_line='$line' AND
        surat_perintah_lembur.status_spl = '$status' ");
    }

    function select_spl_pic_status2($line,$status){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE 
        surat_perintah_lembur.status_delete=0 AND surat_perintah_lembur.id_line = line.id_line AND line.nama_line='$line' AND
        surat_perintah_lembur.status_spl BETWEEN $status AND '5'  ");
    }

    function cek_tanggal($tanggal,$id_line){
        return $this->db->query("SELECT * FROM surat_perintah_lembur WHERE tanggal='$tanggal' AND id_line='$id_line'
        AND status_delete='0'");
    }

    function cari_spl($tanggal_spl,$id_line_spl){
        return $this->db->query("SELECT * FROM surat_perintah_lembur WHERE tanggal='$tanggal_spl' AND id_line='$id_line_spl'
        AND status_delete='0'");
    }

    function get_last_spl_id(){
        return $this->db->query("SELECT id_surat_perintah_lembur FROM surat_perintah_lembur ORDER BY id_surat_perintah_lembur DESC LIMIT 1");
    }

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function get_spl($id){
        return $this->db->query("SELECT * FROM surat_perintah_lembur,line WHERE surat_perintah_lembur.id_surat_perintah_lembur = '$id'
        AND surat_perintah_lembur.id_line = line.id_line");
    }

    function get_dspl($id){
        return $this->db->query("SELECT * FROM detail_surat_perintah_lembur,karyawan WHERE detail_surat_perintah_lembur.id_surat_perintah_lembur = '$id'
        AND detail_surat_perintah_lembur.status_delete = 0 AND detail_surat_perintah_lembur.id_karyawan = karyawan.id_karyawan");
    }
    
    function get_karyawan_byjbt($nama_jabatan){
        return $this->db->query("SELECT karyawan.id_karyawan,karyawan.nama_karyawan FROM karyawan,jabatan_karyawan,spesifikasi_jabatan,jabatan 
        WHERE jabatan.nama_jabatan='$nama_jabatan' AND jabatan.id_jabatan = spesifikasi_jabatan.id_jabatan AND 
        spesifikasi_jabatan.id_spesifikasi_jabatan = jabatan_karyawan.id_spesifikasi_jabatan AND 
        jabatan_karyawan.id_karyawan = karyawan.id_karyawan AND karyawan.status_delete='0' ");
    }

    function cek_batal($tanggal){
        $this->db->query(" UPDATE surat_perintah_lembur SET status_spl='6' WHERE status_spl='0' AND tanggal<'$tanggal' ");
    }

}
