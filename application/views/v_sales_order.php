<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Sales Order</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Sales Order</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Sales Order</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Sales Order <?php echo $sales_order[0]['id_sales_order'] ?></h2>
    </header>

    <div class="panel-body">
        <input type="hidden" name="id_po_cust" class="form-control" value="<?php echo $po_cust[0]['id_purchase_order_customer'] ?>" readonly>
        <input type="hidden" name="id_so" class="form-control" value="<?php echo $sales_order[0]['id_sales_order'] ?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Kode SO</label>
            <div class="col-sm-9">
                <input type="text" name="no_so" class="form-control"
                value="<?php echo $sales_order[0]['id_sales_order'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. PO</label>
            <div class="col-sm-9">
                <input type="text" name="no_po" class="form-control"
                value="<?php echo $sales_order[0]['kode_purchase_order_customer'] ?>" readonly>
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
            <label class="col-sm-3 control-label">Tanggal Pengantaran</label>
            <div class="col-sm-9">
                <input type="text" name="tgl_pengantaran" class="form-control"
                value="<?php echo $sales_order[0]['tanggal_pengantaran'] ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <div class="col-sm-12">
                <h3 style="text-align: center">Produk</h3>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                        <tr>
                            <th class="col-lg-1">No.</th>
                            <th class="col-lg-2">Nama Produk</th>
                            <th class="col-lg-1">Jumlah</th>
                            <th class="col-lg-1">Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($y=0; $y<count($detail_po_cust); $y++){
                            if($sales_order[0]['id_purchase_order_customer'] == $detail_po_cust[$y]['id_purchase_order_customer']){?>
                        <tr>
                            <td> <?php echo $detail_po_cust[$y]['kode_produk'] ?> </td>
                            <td> <?php echo $detail_po_cust[$y]['nama_produk'] ?> </td>
                            <td> <?php echo $detail_po_cust[$y]['jumlah_produk'] ?> </td>
                            <td> <?php //echo $detail_po_cust[$y]['satuan'] ?> Pcs </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Dibuat Oleh</label>
            <div class="col-sm-9">
                <input type="text" name="dibuat_oleh" class="form-control"
                value="<?php echo $sales_order[0]['nama_karyawan'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Diterima Oleh</label>
            <div class="col-sm-9">
                <input type="text" name="diterima_oleh" class="form-control"
                value="<?php if($sales_order[0]['diterima_oleh'] != 0){
                    echo $sales_order[0]['nama_customer'];
                } else {
                    echo "Belum Diterima";
                } ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <!-- <a class="modal-with-form col-lg-2 btn btn-warning"
                title="Edit" href="#modaledit<?php echo $sales_order[0]['id_sales_order'] ?>">Edit</a> -->
            <a class="col-lg-2 btn btn-info"
                title="Print" href="<?php echo base_url() . 'PurchaseOrderCustomer/print_so/' . $sales_order[0]['id_purchase_order_customer'] ?>">
                Print</a>


            <!-- ******************************* MODAL EDIT ******************************* -->
            <!-- ************************************************************************** -->
            <div id='modaledit<?php echo $sales_order[0]['id_sales_order'] ?>' class="modal-block modal-block-md mfp-hide">
                <section class="panel">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/edit_so" method="post">
                        <header class="panel-heading">
                            <h2 class="panel-title">Edit Sales Order <?php echo $sales_order[0]['id_sales_order'] ?></h2>
                        </header>

                        <div class="panel-body">
                            <input type="hidden" name="id_po_cust" class="form-control" value="<?php echo $po_cust[0]['id_purchase_order_customer'] ?>" readonly>
                            <input type="hidden" name="id_sales_order" class="form-control" value="<?php echo $sales_order[0]['id_sales_order'] ?>" readonly>
                            
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Pengantaran<span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" name="tgl_pengantaran" class="form-control"
                                        value="<?php echo $sales_order[0]['tanggal_pengantaran'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Dibuat Oleh<span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="dibuat_oleh" id="customer" readonly>
                                        <?php for($a=0; $a<count($user); $a++){ ?>
                                            <option value="<?php echo $user[$a]['id_user'] ?>"
                                            <?php if($user[$a]['id_user'] == $sales_order[0]['dibuat_oleh']){ echo "selected"; } ?>>
                                                <?php echo $user[$a]['nama_karyawan']?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Status Penerimaan<span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="diterima_oleh" id="customer" required>
                                        <option value=" " <?php if($sales_order[0]['diterima_oleh'] == ""){ echo "selected"; } ?>> Belum Diterima </option>
                                        <option value="<?php $sales_order[0]['id_customer'] ?>" <?php if($sales_order[0]['diterima_oleh'] != ""){ echo "selected"; } ?>> Diterima </option>
                                    </select>
                                </div>
                            </div>
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
            <!-- ****************************** END MODAL EDIT **************************** -->
            <!-- ************************************************************************** -->


            <!-- ******************************* MODAL HAPUS ****************************** -->
            <!-- ************************************************************************** -->
            <div id='modalhapus<?php echo $sales_order[0]['id_sales_order']?>' class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/hapus_so" method="post">
                        <header class="panel-heading">
                            <h2 class="panel-title">Hapus Sales Order</h2>
                        </header>

                        <div class="panel-body" style="color: black">
                            <input type="hidden" name="id_po_cust" class="form-control" value="<?php echo $po_cust[0]['id_purchase_order_customer'] ?>" readonly>
                            <input type="hidden" name="id_sales_order" class="form-control" value="<?php echo $sales_order[0]['id_sales_order'] ?>" readonly>
                        
                            Apakah anda yakin akan menghapus Sales Order <b><?php echo $sales_order[0]['id_sales_order'] ?></b>?
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                    <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- ***************************** END MODAL HAPUS **************************** -->
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
    