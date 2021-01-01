<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryLine extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->model('M_InventoryLine');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['sub_jm']     = $this->M_InventoryLine->get_all_sub_jm()->result();
        $data['line']       = $this->M_InventoryLine->get_all_line()->result();
        $data['persediaan'] = $this->M_InventoryLine->get_all_inline()->result();

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
          }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
          }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
          }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $data['inventory_line']  = $this->M_InventoryLine->select_inline_line($line)->result();
        }
        else{
            $data['inventory_line']        = $this->M_InventoryLine->select_all()->result(); 
        }

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

        $this->load->view('v_persediaan_line',$data);
    }

    public function persediaan_masuk(){
      $id = $this->input->post('id');

      $data['det_inline']    = $this->M_InventoryLine->get_persediaan_masuk($id)->result_array();
      $data['jm_det_inline'] = $this->M_InventoryLine->get_persediaan_masuk($id)->num_rows();

      echo json_encode($data);
    }

    public function persediaan_keluar(){
      $id = $this->input->post('id');

      $data['det_inline']    = $this->M_InventoryLine->get_persediaan_keluar($id)->result_array();
      $data['jm_det_inline'] = $this->M_InventoryLine->get_persediaan_keluar($id)->num_rows();

      echo json_encode($data);
    }

    public function satuan_masuk(){
        $id = $this->input->post('id');

        $data['satuan'] = $this->M_InventoryLine->get_satuan($id)->result_array();

        echo json_encode($data);
    }

    public function tambah(){
        $id_line         = $this->input->post('line');
        $id_sub_jm       = $this->input->post('material');
        $jumlah_material = $this->input->post('jumlah_material');

        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d H:i:s');

        $cari_sebelum    = $this->M_InventoryLine->cari_inline($id_line,$id_sub_jm)->result_array();
        $jm_cari_sebelum = $this->M_InventoryLine->cari_inline($id_line,$id_sub_jm)->num_rows();

        //jika sebelumnya sudah ada, edit saja jumlahnya
        if($jm_cari_sebelum > 0){
            $total_mat_baru     = $cari_sebelum[0]['total_material'] + $jumlah_material;
            $id_persediaan_line = $cari_sebelum[0]['id_persediaan_line'];

            $data_persediaan_line = array(
                'total_material' => $total_mat_baru,
                'user_edit'      => $user,
                'waktu_edit'     => $now
            );

            $where_persediaan_line = array(
                'id_persediaan_line' => $id_persediaan_line
            );

            $this->M_InventoryLine->edit('persediaan_line',$data_persediaan_line,$where_persediaan_line);
        } 
        //jika belum, insert baru
        else{
            //id inventory line, 
            $jumlah_inli    = $this->M_InventoryLine->select_all_inventory_line()->num_rows();
            $id_number      = $jumlah_inli + 1;

            $id_persediaan_line = "SELI-".$id_number;

            $data_persediaan_line = array(
                'id_persediaan_line'   => $id_persediaan_line,
                'id_line'              => $id_line,
                'id_sub_jenis_material'=> $id_sub_jm,
                'total_material'       => $jumlah_material,
                'user_add'             => $user,
                'waktu_add'            => $now,
                'status_delete'        => 0
            );

            $this->M_InventoryLine->insert('persediaan_line',$data_persediaan_line);
        }
            //id persediaan line masuk
            $tanggal = date('Y-m-d');
            $tahun_sekarang = substr(date('Y',strtotime($now)),2,2);
            $bulan_sekarang = date('m',strtotime($now));
            $id_code        = "SELIM".$tahun_sekarang.$bulan_sekarang.".";
            
            $last       = $this->M_InventoryLine->get_last_selim_id($id_code)->result_array();
            $last_cek   = $this->M_InventoryLine->get_last_selim_id($id_code)->num_rows();
            
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

            $data_persediaan_line_masuk = array(
                'id_persediaan_line_masuk' => $id_dinli_baru,
                'id_persediaan_line'       => $id_persediaan_line,
                'tanggal'                  => date('Y-m-d'),
                'jumlah_material'          => $jumlah_material,
                'status'                   => 1,
                'user_add'                 => $user,
                'waktu_add'                => $now,
                'status_delete'            => 0
            );

            $this->M_InventoryLine->insert('persediaan_line_masuk',$data_persediaan_line_masuk);

            redirect('inventoryLine');
    }

    public function get_one_persediaan_line(){
        $id = $this->input->post('id');

        $data['seli'] = $this->M_InventoryLine->get_one_persediaan_line($id)->result_array();

        echo json_encode($data);
    }

    public function keluarkan(){
        $id               = $this->input->post('nama_persediaan');
        $jumlah_keluar    = $this->input->post('jumlah_keluar');
        $total_persediaan = $this->input->post('total_persediaan');

        //persediaan line
        $total_baru = $total_persediaan - $jumlah_keluar;

        $data_seli = array(
            'total_material' => $total_baru,
            'user_edit'      => $_SESSION['id_user'],
            'waktu_edit'     => date('Y-m-d')
        );

        $where_seli = array(
            'id_persediaan_line' => $id
        );
        
        $this->M_InventoryLine->edit('persediaan_line',$data_seli,$where_seli);

        //persediaan line keluar
        $tanggal = date('Y-m-d');
        $tahun_sekarang = substr(date('Y',strtotime($tanggal)),2,2);
        $bulan_sekarang = date('m',strtotime($tanggal));
        $id_code        = "SELIK".$tahun_sekarang.$bulan_sekarang.".";

        $last       = $this->M_InventoryLine->get_last_selik_id($id_code)->result_array();
        $last_cek   = $this->M_InventoryLine->get_last_selik_id($id_code)->num_rows();

        if($last_cek == 1){
            $id_terakhir    = $last[0]['id_persediaan_line_keluar'];

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
                    $id_dinli_baru = "SELIK".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                }
                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                else{
                    //id yang baru
                    $id_dinli_baru = "SELIK".$tahun_sekarang.$bulan_sekarang.".00001";
                }
            }
            //kalau tahun tidak sama
            else{
                //id yang baru
                $id_dinli_baru = "SELIK".$tahun_sekarang.$bulan_sekarang.".00001";
            }
        }
        else{
            //id yang baru
            $id_dinli_baru = "SELIK".$tahun_sekarang.$bulan_sekarang.".00001";
        }

        $data_selik = array(
            'id_persediaan_line_keluar' => $id_dinli_baru,
            'id_persediaan_line'        => $id,
            'tanggal'                   => $tanggal,
            'jumlah_material'           => $jumlah_keluar,
            'status'                    => 1,
            'user_add'                  => $_SESSION['id_user'],
            'waktu_add'                 => date('Y-m-d'),
            'status_delete'             => 0
        );

        $this->M_InventoryLine->insert('persediaan_line_keluar',$data_selik);
        
        redirect('inventoryLine');
    }
}

?>
