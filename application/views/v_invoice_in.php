<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Invoice IN</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Invoice IN</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Invoice IN</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar Invoice IN</h2>
    </header>
    <div class="panel-body">
    
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-3">Tanggal Invoice</th>
                    <th class="col-lg-2">Supplier</th>
                    <th class="col-lg-2">Total Bayar</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($status==0){
                        for($x=0 ; $x<count($inv) ; $x++){
                            if($inv[$x]['status_lunas']==0){ ?>
                <tr>
                    <td> <?php echo $inv[$x]['tanggal_terima_invoice'] ?> </td>
                    <td> <?php echo $inv[$x]['nama_supplier'] ?> </td>
                    <td> <?php echo $inv[$x]['total_bayar'] ?> </td>
                    <td> <?php
                        if ($inv[$x]['status_lunas']==0){
                            echo "Belum Lunas";
                        } else{
                            echo "Lunas";
                        } ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderSupplier/detail_invoice/' . $inv[$x]['id_invoice_in'] ?>"></a>
                        <a class="col-lg-3 btn btn-success fa fa-check"
                            title="Dibayar" href="<?php echo base_url() . 'PurchaseOrderSupplier/lunas/' . $inv[$x]['id_invoice_in'] ?>"></a>
                    </td>
                </tr>
                <?php }}} else if($status==1){
                        for($x=0 ; $x<count($inv) ; $x++){ 
                            if($inv[$x]['status_lunas']==1){ ?>
                <tr>
                    <td> <?php echo $inv[$x]['tanggal_terima_invoice'] ?> </td>
                    <td> <?php echo $inv[$x]['nama_supplier'] ?> </td>
                    <td> <?php echo $inv[$x]['total_bayar'] ?> </td>
                    <td> <?php
                        if ($inv[$x]['status_lunas']==0){
                            echo "Belum Lunas";
                        } else{
                            echo "Lunas";
                        } ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderSupplier/detail_invoice/' . $inv[$x]['id_invoice_in'] ?>"></a>
                    </td>
                </tr>
                <?php }}} else{
                        for($x=0 ; $x<count($inv) ; $x++){ ?>
                <tr>
                    <td> <?php echo $inv[$x]['tanggal_terima_invoice'] ?> </td>
                    <td> <?php echo $inv[$x]['nama_supplier'] ?> </td>
                    <td> <?php echo $inv[$x]['total_bayar'] ?> </td>
                    <td> <?php
                        if ($inv[$x]['status_lunas']==0){
                            echo "Belum Lunas";
                        } else{
                            echo "Lunas";
                        } ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderSupplier/detail_invoice/' . $inv[$x]['id_invoice_in'] ?>"></a>

                        <?php if($inv[$x]['status_lunas']==0){ ?>
                            <a class="col-lg-3 btn btn-success fa fa-check"
                                title="Dibayar" href="<?php echo base_url() . 'PurchaseOrderSupplier/lunas/' . $inv[$x]['id_invoice_in'] ?>"></a>
                        <?php } ?>
                    </td>
                </tr>
                <?php }} ?>
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
    