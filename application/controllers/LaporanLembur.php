<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanLembur extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_LaporanLembur');
        $this->load->model('M_Line');
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

    public function semua(){
        $tanggal = date('Y-m-d');

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else{
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_all_aktif($tanggal)->result();
        }

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
        //tutup

        $this->load->view('v_laporan_lembur_semua',$data);
    }

    public function belum_diproses(){
        $tanggal = date('Y-m-d');
        $data['tudei']                 = date('Y-m-d');
        $data['line']                  = $this->M_Line->select_all_aktif()->result();
        $status = 3;

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else{
            $data['laporan_lembur']        = $this->M_LaporanLembur->select_all_aktif_status($status,$tanggal)->result(); 
        }

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
        //tutup

        
        $this->load->view('v_laporan_lembur_belum_diproses',$data);
    }

    public function sudah_diproses(){
        $tanggal = date('Y-m-d');
        $data['tudei']                 = date('Y-m-d');
        $data['line']                  = $this->M_Line->select_all_aktif()->result();
        $status = 4;

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else{
            $data['laporan_lembur']        = $this->M_LaporanLembur->select_all_aktif_status($status,$tanggal)->result(); 
        }

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
        //tutup
    

        $this->load->view('v_laporan_lembur_sudah_diproses',$data);
    }

    public function selesai(){
        $tanggal = date('Y-m-d');
        $data['tudei']                 = date('Y-m-d');
        $data['line']                  = $this->M_Line->select_all_aktif()->result();
        $status = 5;

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else{
            $data['laporan_lembur']        = $this->M_LaporanLembur->select_all_aktif_status($status,$tanggal)->result(); 
        }

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
        //tutup
    

        $this->load->view('v_laporan_lembur_selesai',$data);
    }

    
    public function detail_spl_dspl(){
        //id spl
        $id_spl = $this->input->post('id');

        $data['spl']     = $this->M_LaporanLembur->get_spl($id_spl)->result_array();
        $data['dspl']    = $this->M_LaporanLembur->get_dspl($id_spl)->result_array();
        $data['jm_dspl'] = $this->M_LaporanLembur->get_dspl($id_spl)->num_rows();

        echo json_encode($data);
    }

    public function proses_pic(){
        $jumlah_karyawan    = $this->input->post('jumlah_karyawan');
        $id_spl             = $this->input->post('ak_id_spl');
        $keterangan_laporan = $this->input->post('keterangan_laporan');

        $user               = $_SESSION['id_user'];
        $now                = date('Y-m-d H:i:s');

        for($i=0;$i<$jumlah_karyawan;$i++){
            $id_dspl = $this->input->post('id_dspl'.$i);

            $jam = $this->input->post('ak_jam'.$i);
            $in  = $this->input->post('ak_in'.$i);
            $ket = $this->input->post('ak_ket'.$i);

            $outnya = strtotime($in) + 60*60*$jam;
            $out = date('H:i', $outnya);

            //echo $id_dspl."  ".$jam."  ".$in."  ".$out."  ".$ket;
            if($jam != 0){
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => $in,
                    'waktu_out_aktual' => $out,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            else{
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => 0,
                    'waktu_out_aktual' => 0,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            
        }
        
        $data_spl = array (
            'keterangan_laporan' => $keterangan_laporan,
            'status_spl'         => 4,
            'user_edit'          => $user,
            'waktu_edit'         => $now
        );

        $where_spl = array (
            'id_surat_perintah_lembur' => $id_spl
        );

        $this->M_LaporanLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
        redirect('laporanLembur/sudah_diproses');
    }

    public function edit_pic(){
        $jumlah_karyawan    = $this->input->post('edit_jumlah_karyawan');
        $id_spl             = $this->input->post('edit_id_spl');
        $keterangan_laporan = $this->input->post('edit_keterangan_laporan');

        $user               = $_SESSION['id_user'];
        $now                = date('Y-m-d H:i:s');

        for($i=0;$i<$jumlah_karyawan;$i++){
            $id_dspl = $this->input->post('edit_id_dspl'.$i);

            $jam = $this->input->post('edit_ak_jam'.$i);
            $in  = $this->input->post('edit_ak_in'.$i);
            $ket = $this->input->post('edit_ak_ket'.$i);

            $outnya = strtotime($in) + 60*60*$jam;
            $out = date('H:i', $outnya);

            //echo $id_dspl."  ".$jam."  ".$in."  ".$out."  ".$ket;
            if($jam != 0){
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => $in,
                    'waktu_out_aktual' => $out,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            else{
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => 0,
                    'waktu_out_aktual' => 0,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            
        }

        $data_spl = array (
            'keterangan_laporan' => $keterangan_laporan,
            'user_edit'          => $user,
            'waktu_edit'         => $now
        );

        $where_spl = array (
            'id_surat_perintah_lembur' => $id_spl
        );

        $this->M_LaporanLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);

        redirect('laporanLembur/sudah_diproses');
    }

    public function ppic_setuju(){
        $id_spl = $this->input->post('id_spl');

        $data_spl = array (
            'status_spl' => 5,
            'user_edit'  => $_SESSION['id_user'],
            'waktu_edit' => date('Y-m-d H:i:s')
        );

        $where_spl = array (
            'id_surat_perintah_lembur' => $id_spl
        );

        $this->M_LaporanLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);

        redirect('laporanLembur/selesai');
    }

    public function print(){
        $id              = $this->input->post('id');
        $data['spl']     = $this->M_LaporanLembur->get_spl($id)->result_array();
        $data['dspl']    = $this->M_LaporanLembur->get_dspl($id)->result_array();
        $data['jm_dspl'] = $this->M_LaporanLembur->get_dspl($id)->num_rows();

        
        $waktu = $data['spl'][0]['tanggal'];

        $hari_array = array(
            'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        );
        $hr = date('w', strtotime($waktu));
        $hari = $hari_array[$hr];
        $tanggal = date('j', strtotime($waktu));
        $bulan_array = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        );
        $bl = date('n', strtotime($waktu));
        $bulan = $bulan_array[$bl];
        $tahun = date('Y', strtotime($waktu));
        
        $data['tanggal'] = "$hari, $tanggal $bulan $tahun";

        $this->load->view('v_print_ll',$data);
        
    }

    public function printx(){
        $id      = $this->input->post('id');
        $spl     = $this->M_LaporanLembur->get_spl($id)->result_array();
        $dspl    = $this->M_LaporanLembur->get_dspl($id)->result_array();
        $jm_dspl = $this->M_LaporanLembur->get_dspl($id)->num_rows();

        if($spl[0]['status_spl'] > 2){
            $pdf = new FPDF('p','mm','A4');
            //buat halaman baru
            $pdf->AddPage();

            //logo
            $pdf->Image(base_url('assets/images/logombp.png'),7,7,-300);

            //setting font
            $pdf->SetFont('Arial','B','12');
            //cetak string
            $pdf->Cell(15); //move
            $pdf->Cell(190,7,'PT MAJU BERSAMA PERSADA DAYAMU',0,1,'L');
            
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(15);
            $pdf->Cell(190,7,'LAPORAN LEMBUR '.$spl[0]['nama_line'],0,1,'L');
            
            //$pdf->Cell(15);
            $pdf->SetFont('Arial','B','11');
            $pdf->Cell(10,2,' ',0,1,'C');
            $pdf->Cell(190,5,'Hari & Tanggal: ' .$spl[0]['tanggal'],0,1,'R');
            $pdf->Cell(190,5,'Waktu: ' .$spl[0]['waktu_lembur'],0,1,'R');



            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,5,' ',0,1,'C');
            $pdf->Cell(10,12,'NO',1,0,'C');
            $pdf->Cell(50,12,'NAMA KARYAWAN',1,0,'C');
            $pdf->Cell(40,12,'WAKTU LEMBUR',1,0,'C');
            $pdf->Cell(30,6,'JAM LEMBUR',1,0,'C');
            $pdf->Cell(20,12,'TTD',1,0,'C');
            $pdf->Cell(40,12,'KET',1,0,'C');
            $pdf->Cell(0,6,'',0,1);

            $pdf->Cell(100,0,'',0,0);
            $pdf->Cell(15,6,'IN',1,0,'C');
            $pdf->Cell(15,6,'OUT',1,1,'C');

                
            $pdf->SetFont('Arial','',10);

            for($i=0;$i<$jm_dspl;$i++){
                $pdf->Cell(10,6,$i+1,1,0,'C');
                $pdf->Cell(50,6,$dspl[$i]['nama_karyawan'],1,0,'C');
                $pdf->Cell(40,6,$dspl[$i]['aktual_lembur'],1,0,'C');
                $pdf->Cell(15,6,$dspl[$i]['waktu_in_aktual'],1,0,'C');
                $pdf->Cell(15,6,$dspl[$i]['waktu_out_aktual'],1,0,'C');
                $pdf->Cell(20,6,'',1,0,'C');
                $pdf->Cell(40,6,$dspl[$i]['keterangan_aktual'],1,1,'C');
            }
            
            

            //keterangan
            $pdf->Cell(2,7,'',0,1);
            $pdf->Cell(2,7,'Keterangan:',0,1);
            $pdf->Cell(190,12,$spl[0]['keterangan_perintah'],1,0,'L');

            //tanda tangan

            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(10,20,'',0,1);
            $pdf->Cell(100);
            $pdf->Cell(30,6,'Diajukan',1,0,'C');
            $pdf->Cell(30,6,'Disetujui',1,0,'C');
            $pdf->Cell(30,6,'Mengetahui',1,0,'C');


            $pdf->Cell(0,6,'',0,1);
            $pdf->Cell(100);
            $pdf->Cell(30,15,'',1,0,'C');
            $pdf->Cell(30,15,'',1,0,'C');
            $pdf->Cell(30,15,'',1,0,'C');
            
            $pdf->Cell(0,15,'',0,1);
            $pdf->Cell(100);
            $pdf->Cell(30,6,'',1,0,'C');
            $pdf->Cell(30,6,'',1,0,'C');
            $pdf->Cell(30,6,'',1,0,'C');

            $pdf->Output();
        }
        else{
            echo "Mohon maaf fungsi ini tidak tersedia";
        }
        
    }

}
