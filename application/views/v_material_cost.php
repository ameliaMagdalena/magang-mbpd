<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Material Cost</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Material Cost</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Material Cost</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Daftar PO Customer dan Total Material Cost</h2>
    </header>
    <div class="panel-body">
    
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th class="col-lg-2">No. PO</th>
                    <th class="col-lg-3">Tanggal PO</th>
                    <th class="col-lg-2">Customer</th>
                    <th class="col-lg-2">Total Cost</th>
                    <th class="col-lg-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($x=0 ; $x<count($all) ; $x++){ ?>
                <tr>
                    <td> <?php echo $all[$x]['kode_purchase_order_customer'] ?> </td>
                    <td> <?php echo $all[$x]['tanggal_po'] ?> </td>
                    <td> <?php echo $all[$x]['nama_customer'] ?> </td>
                    <td>
                        <?php
                            $jumlahmaterial=0;
                            for($y=0; $y<count($sedia); $y++){
                                //konversi jumlah persediaan line masuk
                                $jlh=$sedia[$y]['jumlah_material']; //dalam satuan produksi
                                $ukuran=$sedia[$y]['ukuran_satuan_keluar'];
                                //$jlh2=$jlh/$ukuran; //dalam satuan material

                                //konversi jumlah ambil
                                $jlhambil = $all[$x]['jumlah_ambil']; //dalam satuan material
                                $ambil=$jlhambil*$ukuran; //dalam satuan produksi

                                if($sedia[$y]['id_detail_permintaan_material']==$all[$x]['id_detail_permintaan_material']){
                                    $jumlahmaterial = $jumlahmaterial+($ambil-$jlh); //pake satuan produksi karna real pemakaian
                                }
                            }
                            $cost = $all[$x]['harga_satuan']*$jumlahmaterial;
                            echo $cost;

                            //habis ini harus cek pengambilan tambahan juga
                        ?>
                    </td>
                    <td>
                        <a class="col-lg-3 btn btn-primary fa fa-info-circle"
                            title="Detail" href="<?php echo base_url() . 'PurchaseOrderCustomer/detail/' . $po_cust[$x]['id_purchase_order_customer'] ?>"></a>
                    </td>
                </tr>
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
    