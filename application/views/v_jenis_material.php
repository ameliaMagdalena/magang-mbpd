<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Jenis Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Jenis Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Jenis Material</h1>
<hr>
<a class="modal-with-form btn btn-success" href="#modaltambah">+ Tambah Jenis Material</a>



<!-- *************************** MODAL TAMBAH JENIS *************************** -->
<!-- ************************************************************************** -->
<div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>JenisMaterial/tambah_jenis_material" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Masukkan Data Jenis Material</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_jenis_material" class="form-control" value="JM-<?php echo $jumlah_jenis_material + 1?>" readonly>
					
				<div class="form-group mt-lg">
					<label class="col-sm-4 control-label">Nama Jenis Material<span class="required">*</span></label>
					<div class="col-sm-7">
						<input type="text" name="nama_jenis_material" class="form-control"
                        placeholder="Nama jenis material"  required>
					</div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-4 control-label">Kode Jenis Material<span class="required">*</span></label>
					<div class="col-sm-7">
						<input type="text" name="kode_jenis_material" class="form-control"
                        placeholder="Kode jenis material"  required>
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

<br>
<br>

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
                    <th> </th>
                    <th>No.</th>
                    <th>Nama Jenis Material</th>
                    <th>Kode Jenis Material</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($jenis_material)==0){?>
                     <tr>
                        <td colspan="5" style="text-align:center">Belum Ada Data</td>
                    </tr>
                <?php 
                    }else{
                    for($x=0 ; $x<count($jenis_material) ; $x++){
                ?>
                    <tr>
                        <td><a data-toggle="collapse" class="btn fa fa-plus-square-o"
                            href="#subjm"></a>
                        </td>
                        <td class="col-2"><?php echo $x+1?> </td>
                        <td class="col-lg-5"><?php echo $jenis_material[$x]['nama_jenis_material']?> </td>
                        <td class="col-lg-3"><?php echo $jenis_material[$x]['kode_jenis_material']?> </td>
                        <td class="col-lg-4">
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?php echo $jenis_material[$x]['id_jenis_material'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-plus"
                                title="Tambah Sub Jenis Material" href="#modaltambahsub<?php echo $jenis_material[$x]['id_jenis_material'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?php echo $jenis_material[$x]['id_jenis_material'] ?>"></a>
                            <!-- <a class="btn col-lg-12  btn-info" href="<?php //echo base_url() ?>material/log/<?php //echo $material[$x]['id_material']?>"><i class='fa fa-file'></i> Log</a> -->
                        </td>
                    </tr>
                    <tr id="subjm" class="collapse">
                        <td> &nbsp; </td>
                        <td colspan="5">
                            <h4> Sub Jenis Material </h4>
                            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                 <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Sub Jenis Material</th>
                                        <th>Satuan Ukuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    if(count($sub_jenis_material) == 0){
                                ?>
                                    <tr>
                                        <td colspan="4" style="text-align:center">Tidak Ada Sub Customer</td>
                                    </tr>
                                <?php
                                    } else if (count($sub_join) == 0){
                                ?>
                                    <tr>
                                        <td colspan="4" style="text-align:center">Tidak Ada Sub Customer</td>
                                    </tr>
                                    
                                <?php
                                    }else{
                                    for($y=0 ; $y<count($sub_jenis_material); $y++){
                                ?>
                                    <tr>
                                        <td class="col-lg-1"> <?php echo $y+1?></td>
                                        <td class="col-lg-5"> <?php echo $sub_jenis_material[$y]['nama_sub_jenis_material']?></td>
                                        <td class="col-lg-3"> <?php echo $sub_jenis_material[$y]['satuan_ukuran']?></td>
                                        <td class="col-lg-4">
                                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                                title="Detail" href="#modaldetailsub<?php echo $sub_jenis_material[$x]['id_sub_jenis_material'] ?>"></a>
                                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                                title="Edit" href="#modaleditsub<?php echo $sub_jenis_material[$x]['id_sub_jenis_material'] ?>"></a>
                                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                                title="Delete" href="#modalhapussub<?php echo $sub_jenis_material[$x]['id_sub_jenis_material'] ?>"></a>
                                            <!-- <a class="btn col-lg-12  btn-info" href="<?php //echo base_url() ?>user/log/<?php echo $user[$x]['id_user']?>"><i class='fa fa-file'></i> Log</a> -->
                                        </td>
                                    </tr>

                                    
                                    <!-- ****************************** MODAL DETAIL ****************************** -->
                                    <!-- ************************************************************************** -->
                                    <div id='modaldetailsub<?php echo $sub_jenis_material[$y]['id_sub_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Detail Data Jenis Material</h2>
                                            </header>

                                            <div class="panel-body">
                                                <input type="hidden" name="id_material" class="form-control" value="<?php echo $sub_jenis_material[$y]['id_sub_jenis_material']?>" readonly>
                                                
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-3 control-label">Jenis Material</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="jenis" class="form-control"
                                                        value="<?php echo $sub_join[$y]['nama_jenis_material'] ?> " readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-3 control-label">Satuan Ukuran</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="satuan" class="form-control"
                                                        value="<?php echo $sub_join[$y]['satuan_ukuran'] ?> " readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-3 control-label">Minimal Stok</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="min_stok" class="form-control"
                                                        value="<?php echo $sub_join[$y]['min_stok'] ?> " readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-3 control-label">Maksimal Stok</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="max_stok" class="form-control"
                                                        value="<?php echo $sub_join[$y]['max_stok'] ?> " readonly>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group mt-lg">
                                                    <label class="col-sm-3 control-label">Jumlah Stok di Gudang</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="jumlah_stok" class="form-control"
                                                        value="<?php echo $sub_join[$x]['nama_jabatan'] ?>" readonly>
                                                    </div>
                                                </div> -->
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

                                    <!-- ****************************** MODAL EDIT SUB ***************************** -->
                                    <!-- ************************************************************************** -->
                                    <div id='modaleditsub<?php echo $sub_jenis_material[$y]['id_sub_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Customer/edit_sub_customer" method="post">
                                                <header class="panel-heading">
                                                    <h2 class="panel-title">Edit Data Customer</h2>
                                                </header>

                                                <div class="panel-body">
                                                    <input type="hidden" name="id_sub_jenis_material" class="form-control" value="<?php echo $sub_jenis_material[$y]['id_sub_jenis_material']?>" readonly>
                                                    <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[$x]['id_jenis_material']?>" readonly>
                                                    
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-3 control-label">Nama Sub Jenis Material</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nama_sub_jenis_material" class="form-control"
                                                            value="<?php echo $sub_join[$y]['nama_sub_jenis_material']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-3 control-label">Kode Sub Jenis Material</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="kode_sub_jenis_material" class="form-control"
                                                            value="<?php echo $sub_join[$y]['kode_sub_jenis_material']?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-3 control-label">Jenis Material</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="jenis" class="form-control"
                                                            value="<?php echo $sub_join[$y]['nama_jenis_material'] ?> ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-3 control-label">Satuan Ukuran</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="satuan" class="form-control"
                                                            value="<?php echo $sub_join[$y]['satuan_ukuran'] ?> ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-3 control-label">Minimal Stok</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="min_stok" class="form-control"
                                                            value="<?php echo $sub_join[$y]['min_stok'] ?> ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-3 control-label">Maksimal Stok</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="max_stok" class="form-control"
                                                            value="<?php echo $sub_join[$y]['max_stok'] ?> ">
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
                                    <!-- *************************** END MODAL EDIT SUB *************************** -->
                                    <!-- ************************************************************************** -->


                                    <!-- ***************************** MODAL HAPUS SUB **************************** -->
                                    <!-- ************************************************************************** -->
                                    <div id='modalhapussub<?php echo $sub_jenis_material[$y]['id_sub_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Customer/hapus_customer" method="post">
                                                <header class="panel-heading">
                                                    <h2 class="panel-title">Hapus Data Sub Jenis</h2>
                                                </header>

                                                <div class="panel-body" style="color: black">
                                                    <input type="hidden" name="sub_jenis_material" class="form-control" value="<?php echo $sub_jenis_material[$y]['id_sub_jenis_material']?>" readonly>
                                                    Apakah anda yakin akan menghapus data sub jenis material <?php echo $sub_jenis_material[$y]['nama_sub_jenis_material']?>?
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
                                    <!-- *************************** END MODAL HAPUS SUB ************************** -->
                                    <!-- ************************************************************************** -->

                                <?php }} ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>



                    <!-- ******************************* MODAL EDIT ******************************* -->
                    <!-- ************************************************************************** -->
                    <div id='modaledit<?php //echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
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


                    <!-- ******************************* MODAL HAPUS ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modalhapus<?php //echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Hapus Data Jenis Material</h2>
                                </header>

                                <div class="panel-body" style="color: black">
                                    Apakah anda yakin akan menghapus data jenis material <?php //echo $material[$x]['nama_material']?>Foam?
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


                    <!-- ***************************** MODAL TAMBAH SUB *************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modaltambahsub<?php echo $jenis_material[$x]['id_jenis_material'] ?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>JenisMaterial/tambah_sub_jenis_material" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Masukkan Data Jenis Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_sub_jenis_material" class="form-control" value="SUBJM-<?php echo $jumlah_sub_jenis_material + 1?>" readonly>
                                    <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[$x]['id_jenis_material']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Sub Jenis Material<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama_sub_jenis_material" class="form-control"
                                            placeholder="Nama sub jenis material"  required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Kode Sub Jenis Material<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kode_sub_jenis_material" class="form-control"
                                            placeholder="Kode sub jenis material"  required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Satuan Ukuran<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="satuan" class="form-control"
                                            placeholder="Satuan ukuran" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Minimal Stok<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" name="min_stok" class="form-control"
                                            placeholder="Minimal stok" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Maksimal Stok<span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" name="max_stok" class="form-control"
                                            placeholder="Maksimal stok" required>
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



                <?php }} ?>
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
