<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pembelian Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pembelian Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pembelian Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Data PO Supplier</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal PO</th>
                    <th>Supplier</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($status == 0){ ?>
                <tr>
                    <td class="col-2"> 1 <?php //echo $x+1?></td>
                    <td class="col-lg-3"> 10 Juni 2020 <?php //echo $material[$x]['nama_material']?></td>
                    <td class="col-lg-3"> INOAC <?php //echo $material[$x]['email_material']?></td>
                    <td class="col-lg-2"> Menunggu Konfirmasi Supplier <?php //echo $material[$x]['nama_departemen']?></td>
                    <td class="col-lg-4">
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-3 btn btn-success fa fa-check-circle"
                            title="Konfirmasi" href="#modaledit<?php //echo $material[$x]['id_material'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Delete" href="#modalhapus<?php //echo $material[$x]['id_material'] ?>"></a>
                        <a class="col-lg-3 btn btn-info fa fa-print" title="Print"></a>
                    </td>
                </tr>
                <tr>
                    <td class="col-2"> 1 <?php //echo $x+1?></td>
                    <td class="col-lg-3"> 10 Juni 2020 <?php //echo $material[$x]['nama_material']?></td>
                    <td class="col-lg-3"> INOAC <?php //echo $material[$x]['email_material']?></td>
                    <td class="col-lg-2"> Proses Pengambilan <?php //echo $material[$x]['nama_departemen']?></td>
                    <td class="col-lg-4">
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-calendar"
                            title="Jadwal Pengambilan" href="<?php //echo $material[$x]['id_material'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Delete" href="#modalhapus<?php //echo $material[$x]['id_material'] ?>"></a>
                        <a class="col-lg-3 btn btn-info fa fa-print" title="Print"></a>
                    </td>
                </tr>
            <?php }else if ($status == 1){?>
                <tr>
                    <td class="col-2"> 1 <?php //echo $x+1?></td>
                    <td class="col-lg-3"> 10 Juni 2020 <?php //echo $material[$x]['nama_material']?></td>
                    <td class="col-lg-3"> INOAC <?php //echo $material[$x]['email_material']?></td>
                    <td class="col-lg-2"> Selesai <?php //echo $material[$x]['nama_departemen']?></td>
                    <td class="col-lg-4">
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Delete" href="#modalhapus<?php //echo $material[$x]['id_material'] ?>"></a>
                        <a class="col-lg-3 btn btn-info fa fa-print" title="Print"></a>
                    </td>
                </tr>
            <?php } ?>
                <?php //}} ?>
            </tbody>
        </table>
    </div>

                    <!-- ****************************** MODAL DETAIL ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modaldetail' class="bd-example-modal-lg modal-block modal-block-lg mfp-hide">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Detail Data PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_material" class="form-control" value="<?php //echo $material[$x]['id_material']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tanggal PO</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control"
                                        value="10 Juni 2020<?php //echo $material[$x]['nama_material']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"
                                        value="INOAC <?php //echo $material[$x]['email_material'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Total Harga</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dept" class="form-control"
                                        value="Rp 1.500.000<?php //echo $material[$x]['nama_departemen'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jabatan" class="form-control"
                                        value="<?php //echo $material[$x]['nama_jabatan'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Daftar Material</label>
                                    <div class="col-sm-9">
                                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kode Material</th>
                                                    <th>Nama Material</th>
                                                    <th>Jumlah</th>
                                                    <th>Satuan</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Harga Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="col-1">1 <?php //echo $x+1?></td>
                                                    <td class="col-lg-2">MAT123 <?php //echo $material[$x]['nama_material']?></td>
                                                    <td class="col-lg-2">Foam <?php //echo $material[$x]['email_material']?></td>
                                                    <td class="col-lg-1">10 <?php //echo $material[$x]['nama_departemen']?></td>
                                                    <td class="col-lg-2">Pc<?php //echo $material[$x]['nama_material']?></td>
                                                    <td class="col-lg-2">Rp 150.000<?php //echo $material[$x]['email_material']?></td>
                                                    <td class="col-lg-2">Rp 1.500.000<?php //echo $material[$x]['nama_departemen']?></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-1">1 <?php //echo $x+1?></td>
                                                    <td class="col-lg-2">MAT124 <?php //echo $material[$x]['nama_material']?></td>
                                                    <td class="col-lg-2">Kain <?php //echo $material[$x]['email_material']?></td>
                                                    <td class="col-lg-1">1 <?php //echo $material[$x]['nama_departemen']?></td>
                                                    <td class="col-lg-2">Pc<?php //echo $material[$x]['nama_material']?></td>
                                                    <td class="col-lg-2">Rp 100.000<?php //echo $material[$x]['email_material']?></td>
                                                    <td class="col-lg-2">Rp 100.000<?php //echo $material[$x]['nama_departemen']?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="col-sm-9">
                                            <br>
                                            Total Bayar : Rp 1.600.000
                                            <br>
                                            Dibuat oleh :
                                        </div>
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