<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Purchase Order Supplier</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Purchase Order Supplier</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Purchase Order Supplier</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar PO Supplier</h2>
    </header>
    <div class="panel-body">
    
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-2">No. PO</th>
                    <th class="col-lg-3">Supplier</th>
                    <th class="col-lg-2">Tanggal PO</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<count($po_sup) ; $x++){
                        if ($status == 0 || $status == 3){ //dalam proses
                            if($po_sup[$x]['status_po'] == 0 || $po_sup[$x]['status_po'] == 1 || $po_sup[$x]['status_po'] == 2 || $po_sup[$x]['status_po'] == 3){
                ?>
                <tr>
                    <td> <?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['nama_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['tanggal_po'] ?> </td>
                    <td>
                        <?php
                            if($po_sup[$x]['status_po'] == 0){
                                echo "Menunggu Persetujuan";
                            } else if($po_sup[$x]['status_po'] == 1){
                                echo "Disetujui, Belum Dikirimkan ke Supplier";
                            } else if($po_sup[$x]['status_po'] == 2){
                                echo "Dikirim, Menunggu Konfirmasi Supplier";
                            } else if($po_sup[$x]['status_po'] == 3){
                                echo "Sedang Diproses"; //proses pembelian
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderSupplier/detail/' . $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a> <br><br>

                        <?php if($po_sup[$x]['status_po'] == 0 && $_SESSION['nama_departemen']=='Management' && $_SESSION['nama_jabatan']=='Direktur'){ ?>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                title="Menyetujui" href="#modalsetuju<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-times"
                                title="Tolak" href="#modaltolak<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <?php }
                        else if($po_sup[$x]['status_po'] == 1 && 
                            (($_SESSION['nama_departemen']=='Purchasing' && $_SESSION['nama_jabatan']=='Admin') || 
                            ($_SESSION['nama_departemen']=='Management' && $_SESSION['nama_jabatan']=='Direktur'))) { ?>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-upload"
                                title="Terkirim" href="#modalkirim<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <?php }
                        else if($po_sup[$x]['status_po'] == 2 && 
                            (($_SESSION['nama_departemen']=='Purchasing' && $_SESSION['nama_jabatan']=='Admin') || 
                            ($_SESSION['nama_departemen']=='Management' && $_SESSION['nama_jabatan']=='Direktur'))){ ?>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                title="Dikonfirmasi" href="#modalkonfirm<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <?php }
                        else if($po_sup[$x]['status_po'] == 3 && 
                            (($_SESSION['nama_departemen']=='Management' && $_SESSION['nama_jabatan']=='Direktur') || 
                            ($_SESSION['nama_departemen']=='Purchasing' && $_SESSION['nama_jabatan']=='Admin'))){ ?>
                            <a class="modal-with-form col-lg-3 btn btn-success fa fa-check"
                                title="Selesaikan" href="#modalselesai<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <?php } ?>
                    </td>
                </tr>
                <?php 
                    }   }
                    if ($status == 1 || $status == 3){
                        if($po_sup[$x]['status_po'] == 4){
                ?>
                <tr>
                    <td> <?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['nama_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['tanggal_po'] ?> </td>
                    <td>
                        <?php
                            if($po_sup[$x]['status_po'] == 4){
                                echo "Selesai";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderSupplier/detail/' . $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                    </td>
                </tr>

                <?php
                    }   }
                    if ($status == 2 || $status == 3){
                        if($po_sup[$x]['status_po'] == 5 || $po_sup[$x]['status_po'] == 6){
                ?>
                <tr>
                    <td> <?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['nama_supplier'] ?> </td>
                    <td> <?php echo $po_sup[$x]['tanggal_po'] ?> </td>
                    <td>
                        <?php
                            if($po_sup[$x]['status_po'] == 5){
                                echo "Batal";
                            } else if($po_sup[$x]['status_po'] == 6){
                                echo "Persetujuan Ditolak";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderSupplier/detail/' . $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>"></a>
                    </td>
                </tr>
                <?php } } ?>
                

                <!-- ******************************** MODAL EDIT ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modaledit<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/edit_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Edit PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">No. PO</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_po_supplier" class="form-control"
                                        value="<?php echo $po_sup[$x]['kode_purchase_order_supplier']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tanggal PO</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tgl_po" class="form-control"
                                        value="<?php echo $po_sup[$x]['tanggal_po']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="supplier" class="form-control"
                                        value="<?php echo $po_sup[$x]['nama_supplier']?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Status<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control" required>
                                            <option value="0"
                                                <?php if($po_sup[$x]['status_po'] == 0){
                                                    echo "selected";
                                                }?>> Menunggu Persetujuan Direktur
                                            </option>
                                            <option value="1"
                                                <?php if($po_sup[$x]['status_po'] == 1){
                                                    echo "selected";
                                                }?>> Disetujui, Belum Dikirim ke Supplier
                                            </option>
                                            <option value="2"
                                                <?php if($po_sup[$x]['status_po'] == 2){
                                                    echo "selected";
                                                }?>> Dikirim, Menunggu Konfirmasi Supplier
                                            </option>
                                            <option value="3"
                                                <?php if($po_sup[$x]['status_po'] == 3){
                                                    echo "selected";
                                                }?>> Sedang Diproses
                                            </option>
                                            <option value="4"
                                                <?php if($po_sup[$x]['status_po'] == 4){
                                                    echo "selected";
                                                }?>> Selesai
                                            </option>
                                            <option value="5"
                                                <?php if($po_sup[$x]['status_po'] == 5){
                                                    echo "selected";
                                                }?>> Batal
                                            </option>
                                            <option value="6"
                                                <?php if($po_sup[$x]['status_po'] == 6){
                                                    echo "selected";
                                                }?>> Persetujuan Ditolak
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="keterangan" class="form-control"
                                        value="<?php echo $po_sup[$x]['keterangan']?>">
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
                <!-- ****************************** END MODAL EDIT **************************** -->
                <!-- ************************************************************************** -->


                
                <!-- ******************************* MODAL HAPUS ****************************** -->
                <!-- ************************************************************************** -->
                <div id='modalhapus<?php echo $po_sup[$x]['id_purchase_order_supplier']?>' class="modal-block modal-block-primary mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/hapus_po" method="post">
                            <header class="panel-heading">
                                <h2 class="panel-title">Hapus Data PO Supplier</h2>
                            </header>

                            <div class="panel-body" style="color: black">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                            
                                Apakah anda yakin akan menghapus data PO Supplier dengan Nomor PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier']?></b>?
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



                <!-- ****************************** MODAL DITOLAK ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modaltolak<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/setuju_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Menolak PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                <input type="hidden" name="status" class="form-control" value="6" readonly>
                                
                                Apakah anda yakin akan menolak PO Supplier dengan No. PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?></b>?

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
                <!-- ***************************** END MODAL DITOLAK ************************** -->
                <!-- ************************************************************************** -->

                

                <!-- ****************************** MODAL SETUJU ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalsetuju<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/setuju_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Menyetujui PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                <input type="hidden" name="status" class="form-control" value="1" readonly>
                                
                                Anda akan menyetujui PO Supplier dengan No. PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?></b>.
                                <br> PO Supplier ini akan dikirimkan kepada Supplier <?php echo $po_sup[$x]['nama_supplier'] ?>.

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
                <!-- ***************************** END MODAL SETUJU *************************** -->
                <!-- ************************************************************************** -->



                <!-- ****************************** MODAL SELESAI ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalselesai<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/setuju_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Selesaikan PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                <input type="hidden" name="status" class="form-control" value="4" readonly>
                                
                                Apakah anda yakin akan menyelesaikan PO Supplier dengan No. PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?></b>?
                                <br> PO Supplier ini tidak akan dapat diedit kembali.

                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Selesaikan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
                <!-- **************************** END MODAL SELESAI *************************** -->
                <!-- ************************************************************************** -->



                <!-- ******************************** MODAL KIRIM ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalkirim<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/setuju_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Mengirim PO Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                <input type="hidden" name="status" class="form-control" value="2" readonly>
                                
                                Apakah anda telah mengirimkan PO Supplier dengan No. PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?></b>
                                kepada Supplier <b><?php echo $po_sup[$x]['nama_supplier'] ?></b>?

                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Ya">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Tidak</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                </div>
                <!-- ****************************** END MODAL KIRIM *************************** -->
                <!-- ************************************************************************** -->



                <!-- ****************************** MODAL KONFIRM ***************************** -->
                <!-- ************************************************************************** -->
                <div id='modalkonfirm<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderSupplier/setuju_po" method="post">
                            
                            <header class="panel-heading">
                                <h2 class="panel-title">Konfirmasi Oleh Supplier</h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_supplier" class="form-control" value="<?php echo $po_sup[$x]['id_purchase_order_supplier'] ?>" readonly>
                                <input type="hidden" name="status" class="form-control" value="3" readonly>
                                
                                Supplier <b><?php echo $po_sup[$x]['nama_supplier'] ?></b> telah menyetujui dan memproses 
                                PO Supplier dengan No. PO <b><?php echo $po_sup[$x]['kode_purchase_order_supplier'] ?></b>. 
                                Status PO akan diubah menjadi <b>Sedang Diproses</b>.

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
                <!-- **************************** END MODAL KONFIRM *************************** -->
                <!-- ************************************************************************** -->

            <?php } ?>
            </tbody>
        </table>
    </div>


    <!-- ******************************* MODAL BELI ******************************* -->
    <!-- ************************************************************************** -->
    <div id='modalbeli' class="modal-block modal-block-md mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Pilih Material Yang Akan Dibeli</h2>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id_user" class="form-control" value="" readonly>

                <div class="form-group mt-lg">
                    <div class="col-sm-9">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Kode Material</th>
                                    <th>Nama Material</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-2">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" id="checkboxExample2">
                                            <label for="checkboxExample2"></label>
                                        </div>
                                    </td>
                                    <td class="col-lg-3"> MAT123 </td>
                                    <td class="col-lg-3"> Foam </td>
                                    <td class="col-lg-2"> 15 </td>
                                    <td class="col-lg-3"> pc </td>
                                    <td class="col-lg-2"> Stok kurang</td>
                                </tr>
                                <tr>
                                    <td class="col-2">
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" id="checkboxExample2">
                                            <label for="checkboxExample2"></label>
                                        </div>
                                    </td>
                                    <td class="col-lg-3"> MAT109 </td>
                                    <td class="col-lg-3"> Kain </td>
                                    <td class="col-lg-2"> 10 </td>
                                    <td class="col-lg-3"> pc </td>
                                    <td class="col-lg-2"> Stok tersedia</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
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
    