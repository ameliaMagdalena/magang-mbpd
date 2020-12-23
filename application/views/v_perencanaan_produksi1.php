<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Perencanaan Produksi</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perencanaan Produksi</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<form method="POST" action="<?= base_url()?>perencanaanProduksi/buat_perencanaan">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Pilih Tanggal Perencanaan</h2>
        </header>

        <div class="panel-body">
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Tanggal Mulai</label>
                <div class="col-sm-9">
                    <!--
                    <input class="form-control col-md-5" type="date" id="tanggal_mulai" name="tanggal_mulai"
                    onchange="tanggal_mulai_change()" required> 
                    -->
                    <div class="col-sm-9">
                        <input class="date form-control col-md-5" type="date" id="tanggal_mulai" name="tanggal_mulai" 
                        min="<?php echo $min_date;?>" step="7" onchange="tanggal_mulai_change()" required> 
                    </div>
                </div>
            </div>
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" id="pemberitahuan">
 
                </div>
            </div>
        </div>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="submit" id="bnext" class="btn btn-primary" value="Selanjutnya" disabled>
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

<script>
    function tanggal_mulai_change(){
        var tanggal_mulai = $("#tanggal_mulai").val();

        if(tanggal_mulai != ""){
            $.ajax({
                type:"post",
                url:"<?php echo base_url() ?>perencanaanProduksi/cek_perencanaan",
                dataType: "JSON",
                data: {tanggal_mulai:tanggal_mulai},

                success: function(respond){
                    $cek = respond['cek'];

                    if($cek == 0){
                        $("#bnext").prop('disabled',false);
                        $("#pemberitahuan").html("<p><span class='required'>* </span>Perencanaan dapat dibuat untuk 1 minggu, dimulai dari tanggal mulai yang dipilih</p>");
                    }
                    else{
                        $("#bnext").prop('disabled',true);
                        alert("Maaf anda tidak dapat membuat perencanaan untuk tanggal yang dipilih karena sudah ada perencanaan untuk tanggal tersebut");
                    }
                }
            });
        }
        else{
            $("#bnext").prop('disabled',true);
        }
    }
</script>

<!--
<script>
    $().ready(function () {
        $( ".date" ).datepicker({
            dateFormat:'d-m-yy',    
            changeMonth: true,
            showOn: "both",
            buttonImage: "resources/images/calendar_empty2.png"
        });
    })
</script>
-->




    