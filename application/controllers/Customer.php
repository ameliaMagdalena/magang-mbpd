<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_Customer');
        $this->load->model('M_Dashboard');

        if($this->session->userdata('status_login') != "login"){
            redirect('akses');
        }
    }

	public function index(){
        $data['customer'] = $this->M_Customer->selectCustomerAktif()->result_array();
        $data['jumlah_cust'] = $this->M_Customer->selectAllCustomer()->num_rows();
        
        //$data['sub_customer'] = $this->M_Customer->selectSubCustomerAktif()->result_array(); //result
        //$data['sub_join'] = $this->M_Customer->selectSubCustomerAktif()->num_rows(); //total sub custnya
        //$data['jumlah_sub_cust'] = $this->M_Customer->selectAllSubCustomer()->num_rows(); //total semua sub cust
        
        //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi

		$this->load->view('v_customer', $data);
    }

    public function tambah_customer(){
        $data = array(
            "id_customer"=>$this->input->post("id_customer"),
            "nama_customer"=>$this->input->post("nama_customer"),
            "no_telp_customer"=>$this->input->post("no_telp_customer"),
            "email_customer"=>$this->input->post("email_customer"),
            "alamat_customer"=>$this->input->post("alamat_customer"),
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_Customer->insertCustomer($data);
        redirect('Customer');
    }

    public function detail_customer($id){
        $id_cust = array(
            "id_customer" => $id
        );
        $data['customer'] = $this->M_Customer->selectSatuCustomer($id_cust)->result_array();
        $data['sub_customer'] = $this->M_Customer->selectSubCustomerAktif($id_cust)->result_array(); //result
        $data['jumlah_sub_cust'] = $this->M_Customer->selectAllSubCustomer()->num_rows(); //total semua sub cust

        //notif permintaan material produksi
            $data['jm_permat']   = $this->M_Dashboard->get_jm_permat()->result_array();
            $data['jm_permat_0'] = $this->M_Dashboard->get_jm_permat_0()->result_array();
            $data['jm_permat_1'] = $this->M_Dashboard->get_jm_permat_1()->result_array();
            $data['jm_permat_2'] = $this->M_Dashboard->get_jm_permat_2()->result_array();
            $data['jm_permat_3'] = $this->M_Dashboard->get_jm_permat_3()->result_array();
            $data['jm_permat_4'] = $this->M_Dashboard->get_jm_permat_4()->result_array();
            $data['jm_permat_5'] = $this->M_Dashboard->get_jm_permat_5()->result_array();
        //tutup notif permintaan material produksi

		$this->load->view('v_detail_customer', $data);
    }

    public function edit_customer(){
        $where = array(
            "id_customer" => $this->input->post("id_customer"),
        );
        $data = array(
            "nama_customer"=>$this->input->post("nama_customer"),
            "no_telp_customer"=>$this->input->post("no_telp_customer"),
            "email_customer"=>$this->input->post("email_customer"),
            "alamat_customer"=>$this->input->post("alamat_customer"),
            "waktu_edit"=>date('Y-m-d H:i:s'),
            "user_edit"=>$_SESSION['id_user']
        );
        $this->M_Customer->editCustomer($data, $where);
        redirect('Customer');
    }

    public function hapus_customer(){
        $where = array(
            "id_customer" => $this->input->post("id_customer"),
        );
        $data = array(
            "status_delete"=>"1",
            "user_delete"=>$_SESSION['id_user'],
            "waktu_delete"=>date('Y-m-d H:i:s')
        );
        $this->M_Customer->hapusCustomer($data, $where);
        $this->M_Customer->hapusSubCustomer($data, $where);
        redirect('Customer');
    }

    
    //******************************* DETAIL CUSTOMER **************************** */
    //***************************************************************************** */

    public function tambah_sub_customer(){
        $id=$this->input->post("id_customer");
        $data = array(
            "id_sub_customer"=>$this->input->post("id_sub_customer"),
            "nama_sub_customer"=>$this->input->post("nama_sub_customer"),
            "nama_pic"=>$this->input->post("nama_pic"),
            "no_telp_pic"=>$this->input->post("no_telp_pic"),
            "id_customer"=>$id,
            "user_add"=>$_SESSION['id_user'],
            "waktu_add"=>date('Y-m-d H:i:s'),
            "user_edit"=>"0",
            "user_delete"=>"0"
        );
        $this->M_Customer->insertSubCustomer($data);
        redirect('Customer/detail_customer/'.$id);
    }

    public function edit_sub_customer(){
        $id=$this->input->post("id_customer");
        $where = array(
            "id_sub_customer" => $this->input->post("id_sub_customer"),
        );
        $data = array(
            "id_customer"=>$this->input->post("id_customer"),
            "nama_sub_customer"=>$this->input->post("nama_sub_customer"),
            "nama_pic"=>$this->input->post("nama_pic"),
            "no_telp_pic"=>$this->input->post("no_telp_pic"),
            "waktu_edit"=>date('Y-m-d H:i:s'),
            "user_edit"=>$_SESSION['id_user']
        );
        $this->M_Customer->editSubCustomer($data, $where);
        redirect('Customer/detail_customer/'.$id);
    }

    public function hapus_sub_customer(){
        $id=$this->input->post("id_customer");
        $where = array(
            "id_sub_customer" => $this->input->post("id_sub_customer"),
        );
        $data = array(
            "status_delete"=>"1",
            "user_delete"=>$_SESSION['id_user'],
            "waktu_delete"=>date('Y-m-d H:i:s')
        );
        $this->M_Customer->hapusSubCustomer($data, $where);
        redirect('Customer/detail_customer/'.$id);
    }

    
}
