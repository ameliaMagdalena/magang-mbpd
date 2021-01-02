<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratJalan extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_SuratJalan');
        $this->load->model('M_Warna');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Tetapan');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['purchase_order']        = $this->M_SuratJalan->get_po()->result();
        $data['detail_purchase_order'] = $this->M_SuratJalan->get_dpo()->result();
        $data['terkirim']              = $this->M_SuratJalan->get_isj_idpo()->result();
        $data['bpbj_available']        = $this->M_SuratJalan->get_bpbj_available()->result();

        $data['now'] = date('Y-m-d');
        $year_now   = substr(date('Y'),2,2);
        $month_now  = date('m');

        $data_last    = $this->M_SuratJalan->get_last_sj_id()->result_array();
        $jm_data_last = $this->M_SuratJalan->get_last_sj_id()->num_rows();

        if($jm_data_last == 1){
            $id_terakhir   = $data_last[0]['id_surat_jalan'];
      
            $tahun_sebelum = substr($id_terakhir,1,2);
      
            if($tahun_sebelum == $year_now){
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
      
              $id_sj_baru = "M".$tahun_sebelum.$month_now.".".$count_baru;
            }
            else{
              $id_sj_baru = "M".$year_now.$month_now.".0001";
            }
        }
        else{
            $id_sj_baru = "M".$year_now.$month_now.".0001";
        }
        $data['idnya'] = $id_sj_baru;

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

		$this->load->view('v_surat_jalan_tambah',$data);
    }

    public function detail_po_bpbj(){
        $id = $this->input->post('id');

        $data['po']    = $this->M_SuratJalan->get_po_by_id($id)->result_array();
        $data['dpo']   = $this->M_SuratJalan->get_dpo_by_id($id)->result_array();
        $data['jmdpo'] = $this->M_SuratJalan->get_dpo_by_id($id)->num_rows();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $data['sebelum']   = $this->M_SuratJalan->get_yg_sdh_dikirim($id)->result_array();
        $data['jmsebelum'] = $this->M_SuratJalan->get_yg_sdh_dikirim($id)->num_rows();

        $data['bpbj_tot']      = $this->M_SuratJalan->get_detbpbj_total()->result_array();
        $data['jmbpbj_tot']    = $this->M_SuratJalan->get_detbpbj_total()->num_rows();

        //$detail_bpbj   = $this->M_SuratJalan->get_total_detail_bpbj()->result_array();
        //$jmdetail_bpbj = $this->M_SuratJalan->get_total_detail_bpbj()->num_rows();

        echo json_encode($data);
    }

    public function tambah_surat_jalan(){
        $id_sj                  = $this->input->post('nomor_sj_tambah');
        $id_po                  = $this->input->post('id_po_tambah');
        $kendaraan              = $this->input->post('kendaraan');
        $nama_pengirim          = $this->input->post('nama_pengirim');
        $keterangan_pengiriman  = $this->input->post('keterangan_pengiriman');
        $keterangan             = $this->input->post('keterangan');
        $jumlah_detail          = $this->input->post('jumlah_detail');
        
        $user     = $_SESSION['id_user'];
        $now      = date('Y-m-d H:i:s');
        $year_now = substr(date('Y'),2,2);
        $tanggal  = date('Y-m-d');

        $data_sj = array(
            'id_surat_jalan'            => $id_sj,
            'id_purchase_order_customer'=> $id_po,
            'tanggal'                   => $tanggal,
            'kendaraan'                 => $kendaraan,
            'nama_pengirim'             => $nama_pengirim,
            'keterangan_pengiriman'     => $keterangan_pengiriman,
            'keterangan'                => $keterangan,
            'status_surat_jalan'        => 0,
            'user_add'                  => $user,
            'waktu_add'                 => $now,
            'status_delete'             => 0
        );

        $this->M_SuratJalan->insert('surat_jalan',$data_sj);
        
        for($i=0;$i<$jumlah_detail;$i++){
            $id_detprod = $this->input->post('id'.$i);
            $jm_prod    = $this->input->post('kirim'.$i);


            if($jm_prod != 0){
                //item sj
                    //id isj
                    $data_last    = $this->M_SuratJalan->get_last_isj_id()->result_array();
                    $jm_data_last = $this->M_SuratJalan->get_last_isj_id()->num_rows();
            
                    if($jm_data_last == 1){
                        //ISJ20.000000 = 6
                        $id_terakhir   = $data_last[0]['id_item_surat_jalan'];
                
                        $tahun_sebelum = substr($id_terakhir,3,2);
                
                        if($tahun_sebelum == $year_now){
                            $count = intval(substr($id_terakhir,6,6)) + 1;
                            $pjg   = strlen($count);
                    
                            if($pjg == 1){
                                $count_baru = "00000".$count;
                            }
                            else if($pjg == 2){
                                $count_baru = "0000".$count;
                            }
                            else if($pjg == 3){
                                $count_baru = "000".$count;
                            }
                            else if($pjg == 4){
                                $count_baru = "00".$count;
                            }
                            else if($pjg == 5){
                                $count_baru = "0".$count;
                            }
                            else{
                                $count_baru = $count;
                            }
                    
                                $id_isj_baru = "ISJ".$tahun_sebelum.".".$count_baru;
                            }
                            else{
                                $id_isj_baru = "ISJ".$year_now.".000001";
                            }
                    }
                    else{
                        $id_isj_baru = "ISJ".$year_now.".000001";
                    }
                
                    $data_item_sj = array(
                        'id_item_surat_jalan' => $id_isj_baru,
                        'id_surat_jalan'      => $id_sj,
                        'id_detail_produk'    => $id_detprod,
                        'jumlah_produk'       => $jm_prod,
                        'status_keluar'       => 0,
                        'user_add'            => $user,
                        'waktu_add'           => $now,
                        'status_delete'       => 0
                    );
                    $this->M_SuratJalan->insert('item_surat_jalan',$data_item_sj);
                
                //close item sj

                //detail item sj
                    $target  = $jm_prod;
                    $capaian = 0;

                    $bpbj   = $this->M_SuratJalan->get_detail_bpbj($id_detprod)->result_array();
                    $jmbpbj = $this->M_SuratJalan->get_detail_bpbj($id_detprod)->num_rows();

                    for($k=0;$k<$jmbpbj;$k++){
                        $id_detail_bpbjs = $bpbj[$k]['id_detail_bpbj'];

                        $bpbj_detisj = $this->M_SuratJalan->get_item_surat_jalan($id_detail_bpbjs)->result_array();

                        if($capaian < $target){
                            $jumlah_bpbjs = $bpbj[$k]['jumlah_produk'];
                            $jumlah_max   = $jumlah_bpbjs - $bpbj_detisj[0]['total'];

                            if($jumlah_max > 0){
                                $sisa_target = $target - $capaian;
                            
                                if($sisa_target > $jumlah_max){
                                    $jumlah_pakai = $jumlah_max;
                                }
                                else{
                                    $jumlah_pakai = $sisa_target;
                                }
                                $capaian      = $capaian + $jumlah_pakai;

                                //id isj
                                $data_last    = $this->M_SuratJalan->get_last_disj_id()->result_array();
                                $jm_data_last = $this->M_SuratJalan->get_last_disj_id()->num_rows();
                        
                                if($jm_data_last == 1){
                                    //DISJ20.00000000 = 8
                                    $id_terakhir   = $data_last[0]['id_detail_item_surat_jalan'];
                            
                                    $tahun_sebelum = substr($id_terakhir,4,2);
                            
                                    if($tahun_sebelum == $year_now){
                                        $count = intval(substr($id_terakhir,7,8)) + 1;
                                        $pjg   = strlen($count);
                                
                                        if($pjg == 1){
                                            $count_baru = "0000000".$count;
                                        }
                                        else if($pjg == 2){
                                            $count_baru = "000000".$count;
                                        }
                                        else if($pjg == 3){
                                            $count_baru = "00000".$count;
                                        }
                                        else if($pjg == 4){
                                            $count_baru = "0000".$count;
                                        }
                                        else if($pjg == 5){
                                            $count_baru = "000".$count;
                                        }
                                        else if($pjg == 6){
                                            $count_baru = "00".$count;
                                        }
                                        else if($pjg == 7){
                                            $count_baru = "0".$count;
                                        }                                
                                        else{
                                            $count_baru = $count;
                                        }
                                
                                            $id_disj_baru = "DISJ".$tahun_sebelum.".".$count_baru;
                                        }
                                    else{
                                        $id_disj_baru = "DISJ".$year_now.".00000001";
                                    }
                                }
                                else{
                                    $id_disj_baru = "DISJ".$year_now.".00000001";
                                }
                            
                                $data_det_disj = array (
                                    'id_detail_item_surat_jalan' => $id_disj_baru,
                                    'id_item_surat_jalan'        => $id_isj_baru,
                                    'id_detail_bpbj'             => $id_detail_bpbjs,
                                    'jumlah_produk'              => $jumlah_pakai,
                                    'user_add'                   => $user,
                                    'waktu_add'                  => $now,
                                    'status_delete'              => 0
                                );

                                $this->M_SuratJalan->insert('detail_item_surat_jalan',$data_det_disj);

                                //update detail bpbj
                                $one_detbpbj = $this->M_SuratJalan->get_one_detbpbj($id_detail_bpbjs)->result_array();

                                $jumlah_terkirim     = $one_detbpbj[0]['jumlah_terkirim'];
                                $jumlah_terkirim_new = $jumlah_terkirim + $jumlah_pakai;

                                if($jumlah_terkirim_new == $one_detbpbj[0]['jumlah_produk']){
                                    $data_detbpbj = array(
                                        'jumlah_terkirim'    => $jumlah_terkirim_new,
                                        'status_detail_bpbj' => 1,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );

                                    $where_detbpbj = array(
                                        'id_detail_bpbj'     => $id_detail_bpbjs
                                    );

                                   $this->M_SuratJalan->edit('detail_bpbj',$data_detbpbj,$where_detbpbj);

                                }
                                else{
                                    $data_detbpbj = array(
                                        'jumlah_terkirim'    => $jumlah_terkirim_new,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );

                                    $where_detbpbj = array(
                                        'id_detail_bpbj'     => $id_detail_bpbjs
                                    );

                                   $this->M_SuratJalan->edit('detail_bpbj',$data_detbpbj,$where_detbpbj);
                                }

                                //ubah status bpbj
                                $id_bpbj_sem  = $one_detbpbj[0]['id_bpbj'];

                                $det_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->result_array();
                                $jum_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->num_rows();

                                $count_det_bpbj_selesai = 0;
                                $count_det_bpbj_terisi  = 0;

                                for($f=0;$f<$jum_bpbj_sem;$f++){
                                    $id_detail_bpbj_sem = $det_bpbj_sem[$f]['id_detail_bpbj'];
                                    $jumlah_produk_sem  = $det_bpbj_sem[$f]['jumlah_produk'];
                                    $jumlah_terkirim    = $det_bpbj_sem[$f]['jumlah_terkirim'];
                                    $status_detbpbj     = $det_bpbj_sem[$f]['status_detail_bpbj'];

                                    //echo $jumlah_produk_sem." - ".$jumlah_terkirim." - ".$status_detbpbj;
                                    if($status_detbpbj == 1){
                                        $count_det_bpbj_selesai++;
                                    }
                                    else{
                                        if($jumlah_terkirim > 0){
                                            $count_det_bpbj_terisi++;
                                        }
                                    }
                                }

                                if($count_det_bpbj_selesai == $jum_bpbj_sem){
                                    //update status bpbj jadi 2 (selesai)

                                    $data_bpbj = array (
                                        'status_bpbj' => 2,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                                else if($count_det_bpbj_terisi > 0){
                                    //update status bpbj jadi 1 (dalam proses)
                                    $data_bpbj = array (
                                        'status_bpbj' => 1,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                                else if($count_det_bpbj_terisi == 0){
                                    //update status bpbj jadi 1 (dalam proses)
                                    $data_bpbj = array (
                                        'status_bpbj' => 0,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                            }
                        }
                    }
                //close detail item sj
            }
        }

        redirect('suratJalan/belum_dikonfirmasi_surat_jalan');
    }

    public function semua_surat_jalan(){
        $data['po_aktif']      = $this->M_SuratJalan->select_all_po_aktif()->result();
        $data['surat_jalan']   = $this->M_SuratJalan->select_all_aktif()->result();
        $data['det_item_bpbd'] = $this->M_SuratJalan->select_sj_det_item_bpbd()->result(); 


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
    
        
	    $this->load->view('v_surat_jalan_semua',$data);
    }

    public function detail_sj(){
        $id_sj = $this->input->post('id');
        $id_po = $this->input->post('id_po');
        
        $data['sj']     = $this->M_SuratJalan->get_sj_by_id_sj($id_sj)->result_array();
        $data['isj']    = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->result_array();
        $data['jm_isj'] = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->num_rows();
        $data['po']     = $this->M_SuratJalan->get_po_by_id($id_po)->result_array();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function detail_po_bpbj_sj(){
        $id_sj = $this->input->post('id');
        $id_po = $this->input->post('id_po');

        $data['po']        = $this->M_SuratJalan->get_po_by_id($id_po)->result_array();
        $data['dpo']       = $this->M_SuratJalan->get_dpo_by_id($id_po)->result_array();
        $data['jm_dpo']    = $this->M_SuratJalan->get_dpo_by_id($id_po)->num_rows();

        $data['sj']     = $this->M_SuratJalan->get_sj_by_id_sj($id_sj)->result_array();
        $data['isj']    = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->result_array();
        $data['jm_isj'] = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->num_rows();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $data['sebelum']   = $this->M_SuratJalan->get_yg_sdh_dikirim($id_po)->result_array();
        $data['jmsebelum'] = $this->M_SuratJalan->get_yg_sdh_dikirim($id_po)->num_rows();

        $data['bpbj_tot']      = $this->M_SuratJalan->get_detbpbj_total()->result_array();
        $data['jmbpbj_tot']    = $this->M_SuratJalan->get_detbpbj_total()->num_rows();

        echo json_encode($data);
    }

    public function detail_item_bpbd(){
        $id = $this->input->post('id');

        $data['isj']        = $this->M_SuratJalan->get_isj_by_id_sj($id)->result_array();
        $data['jm_isj']     = $this->M_SuratJalan->get_isj_by_id_sj($id)->num_rows();
        $data['datanya']    = $this->M_SuratJalan->select_one_sj_det_item_bpbd($id)->result_array(); 
        $data['jm_datanya'] = $this->M_SuratJalan->select_one_sj_det_item_bpbd($id)->num_rows(); 
    
        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();
    
        echo json_encode($data);
    }

    public function edit(){
        $id_sj                 = $this->input->post('nomor_sj_edit');
        $kendaraan             = $this->input->post('kendaraan_edit');
        $nama_pengirim         = $this->input->post('nama_pengirim_edit');
        $keterangan_pengiriman = $this->input->post('keterangan_pengiriman_edit');
        $keterangan            = $this->input->post('keterangan_edit');

        $user     = $_SESSION['id_user'];
        $now      = date('Y-m-d H:i:s');
        $year_now = substr(date('Y'),2,2);
        $tanggal  = date('Y-m-d');

        $data_sj = array (
            'kendaraan'             => $kendaraan,
            'nama_pengirim'         => $nama_pengirim,
            'keterangan_pengiriman' => $keterangan_pengiriman,
            'keterangan'            => $keterangan,
            'user_edit'             => $user,
            'waktu_edit'            => $now
        );

        $where_sj = array (
            'id_surat_jalan' => $id_sj
        );

        $this->M_SuratJalan->edit('surat_jalan',$data_sj,$where_sj);

        $jumlah_detail = $this->input->post('jumlah_detail');

        for($i=0;$i<$jumlah_detail;$i++){
            $status_detail = $this->input->post('stat'.$i);

            $id_detprod = $this->input->post('id'.$i);
            $jm_prod    = $this->input->post('kirim'.$i);

            //jumlah dari 0 jadi ada
            if($status_detail == 1){
                //item sj
                    //id isj
                    $data_last    = $this->M_SuratJalan->get_last_isj_id()->result_array();
                    $jm_data_last = $this->M_SuratJalan->get_last_isj_id()->num_rows();
            
                    if($jm_data_last == 1){
                        //ISJ20.000000 = 6
                        $id_terakhir   = $data_last[0]['id_item_surat_jalan'];
                
                        $tahun_sebelum = substr($id_terakhir,3,2);
                
                        if($tahun_sebelum == $year_now){
                            $count = intval(substr($id_terakhir,6,6)) + 1;
                            $pjg   = strlen($count);
                    
                            if($pjg == 1){
                                $count_baru = "00000".$count;
                            }
                            else if($pjg == 2){
                                $count_baru = "0000".$count;
                            }
                            else if($pjg == 3){
                                $count_baru = "000".$count;
                            }
                            else if($pjg == 4){
                                $count_baru = "00".$count;
                            }
                            else if($pjg == 5){
                                $count_baru = "0".$count;
                            }
                            else{
                                $count_baru = $count;
                            }
                    
                                $id_isj_baru = "ISJ".$tahun_sebelum.".".$count_baru;
                            }
                            else{
                                $id_isj_baru = "ISJ".$year_now.".000001";
                            }
                    }
                    else{
                        $id_isj_baru = "ISJ".$year_now.".000001";
                    }
                
                    $data_item_sj = array(
                        'id_item_surat_jalan' => $id_isj_baru,
                        'id_surat_jalan'      => $id_sj,
                        'id_detail_produk'    => $id_detprod,
                        'jumlah_produk'       => $jm_prod,
                        'user_add'            => $user,
                        'waktu_add'           => $now,
                        'status_delete'       => 0
                    );
                    $this->M_SuratJalan->insert('item_surat_jalan',$data_item_sj);
                
                //close item sj

                //detail item sj
                    $target  = $jm_prod;
                    $capaian = 0;

                    $bpbj   = $this->M_SuratJalan->get_detail_bpbj($id_detprod)->result_array();
                    $jmbpbj = $this->M_SuratJalan->get_detail_bpbj($id_detprod)->num_rows();

                    for($k=0;$k<$jmbpbj;$k++){
                        $id_detail_bpbjs = $bpbj[$k]['id_detail_bpbj'];

                        $bpbj_detisj = $this->M_SuratJalan->get_item_surat_jalan($id_detail_bpbjs)->result_array();

                        if($capaian < $target){
                            $jumlah_bpbjs = $bpbj[$k]['jumlah_produk'];
                            $jumlah_max   = $jumlah_bpbjs - $bpbj_detisj[0]['total'];

                            if($jumlah_max > 0){
                                $sisa_target = $target - $capaian;
                            
                                if($sisa_target > $jumlah_max){
                                    $jumlah_pakai = $jumlah_max;
                                }
                                else{
                                    $jumlah_pakai = $sisa_target;
                                }
                                $capaian      = $capaian + $jumlah_pakai;

                                //id isj
                                $data_last    = $this->M_SuratJalan->get_last_disj_id()->result_array();
                                $jm_data_last = $this->M_SuratJalan->get_last_disj_id()->num_rows();
                        
                                if($jm_data_last == 1){
                                    //DISJ20.00000000 = 8
                                    $id_terakhir   = $data_last[0]['id_detail_item_surat_jalan'];
                            
                                    $tahun_sebelum = substr($id_terakhir,4,2);
                            
                                    if($tahun_sebelum == $year_now){
                                        $count = intval(substr($id_terakhir,7,8)) + 1;
                                        $pjg   = strlen($count);
                                
                                        if($pjg == 1){
                                            $count_baru = "0000000".$count;
                                        }
                                        else if($pjg == 2){
                                            $count_baru = "000000".$count;
                                        }
                                        else if($pjg == 3){
                                            $count_baru = "00000".$count;
                                        }
                                        else if($pjg == 4){
                                            $count_baru = "0000".$count;
                                        }
                                        else if($pjg == 5){
                                            $count_baru = "000".$count;
                                        }
                                        else if($pjg == 6){
                                            $count_baru = "00".$count;
                                        }
                                        else if($pjg == 7){
                                            $count_baru = "0".$count;
                                        }                                
                                        else{
                                            $count_baru = $count;
                                        }
                                
                                            $id_disj_baru = "DISJ".$tahun_sebelum.".".$count_baru;
                                        }
                                    else{
                                        $id_disj_baru = "DISJ".$year_now.".00000001";
                                    }
                                }
                                else{
                                    $id_disj_baru = "DISJ".$year_now.".00000001";
                                }
                            
                                $data_det_disj = array (
                                    'id_detail_item_surat_jalan' => $id_disj_baru,
                                    'id_item_surat_jalan'        => $id_isj_baru,
                                    'id_detail_bpbj'             => $id_detail_bpbjs,
                                    'jumlah_produk'              => $jumlah_pakai,
                                    'user_add'                   => $user,
                                    'waktu_add'                  => $now,
                                    'status_delete'              => 0
                                );

                                $this->M_SuratJalan->insert('detail_item_surat_jalan',$data_det_disj);

                                //update detail bpbj
                                $one_detbpbj = $this->M_SuratJalan->get_one_detbpbj($id_detail_bpbjs)->result_array();

                                $jumlah_terkirim     = $one_detbpbj[0]['jumlah_terkirim'];
                                $jumlah_terkirim_new = $jumlah_terkirim + $jumlah_pakai;

                                if($jumlah_terkirim_new == $one_detbpbj[0]['jumlah_produk']){
                                    $data_detbpbj = array(
                                        'jumlah_terkirim'    => $jumlah_terkirim_new,
                                        'status_detail_bpbj' => 1,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );

                                    $where_detbpbj = array(
                                        'id_detail_bpbj'     => $id_detail_bpbjs
                                    );

                                    $this->M_SuratJalan->edit('detail_bpbj',$data_detbpbj,$where_detbpbj);
                                }
                                else{
                                    $data_detbpbj = array(
                                        'jumlah_terkirim'    => $jumlah_terkirim_new,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );

                                    $where_detbpbj = array(
                                        'id_detail_bpbj'     => $id_detail_bpbjs
                                    );
                                    $this->M_SuratJalan->edit('detail_bpbj',$data_detbpbj,$where_detbpbj);
                                }

                                //ubah status bpbj
                                $id_bpbj_sem  = $one_detbpbj[0]['id_bpbj'];

                                $det_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->result_array();
                                $jum_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->num_rows();

                                $count_det_bpbj_selesai = 0;
                                $count_det_bpbj_terisi  = 0;

                                for($f=0;$f<$jum_bpbj_sem;$f++){
                                    $id_detail_bpbj_sem = $det_bpbj_sem[$f]['id_detail_bpbj'];
                                    $jumlah_produk_sem  = $det_bpbj_sem[$f]['jumlah_produk'];
                                    $jumlah_terkirim    = $det_bpbj_sem[$f]['jumlah_terkirim'];
                                    $status_detbpbj     = $det_bpbj_sem[$f]['status_detail_bpbj'];

                                    //echo $jumlah_produk_sem." - ".$jumlah_terkirim." - ".$status_detbpbj;
                                    if($status_detbpbj == 1){
                                        $count_det_bpbj_selesai++;
                                    }
                                    else{
                                        if($jumlah_terkirim > 0){
                                            $count_det_bpbj_terisi++;
                                        }
                                    }
                                }

                                if($count_det_bpbj_selesai == $jum_bpbj_sem){
                                    //update status bpbj jadi 2 (selesai)

                                    $data_bpbj = array (
                                        'status_bpbj' => 2,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                                else if($count_det_bpbj_terisi > 0){
                                    //update status bpbj jadi 1 (dalam proses)
                                    $data_bpbj = array (
                                        'status_bpbj' => 1,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                                else if($count_det_bpbj_terisi == 0){
                                    //update status bpbj jadi 1 (dalam proses)
                                    $data_bpbj = array (
                                        'status_bpbj' => 0,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                            }
                        }
                    }
                //close detail item sj
            }
            //jumlah jadi 0 
            else if($status_detail == 2){
                //item surat jalan
                $id_isj = $this->input->post('id_isj'.$i);
                
                //item surat jalan
                    $data_isj = array (
                        'status_delete' => 1,
                        'user_delete'   => $user,
                        'waktu_delete'  => $now
                    );
        
                    $where_isj = array (
                        'id_item_surat_jalan' => $id_isj 
                    );
                    
                    $this->M_SuratJalan->edit('item_surat_jalan',$data_isj,$where_isj);
                
                //detail item surat jalan
                $det_isj    = $this->M_SuratJalan->get_det_item_sj($id_isj)->result_array();
                $jm_det_isj = $this->M_SuratJalan->get_det_item_sj($id_isj)->num_rows();

                for($j=0;$j<$jm_det_isj;$j++){
                    $id_disj = $det_isj[$j]['id_detail_item_surat_jalan'];

                    $data_disj = array (
                        'status_delete' => 1,
                        'user_delete'   => $user,
                        'waktu_delete'  => $now
                    );

                    $where_disj = array (
                        'id_detail_item_surat_jalan' => $id_disj 
                    );

                    $this->M_SuratJalan->edit('detail_item_surat_jalan',$data_disj,$where_disj);

                    //detail bpbj
                    $id_detail_bpbj     = $det_isj[$j]['id_detail_bpbj']; 
                    $jumlah_produk_disj = $det_isj[$j]['jumlah_produk']; 

                    $detail_bpbj         = $this->M_SuratJalan->get_one_detbpbj($id_detail_bpbj)->result_array();
                    $jumlah_terkirim_old = $detail_bpbj[0]['jumlah_terkirim'];

                    $jumlah_new = $jumlah_terkirim_old - $jumlah_produk_disj;

                    $data_det_bpbj = array (
                        'jumlah_terkirim'    => $jumlah_new,
                        'status_detail_bpbj' => 0,
                        'user_edit'          => $user,
                        'waktu_edit'         => $now
                    );

                    $where_det_bpbj = array (
                        'id_detail_bpbj'    => $id_detail_bpbj
                    );

                    $this->M_SuratJalan->edit('detail_bpbj',$data_det_bpbj,$where_det_bpbj);

                    //ubah status bpbj
                    $id_bpbj_sem  = $detail_bpbj[0]['id_bpbj'];

                    $det_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->result_array();
                    $jum_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->num_rows();

                    $count_det_bpbj_selesai = 0;
                    $count_det_bpbj_terisi  = 0;

                    for($f=0;$f<$jum_bpbj_sem;$f++){
                        $id_detail_bpbj_sem = $det_bpbj_sem[$f]['id_detail_bpbj'];
                        $jumlah_produk_sem  = $det_bpbj_sem[$f]['jumlah_produk'];
                        $jumlah_terkirim    = $det_bpbj_sem[$f]['jumlah_terkirim'];
                        $status_detbpbj     = $det_bpbj_sem[$f]['status_detail_bpbj'];

                        //echo $jumlah_produk_sem." - ".$jumlah_terkirim." - ".$status_detbpbj;
                        if($status_detbpbj == 1){
                            $count_det_bpbj_selesai++;
                        }
                        else{
                            if($jumlah_terkirim > 0){
                                $count_det_bpbj_terisi++;
                            }
                        }
                    }

                    if($count_det_bpbj_selesai == $jum_bpbj_sem){
                        //update status bpbj jadi 2 (selesai)

                        $data_bpbj = array (
                            'status_bpbj' => 2,
                            'user_edit'   => $user,
                            'waktu_edit'  => $now
                        );

                        $where_bpbj = array (
                            'id_bpbj' => $id_bpbj_sem
                        );

                        $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                    }
                    else if($count_det_bpbj_terisi > 0){
                        //update status bpbj jadi 1 (dalam proses)
                        $data_bpbj = array (
                            'status_bpbj' => 1,
                            'user_edit'   => $user,
                            'waktu_edit'  => $now
                        );

                        $where_bpbj = array (
                            'id_bpbj' => $id_bpbj_sem
                        );

                        $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                    }
                    else if($count_det_bpbj_terisi == 0){
                        //update status bpbj jadi 1 (dalam proses)
                        $data_bpbj = array (
                            'status_bpbj' => 0,
                            'user_edit'   => $user,
                            'waktu_edit'  => $now
                        );

                        $where_bpbj = array (
                            'id_bpbj' => $id_bpbj_sem
                        );

                        $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                    }
                }
            }
            //tetap ada, berubah
            else if($status_detail == 3){
                //item surat jalan
                $id_isj      = $this->input->post('id_isj'.$i);
                $jumlah_new  = $this->input->post('kirim'.$i);

                $jumlah_isjs = $this->M_SuratJalan->get_item_sj($id_sj)->result_array();
                $jumlah_old  = $jumlah_isjs[$i]['jumlah_produk'];

                $data_isj = array(
                    'jumlah_produk' => $jumlah_new,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                );

                $where_isj = array (
                    'id_item_surat_jalan' => $id_isj
                );

                $this->M_SuratJalan->edit('item_surat_jalan',$data_isj,$where_isj);
        
                //detail item surat jalan
                if($jumlah_new > $jumlah_old){
                    //yang lama tetap
                    //insert selisih dari new-old
                    $target  = $jumlah_new - $jumlah_old;
                    $capaian = 0;

                    $bpbj   = $this->M_SuratJalan->get_detail_bpbj($id_detprod)->result_array();
                    $jmbpbj = $this->M_SuratJalan->get_detail_bpbj($id_detprod)->num_rows();

                    for($k=0;$k<$jmbpbj;$k++){
                        $id_detail_bpbjs = $bpbj[$k]['id_detail_bpbj'];

                        $bpbj_detisj = $this->M_SuratJalan->get_item_surat_jalan($id_detail_bpbjs)->result_array();

                        if($capaian < $target){
                            $jumlah_bpbjs = $bpbj[$k]['jumlah_produk'];
                            $jumlah_max   = $jumlah_bpbjs - $bpbj_detisj[0]['total'];

                            if($jumlah_max > 0){
                                $sisa_target = $target - $capaian;
                            
                                if($sisa_target > $jumlah_max){
                                    $jumlah_pakai = $jumlah_max;
                                }
                                else{
                                    $jumlah_pakai = $sisa_target;
                                }
                                $capaian      = $capaian + $jumlah_pakai;

                                //id isj
                                $data_last    = $this->M_SuratJalan->get_last_disj_id()->result_array();
                                $jm_data_last = $this->M_SuratJalan->get_last_disj_id()->num_rows();
                        
                                if($jm_data_last == 1){
                                    //DISJ20.00000000 = 8
                                    $id_terakhir   = $data_last[0]['id_detail_item_surat_jalan'];
                            
                                    $tahun_sebelum = substr($id_terakhir,4,2);
                            
                                    if($tahun_sebelum == $year_now){
                                        $count = intval(substr($id_terakhir,7,8)) + 1;
                                        $pjg   = strlen($count);
                                
                                        if($pjg == 1){
                                            $count_baru = "0000000".$count;
                                        }
                                        else if($pjg == 2){
                                            $count_baru = "000000".$count;
                                        }
                                        else if($pjg == 3){
                                            $count_baru = "00000".$count;
                                        }
                                        else if($pjg == 4){
                                            $count_baru = "0000".$count;
                                        }
                                        else if($pjg == 5){
                                            $count_baru = "000".$count;
                                        }
                                        else if($pjg == 6){
                                            $count_baru = "00".$count;
                                        }
                                        else if($pjg == 7){
                                            $count_baru = "0".$count;
                                        }                                
                                        else{
                                            $count_baru = $count;
                                        }
                                
                                            $id_disj_baru = "DISJ".$tahun_sebelum.".".$count_baru;
                                        }
                                    else{
                                        $id_disj_baru = "DISJ".$year_now.".00000001";
                                    }
                                }
                                else{
                                    $id_disj_baru = "DISJ".$year_now.".00000001";
                                }
                            
                                $data_det_disj = array (
                                    'id_detail_item_surat_jalan' => $id_disj_baru,
                                    'id_item_surat_jalan'        => $id_isj,
                                    'id_detail_bpbj'             => $id_detail_bpbjs,
                                    'jumlah_produk'              => $jumlah_pakai,
                                    'user_add'                   => $user,
                                    'waktu_add'                  => $now,
                                    'status_delete'              => 0
                                );

                                $this->M_SuratJalan->insert('detail_item_surat_jalan',$data_det_disj);

                                //update detail bpbj
                                $one_detbpbj = $this->M_SuratJalan->get_one_detbpbj($id_detail_bpbjs)->result_array();

                                $jumlah_terkirim     = $one_detbpbj[0]['jumlah_terkirim'];
                                $jumlah_terkirim_new = $jumlah_terkirim + $jumlah_pakai;

                                if($jumlah_terkirim_new == $one_detbpbj[0]['jumlah_produk']){
                                    $data_detbpbj = array(
                                        'jumlah_terkirim'    => $jumlah_terkirim_new,
                                        'status_detail_bpbj' => 1,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );

                                    $where_detbpbj = array(
                                        'id_detail_bpbj'     => $id_detail_bpbjs
                                    );

                                    $this->M_SuratJalan->edit('detail_bpbj',$data_detbpbj,$where_detbpbj);
                                }
                                else{
                                    $data_detbpbj = array(
                                        'jumlah_terkirim'    => $jumlah_terkirim_new,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );

                                    $where_detbpbj = array(
                                        'id_detail_bpbj'     => $id_detail_bpbjs
                                    );
                                    $this->M_SuratJalan->edit('detail_bpbj',$data_detbpbj,$where_detbpbj);
                                }

                                //ubah status bpbj
                                $id_bpbj_sem  = $one_detbpbj[0]['id_bpbj'];

                                $det_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->result_array();
                                $jum_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->num_rows();

                                $count_det_bpbj_selesai = 0;
                                $count_det_bpbj_terisi  = 0;

                                for($f=0;$f<$jum_bpbj_sem;$f++){
                                    $id_detail_bpbj_sem = $det_bpbj_sem[$f]['id_detail_bpbj'];
                                    $jumlah_produk_sem  = $det_bpbj_sem[$f]['jumlah_produk'];
                                    $jumlah_terkirim    = $det_bpbj_sem[$f]['jumlah_terkirim'];
                                    $status_detbpbj     = $det_bpbj_sem[$f]['status_detail_bpbj'];

                                    //echo $jumlah_produk_sem." - ".$jumlah_terkirim." - ".$status_detbpbj;
                                    if($status_detbpbj == 1){
                                        $count_det_bpbj_selesai++;
                                    }
                                    else{
                                        if($jumlah_terkirim > 0){
                                            $count_det_bpbj_terisi++;
                                        }
                                    }
                                }

                                if($count_det_bpbj_selesai == $jum_bpbj_sem){
                                    //update status bpbj jadi 2 (selesai)

                                    $data_bpbj = array (
                                        'status_bpbj' => 2,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                                else if($count_det_bpbj_terisi > 0){
                                    //update status bpbj jadi 1 (dalam proses)
                                    $data_bpbj = array (
                                        'status_bpbj' => 1,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                                else if($count_det_bpbj_terisi == 0){
                                    //update status bpbj jadi 1 (dalam proses)
                                    $data_bpbj = array (
                                        'status_bpbj' => 0,
                                        'user_edit'   => $user,
                                        'waktu_edit'  => $now
                                    );

                                    $where_bpbj = array (
                                        'id_bpbj' => $id_bpbj_sem
                                    );

                                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                                }
                            }
                        }
                    }
                }
                else if($jumlah_new < $jumlah_old){
                    $target_pengurangan  =  $jumlah_old - $jumlah_new;
                    $capaian_pengurangan =  0;

                    $disj_pengurangan    = $this->M_SuratJalan->get_det_item_sj($id_isj)->result_array();
                    $jm_disj_pengurangan = $this->M_SuratJalan->get_det_item_sj($id_isj)->num_rows();

                    for($r=0;$r<$jm_disj_pengurangan;$r++){
                        if($capaian_pengurangan < $target_pengurangan){
                            $id_disj_tam     = $disj_pengurangan[$r]['id_detail_item_surat_jalan'];
                            $jumlah_disj_tam = $disj_pengurangan[$r]['jumlah_produk'];
                            $id_dbpbj_tam    = $disj_pengurangan[$r]['id_detail_bpbj'];

                            $sisanya = $target_pengurangan - $capaian_pengurangan;
                            
                            if($jumlah_disj_tam < $sisanya){
                                $max = $jumlah_disj_tam;

                                $data_disj_tam = array(
                                    'status_delete' => 1,
                                    'user_delete'   => $user,
                                    'waktu_delete'  => $now
                                );

                                $where_disj_tam = array (
                                    'id_detail_item_surat_jalan' => $id_disj_tam
                                );

                                $this->M_SuratJalan->edit('detail_item_surat_jalan',$data_disj_tam,$where_disj_tam);

                                $bpbj_tam        = $this->M_SuratJalan->get_one_detbpbj($id_dbpbj_tam)->result_array();

                                $jumlah_bpbj_tam = $bpbj_tam[0]['jumlah_terkirim'];

                                $jumlah_bpbj_new = $jumlah_bpbj_tam - $max;

                                $data_bpbj_tam = array(
                                    'jumlah_terkirim'    => $jumlah_bpbj_new,
                                    'status_detail_bpbj' => 0,
                                    'user_edit'          => $user,
                                    'waktu_edit'         => $now
                                );

                                $where_bpbj_tam = array(
                                    'id_detail_bpbj' => $id_dbpbj_tam
                                );

                                $this->M_SuratJalan->edit('detail_bpbj',$data_bpbj_tam,$where_bpbj_tam);

                                $capaian_pengurangan = $capaian_pengurangan + $max;
                            }
                            else if($jumlah_disj_tam > $sisanya){
                                $max     = $sisanya;
                                $tersisa = $jumlah_disj_tam - $max;

                                $data_disj_tam = array(
                                    'jumlah_produk' => $tersisa,
                                    'user_edit'   => $user,
                                    'waktu_edit'  => $now
                                );

                                $where_disj_tam = array(
                                    'id_detail_item_surat_jalan' => $id_disj_tam
                                );

                                $this->M_SuratJalan->edit('detail_item_surat_jalan',$data_disj_tam,$where_disj_tam);

                                $bpbj_tam        = $this->M_SuratJalan->get_one_detbpbj($id_dbpbj_tam)->result_array();

                                $jumlah_bpbj_tam = $bpbj_tam[0]['jumlah_terkirim'];

                                $jumlah_bpbj_new = $jumlah_bpbj_tam - $max;

                                $data_bpbj_tam = array(
                                    'jumlah_terkirim'    => $jumlah_bpbj_new,
                                    'status_detail_bpbj' => 0,
                                    'user_edit'          => $user,
                                    'waktu_edit'         => $now
                                );

                                $where_bpbj_tam = array(
                                    'id_detail_bpbj' => $id_dbpbj_tam
                                );

                                $this->M_SuratJalan->edit('detail_bpbj',$data_bpbj_tam,$where_bpbj_tam);

                                $capaian_pengurangan = $capaian_pengurangan + $max;
                            }
                            else if($jumlah_disj_tam == $sisanya){
                                $max     = $sisanya;
                                $tersisa = $jumlah_disj_tam - $max;

                                $data_disj_tam = array(
                                    'status_delete' => 0,
                                    'jumlah_produk' => $tersisa,
                                    'user_edit'     => $user,
                                    'waktu_edit'    => $now
                                );

                                $where_disj_tam = array(
                                    'id_detail_item_surat_jalan' => $id_disj_tam
                                );

                                $this->M_SuratJalan->edit('detail_item_surat_jalan',$data_disj_tam,$where_disj_tam);

                                $bpbj_tam        = $this->M_SuratJalan->get_one_detbpbj($id_dbpbj_tam)->result_array();

                                $jumlah_bpbj_tam = $bpbj_tam[0]['jumlah_terkirim'];

                                $jumlah_bpbj_new = $jumlah_bpbj_tam - $max;

                                $data_bpbj_tam = array(
                                    'jumlah_terkirim'    => $jumlah_bpbj_new,
                                    'status_detail_bpbj' => 0,
                                    'user_edit'          => $user,
                                    'waktu_edit'         => $now
                                );

                                $where_bpbj_tam = array(
                                    'id_detail_bpbj' => $id_dbpbj_tam
                                );

                                $this->M_SuratJalan->edit('detail_bpbj',$data_bpbj_tam,$where_bpbj_tam);

                                $capaian_pengurangan = $capaian_pengurangan + $max;
                            }
                        }
                    }
                }
            }
        }
        redirect('suratJalan/belum_dikonfirmasi_surat_jalan');
    }

    public function delete(){
        $id   = $this->input->post('id_sj_hapus');

        $user = $_SESSION['id_user'];
        $now  =  date('Y-m-d H:i:s');
    
        $data_sj = array (
            'status_delete'  => 1,
            'user_delete'    => $user,
            'waktu_delete'   => $now
        );

        $where_sj = array (
            'id_surat_jalan'    => $id
        );

        $this->M_SuratJalan->edit('surat_jalan',$data_sj,$where_sj);

        $item_sj    = $this->M_SuratJalan->get_item_sj($id)->result_array();
        $jm_item_sj = $this->M_SuratJalan->get_item_sj($id)->num_rows();

        for($i=0;$i<$jm_item_sj;$i++){
            $id_isj = $item_sj[$i]['id_item_surat_jalan'];

            $data_isj = array (
                'status_delete'  => 1,
                'user_delete'    => $user,
                'waktu_delete'   => $now
            );
    
            $where_isj = array (
                'id_item_surat_jalan'    => $id_isj
            );
    
            $this->M_SuratJalan->edit('item_surat_jalan',$data_isj,$where_isj);

            $det_item_sj    = $this->M_SuratJalan->get_det_item_sj($id_isj)->result_array();
            $jm_det_item_sj = $this->M_SuratJalan->get_det_item_sj($id_isj)->num_rows();

            for($j=0;$j<$jm_det_item_sj;$j++){
                $id_det_isj = $det_item_sj[$j]['id_detail_item_surat_jalan'];

                $data_disj = array (
                    'status_delete'  => 1,
                    'user_delete'    => $user,
                    'waktu_delete'   => $now
                );
        
                $where_disj = array (
                    'id_detail_item_surat_jalan'    => $id_det_isj
                );

                $this->M_SuratJalan->edit('detail_item_surat_jalan',$data_disj,$where_disj);

                $jumlah_hapus   = $det_item_sj[$j]['jumlah_produk'];
                $id_detail_bpbj = $det_item_sj[$j]['id_detail_bpbj'];

                $jum_prod_det_bpbj = $this->M_SuratJalan->get_jm_produk_det_bpbj($id_detail_bpbj)->result_array();

                $jum_prod    = $jum_prod_det_bpbj[0]['jumlah_terkirim'];
                $jumlah_baru = $jum_prod - $jumlah_hapus;

                $data_det_bpbj = array (
                    'jumlah_terkirim'    => $jumlah_baru,
                    'status_detail_bpbj' => 0,
                    'user_edit'          => $user,
                    'waktu_edit'         => $now
                );

                $where_det_bpbj = array (
                    'id_detail_bpbj' => $id_detail_bpbj
                );

                $this->M_SuratJalan->edit('detail_bpbj',$data_det_bpbj,$where_det_bpbj);

                
                //ubah status bpbj
                $id_bpbj_sems = $this->M_SuratJalan->get_one_detbpbj($id_detail_bpbj)->result_array();
                $id_bpbj_sem  = $id_bpbj_sems[0]['id_bpbj'];

                $det_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->result_array();
                $jum_bpbj_sem = $this->M_SuratJalan->get_all_detail_bpbj($id_bpbj_sem)->num_rows();

                $count_det_bpbj_selesai = 0;
                $count_det_bpbj_terisi  = 0;

                for($f=0;$f<$jum_bpbj_sem;$f++){
                    $id_detail_bpbj_sem = $det_bpbj_sem[$f]['id_detail_bpbj'];
                    $jumlah_produk_sem  = $det_bpbj_sem[$f]['jumlah_produk'];
                    $jumlah_terkirim    = $det_bpbj_sem[$f]['jumlah_terkirim'];
                    $status_detbpbj     = $det_bpbj_sem[$f]['status_detail_bpbj'];

                    //echo $jumlah_produk_sem." - ".$jumlah_terkirim." - ".$status_detbpbj;
                    if($status_detbpbj == 1){
                        $count_det_bpbj_selesai++;
                    }
                    else{
                        if($jumlah_terkirim > 0){
                            $count_det_bpbj_terisi++;
                        }
                    }
                }

                if($count_det_bpbj_selesai == $jum_bpbj_sem){
                    //update status bpbj jadi 2 (selesai)

                    $data_bpbj = array (
                        'status_bpbj' => 2,
                        'user_edit'   => $user,
                        'waktu_edit'  => $now
                    );

                    $where_bpbj = array (
                        'id_bpbj' => $id_bpbj_sem
                    );

                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                }
                else if($count_det_bpbj_terisi > 0){
                    //update status bpbj jadi 1 (dalam proses)
                    $data_bpbj = array (
                        'status_bpbj' => 1,
                        'user_edit'   => $user,
                        'waktu_edit'  => $now
                    );

                    $where_bpbj = array (
                        'id_bpbj' => $id_bpbj_sem
                    );

                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                }
                else if($count_det_bpbj_terisi == 0){
                    //update status bpbj jadi 1 (dalam proses)
                    $data_bpbj = array (
                        'status_bpbj' => 0,
                        'user_edit'   => $user,
                        'waktu_edit'  => $now
                    );

                    $where_bpbj = array (
                        'id_bpbj' => $id_bpbj_sem
                    );

                    $this->M_SuratJalan->edit('bpbj',$data_bpbj,$where_bpbj);
                }
                
            }
        }
        redirect('suratJalan/belum_dikonfirmasi_surat_jalan');
    }

    public function konfirmasi(){
        $id_surat_jalan = $this->input->post('id_sjnya');
        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d');

        $data_sj = array(
            'status_surat_jalan' => 1,
            'user_edit'          => $user,
            'waktu_edit'         => $now
        );

        $where_sj = array(
            'id_surat_jalan' => $id_surat_jalan
        );

        $this->M_SuratJalan->edit('surat_jalan',$data_sj,$where_sj);

        redirect('suratJalan/semua_surat_jalan');
    }

    public function belum_dikonfirmasi_surat_jalan(){
        $data['po_aktif']    = $this->M_SuratJalan->select_all_po_aktif()->result();
        $data['surat_jalan'] = $this->M_SuratJalan->select_all_aktif()->result();
        $data['det_item_bpbd'] = $this->M_SuratJalan->select_sj_det_item_bpbd()->result(); 

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
    

        $this->load->view('v_surat_jalan_belum_dikonfirmasi',$data);
    }

    public function terkonfirmasi_surat_jalan(){
        $data['po_aktif']    = $this->M_SuratJalan->select_all_po_aktif()->result();
        $data['surat_jalan'] = $this->M_SuratJalan->select_all_aktif()->result();
        $data['det_item_bpbd'] = $this->M_SuratJalan->select_sj_det_item_bpbd()->result(); 

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
    

        $this->load->view('v_surat_jalan_terkonfirmasi',$data);
    }

    public function selesai_surat_jalan(){
        $data['po_aktif']    = $this->M_SuratJalan->select_all_po_aktif()->result();
        $data['surat_jalan'] = $this->M_SuratJalan->select_all_aktif()->result();
        $data['det_item_bpbd'] = $this->M_SuratJalan->select_sj_det_item_bpbd()->result(); 

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

        $this->load->view('v_surat_jalan_selesai',$data);
    }

    public function print(){
        $id_sj = $this->input->post('id_sj');

        $data['sj']     = $this->M_SuratJalan->get_sj_by_id_sj($id_sj)->result_array();
        $data['isj']    = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->result_array();
        $data['jm_isj'] = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->num_rows();
        $data['po']     = $this->M_SuratJalan->get_po_by_id_sj($id_sj)->result_array();

        $data['warna']    = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']  = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']   = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran'] = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $data['nama_perusahaan'] = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();
        $data['alamat']          = $this->M_Tetapan->cari_tetapan("Alamat Perusahaan")->result_array();
        $data['kota']            = $this->M_Tetapan->cari_tetapan("Kota Perusahaan")->result_array();

        $waktu = $data['sj'][0]['tanggal'];

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
        
        $data['tanggal'] = "$tanggal $bulan $tahun";
        

        $this->load->view('v_print_surat_jalan',$data);
    }

    public function printx(){
        $id_sj = $this->input->post('id_sj');

        $sj     = $this->M_SuratJalan->get_sj_by_id_sj($id_sj)->result_array();
        $isj    = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->result_array();
        $jm_isj = $this->M_SuratJalan->get_isj_by_id_sj($id_sj)->num_rows();
        $po     = $this->M_SuratJalan->get_po_by_id_sj($id_sj)->result_array();

        $warna    = $this->M_Warna->select_all_aktif()->result_array();
        $jmwarna  = $this->M_Warna->select_all_aktif()->num_rows();
        $ukuran   = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $jmukuran = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $nama_perusahaan = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();
        $alamat          = $this->M_Tetapan->cari_tetapan("Alamat Perusahaan")->result_array();
        $kota            = $this->M_Tetapan->cari_tetapan("Kota Perusahaan")->result_array();

        $pdf = new FPDF('l','mm','A5');
        //buat halaman baru
        $pdf->AddPage();
        
        //logo
        $pdf->Image(base_url('assets/images/logombp.png'),7,7,-300);
    
        //setting font
        $pdf->SetFont('Arial','B','11');
        //cetak string
        $pdf->Cell(15); //move
        $pdf->Cell(190,0,strtoupper($nama_perusahaan[0]['isi_tetapan']),0,1,'L');
    
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15);
        $pdf->Cell(190,10,'SURAT JALAN',0,1,'L');

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(15);
        $pdf->Cell(190,0,$alamat[0]['isi_tetapan'],0,1,'L');
        
        $pdf->Cell(115);
        $pdf->SetFont('Arial','B','9');
        $pdf->Cell(190,-30,$kota[0]['isi_tetapan'].', '.$sj[0]['tanggal'],0,1,'L');

        $pdf->Cell(115);
        $pdf->SetFont('Arial','B','9');
        $pdf->Cell(190,40,'Kepada Yth:',0,1,'L');

        $pdf->Cell(115);
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(190,-30,$po[0]['nama_customer'],0,1,'L');

        $pdf->Cell(115);
        $pdf->SetFont('Arial','B','10');
        $pdf->Cell(190,40,$po[0]['alamat_customer'],0,1,'L');

        $pdf->Cell(115);
        $pdf->SetFont('Arial','B','9');
        $pdf->Cell(190,-25,'Kode PO: '.$po[0]['kode_purchase_order_customer'],0,1,'L');

        $pdf->SetFont('Arial','B','9');
        $pdf->Cell(190,30,'No Surat Jalan: '.$sj[0]['id_surat_jalan'],0,1,'L');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,-18,'Bersama Ini Kendaraan: '. $sj[0]['kendaraan'] .', Kami mengirimkan barang-barang dibawah ini:',0,1,'L');
        
            $pdf->Cell(190,12,'',0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,6,'NO',1,0,'C');
            $pdf->Cell(20,6,'QTY',1,0,'C');
            $pdf->Cell(20,6,'Satuan',1,0,'C');
            $pdf->Cell(50,6,'Kode Produk',1,0,'C');
            $pdf->Cell(90,6,'Nama Produk',1,1,'C');
            
            $pdf->SetFont('Arial','',10);
    
        for($i=0;$i<$jm_isj;$i++){
            //nama produk
            if($isj[$i]['keterangan'] == 0){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $isj[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $isj[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $isj[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
            }
            else if($isj[$i]['keterangan'] == 1){
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $isj[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $isj[$i]['nama_produk'] . $nama_ukuran;
            }
            else if($isj[$i]['keterangan'] == 2){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $isj[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                $nama_produk = $isj[$i]['nama_produk'] . " (" . $nama_warna . ")";
            }
            else{
                $nama_produk = $isj[$i]['nama_produk'];
            }

            $pdf->Cell(10,6,($i+1),1,0,'C');
            $pdf->Cell(20,6,$isj[$i]['jumlah_produk'],1,0,'C');
            $pdf->Cell(20,6,'Pcs',1,0,'C');
            $pdf->Cell(50,6,$isj[$i]['kode_produk'],1,0,'C');
            $pdf->Cell(90,6,$nama_produk,1,1,'C');
        }
            
        //keterangan
        $pdf->Cell(2,3,'',0,1);
        $pdf->Cell(2,7,'Keterangan:',0,1);
        $pdf->Cell(190,12,$sj[0]['keterangan'],1,0,'L');
    
    
        $pdf->SetFont('Arial','B',10);
    
        $pdf->Cell(10,20,'',0,1);
        $pdf->Cell(100);
            $pdf->Cell(30,6,'TANDA TANGAN',1,0,'C');
            $pdf->Cell(60,6,'HORMAT KAMI',1,0,'C');

    
        $pdf->Cell(0,6,'',0,1);
        $pdf->Cell(100);
        $pdf->Cell(30,15,'',1,0,'C');
        $pdf->Cell(30,15,'',1,0,'C');
        $pdf->Cell(30,15,'',1,0,'C');
        
        $pdf->Cell(0,15,'',0,1);
        $pdf->Cell(100);
            $pdf->Cell(30,6,'',1,0,'C');
            $pdf->Cell(30,6,'DRIVER',1,0,'C');
        $pdf->Cell(30,6,'MENGETAHUI',1,0,'C');
            
        $pdf->Output();
    }

}
