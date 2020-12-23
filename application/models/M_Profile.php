<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profile extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function edit_profile($table, $data, $where){
        $this->db->update($table,$data,$where);
    }

    function find_old_password($id_user){
        return $this->db->query("SELECT password_user FROM user WHERE id_user='$id_user'");
    }

    function cari_email($email_user){
        return $this->db->query("SELECT * FROM user WHERE email_user='$email_user' AND status_delete='0'");
    }

}
