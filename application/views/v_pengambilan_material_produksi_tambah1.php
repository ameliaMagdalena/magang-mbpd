<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Permintaan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Permintaan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<form method="POST" action="<?= base_url()?>permintaanMaterialProduksi/buat_permintaan_material">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Pilih Tanggal Permintaan Material</h2>
        </header>

        <div class="panel-body">
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Tanggal Produksi<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input class="form-control col-md-5" type="date" id="tanggal" name="tanggal"
                        min="<?php echo $min_date;?>" required> 
                    </div>
            </div>
        </div>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </div>
        </footer>
    </section>
</form>

                    
<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->


<script>
    function reload() {
        location.reload();
    }
</script>





    