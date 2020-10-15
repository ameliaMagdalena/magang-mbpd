<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrderSupplier extends CI_Controller {
	function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_PurchaseOrderSupplier');
        $this->load->model('M_Supplier');
        $this->load->model('M_Produk');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index($status){
        $data['status'] = $status;
        $data['po_sup'] = $this->M_PurchaseOrderSupplier->selectPOSupplierAktif()->result_array();
        $data['detail_po_sup'] = $this->M_PurchaseOrderSupplier->selectDetailPOSupplierAktif()->result_array();
        $data['customer'] = $this->M_Supplier->selectSupplierAktif()->result_array();
        
		$this->load->view('v_po_supplier', $data);
    }

    public function detail($id){
        $id_po = array(
            "id_purchase_order_supplier" => $id
        );
        $data['id_po'] = $id;
        $data['po_sup'] = $this->M_PurchaseOrderSupplier->selectSatuPOSupplier($id_po)->result_array();
        $data['detail_po_sup'] = $this->M_PurchaseOrderSupplier->selectSatuDetailPOSupplier($id_po)->result_array();

		$this->load->view('v_detail_po_supplier', $data);
    }

    public function baru(){
        $data['jumlah_po_sup'] = $this->M_PurchaseOrderSupplier->selectAllPOSupplier()->num_rows();
        $data['supplier'] = $this->M_PurchaseOrderSupplier->selectSupplierAktif()->result_array();
        $data['material'] = $this->M_PurchaseOrderSupplier->selectSubJenisMaterial()->result_array();
        
	    $this->load->view('v_po_supplier_baru', $data);
    }

    /* ------------------------------------------------------------------------------- */
    /* ------------------------------------------------------------------------------- */
    public function harga_material(){
        $id = $this->input->post("id_sub_jenis_material");
        $result = $this->M_PurchaseOrderSupplier->selectHargaMaterial($id)->result_array();
        echo json_encode($result);
    }

    public function satuan_ukuran(){
        $id = $this->input->post("id_sub_jenis_material");
        $result = $this->M_PurchaseOrderSupplier->selectSatuanUkuran($id)->result_array();
        echo json_encode($result);
    }

    public function get_material(){
        $id = $this->input->post("id_supplier");
        $result = $this->M_PurchaseOrderSupplier->selectMaterialSupplier($id)->result_array();
        echo json_encode($result);
    }
    /* ------------------------------------------------------------------------------- */
    /* ------------------------------------------------------------------------------- */
    
    public function insert(){
        $row = $this->input->post("row"); //jumlah row-1 / dimulai dari 0
        $id_po = $this->input->post("id_po_supplier");
        $no_po = $this->input->post("no_po_supplier");

        $jumlah_detail = $this->M_PurchaseOrderSupplier->selectAllDetailPOSupplier()->num_rows()+1;
        
        for($x=0; $x<=$row; $x++){
            $jumlah_material = $this->input->post("jumlah".$x);
            if($jumlah_material != 0){
                $id_detail = "DPOS-" . $jumlah_detail;

                $data1 = array(
                    "id_detail_purchase_order_supplier" => $id_detail,
                    "id_purchase_order_supplier" => $id_po,
                    "id_sub_jenis_material" => $this->input->post("material".$x),
                    "jumlah_material" => $jumlah_material,
                    "harga_satuan" => $this->input->post("harga_satuan".$x),
                    "harga_total" => $this->input->post("harga_total".$x),
                    "status_detail_po" => "0",
                    "user_add"=>$_SESSION['id_user'],
                    "waktu_add"=>date('Y-m-d H:i:s'),
                    "user_edit"=>"0",
                    "user_delete"=>"0"
                );
                $this->M_PurchaseOrderSupplier->insertDetailPOSupplier($data1);
                $jumlah_detail = $jumlah_detail +1;
            }
        }

        $data2 = array (
            "id_purchase_order_supplier" => $id_po,
            "kode_purchase_order_supplier" => $no_po,
            "id_supplier" => $this->input->post("supplier"),
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
        $this->M_PurchaseOrderSupplier->insertPOSupplier($data2);
        redirect('PurchaseOrderSupplier/index/0');
    }

    public function edit_po(){
        $where = array(
            'id_purchase_order_supplier' => $this->input->post("id_po_supplier")
        );

        $data = array (
            "id_purchase_order_supplier" => $this->input->post("id_po_supplier"),
            "kode_purchase_order_supplier" =>  $this->input->post("no_po_supplier"),
            "status_po" => $this->input->post("status"),
            "keterangan" => $this->input->post("keterangan"),
            "user_edit"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
        );
        $this->M_PurchaseOrderSupplier->editPOSupplier($data, $where);
        redirect('PurchaseOrderSupplier/index/3');
    }

    public function setuju_po(){
        $where = array(
            'id_purchase_order_supplier' => $this->input->post("id_po_supplier")
        );

        $data = array (
            "id_purchase_order_supplier" => $this->input->post("id_po_supplier"),
            "status_po" => $this->input->post("status"),
            "user_edit"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
        );
        $this->M_PurchaseOrderSupplier->editPOSupplier($data, $where);
        redirect('PurchaseOrderSupplier/index/3');
    }

    public function persetujuan(){
        $this->load->view('v_po_supplier_persetujuan');
   }


}