<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Buat Permintaan Material Tambahan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Permintaan Material Tambahan</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Buat Permintaan Material Tambahan</h2>
        </header>

        <div class="panel-body">
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Tanggal Produksi</label>
                    <div class="col-sm-9">
                        <input class="form-control col-md-5" type="text" id="tanggal_mulai" name="tanggal_mulai"
                        value="<?= $min_date; ?>" disabled> 
                    </div>
            </div>
            <br><br>

            <h4 class="panel-title">Data Produk</h4>
            <br>

            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Jumlah Produk (pcs)</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($permat as $x){?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no?></td>
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
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_permintaan_material?>">
                                <?= $x->jumlah_minta?>
                            </td>
                            <td class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
                                <button type="button" class="btambahan_klik col-lg-3 btn btn-success fa  fa-plus-square-o" 
                                    value="<?= $no;?>" title="Buat Permintaan Tambahan"></button>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
	        </table>
        </div>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                
                </div>
            </div>
        </footer>
    </section>

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

    <!-- modal tambahan -->
    <div class="modal" id="modaltambahan" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <form method="POST" action="<?= base_url()?>permintaanTambahan/tambah">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Buat Permintaan Pengambilan Material Tambahan</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor Permintaan Material</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_permat_add_tambahan" readonly>
                                <input type="hidden" class="form-control" id="status_pengambilan_tambahan" name="status_pengambilan_tambahan" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Kode PO</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="kode_po_add_tambahan" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Line</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama_line_add_tambahan" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Permintaan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_permintaan_add_tambahan" name="tanggal_permintaan_add_tambahan" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Produksi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_produksi_add_tambahan" name="tanggal_produksi_add_tambahan" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Jumlah Minta</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="jumlah_minta_add_tambahan" readonly>
                            </div>
                        </div>
                        <?php if($_SESSION['nama_jabatan'] == "PIC Line Sewing"){?>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Keterangan Pengambilan</label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="keterangan_pengambilan_tambahan" onchange="ganti_keterangan_pengambilan()">
                                        <option value=" ">Keterangan Pengambilan</option>
                                        <option value="0">Pengambilan Material Untuk Cutting Kain</option>
                                        <option value="1">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <br>
                        
                        <div id="table_add_tambahan"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan" disabled>
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
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
            url:"<?php echo base_url() ?>pengambilanMaterialProduksi/detail_permintaan",
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
                    //telah diambil dari gudang
                    $cari = 0;
                    $jumlah_sebelum = 0;
                    for($o=0;$o<respond['jm_pengmat'];$o++){
                        if(respond['pengmat'][$o]['id_detail_permintaan_material'] == respond['detpermat'][$i]['id_detail_permintaan_material']){
                            $jumlah_sebelum       = respond['pengmat'][$o]['jumlah_keluar'];
                            $cari++;
                        }

                        if($cari > 0){
                            $jumlah_sebelum = $jumlah_sebelum;
                        }
                        else{
                            $jumlah_sebelum = 0;
                        }
                    }

                    //telah diambil dari inventory line
                    for($k=0;$k<respond['jm_det_inline'];$k++){
                        if(respond['det_inline'][$k]['id_detail_permintaan_material'] == respond['detpermat'][$i]['id_detail_permintaan_material'] &&
                        respond['det_inline'][$k]['status'] == 1){
                            $jumlah_sebelum = parseFloat($jumlah_sebelum) + parseFloat(respond['det_inline'][$k]['jumlah_material']);
                        }
                    }

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
                            $jumlah_sebelum+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['satuan_keluar']+
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
                                        'Jumlah Diambil'+
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

<!-- buat permintaan tambahan -->
<script>
    $('.btambahan_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>pengambilanMaterialProduksi/detail_permintaan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_permat_add_tambahan").val(respond['permat'][0]['id_permintaan_material']);
                $("#kode_po_add_tambahan").val(respond['permat'][0]['kode_purchase_order_customer']);
                $("#nama_line_add_tambahan").val(respond['permat'][0]['nama_line']);
                $("#tanggal_permintaan_add_tambahan").val(respond['permat'][0]['tanggal_permintaan']);
                $("#tanggal_produksi_add_tambahan").val(respond['permat'][0]['tanggal_produksi']);
                $("#jumlah_minta_add_tambahan").val(respond['permat'][0]['jumlah_minta']);

                if(respond['permat'][0]['nama_line'] == "Line Cutting" || respond['permat'][0]['nama_line'] == "Line Bonding" || respond['permat'][0]['nama_line'] == "Line Assy"){
                    $("#status_pengambilan_tambahan").val(1);
                }
                else{
                    $("#status_pengambilan_tambahan").val($("#keterangan_pengambilan").val());
                }

                $isi = "";
                for($i=0;$i<respond['jm_detpermat'];$i++){
                    //telah diambil
                    $cari                 = 0;
                    $jumlah_sebelum       = 0;
                    for($o=0;$o<respond['jm_pengmat'];$o++){
                        if(respond['pengmat'][$o]['id_detail_permintaan_material'] == respond['detpermat'][$i]['id_detail_permintaan_material']){                
                            $jumlah_sebelum       = respond['pengmat'][$o]['jumlah_keluar'];
                            $cari++;
                        }

                        if($cari > 0){
                            $jumlah_sebelum = $jumlah_sebelum;
                        }
                        else{
                            $jumlah_sebelum = 0;
                        }
                    }

                    //telah diambil dari inventory line
                    for($k=0;$k<respond['jm_det_inline'];$k++){
                        if(respond['det_inline'][$k]['id_detail_permintaan_material'] == respond['detpermat'][$i]['id_detail_permintaan_material'] &&
                        respond['det_inline'][$k]['status'] == 1){
                            $jumlah_sebelum = parseFloat($jumlah_sebelum) + parseFloat(respond['det_inline'][$k]['jumlah_material']);
                        }
                    }

                    $batas_ambil = respond['detpermat'][$i]['needs'] - $jumlah_sebelum;

                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                            '<input type="hidden" id="stat_km'+$i+'" value="'+respond['detpermat'][$i]['status_konsumsi']+'" >'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="id_det_permat'+$i+'" value="'+respond['detpermat'][$i]['id_detail_permintaan_material']+'">'+
                            '<input type="hidden" name="id_sub_jenmat'+$i+'" value="'+respond['detpermat'][$i]['id_sub_jenis_material']+'">'+
                            respond['detpermat'][$i]['nama_sub_jenis_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['jumlah_konsumsi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['needs']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_sebelum+
                            '<input type="hidden" name="batas_ambilnya'+$i+'" id="batas_ambilnya'+$i+'" value="'+$batas_ambil+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center><input type="number" min="0" step=".01" class="form-control" name="ambilnya'+$i+'" id="ambilnya'+$i+'" oninput="cek()"></center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['detpermat'][$i]['satuan_keluar']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<textarea class="form-control" name="keterangan'+$i+'" rows="3" id="textareaDefault"></textarea>'+
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
                                        'Konsumsi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Permintaan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Telah Diambil'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Permintaan Tambahan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan Konsumsi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Keterangan'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>'+
                '<input type="hidden" name="jumlah_detpermat_tambahan" id="jumlah_detpermat_tambahan" value="'+respond['jm_detpermat']+'">';

                $("#table_add_tambahan").html($table);
                
                $cek_pengambilan = 0;
                for($p=0;$p<respond['jm_detpermat'];$p++){
                    if($("#batas_ambilnya"+$p).val() > 0){
                        $("#ambilnya"+$p).prop('disabled',true);
                    }
                }

                $("#modaltambahan").modal();
            }
        });  
    });
</script>

<!-- keterangan pengambilan -->
<script>
    function ganti_keterangan_pengambilan(){
        $("#status_pengambilan").val($("#keterangan_pengambilan").val());

        if($("#status_pengambilan").val() == " "){
            $("#tambah").prop('disabled',true);
        } else{
            cek();
        }

        //cek km, untuk cutting kain atau lainnya
        $jumlah_detpermat = $("#jumlah_detpermat").val();
        
        if($("#keterangan_pengambilan").val() == 0){
            for($i=0;$i<$jumlah_detpermat;$i++){
                if($("#stat_km"+$i).val() == 0){
                    $("#ambil"+$i).prop('disabled',false);
                } else{
                    $("#ambil"+$i).prop('disabled',true);
                    $("#ambil"+$i).val(null);
                }
            }
        } else{
            for($i=0;$i<$jumlah_detpermat;$i++){
                if($("#stat_km"+$i).val() == 1){
                    $("#ambil"+$i).prop('disabled',false);
                } else{
                    $("#ambil"+$i).prop('disabled',true);
                    $("#ambil"+$i).val(null);
                }
            }
        }
    }
</script>

<!-- cek -->
<script>
    function cek(){
        $jumlah_detpermat_tambahan = $("#jumlah_detpermat_tambahan").val();

        $terisi = 0;
        for($i=0;$i<$jumlah_detpermat_tambahan;$i++){
            if($("#ambilnya"+$i).val() > 0){
                $terisi++;
            }
        }

        if($terisi > 0 && $("#status_pengambilan_tambahan").val() != " "){
            $("#tambah").prop('disabled',false);
        }
        else{
            $("#tambah").prop('disabled',true);
        }
    }
</script>






    