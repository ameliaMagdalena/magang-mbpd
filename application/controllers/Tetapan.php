<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tetapan extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Tetapan');
        $this->load->model('M_User');
        $this->load->model('M_Line');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['tetapan']      = $this->M_Tetapan->select_all_aktif()->result();

		$this->load->view('v_tetapan',$data);
    }

    public function cek_nama_tetapan(){
        $nama_tetapan = $this->input->post('nama_tetapan');

        $hasil_cari_tetapan = $this->M_Tetapan->cari_tetapan($nama_tetapan)->num_rows();

        if($hasil_cari_tetapan > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function tambah_tetapan(){
        $jumlah_tetapan = $this->input->post('jumlah_tetapan');

        if($jumlah_tetapan == 16){
            $nama_tetapan = $this->input->post('nama_tetapan');
        } else{
            $nama_tetapan = $this->input->post('nama_tetapan_wajib');
        }

        $isi_tetapan  = $this->input->post('isi_tetapan');
        $now = date('Y-m-d H:i:s');

        $jumlah_tetapan = $this->M_Tetapan->select_all()->num_rows();
        $id_number      = $jumlah_tetapan + 1;

        $id_tetapan     = "TTPN-".$id_number;

        $data = array (
            'id_tetapan'   => $id_tetapan,
            'nama_tetapan' => $nama_tetapan,
            'isi_tetapan'  => $isi_tetapan,
            'user_add'     => $_SESSION['id_user'],
            'waktu_add'    => $now,
            'status_delete'=> 0
        );

        $this->M_Tetapan->insert('tetapan',$data);
        Redirect('Tetapan');
    }

    public function edit_tetapan(){
        $id_tetapan   = $this->input->post('id_tetapan');
        $nama_tetapan = $this->input->post('nama_tetapan');
        
        if($nama_tetapan == "Processing Time"){
            $isi_tetapan = $this->input->post('isi_tetapan_pt');
        }
        else{
            $isi_tetapan = $this->input->post('isi_tetapan_lain');
        }

        $now          = date('Y-m-d H:i:s');

        $data         = array (
            'nama_tetapan'  => $nama_tetapan,
            'isi_tetapan'   => $isi_tetapan,
            'user_edit'     => $_SESSION['id_user'],
            'waktu_edit'    => $now
        );

        $where        = array(
            'id_tetapan'    => $id_tetapan
        );

        if($nama_tetapan == "Processing Time"){
            $data_tampung['line'] = $this->M_Line->select_all_aktif()->result_array();
            $jumlah_line  = $this->M_Line->select_all_aktif()->num_rows();

            for($i=0;$i<$jumlah_line;$i++){
                $jumlah_team               = $data_tampung['line'][$i]['jumlah_team'];
                $new_total_processing_time = $isi_tetapan * $jumlah_team;

                $data_edit = array (
                    'total_processing_time' => $new_total_processing_time,
                    'user_edit'             => $_SESSION['id_user'],
                    'waktu_edit'            => $now
                );

                $where_edit = array(
                    'id_line'    => $data_tampung['line'][$i]['id_line']
                );

                $this->M_Line->edit('line',$data_edit,$where_edit);
            }
        }

        $this->M_Tetapan->edit('tetapan',$data,$where);
        redirect('Tetapan');
        //echo $new_total_processing_time;
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');

        $data_input['user'] = $this->M_Tetapan->select_user_add($id)->result_array();

        $data['input_user'] = $data_input['user'][0]['nama_karyawan'];
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

        $data['log']        = $this->M_Tetapan->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Tetapan->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();


        echo json_encode($data);
    }
}
