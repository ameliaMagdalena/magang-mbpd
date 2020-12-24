<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Jenis Produk</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Jenis Produk</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
            href="#modaltambah">+ Jenis Produk</a>
        <br><br>

        <header class="panel-heading">
            <h2 class="panel-title">Data Jenis Produk</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Jenis Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($jenis_produk as $x){ 

                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_jenis_produk; ?></td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?= $x->id_jenis_produk;?>" style="margin-right:5px;margin-bottom:5px"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?= $x->id_jenis_produk;?>" style="margin-right:5px;margin-bottom:5px"></a>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                title="Log" id="blog<?php echo $x->id_jenis_produk;?>" value="<?php echo $x->id_jenis_produk;?>" style="margin-right:5px;margin-bottom:5px"></button>
                            </td>
                        </tr>
                    <?php 
                    $no++;
                    ?>


    
    <div id='modaledit<?= $x->id_jenis_produk;?>' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>jenisProduk/edit_jenis_produk">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Jenis Produk</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_jenis_produk" class="form-control"
                            value="<?= $x->id_jenis_produk?>" required>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Jenis Produk</label>
                    <div class="col-sm-7">
                            <input type="text" name="nama_jenis_produk_edit" id="nama_jenis_produk_edit" class="form-control"
                            onchange="cek_nama_jenis_produk_edit()" value="<?= $x->nama_jenis_produk?>" required>
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

    <div id="modalhapus<?= $x->id_jenis_produk;?>" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>jenisProduk/delete_jenis_produk">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Jenis Produk</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <input type="hidden" name="id_jenis_produk" value="<?= $x->id_jenis_produk;?>">
                                <p>Apakah anda yakin akan menghapus data jenis produk dengan nama jenis produk <?= $x->nama_jenis_produk?>?</p>
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
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>jenisProduk/tambah_jenis_produk"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Jenis Produk</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Jenis Produk</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_jenis_produk_tambah" id="nama_jenis_produk_tambah" required class="form-control"
                            onchange="cek_nama_jenis_produk_tambah()">
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
                    <h4 class="modal-title">Log Jenis Produk</h4>
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
    function cek_nama_jenis_produk_tambah(){
        var nama_jenis_produk_tambah = $("#nama_jenis_produk_tambah").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>jenisProduk/cek_nama_jenis_produk_tambah",
            dataType: "JSON",
            data: {nama_jenis_produk_tambah:nama_jenis_produk_tambah},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, nama jenis produk dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });
    }
</script>

<script>
    function cek_nama_jenis_produk_edit(){
        var nama_jenis_produk_edit = $("#nama_jenis_produk_edit").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>jenisProduk/cek_nama_jenis_produk_edit",
            dataType: "JSON",
            data: {nama_jenis_produk_edit:nama_jenis_produk_edit},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, nama jenis produk dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
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
            url:"<?php echo base_url() ?>jenisProduk/ambil_data_log",
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

                        $user = $nama_user;
                        $data = "Nama Jenis Produk (" + respond['log'][$i]['nama_jenis_produk'] + ") ";

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+ $tanggal +'</td>' +
                        '<td  style="text-align: center;vertical-align: middle;">'+ $user +'</td>' +
                        '<td  style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td  style="vertical-align: middle;">'+ $data +'</td>' +
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
                        if(respond['log'][$i]['nama_jenis_produk'] == respond['log'][$i+1]['nama_jenis_produk']){
                           $data =" ";
                        }
                        else{
                            $data = "Nama Jenis Produk (" + respond['log'][$i]['nama_jenis_produk'] + ")";
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
                        '<td  style="text-align: center;vertical-align: middle;">'+ $tanggalnya +'</td>' +
                        '<td  style="text-align: center;vertical-align: middle;">'+ $user +'</td>' +
                        '<td  style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td  style="vertical-align: middle;">'+ $data +'</td>' +
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



    