<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>BPBJ Belum Diproses</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>BPBJ Belum Diproses</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data BPBJ Belum Diproses</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor BPBJ</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($bpbj as $x){
                            if($x->status_bpbj == 0){
                    ?>
                        <tr>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $no;?>
                                <input type="hidden" id="id_bpbj<?= $no;?>" value="<?= $x->id_bpbj;?>">
                            </td>
                            <td  style="text-align: center;vertical-align: middle;"><?= $x->no_bpbj;?></td>
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
                            <td  style="text-align: center;vertical-align: middle;">Belum Diproses
                            </td>
                            <td class="col-lg-3">
                                <button type="button" class="bdet1_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php if($x->status_bpbj == 0){?>
                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        value="<?= $no;?>" title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                    <button type="button" class="bdelete_klik col-lg-3 btn btn-danger fa fa-trash-o" 
                                        value="<?= $no;?>" title="Delete" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } ?>
                                <?php foreach($det_item_sj as $y){
                                        if($y->id_bpbj == $x->id_bpbj){
                                            if($y->jumlah_det_item_sj > 0){
                                ?>
                                                <button type="button" class="bdetit_sj_klik col-lg-3 btn btn-success fa  fa-history" 
                                                    value="<?= $no;?>" title="Detail Item Surat Jalan" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php  } }  } ?>
                                <form method="POST" action="<?= base_url()?>bpbj/print_bpbj">
                                    <input type="hidden" name="id" value="<?= $x->id_bpbj?>">
                                    <button type="submit" class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                    title="Print" style="margin-right:5px;margin-bottom:5px"></button>
                                </form> 
                            </td>
                        </tr>
                    <?php $no++; }} ?>
                </tbody>
	        </table>
        </div>
    </div>
    
        <!-- modal detail1 -->
        <div class="modal" id="modaldetail1" role="dialog">
            <div class="modal-dialog modal-xl" style="width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Detail BPBJ</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor BPBJ</label>
                            <div class="col-sm-7">
                                <input type="text" id="nomor_det1" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Hari/Tanggal</label>
                            <div class="col-sm-7">
                                <input type="text" id="tanggal_det1" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Status BPBJ</label>
                            <div class="col-sm-7">
                                <input type="text" id="status_det1" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="3" id="keterangan_det1" disabled>
                                </textarea>
                            </div>
                        </div>
                        <div id="table_detail1">
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
            <div class="modal-dialog modal-xl" style="width:50%">
                <form method="POST" action="<?= base_url()?>bpbj/edit_bpbj">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Edit BPBJ</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nomor BPBJ</label>
                                <div class="col-sm-7">
                                    <input type="hidden" id="id_edit" name="id_edit" class="form-control"
                                    readonly>
                                    <input type="text" id="nomor_edit" name="nomor_edit" class="form-control"
                                    readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Hari/Tanggal</label>
                                <div class="col-sm-7">
                                    <input type="text" id="tanggal_edit" name="tanggal_edit" class="form-control"
                                    readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Status BPBJ</label>
                                <div class="col-sm-7">
                                    <input type="text" id="status_edit" class="form-control"
                                    readonly>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Keterangan</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control" rows="3" id="keterangan_edit" name="keterangan_edit">
                                    </textarea>
                                </div>
                            </div>
                            <div id="table_edit">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan" id="button_edit">
                            <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- modal delete -->
        <div class="modal" id="modaldelete" role="dialog">
            <div class="modal-dialog modal-xl" style="width:35%">
                <form method="POST" action="<?= base_url()?>bpbj/delete_bpbj">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Hapus Data BPBJ</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="modal-text">
                                <input type="hidden" name="id_bpbj_delete" id="id_bpbj_delete">
                                <p>Apakah anda yakin akan menghapus data bpbj dengan nomor <span id="no_bpbj_delete"></span> ?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Hapus">
                            <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- modal detail item surat jalan -->
        <div class="modal" id="modaldetit_sj" role="dialog">
            <div class="modal-dialog modal-xl" style="width:50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Detail BPBJ Pada Surat Jalan</b></h4>
                    </div>
                    <div class="modal-body">
                        <div id="table_detail_itbpbj">
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

<!-- detail kalo 1 -->
<script>
    $('.bdet1_klik').click(function(){
        var no      = $(this).attr('value');
        var id_bpbj = $("#id_bpbj"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bpbj/detail_bpbj",
            dataType: "JSON",
            data: {id_bpbj:id_bpbj},

            success: function(respond){

                $("#nomor_det1").val(respond['bpbj'][0]['no_bpbj']);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['bpbj'][0]['tanggal']).getDate();
                var xhari = new Date(respond['bpbj'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['bpbj'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['bpbj'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_det1").val($tanggalnya);

                if(respond['bpbj'][0]['status_bpbj'] == 0){
                    $("#status_det1").val("Belum Diproses");
                }
                else if(respond['bpbj'][0]['status_bpbj'] == 1){
                    $("#status_det1").val("Sedang Diproses");
                }
                else if(respond['bpbj'][0]['status_bpbj'] == 2){
                    $("#status_det1").val("Selesai");
                }
                $("#keterangan_det1").val(respond['bpbj'][0]['keterangan_bpbj']);

                $isi = "";
            
                for($i=0;$i<respond['jmdet_bpbj'];$i++){
                    $namanya = "";

                    if(respond['det_bpbj'][$i]['keterangan'] == 0){
                        $id_ukuran = respond['det_bpbj'][$i]['id_ukuran'];
                        $id_warna  = respond['det_bpbj'][$i]['id_warna'];

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

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                    }
                    else if(respond['det_bpbj'][$i]['keterangan'] == 1){
                        $id_ukuran = respond['det_bpbj'][$i]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + $ukurannya;

                    }
                    else if(respond['det_bpbj'][$i]['keterangan'] == 2){
                        $id_warna  = respond['det_bpbj'][$i]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + " (" + $warnanya + " )";
                    }
                    else{
                        $namanya = respond['det_bpbj'][$i]['nama_produk'];
                    }

                    $selected_po = "";
                    $hit = 0;
                    for($g=0;$g<respond['jm_selected_po'];$g++){
                        if(respond['det_bpbj'][$i]['id_detail_bpbj'] == respond['selected_po'][$g]['id_detail_bpbj']){
                            if($hit == 0){
                                $selected_po = respond['selected_po'][$g]['id_purchase_order_customer'];
                                $hit++;
                            }
                            else{
                                $selected_po = $selected_po + ", "+respond['selected_po'][$g]['id_purchase_order_customer'];
                                $hit++;
                            }
                        }
                    }

                    $isi = $isi +
                        '<tr>'+
                            '<td>'+
                                '<center>'+($i+1)+'</center>'+
                            '</td>'+
                            '<td>'+
                                '<center>'+$namanya+'</center>'+
                            '</td>'+
                            '<td>'+
                                '<center>'+respond['det_bpbj'][$i]['jumlah_produk']+'</center>'+
                            '</td>'+
                            '<td>'+
                                '<center>'+$selected_po+'</center>'+
                            '</td>'+
                            '<td></td>'+
                        '</tr>';
                }

                $table =
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Item</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Qty (pcs)</th>'+
                            '<th style="text-align: center;vertical-align: middle;">PO</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Remark</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        $isi+
                    '</tbody>'+
                '</table>';
                
                $("#table_detail1").html($table);
                $("#modaldetail1").modal();
            }
        });  

    });
</script>

<!-- edit -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var id_bpbj = $("#id_bpbj"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bpbj/detail_bpbj",
            dataType: "JSON",
            data: {id_bpbj:id_bpbj},

            success: function(respond){
                $("#id_edit").val(respond['bpbj'][0]['id_bpbj']);
                $("#nomor_edit").val(respond['bpbj'][0]['no_bpbj']);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['bpbj'][0]['tanggal']).getDate();
                var xhari = new Date(respond['bpbj'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['bpbj'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['bpbj'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_edit").val($tanggalnya);
                $("#status_edit").val("Belum Diproses");
                $("#keterangan_edit").val(respond['bpbj'][0]['keterangan']);

                $isi = "";
                
                for($i=0;$i<respond['jmdet_bpbj'];$i++){
                    $namanya = "";

                    if(respond['det_bpbj'][$i]['keterangan'] == 0){
                        $id_ukuran = respond['det_bpbj'][$i]['id_ukuran'];
                        $id_warna  = respond['det_bpbj'][$i]['id_warna'];

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

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                    }
                    else if(respond['det_bpbj'][$i]['keterangan'] == 1){
                        $id_ukuran = respond['det_bpbj'][$i]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + $ukurannya;

                    }
                    else if(respond['det_bpbj'][$i]['keterangan'] == 2){
                        $id_warna  = respond['det_bpbj'][$i]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + " (" + $warnanya + " )";
                    }
                    else{
                        $namanya = respond['det_bpbj'][$i]['nama_produk'];
                    }

                    for($w=0;$w<respond['jumlah'];$w++){
                        if(respond['sebelum'][$w]['id'] == respond['det_bpbj'][$i]['id_detail_produk']){
                            $sebelum = respond['sebelum'][$w]['total'];
                            $kapasitas = parseInt($sebelum) + parseInt(respond['det_bpbj'][$i]['jumlah_produk']);
                        }
                    }

                    $isi = $isi +
                        '<tr>'+
                            '<td>'+
                                '<center>'+($i+1)+'</center>'+
                                '<input type="hidden" name="id_detail_bpbj'+$i+'" value="'+respond['det_bpbj'][$i]['id_detail_bpbj']+'">'+
                            '</td>'+
                            '<td>'+
                                '<center>'+$namanya+'</center>'+
                            '</td>'+
                            '<td>'+
                                '<center><input type="number" name="jumlah_produk'+$i+'" id="jumlah_produk'+$i+'" value="'+$kapasitas+'" '+
                                'class="form-control" style="width:50%" disabled></center>'+
                            '</td>'+
                            '<td>'+
                                '<center><input type="number" min="0" name="jumlah_aktual'+$i+'" id="jumlah_aktual'+$i+'" value="'+respond['det_bpbj'][$i]['jumlah_produk']+'" '+
                                'class="form-control" style="width:50%" oninput="jumlah_produk(this)" required ></center>'+
                            '</td>'+
                        '</tr>';
                }

                $table ='<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th style="text-align: center;vertical-align: middle;">No</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">Item</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">Jumlah Produk (pcs)</th>'+
                                        '<th style="text-align: center;vertical-align: middle;">Jumlah Produk Terpilih (pcs)</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>'+
                                    $isi+
                                '</tbody>'+
                            '</table>'+
                            '<input type="hidden" name="tampung_jumlah_id_produk" id="tampung_jumlah_id_produk" value="'+respond['jmdet_bpbj']+'">';

                $("#table_edit").html($table);
                $("#modaledit").modal();
            }
        });  
    });
</script>

<!-- cek jumlah produk saat user mengedit jumlah produk -->
<script>
    function jumlah_produk(obj){
        // BUAT CHECK JUMLAH PRODUK YANG DIINPUT MELEBIHI JUMLAH PRODUK TIDAK
        var id_jumlah_aktual = obj.id;
        var length = id_jumlah_aktual.length;

        if(length == 14){
            var id = id_jumlah_aktual.charAt(13);
        }
        else if(length == 15){
            var id = id_jumlah_aktual.charAt(13) + id_jumlah_aktual.charAt(14);
        }
        else if(length == 16){
            var id = id_jumlah_aktual.charAt(13) + id_jumlah_aktual.charAt(14) + id_jumlah_aktual.charAt(15);
        }
        else if(length == 17){
            var id = id_jumlah_aktual.charAt(13) + id_jumlah_aktual.charAt(14) + id_jumlah_aktual.charAt(15) + id_jumlah_aktual.charAt(16);
        }
        else if(length == 18){
            var id = id_jumlah_aktual.charAt(13) + id_jumlah_aktual.charAt(14) + id_jumlah_aktual.charAt(15) + id_jumlah_aktual.charAt(16) + id_jumlah_aktual.charAt(17);
        }

        $jumlah_batas   = $("#jumlah_produk"+id).val();
        $jumlah_inputan = $("#jumlah_aktual"+id).val();

        if(parseInt($jumlah_batas) < parseInt($jumlah_inputan)){
            alert("Jumlah produk terpilih tidak boleh melebihi jumlah produk");
        }

        // BUAT AKTIFIN/NON AKTIF BUTTON SAVE
        var jumlah_produk_terpilih = $("#tampung_jumlah_id_produk").val();
        var count = 0;

        for(var i=0;i<jumlah_produk_terpilih;i++){
            if($("#jumlah_aktual" + i).val() != null){
                if(parseInt($("#jumlah_aktual"+ i).val()) <= parseInt($("#jumlah_produk" + i).val())){
                    count++;
                }
            }
            else{
                $('#button_edit').attr("disabled", true);
            }
        }

            if(count == jumlah_produk_terpilih){
                $('#button_edit').attr("disabled", false);
                //alert(count +","+ jumlah_produk_terpilih);
            }
            else{
                $('#button_edit').attr("disabled", true);
                //alert(count +","+ jumlah_produk_terpilih);
            }
    }
</script>

<!-- delete -->
<script>
    $('.bdelete_klik').click(function(){
        var no      = $(this).attr('value');
        var id_bpbj = $("#id_bpbj"+no).val();
    
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bpbj/detail_bpbj",
            dataType: "JSON",
            data: {id_bpbj:id_bpbj},

            success: function(respond){
                $("#id_bpbj_delete").val(respond['bpbj'][0]['id_bpbj']);
                $("#no_bpbj_delete").html(respond['bpbj'][0]['no_bpbj']);
                
                $("#modaldelete").modal();
            }
        });  
    
    });
</script>

<!-- detail item surat jalan -->
<script>
    $('.bdetit_sj_klik').click(function(){
        var no      = $(this).attr('value');
        var id_bpbj = $("#id_bpbj"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>bpbj/detail_item_surat_jalan",
            dataType: "JSON",
            data: {id_bpbj:id_bpbj},

            success: function(respond){
                $isi = "";
                for($i=0;$i<respond['jmdet_bpbj'];$i++){
                    $namanya = "";

                    if(respond['det_bpbj'][$i]['keterangan'] == 0){
                        $id_ukuran = respond['det_bpbj'][$i]['id_ukuran'];
                        $id_warna  = respond['det_bpbj'][$i]['id_warna'];

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

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + ")";
                    }
                    else if(respond['det_bpbj'][$i]['keterangan'] == 1){
                        $id_ukuran = respond['det_bpbj'][$i]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                            }
                        }

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + $ukurannya;

                    }
                    else if(respond['det_bpbj'][$i]['keterangan'] == 2){
                        $id_warna  = respond['det_bpbj'][$i]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $namanya = respond['det_bpbj'][$i]['nama_produk'] + " (" + $warnanya + ")";
                    }
                    else{
                        $namanya = respond['det_bpbj'][$i]['nama_produk'];
                    }

                    $tablenya     = "";
                    $isi_tablenya = "";

                    for($j=0;$j<respond['jm_datanya'];$j++){
                        if(respond['datanya'][$j]['id_bpbj'] == id_bpbj && respond['datanya'][$j]['id_detail_produk'] == respond['det_bpbj'][$i]['id_detail_produk']){
                            $isi_tablenya = $isi_tablenya +
                            '<tr>'+
                                '<td>'+
                                    '<center>'+($j+1)+'</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+respond['datanya'][$j]['id_surat_jalan']+'</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+respond['datanya'][$j]['id_purchase_order_customer']+'</center>'+
                                '</td>'+
                                '<td>'+
                                    '<center>'+respond['datanya'][$j]['jumlah_produk']+'</center>'+
                                '</td>'+
                            '</tr>';
                        }
                    }

                    $tablenya = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Nomor Surat Jalan</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Nomor Purchase Order Customer</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Qty (pcs)</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_tablenya+
                            '</tbody>'+
                        '</table>';

                    $isi = $isi + 
                            '<h5><b>'+($i+1)+'. '+$namanya+'</b></h5>'+
                            $tablenya+
                    '<br>';

                }
                
                $("#table_detail_itbpbj").html($isi);
                $("#modaldetit_sj").modal();
            }
        });  


    });
</script>


    