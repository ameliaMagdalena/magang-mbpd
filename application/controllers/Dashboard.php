<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
 
        $this->load->model('M_Dashboard');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->model('M_Bpbj');
        $this->load->model('M_SuratPerintahLembur');
        $this->load->model('M_Line');

        if($this->session->userdata('status_login') != "login"){
			    redirect('akses');
		    }
    }

	public function index(){
    $now = date('Y-m-d');
    //update spl batal
    $this->M_SuratPerintahLembur->cek_batal($now);

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

    //isi dashboard produksi
          if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Direktur"){
        // DIREKTUR
          } else if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Manager"){
        //MANAGER
          } else if($_SESSION['nama_departemen'] == "Purchasing" && $_SESSION['nama_jabatan'] == "Admin"){
        //ADMIN PURCHASING
            //surat jalan
                $data['surat_jalan'] = $this->M_Dashboard->surat_jalan($now)->result_array();
            //tutup surat jalan

            //invoice
                $data['invoice'] = $this->M_Dashboard->invoice($now)->result_array();
            //tutup invoice
        //tutup admin purchasing
          } else if($_SESSION['nama_departemen'] == "Research & Development" && $_SESSION['nama_jabatan'] == "Admin"){
        //ADMIN RISDEV
            $data['jumlah_produk']       = $this->M_Dashboard->jumlah_produk()->result_array();
            $data['jumlah_jenis_produk'] = $this->M_Dashboard->jumlah_jenis_produk()->result_array();
            $data['jumlah_warna']        = $this->M_Dashboard->jumlah_warna()->result_array();
            $data['jumlah_ukuran_produk']= $this->M_Dashboard->jumlah_ukuran_produk()->result_array();
        //tutup admin risdev
          } else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PPIC"){
        //PPIC PRODUKSI
            //po yang belum diproses
              $data['po'] = $this->M_Dashboard->po_cust()->result_array();
            //tutup po
            
            /*
            //perencanaan produksi minggu ini
                $data['bulan_now'] = date('m');

                $tahun = date('Y'); //Mengambil tahun saat ini
                $bulan = date('m'); //Mengambil bulan saat ini
                $data['jumlah_tanggal'] = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
                
                $tgl = $tahun."-".$bulan."-1";
                $data['first_day'] = date('l', strtotime($tgl));
            //tutup perencanaan produksi minggu ini
            */

            //target efisiensi hari ini
                $data['target_efisiensi']    = $this->M_Dashboard->target_efisiensi($now)->result();
                $data['jm_target_efisiensi'] = $this->M_Dashboard->target_efisiensi($now)->num_rows();
            //tutup target efisiensi hari ini

            //laporan hasil produksi
                //line cutting
                $data['hp_cutting']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Cutting")->result_array();
                $data['jm_hp_cutting'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Cutting")->num_rows();

              //line bonding
                $data['hp_bonding']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Bonding")->result_array();
                $data['jm_hp_bonding'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Bonding")->num_rows();

              //line sewing
                $data['hp_sewing']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Sewing")->result_array();
                $data['jm_hp_sewing'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Sewing")->num_rows();

              //line assy
              $data['hp_assy']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Assy")->result_array();
              $data['jm_hp_assy'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Assy")->num_rows();

            //tutup laporan hasil produksi

            //perencanaan cutting kain
                $data['cutkain']    = $this->M_Dashboard->perencanaan_cutting_kain($now)->result();
                $data['jm_cutkain'] = $this->M_Dashboard->perencanaan_cutting_kain($now)->num_rows();

                $data['warna']            = $this->M_Warna->select_all_aktif()->result();
                $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();
            //tutup perencanaan cutting kain

            //produksi tertunda
                $data['produksi_tertunda']    = $this->M_Dashboard->produksi_tertunda()->result();
                $data['jm_produksi_tertunda'] = $this->M_Dashboard->produksi_tertunda()->num_rows();
            //tutup produksi tertunda

            //laporan perencanaan cutting
                $data['laporan_percut'] = $this->M_Dashboard->laporan_perencanaan_cutting_kain($now)->result_array();
            //tutup laporan perencanaan cutting
        //tutup ppic produksi
          } else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting" ||
                    $_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding" ||
                    $_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"  ||
                    $_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
        //PIC
                      $line = "";
                      if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
                        $line = "Line Cutting";
                      }
                      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
                          $line = "Line Bonding";
                        }
                      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
                          $line = "Line Sewing";
                        }
                      else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
                          $line = "Line Assy";
                      }

                //jumlah inventory line
                    $data['jumlah_inventory_line'] = $this->M_Dashboard->jumlah_inventory_line($line)->result_array();
                //tutup jumlah inventory line

                //perencanaan produksi hari ini
                    $data['perencanaan_hari_ini']    = $this->M_Dashboard->perencanaan_hari_ini($now,$line)->result();
                    $data['jm_perencanaan_hari_ini'] = $this->M_Dashboard->perencanaan_hari_ini($now,$line)->num_rows();
                    $data['warna']                   = $this->M_Warna->select_all_aktif()->result();
                    $data['ukuran']                  = $this->M_UkuranProduk->select_all_aktif()->result();
                //tutup perencanaan

                //laporan hasil produksi
                    $data['hasil_produksi'] = $this->M_Dashboard->status_hasil_produksi($now,$line)->result_array();
                    $data['jm_hasil_produksi'] = $this->M_Dashboard->status_hasil_produksi($now,$line)->num_rows();
                //tutup laporan hasil produksi

                //pengambilan material
                    $data['jumlah_pengambilan_material'] = $this->M_Dashboard->pengambilan_material($now,$line)->num_rows();
                //tutup pengambilan material

                //surat perintah lembur yang belum diproses
                    $data['spl'] = $this->M_Dashboard->spl_line($line)->num_rows();
                //tutup surat perintah lembur yang belum diproses

                //laporan lembur yang belum diproses
                    $data['ll'] = $this->M_Dashboard->ll_line($line,$now)->num_rows();
                //tutup laporan lembur yang belum diproses
        //tutup PIC
          } else if($_SESSION['nama_departemen'] == "Finish Good" && $_SESSION['nama_jabatan'] == "Admin"){
        //ADMIN FINISH GOOD
            //bpbd
                $data['bpbd'] = $this->M_Dashboard->bpbd($now)->result_array();
            //tutup bpbd

            //laporan hasil produksi assy
                $data['hasil_produksi']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Assy")->result_array();
                $data['jm_hasil_produksi'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Assy")->num_rows();
            //tutup laporan hasil produksi assy

            //bpbj
                $data['produk']        = $this->M_Bpbj->select_produk($now)->result();
                $data['pros_prod']     = $this->M_Bpbj->last_proses_produk()->result();
                $data['line']          = $this->M_Line->select_all_aktif()->result();
            
                $data['warna']            = $this->M_Warna->select_all_aktif()->result();
                $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();
            
                $data['bpbj_sebelum'] = $this->M_Bpbj->select_all_detail_bpbj_aktif($now)->result();    
                $data['jmbpbj_sebelum'] = $this->M_Bpbj->select_all_detail_bpbj_aktif($now)->num_rows();   
            //tutup bpbj

        //tutup admin finish good
          } else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "Admin"){
        //ADMIN PRODUKSI
            //laporan hasil produksi
                //line cutting
                  $data['hp_cutting']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Cutting")->result_array();
                  $data['jm_hp_cutting'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Cutting")->num_rows();

                //line bonding
                  $data['hp_bonding']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Bonding")->result_array();
                  $data['jm_hp_bonding'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Bonding")->num_rows();

                //line sewing
                  $data['hp_sewing']    = $this->M_Dashboard->status_hasil_produksi($now,"Line Sewing")->result_array();
                  $data['jm_hp_sewing'] = $this->M_Dashboard->status_hasil_produksi($now,"Line Sewing")->num_rows();

            //tutup laporan hasil produksi

            //perencanaan cutting kain
                $data['cutkain']    = $this->M_Dashboard->perencanaan_cutting_kain($now)->result();
                $data['jm_cutkain'] = $this->M_Dashboard->perencanaan_cutting_kain($now)->num_rows();

                $data['warna']            = $this->M_Warna->select_all_aktif()->result();
                $data['ukuran']           = $this->M_UkuranProduk->select_all_aktif()->result();
            //tutup perencanaan cutting kain

            //laporan perencanaan cutting
                $data['laporan_percut'] = $this->M_Dashboard->laporan_perencanaan_cutting_kain($now)->result_array();
            //tutup laporan perencanaan cutting
        //tutup admin produksi
          }
    //isi dashboard produksi
    
    $this->load->view('v_dashboard',$data);
    //$this->load->view('v_dashboards',$data);
  }

    
}
