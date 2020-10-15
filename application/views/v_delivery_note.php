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


<h1>Delivery Note</h1>
<hr>
<a class="modal-with-form btn btn-success" href="#modaltambah">+ Tambah Delivery Note</a>



<!-- **************************** MODAL TAMBAH DN ***************************** -->
<!-- ************************************************************************** -->
<div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
		<form class="form-horizontal mb-lg" action="<?php //echo base_url()."Departemen/tambah_departemen"?>" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Delivery Note</h2>
			</header>

			<div class="panel-body">
				<input type="hidden" name="id_dn" class="form-control" value="DN-<?php //echo $jumlah_delivery_note + 1?>" readonly>
				
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nomor DN<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="text" class="form-control" value="DN-5/104/20" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Customer<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="customer" id="customer" required>
                            <option value="">INOAC</option>
                            <option value="">PT AAA</option>
                            <option value="">dll</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Supplier<span class="required">*</span></label>
					<div class="col-sm-7">
                        <select class="form-control" name="supplier" id="supplier" required>
                            <option value="">INOAC</option>
                            <option value="">PT AAA</option>
                            <option value="">dll</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Tgl Pengiriman<span class="required">*</span></label>
					<div class="col-sm-7">
                        <input type="date" class="form-control" value="">
                    </div>
                </div>
                <br>
                <table class = "table table-bordered table-striped table-hover" border="1">
                    <thead>
                        <tr>
                            <th style="text-align:center">Nama Material</th>
                            <th style="text-align:center">Kode Material</th>
                            <th style="text-align:center">Jumlah</th>
                            <th style="text-align:center">Satuan</th>
                            <th style="text-align:center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id = "detail_print_container">
                    </tbody>
                    <tr class = "new_row">
                        <td>
                            <select class="form-control" name="material" id="material" required>
                                <option value="">Foam A</option>
                                <option value="">Foam B</option>
                                <option value="">Kain</option>
                                <option value="">dll</option>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text" placeholder="otomatis" readonly>
                        </td>
                        <td>
                            <input class="form-control" type="number" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" placeholder="otomatis setelah pilih
                             nama material" readonly>
                        </td>
                        <td>
                            <input class="form-control" type="text">
                        </td>
                    </tr>
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
                        <label class="col-sm-3 control-label">Dibuat Oleh </label>
                        <div class="col-sm-7">
                            <input type="text" name="dibuat" class="form-control"
                            value="<?php //echo $user[$x]['nama_jabatan'] ?> otomatis dari user yg login" readonly>
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
                    <th>No.</th>
                    <th>Kode Delivery Note</th>
                    <th>Supplier</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php //if(count($departemen)==0){?>
                    <!-- <tr>
                        <td colspan="5" style="text-align:center">Belum Ada Data</td>
                    </tr> -->
                <?php 
                    //}else{
                    //for($x=0 ; $x<count($departemen) ; $x++){
                ?>
                    <tr>
                        <td class="col-lg-1"> <?php //echo $x+1?>1</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['id_departemen']?>DN-1/100/20</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>INOAC</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>2 Juli 2020</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>Selesai</td>
                        <td class="col-lg-3">
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-info fa fa-file"
                                title="Log" href="#modalhapus<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-1"> <?php //echo $x+1?>2</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['id_departemen']?>DN-2/101/20</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>INOAC</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>5 Juli 2020</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>Proses pengiriman</td>
                        <td class="col-lg-3">
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-1"> <?php //echo $x+1?>3</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['id_departemen']?>DN-3/102/20</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>INOAC</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>6 Juli 2020</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>Disetujui, belum dikirim</td>
                        <td class="col-lg-3">
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-1"> <?php //echo $x+1?>4</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['id_departemen']?>DN-4/103/20</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>INOAC</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>13 Juli 2020</td>
                        <td class="col-lg-2"> <?php //echo $departemen[$x]['nama_departemen']?>Belum disetujui</td>
                        <td class="col-lg-3">
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?php //echo $departemen[$x]['id_departemen'] ?>"></a>
                        </td>
                    </tr>
                    
                <?php //}} ?>
            </tbody>
        </table>
    </div>


    <!-- ****************************** MODAL DETAIL ****************************** -->
    <!-- ************************************************************************** -->
    <div id='modaldetail<?php //echo $departemen[$x]['id_departemen']?>' class="modal-block modal-block-lg mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Data Delivery Note</h2>
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
                        <select class="form-control" name="customer" id="customer" readonly>
                            <option value="">PT AAA</option>
                            <option value="">INOAC</option>
                            <option value="">dll</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Supplier</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="customer" id="customer" readonly>
                            <option value="">PT AAA</option>
                            <option value="">INOAC</option>
                            <option value="">dll</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Tgl Pengiriman</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="2 Juli 2020" readonly>
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
                        value="Sara - Operator Gudang Material" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Disetujui Oleh </label>
                    <div class="col-sm-9">
                        <input type="text" name="dibuat" class="form-control"
                        value="Amel - Manager" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <input type="text" name="dibuat" class="form-control"
                        value="Selesai" readonly>
                    </div>
                </div>
                <br>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-default modal-dismiss">OK</button>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <!-- **************************** END MODAL DETAIL **************************** -->
    <!-- ************************************************************************** -->


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


    <!-- ******************************* MODAL HAPUS ****************************** -->
    <!-- ************************************************************************** -->
    <div id='modalhapus<?php //echo $departemen[$x]['id_departemen']?>' class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <form class="form-horizontal mb-lg" action="<?php //echo base_url()."departemen/hapus_departemen"?>" method="post">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Delivery Note</h2>
                </header>

                <div class="panel-body" style="color: black">
                    Apakah anda yakin akan menghapus data Delivery Note <?php //echo $departemen[$x]['nama_departemen']?>?
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-danger" value="Hapus">
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>
    </div>
    <!-- ***************************** END MODAL HAPUS **************************** -->
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
function addNewRow(){
    var counter = $(".new_row").length;
    html = '<tr class = "new_row"><td><select class="form-control" name="material" id="material" required><option value="">Foam A</option><option value="">Foam B</option><option value="">Kain</option><option value="">dll</option></select></td><td><input class="form-control" type="text" placeholder="otomatis" readonly></td><td><input class="form-control" type="number" required></td><td><input class="form-control" type="text" placeholder="otomatis setelah pilih nama material" readonly></td><td><input class="form-control" type="text"></td></tr>';
    $("#detail_print_container").append(html);
    
}
</script>

<script>
    function reload() {
    location.reload();
    }
</script>
    