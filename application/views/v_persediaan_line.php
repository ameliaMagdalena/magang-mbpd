<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Persediaan Line</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Persediaan Line</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <?php if($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" || 
            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" ||
            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" ){?>
                <a class="modal-with-form col-lg-2  btn btn-primary" id="button_tambah" 
                href="#modaltambah" style="margin-right:5px;margin-bottom:5px">+ Masuk</a>
                <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
                href="#modalkeluar" style="margin-right:5px;margin-bottom:5px">+ Keluar</a>
                <br><br>
        <?php }?>

        <header class="panel-heading">
            <h2 class="panel-title">Data Persediaan Line</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Material</th>
                        <th style="text-align: center;vertical-align: middle;">Total Material</th>
                        <?php if($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" || 
                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] != "Management" ||
                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] != "Management"){?>
                            <th style="text-align: center;vertical-align: middle;">Nama Line</th>
                        <?php }?>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($inventory_line as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_persediaan_line?>">
                                <?= $x->nama_sub_jenis_material; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->total_material; ?></td>
                            <?php if($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" || 
                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] != "Management" ||
                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] != "Management"){?>
                                <td style="text-align: center;vertical-align: middle;"><?= $x->nama_line; ?></td>
                            <?php }?>
                            <td  class="col-lg-3">
                                <a class="bmasuk_klik modal-with-form col-lg-3 btn btn-primary fa  fa-level-down"
                                title="Persediaan Masuk" href="#modalmasuk<?= $x->id_persediaan_line;?>" value="<?= $no;?>" style="margin-right:5px;margin-bottom:5px"></a>

                                <a class="bkeluar_klik modal-with-form col-lg-3 btn btn-success fa   fa-level-up"
                                title="Persediaan Keluar" href="#modalkeluar<?= $x->id_persediaan_line;?>" value="<?= $no;?>" style="margin-right:5px;margin-bottom:5px"></a>
                            </td>
                        </tr>

                        <div id='modalmasuk<?= $x->id_persediaan_line;?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Data Persediaan Line Masuk</h2>
                                </header>

                                <div class="panel-body">
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Material</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->nama_sub_jenis_material?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Total Material</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->total_material?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Line</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->nama_line?>" readonly>
                                        </div>
                                    </div>

                                    <div id="table_masuk"></div>
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

                        <div id='modalkeluar<?= $x->id_persediaan_line;?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Data Persediaan Line Keluar</h2>
                                </header>

                                <div class="panel-body">
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Material</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->nama_sub_jenis_material?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Total Material</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->total_material?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Line</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->nama_line?>" readonly>
                                        </div>
                                    </div>

                                    <div id="table_keluar"></div>
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
                    <?php
                    $no++;
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>inventoryLine/tambah"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Persediaan Masuk</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Line</label>
                        <div class="col-sm-7">
                            <select class="form-control populate" name="line" id="line" onchange="ubah()">
                                <option value="-" >Pilih Line</option>
                                <?php foreach($line as $l){?>
                                    <option value="<?= $l->id_line ?>"><?= $l->nama_line ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Material</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="material" id="material" onchange="material_change()">
                                <option value="-" >Pilih Material</option>
                                <?php foreach($sub_jm as $sjm){?>
                                    <option value="<?= $sjm->id_sub_jenis_material ?>"><?= $sjm->nama_sub_jenis_material ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Total Material</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" min="0.01" step=".01"  id="jumlah_material" name="jumlah_material" onchange="ubah()">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Satuan Masuk</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text"  id="satuan" disabled>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Simpan" id="simpan" disabled>
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <div id='modalkeluar' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>inventoryLine/keluarkan"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Persediaan Keluar</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Material</label>
                        <div class="col-sm-7">
                            <select class="form-control populate" name="nama_persediaan" id="nama_persediaan" onchange="persediaan_ubah()">
                                <option value="-" >Pilih Material</option>
                                <?php foreach($persediaan as $p){?>
                                    <option value="<?= $p->id_persediaan_line ?>"><?= $p->nama_sub_jenis_material ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Total Material</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number"  id="total_persediaan" name="total_persediaan" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg" id="div_keluar">
                        <label class="col-sm-5 control-label">Jumlah Keluar</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="number" min="0.01" step=".01"  id="jumlah_keluar" name="jumlah_keluar" onchange="cek_pengeluaran()">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Satuan Keluar</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text"  id="satuan_keluar" disabled>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Simpan" id="simpan_keluar" disabled>
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
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

<!-- masuk -->
<script>
    $('.bmasuk_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>inventoryLine/persediaan_masuk",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi    = "";
                $status = "";

                for($i=0;$i<respond['jm_det_inline'];$i++){
                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                    var tanggal = new Date(respond['det_inline'][$i]['tanggal']).getDate();
                    var xhari = new Date(respond['det_inline'][$i]['tanggal']).getDay();
                    var xbulan = new Date(respond['det_inline'][$i]['tanggal']).getMonth();
                    var xtahun = new Date(respond['det_inline'][$i]['tanggal']).getYear();
                    
                    var hari = hari[xhari];
                    var bulan = bulan[xbulan];
                    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                    $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                    if(respond['det_inline'][$i]['status'] == 0){
                        $status = "Produksi";
                    } else{
                        $status = "Lainnya";
                    }
                
                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $tanggalnya+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inline'][$i]['jumlah_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inline'][$i]['satuan_keluar']+
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
                                        'Tanggal'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Status Masuk'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>';

                $("#table_masuk").html($table);
            }
        });
    });
</script>

<!-- keluar -->
<script>
    $('.bkeluar_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>inventoryLine/persediaan_keluar",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi    = "";
                $status = "";

                for($i=0;$i<respond['jm_det_inline'];$i++){
                    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                    var tanggal = new Date(respond['det_inline'][$i]['tanggal']).getDate();
                    var xhari = new Date(respond['det_inline'][$i]['tanggal']).getDay();
                    var xbulan = new Date(respond['det_inline'][$i]['tanggal']).getMonth();
                    var xtahun = new Date(respond['det_inline'][$i]['tanggal']).getYear();
                    
                    var hari = hari[xhari];
                    var bulan = bulan[xbulan];
                    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                    $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                    if(respond['det_inline'][$i]['status'] == 0){
                        $status = "Produksi";
                    } else{
                        $status = "Lainnya";
                    }

                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $tanggalnya+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inline'][$i]['jumlah_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inline'][$i]['satuan_keluar']+
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
                                        'Tanggal'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan'+
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

                $("#table_keluar").html($table);
            }
        });
    });
</script>

<!-- ubah -->
<script>
    function ubah(){
        if($("#line").val() != "-" && $("#material").val() != "-" && $("#jumlah_material").val() != ""){
            $("#simpan").prop('disabled',false);
        } else{
            $("#simpan").prop('disabled',true);
        }
    }
</script>

<!-- material change -->
<script>
    function material_change(){
        var id = $("#material").val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>inventoryLine/satuan_masuk",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#satuan").val(respond['satuan'][0]['satuan_keluar']);
                ubah();
            }
        });
    }
</script>

<!-- persediaan ubah -->
<script>
    function persediaan_ubah(){
        var id = $("#nama_persediaan").val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>inventoryLine/get_one_persediaan_line",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#total_persediaan").val(respond['seli'][0]['total_material']);
                $("#satuan_keluar").val(respond['seli'][0]['satuan_keluar']);

                $isi = 
                    '<label class="col-sm-5 control-label">Jumlah Keluar</label>'+
                    '<div class="col-sm-7">'+
                        '<input class="form-control" type="number" min="0.01" step=".01" max="'+respond['seli'][0]['total_material']
                        +'" id="jumlah_keluar" name="jumlah_keluar" onchange="cek_pengeluaran()">'+
                    '</div>';

                $("#div_keluar").html($isi);
            }
        });
    }
</script>

<!-- cek pengeluaran -->
<script>
    function cek_pengeluaran(){
        if($("#nama_persediaan").val() != "-" && $("#jumlah_keluar").val() > 0){
            $("#simpan_keluar").prop('disabled',false);
        } else{
            $("#simpan_keluar").prop('disabled',true);
        }
    }
</script>
    