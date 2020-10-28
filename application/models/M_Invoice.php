<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Invoice extends CI_Model {
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

    function get_po(){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer WHERE status_PO='2' 
        AND purchase_order_customer.id_customer=customer.id_customer");
    }

    function get_sj(){
        return $this->db->query("SELECT id_purchase_order_customer,id_surat_jalan FROM surat_jalan 
        WHERE status_delete=0 AND status_surat_jalan != '2' ");
    }

    function get_sj_by_id_po($id_po){
        return $this->db->query("SELECT * FROM surat_jalan 
        WHERE status_delete='0' AND status_surat_jalan != '2' AND  id_purchase_order_customer='$id_po' ");
    }

    function get_sj_by_idPo_idInvoice($id_po,$id_invoice){
        return $this->db->query("SELECT * FROM surat_jalan WHERE status_delete='0' AND status_surat_jalan='0' 
        AND  id_purchase_order_customer='$id_po' OR (status_delete='0' AND id_invoice='$id_invoice') ");
    }

    function get_sj_by_id_sj($id_sj){
        return $this->db->query("SELECT * FROM surat_jalan  WHERE id_surat_jalan='$id_sj' ");
    }

    function get_isj_by_id_sj($id_sj){
        return $this->db->query("SELECT * FROM item_surat_jalan,detail_produk,produk 
        WHERE item_surat_jalan.id_surat_jalan='$id_sj' AND item_surat_jalan.id_detail_produk=detail_produk.id_detail_produk
        AND produk.id_produk=detail_produk.id_produk 
        AND item_surat_jalan.status_delete='0'");
    }

    function get_customer($id_po){
        return $this->db->query("SELECT nama_customer FROM purchase_order_customer,customer 
        WHERE id_purchase_order_customer='$id_po' AND purchase_order_customer.id_customer=customer.id_customer ");
    }

    function get_rekening(){
        return $this->db->query("SELECT * FROM rekening,bank WHERE rekening.id_bank=bank.id_bank AND rekening.status_delete=0");
    }

    //cek status delete belum
    function get_detpo_by_id_po($id_po){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer,detail_produk,produk WHERE detail_purchase_order_customer.id_purchase_order_customer='$id_po' AND 
        detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND produk.id_produk=detail_produk.id_produk");
    }

    function get_last_invoice_id(){
        return $this->db->query("SELECT id_invoice FROM invoice ORDER BY id_invoice DESC LIMIT 1");
    } 

    function get_last_item_invoice_id(){
        return $this->db->query("SELECT id_item_invoice FROM item_invoice ORDER BY id_item_invoice DESC LIMIT 1");
    } 

    function get_ppn(){
        return $this->db->query("SELECT isi_tetapan FROM tetapan WHERE nama_tetapan='PPN' AND status_delete='0' ");
    }

    function cari_po($id){
        return $this->db->query("SELECT * FROM purchase_order_customer,customer
        WHERE id_purchase_order_customer='$id' AND purchase_order_customer.id_customer=customer.id_customer ");
    }

    function cari_dpo($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer,detail_produk,produk 
        WHERE detail_purchase_order_customer.id_purchase_order_customer='$id' AND detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk");
    }

    function cek_sj($id){
        return $this->db->query("SELECT * FROM surat_jalan WHERE id_purchase_order_customer='$id' AND id_invoice != '' AND status_delete='0' ");
    }

    function cek_isj($id){
        return $this->db->query("SELECT * FROM item_surat_jalan,surat_jalan,detail_produk,produk 
        WHERE surat_jalan.id_purchase_order_customer='$id' AND surat_jalan.id_invoice != '' AND surat_jalan.status_delete='0' AND 
        surat_jalan.id_surat_jalan=item_surat_jalan.id_surat_jalan AND item_surat_jalan.status_delete='0' AND
        item_surat_jalan.id_detail_produk=detail_produk.id_detail_produk AND produk.id_produk=detail_produk.id_produk");
    }

    function select_all_aktif(){
        return $this->db->query("SELECT * FROM invoice WHERE status_delete='0'");
    }

    function get_invoice($id){
        return $this->db->query("SELECT * FROM invoice,rekening,bank 
        WHERE invoice.id_invoice='$id' AND invoice.id_rekening=rekening.id_rekening AND rekening.id_bank=bank.id_bank");
    }

    function get_detail_invoice($id){
        return $this->db->query("SELECT * FROM item_invoice,detail_produk,produk WHERE id_invoice='$id' 
        AND item_invoice.id_detail_produk=detail_produk.id_detail_produk AND produk.id_produk=detail_produk.id_produk 
        AND item_invoice.status_delete='0' ");
    }

    function delete_det_invoice($id,$user,$now){
        return $this->db->query("UPDATE item_invoice SET status_delete='1',user_delete='$user',waktu_delete='$now' WHERE id_invoice='$id' ");
    }

    function delete_invoice_sj($id){
        return $this->db->query("UPDATE surat_jalan SET id_invoice =null,status_surat_jalan='1' WHERE id_invoice='$id'");
    }

    function get_penanda_tangan(){
        return $this->db->query("SELECT * FROM karyawan,jabatan_karyawan,spesifikasi_jabatan,jabatan,departemen 
        WHERE departemen.nama_departemen='Management' AND karyawan.id_karyawan=jabatan_karyawan.id_karyawan AND 
        jabatan_karyawan.id_spesifikasi_jabatan=spesifikasi_jabatan.id_spesifikasi_jabatan AND 
        spesifikasi_jabatan.id_jabatan=jabatan.id_jabatan AND spesifikasi_jabatan.id_departemen=departemen.id_departemen");
    }

}
