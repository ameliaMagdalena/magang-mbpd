<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_InventoryLine extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_inline_line($line){
        return $this->db->query("SELECT * FROM inventory_line,sub_jenis_material,line
        WHERE line.nama_line='$line' AND inventory_line.status_delete='0' 
        AND line.id_line=inventory_line.id_line AND inventory_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material");
    }

    function select_all(){
        return $this->db->query("SELECT * FROM inventory_line,sub_jenis_material,line 
        WHERE inventory_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material AND
        inventory_line.id_line = line.id_line");
    }

    function get_detail_inline($id){
        return $this->db->query("SELECT detail_inventory_line.tanggal, detail_inventory_line.jumlah_material, detail_inventory_line.status,
        sub_jenis_material.satuan_keluar 
        FROM detail_inventory_line, inventory_line, sub_jenis_material 
        WHERE detail_inventory_line.id_inventory_line='$id' AND detail_inventory_line.status_delete='0' 
        AND detail_inventory_line.id_inventory_line = inventory_line.id_inventory_line
        AND inventory_line.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material ");
    }

}
