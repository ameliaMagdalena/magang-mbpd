<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_InventoryLine extends CI_Model {
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

    function select_all_inventory_line(){
        return $this->db->query("SELECT * FROM persediaan_line");
    }

    function select_inline_line($line){
        return $this->db->query("SELECT * FROM persediaan_line,sub_jenis_material,line
        WHERE line.nama_line='$line' AND persediaan_line.status_delete='0' 
        AND line.id_line=persediaan_line.id_line AND persediaan_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material");
    }

    function select_all(){
        return $this->db->query("SELECT * FROM persediaan_line,sub_jenis_material,line 
        WHERE persediaan_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material AND
        persediaan_line.id_line = line.id_line");
    }

    function get_persediaan_masuk($id){
        return $this->db->query("SELECT persediaan_line_masuk.tanggal, persediaan_line_masuk.jumlah_material, 
        sub_jenis_material.satuan_keluar, persediaan_line_masuk.status 
        FROM persediaan_line_masuk, persediaan_line, sub_jenis_material 
        WHERE persediaan_line_masuk.id_persediaan_line='$id' AND persediaan_line_masuk.status_delete='0' 
        AND persediaan_line_masuk.id_persediaan_line = persediaan_line.id_persediaan_line
        AND persediaan_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material ");
    }

    function get_persediaan_keluar($id){
        return $this->db->query("SELECT persediaan_line_keluar.tanggal, persediaan_line_keluar.jumlah_material,
        sub_jenis_material.satuan_keluar, persediaan_line_keluar.status 
        FROM persediaan_line_keluar, persediaan_line, sub_jenis_material 
        WHERE persediaan_line_keluar.id_persediaan_line='$id' AND persediaan_line_keluar.status_delete='0' 
        AND persediaan_line_keluar.id_persediaan_line = persediaan_line.id_persediaan_line
        AND persediaan_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material ");
    }

    function get_all_sub_jm(){
        return $this->db->query("SELECT * FROM sub_jenis_material WHERE status_delete='0' ");
    }

    function get_all_line(){
        return $this->db->query("SELECT * FROM line WHERE status_delete='0' ");
    }

    function get_satuan($id){
        return $this->db->query("SELECT satuan_keluar FROM sub_jenis_material WHERE id_sub_jenis_material='$id' ");
    }

    function cari_inline($id_line,$id_sub_jm){
        return $this->db->query("SELECT * FROM persediaan_line WHERE id_line='$id_line' AND id_sub_jenis_material='$id_sub_jm' ");
    }

    function get_last_selim_id($id_code){
        return $this->db->query("SELECT id_persediaan_line_masuk FROM persediaan_line_masuk 
        WHERE id_persediaan_line_masuk LIKE '$id_code%' ORDER BY id_persediaan_line_masuk DESC LIMIT 1");
    }

    function get_last_selik_id($id_code){
        return $this->db->query("SELECT id_persediaan_line_keluar FROM persediaan_line_keluar 
        WHERE id_persediaan_line_keluar LIKE '$id_code%' ORDER BY id_persediaan_line_keluar DESC LIMIT 1");
    }

    function get_all_inline(){
        return $this->db->query("SELECT * FROM persediaan_line,sub_jenis_material WHERE persediaan_line.status_delete='0' AND
        persediaan_line.total_material > 0 AND persediaan_line.id_sub_jenis_material=sub_jenis_material.id_sub_jenis_material");
    }

    function get_one_persediaan_line($id){
        return $this->db->query("SELECT * FROM persediaan_line,sub_jenis_material 
        WHERE persediaan_line.status_delete='0' AND persediaan_line.id_persediaan_line='$id' AND 
        persediaan_line.id_sub_jenis_material=sub_jenis_material.id_sub_jenis_material");
    }

}
