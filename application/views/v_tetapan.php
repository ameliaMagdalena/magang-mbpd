<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Tetapan</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Tetapan</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
            href="#modaltambah">+ Tetapan</a>
        <br><br>

        <header class="panel-heading">
            <h2 class="panel-title">Data Tetapan</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Tetapan</th>
                        <th style="text-align: center;vertical-align: middle;">Isi Tetapan</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($tetapan as $x){ 

                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_tetapan; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php 
                                    if($x->nama_tetapan == "Processing Time"){
                                        echo $x->isi_tetapan." Jam";
                                    }
                                    else{
                                        echo $x->isi_tetapan;
                                    }
                                ?>
                            </td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?= $x->id_tetapan;?>"></a>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                title="Log" id="blog<?php echo $x->id_tetapan?>" value="<?php echo $x->id_tetapan;?>"></button>
                            </td>
                        </tr>
                    <?php 
                    $no++;
                    ?>


    
    <div id='modaledit<?= $x->id_tetapan;?>' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>tetapan/edit_tetapan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Tetapan</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_tetapan" class="form-control"
                            value="<?= $x->id_tetapan?>" required>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Tetapan</label>
                    <div class="col-sm-7">
                            <input type="text" name="nama_tetapan" class="form-control"
                            value="<?= $x->nama_tetapan?>" required readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">
                            <?php
                                if($x->nama_tetapan == "Processing Time"){
                                    echo "Isi Tetapan (Jam)";
                                }
                                else{
                                    echo "Isi Tetapan";
                                }
                            ?>
                        </label>
                        <div class="col-sm-7">
                            <?php if($x->nama_tetapan == "Processing Time"){?>
                                <input type="number" name="isi_tetapan_pt" class="form-control" value="<?= $x->isi_tetapan?>">
                            <?php } else if($x->nama_tetapan == "Senin" || $x->nama_tetapan == "Selasa" || $x->nama_tetapan == "Rabu" || 
                            $x->nama_tetapan == "Kamis" || $x->nama_tetapan == "Jumat" || $x->nama_tetapan == "Sabtu" || 
                            $x->nama_tetapan == "Minggu"){?>
                                <select class="form-control" name="isi_tetapan_lain">
                                    <?php if($x->isi_tetapan == "Hari Produksi"){?>
                                        <option value="Hari Produksi" selected>Hari Produksi</option>
                                    <?php } else{?>
                                        <option value="Hari Produksi">Hari Produksi</option>
                                    <?php } ?>

                                    <?php if($x->isi_tetapan == "Hari Libur"){?>
                                        <option value="Hari Libur" selected>Hari Libur</option>
                                    <?php } else{?>
                                        <option value="Hari Libur">Hari Libur</option>
                                    <?php } ?>
                                </select>
                            <?php } else{?>
                                <input type="text" name="isi_tetapan_lain" class="form-control" value="<?= $x->isi_tetapan?>">
                            <?php } ?>
                            
                            <!--
                                <input type="number" 
                                <?php if($x->nama_tetapan == "Processing time"){?>
                                type="number"
                                <?php } else{?>
                                type="text"
                                <?php }?>
                                name="isi_tetapan" class="form-control"
                                value="<?= $x->isi_tetapan?>" required>
                            -->
                          
                            <!--
                                <input type="text" name="isi_tetapan" class="form-control"
                                value="<?= $x->isi_tetapan?>" required>
                            -->
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

                    <?php
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>tetapan/tambah_tetapan"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Tetapan</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Tetapan</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_tetapan" id="nama_tetapan" required class="form-control"
                            onchange="cek_nama_tetapan()">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Isi Tetapan</label>
                        <div class="col-sm-7">
                            <input type="text" name="isi_tetapan" id="isi_tetapan" required class="form-control">
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
                    <h4 class="modal-title">Log Tetapan</h4>
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
    function cek_nama_tetapan(){
        var nama_tetapan = $("#nama_tetapan").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>tetapan/cek_nama_tetapan",
            dataType: "JSON",
            data: {nama_tetapan:nama_tetapan},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, tetapan dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
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
            url:"<?php echo base_url() ?>tetapan/ambil_data_log",
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
                        if(respond['log'][$i]['isi_tetapan'] == respond['log'][$i+1]['isi_tetapan']){
                           $data =" ";
                        }
                        else{
                            $data = "Isi Tetapan (" + respond['log'][$i]['isi_tetapan'] + ")";
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



    