<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perencanaan Produksi Line</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perencanaan Produksi Line</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<form method="POST" action="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Perencanaan Produksi Line</h2>
        </header>

        <div class="panel-body">
            <div class="form-group mt-lg">
                <label class="col-sm-5 control-label">Line</label>
                <div class="col-sm-7">
                    <select class="form-control mb-md" id="select_line" name="select_line">
                        <option>Pilih Line</option>
                        <?php 
                        $no = 0;
                        foreach($line as $ln){?>
                            <option value="<?= $ln->nama_line ?>">
                                <?= $ln->nama_line; ?>
                            </option>
                        <?php $no++;} ?>
                    </select>
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
    </div>
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



    