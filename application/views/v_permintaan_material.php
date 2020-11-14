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


<!-- ------------------------------------------ BELUM DITINJAU --------------------------------------- -->
<?php if($status == '0'){ ?>
<h1>Permintaan Material - Belum Ditinjau</h1>
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
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Produk</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 0 || $status == 3){ 
                            if($permintaan_material[$x]['status_permintaan'] == 0){
                ?>
                <tr>
                    <td> <?php echo $x+1 ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td>Belum Ditinjau / Menunggu Persetujuan </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        
                        <button type="button" class="konfirmz col-lg-3 btn btn-success fa fa-check" 
                            value="<?= $x;?>" title="Konfirmasi"></button>
                        

                        <!-- <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                            title="Konfirmasi" href="#modalkonfirmasi<?php echo $permintaan_material[$x]['id_permintaan_material'] ?>"></a> -->
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                            title="Tolak" href="#modaltolak<?php echo $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                    </td>
                </tr>

                <!-- ****************************** MODAL SETUJU ***************************** -->
                <!-- ************************************************************************** -->
 
                <!-- modal detail -->
                <div class="modal" id="setuju" role="dialog">
                    <div class="modal-dialog modal-xl" style="width:50%">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerencanaanMaterial/setuju" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>Menyetujui Permintaan Material</b></h4>
                                </div>
                                <div class="modal-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $permintaan_material[$x]['id_permintaan_material'] ?>" readonly>
                                    <input type="hidden" name="status" class="form-control" value="1" readonly>
                                    
                                    Anda akan menyetujui Permintaan Material dengan No. Form <b><?php echo $po_sup[$x]['id_permintaan_material'] ?></b>?
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
                
                <?php } } } ?>
            </tbody>
        </table>
    </div>
</section>



<!-- ----------------------------------------------- PERENCANAAN ----------------------------------------- -->
<?php } else if($status == '1'){ ?>
<h1>Proses Perencanaan Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Produk</h2>
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
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 1 || $status == 3){ 
                            if($permintaan_material[$x]['status_permintaan'] == 1){
                ?>
                <tr>
                    <td> 1 </td>
                    <td> Compact Mattress </td>
                    <td> 13 Juni 2020 </td>
                    <td> Dikonfirmasi, Belum Direncanakan </td>
                    <td> Dikonfirmasi, Belum Direncanakan </td>
                    <td>
                        <a class="modal-with-form col-lg-2 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-2 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit"></a>
                        <a class="col-lg-2 btn btn-info fa fa-file-text" title="Perencanaan" 
                            href="<?php echo base_url() . 'PerencanaanMaterial/prosesPerencanaan'?>"></a>
                        <a class="modal-with-form col-lg-2 btn btn-danger fa fa-trash-o"
                            title="Delete" href="#modalhapus"></a>
                    </td>
                </tr>
                <tr>
                    <td> 2 </td>
                    <td><a href="<?php echo base_url() . 'PerencanaanMaterial/detailPerencanaan' ?>"> Floor Chair Gray </a></td>
                    <td> 20 Juni 2020 </td>
                    <td> Dikonfirmasi, Belum Direncanakan </td>
                    <td> Proses </td>
                    <td>
                        <a class="modal-with-form col-lg-2 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-2 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit2"></a>
                        <a class="col-lg-2 btn btn-info fa fa-file-text" title="Perencanaan" 
                            href="<?php echo base_url() . 'PerencanaanMaterial/prosesPerencanaan'?>"></a>
                        <a class="modal-with-form col-lg-2 btn btn-success fa fa-check"
                            title="Selesaikan" href="#modalselesai"></a>
                        <a class="modal-with-form col-lg-2 btn btn-danger fa fa-trash-o"
                            title="Delete" href="#modalhapus"></a>
                    </td>
                </tr>
                <?php } } } ?>
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




<!-- ----------------------------------------------- SELESAI ----------------------------------------- -->
<?php }else if($status == '1'){ ?>
<h1>Permintaan Material - Belum Ditinjau</h1>
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
                    <th>No.</th>
                    <th>Produk</th>
                    <th>Tanggal Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-2"> 1 </td>
                    <td class="col-lg-2"> Compact Mattress </td>
                    <td class="col-lg-3"> 13 Juni 2020 </td>
                    <td class="col-lg-4">
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-shopping-cart"
                            title="Beli Material" href="#modalbeli"></a>
                    </td>
                </tr>
                <tr>
                    <td class="col-2"> 2 </td>
                    <td class="col-lg-2"> Floor Chair Red </td>
                    <td class="col-lg-3"> 21 Juni 2020 </td>
                    <td class="col-lg-4">
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-3 btn btn-success fa fa-check-square"
                            title="Konfirmasi" href="#modaledit"></a>
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
                <h2 class="panel-title">Detail Permintaan Material</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>
                
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tanggal Permintaan</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control"
                        value="10 Juni 2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tanggal Penerimaan</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control"
                        value="13 Juni 2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <input type="text" name="jabatan" class="form-control"
                        value="Belum ditinjau" readonly>
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
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-2">1 </td>
                                    <td class="col-lg-3"> MAT123 </td>
                                    <td class="col-lg-3"> Foam </td>
                                    <td class="col-lg-2"> 15 </td>
                                    <td class="col-lg-3"> pc </td>
                                    <td class="col-lg-2"> Stok kurang</td>
                                </tr>
                                <tr>
                                    <td class="col-2">1 </td>
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

        /*
        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/index/0",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 
                    '<section class="panel">'+
                        '<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerencanaanMaterial/setuju" method="post">'+
                            
                            '<header class="panel-heading">'+
                                '<h2 class="panel-title">Menyetujui Permintaan Material</h2>'+
                            '</header>'+

                            '<div class="panel-body">'+
                                '<input type="hidden" name="id_po_supplier" class="form-control" value="'+respond['permat'][0]['id_permintaan_material']+'" readonly>'+
                                '<input type="hidden" name="status" class="form-control" value="1" readonly>'+
                                
                                'Anda akan menyetujui Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?'+

                            '</div>'+
                            '<footer class="panel-footer">'+
                                '<div class="row">'+
                                    '<div class="col-md-12 text-right">'+
                                        '<input type="submit" class="btn btn-primary" value="Ya">'+
                                        '<button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>'+
                                    '</div>'+
                                '</div>'+
                            '</footer>'+
                        '</form>'+
                    '</section>';

                $("#setuju").html($isi);
                $("#setuju").modal();
            }
        });  
        */
        $("#setuju").modal();
    });
</script>

<script>
    function reload() {
    location.reload();
    }
</script>