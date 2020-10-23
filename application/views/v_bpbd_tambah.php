<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Bpbd</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tambah Bpbd</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Purchase Order</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal PO</th>
                        <th style="text-align: center;vertical-align: middle;">Kode PO</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Customer</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;    
                        foreach($purchase_order as $po){
                    ?>
                    <?php  
                        //hitung untuk jumlah dpo yang msih ada yang harus dikirim
                        $hitung = 0;
                        foreach($detail_purchase_order as $dpo){
                            if($po->id_purchase_order_customer == $dpo->id_purchase_order_customer){
                                //cek apakah detail po tersebut sudah pernah dikirim/belum
                                $cek = 0;
                                foreach($terkirim as $t){
                                    if($dpo->id_detail_produk == $t->id_detail_produk){
                                        $cek++;
                                    }
                                }

                                //kalau sebelumnya belum pernah ada dpo yg dikirim berarti, $hitung++
                                if($cek == 0){
                                    //cek bpbj apakah ada produk yang sudah selesai atau tidak.
                                    $cari_selesai = 0;
                                    foreach($bpbj_available as $ba){
                                        if($dpo->id_detail_produk == $ba->id_detail_produk){
                                           $cari_selesai++;
                                        }
                                    }
                                    //$selesai = $ba->jumlah_produk;
                                    if($cari_selesai > 0){
                                        $hitung++;
                                    }
                                }
                                if($cek>0){
                                    $jumlah_terkirim = 0;
                                    foreach($terkirim as $t){
                                        if($dpo->id_purchase_order_customer == $t->id_purchase_order_customer && $dpo->id_detail_produk == $t->id_detail_produk){
                                            $jumlah_terkirim = $t->total;
                                        }
                                    }

                                    $jumlah_permintaan = $dpo->jumlah_produk;
                                    $max = $jumlah_permintaan - $jumlah_terkirim;

                                    if($max > 0){
                                        //cek bpbj apakah ada produk yang sudah selesai atau tidak.
                                        $cari_selesai = 0;
                                        foreach($bpbj_available as $ba){
                                            if($dpo->id_detail_produk == $ba->id_detail_produk){
                                            $cari_selesai++;
                                            }
                                        }
                                        //$selesai = $ba->jumlah_produk;
                                        if($cari_selesai > 0){
                                            $hitung++;
                                        }
                                    }
                                }
                            }
                        }
                        if($hitung > 0){
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $no ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $po->tanggal_po?>
                                <input type="hidden" id="id<?= $no;?>" value="<?= $po->id_purchase_order_customer?>">
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $po->kode_purchase_order_customer?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $po->nama_customer?>
                            </td>
                            <td class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
                                <button type="button" class="badd_klik col-lg-3 btn btn-success fa fa-plus-square-o" 
                                    value="<?= $no;?>" title="Buat Surat Jalan"></button>
                            </td>
                        </tr>
                    <?php $no++; }}?>
                </tbody>
	        </table>
        </div>
    </div>

        <!-- modal detail -->
        <div class="modal" id="modaldetail" role="dialog">
            <div class="modal-dialog modal-xl" style="width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Detail Purchase Order</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal PO</label>
                            <div class="col-sm-7">
                                <input type="text" id="tanggal_po_detail" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Kode PO</label>
                            <div class="col-sm-7">
                                <input type="text" id="nomor_po_detail" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Customer</label>
                            <div class="col-sm-7">
                                <input type="text" id="nama_cust_detail" class="form-control"
                                readonly>
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

        <!-- modal tambah -->
        <div class="modal" id="modaltambah" role="dialog">
            <div class="modal-dialog modal-xl" style="width:70%">
                <form method="POST" action="<?= base_url()?>suratJalan/tambah_surat_jalan">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Buat Surat Jalan</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nomor Surat Jalan</label>
                                <div class="col-sm-7">
                                    <input type="hidden" id="id_po_tambah" name="id_po_tambah"
                                    class="form-control" readonly>
                                    <input type="text" class="form-control"
                                    value="<?= $idnya ?>" name="nomor_sj_tambah" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Tanggal PO</label>
                                <div class="col-sm-7">
                                    <input type="text" id="tanggal_po_tambah" class="form-control"
                                    readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nomor PO</label>
                                <div class="col-sm-7">
                                    <input type="text" id="nomor_po_tambah" name="nomor_po_tambah"
                                    class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nama Customer</label>
                                <div class="col-sm-7">
                                    <input type="text" id="nama_cust_tambah" class="form-control"
                                    readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Data Kendaraan</label>
                                <div class="col-sm-7">
                                    <input type="text" id="kendaraan"  name="kendaraan" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nama Pengirim</label>
                                <div class="col-sm-7">
                                    <input type="text" id="nama_pengirim"  name="nama_pengirim" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Keterangan Pengiriman</label>
                                <div class="col-sm-7">
                                    <input type="text" id="keterangan_pengiriman"  name="keterangan_pengiriman" 
                                    class="form-control" placeholder="Oleh Customer/Jasa Kirim" required>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Keterangan</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" name="keterangan" rows="3" id="textareaDefault">
                                    </textarea>
                                </div>
                            </div>
                            <br>

                            <div id="table_tambah">
                            
                            </div>
                            <input type="hidden" id="jumlah_detail" name="jumlah_detail">
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

<!-- detail po -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratJalan/detail_po_bpbj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#tanggal_po_detail").val(respond['po'][0]['tanggal_po']);
                $("#nomor_po_detail").val(respond['po'][0]['kode_purchase_order_customer']);
                $("#nama_cust_detail").val(respond['po'][0]['nama_customer']);

                $isi = "";

                for($q=0;$q<respond['jmdpo'];$q++){
                    $namanya = "";

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

                        $namanya = respond['dpo'][$q]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
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

                        $namanya = respond['dpo'][$q]['nama_produk'] + " (" + $warnanya + " )";
                    }
                    else{
                        $namanya = respond['dpo'][$q]['nama_produk'];
                    }

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

                    $belum_terkirim = parseInt(respond['dpo'][$q]['jumlah_produk']) - parseInt($terkirim);

                   $isi = $isi +
                   '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($q+1)+
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
                            $terkirim+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $belum_terkirim+
                        '</td>'+
                   '</tr>';
                }

                $table=
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
    $('.badd_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
    
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratJalan/detail_po_bpbj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#tanggal_po_tambah").val(respond['po'][0]['tanggal_po']);
                $("#id_po_tambah").val(respond['po'][0]['id_purchase_order_customer']);
                $("#nomor_po_tambah").val(respond['po'][0]['kode_purchase_order_customer']);
                $("#nama_cust_tambah").val(respond['po'][0]['nama_customer']);

                $isi = "";

                for($q=0;$q<respond['jmdpo'];$q++){
                    $namanya = "";

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

                        $namanya = respond['dpo'][$q]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
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

                        $namanya = respond['dpo'][$q]['nama_produk'] + " (" + $warnanya + " )";
                    }
                    else{
                        $namanya = respond['dpo'][$q]['nama_produk'];
                    }

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

                  
                    if($belum_terkirim != 0 && $jumlah_selesai != 0){
                        if($jumlah_selesai > $belum_terkirim){
                            $html_inp = '<center><input type="number" min="1"  max="'+$belum_terkirim+'" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" oninput="cek()"></center>';
                        }
                        else{
                            $html_inp = '<center><input type="number" min="1"  max="'+$jumlah_selesai+'" class="form-control" id="kirim'+$q+'" name="kirim'+$q+'" oninput="cek()"></center>';
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
                            '<center><input type="hidden" id="terkirim'+$q+'" value="'+$terkirim+'"></center>'+
                            $terkirim+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center><input type="hidden" id="belum_terkirim'+$q+'" value="'+$belum_terkirim+'"></center>'+
                            $belum_terkirim+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center><input type="hidden" id="selesai'+$q+'" value="'+$jumlah_selesai+'"></center>'+
                            $jumlah_selesai+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $html_inp+
                        '</td>'+
                   '</tr>';
                }

                $table=
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

                $("#table_tambah").html($table);
                $("#jumlah_detail").val(respond['jmdpo']);

                $("#modaltambah").modal();
            }
        });  
    });
</script>

<script>
    function cek(){
        $jumlah_detail = $("#jumlah_detail").val();
        $count = 0;

        for($i=0;$i<$jumlah_detail;$i++){
            if($("#kirim"+$i).val() != 0){
                $count++;
            }
        }

        if($count > 0){
            $("#tambah").prop('disabled',false);
        }
        else{
            $("#tambah").prop('disabled',true);
        }
    }
</script>


    