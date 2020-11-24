<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua Produksi Tertunda</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Semua Produksi Tertunda</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Semua Produksi Tertunda</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Kode PO</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Line</th>
                        <th style="text-align: center;vertical-align: middle;">Jumlah Tertunda</th>
                        <th style="text-align: center;vertical-align: middle;">Status Penjadwalan</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($prodtun as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->kode_purchase_order_customer ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->tanggal ?></td>
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
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_produksi_tertunda?>">
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $x->nama_line?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $x->jumlah_tertunda?> Pcs
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php if($x->status_penjadwalan == 0){?>
                                    Belum Diproses
                                <?php } else if($x->status_penjadwalan == 1){?>
                                    Sedang Diproses
                                <?php } else{?>
                                    Selesai
                                <?php } ?>
                            </td>
                            <td  class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
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
                <h4 class="modal-title"><b>Detail Produksi Tertunda</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nomor Produksi Tertunda</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="id" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Kode PO</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="kode_po" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Tanggal Produksi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="tanggal" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nama Produk</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_produk" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nama Line</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_line" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Jumlah Tertunda</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="jumlah_tertunda" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Jumlah Terencana</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="jumlah_terencana" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Status Penjadwalan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="status_penjadwalan" readonly>
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

<!-- detail -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>produksiTertunda/detail",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#id").val(respond['prodtun'][0]['id_produksi_tertunda']);
                $("#kode_po").val(respond['prodtun'][0]['kode_purchase_order_customer']);
                $("#tanggal").val(respond['prodtun'][0]['tanggal']);
                $("#nama_line").val(respond['prodtun'][0]['nama_line']);
                $("#jumlah_tertunda").val(respond['prodtun'][0]['jumlah_tertunda']);

                //nama produk
                    $namanya = ""; 
                    
                    if(respond['prodtun'][0]['keterangan'] == 0){
                        $id_ukuran = respond['prodtun'][0]['id_ukuran'];
                        $id_warna  = respond['prodtun'][0]['id_warna'];

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

                        $namanya = respond['prodtun'][0]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                    }
                    else if(respond['prodtun'][0]['keterangan'] == 1){
                        $id_ukuran = respond['prodtun'][0]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        $namanya = respond['prodtun'][0]['nama_produk'] + $ukurannya;

                    }
                    else if(respond['prodtun'][0]['keterangan'] == 2){
                        $id_warna  = respond['prodtun'][0]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['prodtun'][0]['nama_produk'] + " (" + $warnanya + ")";
                    }
                    else{
                        $namanya = respond['prodtun'][0]['nama_produk'];
                    }

                    $("#nama_produk").val($namanya);
                //tutup nama produk

                //status penjadwalan
                    $status_penjadwalannya = "";
                    if(respond['prodtun'][0]['status_penjadwalan'] == 0){
                        $status_penjadwalannya = "Belum Diproses";
                    } else if(respond['prodtun'][0]['status_penjadwalan'] == 1){
                        $status_penjadwalannya = "Sedang Diproses";
                        $("#jumlah_terencana").val(respond['prodtun'][0]['jumlah_terencana']);
                    } else{
                        $status_penjadwalannya = "Selesai";
                        $("#jumlah_terencana").val(respond['prodtun'][0]['jumlah_terencana']);
                    }

                    $("#status_penjadwalan").val($status_penjadwalannya);
                //tutup status penjadwalan
                
                $isi = "";
                
                for($i=0;$i<respond['jm_detprodtun'];$i++){
                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detprodtun'][$i]['tanggal']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detprodtun'][$i]['jumlah_perencanaan']+
                        '</td>'+
                    '</tr>';
                }

                if(respond['jm_detprodtun'] > 0){
                    $table = 
                    '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th style="text-align: center;vertical-align: middle;">'+
                                            'No'+
                                        '</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">'+
                                            'Tanggal Penjadwalan Ulang'+
                                        '</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">'+
                                            'Jumlah Perencanaan'+
                                        '</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                $isi+
                                '</tbody>'+
                    '</table>';


                    $("#table_detail").html($table);
                }

                $("#modaldetail").modal();
            }
        });  
    });
</script>
