<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PerubahanHarga extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllPerubahanHarga(){
        return $this->db->query("SELECT * FROM perubahan_harga");
    }

    function selectPerubahanHargaAktif(){
        return $this->db->query("SELECT * FROM perubahan_harga a
        JOIN detail_supplier b ON a.id_detail_supplier = b.id_detail_supplier
        JOIN supplier c ON b.id_supplier = c.id_supplier
        JOIN sub_jenis_material d ON b.id_sub_jenis_material = d.id_sub_jenis_material
        JOIN jenis_material e ON d.id_jenis_material = e.id_jenis_material
        WHERE a.status_delete='0'");
    }

    function editPerubahanHarga($data,$where){
        $this->db->update('perubahan_harga', $data, $where);
    }

    function hapusPerubahanHarga($data,$where){
        $this->db->update('perubahan_harga', $data, $where);
    }

    function selectSatuDetailSupplier($id){
        return $this->db->query("SELECT * FROM detail_supplier a
        JOIN sub_jenis_material b ON a.id_sub_jenis_material = b.id_sub_jenis_material
        JOIN jenis_material c ON b.id_jenis_material = c.id_jenis_material
        WHERE a.status_delete='0' AND a.id_supplier=$id");
    }

    function selectDetailSupplierAktif(){
        return $this->db->query("SELECT * FROM detail_supplier a
        JOIN supplier b ON a.id_supplier = b.id_supplier
        JOIN sub_jenis_material c ON a.id_sub_jenis_material = c.id_sub_jenis_material
        WHERE a.status_delete=0
        GROUP BY b.id_supplier");
    }

}
