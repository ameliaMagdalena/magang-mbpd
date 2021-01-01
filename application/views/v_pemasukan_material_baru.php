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
				<input type="hidden" name="pilihan" class="form-control" value="<?= $pilihan ?>" readonly>
                <input type="hidden" name="keterangan" class="form-control" value="0" readonly>
                <input type="hidden" name="lain" class="form-control" value="" readonly>

                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">No. DN<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="id_dn" id="dnnya" onchange="getTgl(); getSupplier(); addNewRow()" required>
                            <option value="0" class="dropdown-header"> Pilih Delivery Note </option>
                            <?php for($a=0; $a<count($dn); $a++){ ?>
                                <option value="<?= $dn[$a]['id_delivery_note'] ?>"> <?= $dn[$a]['kode_delivery_note'] ?> </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Masuk</label>
					<div class="col-sm-7">
                        <input type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier</label>
					<div class="col-sm-7">
                        <input type="text" class="form-control" name="supplier" id="supplier" readonly>
                    </div>
                </div>

                <div class="form-group mt-lg">
					<h4 style="text-align:center">Data Material</h4>
                </div>
                <table class = "table table-bordered table-striped table-hover" border="1" id="tabel_material">
                    <thead>
                        <tr>
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center" class="col-lg-2">Kode Material</th>
                            <th style="text-align:center" class="col-lg-4">Deskripsi</th>
                            <th style="text-align:center" class="col-lg-1">Jumlah Diminta</th>
                            <th style="text-align:center" class="col-lg-1">Jumlah Aktual</th>
                            <th style="text-align:center" class="col-lg-2">Satuan</th>
                            <th style="text-align:center" class="col-lg-2">Remark</th>
                        </tr>
                    </thead>
                    <tbody id = "print_row">
                    </tbody>
                </table>

                <br>

				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Dicek oleh<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="dicek" required>
							<?php for($b=0; $b<count($kary); $b++){ ?>
                                <option value="<?= $kary[$b]['id_user'] ?>"
                                    <?php if($kary[$b]['id_user'] == $_SESSION['id_user']) { echo "selected"; } ?>>
                                    <?= $kary[$b]['nama_karyawan'] ?>
                                </option>
                            <?php }?>
						</select>
                    </div>
                </div>
                <br>
            </div>
            <footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<input type="submit" id="masukkan" class="btn btn-primary" value="Simpan">
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
    $(document).ready(function() {
        $(':input[type="submit"]').prop('disabled', true);
    });
    $('#dnnya').on('change', function() {
        if($('#dnnya').val() == "0"){
            $(':input[type="submit"]').prop('disabled', true);
        }
        else{
            $(':input[type="submit"]').prop('disabled', false);
        }
    });
</script>

<script>
    function getTgl(){
        $("#tgl_masuk").val("");
        var id_delivery_note = $("#dnnya").val();
        $.ajax({
            url:"<?php echo base_url();?>PemasukanMaterial/get_tanggal_terima",
            type:"POST",
            dataType:"JSON",
            data:{id_delivery_note:id_delivery_note},
            success:function(respond){
                $("#tgl_masuk").val(respond[0]["tanggal_penerimaan"]);
            }
        });
    }
</script>

<script>
    function getSupplier(){
        $("#supplier").val("");
        var id_delivery_note = $("#dnnya").val();
        $.ajax({
            url:"<?php echo base_url();?>PemasukanMaterial/get_supplier",
            type:"POST",
            dataType:"JSON",
            data:{id_delivery_note:id_delivery_note},
            success:function(respond){
                $("#supplier").val(respond[0]["nama_supplier"]);
            }
        });
    }
</script>


<script>
    function addNewRow(){
        var counter = document.getElementById("print_row").rows.length;
        var z;
        for(z=0; z<counter; z++){
            document.getElementById("print_row").deleteRow(0);
        }
        
        var id_delivery_note = $("#dnnya").val();
        $.ajax({
            url:"<?php echo base_url();?>PemasukanMaterial/get_detail_dn",
            type:"POST",
            dataType:"JSON",
            data:{id_delivery_note:id_delivery_note},
            success:function(respond){
                for (cek=0; cek<respond.length; cek++){
                    html =
                    '<tr class = "new_row">'+
                        '<td style="text-align:center">'+
                            '<input type ="text" name="detailnya'+cek+'" value="'+respond[cek]["id_detail_delivery_note"]+'" readonly>'+
                            '<input type ="hidden" name="row" value="'+cek+'">'+
                            (cek+1) +
                        '</td>'+
                        '<td class="col-lg-2">'+
                            '<input class="form-control" type="text" name="kodemat'+cek+'" id="kodemat'+cek+'"'+
                            'value="'+respond[cek]["kode_sub_jenis_material"]+'" readonly>'+
                            '<input class="form-control" type="hidden" name="idmat'+cek+'" id="idmat'+cek+'"'+
                            'value="'+respond[cek]["id_sub_jenis_material"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-4">'+
                            '<input class="form-control" type="text" name="desc'+cek+'" id="desc'+cek+'"'+
                            'value="'+respond[cek]["nama_jenis_material"]+' '+respond[cek]["nama_sub_jenis_material"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-1">'+
                            '<input class="form-control" type="number" name="jlhminta'+cek+'" id="jlhminta'+cek+'"'+
                            'value="'+respond[cek]["jumlah_diminta"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-1">'+
                            '<input class="form-control" type="number" name="jlhakt'+cek+'" id="jlhakt'+cek+'" min="0" required>'+
                        '</td>'+
                        '<td class="col-lg-2">'+
                            '<input class="form-control" type="text" name="satuan'+cek+'" id="satuan'+cek+'"'+
                            'value="'+respond[cek]["satuan_ukuran"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-2">'+
                            '<input class="form-control" type="text" name="remark'+cek+'" id="remark'+cek+'">'+
                        '</td>'+
                    '</tr>';
                    $("#print_row").append(html);
                }
            }
        });        
    }
</script>

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
    /* $('#dari_supplier').show();
    $('#jenis').hide();
    $('#jumlah').hide();
    $('#line').hide();

    $('#keterangan1').click(function() { //supplier
        if($('#keterangan1').is(':checked')) { 
            $('#dari_supplier').show();
            $('#jenis').hide();
            $('#jumlah').hide();
            $('#line').hide();
            $('.jenis_material').attr('required', false);
            $('.jumlah_material').attr('required', false);
            $('.line').attr('required', false);
            $('.delivery_note').attr('required', true);
            $('.permintaan_material').attr('required', false);
            $('.catatan').attr('required', false);
        }
    });

    $('#keterangan2').click(function() { //produksi
    if($('#keterangan2').is(':checked')) {
            $('#dari_supplier').hide();
            $('#jenis').show();
            $('#jumlah').show();
            $('#line').show();
            $('.jenis_material').attr('required', true);
            $('.jumlah_material').attr('required', true);
            $('.line').attr('required', true);
            $('.permintaan_material').attr('required', true);
            $('.delivery_note').attr('required', false);
            $('.catatan').attr('required', false);
        }
    });
    
    $('#keterangan3').click(function() { //lainlain
    if($('#keterangan3').is(':checked')) {
            $('#dari_supplier').hide();
            $('#jenis').show();
            $('#jumlah').show();
            $('#line').hide();
            $('.jenis_material').attr('required', true);
            $('.jumlah_material').attr('required', true);
            $('.line').attr('required', false);
            $('.permintaan_material').attr('required', false);
            $('.delivery_note').attr('required', false);
            $('.catatan').attr('required', true);
        }
    }); */
</script>

<script>
    function reload() {
        location.reload();
    }
</script>
    