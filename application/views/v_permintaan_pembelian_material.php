<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Pembelian Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Permintaan Pembelian Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->


<!-- ------------------------------------------ BELUM DITINJAU --------------------------------------- -->
<?php if($status == '0'){ ?>
<h1>Permintaan Pembelian Material - Belum Ditindaklanjuti</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Permintaan Pembelian Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th class="col-lg-2">Material</th>
                    <th class="col-lg-1">Jumlah</th>
                    <th class="col-lg-3">Tanggal Permintaan</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
            
            <?php $no=1;
                    for($x=0 ; $x<count($permintaan_pembelian) ; $x++){
                        if($permintaan_pembelian[$x]['status_pembelian'] == 0){
                ?>
                <tr>
                    <td> <?php echo $no ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['nama_jenis_material'] . " " . $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?> </td>
                    <td>Requested / Belum Ditinjau</td>
                    <td>
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                            title="Tolak" href="#modaltolak<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>"></a>
                    </td>
                </tr>
                
                <!-- ****************************** MODAL DETAIL ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Detail Permintaan Pembelian Material</h2>
                        </header>

                        <div class="panel-body">
                            <input type="hidden" name="id_permintaan" class="form-control" value="<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>" readonly>
                            
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Permintaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_minta" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Penerimaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_terima" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_penerimaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                    value="Belum ditindaklanjuti" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ket" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['keterangan'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <div class="col-sm-12">
                                    <hr>
                                    <h3 style="text-align: center">Data Material</h3>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Kode Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['id_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Nama Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Diminta</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="satuan" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['satuan_ukuran'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Ketersediaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                        value="<?php $ketersediaan = 0;
                                            for($mat=0; $mat<count($material); $mat++){
                                                if($detail[$x]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                                    $ketersediaan = $ketersediaan+1;
                                                }
                                            }
                                            echo $ketersediaan . " " . $permintaan_pembelian[$x]['satuan_ukuran'] ;
                                        ?>"
                                    readonly>
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

                <!-- ****************************** MODAL TOLAK ****************************** -->
                <!-- ************************************************************************* -->
                <div id='modaltolak<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>' class="modal-block modal-block-md mfp-hide">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanPembelianMaterial/tolak" method="post">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Menolak Permintaan Pembelian Material</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="idnya" class="form-control" value="<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <div class="col-sm-12">
                                        Anda yakin akan menolak permintaan pembelian material 
                                        <b><?php echo $permintaan_pembelian[$x]['nama_jenis_material'] ." ". $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?></b>?
                                    </div>
                                </div>

                                <br>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-danger" value="Ya">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </form>
                </div>
                <!-- **************************** END MODAL TOLAK **************************** -->
                <!-- ************************************************************************* -->

                <?php $no=$no+1;} } ?>
            </tbody>
        </table>
    </div>

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


<!-- ------------------------------------------ SEDANG PROSES --------------------------------------- -->
<?php }else if($status == '1'){ ?>
<h1>Permintaan Pembelian Material - Sedang Proses</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Permintaan Pembelian Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th class="col-lg-2">Material</th>
                    <th class="col-lg-1">Jumlah</th>
                    <th class="col-lg-3">Tanggal Permintaan</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
            
            <?php $no=1;
                    for($x=0 ; $x<count($permintaan_pembelian) ; $x++){
                        if($permintaan_pembelian[$x]['status_pembelian'] == 1){
                ?>
                <tr>
                    <td> <?php echo $no ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['nama_jenis_material'] . " " . $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?> </td>
                    <td>Proses Pembelian</td>
                    <td>
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>"></a>
                    </td>
                </tr>
                
                <!-- ****************************** MODAL DETAIL ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Detail Permintaan Pembelian Material</h2>
                        </header>

                        <div class="panel-body">
                            <input type="hidden" name="id_permintaan" class="form-control" value="<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>" readonly>
                            
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Permintaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_minta" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Penerimaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_terima" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_penerimaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                    value="Proses Pembelian" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ket" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['keterangan'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <div class="col-sm-12">
                                    <hr>
                                    <h3 style="text-align: center">Data Material</h3>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Kode Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['id_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Nama Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Diminta</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Dibeli</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $daripo[0]['jumlah_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="satuan" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['satuan_ukuran'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Ketersediaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                        value="<?php $ketersediaan = 0;
                                            for($mat=0; $mat<count($material); $mat++){
                                                if($detail[$x]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                                    $ketersediaan = $ketersediaan+1;
                                                }
                                            }
                                            echo $ketersediaan . " " . $permintaan_pembelian[$x]['satuan_ukuran'] ;
                                        ?>"
                                    readonly>
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

                <?php $no=$no+1;} } ?>
            </tbody>
        </table>
    </div>
</section>


<!-- ------------------------------------------ SELESAI --------------------------------------- -->
<?php }else if($status == '2'){ ?>
<h1>Permintaan Pembelian Material - Selesai</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Permintaan Pembelian Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th class="col-lg-2">Material</th>
                    <th class="col-lg-1">Jumlah</th>
                    <th class="col-lg-3">Tanggal Permintaan</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
            
            <?php $no=1;
                    for($x=0 ; $x<count($permintaan_pembelian) ; $x++){
                        if($permintaan_pembelian[$x]['status_pembelian'] == 2){
                ?>
                <tr>
                    <td> <?php echo $no ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['nama_jenis_material'] . " " . $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?> </td>
                    <td>Selesai</td>
                    <td>
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>"></a>
                    </td>
                </tr>
                
                <!-- ****************************** MODAL DETAIL ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Detail Permintaan Pembelian Material</h2>
                        </header>

                        <div class="panel-body">
                            <input type="hidden" name="id_permintaan" class="form-control" value="<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>" readonly>
                            
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Permintaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_minta" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Penerimaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_terima" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_penerimaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                    value="Selesai" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ket" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['keterangan'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <div class="col-sm-12">
                                    <hr>
                                    <h3 style="text-align: center">Data Material</h3>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Kode Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['id_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Nama Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Diminta</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Dibeli</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $daripo[0]['jumlah_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="satuan" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['satuan_ukuran'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Ketersediaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                        value="<?php $ketersediaan = 0;
                                            for($mat=0; $mat<count($material); $mat++){
                                                if($detail[$x]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                                    $ketersediaan = $ketersediaan+1;
                                                }
                                            }
                                            echo $ketersediaan . " " . $permintaan_pembelian[$x]['satuan_ukuran'] ;
                                        ?>"
                                    readonly>
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

                <?php $no=$no+1; } } ?>
            </tbody>
        </table>
    </div>
</section>



<!-- ------------------------------------------ BATAL/DITOLAK --------------------------------------- -->
<!-- tidak bisa batalkan permintaan pembelian kecuali jika po suppliernya batal -->
<?php }else if($status == '3'){ ?>
<h1>Permintaan Pembelian Material - Batal/Ditolak</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Permintaan Pembelian Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th class="col-lg-2">Material</th>
                    <th class="col-lg-1">Jumlah</th>
                    <th class="col-lg-3">Tanggal Permintaan</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
            
            <?php $no=1;
                    for($x=0 ; $x<count($permintaan_pembelian) ; $x++){
                        if($permintaan_pembelian[$x]['status_pembelian'] == '3' || $permintaan_pembelian[$x]['status_pembelian'] == '4'){
                ?>
                <tr>
                    <td> <?php echo $no ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['nama_jenis_material'] . " " . $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?> </td>
                    <td>
                        <?php if($permintaan_pembelian[$x]['status_pembelian'] == 3){
                            echo "Batal";
                        } else{
                            echo "Ditolak";
                        } ?>
                    </td>
                    <td>
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>"></a>
                    </td>
                </tr>
                
                <!-- ****************************** MODAL DETAIL ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Detail Permintaan Pembelian Material</h2>
                        </header>

                        <div class="panel-body">
                            <input type="hidden" name="id_permintaan" class="form-control" value="<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>" readonly>
                            
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Permintaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_minta" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Penerimaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_terima" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_penerimaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                        value="<?php if($permintaan_pembelian[$x]['status_pembelian'] == 3){
                                            echo "Batal";
                                        } else{
                                            echo "Ditolak";
                                        } ?>"
                                    readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ket" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['keterangan'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <div class="col-sm-12">
                                    <hr>
                                    <h3 style="text-align: center">Data Material</h3>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Kode Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['id_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Nama Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Diminta</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="satuan" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['satuan_ukuran'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Ketersediaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                        value="<?php $ketersediaan = 0;
                                            for($mat=0; $mat<count($material); $mat++){
                                                if($detail[$x]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                                    $ketersediaan = $ketersediaan+1;
                                                }
                                            }
                                            echo $ketersediaan . " " . $permintaan_pembelian[$x]['satuan_ukuran'] ;
                                        ?>"
                                    readonly>
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

                <?php $no=$no+1;} } ?>
            </tbody>
        </table>
    </div>
</section>



<!-- ------------------------------------------ SEMUA --------------------------------------- -->
<?php }else if($status == '4'){ ?>
<h1>Permintaan Pembelian Material - Semua</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Permintaan Pembelian Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th class="col-lg-2">Material</th>
                    <th class="col-lg-1">Jumlah</th>
                    <th class="col-lg-3">Tanggal Permintaan</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
            
            <?php $no=1;
                    for($x=0 ; $x<count($permintaan_pembelian) ; $x++){
                ?>
                <tr>
                    <td> <?php echo $no ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['nama_jenis_material'] . " " . $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?> </td>
                    <td> <?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?> </td>
                    <td>
                        <?php if($permintaan_pembelian[$x]['status_pembelian'] == 0){
                            echo "Requested / Belum Ditindaklanjuti";
                        } else if($permintaan_pembelian[$x]['status_pembelian'] == 1){
                            echo "Proses Pembelian";
                        } else if($permintaan_pembelian[$x]['status_pembelian'] == 2){
                            echo "Selesai";
                        } else if($permintaan_pembelian[$x]['status_pembelian'] == 3){
                            echo "Batal";
                        } else{
                            echo "Ditolak";
                        } ?>
                    </td>
                    <td>
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>"></a>
                        
                        <?php if($permintaan_pembelian[$x]['status_pembelian'] == '0'){ ?>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                                title="Tolak" href="#modaltolak<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>"></a>
                        <?php } ?>
                    </td>
                </tr>
                
                <!-- ****************************** MODAL DETAIL ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modaldetail<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Detail Permintaan Pembelian Material</h2>
                        </header>

                        <div class="panel-body">
                            <input type="hidden" name="id_permintaan" class="form-control" value="<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>" readonly>
                            
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Permintaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_minta" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_permintaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Tanggal Penerimaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tgl_terima" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['tanggal_penerimaan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                        value="<?php if($permintaan_pembelian[$x]['status_pembelian'] == 0){
                                            echo "Requested / Belum Ditindaklanjuti";
                                        } else if($permintaan_pembelian[$x]['status_pembelian'] == 1){
                                            echo "Proses Pembelian";
                                        } else if($permintaan_pembelian[$x]['status_pembelian'] == 2){
                                            echo "Selesai";
                                        } else if($permintaan_pembelian[$x]['status_pembelian'] == 3){
                                            echo "Batal";
                                        } else{
                                            echo "Ditolak";
                                        } ?>"
                                    readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ket" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['keterangan'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <div class="col-sm-12">
                                    <hr>
                                    <h3 style="text-align: center">Data Material</h3>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Kode Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['id_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Nama Material</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_material" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Diminta</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['jumlah_beli'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Jumlah Dibeli</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah" class="form-control"
                                    value="<?php echo $daripo[0]['jumlah_material'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="satuan" class="form-control"
                                    value="<?php echo $permintaan_pembelian[$x]['satuan_ukuran'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label">Ketersediaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="status" class="form-control"
                                        value="<?php $ketersediaan = 0;
                                            for($mat=0; $mat<count($material); $mat++){
                                                if($detail[$x]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                                    $ketersediaan = $ketersediaan+1;
                                                }
                                            }
                                            echo $ketersediaan . " " . $permintaan_pembelian[$x]['satuan_ukuran'] ;
                                        ?>"
                                    readonly>
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

                <!-- ****************************** MODAL TOLAK ****************************** -->
                <!-- ************************************************************************* -->
                <div id='modaltolak<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>' class="modal-block modal-block-md mfp-hide">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanPembelianMaterial/tolak" method="post">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Menolak Permintaan Pembelian Material</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="idnya" class="form-control" value="<?php echo $permintaan_pembelian[$x]['id_permintaan_pembelian'] ?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <div class="col-sm-12">
                                        Anda yakin akan menolak permintaan pembelian material 
                                        <b><?php echo $permintaan_pembelian[$x]['nama_jenis_material'] ." ". $permintaan_pembelian[$x]['nama_sub_jenis_material'] ?></b>?
                                    </div>
                                </div>

                                <br>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-danger" value="Ya">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </form>
                </div>
                <!-- **************************** END MODAL TOLAK **************************** -->
                <!-- ************************************************************************* -->
                
                <?php $no=$no+1; } ?>
            </tbody>
        </table>
    </div>
</section>
<?php } ?>





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