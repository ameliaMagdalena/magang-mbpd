<!-- <!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url()?>assets/vendor/daypilot/main.css?v=2020.3.4594" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"/>
    <script src="<?php echo base_url()?>assets/javascripts/daypilot-all.min.js?v=2020.3.4594"></script>

    <style>
        .scheduler_default_corner div:nth-of-type(2) {
            display: none !important;
        }
    </style>

</head> -->

<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->]
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
<h1>Detail Perencanaan</h1>
<hr>


<form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
    <div class="panel-body">
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">ID Permintaan Material</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $id_permintaan ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Produk</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $permintaan_material[0]['nama_produk'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Jumlah</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" value="<?php echo $permintaan_material[0]['jumlah_minta'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Produksi</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $permintaan_material[0]['tanggal_produksi'] ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <center><h4> Daftar Material </h4></center>
        </div>


<!-- ****************************************** DAFTAR MATERIAL ************************************** -->
        <?php for($x=0; $x<count($detail); $x++){ ?>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-up"></a>
                    <!-- <a href="#" class="fa fa-times"></a> -->
                </div>

                <h2 class="panel-title"><?php echo $detail[$x]['nama_sub_jenis_material'] ?></h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_detail" class="form-control" value="<?php echo $detail[$x]['id_detail_permintaan_material'] ?>" readonly>
            
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Kebutuhan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php $produksi=$detail[$x]['needs']; //needs dengan satuan keluar
                            $ukuran=$detail[$x]['ukuran_satuan_keluar']; //ukuran satuan keluar
                            $needmaterial=$produksi/$ukuran; //needs dengan satuan ukuran
                            $needs = ceil($needmaterial);
                            echo $needs; //ceil=roundup ?>"
                        readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Satuan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php echo $detail[$x]['satuan_ukuran'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Sudah Diambil</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php $diambil=0;
                            for($y=0; $y<count($pengambilan); $y++){
                                if ($pengambilan[$y]['id_detail_permintaan_material'] == $detail[$x]['id_detail_permintaan_material']){
                                    if ($pengambilan[$y]['status_keluar'] == 1){
                                        $jumlahambil = $pengambilan[$y]['jumlah_keluar']; //jumlah dengan satuan ukuran
                                        $diambil=$diambil+$jumlahambil;
                                    }
                                }
                            } echo $diambil ?>"
                        readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Belum Diambil</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php $belumambil=$needs-$diambil; 
                            echo $belumambil?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Stok di Gudang</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="ambil dari ketersediaan" readonly>
                        <span class="required">*</span> <?php ?>ajax
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <table class="table table-bordered table-striped table-hover" border="1">
                        <thead>
                            <tr>
                                <th style="text-align:center" class="col-lg-3">Tanggal Pengambilan</th>
                                <th style="text-align:center" class="col-lg-1">Jumlah</th>
                                <th style="text-align:center" class="col-lg-1">Satuan</th>
                                <th style="text-align:center" class="col-lg-3">Status Pengambilan</th>
                                <th style="text-align:center" class="col-lg-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($pengambilan)==0){ ?>
                                <tr>
                                    <td colspan='5' style="text-align:center"> Belum Ada Permintaan Pengambilan </td>
                                </tr>
                            <?php }else{ ?>
                            <?php for($z=0; $z<count($pengambilan); $z++){ 
                                    if ($pengambilan[$z]['id_detail_permintaan_material'] == $detail[$x]['id_detail_permintaan_material']){ ?>
                            <tr>
                                <td><?php echo $pengambilan[$z]['tanggal_ambil'] ?></td>
                                <td>3</td>
                                <td>m3</td>
                                <td>Sudah Diambil</td>
                                <td>
                                    <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                        title="Detail" href="#modaldetail"></a>
                                    <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                        title="Diambil" href="#modaldiambil"></a>
                                    <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                                        title="Batal" href="#modalbatal"></a>
                                </td>
                            </tr>
                            <?php } } } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="text-center">
                        <button type="button" class="modal-with-form btn btn-primary" href="#modalbeli">Request Pembelian</button>
                        <button type="button" class="modal-with-form btn btn-primary" href="#modalambil">Tambah Jadwal Pengambilan</button>
                    </div>
                </div>
            </div>
                
        </section>
        <?php } ?>
<!-- *************************************** END DAFTAR MATERIAL ************************************** -->


        <!-- ******************************** MODAL BELI ****************************** -->
        <!-- ************************************************************************** -->
        <div id='modalbeli' class="modal-block modal-block-md mfp-hide">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Request Pembelian Material</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_material" class="form-control" value="" readonly>
                    
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Material</label>
                        <div class="col-sm-9">
                            <input type="text" name="material" class="form-control"
                            value="Reb 55" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Jumlah Material</label>
                        <div class="col-sm-9">
                            <input type="number" name="jabatan" class="form-control"
                            placeholder="Stok Max: 30 m3">
                            Stok Di Gudang : 15 m3
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Request" onclick="reload()">
                            <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
        <!-- ****************************** END MODAL BELI **************************** -->
        <!-- ************************************************************************** -->


        <!-- ******************************** MODAL AMBIL ***************************** -->
        <!-- ************************************************************************** -->
        <div id='modalambil' class="modal-block modal-block-md mfp-hide">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Pengambilan Material</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_material" class="form-control" value="" readonly>
                    
                    <div class="form-group mt-lg">
                        <label class="col-sm-4 control-label">Material</label>
                        <div class="col-sm-8">
                            <input type="text" name="material" class="form-control"
                            value="Reb 55" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-4 control-label">Tanggal Pengambilan</label>
                        <div class="col-sm-8">
                            <input type="date" name="jabatan" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-4 control-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="number" name="jabatan" class="form-control" placeholder="Belum diambil : 15.24 m3">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-4 control-label">Satuan</label>
                        <div class="col-sm-8">
                            <input type="text" name="jabatan" class="form-control" value="m3" readonly>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan" onclick="reload()">
                            <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
        <!-- ****************************** END MODAL AMBIL *************************** -->
        <!-- ************************************************************************** -->


    </div>
</form>



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