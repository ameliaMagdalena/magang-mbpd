<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Jenis Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Jenis Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Detail Jenis Material <?php echo $jenis_material[0]['nama_jenis_material']?></h1>
<hr>

<!--
    subjenis = select subjenis join jenis

 -->

<section class="panel">
    <div class="panel-body">
        <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[0]['id_jenis_material']?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Nama Jenis Material</label>
            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control"
                value="<?php echo $jenis_material[0]['nama_jenis_material']?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Kode Jenis Material</label>
            <div class="col-sm-9">
                <input type="text" name="kode" class="form-control"
                value="<?php echo $jenis_material[0]['kode_jenis_material'] ?> " readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Sumber Jenis Material</label>
            <div class="col-sm-9">
                <input type="text" name="sumber" class="form-control"
                value="<?php if ($jenis_material[0]['sumber_material'] == 0){
                    echo "Supplier";
                } else{
                    echo "Produksi";
                } ?> " readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <div class="col-sm-12">
                <h3 style="display: inline-block">Sub Jenis Material</h3>
                <a class="modal-with-form btn btn-success pull-right" href="#modaltambahmaterial"> + Tambah Sub Jenis Material</a>

                <!-- **************************** MODAL TAMBAH SUB **************************** -->
                <!-- ************************************************************************** -->
                <div id='modaltambahmaterial' class="modal-block modal-block-primary mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>JenisMaterial/tambah_sub" method="post">
                            <header class="panel-heading">
                                <h2 class="panel-title">Tambah Sub Jenis Material</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_sub_jenis_material" class="form-control" value="SUBJM-<?php echo $jumlah_sub + 1?>" readonly>
                                <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[0]['id_jenis_material']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Nama Sub Jenis Material<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nama_sub_jenis_material" class="form-control"
                                        placeholder="Spesifikasi Utama, Contoh: 8x50 MM"  required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Kode Sub Jenis Material<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="kode_sub_jenis_material" class="form-control"
                                        placeholder="format atau kode terakhir"  required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Sumber<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <?php  if ($jenis_material[0]['sumber_material'] == 0){ ?>
                                            <input type="hidden" name="sumber" value="o" class="form-control" readonly>
                                            <input type="text" value="Supplier" class="form-control" readonly>
                                        <?php  } else{ ?>
                                            <select class="form-control" name="sumber" required>
                                                <option value="1">WIP Line Cutting</option>
                                                <option value="2">WIP Line Bonding</option>
                                                <option value="3">WIP Line Sewing</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Satuan<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="satuan" class="form-control"
                                        placeholder="Contoh: pcs, blek, rol, dll." required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Satuan Keluar<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="satuan_keluar" class="form-control"
                                        placeholder="Contoh: meter, liter, dll." required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Ukuran Satuan Keluar<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="number" name="ukuran_satuan_keluar" class="form-control"
                                        placeholder="Ukuran satuan keluar untuk 1 satuan" required>
                                        <small>Contoh: <b>1</b> satuan <b>Pcs</b> = <b>12</b> ukuran satuan keluar <b>meter</b></small>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Minimal Stok<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="number" name="min_stok" class="form-control"
                                        placeholder="Minimal stok" required>
                                        <small>Jika tidak terdapat minimal stok, masukkan angka 0.</small>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Maksimal Stok<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="number" name="max_stok" class="form-control"
                                        placeholder="Maksimal stok" required>
                                        <small>Jika tidak terdapat maksimal stok, masukkan angka 0.</small>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" id="tambah" class="btn btn-primary" value="Tambahkan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>

                <br>
                <br>

                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th class="col-lg-3">Sub Jenis Material</th>
                            <th class="col-lg-1">Unit</th>
                            <th class="col-lg-2">Unit Keluar</th>
                            <th class="col-lg-2">Sumber</th>
                            <th class="col-lg-1">Jumlah Di Gudang</th>
                            <th class="col-lg-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        for($y=0 ; $y<count($sub_jenis); $y++){
                    ?>
                        <tr>
                            <td> <?php echo $sub_jenis[$y]['nama_sub_jenis_material']?></td>
                            <td> <?php echo $sub_jenis[$y]['satuan_ukuran']?></td>
                            <td> <?php echo $sub_jenis[$y]['satuan_keluar']?></td>
                            <td> <?php if ($sub_jenis[$y]['sumber'] == 0){
                                echo "Supplier";
                            } else if ($sub_jenis[$y]['sumber'] == 1){
                                echo "WIP Line Cutting";
                            } else if ($sub_jenis[$y]['sumber'] == 2){
                                echo "WIP Line Bonding";
                            } else{
                                echo "WIP Line Sewing";
                            } ?></td>
                            <td>
                                <?php
                                $jumlah_material = 0;
                                for($z=0; $z<count($material); $z++){
                                    if($sub_jenis[$y]['id_sub_jenis_material'] == $material[$z]['id_sub_jenis_material']){
                                        $jumlah_material=$jumlah_material+1;
                                    }
                                } echo $jumlah_material;?>
                            </td>
                            <td>
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetailsub<?php echo $sub_jenis[$y]['id_sub_jenis_material'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaleditsub<?php echo $sub_jenis[$y]['id_sub_jenis_material'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Delete" href="#modalhapussub<?php echo $sub_jenis[$y]['id_sub_jenis_material'] ?>"></a>
                                <!-- <a class="btn col-lg-12  btn-info" href="<?php //echo base_url() ?>user/log/<?php echo $user[$x]['id_user']?>"><i class='fa fa-file'></i> Log</a> -->
                            </td>
                        </tr>

                        <!-- ****************************** MODAL DETAIL ****************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modaldetailsub<?php echo $sub_jenis[$y]['id_sub_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Detail Data Jenis Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_sub_jenis_material" class="form-control" value="<?php echo $sub_jenis[$y]['id_sub_jenis_material']?>" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Nama Sub Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama_sub" class="form-control"
                                            value="<?php echo $sub_jenis[$y]['nama_sub_jenis_material'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Kode Sub Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="kode" class="form-control"
                                            value="<?php echo $sub_jenis[$y]['kode_sub_jenis_material'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Jenis Material</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nama_jenis" class="form-control"
                                            value="<?php echo $sub_jenis[$y]['nama_jenis_material'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Satuan</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="satuan" class="form-control"
                                            value="<?php echo $sub_jenis[$y]['satuan_ukuran'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Sumber</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="sumber" 
                                                value="<?php if ($sub_jenis[$y]['sumber'] == 0){
                                                    echo "Supplier";
                                                } else if ($sub_jenis[$y]['sumber'] == 1){
                                                    echo "WIP Line Cutting";
                                                } else if ($sub_jenis[$y]['sumber'] == 2){
                                                    echo "WIP Line Bonding";
                                                } else{
                                                    echo "WIP Line Sewing";
                                                } ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Satuan Keluar</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="satuan_keluar" class="form-control"
                                            value="<?php echo $sub_jenis[$y]['satuan_keluar'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-12 control-label" style="text-align: center">Ukuran Satuan Keluar <b><?php echo $jenis_material[0]['nama_jenis_material'] . " " . $sub_jenis[$y]['nama_sub_jenis_material'] ?></b></label>
                                        <div class="col-sm-12" style="text-align: center">
                                            1 <?php echo $sub_jenis[$y]['satuan_ukuran'] ?> = <?php echo $sub_jenis[$y]['ukuran_satuan_keluar'] . " " . $sub_jenis[$y]['satuan_keluar'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Jumlah Di Gudang</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="jumlah" class="form-control"
                                            value="<?php $jumlah_material = 0;
                                                for($z=0; $z<count($material); $z++){
                                                    if($sub_jenis[$y]['id_sub_jenis_material'] == $material[$z]['id_sub_jenis_material']){
                                                        $jumlah_material=$jumlah_material+1;
                                                    }
                                                }
                                            echo $jumlah_material;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Minimal Stok</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="min_stok" class="form-control"
                                            value="<?php echo $sub_jenis[$y]['min_stok'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-4 control-label">Maksimal Stok</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="max_stok" class="form-control"
                                            value="<?php echo $sub_jenis[$y]['max_stok'] ?>" readonly>
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


                        <!-- ******************************** MODAL EDIT ****************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modaleditsub<?php echo $sub_jenis[$y]['id_sub_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <form class="form-horizontal mb-lg" action="<?php echo base_url()?>JenisMaterial/edit_sub" method="post">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Edit Data Material</h2>
                                    </header>

                                    <div class="panel-body">
                                        <input type="hidden" name="id_sub_jenis_material" class="form-control" value="<?php echo $sub_jenis[$y]['id_sub_jenis_material']?>" readonly>
                                        <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[0]['id_jenis_material']?>" readonly>
                                        
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Nama Sub Jenis Material</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama_sub_jenis_material" class="form-control"
                                                value="<?php echo $sub_jenis[$y]['nama_sub_jenis_material']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Kode Sub Jenis Material</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="kode_sub_jenis_material" class="form-control"
                                                value="<?php echo $sub_jenis[$y]['kode_sub_jenis_material']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Jenis Material</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="jenis" class="form-control"
                                                value="<?php echo $sub_jenis[$y]['nama_jenis_material'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Sumber<span class="required">*</span></label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="sumber" required>
                                                    <option value="0" <?php if ($sub_jenis[$y]['sumber'] == 0){ echo "selected"; } ?>>Supplier</option>
                                                    <option value="1" <?php if ($sub_jenis[$y]['sumber'] == 1){ echo "selected"; } ?>>WIP Line Cutting</option>
                                                    <option value="2" <?php if ($sub_jenis[$y]['sumber'] == 2){ echo "selected"; } ?>>WIP Line Bonding</option>
                                                    <option value="3" <?php if ($sub_jenis[$y]['sumber'] == 3){ echo "selected"; } ?>>WIP Line Sewing</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Satuan</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="satuan" class="form-control"
                                                value="<?php echo $sub_jenis[$y]['satuan_ukuran'] ?>"
                                                placeholder="Contoh: pcs, blek, rol, dll." required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Satuan Keluar</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="satuan_keluar" class="form-control"
                                                value="<?php echo $sub_jenis[$y]['satuan_keluar'] ?>"
                                                placeholder="Contoh: meter, liter, dll." required>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Ukuran Satuan Keluar</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="ukuran_satuan_keluar" class="form-control"
                                                    value="<?php echo $sub_jenis[$y]['ukuran_satuan_keluar'] ?>"
                                                    placeholder="Ukuran satuan keluar untuk 1 satuan" required>
                                                <small>Contoh: <b>1</b> satuan <b>Pcs</b> = <b>12</b> ukuran satuan keluar <b>meter</b></small>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Minimal Stok</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="min_stok" class="form-control"
                                                value="<?php echo $sub_jenis[$y]['min_stok'] ?>" placeholder="Min Stok" required>
                                                <small>Jika tidak terdapat minimal stok, masukkan angka 0.</small>
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Maksimal Stok</label>
                                            <div class="col-sm-8">
                                                <input type="number" name="max_stok" class="form-control"
                                                value="<?php echo $sub_jenis[$y]['max_stok'] ?>" placeholder="Max Stok" required>
                                                <small>Jika tidak terdapat maksimal stok, masukkan angka 0.</small>
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
                                </form>
                            </section>
                        </div>
                        <!-- ***************************** END MODAL EDIT ***************************** -->
                        <!-- ************************************************************************** -->


                        <!-- ******************************* MODAL HAPUS ****************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modalhapussub<?php echo $sub_jenis[$y]['id_sub_jenis_material']?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <form class="form-horizontal mb-lg" action="<?php echo base_url()?>JenisMaterial/hapus_sub" method="post">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Hapus Data Customer</h2>
                                    </header>

                                    <div class="panel-body" style="color: black">
                                        <input type="hidden" name="id_jenis_material" class="form-control" value="<?php echo $jenis_material[0]['id_jenis_material']?>" readonly>
                                        <input type="hidden" name="id_sub_jenis_material" class="form-control" value="<?php echo $sub_jenis[$y]['id_sub_jenis_material']?>" readonly>
                                        Apakah anda yakin akan menghapus material <?php echo $sub_jenis[$y]['nama_sub_jenis_material']?>?
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-danger" value="Hapus">
                                                <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                            </div>
                                        </div>
                                    </footer>
                                </form>
                            </section>
                        </div>
                        <!-- ***************************** END MODAL HAPUS **************************** -->
                        <!-- ************************************************************************** -->

                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
