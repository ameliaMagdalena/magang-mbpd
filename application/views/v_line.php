<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Line</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Line</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <?php if($jmline != 4){?>
        <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
            href="#modaltambah">+ Line</a>
        <br><br>
        <?php } ?>

        <header class="panel-heading">
            <h2 class="panel-title">Data Line</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Line</th>
                        <th style="text-align: center;vertical-align: middle;">Urutan Line</th>
                        <th style="text-align: center;vertical-align: middle;">Jumlah Team Line</th>
                        <th style="text-align: center;vertical-align: middle;">Total Processing Time (jam)</th>
                        <th style="text-align: center;vertical-align: middle;">Satuan Biaya (Rp/s)</th>
                        <th style="text-align: center;vertical-align: middle;">Jumlah Pekerja Per Team</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($line as $x){ 

                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_line; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->urutan_line; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->jumlah_team;?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->total_processing_time;?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->satuan_biaya;?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->jumlah_pekerja_per_team;?></td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?= $x->id_line;?>" style="margin-right:5px;margin-bottom:5px"></a>
                                <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                title="Log" id="blog<?php echo $x->id_line?>" value="<?php echo $x->id_line;?>" style="margin-right:5px;margin-bottom:5px"></button>
                            </td>
                        </tr>
                    <?php 
                    $no++;
                    ?>  
        
            <div id='modaledit<?= $x->id_line;?>' class="modal-block modal-block-primary mfp-hide">
                <form method="POST" action="<?= base_url()?>line/edit_line">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Edit Line</h2>
                        </header>
                        <div class="panel-body">
                            
                            <input type="hidden" name="id_line" id="id_line" required class="form-control"
                            value="<?= $x->id_line ?>" readonly>

                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nama Line</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nama_line_edit" id="nama_line_edit" required class="form-control"
                                    value="<?= $x->nama_line ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Urutan Line</label>
                                <div class="col-sm-7">
                                    <input type="text" name="urutan_line" id="urutan_line" required class="form-control" readonly
                                    value="<?= $x->urutan_line ?>">
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Processing Time (jam)</label>
                                <div class="col-sm-7">
                                    <input type="number" name="processing_time" id="processing_time" 
                                    required class="form-control" value="<?= $processing_time[0]['isi_tetapan']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Jumlah Team Line</label>
                                <div class="col-sm-7">
                                    <input type="number" name="jumlah_team" id="jumlah_team" 
                                    required class="form-control" value="<?= $x->jumlah_team ?>" onchange="hitung_tpt()">
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Total Processing Time (jam)</label>
                                <div class="col-sm-7">
                                    <input type="number" name="total_processing_time" id="total_processing_time" 
                                    required class="form-control"  value="<?= $x->total_processing_time?>" readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Satuan Biaya (Rp/s)</label>
                                <div class="col-sm-7">
                                    <input type="number" name="satuan_biaya" id="satuan_biaya" 
                                    required class="form-control"  value="<?= $x->satuan_biaya ?>">
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Jumlah Pekerja Per Team</label>
                                <div class="col-sm-7">
                                    <input type="number" name="jumlah_pekerja_per_team" id="jumlah_pekerja_per_team" 
                                    required class="form-control"  value="<?= $x->jumlah_pekerja_per_team?>">
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

                    <?php
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>line/tambah_line"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Line</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Line</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="nama_line" required>
                                <?php 
                                    $count1=0;
                                    foreach($line as $ln){
                                        if($ln->nama_line == $nmline1){
                                            $count1++;
                                        }
                                    }
                                    if($count1==0){
                                ?>
                                    <option value="<?= $nmline1?>"><?= $nmline1?></option>
                                <?php
                                    }
                                    $count2=0;
                                    foreach($line as $ln){
                                        if($ln->nama_line == $nmline2){
                                            $count2++;
                                        }
                                    }
                                    if($count2==0){
                                ?>
                                    <option value="<?= $nmline2?>"><?= $nmline2?></option>
                                <?php
                                    }
                                        $count3=0;
                                        foreach($line as $ln){
                                            if($ln->nama_line == $nmline3){
                                                $count3++;
                                            }
                                        }
                                        if($count3==0){
                                ?>
                                    <option value="<?= $nmline3?>"><?= $nmline3?></option>
                                <?php
                                    }
                                        $count4=0;
                                        foreach($line as $ln){
                                            if($ln->nama_line == $nmline4){
                                                $count4++;
                                            }
                                        }
                                        if($count4==0){
                                ?>
                                    <option value="<?= $nmline4?>"><?= $nmline4?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Urutan Line</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="urutan_line" required>
                                <?php 
                                    $ct1=0;
                                    foreach($line as $ln){
                                        if($ln->urutan_line ==1){
                                            $ct1++;
                                        }
                                    }
                                    if($ct1==0){
                                ?>
                                    <option value="<?=1?>"><?=1?></option>
                                <?php
                                    }
                                    $ct2=0;
                                    foreach($line as $ln){
                                        if($ln->urutan_line ==2){
                                            $ct2++;
                                        }
                                    }
                                    if($ct2==0){
                                ?>
                                    <option value="<?=2?>"><?=2?></option>
                                <?php
                                    }
                                        $ct3=0;
                                        foreach($line as $ln){
                                            if($ln->urutan_line ==3){
                                                $ct3++;
                                            }
                                        }
                                        if($ct3==0){
                                ?>
                                    <option value="<?=3?>"><?=3?></option>
                                <?php
                                    }
                                        $ct4=0;
                                        foreach($line as $ln){
                                            if($ln->urutan_line ==4){
                                                $ct4++;
                                            }
                                        }
                                        if($ct4==0){
                                ?>
                                    <option value="<?=4?>"><?=4?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Processing Time (jam)</label>
                        <div class="col-sm-7">
                            <input type="number" name="processing_time" id="processing_time" readonly
                            required class="form-control" value="<?= $processing_time[0]['isi_tetapan']?>">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Team Line</label>
                        <div class="col-sm-7">
                            <input type="number" name="jumlah_team" id="jumlah_team" required 
                            class="form-control" onchange="hitung_tpt()">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Total Processing Time (jam)</label>
                        <div class="col-sm-7">
                            <input type="number" name="total_processing_time" id="total_processing_time"
                            required class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Satuan Biaya (Rp/s)</label>
                        <div class="col-sm-7">
                            <input type="number" name="satuan_biaya" id="satuan_biaya" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Pekerja Per Team</label>
                        <div class="col-sm-7">
                            <input type="number" name="jumlah_pekerja_per_team" id="jumlah_pekerja_per_team" required class="form-control">
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
                    <h4 class="modal-title">Log Line</h4>
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
    function cek_nama_line(){
        var nama_line = $("#nama_line").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>line/cek_nama_line",
            dataType: "JSON",
            data: {nama_line:nama_line},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, line dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });
    }
</script>

<script>
    function hitung_tpt(){
        $jumlah_team     = $("#jumlah_team").val();
        $processing_time = $("#processing_time").val();

        $("#total_processing_time").val($jumlah_team * $processing_time);
    }
</script>

<script>
    $('.blog_klik').click(function(){
        var id = $(('#blog')+$(this).attr('value')).val();
        $('#id_terpilih').val(id);

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>line/ambil_data_log",
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
                        $data = "Nama Line (" + respond['log'][$i]['nama_line'] +
                        ") , Urutan Line (" + respond['log'][$i]['urutan_line'] + 
                        ") , Jumlah Team (" + respond['log'][$i]['jumlah_team'] + ") , "+
                        "Total Processing Time (jam) (" + respond['log'][$i]['total_processing_time'] +
                        ") , Satuan Biaya (" + respond['log'][$i]['satuan_biaya'] +
                        ") , Jumlah Pekerja Per Team (" + respond['log'][$i]['jumlah_pekerja_per_team'] + ")";

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
                        $data = " ";
                        $ct = 0;
                        $count = 0;

                        if(respond['log'][$i]['urutan_line'] == respond['log'][$i+1]['urutan_line']){
                           $data = $data;
                        }
                        else{
                            $data = "Urutan Line (" + respond['log'][$i]['urutan_line'] + ")";
                        }

                        if(respond['log'][$i]['jumlah_team'] == respond['log'][$i+1]['jumlah_team']){
                           $data = $data;
                        }
                        else{
                            if($count == 0){
                                $data = "Jumlah Team (" + respond['log'][$i]['jumlah_team'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Jumlah Team (" + respond['log'][$i]['jumlah_team'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['total_processing_time'] == respond['log'][$i+1]['total_processing_time']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Total Processing Time (" + respond['log'][$i]['total_processing_time'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Total Processing Time (jam) (" + respond['log'][$i]['total_processing_time'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['satuan_biaya'] == respond['log'][$i+1]['satuan_biaya']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Satuan Biaya (" + respond['log'][$i]['satuan_biaya'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Satuan Biaya (" + respond['log'][$i]['satuan_biaya'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['jumlah_pekerja_per_team'] == respond['log'][$i+1]['jumlah_pekerja_per_team']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Jumlah Pekerja Per Team (" + respond['log'][$i]['jumlah_pekerja_per_team'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Jumlah Pekerja Per Team (" + respond['log'][$i]['jumlah_pekerja_per_team'] + ")";
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





    