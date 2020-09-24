<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Karyawan');
        $this->load->model('M_Departemen');
        $this->load->model('M_SpesifikasiJabatan');
        $this->load->model('M_User');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['karyawan']   = $this->M_Karyawan->select_all_aktif()->result();
        $data['departemen'] = $this->M_Departemen->select_all_aktif()->result();
        $data['spesifikasi_jabatan'] = $this->M_Karyawan->select_all_jabatan_karyawans()->result();

		$this->load->view('v_karyawan',$data);
    }

    public function cek_nama_karyawan_input(){
        $nama_karyawan = $this->input->post('nama_karyawan_input');

        $hasil_cari_karyawan = $this->M_Karyawan->cari_karyawan($nama_karyawan)->num_rows();

        if($hasil_cari_karyawan > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    //get nama material based on jenis materialnya
    public function get_spesifikasi_jabatan(){
        $id_departemen = $this->input->post('id_departemen');

        $data['sjabatan']        = $this->M_SpesifikasiJabatan->cari_sjabatan($id_departemen)->result_array();
        $data['jumlah_sjabatan'] = $this->M_SpesifikasiJabatan->cari_sjabatan($id_departemen)->num_rows();

        echo json_encode($data);
    }

    public function cek_email_input(){
        $email = $this->input->post('email_user_input');

        $hasil_cari = $this->M_Karyawan->cari_karyawan_email($email)->num_rows();

        if($hasil_cari > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);        
    }

    public function tambah_karyawan(){
        $nama_karyawan = $this->input->post('nama_karyawan_input');
        $keterangan    = $this->input->post('keterangan');
        $jumlah_sj_    = $this->input->post('jumlah_sj');
        $jumlah_sj     = strlen($jumlah_sj_); 

        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d H:i:s');

        //karyawan
        $jum_karyawan = $this->M_Karyawan->select_all()->num_rows();
        $id_num_kar   = $jum_karyawan + 1;

        $id_karyawan = "KAR-".$id_num_kar;

    
        $data_kar = array (
            'id_karyawan'   => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'keterangan'    => $keterangan,
            'user_add'      => $user,
            'waktu_add'     => $now,
            'status_delete' => 0
        );

        $this->M_Karyawan->insert('karyawan',$data_kar);
    

        //jabatan_karyawan
        for($i=1;$i<=$jumlah_sj;$i++){
            $id_spesifikasi_jabatan    = $this->input->post('idjb'.$i);

            $jum_jab_kar =  $this->M_Karyawan->select_all_jabatan_karyawan()->num_rows();
            $id_num_jab_kar = $jum_jab_kar + 1;

            $id_jab_kar = "JBTKAR-".$id_num_jab_kar;

            
            $data_jab_kar = array (
                'id_jabatan_karyawan'   => $id_jab_kar,
                'id_karyawan'           => $id_karyawan,
                'id_spesifikasi_jabatan'=> $id_spesifikasi_jabatan,
                'user_add'              => $user,
                'waktu_add'             => $now,
                'status_delete'         => 0
            );

            $this->M_Karyawan->insert('jabatan_karyawan',$data_jab_kar);
            
        }

        //user
        if($keterangan == 1){
            $email    = $this->input->post('email_user_input');
            $password = $this->input->post('password_user_input');

            $jum_user = $this->M_User->selectAllUser()->num_rows();
            $id_num_user = $jum_user+1;

            $id_user = "USER-".$id_num_user;

            
            $data_user = array (
                'id_user'       => $id_user,
                'id_karyawan'   => $id_karyawan,
                'email_user'    => $email,
                'password_user' => md5($password),
                'user_add'      => $user,
                'waktu_add'     => $now,
                'status_delete' => 0
            );

            $this->M_Karyawan->insert('user',$data_user);
        }
        
        redirect('karyawan');

    }
/*


    public function cek_nama_departemen_edit(){
        $nama_departemen = $this->input->post('nama_departemen_edit');

        $hasil_cari_departemen = $this->M_Departemen->cari_departemen($nama_departemen)->num_rows();

        if($hasil_cari_departemen > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function tambah_departemen(){
        $nama_departemen = $this->input->post('nama_departemen_input');

        $now = date('Y-m-d H:i:s');
        $jumlah_departemen   = $this->M_Departemen->select_all()->num_rows();
        $id_number      = $jumlah_departemen + 1;

        $id_departemen     = "DEPT-".$id_number;

        $departemen        = $this->M_Departemen->select_all_aktif()->result_array();
        $jumlah_departemen = $this->M_Departemen->select_all_aktif()->num_rows();
        $hitung = 0;
        
        for($i=0;$i<$jumlah_departemen;$i++){
            if($departemen[$i]['id_departemen'] == $id_departemen){
                continue;
            }
            else{
                if($departemen[$i]['nama_departemen'] == $nama_departemen){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array (
                'id_departemen'      => $id_departemen,
                'nama_departemen'    => $nama_departemen,
                'user_add'      => $_SESSION['id_user'],
                'waktu_add'     => $now,
                'status_delete' => 0
            );
            $this->M_Departemen->insert('departemen',$data);
        }
        Redirect('departemen');
    }

    public function edit_departemen(){
        $id_departemen   = $this->input->post('id_departemen');
        $nama_departemen = $this->input->post('nama_departemen_edit');

        $now = date('Y-m-d H:i:s');

        $departemen        = $this->M_Departemen->select_all_aktif()->result_array();
        $jumlah_departemen = $this->M_Departemen->select_all_aktif()->num_rows();

        $hitung = 0;
        
        for($i=0;$i<$jumlah_departemen;$i++){
            if($departemen[$i]['id_departemen'] == $id_departemen){
                continue;
            }
            else{
                if($departemen[$i]['nama_departemen'] == $nama_departemen){
                    $hitung++;
                }
            }
        }

        if($hitung == 0){
            $data = array(
                'nama_departemen'   =>$nama_departemen,
                'user_edit'         =>$_SESSION['id_user'],
                'waktu_edit'        =>$now
            );
    
            $where = array (
                'id_departemen'      =>$id_departemen
            );
    
            $this->M_Departemen->edit('departemen',$data,$where);
        }
        
        Redirect('departemen');
    }

    public function delete_departemen(){
        $id_departemen = $this->input->post('id_departemen');
        $now      = date('Y-m-d H:i:s');

        $data = array (
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => $now,
            'status_delete' => 1
        );

        $where = array (
            'id_departemen' => $id_departemen
        );

        $this->M_Departemen->edit('departemen',$data,$where);
        redirect('departemen');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');
        $data['id'] = $id;

        $data_input['user']       = $this->M_Departemen->select_user_add($id)->result_array();
        $id_user                  = $data_input['user'][0]['user_add'];
        $data_input['cari_user']  = $this->M_Departemen->cari_user($id_user)->result_array();
 
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

        $data['log']        = $this->M_Departemen->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Departemen->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();
    
        echo json_encode($data);
    }
*/
}
