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

<h1>Detail Permintaan Material</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Detail Permintaan Material <?php echo $permintaan_material[0]['id_permintaan_material'] ?></h2>
    </header>

    <div class="panel-body">
        <input type="hidden" name="id_po_cust" class="form-control" value="<?php echo $permintaan_material[0]['id_permintaan_material'] ?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">No. Form Permintaan Material</label>
            <div class="col-sm-9">
                <input type="text" name="id_permintaan" class="form-control"
                value="<?php echo $permintaan_material[0]['id_permintaan_material'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Permintaan</label>
            <div class="col-sm-9">
                <input type="text" name="tgl_permintaan" class="form-control"
                value="<?php echo $permintaan_material[0]['tanggal_permintaan'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Produk</label>
            <div class="col-sm-9">
                <input type="text" name="produk" class="form-control"
                value="<?php echo $permintaan_material[0]['nama_produk'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Line</label>
            <div class="col-sm-9">
                <input type="text" name="line" class="form-control"
                value="<?php echo $permintaan_material[0]['nama_line'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Jumlah Produk</label>
            <div class="col-sm-9">
                <input type="text" name="produk" class="form-control"
                value="<?php echo $permintaan_material[0]['jumlah_minta'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Produksi</label>
            <div class="col-sm-9">
                <input type="text" name="tgl_produksi" class="form-control"
                value="<?php echo $permintaan_material[0]['tanggal_produksi'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
                <input type="text" name="status" class="form-control"
                value="<?php 
                    if($permintaan_material[0]['status_permintaan'] == 0){
                        echo "Belum Ditinjau/Menunggu Persetujuan";
                    } else if($permintaan_material[0]['status_permintaan'] == 1){
                        echo "Proses Pembelian";
                    } else if($permintaan_material[0]['status_permintaan'] == 2){
                        echo "Material Tersedia";
                    }
                    else if($permintaan_material[0]['status_permintaan'] == 3){
                        echo "Selesai";
                    }
                    else if($permintaan_material[0]['status_permintaan'] == 4){
                        echo "Batal";
                    }
                    else {
                        echo "Persetujuan Ditolak";
                    }
                ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <div class="col-sm-12">
                <h3 style="text-align: center">Material</h3>
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th class="col-lg-1">No.</th>
                            <th class="col-lg-2">Kode Material</th>
                            <th class="col-lg-3">Nama Material</th>
                            <th class="col-lg-1">Cons</th>
                            <th class="col-lg-1">Needs</th>
                            <th class="col-lg-1">Satuan</th>
                            
                            <?php if ($permintaan_material[0]['status_permintaan'] == '0' || $permintaan_material[0]['status_permintaan'] == '1'){?>
                                <th class="col-lg-3">Ketersediaan</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="roww">
                        <?php for($y=0; $y<count($detail); $y++){ ?>
                            <!-- <script> cekKetersediaan(<?= $y ?>); </script> -->
                            <?php if($permintaan_material[0]['id_permintaan_material'] == $detail[$y]['id_permintaan_material']){?>
                        <tr>
                            <td> <?php echo $y+1 ?> </td>
                            <td> <?php echo $detail[$y]['id_sub_jenis_material'] ?>
                                <input type="hidden" id="kodemat<?php echo $y ?>" value="<?= $detail[$y]['id_sub_jenis_material'] ?>">
                            </td>
                            <td> <?php echo $detail[$y]['nama_sub_jenis_material'] ?> </td>
                            <td> <?php echo $detail[$y]['jumlah_konsumsi'] ?> </td>
                            <td> <?php 
                                $produk = $detail[$y]['jumlah_minta'];
                                $cons = $detail[$y]['jumlah_konsumsi'];
                                $needs = $produk*$cons;
                                echo $needs;
                            ?>
                                <input type="hidden" id="needs<?php echo $y ?>" value="<?= $needs?>">
                            </td>
                            <td> <?php echo $detail[$y]['satuan_keluar'] ?></td>
                            
                            <?php if ($permintaan_material[0]['status_permintaan'] == '0' || $permintaan_material[0]['status_permintaan'] == '1'){?>
                            <td id="ketersediaan<?php echo $y ?>">
                                <?php $ketersediaan = 0;
                                    for($mat=0; $mat<count($material); $mat++){
                                        if($detail[$y]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                            $ketersediaan = $ketersediaan+1;
                                        }
                                    }
                                    if($ketersediaan<$needs){
                                        echo "Tidak Tersedia <br> <small>Jumlah di gudang: ". $ketersediaan ." </small>";
                                    }
                                    else{
                                        echo "Tersedia";
                                    }
                                ?>
                                <!-- <button type="button" class="col-lg-7 btn btn-default"  id="sedia" onclick=cekKetersediaan(<?= $y ?>)>Lihat</button> -->
                            </td>
                            <?php } ?>
                            
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>
        
        <div class="form-group mt-lg">
            

            <!-- ******************************* MODAL BATAL ****************************** -->
            <!-- ************************************************************************** -->
            <div id='modalbatal<?php echo $permintaan_material[0]['id_purchase_order_customer'] ?>' class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PurchaseOrderCustomer/batal_po" method="post">
                        <header class="panel-heading">
                            <h2 class="panel-title">Edit Data Material</h2>
                        </header>
                        <div class="panel-body" style="color: black">
                            <input type="hidden" name="id_po_customer" class="form-control" value="<?php echo $permintaan_material[0]['id_purchase_order_customer'] ?>" readonly>
                            Apakah anda yakin akan membatalkan PO Customer dengan No. PO <b><?php echo $permintaan_material[0]['id_purchase_order_customer'] ?></b>?

                            <div class="form-group mt-lg">
                                <label class="col-sm-4 control-label"> Masukkan keterangan<span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="keterangan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" id="batal" class="btn btn-danger" value="Ya">
                                    <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Tidak</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>
            <!-- ***************************** END MODAL BATAL **************************** -->
            <!-- ************************************************************************** -->

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
function cekKetersediaan(counter){
    var id_sub_jenis_material = $("#kodemat"+counter).val();
    var needs = $("#needs"+counter).val();
    $.ajax({
        url:"<?php echo base_url();?>PermintaanMaterial/ketersediaan",
        type:"POST",
        dataType:"JSON",
        data:{id_sub_jenis_material:id_sub_jenis_material},
        success:function(respond){
            var html = '';
            if(respond.length<needs){
                html = 'Tidak Tersedia<br>';
                html += '<small>Jumlah di gudang: ' + respond.length + '</small>';
            }
            else{
                html = 'Tersedia';
            }
            $('#ketersediaan'+counter).html(html);
        }
    });
}
</script>

<script>
    function reload() {
    location.reload();
    }
</script>
    