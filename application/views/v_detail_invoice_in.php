<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Invoice In</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Invoice In</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Detail Invoice In</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Detail Invoice In <?php echo $invoice[0]['nomor_invoice_in'] ?></h2>
    </header>

    <div class="panel-body">
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. Invoice</label>
            <div class="col-sm-9">
                <input type="text" name="no_po" class="form-control"
                value="<?php echo $invoice[0]['nomor_invoice_in'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. PO</label>
            <div class="col-sm-9">
                <input type="text" name="no_po" class="form-control"
                value="<?php echo $invoice[0]['kode_purchase_order_supplier'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. FP</label>
            <div class="col-sm-9">
                <input type="text" name="no_po" class="form-control"
                value="<?php echo $invoice[0]['nomor_fp'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Total bayar</label>
            <div class="col-sm-9">
                <input type="text" name="no_po" class="form-control"
                value="<?php echo $invoice[0]['total_bayar'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Terima</label>
            <div class="col-sm-9">
                <input type="text" name="tanggal_po" class="form-control"
                value="<?php
                    $waktu = $invoice[0]['tanggal_terima_invoice'];

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
        <?php if($invoice[0]['status_lunas'] == 1){ ?>
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Tanggal Lunas</label>
                <div class="col-sm-9">
                    <input type="text" name="tanggal_po" class="form-control"
                    value="<?php
                        $waktu = $invoice[0]['tanggal_pelunasan'];

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
        <?php } ?>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <input type="text" name="status" class="form-control"
                value="<?php 
                    if($invoice[0]['status_lunas'] == 0){
                        echo "Belum Lunas";
                    }else {
                        echo "Lunas";
                    }
                ?>" readonly>
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
    