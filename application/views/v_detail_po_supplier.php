<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Purchase Order Supplier</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Purchase Order Supplier</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Detail Purchase Order Supplier</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Detail PO Supplier <?php echo $po_sup[0]['kode_purchase_order_supplier'] ?></h2>
    </header>

    <div class="panel-body">
        <input type="hidden" name="id_po_sup" class="form-control" value="<?php echo $po_sup[0]['id_purchase_order_supplier'] ?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. PO</label>
            <div class="col-sm-9">
                <input type="text" name="no_po" class="form-control"
                value="<?php echo $po_sup[0]['kode_purchase_order_supplier'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal PO</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal_po" class="form-control"
                value="<?php echo $po_sup[0]['tanggal_po'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Supplier</label>
            <div class="col-sm-9">
                <input type="text" name="supplier" class="form-control"
                value="<?php echo $po_sup[0]['nama_supplier'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <input type="text" name="status" class="form-control"
                value="<?php 
                    if($po_sup[0]['status_po'] == 0){
                        echo "Menunggu Persetujuan";
                    } else if($po_sup[0]['status_po'] == 1){
                        echo "Disetujui, Belum Dikirim ke Supplier";
                    } else if($po_sup[0]['status_po'] == 2){
                        echo "Dikirim, Menunggu Konfirmasi Supplier";
                    } else if($po_sup[0]['status_po'] == 3){
                        echo "Sedang Diproses";
                    }
                    else if($po_sup[0]['status_po'] == 4){
                        echo "Selesai";
                    }
                    else if($po_sup[0]['status_po'] == 5){
                        echo "Batal";
                    }
                    else {
                        echo "Persetujuan Ditolak";
                    }
                ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <div class="col-sm-12">
                <h3 style="text-align: center">Detail Material</h3>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                        <tr>
                            <th class="col-lg-2">Kode Material</th>
                            <th class="col-lg-2">Nama Material</th>
                            <th class="col-lg-1">Jumlah</th>
                            <th class="col-lg-1">Satuan</th>
                            <th class="col-lg-2">Harga Satuan</th>
                            <th class="col-lg-2">Total Harga</th>
                            <th class="col-lg-2">Status Pengambilan
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($y=0; $y<count($detail_po_sup); $y++){
                            if($po_sup[0]['id_purchase_order_supplier'] == $detail_po_sup[$y]['id_purchase_order_supplier']){?>
                        <tr>
                            <td> <?php echo $detail_po_sup[$y]['kode_sub_jenis_material'] ?> </td>
                            <td> <?php echo $detail_po_sup[$y]['nama_jenis_material'] . ' ' . $detail_po_sup[$y]['nama_sub_jenis_material'] ?> </td>
                            <td> <?php echo $detail_po_sup[$y]['jumlah_material'] ?> </td>
                            <td> <?php echo $detail_po_sup[$y]['satuan_ukuran'] ?> </td>
                            <td> <?php echo $detail_po_sup[$y]['harga_satuan'] ?></td>
                            <td> <?php echo $detail_po_sup[$y]['harga_total'] ?></td>
                            <td>
                                <?php
                                    if ($detail_po_sup[$y]['status_detail_po']==0){
                                        echo "Material Belum Diambil";
                                    }
                                    else if ($detail_po_sup[$y]['status_detail_po']==1){
                                        echo "Pengambilan Terjadwal";
                                    }else if ($detail_po_sup[$y]['status_detail_po']==2){
                                        echo "Proses Pengambilan Material";
                                    }
                                    else{
                                        echo "Material Sudah Diambil";
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Harga Sebelum Pajak</label>
            <div class="col-sm-9">
                <input type="text" name="harga_sebelum_pajak" class="form-control"
                value="<?php echo $po_sup[0]['harga_sebelum_pajak'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">PPN</label>
            <div class="col-sm-9">
                <input type="text" name="ppn" class="form-control"
                value="<?php echo $po_sup[0]['ppn'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Total harga</label>
            <div class="col-sm-9">
                <input type="text" name="total_harga_akhir" class="form-control"
                value="<?php echo $po_sup[0]['total_harga_akhir'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Keterangan</label>
            <div class="col-sm-9">
                <input type="text" name="keterangan" class="form-control"
                value="<?php
                    if ($po_sup[0]['keterangan'] != ''){
                        echo $po_sup[0]['keterangan'];
                    }else{
                        echo "-";
                    }
                ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            
            <!-- <a class="col-lg-3 btn btn-warning"
                title="Print" href="<?php echo base_url() . 'PurchaseOrderSupplier/print_po/' . $po_sup[0]['id_purchase_order_supplier'] ?>">
                Print PO Supplier</a> -->
            

        </div>
    </div>

</section>



<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>
<script>
    function reload() {
    location.reload();
    }
</script>
    