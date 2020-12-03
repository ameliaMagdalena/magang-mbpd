<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->model('M_Invoice');
        $this->load->model('M_Warna');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Tetapan');
        $this->load->model('M_Dashboard');

        $this->load->library('pdf');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function index(){
        $data['purchase_order']     = $this->M_Invoice->get_po()->result();
        $data['surat_jalan']        = $this->M_Invoice->get_sj()->result();

            //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi

        
		$this->load->view('v_invoice_tambah1',$data);
    }

    public function tambah_invoice(){
        $id_po           = $this->input->post('id_PO');
        $data['kode_po'] = $this->input->post('kode_PO');

        $data['surat_jalan'] = $this->M_Invoice->get_sj_by_id_po($id_po)->result();
        $data['det_po']      = $this->M_Invoice->get_detpo_by_id_po($id_po)->result();
        $data['rekening']    = $this->M_Invoice->get_rekening()->result();
        $data['ppn']         = $this->M_Invoice->get_ppn()->result_array();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result();

        $data['id_po']       = $id_po;
        $data['tanggal']     = date('Y-m-d');
        $data['cust']        = $this->M_Invoice->get_customer($id_po)->result_array(); 

        $data['now'] = date('Y-m-d');
        $year_now   = substr(date('Y'),2,2);
        $month_now  = date('m');

        $data_last    = $this->M_Invoice->get_last_invoice_id()->result_array();
        $jm_data_last = $this->M_Invoice->get_last_invoice_id()->num_rows();

        if($jm_data_last == 1){
            $id_terakhir   = $data_last[0]['id_invoice'];
      
            $tahun_sebelum = substr($id_terakhir,2,2);
      
            if($tahun_sebelum == $year_now){
              $count = intval(substr($id_terakhir,7,3)) + 1;
              $pjg   = strlen($count);

              if($pjg == 1){
                $count_baru = "00".$count;
              }
              else if($pjg == 2){
                  $count_baru = "0".$count;
              }
              else{
                  $count_baru = $count;
              }
      
              $id_invoice_baru = "MI".$tahun_sebelum.$month_now.".".$count_baru;
            }
            else{
              $id_invoice_baru = "MI".$year_now.$month_now.".001";
            }
        }
        else{
            $id_invoice_baru = "MI".$year_now.$month_now.".001";
        }
        $data['idnya'] = $id_invoice_baru;

      $this->load->view('v_invoice_tambah2',$data);
    }

    public function detail_po(){
        $id = $this->input->post('id');

        $data['po']     = $this->M_Invoice->cari_po($id)->result_array();
        $data['dpo']    = $this->M_Invoice->cari_dpo($id)->result_array();
        $data['jmdpo']    = $this->M_Invoice->cari_dpo($id)->num_rows();
        $data['sj']     = $this->M_Invoice->cek_sj($id)->result_array();
        $data['jm_sj']  = $this->M_Invoice->cek_sj($id)->num_rows();
        $data['dsj']    = $this->M_Invoice->cek_isj($id)->result_array();
        $data['jm_dsj'] = $this->M_Invoice->cek_isj($id)->num_rows();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function detail_sj(){
        $id_sj = $this->input->post('id');

        $data['sj']     = $this->M_Invoice->get_sj_by_id_sj($id_sj)->result_array();
        $data['isj']    = $this->M_Invoice->get_isj_by_id_sj($id_sj)->result_array();
        $data['jm_isj'] = $this->M_Invoice->get_isj_by_id_sj($id_sj)->num_rows();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function item_sj(){
        $id_sj          = $this->input->post('id');
        $data['isj']    = $this->M_Invoice->get_isj_by_id_sj($id_sj)->result_array();
        $data['jm_isj'] = $this->M_Invoice->get_isj_by_id_sj($id_sj)->num_rows();

        echo json_encode($data);
    }

    public function coba_tambah_invoice(){
        $id_invoice       = $this->input->post('id_invoice');
        $id_po            = $this->input->post('id_po');
        $id_rekening      = $this->input->post('id_rekening');
        $tanggal          = $this->input->post('tanggal');
        $ditujukan_kepada = $this->input->post('ditujukan_kepada');
        $subtotal         = $this->input->post('subtotal');
        $discount_rate    = $this->input->post('disc_rate');
        $discount         = $this->input->post('disc');
        $ppn_rate         = $this->input->post('ppn_rate');
        $ppn              = $this->input->post('ppn');
        $total            = $this->input->post('total');
        $keterangan       = $this->input->post('keterangan');

        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d H:i:s');

        $data_inv = array (
            'id_invoice'                 => $id_invoice,
            'id_purchase_order_customer' => $id_po,
            'id_rekening'                => $id_rekening,
            'tanggal'                    => $tanggal,
            'ditujukan_kepada'           => $ditujukan_kepada,
            'sub_total'                  => $subtotal,
            'discount_rate'              => $discount_rate,
            'discount'                   => $discount,
            'ppn_rate'                   => $ppn_rate,
            'ppn'                        => $ppn,
            'total'                      => $total,
            'keterangan'                 => $keterangan,
            'status_invoice'             => 0,
            'user_add'                   => $user,
            'waktu_add'                  => $now,
            'status_delete'              => 0
        );

        $this->M_Invoice->insert('invoice',$data_inv);

        //item inv
        $jumlah = $this->input->post('jumlah');
        for($i=1;$i<=$jumlah;$i++){
            $ket = $this->input->post('keterangan'.$i);

            if($ket == 1){
                $id_detail_produk = $this->input->post('id_detprod'.$i);
                $jumlah_produk    = $this->input->post('qty'.$i);
                $price            = $this->input->post('price'.$i);
                $total_price      = $this->input->post('tprice'.$i);

                $year_now   = substr(date('Y'),2,2);
                $month_now  = date('m');

                $data_last    = $this->M_Invoice->get_last_item_invoice_id()->result_array();
                $jm_data_last = $this->M_Invoice->get_last_item_invoice_id()->num_rows();

                if($jm_data_last == 1){
                    $id_terakhir   = $data_last[0]['id_item_invoice'];
            
                    $tahun_sebelum = substr($id_terakhir,3,2);
            
                    if($tahun_sebelum == $year_now){
                    $count = intval(substr($id_terakhir,6,6)) + 1;
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
            
                    $id_item_invoice_baru = "MII".$tahun_sebelum.".".$count_baru;
                    }
                    else{
                    $id_item_invoice_baru = "MII".$year_now.".000001";
                    }
                }
                else{
                    $id_item_invoice_baru = "MII".$year_now.".000001";
                }

                $data_iinv = array(
                    'id_item_invoice' => $id_item_invoice_baru,
                    'id_invoice'      => $id_invoice,
                    'id_detail_produk'=> $id_detail_produk,
                    'jumlah_produk'   => $jumlah_produk,
                    'price'           => $price,
                    'total_price'     => $total_price,
                    'user_add'        => $user,
                    'waktu_add'       => $now,
                    'status_delete'   => 0
                );
                
                $this->M_Invoice->insert('item_invoice',$data_iinv);
            }
            
        
        }

        //surat jalan
        $jumlah_sj = $this->input->post('jumlah_sj');
        for($k=1;$k<=$jumlah_sj;$k++){
            $status = $this->input->post('stat'.$k);

            if($status == 1){
                $id_sj = $this->input->post('id'.$k);

                $data_sj = array (
                    'id_invoice'         => $id_invoice,
                    'status_surat_jalan' => 2,
                    'user_edit'          => $user,
                    'waktu_edit'         => $now
                );

                $where_sj = array (
                    'id_surat_jalan'     => $id_sj
                );

                $this->M_Invoice->edit('surat_jalan',$data_sj,$where_sj);
            }
        }
        
        redirect('invoice/belum_diproses_invoice');
    }

    public function semua_invoice(){
        $data['po']             = $this->M_Invoice->get_po()->result();
        $data['invoice']        = $this->M_Invoice->select_all_aktif()->result();
        $data['penanda_tangan'] = $this->M_Invoice->get_penanda_tangan()->result();

            //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi
    

	    $this->load->view('v_invoice_semua',$data);
    }

    public function detail_invoice(){
        $id = $this->input->post('id');

        $data['inv']        = $this->M_Invoice->get_invoice($id)->result_array();
        $data['det_inv']    = $this->M_Invoice->get_detail_invoice($id)->result_array();
        $data['jm_det_inv'] = $this->M_Invoice->get_detail_invoice($id)->num_rows();
        $data['po']         = $this->M_Invoice->get_po()->result_array();
        $data['jm_po']      = $this->M_Invoice->get_po()->num_rows();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
        $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        echo json_encode($data);
    }

    public function tertagih(){
        $id = $this->input->post('id_invoice');

        $data_inv = array (
            'status_invoice' => 1,
            'user_edit'      => $_SESSION['id_user'],
            'waktu_edit'     => date('Y-m-d H:i:s')
        );

        $where_inv = array (
            'id_invoice'    => $id
        );

        $this->M_Invoice->edit('invoice',$data_inv,$where_inv);

        redirect('invoice/selesai_invoice');
    }

    public function delete(){
        $id = $this->input->post('id_invoice_hapus');

        $user = $_SESSION['id_user'];
        $now  =  date('Y-m-d H:i:s');

        $data_inv = array (
            'status_delete'  => 1,
            'user_delete'    => $user,
            'waktu_delete'   => $now
        );

        $where_inv = array (
            'id_invoice'    => $id
        );

        $this->M_Invoice->edit('invoice',$data_inv,$where_inv);
        $this->M_Invoice->delete_det_invoice($id,$user,$now);
        $this->M_Invoice->delete_invoice_sj($id);

        redirect('invoice/belum_diproses_invoice');
    }

    public function edit(){
        $id_po      = $this->input->post('id_po');
        $id_invoice = $this->input->post('id_invoice');

        $data['po']          = $this->M_Invoice->cari_po($id_po)->result_array();
        $data['surat_jalan'] = $this->M_Invoice->get_sj_by_idPo_idInvoice($id_po,$id_invoice)->result();
        $data['det_po']      = $this->M_Invoice->get_detpo_by_id_po($id_po)->result();
        $data['rekening']    = $this->M_Invoice->get_rekening()->result();
        $data['ppn']         = $this->M_Invoice->get_ppn()->result_array();

        $data['warna']      = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result();

        $data['id_po']       = $id_po;
        $data['cust']        = $this->M_Invoice->get_customer($id_po)->result_array(); 

        $data['now'] = date('Y-m-d');
        $year_now   = substr(date('Y'),2,2);
        $month_now  = date('m');

        $data['idnya'] = $id_invoice;

        $data['invoice']     = $this->M_Invoice->get_invoice($id_invoice)->result_array();
        $data['det_invoice'] = $this->M_Invoice->get_detail_invoice($id_invoice)->result();
        
        $this->load->view('v_invoice_edit',$data);
    }

    public function coba_edit_invoice(){
        $id_invoice       = $this->input->post('id_invoice');
        $id_rekening      = $this->input->post('id_rekening');
        $ditujukan_kepada = $this->input->post('ditujukan_kepada');
        $subtotal         = $this->input->post('subtotal');
        $discount_rate    = $this->input->post('disc_rate');
        $discount         = $this->input->post('disc');
        $ppn_rate         = $this->input->post('ppn_rate');
        $ppn              = $this->input->post('ppn');
        $total            = $this->input->post('total');
        $keterangan       = $this->input->post('keterangan');

        $user = $_SESSION['id_user'];
        $now  = date('Y-m-d H:i:s');

        $data_inv = array (
            'id_rekening'                => $id_rekening,
            'ditujukan_kepada'           => $ditujukan_kepada,
            'sub_total'                  => $subtotal,
            'discount_rate'              => $discount_rate,
            'discount'                   => $discount,
            'ppn_rate'                   => $ppn_rate,
            'ppn'                        => $ppn,
            'total'                      => $total,
            'keterangan'                 => $keterangan,
            'status_invoice'             => 0,
            'user_edit'                  => $user,
            'waktu_edit'                 => $now,
            'status_delete'              => 0
        );

        $where_inv = array (
            'id_invoice'                 => $id_invoice
        );

        $this->M_Invoice->edit('invoice',$data_inv,$where_inv);

        //item inv
        $jumlah = $this->input->post('jumlah');
        for($i=1;$i<=$jumlah;$i++){
            $ket = $this->input->post('keterangan'.$i);

            if($ket == 1){
                $id_detail_produk = $this->input->post('id_detprod'.$i);
                $jumlah_produk    = $this->input->post('qty'.$i);
                $price            = $this->input->post('price'.$i);
                $total_price      = $this->input->post('tprice'.$i);

                $year_now   = substr(date('Y'),2,2);
                $month_now  = date('m');

                $data_last    = $this->M_Invoice->get_last_item_invoice_id()->result_array();
                $jm_data_last = $this->M_Invoice->get_last_item_invoice_id()->num_rows();

                if($jm_data_last == 1){
                    $id_terakhir   = $data_last[0]['id_item_invoice'];
            
                    $tahun_sebelum = substr($id_terakhir,3,2);
            
                    if($tahun_sebelum == $year_now){
                    $count = intval(substr($id_terakhir,6,6)) + 1;
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
            
                    $id_item_invoice_baru = "MII".$tahun_sebelum.".".$count_baru;
                    }
                    else{
                    $id_item_invoice_baru = "MII".$year_now.".000001";
                    }
                }
                else{
                    $id_item_invoice_baru = "MII".$year_now.".000001";
                }

                $data_iinv = array(
                    'id_item_invoice' => $id_item_invoice_baru,
                    'id_invoice'      => $id_invoice,
                    'id_detail_produk'=> $id_detail_produk,
                    'jumlah_produk'   => $jumlah_produk,
                    'price'           => $price,
                    'total_price'     => $total_price,
                    'user_add'        => $user,
                    'waktu_add'       => $now,
                    'status_delete'   => 0
                );
                
                //$this->M_Invoice->insert('item_invoice',$data_iinv);
            }
            else if($ket == 2){
                $id_item_invoice = $this->input->post('id_itinv'.$i);

                $data_delete_item_invoice = array (
                    'user_delete'   => $user,
                    'waktu_delete'  => $now,
                    'status_delete' => 1
                );

                $where_delete_item_invoice = array (
                    'id_item_invoice' => $id_item_invoice
                );

                $this->M_Invoice->edit('item_invoice',$data_delete_item_invoice,$where_delete_item_invoice);
            }
            else if($ket == 3){
                $id_item_invoice  = $this->input->post('id_itinv'.$i);
                $jumlah_produk    = $this->input->post('qty'.$i);
                $price            = $this->input->post('price'.$i);
                $total_price      = $this->input->post('tprice'.$i);

                $data_edit_item_invoice = array (
                    'jumlah_produk'   => $jumlah_produk,
                    'price'           => $price,
                    'total_price'     => $total_price,
                    'user_edit'       => $user,
                    'waktu_edit'      => $now,
                    'status_delete'   => 0
                );

                $where_edit_item_invoice = array (
                    'id_item_invoice' => $id_item_invoice
                );

                $this->M_Invoice->edit('item_invoice',$data_edit_item_invoice,$where_edit_item_invoice);
            }
        }

        //surat jalan
        $jumlah_sj = $this->input->post('jumlah_sj');
        for($k=1;$k<=$jumlah_sj;$k++){
            $status = $this->input->post('stat'.$k);

            if($status == 1){
                $id_sj = $this->input->post('id'.$k);

                $data_sj = array (
                    'id_invoice'         => $id_invoice,
                    'status_surat_jalan' => 2,
                    'user_edit'          => $user,
                    'waktu_edit'         => $now
                );

                $where_sj = array (
                    'id_surat_jalan'     => $id_sj
                );

                $this->M_Invoice->edit('surat_jalan',$data_sj,$where_sj);
            }
            else if($status == 2){
                $id_sj = $this->input->post('id'.$k);

                $data_sj = array (
                    'id_invoice'         => "",
                    'status_surat_jalan' => 1,
                    'user_edit'          => $user,
                    'waktu_edit'         => $now
                );

                $where_sj = array (
                    'id_surat_jalan'     => $id_sj
                );

                $this->M_Invoice->edit('surat_jalan',$data_sj,$where_sj);
            }
        }

        redirect('invoice/belum_diproses_invoice');
    }

    public function print_invoice(){
        $id              = $this->input->post('id_invoice_print');
        $nama_ttd        = $this->input->post('nama_ttd');
        $jabatan_ttd     = $this->input->post('jabatan_ttd');

        $nama_perusahaan = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();
        $bidang_usaha    = $this->M_Tetapan->cari_tetapan("Bidang Usaha")->result_array();
        $alamat          = $this->M_Tetapan->cari_tetapan("Alamat Perusahaan")->result_array();
        $phone           = $this->M_Tetapan->cari_tetapan("Phone/Fax")->result_array();
        $website         = $this->M_Tetapan->cari_tetapan("Website")->result_array();
        $email           = $this->M_Tetapan->cari_tetapan("E-mail Perusahaan")->result_array();
        
        $warna      = $this->M_Warna->select_all_aktif()->result_array();
        $jmwarna    = $this->M_Warna->select_all_aktif()->num_rows();
        $ukuran     = $this->M_UkuranProduk->select_all_aktif()->result_array();
        $jmukuran   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

        $inv             = $this->M_Invoice->get_invoice($id)->result_array();
        $dinv            = $this->M_Invoice->get_detail_invoice($id)->result_array();
        $jm_dinv         = $this->M_Invoice->get_detail_invoice($id)->num_rows();

        $id_po           = $inv[0]['id_purchase_order_customer'];
        $po              = $this->M_Invoice->cari_po($id_po)->result_array();
        
        $pdf = new FPDF('p','mm','A4');
        //buat halaman baru
        $pdf->AddPage();
        
        //logo
        $pdf->Image(base_url('assets/images/logombp.png'),15,7,-250);
    
        //setting font
        $pdf->SetFont('Arial','B','12');

        $pdf->setFillColor(102, 15, 19); 
        //x,y,width,height
        $pdf->Rect(203, 5,7, 25, 'F');

        $pdf->setFillColor(190, 37, 37); 
        //x,y,width,height
        $pdf->Rect(45,5,158, 25, 'F');

        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(-5); //move
        $pdf->Cell(190,0,strtoupper($nama_perusahaan[0]['isi_tetapan']),0,1,'R');
        
        $pdf->Cell(-5); //move
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,10,$bidang_usaha[0]['isi_tetapan'],0,1,'R');

        $pdf->Cell(-5); //move
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(190,0,$alamat[0]['isi_tetapan'],0,1,'R');

        $pdf->Cell(-5); //move
        $pdf->Cell(190,9,'Phone/Fax:'. $phone[0]['isi_tetapan'] .' | Website: '. $website[0]['isi_tetapan'] .' | Email: '. $email[0]['isi_tetapan'] ,0,1,'R');

        $pdf->SetTextColor(0,0,0);

        $pdf->Cell(190,6,'',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(190,6,'INVOICE',0,1,'C');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,6,'No:'. $inv[0]['id_invoice'],0,1,'C');


        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,6,'',0,1,'L');
        $pdf->Cell(190,6,'Ditujukan Kepada:',0,1,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,6,$inv[0]['ditujukan_kepada'],0,1,'L');
        $pdf->Cell(190,0,'Tanggal:'.$inv[0]['tanggal'],0,1,'R');
        $pdf->Cell(190,6,strtoupper($po[0]['nama_customer']),0,1,'L');
        //$pdf->Cell(-14); //move
        $pdf->Cell(190,0,$po[0]['kode_purchase_order_customer'],0,1,'R');
        $pdf->Cell(190,6,$po[0]['alamat_customer'],0,1,'L');

        $pdf->Cell(190,6,'',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(85,6,'Item Description',1,0,'C');
        $pdf->Cell(20,6,'Qty',1,0,'C');
        $pdf->Cell(20,6,'Unit (Qty)',1,0,'C');
        $pdf->Cell(25,6,'Price',1,0,'C');
        $pdf->Cell(30,6,'Total Price',1,1,'C');
        
        $pdf->SetFont('Arial','',10);

        for($i=0;$i<$jm_dinv;$i++){
            //nama produk
            if($dinv[$i]['keterangan'] == 0){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dinv[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dinv[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dinv[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
            }
            else if($dinv[$i]['keterangan'] == 1){
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dinv[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dinv[$i]['nama_produk'] . $nama_ukuran;
            }
            else if($dinv[$i]['keterangan'] == 2){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dinv[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                $nama_produk = $dinv[$i]['nama_produk'] . " (" . $nama_warna . ")";
            }
            else{
                $nama_produk = $dinv[$i]['nama_produk'];
            }

            $pdf->Cell(10,6,($i+1),1,0,'C');
            $pdf->Cell(85,6,$nama_produk,1,0,'C');
            $pdf->Cell(20,6,$dinv[$i]['jumlah_produk'],1,0,'C');
            $pdf->Cell(20,6,'Pcs',1,0,'C');
            $pdf->Cell(25,6,$dinv[$i]['price'],1,0,'C');
            $pdf->Cell(30,6,$dinv[$i]['total_price'],1,1,'C');
        }

        $pdf->SetFont('Arial','',10);
        $pdf->Cell(115);
        $pdf->Cell(45,6,'Sub Total',1,0,'C');
        $pdf->Cell(30,6,$inv[0]['sub_total'],1,1,'C');

        $pdf->Cell(115);
        if($inv[0]['discount_rate'] == 0){
            $pdf->Cell(45,6,'Discount 0%',1,0,'C');
            $pdf->Cell(30,6,"-",1,1,'C');
        }
        else{
            $pdf->Cell(45,6,'Discount '. $inv[0]['discount_rate'].' %',1,0,'C');
            $pdf->Cell(30,6,$inv[0]['discount'],1,1,'C');
        }


        $pdf->SetFont('Arial','',10);
        $pdf->Cell(115);
        if($inv[0]['ppn_rate'] == 0){
            $pdf->Cell(45,6,'PPN 0%',1,0,'C');
            $pdf->Cell(30,6,"-",1,1,'C');
        }
        else{
            $pdf->Cell(45,6,'PPN '. $inv[0]['ppn_rate']. "%",1,0,'C');
            $pdf->Cell(30,6,$inv[0]['ppn'],1,1,'C');
        }

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(115);
        $pdf->Cell(45,6,'Total',1,0,'C');
        $pdf->Cell(30,6,$inv[0]['total'],1,1,'C');

        $pdf->Cell(190,6,'',0,1,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,6,'Pembayaran untuk invoice ini mohon ditransfer ke rekening:',0,1,'L');
        $pdf->SetFont('Arial','B',11);
        $pdf->SetFont('Arial','BI');
        $pdf->Cell(190,6,$inv[0]['nama_bank'] ." Cab. " .$inv[0]['kantor_cabang'],0,1,'L');
        $pdf->Cell(190,6,'No. Rekening:'. $inv[0]['nomor_rekening'],0,1,'L');
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(190,6,'Atas Nama'. $inv[0]['atas_nama'],0,1,'L');

        //TANDA TANGAN
        $pdf->SetFont('Arial','B',10);
    
        $pdf->Cell(190,6,'',0,1);
        $pdf->Cell(110);
        $pdf->Cell(80,6,'PT. MAJU BERSAMA PERSADA DAYAMU',0,1,'C');
        $pdf->Cell(110);
        $pdf->Cell(80,25,'',0,1,'C');
        $pdf->Cell(110);
        $pdf->SetFont('Arial','BU');
        $pdf->Cell(80,6,$nama_ttd,0,1,'C');
        $pdf->Cell(110);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(80,6,$jabatan_ttd,0,1,'C');

        //FOOTER
        $pdf->setFillColor(190, 37, 37); 
        //x,y,width,height
        $pdf->Rect(0,285,210,5, 'F');

        $pdf->setFillColor(102, 15, 19); 
        //x,y,width,height
        $pdf->Rect(0,290,210, 10, 'F'); 

        $pdf->Output();
    }

    public function belum_diproses_invoice(){
        $data['po']             = $this->M_Invoice->get_po()->result();
        $data['invoice']        = $this->M_Invoice->select_all_aktif()->result();
        $data['penanda_tangan'] = $this->M_Invoice->get_penanda_tangan()->result();

            //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi
    
        
	    $this->load->view('v_invoice_belum_diproses',$data);
    }

    public function selesai_invoice(){
        $data['po']             = $this->M_Invoice->get_po()->result();
        $data['invoice']        = $this->M_Invoice->select_all_aktif()->result();
        $data['penanda_tangan'] = $this->M_Invoice->get_penanda_tangan()->result();

            //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi
    

	    $this->load->view('v_invoice_selesai',$data);
    }
}
