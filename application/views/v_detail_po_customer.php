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
                            <th class="col-lg-2">Kode Produk</th>
                            <th class="col-lg-2">Nama Produk</th>
                            <th class="col-lg-1">Jumlah</th>
                            <th class="col-lg-1">Satuan</th>
                            <th class="col-lg-2">Harga Satuan</th>
                            <th class="col-lg-2">Total Harga</th>
                            <th class="col-lg-2">Tanggal Penerimaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($y=0; $y<count($detail_po_cust); $y++){
                            if($po_cust[0]['id_purchase_order_customer'] == $detail_po_cust[$y]['id_purchase_order_customer']){?>
                        <tr>
                            <td> <?php echo $detail_po_cust[$y]['kode_produk'] ?> </td>
                            <td> <?php echo $detail_po_cust[$y]['nama_produk'] ?> </td>
                            <td> <?php echo $detail_po_cust[$y]['jumlah_produk'] ?> </td>
                            <td> <?php //echo $detail_po_cust[$y]['satuan'] ?> Pcs </td>
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
            <?php if (count($sales_order) == 0){ ?>
                <a class="modal-with-form col-lg-2 btn btn-info"
                    title="Buat SO" href="#modalso<?php echo $po_cust[0]['id_purchase_order_customer'] ?>">Sales Order</a>
            <?php } else { ?>
                <a class="col-lg-2 btn btn-info"
                    title="Lihat SO" href="<?php echo base_url() . 'PurchaseOrderCustomer/sales_order/' . $po_cust[0]['id_purchase_order_customer'] ?>">
                    Sales Order</a>
            <?php } ?>
            
            <a class="col-lg-3 btn btn-warning"
                title="Print" href="<?php echo base_url() . 'PurchaseOrderCustomer/print_po/' . $po_cust[0]['id_purchase_order_customer'] ?>">
                Print PO Customer</a>
            
            <?php if($po_cust[0]['status_po'] != 3 || $po_cust[0]['status_po'] != 4 || $po_cust[0]['status_po'] != 5){ ?>
                <a class="modal-with-form col-lg-2 btn btn-danger mr-1"
                    title="Batalkan" href="#modalbatal<?php echo $po_cust[0]['id_purchase_order_customer'] ?>">Batalkan</a>
            <?php } ?>


            <!-- ********************************* MODAL SO ******************************* -->
            <!-- ************************************************************************** -->
            <div id='modalso<?php echo $po_cust[0]['id_purchase_order_customer'] ?>' class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/insert_so" method="post">
                        <header class="panel-heading">
                            <h2 class="panel-title">Sales Order</h2>
                        </header>
                        <div class="panel-body" style="color: black">
                            <input type="hidden" name="id_po_customer" class="form-control" value="<?php echo $po_cust[0]['id_purchase_order_customer'] ?>" readonly>
                            <input type="hidden" name="id_sales_order" class="form-control" value="SO-<?php echo $jumlah_so+1 ?>" readonly>
                                                       
                            PO Customer ini belum memiliki Sales Order.<br>
                            Apakah anda ingin membuat Sales Order untuk PO Customer dengan No. PO <b><?php echo $po_cust[0]['kode_purchase_order_customer'] ?></b>?

                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Sales Order</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tgl_so" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Pengantaran</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tgl_pengantaran" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" id="batal" class="btn btn-primary" value="Buat SO">
                                    <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- ****************************** END MODAL SO ****************************** -->
            <!-- ************************************************************************** -->


            <!-- ******************************* MODAL BATAL ****************************** -->
            <!-- ************************************************************************** -->
            <div id='modalbatal<?php echo $po_cust[0]['id_purchase_order_customer'] ?>' class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/batal_po" method="post">
                        <header class="panel-heading">
                            <h2 class="panel-title">Edit Data Material</h2>
                        </header>
                        <div class="panel-body" style="color: black">
                            <input type="hidden" name="id_po_customer" class="form-control" value="<?php echo $po_cust[0]['id_purchase_order_customer'] ?>" readonly>
                            Apakah anda yakin akan membatalkan PO Customer dengan No. PO <b><?php echo $po_cust[0]['id_purchase_order_customer'] ?></b>?

                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label"> Masukkan keterangan<span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="keterangan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" id="batal" class="btn btn-danger" value="Ya">
                                    <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Tidak</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- ***************************** END MODAL BATAL **************************** -->
            <!-- ************************************************************************** -->

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
    