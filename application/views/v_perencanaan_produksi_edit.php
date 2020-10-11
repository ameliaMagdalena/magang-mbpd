<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body" >
    <header class="page-header">
        <h2> Tambah Perencanaan Produksi</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span> + Perencanaan Produksi</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<div class="row">
    <div class="col-md-9">
            <button class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
            onclick="simpan()" href="#modaltambah" disabled>Simpan</button>
        <!-- JUDUL -->
            <div style="border-radius:5px;background-color:rgb(189, 36, 40);color:white">
                <p style="margin-left:10px;margin-top:50px" id="judul">
                    Perencanaan Produksi (<?php if($month_start == $month_end){echo $month_start;} else{echo $month_start."-".$month_end;} ?>)
                </p>
            </div>
        <!-- CLOSE JUDUL -->
<!-- BG.4 EFISIENSI -->
        <section class="panel">
            <div class="panel-body">
                <table class="table table-bordered table-striped mb-none table_efisiensi_pp" id="datatable-default">
                    <tr>
                        <td class="col-md-4"></td>

                        <!-- Tanggal (1 minggu) -->
                        <?php
                            for($i=0;$i<7;$i++){
                                $now_day[$i]      = date('d', strtotime('+'.$i.' days', strtotime($start_date)));
                                $now_fulldate[$i] = date('Y-m-d', strtotime('+'.$i.' days', strtotime($start_date)));
                        ?>
                            <td>
                                <center>
                                    <b>
                                        <input name="<?= $i;?>" class="input_tanggal_pp">
                                        <?= intval($now_day[$i]) ?>
                                    </b>
                                </center>
                            </td>

                        <?php
                        }
                        ?>
                    </tr>

                    <?php 
                        $hitung = 1;
                        foreach($line as $ln){
                    ?>
                        <tr>
                            <td><b>
                                Plan
                                <input value="<?= $ln->nama_line;?>" class="input_line_pp">
                                <input type="hidden" id="idline_bg4<?= $hitung;?>" value="<?= $ln->id_line;?>" class="input_line_pp">
                                <input type="hidden" id="tpt<?=$ln->id_line?>" value="<?= $ln->total_processing_time;?>" class="input_line_pp">
                            </b></td>
                            
                            <?php for($j=1;$j<=7;$j++){ ?>
                                <td>
                                    <center>
                                        <!-- persentase prt(presentase yg ditampilkan) & prs(presentase yg disimpan) -->
                                       
                                        <span id="prt<?= $ln->id_line?>day<?=$j?>"></span>
                                        <input type="text" class="row_efisiensi" id="prs<?= $ln->id_line?>day<?=$j?>" readonly>
                                        <!-- total waktu -->
                                        <input type="text" class="row_efisiensi" id="tw<?= $ln->id_line?>day<?=$j?>" readonly>
                                    </center>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php 
                        $hitung++;
                        }
                    ?>
                </table>
            </div>
        </section>
<!-- CLOSE BG. 4 EFISIENSI -->

<!-- BG 3 PERENCANAAN AWAL-->
        <section class="panel">
            <div class="panel-body" style="height: 300px;overflow: scroll;margin-left:-25px;margin-right:-25px">
                <!-- BAGIAN II : PRODUK & BAGIAN III : PERENCANAAN PRODUKSI -->
                <input id="start_date" type="hidden" value="<?= $start_date;?>">
                <input type="text" id="jumlah_div_ada_isi">
        
                <div class="col-md-12" id="isi_bg3">
                    <table class="table table-bordered table-striped mb-none table_efisiensi_pp" id="datatable-default">
                        <tr>
                            <th class="col-xx-1"><center>Aksi</center></th>
                            <th class="col-xx-1"><center>No</center></th>
                            <th class="col-md-1"><center>Cust</center></th>
                            <th class="col-md-3"><center>Produk</center></th>
                            <th class="col-xx-1"><center>Qty</center></th>
                            <th class="col-md-1"><center>Line</center></th>

                            <div class="col-md-7">
                                <?php for($i=0;$i<7;$i++){ 
                                    $now_day[$i]      = date('d', strtotime('+'.$i.' days', strtotime($start_date)));
                                ?>
                                    <th>
                                        <center>
                                            <span id="tgl<?=$i?>"><?= intval($now_day[$i]) ?></span>
                                        </center>
                                    </th>
                                <?php }?>
                            </div>
                        </tr>
                        <?php 
                            $no = 0;
                            foreach($dpo as $det_po){
                                $hit = 0;
                                $count_line = 0;
                                foreach($cycle_time as $ct){
                                    if($ct->id_produk == $det_po->id_produk){
                                        $count_line++;
                                    }
                                }

                                foreach($jm_perc_seb as $z){
                                    if($z->id_detail_purchase_order == $det_po->id_detail_purchase_order_customer){
                                        $sebelum = $z->jumlah_sebelum;
                                        $target  = $det_po->jumlah_produk;

                                        if($sebelum == $target){
                                            $hit++;
                                        }
                                    }
                                }
                                
                            if($hit != $count_line){

                                foreach($jumlah_ct_produk as $jctp){
                                    if($det_po->id_produk == $jctp->id_produk){
                                        $jmlah_ctp = $jctp->jumlah_ct;

                                        if($jmlah_ctp == 3){
                        ?>
                                                <tr  id="1perc<?= $no; ?>" style="display:none">
                                                    <td rowspan="4">
                                                        <!-- buat keterangan, div mana yang ada isi deng nda. kalo 0 berarti nda ada isi, kalo 1 ada isi -->
                                                        <input type="text" id="ket<?= $no;?>" value="0" style="width:20px">
                                                        <input type="text" id="statper<?= $no;?>" value="0" style="width:20px">
                                                        <center>
                                                            <button type="button" id="bedit<?= $no;?>" value="<?= $no; ?>"
                                                            class="btn btn-warning fa fa-pencil-square-o btn1 edit_produk" title="Edit"></button>
                                                        </center>
                                                    </td>
                                                    <td rowspan="4">
                                                        <input type="text" id="no<?= $no;?>" class="row_efisiensi"
                                                        value="<?= $no;?>" readonly>
                                                        <center><?= $no+1?></center>
                                                    </td>
                                                    <td rowspan="4">
                                                        <input type="text" id="cust<?= $no;?>" class="row_efisiensi"
                                                        value="<?= $det_po->nama_customer?>" readonly>
                                                        <center><?= $det_po->nama_customer?></center>
                                                    </td>
                                                    <td rowspan="4">
                                                        <input type="text" id="id_bg3<?= $no;?>" value="<?= $det_po->id_detail_purchase_order_customer?>" style="width:50px">
                                                        
                                                            <!-- memiliki ukuran & warna -->
                                                            <?php if($det_po->keterangan == 0){
                                                                $ukuran_tam = "";
                                                                $warna_tam  = "";
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                                
                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)">
                                                            <!-- memiliki ukuran -->
                                                            <?php } else if($det_po->keterangan == 1){
                                                                $ukuran_tam = "";
                                                                
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?> <?= $ukuran_tam?>">

                                                            <?php } else if($det_po->keterangan == 2){
                                                                $warna_tam = "";

                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?> (<?= $warna_tam;?>)">
                                                            <?php } else{?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?>">
                                                            <?php } ?>
                                                        
                                                        <center>
                                                            <!-- memiliki ukuran & warna -->
                                                            <?php if($det_po->keterangan == 0){
                                                                $ukuran_tam = "";
                                                                $warna_tam  = "";
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                                
                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $det_po->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                                            <!-- memiliki ukuran -->
                                                            <?php } else if($det_po->keterangan == 1){
                                                                $ukuran_tam = "";
                                                                
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $det_po->nama_produk ?> <?= $ukuran_tam?>

                                                            <?php } else if($det_po->keterangan == 2){
                                                                $warna_tam = "";

                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $det_po->nama_produk ?> (<?= $warna_tam;?>)
                                                            <?php } else{?>
                                                                <?= $det_po->nama_produk ?>
                                                            <?php } ?>
                                                        </center>
                                                    </td>
                                                    <td rowspan="4">
                                                        <input type="text" id="qty<?= $no;?>" class="row_efisiensi"
                                                        value="<?= $det_po->jumlah_produk?>">
                                                        <center><?= $det_po->jumlah_produk?></center>
                                                    </td>
                                                </tr>
                                                <!--$nama_lines-->
                                                <?php 
                                                    $lineke = 1;
                                                    foreach($cycle_time as $ct){
                                                    if($ct->id_produk == $det_po->id_produk){?>
                                                        <tr id="2perc<?= $no; ?>ke<?= $lineke?>" style="display:none">
                                                                <td>
                                                                    <input type="text" id="<?=$no?>id_line<?= $lineke?>"
                                                                    class="row_efisiensi" value="<?= $ct->id_line?>">
                                                                    <input type="text" id="<?=$no?>nama_line<?= $ct->id_line?>"
                                                                    class="row_efisiensi" value="<?= $ct->nama_line?>">
                                                                    <input type="text" id="<?=$no?>ct<?= $ct->id_line?>"
                                                                    class="row_efisiensi" value="<?= $ct->cycle_time?>">
                                                                    <center><?= $ct->nama_line?></center>
                                                                </td>
                                                                    <!--$inputan_jumlah_produk+-->
                                                                    <?php for($z=1;$z<=7;$z++){ ?>
                                                                        <td>
                                                                        <input id="jm<?=$no?><?=$ct->id_line?>day<?=$z?>"
                                                                        type="number" class="inputinput form-control" min="0"
                                                                        style="width:58px;height:15px;font-size:10px;background:transparent;;margin-left:-3px">
                                                                        <input id="ef<?=$no?><?=$ct->id_line?>day<?=$z?>"
                                                                        type="text" class="form-control" disabled min="0"
                                                                        style="width:58px;height:15px;font-size:10px;background:transparent;;margin-left:-3px">
                                                                        </td>
                                                                    <?php } ?>
                                                        </tr>
                                                <?php $lineke++;}} ?> 
                                                <input type="hidden" id="jumlah_line<?= $no?>" value="<?= $lineke;?>">                        
                        <?php
                                        } 
                                        else{
                        ?>
                                                <tr id="1perc<?= $no; ?>" style="display:none">
                                                    <td rowspan="5">
                                                        <!-- buat keterangan, div mana yang ada isi deng nda -->
                                                        <input type="text" id="ket<?= $no;?>" value="0" style="width:20px">
                                                        <input type="text" id="statper<?= $no;?>" value="0" style="width:20px">
                                                        <center>
                                                            <button type="button" id="bedit<?= $no;?>" value="<?= $no; ?>"
                                                            class="btn btn-warning fa fa-pencil-square-o btn1 edit_produk" title="Edit"></button>
                                                        </center>
                                                    </td>
                                                    <td rowspan="5">
                                                        <input type="text" id="no<?= $no;?>" class="row_efisiensi"
                                                        value="<?= $no;?>" readonly>
                                                        <center><?= $no+1?></center>
                                                    </td>
                                                    <td rowspan="5">
                                                        <input type="text" id="cust<?= $no;?>" class="row_efisiensi"
                                                        value="<?= $det_po->nama_customer?>" readonly>
                                                        <center><?= $det_po->nama_customer?></center>
                                                    </td>
                                                    <td rowspan="5">
                                                        <input type="text" id="id_bg3<?= $no;?>" value="<?= $det_po->id_detail_purchase_order_customer?>" style="width:50px">
                                                            <!-- memiliki ukuran & warna -->
                                                            <?php if($det_po->keterangan == 0){
                                                                $ukuran_tam = "";
                                                                $warna_tam  = "";
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                                
                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)">
                                                            <!-- memiliki ukuran -->
                                                            <?php } else if($det_po->keterangan == 1){
                                                                $ukuran_tam = "";
                                                                
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?> <?= $ukuran_tam?>">

                                                            <?php } else if($det_po->keterangan == 2){
                                                                $warna_tam = "";

                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?> (<?= $warna_tam;?>)">
                                                            <?php } else{?>
                                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                                value="<?= $det_po->nama_produk ?>">
                                                            <?php } ?>


                                                        <center>
                                                            <!-- memiliki ukuran & warna -->
                                                            <?php if($det_po->keterangan == 0){
                                                                $ukuran_tam = "";
                                                                $warna_tam  = "";
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                                
                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $det_po->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                                            <!-- memiliki ukuran -->
                                                            <?php } else if($det_po->keterangan == 1){
                                                                $ukuran_tam = "";
                                                                
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $det_po->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $det_po->nama_produk ?> <?= $ukuran_tam?>

                                                            <?php } else if($det_po->keterangan == 2){
                                                                $warna_tam = "";

                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $det_po->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <?= $det_po->nama_produk ?> (<?= $warna_tam;?>)
                                                            <?php } else{?>
                                                                <?= $det_po->nama_produk ?>
                                                            <?php } ?>
                                                        </center>
                                                    </td>
                                                    <td rowspan="5">
                                                        <input type="text" id="qty<?= $no;?>" class="row_efisiensi"
                                                        value="<?= $det_po->jumlah_produk?>">
                                                        <center><?= $det_po->jumlah_produk?></center>
                                                    </td>
                                                </tr>
                                                <!--$nama_lines-->
                                                <?php 
                                                    $lineke = 1;
                                                    foreach($cycle_time as $ct){
                                                    if($ct->id_produk == $det_po->id_produk){?>
                                                        <tr id="2perc<?= $no; ?>ke<?= $lineke?>" style="display:none">
                                                            <td>
                                                                <input type="text" id="<?=$no?>id_line<?= $lineke?>"
                                                                class="row_efisiensi" value="<?= $ct->id_line?>">
                                                                <input type="text" id="<?=$no?>nama_line<?= $ct->id_line?>"
                                                                class="row_efisiensi" value="<?= $ct->nama_line?>">
                                                                <input type="text" id="<?=$no?>ct<?= $ct->id_line?>"
                                                                class="row_efisiensi" value="<?= $ct->cycle_time?>">
                                                                <center><?= $ct->nama_line?></center>
                                                            </td>
                                                                <!--$inputan_jumlah_produk+-->
                                                                <?php for($z=1;$z<=7;$z++){ ?>
                                                                    <td>
                                                                    <input id="jm<?=$no?><?=$ct->id_line?>day<?=$z?>"
                                                                        type="number" class="inputinput form-control" min="0"
                                                                        style="width:58px;height:15px;font-size:10px;background:transparent;;margin-left:-3px">
                                                                        <input id="ef<?=$no?><?=$ct->id_line?>day<?=$z?>"
                                                                        type="text" class="form-control" disabled min="0"
                                                                        style="width:58px;height:15px;font-size:10px;background:transparent;;margin-left:-3px">
                                                                    </td>
                                                                <?php } ?>
                                                        </tr>
                                                <?php $lineke++;}} ?>
                                                <input type="hidden" id="jumlah_line<?= $no?>" value="<?= $lineke;?>">
                                        <?php }?>
                        <?php $no++; 
                        }}}} ?>

                        <!-- reschedule -->
                        <?php 
                            $no = $no;
                            foreach($produksi_tertunda as $pt){
                        ?>
                                <tr  id="1perc<?= $no; ?>" style="display:none">
                                    <td>
                                        <!-- buat keterangan, div mana yang ada isi deng nda. kalo 0 berarti nda ada isi, kalo 1 ada isi -->
                                        <input type="text" id="ket<?= $no;?>" value="0" style="width:20px">
                                        <input type="text" id="statper<?= $no;?>" value="1" style="width:20px">
                                        <center>
                                            <button type="button" id="bedit<?= $no;?>" value="<?= $no; ?>"
                                            class="btn btn-warning fa fa-pencil-square-o btn1 edit_produk" title="Edit"></button>
                                        </center>
                                    </td>
                                    <td>
                                        <input type="text" id="no<?= $no;?>" class="row_efisiensi"
                                        value="<?= $no;?>" readonly>
                                        <center><?= $no+1?></center>
                                    </td>
                                    <td>
                                        <input type="text" id="cust<?= $no;?>" class="row_efisiensi"
                                        value="<?= $pt->nama_customer?>" readonly>
                                        <center><?= $pt->nama_customer?></center>
                                    </td>
                                    <td>
                                        <input type="text" id="id_bg3<?= $no;?>" value="<?= $pt->id_detail_purchase_order_customer?>" style="width:50px">
                                        <input type="text" id="id_pt_bg3<?= $no;?>" value="<?= $pt->id_produksi_tertunda?>" style="width:50px">
                                            <!-- memiliki ukuran & warna -->
                                            <?php if($pt->keterangan == 0){
                                                $ukuran_tam = "";
                                                $warna_tam  = "";
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                    }
                                                }
                                                
                                                foreach($warna as $w){
                                                    if($w->id_warna == $pt->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                value="<?= $pt->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)">
                                            <!-- memiliki ukuran -->
                                            <?php } else if($pt->keterangan == 1){
                                                $ukuran_tam = "";
                                                
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                    }
                                                }
                                            ?>
                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                value="<?= $pt->nama_produk ?> <?= $ukuran_tam?>">

                                            <?php } else if($pt->keterangan == 2){
                                                $warna_tam = "";

                                                foreach($warna as $w){
                                                    if($w->id_warna == $pt->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                value="<?= $pt->nama_produk ?> (<?= $warna_tam;?>)">
                                            <?php } else{?>
                                                <input type="text" id="produk<?= $no;?>" class="row_efisiensi"
                                                value="<?= $pt->nama_produk ?>">
                                            <?php } ?>
                                        
                                        <center>
                                            <!-- memiliki ukuran & warna -->
                                            <?php if($pt->keterangan == 0){
                                                $ukuran_tam = "";
                                                $warna_tam  = "";
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                    }
                                                }
                                                
                                                foreach($warna as $w){
                                                    if($w->id_warna == $pt->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <?= $pt->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                            <!-- memiliki ukuran -->
                                            <?php } else if($pt->keterangan == 1){
                                                $ukuran_tam = "";
                                                
                                                foreach($ukuran as $u){
                                                    if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                    }
                                                }
                                            ?>
                                                <?= $pt->nama_produk ?> <?= $ukuran_tam?>

                                            <?php } else if($pt->keterangan == 2){
                                                $warna_tam = "";

                                                foreach($warna as $w){
                                                    if($w->id_warna == $pt->id_warna){
                                                        $warna_tam = $w->nama_warna;
                                                    }
                                                }
                                            ?>
                                                <?= $pt->nama_produk ?> (<?= $warna_tam;?>)
                                            <?php } else{?>
                                                <?= $pt->nama_produk ?>
                                            <?php } ?>
                                        </center>
                                    </td>
                                    <td>
                                        <input type="text" id="qty<?= $no;?>" class="row_efisiensi"
                                        value="<?= $pt->jumlah_tertunda?>">
                                        <center><?= $pt->jumlah_tertunda?></center>
                                    </td>
                                
                                    <!--$nama_lines-->
                                    <?php 
                                        $lineke = 1;
                                        foreach($cycle_time as $ct){
                                            if($ct->id_produk == $pt->id_produk && $ct->id_line == $pt->id_line){
                                    ?>
                                       
                                                <td>
                                                    <input type="text" id="<?=$no?>id_line<?= $lineke?>"
                                                    class="row_efisiensi" value="<?= $ct->id_line?>">
                                                    <input type="text" id="<?=$no?>nama_line<?= $ct->id_line?>"
                                                    class="row_efisiensi" value="<?= $ct->nama_line?>">
                                                    <input type="text" id="<?=$no?>ct<?= $ct->id_line?>"
                                                    class="row_efisiensi" value="<?= $ct->cycle_time?>">
                                                    <center><?= $ct->nama_line?></center>
                                                </td>
                                                    <!--$inputan_jumlah_produk+-->
                                                    <?php for($z=1;$z<=7;$z++){ ?>
                                                        <td>
                                                        <input id="jm<?=$no?><?=$ct->id_line?>day<?=$z?>"
                                                        type="number" class="inputinput form-control" min="0"
                                                        style="width:58px;height:15px;font-size:10px;background:transparent;;margin-left:-3px">
                                                        <input id="ef<?=$no?><?=$ct->id_line?>day<?=$z?>"
                                                        type="text" class="form-control" disabled min="0"
                                                        style="width:58px;height:15px;font-size:10px;background:transparent;;margin-left:-3px">
                                                        </td>
                                                    <?php } ?>
                                </tr>
                                    <?php $lineke++;}} ?> 
                                <input type="hidden" id="jumlah_line<?= $no?>" value="<?= $lineke;?>">      
                        <?php $no++; } ?>
                    </table>
                </div>
            </div>
        </section>
<!-- CLOSE BG. 3 PERENCANAAN -->
    </div>

    <div class="col-md-3">
<!-- BG 1 PO -->
        <div class="panel-group" id="accordion2"  style="margin:50px 0px 0px 25px" >
            <div class="panel panel-accordion panel-accordion-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" style="background-color:rgb(189, 36, 40);color:white;font-size:12px;height:30px;padding:5;"
                         data-parent="#accordion2" href="#collapse2One">
                            <i class="fa fa-star"></i> PO
                        </a>
                    </h4>
                </div>
                <div id="collapse2One" class="accordion-body collapse in">
                    <div class="panel-body" style="height:250px;overflow:scroll;">
                        <input type="text" class="form-control search_prop" id="myInput" onkeyup="myFunction()" placeholder="Search" style="font-size:9px;height:30px;margin-bottom:10px;">
                        <table class="table table-bordered table-striped mb-none po_table" id="myTable" style="font-size:8px">
                            <thead>
                                <tr>
                                    <th style="text-align: center;vertical-align: middle;">Produk</th>
                                    <th style="text-align: center;vertical-align: middle;">Jumlah</th>
                                    <th style="text-align: center;vertical-align: middle;">Aksi</th>
                                    <th style="text-align: center;vertical-align: middle;">No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $ke = 0;
                                    foreach($dpo as $dt_dpo){
                                        $hit = 0;
                                        $count_line = 0;
                                        foreach($cycle_time as $ct){
                                            if($ct->id_produk == $dt_dpo->id_produk){
                                                $count_line++;
                                            }
                                        }

                                        foreach($jm_perc_seb as $z){
                                            if($z->id_detail_purchase_order == $dt_dpo->id_detail_purchase_order_customer){
                                                $sebelum = $z->jumlah_sebelum;
                                                $target  = $dt_dpo->jumlah_produk;

                                                if($sebelum == $target){
                                                    $hit++;
                                                }
                                            }
                                        }
                                        
                                    if($hit != $count_line){ ?>
                                        <tr id="bg1<?= $ke ?>">
                                            <td class="col-md-6">
                                                <input type="text" class="input_bgpo1 info_produk1"
                                                value="<?= $dt_dpo->id_detail_purchase_order_customer?>">
                                                <input type="text" class="input_bgpo1 info_produk1" id="nama_customer1<?= $dt_dpo->id_detail_purchase_order_customer?>"
                                                value="<?= $dt_dpo->id_customer?>">
                                                <input type="text" class="input_bgpo1 info_produk1" id="nama_produk1<?= $dt_dpo->id_detail_purchase_order_customer?>"
                                                value="<?= $dt_dpo->nama_produk?>">
                                                <input type="text" class="input_bgpo1 info_produk1" id="id_produk1<?= $dt_dpo->id_detail_purchase_order_customer?>"
                                                value="<?= $dt_dpo->id_produk?>">
                                                
                                                <center>
                                                    <!-- memiliki ukuran & warna -->
                                                    <?php if($dt_dpo->keterangan == 0){
                                                        $ukuran_tam = "";
                                                        $warna_tam  = "";
                                                        foreach($ukuran as $u){
                                                            if($u->id_ukuran_produk == $dt_dpo->id_ukuran_produk){
                                                                $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                            }
                                                        }
                                                        
                                                        foreach($warna as $w){
                                                            if($w->id_warna == $dt_dpo->id_warna){
                                                                $warna_tam = $w->nama_warna;
                                                            }
                                                        }
                                                    ?>
                                                        <?= $dt_dpo->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                                    <!-- memiliki ukuran -->
                                                    <?php } else if($dt_dpo->keterangan == 1){
                                                        $ukuran_tam = "";
                                                        
                                                        foreach($ukuran as $u){
                                                            if($u->id_ukuran_produk == $dt_dpo->id_ukuran_produk){
                                                                $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                            }
                                                        }
                                                    ?>
                                                        <?= $dt_dpo->nama_produk ?> <?= $ukuran_tam?>

                                                    <?php } else if($dt_dpo->keterangan == 2){
                                                        $warna_tam = "";

                                                        foreach($warna as $w){
                                                            if($w->id_warna == $dt_dpo->id_warna){
                                                                $warna_tam = $w->nama_warna;
                                                            }
                                                        }
                                                    ?>
                                                        <?= $dt_dpo->nama_produk ?> (<?= $warna_tam;?>)
                                                    <?php } else{?>
                                                        <?= $dt_dpo->nama_produk ?>
                                                    <?php } ?>
                                                </center>
                                            </td>
                                            <td class="col-md-2">
                                                <input type="hidden" class="input_bgpo1 jumlah_produk1" id="jumlah_produk1<?= $dt_dpo->id_detail_purchase_order_customer?>"
                                                value="<?= $dt_dpo->jumlah_produk?>">
                                                <center>
                                                    <?= $dt_dpo->jumlah_produk ?> 
                                                </center>
                                            </td>
                                            <td class="col-md-4">
                                                <button type="button" class="btn btn-success fa fa-plus-square-o btn1 add_produk" 
                                                title="Add" id="add<?= $ke ?>" value="<?= $ke ?>"></button>
                                                <a class="modal-with-form btn btn-primary fa fa-info-circle btn1"
                                                title="Detail" href="#modaldetail<?= $dt_dpo->id_detail_purchase_order_customer?>"></a>
                                            </td>
                                            <td class="col-xx-1">
                                                <input type="hidden" class="input_bgpo1 info_produk1" value="<?= $ke?>">
                                                <center><?= $ke+1;?></center>
                                            </td>
                                        </tr>

                                        <div id='modaldetail<?= $dt_dpo->id_detail_purchase_order_customer?>' class="modal-block modal-block-primary mfp-hide">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    <h2 class="panel-title">Detail Produk PO</h2>
                                                </header>

                                                <div class="panel-body">
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-5 control-label">Nama Customer</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                            value="<?= $dt_dpo->nama_customer?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-5 control-label">Kode PO</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                            value="<?= $dt_dpo->kode_purchase_order_customer?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-5 control-label">Tanggal Pesanan</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                            value="<?= $dt_dpo->tanggal_po?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-5 control-label">Nama Produk</label>
                                                        <div class="col-sm-7">
                                                            <!-- memiliki ukuran & warna -->
                                                            <?php if($dt_dpo->keterangan == 0){
                                                                $ukuran_tam = "";
                                                                $warna_tam  = "";
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $dt_dpo->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                                
                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $dt_dpo->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" class="form-control"
                                                                value="<?= $dt_dpo->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)" readonly>
                                                            <!-- memiliki ukuran -->
                                                            <?php } else if($dt_dpo->keterangan == 1){
                                                                $ukuran_tam = "";
                                                                
                                                                foreach($ukuran as $u){
                                                                    if($u->id_ukuran_produk == $dt_dpo->id_ukuran_produk){
                                                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" class="form-control"
                                                                value="<?= $dt_dpo->nama_produk ?> <?= $ukuran_tam?>" readonly>

                                                            <?php } else if($dt_dpo->keterangan == 2){
                                                                $warna_tam = "";

                                                                foreach($warna as $w){
                                                                    if($w->id_warna == $dt_dpo->id_warna){
                                                                        $warna_tam = $w->nama_warna;
                                                                    }
                                                                }
                                                            ?>
                                                                <input type="text" class="form-control"
                                                                value="<?= $dt_dpo->nama_produk ?> (<?= $warna_tam;?>)" readonly>
                                                            <?php } else{?>
                                                                <input type="text" class="form-control"
                                                                value="<?= $dt_dpo->nama_produk ?>" readonly>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-5 control-label">Tanggal Penerimaan</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                            value="<?= $dt_dpo->tanggal_penerimaan?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-lg">
                                                        <label class="col-sm-5 control-label">Jumlah Produk Pesanan</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                            value="<?= $dt_dpo->jumlah_produk?>" readonly>
                                                        </div>
                                                    </div>
                                            <!--- JUMLAH YANG HARUS DIPRODUKSI-->
                                                    <label class="col-sm-12 control-label"><b>Jumlah Produk Yang Belum Dibuatkan Perencanaan Produksi</b></label>
                                                    <?php 
                                                        foreach($cycle_time as $ct){
                                                        if($ct->id_produk == $dt_dpo->id_produk){
                                                            $ket = 0;
                                                            foreach($jm_perc_seb as $z){
                                                                if($z->id_detail_purchase_order == $dt_dpo->id_detail_purchase_order_customer){
                                                                    $ket++;
                                                                }
                                                            }

                                                            if($ket == 0){
                                                    ?>
                                                                <div class="form-group mt-lg">
                                                                    <label class="col-sm-5 control-label"><?= $ct->nama_line;?></label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text" id="<?= $ke ?>target1<?= $ct->id_line ?>" class="form-control"
                                                                        value="<?= $dt_dpo->jumlah_produk?>" readonly>
                                                                    </div>
                                                                </div>    
                                                    <?php 
                                                            } else{
                                                                foreach($jm_perc_seb as $zz){
                                                                    if($zz->id_line == $ct->id_line && $zz->id_detail_purchase_order == $dt_dpo->id_detail_purchase_order_customer){
                                                                        $jumlah_total = $dt_dpo->jumlah_produk;
                                                                        $jumlah_sblm  = $zz->jumlah_sebelum;
                                                                        $jumlah_now   = $jumlah_total - $jumlah_sblm;
                                                    ?>
                                                            <div class="form-group mt-lg">
                                                            <label class="col-sm-5 control-label"><?= $ct->nama_line;?></label>
                                                            <div class="col-sm-7">
                                                                <input type="text" id="<?= $ke ?>target1<?= $ct->id_line ?>" class="form-control"
                                                                value="<?= $jumlah_now?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php }}}}} ?>
                                            <!-- -->
                                                </div>

                                                <footer class="panel-footer">
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" class="btn btn-default modal-dismiss">Ok</button>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </section>
                                        </div>
                                <?php $ke++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-accordion panel-accordion-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" style="background-color:rgb(189, 36, 40);color:white;font-size:12px;height:30px;padding:5;"
                         data-parent="#accordion2" href="#collapse2Two">
                            <i class="fa fa-cogs"></i> RESCHEDULE
                        </a>
                    </h4>
                </div>
                <div id="collapse2Two" class="accordion-body collapse">
                    <div class="panel-body" style="height:250px;overflow:scroll;">
                        <input type="text" class="form-control search_prop" id="myInput" onkeyup="myFunction()" placeholder="Search" style="font-size:9px;height:30px;margin-bottom:10px;">
                        <table class="table table-bordered table-striped mb-none po_table" id="myTable" style="font-size:8px">
                            <thead>
                                <tr>
                                    <th style="text-align: center;vertical-align: middle;">Produk</th>
                                    <th style="text-align: center;vertical-align: middle;">Jumlah</th>
                                    <th style="text-align: center;vertical-align: middle;">Aksi</th>
                                    <th style="text-align: center;vertical-align: middle;">No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $ke = $ke;
                                    foreach($produksi_tertunda as $pt){
                                ?>
                                        <tr id="bg1<?= $ke ?>">
                                            <td class="col-md-6">
                                                <input type="text" class="input_bgpo1 info_produk1"
                                                value="<?= $pt->id_detail_purchase_order_customer?>">
                                                <input type="text" class="input_bgpo1 info_produk1" id="renama_customer1<?= $pt->id_detail_purchase_order_customer?>"
                                                value="<?= $pt->id_customer?>">
                                                <input type="text" class="input_bgpo1 info_produk1" id="renama_produk1<?= $pt->id_detail_purchase_order_customer?>"
                                                value="<?= $pt->nama_produk?>">
                                                <input type="text" class="input_bgpo1 info_produk1" id="reid_produk1<?= $pt->id_detail_purchase_order_customer?>"
                                                value="<?= $pt->id_produk?>">
                                                
                                                <center>
                                                    <!-- memiliki ukuran & warna -->
                                                    <?php if($pt->keterangan == 0){
                                                        $ukuran_tam = "";
                                                        $warna_tam  = "";
                                                        foreach($ukuran as $u){
                                                            if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                                                $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                                            }
                                                        }
                                                        
                                                        foreach($warna as $w){
                                                            if($w->id_warna == $pt->id_warna){
                                                                $warna_tam = $w->nama_warna;
                                                            }
                                                        }
                                                    ?>
                                                        <?= $pt->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                                    <!-- memiliki ukuran -->
                                                    <?php } else if($pt->keterangan == 1){
                                                        $ukuran_tam = "";
                                                        
                                                        foreach($ukuran as $u){
                                                            if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                                                $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                                            }
                                                        }
                                                    ?>
                                                        <?= $pt->nama_produk ?> <?= $ukuran_tam?>

                                                    <?php } else if($pt->keterangan == 2){
                                                        $warna_tam = "";

                                                        foreach($warna as $w){
                                                            if($w->id_warna == $pt->id_warna){
                                                                $warna_tam = $w->nama_warna;
                                                            }
                                                        }
                                                    ?>
                                                        <?= $pt->nama_produk ?> (<?= $warna_tam;?>)
                                                    <?php } else{?>
                                                        <?= $pt->nama_produk ?>
                                                    <?php } ?>
                                                </center>
                                            </td>
                                            <td class="col-md-2">
                                                <?php $jumlanya = $pt->jumlah_tertunda - $pt->jumlah_terencana;?>
                                                <input type="text" class="input_bgpo1 jumlah_produk1" id="re_id1<?= $ke ?>" value="<?= $pt->id_produksi_tertunda?>">
                                                <input type="text" class="input_bgpo1 jumlah_produk1" id="rejumlah_produk1<?= $pt->id_detail_purchase_order_customer?>"
                                                value="<?= $pt->jumlah_tertunda ?>">
                                                <center>
                                                    <?= $pt->jumlah_tertunda  ?> 
                                                </center>
                                            </td>
                                            <td class="col-md-4">
                                                <button type="button" class="btn btn-success fa fa-plus-square-o btn1 add_produk" 
                                                title="Add" id="add<?= $ke ?>" value="<?= $ke ?>"></button>
                                                <button type="button" class="btn btn-primary fa fa-info-circle btn1 detail_reschedule" 
                                                title="Detail" value="<?= $ke ?>"></button>
                                            </td>
                                            <td class="col-xx-1">
                                                <input type="hidden" class="input_bgpo1 info_produk1" value="<?= $ke?>">
                                                <center><?= $ke+1;?></center>
                                            </td>
                                        </tr>

                                <?php $ke++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <input type="text" id="jumlah_dpo" value="<?= $ke?>">
        </div>
<!-- CLOSE BG. 1 PO -->

<!-- BG.2 PRODUK -->
        <section class="panel" style="margin:25px 0px 0px 25px;">
            <div class="panel-body">
                <div id="bagian2">
                <?php 
                    $count=0;
                    foreach($dpo as $detail_po){
                        $hit = 0;
                                $count_line = 0;
                                foreach($cycle_time as $ct){
                                    if($ct->id_produk == $detail_po->id_produk){
                                        $count_line++;
                                    }
                                }

                                foreach($jm_perc_seb as $z){
                                    if($z->id_detail_purchase_order == $detail_po->id_detail_purchase_order_customer){
                                        $sebelum = $z->jumlah_sebelum;
                                        $target  = $detail_po->jumlah_produk;

                                        if($sebelum == $target){
                                            $hit++;
                                        }
                                    }
                                }
                                
                            if($hit != $count_line){
                ?>
                    <div id="track<?= $count ?>" style="display:none">
                        <!-- Nama produk (jumlah produk) -->
                        <p id="<?= $count ?>nama_produk2" style="font-size:10px">
                            <span><?= $count+1?>. </span>

                            <!-- memiliki ukuran & warna -->
                            <?php if($detail_po->keterangan == 0){
                                $ukuran_tam = "";
                                $warna_tam  = "";
                                foreach($ukuran as $u){
                                    if($u->id_ukuran_produk == $detail_po->id_ukuran_produk){
                                        $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                    }
                                }
                                
                                foreach($warna as $w){
                                    if($w->id_warna == $detail_po->id_warna){
                                        $warna_tam = $w->nama_warna;
                                    }
                                }
                            ?>
                                <?= $detail_po->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                            <!-- memiliki ukuran -->
                            <?php } else if($detail_po->keterangan == 1){
                                $ukuran_tam = "";
                                
                                foreach($ukuran as $u){
                                    if($u->id_ukuran_produk == $detail_po->id_ukuran_produk){
                                        $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                    }
                                }
                            ?>
                                <?= $detail_po->nama_produk ?> <?= $ukuran_tam?>

                            <?php } else if($detail_po->keterangan == 2){
                                $warna_tam = "";

                                foreach($warna as $w){
                                    if($w->id_warna == $detail_po->id_warna){
                                        $warna_tam = $w->nama_warna;
                                    }
                                }
                            ?>
                                <?= $detail_po->nama_produk ?> (<?= $warna_tam;?>)
                            <?php } else{?>
                                <?= $detail_po->nama_produk ?>
                            <?php } ?>
                        </p>
                        <!-- Nama Konsumen -->
                        <p id="<?= $count ?>nama_customer2" style="font-size:10px">
                            <?= $detail_po->nama_customer?>
                        </p>

                        <table class="table table-bordered table-striped mb-none"
                            id="datatable-default"  style="font-size:9px">
                                <thead>
                                    <tr>
                                        <th class="col-md-9"><center>Nama Line</center></th>
                                        <th class="col-md-1"><center>Target</center></th>
                                        <th class="col-md-1"><center>Plan</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cycle_time as $ct){
                                        if($ct->id_produk == $detail_po->id_produk){?>
                                        <tr>
                                            <td style="text-align: center;vertical-align: middle;">
                                                <input type="text" id="<?= $count?>idline2<?= $ct->id_line?>" value="<?= $ct->id_line?>">
                                                <?= $ct->nama_line?>
                                            </td>
                                            <td>
                                                <input type="text" id="<?= $count?>target2<?= $ct->id_line?>"  style="text-align: center;vertical-align: middle;"
                                                class="row_efisiensi" disabled>
                                            </td>
                                            <td>
                                                <input type="text" id="<?= $count?>plan2<?= $ct->id_line?>" style="text-align: center;vertical-align:middle;" 
                                                class="row_efisiensi" disabled>
                                            </td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                        </table>
                    </div>

                <?php $count++;}} ?>

                <?php 
                    $countt = $count;
                    foreach($produksi_tertunda as $pt){?>
                        <div id="track<?= $countt ?>" style="display:none">
                            <!-- Nama produk (jumlah produk) -->
                            <p id="<?= $countt ?>nama_produk2" style="font-size:10px">
                                <span><?= $countt+1?>. </span>

                                <!-- memiliki ukuran & warna -->
                                <?php if($pt->keterangan == 0){
                                    $ukuran_tam = "";
                                    $warna_tam  = "";
                                    foreach($ukuran as $u){
                                        if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                            $ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
                                        }
                                    }
                                    
                                    foreach($warna as $w){
                                        if($w->id_warna == $pt->id_warna){
                                            $warna_tam = $w->nama_warna;
                                        }
                                    }
                                ?>
                                    <?= $pt->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
                                <!-- memiliki ukuran -->
                                <?php } else if($pt->keterangan == 1){
                                    $ukuran_tam = "";
                                    
                                    foreach($ukuran as $u){
                                        if($u->id_ukuran_produk == $pt->id_ukuran_produk){
                                            $ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
                                        }
                                    }
                                ?>
                                    <?= $pt->nama_produk ?> <?= $ukuran_tam?>

                                <?php } else if($pt->keterangan == 2){
                                    $warna_tam = "";

                                    foreach($warna as $w){
                                        if($w->id_warna == $pt->id_warna){
                                            $warna_tam = $w->nama_warna;
                                        }
                                    }
                                ?>
                                    <?= $pt->nama_produk ?> (<?= $warna_tam;?>)
                                <?php } else{?>
                                    <?= $pt->nama_produk ?>
                                <?php } ?>
                            </p>
                            <!-- Nama Konsumen -->
                            <p id="<?= $countt ?>nama_customer2" style="font-size:10px">
                                <?= $pt->nama_customer?>
                            </p>

                            <table class="table table-bordered table-striped mb-none"
                                id="datatable-default"  style="font-size:9px">
                                    <thead>
                                        <tr>
                                            <th class="col-md-9"><center>Nama Line</center></th>
                                            <th class="col-md-1"><center>Target</center></th>
                                            <th class="col-md-1"><center>Plan</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($cycle_time as $ct){
                                            if($ct->id_produk == $pt->id_produk && $ct->id_line == $pt->id_line){?>
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">
                                                    <input type="text" id="<?= $countt?>idline2<?= $ct->id_line?>" value="<?= $ct->id_line?>">
                                                    <?= $ct->nama_line?>
                                                </td>
                                                <td>
                                                    <input type="text" id="<?= $countt?>target2<?= $ct->id_line?>" value="<?= $pt->jumlah_tertunda - $pt->jumlah_terencana?>" style="text-align: center;vertical-align: middle;"
                                                    class="row_efisiensi" disabled>
                                                </td>
                                                <td>
                                                    <input type="text" id="<?= $countt?>plan2<?= $ct->id_line?>" style="text-align: center;vertical-align:middle;" 
                                                    class="row_efisiensi" disabled>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                            </table>
                        </div>
                <?php $countt++; } ?>
                </div>
            </div>
        </section>
<!-- CLOSE BG. 2 PRODUK -->
    </div>
</div>

    <!-- modal detail -->
    <div class="modal" id="modalredetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Produksi Tertunda</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Customer</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_nama_cust" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kode PO</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_kode_po" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Pesanan</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_tanggal_po" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_nama_produk" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Penerimaan</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_tanggal_penerimaan" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Produk Pesanan</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_jumlah_produk" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Produksi Sebelum</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_tanggal_sebelum" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Perencanaan Sebelum</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_jumlah_perencanaan" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Aktual Sebelum</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_jumlah_aktual" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Perencanaan Tertunda</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_jumlah_tertunda" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Perencanaan Terencana Kembali</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_jumlah_terencana" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Belum Terencana</label>
                        <div class="col-sm-7">
                            <input type="text" id="det_jumlah_belum_terencana" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal tambah -->
    <div id='modaltambah' class="modal-block modal-block-lg mfp-hide">
        <form method="POST" action="<?= base_url()?>perencanaanProduksi/tambah_perencanaan"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Konfirmasi <span id="judul_konf"></span></h2>
                    <input type="hidden" name="start_date" value="<?= $start_date;?>">
                    <input type="hidden" name="jumlah_dpo_kf" id="jumlah_dpo_kf" value="<?= $start_date;?>">
                </header>

                <div class="panel-body">
                    <h5><b>Efisiensi Perencanaan</b></h5>
                    <table class="table table-bordered table-striped mb-none table_efisiensi_pp" id="datatable-default">
                        <tr>
                            <td class="col-md-4"></td>

                            <!-- Tanggal (1 minggu) -->
                            <?php
                                for($i=0;$i<7;$i++){
                                    $now_day[$i]      = date('d', strtotime('+'.$i.' days', strtotime($start_date)));
                                    $now_fulldate[$i] = date('Y-m-d', strtotime('+'.$i.' days', strtotime($start_date)));
                            ?>
                                <td>
                                    <center>
                                        <b>
                                            <input name="<?= $i;?>" class="input_tanggal_pp">
                                            <?= intval($now_day[$i]) ?>
                                        </b>
                                    </center>
                                </td>

                            <?php
                            }
                            ?>
                        </tr>

                        <?php 
                            $hitung = 1;
                            foreach($line as $ln){
                        ?>
                            <tr>
                                <td><b>
                                    Plan <?= $ln->nama_line; ?>
                                    <input type="hidden" name="idline_kf<?= $hitung;?>" id="idline_kf<?= $hitung;?>" 
                                    value="<?= $ln->id_line;?>" class="input_line_pp">
                                    <input type="hidden" name="tpt_kf<?=$hitung;?>" id="tpt_kf<?=$ln->id_line;?>"
                                    value="<?= $ln->total_processing_time;?>" class="input_line_pp">
                                </b></td>
                                
                                <?php for($j=1;$j<=7;$j++){ ?>
                                    <td>  
                                        <!-- persentase prt(presentase yg ditampilkan) & prs(presentase yg disimpan) -->
                                        <center><span id="prt_kf<?= $ln->id_line?>day<?=$j?>"></span>
                                        <input type="hidden" class="row_efisiensi" id="prs_kf<?= $ln->id_line?>day<?=$j?>"
                                        name="prs_kf<?= $ln->id_line?>day<?=$j?>" readonly>
                                        <!-- total waktu -->
                                        <input type="hidden" class="row_efisiensi" id="tw_kf<?= $ln->id_line?>day<?=$j?>"
                                        name="tw_kf<?= $ln->id_line?>day<?=$j?>" readonly>
                                        </center>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php 
                            $hitung++;
                            }
                        ?>
                    </table>
                    
                    <br>
                    <h5><b>Perencanaan Produksi</b></h5>
                    <div id="isi_perc_kf">
                    
                    </div>

                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <button type="button" class="btn btn-default modal-dismiss">Batal</button>
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

<!-- search bg.1 -->
<script>
    function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }       
    }
    }
</script>

<!-- kalo button add dipilih di bg 1-->
<script>
    $('.add_produk').click(function(){
        var id = $(this).attr('value');
        var jumlah_dpo = $("#jumlah_dpo").val();
        var jumlah_line = $("#jumlah_line"+id).val();

        $("#add"+id).prop('disabled',true);
        
        for(var i=0;i<jumlah_dpo;i++){
            $jumlah_line_dpo = $("#jumlah_line"+i).val()-1;
                     
            if(i == id){
                //munculin bg2
                
                document.getElementById("track"+i).style.display = "block";  
                $("#bedit"+i).prop('disabled',true);

                //undisabled inputan
                for($k=1;$k<=$jumlah_line_dpo;$k++){
                    $id_line = $("#"+i+"id_line"+$k).val();

                    for($z=1;$z<=7;$z++){
                        $("#jm"+i+$id_line+'day'+$z).prop('disabled',false);
                    }
                }

                //munculin bg3
                document.getElementById("1perc"+id).style.display = 'table-row'; 

                for(var j=1;j<jumlah_line;j++){
                    document.getElementById("2perc"+id+"ke"+j).style.display = 'table-row';
                }   
                
            }
  
            else{
                //hide bg2
                document.getElementById("track"+i).style.display = "none";  
                $("#bedit"+i).prop('disabled',false);

                //disabled inputan
                for($k=1;$k<=$jumlah_line_dpo;$k++){
                    $id_line = $("#"+i+"id_line"+$k).val();

                    for($z=1;$z<=7;$z++){
                        $("#jm"+i+$id_line+"day"+$z).prop('disabled',true);
                    }
                }
            }
          
        }

        $jmline_asli = jumlah_line-1;
        for($k=1;$k<=$jmline_asli;$k++){
            $id_line = $("#"+id+'id_line'+$k).val();
            $target1 = $("#"+id+'target1'+$id_line).val();
            $("#"+id+'target2'+$id_line).val($target1);
        }
        
    });
</script>

<!-- button reschedule detail -->
<script>
    $('.detail_reschedule').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#re_id1"+no).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>perencanaanProduksi/detail_produksi_tertunda",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $namanya = "";

                //nama produk
                if(respond['prodtun'][0]['keterangan'] == 0){
                    $id_ukuran = respond['prodtun'][0]['id_ukuran'];
                    $id_warna  = respond['prodtun'][0]['id_warna'];

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

                    $namanya = respond['prodtun'][0]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                }
                else if(respond['prodtun'][0]['keterangan'] == 1){
                    $id_ukuran = respond['prodtun'][0]['id_ukuran'];

                    for($l=0;$l<respond['jmukuran'];$l++){
                        if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                            $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                            $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                            $ukurannya = $nama_ukuran + $satuan_ukuran;
                        }
                    }

                    $namanya = respond['prodtun'][0]['nama_produk'] + $ukurannya;

                }
                else if(respond['prodtun'][0]['keterangan'] == 2){
                    $id_warna  = respond['prodtun'][0]['id_warna'];

                    for($k=0;$k<respond['jmwarna'];$k++){
                        if(respond['warna'][$k]['id_warna'] == $id_warna){
                            $warnanya = respond['warna'][$k]['nama_warna'];
                        }
                    }

                    $namanya = respond['prodtun'][0]['nama_produk'] + " (" + $warnanya + ")";
                }
                else{
                    $namanya = respond['prodtun'][0]['nama_produk'];
                }

                $("#det_nama_cust").val(respond['prodtun'][0]['nama_customer']);
                $("#det_kode_po").val(respond['prodtun'][0]['kode_purchase_order_customer']);
                $("#det_tanggal_po").val(respond['prodtun'][0]['tanggal_po']);
                $("#det_nama_produk").val($namanya);
                $("#det_tanggal_penerimaan").val(respond['prodtun'][0]['tanggal_penerimaan']);
                $("#det_jumlah_produk").val(respond['prodtun'][0]['jumlah_produk']);
                $("#det_tanggal_sebelum").val(respond['prodtun'][0]['tanggal']);
                $("#det_jumlah_perencanaan").val(respond['prodtun'][0]['jumlah_item_perencanaan']);
                $("#det_jumlah_aktual").val(respond['prodtun'][0]['jumlah_item_aktual']);
                $("#det_jumlah_tertunda").val(respond['prodtun'][0]['jumlah_tertunda']);
                $("#det_jumlah_terencana").val(respond['prodtun'][0]['jumlah_terencana']);
                $("#det_jumlah_belum_terencana").val(respond['prodtun'][0]['jumlah_tertunda'] - respond['prodtun'][0]['jumlah_terencana']);

                $("#modalredetail").modal();
            }
        });
    });
</script>

<!-- pencet button edit -->
<script>
    $('.edit_produk').click(function(){
        var id = $(this).attr('value');
        var jumlah_dpo = $("#jumlah_dpo").val();

        for(var i=0;i<jumlah_dpo;i++){
            $jumlah_line_dpo = $("#jumlah_line"+i).val()-1;

            if(i == id){
                //munculin bg2
                document.getElementById("track"+i).style.display = "block";  
                $("#bedit"+i).prop('disabled',true);

                //undisabled inputan
                for($k=1;$k<=$jumlah_line_dpo;$k++){
                    $id_line = $("#"+i+"id_line"+$k).val();

                    for($z=1;$z<=7;$z++){
                        $("#jm"+i+$id_line+'day'+$z).prop('disabled',false);
                    }
                }
            }
            else{
                //hide bg2
                document.getElementById("track"+i).style.display = "none";  
                $("#bedit"+i).prop('disabled',false);

                //disabled inputan
                for($k=1;$k<=$jumlah_line_dpo;$k++){
                    $id_line = $("#"+i+"id_line"+$k).val();

                    for($z=1;$z<=7;$z++){
                        $("#jm"+i+$id_line+"day"+$z).prop('disabled',true);
                    }
                }
            }


        }
    });
</script>

<!-- diinput -->
<script>
    $(".inputinput").change(function(){
        var id = $(this).attr('id');
        var vals = document.getElementById(id).value;
        var pjg = id.length;

        //alert(id);

        //kalo urutan div cuma 1 angka
        if(pjg == 13){
            //urutan div charAt ke (2)
            var div = id.charAt(2);
            //id line charAt ke (3-8)
            var lineke = id.charAt(8);
            var id_line = "LINE-"+lineke;
            //day ke charAt ke (9-12)
            var dayke = id.charAt(12);
            var day   = "day"+dayke;
        }
        // kalo urutan div 2 angka (10-99)
        else if(pjg == 14){
            //urutan div charAt ke (2-3)
            var div1 = id.charAt(2);
            var div2 = id.charAt(3);
            var div  = div1+div2;
            //id line charAt ke (4-9)
            var lineke = id.charAt(9);
            var id_line = "LINE-"+lineke;
            //day ke charAt ke (10-13)
            var dayke = id.charAt(13);
            var day   = "day"+dayke;
        }
        // kalo urutan div 3 angka (100-999)
        else if(pjg == 15){
            //urutan div charAt ke (2-4)
            var div1 = id.charAt(2);
            var div2 = id.charAt(3);
            var div3 = id.charAt(4);
            var div  = div1+div2+div3;
            //id line charAt ke (5-10)
            var lineke = id.charAt(10);
            var id_line = "LINE-"+lineke;
            //day ke charAt ke (11-14)
            var dayke = id.charAt(14);
            var day   = "day"+dayke;
        }
        //kalo urutan div 4 angka (1000-9999)
        else if(pjg == 16){
            //urutan div charAt ke (2-5)
            var div1 = id.charAt(2);
            var div2 = id.charAt(3);
            var div3 = id.charAt(4);
            var div4 = id.charAt(5);
            var div  = div1+div2+div3+div4;
            //id line charAt ke (6-11)
            var lineke = id.charAt(11);
            var id_line = "LINE-"+lineke;
            //day ke charAt ke (12-15)
            var dayke = id.charAt(15);
            var day   = "day"+dayke;
        }

        //UPDATE BG2 0plan2LINE-1
        $jumlah = 0;
        for($q=1;$q<=7;$q++){
            $baru   = $("#jm"+div+id_line+'day'+$q).val();
            if($baru != ""){
                $jumlah = parseInt($jumlah) + parseInt($baru);
            }
        }
        $("#"+div+"plan2"+id_line).val($jumlah);
        var target = $("#"+div+"target2"+id_line).val();
        var plan   = $("#"+div+"plan2"+id_line).val();

        //hitung ct
        $satuan_ct = $("#"+div+'ct'+id_line).val();
        $cycle_time = parseInt($satuan_ct) * parseInt(vals);
        $("#ef"+div+id_line+day).val($cycle_time);

        if(parseInt(plan) > parseInt(target)){
            $("#"+id).val(0);
            $("#ef"+div+id_line+day).val(0);
            $("#"+div+"plan2"+id_line).val(plan-vals);
            alert("Mohon maaf plan produksi yang anda buat telah melebih target produksi, silahkan coba lagi");
        }
        if(parseInt(plan) == parseInt(target)){
           //something happen
        }

        $jumlah_dpo = $("#jumlah_dpo").val();
        $all_ct = 0;

        //alert($jumlah_dpo);
        for($i=0;$i<$jumlah_dpo;$i++){
            if($("#statper"+$i).val() == 0){
                $count_line = $("#jumlah_line"+$i).val();
                if($("#"+div+"nama_line"+id_line).val() == "Line Sewing"){
                    if($count_line == "5"){
                        $new_per = $("#jm"+$i+id_line+day).val();
                        $new     = $("#ef"+$i+id_line+day).val();

                        if($new_per != ""){
                            $all_ct = parseInt($all_ct) + parseInt($new);
                        }
                    }
                }
                else{
                    $new_per = $("#jm"+$i+id_line+day).val();
                    $new     = $("#ef"+$i+id_line+day).val();

                    if($new_per != ""){
                        $all_ct = parseInt($all_ct) + parseInt($new);
                    }
                }
            } else{
                if($("#"+$i+"id_line1").val() == id_line){
                    
                    $new_per = $("#jm"+$i+id_line+day).val();
                    $new     = $("#ef"+$i+id_line+day).val();

                    if($new_per != ""){
                        $all_ct = parseInt($all_ct) + parseInt($new);
                    }
                }
            }
            
        }

        //total waktunya
        $("#tw"+id_line+day).val($all_ct);

        //presentasenya
        $total_processing_time = $("#tpt"+id_line).val();
        $total_waktu = $("#tw"+id_line+day).val();
        $presentase = $total_waktu / ($total_processing_time * 3600) * 100;
        $presentase_bulat = $presentase.toFixed(2);
        $("#prs"+id_line+day).val($presentase_bulat);
        $("#prt"+id_line+day).html($presentase_bulat+ "%");

        //update keterangan div
        $jumline_div_ini = $("#jumlah_line"+div).val()-1;
        
        $hit_jum_inp = 0;
        for($o=1;$o<=$jumline_div_ini;$o++){
            $id_linenya = $("#"+div+'id_line'+$o).val();
            
            for($u=1;$u<=7;$u++){
                $divnya = $("#jm"+div+$id_linenya+'day'+$u).val();

                if($divnya != 0){
                    $hit_jum_inp++;
                }
            }
        }
        
        if($hit_jum_inp > 0){
            $("#ket"+div).val(1);
        }
        else{
            $("#ket"+div).val(0);
        }
        
        //update jumlah div yang ada isinya
        //jumlah_div_ada_isi
        //alert($jumlah_dpo);
        $jumlah_div_terisi = 0;
        for($q=0;$q<$jumlah_dpo;$q++){
            if($("#ket"+$q).val() == 1){
                $jumlah_div_terisi++;
            }
        }
        $("#jumlah_div_ada_isi").val($jumlah_div_terisi);

        if($("#jumlah_div_ada_isi").val() == 0){
            $("#button_tambah").prop('disabled',true);
        }
        else{
            $("#button_tambah").prop('disabled',false);
        }

    });
</script>

<!-- pencet button simpan -->
<script>
    function simpan(){
        $("#judul_konf").html($("#judul").html());
        
        for($k=1;$k<=4;$k++){
            $id_line = $("#idline_kf"+$k).val();
            $("#jumlah_dpo_kf").val($("#jumlah_dpo").val());
            
            for($i=1;$i<=7;$i++){
                $("#prt_kf"+$id_line+'day'+$i).html($("#prt"+$id_line+'day'+$i).html());
                $("#prs_kf"+$id_line+'day'+$i).val($("#prs"+$id_line+'day'+$i).val());
                $("#tw_kf"+$id_line+'day'+$i).val($("#tw"+$id_line+'day'+$i).val());
            }
        }

        $tanggal_atas = "";
        for($i=0;$i<7;$i++){
            $tgl = $("#tgl"+$i).html();
            $tanggal_atas = $tanggal_atas +
            '<th>'+
                '<center>'+
                    $tgl +
                '</center>'+
            '</th>';
        }

        $isi_div = "";
        $jumlah_dpo = $("#jumlah_dpo").val();
        for($r=0;$r<$jumlah_dpo;$r++){
            //keterangan
            $ket     = $("#ket"+$r).val();
            $statper = $("#statper"+$r).val();
            //jumlah line untuk suatu dpo  id="jumlah_line<?= $no?>"
            $jumlah_line_dpo = $("#jumlah_line"+$r).val()-1;


                //kalau div ada perencanaan
                if($ket == 1){
                    if($jumlah_line_dpo == 3){
                        $lines = "";

                        for($y=1;$y<=$jumlah_line_dpo;$y++){
                            $id_line = $("#"+$r+'id_line'+$y).val();
                            $inputan="";

                            for($u=1;$u<=7;$u++){
                                $inputan = $inputan +
                                '<td>'+
                                    '<center>'+$("#jm"+$r+$id_line+'day'+$u).val()+'</center>'+
                                    '<input name="'+"jm"+$r+$id_line+'day'+$u+'"'+
                                        'value="'+$("#jm"+$r+$id_line+'day'+$u).val()+'"'+
                                        'type="hidden" class="input_line_pp"'+
                                    '>'+
                                    '<input name="'+"ef"+$r+$id_line+'day'+$u+'"'+
                                        'value="'+$("#ef"+$r+$id_line+'day'+$u).val()+'"'+
                                        'type="hidden" class="input_line_pp"'+
                                    '>'+
                                '</td>';
                            }

                            $idline = $("#"+$r+'id_line'+$y).val();
                            $nmline = $("#"+$r+'nama_line'+$idline).val();
                            $show   = $("#"+$r+'nama_line'+$idline).val();

                            $lines = $lines+
                            '<tr>'+
                                '<td>'+
                                    '<input type="hidden" name="'+$r+'id_line_kf'+$y+'" class="row_efisiensi" value="'+$idline+'">'+
                                    '<input type="hidden" class="row_efisiensi" value="'+$nmline+'">'+
                                    '<center>'+$show+'</center>'+
                                '</td>'+
                                $inputan+
                            '</tr>';
                        }

                        $isi_div = $isi_div +
                        '<tr  id="1perc_kf'+$r+'">'+
                            '<td rowspan="4">'+
                                '<input type="hidden" name="ket'+$r+'" value="'+$ket+'" style="width:20px">'+
                                '<input type="text" name="statper<?= $no;?>" value="'+$statper+'" style="width:20px">'+
                                '<input type="hidden" id="no'+$r+'" class="row_efisiensi"'+
                                'value="'+$r+'" readonly>'+
                                '<center>'+parseInt($r+1)+'</center>'+
                            '</td>'+
                            '<td rowspan="4">'+
                                '<input type="hidden" id="cust'+$r+'" class="row_efisiensi"'+
                                'value="'+ $("#cust"+$r).val()+'" readonly>'+
                                '<center>'+ $("#cust"+$r).val()+'</center>'+
                            '</td>'+
                            '<td rowspan="4">'+
                                '<input type="hidden" name="id_bg3'+$r+'" value="'+$("#id_bg3"+$r).val()+'" style="width:50px">'+
                                '<input type="hidden" id="produk'+$r+'" class="row_efisiensi"'+
                                'value="'+$("#produk"+$r).val()+'">'+
                                '<center>'+$("#produk"+$r).val()+'</center>'+
                            '</td>'+
                            '<td rowspan="4">'+
                                '<input type="hidden" id="qty'+$r+'" class="row_efisiensi"'+
                                'value="'+$("#qty"+$r).val()+'">'+
                                '<center>'+$("#qty"+$r).val()+'</center>'+
                            '</td>'+
                        '</tr>'+
                        $lines+
                        '<input type="hidden" name="jumlah_line'+$r+'" value="'+($("#jumlah_line"+$r).val()-1)+'">';
                    }
                    else{
                        if($statper == 0){
                            $lines = "";

                            for($y=1;$y<=$jumlah_line_dpo;$y++){
                                $id_line = $("#"+$r+'id_line'+$y).val();
                                $inputan="";

                                for($u=1;$u<=7;$u++){
                                    $inputan = $inputan +
                                    '<td>'+
                                        '<center>'+$("#jm"+$r+$id_line+'day'+$u).val()+'</center>'+
                                        '<input name="'+"jm"+$r+$id_line+'day'+$u+'"'+
                                        'value="'+$("#jm"+$r+$id_line+'day'+$u).val()+'"'+
                                        'type="hidden" class="input_line_pp"'+
                                        '>'+
                                        '<input name="'+"ef"+$r+$id_line+'day'+$u+'"'+
                                        'value="'+$("#ef"+$r+$id_line+'day'+$u).val()+'"'+
                                        'type="hidden" class="input_line_pp"'+
                                        '>'+
                                    '</td>';
                                }

                                $idline = $("#"+$r+'id_line'+$y).val();
                                $nmline = $("#"+$r+'nama_line'+$idline).val();
                                $show   = $("#"+$r+'nama_line'+$idline).val();

                                $lines = $lines+
                                '<tr>'+
                                    '<td>'+
                                        '<input type="hidden" name="'+$r+'id_line_kf'+$y+'"  class="row_efisiensi" value="'+$idline+'">'+
                                        '<input type="hidden" class="row_efisiensi" value="'+$nmline+'">'+
                                        '<center>'+$show+'</center>'+
                                    '</td>'+
                                    $inputan+
                                '</tr>';
                            }

                            $isi_div = $isi_div +
                            '<tr  id="1perc_kf'+$r+'">'+
                                '<td rowspan="5">'+
                                    '<input type="hidden" name="ket'+$r+'" value="'+$ket+'" style="width:20px">'+
                                    '<input type="text" name="statper<?= $no;?>" value="'+$statper+'" style="width:20px">'+
                                    '<input type="hidden" id="no'+$r+'" class="row_efisiensi"'+
                                    'value="'+$r+'" readonly>'+
                                    '<center>'+parseInt($r+1)+'</center>'+
                                '</td>'+
                                '<td rowspan="5">'+
                                    '<input type="hidden" id="cust'+$r+'" class="row_efisiensi"'+
                                    'value="'+ $("#cust"+$r).val()+'" readonly>'+
                                    '<center>'+ $("#cust"+$r).val()+'</center>'+
                                '</td>'+
                                '<td rowspan="5">'+
                                    '<input type="hidden" name="id_bg3'+$r+'" value="'+$("#id_bg3"+$r).val()+'" style="width:50px">'+
                                    '<input type="hidden" id="produk'+$r+'" class="row_efisiensi"'+
                                    'value="'+$("#produk"+$r).val()+'">'+
                                    '<center>'+$("#produk"+$r).val()+'</center>'+
                                '</td>'+
                                '<td rowspan="5">'+
                                    '<input type="hidden" id="qty'+$r+'" class="row_efisiensi"'+
                                    'value="'+$("#qty"+$r).val()+'">'+
                                    '<center>'+$("#qty"+$r).val()+'</center>'+
                                '</td>'+
                            '</tr>'+
                            $lines+
                            '<input type="hidden" name="jumlah_line'+$r+'" value="'+($("#jumlah_line"+$r).val()-1)+'">';
                        } else{
                            $lines = "";

                            for($y=1;$y<=$jumlah_line_dpo;$y++){
                                $id_line = $("#"+$r+'id_line'+$y).val();
                                $inputan="";

                                for($u=1;$u<=7;$u++){
                                    $inputan = $inputan +
                                    '<td>'+
                                        '<center>'+$("#jm"+$r+$id_line+'day'+$u).val()+'</center>'+
                                        '<input name="'+"jm"+$r+$id_line+'day'+$u+'"'+
                                        'value="'+$("#jm"+$r+$id_line+'day'+$u).val()+'"'+
                                        'type="hidden" class="input_line_pp"'+
                                        '>'+
                                        '<input name="'+"ef"+$r+$id_line+'day'+$u+'"'+
                                        'value="'+$("#ef"+$r+$id_line+'day'+$u).val()+'"'+
                                        'type="hidden" class="input_line_pp"'+
                                        '>'+
                                    '</td>';
                                }

                                $idline = $("#"+$r+'id_line'+$y).val();
                                $nmline = $("#"+$r+'nama_line'+$idline).val();
                                $show   = $("#"+$r+'nama_line'+$idline).val();

                                $lines = $lines+
                                    '<td>'+
                                        '<input type="hidden" name="'+$r+'id_line_kf'+$y+'"  class="row_efisiensi" value="'+$idline+'">'+
                                        '<input type="hidden" class="row_efisiensi" value="'+$nmline+'">'+
                                        '<center>'+$show+'</center>'+
                                    '</td>'+
                                    $inputan;
                            }

                            $isi_div = $isi_div +
                            '<tr  id="1perc_kf'+$r+'">'+
                                '<td>'+
                                    '<input type="hidden" name="ket'+$r+'" value="'+$ket+'" style="width:20px">'+
                                    '<input type="text" name="statper'+$r+'" value="'+$statper+'" style="width:20px">'+
                                    '<input type="hidden" id="no'+$r+'" class="row_efisiensi"'+
                                    'value="'+$r+'" readonly>'+
                                    '<center>'+parseInt($r+1)+'</center>'+
                                '</td>'+
                                '<td>'+
                                    '<input type="hidden" id="cust'+$r+'" class="row_efisiensi"'+
                                    'value="'+ $("#cust"+$r).val()+'" readonly>'+
                                    '<center>'+ $("#cust"+$r).val()+'</center>'+
                                '</td>'+
                                '<td>'+
                                    '<input type="hidden" name="id_bg3'+$r+'" value="'+$("#id_bg3"+$r).val()+'" style="width:50px">'+
                                    '<input type="text" name="id_pt_bg3'+$r+'" value="'+$("#id_pt_bg3"+$r).val()+'" style="width:50px">'+
                                    '<input type="hidden" id="produk'+$r+'" class="row_efisiensi"'+
                                    'value="'+$("#produk"+$r).val()+'">'+
                                    '<center>'+$("#produk"+$r).val()+'</center>'+
                                '</td>'+
                                '<td>'+
                                    '<input type="hidden" id="qty'+$r+'" class="row_efisiensi"'+
                                    'value="'+$("#qty"+$r).val()+'">'+
                                    '<center>'+$("#qty"+$r).val()+'</center>'+
                                '</td>'+
                                $lines+
                            '</tr>'+
                            '<input type="hidden" name="jumlah_line'+$r+'" value="'+($("#jumlah_line"+$r).val()-1)+'">';
                        }
                    } 
                }
                //kalau div nda ada perencanaan
                else{
                    if($jumlah_line_dpo == 3){
                        $lines = "";

                        for($y=1;$y<=$jumlah_line_dpo;$y++){
                            $id_line = $("#"+$r+'id_line'+$y).val();
                            $inputan="";

                            for($u=1;$u<=7;$u++){
                                $inputan = $inputan +
                                '<td>'+
                                    '<input name="'+"jm"+$r+$id_line+'day'+$u+'"'+
                                    'value="'+$("#jm"+$r+$id_line+'day'+$u).val()+'"'+
                                    'type="text" class="input_line_pp"'+
                                    '>'+
                                    '<input name="'+"ef"+$r+$id_line+'day'+$u+'"'+
                                    'value="'+$("#ef"+$r+$id_line+'day'+$u).val()+'"'+
                                    'type="text" class="input_line_pp"'+
                                    '>'+
                                '</td>';
                            }

                            $idline = $("#"+$r+'id_line'+$y).val();
                            $nmline = $("#"+$r+'nama_line'+$idline).val();
                            $show   = $("#"+$r+'nama_line'+$idline).val();

                            $lines = $lines+
                            '<tr style="display:none">'+
                                '<td>'+
                                    '<input type="text" class="row_efisiensi" value="'+$idline+'">'+
                                    '<input type="hidden" class="row_efisiensi" value="'+$nmline+'">'+
                                    '<center>'+$show+'</center>'+
                                '</td>'+
                                $inputan+
                            '</tr>';
                        }


                        $isi_div = $isi_div +
                        '<tr  id="1perc_kf'+$r+'" style="display:none">'+
                            '<td rowspan="4">'+
                                '<input type="hidden" name="ket'+$r+'" value="'+$ket+'" style="width:20px">'+
                                '<input type="text" id="statper<?= $no;?>" value="'+$statper+'" style="width:20px">'+
                                '<input type="hidden" id="no'+$r+'" class="row_efisiensi"'+
                                'value="'+$r+'" readonly>'+
                                '<center>'+parseInt($r+1)+'</center>'+
                            '</td>'+
                            '<td rowspan="4">'+
                                '<input type="hidden" id="cust'+$r+'" class="row_efisiensi"'+
                                'value="'+ $("#cust"+$r).val()+'" readonly>'+
                                '<center>'+ $("#cust"+$r).val()+'</center>'+
                            '</td>'+
                            '<td rowspan="4">'+
                                '<input type="hidden" id="id_bg3'+$r+'" value="'+$("#id_bg3"+$r).val()+'" style="width:50px">'+
                                '<input type="hidden" id="produk'+$r+'" class="row_efisiensi"'+
                                'value="'+$("#produk"+$r).val()+'">'+
                                '<center>'+$("#produk"+$r).val()+'</center>'+
                            '</td>'+
                            '<td rowspan="4">'+
                                '<input type="hidden" id="qty'+$r+'" class="row_efisiensi"'+
                                'value="'+$("#qty"+$r).val()+'">'+
                                '<center>'+$("#qty"+$r).val()+'</center>'+
                            '</td>'+
                        '</tr>'+
                        $lines+
                        '<input type="hidden" name="jumlah_line'+$r+'" value="'+($("#jumlah_line"+$r).val()-1)+'">';
                    }
                    else{
                        $lines = "";

                        for($y=1;$y<=$jumlah_line_dpo;$y++){
                            $id_line = $("#"+$r+'id_line'+$y).val();
                            $inputan="";

                            for($u=1;$u<=7;$u++){
                                $inputan = $inputan +
                                '<td>'+
                                    '<input name="'+"jm"+$r+$id_line+'day'+$u+'"'+
                                    'value="'+$("#jm"+$r+$id_line+'day'+$u).val()+'"'+
                                    'type="text" class="input_line_pp"'+
                                    '>'+
                                    '<input name="'+"ef"+$r+$id_line+'day'+$u+'"'+
                                    'value="'+$("#ef"+$r+$id_line+'day'+$u).val()+'"'+
                                    'type="text" class="input_line_pp"'+
                                    '>'+
                                '</td>';
                            }

                            $idline = $("#"+$r+'id_line'+$y).val();
                            $nmline = $("#"+$r+'nama_line'+$idline).val();
                            $show   = $("#"+$r+'nama_line'+$idline).val();

                            $lines = $lines+
                            '<tr style="display:none">'+
                                '<td>'+
                                    '<input type="text" name="idline'+$y+'" class="row_efisiensi" value="'+$idline+'">'+
                                    '<input type="hidden" class="row_efisiensi" value="'+$nmline+'">'+
                                    '<center>'+$show+'</center>'+
                                '</td>'+
                                $inputan+
                            '</tr>';
                        }

                        $isi_div = $isi_div +
                        '<tr  id="1perc_kf'+$r+'" style="display:none">'+
                            '<td rowspan="5">'+
                                '<input type="hidden" name="ket'+$r+'" value="'+$ket+'" style="width:20px">'+
                                '<input type="text" id="statper<?= $no;?>" value="'+$statper+'" style="width:20px">'+
                                '<input type="hidden" id="no'+$r+'" class="row_efisiensi"'+
                                'value="'+$r+'" readonly>'+
                                '<center>'+parseInt($r+1)+'</center>'+
                            '</td>'+
                            '<td rowspan="5">'+
                                '<input type="hidden" id="cust'+$r+'" class="row_efisiensi"'+
                                'value="'+ $("#cust"+$r).val()+'" readonly>'+
                                '<center>'+ $("#cust"+$r).val()+'</center>'+
                            '</td>'+
                            '<td rowspan="5">'+
                                '<input type="hidden" id="id_bg3'+$r+'" value="'+$("#id_bg3"+$r).val()+'" style="width:50px">'+
                                '<input type="hidden" id="produk'+$r+'" class="row_efisiensi"'+
                                'value="'+$("#produk"+$r).val()+'">'+
                                '<center>'+$("#produk"+$r).val()+'</center>'+
                            '</td>'+
                            '<td rowspan="5">'+
                                '<input type="hidden" id="qty'+$r+'" class="row_efisiensi"'+
                                'value="'+$("#qty"+$r).val()+'">'+
                                '<center>'+$("#qty"+$r).val()+'</center>'+
                            '</td>'+
                        '</tr>'+
                        $lines+
                        '<input type="hidden" name="jumlah_line'+$r+'" value="'+($("#jumlah_line"+$r).val()-1)+'">';;
                    } 

                }
        }


        $tam_isinya = 
        '<table class="table table-bordered table-striped mb-none table_efisiensi_pp" id="datatable-default">'+
            '<tr>'+
                '<th class="col-xx-1"><center>No</center></th>'+
                '<th class="col-md-1"><center>Cust</center></th>'+
                '<th class="col-md-3"><center>Produk</center></th>'+
                '<th class="col-xx-1"><center>Qty</center></th>'+
                '<th class="col-md-1"><center>Line</center></th>'+

                '<div class="col-md-7">'+
                $tanggal_atas+
                '</div>'+
            '</tr>'+
            $isi_div+
        '</table>';
        $("#isi_perc_kf").html($tam_isinya);
    }
</script>
