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
      $now  = date('Y-m-d');

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
                'id_karyawan'                   => $user,
                'id_detail_permintaan_material' => $id_detail_permat,
                'id_pengeluaran_material'       => $id_lumat_baru,
                'status_pengambilan'            => $status_pengambilan,
                'user_add'                      => $user,
                'waktu_add'                     => $now,
                'status_delete'                 => 0
              );

              $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data_pengambilan_material);
            } else{
              //potong wip dulu
              //input
            }
          }


        /*
          $data_pengeluaran_material = array(
            'id_pengeluaran_material' => 
            'id_sub_jenis_material'   => $id_sub_jenmat,
            'tanggal_keluar'          => $tanggal_permintaan,
            'jumlah_keluar'           => $akan_diambil,
            'keterangan_keluar'       => 0,
            'user_add'                => $user,
            'waktu_add'               => $now,
            'status_delete'           => 0
          );

          $this->M_PengambilanMaterialProduksi->insert('pengeluaran_material',$data_pengeluaran_material);

          $data_pengambilan_material = array(
            'id_permintaan_material'        =>
            'id_karyawan'                   => $user,
            'id_detail_permintaan_material' => $id_detail_permat
            'id_pengeluaran_material'       => 
            'status_pengambilan'            =>
            'user_add'                      => $user,
            'waktu_add'                     => $now,
            'status_delete'                 => 0
          );

          $this->M_PengambilanMaterialProduksi->insert('pengambilan_material',$data_pengambilan_material);
        */
      }
      
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