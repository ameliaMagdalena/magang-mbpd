<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah Invoice</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tambah Invoice</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Buat Invoice</h2>
        </header>

        <div class="panel-body">
            <h4><b>Surat Jalan</b></h4>

            <form method="POST" action="<?= base_url()?>invoice/coba_tambah_invoice">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th style="text-align: center;vertical-align: middle;">
                                No
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Nomor Surat Jalan
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Tanggal
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nonya = 1;
                            foreach($surat_jalan as $sj){?>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">
                                    <!-- status 0 (blm ditambahkan), status 1 (sudah ditambahkan) -->
                                    <input type="hidden"  name="stat<?=$nonya;?>" id="stat<?=$nonya;?>" value="0">
                                    <?= $nonya ?>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="hidden" name="id<?=$nonya;?>" id="id<?=$nonya;?>" value="<?= $sj->id_surat_jalan?>">
                                    <?= $sj->id_surat_jalan ?>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <?php 
                                        $waktu = $sj->tanggal;

                                        $hari_array = array(
                                            'Minggu',
                                            'Senin',
                                            'Selasa',
                                            'Rabu',
                                            'Kamis',
                                            'Jumat',
                                            'Sabtu'
                                        );
                                        $hr = date('w', strtotime($waktu));
                                        $hari = $hari_array[$hr];
                                        $tanggal = date('j', strtotime($waktu));
                                        $bulan_array = array(
                                            1 => 'Januari',
                                            2 => 'Februari',
                                            3 => 'Maret',
                                            4 => 'April',
                                            5 => 'Mei',
                                            6 => 'Juni',
                                            7 => 'Juli',
                                            8 => 'Agustus',
                                            9 => 'September',
                                            10 => 'Oktober',
                                            11 => 'November',
                                            12 => 'Desember',
                                        );
                                        $bl = date('n', strtotime($waktu));
                                        $bulan = $bulan_array[$bl];
                                        $tahun = date('Y', strtotime($waktu));
                                        
                                        echo "$hari, $tanggal $bulan $tahun";
                                    ?>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                        value="<?= $nonya;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                    <div id="div_badd<?= $nonya; ?>">
                                        <button type="button" class="add_sj col-lg-3 btn btn-success fa fa-plus-square-o" 
                                        value="<?= $nonya;?>" title="Add" style="margin-right:5px;margin-bottom:5px"></button>
                                    </div>
                                    <div id="div_bremove<?= $nonya; ?>" style="display:none">
                                        <button type="button" class="remove_sj col-lg-3 btn btn-danger fa fa-minus-square-o" 
                                        value="<?= $nonya;?>" title="Remove" style="margin-right:5px;margin-bottom:5px"></button>
                                    </div>
                                </td>
                            </tr>
                        <?php $nonya++; } ?>
                    </tbody>
                </table>
                <input type="hidden" name="jumlah_sj" id="jumlah_sj" value="<?= ($nonya-1) ?>">
            
                <br>
                <hr>
                <h4><b>Invoice</b></h4>

                <div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Invoice</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="id_invoice"
                            value="<?= $idnya ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" name="id_po"
                            value="<?= $id_po ?>" readonly>
                            <input type="text" class="form-control" name="kode_po"
                            value="<?= $kode_po ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" name="tanggal" value="<?= $now ?>" readonly>
                            <input type="text" class="form-control" value="<?php
                                    $waktu = $now;

                                    $hari_array = array(
                                        'Minggu',
                                        'Senin',
                                        'Selasa',
                                        'Rabu',
                                        'Kamis',
                                        'Jumat',
                                        'Sabtu'
                                    );
                                    $hr = date('w', strtotime($waktu));
                                    $hari = $hari_array[$hr];
                                    $tanggal = date('j', strtotime($waktu));
                                    $bulan_array = array(
                                        1 => 'Januari',
                                        2 => 'Februari',
                                        3 => 'Maret',
                                        4 => 'April',
                                        5 => 'Mei',
                                        6 => 'Juni',
                                        7 => 'Juli',
                                        8 => 'Agustus',
                                        9 => 'September',
                                        10 => 'Oktober',
                                        11 => 'November',
                                        12 => 'Desember',
                                    );
                                    $bl = date('n', strtotime($waktu));
                                    $bulan = $bulan_array[$bl];
                                    $tahun = date('Y', strtotime($waktu));
                                    
                                    echo "$hari, $tanggal $bulan $tahun";
                                ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Ditujukan Kepada</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="ditujukan_kepada"
                            required>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="<?= $cust[0]['nama_customer']?>"
                            readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Rekening</label>
                        <div class="col-sm-7">
                            <select name="id_rekening" id="id_rekening" 
                                required class="form-control mb-md">
                                <?php foreach($rekening as $rk){?>
                                    <option value="<?= $rk->id_rekening?>">
                                        <?= $rk->nama_bank ." (". $rk->nomor_rekening ." - ". $rk->atas_nama  .")" ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="keterangan" rows="3" id="textareaDefault">
                            </textarea>
                        </div>
                    </div>

                    <br>
                    <div id="isinya">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                            <thead>
                                <tr>
                                    <th style="text-align: center;vertical-align: middle;">
                                        No
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Item Description
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Qty
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Unit (Qty)
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Price
                                    </th>
                                    <th style="text-align: center;vertical-align: middle;">
                                        Total Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($det_po as $dpo){?>
                                    <tr>
                                        <td style="text-align: center;vertical-align: middle;">
                                            <?= $no; ?>
                                            <input type="hidden" id="id_detprod<?=$no?>" name="id_detprod<?=$no?>" value="<?= $dpo->id_detail_produk?>"> 
                                            <input type="hidden" id="keterangan<?=$no?>" name="keterangan<?=$no?>"> 
                                        </td>
                                        <td style="text-align: center;vertical-align: middle;">
                                            <!-- memiliki ukuran & warna -->
                                            <?php if($dpo->keterangan == 0){
                                                $ukuran_tam = "";
                                                $warna_tam  = "";
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $dpo->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                    }
                                                }
                                                
                                                foreach($warna as $w){
                                                    if($w->id_warna == $dpo->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <?= $dpo->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                            <!-- memiliki ukuran -->
                                            <?php } else if($dpo->keterangan == 1){
                                                $ukuran_tam = "";
                                                
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $dpo->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                    }
                                                }
                                            ?>
                                                <?= $dpo->nama_produk ?> <?= $ukuran_tam?>
                                            <?php } else if($dpo->keterangan == 2){
                                                $warna_tam = "";

                                                foreach($warna as $w){
                                                    if($w->id_warna == $dpo->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <?= $dpo->nama_produk ?> (<?= $warna_tam;?>)
                                            <?php } else{?>
                                                <?= $dpo->nama_produk ?>
                                            <?php } ?>
                                        </td>
                                        <td style="text-align: center;vertical-align: middle;">
                                            <input type="hidden" id="qty<?=$no;?>" name="qty<?=$no;?>" value="0" class="form-control">
                                            <p id="qtys<?=$no;?>"></p>
                                        </td>
                                        <td style="text-align: center;vertical-align: middle;">
                                            Pcs
                                        </td>
                                        <td style="text-align: center;vertical-align: middle;">
                                            <input type="hidden" id="price<?=$no;?>" name="price<?=$no;?>" value="<?= $dpo->harga_satuan?>" class="form-control">
                                            <?php $harga =  "Rp " . number_format($dpo->harga_satuan,2,',','.'); ?>
                                            <p id="prices<?=$no;?>"><?= $harga ?></p>
                                        </td>
                                        <td style="text-align: center;vertical-align: middle;">
                                            <input type="hidden" id="tprice<?=$no;?>" name="tprice<?=$no;?>" value="0" class="form-control">
                                            <p id="tprices<?=$no;?>"></p>
                                        </td>
                                    </tr>
                                <?php $no++; } ?>
                                <tr>
                                    <td colspan="3"  rowspan="4" 
                                    style="text-align: center;vertical-align: middle; background-color:white;border-left: 1px solid white;border-bottom: 1px solid white;"></td>
                                    <td colspan="2" style="text-align: center;vertical-align: middle;">Subtotal</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="subtotal" id="subtotal">
                                        <p name="subtotals" id="subtotals"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;vertical-align: middle;">Discount (%)</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <center>
                                            <input type="number" min="0" max="100" class="form-control" oninput="dis_change()"
                                            name="disc_rate" id="disc_rate" style="width:70px" step=".01">
                                        </center>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="disc" id="disc">
                                        <p name="discs" id="discs"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;vertical-align: middle;">PPN (%)</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <center>
                                            <input type="number" class="form-control" style="width:70px" value="<?= $ppn[0]['isi_tetapan'] ?>"
                                            name="ppn_rate" id="ppn_rate" readonly>
                                        </center>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="ppn" id="ppn">
                                        <p name="ppns" id="ppns"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;vertical-align: middle;">Total</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="hidden" name="total" id="total">
                                        <p name="totals" id="totals"></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="jumlah" id="jumlah" value="<?= $no-1 ?>">
                    <br>
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan" disabled>
                        </div>
                    </div>
                </footer>
            </form>
        </div>
    </div>
    
    <!-- modal detail -->
    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Surat Jalan</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor Surat Jalan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_sj_ed" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tgl_ed" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault" id="ket_ed" readonly>
                            </textarea>
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

<!-- detail surat jalan -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>invoice/detail_sj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_sj_ed").val(respond['sj'][0]['id_surat_jalan']);
                
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['sj'][0]['tanggal']).getDate();
                var xhari = new Date(respond['sj'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['sj'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['sj'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;


                $("#tgl_ed").val($tanggalnya);
                $("#ket_ed").val(respond['sj'][0]['keterangan']);

                $isi = "";
                for($i=0;$i<respond['jm_isj'];$i++){
                    $namanya = "";

                    if(respond['isj'][$i]['keterangan'] == 0){
                        $id_ukuran = respond['isj'][$i]['id_ukuran'];
                        $id_warna  = respond['isj'][$i]['id_warna'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['isj'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                    }
                    else if(respond['isj'][$i]['keterangan'] == 1){
                        $id_ukuran = respond['isj'][$i]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        $namanya = respond['isj'][$i]['nama_produk'] + $ukurannya;

                    }
                    else if(respond['isj'][$i]['keterangan'] == 2){
                        $id_warna  = respond['isj'][$i]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['isj'][$i]['nama_produk'] + " (" + $warnanya + " )";
                    }
                    else{
                        $namanya = respond['isj'][$i]['nama_produk'];
                    }

                    $isi = $isi + 
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                ($i+1)+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $namanya+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['isj'][$i]['kode_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['isj'][$i]['jumlah_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">Pcs</td>'+
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
                                'Nama Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Kode Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Total Produk'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Satuan'+
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

<!-- add sj -->
<script>
    $('.add_sj').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>invoice/item_sj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                for($i=0;$i<respond['jm_isj'];$i++){
                    $id_isj     = respond['isj'][$i]['id_item_surat_jalan'];
                    $id_detprod = respond['isj'][$i]['id_detail_produk'];
                    var jumlah_prd = respond['isj'][$i]['jumlah_produk'];

                    for($j=1;$j<=$("#jumlah").val();$j++){
                        $id_detpro_inv = $("#id_detprod"+$j).val();
                        
                        if($id_detpro_inv == $id_detprod){
                            var qty_bfr = $("#qty"+$j).val();
                            var qty_aft = parseInt(qty_bfr) + parseInt(jumlah_prd);

                            $("#qty"+$j).val(qty_aft);
                            $("#qtys"+$j).html(qty_aft);

                            var price_bfr  = $("#price"+$j).val();
                            var tprice_aft =  parseInt(qty_aft) * parseInt(price_bfr);

                            var num = "Rp "+  new Number( tprice_aft).toLocaleString("id-ID") + ",00";
                     
                            $("#tprice"+$j).val(tprice_aft);
                            $("#tprices"+$j).html(num);
                        }
                    }
                }

                //subtotal
                $subtotal = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    $pricenya = parseInt($("#tprice"+$j).val());

                    if($pricenya != null){
                        $pricenya = $pricenya;
                    }
                    else{
                        $pricenya = 0;
                    }
                    $subtotal = parseInt($subtotal) + $pricenya;
                }

                //alert($subtotal);
                $("#subtotal").val($subtotal);

                var num = "Rp "+  new Number($subtotal).toLocaleString("id-ID") + ",00";
                $("#subtotals").html(num);

                //discount
                if($("#disc_rate").val() != "" || $("#disc_rate").val() != 0){
                    $discount_rate = $("#disc_rate").val();

                    $discountnya = $subtotal * $discount_rate / 100;

                    $("#disc").val($discountnya);
                    var num = "Rp "+  new Number($discountnya).toLocaleString("id-ID") + ",00";
                    $("#discs").html(num);
                }
                else{
                    $discountnya = 0;
                    $("#disc").val(0);
                    $("#discs").html("-");
                }

                //ppn
                $ppn_rate = $("#ppn_rate").val();
                $ppnnya = $subtotal * $ppn_rate / 100;

                $("#ppn").val($ppnnya);
                var num = "Rp "+  new Number($ppnnya).toLocaleString("id-ID") + ",00";
                $("#ppns").html(num);

                $total = parseInt($subtotal) - parseInt($discountnya) + parseInt($ppnnya);

                $("#total").val($total);
                var num = "Rp "+  new Number($total).toLocaleString("id-ID") + ",00";
                $("#totals").html(num);

                $("#stat"+no).val(1);
                $("#div_badd"+no).hide();
                $("#div_bremove"+no).show();

                //keterangan
                $cek_terisi = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    if($("#qty"+$j).val() == 0 || $("#qty"+$j).val() == ""){
                        $("#keterangan"+$j).val(0);
                    }
                    else{
                        $("#keterangan"+$j).val(1);
                        $cek_terisi++;
                    }
                }

                if($cek_terisi > 0){
                    $("#tambah").attr('disabled',false);
                } else{
                    $("#tambah").attr('disabled',true);
                }
            }
        });  

    });
</script>

<!-- remove sj -->
<script>
    $('.remove_sj').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>invoice/item_sj",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                for($i=0;$i<respond['jm_isj'];$i++){
                    $id_isj     = respond['isj'][$i]['id_item_surat_jalan'];
                    $id_detprod = respond['isj'][$i]['id_detail_produk'];
                    $jumlah_prd = respond['isj'][$i]['jumlah_produk'];

                    
                    for($j=1;$j<=$("#jumlah").val();$j++){
                        $id_detpro_inv = $("#id_detprod"+$j).val();
                        
                        if($id_detpro_inv == $id_detprod){
                            $qty_bfr = $("#qty"+$j).val();
                            $qty_aft = parseInt($qty_bfr) - parseInt($jumlah_prd);

                            $("#qty"+$j).val($qty_aft);
                            $("#qtys"+$j).html($qty_aft);

                            $price_bfr = $("#price"+$j).val();
                            $tprice_aft = $qty_aft * $price_bfr;

                            $("#tprice"+$j).val($tprice_aft);
                            var num = "Rp "+  new Number($tprice_aft).toLocaleString("id-ID") + ",00";
                            $("#tprices"+$j).html(num);
                        }
                    }
                }

                //subtotal
                $subtotal = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    $subtotal = parseInt($subtotal) + parseInt($("#tprice"+$j).val());
                }

                if($subtotal == 0){
                    $("#subtotal").val(0);
                    $("#subtotals").html("");
                }
                else{
                    $("#subtotal").val($subtotal);
                    var num = "Rp "+  new Number($subtotal).toLocaleString("id-ID") + ",00";
                    $("#subtotals").html(num);
                }

                //discount
                if($("#disc_rate").val() != "" || $("#disc_rate").val() != 0){
                    $discount_rate = $("#disc_rate").val();

                    $discountnya = $subtotal * $discount_rate / 100;

                    if($discountnya == 0){
                        $("#disc").val(0);
                        $("#discs").html("-");
                    }
                    else{
                        $("#disc").val($discountnya);
                        var num = "Rp "+  new Number($discountnya).toLocaleString("id-ID") + ",00";
                        $("#discs").html($num);
                    }
                    
                }
                else{
                    $discountnya = 0;
                    $("#disc").val(0);
                    $("#discs").html("-");
                }

                //ppn
                $ppn_rate = $("#ppn_rate").val();
                $ppnnya = $subtotal * $ppn_rate / 100;

                if($ppnnya == 0){
                    $("#ppn").val(0);
                    $("#ppns").html("-");
                }
                else{
                    $("#ppn").val($ppnnya);
                    var num = "Rp "+  new Number($ppnnya).toLocaleString("id-ID") + ",00";
                    $("#ppns").html(num);
                }

                $total = parseInt($subtotal) - parseInt($discountnya) + parseInt($ppnnya);

                if($total == 0){
                    $("#total").val(0);
                    $("#totals").html("");
                }
                else{
                    $("#total").val($total);
                    var num = "Rp "+  new Number($total).toLocaleString("id-ID") + ",00";
                    $("#totals").html(num);
                }

                //button
                $("#stat"+no).val(0);
                $("#div_badd"+no).show();
                $("#div_bremove"+no).hide();

                //keterangan
                $cek_terisi = 0;
                for($j=1;$j<=$("#jumlah").val();$j++){
                    if($("#qty"+$j).val() == 0 || $("#qty"+$j).val() == ""){
                        $("#keterangan"+$j).val(0);
                    }
                    else{
                        $("#keterangan"+$j).val(1);
                        $cek_terisi++;
                    }
                }

                if($cek_terisi > 0){
                    $("#tambah").attr('disabled',false);
                } else{
                    $("#tambah").attr('disabled',true);
                }
            }
        });  

    });
</script>

<!-- disc change -->
<script>
    function dis_change(){
        $disc_rate = $("#disc_rate").val();

        $disc_aft  = $("#subtotal").val() * $disc_rate / 100;

        if($disc_aft == 0){
            $("#disc").val(0);
            $("#discs").html("-");
        }
        else{
            $("#disc").val($disc_aft);
            var num = "Rp "+  new Number($disc_aft).toLocaleString("id-ID") + ",00";
            $("#discs").html(num);
        }

       
        $total = parseInt($("#subtotal").val()) - parseInt($disc_aft) + parseInt($("#ppn").val());

        $("#total").val($total);
        var num = "Rp "+  new Number($total).toLocaleString("id-ID") + ",00";
        $("#totals").html(num);
    }
</script>

    