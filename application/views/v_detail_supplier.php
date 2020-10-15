<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Supplier</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Supplier</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<h1>Detail Supplier <?php echo $supplier[0]['nama_supplier']?></h1>
<hr>

<section class="panel">
    <div class="panel-body">
        <input type="hidden" name="id_supplier" class="form-control" value="<?php echo $supplier[0]['id_supplier']?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Nama Supplier</label>
            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control"
                value="<?php echo $supplier[0]['nama_supplier']?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">E-mail</label>
            <div class="col-sm-9">
                <input type="email" name="email_supplier" class="form-control"
                value="<?php echo $supplier[0]['email_supplier'] ?> " readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. Telp</label>
            <div class="col-sm-9">
                <input type="text" name="no_telp_supplier" class="form-control"
                value="<?php echo $supplier[0]['no_telp_supplier'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" name="alamat_supplier" class="form-control"
                value="<?php echo $supplier[0]['alamat_supplier'] ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <div class="col-sm-12">
                <h3 style="display: inline-block">Data Material</h3>
                <a class="modal-with-form btn btn-success pull-right" href="#modaltambahmaterial"> + Tambah Material</a>

                <!-- ********************** MODAL TAMBAH JENIS MATERIAL *********************** -->
                <!-- ************************************************************************** -->
                <div id='modaltambahmaterial' class="modal-block modal-block-primary mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Supplier/insert_detail" method="post">
                            <header class="panel-heading">
                                <h2 class="panel-title">Tambah Material</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_detail_sup" class="form-control" value="DSUP-<?php echo $jumlah_detail_sup+1?>" readonly>
                                <input type="hidden" name="id_supplier" class="form-control" value="<?php echo $supplier[0]['id_supplier']?>" readonly>
            
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Material<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="material" required>
                                            <?php for($a=0; $a<count($jenis_material); $a++){ ?>
                                            <optgroup label="<?php echo $jenis_material[$a]['nama_jenis_material'] ?>">
                                                <?php for($x=0; $x<count($sub_jenis); $x++){ 
                                                    if ($jenis_material[$a]['id_jenis_material'] == $sub_jenis[$x]['id_jenis_material']){ ?>
                                                    
                                                    <option value="<?php echo $sub_jenis[$x]['id_sub_jenis_material'] ?>">
                                                        <?php echo $sub_jenis[$x]['kode_sub_jenis_material'] . " - " . $sub_jenis[$x]['nama_jenis_material'] . ' ' . $sub_jenis[$x]['nama_sub_jenis_material'] ?>
                                                    </option>
                                                <?php }} ?>?

                                            </optgroup>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Harga Material<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="harga" class="form-control"
                                        placeholder="Harga Material" required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <div class="col-sm-12">
                                        <small class="pull-right"> Jenis material baru dapat ditambahkan melalui menu Master Data Jenis Material </small>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" id="tambah" class="btn btn-primary" value="Tambahkan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>

                <br>
                <br>

                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        for($y=0 ; $y<count($detail_sup); $y++){
                    ?>
                        <tr>
                            <td class="col-lg-4">
                                <?php for($b=0; $b<count($jenis_material); $b++){ 
                                    if ($jenis_material[$b]['id_jenis_material'] == $detail_sup[$y]['id_jenis_material']){
                                        echo $jenis_material[$b]['nama_jenis_material'] . ' ' . $detail_sup[$y]['nama_sub_jenis_material'];
                                    }
                                }?>
                            </td>
                            <td class="col-lg-2"> <?php echo $detail_sup[$y]['satuan_ukuran']?></td>
                            <td class="col-lg-2"> <?php echo $detail_sup[$y]['harga_material']?></td>
                            <td class="col-lg-4">
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaledit<?php echo $detail_sup[$y]['id_detail_supplier'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Delete" href="#modalhapus<?php echo $detail_sup[$y]['id_detail_supplier'] ?>"></a>
                                <!-- <a class="btn col-lg-12  btn-info" href="<?php //echo base_url() ?>user/log/<?php echo $user[$x]['id_user']?>"><i class='fa fa-file'></i> Log</a> -->
                            </td>
                        </tr>


                        <!-- ******************************** MODAL EDIT ****************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modaledit<?php echo $detail_sup[$y]['id_detail_supplier']?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Supplier/edit_detail_supplier" method="post">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Edit Data Material</h2>
                                    </header>

                                    <div class="panel-body">
                                        <input type="hidden" name="id_detail_sup" class="form-control" value="<?php echo $detail_sup[$y]['id_detail_supplier']?>" readonly>
                                        <input type="hidden" name="id_supplier" class="form-control" value="<?php echo $supplier[0]['id_supplier']?>" readonly>
                                        
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Material</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="sub_jenis" class="form-control"
                                                value="<?php echo $detail_sup[$y]['nama_jenis_material'] . ' ' . $detail_sup[$y]['nama_sub_jenis_material']?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Satuan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="satuan" class="form-control"
                                                value="<?php echo $detail_sup[$y]['satuan_ukuran'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Harga</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="harga" class="form-control"
                                                value="<?php echo $detail_sup[$y]['harga_material'] ?>">
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
                        <div id='modalhapus<?php echo $detail_sup[$y]['id_detail_supplier']?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Supplier/hapus_detail_supplier" method="post">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Hapus Data Customer</h2>
                                    </header>

                                    <div class="panel-body" style="color: black">
                                        <input type="hidden" name="id_supplier" class="form-control" value="<?php echo $supplier[0]['id_supplier']?>" readonly>
                                        <input type="hidden" name="id_detail_sup" class="form-control" value="<?php echo $detail_sup[$y]['id_detail_supplier']?>" readonly>
                                        Apakah anda yakin akan menghapus material <?php echo $detail_sup[$y]['nama_sub_jenis_material']?>?
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
                        <!-- ***************************** END MODAL HAPUS **************************** -->
                        <!-- ************************************************************************** -->

                    <?php } ?>
                    </tbody>
                </table>
            </div>
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
