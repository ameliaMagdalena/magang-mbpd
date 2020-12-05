<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengambilanMaterialProduksi extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->model('M_PengambilanMaterialProduksi');
        $this->load->model('M_LaporanPerencanaanCutting');
        $this->load->model('M_Line');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_Dashboard');
        
        $this->load->library('pdf');

    }

    public function tambah0(){
      $data['line'] = $this->M_Line->select_all_aktif()->result();

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
  

      $this->load->view('v_pengambilan_material_produksi_tambah0',$data);
    }

	  public function tambah(){
      $data['min_date'] = date('Y-m-d');

      if($_SESSION['nama_jabatan'] == "PIC Line Cutting"){
        $nmline = "Line Cutting";
      } else if($_SESSION['nama_jabatan'] == "PIC Line Bonding"){
        $nmline = "Line Bonding";
      } else if($_SESSION['nama_jabatan'] == "PIC Line Sewing"){
        $nmline = "Line Sewing";
      } else if($_SESSION['nama_jabatan'] == "PIC Line Assy"){
        $nmline = "Line Assy";
      } else{
        $nmline = $this->input->post('select_line');
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
      //tutup
  

      if($nmline == "Line Sewing"){
        $this->load->view('v_pengambilan_material_produksi_tambah1',$data);
      }
      else{
        $data['permat']        = $this->M_PengambilanMaterialProduksi->get_one_permat_by_line($nmline,$data['min_date'])->result();
        $data['warna']         = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']        = $this->M_UkuranProduk->select_all_aktif()->result();

        $this->load->view('v_pengambilan_material_produksi_tambah2',$data);
      }
    }

    public function buat_pengambilan_material(){
      $data['min_date'] = $this->input->post('tanggal');
      $nmline = "Line Sewing";
      
      $data['permat']        = $this->M_PengambilanMaterialProduksi->get_one_permat_by_line($nmline,$data['min_date'])->result();
      $data['warna']         = $this->M_Warna->select_all_aktif()->result();
      $data['ukuran']        = $this->M_UkuranProduk->select_all_aktif()->result();

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
  

      $this->load->view('v_pengambilan_material_produksi_tambah2',$data);
    }

    public function detail_permintaan(){
      $id = $this->input->post('id');

      $data['permat']       = $this->M_PengambilanMaterialProduksi->get_one_permat($id)->result_array();
      $data['detpermat']    = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id)->result_array();
      $data['jm_detpermat'] = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id)->num_rows();
      $data['pengmat']      = $this->M_PengambilanMaterialProduksi->get_pengmat_sebelum()->result_array();
      $data['jm_pengmat']   = $this->M_PengambilanMaterialProduksi->get_pengmat_sebelum()->num_rows();
      $data['wip']          = $this->M_PengambilanMaterialProduksi->get_wip()->result_array();
      $data['jm_wip']       = $this->M_PengambilanMaterialProduksi->get_wip()->num_rows();

      $data['det_inline']   = $this->M_PengambilanMaterialProduksi->get_det_inline()->result_array();
      $data['jm_det_inline']= $this->M_PengambilanMaterialProduksi->get_det_inline()->num_rows();

      $data['pertam']    = $this->M_PengambilanMaterialProduksi->get_pertam($id)->result_array();
      $data['jm_pertam'] = $this->M_PengambilanMaterialProduksi->get_pertam($id)->num_rows();


      echo json_encode($data);
    }

    public function tambah_permintaan_pengambilan(){
      $jumlah             = $this->input->post("jumlah_detpermat");
      $tanggal_produksi   = $this->input->post('tanggal_produksi_add');
      $status_pengambilan = $this->input->post("status_pengambilan");

      $user          = $_SESSION['id_user'];
      $now           = date('Y-m-d H:i:s');
      $tanggal_ambil = date('Y-m-d');

      $karyawan    = $this->M_PengambilanMaterialProduksi->get_karyawan($user)->result_array();
      $id_karyawan = $karyawan[0]['id_karyawan'];

      for($i=0;$i<$jumlah;$i++){
        $id_detail_permat = $this->input->post("id_det_permat".$i);
        $id_sub_jenmat    = $this->input->post("id_sub_jenmat".$i);
        $wip              = $this->input->post("wip".$i);
        $akan_diambil     = $this->input->post("ambil".$i);
        $keterangan       = $this->input->post("keterangan".$i);
        
          if($akan_diambil > 0){
            $tahun_sekarangnya = substr(date('Y',strtotime($now)),2,2);
            $bulan_sekarangnya = date('m',strtotime($now));

            $idcode_ammat = "MBP/AMBIL/".$bulan_sekarangnya."/".$tahun_sekarangnya."/";

            $id_ammat_last     = $this->M_PengambilanMaterialProduksi->get_last_ammat_id($idcode_ammat)->result_array();
            $id_ammat_last_cek = $this->M_PengambilanMaterialProduksi->get_last_ammat_id($idcode_ammat)->num_rows();

            if($id_ammat_last_cek == 1){
                $id_terakhirnya    = $id_ammat_last[0]['id_pengambilan_material'];

                $tahun_sebelumnya  = substr($id_terakhirnya,13,2);
                $bulan_sebelumnya  = substr($id_terakhirnya,10,2);
                        
                //kalau tahun sama
                if($tahun_sebelumnya == $tahun_sekarangnya){
                    //kalau tahun & bulannya sama berarti count+1
                    if($bulan_sebelumnya == $bulan_sekarangnya){
                        $countnya = intval(substr($id_terakhirnya,16,3)) + 1;
                        $pjgnya   = strlen($countnya);
            
                        if($pjgnya == 1){
                            $countnya_baru = "00".$countnya;
                        }
                        else if($pjgnya == 2){
                            $countnya_baru = "0".$countnya;
                        }
                        else{
                            $countnya_baru = $countnya;
                        }
                        
                        //id yang baru
                        $id_ammat_baru = "MBP/AMBIL/".$bulan_sebelumnya."/".$tahun_sebelumnya."/".$countnya_baru;
                    }
                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                    else{
                        //id yang baru
                        $id_ammat_baru = "MBP/AMBIL/".$bulan_sebelumnya."/".$tahun_sebelumnya."/001";
                    }
                }
                //kalau tahun tidak sama
                else{
                    //id yang baru
                    $id_ammat_baru = "MBP/AMBIL/".$bulan_sebelumnya."/".$tahun_sebelumnya."/001";
                }
            }
            else{
                //id yang baru
                $id_ammat_baru = "MBP/AMBIL/".$bulan_sekarangnya."/".$tahun_sekarangnya."/001";
            }

            //get ukuran_satuan_keluar
            $sub_jen_mat          = $this->M_PengambilanMaterialProduksi->get_sub_jenis_material($id_sub_jenmat)->result_array();
            $ukuran_satuan_keluar = $sub_jen_mat[0]['ukuran_satuan_keluar'];

            //inventory line
              if($wip == 0){
                $total_ambil_kotor       = $akan_diambil / $ukuran_satuan_keluar;
                $total_ambil_kotor_bulat = ceil($total_ambil_kotor);

                $data_pengambilan_material = array(
                  'id_pengambilan_material'       => $id_ammat_baru,
                  'id_karyawan'                   => $id_karyawan,
                  'id_detail_permintaan_material' => $id_detail_permat,
                  'tanggal_ambil'                 => $tanggal_ambil,
                  'stok_wip'                      => 0,
                  'jumlah_ambil'                  => $akan_diambil,
                  'keterangan'                    => $keterangan,
                  'status_pengambilan'            => $status_pengambilan,
                  'status_keluar'                 => 0,
                  'user_add'                      => $user,
                  'waktu_add'                     => $now,
                  'status_delete'                 => 0
                );

                $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data_pengambilan_material);              
              } else{
                //inventory line
                  $permintaan_material = $this->M_PengambilanMaterialProduksi->get_one_permat_by_detpermat($id_detail_permat)->result_array();
                  $id_line             = $permintaan_material[0]['id_line'];

                  $cari_inline = $this->M_LaporanPerencanaanCutting->get_inline($id_line,$id_sub_jenmat)->result_array();

                  $id_inline          = $cari_inline[0]['id_persediaan_line'];
                  $jumlah_inline_lama = $cari_inline[0]['total_material'];

                  if($jumlah_inline_lama > $akan_diambil){
                    $jumlah_inline_baru = $jumlah_inline_lama - $akan_diambil;
                  } else{
                    $jumlah_inline_baru = 0;
                  }

                  $data_inline = array(
                    'total_material' => $jumlah_inline_baru,
                    'user_edit'      => $user,
                    'waktu_edit'     => $now
                  );

                  $where_inline = array(
                    'id_persediaan_line' => $id_inline
                  );

                  $this->M_PengambilanMaterialProduksi->edit('persediaan_line',$data_inline,$where_inline);

                  //PERSEDIAAN LINE KELUAR
                      //id persediaan line keluar
                        $tanggal = date('Y-m-d');
                        $tahun_sekarang = substr(date('Y',strtotime($now)),2,2);
                        $bulan_sekarang = date('m',strtotime($now));
                        $id_code        = "SELIK".$tahun_sekarang.$bulan_sekarang.".";
            
                        $last       = $this->M_LaporanPerencanaanCutting->get_last_dinli_id($id_code)->result_array();
                        $last_cek   = $this->M_LaporanPerencanaanCutting->get_last_dinli_id($id_code)->num_rows();
            
                        //id
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
                      //tutup id persediaan line keluar

                        if($akan_diambil > $wip){
                          $line_keluar = $wip;
                        } else{
                          $line_keluar = $akan_diambil;
                        }

                      $data_detail_inline = array(
                              'id_persediaan_line_keluar'     => $id_dinli_baru,
                              'id_persediaan_line'            => $id_inline,
                              'id_pengambilan_material'       => $id_ammat_baru,
                              'tanggal'                       => $tanggal,
                              'jumlah_material'               => $line_keluar,
                              'user_add'                      => $user,
                              'waktu_add'                     => $now,
                              'status_delete'                 => 0
                      );

                      $this->M_PengambilanMaterialProduksi->insert('persediaan_line_keluar',$data_detail_inline);
                  //tutup persediaan line keluar
                  
                //tutup inventory line

                if($akan_diambil > $wip){
                  $ambil_gudangnya = $akan_diambil - $wip; 

                  $data_pengambilan_material = array(
                    'id_pengambilan_material'       => $id_ammat_baru,
                    'id_karyawan'                   => $id_karyawan,
                    'id_detail_permintaan_material' => $id_detail_permat,
                    'tanggal_ambil'                 => $tanggal_ambil,
                    'stok_wip'                      => $wip,
                    'jumlah_ambil'                  => $ambil_gudangnya,
                    'keterangan'                    => $keterangan,
                    'status_pengambilan'            => $status_pengambilan,
                    'status_keluar'                 => 0,
                    'user_add'                      => $user,
                    'waktu_add'                     => $now,
                    'status_delete'                 => 0
                  );
    
                  $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data_pengambilan_material);
                } else{
                  $data_pengambilan_material = array(
                    'id_pengambilan_material'       => $id_ammat_baru,
                    'id_karyawan'                   => $id_karyawan,
                    'id_detail_permintaan_material' => $id_detail_permat,
                    'tanggal_ambil'                 => $tanggal_ambil,
                    'stok_wip'                      => $akan_diambil,
                    'jumlah_ambil'                  => 0,
                    'keterangan'                    => $keterangan,
                    'status_pengambilan'            => $status_pengambilan,
                    'status_keluar'                 => 0,
                    'user_add'                      => $user,
                    'waktu_add'                     => $now,
                    'status_delete'                 => 0
                  );
    
                  $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data_pengambilan_material);
                }
              }
            //tutup inventory line

            //jika pengambilan untuk cutting kain, maka input perencanaan cutting kain
            if($status_pengambilan == 0){
              //cari perencanaan cutting sebelumnya
              $tanggal_pc              = date('Y-m-d');

              $permintaan_material = $this->M_PengambilanMaterialProduksi->get_one_permat_by_detpermat($id_detail_permat)->result_array();

              $tanggal_produksi                  = $permintaan_material[0]['tanggal_produksi'];
              $id_line                           = $permintaan_material[0]['id_line'];
              $id_detail_purchase_order_customer = $permintaan_material[0]['id_detail_purchase_order_customer'];

              $det_prodline    = $this->M_PengambilanMaterialProduksi->get_one_detail_prodline($tanggal_produksi,$id_line,$id_detail_purchase_order_customer)->result_array();
              $id_det_prodline = $det_prodline[0]['id_detail_produksi_line'];
              $jumlah_item_perencanaan = $det_prodline[0]['jumlah_item_perencanaan'];

              $perencanaan_cutting = $this->M_PengambilanMaterialProduksi->get_one_perencanaan_cutting($tanggal_pc,$id_det_prodline)->num_rows();

              //jika belum ada, tambahkan baru
              if($perencanaan_cutting == 0){
                //PCUT2010.00000
                $idcode_pcut = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                $id_pcut_last     = $this->M_PengambilanMaterialProduksi->get_last_pcut_id($idcode_pcut)->result_array();
                $id_pcut_last_cek = $this->M_PengambilanMaterialProduksi->get_last_pcut_id($idcode_pcut)->num_rows();
    
                if($id_pcut_last_cek == 1){
                    $id_terakhirnya    = $id_pcut_last[0]['id_perencanaan_cutting'];
    
                    $tahun_sebelumnya  = substr($id_terakhirnya,4,2);
                    $bulan_sebelumnya  = substr($id_terakhirnya,6,2);
                            
                    //kalau tahun sama
                    if($tahun_sebelumnya == $tahun_sekarangnya){
                        //kalau tahun & bulannya sama berarti count+1
                        if($bulan_sebelumnya == $bulan_sekarangnya){
                            $countnya = intval(substr($id_terakhirnya,9,5)) + 1;
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
                            $id_pcut_baru = "PCUT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                        }
                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                        else{
                            //id yang baru
                            $id_pcut_baru = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                        }
                    }
                    //kalau tahun tidak sama
                    else{
                        //id yang baru
                        $id_pcut_baru = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                    }
                }
                else{
                    //id yang baru
                    $id_pcut_baru = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                }

                $data_perencanaan_cutting = array(
                  'id_perencanaan_cutting' => $id_pcut_baru,
                  'id_detail_produksi_line'=> $id_det_prodline,
                  'tanggal'                => $tanggal_pc,
                  'jumlah_perencanaan'     => $jumlah_item_perencanaan,
                  'status_laporan'         => 0,
                  'user_add'               => $user,
                  'waktu_add'              => $now,
                  'status_delete'          => 0
                );

                $this->M_PengambilanMaterialProduksi->insert('perencanaan_cutting',$data_perencanaan_cutting);
              }
            }
          }
      }
      redirect('pengambilanMaterialProduksi/semua_pengambilan_material');
    }

    public function buat_permintaan_tambahan(){
      $jumlah = $this->input->post('jumlah_pertam_tambahan');
      $now = date('Y-m-d H:i:s');

      for($i=0;$i<$jumlah;$i++){
        $id_pertam          = $this->input->post('id_pertam'.$i);
        $id_det_permat      = $this->input->post('id_det_permat'.$i);
        $jumlah_ambil       = $this->input->post('jumlah_tambah'.$i);
        $keterangan         = $this->input->post('keterangan'.$i);
        $status_pengambilan = $this->input->post('stat_km'.$i);

        $karyawan    = $this->M_PengambilanMaterialProduksi->get_karyawan($_SESSION['id_user'])->result_array();
        $id_karyawan = $karyawan[0]['id_karyawan'];


        $tahun_sekarangnya = substr(date('Y',strtotime($now)),2,2);
        $bulan_sekarangnya = date('m',strtotime($now));

        $idcode_ammat = "MBP/AMBIL/".$bulan_sekarangnya."/".$tahun_sekarangnya."/";

        $id_ammat_last     = $this->M_PengambilanMaterialProduksi->get_last_ammat_id($idcode_ammat)->result_array();
        $id_ammat_last_cek = $this->M_PengambilanMaterialProduksi->get_last_ammat_id($idcode_ammat)->num_rows();
        
        if($id_ammat_last_cek == 1){
            $id_terakhirnya    = $id_ammat_last[0]['id_pengambilan_material'];

            $tahun_sebelumnya  = substr($id_terakhirnya,13,2);
            $bulan_sebelumnya  = substr($id_terakhirnya,10,2);
                    
            //kalau tahun sama
            if($tahun_sebelumnya == $tahun_sekarangnya){
                //kalau tahun & bulannya sama berarti count+1
                if($bulan_sebelumnya == $bulan_sekarangnya){
                    $countnya = intval(substr($id_terakhirnya,16,3)) + 1;
                    $pjgnya   = strlen($countnya);
        
                    if($pjgnya == 1){
                        $countnya_baru = "00".$countnya;
                    }
                    else if($pjgnya == 2){
                        $countnya_baru = "0".$countnya;
                    }
                    else{
                        $countnya_baru = $countnya;
                    }
                    
                    //id yang baru
                    $id_ammat_baru = "MBP/AMBIL/".$bulan_sebelumnya."/".$tahun_sebelumnya."/".$countnya_baru;
                }
                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                else{
                    //id yang baru
                    $id_ammat_baru = "MBP/AMBIL/".$bulan_sebelumnya."/".$tahun_sebelumnya."/001";
                }
            }
            //kalau tahun tidak sama
            else{
                //id yang baru
                $id_ammat_baru = "MBP/AMBIL/".$bulan_sebelumnya."/".$tahun_sebelumnya."/001";
            }
        }
        else{
            //id yang baru
            $id_ammat_baru = "MBP/AMBIL/".$bulan_sekarangnya."/".$tahun_sekarangnya."/001";
        } 

          $data = array(
            'id_pengambilan_material'       => $id_ammat_baru,
            'id_karyawan'                   => $id_karyawan,
            'id_detail_permintaan_material' => $id_det_permat,
            'tanggal_ambil'                 => date('Y-m-d'),
            'stok_wip'                      => 0,
            'jumlah_ambil'                  => $jumlah_ambil,
            'keterangan'                    => $keterangan,
            'status_pengambilan'            => $status_pengambilan,
            'status_keluar'                 => 0,
            'status_permintaan'             => 1,
            'user_add'                      => $_SESSION['id_user'],
            'waktu_add'                     => $now
          );

          $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data);
        

        //update permintaan tambahan
          $data_pertam = array(
            'id_pengambilan_material' => $id_ammat_baru,
            'status'                  => 3,
            'user_edit'               => $_SESSION['id_user'],
            'waktu_edit'              => $now
          );

          $where_pertam = array(
            'id_permintaan_tambahan' => $id_pertam
          );

          $this->M_PengambilanMaterialProduksi->edit('permintaan_tambahan',$data_pertam,$where_pertam); 
      }

      redirect('pengambilanMaterialProduksi/tambah');
    }

    public function semua_pengambilan_material0(){
      $data['line'] = $this->M_Line->select_all_aktif()->result();

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

      $this->load->view('v_pengambilan_material_produksi_semua0',$data);
    }

    public function semua_pengambilan_material(){
      if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
          $line = "Line Cutting";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
          $line = "Line Bonding";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
          $line = "Line Sewing";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
          $line = "Line Assy";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
      else{
          $line = $this->input->post('select_line');
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
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
      //tutup
  

      $this->load->view('v_pengambilan_material_produksi_semua',$data);
    }

    public function belum_diambil_pengambilan_material(){
      if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
        $line = "Line Cutting";
        $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
          $line = "Line Bonding";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
          $line = "Line Sewing";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
          $line = "Line Assy";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
      else{
          $line = $this->input->post('select_line');
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
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
      //tutup

      
      $this->load->view('v_pengambilan_material_produksi_belum_diambil',$data);
    }

    public function sudah_diambil_pengambilan_material(){
      if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
        $line = "Line Cutting";
        $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
          $line = "Line Bonding";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
          $line = "Line Sewing";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
          $line = "Line Assy";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
      else{
          $line = $this->input->post('select_line');
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
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
      //tutup
  

      $this->load->view('v_pengambilan_material_produksi_sudah_diambil',$data);
    }

    public function batal_pengambilan_material(){
      if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
        $line = "Line Cutting";
        $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
          $line = "Line Bonding";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
          $line = "Line Sewing";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
        }
      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
          $line = "Line Assy";
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
      else{
          $line = $this->input->post('select_line');
          $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
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
      //tutup
  

      $this->load->view('v_pengambilan_material_produksi_batal',$data);
    }

    public function detail_pengambilan(){
      $id = $this->input->post('id');

      $data['pengmat'] = $this->M_PengambilanMaterialProduksi->get_pengmat($id)->result_array();

      echo json_encode($data);
    }

    public function detail_permintaan_pengambilan(){
      $id_permintaan = $this->input->post('id');

      $data['one_pengmat'] = $this->M_PengambilanMaterialProduksi->get_pengmat($id_permintaan)->result_array();

      $id_permintaan_material = $data['one_pengmat'][0]['id_permintaan_material'];

      $data['permat']       = $this->M_PengambilanMaterialProduksi->get_one_permat($id_permintaan_material)->result_array();
      $data['detpermat']    = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id_permintaan_material)->result_array();
      $data['jm_detpermat'] = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id_permintaan_material)->num_rows();
      $data['pengmat']      = $this->M_PengambilanMaterialProduksi->get_pengmat_sebelum()->result_array();
      $data['jm_pengmat']   = $this->M_PengambilanMaterialProduksi->get_pengmat_sebelum()->num_rows();
      $data['wip']          = $this->M_PengambilanMaterialProduksi->get_wip()->result_array();
      $data['jm_wip']       = $this->M_PengambilanMaterialProduksi->get_wip()->num_rows();

      $data['det_inline']   = $this->M_PengambilanMaterialProduksi->get_det_inline()->result_array();
      $data['jm_det_inline']= $this->M_PengambilanMaterialProduksi->get_det_inline()->num_rows();

      $data['pertam']    = $this->M_PengambilanMaterialProduksi->get_pertam($id_permintaan_material)->result_array();
      $data['jm_pertam'] = $this->M_PengambilanMaterialProduksi->get_pertam($id_permintaan_material)->num_rows();

      echo json_encode($data);
    }

    public function edit_permintaan_pengambilan(){
      $id_pengambilan_material = $this->input->post('id_pengmat_ed');
      $id_sub_jenis_material   = $this->input->post('id_sub_jenmat');
      $jumlah_lama             = $this->input->post('jumlah_lama');
      $jumlah_baru             = $this->input->post('ambil');
      $jumlah_pakai_wip_sebelum= $this->input->post('jumlah_wip_lama');
      $wip                     = $this->input->post('wip');
      $keterangan              = $this->input->post('keterangan');

      $user = $_SESSION['id_user'];
      $now  = date('Y-m-d H:i:s');
      
      if($jumlah_baru > $jumlah_lama){
          $selisih_tambah = $jumlah_baru - $jumlah_lama;

          if($selisih_tambah <= $wip){
            $stok_wip              = $jumlah_pakai_wip_sebelum + $selisih_tambah;
            $ambil_gudang          = 0;
            $jumlah_pakai_wip_baru = $selisih_tambah;
          } else if($selisih_tambah > $wip){
            $stok_wip              = $jumlah_pakai_wip_sebelum + $wip;
            $ambil_gudang          = $jumlah_baru - $stok_wip;
            $jumlah_pakai_wip_baru = $wip;
          }

          //update pengambilan material
              $data_pengmat = array(
                'stok_wip'     => $stok_wip,
                'jumlah_ambil' => $ambil_gudang,
                'keterangan'   => $keterangan,
                'user_edit'    => $user,
                'waktu_edit'   => $now
              );

              $where_pengmat = array(
                'id_pengambilan_material' => $id_pengambilan_material
              );

              $this->M_PengambilanMaterialProduksi->edit('pengambilan_material',$data_pengmat,$where_pengmat);
          //tutup update pengambilan material

          //update persediaan line
              if($wip > 0){
                $selik    = $this->M_PengambilanMaterialProduksi->get_one_selik($id_pengambilan_material)->result_array();
                $jm_selik = $this->M_PengambilanMaterialProduksi->get_one_selik($id_pengambilan_material)->num_rows();

                //persediaan line keluar
                  if($jm_selik > 0){
                    $id_persediaan_line_keluar = $selik[0]['id_persediaan_line_keluar'];
                    $id_persediaan_line        = $selik[0]['id_persediaan_line'];
                    $jumlah_selik_sebelum      = $selik[0]['jumlah_material'];
                    $jumlah_persediaan_sebelum = $selik[0]['total_material'];


                    $jumlah_material_baru = $jumlah_selik_sebelum + $jumlah_pakai_wip_baru;
                      $data_selik = array(
                        'jumlah_material' => $jumlah_material_baru,
                        'user_edit'       => $user,
                        'waktu_edit'      => $now
                      );

                      $where_selik = array(
                        'id_persediaan_line_keluar' => $id_persediaan_line_keluar
                      );

                      $this->M_PengambilanMaterialProduksi->edit('persediaan_line_keluar',$data_selik,$where_selik);
                  } else{
                    //id_persediaan_line
                    $persediaan_line = $this->M_PengambilanMaterialProduksi->get_one_persediaan_line($id_sub_jenis_material)->result_array();
                    
                    //id persediaan line keluar
                      $tanggal = date('Y-m-d');
                      $tahun_sekarang = substr(date('Y',strtotime($now)),2,2);
                      $bulan_sekarang = date('m',strtotime($now));
                      $id_code        = "SELIK".$tahun_sekarang.$bulan_sekarang.".";
          
                      $last       = $this->M_LaporanPerencanaanCutting->get_last_dinli_id($id_code)->result_array();
                      $last_cek   = $this->M_LaporanPerencanaanCutting->get_last_dinli_id($id_code)->num_rows();
          
                      //id
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
                    //tutup id persediaan line keluar

                    $data_selik = array(
                      'id_persediaan_line_keluar' => $id_dinli_baru,
                      'id_persediaan_line'        => $persediaan_line[0]['id_persediaan_line'],
                      'id_pengambilan_material'   => $id_pengambilan_material,
                      'tanggal'                   => date('Y-m-d'),
                      'jumlah_material'           => $jumlah_pakai_wip_baru,
                      'user_add'                  => $user,
                      'waktu_add'                 => $now,
                      'status_delete'             => 0
                    );

                    $this->M_PengambilanMaterialProduksi->insert('persediaan_line_keluar',$data_selik);
                  }
                //tutup persediaan line keluar

                //persediaan line
                    $jumlah_persediaan_baru = $jumlah_persediaan_sebelum - $jumlah_pakai_wip_baru;

                    $data_perline = array(
                        'total_material' => $jumlah_persediaan_baru,
                        'user_edit'      => $user,
                        'waktu_edit'     => $now
                    );

                    $where_perline = array(
                        'id_persediaan_line' => $id_persediaan_line
                    );

                    $this->M_PengambilanMaterialProduksi->edit('persediaan_line',$data_perline,$where_perline);
                //tutup persediaan line
              } 
          //tutup update persediaan line  
      } else if($jumlah_baru < $jumlah_lama){
          $jumlah_yang_akan_dikurangkan = $jumlah_lama - $jumlah_baru;
          $jumlah_pakai_wip_lama        = $jumlah_pakai_wip_sebelum;
          $jumlah_pakai_gudang_lama     = $jumlah_lama - $jumlah_pakai_wip_lama;

          //jika pakai gudang lebih dari yang akan dikurangkan, kurangi semuanya di gudang
          if($jumlah_pakai_gudang_lama > $jumlah_yang_akan_dikurangkan){
              //update pengambilan material
                  $jumlah_ambil = $jumlah_pakai_gudang_lama - $jumlah_yang_akan_dikurangkan;

                  $data_pengmat = array(
                    'jumlah_ambil' => $jumlah_ambil,
                    'keterangan'   => $keterangan,
                    'user_edit'    => $user,
                    'waktu_edit'   => $now
                  );

                  $where_pengmat = array(
                    'id_pengambilan_material' => $id_pengambilan_material
                  );

                  $this->M_PengambilanMaterialProduksi->edit('pengambilan_material',$data_pengmat,$where_pengmat);
              //tutup update pengambilan material
          }
          //jika pakai gudang == 0, kurangi semua di wip
          else if($jumlah_pakai_gudang_lama == 0){
              $selik    = $this->M_PengambilanMaterialProduksi->get_one_selik($id_pengambilan_material)->result_array();

              $total_material_seli = $selik[0]['total_material'] + $jumlah_yang_akan_dikurangkan;
              //persediaan line
                  $data_persediaan_line = array(
                    'total_material' => $total_material_seli,
                    'user_edit'      => $user,
                    'waktu_edit'     => $now
                  );

                  $where_persediaan_line = array(
                    'id_persediaan_line' => $selik[0]['id_persediaan_line']
                  );

                  $this->M_PengambilanMaterialProduksi->edit('persediaan_line',$data_persediaan_line,$where_persediaan_line);
              //tutup persediaan line

              //persediaan line keluar
                  $jumlah_selik_baru = $selik[0]['jumlah_material'] - $jumlah_yang_akan_dikurangkan;
                  
                  $data_persediaan_line_keluar = array(
                    'jumlah_material'=> $jumlah_selik_baru,
                    'user_edit'      => $user,
                    'waktu_edit'     => $now
                  );

                  $where_persediaan_line_keluar = array(
                    'id_persediaan_line_keluar' => $selik[0]['id_persediaan_line_keluar']
                  );

                  $this->M_PengambilanMaterialProduksi->edit('persediaan_line_keluar',$data_persediaan_line_keluar,$where_persediaan_line_keluar);
              //tutup persediaan line keluar

              //update pengambilan material
                  $stok_wip_baru = $jumlah_pakai_wip_lama - $jumlah_yang_akan_dikurangkan;

                  $data_pengmat = array(
                    'stok_wip'     => $stok_wip_baru,
                    'jumlah_ambil' => 0,
                    'keterangan'   => $keterangan,
                    'user_edit'    => $user,
                    'waktu_edit'   => $now
                  );

                  $where_pengmat = array(
                    'id_pengambilan_material' => $id_pengambilan_material
                  );

                  $this->M_PengambilanMaterialProduksi->edit('pengambilan_material',$data_pengmat,$where_pengmat);
              //tutup update pengambilan material
          }
          //else if ada yang akan dikurangi dari gudang dan dari wip
          else if($jumlah_pakai_gudang_lama <= $jumlah_yang_akan_dikurangkan){
            //kurangi dulu yang digudang, kemudian kurangi yang di wip line

            //update pengambilan material
                $sisa_yang_akan_dikurangkan = $jumlah_yang_akan_dikurangkan - $jumlah_pakai_gudang_lama;
                $stok_wip = $jumlah_pakai_wip_lama - $sisa_yang_akan_dikurangkan;

                $data_pengmat = array(
                  'stok_wip'     => $stok_wip,
                  'jumlah_ambil' => 0,
                  'keterangan'   => $keterangan,
                  'user_edit'    => $user,
                  'waktu_edit'   => $now
                );

                $where_pengmat = array(
                  'id_pengambilan_material' => $id_pengambilan_material
                );

                $this->M_PengambilanMaterialProduksi->edit('pengambilan_material',$data_pengmat,$where_pengmat);
            //tutup update pengambilan material
            
            //persediaan line
              $selik    = $this->M_PengambilanMaterialProduksi->get_one_selik($id_pengambilan_material)->result_array();

              $total_material_seli = $selik[0]['total_material'] + $sisa_yang_akan_dikurangkan;

              $data_persediaan_line = array(
                'total_material' => $total_material_seli,
                'user_edit'      => $user,
                'waktu_edit'     => $now
              );

              $where_persediaan_line = array(
                'id_persediaan_line' => $selik[0]['id_persediaan_line']
              );

              $this->M_PengambilanMaterialProduksi->edit('persediaan_line',$data_persediaan_line,$where_persediaan_line);
            //tutup persediaan line

            //persediaan line keluar
              $jumlah_selik_baru = $selik[0]['jumlah_material'] - $sisa_yang_akan_dikurangkan;
                    
              $data_persediaan_line_keluar = array(
                'jumlah_material'=> $jumlah_selik_baru,
                'user_edit'      => $user,
                'waktu_edit'     => $now
              );

              $where_persediaan_line_keluar = array(
                'id_persediaan_line_keluar' => $selik[0]['id_persediaan_line_keluar']
              );

              $this->M_PengambilanMaterialProduksi->edit('persediaan_line_keluar',$data_persediaan_line_keluar,$where_persediaan_line_keluar);
            //tutup persediaan line keluar
          }
          

          
      }
      
      redirect('pengambilanMaterialProduksi/semua_pengambilan_material');
    }

    public function delete_permintaan_pengambilan_normal(){
        $id_pengambilan = $this->input->post('id_delete_normal');
        
        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d H:i:s');

        //delete pengambilan
            $data_pengambilan = array(
              'status_delete' => 1,
              'user_delete'   => $user,
              'waktu_delete'  => $now
            );
  
            $where_pengambilan = array(
              'id_pengambilan_material' => $id_pengambilan
            );
  
            $this->M_PengambilanMaterialProduksi->edit('pengambilan_material',$data_pengambilan,$where_pengambilan);
        //tutup delete pengambilan

        $selik    = $this->M_PengambilanMaterialProduksi->get_one_selik($id_pengambilan)->result_array();
        $jm_selik = $this->M_PengambilanMaterialProduksi->get_one_selik($id_pengambilan)->num_rows();

        if($jm_selik > 0){
          // delete persediaan line keluar
            $data_selik = array(
                'user_delete'  => $user,
                'waktu_delete' => $now,
                'status_delete'=> 1
            );

            $where_selik = array(
              'id_persediaan_line_keluar' => $selik[0]['id_persediaan_line_keluar']
            );

            $this->M_PengambilanMaterialProduksi->edit('persediaan_line_keluar',$data_selik,$where_selik);
          // tutup delete persediaan line keluar
          
          //update persediaan line
            $jumlah_seli_sebelum  = $selik[0]['total_material'];
            $jumalh_selik_sebelum = $selik[0]['jumlah_material'];

            $jumlah_seli_baru = $jumlah_seli_sebelum + $jumalh_selik_sebelum;

            $data_seli = array(
              'total_material' => $jumlah_seli_baru,
              'user_edit'      => $user,
              'waktu_edit'     => $now
            );

            $where_seli = array(
              'id_persediaan_line' => $selik[0]['id_persediaan_line']
            );

            $this->M_PengambilanMaterialProduksi->edit('persediaan_line',$data_seli,$where_seli);
          //update persediaan line
        }

        redirect('pengambilanMaterialProduksi/semua_pengambilan_material');
    }

    public function delete_permintaan_pengambilan_tambahan(){
      $id_pengambilan = $this->input->post('id_delete_tambah');

      $user = $_SESSION['id_user'];
      $now  = date('Y-m-d H:i:s');

      //delete pengambilan
          $data_pengambilan = array(
            'status_delete' => 1,
            'user_delete'   => $user,
            'waktu_delete'  => $now
          );

          $where_pengambilan = array(
            'id_pengambilan_material' => $id_pengambilan
          );

          $this->M_PengambilanMaterialProduksi->edit('pengambilan_material',$data_pengambilan,$where_pengambilan);
      //tutup delete pengambilan

      //update permintaan tambahan
          $data_permintaan = array(
            'status'    => 1,
            'user_edit' => $user,
            'waktu_edit'=> $now
          );

          $where_permintaan = array(
            'id_pengambilan_material' => $id_pengambilan
          );

          $this->M_PengambilanMaterialProduksi->edit('permintaan_tambahan',$data_permintaan,$where_permintaan);
      //tutup update permintaan tambahan
      
      redirect('pengambilanMaterialProduksi/semua_pengambilan_material');
    }

    /////////////////////////////////////////////////////////////////////////////////////
    public function print_pengambilan_material(){
      $pdf = new FPDF('l','mm','A5');
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
      $pdf->Cell(190,7,'PERMINTAAN MATERIAL LINE CUTTING',0,1,'L');
      
      $pdf->Cell(125);
      $pdf->SetFont('Arial','B','11');
      $pdf->Cell(190,10,'Hari & Tanggal: Rabu, 01-04-2020',0,1,'L');
      
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(120,6,'Untuk Memproduksi:',0,1,'L');
      $pdf->Cell(80,6,'Nama Produk',1,0,'L');
      $pdf->Cell(40,6,'Jumlah Produk',1,1,'L');

      $pdf->Cell(80,6,'Commpact Mattress Aoki Merah',1,0,'L');
      $pdf->Cell(40,6,'20 pcs',1,1,'L');

      $pdf->Cell(190,12,'',0,1,'C');
  
      $pdf->Cell(10); //move
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(15,6,'NO',1,0,'C');
      $pdf->Cell(100,6,'NAMA MATERIAL',1,0,'C');
      $pdf->Cell(50,6,'JUMLAH MATERIAL',1,1,'C');
      
      $pdf->SetFont('Arial','',10);
  
      $pdf->Cell(10); //move
      $pdf->Cell(15,6,'1',1,0,'C');
      $pdf->Cell(100,6,'Kain Polos',1,0,'C');
      $pdf->Cell(50,6,'60 pcs',1,1,'C');

      $pdf->Cell(10); //move
      $pdf->Cell(15,6,'2',1,0,'C');
      $pdf->Cell(100,6,'Karton Protector',1,0,'C');
      $pdf->Cell(50,6,'20 pcs',1,1,'C');

      $pdf->Cell(10); //move
      $pdf->Cell(15,6,'3',1,0,'C');
      $pdf->Cell(100,6,'Benang Putih',1,0,'C');
      $pdf->Cell(50,6,'50 pcs',1,0,'C');
      
     
      $pdf->Output();
    }


}