<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DeliveryNote extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    //************************************* DN *********************************** */
    //**************************************************************************** */
    function selectDeliveryNote(){
        return $this->db->query("SELECT * FROM delivery_note");
    }

    function selectDeliveryNoteAktif(){
        return $this->db->query("SELECT * FROM delivery_note a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        WHERE a.status_delete=0");
    }

    function selectSatuDeliveryNote($id){
        return $this->db->query("SELECT * FROM delivery_note a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        WHERE a.status_delete=0 AND a.id_purchase_order_supplier='" . $id['id_purchase_order_supplier'] . "'");
    }

    function insertDeliveryNote($data){
        $this->db->insert('delivery_note', $data);
    }

    function editDeliveryNote($data,$where){
        $this->db->update('delivery_note', $data, $where);
    }

    function hapusDeliveryNote($data,$where){
        $this->db->update('delivery_note', $data, $where);
    }



    //********************************** DETAIL DN ******************************* */
    //**************************************************************************** */
    function selectAllDetailDeliveryNote(){
        return $this->db->query("SELECT * FROM detail_delivery_note");
    }

    function selectSatuDetailDeliveryNote($id){
        return $this->db->query("SELECT * FROM detail_delivery_note a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        JOIN purchase_order_supplier d ON a.id_purchase_order_supplier = d.id_purchase_order_supplier
        WHERE a.status_delete=0 AND a.id_purchase_order_supplier='" . $id['id_purchase_order_supplier'] . "'");
    }
    
    function selectDetailDeliveryNoteAktif(){
        return $this->db->query("SELECT * FROM detail_delivery_note a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        WHERE a.status_delete=0");
    }

    function insertDetailDeliveryNote($data){
        $this->db->insert('detail_delivery_note', $data);
    }

    function editDetailDeliveryNote($data,$where){
        $this->db->update('detail_delivery_note', $data, $where);
    }

    function hapusDetailDeliveryNote($data,$where){
        $this->db->update('detail_delivery_note', $data, $where);
    }


    //******************************** PO Supplier ******************************* */
    //**************************************************************************** */
    function selectPOSupplier(){
        return $this->db->query("SELECT * FROM purchase_order_supplier a
        JOIN detail_purchase_order_supplier b ON a.id_purchase_order_supplier = b.id_purchase_order_supplier
        JOIN supplier c ON a.id_supplier = c.id_supplier
        WHERE a.status_delete=0 AND b.status_delete=0 AND a.status_po=3
        GROUP BY a.id_purchase_order_supplier");
    }

    function selectMaterialPO($id){
        return $this->db->query("SELECT * FROM detail_purchase_order_supplier a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        WHERE a.status_delete=0 AND a.id_purchase_order_supplier='$id'");
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


}
