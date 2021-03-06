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

<?php if(($_SESSION['nama_jabatan'] == "Direktur") && ($_SESSION['nama_departemen'] == "Management")
    || ($_SESSION['nama_jabatan'] == "PPIC") && ($_SESSION['nama_departemen'] == "Material")){?>
        <a class="modal-with-form btn btn-success" href="#modaltambah">+ Tambah Jenis Material</a>
<?php } ?>


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
                <div class="form-group mt-lg">
					<label class="col-sm-4 control-label">Sumber Jenis Material<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="sumber" required>
                            <option value="0">Supplier</option>
                            <option value="1">Produksi</option>
                        </select>
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
                    <th class="col-1">No.</th>
                    <th class="col-lg-3">Nama Jenis Material</th>
                    <th class="col-lg-3">Kode Jenis Material</th>
                    <th class="col-lg-2">Sumber</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<count($jenis_material) ; $x++){
                ?>
                    <tr>
                        </td>
                        <td><?php echo $x+1?> </td>
                        <td><?php echo $jenis_material[$x]['nama_jenis_material']?> </td>
                        <td><?php echo $jenis_material[$x]['kode_jenis_material']?> </td>
                        <td><?php if ($jenis_material[$x]['sumber_material'] == 0){
                            echo "Supplier";
                        } else{
                            echo "Produksi";
                        }?> </td>
                        <td>
                            <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="<?php echo base_url() . "JenisMaterial/sub_jenis_material/" . $jenis_material[$x]['id_jenis_material'] ?>"></a>
                            
                            <?php if(($_SESSION['nama_jabatan'] == "Direktur") && ($_SESSION['nama_departemen'] == "Management")
                                || ($_SESSION['nama_jabatan'] == "PPIC") && ($_SESSION['nama_departemen'] == "Material")){?>
                                    <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                        title="Edit" href="#modaledit<?php echo $jenis_material[$x]['id_jenis_material'] ?>"></a>
                                    <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                        title="Delete" href="#modalhapus<?php echo $jenis_material[$x]['id_jenis_material'] ?>"></a>
                            <?php } ?>
                        </td>
                    </tr>

                    <!-- ******************************* MODAL EDIT ******************************* -->
                    <!-- ************************************************************************** -->
                    <div id='modaledit<?php echo $jenis_material[$x]['id_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>JenisMaterial/edit_jenis_material" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Edit Data Jenis Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[$x]['id_jenis_material']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama_jenis_material" class="form-control"
                                            value="<?php echo $jenis_material[$x]['nama_jenis_material']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Kode Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="kode_jenis_material" class="form-control"
                                            value="<?php echo $jenis_material[$x]['kode_jenis_material']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Sumber Jenis Material</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="sumber" required>
                                                <option value="0" <?php if ($jenis_material[$x]['sumber_material'] == 0){ echo "selected"; } ?>>Supplier</option>
                                                <option value="1" <?php if ($jenis_material[$x]['sumber_material'] == 1){ echo "selected"; } ?>>Produksi</option>
                                            </select>
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
                    <div id='modalhapus<?php echo $jenis_material[$x]['id_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>JenisMaterial/hapus_jenis_material" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Hapus Data Jenis Material</h2>
                                </header>

                                <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[$x]['id_jenis_material']?>" readonly>
                                    
                                <div class="panel-body" style="color: black">
                                    Apakah anda yakin akan menghapus data jenis material <?php echo $jenis_material[$x]['nama_jenis_material']?>?
                                    <br><br>
                                    Note: Data sub jenis material juga akan terhapus.
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
