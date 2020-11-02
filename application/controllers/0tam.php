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

        //INVENTORY LINE
        $detail_produksi_line    = $this->M_HasilProduksi->get_detail_produksi_line_group_by($id_produksi)->result_array();
        $jm_detail_produksi_line = $this->M_HasilProduksi->get_detail_produksi_line_group_by($id_produksi)->num_rows();
  
        for($i=0;$i<$jm_detail_produksi_line;$i++){
          $id_line                             = $detail_produksi_line[$i]['id_line'];
          $id_detail_produk                    = $detail_produksi_line[$i]['id_detail_produk'];
          $id_detail_purchase_order_customer   = $detail_produksi_line[$i]['id_detail_purchase_order'];
          $id_produk                           = $detail_produksi_line[$i]['id_produk'];
          $jumlah_item_aktual                  = $detail_produksi_line[$i]['jumlah_item_aktual'];
          $tanggal                             = $detail_produksi_line[$i]['tanggal'];
  
          $konsumsi_material    = $this->M_HasilProduksi->get_konsumsi_material($id_produk,$id_line)->result_array();
          $jm_konsumsi_material = $this->M_HasilProduksi->get_konsumsi_material($id_produk,$id_line)->num_rows();
  
          for($u=0;$u<$jm_konsumsi_material;$u++){
            $id_konsumsi_material  = $konsumsi_material[$u]['id_konsumsi_material'];
            $id_sub_jenis_material = $konsumsi_material[$u]['id_sub_jenis_material'];
  
            $konsumsi_material_satuan = $konsumsi_material[$u]['jumlah_konsumsi'];
  
            //jumlah minta material seharusnya
            $total_konsumsi_material = $konsumsi_material_satuan * $jumlah_item_aktual;
  
            //jumlah minta material aktual
            $pengambilan_material = $this->M_HasilProduksi->get_pengambilan_material($tanggal,$id_line,$id_detail_purchase_order_customer,$id_konsumsi_material)->result_array();
  
            $jumlah_keluar = $pengambilan_material[0]['total_keluar'];
            $sisa_wip      = $jumlah_keluar - $total_konsumsi_material;
  
            //input ke inventory line
            if($sisa_wip > 0){
              //cek apakah sudah ada inventory line sebelumnya
              $inventory_line    = $this->M_HasilProduksi->get_inventory_line($id_line,$id_sub_jenis_material)->result_array();
              $jm_inventory_line = $this->M_HasilProduksi->get_inventory_line($id_line,$id_sub_jenis_material)->num_rows();
  
              if($jm_inventory_line == 0){
                $jumlah_inli    = $this->M_HasilProduksi->select_all_inventory_line()->num_rows();
                $id_number      = $jumlah_inli + 1;
  
                $id_inli     = "INLI-".$id_number;
  
                $data_inventory_line = array(
                  'id_inventory_line'     => $id_inli,
                  'id_line'               => $id_line,
                  'id_sub_jenis_material' => $id_sub_jenis_material,
                  'total_material'        => $sisa_wip,
                  'user_add'              => $user,
                  'waktu_add'             => $now,
                  'status_delete'         => 0
                );
  
                $this->M_HasilProduksi->insert('inventory_line',$data_inventory_line);
  
                //DETAIL INVENTORY LINE
                  $tgl            = date('Y-m-d');
                  $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
                  $bulan_sekarang = date('m',strtotime($tgl));
                  $id_code        = "DINLI".$tahun_sekarang.$bulan_sekarang.".";
  
                  $last       = $this->M_HasilProduksi->get_last_dinli_id($id_code)->result_array();
                  $last_cek   = $this->M_HasilProduksi->get_last_dinli_id($id_code)->num_rows();
  
                  //id
                  if($last_cek == 1){
                      $id_terakhir    = $last[0]['id_detail_inventory_line'];
  
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
                              $id_detail_inventory_line = "DINLI".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                          }
                          //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                          else{
                              //id yang baru
                              $id_detail_inventory_line = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                          }
                      }
                      //kalau tahun tidak sama
                      else{
                          //id yang baru
                          $id_detail_inventory_line = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                      }
                  }
                  else{
                      //id yang baru
                      $id_detail_inventory_line = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                  } 
  
                  $data_detail_inventory_line = array(
                    'id_detail_inventory_line' => $id_detail_inventory_line,
                    'id_inventory_line'        => $id_inli,
                    'tanggal'                  => $now,
                    'jumlah_material'          => $sisa_wip,
                    'status'                   => 0,
                    'user_add'                 => $user,
                    'waktu_add'                => $now,
                    'status_delete'            => 0
                  );
  
                  $this->M_HasilProduksi->insert('detail_inventory_line',$data_detail_inventory_line);
                //tutup detail inventory line
  
              } else{
                $id_inventory_line = $inventory_line[0]['id_inventory_line'];
                $jumlah_inventory  = $inventory_line[0]['total_material'];
  
                $jumlah_baru = $sisa_wip + $jumlah_inventory;
  
                $data_inventory_line = array(
                  'total_material' => $jumlah_baru,
                  'user_edit'      => $user,
                  'waktu_edit'     => $now
                );
  
                $where_inventory_line = array(
                  'id_inventory_line' => $id_inventory_line
                );
  
                $this->M_HasilProduksi->edit('inventory_line',$data_inventory_line,$where_inventory_line);
  
                //DETAIL INVENTORY LINE
                  $tgl            = date('Y-m-d');
                  $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
                  $bulan_sekarang = date('m',strtotime($tgl));
                  $id_code        = "DINLI".$tahun_sekarang.$bulan_sekarang.".";
  
                  $last       = $this->M_HasilProduksi->get_last_dinli_id($id_code)->result_array();
                  $last_cek   = $this->M_HasilProduksi->get_last_dinli_id($id_code)->num_rows();
  
                  //id
                  if($last_cek == 1){
                      $id_terakhir    = $last[0]['id_detail_inventory_line'];
  
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
                              $id_detail_inventory_line = "DINLI".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                          }
                          //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                          else{
                              //id yang baru
                              $id_detail_inventory_line = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                          }
                      }
                      //kalau tahun tidak sama
                      else{
                          //id yang baru
                          $id_detail_inventory_line = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                      }
                  }
                  else{
                      //id yang baru
                      $id_detail_inventory_line = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                  } 
  
                  $data_detail_inventory_line = array(
                    'id_detail_inventory_line' => $id_detail_inventory_line,
                    'id_inventory_line'        => $id_inventory_line,
                    'tanggal'                  => $now,
                    'jumlah_material'          => $sisa_wip,
                    'status'                   => 0,
                    'user_add'                 => $user,
                    'waktu_add'                => $now,
                    'status_delete'            => 0
                  );
  
                  $this->M_HasilProduksi->insert('detail_inventory_line',$data_detail_inventory_line);
                //tutup detail inventory line
  
  
  
              }
            }
  
            echo $id_line." || ".$id_detail_produk." || ".$id_produk." || ".$jumlah_item_aktual." || ".$tanggal." || ".$id_detail_purchase_order_customer." || ".$total_konsumsi_material." || ".$jumlah_keluar." || ".$sisa_wip."<br>";
            
  
          
  
          }
  
          //echo " --------------------------------------- <br>";
  
  
        }
      //tutup inventory line


}
