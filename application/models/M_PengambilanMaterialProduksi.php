<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PengambilanMaterialProduksi extends CI_Model {
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

    function get_one_permat_by_line($nmline,$tanggal){
        return $this->db->query(" SELECT * FROM permintaan_material,detail_purchase_order_customer,purchase_order_customer,line,detail_produk,produk
        WHERE line.nama_line='$nmline' AND permintaan_material.tanggal_produksi='$tanggal'
        AND permintaan_material.id_detail_purchase_order_customer=detail_purchase_order_customer.id_detail_purchase_order_customer 
        AND purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer 
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND produk.id_produk=detail_produk.id_produk
        AND permintaan_material.id_line=line.id_line AND permintaan_material.status_delete='0' ");
    }

    function get_one_permat($id){
        return $this->db->query(" SELECT * FROM permintaan_material,detail_purchase_order_customer,purchase_order_customer,line
        WHERE id_permintaan_material='$id' 
        AND permintaan_material.id_detail_purchase_order_customer=detail_purchase_order_customer.id_detail_purchase_order_customer 
        AND purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer 
        AND permintaan_material.id_line=line.id_line ");
    }

    function get_one_detpermat($id){
        return $this->db->query(" SELECT * FROM detail_permintaan_material,konsumsi_material,sub_jenis_material WHERE id_permintaan_material='$id' 
        AND detail_permintaan_material.status_delete='0'AND detail_permintaan_material.id_konsumsi_material=konsumsi_material.id_konsumsi_material
        AND sub_jenis_material.id_sub_jenis_material=konsumsi_material.id_sub_jenis_material");
    }

    function get_pengmat_sebelum(){
        return $this->db->query("SELECT pengambilan_material.id_detail_permintaan_material, 
        SUM(pengeluaran_material.jumlah_keluar) AS jumlah_keluar
        FROM pengambilan_material,pengeluaran_material 
        WHERE pengambilan_material.status_delete='0' AND pengambilan_material.id_pengeluaran_material = pengeluaran_material.id_pengeluaran_material
        GROUP BY pengambilan_material.id_detail_permintaan_material");
    }

    function get_wip(){
        return $this->db->query("SELECT * FROM inventory_line WHERE status_delete='0' ");
    }

    function get_last_lumat_id($id_code){
        return $this->db->query("SELECT id_pengeluaran_material FROM pengeluaran_material WHERE id_pengeluaran_material LIKE '$id_code%' ORDER BY id_pengeluaran_material DESC LIMIT 1");
    }

    function get_last_ammat_id($id_code){
        return $this->db->query("SELECT id_pengambilan_material FROM pengambilan_material WHERE id_pengambilan_material LIKE '$id_code%' ORDER BY id_pengambilan_material DESC LIMIT 1");
    }
}
