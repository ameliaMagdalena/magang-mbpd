<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Rekening</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Rekening</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <?php if(($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management")){?>
            <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
                href="#modaltambah" onclick="id_produk()">+ Rekening</a>
        <br><br>
        <?php } ?>

        <header class="panel-heading">
            <h2 class="panel-title">Data Rekening</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Bank</th>
                        <th style="text-align: center;vertical-align: middle;">Nomor Rekening</th>
                        <th style="text-align: center;vertical-align: middle;">A/N</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($rekening as $rk){?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $no; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $rk->nama_bank;?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $rk->nomor_rekening;?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $rk->atas_nama;?>
                            </td>
                            <td  class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?= $rk->id_rekening;?>"></a>
                                
                                <?php if(($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management")){?>
                                    <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                        title="Edit" href="#modaledit<?= $rk->id_rekening;?>"></a>
                                    <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Hapus" href="#modalhapus<?= $rk->id_rekening;?>"></a>
                                    <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                    id="blog<?= $rk->id_rekening;?>" value="<?= $rk->id_rekening;?>"></button>
                                <?php } ?>
                            </td>
                        </tr>

                            
                        <div id='modaldetail<?= $rk->id_rekening;?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Detail Rekening</h2>
                                </header>

                                <div class="panel-body">
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Bank</label>
                                    <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $rk->nama_bank;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nomor Rekening</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $rk->nomor_rekening;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">A/N</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $rk->atas_nama;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Kantor Cabang</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $rk->kantor_cabang;?>" readonly>
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
                        
                        <div id='modaledit<?= $rk->id_rekening;?>' class="modal-block modal-block-primary mfp-hide">
                            <form method="POST" action="<?= base_url()?>rekening/edit_rekening">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Edit Rekening</h2>
                                    </header>

                                    <div class="panel-body">
                                        <input type="hidden" name="id_rekening" value="<?= $rk->id_rekening?>">

                                        <div class="form-group mt-lg">
                                            <label class="col-sm-5 control-label">Nama Bank</label>
                                            <div class="col-sm-7">
                                                <select name="id_bank_edit" id="id_bank_edit" 
                                                onchange="cek_rekening_edit()" required class="form-control mb-md">
                                                    <?php foreach($bank as $bk){
                                                        if($rk->id_bank == $bk->id_bank){?>
                                                            <option value="<?= $bk->id_bank?>" selected>
                                                                <?= $bk->nama_bank;?>
                                                            </option>
                                                        <?php } else{?>
                                                            <option value="<?= $bk->id_bank?>">
                                                                <?= $bk->nama_bank;?>
                                                            </option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-5 control-label">Nomor Rekening</label>
                                            <div class="col-sm-7">
                                                <input type="number" name="nomor_rekening_edit" id="nomor_rekening_edit"
                                                onchange="cek_rekening_edit()" class="form-control" value="<?= $rk->nomor_rekening;?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-5 control-label">A/N</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="an_edit" id="an_edit" class="form-control"
                                                value="<?= $rk->atas_nama;?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-5 control-label">Kantor Cabang</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="kantor_cabang" class="form-control"
                                                value="<?= $rk->kantor_cabang;?>">
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

                        <div id='modalhapus<?= $rk->id_rekening;?>' class="modal-block modal-block-sm mfp-hide">
                            <form method="POST" action="<?= base_url()?>rekening/delete_rekening">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Hapus Data Rekening</h2>
                                    </header>

                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <input type="hidden" name="id_rekening" value="<?= $rk->id_rekening;?>">
                                                    <p>Apakah anda yakin akan menghapus data rekening dengan 
                                                    nama bank <?= $rk->nama_bank ?> dengan nomor rekening <?= $rk->nomor_rekening?>?</p>
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
                    }?>
                </tbody>
	        </table>
        </div>
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>rekening/tambah_rekening"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Rekening</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Bank</label>
                        <div class="col-sm-7">
                            <select name="id_bank_input" id="id_bank_input" 
                            required class="form-control mb-md">
                                <?php foreach($bank as $bk){?>
                                    <option value="<?= $bk->id_bank?>">
                                        <?= $bk->nama_bank;?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Rekening</label>
                        <div class="col-sm-7">
                            <input type="number" name="nomor_rekening_input" id="nomor_rekening_input" 
                            onchange="cek_rekening_input()" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">A/N</label>
                        <div class="col-sm-7">
                            <input type="text" name="an_input" id="an_input"
                            required class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kantor Cabang</label>
                        <div class="col-sm-7">
                            <input type="text" name="kantor_cabang" id="kantor_cabang"
                            class="form-control" required >
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

        <!-- tampung id produk yang dipilih
        <input type="text" id="tampung_id_produk" name="tampung_id_produk">  -->
        <!-- tampung jumlah id produk yang dipilih -->
        <input type="hidden" id="tampung_jumlah_id_produk"> 
    </div>

    <div class="modal" id="modallog" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Rekening</h4>
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
    function cek_rekening_input(){
        var nomor_rekening = $("#nomor_rekening_input").val();

            $.ajax({
                type:"post",
                url:"<?php echo base_url() ?>rekening/cek_rekening_input",
                dataType: "JSON",
                data: {nomor_rekening:nomor_rekening},

                success: function(respond){
                    if(respond['res'] == 1){
                        alert("Mohon maaf, nomor rekening tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    }
                    reload();
                }
            });
    }
</script>

<script>
    function cek_rekening_edit(){
        var nomor_rekening = $("#nomor_rekening_edit").val();

            $.ajax({
                type:"post",
                url:"<?php echo base_url() ?>rekening/cek_rekening_edit",
                dataType: "JSON",
                data: {nomor_rekening:nomor_rekening},

                success: function(respond){
                    if(respond['res'] == 1){
                        alert("Mohon maaf, nomor rekening  tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
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
            url:"<?php echo base_url() ?>rekening/ambil_data_log",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#input_date").html(respond['input_date']);
                $("#input_user").html(respond['input_user']);

                $jumlah_log  = respond['jumlah_log'];
                $jumlah_user = respond['jumlah_user'];
                $jumlah_bank = respond['jumlah_bank'];

                $tampung_isi =" ";

                for($i=0;$i<$jumlah_log;$i++){
                    if(respond['log'][$i]['keterangan_log'] == "Insert Data"){
                        
                        for($j=0;$j<$jumlah_user;$j++){
                            if(respond['log'][$i]['user_add'] == respond['user'][$j]['id_user']){
                                $nama_user       = respond['user'][$j]['nama_karyawan'];
                            }
                        } 

                        for($p=0;$p<$jumlah_bank;$p++){
                            if(respond['log'][$i]['id_bank'] == respond['bank'][$p]['id_bank']){
                                $nama_bank = respond['bank'][$p]['nama_bank'];
                            }
                        }


                        $tanggal = respond['log'][$i]['waktu_add'];
                        $user = $nama_user;
                        $data = "Nama Bank (" + $nama_bank + ")," +
                        " Nomor Rekening (" + respond['log'][$i]['nomor_rekening'] + "),"+
                        " Atas Nama (" + respond['log'][$i]['atas_nama'] + "),"+
                        " Kantor Cabang (" + respond['log'][$i]['kantor_cabang'] + ")";

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

                        if(respond['log'][$i]['id_bank'] == respond['log'][$i+1]['id_bank']){
                           $data =$data;
                        }
                        else{
                            for($p=0;$p<$jumlah_bank;$p++){
                                if(respond['log'][$i]['id_bank'] == respond['bank'][$p]['id_bank']){
                                    $nama_banks = respond['bank'][$p]['nama_bank'];
                                }
                            }

                            if($count == 0){
                                $data = "Nama Bank (" + $nama_banks + ")";
                            }
                            else{
                                $data = $data + ", "+ "Nama Bank (" + $nama_banks + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['nomor_rekening'] == respond['log'][$i+1]['nomor_rekening']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Nomor Rekening (" + respond['log'][$i]['nomor_rekening'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Nomor Rekening (" + respond['log'][$i]['nomor_rekening'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['atas_nama'] == respond['log'][$i+1]['atas_nama']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "A/N (" + respond['log'][$i]['atas_nama'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "A/N (" + respond['log'][$i]['atas_nama'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['kantor_cabang'] == respond['log'][$i+1]['kantor_cabang']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Kantor Cabang (" + respond['log'][$i]['kantor_cabang'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Kantor Cabang (" + respond['log'][$i]['kantor_cabang'] + ")";
                            }
                            $count++;
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
        
                //alert("aaa");
            }
        });

    });
</script>



    