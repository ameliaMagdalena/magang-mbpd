<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisProduk extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_JenisProduk');
        $this->load->model('M_User');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['jenis_produk']      = $this->M_JenisProduk->select_all_aktif()->result();
       // $data['tetapan_logs'] = $this->M_Tetapan->select_log()->result();

		$this->load->view('v_jenis_produk',$data);
    }


    public function cek_nama_jenis_produk_tambah(){
        $nama_jenis_produk_tambah = $this->input->post('nama_jenis_produk_tambah');

        $hasil_cari_jenis_produk = $this->M_JenisProduk->cari_jenis_produk($nama_jenis_produk_tambah)->num_rows();

        if($hasil_cari_jenis_produk > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function cek_nama_jenis_produk_edit(){
        $nama_jenis_produk_edit = $this->input->post('nama_jenis_produk_edit');

        $hasil_cari_jenis_produk = $this->M_JenisProduk->cari_jenis_produk($nama_jenis_produk_edit)->num_rows();

        if($hasil_cari_jenis_produk > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function tambah_jenis_produk(){
        $nama_jenis_produk  = $this->input->post('nama_jenis_produk_tambah');
        $now = date('Y-m-d H:i:s');

        $jumlah_jenis_produk = $this->M_JenisProduk->select_all()->num_rows();
        $id_number      = $jumlah_jenis_produk + 1;

        $id_jenis_produk     = "JENPROD-".$id_number;

        $data = array (
            'id_jenis_produk'   => $id_jenis_produk,
            'nama_jenis_produk' => $nama_jenis_produk,
            'user_add'          => $_SESSION['id_user'],
            'waktu_add'         => $now,
            'status_delete'     => 0
        );

        $this->M_JenisProduk->insert('jenis_produk',$data);
        Redirect('JenisProduk');
    }

    public function edit_jenis_produk(){
        $id_jenis_produk   = $this->input->post('id_jenis_produk');
        $nama_jenis_produk = $this->input->post('nama_jenis_produk_edit');

        $now          = date('Y-m-d H:i:s');


        $jenis_produk        = $this->M_JenisProduk->select_all_aktif()->result_array();
        $jumlah_jenis_produk = $this->M_JenisProduk->select_all_aktif()->num_rows();
        $hitung = 0;
        
        for($i=0;$i<$jumlah_jenis_produk;$i++){
            if($jenis_produk[$i]['id_jenis_produk'] == $id_jenis_produk){
                continue;
            }
            else{
                if($jenis_produk[$i]['nama_jenis_produk'] == $nama_jenis_produk){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data         = array (
                'nama_jenis_produk'  => $nama_jenis_produk,
                'user_edit'     => $_SESSION['id_user'],
                'waktu_edit'    => $now
            );

            $where        = array(
                'id_jenis_produk'    => $id_jenis_produk
            );

            $this->M_JenisProduk->edit('jenis_produk',$data,$where);
        }
        
        redirect('JenisProduk');
    }

    public function delete_jenis_produk(){
        $id_jenis_produk = $this->input->post('id_jenis_produk');
        $now      = date('Y-m-d H:i:s');

        $data = array (
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => $now,
            'status_delete' => 1
        );

        $where = array (
            'id_jenis_produk' => $id_jenis_produk
        );

        $this->M_JenisProduk->edit('jenis_produk',$data,$where);
        redirect('jenisProduk');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');

        $data_input['user'] = $this->M_JenisProduk->select_user_add($id)->result_array();

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

        $data['log']        = $this->M_JenisProduk->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_JenisProduk->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();


        echo json_encode($data);
    }
}
