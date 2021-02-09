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
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/insert" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Purchase Order Customer</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_po_customer" class="form-control" value="POC-<?php echo $jumlah_po_customer + 1?>" readonly>
                
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" name="tgl_po" id="tgl_po" class="form-control" onchange="ubahtrima()" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor PO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" name="no_po_customer" id="no_po" class="form-control" placeholder="Nomor PO Customer" required>
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
					<h4 style="text-align:center">Data Sales Order</h4>
                </div>

                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor SO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="hidden" name="id_sales_order" id="id_so" class="form-control"
                        value="SO-<?= count($sales_order)+1 ?>" readonly>
                        <input type="text" name="kode_so" id="kode_so" class="form-control"
                        value="MBP/SO/<?= integerToRoman(date('m')) ."/". date('Y') ."/"?><?= count($kodeso)+1 ?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal SO<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" name="tgl_so" id="tgl_so" class="form-control"
                            value="<?php $tglso = date('Y-m-d'); echo $tglso ?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Pengantaran<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" name="tgl_antar" id="tgl_antar" class="form-control" min="<?= $tglso ?>" required>
                    </div>
                </div>
                
                <div class="form-group mt-lg">
					<h4 style="text-align:center">Data Produk</h4>
                </div>

                <table class = "table table-bordered table-striped table-hover" border="1">
                    <thead>
                        <tr>
                            <th style="text-align:center" class="col-lg-3">Produk</th>
                            <th style="text-align:center" class="col-lg-1">Jumlah</th>
                            <th style="text-align:center" class="col-lg-1">Satuan</th>
                            <th style="text-align:center" class="col-lg-2">Tanggal Penerimaan</th>
                            <th style="text-align:center" class="col-lg-2">Harga Satuan</th>
                            <th style="text-align:center" class="col-lg-2">Total Harga</th>
                            <th style="text-align:center" class="col-lg-1">Remark</th>
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
                        <td></td>
                        <td><a id="tambah" onclick="addNewRow()" style="cursor:pointer">+ Tambah</a></td>
                    </tr>
                </table>

                <input type="hidden" id="adarow" class="form-control" value="0" readonly>
                <br>
                
                <div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Total Harga Sebelum Pajak</label>
                        <div class="col-sm-7">
                            <input type="text" name="total_sebelum_pajak" id="total_sebelum_pajak" class="form-control" value="0" required readonly>
                            <input type="hidden" name="total_sebelum_pajaknya" id="total_sebelum_pajaknya" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">PPN</label>
                        <div class="col-sm-7">
                            <input type="text" name="ppn" id="ppn" class="form-control" value="0" required readonly>
                            <input type="hidden" name="ppnnya" id="ppnnya" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Total Harga</label>
                        <div class="col-sm-7">
                            <input type="text" name="total_harga" id="total_harga" class="form-control" value="0" required readonly>
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
                            <input type="submit" id="button_tambah" class="btn btn-primary float-right" value="Simpan">
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
    $(document).ready(function(){
        $("#button_tambah").attr("disabled", true);

        //cek semua
        /* var sebelum_pajak = $("#total_sebelum_pajak").val();
        var ppn = $("#ppn").val();
        var total = $("#total_harga").val();
        var adarow = $("#adarow").val();

        if (adarow == "0"){
            $("#button_tambah").attr("disabled", true);
        }
        else{
            $("#button_tambah").attr("disabled", false);
        } */
        
    });
</script>

<script>
    /* function cekTabel(){
        var counter = $(".new_row").length;
        if(counter<=0){
            $("#tambah").attr("disabled", true);
        }
        else{
            $("#tambah").attr("disabled", false);
        }
    } */
</script>


<script>
 function cek_no_po(){
     var no_po = $("#no_po").val();

     $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>PurchaseOrderCustomer/cek_no_po",
            dataType: "JSON",
            data: {no_po:no_po},

            success: function(respond){
                if(respond['ada'] == 1){
                    alert("No. PO sudah terdaftar");
                }
            }
        });

    cek_terisi();
 }
</script>

<script>
    function ubahtrima(){
        var tglpo = $("#tgl_po").val();
        var counter = $(".new_row").length;

        if(counter>0){
            for(cek=0; cek<counter; cek++){
                //$("#tgl_terima"+counter).val("");
                $("#tgl_terima"+cek).val('').removeAttr('min');
                
                $("#tgl_terima"+cek).attr({
                    "min" : tglpo
                });
            }
        }
    }
</script>

<script>
    function addNewRow(){
        var trima = $("#tgl_po").val();
        if (trima!=""){
            var counter = $(".new_row").length;
            //var row_sebelum = counter-1;

            //if (counter == 0){
                html =
                '<tr class = "new_row">'+
                    '<td style="text-align:center" class="col-lg-3">'+
                        '<input type ="hidden" name = "row" value = '+counter+'>'+
                        '<select data-plugin-selectTwo class="form-control" name="produk'+counter+'" id="produk'+counter+'" onchange="getHargaSatuan('+counter+')" required><?php for($b=0; $b<count($produk); $b++){ ?>'+
                            '<option value="<?php echo $produk[$b]['id_detail_produk']?>">'+
                                '<?php echo $produk[$b]['kode_produk'] . ' - ' . $produk[$b]['nama_produk']; if ($produk[$b]['keterangan'] == 0 || $produk[$b]['keterangan'] == 1){ for ($c=0; $c<count($ukuran); $c++){ if ($produk[$b]['id_ukuran_produk'] == $ukuran[$c]['id_ukuran_produk']){ echo ' ' . $ukuran[$c]['ukuran_produk'];}}} if($produk[$b]['keterangan'] == 0 || $produk[$b]['keterangan'] == 2){ for ($d=0; $d<count($warna); $d++){ if ($produk[$b]['id_warna'] == $warna[$d]['id_warna']){ echo ' '. $warna[$d]['nama_warna'];}}} ?>'+
                            '</option><?php } ?>'+
                        '</select>'+
                    '</td>'+
                    '<td style="text-align:center" class="col-lg-1">'+
                        '<input class="form-control" type="number" name="jumlah'+counter+'" id="jumlah'+counter+'" min="0" onkeyup="countHargaTotal('+counter+'); totalHarga();" onclick="getHargaSatuan('+counter+'); countHargaTotal('+counter+'); totalHarga();" required>'+
                    '</td>'+
                    '<td style="text-align:center" class="col-lg-1">'+
                        '<input class="form-control" type="text" name="satuan'+counter+'" id="satuan'+counter+'" value="Pcs" readonly>'+
                    '</td>'+
                    '<td style="text-align:center" class="col-lg-2">'+
                        '<input class="form-control" type="date" name="tgl_terima'+counter+'" id="tgl_terima'+counter+'" min="'+trima+'" required>'+
                    '</td>'+
                    '<td style="text-align:center" class="col-lg-2">'+
                        '<input class="form-control" type="number" name="harga_satuan'+counter+'" id="harga_satuan'+counter+'" readonly>'+
                    '</td>'+
                    '<td style="text-align:center" class="col-lg-2">'+
                        '<input class="form-control" type="number" name="harga_total'+counter+'" id="harga_total'+counter+'" readonly>'+
                    '</td>'+
                    '<td style="text-align:center" class="col-lg-1">'+
                        '<input class="form-control" type="text" name="remark'+counter+'" id="remark'+counter+'">'+
                    '</td>'+
                '</tr>';
                $("#print_new_row").append(html);
                $("#adarow").val(counter+1);
                $("#button_tambah").attr("disabled", false);

            //}
            /* else{
                var aaa = $('#jumlah'+row_sebelum).val();
                var tgll = $('#tgl_terima'+row_sebelum).val();
                if(aaa.length == 0 || tgll == ""){
                    $("#tambah").click(function(){
                        //return false;
                        //alert(aaa.length);
                    });
                }

                else {
                    $("#produk"+row_sebelum).prop("readonly", true);
                    $("#jumlah"+row_sebelum).prop("readonly", true);
                    $("#satuan"+row_sebelum).prop("readonly", true);
                    $("#tgl_terima"+row_sebelum).prop("readonly", true);
                    $("#harga_satuan"+row_sebelum).prop("readonly", true);
                    $("#harga_total"+row_sebelum).prop("readonly", true);

                    html =
                    '<tr class = "new_row">'+
                        '<td class="col-lg-3">'+
                            '<input type ="hidden" name = "row" value = '+counter+'>'+
                            '<select data-plugin-selectTwo class="form-control" name="produk'+counter+'" id="produk'+counter+'" onchange="getHargaSatuan('+counter+')" required><?php for($b=0; $b<count($produk); $b++){ ?>'+
                                '<option value="<?php echo $produk[$b]['id_detail_produk']?>">'+
                                    '<?php for($cc=0; $cc<'+counter+'; $cc++){ if($produk[$b]['id_detail_produk'] !='+$("#produk"+cc).val()+'){ ?>'+
                                        '<?php echo $produk[$b]['kode_produk'] . ' - ' . $produk[$b]['nama_produk']; if ($produk[$b]['keterangan'] == 0 || $produk[$b]['keterangan'] == 1){ for ($c=0; $c<count($ukuran); $c++){ if ($produk[$b]['id_ukuran_produk'] == $ukuran[$c]['id_ukuran_produk']){ echo ' ' . $ukuran[$c]['ukuran_produk'];}}} if($produk[$b]['keterangan'] == 0 || $produk[$b]['keterangan'] == 2){ for ($d=0; $d<count($warna); $d++){ if ($produk[$b]['id_warna'] == $warna[$d]['id_warna']){ echo ' '. $warna[$d]['nama_warna'];}}} ?>'+
                                    '<?php }} ?>' +
                                '</option><?php } ?>'+
                            '</select>'+
                        '</td>'+
                        '<td class="col-lg-1">'+
                            '<input class="form-control" type="number" name="jumlah'+counter+'" id="jumlah'+counter+'" min="0" onkeyup="countHargaTotal('+counter+'); totalHarga();" onclick="getHargaSatuan('+counter+'); countHargaTotal('+counter+'); totalHarga();" required>'+
                        '</td>'+
                        '<td class="col-lg-1">'+
                            '<input class="form-control" type="text" name="satuan'+counter+'" id="satuan'+counter+'" value="Pcs" readonly>'+
                        '</td>'+
                        '<td class="col-3">'+
                            '<input class="form-control" type="date" name="tgl_terima'+counter+'" id="tgl_terima'+counter+'" required>'+
                        '</td>'+
                        '<td class="col-2">'+
                            '<input class="form-control" type="number" name="harga_satuan'+counter+'" id="harga_satuan'+counter+'" readonly>'+
                        '</td>'+
                        '<td class="col-2">'+
                            '<input class="form-control" type="number" name="harga_total'+counter+'" id="harga_total'+counter+'" readonly>'+
                        '</td>'+
                    '</tr>';
                    $("#print_new_row").append(html);
                } */
                
                /* var id_detail_produk = $("#produk"+counter).val();
                $.ajax({
                    url:"<?php echo base_url();?>PurchaseOrderCustomer/harga_produk",
                    type:"POST",
                    dataType:"JSON",
                    data:{id_detail_produk:id_detail_produk},
                    success:function(respond){
                        $("#harga_satuan"+counter).val(respond[0]["harga_produk"]);
                    }
                });
            } */
        }else{
            alert("Masukkan Tanggal PO terlebih dahulu.")
        }
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
        var totalnya = "Rp "+  new Number(total).toLocaleString("id-ID") + ",00";
        
        //$("#total_sebelum_pajak").html("Rp " + number_format(total, "", "", ".") + ",-");
        $("#total_sebelum_pajak").val(totalnya);
        $("#total_sebelum_pajaknya").val(total);

        //***** PAJAK */
        var pajak = total*10/100;
        var pajaknya = "Rp "+  new Number(pajak).toLocaleString("id-ID") + ",00";
        $("#ppn").val(pajaknya);
        $("#ppnnya").val(pajak);
        
        //***** SETELAH PAJAK */
        var totalll = total+pajak;
        var totalllnya = "Rp "+  new Number(totalll).toLocaleString("id-ID") + ",00";
        //$("#total_harga").html("Rp " + number_format(total, "", "", ".") + ",-");
        $("#total_harga").val(totalllnya);
        $("#total_harganya").val(totalll);
    }
</script>

<script>
    function reload() {
        location.reload();
    }
</script>
    