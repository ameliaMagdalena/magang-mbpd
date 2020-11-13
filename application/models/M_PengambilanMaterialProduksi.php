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

    function get_one_permat_by_detpermat($id_detail_permat){
        return $this->db->query("SELECT * FROM permintaan_material,detail_permintaan_material 
        WHERE detail_permintaan_material.id_detail_permintaan_material='$id_detail_permat'
        AND permintaan_material.id_permintaan_material=detail_permintaan_material.id_permintaan_material ");
    }

    function get_pengmat_sebelum(){
        return $this->db->query("SELECT pengambilan_material.id_detail_permintaan_material, 
        SUM(pengambilan_material.jumlah_ambil) AS jumlah_keluar, SUM(pengeluaran_material.jumlah_keluar) AS jumlah_keluar_gudang
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

    function get_karyawan($user){
        return $this->db->query("SELECT * FROM user,karyawan WHERE user.id_user='$user' AND user.id_karyawan=karyawan.id_karyawan ");
    }

    function get_one_detail_prodline($tanggal,$id_line,$id_detpo){
        return $this->db->query("SELECT detail_produksi_line.id_detail_produksi_line, detail_produksi_line.jumlah_item_perencanaan 
        FROM produksi,produksi_line,detail_produksi_line WHERE
        produksi.tanggal='$tanggal' AND produksi_line.id_line='$id_line' AND detail_produksi_line.id_detail_purchase_order='$id_detpo'
        AND detail_produksi_line.status_delete='0'  AND produksi.id_produksi=produksi_line.id_produksi 
        AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line ");
    }

    function get_one_perencanaan_cutting($tanggal_pc,$id_det_prodline){
        return $this->db->query("SELECT * FROM perencanaan_cutting WHERE tanggal='$tanggal_pc' 
        AND id_detail_produksi_line='$id_det_prodline' AND perencanaan_cutting.status_delete='0' ");
    }

    function get_last_pcut_id($id_code){
        return $this->db->query("SELECT id_perencanaan_cutting FROM perencanaan_cutting WHERE id_perencanaan_cutting LIKE '$id_code%' ORDER BY id_perencanaan_cutting DESC LIMIT 1");
    }

    function select_all_pm($line){
        return $this->db->query("SELECT sub_jenis_material.nama_sub_jenis_material,pengeluaran_material.tanggal_keluar,pengambilan_material.stok_wip,
        pengeluaran_material.jumlah_keluar,pengambilan_material.status_keluar 
        FROM pengambilan_material,pengeluaran_material,sub_jenis_material,detail_permintaan_material,permintaan_material,line
        WHERE pengambilan_material.status_delete='0' AND line.nama_line='$line'
        AND pengambilan_material.id_pengeluaran_material=pengeluaran_material.id_pengeluaran_material
        AND pengeluaran_material.id_sub_jenis_material = sub_jenis_material.id_sub_jenis_material
        AND pengambilan_material.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material 
        AND detail_permintaan_material.id_permintaan_material=permintaan_material.id_permintaan_material
        AND permintaan_material.id_line=line.id_line");
    }

    function get_sub_jenis_material($id_sub_jenmat){
        return $this->db->query("SELECT * FROM sub_jenis_material WHERE id_sub_jenis_material='$id_sub_jenmat' ");
    }

    function get_det_inline(){
        return $this->db->query("SELECT * FROM detail_inventory_line WHERE status_delete='0' ");
    }
}
