<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcessCost extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->library('pdf');
        $this->load->model('M_ProcessCost');
        $this->load->model('M_Dashboard');

    }

	  public function index(){
      $data['produk'] = $this->M_ProcessCost->select_all_produk()->result();

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
  

      $this->load->view('v_process_cost',$data);
    }

    public function get_process_cost(){
      $id = $this->input->post('id');

      $data['km']    = $this->M_ProcessCost->get_km($id)->result_array();
      $data['jm_km'] = $this->M_ProcessCost->get_km($id)->num_rows();

      echo json_encode($data);
    }

    public function print_permintaan_material(){
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