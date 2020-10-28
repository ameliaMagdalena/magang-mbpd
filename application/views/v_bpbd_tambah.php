<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah BPBD</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tambah BPBD</span></li>
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
                            $cek = 0;
                            foreach($surat_jalan as $sj){
                                if($po->id_purchase_order_customer == $sj->id_purchase_order_customer){
                                    $cek++;
                                }
                            } 
                        
                        if($cek > 0){
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
                <form method="POST" action="<?= base_url()?>bpbd/buat_bpbd">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Buat BPBD</b></h4>
                        </div>
                        <div class="modal-body">
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
                                    <input type="hidden" id="id_po_tambah" name="id_po_tambah" class="form-control"
                                        readonly>
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
                                <label class="col-sm-5 control-label">Plat Nomor</label>
                                <div class="col-sm-7">
                                    <input type="text" id="plat_nomor"  name="plat_nomor" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Driver</label>
                                <div class="col-sm-7">
                                    <input type="text" id="driver"  name="driver" class="form-control" required>
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
            url:"<?php echo base_url() ?>bpbd/detail_po_sj",
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

                    //stok gundang
                        $cari_gudang = 0;
                        $stok_gudang = 0;
                        
                        for($u=0;$u<respond['jm_stok_gudang'];$u++){
                            if(respond['dpo'][$q]['id_detail_produk'] == respond['stok_gudang'][$u]['id_detail_produk']){
                                $cari_gudang++;
                            }
                        }
        
                        if($cari_gudang > 0){
                            for($u=0;$u<respond['jm_stok_gudang'];$u++){
                                if(respond['dpo'][$q]['id_detail_produk'] == respond['stok_gudang'][$u]['id_detail_produk']){
                                    $stok_gudang = respond['stok_gudang'][$u]['jumlah_produk'];
                                }
                            }
                        }
                        else{
                            $stok_gudang = 0;
                        }
                    //tutup stok gudang

                    //terambil
                        $cari_terambil = 0;
                        $terambil = 0;
                        
                        for($u=0;$u<respond['jm_terambil'];$u++){
                            if(respond['dpo'][$q]['id_detail_produk'] == respond['terambil'][$u]['id_detail_produk']){
                                $cari_terambil++;
                            }
                        }
        
                        if($cari_terambil > 0){
                            for($u=0;$u<respond['jm_terambil'];$u++){
                                if(respond['dpo'][$q]['id_detail_produk'] == respond['terambil'][$u]['id_detail_produk']){
                                    $terambil = respond['terambil'][$u]['jumlah_produk'];
                                }
                            }
                        }
                        else{
                            $terambil = 0;
                        }
                    //tutup terambil
                    
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
                            $stok_gudang+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $terambil+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            (parseInt($stok_gudang) - parseInt($terambil))+
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
                                    'Stok Gudang'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Diambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Belum Diambil'+
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

<!-- add bpbd -->
<script>
    $('.badd_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bpbd/detail_po_sj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#tanggal_po_tambah").val(respond['po'][0]['tanggal_po']);
                $("#id_po_tambah").val(respond['po'][0]['id_purchase_order_customer']);
                $("#nomor_po_tambah").val(respond['po'][0]['kode_purchase_order_customer']);
                $("#nama_cust_tambah").val(respond['po'][0]['nama_customer']);
                $("#jumlah_detail").val(respond['jmdpo']);

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

                    //stok gundang
                        $cari_gudang = 0;
                        $stok_gudang = 0;
                        
                        for($u=0;$u<respond['jm_stok_gudang'];$u++){
                            if(respond['dpo'][$q]['id_detail_produk'] == respond['stok_gudang'][$u]['id_detail_produk']){
                                $cari_gudang++;
                            }
                        }
        
                        if($cari_gudang > 0){
                            for($u=0;$u<respond['jm_stok_gudang'];$u++){
                                if(respond['dpo'][$q]['id_detail_produk'] == respond['stok_gudang'][$u]['id_detail_produk']){
                                    $stok_gudang = respond['stok_gudang'][$u]['jumlah_produk'];
                                }
                            }
                        }
                        else{
                            $stok_gudang = 0;
                        }
                    //tutup stok gudang

                    //terambil
                        $cari_terambil = 0;
                        $terambil = 0;
                        
                        for($u=0;$u<respond['jm_terambil'];$u++){
                            if(respond['dpo'][$q]['id_detail_produk'] == respond['terambil'][$u]['id_detail_produk']){
                                $cari_terambil++;
                            }
                        }
        
                        if($cari_terambil > 0){
                            for($u=0;$u<respond['jm_terambil'];$u++){
                                if(respond['dpo'][$q]['id_detail_produk'] == respond['terambil'][$u]['id_detail_produk']){
                                    $terambil = respond['terambil'][$u]['jumlah_produk'];
                                }
                            }
                        }
                        else{
                            $terambil = 0;
                        }
                    //tutup terambil

                    $belum_diambil = (parseInt($stok_gudang) - parseInt($terambil));

                    if($belum_diambil != 0){
                        $html_inp = '<center><input type="number" min="0"  max="'+$belum_diambil+'" class="form-control" id="ambil'+$q+'" name="ambil'+$q+'" oninput="cek()"></center>';
                        $html_ket = '<center><textarea type="text" class="form-control" name="ket'+$q+'"></textarea></center>';
                    }
                    else{
                        $html_inp = '<center><input type="number" min="0" class="form-control" id="ambil'+$q+'" name="ambil'+$q+'" disabled></center>';
                        $html_ket = '<center><textarea type="text" class="form-control" name="ket'+$q+'" disabled></textarea></center>';
                    }
                    
                   $isi = $isi +
                   '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($q+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $namanya+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="id_detail_produk'+$q+'" value="'+respond['dpo'][$q]['id_detail_produk']+'">'+
                            respond['dpo'][$q]['kode_produk']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dpo'][$q]['jumlah_produk']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $stok_gudang+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $terambil+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $belum_diambil+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $html_inp+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $html_ket+
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
                                    'Stok Gudang'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Diambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Belum Diambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Akan Diambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Ket'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi+
                        '</tbody>'+
                '</table>';

                $("#table_tambah").html($table);
                $("#modaltambah").modal();
            }
        });  
    });
</script>

<!-- cek terisi -->
<script>
    function cek(){
        $jumlah_detail = $("#jumlah_detail").val();
        $count = 0;

        for($i=0;$i<$jumlah_detail;$i++){
            if($("#ambil"+$i).val() != 0){
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


    