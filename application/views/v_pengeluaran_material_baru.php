<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengeluaran Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pengeluaran Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pengeluaran Material</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Pengeluaran Material</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_user" class="form-control" value="BM-<?php //echo $jumlah_user + 1?>" readonly>
					
                
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Keluar<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" placeholder="">
                    </div>
                </div>
				<!-- <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Jenis Material<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" required>
							<option value="">Foam</option>
                            <option value="">Kain</option>
                            <option value="">dll</option>
						</select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Jumlah Material<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="number" class="form-control" placeholder="">
                    </div>
                </div> -->
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Keterangan Keluar<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
            <br>
            <table class = "table table-bordered table-striped table-hover" border="1">
                <thead>
                    <tr>
                        <th style="text-align:center">Jenis Material</th>
                        <th style="text-align:center">Jumlah</th>
                        <th style="text-align:center">Satuan</th>
                    </tr>
                </thead>
                <tbody id = "detail_print_container">
                </tbody>
                <tr class = "new_row">
                    <td>
                        <select class="form-control" name="supplier" id="supplier" required>
                            <option value="">Foam</option>
                            <option value="">Kain</option>
                            <option value="">dll</option>
                        </select>
                    </td>
                    <td>
                        <input class="form-control" type="text">
                    </td>
                    <td>
                        <input class="form-control" type="text" readonly>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a id="tambah" onclick = "addNewRow()" style="cursor:pointer">+ Tambah</a></td>
                </tr>
                
            </table>
            <br>
            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
</div>
		</form>
	</section>






<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>

<script>
function addNewRow(){
    var counter = $(".new_row").length;
    html = '<tr class = "new_row"><td><select class="form-control" name="supplier" id="supplier" required><option value="">Foam</option><option value="">Kain</option><option value="">dll</option></select></td><td><input class="form-control" type="text"></td><td><input class="form-control" type="text" readonly></td></tr>';
    $("#detail_print_container").append(html);
    
}
</script>

<script>
    function reload() {
    location.reload();
    }
</script>
    