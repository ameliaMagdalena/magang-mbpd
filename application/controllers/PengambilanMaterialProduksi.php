<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengambilanMaterialProduksi extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->model('M_PengambilanMaterialProduksi');
        $this->load->model('M_Line');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->library('pdf');

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
      }

      if($_SESSION['nama_jabatan'] == "PIC Line Sewing"){
        
        $this->load->view('v_pengambilan_material_produksi_tambah1',$data);
      }
      else{
        $data['permat']        = $this->M_PengambilanMaterialProduksi->get_one_permat_by_line($nmline,$data['min_date'])->result();
        $data['warna']         = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']        = $this->M_UkuranProduk->select_all_aktif()->result();

        $this->load->view('v_pengambilan_material_produksi_tambah2',$data);
      }
    }

    public function detail_permintaan(){
      $id = $this->input->post('id');

      $data['permat']       = $this->M_PengambilanMaterialProduksi->get_one_permat($id)->result_array();
      $data['detpermat']    = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id)->result_array();
      $data['jm_detpermat'] = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id)->num_rows();

      echo json_encode($data);
    }

    public function tambah_permintaan_pengambilan(){
      
    }

    public function buat_pengambilan_material(){
      $data['min_date'] = $this->input->post('tanggal');
      $this->load->view('v_pengambilan_material_produksi_tambah2',$data);
    }

    public function coba_tambah(){
      $this->load->view('v_pengambilan_material_produksi_tambah1');
    }

    public function semua_pengambilan_material(){
      $this->load->view('v_pengambilan_material_produksi_semua');
    }

    public function belum_disetujui_pengambilan_material(){
      $this->load->view('v_pengambilan_material_produksi_belum_disetujui');
    }

    public function belum_diambil_pengambilan_material(){
      $this->load->view('v_pengambilan_material_produksi_belum_diambil');
    }

    public function selesai_pengambilan_material(){
      $this->load->view('v_pengambilan_material_produksi_selesai');
    }

    public function batal_pengambilan_material(){
      $this->load->view('v_pengambilan_material_produksi_batal');
    }

    public function delete(){
      $this->load->view('v_pengambilan_material_produksi_semua');
    }

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