<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanPerencanaanCutting extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function get_tanggal_perccutt_0(){
        return $this->db->query("SELECT tanggal FROM perencanaan_cutting 
        WHERE perencanaan_cutting.status_delete='0' AND perencanaan_cutting.status_laporan='0'
        GROUP BY tanggal");
    }

    function get_tanggal_perccutt_semua(){
        return $this->db->query("SELECT tanggal,status_laporan FROM perencanaan_cutting 
        WHERE perencanaan_cutting.status_delete='0' GROUP BY tanggal");
    }

    function get_semua_percut($tanggal){
        return $this->db->query("SELECT perencanaan_cutting.id_perencanaan_cutting,perencanaan_cutting.tanggal AS tanggal_percut, perencanaan_cutting.jumlah_perencanaan AS jumlah_percut,
        perencanaan_cutting.jumlah_aktual AS jumlah_aktual_cut,perencanaan_cutting.status_laporan AS status_percut, produksi.tanggal AS tanggal_produksi, produk.id_produk,
        detail_produk.keterangan,detail_produk.id_ukuran_produk,detail_produk.id_warna,produk.nama_produk, perencanaan_cutting.keterangan AS keterangan_percut,
        produksi_line.id_line, detail_purchase_order_customer.id_detail_purchase_order_customer
        FROM perencanaan_cutting, detail_produksi_line, produksi_line, produksi, detail_purchase_order_customer, detail_produk, produk 
        WHERE perencanaan_cutting.status_delete='0' AND perencanaan_cutting.tanggal='$tanggal'
        AND perencanaan_cutting.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line
        AND detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line 
        AND produksi_line.id_produksi=produksi.id_produksi
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk
        AND detail_produk.id_produk=produk.id_produk ");
    }

    function get_all_km(){
        return $this->db->query("SELECT * FROM konsumsi_material,sub_jenis_material
        WHERE konsumsi_material.status_delete='0' AND konsumsi_material.id_sub_jenis_material=sub_jenis_material.id_sub_jenis_material ");
    }

    function get_all_pengambilan_material($tanggal_produksi){
        return $this->db->query("SELECT permintaan_material.id_line,permintaan_material.id_detail_purchase_order_customer,
        detail_permintaan_material.id_konsumsi_material,SUM(pengeluaran_material.jumlah_keluar) as total_keluar 
        FROM permintaan_material,detail_permintaan_material,pengambilan_material,pengeluaran_material,detail_purchase_order_customer,detail_produk
        WHERE permintaan_material.tanggal_produksi='$tanggal_produksi' AND pengambilan_material.status_delete='0'
        AND pengambilan_material.status_pengambilan='0'
        AND permintaan_material.id_permintaan_material=detail_permintaan_material.id_permintaan_material
        AND detail_permintaan_material.id_detail_permintaan_material=pengambilan_material.id_detail_permintaan_material
        AND pengambilan_material.id_pengeluaran_material=pengeluaran_material.id_pengeluaran_material
        AND permintaan_material.id_detail_purchase_order_customer=detail_purchase_order_customer.id_detail_purchase_order_customer
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk
        GROUP BY permintaan_material.id_line,detail_produk.id_detail_produk,
        detail_permintaan_material.id_konsumsi_material,detail_purchase_order_customer.id_detail_purchase_order_customer");
    }

    function konfirmasi_ppic($tanggal){
        $this->db->query("UPDATE perencanaan_cutting SET status_laporan='2' WHERE tanggal='$tanggal' AND status_delete='0' ");
    }

    function get_inline($id_line,$id_sub_jm){
        return $this->db->query("SELECT * FROM inventory_line WHERE id_line='$id_line' AND id_sub_jenis_material='$id_sub_jm' AND status_delete='0'  ");
    }
}
