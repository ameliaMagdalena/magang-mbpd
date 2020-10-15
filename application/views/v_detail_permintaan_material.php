<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perencanaan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perencanaan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Detail Permintaan Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Detail Permintaan Material <?php echo $permintaan_material[0]['id_permintaan_material'] ?></h2>
    </header>

    <div class="panel-body">
        <input type="hidden" name="id_po_cust" class="form-control" value="<?php echo $permintaan_material[0]['id_permintaan_material'] ?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. Form Permintaan Material</label>
            <div class="col-sm-9">
                <input type="text" name="id_permintaan" class="form-control"
                value="<?php echo $permintaan_material[0]['id_permintaan_material'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Permintaan</label>
            <div class="col-sm-9">
                <input type="text" name="tgl_permintaan" class="form-control"
                value="<?php echo $permintaan_material[0]['tanggal_permintaan'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Produk</label>
            <div class="col-sm-9">
                <input type="text" name="produk" class="form-control"
                value="<?php echo $permintaan_material[0]['nama_produk'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Line</label>
            <div class="col-sm-9">
                <input type="text" name="line" class="form-control"
                value="<?php echo $permintaan_material[0]['nama_line'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Jumlah Produk</label>
            <div class="col-sm-9">
                <input type="text" name="produk" class="form-control"
                value="<?php echo $permintaan_material[0]['jumlah_minta'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Produksi</label>
            <div class="col-sm-9">
                <input type="text" name="tgl_produksi" class="form-control"
                value="<?php echo $permintaan_material[0]['tanggal_produksi'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <input type="text" name="status" class="form-control"
                value="<?php 
                    if($permintaan_material[0]['status_permintaan'] == 0){
                        echo "Belum Ditinjau/Menunggu Persetujuan";
                    } else if($permintaan_material[0]['status_permintaan'] == 1){
                        echo "Disetujui, Diproses";
                    } else if($permintaan_material[0]['status_permintaan'] == 2){
                        echo "Selesai";
                    }
                    else if($permintaan_material[0]['status_permintaan'] == 3){
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
                <h3 style="text-align: center">Material</h3>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Material</th>
                            <th>Nama Material</th>
                            <th>Cons</th>
                            <th>Needs</th>
                            <th>Satuan</th>
                            <th>Ketersediaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($y=0; $y<count($detail); $y++){
                            if($permintaan_material[0]['id_permintaan_material'] == $detail[$y]['id_permintaan_material']){?>
                        <tr>
                            <td> <?php echo $y+1 ?> </td>
                            <td> <?php echo $detail[$y]['kode_sub_jenis_material'] ?> </td>
                            <td> <?php echo $detail[$y]['nama_sub_jenis_material'] ?> </td>
                            <td> <?php echo $detail[$y]['jumlah_konsumsi'] ?> </td>
                            <td> <?php 
                                $produk = $detail[$y]['jumlah_minta'];
                                $cons = $detail[$y]['jumlah_konsumsi'];
                                $needs = $produk*$cons;
                                echo $needs;
                            ?></td>
                            <td> <?php echo $detail[$y]['satuan_keluar'] ?></td>
                            <td> <?php echo $detail[$y]['satuan_keluar'] ?></td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
        
        <div class="form-group mt-lg">
            
            <a class="col-lg-2 btn btn-warning"
                title="Print" href="<?php echo base_url() . 'PermintaanMaterial/print_permintaan/' . $permintaan_material[0]['id_purchase_order_customer'] ?>">
                Print</a>
            
            <?php if($permintaan_material[0]['status_permintaan'] != 2 ||$permintaan_material[0]['status_permintaan'] != 3 || $permintaan_material[0]['status_permintaan'] != 4){ ?>
                <a class="modal-with-form col-lg-2 btn btn-danger mr-1"
                    title="Batalkan" href="#modalbatal<?php echo $permintaan_material[0]['id_purchase_order_customer'] ?>">Batalkan</a>
            <?php } ?>


            <!-- ******************************* MODAL BATAL ****************************** -->
            <!-- ************************************************************************** -->
            <div id='modalbatal<?php echo $permintaan_material[0]['id_purchase_order_customer'] ?>' class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/batal_po" method="post">
                        <header class="panel-heading">
                            <h2 class="panel-title">Edit Data Material</h2>
                        </header>
                        <div class="panel-body" style="color: black">
                            <input type="hidden" name="id_po_customer" class="form-control" value="<?php echo $permintaan_material[0]['id_purchase_order_customer'] ?>" readonly>
                            Apakah anda yakin akan membatalkan PO Customer dengan No. PO <b><?php echo $permintaan_material[0]['id_purchase_order_customer'] ?></b>?

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
    