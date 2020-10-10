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

    function get_one_produksi_line($id_produksi,$id_line){
        return $this->db->query("SELECT * FROM produksi_line,line WHERE id_produksi='$id_produksi' AND produksi_line.id_line='$id_line' 
        AND produksi_line.id_line=line.id_line ");
    }

    function get_one_detail_produksi_line($id_produksi,$id_line){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line,detail_purchase_order_customer,detail_produk,produk 
        WHERE produksi.id_produksi='$id_produksi' AND produksi_line.id_line='$id_line' AND detail_produksi_line.status_delete='0' 
        AND produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND detail_produk.id_detail_produk=detail_purchase_order_customer.id_detail_produk 
        AND detail_produk.id_produk=produk.id_produk");
    }

    function get_detail_perencanaan($now){
        $this->db->query("SELECT * FROM detail_produksi_line,produksi_line,produksi 
        WHERE produksi.tanggal='$now' AND produksi.id_produksi=produksi_line.id_produksi 
        AND detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line");
    }

}
