<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengambilan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pengambilan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pengambilan Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Pengambilan Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Jenis Material</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($status==0){ //hari ini
                        for($x=0; $x<count($today); $x++){ ?>
                <tr>
                    <td class="col-1"> <?php echo $x+1?>
                        <input type="hidden" id="idmaterial<?= $x ?>" value="<?php echo $today[$x]['id_sub_jenis_material'] ?>">
                        <input type="hidden" id="idd<?= $x ?>" value="<?php echo $today[$x]['id_pengambilan_material'] ?>" >
                        <input type="hidden" id="uksatuan<?= $x ?>" value="<?php echo $today[$x]['ukuran_satuan_keluar'] ?>" >
                        <input type="hidden" class="form-control" id="idpermintaan" value="<?php echo $today[$x]['id_permintaan_material'] ?>">
                    </td>
                    <td class="col-lg-2">
                        <?php
                            $waktu = $ambil[$x]['tanggal_ambil'];

                            $hari_array = array(
                                'Minggu',
                                'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu'
                            );
                            $hr = date('w', strtotime($waktu));
                            $hari = $hari_array[$hr];
                            $tanggal = date('j', strtotime($waktu));
                            $bulan_array = array(
                                1 => 'Januari',
                                2 => 'Februari',
                                3 => 'Maret',
                                4 => 'April',
                                5 => 'Mei',
                                6 => 'Juni',
                                7 => 'Juli',
                                8 => 'Agustus',
                                9 => 'September',
                                10 => 'Oktober',
                                11 => 'November',
                                12 => 'Desember',
                            );
                            $bl = date('n', strtotime($waktu));
                            $bulan = $bulan_array[$bl];
                            $tahun = date('Y', strtotime($waktu));
                            
                            echo "$hari, $tanggal $bulan $tahun";
                        ?>
                    </td>
                    <td class="col-lg-2"> <?php echo $today[$x]['kode_sub_jenis_material'] ." - ". $today[$x]['nama_jenis_material']." ".$today[$x]['nama_sub_jenis_material']?></td>
                    <td class="col-lg-1">
                        <?php $jlhsatu = $today[$x]['jumlah_ambil'];
                            $uk=$today[$x]['ukuran_satuan_keluar']; //ukuran satuan keluar
                            $jlhnya=$jlhsatu/$uk; //jumlah dengan satuan ukuran
                            $jumlahnya = ceil($jlhnya); //ceil=roundup
                            echo $jumlahnya;
                        ?>
                    </td>
                    <td class="col-lg-1"><?php echo $today[$x]['satuan_ukuran'] ?></td>
                    <td class="col-lg-2"><?php
                        if ($today[$x]['status_keluar'] == 0){
                            echo "Belum Diambil";
                        } else{
                            echo "Sudah Diambil";
                        } ?>
                    </td>
                    <td class="col-lg-3">
                        <?php if ($today[$x]['status_keluar'] == 0){ ?>
                            <button type="button" class="ambilz col-lg-3 btn btn-success fa fa-check" 
                                value="<?php echo $x ?>" title="Ambil"></button>
                            <!-- <button type="button" class="batalz col-lg-3 btn btn-danger fa fa-times" 
                                value="<?php echo $x ?>" title="Tolak"></button> -->
                        <?php } ?>
                    </td>
                </tr>
                
                <!-- ******************************** MODAL AMBIL ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalambil' class="modal" role="dialog">
                    <div class="modal-dialog modal-xl" style="width:50%">
                        <form class="" action="<?php echo base_url()?>PengambilanMaterial/diambil" method="post">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>Pengambilan Material</b></h4>
                                </div>
                        
                                <div class="modal-body">
                                    <input type="hidden" name="id_permintaan" id="idminta" class="form-control" value="" readonly>
                                    <input type="hidden" name="id_pengambilan" id="idambil" class="form-control" value="" readonly>
                                    <input type="hidden" name="iddetaill" class="form-control" value="<?= $ambil[$x]['id_detail_permintaan_material'] ?>" readonly>
                                    <input type="hidden" name="status" class="form-control" value="1" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="amaterial" id="amaterial" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Line</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="aline" id="aline" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Tanggal Pengambilan</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="atgl_ambil" id="atgl_ambil" class="form-control" value="" readonly>
                                            <input type="text" name="aatgl_ambil" id="aatgl_ambil" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Jumlah</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="ajumlah" id="ajumlah" class="form-control"  value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Satuan</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="asatuan" id="asatuan" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div id="isiambil" style="text-align: center"></div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-primary" value="Lanjutkan">
                                            <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ****************************** END MODAL AMBIL *************************** -->
                <!-- ************************************************************************** -->

                <?php }}
                    else{
                        for($x=0; $x<count($ambil); $x++){ ?>
                <tr>
                    <td class="col-1"> <?php echo $x+1?>
                        <input type="hidden" id="idmaterial<?= $x ?>" value="<?php echo $ambil[$x]['id_sub_jenis_material'] ?>">
                        <input type="hidden" id="idd<?= $x ?>" value="<?php echo $ambil[$x]['id_pengambilan_material'] ?>" >
                        <input type="hidden" id="uksatuan<?= $x ?>" value="<?php echo $ambil[$x]['ukuran_satuan_keluar'] ?>" >
                        <input type="hidden" class="form-control" id="idpermintaan" value="<?php echo $ambil[$x]['id_permintaan_material'] ?>">
                    </td>
                    <td class="col-lg-2">
                        <?php
                            $waktu = $ambil[$x]['tanggal_ambil'];

                            $hari_array = array(
                                'Minggu',
                                'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu'
                            );
                            $hr = date('w', strtotime($waktu));
                            $hari = $hari_array[$hr];
                            $tanggal = date('j', strtotime($waktu));
                            $bulan_array = array(
                                1 => 'Januari',
                                2 => 'Februari',
                                3 => 'Maret',
                                4 => 'April',
                                5 => 'Mei',
                                6 => 'Juni',
                                7 => 'Juli',
                                8 => 'Agustus',
                                9 => 'September',
                                10 => 'Oktober',
                                11 => 'November',
                                12 => 'Desember',
                            );
                            $bl = date('n', strtotime($waktu));
                            $bulan = $bulan_array[$bl];
                            $tahun = date('Y', strtotime($waktu));
                            
                            echo "$hari, $tanggal $bulan $tahun";
                        ?>
                    </td>
                    <td class="col-lg-2"> <?php echo $ambil[$x]['kode_sub_jenis_material'] ." - ". $ambil[$x]['nama_jenis_material']." ".$ambil[$x]['nama_sub_jenis_material']?></td>
                    <td class="col-lg-1">
                        <?php $jlhsatu = $ambil[$x]['jumlah_ambil'];
                            $uk=$ambil[$x]['ukuran_satuan_keluar']; //ukuran satuan keluar
                            $jlhnya=$jlhsatu/$uk; //jumlah dengan satuan ukuran
                            $jumlahnya = ceil($jlhnya); //ceil=roundup
                            echo $jumlahnya;
                        ?>
                    </td>
                    <td class="col-lg-1"><?php echo $ambil[$x]['satuan_ukuran'] ?></td>
                    <td class="col-lg-2"><?php
                        if ($ambil[$x]['status_keluar'] == 0){
                            echo "Belum Diambil";
                        } else{
                            echo "Sudah Diambil";
                        } ?>
                    </td>
                    <td class="col-lg-3">
                        <?php if ($ambil[$x]['status_keluar'] == 0){ ?>
                            <button type="button" class="ambilz col-lg-3 btn btn-success fa fa-check" 
                                value="<?php echo $x ?>" title="Ambil"></button>
                            <!-- <button type="button" class="batalz col-lg-3 btn btn-danger fa fa-times" 
                                value="<?php echo $x ?>" title="Tolak"></button> -->
                        <?php } ?>
                    </td>
                </tr>
                
                <!-- ******************************** MODAL AMBIL ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalambil' class="modal" role="dialog">
                    <div class="modal-dialog modal-xl" style="width:50%">
                        <form class="" action="<?php echo base_url()?>PengambilanMaterial/diambil" method="post">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><b>Pengambilan Material</b></h4>
                                </div>
                        
                                <div class="modal-body">
                                    <input type="hidden" name="id_permintaan" id="idminta" class="form-control" value="" readonly>
                                    <input type="hidden" name="id_pengambilan" id="idambil" class="form-control" value="" readonly>
                                    <input type="hidden" name="iddetaill" class="form-control" value="<?= $detail[$x]['id_detail_permintaan_material'] ?>" readonly>
                                    <input type="hidden" name="status" class="form-control" value="1" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="amaterial" id="amaterial" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Line</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="aline" id="aline" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Tanggal Pengambilan</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="atgl_ambil" id="atgl_ambil" class="form-control" value="" readonly>
                                            <input type="text" name="aatgl_ambil" id="aatgl_ambil" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Jumlah</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="ajumlah" id="ajumlah" class="form-control"  value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Satuan</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="asatuan" id="asatuan" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div id="isiambil" style="text-align: center"></div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-primary" value="Lanjutkan">
                                            <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ****************************** END MODAL AMBIL *************************** -->
                <!-- ************************************************************************** -->

                <?php }} ?>
            </tbody>
        </table>
    </div>


</section>


</section>
<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>


<script>
    $('.ambilz').click(function(){
        var no = $(this).attr('value');
        var id = $("#idd"+no).val();
        var idminta = $("#idpermintaan").val();
        var mat = $("#idmaterial"+no).val();
        var ukuran = $("#uksatuan"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax_ambil",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#amaterial").val(respond['ambil'][0]['id_sub_jenis_material']);
                $("#aline").val(respond['ambil'][0]['nama_line']);
                $("#atgl_ambil").val(respond['ambil'][0]['tanggal_ambil']);
                $("#asatuan").val(respond['ambil'][0]['satuan_ukuran']);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['ambil'][0]['tanggal_ambil']).getDate();
                var xhari = new Date(respond['ambil'][0]['tanggal_ambil']).getDay();
                var xbulan = new Date(respond['ambil'][0]['tanggal_ambil']).getMonth();
                var xtahun = new Date(respond['ambil'][0]['tanggal_ambil']).getYear();
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;
                $("#aatgl_ambil").val(hari +', ' + tanggal + ' ' + bulan + ' ' + tahun);

                jlhsatu = respond['ambil'][0]['jumlah_ambil'];
                uk=ukuran; //ukuran satuan keluar
                jlhnya=jlhsatu/uk; //jumlah dengan satuan ukuran
                jumlahnya = Math.ceil(jlhnya);
                $("#ajumlah").val(jumlahnya);

                $isi = 'Status Pengambilan Material akan diubah menjadi <b>Sudah Diambil</b>.';
                $("#isiambil").html($isi);
                $("#idambil").val(id);
                $("#idminta").val(idminta);
                $("#modalambil").modal();
            }
        }); 
    });
</script>


<script>
    $('.batalz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax_ambil",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan membatalkan Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';
                $("#isibatal").html($isi);
                $("#idbatal").val(id);
                $("#modalbatal").modal();
            }
        }); 
    });
</script>


<script>
    function reload() {
    location.reload();
    }
</script>