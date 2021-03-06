<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Master Data Produk</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Master Data Produk</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <?php if(($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Research and Development") 
        || ($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management")
        || ($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management")){?>
            <a class="modal-with-form col-lg-2  btn btn-success" id="button_tambah" 
                href="#modaltambah">+ Produk</a>
            <br><br>
        <?php } ?>

        <header class="panel-heading">
            <h2 class="panel-title">Data Produk</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Jenis Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Keterangan Produk</th>
                        <th style="text-align: center;vertical-align: middle;">Keterangan Produksi</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($produk as $x){ 
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_jenis_produk;?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $x->nama_produk; ?></td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $ukwar = "";
                                    foreach($detail_produk as $dp){
                                        if($dp->id_produk == $x->id_produk){
                                            if($dp->keterangan == 0){
                                                $ukwar = "Memiliki Warna & Ukuran";
                                            }
                                            else if ($dp->keterangan == 1){
                                                $ukwar = "Memiliki Ukuran";
                                            }
                                            else if($dp->keterangan == 2){
                                                $ukwar = "Memiliki Warna";
                                            }
                                            else{
                                                $ukwar = "Tidak Memiliki Warna & Ukuran";
                                            }
                                        }
                                    } 
                                    echo $ukwar;
                                ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php if($x->keterangan_produksi == 0){
                                        echo "Full Produksi";
                                    } else{
                                        echo "Purchase Cover";
                                    }
                                ?>
                            </td>   
                            <td>
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" style="margin-right:5px;margin-bottom:5px"
                                    id="bdet<?php echo $x->id_produk;?>" value="<?php echo $x->id_produk;?>" title="Detail"></button>

                                <?php if(($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Research & Development") 
                                || ($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management")
                                || ($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" )){?>
                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" style="margin-right:5px;margin-bottom:5px"
                                        id="bedit<?php echo $x->id_produk;?>" value="<?php echo $x->id_produk;?>" title="Edit"></button>
                                    <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o" style="margin-right:5px;margin-bottom:5px"
                                        title="Delete" href="#modalhapus<?= $x->id_produk;?>"></a>
                                    <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                                        title="Log" id="blog<?php echo $x->id_produk?>" value="<?php echo $x->id_produk;?>" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php 
                    $no++;
                    ?>

<div id="modalhapus<?= $x->id_produk;?>" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>produk/delete_produk">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Produk</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <input type="hidden" name="id_produk" value="<?= $x->id_produk;?>">
                                <p>Apakah anda yakin akan menghapus data produk dengan nama produk <?= $x->nama_produk?>?</p>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" class="btn btn-primary" value="Hapus">
                                <button class="btn btn-default modal-dismiss">Batal</button>
                            </div>
                        </div>
                    </footer>
            </section>
        </form>

</div>
                    <?php
                    } 
                    ?>
                    </tbody>
	        </table>
        </div>
    </div>
    
    <div id='modaltambah' class="modal-block modal-block-lg mfp-hide" style="width:70%">
        <form method="POST" action="<?= base_url()?>produk/tambah_produk"> 
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Produk</h2>
                </header>
                
                <div class="panel-body">
                    <h4><b>Data Produk</b></h4>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jenis Produk</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="jenis_produk" id="jenis_produk"  onchange="ketprod()">
                                <?php foreach($jenis_produk as $jp){?>
                                    <option value="<?= $jp->id_jenis_produk?>"><?= $jp->nama_jenis_produk?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text"  name="nama_produk_input" id="nama_produk_input" 
                            onchange="cek_nama_produk_input()"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Harga Produk (Rp)</label>
                        <div class="col-sm-7">
                            <input type="number"  name="harga_produk" id="harga_produk" 
                            class="form-control" onchange="cek_terisi()">
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan Produk</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="keterangan_produk" id="keterangan_produk"  onchange="ketprod()">
                                <option value="-">Pilih Keterangan Produk</option>
                                <option value="0">Memiliki ukuran & warna</option>
                                <option value="1">Memiliki ukuran</option>
                                <option value="2">Memiliki warna</option>
                                <option value="3">Tidak memiliki ukuran & warna</option>
                            </select>
                        </div>
                    </div>
                    <div id="tab_ketprod3" style="display:none">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Kode Produk</label>
                            <div class="col-sm-7">
                                <input type="text"  name="kode_produk" id="kode_produk" onchange="cek_kode_produk_input()"
                                class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div id="isi_ketprod"></div>

                    <div id="table_ketprod"></div>
                    <input type="hidden" id="jm_ketpod" value="0">
                    <br>
                    
                    <div id="tab_ketprod0" style="display:none">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>
                                    <th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>
                                    <th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>
                                    <th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="tab_ketprod1" style="display:none">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>
                                    <th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>
                                    <th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div id="tab_ketprod2" style="display:none">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>
                                    <th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>
                                    <th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <input type="hidden" name="jumlah_uw0" id="jumlah_uw0">
                    <input type="hidden" name="jumlah_uw1" id="jumlah_uw1">
                    <input type="hidden" name="jumlah_uw2" id="jumlah_uw2">
                             
                    <hr>
                    <h4><b>Data Cycle Time</b></h4>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan Produksi</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="keterangan" id="keterangan"
                            onchange="show_div_ct()">
                                <option value="1">Purchase Cover</option>
                                <option value="0">Full Produksi</option>
                            </select>
                        </div>
                    </div>
                    <section id="div_ct_pc">
                        <?php 
                        $no = 1;
                        foreach($line as $x){
                            if($x->nama_line != "Line Sewing"){?>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Cycle Time <?= $x->nama_line;?> (s)</label>
                                <div class="col-sm-7">
                                    <input type="hidden" name="lnpc_<?= $no; ?>" id="pc_ln<?= $no;?>" value="<?= $x->id_line;?>" class="form-control">
                                    <input type="number" min="1" name="ctpc_<?= $no; ?>" id="pc_ct<?= $no;?>" class="form-control" onchange="cek_terisi()">
                                </div>
                            </div>
                        <?php $no++;} }?>
                        <input type ="hidden" name="jumlah_line_pc" value="<?= $no-1; ?>"> 
                    </section>
                    <section id="div_ct_full" style="display:none">
                        <?php 
                        $no = 1;
                        foreach($line as $x){?>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Cycle Time <?= $x->nama_line;?> (s)</label>
                                <div class="col-sm-7">
                                    <input type="hidden" name="lnfull_<?= $no; ?>" id="fp_ln<?= $no;?>" value="<?= $x->id_line;?>" class="form-control">
                                    <input type="number" min="1" name="ctfull_<?= $no; ?>" id="fp_ct<?= $no; ?>" class="form-control" onchange="cek_terisi()">
                                </div>
                            </div>
                        <?php $no++; }?>
                        <input type ="hidden" name="jumlah_line_full" value="<?= $no-1; ?>"> 
                    </section>

                    <hr>
                    <h4><b>Data Konsumsi Material</b></h4>
                   
                    <div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="jenis_material" id="jenis_material"
                            onchange="ganti_jm()">
                                <option value="Jenis Material">Jenis Material</option>
                                <?php foreach($jenis_material as $jm){?>
                                    <option value="<?= $jm->id_jenis_material;?>">
                                        <?= $jm->nama_jenis_material;?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-5 form-group" id="ganti_nm">
                            <select class="form-control" name="nama_material" id="nama_material">
                                <option value="Nama Material">Nama Material</option>
                            </select>
                        </div>
                        <div id="satuan_konsumsi"></div>
    
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="line" id="line"
                            >
                                <option value="Nama Line">Nama Line</option>
                                <?php 
                                    $m=1;
                                    foreach($line as $l){
                                        if($l->nama_line == "Line Sewing"){
                                ?> 
                                    <option id="idline_select<?= $m?>" value="<?= $l->id_line;?>" disabled>
                                        <?= $l->nama_line;?>
                                    </option>
                                <?php } else{?>
                                    <option id="idline_select<?= $m?>" value="<?= $l->id_line;?>">
                                        <?= $l->nama_line;?>
                                    </option>
                                <?php } $m++; } ?>
                            </select>
                            <?php foreach ($line as $l){?>
                                <input type="hidden" id="nmline<?= $l->id_line?>"
                                value="<?= $l->nama_line?>">
                            <?php } ?>
                        </div>
    
                        <div class="col-md-1 form-group">
                            <button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"
                            title="Add"  onclick="add_material()"></button>
                        </div>
                        <br>
                    </div>
                    <br>
                    
                    <div id="konsumsi_material">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>
                                    <th class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Material</th>
                                    <th class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Line</th>
                                    <th class="col-md-3" style="text-align: center;vertical-align: middle;">Jumlah Material</th>
                                    <th class="col-md-3" style="text-align: center;vertical-align: middle;">Satuan Konsumsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <input type="hidden" name="jumlah_km" id="jumlah_km">
                    <input type="hidden" id="pc_cek_line1" value="0"><input type="hidden" id="pc_cek_line2" value="0"><input type="hidden" id="pc_cek_line3" value="0">
                    <input type="hidden" id="fp_cek_line1" value="0"><input type="hidden" id="fp_cek_line2" value="0"><input type="hidden" id="fp_cek_line3" value="0"><input type="hidden" id="fp_cek_line4" value="0">
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-primary"  id="simpan" value="Simpan" disabled>
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:60%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Produk</b></h4>
                </div>
                <div class="modal-body">
                <h5><b>Data Produk</b></h5>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Jenis Produk</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="djenis_produk" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Produk</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                id="dnama_produk" readonly>
                            </div>
                        </div>
                        <?php if(($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Research & Development") 
                            || ($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management")
                            || ($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" )){?>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Harga Produk (Rp)</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control"
                                    id="dharga_produk" readonly>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Detail Produk</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control"
                                id="ddetail_produk" readonly>
                            </div>
                        </div>
                        <div id="dtable_detprod"></div>

                        <hr>
                        <h5><b>Data Cycle Time Produksi</b></h5>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan Produksi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="dketerangan_produksi" readonly>
                            </div>
                        </div>
                        
                        <div id="dtable_ct"></div>

                        <hr>
                        <h5><b>Data Konsumsi Material</b></h5>

                        <div id="dtable_km"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modaledit" role="dialog">
        <form method="POST" action="<?= base_url()?>produk/edit_produk">
            <div class="modal-dialog modal-xl" style="width:70%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Produk</b></h4>
                    </div>
                    <div class="modal-body">
                            <h4><b>Data Produk</b></h4>
                            <div id="ediv_jenprod"></div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nama Produk</label>
                                <div class="col-sm-7">
                                    <input type="text"  name="nama_produk_edit" id="nama_produk_edit" 
                                    onchange="cek_nama_produk_edit()"  class="form-control" required>
                                    <input type="hidden"  name="nama_produk_sebelum" id="nama_produk_sebelum" class="form-control">
                                    <input type="hidden" name="id_produk_edit" id="id_produk_edit">
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Harga Produk (Rp)</label>
                                <div class="col-sm-7">
                                    <input type="number"  name="harga_produk_edit" id="harga_produk_edit" 
                                    class="form-control" onchange="cek_terisi()" required>
                                    <input type="hidden"  name="harga_produk_sebelum" id="harga_produk_sebelum" class="form-control">
                                </div>
                            </div>
                            <div id="ediv_ketwar"></div>
                            <div id="ediv_kode3"></div>
                            <br>
                            <div id="ediv_pilih_ukwar"></div>
                            
                            <br>
                            <div id="etab_ketprod"></div>
                            <input type="hidden" id="ejumlah_ukprod" name="ejumlah_ukprod">
                            
                            <hr>
                            <h4><b>Data Cycle Time Produksi</b></h4>
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Keterangan Produksi</label>
                                <div class="col-sm-7">
                                    <input type="hidden" class="form-control" id="keterangan_produksi_edit" name="keterangan_produksi_edit" readonly>
                                    <input type="text" class="form-control" id="eketerangan_produksi" readonly>
                                </div>
                            </div>

                            <div id="etable_ct"></div>
                            
                            <hr>
                            <h4><b>Data Konsumsi Material</b></h4>
                        
                            <div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">
                                <div class="col-md-3 form-group">
                                    <select class="form-control" name="ejenis_material" id="ejenis_material"
                                    onchange="ganti_jm_edit()">
                                        <option value="Jenis Material">Jenis Material</option>
                                        <?php foreach($jenis_material as $jm){?>
                                            <option value="<?= $jm->id_jenis_material;?>">
                                                <?= $jm->nama_jenis_material;?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-5 form-group" id="eganti_nm">
                                    <select class="form-control" name="enama_material" id="enama_material">
                                        <option value="Nama Material">Nama Material</option>
                                    </select>
                                </div>
                                <div id="esatuan_konsumsi"></div>
            
                                <div class="col-md-3 form-group">
                                    <div id="pilih_line"></div>
                                    <?php foreach ($line as $l){?>
                                        <input type="hidden" id="enmline<?= $l->id_line?>"
                                        value="<?= $l->nama_line?>">
                                    <?php } ?>
                                </div>
            
                                <div class="col-md-1 form-group">
                                    <button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"
                                    title="Add"  onclick="add_material_edit()"></button>
                                </div>

                                <br>
                            </div>
                            
                            <br>
                            <div id="etable_km"></div>
                            <input type="hidden" name="ejumlah_km" id="ejumlah_km">

                            
                            </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <button type="button" class="btn btn-default" onclick="reload()">Batal</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal" id="modallog" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Produk</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_terpilih">

                    <table>
                        <tr>
                            <td class="col-md-6">
                                <center>
                                    <b>Input Date:</b><span id="input_date"></span>
                                </center>
                            </td>
                            <td class="col-md-6">
                                <center>
                                    <b>User Input:</b><span id="input_user"></span>
                                </center>
                            </td>
                        </tr>
                    </table>

                    <div id="isi_log">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
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

<!-- ketika keterangan cycle_time diganti -->
<script>
	function show_div_ct(){
		var keterangan = $('#keterangan').val();
		if(keterangan === '0'){
			$('#div_ct_full').show();
            $('#div_ct_pc').hide();

            for($i=1;$i<=4;$i++){
                $idline_select = $("#idline_select"+$i).val();
                
                $count_idline = 0;
                for($k=1;$k<=4;$k++){
                    $idline = $("#fp_ln"+$k).val();

                    if($idline == $idline_select){
                        $count_idline++;
                    }
                }

                if($count_idline > 0){
                    $("#idline_select"+$i).prop('disabled',false);
                } else{
                    $("#idline_select"+$i).prop('disabled',true);
                }
            }
		}
		else{
            $('#div_ct_full').hide();
            $('#div_ct_pc').show();

            
            for($i=1;$i<=4;$i++){
                $idline_select = $("#idline_select"+$i).val();
                
                $count_idline = 0;
                for($k=1;$k<=3;$k++){
                    $idline = $("#pc_ln"+$k).val();

                    if($idline == $idline_select){
                        $count_idline++;
                    }
                }

                if($count_idline > 0){
                    $("#idline_select"+$i).prop('disabled',false);
                } else{
                    $("#idline_select"+$i).prop('disabled',true);
                }
                //alert($idline);
            }
		}
        cek_terisi();
	}
</script>

<!-- fungsi cek -->
<script>
    function cek(){
        var id_warna   = $("#warna").val();

        $("#"+id_warna).val("Selected");
        document.getElementById("div"+id_warna).style.display = "block";
        //alert(id_warna);
    }
</script>

<script>
    $('.btn_klik').click(function(){
            //id button yang mau di unselect
            var id = $(('#btn')+$(this).attr('value')).val();

            $("#"+id).val("Not-Selected");
            document.getElementById("div"+id).style.display = "none";
    });
</script>

<!-- cek nama produk ketika (+produk) -->
<script>
    function cek_nama_produk_input(){
        var nama_produk_input = $("#nama_produk_input").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/cek_nama_produk_input",
            dataType: "JSON",
            data: {nama_produk_input:nama_produk_input},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, produk dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });

        cek_terisi();
    }
</script>

<!-- cek kode produk ketika (+produk) jika statusnya 3 -->
<script>
    function cek_kode_produk_input(){
        var kode_produk = $("#kode_produk").val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/cek_kode_produk_input",
            dataType: "JSON",
            data: {kode_produk:kode_produk},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, kode produk tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });

        cek_terisi();
    }
</script>

<!-- ganti keterangan produk (+produk) -->
<script>
    function ketprod(){
        var ketprod = $("#keterangan_produk").val();
        var id_jenis_produk = $("#jenis_produk").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/get_ukprod_warna",
            dataType: "JSON",
            data: {id_jenis_produk:id_jenis_produk},

            success: function(respond){ 
                if(ketprod == 0){
                    $isi_ukuran = "";
                    for($i=0;$i<respond['jm_ukprod'];$i++){
                        $isi_ukuran = $isi_ukuran + 
                        '<option value="'+respond['ukprod'][$i]['id_ukuran_produk']+'">'+
                            respond['ukprod'][$i]['ukuran_produk']+ respond['ukprod'][$i]['satuan_ukuran']+
                        '</option>';
                    }
                    $ukuran = 
                    '<div class="col-md-5 form-group">'+
                        '<select class="form-control" name="select_ukuran" id="select_ukuran"'+
                        '>'+
                            '<option value="">Ukuran Produk</option>'+
                            $isi_ukuran+
                        '</select>'+
                    '</div>';

                    $isi_warna = "";
                    for($i=0;$i<respond['jm_warna'];$i++){
                        $isi_warna = $isi_warna + 
                        '<option value="'+respond['warna'][$i]['id_warna']+'">'+
                            respond['warna'][$i]['nama_warna']+
                        '</option>';
                    }
                    $warna = 
                    '<div class="col-md-5 form-group">'+
                        '<select class="form-control" name="select_warna" id="select_warna"'+
                        '>'+
                            '<option value="">Warna Produk</option>'+
                            $isi_warna+
                        '</select>'+
                    '</div>';

                    $isi = 
                    '<div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">'+
                        $ukuran+
                        $warna+
                        '<div class="col-md-2 form-group">'+
                            '<button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"'+
                            'title="Add"  onclick="add_ukwar()"></button>'+
                        '</div>'+
                    '</div>';

                    $("#isi_ketprod").html($isi);
                    $("#tab_ketprod0").show();
                    $("#tab_ketprod1").hide();
                    $("#tab_ketprod2").hide();
                    $("#tab_ketprod3").hide();
                }
                else if(ketprod == 1){
                    $isi_ukuran = "";
                    for($i=0;$i<respond['jm_ukprod'];$i++){
                        $isi_ukuran = $isi_ukuran + 
                        '<option value="'+respond['ukprod'][$i]['id_ukuran_produk']+'">'+
                            respond['ukprod'][$i]['ukuran_produk']+ respond['ukprod'][$i]['satuan_ukuran']+
                        '</option>';
                    }
                    $ukuran = 
                    '<div class="col-md-3 form-group">'+
                        '<select class="form-control" name="select_ukuran" id="select_ukuran"'+
                        '>'+
                            '<option value="">Ukuran Produk</option>'+
                            $isi_ukuran+
                        '</select>'+
                    '</div>';

                    $isi = 
                    '<div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">'+
                        $ukuran+
                        '<div class="col-md-1 form-group">'+
                            '<button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"'+
                            'title="Add"  onclick="add_ukwar()"></button>'+
                        '</div>'+
                    '</div>';

                    $("#isi_ketprod").html($isi);
                    $("#tab_ketprod1").show();
                    $("#tab_ketprod0").hide();
                    $("#tab_ketprod2").hide();
                    $("#tab_ketprod3").hide();
                }
                else if(ketprod == 2){
                    $isi_warna = "";
                    for($i=0;$i<respond['jm_warna'];$i++){
                        $isi_warna = $isi_warna + 
                        '<option value="'+respond['warna'][$i]['id_warna']+'">'+
                            respond['warna'][$i]['nama_warna']+
                        '</option>';
                    }
                    $warna = 
                    '<div class="col-md-3 form-group">'+
                        '<select class="form-control" name="select_warna" id="select_warna"'+
                        '>'+
                            '<option value="">Warna Produk</option>'+
                            $isi_warna+
                        '</select>'+
                    '</div>';

                    $isi = 
                    '<div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">'+
                        $warna+
                        '<div class="col-md-1 form-group">'+
                        '<button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"'+
                        'title="Add"  onclick="add_ukwar()"></button>'+
                    '</div>'+
                    '</div>';

                    $("#isi_ketprod").html($isi);
                    $("#tab_ketprod2").show();
                    $("#tab_ketprod1").hide();
                    $("#tab_ketprod0").hide();
                    $("#tab_ketprod3").hide();
                }
                else if(ketprod == 3){
                    $("#isi_ketprod").html("");
                    $("#tab_ketprod0").hide();
                    $("#tab_ketprod1").hide();
                    $("#tab_ketprod2").hide();
                    $("#tab_ketprod3").show();
                }
                else{
                    $("#isi_ketprod").html("");
                    $("#tab_ketprod0").hide();
                    $("#tab_ketprod1").hide();
                    $("#tab_ketprod2").hide();
                    $("#tab_ketprod3").hide();
                }


                //isi table 0 awal
                $tab0 =
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                        '</tr>'+
                    '</thead>'+
                '</table>';

                //isi table 1 awal
                $tab1 =
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                        '</tr>'+
                    '</thead>'+
                '</table>';

                //isi table 2 awal
                $tab2 =
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                        '</tr>'+
                    '</thead>'+
                '</table>';

                $("#tab_ketprod0").html($tab0);
                $("#tab_ketprod1").html($tab1);
                $("#tab_ketprod2").html($tab2);

                $("#jumlah_uw0").val("");
                $("#jumlah_uw1").val("");
                $("#jumlah_uw2").val("");

                $("#jm_ketpod").val(0);
                cek_terisi();
            }
        });
    }
</script>

<!-- add ukuran & warna (+produk) -->
<script>
    function add_ukwar(){
        //0,1,2 or 3
        $keterangan = $("#keterangan_produk").val();
        $jm_ketpod  = $("#jm_ketpod").val();

        if($keterangan == 0){
            $ukuran = $("#select_ukuran").val();
            $warna  = $("#select_warna").val();

            if($ukuran != "" && $warna != ""){
                $jumlah_uw = $("#jumlah_uw0").val();
                $lama = "";
                $tampung_isi = "";
                var id_jenis_produk = $("#jenis_produk").val();

                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>produk/get_ukprod_warna",
                    dataType: "JSON",
                    data: {id_jenis_produk:id_jenis_produk},

                    success: function(respond){
                        for($i=0;$i<respond['jm_ukprod'];$i++){
                            if(respond['ukprod'][$i]['id_ukuran_produk'] == $ukuran){
                                $nama_ukuran = respond['ukprod'][$i]['ukuran_produk'] +" "+respond['ukprod'][$i]['satuan_ukuran'];
                            }
                        }

                        for($i=0;$i<respond['jm_warna'];$i++){
                            if(respond['warna'][$i]['id_warna'] == $warna){
                                $nama_warna = respond['warna'][$i]['nama_warna'];
                            }
                        }

                        //kalau sebelumnya belum ada
                        if($jumlah_uw == 0){
                            $jumlah_saat_ini = 1;

                            $tampung_isi = 
                            '<div id="divuw'+$jumlah_saat_ini+'">'+
                                '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $jumlah_saat_ini+
                                        '<input type="hidden" id="0ket'+$jumlah_saat_ini+'" value="0">'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="text" class="form-control" id="0kp'+$jumlah_saat_ini+'" name="0kp'+$jumlah_saat_ini+'">'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="0id_ukuran'+$jumlah_saat_ini+'" id="0id_ukuran'+$jumlah_saat_ini+'" value="'+$ukuran+'">'+
                                        '<input type="hidden" name="0nama_ukuran'+$jumlah_saat_ini+'" id="0nama_ukuran'+$jumlah_saat_ini+'" value="'+$nama_ukuran+'">'+
                                        $nama_ukuran+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="0id_warna'+$jumlah_saat_ini+'"  id="0id_warna'+$jumlah_saat_ini+'" value="'+$warna+'">'+
                                        '<input type="hidden" name="0nama_warna'+$jumlah_saat_ini+'"  id="0nama_warna'+$jumlah_saat_ini+'" value="'+$nama_warna+'">'+
                                        $nama_warna+
                                    '</td>'+
                                '</tr>'+
                            '</div>';

                            $("#jumlah_uw0").val($jumlah_uw+1);
                            $("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                        }
                        else{
                            $jumlah_uw   = $("#jumlah_uw0").val();
                            $jumlah_uw_l = $jumlah_uw.length;

                            $hitung = 0;
                            for($i=1;$i<=$jumlah_uw_l;$i++){
                                $id_ukurans = $("#0id_ukuran"+$i).val();
                                $id_warnas  = $("#0id_warna"+$i).val();

                                if($id_ukurans == $ukuran && $id_warnas == $warna){
                                    $hitung++;
                                }
                            }
                            
                            if($hitung == 0){
                                $jumlah_saat_ini = $jumlah_uw_l + 1;

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#0id_ukuran"+$l).val();
                                    $id_warna_sem  = $("#0id_warna"+$l).val();
                                    $nama_ukuran_sem = $("#0nama_ukuran"+$l).val();
                                    $nama_warna_sem  = $("#0nama_warna"+$l).val();
                                    $kode_produk     = $("#0kp"+$l).val();

                                    $lama = $lama +
                                    '<div id="divuw'+$l+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="0ket'+$l+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="0kp'+$l+'" name="0kp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="0id_ukuran'+$l+'" id="0id_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="0nama_ukuran'+$l+'" id="0nama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="0id_warna'+$l+'"  id="0id_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="0nama_warna'+$l+'"  id="0nama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                }
                                    $tampung_isi =
                                    '<div id="divuw'+$jumlah_saat_ini+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $jumlah_saat_ini+
                                                '<input type="hidden" id="0ket'+$jumlah_saat_ini+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="0kp'+$jumlah_saat_ini+'" name="0kp'+$jumlah_saat_ini+'" >'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="0id_ukuran'+$jumlah_saat_ini+'" id="0id_ukuran'+$jumlah_saat_ini+'" value="'+$ukuran+'">'+
                                                '<input type="hidden" name="0nama_ukuran'+$jumlah_saat_ini+'" id="0nama_ukuran'+$jumlah_saat_ini+'" value="'+$nama_ukuran+'">'+
                                                $nama_ukuran+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="0id_warna'+$jumlah_saat_ini+'"  id="0id_warna'+$jumlah_saat_ini+'" value="'+$warna+'">'+
                                                '<input type="hidden" name="0nama_warna'+$jumlah_saat_ini+'"  id="0nama_warna'+$jumlah_saat_ini+'" value="'+$nama_warna+'">'+
                                                $nama_warna+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                
                                    $("#jumlah_uw0").val($jumlah_uw+1);
                                    $("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                            }
                            else{
                                $tampung_isi ="";

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#0id_ukuran"+$l).val();
                                    $id_warna_sem  = $("#0id_warna"+$l).val();
                                    $nama_ukuran_sem = $("#0nama_ukuran"+$l).val();
                                    $nama_warna_sem  = $("#0nama_warna"+$l).val();
                                    $kode_produk     = $("#0kp"+$l).val();

                                    $lama = $lama +
                                    '<div id="divuw'+$l+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="0ket'+$l+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="0kp'+$l+'" name="0kp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="0id_ukuran'+$l+'" id="0id_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="0nama_ukuran'+$l+'" id="0nama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="0id_warna'+$l+'"  id="0id_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="0nama_warna'+$l+'"  id="0nama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                }

                                alert("Mohon maaf, ukuran dan warna tersebut tidak dapat didaftarkan lagi, karena sudah terdaftar");
                            }
                        }

                        $tablenya = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                                '</tr>'+
                            '</thead>'+
                            $lama+
                            $tampung_isi+
                        '</table>';
                        
                        $("#tab_ketprod0").html($tablenya);
                        cek_terisi();
                    }
                });
                
            }
            else{
                alert("Silahkan pilih ukuran dan warna terlebih dahulu");
            }
        }
        else if($keterangan == 1){
            $ukuran = $("#select_ukuran").val();

            if($ukuran != ""){
                
                $jumlah_uw = $("#jumlah_uw1").val();
                $lama = "";
                $tampung_isi = "";
                var id_jenis_produk = $("#jenis_produk").val();

                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>produk/get_ukprod_warna",
                    dataType: "JSON",
                    data: {id_jenis_produk:id_jenis_produk},

                    success: function(respond){
                        for($i=0;$i<respond['jm_ukprod'];$i++){
                            if(respond['ukprod'][$i]['id_ukuran_produk'] == $ukuran){
                                $nama_ukuran = respond['ukprod'][$i]['ukuran_produk'] +" "+respond['ukprod'][$i]['satuan_ukuran'];
                            }
                        }

                        //kalau sebelumnya belum ada
                        if($jumlah_uw == 0){
                            $jumlah_saat_ini = 1;

                            $tampung_isi = 
                            '<div id="divuw'+$jumlah_saat_ini+'">'+
                                '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $jumlah_saat_ini+
                                        '<input type="hidden" id="1ket'+$jumlah_saat_ini+'" value="0">'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="text" class="form-control" id="1kp'+$jumlah_saat_ini+'" name="1kp'+$jumlah_saat_ini+'" >'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="1id_ukuran'+$jumlah_saat_ini+'" id="1id_ukuran'+$jumlah_saat_ini+'" value="'+$ukuran+'">'+
                                        '<input type="hidden" name="1nama_ukuran'+$jumlah_saat_ini+'" id="1nama_ukuran'+$jumlah_saat_ini+'" value="'+$nama_ukuran+'">'+
                                        $nama_ukuran+
                                    '</td>'+
                                '</tr>'+
                            '</div>';

                            $("#jumlah_uw1").val($jumlah_uw+1);
                            $("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                        }
                        else{
                            $jumlah_uw   = $("#jumlah_uw1").val();
                            $jumlah_uw_l = $jumlah_uw.length;

                            $hitung = 0;
                            for($i=1;$i<=$jumlah_uw_l;$i++){
                                $id_ukurans = $("#1id_ukuran"+$i).val();

                                if($id_ukurans == $ukuran){
                                    $hitung++;
                                }
                            }
                            
                            if($hitung == 0){
                                $jumlah_saat_ini = $jumlah_uw_l + 1;

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#1id_ukuran"+$l).val();
                                    $nama_ukuran_sem = $("#1nama_ukuran"+$l).val();
                                    $kode_produk     = $("#1kp"+$l).val();

                                    $lama = $lama +
                                    '<div id="divuw'+$l+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="1ket'+$l+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="1kp'+$l+'" name="1kp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="1id_ukuran'+$l+'" id="1id_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="1nama_ukuran'+$l+'" id="1nama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                }
                                    $tampung_isi =
                                    '<div id="divuw'+$jumlah_saat_ini+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $jumlah_saat_ini+
                                                '<input type="hidden" id="1ket'+$jumlah_saat_ini+'" name="1ket'+$jumlah_saat_ini+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="1kp'+$jumlah_saat_ini+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="1id_ukuran'+$jumlah_saat_ini+'" id="1id_ukuran'+$jumlah_saat_ini+'" value="'+$ukuran+'">'+
                                                '<input type="hidden" name="1nama_ukuran'+$jumlah_saat_ini+'" id="1nama_ukuran'+$jumlah_saat_ini+'" value="'+$nama_ukuran+'">'+
                                                $nama_ukuran+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                
                                    $("#jumlah_uw1").val($jumlah_uw+1);
                                    $("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                            }
                            else{
                                $tampung_isi ="";

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#1id_ukuran"+$l).val();
                                    $nama_ukuran_sem = $("#1nama_ukuran"+$l).val();
                                    $kode_produk     = $("#1kp"+$l).val();

                                    $lama = $lama +
                                    '<div id="divuw'+$l+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="1ket'+$l+'" name="1ket'+$l+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="1kp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="1id_ukuran'+$l+'" id="1id_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="1nama_ukuran'+$l+'" id="1nama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                }

                                alert("Mohon maaf, ukuran tersebut tidak dapat didaftarkan lagi, karena sudah terdaftar");
                            }
                        }
                        

                        $tablenya = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                                '</tr>'+
                            '</thead>'+
                            $lama+
                            $tampung_isi+
                        '</table>';
                        
                        $("#tab_ketprod1").html($tablenya);
                        cek_terisi();
                    }
                });
            }
            else{
                alert("Silahkan pilih ukuran terlebih dahulu");
            }
        }
        else if($keterangan == 2){
            $warna  = $("#select_warna").val();

            if($warna != ""){
                $jumlah_uw = $("#jumlah_uw2").val();
                $lama = "";
                $tampung_isi = "";
                var id_jenis_produk = $("#jenis_produk").val();

                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>produk/get_ukprod_warna",
                    dataType: "JSON",
                    data: {id_jenis_produk:id_jenis_produk},

                    success: function(respond){
                        for($i=0;$i<respond['jm_warna'];$i++){
                            if(respond['warna'][$i]['id_warna'] == $warna){
                                $nama_warna = respond['warna'][$i]['nama_warna'];
                            }
                        }

                        //kalau sebelumnya belum ada
                        if($jumlah_uw == 0){
                            $jumlah_saat_ini = 1;

                            $tampung_isi = 
                            '<div id="divuw'+$jumlah_saat_ini+'">'+
                                '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $jumlah_saat_ini+
                                        '<input type="hidden" id="2ket'+$jumlah_saat_ini+'" value="0">'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="text" class="form-control" id="2kp'+$jumlah_saat_ini+'" name="2kp'+$jumlah_saat_ini+'" >'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="2id_warna'+$jumlah_saat_ini+'"  id="2id_warna'+$jumlah_saat_ini+'" value="'+$warna+'">'+
                                        '<input type="hidden" name="2nama_warna'+$jumlah_saat_ini+'"  id="2nama_warna'+$jumlah_saat_ini+'" value="'+$nama_warna+'">'+
                                        $nama_warna+
                                    '</td>'+
                                '</tr>'+
                            '</div>';

                            $("#jumlah_uw2").val($jumlah_uw+1);
                            $("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                        }
                        else{
                            $jumlah_uw   = $("#jumlah_uw2").val();
                            $jumlah_uw_l = $jumlah_uw.length;

                            $hitung = 0;
                            for($i=1;$i<=$jumlah_uw_l;$i++){
                                $id_ukurans = $("#2id_ukuran"+$i).val();
                                $id_warnas  = $("#2id_warna"+$i).val();

                                if($id_warnas == $warna){
                                    $hitung++;
                                }
                            }
                            
                            if($hitung == 0){
                                $jumlah_saat_ini = $jumlah_uw_l + 1;

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#2id_ukuran"+$l).val();
                                    $id_warna_sem  = $("#2id_warna"+$l).val();
                                    $nama_ukuran_sem = $("#2nama_ukuran"+$l).val();
                                    $nama_warna_sem  = $("#2nama_warna"+$l).val();
                                    $kode_produk     = $("#2kp"+$l).val();

                                    $lama = $lama +
                                    '<div id="divuw'+$l+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="2ket'+$l+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="2kp'+$l+'" name="2kp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="2id_warna'+$l+'"  id="2id_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="2nama_warna'+$l+'"  id="2nama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                }
                                    $tampung_isi =
                                    '<div id="divuw'+$jumlah_saat_ini+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $jumlah_saat_ini+
                                                '<input type="hidden" id="2ket'+$jumlah_saat_ini+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="2kp'+$jumlah_saat_ini+'" name="2kp'+$jumlah_saat_ini+'" >'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="2id_warna'+$jumlah_saat_ini+'"  id="2id_warna'+$jumlah_saat_ini+'" value="'+$warna+'">'+
                                                '<input type="hidden" name="2nama_warna'+$jumlah_saat_ini+'"  id="2nama_warna'+$jumlah_saat_ini+'" value="'+$nama_warna+'">'+
                                                $nama_warna+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                
                                    $("#jumlah_uw2").val($jumlah_uw+1);
                                    $("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                            }
                            else{
                                $tampung_isi ="";

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#2id_ukuran"+$l).val();
                                    $id_warna_sem  = $("#2id_warna"+$l).val();
                                    $nama_ukuran_sem = $("#2nama_ukuran"+$l).val();
                                    $nama_warna_sem  = $("#2nama_warna"+$l).val();
                                    $kode_produk     = $("#2kp"+$l).val();

                                    $lama = $lama +
                                    '<div id="divuw'+$l+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="2ket'+$l+'" value="0">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="2kp'+$l+'" name="2kp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="2id_warna'+$l+'"  id="2id_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="2nama_warna'+$l+'"  id="2nama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                }

                                alert("Mohon maaf, warna tersebut tidak dapat didaftarkan lagi, karena sudah terdaftar");
                            }
                        }

                        $tablenya = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                                '</tr>'+
                            '</thead>'+
                            $lama+
                            $tampung_isi+
                        '</table>';
                        
                        $("#tab_ketprod2").html($tablenya);
                        cek_terisi();
                    }
                });
            }
            else{
                alert("Silakan pilih warna terlebih dahulu");
            }
        }
    }
</script>

<!-- ganti jenis material (+produk) -->
<script>
    function ganti_jm(){
        var id_jenis_material = $("#jenis_material").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/get_nama_material",
            dataType: "JSON",
            data: {id_jenis_material:id_jenis_material},

            success: function(respond){
                $jumlah_material = respond['jumlah_materials'];

                $tampung_material        = "";
                $tampung_nama_material   = "";
                $tampung_satuan_konsumsi = "";

                for($i=0;$i<$jumlah_material;$i++){
                    $id_material   = respond['materials'][$i]['id_sub_jenis_material'];
                    $nama_material = respond['materials'][$i]['nama_sub_jenis_material'];
                    $satuan_konsumsi = respond['materials'][$i]['satuan_keluar'];

                    $tampung_material = $tampung_material + 
                    '<option value="'+$id_material+'">'+
                        $nama_material+
                    '</option>';

                    $tampung_nama_material = $tampung_nama_material +
                    '<input type="hidden" id="nmmat'+$id_material+'" value="'+$nama_material+'">';

                    $tampung_satuan_konsumsi = $tampung_satuan_konsumsi+
                    '<input type="hidden" id="skmat'+$id_material+'" value="'+$satuan_konsumsi+'">';
                }

                $isi = '<select class="form-control" name="nama_material" id="nama_material">'+
                            '<option value="Nama Material">Nama Material</option>'+
                            $tampung_material+
                        '</select>'+
                        $tampung_nama_material;
                $("#ganti_nm").html($isi);
                
                $("#satuan_konsumsi").html($tampung_satuan_konsumsi);
            }
        }); 
    }
</script>

<!-- add material (+produk) -->
<script>
    function add_material(){
        $jenis_material = $("#jenis_material").val();
        //id dari material yang dipilih
        $id_nama_material  = $("#nama_material").val();
        //id dari line yang dipilih
        $line = $("#line").val();

        if($jenis_material != "Jenis Material" && $id_nama_material != "Nama Material" && $line != "Nama Line" ){
            $nama_material = $("#nmmat"+$id_nama_material).val();
            $nama_line     = $("#nmline"+$line).val();
            $jumlah_km     = $("#jumlah_km").val();
            $satuan_konsumsi = $("#skmat"+$id_nama_material).val();

            //kalau sebelumnya blm ada konsumsi material
            if($jumlah_km == ""){
                $jumlah_saat_ini_ = $jumlah_km + 1;
                $jumlah_saat_ini  = $jumlah_saat_ini_.length;

                $isi_stat_km = "";

                if($nama_line == "Line Sewing"){
                    $isi_stat_km = 
                    '<select class="form-control" name="stat_km_sewing'+$jumlah_saat_ini+'" id="stat_km_sewing'+$jumlah_saat_ini+'" onchange="ganti_stat_km_sewing(this)">'+
                        '<option value="0">Cutting Kain</option>'+
                        '<option value="1">Lainnya</option>'+
                    '</select>'+
                    '<input type="hidden" class="form-control" name="stat_km'+$jumlah_saat_ini+'" id="stat_km'+$jumlah_saat_ini+'" value="0">';
                } else{
                    $isi_stat_km ='<input type="hidden" class="form-control" name="stat_km'+$jumlah_saat_ini+'" id="stat_km'+$jumlah_saat_ini+'" value="1">';
                }

                $isinya ='<div id="divkm'+$jumlah_saat_ini+'">'+
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_saat_ini+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="idmat'+$jumlah_saat_ini+'" id="idmat'+$jumlah_saat_ini+'" value="'+$id_nama_material+'">'+
                            '<input type="hidden" name="nmmat'+$jumlah_saat_ini+'" id="nmmat'+$jumlah_saat_ini+'" value="'+$nama_material+'">'+
                            $nama_material+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" name="idline'+$jumlah_saat_ini+'"  id="idline'+$jumlah_saat_ini+'" value="'+$line+'">'+
                            '<input type="hidden" name="nmline'+$jumlah_saat_ini+'"  id="nmline'+$jumlah_saat_ini+'" value="'+$nama_line+'">'+
                            $nama_line+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="number" min="1" step=".01" class="form-control" name="jmmat'+$jumlah_saat_ini+'" id="jmmat'+$jumlah_saat_ini+'" required>'+
                            $isi_stat_km+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" class="form-control" id="skmat'+$jumlah_saat_ini+'" value="'+$satuan_konsumsi+'" >'+
                            $satuan_konsumsi+
                        '</td>'+
                    '</tr>'+
                '</div>';
                
                $("#jumlah_km").val($jumlah_saat_ini_);
            }
            //kalo sebelumnya sdah ada konsumsi material
            else{
                //1. kalo misalnya material & nama line yang mau ditambahkan sudah ada di list di tabel maka alert.
                $hitung = 0;
                for($i=1;$i<=$jumlah_km.length;$i++){
                    if(($("#idmat"+$i).val() == $id_nama_material) && ($("#idline"+$i).val() == $line)){
                       $hitung++;
                    }
                }

                if($hitung == 0){
                    //tampung yang lama
                    $lama = "";
                    
                    for($i=1;$i<=$jumlah_km.length;$i++){
                        $tampung_idmat  = $("#idmat"+$i).val();
                        $tampung_nmmat  = $("#nmmat"+$i).val();
                        $tampung_idline = $("#idline"+$i).val();
                        $tampung_nmline = $("#nmline"+$i).val();
                        $tampung_jmmat  = $("#jmmat"+$i).val();
                        $tampung_skmat  = $("#skmat"+$i).val();

                        $stat_km_sewing = $("#stat_km_sewing"+$i).val();
                        $stat_km        = $("#stat_km"+$i).val();

                        $isi_stat_km = "";

                        if($tampung_nmline == "Line Sewing"){
                            if($stat_km_sewing == 0){
                                $optionnya = '<option value="0" selected>Cutting Kain</option>'+
                                '<option value="1">Lainnya</option>';
                            } else{
                                $optionnya = '<option value="0" selected>Cutting Kain</option>'+
                                '<option value="1" selected>Lainnya</option>';
                            }

                            $isi_stat_km = 
                            '<select class="form-control" name="stat_km_sewing'+$i+'" id="stat_km_sewing'+$i+'" onchange="ganti_stat_km_sewing(this)">'+
                                $optionnya+
                            '</select>'+
                            '<input type="hidden" class="form-control" name="stat_km'+$i+'" id="stat_km'+$i+'" value="'+$stat_km+'">';
                        } else{
                            $isi_stat_km ='<input type="hidden" class="form-control" name="stat_km'+$i+'" id="stat_km'+$i+'" value="1">';
                        }

                        $lama = $lama + 
                        '<div id="divkm'+$i+'">'+
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $i+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="idmat'+$i+'" id="idmat'+$i+'" value="'+$tampung_idmat+'">'+
                                    '<input type="hidden" name="nmmat'+$i+'" id="nmmat'+$i+'" value="'+$tampung_nmmat+'">'+
                                    $tampung_nmmat+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="idline'+$i+'" id="idline'+$i+'" value="'+$tampung_idline+'">'+
                                    '<input type="hidden" name="nmline'+$i+'" id="nmline'+$i+'" value="'+$tampung_nmline+'">'+
                                    $tampung_nmline+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="number" min="1" step=".01" class="form-control" name="jmmat'+$i+'" id="jmmat'+$i+'" value="'+$tampung_jmmat+'" required>'+
                                    $isi_stat_km+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" class="form-control" id="skmat'+$i+'" value="'+$tampung_skmat+'" >'+
                                    $tampung_skmat+
                                '</td>'+
                            '</tr>'+
                        '</div>';
                    }

                    $jumlah_saat_ini_ = $jumlah_km + 1;
                    $jumlah_saat_ini  = $jumlah_saat_ini_.length;

                    $isi_stat_km = "";

                    if($nama_line == "Line Sewing"){
                        $isi_stat_km = 
                        '<select class="form-control" name="stat_km_sewing'+$jumlah_saat_ini+'" id="stat_km_sewing'+$jumlah_saat_ini+'" onchange="ganti_stat_km_sewing(this)">'+
                            '<option value="0">Cutting Kain</option>'+
                            '<option value="1">Lainnya</option>'+
                        '</select>'+
                        '<input type="hidden" class="form-control" name="stat_km'+$jumlah_saat_ini+'" id="stat_km'+$jumlah_saat_ini+'" value="0">';
                    } else{
                        $isi_stat_km ='<input type="hidden" class="form-control" name="stat_km'+$jumlah_saat_ini+'" id="stat_km'+$jumlah_saat_ini+'" value="1">';
                    }

                    $isinya = $lama +
                    '<div id="divkm'+$jumlah_saat_ini+'">'+
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $jumlah_saat_ini+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="idmat'+$jumlah_saat_ini+'" id="idmat'+$jumlah_saat_ini+'" value="'+$id_nama_material+'">'+
                                '<input type="hidden" name="nmmat'+$jumlah_saat_ini+'" id="nmmat'+$jumlah_saat_ini+'" value="'+$nama_material+'">'+
                                $nama_material+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="idline'+$jumlah_saat_ini+'"  id="idline'+$jumlah_saat_ini+'" value="'+$line+'">'+
                                '<input type="hidden" name="nmline'+$jumlah_saat_ini+'"  id="nmline'+$jumlah_saat_ini+'" value="'+$nama_line+'">'+
                                $nama_line+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="number" min="1" step=".01" class="form-control" name="jmmat'+$jumlah_saat_ini+'" id="jmmat'+$jumlah_saat_ini+'" required>'+
                                $isi_stat_km+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" class="form-control" id="skmat'+$jumlah_saat_ini+'" value="'+$satuan_konsumsi+'" >'+
                                $satuan_konsumsi+
                            '</td>'+
                        '</tr>'+
                    '</div>';
                    
                    $("#jumlah_km").val($jumlah_saat_ini_);
                }
                else{
                    alert("Mohon maaf material untuk nama line tersebut tidak dapat di daftarkan lagi karena sudah terdaftar");
                }
            }
           
            $tampung_konsumsi_material =   
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Material</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Line</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Jumlah Material</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Satuan Konsumsi</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isinya+
                    '</tbody>'+
                '</table>';

                $("#konsumsi_material").html($tampung_konsumsi_material);   
        }
        else{
            alert("Silahkan pilih jenis material, kemudian pilih nama material & line untuk menambahkan konsumsi material");
        }
        cek_terisi();
    }
</script>

<!-- cek terisi (add produk) (+produk)-->
<script>
    function cek_terisi(){
        $("#pc_cek_line1").val(0);
        $("#pc_cek_line2").val(0);
        $("#pc_cek_line3").val(0);
        $("#fp_cek_line1").val(0);
        $("#fp_cek_line2").val(0);
        $("#fp_cek_line3").val(0);
        $("#fp_cek_line4").val(0);

        if($("#nama_produk_input").val() != "" && $("#harga_produk").val() != "" ){
            if($("#keterangan_produk").val() == 0 || $("#keterangan_produk").val() == 1 || $("#keterangan_produk").val() == 2){
                if($("#jm_ketpod").val() > 0){
                    //jika purchase cover
                    if($("#keterangan").val() == 1){
                            if($("#pc_ct1").val() != "" && $("#pc_ct2").val() != "" && $("#pc_ct3").val() != ""){
                                //cek apakah konsumsi material yg diinput sudah mencakup line2 berdasarkan full produksi/purchase cover

                                if($("#jumlah_km").val() != ""){
                                    $jumlah_km = $("#jumlah_km").val();

                                    for($i=1;$i<=$jumlah_km.length;$i++){
                                        $idline = $("#idline"+$i).val();

                                        for($k=1;$k<=3;$k++){
                                            if($idline ==  $("#pc_ln"+$k).val()){
                                                $cekline = parseInt($("#pc_cek_line"+$k).val());
                                                $cekline++;

                                                $("#pc_cek_line"+$k).val($cekline);
                                            }
                                        }
                                    }

                                    if($("#pc_cek_line1").val() != 0 && $("#pc_cek_line2").val() != 0 && $("#pc_cek_line3").val() != 0){
                                        $("#simpan").prop('disabled',false);
                                    } else{
                                        $("#simpan").prop('disabled',true);
                                    }
                                }
                                else{
                                    $("#simpan").prop('disabled',true);
                                }
                            }
                            else{
                                $("#simpan").prop('disabled',true);
                            }
                    }
                    //jika full produksi
                    else if($("#keterangan").val() == 0){
                        if($("#fp_ct1").val() != "" && $("#fp_ct2").val() != "" && $("#fp_ct3").val() != "" && $("#fp_ct4").val() != ""){
                            if($("#jumlah_km").val() != ""){
                                $jumlah_km = $("#jumlah_km").val();

                                for($i=1;$i<=$jumlah_km.length;$i++){
                                    $idline = $("#idline"+$i).val();

                                    for($k=1;$k<=4;$k++){
                                        if($idline ==  $("#fp_ln"+$k).val()){
                                            $cekline = parseInt($("#fp_cek_line"+$k).val());
                                            $cekline++;

                                            $("#fp_cek_line"+$k).val($cekline);
                                        }
                                    }
                                }

                                if($("#fp_cek_line1").val() != 0 && $("#fp_cek_line2").val() != 0 && $("#fp_cek_line3").val() != 0 && $("#fp_cek_line4").val() != 0){
                                    $("#simpan").prop('disabled',false);
                                } else{
                                    $("#simpan").prop('disabled',true);
                                }
                            }
                        }
                        else{
                            $("#simpan").prop('disabled',true);
                        }
                    }
                }
                else{
                    $("#simpan").prop('disabled',true);
                }
            }
            //keterangan = 3
            else{
                //jika purchase cover
                if($("#keterangan").val() == 1){
                        if($("#pc_ct1").val() != "" && $("#pc_ct2").val() != "" && $("#pc_ct3").val() != ""){
                            if($("#jumlah_km").val() != ""){
                                $jumlah_km = $("#jumlah_km").val();

                                for($i=1;$i<=$jumlah_km.length;$i++){
                                    $idline = $("#idline"+$i).val();

                                    for($k=1;$k<=3;$k++){
                                        if($idline ==  $("#pc_ln"+$k).val()){
                                            $cekline = parseInt($("#pc_cek_line"+$k).val());
                                            $cekline++;

                                            $("#pc_cek_line"+$k).val($cekline);
                                        }
                                    }
                                }

                                if($("#pc_cek_line1").val() != 0 && $("#pc_cek_line2").val() != 0 && $("#pc_cek_line3").val() != 0){
                                    $("#simpan").prop('disabled',false);
                                } else{
                                    $("#simpan").prop('disabled',true);
                                }
                            }
                            else{
                                $("#simpan").prop('disabled',true);
                            }
                        }
                        else{
                            $("#simpan").prop('disabled',true);
                        }
                }
                //jika full produksi
                else if($("#keterangan").val() == 0){
                        if($("#fp_ct1").val() != "" && $("#fp_ct2").val() != "" && $("#fp_ct3").val() != "" && $("#fp_ct4").val() != ""){
                            if($("#jumlah_km").val() != ""){
                                $jumlah_km = $("#jumlah_km").val();

                                for($i=1;$i<=$jumlah_km.length;$i++){
                                    $idline = $("#idline"+$i).val();

                                    for($k=1;$k<=4;$k++){
                                        if($idline ==  $("#fp_ln"+$k).val()){
                                            $cekline = parseInt($("#fp_cek_line"+$k).val());
                                            $cekline++;

                                            $("#fp_cek_line"+$k).val($cekline);
                                        }
                                    }
                                }

                                if($("#fp_cek_line1").val() != 0 && $("#fp_cek_line2").val() != 0 && $("#fp_cek_line3").val() != 0 && $("#fp_cek_line4").val() != 0){
                                    $("#simpan").prop('disabled',false);
                                } else{
                                    $("#simpan").prop('disabled',true);
                                }
                            }
                        }
                        else{
                            $("#simpan").prop('disabled',true);
                        }
                }
            }
        } else{
            $("#simpan").prop('disabled',true);
        }
    
    }
</script>

<!-- ganti status konsumsi material untuk line sewing  (+produk)-->
<script>
    function ganti_stat_km_sewing(obj){
        var id = obj.id;
        var length = id.length;

        //1 angka
        if(length == 15){
            var ke = id.charAt(14);
        } 
        //jika 2 angka
        else if(length == 16){
            var ke = id.charAt(15);
        }
        //jika 3 angka
        else if(length == 17){
            var ke = id.charAt(16);
        }

        if($("#"+id).val() == 0){
            $("#stat_km"+ke).val(0);
        } else if($("#"+id).val() == 1){
            $("#stat_km"+ke).val(1);
        }
    }
</script>

<!-- detail produk -->
<script>
     $('.bdet_klik').click(function(){
        var id = $(('#bdet')+$(this).attr('value')).val();
       
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/detail_produk",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $jenis_produk        = respond['produk'][0]['nama_jenis_produk'];
                $nama_produk         = respond['produk'][0]['nama_produk'];

                var num = "Rp "+  new Number(respond['produk'][0]['harga_produk']).toLocaleString("id-ID") + ",00";

                $harga_produk        = num;
                $keterangan_warna    = respond['produk'][0]['keterangan_warna'];
                $keterangan_produksi = respond['produk'][0]['keterangan_produksi'];

                if($keterangan_produksi == 0){
                    $ketprod = "Full Produksi";
                }
                else{
                    $ketprod = "Purchase Cover";
                }

                if(respond['detail_produk'][0]['keterangan'] == 0){
                    $ukwar = "Memiliki Warna & Ukuran";
                } else if(respond['detail_produk'][0]['keterangan'] == 1){
                    $ukwar = "Memiliki Ukuran";
                } else if(respond['detail_produk'][0]['keterangan'] == 2){
                    $ukwar = "Memiliki Warna";
                } else{
                    $ukwar = "Tidak Memiliki Warna & Ukuran";
                }

                $("#djenis_produk").val($jenis_produk);
                $("#dnama_produk").val($nama_produk);
                $("#dharga_produk").val($harga_produk);
                $("#dketerangan_produksi").val($ketprod);
                $("#ddetail_produk").val($ukwar);

                $isi_ukwar = "";

                if(respond['detail_produk'][0]['keterangan'] == 0){
                    for($i=0;$i<respond['jm_detail_produk'];$i++){

                        $id_ukuran = respond['detail_produk'][$i]['id_ukuran'];
                        $id_warna  = respond['detail_produk'][$i]['id_warna'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran +" "+ $satuan_ukuran;
                            }
                        }

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $isi_ukwar = $isi_ukwar + 
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                ($i+1)+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['detail_produk'][$i]['kode_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $ukurannya+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $warnanya+
                            '</td>'+
                        '</tr>';
                    }
                    

                    $table_ukwar = 
                    '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                        '<thead>'+
                            '<tr>'+
                                '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                                '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_ukwar+
                        '</tbody>'+
                    '</table>';

                    
                    $("#dtable_detprod").html($table_ukwar);
                } else if(respond['detail_produk'][0]['keterangan'] == 1){
                    for($i=0;$i<respond['jm_detail_produk'];$i++){

                        $id_ukuran = respond['detail_produk'][$i]['id_ukuran'];

                        for($l=0;$l<respond['jmukuran'];$l++){
                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                $ukurannya = $nama_ukuran +" "+ $satuan_ukuran;
                            }
                        }


                        $isi_ukwar = $isi_ukwar + 
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                ($i+1)+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['detail_produk'][$i]['kode_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $ukurannya+
                            '</td>'+
                        '</tr>';
                    }

                    $table_ukwar = 
                    '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                        '<thead>'+
                            '<tr>'+
                                '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_ukwar+
                        '</tbody>'+
                    '</table>';

                    
                    $("#dtable_detprod").html($table_ukwar);
                } else if(respond['detail_produk'][0]['keterangan'] == 2){
                    for($i=0;$i<respond['jm_detail_produk'];$i++){
                        $id_warna  = respond['detail_produk'][$i]['id_warna'];

                        for($k=0;$k<respond['jmwarna'];$k++){
                            if(respond['warna'][$k]['id_warna'] == $id_warna){
                                $warnanya = respond['warna'][$k]['nama_warna'];
                            }
                        }

                        $isi_ukwar = $isi_ukwar + 
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                ($i+1)+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['detail_produk'][$i]['kode_produk']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $warnanya+
                            '</td>'+
                        '</tr>';
                    }

                    $table_ukwar = 
                    '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                        '<thead>'+
                            '<tr>'+
                                '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_ukwar+
                        '</tbody>'+
                    '</table>';

                    $("#dtable_detprod").html($table_ukwar);
                } else if(respond['detail_produk'][0]['keterangan'] == 3){
                    $table_ukwar = '<div class="form-group mt-lg">'+
                                        '<label class="col-sm-5 control-label">Kode Produk</label>'+
                                        '<div class="col-sm-7">'+
                                            '<input type="text" class="form-control" '+
                                            'value="'+respond['detail_produk'][0]['kode_produk']+'" readonly>'+
                                        '</div>'+
                                    '</div>';

                    $("#dtable_detprod").html($table_ukwar);
                }
                else{
                    $("#dtable_detprod").html("");
                }

                //.........................................
                $isi_ct = "";
                $jumlah_ct = respond['jumlah_ct'];

                for($i=1;$i<=$jumlah_ct;$i++){
                    $isi_ct = $isi_ct +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $i+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['cycle_time'][$i-1]['nama_line']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['cycle_time'][$i-1]['cycle_time']+
                        '</td>'+
                    '</tr>';
                }

                $ct =
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Nama Line</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Cycle Time (s)</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi_ct+
                    '</tbody>'+
                '</table>';

                $("#dtable_ct").html($ct);

                //.........................................
                $isi_km = "";
                $jumlah_km = respond['jumlah_km'];

                for($i=1;$i<=$jumlah_km;$i++){
                    if(respond['konsumsi_material'][$i-1]['status_konsumsi'] == 0){
                        $status_km = "Cutting Kain";
                    }else{
                        $status_km = "Lainnya";
                    }

                    $isi_km = $isi_km +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $i+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['konsumsi_material'][$i-1]['nama_sub_jenis_material']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['konsumsi_material'][$i-1]['nama_line']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['konsumsi_material'][$i-1]['jumlah_konsumsi']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['konsumsi_material'][$i-1]['satuan_keluar']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $status_km+
                        '</td>'+
                    '</tr>';
                }

                $km = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th  class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th  class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Material</th>'+
                            '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Line</th>'+
                            '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Jumlah Material</th>'+
                            '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Satuan Konsumsi</th>'+
                            '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Status Konsumsi</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi_km+
                    '</tbody>'+
                '</table>';

                $("#dtable_km").html($km);
                $("#modaldetail").modal();
            }
        });

     });
</script>

<!-- edit produk -->
<script>
    $('.bedit_klik').click(function(){
        var id = $(('#bedit')+$(this).attr('value')).val();
       
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/detail_produk",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#id_produk_edit").val(respond['produk'][0]['id_produk']);

                //jenis produk
                    $jenprodnya = '<div class="form-group mt-lg">'+
                                    '<label class="col-sm-5 control-label">Jenis Produk</label>'+
                                    '<div class="col-sm-7">'+
                                        '<input type="hidden" name="jenis_produk_edit" id="jenis_produk_edit" class="form-control" value="'+respond['produk'][0]['id_jenis_produk']+'">'+
                                        '<input type="text" class="form-control" value="'+respond['produk'][0]['nama_jenis_produk']+'" readonly>'+
                                    '</div>'+
                                '</div>';
                    $("#ediv_jenprod").html($jenprodnya);
                //

                $("#nama_produk_edit").val(respond['produk'][0]['nama_produk']);
                $("#harga_produk_edit").val(respond['produk'][0]['harga_produk']);
                $("#nama_produk_sebelum").val(respond['produk'][0]['nama_produk']);
                $("#harga_produk_sebelum").val(respond['produk'][0]['harga_produk']);

                //keterangan produk
                    if(respond['detail_produk'][0]['keterangan'] == 0){
                        $keterangannya = "Memiliki ukuran & warna";
                    } else if(respond['detail_produk'][0]['keterangan'] == 1){
                        $keterangannya = "Memiliki ukuran";
                    } else if(respond['detail_produk'][0]['keterangan'] == 2){
                        $keterangannya = "Memiliki warna";
                    } else if(respond['detail_produk'][0]['keterangan'] == 3){
                        $keterangannya = "Tidak memiliki ukuran & warna";
                    }

                    $isi_ketwar ='<div class="form-group mt-lg">'+
                                    '<label class="col-sm-5 control-label">Keterangan Produk</label>'+
                                    '<div class="col-sm-7">'+
                                        '<input type="hidden" class="form-control" name="keterangan_produk_edit" id="keterangan_produk_edit" value="'+respond['detail_produk'][0]['keterangan']+'">'+
                                        '<input type="text" class="form-control" value="'+$keterangannya+'" readonly>'+
                                    '</div>'+
                                '</div>';
                    
                    $("#ediv_ketwar").html($isi_ketwar);
                //
                
                //ukuran warna
                    $isi = "";

                    if(respond['detail_produk'][0]['keterangan'] == 0){
                        $isi_ukuran = "";
                        for($i=0;$i<respond['jm_ukprod'];$i++){
                            $isi_ukuran = $isi_ukuran + 
                            '<option value="'+respond['ukprod'][$i]['id_ukuran_produk']+'">'+
                                respond['ukprod'][$i]['ukuran_produk']+ respond['ukprod'][$i]['satuan_ukuran']+
                            '</option>';
                        }
                        $ukuran = 
                        '<div class="col-md-5 form-group">'+
                            '<select class="form-control" name="eselect_ukuran" id="eselect_ukuran"'+
                            '>'+
                                '<option value="">Ukuran Produk</option>'+
                                $isi_ukuran+
                            '</select>'+
                        '</div>';

                        $isi_warna = "";
                        for($i=0;$i<respond['jm_warna'];$i++){
                            $isi_warna = $isi_warna + 
                            '<option value="'+respond['warna'][$i]['id_warna']+'">'+
                                respond['warna'][$i]['nama_warna']+
                            '</option>';
                        }
                        $warna = 
                        '<div class="col-md-5 form-group">'+
                            '<select class="form-control" name="eselect_warna" id="eselect_warna"'+
                            '>'+
                                '<option value="">Warna Produk</option>'+
                                $isi_warna+
                            '</select>'+
                        '</div>';

                        $isi = 
                        '<div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">'+
                            $ukuran+
                            $warna+
                            '<div class="col-md-2 form-group">'+
                                '<button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"'+
                                'title="Add"  onclick="add_ukwar_edit()"></button>'+
                            '</div>'+
                        '</div>';

                        $("#ediv_pilih_ukwar").html($isi);   
                    } else if(respond['detail_produk'][0]['keterangan'] == 1){
                        $isi_ukuran = "";
                        for($i=0;$i<respond['jm_ukprod'];$i++){
                            $isi_ukuran = $isi_ukuran + 
                            '<option value="'+respond['ukprod'][$i]['id_ukuran_produk']+'">'+
                                respond['ukprod'][$i]['ukuran_produk']+ respond['ukprod'][$i]['satuan_ukuran']+
                            '</option>';
                        }
                        $ukuran = 
                        '<div class="col-md-3 form-group">'+
                            '<select class="form-control" name="eselect_ukuran" id="eselect_ukuran"'+
                            '>'+
                                '<option value="">Ukuran Produk</option>'+
                                $isi_ukuran+
                            '</select>'+
                        '</div>';

                        $isi = 
                        '<div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">'+
                            $ukuran+
                            '<div class="col-md-1 form-group">'+
                                '<button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"'+
                                'title="Add"  onclick="add_ukwar_edit()"></button>'+
                            '</div>'+
                        '</div>';

                        $("#ediv_pilih_ukwar").html($isi);   
                    } else if(respond['detail_produk'][0]['keterangan'] == 2){
                        $isi_warna = "";
                        for($i=0;$i<respond['jm_warna'];$i++){
                            $isi_warna = $isi_warna + 
                            '<option value="'+respond['warna'][$i]['id_warna']+'">'+
                                respond['warna'][$i]['nama_warna']+
                            '</option>';
                        }
                        $warna = 
                        '<div class="col-md-3 form-group">'+
                            '<select class="form-control" name="eselect_warna" id="eselect_warna"'+
                            '>'+
                                '<option value="">Warna Produk</option>'+
                                $isi_warna+
                            '</select>'+
                        '</div>';

                        $isi = 
                        '<div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">'+
                            $warna+
                            '<div class="col-md-1 form-group">'+
                            '<button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"'+
                            'title="Add"  onclick="add_ukwar_edit()"></button>'+
                        '</div>'+
                        '</div>';

                        $("#ediv_pilih_ukwar").html($isi);   
                    } else if(respond['detail_produk'][0]['keterangan'] == 3){
                        $isi = '<div class="form-group mt-lg">'+
                                    '<label class="col-sm-5 control-label">Kode Produk</label>'+
                                    '<div class="col-sm-7">'+
                                        '<input type="hidden" name="id_detail_produk3" value="'+respond['detail_produk'][0]['id_detail_produk']+'">'+
                                        '<input type="text"  name="kode_produk_edit" id="kode_produk_edit" onchange="cek_kode_produk_edit()"'+
                                        'class="form-control"  value="'+respond['detail_produk'][0]['kode_produk']+'">'+
                                    '</div>'+
                                '</div>';
                        
                        $("#ediv_kode3").html($isi);
                    } 
                //

                //table ukprod
                    $isi_table_ukprod = "";
                    $isi_ukwar = "";

                    if(respond['detail_produk'][0]['keterangan'] == 0){
                        for($i=0;$i<respond['jm_detail_produk'];$i++){
                            
                            $id_ukuran = respond['detail_produk'][$i]['id_ukuran_produk'];
                            
                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran_produk'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran +" "+ $satuan_ukuran;
                                }
                            }

                            $id_warna  = respond['detail_produk'][$i]['id_warna'];

                            for($k=0;$k<respond['jmwarna'];$k++){
                                if(respond['warna'][$k]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$k]['nama_warna'];
                                }
                            }

                            $isi_ukwar = $isi_ukwar + 
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($i+1)+
                                    '<input type="hidden" id="eket'+($i+1)+'" name="eket'+($i+1)+'" value="0">'+
                                    '<input type="hidden" id="eid_detprod'+($i+1)+'" name="eid_detprod'+($i+1)+'" value="'+respond['detail_produk'][$i]['id_detail_produk']+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="text" id="ekp'+($i+1)+'" name="ekp'+($i+1)+'" class="form-control" value="'+respond['detail_produk'][$i]['kode_produk']+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" id="eid_ukuran'+($i+1)+'" name="eid_ukuran'+($i+1)+'" value="'+$id_ukuran+'" >'+
                                    '<input type="hidden" id="enama_ukuran'+($i+1)+'" name="enama_ukuran'+($i+1)+'" value="'+$ukurannya+'" >'+
                                    $ukurannya+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" id="eid_warna'+($i+1)+'" name="eid_warna'+($i+1)+'" value="'+$id_warna+'" >'+
                                    '<input type="hidden" id="enama_warna'+($i+1)+'" name="enama_warna'+($i+1)+'" value="'+$warnanya+'" >'+
                                    $warnanya+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="checkbox" id="uwdel'+($i+1)+'" name="uwdel'+($i+1)+'" onclick="hapus_ukwar()"> hapus'+
                                '</td>'+
                            '</tr>';
                        }

                        $isi_table_ukprod = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_ukwar+
                            '</tbody>'+
                        '</table>';
                    } else if(respond['detail_produk'][0]['keterangan'] == 1){
                        for($i=0;$i<respond['jm_detail_produk'];$i++){

                            $id_ukuran = respond['detail_produk'][$i]['id_ukuran_produk'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran_produk'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran +" "+ $satuan_ukuran;
                                }
                            }

                            $isi_ukwar = $isi_ukwar + 
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($i+1)+
                                    '<input type="hidden" id="eket'+($i+1)+'" name="eket'+($i+1)+'" value="0">'+
                                    '<input type="hidden" id="eid_detprod'+($i+1)+'" name="eid_detprod'+($i+1)+'" value="'+respond['detail_produk'][$i]['id_detail_produk']+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="text" id="ekp'+($i+1)+'" name="ekp'+($i+1)+'" class="form-control" value="'+respond['detail_produk'][$i]['kode_produk']+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" id="eid_ukuran'+($i+1)+'" name="eid_ukuran'+($i+1)+'" value="'+$id_ukuran+'" >'+
                                    '<input type="hidden" id="enama_ukuran'+($i+1)+'" name="enama_ukuran'+($i+1)+'" value="'+$ukurannya+'" >'+
                                    $ukurannya+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="checkbox" id="uwdel'+($i+1)+'" name="uwdel'+($i+1)+'" onclick="hapus_ukwar()"> hapus'+
                                '</td>'+
                            '</tr>';
                        }

                        $isi_table_ukprod = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_ukwar+
                            '</tbody>'+
                        '</table>';
                    } else if(respond['detail_produk'][0]['keterangan'] == 2){
                        for($i=0;$i<respond['jm_detail_produk'];$i++){
                            $id_warna  = respond['detail_produk'][$i]['id_warna'];

                            for($k=0;$k<respond['jmwarna'];$k++){
                                if(respond['warna'][$k]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$k]['nama_warna'];
                                }
                            }

                            $isi_ukwar = $isi_ukwar + 
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($i+1)+
                                    '<input type="hidden" id="eket'+($i+1)+'" name="eket'+($i+1)+'" value="0">'+
                                    '<input type="hidden" id="eid_detprod'+($i+1)+'" name="eid_detprod'+($i+1)+'" value="'+respond['detail_produk'][$i]['id_detail_produk']+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="text" id="ekp'+($i+1)+'" name="ekp'+($i+1)+'" class="form-control" value="'+respond['detail_produk'][$i]['kode_produk']+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" id="eid_warna'+($i+1)+'" name="eid_warna'+($i+1)+'" value="'+$id_warna+'" >'+
                                    '<input type="hidden" id="enama_warna'+($i+1)+'" name="enama_warna'+($i+1)+'" value="'+$warnanya+'" >'+
                                    $warnanya+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="checkbox" id="uwdel'+($i+1)+'" name="uwdel'+($i+1)+'" onclick="hapus_ukwar()"> hapus'+
                                '</td>'+
                            '</tr>';
                        }

                        $isi_table_ukprod = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi_ukwar+
                            '</tbody>'+
                        '</table>';
                    }
                    
                    $("#etab_ketprod").html($isi_table_ukprod);

                    $("#ejumlah_ukprod").val(respond['jm_detail_produk']);
                //

                //cycle time
                    if(respond['produk'][0]['keterangan_produksi'] == 0){
                        $ketprod = "Full Produksi";
                    } else if(respond['produk'][0]['keterangan_produksi'] == 1){
                        $ketprod = "Purchase Cover";
                    } 

                    $("#keterangan_produksi_edit").val(respond['produk'][0]['keterangan_produksi']);
                    $("#eketerangan_produksi").val($ketprod);
                    
                    $isi_ct = "";
                    $jumlah_ct = respond['jumlah_ct'];

                    for($i=1;$i<=$jumlah_ct;$i++){
                        $isi_ct = $isi_ct +
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $i+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['cycle_time'][$i-1]['nama_line']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" class="form-control" name="id_ct'+$i+'" value="'+respond['cycle_time'][$i-1]['id_cycle_time']+'">'+
                                '<center><input type="number" min="1" class="form-control" style="width:150px;text-align: center;vertical-align: middle;" name="ct'+$i+'" value="'+respond['cycle_time'][$i-1]['cycle_time']+'" required></center>'+
                            '</td>'+
                        '</tr>';
                    }

                    $ct =
                    '<center><table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px;width:80%;">'+
                        '<thead>'+
                            '<tr>'+
                                '<th style="text-align: center;vertical-align: middle;">No</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Nama Line</th>'+
                                '<th style="text-align: center;vertical-align: middle;">Cycle Time (s)</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                        $isi_ct+
                        '</tbody>'+
                    '</table></center>';

                    $("#etable_ct").html($ct);
                //

                //konsumsi material
                    $isi_km = "";
                    $jumlah_km = respond['jumlah_km'];

                    $isi_piline = "";

                    if(respond['produk'][0]['keterangan_produksi'] == 0){
                        for($v=0;$v<respond['jm_line'];$v++){
                            $isi_piline = $isi_piline + 
                                            '<option value="'+respond['line'][$v]['id_line']+'">'+
                                                    respond['line'][$v]['nama_line']+
                                                '</option>';
                        }
                    } else if(respond['produk'][0]['keterangan_produksi'] == 1){
                        for($v=0;$v<respond['jm_line'];$v++){
                            if(respond['line'][$v]['nama_line'] != "Line Sewing"){
                                $isi_piline = $isi_piline + 
                                        '<option value="'+respond['line'][$v]['id_line']+'">'+
                                                respond['line'][$v]['nama_line']+
                                            '</option>';
                            } else{
                                $isi_piline = $isi_piline + 
                                        '<option value="'+respond['line'][$v]['id_line']+'" disabled>'+
                                                respond['line'][$v]['nama_line']+
                                            '</option>';
                            }
                        }
                    } 

                    $piline = '<select class="form-control" name="eline" id="eline">'+
                                    '<option value="Nama Line">Nama Line</option>'+
                                        $isi_piline+
                                '</select>';

                    $("#pilih_line").html($piline);

                    for($i=1;$i<=$jumlah_km;$i++){
                        if(respond['konsumsi_material'][$i-1]['status_konsumsi'] == 0){
                            $status_km = "Cutting Kain";
                        }else{
                            $status_km = "Lainnya";
                        }

                        $status_konsumsi = "";

                        //jika konsumsinya untuk line sewing
                        if(respond['konsumsi_material'][$i-1]['nama_line'] == "Line Sewing"){
                            if(respond['konsumsi_material'][$i-1]['status_konsumsi'] == 0){
                                $status_konsumsi ='<select class="form-control" name="stat_km_sewing'+$i+'" id="stat_km_sewing'+$i+'">'+
                                    '<option value="0" selected>Cutting Kain</option>'+
                                    '<option value="1">Lainnya</option>'+
                                '</select>';
                            } else{
                                $status_konsumsi ='<select class="form-control" name="stat_km_sewing'+$i+'" id="stat_km_sewing'+$i+'">'+
                                    '<option value="0">Cutting Kain</option>'+
                                    '<option value="1" selected>Lainnya</option>'+
                                '</select>';
                            }
                        }

                        $isi_km = $isi_km +
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $i+
                                '<input type="hidden" name="estat'+$i+'" id="estat'+$i+'" value="0">'+
                                '<input type="hidden" name="eid_km'+$i+'" id="eid_km'+$i+'" value="'+ respond['konsumsi_material'][$i-1]['id_konsumsi_material']+'">'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="eidmat'+$i+'" id="eidmat'+$i+'" value="'+respond['konsumsi_material'][$i-1]['id_sub_jenis_material']+'">'+
                                '<input type="hidden" name="enmmat'+$i+'" id="enmmat'+$i+'" value="'+respond['konsumsi_material'][$i-1]['nama_sub_jenis_material']+'">'+
                                respond['konsumsi_material'][$i-1]['nama_sub_jenis_material']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="eidline'+$i+'"  id="eidline'+$i+'" value="'+respond['konsumsi_material'][$i-1]['id_line']+'">'+
                                '<input type="hidden" name="enmline'+$i+'"  id="enmline'+$i+'" value="'+respond['konsumsi_material'][$i-1]['nama_line']+'">'+
                                respond['konsumsi_material'][$i-1]['nama_line']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="number" min="0.01" step=".01" id="ejmmat'+$i+'" name="ejmmat'+$i+'" class="form-control" value="'+respond['konsumsi_material'][$i-1]['jumlah_konsumsi']+'">'+
                                $status_konsumsi+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                            '<input type="hidden" id="eskmat'+$i+'" name="eskmat'+$i+'" class="form-control" value="'+respond['konsumsi_material'][$i-1]['satuan_keluar']+'">'+
                                respond['konsumsi_material'][$i-1]['satuan_keluar']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="checkbox" id="del'+($i)+'" name="del'+($i)+'" onclick="hapus_km()"> hapus'+
                            '</td>'+
                        '</tr>';
                    }

                    $km = 
                    '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                        '<thead>'+
                            '<tr>'+
                                '<th  class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                '<th  class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Material</th>'+
                                '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Line</th>'+
                                '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Jumlah Material</th>'+
                                '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Satuan Konsumsi</th>'+
                                '<th  class="col-md-3" style="text-align: center;vertical-align: middle;">Aksi</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                        $isi_km+
                        '</tbody>'+
                    '</table>';

                    $("#ejumlah_km").val($jumlah_km);
                    $("#etable_km").html($km);

                //

                $("#modaledit").modal();
            }
        });

     });
</script>

<!-- cek kode produk ketika edit produk-->
<script>
    function cek_kode_produk_edit(){
        var kode_produk = $("#kode_produk_edit").val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/cek_kode_produk_input",
            dataType: "JSON",
            data: {kode_produk:kode_produk},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, kode produk tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });
    }
</script>

<!-- cek nama produk ketika edit produk -->
<script>
    function cek_nama_produk_edit(){
        var nama_produk_input = $("#nama_produk_edit").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/cek_nama_produk_input",
            dataType: "JSON",
            data: {nama_produk_input:nama_produk_input},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, produk dengan nama tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                }
                reload();
            }
        });

        cek_terisi();
    }
</script>

<!-- ukwar edit -->
<script>
    function add_ukwar_edit(){
        $keterangan = $("#keterangan_produk_edit").val();
        $jm_ketpod  = $("#ejumlah_ukprod").val();

        if($keterangan == 0){
            $ukuran = $("#eselect_ukuran").val();
            $warna  = $("#eselect_warna").val();
            
            if($ukuran != "" && $warna != ""){
                $jumlah_uw = $("#ejumlah_ukprod").val();
                $lama = "";
                $tampung_isi = "";
                var id_jenis_produk = $("#jenis_produk_edit").val();
                
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>produk/get_ukprod_warna",
                    dataType: "JSON",
                    data: {id_jenis_produk:id_jenis_produk},

                    success: function(respond){
                        
                        for($i=0;$i<respond['jm_ukprod'];$i++){
                            if(respond['ukprod'][$i]['id_ukuran_produk'] == $ukuran){
                                $nama_ukuran = respond['ukprod'][$i]['ukuran_produk'] +" "+respond['ukprod'][$i]['satuan_ukuran'];
                            }
                        }

                        for($i=0;$i<respond['jm_warna'];$i++){
                            if(respond['warna'][$i]['id_warna'] == $warna){
                                $nama_warna = respond['warna'][$i]['nama_warna'];
                            }
                        }

                            $jumlah_uw   = $("#ejumlah_ukprod").val();
                            $jumlah_uw_l = $jumlah_uw;

                            $hitung = 0;
                            for($i=1;$i<=$jumlah_uw_l;$i++){
                                $id_ukurans = $("#eid_ukuran"+$i).val();
                                $id_warnas  = $("#eid_warna"+$i).val();

                                if($id_ukurans == $ukuran && $id_warnas == $warna){
                                    $hitung++;
                                }
                            }
                            
                            if($hitung == 0){
                                $jumlah_saat_ini = parseInt($jumlah_uw) + parseInt(1);

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem   = $("#eid_ukuran"+$l).val();
                                    $id_warna_sem    = $("#eid_warna"+$l).val();
                                    $nama_ukuran_sem = $("#enama_ukuran"+$l).val();
                                    $nama_warna_sem  = $("#enama_warna"+$l).val();
                                    $kode_produk     = $("#ekp"+$l).val();
                                    $id_detail_produk= $("#eid_detprod"+$l).val();

                                    $ket = $("#eket"+$l).val();

                                    if($("#uwdel"+$l).prop("checked") == false){
                                        $cb = '<input type="checkbox" id="uwdel'+$l+'" name="uwdel'+$l+'" onclick="hapus_ukwar()"> hapus';
                                    } else{
                                        $cb = '<input type="checkbox" id="uwdel'+$l+'" name="uwdel'+$l+'" onclick="hapus_ukwar()" checked> hapus';
                                    }

                                    $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                                '<input type="hidden" id="eid_detprod'+($l)+'" name="eid_detprod'+($l)+'" value="'+$id_detail_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$l+'" id="eid_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$l+'" id="enama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$l+'"  id="eid_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="enama_warna'+$l+'"  id="enama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                }
                                    $tampung_isi =
                                    '<div id="divuw'+$jumlah_saat_ini+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $jumlah_saat_ini+
                                                '<input type="hidden" id="eket'+$jumlah_saat_ini+'" name="eket'+$jumlah_saat_ini+'" value="1">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$jumlah_saat_ini+'" name="ekp'+$jumlah_saat_ini+'" >'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$jumlah_saat_ini+'" id="eid_ukuran'+$jumlah_saat_ini+'" value="'+$ukuran+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$jumlah_saat_ini+'" id="enama_ukuran'+$jumlah_saat_ini+'" value="'+$nama_ukuran+'">'+
                                                $nama_ukuran+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$jumlah_saat_ini+'"  id="eid_warna'+$jumlah_saat_ini+'" value="'+$warna+'">'+
                                                '<input type="hidden" name="enama_warna'+$jumlah_saat_ini+'"  id="enama_warna'+$jumlah_saat_ini+'" value="'+$nama_warna+'">'+
                                                $nama_warna+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="checkbox" id="uwdel'+$jumlah_saat_ini+'" name="uwdel'+$jumlah_saat_ini+'" onclick="hapus_ukwar()"> hapus'+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                
                                    $("#ejumlah_ukprod").val($jumlah_saat_ini);
                                    //$("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                            }
                            else{
                                $tampung_isi ="";

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#eid_ukuran"+$l).val();
                                    $id_warna_sem  = $("#eid_warna"+$l).val();
                                    $nama_ukuran_sem = $("#enama_ukuran"+$l).val();
                                    $nama_warna_sem  = $("#enama_warna"+$l).val();
                                    $kode_produk     = $("#ekp"+$l).val();

                                    $ket = $("#eket"+$l).val();

                                    if($("#uwdel"+$l).prop("checked") == false){
                                        $cb = '<input type="checkbox" id="uwdel'+$l+'" name="uwdel'+$l+'" onclick="hapus_ukwar()"> hapus';
                                    } else{
                                        $cb = '<input type="checkbox" id="uwdel'+$l+'" name="uwdel'+$l+'" onclick="hapus_ukwar()" checked> hapus';
                                    }

                                    if($ket == 0){
                                        $id_detail_produk= $("#eid_detprod"+$l).val();

                                        $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                                '<input type="hidden" id="eid_detprod'+($l)+'" name="eid_detprod'+($l)+'" value="'+$id_detail_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$l+'" id="eid_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$l+'" id="enama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$l+'"  id="eid_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="enama_warna'+$l+'"  id="enama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                    }
                                    else if($ket == 1){
                                        $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$l+'" id="eid_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$l+'" id="enama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$l+'"  id="eid_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="enama_warna'+$l+'"  id="enama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                    }
                                }
                                alert("Mohon maaf, ukuran dan warna tersebut tidak dapat didaftarkan lagi, karena sudah terdaftar");
                            }
                            
                    
                        $tablenya = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                                '</tr>'+
                            '</thead>'+
                            $lama+
                            $tampung_isi+
                        '</table>';
                        
                        $("#etab_ketprod").html($tablenya);
                        //cek_terisi();
                    }
                });
            }
            else{
                alert("Silahkan pilih ukuran dan warna terlebih dahulu");
            }
        }
        
        else if($keterangan == 1){
            $ukuran = $("#eselect_ukuran").val();
            
            if($ukuran != ""){
                $jumlah_uw = $("#ejumlah_ukprod").val();
                $lama = "";
                $tampung_isi = "";
                var id_jenis_produk = $("#jenis_produk_edit").val();
                
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>produk/get_ukprod_warna",
                    dataType: "JSON",
                    data: {id_jenis_produk:id_jenis_produk},

                    success: function(respond){
                        
                        for($i=0;$i<respond['jm_ukprod'];$i++){
                            if(respond['ukprod'][$i]['id_ukuran_produk'] == $ukuran){
                                $nama_ukuran = respond['ukprod'][$i]['ukuran_produk'] +" "+respond['ukprod'][$i]['satuan_ukuran'];
                            }
                        }

                            $jumlah_uw   = $("#ejumlah_ukprod").val();
                            $jumlah_uw_l = $jumlah_uw;

                            $hitung = 0;
                            for($i=1;$i<=$jumlah_uw_l;$i++){
                                $id_ukurans = $("#eid_ukuran"+$i).val();

                                if($id_ukurans == $ukuran){
                                    $hitung++;
                                }
                            }
                            
                            if($hitung == 0){
                                $jumlah_saat_ini = parseInt($jumlah_uw) + parseInt(1);

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem   = $("#eid_ukuran"+$l).val();
                                    $nama_ukuran_sem = $("#enama_ukuran"+$l).val();
                                    $kode_produk     = $("#ekp"+$l).val();
                                    $id_detail_produk= $("#eid_detprod"+$l).val();

                                    $ket = $("#eket"+$l).val();

                                    if($("#del"+$l).prop("checked") == false){
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()"> hapus';
                                    } else{
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()" checked> hapus';
                                    }

                                    $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                                '<input type="hidden" id="eid_detprod'+($l)+'" name="eid_detprod'+($l)+'" value="'+$id_detail_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$l+'" id="eid_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$l+'" id="enama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                }
                                    $tampung_isi =
                                    '<div id="divuw'+$jumlah_saat_ini+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $jumlah_saat_ini+
                                                '<input type="hidden" id="eket'+$jumlah_saat_ini+'" name="eket'+$jumlah_saat_ini+'" value="1">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$jumlah_saat_ini+'" name="ekp'+$jumlah_saat_ini+'" >'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$jumlah_saat_ini+'" id="eid_ukuran'+$jumlah_saat_ini+'" value="'+$ukuran+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$jumlah_saat_ini+'" id="enama_ukuran'+$jumlah_saat_ini+'" value="'+$nama_ukuran+'">'+
                                                $nama_ukuran+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="checkbox" id="del'+$jumlah_saat_ini+'" name="del'+$jumlah_saat_ini+'" onclick="hapus_ukwar()"> hapus'+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                
                                    $("#ejumlah_ukprod").val($jumlah_saat_ini);
                                    //$("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                            }
                            else{
                                $tampung_isi ="";

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_ukuran_sem = $("#eid_ukuran"+$l).val();
                                    $nama_ukuran_sem = $("#enama_ukuran"+$l).val();
                                    $kode_produk     = $("#ekp"+$l).val();

                                    $ket = $("#eket"+$l).val();

                                    if($("#del"+$l).prop("checked") == false){
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()"> hapus';
                                    } else{
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()" checked> hapus';
                                    }

                                    if($ket == 0){
                                        $id_detail_produk= $("#eid_detprod"+$l).val();

                                        $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                                '<input type="hidden" id="eid_detprod'+($l)+'" name="eid_detprod'+($l)+'" value="'+$id_detail_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$l+'" id="eid_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$l+'" id="enama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                    }
                                    else if($ket == 1){
                                        $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_ukuran'+$l+'" id="eid_ukuran'+$l+'" value="'+$id_ukuran_sem+'">'+
                                                '<input type="hidden" name="enama_ukuran'+$l+'" id="enama_ukuran'+$l+'" value="'+$nama_ukuran_sem+'">'+
                                                $nama_ukuran_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                    }

                                }

                                alert("Mohon maaf, ukuran dan warna tersebut tidak dapat didaftarkan lagi, karena sudah terdaftar");
                            }
                            
                    
                        $tablenya = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Ukuran Produk</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                                '</tr>'+
                            '</thead>'+
                            $lama+
                            $tampung_isi+
                        '</table>';
                        
                        $("#etab_ketprod").html($tablenya);
                        //cek_terisi();
                    }
                });
            }
            else{
                alert("Silahkan pilih ukuran dan warna terlebih dahulu");
            }
        }
        
        else if($keterangan == 2){
            $warna  = $("#eselect_warna").val();
            
            if($warna != ""){
                $jumlah_uw = $("#ejumlah_ukprod").val();
                $lama = "";
                $tampung_isi = "";
                var id_jenis_produk = $("#jenis_produk_edit").val();
                
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>produk/get_ukprod_warna",
                    dataType: "JSON",
                    data: {id_jenis_produk:id_jenis_produk},

                    success: function(respond){
                        for($i=0;$i<respond['jm_warna'];$i++){
                            if(respond['warna'][$i]['id_warna'] == $warna){
                                $nama_warna = respond['warna'][$i]['nama_warna'];
                            }
                        }

                            $jumlah_uw   = $("#ejumlah_ukprod").val();
                            $jumlah_uw_l = $jumlah_uw;

                            $hitung = 0;
                            for($i=1;$i<=$jumlah_uw_l;$i++){
                                $id_warnas  = $("#eid_warna"+$i).val();

                                if($id_warnas == $warna){
                                    $hitung++;
                                }
                            }
                            
                            if($hitung == 0){
                                $jumlah_saat_ini = parseInt($jumlah_uw) + parseInt(1);

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_warna_sem    = $("#eid_warna"+$l).val();
                                    $nama_warna_sem  = $("#enama_warna"+$l).val();
                                    $kode_produk     = $("#ekp"+$l).val();
                                    $id_detail_produk= $("#eid_detprod"+$l).val();

                                    $ket = $("#eket"+$l).val();

                                    if($("#del"+$l).prop("checked") == false){
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()"> hapus';
                                    } else{
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()" checked> hapus';
                                    }

                                    $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                                '<input type="hidden" id="eid_detprod'+($l)+'" name="eid_detprod'+($l)+'" value="'+$id_detail_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$l+'"  id="eid_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="enama_warna'+$l+'"  id="enama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                }
                                    $tampung_isi =
                                    '<div id="divuw'+$jumlah_saat_ini+'">'+
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $jumlah_saat_ini+
                                                '<input type="hidden" id="eket'+$jumlah_saat_ini+'" name="eket'+$jumlah_saat_ini+'" value="1">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$jumlah_saat_ini+'" name="ekp'+$jumlah_saat_ini+'" >'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$jumlah_saat_ini+'"  id="eid_warna'+$jumlah_saat_ini+'" value="'+$warna+'">'+
                                                '<input type="hidden" name="enama_warna'+$jumlah_saat_ini+'"  id="enama_warna'+$jumlah_saat_ini+'" value="'+$nama_warna+'">'+
                                                $nama_warna+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="checkbox" id="del'+$jumlah_saat_ini+'" name="del'+$jumlah_saat_ini+'" onclick="hapus_ukwar()"> hapus'+
                                            '</td>'+
                                        '</tr>'+
                                    '</div>';
                                
                                    $("#ejumlah_ukprod").val($jumlah_saat_ini);
                                    //$("#jm_ketpod").val(parseInt($jm_ketpod)+parseInt(1));
                            }
                            else{
                                $tampung_isi ="";

                                for($l=1;$l<=$jumlah_uw_l;$l++){
                                    $id_warna_sem  = $("#eid_warna"+$l).val();
                                    $nama_warna_sem  = $("#enama_warna"+$l).val();
                                    $kode_produk     = $("#ekp"+$l).val();

                                    $ket = $("#eket"+$l).val();

                                    if($("#del"+$l).prop("checked") == false){
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()"> hapus';
                                    } else{
                                        $cb = '<input type="checkbox" id="del'+$l+'" name="del'+$l+'" onclick="hapus_ukwar()" checked> hapus';
                                    }

                                    if($ket == 0){
                                        $id_detail_produk= $("#eid_detprod"+$l).val();

                                        $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                                '<input type="hidden" id="eid_detprod'+($l)+'" name="eid_detprod'+($l)+'" value="'+$id_detail_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$l+'"  id="eid_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="enama_warna'+$l+'"  id="enama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                    }
                                    else if($ket == 1){
                                        $lama = $lama +
                                        '<tr>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $l+
                                                '<input type="hidden" id="eket'+($l)+'" name="eket'+($l)+'" value="'+$ket+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="text" class="form-control" id="ekp'+$l+'" name="ekp'+$l+'" value="'+$kode_produk+'">'+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                '<input type="hidden" name="eid_warna'+$l+'"  id="eid_warna'+$l+'" value="'+$id_warna_sem+'">'+
                                                '<input type="hidden" name="enama_warna'+$l+'"  id="enama_warna'+$l+'" value="'+$nama_warna_sem+'">'+
                                                $nama_warna_sem+
                                            '</td>'+
                                            '<td style="text-align: center;vertical-align: middle;">'+
                                                $cb+
                                            '</td>'+
                                        '</tr>';
                                    }

                                }

                                alert("Mohon maaf, ukuran dan warna tersebut tidak dapat didaftarkan lagi, karena sudah terdaftar");
                            }
                            
                    
                        $tablenya = 
                        '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                                    '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Kode Produk</th>'+
                                    '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Warna Produk</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                                '</tr>'+
                            '</thead>'+
                            $lama+
                            $tampung_isi+
                        '</table>';
                        
                        $("#etab_ketprod").html($tablenya);
                        //cek_terisi();
                    }
                });
            }
            else{
                alert("Silahkan pilih ukuran dan warna terlebih dahulu");
            }
        }
        
    }
</script>

<!-- add material edit -->
<script>
    function add_material_edit(){
        $jenis_material = $("#ejenis_material").val();
        //id dari material yang dipilih
        $id_nama_material  = $("#enama_material").val();
        //id dari line yang dipilih
        $line = $("#eline").val();

        if($jenis_material != "Jenis Material" && $id_nama_material != "Nama Material" && $line != "Nama Line" ){
            $nama_material = $("#enmmat"+$id_nama_material).val();
            $nama_line     = $("#enmline"+$line).val();
            $jumlah_km     = $("#ejumlah_km").val();
            $satuan_konsumsi = $("#eskmat"+$id_nama_material).val();

            //kalo sebelumnya sdah ada konsumsi material
                //1. kalo misalnya material & nama line yang mau ditambahkan sudah ada di list di tabel maka alert.
                $hitung = 0;
                for($i=1;$i<=$jumlah_km;$i++){
                    if(($("#eidmat"+$i).val() == $id_nama_material) && ($("#eidline"+$i).val() == $line)){
                       $hitung++;
                    }
                }

                if($hitung == 0){
                    //tampung yang lama
                    $lama = "";
                    
                    for($i=1;$i<=$jumlah_km;$i++){
                        $tampung_idmat  = $("#eidmat"+$i).val();
                        $tampung_nmmat  = $("#enmmat"+$i).val();
                        $tampung_idline = $("#eidline"+$i).val();
                        $tampung_nmline = $("#enmline"+$i).val();
                        $tampung_jmmat  = $("#ejmmat"+$i).val();
                        $tampung_skmat  = $("#eskmat"+$i).val();

                        $isi_stat_km = "";
                        
                        if($tampung_nmline == "Line Sewing"){
                            $stat_km_sewing = $("#stat_km_sewing"+$i).val();

                            if($stat_km_sewing == 0){
                                $optionnya = '<option value="0" selected>Cutting Kain</option>'+
                                '<option value="1">Lainnya</option>';
                            } else{
                                $optionnya = '<option value="0" >Cutting Kain</option>'+
                                '<option value="1" selected>Lainnya</option>';
                            }

                            $isi_stat_km = 
                            '<select class="form-control" name="stat_km_sewing'+$i+'" id="stat_km_sewing'+$i+'" onchange="ganti_stat_km_sewing(this)">'+
                                $optionnya+
                            '</select>';
                        } else{
                            $isi_stat_km ="";
                        }

                        $stat  = $("#estat"+$i).val();
                        $id_km = $("#eid_km"+$i).val();

                        if($("#del"+$i).prop("checked") == false){
                            $cb = '<input type="checkbox" id="del'+$i+'" name="del'+$i+'"> hapus';
                        } else{
                            $cb = '<input type="checkbox" id="del'+$i+'" name="del'+$i+'" checked> hapus';
                        }
                        
                        $lama = $lama + 
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $i+
                                    '<input type="hidden" name="estat'+$i+'" id="estat'+$i+'" value="'+$stat+'">'+
                                    '<input type="hidden" name="eid_km'+$i+'" id="eid_km'+$i+'" value="'+$id_km+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="eidmat'+$i+'" id="eidmat'+$i+'" value="'+$tampung_idmat+'">'+
                                    '<input type="hidden" name="enmmat'+$i+'" id="enmmat'+$i+'" value="'+$tampung_nmmat+'">'+
                                    $tampung_nmmat+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" name="eidline'+$i+'" id="eidline'+$i+'" value="'+$tampung_idline+'">'+
                                    '<input type="hidden" name="enmline'+$i+'" id="enmline'+$i+'" value="'+$tampung_nmline+'">'+
                                    $tampung_nmline+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="number" min="1" step=".01" class="form-control" name="ejmmat'+$i+'" id="ejmmat'+$i+'" value="'+$tampung_jmmat+'" required>'+
                                    $isi_stat_km+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<input type="hidden" class="form-control" id="eskmat'+$i+'" value="'+$tampung_skmat+'" >'+
                                    $tampung_skmat+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    $cb+
                                '</td>'+
                            '</tr>';
                        
                    }
                    
                    $jumlah_saat_ini = parseInt($jumlah_km) + parseInt(1);

                    $isi_stat_km = "";

                    if($nama_line == "Line Sewing"){
                        $isi_stat_km = 
                        '<select class="form-control" name="stat_km_sewing'+$jumlah_saat_ini+'" id="stat_km_sewing'+$jumlah_saat_ini+'">'+
                            '<option value="0">Cutting Kain</option>'+
                            '<option value="1">Lainnya</option>'+
                        '</select>';
                    } else{
                        $isi_stat_km ="";
                    }

                    $isinya = $lama +
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $jumlah_saat_ini+
                                '<input type="hidden" name="estat'+$jumlah_saat_ini+'" id="estat'+$jumlah_saat_ini+'" value="1">'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="eidmat'+$jumlah_saat_ini+'" id="eidmat'+$jumlah_saat_ini+'" value="'+$id_nama_material+'">'+
                                '<input type="hidden" name="enmmat'+$jumlah_saat_ini+'" id="enmmat'+$jumlah_saat_ini+'" value="'+$nama_material+'">'+
                                $nama_material+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="eidline'+$jumlah_saat_ini+'"  id="eidline'+$jumlah_saat_ini+'" value="'+$line+'">'+
                                '<input type="hidden" name="enmline'+$jumlah_saat_ini+'"  id="enmline'+$jumlah_saat_ini+'" value="'+$nama_line+'">'+
                                $nama_line+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="number" min="1" step=".01" class="form-control" name="ejmmat'+$jumlah_saat_ini+'" id="ejmmat'+$jumlah_saat_ini+'" required>'+
                                $isi_stat_km+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" class="form-control" id="eskmat'+$jumlah_saat_ini+'" value="'+$satuan_konsumsi+'" >'+
                                $satuan_konsumsi+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="checkbox" id="del'+$jumlah_saat_ini+'" name="del'+$jumlah_saat_ini+'"> hapus'+
                            '</td>'+
                        '</tr>';
                    
                    $("#ejumlah_km").val($jumlah_saat_ini);
                    
                }
                else{
                    alert("Mohon maaf material untuk nama line tersebut tidak dapat di daftarkan lagi karena sudah terdaftar");
                }
        
           
            $tampung_konsumsi_material =   
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-md-1" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th class="col-md-5" style="text-align: center;vertical-align: middle;">Nama Material</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Nama Line</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Jumlah Material</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Satuan Konsumsi</th>'+
                            '<th class="col-md-3" style="text-align: center;vertical-align: middle;">Aksi</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isinya+
                    '</tbody>'+
                '</table>';

                $("#etable_km").html($tampung_konsumsi_material);   
                
        }
        else{
            alert("Silahkan pilih jenis material, kemudian pilih nama material & line untuk menambahkan konsumsi material");
        }
    }
</script>

<!-- ganti jenis material (edit) -->
<script>
    function ganti_jm_edit(){
        var id_jenis_material = $("#ejenis_material").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/get_nama_material",
            dataType: "JSON",
            data: {id_jenis_material:id_jenis_material},

            success: function(respond){
                $jumlah_material = respond['jumlah_materials'];

                $tampung_material        = "";
                $tampung_nama_material   = "";
                $tampung_satuan_konsumsi = "";

                for($i=0;$i<$jumlah_material;$i++){
                    $id_material   = respond['materials'][$i]['id_sub_jenis_material'];
                    $nama_material = respond['materials'][$i]['nama_sub_jenis_material'];
                    $satuan_konsumsi = respond['materials'][$i]['satuan_keluar'];

                    $tampung_material = $tampung_material + 
                    '<option value="'+$id_material+'">'+
                        $nama_material+
                    '</option>';

                    $tampung_nama_material = $tampung_nama_material +
                    '<input type="hidden" id="enmmat'+$id_material+'" value="'+$nama_material+'">';

                    $tampung_satuan_konsumsi = $tampung_satuan_konsumsi+
                    '<input type="hidden" id="eskmat'+$id_material+'" value="'+$satuan_konsumsi+'">';
                }

                $isi = '<select class="form-control" name="enama_material" id="enama_material">'+
                            '<option value="Nama Material">Nama Material</option>'+
                            $tampung_material+
                        '</select>'+
                        $tampung_nama_material;
                $("#eganti_nm").html($isi);
                
                $("#esatuan_konsumsi").html($tampung_satuan_konsumsi);
            }
        }); 
    }
</script>

<!-- log -->
<script>
    $('.blog_klik').click(function(){
        var id = $(('#blog')+$(this).attr('value')).val();
        $('#id_terpilih').val(id);

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>produk/ambil_data_log",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                
                $("#input_date").html(respond['input_date']);
                $("#input_user").html(respond['input_user']);
                
                $jumlah_log  = respond['jumlah_log'];
                $jumlah_user = respond['jumlah_user'];

                $tampung_isi =" ";

                for($i=0;$i<$jumlah_log;$i++){
                    if(respond['log'][$i]['keterangan_log'] == "Insert Data"){
                        
                        for($j=0;$j<$jumlah_user;$j++){
                            if(respond['log'][$i]['user_add'] == respond['user'][$j]['id_user']){
                                $nama_user       = respond['user'][$j]['nama_karyawan'];
                            }
                        } 

                        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                        var tanggal = new Date(respond['log'][$i]['waktu_add']).getDate();
                        var xhari = new Date(respond['log'][$i]['waktu_add']).getDay();
                        var xbulan = new Date(respond['log'][$i]['waktu_add']).getMonth();
                        var xtahun = new Date(respond['log'][$i]['waktu_add']).getYear();
                        
                        var jam     = new Date(respond['log'][$i]['waktu_add']).getHours();
                        var menit   = new Date(respond['log'][$i]['waktu_add']).getMinutes();
                        var detik   = new Date(respond['log'][$i]['waktu_add']).getSeconds();
                        
                        var hari = hari[xhari];
                        var bulan = bulan[xbulan];
                        var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                        $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun +' '+jam+':'+menit+':'+detik;

                        $tanggal = $tanggalnya;
                    
                        $user = $nama_user;

                        $nama_jenis_produk = "";

                        for($q=0;$q<respond['jm_jenis_produk'];$q++){
                            if(respond['log'][$i]['id_jenis_produk'] == respond['jenis_produk'][$q]['id_jenis_produk']){
                                $nama_jenis_produk = respond['jenis_produk'][$q]['nama_jenis_produk'];
                            }
                        }

                        $status_produksi = "";
                        if(respond['log'][$i]['keterangan_produksi'] == 0){
                            $status_produksi = "Full Produksi";
                        } else{
                            $status_produksi = "Purchase Cover";
                        }

                        var num = "Rp "+  new Number(respond['log'][$i]['harga_produk']).toLocaleString("id-ID") + ",00";

                        $data =  $data = "Nama Jenis Produk (" + $nama_jenis_produk +
                                    ") , Nama Produk (" + respond['log'][$i]['nama_produk'] + 
                                    ") , Harga Produk (" + num + ") , "+
                                    "Keterangan Produk (" + $status_produksi + ")";

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ $tanggal +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ $user +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td style="vertical-align: middle;">'+ $data +'</td>' +
                        '</tr>';
                    }
                    
                    else{
                        for($j=0;$j<$jumlah_user;$j++){
                            if(respond['log'][$i]['user_edit'] == respond['user'][$j]['id_user']){
                                $nama_user       = respond['user'][$j]['nama_karyawan'];
                            }
                        } 
                        
                        $user = $nama_user;
            
                        $data = " ";
                        $count = 0;

                        if(respond['log'][$i]['id_jenis_produk'] == respond['log'][$i+1]['id_jenis_produk']){
                           $data = $data;
                        }
                        else{
                            for($q=0;$q<respond['jm_jenis_produk'];$q++){
                                if(respond['log'][$i]['id_jenis_produk'] == respond['jenis_produk'][$q]['id_jenis_produk']){
                                    $nama_jenis_produk = respond['jenis_produk'][$q]['nama_jenis_produk'];
                                }
                            }

                            $data = "Nama Jenis Produk (" + $nama_jenis_produk + ")";
                        }


                        if(respond['log'][$i]['nama_produk'] == respond['log'][$i+1]['nama_produk']){
                           $data = $data;
                        }
                        else{
                            if($count == 0){
                                $data = "Nama Produk (" + respond['log'][$i]['nama_produk'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Nama Produk (" + respond['log'][$i]['nama_produk'] + ")";
                            }
                            $count++;
                        }


                        if(respond['log'][$i]['harga_produk'] == respond['log'][$i+1]['harga_produk']){
                           $data = $data;
                        }
                        else{
                            var num = "Rp "+  new Number(respond['log'][$i]['harga_produk']).toLocaleString("id-ID") + ",00";

                            if($count == 0){
                                $data = "Harga Produk (" + num + ")";
                            }
                            else{
                                $data = $data + ", "+ "Harga Produk (" + num + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['keterangan_produksi'] == respond['log'][$i+1]['keterangan_produksi']){
                           $data = $data;
                        }
                        else{
                            if($count == 0){
                                $data = "Keterangan Produksi (" + respond['log'][$i]['keterangan_produksi'] + ")";
                            }
                            else{

                                if(respond['log'][$i]['keterangan_produksi'] == 0){
                                    $status_produksi = "Full Produksi";
                                } else{
                                    $status_produksi = "Purchase Cover";
                                }

                                $data = $data + ", "+ "Keterangan Produksi (" + $status_produksi + ")";
                            }
                            $count++;
                        }
                        
                        
                        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                        var tanggal = new Date(respond['log'][$i]['waktu_edit']).getDate();
                        var xhari = new Date(respond['log'][$i]['waktu_edit']).getDay();
                        var xbulan = new Date(respond['log'][$i]['waktu_edit']).getMonth();
                        var xtahun = new Date(respond['log'][$i]['waktu_edit']).getYear();
                        
                        var jam     = new Date(respond['log'][$i]['waktu_edit']).getHours();
                        var menit   = new Date(respond['log'][$i]['waktu_edit']).getMinutes();
                        var detik   = new Date(respond['log'][$i]['waktu_edit']).getSeconds();
                        
                        var hari = hari[xhari];
                        var bulan = bulan[xbulan];
                        var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                        $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun +' '+jam+':'+menit+':'+detik;

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+ $tanggalnya +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ $user +'</td>' +
                        '<td style="text-align: center;vertical-align: middle;">'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td style="vertical-align: middle;">'+ $data +'</td>' +
                        '</tr>'

                    }
                }

                $isi = '<br><br>'+
                '<table class="table table-bordered table-striped mb-none" ' +
                'id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th class="col-lg-2"><center>Tanggal</center></th>'+
                            '<th class="col-lg-3"><center>User</center></th>'+
                            '<th class="col-lg-1"><center>Aksi</center></th>'+
                            '<th class="col-lg-6"><center>Data</center></th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $tampung_isi +
                    '</tbody>' +
                '</table>';

                $("#isi_log").html($isi);
                
                $("#modallog").modal();
            }
        });

    });
</script>


