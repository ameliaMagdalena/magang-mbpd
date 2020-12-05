<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Departemen');
        $this->load->model('M_User');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['departemen'] = $this->M_Departemen->select_all_aktif()->result();

        //notif produksi
            //notif permintaan material produksi
                $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
                $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
                $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
                $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
                $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
                $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
                $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
            //tutup notif permintaan material produksi

            //notif surat perintah lembur
                if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
                    $line = "Line Cutting";
                    $data['jm_spl']   = $this->M_Dashboard->get_jm_spl_line($line)->result_array();
                    $data['jm_spl_0'] = $this->M_Dashboard->get_jm_spl_line_0($line)->result_array();
                    $data['jm_spl_1'] = $this->M_Dashboard->get_jm_spl_line_1($line)->result_array();
                    $data['jm_spl_2'] = $this->M_Dashboard->get_jm_spl_line_2($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
                    $line = "Line Bonding";
                    $data['jm_spl'] = $this->M_Dashboard->get_jm_spl_line($line)->result_array();
                    $data['jm_spl_0'] = $this->M_Dashboard->get_jm_spl_line_0($line)->result_array();
                    $data['jm_spl_1'] = $this->M_Dashboard->get_jm_spl_line_1($line)->result_array();
                    $data['jm_spl_2'] = $this->M_Dashboard->get_jm_spl_line_2($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
                    $line = "Line Sewing";
                    $data['jm_spl'] = $this->M_Dashboard->get_jm_spl_line($line)->result_array();
                    $data['jm_spl_0'] = $this->M_Dashboard->get_jm_spl_line_0($line)->result_array();
                    $data['jm_spl_1'] = $this->M_Dashboard->get_jm_spl_line_1($line)->result_array();
                    $data['jm_spl_2'] = $this->M_Dashboard->get_jm_spl_line_2($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
                    $line = "Line Assy";
                    $data['jm_spl'] = $this->M_Dashboard->get_jm_spl_line($line)->result_array();
                    $data['jm_spl_0'] = $this->M_Dashboard->get_jm_spl_line_0($line)->result_array();
                    $data['jm_spl_1'] = $this->M_Dashboard->get_jm_spl_line_1($line)->result_array();
                    $data['jm_spl_2'] = $this->M_Dashboard->get_jm_spl_line_2($line)->result_array();
                }
                else{
                    $data['jm_spl']   = $this->M_Dashboard->get_jm_spl()->result_array();
                    $data['jm_spl_0'] = $this->M_Dashboard->get_jm_spl_0()->result_array();
                    $data['jm_spl_1'] = $this->M_Dashboard->get_jm_spl_1()->result_array();
                    $data['jm_spl_2'] = $this->M_Dashboard->get_jm_spl_2()->result_array();
                }
            //tutup notif surat perintah lembur
    
            //notif laporan lembur
                $tanggal = date('Y-m-d');
    
                if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
                    $line = "Line Cutting";
                    $data['jm_ll'] = $this->M_Dashboard->get_jm_ll_line($line,$tanggal)->result_array();
                    $data['jm_ll_3'] = $this->M_Dashboard->get_jm_ll_line_3($line,$tanggal)->result_array();
                    $data['jm_ll_4'] = $this->M_Dashboard->get_jm_ll_line_4($line,$tanggal)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
                    $line = "Line Bonding";
                    $data['jm_ll'] = $this->M_Dashboard->get_jm_ll_line($line,$tanggal)->result_array();
                    $data['jm_ll_3'] = $this->M_Dashboard->get_jm_ll_line_3($line,$tanggal)->result_array();
                    $data['jm_ll_4'] = $this->M_Dashboard->get_jm_ll_line_4($line,$tanggal)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
                    $line = "Line Sewing";
                    $data['jm_ll'] = $this->M_Dashboard->get_jm_ll_line($line,$tanggal)->result_array();
                    $data['jm_ll_3'] = $this->M_Dashboard->get_jm_ll_line_3($line,$tanggal)->result_array();
                    $data['jm_ll_4'] = $this->M_Dashboard->get_jm_ll_line_4($line,$tanggal)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
                    $line = "Line Assy";
                    $data['jm_ll'] = $this->M_Dashboard->get_jm_ll_line($line,$tanggal)->result_array();
                    $data['jm_ll_3'] = $this->M_Dashboard->get_jm_ll_line_3($line,$tanggal)->result_array();
                    $data['jm_ll_4'] = $this->M_Dashboard->get_jm_ll_line_4($line,$tanggal)->result_array();
                }
                else{
                    $data['jm_ll']   = $this->M_Dashboard->get_jm_ll($tanggal)->result_array();
                    $data['jm_ll_3'] = $this->M_Dashboard->get_jm_ll_3($tanggal)->result_array();
                    $data['jm_ll_4'] = $this->M_Dashboard->get_jm_ll_4($tanggal)->result_array();
                }
            //tutup notif laporan lembur
        //tutup

		$this->load->view('v_departemen',$data);
    }

    public function cek_nama_departemen_input(){
        $nama_departemen = $this->input->post('nama_departemen_input');

        $hasil_cari_departemen = $this->M_Departemen->cari_departemen($nama_departemen)->num_rows();

        if($hasil_cari_departemen > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

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

}
