<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Daftar Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Daftar Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Material</h1>
<hr>


<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Data Material</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Material</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<count($material) ; $x++){
                ?>
                    <tr>
                        <td class="col-1"><?php echo $x+1?> </td>
                        <td class="col-lg-3"><?php echo $material[$x]['kode_sub_jenis_material'] . ' - ' . $material[$x]['nama_jenis_material'] . ' ' . $material[$x]['nama_sub_jenis_material']?> </td>
                        <td class="col-lg-2">
                            <?php
                                $waktu = $material[$x]['tanggal_masuk'];

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
                        <td class="col-lg-2">
                            <?php if ($material[$x]['status_keluar'] == 0){
                                echo "Masih Di Gudang";
                            } else {
                                echo "Keluar Gudang";
                            }?>
                        </td>
                        <td class="col-lg-4">
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail<?php echo $material[$x]['id_material'] ?>"></a> 
                            <!-- <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit<?php echo $material[$x]['id_material'] ?>"></a> -->
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus<?php echo $material[$x]['id_material'] ?>"></a>
                            <!-- <a class="btn col-lg-12  btn-info" href="<?php //echo base_url() ?>material/log/<?php //echo $material[$x]['id_material']?>"><i class='fa fa-file'></i> Log</a> -->
                        </td>
                    </tr>


                    <!-- ****************************** MODAL DETAIL ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modaldetail<?php echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Detail Data Material</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_material" class="form-control" value="<?php echo $material[$x]['id_material']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Nama Material</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="subjenis" class="form-control"
                                        value="<?php echo $material[$x]['nama_jenis_material'] . ' ' . $material[$x]['nama_sub_jenis_material'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Jenis Material</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jenis" class="form-control"
                                        value="<?php echo $material[$x]['nama_jenis_material'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tanggal Masuk</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="tgl_masuk" class="form-control"
                                        value="<?php
                                            $waktu = $material[$x]['tanggal_masuk'];

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
                                        ?>" readonly>
                                    </div>
                                </div>
                                <?php if ($material[$x]['sumber_material']==0){ 
                                    for($sup=0; $sup<count($materialsup); $sup++){
                                        if($material[$x]['id_material']==$materialsup[$sup]['id_material']){ ?>
                                            <div class="form-group mt-lg">
                                                <label class="col-sm-3 control-label">Supplier</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="jenis" class="form-control"
                                                    value="<?php echo $materialsup[$sup]['nama_supplier'] ?>" readonly>
                                                </div>
                                            </div>
                                <?php } } }
                                    else if ($material[$x]['sumber_material']==1){
                                        for($line=0; $line<count($materialline); $line++){
                                            if($material[$x]['id_material']==$materialline[$line]['id_material']){ ?>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-3 control-label">Supplier</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="jenis" class="form-control"
                                                        value="<?php echo $materialline[$line]['nama_line'] ?>" readonly>
                                                    </div>
                                                </div>
                                <?php } } } ?>
                                <!--<div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">No. Invoice</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_invoice" class="form-control"
                                        value="<?php echo $material[$x]['nomor_invoice'] ?>" readonly>
                                    </div>
                                </div> -->
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="status" class="form-control"
                                        value="<?php
                                            if ($material[$x]['status_keluar']==0){
                                                echo "Masih di gudang";
                                            }else{
                                                echo "Keluar Gudang";
                                            }  ?> " readonly>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="button" class="btn btn-default modal-dismiss">OK</button>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </div>
                    <!-- **************************** END MODAL DETAIL **************************** -->
                    <!-- ************************************************************************** -->



                    <!-- ******************************* MODAL EDIT ******************************* -->
                    <!-- ************************************************************************** -->
                    <div id='modaledit<?php echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Material/edit_material" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Edit Data Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_material" class="form-control" value="<?php echo $material[$x]['id_material']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Material</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="subjenis" class="form-control"
                                            value="<?php echo $material[$x]['nama_jenis_material'] . ' ' . $material[$x]['nama_sub_jenis_material'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status_keluar" id="jabatan" required>
                                                <option value="0" <?php if ($material[$x]['status_keluar'] == 0){
                                                    echo "selected"; }?>> Masih di Gudang
                                                </option>
                                                <option value="1" <?php if ($material[$x]['status_keluar'] == 1){
                                                    echo "selected"; }?>>Keluar Gudang
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <!-- ***************************** END MODAL EDIT ***************************** -->
                    <!-- ************************************************************************** -->


                    <!-- ******************************* MODAL HAPUS ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modalhapus<?php echo $material[$x]['id_material']?>' class="modal-block modal-block-primary mfp-hide">
                        <section class="panel">
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Material/hapus_material" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Hapus Data material</h2>
                                </header>

                                <div class="panel-body" style="color: black">
                                    <input type="hidden" name="id_material" class="form-control" value="<?php echo $material[$x]['id_material']?>" readonly>
                                    
                                    Apakah anda yakin akan menghapus data material <?php echo $material[$x]['nama_jenis_material'] . ' ' . $material[$x]['nama_sub_jenis_material']?>?
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-danger" value="Hapus">
                                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                    </div>
                    <!-- ***************************** END MODAL HAPUS ***************************** -->
                    <!-- ************************************************************************** -->

                <?php } ?>
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
    function reload() {
    location.reload();
    }
</script>
