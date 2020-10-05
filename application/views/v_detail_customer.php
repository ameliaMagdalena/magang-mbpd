<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Customer</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Customer</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Detail Customer <?php echo $customer[0]['nama_customer']?></h1>
<hr>

<section class="panel">
    <div class="panel-body">
        <input type="hidden" name="id_customer" class="form-control" value="<?php echo $customer[0]['id_customer']?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Nama Customer</label>
            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control"
                value="<?php echo $customer[0]['nama_customer']?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">E-mail</label>
            <div class="col-sm-9">
                <input type="email" name="email_customer" class="form-control"
                value="<?php echo $customer[0]['email_customer'] ?> " readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. Telp</label>
            <div class="col-sm-9">
                <input type="text" name="no_telp_customer" class="form-control"
                value="<?php echo $customer[0]['no_telp_customer'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" name="alamat_customer" class="form-control"
                value="<?php echo $customer[0]['alamat_customer'] ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <div class="col-sm-12">
                <h3 style="display: inline-block">Data Sub Customer</h3>
                <a class="modal-with-form btn btn-success pull-right" href="#modaltambahsub"> + Tambah Sub Customer</a>

                <!-- *********************** MODAL TAMBAH SUB CUSTOMER ************************ -->
                <!-- ************************************************************************** -->
                <div id='modaltambahsub' class="modal-block modal-block-primary mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Customer/tambah_sub_customer" method="post">
                            <header class="panel-heading">
                                <h2 class="panel-title">Masukkan Data Sub Customer</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_sub_customer" class="form-control" value="SUBCUST-<?php echo $jumlah_sub_cust + 1?>" readonly>
                                <input type="hidden" name="id_customer" class="form-control" value="<?php echo $customer[0]['id_customer']?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Nama Sub Customer<span class="required">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_sub_customer" class="form-control"
                                        placeholder="Nama sub customer" required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">Nama PIC<span class="required">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_pic" class="form-control"
                                        placeholder="Nama PIC" required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-4 control-label">No. Telp. PIC<span class="required">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_telp_pic" class="form-control"
                                        placeholder="No. telepon PIC" required>
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

                <br>
                <br>

                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>Nama Sub Customer</th>
                            <th>PIC</th>
                            <th>No Telp. PIC</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        for($y=0 ; $y<count($sub_customer); $y++){
                    ?>
                        <tr>
                            <td class="col-lg-3"> <?php echo $sub_customer[$y]['nama_sub_customer']?></td>
                            <td class="col-lg-2"> <?php echo $sub_customer[$y]['nama_pic']?></td>
                            <td class="col-lg-2"> <?php echo $sub_customer[$y]['no_telp_pic']?></td>
                            <td class="col-lg-4">
                                <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                    title="Edit" href="#modaleditsub<?php echo $sub_customer[$y]['id_sub_customer'] ?>"></a>
                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                    title="Delete" href="#modalhapussub<?php echo $sub_customer[$y]['id_sub_customer'] ?>"></a>
                                <!-- <a class="btn col-lg-12  btn-info" href="<?php //echo base_url() ?>user/log/<?php echo $user[$x]['id_user']?>"><i class='fa fa-file'></i> Log</a> -->
                            </td>
                        </tr>


                        <!-- ****************************** MODAL EDIT SUB ***************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modaleditsub<?php echo $sub_customer[$y]['id_sub_customer']?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Customer/edit_sub_customer" method="post">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Edit Data Customer</h2>
                                    </header>

                                    <div class="panel-body">
                                        <input type="hidden" name="id_sub_customer" class="form-control" value="<?php echo $sub_customer[$y]['id_sub_customer']?>" readonly>
                                        <input type="hidden" name="id_customer" class="form-control" value="<?php echo $customer[0]['id_customer']?>" readonly>
                                        
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Nama Sub Customer</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama_sub_customer" class="form-control"
                                                value="<?php echo $sub_customer[$y]['nama_sub_customer']?>">
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">Nama PIC</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama_pic" class="form-control"
                                                value="<?php echo $sub_customer[$y]['nama_pic'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">No. Telp. PIC</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="no_telp_pic" class="form-control"
                                                value="<?php echo $sub_customer[$y]['no_telp_pic'] ?>">
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
                        <!-- *************************** END MODAL EDIT SUB *************************** -->
                        <!-- ************************************************************************** -->


                        <!-- ***************************** MODAL HAPUS SUB **************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modalhapussub<?php echo $sub_customer[$y]['id_sub_customer']?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <form class="form-horizontal mb-lg" action="<?php echo base_url()?>Customer/hapus_sub_customer" method="post">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Hapus Data Customer</h2>
                                    </header>

                                    <div class="panel-body" style="color: black">
                                        <input type="hidden" name="id_customer" class="form-control" value="<?php echo $customer[0]['id_customer']?>" readonly>
                                        <input type="hidden" name="id_sub_customer" class="form-control" value="<?php echo $sub_customer[$y]['id_sub_customer']?>" readonly>
                                        Apakah anda yakin akan menghapus data sub customer <?php echo $sub_customer[$y]['nama_sub_customer']?>?
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
                        <!-- *************************** END MODAL HAPUS SUB ************************** -->
                        <!-- ************************************************************************** -->

                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
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
