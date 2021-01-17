<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanProduksi extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function select_all_po(){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer
        WHERE purchase_order_customer.status_delete='0' AND purchase_order_customer.id_customer=customer.id_customer");
    }

    function cari_po($id){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer
        WHERE id_purchase_order_customer='$id' AND purchase_order_customer.id_customer=customer.id_customer ");
    }

    function cari_dpo($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer,detail_produk,produk 
        WHERE detail_purchase_order_customer.id_purchase_order_customer='$id' AND detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk");
    }

    function detail_pesanan($id){
        return $this->db->query("SELECT produksi.tanggal, produksi_line.id_line, line.nama_line, 
        detail_produksi_line.jumlah_item_perencanaan, detail_produksi_line.jumlah_item_aktual, detail_produksi_line.id_detail_purchase_order
        FROM produksi,produksi_line,line,detail_produksi_line,purchase_order_customer,detail_purchase_order_customer 
        WHERE purchase_order_customer.id_purchase_order_customer='$id' AND purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer AND
        detail_purchase_order_customer.id_detail_purchase_order_customer=detail_produksi_line.id_detail_purchase_order AND 
        detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line AND produksi_line.id_line=line.id_line AND produksi_line.id_produksi=produksi.id_produksi AND 
        detail_produksi_line.status_delete='0' AND detail_produksi_line.jumlah_item_perencanaan != '0' ");
    }

    function get_cycle_time(){
        return $this->db->query("SELECT * FROM cycle_time,line 
        WHERE cycle_time.status_delete='0' AND cycle_time.id_line=line.id_line ");
    }

    function cari_surat_jalan($id){
        return $this->db->query("SELECT surat_jalan.id_surat_jalan, surat_jalan.tanggal, item_surat_jalan.jumlah_produk, item_surat_jalan.id_detail_produk
        FROM surat_jalan,item_surat_jalan,purchase_order_customer
        WHERE purchase_order_customer.id_purchase_order_customer='$id' AND item_surat_jalan.status_delete='0'
        AND surat_jalan.id_surat_jalan=item_surat_jalan.id_surat_jalan 
        AND surat_jalan.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer ");
    }

    function cari_invoice($id){
        return $this->db->query("SELECT invoice.id_invoice, invoice.tanggal, item_invoice.jumlah_produk, item_invoice.id_detail_produk
        FROM invoice,item_invoice,purchase_order_customer
        WHERE purchase_order_customer.id_purchase_order_customer='$id' AND item_invoice.status_delete='0'
        AND invoice.id_invoice=item_invoice.id_invoice 
        AND invoice.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer ");
    }

    function cari_bpdb($id){
        return $this->db->query("SELECT bpbd.id_bpbd, bpbd.tanggal, item_bpbd.jumlah_produk, item_bpbd.id_detail_produk
        FROM bpbd,item_bpbd,purchase_order_customer
        WHERE purchase_order_customer.id_purchase_order_customer='$id' AND item_bpbd.status_delete='0'
        AND bpbd.id_bpbd=item_bpbd.id_bpbd 
        AND bpbd.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer ");
    }

    function get_pc(){
        return $this->db->query("SELECT * FROM produk,cycle_time,line 
        WHERE produk.id_produk=cycle_time.id_produk AND cycle_time.id_line=line.id_line ");
    }
}
