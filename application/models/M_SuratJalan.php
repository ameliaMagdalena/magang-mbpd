<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SuratJalan extends CI_Model {
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

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM surat_jalan WHERE status_delete='0' ");
    }

    function select_all_po_aktif(){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer WHERE purchase_order_customer.status_delete='0' ");
    }

    //where status deletenya juga 0
    function get_po(){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer 
        WHERE status_po='2' AND purchase_order_customer.status_delete='0' AND customer.id_customer=purchase_order_customer.id_customer");
    }

    function get_dpo(){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer WHERE status_delete='0' ");
    }

    function get_isj_idpo(){
        return $this->db->query("SELECT surat_jalan.id_purchase_order_customer, item_surat_jalan.id_detail_produk, 
        SUM(item_surat_jalan.jumlah_produk) AS total
        FROM surat_jalan,item_surat_jalan
        WHERE item_surat_jalan.status_delete='0'AND surat_jalan.id_surat_jalan=item_surat_jalan.id_surat_jalan
        GROUP BY surat_jalan.id_purchase_order_customer,item_surat_jalan.id_detail_produk");
    }

    function get_bpbj_available(){
        return $this->db->query("SELECT id_detail_produk, jumlah_produk 
        FROM detail_bpbj
        WHERE status_delete=0 AND status_detail_bpbj=0");
    }

    function get_po_by_id($id){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer
        WHERE id_purchase_order_customer='$id' AND customer.id_customer=purchase_order_customer.id_customer");
    }

    function get_po_by_id_sj($id){
        return $this->db->query("SELECT * FROM surat_jalan,purchase_order_customer,customer 
        WHERE id_surat_jalan='$id' AND surat_jalan.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer
        AND customer.id_customer=purchase_order_customer.id_customer");
    }

    function get_dpo_by_id($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer,detail_produk,produk 
        WHERE detail_purchase_order_customer.id_purchase_order_customer='$id'
         AND detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk 
         AND detail_produk.id_produk=produk.id_produk");
    }

    function get_yg_sdh_dikirim($id){
        return $this->db->query("SELECT  item_surat_jalan.id_detail_produk, SUM(item_surat_jalan.jumlah_produk) AS total 
        FROM surat_jalan,item_surat_jalan WHERE surat_jalan.id_purchase_order_customer='$id' 
        AND surat_jalan.id_surat_jalan=item_surat_jalan.id_surat_jalan AND item_surat_jalan.status_delete='0' 
        GROUP BY item_surat_jalan.id_detail_produk");
    }

    function get_detbpbj_total(){
        return $this->db->query("SELECT detail_bpbj.id_detail_produk, SUM(detail_bpbj.jumlah_terkirim) AS total_terkirim,
        SUM(detail_bpbj.jumlah_produk) AS total 
        FROM detail_bpbj 
        WHERE detail_bpbj.status_detail_bpbj=0  AND detail_bpbj.status_delete=0 
        GROUP BY detail_bpbj.id_detail_produk");
    }

    //get total from detail bpbj yang berkemungkinan
    function get_total_detail_bpbj(){
        return $this->db->query("SELECT detail_bpbj.id_detail_bpbj,detail_bpbj.id_detail_produk, 
        detail_bpbj.jumlah_produk 
        FROM detail_bpbj 
        WHERE detail_bpbj.status_detail_bpbj=0  AND detail_bpbj.status_delete=0 ");
    }

    function get_item_surat_jalan($id_detbpbj){
        return $this->db->query("SELECT SUM(jumlah_produk) AS total FROM detail_item_surat_jalan 
        WHERE id_detail_bpbj='$id_detbpbj' AND detail_item_surat_jalan.status_delete='0'  ");
    }

    function get_last_sj_id(){
        return $this->db->query("SELECT id_surat_jalan FROM surat_jalan ORDER BY id_surat_jalan DESC LIMIT 1");
   } 

   function get_last_isj_id(){
        return $this->db->query("SELECT id_item_surat_jalan FROM item_surat_jalan ORDER BY 
        id_item_surat_jalan DESC LIMIT 1");
    }

    function get_last_disj_id(){
        return $this->db->query("SELECT id_detail_item_surat_jalan FROM detail_item_surat_jalan ORDER BY 
        id_detail_item_surat_jalan DESC LIMIT 1");
    }

    function get_detail_bpbj($id_detprod){
        return $this->db->query("SELECT detail_bpbj.id_detail_bpbj,detail_bpbj.id_detail_produk, 
        detail_bpbj.jumlah_produk 
        FROM detail_bpbj 
        WHERE detail_bpbj.status_detail_bpbj=0  AND detail_bpbj.status_delete=0 
        AND detail_bpbj.id_detail_produk='$id_detprod' ");
    }

    function get_all_detail_bpbj($id_bpbj_sem){
        return $this->db->query("SELECT * FROM detail_bpbj WHERE id_bpbj='$id_bpbj_sem' AND status_delete='0' ");
    }

    function get_one_detbpbj($id){
        return $this->db->query("SELECT * FROM detail_bpbj WHERE id_detail_bpbj='$id' ");
    }

    function get_sj_by_id_sj($id_sj){
        return $this->db->query("SELECT * FROM surat_jalan WHERE id_surat_jalan='$id_sj' ");
    }

    function get_isj_by_id_sj($id_sj){
        return $this->db->query("SELECT * FROM item_surat_jalan,detail_produk,produk 
        WHERE item_surat_jalan.id_surat_jalan='$id_sj' AND item_surat_jalan.id_detail_produk=detail_produk.id_detail_produk
        AND produk.id_produk=detail_produk.id_produk 
        AND item_surat_jalan.status_delete='0'");
    }

    function get_item_sj($id_sj){
        return $this->db->query("SELECT * FROM item_surat_jalan WHERE id_surat_jalan='$id_sj' AND status_delete='0' ");
    }

    function get_det_item_sj($id_isj){
        return $this->db->query("SELECT * FROM detail_item_surat_jalan WHERE id_item_surat_jalan='$id_isj' AND status_delete='0' ");
    }

    function get_jm_produk_det_bpbj($id_detail_bpbj){
        return $this->db->query("SELECT jumlah_terkirim FROM detail_bpbj WHERE id_detail_bpbj='$id_detail_bpbj' ");
    }

}
