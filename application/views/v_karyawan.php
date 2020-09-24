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
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaledit<?= $x->id_karyawan;?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaledit<?= $x->id_karyawan;?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?= $x->id_karyawan;?>"></a>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                id="blog<?php echo $x->id_karyawan?>" value="<?php echo $x->id_karyawan;?>"></button>
                            </td>
                        </tr>

    <div id='modaledit<?= $x->id_karyawan;?>' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>karyawan/edit_karyawan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Departemen</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_karyawan" class="form-control"
                    value="<?= $x->id_karyawan?>" required>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Departemen</label>
                    <div class="col-sm-7">
                            <input type="text" name="nama_departemen_edit" id="nama_departemen_edit" class="form-control"
                            onchange="cek_nama_departemen_edit()" value="<?= $x->nama_karyawan?>" required>
                        </div>
                    </div>
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

    <div id="modalhapus<?= $x->id_karyawan;?>" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>karyawan/delete_karyawan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Departemen</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <input type="hidden" name="id_karyawan" value="<?= $x->id_karyawan;?>">
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

    <div class="modal" id="modallog" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Departemen</h4>
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

<script>
    function cek_nama_departemen_edit(){
        var nama_departemen_edit = $("#nama_departemen_edit").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>departemen/cek_nama_departemen_edit",
            dataType: "JSON",
            data: {nama_departemen_edit:nama_departemen_edit},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, departemen dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });
    }
</script>

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

<script>
    $('.blog_klik').click(function(){
        var id = $(('#blog')+$(this).attr('value')).val();
        $('#id_terpilih').val(id);

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>departemen/ambil_data_log",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                //alert(respond['id_user']);
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

                        $tanggal = respond['log'][$i]['waktu_add'];
                        $user = $nama_user;
                        $data = "Nama Departemen (" + respond['log'][$i]['nama_departemen'] + ") ";

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
                        if(respond['log'][$i]['nama_departemen'] == respond['log'][$i+1]['nama_departemen']){
                           $data =" ";
                        }
                        else{
                            $data = "Nama Departemen (" + respond['log'][$i]['nama_departemen'] + ")";
                        }

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['waktu_edit'] +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ $user +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td style="vertical-align: middle;">'+ $data +'</td>' +
                        '</tr>';

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
            
            
            //alert(respond['jumlah_sjabatan']);
            }
        }); 
    }
</script>

<!-- add sj -->
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
            $tam_departemen == "Produksi" && $tam_jabatan == "PIC Line Assy" ){
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



    