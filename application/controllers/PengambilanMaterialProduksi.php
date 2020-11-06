<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengambilanMaterialProduksi extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->model('M_PengambilanMaterialProduksi');
        $this->load->model('M_LaporanPerencanaanCutting');
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

    public function buat_pengambilan_material(){
      $data['min_date'] = $this->input->post('tanggal');
      $nmline = "Line Sewing";
      
      $data['permat']        = $this->M_PengambilanMaterialProduksi->get_one_permat_by_line($nmline,$data['min_date'])->result();
      $data['warna']         = $this->M_Warna->select_all_aktif()->result();
      $data['ukuran']        = $this->M_UkuranProduk->select_all_aktif()->result();

      $this->load->view('v_pengambilan_material_produksi_tambah2',$data);
    }

    public function detail_permintaan(){
      $id = $this->input->post('id');

      $data['permat']       = $this->M_PengambilanMaterialProduksi->get_one_permat($id)->result_array();
      $data['detpermat']    = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id)->result_array();
      $data['jm_detpermat'] = $this->M_PengambilanMaterialProduksi->get_one_detpermat($id)->num_rows();
      $data['pengmat']      = $this->M_PengambilanMaterialProduksi->get_pengmat_sebelum()->result_array();
      $data['jm_pengmat']   = $this->M_PengambilanMaterialProduksi->get_pengmat_sebelum()->num_rows();
      $data['wip']          = $this->M_PengambilanMaterialProduksi->get_wip()->result_array();
      $data['jm_wip']       = $this->M_PengambilanMaterialProduksi->get_wip()->num_rows();


      echo json_encode($data);
    }

    public function tambah_permintaan_pengambilan(){
      $jumlah             = $this->input->post("jumlah_detpermat");
      $tanggal_produksi   = $this->input->post('tanggal_produksi_add');
      $status_pengambilan = $this->input->post("status_pengambilan");

      $user = $_SESSION['id_user'];
      $now  = date('Y-m-d H:i:s');

      $karyawan    = $this->M_PengambilanMaterialProduksi->get_karyawan($user)->result_array();
      $id_karyawan = $karyawan[0]['id_karyawan'];


      for($i=0;$i<$jumlah;$i++){
        $id_detail_permat = $this->input->post("id_det_permat".$i);
        $id_sub_jenmat    = $this->input->post("id_sub_jenmat".$i);
        $wip              = $this->input->post("wip".$i);
        $akan_diambil     = $this->input->post("ambil".$i);
        
          if($akan_diambil > 0){
            $tahun_sekarangnya = substr(date('Y',strtotime($now)),2,2);
            $bulan_sekarangnya = date('m',strtotime($now));

            $idcode_lumat = "LUMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

            $id_lumat_last     = $this->M_PengambilanMaterialProduksi->get_last_lumat_id($idcode_lumat)->result_array();
            $id_lumat_last_cek = $this->M_PengambilanMaterialProduksi->get_last_lumat_id($idcode_lumat)->num_rows();

            if($id_lumat_last_cek == 1){
                $id_terakhirnya    = $id_lumat_last[0]['id_pengeluaran_material'];

                $tahun_sebelumnya  = substr($id_terakhirnya,5,2);
                $bulan_sebelumnya  = substr($id_terakhirnya,7,2);
                        
                //kalau tahun sama
                if($tahun_sebelumnya == $tahun_sekarangnya){
                    //kalau tahun & bulannya sama berarti count+1
                    if($bulan_sebelumnya == $bulan_sekarangnya){
                        $countnya = intval(substr($id_terakhirnya,10,5)) + 1;
                        $pjgnya   = strlen($countnya);
            
                        if($pjgnya == 1){
                            $countnya_baru = "0000".$countnya;
                        }
                        else if($pjgnya == 2){
                            $countnya_baru = "000".$countnya;
                        }
                        else if($pjgnya == 3){
                            $countnya_baru = "00".$countnya;
                        }
                        else if($pjgnya == 4){
                            $countnya_baru = "0".$countnya;
                        }
                        else{
                            $countnya_baru = $countnya;
                        }
                        
                        //id yang baru
                        $id_lumat_baru = "LUMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                    }
                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                    else{
                        //id yang baru
                        $id_lumat_baru = "LUMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                    }
                }
                //kalau tahun tidak sama
                else{
                    //id yang baru
                    $id_lumat_baru = "LUMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                }
            }
            else{
                //id yang baru
                $id_lumat_baru = "LUMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
            }

            $idcode_ammat = "AMMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

            $id_ammat_last     = $this->M_PengambilanMaterialProduksi->get_last_ammat_id($idcode_ammat)->result_array();
            $id_ammat_last_cek = $this->M_PengambilanMaterialProduksi->get_last_ammat_id($idcode_ammat)->num_rows();

            if($id_ammat_last_cek == 1){
                $id_terakhirnya    = $id_ammat_last[0]['id_pengambilan_material'];

                $tahun_sebelumnya  = substr($id_terakhirnya,5,2);
                $bulan_sebelumnya  = substr($id_terakhirnya,7,2);
                        
                //kalau tahun sama
                if($tahun_sebelumnya == $tahun_sekarangnya){
                    //kalau tahun & bulannya sama berarti count+1
                    if($bulan_sebelumnya == $bulan_sekarangnya){
                        $countnya = intval(substr($id_terakhirnya,10,5)) + 1;
                        $pjgnya   = strlen($countnya);
            
                        if($pjgnya == 1){
                            $countnya_baru = "0000".$countnya;
                        }
                        else if($pjgnya == 2){
                            $countnya_baru = "000".$countnya;
                        }
                        else if($pjgnya == 3){
                            $countnya_baru = "00".$countnya;
                        }
                        else if($pjgnya == 4){
                            $countnya_baru = "0".$countnya;
                        }
                        else{
                            $countnya_baru = $countnya;
                        }
                        
                        //id yang baru
                        $id_ammat_baru = "AMMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                    }
                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                    else{
                        //id yang baru
                        $id_ammat_baru = "AMMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                    }
                }
                //kalau tahun tidak sama
                else{
                    //id yang baru
                    $id_ammat_baru = "AMMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                }
            }
            else{
                //id yang baru
                $id_ammat_baru = "AMMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
            }

            if($wip == 0){
              $data_pengeluaran_material = array(
                'id_pengeluaran_material' => $id_lumat_baru,
                'id_sub_jenis_material'   => $id_sub_jenmat,
                'tanggal_keluar'          => $now,
                'jumlah_keluar'           => $akan_diambil,
                'keterangan_keluar'       => 0,
                'user_add'                => $user,
                'waktu_add'               => $now,
                'status_delete'           => 0
              );

              $this->M_PengambilanMaterialProduksi->insert('pengeluaran_material',$data_pengeluaran_material);

              $data_pengambilan_material = array(
                'id_pengambilan_material'       => $id_ammat_baru,
                'id_karyawan'                   => $id_karyawan,
                'id_detail_permintaan_material' => $id_detail_permat,
                'id_pengeluaran_material'       => $id_lumat_baru,
                'stok_wip'                      => $wip,
                'status_pengambilan'            => $status_pengambilan,
                'status_keluar'                 => 0,
                'user_add'                      => $user,
                'waktu_add'                     => $now,
                'status_delete'                 => 0
              );

              $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data_pengambilan_material);              
            } else{
              //inventory line
                $permintaan_material = $this->M_PengambilanMaterialProduksi->get_one_permat_by_detpermat($id_detail_permat)->result_array();
                $id_line             = $permintaan_material[0]['id_line'];

                $cari_inline = $this->M_LaporanPerencanaanCutting->get_inline($id_line,$id_sub_jenmat)->result_array();

                $id_inline          = $cari_inline[0]['id_inventory_line'];
                $jumlah_inline_lama = $cari_inline[0]['total_material'];

                if($jumlah_inline_lama > $akan_diambil){
                  $jumlah_inline_baru = $jumlah_inline_lama - $akan_diambil;
                } else{
                  $jumlah_inline_baru = 0;
                }


                $data_inline = array(
                  'total_material' => $jumlah_inline_baru,
                  'user_edit'      => $user,
                  'waktu_edit'     => $now
                );

                $where_inline = array(
                  'id_inventory_line' => $id_inline
                );

                $this->M_PengambilanMaterialProduksi->edit('inventory_line',$data_inline,$where_inline);


                //DETAIL INVENTORY LINE
                    //id detail inventory line
                    $tanggal = date('Y-m-d');
                    $tahun_sekarang = substr(date('Y',strtotime($now)),2,2);
                    $bulan_sekarang = date('m',strtotime($now));
                    $id_code        = "DINLI".$tahun_sekarang.$bulan_sekarang.".";
        
                    $last       = $this->M_LaporanPerencanaanCutting->get_last_dinli_id($id_code)->result_array();
                    $last_cek   = $this->M_LaporanPerencanaanCutting->get_last_dinli_id($id_code)->num_rows();
        
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
                                $id_dinli_baru = "DINLI".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                            }
                            //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                            else{
                                //id yang baru
                                $id_dinli_baru = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                            }
                        }
                        //kalau tahun tidak sama
                        else{
                            //id yang baru
                            $id_dinli_baru = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                        }
                    }
                    else{
                        //id yang baru
                        $id_dinli_baru = "DINLI".$tahun_sekarang.$bulan_sekarang.".00001";
                    }

                    $data_detail_inline = array(
                            'id_detail_inventory_line' => $id_dinli_baru,
                            'id_inventory_line'        => $id_inline,
                            'tanggal'                  => $tanggal,
                            'jumlah_material'          => $akan_diambil,
                            'status'                   => 1,
                            'user_add'                 => $user,
                            'waktu_add'                => $now,
                            'status_delete'            => 0
                    );

                    $this->M_PengambilanMaterialProduksi->insert('detail_inventory_line',$data_detail_inline);
                //tutup detail inventory line
              //tutup inventory line

              if($akan_diambil > $wip){
                $minta_gudang = $akan_diambil - $wip;

                $data_pengeluaran_material = array(
                  'id_pengeluaran_material' => $id_lumat_baru,
                  'id_sub_jenis_material'   => $id_sub_jenmat,
                  'tanggal_keluar'          => $now,
                  'jumlah_keluar'           => $minta_gudang,
                  'keterangan_keluar'       => 0,
                  'user_add'                => $user,
                  'waktu_add'               => $now,
                  'status_delete'           => 0
                );
  
                $this->M_PengambilanMaterialProduksi->insert('pengeluaran_material',$data_pengeluaran_material);
  
                $data_pengambilan_material = array(
                  'id_pengambilan_material'       => $id_ammat_baru,
                  'id_karyawan'                   => $id_karyawan,
                  'id_detail_permintaan_material' => $id_detail_permat,
                  'id_pengeluaran_material'       => $id_lumat_baru,
                  'stok_wip'                      => $wip,
                  'status_pengambilan'            => $status_pengambilan,
                  'status_keluar'                 => 0,
                  'user_add'                      => $user,
                  'waktu_add'                     => $now,
                  'status_delete'                 => 0
                );
  
                $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data_pengambilan_material);
              }
            }

            //jika pengambilan untuk cutting kain, maka input perencanaan cutting kain
            if($status_pengambilan == 0){
              //cari perencanaan cutting sebelumnya
              $tanggal_pc              = date('Y-m-d');

              $permintaan_material = $this->M_PengambilanMaterialProduksi->get_one_permat_by_detpermat($id_detail_permat)->result_array();

              $tanggal_produksi                  = $permintaan_material[0]['tanggal_produksi'];
              $id_line                           = $permintaan_material[0]['id_line'];
              $id_detail_purchase_order_customer = $permintaan_material[0]['id_detail_purchase_order_customer'];

              $det_prodline    = $this->M_PengambilanMaterialProduksi->get_one_detail_prodline($tanggal_produksi,$id_line,$id_detail_purchase_order_customer)->result_array();
              $id_det_prodline = $det_prodline[0]['id_detail_produksi_line'];
              $jumlah_item_perencanaan = $det_prodline[0]['jumlah_item_perencanaan'];

              $perencanaan_cutting = $this->M_PengambilanMaterialProduksi->get_one_perencanaan_cutting($tanggal_pc,$id_det_prodline)->num_rows();

              //jika belum ada, tambahkan baru
              if($perencanaan_cutting == 0){
                //PCUT2010.00000
                $idcode_pcut = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                $id_pcut_last     = $this->M_PengambilanMaterialProduksi->get_last_pcut_id($idcode_pcut)->result_array();
                $id_pcut_last_cek = $this->M_PengambilanMaterialProduksi->get_last_pcut_id($idcode_pcut)->num_rows();
    
                if($id_pcut_last_cek == 1){
                    $id_terakhirnya    = $id_pcut_last[0]['id_perencanaan_cutting'];
    
                    $tahun_sebelumnya  = substr($id_terakhirnya,4,2);
                    $bulan_sebelumnya  = substr($id_terakhirnya,6,2);
                            
                    //kalau tahun sama
                    if($tahun_sebelumnya == $tahun_sekarangnya){
                        //kalau tahun & bulannya sama berarti count+1
                        if($bulan_sebelumnya == $bulan_sekarangnya){
                            $countnya = intval(substr($id_terakhirnya,9,5)) + 1;
                            $pjgnya   = strlen($countnya);
                
                            if($pjgnya == 1){
                                $countnya_baru = "0000".$countnya;
                            }
                            else if($pjgnya == 2){
                                $countnya_baru = "000".$countnya;
                            }
                            else if($pjgnya == 3){
                                $countnya_baru = "00".$countnya;
                            }
                            else if($pjgnya == 4){
                                $countnya_baru = "0".$countnya;
                            }
                            else{
                                $countnya_baru = $countnya;
                            }
                            
                            //id yang baru
                            $id_pcut_baru = "PCUT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                        }
                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                        else{
                            //id yang baru
                            $id_pcut_baru = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                        }
                    }
                    //kalau tahun tidak sama
                    else{
                        //id yang baru
                        $id_pcut_baru = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                    }
                }
                else{
                    //id yang baru
                    $id_pcut_baru = "PCUT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                }

                $data_perencanaan_cutting = array(
                  'id_perencanaan_cutting' => $id_pcut_baru,
                  'id_detail_produksi_line'=> $id_det_prodline,
                  'tanggal'                => $tanggal_pc,
                  'jumlah_perencanaan'     => $jumlah_item_perencanaan,
                  'status_laporan'         => 0,
                  'user_add'               => $user,
                  'waktu_add'              => $now,
                  'status_delete'          => 0
                );

                $this->M_PengambilanMaterialProduksi->insert('perencanaan_cutting',$data_perencanaan_cutting);
              }
            }
          }
      }
      redirect('pengambilanMaterialProduksi/tambah');
    }

    public function semua_pengambilan_material(){
      if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
        $line = "Line Cutting";
        $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
    else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
        $line = "Line Bonding";
        $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
    else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
        $line = "Line Sewing";
        $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
      }
    else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
        $line = "Line Assy";
        $data['pengambilan_material']  = $this->M_PengambilanMaterialProduksi->select_all_pm($line)->result();
    }
    else{
        //$data['surat_perintah_lembur'] = $this->M_SuratPerintahLembur->select_all_aktif()->result(); 
    }

      $this->load->view('v_pengambilan_material_produksi_semua',$data);
    }


    public function coba_tambah(){
      $this->load->view('v_pengambilan_material_produksi_tambah1');
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