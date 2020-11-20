<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_HasilProduksi extends CI_Model {
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

    function get_last_prodtun_id($id_code){
        return $this->db->query("SELECT id_produksi_tertunda FROM produksi_tertunda WHERE id_produksi_tertunda 
        LIKE '$id_code%' ORDER BY id_produksi_tertunda DESC LIMIT 1");
    }

    function get_one_prodtun($id_dpl){
        return $this->db->query("SELECT * FROM produksi_tertunda WHERE id_detail_produksi_line='$id_dpl' AND status_delete='0' ");
    }

    function get_produksi_proses($now){
        return $this->db->query("SELECT * FROM produksi 
        WHERE produksi.tanggal <= '$now' AND (produksi.status_laporan BETWEEN 0 AND 1) AND produksi.status_delete='0' ");
    }

    function get_produksi_semua($now){
        return $this->db->query("SELECT * FROM produksi 
        WHERE produksi.tanggal <= '$now' AND produksi.status_delete='0' AND produksi.status_perencanaan='1' ");
    }

    function get_produksi_line(){
        return $this->db->query("SELECT * FROM produksi,produksi_line,line
        WHERE  produksi.status_delete='0' AND produksi_line.status_delete='0'
        AND produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_line=line.id_line");
    }

    function get_produksi_by_id($id){
        return $this->db->query("SELECT * FROM produksi WHERE produksi.id_produksi='$id' ");
    }

    function get_produksi_line_by_produksi($id){
        return $this->db->query("SELECT * FROM produksi_line,line
        WHERE produksi_line.id_produksi='$id' AND produksi_line.status_delete='0'
        AND produksi_line.id_line=line.id_line");
    }

    function get_produksi_line_by_id($id){
        return $this->db->query("SELECT * FROM produksi,produksi_line,line
        WHERE produksi.id_produksi='$id' AND produksi.status_delete='0' AND produksi_line.status_delete='0'
        AND produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_line=line.id_line");
    }

    function get_detail_produksi_line_by_id($id){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line,detail_purchase_order_customer,detail_produk,produk
        WHERE produksi.id_produksi='$id' AND detail_produksi_line.status_delete='0' 
        AND produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND detail_produk.id_detail_produk=detail_purchase_order_customer.id_detail_produk 
        AND detail_produk.id_produk=produk.id_produk");
    }

    function get_one_produksi($id_produksi){
        return $this->db->query("SELECT * FROM produksi WHERE id_produksi='$id_produksi'");
    }

    function get_one_produksi_line($id_produksi,$id_line){
        return $this->db->query("SELECT * FROM produksi_line,line WHERE id_produksi='$id_produksi' AND produksi_line.id_line='$id_line' 
        AND produksi_line.id_line=line.id_line ");
    }

    function get_one_detail_produksi_line($id_produksi,$id_line){
        return $this->db->query("SELECT * 
        FROM produksi,produksi_line,detail_produksi_line,detail_purchase_order_customer,detail_produk,produk,cycle_time 
        WHERE produksi.id_produksi='$id_produksi' AND produksi_line.id_line='$id_line' AND detail_produksi_line.status_delete='0' 
        AND produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND detail_produk.id_detail_produk=detail_purchase_order_customer.id_detail_produk 
        AND detail_produk.id_produk=produk.id_produk AND produk.id_produk=cycle_time.id_produk AND cycle_time.id_line='$id_line' ");
    }

    function get_detail_perencanaan($now){
        return $this->db->query("SELECT * FROM detail_produksi_line,produksi_line,produksi 
        WHERE produksi.tanggal='$now' AND produksi.id_produksi=produksi_line.id_produksi 
        AND detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line");
    }

    function get_detail_produksi_line_group_by($id_produksi){
        return $this->db->query("SELECT produksi.tanggal,produksi_line.id_line,detail_purchase_order_customer.id_detail_produk,
        detail_produksi_line.id_detail_purchase_order, SUM(detail_produksi_line.jumlah_item_perencanaan) AS jumlah_item_perencanaan,
        SUM(detail_produksi_line.jumlah_item_aktual) as jumlah_item_aktual,detail_produk.id_produk,
        line.nama_line
        FROM produksi,produksi_line,detail_produksi_line,detail_produk,detail_purchase_order_customer,line
        WHERE produksi.id_produksi='$id_produksi' AND detail_produksi_line.status_delete='0'
        AND produksi.id_produksi=produksi_line.id_produksi 
        AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk
        AND produksi_line.id_line=line.id_line
        GROUP BY detail_purchase_order_customer.id_detail_produk,produksi_line.id_line,detail_purchase_order_customer.id_detail_purchase_order_customer");
    }

    function get_jumlah_dpl($id_produksi){
        return $this->db->query("SELECT produksi.tanggal,produksi_line.id_line,detail_purchase_order_customer.id_detail_produk,
        detail_produksi_line.id_detail_purchase_order,SUM(detail_produksi_line.jumlah_item_aktual) as jumlah_produk,detail_produk.id_produk,
        detail_produk.keterangan,detail_produk.id_ukuran_produk,detail_produk.id_warna,produk.nama_produk
        FROM produksi,produksi_line,detail_produksi_line,detail_produk,produk,detail_purchase_order_customer
        WHERE produksi.id_produksi='$id_produksi' AND detail_produksi_line.status_delete='0'
        AND produksi.id_produksi=produksi_line.id_produksi 
        AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk
        AND detail_produk.id_produk=produk.id_produk
        GROUP BY detail_purchase_order_customer.id_detail_produk,detail_purchase_order_customer.id_detail_purchase_order_customer");
    }

    function get_konsumsi_material($id_produk,$id_line){
        return $this->db->query("SELECT * FROM konsumsi_material 
        WHERE id_produk='$id_produk' AND id_line='$id_line' AND konsumsi_material.status_delete='0' ");
    }

    function get_pengambilan_material($tanggal,$id_line,$id_detail_produk,$id_konsumsi_material){
        return $this->db->query("SELECT SUM(pengeluaran_material.jumlah_keluar) as total_keluar
        FROM permintaan_material,detail_permintaan_material,pengambilan_material,pengeluaran_material,detail_purchase_order_customer
        WHERE permintaan_material.tanggal_produksi='$tanggal' AND permintaan_material.id_line='LINE-1' AND
        detail_purchase_order_customer.id_detail_produk='$id_detail_produk' 
        AND detail_permintaan_material.id_konsumsi_material='$id_konsumsi_material'
        AND pengambilan_material.status_pengambilan='1'
        AND permintaan_material.id_permintaan_material=detail_permintaan_material.id_permintaan_material
        AND detail_permintaan_material.id_detail_permintaan_material=pengambilan_material.id_detail_permintaan_material
        AND pengambilan_material.id_pengeluaran_material=pengeluaran_material.id_pengeluaran_material 
        AND permintaan_material.id_detail_purchase_order_customer=detail_purchase_order_customer.id_detail_purchase_order_customer");
    }

    function get_inventory_line($id_line,$id_sub_jenis_material){
        return $this->db->query("SELECT * FROM inventory_line WHERE id_line='$id_line' 
        AND id_sub_jenis_material='$id_sub_jenis_material' AND status_delete='0' ");
    }

    function select_all_inventory_line(){
        return $this->db->query("SELECT * FROM inventory_line");
    }

    function get_last_dinli_id($id_code){
        return $this->db->query("SELECT id_detail_inventory_line FROM detail_inventory_line 
        WHERE id_detail_inventory_line LIKE '$id_code%' ORDER BY id_detail_inventory_line DESC LIMIT 1");
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
        AND pengambilan_material.status_pengambilan='1'
        AND permintaan_material.id_permintaan_material=detail_permintaan_material.id_permintaan_material
        AND detail_permintaan_material.id_detail_permintaan_material=pengambilan_material.id_detail_permintaan_material
        AND pengambilan_material.id_pengeluaran_material=pengeluaran_material.id_pengeluaran_material
        AND permintaan_material.id_detail_purchase_order_customer=detail_purchase_order_customer.id_detail_purchase_order_customer
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk
        GROUP BY permintaan_material.id_line,detail_produk.id_detail_produk,
        detail_permintaan_material.id_konsumsi_material,detail_purchase_order_customer.id_detail_purchase_order_customer");
    }
    
    function get_inline($id_line,$id_sub_jm){
        return $this->db->query("SELECT * FROM inventory_line WHERE id_line='$id_line' AND id_sub_jenis_material='$id_sub_jm' AND status_delete='0'  ");
    }

}
