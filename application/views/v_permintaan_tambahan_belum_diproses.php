<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Tambahan Belum Diproses</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Permintaan Tambahan Belum Diproses</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Permintaan Tambahan Belum Diproses</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Waktu Permintaan</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor Permintaan</th>
                        <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                        <th  style="text-align: center;vertical-align: middle;">Jumlah Permintaan</th>
                        <th  style="text-align: center;vertical-align: middle;">Satuan</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($pertam as $x){
                            if($x->status == 0){
                    ?>
                        <tr>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $no ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->waktu_add ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->id_permintaan_tambahan ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->nama_sub_jenis_material ?>
                                <input type="hidden" id="id<?= $no ?>" value="<?= $x->id_permintaan_tambahan ?>">
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->jumlah_tambah ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->satuan_keluar ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php if($x->status == 0){
                                        echo "Belum Diproses";
                                    } else if($x->status == 1){
                                        echo "Diterima";
                                    } else if($x->status == 2){
                                        echo "Ditolak";
                                    } else if($x->status == 3){
                                        echo "Selesai";
                                    }
                                ?>
                            </td>
                            <td class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
                                <?php if($x->status == 0){?>
                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        value="<?= $no;?>" title="Edit"></button>
                                    <button type="button" class="bdelete_klik col-lg-3 btn btn-danger fa fa-trash-o" 
                                        value="<?= $no;?>" title="Delete"></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $no++; }} ?>
                </tbody>
	        </table>
        </div>
    </div>

    <!-- modal detail -->
    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Permintaan Tambahan</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Permintaan Tambahan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_permat_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Permintaan Material</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_permintaan_material_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Waktu Permintaan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="waktu_permat_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Material</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_mat_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Permintaan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="jumlah_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Satuan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="satuan_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="keterangan_det" rows="3" id="textareaDefault" readonly></textarea>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="status_det" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal" id="modaledit" role="dialog">
        <form method="POST" action="<?= base_url()?>permintaanTambahan/edit_permat">
            <div class="modal-dialog modal-xl" style="width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Permintaan Tambahan</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor Permintaan Tambahan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_permat_ed" name="no_permat_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor Permintaan Material</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_permintaan_material_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Waktu Permintaan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="waktu_permat_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Material</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama_mat_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Jumlah Permintaan</label>
                            <div class="col-sm-7">
                                <input type="number" min="1" class="form-control" id="jumlah_ed" name="jumlah_ed">
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Satuan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="satuan_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" id="keterangan_ed" name="keterangan_ed" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Status</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="status_ed" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- modal delete -->
    <div class="modal" id="modaldelete" role="dialog">
        <form method="POST" action="<?= base_url()?>permintaanTambahan/delete_permat">
            <div class="modal-dialog modal-xl" style="width:35%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Hapus Permintaan Tambahan</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_pertam_del" id="id_pertam_del">
                        <p>Apakah anda yakin akan menghapus data permintaan tambahan dengan nomor permintaan <span id="tampilkan_pertam"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Ya">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </div>
        </form>
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

<!-- detail -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>permintaanTambahan/detail_permat",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_permat_det").val(respond['permat'][0]['id_permintaan_tambahan']);
                $("#no_permintaan_material_det").val(respond['permat'][0]['id_permintaan_material']);
                $("#waktu_permat_det").val(respond['permat'][0]['waktu_add']);
                $("#nama_mat_det").val(respond['permat'][0]['nama_sub_jenis_material']);
                $("#jumlah_det").val(respond['permat'][0]['jumlah_tambah']);
                $("#satuan_det").val(respond['permat'][0]['satuan_keluar']);
                $("#keterangan_det").val(respond['permat'][0]['keterangan']);
                
                if(respond['permat'][0]['status'] == 0){
                    $("#status_det").val("Belum Diproses");
                } else if(respond['permat'][0]['status'] == 1){
                    $("#status_det").val("Diterima");
                } else if(respond['permat'][0]['status'] == 2){
                    $("#status_det").val("Ditolak");
                } else if(respond['permat'][0]['status'] == 3){
                    $("#status_det").val("Selesai");
                }
               
                $("#modaldetail").modal();
            }
        });  
    });
</script>

<!-- edit -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>permintaanTambahan/detail_permat",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_permat_ed").val(respond['permat'][0]['id_permintaan_tambahan']);
                $("#no_permintaan_material_ed").val(respond['permat'][0]['id_permintaan_material']);
                $("#waktu_permat_ed").val(respond['permat'][0]['waktu_add']);
                $("#nama_mat_ed").val(respond['permat'][0]['nama_sub_jenis_material']);
                $("#jumlah_ed").val(respond['permat'][0]['jumlah_tambah']);
                $("#satuan_ed").val(respond['permat'][0]['satuan_keluar']);
                $("#keterangan_ed").val(respond['permat'][0]['keterangan']);
                
                if(respond['permat'][0]['status'] == 0){
                    $("#status_ed").val("Belum Diproses");
                } else if(respond['permat'][0]['status'] == 1){
                    $("#status_ed").val("Diterima");
                } else if(respond['permat'][0]['status'] == 2){
                    $("#status_ed").val("Ditolak");
                } else if(respond['permat'][0]['status'] == 3){
                    $("#status_ed").val("Selesai");
                }
               
                $("#modaledit").modal();
            }
        });  
    });
</script>

<!-- edit -->
<script>
    $('.bdelete_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $("#id_pertam_del").val(id);
        $("#tampilkan_pertam").html(id);

        $("#modaldelete").modal();
    });
</script>


    