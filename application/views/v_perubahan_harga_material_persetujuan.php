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
                <?php for($x=0; $x<count($ubah); $x++){ 
                    if($ubah[$x]['status_persetujuan']==0){ ?>
                    <tr>
                        <td><?php echo $ubah[$x]['kode_sub_jenis_material'] . " - " . $ubah[$x]['nama_jenis_material'] . " " . $ubah[$x]['nama_sub_jenis_material']?></td>
                        <td><?php echo $ubah[$x]['nama_supplier']?></td>
                        <td>Menunggu Persetujuan</td>
                        <td>
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                title="Setujui" href="#modalsetuju<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                                title="Tolak" href="#modaltolak<?php echo $ubah[$x]['id_perubahan_harga'] ?>"></a>
                        </td>
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
                    <!-- ******************************* MODAL SETUJU ***************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modalsetuju<?php echo $ubah[$x]['id_perubahan_harga']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanHargaMaterial/setuju" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Menyetujui Perubahan Harga Material</h2>
                                </header>
                                
                                <input type="hidden" name="idnya" value="<?php echo $ubah[$x]['id_perubahan_harga']?>">
                                <input type="hidden" name="idsup" value="<?php echo $ubah[$x]['id_detail_supplier']?>">
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
                    <div id='modaltolak<?php echo $ubah[$x]['id_perubahan_harga']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanHargaMaterial/setuju" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Menolak Perubahan Harga Material</h2>
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

                <?php } }?>
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
