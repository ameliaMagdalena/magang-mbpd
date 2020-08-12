<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Akses extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }

    function data_user($email,$password){
        return $this->db->query("SELECT * FROM user,jabatan,departemen WHERE 
        user.email_user='$email' AND user.password_user='$password' AND 
        user.id_jabatan = jabatan.id_jabatan AND user.id_departemen = departemen.id_departemen");
    }

}
