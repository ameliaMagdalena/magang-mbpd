<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Edit Invoice</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Edit Invoice</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Edit Invoice</h2>
        </header>

        <div class="panel-body">
            <h4><b>Surat Jalan</b></h4>

            <form method="POST" action="<?= base_url()?>invoice/coba_edit_invoice">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th style="text-align: center;vertical-align: middle;">
                                No
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Nomor Surat Jalan
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Tanggal
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nonya = 1;
                            foreach($surat_jalan as $sj){?>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">
                                    <!-- status 0 (blm ditambahkan), status 1 (sudah ditambahkan) -->
                                    <?php if($sj->id_invoice == ""){?>
                                        <input type="hidden"  name="stat<?=$nonya;?>" id="stat<?=$nonya;?>" value="0">
                                    <?php } else{?>
                                        <input type="hidden"  name="stat<?=$nonya;?>" id="stat<?=$nonya;?>" value="3">
                                    <?php } ?>
                                    <?= $nonya ?>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="hidden" name="id<?=$nonya;?>" id="id<?=$nonya;?>" value="<?= $sj->id_surat_jalan?>">
                                    <?= $sj->id_surat_jalan ?>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <?= $sj->tanggal ?>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                        value="<?= $nonya;?>" title="Detail"></button>
                                    <?php if($sj->id_invoice == ""){?>
                                        <div id="div_badd<?= $nonya; ?>">
                                            <button type="button" class="add_sj col-lg-3 btn btn-success fa fa-plus-square-o" 
                                            value="<?= $nonya;?>" title="Add"></button>
                                        </div>
                                        <div id="div_bremove<?= $nonya; ?>" style="display:none">
                                            <button type="button" class="remove_sj col-lg-3 btn btn-danger fa fa-minus-square-o" 
                                            value="<?= $nonya;?>" title="Remove"></button>
                                        </div>
                                    <?php } else{?>
                                        <div id="div_badd<?= $nonya; ?>" style="display:none">
                                            <button type="button" class="add_sj col-lg-3 btn btn-success fa fa-plus-square-o" 
                                            value="<?= $nonya;?>" title="Add"></button>
                                        </div>
                                        <div id="div_bremove<?= $nonya; ?>" >
                                            <button type="button" class="remove_sj col-lg-3 btn btn-danger fa fa-minus-square-o" 
                                            value="<?= $nonya;?>" title="Remove"></button>
                                        </div>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php $nonya++; } ?>
                    </tbody>
                </table>
                <input type="hidden" name="jumlah_sj" id="jumlah_sj" value="<?= ($nonya-1) ?>">
            
                <br>
                <hr>
                <h4><b>Invoice</b></h4>

                <div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Invoice</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="id_invoice"
                            value="<?= $idnya ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kode PO</label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" name="id_po"
                            value="<?= $id_po ?>" readonly>
                            <input type="text" class="form-control"
                            value="<?= $po[0]['kode_purchase_order_customer'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal"
                            value="<?= $invoice[0]['tanggal'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Ditujukan Kepada</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="ditujukan_kepada" value="<?= $invoice[0]['ditujukan_kepada']?>"
                            required>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="<?= $po[0]['nama_customer']?>"
                            readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Rekening</label>
                        <div class="col-sm-7">
                            <select name="id_rekening" id="id_rekening" 
                                required class="form-control mb-md">
                                <?php foreach($rekening as $rk){
                                    if($rk->id_rekening == $invoice[0]['id_rekening']){?>
                                        <option value="<?= $rk->id_rekening?>" selected>
                                            <?= $rk->nama_bank ." (". $rk->nomor_rekening ." - ". $rk->atas_nama  .")" ?>
                                        </option>
                                    <?php } else{?>
                                        <option value="<?= $rk->id_rekening?>">
                                            <?= $rk->nama_bank ." (". $rk->nomor_rekening ." - ". $rk->atas_nama  .")" ?>
                                        </option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="keterangan" rows="3" id="textareaDefault"><?= $invoice[0]['keterangan']?>
                            </textarea>
                        </div>
                    </div>

                    <br>
                    <div id="isinya">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                            <thead>
                                <tr>
                                    <th style="text-align: center;vertical-align: middle;">
                                        No
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Item Description
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Qty
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Unit (Qty)
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Price
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Total Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($det_po as $dpo){
                                        $hitung = 0;
                                        foreach($det_invoice as $dinv){
                                            if($dpo->id_detail_produk == $dinv->id_detail_produk){
                                                $hitung++;
                                            }
                                        } 

                                        if($hitung > 0){
                                            foreach($det_invoice as $dinv){
                                                if($dpo->id_detail_produk == $dinv->id_detail_produk){
                                ?>
                                                    <tr>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <?= $no; ?>
                                                            <input type="hidden" id="id_detprod<?=$no?>" name="id_detprod<?=$no?>" value="<?= $dpo->id_detail_produk?>"> 
                                                            <input type="hidden" id="id_itinv<?=$no?>" name="id_itinv<?=$no?>" value="<?= $dinv->id_item_invoice?>"> 
                                                            <input type="hidden" id="keterangan<?=$no?>" name="keterangan<?=$no?>" value="3"> 
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <!-- memiliki ukuran & warna -->
                                                            <?php if($dpo->keterangan == 0){
                                                                $ukuran_tam = "";
                                                                $warna_tam  = "";
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $dpo->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                                
                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $dpo->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $dpo->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                                            <!-- memiliki ukuran -->
                                                            <?php } else if($dpo->keterangan == 1){
                                                                $ukuran_tam = "";
                                                                
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $dpo->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $dpo->nama_produk ?> <?= $ukuran_tam?>
                                                            <?php } else if($dpo->keterangan == 2){
                                                                $warna_tam = "";

                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $dpo->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $dpo->nama_produk ?> (<?= $warna_tam;?>)
                                                            <?php } else{?>
                                                                <?= $dpo->nama_produk ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <input type="hidden" id="qty<?=$no;?>" name="qty<?=$no;?>" value="<?= $dinv->jumlah_produk?>" class="form-control">
                                                            <p id="qtys<?=$no;?>"><?= $dinv->jumlah_produk?></p>
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            Pcs
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <input type="hidden" id="price<?=$no;?>" name="price<?=$no;?>" value="<?= $dinv->price?>" class="form-control">
                                                            <p id="prices<?=$no;?>"><?= $dinv->price?></p>
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <input type="hidden" id="tprice<?=$no;?>" name="tprice<?=$no;?>" value="<?= $dinv->total_price?>" class="form-control">
                                                            <p id="tprices<?=$no;?>"><?= $dinv->total_price?></p>
                                                        </td>
                                                    </tr>
                                <?php
                                                }
                                            }
                                        }
                                        else{
                                ?>
                                                    <tr>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <?= $no; ?>
                                                            <input type="hidden" id="id_detprod<?=$no?>" name="id_detprod<?=$no?>" value="<?= $dpo->id_detail_produk?>"> 
                                                            <input type="hidden" id="keterangan<?=$no?>" name="keterangan<?=$no?>"> 
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <!-- memiliki ukuran & warna -->
                                                            <?php if($dpo->keterangan == 0){
                                                                $ukuran_tam = "";
                                                                $warna_tam  = "";
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $dpo->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                                
                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $dpo->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $dpo->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                                            <!-- memiliki ukuran -->
                                                            <?php } else if($dpo->keterangan == 1){
                                                                $ukuran_tam = "";
                                                                
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $dpo->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $dpo->nama_produk ?> <?= $ukuran_tam?>
                                                            <?php } else if($dpo->keterangan == 2){
                                                                $warna_tam = "";

                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $dpo->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $dpo->nama_produk ?> (<?= $warna_tam;?>)
                                                            <?php } else{?>
                                                                <?= $dpo->nama_produk ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <input type="hidden" id="qty<?=$no;?>" name="qty<?=$no;?>" value="0" class="form-control">
                                                            <p id="qtys<?=$no;?>"></p>
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            Pcs
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <input type="hidden" id="price<?=$no;?>" name="price<?=$no;?>" value="<?= $dpo->harga_satuan ?>" class="form-control">
                                                            <p id="prices<?=$no;?>"><?= $dpo->harga_satuan ?></p>
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <input type="hidden" id="tprice<?=$no;?>" name="tprice<?=$no;?>" class="form-control">
                                                            <p id="tprices<?=$no;?>"></p>
                                                        </td>
                                                    </tr>
                                <?php   }  $no++;} ?>
                                <tr>
                                    <td colspan="3"  rowspan="4" 
                                    style="text-align: center;vertical-align: middle; background-color:white;border-left: 1px solid white;border-bottom: 1px solid white;"></td>
                                    <td colspan="2" style="text-align: center;vertical-align: middle;">Subtotal</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="subtotal" id="subtotal" value="<?= $invoice[0]['sub_total']?>">
                                        <p name="subtotals" id="subtotals"><?= $invoice[0]['sub_total']?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;vertical-align: middle;">Discount (%)</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <center>
                                            <input type="number" min="0" max="100" class="form-control" oninput="dis_change()"
                                            name="disc_rate" id="disc_rate" style="width:70px" step=".01" value="<?= $invoice[0]['discount_rate']?>">
                                        </center>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="disc" id="disc" value="<?= $invoice[0]['discount']?>">
                                        <p name="discs" id="discs"><?= $invoice[0]['discount']?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;vertical-align: middle;">PPN (%)</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <center>
                                            <input type="number" class="form-control" style="width:70px" value="<?= $ppn[0]['isi_tetapan'] ?>"   
                                            name="ppn_rate" id="ppn_rate" readonly value="<?= $invoice[0]['ppn_rate']?>">
                                        </center>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="ppn" id="ppn" value="<?= $invoice[0]['ppn']?>">
                                        <p name="ppns" id="ppns"><?= $invoice[0]['ppn']?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;vertical-align: middle;">Total</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="total" id="total" value="<?= $invoice[0]['total']?>">
                                        <p name="totals" id="totals"><?= $invoice[0]['total']?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="jumlah" id="jumlah" value="<?= $no-1 ?>">
                    <br>
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        </div>
                    </div>
                </footer>
            </form>
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
                            <input type="text" class="form-control" id="no_sj_ed" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tgl_ed" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault" id="ket_ed" readonly>
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

    <div id='modaldetailnya' class="modal-block modal-block-primary mfp-hide">
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
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>invoice/detail_sj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_sj_ed").val(respond['sj'][0]['id_surat_jalan']);
                $("#tgl_ed").val(respond['sj'][0]['tanggal']);
                $("#ket_ed").val(respond['sj'][0]['keterangan']);

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

                        $namanya = respond['isj'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
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

                        $namanya = respond['isj'][$i]['nama_produk'] + " (" + $warnanya + " )";
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

<!-- add sj -->
<script>
    $('.add_sj').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>invoice/item_sj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                for($i=0;$i<respond['jm_isj'];$i++){
                    $id_isj     = respond['isj'][$i]['id_item_surat_jalan'];
                    $id_detprod = respond['isj'][$i]['id_detail_produk'];
                    $jumlah_prd = respond['isj'][$i]['jumlah_produk'];

                    
                    for($j=1;$j<=$("#jumlah").val();$j++){
                        $id_detpro_inv = $("#id_detprod"+$j).val();
                        
                        if($id_detpro_inv == $id_detprod){
                            $qty_bfr = $("#qty"+$j).val();
                            $qty_aft = parseInt($qty_bfr) + parseInt($jumlah_prd);

                            $("#qty"+$j).val($qty_aft);
                            $("#qtys"+$j).html($qty_aft);

                            $price_bfr = $("#price"+$j).val();
                            $tprice_aft = $qty_aft * $price_bfr;

                            $("#tprice"+$j).val($tprice_aft);
                            $("#tprices"+$j).html($tprice_aft);
                        }
                    }
                }

                //subtotal
                $subtotal = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    $subtotal = parseInt($subtotal) + $("#tprice"+$j).val();
                }
                $("#subtotal").val($subtotal);
                $("#subtotals").html($subtotal);


                //discount
                if($("#disc_rate").val() != "" || $("#disc_rate").val() != 0){
                    $discount_rate = $("#disc_rate").val();

                    $discountnya = $subtotal * $discount_rate / 100;

                    $("#disc").val($discountnya);
                    $("#discs").html($discountnya);
                    
                }
                else{
                    $discountnya = 0;
                    $("#disc").val(0);
                    $("#discs").html("-");
                }

                //ppn
                $ppn_rate = $("#ppn_rate").val();
                $ppnnya = $subtotal * $ppn_rate / 100;

                $("#ppn").val($ppnnya);
                $("#ppns").html($ppnnya);

                $total = parseInt($subtotal) - parseInt($discountnya) + parseInt($ppnnya);

                $("#total").val($total);
                $("#totals").html($total);

                if($("#stat"+no).val() == 0){
                    $("#stat"+no).val(1);
                }
                if($("#stat"+no).val() == 2){
                    $("#stat"+no).val(3);
                }
                
                $("#div_badd"+no).hide();
                $("#div_bremove"+no).show();

                //keterangan
                $cek_terisi = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    if($("#qty"+$j).val() == 0 || $("#qty"+$j).val() == ""){
                        if($("#keterangan"+$j).val() == 1){
                            $("#keterangan"+$j).val(0);
                        }
                        if($("#keterangan"+$j).val() == 3){
                            $("#keterangan"+$j).val(2);
                        }
                    }
                    else{
                        if($("#keterangan"+$j).val() == 0){
                            $("#keterangan"+$j).val(1);
                        }
                        if($("#keterangan"+$j).val() == 2){
                            $("#keterangan"+$j).val(3);
                        }
                        $cek_terisi++;
                    }
                }

                if($cek_terisi > 0){
                    $("#tambah").attr('disabled',false);
                } else{
                    $("#tambah").attr('disabled',true);
                }
            }
        });  

    });
</script>

<!-- remove sj -->
<script>
    $('.remove_sj').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>invoice/item_sj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                for($i=0;$i<respond['jm_isj'];$i++){
                    $id_isj     = respond['isj'][$i]['id_item_surat_jalan'];
                    $id_detprod = respond['isj'][$i]['id_detail_produk'];
                    $jumlah_prd = respond['isj'][$i]['jumlah_produk'];

                    
                    for($j=1;$j<=$("#jumlah").val();$j++){
                        $id_detpro_inv = $("#id_detprod"+$j).val();
                        
                        if($id_detpro_inv == $id_detprod){
                            $qty_bfr = $("#qty"+$j).val();
                            $qty_aft = parseInt($qty_bfr) - parseInt($jumlah_prd);

                            $("#qty"+$j).val($qty_aft);
                            $("#qtys"+$j).html($qty_aft);

                            $price_bfr = $("#price"+$j).val();
                            $tprice_aft = $qty_aft * $price_bfr;

                            $("#tprice"+$j).val($tprice_aft);
                            $("#tprices"+$j).html($tprice_aft);
                        }
                    }
                }

                //subtotal
                $subtotal = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    $subtotal = parseInt($subtotal) + $("#tprice"+$j).val();
                }

                if($subtotal == 0){
                    $("#subtotal").val(0);
                    $("#subtotals").html("");
                }
                else{
                    $("#subtotal").val($subtotal);
                    $("#subtotals").html($subtotal);
                }

                //discount
                if($("#disc_rate").val() != "" || $("#disc_rate").val() != 0){
                    $discount_rate = $("#disc_rate").val();

                    $discountnya = $subtotal * $discount_rate / 100;

                    if($discountnya == 0){
                        $("#disc").val(0);
                        $("#discs").html("-");
                    }
                    else{
                        $("#disc").val($discountnya);
                        $("#discs").html($discountnya);
                    }
                    
                }
                else{
                    $discountnya = 0;
                    $("#disc").val(0);
                    $("#discs").html("-");
                }

                //ppn
                $ppn_rate = $("#ppn_rate").val();
                $ppnnya = $subtotal * $ppn_rate / 100;

                if($ppnnya == 0){
                    $("#ppn").val(0);
                    $("#ppns").html("-");
                }
                else{
                    $("#ppn").val($ppnnya);
                    $("#ppns").html($ppnnya);
                }

                $total = parseInt($subtotal) - parseInt($discountnya) + parseInt($ppnnya);

                if($total == 0){
                    $("#total").val(0);
                    $("#totals").html("");
                }
                else{
                    $("#total").val($total);
                    $("#totals").html($total);
                }

                //button
                if($("#stat"+no).val() == 1){
                    $("#stat"+no).val(0);
                }
                if($("#stat"+no).val() == 3){
                    $("#stat"+no).val(2);
                }
                
                
                $("#div_badd"+no).show();
                $("#div_bremove"+no).hide();

                //keterangan
                $cek_terisi = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    if($("#qty"+$j).val() == 0 || $("#qty"+$j).val() == ""){
                        if($("#keterangan"+$j).val() == 1){
                            $("#keterangan"+$j).val(0);
                        }
                        if($("#keterangan"+$j).val() == 3){
                            $("#keterangan"+$j).val(2);
                        }
                    }
                    else{
                        if($("#keterangan"+$j).val() == 0){
                            $("#keterangan"+$j).val(1);
                        }
                        if($("#keterangan"+$j).val() == 2){
                            $("#keterangan"+$j).val(3);
                        }
                        $cek_terisi++;
                    }
                }

                if($cek_terisi > 0){
                    $("#tambah").attr('disabled',false);
                } else{
                    $("#tambah").attr('disabled',true);
                }
            }
        });  

    });
</script>

<!-- disc change -->
<script>
    function dis_change(){
        $disc_rate = $("#disc_rate").val();

        $disc_aft  = $("#subtotal").val() * $disc_rate / 100;

        if($disc_aft == 0){
            $("#disc").val(0);
            $("#discs").html("-");
        }
        else{
            $("#disc").val($disc_aft);
            $("#discs").html($disc_aft);
        }

       
        $total = parseInt($("#subtotal").val()) - parseInt($disc_aft) + parseInt($("#ppn").val());

        $("#total").val($total);
        $("#totals").html($total);


    }
</script>

    