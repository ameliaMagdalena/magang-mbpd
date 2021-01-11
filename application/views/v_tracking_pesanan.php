<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tracking Pesanan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tracking Pesanan</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Pesanan</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Kode Purchase Order Customer</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal Pesanan</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Customer</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($po as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $x->kode_purchase_order_customer; ?>
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_purchase_order_customer?>">
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $waktu = $x->tanggal_po;

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
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_customer; ?></td>
                            <td  class="col-lg-3">
                                <button type="button" class="produksi_klik col-lg-3 btn btn-primary fa fa-cogs" 
                                    value="<?= $no;?>" title="Produksi" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php if($_SESSION['nama_jabatan'] != "PPIC" && $_SESSION['nama_departemen'] != "Produksi"){?>
                                    <button type="button" class="sj_klik col-lg-3 btn btn-info fa fa-envelope" 
                                        value="<?= $no;?>" title="Surat Jalan" style="margin-right:5px;margin-bottom:5px"></button>
                                    <button type="button" class="invoice_klik col-lg-3 btn btn-success fa fa-file-text" 
                                        value="<?= $no;?>" title="Invoice" style="margin-right:5px;margin-bottom:5px"></button>
                                    <button type="button" class="bpdb_klik col-lg-3 btn btn-warning fa fa-truck" 
                                        value="<?= $no;?>" title="BPDB" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } ?>
                                <?php if($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management"){?>
                                        <button type="button" class="pc_klik col-lg-3 btn btn-danger fa  fa-money" 
                                            value="<?= $no;?>" title="Process Cost" style="margin-right:5px;margin-bottom:5px"></button>
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

    <!-- modal produksi -->
    <div class="modal" id="modalproduksi" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Produksi Pesanan</b></h4>
                </div>
                <div class="modal-body">
                    <h5><b>Detail Pesanan</b></h5>
                    <div id="table_pesanan_produksi"></div>
                    <div id="table_perencanaan_produksi"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal sj -->
    <div class="modal" id="modalsj" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Surat Jalan Pesanan</b></h4>
                </div>
                <div class="modal-body">
                    <h5><b>Detail Pesanan</b></h5>
                    <div id="table_pesanan_sj"></div>
                    <div id="table_sj"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal invoice -->
    <div class="modal" id="modalinvoice" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Invoice Pesanan</b></h4>
                </div>
                <div class="modal-body">
                    <h5><b>Detail Pesanan</b></h5>
                    <div id="table_pesanan_invoice"></div>
                    <div id="table_invoice"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal bpdb -->
    <div class="modal" id="modalbpdb" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>BPDB Pesanan</b></h4>
                </div>
                <div class="modal-body">
                    <h5><b>Detail Pesanan</b></h5>
                    <div id="table_pesanan_bpdb"></div>
                    <div id="table_bpdb"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal process cost -->
    <div class="modal" id="modalpc" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Process Cost Pesanan</b></h4>
                </div>
                <div class="modal-body">
                    <h5><b>Detail Pesanan</b></h5>
                    <div id="table_pesanan_pc"></div>
                    <div id="table_pc"></div>
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

<!-- produksi -->
<script>
    $('.produksi_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanProduksi/perencanaan_produksi",
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
                                    'Total Produk Pesanan'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_dpo+
                        '</tbody>'+
                '</table><hr>';
                $("#table_pesanan_produksi").html($table_dpo);

                //perencanannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
                $isi_perencanaan = "";

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

                    $detailnya = "";
                    for($u=0;$u<respond['jm_ct'];$u++){
                        $isi_table="";
                        $hit = 1;
                        $jm_perc = 0;
                        $jm_ak = 0;

                        if(respond['ct'][$u]['id_produk'] == respond['dpo'][$q]['id_produk']){
                            for($b=0;$b<respond['jm_x'];$b++){
                                if(respond['x'][$b]['id_detail_purchase_order'] == respond['dpo'][$q]['id_detail_purchase_order_customer'] &&
                                respond['x'][$b]['id_line'] == respond['ct'][$u]['id_line']){
                                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                                    var tanggal = new Date(respond['x'][$b]['tanggal']).getDate();
                                    var xhari = new Date(respond['x'][$b]['tanggal']).getDay();
                                    var xbulan = new Date(respond['x'][$b]['tanggal']).getMonth();
                                    var xtahun = new Date(respond['x'][$b]['tanggal']).getYear();
                                    
                                    var hari = hari[xhari];
                                    var bulan = bulan[xbulan];
                                    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                                    $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                                    $isi_table = $isi_table + 
                                    '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $hit+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $tanggalnya+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                respond['x'][$b]['jumlah_item_perencanaan']+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                respond['x'][$b]['jumlah_item_aktual']+
                                            '</td>'+
                                    '</tr>';

                                    $jm_perc = parseInt($jm_perc) +  parseInt(respond['x'][$b]['jumlah_item_perencanaan']);
                                    $jm_ak   = parseInt($jm_ak) +  parseInt(respond['x'][$b]['jumlah_item_aktual']);
                                    $hit++;
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
                                                'Tanggal Produksi'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Perencanaan'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Aktual'+
                                            '</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody>'+
                                        $isi_table+
                                    '</tbody>'+
                            '</table><br>';

                            $detailnya = $detailnya +'<center><b>'+respond['ct'][$u]['nama_line']+' ('+$jm_perc+' : '+$jm_ak+')</b></center>'+$table;
                        }
                    }
                    $isi_perencanaan = $isi_perencanaan +'<b>'+($q+1)+'. '+ $namanya+'</b>'+'<br>'+$detailnya;
                }

                $("#table_perencanaan_produksi").html($isi_perencanaan);

                $("#modalproduksi").modal();
            }
        });  
    });
</script>

<!-- surat jalan -->
<script>
    $('.sj_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanProduksi/surat_jalan",
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
                                    'Total Produk Pesanan'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_dpo+
                        '</tbody>'+
                '</table><hr>';
                $("#table_pesanan_sj").html($table_dpo);

                //perencanannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
                $isi_perencanaan = "";

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

                    $isi_table="";
                    $jm= 0;
                    $hit = 1;
                    for($b=0;$b<respond['jm_x'];$b++){
                        if(respond['x'][$b]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                            var tanggal = new Date(respond['x'][$b]['tanggal']).getDate();
                            var xhari = new Date(respond['x'][$b]['tanggal']).getDay();
                            var xbulan = new Date(respond['x'][$b]['tanggal']).getMonth();
                            var xtahun = new Date(respond['x'][$b]['tanggal']).getYear();
                            
                            var hari = hari[xhari];
                            var bulan = bulan[xbulan];
                            var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                            $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                            $isi_table = $isi_table + 
                            '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $hit+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $tanggalnya+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['x'][$b]['id_surat_jalan']+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['x'][$b]['jumlah_produk']+
                                    '</td>'+
                            '</tr>';

                            $jm   = parseInt($jm) +  parseInt(respond['x'][$b]['jumlah_produk']);
                            $hit++;
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
                                        'Tanggal Produksi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'No Surat Jalan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Aktual'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_table+
                            '</tbody>'+
                    '</table><br>';
                    
                    $isi_perencanaan = $isi_perencanaan +'<b>'+($q+1)+'. '+ $namanya+' - '+$jm+'</b>'+'<br>'+$table;
                }

                $("#table_sj").html($isi_perencanaan);

                $("#modalsj").modal();
            }
        });  
    });
</script>

<!-- invoice -->
<script>
    $('.invoice_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanProduksi/invoice",
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
                                    'Total Produk Pesanan'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_dpo+
                        '</tbody>'+
                '</table><hr>';
                $("#table_pesanan_invoice").html($table_dpo);

                //perencanannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
                $isi_perencanaan = "";

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

                    $isi_table="";
                    $jm= 0;
                    $hit = 1;
                    for($b=0;$b<respond['jm_x'];$b++){
                        if(respond['x'][$b]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                            var tanggal = new Date(respond['x'][$b]['tanggal']).getDate();
                            var xhari = new Date(respond['x'][$b]['tanggal']).getDay();
                            var xbulan = new Date(respond['x'][$b]['tanggal']).getMonth();
                            var xtahun = new Date(respond['x'][$b]['tanggal']).getYear();
                            
                            var hari = hari[xhari];
                            var bulan = bulan[xbulan];
                            var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                            $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                            $isi_table = $isi_table + 
                            '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $hit+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $tanggalnya+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['x'][$b]['id_invoice']+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['x'][$b]['jumlah_produk']+
                                    '</td>'+
                            '</tr>';

                            $jm   = parseInt($jm) +  parseInt(respond['x'][$b]['jumlah_produk']);
                            $hit++;
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
                                        'Tanggal Produksi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'No Invoice'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Aktual'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_table+
                            '</tbody>'+
                    '</table><br>';
                    
                    $isi_perencanaan = $isi_perencanaan +'<b>'+($q+1)+'. '+ $namanya+' - '+$jm+'</b>'+'<br>'+$table;
                }

                $("#table_invoice").html($isi_perencanaan);

                $("#modalinvoice").modal();
            }
        });  
    });
</script>

<!-- bpdb -->
<script>
    $('.bpdb_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanProduksi/bpdb",
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
                                    'Total Produk Pesanan'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_dpo+
                        '</tbody>'+
                '</table><hr>';
                $("#table_pesanan_bpdb").html($table_dpo);

                //perencanannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
                $isi_perencanaan = "";

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

                    $isi_table="";
                    $jm= 0;
                    $hit = 1;
                    for($b=0;$b<respond['jm_x'];$b++){
                        if(respond['x'][$b]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                            var tanggal = new Date(respond['x'][$b]['tanggal']).getDate();
                            var xhari = new Date(respond['x'][$b]['tanggal']).getDay();
                            var xbulan = new Date(respond['x'][$b]['tanggal']).getMonth();
                            var xtahun = new Date(respond['x'][$b]['tanggal']).getYear();
                            
                            var hari = hari[xhari];
                            var bulan = bulan[xbulan];
                            var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                            $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                            $isi_table = $isi_table + 
                            '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $hit+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $tanggalnya+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['x'][$b]['id_bpbd']+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        respond['x'][$b]['jumlah_produk']+
                                    '</td>'+
                            '</tr>';

                            $jm   = parseInt($jm) +  parseInt(respond['x'][$b]['jumlah_produk']);
                            $hit++;
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
                                        'Tanggal Produksi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'No BPDB'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Aktual'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_table+
                            '</tbody>'+
                    '</table><br>';
                    
                    $isi_perencanaan = $isi_perencanaan +'<b>'+($q+1)+'. '+ $namanya+' - '+$jm+'</b>'+'<br>'+$table;
                }

                $("#table_bpdb").html($isi_perencanaan);

                $("#modalbpdb").modal();
            }
        });  
    });
</script>

<!-- process cost -->
<script>
    $('.pc_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanProduksi/pc",
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

                //process cost
                $isi_pc = "";
                $total_pc = [];
                for($q=0;$q<respond['jmdpo'];$q++){
                    $total_pc[$q] = 0;
                } 

                for($q=0;$q<respond['jmdpo'];$q++){
                    $namanya = "";
                    $pc_po = 0;
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

                    $isi_table="";
                    $totalnya = 0;
                    $hit = 1;
                    for($i=0;$i<respond['jm_x'];$i++){
                        if(respond['x'][$i]['id_produk'] == respond['dpo'][$q]['id_produk']){
                            $totals = (respond['x'][$i]['cycle_time'] * (respond['x'][$i]['satuan_biaya'] * respond['x'][$i]['jumlah_pekerja_per_team']));
                            $totalnya = $totalnya + $totals;
                            
                            $satuan_biaya = "Rp "+  new Number(respond['x'][$i]['satuan_biaya']).toLocaleString("id-ID") + ",00";
                            $man_power    = "Rp "+  new Number((respond['x'][$i]['satuan_biaya'] * respond['x'][$i]['jumlah_pekerja_per_team'])).toLocaleString("id-ID") + ",00";
                            $total        = "Rp "+  new Number((respond['x'][$i]['cycle_time'] * (respond['x'][$i]['satuan_biaya'] * respond['x'][$i]['jumlah_pekerja_per_team']))).toLocaleString("id-ID") + ",00";

                            $isi_table = $isi_table + 
                            '<tr>'+
                                '<td  style="text-align: center;vertical-align: middle;">'+
                                    $hit+
                                '</td>'+
                                '<td  style="text-align: center;vertical-align: middle;">'+
                                    respond['x'][$i]['nama_line']+
                                '</td>'+
                                '<td  style="text-align: center;vertical-align: middle;">'+
                                    respond['x'][$i]['cycle_time']+
                                '</td>'+
                                '<td  style="text-align: center;vertical-align: middle;">'+
                                    respond['x'][$i]['jumlah_pekerja_per_team']+
                                '</td>'+
                                '<td  style="text-align: center;vertical-align: middle;">'+
                                    $satuan_biaya+
                                '</td>'+
                                '<td  style="text-align: center;vertical-align: middle;">'+
                                    $man_power+
                                '</td>'+
                                '<td  style="text-align: center;vertical-align: middle;">'+
                                    $total+
                                '</td>'+
                            '</tr>';

                            $hit++;
                        }
                    }

                    $total_pc[$q] = $total_pc[$q] + $totalnya;
                    $totalnya =  "Rp "+  new Number($totalnya).toLocaleString("id-ID") + ",00";
                    

                    $total = 
                    '<tr>'+
                        '<td  colspan="6" style="text-align: center;vertical-align: middle;"><b>Total</b></td>'+
                        '<td  style="text-align: center;vertical-align: middle;"><b>'+$totalnya+'</b></td>'+
                    '</tr>';

                    $table =
                    '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<th style="text-align: center;vertical-align: middle;">No</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Process</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Cycle Time</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Jumlah Pekerja Per Team</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Satuan Biaya</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Man Power Cost (dtk)</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Total</th>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_table+
                                $total+
                            '</tbody>'+
                    '</table><br>';
                    
                    $isi_pc = $isi_pc +'<b>'+($q+1)+'. '+ $namanya+'</b>'+'<br>'+$table;
                }
                $("#table_pc").html($isi_pc);

                //detail pesanan
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

                    $totalpc      =  "Rp "+  new Number($total_pc[$q]).toLocaleString("id-ID") + ",00";
                    $totalsemua   = (parseInt($total_pc[$q]) * parseInt(respond['dpo'][$q]['jumlah_produk']));
                    $totalsemuapc = "Rp "+  new Number($totalsemua).toLocaleString("id-ID") + ",00";

                    $pc_po = parseInt($pc_po) + parseInt($totalsemua);

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
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $totalpc+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $totalsemuapc+
                        '</td>'+
                   '</tr>';
                }

                $totalnyapc = "Rp "+  new Number($pc_po).toLocaleString("id-ID") + ",00";

                $totalpcnya = 
                '<tr>'+
                    '<td  colspan="5" style="text-align: center;vertical-align: middle;"><b>Total</b></td>'+
                    '<td  style="text-align: center;vertical-align: middle;"><b>'+$totalnyapc+'</b></td>'+
                '</tr>';

                $table_dpo=
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
                                    'Total Produk Pesanan'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Process Cost Satu Produk'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Process Cost Total'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_dpo+
                            $totalpcnya+
                        '</tbody>'+
                '</table><hr>';
                $("#table_pesanan_pc").html($table_dpo);

                $("#modalpc").modal();
            }
        });  
    });
</script>