<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPerencanaanCutting extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_LaporanPerencanaanCutting');
        $this->load->model('M_PermohonanAkses');
        $this->load->model('M_HasilProduksi');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_Dashboard');

        $this->load->library('pdf');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    function index(){
        $data['tanggal'] = $this->M_LaporanPerencanaanCutting->get_tanggal_perccutt_0()->result();

            //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi
    

        $this->load->view('v_laporan_perencanaan_cutting_tambah',$data);
    }

    function semua(){
        $id_user = $_SESSION['id_user'];

        $data['tanggal']          = $this->M_LaporanPerencanaanCutting->get_tanggal_perccutt_semua()->result();
        $data['permohonan_akses'] = $this->M_PermohonanAkses->select_belum_selesai_by_id($id_user)->result();

            //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi
    

        $this->load->view('v_laporan_perencanaan_cutting_semua',$data);
    }

    function detail_perencanaan_cutting(){
        $tanggal = $this->input->post('tanggal');

        $data['percut']    = $this->M_LaporanPerencanaanCutting->get_semua_percut($tanggal)->result_array();
        $data['jm_percut'] = $this->M_LaporanPerencanaanCutting->get_semua_percut($tanggal)->num_rows();

        $data['km']    = $this->M_LaporanPerencanaanCutting->get_all_km()->result_array();
        $data['jm_km'] = $this->M_LaporanPerencanaanCutting->get_all_km()->num_rows();
    
        $data['pm']    = $this->M_LaporanPerencanaanCutting->get_all_pengambilan_material($tanggal)->result_array();
        $data['jm_pm'] = $this->M_LaporanPerencanaanCutting->get_all_pengambilan_material($tanggal)->num_rows();

        $data['det_inline']    = $this->M_LaporanPerencanaanCutting->get_detail_inline_out()->result_array();
        $data['jm_det_inline'] = $this->M_LaporanPerencanaanCutting->get_detail_inline_out()->num_rows();
        
        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    function coba_tambah_laporan(){
        $jumlah_detail = $this->input->post('jumlah_detail');

        for($i=0;$i<$jumlah_detail;$i++){
            $id_percut  = $this->input->post('id_percut'.$i);
            $jm_aktual  = $this->input->post('jm_aktual'.$i);
            $keterangan = $this->input->post('ket'.$i);

            $data_percut = array(
                'jumlah_aktual' => $jm_aktual,
                'keterangan'    => $keterangan,
                'status_laporan'=> 1,
                'user_edit'     => $_SESSION['id_user'],
                'waktu_edit'    => date('Y-m-d H:i:s')
            );

            $where_percut = array(
                'id_perencanaan_cutting' => $id_percut
            );

            $this->M_LaporanPerencanaanCutting->edit('perencanaan_cutting',$data_percut,$where_percut);
        }
        redirect('laporanPerencanaanCutting/index');
    }

    function edit_laporan(){
        $jumlah_detail = $this->input->post('jumlah_detail_edit');

        for($i=0;$i<$jumlah_detail;$i++){
            $id_percut  = $this->input->post('id_percut'.$i);
            $jm_aktual  = $this->input->post('jm_aktual'.$i);
            $keterangan = $this->input->post('ket'.$i);

            $data_percut = array(
                'jumlah_aktual' => $jm_aktual,
                'keterangan'    => $keterangan,
                'status_laporan'=> 1,
                'user_edit'     => $_SESSION['id_user'],
                'waktu_edit'    => date('Y-m-d H:i:s')
            );

            $where_percut = array(
                'id_perencanaan_cutting' => $id_percut
            );

            $this->M_LaporanPerencanaanCutting->edit('perencanaan_cutting',$data_percut,$where_percut);
        }

        redirect('laporanPerencanaanCutting/semua');
    }

    function konfirmasi_ppic(){
        $tanggal = $this->input->post('tanggalnya');
        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d H:i:s');

        //konfirmasi perencanaan cutting
        $this->M_LaporanPerencanaanCutting->konfirmasi_ppic($tanggal);

        //add di inventory line
        $jumlah_detail = $this->input->post('jumlah_detail_setuju');

        for($i=0;$i<$jumlah_detail;$i++){
            $wip       = $this->input->post('wip'.$i);

            if($wip > 0){
                $id_line   = $this->input->post('id_line'.$i);
                $id_sub_jm = $this->input->post('id_sub_jm'.$i);
                
                $cari_inline    = $this->M_LaporanPerencanaanCutting->get_inline($id_line,$id_sub_jm)->result_array();
                $jm_cari_inline = $this->M_LaporanPerencanaanCutting->get_inline($id_line,$id_sub_jm)->num_rows();

                //jika ditemukan
                if($jm_cari_inline > 0){
                    $id_inli                = $cari_inline[0]['id_persediaan_line'];
                    $total_material_sebelum = $cari_inline[0]['total_material'];

                    $total_material_baru = $total_material_sebelum + $wip;

                    $data_inventory_line = array(
                        'total_material' => $total_material_baru,
                        'user_edit'      => $user,
                        'waktu_edit'     => $now
                    );

                    $where_inventory_line = array(
                        'id_persediaan_line' =>  $id_inli
                    );

                    $this->M_LaporanPerencanaanCutting->edit('persediaan_line',$data_inventory_line,$where_inventory_line);
                }
                //jika tidak ada, maka
                else{
                    //id inventory line, 
                    $jumlah_inli    = $this->M_HasilProduksi->select_all_inventory_line()->num_rows();
                    $id_number      = $jumlah_inli + 1;

                    $id_inli     = "SELI-".$id_number;

                    $data_inline = array(
                        'id_persediaan_line'    => $id_inli,
                        'id_line'               => $id_line,
                        'id_sub_jenis_material' => $id_sub_jm,
                        'total_material'        => $wip,
                        'user_add'              => $user,
                        'waktu_add'             => $now,
                        'status_delete'         => 0
                    );
                    $this->M_LaporanPerencanaanCutting->insert('persediaan_line',$data_inline);
                }

                //DETAIL INVENTORY LINE
                    //id detail inventory line
                    $tahun_sekarang = substr(date('Y',strtotime($now)),2,2);
                    $bulan_sekarang = date('m',strtotime($now));
                    $id_code        = "SELIM".$tahun_sekarang.$bulan_sekarang.".";
        
                    $last       = $this->M_LaporanPerencanaanCutting->get_last_dinli_id_masuk($id_code)->result_array();
                    $last_cek   = $this->M_LaporanPerencanaanCutting->get_last_dinli_id_masuk($id_code)->num_rows();
        
                    //id
                    if($last_cek == 1){
                        $id_terakhir    = $last[0]['id_persediaan_line_masuk'];
        
                        $tahun_sebelum  = substr($id_terakhir,5,2);
                    
                        $bulan_sebelum  = substr($id_terakhir,7,2);
        
                        //kalau tahun sama
                        if($tahun_sebelum == $tahun_sekarang){
                            //kalau tahun & bulannya sama berarti count+1
                            if($bulan_sebelum == $bulan_sekarang){
                                $count = intval(substr($id_terakhir,10,5)) + 1;
                                $pjg   = strlen($count);
        
                                if($pjg == 1){
                                    $count_baru = "0000".$count;
                                }
                                else if($pjg == 2){
                                    $count_baru = "000".$count;
                                }
                                else if($pjg == 3){
                                    $count_baru = "00".$count;
                                }
                                else if($pjg == 4){
                                    $count_baru = "0".$count;
                                }
                                else{
                                    $count_baru = $count;
                                }
                                
                                //id yang baru
                                $id_dinli_baru = "SELIM".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                            }
                            //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                            else{
                                //id yang baru
                                $id_dinli_baru = "SELIM".$tahun_sekarang.$bulan_sekarang.".00001";
                            }
                        }
                        //kalau tahun tidak sama
                        else{
                            //id yang baru
                            $id_dinli_baru = "SELIM".$tahun_sekarang.$bulan_sekarang.".00001";
                        }
                    }
                    else{
                        //id yang baru
                        $id_dinli_baru = "SELIM".$tahun_sekarang.$bulan_sekarang.".00001";
                    }

                    $data_detail_inline = array(
                            'id_persediaan_line_masuk' => $id_dinli_baru,
                            'id_persediaan_line'       => $id_inli,
                            'tanggal'                  => $tanggal,
                            'jumlah_material'          => $wip,
                            'status'                   => 0,
                            'user_add'                 => $user,
                            'waktu_add'                => $now,
                            'status_delete'            => 0
                    );

                    $this->M_LaporanPerencanaanCutting->insert('persediaan_line_masuk',$data_detail_inline);
                //tutup detail inventory line
            }
        }
    }

}
