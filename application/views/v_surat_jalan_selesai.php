<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Surat Jalan Selesai</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Surat Jalan Selesai</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Surat Jalan Selesai</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor Surat Jalan</th>
                        <th  style="text-align: center;vertical-align: middle;">Kode PO</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor Invoice</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($surat_jalan as $sj){
                            if($sj->status_surat_jalan == 1){        
                    ?>
                        <tr>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $no ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $sj->tanggal ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $sj->id_surat_jalan?>
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $sj->id_surat_jalan?>">
                                <input type="hidden" name="id_po<?=$no;?>" id="id_po<?=$no;?>" value="<?= $sj->id_purchase_order_customer?>">
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php foreach($po_aktif as $poa){
                                    if($poa->id_purchase_order_customer == $sj->id_purchase_order_customer){    
                                ?>
                                    <?= $poa->kode_purchase_order_customer?>
                                <?php }} ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php if($sj->id_invoice != ""){
                                        echo $sj->id_invoice;     
                                    } else{
                                        echo "-";
                                    }
                                ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php 
                                    if($sj->status_surat_jalan == 0){
                                        echo "Belum Diproses";
                                    } else{
                                        echo "Selesai";
                                    }
                                ?>
                            </td>
                            <td class="col-lg-3"> 
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
                                <?php if($sj->status_surat_jalan == 0){?>
                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        value="<?= $no;?>" title="Edit"></button>
                                    <button type="button" class="bdel_klik col-lg-3 btn btn-danger fa fa-trash-o" 
                                        value="<?= $no;?>" title="Delete"></button>
                                <?php }?>
                                    <form method="POST" action="<?= base_url()?>suratJalan/print">
                                        <input type="hidden" name="id_sj" value="<?= $sj->id_surat_jalan?>">
                                        <button type="submit" class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                        value="<?= $no;?>" title="Print"></button>
                                    </form> 
                            </td>
                        </tr>
                    <?php $no++;}} ?>
                </tbody>
	        </table>
        </div>
    </div>

    <!-- modal detail -->
    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Surat Jalan</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Surat Jalan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_sj_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_po_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kepada</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="cust_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tgl_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kendaraan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="kendaraan_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Pengirim</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_pengirim_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan Pengiriman</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="keterangan_pengiriman_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="ket_det" readonly>
                            </textarea>
                        </div>
                    </div>
                    <br>
                    
                    <div id="table_detail">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete -->
    <div class="modal" id="modaldelete" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>suratJalan/delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Hapus Data Invoice</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_sj_hapus" id="id_sj_hapus"> 
                        <p>Apakah anda yakin akan menghapus data invoice dengan nomor invoice <span id="kode_sj_hapus"></span> ? </p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Ya">
                        <button class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal" id="modaledit" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <form method="POST" action="<?= base_url()?>suratJalan/edit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Buat Surat Jalan</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor Surat Jalan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                id="nomor_sj_edit" name="nomor_sj_edit" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal</label>
                            <div class="col-sm-7">
                                <input type="text" id="tanggal_sj_edit" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Kode PO</label>
                            <div class="col-sm-7">
                                <input type="text" id="nomor_po_edit" name="nomor_po_edit"
                                class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Customer</label>
                            <div class="col-sm-7">
                                <input type="text" id="nama_cust_edit" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Data Kendaraan</label>
                            <div class="col-sm-7">
                                <input type="text" id="kendaraan_edit"  name="kendaraan_edit" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Pengirim</label>
                            <div class="col-sm-7">
                                <input type="text" id="nama_pengirim_edit"  name="nama_pengirim_edit" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan Pengiriman</label>
                            <div class="col-sm-7">
                                <input type="text" id="keterangan_pengiriman_edit"  name="keterangan_pengiriman_edit" 
                                class="form-control" placeholder="Oleh Customer/Jasa Kirim" required>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="keterangan_edit"  id="keterangan_edit" rows="3" id="textareaDefault">
                                </textarea>
                            </div>
                        </div>
                        <br>

                        <div id="table_edit">
                        
                        </div>
                        <input type="hidden" id="jumlah_detail" name="jumlah_detail">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="edit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>


    
    <div id='modaldetail1' class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Surat Jalan</h2>
            </header>

            <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Surat Jalan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="M2002.0198" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="L2001231" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kepada</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="PT. INOAC POLYTECHNO INDONESIA" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Selasa, 07-07-2020" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault" readonly>
                            </textarea>
                        </div>
                    </div>
                    <br>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">
                                    No
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Nama Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Kode Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Total Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Satuan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Merah</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">Pcs</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Coklat</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">100</td>
                                <td style="text-align: center;vertical-align: middle;">Pcs</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Hitam</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">Pcs</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Hijau</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">Pcs</td>
                            </tr>
                        </tbody>
                    </table>
            </div>

			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="button" class="btn btn-default modal-dismiss">Ok</button>
					</div>
				</div>
			</footer>
		</section>
    </div>

    <div id='modaledit1' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>suratJalan/semua_surat_jalan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Buat Surat Jalan</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Surat Jalan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="M2002.0198" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Selasa, 07-07-2020" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kepada</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="PT. INOAC POLYTECHNO INDONESIA" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="L2001231" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault">Isi Keterangannya
                            </textarea>
                        </div>
                    </div>

                    <br>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">
                                    No
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Nama Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Kode Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Total Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Belum Terkirim
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Selesai Produksi
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Yang Akan Dikirim
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Merah</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">20</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" 
                                        style="width:60px;height:25px" required value="20">
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Coklat</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">100</td>
                                <td style="text-align: center;vertical-align: middle;">100</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" style="width:60px;height:25px" 
                                        required value="50">
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Hitam</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">0</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" style="width:60px;height:25px" required disabled>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Hijau</td>
                                <td style="text-align: center;vertical-align: middle;">N-COM00-Z001.0J</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">0</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" style="width:60px;height:25px" required disabled>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    *Yang akan dikirim harus terisi. Jika jumlah yang akan dikirim untuk suatu produk tidak ada, silahkan masukkan 0


                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                            <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <div id="modalhapus" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>suratJalan/delete_surat_jalan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Surat Jalan</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Apakah anda yakin akan menghapus data surat jalan dengan nomor M2002.0198 ?</p>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" class="btn btn-primary hapus" value="Hapus">
                                <button class="btn btn-default modal-dismiss">Batal</button>
                            </div>
                        </div>
                    </footer>
            </section>
        </form>

    </div>
    
    <div class="modal" id="modallog" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Surat Jalan</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_terpilih">

                    <table>
                        <tr>
                            <td class="col-md-6">
                                <center>
                                    <b>Input Date:</b><span id="input_date"></span>
                                </center>
                            </td>
                            <td class="col-md-6">
                                <center>
                                    <b>User Input:</b><span id="input_user"></span>
                                </center>
                            </td>
                        </tr>
                    </table>

                    <div id="isi_log">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    
<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<script>
    function reload() {
        location.reload();
    }
</script>

<!-- detail surat jalan -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        var id_po   = $("#id_po"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratJalan/detail_sj",
            dataType: "JSON",
            data: {id:id,id_po:id_po},

            success: function(respond){
                $("#no_sj_det").val(respond['sj'][0]['id_surat_jalan']);
                $("#tgl_det").val(respond['sj'][0]['tanggal']);
                $("#ket_det").val(respond['sj'][0]['keterangan']);
                $("#no_po_det").val(respond['po'][0]['kode_purchase_order_customer']);
                $("#cust_det").val(respond['po'][0]['nama_customer']);
                $("#kendaraan_det").val(respond['sj'][0]['kendaraan']);
                $("#nama_pengirim_det").val(respond['sj'][0]['nama_pengirim']);
                $("#keterangan_pengiriman_det").val(respond['sj'][0]['keterangan_pengiriman']);

                $isi = "";
                for($i=0;$i<respond['jm_isj'];$i++){
                    $namanya = "";

                    if(respond['isj'][$i]['keterangan'] == 0){
                        $id_ukuran = respond['isj'][$i]['id_ukuran'];
                        $id_warna  = respond['isj'][$i]['id_warna'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['isj'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + ")";
                    }
                    else if(respond['isj'][$i]['keterangan'] == 1){
                        $id_ukuran = respond['isj'][$i]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        $namanya = respond['isj'][$i]['nama_produk'] + $ukurannya;

                    }
                    else if(respond['isj'][$i]['keterangan'] == 2){
                        $id_warna  = respond['isj'][$i]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['isj'][$i]['nama_produk'] + " (" + $warnanya + ")";
                    }
                    else{
                        $namanya = respond['isj'][$i]['nama_produk'];
                    }

                    $isi = $isi + 
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                ($i+1)+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $namanya+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['isj'][$i]['kode_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['isj'][$i]['jumlah_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">Pcs</td>'+
                        '</tr>';
                }

                $table = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'No'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Nama Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Kode Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Total Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Satuan'+
                            '</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                       $isi+
                    '</tbody>'+
                '</table>';


                $("#table_detail").html($table);

                $("#modaldetail").modal();
            }
        });  
    });
</script>

<!-- delete -->
<script>
    $('.bdel_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_sj_hapus").val(id);
        $("#kode_sj_hapus").html(id);
        $("#modaldelete").modal();
    });
</script>

<!-- edit sj -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        var id_po   = $("#id_po"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratJalan/detail_po_bpbj_sj",
            dataType: "JSON",
            data: {id:id,id_po:id_po},

            success: function(respond){
                $("#nomor_sj_edit").val(respond['sj'][0]['id_surat_jalan']);
                $("#tanggal_sj_edit").val(respond['sj'][0]['tanggal']);
                $("#nomor_po_edit").val(respond['po'][0]['kode_purchase_order_customer']);
                $("#nama_cust_edit").val(respond['po'][0]['nama_customer']);
                $("#kendaraan_edit").val(respond['sj'][0]['kendaraan']);
                $("#nama_pengirim_edit").val(respond['sj'][0]['nama_pengirim']);
                $("#keterangan_pengiriman_edit").val(respond['sj'][0]['keterangan_pengiriman']);
                $("#keterangan_edit").val(respond['sj'][0]['keterangan']);

                $isi = "";

                for($q=0;$q<respond['jm_dpo'];$q++){
                    //nama produk
                        if(respond['dpo'][$q]['keterangan'] == 0){
                            $id_ukuran = respond['dpo'][$q]['id_ukuran'];
                            $id_warna  = respond['dpo'][$q]['id_warna'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            for($k=0;$k<respond['jmwarna'];$k++){
                                if(respond['warna'][$k]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$k]['nama_warna'];
                                }
                            }

                            $namanya = respond['dpo'][$q]['nama_produk'] + $ukurannya + " (" + $warnanya + ")";
                        }
                        else if(respond['dpo'][$q]['keterangan'] == 1){
                            $id_ukuran = respond['dpo'][$q]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['dpo'][$q]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['dpo'][$q]['keterangan'] == 2){
                            $id_warna  = respond['dpo'][$q]['id_warna'];

                            for($k=0;$k<respond['jmwarna'];$k++){
                                if(respond['warna'][$k]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$k]['nama_warna'];
                                }
                            }

                            $namanya = respond['dpo'][$q]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['dpo'][$q]['nama_produk'];
                        }
                    //close nama produk

                    $terkirim = 0;

                    //jumlah sebelum 
                    if(respond['jmsebelum'] == 0){
                        $terkirim = 0;
                    }
                    else{
                        $hitung=0;
                        for($y=0;$y<respond['jmsebelum'];$y++){
                            if(respond['sebelum'][$y]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                                $hitung++;
                            }
                        }

                        if($hitung>0){
                            for($p=0;$p<respond['jmsebelum'];$p++){
                                if(respond['sebelum'][$p]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                                    $terkirim = respond['sebelum'][$p]['total'];
                                }
                            }
                        }
                        else{
                            $terkirim = 0;
                        }
                    }
                
                    $jumlah_selesai=0;
                    
                    //jumlah dari bpbj
                    if(respond['jmbpbj_tot'] == 0){
                        $jumlah_selesai = 0;
                    }
                    else{
                        $count=0;
                        for($t=0;$t<respond['jmbpbj_tot'];$t++){
                            if(respond['bpbj_tot'][$t]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                                $count++;
                            }
                        }

                        if($count>0){
                            for($y=0;$y<respond['jmbpbj_tot'];$y++){
                                if(respond['bpbj_tot'][$y]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                                    $jumlah_selesai = respond['bpbj_tot'][$y]['total'] - respond['bpbj_tot'][$y]['total_terkirim'];
                                }
                            }
                        }
                        else{
                            $jumlah_selesai=0;
                        }
                    }
                    
                   $belum_terkirim = parseInt(respond['dpo'][$q]['jumlah_produk']) - parseInt($terkirim);

                    $hithit=0;
                    $jumlah_akan_dikirim_sebelum = 0;
                    for($o=0;$o<respond['jm_isj'];$o++){
                        if(respond['dpo'][$q]['id_detail_produk'] == respond['isj'][$o]['id_detail_produk']){
                            $hithit++;
                            $jumlah_akan_dikirim_sebelum = respond['isj'][$o]['jumlah_produk'];
                            $id_item_surat_jalan = respond['isj'][$o]['id_item_surat_jalan'];
                        }
                    }

                    if($hithit == 0){
                        $terkirims       = $terkirim;
                        $belum_terkirims = $belum_terkirim;
                        $jumlah_selesais = $jumlah_selesai;


                        if($belum_terkirims != 0 && $jumlah_selesais != 0){
                            if($jumlah_selesais > $belum_terkirims){
                                $html_inp = '<center><input type="number" min="1"  max="'+$belum_terkirims+'" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" oninput="cek()"></center>';
                            }
                            else{
                                $html_inp = '<center><input type="number" min="1"  max="'+$jumlah_selesais+'" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" oninput="cek()"></center>';
                            }
                        }
                        else{
                            $html_inp = '<center><input type="number" min="1" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" disabled></center>';
                        }

                        $isi = $isi +
                        '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($q+1)+
                                    '<center><input type="hidden" name="id'+$q+'" value="'+respond['dpo'][$q]['id_detail_produk']+'"></center>'+
                                    '<input type="hidden" name="stat'+$q+'" id="stat'+$q+'"  value="0">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $namanya+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    respond['dpo'][$q]['kode_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    respond['dpo'][$q]['jumlah_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center><input type="hidden" id="terkirim'+$q+'" value="'+$terkirims+'"></center>'+
                                    $terkirims+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center><input type="hidden" id="belum_terkirim'+$q+'" value="'+$belum_terkirims+'"></center>'+
                                    $belum_terkirims+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center><input type="hidden" id="selesai'+$q+'" value="'+$jumlah_selesais+'"></center>'+
                                    $jumlah_selesais+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $html_inp+
                                '</td>'+
                        '</tr>';

                    }else{
                        $terkirims       = parseInt($terkirim) - parseInt($jumlah_akan_dikirim_sebelum);
                        $belum_terkirims = parseInt($belum_terkirim) + parseInt($jumlah_akan_dikirim_sebelum);
                        $jumlah_selesais = parseInt($jumlah_selesai) + parseInt($jumlah_akan_dikirim_sebelum);


                        if($belum_terkirims != 0 && $jumlah_selesais != 0){
                            if($jumlah_selesais > $belum_terkirims){
                                $html_inp = 
                                '<input type="hidden" name="old_total'+$q+'" value="'+$jumlah_akan_dikirim_sebelum+'">'+
                                '<center><input type="number" min="0"  max="'+$belum_terkirims+'" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" value="'+$jumlah_akan_dikirim_sebelum+'" oninput="cek()"></center>';
                            }
                            else{
                                $html_inp = 
                                '<input type="hidden" name="old_total'+$q+'" value="'+$jumlah_akan_dikirim_sebelum+'">'+
                                '<center><input type="number" min="0"  max="'+$jumlah_selesais+'" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" value="'+$jumlah_akan_dikirim_sebelum+'" oninput="cek()"></center>';
                            }
                        }
                        else{
                            $html_inp = '<center><input type="number" min="0" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" disabled></center>';
                        }

                        $isi = $isi +
                        '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($q+1)+
                                    '<center><input type="hidden" name="id'+$q+'" value="'+respond['dpo'][$q]['id_detail_produk']+'"></center>'+
                                    '<input type="hidden" name="stat'+$q+'" id="stat'+$q+'"  value="3">'+
                                    '<center><input type="hidden" name="id_isj'+$q+'" value="'+$id_item_surat_jalan+'"></center>'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $namanya+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    respond['dpo'][$q]['kode_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    respond['dpo'][$q]['jumlah_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center><input type="hidden" id="terkirim'+$q+'" value="'+$terkirims+'"></center>'+
                                    $terkirims+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center><input type="hidden" id="belum_terkirim'+$q+'" value="'+$belum_terkirims+'"></center>'+
                                    $belum_terkirims+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center><input type="hidden" id="selesai'+$q+'" value="'+$jumlah_selesais+'"></center>'+
                                    $jumlah_selesais+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $html_inp+
                                '</td>'+
                        '</tr>';
                    }
                }

                $table = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'No'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Nama Produk'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Kode Produk'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Total Produk'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Terkirim'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Belum Terkirim'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Selesai Produksi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Akan Dikirim'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>';

                $("#table_edit").html($table);
                $("#jumlah_detail").val(respond['jm_dpo']);

                $("#modaledit").modal();
            }
        });  
        
    });
</script>

<!-- cek di edit sj -->
<script>
    function cek(){
        $jumlah_detail = $("#jumlah_detail").val();
        $count = 0;

        for($i=0;$i<$jumlah_detail;$i++){
            if($("#kirim"+$i).val() != 0){
               if($("#stat"+$i).val() == 0){
                    $("#stat"+$i).val(1);
               }
               else if($("#stat"+$i).val() == 2){
                    $("#stat"+$i).val(3);
               }
            }
            else{
               if($("#stat"+$i).val() == 1){
                    $("#stat"+$i).val(0);
               }
               else if($("#stat"+$i).val() == 3){
                    $("#stat"+$i).val(2);
               }
            }
        }

        for($i=0;$i<$jumlah_detail;$i++){
            if($("#stat"+$i).val() == 1 || $("#stat"+$i).val() == 3){
                $count++;
            }
        }

        if($count > 0){
            $("#edit").prop('disabled',false);
        }
        else{
            $("#edit").prop('disabled',true);
        }
    }
</script>


    