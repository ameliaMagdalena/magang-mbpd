<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengambilanMaterial extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PengambilanMaterial');
        $this->load->model('M_PengeluaranMaterial');
        $this->load->model('M_Dashboard');
    }
    
    public function jadwal(){
        $this->load->view('v_jadwal_pengambilan_material');
    }
    
    public function diambil(){
        $where = array(
            'id_pengambilan_material' => $this->input->post("id_pengambilan")
        );
        $data = array (
            "id_pengambilan_material" => $this->input->post("id_pengambilan"),
            "status_keluar" => $this->input->post("status"),
            "user_edit"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
        );
        $this->M_PengambilanMaterial->editPengambilanMaterial($data, $where);

        $idpengeluaran = $this->M_PengeluaranMaterial->selectAllPengeluaranMaterial()->num_rows();
        $data2 = array (
            "id_pengeluaran_material" => "KELUAR-".$idpengeluaran,
            "id_sub_jenis_material"=>$this->input->post("amaterial"),
            "tanggal_keluar"=>$this->input->post("atgl_ambil"),
            "jumlah_keluar"=>$this->input->post("ajumlah"),
            "keterangan_keluar"=>"0", //0=produksi
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_PengeluaranMaterial->insert($data2);
        
        $permintaan = $this->input->post('id_permintaan');
        redirect('PermintaanMaterial/proses_perencanaan/' . $permintaan);
    }
    
}