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

<h1>Purchase Order Supplier</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar PO Supplier</h2>
    </header>
    <div class="panel-body">
    
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-2">No. PO</th>
                    <th class="col-lg-3">Supplier</th>
                    <th class="col-lg-2">Tanggal PO</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<count($po_sup) ; $x++){
                ?>
                <tr>
                    <td> <?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['nama_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['tanggal_po'] ?> </td>
                    <td>Menunggu Persetujuan</td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderSupplier/detail/' . $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                            title="Menyetujui" href="#modalsetuju<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                            title="Tolak" href="#modaltolak<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                    </td>
                </tr>
                

                <!-- ****************************** MODAL DITOLAK ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modaltolak<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/setuju_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Menolak PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                <input type="hidden" name="status" class="form-control" value="6" readonly>
                                
                                Apakah anda yakin akan menolak PO Supplier dengan No. PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?></b>?

                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
                <!-- ***************************** END MODAL DITOLAK ************************** -->
                <!-- ************************************************************************** -->


                <!-- ****************************** MODAL SETUJU ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalsetuju<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/setuju_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Menyetujui PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                <input type="hidden" name="status" class="form-control" value="1" readonly>
                                
                                Anda akan menyetujui PO Supplier dengan No. PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?></b>.
                                <br> PO Supplier ini akan dikirimkan kepada Supplier <?php echo $po_sup[$x]['nama_supplier'] ?>.

                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
                <!-- ***************************** END MODAL SETUJU *************************** -->
                <!-- ************************************************************************** -->


            <?php } ?>
            </tbody>
        </table>
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
    