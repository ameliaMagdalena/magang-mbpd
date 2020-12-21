<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bpbj extends CI_Model {
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

   function select_produk($tanggal){
       return $this->db->query("SELECT produk.nama_produk, detail_produk.id_detail_produk, produk.id_produk, line.urutan_line, line.nama_line,
       detail_produk.keterangan,detail_produk.id_warna,detail_produk.id_ukuran_produk, detail_produk.kode_produk,
       SUM(detail_produksi_line.jumlah_item_perencanaan) AS total,produksi_line.id_line 
       FROM produksi,produksi_line,detail_produksi_line,detail_purchase_order_customer,detail_produk,produk,line
       WHERE produksi.tanggal='$tanggal' AND produksi.id_produksi=produksi_line.id_produksi AND  detail_produksi_line.jumlah_item_perencanaan != 0 AND
       produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line AND
       detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND 
       detail_produk.id_produk=produk.id_produk AND produksi_line.id_line = line.id_line
       AND detail_produksi_line.status_delete=0 GROUP BY id_detail_produk,id_line");
   }

   function last_proses_produk(){
       return $this->db->query("SELECT detail_produk.id_detail_produk,produk.id_produk, MAX(line.urutan_line) AS urutan_line
       FROM detail_produk,produk,cycle_time,line  WHERE
       detail_produk.id_produk=produk.id_produk AND produk.id_produk=cycle_time.id_produk AND line.id_line=cycle_time.id_line
       GROUP BY detail_produk.id_detail_produk");
   }

   function get_last_bpbj_id(){
        return $this->db->query("SELECT id_bpbj,no_bpbj,tanggal FROM bpbj ORDER BY id_bpbj DESC LIMIT 1");
   }   

   function get_last_detail_bpbj_id(){
        return $this->db->query("SELECT id_detail_bpbj FROM detail_bpbj ORDER BY id_detail_bpbj DESC LIMIT 1");
    }  

    function select_all_detail_bpbj_aktif($tanggal){
        return $this->db->query("SELECT SUM(detail_bpbj.jumlah_produk) AS jumlah_produk,detail_bpbj.id_detail_produk 
        FROM bpbj,detail_bpbj  WHERE bpbj.tanggal='$tanggal' AND bpbj.id_bpbj = detail_bpbj.id_bpbj AND bpbj.status_delete='0' AND 
        detail_bpbj.status_delete='0' GROUP BY detail_bpbj.id_detail_produk");
    }

    function select_all_bpbj_aktif(){
        return $this->db->query("SELECT * FROM bpbj WHERE status_delete='0' ");
    }

    function cari_bpbj($id){
        return $this->db->query("SELECT * FROM bpbj WHERE id_bpbj='$id' AND bpbj.status_delete='0' ");
    }

    function cari_detail_bpbj($id){
        return $this->db->query("SELECT * FROM detail_bpbj,detail_produk,produk WHERE 
        detail_bpbj.id_bpbj='$id' AND detail_bpbj.id_detail_produk=detail_produk.id_detail_produk AND
        detail_produk.id_produk=produk.id_produk AND detail_bpbj.status_delete='0' ");
    }

    function delete_detail_bpbj($id_bpbj,$user,$now){
        return $this->db->query("UPDATE detail_bpbj SET status_delete=1,user_delete='$user',waktu_delete='$now' WHERE id_bpbj='$id_bpbj' ");
    }

    function cari_selected_po(){
        return $this->db->query("SELECT detail_bpbj.id_detail_bpbj,surat_jalan.id_purchase_order_customer,purchase_order_customer.kode_purchase_order_customer 
        FROM detail_bpbj,detail_item_surat_jalan,item_surat_jalan,surat_jalan,purchase_order_customer
        WHERE detail_bpbj.status_delete='0' AND detail_item_surat_jalan.status_delete='0' AND item_surat_jalan.status_delete='0' 
        AND surat_jalan.status_delete='0' AND detail_bpbj.id_detail_bpbj=detail_item_surat_jalan.id_detail_bpbj AND 
        detail_item_surat_jalan.id_item_surat_jalan=item_surat_jalan.id_item_surat_jalan AND surat_jalan.id_purchase_order_customer=purchase_order_customer.id_purchase_order_customer AND
        item_surat_jalan.id_surat_jalan=surat_jalan.id_surat_jalan GROUP BY  detail_bpbj.id_detail_bpbj,surat_jalan.id_purchase_order_customer  ");
    }

    function select_bpbj_det_item_sj(){
        return $this->db->query("SELECT bpbj.id_bpbj, COUNT(id_detail_item_surat_jalan) AS jumlah_det_item_sj
        FROM detail_item_surat_jalan,detail_bpbj,bpbj WHERE detail_item_surat_jalan.status_delete='0' AND
        detail_item_surat_jalan.id_detail_bpbj = detail_bpbj.id_detail_bpbj AND detail_bpbj.id_bpbj=bpbj.id_bpbj GROUP BY bpbj.id_bpbj ");
    }

    function select_one_bpbj_det_item_sj($id){
        return $this->db->query("SELECT surat_jalan.id_purchase_order_customer, detail_bpbj.id_detail_produk, 
        detail_item_surat_jalan.jumlah_produk, surat_jalan.id_surat_jalan, bpbj.id_bpbj,purchase_order_customer.kode_purchase_order_customer
        FROM detail_item_surat_jalan,detail_bpbj,bpbj,item_surat_jalan,surat_jalan,purchase_order_customer 
        WHERE bpbj.id_bpbj='$id'
        AND detail_item_surat_jalan.status_delete='0' AND detail_item_surat_jalan.id_detail_bpbj = detail_bpbj.id_detail_bpbj 
        AND detail_bpbj.id_bpbj=bpbj.id_bpbj AND detail_item_surat_jalan.id_item_surat_jalan=item_surat_jalan.id_item_surat_jalan
        AND item_surat_jalan.id_surat_jalan=surat_jalan.id_surat_jalan AND purchase_order_customer.id_purchase_order_customer=surat_jalan.id_purchase_order_customer");
    }




}
