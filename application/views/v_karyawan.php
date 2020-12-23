<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Karyawan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Karyawan</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
            href="#modaltambah">+ Karyawan</a>
        <br><br>

        <header class="panel-heading">
            <h2 class="panel-title">Data Karyawan</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">NIK</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Karyawan</th>
                        <th style="text-align: center;vertical-align: middle;">Jabatan</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($karyawan as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_karyawan?>">
                                <?= $x->nik; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_karyawan; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $isinya ="";
                                    foreach($spesifikasi_jabatan as $sj){
                                        if($sj->id_karyawan == $x->id_karyawan){
                                            if($isinya == ""){
                                                $isinya = $sj->nama_departemen ."-". $sj->nama_jabatan;
                                            }
                                            else{
                                                $isinya = $isinya .",<br> ".$sj->nama_departemen ."-". $sj->nama_jabatan;
                                            }
                                        }    
                                    }
                                    echo $isinya;
                                ?>
                            </td>
                            <td  class="col-lg-3">
                                <?php if($x->nama_karyawan != "x"){?>
                                    <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                        title="Detail" href="#modaldetail<?= $x->id_karyawan;?>" style="margin-right:5px;margin-bottom:5px"></a>
                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        value="<?= $no;?>" title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php if($x->id_karyawan != $_SESSION['id_karyawan']){?> 
                                    <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                        title="Delete" href="#modalhapus<?= $x->id_karyawan;?>" style="margin-right:5px;margin-bottom:5px"></a>
                                <?php } ?>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                title="Log" id="blog<?php echo $x->id_karyawan?>" value="<?php echo $x->id_karyawan;?>" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } ?>
                            </td>
                        </tr>
    
    <div id='modaldetail<?= $x->id_karyawan;?>' class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Karyawan</h2>
            </header>

            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">NIK</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"
                        value="<?= $x->nik?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nama Karyawan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"
                        value="<?= $x->nama_karyawan?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Status Karyawan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control"
                        value="<?php  if($x->keterangan == 0){ echo "Tidak Memiliki Akses";}else{echo "Memiliki Akses";}?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Jabatan</label>
                    <div class="col-sm-7">
                        <textarea type="textarea" class="form-control" id="textareaAutosize" rows="3" data-plugin-textarea-autosize overflow: hidden; overflow-wrap: break-word; resize: none; height: 74px;
                        readonly><?php 
                                    $isinya ="";
                                    foreach($spesifikasi_jabatan as $sj){
                                        if($sj->id_karyawan == $x->id_karyawan){
                                            if($isinya == ""){
                                                $isinya = $sj->nama_departemen ."-". $sj->nama_jabatan;
                                            }
                                            else{
                                                $isinya = $isinya .", ".$sj->nama_departemen ."-". $sj->nama_jabatan;
                                            }
                                        }    
                                    }
                                    echo $isinya;
                                ?></textarea>
                    </div>
                </div>
                
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

    <div id="modalhapus<?= $x->id_karyawan;?>" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>karyawan/delete_karyawan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Karyawan</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <input type="hidden" name="id_karyawan" value="<?= $x->id_karyawan;?>">
                                <input type="hidden" name="keterangan" value="<?= $x->keterangan;?>">
                                <p>Apakah anda yakin akan menghapus data karyawan dengan nama karyawan <?= $x->nama_karyawan?>?</p>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" class="btn btn-primary" value="Hapus">
                                <button class="btn btn-default modal-dismiss">Batal</button>
                            </div>
                        </div>
                    </footer>
            </section>
        </form>

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
        <form method="POST" action="<?= base_url()?>karyawan/tambah_karyawan"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Karyawan</h2>
                </header>

                <div class="panel-body">
                    <h4><b>Data Karyawan</b></h4>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">NIK</label>
                        <div class="col-sm-7">
                            <input type="text" name="nik_input" id="nik_input" 
                            onchange="cek_nik_karyawan_input()" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Karyawan</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_karyawan_input" id="nama_karyawan_input" 
                            onchange="cek_nama_karyawan_input()" class="form-control">
                            <input type="hidden" name="keterangan" id="keterangan" class="form-control">
                        </div>
                    </div>
                    <hr>

                    <h4><b>Jabatan Karyawan</b></h4>
                    <div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">
                        <div class="col-md-5 form-group">
                            <select class="form-control" name="departemen" id="departemen"
                            onchange="ganti_dp()">
                                <option value="Nama Departemen">Nama Departemen</option>
                                <?php foreach($departemen as $dp){?>
                                    <option value="<?= $dp->id_departemen;?>">
                                        <?= $dp->nama_departemen;?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php foreach($departemen as $dp){?>
                                <input type="hidden" id="nm_dp<?= $dp->id_departemen?>" value="<?= $dp->nama_departemen?>">
                            <?php } ?>
                        </div>

                        <div class="col-md-5 form-group" id="ganti_jb">
                            <select class="form-control" name="jabatan" id="jabatan"
                            >
                                <option value="Jabatan">Jabatan</option>
                            </select>
                        </div>
    
                        <div class="col-md-1 form-group">
                            <button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"
                            title="Add"  onclick="add_sj()"></button>
                        </div>
                        <br>
                    </div>
                    <br>
                 
                    <div id="table_sjabatan">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>
                                    <th class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Departemen</th>
                                    <th class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Jabatan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <input type="hidden" name="jumlah_sj" id="jumlah_sj">
                    
                    <div id="div_user" style="display:none">
                        <hr>
                        <h4><b>Data User</b></h4>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Email User</label>
                            <div class="col-sm-7">
                                <input type="email" name="email_user_input" id="email_user_input" 
                                onchange="cek_email_input()" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Password User</label>
                            <div class="col-sm-7">
                                <input type="password" min="8" name="password_user_input" id="password_user_input" 
                             class="form-control" onchange="cek_terisi()">
                             <span style="color:red;font-size:10px">*minimum 8 karakter, maksimum 50 karakter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-primary" id="button_simpan" value="Simpan" disabled>
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <!-- modal edit -->
    <div class="modal" id="modaledit" role="dialog">
        <form method="POST" action="<?= base_url()?>karyawan/edit_karyawan">
            <div class="modal-dialog modal-xl" style="width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Karyawan</b></h4>
                    </div>
                    <div class="modal-body">
                        <h4><b>Data Karyawan</b></h4>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">NIK</label>
                            <div class="col-sm-7">
                                <input type="hidden" name="id_edit" id="id_edit">
                                <input type="text" name="nik_edit" id="nik_edit" 
                                onchange="cek_nik_karyawan_edit()" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Karyawan</label>
                            <div class="col-sm-7">
                                <input type="text" name="nama_karyawan_edit" id="nama_karyawan_edit" 
                                onchange="cek_nama_karyawan_edit()" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Status Karyawan</label>
                            <div class="col-sm-7">
                                <input type="hidden" name="keterangan_edit_sebelum" id="keterangan_edit_sebelum" class="form-control" readonly>
                                <input type="hidden" name="keterangan_edit_sesudah" id="keterangan_edit_sesudah" class="form-control" readonly>
                                <input type="text" name="status_karyawan_edit" id="status_karyawan_edit" class="form-control" readonly>
                            </div>
                        </div>
                        <hr>

                        <h4><b>Jabatan Karyawan</b></h4>
                        <div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">
                            <div class="col-md-5 form-group">
                                <select class="form-control" name="edepartemen" id="edepartemen"
                                onchange="eganti_dp()">
                                    <option value="Nama Departemen">Nama Departemen</option>
                                    <?php foreach($departemen as $dp){?>
                                        <option value="<?= $dp->id_departemen;?>">
                                            <?= $dp->nama_departemen;?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php foreach($departemen as $dp){?>
                                    <input type="hidden" id="enm_dp<?= $dp->id_departemen?>" value="<?= $dp->nama_departemen?>">
                                <?php } ?>
                            </div>

                            <div class="col-md-5 form-group" id="eganti_jb">
                                <select class="form-control" name="ejabatan" id="ejabatan">
                                    <option value="Jabatan">Jabatan</option>
                                </select>
                            </div>
        
                            <div class="col-md-1 form-group">
                                <button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"
                                title="Add"  onclick="eadd_sj()"></button>
                            </div>
                            <br>
                        </div>
                        <br>
                    
                        <div id="etable_sjabatan">
                            <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                                <thead>
                                    <tr>
                                        <th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>
                                        <th class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Departemen</th>
                                        <th class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Jabatan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <input type="hidden" name="ejumlah_sj" id="ejumlah_sj">

                        <div id="ediv_user" style="display:none">
                            <hr>
                            <h4><b>Data User</b></h4>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Email User</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email_user_edit" id="email_user_edit" 
                                    onchange="cek_email_edit()" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Password User</label>
                                <div class="col-sm-7">
                                    <input type="password" min="8" max="50" name="password_user_edit" id="password_user_edit" 
                                class="form-control" onchange="ecek_terisi()">
                                <span style="color:red;font-size:10px">*minimum 8 karakter, maksimum 50 karakter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan" id="ebutton_simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal" id="modallog" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Karyawan</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_terpilih">

                    <table>
                        <tr>
                            <td class="col-md-6">
                                <center>
                                    <b>Input Date:</b><span id="input_date"></span>
                                </center>
                            </td>
                            <td class="col-md-6">
                                <center>
                                    <b>User Input:</b><span id="input_user"></span>
                                </center>
                            </td>
                        </tr>
                    </table>

                    <div id="isi_log">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
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

<!-- cek nama karyawan input -->
<script>
    function cek_nama_karyawan_input(){
        var nama_karyawan_input = $("#nama_karyawan_input").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/cek_nama_karyawan_input",
            dataType: "JSON",
            data: {nama_karyawan_input:nama_karyawan_input},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, karyawan dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    reload();
                }
            }
        });

        cek_terisi();
    }
</script>

<!-- cek nik karyawan input -->
<script>
    function cek_nik_karyawan_input(){
        var nik_input = $("#nik_input").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/cek_nik_input",
            dataType: "JSON",
            data: {nik_input:nik_input},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, karyawan dengan NIK tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    reload();
                }
            }
        });

        cek_terisi();
    }
</script>

<!-- cek email input -->
<script>
    function cek_email_input(){
        var email_user_input = $("#email_user_input").val();

        $.ajax({
                type:"post",
                url:"<?php echo base_url() ?>karyawan/cek_email_input",
                dataType: "JSON",
                data: {email_user_input:email_user_input},

                success: function(respond){
                    if(respond['res'] == 1){
                        alert("Mohon maaf, email tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                        reload();
                    }
                }
            });

        cek_terisi();
    }
</script>

<!-- ganti dp -->
<script>
    function ganti_dp(){
        var id_departemen = $("#departemen").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/get_spesifikasi_jabatan",
            dataType: "JSON",
            data: {id_departemen:id_departemen},

            success: function(respond){
            
                $jumlah_sjabatan = respond['jumlah_sjabatan'];

                $tampung_sjabatan = "";
                $tampung_nama_jabatan = "";
                for($i=0;$i<$jumlah_sjabatan;$i++){
                    $id_sjabatan   = respond['sjabatan'][$i]['id_spesifikasi_jabatan'];
                    $nama_jabatan  = respond['sjabatan'][$i]['nama_jabatan'];

                    $tampung_sjabatan = $tampung_sjabatan + 
                    '<option value="'+$id_sjabatan+'">'+
                        $nama_jabatan+
                    '</option>';

                    $tampung_nama_jabatan = $tampung_nama_jabatan +
                    '<input type="hidden" id="nm_jb'+$id_sjabatan+'" value="'+$nama_jabatan+'">';
                }

                $isi = '<select class="form-control" name="jabatan" id="jabatan">'+
                            '<option value="Nama Jabatan">Nama Jabatan</option>'+
                            $tampung_sjabatan+
                        '</select>'+
                        $tampung_nama_jabatan;
                $("#ganti_jb").html($isi);
            }
        }); 
    }
</script>

<!-- add spesifikasi jabatan input -->
<script>
    function add_sj(){
        $id_departemen = $("#departemen").val();
        $id_jabatan    = $("#jabatan").val();

        if($id_departemen != "Nama Departemen" && $id_jabatan != "Nama Jabatan"){
            $nama_jab  =  $("#nm_jb"+$id_jabatan).val();
            $nama_dept =  $("#nm_dp"+$id_departemen).val();

            $jumlah_sj = $("#jumlah_sj").val();

            if($jumlah_sj == ""){
                $jumlah_saat_ini_ = $jumlah_sj + 1;
                $jumlah_saat_ini  = $jumlah_saat_ini_.length;

                $isinya =
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_saat_ini+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="iddp'+$jumlah_saat_ini+'" id="iddp'+$jumlah_saat_ini+'" value="'+$id_departemen+'">'+
                            '<input type="hidden" name="nmdp'+$jumlah_saat_ini+'" id="nmdp'+$jumlah_saat_ini+'" value="'+$nama_dept+'">'+
                            $nama_dept+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="idjb'+$jumlah_saat_ini+'"  id="idjb'+$jumlah_saat_ini+'" value="'+$id_jabatan+'">'+
                            '<input type="hidden" name="nmjb'+$jumlah_saat_ini+'"  id="nmjb'+$jumlah_saat_ini+'" value="'+$nama_jab+'">'+
                            $nama_jab+
                        '</td>'+
                    '</tr>';
                
                $("#jumlah_sj").val($jumlah_saat_ini_);
            }
            else{
                $hitung = 0;
                for($i=1;$i<=$jumlah_sj.length;$i++){
                    if(($("#iddp"+$i).val() == $id_departemen) && ($("#idjb"+$i).val() == $id_jabatan)){
                       $hitung++;
                    }
                }

                if($hitung == 0){
                    $lama = "";

                    for($i=1;$i<=$jumlah_sj.length;$i++){
                        $tampung_iddp   = $("#iddp"+$i).val();
                        $tampung_nmdp   = $("#nmdp"+$i).val();
                        $tampung_idjb   = $("#idjb"+$i).val();
                        $tampung_nmjb   = $("#nmjb"+$i).val();

                        $lama = $lama + 
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $i+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="iddp'+$i+'" id="iddp'+$i+'" value="'+$tampung_iddp+'">'+
                                '<input type="hidden" name="nmdp'+$i+'" id="nmdp'+$i+'" value="'+$tampung_nmdp+'">'+
                                $tampung_nmdp+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="idjb'+$i+'"  id="idjb'+$i+'" value="'+$tampung_idjb+'">'+
                                '<input type="hidden" name="nmjb'+$i+'"  id="nmjb'+$i+'" value="'+$tampung_nmjb+'">'+
                                $tampung_nmjb+
                            '</td>'+
                        '</tr>';
                    }

                    $jumlah_saat_ini_ = $jumlah_sj + 1;
                    $jumlah_saat_ini  = $jumlah_saat_ini_.length;

                    $isinya = $lama+
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_saat_ini+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="iddp'+$jumlah_saat_ini+'" id="iddp'+$jumlah_saat_ini+'" value="'+$id_departemen+'">'+
                            '<input type="hidden" name="nmdp'+$jumlah_saat_ini+'" id="nmdp'+$jumlah_saat_ini+'" value="'+$nama_dept+'">'+
                            $nama_dept+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="idjb'+$jumlah_saat_ini+'"  id="idjb'+$jumlah_saat_ini+'" value="'+$id_jabatan+'">'+
                            '<input type="hidden" name="nmjb'+$jumlah_saat_ini+'"  id="nmjb'+$jumlah_saat_ini+'" value="'+$nama_jab+'">'+
                            $nama_jab+
                        '</td>'+
                    '</tr>';

                    $("#jumlah_sj").val($jumlah_saat_ini_);
                }
                else{
                    alert("Mohon maaf jabatan pada departemen tersebut tidak dapat di daftarkan lagi karena sudah terdaftar");
                }
            }

            $tampung_sjabatan =   
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Departemen</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Jabatan</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isinya+
                    '</tbody>'+
                '</table>';

                $("#table_sjabatan").html($tampung_sjabatan);   
                cek_jabatan();  
        }
        else{
            alert("Silahkan pilih departemen dan jabatan terlebih dahulu");
        }
    }
</script>

<!-- cek terisi input -->
<script>
    function cek_terisi(){
        $nama_karyawan = $("#nama_karyawan_input").val();
        $jumlah_sj     = $("#jumlah_sj").val();
        $keterangan    = $("#keterangan").val();

        if($keterangan == 1){
            //kalau punya akses, cek field email & password
            $email = $("#email_user_input").val();
            $password = $("#password_user_input").val();
        
        
            if($nama_karyawan != "" && $jumlah_sj != 0 && $email != "" && $password.length >= 8 && $password.length <= 50){
                $("#button_simpan").prop('disabled',false);
            }
            else{
                $("#button_simpan").prop('disabled',true);
            }
        }
        else if($keterangan == 0){
            //kalau tidak punya akses
        
            if($nama_karyawan != "" && $jumlah_sj != 0){
                $("#button_simpan").prop('disabled',false);
            }
            else{
                $("#button_simpan").prop('disabled',true);
            }
        }
    }
</script>

<!-- cek jabatan apakah memilih akses/tidak (input)-->
<script>
    function cek_jabatan(){
        $jumlah_sj_ = $("#jumlah_sj").val();
        $jumlah_sj  = $jumlah_sj_.length;

        $count = 0;
        for($i=1;$i<=$jumlah_sj;$i++){
            $tam_departemen = $("#nmdp"+$i).val();
            $tam_jabatan    = $("#nmjb"+$i).val();

            if($tam_departemen == "Management" && $tam_jabatan == "Direktur" || $tam_departemen == "Management" && $tam_jabatan == "Manager" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "Admin" || $tam_departemen == "Purchasing" && $tam_jabatan == "Admin" || 
            $tam_departemen == "Research & Development" && $tam_jabatan == "Admin" || $tam_departemen == "Finish Good" && $tam_jabatan == "Admin" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "PPIC" || $tam_departemen == "Material" && $tam_jabatan == "PPIC" ||
            $tam_departemen == "Material" && $tam_jabatan == "Operator Gudang" || $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Cutting" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Bonding" || $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Sewing" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Assy"){
                $count++;
            }
        }
        
        if($count > 0){
            $("#keterangan").val(1);
            $("#div_user").show();
        }
        else{
            $("#keterangan").val(0);
            $("#div_user").hide();
        }
        cek_terisi();
    }
</script>

<!-- edit karyawan -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/detail_karyawan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#id_edit").val(respond['kar'][0]['id_karyawan']);
                $("#nik_edit").val(respond['kar'][0]['nik']);
                $("#nama_karyawan_edit").val(respond['kar'][0]['nama_karyawan']);
                $("#keterangan_edit_sebelum").val(respond['kar'][0]['keterangan']);
                $("#keterangan_edit_sesudah").val(respond['kar'][0]['keterangan']);

                if(respond['kar'][0]['keterangan'] == 0){
                    $("#status_karyawan_edit").val("Tidak Memiliki Akses");
                } else{
                    $("#status_karyawan_edit").val("Memiliki Akses");
                }

                $isi_table = "";
                $jumlah_jabatannya ="";

                for($i=0;$i<respond['jmjab'];$i++){
                    $isi_table = $isi_table +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ 
                            ($i+1)+
                            '<input type="hidden" id="stat'+($i+1)+'" name="stat'+($i+1)+'" value="0">'+
                            '<input type="hidden" id="idjabkar'+($i+1)+'" name="idjabkar'+($i+1)+'" value="'+respond['jab'][$i]['id_jabatan_karyawan']+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ 
                            '<input type="hidden" name="eiddp'+($i+1)+'" id="eiddp'+($i+1)+'" value="'+respond['jab'][$i]['id_departemen']+'">'+
                            '<input type="hidden" name="enmdp'+($i+1)+'" id="enmdp'+($i+1)+'" value="'+respond['jab'][$i]['nama_departemen']+'">'+
                            respond['jab'][$i]['nama_departemen']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ 
                            '<input type="hidden" name="eidjb'+($i+1)+'"  id="eidjb'+($i+1)+'" value="'+respond['jab'][$i]['id_spesifikasi_jabatan']+'">'+
                            '<input type="hidden" name="enmjb'+($i+1)+'"  id="enmjb'+($i+1)+'" value="'+respond['jab'][$i]['nama_jabatan']+'">'+
                            respond['jab'][$i]['nama_jabatan']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="checkbox" id="del'+($i+1)+'" name="del'+($i+1)+'" onclick="hapus_spekjab()"> hapus'+
                        '</td>'+
                    '</tr>';

                    $jumlah_jabatannya = $jumlah_jabatannya + "1";
                }

                $table = '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th style="text-align: center;vertical-align: middle;">No</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">Nama Departemen</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">Nama Jabatan</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                    $isi_table+
                                '</tbody>'+
                            '</table>';

                $("#etable_sjabatan").html($table);
                $("#ejumlah_sj").val($jumlah_jabatannya);

                $("#modaledit").modal();
            }
        });  
    });
</script>

<!-- cek nama karyawan edit -->
<script>
    function cek_nama_karyawan_edit(){
        var nama_karyawan_edit = $("#nama_karyawan_edit").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/cek_nama_karyawan_input",
            dataType: "JSON",
            data: {nama_karyawan_input:nama_karyawan_edit},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, karyawan dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    reload();
                }
            }
        });

        ecek_terisi();
    }
</script>

<!-- cek nik karyawan edit -->
<script>
    function cek_nik_karyawan_edit(){
        var nik_edit = $("#nik_edit").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/cek_nik_input",
            dataType: "JSON",
            data: {nik_input:nik_edit},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, karyawan dengan NIK tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    reload();
                }
            }
        });

        ecek_terisi();
    }
</script>

<!-- cek email edit-->
<script>
    function cek_email_edit(){
        var email_user_edit = $("#email_user_edit").val();

        $.ajax({
                type:"post",
                url:"<?php echo base_url() ?>karyawan/cek_email_input",
                dataType: "JSON",
                data: {email_user_input:email_user_edit},

                success: function(respond){
                    if(respond['res'] == 1){
                        alert("Mohon maaf, email tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                        reload();
                    }
                }
            });

        ecek_terisi();
    }
</script>

<!-- ganti dp edit-->
<script>
    function eganti_dp(){
        var id_departemen = $("#edepartemen").val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/get_spesifikasi_jabatan",
            dataType: "JSON",
            data: {id_departemen:id_departemen},

            success: function(respond){
                $jumlah_sjabatan = respond['jumlah_sjabatan'];

                $tampung_sjabatan = "";
                $tampung_nama_jabatan = "";
                for($i=0;$i<$jumlah_sjabatan;$i++){
                    $id_sjabatan   = respond['sjabatan'][$i]['id_spesifikasi_jabatan'];
                    $nama_jabatan  = respond['sjabatan'][$i]['nama_jabatan'];

                    $tampung_sjabatan = $tampung_sjabatan + 
                    '<option value="'+$id_sjabatan+'">'+
                        $nama_jabatan+
                    '</option>';

                    $tampung_nama_jabatan = $tampung_nama_jabatan +
                    '<input type="hidden" id="enm_jb'+$id_sjabatan+'" value="'+$nama_jabatan+'">';
                }

                $isi = '<select class="form-control" name="ejabatan" id="ejabatan">'+
                            '<option value="Nama Jabatan">Nama Jabatan</option>'+
                            $tampung_sjabatan+
                        '</select>'+
                        $tampung_nama_jabatan;
                $("#eganti_jb").html($isi);
            }
        }); 
    }
</script>

<!-- add spesifikasi jabatan edit -->
<script>
    function eadd_sj(){
        $id_departemen = $("#edepartemen").val();
        $id_jabatan    = $("#ejabatan").val();

        if($id_departemen != "Nama Departemen" && $id_jabatan != "Nama Jabatan"){
            $nama_jab  =  $("#enm_jb"+$id_jabatan).val();
            $nama_dept =  $("#enm_dp"+$id_departemen).val();

            $jumlah_sj = $("#ejumlah_sj").val();

            if($jumlah_sj == ""){
                $jumlah_saat_ini_ = $jumlah_sj + 1;
                $jumlah_saat_ini  = $jumlah_saat_ini_.length;

                $isinya =
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_saat_ini+
                            '<input type="hidden" id="stat'+( $jumlah_saat_ini)+'" name="stat'+( $jumlah_saat_ini)+'" value="1">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="eiddp'+$jumlah_saat_ini+'" id="eiddp'+$jumlah_saat_ini+'" value="'+$id_departemen+'">'+
                            '<input type="hidden" name="enmdp'+$jumlah_saat_ini+'" id="enmdp'+$jumlah_saat_ini+'" value="'+$nama_dept+'">'+
                            $nama_dept+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="eidjb'+$jumlah_saat_ini+'"  id="eidjb'+$jumlah_saat_ini+'" value="'+$id_jabatan+'">'+
                            '<input type="hidden" name="enmjb'+$jumlah_saat_ini+'"  id="enmjb'+$jumlah_saat_ini+'" value="'+$nama_jab+'">'+
                            $nama_jab+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="checkbox" id="del'+$jumlah_saat_ini+'" name="del'+$jumlah_saat_ini+'" onclick="hapus_spekjab()"> hapus'+
                        '</td>'+
                    '</tr>';
                
                $("#ejumlah_sj").val($jumlah_saat_ini_);
            }
            else{
                $hitung = 0;
                for($i=1;$i<=$jumlah_sj.length;$i++){  
                    if(($("#eiddp"+$i).val() == $id_departemen) && ($("#eidjb"+$i).val() == $id_jabatan)){
                       $hitung++;
                    }
                }

                if($hitung == 0){
                    $lama = "";

                    for($i=1;$i<=$jumlah_sj.length;$i++){
                        $tampung_iddp   = $("#eiddp"+$i).val();
                        $tampung_nmdp   = $("#enmdp"+$i).val();
                        $tampung_idjb   = $("#eidjb"+$i).val();
                        $tampung_nmjb   = $("#enmjb"+$i).val();
                        $stat          = $("#stat"+$i).val();
                
                        if($("#del"+$i).prop("checked") == false){
                            $cb = '<input type="checkbox" id="del'+$i+'" name="del'+$i+'" onclick="hapus_spekjab()"> hapus';
                        } else{
                            $cb = '<input type="checkbox" id="del'+$i+'" name="del'+$i+'" onclick="hapus_spekjab()" checked> hapus';
                        }

                        if($stat == 0){
                            $lama = $lama + 
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $i+
                                    '<input type="hidden" id="stat'+($i)+'" name="stat'+($i)+'" value="0">'+
                                    '<input type="hidden" id="idjabkar'+($i)+'" name="idjabkar'+($i)+'" value="'+ $("#idjabkar"+$i).val()+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="eiddp'+$i+'" id="eiddp'+$i+'" value="'+$tampung_iddp+'">'+
                                    '<input type="hidden" name="enmdp'+$i+'" id="enmdp'+$i+'" value="'+$tampung_nmdp+'">'+
                                    $tampung_nmdp+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="eidjb'+$i+'"  id="eidjb'+$i+'" value="'+$tampung_idjb+'">'+
                                    '<input type="hidden" name="enmjb'+$i+'"  id="enmjb'+$i+'" value="'+$tampung_nmjb+'">'+
                                    $tampung_nmjb+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $cb+
                                '</td>'+
                            '</tr>';
                        } else{
                            $lama = $lama + 
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $i+
                                    '<input type="hidden" id="stat'+($i)+'" name="stat'+($i)+'" value="1">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="eiddp'+$i+'" id="eiddp'+$i+'" value="'+$tampung_iddp+'">'+
                                    '<input type="hidden" name="enmdp'+$i+'" id="enmdp'+$i+'" value="'+$tampung_nmdp+'">'+
                                    $tampung_nmdp+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="eidjb'+$i+'"  id="eidjb'+$i+'" value="'+$tampung_idjb+'">'+
                                    '<input type="hidden" name="enmjb'+$i+'"  id="enmjb'+$i+'" value="'+$tampung_nmjb+'">'+
                                    $tampung_nmjb+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $cb+
                                '</td>'+
                            '</tr>';
                        }
                        
                    }

                    $jumlah_saat_ini_ = $jumlah_sj + 1;
                    $jumlah_saat_ini  = $jumlah_saat_ini_.length;

                    $isinya = $lama+
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_saat_ini+
                            '<input type="hidden" id="stat'+($i)+'" name="stat'+($i)+'" value="1">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="eiddp'+$jumlah_saat_ini+'" id="eiddp'+$jumlah_saat_ini+'" value="'+$id_departemen+'">'+
                            '<input type="hidden" name="enmdp'+$jumlah_saat_ini+'" id="enmdp'+$jumlah_saat_ini+'" value="'+$nama_dept+'">'+
                            $nama_dept+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="eidjb'+$jumlah_saat_ini+'"  id="eidjb'+$jumlah_saat_ini+'" value="'+$id_jabatan+'">'+
                            '<input type="hidden" name="enmjb'+$jumlah_saat_ini+'"  id="enmjb'+$jumlah_saat_ini+'" value="'+$nama_jab+'">'+
                            $nama_jab+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="checkbox" id="del'+$jumlah_saat_ini+'" name="del'+$jumlah_saat_ini+'" onclick="hapus_spekjab()"> hapus'+
                            '</td>'+
                    '</tr>';

                    $("#ejumlah_sj").val($jumlah_saat_ini_);
                }
                else{
                    alert("Mohon maaf jabatan pada departemen tersebut tidak dapat di daftarkan lagi karena sudah terdaftar");
                }
            }

            $tampung_sjabatan =   
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Departemen</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Jabatan</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Aksi</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isinya+
                    '</tbody>'+
                '</table>';

                $("#etable_sjabatan").html($tampung_sjabatan);   
                ecek_jabatan();  
        }
        else{
            alert("Silahkan pilih departemen dan jabatan terlebih dahulu");
        }
    }
</script>

<!-- cek jabatan apakah memilih akses/tidak  (edit)-->
<script>
    function ecek_jabatan(){
        $jumlah_sj_ = $("#ejumlah_sj").val();
        $jumlah_sj  = $jumlah_sj_.length;

        $count = 0;
        for($i=1;$i<=$jumlah_sj;$i++){
            $tam_departemen = $("#enmdp"+$i).val();
            $tam_jabatan    = $("#enmjb"+$i).val();

            if(($tam_departemen == "Management" && $tam_jabatan == "Direktur" || $tam_departemen == "Management" && $tam_jabatan == "Manager" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "Admin" || $tam_departemen == "Purchasing" && $tam_jabatan == "Admin" || 
            $tam_departemen == "Research & Development" && $tam_jabatan == "Admin" || $tam_departemen == "Finish Good" && $tam_jabatan == "Admin" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "PPIC" || $tam_departemen == "Material" && $tam_jabatan == "PPIC" ||
            $tam_departemen == "Material" && $tam_jabatan == "Operator Gudang" || $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Cutting" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Bonding" || $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Sewing" ||
            $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Assy") && $("#del"+$i).prop("checked") == false ){
                $count++;
            }
        }

        if($count > 0){
            $("#keterangan_edit_sesudah").val(1);
            $("#status_karyawan_edit").val("Memiliki Akses");
        }
        else{
            $("#keterangan_edit_sesudah").val(0);
            $("#status_karyawan_edit").val("Tidak Memiliki Akses");
        }

        if($("#keterangan_edit_sebelum").val() == 0 && $("#keterangan_edit_sesudah").val() == 1){
            $("#ediv_user").show();
        } else{
            $("#ediv_user").hide();
        }
        ecek_terisi();
    }
</script>

<!-- hapus spekjab -->
<script>
    function hapus_spekjab(){
        ecek_jabatan();
        ecek_terisi();
    }
</script>

<!-- cek terisi (edit) -->
<script>
    function ecek_terisi(){
        $nik_karyawan  = $("#nik_karyawan_edit").val();
        $nama_karyawan = $("#nama_karyawan_edit").val();
        $jumlah_sj     = $("#ejumlah_sj").val();
        $keterangan    = $("#keterangan_edit_sesudah").val();

        $jumlah_sj_ = $jumlah_sj.length;

        $hitung_hapus = 0;
        $status_spekjab = 0;

        for($i=1;$i<=$jumlah_sj;$i++){
            if($("#del"+$i).prop("checked") == true){
                $hitung_hapus++;
            }
        }

        if($hitung_hapus >= $jumlah_sj_){
            $status_spekjab = 1;
        } else{
            $status_spekjab = 0;
        }

        if($keterangan == 1){
            //kalau punya akses, cek field email & password
            $email = $("#email_user_edit").val();
            $password = $("#password_user_edit").val();
        
            if($("#keterangan_edit_sesudah").val() == 1 && $("#keterangan_edit_sebelum").val() == 0){
                if($status_spekjab == 0 && $email != "" && $password.length >= 8 && $password.length <= 50){
                    $("#ebutton_simpan").prop('disabled',false);
                }
                else{
                    $("#ebutton_simpan").prop('disabled',true);
                }
            } else if($("#keterangan_edit_sesudah").val() == 1 && $("#keterangan_edit_sebelum").val() == 1){
                if($status_spekjab == 0){
                    $("#ebutton_simpan").prop('disabled',false);
                }
                else{
                    $("#ebutton_simpan").prop('disabled',true);
                }
            }
            
        }
        else if($keterangan == 0){
            //kalau tidak punya akses
    
            if($status_spekjab == 0 ){
                $("#ebutton_simpan").prop('disabled',false);
            }
            else{
                $("#ebutton_simpan").prop('disabled',true);
            }
        }
    }
</script>

<!-- log -->
<script>
    $('.blog_klik').click(function(){
        var id = $(('#blog')+$(this).attr('value')).val();
        $('#id_terpilih').val(id);

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>karyawan/ambil_data_log",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#input_date").html(respond['input_date']);
                $("#input_user").html(respond['input_user']);

                $jumlah_log  = respond['jumlah_log'];
                $jumlah_user = respond['jumlah_user'];

                $tampung_isi =" ";
                
                for($i=0;$i<$jumlah_log;$i++){
                    
                    if(respond['log'][$i]['keterangan_log'] == "Insert Data"){
                        
                        for($j=0;$j<$jumlah_user;$j++){
                            if(respond['log'][$i]['user_add'] == respond['user'][$j]['id_user']){
                                $nama_user       = respond['user'][$j]['nama_karyawan'];
                            }
                        } 

                        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                        var tanggal = new Date(respond['log'][$i]['waktu_add']).getDate();
                        var xhari = new Date(respond['log'][$i]['waktu_add']).getDay();
                        var xbulan = new Date(respond['log'][$i]['waktu_add']).getMonth();
                        var xtahun = new Date(respond['log'][$i]['waktu_add']).getYear();
                        
                        var jam     = new Date(respond['log'][$i]['waktu_add']).getHours();
                        var menit   = new Date(respond['log'][$i]['waktu_add']).getMinutes();
                        var detik   = new Date(respond['log'][$i]['waktu_add']).getSeconds();
                        
                        var hari = hari[xhari];
                        var bulan = bulan[xbulan];
                        var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                        $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun +' '+jam+':'+menit+':'+detik;

                        $tanggal = $tanggalnya;

                        $user    = $nama_user;

                        if(respond['log'][$i]['keterangan'] == 0){
                            $statkar = "Tidak Memiliki Akses";
                        } else{
                            $statkar = "Memiliki Akses";
                        }

                        $data = "NIK (" + respond['log'][$i]['nik'] +
                        ") , Nama Karyawan (" + respond['log'][$i]['nama_karyawan'] + 
                        ") , Status Karyawan (" + $statkar + ")";

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ $tanggal +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ $user +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td style="vertical-align: middle;">'+ $data +'</td>' +
                        '</tr>'
                    }
                    
                    else{
                        for($j=0;$j<$jumlah_user;$j++){
                            if(respond['log'][$i]['user_edit'] == respond['user'][$j]['id_user']){
                                $nama_user       = respond['user'][$j]['nama_karyawan'];
                            }
                        } 
                        
                        $user = $nama_user;
            
                        //compare dengan sebelumnya
                        $data = " ";
                        $count = 0;

                        if(respond['log'][$i]['nik'] == respond['log'][$i+1]['nik']){
                           $data = $data;
                        }
                        else{
                            $data = "NIK (" + respond['log'][$i]['nik'] + ")";
                            $count++;
                        }

                        if(respond['log'][$i]['nama_karyawan'] == respond['log'][$i+1]['nama_karyawan']){
                           $data = $data;
                        }
                        else{
                            if($count == 0){
                                $data =  "Nama Karyawan (" + respond['log'][$i]['nama_karyawan'] + ")";
                            }
                            else{
                                $data =  $data + ", "+ "Nama Karyawan (" + respond['log'][$i]['nama_karyawan'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['keterangan'] == respond['log'][$i+1]['keterangan']){
                           $data = $data;
                        }
                        else{
                            if(respond['log'][$i]['keterangan'] == 0){
                                $statnya = "Tidak Memiliki Akses";
                            } else{
                                $statnya = "Memiliki Akses";
                            }

                            if($count == 0){
                                $data =  "Nama Karyawan (" + $statnya + ")";
                            }
                            else{
                                $data =  $data + ", "+ "Nama Karyawan (" + $statnya + ")";
                            }
                            $count++;
                        }

                        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                        var tanggal = new Date(respond['log'][$i]['waktu_edit']).getDate();
                        var xhari = new Date(respond['log'][$i]['waktu_edit']).getDay();
                        var xbulan = new Date(respond['log'][$i]['waktu_edit']).getMonth();
                        var xtahun = new Date(respond['log'][$i]['waktu_edit']).getYear();
                        
                        var jam     = new Date(respond['log'][$i]['waktu_edit']).getHours();
                        var menit   = new Date(respond['log'][$i]['waktu_edit']).getMinutes();
                        var detik   = new Date(respond['log'][$i]['waktu_edit']).getSeconds();
                        
                        var hari = hari[xhari];
                        var bulan = bulan[xbulan];
                        var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                        $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun +' '+jam+':'+menit+':'+detik;

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ $tanggalnya +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ $user +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td style="vertical-align: middle;">'+ $data +'</td>' +
                        '</tr>'

                    }
                    
                }

                $isi = '<br><br>'+
                '<table class="table table-bordered table-striped mb-none" ' +
                'id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-lg-2"><center>Tanggal</center></th>'+
                            '<th class="col-lg-3"><center>User</center></th>'+
                            '<th class="col-lg-1"><center>Aksi</center></th>'+
                            '<th class="col-lg-6"><center>Data</center></th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $tampung_isi +
                    '</tbody>' +
                '</table>';

                $("#isi_log").html($isi);
                
                $("#modallog").modal();
            }
        });

    });
</script>



    