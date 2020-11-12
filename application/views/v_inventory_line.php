<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Inventory Line</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Inventory Line</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Inventory Line</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Material</th>
                        <th style="text-align: center;vertical-align: middle;">Total Material</th>
                        <?php if($_SESSION['nama_jabatan'] != "PIC Line Cutting" && $_SESSION['nama_departemen'] != "Produksi" || 
                            $_SESSION['nama_jabatan'] != "PIC Line Bonding" && $_SESSION['nama_departemen'] != "Produksi" ||
                            $_SESSION['nama_jabatan'] != "PIC Line Sewing" && $_SESSION['nama_departemen'] != "Produksi" ||
                            $_SESSION['nama_jabatan'] != "PIC Line Assy" && $_SESSION['nama_departemen'] != "Produksi"){?>
                            <th style="text-align: center;vertical-align: middle;">Nama Line</th>
                        <?php }?>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($inventory_line as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_inventory_line?>">
                                <?= $x->nama_sub_jenis_material; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->total_material; ?></td>
                            <?php if($_SESSION['nama_jabatan'] != "PIC Line Cutting" && $_SESSION['nama_departemen'] != "Produksi" || 
                            $_SESSION['nama_jabatan'] != "PIC Line Bonding" && $_SESSION['nama_departemen'] != "Produksi" ||
                            $_SESSION['nama_jabatan'] != "PIC Line Sewing" && $_SESSION['nama_departemen'] != "Produksi" ||
                            $_SESSION['nama_jabatan'] != "PIC Line Assy" && $_SESSION['nama_departemen'] != "Produksi"){?>
                                <td style="text-align: center;vertical-align: middle;"><?= $x->nama_line; ?></td>
                            <?php }?>
                            <td  class="col-lg-3">
                                <a class="bdet_klik modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail<?= $x->id_inventory_line;?>" value="<?= $no;?>"></a>
                            </td>
                        </tr>

                        <div id='modaldetail<?= $x->id_inventory_line;?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Detail Inventory Line</h2>
                                </header>

                                <div class="panel-body">
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Material</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->nama_sub_jenis_material?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Total Material</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->total_material?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Line</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                            value="<?= $x->nama_line?>" readonly>
                                        </div>
                                    </div>

                                    <div id="table_detail"></div>
                                </div>

                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-default modal-dismiss">Ok</button>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>
                    <?php
                    $no++;
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>warna/tambah_warna"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Warna</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Warna</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama_warna_input" id="nama_warna_input" 
                            onchange="cek_nama_warna_input()" required class="form-control">
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <div class="modal" id="modallog" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Warna</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_terpilih">

                    <table>
                        <tr>
                            <td class="col-md-6">
                                <center>
                                    <b>Input Date:</b><span id="input_date"></span>
                                </center>
                            </td>
                            <td class="col-md-6">
                                <center>
                                    <b>User Input:</b><span id="input_user"></span>
                                </center>
                            </td>
                        </tr>
                    </table>

                    <div id="isi_log">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
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

<!-- detail permintaan material -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>inventoryLine/detail_inline",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi    = "";
                $status = "";

                for($i=0;$i<respond['jm_det_inline'];$i++){
                    if(respond['det_inline'][$i]['status'] == 0){
                        $status = "In";
                    } else{
                        $status = "Out";
                    }

                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inline'][$i]['tanggal']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inline'][$i]['jumlah_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inline'][$i]['satuan_keluar']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $status+
                        '</td>'+
                    '</tr>';

                }

                $table =                 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'No'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Tanggal'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Jumlah Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Status'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                               $isi+
                            '</tbody>'+
                '</table>';

                $("#table_detail").html($table);
            }
        });
    });
</script>

    