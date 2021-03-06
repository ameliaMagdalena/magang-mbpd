<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PengeluaranMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllPengeluaranMaterial(){
        return $this->db->query("SELECT * FROM pengeluaran_material");
    }

    function selectPengeluaranMaterialAktif(){
        return $this->db->query("SELECT * FROM pengeluaran_material a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material=c.id_jenis_material
        WHERE a.status_delete=0");
    }

    function insert($data){
        $this->db->insert('pengeluaran_material', $data);
    }

    function edit($data,$where){
        $this->db->update('pengeluaran_material', $data, $where);
    }

    function hapus($data,$where){
        $this->db->update('pengeluaran_material', $data, $where);
    }

}
