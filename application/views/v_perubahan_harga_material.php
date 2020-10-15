<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perubahan Harga Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perubahan Harga Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Perubahan Harga Material</h1>
<hr>
<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Data Jenis Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Jenis Material</th>
                    <th>Supplier</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="col-1"><?php //echo $x+1?> 1</td>
                        <td class="col-lg-3"><?php //echo $material[$x]['email_material']?>REB55</td>
                        <td class="col-lg-3"><?php //echo $material[$x]['nama_departemen']?>INOAC</td>
                        <?php if ($status == 0){?>
                            <td class="col-lg-2"><?php //echo $material[$x]['nama_departemen']?>Menunggu Persetujuan</td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?php //echo $material[$x]['id_material'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaledit<?php //echo $user[$x]['id_user'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Hapus" href="#modalhapus<?php //echo $user[$x]['id_user'] ?>"></a>
                            </td>
                        <?php } else  if ($status == 1){?>
                            <td class="col-lg-2"><?php //echo $material[$x]['nama_departemen']?>Selesai</td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?php //echo $material[$x]['id_material'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaledit<?php //echo $user[$x]['id_user'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Hapus" href="#modalhapus<?php //echo $user[$x]['id_user'] ?>"></a>
                            </td>
                        <?php } else{?>
                            <td class="col-lg-2"><?php //echo $material[$x]['nama_departemen']?>Batal</td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?php //echo $material[$x]['id_material'] ?>"></a>
                                <!-- <a class="modal-with-form col-lg-3 btn btn-info fa fa-pencil-square-o"
                                    title="Log" href="#<?php //echo $user[$x]['id_user'] ?>"></a> -->
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Hapus" href="#modalhapus<?php //echo $user[$x]['id_user'] ?>"></a>
                            </td>
                        <?php } ?>
                    </tr>


                    <!-- ****************************** MODAL DETAIL ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modaldetail<?php //echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Detail Perubahan Harga Material</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_material" class="form-control" value="<?php //echo $material[$x]['id_material']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Jenis Material</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jenis" class="form-control"
                                        value="<?php //echo $material[$x]['email_material'] ?>REB55" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="satuan" class="form-control"
                                        value="<?php //echo $material[$x]['nama_departemen'] ?>INOAC" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Harga Sebelum</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                        value="<?php //echo $material[$x]['nama_jabatan'] ?> Rp 100.000" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Harga Sesudah</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                        value="<?php //echo $material[$x]['nama_jabatan'] ?> Rp 110.000" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                        value="<?php //echo $material[$x]['nama_jabatan'] ?> Menunggu persetujuan direktur" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                        value="<?php //echo $material[$x]['nama_jabatan'] ?> - " readonly>
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



                    <!-- ******************************* MODAL EDIT ******************************* -->
                    <!-- ************************************************************************** -->
                    <div id='modaledit<?php //echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Edit Data Perubahan Harga Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_material" class="form-control" value="<?php //echo $material[$x]['id_material']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Supplier</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?php //echo $material[$x]['nama_material']?>INOAC" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?php //echo $material[$x]['nama_material']?>REB55" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Harga Sebelum</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="jumlah_stok" class="form-control"
                                            value="<?php //echo $material[$x]['nama_jabatan'] ?>100.000" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Harga Sesudah</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="jumlah_stok" class="form-control"
                                            value="<?php //echo $material[$x]['nama_jabatan'] ?>110.000">
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="jumlah_stok" class="form-control"
                                            value="<?php //echo $material[$x]['nama_jabatan'] ?> Menunggu persetujuan direktur">
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Keterangan</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="keterangan" class="form-control"
                                            value="<?php //echo $material[$x]['nama_jabatan'] ?> - ">
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <!-- ***************************** END MODAL EDIT ***************************** -->
                    <!-- ************************************************************************** -->


                    <!-- ******************************* MODAL HAPUS ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modalhapus<?php //echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Hapus Data Perubahan Harga Material</h2>
                                </header>

                                <div class="panel-body" style="color: black">
                                    Apakah anda yakin akan menghapus data perubahan harga material <?php //echo $material[$x]['nama_material']?>REB55?
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-danger" value="Hapus">
                                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <!-- ***************************** END MODAL HAPUS ***************************** -->
                    <!-- *************************************************************************** -->


                    <!-- ******************************* MODAL EDIT ******************************* -->
                    <!-- ************************************************************************** -->
                    <div id='modaledit1<?php //echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Edit Data Jenis Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_material" class="form-control" value="<?php //echo $material[$x]['id_material']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Supplier</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?php //echo $material[$x]['nama_material']?> Foam" >
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?php //echo $material[$x]['nama_material']?> Foam" >
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Satuan Ukuran</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="satuan" class="form-control"
                                            value="<?php //echo $material[$x]['nama_material']?> pc" >
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Minimal Stok</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="min_stok" class="form-control"
                                            value="<?php //echo $material[$x]['nama_material']?> 5" >
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Maksimal Stok</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="max_stok" class="form-control"
                                            value="<?php //echo $material[$x]['nama_material']?> 20" >
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <!-- ***************************** END MODAL EDIT ***************************** -->
                    <!-- ************************************************************************** -->

                <?php //}} ?>
            </tbody>
        </table>
    </div>
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
