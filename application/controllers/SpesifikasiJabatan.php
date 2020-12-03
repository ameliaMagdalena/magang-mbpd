<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SpesifikasiJabatan extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_SpesifikasiJabatan');
        $this->load->model('M_Jabatan');
        $this->load->model('M_Departemen');
        $this->load->model('M_User');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['spesifikasi_jabatan'] = $this->M_SpesifikasiJabatan->select_all_aktif()->result();
        $data['jabatan']             = $this->M_Jabatan->select_all_aktif()->result();
        $data['departemen']          = $this->M_Departemen->select_all_aktif()->result();

		$this->load->view('v_spesifikasi_jabatan',$data);
    }

    public function cek_input(){
        $id_departemen = $this->input->post('id_departemen_input');
        $id_jabatan    = $this->input->post('id_jabatan_input');

        $hasil_cari = $this->M_SpesifikasiJabatan->cari_spesifikasi_jabatan($id_departemen,$id_jabatan)->num_rows();

        if($hasil_cari > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    
    public function tambah_spesifikasi_jabatan(){
        $id_departemen = $this->input->post('departemen_input');
        $id_jabatan    = $this->input->post('jabatan_input');

        $now = date('Y-m-d H:i:s');
        $jumlah         = $this->M_SpesifikasiJabatan->select_all()->num_rows();
        $id_number      = $jumlah + 1;

        $id     = "SJBT-".$id_number;

        $sjabatan        = $this->M_SpesifikasiJabatan->select_all_aktif()->result_array();
        $jumlah_sjabatan = $this->M_SpesifikasiJabatan->select_all_aktif()->num_rows();
        $hitung = 0;
        
        for($i=0;$i<$jumlah_sjabatan;$i++){
            if($sjabatan[$i]['id_spesifikasi_jabatan'] == $id){
                continue;
            }
            else{
                if($sjabatan[$i]['id_departemen'] == $id_departemen && $sjabatan[$i]['id_jabatan'] == $id_jabatan){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array (
                'id_spesifikasi_jabatan'    => $id,
                'id_departemen'             => $id_departemen,
                'id_jabatan'                => $id_jabatan,
                'user_add'                  => $_SESSION['id_user'],
                'waktu_add'                 => $now,
                'status_delete'             => 0
            );
            $this->M_SpesifikasiJabatan->insert('spesifikasi_jabatan',$data);
        }

        Redirect('SpesifikasiJabatan');
    }

    public function cek_edit(){
        $id_departemen = $this->input->post('id_departemen_edit');
        $id_jabatan    = $this->input->post('id_jabatan_edit');

        $hasil_cari = $this->M_SpesifikasiJabatan->cari_spesifikasi_jabatan($id_departemen,$id_jabatan)->num_rows();

        if($hasil_cari > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }


    public function edit_spesifikasi_jabatan(){
        $id_spesifikasi_jabatan = $this->input->post('id_spesifikasi_jabatan');
        $id_departemen          = $this->input->post('departemen_edit');
        $id_jabatan             = $this->input->post('jabatan_edit');

        $now = date('Y-m-d H:i:s');

        $sjabatan        = $this->M_SpesifikasiJabatan->select_all_aktif()->result_array();
        $jumlah_sjabatan = $this->M_SpesifikasiJabatan->select_all_aktif()->num_rows();

        $hitung = 0;
        
        for($i=0;$i<$jumlah_sjabatan;$i++){
            if($sjabatan[$i]['id_spesifikasi_jabatan'] == $id_spesifikasi_jabatan){
                continue;
            }
            else{
                if($sjabatan[$i]['id_departemen'] == $id_departemen && $sjabatan[$i]['id_jabatan'] == $id_jabatan){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array(
                'id_departemen' =>$id_departemen,
                'id_jabatan'    =>$id_jabatan,
                'user_edit'     =>$_SESSION['id_user'],
                'waktu_edit'    =>$now
            );
    
            $where = array (
                'id_spesifikasi_jabatan'      =>$id_spesifikasi_jabatan
            );
    
            $this->M_SpesifikasiJabatan->edit('spesifikasi_jabatan',$data,$where);
        }
        
        Redirect('spesifikasiJabatan');
    }

    public function delete_spesifikasi_jabatan(){
        $id_spesifikasi_jabatan = $this->input->post('id_spesifikasi_jabatan');
        $now      = date('Y-m-d H:i:s');

        $data = array (
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => $now,
            'status_delete' => 1
        );

        $where = array (
            'id_spesifikasi_jabatan' => $id_spesifikasi_jabatan
        );

        $this->M_SpesifikasiJabatan->edit('spesifikasi_jabatan',$data,$where);
        redirect('spesifikasiJabatan');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');
        $data['id'] = $id;


        $data_input['user']       = $this->M_SpesifikasiJabatan->select_user_add($id)->result_array();
        $id_user                  = $data_input['user'][0]['user_add'];
      
        $data_input['cari_user']  = $this->M_SpesifikasiJabatan->cari_user($id_user)->result_array();
 
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
  
        $data['log']        = $this->M_SpesifikasiJabatan->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_SpesifikasiJabatan->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();
    
        echo json_encode($data);
    }


}
