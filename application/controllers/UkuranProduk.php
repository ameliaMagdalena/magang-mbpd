<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UkuranProduk extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_UkuranProduk');
        $this->load->model('M_JenisProduk');
        $this->load->model('M_User');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['ukuran_produk']      = $this->M_UkuranProduk->select_all_aktif()->result();
        $data['jenis_produk']       = $this->M_JenisProduk->select_all_aktif()->result();
        
		$this->load->view('v_ukuran_produk',$data);
    }

    public function cek_ukuran_produk_tambah(){
        $id_jenis_produk        = $this->input->post('id_jenis_produk');
        $ukuran_produk          = $this->input->post('ukuran_produk');
        $satuan_ukuran_produk   = $this->input->post('satuan_ukuran_produk');

        $hasil_cari_ukuran_produk = $this->M_UkuranProduk->cari_ukuran_produk($id_jenis_produk,$ukuran_produk,$satuan_ukuran_produk)->num_rows();

        if($hasil_cari_ukuran_produk > 0){
           $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function cek_ukuran_produk_edit(){
        $id_jenis_produk        = $this->input->post('id_jenis_produk');
        $ukuran_produk          = $this->input->post('ukuran_produk');
        $satuan_ukuran_produk   = $this->input->post('satuan_ukuran_produk');

        $hasil_cari_ukuran_produk = $this->M_UkuranProduk->cari_ukuran_produk($id_jenis_produk,$ukuran_produk,$satuan_ukuran_produk)->num_rows();

        if($hasil_cari_ukuran_produk > 0){
           $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function tambah_ukuran_produk(){
        $id_jenis_produk       = $this->input->post('id_jenis_produk_tambah');
        $ukuran_produk         = $this->input->post('ukuran_produk_tambah');
        $satuan_ukuran_produk  = $this->input->post('satuan_ukuran_produk_tambah');

        $now = date('Y-m-d H:i:s');

        $jumlah_ukuran_produk = $this->M_UkuranProduk->select_all()->num_rows();
        $id_number            = $jumlah_ukuran_produk + 1;

        $id_ukuran_produk     = "UKPROD-".$id_number;

        $data = array (
            'id_ukuran_produk'  => $id_ukuran_produk,
            'id_jenis_produk'   => $id_jenis_produk,
            'ukuran_produk'     => $ukuran_produk,
            'satuan_ukuran'     => $satuan_ukuran_produk,
            'user_add'          => $_SESSION['id_user'],
            'waktu_add'         => $now,
            'status_delete'     => 0
        );

        $this->M_UkuranProduk->insert('ukuran_produk',$data);
        Redirect('UkuranProduk');
    }

    public function edit_ukuran_produk(){
        $id_ukuran_produk   = $this->input->post('id_ukuran_produk');
        $id_jenis_produk    = $this->input->post('id_jenis_produk_edit');
        $ukuran_produks      = $this->input->post('ukuran_produk_edit');
        $satuan_ukuran      = $this->input->post('satuan_ukuran_produk_edit');

        $now          = date('Y-m-d H:i:s');

        $ukuran_produk        = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $jumlah_ukuran_produk = $this->M_UkuranProduk->select_all_aktif()->num_rows();
        $hitung = 0;
        
        for($i=0;$i<$jumlah_ukuran_produk;$i++){
            if($ukuran_produk[$i]['id_ukuran_produk'] == $id_ukuran_produk){
                continue;
            }
            else{
                if($ukuran_produk[$i]['id_jenis_produk'] == $id_jenis_produk && 
                $ukuran_produk[$i]['ukuran_produk'] == $ukuran_produks && 
                $ukuran_produk[$i]['satuan_ukuran'] == $satuan_ukuran){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data         = array(
                'id_jenis_produk'  => $id_jenis_produk,
                'ukuran_produk'    => $ukuran_produks,
                'satuan_ukuran'    => $satuan_ukuran,
                'user_edit'        => $_SESSION['id_user'],
                'waktu_edit'       => $now
            );

            $where        = array(
                'id_ukuran_produk'    => $id_ukuran_produk
            );

            $this->M_UkuranProduk->edit('ukuran_produk',$data,$where);
        }
        redirect('UkuranProduk');
    }

    public function delete_ukuran_produk(){
        $id_ukuran_produk = $this->input->post('id_ukuran_produk');
        $now      = date('Y-m-d H:i:s');

        $data = array (
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => $now,
            'status_delete' => 1
        );

        $where = array (
            'id_ukuran_produk' => $id_ukuran_produk
        );

        $this->M_UkuranProduk->edit('ukuran_produk',$data,$where);
        redirect('ukuranProduk');
    }
    
    public function ambil_data_log(){
        $id = $this->input->post('id');

        $data_input['user'] = $this->M_UkuranProduk->select_user_add($id)->result_array();

        $nama_user          = $data_input['user'][0]['nama_karyawan'];

        $data['input_user'] = $nama_user;

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

        $data['log']        = $this->M_UkuranProduk->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_UkuranProduk->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();

        $data['jenis_produk'] = $this->M_JenisProduk->select_all_aktif()->result_array();
        $data['jm_jenis_produk'] = $this->M_JenisProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

}
