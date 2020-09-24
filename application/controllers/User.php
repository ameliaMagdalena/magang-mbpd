<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_User');
        $this->load->model('M_Karyawan');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['user'] = $this->M_User->select_all_aktif()->result();

		$this->load->view('v_user',$data);
    }

    public function cek_email_edit(){
        $email = $this->input->post('email_user_edit');

        $hasil_cari = $this->M_Karyawan->cari_karyawan_email($email)->num_rows();

        if($hasil_cari > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);        
    }

    public function edit_user(){
        $id_user  = $this->input->post('id_user');
        $email    = $this->input->post('email_edit');
        $password = $this->input->post('password_edit');

        $now       = date('Y-m-d H:i:s');
        $user_edit = $_SESSION['id_user'];

        $user    = $this->M_User->select_all_aktif()->result_array();
        $jm_user = $this->M_User->select_all_aktif()->num_rows();

        $hitung = 0;

        for($i=0;$i<$jm_user;$i++){
            if($user[$i]['id_user'] == $id_user){
                continue;
            }
            else{
                if($user[$i]['email_user'] == $email){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array (
                'email_user'    => $email,
                'password_user' => $password,
                'user_edit'     => $user_edit,
                'waktu_edit'    => $now
            );

            $where = array (
                'id_user'   => $id_user
            );

            $this->M_User->edit('user',$data,$where);
        }
        redirect('user');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');
        $data['id'] = $id;

        $data_input['user'] = $this->M_User->select_user_add($id)->result_array();
        $id_user            = $data_input['user'][0]['user_add'];
        $data_input['cari_user']  = $this->M_User->cari_user($id_user)->result_array();
        $nama_user          = $data_input['cari_user'][0]['nama_karyawan'];

        $data['input_user'] = $nama_user;
        $data['input_date'] = " ".$data_input['user'][0]['waktu_add'];
        $day = date('D', strtotime($data_input['user'][0]['waktu_add']));

        if($day == "Sun"){
            $hari = "Minggu";
        }
        else if($day == "Mon"){
            $hari = "Senin";
        }
        else if($day == "Tue"){
            $hari = "Selasa";
        }
        else if($day == "Wed"){
            $hari = "Rabu";
        }
        else if($day == "Thu"){
            $hari = "Kamis";
        }
        else if($day == "Fri"){
            $hari = "Jumat";
        }
        else{
            $hari = "Sabtu";
        }

        $tanggal = date('d-m-Y', strtotime($data_input['user'][0]['waktu_add']));
        $jam     = date('H:i:s', strtotime($data_input['user'][0]['waktu_add']));

        $data['input_date'] = " ".$hari.",  ".$tanggal." | ". $jam ;

        $data['log']        = $this->M_User->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_User->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();

        echo json_encode($data);
    }

}
