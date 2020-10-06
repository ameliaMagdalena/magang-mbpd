<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PurchaseOrderCustomer extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    //******************************** PO CUSTOMER ******************************* */
    //**************************************************************************** */
    function selectAllPOCustomer(){
        return $this->db->query("SELECT * FROM purchase_order_customer");
    }

    function selectPOCustomerAktif(){
        return $this->db->query("SELECT * FROM purchase_order_customer a
        JOIN customer b ON a.id_customer = b.id_customer
        WHERE a.status_delete=0");
    }

    function selectSatuPOCustomer($id){
        return $this->db->query("SELECT * FROM purchase_order_customer a
        JOIN customer b ON a.id_customer = b.id_customer
        WHERE a.status_delete=0 AND a.id_purchase_order_customer='" . $id['id_purchase_order_customer'] . "'");
    }

    function insertPOCustomer($data){
        $this->db->insert('purchase_order_customer', $data);
    }

    function editPOCustomer($data,$where){
        $this->db->update('purchase_order_customer', $data, $where);
    }

    function hapusPOCustomer($data,$where){
        $this->db->update('purchase_order_customer', $data, $where);
    }



    //***************************** DETAIL PO CUSTOMER *************************** */
    //**************************************************************************** */
    function selectAllDetailPOCustomer(){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer");
    }

    function selectSatuDetailPOCustomer($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer a
        JOIN detail_produk b ON a.id_detail_produk = b.id_detail_produk
        JOIN produk c ON b.id_produk = c.id_produk
        JOIN purchase_order_customer d ON a.id_purchase_order_customer = d.id_purchase_order_customer
        WHERE a.status_delete=0 AND a.id_purchase_order_customer='" . $id['id_purchase_order_customer'] . "'");
    }
    
    function selectDetailPOCustomerAktif(){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer a
        JOIN detail_produk b ON a.id_detail_produk = b.id_detail_produk
        JOIN produk c ON b.id_produk = c.id_produk
        WHERE a.status_delete=0");
    }

    function insertDetailPOCustomer($data){
        $this->db->insert('detail_purchase_order_customer', $data);
    }

    function editDetailPOCustomer($data,$where){
        $this->db->update('detail_purchase_order_customer', $data, $where);
    }

    function hapusDetailPOCustomer($data,$where){
        $this->db->update('detail_purchase_order_customer', $data, $where);
    }


    //******************************* DETAIL PRODUK ****************************** */
    //**************************************************************************** */
    function selectDetailProduk(){
        return $this->db->query("SELECT * FROM detail_produk a
        JOIN produk b ON a.id_produk = b.id_produk
        WHERE a.status_delete='0' AND b.status_delete=0");
    }

    function selectUkuranProduk(){
        return $this->db->query("SELECT * FROM ukuran_produk
        WHERE status_delete='0'");
    }
    
    function selectWarnaProduk(){
        return $this->db->query("SELECT * FROM warna
        WHERE status_delete='0'");
    }


    
    function selectHargaProduk($id){
        return $this->db->query("SELECT harga_produk FROM produk a
        JOIN detail_produk b ON a.id_produk = b.id_produk
        WHERE a.status_delete=0 AND b.status_delete=0 AND b.id_detail_produk='$id'");
    }


}
