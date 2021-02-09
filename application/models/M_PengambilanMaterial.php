<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PengambilanMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectPengambilanMaterial(){
        return $this->db->query("SELECT * FROM pengambilan_material
        WHERE status_delete = 0");
    }

    function selectAllPengambilanMaterial(){
        return $this->db->query("SELECT * FROM pengambilan_material");
    }

    function editPengambilanMaterial($data,$where){
        $this->db->update('pengambilan_material', $data, $where);
    }

    function selectPengambilanDetail(){
        return $this->db->query("SELECT * FROM pengambilan_material a
        JOIN detail_permintaan_material b ON a.id_detail_permintaan_material=b.id_detail_permintaan_material
        JOIN permintaan_material c ON b.id_permintaan_material=c.id_permintaan_material
        JOIN konsumsi_material d ON b.id_konsumsi_material=d.id_konsumsi_material
        JOIN sub_jenis_material e ON d.id_sub_jenis_material=e.id_sub_jenis_material
        JOIN jenis_material f ON e.id_jenis_material=f.id_jenis_material
        WHERE a.status_delete = 0");
    }

    function selectPengambilanToday(){
        return $this->db->query("SELECT * FROM pengambilan_material a
        JOIN detail_permintaan_material b ON a.id_detail_permintaan_material=b.id_detail_permintaan_material
        JOIN permintaan_material c ON b.id_permintaan_material=c.id_permintaan_material
        JOIN konsumsi_material d ON b.id_konsumsi_material=d.id_konsumsi_material
        JOIN sub_jenis_material e ON d.id_sub_jenis_material=e.id_sub_jenis_material
        JOIN jenis_material f ON e.id_jenis_material=f.id_jenis_material
        WHERE a.status_delete = 0 AND DATE(a.tanggal_ambil)=CURDATE()");
    }

}
