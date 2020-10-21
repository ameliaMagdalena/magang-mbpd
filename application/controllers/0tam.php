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

    public function delete_perencanaan_produksi(){
        $id_produksi = $this->input->post('id_produksi');
        $user        = $_SESSION['id_user'];
        $now         = date('Y-m-d H:i:s'); 

        $tgl  = $this->M_PerencanaanProduksi->get_tanggal_produksi($id_produksi)->result_array();
        $awal = $tgl[0]['tanggal_awal'];

        //PRODUKSI
        $id_prod   = $this->M_PerencanaanProduksi->get_semua_idprod($awal)->result_array();
        $jmid_prod = $this->M_PerencanaanProduksi->get_semua_idprod($awal)->num_rows();

        $id_awal  = "";
        $id_akhir = "";
        
        //loop 7x
        for($i=0;$i<$jmid_prod;$i++){
            $id_produksinya   = $id_prod[$i]['id_produksi'];
            $tanggal_produksi = $id_prod[$i]['tanggal'];
           
            if($i == 0){
                $id_awal = $id_produksinya;
            }
            if($i == 6){
                $id_akhir = $id_produksinya;
            }

            $data_prod = array (
                'user_edit'     => $user,
                'waktu_edit'    => $now,
                'status_delete' => 1
            );

            $where_prod = array (
                'id_produksi' => $id_produksinya
            );

            $this->M_PerencanaanProduksi->edit('produksi',$data_prod,$where_prod);
            
            //PRODUKSI LINE
            $prodline   = $this->M_PerencanaanProduksi->get_semua_prodline($id_awal,$id_akhir)->result_array();
            $jmprodline = $this->M_PerencanaanProduksi->get_semua_prodline($id_awal,$id_akhir)->num_rows();

            $id_awal_prodline  = "";
            $id_akhir_prodline = "";

            for($t=0;$t<$jmprodline;$t++){
                $id_produksi_linenya = $prodline[$t]['id_produksi_line'];

                if($t == 0){
                    $id_awal_prodline = $id_produksi_linenya;
                }
                if($t == 27){
                    $id_akhir_prodline = $id_produksi_linenya;
                }

                $data_produksi_line = array(
                    'user_edit'     => $user,
                    'waktu_edit'    => $now,
                    'status_delete' => 1
                );

                $where_produksi_line = array(
                    'id_produksi_line' => $id_produksi_linenya
                );

                $this->M_PerencanaanProduksi->edit('produksi_line',$data_produksi_line,$where_produksi_line);

                //SURAT PERINTAH LEMBUR
                    $tanggal_spl = $prodline[$t]['tanggal'];
                    $id_line_spl = $prodline[$t]['id_line'];

                    $spl_cek   = $this->M_SuratPerintahLembur->cari_spl($tanggal_spl,$id_line_spl)->result_array();
                    $jmspl_cek = $this->M_SuratPerintahLembur->cari_spl($tanggal_spl,$id_line_spl)->num_rows();

                    if($jmspl_cek > 0){
                        //jika hanya berdasarkan perencanaan produksi, status deletenya = 0
                        if($spl_cek[0]['keterangan_spl'] == 0){
                            $data_spl = array(
                                'user_delete'  => $user,
                                'waktu_delete' => $now,
                                'status_delete'=> 1
                            );

                            $where_spl = array (
                                'id_surat_perintah_lembur' => $spl_cek[0]['id_surat_perintah_lembur']
                            );
    
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                        //jika berdasarkan perencanaan produksi & others, ubah keterangan spl menjadi 1
                        else if($spl_cek[0]['keterangan_spl'] == 2){
                            $data_spl = array(
                                'keterangan_spl'=> 1,
                                'user_edit'     => $user,
                                'waktu_edit'    => $now
                            );
                           
                            $where_spl = array (
                                'id_surat_perintah_lembur' => $spl_cek[0]['id_surat_perintah_lembur']
                            );
    
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                    }


                //DETAIL PRODUKSI LINE
                    $detprodline   = $this->M_PerencanaanProduksi->get_semua_detprodline($id_awal_prodline,$id_akhir_prodline)->result_array();
                    $jmdetprodline = $this->M_PerencanaanProduksi->get_semua_detprodline($id_awal_prodline,$id_akhir_prodline)->num_rows();
                
                    for($y=0;$y<$jmdetprodline;$y++){
                        $id_detail_produksi_linenya = $detprodline[$y]['id_detail_produksi_line'];
        
                        $data_detail_produksi_line = array (
                            'user_edit'     => $user,
                            'waktu_edit'    => $now,
                            'status_delete' => 1
                        );
        
                        $where_detail_produksi_line = array (
                            'id_detail_produksi_line' =>  $id_detail_produksi_linenya
                        );
        
                        $this->M_PerencanaanProduksi->edit('detail_produksi_line',$data_detail_produksi_line,$where_detail_produksi_line);
                        
                        //PRODUKSI TERTUNDA
                            if($detprodline[$y]['status_perencanaan'] == 1){
                                $dpt = $this->M_PerencanaanProduksi->get_one_detprodtun($id_detail_produksi_linenya)->result_array();

                                $data_dpt = array(
                                    'status_delete' => 1,
                                    'user_delete'   => $user,
                                    'waktu_delete'  => $now
                                );

                                $where_dpt = array(
                                    'id_detail_produksi_tertunda' => $dpt[0]['id_detail_produksi_tertunda']
                                );

                                $this->M_PerencanaanProduksi->edit('detail_produksi_tertunda',$data_dpt,$where_dpt);

                                $id_pt      = $dpt[0]['id_produksi_tertunda'];

                                $pt = $this->M_PerencanaanProduksi->get_one_prodtun($id_pt)->result_array();

                                $jumlah_terencana =  $pt[0]['jumlah_terencana'] - $dpt[0]['jumlah_perencanaan'];

                                if($jumlah_terencana > 0){
                                    $data_pt = array(
                                        'jumlah_terencana'   => $jumlah_terencana,
                                        'status_penjadwalan' => 1,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );
    
                                    $where_pt = array (
                                        'id_produksi_tertunda' => $id_pt 
                                    );
    
                                    $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                } else if($jumlah_terencana == 0){
                                    $data_pt = array(
                                        'jumlah_terencana'   => $jumlah_terencana,
                                        'status_penjadwalan' => 0,
                                        'user_edit'          => $user,
                                        'waktu_edit'         => $now
                                    );
    
                                    $where_pt = array (
                                        'id_produksi_tertunda' => $id_pt 
                                    );
    
                                    $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_pt,$where_pt);
                                }
                            }
                        //tutup prodtun
                        
                        //PERMINTAAN MATERIAL
                        if($detprodline[$y]['jumlah_item_perencanaan'] > 0){
                            $tanggal_produksi =  $detprodline[$y]['tanggal'];
                            $id_det_po        =  $detprodline[$y]['id_detail_purchase_order'];

                            $permat    = $this->M_PerencanaanProduksi->get_one_permat($tanggal_produksi,$id_det_po)->result_array();
                            $id_permat = $permat[0]['id_permintaan_material'];
                    
                            $data_permat = array(
                                'status_delete' => 1,
                                'user_delete'   => $user,
                                'waktu_delete'  => $now
                            );

                            $where_permat = array(
                                'id_permintaan_material' => $id_permat
                            );

                            $this->M_PerencanaanProduksi->edit('permintaan_material',$data_permat,$where_permat);
                            $this->M_PerencanaanProduksi->delete_detpermat($id_permat);
                        }
                    }
            }
        }
        redirect('perencanaanProduksi/semua_perencanaan_produksi');
    }


}
