<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PermintaanMaterialProduksi extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM permintaan_material,line,detail_purchase_order_customer,detail_produk,produk
        WHERE permintaan_material.status_delete='0'
        AND permintaan_material.id_line=line.id_line 
        AND detail_purchase_order_customer.id_detail_purchase_order_customer=permintaan_material.id_detail_purchase_order_customer
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND produk.id_produk=detail_produk.id_produk
        ORDER BY permintaan_material.tanggal_produksi ASC");
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

    function get_jumlah_ubmin(){
        return $this->db->query("SELECT COUNT(id_perubahan_permintaan) AS jumlah_perubahan, id_permintaan_material 
        FROM perubahan_permintaan WHERE status_delete='0' GROUP BY id_permintaan_material ");
    }

    function get_ubmin($id){
        return $this->db->query("SELECT * FROM perubahan_permintaan WHERE id_permintaan_material='$id' AND status_delete='0' ");
    }

    function cek_batal($tanggal){
        $this->db->query(" UPDATE permintaan_material SET status_permintaan='4' WHERE status_permintaan='0' AND tanggal_produksi<'$tanggal' ");
    }
}
