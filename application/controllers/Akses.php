<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Akses');
    }

	public function index(){
		$this->load->view('v_login');
    }
    
    function login(){
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'email_user'   => $email,
            'password_user'=> md5($password),
            'status_delete'=> "0",
            'status_user'  => "0"
        );

        $cek = $this->M_Akses->cek_login('user',$where)->num_rows();

        if($cek==1){
            $user         = $this->M_Akses->data_user($email,md5($password))->result_array();
            $jum_jabatan  = $this->M_Akses->jabatan_karyawan($user[0]['id_karyawan'])->num_rows();
            $jabatan_user = $this->M_Akses->jabatan_karyawan($user[0]['id_karyawan'])->result_array();

                $data_user = array(
                    "id_user"               => $user[0]['id_user'],
                    "id_karyawan"           => $user[0]['id_karyawan'],
                    "nama_user"             => $user[0]['nama_karyawan'],
                    "email_user"            => $user[0]['email_user'],
                    "status_login"          => 'login',
                    "nama_jabatan"          => $jabatan_user[0]['nama_jabatan'],
                    "nama_departemen"       => $jabatan_user[0]['nama_departemen'],
                    "id_jabatan_karyawan"   => $jabatan_user[0]['id_jabatan_karyawan'],
                    "jumlah_jabatan"        => $jum_jabatan,
                    "jabatan_user"          => $jabatan_user
                );
            
            $this->session->set_userdata($data_user);
            redirect('dashboard');
        }else{
            $this->load->view("v_eror_login");
        }
    }

    function ganti_login(){
        $id_jabatan_karyawan = $this->input->post('login_sebagai');
        $id_karyawan         = $_SESSION['id_karyawan'];

        $user         = $this->M_Akses->data_users($id_karyawan)->result_array();
        $jum_jabatan  = $this->M_Akses->jabatan_karyawan($id_karyawan)->num_rows();
        $jabatan_user = $this->M_Akses->jabatan_karyawan($id_karyawan)->result_array();

        for($i=0;$i<$jum_jabatan;$i++){
            if($jabatan_user[$i]['id_jabatan_karyawan'] == $id_jabatan_karyawan){
                $nama_jabatan        = $jabatan_user[$i]['nama_jabatan'];
                $nama_departemen     = $jabatan_user[$i]['nama_departemen'];
                $id_jabatan_karyawan = $jabatan_user[$i]['id_jabatan_karyawan'];
            }
        }

        $session = array(
            "id_user",
            "nama_user",
            "email_user",
            "nama_jabatan",
            "nama_departemen",
            "status_login"
        );

        $this->session->unset_userdata($session);
    
        //echo $nama_jabatan ."-". $nama_departemen;

        $data_user = array(
            "id_user"               => $user[0]['id_user'],
            "id_karyawan"           => $user[0]['id_karyawan'],
            "nama_user"             => $user[0]['nama_karyawan'],
            "email_user"            => $user[0]['email_user'],
            "status_login"          => 'login',
            "nama_jabatan"          => $nama_jabatan,
            "nama_departemen"       => $nama_departemen,
            "id_jabatan_karyawan"   => $id_jabatan_karyawan,
            "jumlah_jabatan"        => $jum_jabatan,
            "jabatan_user"          => $jabatan_user
        );

        $this->session->set_userdata($data_user);

        redirect('dashboard');
    }

    function logout(){
        $session = array(
            "id_user",
            "nama_user",
            "email_user",
            "nama_jabatan",
            "nama_departemen",
            "status_login"
        );

        $this->session->unset_userdata($session);
        redirect('akses');
    }

    function change_password(){
        
    }

}
