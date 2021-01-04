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
                    <th style="text-align:center" class="col-lg-4">Jenis Material</th>
                    <th style="text-align:center" class="col-lg-3">Supplier</th>
                    <th style="text-align:center" class="col-lg-2">Status</th>
                    <th style="text-align:center" class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php for($x=0; $x<count($ubah); $x++){ ?>
                    <tr>
                        <td><?php echo $ubah[$x]['kode_sub_jenis_material'] . " - " . $ubah[$x]['nama_jenis_material'] . " " . $ubah[$x]['nama_sub_jenis_material']?></td>
                        <td><?php echo $ubah[$x]['nama_supplier']?></td>
                        <?php if ($status == 0){?>
                            <td>Menunggu Persetujuan</td>
                            <td>
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaledit<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Hapus" href="#modalhapus<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>

                                <?php if($_SESSION['nama_departemen']=='Management' && $_SESSION['nama_jabatan']=='Direktur'){ ?>
                                    <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                        title="Setujui" href="#modalsetuju<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                                    <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                        title="Tolak" href="#modaltolak<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                                <?php } ?>
                            </td>
                        <?php } else  if ($status == 1){?>
                            <td class="col-lg-2">Disetujui</td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                            </td>
                        <?php } else if ($status == 2){?>
                            <td class="col-lg-2">Ditolak</td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                            </td>
                        <?php } else{?>
                            <td class="col-lg-2">
                                <?php if($ubah[$x]['status_persetujuan']==0){
                                    echo "Menunggu Persetujuan";
                                } else if($ubah[$x]['status_persetujuan']==1){
                                    echo "Disetujui";
                                } else{
                                    echo "Ditolak";
                                } ?>
                            </td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Hapus" href="#modalhapus<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                            </td>
                        <?php } ?>
                    </tr>


                    <!-- ****************************** MODAL DETAIL ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modaldetail<?php echo $ubah[$x]['id_perubahan_harga']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Detail Perubahan Harga Material</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_material" class="form-control" value="<?php echo $ubah[$x]['id_perubahan_harga']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Jenis Material</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jenis" class="form-control"
                                        value="<?php echo $ubah[$x]['kode_sub_jenis_material'] . " - " . $ubah[$x]['nama_jenis_material'] . " " . $ubah[$x]['nama_sub_jenis_material'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="satuan" class="form-control"
                                        value="<?php echo $ubah[$x]['nama_supplier'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Harga Sebelum</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                        value="<?php echo $ubah[$x]['harga_sebelum'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Harga Sesudah</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                        value="<?php echo $ubah[$x]['harga_sesudah'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                            value="<?php if($ubah[$x]['status_persetujuan']==0){
                                                echo "Menunggu Persetujuan";
                                            } else if($ubah[$x]['status_persetujuan']==1){
                                                echo "Disetujui";
                                            } else{
                                                echo "Ditolak";
                                            } ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah_stok" class="form-control"
                                        value="<?php echo $ubah[$x]['keterangan'] ?> " readonly>
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
                    <div id='modaledit<?php echo $ubah[$x]['id_perubahan_harga']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanHargaMaterial/edit" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Edit Data Perubahan Harga Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_perubahan" class="form-control" value="<?php echo $ubah[$x]['id_perubahan_harga']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Supplier</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="supplier" class="form-control"
                                            value="<?php echo $ubah[$x]['nama_supplier']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="material" class="form-control"
                                            value="<?php echo $ubah[$x]['kode_sub_jenis_material'] . " - " . $ubah[$x]['nama_jenis_material'] . " " . $ubah[$x]['nama_sub_jenis_material']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Harga Sebelum</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="harga_sebelum" class="form-control"
                                            value="<?php echo $ubah[$x]['harga_sebelum'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Harga Sesudah</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="harga_sesudah" class="form-control"
                                            value="<?php echo $ubah[$x]['harga_sesudah'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="status" class="form-control"
                                            value="Menunggu Persetujuan" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Keterangan</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="keterangan" class="form-control"
                                            value="<?php echo $material[$x]['keterangan'] ?>">
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
                    <div id='modalhapus<?php echo $ubah[$x]['id_perubahan_harga']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanHargaMaterial/hapus" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Hapus Data Perubahan Harga Material</h2>
                                </header>
                                
                                <input type="hidden" name="idnya" value="<?php echo $ubah[$x]['id_perubahan_harga']?>">
                                
                                <div class="panel-body" style="color: black">
                                    Apakah anda yakin akan menghapus data perubahan harga material 
                                    <?php echo $ubah[$x]['nama_jenis_material'] . " " . $ubah[$x]['nama_sub_jenis_material']?>
                                    oleh supplier <?php echo $ubah[$x]['nama_supplier'] ?>?
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

                    <!-- ******************************* MODAL SETUJU ***************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modalhapus<?php echo $ubah[$x]['id_perubahan_harga']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanHargaMaterial/setuju" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Menyetujui Perubahan Harga Material</h2>
                                </header>
                                
                                <input type="hidden" name="idnya" value="<?php echo $ubah[$x]['id_perubahan_harga']?>">
                                <input type="hidden" name="status" value="1">
                                
                                <div class="panel-body" style="color: black">
                                    Anda akan menyetujui perubahan harga material 
                                    <?php echo $ubah[$x]['nama_jenis_material'] . " " . $ubah[$x]['nama_sub_jenis_material']?>
                                    oleh supplier <?php echo $ubah[$x]['nama_supplier'] ?>.
                                    <br>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Harga Sebelum</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="harga_sebelum" class="form-control"
                                            value="<?php echo $ubah[$x]['harga_sebelum'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Harga Sesudah</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="hargabaru" class="form-control"
                                            value="<?php echo $ubah[$x]['harga_sesudah'] ?>" readonly>
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
                    <!-- ***************************** END MODAL SETUJU **************************** -->
                    <!-- *************************************************************************** -->

                    <!-- ******************************* MODAL TOLAK ***************************** -->
                    <!-- ************************************************************************* -->
                    <div id='modalhapus<?php echo $ubah[$x]['id_perubahan_harga']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanHargaMaterial/setuju" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Menyetujui Perubahan Harga Material</h2>
                                </header>
                                
                                <input type="hidden" name="idnya" value="<?php echo $ubah[$x]['id_perubahan_harga']?>">
                                <input type="hidden" name="status" value="2">
                                
                                <div class="panel-body" style="color: black">
                                    Anda akan menolak perubahan harga material 
                                    <?php echo $ubah[$x]['nama_jenis_material'] . " " . $ubah[$x]['nama_sub_jenis_material']?>
                                    oleh supplier <?php echo $ubah[$x]['nama_supplier'] ?>.
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-danger" value="Tolak">
                                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <!-- ***************************** END MODAL TOLAK **************************** -->
                    <!-- ************************************************************************** -->

                <?php } ?>
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
