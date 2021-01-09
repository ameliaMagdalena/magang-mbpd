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
                                title="Edit" href="#modaledit<?= $x->id_tetapan;?>" style="margin-right:5px;margin-bottom:5px"></a>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                title="Log" id="blog<?php echo $x->id_tetapan?>" value="<?php echo $x->id_tetapan;?>" style="margin-right:5px;margin-bottom:5px"></button>
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
                                                <?php if($x->nama_tetapan == "Processing time"){?>
                                                    <input type="number" name="isi_tetapan_pt" class="form-control" value="<?= $x->isi_tetapan?>" required>
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
                                                    <input type="text" name="isi_tetapan_lain" class="form-control" value="<?= $x->isi_tetapan?>" required>
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
                            <?php 
                                $count = 0;
                                foreach($tetapan as $x){
                                    if($x->nama_tetapan == "Nama Perusahaan"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Rabu"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Kamis"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Jumat"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Sabtu"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Minggu"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Bidang Usaha"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Kota Perusahaan"){
                                        $count++;
                                    } else if($x->nama_tetapan == "E-mail Perusahaan"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Alamat Perusahaan"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Phone/Fax"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Website"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Processing time"){
                                        $count++;
                                    } else if($x->nama_tetapan == "PPN"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Senin"){
                                        $count++;
                                    } else if($x->nama_tetapan == "Selasa"){
                                        $count++;
                                    }
                                }

                                if($count < 16){
                                  
                            ?>
                                
                                <select class="form-control" name="nama_tetapan_wajib" required>
                                    <!-- 1. Nama Perusahaan -->
                                        <?php 
                                            $count1 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Nama Perusahaan"){
                                                    $count1++;
                                                }
                                            }

                                            if($count1 == 0){
                                        ?>
                                                <option value="Nama Perusahaan">Nama Perusahaan</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 2. Rabu -->
                                        <?php 
                                            $count2 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Rabu"){
                                                    $count2++;
                                                }
                                            }

                                            if($count2 == 0){
                                        ?>
                                                <option value="Rabu">Rabu</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 3. Kamis -->
                                        <?php 
                                            $count3 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Kamis"){
                                                    $count3++;
                                                }
                                            }

                                            if($count3 == 0){
                                        ?>
                                                <option value="Kamis">Kamis</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 4. Jumat -->
                                        <?php 
                                            $count4 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Jumat"){
                                                    $count4++;
                                                }
                                            }

                                            if($count4 == 0){
                                        ?>
                                                <option value="Jumat">Jumat</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 5. Sabtu -->
                                        <?php 
                                            $count5 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Sabtu"){
                                                    $count5++;
                                                }
                                            }

                                            if($count5 == 0){
                                        ?>
                                                <option value="Sabtu">Sabtu</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 6. Minggu -->
                                        <?php 
                                            $count6 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Minggu"){
                                                    $count6++;
                                                }
                                            }

                                            if($count6 == 0){
                                        ?>
                                                <option value="Minggu">Minggu</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 7. Bidang Usaha -->
                                        <?php 
                                            $count7 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Bidang Usaha"){
                                                    $count7++;
                                                }
                                            }

                                            if($count7 == 0){
                                        ?>
                                                <option value="Bidang Usaha">Bidang Usaha</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 8. Kota Perusahaan -->
                                        <?php 
                                            $count8 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Kota Perusahaan"){
                                                    $count8++;
                                                }
                                            }

                                            if($count8 == 0){
                                        ?>
                                                <option value="Kota Perusahaan">Kota Perusahaan</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 9. E-mail Perusahaan -->
                                        <?php 
                                            $count9 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "E-mail Perusahaan"){
                                                    $count9++;
                                                }
                                            }

                                            if($count9 == 0){
                                        ?>
                                                <option value="E-mail Perusahaan">E-mail Perusahaan</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 10. Alamat Perusahaan -->
                                        <?php 
                                            $count10 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Alamat Perusahaan"){
                                                    $count10++;
                                                }
                                            }

                                            if($count10 == 0){
                                        ?>
                                                <option value="Alamat Perusahaan">Alamat Perusahaan</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 11. Phone/Fax -->
                                        <?php 
                                            $count11 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Phone/Fax"){
                                                    $count11++;
                                                }
                                            }

                                            if($count11 == 0){
                                        ?>
                                                <option value="Phone/Fax">Phone/Fax</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 12. Website -->
                                        <?php 
                                            $count12 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Website"){
                                                    $count12++;
                                                }
                                            }

                                            if($count12 == 0){
                                        ?>
                                                <option value="Website">Website</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 13. Processing time -->
                                        <?php 
                                            $count13 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Processing time"){
                                                    $count13++;
                                                }
                                            }

                                            if($count13 == 0){
                                        ?>
                                                <option value="Processing time">Processing time</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 14. PPN -->
                                        <?php 
                                            $count14 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "PPN"){
                                                    $count14++;
                                                }
                                            }

                                            if($count14 == 0){
                                        ?>
                                                <option value="PPN">PPN</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 15. Senin -->
                                        <?php 
                                            $count15 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Senin"){
                                                    $count15++;
                                                }
                                            }

                                            if($count15 == 0){
                                        ?>
                                                <option value="Senin">Senin</option>
                                        <?php } ?>
                                    <!-- -->

                                    <!-- 16. Selasa -->
                                        <?php 
                                            $count16 = 0;
                                            foreach($tetapan as $y){
                                                if($y->nama_tetapan == "Selasa"){
                                                    $count16++;
                                                }
                                            }

                                            if($count16 == 0){
                                        ?>
                                                <option value="Selasa">Selasa</option>
                                        <?php } ?>
                                    <!-- -->
                                </select>
                            <?php } else{ ?>
                                <input type="text" name="nama_tetapan" id="nama_tetapan" required class="form-control" 
                                onchange="cek_nama_tetapan()">
                            <?php } ?>
                            <input type="hidden" name="jumlah_tetapan" value="<?= $count ?>">
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

<!-- cek nama tetapan -->
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

<!-- untuk log -->
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

<!-- select option buat tetapan yang wajib -->
<script>
    function cek_tetapan(){
        
    }
</script>


    