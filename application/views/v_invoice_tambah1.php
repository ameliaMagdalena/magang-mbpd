<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Invoice</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tambah Invoice</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Purchase Order Customer</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal PO</th>
                        <th style="text-align: center;vertical-align: middle;">Nomor PO</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Customer</th>
                        <th style="text-align: center;vertical-align: middle;">Surat Jalan</th>
                        <th style="text-align: center;vertical-align: middle;">Aksiss</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($purchase_order as $po){  
                            $count = 0;
                            foreach($surat_jalan as $sj){
                                if($sj->id_purchase_order_customer == $po->id_purchase_order_customer){
                                   $count++;
                                }
                            } 
                                 
                            if($count > 0){
                        ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $no ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $waktu = $po->tanggal_po;

                                    $hari_array = array(
                                        'Minggu',
                                        'Senin',
                                        'Selasa',
                                        'Rabu',
                                        'Kamis',
                                        'Jumat',
                                        'Sabtu'
                                    );
                                    $hr = date('w', strtotime($waktu));
                                    $hari = $hari_array[$hr];
                                    $tanggal = date('j', strtotime($waktu));
                                    $bulan_array = array(
                                        1 => 'Januari',
                                        2 => 'Februari',
                                        3 => 'Maret',
                                        4 => 'April',
                                        5 => 'Mei',
                                        6 => 'Juni',
                                        7 => 'Juli',
                                        8 => 'Agustus',
                                        9 => 'September',
                                        10 => 'Oktober',
                                        11 => 'November',
                                        12 => 'Desember',
                                    );
                                    $bl = date('n', strtotime($waktu));
                                    $bulan = $bulan_array[$bl];
                                    $tahun = date('Y', strtotime($waktu));
                                    
                                    echo "$hari, $tanggal $bulan $tahun";
                                ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" id="id<?= $no ?>" value="<?= $po->id_purchase_order_customer?>">
                                <?= $po->kode_purchase_order_customer?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $po->nama_customer?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $idnya = "";
                                    $jm = 0;
                                    foreach($surat_jalan as $sj){
                                        if($sj->id_purchase_order_customer == $po->id_purchase_order_customer){
                                            if($jm == 0){
                                                $idnya = $sj->id_surat_jalan;
                                                $jm++;
                                            }
                                            else{
                                                $idnya = $idnya . ", " . $sj->id_surat_jalan;
                                                $jm++;
                                            }
                                        }
                                    } 
                                ?>
                                    <?= $idnya?>
                            </td>
                            <td class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                <form method="POST" action="<?= base_url()?>invoice/tambah_invoice">
                                    <input type="hidden" name="id_PO" value="<?= $po->id_purchase_order_customer?>">
                                    <input type="hidden" name="kode_PO" value="<?= $po->kode_purchase_order_customer?>">
                                    <button type="submit" class="col-lg-3 btn btn-success fa fa-plus-square-o" title="Buat Laporan Hasil Produksi" style="margin-right:5px;margin-bottom:5px"></button>
                                </form> 
                            </td>
                        </tr>
                    <?php $no++; }} ?>
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
                            <input type="text" id="tanggal_po" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input type="text" id="nomor_po" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Customer</label>
                        <div class="col-sm-7">
                            <input type="text" id="nama_customer" class="form-control" readonly>
                        </div>
                    </div>

                    <div id="div_dpo">
                    
                    </div>
                    
                    <div id="div_sj">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>suratJalan/semua_surat_jalan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Buat Invoice</h2>
                </header>

                <div class="panel-body">
                    <h4><b>Surat Jalan</b></h4>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
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
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">M2002.0199</td>
                                <td style="text-align: center;vertical-align: middle;">Senin, 05-05-2020</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <a class="col-lg-3 btn btn-primary btn1 fa fa-info-circle" style="color:white"
                                        title="Detail" href="#modaldetail"></a>
                                    <button type="button" class="btn btn-success fa fa-plus-square-o btn1 add_sj" style="color:white"
                                        title="Add"></button>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">M2002.0198</td>
                                <td style="text-align: center;vertical-align: middle;">Senin, 04-05-2020</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <button type="button" class="btn btn-success fa fa-plus-square-o btn1 add_sj" style="color:white"
                                        title="Add"></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Invoice</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="M2002.0198" readonly>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="M2002.0198" readonly>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="M2002.0198" readonly>
                        </div>
                    </div>

                    
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Ditujukan Kepada</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="M2002.0198" readonly>
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
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">M2002.0199</td>
                                <td style="text-align: center;vertical-align: middle;">Senin, 05-05-2020</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <button type="button" class="btn btn-success fa fa-plus-square-o btn1 add_sj" style="color:white"
                                        title="Add"></button>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">M2002.0199</td>
                            </tr>
                        </tbody>
                    </table>


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
            url:"<?php echo base_url() ?>invoice/detail_po",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['po'][0]['tanggal_po']).getDate();
                var xhari = new Date(respond['po'][0]['tanggal_po']).getDay();
                var xbulan = new Date(respond['po'][0]['tanggal_po']).getMonth();
                var xtahun = new Date(respond['po'][0]['tanggal_po']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_po").val($tanggalnya);
                $("#nomor_po").val(respond['po'][0]['kode_purchase_order_customer']);
                $("#nama_customer").val(respond['po'][0]['nama_customer']);

                $isi_dpo = "";
                
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

                   $isi_dpo = $isi_dpo +
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
                   '</tr>';
                }

                $table_dpo=
                '<br><table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
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
                                    'Total Produk Pesanan'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_dpo+
                        '</tbody>'+
                '</table>';

                $("#div_dpo").html($table_dpo);

                if(respond['jm_sj'] != 0){
                    $isi = "";
                    for($i=0;$i<respond['jm_sj'];$i++){
                        $isi_table = "";
                    
                        for($j=0;$j<respond['jm_dsj'];$j++){
                            if(respond['dsj'][$j]['id_surat_jalan'] == respond['sj'][$i]['id_surat_jalan']){
                                //nama produk
                                if(respond['dsj'][$j]['keterangan'] == 0){
                                    $id_ukuran = respond['dsj'][$j]['id_ukuran'];
                                    $id_warna  = respond['dsj'][$j]['id_warna'];

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

                                    $namanya = respond['dsj'][$j]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                                }
                                else if(respond['dsj'][$j]['keterangan'] == 1){
                                    $id_ukuran = respond['dsj'][$j]['id_ukuran'];

                                    for($l=0;$l<respond['jmukuran'];$l++){
                                        if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                            $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                            $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                            $ukurannya = $nama_ukuran + $satuan_ukuran;
                                        }
                                    }

                                    $namanya = respond['dsj'][$j]['nama_produk'] + $ukurannya;

                                }
                                else if(respond['dsj'][$j]['keterangan'] == 2){
                                    $id_warna  = respond['dsj'][$j]['id_warna'];

                                    for($k=0;$k<respond['jmwarna'];$k++){
                                        if(respond['warna'][$k]['id_warna'] == $id_warna){
                                            $warnanya = respond['warna'][$k]['nama_warna'];
                                        }
                                    }

                                    $namanya = respond['dsj'][$j]['nama_produk'] + " (" + $warnanya + ")";
                                }
                                else{
                                    $namanya = respond['dsj'][$j]['nama_produk'];
                                }


                                $isi_table = $isi_table + 
                                '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        ($j+1)+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $namanya+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['dsj'][$j]['kode_produk']+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['dsj'][$j]['jumlah_produk']+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">Pcs</td>'+
                                '</tr>';
                            }
                        }
                    
                        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                        var tanggal = new Date(respond['sj'][$i]['tanggal']).getDate();
                        var xhari = new Date(respond['sj'][$i]['tanggal']).getDay();
                        var xbulan = new Date(respond['sj'][$i]['tanggal']).getMonth();
                        var xtahun = new Date(respond['sj'][$i]['tanggal']).getYear();
                        
                        var hari = hari[xhari];
                        var bulan = bulan[xbulan];
                        var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                        $tanggal_sj = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;


                        $isi = $isi + 
                        '<hr><h5><b>Surat Jalan '+($i+1)+'</b></h5>'+
                        '<div class="form-group mt-lg">'+
                            '<label class="col-sm-5 control-label">Nomor Surat Jalan</label>'+
                            '<div class="col-sm-7">'+
                                '<input type="text" class="form-control" value="'+respond['sj'][$i]['id_surat_jalan']+'" readonly>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group mt-lg">'+
                            '<label class="col-sm-5 control-label">Tanggal</label>'+
                            '<div class="col-sm-7">'+
                                '<input type="text" class="form-control" value="'+$tanggal_sj+'" readonly>'+
                            '</div>'+
                        '</div>'+
                        '<div class="form-group mt-lg">'+
                            '<label class="col-sm-5 control-label">Keterangan</label>'+
                            '<div class="col-sm-7">'+
                                '<textarea class="form-control" rows="3" id="textareaDefault" readonly>'+
                                respond['sj'][$i]['keterangan']+
                                '</textarea>'+
                            '</div>'+
                        '</div>'+ 
                        '<br>'+
                        
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
                                $isi_table+
                            '</tbody>'+
                        '</table>';
                        
                    }

                    $big = 
                        '<hr><hr><h4><b>Surat Jalan</b></h4>'+
                        $isi;
                    
                    $("#div_sj").html($big);
                }
                
                $("#modaldetail").modal();
            }
        });  
    
    });
</script>



    