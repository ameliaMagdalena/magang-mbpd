<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Purchase Order Supplier</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Purchase Order Supplier</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Purchase Order Supplier</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/insert" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Purchase Order Supplier</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_po_supplier" class="form-control" value="POS-<?php echo $jumlah_po_sup + 1?>" readonly>
					
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" name="tgl_po" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" class="form-control" name="no_po_supplier">
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" required>
                            <?php for($a=0; $a<count($supplier); $a++){ ?>
                                <option value="<?php echo $supplier[$a]['id_supplier'] ?>">
                                    <?php echo $supplier[$a]['nama_supplier'];?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Pengiriman<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" value="">
                    </div>
                </div>
                <br>
                <table class = "table table-bordered table-striped table-hover" border="1" id="tabel_material">
                    <thead>
                        <tr>
                            <th style="text-align:center" class="col-lg-4">Material</th>
                            <th style="text-align:center" class="col-lg-2">Jumlah</th>
                            <th style="text-align:center" class="col-lg-2">Satuan</th>
                            <th style="text-align:center" class="col-lg-2">Harga</th>
                            <th style="text-align:center" class="col-lg-2">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody id = "print_new_row">
                    </tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a id="tambah" onclick = "addNewRow()" style="cursor:pointer">+ Tambah</a></td>
                    </tr>
                </table>

                <br>
                
                <div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Total Harga Sebelum Pajak</label>
                        <div class="col-sm-7">
                            <input type="text" name="total_sebelum_pajak" id="total_sebelum_pajak" class="form-control" required readonly>
                            <input type="hidden" name="total_sebelum_pajaknya" id="total_sebelum_pajaknya" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">PPN</label>
                        <div class="col-sm-7">
                            <input type="text" name="ppn" id="ppn" class="form-control" required readonly>
                            <input type="hidden" name="ppnnya" id="ppnnya" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Total Harga</label>
                        <div class="col-sm-7">
                            <input type="text" name="total_harga" id="total_harga" class="form-control" required readonly>
                            <input type="hidden" name="total_harganya" id="total_harganya" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <input type="text" name="keterangan" class="form-control"
                            value="">
                        </div>
                    </div>
                </div>

                <br>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="simpan" class="btn btn-primary float-right" value="Simpan">
                        </div>
                    </div>
                </footer>

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
    $('#supplier').change(function() {
        var length = document.getElementById("print_new_row").rows.length;
        var z;
        for(z=0; z<length; z++){
            document.getElementById("print_new_row").deleteRow(0);
        }
    });
</script>

<script>
    function addNewRow(){
        var counter = $(".new_row").length;
        var id_supplier = $("#supplier").val();
        html =
        '<tr class = "new_row">'+
            '<td class="col-lg-3">'+
            '<input type ="hidden" name = "row" value = '+counter+'>'+
                '<select data-plugin-selectTwo class="form-control" name="material'+counter+'" id="material'+counter+'" onchange="getHargaSatuan('+counter+'); getSatuan('+counter+')" required>'+
                '</select>'+
            '</td>'+
            '<td class="col-lg-1">'+
                '<input class="form-control" type="number" name="jumlah'+counter+'" id="jumlah'+counter+'" min="0" onkeyup="countHargaTotal('+counter+'); totalHarga();" onclick="countHargaTotal('+counter+'); totalHarga();" required>'+
            '</td>'+
            '<td class="col-lg-1">'+
                '<input class="form-control" type="text" name="satuan'+counter+'" id="satuan'+counter+'" readonly>'+
            '</td>'+
            '<td class="col-2">'+
                '<input class="form-control" type="number" name="harga_satuan'+counter+'" id="harga_satuan'+counter+'" readonly>'+
            '</td>'+
            '<td class="col-2">'+
                '<input class="form-control" type="number" name="harga_total'+counter+'" id="harga_total'+counter+'" readonly>'+
            '</td>'+
        '</tr>';
        $("#print_new_row").append(html);
        getMaterial(counter);
    }
</script>

<script>
    function getMaterial(counter){
        var id_supplier = $("#supplier").val();
        <?php for($b=0; $b<count($material); $b++){  ?>
            if (id_supplier == '<?php echo $material[$b]['id_supplier'] ?>') {
                html =
                '<option value="<?php echo $material[$b]['id_sub_jenis_material']?>">'+
                    '<?php echo $material[$b]['kode_sub_jenis_material'] . ' - ' . $material[$b]['nama_jenis_material'] . ' ' . $material[$b]['nama_sub_jenis_material']; ?>'+
                '</option>';
                $("#material"+counter).append(html);
                getHargaSatuan(counter);
                getSatuan(counter);
            }
        <?php } ?>
    }
</script>

<script>
    function getSatuan(countt){
        var id_sub_jenis_material = $("#material"+countt).val();
        $.ajax({
            url:"<?php echo base_url();?>PurchaseOrderSupplier/satuan_ukuran",
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
    function getHargaSatuan(countt){
        var id_sub_jenis_material = $("#material"+countt).val();
        $.ajax({
            url:"<?php echo base_url();?>PurchaseOrderSupplier/harga_material",
            type:"POST",
            dataType:"JSON",
            data:{id_sub_jenis_material:id_sub_jenis_material},
            success:function(respond){
                $("#harga_satuan"+countt).val(respond[0]["harga_material"]);
                countHargaTotal(countt);
                totalHarga();
            }
        });
    }
</script>

<script>
    function countHargaTotal(countt){
        var jumlah = $("#jumlah"+countt).val();
        var harga_satuan = $("#harga_satuan"+countt).val();

        var harga = jumlah*harga_satuan;
        $("#harga_total"+countt).val(harga);
    }
</script>

<script>
    function totalHarga(){
        var counter = $(".new_row").length;
        var total = 0;
        for(var y=0; y<counter; y++){
            total += parseInt($("#harga_total"+y).val());
        }
        
        //$("#total_sebelum_pajak").html("Rp " + number_format(total, "", "", ".") + ",-");
        $("#total_sebelum_pajak").val(total);
        $("#total_sebelum_pajaknya").val(total);
        
        //***** PAJAK */
        var pajak = total*10/100;
        $("#ppn").val(pajak);
        $("#ppnnya").val(pajak);
        
        //***** SETELAH PAJAK */
        var totalll = total+pajak;
        //$("#total_harga").html("Rp " + number_format(total, "", "", ".") + ",-");
        $("#total_harga").val(totalll);
        $("#total_harganya").val(totalll);
    }
</script>

<script>
    function reload() {
    location.reload();
    }
</script>
    