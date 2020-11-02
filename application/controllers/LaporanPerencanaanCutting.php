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

        $this->load->library('pdf');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    function index(){
        $data['tanggal'] = $this->M_LaporanPerencanaanCutting->get_tanggal_perccutt_0()->result();

        $this->load->view('v_laporan_perencanaan_cutting_tambah',$data);
    }

    function semua(){
        $id_user = $_SESSION['id_user'];

        $data['tanggal']          = $this->M_LaporanPerencanaanCutting->get_tanggal_perccutt_semua()->result();
        $data['permohonan_akses'] = $this->M_PermohonanAkses->select_belum_selesai_by_id($id_user)->result();

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
        //$this->M_LaporanPerencanaanCutting->konfirmasi_ppic($tanggal);

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

                }
                //jika tidak ada, maka
                else{
                    //id inventory line, 
                    $jumlah_inli    = $this->M_HasilProduksi->select_all_inventory_line()->num_rows();
                    $id_number      = $jumlah_inli + 1;

                    $id_inli     = "INLI-".$id_number;

                    $data_inline = array(
                        'id_inventory_line'     => $id_inli,
                        'id_line'               => $id_line,
                        'id_sub_jenis_material' => $id_sub_jm,
                        'total_material'        => $wip,
                        'user_add'              => $user,
                        'waktu_add'             => $now
                        'status_delete'         => 0
                    );

                   // $this->M_LaporanHasilProduksi->insert('inventory_line',$data_inline);
                }

                /*
                $data_detail_inline = array(
                        'id_detail_inventory_line' =>
                        'id_inventory_line'        =>
                        'tanggal'                  => $tanggal,
                        'jumlah_material'          => $wip,
                        'status'                   => 0,
                        'user_add'                 => $user,
                        'waktu_add'                => $now,
                        'status_delete'            => 0
                );

                $this->M_LaporanPerencanaanCutting->insert('detail_inventory_line',$data_detail_inline);
                */

                //echo $id_line." || ".$id_sub_jm." || ".$wip."<br>";

                
            }
        }

        //echo $jumlah_detail;
    }

}
