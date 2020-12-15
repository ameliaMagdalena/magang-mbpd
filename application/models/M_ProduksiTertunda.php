<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ProduksiTertunda extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }
    
    function get_semua(){
        return $this->db->query("SELECT produksi_tertunda.id_produksi_tertunda,produksi_tertunda.jumlah_tertunda,
        produksi_tertunda.jumlah_terencana,produksi_tertunda.status_penjadwalan, produksi.tanggal, line.nama_line, 
        produk.nama_produk, detail_produk.keterangan, detail_produk.id_ukuran_produk, detail_produk.id_warna,
        purchase_order_customer.kode_purchase_order_customer
        FROM produksi_tertunda, detail_produksi_line, produksi_line, produksi, line, detail_purchase_order_customer, purchase_order_customer,
        detail_produk, produk
        WHERE produksi_tertunda.status_delete='0' AND produksi.status_laporan='3' AND
        produksi_tertunda.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line
        AND detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line AND produksi_line.id_produksi=produksi.id_produksi
        AND produksi_line.id_line=line.id_line AND 
        detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND
        detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk
        AND detail_purchase_order_customer.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer");
    }

    function get_one_prodtun($id){
        return $this->db->query("SELECT produksi_tertunda.id_produksi_tertunda,produksi_tertunda.jumlah_tertunda,
        produksi_tertunda.jumlah_terencana,produksi_tertunda.status_penjadwalan, produksi.tanggal, line.nama_line, 
        produk.nama_produk, detail_produk.keterangan, detail_produk.id_ukuran_produk, detail_produk.id_warna,
        purchase_order_customer.kode_purchase_order_customer
        FROM produksi_tertunda, detail_produksi_line, produksi_line, produksi, line, detail_purchase_order_customer, purchase_order_customer,
        detail_produk, produk
        WHERE produksi_tertunda.status_delete='0' AND produksi_tertunda.id_produksi_tertunda='$id'
        AND produksi_tertunda.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line
        AND detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line AND produksi_line.id_produksi=produksi.id_produksi
        AND produksi_line.id_line=line.id_line AND 
        detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND
        detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk
        AND detail_purchase_order_customer.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer");
    }

    function get_one_detprodtun($id){
        return $this->db->query("SELECT detail_produksi_tertunda.jumlah_perencanaan, produksi.tanggal
        FROM detail_produksi_tertunda, detail_produksi_line, produksi_line, produksi
        WHERE detail_produksi_tertunda.status_delete='0' AND detail_produksi_tertunda.id_produksi_tertunda='$id'
        AND detail_produksi_tertunda.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line AND 
        detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line AND produksi_line.id_produksi=produksi.id_produksi ");
    }

}
