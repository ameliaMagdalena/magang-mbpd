<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Persetujuan Purchase Order Supplier</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Persetujuan Purchase Order Supplier</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Persetujuan Purchase Order Supplier</h1>
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
                    <th>No. PO</th>
                    <th>Supplier</th>
                    <th>Tanggal PO</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-1"> POS-1 </td>
                    <td class="col-lg-2"> INOAC </td>
                    <td class="col-lg-3"> 10 Juni 2020 </td>
                    <td class="col-lg-3"> Menunggu persetujuan direktur </td>
                    <td class="col-lg-3">
                        <?php if($_SESSION['nama_departemen']=='Purchasing'){ //purchasing ?>
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit"></a>

                        <?php }else{ //direktur ?>
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail"></a>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                title="Konfirmasi" href="#"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                                title="Tolak" href="#"></a>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1"> POS-5 </td>
                    <td class="col-lg-2"> PT ABC </td>
                    <td class="col-lg-3"> 19 Juli 2020 </td>
                    <td class="col-lg-3"> Menunggu persetujuan direktur </td>
                    <td class="col-lg-3">
                        <?php if($_SESSION['nama_departemen']=='Purchasing'){ //purchasing ?>
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit"></a>

                        <?php }else{ //direktur ?>
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail"></a>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                title="Konfirmasi" href="#"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                                title="Tolak" href="#"></a>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- ****************************** MODAL DETAIL ****************************** -->
    <!-- ************************************************************************** -->
    <div id='modaldetail' class="modal-block modal-block-lg mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail PO Supplier</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>
                
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">No. PO</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"
                        value="POC-1" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tanggal PO</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"
                        value="1 Juni 2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Supplier</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control"
                        value="INOAC" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <input type="text" name="status" class="form-control"
                        value="Disetujui, belum ditindaklanjuti" readonly>
                    </div>
                </div>

                <div class="form-group mt-lg ">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Material</th>
                                    <th>Nama Material</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-1">1 </td>
                                    <td class="col-lg-2"> BRG23 </td>
                                    <td class="col-lg-3"> Foam </td>
                                    <td class="col-lg-1"> 2 </td>
                                    <td class="col-lg-1"> pc </td>
                                    <td class="col-lg-2"> 100.000</td>
                                    <td class="col-lg-2"> 1.500.000</td>
                                </tr>
                                <tr>
                                    <td class="col-1">2 </td>
                                    <td class="col-lg-2"> BRG16 </td>
                                    <td class="col-lg-3"> Benang </td>
                                    <td class="col-lg-1"> 100 </td>
                                    <td class="col-lg-1"> m </td>
                                    <td class="col-lg-2"> 100.000</td>
                                    <td class="col-lg-2"> 1.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
                
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Harga Sebelum Pajak</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control"
                        value="2.500.000" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">PPN</label>
                    <div class="col-sm-9">
                        <input type="text" name="status" class="form-control"
                        value="250.000" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Total harga</label>
                    <div class="col-sm-9">
                        <input type="text" name="status" class="form-control"
                        value="2.750.000" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" name="status" class="form-control"
                        value="-" readonly>
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
    