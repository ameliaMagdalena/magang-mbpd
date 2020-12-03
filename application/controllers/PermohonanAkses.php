<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermohonanAkses extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PermohonanAkses');
        $this->load->model('M_User');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

    public function insert(){
        $id_data         = $this->input->post('id_peraks');
        $nama_permohonan = $this->input->post('nama_permohonan_peraks');
        $keterangan      = $this->input->post('ket_peraks');

        $data['now'] = date('Y-m-d');
        $year_now  = substr(date('Y'),2,2);

        $data_last    = $this->M_PermohonanAkses->get_last_id()->result_array();
        $jm_data_last = $this->M_PermohonanAkses->get_last_id()->num_rows();
        
        if($jm_data_last == 1){
          $id_terakhir   = $data_last[0]['id_permohonan_akses'];
    
          $tahun_sebelum = substr($id_terakhir,6,2);
    
          if($tahun_sebelum == $year_now){
            $count = intval(substr($id_terakhir,9,5)) + 1;
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
    
            $id_baru = "PERAKS".$tahun_sebelum.".".$count_baru;
          }
          else{
            $id_baru = "PERAKS".$year_now.".00001";
          }
        }
        else{
          $id_baru = "PERAKS".$year_now.".00001";
        }
        
        $data = array (
            'id_permohonan_akses'  => $id_baru,
            'id_data'              => $id_data,
            'id_user'              => $_SESSION['id_user'],
            'tanggal'              => date('Y-m-d'),
            'nama_permohonan_akses'=> $nama_permohonan,
            'keterangan'           => $keterangan,
            'status_permohonan'    => 0,
            'user_add'             => $_SESSION['id_user'],
            'waktu_add'            => date('Y-m-d H:i:s'),
            'status_delete'        => 0
        );

        $this->M_PermohonanAkses->insert('permohonan_akses',$data);

        redirect('permohonanAkses/semua');
    }

    public function terima(){
        $id = $this->input->post('id_peraks');

        $data = array (
            'status_permohonan' => 1,
            'user_edit'         => $_SESSION['id_user'],
            'waktu_edit'        => date('Y-m-d H:i:s')
        );

        $where = array (
            'id_permohonan_akses' => $id
        );

        $this->M_PermohonanAkses->edit('permohonan_akses',$data,$where);

        redirect('permohonanAkses/disetujui');
    }

    public function tolak(){
        $id = $this->input->post('id_peraks');

        $data = array (
            'status_permohonan' => 2,
            'user_edit'         => $_SESSION['id_user'],
            'waktu_edit'        => date('Y-m-d H:i:s')
        );

        $where = array (
            'id_permohonan_akses' => $id
        );

        $this->M_PermohonanAkses->edit('permohonan_akses',$data,$where);

        redirect('permohonanAkses/tidak_disetujui');
    }

    public function delete(){
      $id = $this->input->post('id_peraks_batal');

      $data = array (
          'status_delete' => 1,
          'user_edit'     => $_SESSION['id_user'],
          'waktu_edit'    => date('Y-m-d H:i:s')
      );

      $where = array (
          'id_permohonan_akses' => $id
      );

      $this->M_PermohonanAkses->edit('permohonan_akses',$data,$where);

      redirect('permohonanAkses/semua');
  }
    
    public function detail_permohonan(){
      $id = $this->input->post('id');

      $data['peraks'] = $this->M_PermohonanAkses->get_one($id)->result_array();
      $data['user']   = $this->M_User->select_all_aktif()->result_array();
      $data['jm_user']= $this->M_User->select_all_aktif()->num_rows();

      echo json_encode($data);
    }

    public function semua(){
        if($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" || 
          $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management"){
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif()->result();
        } else{
          $id_user = $_SESSION['id_user'];
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif_by_user($id_user)->result();
        }
    
        $this->load->view('v_permohonan_akses_semua',$data);
    }
  
      public function belum_disetujui(){
        if($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" || 
          $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management"){
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif()->result();
        } else{
          $id_user = $_SESSION['id_user'];
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif_by_user($id_user)->result();
        }

        $this->load->view('v_permohonan_akses_belum_disetujui',$data);
      }
  
      public function disetujui(){
        if($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" || 
          $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management"){
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif()->result();
        } else{
          $id_user = $_SESSION['id_user'];
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif_by_user($id_user)->result();
        }

        $this->load->view('v_permohonan_akses_disetujui',$data);
      }
  
      public function tidak_disetujui(){
        if($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" || 
          $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management"){
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif()->result();
        } else{
          $id_user = $_SESSION['id_user'];
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif_by_user($id_user)->result();
        }

        $this->load->view('v_permohonan_akses_tidak_disetujui',$data);
      }
  
      public function selesai(){
        if($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" || 
          $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management"){
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif()->result();
        } else{
          $id_user = $_SESSION['id_user'];
          $data['peraks'] = $this->M_PermohonanAkses->select_all_aktif_by_user($id_user)->result();
        }

        $this->load->view('v_permohonan_akses_selesai',$data);
      }
  


 
}
