<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bpbd extends CI_Model {
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

    function select_all_bpbd(){
        return $this->db->query("SELECT * FROM bpbd,purchase_order_customer,customer
        WHERE bpbd.status_delete='0' AND bpbd.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer AND
        purchase_order_customer.id_customer=customer.id_customer ");
    }

    function get_po(){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer 
        WHERE status_po='2' AND purchase_order_customer.status_delete='0' AND customer.id_customer=purchase_order_customer.id_customer");
    }

    function get_dpo(){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer WHERE status_delete='0' ");
    }

    function get_surat_jalan_belum_selesai(){
        return $this->db->query("SELECT surat_jalan.id_purchase_order_customer FROM surat_jalan,item_surat_jalan 
        WHERE surat_jalan.status_surat_jalan != 0 AND  item_surat_jalan.status_delete='0' AND item_surat_jalan.status_keluar='0' 
        AND surat_jalan.id_surat_jalan = item_surat_jalan.id_surat_jalan 
        GROUP BY surat_jalan.id_purchase_order_customer ");
    }

    function get_po_by_id($id){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer
        WHERE id_purchase_order_customer='$id' AND customer.id_customer=purchase_order_customer.id_customer");
    }

    function get_dpo_by_id($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer,detail_produk,produk 
        WHERE detail_purchase_order_customer.id_purchase_order_customer='$id'
         AND detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk 
         AND detail_produk.id_produk=produk.id_produk");
    }

    function get_stok_gudang($id_po){
        return $this->db->query("SELECT item_surat_jalan.id_detail_produk, SUM(item_surat_jalan.jumlah_produk) as jumlah_produk
        FROM surat_jalan,item_surat_jalan 
        WHERE surat_jalan.id_purchase_order_customer='$id_po' AND surat_jalan.status_surat_jalan != '0'
        AND surat_jalan.id_surat_jalan=item_surat_jalan.id_surat_jalan GROUP BY item_surat_jalan.id_detail_produk");
    }

    function get_terambil($id_po){
        return $this->db->query("SELECT bpbd.id_purchase_order_customer, item_bpbd.id_detail_produk, SUM(item_bpbd.jumlah_produk) as jumlah_produk
        FROM bpbd,item_bpbd 
        WHERE bpbd.id_bpbd=item_bpbd.id_bpbd AND item_bpbd.status_delete='0' AND bpbd.id_purchase_order_customer='$id_po'
        GROUP BY bpbd.id_purchase_order_customer,item_bpbd.id_detail_produk ");
    }

    function get_last_bpbd_id(){
        return $this->db->query("SELECT id_bpbd,no_bpbd,tanggal FROM bpbd ORDER BY id_bpbd DESC LIMIT 1");
    }   

   function get_last_item_bpbd_id(){
        return $this->db->query("SELECT id_item_bpbd FROM item_bpbd ORDER BY id_item_bpbd DESC LIMIT 1");
    }  

    function get_last_dibpbd_id(){
        return $this->db->query("SELECT id_detail_item_bpbd FROM detail_item_bpbd ORDER BY 
        id_detail_item_bpbd DESC LIMIT 1");
    }

    function get_item_surat_jalan($id_po, $id_detail_produk){
        return $this->db->query("SELECT * FROM surat_jalan,item_surat_jalan 
        WHERE surat_jalan.id_purchase_order_customer='$id_po' AND surat_jalan.status_surat_jalan != '0'
        AND item_surat_jalan.status_delete='0' AND item_surat_jalan.status_keluar='0'
        AND item_surat_jalan.id_detail_produk='$id_detail_produk'
        AND surat_jalan.id_surat_jalan=item_surat_jalan.id_surat_jalan");
    }

    function get_one_bpbd($id){
        return $this->db->query("SELECT * FROM bpbd WHERE bpbd.id_bpbd='$id'");
    }

    function get_one_po($id){
        return $this->db->query("SELECT purchase_order_customer.kode_purchase_order_customer,customer.nama_customer 
        FROM bpbd,purchase_order_customer,customer
        WHERE bpbd.id_bpbd='$id' AND bpbd.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer AND
        customer.id_customer=purchase_order_customer.id_customer");
    }

    function get_one_item_bpbd($id){
        return $this->db->query("SELECT * FROM item_bpbd WHERE item_bpbd.id_bpbd='$id' AND item_bpbd.status_delete='0' ");
    }

    function get_one_detail_item_bpbd($id_item_bpbd){
        return $this->db->query("SELECT detail_item_bpbd.id_detail_item_bpbd, detail_item_bpbd.jumlah_produk, 
        item_surat_jalan.id_item_surat_jalan, item_surat_jalan.jumlah_keluar
        FROM detail_item_bpbd,item_surat_jalan
        WHERE detail_item_bpbd.id_item_bpbd='$id_item_bpbd' 
        AND detail_item_bpbd.id_item_surat_jalan=item_surat_jalan.id_item_surat_jalan AND detail_item_bpbd.status_delete='0'  ");
    }

    function get_produk(){
        return $this->db->query("SELECT * FROM detail_produk,produk WHERE detail_produk.id_produk=produk.id_produk");
    }

    function get_one_detail_produk($id_detail_produk){
        return $this->db->query("SELECT * FROM detail_produk,produk 
        WHERE detail_produk.id_detail_produk='$id_detail_produk' AND detail_produk.id_produk=produk.id_produk ");
    }


}
