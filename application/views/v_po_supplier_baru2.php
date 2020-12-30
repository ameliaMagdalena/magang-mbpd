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

<h1>Purchase Order Supplier - Permintaan Pembelian</h1>
<hr>

<?php
    //konversi int ke romawi
    //from https://stackoverflow.com/questions/14994941/numbers-to-roman-numbers-with-php
    function integerToRoman($integer){
        $integer = intval($integer);
        $rom = '';
        // Create a lookup array that contains all of the Roman numerals.
        $lookup = array('M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1);
        foreach($lookup as $roman => $value){
            // Determine the number of matches
            $matches = intval($integer/$value);
            // Add the same number of characters to the string
            $rom .= str_repeat($roman,$matches);
            // Set the integer to be the remainder of the integer and the value
            $integer = $integer % $value;
        }
        // The Roman numeral should be built, return it
        return $rom;
    }
?>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/insert2" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Purchase Order Supplier</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_po_supplier" class="form-control" value="POS-<?php echo $jumlah_po_sup + 1?>" readonly>
					
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" name="tgl_po" class="form-control" min="<?= date('Y-m-01') ?>" max="<?= date('Y-m-d')?>" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" name="no_po_supplier" id="no_po" class="form-control"
                            value="MBP/PO/<?= integerToRoman(date('m')) ."/". date('Y') ."/"?><?= count($kodepo)+1 ?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" required>
                            <?php for($a=0; $a<count($supplier2); $a++){ ?>
                                <option value="<?php echo $supplier2[$a]['id_supplier'] ?>">
                                    <?php echo $supplier2[$a]['nama_supplier'];?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Pengiriman<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" value="" required>
                    </div>
                </div>

                <div class="form-group mt-lg">
					<h4 style="text-align:center">Data Material</h4>
                </div>
                <table class = "table table-bordered table-striped table-hover" border="1" id="tabel_material">
                    <thead>
                        <tr>
                            <th style="text-align:center" class="col-lg-3">Permintaan Pembelian</th>
                            <th style="text-align:center" class="col-lg-3">Material</th>
                            <th style="text-align:center" class="col-lg-1">Jumlah</th>
                            <th style="text-align:center" class="col-lg-1">Satuan</th>
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
            '<td class="col-lg-2">'+
            '<input type ="hidden" name = "row" value = '+counter+'>'+
                '<select data-plugin-selectTwo class="form-control" name="permintaan'+counter+'" id="permintaan'+counter+'" onchange="getMaterial('+counter+')" required>'+
                '</select>'+
            '</td>'+
            '<td class="col-lg-3">'+
                '<select data-plugin-selectTwo class="form-control" name="material'+counter+'" id="material'+counter+'" onchange="getHargaSatuan('+counter+'); getSatuan('+counter+')" required>'+
                '</select>'+
            '</td>'+
            '<td class="col-lg-1">'+
                '<input class="form-control" type="number" name="jumlah'+counter+'" id="jumlah'+counter+'" min="0" onkeyup="countHargaTotal('+counter+'); totalHarga();" onclick="countHargaTotal('+counter+'); totalHarga();" required>'+
                '<small name="jlhminta'+counter+'" id="jlhminta'+counter+'"></small>'+
            '</td>'+
            '<td class="col-lg-1">'+
                '<input class="form-control" type="text" name="satuan'+counter+'" id="satuan'+counter+'" readonly>'+
            '</td>'+
            '<td class="col-lg-2">'+
                '<input class="form-control" type="number" name="harga_satuan'+counter+'" id="harga_satuan'+counter+'" readonly>'+
            '</td>'+
            '<td class="col-lg-3">'+
                '<input class="form-control" type="number" name="harga_total'+counter+'" id="harga_total'+counter+'" readonly>'+
            '</td>'+
        '</tr>';
        $("#print_new_row").append(html);
        getBeli(counter);
        //getMaterial(counter);
    }
</script>

<script>
    function getBeli(counter){
        var id_supplier = $("#supplier").val();
        var id_permintaan = $("#permintaan"+counter).val();

        <?php for($m=0; $m<count($darisupp); $m++){  ?>
            if (id_supplier == '<?php echo $darisupp[$m]['id_supplier'] ?>') {
                html =
                '<option value="<?php echo $darisupp[$m]['id_permintaan_pembelian']?>">'+
                    '<?php echo $darisupp[$m]['id_permintaan_pembelian'] ?>'+
                '</option>';
                $("#permintaan"+counter).append(html);
                getMaterial(counter);
            }
        <?php } ?>
    }
</script>

<script>
    function getMaterial(counter){
        var id_supplier = $("#supplier").val();
        var id_permintaan = $("#permintaan"+counter).val();

        <?php for($bb=0; $bb<count($darisupp); $bb++){
        for($b=0; $b<count($material); $b++){  ?>
            if (id_supplier == '<?php echo $material[$b]['id_supplier'] ?>' && '<?php echo $material[$b]['id_sub_jenis_material'] ?>' == '<?php echo $darisupp[$bb]['id_sub_jenis_material'] ?>') {
                html =
                '<option value="<?php echo $material[$b]['id_sub_jenis_material']?>">'+
                    '<?php echo $material[$b]['kode_sub_jenis_material'] . ' - ' . $material[$b]['nama_jenis_material'] . ' ' . $material[$b]['nama_sub_jenis_material']; ?>'+
                '</option>';
                $("#material"+counter).append(html);
                getHargaSatuan(counter);
                getSatuan(counter);
                getJumlah(counter);
            }
        <?php } } ?>
    }
</script>

<script>
    function getJumlah(countt){
        var id_permintaan = $("#permintaan"+countt).val();
        $.ajax({
            url:"<?php echo base_url();?>PurchaseOrderSupplier/jumlah_minta",
            type:"POST",
            dataType:"JSON",
            data:{id_permintaan:id_permintaan},
            success:function(respond){
                html = 'Jumlah Diminta: '+respond[0]["jumlah_beli"];
                $("#jlhminta"+countt).append(html);
            }
        });
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
    