<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Laporan Lembur Belum Diproses</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Laporan Lembur Belum Diproses</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Laporan Lembur Belum Diproses</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Line</th>
                        <th style="text-align: center;vertical-align: middle;">Status</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($laporan_lembur as $ll){?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $waktu = $ll->tanggal;

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
                            <td style="text-align: center;vertical-align: middle;"><?= $ll->nama_line; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                Belum Diproses
                            </td>
                            <td  class="col-lg-3">
                                <!-- STATUS = 3 -->
                                <?php if($ll->status_spl == 3){ ?>
                                    <button type="button" class="bdet1_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    id="bdet1<?= $ll->id_surat_perintah_lembur?>" value="<?= $ll->id_surat_perintah_lembur?>" title="Detail" style="margin-bottom:5px;margin-right:5px"></button>

                                    <?php if($_SESSION['nama_jabatan'] == "PIC Line Cutting" && $_SESSION['nama_departemen'] == "Produksi" || 
                                        $_SESSION['nama_jabatan'] == "PIC Line Bonding" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "PIC Line Sewing" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "PIC Line Assy" && $_SESSION['nama_departemen'] == "Produksi" || 
                                        $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                        $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                            <button type="button" class="bproses_klik col-lg-3 btn btn-success fa fa-gear" 
                                            id="bproses<?= $ll->id_surat_perintah_lembur?>" value="<?= $ll->id_surat_perintah_lembur?>" title="Edit" style="margin-bottom:5px;margin-right:5px"></button>
                                    <?php }?>
                                <?php } else if($ll->status_spl == 4){ ?>
                                    <button type="button" class="bdet2_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    id="bdet2<?= $ll->id_surat_perintah_lembur?>" value="<?= $ll->id_surat_perintah_lembur?>" title="Detail" style="margin-bottom:5px;margin-right:5px"></button>

                                    <?php if($_SESSION['nama_jabatan'] == "PIC Line Cutting" && $_SESSION['nama_departemen'] == "Produksi" || 
                                        $_SESSION['nama_jabatan'] == "PIC Line Bonding" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "PIC Line Sewing" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "PIC Line Assy" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                        $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                            <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                            id="bedit<?= $ll->id_surat_perintah_lembur?>" value="<?= $ll->id_surat_perintah_lembur?>" title="Edit" style="margin-bottom:5px;margin-right:5px"></button>
                                    <?php } ?>
                                    <?php if($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" ||
                                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                                <a class="modal-with-form col-lg-3 btn btn-success fa fa-check-square"
                                                title="Konfirmasi" href="#modalsetuju<?= $ll->id_surat_perintah_lembur ?>" style="margin-bottom:5px;margin-right:5px"></a>
                                    <?php } ?>
                                <?php } else if($ll->status_spl == 5){ ?>
                                        <button type="button" class="bdet2_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                        id="bdet2<?= $ll->id_surat_perintah_lembur?>" value="<?= $ll->id_surat_perintah_lembur?>" title="Detail" style="margin-bottom:5px;margin-right:5px"></button>
                                        <form method="POST" action="<?= base_url()?>laporanLembur/print">
                                            <input type="hidden" name="id" value="<?= $ll->id_surat_perintah_lembur?>">
                                            <button type="submit" class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                            title="Print" style="margin-bottom:5px;margin-right:5px"></button>
                                        </form>  
                                <?php } ?>
                            </td>
                        </tr>

                        <div id="modalsetuju<?= $ll->id_surat_perintah_lembur?>" class="modal-block modal-block-sm mfp-hide">
                            <form method="POST" action="<?= base_url()?>laporanLembur/ppic_setuju">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Konfirmasi Surat Perintah Lembur</h2>
                                    </header>

                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <input type="hidden" name="id_spl" value="<?= $ll->id_surat_perintah_lembur?>">
                                                    <p>Apakah anda yakin akan mengkonfirmasi laporan lembur untuk <?= $ll->nama_line?> pada tanggal                                 <?php 
                                                        $waktu = $ll->tanggal;

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
                                                    ?>?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <input type="submit" class="btn btn-primary" value="Ya">
                                                    <button class="btn btn-default modal-dismiss">Batal</button>
                                                </div>
                                            </div>
                                        </footer>
                                </section>
                            </form>
                        </div>
                    <?php $no++; } ?>
                </tbody>
	        </table>
        </div>
    </div>

        <!-- modal detail1 -->
        <div class="modal" id="modaldetail1" role="dialog">
            <div class="modal-dialog modal-xl" style="width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Detail Surat Perintah Lembur</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="det2_tanggal"
                                readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Line</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="det2_line"
                                readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Waktu</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="det2_waktu"
                                readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" id="det2_keterangan" data-plugin-textarea-autosize required readonly></textarea>
                            </div>
                        </div>

                        <br>
                        <div id="table_detail1"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                    </div>
                </div>
            </div>
        </div>

        <!-- modal detail2 -->
        <div class="modal" id="modaldetail2" role="dialog">
            <div class="modal-dialog modal-xl" style="width:80%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Detail Surat Perintah Lembur</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="detail_tanggal"
                                readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Line</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="detail_line"
                                readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Waktu</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="detail_waktu"
                                readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" id="detail_keterangan" data-plugin-textarea-autosize required readonly></textarea>
                            </div>
                        </div>

                        <br>
                        <div id="table_detail2"></div>

                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Keterangan Laporan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="detail_keterangan_laporan" id="detail_keterangan_laporan"
                                data-plugin-textarea-autosize readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                    </div>
                </div>
            </div>
        </div>

        <!-- modal proses -->
        <div class="modal" id="modalproses" role="dialog">
            <div class="modal-dialog modal-xl" style="width:80%">
                <form method="POST" action="<?= base_url()?>laporanLembur/proses_pic">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Proses Surat Perintah Lembur</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="ak_id_spl" id="ak_id_spl">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input class="form-control col-md-5" type="text" readonly
                                    name="ak_tanggal" id="ak_tanggal"> 
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Line</label>
                                <div class="col-sm-9">
                                    <input class="form-control col-md-5" type="text" readonly
                                    name="ak_line" id="ak_line"> 
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Waktu</label>
                                <div class="col-sm-9">
                                    <input class="form-control col-md-5" type="text" readonly
                                    name="ak_waktu" id="ak_waktu"> 
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" name="ak_keterangan" id="ak_keterangan"
                                    data-plugin-textarea-autosize readonly></textarea>
                                </div>
                            </div>

                            <br>
                            <div id="table_edit2"></div>
                            <input type="hidden" name="jumlah_karyawan" id="jumlah_karyawan">

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Keterangan Laporan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" name="keterangan_laporan" id="keterangan_laporan"
                                    data-plugin-textarea-autosize></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <input type="button" class="btn btn-default modal-dismiss" onclick="reload()" value="Batal">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- modal edit -->
        <div class="modal" id="modaledit" role="dialog">
            <div class="modal-dialog modal-xl" style="width:80%">
                <form method="POST" action="<?= base_url()?>laporanLembur/edit_pic">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Edit Surat Perintah Lembur</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="edit_id_spl" id="edit_id_spl">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input class="form-control col-md-5" type="text" readonly
                                    name="edit_tanggal" id="edit_tanggal"> 
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Line</label>
                                <div class="col-sm-9">
                                    <input class="form-control col-md-5" type="text" readonly
                                    name="edit_line" id="edit_line"> 
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Waktu</label>
                                <div class="col-sm-9">
                                    <input class="form-control col-md-5" type="text" readonly
                                    name="edit_waktu" id="edit_waktu"> 
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" name="edit_keterangan" id="edit_keterangan"
                                    data-plugin-textarea-autosize readonly></textarea>
                                </div>
                            </div>

                            <br>
                            <div id="table_edit"></div>
                            <input type="hidden" name="edit_jumlah_karyawan" id="edit_jumlah_karyawan">

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Keterangan Laporan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" name="edit_keterangan_laporan" id="edit_keterangan_laporan"
                                    data-plugin-textarea-autosize></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <input type="button" class="btn btn-default modal-dismiss" onclick="reload()" value="Batal">
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
        //SPL-1
        var id = $(('#bdet1')+$(this).attr('value')).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanLembur/detail_spl_dspl",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['spl'][0]['tanggal']).getDate();
                var xhari = new Date(respond['spl'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['spl'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['spl'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#det2_tanggal").val($tanggalnya);
                $("#det2_line").val(respond['spl'][0]['nama_line']);
                $("#det2_waktu").val(respond['spl'][0]['waktu_lembur']);
                $("#det2_keterangan").val(respond['spl'][0]['keterangan_perintah']);

                $isi = "";

                for($i=0;$i<respond['jm_dspl'];$i++){
                   // alert($i);
                   $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1) +
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['nama_karyawan'] +
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['planning_lembur']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_in_plan']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_out_plan']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['keterangan_plan']+
                        '</td>'+
                    '</tr>';
                }


                $tablenya = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">Nama Karyawan</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">Planning Lembur (jam)</th>'+
                            '<th colspan="2" style="text-align: center;vertical-align: middle;">Jam Lembur</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">Keterangan</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">IN</th>'+
                            '<th style="text-align: center;vertical-align: middle;">OUT</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi+
                    '</tbody>'+
                '</table>';

                $("#table_detail1").html($tablenya);

                $("#modaldetail1").modal();
            }
        });
        
    });
</script>

<!-- detail2 -->
<script>
    $('.bdet2_klik').click(function(){
        //SPL-1
        var id = $(('#bdet2')+$(this).attr('value')).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanLembur/detail_spl_dspl",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['spl'][0]['tanggal']).getDate();
                var xhari = new Date(respond['spl'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['spl'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['spl'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#detail_tanggal").val($tanggalnya);
                $("#detail_line").val(respond['spl'][0]['nama_line']);
                $("#detail_waktu").val(respond['spl'][0]['waktu_lembur']);
                $("#detail_keterangan").val(respond['spl'][0]['keterangan_perintah']);
                $("#detail_keterangan_laporan").val(respond['spl'][0]['keterangan_laporan']);

                $isi = "";

                for($i=0;$i<respond['jm_dspl'];$i++){
                   // alert($i);
                   $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1) +
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['nama_karyawan'] +
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['planning_lembur']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_in_plan']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_out_plan']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['aktual_lembur']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_in_aktual']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_out_aktual']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['keterangan_aktual']+
                        '</td>'+
                    '</tr>';
                }


                $tablenya = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                    '<tr>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'No'+
                            '</th>'+
                            '<th class="col-sm-3" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Nama Karyawan'+
                            '</th>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Waktu Lembur Perencanaan (Jam)'+
                            '</th>'+
                            '<th class="col-sm-2" colspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Jam Lembur Perencanaan '+
                            '</th>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Waktu Lembur Aktual (Jam)'+
                            '</th>'+
                            '<th class="col-sm-2" colspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Jam Lembur Aktual'+
                            '</th>'+
                            '<th class="col-sm-4" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Keterangan'+
                            '</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">IN</th>'+
                            '<th style="text-align: center;vertical-align: middle;">OUT</th>'+
                            '<th style="text-align: center;vertical-align: middle;">IN</th>'+
                            '<th style="text-align: center;vertical-align: middle;">OUT</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi+
                    '</tbody>'+
                '</table>';

                $("#table_detail2").html($tablenya);

                $("#modaldetail2").modal();
            }
        });
        
    });
</script>

<!-- proses PIC -->
<script>
    $('.bproses_klik').click(function(){
        var id = $(('#bproses')+$(this).attr('value')).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanLembur/detail_spl_dspl",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#ak_id_spl").val(id);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['spl'][0]['tanggal']).getDate();
                var xhari = new Date(respond['spl'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['spl'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['spl'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#ak_tanggal").val($tanggalnya);
                $("#ak_line").val(respond['spl'][0]['nama_line']);
                $("#ak_waktu").val(respond['spl'][0]['waktu_lembur']);
                $("#ak_keterangan").val(respond['spl'][0]['keterangan_perintah']);


                $isi = "";

                for($i=0;$i<respond['jm_dspl'];$i++){
                   $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1) +
                            '<input type="hidden" name="id_dspl'+$i+'" id="id_dspl'+$i+'" value="'+respond['dspl'][$i]['id_detail_surat_perintah_lembur']+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['nama_karyawan'] +
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['planning_lembur']+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['waktu_in_plan']+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['waktu_out_plan']+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                '<input type="number" name="ak_jam'+$i+'" min="0" max="24" '+
                                'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                '<input type="time" name="ak_in'+$i+'"'+
                                'style="width:100px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<textarea class="form-control" rows="2" name="ak_ket'+$i+'" '+
                                'data-plugin-textarea-autosize></textarea>'+
                            '</center>'+
                        '</td>'+
                    '</tr>';
                }

                $tablenya = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'No'+
                            '</th>'+
                            '<th class="col-sm-3" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Nama Karyawan'+
                            '</th>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Waktu Lembur Perencanaan (Jam)'+
                            '</th>'+
                            '<th class="col-sm-2" colspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Jam Lembur Perencanaan '+
                            '</th>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Waktu Lembur Aktual (Jam)'+
                            '</th>'+
                            '<th class="col-sm-2" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Jam Lembur Aktual (IN)'+
                            '</th>'+
                            '<th class="col-sm-4" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Keterangan'+
                            '</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">IN</th>'+
                            '<th style="text-align: center;vertical-align: middle;">OUT</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi+
                    '</tbody>'+
                '</table>';

                $("#table_edit2").html($tablenya);
                $("#jumlah_karyawan").val(respond['jm_dspl']);
                $("#modalproses").modal();
            }
        });
    });
</script>

<!-- edit PIC -->
<script>
    $('.bedit_klik').click(function(){
        var id = $(('#bedit')+$(this).attr('value')).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanLembur/detail_spl_dspl",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#edit_id_spl").val(id);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['spl'][0]['tanggal']).getDate();
                var xhari = new Date(respond['spl'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['spl'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['spl'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#edit_tanggal").val($tanggalnya);
                $("#edit_line").val(respond['spl'][0]['nama_line']);
                $("#edit_waktu").val(respond['spl'][0]['waktu_lembur']);
                $("#edit_keterangan").val(respond['spl'][0]['keterangan_perintah']);

                $("#edit_keterangan_laporan").val(respond['spl'][0]['keterangan_laporan']);

                $isi = "";

                for($i=0;$i<respond['jm_dspl'];$i++){
                   $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1) +
                            '<input type="hidden" name="edit_id_dspl'+$i+'" id="edit_id_dspl'+$i+'" value="'+respond['dspl'][$i]['id_detail_surat_perintah_lembur']+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['nama_karyawan'] +
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['planning_lembur']+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['waktu_in_plan']+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                respond['dspl'][$i]['waktu_out_plan']+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                '<input type="number" name="edit_ak_jam'+$i+'" min="0" max="24" value="'+ respond['dspl'][$i]['aktual_lembur']+'" '+
                                'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;"  >'+
                            '<center>'+
                                '<input type="time" name="edit_ak_in'+$i+'" value="'+ respond['dspl'][$i]['waktu_in_aktual']+'" '+
                                'style="width:100px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<textarea class="form-control" rows="2" name="edit_ak_ket'+$i+'" '+
                                'data-plugin-textarea-autosize>'+respond['dspl'][$i]['keterangan_aktual'] +'</textarea>'+
                            '</center>'+
                        '</td>'+
                    '</tr>';
                }

                $tablenya = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'No'+
                            '</th>'+
                            '<th class="col-sm-3" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Nama Karyawan'+
                            '</th>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Waktu Lembur Perencanaan (Jam)'+
                            '</th>'+
                            '<th class="col-sm-2" colspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Jam Lembur Perencanaan '+
                            '</th>'+
                            '<th class="col-sm-1" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Waktu Lembur Aktual (Jam)'+
                            '</th>'+
                            '<th class="col-sm-2" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Jam Lembur Aktual (IN)'+
                            '</th>'+
                            '<th class="col-sm-4" rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Keterangan'+
                            '</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">IN</th>'+
                            '<th style="text-align: center;vertical-align: middle;">OUT</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi+
                    '</tbody>'+
                '</table>';

                $("#table_edit").html($tablenya);
                $("#edit_jumlah_karyawan").val(respond['jm_dspl']);
                $("#modaledit").modal();
            }
        });
    });
</script>

    