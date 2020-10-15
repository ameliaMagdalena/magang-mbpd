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

    public function tambah_perencanaan(){
        $start_date = $this->input->post('start_date');
        $now        = date('Y-m-d H:i:s');
        $user       = $_SESSION['id_user'];

        for($j=0;$j<7;$j++){
            $tgl   = date('Y-m-d', strtotime('+'.$j.'days', strtotime($start_date)));

            //keterangan tanggal produksi
            $hari  = date('D',strtotime($tgl));

            if($hari == "Mon"){
                $harinya = "Senin";
            }
            else if($hari == "Tue"){
                $harinya = "Selasa";
            }
            else if($hari == "Wed"){
                $harinya = "Rabu";
            }
            else if($hari == "Thu"){
                $harinya = "Kamis";
            }
            else if($hari == "Fri"){
                $harinya = "Jumat";
            }
            else if($hari == "Sat"){
                $harinya = "Sabtu";
            }
            else{
                $harinya = "Minggu";
            }

            $carket          = $this->M_PerencanaanProduksi->cari_ket_hari($harinya)->result_array();
            $keterangan_hari = $carket[0]['isi_tetapan'];

            $tahun_sekarang = substr(date('Y',strtotime($tgl)),2,2);
            $bulan_sekarang = date('m',strtotime($tgl));
            $id_code        = "P".$tahun_sekarang.$bulan_sekarang.".";

            $last       = $this->M_PerencanaanProduksi->get_last_produksi_id($id_code)->result_array();
            $last_cek   = $this->M_PerencanaanProduksi->get_last_produksi_id($id_code)->num_rows();

            //id
            if($last_cek == 1){
                $id_terakhir    = $last[0]['id_produksi'];

                $tahun_sebelum  = substr($id_terakhir,1,2);
            
                $bulan_sebelum  = substr($id_terakhir,3,2);

                //kalau tahun sama
                if($tahun_sebelum == $tahun_sekarang){
                    //kalau tahun & bulannya sama berarti count+1
                    if($bulan_sebelum == $bulan_sekarang){
                        $count = intval(substr($id_terakhir,6,4)) + 1;
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
                        
                        //id yang baru
                        $id_produksi_baru = "P".$tahun_sebelum.$bulan_sebelum.".".$count_baru;
                    }
                    //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                    else{
                        //id yang baru
                        $id_produksi_baru = "P".$tahun_sekarang.$bulan_sekarang.".0001";
                    }
                }
                //kalau tahun tidak sama
                else{
                    //id yang baru
                    $id_produksi_baru = "P".$tahun_sekarang.$bulan_sekarang.".0001";
                }
            }
            else{
                //id yang baru
                $id_produksi_baru = "P".$tahun_sekarang.$bulan_sekarang.".0001";
            }                
            
            //PRODUKSI LINE

            //untuk hitung berapa produksi_line yang ada perencanaannya.
            $cek_terisi=0;

            for($i=1;$i<=4;$i++){
                $id_line = $this->input->post('idline_kf'.$i);
                $tpt     = $this->input->post('tpt_kf'.$i);

                $total_waktu_perencanaan = $this->input->post('tw_kf'.$id_line.'day'.($j+1));
                $efisiensi_perencanaan   = $this->input->post('prs_kf'.$id_line.'day'.($j+1));

                //id codenya
                $idcode_produksi_line = "PL".$tahun_sekarang.$bulan_sekarang.".";

                //get id_produksi_line yang terakhir diinput
                $id_produksi_line_lama = $this->M_PerencanaanProduksi->get_last_produksi_line_id($idcode_produksi_line)->result_array();
                $id_prodline_cek       = $this->M_PerencanaanProduksi->get_last_produksi_line_id($idcode_produksi_line)->num_rows();

                if($id_prodline_cek == 1){
                    $prodline_id_terakhir    = $id_produksi_line_lama[0]['id_produksi_line'];
                    $prodline_tahun_sebelum  = substr($prodline_id_terakhir,2,2);
                    $prodline_bulan_sebelum  = substr($prodline_id_terakhir,4,2);

                    //kalau tahun sama
                    if($prodline_tahun_sebelum == $tahun_sekarang){
                        //kalau tahun & bulannya sama berarti count+1
                        if($prodline_bulan_sebelum == $bulan_sekarang){
                            $prodline_count = intval(substr($prodline_id_terakhir,7,6)) + 1;
                            $prodline_pjg   = strlen($prodline_count);
    
                            if($prodline_pjg == 1){
                                $prodline_count_baru = "00000".$prodline_count;
                            }
                            else if($prodline_pjg == 2){
                                $prodline_count_baru = "0000".$prodline_count;
                            }
                            else if($prodline_pjg == 3){
                                $prodline_count_baru = "000".$prodline_count;
                            }
                            else if($prodline_pjg == 4){
                                $prodline_count_baru = "00".$prodline_count;
                            }
                            else if($prodline_pjg == 5){
                                $prodline_count_baru = "0".$prodline_count;
                            }
                            else{
                                $prodline_count_baru = $prodline_count;
                            }
                            
                            //id yang baru
                            $id_prodline_baru = "PL".$prodline_tahun_sebelum.$prodline_bulan_sebelum.".".$prodline_count_baru;
    
                        }
                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                        else{
                            //id yang baru
                            $id_prodline_baru = "PL".$tahun_sekarang.$bulan_sekarang.".000001";
    
                        }
                    }
                    //kalau tahun tidak sama
                    else{
                        //id yang baru
                        $id_prodline_baru = "PL".$tahun_sekarang.$bulan_sekarang.".000001";
                    }
                }
                else{
                    $id_prodline_baru = "PL".$tahun_sekarang.$bulan_sekarang.".000001";
                }

                //kalo total waktu perencanaannya ==0 maka nanti pas mo simpan/insert total waktu dan efisiensi isi 0
                    if($total_waktu_perencanaan == "" || $total_waktu_perencanaan == 0){
                        $data_ef = array (
                            'id_produksi_line'        => $id_prodline_baru,
                            'id_line'                 => $id_line,
                            'id_produksi'             => $id_produksi_baru,
                            'total_processing_time'   => $tpt,
                            'total_waktu_perencanaan' => 0,
                            'efisiensi_perencanaan'   => 0,
                            'status_perencanaan'      => 0,
                            'status_laporan'          => 0,
                            'user_add'                =>$user,
                            'waktu_add'               =>$now,
                            'status_delete'           =>0
                        );
                    }
                    else{
                        if($efisiensi_perencanaan < 100){
                            $data_ef = array (
                                'id_produksi_line'        => $id_prodline_baru,
                                'id_line'                 => $id_line,
                                'id_produksi'             => $id_produksi_baru,
                                'total_processing_time'   => $tpt,
                                'total_waktu_perencanaan' => $total_waktu_perencanaan,
                                'efisiensi_perencanaan'   => $efisiensi_perencanaan,
                                'status_perencanaan'      => 1,
                                'status_laporan'          => 0,
                                'user_add'                =>$user,
                                'waktu_add'               =>$now,
                                'status_delete'           =>0
                            );

                            $cek_terisi++;
                        }
                        else{
                            $data_ef = array (
                                'id_produksi_line'        => $id_prodline_baru,
                                'id_line'                 => $id_line,
                                'id_produksi'             => $id_produksi_baru,
                                'total_processing_time'   => $tpt,
                                'total_waktu_perencanaan' => $total_waktu_perencanaan,
                                'efisiensi_perencanaan'   => $efisiensi_perencanaan,
                                'status_perencanaan'      => 2,
                                'status_laporan'          => 0,
                                'user_add'                =>$user,
                                'waktu_add'               =>$now,
                                'status_delete'           =>0
                            );

                            $cek_terisi++;
                        }
                        
                    }
                    $this->M_PerencanaanProduksi->insert('produksi_line',$data_ef);

                //SURAT PERINTAH LEMBUR
                    //kalo efisiensi > 0 && harinya bukan merupakan hari produksi
                    if($total_waktu_perencanaan != 0 && $keterangan_hari == "Hari Libur"){
                        $jum_spl = $this->M_SuratPerintahLembur->select_all()->num_rows();
                        $jumlah = $jum_spl + 1;
                        $id_spl_baru = "SPL-".$jumlah;
                        
                        $cek_tanggal = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->num_rows();

                        if($cek_tanggal == 0){
                            $data_spl = array (
                                'id_surat_perintah_lembur' => $id_spl_baru,
                                'id_line'                  => $id_line,
                                'tanggal'                  => $tgl,
                                'waktu_lembur'             => $keterangan_hari,
                                'status_spl'               => 0,
                                'keterangan_spl'           => 0,
                                'user_add'                 => $user,
                                'waktu_add'                => $now,
                                'status_delete'            => 0
                            );
                            $this->M_SuratPerintahLembur->insert('surat_perintah_lembur',$data_spl);
                        }
                        else{
                            $idspl = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->result_array();
                            $idsplnya = $idspl[0]['id_surat_perintah_lembur'];

                            $data_spl = array (
                                'keterangan_spl' => 2,
                                'user_edit'      => $user,
                                'waktu_edit'     => $now
                            );
                            $where_spl = array (
                                'id_surat_perintah_lembur' => $idsplnya
                            );
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                    }
                    else if($efisiensi_perencanaan > 100){
                        $jum_spl = $this->M_SuratPerintahLembur->select_all()->num_rows();
                        $jumlah  = $jum_spl + 1;
                        $id_spl_baru = "SPL-".$jumlah;
                        
                        $cek_tanggal = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->num_rows();

                        if($cek_tanggal == 0){
                            $data_spl = array (
                                'id_surat_perintah_lembur' => $id_spl_baru,
                                'id_line'                  => $id_line,
                                'tanggal'                  => $tgl,
                                'waktu_lembur'             => $keterangan_hari,
                                'status_spl'               => 0,
                                'keterangan_spl'           => 0,
                                'user_add'                 => $user,
                                'waktu_add'                => $now,
                                'status_delete'            => 0
                            );
                            $this->M_SuratPerintahLembur->insert('surat_perintah_lembur',$data_spl);
                        }
                        else{
                            $idspl = $this->M_SuratPerintahLembur->cek_tanggal($tgl,$id_line)->result_array();
                            $idsplnya = $idspl[0]['id_surat_perintah_lembur'];

                            $data_spl = array (
                                'keterangan_spl' => 2,
                                'user_edit'      => $user,
                                'waktu_edit'     => $now
                            );
                            $where_spl = array (
                                'id_surat_perintah_lembur' => $idsplnya
                            );
                            $this->M_SuratPerintahLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
                        }
                    }
            }

            //PRODUKSI
            if($cek_terisi > 0){
                $data_prod = array (
                    'id_produksi'           =>$id_produksi_baru,
                    'tanggal'               =>$tgl,
                    'status_perencanaan'    =>1,
                    'status_laporan'        =>0,
                    'user_add'              =>$user,
                    'waktu_add'             =>$now,
                    'status_delete'         =>0
                );
            } else{
                $data_prod = array (
                    'id_produksi'           =>$id_produksi_baru,
                    'tanggal'               =>$tgl,
                    'status_perencanaan'    =>0,
                    'status_laporan'        =>0,
                    'user_add'              =>$user,
                    'waktu_add'             =>$now,
                    'status_delete'         =>0
                );
            }
            $this->M_PerencanaanProduksi->insert('produksi',$data_prod);
        }

        $jumlah_dpo = $this->input->post('jumlah_dpo_kf');

        //DETAIL PRODUKSI LINE
        for($o=0;$o<$jumlah_dpo;$o++){
            //keterangan ada isi/nda
            $keterangan_div = $this->input->post('ket'.$o);
            $statper        = $this->input->post('statper'.$o);

            if($keterangan_div == 1){
                $id_detpo    = $this->input->post('id_bg3'.$o);
                $jumlah_line = $this->input->post('jumlah_line'.$o);
                
                for($k=1;$k<=$jumlah_line;$k++){
                    $idline = $this->input->post($o.'id_line_kf'.$k);
    
                    for($z=1;$z<=7;$z++){
                        $tanggal        = date('Y-m-d', strtotime('+'.($z-1).'days', strtotime($start_date)));
                        $jumlah_item_s  = $this->input->post('jm'.$o.$idline.'day'.$z);
                        $waktu_proses_s = $this->input->post('ef'.$o.$idline.'day'.$z);
                        
                        if($jumlah_item_s != ""){
                            $jumlah_item = $jumlah_item_s;
                            $waktu_proses = $waktu_proses_s;
                        }
                        else{
                            $jumlah_item  = 0;
                            $waktu_proses = 0;
                        }

                        //cari id_produksi_line berdasarkan tanggal & line
                        $id_prodline_sesuai = $this->M_PerencanaanProduksi->cari_id_prodline($idline,$tanggal)->result_array();
                        $id_prodlinenya     = $id_prodline_sesuai[0]['id_produksi_line'];
                        
                        //id detail perencanaan produksi
                        $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
                        $bulan_sekarangnya = date('m',strtotime($tanggal));

                        $idcode_detprod_line = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".";

                        $id_detprodline_last     = $this->M_PerencanaanProduksi->get_last_detprodline_id($idcode_detprod_line)->result_array();
                        $id_detprodline_last_cek = $this->M_PerencanaanProduksi->get_last_detprodline_id($idcode_detprod_line)->num_rows();
            
                        if($id_detprodline_last_cek == 1){
                            $id_terakhirnya    = $id_detprodline_last[0]['id_detail_produksi_line'];
            
                            $tahun_sebelumnya  = substr($id_terakhirnya,3,2);
                            $bulan_sebelumnya  = substr($id_terakhirnya,5,2);
                                    
                            //kalau tahun sama
                            if($tahun_sebelumnya == $tahun_sekarangnya){
                                //kalau tahun & bulannya sama berarti count+1
                                if($bulan_sebelumnya == $bulan_sekarangnya){
                                    $countnya = intval(substr($id_terakhirnya,8,8)) + 1;
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
                                    $id_dpl_baru = "DPL".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                }
                                //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                else{
                                    //id yang baru
                                    $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                }
                            }
                            //kalau tahun tidak sama
                            else{
                                //id yang baru
                                $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                            }
                        }
                        else{
                            //id yang baru
                            $id_dpl_baru = "DPL".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                        }

                        //-----------------------------------
                        if($statper == 0){
                            $data_detprod = array(
                                'id_detail_produksi_line'   => $id_dpl_baru,
                                'id_detail_purchase_order'  => $id_detpo,
                                'id_produksi_line'          => $id_prodlinenya,
                                'jumlah_item_perencanaan'   => $jumlah_item,
                                'waktu_proses_perencanaan'  => $waktu_proses,
                                'status_perencanaan'        => 0,
                                'status_aktual'             => 0,
                                'user_add'                  => $user,
                                'waktu_add'                 => $now,
                                'status_delete'             => 0
                            );
                            $this->M_PerencanaanProduksi->insert('detail_produksi_line',$data_detprod);
                        } else{
                            $data_detprod = array(
                                'id_detail_produksi_line'   => $id_dpl_baru,
                                'id_detail_purchase_order'  => $id_detpo,
                                'id_produksi_line'          => $id_prodlinenya,
                                'jumlah_item_perencanaan'   => $jumlah_item,
                                'waktu_proses_perencanaan'  => $waktu_proses,
                                'status_perencanaan'        => 1,
                                'status_aktual'             => 0,
                                'user_add'                  => $user,
                                'waktu_add'                 => $now,
                                'status_delete'             => 0
                            );
                            $this->M_PerencanaanProduksi->insert('detail_produksi_line',$data_detprod);
                        }

                        //UPDATE PERENCANAAN TERTUNDA
                        if($statper == 1){
                                $id_prodtun  = $this->input->post('id_pt_bg3'.$o);
                                $one_prodtun = $this->M_PerencanaanProduksi->get_one_prodtun($id_prodtun)->result_array();
                                $jumlah_tertunda_sebelum  = $one_prodtun[0]['jumlah_tertunda'];
                                $jumlah_terencana_sebelum = $one_prodtun[0]['jumlah_terencana'];

                                //id produksi tunda produksi
                                $tahun_sekarangnya = substr(date('Y',strtotime($tanggal)),2,2);
                                $bulan_sekarangnya = date('m',strtotime($tanggal));

                                $idcode_dprodtun = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                $id_dprodtun_last     = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->result_array();
                                $id_dprodtun_last_cek = $this->M_PerencanaanProduksi->get_last_dprodtun_id($idcode_dprodtun)->num_rows();

                                if($id_dprodtun_last_cek == 1){
                                    $id_terakhirnya    = $id_dprodtun_last[0]['id_detail_produksi_tertunda'];

                                    $tahun_sebelumnya  = substr($id_terakhirnya,8,2);
                                    $bulan_sebelumnya  = substr($id_terakhirnya,10,2);
                                            
                                    //kalau tahun sama
                                    if($tahun_sebelumnya == $tahun_sekarangnya){
                                        //kalau tahun & bulannya sama berarti count+1
                                        if($bulan_sebelumnya == $bulan_sekarangnya){
                                            $countnya = intval(substr($id_terakhirnya,13,8)) + 1;
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
                                            $id_dprodtun_baru = "DPRODTUN".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                        }
                                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                        else{
                                            //id yang baru
                                            $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                        }
                                    }
                                    //kalau tahun tidak sama
                                    else{
                                        //id yang baru
                                        $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                    }
                                }
                                else{
                                    //id yang baru
                                    $id_dprodtun_baru = "DPRODTUN".$tahun_sekarangnya.$bulan_sekarangnya.".00000001";
                                }

                                $data_detprodtun = array(
                                    'id_detail_produksi_tertunda' => $id_dprodtun_baru,
                                    'id_produksi_tertunda'        => $id_prodtun,
                                    'id_detail_produksi_line'     => $id_dpl_baru,
                                    'jumlah_perencanaan'          => $jumlah_item,
                                    'user_add'                    => $user,
                                    'waktu_add'                   => $now,
                                    'status_delete'               => 0
                                );

                                $this->M_PerencanaanProduksi->insert('detail_produksi_tertunda',$data_detprodtun);

                                if($jumlah_item >0){
                                    $jumlahnya = $jumlah_terencana_sebelum +$jumlah_item;
                                    $sisanya   = $jumlah_tertunda_sebelum - $jumlah_terencana_sebelum;

                                    if($jumlah_item == $sisanya){
                                        $data_prodtun = array (
                                            'jumlah_terencana'   => $jumlahnya,
                                            'status_penjadwalan' => 2
                                        );

                                        $where_prodtun = array (
                                        'id_produksi_tertunda' => $id_prodtun  
                                        );

                                        $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
                                    } else{
                                        $data_prodtun = array (
                                            'jumlah_terencana'   => $jumlahnya,
                                            'status_penjadwalan' => 1
                                        );

                                        $where_prodtun = array (
                                        'id_produksi_tertunda' => $id_prodtun  
                                        );

                                        $this->M_PerencanaanProduksi->edit('produksi_tertunda',$data_prodtun,$where_prodtun);
                                    }
                                }
                        }
                                                    
                        
                        //PURCHASE ORDER CUSTOMER STATUS UPDATES
                        $id_pos = $this->M_PerencanaanProduksi->get_detail_po($id_detpo)->result_array();
                        $id_po_tam  = $id_pos[0]['id_purchase_order_customer'];

                        $data_po = array (
                            'status_po' => 2,
                            'user_edit' => $user,
                            'waktu_edit'=> $now
                        );

                        $where_po = array (
                            'id_purchase_order_customer' => $id_po_tam
                        );

                        $this->M_PerencanaanProduksi->edit('purchase_order_customer',$data_po,$where_po);


                        //PERMINTAAN MATERIAL
                            if($jumlah_item != "" || $jumlah_item != 0){
                                //id detail perencanaan produksi
                                $idcode_permat = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                $id_permat_last     = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->result_array();
                                $id_permat_last_cek = $this->M_PerencanaanProduksi->get_last_permat_id($idcode_permat)->num_rows();
                    
                                if($id_permat_last_cek == 1){
                                    $id_terakhirnya    = $id_permat_last[0]['id_permintaan_material'];
                    
                                    $tahun_sebelumnya  = substr($id_terakhirnya,6,2);
                                    $bulan_sebelumnya  = substr($id_terakhirnya,8,2);
                                            
                                    //kalau tahun sama
                                    if($tahun_sebelumnya == $tahun_sekarangnya){
                                        //kalau tahun & bulannya sama berarti count+1
                                        if($bulan_sebelumnya == $bulan_sekarangnya){
                                            $countnya = intval(substr($id_terakhirnya,11,5)) + 1;
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
                                            $id_permat_baru = "PERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                        }
                                        //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                        else{
                                            //id yang baru
                                            $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                        }
                                    }
                                    //kalau tahun tidak sama
                                    else{
                                        //id yang baru
                                        $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                    }
                                }
                                else{
                                    //id yang baru
                                    $id_permat_baru = "PERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".00001";
                                }

                                $tgl_now = date('Y-m-d');
                                
                                $data_permat = array(
                                    'id_permintaan_material'            => $id_permat_baru,
                                    'id_detail_purchase_order_customer' => $id_detpo,
                                    'id_line'                           => $idline,
                                    'jumlah_minta'                      => $jumlah_item,
                                    'tanggal_permintaan'                => $tgl_now,
                                    'tanggal_produksi'                  => $tanggal,
                                    'status_permintaan'                 => 0,
                                    'user_add'                          => $user,
                                    'waktu_add'                         => $now,
                                    'status_delete'                     => 0
                                );
                                

                                $this->M_PerencanaanProduksi->insert('permintaan_material',$data_permat);

                                //DETAIL PERMINTAAN MATERIAL
                                $konmat_tam    = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->result_array();
                                $jm_konmat_tam = $this->M_PerencanaanProduksi->get_id_produk_by_detail_po($id_detpo,$idline)->num_rows();

                                for($b=0;$b<$jm_konmat_tam;$b++){
                                    //id_detail_permintaan_material
                                    $idcode_detpermat = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".";

                                    $id_detpermat_last     = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->result_array();
                                    $id_detpermat_last_cek = $this->M_PerencanaanProduksi->get_last_detpermat_id($idcode_detpermat)->num_rows();
                        
                                    if($id_detpermat_last_cek == 1){
                                        $id_terakhirnya    = $id_detpermat_last[0]['id_detail_permintaan_material'];
                        
                                        $tahun_sebelumnya  = substr($id_terakhirnya,9,2);
                                        $bulan_sebelumnya  = substr($id_terakhirnya,11,2);
                                                
                                        //kalau tahun sama
                                        if($tahun_sebelumnya == $tahun_sekarangnya){
                                            //kalau tahun & bulannya sama berarti count+1
                                            if($bulan_sebelumnya == $bulan_sekarangnya){
                                                $countnya = intval(substr($id_terakhirnya,14,6)) + 1;
                                                $pjgnya   = strlen($countnya);
                                    
                                                if($pjgnya == 1){
                                                    $countnya_baru = "00000".$countnya;
                                                }
                                                else if($pjgnya == 2){
                                                    $countnya_baru = "0000".$countnya;
                                                }
                                                else if($pjgnya == 3){
                                                    $countnya_baru = "000".$countnya;
                                                }
                                                else if($pjgnya == 4){
                                                    $countnya_baru = "00".$countnya;
                                                }
                                                else if($pjgnya == 5){
                                                    $countnya_baru = "0".$countnya;
                                                }
                                                else{
                                                    $countnya_baru = $countnya;
                                                }
                                                
                                                //id yang baru
                                                $id_detpermat_baru = "DETPERMAT".$tahun_sebelumnya.$bulan_sebelumnya.".".$countnya_baru;
                                            }
                                            //kalau tahun sama, bulan beda berarti ganti bulan dan count mulai dari 1
                                            else{
                                                //id yang baru
                                                $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                            }
                                        }
                                        //kalau tahun tidak sama
                                        else{
                                            //id yang baru
                                            $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                        }
                                    }
                                    else{
                                        //id yang baru
                                        $id_detpermat_baru = "DETPERMAT".$tahun_sekarangnya.$bulan_sekarangnya.".000001";
                                    }

                                    $id_konsumsi_material = $konmat_tam[$b]['id_konsumsi_material'];
                                    $jumlah_konsumsi      = $konmat_tam[$b]['jumlah_konsumsi'];
                                    $needs                = $jumlah_item * $jumlah_konsumsi;

                                    
                                    $data_detpermat = array (
                                        'id_detail_permintaan_material'     => $id_detpermat_baru,
                                        'id_permintaan_material'            => $id_permat_baru,
                                        'id_konsumsi_material'              => $id_konsumsi_material,
                                        'needs'                             => $needs,
                                        'status_pengambilan'                => 0,
                                        'user_add'                          => $user,
                                        'waktu_add'                         => $now,
                                        'status_delete'                     => 0
                                    );

                                    $this->M_PerencanaanProduksi->insert('detail_permintaan_material',$data_detpermat);
                                }
                            }

                    }
                }
            }
        }
        redirect('perencanaanProduksi/semua_perencanaan_produksi');
    }


}
