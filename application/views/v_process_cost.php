<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Process Cost</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Process Cost</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Process Cost Produk</h2>
    </header>

    <div class="panel-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Nama Produk</label>
            <div class="col-md-6">
                <select data-plugin-selectTwo class="form-control populate" id="produk_terpilih" onchange="ganti()">
                    <option value="-" >Pilih Produk</option>
                    <?php foreach($produk as $p){?>
                        <option value="<?= $p->id_produk ?>"><?= $p->nama_produk?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <div id="tabelnya">

        </div>
    </div>
</section>       
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
    function ganti(){
        var id = $("#produk_terpilih").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>processCost/get_process_cost",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $tampung_isi = "";

                $totalnya = 0;

                for($i=0;$i<respond['jm_km'];$i++){
                    $totals = (respond['km'][$i]['cycle_time'] * (respond['km'][$i]['satuan_biaya'] * respond['km'][$i]['jumlah_pekerja_per_team']));
                    $totalnya = $totalnya + $totals;
                    
                    $satuan_biaya = "Rp "+  new Number(respond['km'][$i]['satuan_biaya']).toLocaleString("id-ID") + ",00";
                    $man_power    = "Rp "+  new Number((respond['km'][$i]['satuan_biaya'] * respond['km'][$i]['jumlah_pekerja_per_team'])).toLocaleString("id-ID") + ",00";
                    $total        = "Rp "+  new Number((respond['km'][$i]['cycle_time'] * (respond['km'][$i]['satuan_biaya'] * respond['km'][$i]['jumlah_pekerja_per_team']))).toLocaleString("id-ID") + ",00";

                    $tampung_isi = $tampung_isi + 
                    '<tr>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+
                            respond['km'][$i]['nama_line']+
                        '</td>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+
                            respond['km'][$i]['cycle_time']+
                        '</td>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+
                            respond['km'][$i]['jumlah_pekerja_per_team']+
                        '</td>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+
                            $satuan_biaya+
                        '</td>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+
                            $man_power+
                        '</td>'+
                        '<td  style="text-align: center;vertical-align: middle;">'+
                            $total+
                        '</td>'+
                    '</tr>';
                }

                $totalnya =  "Rp "+  new Number($totalnya).toLocaleString("id-ID") + ",00";

                $total = 
                '<tr>'+
                    '<td  colspan="6" style="text-align: center;vertical-align: middle;"><b>Total</b></td>'+
                    '<td  style="text-align: center;vertical-align: middle;"><b>'+$totalnya+'</b></td>'+
                '</tr>';

                $isi = '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                '<thead>' +
                    '<th style="text-align: center;vertical-align: middle;">No</th>'+
                    '<th style="text-align: center;vertical-align: middle;">Process</th>'+
                    '<th style="text-align: center;vertical-align: middle;">Cycle Time</th>'+
                    '<th style="text-align: center;vertical-align: middle;">Jumlah Pekerja Per Team</th>'+
                    '<th style="text-align: center;vertical-align: middle;">Satuan Biaya</th>'+
                    '<th style="text-align: center;vertical-align: middle;">Man Power Cost (dtk)</th>'+
                    '<th style="text-align: center;vertical-align: middle;">Total</th>'+
                '</thead>'+
                '<tbody>' +
                    $tampung_isi +
                    $total +
                '</tbody>';
                
                $("#tabelnya").html($isi);
            }
        });
    }
</script>





    