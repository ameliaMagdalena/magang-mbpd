<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerencanaanProduksi extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PerencanaanProduksi');
        $this->load->model('M_Line');
        $this->load->model('M_POS');
        $this->load->model('M_Produk');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_SuratPerintahLembur');
        $this->load->model('M_Tetapan');
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

    public function ambil_data(){
        $id_produk = $this->input->post('id_produk');
        $start_date= $this->input->post('start_date');

        $data['line']        = $this->M_Produk->select_ct_line($id_produk)->result_array();
        $data['jumlah_line'] = $this->M_Produk->select_ct_line($id_produk)->num_rows();

        $tanggal2 = [];
        
        for($i=0;$i<7;$i++){
            $tanggal2[$i] = date('d', strtotime('+'.$i.' days', strtotime($start_date))); 
        }

        $data['dates'] = $tanggal2;

        echo json_encode($data);
    }

    public function index(){
        $now = date('Y-m-d');

        $now_day = date('D', strtotime($now));

        if($now_day == "Sun"){
            $real_date = date( "Y-m-d", strtotime( "+1 day"));
        }
        else if($now_day == "Mon"){
            $real_date = $now;
        }
        else if($now_day == "Tue"){
            $real_date = date( "Y-m-d", strtotime( "+6 day"));
        }
        else if($now_day == "Wed"){
            $real_date = date( "Y-m-d", strtotime( "+5 day"));
        }
        else if($now_day == "Thu"){
            $real_date = date( "Y-m-d", strtotime( "+4 day"));
        }
        else if($now_day == "Fri"){
            $real_date = date( "Y-m-d", strtotime( "+3 day"));
        }
        else{
            $real_date = date( "Y-m-d", strtotime( "+2 day"));
        }

        if(($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management") || ($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management")){
            $data['min_date'] = date('Y-m-d', strtotime('-7 days', strtotime($real_date)));
        } else{
            $data['min_date'] = $real_date;
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
        
        $this->load->view('v_perencanaan_produksi1', $data);
    }

    public function cek_perencanaan(){
        $start = $this->input->post('tanggal_mulai');

        $data['cek'] = $this->M_PerencanaanProduksi->cek_perencanaan($start)->num_rows();

        echo json_encode($data);
    }

    public function buat_perencanaan(){
        $data['start_date'] = $this->input->post('tanggal_mulai');
        $start              = $this->input->post('tanggal_mulai');

        $data['end_date']   = date('Y-m-d', strtotime('+6 days', strtotime($data['start_date'])));
        $end                = $data['end_date'];

        $month_start = date('M', strtotime($data['start_date']));
        if($month_start == "Jan"){
            $data['month_start'] = "Januari";
        }
        else if($month_start == "Feb"){
            $data['month_start'] = "Februari";
        }
        else if($month_start == "Mar"){
            $data['month_start'] = "Maret";
        }
        else if($month_start == "Apr"){
            $data['month_start'] = "April";
        }
        else if($month_start == "May"){
            $data['month_start'] = "Mei";
        }
        else if($month_start == "Jun"){
            $data['month_start'] = "Juni";
        }
        else if($month_start == "Jul"){
            $data['month_start'] = "Juli";
        }
        else if($month_start == "Aug"){
            $data['month_start'] = "Agustus";
        }
        else if($month_start == "Sep"){
            $data['month_start'] = "September";
        }
        else if($month_start == "Oct"){
            $data['month_start'] = "Oktober";
        }
        else if($month_start == "Nov"){
            $data['month_start'] = "November";
        }
        else{
            $data['month_start'] = "Desember";
        }

        $month_end = date('M', strtotime($data['end_date']));
        if($month_end == "Jan"){
            $data['month_end'] = "Januari";
        }
        else if($month_end == "Feb"){
            $data['month_end'] = "Februari";
        }
        else if($month_end == "Mar"){
            $data['month_end'] = "Maret";
        }
        else if($month_end == "Apr"){
            $data['month_end'] = "April";
        }
        else if($month_end == "May"){
            $data['month_end'] = "Mei";
        }
        else if($month_end == "Jun"){
            $data['month_end'] = "Juni";
        }
        else if($month_end == "Jul"){
            $data['month_end'] = "Juli";
        }
        else if($month_end == "Aug"){
            $data['month_end'] = "Agustus";
        }
        else if($month_end == "Sep"){
            $data['month_end'] = "September";
        }
        else if($month_end == "Oct"){
            $data['month_end'] = "Oktober";
        }
        else if($month_end == "Nov"){
            $data['month_end'] = "November";
        }
        else{
            $data['month_end'] = "Desember";
        }

        $data['sekarang'] = date('Y-m-d');
        for($p=1;$p<=7;$p++){
            $new_date = date('Y-m-d', strtotime('+'.($p-1).'days', strtotime($data['start_date'])));

            //0 klau belum lewat
            //1 kalau sudah lewat
            if($new_date < $data['sekarang']){
                $data['stat_date'.$p] = 1;
            } else{
                $data['stat_date'.$p] = 0;
            }
        }

        $data['line']             = $this->M_Line->select_all_aktif()->result();
        $data['dpo']              = $this->M_PerencanaanProduksi->select_all_detpoxproduk()->result();
        $data['produksi_tertunda']= $this->M_PerencanaanProduksi->select_all_prodtun_aktif()->result();

        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

        $data['jm_perc_seb']      = $this->M_PerencanaanProduksi->jm_perc_sebelum()->result();
        $data['cycle_time']       = $this->M_Produk->select_all_ct_lengkap()->result();
        $data['jumlah_ct_produk'] = $this->M_Produk->jumlah_ct_produk()->result();

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

        $this->load->view('v_perencanaan_produksi2',$data);
    }

    public function tambah_perencanaan(){
        $start_date = $this->input->post('start_date');
        $now        = date('Y-m-d H:i:s');
        $user       = $_SESSION['id_user'];

        for($j=0;$j<7;$j++){
            $tgl   = date('Y-m-d', strtotime('+'.$j.'days', strtotime($start_date)));

            //keterangan tanggal produksi
            $hari  = date('D',strtotime($tgl));

            if($hari == "Mon"){
                $harinya = "Senin";
            }
            else if($hari == "Tue"){
                $harinya = "Selasa";
            }
            else if($hari == "Wed"){
                $harinya = "Rabu";
            }
            else if($hari == "Thu"){
                $harinya = "Kamis";
            }
            else if($hari == "Fri"){
                $harinya = "Jumat";
            }
            else if($hari == "Sat"){
                $harinya = "Sabtu";
            }
            else{
                $harinya = "Minggu";
            }

            $carket          = $this->M_PerencanaanProduksi->cari_ket_hari($harinya)->result_array();
            $keterangan_hari = $carket[0]['isi_tetapan'];

            $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
            $bulan_sekarang = date('m',strtotime($tgl));
            $id_code        = "P".$tahun_sekarang.$bulan_sekarang.".";

            $last       = $this->M_PerencanaanProduksi->get_last_produksi_id($id_code)->result_array();
            $last_cek   = $this->M_PerencanaanProduksi->get_last_produksi_id($id_code)->num_rows();

            //id
            if($last_cek == 1){
                $id_terakhir    = $last[0]['id_produksi'];

                $tahun_sebelum  = substr($id_terakhir,1,2);
            
                $bulan_sebelum  = substr($id_terakhir,3,2);

                //kalau tahun sama
                if($tahun_sebelum == $tahun_sekarang){
                    //kalau tahun & bulannya sama berarti count+1
                    if($bulan_sebelum == $bulan_sekarang){
                        $count = intval(substr($id_terakhir,6,4)) + 1;
                        $pjg   = strlen($count);

                        if($pjg == 1){
                            $count_baru = "000".$count;
                        }
                        else if($pjg == 2){
                            $count_baru = "00".$count;
                        }
                        else if($pjg == 3){
                            $count_baru = "0".$count;
                        }
                        else{
                            $count_baru = $count;
                        }
                        
                        //id yang baru
                        $id_produksi_baru = "P".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                    }
                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                    else{
                        //id yang baru
                        $id_produksi_baru = "P".$tahun_sekarang.$bulan_sekarang.".0001";
                    }
                }
                //kalau tahun tidak sama
                else{
                    //id yang baru
                    $id_produksi_baru = "P".$tahun_sekarang.$bulan_sekarang.".0001";
                }
            }
            else{
                //id yang baru
                $id_produksi_baru = "P".$tahun_sekarang.$bulan_sekarang.".0001";
            }                
            
            //PRODUKSI LINE
            //untuk hitung berapa produksi_line yang ada perencanaannya.
            $cek_terisi=0;

            for($i=1;$i<=4;$i++){
                $id_line = $this->input->post('idline_kf'.$i);
                $tpt     = $this->input->post('tpt_kf'.$i);

                $total_waktu_perencanaan = $this->input->post('tw_kf'.$id_line.'day'.($j+1));
                $efisiensi_perencanaan   = $this->input->post('prs_kf'.$id_line.'day'.($j+1));

                //id codenya
                $idcode_produksi_line = "PL".$tahun_sekarang.$bulan_sekarang.".";

                //get id_produksi_line yang terakhir diinput
                $id_produksi_line_lama = $this->M_PerencanaanProduksi->get_last_produksi_line_id($idcode_produksi_line)->result_array();
                $id_prodline_cek       = $this->M_PerencanaanProduksi->get_last_produksi_line_id($idcode_produksi_line)->num_rows();

                if($id_prodline_cek == 1){
                    $prodline_id_terakhir    = $id_produksi_line_lama[0]['id_produksi_line'];
                    $prodline_tahun_sebelum  = substr($prodline_id_terakhir,2,2);
                    $prodline_bulan_sebelum  = substr($prodline_id_terakhir,4,2);

                    //kalau tahun sama
                    if($prodline_tahun_sebelum == $tahun_sekarang){
                        //kalau tahun & bulannya sama berarti count+1
                        if($prodline_bulan_sebelum == $bulan_sekarang){
                            $prodline_count = intval(substr($prodline_id_terakhir,7,6)) + 1;
                            $prodline_pjg   = strlen($prodline_count);
    
                            if($prodline_pjg == 1){
                                $prodline_count_baru = "00000".$prodline_count;
                            }
                            else if($prodline_pjg == 2){
                                $prodline_count_baru = "0000".$prodline_count;
                            }
                            else if($prodline_pjg == 3){
                                $prodline_count_baru = "000".$prodline_count;
                            }
                            else if($prodline_pjg == 4){
                                $prodline_count_baru = "00".$prodline_count;
                            }
                            else if($prodline_pjg == 5){
                                $prodline_count_baru = "0".$prodline_count;
                            }
                            else{
                                $prodline_count_baru = $prodline_count;
                            }
                            
                            //id yang baru
                            $id_prodline_baru = "PL".$prodline_tahun_sebelum.$prodline_bulan_sebelum.".".$prodline_count_baru;
    
                        }
                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                        else{
                            //id yang baru
                            $id_prodline_baru = "PL".$tahun_sekarang.$bulan_sekarang.".000001";
    
                        }
                    }
                    //kalau tahun tidak sama
                    else{
                        //id yang baru
                        $id_prodline_baru = "PL".$tahun_sekarang.$bulan_sekarang.".000001";
                    }
                }
                else{
                    $id_prodline_baru = "PL".$tahun_sekarang.$bulan_sekarang.".000001";
                }

                //kalo total waktu perencanaannya ==0 maka nanti pas mo simpan/insert total waktu dan efisiensi isi 0
                    if($total_waktu_perencanaan == "" || $total_waktu_perencanaan == 0){
                        $data_ef = array (
                            'id_produksi_line'        => $id_prodline_baru,
                            'id_line'                 => $id_line,
                            'id_produksi'             => $id_produksi_baru,
                            'total_processing_time'   => $tpt,
                            'total_waktu_perencanaan' => 0,
                            'efisiensi_perencanaan'   => 0,
                            'status_perencanaan'      => 0,
                            'status_laporan'          => 0,
                            'user_add'                =>$user,
                            'waktu_add'               =>$now,
                            'status_delete'           =>0
                        );
                    }
                    else{
                        if($efisiensi_perencanaan < 100){
                            $data_ef = array (
                                'id_produksi_line'        => $id_prodline_baru,
                                'id_line'                 => $id_line,
                                'id_produksi'             => $id_produksi_baru,
                                'total_processing_time'   => $tpt,
                                'total_waktu_perencanaan' => $total_waktu_perencanaan,
                                'efisiensi_perencanaan'   => $efisiensi_perencanaan,
                                'status_perencanaan'      => 1,
                                'status_laporan'          => 0,
                                'user_add'                =>$user,
                                'waktu_add'               =>$now,
                                'status_delete'           =>0
                            );

                            $cek_terisi++;
                        }
                        else{
                            $data_ef = array (
                                'id_produksi_line'        => $id_prodline_baru,
                                'id_line'                 => $id_line,
                                'id_produksi'             => $id_produksi_baru,
                                'total_processing_time'   => $tpt,
                                'total_waktu_perencanaan' => $total_waktu_perencanaan,
                                'efisiensi_perencanaan'   => $efisiensi_perencanaan,
                                'status_perencanaan'      => 2,
                                'status_laporan'          => 0,
                                'user_add'                =>$user,
                                'waktu_add'               =>$now,
                                'status_delete'           =>0
                            );

                            $cek_terisi++;
                        }
                        
                    }
                    $this->M_PerencanaanProduksi->insert('produksi_line',$data_ef);

                //buat SPL
                    //kalo efisiensi > 0 && harinya bukan merupakan hari produksi
                    if($total_waktu_perencanaan != 0 && $keterangan_hari == "Hari Libur"){
                        $jum_spl = $this->M_SuratPerintahLembur->select_all()->num_rows();
                        $jumlah = $jum_spl + 1;
                        $id_spl_baru = "SPL-".$jumlah;
                        
                        $cek_tanggal = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->num_rows();

                        if($cek_tanggal == 0){
                            $data_spl = array (
                                'id_surat_perintah_lembur' => $id_spl_baru,
                                'id_line'                  => $id_line,
                                'tanggal'                  => $tgl,
                                'waktu_lembur'             => $keterangan_hari,
                                'status_spl'               => 0,
                                'keterangan_spl'           => 0,
                                'user_add'                 => $user,
                                'waktu_add'                => $now,
                                'status_delete'            => 0
                            );
                            $this->M_SuratPerintahLembur->insert('surat_perintah_lembur',$data_spl);
                        }
                        else{
                            $idspl = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->result_array();
                            $idsplnya = $idspl[0]['id_surat_perintah_lembur'];

                            $data_spl = array (
                                'keterangan_spl' => 2,
                                'user_edit'      => $user,
                                'waktu_edit'     => $now
                            );
                            $where_spl = array (
                                'id_surat_perintah_lembur' => $idsplnya
                            );
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                    }
                    else if($efisiensi_perencanaan > 100){
                        $jum_spl = $this->M_SuratPerintahLembur->select_all()->num_rows();
                        $jumlah = $jum_spl + 1;
                        $id_spl_baru = "SPL-".$jumlah;
                        
                        $cek_tanggal = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->num_rows();

                        if($cek_tanggal == 0){
                            $data_spl = array (
                                'id_surat_perintah_lembur' => $id_spl_baru,
                                'id_line'                  => $id_line,
                                'tanggal'                  => $tgl,
                                'waktu_lembur'             => $keterangan_hari,
                                'status_spl'               => 0,
                                'keterangan_spl'           => 0,
                                'user_add'                 => $user,
                                'waktu_add'                => $now,
                                'status_delete'            => 0
                            );
                            $this->M_SuratPerintahLembur->insert('surat_perintah_lembur',$data_spl);
                        }
                        else{
                            $idspl = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->result_array();
                            $idsplnya = $idspl[0]['id_surat_perintah_lembur'];

                            $data_spl = array (
                                'keterangan_spl' => 2,
                                'user_edit'      => $user,
                                'waktu_edit'     => $now
                            );
                            $where_spl = array (
                                'id_surat_perintah_lembur' => $idsplnya
                            );
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                    }
                //tutup spl
            }

            //insert di table produksi
            if($cek_terisi > 0){
                $data_prod = array (
                    'id_produksi'           =>$id_produksi_baru,
                    'tanggal'               =>$tgl,
                    'status_perencanaan'    =>1,
                    'status_laporan'        =>0,
                    'user_add'              =>$user,
                    'waktu_add'             =>$now,
                    'status_delete'         =>0
                );
            } else{
                $data_prod = array (
                    'id_produksi'           =>$id_produksi_baru,
                    'tanggal'               =>$tgl,
                    'status_perencanaan'    =>0,
                    'status_laporan'        =>0,
                    'user_add'              =>$user,
                    'waktu_add'             =>$now,
                    'status_delete'         =>0
                );
            }
            $this->M_PerencanaanProduksi->insert('produksi',$data_prod);
        }

        $jumlah_dpo = $this->input->post('jumlah_dpo_kf');

        //DETAIL PRODUKSI LINE
        for($o=0;$o<$jumlah_dpo;$o++){
            //keterangan ada isi/nda
            $keterangan_div = $this->input->post('ket'.$o);
            $statper        = $this->input->post('statper'.$o);

            if($keterangan_div == 1){
                $id_detpo    = $this->input->post('id_bg3'.$o);
                $jumlah_line = $this->input->post('jumlah_line'.$o);
                
                
                for($k=1;$k<=$jumlah_line;$k++){
                    $idline = $this->input->post($o.'id_line_kf'.$k);
    
                    for($z=1;$z<=7;$z++){
                        $tanggal        = date('Y-m-d', strtotime('+'.($z-1).'days', strtotime($start_date)));
                        $jumlah_item_s  = $this->input->post('jm'.$o.$idline.'day'.$z);
                        $waktu_proses_s = $this->input->post('ef'.$o.$idline.'day'.$z);
                        
                        if($jumlah_item_s != ""){
                            $jumlah_item = $jumlah_item_s;
                            $waktu_proses = $waktu_proses_s;
                        }
                        else{
                            $jumlah_item  = 0;
                            $waktu_proses = 0;
                        }

                        
                        //cari id_produksi_line berdasarkan tanggal & line
                        $id_prodline_sesuai = $this->M_PerencanaanProduksi->cari_id_prodline($idline,$tanggal)->result_array();
                        $id_prodlinenya     = $id_prodline_sesuai[0]['id_produksi_line'];
                        
                        //id detail perencanaan produksi
                        $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
                        $bulan_sekarangnya = date('m',strtotime($tanggal));

                        $idcode_detprod_line = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".";

                        $id_detprodline_last     = $this->M_PerencanaanProduksi->get_last_detprodline_id($idcode_detprod_line)->result_array();
                        $id_detprodline_last_cek = $this->M_PerencanaanProduksi->get_last_detprodline_id($idcode_detprod_line)->num_rows();
            
                        if($id_detprodline_last_cek == 1){
                            $id_terakhirnya    = $id_detprodline_last[0]['id_detail_produksi_line'];
            
                            $tahun_sebelumnya  = substr($id_terakhirnya,3,2);
                            $bulan_sebelumnya  = substr($id_terakhirnya,5,2);
                                    
                            //kalau tahun sama
                            if($tahun_sebelumnya == $tahun_sekarangnya){
                                //kalau tahun & bulannya sama berarti count+1
                                if($bulan_sebelumnya == $bulan_sekarangnya){
                                    $countnya = intval(substr($id_terakhirnya,8,8)) + 1;
                                    $pjgnya   = strlen($countnya);
                        
                                    if($pjgnya == 1){
                                        $countnya_baru = "0000000".$countnya;
                                    }
                                    else if($pjgnya == 2){
                                        $countnya_baru = "000000".$countnya;
                                    }
                                    else if($pjgnya == 3){
                                        $countnya_baru = "00000".$countnya;
                                    }
                                    else if($pjgnya == 4){
                                        $countnya_baru = "0000".$countnya;
                                    }
                                    else if($pjgnya == 5){
                                        $countnya_baru = "000".$countnya;
                                    }
                                    else if($pjgnya == 6){
                                        $countnya_baru = "00".$countnya;
                                    }
                                    else if($pjgnya == 7){
                                        $countnya_baru = "0".$countnya;
                                    }
                                    else{
                                        $countnya_baru = $countnya;
                                    }
                                    
                                    //id yang baru
                                    $id_dpl_baru = "DPL".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                }
                                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                else{
                                    //id yang baru
                                    $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                }
                            }
                            //kalau tahun tidak sama
                            else{
                                //id yang baru
                                $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                            }
                        }
                        else{
                            //id yang baru
                            $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                        }

                        //DETAIL PRODUKSI LINE
                        if($statper == 0){
                            $data_detprod = array(
                                'id_detail_produksi_line'   => $id_dpl_baru,
                                'id_detail_purchase_order'  => $id_detpo,
                                'id_produksi_line'          => $id_prodlinenya,
                                'jumlah_item_perencanaan'   => $jumlah_item,
                                'waktu_proses_perencanaan'  => $waktu_proses,
                                'status_perencanaan'        => 0,
                                'status_aktual'             => 0,
                                'user_add'                  => $user,
                                'waktu_add'                 => $now,
                                'status_delete'             => 0
                            );
                            $this->M_PerencanaanProduksi->insert('detail_produksi_line',$data_detprod);
                        } else{
                            $data_detprod = array(
                                'id_detail_produksi_line'   => $id_dpl_baru,
                                'id_detail_purchase_order'  => $id_detpo,
                                'id_produksi_line'          => $id_prodlinenya,
                                'jumlah_item_perencanaan'   => $jumlah_item,
                                'waktu_proses_perencanaan'  => $waktu_proses,
                                'status_perencanaan'        => 1,
                                'status_aktual'             => 0,
                                'user_add'                  => $user,
                                'waktu_add'                 => $now,
                                'status_delete'             => 0
                            );
                            $this->M_PerencanaanProduksi->insert('detail_produksi_line',$data_detprod);
                        }
                        
                        //PRODUKSI TERTUNDA
                        if($statper == 1 && $jumlah_item != 0){
                                $id_prodtun  = $this->input->post('id_pt_bg3'.$o);
                                $one_prodtun = $this->M_PerencanaanProduksi->get_one_prodtun($id_prodtun)->result_array();
                                $jumlah_tertunda_sebelum  = $one_prodtun[0]['jumlah_tertunda'];
                                $jumlah_terencana_sebelum = $one_prodtun[0]['jumlah_terencana'];
                                
                                //id produksi tunda produksi
                                $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
                                $bulan_sekarangnya = date('m',strtotime($tanggal));

                                $idcode_dprodtun = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                $id_dprodtun_last     = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->result_array();
                                $id_dprodtun_last_cek = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->num_rows();

                                if($id_dprodtun_last_cek == 1){
                                    $id_terakhirnya    = $id_dprodtun_last[0]['id_detail_produksi_tertunda'];

                                    $tahun_sebelumnya  = substr($id_terakhirnya,8,2);
                                    $bulan_sebelumnya  = substr($id_terakhirnya,10,2);
                                            
                                    //kalau tahun sama
                                    if($tahun_sebelumnya == $tahun_sekarangnya){
                                        //kalau tahun & bulannya sama berarti count+1
                                        if($bulan_sebelumnya == $bulan_sekarangnya){
                                            $countnya = intval(substr($id_terakhirnya,13,8)) + 1;
                                            $pjgnya   = strlen($countnya);
                                
                                            if($pjgnya == 1){
                                                $countnya_baru = "0000000".$countnya;
                                            }
                                            else if($pjgnya == 2){
                                                $countnya_baru = "000000".$countnya;
                                            }
                                            else if($pjgnya == 3){
                                                $countnya_baru = "00000".$countnya;
                                            }
                                            else if($pjgnya == 4){
                                                $countnya_baru = "0000".$countnya;
                                            }
                                            else if($pjgnya == 5){
                                                $countnya_baru = "000".$countnya;
                                            }
                                            else if($pjgnya == 6){
                                                $countnya_baru = "00".$countnya;
                                            }
                                            else if($pjgnya == 7){
                                                $countnya_baru = "0".$countnya;
                                            }
                                            else{
                                                $countnya_baru = $countnya;
                                            }
                                            
                                            //id yang baru
                                            $id_dprodtun_baru = "DPRODTUN".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                        }
                                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                        else{
                                            //id yang baru
                                            $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                        }
                                    }
                                    //kalau tahun tidak sama
                                    else{
                                        //id yang baru
                                        $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                    }
                                }
                                else{
                                    //id yang baru
                                    $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                }

                                $data_detprodtun = array(
                                    'id_detail_produksi_tertunda' => $id_dprodtun_baru,
                                    'id_produksi_tertunda'        => $id_prodtun,
                                    'id_detail_produksi_line'     => $id_dpl_baru,
                                    'jumlah_perencanaan'          => $jumlah_item,
                                    'user_add'                    => $user,
                                    'waktu_add'                   => $now,
                                    'status_delete'               => 0
                                );

                                $this->M_PerencanaanProduksi->insert('detail_produksi_tertunda',$data_detprodtun);

                                if($jumlah_item >0){
                                    $jumlahnya = $jumlah_terencana_sebelum +$jumlah_item;
                                    $sisanya   = $jumlah_tertunda_sebelum - $jumlah_terencana_sebelum;
                                    if($jumlah_item == $sisanya){
                                        $data_prodtun = array (
                                            'jumlah_terencana'   => $jumlahnya,
                                            'status_penjadwalan' => 2
                                        );

                                        $where_prodtun = array (
                                        'id_produksi_tertunda' => $id_prodtun  
                                        );

                                        $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
                                    } else{
                                        $data_prodtun = array (
                                            'jumlah_terencana'   => $jumlahnya,
                                            'status_penjadwalan' => 1
                                        );

                                        $where_prodtun = array (
                                        'id_produksi_tertunda' => $id_prodtun  
                                        );

                                        $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
                                    }
                                }
                        }              

                        //PURCHASE ORDER CUSTOMER
                            $id_pos     = $this->M_PerencanaanProduksi->get_detail_po($id_detpo)->result_array();
                            $id_po_tam  = $id_pos[0]['id_purchase_order_customer'];

                            $data_po = array (
                                'status_po' => 1,
                                'user_edit' => $user,
                                'waktu_edit'=> $now
                            );

                            $where_po = array (
                                'id_purchase_order_customer' => $id_po_tam
                            );

                            $this->M_PerencanaanProduksi->edit('purchase_order_customer',$data_po,$where_po);
                        //tutup po
                        
                        //PERMINTAAN MATERIAL
                            if($jumlah_item > 0){
                                //cari apakah sudah ada sebelumnya permintaan material untuk tanggal,id_det_po_cust,id_line yangsama?
                                $cari_permat    = $this->M_PerencanaanProduksi->get_one_permat($tanggal,$id_detpo,$idline)->result_array();
                                $jm_cari_permat = $this->M_PerencanaanProduksi->get_one_permat($tanggal,$id_detpo,$idline)->num_rows();

                                //jika sebelumnya belum ada
                                if($jm_cari_permat == 0){
                                    //id detail perencanaan produksi
                                    $idcode_permat = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                    $id_permat_last     = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->result_array();
                                    $id_permat_last_cek = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->num_rows();
                        
                                    if($id_permat_last_cek == 1){
                                        $id_terakhirnya    = $id_permat_last[0]['id_permintaan_material'];
                        
                                        $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                                        $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                                                
                                        //kalau tahun sama
                                        if($tahun_sebelumnya == $tahun_sekarangnya){
                                            //kalau tahun & bulannya sama berarti count+1
                                            if($bulan_sebelumnya == $bulan_sekarangnya){
                                                $countnya = intval(substr($id_terakhirnya,11,5)) + 1;
                                                $pjgnya   = strlen($countnya);
                                    
                                                if($pjgnya == 1){
                                                    $countnya_baru = "0000".$countnya;
                                                }
                                                else if($pjgnya == 2){
                                                    $countnya_baru = "000".$countnya;
                                                }
                                                else if($pjgnya == 3){
                                                    $countnya_baru = "00".$countnya;
                                                }
                                                else if($pjgnya == 4){
                                                    $countnya_baru = "0".$countnya;
                                                }
                                                else{
                                                    $countnya_baru = $countnya;
                                                }
                                                
                                                //id yang baru
                                                $id_permat_baru = "PERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                            }
                                            //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                            else{
                                                //id yang baru
                                                $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                            }
                                        }
                                        //kalau tahun tidak sama
                                        else{
                                            //id yang baru
                                            $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                        }
                                    }
                                    else{
                                        //id yang baru
                                        $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                    }

                                    $tgl_now = date('Y-m-d');
                                    
                                    $data_permat = array(
                                        'id_permintaan_material'            => $id_permat_baru,
                                        'id_detail_purchase_order_customer' => $id_detpo,
                                        'id_line'                           => $idline,
                                        'jumlah_minta'                      => $jumlah_item,
                                        'tanggal_permintaan'                => $tgl_now,
                                        'tanggal_produksi'                  => $tanggal,
                                        'status_permintaan'                 => 0,
                                        'user_add'                          => $user,
                                        'waktu_add'                         => $now,
                                        'status_delete'                     => 0
                                    );

                                    $this->M_PerencanaanProduksi->insert('permintaan_material',$data_permat);

                                    //DETAIL PERMINTAAN MATERIAL
                                    $konmat_tam    = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->result_array();
                                    $jm_konmat_tam = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->num_rows();

                                    for($b=0;$b<$jm_konmat_tam;$b++){
                                        //id_detail_permintaan_material
                                        $idcode_detpermat = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                        $id_detpermat_last     = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->result_array();
                                        $id_detpermat_last_cek = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->num_rows();
                            
                                        if($id_detpermat_last_cek == 1){
                                            $id_terakhirnya    = $id_detpermat_last[0]['id_detail_permintaan_material'];
                            
                                            $tahun_sebelumnya  = substr($id_terakhirnya,9,2);
                                            $bulan_sebelumnya  = substr($id_terakhirnya,11,2);
                                                    
                                            //kalau tahun sama
                                            if($tahun_sebelumnya == $tahun_sekarangnya){
                                                //kalau tahun & bulannya sama berarti count+1
                                                if($bulan_sebelumnya == $bulan_sekarangnya){
                                                    $countnya = intval(substr($id_terakhirnya,14,6)) + 1;
                                                    $pjgnya   = strlen($countnya);
                                        
                                                    if($pjgnya == 1){
                                                        $countnya_baru = "00000".$countnya;
                                                    }
                                                    else if($pjgnya == 2){
                                                        $countnya_baru = "0000".$countnya;
                                                    }
                                                    else if($pjgnya == 3){
                                                        $countnya_baru = "000".$countnya;
                                                    }
                                                    else if($pjgnya == 4){
                                                        $countnya_baru = "00".$countnya;
                                                    }
                                                    else if($pjgnya == 5){
                                                        $countnya_baru = "0".$countnya;
                                                    }
                                                    else{
                                                        $countnya_baru = $countnya;
                                                    }
                                                    
                                                    //id yang baru
                                                    $id_detpermat_baru = "DETPERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                }
                                                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                else{
                                                    //id yang baru
                                                    $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                }
                                            }
                                            //kalau tahun tidak sama
                                            else{
                                                //id yang baru
                                                $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                            }
                                        }
                                        else{
                                            //id yang baru
                                            $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                        }

                                        $id_konsumsi_material = $konmat_tam[$b]['id_konsumsi_material'];
                                        $jumlah_konsumsi      = $konmat_tam[$b]['jumlah_konsumsi'];
                                        $needs                = $jumlah_item * $jumlah_konsumsi;
                                        
                                        $data_detpermat = array (
                                            'id_detail_permintaan_material'     => $id_detpermat_baru,
                                            'id_permintaan_material'            => $id_permat_baru,
                                            'id_konsumsi_material'              => $id_konsumsi_material,
                                            'needs'                             => $needs,
                                            'status_detail_permintaan_material' => 0,
                                            'user_add'                          => $user,
                                            'waktu_add'                         => $now,
                                            'status_delete'                     => 0
                                        );

                                        $this->M_PerencanaanProduksi->insert('detail_permintaan_material',$data_detpermat);
                                    }
                                } 
                                //jika sebelumnya ada
                                else{
                                    $id_permat     = $cari_permat[0]['id_permintaan_material'];
                                    $jumlah_permat = $cari_permat[0]['jumlah_minta'];

                                    $jumlah_baru = $jumlah_permat + $jumlah_item;

                                    $data_permat = array(
                                        'jumlah_minta' => $jumlah_baru
                                    );

                                    $where_permat = array(
                                        'id_permintaan_material' => $id_permat
                                    );

                                    $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                    $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                    $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                    for($t=0;$t<$jm_det_permat;$t++){
                                        $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                        $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                        $needs = $jumlah_baru * $jumlah_konsumsi;

                                        $data_det_permat = array(
                                            'needs' => $needs
                                        );

                                        $where_det_permat = array(
                                            'id_detail_permintaan_material' => $id_det_permat
                                        );

                                        $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                    }
                                }
                            }
                        //tutup permat
                    }
                }
            }
        }
       redirect('perencanaanProduksi/semua_perencanaan_produksi');
    }

    public function detail_produksi_tertunda(){
        $id    = $this->input->post('id');

        $data['prodtun']    = $this->M_PerencanaanProduksi-> get_one_prodtun($id)->result_array();
        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function ambil_data_produksi_line(){
        $id_awal                =  $this->input->post('id_produksi');
        $tanggal_awal           = $this->M_PerencanaanProduksi->get_tanggal_produksi($id_awal)->result_array();
        $awal                   = $tanggal_awal[0]['tanggal_awal'];
        $data['produksi_line']  = $this->M_PerencanaanProduksi->get_pl($awal)->result();

        $semua_tanggal          = $this->M_PerencanaanProduksi->get_semua_tanggal($awal)->result_array();
        $data['semua_tanggals'] = $this->M_PerencanaanProduksi->get_semua_tanggal($awal)->result();
        
        for($i=0;$i<7;$i++){
            $data['day'.$i] = intval(date('d', strtotime($semua_tanggal[$i]['tanggal'])));
        }


        $data['line']   = $this->M_Line->select_all_aktif()->result();
        $data['jmline'] = $this->M_Line->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function edit_perencanaan_produksi(){
        $id           = $this->input->post('id');

        $tanggals     = $this->M_PerencanaanProduksi->get_tanggal_produksi($id)->result_array();

        $data['start_date'] = $tanggals[0]['tanggal_awal'];
        $start              = $tanggals[0]['tanggal_awal'];

        $data['end_date']   = date('Y-m-d', strtotime('+6 days', strtotime($data['start_date'])));
        $end                = $data['end_date'];

        $month_start = date('M', strtotime($data['start_date']));

        if($month_start == "Jan"){
            $data['month_start'] = "Januari";
        }
        else if($month_start == "Feb"){
            $data['month_start'] = "Februari";
        }
        else if($month_start == "Mar"){
            $data['month_start'] = "Maret";
        }
        else if($month_start == "Apr"){
            $data['month_start'] = "April";
        }
        else if($month_start == "May"){
            $data['month_start'] = "Mei";
        }
        else if($month_start == "Jun"){
            $data['month_start'] = "Juni";
        }
        else if($month_start == "Jul"){
            $data['month_start'] = "Juli";
        }
        else if($month_start == "Aug"){
            $data['month_start'] = "Agustus";
        }
        else if($month_start == "Sep"){
            $data['month_start'] = "September";
        }
        else if($month_start == "Oct"){
            $data['month_start'] = "Oktober";
        }
        else if($month_start == "Nov"){
            $data['month_start'] = "November";
        }
        else{
            $data['month_start'] = "Desember";
        }

        $month_end = date('M', strtotime($data['end_date']));
        if($month_end == "Jan"){
            $data['month_end'] = "Januari";
        }
        else if($month_end == "Feb"){
            $data['month_end'] = "Februari";
        }
        else if($month_end == "Mar"){
            $data['month_end'] = "Maret";
        }
        else if($month_end == "Apr"){
            $data['month_end'] = "April";
        }
        else if($month_end == "May"){
            $data['month_end'] = "Mei";
        }
        else if($month_end == "Jun"){
            $data['month_end'] = "Juni";
        }
        else if($month_end == "Jul"){
            $data['month_end'] = "Juli";
        }
        else if($month_end == "Aug"){
            $data['month_end'] = "Agustus";
        }
        else if($month_end == "Sep"){
            $data['month_end'] = "September";
        }
        else if($month_end == "Oct"){
            $data['month_end'] = "Oktober";
        }
        else if($month_end == "Nov"){
            $data['month_end'] = "November";
        }
        else{
            $data['month_end'] = "Desember";
        }

        $data['line']             = $this->M_Line->select_all_aktif()->result();
        $data['dpo']              = $this->M_PerencanaanProduksi->select_all_detpoxproduk()->result();
        $data['produksi_tertunda']= $this->M_PerencanaanProduksi->select_all_prodtun()->result();

        $data['warna']            = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

        $data['jm_perc_seb']      = $this->M_PerencanaanProduksi->jm_perc_sebelum()->result();
        $data['cycle_time']       = $this->M_Produk->select_all_ct_lengkap()->result();
        $data['jumlah_ct_produk'] = $this->M_Produk->jumlah_ct_produk()->result();
        
        $data['produksi']                = $this->M_PerencanaanProduksi->get_p($start)->result();
        $data['produksi_line']           = $this->M_PerencanaanProduksi->get_pl($start)->result();
        $data['detail_produksi_line']    = $this->M_PerencanaanProduksi->get_dpl_terisi_group($start)->result();
        $data['jm_detail_produksi_line'] = $this->M_PerencanaanProduksi->get_dpl_terisi_group($start)->num_rows();
        $data['dpl_tam']                 = $this->M_PerencanaanProduksi->get_dpl_terisi($start)->result();
        $data['dpl_tam_total']           = $this->M_PerencanaanProduksi->get_dpl_terisi_total($start)->result();

        $data['dpl_reschedule_group']    = $this->M_PerencanaanProduksi->get_dpl_terisi_reschedule_group($start)->result();
        $data['jm_dpl_reschedule_group'] = $this->M_PerencanaanProduksi->get_dpl_terisi_reschedule_group($start)->num_rows();
        $data['dpl_reschedule']          = $this->M_PerencanaanProduksi->get_dpl_terisi_reschedule($start)->result();

        $data['det_prodtun']             = $this->M_PerencanaanProduksi->get_detail_produksi_tertunda()->result();

        $data['sekarang'] = date('Y-m-d');

        for($p=1;$p<=7;$p++){
            $new_date = date('Y-m-d', strtotime('+'.($p-1).'days', strtotime($data['start_date'])));

            //0 klau belum lewat
            //1 kalau sudah lewat
            if($new_date <= $data['sekarang']){
                $data['stat_date'.$p] = 1;
            } else{
                $data['stat_date'.$p] = 0;
            }
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

        $this->load->view('v_perencanaan_produksi_edit',$data);
    }

    public function ubah_perencanaan_produksi(){
        $start_date = $this->input->post('start_date');
        $now        = date('Y-m-d H:i:s');
        $user       = $_SESSION['id_user'];

        for($j=0;$j<7;$j++){
            $tgl   = date('Y-m-d', strtotime('+'.$j.'days', strtotime($start_date)));

            //keterangan tanggal produksi
            $hari  = date('D',strtotime($tgl));

            if($hari == "Mon"){
                $harinya = "Senin";
            }
            else if($hari == "Tue"){
                $harinya = "Selasa";
            }
            else if($hari == "Wed"){
                $harinya = "Rabu";
            }
            else if($hari == "Thu"){
                $harinya = "Kamis";
            }
            else if($hari == "Fri"){
                $harinya = "Jumat";
            }
            else if($hari == "Sat"){
                $harinya = "Sabtu";
            }
            else{
                $harinya = "Minggu";
            }

            $carket          = $this->M_PerencanaanProduksi->cari_ket_hari($harinya)->result_array();
            $keterangan_hari = $carket[0]['isi_tetapan'];

            $produksi    = $this->M_PerencanaanProduksi->get_one_produksi($tgl)->result_array();
            $id_produksi = $produksi[0]['id_produksi'];
            
            //PRODUKSI LINE
                //untuk hitung berapa produksi_line yang ada perencanaannya.
                $cek_terisi=0;

                for($i=1;$i<=4;$i++){
                    $id_line = $this->input->post('idline_kf'.$i);
                    $tpt     = $this->input->post('tpt_kf'.$i);

                    $total_waktu_perencanaan = $this->input->post('tw_kf'.$id_line.'day'.($j+1));
                    $efisiensi_perencanaan   = $this->input->post('prs_kf'.$id_line.'day'.($j+1));
                    $id_produksi_line        = $this->input->post('id_plkf'.$id_line.'day'.($j+1));
                    
                    //kalo total waktu perencanaannya ==0 maka nanti pas mo simpan/insert total waktu dan efisiensi isi 0
                        if($total_waktu_perencanaan == "" || $total_waktu_perencanaan == 0){
                            $data_ef = array (
                                'total_waktu_perencanaan' => 0,
                                'efisiensi_perencanaan'   => 0,
                                'status_perencanaan'      => 0,
                                'status_laporan'          => 0,
                                'user_edit'               =>$user,
                                'waktu_edit'              =>$now,
                                'status_delete'           =>0
                            );

                            $where_ef = array (
                                'id_produksi_line' =>$id_produksi_line
                            );
                        }
                        else{
                            if($efisiensi_perencanaan < 100){
                                $data_ef = array (
                                    'total_waktu_perencanaan' => $total_waktu_perencanaan,
                                    'efisiensi_perencanaan'   => $efisiensi_perencanaan,
                                    'status_perencanaan'      => 1,
                                    'status_laporan'          => 0,
                                    'user_edit'               =>$user,
                                    'waktu_edit'              =>$now,
                                    'status_delete'           =>0
                                );

                                $where_ef = array (
                                    'id_produksi_line' =>$id_produksi_line
                                );

                                $cek_terisi++;
                            }
                            else{
                                $data_ef = array (
                                    'total_waktu_perencanaan' => $total_waktu_perencanaan,
                                    'efisiensi_perencanaan'   => $efisiensi_perencanaan,
                                    'status_perencanaan'      => 2,
                                    'status_laporan'          => 0,
                                    'user_edit'               =>$user,
                                    'waktu_edit'              =>$now,
                                    'status_delete'           =>0
                                );

                                $where_ef = array (
                                    'id_produksi_line' =>$id_produksi_line
                                );

                                $cek_terisi++;
                            }
                        }
                        $this->M_PerencanaanProduksi->edit('produksi_line',$data_ef,$where_ef);
                    
                        //buat SPL
                            if(($total_waktu_perencanaan != 0 && $keterangan_hari == "Hari Libur") || $efisiensi_perencanaan > 100){
                                $jum_spl = $this->M_SuratPerintahLembur->select_all()->num_rows();
                                $jumlah = $jum_spl + 1;
                                $id_spl_baru = "SPL-".$jumlah;
                                
                                $cek_tanggal = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->num_rows();

                                if($cek_tanggal == 0){
                                    $data_spl = array (
                                        'id_surat_perintah_lembur' => $id_spl_baru,
                                        'id_line'                  => $id_line,
                                        'tanggal'                  => $tgl,
                                        'waktu_lembur'             => $keterangan_hari,
                                        'status_spl'               => 0,
                                        'keterangan_spl'           => 0,
                                        'user_add'                 => $user,
                                        'waktu_add'                => $now,
                                        'status_delete'            => 0
                                    );
                                    $this->M_SuratPerintahLembur->insert('surat_perintah_lembur',$data_spl);
                                }
                                else{
                                    $idspl = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->result_array();
                                    $idsplnya = $idspl[0]['id_surat_perintah_lembur'];

                                    if($idspl[0]['keterangan_spl'] == 1){
                                        $data_spl = array (
                                            'keterangan_spl' => 2,
                                            'user_edit'      => $user,
                                            'waktu_edit'     => $now
                                        );
                                        $where_spl = array (
                                            'id_surat_perintah_lembur' => $idsplnya
                                        );
                                        $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                                    }
                                }
                            } else{
                                $idspl    = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->result_array();
                                $jm_idspl = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->num_rows();
                               

                                if($jm_idspl > 0){
                                    $idsplnya = $idspl[0]['id_surat_perintah_lembur'];

                                    if($idspl[0]['keterangan_spl'] == 0){
                                        $data_spl = array (
                                            'status_delete'  => 1,
                                            'user_delete'    => $user,
                                            'waktu_delete'   => $now
                                        );

                                        $where_spl = array (
                                            'id_surat_perintah_lembur' => $idsplnya
                                        );
                                        $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                                    }
                                    else if($idspl[0]['keterangan_spl'] == 2){
                                        $data_spl = array (
                                            'keterangan_spl' => 1,
                                            'user_edit'      => $user,
                                            'waktu_edit'     => $now
                                        );
                                        $where_spl = array (
                                            'id_surat_perintah_lembur' => $idsplnya
                                        );
                                        $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                                    }
                                }
                                
                            }
                            
                        //tutup spl
                }
            //tutup produksi line
            
            //PRODUKSI
                if($cek_terisi > 0){
                    $data_prod = array (
                        'status_perencanaan'    =>1,
                        'user_edit'             =>$user,
                        'waktu_edit'            =>$now,
                    );

                    $where_prod = array(
                        'id_produksi' => $id_produksi
                    );

                    $this->M_PerencanaanProduksi->edit('produksi',$data_prod,$where_prod);

                } else{
                    $data_prod = array (
                        'status_perencanaan'    =>0,
                        'user_edit'             =>$user,
                        'waktu_edit'            =>$now,
                    );

                    $where_prod = array(
                        'id_produksi' => $id_produksi
                    );

                    $this->M_PerencanaanProduksi->edit('produksi',$data_prod,$where_prod);
                }
            //tutup produksi
        }

        //DETAIL PRODUKSI LINE
            $jumlah_dpo = $this->input->post('jumlah_dpo_kf');

            for($o=0;$o<$jumlah_dpo;$o++){
                $keterangan_div = $this->input->post('ket'.$o);
                $statper        = $this->input->post('statper'.$o);
                $id_detpo       = $this->input->post('id_bg3'.$o);

                //lama, ada perencanaan
                if($keterangan_div == 3){
                    $jumlah_line = $this->input->post('jumlah_line'.$o);
                    
                    for($k=1;$k<=$jumlah_line;$k++){
                        $idline = $this->input->post($o.'id_line_kf'.$k);
        
                        for($z=1;$z<=7;$z++){
                            $jumlah_item_s   = $this->input->post('jm'.$o.$idline.'day'.$z);
                            $waktu_proses_s  = $this->input->post('ef'.$o.$idline.'day'.$z);
                            $id_det_prodline = $this->input->post('id_dpl'.$o.$idline.'day'.$z);

                            $get_old_detprodline      = $this->M_PerencanaanProduksi->get_one_detprodline($id_det_prodline)->result_array();
                            $jm_get_old_detprodline   = $this->M_PerencanaanProduksi->get_one_detprodline($id_det_prodline)->num_rows();

                            if($jm_get_old_detprodline > 0){
                                $jumlah_item_sebelum_edit = $get_old_detprodline[0]['jumlah_item_perencanaan'];

                                $tgl   = date('Y-m-d', strtotime('+'.($z-1).'days', strtotime($start_date)));
                                
                                if($jumlah_item_s != ""){
                                    $jumlah_item = $jumlah_item_s;
                                    $waktu_proses = $waktu_proses_s;
                                }
                                else{
                                    $jumlah_item  = 0;
                                    $waktu_proses = 0;
                                }

                                //DETAIL PRODUKSI LINE
                                    if($statper == 0){
                                        $data_detprod = array(
                                            'jumlah_item_perencanaan'   => $jumlah_item,
                                            'waktu_proses_perencanaan'  => $waktu_proses,
                                            'status_perencanaan'        => 0,
                                            'user_edit'                 => $user,
                                            'waktu_edit'                => $now,
                                        );

                                        $where_detprod = array(
                                            'id_detail_produksi_line' => $id_det_prodline
                                        );

                                        $this->M_PerencanaanProduksi->edit('detail_produksi_line',$data_detprod,$where_detprod);
                                    } else{
                                        $data_detprod = array(
                                            'jumlah_item_perencanaan'   => $jumlah_item,
                                            'waktu_proses_perencanaan'  => $waktu_proses,
                                            'status_perencanaan'        => 1,
                                            'user_edit'                 => $user,
                                            'waktu_edit'                => $now,
                                        );

                                        $where_detprod = array(
                                            'id_detail_produksi_line' => $id_det_prodline
                                        );

                                        $this->M_PerencanaanProduksi->edit('detail_produksi_line',$data_detprod,$where_detprod);
                                    }
                                //tutup detprod
                                
                                //DETAIL PRODUKSI TERTUNDA
                                    if($statper == 1){
                                        $dpt    = $this->M_PerencanaanProduksi->get_one_detprodtun($id_det_prodline)->result_array();
                                        $jm_dpt = $this->M_PerencanaanProduksi->get_one_detprodtun($id_det_prodline)->num_rows();
                                        
                                        //PRODUKSI TERTUNDA
                                            if($jm_dpt != 0){
                                                //sebelumnya ada, tetap ada
                                                if($jumlah_item != 0){
                                                    $id_pt  = $dpt[0]['id_produksi_tertunda'];
                                                    $pt     = $this->M_PerencanaanProduksi->get_one_prodtun($id_pt)->result_array();
        
                                                    $jumlah_tertundas = $pt[0]['jumlah_tertunda'];
                                                    $jumlah_terencanas= $pt[0]['jumlah_terencana'];
        
                                                    if($dpt[0]['jumlah_perencanaan'] == $jumlah_item){
        
                                                    }
                                                    else if($dpt[0]['jumlah_perencanaan'] > $jumlah_item){
                                                        $selisih = $dpt[0]['jumlah_perencanaan'] - $jumlah_item;
                                                        $new     = $jumlah_terencanas - $selisih;
                                                        
                                                        $data_pt = array(
                                                            'jumlah_terencana'  => $new,
                                                            'status_penjadwalan'=> 1,
                                                            'user_edit'         => $user,
                                                            'waktu_edit'        => $now
                                                        );
        
                                                        $where_pt = array(
                                                            'id_produksi_tertunda' => $id_pt
                                                        );
                                                        
                                                        $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
        
                                                    } else if($dpt[0]['jumlah_perencanaan'] < $jumlah_item){
                                                        $selisih = $jumlah_item - $dpt[0]['jumlah_perencanaan'];
                                                        $new     = $jumlah_terencanas + $selisih;
        
                                                        if($new == $jumlah_tertundas){
                                                            $data_pt = array(
                                                                'jumlah_terencana'  => $new,
                                                                'status_penjadwalan'=> 2,
                                                                'user_edit'         => $user,
                                                                'waktu_edit'        => $now
                                                            );
        
                                                            $where_pt = array(
                                                                'id_produksi_tertunda' => $id_pt
                                                            );
                                                            
                                                            $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                                        } else{
                                                            $data_pt = array(
                                                                'jumlah_terencana'  => $new,
                                                                'status_penjadwalan'=> 1,
                                                                'user_edit'         => $user,
                                                                'waktu_edit'        => $now
                                                            );
        
                                                            $where_pt = array(
                                                                'id_produksi_tertunda' => $id_pt
                                                            );
                                                            
                                                            $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                                        }
                                                        
                                                    }

                                                    //DETAIL PRODUKSI TERTUNDA
                                                    $data_dpt = array(
                                                        'jumlah_perencanaan' => $jumlah_item,
                                                        'user_edit'          => $user,
                                                        'waktu_edit'         => $now
                                                    );
                
                                                    $where_dpt = array(
                                                        'id_detail_produksi_tertunda' => $dpt[0]['id_detail_produksi_tertunda']
                                                    );
                
                                                    $this->M_PerencanaanProduksi->edit('detail_produksi_tertunda',$data_dpt,$where_dpt);
                                                    
                                                }
                                                //sebelumnya ada, sekarang nda ada
                                                else if($jumlah_item == 0){
                                                    $id_pt  = $dpt[0]['id_produksi_tertunda'];
                                                    $pt     = $this->M_PerencanaanProduksi->get_one_prodtun($id_pt)->result_array();

                                                    $jumlah_tertundas = $pt[0]['jumlah_tertunda'];
                                                    $jumlah_terencanas= $pt[0]['jumlah_terencana'];

                                                    if($dpt[0]['jumlah_perencanaan'] == $pt[0]['jumlah_tertunda']){
                                                        $data_pt = array(
                                                            'jumlah_terencana'  => 0,
                                                            'status_penjadwalan'=> 0,
                                                            'user_edit'         => $user,
                                                            'waktu_edit'        => $now
                                                        );
                                                    }
                                                    else{
                                                        $new = $jumlah_terencanas -  $dpt[0]['jumlah_perencanaan'];

                                                        if($new == $jumlah_tertundas){
                                                            $data_pt = array(
                                                                'jumlah_terencana'  => $new,
                                                                'status_penjadwalan'=> 2,
                                                                'user_edit'         => $user,
                                                                'waktu_edit'        => $now
                                                            );
                                                        } else{
                                                            $data_pt = array(
                                                                'jumlah_terencana'  => $new,
                                                                'status_penjadwalan'=> 1,
                                                                'user_edit'         => $user,
                                                                'waktu_edit'        => $now
                                                            );
                                                        }
                                                    }

                                                    $where_pt = array(
                                                        'id_produksi_tertunda' => $id_pt
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);

                                                    //DETAIL PRODUKSI LINE
                                                    $data_dpt = array(
                                                        'status_delete' => 1,
                                                        'user_delete'   => $user,
                                                        'waktu_delete'  => $now
                                                    );
                
                                                    $where_dpt = array(
                                                        'id_detail_produksi_tertunda' => $dpt[0]['id_detail_produksi_tertunda']
                                                    );
                
                                                    $this->M_PerencanaanProduksi->edit('detail_produksi_tertunda',$data_dpt,$where_dpt);
                                                }
                                            }
                                            //sebelumnya nda ada, sekarang ada
                                            else if($jm_dpt == 0 && $jumlah_item > 0){
                                                $id_pt  = $this->input->post('id_pt_bg3'.$o);
                                                $pt     = $this->M_PerencanaanProduksi->get_one_prodtun($id_pt)->result_array();

                                                $jumlah_tertundas = $pt[0]['jumlah_tertunda'];
                                                $jumlah_terencanas= $pt[0]['jumlah_terencana'];

                                                $new = $jumlah_item + $jumlah_terencanas;

                                                if($new == $jumlah_tertundas){
                                                    $data_pt = array(
                                                        'jumlah_terencana'  => $new,
                                                        'status_penjadwalan'=> 2,
                                                        'user_edit'         => $user,
                                                        'waktu_edit'        => $now
                                                    );
                                                } else{
                                                    $data_pt = array(
                                                        'jumlah_terencana'  => $new,
                                                        'status_penjadwalan'=> 1,
                                                        'user_edit'         => $user,
                                                        'waktu_edit'        => $now
                                                    );
                                                }

                                                $where_pt = array(
                                                    'id_produksi_tertunda' => $id_pt
                                                );
                                                $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);

                                                //DETAIL PRODUKSI TERTUNDA
                                                    //id produksi tunda produksi
                                                    $tahun_sekarangnya = substr(date('Y',strtotime($tgl)),2,2);
                                                    $bulan_sekarangnya = date('m',strtotime($tgl));

                                                    $idcode_dprodtun = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                                    $id_dprodtun_last     = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->result_array();
                                                    $id_dprodtun_last_cek = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->num_rows();

                                                    if($id_dprodtun_last_cek == 1){
                                                        $id_terakhirnya    = $id_dprodtun_last[0]['id_detail_produksi_tertunda'];

                                                        $tahun_sebelumnya  = substr($id_terakhirnya,8,2);
                                                        $bulan_sebelumnya  = substr($id_terakhirnya,10,2);
                                                                
                                                        //kalau tahun sama
                                                        if($tahun_sebelumnya == $tahun_sekarangnya){
                                                            //kalau tahun & bulannya sama berarti count+1
                                                            if($bulan_sebelumnya == $bulan_sekarangnya){
                                                                $countnya = intval(substr($id_terakhirnya,13,8)) + 1;
                                                                $pjgnya   = strlen($countnya);
                                                    
                                                                if($pjgnya == 1){
                                                                    $countnya_baru = "0000000".$countnya;
                                                                }
                                                                else if($pjgnya == 2){
                                                                    $countnya_baru = "000000".$countnya;
                                                                }
                                                                else if($pjgnya == 3){
                                                                    $countnya_baru = "00000".$countnya;
                                                                }
                                                                else if($pjgnya == 4){
                                                                    $countnya_baru = "0000".$countnya;
                                                                }
                                                                else if($pjgnya == 5){
                                                                    $countnya_baru = "000".$countnya;
                                                                }
                                                                else if($pjgnya == 6){
                                                                    $countnya_baru = "00".$countnya;
                                                                }
                                                                else if($pjgnya == 7){
                                                                    $countnya_baru = "0".$countnya;
                                                                }
                                                                else{
                                                                    $countnya_baru = $countnya;
                                                                }
                                                                
                                                                //id yang baru
                                                                $id_dprodtun_baru = "DPRODTUN".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                            }
                                                            //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                            else{
                                                                //id yang baru
                                                                $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                                            }
                                                        }
                                                        //kalau tahun tidak sama
                                                        else{
                                                            //id yang baru
                                                            $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                                        }
                                                    }
                                                    else{
                                                        //id yang baru
                                                        $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                                    }   

                                                    $data_detprodtun = array(
                                                        'id_detail_produksi_tertunda' => $id_dprodtun_baru,
                                                        'id_produksi_tertunda'        => $id_pt,
                                                        'id_detail_produksi_line'     => $id_det_prodline,
                                                        'jumlah_perencanaan'          => $jumlah_item,
                                                        'user_add'                    => $user,
                                                        'waktu_add'                   => $now,
                                                        'status_delete'               => 0
                                                    );

                                                    $this->M_PerencanaanProduksi->insert('detail_produksi_tertunda',$data_detprodtun);
                                                //tutup detail produksi tertunda
                                            }
                                        //tutup prodtun
                                    }  
                                //tutup detprodtun

                                /* PERMINTAAN MATERIAL
                                    if($jumlah_item_sebelum_edit > 0){
                                        //sebelum ada & tetap ada
                                        if($jumlah_item_s > 0){
                                            echo $tgl." || ".$id_detpo." || ".$idline."<br>";

                                            $permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                            $jm_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                            $jumlah_permat = $permat[0]['jumlah_minta'];
                                            $id_permat     = $permat[0]['id_permintaan_material'];

                                            //lama lebih besar
                                            if($jumlah_item_sebelum_edit > $jumlah_item_s){
                                                $selisih = $jumlah_item_sebelum_edit - $jumlah_item_s;

                                                $jumlah_minta_baru = $jumlah_permat - $selisih;

                                                $data_permat = array(
                                                    'jumlah_minta' => $jumlah_minta_baru
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $needs = $jumlah_minta_baru * $jumlah_konsumsi;

                                                    $data_det_permat = array(
                                                        'needs' => $needs
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }
                                            } 
                                            //baru lebih besar
                                            else if($jumlah_item_sebelum_edit < $jumlah_item_s){
                                                $selisih = $jumlah_item_s - $jumlah_item_sebelum_edit;

                                                $jumlah_minta_baru = $jumlah_permat + $selisih;

                                                $data_permat = array(
                                                    'jumlah_minta' => $jumlah_minta_baru
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $needs = $jumlah_minta_baru * $jumlah_konsumsi;

                                                    $data_det_permat = array(
                                                        'needs' => $needs
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }
                                            }
                                        } 
                                        //sebelum ada, jadi tdk ada
                                        else if($jumlah_item_s == 0){
                                            $permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                            $jm_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                            $jumlah_permat = $permat[0]['jumlah_minta'];
                                            $id_permat     = $permat[0]['id_permintaan_material'];

                                            if($jumlah_item_sebelum_edit == $jumlah_permat){
                                                $data_permat = array(
                                                    'status_delete' => 1
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $data_det_permat = array(
                                                        'status_delete' => 1
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }                                    
                                            } 
                                            else if($jumlah_item_sebelum_edit < $jumlah_permat){
                                                $jumlah_minta_baru =  $jumlah_permat - $jumlah_item_sebelum_edit;

                                                $data_permat = array(
                                                    'jumlah_minta' => $jumlah_minta_baru
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $needs = $jumlah_minta_baru * $jumlah_konsumsi;

                                                    $data_det_permat = array(
                                                        'needs' => $needs
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }                                    
                                            }
                                        }
                                    }
                                    //sebelum tidak ada, jadi ada
                                    else if($jumlah_item_sebelum_edit == 0 && $jumlah_item_s > 0){
                                        //cari apakah sudah ada sebelumnya permintaan material untuk tanggal,id_det_po_cust,id_line yangsama?
                                        $cari_permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                        $jm_cari_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                        //jika sebelumnya belum ada
                                        if($jm_cari_permat == 0){
                                            $tahun_sekarangnya = substr(date('Y',strtotime($tgl)),2,2);
                                            $bulan_sekarangnya = date('m',strtotime($tgl));

                                            //id detail perencanaan produksi
                                            $idcode_permat = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                            $id_permat_last     = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->result_array();
                                            $id_permat_last_cek = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->num_rows();
                                
                                            if($id_permat_last_cek == 1){
                                                $id_terakhirnya    = $id_permat_last[0]['id_permintaan_material'];
                                
                                                $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                                                $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                                                        
                                                //kalau tahun sama
                                                if($tahun_sebelumnya == $tahun_sekarangnya){
                                                    //kalau tahun & bulannya sama berarti count+1
                                                    if($bulan_sebelumnya == $bulan_sekarangnya){
                                                        $countnya = intval(substr($id_terakhirnya,11,5)) + 1;
                                                        $pjgnya   = strlen($countnya);
                                            
                                                        if($pjgnya == 1){
                                                            $countnya_baru = "0000".$countnya;
                                                        }
                                                        else if($pjgnya == 2){
                                                            $countnya_baru = "000".$countnya;
                                                        }
                                                        else if($pjgnya == 3){
                                                            $countnya_baru = "00".$countnya;
                                                        }
                                                        else if($pjgnya == 4){
                                                            $countnya_baru = "0".$countnya;
                                                        }
                                                        else{
                                                            $countnya_baru = $countnya;
                                                        }
                                                        
                                                        //id yang baru
                                                        $id_permat_baru = "PERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                    }
                                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                    else{
                                                        //id yang baru
                                                        $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                    }
                                                }
                                                //kalau tahun tidak sama
                                                else{
                                                    //id yang baru
                                                    $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                }
                                            }
                                            else{
                                                //id yang baru
                                                $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                            }

                                            $tgl_now = date('Y-m-d');
                                            
                                            $data_permat = array(
                                                'id_permintaan_material'            => $id_permat_baru,
                                                'id_detail_purchase_order_customer' => $id_detpo,
                                                'id_line'                           => $idline,
                                                'jumlah_minta'                      => $jumlah_item,
                                                'tanggal_permintaan'                => $tgl_now,
                                                'tanggal_produksi'                  => $tgl,
                                                'status_permintaan'                 => 0,
                                                'user_add'                          => $user,
                                                'waktu_add'                         => $now,
                                                'status_delete'                     => 0
                                            );

                                            $this->M_PerencanaanProduksi->insert('permintaan_material',$data_permat);

                                            //DETAIL PERMINTAAN MATERIAL
                                            $konmat_tam    = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->result_array();
                                            $jm_konmat_tam = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->num_rows();

                                            for($b=0;$b<$jm_konmat_tam;$b++){
                                                //id_detail_permintaan_material
                                                $idcode_detpermat = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                                $id_detpermat_last     = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->result_array();
                                                $id_detpermat_last_cek = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->num_rows();
                                    
                                                if($id_detpermat_last_cek == 1){
                                                    $id_terakhirnya    = $id_detpermat_last[0]['id_detail_permintaan_material'];
                                    
                                                    $tahun_sebelumnya  = substr($id_terakhirnya,9,2);
                                                    $bulan_sebelumnya  = substr($id_terakhirnya,11,2);
                                                            
                                                    //kalau tahun sama
                                                    if($tahun_sebelumnya == $tahun_sekarangnya){
                                                        //kalau tahun & bulannya sama berarti count+1
                                                        if($bulan_sebelumnya == $bulan_sekarangnya){
                                                            $countnya = intval(substr($id_terakhirnya,14,6)) + 1;
                                                            $pjgnya   = strlen($countnya);
                                                
                                                            if($pjgnya == 1){
                                                                $countnya_baru = "00000".$countnya;
                                                            }
                                                            else if($pjgnya == 2){
                                                                $countnya_baru = "0000".$countnya;
                                                            }
                                                            else if($pjgnya == 3){
                                                                $countnya_baru = "000".$countnya;
                                                            }
                                                            else if($pjgnya == 4){
                                                                $countnya_baru = "00".$countnya;
                                                            }
                                                            else if($pjgnya == 5){
                                                                $countnya_baru = "0".$countnya;
                                                            }
                                                            else{
                                                                $countnya_baru = $countnya;
                                                            }
                                                            
                                                            //id yang baru
                                                            $id_detpermat_baru = "DETPERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                        }
                                                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                        else{
                                                            //id yang baru
                                                            $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                        }
                                                    }
                                                    //kalau tahun tidak sama
                                                    else{
                                                        //id yang baru
                                                        $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                    }
                                                }
                                                else{
                                                    //id yang baru
                                                    $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                }

                                                $id_konsumsi_material = $konmat_tam[$b]['id_konsumsi_material'];
                                                $jumlah_konsumsi      = $konmat_tam[$b]['jumlah_konsumsi'];
                                                $needs                = $jumlah_item * $jumlah_konsumsi;
                                                
                                                $data_detpermat = array (
                                                    'id_detail_permintaan_material'     => $id_detpermat_baru,
                                                    'id_permintaan_material'            => $id_permat_baru,
                                                    'id_konsumsi_material'              => $id_konsumsi_material,
                                                    'needs'                             => $needs,
                                                    'status_detail_permintaan_material' => 0,
                                                    'user_add'                          => $user,
                                                    'waktu_add'                         => $now,
                                                    'status_delete'                     => 0
                                                );

                                                $this->M_PerencanaanProduksi->insert('detail_permintaan_material',$data_detpermat);
                                            }
                                        } 
                                        //jika sebelumnya ada
                                        else{
                                            $id_permat     = $cari_permat[0]['id_permintaan_material'];
                                            $jumlah_permat = $cari_permat[0]['jumlah_minta'];

                                            $jumlah_baru = $jumlah_permat + $jumlah_item;

                                            $data_permat = array(
                                                'jumlah_minta' => $jumlah_baru
                                            );

                                            $where_permat = array(
                                                'id_permintaan_material' => $id_permat
                                            );

                                            $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                            $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                            $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                            for($t=0;$t<$jm_det_permat;$t++){
                                                $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                $needs = $jumlah_baru * $jumlah_konsumsi;

                                                $data_det_permat = array(
                                                    'needs' => $needs
                                                );

                                                $where_det_permat = array(
                                                    'id_detail_permintaan_material' => $id_det_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                            }
                                        }
                                    }
                                //tutup permat */
                                
                                //permat
                                if($jumlah_item_sebelum_edit > 0 && $jumlah_item_sebelum_edit != $jumlah_item_s){
                                    //sebelum ada & tetap ada
                                    if($jumlah_item_s > 0){
                                        $permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                        $jm_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();
                                        
                                        //jika permintaan sedang diproses
                                        if($permat[0]['status_permintaan'] != 0 && $permat[0]['status_permintaan'] != 4 && $permat[0]['status_permintaan'] != 5){
                                            $jumlah_permat = $permat[0]['jumlah_minta'];
                                            $id_permat     = $permat[0]['id_permintaan_material'];

                                            //cek apakah sudah ada perubahan permintaan yang statusnya belum diproses (status 0)
                                            $cek_ubmin    = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->result_array();
                                            $jm_cek_ubmin = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->num_rows();

                                            $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
                                            $bulan_sekarang = date('m',strtotime($tgl));
                                            $id_code        = "UBMIN".$tahun_sekarang.$bulan_sekarang.".";
                                
                                            $last       = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->result_array();
                                            $last_cek   = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->num_rows();
                                
                                            //id
                                            if($last_cek == 1){
                                                $id_terakhir    = $last[0]['id_perubahan_permintaan'];
                                
                                                $tahun_sebelum  = substr($id_terakhir,5,2);
                                            
                                                $bulan_sebelum  = substr($id_terakhir,7,2);
                                
                                                //kalau tahun sama
                                                if($tahun_sebelum == $tahun_sekarang){
                                                    //kalau tahun & bulannya sama berarti count+1
                                                    if($bulan_sebelum == $bulan_sekarang){
                                                        $count = intval(substr($id_terakhir,10,3)) + 1;
                                                        $pjg   = strlen($count);
                                
                                                        if($pjg == 1){
                                                            $count_baru = "00".$count;
                                                        }
                                                        else if($pjg == 2){
                                                            $count_baru = "0".$count;
                                                        }
                                                        else{
                                                            $count_baru = $count;
                                                        }
                                                        
                                                        //id yang baru
                                                        $id_ubmin_baru = "UBMIN".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                                                    }
                                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                    else{
                                                        //id yang baru
                                                        $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                                    }
                                                }
                                                //kalau tahun tidak sama
                                                else{
                                                    //id yang baru
                                                    $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                                }
                                            }
                                            else{
                                                //id yang baru
                                                $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                            }  

                                            $data_ubmin = array(
                                                'id_perubahan_permintaan' => $id_ubmin_baru,
                                                'id_permintaan_material'  => $id_permat,
                                                'jumlah_minta_lama'       => $jumlah_permat,
                                                'jumlah_minta_baru'       => $jumlah_item_s,
                                                'status'                  => 0,
                                                'user_add'                => $user,
                                                'waktu_add'               => $now,
                                                'status_delete'           => 0
                                            );

                                            $this->M_PerencanaanProduksi->insert('perubahan_permintaan',$data_ubmin);

                                            if($jm_cek_ubmin > 0){
                                                //batal yang lama
                                                $data_ubmin = array(
                                                    'status'    => 3,
                                                    'user_edit' => $user,
                                                    'waktu_edit'=> $now
                                                );

                                                $where_ubmin = array(
                                                    'id_perubahan_permintaan' => $cek_ubmin[0]['id_perubahan_permintaan']
                                                );

                                                $this->M_PerencanaanProduksi->edit('perubahan_permintaan',$data_ubmin,$where_ubmin);
                                            } 

                                            //cek kalo sebelumnya sudah ada perubahan permintaan (status belum diproses, 0) dengan id_permintaan_material yg sama/tidak
                                            //jika tidak ada maka tambahkan perubahan permintaan saja
                                            //jika ada maka tambahkan perubahan permintaan & ubah status perubahan permintaan menjadi 3 (batal)

                                        } 
                                        //jika permintaan belum diproses
                                        else if($permat[0]['status_permintaan'] == 0){
                                            $jumlah_permat = $permat[0]['jumlah_minta'];
                                            $id_permat     = $permat[0]['id_permintaan_material'];

                                            //lama lebih besar
                                            if($jumlah_item_sebelum_edit > $jumlah_item_s){
                                                $selisih = $jumlah_item_sebelum_edit - $jumlah_item_s;

                                                $jumlah_minta_baru = $jumlah_permat - $selisih;

                                                $data_permat = array(
                                                    'jumlah_minta' => $jumlah_minta_baru
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $needs = $jumlah_minta_baru * $jumlah_konsumsi;

                                                    $data_det_permat = array(
                                                        'needs' => $needs
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }
                                            } 
                                            //baru lebih besar
                                            else if($jumlah_item_sebelum_edit < $jumlah_item_s){
                                                $selisih = $jumlah_item_s - $jumlah_item_sebelum_edit;

                                                $jumlah_minta_baru = $jumlah_permat + $selisih;

                                                $data_permat = array(
                                                    'jumlah_minta' => $jumlah_minta_baru
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $needs = $jumlah_minta_baru * $jumlah_konsumsi;

                                                    $data_det_permat = array(
                                                        'needs' => $needs
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }
                                            }
                                            //sama
                                            else if($jumlah_item_sebelum_edit == $jumlah_item_s){

                                            }
                                        } 
                                        //jika permintaan batal
                                        else if($permat[0]['status_permintaan'] == 4 || $permat[0]['status_permintaan'] == 5){
                                            $tahun_sekarangnya = substr(date('Y',strtotime($tgl)),2,2);
                                            $bulan_sekarangnya = date('m',strtotime($tgl));

                                            //id detail perencanaan produksi
                                            $idcode_permat = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                            $id_permat_last     = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->result_array();
                                            $id_permat_last_cek = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->num_rows();
                                
                                            if($id_permat_last_cek == 1){
                                                $id_terakhirnya    = $id_permat_last[0]['id_permintaan_material'];
                                
                                                $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                                                $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                                                        
                                                //kalau tahun sama
                                                if($tahun_sebelumnya == $tahun_sekarangnya){
                                                    //kalau tahun & bulannya sama berarti count+1
                                                    if($bulan_sebelumnya == $bulan_sekarangnya){
                                                        $countnya = intval(substr($id_terakhirnya,11,5)) + 1;
                                                        $pjgnya   = strlen($countnya);
                                            
                                                        if($pjgnya == 1){
                                                            $countnya_baru = "0000".$countnya;
                                                        }
                                                        else if($pjgnya == 2){
                                                            $countnya_baru = "000".$countnya;
                                                        }
                                                        else if($pjgnya == 3){
                                                            $countnya_baru = "00".$countnya;
                                                        }
                                                        else if($pjgnya == 4){
                                                            $countnya_baru = "0".$countnya;
                                                        }
                                                        else{
                                                            $countnya_baru = $countnya;
                                                        }
                                                        
                                                        //id yang baru
                                                        $id_permat_baru = "PERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                    }
                                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                    else{
                                                        //id yang baru
                                                        $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                    }
                                                }
                                                //kalau tahun tidak sama
                                                else{
                                                    //id yang baru
                                                    $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                }
                                            }
                                            else{
                                                //id yang baru
                                                $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                            }

                                            $tgl_now = date('Y-m-d');
                                            
                                            $data_permat = array(
                                                'id_permintaan_material'            => $id_permat_baru,
                                                'id_detail_purchase_order_customer' => $id_detpo,
                                                'id_line'                           => $idline,
                                                'jumlah_minta'                      => $jumlah_item,
                                                'tanggal_permintaan'                => $tgl_now,
                                                'tanggal_produksi'                  => $tgl,
                                                'status_permintaan'                 => 0,
                                                'user_add'                          => $user,
                                                'waktu_add'                         => $now,
                                                'status_delete'                     => 0
                                            );

                                            $this->M_PerencanaanProduksi->insert('permintaan_material',$data_permat);

                                            //DETAIL PERMINTAAN MATERIAL
                                            $konmat_tam    = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->result_array();
                                            $jm_konmat_tam = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->num_rows();

                                            for($b=0;$b<$jm_konmat_tam;$b++){
                                                //id_detail_permintaan_material
                                                $idcode_detpermat = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                                $id_detpermat_last     = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->result_array();
                                                $id_detpermat_last_cek = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->num_rows();
                                    
                                                if($id_detpermat_last_cek == 1){
                                                    $id_terakhirnya    = $id_detpermat_last[0]['id_detail_permintaan_material'];
                                    
                                                    $tahun_sebelumnya  = substr($id_terakhirnya,9,2);
                                                    $bulan_sebelumnya  = substr($id_terakhirnya,11,2);
                                                            
                                                    //kalau tahun sama
                                                    if($tahun_sebelumnya == $tahun_sekarangnya){
                                                        //kalau tahun & bulannya sama berarti count+1
                                                        if($bulan_sebelumnya == $bulan_sekarangnya){
                                                            $countnya = intval(substr($id_terakhirnya,14,6)) + 1;
                                                            $pjgnya   = strlen($countnya);
                                                
                                                            if($pjgnya == 1){
                                                                $countnya_baru = "00000".$countnya;
                                                            }
                                                            else if($pjgnya == 2){
                                                                $countnya_baru = "0000".$countnya;
                                                            }
                                                            else if($pjgnya == 3){
                                                                $countnya_baru = "000".$countnya;
                                                            }
                                                            else if($pjgnya == 4){
                                                                $countnya_baru = "00".$countnya;
                                                            }
                                                            else if($pjgnya == 5){
                                                                $countnya_baru = "0".$countnya;
                                                            }
                                                            else{
                                                                $countnya_baru = $countnya;
                                                            }
                                                            
                                                            //id yang baru
                                                            $id_detpermat_baru = "DETPERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                        }
                                                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                        else{
                                                            //id yang baru
                                                            $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                        }
                                                    }
                                                    //kalau tahun tidak sama
                                                    else{
                                                        //id yang baru
                                                        $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                    }
                                                }
                                                else{
                                                    //id yang baru
                                                    $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                }

                                                $id_konsumsi_material = $konmat_tam[$b]['id_konsumsi_material'];
                                                $jumlah_konsumsi      = $konmat_tam[$b]['jumlah_konsumsi'];
                                                $needs                = $jumlah_item * $jumlah_konsumsi;
                                                
                                                $data_detpermat = array (
                                                    'id_detail_permintaan_material'     => $id_detpermat_baru,
                                                    'id_permintaan_material'            => $id_permat_baru,
                                                    'id_konsumsi_material'              => $id_konsumsi_material,
                                                    'needs'                             => $needs,
                                                    'status_detail_permintaan_material' => 0,
                                                    'user_add'                          => $user,
                                                    'waktu_add'                         => $now,
                                                    'status_delete'                     => 0
                                                );

                                                $this->M_PerencanaanProduksi->insert('detail_permintaan_material',$data_detpermat);
                                            }
                                        }   
                                    } 
                                    //sebelum ada, jadi tidak ada
                                    else if($jumlah_item_s == 0){
                                        $permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                        $jm_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                        if($permat[0]['status_permintaan'] != 0 && $permat[0]['status_permintaan'] < 4){
                                            $jumlah_permat = $permat[0]['jumlah_minta'];
                                            $id_permat     = $permat[0]['id_permintaan_material'];
        
                                            //cek apakah sudah ada perubahan permintaan yang statusnya belum diproses (status 0)
                                            $cek_ubmin    = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->result_array();
                                            $jm_cek_ubmin = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->num_rows();
        
                                            $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
                                            $bulan_sekarang = date('m',strtotime($tgl));
                                            $id_code        = "UBMIN".$tahun_sekarang.$bulan_sekarang.".";
                                
                                            $last       = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->result_array();
                                            $last_cek   = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->num_rows();
                                
                                            //id
                                            if($last_cek == 1){
                                                $id_terakhir    = $last[0]['id_perubahan_permintaan'];
                                
                                                $tahun_sebelum  = substr($id_terakhir,5,2);
                                            
                                                $bulan_sebelum  = substr($id_terakhir,7,2);
                                
                                                //kalau tahun sama
                                                if($tahun_sebelum == $tahun_sekarang){
                                                    //kalau tahun & bulannya sama berarti count+1
                                                    if($bulan_sebelum == $bulan_sekarang){
                                                        $count = intval(substr($id_terakhir,10,3)) + 1;
                                                        $pjg   = strlen($count);
                                
                                                        if($pjg == 1){
                                                            $count_baru = "00".$count;
                                                        }
                                                        else if($pjg == 2){
                                                            $count_baru = "0".$count;
                                                        }
                                                        else{
                                                            $count_baru = $count;
                                                        }
                                                        
                                                        //id yang baru
                                                        $id_ubmin_baru = "UBMIN".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                                                    }
                                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                    else{
                                                        //id yang baru
                                                        $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                                    }
                                                }
                                                //kalau tahun tidak sama
                                                else{
                                                    //id yang baru
                                                    $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                                }
                                            }
                                            else{
                                                //id yang baru
                                                $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                            }  
        
                                            $data_ubmin = array(
                                                'id_perubahan_permintaan' => $id_ubmin_baru,
                                                'id_permintaan_material'  => $id_permat,
                                                'jumlah_minta_lama'       => $jumlah_permat,
                                                'jumlah_minta_baru'       => $jumlah_item_s,
                                                'status'                  => 0,
                                                'user_add'                => $user,
                                                'waktu_add'               => $now,
                                                'status_delete'           => 0
                                            );
        
                                            $this->M_PerencanaanProduksi->insert('perubahan_permintaan',$data_ubmin);
        
                                            if($jm_cek_ubmin > 0){
                                                //batal yang lama
                                                $data_ubmin = array(
                                                    'status'    => 3,
                                                    'user_edit' => $user,
                                                    'waktu_edit'=> $now
                                                );
        
                                                $where_ubmin = array(
                                                    'id_perubahan_permintaan' => $cek_ubmin[0]['id_perubahan_permintaan']
                                                );
        
                                                $this->M_PerencanaanProduksi->edit('perubahan_permintaan',$data_ubmin,$where_ubmin);
                                            } 
                                        } else if($permat[0]['status_permintaan'] == 0){
                                            $jumlah_permat = $permat[0]['jumlah_minta'];
                                            $id_permat     = $permat[0]['id_permintaan_material'];

                                            if($jumlah_item_sebelum_edit == $jumlah_permat){
                                                $data_permat = array(
                                                    'status_delete' => 1
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $data_det_permat = array(
                                                        'status_delete' => 1
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }                                    
                                            } 
                                            else if($jumlah_item_sebelum_edit < $jumlah_permat){
                                                $jumlah_minta_baru =  $jumlah_permat - $jumlah_item_sebelum_edit;

                                                $data_permat = array(
                                                    'jumlah_minta' => $jumlah_minta_baru
                                                );

                                                $where_permat = array(
                                                    'id_permintaan_material' => $id_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                                $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                                $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                                for($t=0;$t<$jm_det_permat;$t++){
                                                    $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                    $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                    $needs = $jumlah_minta_baru * $jumlah_konsumsi;

                                                    $data_det_permat = array(
                                                        'needs' => $needs
                                                    );

                                                    $where_det_permat = array(
                                                        'id_detail_permintaan_material' => $id_det_permat
                                                    );

                                                    $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                                }                                    
                                            }
                                        }
                                    }
                                }
                                //sebelum tidak ada, jadi ada
                                else if($jumlah_item_sebelum_edit == 0 && $jumlah_item_s > 0){
                                    //cari apakah sudah ada sebelumnya permintaan material untuk tanggal,id_det_po_cust,id_line yangsama?
                                    $cari_permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                    $jm_cari_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                    //jika sebelumnya belum ada
                                    if($jm_cari_permat == 0){
                                        $tahun_sekarangnya = substr(date('Y',strtotime($tgl)),2,2);
                                        $bulan_sekarangnya = date('m',strtotime($tgl));

                                        //id detail perencanaan produksi
                                        $idcode_permat = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                        $id_permat_last     = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->result_array();
                                        $id_permat_last_cek = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->num_rows();
                            
                                        if($id_permat_last_cek == 1){
                                            $id_terakhirnya    = $id_permat_last[0]['id_permintaan_material'];
                            
                                            $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                                            $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                                                    
                                            //kalau tahun sama
                                            if($tahun_sebelumnya == $tahun_sekarangnya){
                                                //kalau tahun & bulannya sama berarti count+1
                                                if($bulan_sebelumnya == $bulan_sekarangnya){
                                                    $countnya = intval(substr($id_terakhirnya,11,5)) + 1;
                                                    $pjgnya   = strlen($countnya);
                                        
                                                    if($pjgnya == 1){
                                                        $countnya_baru = "0000".$countnya;
                                                    }
                                                    else if($pjgnya == 2){
                                                        $countnya_baru = "000".$countnya;
                                                    }
                                                    else if($pjgnya == 3){
                                                        $countnya_baru = "00".$countnya;
                                                    }
                                                    else if($pjgnya == 4){
                                                        $countnya_baru = "0".$countnya;
                                                    }
                                                    else{
                                                        $countnya_baru = $countnya;
                                                    }
                                                    
                                                    //id yang baru
                                                    $id_permat_baru = "PERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                }
                                                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                else{
                                                    //id yang baru
                                                    $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                }
                                            }
                                            //kalau tahun tidak sama
                                            else{
                                                //id yang baru
                                                $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                            }
                                        }
                                        else{
                                            //id yang baru
                                            $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                        }

                                        $tgl_now = date('Y-m-d');
                                        
                                        $data_permat = array(
                                            'id_permintaan_material'            => $id_permat_baru,
                                            'id_detail_purchase_order_customer' => $id_detpo,
                                            'id_line'                           => $idline,
                                            'jumlah_minta'                      => $jumlah_item,
                                            'tanggal_permintaan'                => $tgl_now,
                                            'tanggal_produksi'                  => $tgl,
                                            'status_permintaan'                 => 0,
                                            'user_add'                          => $user,
                                            'waktu_add'                         => $now,
                                            'status_delete'                     => 0
                                        );

                                        $this->M_PerencanaanProduksi->insert('permintaan_material',$data_permat);

                                        //DETAIL PERMINTAAN MATERIAL
                                        $konmat_tam    = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->result_array();
                                        $jm_konmat_tam = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->num_rows();

                                        for($b=0;$b<$jm_konmat_tam;$b++){
                                            //id_detail_permintaan_material
                                            $idcode_detpermat = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                            $id_detpermat_last     = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->result_array();
                                            $id_detpermat_last_cek = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->num_rows();
                                
                                            if($id_detpermat_last_cek == 1){
                                                $id_terakhirnya    = $id_detpermat_last[0]['id_detail_permintaan_material'];
                                
                                                $tahun_sebelumnya  = substr($id_terakhirnya,9,2);
                                                $bulan_sebelumnya  = substr($id_terakhirnya,11,2);
                                                        
                                                //kalau tahun sama
                                                if($tahun_sebelumnya == $tahun_sekarangnya){
                                                    //kalau tahun & bulannya sama berarti count+1
                                                    if($bulan_sebelumnya == $bulan_sekarangnya){
                                                        $countnya = intval(substr($id_terakhirnya,14,6)) + 1;
                                                        $pjgnya   = strlen($countnya);
                                            
                                                        if($pjgnya == 1){
                                                            $countnya_baru = "00000".$countnya;
                                                        }
                                                        else if($pjgnya == 2){
                                                            $countnya_baru = "0000".$countnya;
                                                        }
                                                        else if($pjgnya == 3){
                                                            $countnya_baru = "000".$countnya;
                                                        }
                                                        else if($pjgnya == 4){
                                                            $countnya_baru = "00".$countnya;
                                                        }
                                                        else if($pjgnya == 5){
                                                            $countnya_baru = "0".$countnya;
                                                        }
                                                        else{
                                                            $countnya_baru = $countnya;
                                                        }
                                                        
                                                        //id yang baru
                                                        $id_detpermat_baru = "DETPERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                    }
                                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                    else{
                                                        //id yang baru
                                                        $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                    }
                                                }
                                                //kalau tahun tidak sama
                                                else{
                                                    //id yang baru
                                                    $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                }
                                            }
                                            else{
                                                //id yang baru
                                                $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                            }

                                            $id_konsumsi_material = $konmat_tam[$b]['id_konsumsi_material'];
                                            $jumlah_konsumsi      = $konmat_tam[$b]['jumlah_konsumsi'];
                                            $needs                = $jumlah_item * $jumlah_konsumsi;
                                            
                                            $data_detpermat = array (
                                                'id_detail_permintaan_material'     => $id_detpermat_baru,
                                                'id_permintaan_material'            => $id_permat_baru,
                                                'id_konsumsi_material'              => $id_konsumsi_material,
                                                'needs'                             => $needs,
                                                'status_detail_permintaan_material' => 0,
                                                'user_add'                          => $user,
                                                'waktu_add'                         => $now,
                                                'status_delete'                     => 0
                                            );
                                            

                                            $this->M_PerencanaanProduksi->insert('detail_permintaan_material',$data_detpermat);
                                        }
                                    } 
                                    //jika sebelumnya ada
                                    else{
                                        $id_permat     = $cari_permat[0]['id_permintaan_material'];
                                        $jumlah_permat = $cari_permat[0]['jumlah_minta'];

                                        $jumlah_baru = $jumlah_permat + $jumlah_item_s;

                                        $data_permat = array(
                                            'jumlah_minta' => $jumlah_baru
                                        );

                                        $where_permat = array(
                                            'id_permintaan_material' => $id_permat
                                        );

                                        $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                        $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                        $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                        for($t=0;$t<$jm_det_permat;$t++){
                                            $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                            $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                            $needs = $jumlah_baru * $jumlah_konsumsi;

                                            $data_det_permat = array(
                                                'needs' => $needs
                                            );

                                            $where_det_permat = array(
                                                'id_detail_permintaan_material' => $id_det_permat
                                            );

                                            $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                        }
                                    }
                                    /*
                                        //cari apakah sudah ada sebelumnya permintaan material untuk tanggal,id_det_po_cust,id_line yangsama?
                                        $cari_permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                        $jm_cari_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                        //jika sebelumnya belum ada
                                        if($jm_cari_permat == 0){
                                            $tahun_sekarangnya = substr(date('Y',strtotime($tgl)),2,2);
                                            $bulan_sekarangnya = date('m',strtotime($tgl));

                                            //id detail perencanaan produksi
                                            $idcode_permat = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                            $id_permat_last     = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->result_array();
                                            $id_permat_last_cek = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->num_rows();
                                
                                            if($id_permat_last_cek == 1){
                                                $id_terakhirnya    = $id_permat_last[0]['id_permintaan_material'];
                                
                                                $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                                                $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                                                        
                                                //kalau tahun sama
                                                if($tahun_sebelumnya == $tahun_sekarangnya){
                                                    //kalau tahun & bulannya sama berarti count+1
                                                    if($bulan_sebelumnya == $bulan_sekarangnya){
                                                        $countnya = intval(substr($id_terakhirnya,11,5)) + 1;
                                                        $pjgnya   = strlen($countnya);
                                            
                                                        if($pjgnya == 1){
                                                            $countnya_baru = "0000".$countnya;
                                                        }
                                                        else if($pjgnya == 2){
                                                            $countnya_baru = "000".$countnya;
                                                        }
                                                        else if($pjgnya == 3){
                                                            $countnya_baru = "00".$countnya;
                                                        }
                                                        else if($pjgnya == 4){
                                                            $countnya_baru = "0".$countnya;
                                                        }
                                                        else{
                                                            $countnya_baru = $countnya;
                                                        }
                                                        
                                                        //id yang baru
                                                        $id_permat_baru = "PERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                    }
                                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                    else{
                                                        //id yang baru
                                                        $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                    }
                                                }
                                                //kalau tahun tidak sama
                                                else{
                                                    //id yang baru
                                                    $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                }
                                            }
                                            else{
                                                //id yang baru
                                                $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                            }

                                            $tgl_now = date('Y-m-d');
                                            
                                            $data_permat = array(
                                                'id_permintaan_material'            => $id_permat_baru,
                                                'id_detail_purchase_order_customer' => $id_detpo,
                                                'id_line'                           => $idline,
                                                'jumlah_minta'                      => $jumlah_item,
                                                'tanggal_permintaan'                => $tgl_now,
                                                'tanggal_produksi'                  => $tgl,
                                                'status_permintaan'                 => 0,
                                                'user_add'                          => $user,
                                                'waktu_add'                         => $now,
                                                'status_delete'                     => 0
                                            );

                                            $this->M_PerencanaanProduksi->insert('permintaan_material',$data_permat);

                                            //DETAIL PERMINTAAN MATERIAL
                                            $konmat_tam    = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->result_array();
                                            $jm_konmat_tam = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->num_rows();

                                            for($b=0;$b<$jm_konmat_tam;$b++){
                                                //id_detail_permintaan_material
                                                $idcode_detpermat = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                                $id_detpermat_last     = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->result_array();
                                                $id_detpermat_last_cek = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->num_rows();
                                    
                                                if($id_detpermat_last_cek == 1){
                                                    $id_terakhirnya    = $id_detpermat_last[0]['id_detail_permintaan_material'];
                                    
                                                    $tahun_sebelumnya  = substr($id_terakhirnya,9,2);
                                                    $bulan_sebelumnya  = substr($id_terakhirnya,11,2);
                                                            
                                                    //kalau tahun sama
                                                    if($tahun_sebelumnya == $tahun_sekarangnya){
                                                        //kalau tahun & bulannya sama berarti count+1
                                                        if($bulan_sebelumnya == $bulan_sekarangnya){
                                                            $countnya = intval(substr($id_terakhirnya,14,6)) + 1;
                                                            $pjgnya   = strlen($countnya);
                                                
                                                            if($pjgnya == 1){
                                                                $countnya_baru = "00000".$countnya;
                                                            }
                                                            else if($pjgnya == 2){
                                                                $countnya_baru = "0000".$countnya;
                                                            }
                                                            else if($pjgnya == 3){
                                                                $countnya_baru = "000".$countnya;
                                                            }
                                                            else if($pjgnya == 4){
                                                                $countnya_baru = "00".$countnya;
                                                            }
                                                            else if($pjgnya == 5){
                                                                $countnya_baru = "0".$countnya;
                                                            }
                                                            else{
                                                                $countnya_baru = $countnya;
                                                            }
                                                            
                                                            //id yang baru
                                                            $id_detpermat_baru = "DETPERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                        }
                                                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                        else{
                                                            //id yang baru
                                                            $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                        }
                                                    }
                                                    //kalau tahun tidak sama
                                                    else{
                                                        //id yang baru
                                                        $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                    }
                                                }
                                                else{
                                                    //id yang baru
                                                    $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                }

                                                $id_konsumsi_material = $konmat_tam[$b]['id_konsumsi_material'];
                                                $jumlah_konsumsi      = $konmat_tam[$b]['jumlah_konsumsi'];
                                                $needs                = $jumlah_item * $jumlah_konsumsi;
                                                
                                                $data_detpermat = array (
                                                    'id_detail_permintaan_material'     => $id_detpermat_baru,
                                                    'id_permintaan_material'            => $id_permat_baru,
                                                    'id_konsumsi_material'              => $id_konsumsi_material,
                                                    'needs'                             => $needs,
                                                    'status_detail_permintaan_material' => 0,
                                                    'user_add'                          => $user,
                                                    'waktu_add'                         => $now,
                                                    'status_delete'                     => 0
                                                );

                                                $this->M_PerencanaanProduksi->insert('detail_permintaan_material',$data_detpermat);
                                            }
                                        } 
                                        //jika sebelumnya ada
                                        else if($jm_cari_permat != 0 && $jm_cari_permat != 4 && $jm_cari_permat != 5){
                                            $id_permat     = $cari_permat[0]['id_permintaan_material'];
                                            $jumlah_permat = $cari_permat[0]['jumlah_minta'];

                                            $jumlah_baru = $jumlah_permat + $jumlah_item;

                                            $data_permat = array(
                                                'jumlah_minta' => $jumlah_baru
                                            );

                                            $where_permat = array(
                                                'id_permintaan_material' => $id_permat
                                            );

                                            $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                            $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                            $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                            for($t=0;$t<$jm_det_permat;$t++){
                                                $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                                $needs = $jumlah_baru * $jumlah_konsumsi;

                                                $data_det_permat = array(
                                                    'needs' => $needs
                                                );

                                                $where_det_permat = array(
                                                    'id_detail_permintaan_material' => $id_det_permat
                                                );

                                                $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                            }
                                        }
                                    */
                                }
                                //tutup permat
                                }
                        }
                    }
                } 
                //lama, tidak memiliki perencanaan, hapus
                else if($keterangan_div == 2){
                    $jumlah_line = $this->input->post('jumlah_line'.$o);
                    
                    for($k=1;$k<=$jumlah_line;$k++){
                        $idline = $this->input->post($o.'id_line_kf'.$k);
        
                        for($z=1;$z<=7;$z++){
                            $jumlah_item_s   = $this->input->post('jm'.$o.$idline.'day'.$z);
                            $waktu_proses_s  = $this->input->post('ef'.$o.$idline.'day'.$z);
                            $id_det_prodline = $this->input->post('id_dpl'.$o.$idline.'day'.$z);

                            $get_old_detprodline      = $this->M_PerencanaanProduksi->get_one_detprodline($id_det_prodline)->result_array();
                            $jumlah_item_sebelum_edit = $get_old_detprodline[0]['jumlah_item_perencanaan'];

                            $tgl   = date('Y-m-d', strtotime('+'.($z-1).'days', strtotime($start_date)));
                            
                            if($jumlah_item_s != ""){
                                $jumlah_item = $jumlah_item_s;
                                $waktu_proses = $waktu_proses_s;
                            }
                            else{
                                $jumlah_item  = 0;
                                $waktu_proses = 0;
                            }

                            //DETAIL PRODUKSI LINE
                                $data_detprod = array(
                                    'status_delete'        => 1,
                                    'user_delete'          => $user,
                                    'waktu_delete'         => $now,
                                );

                                $where_detprod = array(
                                    'id_detail_produksi_line' => $id_det_prodline
                                );

                                $this->M_PerencanaanProduksi->edit('detail_produksi_line',$data_detprod,$where_detprod);
                            //tutup detprod
                            
                            //DETAIL PRODUKSI TERTUNDA
                                if($statper == 1){
                                    $dpt    = $this->M_PerencanaanProduksi->get_one_detprodtun($id_det_prodline)->result_array();
                                    $jm_dpt = $this->M_PerencanaanProduksi->get_one_detprodtun($id_det_prodline)->num_rows();

                                    if($jm_dpt > 0){
                                        $data_dpt = array(
                                            'status_delete' => 1,
                                            'user_delete'   => $user,
                                            'waktu_delete'  => $now
                                        );
    
                                        $where_dpt = array(
                                            'id_detail_produksi_tertunda' => $dpt[0]['id_detail_produksi_tertunda']
                                        );
    
                                        $this->M_PerencanaanProduksi->edit('detail_produksi_tertunda',$data_dpt,$where_dpt);
    
                                        //PRODUKSI TERTUNDA
                                        $id_pt      = $dpt[0]['id_produksi_tertunda'];
    
                                        $pt = $this->M_PerencanaanProduksi->get_one_prodtun($id_pt)->result_array();
    
                                        $jumlah_terencana =  $pt[0]['jumlah_terencana'] - $dpt[0]['jumlah_perencanaan'];
    
                                        if($jumlah_terencana > 0){
                                            $data_pt = array(
                                                'jumlah_terencana'   => $jumlah_terencana,
                                                'status_penjadwalan' => 1,
                                                'user_edit'          => $user,
                                                'waktu_edit'         => $now
                                            );
            
                                            $where_pt = array (
                                                'id_produksi_tertunda' => $id_pt 
                                            );
            
                                            $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                        } else if($jumlah_terencana == 0){
                                            $data_pt = array(
                                                'jumlah_terencana'   => $jumlah_terencana,
                                                'status_penjadwalan' => 0,
                                                'user_edit'          => $user,
                                                'waktu_edit'         => $now
                                            );
            
                                            $where_pt = array (
                                                'id_produksi_tertunda' => $id_pt 
                                            );
            
                                            $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                        }
                                    }
                                }  
                            //tutup detprodtun

                            //PERMINTAAN MATERIAL
                                $permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                $jm_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                if($jm_permat > 0){
                                    if($permat[0]['status_permintaan'] != 0 && $permat[0]['status_permintaan'] < 4){
                                        $jumlah_permat = $permat[0]['jumlah_minta'];
                                        $id_permat     = $permat[0]['id_permintaan_material'];
    
                                        //cek apakah sudah ada perubahan permintaan yang statusnya belum diproses (status 0)
                                        $cek_ubmin    = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->result_array();
                                        $jm_cek_ubmin = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->num_rows();
    
                                        $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
                                        $bulan_sekarang = date('m',strtotime($tgl));
                                        $id_code        = "UBMIN".$tahun_sekarang.$bulan_sekarang.".";
                            
                                        $last       = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->result_array();
                                        $last_cek   = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->num_rows();
                            
                                        //id
                                        if($last_cek == 1){
                                            $id_terakhir    = $last[0]['id_perubahan_permintaan'];
                            
                                            $tahun_sebelum  = substr($id_terakhir,5,2);
                                        
                                            $bulan_sebelum  = substr($id_terakhir,7,2);
                            
                                            //kalau tahun sama
                                            if($tahun_sebelum == $tahun_sekarang){
                                                //kalau tahun & bulannya sama berarti count+1
                                                if($bulan_sebelum == $bulan_sekarang){
                                                    $count = intval(substr($id_terakhir,10,3)) + 1;
                                                    $pjg   = strlen($count);
                            
                                                    if($pjg == 1){
                                                        $count_baru = "00".$count;
                                                    }
                                                    else if($pjg == 2){
                                                        $count_baru = "0".$count;
                                                    }
                                                    else{
                                                        $count_baru = $count;
                                                    }
                                                    
                                                    //id yang baru
                                                    $id_ubmin_baru = "UBMIN".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                                                }
                                                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                else{
                                                    //id yang baru
                                                    $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                                }
                                            }
                                            //kalau tahun tidak sama
                                            else{
                                                //id yang baru
                                                $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                            }
                                        }
                                        else{
                                            //id yang baru
                                            $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                        }  
    
                                        $data_ubmin = array(
                                            'id_perubahan_permintaan' => $id_ubmin_baru,
                                            'id_permintaan_material'  => $id_permat,
                                            'jumlah_minta_lama'       => $jumlah_permat,
                                            'jumlah_minta_baru'       => $jumlah_item_s,
                                            'status'                  => 0,
                                            'user_add'                => $user,
                                            'waktu_add'               => $now,
                                            'status_delete'           => 0
                                        );
    
                                        $this->M_PerencanaanProduksi->insert('perubahan_permintaan',$data_ubmin);
    
                                        if($jm_cek_ubmin > 0){
                                            //batal yang lama
                                            $data_ubmin = array(
                                                'status'    => 3,
                                                'user_edit' => $user,
                                                'waktu_edit'=> $now
                                            );
    
                                            $where_ubmin = array(
                                                'id_perubahan_permintaan' => $cek_ubmin[0]['id_perubahan_permintaan']
                                            );
    
                                            $this->M_PerencanaanProduksi->edit('perubahan_permintaan',$data_ubmin,$where_ubmin);
                                        } 
                                    } else if($permat[0]['status_permintaan'] == 0){
                                        $jumlah_permat = $permat[0]['jumlah_minta'];
                                        $id_permat     = $permat[0]['id_permintaan_material'];
    
                                        if($jumlah_item_sebelum_edit == $jumlah_permat){
                                            $data_permat = array(
                                                'status_delete' => 1
                                            );
    
                                            $where_permat = array(
                                                'id_permintaan_material' => $id_permat
                                            );
    
                                            $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);
    
                                            $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                            $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();
    
                                            for($t=0;$t<$jm_det_permat;$t++){
                                                $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];
    
                                                $data_det_permat = array(
                                                    'status_delete' => 1
                                                );
    
                                                $where_det_permat = array(
                                                    'id_detail_permintaan_material' => $id_det_permat
                                                );
    
                                                $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                            }                                    
                                        } 
                                        else if($jumlah_item_sebelum_edit < $jumlah_permat){
                                            $jumlah_minta_baru =  $jumlah_permat - $jumlah_item_sebelum_edit;
    
                                            $data_permat = array(
                                                'jumlah_minta' => $jumlah_minta_baru
                                            );
    
                                            $where_permat = array(
                                                'id_permintaan_material' => $id_permat
                                            );
    
                                            $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);
    
                                            $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                            $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();
    
                                            for($t=0;$t<$jm_det_permat;$t++){
                                                $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                                $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];
    
                                                $needs = $jumlah_minta_baru * $jumlah_konsumsi;
    
                                                $data_det_permat = array(
                                                    'needs' => $needs
                                                );
    
                                                $where_det_permat = array(
                                                    'id_detail_permintaan_material' => $id_det_permat
                                                );
    
                                                $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                            }                                    
                                        }
                                    }
                                }
                                
                                /*
                                    $permat    = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->result_array();
                                    $jm_permat = $this->M_PerencanaanProduksi->get_one_permat($tgl,$id_detpo,$idline)->num_rows();

                                    $jumlah_permat = $permat[0]['jumlah_minta']; 
                                    $id_permat     = $permat[0]['id_permintaan_material'];

                                    //cek apakah sudah ada perubahan permintaan yang statusnya belum diproses (status 0)
                                    $cek_ubmin    = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->result_array();
                                    $jm_cek_ubmin = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->num_rows();

                                    $selisih = $jumlah_item_sebelum_edit - $jumlah_item_s;

                                    $jumlah_minta_baru = $jumlah_permat - $selisih;

                                    $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
                                    $bulan_sekarang = date('m',strtotime($tgl));
                                    $id_code        = "UBMIN".$tahun_sekarang.$bulan_sekarang.".";
                        
                                    $last       = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->result_array();
                                    $last_cek   = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->num_rows();
                        
                                    //id
                                    if($last_cek == 1){
                                        $id_terakhir    = $last[0]['id_perubahan_permintaan'];
                        
                                        $tahun_sebelum  = substr($id_terakhir,5,2);
                                    
                                        $bulan_sebelum  = substr($id_terakhir,7,2);
                        
                                        //kalau tahun sama
                                        if($tahun_sebelum == $tahun_sekarang){
                                            //kalau tahun & bulannya sama berarti count+1
                                            if($bulan_sebelum == $bulan_sekarang){
                                                $count = intval(substr($id_terakhir,10,3)) + 1;
                                                $pjg   = strlen($count);
                        
                                                if($pjg == 1){
                                                    $count_baru = "00".$count;
                                                }
                                                else if($pjg == 2){
                                                    $count_baru = "0".$count;
                                                }
                                                else{
                                                    $count_baru = $count;
                                                }
                                                
                                                //id yang baru
                                                $id_ubmin_baru = "UBMIN".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                                            }
                                            //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                            else{
                                                //id yang baru
                                                $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                            }
                                        }
                                        //kalau tahun tidak sama
                                        else{
                                            //id yang baru
                                            $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                        }
                                    }
                                    else{
                                        //id yang baru
                                        $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                    }  

                                    $data_ubmin = array(
                                        'id_perubahan_permintaan' => $id_ubmin_baru,
                                        'id_permintaan_material'  => $id_permat,
                                        'jumlah_minta_lama'       => $jumlah_permat,
                                        'jumlah_minta_baru'       => $jumlah_minta_baru,
                                        'status'                  => 0,
                                        'user_add'                => $user,
                                        'waktu_add'               => $now,
                                        'status_delete'           => 0
                                    );

                                    $this->M_PerencanaanProduksi->insert('perubahan_permintaan',$data_ubmin);

                                    if($jm_cek_ubmin > 0){
                                        //batal yang lama
                                        $data_ubmin = array(
                                            'status'    => 3,
                                            'user_edit' => $user,
                                            'waktu_edit'=> $now
                                        );

                                        $where_ubmin = array(
                                            'id_perubahan_permintaan' => $cek_ubmin[0]['id_perubahan_permintaan']
                                        );

                                        $this->M_PerencanaanProduksi->edit('perubahan_permintaan',$data_ubmin,$where_ubmin);
                                    } 
                                */
                            //tutup permat  
                        }
                    }
                } 
                //add baru
                else if($keterangan_div == 1){
                    $id_detpo    = $this->input->post('id_bg3'.$o);
                    $jumlah_line = $this->input->post('jumlah_line'.$o);
                    
                    
                    for($k=1;$k<=$jumlah_line;$k++){
                        $idline = $this->input->post($o.'id_line_kf'.$k);
        
                        for($z=1;$z<=7;$z++){
                            $tanggal        = date('Y-m-d', strtotime('+'.($z-1).'days', strtotime($start_date)));
                            $jumlah_item_s  = $this->input->post('jm'.$o.$idline.'day'.$z);
                            $waktu_proses_s = $this->input->post('ef'.$o.$idline.'day'.$z);
                            
                            if($jumlah_item_s != ""){
                                $jumlah_item = $jumlah_item_s;
                                $waktu_proses = $waktu_proses_s;
                            }
                            else{
                                $jumlah_item  = 0;
                                $waktu_proses = 0;
                            }

                            
                            //cari id_produksi_line berdasarkan tanggal & line
                            $id_prodline_sesuai = $this->M_PerencanaanProduksi->cari_id_prodline($idline,$tanggal)->result_array();
                            $id_prodlinenya     = $id_prodline_sesuai[0]['id_produksi_line'];
                            
                            //id detail perencanaan produksi
                            $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
                            $bulan_sekarangnya = date('m',strtotime($tanggal));

                            $idcode_detprod_line = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".";

                            $id_detprodline_last     = $this->M_PerencanaanProduksi->get_last_detprodline_id($idcode_detprod_line)->result_array();
                            $id_detprodline_last_cek = $this->M_PerencanaanProduksi->get_last_detprodline_id($idcode_detprod_line)->num_rows();
                
                            if($id_detprodline_last_cek == 1){
                                $id_terakhirnya    = $id_detprodline_last[0]['id_detail_produksi_line'];
                
                                $tahun_sebelumnya  = substr($id_terakhirnya,3,2);
                                $bulan_sebelumnya  = substr($id_terakhirnya,5,2);
                                        
                                //kalau tahun sama
                                if($tahun_sebelumnya == $tahun_sekarangnya){
                                    //kalau tahun & bulannya sama berarti count+1
                                    if($bulan_sebelumnya == $bulan_sekarangnya){
                                        $countnya = intval(substr($id_terakhirnya,8,8)) + 1;
                                        $pjgnya   = strlen($countnya);
                            
                                        if($pjgnya == 1){
                                            $countnya_baru = "0000000".$countnya;
                                        }
                                        else if($pjgnya == 2){
                                            $countnya_baru = "000000".$countnya;
                                        }
                                        else if($pjgnya == 3){
                                            $countnya_baru = "00000".$countnya;
                                        }
                                        else if($pjgnya == 4){
                                            $countnya_baru = "0000".$countnya;
                                        }
                                        else if($pjgnya == 5){
                                            $countnya_baru = "000".$countnya;
                                        }
                                        else if($pjgnya == 6){
                                            $countnya_baru = "00".$countnya;
                                        }
                                        else if($pjgnya == 7){
                                            $countnya_baru = "0".$countnya;
                                        }
                                        else{
                                            $countnya_baru = $countnya;
                                        }
                                        
                                        //id yang baru
                                        $id_dpl_baru = "DPL".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                    }
                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                    else{
                                        //id yang baru
                                        $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                    }
                                }
                                //kalau tahun tidak sama
                                else{
                                    //id yang baru
                                    $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                }
                            }
                            else{
                                //id yang baru
                                $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                            }

                            //DETAIL PRODUKSI LINE
                            if($statper == 0){
                                $data_detprod = array(
                                    'id_detail_produksi_line'   => $id_dpl_baru,
                                    'id_detail_purchase_order'  => $id_detpo,
                                    'id_produksi_line'          => $id_prodlinenya,
                                    'jumlah_item_perencanaan'   => $jumlah_item,
                                    'waktu_proses_perencanaan'  => $waktu_proses,
                                    'status_perencanaan'        => 0,
                                    'status_aktual'             => 0,
                                    'user_add'                  => $user,
                                    'waktu_add'                 => $now,
                                    'status_delete'             => 0
                                );
                                $this->M_PerencanaanProduksi->insert('detail_produksi_line',$data_detprod);
                            } else{
                                $data_detprod = array(
                                    'id_detail_produksi_line'   => $id_dpl_baru,
                                    'id_detail_purchase_order'  => $id_detpo,
                                    'id_produksi_line'          => $id_prodlinenya,
                                    'jumlah_item_perencanaan'   => $jumlah_item,
                                    'waktu_proses_perencanaan'  => $waktu_proses,
                                    'status_perencanaan'        => 1,
                                    'status_aktual'             => 0,
                                    'user_add'                  => $user,
                                    'waktu_add'                 => $now,
                                    'status_delete'             => 0
                                );
                                $this->M_PerencanaanProduksi->insert('detail_produksi_line',$data_detprod);
                            }
                            
                            //PRODUKSI TERTUNDA
                            if($statper == 1 && $jumlah_item != 0){
                                    $id_prodtun  = $this->input->post('id_pt_bg3'.$o);
                                    $one_prodtun = $this->M_PerencanaanProduksi->get_one_prodtun($id_prodtun)->result_array();
                                    $jumlah_tertunda_sebelum  = $one_prodtun[0]['jumlah_tertunda'];
                                    $jumlah_terencana_sebelum = $one_prodtun[0]['jumlah_terencana'];
                                    
                                    //id produksi tunda produksi
                                    $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
                                    $bulan_sekarangnya = date('m',strtotime($tanggal));

                                    $idcode_dprodtun = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                    $id_dprodtun_last     = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->result_array();
                                    $id_dprodtun_last_cek = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->num_rows();

                                    if($id_dprodtun_last_cek == 1){
                                        $id_terakhirnya    = $id_dprodtun_last[0]['id_detail_produksi_tertunda'];

                                        $tahun_sebelumnya  = substr($id_terakhirnya,8,2);
                                        $bulan_sebelumnya  = substr($id_terakhirnya,10,2);
                                                
                                        //kalau tahun sama
                                        if($tahun_sebelumnya == $tahun_sekarangnya){
                                            //kalau tahun & bulannya sama berarti count+1
                                            if($bulan_sebelumnya == $bulan_sekarangnya){
                                                $countnya = intval(substr($id_terakhirnya,13,8)) + 1;
                                                $pjgnya   = strlen($countnya);
                                    
                                                if($pjgnya == 1){
                                                    $countnya_baru = "0000000".$countnya;
                                                }
                                                else if($pjgnya == 2){
                                                    $countnya_baru = "000000".$countnya;
                                                }
                                                else if($pjgnya == 3){
                                                    $countnya_baru = "00000".$countnya;
                                                }
                                                else if($pjgnya == 4){
                                                    $countnya_baru = "0000".$countnya;
                                                }
                                                else if($pjgnya == 5){
                                                    $countnya_baru = "000".$countnya;
                                                }
                                                else if($pjgnya == 6){
                                                    $countnya_baru = "00".$countnya;
                                                }
                                                else if($pjgnya == 7){
                                                    $countnya_baru = "0".$countnya;
                                                }
                                                else{
                                                    $countnya_baru = $countnya;
                                                }
                                                
                                                //id yang baru
                                                $id_dprodtun_baru = "DPRODTUN".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                            }
                                            //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                            else{
                                                //id yang baru
                                                $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                            }
                                        }
                                        //kalau tahun tidak sama
                                        else{
                                            //id yang baru
                                            $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                        }
                                    }
                                    else{
                                        //id yang baru
                                        $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                    }

                                    $data_detprodtun = array(
                                        'id_detail_produksi_tertunda' => $id_dprodtun_baru,
                                        'id_produksi_tertunda'        => $id_prodtun,
                                        'id_detail_produksi_line'     => $id_dpl_baru,
                                        'jumlah_perencanaan'          => $jumlah_item,
                                        'user_add'                    => $user,
                                        'waktu_add'                   => $now,
                                        'status_delete'               => 0
                                    );

                                    $this->M_PerencanaanProduksi->insert('detail_produksi_tertunda',$data_detprodtun);

                                    if($jumlah_item >0){
                                        $jumlahnya = $jumlah_terencana_sebelum +$jumlah_item;
                                        $sisanya   = $jumlah_tertunda_sebelum - $jumlah_terencana_sebelum;
                                        if($jumlah_item == $sisanya){
                                            $data_prodtun = array (
                                                'jumlah_terencana'   => $jumlahnya,
                                                'status_penjadwalan' => 2
                                            );

                                            $where_prodtun = array (
                                            'id_produksi_tertunda' => $id_prodtun  
                                            );

                                            $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
                                        } else{
                                            $data_prodtun = array (
                                                'jumlah_terencana'   => $jumlahnya,
                                                'status_penjadwalan' => 1
                                            );

                                            $where_prodtun = array (
                                            'id_produksi_tertunda' => $id_prodtun  
                                            );

                                            $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
                                        }
                                    }
                            }              

                            //PURCHASE ORDER CUSTOMER
                                $id_pos     = $this->M_PerencanaanProduksi->get_detail_po($id_detpo)->result_array();
                                $id_po_tam  = $id_pos[0]['id_purchase_order_customer'];

                                $data_po = array (
                                    'status_po' => 1,
                                    'user_edit' => $user,
                                    'waktu_edit'=> $now
                                );

                                $where_po = array (
                                    'id_purchase_order_customer' => $id_po_tam
                                );

                                $this->M_PerencanaanProduksi->edit('purchase_order_customer',$data_po,$where_po);
                            //tutup po
                            
                            //PERMINTAAN MATERIAL
                                if($jumlah_item != "" || $jumlah_item != 0){
                                    //cari apakah sudah ada sebelumnya permintaan material untuk tanggal,id_det_po_cust,id_line yangsama?
                                    $cari_permat    = $this->M_PerencanaanProduksi->get_one_permat($tanggal,$id_detpo,$idline)->result_array();
                                    $jm_cari_permat = $this->M_PerencanaanProduksi->get_one_permat($tanggal,$id_detpo,$idline)->num_rows();

                                    //jika sebelumnya belum ada
                                    if($jm_cari_permat == 0){
                                        //id detail perencanaan produksi
                                        $idcode_permat = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                        $id_permat_last     = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->result_array();
                                        $id_permat_last_cek = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->num_rows();
                            
                                        if($id_permat_last_cek == 1){
                                            $id_terakhirnya    = $id_permat_last[0]['id_permintaan_material'];
                            
                                            $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                                            $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                                                    
                                            //kalau tahun sama
                                            if($tahun_sebelumnya == $tahun_sekarangnya){
                                                //kalau tahun & bulannya sama berarti count+1
                                                if($bulan_sebelumnya == $bulan_sekarangnya){
                                                    $countnya = intval(substr($id_terakhirnya,11,5)) + 1;
                                                    $pjgnya   = strlen($countnya);
                                        
                                                    if($pjgnya == 1){
                                                        $countnya_baru = "0000".$countnya;
                                                    }
                                                    else if($pjgnya == 2){
                                                        $countnya_baru = "000".$countnya;
                                                    }
                                                    else if($pjgnya == 3){
                                                        $countnya_baru = "00".$countnya;
                                                    }
                                                    else if($pjgnya == 4){
                                                        $countnya_baru = "0".$countnya;
                                                    }
                                                    else{
                                                        $countnya_baru = $countnya;
                                                    }
                                                    
                                                    //id yang baru
                                                    $id_permat_baru = "PERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                }
                                                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                else{
                                                    //id yang baru
                                                    $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                                }
                                            }
                                            //kalau tahun tidak sama
                                            else{
                                                //id yang baru
                                                $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                            }
                                        }
                                        else{
                                            //id yang baru
                                            $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                        }

                                        $tgl_now = date('Y-m-d');
                                        
                                        $data_permat = array(
                                            'id_permintaan_material'            => $id_permat_baru,
                                            'id_detail_purchase_order_customer' => $id_detpo,
                                            'id_line'                           => $idline,
                                            'jumlah_minta'                      => $jumlah_item,
                                            'tanggal_permintaan'                => $tgl_now,
                                            'tanggal_produksi'                  => $tanggal,
                                            'status_permintaan'                 => 0,
                                            'user_add'                          => $user,
                                            'waktu_add'                         => $now,
                                            'status_delete'                     => 0
                                        );

                                        $this->M_PerencanaanProduksi->insert('permintaan_material',$data_permat);

                                        //DETAIL PERMINTAAN MATERIAL
                                        $konmat_tam    = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->result_array();
                                        $jm_konmat_tam = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->num_rows();

                                        for($b=0;$b<$jm_konmat_tam;$b++){
                                            //id_detail_permintaan_material
                                            $idcode_detpermat = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                            $id_detpermat_last     = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->result_array();
                                            $id_detpermat_last_cek = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->num_rows();
                                
                                            if($id_detpermat_last_cek == 1){
                                                $id_terakhirnya    = $id_detpermat_last[0]['id_detail_permintaan_material'];
                                
                                                $tahun_sebelumnya  = substr($id_terakhirnya,9,2);
                                                $bulan_sebelumnya  = substr($id_terakhirnya,11,2);
                                                        
                                                //kalau tahun sama
                                                if($tahun_sebelumnya == $tahun_sekarangnya){
                                                    //kalau tahun & bulannya sama berarti count+1
                                                    if($bulan_sebelumnya == $bulan_sekarangnya){
                                                        $countnya = intval(substr($id_terakhirnya,14,6)) + 1;
                                                        $pjgnya   = strlen($countnya);
                                            
                                                        if($pjgnya == 1){
                                                            $countnya_baru = "00000".$countnya;
                                                        }
                                                        else if($pjgnya == 2){
                                                            $countnya_baru = "0000".$countnya;
                                                        }
                                                        else if($pjgnya == 3){
                                                            $countnya_baru = "000".$countnya;
                                                        }
                                                        else if($pjgnya == 4){
                                                            $countnya_baru = "00".$countnya;
                                                        }
                                                        else if($pjgnya == 5){
                                                            $countnya_baru = "0".$countnya;
                                                        }
                                                        else{
                                                            $countnya_baru = $countnya;
                                                        }
                                                        
                                                        //id yang baru
                                                        $id_detpermat_baru = "DETPERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                                    }
                                                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                                    else{
                                                        //id yang baru
                                                        $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                    }
                                                }
                                                //kalau tahun tidak sama
                                                else{
                                                    //id yang baru
                                                    $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                                }
                                            }
                                            else{
                                                //id yang baru
                                                $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                            }

                                            $id_konsumsi_material = $konmat_tam[$b]['id_konsumsi_material'];
                                            $jumlah_konsumsi      = $konmat_tam[$b]['jumlah_konsumsi'];
                                            $needs                = $jumlah_item * $jumlah_konsumsi;
                                            
                                            $data_detpermat = array (
                                                'id_detail_permintaan_material'     => $id_detpermat_baru,
                                                'id_permintaan_material'            => $id_permat_baru,
                                                'id_konsumsi_material'              => $id_konsumsi_material,
                                                'needs'                             => $needs,
                                                'status_detail_permintaan_material' => 0,
                                                'user_add'                          => $user,
                                                'waktu_add'                         => $now,
                                                'status_delete'                     => 0
                                            );

                                            $this->M_PerencanaanProduksi->insert('detail_permintaan_material',$data_detpermat);
                                        }
                                    } 
                                    //jika sebelumnya ada
                                    else{
                                        $id_permat     = $cari_permat[0]['id_permintaan_material'];
                                        $jumlah_permat = $cari_permat[0]['jumlah_minta'];

                                        $jumlah_baru = $jumlah_permat + $jumlah_item;

                                        $data_permat = array(
                                            'jumlah_minta' => $jumlah_baru
                                        );

                                        $where_permat = array(
                                            'id_permintaan_material' => $id_permat
                                        );

                                        $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);

                                        $det_permat    = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->result_array();
                                        $jm_det_permat = $this->M_PerencanaanProduksi->get_detpermat_by_permat($id_permat)->num_rows();

                                        for($t=0;$t<$jm_det_permat;$t++){
                                            $jumlah_konsumsi = $det_permat[$t]['jumlah_konsumsi'];
                                            $id_det_permat   = $det_permat[$t]['id_detail_permintaan_material'];

                                            $needs = $jumlah_baru * $jumlah_konsumsi;

                                            $data_det_permat = array(
                                                'needs' => $needs
                                            );

                                            $where_det_permat = array(
                                                'id_detail_permintaan_material' => $id_det_permat
                                            );

                                            $this->M_PerencanaanProduksi->edit('detail_permintaan_material',$data_det_permat,$where_det_permat);
                                        }
                                    }
                                }
                            //tutup permat
                        }
                    }
                }
            }
        //tutup detail produksi line

        redirect('perencanaanProduksi/semua_perencanaan_produksi');
    }

    public function delete_perencanaan_produksi(){
        $id_produksi = $this->input->post('id_produksi');
        $user        = $_SESSION['id_user'];
        $now         = date('Y-m-d H:i:s'); 

        $tgl  = $this->M_PerencanaanProduksi->get_tanggal_produksi($id_produksi)->result_array();
        $awal = $tgl[0]['tanggal_awal'];

        //PRODUKSI
        $id_prod   = $this->M_PerencanaanProduksi->get_semua_idprod($awal)->result_array();
        $jmid_prod = $this->M_PerencanaanProduksi->get_semua_idprod($awal)->num_rows();

        $id_awal  = "";
        $id_akhir = "";
        
        //loop 7x
        for($i=0;$i<$jmid_prod;$i++){
            $id_produksinya   = $id_prod[$i]['id_produksi'];
            $tanggal_produksi = $id_prod[$i]['tanggal'];
           
            if($i == 0){
                $id_awal = $id_produksinya;
            }
            if($i == 6){
                $id_akhir = $id_produksinya;
            }

            $data_prod = array (
                'user_edit'     => $user,
                'waktu_edit'    => $now,
                'status_delete' => 1
            );

            $where_prod = array (
                'id_produksi' => $id_produksinya
            );

            $this->M_PerencanaanProduksi->edit('produksi',$data_prod,$where_prod);
            
            //PRODUKSI LINE
            $prodline   = $this->M_PerencanaanProduksi->get_semua_prodline($id_awal,$id_akhir)->result_array();
            $jmprodline = $this->M_PerencanaanProduksi->get_semua_prodline($id_awal,$id_akhir)->num_rows();

            $id_awal_prodline  = "";
            $id_akhir_prodline = "";

            for($t=0;$t<$jmprodline;$t++){
                $id_produksi_linenya = $prodline[$t]['id_produksi_line'];

                if($t == 0){
                    $id_awal_prodline = $id_produksi_linenya;
                }
                if($t == 27){
                    $id_akhir_prodline = $id_produksi_linenya;
                }

                $data_produksi_line = array(
                    'user_edit'     => $user,
                    'waktu_edit'    => $now,
                    'status_delete' => 1
                );

                $where_produksi_line = array(
                    'id_produksi_line' => $id_produksi_linenya
                );

                $this->M_PerencanaanProduksi->edit('produksi_line',$data_produksi_line,$where_produksi_line);

                //SURAT PERINTAH LEMBUR
                    $tanggal_spl = $prodline[$t]['tanggal'];
                    $id_line_spl = $prodline[$t]['id_line'];

                    $spl_cek   = $this->M_SuratPerintahLembur->cari_spl($tanggal_spl,$id_line_spl)->result_array();
                    $jmspl_cek = $this->M_SuratPerintahLembur->cari_spl($tanggal_spl,$id_line_spl)->num_rows();

                    if($jmspl_cek > 0){
                        //jika hanya berdasarkan perencanaan produksi, status deletenya = 0
                        if($spl_cek[0]['keterangan_spl'] == 0){
                            $data_spl = array(
                                'user_delete'  => $user,
                                'waktu_delete' => $now,
                                'status_delete'=> 1
                            );

                            $where_spl = array (
                                'id_surat_perintah_lembur' => $spl_cek[0]['id_surat_perintah_lembur']
                            );
    
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                        //jika berdasarkan perencanaan produksi & others, ubah keterangan spl menjadi 1
                        else if($spl_cek[0]['keterangan_spl'] == 2){
                            $data_spl = array(
                                'keterangan_spl'=> 1,
                                'user_edit'     => $user,
                                'waktu_edit'    => $now
                            );
                           
                            $where_spl = array (
                                'id_surat_perintah_lembur' => $spl_cek[0]['id_surat_perintah_lembur']
                            );
    
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                    }
                //

                //DETAIL PRODUKSI LINE
                    $detprodline   = $this->M_PerencanaanProduksi->get_semua_detprodline($id_awal_prodline,$id_akhir_prodline)->result_array();
                    $jmdetprodline = $this->M_PerencanaanProduksi->get_semua_detprodline($id_awal_prodline,$id_akhir_prodline)->num_rows();
                
                    for($y=0;$y<$jmdetprodline;$y++){
                        $id_detail_produksi_linenya = $detprodline[$y]['id_detail_produksi_line'];
        
                        $data_detail_produksi_line = array (
                            'user_edit'     => $user,
                            'waktu_edit'    => $now,
                            'status_delete' => 1
                        );
        
                        $where_detail_produksi_line = array (
                            'id_detail_produksi_line' =>  $id_detail_produksi_linenya
                        );
        
                        $this->M_PerencanaanProduksi->edit('detail_produksi_line',$data_detail_produksi_line,$where_detail_produksi_line);
                        
                        //PRODUKSI TERTUNDA
                            if($detprodline[$y]['status_perencanaan'] == 1){
                                $dpt    = $this->M_PerencanaanProduksi->get_one_detprodtun($id_detail_produksi_linenya)->result_array();
                                $jm_dpt = $this->M_PerencanaanProduksi->get_one_detprodtun($id_detail_produksi_linenya)->num_rows();

                                if($jm_dpt > 0){
                                    $data_dpt = array(
                                        'status_delete' => 1,
                                        'user_delete'   => $user,
                                        'waktu_delete'  => $now
                                    );
    
                                    $where_dpt = array(
                                        'id_detail_produksi_tertunda' => $dpt[0]['id_detail_produksi_tertunda']
                                    );
    
                                    $this->M_PerencanaanProduksi->edit('detail_produksi_tertunda',$data_dpt,$where_dpt);
    
                                    $id_pt      = $dpt[0]['id_produksi_tertunda'];
    
                                    $pt = $this->M_PerencanaanProduksi->get_one_prodtun($id_pt)->result_array();
    
                                    $jumlah_terencana =  $pt[0]['jumlah_terencana'] - $dpt[0]['jumlah_perencanaan'];
    
                                    if($jumlah_terencana > 0){
                                        $data_pt = array(
                                            'jumlah_terencana'   => $jumlah_terencana,
                                            'status_penjadwalan' => 1,
                                            'user_edit'          => $user,
                                            'waktu_edit'         => $now
                                        );
        
                                        $where_pt = array (
                                            'id_produksi_tertunda' => $id_pt 
                                        );
        
                                        $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                    } else if($jumlah_terencana == 0){
                                        $data_pt = array(
                                            'jumlah_terencana'   => $jumlah_terencana,
                                            'status_penjadwalan' => 0,
                                            'user_edit'          => $user,
                                            'waktu_edit'         => $now
                                        );
        
                                        $where_pt = array (
                                            'id_produksi_tertunda' => $id_pt 
                                        );
        
                                        $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                    }
                                }
                               
                            }
                        //tutup prodtun
                        
                        //PERMINTAAN MATERIAL
                        if($detprodline[$y]['jumlah_item_perencanaan'] > 0){
                            /*
                                $tanggal_produksi =  $detprodline[$y]['tanggal'];
                                $id_det_po        =  $detprodline[$y]['id_detail_purchase_order'];
                                $id_line          =  $detprodline[$y]['id_line'];

                                $permat    = $this->M_PerencanaanProduksi->get_one_permat($tanggal_produksi,$id_det_po,$id_line)->result_array();
                                $id_permat = $permat[0]['id_permintaan_material'];
                        
                                $data_permat = array(
                                    'status_delete' => 1,
                                    'user_delete'   => $user,
                                    'waktu_delete'  => $now
                                );

                                $where_permat = array(
                                    'id_permintaan_material' => $id_permat
                                );

                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);
                                $this->M_PerencanaanProduksi->delete_detpermat($id_permat);
                            */
                            $tanggal_produksi =  $detprodline[$y]['tanggal'];
                            $id_det_po        =  $detprodline[$y]['id_detail_purchase_order'];
                            $id_line          =  $detprodline[$y]['id_line'];

                            $permat    = $this->M_PerencanaanProduksi->M_PerencanaanProduksi->get_one_permat($tanggal_produksi,$id_det_po,$id_line)->result_array();
                            $jm_permat = $this->M_PerencanaanProduksi->M_PerencanaanProduksi->get_one_permat($tanggal_produksi,$id_det_po,$id_line)->num_rows();
                            
                            if($permat[0]['status_permintaan'] == 0){
                                $tanggal_produksi =  $detprodline[$y]['tanggal'];
                                $id_det_po        =  $detprodline[$y]['id_detail_purchase_order'];
                                $id_line          =  $detprodline[$y]['id_line'];

                                $permat    = $this->M_PerencanaanProduksi->get_one_permat($tanggal_produksi,$id_det_po,$id_line)->result_array();
                                $id_permat = $permat[0]['id_permintaan_material'];
                        
                                $data_permat = array(
                                    'status_delete' => 1,
                                    'user_delete'   => $user,
                                    'waktu_delete'  => $now
                                );

                                $where_permat = array(
                                    'id_permintaan_material' => $id_permat
                                );

                                $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);
                                $this->M_PerencanaanProduksi->delete_detpermat($id_permat);
                            } else if($permat[0]['status_permintaan'] == 1 || $permat[0]['status_permintaan'] == 2){
                                $jumlah_permat = $permat[0]['jumlah_minta'];
                                $id_permat     = $permat[0]['id_permintaan_material'];

                                //cek apakah sudah ada perubahan permintaan yang statusnya belum diproses (status 0)
                                $cek_ubmin    = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->result_array();
                                $jm_cek_ubmin = $this->M_PerencanaanProduksi->cek_ubmin($id_permat)->num_rows();

                                $tahun_sekarang = substr(date('Y',strtotime($now)),2,2);
                                $bulan_sekarang = date('m',strtotime($now));
                                $id_code        = "UBMIN".$tahun_sekarang.$bulan_sekarang.".";
                    
                                $last       = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->result_array();
                                $last_cek   = $this->M_PerencanaanProduksi->get_last_ubmin_id($id_code)->num_rows();
                    
                                //id
                                if($last_cek == 1){
                                    $id_terakhir    = $last[0]['id_perubahan_permintaan'];
                    
                                    $tahun_sebelum  = substr($id_terakhir,5,2);
                                
                                    $bulan_sebelum  = substr($id_terakhir,7,2);
                    
                                    //kalau tahun sama
                                    if($tahun_sebelum == $tahun_sekarang){
                                        //kalau tahun & bulannya sama berarti count+1
                                        if($bulan_sebelum == $bulan_sekarang){
                                            $count = intval(substr($id_terakhir,10,3)) + 1;
                                            $pjg   = strlen($count);
                    
                                            if($pjg == 1){
                                                $count_baru = "00".$count;
                                            }
                                            else if($pjg == 2){
                                                $count_baru = "0".$count;
                                            }
                                            else{
                                                $count_baru = $count;
                                            }
                                            
                                            //id yang baru
                                            $id_ubmin_baru = "UBMIN".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                                        }
                                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                        else{
                                            //id yang baru
                                            $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                        }
                                    }
                                    //kalau tahun tidak sama
                                    else{
                                        //id yang baru
                                        $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                    }
                                }
                                else{
                                    //id yang baru
                                    $id_ubmin_baru = "UBMIN".$tahun_sekarang.$bulan_sekarang.".001";
                                }  

                                $data_ubmin = array(
                                    'id_perubahan_permintaan' => $id_ubmin_baru,
                                    'id_permintaan_material'  => $id_permat,
                                    'jumlah_minta_lama'       => $jumlah_permat,
                                    'jumlah_minta_baru'       => 0,
                                    'status'                  => 0,
                                    'user_add'                => $user,
                                    'waktu_add'               => $now,
                                    'status_delete'           => 0
                                );

                                $this->M_PerencanaanProduksi->insert('perubahan_permintaan',$data_ubmin);

                                if($jm_cek_ubmin > 0){
                                    //batal yang lama
                                    $data_ubmin = array(
                                        'status'    => 3,
                                        'user_edit' => $user,
                                        'waktu_edit'=> $now
                                    );

                                    $where_ubmin = array(
                                        'id_perubahan_permintaan' => $cek_ubmin[0]['id_perubahan_permintaan']
                                    );

                                    $this->M_PerencanaanProduksi->edit('perubahan_permintaan',$data_ubmin,$where_ubmin);
                                }
                            }
                            
                        }
                    }
            }
        }
        redirect('perencanaanProduksi/semua_perencanaan_produksi');
    }

    public function semua_perencanaan_produksi(){
        $data['line'] = $this->M_Line->select_all_aktif()->result();

        //select semua perencanaan yang status deletenya = 0
        $data['monday']       = $this->M_PerencanaanProduksi->select_all_monday()->result();
        $data['count_monday'] = $this->M_PerencanaanProduksi->select_all_monday()->num_rows();
        $data['now']          = date('Y-m-d');

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

        $this->load->view('v_perencanaan_produksi_semua',$data);
    }

    public function perencanaan_produksi_line0(){
        $data['line'] = $this->M_Line->select_all_aktif()->result();

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

        $this->load->view('v_perencanaan_produksi_line0',$data);
    }

    public function perencanaan_produksi_line(){
        $data['line'] = $this->M_Line->select_all_aktif()->result();
        $data['now']  = date('Y-m-d');
        //select semua perencanaan yang status deletenya = 0

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $data['linenya'] = "Line Cutting";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $data['linenya'] = "Line Bonding";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $data['linenya'] = "Line Sewing";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $data['linenya'] = "Line Assy";
        } else{
            $data['linenya'] = $this->input->post('select_line');
        }

        $data['monday']       = $this->M_PerencanaanProduksi->select_all_monday()->result();
        $data['count_monday'] = $this->M_PerencanaanProduksi->select_all_monday()->num_rows();

        $data['status_monday'] = $this->M_PerencanaanProduksi->select_status_monday($data['linenya'])->result();

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

        $this->load->view('v_perencanaan_produksi_line',$data);
    }
    
    public function print_perencanaan_produksi(){
        $id = $this->input->post('id');

        $data['nama_perusahaan'] = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();

        $date   = $this->M_PerencanaanProduksi->get_tanggal_produksi($id)->result_array();
        $start  = $date[0]['tanggal_awal'];
        $end    = $date[0]['tanggal_akhir'];

        $start_month = date('F',strtotime($start));
        $end_month = date('F',strtotime($end));

        if($start_month == $end_month){
            $data['tanggalnya'] = "(".$start_month.")";
        }
        else{
            $data['tanggalnya'] = "(".$start_month."-".$end_month.")";
        }

        $data['semua_tanggal'] = $this->M_PerencanaanProduksi->get_semua_tanggal($start)->result_array();
        for($i=0;$i<7;$i++){
            $data['day'][$i] = intval(date('d', strtotime($data['semua_tanggal'][$i]['tanggal'])));
        }

        $data['pl']         = $this->M_PerencanaanProduksi->get_pl($start)->result();

        $data['dpo']        = $this->M_PerencanaanProduksi->get_dpo_normal($start)->result_array();
        $data['jm_dpo']     = $this->M_PerencanaanProduksi->get_dpo_normal($start)->num_rows();
        $data['dpl']        = $this->M_PerencanaanProduksi->get_dpl_normal($start)->result_array();
        $data['jm_dpl']     = $this->M_PerencanaanProduksi->get_dpl_normal($start)->num_rows();

        $data['dpore']      = $this->M_PerencanaanProduksi->get_dpo_re($start)->result_array();
        $data['jm_dpore']   = $this->M_PerencanaanProduksi->get_dpo_re($start)->num_rows();
        $data['dplre']      = $this->M_PerencanaanProduksi->get_dpl_re($start)->result_array();
        $data['jm_dplre']   = $this->M_PerencanaanProduksi->get_dpl_re($start)->num_rows();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $data['jumlah_ct']   = $this->M_PerencanaanProduksi->get_all_jumlah_ct()->result_array();
        $data['jm_jumlah_ct']= $this->M_PerencanaanProduksi->get_all_jumlah_ct()->num_rows();

        $data['semua_ct']    = $this->M_PerencanaanProduksi->get_semua_ct()->result_array();
        $data['jm_semua_ct'] = $this->M_PerencanaanProduksi->get_semua_ct()->num_rows();

        $this->load->view('v_print_perencanaan_produksi', $data);
    }

    public function print_perencanaan_produksi_line(){
        $id = $this->input->post('id');

        $data['nama_perusahaan'] = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $data['linenya'] = "Line Cutting";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $data['linenya'] = "Line Bonding";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $data['linenya'] = "Line Sewing";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $data['linenya'] = "Line Assy";
        } else{
            $data['linenya'] = $this->input->post('nama_line');
        }

        $date   = $this->M_PerencanaanProduksi->get_tanggal_produksi($id)->result_array();
        $start  = $date[0]['tanggal_awal'];
        $end    = $date[0]['tanggal_akhir'];

        $start_month = date('F',strtotime($start));
        $end_month = date('F',strtotime($end));

        if($start_month == $end_month){
            $data['tanggalnya'] = "(".$start_month.")";
        }
        else{
            $data['tanggalnya'] = "(".$start_month."-".$end_month.")";
        }

        $data['semua_tanggal'] = $this->M_PerencanaanProduksi->get_semua_tanggal($start)->result_array();
        for($i=0;$i<7;$i++){
            $data['day'][$i] = intval(date('d', strtotime($data['semua_tanggal'][$i]['tanggal'])));
        }

        $data['dpo']        = $this->M_PerencanaanProduksi->get_dpo_normal($start)->result_array();
        $data['jm_dpo']     = $this->M_PerencanaanProduksi->get_dpo_normal($start)->num_rows();
        $data['dpl']        = $this->M_PerencanaanProduksi->get_dpl_normal($start)->result_array();
        $data['jm_dpl']     = $this->M_PerencanaanProduksi->get_dpl_normal($start)->num_rows();

        $data['dpore']      = $this->M_PerencanaanProduksi->get_dpo_re($start)->result_array();
        $data['jm_dpore']   = $this->M_PerencanaanProduksi->get_dpo_re($start)->num_rows();
        $data['dplre']      = $this->M_PerencanaanProduksi->get_dpl_re($start)->result_array();
        $data['jm_dplre']   = $this->M_PerencanaanProduksi->get_dpl_re($start)->num_rows();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $data['semua_ct']    = $this->M_PerencanaanProduksi->get_semua_ct()->result_array();
        $data['jm_semua_ct'] = $this->M_PerencanaanProduksi->get_semua_ct()->num_rows();

        $data['perc_line']    = $this->M_PerencanaanProduksi->get_semua_perc_line($start,$data['linenya'])->result_array();
        $data['jm_perc_line'] = $this->M_PerencanaanProduksi->get_semua_perc_line($start,$data['linenya'])->num_rows();

        $this->load->view('v_print_perencanaan_produksi_line',$data);
    }

    public function print_perencanaan_produksi_linex(){
        $id = $this->input->post('id');

        $nama_perusahaan = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();

        $pdf = new FPDF('l','mm','A4');

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $linenya = "Line Cutting";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $linenya = "Line Bonding";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $linenya = "Line Sewing";
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $linenya = "Line Assy";
        } else{
            $linenya = $this->input->post('nama_line');
        }

        $date   = $this->M_PerencanaanProduksi->get_tanggal_produksi($id)->result_array();
        $start  = $date[0]['tanggal_awal'];
        $end    = $date[0]['tanggal_akhir'];
        $data['start']  = $date[0]['tanggal_awal'];

        $start_month = date('F',strtotime($start));
        $end_month = date('F',strtotime($end));

        if($start_month == $end_month){
            $tanggalnya = "(".$start_month.")";
        }
        else{
            $tanggalnya = "(".$start_month."-".$end_month.")";
        }

        $semua_tanggal      = $this->M_PerencanaanProduksi->get_semua_tanggal($start)->result_array();
        for($i=0;$i<7;$i++){
            $day[$i] = intval(date('d', strtotime($semua_tanggal[$i]['tanggal'])));
        }

        $dpo        = $this->M_PerencanaanProduksi->get_dpo_normal($start)->result_array();
        $jm_dpo     = $this->M_PerencanaanProduksi->get_dpo_normal($start)->num_rows();
        $dpl        = $this->M_PerencanaanProduksi->get_dpl_normal($start)->result_array();
        $jm_dpl     = $this->M_PerencanaanProduksi->get_dpl_normal($start)->num_rows();

        $dpore      = $this->M_PerencanaanProduksi->get_dpo_re($start)->result_array();
        $jm_dpore   = $this->M_PerencanaanProduksi->get_dpo_re($start)->num_rows();
        $dplre      = $this->M_PerencanaanProduksi->get_dpl_re($start)->result_array();
        $jm_dplre   = $this->M_PerencanaanProduksi->get_dpl_re($start)->num_rows();

        $warna      = $this->M_Warna->select_all_aktif()->result_array();
        $jmwarna    = $this->M_Warna->select_all_aktif()->num_rows();
        $ukuran     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $jmukuran   = $this->M_UkuranProduk->select_all_aktif()->num_rows();


        //buat halaman baru
        $pdf->AddPage();

        //logo
        $pdf->Image(base_url('assets/images/logombp.png'),7,7,-300);

        //setting font
        $pdf->SetFont('Arial','B','12');
        //cetak string
        $pdf->Cell(15); //move
        $pdf->Cell(190,7,strtoupper($nama_perusahaan[0]['isi_tetapan']),0,1,'L');
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(15);
        $pdf->Cell(190,7,'PERENCANAAN PRODUKSI '.$linenya.' '.$tanggalnya,0,1,'L');
        

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,10,' ',0,1,'C');
        $pdf->Cell(10,10,'NO',1,0,'C');
        $pdf->Cell(90,10,'NAMA PRODUK',1,0,'C');
        $pdf->Cell(20,10,'QTY',1,0,'C');
        $pdf->Cell(30,10,'KET',1,0,'C');
        for($i=0;$i<7;$i++){
            $pdf->Cell(15,10,$day[$i],1,0,'C');
         }
        $pdf->Cell(20,10,'TOTAL',1,1,'C');

            
        for($k=0;$k<$jm_dpo;$k++){
            $cekcek = $this->M_PerencanaanProduksi->cekcek($start,$dpo[$k]['id_detail_purchase_order'],$linenya)->result_array();
            
            $ct    = $this->M_PerencanaanProduksi->get_ct($dpo[$k]['id_produk'])->result_array();
            $jm_ct = $this->M_PerencanaanProduksi->get_ct($dpo[$k]['id_produk'])->num_rows();

            $id_dpo = $dpo[$k]['id_detail_purchase_order'];

            if($cekcek[0]['total'] > 0){
                $pdf->SetFont('Arial','',10);
                //nama produk
                if($dpo[$k]['keterangan'] == 0){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpo[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }
    
                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpo[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                        }
                    }
    
                    $nama_produk = $dpo[$k]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
                }
                else if($dpo[$k]['keterangan'] == 1){
                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpo[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                        }
                    }
    
                    $nama_produk = $dpo[$k]['nama_produk'] . $nama_ukuran;
                }
                else if($dpo[$k]['keterangan'] == 2){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpo[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }
    
                    $nama_produk = $dpo[$k]['nama_produk'] . " (" . $nama_warna . ")";
                }
                else{
                    $nama_produk = $dpo[$k]['nama_produk'];
                }
    
                $pdf->Cell(10,12,($k+1),1,0,'C');
                $pdf->Cell(90,12,$nama_produk,1,0,'C');
                $pdf->Cell(20,12,$dpo[$k]['jumlah_produk'],1,0,'C');
                
                for($o=0;$o<$jm_ct;$o++){
                    if($ct[$o]['nama_line'] == $linenya){
    
                        $id_line = $ct[$o]['id_line'];
                        $total[$o] = 0;
    
                        $pdf->Cell(30,6,"Perencanaan",1,0,'C');
    
                        for($u=0;$u<7;$u++){
                            for($q=0;$q<$jm_dpl;$q++){
                                $id_dpo_dpl  = $dpl[$q]['id_detail_purchase_order'];
                                $id_line_dpl = $dpl[$q]['id_line'];
                                $tgl_dpl     = $dpl[$q]['tanggal'];
    
                                $tanggal_cek = $semua_tanggal[$u]['tanggal'];
    
                                if($id_dpo_dpl == $id_dpo && $id_line_dpl == $id_line && $tgl_dpl == $tanggal_cek){
                                    if($dpl[$q]['jumlah_item_perencanaan'] == 0){
                                        $pdf->Cell(15,6,'',1,0,'C');
                                    }
                                    else{
                                        $pdf->Cell(15,6,$dpl[$q]['jumlah_item_perencanaan'],1,0,'C');
                                        $total[$o] = $total[$o] + intval($dpl[$q]['jumlah_item_perencanaan']);
                                    }
                                }
                            }
                        }
                        if($total[$o] == 0){
                            $pdf->Cell(20,6,'-',1,0,'C');
                        }
                        else{
                            $pdf->Cell(20,6,$total[$o],1,0,'C');
                        }
                    }
                }
    
                $pdf->Cell(5,6,'',0,1,'C');
                $pdf->Cell(10,6,'',0,0,'C');
                $pdf->Cell(90,6,'',0,0,'C');
                $pdf->Cell(20,6,'',0,0,'C');
                $pdf->Cell(30,6,'Aktual',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(20,6,'',1,1,'C');
            }
        }

        $count = $jm_dpo+1;

        for($k=0;$k<$jm_dpore;$k++){
            $cekcek = $this->M_PerencanaanProduksi->cekcek($start,$dpore[$k]['id_detail_purchase_order'],$linenya)->result_array();
            
            $ct    = $this->M_PerencanaanProduksi->get_ct($dpore[$k]['id_produk'])->result_array();
            $jm_ct = $this->M_PerencanaanProduksi->get_ct($dpore[$k]['id_produk'])->num_rows();

            $id_dpo = $dpore[$k]['id_detail_purchase_order'];

            if($cekcek[0]['total'] > 0){
                $pdf->SetFont('Arial','',10);
                //nama produk
                if($dpore[$k]['keterangan'] == 0){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpore[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }
    
                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpore[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                        }
                    }
    
                    $nama_produk = $dpore[$k]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
                }
                else if($dpore[$k]['keterangan'] == 1){
                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpore[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                        }
                    }
    
                    $nama_produk = $dpore[$k]['nama_produk'] . $nama_ukuran;
                }
                else if($dpore[$k]['keterangan'] == 2){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpore[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }
    
                    $nama_produk = $dpore[$k]['nama_produk'] . " (" . $nama_warna . ")";
                }
                else{
                    $nama_produk = $dpore[$k]['nama_produk'];
                }
    
                $pdf->Cell(10,12,$count,1,0,'C');
                $pdf->Cell(90,12,$nama_produk,1,0,'C');
                $pdf->Cell(20,12,$dpore[$k]['jumlah_tertunda'],1,0,'C');
                
                for($o=0;$o<$jm_ct;$o++){
                    if($ct[$o]['nama_line'] == $linenya){
    
                        $id_line = $ct[$o]['id_line'];
                        $total[$o] = 0;
    
                        $pdf->Cell(30,6,"Perencanaan",1,0,'C');
    
                        for($u=0;$u<7;$u++){
                            for($q=0;$q<$jm_dplre;$q++){
                                $id_dpo_dpl  = $dplre[$q]['id_detail_purchase_order'];
                                $id_line_dpl = $dplre[$q]['id_line'];
                                $tgl_dpl     = $dplre[$q]['tanggal'];
    
                                $tanggal_cek = $semua_tanggal[$u]['tanggal'];
    
                                if($id_dpo_dpl == $id_dpo && $id_line_dpl == $id_line && $tgl_dpl == $tanggal_cek){
                                    if($dplre[$q]['jumlah_item_perencanaan'] == 0){
                                        $pdf->Cell(15,6,'',1,0,'C');
                                    }
                                    else{
                                        $pdf->Cell(15,6,$dplre[$q]['jumlah_item_perencanaan'],1,0,'C');
                                        $total[$o] = $total[$o] + intval($dplre[$q]['jumlah_item_perencanaan']);
                                    }
                                }
                            }
                        }
                        if($total[$o] == 0){
                            $pdf->Cell(20,6,'-',1,0,'C');
                        }
                        else{
                            $pdf->Cell(20,6,$total[$o],1,0,'C');
                        }
                    }
                }
    
                $pdf->Cell(5,6,'',0,1,'C');
                $pdf->Cell(10,6,'',0,0,'C');
                $pdf->Cell(90,6,'',0,0,'C');
                $pdf->Cell(20,6,'',0,0,'C');
                $pdf->Cell(30,6,'Aktual',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(15,6,'',1,0,'C');
                $pdf->Cell(20,6,'',1,1,'C');

                $count++;
            }
        }

        $pdf->Output();
    }

    public function print_perencanaan_produksix(){
        $id = $this->input->post('id');

        $nama_perusahaan = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();

        $date   = $this->M_PerencanaanProduksi->get_tanggal_produksi($id)->result_array();
        $start  = $date[0]['tanggal_awal'];
        $end    = $date[0]['tanggal_akhir'];

        $start_month = date('F',strtotime($start));
        $end_month = date('F',strtotime($end));

        if($start_month == $end_month){
            $tanggalnya = "(".$start_month.")";
        }
        else{
            $tanggalnya = "(".$start_month."-".$end_month.")";
        }

        $semua_tanggal      = $this->M_PerencanaanProduksi->get_semua_tanggal($start)->result_array();
        for($i=0;$i<7;$i++){
            $day[$i] = intval(date('d', strtotime($semua_tanggal[$i]['tanggal'])));
        }

        $pl         = $this->M_PerencanaanProduksi->get_pl($start)->result();

        $dpo        = $this->M_PerencanaanProduksi->get_dpo_normal($start)->result_array();
        $jm_dpo     = $this->M_PerencanaanProduksi->get_dpo_normal($start)->num_rows();
        $dpl        = $this->M_PerencanaanProduksi->get_dpl_normal($start)->result_array();
        $jm_dpl     = $this->M_PerencanaanProduksi->get_dpl_normal($start)->num_rows();

        $dpore      = $this->M_PerencanaanProduksi->get_dpo_re($start)->result_array();
        $jm_dpore   = $this->M_PerencanaanProduksi->get_dpo_re($start)->num_rows();
        $dplre      = $this->M_PerencanaanProduksi->get_dpl_re($start)->result_array();
        $jm_dplre   = $this->M_PerencanaanProduksi->get_dpl_re($start)->num_rows();

        $warna      = $this->M_Warna->select_all_aktif()->result_array();
        $jmwarna    = $this->M_Warna->select_all_aktif()->num_rows();
        $ukuran     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $jmukuran   = $this->M_UkuranProduk->select_all_aktif()->num_rows();
        
        $pdf = new FPDF('l','mm','A4');
        //buat halaman baru
        $pdf->AddPage();

        //logo
        $pdf->Image(base_url('assets/images/logombp.png'),7,7,-300);

        //setting font
        $pdf->SetFont('Arial','B','12');
        //cetak string
        $pdf->Cell(15); //move
        $pdf->Cell(190,7,strtoupper($nama_perusahaan[0]['isi_tetapan']),0,1,'L');
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(15);
        $pdf->Cell(190,7,'PERENCANAAN PRODUKSI '.$tanggalnya,0,1,'L');
        

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,10,' ',0,1,'C');
        $pdf->Cell(10,10,'NO',1,0,'C');
        $pdf->Cell(90,10,'NAMA PRODUK',1,0,'C');
        $pdf->Cell(20,10,'QTY',1,0,'C');
        $pdf->Cell(30,10,'KET',1,0,'C');
        for($i=0;$i<7;$i++){
           $pdf->Cell(15,10,$day[$i],1,0,'C');
        }
        $pdf->Cell(20,10,'TOTAL',1,1,'C');

        for($k=0;$k<$jm_dpo;$k++){
            $ct    = $this->M_PerencanaanProduksi->get_ct($dpo[$k]['id_produk'])->result_array();
            $jm_ct = $this->M_PerencanaanProduksi->get_ct($dpo[$k]['id_produk'])->num_rows();

            $id_dpo = $dpo[$k]['id_detail_purchase_order'];

            $pdf->SetFont('Arial','',10);

            //nama produk
            if($dpo[$k]['keterangan'] == 0){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dpo[$k]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dpo[$k]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dpo[$k]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
            }
            else if($dpo[$k]['keterangan'] == 1){
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dpo[$k]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dpo[$k]['nama_produk'] . $nama_ukuran;
            }
            else if($dpo[$k]['keterangan'] == 2){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dpo[$k]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                $nama_produk = $dpo[$k]['nama_produk'] . " (" . $nama_warna . ")";
            }
            else{
                $nama_produk = $dpo[$k]['nama_produk'];
            }

            if($jm_ct == 4){
                $pdf->Cell(10,24,($k+1),1,0,'C');
                $pdf->Cell(90,24,$nama_produk,1,0,'C');
                $pdf->Cell(20,24,$dpo[$k]['jumlah_produk'],1,0,'C');
            }
            if($jm_ct == 3){
                $pdf->Cell(10,18,($k+1),1,0,'C');
                $pdf->Cell(90,18,$nama_produk,1,0,'C');
                $pdf->Cell(20,18,$dpo[$k]['jumlah_produk'],1,0,'C');
            }
            
            for($o=0;$o<$jm_ct;$o++){
                $id_line = $ct[$o]['id_line'];
                $total[$o] = 0;

                if($o == 0){
                    $pdf->Cell(30,6,$ct[$o]['nama_line'],1,0,'C');

                    for($u=0;$u<7;$u++){
                        for($q=0;$q<$jm_dpl;$q++){
                            $id_dpo_dpl  = $dpl[$q]['id_detail_purchase_order'];
                            $id_line_dpl = $dpl[$q]['id_line'];
                            $tgl_dpl     = $dpl[$q]['tanggal'];

                            $tanggal_cek = $semua_tanggal[$u]['tanggal'];

                            if($id_dpo_dpl == $id_dpo && $id_line_dpl == $id_line && $tgl_dpl == $tanggal_cek){
                                if($dpl[$q]['jumlah_item_perencanaan'] == 0){
                                    $pdf->Cell(15,6,'',1,0,'C');
                                }
                                else{
                                    $pdf->Cell(15,6,$dpl[$q]['jumlah_item_perencanaan'],1,0,'C');
                                    $total[$o] = $total[$o] + intval($dpl[$q]['jumlah_item_perencanaan']);
                                }
                            }
                        }
                    }
                    if($total[$o] == 0){
                        $pdf->Cell(20,6,'-',1,0,'C');
                    }
                    else{
                        $pdf->Cell(20,6,$total[$o],1,0,'C');
                    }
                }
                else if($o == ($jm_ct-1)){
                    $pdf->Cell(5,6,'',0,1,'C');
                    $pdf->Cell(10,6,'',0,0,'C');
                    $pdf->Cell(90,6,'',0,0,'C');
                    $pdf->Cell(20,6,'',0,0,'C');
                    $pdf->Cell(30,6,$ct[$o]['nama_line'],1,0,'C');

                    for($u=0;$u<7;$u++){
                        for($q=0;$q<$jm_dpl;$q++){
                            $id_dpo_dpl  = $dpl[$q]['id_detail_purchase_order'];
                            $id_line_dpl = $dpl[$q]['id_line'];
                            $tgl_dpl     = $dpl[$q]['tanggal'];

                            $tanggal_cek = $semua_tanggal[$u]['tanggal'];

                            if($id_dpo_dpl == $id_dpo && $id_line_dpl == $id_line && $tgl_dpl == $tanggal_cek){
                                if($dpl[$q]['jumlah_item_perencanaan'] == 0){
                                    $pdf->Cell(15,6,'',1,0,'C');
                                }
                                else{
                                    $pdf->Cell(15,6,$dpl[$q]['jumlah_item_perencanaan'],1,0,'C');
                                    $total[$o] = $total[$o] + intval($dpl[$q]['jumlah_item_perencanaan']);
                                }
                            }
                        }
                    }
                    if($total[$o] == 0){
                        $pdf->Cell(20,6,'-',1,1,'C');
                    }
                    else{
                        $pdf->Cell(20,6,$total[$o],1,1,'C');
                    }
                }
                else{
                    $pdf->Cell(5,6,'',0,1,'C');
                    $pdf->Cell(10,6,'',0,0,'C');
                    $pdf->Cell(90,6,'',0,0,'C');
                    $pdf->Cell(20,6,'',0,0,'C');
                    $pdf->Cell(30,6,$ct[$o]['nama_line'],1,0,'C');

                    for($u=0;$u<7;$u++){
                        for($q=0;$q<$jm_dpl;$q++){
                            $id_dpo_dpl  = $dpl[$q]['id_detail_purchase_order'];
                            $id_line_dpl = $dpl[$q]['id_line'];
                            $tgl_dpl     = $dpl[$q]['tanggal'];

                            $tanggal_cek = $semua_tanggal[$u]['tanggal'];

                            if($id_dpo_dpl == $id_dpo && $id_line_dpl == $id_line && $tgl_dpl == $tanggal_cek){
                                if($dpl[$q]['jumlah_item_perencanaan'] == 0){
                                    $pdf->Cell(15,6,'',1,0,'C');
                                }
                                else{
                                    $pdf->Cell(15,6,$dpl[$q]['jumlah_item_perencanaan'],1,0,'C');
                                    $total[$o] = $total[$o] + intval($dpl[$q]['jumlah_item_perencanaan']);
                                }
                            }
                        }
                    }
                    if($total[$o] == 0){
                        $pdf->Cell(20,6,'-',1,0,'C');
                    }
                    else{
                        $pdf->Cell(20,6,$total[$o],1,0,'C');
                    }
                }
                
            }
        }

        $count = $jm_dpo+1;

        for($k=0;$k<$jm_dpore;$k++){
            //$ct    = $this->M_PerencanaanProduksi->get_ct($dpore[$k]['id_produk'])->result_array();
            //$jm_ct = $this->M_PerencanaanProduksi->get_ct($dpore[$k]['id_produk'])->num_rows();

            $id_produksi_tertunda = $dpore[$k]['id_produksi_tertunda'];

            $pdf->SetFont('Arial','',10);

            //nama produk
            if($dpore[$k]['keterangan'] == 0){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dpore[$k]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dpore[$k]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dpore[$k]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
            }
            else if($dpore[$k]['keterangan'] == 1){
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dpore[$k]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dpore[$k]['nama_produk'] . $nama_ukuran;
            }
            else if($dpore[$k]['keterangan'] == 2){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dpore[$k]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                $nama_produk = $dpore[$k]['nama_produk'] . " (" . $nama_warna . ")";
            }
            else{
                $nama_produk = $dpore[$k]['nama_produk'];
            }

            $pdf->Cell(10,6,$count,1,0,'C');
            $pdf->Cell(90,6,$nama_produk,1,0,'C');
            $pdf->Cell(20,6,$dpore[$k]['jumlah_tertunda'],1,0,'C');
            $pdf->Cell(30,6,$dpore[$k]['nama_line'],1,0,'C');

            $total = 0;

            for($u=0;$u<7;$u++){
                $tanggal_cek = $semua_tanggal[$u]['tanggal'];
                for($q=0;$q<$jm_dplre;$q++){
                    $id_prodtun  = $dplre[$q]['id_produksi_tertunda'];
                    $tgl_dpl     = $dplre[$q]['tanggal'];

                    if($id_prodtun == $id_produksi_tertunda && $tgl_dpl == $tanggal_cek){
                        if($dplre[$q]['jumlah_item_perencanaan'] == 0){
                            $pdf->Cell(15,6,'',1,0,'C');
                        }
                        else{
                            $pdf->Cell(15,6,$dplre[$q]['jumlah_item_perencanaan'],1,0,'C');
                            $total = $total + intval($dplre[$q]['jumlah_item_perencanaan']);
                        }
                    }
                }
            }
            if($total == 0){
                $pdf->Cell(20,6,'-',1,1,'C');
            }
            else{
                $pdf->Cell(20,6,$total,1,1,'C');
            }
            $count++;
        }

        $pdf->Output();
    }
}
