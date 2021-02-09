<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perencanaan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perencanaan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->


<!-- ------------------------------------------ BELUM DITINJAU --------------------------------------- -->
<?php if($status == '0'){ ?>
<h1>Permintaan Material Tambahan - Belum Ditinjau</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Permintaan Material Tambahan - Belum Ditinjau</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <!-- <th class="col-lg-2">Kode Permintaan Material</th> -->
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Jumlah</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Material</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($tambahan) ; $x++){
                        if ($status == 0){ 
                            if($tambahan[$x]['status'] == 0){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $tambahan[$x]['id_permintaan_tambahan'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $tambahan[$x]['jumlah_tambah'] ?></td>
                    <td><?= $tambahan[$x]['kode_sub_jenis_material'] ." - ".$tambahan[$x]['nama_jenis_material'] ." ".$tambahan[$x]['nama_sub_jenis_material'] ?></td>
                    <td><?= $tambahan[$x]['nama_line'] ?></td>
                    <td>Belum Ditinjau / Menunggu Persetujuan
                        <input type="hidden" id="ketersediaan<?= $x ?>" value="<?php $cek=0;
                            for($det=0; $det<count($detail); $det++){
                                if($tambahan[$x]['id_permintaan_material'] == $detail[$det]['id_permintaan_material']){
                                    $produk = $detail[$det]['jumlah_minta'];
                                    $cons = $detail[$det]['jumlah_konsumsi'];
                                    $needs = $produk*$cons;

                                    $ketersediaan = 0;
                                    for($mat=0; $mat<count($material); $mat++){
                                        if($detail[$det]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                            $ketersediaan = $ketersediaan+1; //jumlah di gudang
                                        }
                                    }
                                    if($ketersediaan<$needs){
                                        $cek=$cek+1; //jika tidak tersedia, maka cek > 0
                                    }
                                }
                            } echo $cek;
                        ?>">
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail_tambah/' . $tambahan[$x]['id_permintaan_tambahan'] ?>"></a>
                            
                        <?php if ((($_SESSION['nama_jabatan'] == "Direktur") && ($_SESSION['nama_departemen'] == "Management")
                            || ($_SESSION['nama_jabatan'] == "PPIC") && ($_SESSION['nama_departemen'] == "Material"))){ ?>
                            <button type="button" class="konfirmz col-lg-3 btn btn-success fa fa-check" 
                                value="<?php echo $x ?>" title="Konfirmasi"></button>
                            <button type="button" class="tolakz col-lg-3 btn btn-danger fa fa-times" 
                                value="<?php echo $x ?>" title="Tolak"></button>
                        <?php } ?>
                    </td>
                </tr>


                <!-- ****************************** MODAL SETUJU ***************************** -->
                <!-- ************************************************************************** -->
                    <div class="modal" id="setuju" role="dialog">
                        <div class="modal-dialog modal-xl" style="width:50%">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanMaterial/setuju_tambah" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b>Menyetujui Permintaan Material Tambahan</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idnyaa" id="idnyaa" class="form-control" value="" readonly>
                                        <input type="hidden" name="status" id="statusnyaa" class="form-control" value="" readonly>
                                        <div id="isisetuju"></div>
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-primary" value="Ya">
                                                <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- ***************************** END MODAL SETUJU *************************** -->
                <!-- ************************************************************************** -->

                <!-- ****************************** MODAL TOLAK ***************************** -->
                <!-- ************************************************************************ -->
                <div class="modal" id="tolak" role="dialog">
                        <div class="modal-dialog modal-xl" style="width:50%">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PermintaanMaterial/setuju_tambah" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b>Menolak Permintaan Material Tambahan</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idnyaa" id="idnya" class="form-control" value="" readonly>
                                        <input type="hidden" name="status" class="form-control" value="5" readonly>
                                        <div id="isitolak"></div>
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-primary" value="Ya">
                                                <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- ***************************** END MODAL TOLAK *************************** -->
                <!-- ************************************************************************* -->
                
                <?php $no=$no+1;} } } ?>
            </tbody>
        </table>
    </div>
</section>



<!-- ----------------------------------------------- PERENCANAAN ----------------------------------------- -->
<?php } else if($status == '1'){ ?>
<h1>Proses Perencanaan Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Permintaan Material Tambahan - Sedang Proses</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <!-- <th class="col-lg-2">Kode Permintaan Material</th> -->
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Jumlah</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Material</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                    <th class="col-lg-3" style="text-align: center;vertical-align: middle;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($tambahan) ; $x++){
                        if ($status == 1 || $status == 4){ 
                            if($tambahan[$x]['status'] == 1){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $tambahan[$x]['id_permintaan_tambahan'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $tambahan[$x]['jumlah_tambah'] ?></td>
                    <td><?= $tambahan[$x]['kode_sub_jenis_material'] ." - ".$tambahan[$x]['nama_jenis_material'] ." ".$tambahan[$x]['nama_sub_jenis_material'] ?></td>
                    <td><?= $tambahan[$x]['nama_line'] ?></td>
                    <td> Diterima, Menunggu Pengambilan </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PermintaanMaterial/detail_tambah/' . $tambahan[$x]['id_permintaan_tambahan'] ?>"></a>
                        <!-- <a class="col-lg-3 btn btn-info fa fa-file-text" title="Perencanaan"
                            href="<?php echo base_url() . 'PermintaanMaterial/proses_perencanaan_tambah/' . $tambahan[$x]['id_permintaan_tambahan']?>"></a> -->
                    </td>
                </tr>
                <?php $no=$no+1; } } } ?>
            </tbody>
        </table>
    </div>
</section>


<!-- ----------------------------------------------- SELESAI ----------------------------------------- -->
<?php }else if($status == '4'){ ?>
<h1>Permintaan Material Tambahan - Selesai</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Permintaan Material - Semua</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">No.</th>
                    <!-- <th class="col-lg-2">Kode Permintaan Material</th> -->
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Permintaan Material</th>
                    <th class="col-lg-1" style="text-align: center;vertical-align: middle;">Jumlah</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Material</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Line</th>
                    <th class="col-lg-2" style="text-align: center;vertical-align: middle;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    for($x=0 ; $x<count($tambahan) ; $x++){
                        if ($status == 4){ 
                            if($tambahan[$x]['status'] == '3'){
                ?>
                <tr>
                    <td> <?php echo $no ?>
                    <input type="hidden" id="idd<?= $x ?>" value="<?= $tambahan[$x]['id_permintaan_tambahan'] ?>"> </td>
                    <!-- <td style="text-align: center;vertical-align: middle;"></td> -->
                    <td><?= $tambahan[$x]['id_permintaan_material'] ?></td>
                    <td><?= $tambahan[$x]['jumlah_tambah'] ?></td>
                    <td><?= $tambahan[$x]['kode_sub_jenis_material'] ." - ".$tambahan[$x]['nama_jenis_material'] ." ".$tambahan[$x]['nama_sub_jenis_material'] ?></td>
                    <td><?= $tambahan[$x]['nama_line'] ?></td>
                    <td>Selesai</td>
                </tr>
                <?php $no=$no+1;}}} ?>
            </tbody>
        </table>
    </div>
</section>

<?php } ?>



<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>

<script>
    $('.konfirmz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();
        var tersedia = $("#ketersediaan"+no).val();

        $("#statusnyaa").val("1");

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax_tambah",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan menyetujui Permintaan Material Tambahan dengan No. Form <b>'+respond['permat'][0]['id_permintaan_tambahan']+'</b>?';
                $("#isisetuju").html($isi);
                $("#idnyaa").val(id);
                $("#setuju").modal();
            }
        }); 
    });
</script>

<script>
    $('.tolakz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax_tambah",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 
                    //'<input type="hidden" name="id_permintaan_material" class="form-control" value="'+respond['permat'][0]['id_permintaan_material']+'" readonly>'+
                    //'<input type="hidden" name="status" class="form-control" value="1" readonly>'+
                    'Anda akan menolak Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_tambahan']+'</b>?';

                $("#isitolak").html($isi);
                $("#idnya").val(id);
                $("#tolak").modal();
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
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan membatalkan Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';
                $("#isibatal").html($isi);
                $("#idbatal").val(id);
                $("#batal").modal();
            }
        }); 
    });
</script>

<script>
    $('.selesaiz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan menyelesaikan Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';
                $("#isiselesai").html($isi);
                $("#idselesai").val(id);
                $("#selesai").modal();
            }
        }); 
    });
</script>

<script>
    $('.sediaz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Apakah semua material untuk Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b> sudah tersedia?';
                $("#isisedia").html($isi);
                $("#idsedia").val(id);
                $("#sedia").modal();
            }
        }); 
    });
</script>

<script>
    function reload() {
    location.reload();
    }
</script>