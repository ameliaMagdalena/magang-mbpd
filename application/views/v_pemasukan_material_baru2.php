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
                <input type="hidden" name="keterangan" class="form-control" value="1" readonly>
                <input type="hidden" name="lain" class="form-control" value="" readonly>
					
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Masuk</label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk"  max="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Line</label>
					<div class="col-sm-7">
                        <select class="form-control" name="line" id="line" required>
                            <?php for($x=0; $x<count($line); $x++){ ?>
                                <option value="<?= $line[$x]['id_line']?>"><?= $line[$x]['nama_line'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
					<h4 style="text-align:center">Data Material</h4>
                </div>
                <table class = "table table-bordered table-striped table-hover" border="1" id="tabel_material">
                    <thead>
                        <tr>
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center" class="col-lg-6">Material</th>
                            <th style="text-align:center" class="col-lg-3">Jumlah</th>
                            <th style="text-align:center" class="col-lg-3">Satuan</th>
                        </tr>
                    </thead>
                    <tbody id = "print_row">
                    </tbody>
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a id="tambah" onclick = "addNewRow()" style="cursor:pointer">+ Tambah</a></td>
                    </tr>

                </table>

                <br>


				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Dicek oleh<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="dicek">
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
    function addNewRow(){
        var counter = $(".new_row").length;
        var id_supplier = $("#supplier").val();

        html =
        '<tr class = "new_row">'+
            '<td style="text-align:center">'+
                '<input type ="hidden" name = "row" value="'+counter+'">'+
                (counter+1) +
            '</td>'+
            '<td class="col-lg-2">'+
                '<select data-plugin-selectTwo class="form-control" name="material'+counter+'" id="material'+counter+'" onchange="getSatuan('+counter+')" required>'+
                    '<option class="dropdown-header"> Pilih Material </option>'+
                    '<?php for($a=0; $a<count($sub_jenis_material); $a++){ ?>'+
                        '<option value="<?= $sub_jenis_material[$a]['id_sub_jenis_material']?>">'+
                        '<?= $sub_jenis_material[$a]['kode_sub_jenis_material'] ." - ".$sub_jenis_material[$a]['nama_jenis_material'] . " " . $sub_jenis_material[$a]['nama_sub_jenis_material']?></option>'+
                    '<?php } ?>'+
                '</select>'+
            '</td>'+
            '<td class="col-lg-1">'+
                '<input class="form-control" type="number" name="jlh'+counter+'" id="jlh'+counter+'" min="0" required>'+
            '</td>'+
            '<td class="col-lg-2">'+
                '<input class="form-control" type="text" name="satuan'+counter+'" id="satuan'+counter+'" readonly>'+
            '</td>'+
        '</tr>';
        $("#print_row").append(html);
    }
</script>

<script>
    function getSatuan(countt){
        var id_sub_jenis_material = $("#material"+countt).val();
        $.ajax({
            url:"<?php echo base_url();?>PemasukanMaterial/satuan_ukuran",
            type:"POST",
            dataType:"JSON",
            data:{id_sub_jenis_material:id_sub_jenis_material},
            success:function(respond){
                $("#satuan"+countt).val(respond[0]["satuan_ukuran"]);
            }
        });
    }
</script>

<script>
    function reload() {
        location.reload();
    }
</script>
    