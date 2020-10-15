<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pemasukan Material Baru</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pemasukan Material Baru</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pemasukan Material Baru</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PemasukanMaterial/tambah_pemasukan" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Pemasukan Material Baru</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_pemasukan_material" class="form-control" value="MASUK-<?php echo $jumlah_pemasukan + 1?>" readonly>
					
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Masuk<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Keterangan Masuk<span class="required">*</span></label>
					<div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="keterangan" id="keterangan1" value="0" checked=""> Dari Supplier
                                <div id="dari_supplier">
                                    <select class="form-control delivery_note" name="delivery_note">
                                        <option> test
                                        </option>
                                    </select>
                                    
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="date" name="tanggal_pengantaran" min="<?php echo date("Y-m-d")?>" class="form-control pengantarya">
                                    </div>
                                    <span>*deskripsikan tanggal pengantaran</span>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                    <input type="time" class="form-control" name = "waktu_pengantaran" min="07:00" max="16:00"  pengantarya>
                                    </div>
                                    <span>*deskripsikan waktu pengantaran (jam kerja Senin-Jumat, pukul 07.00 sampai 16.00)</span> -->
                                </div>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="keterangan" id="keterangan2" value="1">
                                Dari Produksi
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="keterangan" id="keterangan3" value="2">
                                Lain-lain
                            </label>
                        </div>
                    </div>
                </div>
				<!-- <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" onchange="jenisMaterial()" required>
                            <?php for($x=0; $x<count($supplier); $x++){ ?>
                                <option value="<?php echo $supplier[$x]['id_supplier'] ?>">
                                    <?php echo $supplier[$x]['nama_supplier'] ?>
                                </option>
                            <?php } ?>
						</select>
                    </div>
                </div>
				<div class="form-group mt-lg"> -->
                    <!-- berubah sesuai pilihan supplier
					<label class="col-sm-3 control-label">Jenis Material<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="jenis_material" id="jenis_material" required>
							<option value=""></option>
						</select>
                    </div>
                </div> -->
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Jumlah Material<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="number" class="form-control" name="jumlah" id="jumlah" >
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <!-- ini required kalau radio button pilih lainlain -->
					<label class="col-sm-3 control-label catatan">Catatan</label>
					<div class="col-sm-7">
                        <input type="text" class="form-control" name="catatan" id="catatan" >
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
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>


<script>
    function jenisMaterial(){
        var id_supplier = $("#supplier").val();
        $.ajax({
            url:"<?php echo base_url();?>PemasukanMaterial/jenis_material",
            type:"POST",
            dataType:"JSON",
            data:{id_supplier:id_supplier},
            success:function(respond){
                var html = '';
                for(a=0; a<data.length; a++){
                    html += '<option value='+data[a].id_sub_jenis_material+'>'+data[a].nama_jenis_material+data[a].nama_sub_jenis_material+'</option>';
                }
                $('#jenis_material').html(html);
 
                //$("#jenis_material").val(respond[0]["id_jenis_material"]);
            }
        });
    }
</script>


<script>
$('#dari_supplier').show();
$('#dari_produksi').hide();

$('#keterangan1').click(function() {
    if($('#keterangan1').is(':checked')) { 
        $('#dari_supplier').show();
        $('#dari_produksi').hide();
        $('.delivery_note').attr('required', true);
        $('.permintaan_material').attr('required', false);
    }
});
$('#keterangan2').click(function() {
   if($('#keterangan2').is(':checked')) {
        $('#dari_supplier').hide();
        $('#dari_produksi').show();
        $('.permintaan_material').attr('required', true);
        $('.delivery_note').attr('required', false);
    }
});
$('#keterangan3').click(function() {
   if($('#keterangan3').is(':checked')) {
        $('#dari_supplier').hide();
        $('#dari_produksi').hide();
        $('#catatan_req').show();
        $('.permintaan_material').attr('required', false);
        $('.delivery_note').attr('required', false);
        $('.catatan').attr('required', true);
    }
});
</script>

<script>
    function reload() {
    location.reload();
    }
</script>
    