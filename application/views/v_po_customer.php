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

<h1>Purchase Order Customer</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar PO Customer</h2>
    </header>
    <div class="panel-body">
    
    <?php if ($status == 0 || $status == 1 || $status == 2 || $status == 3){ ?>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-2">No. PO</th>
                    <th class="col-lg-2">Tanggal PO</th>
                    <th class="col-lg-2">Customer</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<count($po_cust) ; $x++){
                        if ($status == 0 || $status == 3){ 
                            if($po_cust[$x]['status_po'] == 0 || $po_cust[$x]['status_po'] == 1 || $po_cust[$x]['status_po'] == 2){
                ?>
                <tr>
                    <td> <?php echo $po_cust[$x]['kode_purchase_order_customer'] ?> </td>
                    <td> <?php echo $po_cust[$x]['tanggal_po'] ?> </td>
                    <td> <?php echo $po_cust[$x]['nama_customer'] ?> </td>
                    <td>
                        <?php
                            if($po_cust[$x]['status_po'] == 0){
                                echo "Menunggu Persetujuan";
                            } else if($po_cust[$x]['status_po'] == 1){
                                echo "Disetujui, Belum Diproses";
                            } else if($po_cust[$x]['status_po'] == 2){
                                echo "Sedang Diproses";
                            }
                        ?>
                    </td>
                    <td>
                    <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderCustomer/detail/' . $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <!-- tambah log -->
                    </td>
                </tr>
                <?php
                    }
                        }
                        if ($status == 1 || $status == 3){
                            if($po_cust[$x]['status_po'] == 3){
                ?>
                <tr>
                    <td> <?php echo $po_cust[$x]['kode_purchase_order_customer'] ?> </td>
                    <td> <?php echo $po_cust[$x]['tanggal_po'] ?> </td>
                    <td> <?php echo $po_cust[$x]['nama_customer'] ?> </td>
                    <td>
                        <?php
                            if($po_cust[$x]['status_po'] == 3){
                                echo "Selesai";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderCustomer/detail/' . $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <!-- tambah log -->
                    </td>
                </tr>
                <?php
                    }
                        }
                        if ($status == 2 || $status == 3){
                            if($po_cust[$x]['status_po'] == 4 || $po_cust[$x]['status_po'] == 5){ 
                ?>
                <tr>
                    <td> <?php echo $po_cust[$x]['kode_purchase_order_customer'] ?> </td>
                    <td> <?php echo $po_cust[$x]['tanggal_po'] ?> </td>
                    <td> <?php echo $po_cust[$x]['nama_customer'] ?> </td>
                    <td>
                        <?php
                            if($po_cust[$x]['status_po'] == 4){
                                echo "Batal";
                            } else if($po_cust[$x]['status_po'] == 5){
                                echo "Persetujuan Ditolak";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderCustomer/detail/' . $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <!-- tambah log -->
                    </td>
                </tr>
                <?php }} } ?>
            </tbody>
        </table>
        <?php } ?>
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
    