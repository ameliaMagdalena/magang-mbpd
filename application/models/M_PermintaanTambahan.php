<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PermintaanTambahan extends CI_Model {
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

    function get_last_id($idcode){
        return $this->db->query("SELECT id_permintaan_tambahan FROM permintaan_tambahan 
        WHERE id_permintaan_tambahan LIKE '$idcode%' ORDER BY id_permintaan_tambahan DESC LIMIT 1");
    }

    function select_all_aktif($nmline){
        return $this->db->query("SELECT permintaan_tambahan.id_permintaan_tambahan,permintaan_tambahan.id_permintaan_tambahan,permintaan_tambahan.jumlah_tambah,
        permintaan_tambahan.status,sub_jenis_material.nama_sub_jenis_material,
        sub_jenis_material.satuan_keluar,permintaan_tambahan.waktu_add
        FROM permintaan_tambahan,detail_permintaan_material,permintaan_material,konsumsi_material,sub_jenis_material,line
        WHERE permintaan_tambahan.status_delete='0' AND line.nama_line='$nmline' AND 
        permintaan_tambahan.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material AND
        detail_permintaan_material.id_konsumsi_material=konsumsi_material.id_konsumsi_material AND
        konsumsi_material.id_sub_jenis_material=sub_jenis_material.id_sub_jenis_material AND 
        permintaan_material.id_line=line.id_line AND 
        permintaan_material.id_permintaan_material=detail_permintaan_material.id_permintaan_material");
    }

    function get_one_permat($id){
        return $this->db->query("SELECT permintaan_tambahan.id_permintaan_tambahan,permintaan_tambahan.jumlah_tambah,
        permintaan_tambahan.status,sub_jenis_material.nama_sub_jenis_material,detail_permintaan_material.id_permintaan_material,
        sub_jenis_material.satuan_keluar,permintaan_tambahan.waktu_add,sub_jenis_material.satuan_keluar,permintaan_tambahan.keterangan
        FROM permintaan_tambahan,detail_permintaan_material,konsumsi_material,sub_jenis_material
        WHERE permintaan_tambahan.status_delete='0' AND permintaan_tambahan.id_permintaan_tambahan='$id' AND 
        permintaan_tambahan.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material AND
        detail_permintaan_material.id_konsumsi_material=konsumsi_material.id_konsumsi_material AND
        konsumsi_material.id_sub_jenis_material=sub_jenis_material.id_sub_jenis_material ");
    }

    function cek_batal($tanggal){
        $this->db->query(" UPDATE permintaan_tambahan SET status='4' WHERE (status BETWEEN 0 AND 1) AND waktu_add<'$tanggal' ");
    }

    function selectPermintaanTambahanAktif(){
        return $this->db->query("SELECT * FROM permintaan_tambahan
        WHERE status_delete='0'");
    }
    
    function selectSatuPermintaanTambahanAktif($id){
        return $this->db->query("SELECT * FROM permintaan_tambahan a
        JOIN detail_permintaan_material b ON a.id_detail_permintaan_material=b.id_detail_permintaan_material
        JOIN konsumsi_material c ON b.id_konsumsi_material=c.id_konsumsi_material
        JOIN sub_jenis_material d ON c.id_sub_jenis_material=d.id_sub_jenis_material
        WHERE a.status_delete='0' AND a.id_permintaan_tambahan='$id'");
    }
}
