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

        $this->load->library('pdf');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function print_perencanaan_produksi(){
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
