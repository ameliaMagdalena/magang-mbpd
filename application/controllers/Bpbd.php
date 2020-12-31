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
        $this->load->model('M_Tetapan');
        $this->load->model('M_Dashboard');
    }

	public function tambah_bpbd(){
    $data['purchase_order']        = $this->M_Bpbd->get_po()->result();
    $data['detail_purchase_order'] = $this->M_Bpbd->get_dpo()->result();
    $data['surat_jalan']           = $this->M_Bpbd->get_surat_jalan_belum_selesai()->result();

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
    $now  = date('Y-m-d H:i:s');
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

        $id_bpbd_baru = "BPDB".$tahun_sebelum.".".$count_baru;
        $no_bpbd_baru = "BPDB"."-".$count_baru;
      }
      else{
        $id_bpbd_baru = "BPDB".$year_now.".0001";
        $no_bpbd_baru = "BPDB"."-0001";
      }
    }
    else{
      $id_bpbd_baru = "BPDB".$year_now.".0001";
      $no_bpbd_baru = "BPDB"."-0001";
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

    //ITEM BPBD
      for($i=0;$i<$jumlah_detail;$i++){
        $id_detail_produk = $this->input->post('id_detail_produk'.$i);
        $akan_diambil     = $this->input->post('ambil'.$i);
        $keterangan       = $this->input->post('ket'.$i);

        if($akan_diambil != 0){
          //get last id item bpbd
          $data_last    = $this->M_Bpbd->get_last_item_bpbd_id()->result_array();
          $jm_data_last = $this->M_Bpbd->get_last_item_bpbd_id()->num_rows();
      
          if($jm_data_last == 1){
            $id_terakhir   = $data_last[0]['id_item_bpbd'];
      
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
      
              $id_item_bpbd_baru = "IBPBD".$tahun_sebelum.".".$count_baru;
            }
            else{
              $id_item_bpbd_baru = "IBPBD".$year_now.".000001";
            }
          }
          else{
            $id_item_bpbd_baru = "IBPBD".$year_now.".000001";
          }

          $data_item_bpbd = array(
            'id_item_bpbd'     => $id_item_bpbd_baru,
            'id_bpbd'          => $id_bpbd_baru,
            'id_detail_produk' => $id_detail_produk,
            'jumlah_produk'    => $akan_diambil,
            'keterangan'       => $keterangan,
            'user_add'         => $user,
            'waktu_add'        => $now,
            'status_delete'    => 0
          );  

          $this->M_Bpbd->insert('item_bpbd',$data_item_bpbd);

          //DETAIL ITEM BPBJ
            $target  = $akan_diambil;
            $capaian = 0;

            $item_sj    = $this->M_Bpbd->get_item_surat_jalan($id_po, $id_detail_produk)->result_array();
            $jm_item_sj = $this->M_Bpbd->get_item_surat_jalan($id_po, $id_detail_produk)->num_rows();

            for($y=0;$y<$jm_item_sj;$y++){
              if($capaian < $target){
                $id_item_sj       = $item_sj[$y]['id_item_surat_jalan'];
                $jumlah_item_sj   = $item_sj[$y]['jumlah_produk'];
                $jumlah_keluar_sj = $item_sj[$y]['jumlah_keluar'];

                $jumlah_input = $target - $capaian;
                $jumlah_max   = $jumlah_item_sj - $jumlah_keluar_sj;

                if($jumlah_input >= $jumlah_max){
                  $jumlah_real   = $jumlah_max;
                  $jumlah_keluar = $jumlah_keluar_sj + $jumlah_real;
                  $capaian       = $capaian + $jumlah_real;

                  $data_item_sj = array(
                    'jumlah_keluar' => $jumlah_keluar,
                    'status_keluar' => 1,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );
                }
                else if($jumlah_input < $jumlah_max){
                  $jumlah_real   = $jumlah_input;
                  $jumlah_keluar = $jumlah_keluar_sj + $jumlah_real;
                  $capaian       = $capaian + $jumlah_real;

                  $data_item_sj = array(
                    'jumlah_keluar' => $jumlah_keluar,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );
                }

                //id detail item bpbd
                $data_last    = $this->M_Bpbd->get_last_dibpbd_id()->result_array();
                $jm_data_last = $this->M_Bpbd->get_last_dibpbd_id()->num_rows();
        
                if($jm_data_last == 1){
                    //DIBPBD20.00000000 = 8
                    $id_terakhir   = $data_last[0]['id_detail_item_bpbd'];
            
                    $tahun_sebelum = substr($id_terakhir,6,2);
            
                    if($tahun_sebelum == $year_now){
                        $count = intval(substr($id_terakhir,9,8)) + 1;
                        $pjg   = strlen($count);
                
                        if($pjg == 1){
                            $count_baru = "0000000".$count;
                        }
                        else if($pjg == 2){
                            $count_baru = "000000".$count;
                        }
                        else if($pjg == 3){
                            $count_baru = "00000".$count;
                        }
                        else if($pjg == 4){
                            $count_baru = "0000".$count;
                        }
                        else if($pjg == 5){
                            $count_baru = "000".$count;
                        }
                        else if($pjg == 6){
                            $count_baru = "00".$count;
                        }
                        else if($pjg == 7){
                            $count_baru = "0".$count;
                        }                                
                        else{
                            $count_baru = $count;
                        }
                
                            $id_dibpbd_baru = "DIBPBD".$tahun_sebelum.".".$count_baru;
                        }
                    else{
                        $id_dibpbd_baru = "DIBPBD".$year_now.".00000001";
                    }
                }
                else{
                    $id_dibpbd_baru = "DIBPBD".$year_now.".00000001";
                } 

                $where_item_sj = array(
                  'id_item_surat_jalan' => $id_item_sj
                );

                $data_detail_item_bpbd = array(
                  'id_detail_item_bpbd' => $id_dibpbd_baru,
                  'id_item_bpbd'        => $id_item_bpbd_baru,
                  'id_item_surat_jalan' => $id_item_sj,
                  'jumlah_produk'       => $jumlah_real,
                  'user_add'            => $user,
                  'waktu_add'           => $now,
                  'status_delete'       => 0
                );

                $this->M_Bpbd->insert('detail_item_bpbd',$data_detail_item_bpbd);
                $this->M_Bpbd->edit('item_surat_jalan',$data_item_sj,$where_item_sj);
                
              }
            }
          //tutup detail item bpbd
        }
      }
    //tutup item bpbd
    redirect('bpbd/semua_bpbd');
  }

  public function semua_bpbd(){
    $data['bpbd'] = $this->M_Bpbd->select_all_bpbd()->result();

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

		$this->load->view('v_bpbd_semua',$data);
  }

  public function belum_konfirmasi_bpbd(){
    $data['bpbd'] = $this->M_Bpbd->select_all_bpbd()->result();

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

		$this->load->view('v_bpbd_belum_konfirmasi',$data);
  }

  public function terkonfirmasi_bpbd(){
    $data['bpbd'] = $this->M_Bpbd->select_all_bpbd()->result();

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

		$this->load->view('v_bpbd_terkonfirmasi',$data);
  }

  public function detail_bpbd(){
    $id = $this->input->post('id');

    $data['bpbd']         = $this->M_Bpbd->get_one_bpbd($id)->result_array();

    $id_po = $data['bpbd'][0]['id_purchase_order_customer'];

    $data['item_bpbd']    = $this->M_Bpbd->get_one_item_bpbd($id)->result_array();
    $data['jm_item_bpbd'] = $this->M_Bpbd->get_one_item_bpbd($id)->num_rows();
    $data['po']           = $this->M_Bpbd->get_one_po($id)->result_array();

    $data['produk']       = $this->M_Bpbd->get_produk()->result_array();
    $data['jm_produk']    = $this->M_Bpbd->get_produk()->num_rows();

    $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
    $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
    $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
    $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

    $data['po_by_id']    = $this->M_Bpbd->get_po_by_id($id_po)->result_array();
    $data['dpo']         = $this->M_Bpbd->get_dpo_by_id($id_po)->result_array();
    $data['jmdpo']       = $this->M_Bpbd->get_dpo_by_id($id_po)->num_rows();

    $data['stok_gudang']    = $this->M_Bpbd->get_stok_gudang($id_po)->result_array();
    $data['jm_stok_gudang'] = $this->M_Bpbd->get_stok_gudang($id_po)->num_rows();
    
    $data['terambil']       = $this->M_Bpbd->get_terambil($id_po)->result_array();
    $data['jm_terambil']    = $this->M_Bpbd->get_terambil($id_po)->num_rows();


    echo json_encode($data);
  }

  public function edit_bpbd(){
    $id_po         = $this->input->post('id_po_ed');
    $id_bpbd       = $this->input->post('id_bpbd_ed');
    $plat_no       = $this->input->post('plat_no_ed');
    $driver        = $this->input->post('driver_ed');
    $ket           = $this->input->post('ket_ed');
    $jumlah_detail = $this->input->post('jumlah_detail');
    
    $user = $_SESSION['id_user'];
    $now  = date('Y-m-d H:i:s');
    $year_now  = substr(date('Y'),2,2);

    $data_bpbd = array(
      'plat_no'    => $plat_no,
      'driver'     => $driver,
      'keterangan' => $ket,
      'user_edit'  => $user,
      'waktu_edit' => $now,
    );

    $where_bpbd = array(
      'id_bpbd' => $id_bpbd
    );

    $this->M_Bpbd->edit('bpbd',$data_bpbd,$where_bpbd);

    for($i=0;$i<$jumlah_detail;$i++){
      $status = $this->input->post("status".$i);
      
      //jika sebelumnya tidak ada
      if($status == 0){
        $id_detail_produk = $this->input->post('id_detail_produk'.$i);
        $akan_diambil     = $this->input->post('ambil'.$i);
        $keterangan       = $this->input->post('ket'.$i);

        //ada isi, add baru
        if($akan_diambil != 0){
          //get last id item bpbd
          $data_last    = $this->M_Bpbd->get_last_item_bpbd_id()->result_array();
          $jm_data_last = $this->M_Bpbd->get_last_item_bpbd_id()->num_rows();
      
          if($jm_data_last == 1){
            $id_terakhir   = $data_last[0]['id_item_bpbd'];
      
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
      
              $id_item_bpbd_baru = "IBPBD".$tahun_sebelum.".".$count_baru;
            }
            else{
              $id_item_bpbd_baru = "IBPBD".$year_now.".000001";
            }
          }
          else{
            $id_item_bpbd_baru = "IBPBD".$year_now.".000001";
          }

          $data_item_bpbd = array(
            'id_item_bpbd'     => $id_item_bpbd_baru,
            'id_bpbd'          => $id_bpbd,
            'id_detail_produk' => $id_detail_produk,
            'jumlah_produk'    => $akan_diambil,
            'keterangan'       => $keterangan,
            'user_add'         => $user,
            'waktu_add'        => $now,
            'status_delete'    => 0
          );  

          $this->M_Bpbd->insert('item_bpbd',$data_item_bpbd);

          //DETAIL ITEM BPBJ
            $target  = $akan_diambil;
            $capaian = 0;

            $item_sj    = $this->M_Bpbd->get_item_surat_jalan($id_po, $id_detail_produk)->result_array();
            $jm_item_sj = $this->M_Bpbd->get_item_surat_jalan($id_po, $id_detail_produk)->num_rows();

            for($y=0;$y<$jm_item_sj;$y++){
              if($capaian < $target){
                $id_item_sj       = $item_sj[$y]['id_item_surat_jalan'];
                $jumlah_item_sj   = $item_sj[$y]['jumlah_produk'];
                $jumlah_keluar_sj = $item_sj[$y]['jumlah_keluar'];

                $jumlah_input = $target - $capaian;
                $jumlah_max   = $jumlah_item_sj - $jumlah_keluar_sj;

                if($jumlah_input >= $jumlah_max){
                  $jumlah_real   = $jumlah_max;
                  $jumlah_keluar = $jumlah_keluar_sj + $jumlah_real;
                  $capaian       = $capaian + $jumlah_real;

                  $data_item_sj = array(
                    'jumlah_keluar' => $jumlah_keluar,
                    'status_keluar' => 1,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );
                }
                else if($jumlah_input < $jumlah_max){
                  $jumlah_real   = $jumlah_input;
                  $jumlah_keluar = $jumlah_keluar_sj + $jumlah_real;
                  $capaian       = $capaian + $jumlah_real;

                  $data_item_sj = array(
                    'jumlah_keluar' => $jumlah_keluar,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );
                }

                //id detail item bpbd
                $data_last    = $this->M_Bpbd->get_last_dibpbd_id()->result_array();
                $jm_data_last = $this->M_Bpbd->get_last_dibpbd_id()->num_rows();
        
                if($jm_data_last == 1){
                    //DIBPBD20.00000000 = 8
                    $id_terakhir   = $data_last[0]['id_detail_item_bpbd'];
            
                    $tahun_sebelum = substr($id_terakhir,6,2);
            
                    if($tahun_sebelum == $year_now){
                        $count = intval(substr($id_terakhir,9,8)) + 1;
                        $pjg   = strlen($count);
                
                        if($pjg == 1){
                            $count_baru = "0000000".$count;
                        }
                        else if($pjg == 2){
                            $count_baru = "000000".$count;
                        }
                        else if($pjg == 3){
                            $count_baru = "00000".$count;
                        }
                        else if($pjg == 4){
                            $count_baru = "0000".$count;
                        }
                        else if($pjg == 5){
                            $count_baru = "000".$count;
                        }
                        else if($pjg == 6){
                            $count_baru = "00".$count;
                        }
                        else if($pjg == 7){
                            $count_baru = "0".$count;
                        }                                
                        else{
                            $count_baru = $count;
                        }
                
                            $id_dibpbd_baru = "DIBPBD".$tahun_sebelum.".".$count_baru;
                        }
                    else{
                        $id_dibpbd_baru = "DIBPBD".$year_now.".00000001";
                    }
                }
                else{
                    $id_dibpbd_baru = "DIBPBD".$year_now.".00000001";
                } 

                $where_item_sj = array(
                  'id_item_surat_jalan' => $id_item_sj
                );

                $data_detail_item_bpbd = array(
                  'id_detail_item_bpbd' => $id_dibpbd_baru,
                  'id_item_bpbd'        => $id_item_bpbd_baru,
                  'id_item_surat_jalan' => $id_item_sj,
                  'jumlah_produk'       => $jumlah_real,
                  'user_add'            => $user,
                  'waktu_add'           => $now,
                  'status_delete'       => 0
                );

                $this->M_Bpbd->insert('detail_item_bpbd',$data_detail_item_bpbd);
                $this->M_Bpbd->edit('item_surat_jalan',$data_item_sj,$where_item_sj);
              }
            }
          //tutup detail item bpbd
        }
      } 
      //jika sebelumnya ada
      else{
        $id_item_bpbd     = $this->input->post('id_item_bpbd'.$i);
        $id_detail_produk = $this->input->post('id_detail_produk'.$i);
        $akan_diambil     = $this->input->post('ambil'.$i);
        $sebelum          = $this->input->post('sebelum'.$i);
        $keterangan       = $this->input->post('ket'.$i);

        //ada isi,update yang lama
        if($akan_diambil != 0){
          $data_item_bpbd = array(
            'jumlah_produk' => $akan_diambil,
            'keterangan'    => $keterangan,
            'user_edit'     => $user,
            'waktu_edit'    => $now
          );

          $where_item_bpbd = array(
            'id_item_bpbd' =>$id_item_bpbd
          );

          $this->M_Bpbd->edit('item_bpbd',$data_item_bpbd,$where_item_bpbd);

          //jika yang baru > yang lama (tambahkan)
          if($akan_diambil > $sebelum){
            $target  = $akan_diambil - $sebelum;
            $capaian = 0;

            $item_sj    = $this->M_Bpbd->get_item_surat_jalan($id_po, $id_detail_produk)->result_array();
            $jm_item_sj = $this->M_Bpbd->get_item_surat_jalan($id_po, $id_detail_produk)->num_rows();

            for($y=0;$y<$jm_item_sj;$y++){
              if($capaian < $target){
                $id_item_sj       = $item_sj[$y]['id_item_surat_jalan'];
                $jumlah_item_sj   = $item_sj[$y]['jumlah_produk'];
                $jumlah_keluar_sj = $item_sj[$y]['jumlah_keluar'];
        
                $jumlah_input = $target - $capaian;
                $jumlah_max   = $jumlah_item_sj - $jumlah_keluar_sj;
        
                if($jumlah_input >= $jumlah_max){
                  $jumlah_real   = $jumlah_max;
                  $jumlah_keluar = $jumlah_keluar_sj + $jumlah_real;
                  $capaian       = $capaian + $jumlah_real;
        
                  $data_item_sj = array(
                    'jumlah_keluar' => $jumlah_keluar,
                    'status_keluar' => 1,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );
                }
                else if($jumlah_input < $jumlah_max){
                  $jumlah_real   = $jumlah_input;
                  $jumlah_keluar = $jumlah_keluar_sj + $jumlah_real;
                  $capaian       = $capaian + $jumlah_real;
        
                  $data_item_sj = array(
                    'jumlah_keluar' => $jumlah_keluar,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );
                }
        
                //id detail item bpbd
                $data_last    = $this->M_Bpbd->get_last_dibpbd_id()->result_array();
                $jm_data_last = $this->M_Bpbd->get_last_dibpbd_id()->num_rows();
        
                if($jm_data_last == 1){
                    //DIBPBD20.00000000 = 8
                    $id_terakhir   = $data_last[0]['id_detail_item_bpbd'];
            
                    $tahun_sebelum = substr($id_terakhir,6,2);
            
                    if($tahun_sebelum == $year_now){
                        $count = intval(substr($id_terakhir,9,8)) + 1;
                        $pjg   = strlen($count);
                
                        if($pjg == 1){
                            $count_baru = "0000000".$count;
                        }
                        else if($pjg == 2){
                            $count_baru = "000000".$count;
                        }
                        else if($pjg == 3){
                            $count_baru = "00000".$count;
                        }
                        else if($pjg == 4){
                            $count_baru = "0000".$count;
                        }
                        else if($pjg == 5){
                            $count_baru = "000".$count;
                        }
                        else if($pjg == 6){
                            $count_baru = "00".$count;
                        }
                        else if($pjg == 7){
                            $count_baru = "0".$count;
                        }                                
                        else{
                            $count_baru = $count;
                        }
                
                            $id_dibpbd_baru = "DIBPBD".$tahun_sebelum.".".$count_baru;
                        }
                    else{
                        $id_dibpbd_baru = "DIBPBD".$year_now.".00000001";
                    }
                }
                else{
                    $id_dibpbd_baru = "DIBPBD".$year_now.".00000001";
                } 
        
                $where_item_sj = array(
                  'id_item_surat_jalan' => $id_item_sj
                );
        
                $data_detail_item_bpbd = array(
                  'id_detail_item_bpbd' => $id_dibpbd_baru,
                  'id_item_bpbd'        => $id_item_bpbd,
                  'id_item_surat_jalan' => $id_item_sj,
                  'jumlah_produk'       => $jumlah_real,
                  'user_add'            => $user,
                  'waktu_add'           => $now,
                  'status_delete'       => 0
                );
        
                $this->M_Bpbd->insert('detail_item_bpbd',$data_detail_item_bpbd);
                $this->M_Bpbd->edit('item_surat_jalan',$data_item_sj,$where_item_sj);
              }
            }


          }
          //jika yang baru < yang lama (kurangkan)
          else if($akan_diambil < $sebelum){
            $target  = $sebelum - $akan_diambil;
            $capaian = 0;

            $detail_item_bpbds    = $this->M_Bpbd->get_one_detail_item_bpbd($id_item_bpbd)->result_array();
            $jm_detail_item_bpbds = $this->M_Bpbd->get_one_detail_item_bpbd($id_item_bpbd)->num_rows();

            for($u=0;$u<$jm_detail_item_bpbds;$u++){
              if($capaian < $target){
                $jumlah_di_detail_item = $detail_item_bpbds[$u]['jumlah_produk'];
                $sisa_target           = $target - $capaian;

                $one_item_bpbds = $this->M_Bpbd->get_one_item_bpbds($detail_item_bpbds[$u]['id_detail_item_bpbd'])->result_array();

                if($sisa_target >= $jumlah_di_detail_item){
                  $max     = $jumlah_di_detail_item;
                  $capaian = $capaian + $max;

                  $data_detail_item_bpbd = array(
                    'status_delete' => 1,
                    'user_delete'   => $user,
                    'waktu_delete'  => $now
                  );

                  $where_detail_item_bpbd = array(
                    'id_detail_item_bpbd' => $detail_item_bpbds[$u]['id_detail_item_bpbd']
                  );

                  $this->M_Bpbd->edit('detail_item_bpbd',$data_detail_item_bpbd,$where_detail_item_bpbd);

                  $jumlah_keluar_baru = $one_item_bpbds[0]['jumlah_keluar'] - $max;

                  $data_item_surat_jalan = array(
                    'jumlah_keluar' => $jumlah_keluar_baru,
                    'status_keluar' => 0,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );

                  $where_item_surat_jalan = array(
                    'id_item_surat_jalan' => $detail_item_bpbds[$u]['id_item_surat_jalan']
                  );

                  $this->M_Bpbd->edit('item_surat_jalan',$data_item_surat_jalan,$where_item_surat_jalan);
                } 
                else if($sisa_target < $jumlah_di_detail_item){
                  $max     = $sisa_target;
                  $capaian = $capaian + $max;

                  $sisa_item_bpbd = $jumlah_di_detail_item - $max;

                  $data_detail_item_bpbd = array(
                    'jumlah_produk' => $sisa_item_bpbd,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );

                  $where_detail_item_bpbd = array(
                    'id_detail_item_bpbd' => $detail_item_bpbds[$u]['id_detail_item_bpbd']
                  );

                  $this->M_Bpbd->edit('detail_item_bpbd',$data_detail_item_bpbd,$where_detail_item_bpbd);

                  $jumlah_keluar_baru = $one_item_bpbds[0]['jumlah_keluar'] - $max;

                  $data_item_surat_jalan = array(
                    'jumlah_keluar' => $jumlah_keluar_baru,
                    'status_keluar' => 0,
                    'user_edit'     => $user,
                    'waktu_edit'    => $now
                  );

                  $where_item_surat_jalan = array(
                    'id_item_surat_jalan' => $detail_item_bpbds[$u]['id_item_surat_jalan']
                  );

                  $this->M_Bpbd->edit('item_surat_jalan',$data_item_surat_jalan,$where_item_surat_jalan);
                }
                
              }
            }
          }
        }
        //tidak ada isi, hapus yang lama
        else{
          //hapus item bpbd
          $data_item_bpbd = array(
            'status_delete' => 1,
            'user_delete'   => $user,
            'waktu_delete'  => $now
          );

          $where_item_bpbd = array(
            'id_item_bpbd' => $id_item_bpbd
          );

          $this->M_Bpbd->edit('item_bpbd',$data_item_bpbd,$where_item_bpbd);

          $det_item_bpbds    = $this->M_Bpbd->get_one_detail_item_bpbd($id_item_bpbd)->result_array();
          $jm_det_item_bpbds = $this->M_Bpbd->get_one_detail_item_bpbd($id_item_bpbd)->num_rows();

          for($y=0;$y<$jm_det_item_bpbds;$y++){
            $id_detail_item_bpbd = $det_item_bpbds[$y]['id_detail_item_bpbd'];

            //hapus detail item bpbd
            $data_detail_item_bpbd = array(
              'status_delete' => 1,
              'user_delete'   => $user,
              'waktu_delete'  => $now
            );

            $where_detail_item_bpbd = array(
              'id_detail_item_bpbd' => $id_detail_item_bpbd
            );

            $this->M_Bpbd->edit('detail_item_bpbd',$data_detail_item_bpbd,$where_detail_item_bpbd);
            
            //update item surat jalan
            $jumlah_det_item_bpbd_sebelum = $det_item_bpbds[$y]['jumlah_produk'];
            $jumlah_keluar_sebelum        = $det_item_bpbds[$y]['jumlah_keluar'];
            $id_item_surat_jalan          = $det_item_bpbds[$y]['id_item_surat_jalan'];

            $jumlah_keluar_baru = $jumlah_keluar_sebelum - $jumlah_det_item_bpbd_sebelum;

            $data_item_surat_jalan = array(
              'jumlah_keluar' => $jumlah_keluar_baru,
              'status_keluar' => 0,
              'user_edit'     => $user,
              'waktu_edit'    => $now
            );
            
            $where_item_surat_jalan = array(
              'id_item_surat_jalan' => $id_item_surat_jalan
            );

            $this->M_Bpbd->edit('item_surat_jalan',$data_item_surat_jalan,$where_item_surat_jalan);
          }
        }
      }
    }
    redirect('bpbd/semua_bpbd');
  }

  public function delete(){
    $id_bpbd = $this->input->post('id_bpbd_hapus');

    $user = $_SESSION['id_user'];
    $now  = date('Y-m-d H:i:s');
    
    //BPBD
      $data_bpbd = array(
        'status_delete' => 1,
        'user_delete'   => $user,
        'waktu_delete'  => $now
      );

      $where_bpbd = array(
        'id_bpbd' => $id_bpbd
      );

      $this->M_Bpbd->edit('bpbd',$data_bpbd,$where_bpbd);
    //tutup BPBD

      $item_bpbds    = $this->M_Bpbd->get_one_item_bpbd_fr_bpbd($id_bpbd)->result_array();
      $jm_item_bpbds = $this->M_Bpbd->get_one_item_bpbd_fr_bpbd($id_bpbd)->num_rows();

      for($i=0;$i<$jm_item_bpbds;$i++){
        $id_item_bpbd = $item_bpbds[$i]['id_item_bpbd'];

        //ITEM BPBD
          $data_item_bpbd = array(
            'status_delete' => 1,
            'user_delete'   => $user,
            'waktu_delete'  => $now
          );

          $where_item_bpbd = array(
            'id_item_bpbd' => $id_item_bpbd
          );

          $this->M_Bpbd->edit('item_bpbd',$data_item_bpbd,$where_item_bpbd);
        //tutup item bpbd

        //DETAIL ITEM BPBD
          $detail_item_bpbds    = $this->M_Bpbd->get_one_detail_item_bpbd($id_item_bpbd)->result_array();
          $jm_detail_item_bpbds = $this->M_Bpbd->get_one_detail_item_bpbd($id_item_bpbd)->num_rows();

          for($k=0;$k<$jm_detail_item_bpbds;$k++){
            $id_detail_item_bpbd = $detail_item_bpbds[$k]['id_detail_item_bpbd'];

            $data_detail_item_bpbd = array(
              'status_delete' => 1,
              'user_delete'   => $user,
              'waktu_delete'  => $now
            );

            $where_detail_item_bpbd = array(
              'id_detail_item_bpbd' => $id_detail_item_bpbd
            );

            $this->M_Bpbd->edit('detail_item_bpbd',$data_detail_item_bpbd,$where_detail_item_bpbd);

            //ITEM SURAT JALAN
              $akan_dihapus  = $detail_item_bpbds[$k]['jumlah_produk'];
              $jumlah_keluar = $detail_item_bpbds[$k]['jumlah_keluar'];

              $jumlah_keluar_baru = $jumlah_keluar - $akan_dihapus;

              $data_item_sj = array(
                'jumlah_keluar' => $jumlah_keluar_baru,
                'status_keluar' => 0,
                'user_edit'     => $user,
                'waktu_edit'    => $now
              );

              $where_item_sj = array(
                'id_item_surat_jalan' => $detail_item_bpbds[$k]['id_item_surat_jalan']
              );

              $this->M_Bpbd->edit('item_surat_jalan',$data_item_sj,$where_item_sj);
            //tutup item surat jalan
          }
        //tutup detail item bpbd
      }
      redirect('bpbd/semua_bpbd');  
  }

  public function konfirmasi(){
    $id_bpbd = $this->input->post('id_bpbdnya');

    $data = array(
      'status_bpbd' => 1,
      'user_edit'   => $user,
      'waktu_edit'  => $now
    );

    $where = array(
      'id_bpbd' => $id_bpbd
    );

    $this->M_Bpbd->edit('bpbd',$data,$where);

    redirect('bpbd/terkonfirmasi_bpbd');

  }

  public function print(){
    $id = $this->input->post('id_bpbd');

    $data['nama_perusahaan']    = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();

    $data['bpbd']       = $this->M_Bpbd->get_one_bpbd($id)->result_array();
    $data['det_bpbd']   = $this->M_Bpbd->get_one_item_bpbd($id)->result_array();
    $data['jmdet_bpbd'] = $this->M_Bpbd->get_one_item_bpbd($id)->num_rows();

    $data['warna']      = $this->M_Warna->select_all_aktif()->result_array();
    $data['jmwarna']    = $this->M_Warna->select_all_aktif()->num_rows();
    $data['ukuran']     = $this->M_UkuranProduk->select_all_aktif()->result_array();
    $data['jmukuran']   = $this->M_UkuranProduk->select_all_aktif()->num_rows();

    $waktu = $data['bpbd'][0]['tanggal'];

        $hari_array = array(
            'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        );
        $hr = date('w', strtotime($waktu));
        $hari = $hari_array[$hr];
        $tanggal = date('j', strtotime($waktu));
        $bulan_array = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        );
        $bl = date('n', strtotime($waktu));
        $bulan = $bulan_array[$bl];
        $tahun = date('Y', strtotime($waktu));
        
        $data['tanggal'] = "$hari, $tanggal $bulan $tahun";
        

    $this->load->view('v_print_bpbd',$data);
  }

  public function printx(){
    $id = $this->input->post('id_bpbd');

    $nama_perusahaan    = $this->M_Tetapan->cari_tetapan("Nama Perusahaan")->result_array();

    $bpbd       = $this->M_Bpbd->get_one_bpbd($id)->result_array();
    $det_bpbd   = $this->M_Bpbd->get_one_item_bpbd($id)->result_array();
    $jmdet_bpbd = $this->M_Bpbd->get_one_item_bpbd($id)->num_rows();

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
    $pdf->Cell(190,0,'No: '.$bpbd[0]['no_bpbd'],0,1,'L');

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15);
    $pdf->Cell(190,7,'BUKTI PENGIRIMAN DELIVERY BARANG (BPBD)',0,1,'L');
    
    $pdf->Cell(125);
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(190,10,'Hari & Tanggal: '.$bpbd[0]['tanggal'],0,1,'L');


		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'NO',1,0,'C');
		$pdf->Cell(118,6,'ITEM',1,0,'C');
		$pdf->Cell(20,6,'QTY',1,0,'C');
		$pdf->Cell(12,6,'UNIT',1,0,'C');
		$pdf->Cell(30,6,'KET',1,1,'C');
		
    $pdf->SetFont('Arial','',10);

    for($i=0;$i<$jmdet_bpbd;$i++){
      $id_detail_produk = $det_bpbd[$i]['id_detail_produk'];
      $detail_produk    = $this->M_Bpbd->get_one_detail_produk($id_detail_produk)->result_array();

      $keterangannya = $detail_produk[0]['keterangan'];
      $nama_produk   = $detail_produk[0]['nama_produk'];
      //nama produk
      if($keterangannya == 0){
          for($w=0;$w<$jmwarna;$w++){
              if($warna[$w]['id_warna'] == $detail_produk[0]['id_warna']){
                  $nama_warna = $warna[$w]['nama_warna'];
              }
          }

          for($w=0;$w<$jmukuran;$w++){
              if($ukuran[$w]['id_ukuran_produk'] == $detail_produk[0]['id_ukuran_produk']){
                  $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
              }
          }

          $nama_produk = $nama_produk ." ". $nama_ukuran . " (" . $nama_warna . ")";
      }
      else if($keterangannya == 1){
          for($w=0;$w<$jmukuran;$w++){
              if($ukuran[$w]['id_ukuran_produk'] == $detail_produk[0]['id_ukuran_produk']){
                  $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
              }
          }

          $nama_produk = $nama_produk . $nama_ukuran;
      }
      else if($keterangannya == 2){
          for($w=0;$w<$jmwarna;$w++){
              if($warna[$w]['id_warna'] == $detail_produk[0]['id_warna']){
                  $nama_warna = $warna[$w]['nama_warna'];
              }
          }

          $nama_produk = $nama_produk . " (" . $nama_warna . ")";
      }
      else{
          $nama_produk = $nama_produk;
      }



      $pdf->Cell(10,6,($i+1),1,0,'C');
      $pdf->Cell(118,6,$nama_produk,1,0,'C');
      $pdf->Cell(20,6,$det_bpbd[$i]['jumlah_produk'].' pcs',1,0,'C');
      $pdf->Cell(12,6,"Pcs",1,0,'C');
      $pdf->Cell(30,6,$det_bpbd[$i]['keterangan'],1,1,'C');
    }
    
    /*
    for($i=0;$i<$jmdet_bpbd;$i++){
      //nama produk
      if($det_bpbd[$i]['keterangan'] == 0){
          for($w=0;$w<$jmwarna;$w++){
              if($warna[$w]['id_warna'] == $det_bpbd[$i]['id_warna']){
                  $nama_warna = $warna[$w]['nama_warna'];
              }
          }

          for($w=0;$w<$jmukuran;$w++){
              if($ukuran[$w]['id_ukuran_produk'] == $det_bpbd[$i]['id_ukuran_produk']){
                  $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
              }
          }

          $nama_produk = $det_bpbd[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
      }
      else if($det_bpbd[$i]['keterangan'] == 1){
          for($w=0;$w<$jmukuran;$w++){
              if($ukuran[$w]['id_ukuran_produk'] == $det_bpbd[$i]['id_ukuran_produk']){
                  $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
              }
          }

          $nama_produk = $det_bpbd[$i]['nama_produk'] . $nama_ukuran;
      }
      else if($det_bpbd[$i]['keterangan'] == 2){
          for($w=0;$w<$jmwarna;$w++){
              if($warna[$w]['id_warna'] == $det_bpbd[$i]['id_warna']){
                  $nama_warna = $warna[$w]['nama_warna'];
              }
          }

          $nama_produk = $det_bpbd[$i]['nama_produk'] . " (" . $nama_warna . ")";
      }
      else{
          $nama_produk = $det_bpbd[$i]['nama_produk'];
      }

      $selected_pos = "";
      $hit = 0;
      for($g=0;$g<$jm_selected_po;$g++){
          if($det_bpbd[$i]['id_detail_bpbj'] == $selected_po[$g]['id_detail_bpbj']){
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
    */
    
    
    
    //keterangan
    $pdf->Cell(2,7,'',0,1);
    $pdf->Cell(2,7,'Keterangan:',0,1);
    $pdf->Cell(190,12,$bpbd[0]['keterangan'],1,0,'L');

    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(10,20,'',0,1);

    $pdf->Cell(40,6,'PLAT NO: '.$bpbd[0]['plat_no'],0,0,'C');

    $pdf->Cell(60);
    $pdf->Cell(30,6,'LEADER DEPT',1,0,'C');
		$pdf->Cell(30,6,'DICEK',1,0,'C');
    $pdf->Cell(30,6,'WH',1,0,'C');

    $pdf->Cell(0,6,'',0,1);
    $pdf->Cell(40,6,'DRIVER: '.$bpbd[0]['driver'],0,0,'C');

    $pdf->Cell(60);
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
