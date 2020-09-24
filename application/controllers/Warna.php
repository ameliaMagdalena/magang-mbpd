<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warna extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Warna');
        $this->load->model('M_User');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['warna'] = $this->M_Warna->select_all_aktif()->result();

		$this->load->view('v_warna',$data);
    }

    public function cek_nama_warna_input(){
        $nama_warna = $this->input->post('nama_warna_input');

        $hasil_cari_warna = $this->M_Warna->cari_warna($nama_warna)->num_rows();

        if($hasil_cari_warna > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function cek_nama_warna_edit(){
        $nama_warna = $this->input->post('nama_warna_edit');

        $hasil_cari_warna = $this->M_Warna->cari_warna($nama_warna)->num_rows();

        if($hasil_cari_warna > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function tambah_warna(){
        $nama_warna = $this->input->post('nama_warna_input');

        $now = date('Y-m-d H:i:s');
        $jumlah_warna   = $this->M_Warna->select_all()->num_rows();
        $id_number      = $jumlah_warna + 1;

        $id_warna     = "WARNA-".$id_number;

        $warna        = $this->M_Warna->select_all_aktif()->result_array();
        $jumlah_warna = $this->M_Warna->select_all_aktif()->num_rows();
        $hitung = 0;
        
        for($i=0;$i<$jumlah_warna;$i++){
            if($warna[$i]['id_warna'] == $id_warna){
                continue;
            }
            else{
                if($warna[$i]['nama_warna'] == $nama_warna){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array (
                'id_warna'      => $id_warna,
                'nama_warna'    => $nama_warna,
                'user_add'      => $_SESSION['id_user'],
                'waktu_add'     => $now,
                'status_delete' => 0
            );
            $this->M_Warna->insert('warna',$data);
        }



        Redirect('Warna');
    }

    public function edit_warna(){
        $id_warna   = $this->input->post('id_warna');
        $nama_warna = $this->input->post('nama_warna_edit');

        $now = date('Y-m-d H:i:s');

        $warna        = $this->M_Warna->select_all_aktif()->result_array();
        $jumlah_warna = $this->M_Warna->select_all_aktif()->num_rows();

        $hitung = 0;
        
        for($i=0;$i<$jumlah_warna;$i++){
            if($warna[$i]['id_warna'] == $id_warna){
                continue;
            }
            else{
                if($warna[$i]['nama_warna'] == $nama_warna){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array(
                'nama_warna'    =>$nama_warna,
                'user_edit'     =>$_SESSION['id_user'],
                'waktu_edit'    =>$now
            );
    
            $where = array (
                'id_warna'      =>$id_warna
            );
    
            $this->M_Warna->edit('warna',$data,$where);
        }
        
        Redirect('warna');
    }

    public function delete_warna(){
        $id_warna = $this->input->post('id_warna');
        $now      = date('Y-m-d H:i:s');

        $data = array (
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => $now,
            'status_delete' => 1
        );

        $where = array (
            'id_warna' => $id_warna
        );

        $this->M_Warna->edit('warna',$data,$where);
        redirect('warna');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');

        $data_input['user'] = $this->M_Warna->select_user_add($id)->result_array();

        $nama_user          = $data_input['user'][0]['nama_karyawan'];

        $data['input_user'] = $nama_user;
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

        $data['log']        = $this->M_Warna->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Warna->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();


        echo json_encode($data);
    }

}
