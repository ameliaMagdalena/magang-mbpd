<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpbd extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        if($this->session->userdata('status_login') != "login"){
			    redirect('akses');
        }
        
        $this->load->model('M_Bpbd');
        $this->load->library('pdf');
    }

	public function tambah_bpbd(){
    $data['purchase_order']        = $this->M_Bpbd->get_po()->result();
    $data['detail_purchase_order'] = $this->M_Bpbd->get_dpo()->result();

    


		$this->load->view('v_bpbd_tambah',$data);
  }

  public function semua_bpbd(){
		$this->load->view('v_bpbd_semua');
  }

  public function print_bpbd(){
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
    
    $pdf->Cell(140);
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(190,0,'No: BPBJ - 0017',0,1,'L');

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15);
    $pdf->Cell(190,7,'BUKTI PENERIMAAN BARANG JADI (BPBJ)',0,1,'L');
    
    $pdf->Cell(125);
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(190,10,'Hari & Tanggal: Rabu, 01-04-2020',0,1,'L');


		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'NO',1,0,'C');
		$pdf->Cell(90,6,'ITEM',1,0,'C');
		$pdf->Cell(20,6,'QTY',1,0,'C');
		$pdf->Cell(40,6,'PO',1,0,'C');
		$pdf->Cell(30,6,'REMARK',1,1,'C');
		
		$pdf->SetFont('Arial','',10);

		$pdf->Cell(10,6,'1',1,0,'C');
		$pdf->Cell(90,6,'Bantal Datron Ligna',1,0,'C');
		$pdf->Cell(20,6,'20 pcs',1,0,'C');
		$pdf->Cell(40,6,'000100010001',1,0,'C');
    $pdf->Cell(30,6,'-',1,1,'C');
    
    $pdf->Cell(10,6,'2',1,0,'C');
		$pdf->Cell(90,6,'Ride 5B 120 Midili Green',1,0,'C');
		$pdf->Cell(20,6,'30 pcs',1,0,'C');
		$pdf->Cell(40,6,'000100010001',1,0,'C');
    $pdf->Cell(30,6,'-',1,1,'C');
    
    $pdf->Cell(10,6,'3',1,0,'C');
		$pdf->Cell(90,6,'Zaisu Lion Kayawa Green',1,0,'C');
		$pdf->Cell(20,6,'5 pcs',1,0,'C');
		$pdf->Cell(40,6,'000100010002',1,0,'C');
    $pdf->Cell(30,6,'-',1,1,'C');
    
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
}
