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
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Produk</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 0 || $status == 4){ 
                            if($permintaan_material[$x]['status_permintaan'] == 0){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_line'] ?></td>
                    <td>Belum Ditinjau / Menunggu Persetujuan
                        <input type="hidden" id="ketersediaan<?= $x ?>" value="<?php $cek=0;
                            for($det=0; $det<count($detail); $det++){
                                if($permintaan_material[$x]['id_permintaan_material'] == $detail[$det]['id_permintaan_material']){
                                    $produk = $detail[$det]['jumlah_minta'];
                                    $cons = $detail[$det]['jumlah_konsumsi'];
                                    $needs = $produk*$cons;

                                    $ketersediaan = 0;
                                    for($mat=0; $mat<count($material); $mat++){
                                        if($detail[$det]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                            $ketersediaan = $ketersediaan+1; //jumlah di gudang
                                        }
                                    }
                                    if($ketersediaan<$needs){
                                        $cek=$cek+1; //jika tidak tersedia, maka cek > 0
                                    }
                                }
                            } echo $cek;
                        ?>">
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        
                        <button type="button" class="konfirmz col-lg-3 btn btn-success fa fa-check" 
                            value="<?php echo $x ?>" title="Konfirmasi"></button>
                        <button type="button" class="tolakz col-lg-3 btn btn-danger fa fa-times" 
                            value="<?php echo $x ?>" title="Tolak"></button>
                        

                        <!-- <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                            title="Konfirmasi" href="#modalkonfirmasi<?php echo $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                            title="Tolak" href="#modaltolak<?php echo $permintaan_material[$x]['id_permintaan_material'] ?>"></a> -->
                    </td>
                </tr>


                <!-- ****************************** MODAL SETUJU ***************************** -->
                <!-- ************************************************************************** -->
                    <div class="modal" id="setuju" role="dialog">
                        <div class="modal-dialog modal-xl" style="width:50%">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanMaterial/setuju" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b>Menyetujui Permintaan Material</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idnyaa" id="idnyaa" class="form-control" value="" readonly>
                                        <input type="hidden" name="status" id="statusnyaa" class="form-control" value="" readonly>
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
                                        <input type="hidden" name="status" class="form-control" value="5" readonly>
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

        <h2 class="panel-title">Permintaan Material - Sedang Proses</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <!-- <th class="col-lg-2">Kode Permintaan Material</th> -->
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Produk</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 1 || $status == 4){ 
                            if($permintaan_material[$x]['status_permintaan'] == 1 || $permintaan_material[$x]['status_permintaan'] == 2){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td> <?= $permintaan_material[$x]['nama_line'] ?> </td>
                    <td> <?php if ($permintaan_material[$x]['status_permintaan'] == 1){
                        echo "Proses Pembelian";
                    } else if ($permintaan_material[$x]['status_permintaan'] == 2){
                        echo "Material Tersedia";
                    } ?> </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        <!-- <a class="col-lg-3 btn btn-info fa fa-file-text" title="Perencanaan" 
                            href="<?php echo base_url() . 'PerencanaanMaterial/proses_perencanaan/' . $permintaan_material[$x]['id_permintaan_material']?>"></a> -->
                        <a class="col-lg-3 btn btn-info fa fa-file-text" title="Perencanaan"
                            href="<?php echo base_url() . 'PermintaanMaterial/proses_perencanaan/' . $permintaan_material[$x]['id_permintaan_material']?>"></a>
                        
                        <?php if ($permintaan_material[$x]['status_permintaan'] == 1){ ?>
                        <button type="button" class="sediaz col-lg-3 btn btn-success fa fa-check" 
                            value="<?php echo $x ?>" title="Tersedia"></button>
                        <?php } ?>

                        <?php if ($permintaan_material[$x]['status_permintaan'] == 2){ ?>
                        <button type="button" class="selesaiz col-lg-3 btn btn-success fa fa-check" 
                            value="<?php echo $x ?>" title="Selesaikan"></button>
                        <?php } ?>

                        <button type="button" class="batalz col-lg-3 btn btn-danger fa fa-times" 
                            value="<?php echo $x ?>" title="Batal"></button>
                        <!-- <button type="button" class="deletez col-lg-3 btn btn-danger fa fa-trash-o" 
                            value="<?php echo $x ?>" title="Hapus"></button> -->
                    </td>
                </tr>

                
                <!-- ****************************** MODAL SEDIA ***************************** -->
                <!-- ************************************************************************ -->
                <div class="modal" id="sedia" role="dialog">
                    <div class="modal-dialog modal-xl" style="width:50%">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanMaterial/setuju" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>Persediaan Semua Material</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="idnyaa" id="idsedia" class="form-control" value="" readonly>
                                    <input type="hidden" name="status" class="form-control" value="2" readonly>
                                    <div id="isisedia"></div>
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
                <!-- **************************** END MODAL SEDIA *************************** -->
                <!-- ************************************************************************ -->

                <!-- ****************************** MODAL SELESAI ***************************** -->
                <!-- ************************************************************************** -->
                <div class="modal" id="selesai" role="dialog">
                    <div class="modal-dialog modal-xl" style="width:50%">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanMaterial/setuju" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>Menyelesaikan Permintaan Material</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="idnyaa" id="idselesai" class="form-control" value="" readonly>
                                    <input type="hidden" name="status" class="form-control" value="3" readonly>
                                    <div id="isiselesai"></div>
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
                <!-- **************************** END MODAL SELESAI *************************** -->
                <!-- ************************************************************************** -->

                <!-- ****************************** MODAL BATAL ***************************** -->
                <!-- ************************************************************************ -->
                <div class="modal" id="batal" role="dialog">
                    <div class="modal-dialog modal-xl" style="width:50%">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanMaterial/setuju" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>Menolak Permintaan Material</b></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="idnyaa" id="idbatal" class="form-control" value="" readonly>
                                    <input type="hidden" name="status" class="form-control" value="3" readonly>
                                    <div id="isibatal"></div>
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
                <!-- ***************************** END MODAL BATAL *************************** -->
                <!-- ************************************************************************* -->
                <?php $no=$no+1; } } } ?>
            </tbody>
        </table>
    </div>
</section>



<!-- ----------------------------------------------- SELESAI ----------------------------------------- -->
<?php }else if($status == '2'){ ?>
<h1>Permintaan Material - Selesai</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Permintaan Material - Selesai</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Produk</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 2 || $status == 4){ 
                            if($permintaan_material[$x]['status_permintaan'] == 3){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_line'] ?></td>
                    <td>Selesai </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        <button type="button" class="deletez col-lg-3 btn btn-danger fa fa-trash-o" 
                            value="<?php echo $x ?>" title="Hapus"></button>
                    </td>
                </tr>

                <!-- <tr>
                    <td class="col-2"> 1 </td>
                    <td class="col-lg-2"> Compact Mattress </td>
                    <td class="col-lg-3"> 13 Juni 2020 </td>
                    <td class="col-lg-4">
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-shopping-cart"
                            title="Beli Material" href="#modalbeli"></a>
                    </td>
                </tr> -->
                <?php $no=$no+1;}}} ?>
            </tbody>
        </table>
    </div>
</section>




<!-- ----------------------------------------------- BATAL ----------------------------------------- -->
<?php }else if($status == '3'){ ?>
<h1>Permintaan Material - Batal / Ditolak</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Permintaan Material - Batal / Ditolak</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Produk</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($permintaan_material) ; $x++){
                        if ($status == 3 || $status == 4){ 
                            if($permintaan_material[$x]['status_permintaan'] == 4 || $permintaan_material[$x]['status_permintaan'] == 5){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_line'] ?></td>
                    <td><?php if($permintaan_material[$x]['status_permintaan']==4){
                        echo "Batal";
                    }else{
                        echo "Ditolak";
                    } ?></td>
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



<!-- ----------------------------------------------- SEMUA ----------------------------------------- -->
<?php }else if($status == '4'){ ?>
<h1>Permintaan Material - Semua</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Permintaan Material - Semua</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Produk</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($permintaan_material) ; $x++){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $permintaan_material[$x]['id_permintaan_material'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $permintaan_material[$x]['tanggal_permintaan'] ?></td>
                    <td><?= $permintaan_material[$x]['tanggal_produksi'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_produk'] ?></td>
                    <td><?= $permintaan_material[$x]['nama_line'] ?></td>
                    <td><?php if($permintaan_material[$x]['status_permintaan']==0){
                        echo "Belum Ditindaklanjuti";
                    }else if($permintaan_material[$x]['status_permintaan']==1){
                        echo "Proses Pembelian";
                    }else if($permintaan_material[$x]['status_permintaan']==2){
                        echo "Material Tersedia";
                    }else if($permintaan_material[$x]['status_permintaan']==3){
                        echo "Selesai";
                    }else if($permintaan_material[$x]['status_permintaan']==4){
                        echo "Batal";
                    }else{
                        echo "Ditolak";
                    } ?></td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail/' . $permintaan_material[$x]['id_permintaan_material'] ?>"></a>
                        <button type="button" class="deletez col-lg-3 btn btn-danger fa fa-trash-o" 
                            value="<?php echo $x ?>" title="Hapus"></button>
                    </td>
                </tr>
                <?php $no=$no+1;} ?>
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
        var tersedia = $("#ketersediaan"+no).val();

        if(tersedia > 0){
            $("#statusnyaa").val("1");
        }
        else{
            $("#statusnyaa").val("2");
        }

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan menyetujui Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';
                $("#isisetuju").html($isi);
                $("#idnyaa").val(id);
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
    $('.sediaz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Apakah semua material untuk Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b> sudah tersedia?';
                $("#isisedia").html($isi);
                $("#idsedia").val(id);
                $("#sedia").modal();
            }
        }); 
    });
</script>

<script>
    function reload() {
    location.reload();
    }
</script>