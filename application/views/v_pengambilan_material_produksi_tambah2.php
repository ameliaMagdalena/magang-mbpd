<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Pengambilan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pengambilan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Buat Permintaan Pengambilan Material</h2>
        </header>

        <div class="panel-body">
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Tanggal Produksi</label>
                    <div class="col-sm-9">
                        <input class="form-control col-md-5" type="text" id="tanggal_mulai" name="tanggal_mulai"
                        value="<?= $min_date; ?>" disabled> 
                    </div>
            </div>
            <br><br>


            <h4 class="panel-title">Data Produk</h4>
            <br>

            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Jumlah Produk (pcs)</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($permat as $x){?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <center>
                                    <!-- memiliki ukuran & warna -->
                                    <?php if($x->keterangan == 0){
                                        $ukuran_tam = "";
                                        $warna_tam  = "";
                                        foreach($ukuran as $u){
                                            if($u->id_ukuran_produk == $x->id_ukuran_produk){
                                                $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                            }
                                        }
                                        
                                        foreach($warna as $w){
                                            if($w->id_warna == $x->id_warna){
                                                $warna_tam = $w->nama_warna;
                                            }
                                        }
                                    ?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                        </p>
                                    <!-- memiliki ukuran -->
                                    <?php } else if($x->keterangan == 1){
                                        $ukuran_tam = "";
                                        
                                        foreach($ukuran as $u){
                                            if($u->id_ukuran_produk == $x->id_ukuran_produk){
                                                $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                            }
                                        }
                                    ?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?> <?= $ukuran_tam?>
                                        </p>
                                    <?php } else if($x->keterangan == 2){
                                        $warna_tam = "";

                                        foreach($warna as $w){
                                            if($w->id_warna == $x->id_warna){
                                                $warna_tam = $w->nama_warna;
                                            }
                                        }
                                    ?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?> (<?= $warna_tam;?>)
                                        </p>
                                    <?php } else{?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?>
                                        </p>
                                    <?php } ?>
                                </center>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_permintaan_material?>">
                                <?= $x->jumlah_minta?>
                            </td>
                            <td class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
                                <button type="button" class="badd_klik col-lg-3 btn btn-success fa fa-plus-square-o" 
                                    value="<?= $no;?>" title="Buat Pengambilan Material"></button>
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetailnya"></a>
                                <button type="button" class="modal-with-form col-lg-3 btn btn-success fa fa-plus-square-o" style="color:white"
                                        title="Add"  href="#modaltambahnya"></button>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
	        </table>
        </div>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </div>
        </footer>
    </section>

    <!-- modal detail -->
    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Permintaan Material</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Permintaan Material</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_permat" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kode PO</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="kode_po" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Line</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_line" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Permintaan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tanggal_permintaan" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Produksi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tanggal_produksi" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Minta</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="jumlah_minta" readonly>
                        </div>
                    </div>
                    <br>
                    
                    <div id="table_detail">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal tambah -->
    <div class="modal" id="modaltambah" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <form method="POST" action="<?= base_url()?>pengambilanMaterialProduksi/tambah_permintaan_pengambilan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Buat Permintaan Pengambilan Material</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor Permintaan Material</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_permat_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Kode PO</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="kode_po_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Line</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama_line_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Permintaan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_permintaan_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Produksi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_produksi_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Jumlah Minta</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="jumlah_minta_add" readonly>
                            </div>
                        </div>
                        <br>
                        
                        <div id="table_add">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id='modaltambahnya' class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Tambah Permintaan Material</h2>
            </header>

            <form method="POST" action="<?= base_url()?>permintaanMaterialProduksi/semua_permintaan_material">
                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kode Produk</label>
                    <div class="col-sm-7">
                            <input type="text" name="nama" class="form-control"
                            value="0100101" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" class="form-control"
                            value="Bantal Datron Ligna" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Produk</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" class="form-control"
                            value="50 pcs" readonly>
                        </div>
                    </div>

                    <br>
                    <h4>Konsumsi Material</h4>
                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th  style="text-align: center;vertical-align: middle;">No</th>
                                <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                                <th  style="text-align: center;vertical-align: middle;">Jumlah Konsumsi /Produk</th>
                                <th  style="text-align: center;vertical-align: middle;">Total Konsumsi</th>
                                <th  style="text-align: center;vertical-align: middle;">WIP Line</th>
                                <th  style="text-align: center;vertical-align: middle;">Jumlah Material Diminta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Kain Polos</td>
                                <td style="text-align: center;vertical-align: middle;">10 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">500 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">10 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="number" name="nama" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Karton Protector</td>
                                <td style="text-align: center;vertical-align: middle;">4 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">200 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">20 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="number" name="nama" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Benang Putih</td>
                                <td style="text-align: center;vertical-align: middle;">1 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">10 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="number" name="nama" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Plastik Pembungkus</td>
                                <td style="text-align: center;vertical-align: middle;">1 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">30 pcs</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="number" name="nama" class="form-control" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Save">
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Cancel</button>
                        </div>
                    </div>
                </footer>
            </form>
		</section>

        <!-- tampung id produk yang dipilih
        <input type="text" id="tampung_id_produk" name="tampung_id_produk">  -->
        <!-- tampung jumlah id produk yang dipilih -->
        <input type="hidden" id="tampung_jumlah_id_produk"> 
    </div>
    
    <div id='modaldetailnya' class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Konsumsi Material & Permintaan Material</h2>
            </header>

            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Kode Produk</label>
                <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="0100101" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nama Produk</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="Bantal Datron Ligna" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Jumlah Produk</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="50 pcs" readonly>
                    </div>
                </div>

                <br>
                <h4>Konsumsi Material</h4>
                <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                    <thead>
                        <tr>
                            <th  style="text-align: center;vertical-align: middle;">No</th>
                            <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                            <th  style="text-align: center;vertical-align: middle;">Jumlah Konsumsi Per Produk</th>
                            <th  style="text-align: center;vertical-align: middle;">Total Konsumsi Material</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">1</td>
                            <td style="text-align: center;vertical-align: middle;">Kain Polos</td>
                            <td style="text-align: center;vertical-align: middle;">10 pcs</td>
                            <td style="text-align: center;vertical-align: middle;">500 pcs</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">2</td>
                            <td style="text-align: center;vertical-align: middle;">Karton Protector</td>
                            <td style="text-align: center;vertical-align: middle;">4 pcs</td>
                            <td style="text-align: center;vertical-align: middle;">200 pcs</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">3</td>
                            <td style="text-align: center;vertical-align: middle;">Benang Putih</td>
                            <td style="text-align: center;vertical-align: middle;">1 pcs</td>
                            <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">4</td>
                            <td style="text-align: center;vertical-align: middle;">Plastik Pembungkus</td>
                            <td style="text-align: center;vertical-align: middle;">1 pcs</td>
                            <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <h4>Permintaan Material</h4>
                <div class="col-md-12">
                    <div class="toggle" data-plugin-toggle>
                        <section class="toggle">
                            <label>Permintaan 1 </label>
                            <div class="toggle-content">
                                <div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Tanggal & Waktu Permintaan</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="Selasa, 07-07-2020 | 12:00" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Keterangan</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="Sudah Diambil" readonly>
                                        </div>
                                    </div>
                                    <br>

                                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                                        <thead>
                                            <tr>
                                                <th  style="text-align: center;vertical-align: middle;">No</th>
                                                <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                                                <th  style="text-align: center;vertical-align: middle;">Jumlah Material</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">1</td>
                                                <td style="text-align: center;vertical-align: middle;">Kain Polos</td>
                                                <td style="text-align: center;vertical-align: middle;">500 pcs</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">2</td>
                                                <td style="text-align: center;vertical-align: middle;">Karton Protector</td>
                                                <td style="text-align: center;vertical-align: middle;">200 pcs</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">3</td>
                                                <td style="text-align: center;vertical-align: middle;">Benang Putih</td>
                                                <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">4</td>
                                                <td style="text-align: center;vertical-align: middle;">Plastik Pembungkus</td>
                                                <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </section>
                        <br>
                        <section class="toggle">
                            <label>Permintaan 2</label>
                            <div class="toggle-content">
                                <div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Tanggal & Waktu Permintaan</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="Selasa, 07-07-2020 | 15:00" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Keterangan</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="Sudah Diambil" readonly>
                                        </div>
                                    </div>
                                    <br>

                                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                                        <thead>
                                            <tr>
                                                <th  style="text-align: center;vertical-align: middle;">No</th>
                                                <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                                                <th  style="text-align: center;vertical-align: middle;">Jumlah Material</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">1</td>
                                                <td style="text-align: center;vertical-align: middle;">Kain Polos</td>
                                                <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">2</td>
                                                <td style="text-align: center;vertical-align: middle;">Karton Protector</td>
                                                <td style="text-align: center;vertical-align: middle;">20 pcs</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">3</td>
                                                <td style="text-align: center;vertical-align: middle;">Benang Putih</td>
                                                <td style="text-align: center;vertical-align: middle;">5 pcs</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">4</td>
                                                <td style="text-align: center;vertical-align: middle;">Plastik Pembungkus</td>
                                                <td style="text-align: center;vertical-align: middle;">5 pcs</td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </section>
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
                    
<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->

<script>
    function reload() {
        location.reload();
    }
</script>


<!-- detail permintaan material -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>pengambilanMaterialProduksi/detail_permintaan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_permat").val(respond['permat'][0]['id_permintaan_material']);
                $("#kode_po").val(respond['permat'][0]['kode_purchase_order_customer']);
                $("#nama_line").val(respond['permat'][0]['nama_line']);
                $("#tanggal_permintaan").val(respond['permat'][0]['tanggal_permintaan']);
                $("#tanggal_produksi").val(respond['permat'][0]['tanggal_produksi']);
                $("#jumlah_minta").val(respond['permat'][0]['jumlah_minta']);

                $isi = "";
                for($i=0;$i<respond['jm_detpermat'];$i++){
                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['nama_sub_jenis_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['jumlah_konsumsi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['needs']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['satuan_ukuran']+
                        '</td>'+
                    '</tr>';
                }

                $table = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'No'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Nama Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Konsumsi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Permintaan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Diambil'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan Konsumsi'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>';

                $("#table_detail").html($table);
                $("#modaldetail").modal();
            }
        });  
    });
</script>

<!-- add permintaan material -->
<script>
    $('.badd_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>pengambilanMaterialProduksi/detail_permintaan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_permat_add").val(respond['permat'][0]['id_permintaan_material']);
                $("#kode_po_add").val(respond['permat'][0]['kode_purchase_order_customer']);
                $("#nama_line_add").val(respond['permat'][0]['nama_line']);
                $("#tanggal_permintaan_add").val(respond['permat'][0]['tanggal_permintaan']);
                $("#tanggal_produksi_add").val(respond['permat'][0]['tanggal_produksi']);
                $("#jumlah_minta_add").val(respond['permat'][0]['jumlah_minta']);

                $isi = "";
                for($i=0;$i<respond['jm_detpermat'];$i++){
                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['nama_sub_jenis_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['jumlah_konsumsi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['needs']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                        
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['satuan_ukuran']+
                        '</td>'+
                    '</tr>';
                }

                $table = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'No'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Nama Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Konsumsi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Permintaan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Telah Diambil'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'WIP Line'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Akan Diambil'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan Konsumsi'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>';

                $("#table_add").html($table);
                $("#modaltambah").modal();
            }
        });  
    });
</script>






    