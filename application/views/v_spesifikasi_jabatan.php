<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Spesifikasi Jabatan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Spesifikasi Jabatan</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <a class="modal-with-form col-lg-3  btn btn-success" id="button_tambah" 
            href="#modaltambah">+ Spesifikasi Jabatan</a>
        <br><br>

        <header class="panel-heading">
            <h2 class="panel-title">Data Spesifikasi Jabatan</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Departemen</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Jabatan</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($spesifikasi_jabatan as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_departemen; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_jabatan; ?></td>
                            <td  class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaledit<?= $x->id_spesifikasi_jabatan;?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?= $x->id_spesifikasi_jabatan;?>"></a>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                id="blog<?php echo $x->id_spesifikasi_jabatan?>" value="<?php echo $x->id_spesifikasi_jabatan;?>"></button>
                            </td>
                        </tr>
    
    <div id='modaledit<?= $x->id_spesifikasi_jabatan;?>' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>spesifikasiJabatan/edit_spesifikasi_jabatan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Spesifikasi Jabatan</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_spesifikasi_jabatan" class="form-control"
                    value="<?= $x->id_spesifikasi_jabatan?>" required>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Departemen</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="departemen_edit" id="departemen_edit"  onchange="cek_edit()">
                                <option>Pilih Departemen</option>
                                <?php foreach($departemen as $dp){
                                    if($dp->id_departemen == $x->id_departemen){?>
                                        <option value="<?= $dp->id_departemen?>" selected><?= $dp->nama_departemen?></option>
                                    <?php } else{?>
                                    <option value="<?= $dp->id_departemen?>"><?= $dp->nama_departemen?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jabatan</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="jabatan_edit" id="jabatan_edit"  onchange="cek_edit()">
                                <option>Pilih Jabatan</option>
                                <?php foreach($jabatan as $jb){
                                    if($jb->id_jabatan == $x->id_jabatan){?>
                                        <option value="<?= $jb->id_jabatan?>" selected><?= $jb->nama_jabatan?></option>
                                    <?php } else{?>
                                    <option value="<?= $jb->id_jabatan?>"><?= $jb->nama_jabatan?></option>
                                <?php }} ?>
                            </select>
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

    <div id="modalhapus<?= $x->id_spesifikasi_jabatan;?>" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>spesifikasiJabatan/delete_spesifikasi_jabatan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Spesifikasi Jabatan</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <input type="hidden" name="id_spesifikasi_jabatan" value="<?= $x->id_spesifikasi_jabatan;?>">
                                <p>Apakah anda yakin akan menghapus data spesifikasi jabatan ini?</p>
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
        <form method="POST" action="<?= base_url()?>spesifikasiJabatan/tambah_spesifikasi_jabatan"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Spesifikasi Jabatan</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Departemen</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="departemen_input" id="departemen_input"  onchange="cek_input()">
                                <option>Pilih Departemen</option>
                                <?php foreach($departemen as $dp){?>
                                    <option value="<?= $dp->id_departemen?>"><?= $dp->nama_departemen?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jabatan</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="jabatan_input" id="jabatan_input"  onchange="cek_input()">
                                <option>Pilih Jabatan</option>
                                <?php foreach($jabatan as $jb){?>
                                    <option value="<?= $jb->id_jabatan?>"><?= $jb->nama_jabatan?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Simpan">
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
                    <h4 class="modal-title">Log Jabatan</h4>
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
    function cek_input(){
        var id_departemen_input = $("#departemen_input").val();
        var id_jabatan_input    = $("#jabatan_input").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>spesifikasiJabatan/cek_input",
            dataType: "JSON",
            data: {id_departemen_input:id_departemen_input,id_jabatan_input:id_jabatan_input},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, jabatan dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });
    }
</script>

<script>
    function cek_edit(){
        var id_departemen_edit = $("#departemen_edit").val();
        var id_jabatan_edit    = $("#jabatan_edit").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>spesifikasiJabatan/cek_edit",
            dataType: "JSON",
            data: {id_departemen_edit:id_departemen_edit,id_jabatan_edit:id_jabatan_edit},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, jabatan dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });
    }
</script>

<script>
    $('.blog_klik').click(function(){
        var id = $(('#blog')+$(this).attr('value')).val();
        $('#id_terpilih').val(id);

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>spesifikasiJabatan/ambil_data_log",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                //alert(respond['id_user']);
            /*
                $("#input_date").html(respond['input_date']);
                $("#input_user").html(respond['input_user']);

          
                $jumlah_log  = respond['jumlah_log'];
                $jumlah_user = respond['jumlah_user'];

                $tampung_isi =" ";
 
                for($i=0;$i<$jumlah_log;$i++){
                    if(respond['log'][$i]['keterangan_log'] == "Insert Data"){
                        
                        for($j=0;$j<$jumlah_user;$j++){
                            if(respond['log'][$i]['user_add'] == respond['user'][$j]['id_user']){
                                $nama_user       = respond['user'][$j]['nama_user'];
                                $jabatan_user    = respond['user'][$j]['nama_jabatan'];
                                $departemen_user = respond['user'][$j]['nama_departemen'];
                            }
                        } 

                        $tanggal = respond['log'][$i]['waktu_add'];
                        $user = " "+$nama_user +" ("+ $departemen_user + "-"+ $jabatan_user+")";
                        $data = "Nama Jabatan (" + respond['log'][$i]['nama_jabatan'] + ") ";

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
                                $nama_user       = respond['user'][$j]['nama_user'];
                                $jabatan_user    = respond['user'][$j]['nama_jabatan'];
                                $departemen_user = respond['user'][$j]['nama_departemen'];
                            }
                        } 
                        
                        $user = " "+$nama_user +" ("+ $departemen_user + "-"+ $jabatan_user+")";
            
                        //compare dengan sebelumnya
                        if(respond['log'][$i]['nama_jabatan'] == respond['log'][$i+1]['nama_jabatan']){
                           $data =" ";
                        }
                        else{
                            $data = "Nama Jabatan (" + respond['log'][$i]['nama_jabatan'] + ")";
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
            */
                alert(respond['input_user']);
            }
        });

    });
</script>



    