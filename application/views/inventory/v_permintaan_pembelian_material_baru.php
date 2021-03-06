<!--*****************************-->
<?php include('application/views/_css.php'); ?>
<?php include('application/views/_header.php'); ?>
<?php include('application/views/_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pembelian Material Baru</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pembelian Material Baru</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pembelian Material Baru</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Purchase Order Supplier</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_user" class="form-control" value="BM-<?php //echo $jumlah_user + 1?>" readonly>
				
				
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Material<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="material" id="dept" required>
							<option value="">Foam</option>
                            <option value="">Benang</option>
                            <option value="">Kain</option>
						</select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" required>
							<option value="">INOAC</option>
                            <option value="">dll</option>
                            <option value="">dll</option>
						</select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Jumlah<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="number" class="form-control" placeholder="sampai max stok otomatis">
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Harga<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text"class="form-control" placeholder="harga otomatis dari db" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<div class="col-sm-12" style="text-align: right">
                        <button class="btn btn-success"> + Tambah </button>
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






<!--*****************************-->
<?php include('application/views/_endtitle.php'); ?>
<?php include('application/views/_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>

<script>
    function reload() {
    location.reload();
    }
</script>
    