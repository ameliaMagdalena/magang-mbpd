<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Rekening');
        $this->load->model('M_Bank');
        $this->load->model('M_User');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['rekening']     = $this->M_Rekening->select_all_aktif()->result();
        $data['bank']         = $this->M_Bank->select_all_aktif()->result();

		$this->load->view('v_rekening',$data);
    }

    public function tambah_rekening(){
        $id_bank        = $this->input->post('id_bank_input');
        $nomor_rekening = $this->input->post('nomor_rekening_input');
        $atas_nama      = $this->input->post('an_input');
        $kantor_cabang  = $this->input->post('kantor_cabang');

        $jumlah         = $this->M_Rekening->select_all()->num_rows();
        $id_rekening    = "REK-".($jumlah+1);

        $now = date("Y-m-d H:i:s");

        $data = array (
            'id_rekening'      => $id_rekening,
            'id_bank'          => $id_bank,
            'nomor_rekening'   => $nomor_rekening,
            'atas_nama'        => $atas_nama,
            'kantor_cabang'    => $kantor_cabang,
            'user_add'         => $_SESSION['id_user'],
            'waktu_add'        => $now,
            'status_delete'    => 0
        );

        $this->M_Rekening->insert('rekening',$data);

        redirect('Rekening');
    }
    
    public function cek_rekening_input(){
        $nomor_rekening = $this->input->post('nomor_rekening');

        $hasil_cari_rekening = $this->M_Rekening->cari_rekening($nomor_rekening)->num_rows();

        if($hasil_cari_rekening > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function cek_rekening_edit(){
        $nomor_rekening = $this->input->post('nomor_rekening');

        $hasil_cari_rekening = $this->M_Rekening->cari_rekening($nomor_rekening)->num_rows();

        if($hasil_cari_rekening > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function edit_rekening(){
        $id_rekening    = $this->input->post('id_rekening');
        $id_bank        = $this->input->post('id_bank_edit');
        $nomor_rekening = $this->input->post('nomor_rekening_edit');
        $atas_nama      = $this->input->post('an_edit');
        $kantor_cabang  = $this->input->post('kantor_cabang');

        $now = date('Y-m-d H:i:s');

        $where = array(
            'id_rekening' => $id_rekening
        );

        $data = array(
            'id_bank'        => $id_bank,
            'nomor_rekening' => $nomor_rekening,
            'atas_nama'      => $atas_nama,
            'kantor_cabang'  => $kantor_cabang,
            'user_edit'      => $_SESSION['id_user'],
            'waktu_edit'     => $now
        );

        $this->M_Rekening->edit('rekening',$data,$where);
            
        redirect('Rekening');
    }


    public function delete_rekening(){
        $id_rekening = $this->input->post('id_rekening');
        $now = date('Y-m-d H:i:s');

        $where = array (
            'id_rekening' => $id_rekening
        );

        $data = array(
            'user_edit' => $_SESSION['id_user'],
            'waktu_edit' => $now,
            'status_delete' => 1
        );

        $this->M_Rekening->edit('rekening',$data,$where);

        redirect('Rekening');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');

        $data_input['user'] = $this->M_Rekening->select_user_add($id)->result_array();

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

        $data['log']        = $this->M_Rekening->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Rekening->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();

        $data['bank']        = $this->M_Bank->select_all_aktif()->result();
        $data['jumlah_bank'] = $this->M_Bank->select_all_aktif()->num_rows();





        echo json_encode($data);
    }
}
