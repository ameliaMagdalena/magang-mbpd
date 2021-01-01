<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pemasukan Material Baru</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pemasukan Material Baru</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Pemasukan Material Baru</h1>
<hr>

	<section class="panel">
		<form class="form-horizontal mb-lg" action="<?php echo base_url()?>PemasukanMaterial/baru" method="post">
			<header class="panel-heading">
				<h2 class="panel-title">Form Pemasukan Material</h2>
			</header>

			<div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Pilih Sumber<span class="required">*</span></label>
                    <div class="col-sm-7">
                        <div class="col-sm-6 radio">
                            <input type="radio" name="pilihan" value="1" checked="">Produksi
                            <br>
                            <input type="radio" name="pilihan" value="0" 
                                <?php if(count($dn)==0){
                                    echo 'disabled';
                                }else{
                                    $layak = 0;
                                    for($a=0; $a<count($dn); $a++){
                                        if($dn[$a]['status_pengesahan']==1){
                                            $layak = $layak+1;
                                        }
                                    }
                                    if($layak==0){
                                        echo 'disabled';
                                    }
                                }
                                ?>>Supplier (Delivery Note)
                            <br>
                            <input type="radio" name="pilihan" value="2">Lain-Lain
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="simpan" class="btn btn-primary float-right" value="Selanjutnya">
                        </div>
                    </div>
                </footer>

            </div>
		</form>
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
    