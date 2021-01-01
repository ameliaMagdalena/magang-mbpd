<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Delivery Note</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Delivery Note</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<?php if($status==0){?>
    <h1>Delivery Note - Dalam Proses</h1>
<?php } else if ($status==1){ ?>
    <h1>Delivery Note - Selesai</h1>
<?php } else if ($status==2){ ?>
    <h1>Delivery Note - Batal / Ditolak</h1>
<?php } else if ($status==3){ ?>
    <h1>Delivery Note - Semua</h1>
<?php } ?>
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


<a class="modal-with-form btn btn-success"
href="<?php if(count($po)==0){
        echo '#modalkosong';
    }
    else{
        echo '#modaltambah';
    } ?>">
+ Tambah Delivery Note</a>



<!-- ******************************* MODAL KOSONG ***************************** -->
<!-- ************************************************************************** -->
<div id='modalkosong' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
		<form class="form-horizontal mb-lg" action="" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">TIDAK ADA PO SUPPLIER</h2>
			</header>

			<div class="panel-body">
                <div>
                    <div class="form-group mt-lg" style="text-align: center">
                        <b>Belum ada Purchase Order Supplier yang dapat dibuatkan Delivery Note.</b>
                    </div>
                </div>
                <br>
            </div>
            <footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Kembali</button>
					</div>
				</div>
			</footer>
		</form>
	</section>
</div>


<!-- **************************** MODAL TAMBAH DN ***************************** -->
<!-- ************************************************************************** -->
<div id='modaltambah' class="modal-block modal-block-lg mfp-hide">
    <section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()."DeliveryNote/insert"?>" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Delivery Note</h2>
			</header>


            <input type="hidden" name="id_dn" class="form-control" value="DN-<?php echo $jumlah_dn+1 ?>" readonly>
                            
			<div class="panel-body">
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor DN<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" name="kode_dn" class="form-control"
                            value="MBP/DN/<?= integerToRoman(date('m')) ."/". date('Y') ."/"?><?= $dnnow+1 ?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Delivery Note<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" name="tgl_dn" min="<?= date('Y-m-01') ?>" max="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" required>
                            <?php for($sup=0; $sup<count($po); $sup++){ ?>
                                <option value="<?= $po[$sup]['id_supplier'] ?>"> <?= $po[$sup]['nama_supplier'] ?> </option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tanggal Pengiriman<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" name="tgl_pengiriman" min="<?php echo date('Y-m-d') ?>" required>
                    </div>
                </div>
                <br>
                <table class = "table table-bordered table-striped table-hover" border="1">
                    <thead>
                        <tr>
                            <th style="text-align:center" class="col-sm-3">No. PO Supplier</th>
                            <th style="text-align:center" class="col-sm-3">Material</th>
                            <th style="text-align:center" class="col-sm-2">Jumlah</th>
                            <th style="text-align:center" class="col-sm-1">Satuan</th>
                            <th style="text-align:center" class="col-sm-3">Remark</th>
                        </tr>
                    </thead>
                    <tbody id = "print_new_row">
                    </tbody>
                    <tr class = "new_row">
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
                        <label class="col-sm-3 control-label">Dibuat Oleh </label>
                        <div class="col-sm-7">
                            <input type="text" name="dibuat" class="form-control"
                            value="<?php echo $_SESSION['id_user'] ?>" readonly>
                        </div>
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
</div>


<br><br>


<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Delivery Note</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th style="text-align:center">No.</th>
                    <th style="text-align:center">Kode Delivery Note</th>
                    <th style="text-align:center">Supplier</th>
                    <th style="text-align:center">Tanggal Pengiriman</th>
                    <th style="text-align:center">Status</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<$jumlah_dn ; $x++){
                        if ($status == 0 || $status == 3){ //proses persetujuan & pengiriman
                            if($dn[$x]['status_pengesahan'] == 0 || $dn[$x]['status_pengesahan'] == 1){
                ?>
                    <tr>
                        <td class="col-lg-1"> <?php echo $x+1?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['kode_delivery_note']?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['nama_supplier']?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['tanggal_penerimaan']?></td>
                        <td class="col-lg-2">
                            <?php if ($dn[$x]['status_pengesahan']==0){
                                echo "Proses Persetujuan";
                            }else if ($dn[$x]['status_pengesahan']==1){
                                echo "Proses Pengambilan Material";
                            }
                            ?>
                        </td>
                        <td class="col-lg-3">
                            <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="<?php echo base_url() . 'DeliveryNote/detail/' . $dn[$x]['id_delivery_note'] ?>"></a>
                            
                            <?php if($dn[$x]['status_pengesahan'] == 0) { ?>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Delete" href="#modalhapus<?php echo $dn[$x]['id_delivery_note'] ?>"></a>
                            <?php } ?>
                            
                            <?php if($dn[$x]['status_pengesahan'] == 0 && $_SESSION['nama_departemen']=='Management' && ($_SESSION['nama_jabatan']=='Direktur' || $_SESSION['nama_jabatan']=='Manager')){ ?>
                                <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                    title="Menyetujui" href="#modalsetuju<?php echo $dn[$x]['id_delivery_note'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                                    title="Tolak" href="#modaltolak<?php echo $dn[$x]['id_delivery_note'] ?>"></a>
                            <?php } ?>
                        </td>
                    </tr>
                    
                <?php }}
                    else if($status == 1 || $status == 3){ //selesai
                        if($dn[$x]['status_pengesahan'] == 2){
                ?>
                    <tr>
                        <td class="col-lg-1"> <?php echo $x+1?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['kode_delivery_note']?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['nama_supplier']?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['tanggal_penerimaan']?></td>
                        <td class="col-lg-2"> Selesai </td>
                        <td class="col-lg-3">
                            <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="<?php echo base_url() . 'DeliveryNote/detail/' . $dn[$x]['id_delivery_note'] ?>"></a>
                        </td>
                    </tr>

                <?php }}
                    else if($status == 2 || $status == 3){ //batal / ditolak
                        if($dn[$x]['status_pengesahan'] == 3 || $dn[$x]['status_pengesahan'] == 4){
                ?>
                    <tr>
                        <td class="col-lg-1"> <?php echo $x+1?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['kode_delivery_note']?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['nama_supplier']?></td>
                        <td class="col-lg-2"> <?php echo $dn[$x]['tanggal_penerimaan']?></td>
                        <td class="col-lg-2">
                            <?php if ($dn[$x]['status_pengesahan']==3){
                                echo "Batal";
                            }else if ($dn[$x]['status_pengesahan']==4){
                                echo "Persetujuan Ditolak";
                            }
                            ?>
                        </td>
                        <td class="col-lg-3">
                            <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="<?php echo base_url() . 'DeliveryNote/detail/' . $dn[$x]['id_delivery_note'] ?>"></a>
                        </td>
                    </tr>
                <?php }} ?>
                
                <!-- ****************************** MODAL DITOLAK ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modaltolak<?php echo $dn[$x]['id_delivery_note'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>DeliveryNote/setuju_dn" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Menolak Delivery Note</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_dn" class="form-control" value="<?php echo $dn[$x]['id_delivery_note'] ?>" readonly>
                                <input type="hidden" name="statusnya" class="form-control" value="4" readonly>
                                
                                Apakah anda yakin akan menolak Delivery Note dengan No. DN <b><?php echo $dn[$x]['kode_delivery_note'] ?></b>?

                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
                <!-- ***************************** END MODAL DITOLAK ************************** -->
                <!-- ************************************************************************** -->

                

                <!-- ****************************** MODAL SETUJU ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalsetuju<?php echo $dn[$x]['id_delivery_note'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>DeliveryNote/setuju_dn" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Menyetujui Delivery Note</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_dn" class="form-control" value="<?php echo $dn[$x]['id_delivery_note'] ?>" readonly>
                                <input type="hidden" name="statusnya" class="form-control" value="1" readonly>
                                
                                Anda akan menyetujui Delivery Note dengan No. DN <b><?php echo $dn[$x]['kode_delivery_note'] ?></b>.

                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
                <!-- ***************************** END MODAL SETUJU *************************** -->
                <!-- ************************************************************************** -->

                <!-- ******************************* MODAL HAPUS ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modalhapus<?php echo $dn[$x]['id_delivery_note'] ?>' class="modal-block modal-block-primary mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()."DeliveryNote/hapus"?>" method="post">
                            <header class="panel-heading">
                                <h2 class="panel-title">Hapus Data Delivery Note</h2>
                            </header>

                            <input type="hidden" name="id_dn" class="form-control" value="<?php echo $dn[$x]['id_delivery_note'] ?>" readonly>
                            <div class="panel-body" style="color: black">
                                Apakah anda yakin akan menghapus data Delivery Note <?php echo $dn[$x]['kode_delivery_note']?>?
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" id="hapus" class="btn btn-danger" value="Hapus">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
                <!-- ***************************** END MODAL HAPUS **************************** -->
                <!-- ************************************************************************** -->

                <?php } ?>
            </tbody>
        </table>
    </div>
    

    <!-- ******************************* MODAL EDIT ******************************* -->
    <!-- ************************************************************************** -->
    <div id='modaledit<?php //echo $departemen[$x]['id_departemen']?>' class="modal-block modal-block-lg mfp-hide">
        <section class="panel">
            <form class="form-horizontal mb-lg" action="<?php //echo base_url()."departemen/edit_departemen"?>" method="post">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Data Delivery Note</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_dn" class="form-control" value="DN-<?php //echo $jumlah_delivery_note + 1?>" readonly>
                    
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Nomor DN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="DN-1/100/20" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Customer</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="PT AAA" required>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Supplier</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="INOAC" required>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Tgl Pengiriman</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" value="2 Juli 2020" required>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Material</th>
                                <th>Kode Material</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>FOAM A</td>
                                <td>MAT123</td>
                                <td>10</td>
                                <td>pc</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Benang</td>
                                <td>MAT121</td>
                                <td>100</td>
                                <td>meter</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kain</td>
                                <td>MAT163</td>
                                <td>100</td>
                                <td>meter kuadrat</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>

                    <br>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Dibuat Oleh </label>
                        <div class="col-sm-9">
                            <input type="text" name="dibuat" class="form-control"
                            value="Sara - Operator Gudang Material">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Disetujui Oleh </label>
                        <div class="col-sm-9">
                            <input type="text" name="dibuat" class="form-control"
                            value="Amel - Manager">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="customer" id="customer" required>
                                <option value="">Selesai</option>
                                <option value="">Belum Disetujui</option>
                                <option value="">Disetujui, belum dikirim</option>
                                <option value="">Proses pengiriman</option>
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
    </div>
    <!-- ***************************** END MODAL EDIT ***************************** -->
    <!-- ************************************************************************** -->




</section>
            



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

        html =
        '<tr class = "new_row">'+
            '<td>'+
                '<input type ="hidden" name = "row" value = '+counter+'>'+
                '<select data-plugin-selectTwo class="form-control" name="po'+counter+'" id="po'+counter+'" onchange="getMaterial('+counter+')" required>'+
                '</select>'+
            '</td>'+
            '<td>'+
                '<select data-plugin-selectTwo class="form-control" name="material'+counter+'" id="material'+counter+'" onchange="getSatuan('+counter+'); getJumlah('+counter+');" required>'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="number" name="jumlah'+counter+'" id="jumlah'+counter+'" min="0" required>'+
                '<input class="form-control" type="hidden" name="detpo'+counter+'" id="detpo'+counter+'" readonly>'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="satuan'+counter+'" id="satuan'+counter+'" readonly>'+
            '</td>'+
            '<td>'+
                '<input class="form-control" type="text" name="keterangan'+counter+'" id="keterangan'+counter+'">'+
            '</td>'+
        '</tr>';
        $("#print_new_row").append(html);
        getPO(counter);
    }
</script>

<script>
    function getPO(counter){
        var id_supplier = $("#supplier").val();
        <?php for($a=0; $a<count($po); $a++){  ?>
            if (id_supplier == '<?php echo $po[$a]['id_supplier'] ?>') {
                html =
                '<option value="<?php echo $po[$a]['id_purchase_order_supplier']?>">'+
                    '<?php echo $po[$a]['id_purchase_order_supplier'] ?>'+
                '</option>';
                $("#po"+counter).append(html);
                getMaterial(counter);
            }
        <?php } ?>
    }
</script>

<script>
    function getMaterial(counter){
        var matoption = document.getElementById("material"+counter);
        for(y=0; y<matoption.length; y++){
            matoption.remove(y);
            y=y-1;
        }
        
        var id_po_supplier = $("#po"+counter).val();
        $.ajax({
            url:"<?php echo base_url();?>DeliveryNote/get_material_po",
            type:"POST",
            dataType:"JSON",
            data:{id_po_supplier:id_po_supplier},
            success:function(respond){
                for($b=0; $b<respond.length; $b++){
                    html =
                    '<option value="' + respond[$b]['id_sub_jenis_material'] + '">'+
                        respond[$b]['kode_sub_jenis_material'] + ' - ' +
                        respond[$b]['nama_jenis_material'] + respond[$b]['nama_sub_jenis_material']+
                    '</option>';
                    $("#material"+counter).append(html);
                    getSatuan(counter);
                    getJumlah(counter);
                }
            }
        });
    }
</script>

<script>
    function getJumlah(countt){
        var id_po_supplier = $("#po"+countt).val();
        var id_sub_jenis_material = $("#material"+countt).val();
        $.ajax({
            url:"<?php echo base_url();?>DeliveryNote/jumlah_material/"+id_po_supplier,
            type:"POST",
            dataType:"JSON",
            data:{id_sub_jenis_material:id_sub_jenis_material},
            success:function(respond){
                var jadi =  respond[0]["jumlah_material"];
                $("#jumlah"+countt).attr({
                    "max" : jadi
                });
                $("#detpo"+countt).val(respond[0]["id_detail_purchase_order_supplier"]);
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
    function reload() {
    location.reload();
    }
</script>
    