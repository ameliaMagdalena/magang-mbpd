<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Akses');
        $this->load->model('M_Line');
    }

	public function index(){
		$this->load->view('v_login');
    }
    
    function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'email_user'=>$email,
            'password_user'=>$password,
            'status'=>"1"
        );

        $cek = $this->M_Akses->cek_login('user',$where)->num_rows();

        if($cek==1){
            $user = $this->M_Akses->data_user($email,$password)->result_array();

            if($user[0]['nama_jabatan'] == "PIC"){
                $cek_line = $this->M_Line->cek_pic_line($user[0]['id_user'])->result_array();

                $data_user = array(
                    "id_user"           => $user[0]['id_user'],
                    "nama_user"         => $user[0]['nama_user'],
                    "email_user"        => $user[0]['email_user'],
                    "nama_jabatan"      => $user[0]['nama_jabatan'],
                    "nama_departemen"   => $user[0]['nama_departemen'],
                    "nama_line"         => $cek_line[0]['nama_line'],
                    "status_login"      => 'login',
                );
            }
            else{
                $data_user = array(
                    "id_user"           => $user[0]['id_user'],
                    "nama_user"         => $user[0]['nama_user'],
                    "email_user"        => $user[0]['email_user'],
                    "nama_jabatan"      => $user[0]['nama_jabatan'],
                    "nama_departemen"   => $user[0]['nama_departemen'],
                    "status_login"      => 'login',
                );
            }
            
            $this->session->set_userdata($data_user);
            redirect('dashboard');
        }else{
            $this->load->view("v_eror_login");
        }
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

}
