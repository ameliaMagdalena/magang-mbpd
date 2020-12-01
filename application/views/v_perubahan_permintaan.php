<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perubahan Permintaan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perubahan Permintaan</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->


<!-- ------------------------------------------ BELUM DITINJAU --------------------------------------- -->
<?php if($status == '0'){ ?>
<h1>Perubahan Permintaan - Belum Ditinjau</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Permintaan Material - Belum Ditinjau</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <!-- <th class="col-lg-2">Kode Permintaan Material</th> -->
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Kode Permintaan</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Jumlah Sebelum</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Jumlah Sesudah</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($perubahan) ; $x++){
                        if ($status == 0 || $status == 4){ 
                            if($perubahan[$x]['status'] == 0){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                        <input type="hidden" id="idd<?= $x ?>" value="<?= $perubahan[$x]['id_perubahan_permintaan'] ?>">
                    </td>
                    <td><?= $perubahan[$x]['id_permintaan_material'] ?>
                        <input type="hidden" id="id2<?= $x ?>" value="<?= $perubahan[$x]['id_permintaan_material'] ?>">
                    </td>
                    <td><?= $perubahan[$x]['jumlah_minta_lama'] ?></td>
                    <td><?= $perubahan[$x]['jumlah_minta_baru'] ?>
                        <input type="hidden" id="jumla<?= $x ?>" value="<?= $perubahan[$x]['jumlah_minta_baru'] ?>">
                    </td>
                    <td>Belum Ditinjau / Menunggu Persetujuan </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $perubahan[$x]['id_permintaan_material'] ?>"></a>
                        
                        <button type="button" class="konfirmz col-lg-3 btn btn-success fa fa-check" 
                            value="<?php echo $x //$permintaan_material[$x]['id_permintaan_material'] ?>" title="Konfirmasi"></button>
                        <button type="button" class="tolakz col-lg-3 btn btn-danger fa fa-times" 
                            value="<?php echo $x ?>" title="Tolak"></button>
                    </td>
                </tr>

                <!-- ****************************** MODAL SETUJU ***************************** -->
                <!-- ************************************************************************** -->
                    <div class="modal" id="setuju" role="dialog">
                        <div class="modal-dialog modal-xl" style="width:50%">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanPermintaan/setuju" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b>Menyetujui Perubahan Permintaan</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idnyaa" id="idnyaa" class="form-control" value="" readonly> <!-- id perubahan -->
                                        <input type="hidden" name="idmintaa" id="idmintaa" class="form-control" value="" readonly> <!-- id permintaan -->
                                        <input type="hidden" name="status" class="form-control" value="1" readonly>
                                        <input type="hidden" name="jumlahnyaa" id="jumlahnyaa" class="form-control" value="" readonly>  <!-- jlh sesudah -->
                                        <div id="isisetuju"></div>
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-primary" value="Ya">
                                                <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- ***************************** END MODAL SETUJU *************************** -->
                <!-- ************************************************************************** -->

                <!-- ****************************** MODAL TOLAK ***************************** -->
                <!-- ************************************************************************ -->
                <div class="modal" id="tolak" role="dialog">
                        <div class="modal-dialog modal-xl" style="width:50%">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanMaterial/setuju" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b>Menolak Permintaan Material</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idnyaa" id="idnya" class="form-control" value="" readonly>
                                        <input type="hidden" name="status" class="form-control" value="4" readonly>
                                        <div id="isitolak"></div>
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-primary" value="Ya">
                                                <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- ***************************** END MODAL TOLAK *************************** -->
                <!-- ************************************************************************* -->
                
                <?php $no=$no+1;} } } ?>
            </tbody>
        </table>
    </div>
</section>



<!-- ----------------------------------------------- SETUJU ----------------------------------------- -->
<?php } else if($status == '1'){ ?>
<h1>Perubahan Permintaan - Disetujui</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Perubahan Permintaan - Disetujui</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <!-- <th class="col-lg-2">Kode Permintaan Material</th> -->
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Produk</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Ketersediaan</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($perubahan) ; $x++){
                        if ($status == 1 || $status == 4){ 
                            if($perubahan[$x]['status'] == 1){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $perubahan[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td> *********** </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        <!-- <a class="col-lg-3 btn btn-info fa fa-file-text" title="Perencanaan" 
                            href="<?php echo base_url() . 'PerencanaanMaterial/proses_perencanaan/' . $permintaan_material[$x]['id_permintaan_material']?>"></a> -->
                        <a class="col-lg-3 btn btn-info fa fa-file-text" title="Perencanaan"
                            href="<?php echo base_url() . 'PermintaanMaterial/proses_perencanaan/' . $permintaan_material[$x]['id_permintaan_material']?>"></a>
                        <button type="button" class="deletez col-lg-3 btn btn-danger fa fa-trash-o" 
                            value="<?php echo $x ?>" title="Hapus"></button>
                    </td>
                </tr>

                <?php $no=$no+1; } } } ?>
            </tbody>
        </table>
    </div>

    <!-- ****************************** MODAL DETAIL ****************************** -->
    <!-- ************************************************************************** -->
    <div id='modaldetail' class="modal-block modal-block-lg mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Permintaan Material</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>
                
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tanggal Permintaan</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"
                        value="21 Juli 2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Produk</label>
                    <div class="col-sm-9">
                        <input type="text" name="jabatan" class="form-control"
                        value="Compact Mattress" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Jumlah Produk</label>
                    <div class="col-sm-9">
                        <input type="text" name="jabatan" class="form-control"
                        value="120" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tanggal Produksi</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"
                        value="29 Juli 2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <input type="text" name="jabatan" class="form-control"
                        value="Proses Perencanaan" readonly>
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
                                    <th>Cons</th>
                                    <th>Needs</th>
                                    <th>Satuan</th>
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-1">1 </td>
                                    <td class="col-lg-3"> MAT123 </td>
                                    <td class="col-lg-3"> Reb 55 </td>
                                    <td class="col-lg-1"> 0.114 </td>
                                    <td class="col-lg-1"> 18.24 </td>
                                    <td class="col-lg-1"> m3 </td>
                                    <td class="col-lg-2"> Stok kurang</td>
                                </tr>
                                <tr>
                                    <td class="col-1">2 </td>
                                    <td class="col-lg-3"> MAT109 </td>
                                    <td class="col-lg-3"> Benang </td>
                                    <td class="col-lg-1"> 100 </td>
                                    <td class="col-lg-1"> 16000 </td>
                                    <td class="col-lg-1"> meter </td>
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




    <!-- ******************************** MODAL EDIT ****************************** -->
    <!-- ************************************************************************** -->
    <div id='modaledit' class="modal-block modal-block-lg mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Edit Permintaan Material</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>
                
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Produk</label>
                    <div class="col-sm-9">
                        <input type="text" name="jabatan" class="form-control"
                        value="Compact Mattress" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Jumlah Produk</label>
                    <div class="col-sm-9">
                        <input type="number" name="jabatan" class="form-control"
                        value="120">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tanggal Produksi</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"
                        value="29 Juli 2020">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control"
                                value="Belum Direncanakan" readonly>
						</select>
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
                                    <th>Cons</th>
                                    <th>Needs</th>
                                    <th>Satuan</th>
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-1">1 </td>
                                    <td class="col-lg-3"> MAT123 </td>
                                    <td class="col-lg-3"> Reb 55 </td>
                                    <td class="col-lg-1"> 0.114 </td>
                                    <td class="col-lg-1"> 18.24 </td>
                                    <td class="col-lg-1"> m3 </td>
                                    <td class="col-lg-2"> Stok kurang</td>
                                </tr>
                                <tr>
                                    <td class="col-1">2 </td>
                                    <td class="col-lg-3"> MAT109 </td>
                                    <td class="col-lg-3"> Benang </td>
                                    <td class="col-lg-1"> 100 </td>
                                    <td class="col-lg-1"> 16000 </td>
                                    <td class="col-lg-1"> meter </td>
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
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <!-- ****************************** END MODAL EDIT **************************** -->
    <!-- ************************************************************************** -->






    <!-- ******************************** MODAL EDIT ****************************** -->
    <!-- ************************************************************************** -->
    <div id='modaledit2' class="modal-block modal-block-lg mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Edit Permintaan Material</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>
                
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Produk</label>
                    <div class="col-sm-9">
                        <input type="text" name="jabatan" class="form-control"
                        value="Compact Mattress" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Jumlah Produk</label>
                    <div class="col-sm-9">
                        <input type="number" name="jabatan" class="form-control"
                        value="120">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tanggal Produksi</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"
                        value="29 Juli 2020">
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control"
                                value="Proses Perencanaan" readonly>
						</select>
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
                                    <th>Cons</th>
                                    <th>Needs</th>
                                    <th>Satuan</th>
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-1">1 </td>
                                    <td class="col-lg-3"> MAT123 </td>
                                    <td class="col-lg-3"> Reb 55 </td>
                                    <td class="col-lg-1"> 0.114 </td>
                                    <td class="col-lg-1"> 18.24 </td>
                                    <td class="col-lg-1"> m3 </td>
                                    <td class="col-lg-2"> Stok kurang</td>
                                </tr>
                                <tr>
                                    <td class="col-1">2 </td>
                                    <td class="col-lg-3"> MAT109 </td>
                                    <td class="col-lg-3"> Benang </td>
                                    <td class="col-lg-1"> 100 </td>
                                    <td class="col-lg-1"> 16000 </td>
                                    <td class="col-lg-1"> meter </td>
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
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <!-- ****************************** END MODAL EDIT **************************** -->
    <!-- ************************************************************************** -->






    <!-- ******************************* MODAL BELI ******************************* -->
    <!-- ************************************************************************** -->
    <div id='modalbeli' class="modal-block modal-block-md mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Request Pembelian Material</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>

                <div class="form-group mt-lg">
                    <header class="panel-heading">
                        <h2 class="panel-title">Pilih Material</h2>
                    </header>

                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Kode Material</th>
                                    <th>Nama Material</th>
                                    <th>Needs</th>
                                    <th>Sisa Stok</th>
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
                                    <td class="col-lg-2"> MAT123 </td>
                                    <td class="col-lg-3"> Reb 55 </td>
                                    <td class="col-lg-1"> 18.24 </td>
                                    <td class="col-lg-1"> 15 </td>
                                    <td class="col-lg-1"> m3 </td>
                                    <td class="col-lg-2"> Stok kurang</td>
                                </tr>
                                <tr>
                                    <td class="col-2">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" id="checkboxExample2">
                                            <label for="checkboxExample2"></label>
                                        </div>
                                    </td>
                                    <td class="col-lg-2"> MAT109 </td>
                                    <td class="col-lg-3"> Benang </td>
                                    <td class="col-lg-1"> 16000 </td>
                                    <td class="col-lg-1"> 20000 </td>
                                    <td class="col-lg-1"> meter </td>
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
                        <button type="button" class="btn btn-primary"
                            href="<?php echo base_url() . 'v_pembelian_material_baru' ?>">
                            Request</button>
                        <button type="button" class="btn btn-default modal-dismiss">
                            Batal</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <!-- ****************************** END MODAL BELI **************************** -->
    <!-- ************************************************************************** -->
</section>



<!-- ----------------------------------------------- TIDAK SETUJU ----------------------------------------- -->
<?php }else if($status == '2'){ ?>
<h1>Perubahan Permintaan - Tidak Disetujui</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Perubahan Permintaan - Tidak Disetujui</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Permintaan</th>
                    <th>Tanggal Produksi</th>
                    <th>Produk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 2 || $status == 4){ 
                            if($permintaan_material[$x]['status_permintaan'] == 2){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td>Selesai </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        <button type="button" class="deletez col-lg-3 btn btn-danger fa fa-trash-o" 
                            value="<?php echo $x ?>" title="Hapus"></button>
                    </td>
                </tr>
                <?php $no=$no+1;}}} ?>
            </tbody>
        </table>
    </div>
</section>




<!-- ----------------------------------------------- BATAL ----------------------------------------- -->
<?php }else if($status == '3'){ ?>
<h1>Perubahan Permintaan - Batal </h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Perubahan Permintaan - Batal </h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Permintaan</th>
                    <th>Tanggal Produksi</th>
                    <th>Produk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 3 || $status == 4){ 
                            if($permintaan_material[$x]['status_permintaan'] == 3 || $permintaan_material[$x]['status_permintaan'] == 4){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td><?php echo "Batal" ?></td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        <button type="button" class="deletez col-lg-3 btn btn-danger fa fa-trash-o" 
                            value="<?php echo $x ?>" title="Hapus"></button>
                    </td>
                </tr>
                <?php $no=$no+1;}}} ?>
            </tbody>
        </table>
    </div>
</section>


<?php } ?>



<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>

<script>
    $('.konfirmz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();
        var id2     = $("#id2"+no).val();
        var jumla   = $("#jumla"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PerubahanPermintaan/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan menyetujui Perubahan dari Permintaan Material dengan No. Form <b>'+respond['ubah'][0]['id_permintaan_material']+'</b>?';
                $("#isisetuju").html($isi);
                $("#idnyaa").val(id);
                $("#idmintaa").val(id2);
                $("#jumlahnyaa").val(jumla);
                $("#setuju").modal();
            }
        }); 
    });
</script>

<script>
    $('.tolakz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 
                    //'<input type="hidden" name="id_permintaan_material" class="form-control" value="'+respond['permat'][0]['id_permintaan_material']+'" readonly>'+
                    //'<input type="hidden" name="status" class="form-control" value="1" readonly>'+
                    'Anda akan menolak Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';

                $("#isitolak").html($isi);
                $("#idnya").val(id);
                $("#tolak").modal();
            }
        }); 
    });
</script>

<script>
    $('.batalz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan membatalkan Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';
                $("#isibatal").html($isi);
                $("#idbatal").val(id);
                $("#batal").modal();
            }
        }); 
    });
</script>

<script>
    $('.selesaiz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan menyelesaikan Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';
                $("#isiselesai").html($isi);
                $("#idselesai").val(id);
                $("#selesai").modal();
            }
        }); 
    });
</script>

<script>
    function reload() {
    location.reload();
    }
</script>