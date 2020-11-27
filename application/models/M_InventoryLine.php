<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_InventoryLine extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
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
        sub_jenis_material.satuan_keluar 
        FROM persediaan_line_masuk, persediaan_line, sub_jenis_material 
        WHERE persediaan_line_masuk.id_persediaan_line='$id' AND persediaan_line_masuk.status_delete='0' 
        AND persediaan_line_masuk.id_persediaan_line = persediaan_line.id_persediaan_line
        AND persediaan_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material ");
    }

    function get_persediaan_keluar($id){
        return $this->db->query("SELECT persediaan_line_keluar.tanggal, persediaan_line_keluar.jumlah_material,
        sub_jenis_material.satuan_keluar 
        FROM persediaan_line_keluar, persediaan_line, sub_jenis_material 
        WHERE persediaan_line_keluar.id_persediaan_line='$id' AND persediaan_line_keluar.status_delete='0' 
        AND persediaan_line_keluar.id_persediaan_line = persediaan_line.id_persediaan_line
        AND persediaan_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material ");
    }

}
