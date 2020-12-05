<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpbj extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        if($this->session->userdata('status_login') != "login"){
			    redirect('akses');
        }
        $this->load->model('M_Bpbj');
        $this->load->model('M_Line');
        $this->load->model('M_Produk');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_Tetapan');
        $this->load->model('M_Dashboard');

        $this->load->library('pdf');
        
    }

	public function tambah_bpbj(){
    $tanggal = date('Y-m-d');

    $data['now'] = date('Y-m-d');
    $year_now  = substr(date('Y'),2,2);

    $data['produk']        = $this->M_Bpbj->select_produk($tanggal)->result();
    $data['pros_prod']     = $this->M_Bpbj->last_proses_produk()->result();
    $data['line']          = $this->M_Line->select_all_aktif()->result();

    $data['warna']            = $this->M_Warna->select_all_aktif()->result();
    $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();

    $data['bpbj_sebelum'] = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->result();    
    $data['jmbpbj_sebelum'] = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->num_rows();    

    $data_last    = $this->M_Bpbj->get_last_bpbj_id()->result_array();
    $jm_data_last = $this->M_Bpbj->get_last_bpbj_id()->num_rows();

    
    if($jm_data_last == 1){
      $id_terakhir   = $data_last[0]['id_bpbj'];

      $tahun_sebelum = substr($id_terakhir,4,2);

      if($tahun_sebelum == $year_now){
        $count = intval(substr($id_terakhir,7,4)) + 1;
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

        $id_bpbj_baru = "BPBJ".$tahun_sebelum.".".$count_baru;
        $no_bpbj_baru = "BPBJ"."-".$count_baru;
      }
      else{
        $id_bpbj_baru = "BPBJ".$year_now.".0001";
        $no_bpbj_baru = "BPBJ"."-0001";
      }
    }
    else{
      $id_bpbj_baru = "BPBJ".$year_now.".0001";
      $no_bpbj_baru = "BPBJ"."-0001";
    }
    $data['idnya'] = $id_bpbj_baru;
    $data['nonya'] = $no_bpbj_baru;

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
    
		$this->load->view('v_bpbj_tambah',$data);
  }

  public function tambahin(){
    $jumlah_detprod = $this->input->post('tampung_jumlah_id_produk');
    $id_bpbj        = $this->input->post('id_bpbj');
    $no_bpbj        = $this->input->post('no_bpbj');
    $tanggal        = $this->input->post('tanggal');
    $keterangan     = $this->input->post('keterangan');

    $user = $_SESSION['id_user'];
    $now  = date('Y-m-d H:i:s');

    $data_bpbj = array (
      'id_bpbj'        => $id_bpbj,
      'no_bpbj'        => $no_bpbj,
      'tanggal'        => $tanggal,
      'keterangan'     => $keterangan,
      'user_add'       => $user,
      'waktu_add'      => $now,
      'status_delete'  => 0
    );

    $this->M_Bpbj->insert('bpbj',$data_bpbj);

    for($i=0;$i<$jumlah_detprod;$i++){
      $id_detail_produk = $this->input->post('id_produk'.$i);
      $jumlah_aktual    = $this->input->post('jumlah_aktual'.$i);

      //get last id detail bpbj
      $data_last    = $this->M_Bpbj->get_last_detail_bpbj_id()->result_array();
      $jm_data_last = $this->M_Bpbj->get_last_detail_bpbj_id()->num_rows();

      $year_now  = substr(date('Y'),2,2);

      if($jm_data_last == 1){
        $id_terakhir   = $data_last[0]['id_detail_bpbj'];
  
        $tahun_sebelum = substr($id_terakhir,5,2);
  
        if($tahun_sebelum == $year_now){
          $count = intval(substr($id_terakhir,8,6)) + 1;
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
  
          $id_detail_bpbj_baru = "DBPBJ".$tahun_sebelum.".".$count_baru;
        }
        else{
          $id_detail_bpbj_baru = "DBPBJ".$year_now.".000001";
        }
      }
      else{
        $id_detail_bpbj_baru = "DBPBJ".$year_now.".000001";
      }

      $data_detail_bpbj = array (
        'id_detail_bpbj'   => $id_detail_bpbj_baru,
        'id_bpbj'          => $id_bpbj,
        'id_detail_produk' => $id_detail_produk,
        'jumlah_produk'    => $jumlah_aktual,
        'user_add'         => $user,
        'waktu_add'        => $now,
        'status_delete'    => 0
      );

      $this->M_Bpbj->insert('detail_bpbj',$data_detail_bpbj);
    }

    redirect('bpbj/semua_bpbj');
  }

  public function semua_bpbj(){
    $tanggal = date('Y-m-d');
    $data['bpbj']             = $this->M_Bpbj->select_all_bpbj_aktif()->result();

    $data['produk']           = $this->M_Bpbj->select_produk($tanggal)->result();
    $data['pros_prod']        = $this->M_Bpbj->last_proses_produk()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['warna']            = $this->M_Warna->select_all_aktif()->result();
    $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();
    $data['bpbj_sebelum']     = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->result();    
    $data['jmbpbj_sebelum']   = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->num_rows();    

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

		$this->load->view('v_bpbj_semua',$data);
  }

  public function detail_bpbj(){
    $id = $this->input->post('id_bpbj');

    $data['bpbj']       = $this->M_Bpbj->cari_bpbj($id)->result_array();
    $data['det_bpbj']   = $this->M_Bpbj->cari_detail_bpbj($id)->result_array();
    $data['jmdet_bpbj'] = $this->M_Bpbj->cari_detail_bpbj($id)->num_rows();
    $data['selected_po'] = $this->M_Bpbj->cari_selected_po()->result_array();
    $data['jm_selected_po'] = $this->M_Bpbj->cari_selected_po()->num_rows();

    $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
    $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
    $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
    $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

    //jumlah sebelum 
    $tanggalnya     = $data['bpbj'][0]['tanggal'];
    $produk         = $this->M_Bpbj->select_produk($tanggalnya)->result_array();
    $jmproduk       = $this->M_Bpbj->select_produk($tanggalnya)->num_rows();
    $pros_prod      = $this->M_Bpbj->last_proses_produk()->result_array();
    $jmpros_prod    = $this->M_Bpbj->last_proses_produk()->num_rows();

    $bpbj_sebelum   = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggalnya)->result_array();    
    $jmbpbj_sebelum = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggalnya)->num_rows();    

    $jumlah = 0;
    for($i=0;$i<$jmproduk;$i++){
      for($j=0;$j<$jmpros_prod;$j++){
        if($produk[$i]['id_detail_produk'] == $pros_prod[$j]['id_detail_produk']){
          if($produk[$i]['urutan_line'] == $pros_prod[$j]['urutan_line']){
            for($k=0;$k<$jmbpbj_sebelum;$k++){
              if($produk[$i]['id_detail_produk'] == $bpbj_sebelum[$k]['id_detail_produk']){
                $data['sebelum'][$jumlah]['id']    = $produk[$i]['id_detail_produk'];
                $data['sebelum'][$jumlah]['total'] = $produk[$i]['total'] - $bpbj_sebelum[$k]['jumlah_produk'];
                $jumlah++;
              }
            }
          }
        }
      }
    }
    $data['jumlah'] = $jumlah;


    echo json_encode($data);
  }

  public function edit_bpbj(){
    $id_bpbj    = $this->input->post('id_edit');
    $keterangan = $this->input->post('keterangan_edit');
    $jumlah_produk = $this->input->post('tampung_jumlah_id_produk');

    $user = $_SESSION['id_user'];
    $now  = date('Y-m-d H:i:s');

    $jumlah_kosong = 0;

    for($i=0;$i<$jumlah_produk;$i++){
      $id_detail_bpbj = $this->input->post('id_detail_bpbj'.$i);
      $jumlah_aktual  = $this->input->post('jumlah_aktual'.$i);

      //update jumlahnya
      if($jumlah_aktual != 0){
        $data_detail = array(
          'jumlah_produk' => $jumlah_aktual,
          'user_edit'     => $user,
          'waktu_edit'    => $now
        );

        $where_detail = array (
          'id_detail_bpbj' => $id_detail_bpbj
        );

        $this->M_Bpbj->edit('detail_bpbj',$data_detail,$where_detail);
      }
      //delete detail bpbj tersebut
      else{
        $jumlah_kosong++;

        $data_detail = array(
          'jumlah_produk'   => $jumlah_aktual,
          'status_delete'   => 1,
          'user_delete'     => $user,
          'waktu_delete'    => $now
        );

        $where_detail = array (
          'id_detail_bpbj' => $id_detail_bpbj
        );

        $this->M_Bpbj->edit('detail_bpbj',$data_detail,$where_detail);
      }
    }

    //if semuanya kosong, delete bpbj tersebut
    if($jumlah_kosong == $jumlah_produk){
      $data_bpbj = array (
        'keterangan'    => $keterangan,
        'status_delete' => 1,
        'user_delete'   => $user,
        'waktu_delete'  => $now
      );

      $where_bpbj = array (
        'id_bpbj' => $id_bpbj
      );

      $this->M_Bpbj->edit('bpbj',$data_bpbj,$where_bpbj);
    }
    //update bpbj
    else{
      $data_bpbj = array (
        'keterangan'    => $keterangan,
        'user_edit'   => $user,
        'waktu_edit'  => $now
      );

      $where_bpbj = array (
        'id_bpbj' => $id_bpbj
      );

      $this->M_Bpbj->edit('bpbj',$data_bpbj,$where_bpbj);
    }


    
    Redirect("Bpbj/semua_bpbj");
  }

  public function delete_bpbj(){
    $id_bpbj = $this->input->post('id_bpbj_delete');
    $user    = $_SESSION['id_user'];
    $now     = date('Y-m-d H:i:s');

    $data = array (
      'status_delete' => 1,
      'user_delete'   => $user,
      'waktu_delete'  => $now
    );

    $where = array (
      'id_bpbj' => $id_bpbj
    );

    $this->M_Bpbj->edit('bpbj',$data,$where);
    $this->M_Bpbj->delete_detail_bpbj($id_bpbj,$user,$now);

    Redirect("Bpbj/semua_bpbj");
  }

  public function print_bpbj(){
    $id = $this->input->post('id');

    $nama_perusahaan    = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();

    $bpbj       = $this->M_Bpbj->cari_bpbj($id)->result_array();
    $det_bpbj   = $this->M_Bpbj->cari_detail_bpbj($id)->result_array();
    $jmdet_bpbj = $this->M_Bpbj->cari_detail_bpbj($id)->num_rows();
    $selected_po    = $this->M_Bpbj->cari_selected_po()->result_array();
    $jm_selected_po = $this->M_Bpbj->cari_selected_po()->num_rows();

    $warna      = $this->M_Warna->select_all_aktif()->result_array();
    $jmwarna    = $this->M_Warna->select_all_aktif()->num_rows();
    $ukuran     = $this->M_UkuranProduk->select_all_aktif()->result_array();
    $jmukuran   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

    $pdf = new FPDF('l','mm','A5');
		//buat halaman baru
		$pdf->AddPage();
    
    //logo
    $pdf->Image(base_url('assets/images/logombp.png'),7,7,-300);

    //setting font
    $pdf->SetFont('Arial','B','12');
    //cetak string
    $pdf->Cell(15); //move
    $pdf->Cell(190,7,strtoupper($nama_perusahaan[0]['isi_tetapan']),0,1,'L');
    
    $pdf->Cell(140);
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(190,0,'No: '.$bpbj[0]['no_bpbj'],0,1,'L');

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15);
    $pdf->Cell(190,7,'BUKTI PENERIMAAN BARANG JADI (BPBJ)',0,1,'L');
    
    $pdf->Cell(125);
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(190,10,'Hari & Tanggal: '.$bpbj[0]['tanggal'],0,1,'L');


		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'NO',1,0,'C');
		$pdf->Cell(90,6,'ITEM',1,0,'C');
		$pdf->Cell(20,6,'QTY',1,0,'C');
		$pdf->Cell(40,6,'PO',1,0,'C');
		$pdf->Cell(30,6,'REMARK',1,1,'C');
		
    $pdf->SetFont('Arial','',10);
    
    for($i=0;$i<$jmdet_bpbj;$i++){
      //nama produk
      if($det_bpbj[$i]['keterangan'] == 0){
          for($w=0;$w<$jmwarna;$w++){
              if($warna[$w]['id_warna'] == $det_bpbj[$i]['id_warna']){
                  $nama_warna = $warna[$w]['nama_warna'];
              }
          }

          for($w=0;$w<$jmukuran;$w++){
              if($ukuran[$w]['id_ukuran_produk'] == $det_bpbj[$i]['id_ukuran_produk']){
                  $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
              }
          }

          $nama_produk = $det_bpbj[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
      }
      else if($det_bpbj[$i]['keterangan'] == 1){
          for($w=0;$w<$jmukuran;$w++){
              if($ukuran[$w]['id_ukuran_produk'] == $det_bpbj[$i]['id_ukuran_produk']){
                  $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
              }
          }

          $nama_produk = $det_bpbj[$i]['nama_produk'] . $nama_ukuran;
      }
      else if($det_bpbj[$i]['keterangan'] == 2){
          for($w=0;$w<$jmwarna;$w++){
              if($warna[$w]['id_warna'] == $det_bpbj[$i]['id_warna']){
                  $nama_warna = $warna[$w]['nama_warna'];
              }
          }

          $nama_produk = $det_bpbj[$i]['nama_produk'] . " (" . $nama_warna . ")";
      }
      else{
          $nama_produk = $det_bpbj[$i]['nama_produk'];
      }

      $selected_pos = "";
      $hit = 0;
      for($g=0;$g<$jm_selected_po;$g++){
          if($det_bpbj[$i]['id_detail_bpbj'] == $selected_po[$g]['id_detail_bpbj']){
              if($hit == 0){
                  $selected_pos = $selected_po[$g]['id_purchase_order_customer'];
                  $hit++;
              }
              else{
                  $selected_pos = $selected_pos .", ". $selected_po[$g]['id_purchase_order_customer'];
                  $hit++;
              }
          }
      }

      
      $pdf->Cell(10,6,($i+1),1,0,'C');
      $pdf->Cell(90,6,$nama_produk,1,0,'C');
      $pdf->Cell(20,6,$det_bpbj[$i]['jumlah_produk'].' pcs',1,0,'C');
      $pdf->Cell(40,6,$selected_pos,1,0,'C');
      $pdf->Cell(30,6,'',1,1,'C');
    }
    
    
    //keterangan
    $pdf->Cell(2,7,'',0,1);
    $pdf->Cell(2,7,'Keterangan:',0,1);
    $pdf->Cell(190,12,'',1,0,'L');


    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(10,20,'',0,1);
    $pdf->Cell(100);
		$pdf->Cell(30,6,'LEADER DEPT',1,0,'C');
		$pdf->Cell(30,6,'DICEK',1,0,'C');
    $pdf->Cell(30,6,'WH',1,0,'C');

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

  public function bpbj_belum_diproses(){
    $tanggal = date('Y-m-d');
    $data['bpbj']             = $this->M_Bpbj->select_all_bpbj_aktif()->result();

    $data['produk']           = $this->M_Bpbj->select_produk($tanggal)->result();
    $data['pros_prod']        = $this->M_Bpbj->last_proses_produk()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['warna']            = $this->M_Warna->select_all_aktif()->result();
    $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();
    $data['bpbj_sebelum']     = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->result();    
    $data['jmbpbj_sebelum']   = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->num_rows();   


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

    $this->load->view('v_bpbj_belum_diproses',$data);
  }

  public function bpbj_sedang_diproses(){
    $tanggal = date('Y-m-d');
    $data['bpbj']             = $this->M_Bpbj->select_all_bpbj_aktif()->result();

    $data['produk']           = $this->M_Bpbj->select_produk($tanggal)->result();
    $data['pros_prod']        = $this->M_Bpbj->last_proses_produk()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['warna']            = $this->M_Warna->select_all_aktif()->result();
    $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();
    $data['bpbj_sebelum']     = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->result();    
    $data['jmbpbj_sebelum']   = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->num_rows();   

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

    $this->load->view('v_bpbj_sedang_diproses',$data);
  }
  
  public function bpbj_selesai(){
    $tanggal = date('Y-m-d');
    $data['bpbj']             = $this->M_Bpbj->select_all_bpbj_aktif()->result();

    $data['produk']           = $this->M_Bpbj->select_produk($tanggal)->result();
    $data['pros_prod']        = $this->M_Bpbj->last_proses_produk()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['warna']            = $this->M_Warna->select_all_aktif()->result();
    $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();
    $data['bpbj_sebelum']     = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->result();    
    $data['jmbpbj_sebelum']   = $this->M_Bpbj->select_all_detail_bpbj_aktif($tanggal)->num_rows();   

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

    $this->load->view('v_bpbj_selesai',$data);
  }


}
