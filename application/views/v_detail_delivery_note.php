<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Delivery Note</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Delivery Note</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Detail Delivery Note</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Detail Delivery Note <?php echo $dn[0]['kode_delivery_note'] ?></h2>
    </header>

    <div class="panel-body">
        <input type="hidden" name="id_dn" class="form-control" value="<?php echo $dn[0]['id_delivery_note'] ?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. DN</label>
            <div class="col-sm-9">
                <input type="text" name="no_dn" class="form-control"
                value="<?php echo $dn[0]['kode_delivery_note'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Supplier</label>
            <div class="col-sm-9">
                <input type="text" name="supplier" class="form-control"
                value="<?php echo $dn[0]['nama_supplier'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal DN</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal_dn" class="form-control"
                value="<?php echo $dn[0]['tanggal_dn'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Delivery</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal_delv" class="form-control"
                value="<?php echo $dn[0]['tanggal_penerimaan'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <input type="text" name="status" class="form-control"
                value="<?php 
                    if($dn[0]['status_pengesahan'] == 0){
                        echo "Proses Persetujuan";
                    } else if($dn[0]['status_pengesahan'] == 1){
                        echo "Disetujui, Proses Pengambilan";
                    } else if($dn[0]['status_pengesahan'] == 2){
                        echo "Selesai";
                    } else if($dn[0]['status_pengesahan'] == 3){
                        echo "Batal";
                    }
                    else if($dn[0]['status_pengesahan'] == 4){
                        echo "Persetujuan Ditolak";
                    }
                ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <div class="col-sm-12">
                <h3 style="text-align: center">Detail Material</h3>
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                        <tr>
                            <th style="text-align:center" class="">No.</th>
                            <th style="text-align:center" class="col-lg-2">Kode Material</th>
                            <th style="text-align:center" class="col-lg-4">Deskripsi</th>
                            <th style="text-align:center" class="col-lg-2">Jumlah Diminta</th>
                            
                            <?php if($dn[0]['status_pengesahan'] == 2){ ?>
                                <th style="text-align:center" class="col-lg-2">Jumlah Aktual</th>
                            <?php } ?>
                            
                            <th style="text-align:center" class="col-lg-2">Satuan</th>
                            <th style="text-align:center" class="col-lg-2">Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($y=0; $y<count($detail_dn); $y++){
                            if($dn[0]['id_delivery_note'] == $detail_dn[$y]['id_delivery_note']){?>
                        <tr>
                            <td> <?php echo $y+1 ?> </td>
                            <td> <?php echo $detail_dn[$y]['kode_sub_jenis_material'] ?> </td>
                            <td> <?php echo $detail_dn[$y]['nama_jenis_material'] . ' ' . $detail_dn[$y]['nama_sub_jenis_material'] ?> </td>
                            <td style="text-align:center"> <?php echo $detail_dn[$y]['jumlah_diminta'] ?> </td>
                            
                            <?php if($dn[0]['status_pengesahan'] == 2){ ?>
                                <td style="text-align:center"> <?php echo $detail_dn[$y]['jumlah_aktual'] ?> </td>
                            <?php } ?>

                            <td style="text-align:center"> <?php echo $detail_dn[$y]['satuan_ukuran'] ?> </td>
                            <td> <?php echo $detail_dn[$y]['remark'] ?> </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Dibuat Oleh</label>
            <div class="col-sm-9">
                <?php if($dn[0]['dibuat_oleh'] == $kary[0]['id_user']){ ?>
                    <input type="text" name="dibuat" class="form-control"
                    value="<?php echo $kary[0]['nama_karyawan'] ?>" readonly>
                <?php } ?>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Disetujui Oleh</label>
            <div class="col-sm-9">
                <?php if($dn[0]['disetujui_oleh']!="" && $dn[0]['disetujui_oleh'] == $kary[0]['id_user']){ ?>
                    <input type="text" name="disetujui" class="form-control"
                    value="<?php echo $kary[0]['nama_karyawan'] ?>" readonly>
                <?php } else if($dn[0]['disetujui_oleh'] == ""){ ?>
                    <input type="text" name="disetujui" class="form-control"
                    value=" - " readonly>
                <?php } ?>
            </div>
        </div>

        <div class="form-group mt-lg">
            <a class="col-lg-3 btn btn-warning"
                title="Print" href="<?php echo base_url() . 'DeliveryNote/print_dn/' . $dn[0]['id_delivery_note'] ?>">
                Print</a>
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
    