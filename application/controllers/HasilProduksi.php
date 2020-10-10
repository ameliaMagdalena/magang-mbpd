<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilProduksi extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        if($this->session->userdata('status_login') != "login"){
			    redirect('akses');
        }
        
        $this->load->model('M_HasilProduksi');
        $this->load->model('M_Line');
        $this->load->model('M_Produk');
        $this->load->model('M_Warna');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_PermohonanAkses');
        $this->load->model('M_Tetapan');

        $this->load->library('pdf');
    }

	public function tambah_hasil_produksi(){
    $now                      = date('Y-m-d');
    $id_user                  = $_SESSION['id_user'];

    $data['produksi']         = $this->M_HasilProduksi->get_produksi_proses($now)->result();
    $data['produksi_line']    = $this->M_HasilProduksi->get_produksi_line()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['permohonan_akses'] = $this->M_PermohonanAkses->select_belum_selesai_by_id($id_user)->result();

		$this->load->view('v_hasil_produksi_tambah',$data);
  }

  public function semua_hasil_produksi(){
    $now                      = date('Y-m-d');
    $id_user                  = $_SESSION['id_user'];

    $data['produksi']         = $this->M_HasilProduksi->get_produksi_semua($now)->result();
    $data['produksi_line']    = $this->M_HasilProduksi->get_produksi_line()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['permohonan_akses'] = $this->M_PermohonanAkses->select_belum_selesai_by_id($id_user)->result();

		$this->load->view('v_hasil_produksi_semua',$data);
  }

  public function lengkap_hasil_produksi(){
    $now                      = date('Y-m-d');
    $id_user                  = $_SESSION['id_user'];

    $data['produksi']         = $this->M_HasilProduksi->get_produksi_semua($now)->result();
    $data['produksi_line']    = $this->M_HasilProduksi->get_produksi_line()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['permohonan_akses'] = $this->M_PermohonanAkses->select_belum_selesai_by_id($id_user)->result();

		$this->load->view('v_hasil_produksi_lengkap',$data);
  }

  public function selesai_hasil_produksi(){
    $now                      = date('Y-m-d');
    $id_user                  = $_SESSION['id_user'];

    $data['produksi']         = $this->M_HasilProduksi->get_produksi_semua($now)->result();
    $data['produksi_line']    = $this->M_HasilProduksi->get_produksi_line()->result();
    $data['line']             = $this->M_Line->select_all_aktif()->result();
    $data['permohonan_akses'] = $this->M_PermohonanAkses->select_belum_selesai_by_id($id_user)->result();

		$this->load->view('v_hasil_produksi_selesai',$data);
  }

  public function detail_hasil_produksi1(){
    $id = $this->input->post('id');

    $data['p']       = $this->M_HasilProduksi->get_produksi_by_id($id)->result_array();
    $data['pl']      = $this->M_HasilProduksi->get_produksi_line_by_id($id)->result_array();
    $data['jm_pl']   = $this->M_HasilProduksi->get_produksi_line_by_id($id)->num_rows();
    $data['dpl']     = $this->M_HasilProduksi->get_detail_produksi_line_by_id($id)->result_array();
    $data['jm_dpl']  = $this->M_HasilProduksi->get_detail_produksi_line_by_id($id)->num_rows();

    $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
    $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
    $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
    $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();
    
    echo json_encode($data);
  }

  public function detail_hasil_produksi2(){
    $id_produksi = $this->input->post('id_produksi');
    $id_line     = $this->input->post('id_line');

    $data['pl']      = $this->M_HasilProduksi->get_one_produksi_line($id_produksi,$id_line)->result_array();
    $data['dpl']     = $this->M_HasilProduksi->get_one_detail_produksi_line($id_produksi,$id_line)->result_array();
    $data['jm_dpl']  = $this->M_HasilProduksi->get_one_detail_produksi_line($id_produksi,$id_line)->num_rows();
    $data['ct']      = $this->M_Produk->select_all_ct()->result_array();
    $data['jm_ct']   = $this->M_Produk->select_all_ct()->num_rows();

    $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
    $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
    $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
    $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();
    
    echo json_encode($data);
  }

  public function coba_tambah_hasil_produksi(){
    $user = $_SESSION['id_user'];
    $now  = date('Y-m-d H:i:s');

    $id_produksi      = $this->input->post('id_add');
    $id_produksi_line = $this->input->post('id_pl');
    $jumlah_detail    = $this->input->post('jumlah_detail');
    $ket_umum         = $this->input->post('keterangan_umum');
    $total_pt         = $this->input->post('total_pt');

    $total_waktu_aktual = 0;

    //update detail produksi line
    for($i=0;$i<$jumlah_detail;$i++){
      $id_dpl        = $this->input->post('id_dpl'.$i);
      $jumlah_perc   = $this->input->post('jm_perc'.$i);
      $jumlah_aktual = $this->input->post('jm_aktual'.$i);
      $waktu_aktual  = $this->input->post('wkt_aktual'.$i);
      $keterangan    = $this->input->post('ket'.$i);

      $total_waktu_aktual = $total_waktu_aktual + $waktu_aktual;

      $statusnya = 0;

      if($jumlah_aktual == 0){
        $statusnya = 3;
      }
      else if($jumlah_aktual == $jumlah_perc){
        $statusnya = 1;
      }
      else if($jumlah_aktual < $jumlah_perc){
        $statusnya = 2;
      }

      $data_dpl = array (
        'jumlah_item_aktual' => $jumlah_aktual,
        'waktu_proses_aktual'=> $waktu_aktual,
        'status_aktual'      => $statusnya,
        'keterangan_aktual'  => $keterangan,
        'user_edit'          => $user,
        'waktu_edit'         => $now
      );  

      $where_dpl = array (
        'id_detail_produksi_line' => $id_dpl
      );

      $this->M_HasilProduksi->edit('detail_produksi_line',$data_dpl,$where_dpl);


      //insert produksi tertunda
      if($statusnya == 3 || $statusnya == 2){
        $tertunda = $jumlah_perc - $jumlah_aktual;

        $tanggal = date('Y-m-d');
        //id produksi tunda produksi
        $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
        $bulan_sekarangnya = date('m',strtotime($tanggal));

        $idcode_detprod_line = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".";

        $id_prodtun_last     = $this->M_HasilProduksi->get_last_prodtun_id($idcode_detprod_line)->result_array();
        $id_prodtun_last_cek = $this->M_HasilProduksi->get_last_prodtun_id($idcode_detprod_line)->num_rows();

        if($id_prodtun_last_cek == 1){
            $id_terakhirnya    = $id_prodtun_last[0]['id_produksi_tertunda'];

            $tahun_sebelumnya  = substr($id_terakhirnya,7,2);
            $bulan_sebelumnya  = substr($id_terakhirnya,9,2);
                    
            //kalau tahun sama
            if($tahun_sebelumnya == $tahun_sekarangnya){
                //kalau tahun & bulannya sama berarti count+1
                if($bulan_sebelumnya == $bulan_sekarangnya){
                    $countnya = intval(substr($id_terakhirnya,12,8)) + 1;
                    $pjgnya   = strlen($countnya);
        
                    if($pjgnya == 1){
                        $countnya_baru = "0000000".$countnya;
                    }
                    else if($pjgnya == 2){
                        $countnya_baru = "000000".$countnya;
                    }
                    else if($pjgnya == 3){
                        $countnya_baru = "00000".$countnya;
                    }
                    else if($pjgnya == 4){
                        $countnya_baru = "0000".$countnya;
                    }
                    else if($pjgnya == 5){
                        $countnya_baru = "000".$countnya;
                    }
                    else if($pjgnya == 6){
                        $countnya_baru = "00".$countnya;
                    }
                    else if($pjgnya == 7){
                        $countnya_baru = "0".$countnya;
                    }
                    else{
                        $countnya_baru = $countnya;
                    }
                    
                    //id yang baru
                    $id_prodtun_baru = "PRODTUN".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                }
                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                else{
                    //id yang baru
                    $id_prodtun_baru = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                }
            }
            //kalau tahun tidak sama
            else{
                //id yang baru
                $id_prodtun_baru = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
            }
        }
        else{
            //id yang baru
            $id_prodtun_baru = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
        }

        $data_produksi_tertunda = array (
          'id_produksi_tertunda'    => $id_prodtun_baru,
          'id_detail_produksi_line' => $id_dpl,
          'jumlah_tertunda'         => $tertunda,
          'status_penjadwalan'      => 0,
          'user_add'                => $user,
          'waktu_add'               => $now,
          'status_delete'           => 0
        );

        $this->M_HasilProduksi->insert('produksi_tertunda',$data_produksi_tertunda);
      } 

    }

      $efisiensi_aktual = round(($total_waktu_aktual /($total_pt * 3600))*100,2);

    //update produksi line
      $data_pl = array(
        'total_waktu_aktual' => $total_waktu_aktual,
        'efisiensi_aktual'   => $efisiensi_aktual,
        'keterangan_laporan' => $ket_umum,
        'status_laporan'     => 1
      );
      
      $where_pl = array(
        'id_produksi_line'  => $id_produksi_line
      );

      $this->M_HasilProduksi->edit('produksi_line',$data_pl,$where_pl);
    

    //update produksi
      $prodline    = $this->M_HasilProduksi->get_produksi_line_by_id($id_produksi)->result_array();
      $jm_prodline = $this->M_HasilProduksi->get_produksi_line_by_id($id_produksi)->num_rows();

      $cek = 0;

      for($o=0;$o<$jm_prodline;$o++){
        if($prodline[$o]['status_laporan'] == 1){
          $cek++;
        }
      }

      if($cek == $jm_prodline){
        $status_produksi = 2;
      }
      else if($cek == 0){
        $status_produksi = 0;
      }
      else{
        $status_produksi = 1;
      }

      $data_produksi = array(
        'status_laporan' => $status_produksi,
        'user_edit'      => $user,
        'waktu_edit'     => $now
      );

      $where_produksi = array (
        'id_produksi' => $id_produksi
      );

      $this->M_HasilProduksi->edit('produksi',$data_produksi,$where_produksi);

   redirect('hasilProduksi/tambah_hasil_produksi');
  }

  public function edit(){
    $user = $_SESSION['id_user'];
    $now  = date('Y-m-d H:i:s');

    $id_produksi      = $this->input->post('id_edit');
    $id_produksi_line = $this->input->post('id_pl_edit');
    $jumlah_detail    = $this->input->post('jumlah_detail_edit');
    $ket_umum         = $this->input->post('keterangan_umum_edit');
    $total_pt         = $this->input->post('total_pt_edit');

    $total_waktu_aktual = 0;

    //update detail produksi line
    for($i=0;$i<$jumlah_detail;$i++){
      $id_dpl        = $this->input->post('id_dpl'.$i);
      $jumlah_perc   = $this->input->post('jm_perc'.$i);
      $jumlah_aktual = $this->input->post('jm_aktual'.$i);
      $waktu_aktual  = $this->input->post('wkt_aktual'.$i);
      $keterangan    = $this->input->post('ket'.$i);

      $total_waktu_aktual = $total_waktu_aktual + $waktu_aktual;

      $statusnya = 0;

      if($jumlah_aktual == 0){
        $statusnya = 3;
      }
      else if($jumlah_aktual == $jumlah_perc){
        $statusnya = 1;
      }
      else if($jumlah_aktual < $jumlah_perc){
        $statusnya = 2;
      }

      $data_dpl = array (
        'jumlah_item_aktual' => $jumlah_aktual,
        'waktu_proses_aktual'=> $waktu_aktual,
        'status_aktual'      => $statusnya,
        'keterangan_aktual'  => $keterangan,
        'user_edit'          => $user,
        'waktu_edit'         => $now
      );  

      $where_dpl = array(
        'id_detail_produksi_line' => $id_dpl
      );

      $this->M_HasilProduksi->edit('detail_produksi_line',$data_dpl,$where_dpl);

      if($jumlah_aktual == $jumlah_perc){
        //kalau sama, cek sudah pernah ada di perencanaan tertunda atau belum.
        //kalau belum ada tidak melakukan apa apa.
        //kalau sudah ada, ubah status deletenya menjadi 1. 

        $sebelum    = $this->M_HasilProduksi->get_one_prodtun($id_dpl)->result_array();
        $jm_sebelum = $this->M_HasilProduksi->get_one_prodtun($id_dpl)->num_rows();

        if($jm_sebelum == 1){
          $data_prodtun = array (
            'status_delete' => 1,
            'user_delete'   => $user,
            'waktu_delete'  => $now
          );

          $where_prodtun = array(
            'id_produksi_tertunda' => $sebelum[0]['id_produksi_tertunda']
          );

          $this->M_HasilProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
        }

      } else if($jumlah_aktual < $jumlah_perc){
        //cari produksi tertunda sebelumnya.
        $sebelum    = $this->M_HasilProduksi->get_one_prodtun($id_dpl)->result_array();
        $jm_sebelum = $this->M_HasilProduksi->get_one_prodtun($id_dpl)->num_rows();

        if($jm_sebelum == 1){
          //update yang sudah ada
          $data_prodtun = array (
            'jumlah_tertunda' => $jumlah_aktual,
            'user_edit'       => $user,
            'waktu_edit'      => $now
          );

          $where_prodtun = array (
            'id_produksi_tertunda' => $sebelum[0]['id_produksi_tertunda']
          );

          $this->M_HasilProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
        } else{
          //insert new
          $tertunda = $jumlah_perc - $jumlah_aktual;

          $tanggal = date('Y-m-d');
          //id produksi tunda produksi
          $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
          $bulan_sekarangnya = date('m',strtotime($tanggal));

          $idcode_detprod_line = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".";

          $id_prodtun_last     = $this->M_HasilProduksi->get_last_prodtun_id($idcode_detprod_line)->result_array();
          $id_prodtun_last_cek = $this->M_HasilProduksi->get_last_prodtun_id($idcode_detprod_line)->num_rows();

          if($id_prodtun_last_cek == 1){
              $id_terakhirnya    = $id_prodtun_last[0]['id_produksi_tertunda'];

              $tahun_sebelumnya  = substr($id_terakhirnya,7,2);
              $bulan_sebelumnya  = substr($id_terakhirnya,9,2);
                      
              //kalau tahun sama
              if($tahun_sebelumnya == $tahun_sekarangnya){
                  //kalau tahun & bulannya sama berarti count+1
                  if($bulan_sebelumnya == $bulan_sekarangnya){
                      $countnya = intval(substr($id_terakhirnya,12,8)) + 1;
                      $pjgnya   = strlen($countnya);
          
                      if($pjgnya == 1){
                          $countnya_baru = "0000000".$countnya;
                      }
                      else if($pjgnya == 2){
                          $countnya_baru = "000000".$countnya;
                      }
                      else if($pjgnya == 3){
                          $countnya_baru = "00000".$countnya;
                      }
                      else if($pjgnya == 4){
                          $countnya_baru = "0000".$countnya;
                      }
                      else if($pjgnya == 5){
                          $countnya_baru = "000".$countnya;
                      }
                      else if($pjgnya == 6){
                          $countnya_baru = "00".$countnya;
                      }
                      else if($pjgnya == 7){
                          $countnya_baru = "0".$countnya;
                      }
                      else{
                          $countnya_baru = $countnya;
                      }
                      
                      //id yang baru
                      $id_prodtun_baru = "PRODTUN".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                  }
                  //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                  else{
                      //id yang baru
                      $id_prodtun_baru = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                  }
              }
              //kalau tahun tidak sama
              else{
                  //id yang baru
                  $id_prodtun_baru = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
              }
            }
            else{
                //id yang baru
                $id_prodtun_baru = "PRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
            }

            $data_produksi_tertunda = array (
              'id_produksi_tertunda'    => $id_prodtun_baru,
              'id_detail_produksi_line' => $id_dpl,
              'jumlah_tertunda'         => $tertunda,
              'status_penjadwalan'      => 0,
              'user_add'                => $user,
              'waktu_add'               => $now,
              'status_delete'           => 0
            );

            $this->M_HasilProduksi->insert('produksi_tertunda',$data_produksi_tertunda);
        }
      } 
    }

    $efisiensi_aktual = round(($total_waktu_aktual /($total_pt * 3600))*100,2);
    
    //update produksi line
      $data_pl = array(
        'total_waktu_aktual' => $total_waktu_aktual,
        'efisiensi_aktual'   => $efisiensi_aktual,
        'keterangan_laporan' => $ket_umum,
        'status_laporan'     => 1
      );
      
      $where_pl = array(
        'id_produksi_line'  => $id_produksi_line
      );

      $this->M_HasilProduksi->edit('produksi_line',$data_pl,$where_pl); 

    //update produksi
      $prodline    = $this->M_HasilProduksi->get_produksi_line_by_id($id_produksi)->result_array();
      $jm_prodline = $this->M_HasilProduksi->get_produksi_line_by_id($id_produksi)->num_rows();

      $cek = 0;

      for($o=0;$o<$jm_prodline;$o++){
        if($prodline[$o]['status_laporan'] == 1){
          $cek++;
        }
      }

      if($cek == $jm_prodline){
        $status_produksi = 2;
      }
      else if($cek == 0){
        $status_produksi = 0;
      }
      else{
        $status_produksi = 1;
      }

      $data_produksi = array(
        'status_laporan' => $status_produksi,
        'user_edit'      => $user,
        'waktu_edit'     => $now
      );

      $where_produksi = array (
        'id_produksi' => $id_produksi
      );

     $this->M_HasilProduksi->edit('produksi',$data_produksi,$where_produksi);

    
    //update permohonan akses
      $id_peraks    = $this->M_PermohonanAkses->get_one_id($id_produksi)->result_array();
      $id_peraksnya = $id_peraks[0]['id_permohonan_akses'];

      $data_peraks = array (
        'status_permohonan' => 3,
        'user_edit'         => $user,
        'waktu_edit'        => $now
      );

      $where_peraks = array (
        'id_permohonan_akses' => $id_peraksnya
      );  

      $this->M_HasilProduksi->edit('permohonan_akses',$data_peraks,$where_peraks);

    redirect('hasilProduksi/semua_hasil_produksi');
  }

  function konfirmasi_ppic(){
    $id = $this->input->post('id_produksinya');

    $data = array (
      'status_laporan' => 3,
      'user_edit'      => $_SESSION['id_user'],
      'waktu_edit'     => date('Y-m-d H:i:s')
    );

    $where = array (
      'id_produksi'   => $id
    );

    $this->M_HasilProduksi->edit('produksi',$data,$where);

    redirect('hasilProduksi/selesai_hasil_produksi');
  }

  public function print(){
    $id      = $this->input->post('id_produksi');
    $id_line = $this->input->post('id_line');

    $nama_perusahaan = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();
    $produksi        = $this->M_HasilProduksi->get_produksi_line_by_id($id)->result_array();
    $prodline        = $this->M_HasilProduksi->get_one_produksi_line($id,$id_line)->result_array();
    $detprodline     = $this->M_HasilProduksi->get_one_detail_produksi_line($id,$id_line)->result_array();
    $jm_detprodline  = $this->M_HasilProduksi->get_one_detail_produksi_line($id,$id_line)->num_rows();

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
    
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15);
    $pdf->Cell(190,7,'DAILY SCHEDULE PRODUCTION '.strtoupper($prodline[0]['nama_line']),0,1,'L');
    
    $pdf->Cell(125);
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(190,10,'Hari & Tanggal: '.$produksi[0]['tanggal'] ,0,1,'L');


		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'NO',1,0,'C');
		$pdf->Cell(90,6,'ITEM',1,0,'C');
		$pdf->Cell(20,6,'PLANNING',1,0,'C');
		$pdf->Cell(20,6,'ACTUAL',1,0,'C');
    $pdf->Cell(20,6,'CT',1,0,'C');
    $pdf->Cell(30,6,'KET',1,1,'C');
		
    $pdf->SetFont('Arial','',10);
    
    for($i=0;$i<$jm_detprodline;$i++){
      if($detprodline[$i]['jumlah_item_perencanaan'] > 0){

          //nama produk
          if($detprodline[$i]['keterangan'] == 0){
            for($w=0;$w<$jmwarna;$w++){
                if($warna[$w]['id_warna'] == $detprodline[$i]['id_warna']){
                    $nama_warna = $warna[$w]['nama_warna'];
                }
            }

            for($w=0;$w<$jmukuran;$w++){
                if($ukuran[$w]['id_ukuran_produk'] == $detprodline[$i]['id_ukuran_produk']){
                    $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                }
            }

            $nama_produk = $detprodline[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
        }
        else if($detprodline[$i]['keterangan'] == 1){
            for($w=0;$w<$jmukuran;$w++){
                if($ukuran[$w]['id_ukuran_produk'] == $detprodline[$i]['id_ukuran_produk']){
                    $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                }
            }

            $nama_produk = $detprodline[$i]['nama_produk'] . $nama_ukuran;
        }
        else if($detprodline[$i]['keterangan'] == 2){
            for($w=0;$w<$jmwarna;$w++){
                if($warna[$w]['id_warna'] == $detprodline[$i]['id_warna']){
                    $nama_warna = $warna[$w]['nama_warna'];
                }
            }

            $nama_produk = $detprodline[$i]['nama_produk'] . " (" . $nama_warna . ")";
        }
        else{
            $nama_produk = $detprodline[$i]['nama_produk'];
        }

        $pdf->Cell(10,6,($i+1),1,0,'C');
        $pdf->Cell(90,6,$nama_produk,1,0,'C');
        $pdf->Cell(20,6,$detprodline[$i]['jumlah_item_perencanaan']. " pcs",1,0,'C');
        $pdf->Cell(20,6,$detprodline[$i]['jumlah_item_aktual']. " pcs",1,0,'C');
        $pdf->Cell(20,6,'??????????',1,0,'C');
        $pdf->Cell(30,6,$detprodline[$i]['keterangan_aktual'],1,1,'C');
      }
    }

    //keterangan
    $pdf->Cell(2,7,'',0,1);
    $pdf->Cell(2,7,'Keterangan:',0,1);
		$pdf->Cell(190,12,$prodline[0]['keterangan_laporan'],1,0,'L');

    //tanda tangan
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(10,20,'',0,1);
    $pdf->Cell(130);
		$pdf->Cell(30,6,'PRODUKSI',1,0,'C');
		$pdf->Cell(30,6,'PPIC',1,0,'C');


    $pdf->Cell(0,6,'',0,1);
    $pdf->Cell(130);
    $pdf->Cell(30,15,'',1,0,'C');
		$pdf->Cell(30,15,'',1,0,'C');
    
    $pdf->Cell(0,15,'',0,1);
    $pdf->Cell(130);
		$pdf->Cell(30,6,'',1,0,'C');
		$pdf->Cell(30,6,'',1,0,'C');

		
		$pdf->Output();
  }

}