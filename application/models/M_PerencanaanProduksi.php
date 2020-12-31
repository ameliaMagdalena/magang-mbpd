<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PerencanaanProduksi extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    //PO
        function select_all_detpoxproduk(){
            return $this->db->query("SELECT * FROM purchase_order_customer,detail_purchase_order_customer,detail_produk,produk,customer 
            WHERE purchase_order_customer.id_purchase_order_customer = detail_purchase_order_customer.id_purchase_order_customer AND
            detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND detail_purchase_order_customer.status_delete=0 AND
            detail_produk.id_produk = produk.id_produk AND purchase_order_customer.id_customer = customer.id_customer
            AND (purchase_order_customer.status_po BETWEEN 0 AND 1) ORDER BY purchase_order_customer.id_purchase_order_customer,produk.nama_produk");
        }

        function jm_perc_sebelum(){
            return $this->db->query("SELECT SUM(detail_produksi_line.jumlah_item_perencanaan) AS jumlah_sebelum,produksi_line.id_line,
            detail_produksi_line.id_detail_purchase_order,line.nama_line
            FROM detail_produksi_line,produksi_line,line WHERE 
            detail_produksi_line.status_perencanaan = '0' AND
            produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND produksi_line.id_line = line.id_line 
            AND detail_produksi_line.status_delete='0'
            GROUP BY detail_produksi_line.id_detail_purchase_order, produksi_line.id_line");
        }

    //

    function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function edit($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    function cek_perencanaan($start){
        return $this->db->query("SELECT tanggal FROM produksi WHERE tanggal='$start' AND status_delete='0'");
    }

    function get_last_produksi_id($id_code){
        return $this->db->query("SELECT id_produksi FROM produksi WHERE id_produksi LIKE '$id_code%' ORDER BY id_produksi DESC LIMIT 1");
    }

    function get_last_produksi_line_id($id_code){
        return $this->db->query("SELECT id_produksi_line FROM produksi_line WHERE id_produksi_line LIKE '$id_code%' ORDER BY id_produksi_line DESC LIMIT 1");
    }

    function cari_id_prodline($idline,$tanggal){
        return $this->db->query("SELECT produksi_line.id_produksi_line FROM produksi,produksi_line WHERE
        produksi.tanggal ='$tanggal' AND produksi_line.id_line='$idline' AND 
        produksi.id_produksi=produksi_line.id_produksi AND produksi.status_delete='0' ");
    }

    function get_last_detprodline_id($id_code){
        return $this->db->query("SELECT id_detail_produksi_line FROM detail_produksi_line WHERE id_detail_produksi_line LIKE '$id_code%'
        ORDER BY id_detail_produksi_line DESC LIMIT 1");
    }

    function get_last_permat_id($id_code){
        return $this->db->query("SELECT id_permintaan_material FROM permintaan_material WHERE id_permintaan_material LIKE '$id_code%'
        ORDER BY id_permintaan_material DESC LIMIT 1");
    }

    function get_last_detpermat_id($id_code){
        return $this->db->query("SELECT id_detail_permintaan_material FROM detail_permintaan_material WHERE id_detail_permintaan_material LIKE '$id_code%'
        ORDER BY id_detail_permintaan_material DESC LIMIT 1");
    }

    function select_all_monday(){
        return $this->db->query("SELECT tanggal AS tanggal_mulai, tanggal AS start, 
        (tanggal + INTERVAL 6 DAY) AS tanggal_selesai, (tanggal + INTERVAL 6 DAY) AS end,
        id_produksi
        FROM produksi 
        WHERE weekday(tanggal) = 0 AND status_delete='0' ORDER BY tanggal DESC");

        /*
        return $this->db->query("SELECT DATE_FORMAT(tanggal, '%W, %e %M %Y') AS tanggal_mulai, tanggal AS start, 
        DATE_FORMAT(tanggal + INTERVAL 6 DAY, '%W, %e %M %Y') AS tanggal_selesai, (tanggal + INTERVAL 6 DAY) AS end,
        id_produksi
        FROM produksi 
        WHERE weekday(tanggal) = 0 AND status_delete='0' ORDER BY tanggal ASC");
        */
    }

    function get_p($awal){
        return $this->db->query("SELECT * FROM produksi WHERE produksi.status_delete=0 
        AND (produksi.tanggal BETWEEN '$awal' AND ('$awal' + INTERVAL 6 DAY))");
    }

    function get_pl($awal){
        return $this->db->query("SELECT * FROM produksi,produksi_line WHERE produksi_line.status_delete=0 
        AND (produksi.tanggal BETWEEN '$awal' AND ('$awal' + INTERVAL 6 DAY))
        AND produksi.id_produksi = produksi_line.id_produksi");
    }

    function get_tanggal_produksi($id_produksi){
        return $this->db->query("SELECT tanggal AS tanggal_awal, (tanggal + INTERVAL 6 DAY) AS tanggal_akhir
        FROM produksi WHERE id_produksi='$id_produksi'");
    }

    function get_semua_tanggal($awal){
        return $this->db->query("SELECT tanggal FROM produksi
        WHERE (produksi.tanggal BETWEEN '$awal' AND ('$awal' + INTERVAL 6 DAY)) AND status_delete='0'");
    }

    function get_dpo_normal($start){
        return $this->db->query("SELECT detail_produksi_line.id_detail_purchase_order, produk.nama_produk, detail_purchase_order_customer.jumlah_produk, 
        produk.id_produk, detail_produksi_line.id_detail_purchase_order, detail_produk.keterangan, detail_produk.id_warna, 
        detail_produk.id_ukuran_produk,purchase_order_customer.kode_purchase_order_customer
        FROM produksi,produksi_line,detail_produksi_line, detail_purchase_order_customer,detail_produk,produk,purchase_order_customer
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND detail_produksi_line.status_perencanaan='0' AND 
        produksi.id_produksi = produksi_line.id_produksi AND 
        produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND 
        detail_produksi_line.id_detail_purchase_order = detail_purchase_order_customer.id_detail_purchase_order_customer 
        AND detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND
        detail_produk.id_produk = produk.id_produk AND detail_produksi_line.status_delete='0' 
        AND purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer
        GROUP BY detail_produksi_line.id_detail_purchase_order ORDER BY produk.nama_produk ");
    }

    function get_dpo_re($start){
        return $this->db->query("SELECT detail_produksi_line.id_detail_purchase_order, produk.nama_produk, 
        produksi_tertunda.jumlah_tertunda, produk.id_produk, detail_produksi_line.id_detail_purchase_order, 
        detail_produk.keterangan, detail_produk.id_warna, detail_produk.id_ukuran_produk, line.nama_line,
        produksi_tertunda.id_produksi_tertunda,purchase_order_customer.kode_purchase_order_customer
        FROM produksi,produksi_line,detail_produksi_line,detail_produksi_tertunda,produksi_tertunda,
        detail_purchase_order_customer,detail_produk,produk,line,purchase_order_customer
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND  detail_produksi_line.status_delete='0' AND
        produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line AND
        detail_produksi_line.id_detail_produksi_line=detail_produksi_tertunda.id_detail_produksi_line AND 
        detail_produksi_tertunda.id_produksi_tertunda=produksi_tertunda.id_produksi_tertunda AND 
        detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer 
        AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk
        AND produksi_line.id_line=line.id_line AND purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer
        GROUP BY produksi_tertunda.id_produksi_tertunda");
    }

    function get_dpl($start){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line WHERE
        (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND 
        produksi.id_produksi = produksi_line.id_produksi AND 
        produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND detail_produksi_line.status_delete='0'");
    }

    function get_dpl_normal($start){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line WHERE
        (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND 
        produksi.id_produksi = produksi_line.id_produksi AND 
        produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND detail_produksi_line.status_perencanaan='0'
        AND detail_produksi_line.status_delete='0'");
    }
    
    function get_dpl_re($start){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line,detail_produksi_tertunda,produksi_tertunda 
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND detail_produksi_line.status_delete='0' AND
        produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line AND
        detail_produksi_line.id_detail_produksi_line=detail_produksi_tertunda.id_detail_produksi_line 
        AND detail_produksi_tertunda.id_produksi_tertunda=produksi_tertunda.id_produksi_tertunda");
    }

    function get_dpl_terisi_group($start){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line WHERE
        (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND detail_produksi_line.jumlah_item_perencanaan != 0
        AND detail_produksi_line.status_perencanaan='0' AND produksi.id_produksi = produksi_line.id_produksi AND 
        produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND detail_produksi_line.status_delete='0'
        GROUP BY detail_produksi_line.id_detail_purchase_order");
    }

    function get_dpl_terisi($start){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line,detail_purchase_order_customer,detail_produk,produk
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND 
        detail_produksi_line.status_perencanaan='0' AND  produksi.id_produksi = produksi_line.id_produksi AND produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND 
        detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk
        AND detail_produksi_line.status_delete='0' ");
    }

    function get_dpl_terisi_total($start){
        return $this->db->query("SELECT detail_produksi_line.id_detail_purchase_order,produksi_line.id_line,SUM(detail_produksi_line.jumlah_item_perencanaan) AS jumlah_edit
        FROM produksi,produksi_line,detail_produksi_line,detail_purchase_order_customer,detail_produk,produk
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND 
        detail_produksi_line.status_perencanaan='0' AND produksi.id_produksi = produksi_line.id_produksi AND produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND 
        detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk
        AND detail_produksi_line.status_delete='0'  AND produksi.status_delete='0'
        GROUP BY detail_produksi_line.id_detail_purchase_order,produksi_line.id_line ");
    }

    function get_dpl_terisi_reschedule($start){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND 
        detail_produksi_line.status_perencanaan='1' AND  produksi.id_produksi = produksi_line.id_produksi 
        AND produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.status_delete='0' AND produksi.status_delete='0' ");
    }

    /*
        function get_dpl_terisi_reschedule($start){
        return $this->db->query("SELECT * FROM produksi,produksi_line,detail_produksi_line,detail_produksi_tertunda
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND 
        detail_produksi_line.status_perencanaan='1' AND  produksi.id_produksi = produksi_line.id_produksi 
        AND produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_produksi_line = detail_produksi_tertunda.id_detail_produksi_line
        AND detail_produksi_line.status_delete='0' AND produksi.status_delete='0' ");
        }
    */

    function get_dpl_terisi_reschedule_group($start){
        return $this->db->query("SELECT produksi.tanggal,produksi_line.id_produksi_line,detail_produksi_line.id_detail_produksi_line,
        SUM(detail_produksi_line.jumlah_item_perencanaan) AS jumlah_item_perencanaan,SUM(detail_produksi_line.jumlah_item_aktual) AS jumlah_item_aktual, detail_produksi_tertunda.id_produksi_tertunda, produksi_line.id_line 
        FROM produksi,produksi_line,detail_produksi_line,detail_produksi_tertunda,detail_purchase_order_customer,detail_produk,produk
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND 
        detail_produksi_line.status_perencanaan='1' AND  produksi.id_produksi = produksi_line.id_produksi AND produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line 
        AND detail_produksi_line.id_detail_produksi_line = detail_produksi_tertunda.id_detail_produksi_line
        AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND 
        detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk
        AND detail_produksi_line.status_delete='0' AND produksi.status_delete='0'
        GROUP BY detail_produksi_tertunda.id_produksi_tertunda");
    }

    function get_detail_produksi_tertunda(){
        return $this->db->query("SELECT * FROM detail_produksi_tertunda WHERE status_delete='0' ");
    }


    function get_ct($id_produk){
        return $this->db->query("SELECT * FROM produk,cycle_time,line WHERE produk.id_produk ='$id_produk' AND produk.id_produk = cycle_time.id_produk
        AND line.id_line = cycle_time.id_line ");
    }

    function cari_ket_hari($harinya){
        return $this->db->query("SELECT isi_tetapan FROM tetapan WHERE nama_tetapan = '$harinya' AND status_delete='0' ");
    }

    function get_semua_idprod($awal){
        return $this->db->query("SELECT id_produksi,tanggal FROM produksi
        WHERE (produksi.tanggal BETWEEN '$awal' AND ('$awal' + INTERVAL 6 DAY)) AND status_delete='0'");
    }

    function get_semua_prodline($id_awal,$id_akhir){
        return $this->db->query("SELECT produksi.tanggal,produksi_line.id_produksi_line,produksi_line.id_line 
        FROM produksi,produksi_line
        WHERE (produksi_line.id_produksi BETWEEN '$id_awal' AND '$id_akhir') AND produksi.id_produksi=produksi_line.id_produksi AND
        produksi_line.status_delete='0'");
    }

    function get_semua_detprodline($id_awal,$id_akhir){
        return $this->db->query("SELECT detail_produksi_line.id_detail_produksi_line, produksi_line.id_line, produksi.tanggal,
        detail_produksi_line.status_perencanaan,detail_produksi_line.jumlah_item_perencanaan, detail_produksi_line.id_detail_purchase_order
        FROM detail_produksi_line,produksi_line,produksi
        WHERE (detail_produksi_line.id_produksi_line BETWEEN '$id_awal' AND '$id_akhir') AND detail_produksi_line.status_delete='0' AND
        produksi.id_produksi = produksi_line.id_produksi AND produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line");
    }
    
    function cekcek($start,$id_dpo,$nm_line){
        return $this->db->query("SELECT SUM(detail_produksi_line.jumlah_item_perencanaan) AS total FROM produksi,produksi_line,
        detail_produksi_line,line WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND line.nama_line='$nm_line' AND
        detail_produksi_line.id_detail_purchase_order ='$id_dpo' AND produksi.id_produksi=produksi_line.id_produksi AND 
        produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND produksi_line.id_line = line.id_line ");
    }

    function select_status_monday($linenya){
        return $this->db->query("SELECT produksi.tanggal AS tanggal_mulai, produksi.id_produksi, 
        SUM(detail_produksi_line.jumlah_item_perencanaan) AS total
        FROM produksi,produksi_line,detail_produksi_line,line
        WHERE line.nama_line='$linenya' AND detail_produksi_line.status_delete='0' AND
        produksi.id_produksi=produksi_line.id_produksi AND 
        produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND produksi_line.id_line = line.id_line  
        GROUP BY produksi.tanggal");
    }

    function get_id_produk_by_detail_po($id_detpo,$id_line){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer,detail_produk,produk,konsumsi_material 
        WHERE detail_purchase_order_customer.id_detail_purchase_order_customer='$id_detpo' AND konsumsi_material.id_line='$id_line' AND
        detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND produk.id_produk=detail_produk.id_produk
        AND produk.id_produk=konsumsi_material.id_produk AND konsumsi_material.status_delete='0' ");
    }

    function get_detail_po($id_detpo){
        return $this->db->query("SELECT * FROM detail_purchase_order_customer WHERE id_detail_purchase_order_customer='$id_detpo' ");
    }

    function select_all_prodtun_aktif(){
        return $this->db->query("SELECT * FROM produksi_tertunda,detail_produksi_line,produksi_line,produksi,detail_purchase_order_customer,
        purchase_order_customer,customer,detail_produk,produk,line
        WHERE produksi_tertunda.status_delete='0' AND (produksi_tertunda.status_penjadwalan BETWEEN 0 AND 1) AND 
        produksi.status_laporan='3' AND
        produksi_tertunda.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line AND 
        produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line AND
        produksi_line.id_produksi = produksi.id_produksi AND produksi_line.id_line = line.id_line AND
        detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND 
        purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer AND
        purchase_order_customer.id_customer=customer.id_customer AND
        detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk");
    }

    function select_all_prodtun(){
        return $this->db->query("SELECT * 
        FROM produksi_tertunda,detail_produksi_line,produksi_line,produksi,detail_purchase_order_customer,
        purchase_order_customer,customer,detail_produk,produk,line
        WHERE produksi_tertunda.status_delete='0' AND
        produksi.status_laporan='3' AND
        produksi_tertunda.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line AND 
        produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line AND
        produksi_line.id_produksi = produksi.id_produksi AND produksi_line.id_line = line.id_line AND
        detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND 
        purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer AND
        purchase_order_customer.id_customer=customer.id_customer AND
        detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk");
    }

    function get_one_prodtun($id_prodtun){
        return $this->db->query("SELECT * FROM produksi_tertunda,detail_produksi_line,produksi_line,produksi,detail_purchase_order_customer,
        purchase_order_customer,customer,detail_produk,produk
        WHERE id_produksi_tertunda='$id_prodtun' AND  
        produksi_tertunda.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line AND 
        produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line AND
        produksi_line.id_produksi=produksi.id_produksi AND
        detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND 
        purchase_order_customer.id_purchase_order_customer=detail_purchase_order_customer.id_purchase_order_customer AND
        purchase_order_customer.id_customer=customer.id_customer AND
        detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk");
    }

    function get_one_detprodtun($id_detail_produksi_line){
        return $this->db->query("SELECT * FROM detail_produksi_tertunda WHERE id_detail_produksi_line='$id_detail_produksi_line' AND status_delete='0'  ");
    }
    
    function get_last_dprodtun_id($id_code){
        return $this->db->query("SELECT id_detail_produksi_tertunda FROM detail_produksi_tertunda WHERE id_detail_produksi_tertunda 
        LIKE '$id_code%' ORDER BY id_detail_produksi_tertunda DESC LIMIT 1");
    }

    function get_one_permat($tanggal,$id_detpo,$idline){
        return $this->db->query("SELECT * FROM permintaan_material 
        WHERE tanggal_produksi='$tanggal' AND id_detail_purchase_order_customer='$id_detpo' AND id_line='$idline' AND status_delete='0' ORDER BY  id_permintaan_material DESC");
    }

    function get_detpermat_by_permat($id_permat){
        return $this->db->query("SELECT * FROM detail_permintaan_material,konsumsi_material
        WHERE detail_permintaan_material.id_permintaan_material='$id_permat' 
        AND detail_permintaan_material.id_konsumsi_material=konsumsi_material.id_konsumsi_material AND detail_permintaan_material.status_delete='0'  ");
    }

    function delete_detpermat($id_permat){
        $this->db->query("UPDATE detail_permintaan_material SET status_delete='1' WHERE id_permintaan_material='$id_permat' ");
    }

    function get_one_produksi($tanggal){
        return $this->db->query("SELECT id_produksi FROM produksi WHERE tanggal='$tanggal' AND status_delete='0' ");
    }

    function get_one_detprodline($id_detprodline){
        return $this->db->query("SELECT * FROM detail_produksi_line WHERE id_detail_produksi_line='$id_detprodline' AND status_delete='0' ");
    }

    function cek_ubmin($id_permat){
        return $this->db->query("SELECT * FROM perubahan_permintaan 
        WHERE status_delete='0' AND status='0' AND id_permintaan_material='$id_permat' ");
    }

    function get_last_ubmin_id($id_code){
        return $this->db->query("SELECT id_perubahan_permintaan FROM perubahan_permintaan WHERE id_perubahan_permintaan 
        LIKE '$id_code%' ORDER BY id_perubahan_permintaan DESC LIMIT 1");
    }

    function get_all_jumlah_ct(){
        return $this->db->query("SELECT COUNT(id_cycle_time) AS jumlah_ctnya, id_produk FROM cycle_time WHERE status_delete='0' 
        GROUP BY id_produk");
    }

    function get_semua_ct(){
        return $this->db->query("SELECT * FROM cycle_time,line WHERE cycle_time.status_delete='0' AND cycle_time.id_line=line.id_line");
    }

    function get_semua_perc_line($start,$line){
        return $this->db->query("SELECT detail_produksi_line.id_detail_purchase_order, produk.nama_produk, detail_purchase_order_customer.jumlah_produk, 
        produk.id_produk, detail_produksi_line.id_detail_purchase_order, detail_produk.keterangan, detail_produk.id_warna, detail_produk.id_ukuran_produk
        FROM produksi,produksi_line,detail_produksi_line, detail_purchase_order_customer,detail_produk,produk,line 
        WHERE (produksi.tanggal BETWEEN '$start' AND ('$start' + INTERVAL 6 DAY)) AND detail_produksi_line.status_perencanaan='0' AND 
        line.nama_line='$line' AND produksi.id_produksi = produksi_line.id_produksi AND 
        produksi_line.id_produksi_line = detail_produksi_line.id_produksi_line AND 
        detail_produksi_line.id_detail_purchase_order = detail_purchase_order_customer.id_detail_purchase_order_customer 
        AND detail_purchase_order_customer.id_detail_produk = detail_produk.id_detail_produk AND
        detail_produk.id_produk = produk.id_produk AND detail_produksi_line.status_delete='0' AND
        produksi_line.id_line=line.id_line
        GROUP BY detail_produksi_line.id_detail_purchase_order ORDER BY produk.nama_produk ");
    }
}
