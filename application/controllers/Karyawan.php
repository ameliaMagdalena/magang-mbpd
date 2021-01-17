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
        $this->load->model('M_Dashboard');
        $this->load->model('M_PerencanaanMaterial');
        $this->load->model('M_PerubahanPermintaan');
        $this->load->model('M_PermintaanTambahan');
        $this->load->model('M_PerubahanHarga');
        $this->load->model('M_PurchaseOrderCustomer');
        $this->load->model('M_PurchaseOrderSupplier');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['karyawan']   = $this->M_Karyawan->select_all_aktif()->result();
        $data['departemen'] = $this->M_Departemen->select_all_aktif()->result();
        $data['spesifikasi_jabatan'] = $this->M_Karyawan->select_all_jabatan_karyawans()->result();

        //notif material
            $data['permat'] = $this->M_PerencanaanMaterial->selectPermintaanMaterialAktif()->result_array();
            $data['ubpermat'] = $this->M_PerubahanPermintaan->selectPerubahanPermintaanAktif()->result_array();
            $data['tbpermat'] = $this->M_PermintaanTambahan->selectPermintaanTambahanAktif()->result_array();
            $data['ubharga'] = $this->M_PerubahanHarga->selectPerubahanHargaAktif()->result_array();
            $data['sup'] = $this->M_PurchaseOrderSupplier->selectPOSupplierAktif()->result_array();
            $data['cust'] = $this->M_PurchaseOrderCustomer->selectPOCustomerAktif()->result_array();
        //tutup
                
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

            //notif bpbj
                $data['jm_bpbj']   = $this->M_Dashboard->get_jm_bpbj()->result_array();
                $data['jm_bpbj_0'] = $this->M_Dashboard->get_jm_bpbj_0()->result_array();
                $data['jm_bpbj_1'] = $this->M_Dashboard->get_jm_bpbj_1()->result_array();
            //tutup notif bpbj

            //notig bpbd
                $data['jm_bpbd']   = $this->M_Dashboard->get_jm_bpbd()->result_array();
            //tutup notif bpbd

            //notif surat jalan
                $data['jm_sj']   = $this->M_Dashboard->get_jm_sj()->result_array();
                $data['jm_sj_0'] = $this->M_Dashboard->get_jm_sj_0()->result_array();
                $data['jm_sj_1'] = $this->M_Dashboard->get_jm_sj_1()->result_array();
            //tutup notif surat jalan

            //notif invoice
                $data['jm_invoice']   = $this->M_Dashboard->get_jm_invoice()->result_array();
            //tutup notif invoice

            //notif pengambilan material
                if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
                    $line = "Line Cutting";
                    $data['jm_pengmat']   = $this->M_Dashboard->get_jm_pengmat_line($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
                    $line = "Line Bonding";
                    $data['jm_pengmat']   = $this->M_Dashboard->get_jm_pengmat_line($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
                    $line = "Line Sewing";
                    $data['jm_pengmat']   = $this->M_Dashboard->get_jm_pengmat_line($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
                    $line = "Line Assy";
                    $data['jm_pengmat']   = $this->M_Dashboard->get_jm_pengmat_line($line)->result_array();
                }
                else{
                    $data['jm_pengmat']   = $this->M_Dashboard->get_jm_pengmat()->result_array();
                }
            //tutup notif pengambilan material

            //notif permintaan tambahan
                if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
                    $line = "Line Cutting";
                    $data['jm_pertam']     = $this->M_Dashboard->get_jm_pertam_line($line)->result_array();
                    $data['jm_pertam_0']   = $this->M_Dashboard->get_jm_pertam_line_0($line)->result_array();
                    $data['jm_pertam_1']   = $this->M_Dashboard->get_jm_pertam_line_1($line)->result_array();
                    $data['jm_pertam_2']   = $this->M_Dashboard->get_jm_pertam_line_2($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
                    $line = "Line Bonding";
                    $data['jm_pertam']     = $this->M_Dashboard->get_jm_pertam_line($line)->result_array();
                    $data['jm_pertam_0']   = $this->M_Dashboard->get_jm_pertam_line_0($line)->result_array();
                    $data['jm_pertam_1']   = $this->M_Dashboard->get_jm_pertam_line_1($line)->result_array();
                    $data['jm_pertam_2']   = $this->M_Dashboard->get_jm_pertam_line_2($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
                    $line = "Line Sewing";
                    $data['jm_pertam']     = $this->M_Dashboard->get_jm_pertam_line($line)->result_array();
                    $data['jm_pertam_0']   = $this->M_Dashboard->get_jm_pertam_line_0($line)->result_array();
                    $data['jm_pertam_1']   = $this->M_Dashboard->get_jm_pertam_line_1($line)->result_array();
                    $data['jm_pertam_2']   = $this->M_Dashboard->get_jm_pertam_line_2($line)->result_array();
                }
                else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
                    $line = "Line Assy";
                    $data['jm_pertam']     = $this->M_Dashboard->get_jm_pertam_line($line)->result_array();
                    $data['jm_pertam_0']   = $this->M_Dashboard->get_jm_pertam_line_0($line)->result_array();
                    $data['jm_pertam_1']   = $this->M_Dashboard->get_jm_pertam_line_1($line)->result_array();
                    $data['jm_pertam_2']   = $this->M_Dashboard->get_jm_pertam_line_2($line)->result_array();
                }
                else{
                    $data['jm_pertam']     = $this->M_Dashboard->get_jm_pertam()->result_array();
                    $data['jm_pertam_0']   = $this->M_Dashboard->get_jm_pertam_0()->result_array();
                    $data['jm_pertam_1']   = $this->M_Dashboard->get_jm_pertam_1()->result_array();
                    $data['jm_pertam_2']   = $this->M_Dashboard->get_jm_pertam_2()->result_array();
                }
            //tutup notif permintaan tambahan

            //notif hasil produksi
                $data['jm_hasprod'] = $this->M_Dashboard->get_jm_hasprod()->result_array();
            //tutup notif hasil produksi

            //notif laporan perencanaan cutting
                $data['jm_percut']   = $this->M_Dashboard->get_jm_percut()->result_array();
                $data['jm_percut_0'] = $this->M_Dashboard->get_jm_percut_0()->result_array();
                $data['jm_percut_1'] = $this->M_Dashboard->get_jm_percut_1()->result_array();
            //tutup notif laporan perencanaan cutting

            //notif permohonan akses
                $data['jm_peraks'] = $this->M_Dashboard->get_jm_peraks()->result_array();
            //tutup notif permohonan akses

            //notif produksi tertunda
                $data['jm_prodtun'] = $this->M_Dashboard->get_jm_prodtun()->result_array();
                $data['jm_prodtun0'] = $this->M_Dashboard->get_jm_prodtun0()->result_array();
                $data['jm_prodtun1'] = $this->M_Dashboard->get_jm_prodtun1()->result_array();
            //tutup notif produksi tertunda
        //tutup

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

    public function cek_nik_input(){
        $nik = $this->input->post('nik_input');

        $hasil_cari_nik = $this->M_Karyawan->cari_nik($nik)->num_rows();

        if($hasil_cari_nik > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

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
        $nik           = $this->input->post('nik_input');
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
            'nik'           => $nik,
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
                'status_user'   => 0,
                'user_add'      => $user,
                'waktu_add'     => $now,
                'status_delete' => 0
            );

            $this->M_Karyawan->insert('user',$data_user);
        }
        
        redirect('karyawan');

    }

    public function detail_karyawan(){
        $id          = $this->input->post('id');

        $data['kar']   = $this->M_Karyawan->get_one_karyawan($id)->result_array();
        $data['jab']   = $this->M_Karyawan->get_one_jabatan_karyawan($id)->result_array();
        $data['jmjab'] = $this->M_Karyawan->get_one_jabatan_karyawan($id)->num_rows();

        echo json_encode($data);
    }   

    public function edit_karyawan(){
        $id                 = $this->input->post('id_edit');
        $nik                = $this->input->post('nik_edit');
        $nama               = $this->input->post('nama_karyawan_edit');
        //jika keterangan = 0 (tidak memiliki akses), jika keterangan = 1 (memiliki akses)
        $keterangan_sebelum = $this->input->post('keterangan_edit_sebelum');
        $keterangan_sesudah = $this->input->post('keterangan_edit_sesudah');
        $jumlah_spekjab     = $this->input->post('ejumlah_sj');

        //karyawan
            $data_kar = array(
                'nik'           => $nik,
                'nama_karyawan' => $nama,
                'keterangan'    => $keterangan_sesudah,
                'user_edit'     => $_SESSION['id_user'],
                'waktu_edit'    => date('Y-m-d H:i:s')
            );

            $where_kar = array(
                'id_karyawan'   => $id
            );

            $this->M_Karyawan->edit('karyawan',$data_kar,$where_kar);
        //tutup karyawan
        
        //jabatan karyawan
            $jumlahnya = strlen($jumlah_spekjab);

            for($i=1;$i<=$jumlahnya;$i++){
                $stat = $this->input->post('stat'.$i);
                $del  = $this->input->post('del'.$i);

                //jika sebelumnya ada, jadi tidak ada
                if($stat == 0 && $del == "on"){
                    $id_jabkar = $this->input->post('idjabkar'.$i);
                    //hapus jabatan karyawan
                    
                    $data_jabkar = array(
                        'status_delete' => 1,
                        'user_delete'   => $_SESSION['id_user'],
                        'waktu_delete'  => date('Y-m-d H:i:s')
                    );

                    $where_jabkar = array(
                        'id_jabatan_karyawan' => $id_jabkar
                    );
                    $this->M_Karyawan->edit('jabatan_karyawan',$data_jabkar,$where_jabkar);
                    
                }
                //jika sebelumnya tidak ada, jadi ada ada
                else if($stat == 1 && $del != "on"){
                    //add jabatan karyawan
                    $id_spesifikasi_jabatan = $this->input->post('eidjb'.$i);

                    $jum_jab_kar    =  $this->M_Karyawan->select_all_jabatan_karyawan()->num_rows();
                    $id_num_jab_kar = $jum_jab_kar + 1;

                    $id_jab_kar = "JBTKAR-".$id_num_jab_kar;

                    $data_jab_kar = array(
                        'id_jabatan_karyawan'   => $id_jab_kar,
                        'id_karyawan'           => $id,
                        'id_spesifikasi_jabatan'=> $id_spesifikasi_jabatan,
                        'user_add'              => $_SESSION['id_user'],
                        'waktu_add'             => date('Y-m-d H:i:s'),
                        'status_delete'         => 0
                    );

                    $this->M_Karyawan->insert('jabatan_karyawan',$data_jab_kar);
                }
            }
        //tutup jabatan karyawan
        
        //user
            //jika sebelumnya ada, jadi tidak ada
                if($keterangan_sebelum == 1 && $keterangan_sesudah == 0){
                    echo "ada, jadi tidak ada";
                }
            //jika sebelumnya tidak ada, jadi ada 
                else if($keterangan_sebelum == 0 && $keterangan_sesudah == 1){
                    $email = $this->input->post('email_user_edit');
                    $pass  = $this->input->post('password_user_edit');

                    $jum_user = $this->M_User->selectAllUser()->num_rows();
                    $id_num_user = $jum_user+1;
        
                    $id_user = "USER-".$id_num_user;

                    $data_user = array(
                        'id_user'       => $id_user,
                        'id_karyawan'   => $id,
                        'email_user'    => $email,
                        'password_user' => md5($pass),
                        'status_user'   => 0,
                        'user_add'      => $_SESSION['id_user'],
                        'waktu_add'     => date('Y-m-d H:i:s'),
                        'status_delete' => 0
                    );

                    $this->M_Karyawan->insert('user',$data_user);
                }
        //tutup user

        redirect('karyawan');
    }

    public function delete_karyawan(){
        $id   = $this->input->post('id_karyawan');
        $ket  = $this->input->post('keterangan');

        $data_kar = array(
            'status_delete' => 1,
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => date('Y-m-d H:i:s')
        );

        $where_kar = array(
            'id_karyawan' => $id
        );

        $this->M_Karyawan->edit('karyawan',$data_kar,$where_kar);

        //jabkar
        $jab   = $this->M_Karyawan->get_one_jabatan_karyawan($id)->result_array();
        $jmjab = $this->M_Karyawan->get_one_jabatan_karyawan($id)->num_rows();

        for($i=0;$i<$jmjab;$i++){
            $id_jabkar = $jab[$i]['id_jabatan_karyawan'];

            $data_jabkar = array(
                'status_delete' => 1,
                'user_delete'   => $_SESSION['id_user'],
                'waktu_delete'  => date('Y-m-d H:i:s')
            );
    
            $where_jabkar = array(
                'id_jabatan_karyawan' => $id_jabkar
            );
    
            $this->M_Karyawan->edit('jabatan_karyawan',$data_jabkar,$where_jabkar);
        }

        //user
        if($ket == 1){
            $us = $this->M_Karyawan->get_one_user($id)->result_array();

            $data_user = array(
                'status_delete' => 1,
                'user_delete'   => $_SESSION['id_user'],
                'waktu_delete'  => date('Y-m-d H:i:s')
            );
    
            $where_user = array(
                'id_user' => $us[0]['id_user']
            );
    
            $this->M_Karyawan->edit('user',$data_user,$where_user);
        }

        redirect('karyawan');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');
        
        $data_inputnya     = $this->M_Karyawan->select_user_add($id)->result_array();
        
        $user              = $this->M_Karyawan->cari_user($data_inputnya[0]['user_add'])->result_array();

        $nama_user         = $user[0]['nama_karyawan'];

        $data['input_user'] = $nama_user;

        $day = date('D', strtotime($data_inputnya[0]['waktu_add']));

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

        $tanggal = date('d-m-Y', strtotime($data_inputnya[0]['waktu_add']));
        $jam     = date('H:i:s', strtotime($data_inputnya[0]['waktu_add']));
        
        $data['input_date'] = " ".$hari.",  ".$tanggal." | ". $jam ;

        $data['log']        = $this->M_Karyawan->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Karyawan->select_log($id)->num_rows();

        $data['user']       = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();

        echo json_encode($data);
    }
}
