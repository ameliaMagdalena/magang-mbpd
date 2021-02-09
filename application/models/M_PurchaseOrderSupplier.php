<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PurchaseOrderSupplier extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    //******************************** PO SUPPLIER ******************************* */
    //**************************************************************************** */
    function selectAllPOSupplier(){
        return $this->db->query("SELECT * FROM purchase_order_supplier");
    }

    function selectPOSupplierAktif(){
        return $this->db->query("SELECT * FROM purchase_order_supplier a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        WHERE a.status_delete=0");
    }
    
    function selectPOSupplierNow(){
        return $this->db->query("SELECT * FROM purchase_order_supplier a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        WHERE a.status_delete=0 AND MONTH(a.tanggal_po)=MONTH(CURRENT_DATE())");
    }

    function selectSatuPOSupplier($id){
        return $this->db->query("SELECT *, a.keterangan FROM purchase_order_supplier a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        JOIN user c ON a.user_add=c.id_user
        JOIN karyawan d ON d.id_karyawan=c.id_karyawan
        WHERE a.status_delete=0 AND a.id_purchase_order_supplier='" . $id['id_purchase_order_supplier'] . "'");
    }

    function insertPOSupplier($data){
        $this->db->insert('purchase_order_supplier', $data);
    }

    function editPOSupplier($data,$where){
        $this->db->update('purchase_order_supplier', $data, $where);
    }

    function hapusPOSupplier($data,$where){
        $this->db->update('purchase_order_supplier', $data, $where);
    }



    //***************************** DETAIL PO SUPPLIER *************************** */
    //**************************************************************************** */
    function selectAllDetailPOSupplier(){
        return $this->db->query("SELECT * FROM detail_purchase_order_supplier");
    }

    function selectSatuDetailPOSupplier($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_supplier a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        JOIN purchase_order_supplier d ON a.id_purchase_order_supplier = d.id_purchase_order_supplier
        JOIN supplier e ON e.id_supplier = d.id_supplier
        JOIN detail_delivery_note f ON a.id_detail_purchase_order_supplier=f.id_detail_purchase_order_supplier
        JOIN delivery_note g ON f.id_delivery_note=g.id_delivery_note
        WHERE a.status_delete=0 AND f.jumlah_aktual!='' AND g.status_pengesahan=2
        AND a.id_purchase_order_supplier='" . $id['id_purchase_order_supplier'] . "'");
    }

    function selectHanyaSatuDetail($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_supplier a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        JOIN purchase_order_supplier d ON a.id_purchase_order_supplier = d.id_purchase_order_supplier
        JOIN supplier e ON e.id_supplier = d.id_supplier
        WHERE a.status_delete=0 
        AND a.id_purchase_order_supplier='" . $id['id_purchase_order_supplier'] . "'");
    }
    
    function selectDetailPOSupplierAktif(){
        return $this->db->query("SELECT * FROM detail_purchase_order_supplier a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        JOIN purchase_order_supplier d ON a.id_purchase_order_supplier = d.id_purchase_order_supplier
        WHERE a.status_delete=0");
    }

    function insertDetailPOSupplier($data){
        $this->db->insert('detail_purchase_order_supplier', $data);
    }

    function editDetailPOSupplier($data,$where){
        $this->db->update('detail_purchase_order_supplier', $data, $where);
    }

    function hapusDetailPOSupplier($data,$where){
        $this->db->update('detail_purchase_order_supplier', $data, $where);
    }


    function selectSupplierAktif(){
        return $this->db->query("SELECT * FROM supplier a
        JOIN detail_supplier b ON a.id_supplier = b.id_supplier
        WHERE a.status_delete=0 GROUP BY a.id_supplier");
    }

    //****************************** DETAIL MATERIAL ***************************** */
    //**************************************************************************** */
    function selectSubJenisMaterial(){
        return $this->db->query("SELECT * FROM sub_jenis_material a
        JOIN jenis_material b ON a.id_jenis_material = b.id_jenis_material
        JOIN detail_supplier c ON a.id_sub_jenis_material = c.id_sub_jenis_material
        WHERE a.status_delete='0' AND b.status_delete='0' AND c.status_delete='0'");
    }

    function selectMaterialSupplier($id){
        return $this->db->query("SELECT * FROM sub_jenis_material a
        JOIN jenis_material b ON a.id_jenis_material = b.id_jenis_material
        JOIN detail_supplier c ON a.id_sub_jenis_material = c.id_sub_jenis_material
        JOIN supplier d ON c.id_supplier = d.id_supplier
        WHERE a.status_delete='0' AND c.status_delete='0' AND d.id_supplier='$id'");
    }

    function selectHargaMaterial($id){
        return $this->db->query("SELECT harga_material FROM detail_supplier a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        WHERE a.status_delete=0 AND b.status_delete=0 AND b.id_sub_jenis_material='$id'");
    }


    
    function selectSatuanUkuran($id){
        return $this->db->query("SELECT satuan_ukuran FROM sub_jenis_material
        WHERE status_delete=0 AND id_sub_jenis_material='$id'");
    }



    //****************************** INVOICE IN ***************************** */
    //*********************************************************************** */
    function selectAllInvoiceIn(){
        return $this->db->query("SELECT * FROM invoice_in");
    }

    function selectInvoiceInAktif(){
        return $this->db->query("SELECT * FROM invoice_in a
        JOIN purchase_order_supplier b ON a.id_purchase_order_supplier = b.id_purchase_order_supplier
        JOIN supplier c ON b.id_supplier = c.id_supplier
        WHERE a.status_delete=0");
    }

    function selectSatuInvoiceIn($id){
        return $this->db->query("SELECT * FROM invoice_in a
        JOIN purchase_order_supplier b ON a.id_purchase_order_supplier = b.id_purchase_order_supplier
        JOIN supplier c ON b.id_supplier = c.id_supplier
        WHERE a.status_delete=0 AND a.id_invoice_in='$id'");
    }

    function insertInvoiceIn($data){
        $this->db->insert('invoice_in', $data);
    }

    function editInvoiceIn($data,$where){
        $this->db->update('invoice_in', $data, $where);
    }

    function hapusInvoiceIn($data,$where){
        $this->db->update('invoice_in', $data, $where);
    }

}
