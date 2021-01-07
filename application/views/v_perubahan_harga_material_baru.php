<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perubahan Harga Material Baru</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perubahan Harga Material Baru</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Perubahan Harga Material Baru</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PerubahanHargaMaterial/insert" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Perubahan Harga Material</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_perubahan" class="form-control" value="UBAH-<?php echo $ubah + 1?>" readonly>
				
				
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" onchange="getDetail()" onkeyup="getDetail()" required>
                            <option class="dropdown-header" value="kosong">Pilih Supplier</option>
                            <?php for($x=0; $x<count($sup); $x++){ ?>
							    <option value="<?= $sup[$x]['id_supplier'] ?>">
                                    <?= $sup[$x]['nama_supplier'] ?>
                                </option>
                            <?php } ?>
						</select>
                    </div>
                </div>
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Material<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="material" id="material" onchange="getHarga()" onkeyup="getHarga()" required>
                            <option class="dropdown-header" value="kosongi">Pilih Material</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Harga Sebelum<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" class="form-control" name="hrg_sebelum" id="hrg_sebelum" 
                            placeholder="Pilih supplier dan material terlebih dahulu" readonly required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Harga Baru<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="number" name="hrg_sesudah" id="hrg_sesudah" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Keterangan</label>
					<div class="col-sm-7">
                        <input type="text" name="keterangan" class="form-control">
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
    $(document).ready(function(){
        $('#tambah').attr('disabled','disabled');
        $('#material').change(function(){
            if($(this).val != 'kosongi'){
                $('#tambah').removeAttr('disabled');
                $("#material option[value='kosongi']").each(function() {
                    $(this).remove();
                });
            }
        });
    });
</script>

<script>
    function getDetail(){
        var id = $("#supplier").val();
        if (id=="kosong"){
            //var id = $("#material").val("kosong");
            $('#material').html('<option class="dropdown-header" value="kosongi">Pilih Material</option>');
            $("#hrg_sebelum").val("");
            $('#tambah').attr('disabled','disabled');
        }
        else{
            $('#material').html('<option class="dropdown-header" value="kosongi">Pilih Material</option>');
            $("#hrg_sebelum").val("");
            
            $.ajax({
                url:"<?php echo base_url(); ?>PerubahanHargaMaterial/get_supplier",
                type:"POST",
                dataType:"JSON",
                data:{id:id},
                success:function(respond){
                    for($a=0; $a<respond.length; $a++){
                        html =
                        '<option value="'+ respond[$a]["id_detail_supplier"] +'">'+
                            respond[$a]["kode_sub_jenis_material"] + ' - ' +
                            respond[$a]["nama_jenis_material"] + ' ' + respond[$a]["nama_sub_jenis_material"] +
                        '</option>';
                        $("#material").append(html);
                    }
                }
            });
        }
    }
</script>

<script>
    function getHarga(){
        var id = $("#material").val();
        if(id=="kosongi"){
            $("#hrg_sebelum").val("");
        }
        else{
            $.ajax({
                url:"<?php echo base_url(); ?>PerubahanHargaMaterial/get_harga",
                type:"POST",
                dataType:"JSON",
                data:{id:id},
                success:function(respond){
                    harga = respond[0]['harga_material'];
                    $("#hrg_sebelum").val(harga);
                }
            });
        }
    }
</script>

<script>
    function reload() {
    location.reload();
    }
</script>
    