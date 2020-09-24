<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Bank');
        $this->load->model('M_User');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['bank'] = $this->M_Bank->select_all_aktif()->result();

		$this->load->view('v_bank',$data);
    }

    
    public function cek_nama_bank_input(){
        $nama_bank = $this->input->post('nama_bank_input');

        $hasil_cari_bank = $this->M_Bank->cari_bank($nama_bank)->num_rows();

        if($hasil_cari_bank > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function cek_nama_bank_edit(){
        $nama_bank = $this->input->post('nama_bank_edit');

        $hasil_cari_bank = $this->M_Bank->cari_bank($nama_bank)->num_rows();

        if($hasil_cari_bank > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }



    public function tambah_bank(){
        $nama_bank = $this->input->post('nama_bank_input');

        $now = date('Y-m-d H:i:s');
        $jumlah_bank   = $this->M_Bank->select_all()->num_rows();
        $id_number      = $jumlah_bank + 1;

        $id_bank     = "BANK-".$id_number;

        $bank        = $this->M_Bank->select_all_aktif()->result_array();
        $jumlah_bank = $this->M_Bank->select_all_aktif()->num_rows();
        $hitung = 0;
        
        for($i=0;$i<$jumlah_bank;$i++){
            if($bank[$i]['id_bank'] == $id_bank){
                continue;
            }
            else{
                if($bank[$i]['nama_bank'] == $nama_bank){
                    $hitung++;
                }
            }
        } 

        if($hitung == 0){
            $data = array (
                'id_bank'      => $id_bank,
                'nama_bank'    => $nama_bank,
                'user_add'      => $_SESSION['id_user'],
                'waktu_add'     => $now,
                'status_delete' => 0
            );
            $this->M_Bank->insert('bank',$data);
        }
        Redirect('Bank');
    }


    public function edit_bank(){
        $id_bank   = $this->input->post('id_bank');
        $nama_bank = $this->input->post('nama_bank_edit');

        $now = date('Y-m-d H:i:s');

        $bank        = $this->M_Bank->select_all_aktif()->result_array();
        $jumlah_bank = $this->M_Bank->select_all_aktif()->num_rows();

        $hitung = 0;
        
        for($i=0;$i<$jumlah_bank;$i++){
            if($bank[$i]['id_bank'] == $id_bank){
                continue;
            }
            else{
                if($bank[$i]['nama_bank'] == $nama_bank){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array(
                'nama_bank'    =>$nama_bank,
                'user_edit'     =>$_SESSION['id_user'],
                'waktu_edit'    =>$now
            );
    
            $where = array (
                'id_bank'      =>$id_bank
            );
    
            $this->M_Bank->edit('bank',$data,$where);
        }
        
        Redirect('bank');
    }

    public function delete_bank(){
        $id_bank = $this->input->post('id_bank');
        $now      = date('Y-m-d H:i:s');

        $data = array (
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => $now,
            'status_delete' => 1
        );

        $where = array (
            'id_bank' => $id_bank
        );

        $this->M_Bank->edit('bank',$data,$where);
        redirect('bank');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');

        $data_input['user'] = $this->M_Bank->select_user_add($id)->result_array();

        $data['input_user'] =  $data_input['user'][0]['nama_karyawan'];
        //$data['input_date'] = " ".$data_input['user'][0]['waktu_add'];
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

        $data['log']        = $this->M_Bank->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Bank->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();


        echo json_encode($data);
    }

}
