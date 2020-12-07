<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua BPBD</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Semua BPBD</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Semua BPBD</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor BPBD</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor PO</th>
                        <th  style="text-align: center;vertical-align: middle;">Nama Customer</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no=1;
                        foreach($bpbd as $x){?>
                        <tr>
                            <td  style="text-align: center;vertical-align: middle;"><?= $no ?></td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_bpbd?>">
                                <input type="hidden" name="kode<?=$no;?>" id="kode<?=$no;?>" value="<?= $x->no_bpbd?>">
                                <?= $x->no_bpbd?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;"><?= $x->kode_purchase_order_customer?></td>
                            <td  style="text-align: center;vertical-align: middle;"><?= $x->nama_customer?></td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $waktu = $x->tanggal;

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
                                <?php 
                                    if($x->status_bpbd == 0){
                                        echo "Belum Dikonfirmasi";
                                    } else{
                                        echo "Terkonfirmasi";
                                    } 
                                ?>
                            </td>
                            <td class="col-lg-3"> 
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php if($x->status_bpbd == 0){?>
                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        value="<?= $no;?>" title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                        <button type="button" class="bkonf_klik col-lg-3 btn btn-success fa fa-check-square" 
                                        value="<?= $no;?>" title="Konfirmasi" style="margin-right:5px;margin-bottom:5px"></button>
                                    <button type="button" class="bdel_klik col-lg-3 btn btn-danger fa fa-trash-o" 
                                        value="<?= $no;?>" title="Delete" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } else{?>
                                    <form method="POST" action="<?= base_url()?>bpbd/print">
                                        <input type="hidden" name="id_bpbd" value="<?= $x->id_bpbd?>">
                                        <button type="submit" class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                        value="<?= $no;?>" title="Print" style="margin-right:5px;margin-bottom:5px"></button>
                                    </form> 
                                <?php } ?>
                                

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
                    <h4 class="modal-title"><b>Detail BPBD</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor BPBD</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_bpbd_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="no_po_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="cust_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tgl_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Plat No</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="plat_no_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Driver</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="driver_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="ket_det" readonly>
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

    <!-- modal edit -->
    <div class="modal" id="modaledit" role="dialog">
        <form method="POST" action="<?= base_url()?>bpbd/edit_bpbd">
            <div class="modal-dialog modal-xl" style="width:70%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Edit BPBD</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor BPBD</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_bpbd_ed" readonly>
                                <input type="hidden" class="form-control" id="id_bpbd_ed" name="id_bpbd_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor PO</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_po_ed" readonly>
                                <input type="hidden" class="form-control" id="id_po_ed" name="id_po_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Customer</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="cust_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tgl_ed" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Plat No</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="plat_no_ed" name="plat_no_ed">
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Driver</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="driver_ed" name="driver_ed">
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="3" id="ket_ed" name="ket_ed">
                                </textarea>
                            </div>
                        </div>
                        <br>
                        
                        <div id="table_edit">
                        
                        </div>
                        <input type="hidden" name="jumlah_detail" id="jumlah_detail" val="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="edit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- modal delete -->
    <div class="modal" id="modaldelete" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>bpbd/delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Hapus Data BPBD</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_bpbd_hapus" id="id_bpbd_hapus"> 
                        <p>Apakah anda yakin akan menghapus data BPBD dengan nomor <span id="kode_bpbd_hapus"></span> ? </p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Ya">
                        <button class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal se7 -->
    <div class="modal" id="modalkonf" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>bpbd/konfirmasi">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Konfirmasi BPBD</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_bpbdnya" id="id_bpbdnya">
                        <p>Apakah anda yakin akan mengkonfirmasi bpbd dengan nomor <span id="no_bpbd"></span>?</p>
                        <p><b>*</b>jika sudah dikonfirmasi, BPBD dapat diprint dan sudah tidak bisa diedit lagi</p>
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

<!-- detail bpbd -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bpbd/detail_bpbd",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
               
                $("#no_bpbd_det").val(respond['bpbd'][0]['no_bpbd']);
                $("#no_po_det").val(respond['po'][0]['kode_purchase_order_customer']);
                $("#cust_det").val(respond['po'][0]['nama_customer']);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['bpbd'][0]['tanggal']).getDate();
                var xhari = new Date(respond['bpbd'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['bpbd'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['bpbd'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;


                $("#tgl_det").val($tanggalnya);
                $("#plat_no_det").val(respond['bpbd'][0]['plat_no']);
                $("#driver_det").val(respond['bpbd'][0]['driver']);
                $("#ket_det").val(respond['bpbd'][0]['keterangan']);


                $isi = "";

                for($i=0;$i<respond['jm_item_bpbd'];$i++){
                    $namanya = "";
                    $keterangan = "";

                    for($o=0;$o<respond['jm_produk'];$o++){
                        if(respond['item_bpbd'][$i]['id_detail_produk'] == respond['produk'][$o]['id_detail_produk']){
                            $keterangan = respond['produk'][$o]['keterangan'];
                            $nama_produk= respond['produk'][$o]['nama_produk'];

                            if($keterangan == 0){
                                $id_ukuran = respond['produk'][$o]['id_ukuran'];
                                $id_warna  = respond['produk'][$o]['id_warna'];

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

                                $namanya = $nama_produk + $ukurannya + " (" + $warnanya + ")";
                            }
                            else if($keterangan == 1){
                                $id_ukuran = respond['produk'][$o]['id_ukuran'];

                                for($l=0;$l<respond['jmukuran'];$l++){
                                    if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                        $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                        $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                        $ukurannya = $nama_ukuran + $satuan_ukuran;
                                    }
                                }

                                $namanya = $nama_produk + $ukurannya;

                            }
                            else if($keterangan == 2){
                                $id_warna  = respond['produk'][$o]['id_warna'];

                                for($k=0;$k<respond['jmwarna'];$k++){
                                    if(respond['warna'][$k]['id_warna'] == $id_warna){
                                        $warnanya = respond['warna'][$k]['nama_warna'];
                                    }
                                }

                                $namanya = $nama_produk + " (" + $warnanya + ")";
                            }
                            else{
                                $namanya = $nama_produk;
                            }
                        }
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
                                respond['item_bpbd'][$i]['jumlah_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                "Pcs"+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['item_bpbd'][$i]['keterangan']+
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
                                'Item'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Qty'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Unit'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Keterangan'+
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

<!-- edit bpbd -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bpbd/detail_bpbd",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_bpbd_ed").val(respond['bpbd'][0]['no_bpbd']);
                $("#id_bpbd_ed").val(respond['bpbd'][0]['id_bpbd']);
                $("#no_po_ed").val(respond['po_by_id'][0]['kode_purchase_order_customer']);
                $("#id_po_ed").val(respond['po_by_id'][0]['id_purchase_order_customer']);
                $("#cust_ed").val(respond['po_by_id'][0]['nama_customer']);

                
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['bpbd'][0]['tanggal']).getDate();
                var xhari = new Date(respond['bpbd'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['bpbd'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['bpbd'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tgl_ed").val($tanggalnya);
                $("#plat_no_ed").val(respond['bpbd'][0]['plat_no']);
                $("#driver_ed").val(respond['bpbd'][0]['driver']);
                $("#ket_ed").val(respond['bpbd'][0]['keterangan']);

                $("#jumlah_detail").val(respond['jmdpo']);
                
                $isi = "";

                for($q=0;$q<respond['jmdpo'];$q++){
                    $namanya = "";

                    if(respond['dpo'][$q]['keterangan'] == 0){
                        $id_ukuran = respond['dpo'][$q]['id_ukuran'];
                        $id_warna  = respond['dpo'][$q]['id_warna'];

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

                        $namanya = respond['dpo'][$q]['nama_produk'] + $ukurannya + " (" + $warnanya + ")";
                    }
                    else if(respond['dpo'][$q]['keterangan'] == 1){
                        $id_ukuran = respond['dpo'][$q]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        $namanya = respond['dpo'][$q]['nama_produk'] + $ukurannya;

                    }
                    else if(respond['dpo'][$q]['keterangan'] == 2){
                        $id_warna  = respond['dpo'][$q]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['dpo'][$q]['nama_produk'] + " (" + $warnanya + ")";
                    }
                    else{
                        $namanya = respond['dpo'][$q]['nama_produk'];
                    }

                    //stok gundang
                        $cari_gudang = 0;
                        $stok_gudang = 0;
                        
                        for($u=0;$u<respond['jm_stok_gudang'];$u++){
                            if(respond['dpo'][$q]['id_detail_produk'] == respond['stok_gudang'][$u]['id_detail_produk']){
                                $cari_gudang++;
                            }
                        }
        
                        if($cari_gudang > 0){
                            for($u=0;$u<respond['jm_stok_gudang'];$u++){
                                if(respond['dpo'][$q]['id_detail_produk'] == respond['stok_gudang'][$u]['id_detail_produk']){
                                    $stok_gudang = respond['stok_gudang'][$u]['jumlah_produk'];
                                }
                            }
                        }
                        else{
                            $stok_gudang = 0;
                        }
                    //tutup stok gudang

                    //terambil
                        $cari_terambil = 0;
                        $terambil = 0;
                        
                        for($u=0;$u<respond['jm_terambil'];$u++){
                            if(respond['dpo'][$q]['id_detail_produk'] == respond['terambil'][$u]['id_detail_produk']){
                                $cari_terambil++;
                            }
                        }
        
                        if($cari_terambil > 0){
                            for($u=0;$u<respond['jm_terambil'];$u++){
                                if(respond['dpo'][$q]['id_detail_produk'] == respond['terambil'][$u]['id_detail_produk']){
                                    $terambil = respond['terambil'][$u]['jumlah_produk'];
                                }
                            }
                        }
                        else{
                            $terambil = 0;
                        }
                    //tutup terambil
                    $cari_sebelum = 0;
                    $sebelum = 0;
                    for($f=0;$f<respond['jm_item_bpbd'];$f++){
                        if(respond['item_bpbd'][$f]['id_detail_produk'] == respond['dpo'][$q]['id_detail_produk']){
                            $cari_sebelum++;
                            $sebelum      = respond['item_bpbd'][$f]['jumlah_produk'];
                            $id_item_bpbd = respond['item_bpbd'][$f]['id_item_bpbd'];
                            $keterangan   = respond['item_bpbd'][$f]['keterangan'];
                        }
                    }
                    
                    if($cari_sebelum == 0){
                        $belum_diambil = (parseInt($stok_gudang) - parseInt($terambil));
                    } else{
                        $belum_diambil = (parseInt($stok_gudang) - parseInt($terambil) + parseInt($sebelum));
                    }

                    $belum_diambil_real = (parseInt($stok_gudang) - parseInt($terambil));

                    if($belum_diambil != 0){
                        $html_inp = '<center><input type="number" min="0"  max="'+$belum_diambil+'" class="form-control" id="ambil'+$q+'" name="ambil'+$q+'" value="'+$sebelum+'" oninput="cek()"></center>';
                        $html_ket = '<center><textarea type="text" class="form-control" name="ket'+$q+'">'+$keterangan+'</textarea></center>';
                    }
                    else{
                        $html_inp = '<center><input type="number" min="0" class="form-control" id="ambil'+$q+'" name="ambil'+$q+'" disabled></center>';
                        $html_ket = '<center><textarea type="text" class="form-control" name="ket'+$q+'" disabled></textarea></center>';
                    }
                    

                    if($sebelum > 0){
                        $isi = $isi +
                        '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($q+1)+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $namanya+
                                    '<input type="hidden" name="status'+$q+'" value="1">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="id_detail_produk'+$q+'" value="'+respond['dpo'][$q]['id_detail_produk']+'">'+
                                    respond['dpo'][$q]['kode_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="id_item_bpbd'+$q+'" value="'+$id_item_bpbd+'">'+
                                    respond['dpo'][$q]['jumlah_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $stok_gudang+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $terambil+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $belum_diambil_real+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $belum_diambil+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="sebelum'+$q+'" value="'+$sebelum+'">'+
                                    $html_inp+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $html_ket+
                                '</td>'+
                        '</tr>';
                    }else{
                        $isi = $isi +
                        '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($q+1)+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $namanya+
                                    '<input type="hidden" name="status'+$q+'" value="0">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="id_detail_produk'+$q+'" value="'+respond['dpo'][$q]['id_detail_produk']+'">'+
                                    respond['dpo'][$q]['kode_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    respond['dpo'][$q]['jumlah_produk']+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $stok_gudang+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $terambil+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $belum_diambil_real+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $belum_diambil+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $html_inp+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $html_ket+
                                '</td>'+
                        '</tr>';
                    }
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
                                    'Kode Produk'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Total Produk'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Stok Gudang'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Diambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Belum Diambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Batas Ambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Akan Diambil'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Ket'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi+
                        '</tbody>'+
                '</table>';
                
                $("#table_edit").html($table);
                $("#modaledit").modal();
            }
        });  
    });
</script>

<!-- cek terisi -->
<script>
    function cek(){
        $jumlah_detail = $("#jumlah_detail").val();
        $count = 0;

        for($i=0;$i<$jumlah_detail;$i++){
            if($("#ambil"+$i).val() != 0){
                $count++;
            }
        }

        if($count > 0){
            $("#edit").prop('disabled',false);
        }
        else{
            $("#edit").prop('disabled',true);
        }
    }
</script>

<!-- delete -->
<script>
    $('.bdel_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_bpbd_hapus").val(id);
        $("#kode_bpbd_hapus").html($("#kode"+no).val());
        $("#modaldelete").modal();
    });
</script>

<!-- setuju-->
<script>
    $('.bkonf_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_bpbdnya").val(id);
        $("#no_bpbd").html($("#kode"+no).val());
        $("#modalkonf").modal();
    });
</script>




    