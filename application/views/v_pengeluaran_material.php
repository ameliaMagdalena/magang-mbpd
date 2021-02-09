<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengeluaran Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pengeluaran Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pengeluaran Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Material Keluar</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Keluar</th>
                    <th>Jenis Material</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php for($x=0; $x<count($keluar); $x++){ ?>
                <tr>
                    <td class="col-2"> <?php echo $x+1?></td>
                    <td class="col-lg-3">
                        <?php
                            $waktu = $keluar[$x]['tanggal_keluar'];

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
                    <td class="col-lg-3"> <?php echo $keluar[$x]['kode_sub_jenis_material'] ." - ". $keluar[$x]['nama_jenis_material']." ".$keluar[$x]['nama_sub_jenis_material']?></td>
                    <td class="col-lg-2"> <?php echo $keluar[$x]['jumlah_keluar']?></td>
                    <td class="col-lg-4">
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail<?php echo $keluar[$x]['id_pengeluaran_material'] ?>"></a>
                        <!-- <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Delete" href="#modalhapus<?php echo $keluar[$x]['id_pengeluaran_material'] ?>"></a> -->
                    </td>
                </tr>

                    <!-- ****************************** MODAL DETAIL ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modaldetail<?php echo $keluar[$x]['id_pengeluaran_material'] ?>' class="bd-example-modal-lg modal-block modal-block-md mfp-hide">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Detail Data Material Keluar</h2>
                            </header>

                            <div class="panel-body">
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tanggal Keluar</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control"
                                        value="<?php
                                            $waktu = $keluar[$x]['tanggal_keluar'];

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
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Jenis Material</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control"
                                        value="<?php echo $keluar[$x]['kode_sub_jenis_material'] ." - ". $keluar[$x]['nama_jenis_material']." ".$keluar[$x]['nama_sub_jenis_material'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dept" class="form-control"
                                        value="<?php echo $keluar[$x]['jumlah_keluar'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Satuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jabatan" class="form-control"
                                        value="<?php echo $keluar[$x]['satuan_ukuran'] ?> " readonly>
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