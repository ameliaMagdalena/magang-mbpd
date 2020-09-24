<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Line');
        $this->load->model('M_Tetapan');
        $this->load->model('M_User');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['line']                  = $this->M_Line->select_all_aktif()->result();
        $data['jmline']                = $this->M_Line->select_all_aktif()->num_rows();
        $data['processing_time']       = $this->M_Tetapan->select_processing_time()->result_array();
        $data['nmline1']               = "Line Cutting";
        $data['nmline2']               = "Line Bonding";
        $data['nmline3']               = "Line Sewing";
        $data['nmline4']               = "Line Assy";
        
        //$data['pic']                   = $this->M_Line->select_pic()->result();
        
        $this->load->view('v_line',$data);
    }

    public function cek_nama_line(){
        $nama_line = $this->input->post('nama_line');

        $hasil_cari_line = $this->M_Line->cari_line($nama_line)->num_rows();

        if($hasil_cari_line > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function tambah_line(){
        $nama_line             = $this->input->post('nama_line');
        $urutan_line           = $this->input->post('urutan_line');
        $jumlah_team           = $this->input->post('jumlah_team');
        $total_processing_time = $this->input->post('total_processing_time');
        $satuan_biaya          = $this->input->post('satuan_biaya');
        $jumlah_pekerja_per_team = $this->input->post('jumlah_pekerja_per_team');

        $now = date('Y-m-d H:i:s');

        $jumlah_line = $this->M_Line->select_all()->num_rows();
        $id_number      = $jumlah_line + 1;

        $id_line     = "LINE-".$id_number;

        $data = array (
            'id_line'                => $id_line,
            'nama_line'              => $nama_line,
            'urutan_line'            => $urutan_line,
            'jumlah_team'            => $jumlah_team,
            'total_processing_time'  => $total_processing_time,
            'satuan_biaya'           => $satuan_biaya,
            'jumlah_pekerja_per_team'=> $jumlah_pekerja_per_team,
            'user_add'               => $_SESSION['id_user'],
            'waktu_add'              => $now,
            'status_delete'          => 0
        );

        $this->M_Line->insert('line',$data);
        Redirect('Line');
    }

    public function edit_line(){
        $id_line               = $this->input->post('id_line');
        $nama_line             = $this->input->post('nama_line_edit');
        $urutan_line           = $this->input->post('urutan_line');
        $jumlah_team           = $this->input->post('jumlah_team');
        $total_processing_time = $this->input->post('total_processing_time');
        $satuan_biaya          = $this->input->post('satuan_biaya');
        $jumlah_pekerja_per_team = $this->input->post('jumlah_pekerja_per_team');

        $now  = date('Y-m-d H:i:s');

        $data = array (
            'nama_line'              => $nama_line,
            'urutan_line'            => $urutan_line,
            'jumlah_team'            => $jumlah_team,
            'total_processing_time'  => $total_processing_time,
            'satuan_biaya'           => $satuan_biaya,
            'jumlah_pekerja_per_team'=> $jumlah_pekerja_per_team,
            'user_edit'               => $_SESSION['id_user'],
            'waktu_edit'              => $now,
        );

        $where = array(
            'id_line'    => $id_line
        );

        $this->M_Line->edit('line',$data,$where);
        redirect('Line');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');
        $data['id'] = $this->input->post('id');

        $data_input['user'] = $this->M_Line->select_user_add($id)->result_array();

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

        $data['log']        = $this->M_Line->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Line->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();


        echo json_encode($data);
    }
}
