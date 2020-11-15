<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>+ Laporan Perencanaan Cutting</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>+ Laporan Perencanaan Cutting</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Perencanaan Cutting</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                        $no = 1;
                        foreach($tanggal as $x){ ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $no; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="hidden" id="tanggal<?= $no?>" value="<?= $x->tanggal ?>">
                                <?= $x->tanggal;?>
                            </td>
                            <td  class="col-lg-3">
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail"></button>
                                <button type="button" class="badd_klik col-lg-3 btn btn-success fa fa-plus-square-o" 
                                    value="<?= $no;?>" title="Buat Laporan Perencanaan Cutting"></button>
                            </td>
                        </tr>
                    <?php $no; } ?>
                    
                </tbody>
            </table>
        </div>
    </div>

</section>

    <!-- modal detail -->
    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Perencanaan Cutting</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Cutting</label>
                    <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="tanggal_det" readonly>
                        </div>
                    </div>

                    <br>
                    <div id="table_detail">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal add -->
    <div class="modal" id="modaladd" role="dialog">
        <div class="modal-dialog modal-xl" style="width:75%">
            <form method="POST" action="<?= base_url()?>laporanPerencanaanCutting/coba_tambah_laporan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Buat Laporan Perencanaan Cutting</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Cutting</label>
                        <div class="col-sm-7">
                                <input type="text" class="form-control"
                                id="tanggal_add" readonly>
                            </div>
                        </div>

                        <br>
                        <div id="table_add">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
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

<!-- detail -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var tanggal = $("#tanggal"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanPerencanaanCutting/detail_perencanaan_cutting",
            dataType: "JSON",
            data: {tanggal:tanggal},

            success: function(respond){
                $("#tanggal_det").val(respond['percut'][0]['tanggal_percut']);

                $isi = "";

                for($i=0;$i<respond['jm_percut'];$i++){
                    $status = "";
                    if(respond['percut'][$i]['status_percut'] == 0){
                        $status = "Belum Ada Laporan";
                    } else{
                        $status = "Sudah Ada Laporan";
                    }

                    //nama produk
                        if(respond['percut'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['percut'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['percut'][$i]['keterangan'] == 2){
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }
                            $namanya = respond['percut'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['percut'][$i]['nama_produk'];
                        }
                    //tutup nama produk


                    $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $namanya+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['tanggal_produksi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['jumlah_percut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $status+
                        '</td>'+
                    '</tr>';
                }

                $table=
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'No'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Nama Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Tanggal Produksi'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Perencanaan Cutting Kain'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Status Perencanaan'+
                            '</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        $isi+
                    '</tbody>'+
                '</table>';

                $("#table_detail").html($table);

                $("#modaldetail").modal();
            }
        });
    });
</script>

<!-- add -->
<script>
    $('.badd_klik').click(function(){
        var no      = $(this).attr('value');
        var tanggal = $("#tanggal"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>laporanPerencanaanCutting/detail_perencanaan_cutting",
            dataType: "JSON",
            data: {tanggal:tanggal},

            success: function(respond){
                $("#tanggal_add").val(respond['percut'][0]['tanggal_percut']);

                $isi = "";

                for($i=0;$i<respond['jm_percut'];$i++){
                    $status = "";
                    if(respond['percut'][$i]['status_percut'] == 0){
                        $status = "Belum Ada Laporan";
                    } else{
                        $status = "Sudah Ada Laporan";
                    }

                    //nama produk
                        if(respond['percut'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['percut'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['percut'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['percut'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['percut'][$i]['keterangan'] == 2){
                            $id_warna  = respond['percut'][$i]['id_warna'];

                            for($w=0;$w<respond['jmwarna'];$w++){
                                if(respond['warna'][$w]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$w]['nama_warna'];
                                }
                            }
                            $namanya = respond['percut'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['percut'][$i]['nama_produk'];
                        }
                    //tutup nama produk

                    $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $namanya+
                            '<input type="hidden" name="id_percut'+$i+'" value="'+respond['percut'][$i]['id_perencanaan_cutting']+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['tanggal_produksi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['percut'][$i]['jumlah_percut']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center><input type="number" min="0" max="'+respond['percut'][$i]['jumlah_percut']+'" name="jm_aktual'+$i+'" class="form-control" style="width:80px;height:25px" required></center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<textarea type="text" class="form-control" name="ket'+$i+'"></textarea>'+
                        '</td>'+
                    '</tr>';
                }

                $table=
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'No'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Nama Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Tanggal Produksi'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Perencanaan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Jumlah Aktual'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Keterangan'+
                            '</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        $isi+
                    '</tbody>'+
                '</table>'+
                '<input type="hidden" name="jumlah_detail" value="'+respond['jm_percut']+'">'; 

                $("#table_add").html($table);
                $("#modaladd").modal();
            }
        });
    });
</script>