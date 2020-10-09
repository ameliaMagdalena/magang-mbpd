<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Purchase Order Customer</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Purchase Order Customer</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Purchase Order Customer</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/insert" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Purchase Order Customer</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_po_customer" class="form-control" value="POC-<?php echo $jumlah_po_customer + 1?>" readonly>
                
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" name="tgl_po" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" name="no_po_customer" class="form-control" placeholder="format: ..." required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Customer<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="customer" id="customer" required>
                            <?php for($a=0; $a<count($customer); $a++){ ?>
                                <option value="<?php echo $customer[$a]['id_customer'] ?>">
                                    <?php echo $customer[$a]['nama_customer']?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor SO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" name="no_so_customer" class="form-control" placeholder="format: ..." required>
                    </div>
                </div>
                <br>
                <table class = "table table-bordered table-striped table-hover" border="1">
                    <thead>
                        <tr>
                            <th style="text-align:center" class="col-lg-3">Produk</th>
                            <th style="text-align:center" class="col-lg-1">Jumlah</th>
                            <th style="text-align:center" class="col-lg-1">Satuan</th>
                            <th style="text-align:center" class="col-lg-3">Tanggal Penerimaan</th>
                            <th style="text-align:center" class="col-lg-2">Harga Satuan</th>
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
                            <input type="submit" id="tambah" class="btn btn-primary float-right" value="Simpan">
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
<?php //include('_rightbar.php');?>


<script>
    function cekTabel(){
        var counter = $(".new_row").length;
        if(counter<=0){
            $("#tambah").attr("disabled", true);
        }
        else{
            $("#tambah").attr("disabled", false);
        }
    }
</script>


<script>
    function addNewRow(){
        var counter = $(".new_row").length;
        html = '<tr class = "new_row"><td class="col-lg-3"><input type ="hidden" name = "row" value = '+counter+'><select data-plugin-selectTwo class="form-control" name="produk'+counter+'" id="produk'+counter+'" onchange="getHargaSatuan('+counter+')" required><?php for($b=0; $b<count($produk); $b++){ ?><option value="<?php echo $produk[$b]['id_detail_produk']?>"><?php echo $produk[$b]['kode_produk'] . ' - ' . $produk[$b]['nama_produk']; if ($produk[$b]['keterangan'] == 0 || $produk[$b]['keterangan'] == 1){ for ($c=0; $c<count($ukuran); $c++){ if ($produk[$b]['id_ukuran_produk'] == $ukuran[$c]['id_ukuran_produk']){ echo ' ' . $ukuran[$c]['ukuran_produk'];}}} if($produk[$b]['keterangan'] == 0 || $produk[$b]['keterangan'] == 2){ for ($d=0; $d<count($warna); $d++){ if ($produk[$b]['id_warna'] == $warna[$d]['id_warna']){ echo ' '. $warna[$d]['nama_warna'];}}} ?></option><?php } ?></select></td><td class="col-lg-1"><input class="form-control" type="number" name="jumlah'+counter+'" id="jumlah'+counter+'" min="0" onkeyup="countHargaTotal('+counter+'); totalHarga();" onclick="countHargaTotal('+counter+'); totalHarga();" required></td><td class="col-lg-1"><input class="form-control" type="text" name="satuan'+counter+'" id="satuan'+counter+'" readonly></td><td class="col-3"><input class="form-control" type="date" name="tgl_terima'+counter+'" id="tgl_terima'+counter+'" required></td><td class="col-2"><input class="form-control" type="number" name="harga_satuan'+counter+'" id="harga_satuan'+counter+'" readonly></td><td class="col-2"><input class="form-control" type="number" name="harga_total'+counter+'" id="harga_total'+counter+'" readonly></td></tr>';
        $("#print_new_row").append(html);
        /* var id_detail_produk = $("#produk"+counter).val();
        $.ajax({
            url:"<?php echo base_url();?>PurchaseOrderCustomer/harga_produk",
            type:"POST",
            dataType:"JSON",
            data:{id_detail_produk:id_detail_produk},
            success:function(respond){
                $("#harga_satuan"+counter).val(respond[0]["harga_produk"]);
            }
        }); */
    }
</script>

<script>
    function getHargaSatuan(countt){
        var id_detail_produk = $("#produk"+countt).val();
        $.ajax({
            url:"<?php echo base_url();?>PurchaseOrderCustomer/harga_produk",
            type:"POST",
            dataType:"JSON",
            data:{id_detail_produk:id_detail_produk},
            success:function(respond){
                $("#harga_satuan"+countt).val(respond[0]["harga_produk"]);
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
    function number_format(number, decimals, dec_point, thousands_point){
        if (number == null || !isFinite(number)) {
            throw new TypeError("number is not valid");
        }

        if (!decimals) {
            var len = number.toString().split('.').length;
            decimals = len > 1 ? len : 0;
        }

        if (!dec_point) {
            dec_point = '.';
        }

        if (!thousands_point) {
            thousands_point = ',';
        }

        number = parseFloat(number).toFixed(decimals);

        number = number.replace(".", dec_point);

        var splitNum = number.split(dec_point);
        splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
        number = splitNum.join(dec_point);

        return number;
    }
</script>



<script>
    function reload() {
        location.reload();
    }
</script>
    