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
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Perencanaan Produksi Line</h2>
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
                        foreach($monday as $x){
                            $jm = 0;
                            $startny = $x->start;
                            $endny   = $x->end;

                            foreach($status_monday as $sm){ 
                                if($sm->tanggal_mulai>=$startny && $sm->tanggal_mulai<=$endny){
                                    $jm = $jm + $sm->total;
                                }
                            }

                            if($jm > 0){
                ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no ?></td>
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
                                <form method="POST" action="<?= base_url()?>perencanaanProduksi/print_perencanaan_produksi_line">
                                    <input type="hidden" name="id" value="<?= $x->id_produksi?>">
                                    <button type="submit" class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                    title="Print"></button>
                                </form>   
                            </td>
                        </tr>

                <?php $no++;}}?>
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
                    <input type="hidden" id="linenya" value="<?= $linenya ?>">

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

                    <div id="isi_detail">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="reload()">Ok</button>
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
                                    }
                                    else{
                                        $status = "Overtime";
                                    }

                                    ef[$l] = ef[$l] + '<td><center>'+respond['produksi_line'][$r]['efisiensi_perencanaan']+' %</center></td>';
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
                    $nm_lines = respond['line'][$q-1]['nama_line'];
                        if($nm_lines == $("#linenya").val()){
                            $isiisi = $isiisi +
                            '<br><table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:11px">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th  style="text-align: center;vertical-align: middle;"></th>'+
                                        $atasnya+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                    isi[$q]+
                                '</tbody>'+
                            '</table>';
                        }
                   } 
                $("#isi_detail").html($isiisi);
                $("#modaldetail").modal();
            }
        });

    });
</script>



    