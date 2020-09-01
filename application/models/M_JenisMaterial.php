<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_JenisMaterial extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function selectAllJenisMaterial(){
        return $this->db->query("SELECT * FROM jenis_material");
    }

    function selectJenisMaterialAktif(){
        return $this->db->query("SELECT * FROM jenis_material WHERE status_delete=0");
    }

    function insertJenisMaterial($data){
        $this->db->insert('jenis_material', $data);
    }

    function editJenisMaterial($data,$where){
        $this->db->update('jenis_material', $data, $where);
    }

    function hapusJenisMaterial($data,$where){
        $this->db->update('jenis_material', $data, $where);
    }


    //*********************************** SUB CUSTOMER ******************************* */
    //******************************************************************************** */
    function selectAllSubJenisMaterial(){
        return $this->db->query("SELECT * FROM sub_jenis_material");
    }

    function selectSubJenisMaterialAktif(){
        return $this->db->query("SELECT * FROM sub_jenis_material a
        JOIN jenis_material b ON a.id_jenis_material=b.id_jenis_material WHERE a.status_delete=0");
    }

    function insertSubJenisMaterial($data){
        $this->db->insert('sub_jenis_material', $data);
    }

    function editSubJenisMaterial($data,$where){
        $this->db->update('sub_jenis_material', $data, $where);
    }

    function hapusSubJenisMaterial($data,$where){
        $this->db->update('sub_jenis_material', $data, $where);
    }

}
