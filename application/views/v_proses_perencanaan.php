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

<h1>Detail Perencanaan</h1>
<hr>

    <form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
        <div class="panel-body">
            <input type="hidden" name="id_user" class="form-control" value="BM-<?php //echo $jumlah_user + 1?>" readonly>
            
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Produk</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" value="Compact Mattress" readonly>
                </div>
            </div>
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Jumlah</label>
                <div class="col-sm-7">
                    <input type="number" class="form-control" value="120" readonly>
                </div>
            </div>
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Tanggal Produksi</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" value="29 Juli 2020" readonly>
                </div>
            </div>

            <div class="form-group mt-lg">
                <center><h4> Daftar Material </h4></center>
            </div>


<!-- ****************************************** DAFTAR MATERIAL ************************************** -->
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <!-- <a href="#" class="fa fa-times"></a> -->
                    </div>

                    <h2 class="panel-title">Reb 55</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_user" class="form-control" value="BM-<?php //echo $jumlah_user + 1?>" readonly>
                
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Kebutuhan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="18.24 m3" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Sudah Diambil</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="3 m3" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Belum Diambil</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="15.24 m3" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Stok di Gudang</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="15 m3" readonly>
                            <span class="required">*</span> Stok Kurang
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <table class="table table-bordered table-striped table-hover" border="1">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Tanggal Pengambilan</th>
                                    <th style="text-align:center">Jumlah</th>
                                    <th style="text-align:center">Satuan</th>
                                    <th style="text-align:center">Status Pengambilan</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-lg-2">29 Juli 2020</td>
                                    <td class="col-lg-2">3</td>
                                    <td class="col-lg-2">m3</td>
                                    <td class="col-lg-3">Sudah Diambil</td>
                                    <td class="col-lg-3">
                                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                            title="Detail" href="#modaldetail"></a>
                                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                            title="Edit" href="#modaledit2"></a>
                                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                            title="Delete" href="#modalhapus"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-lg-2">31 Juli 2020</td>
                                    <td class="col-lg-2">3</td>
                                    <td class="col-lg-2">m3</td>
                                    <td class="col-lg-3">Belum Diambil</td>
                                    <td class="col-lg-3">
                                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                            title="Detail" href="#modaldetail"></a>
                                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                            title="Edit" href="#modaledit2"></a>
                                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                            title="Delete" href="#modalhapus"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <button type="button" class="modal-with-form btn btn-primary" href="#modalbeli">Request Pembelian</button>
                            <button type="button" class="modal-with-form btn btn-primary" href="#modalambil">Tambah Jadwal Pengambilan</button>
                        </div>
                    </div>
                </div>
                    
            </section>


            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <!-- <a href="#" class="fa fa-times"></a> -->
                    </div>

                    <h2 class="panel-title">Benang</h2>
                </header>

                <div class="panel-body">
                    <input type="hidden" name="id_user" class="form-control" value="BM-<?php //echo $jumlah_user + 1?>" readonly>
                
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Kebutuhan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="2000 m" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Sudah Diambil</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="0 m" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Belum Diambil</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="2000 m" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Stok di Gudang</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="3000 m" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <table class="table table-bordered table-striped table-hover" border="1">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Tanggal Pengambilan</th>
                                    <th style="text-align:center">Jumlah</th>
                                    <th style="text-align:center">Satuan</th>
                                    <th style="text-align:center">Status Pengambilan</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center">Belum Direncanakan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <button type="button" class="modal-with-form btn btn-primary" href="#modalbeli">Request Pembelian</button>
                            <button type="button" class="modal-with-form btn btn-primary" href="#modalambil">Tambah Jadwal Pengambilan</button>
                        </div>
                    </div>
                </div>
                    
            </section>
<!-- *************************************** END DAFTAR MATERIAL ************************************** -->


            <!-- ******************************** MODAL BELI ****************************** -->
            <!-- ************************************************************************** -->
            <div id='modalbeli' class="modal-block modal-block-md mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Request Pembelian Material</h2>
                    </header>

                    <div class="panel-body">
                        <input type="hidden" name="id_material" class="form-control" value="" readonly>
                        
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Material</label>
                            <div class="col-sm-9">
                                <input type="text" name="material" class="form-control"
                                value="Reb 55" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Jumlah Material</label>
                            <div class="col-sm-9">
                                <input type="number" name="jabatan" class="form-control"
                                placeholder="Stok Max: 30 m3">
                                Stok Di Gudang : 15 m3
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" id="tambah" class="btn btn-primary" value="Request" onclick="reload()">
                                <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>
            <!-- ****************************** END MODAL BELI **************************** -->
            <!-- ************************************************************************** -->


            <!-- ******************************** MODAL AMBIL ***************************** -->
            <!-- ************************************************************************** -->
            <div id='modalambil' class="modal-block modal-block-md mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Pengambilan Material</h2>
                    </header>

                    <div class="panel-body">
                        <input type="hidden" name="id_material" class="form-control" value="" readonly>
                        
                        <div class="form-group mt-lg">
                            <label class="col-sm-4 control-label">Material</label>
                            <div class="col-sm-8">
                                <input type="text" name="material" class="form-control"
                                value="Reb 55" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-4 control-label">Tanggal Pengambilan</label>
                            <div class="col-sm-8">
                                <input type="date" name="jabatan" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-4 control-label">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="number" name="jabatan" class="form-control" placeholder="Belum diambil : 15.24 m3">
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-4 control-label">Satuan</label>
                            <div class="col-sm-8">
                                <input type="text" name="jabatan" class="form-control" value="m3" readonly>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" id="tambah" class="btn btn-primary" value="Simpan" onclick="reload()">
                                <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>
            <!-- ****************************** END MODAL AMBIL *************************** -->
            <!-- ************************************************************************** -->


        </div>
    </form>


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