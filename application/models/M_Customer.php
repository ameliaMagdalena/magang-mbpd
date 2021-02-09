<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Customer extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    //*********************************** CUSTOMER ******************************* */
    //**************************************************************************** */
    function selectAllCustomer(){
        return $this->db->query("SELECT * FROM customer");
    }

    function selectCustomerAktif(){
        return $this->db->query("SELECT * FROM customer WHERE status_delete=0");
    }

    function selectSatuCustomer($id){
        return $this->db->query("SELECT * FROM customer WHERE status_delete=0 AND id_customer='" . $id['id_customer'] . "'");
    }

    function selectCustomerDanSubAktif(){
        return $this->db->query("SELECT * FROM customer a
        JOIN sub_customer b ON a.id_customer = b.id_customer
        WHERE a.status_delete=0 AND b.status_delete=0");
    }

    function insertCustomer($data){
        $this->db->insert('customer', $data);
    }

    function editCustomer($data,$where){
        $this->db->update('customer', $data, $where);
    }

    function hapusCustomer($data,$where){
        $this->db->update('customer', $data, $where);
    }

    //*********************************** SUB CUSTOMER ******************************* */
    //******************************************************************************** */
    function selectAllSubCustomer(){
        return $this->db->query("SELECT * FROM sub_customer");
    }

    function selectSubCustomerAktif($id_cust){
        return $this->db->query("SELECT * FROM sub_customer a
        JOIN customer b ON a.id_customer=b.id_customer
        WHERE a.status_delete=0 AND a.id_customer='" . $id_cust['id_customer'] . "'");
    }

    function insertSubCustomer($data){
        $this->db->insert('sub_customer', $data);
    }

    function editSubCustomer($data,$where){
        $this->db->update('sub_customer', $data, $where);
    }

    function hapusSubCustomer($data,$where){
        $this->db->update('sub_customer', $data, $where);
    }

}
