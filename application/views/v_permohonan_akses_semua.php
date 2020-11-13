<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua Permohonan Akses</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Semua Permohonan Akses</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Semua Permohonan Akses</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Nama Permohonan</th>
                        <th  style="text-align: center;vertical-align: middle;">Pemohon</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($peraks as $x){?>
                        <tr>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $no; ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->tanggal; ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->nama_permohonan_akses ?>
                                <input type="hidden" id="permohonan_nama<?= $no;?>" value="<?= $x->nama_permohonan_akses ?>">
                                <input type="hidden" id="id<?= $no;?>" value="<?= $x->id_permohonan_akses ?>">
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <input type="hidden" id="karyawan_nama<?= $no;?>" value="<?= $x->nama_karyawan ?>">
                                <?= $x->nama_karyawan ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php if($x->status_permohonan == 0){
                                        echo "Belum Disetujui";  
                                    } else if($x->status_permohonan == 1){
                                        echo "Disetujui";
                                    }  else if($x->status_permohonan == 2){
                                        echo "Tidak Disetujui";
                                    } else{
                                        echo "Selesai";
                                    }
                                ?>
                            </td>
                            <td class="col-lg-3"> 
                                <button type="button" class="bdetail_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
                                
                                <?php if($x->status_permohonan == 0){
                                    if($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" || 
                                    $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management"){
                                ?>    
                                    <button type="button" class="bse7_klik col-lg-3 btn btn-success fa fa-check-square" 
                                    value="<?= $no;?>" title="Disetujui"></button>
                                    <button type="button" class="btolak_klik col-lg-3 btn btn-danger fa  fa-times-circle" 
                                    value="<?= $no;?>" title="Tidak Disetujui"></button>
                                <?php }  }?>
                            </td>
                        </tr>
                    <?php $no++;} ?>
                </tbody>
	        </table>
        </div>
    </div>
    
    <!-- modal detail -->
    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Permohonan Akses</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal & Waktu Permohonan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="tanggal" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Permohonan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="nama_permohonan" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Pemohon</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="nama_pemohon" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="keterangan" disabled>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="status" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal se7 -->
    <div class="modal" id="modalse7" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>permohonanAkses/terima">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Terima Permohonan Akses</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_peraks" id="id_peraks">
                        <p>Apakah anda yakin akan menerima permohonan akses <b><span id="nama_karyawan_se7"></span></b> untuk <b><span id="nama_permohonan_se7"></span></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="edit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal tolak -->
    <div class="modal" id="modaltolak" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>permohonanAkses/tolak">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Tolak Permohonan Akses</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_peraks" id="id_peraks_tolak">
                        <p>Apakah anda yakin tidak akan menerima permohonan akses <b><span id="nama_karyawan_tolak"></span></b> untuk <b><span id="nama_permohonan_tolak"></span></b>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="edit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
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

<!-- detail-->
<script>
    $('.bdetail_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>permohonanAkses/detail_permohonan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#tanggal").val(respond['peraks'][0]['waktu_add']);
                $("#nama_permohonan").val(respond['peraks'][0]['nama_permohonan_akses']);

                for($i=0;$i<respond['jm_user'];$i++){
                    if(respond['user'][$i]['id_user'] == respond['peraks'][0]['id_user']){
                        $nama = respond['user'][$i]['nama_karyawan'];
                    }
                }
                $("#nama_pemohon").val($nama);
                $("#keterangan").val(respond['peraks'][0]['keterangan']);

                if(respond['peraks'][0]['status_permohonan'] == 0){
                    $("#status").val("Belum Disetujui");
                } else if(respond['peraks'][0]['status_permohonan'] == 1){
                    $("#status").val("Disetujui");
                }  else if(respond['peraks'][0]['status_permohonan'] == 2){
                    $("#status").val("Tidak Disetujui");
                } else{
                    $("#status").val("Selesai");
                }   

                $("#modaldetail").modal();
            }
        }); 
    });
</script>

<!-- setuju-->
<script>
    $('.bse7_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_peraks").val(id);
        $("#nama_karyawan_se7").html($("#karyawan_nama"+no).val());
        $("#nama_permohonan_se7").html($("#permohonan_nama"+no).val());

        $("#modalse7").modal();
        
    });
</script>

<!-- tolak -->
<script>
    $('.btolak_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_peraks_tolak").val(id);
        $("#nama_karyawan_tolak").html($("#karyawan_nama"+no).val());
        $("#nama_permohonan_tolak").html($("#permohonan_nama"+no).val());

        $("#modaltolak").modal();
        
    });
</script>


    