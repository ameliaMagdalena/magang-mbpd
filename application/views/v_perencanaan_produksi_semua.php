<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua Perencanaan Produksi</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Semua Perencanaan Produksi</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Perencanaan Produksi</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal Awal</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal Akhir</th>
                        <th style="text-align: center;vertical-align: middle;">Status</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($monday as $x){?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $x->tanggal_mulai;?>
                                <input type="hidden" id="s<?= $no;?>" value="<?= $x->tanggal_mulai;?>">
                                <input type="hidden" id="id_produksi<?= $no;?>" value="<?= $x->id_produksi;?>">
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $x->tanggal_selesai;?>
                                <input type="hidden" id="e<?= $no;?>" value="<?= $x->tanggal_selesai;?>">
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php if($x->start > $now){?>
                                    Belum Produksi
                                <?php }  else if($x->start < $now && $x->end > $now){ ?>
                                    Sedang Produksi
                                <?php } else if($x->end < $now){?>
                                    Selesai
                                <?php } ?> 
                            </td>
                            <td  class="col-lg-3">
                                <button type="button" class="bdetail_klik col-lg-3 btn btn-primary fa fa-info-circle" title="Detail"
                                id="bdetail<?php echo $x->id_produksi?>" value="<?= $no ?>"></button>
                                <?php if($x->start < $now && $x->end > $now){ ?>
                                    <form method="POST" action="<?= base_url()?>perencanaanProduksi/edit_perencanaan_produksi">
                                        <input type="hidden" name="id" value="<?= $x->id_produksi?>">
                                        <button type="submit" class="col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                        title="Edit"></button>
                                    </form>
                                <?php }?>
                                <?php if($x->start > $now){?>
                                    <form method="POST" action="<?= base_url()?>perencanaanProduksi/edit_perencanaan_produksi">
                                        <input type="hidden" name="id" value="<?= $x->id_produksi?>">
                                        <button type="submit" class="col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                        title="Edit"></button>
                                    </form>
                                    <button type="button" class="bdelete_klik col-lg-3 btn btn-danger fa fa-trash-o" title="Delete"
                                    id="bdelete<?php echo $x->id_produksi?>" value="<?= $no ?>"></button>
                                <?php } ?>  
                                <form method="POST" action="<?= base_url()?>perencanaanProduksi/print_perencanaan_produksi">
                                    <input type="hidden" name="id" value="<?= $x->id_produksi?>">
                                    <button type="submit" class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                    title="Print"></button>
                                </form>  
                            </td>
                        </tr>

                    <?php $no++; }?>
                </tbody>
	        </table>
        </div>
    </div>

    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Perencanaan Produksi</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_terpilih">


                    <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Tanggal Awal</label>
                    <div class="col-sm-7">
                            <input type="text" id="dtanggal_awal" class="form-control"
                            readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Akhir</label>
                        <div class="col-sm-7">
                            <input type="text" id="dtanggal_akhir" class="form-control"
                            value="Minggu, 14-08-2020" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Line</label>
                        <div class="col-sm-7">
                            <select class="form-control mb-md" onchange="ubah_line()" id="select_line">
                                <option>Pilih Line</option>
                                <?php 
                                $no = 0;
                                foreach($line as $ln){?>
                                    <option value="<?= $ln->id_line ?>">
                                        <?= $ln->nama_line; ?>
                                    </option>
                                <?php $no++;} ?>
                                <option value="semua">Semua Line</option>
                            </select>
                        </div>
                    </div>

                    <div id="isi_detail">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="reload()">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modaldelete" role="dialog">
        <div class="modal-dialog modal-xl" style="width:40%">
            <form method="POST" action="<?= base_url()?>perencanaanProduksi/delete_perencanaan_produksi">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Perencanaan Produksi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <input type="hidden" name="id_produksi" id="id_produksi_edit">
                                <p>Apakah anda yakin akan menghapus data perencanaan produksi untuk Senin, 08-08-2020 hingga Minggu, 14-08-2020 ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Delete">
                        <button class="btn btn-default modal-dismiss" onclick="reload()">Cancel</button>
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

<!-- modal detail -->
<script>
    $('.bdetail_klik').click(function(){
        var no = $(this).attr('value');
        var id_produksi = $("#id_produksi"+no).val();

        $.ajax({
                type:"post",
                url:"<?php echo base_url() ?>perencanaanProduksi/ambil_data_produksi_line",
                dataType: "JSON",
                data: {id_produksi:id_produksi},

                success: function(respond){
                   $("#dtanggal_awal").val($("#s"+no).val());
                   $("#dtanggal_akhir").val($("#e"+no).val());
                
                    $atasnya ="";
                    for($i=0;$i<7;$i++){
                        $atasnya = $atasnya +
                        '<th  style="text-align: center;vertical-align: middle;">'+
                            respond['day'+$i];+
                        '</th>';
                    }
                    
                    var isi = [];
                    var ef = [];
                    var tw = [];
                    var sts = [];

                    for($l=1;$l<=respond['jmline'];$l++){
                        isi[$l] = "";
                        $id_line = respond['line'][$l-1]['id_line'];

                        
                        ef[$l]  = "";
                        tw[$l]  = "";
                        sts[$l] = "";

                        for($d=0;$d<7;$d++){
                            $tgl = respond['semua_tanggals'][$d]['tanggal'];
                           // ef[$l] = ef[$l] + '<td>'+$tgl+'</td>';
                            for($r=0;$r<28;$r++){
                                $tanggal = respond['produksi_line'][$r]['tanggal'];
                                $idline  = respond['produksi_line'][$r]['id_line'];

                                if($tanggal == $tgl && $idline == $id_line ){
                                    if(respond['produksi_line'][$r]['status_perencanaan'] == 0){
                                        $status = "Tidak Ada";
                                    }
                                    else if(respond['produksi_line'][$r]['status_perencanaan'] == 1){
                                        $status = "Tidak Overtime";
                                    }else{
                                        $status = "Overtime";
                                    }

                                    ef[$l] = ef[$l] + '<td><center>'+respond['produksi_line'][$r]['efisiensi_perencanaan']+' % </center></td>';
                                    tw[$l] = tw[$l] + '<td><center>'+respond['produksi_line'][$r]['total_waktu_perencanaan']+'</center></td>';
                                    sts[$l] = sts[$l] + '<td><center>'+$status+'</center></td>';
                                }
                            }
                        }

                        for($j=1;$j<=3;$j++){
                            if($j==1){
                                isi[$l] = isi[$l]+
                                '<tr>'+
                                    '<td>Efisiensi Perencanaan</td>'+
                                    ef[$l]+ 
                                '</tr>';
                            }
                            else if($j==2){
                                isi[$l] = isi[$l]+
                                '<tr>'+
                                    '<td>Total Waktu Perencanaan (s)</td>'+
                                    tw[$l]+
                                '</tr>';
                            }
                            else{
                                isi[$l] = isi[$l]+
                                '<tr>'+
                                    '<td>Status Perencanaan</td>'+
                                    sts[$l]+
                                '</tr>';
                            }
                        }
                    }

                   $isiisi = "";
                   $jmline = respond['jmline'];
                   for($q=1;$q<=$jmline;$q++){
                    $id_lines = respond['line'][$q-1]['id_line'];

                    $isiisi = $isiisi +
                    '<div id="perc'+$id_lines+'" class="divnya" style="display:none"><p>'+ respond['line'][$q-1]['nama_line']+'</p>'+
                    '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:11px">'+
                        '<thead>'+
                            '<tr>'+
                                '<th  style="text-align: center;vertical-align: middle;"></th>'+
                                $atasnya+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            isi[$q]+
                        '</tbody>'+
                    '</table><br></div>';
                   } 
                    
                $("#isi_detail").html($isiisi);
                $("#modaldetail").modal();
                    
            }
        });

    });
</script>

<!-- detail, jika ubah line -->
<script>
    function ubah_line(){
        $(".divnya").hide();

        $id_line = $("#select_line").val();

        if($id_line == "semua"){
            $(".divnya").show();
        }
        else{  
            $('#perc'+$id_line).show();
        }
    }
</script>

<!-- jika di delete -->
<script>
    $('.bdelete_klik').click(function(){
        var no = $(this).attr('value');
        var id_produksi = $("#id_produksi"+no).val();

        $("#id_produksi_edit").val(id_produksi);
        $("#modaldelete").modal();
    });
</script>






    