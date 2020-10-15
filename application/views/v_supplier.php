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

<h1>Supplier</h1>
<hr>
<a class="modal-with-form btn btn-success" href="#modaltambah">+ Tambah Supplier</a>



<!-- ************************* MODAL TAMBAH SUPPLIER ************************** -->
<!-- ************************************************************************** -->
<div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>Supplier/tambah_supplier" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Masukkan Data Supplier</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_supplier" class="form-control" value="SUP-<?php echo $jumlah_supplier + 1?>" readonly>
				<input type="hidden" name="id_detail_supplier" class="form-control" value="DETSUP-<?php echo $jumlah_detail_supplier + 1?>" readonly>
					
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nama<span class="required">*</span></label>
					<div class="col-sm-7">
						<input type="text" name="nama_supplier" class="form-control"
                        placeholder="Nama lengkap supplier"  required>
					</div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">No. Telp.<span class="required">*</span></label>
					<div class="col-sm-7">
						<input type="text" name="no_telp_supplier" class="form-control"
                        placeholder="No. telepon"  required>
					</div>
				</div>
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">E-mail<span class="required">*</span></label>
					<div class="col-sm-7">
						<input type="email" name="email_supplier" id="email"
                        class="form-control" placeholder="E-mail supplier" required>
						<p style="font-size:10px; color:red"></p>
					</div>
				</div>
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Alamat<span class="required">*</span></label>
					<div class="col-sm-7">
						<input type="text" name="alamat_supplier"
                        class="form-control" placeholder="Alamat supplier" required>
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


<br><br>


<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Data Supplier</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th class="col-lg-3">Nama</th>
                    <th class="col-lg-2">E-mail</th>
                    <th class="col-lg-2">No. Telp.</th>
                    <th class="col-lg-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for($x=0 ; $x<count($supplier) ; $x++){
                ?>
                    <tr>
                        <td> <?php echo $x+1?></td>
                        <td> <?php echo $supplier[$x]['nama_supplier']?> </a> </td>
                        <td> <?php echo $supplier[$x]['email_supplier']?></td>
                        <td> <?php echo $supplier[$x]['no_telp_supplier']?></td>
                        <td>
                            <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="<?php echo base_url() . 'Supplier/detail_supplier/' . $supplier[$x]['id_supplier'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?php echo $supplier[$x]['id_supplier'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?php echo $supplier[$x]['id_supplier'] ?>"></a>
                            <!-- <a class="btn col-lg-12  btn-info" href="<?php //echo base_url() ?>user/log/<?php //echo $user[$x]['id_user']?>"><i class='fa fa-file'></i> Log</a> -->
                        </td>
                    </tr>


                    <!-- ******************************* MODAL EDIT ******************************* -->
                    <!-- ************************************************************************** -->
                    <div id='modaledit<?php echo $supplier[$x]['id_supplier']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Supplier/edit_supplier" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Edit Data Supplier</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_supplier" class="form-control" value="<?php echo $supplier[$x]['id_supplier']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_supplier" class="form-control"
                                            value="<?php echo $supplier[$x]['nama_supplier']?>">
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">E-mail</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email_supplier" class="form-control"
                                            value="<?php echo $supplier[$x]['email_supplier'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">No. Telp.</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_telp_supplier" class="form-control"
                                            value="<?php echo $supplier[$x]['no_telp_supplier'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="alamat_supplier" class="form-control"
                                            value="<?php echo $supplier[$x]['alamat_supplier'] ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" class="btn btn-primary" value="Simpan">
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
                    <div id='modalhapus<?php echo $supplier[$x]['id_supplier']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Supplier/hapus_supplier" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Hapus Data Supplier</h2>
                                </header>

                                <div class="panel-body" style="color: black">
                                    <input type="hidden" name="id_supplier" class="form-control" value="<?php echo $supplier[$x]['id_supplier']?>" readonly>
                                    
                                    Apakah anda yakin akan menghapus data supplier <?php echo $supplier[$x]['nama_supplier']?>?
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" class="btn btn-danger" value="Hapus">
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
