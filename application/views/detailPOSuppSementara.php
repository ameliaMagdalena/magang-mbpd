<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pembelian Material Baru</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pembelian Material Baru</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Detail Data PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_user" class="form-control" value="<?php //echo $user[$x]['id_user']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Nomor PO</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control"
                                        value="<?php //echo $user[$x]['nama_user']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tanggal PO</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control"
                                        value="<?php //echo $user[$x]['nama_user']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"
                                        value="<?php //echo $user[$x]['email_user'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Total Harga</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dept" class="form-control"
                                        value="<?php //echo $user[$x]['nama_departemen'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jabatan" class="form-control"
                                        value="<?php //echo $user[$x]['nama_jabatan'] ?>" readonly>
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
                                                    <td class="col-2">1 <?php //echo $x+1?></td>
                                                    <td class="col-lg-3"> MAT123 <?php //echo $user[$x]['nama_user']?></td>
                                                    <td class="col-lg-3"> Foam <?php //echo $user[$x]['email_user']?></td>
                                                    <td class="col-lg-2"> 15 <?php //echo $user[$x]['nama_departemen']?></td>
                                                    <td class="col-lg-3"> pc <?php //echo $user[$x]['nama_user']?></td>
                                                    <td class="col-lg-3"> Rp 100.000 <?php //echo $user[$x]['email_user']?></td>
                                                    <td class="col-lg-2"> Rp 1.500.000<?php //echo $user[$x]['nama_departemen']?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="col-sm-9 float-right">
                                            Total Bayar : Rp 1.500.000
                                            <br>
                                            Dibuat oleh : PPIC Material
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