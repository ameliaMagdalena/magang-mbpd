<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tambah BPBJ</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tambah BPBJ</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
        disabled href="#modaltambah" onclick="id_produk()">+ BPBJ</a>
        <br><br>

        <header class="panel-heading">
            <h2 class="panel-title">Data Produk</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Jumlah Produk (pcs)</th>
                        <th style="text-align: center;vertical-align: middle;">Produk Terpilih</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                         foreach($produk as $p){
                         foreach($pros_prod as $pp){
                            if($p->id_detail_produk == $pp->id_detail_produk){
                                if($p->urutan_line == $pp->urutan_line){
                                    if($jmbpbj_sebelum == 0){
                    ?>
                        <tr>
                            <input type="hidden" id="id_produk<?= $no ?>" value="<?= $p->id_detail_produk?>">
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $no?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <!-- memiliki ukuran & warna -->
                                        <?php if($p->keterangan == 0){
                                            $ukuran_tam = "";
                                            $warna_tam  = "";
                                            foreach($ukuran as $u){
                                                if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                    $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                }
                                            }
                                            
                                            foreach($warna as $w){
                                                if($w->id_warna == $p->id_warna){
                                                    $warna_tam = $w->nama_warna;
                                                }
                                            }
                                        ?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                            </p>
                                        <!-- memiliki ukuran -->
                                        <?php } else if($p->keterangan == 1){
                                            $ukuran_tam = "";
                                            
                                            foreach($ukuran as $u){
                                                if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                    $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                }
                                            }
                                        ?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?> <?= $ukuran_tam?>
                                            </p>
                                        <?php } else if($p->keterangan == 2){
                                            $warna_tam = "";

                                            foreach($warna as $w){
                                                if($w->id_warna == $p->id_warna){
                                                    $warna_tam = $w->nama_warna;
                                                }
                                            }
                                        ?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?> (<?= $warna_tam;?>)
                                            </p>
                                        <?php } else{?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?>
                                            </p>
                                        <?php } ?>
                                    </center>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <p id="jumlah_produk<?= $no ?>"><?= $p->total; ?></p>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <input type="checkbox" id="pilih_produk<?= $no ?>" onclick="pilih_produk()">
                                Pilih
                            </td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?= $p->id_detail_produk?>"></a>
                            </td>
                        </tr>
                        
                        <div id='modaldetail<?= $pp->id_detail_produk?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Detail Produksi Produk</h2>
                                </header>

                                <div class="panel-body">
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Kode Produk</label>
                                    <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $p->kode_produk?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Produk</label>
                                        <div class="col-sm-7">
                                            <!-- memiliki ukuran & warna -->
                                            <?php if($p->keterangan == 0){
                                                $ukuran_tam = "";
                                                $warna_tam  = "";
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                    }
                                                }
                                                
                                                foreach($warna as $w){
                                                    if($w->id_warna == $p->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)" readonly>
                                            <!-- memiliki ukuran -->
                                            <?php } else if($p->keterangan == 1){
                                                $ukuran_tam = "";
                                                
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                    }
                                                }
                                            ?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?> <?= $ukuran_tam?>" readonly>
                                            <?php } else if($p->keterangan == 2){
                                                $warna_tam = "";

                                                foreach($warna as $w){
                                                    if($w->id_warna == $p->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?> (<?= $warna_tam;?>)" readonly>
                                            <?php } else{?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?>" readonly>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Targat Produksi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $p->total?> pcs" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Produk yang sudah memiliki BPBJ</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="0 pcs" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Produk yang belum memiliki BPBJ</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $p->total; ?> pcs" readonly>
                                        </div>
                                    </div>
                                </div>

                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-default modal-dismiss">OK</button>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>
                    <?php   
                                    } 
                                    else{
                                        $hitungnya = 0;
                                        foreach($bpbj_sebelum as $bpbjs){
                                            if($p->id_detail_produk == $bpbjs->id_detail_produk){
                                                $hitungnya++;
                                            }
                                        }

                                        if($hitungnya == 0){
                                            $jum_sebelum = 0;
                                            $jum_belum = $p->total;
                                        }
                                        else{
                                            foreach($bpbj_sebelum as $bpbjs){
                                                if($p->id_detail_produk == $bpbjs->id_detail_produk){
                                                    $jum_sebelum = $bpbjs->jumlah_produk;
                                                    $jum_belum = ($p->total) - ($bpbjs->jumlah_produk);
                                                }
                                            }
                                        }
                    ?>
                        <tr>
                            <input type="hidden" id="id_produk<?= $no ?>" value="<?= $p->id_detail_produk?>">
                            <td style="text-align: center;vertical-align: middle;">
                                <?= $no?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <!-- memiliki ukuran & warna -->
                                        <?php if($p->keterangan == 0){
                                            $ukuran_tam = "";
                                            $warna_tam  = "";
                                            foreach($ukuran as $u){
                                                if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                    $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                }
                                            }
                                            
                                            foreach($warna as $w){
                                                if($w->id_warna == $p->id_warna){
                                                    $warna_tam = $w->nama_warna;
                                                }
                                            }
                                        ?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                            </p>
                                        <!-- memiliki ukuran -->
                                        <?php } else if($p->keterangan == 1){
                                            $ukuran_tam = "";
                                            
                                            foreach($ukuran as $u){
                                                if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                    $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                }
                                            }
                                        ?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?> <?= $ukuran_tam?>
                                            </p>
                                        <?php } else if($p->keterangan == 2){
                                            $warna_tam = "";

                                            foreach($warna as $w){
                                                if($w->id_warna == $p->id_warna){
                                                    $warna_tam = $w->nama_warna;
                                                }
                                            }
                                        ?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?> (<?= $warna_tam;?>)
                                            </p>
                                        <?php } else{?>
                                            <p id="nama_produk<?= $no ?>">
                                                <?= $p->nama_produk ?>
                                            </p>
                                        <?php } ?>
                                    </center>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <p id="jumlah_produk<?= $no ?>"><?= $jum_belum; ?></p>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php if($jum_belum == 0){?>
                                    <input type="checkbox" id="pilih_produk<?= $no ?>" onclick="pilih_produk()" disabled>
                                    Pilih
                                <?php } else{?>
                                    <input type="checkbox" id="pilih_produk<?= $no ?>" onclick="pilih_produk()">
                                    Pilih
                                <?php } ?>
                            </td>
                            <td class="col-lg-3">
                                <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                    title="Detail" href="#modaldetail<?= $p->id_detail_produk?>"></a>
                            </td>
                        </tr>
                        
                        <div id='modaldetail<?= $pp->id_detail_produk?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Detail Produksi Produk</h2>
                                </header>

                                <div class="panel-body">
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Kode Produk</label>
                                    <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $p->kode_produk?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Nama Produk</label>
                                        <div class="col-sm-7">
                                            <!-- memiliki ukuran & warna -->
                                            <?php if($p->keterangan == 0){
                                                $ukuran_tam = "";
                                                $warna_tam  = "";
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                    }
                                                }
                                                
                                                foreach($warna as $w){
                                                    if($w->id_warna == $p->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)" readonly>
                                            <!-- memiliki ukuran -->
                                            <?php } else if($p->keterangan == 1){
                                                $ukuran_tam = "";
                                                
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $p->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                    }
                                                }
                                            ?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?> <?= $ukuran_tam?>" readonly>
                                            <?php } else if($p->keterangan == 2){
                                                $warna_tam = "";

                                                foreach($warna as $w){
                                                    if($w->id_warna == $p->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?> (<?= $warna_tam;?>)" readonly>
                                            <?php } else{?>
                                                <input type="text" name="nama" class="form-control"
                                                value="<?= $p->nama_produk ?>" readonly>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Targat Produksi</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $p->total?> pcs" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Produk yang sudah memiliki BPBJ</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $jum_sebelum ?> pcs" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-5 control-label">Produk yang belum memiliki BPBJ</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nama" class="form-control"
                                            value="<?= $jum_belum; ?> pcs" readonly>
                                        </div>
                                    </div>
                                </div>

                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-default modal-dismiss">OK</button>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>

                    <?php } ?>
                      
                    <?php $no++; }}}} ?>
                </tbody>
	        </table>
        </div>

        <!-- tampung jumlah produk yang mungkin jadi bpbj, sejak awal buka page ini sudah diget data-data
        semua produk yang berkemungkinan jadi bpbj -->
        <input type="hidden" id="tampung_jumlah_produk_berkemungkinan" value="<?= $no-1 ?>">
    </div>

    <div id='modaltambah' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>bpbj/tambahin">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah BPBJ</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">No BPBJ</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="id_bpbj" id="id_bpbj" class="form-control"
                            value="<?= $idnya?>" readonly>
                            <input type="text" name="no_bpbj" id="no_bpbj" class="form-control"
                            value="<?= $nonya?>" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Hari/Tanggal:</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="tanggal" class="form-control" value="<?= $now?>" readonly>
                            <input type="text"  class="form-control" value="<?php 
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
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" name="keterangan" 
                            data-plugin-textarea-autosize></textarea>
                        </div>
                    </div>
                    <div id="cobaganti">

                    </div>
                    <!-- tampung jumlah id produk yang dipilih -->
                    <input type="hidden" id="tampung_jumlah_id_produk" name="tampung_jumlah_id_produk" value="0"> 
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan" disabled>
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
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

<!-- buat cek kalau ada produk yang dipilih/tidak -->
<script>
    function pilih_produk(){
        var count = 0;
        var jumlah_produk_berkemungkinan = $("#tampung_jumlah_produk_berkemungkinan").val();

        for(var i=1;i<=jumlah_produk_berkemungkinan;i++){
            if($("#pilih_produk" + i).prop("checked") == true){
                count++;
            }
            if(count > 0){
                $('#button_tambah').attr("disabled", false);
            }
            else{
                $('#button_tambah').attr("disabled", true);
            }
        }
    }
</script>

<!-- buat tampung id produk yang dipilih -->
<script>
    function id_produk(){
        $jumlah_produk_berkemungkinan = $("#tampung_jumlah_produk_berkemungkinan").val();
        $id_produk = [];
        $count = 0;

        for($i=1;$i<=$jumlah_produk_berkemungkinan;$i++){
            if($("#pilih_produk" + $i).prop("checked") == true){
                $id_produk[$count] = $("#id_produk" + $i).val();
                $count++;
            }
        }

        $("#tampung_jumlah_id_produk").val($count);

        $tampung_isi = "";
        
        for($i=1;$i<=$jumlah_produk_berkemungkinan;$i++){
            $nama_produk_s      = (document.getElementById("nama_produk" + $i).innerHTML);
            $jumlah_produk_s    = (document.getElementById("jumlah_produk" + $i).innerHTML);
            $id_produk_s        = $("#id_produk" + $i).val();

            for($l=0;$l<$count;$l++){
                if($id_produk_s == $id_produk[$l]){
                    $tampung_isi = $tampung_isi + 
                    "<tr>" + 
                        "<td style='text-align: center;vertical-align: middle;'>" + ($l+1) + "</td>" + 
                        "<td style='text-align: center;vertical-align: middle;'>" +
                            "<input type='hidden' value='"+$id_produk_s+"' name='id_produk"+ $l +"'>" +
                            $nama_produk_s + 
                        "</td>" +
                        "<td style='text-align: center;vertical-align: middle;'>" +
                            "<center><input type='number' name='" + ("jumlah_produk" + $l) + "' id='" + ("jumlah_produk" + $l) +
                            "' class='form-control' value='"+ $jumlah_produk_s+"'  style='width:50%' readonly></center>" +
                        "</td>" +
                        "<td style='text-align: center;vertical-align: middle;'>" +
                            "<center><input type='number' min='1' name='" + ("jumlah_aktual" + $l) + "' id='" + ("jumlah_aktual" + $l) +
                            "' class='form-control' oninput='jumlah_produk(this)' style='width:50%' required ></center>" + 
                        "</td>" +
                    "</tr>";
                }
            }
        } 
        
        //$coba = "jumlah produknya itu" + $count;
        $coba = '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px"><thead>' +
        '<th style="text-align: center;vertical-align: middle;">No</th>'+
        '<th style="text-align: center;vertical-align: middle;">Nama Produk</th>'+
        '<th style="text-align: center;vertical-align: middle;">Jumlah Produk (pcs)</th>'+
        '<th style="text-align: center;vertical-align: middle;">Jumlah Produk' + 
        'Terpilih (pcs)</th></tr></thead><tbody>' + $tampung_isi +

        '</tbody>';
        $("#cobaganti").html($coba);
        //alert($id_produk);
    }
</script>

<!-- cek jumlah produk saat user ingin menambahkan produk baru -->
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

        //alert($jumlah_batas +","+ $jumlah_inputan);


        if(parseInt($jumlah_batas) < parseInt($jumlah_inputan)){
            alert("Jumlah produk terpilih tidak boleh melebihi jumlah produk");
        }

        // BUAT AKTIFIN/NON AKTIF BUTTON SAVE
        var jumlah_produk_terpilih = $("#tampung_jumlah_id_produk").val();
        var count = 0;

        for(var i=0;i<jumlah_produk_terpilih;i++){
            if($("#jumlah_aktual" + i).val() != null && $("#jumlah_aktual"+ i).val() != 0){
                if(parseInt($("#jumlah_aktual"+ i).val()) <= parseInt($("#jumlah_produk" + i).val())){
                    count++;
                }
            }
            else{
                $('#tambah').attr("disabled", true);
            }
        }

            if(count == jumlah_produk_terpilih){
                $('#tambah').attr("disabled", false);
                //alert(count +","+ jumlah_produk_terpilih);
            }
            else{
                $('#tambah').attr("disabled", true);
                //alert(count +","+ jumlah_produk_terpilih);
            }
    }
</script>



    