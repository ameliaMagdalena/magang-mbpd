<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Purchase Order Customer</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Purchase Order Customer</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Purchase Order Customer</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar PO Customer</h2>
    </header>
    <div class="panel-body">
    
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-2">No. PO</th>
                    <th class="col-lg-3">Tanggal PO</th>
                    <th class="col-lg-2">Customer</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<count($po_cust) ; $x++){
                        if ($status == 0 || $status == 3){ // dalam proses & semua
                            if($po_cust[$x]['status_po'] == 0 || $po_cust[$x]['status_po'] == 1){
                ?>
                <tr>
                    <td> <?php echo $po_cust[$x]['kode_purchase_order_customer'] ?> </td>
                    <td>
                        <?php 
                            $waktu = $po_cust[$x]['tanggal_po'];

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
                    <td> <?php echo $po_cust[$x]['nama_customer'] ?> </td>
                    <td>
                        <?php
                            if($po_cust[$x]['status_po'] == 0){
                                echo "Disetujui, Belum Diproses";
                            } else if($po_cust[$x]['status_po'] == 1){
                                echo "Sedang Diproses";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderCustomer/detail/' . $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <!-- <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                            title="Edit" href="#modaledit<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a>  -->
                    </td>
                </tr>
                <?php
                    }   }
                        if ($status == 1 || $status == 3){ //selesai dan semua
                            if($po_cust[$x]['status_po'] == 2){
                ?>
                <tr>
                    <td> <?php echo $po_cust[$x]['kode_purchase_order_customer'] ?> </td>
                    <td>
                        <?php 
                            $waktu = $po_cust[$x]['tanggal_po'];

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
                    <td> <?php echo $po_cust[$x]['nama_customer'] ?> </td>
                    <td>
                        <?php
                            if($po_cust[$x]['status_po'] == 2){
                                echo "Selesai";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderCustomer/detail/' . $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <!-- <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a> -->
                    </td>
                </tr>
                <?php
                    }   }
                        if ($status == 2 || $status == 3){ //batal dan semua
                            if($po_cust[$x]['status_po'] == 3){ 
                ?>
                <tr>
                    <td> <?php echo $po_cust[$x]['kode_purchase_order_customer'] ?> </td>
                    <td>
                        <?php 
                            $waktu = $po_cust[$x]['tanggal_po'];

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
                    <td> <?php echo $po_cust[$x]['nama_customer'] ?> </td>
                    <td>
                        <?php
                            if($po_cust[$x]['status_po'] == 3){
                                echo "Batal";
                            }
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderCustomer/detail/' . $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                        <!-- <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                            title="Hapus" href="#modalhapus<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>"></a> -->
                    </td>
                </tr>
                <?php }} ?>
                
                
                <!-- ******************************* MODAL EDIT ******************************* -->
                <!-- ************************************************************************** -->
                <div id='modaledit<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>' class="modal-block modal-block-md mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/edit_po" method="post">
                            <header class="panel-heading">
                                <h2 class="panel-title">Edit Purchase Order Customer <?php echo $po_cust[$x]['kode_purchase_order_customer'] ?></h2>
                            </header>

                            <div class="panel-body">
                                <input type="hidden" name="id_po_customer" class="form-control" value="<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>" readonly>
                                
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tanggal PO<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="date" name="tgl_po" class="form-control"
                                            value="<?php echo $po_cust[$x]['tanggal_po'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Nomor PO<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="no_po_customer" class="form-control" 
                                            value="<?php echo $po_cust[$x]['kode_purchase_order_customer'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Customer<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="customer" id="customer" required>
                                            <?php for($a=0; $a<count($customer); $a++){ ?>
                                                <option value="<?php echo $customer[$a]['id_customer'] ?>"
                                                <?php if($customer[$a]['id_customer'] == $po_cust[$x]['id_customer']){ echo "selected"; } ?>>
                                                    <?php echo $customer[$a]['nama_customer']?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Status<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <select name="status" class="form-control" required>
                                            <option value="0"
                                                <?php if($po_cust[$x]['status_po'] == 0){
                                                    echo "selected";
                                                }?>> Disetujui, Belum Diproses
                                            </option>
                                            <option value="1"
                                                <?php if($po_cust[$x]['status_po'] == 1){
                                                    echo "selected";
                                                }?>> Sedang Diproses
                                            </option>
                                            <option value="2"
                                                <?php if($po_cust[$x]['status_po'] == 2){
                                                    echo "selected";
                                                }?>> Selesai
                                            </option>
                                            <option value="3"
                                                <?php if($po_cust[$x]['status_po'] == 3){
                                                    echo "selected";
                                                }?>> Batal
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="keterangan" class="form-control"
                                            value="<?php echo $po_cust[$x]['keterangan'] ?>">
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
                <div id='modalhapus<?php echo $po_cust[$x]['id_purchase_order_customer']?>' class="modal-block modal-block-primary mfp-hide">
                    <section class="panel">
                        <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/hapus_po" method="post">
                            <header class="panel-heading">
                                <h2 class="panel-title">Hapus Data PO Customer</h2>
                            </header>

                            <div class="panel-body" style="color: black">
                                <input type="hidden" name="id_po_customer" class="form-control" value="<?php echo $po_cust[$x]['id_purchase_order_customer'] ?>" readonly>
                            
                                Apakah anda yakin akan menghapus data PO Customer dengan Nomor PO <b><?php echo $po_cust[$x]['kode_purchase_order_customer']?></b>?
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
    