<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {
	function __construct(){
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
    }

    //notif produksi
        //permintaan material produksi
            public function get_jm_permat(){
                return $this->db->query("SELECT COUNT(id_permintaan_material) AS jumlah_permat
                FROM permintaan_material WHERE status_delete='0' AND (status_permintaan='0' OR status_permintaan='1')
                OR status_permintaan='3' OR status_permintaan='4' OR status_permintaan='5' ");
            }

            public function get_jm_permat_0(){
                return $this->db->query("SELECT COUNT(id_permintaan_material) AS jumlah_0 
                FROM permintaan_material WHERE status_delete='0' AND status_permintaan='0' ");
            }

            public function get_jm_permat_1(){
                return $this->db->query("SELECT COUNT(id_permintaan_material) AS jumlah_1 
                FROM permintaan_material WHERE status_delete='0' AND status_permintaan='1' ");
            }

            public function get_jm_permat_2(){
                return $this->db->query("SELECT COUNT(id_permintaan_material) AS jumlah_2 
                FROM permintaan_material WHERE status_delete='0' AND status_permintaan='2' ");
            }

            public function get_jm_permat_3(){
                return $this->db->query("SELECT COUNT(id_permintaan_material) AS jumlah_3 
                FROM permintaan_material WHERE status_delete='0' AND status_permintaan='3' ");
            }

            public function get_jm_permat_4(){
                return $this->db->query("SELECT COUNT(id_permintaan_material) AS jumlah_4 
                FROM permintaan_material WHERE status_delete='0' AND status_permintaan='4' ");
            }

            public function get_jm_permat_5(){
                return $this->db->query("SELECT COUNT(id_permintaan_material) AS jumlah_5 
                FROM permintaan_material WHERE status_delete='0' AND status_permintaan='5' ");
            }
        //tutup

        //surat perintah lembur
            function get_jm_spl(){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur WHERE status_delete='0' AND (status_spl='0' OR status_spl='1' OR status_spl='2' )  ");
            }

            function get_jm_spl_0(){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur WHERE status_delete='0' AND status_spl='0' ");
            }

            function get_jm_spl_1(){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur WHERE status_delete='0' AND status_spl='1' ");
            }

            function get_jm_spl_2(){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur WHERE status_delete='0' AND status_spl='2' ");
            }

            function get_jm_spl_line($nama_line){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur,line 
                WHERE surat_perintah_lembur.status_delete='0' AND (status_spl='0' OR status_spl='1' OR status_spl='2' )
                AND line.nama_line='$nama_line' AND surat_perintah_lembur.id_line=line.id_line  ");
            }

            function get_jm_spl_line_0($nama_line){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur,line 
                WHERE surat_perintah_lembur.status_delete='0' AND status_spl='0'
                AND line.nama_line='$nama_line' AND surat_perintah_lembur.id_line=line.id_line  ");
            }

            function get_jm_spl_line_1($nama_line){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur,line 
                WHERE surat_perintah_lembur.status_delete='0' AND status_spl='1'
                AND line.nama_line='$nama_line' AND surat_perintah_lembur.id_line=line.id_line  ");
            }

            function get_jm_spl_line_2($nama_line){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_spl
                FROM surat_perintah_lembur,line 
                WHERE surat_perintah_lembur.status_delete='0' AND status_spl='2'
                AND line.nama_line='$nama_line' AND surat_perintah_lembur.id_line=line.id_line  ");
            }
        //tutup

        //notif laporan lembur
            function get_jm_ll($tanggal){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_ll FROM surat_perintah_lembur WHERE 
                surat_perintah_lembur.status_delete=0 AND (surat_perintah_lembur.status_spl BETWEEN 3 AND 4) AND surat_perintah_lembur.tanggal<='$tanggal'");
            }

            function get_jm_ll_3($tanggal){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_ll FROM surat_perintah_lembur WHERE 
                surat_perintah_lembur.status_delete=0 AND (surat_perintah_lembur.status_spl ='3') AND surat_perintah_lembur.tanggal<='$tanggal'");
            }

            function get_jm_ll_4($tanggal){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_ll FROM surat_perintah_lembur WHERE 
                surat_perintah_lembur.status_delete=0 AND (surat_perintah_lembur.status_spl ='4') AND surat_perintah_lembur.tanggal<='$tanggal'");
            }

            function get_jm_ll_line($line,$tanggal){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_ll
                FROM surat_perintah_lembur,line 
                WHERE surat_perintah_lembur.status_delete='0' AND (status_spl='3' OR status_spl='4')
                AND line.nama_line='$line' AND surat_perintah_lembur.id_line=line.id_line AND surat_perintah_lembur.tanggal<='$tanggal' ");
            }

            function get_jm_ll_line_3($nama_line,$tanggal){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_ll
                FROM surat_perintah_lembur,line 
                WHERE surat_perintah_lembur.status_delete='0' AND status_spl='3'
                AND line.nama_line='$nama_line' AND surat_perintah_lembur.id_line=line.id_line AND surat_perintah_lembur.tanggal<='$tanggal' ");
            }

            function get_jm_ll_line_4($nama_line,$tanggal){
                return $this->db->query("SELECT COUNT(id_surat_perintah_lembur) AS jumlah_ll
                FROM surat_perintah_lembur,line 
                WHERE surat_perintah_lembur.status_delete='0' AND status_spl='4'
                AND line.nama_line='$nama_line' AND surat_perintah_lembur.id_line=line.id_line AND surat_perintah_lembur.tanggal<='$tanggal' ");
            }

        //tutup

        //notif bpbj
            function get_jm_bpbj(){
                return $this->db->query("SELECT COUNT(id_bpbj) AS jumlah_bpbj FROM bpbj WHERE 
                bpbj.status_delete=0 AND (bpbj.status_bpbj BETWEEN 0 AND 1) ");
            }

            function get_jm_bpbj_0(){
                return $this->db->query("SELECT COUNT(id_bpbj) AS jumlah_bpbj FROM bpbj WHERE 
                bpbj.status_delete=0 AND bpbj.status_bpbj ='0' ");
            }

            function get_jm_bpbj_1(){
                return $this->db->query("SELECT COUNT(id_bpbj) AS jumlah_bpbj FROM bpbj WHERE 
                bpbj.status_delete=0 AND bpbj.status_bpbj ='1' ");
            }
        //tutup

        //notif bpbd
            function get_jm_bpbd(){
                return $this->db->query("SELECT COUNT(id_bpbd) AS jumlah_bpbd FROM bpbd WHERE 
                bpbd.status_delete=0 AND (bpbd.status_bpbd ='0') ");
            }
        //tutup

        //notif sj
            function get_jm_sj(){
                return $this->db->query("SELECT COUNT(id_surat_jalan) AS jumlah_sj FROM surat_jalan WHERE 
                surat_jalan.status_delete=0 AND (surat_jalan.status_surat_jalan BETWEEN 0 AND 1) ");
            }

            function get_jm_sj_0(){
                return $this->db->query("SELECT COUNT(id_surat_jalan) AS jumlah_sj FROM surat_jalan WHERE 
                surat_jalan.status_delete=0 AND (surat_jalan.status_surat_jalan ='0') ");
            }

            function get_jm_sj_1(){
                return $this->db->query("SELECT COUNT(id_surat_jalan) AS jumlah_sj FROM surat_jalan WHERE 
                surat_jalan.status_delete=0 AND (surat_jalan.status_surat_jalan ='1') ");
            }
        //tutup

        //notif invoice
            function get_jm_invoice(){
                return $this->db->query("SELECT COUNT(id_invoice) AS jumlah_invoice FROM invoice WHERE 
                invoice.status_delete=0 AND (invoice.status_invoice ='0') ");
            }
        //tutup

        //notif pengmat
            function get_jm_pengmat(){
                return $this->db->query("SELECT COUNT(id_pengambilan_material) AS jumlah_pengmat FROM pengambilan_material WHERE 
                pengambilan_material.status_delete=0 AND (pengambilan_material.status_keluar ='0') ");
            }

            function get_jm_pengmat_line($line){
                return $this->db->query("SELECT COUNT(id_pengambilan_material) AS jumlah_pengmat 
                FROM pengambilan_material,detail_permintaan_material,permintaan_material,line WHERE line.nama_line='$line' AND
                pengambilan_material.status_delete=0 AND (pengambilan_material.status_keluar ='0') AND 
                pengambilan_material.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material AND
                detail_permintaan_material.id_permintaan_material=permintaan_material.id_permintaan_material AND
                permintaan_material.id_line=line.id_line");
            }
        //tutup

        //notif pertam
            function get_jm_pertam(){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam FROM permintaan_tambahan WHERE 
                permintaan_tambahan.status_delete=0 AND (permintaan_tambahan.status BETWEEN 0 AND 2) ");
            }

            function get_jm_pertam_0(){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam FROM permintaan_tambahan WHERE 
                permintaan_tambahan.status_delete=0 AND (permintaan_tambahan.status ='0') ");
            }

            function get_jm_pertam_1(){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam FROM permintaan_tambahan WHERE 
                permintaan_tambahan.status_delete=0 AND (permintaan_tambahan.status ='1') ");
            }

            function get_jm_pertam_2(){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam FROM permintaan_tambahan WHERE 
                permintaan_tambahan.status_delete=0 AND (permintaan_tambahan.status ='2') ");
            }

            function get_jm_pertam_line($line){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam 
                FROM permintaan_tambahan,detail_permintaan_material,permintaan_material,line 
                WHERE permintaan_tambahan.status_delete=0 AND line.nama_line='$line' AND 
                (permintaan_tambahan.status BETWEEN 0 AND 2) AND permintaan_tambahan.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material
                AND detail_permintaan_material.id_permintaan_material=permintaan_material.id_permintaan_material AND 
                permintaan_material.id_line=line.id_line ");
            }

            function get_jm_pertam_line_0($line){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam 
                FROM permintaan_tambahan,detail_permintaan_material,permintaan_material,line 
                WHERE permintaan_tambahan.status_delete=0 AND line.nama_line='$line' AND 
                (permintaan_tambahan.status ='0') AND permintaan_tambahan.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material
                AND detail_permintaan_material.id_permintaan_material=permintaan_material.id_permintaan_material AND 
                permintaan_material.id_line=line.id_line ");
            }

            function get_jm_pertam_line_1($line){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam 
                FROM permintaan_tambahan,detail_permintaan_material,permintaan_material,line 
                WHERE permintaan_tambahan.status_delete=0 AND line.nama_line='$line' AND 
                (permintaan_tambahan.status ='1') AND permintaan_tambahan.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material
                AND detail_permintaan_material.id_permintaan_material=permintaan_material.id_permintaan_material AND 
                permintaan_material.id_line=line.id_line ");
            }

            function get_jm_pertam_line_2($line){
                return $this->db->query("SELECT COUNT(id_permintaan_tambahan) AS jumlah_pertam 
                FROM permintaan_tambahan,detail_permintaan_material,permintaan_material,line 
                WHERE permintaan_tambahan.status_delete=0 AND line.nama_line='$line' AND 
                (permintaan_tambahan.status ='2') AND permintaan_tambahan.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material
                AND detail_permintaan_material.id_permintaan_material=permintaan_material.id_permintaan_material AND 
                permintaan_material.id_line=line.id_line ");
            }
        //tutup

        //notif hasil produksi
            function get_jm_hasprod(){
                return $this->db->query("SELECT COUNT(id_produksi) AS jumlah_hasprod FROM produksi WHERE 
                produksi.status_delete=0 AND (produksi.status_laporan BETWEEN 0 AND 1) AND produksi.status_perencanaan='1' ");
            }
        //tutup

        //notif percut
            function get_jm_percut(){
                return $this->db->query("SELECT tanggal,COUNT(id_perencanaan_cutting) AS jumlah_percut FROM perencanaan_cutting 
                WHERE perencanaan_cutting.status_delete=0 AND (perencanaan_cutting.status_laporan BETWEEN 0 AND 1) ");
            }

            function get_jm_percut_0(){
                return $this->db->query("SELECT tanggal,COUNT(id_perencanaan_cutting) AS jumlah_percut FROM perencanaan_cutting 
                WHERE perencanaan_cutting.status_delete=0 AND (perencanaan_cutting.status_laporan ='0') ");
            }

            function get_jm_percut_1(){
                return $this->db->query("SELECT tanggal,COUNT(id_perencanaan_cutting) AS jumlah_percut FROM perencanaan_cutting 
                WHERE perencanaan_cutting.status_delete=0 AND (perencanaan_cutting.status_laporan ='1') ");
            }
        //tutup

        //notif peraks
            function get_jm_peraks(){
                return $this->db->query("SELECT COUNT(id_permohonan_akses) AS jumlah_peraks FROM permohonan_akses WHERE 
                permohonan_akses.status_delete=0 AND (permohonan_akses.status_permohonan ='0') ");
            }
        //tutup



    //tutup notif produksi


    //dashboard produksi
        //admin risdev
            function jumlah_produk(){
                return $this->db->query("SELECT COUNT(id_produk) as jumlah_produk FROM produk WHERE status_delete='0' ");
            }

            function jumlah_jenis_produk(){
                return $this->db->query("SELECT COUNT(id_jenis_produk) as jumlah_jenis_produk FROM jenis_produk WHERE status_delete='0' ");
            }

            function jumlah_warna(){
                return $this->db->query("SELECT COUNT(id_warna) as jumlah_warna FROM warna WHERE status_delete='0' ");
            }

            function jumlah_ukuran_produk(){
                return $this->db->query("SELECT COUNT(id_ukuran_produk) as jumlah_ukuran_produk FROM ukuran_produk WHERE status_delete='0' ");
            }
        //tutup admin risdev

        //PIC
            function jumlah_inventory_line($line){
                return $this->db->query("SELECT COUNT(persediaan_line.id_persediaan_line) as jumlah_inventory_line FROM persediaan_line,line
                WHERE  line.nama_line='$line' AND persediaan_line.status_delete='0' AND persediaan_line.id_line=line.id_line 
                AND persediaan_line.total_material != 0 ");
            }

            function perencanaan_hari_ini($now,$line){
                return $this->db->query("SELECT detail_produksi_line.jumlah_item_perencanaan, produk.nama_produk, detail_produk.id_ukuran_produk,
                detail_produk.id_warna,detail_produk.keterangan 
                FROM produksi,produksi_line,detail_produksi_line,line,detail_purchase_order_customer,detail_produk,produk
                WHERE produksi.tanggal='$now' AND  line.nama_line='$line'  AND detail_produksi_line.status_delete='0'
                AND detail_produksi_line.jumlah_item_perencanaan != 0
                AND produksi.id_produksi = produksi_line.id_produksi AND produksi_line.id_line=line.id_line 
                AND produksi_line.id_produksi_line=detail_produksi_line.id_produksi_line
                AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer
                AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk 
                AND detail_produk.id_produk=produk.id_produk ");
            }

            function status_hasil_produksi($now,$line){
                return $this->db->query("SELECT produksi_line.status_laporan FROM produksi,produksi_line,line
                WHERE produksi.tanggal='$now' AND line.nama_line='$line' AND produksi_line.status_delete='0'
                AND produksi_line.status_perencanaan != '0'
                AND produksi.id_produksi=produksi_line.id_produksi AND produksi_line.id_line=line.id_line ");
            }

            function pengambilan_material($now,$line){
                return $this->db->query("SELECT pengambilan_material.id_pengambilan_material 
                FROM pengambilan_material,pengeluaran_material,detail_permintaan_material,permintaan_material,line 
                WHERE pengeluaran_material.tanggal_keluar='$now' AND line.nama_line='$line'
                AND pengambilan_material.id_pengeluaran_material=pengeluaran_material.id_pengeluaran_material
                AND pengambilan_material.id_detail_permintaan_material=detail_permintaan_material.id_detail_permintaan_material
                AND permintaan_material.id_permintaan_material=detail_permintaan_material.id_permintaan_material
                AND permintaan_material.id_line=line.id_line
                AND pengambilan_material.status_delete='0' ");
            }

            function spl_line($line){
                return $this->db->query("SELECT * FROM surat_perintah_lembur,line 
                WHERE line.nama_line='$line' AND surat_perintah_lembur.status_spl='0'
                AND surat_perintah_lembur.id_line=line.id_line ");
            }

            function ll_line($line,$now){
                return $this->db->query("SELECT * FROM surat_perintah_lembur,line 
                WHERE line.nama_line='$line' AND surat_perintah_lembur.status_spl='3'
                AND surat_perintah_lembur.tanggal <= '$now' AND surat_perintah_lembur.id_line=line.id_line ");
            }
        // tutup PIC

        //finish good
            function bpbd($now){
                return $this->db->query("SELECT COUNT(id_bpbd) as jumlah_bpbd FROM bpbd WHERE tanggal='$now' AND status_delete='0' AND status_bpbd='1' ");
            }
        //tutup finish good

        //admin produksi
            function perencanaan_cutting_kain($now){
                return $this->db->query("SELECT perencanaan_cutting.jumlah_perencanaan, produksi.tanggal AS tanggal_produksi,
                detail_produk.keterangan, produk.nama_produk, detail_produk.id_ukuran_produk, detail_produk.id_warna
                FROM perencanaan_cutting,detail_produksi_line,produksi_line,produksi,detail_purchase_order_customer,detail_produk,produk 
                WHERE perencanaan_cutting.tanggal='$now' AND perencanaan_cutting.status_delete='0'
                AND perencanaan_cutting.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line 
                AND detail_produksi_line.id_produksi_line=produksi_line.id_produksi_line AND produksi_line.id_produksi=produksi.id_produksi
                AND detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer
                AND detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk
                AND detail_produk.id_produk=produk.id_produk");
            }

            function laporan_perencanaan_cutting_kain($now){
                return $this->db->query("SELECT COUNT(id_perencanaan_cutting) AS jumlah_belum FROM perencanaan_cutting 
                WHERE perencanaan_cutting.tanggal='$now' AND perencanaan_cutting.status_delete='0' 
                AND perencanaan_cutting.status_laporan='0' ");
            }
        //tutup admin produksi
        
        //admin purchasing
            function surat_jalan($now){
                return $this->db->query("SELECT COUNT(id_surat_jalan) as jumlah_sj FROM surat_jalan 
                WHERE surat_jalan.tanggal='$now' AND surat_jalan.status_delete='0' ");
            }

            function invoice($now){
                return $this->db->query("SELECT COUNT(id_invoice) as jumlah_invoice FROM invoice 
                WHERE invoice.tanggal='$now' AND invoice.status_delete='0'");
            }
        //tutup admin purchasing

        //ppic produksi
            function po_cust(){
                return $this->db->query("SELECT COUNT(id_purchase_order_customer) as jumlah_po 
                FROM purchase_order_customer WHERE purchase_order_customer.status_delete='0' AND purchase_order_customer.status_po='1' ");
            }

            function target_efisiensi($now){
                return $this->db->query("SELECT line.nama_line,produksi_line.efisiensi_perencanaan FROM produksi,produksi_line,line
                WHERE produksi.tanggal='$now' AND produksi_line.status_delete='0' AND produksi.id_produksi=produksi_line.id_produksi 
                AND produksi_line.id_line=line.id_line ");
            }

            function produksi_tertunda(){
                return $this->db->query("SELECT produksi_tertunda.jumlah_tertunda, produksi_tertunda.status_penjadwalan, produk.nama_produk,
                detail_produk.keterangan, detail_produk.id_ukuran_produk, detail_produk.id_warna
                FROM produksi_tertunda,detail_produksi_line,detail_purchase_order_customer,detail_produk,produk 
                WHERE produksi_tertunda.status_penjadwalan < 2 AND produksi_tertunda.status_delete='0' AND
                produksi_tertunda.id_detail_produksi_line=detail_produksi_line.id_detail_produksi_line AND 
                detail_produksi_line.id_detail_purchase_order=detail_purchase_order_customer.id_detail_purchase_order_customer AND
                detail_purchase_order_customer.id_detail_produk=detail_produk.id_detail_produk AND detail_produk.id_produk=produk.id_produk ");
            }

        //tutup ppic produksi
    //tutup dashboard produksi


    

}
