<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pemasukan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pemasukan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pemasukan Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Material Masuk</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>No.</th>
                    <th style="text-align:center" class="col-lg-2">Tanggal Masuk</th>
                    <th style="text-align:center" class="col-lg-3">Material</th>
                    <th style="text-align:center" class="col-lg-1">Jumlah</th>
                    <th style="text-align:center" class="col-lg-1">Satuan</th>
                    <th style="text-align:center" class="col-lg-2">Sumber</th>
                    <th style="text-align:center" class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php for($x=0 ; $x<count($pemasukan) ; $x++){ ?>
                <tr>
                    <td> <?php echo $x+1?></td>
                    <td> <?php echo $pemasukan[$x]['tanggal_masuk']?></td>
                    <td> <?php echo $pemasukan[$x]['kode_sub_jenis_material'] . " - " . $pemasukan[$x]['nama_jenis_material'] . " " . $pemasukan[$x]['nama_sub_jenis_material']?></td>
                    <td style="text-align:center"> <?php echo $pemasukan[$x]['jumlah_masuk']?></td>
                    <td style="text-align:center"> <?php echo $pemasukan[$x]['satuan_ukuran']?></td>
                    
                    <td>
                        <?php
                            if($pemasukan[$x]['keterangan_masuk']==0){
                                for($a=0; $a<count($material); $a++){
                                    if($material[$a]['id_pemasukan_material']==$pemasukan[$x]['id_pemasukan_material']){
                                        for($b=0; $b<count($materialsup); $b++){
                                            if($material[$a]['id_material']==$materialsup[$b]['id_material']){
                                                echo "Supplier: ". $materialsup[$b]['nama_supplier'];
                                            }
                                        }
                                    }
                                }
                                
                            } 
                            else if($pemasukan[$x]['keterangan_masuk']==1){
                                for($a=0; $a<count($material); $a++){
                                    if($material[$a]['id_pemasukan_material']==$pemasukan[$x]['id_pemasukan_material']){
                                        for($b=0; $b<count($materialline); $b++){
                                            if($material[$a]['id_material']==$materialline[$b]['id_material']){
                                                echo "Line: ". $materialline[$b]['nama_line'];
                                            }
                                        }
                                    }
                                }
                                
                            }
                        ?>
                    </td>
                    <td>
                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="#modaldetail<?php echo $pemasukan[$x]['id_pemasukan_material']?>"></a>
                        <!-- <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Delete" href="#modalhapus<?php //echo $material[$x]['id_material'] ?>"></a> -->
                    </td>
                </tr>

                    <!-- ****************************** MODAL DETAIL ****************************** -->
                    <!-- ************************************************************************** -->
                    <div id='modaldetail<?php echo $pemasukan[$x]['id_pemasukan_material']?>' class="bd-example-modal-lg modal-block modal-block-lg mfp-hide">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Detail Data Material Masuk</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_material" class="form-control" value="<?php //echo $material[$x]['id_material']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tanggal Masuk</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="masuk" class="form-control"
                                        value="<?php echo $pemasukan[$x]['tanggal_masuk']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Jenis Material</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="material" class="form-control"
                                        value="<?php echo $pemasukan[$x]['kode_sub_jenis_material'] . " - " . $pemasukan[$x]['nama_jenis_material'] . " " . $pemasukan[$x]['nama_sub_jenis_material']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jumlah" class="form-control"
                                        value="<?php echo $pemasukan[$x]['jumlah_masuk']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Satuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="satuan" class="form-control"
                                        value="<?php echo $pemasukan[$x]['satuan_ukuran']?>" readonly>
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