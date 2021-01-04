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

<h1>Detail Permintaan Material Tambahan</h1>
<hr>

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Detail Permintaan Material Tambahan <?php echo $tambahan[0]['id_permintaan_tambahan'] ?></h2>
    </header>

    <div class="panel-body">
        <input type="hidden" name="id_po_cust" class="form-control" value="<?php echo $tambahan[0]['id_permintaan_tambahan'] ?>" readonly>
        
        <div class="form-group mt-lg">
            <label class="col-sm-4 control-label">No. Form Permintaan Tambahan</label>
            <div class="col-sm-8">
                <input type="text" name="id_permintaan" class="form-control"
                value="<?php echo $tambahan[0]['id_permintaan_tambahan'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-4 control-label">No. Form Permintaan Material</label>
            <div class="col-sm-8">
                <input type="text" name="id_permintaan" class="form-control"
                value="<?php echo $tambahan[0]['id_permintaan_material'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-4 control-label">Line</label>
            <div class="col-sm-8">
                <input type="text" name="line" class="form-control"
                value="<?php echo $tambahan[0]['nama_line'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-4 control-label">Status</label>
            <div class="col-sm-8">
                <input type="text" name="status" class="form-control"
                value="<?php 
                    if($tambahan[0]['status'] == 0){
                        echo "Belum Ditinjau/Menunggu Persetujuan";
                    } else if($tambahan[0]['status'] == 1){
                        echo "Diterima, Menunggu Pengambilan";
                    } else if($tambahan[0]['status'] == 2){
                        echo "Ditolak";
                    }
                    else if($tambahan[0]['status'] == 3){
                        echo "Selesai";
                    }
                    else if($tambahan[0]['status'] == 4){
                        echo "Batal";
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
                            <th class="col-lg-1">Jumlah</th>
                            <th class="col-lg-1">Satuan</th>
                            
                            <?php if ($tambahan[0]['status'] == '0' || $tambahan[0]['status'] == '1'){?>
                                <th class="col-lg-3">Ketersediaan</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="roww">
                        <?php for($y=0; $y<count($detail); $y++){ ?>
                            <!-- <script> cekKetersediaan(<?= $y ?>); </script> -->
                            <?php if($tambahan[0]['id_permintaan_material'] == $detail[$y]['id_permintaan_material']){?>
                        <tr>
                            <td> <?php echo $y+1 ?> </td>
                            <td> <?php echo $detail[$y]['id_sub_jenis_material'] ?>
                                <input type="hidden" id="kodemat<?php echo $y ?>" value="<?= $detail[$y]['id_sub_jenis_material'] ?>">
                            </td>
                            <td> <?php echo $detail[$y]['nama_jenis_material'] ." ". $detail[$y]['nama_sub_jenis_material'] ?> </td>
                            <td> <?php 
                                $produk = $tambahan[0]['jumlah_tambah'];
                                $cons = $detail[$y]['jumlah_konsumsi'];
                                $needs = $produk*$cons;
                                echo $needs;
                            ?>
                                <input type="hidden" id="needs<?php echo $y ?>" value="<?= $needs?>">
                            </td>
                            <td> <?php echo $detail[$y]['satuan_ukuran'] ?></td>
                            
                            <?php if ($tambahan[0]['status'] == '0' || $tambahan[0]['status'] == '1'){?>
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
    