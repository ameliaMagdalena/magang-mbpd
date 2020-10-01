<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrderCustomer extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PurchaseOrderCustomer');
        $this->load->model('M_Customer');
        $this->load->model('M_Produk');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index($status){
        $data['status'] = $status;
        $data['po_cust'] = $this->M_PurchaseOrderCustomer->selectPOCustomerAktif()->result_array();
        $data['detail_po_cust'] = $this->M_PurchaseOrderCustomer->selectDetailPOCustomerAktif()->result_array();

		$this->load->view('v_po_customer', $data);
    }

    public function detail($id){
        $id_po = array(
            "id_purchase_order_customer" => $id
        );
        $data['id_po'] = $id;
        $data['po_cust'] = $this->M_PurchaseOrderCustomer->selectSatuPOCustomer($id_po)->result_array();
        $data['detail_po_cust'] = $this->M_PurchaseOrderCustomer->selectSatuDetailPOCustomer($id_po)->result_array();

		$this->load->view('v_detail_po_customer', $data);
    }

    public function baru(){
        $data['jumlah_po_customer'] = $this->M_PurchaseOrderCustomer->selectAllPOCustomer()->num_rows();
        $data['customer'] = $this->M_Customer->selectCustomerAktif()->result_array();
        $data['produk'] = $this->M_Produk->select_all_aktif()->result_array();
        
		$this->load->view('v_po_customer_baru', $data);
    }

    public function harga_produk(){
        $id = $this->input->post("id_produk");
        $result = $this->M_PurchaseOrderCustomer->selectHargaProduk($id)->result_array();
        echo json_encode($result);
    }

    public function insert(){
        $row = $this->input->post("row"); //jumlah row-1 / dimulai dari 0
        $id_po = $this->input->post("id_po_customer");
        $no_po = $this->input->post("no_po_customer");

        $jumlah_detail = $this->M_PurchaseOrderCustomer->selectAllDetailPOCustomer()->num_rows()+1;
        
        for($x=0; $x<=$row; $x++){
            $jumlah_produk = $this->input->post("jumlah".$x);
            if($jumlah_produk != 0){
                $id_detail = "DPOC-" . $jumlah_detail;

                $data1 = array(
                    "id_detail_purchase_order_customer" => $id_detail,
                    "id_purchase_order_customer" => $id_po,
                    "id_produk" => $this->input->post("produk".$x),
                    "jumlah_produk" => $jumlah_produk,
                    "harga_satuan" => $this->input->post("harga_satuan".$x),
                    //"total_harga" => $this->input->post("harga_total".$x),
                    "tanggal_penerimaan" => $this->input->post("tgl_terima".$x),
                    "user_add"=>$_SESSION['id_user'],
                    "waktu_add"=>date('Y-m-d H:i:s'),
                    "user_edit"=>"0",
                    "user_delete"=>"0"
                );
                $this->M_PurchaseOrderCustomer->insertDetailPOCustomer($data1);
                $jumlah_detail = $jumlah_detail +1;
            }
        }

        $data2 = array (
            "id_purchase_order_customer" => $id_po,
            "kode_purchase_order_customer" => $no_po,
            "kode_so" => $this->input->post("no_so_customer"),
            "id_customer" => $this->input->post("customer"),
            "tanggal_po" => $this->input->post("tgl_po"),
            "harga_sebelum_pajak" => $this->input->post("total_sebelum_pajaknya"),
            "ppn" => $this->input->post("ppnnya"),
            "total_harga_akhir" => $this->input->post("total_harganya"),
            "status_po" => "0", //otomatis aktif
            "keterangan" => $this->input->post("keterangan"),
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_PurchaseOrderCustomer->insertPOCustomer($data2);
        redirect('PurchaseOrderCustomer/index/0');
    }


}