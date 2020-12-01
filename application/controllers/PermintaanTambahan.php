<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanTambahan extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        
        $this->load->model('M_PermintaanTambahan');
        $this->load->model('M_PengambilanMaterialProduksi');
        $this->load->model('M_LaporanPerencanaanCutting');
        $this->load->model('M_Line');
        $this->load->model('M_UkuranProduk');
        $this->load->model('M_Warna');
        $this->load->library('pdf');

    }

    function index(){
        $data['min_date'] = date('Y-m-d');

        if($_SESSION['nama_jabatan'] == "PIC Line Cutting"){
          $nmline = "Line Cutting";
        } else if($_SESSION['nama_jabatan'] == "PIC Line Bonding"){
          $nmline = "Line Bonding";
        } else if($_SESSION['nama_jabatan'] == "PIC Line Sewing"){
          $nmline = "Line Sewing";
        } else if($_SESSION['nama_jabatan'] == "PIC Line Assy"){
          $nmline = "Line Assy";
        } else{
          $nmline = $this->input->post('select_line');
        }
        
        //ini belum
        if($nmline == "Line Sewing"){
          $this->load->view('v_permintaan_tambahan_tambah1',$data);
        }
        else{
          $data['permat']        = $this->M_PengambilanMaterialProduksi->get_one_permat_by_line($nmline,$data['min_date'])->result();
          $data['warna']         = $this->M_Warna->select_all_aktif()->result();
          $data['ukuran']        = $this->M_UkuranProduk->select_all_aktif()->result();
  
          $this->load->view('v_permintaan_tambahan_tambah2',$data);
        }
    }

    function buat_permintaan_tambahan(){
        $data['min_date'] = $this->input->post('tanggal');
        $nmline = "Line Sewing";

        $data['permat']        = $this->M_PengambilanMaterialProduksi->get_one_permat_by_line($nmline,$data['min_date'])->result();
        $data['warna']         = $this->M_Warna->select_all_aktif()->result();
        $data['ukuran']        = $this->M_UkuranProduk->select_all_aktif()->result();

        $this->load->view('v_permintaan_tambahan_tambah2',$data);
    }

    function tambah(){
        $jumlah = $this->input->post('jumlah_detpermat_tambahan');
        $now = date('Y-m-d H:i:s');

        for($i=0;$i<$jumlah;$i++){
            $jumlah_tambah = $this->input->post('ambilnya'.$i);

            if($jumlah_tambah > 0){
                $id_det_permat = $this->input->post('id_det_permat'.$i);
                $keterangan    = $this->input->post('keterangan'.$i);

                $tahun_sekarangnya = substr(date('Y',strtotime($now)),2,2);
                $bulan_sekarangnya = date('m',strtotime($now));

                $idcode = "PERTAM".$tahun_sekarangnya.$bulan_sekarangnya.".";

                $id_last     = $this->M_PermintaanTambahan->get_last_id($idcode)->result_array();
                $id_last_cek = $this->M_PermintaanTambahan->get_last_id($idcode)->num_rows();
    
                if($id_last_cek == 1){
                    $id_terakhirnya    = $id_last[0]['id_permintaan_tambahan'];
    
                    $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                    $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                            
                    //kalau tahun sama
                    if($tahun_sebelumnya == $tahun_sekarangnya){
                        //kalau tahun & bulannya sama berarti count+1
                        if($bulan_sebelumnya == $bulan_sekarangnya){
                            $countnya = intval(substr($id_terakhirnya,11,3)) + 1;
                            $pjgnya   = strlen($countnya);
                
                            if($pjgnya == 1){
                                $countnya_baru = "00".$countnya;
                            }
                            else if($pjgnya == 2){
                                $countnya_baru = "0".$countnya;
                            }
                            else{
                                $countnya_baru = $countnya;
                            }
                            
                            //id yang baru
                            $id_baru = "PERTAM".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                        }
                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                        else{
                            //id yang baru
                            $id_baru = "PERTAM".$tahun_sekarangnya.$bulan_sekarangnya.".001";
                        }
                    }
                    //kalau tahun tidak sama
                    else{
                        //id yang baru
                        $id_baru = "PERTAM".$tahun_sekarangnya.$bulan_sekarangnya.".001";
                    }
                }
                else{
                    //id yang baru
                    $id_baru = "PERTAM".$tahun_sekarangnya.$bulan_sekarangnya.".001";
                }


                $data = array(
                    'id_permintaan_tambahan'        => $id_baru,
                    'id_detail_permintaan_material' => $id_det_permat,
                    'jumlah_tambah'                 => $jumlah_tambah,
                    'keterangan'                    => $keterangan,
                    'status'                        => 0,
                    'user_add'                      => $_SESSION['id_user'],
                    'waktu_add'                     => $now
                );

                $this->M_PermintaanTambahan->insert('permintaan_tambahan',$data);
            }
        }
        redirect('permintaanTambahan');
    }

    function detail_permat(){
        $id = $this->input->post('id');

        $data['permat'] = $this->M_PermintaanTambahan->get_one_permat($id)->result_array();

        echo json_encode($data);
    }

    function edit_permat(){
        $id         = $this->input->post('no_permat_ed');
        $jumlah     = $this->input->post('jumlah_ed');
        $keterangan = $this->input->post('keterangan_ed');

        $data = array(
            'jumlah_tambah' => $jumlah,
            'keterangan'    => $keterangan,
            'user_edit'     => $_SESSION['id_user'],
            'waktu_edit'    => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_permintaan_tambahan' => $id
        );

        $this->M_PermintaanTambahan->edit('permintaan_tambahan',$data,$where);
        
        redirect('permintaanTambahan/semua');
    }

    function delete_permat(){
        $id = $this->input->post('id_pertam_del');

        $data = array(
            'status_delete' => 1,
            'user_delete'   => $_SESSION['id_user'],
            'waktu_delete'  => date('Y-m-d H:i:s')
        );

        $where = array(
            'id_permintaan_tambahan' =>$id
        );

        $this->M_PermintaanTambahan->edit('permintaan_tambahan',$data,$where);

        redirect('permintaanTambahan/semua');
    }

    function semua(){
        $data['pertam'] = $this->M_PermintaanTambahan->select_all_aktif()->result();

        $this->load->view('v_permintaan_tambahan_semua', $data);
    }

    function belum_diproses(){
        $data['pertam'] = $this->M_PermintaanTambahan->select_all_aktif()->result();

        $this->load->view('v_permintaan_tambahan_belum_diproses', $data);
    }

    function diterima(){
        $data['pertam'] = $this->M_PermintaanTambahan->select_all_aktif()->result();

        $this->load->view('v_permintaan_tambahan_diterima', $data);
    }

    function ditolak(){
        $data['pertam'] = $this->M_PermintaanTambahan->select_all_aktif()->result();

        $this->load->view('v_permintaan_tambahan_ditolak', $data);
    }

    function selesai(){
        $data['pertam'] = $this->M_PermintaanTambahan->select_all_aktif()->result();

        $this->load->view('v_permintaan_tambahan_selesai', $data);
    }
}