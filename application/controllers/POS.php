<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class POS extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_POS');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['po'] = $this->M_POS->select_all_po()->result();
        $data['detpo'] = $this->M_POS->select_all_detpo()->result();
		$this->load->view('v_POS',$data);
    }


    public function tambah_PO(){
        $tanggal_penerimaan  = $this->input->post('tanggal_penerimaan');
        $id_customer  = $this->input->post('id_customer');
        $now = date('Y-m-d H:i:s');

        $jumlah_po   = $this->M_POS->select_all_po()->num_rows();
        $id_number      = $jumlah_po + 1;

        $id_PO      = "PO-".$id_number;


        for($i=1;$i<=5;$i++){
            $produk           = $this->input->post('produk'.$i);
            $jumlah_produk   = $this->input->post('jumlah_produk'.$i);

            if($produk != null && $jumlah_produk != null){
                $jumlah_detpo   = $this->M_POS->select_all_detpo()->num_rows();
                $id_number      = $jumlah_detpo + 1;

                $id_detpo      = "DETPO-".$id_number;

                $data_detpo = array (
                    'id_detail_PO'      => $id_detpo,
                    'id_PO'             => $id_PO,
                    'id_detail_produk'         => $produk,
                    'jumlah_produk'     => $jumlah_produk,
                );

                $this->M_POS->insert('dpos',$data_detpo);
            }
        }


        $data_po = array (
            'id_PO'      => $id_PO,
            'tanggal_PO' => $now,
            'tanggal_penerimaan' => $tanggal_penerimaan,
            'status_PO'  => 0,
            'id_customer'=> $id_customer
        );

        $this->M_POS->insert('pos',$data_po);
      
        Redirect('POS');
    }
}
