<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data PO SEMENTARA</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data PO SEMENTARA</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
            href="#modaltambah">+ PO</a>
        <br><br>

        <header class="panel-heading">
            <h2 class="panel-title">Data Tetapan</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id PO</th>
                        <th>Tanggal PO</th>
                        <th>Tanggal Penerimaan</th>
                        <th>Status PO</th>
                        <th>ID Customer</th>
                        <th>Produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($po as $x){ 

                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $x->id_PO; ?></td>
                            <td><?= $x->tanggal_PO;?></td>
                            <td><?= $x->tanggal_penerimaan;?></td>
                            <td><?= $x->status_PO;?></td>
                            <td><?= $x->id_customer;?></td>
                            <td>
                                <?php foreach($detpo as $y){
                                    if($y->id_PO == $x->id_PO){?>
                                <p><?= $y->id_detail_produk ." | ".$y->jumlah_produk ." produk"?></p>
                                <?php }}?>
                            </td>
                        </tr>
                    <?php 
                    $no++;
                    ?>

                    <?php
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>

<div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
    <form method="POST" action="<?= base_url()?>POS/tambah_PO"> 
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Tambah PO</h2>
            </header>

            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Tanggal Penerimaan</label>
                    <div class="col-sm-7">
                        <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" required class="form-control">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">ID Customer</label>
                    <div class="col-sm-7">
                        <input type="text" name="id_customer" id="id_customer" required class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Produk 1</label>
                    <div class="col-sm-7">
                        <input type="text" name="produk1" id="produk1"  class="col-sm-5">
                        <input type="text" name="jumlah_produk1" id="jumlah_produk1" class="col-sm-2">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Produk 2</label>
                    <div class="col-sm-7">
                        <input type="text" name="produk2" id="produk2"  class="col-sm-5">
                        <input type="text" name="jumlah_produk2" id="jumlah_produk2" class="col-sm-2">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Produk 3</label>
                    <div class="col-sm-7">
                        <input type="text" name="produk3" id="produk3"  class="col-sm-5">
                        <input type="text" name="jumlah_produk3" id="jumlah_produk3" class="col-sm-2">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Produk 4</label>
                    <div class="col-sm-7">
                        <input type="text" name="produk4" id="produk4"  class="col-sm-5">
                        <input type="text" name="jumlah_produk4" id="jumlah_produk4" class="col-sm-2">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Produk 5</label>
                    <div class="col-sm-7">
                        <input type="text" name="produk5" id="produk5"  class="col-sm-5">
                        <input type="text" name="jumlah_produk5" id="jumlah_produk5" class="col-sm-2">
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <input type="submit" class="btn btn-primary" value="Save">
                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Cancel</button>
                    </div>
                </div>
            </footer>
        </section>
    </form>
</div>
<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->


<script>
    function reload() {
        location.reload();
    }
</script>





    