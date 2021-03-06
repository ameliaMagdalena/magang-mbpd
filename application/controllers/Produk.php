<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Produk');
        $this->load->model('M_Line');
        $this->load->model('M_Warna');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_JenisProduk');
        $this->load->model('M_Dashboard');
        $this->load->model('M_User');
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
        $data['produk']        = $this->M_Produk->select_all_aktif()->result();
        $data['detail_produk'] = $this->M_Produk->select_all_detail_produk()->result();
        $data['jenis_produk']  = $this->M_JenisProduk->select_all_aktif()->result();
        $data['line']          = $this->M_Line->select_all_aktif()->result();
        $data['warna']         = $this->M_Warna->select_all_aktif()->result();
        $data['jumlah_warna']  = $this->M_Warna->select_all_aktif()->num_rows();
        $data['cycle_time']    = $this->M_Produk->select_all_ct()->result();
        $data['jenis_material'] = $this->M_Produk->select_all_jenis_material()->result();

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

		$this->load->view('v_produk',$data);
    }

    public function cek_nama_produk_input(){
        $nama_produk = $this->input->post('nama_produk_input');

        $hasil_cari_produk = $this->M_Produk->cari_produk($nama_produk)->num_rows();

        if($hasil_cari_produk > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    public function cek_kode_produk_input(){
        $kode_produk = $this->input->post('kode_produk');

        $hasil_cari_produk = $this->M_Produk->cari_produk_by_kode($kode_produk)->num_rows();

        if($hasil_cari_produk > 0){
            $data['res'] = 1;
        }

        echo json_encode($data);
    }

    //get nama material based on jenis materialnya
    public function get_nama_material(){
        $id_jenis_material = $this->input->post('id_jenis_material');

        $data['materials']        = $this->M_Produk->cari_material($id_jenis_material)->result_array();
        $data['jumlah_materials'] = $this->M_Produk->cari_material($id_jenis_material)->num_rows();

        echo json_encode($data);
    }

    public function get_ukprod_warna(){
        $id_jenis_produk   = $this->input->post('id_jenis_produk');

        $data['ukprod']    = $this->M_Produk->get_ukprod($id_jenis_produk)->result_array();
        $data['jm_ukprod'] = $this->M_Produk->get_ukprod($id_jenis_produk)->num_rows();

        $data['warna']     = $this->M_Warna->select_all_aktif()->result_array();
        $data['jm_warna']  = $this->M_Warna->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function tambah_produk(){
        $nama_produk       = $this->input->post('nama_produk_input');
        $kode_produk       = $this->input->post('kode_produk');
        $harga_produk      = $this->input->post('harga_produk');
        $keterangan        = $this->input->post('keterangan');
        $id_jenis_produk   = $this->input->post('jenis_produk');
        $keterangan_warna  = $this->input->post('keterangan_warna');

        $now = date('Y-m-d H:i:s');
        $jumlah_produk = $this->M_Produk->select_all()->num_rows();
        $id_number      = $jumlah_produk + 1;
        $id_produk     = "PRDK-".$id_number;

        //ADD CYCLE TIME, IF PURCHASE COVER
        if($keterangan == 1){
            $jumlah_line = $this->input->post('jumlah_line_pc');

            for($i=1;$i<=$jumlah_line;$i++){
                $line = $this->input->post("lnpc_".$i);
                $ct   = $this->input->post("ctpc_".$i);
    
                if($ct != null){
                    $jumlah_ct = $this->M_Produk->select_all_ct_semua()->num_rows();
                    $id_cts     = $jumlah_ct +1;
                    $id_ct     = "CT-".$id_cts;
    
                    $data_ct   = array (
                        'id_cycle_time' => $id_ct,
                        'id_line'       => $line,
                        'id_produk'     => $id_produk,
                        'cycle_time'    => $ct,
                        'user_add'      => $_SESSION['id_user'],
                        'waktu_add'     => $now,
                        'status_delete' => 0
                    );
                    $this->M_Produk->insert('cycle_time',$data_ct);
                }
                
            }
        }

        //ADD CYCLE TIME, IF FULL PRODUKSI
        else{
            $jumlah_line = $this->input->post('jumlah_line_full');

            for($i=1;$i<=$jumlah_line;$i++){
                $line = $this->input->post("lnfull_".$i);
                $ct   = $this->input->post("ctfull_".$i);
    
                if($ct != null){
                    $jumlah_ct = $this->M_Produk->select_all_ct_semua()->num_rows();
                    $id_cts     = $jumlah_ct +1;
                    $id_ct     = "CT-".$id_cts;
    
                    $data_ct   = array (
                        'id_cycle_time' => $id_ct,
                        'id_line'       => $line,
                        'id_produk'     => $id_produk,
                        'cycle_time'    => $ct,
                        'user_add'      => $_SESSION['id_user'],
                        'waktu_add'     => $now,
                        'status_delete' => 0
                    );
                    $this->M_Produk->insert('cycle_time',$data_ct);
                }
            }
        }
    
        //ADD KONSUMSI MATERIAL
            $jumlah_km = $this->input->post('jumlah_km');

            for($i=1;$i<=$jumlah_km;$i++){
                //kalo misalnya jumlah_material nda null baru boleh se tambah.
                $jumlah_material = $this->input->post('jmmat'.$i);

                if($jumlah_material > 0){
                    $id_material = $this->input->post('idmat'.$i);
                    $id_line     = $this->input->post('idline'.$i);
                    $status_km   = $this->input->post('stat_km'.$i);

                    $total_km  = $this->M_Produk->select_all_km_semua()->num_rows();
                    $id_kms    = $total_km +1;
                    $id_km     = "KONMAT-".$id_kms;

                    $data_km = array(
                        'id_konsumsi_material' => $id_km,
                        'id_produk'            => $id_produk,
                        'id_sub_jenis_material'=> $id_material,
                        'id_line'              => $id_line,
                        'jumlah_konsumsi'      => $jumlah_material,
                        'status_konsumsi'      => $status_km,
                        'user_add'             => $_SESSION['id_user'],
                        'waktu_add'            => $now,
                        'status_delete'        => 0
                    );
                    $this->M_Produk->insert('konsumsi_material',$data_km);
                }
            }
        //km


        //ADD DETAILLL PRODUKKK
        $keterangan_produk = $this->input->post('keterangan_produk');

        if($keterangan_produk == 0 || $keterangan_produk == 1 || $keterangan_produk == 2){
            //jumlah ukwar yang ditambahkan
            $jumlah_ukwars = $this->input->post('jumlah_uw'.$keterangan_produk);
            $jumlah_ukwar = strlen($jumlah_ukwars);
            
            for($i=1;$i<=$jumlah_ukwar;$i++){
                $jumlah_detail_produk = $this->M_Produk->select_all_detail_produk_semua()->num_rows();
                $id_number            = $jumlah_detail_produk + 1;
        
                $id_detail_produk     = "DETPRO-".$id_number;

                if($keterangan_produk == 0){
                    $id_ukuran   = $this->input->post('0id_ukuran'.$i);
                    $id_warna    = $this->input->post('0id_warna'.$i);
                    $kode_produk = $this->input->post('0kp'.$i);

                    $data_detail_produk = array(
                        'id_detail_produk' => $id_detail_produk,
                        'id_produk'        => $id_produk,
                        'id_ukuran_produk' => $id_ukuran,
                        'id_warna'         => $id_warna,
                        'kode_produk'      => $kode_produk,
                        'keterangan'       => $keterangan_produk,
                        'user_add'         => $_SESSION['id_user'],
                        'waktu_add'        => $now,
                        'status_delete'    => 0
                    );
                    $this->M_Produk->insert('detail_produk',$data_detail_produk);
                }
                else if($keterangan_produk == 1){
                    $id_ukuran = $this->input->post('1id_ukuran'.$i);
                    $kode_produk = $this->input->post('1kp'.$i);

                    $data_detail_produk = array (
                        'id_detail_produk' => $id_detail_produk,
                        'id_produk'        => $id_produk,
                        'id_ukuran_produk' => $id_ukuran,
                        'kode_produk'      => $kode_produk,
                        'keterangan'       => $keterangan_produk,
                        'user_add'         => $_SESSION['id_user'],
                        'waktu_add'        => $now,
                        'status_delete'    => 0
                    );

                    $this->M_Produk->insert('detail_produk',$data_detail_produk);
                }
                else{
                    $id_warna  = $this->input->post('2id_warna'.$i);
                    $kode_produk = $this->input->post('2kp'.$i);

                    $data_detail_produk = array (
                        'id_detail_produk' => $id_detail_produk,
                        'id_produk'        => $id_produk,
                        'id_warna'         => $id_warna,
                        'kode_produk'      => $kode_produk,
                        'keterangan'       => $keterangan_produk,
                        'user_add'         => $_SESSION['id_user'],
                        'waktu_add'        => $now,
                        'status_delete'    => 0
                    );

                    $this->M_Produk->insert('detail_produk',$data_detail_produk);
                }
            }
        }
        //kalau produk tidak memiliki ukuran & warna
        else{
            $kode_produk = $this->input->post('kode_produk');

            $jumlah_detail_produk = $this->M_Produk->select_all_detail_produk_semua()->num_rows();
            $id_number            = $jumlah_detail_produk + 1;
    
            $id_detail_produk     = "DETPRO-".$id_number;

            $data_detail_produk = array (
                'id_detail_produk' => $id_detail_produk,
                'id_produk'        => $id_produk,
                'kode_produk'      => $kode_produk,
                'keterangan'       => $keterangan_produk,
                'user_add'         => $_SESSION['id_user'],
                'waktu_add'        => $now,
                'status_delete'    => 0
            );

            $this->M_Produk->insert('detail_produk',$data_detail_produk);
        }

        //ADD PRODUK
        $data_produk = array (
            'id_produk'         => $id_produk,
            'id_jenis_produk'   => $id_jenis_produk,
            'nama_produk'       => $nama_produk,
            'harga_produk'      => $harga_produk,
            'keterangan_produksi'=> $keterangan,
            'user_add'          => $_SESSION['id_user'],
            'waktu_add'         => $now,
            'status_delete'     => 0
        );

        $this->M_Produk->insert('produk',$data_produk);

        Redirect('Produk');
    }

    public function detail_produk(){
        $id_produk = $this->input->post('id');

        $data['produk']           = $this->M_Produk->dcari_produk($id_produk)->result_array();
        $data['detail_produk']    = $this->M_Produk->dcari_detail_produk($id_produk)->result_array();
        $data['jm_detail_produk'] = $this->M_Produk->dcari_detail_produk($id_produk)->num_rows();

        $id_jenis_produk   = $data['produk'][0]['id_jenis_produk'];

        $data['ukprod']    = $this->M_Produk->get_ukprod($id_jenis_produk)->result_array();
        $data['jm_ukprod'] = $this->M_Produk->get_ukprod($id_jenis_produk)->num_rows();

        $data['warna']     = $this->M_Warna->select_all_aktif()->result_array();
        $data['jm_warna']  = $this->M_Warna->select_all_aktif()->num_rows();

        $data['jenprod']    = $this->M_JenisProduk->select_all_aktif()->result_array();
        $data['jm_jenprod'] = $this->M_JenisProduk->select_all_aktif()->num_rows();
        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $data['cycle_time']        = $this->M_Produk->dcari_ct($id_produk)->result_array();
        $data['jumlah_ct']         = $this->M_Produk->dcari_ct($id_produk)->num_rows();
        $data['konsumsi_material'] = $this->M_Produk->dcari_km($id_produk)->result_array();
        $data['jumlah_km']         = $this->M_Produk->dcari_km($id_produk)->num_rows();

        $data['line']          = $this->M_Line->select_all_aktif()->result_array();
        $data['jm_line']       = $this->M_Line->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function delete_produk(){
        $id_produk = $this->input->post('id_produk');
        $now       = date('Y-m-d H:i:s');

        $data = array(
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => $now,
            'status_delete' => 1
        );

        $where = array (
            'id_produk' => $id_produk
        );

        $this->M_Produk->edit('produk',$data,$where);
        

        //
        $detprod    = $this->M_Produk->dcari_detail_produk($id_produk)->result_array();
        $jm_detprod = $this->M_Produk->dcari_detail_produk($id_produk)->num_rows();

        for($i=0;$i<$jm_detprod;$i++){
            $data_detprod = array(
                'status_delete' => 1,
                'user_delete'   => $_SESSION['id_user'],
                'waktu_delete'  => $now
            );

            $where_detprod = array(
                'id_detail_produk' => $detprod[$i]['id_detail_produk']
            );

            $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
        }

        //
        $ct    = $this->M_Produk->dcari_ct($id_produk)->result_array();
        $jm_ct = $this->M_Produk->dcari_ct($id_produk)->num_rows();

        for($i=0;$i<$jm_ct;$i++){
            $data_ct = array(
                'status_delete' => 1,
                'user_delete'   => $_SESSION['id_user'],
                'waktu_delete'  => $now
            );

            $where_ct = array(
                'id_cycle_time' => $ct[$i]['id_cycle_time']
            );

            $this->M_Produk->edit('cycle_time',$data_ct,$where_ct);
        }

        //
        $km    = $this->M_Produk->dcari_km($id_produk)->result_array();
        $jm_km = $this->M_Produk->dcari_km($id_produk)->num_rows();

        for($i=0;$i<$jm_km;$i++){
            $data_km = array(
                'status_delete' => 1,
                'user_delete'   => $_SESSION['id_user'],
                'waktu_delete'  => $now
            );

            $where_km = array(
                'id_konsumsi_material' => $km[$i]['id_konsumsi_material']
            );

            $this->M_Produk->edit('konsumsi_material',$data_km,$where_km);
        }

        redirect('produk');
    }

    public function edit_produk(){
        $id_produk           = $this->input->post('id_produk_edit');
        $nama_produk         = $this->input->post('nama_produk_edit');
        $harga_produk        = $this->input->post('harga_produk_edit');
        $nama_produks        = $this->input->post('nama_produk_sebelum');
        $harga_produks       = $this->input->post('harga_produk_sebelum');
        $keterangan_produk   = $this->input->post('keterangan_produk_edit');
        $keterangan_produksi = $this->input->post('keterangan_produksi_edit');

        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d H:i:s');

        if($nama_produk != $nama_produks || $harga_produk != $harga_produks){
            //produk 
                $data_produk = array(
                    'nama_produk'  => $nama_produk,
                    'harga_produk' => $harga_produk,
                    'user_edit'    => $user,
                    'waktu_edit'   => $now
                );

                $where_produk = array(
                    'id_produk' => $id_produk
                );

                $this->M_Produk->edit('produk',$data_produk,$where_produk);
            //
        }

        //detail produk
            $jumlah_ukprod = $this->input->post('ejumlah_ukprod');
            
            //memiliki ukuran & warna
            if($keterangan_produk == 0){
                for($i=1;$i<=$jumlah_ukprod;$i++){
                    $ket       = $this->input->post('eket'.$i);
                    $kp        = $this->input->post('ekp'.$i);
                    $id_ukprod = $this->input->post('eid_ukuran'.$i);
                    $id_warna  = $this->input->post('eid_warna'.$i);
                    $del       = $this->input->post('uwdel'.$i);

                    //sebelumnya ada
                    if($ket == 0){ 
                        $id_detail_produk = $this->input->post('eid_detprod'.$i);  

                        //tetap ada
                        if($del != "on"){
                            $data_detprod = array(
                                'kode_produk' => $kp,
                                'user_edit'   => $user,
                                'waktu_edit'  => $now
                            );

                            $where_detprod = array(
                                'id_detail_produk' => $id_detail_produk
                            );

                            $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
                        }   
                        //jadi tidak ada
                        else if($del == "on"){
                            $data_detprod = array(
                                'status_delete'  => 1,
                                'user_delete'  => $user,
                                'waktu_delete' => $now
                            );

                            $where_detprod = array(
                                'id_detail_produk' => $id_detail_produk
                            );

                            $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
                        }
                    }
                    //sebelumnya nda ada
                    else if($ket == 1){
                        //jadi ada
                        if($del != "on"){
                            $jumlah_detail_produk = $this->M_Produk->select_all_detail_produk_semua()->num_rows();
                            $id_number            = $jumlah_detail_produk + 1;
                            $id_detail_produk     = "DETPRO-".$id_number;

                            $data_detail_produk = array(
                                'id_detail_produk' => $id_detail_produk,
                                'id_produk'        => $id_produk,
                                'id_ukuran_produk' => $id_ukprod,
                                'id_warna'         => $id_warna,
                                'kode_produk'      => $kp,
                                'keterangan'       => $keterangan_produk,
                                'user_add'         => $_SESSION['id_user'],
                                'waktu_add'        => $now,
                                'status_delete'    => 0
                            );
                            
                            $this->M_Produk->insert('detail_produk',$data_detail_produk);
                        }
                    }

                }
            }

            //memiliki ukuran
            else if($keterangan_produk == 1){
                for($i=1;$i<=$jumlah_ukprod;$i++){
                    $ket       = $this->input->post('eket'.$i);
                    $kp        = $this->input->post('ekp'.$i);
                    $id_ukprod = $this->input->post('eid_ukuran'.$i);
                    $del       = $this->input->post('del'.$i);

                    //sebelumnya ada
                    if($ket == 0){ 
                        $id_detail_produk = $this->input->post('eid_detprod'.$i);  

                        //tetap ada
                        if($del != "on"){
                            $data_detprod = array(
                                'kode_produk' => $kp,
                                'user_edit'   => $user,
                                'waktu_edit'  => $now
                            );

                            $where_detprod = array(
                                'id_detail_produk' => $id_detail_produk
                            );

                            $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
                        }   
                        //jadi tidak ada
                        else if($del == "on"){
                            $data_detprod = array(
                                'status_delete'  => 1,
                                'user_delete'  => $user,
                                'waktu_delete' => $now
                            );

                            $where_detprod = array(
                                'id_detail_produk' => $id_detail_produk
                            );

                            $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
                        }
                    }
                    //sebelumnya nda ada
                    else if($ket == 1){
                        //jadi ada
                        if($del != "on"){
                            $jumlah_detail_produk = $this->M_Produk->select_all_detail_produk_semua()->num_rows();
                            $id_number            = $jumlah_detail_produk + 1;
                            $id_detail_produk     = "DETPRO-".$id_number;

                            $data_detail_produk = array(
                                'id_detail_produk' => $id_detail_produk,
                                'id_produk'        => $id_produk,
                                'id_ukuran_produk' => $id_ukprod,
                                'kode_produk'      => $kp,
                                'keterangan'       => $keterangan_produk,
                                'user_add'         => $_SESSION['id_user'],
                                'waktu_add'        => $now,
                                'status_delete'    => 0
                            );
                            
                            $this->M_Produk->insert('detail_produk',$data_detail_produk);
                        }
                    }
                }
            }

            //memiliki warna
            else if($keterangan_produk == 2){
                for($i=1;$i<=$jumlah_ukprod;$i++){
                    $ket       = $this->input->post('eket'.$i);
                    $kp        = $this->input->post('ekp'.$i);
                    $id_warna  = $this->input->post('eid_warna'.$i);
                    $del       = $this->input->post('del'.$i);

                    //sebelumnya ada
                    if($ket == 0){ 
                        $id_detail_produk = $this->input->post('eid_detprod'.$i);  

                        //tetap ada
                        if($del != "on"){
                            $data_detprod = array(
                                'kode_produk' => $kp,
                                'user_edit'   => $user,
                                'waktu_edit'  => $now
                            );

                            $where_detprod = array(
                                'id_detail_produk' => $id_detail_produk
                            );

                            $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
                        }   
                        //jadi tidak ada
                        else if($del == "on"){
                            $data_detprod = array(
                                'status_delete'  => 1,
                                'user_delete'  => $user,
                                'waktu_delete' => $now
                            );

                            $where_detprod = array(
                                'id_detail_produk' => $id_detail_produk
                            );

                            $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
                        }
                    }
                    //sebelumnya nda ada
                    else if($ket == 1){
                        //jadi ada
                        if($del != "on"){
                            $jumlah_detail_produk = $this->M_Produk->select_all_detail_produk_semua()->num_rows();
                            $id_number            = $jumlah_detail_produk + 1;
                            $id_detail_produk     = "DETPRO-".$id_number;

                            $data_detail_produk = array(
                                'id_detail_produk' => $id_detail_produk,
                                'id_produk'        => $id_produk,
                                'id_warna'         => $id_warna,
                                'kode_produk'      => $kp,
                                'keterangan'       => $keterangan_produk,
                                'user_add'         => $_SESSION['id_user'],
                                'waktu_add'        => $now,
                                'status_delete'    => 0
                            );
                            
                            $this->M_Produk->insert('detail_produk',$data_detail_produk);
                        }
                    }

                }
            }

            //tidak memiliki warna & ukuran
            else if($keterangan_produk == 3){
                $kode_produk      = $this->input->post('kode_produk_edit');
                $id_detail_produk = $this->input->post('id_detail_produk3');
                
                $data_detprod = array(
                    'kode_produk' => $kode_produk,
                    'user_edit'   => $user,
                    'waktu_edit'  => $now
                );

                $where_detprod = array(
                    'id_detail_produk' => $id_detail_produk
                );

                $this->M_Produk->edit('detail_produk',$data_detprod,$where_detprod);
            }

        //

        //cycle time
            $jumlah_ct = 0; 

            if($keterangan_produksi == 0){
                $jumlah_ct = 4;
            } else{
                $jumlah_ct = 3;
            }

            for($i=1;$i<=$jumlah_ct;$i++){
                $id_cycle_time = $this->input->post('id_ct'.$i);
                $cycle_time    = $this->input->post('ct'.$i);

                $data_ct = array(
                    'cycle_time' => $cycle_time,
                    'user_edit'  => $user,
                    'waktu_edit' => $now
                );

                $where_ct = array(
                    'id_cycle_time' => $id_cycle_time
                );

                $this->M_Produk->edit('cycle_time',$data_ct,$where_ct);
            }
        //

        //konsumsi material
            $jumlah_km = $this->input->post('ejumlah_km');

            for($i=1;$i<=$jumlah_km;$i++){
                $stat = $this->input->post('estat'.$i);
                $del  = $this->input->post('del'.$i);
                //echo $stat." || ".$del."<br>";
                //jika sebelum ada
                if($stat == 0){
                    //tetap ada
                    if($del != "on"){
                        $id_km   = $this->input->post('eid_km'.$i);
                        $nm_line = $this->input->post('enmline'.$i);
                        $jm_km   = $this->input->post('ejmmat'.$i);

                        if($nm_line == "Line Sewing"){
                            $status_sewing = $this->input->post('stat_km_sewing'.$i);
                            
                            $data_km = array(   
                                'jumlah_konsumsi' => $jm_km,
                                'status_konsumsi' => $status_sewing,
                                'user_edit'       => $user,
                                'waktu_edit'      => $now
                            );

                            $where_km = array(
                                'id_konsumsi_material' => $id_km
                            );

                            $this->M_Produk->edit('konsumsi_material',$data_km,$where_km);
                        } else{
                            $data_km = array(   
                                'jumlah_konsumsi' => $jm_km,
                                'user_edit'       => $user,
                                'waktu_edit'      => $now
                            );

                            $where_km = array(
                                'id_konsumsi_material' => $id_km
                            );

                            $this->M_Produk->edit('konsumsi_material',$data_km,$where_km);
                        }
                        
                    }
                    //jadi tidak ada
                    if($del == "on"){
                        $id_km   = $this->input->post('eid_km'.$i);

                        $data_km = array(   
                            'status_delete'   => 1,
                            'user_delete'     => $user,
                            'waktu_delete'    => $now
                        );

                        $where_km = array(
                            'id_konsumsi_material' => $id_km
                        );

                        $this->M_Produk->edit('konsumsi_material',$data_km,$where_km);
                    }
                }
                //jika sebelumnya tidak ada
                else if($stat == 1){
                    //tetap ada
                    if($del != "on"){
                        $id_material = $this->input->post('eidmat'.$i);
                        $id_line     = $this->input->post('eidline'.$i);
                        $jm_km       = $this->input->post('ejmmat'.$i);
                        $nm_line     = $this->input->post('enmline'.$i);

                        $total_km  = $this->M_Produk->select_all_km_aktif()->num_rows();
                        $id_kms    = $total_km +1;
                        $id_km     = "KONMAT-".$id_kms;

                        $status_km = "";

                        if($nm_line == "Line Sewing"){
                            $status_km = $this->input->post('stat_km_sewing'.$i);
                        } else{
                            $status_km = 1;
                        }
    
                        $data_km = array(
                            'id_konsumsi_material' => $id_km,
                            'id_produk'            => $id_produk,
                            'id_sub_jenis_material'=> $id_material,
                            'id_line'              => $id_line,
                            'jumlah_konsumsi'      => $jm_km,
                            'status_konsumsi'      => $status_km,
                            'user_add'             => $user,
                            'waktu_add'            => $now,
                            'status_delete'        => 0
                        );
                        $this->M_Produk->insert('konsumsi_material',$data_km);
                    }
                }

            }
        //

        redirect('produk');
    }

    public function ambil_data_log(){
        $id = $this->input->post('id');

        $data_input['user'] = $this->M_Produk->select_user_add($id)->result_array();

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
        
        $data['log']        = $this->M_Produk->select_log($id)->result_array();
        $data['jumlah_log'] = $this->M_Produk->select_log($id)->num_rows();

        $data['user']        = $this->M_User->select_all_userjabatandepartemen()->result_array();
        $data['jumlah_user'] = $this->M_User->select_all_userjabatandepartemen()->num_rows();

        $data['jenis_produk']    = $this->M_JenisProduk->select_all_aktif()->result_array();
        $data['jm_jenis_produk'] = $this->M_JenisProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }
}

