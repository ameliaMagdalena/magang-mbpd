<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua Permintaan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Semua Permintaan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Semua Permintaan Material</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Kode Permintaan Material</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal Permintaan</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Line</th>
                        <th style="text-align: center;vertical-align: middle;">Status Permintaan</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($permintaan_material as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->id_permintaan_material?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $x->tanggal_permintaan ?>
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_permintaan_material?>">
                            </td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->tanggal_produksi ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <center>
                                    <!-- memiliki ukuran & warna -->
                                    <?php if($x->keterangan == 0){
                                        $ukuran_tam = "";
                                        $warna_tam  = "";
                                        foreach($ukuran as $u){
                                            if($u->id_ukuran_produk == $x->id_ukuran_produk){
                                                $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                            }
                                        }
                                        
                                        foreach($warna as $w){
                                            if($w->id_warna == $x->id_warna){
                                                $warna_tam = $w->nama_warna;
                                            }
                                        }
                                    ?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                        </p>
                                    <!-- memiliki ukuran -->
                                    <?php } else if($x->keterangan == 1){
                                        $ukuran_tam = "";
                                        
                                        foreach($ukuran as $u){
                                            if($u->id_ukuran_produk == $x->id_ukuran_produk){
                                                $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                            }
                                        }
                                    ?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?> <?= $ukuran_tam?>
                                        </p>
                                    <?php } else if($x->keterangan == 2){
                                        $warna_tam = "";

                                        foreach($warna as $w){
                                            if($w->id_warna == $x->id_warna){
                                                $warna_tam = $w->nama_warna;
                                            }
                                        }
                                    ?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?> (<?= $warna_tam;?>)
                                        </p>
                                    <?php } else{?>
                                        <p id="nama_produk<?= $no ?>">
                                            <?= $x->nama_produk ?>
                                        </p>
                                    <?php } ?>
                                </center>
                            </td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_line ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php if($x->status_permintaan == 0){?>
                                    Belum Ditindaklanjuti
                                <?php } else if($x->status_permintaan == 1){?>
                                    Sedang diproses
                                <?php } else if($x->status_permintaan == 2){?>
                                    Material Tersedia
                                <?php } else if($x->status_permintaan == 3){?>
                                    Selesai 
                                <?php } else if($x->status_permintaan == 4){?>
                                    Batal
                                <?php } else if($x->status_permintaan == 5){?>
                                    Ditolak
                                <?php } ?>
                            </td>
                            <td  class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php 
                                    $cari = 0;
                                    foreach($jumlah_ubmin as $k){
                                        if($k->id_permintaan_material == $x->id_permintaan_material){
                                            $cari++;
                                        }
                                    }  
                                    
                                    if($cari > 0){
                                ?>
                                    <button type="button" class="bubmin_klik col-lg-3 btn btn-warning fa  fa-history" 
                                        value="<?= $no;?>" title="Perubahan Permintaan Material" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php } ?>
                            </td>
                        </tr>
                    <?php
                    $no++;
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>

<!-- modal detail -->
<div class="modal" id="modaldetail" role="dialog">
    <div class="modal-dialog modal-xl" style="width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Detail Permintaan Material</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nomor Permintaan Material</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="no_permat" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Kode PO</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="kode_po" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nama Line</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_line" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Tanggal Permintaan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="tanggal_permintaan" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Tanggal Produksi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="tanggal_produksi" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Jumlah Minta</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="jumlah_minta" readonly>
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

<!-- modal ubmin -->
<div class="modal" id="modalubmin" role="dialog">
    <div class="modal-dialog modal-xl" style="width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Detail Perubahan Permintaan Material</b></h4>
            </div>
            <div class="modal-body">
                
                <div id="table_ubmin">
                
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
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

<!-- detail permintaan material -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>permintaanMaterialProduksi/detail_permintaan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_permat").val(respond['permat'][0]['id_permintaan_material']);
                $("#kode_po").val(respond['permat'][0]['kode_purchase_order_customer']);
                $("#nama_line").val(respond['permat'][0]['nama_line']);
                $("#tanggal_permintaan").val(respond['permat'][0]['tanggal_permintaan']);
                $("#tanggal_produksi").val(respond['permat'][0]['tanggal_produksi']);
                $("#jumlah_minta").val(respond['permat'][0]['jumlah_minta']);

                $isi = "";
                for($i=0;$i<respond['jm_detpermat'];$i++){
                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['id_detail_permintaan_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['nama_sub_jenis_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['jumlah_konsumsi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['needs']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['satuan_ukuran']+
                        '</td>'+
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
                                        'Kode Detail Permintaan Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Nama Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Konsumsi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Permintaan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan Konsumsi'+
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

<!-- ubmin -->
<script>
    $('.bubmin_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>permintaanMaterialProduksi/perubahan_permintaan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = "";

                for($i=0;$i<respond['jm_ubmin'];$i++){
                    $status = "";

                    if(respond['ubmin'][$i]['status'] == 0){
                        $status = "Belum Diproses";
                    } else if(respond['ubmin'][$i]['status'] == 1){
                        $status = "Disetujui";
                    } else if(respond['ubmin'][$i]['status'] == 2){
                        $status = "Tidak Disetujui";
                    } else{
                        $status = "Batal";
                    }

                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['ubmin'][$i]['waktu_add']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['ubmin'][$i]['jumlah_minta_lama']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['ubmin'][$i]['jumlah_minta_baru']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $status+
                        '</td>'+
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
                                        'Waktu Perubahan Permintaan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Minta Lama'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Minta Baru'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Status'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>';

                /*
                $("#no_permat").val(respond['permat'][0]['id_permintaan_material']);
                $("#kode_po").val(respond['permat'][0]['kode_purchase_order_customer']);
                $("#nama_line").val(respond['permat'][0]['nama_line']);
                $("#tanggal_permintaan").val(respond['permat'][0]['tanggal_permintaan']);
                $("#tanggal_produksi").val(respond['permat'][0]['tanggal_produksi']);
                $("#jumlah_minta").val(respond['permat'][0]['jumlah_minta']);

                $isi = "";
                for($i=0;$i<respond['jm_detpermat'];$i++){
                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['nama_sub_jenis_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['jumlah_konsumsi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['needs']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['satuan_ukuran']+
                        '</td>'+
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
                                        'Nama Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Konsumsi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Permintaan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan Konsumsi'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>';

                
                */
                $("#table_ubmin").html($table);
                $("#modalubmin").modal();
            }
        });  
    });
</script>




    