<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Surat Perintah Lembur</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tambah Surat Perintah Lembur</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<form method="POST" action="<?= base_url()?>suratPerintahLembur/tambahin_spl">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Tambah Surat Perintah Lembur</h2>
        </header>

        <div class="panel-body">
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Tanggal Lembur</label>
                <div class="col-sm-9">
                    <input class="form-control col-md-5" type="date" id="tanggal" name="tanggal"
                    min="<?php echo $tudei;?>" onchange="cek_tanggal()"> 
                </div>
            </div>
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Line</label>
                <div class="col-sm-9">
                    <select name="id_line" id="id_line" class="form-control mb-md" onchange="cek_tanggal()">
                        <option value="">Pilih Line</option>
                        <?php foreach($line as $ln){?>
                            <option value="<?= $ln->id_line ?>">
                                <?= $ln->nama_line ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Waktu</label>
                <div class="col-sm-9">
                    <input class="form-control col-md-5" type="text" id="waktu_lembur" name="waktu_lembur"
                    readonly> 
                </div>
            </div>
            <div class="form-group mt-lg">
                <label class="col-sm-3 control-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan"
                    rows="3" data-plugin-textarea-autosize></textarea>
                </div>
            </div>
        </div>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="submit" class="btn btn-primary" value="Simpan" id="button_simpan" disabled>
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
    function cek_tanggal(){
        var tanggal = $("#tanggal").val();
        var id_line = $("#id_line").val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratPerintahLembur/cek_tanggal",
            dataType: "JSON",
            data: {tanggal:tanggal,id_line:id_line},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, surat perintah lembur untuk tanggal dan line tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    reload();
                }
                else{
                    $("#waktu_lembur").val(respond['harinya']);
                }
            }
        });

        simpan();
    }

</script>

<script>
    function simpan(){
        if($("#tanggal").val() != "" && $("#id_line").val() != ""){
            $("#button_simpan").prop('disabled',false);
        }
        else{
            $("#button_simpan").prop('disabled',true);
        }
    }
</script>



    