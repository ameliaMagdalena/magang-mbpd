<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Laporan Perencanaan Cutting Sudah Ada</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Laporan Perencanaan Cutting Sudah Ada</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Laporan Perencanaan Cutting Sudah Ada</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($tanggal as $x){ 
                            if($x->status_laporan == 1){
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $no; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" id="tanggal<?= $no?>" value="<?= $x->tanggal ?>">
                                <?php 
                                    $waktu = $x->tanggal;

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
                            <td  class="col-lg-3">
                                <?php if($x->status_laporan == 0){?>
                                    <button type="button" class="bdet1_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                                        <button type="button" class="badd_klik col-lg-3 btn btn-success fa fa-plus-square-o" 
                                        value="<?= $no;?>" title="Buat Laporan Perencanaan Cutting" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php } ?>
                                <?php } ?>
                                <?php if($x->status_laporan == 1){?>
                                    <button type="button" class="bdet2_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                                        <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        value="<?= $no;?>" title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php } ?>
                                    <?php if($x->status_laporan == 1 && $_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" || 
                                        $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                        $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                        <button type="button" class="bse7_klik col-lg-3 btn btn-success fa fa-check-square" 
                                            value="<?= $no;?>" title="Konfirmasi" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php } ?>
                                <?php } ?>
                                <?php if($x->status_laporan == 2){?>
                                    <button type="button" class="bdet2_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $no++; }} ?>
                    
                </tbody>
            </table>
        </div>
    </div>

</section>

    <!-- modal detail1 -->
    <div class="modal" id="modaldetail1" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Perencanaan Cutting</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Cutting</label>
                    <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="tanggal_det1" readonly>
                        </div>
                    </div>

                    <br>
                    <div id="table_detail1">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal detail2 -->
    <div class="modal" id="modaldetail2" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Perencanaan Cutting</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Cutting</label>
                    <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="tanggal_det2" readonly>
                        </div>
                    </div>

                    <br>
                    <div id="table_detail2">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal add -->
    <div class="modal" id="modaladd" role="dialog">
        <div class="modal-dialog modal-xl" style="width:75%">
            <form method="POST" action="<?= base_url()?>laporanPerencanaanCutting/coba_tambah_laporan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Buat Laporan Perencanaan Cutting</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Cutting</label>
                        <div class="col-sm-7">
                                <input type="text" class="form-control"
                                id="tanggal_add" readonly>
                            </div>
                        </div>

                        <br>
                        <div id="table_add">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal" id="modaledit" role="dialog">
        <div class="modal-dialog modal-xl" style="width:75%">
            <form method="POST" action="<?= base_url()?>laporanPerencanaanCutting/edit_laporan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Laporan Perencanaan Cutting</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Cutting</label>
                        <div class="col-sm-7">
                                <input type="text" class="form-control"
                                id="tanggal_edit" readonly>
                            </div>
                        </div>

                        <br>
                        <div id="table_edit">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal se7 -->
    <div class="modal" id="modalse7" role="dialog">
        <div class="modal-dialog modal-xl" style="width:90%">
            <form method="POST" action="<?= base_url()?>laporanPerencanaanCutting/konfirmasi_ppic">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Konfirmasi Laporan Perencanaan Cutting</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="tanggalnya" id="tanggalnya">
                        <p>Apakah anda yakin akan mengkonfirmasi laporan perencanaan cutting dengan tanggal perencanaan <span id="tanggal_perencanaannya"></span>?</p>
                        <br>
                        
                        <h4><b>Konsumsi Material</b></h4>
                        <div id="konsumsi_material"></div>
                        <input type="hidden" name="jumlah_detail_setuju" id="jumlah_detail_setuju"> 
                        <div id="alert" type="hidden">
                            <p><span style="color:red">* </span><b>Mohon maaf, proses konfirmasi tidak dapat dilanjutkan karena data laporan hasil
                            produksi dengan data pengambilan material tidak sesuai.</b></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="setuju" class="btn btn-primary" value="Simpan" disabled>
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

<!-- detail1 -->
<script>
    $('.bdet1_klik').click(function(){
        var no      = $(this).attr('value');
        var tanggal = $("#tanggal"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanPerencanaanCutting/detail_perencanaan_cutting",
            dataType: "JSON",
            data: {tanggal:tanggal},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['percut'][0]['tanggal_percut']).getDate();
                var xhari = new Date(respond['percut'][0]['tanggal_percut']).getDay();
                var xbulan = new Date(respond['percut'][0]['tanggal_percut']).getMonth();
                var xtahun = new Date(respond['percut'][0]['tanggal_percut']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_det1").val($tanggalnya);

                $isi = "";

                for($i=0;$i<respond['jm_percut'];$i++){
                    $status = "";
                    if(respond['percut'][$i]['status_percut'] == 0){
                        $status = "Belum Ada Laporan";
                    } else{
                        $status = "Sudah Ada Laporan";
                    }

                    //nama produk
                        if(respond['percut'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['percut'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['percut'][$i]['keterangan'] == 2){
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }
                            $namanya = respond['percut'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['percut'][$i]['nama_produk'];
                        }
                    //tutup nama produk
                    
                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                    var tanggal = new Date(respond['percut'][$i]['tanggal_produksi']).getDate();
                    var xhari = new Date(respond['percut'][$i]['tanggal_produksi']).getDay();
                    var xbulan = new Date(respond['percut'][$i]['tanggal_produksi']).getMonth();
                    var xtahun = new Date(respond['percut'][$i]['tanggal_produksi']).getYear();
                    
                    var hari = hari[xhari];
                    var bulan = bulan[xbulan];
                    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                    $tanggal_prod = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                    $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $namanya+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $tanggal_prod+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['jumlah_percut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $status+
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
                                'Tanggal Produksi'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Perencanaan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Status Perencanaan'+
                            '</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        $isi+
                    '</tbody>'+
                '</table>';

                $("#table_detail1").html($table);

                $("#modaldetail1").modal();
            }
        });
    });
</script>

<!-- detail2 -->
<script>
    $('.bdet2_klik').click(function(){
        var no      = $(this).attr('value');
        var tanggal = $("#tanggal"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanPerencanaanCutting/detail_perencanaan_cutting",
            dataType: "JSON",
            data: {tanggal:tanggal},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['percut'][0]['tanggal_percut']).getDate();
                var xhari = new Date(respond['percut'][0]['tanggal_percut']).getDay();
                var xbulan = new Date(respond['percut'][0]['tanggal_percut']).getMonth();
                var xtahun = new Date(respond['percut'][0]['tanggal_percut']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_det2").val($tanggalnya);

                $isi = "";

                for($i=0;$i<respond['jm_percut'];$i++){
                    $status = "";
                    if(respond['percut'][$i]['status_percut'] == 0){
                        $status = "Belum Ada Laporan";
                    } else{
                        $status = "Sudah Ada Laporan";
                    }

                    //nama produk
                        if(respond['percut'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['percut'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['percut'][$i]['keterangan'] == 2){
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }
                            $namanya = respond['percut'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['percut'][$i]['nama_produk'];
                        }
                    //tutup nama produk

                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                    var tanggal = new Date(respond['percut'][$i]['tanggal_produksi']).getDate();
                    var xhari = new Date(respond['percut'][$i]['tanggal_produksi']).getDay();
                    var xbulan = new Date(respond['percut'][$i]['tanggal_produksi']).getMonth();
                    var xtahun = new Date(respond['percut'][$i]['tanggal_produksi']).getYear();
                    
                    var hari = hari[xhari];
                    var bulan = bulan[xbulan];
                    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                    $tanggal_prod = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                    $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $namanya+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $tanggal_prod+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['jumlah_percut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['jumlah_aktual_cut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['keterangan_percut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $status+
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
                                'Tanggal Produksi'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Perencanaan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Aktual'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Keterangan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Status Perencanaan'+
                            '</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        $isi+
                    '</tbody>'+
                '</table>';

                $("#table_detail2").html($table);

                $("#modaldetail2").modal();
            }
        });
    });
</script>

<!-- add -->
<script>
    $('.badd_klik').click(function(){
        var no      = $(this).attr('value');
        var tanggal = $("#tanggal"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanPerencanaanCutting/detail_perencanaan_cutting",
            dataType: "JSON",
            data: {tanggal:tanggal},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['percut'][0]['tanggal_percut']).getDate();
                var xhari = new Date(respond['percut'][0]['tanggal_percut']).getDay();
                var xbulan = new Date(respond['percut'][0]['tanggal_percut']).getMonth();
                var xtahun = new Date(respond['percut'][0]['tanggal_percut']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_add").val($tanggalnya);

                $isi = "";

                for($i=0;$i<respond['jm_percut'];$i++){
                    $status = "";
                    if(respond['percut'][$i]['status_percut'] == 0){
                        $status = "Belum Ada Laporan";
                    } else{
                        $status = "Sudah Ada Laporan";
                    }

                    //nama produk
                        if(respond['percut'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['percut'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['percut'][$i]['keterangan'] == 2){
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }
                            $namanya = respond['percut'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['percut'][$i]['nama_produk'];
                        }
                    //tutup nama produk

                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                    var tanggal = new Date(respond['percut'][$i]['tanggal_produksi']).getDate();
                    var xhari = new Date(respond['percut'][$i]['tanggal_produksi']).getDay();
                    var xbulan = new Date(respond['percut'][$i]['tanggal_produksi']).getMonth();
                    var xtahun = new Date(respond['percut'][$i]['tanggal_produksi']).getYear();
                    
                    var hari = hari[xhari];
                    var bulan = bulan[xbulan];
                    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                    $tanggal_prod = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                    $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $namanya+
                            '<input type="hidden" name="id_percut'+$i+'" value="'+respond['percut'][$i]['id_perencanaan_cutting']+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $tanggal_prod+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['jumlah_percut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center><input type="number" min="0" max="'+respond['percut'][$i]['jumlah_percut']+'" name="jm_aktual'+$i+'" class="form-control" style="width:80px;height:25px" required></center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<textarea type="text" class="form-control" name="ket'+$i+'"></textarea>'+
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
                                'Tanggal Produksi'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Perencanaan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Aktual'+
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
                '<input type="hidden" name="jumlah_detail" value="'+respond['jm_percut']+'">'; 

                $("#table_add").html($table);
                $("#modaladd").modal();
            }
        });
    });
</script>

<!-- edit -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var tanggal = $("#tanggal"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanPerencanaanCutting/detail_perencanaan_cutting",
            dataType: "JSON",
            data: {tanggal:tanggal},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['percut'][0]['tanggal_percut']).getDate();
                var xhari = new Date(respond['percut'][0]['tanggal_percut']).getDay();
                var xbulan = new Date(respond['percut'][0]['tanggal_percut']).getMonth();
                var xtahun = new Date(respond['percut'][0]['tanggal_percut']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_edit").val($tanggalnya);

                $isi = "";

                for($i=0;$i<respond['jm_percut'];$i++){
                    $status = "";
                    if(respond['percut'][$i]['status_percut'] == 0){
                        $status = "Belum Ada Laporan";
                    } else{
                        $status = "Sudah Ada Laporan";
                    }

                    //nama produk
                        if(respond['percut'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['percut'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['percut'][$i]['keterangan'] == 2){
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }
                            $namanya = respond['percut'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['percut'][$i]['nama_produk'];
                        }
                    //tutup nama produk

                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                    var tanggal = new Date(respond['percut'][$i]['tanggal_produksi']).getDate();
                    var xhari = new Date(respond['percut'][$i]['tanggal_produksi']).getDay();
                    var xbulan = new Date(respond['percut'][$i]['tanggal_produksi']).getMonth();
                    var xtahun = new Date(respond['percut'][$i]['tanggal_produksi']).getYear();
                    
                    var hari = hari[xhari];
                    var bulan = bulan[xbulan];
                    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                    $tanggal_prod = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                    $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $namanya+
                            '<input type="hidden" name="id_percut'+$i+'" value="'+respond['percut'][$i]['id_perencanaan_cutting']+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $tanggal_prod+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['jumlah_percut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center><input type="number" min="0" max="'+respond['percut'][$i]['jumlah_percut']+'" name="jm_aktual'+$i+'" value="'+respond['percut'][$i]['jumlah_aktual_cut']+'" class="form-control" style="width:80px;height:25px" required></center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<textarea type="text" class="form-control" name="ket'+$i+'">'+respond['percut'][$i]['keterangan_percut']+'</textarea>'+
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
                                'Tanggal Produksi'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Perencanaan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Aktual'+
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
                '<input type="hidden" name="jumlah_detail_edit" value="'+respond['jm_percut']+'">'; 

                $("#table_edit").html($table);
                $("#modaledit").modal();
            }
        });
    });
</script>

<!-- setuju-->
<script>
    $('.bse7_klik').click(function(){
        var no      = $(this).attr('value');
        var tanggal = $("#tanggal"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanPerencanaanCutting/detail_perencanaan_cutting",
            dataType: "JSON",
            data: {tanggal:tanggal},

            success: function(respond){
                $("#tanggalnya").val(tanggal);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggaly = new Date(tanggal).getDate();
                var xhari = new Date(tanggal).getDay();
                var xbulan = new Date(tanggal).getMonth();
                var xtahun = new Date(tanggal).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggaly + ' ' + bulan + ' ' + tahun;

                $("#tanggal_perencanaannya").html($tanggalnya);

                //cek apakah ada permintaan_material yang minus dari yang seharusnya
                $cek = 0;
                //hitung untuk berapa jumlah detail
                $hitung = 0;
                $konsumsi_material = "";
                for($i=0;$i<respond['jm_percut'];$i++){
            
                    //konsumsi material
                    $isi_km = "";
                    $nomor = 1;
                    for($k=0;$k<respond['jm_km'];$k++){
                        if(respond['km'][$k]['id_produk'] == respond['percut'][$i]['id_produk'] && respond['km'][$k]['id_line'] == respond['percut'][$i]['id_line'] 
                        && respond['km'][$k]['status_konsumsi'] == 0){
                            $jumlah_konsumsi_seharusnya = respond['km'][$k]['jumlah_konsumsi'] * respond['percut'][$i]['jumlah_aktual_cut'];
                            $ukuran_satuan_keluar       = respond['km'][$k]['ukuran_satuan_keluar'];
                            $satuan_keluar              = respond['km'][$k]['satuan_keluar'];
                            $satuan_ukuran              = respond['km'][$k]['satuan_ukuran'];

                            //material dari gudang
                            $cari_pm         = 0;
                            $material_gudang = 0;
                            $id_line         = "";

                            for($p=0;$p<respond['jm_pm'];$p++){
                                if(respond['pm'][$p]['id_detail_purchase_order_customer'] == respond['percut'][$i]['id_detail_purchase_order_customer'] 
                                    && respond['pm'][$p]['id_line'] == respond['percut'][$i]['id_line'] 
                                    && respond['pm'][$p]['id_konsumsi_material'] == respond['km'][$k]['id_konsumsi_material']){
                                        $cari_pm++;
                                        $material_gudang = respond['pm'][$p]['total_keluar'];
                                        $id_line = respond['pm'][$p]['id_line'];
                                }
                            }

                            $total_ambilnya = 0;
                            $isi_detpeng    = "";
                            //detail pengambilan materialnya
                            if($material_gudang > 0){
                                $isi2 = "";
                                $hit_isi2 = 1;

                                for($p=0;$p<respond['jm_pms'];$p++){
                                    if(respond['pms'][$p]['id_detail_purchase_order_customer'] == respond['percut'][$i]['id_detail_purchase_order_customer'] 
                                        && respond['pms'][$p]['id_line'] == respond['percut'][$i]['id_line'] 
                                        && respond['pms'][$p]['id_konsumsi_material'] == respond['km'][$k]['id_konsumsi_material']){

                                            $ambe = Math.ceil(parseFloat(respond['pms'][$p]['jumlah_ambil'])/parseFloat($ukuran_satuan_keluar));
                                            $isi2 = $isi2 +
                                                    '<tr>'+
                                                        '<td style="text-align: center;vertical-align: middle;">'+$hit_isi2+'</td>'+
                                                        '<td style="text-align: center;vertical-align: middle;">'+respond['pms'][$p]['jumlah_ambil']+'</td>'+
                                                        '<td style="text-align: center;vertical-align: middle;">'+$ambe+' '+$satuan_ukuran+'</td>'+
                                                    '</tr>';
                                                    
                                            $total_ambilnya = $total_ambilnya + $ambe;
                                            $hit_isi2++;
                                    }
                                }

                                $isi_detpeng ='<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:9px;margin-top:5px">'+
                                                '<tr>'+
                                                    '<td style="text-align: center;vertical-align: middle;"><b>No</b></td>'+
                                                    '<td style="text-align: center;vertical-align: middle;"><b>Minta</b></td>'+
                                                    '<td style="text-align: center;vertical-align: middle;"><b>Ambil</b></td>'+
                                                '</tr>'+
                                                $isi2+
                                              '</table>'+
                                              '1 '+$satuan_ukuran+' = '+ $ukuran_satuan_keluar+' '+$satuan_keluar;
                            }

                            //material dari gudang (material berlebihan)
                            $material_tambahan = 0;
                            for($p=0;$p<respond['jm_pmt'];$p++){
                                if(respond['pmt'][$p]['id_detail_purchase_order_customer'] == respond['percut'][$i]['id_detail_purchase_order_customer'] 
                                    && respond['pmt'][$p]['id_line'] == respond['percut'][$i]['id_line'] 
                                    && respond['pmt'][$p]['id_konsumsi_material'] == respond['km'][$k]['id_konsumsi_material']){
                                        $cari_pm++;
                                        $material_tambahan = respond['pmt'][$p]['total_keluar'];
                                }
                            }

                            $isi_detpengt = "";
                            $tampilkan_perhitungan = "";
                            //detail pengambilan material tambahan
                            if($material_tambahan > 0){
                                $isit2 = "";
                                $hit_isit2 = 1;
                                $total_ambilnyat = 0;

                                for($p=0;$p<respond['jm_pmts'];$p++){
                                    if(respond['pmts'][$p]['id_detail_purchase_order_customer'] == respond['percut'][$i]['id_detail_purchase_order_customer'] 
                                        && respond['pmts'][$p]['id_line'] == respond['percut'][$i]['id_line'] 
                                        && respond['pmts'][$p]['id_konsumsi_material'] == respond['km'][$k]['id_konsumsi_material']){

                                            $ambet = Math.ceil(parseFloat(respond['pmts'][$p]['jumlah_ambil'])/parseFloat($ukuran_satuan_keluar));
                                            $isit2 = $isit2 +
                                                    '<tr>'+
                                                        '<td style="text-align: center;vertical-align: middle;">'+$hit_isit2+'</td>'+
                                                        '<td style="text-align: center;vertical-align: middle;">'+respond['pmts'][$p]['jumlah_ambil']+'</td>'+
                                                        '<td style="text-align: center;vertical-align: middle;">'+$ambet+' '+$satuan_ukuran+'</td>'+
                                                    '</tr>';
                                                    
                                            $total_ambilnyat = $total_ambilnyat + $ambet;
                                            $hit_isit2++;
                                    }
                                }

                                $isi_detpengt ='<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:9px;margin-top:5px">'+
                                                '<tr>'+
                                                    '<td style="text-align: center;vertical-align: middle;"><b>No</b></td>'+
                                                    '<td style="text-align: center;vertical-align: middle;"><b>Minta</b></td>'+
                                                    '<td style="text-align: center;vertical-align: middle;"><b>Ambil</b></td>'+
                                                '</tr>'+
                                                $isit2+
                                              '</table>'+
                                              '1 '+$satuan_ukuran+' = '+ $ukuran_satuan_keluar+' '+$satuan_keluar;
                                
                                $total_ambil_tambah    = $total_ambilnyat * $ukuran_satuan_keluar;
                                $tampilkan_perhitungan = '<center>'+$material_tambahan+' || diberikan gudang '+$total_ambilnyat+' '+$satuan_ukuran+' ('+ $total_ambil_tambah+')'+'</center>';
                            } else{
                                $total_ambil_tambah    = 0;
                                $tampilkan_perhitungan = '<center>0</center>';
                            }

                            //material wip (inventory line)
                            $from_inli = 0;

                            for($r=0;$r<respond['jm_det_inline'];$r++){
                                if(respond['det_inline'][$r]['id_detail_purchase_order_customer'] == respond['percut'][$i]['id_detail_purchase_order_customer'] 
                                    && respond['det_inline'][$r]['id_line'] == respond['percut'][$i]['id_line'] 
                                    && respond['det_inline'][$r]['id_konsumsi_material'] == respond['km'][$k]['id_konsumsi_material'] 
                                    && respond['det_inline'][$r]['tanggal_produksi'] == respond['percut'][$i]['tanggal_produksi'] ){
                                        $from_inli = respond['det_inline'][$r]['jumlah_material'];
                                    }
                            }
                            
                            //konsumsi gudang material
                            $jumlah_minta = $material_gudang;
                            $ambilnya = Math.ceil(parseFloat($material_gudang)/parseFloat($ukuran_satuan_keluar));

                            //wipnya
                            $wip     = parseFloat($from_inli) + ($total_ambilnya * $ukuran_satuan_keluar) - parseFloat($jumlah_konsumsi_seharusnya);
                            $wip_sem = parseFloat($wip) + parseFloat($total_ambil_tambah);

                            if($wip_sem < 0){
                                $cek++;
                            }

                            //perhitungan 
                            $pemakaian_tambahan = 0;
                            $perhitungan = '('+$from_inli+' + '+($total_ambilnya * $ukuran_satuan_keluar)+' + '+$total_ambil_tambah+')'+' - ('+$jumlah_konsumsi_seharusnya+' + '+$pemakaian_tambahan+')';

                            $isi_km = $isi_km+
                            '<tr>'+
                                '<td>'+
                                    '<center>'+$nomor+'</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+
                                        respond['km'][$k]['nama_sub_jenis_material']+
                                        '<input type="hidden" name="id_line'+$hitung+'" value="'+$id_line+'">'+
                                        '<input type="hidden" name="id_sub_jm'+$hitung+'" value="'+respond['km'][$k]['id_sub_jenis_material']+'">'+
                                    '</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+
                                        respond['km'][$k]['jumlah_konsumsi']+
                                    '</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+
                                        $from_inli+
                                        '<input type="hidden" id="jmln'+$hitung+'" value="'+$from_inli+'">'+
                                    '</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+
                                        $jumlah_minta +' ||  diberikan gudang '+ $total_ambilnya+' '+$satuan_ukuran+' ('+ ( $total_ambilnya * $ukuran_satuan_keluar)+')'+
                                        '<input type="hidden" id="jmgd'+$hitung+'" value="'+( $total_ambilnya * $ukuran_satuan_keluar)+'">'+
                                        $isi_detpeng+
                                    '</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+
                                        $tampilkan_perhitungan+
                                        '<input type="hidden" id="jmtm'+$hitung+'" value="'+$total_ambil_tambah+'">'+
                                        $isi_detpengt+
                                    '</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+
                                        $jumlah_konsumsi_seharusnya+
                                        '<input type="hidden" id="jmsh'+$hitung+'" value="'+$jumlah_konsumsi_seharusnya+'">'+
                                    '</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center><input class="form-control" id="jmlain'+$hitung+'" type="number" step="0.01" min="0" oninput="hitung(this)"></center>'+
                                '</td>'+
                                '<td>'+
                                    '<center><b>'+
                                        '<div id="idnya_wip'+$hitung+'">'+$wip_sem+'</div>'+
                                        '<input type="hidden" name="wip'+$hitung+'" id="wip'+$hitung+'" value="'+$wip_sem+'">'+
                                        '<div id="perhitungannya'+$hitung+'">'+$perhitungan+'</div>'+
                                    '</center></b>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+
                                       $satuan_keluar+
                                    '</center>'+
                                '</td>'+
                            '</tr>';

                            $nomor++;
                            $hitung++;
                        }
                    }

                    $table_km =
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
                                    'Konsumsi Material'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Konsumsi Persediaan Line'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Pengambilan Dari Gudang'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Pengambilan Tambahan'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Pemakaian Seharusnya'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Pemakaian Lainnya'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Sisa Material Di Line'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Satuan Konsumsi'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_km+
                        '</tbody>'+
                    '</table><br>';

                    //nama produk
                        if(respond['percut'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];
                            $id_warna  = respond['percut'][$i]['id_warna'];

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

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['percut'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['percut'][$i]['keterangan'] == 2){
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($k=0;$k<respond['jmwarna'];$k++){
                                if(respond['warna'][$k]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$k]['nama_warna'];
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['percut'][$i]['nama_produk'];
                        }
                    //tutup nama produk
                        
                    $konsumsi_material = $konsumsi_material +
                    '<hr><h5><b>'+($i+1)+'. '+$namanya+' ('+respond['percut'][$i]['jumlah_percut']+' - '+respond['percut'][$i]['jumlah_aktual_cut']+') '+'</b></h5>'+
                    $table_km;
                }

                $("#jumlah_detail_setuju").val($hitung);

                if($cek != 0){
                    $("#alert").show();
                    $("#setuju").prop('disabled',true);
                } else{
                    $("#alert").hide();
                    $("#setuju").prop('disabled',false);
                }

                $("#konsumsi_material").html($konsumsi_material);
                $("#modalse7").modal();
            }
        });
    });
</script>

<!-- hitung pada setuju -->
<script>
    function hitung(obj){
        var id = obj.id;
        var length = id.length;

        if(length == 7){
            var hitung = id.charAt(6);
        } else if(length == 8){
            var hitung = id.charAt(7) + id.charAt(8);
        } else if(length == 9){
            var hitung = id.charAt(7) + id.charAt(8) + id.charAt(9);
        } else if(length == 10){
            var hitung = id.charAt(7) + id.charAt(8) + id.charAt(9) + id.charAt(10);
        }

        $jmln   = $("#jmln"+hitung).val();
        $jmgd   = $("#jmgd"+hitung).val();
        $jmtm   = $("#jmtm"+hitung).val();
        $jmsh   = $("#jmsh"+hitung).val();
        $jmlain = $("#jmlain"+hitung).val();

        $perhitungan = "("+$jmln+" + "+$jmgd+" + "+$jmtm+") - ("+$jmsh+" + "+$jmlain+") ";
        $hitungnya   = parseFloat($jmln) + parseFloat($jmgd) + parseFloat($jmtm) - parseFloat($jmsh) - parseFloat($jmlain);
        //$hitungnya   = (parseInt($jmln) + parseInt($jmgd) + parseInt($jmtm)) - (parseInt($jmsh) + parseInt($jmlain));

        $("#perhitungannya"+hitung).html($perhitungan);
        $("#wip"+hitung).val($hitungnya);
        $("#idnya_wip"+hitung).html($hitungnya);

        $count = 0;
        for($p=0;$p<$("#jumlah_detail_setuju").val();$p++){
            if($("#wip"+$p).val() < 0){
                $count++;
            }
        }

        if($count != 0){
            $("#alert").show();
            $("#setuju").prop('disabled',true);
        } else{
            $("#alert").hide();
            $("#setuju").prop('disabled',false);
        }
    }
</script>
