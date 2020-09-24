<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Bank</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Bank</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
            href="#modaltambah">+ Bank</a>
        <br><br>

        <header class="panel-heading">
            <h2 class="panel-title">Data Bank</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Bank</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($bank as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_bank; ?></td>
                            <td  class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaledit<?= $x->id_bank;?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?= $x->id_bank;?>"></a>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                id="blog<?php echo $x->id_bank?>" value="<?php echo $x->id_bank;?>"></button>
                            </td>
                        </tr>
    
    <div id='modaledit<?= $x->id_bank;?>' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>bank/edit_bank">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Bank</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_bank" class="form-control"
                    value="<?= $x->id_bank?>" required>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Bank</label>
                    <div class="col-sm-7">
                            <input type="text" name="nama_bank_edit" id="nama_bank_edit" class="form-control"
                            onchange="cek_nama_bank_edit()" value="<?= $x->nama_bank?>" required>
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

    <div id="modalhapus<?= $x->id_bank;?>" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>bank/delete_bank">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Bank</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <input type="hidden" name="id_bank" value="<?= $x->id_bank;?>">
                                <p>Apakah anda yakin akan menghapus data bank dengan nama bank <?= $x->nama_bank?>?</p>
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
        <form method="POST" action="<?= base_url()?>bank/tambah_bank"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Bank</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Bank</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_bank_input" id="nama_bank_input" 
                            onchange="cek_nama_bank_input()" required class="form-control">
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
                    <h4 class="modal-title">Log Bank</h4>
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
    function cek_nama_bank_input(){
        var nama_bank_input = $("#nama_bank_input").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bank/cek_nama_bank_input",
            dataType: "JSON",
            data: {nama_bank_input:nama_bank_input},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, bank dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });
    }
</script>

<script>
    function cek_nama_bank_edit(){
        var nama_bank_edit = $("#nama_bank_edit").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bank/cek_nama_bank_edit",
            dataType: "JSON",
            data: {nama_bank_edit:nama_bank_edit},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, bank dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
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
            url:"<?php echo base_url() ?>bank/ambil_data_log",
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

                        $tanggal = respond['log'][$i]['waktu_add'];
                        $user = $nama_user;
                        $data = "Nama Bank (" + respond['log'][$i]['nama_bank'] + ") ";

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
                        if(respond['log'][$i]['nama_bank'] == respond['log'][$i+1]['nama_bank']){
                           $data =" ";
                        }
                        else{
                            $data = "Nama Bank (" + respond['log'][$i]['nama_bank'] + ")";
                        }

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['waktu_edit'] +'</td>' +
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



    