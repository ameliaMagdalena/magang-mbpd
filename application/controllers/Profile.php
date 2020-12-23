<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        if($this->session->userdata('status_login') != "login"){
			    redirect('akses');
        }
        
        $this->load->model('M_Profile');
    }

  public function edit_profile(){
    $nama   = $this->input->post('nama_user');
    $email  = $this->input->post('email_user');

    $now = date('Y-m-d H:i');

    $data = array(
      'nama_user' => $nama,
      'email_user' => $email,
      'user_edit' => $_SESSION['id_user'],
      'waktu_edit' => $now
    );

    $where = array(
      'id_user' => $_SESSION['id_user']
    );

    $this->M_Profile->edit_profile('user', $data, $where);

    Redirect('Akses/logout');
  }

  public function cek_email_edit(){
    $email_user = $this->input->post('email_edit');

    $hasil_cari_email = $this->M_Profile->cari_email($email_user)->num_rows();

    if($hasil_cari_email > 0){
        $data['res'] = 1;
    }

    echo json_encode($data);
  }

  public function cek_oldpass(){
    $password_lama        = $this->input->post('lama');

    $id_user              = $_SESSION['id_user']; 
    $now                  = date('Y-m-d H:i');

    $old_pass = $this->M_Profile->find_old_password($id_user)->result_array();

    if($old_pass[0]['password_user'] == md5($password_lama)){
      $data['res'] = 1;
    }
    else{
      $data['res'] = 0;
    }

    echo json_encode($data);
  }

  public function change_password(){
    $password_lama        = $this->input->post('old');
    $password_baru        = $this->input->post('new');
    $password_konfirmasi  = $this->input->post('confirm');

    $id_user              = $_SESSION['id_user']; 
    $now                  = date('Y-m-d H:i');

      $data = array (
        'password_user' => md5($password_baru),
        'user_edit'     => $id_user,
        'waktu_edit'    => $now
      );

      $where = array (
        'id_user'       => $id_user
      );

      $this->M_Profile->edit_profile('user',$data,$where);

      Redirect('Akses/logout');
  }

}
