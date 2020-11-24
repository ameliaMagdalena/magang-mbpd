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
        WHERE id_permintaan_tambahan LIKE '$id_code%' ORDER BY id_permintaan_tambahan DESC LIMIT 1");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT permintaan_tambahan.jumlah_tambah,permintaan_tambahan.status,sub_jenis_material.nama_sub_jenis_material,
        sub_jenis_material.satuan_keluar,permintaan_tambahan.waktu_add
        FROM permintaan_tambahan,detail_permintaan_material,konsumsi_material,sub_jenis_material
        WHERE permintaan_tambahan.status_delete='0' AND 
        permintaan_tambahan.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material AND
        detail_permintaan_material.id_konsumsi_material=konsumsi_material.id_konsumsi_material AND
        konsumsi_material.id_sub_jenis_material=sub_jenis_material.id_sub_jenis_material ");
    }
}
