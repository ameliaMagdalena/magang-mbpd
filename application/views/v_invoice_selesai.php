<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Invoice Selesai</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Invoice Selesai</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Invoice Selesai</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor Invoice</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor PO</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($invoice as $iv){
                            if($iv->status_invoice == 1){
                    ?>
                        <tr>
                            <td  style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $waktu = $iv->tanggal;

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
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $iv->id_invoice?>
                                <input type="hidden" id="id<?= $no ?>" value="<?= $iv->id_invoice?>">
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php foreach($po as $p){
                                    if($p->id_purchase_order_customer == $iv->id_purchase_order_customer){
                                        echo $p->kode_purchase_order_customer;
                                    }
                                 }
                                ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php if($iv->status_invoice == 0){
                                    echo "Belum Ditagih";
                                    } else{
                                        echo "Tertagih";
                                    }    
                                ?>
                            </td>
                            <td class="col-lg-3"> 
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button> 
                                <?php if($iv->status_invoice == 0){?>
                                    <form method="POST" action="<?= base_url()?>invoice/edit">
                                        <input type="hidden" name="id_invoice" value="<?= $iv->id_invoice?>">
                                        <input type="hidden" name="id_po" value="<?= $iv->id_purchase_order_customer?>">
                                        <button type="submit" class="col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                    </form> 
                                    <button type="button" class="bdel_klik col-lg-3 btn btn-danger fa fa-trash-o" 
                                        value="<?= $no;?>" title="Delete" style="margin-right:5px;margin-bottom:5px"></button>
                                    <button type="button" class="bkonf_klik col-lg-3 btn btn-success fa fa-check-square" 
                                        value="<?= $no;?>" title="Konfirmasi" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } ?>
                                    <form method="POST" action="<?= base_url()?>invoice/print_invoice">
                                        <input type="hidden" name="id_invoice" value="<?= $iv->id_invoice?>">
                                        <button type="button" class="bprint_klik col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                        value="<?= $no;?>" title="Print" style="margin-right:5px;margin-bottom:5px"></button>
                                    </form> 
                            </td>
                        </tr>
                    <?php $no++; }} ?>
                </tbody>
	        </table>
        </div>
    </div>

        <!-- modal konfirmasi -->
        <div class="modal" id="modalkonfirmasi" role="dialog">
            <div class="modal-dialog modal-xl" style="width:35%">
                <form method="POST" action="<?= base_url()?>invoice/tertagih">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Konfirmasi Invoice</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_invoice" id="id_invoice"> 
                            <p>Apakah anda yakin akan mengkonfirmasi penagihan untuk invoice dengan kode invoice <span id="kode_invoice"></span> ? </p>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Ya">
                            <button class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- modal detail -->
        <div class="modal" id="modaldetail" role="dialog">
            <div class="modal-dialog modal-xl" style="width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Detail Invoice</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor Invoice</label>
                            <div class="col-sm-7">
                                <input type="text" id="nomor_inv_det" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor PO</label>
                            <div class="col-sm-7">
                                <input type="text" id="nomor_po_det" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Customer</label>
                            <div class="col-sm-7">
                                <input type="text" id="nama_cust_det" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal</label>
                            <div class="col-sm-7">
                                <input type="text" id="tanggal_det" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Ditujukan Kepada</label>
                            <div class="col-sm-7">
                                <input type="text" id="ditujukan_det" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Rekening Pembayaran</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="3" id="rekening_det" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="5" id="keterangan_det" readonly></textarea>
                            </div>
                        </div>
                        
                        <div id="div_inv">
                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                    </div>
                </div>
            </div>
        </div>

        <!-- modal delete -->
        <div class="modal" id="modaldelete" role="dialog">
            <div class="modal-dialog modal-xl" style="width:35%">
                <form method="POST" action="<?= base_url()?>invoice/delete">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Hapus Data Invoice</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_invoice_hapus" id="id_invoice_hapus"> 
                            <p>Apakah anda yakin akan menghapus data invoice dengan nomor invoice <span id="kode_invoice_hapus"></span> ? </p>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Ya">
                            <button class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- modal print -->
        <div class="modal" id="modalprint" role="dialog">
            <div class="modal-dialog modal-xl" style="width:50%">
                <form method="POST" action="<?= base_url()?>invoice/print_invoice">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Print Data Invoice</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_invoice_print" id="id_invoice_print"> 
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Penanda Tangan</label>
                                <div class="col-sm-7">
                                    <select id="pilih" onchange="cekcek()"
                                        required class="form-control mb-md">
                                        <option>Pilih Penanda Tangan</option>
                                        <?php 
                                            $count = 1;
                                            foreach($penanda_tangan as $pt){?>
                                            <option value="<?= $count ?>">
                                                <?= $pt->nama_karyawan ." (". $pt->nama_jabatan .")" ?>
                                            </option>
                                        <?php $count++; } ?>
                                    </select>
                                </div>
                            </div>
                            <?php 
                                $no = 1;
                                foreach($penanda_tangan as $pt){?>
                                    <input type="hidden" id="nm<?= $no?>" value="<?= $pt->nama_karyawan?>">
                                    <input type="hidden" id="jb<?= $no?>" value="<?= $pt->nama_jabatan?>">
                            <?php $no++; }?>
                            <input type="hidden" name="nama_ttd" id="nama_ttd">
                            <input type="hidden" name="jabatan_ttd" id="jabatan_ttd">  
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" id="button_print" value="Print" disabled>
                            <button class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
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

<!-- konfirmasi -->
<script>
    $('.bkonf_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_invoice").val(id);
        $("#kode_invoice").html(id);
        $("#modalkonfirmasi").modal();
    });
</script>

<!-- detail -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>invoice/detail_invoice",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
               $("#nomor_inv_det").val(respond['inv'][0]['id_invoice']);
               for($q=0;$q<respond['jm_po'];$q++){
                   if(respond['po'][$q]['id_purchase_order_customer'] == respond['inv'][0]['id_purchase_order_customer']){
                        $("#nomor_po_det").val(respond['po'][$q]['kode_purchase_order_customer']);
                        $("#nama_cust_det").val(respond['po'][$q]['nama_customer']);
                   }
               }

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['inv'][0]['tanggal']).getDate();
                var xhari = new Date(respond['inv'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['inv'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['inv'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

               $("#tanggal_det").val($tanggalnya);
               $("#ditujukan_det").val(respond['inv'][0]['ditujukan_kepada']);

               $rekening = respond['inv'][0]['nama_bank'] + " (" + respond['inv'][0]['atas_nama'] + 
               " - " + respond['inv'][0]['nomor_rekening'] + " )" ;
               $("#rekening_det").val($rekening);
               $("#keterangan_det").val(respond['inv'][0]['keterangan']);

               $isi = "";

               for($i=0;$i<respond['jm_det_inv'];$i++){
                $namanya = "";

                //nama produk
                if(respond['det_inv'][$i]['keterangan'] == 0){
                    $id_ukuran = respond['det_inv'][$i]['id_ukuran'];
                    $id_warna  = respond['det_inv'][$i]['id_warna'];

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

                    $namanya = respond['det_inv'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                }
                else if(respond['det_inv'][$i]['keterangan'] == 1){
                    $id_ukuran = respond['det_inv'][$i]['id_ukuran'];

                    for($l=0;$l<respond['jmukuran'];$l++){
                        if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                            $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                            $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                            $ukurannya = $nama_ukuran + $satuan_ukuran;
                        }
                    }

                    $namanya = respond['det_inv'][$i]['nama_produk'] + $ukurannya;

                }
                else if(respond['det_inv'][$i]['keterangan'] == 2){
                    $id_warna  = respond['det_inv'][$i]['id_warna'];

                    for($k=0;$k<respond['jmwarna'];$k++){
                        if(respond['warna'][$k]['id_warna'] == $id_warna){
                            $warnanya = respond['warna'][$k]['nama_warna'];
                        }
                    }

                    $namanya = respond['det_inv'][$i]['nama_produk'] + " (" + $warnanya + ")";
                }
                else{
                    $namanya = respond['det_inv'][$i]['nama_produk'];
                }
                    
                    var price  = "Rp "+  new Number(respond['det_inv'][$i]['price']).toLocaleString("id-ID") + ",00";
                    var tprice = "Rp "+  new Number(respond['det_inv'][$i]['total_price']).toLocaleString("id-ID") + ",00";

                   $isi = $isi + 
                   '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                           $namanya+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['det_inv'][$i]['jumlah_produk']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">Pcs</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            price+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            tprice+
                        '</td>'+
                    '</tr>';
               }

               $subtotal = "Rp "+  new Number(respond['inv'][0]['sub_total']).toLocaleString("id-ID") + ",00";
               $disc     = "Rp "+  new Number(respond['inv'][0]['discount']).toLocaleString("id-ID") + ",00";
               $ppn      = "Rp "+  new Number(respond['inv'][0]['ppn']).toLocaleString("id-ID") + ",00";
               $total    = "Rp "+  new Number(respond['inv'][0]['total']).toLocaleString("id-ID") + ",00";

               $table = 
               '<br><table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                        '<thead>'+
                            '<tr>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'No'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Item Description'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Qty'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Unit (Qty)'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Price'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Total Price'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi+
                            '<tr>'+
                                '<td colspan="3"  rowspan="4" style="text-align: center;vertical-align: middle; background-color:white;border-left: 1px solid white;border-bottom: 1px solid white;"></td>'+
                                '<td colspan="2" style="text-align: center;vertical-align: middle;">Subtotal</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $subtotal+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">Discount</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    respond['inv'][0]['discount_rate']+ " %"+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $disc+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">PPN</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    respond['inv'][0]['ppn_rate']+ " %"+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $ppn+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td colspan="2" style="text-align: center;vertical-align: middle;">Total</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $total+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'

                $("#div_inv").html($table);
                
                $("#modaldetail").modal();
            }
        });  
    
    });
</script>

<!-- delete -->
<script>
    $('.bdel_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_invoice_hapus").val(id);
        $("#kode_invoice_hapus").html(id);
        $("#modaldelete").modal();
    });
</script>

<!-- print -->
<script>
    $('.bprint_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_invoice_print").val(id);
        $("#modalprint").modal();
    });
</script>

<!-- penanda tangan -->
<script>
    function cekcek(){
        $no = $("#pilih").val();
        if($no != ""){
            $("#nama_ttd").val($("#nm"+$no).val());
            $("#jabatan_ttd").val($("#jb"+$no).val());

            $("#button_print").prop('disabled',false);
        }
        else{
            $("#button_print").prop('disabled',true);
        }
    }
</script>
    


    