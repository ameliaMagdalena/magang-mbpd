<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanLembur extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_LaporanLembur');
        $this->load->model('M_Line');

        $this->load->library('pdf');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function semua(){
        $tanggal = date('Y-m-d');

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_ll_pic($line,$tanggal)->result();
        }
        else{
            $data['laporan_lembur'] = $this->M_LaporanLembur->select_all_aktif()->result();
        }

        $this->load->view('v_laporan_lembur_semua',$data);
    }

    public function belum_diproses(){
        $tanggal = date('Y-m-d');
        $data['tudei']                 = date('Y-m-d');
        $data['line']                  = $this->M_Line->select_all_aktif()->result();
        $status = 3;

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else{
            $data['laporan_lembur']        = $this->M_LaporanLembur->select_all_aktif_status($status)->result(); 
        }

        $this->load->view('v_laporan_lembur_belum_diproses',$data);
    }

    public function sudah_diproses(){
        $tanggal = date('Y-m-d');
        $data['tudei']                 = date('Y-m-d');
        $data['line']                  = $this->M_Line->select_all_aktif()->result();
        $status = 4;

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else{
            $data['laporan_lembur']        = $this->M_LaporanLembur->select_all_aktif_status($status)->result(); 
        }

        $this->load->view('v_laporan_lembur_sudah_diproses',$data);
    }

    public function selesai(){
        $tanggal = date('Y-m-d');
        $data['tudei']                 = date('Y-m-d');
        $data['line']                  = $this->M_Line->select_all_aktif()->result();
        $status = 5;

        if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting"){
            $line = "Line Cutting";
            $jabatan = "Staff Line Cutting";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding"){
            $line = "Line Bonding";
            $jabatan = "Staff Line Bonding";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"){
            $line = "Line Sewing";
            $jabatan = "Staff Line Sewing";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){
            $line = "Line Assy";
            $jabatan = "Staff Line Assy";

            $data['laporan_lembur']        = $this->M_LaporanLembur->select_spl_pic_status($line,$status,$tanggal)->result();
        }
        else{
            $data['laporan_lembur']        = $this->M_LaporanLembur->select_all_aktif_status($status)->result(); 
        }

        $this->load->view('v_laporan_lembur_selesai',$data);
    }

    
    public function detail_spl_dspl(){
        //id spl
        $id_spl = $this->input->post('id');

        $data['spl']     = $this->M_LaporanLembur->get_spl($id_spl)->result_array();
        $data['dspl']    = $this->M_LaporanLembur->get_dspl($id_spl)->result_array();
        $data['jm_dspl'] = $this->M_LaporanLembur->get_dspl($id_spl)->num_rows();

        echo json_encode($data);
    }

    public function proses_pic(){
        $jumlah_karyawan    = $this->input->post('jumlah_karyawan');
        $id_spl             = $this->input->post('ak_id_spl');
        $keterangan_laporan = $this->input->post('keterangan_laporan');

        $user               = $_SESSION['id_user'];
        $now                = date('Y-m-d H:i:s');

        for($i=0;$i<$jumlah_karyawan;$i++){
            $id_dspl = $this->input->post('id_dspl'.$i);

            $jam = $this->input->post('ak_jam'.$i);
            $in  = $this->input->post('ak_in'.$i);
            $ket = $this->input->post('ak_ket'.$i);

            $outnya = strtotime($in) + 60*60*$jam;
            $out = date('H:i', $outnya);

            //echo $id_dspl."  ".$jam."  ".$in."  ".$out."  ".$ket;
            if($jam != 0){
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => $in,
                    'waktu_out_aktual' => $out,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            else{
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => 0,
                    'waktu_out_aktual' => 0,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            
        }
        
        $data_spl = array (
            'keterangan_laporan' => $keterangan_laporan,
            'status_spl'         => 4,
            'user_edit'          => $user,
            'waktu_edit'         => $now
        );

        $where_spl = array (
            'id_surat_perintah_lembur' => $id_spl
        );

        $this->M_LaporanLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);
        redirect('laporanLembur/sudah_diproses');
    }

    public function edit_pic(){
        $jumlah_karyawan    = $this->input->post('edit_jumlah_karyawan');
        $id_spl             = $this->input->post('edit_id_spl');
        $keterangan_laporan = $this->input->post('edit_keterangan_laporan');

        $user               = $_SESSION['id_user'];
        $now                = date('Y-m-d H:i:s');

        for($i=0;$i<$jumlah_karyawan;$i++){
            $id_dspl = $this->input->post('edit_id_dspl'.$i);

            $jam = $this->input->post('edit_ak_jam'.$i);
            $in  = $this->input->post('edit_ak_in'.$i);
            $ket = $this->input->post('edit_ak_ket'.$i);

            $outnya = strtotime($in) + 60*60*$jam;
            $out = date('H:i', $outnya);

            //echo $id_dspl."  ".$jam."  ".$in."  ".$out."  ".$ket;
            if($jam != 0){
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => $in,
                    'waktu_out_aktual' => $out,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            else{
                $data_dspl = array (
                    'aktual_lembur'    => $jam,
                    'waktu_in_aktual'  => 0,
                    'waktu_out_aktual' => 0,
                    'keterangan_aktual'=> $ket,
                    'user_edit'        => $user,
                    'waktu_edit'       => $now
                );
    
                $where_dspl = array (
                    'id_detail_surat_perintah_lembur' => $id_dspl
                );
    
                $this->M_LaporanLembur->edit('detail_surat_perintah_lembur',$data_dspl,$where_dspl);
            }
            
        }

        $data_spl = array (
            'keterangan_laporan' => $keterangan_laporan,
            'user_edit'          => $user,
            'waktu_edit'         => $now
        );

        $where_spl = array (
            'id_surat_perintah_lembur' => $id_spl
        );

        $this->M_LaporanLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);

        redirect('laporanLembur/sudah_diproses');
    }

    public function ppic_setuju(){
        $id_spl = $this->input->post('id_spl');

        $data_spl = array (
            'status_spl' => 5,
            'user_edit'  => $_SESSION['id_user'],
            'waktu_edit' => date('Y-m-d H:i:s')
        );

        $where_spl = array (
            'id_surat_perintah_lembur' => $id_spl
        );

        $this->M_LaporanLembur->edit('surat_perintah_lembur',$data_spl,$where_spl);

        redirect('laporanLembur/selesai');
    }

    public function print(){
        $id      = $this->input->post('id');
        $spl     = $this->M_LaporanLembur->get_spl($id)->result_array();
        $dspl    = $this->M_LaporanLembur->get_dspl($id)->result_array();
        $jm_dspl = $this->M_LaporanLembur->get_dspl($id)->num_rows();

        if($spl[0]['status_spl'] > 2){
            $pdf = new FPDF('p','mm','A4');
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
            $pdf->Cell(190,7,'LAPORAN LEMBUR '.$spl[0]['nama_line'],0,1,'L');
            
            //$pdf->Cell(15);
            $pdf->SetFont('Arial','B','11');
            $pdf->Cell(10,2,' ',0,1,'C');
            $pdf->Cell(190,5,'Hari & Tanggal: ' .$spl[0]['tanggal'],0,1,'R');
            $pdf->Cell(190,5,'Waktu: ' .$spl[0]['waktu_lembur'],0,1,'R');



            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,5,' ',0,1,'C');
            $pdf->Cell(10,12,'NO',1,0,'C');
            $pdf->Cell(50,12,'NAMA KARYAWAN',1,0,'C');
            $pdf->Cell(40,12,'WAKTU LEMBUR',1,0,'C');
            $pdf->Cell(30,6,'JAM LEMBUR',1,0,'C');
            $pdf->Cell(20,12,'TTD',1,0,'C');
            $pdf->Cell(40,12,'KET',1,0,'C');
            $pdf->Cell(0,6,'',0,1);

            $pdf->Cell(100,0,'',0,0);
            $pdf->Cell(15,6,'IN',1,0,'C');
            $pdf->Cell(15,6,'OUT',1,1,'C');

                
            $pdf->SetFont('Arial','',10);

            for($i=0;$i<$jm_dspl;$i++){
                $pdf->Cell(10,6,$i+1,1,0,'C');
                $pdf->Cell(50,6,$dspl[$i]['nama_karyawan'],1,0,'C');
                $pdf->Cell(40,6,$dspl[$i]['aktual_lembur'],1,0,'C');
                $pdf->Cell(15,6,$dspl[$i]['waktu_in_aktual'],1,0,'C');
                $pdf->Cell(15,6,$dspl[$i]['waktu_out_aktual'],1,0,'C');
                $pdf->Cell(20,6,'',1,0,'C');
                $pdf->Cell(40,6,$dspl[$i]['keterangan_aktual'],1,1,'C');
            }
            
            

            //keterangan
            $pdf->Cell(2,7,'',0,1);
            $pdf->Cell(2,7,'Keterangan:',0,1);
            $pdf->Cell(190,12,$spl[0]['keterangan_perintah'],1,0,'L');

            //tanda tangan

            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(10,20,'',0,1);
            $pdf->Cell(100);
            $pdf->Cell(30,6,'Diajukan',1,0,'C');
            $pdf->Cell(30,6,'Disetujui',1,0,'C');
            $pdf->Cell(30,6,'Mengetahui',1,0,'C');


            $pdf->Cell(0,6,'',0,1);
            $pdf->Cell(100);
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
        else{
            echo "Mohon maaf fungsi ini tidak tersedia";
        }
        
    }

}
