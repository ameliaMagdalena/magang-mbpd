<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Purchase Order Customer</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Purchase Order Customer</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Detail Purchase Order Customer</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Detail PO Customer <?php echo $po_cust[0]['kode_purchase_order_customer'] ?></h2>
    </header>

    <div class="panel-body">
        <input type="hidden" name="id_po_cust" class="form-control" value="<?php echo $po_cust[0]['id_purchase_order_customer'] ?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. PO</label>
            <div class="col-sm-9">
                <input type="text" name="no_po" class="form-control"
                value="<?php echo $po_cust[0]['kode_purchase_order_customer'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal PO</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal_po" class="form-control"
                value="<?php echo $po_cust[0]['tanggal_po'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Customer</label>
            <div class="col-sm-9">
                <input type="text" name="customer" class="form-control"
                value="<?php echo $po_cust[0]['nama_customer'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <input type="text" name="status" class="form-control"
                value="<?php 
                    if($po_cust[0]['status_po'] == 0){
                        echo "Menunggu Persetujuan";
                    } else if($po_cust[0]['status_po'] == 1){
                        echo "Disetujui, Belum Diproses";
                    } else if($po_cust[0]['status_po'] == 2){
                        echo "Sedang Diproses";
                    }
                    else if($po_cust[0]['status_po'] == 3){
                        echo "Selesai";
                    }
                    else if($po_cust[0]['status_po'] == 4){
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
                <h3 style="text-align: center">Detail Produk</h3>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                        <tr>
                            <th class="col-lg-1">Kode Produk</th>
                            <th class="col-lg-2">Nama Produk</th>
                            <th class="col-lg-1">Jumlah</th>
                            <th class="col-lg-1">Satuan</th>
                            <th class="col-lg-2">Harga Satuan</th>
                            <th class="col-lg-2">Total Harga</th>
                            <th class="col-lg-3">Tanggal Penerimaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($y=0; $y<count($detail_po_cust); $y++){
                            if($po_cust[0]['id_purchase_order_customer'] == $detail_po_cust[$y]['id_purchase_order_customer']){?>
                        <tr>
                            <td> <?php echo $detail_po_cust[$y]['kode_produk'] ?> </td>
                            <td> <?php echo $detail_po_cust[$y]['nama_produk'] ?> </td>
                            <td> <?php echo $detail_po_cust[$y]['jumlah_produk'] ?> </td>
                            <td> <?php //echo $detail_po_cust[$y]['satuan'] ?> *** </td>
                            <td> <?php echo $detail_po_cust[$y]['harga_satuan'] ?></td>
                            <td> <?php echo $detail_po_cust[$y]['total_harga'] ?></td>
                            <td> <?php echo $detail_po_cust[$y]['tanggal_penerimaan'] ?></td>
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
                value="<?php echo $po_cust[0]['harga_sebelum_pajak'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">PPN</label>
            <div class="col-sm-9">
                <input type="text" name="ppn" class="form-control"
                value="<?php echo $po_cust[0]['ppn'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Total harga</label>
            <div class="col-sm-9">
                <input type="text" name="total_harga_akhir" class="form-control"
                value="<?php echo $po_cust[0]['total_harga_akhir'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Keterangan</label>
            <div class="col-sm-9">
                <input type="text" name="keterangan" class="form-control"
                value="<?php
                    if ($po_cust[0]['keterangan'] != ''){
                        echo $po_cust[0]['keterangan'];
                    }else{
                        echo "-";
                    }
                ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <button class="modal-with-form col-lg-2 btn btn-warning mr-1"
                title="Edit" href="#modaledit<?php echo $po_cust[0]['id_purchase_order_customer'] ?>">Edit</button>
            <a class="col-lg-2 btn btn-info"
                title="Lihat SO" href="<?php echo base_url() . 'PurchaseOrderCustomer/sales_order/' . $po_cust[0]['id_purchase_order_customer'] ?>">
                Sales Order</a>
            <a class="col-lg-2 btn btn-success"
                title="Lihat SO" href="<?php echo base_url() . 'PurchaseOrderCustomer/print_po/' . $po_cust[0]['id_purchase_order_customer'] ?>">
                Print</a>
            <a class="modal-with-form col-lg-2 btn btn-danger mr-1"
                title="Edit" href="#modalbatal<?php echo $po_cust[0]['id_purchase_order_customer'] ?>">Batalkan</a>
        </div>
    </div>

        









    <!-- ******************************* MODAL BELI ******************************* -->
    <!-- ************************************************************************** -->
    <div id='modalbeli' class="modal-block modal-block-md mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Pilih Material Yang Akan Dibeli</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>

                <div class="form-group mt-lg">
                    <div class="col-sm-9">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Kode Material</th>
                                    <th>Nama Material</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-2">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" id="checkboxExample2">
                                            <label for="checkboxExample2"></label>
                                        </div>
                                    </td>
                                    <td class="col-lg-3"> MAT123 </td>
                                    <td class="col-lg-3"> Foam </td>
                                    <td class="col-lg-2"> 15 </td>
                                    <td class="col-lg-3"> pc </td>
                                    <td class="col-lg-2"> Stok kurang</td>
                                </tr>
                                <tr>
                                    <td class="col-2">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" id="checkboxExample2">
                                            <label for="checkboxExample2"></label>
                                        </div>
                                    </td>
                                    <td class="col-lg-3"> MAT109 </td>
                                    <td class="col-lg-3"> Kain </td>
                                    <td class="col-lg-2"> 10 </td>
                                    <td class="col-lg-3"> pc </td>
                                    <td class="col-lg-2"> Stok tersedia</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-default modal-dismiss">OK</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <!-- **************************** END MODAL DETAIL **************************** -->
    <!-- ************************************************************************** -->


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
    