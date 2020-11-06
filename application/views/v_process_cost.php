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
        //alert($("#produk_terpilih").val());
        //$isi = "aa";

        $tampung_isi = 
        '<tr>'+
            '<td  style="text-align: center;vertical-align: middle;">1</td>'+
            '<td  style="text-align: center;vertical-align: middle;">Line Cutting</td>'+
            '<td  style="text-align: center;vertical-align: middle;">60 dtk (1m)</td>'+
            '<td  style="text-align: center;vertical-align: middle;">1.000</td>'+
            '<td  style="text-align: center;vertical-align: middle;">60.000</td>'+
        '</tr>'+
        '<tr>'+
            '<td  style="text-align: center;vertical-align: middle;">2</td>'+
            '<td  style="text-align: center;vertical-align: middle;">Line Bonding</td>'+
            '<td  style="text-align: center;vertical-align: middle;">120 dtk (2m)</td>'+
            '<td  style="text-align: center;vertical-align: middle;">1.000</td>'+
            '<td  style="text-align: center;vertical-align: middle;">120.000</td>'+
        '</tr>'+
        '<tr>'+
            '<td  style="text-align: center;vertical-align: middle;">3</td>'+
            '<td  style="text-align: center;vertical-align: middle;">Line Sewing</td>'+
            '<td  style="text-align: center;vertical-align: middle;">120 dtk (2m)</td>'+
            '<td  style="text-align: center;vertical-align: middle;">1.000</td>'+
            '<td  style="text-align: center;vertical-align: middle;">120.000</td>'+
        '</tr>'+
        '<tr>'+
            '<td  style="text-align: center;vertical-align: middle;">4</td>'+
            '<td  style="text-align: center;vertical-align: middle;">Line Assy</td>'+
            '<td  style="text-align: center;vertical-align: middle;">300 dtk (5m)</td>'+
            '<td  style="text-align: center;vertical-align: middle;">1.000</td>'+
            '<td  style="text-align: center;vertical-align: middle;">300.000</td>'+
        '</tr>';

        $total = 
        '<tr>'+
            '<td  colspan="4" style="text-align: center;vertical-align: middle;"><b>Total</b></td>'+
            '<td  style="text-align: center;vertical-align: middle;"><b>600.000</b></td>'+
        '</tr>';

        $isi = '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
        '<thead>' +
            '<th style="text-align: center;vertical-align: middle;">No</th>'+
            '<th style="text-align: center;vertical-align: middle;">Process</th>'+
            '<th style="text-align: center;vertical-align: middle;">Cycle Time</th>'+
            '<th style="text-align: center;vertical-align: middle;">Man Power Cost (dtk)</th>'+
            '<th style="text-align: center;vertical-align: middle;">Total</th>'+
        '</thead>'+
        '<tbody>' +
            $tampung_isi +
            $total +
        '</tbody>';
        
        $("#tabelnya").html($isi);
    }
</script>





    