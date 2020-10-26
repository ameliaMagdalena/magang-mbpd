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
        $this->load->model('M_Warna');
        $this->load->model('M_UkuranProduk');

        $this->load->library('pdf');
    }

	public function tambah_bpbd(){
    $data['purchase_order']        = $this->M_Bpbd->get_po()->result();
    $data['detail_purchase_order'] = $this->M_Bpbd->get_dpo()->result();
    $data['surat_jalan']           = $this->M_Bpbd->get_surat_jalan_belum_selesai()->result();

		$this->load->view('v_bpbd_tambah',$data);
  }

  public function detail_po_sj(){
    $id_po = $this->input->post('id');

    $data['po']    = $this->M_Bpbd->get_po_by_id($id_po)->result_array();
    $data['dpo']   = $this->M_Bpbd->get_dpo_by_id($id_po)->result_array();
    $data['jmdpo'] = $this->M_Bpbd->get_dpo_by_id($id_po)->num_rows();

    $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
    $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
    $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
    $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

    $data['stok_gudang']    = $this->M_Bpbd->get_stok_gudang($id_po)->result_array();
    $data['jm_stok_gudang'] = $this->M_Bpbd->get_stok_gudang($id_po)->num_rows();
    
    $data['terambil']       = $this->M_Bpbd->get_terambil($id_po)->result_array();
    $data['jm_terambil']    = $this->M_Bpbd->get_terambil($id_po)->num_rows();

    echo json_encode($data);
  }

  public function buat_bpbd(){
    $id_po         = $this->input->post('id_po_tambah');
    $plat_nomor    = $this->input->post('plat_nomor');
    $driver        = $this->input->post('driver');
    $keterangan    = $this->input->post('keterangan');
    $jumlah_detail = $this->input->post('jumlah_detail');

    $user = $_SESSION['id_user'];
    $now  = date('Y-m-d');
    $year_now  = substr(date('Y'),2,2);

    $data_last    = $this->M_Bpbd->get_last_bpbd_id()->result_array();
    $jm_data_last = $this->M_Bpbd->get_last_bpbd_id()->num_rows();

    if($jm_data_last == 1){
      $id_terakhir   = $data_last[0]['id_bpbd'];

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

        $id_bpbd_baru = "BPBD".$tahun_sebelum.".".$count_baru;
        $no_bpbd_baru = "BPBD"."-".$count_baru;
      }
      else{
        $id_bpbd_baru = "BPBD".$year_now.".0001";
        $no_bpbd_baru = "BPBD"."-0001";
      }
    }
    else{
      $id_bpbd_baru = "BPBD".$year_now.".0001";
      $no_bpbd_baru = "BPBD"."-0001";
    }

    $data_bpbd = array(
      'id_bpbd'                    => $id_bpbd_baru,
      'id_purchase_order_customer' => $id_po,
      'no_bpbd'                    => $no_bpbd_baru,
      'tanggal'                    => $now,
      'plat_no'                    => $plat_nomor,
      'driver'                     => $driver,
      'keterangan'                 => $keterangan,
      'user_add'                   => $user,
      'waktu_add'                  => $now,
      'status_delete'              => 0
    );

    $this->M_Bpbd->insert('bpbd',$data_bpbd);

    

    //bpbd
    //item bpbd
    //detail item bpbd
    //item surat jalan
    
    /*
      $data_item_bpbd = array(
        'id_item_bpbd'     =>
        'id_bpbd'          =>
        'id_detail_produk' =>
        'jumlah_produk'    =>
        'user_add'         => $user,
        'waktu_add'        => $now,
        'status_delete'    => 0
      );  

      $data_detail_item_bpbd = array(
        'id_detail_item_bpbd' =>
        'id_item_bpbd'        =>
        'id_item_surat_jalan' =>
        'jumlah_produk'       =>
        'user_add'            => $user,
        'waktu_add'           => $now,
        'status_delete'       => 0
      );

      $data_item_surat_jalan = array(
        'jumlah_keluar' =>
        'status_keluar' =>
      );
    */
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
