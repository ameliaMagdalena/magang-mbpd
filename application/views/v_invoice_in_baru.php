<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Invoice In</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Invoice In</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Invoice In</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/insert_invoice" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Input Invoice</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_inv" class="form-control" value="INVIN-<?php echo $jumlah_inv + 1?>" readonly>
					
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor Invoice<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" name="no_inv" id="no_inv" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Terima<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" name="tgl_inv" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor FP<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" name="no_fp" id="no_fp" class="form-control" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">PO Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="po" id="po" onchange="getTagihan(); addNewRow();" required>
                            <option value="0" class="dropdown-header"> Pilih PO Supplier </option>
                            <?php for($a=0; $a<count($po); $a++){ ?>
                                <option value="<?php echo $po[$a]['id_purchase_order_supplier'] ?>">
                                    <?php echo $po[$a]['kode_purchase_order_supplier'];?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tagihan<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="number" name="tagihan" id="tagihan" class="form-control" onkeyup="getHarga();" onchange="getHarga();" required>
                        <small id="tghn"></small>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">PPN</label>
					<div class="col-sm-7">
                        <input type="number" name="ppn" id="ppn" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Total Bayar</label>
					<div class="col-sm-7">
                        <input type="number" name="total" id="total" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Pajak</label>
					<div class="col-sm-7">
                        <input type="text" name="pajak" id="pajak" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group mt-lg">
					<h4 style="text-align:center">Data Material</h4>
                </div>
                <table class = "table table-bordered table-striped table-hover" border="1" id="tabel_material">
                    <thead>
                        <tr>
                            <th style="text-align:center" class="col-lg-2">Kode Material</th>
                            <th style="text-align:center" class="col-lg-3">Deskripsi</th>
                            <th style="text-align:center" class="col-lg-1">Jumlah</th>
                            <th style="text-align:center" class="col-lg-2">Harga</th>
                            <th style="text-align:center" class="col-lg-2">PPN</th>
                            <th style="text-align:center" class="col-lg-2">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody id = "print_row">
                    </tbody>
                </table>

                <br>
                
                <div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Tanggal Pelunasan<span class="required">*</span></label>
                        <div class="col-sm-7">
                            <input type="date" name="tgl_lunas" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <input type="text" name="keterangan" class="form-control" value="">
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
    $(document).ready(function() {
        $(':input[type="submit"]').prop('disabled', true);
    });
    $('#po').on('change', function() {
        if($('#po').val() == "0"){
            $(':input[type="submit"]').prop('disabled', true);
        }
        else{
            $(':input[type="submit"]').prop('disabled', false);
        }
    });
</script>

<script>
    function getTagihan(){
        $("#tghn").html("");
        var id_po = $("#po").val();
        $.ajax({
            url:"<?php echo base_url();?>PurchaseOrderSupplier/get_tagihan",
            type:"POST",
            dataType:"JSON",
            data:{id_po:id_po},
            success:function(respond){
                html="Tagihan awal: "+respond[0]["total_harga_akhir"];
                $("#tghn").append(html);
            }
        });
    }
</script>

<script>
    function getHarga(){
        var total = parseInt($('#tagihan').val());
        
        var pajak = total*10/100;
        var totalll = total+pajak;

        $("#ppn").val(pajak);
        $("#total").val(totalll);
    }
</script>

<script>
    function addNewRow(){
        var counter = document.getElementById("print_row").rows.length;
        var z;
        for(z=0; z<counter; z++){
            document.getElementById("print_row").deleteRow(0);
        }
        
        var id_po = $("#po").val();
        $.ajax({
            url:"<?php echo base_url();?>PurchaseOrderSupplier/get_detail_po",
            type:"POST",
            dataType:"JSON",
            data:{id_po:id_po},
            success:function(respond){
                for (cek=0; cek<respond.length; cek++){
                    html =
                    '<tr class = "new_row">'+
                        '<td class="col-lg-2">'+
                            '<input type ="hidden" name="detailnya'+cek+'" value="'+respond[cek]["id_detail_purchase_order_supplier"]+'" readonly>'+
                            '<input class="form-control" type="text" name="kodemat'+cek+'" id="kodemat'+cek+'"'+
                            'value="'+respond[cek]["kode_sub_jenis_material"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-3">'+
                            '<input class="form-control" type="text" name="desc'+cek+'" id="desc'+cek+'"'+
                            'value="'+respond[cek]["nama_jenis_material"]+' '+respond[cek]["nama_sub_jenis_material"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-1">'+
                            '<input class="form-control" type="number" name="jlhminta'+cek+'" id="jlhminta'+cek+'"'+
                            'value="'+respond[cek]["jumlah_aktual"]+'" readonly>'+
                            '<small> diminta: '+respond[cek]["jumlah_diminta"]+' </small>'+
                        '</td>'+
                        '<td class="col-lg-2">'+
                            '<input class="form-control" type="text" name="satuan'+cek+'" id="satuan'+cek+'"'+
                            'value="'+respond[cek]["harga_satuan"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-2">'+
                            '<input class="form-control" type="text" name="ppn'+cek+'" id="ppn'+cek+'"'+
                            'value="'+respond[cek]["ppn"]+'" readonly>'+
                        '</td>'+
                        '<td class="col-lg-2">'+
                            '<input class="form-control" type="text" name="hrgtotal'+cek+'" id="hrgtotal'+cek+'"'+
                            'value="'+respond[cek]["harga_total"]+'" readonly>'+
                        '</td>'+
                    '</tr>';
                    $("#print_row").append(html);
                }
            }
        });        
    }
</script>

<script>
    function reload() {
    location.reload();
    }
</script>
    