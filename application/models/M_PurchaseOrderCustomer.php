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


    //******************************** SALES ORDER ******************************* */
    //**************************************************************************** */
    function selectSalesOrderAktif(){
        return $this->db->query("SELECT * FROM sales_order a
        JOIN purchase_order_customer b ON a.id_purchase_order_customer = b.id_purchase_order_customer
        WHERE a.status_delete=0");
    }
    function selectSalesOrderNow(){
        return $this->db->query("SELECT * FROM sales_order a
        JOIN purchase_order_customer b ON a.id_purchase_order_customer = b.id_purchase_order_customer
        WHERE a.status_delete=0 AND MONTH(a.tanggal_so)=MONTH(CURRENT_DATE())");
    }
    function selectSatuSalesOrder($id){
        return $this->db->query("SELECT * FROM sales_order a
        JOIN purchase_order_customer b ON a.id_purchase_order_customer = b.id_purchase_order_customer
        JOIN customer c ON b.id_customer = c.id_customer
        JOIN user d ON a.dibuat_oleh = d.id_user
        JOIN karyawan e ON d.id_karyawan = e.id_karyawan
        WHERE a.status_delete=0 AND a.id_purchase_order_customer='" . $id['id_purchase_order_customer'] . "'");
    }
    function insertSalesOrder($data){
        $this->db->insert('sales_order', $data);
    }
    function editSalesOrder($data,$where){
        $this->db->update('sales_order', $data, $where);
    }

    function hapusSalesOrder($data,$where){
        $this->db->update('sales_order', $data, $where);
    }


    //********************************* LAIN LAIN ******************************** */
    //**************************************************************************** */
    function selectNoPO($id){
        return $this->db->query("SELECT kode_purchase_order_customer FROM purchase_order_customer
        WHERE status_delete=0 AND kode_purchase_order_customer='$id'");
    }
    
    function selectHargaProduk($id){
        return $this->db->query("SELECT harga_produk FROM produk a
        JOIN detail_produk b ON a.id_produk = b.id_produk
        WHERE a.status_delete=0 AND b.status_delete=0 AND b.id_detail_produk='$id'");
    }
    
    function selectKaryawan(){
        return $this->db->query("SELECT * FROM user a
        JOIN karyawan b ON a.id_karyawan = b.id_karyawan
        WHERE a.status_delete=0 AND b.status_delete=0");
    }

    function selectAll(){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer a
        JOIN purchase_order_customer b ON a.id_purchase_order_customer=b.id_purchase_order_customer
        JOIN detail_produk c ON a.id_detail_produk=c.id_detail_produk
        JOIN produk d ON c.id_produk=d.id_produk
        JOIN permintaan_material e ON a.id_detail_purchase_order_customer=e.id_detail_purchase_order_customer
        JOIN detail_permintaan_material f ON e.id_permintaan_material=f.id_permintaan_material
        JOIN konsumsi_material g ON f.id_konsumsi_material=g.id_konsumsi_material
        JOIN material h ON f.id_detail_permintaan_material=h.id_detail_permintaan_material
        JOIN material_supplier i ON h.id_material=i.id_material
        JOIN detail_delivery_note j ON i.id_detail_delivery_note=j.id_detail_delivery_note
        JOIN detail_purchase_order_supplier k ON j.id_detail_purchase_order_supplier=k.id_detail_purchase_order_supplier
        WHERE b.status_delete=0 AND e.status_delete=0 AND b.status_po=2
        ");
    }
    //GROUP BY k.harga_satuan

    function selectPersediaanMasuk(){
        return $this->db->query("SELECT * FROM persediaan_line_masuk a
        JOIN detail_permintaan_material b ON a.id_detail_permintaan_material=b.id_detail_permintaan_material
        JOIN konsumsi_material c ON b.id_konsumsi_material=c.id_konsumsi_material
        JOIN sub_jenis_material d ON c.id_sub_jenis_material=d.id_sub_jenis_material
        WHERE a.status_delete=0");
    }

}
