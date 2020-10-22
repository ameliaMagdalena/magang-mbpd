<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PengambilanMaterialProduksi extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
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
}
