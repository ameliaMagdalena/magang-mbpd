<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Surat Permintah Lembur Belum Diproses</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Surat Permintah Lembur Belum Diproses</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Surat Perintah Lembur Belum Diproses</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th style="text-align: center;vertical-align: middle;">No</th>
                        <th style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th style="text-align: center;vertical-align: middle;">Nama Line</th>
                        <th style="text-align: center;vertical-align: middle;">Status</th>
                        <th style="text-align: center;vertical-align: middle;">Keterangan</th>
                        <th style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($surat_perintah_lembur as $spl){
                    ?>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;"><?= $no;?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $spl->tanggal;?></td>
                            <td style="text-align: center;vertical-align: middle;"><?= $spl->nama_line;?> </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php if($spl->status_spl == 0){
                                        $status_spl = "Belum Diproses";
                                    }
                                    else if($spl->status_spl == 1){
                                        $status_spl = "Belum Disetujui";
                                    }
                                    else if($spl->status_spl == 2){
                                        $status_spl = "Belum Dikonfirmasi";
                                    }    
                                    else if($spl->status_spl >= 3 && $spl->status_spl < 6){
                                        $status_spl = "Terkonfirmasi";
                                    }  
                                    else{
                                        $status_spl = "Batal";
                                    }
                                    echo $status_spl;
                                ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle;">
                                <?php if($spl->keterangan_spl == 0){
                                    echo "Berdasarkan Perencanaan Produksi";
                                }
                                else if ($spl->keterangan_spl == 1){
                                    echo "Lainnya";
                                }
                                else{
                                    echo "Berdasarkan Perencanaan Produksi & Lainnya";
                                }
                                ?>
                            </td>
                            <td  class="col-lg-3">
                                <!--- STATUS 0 -->
                                <?php if($spl->status_spl == 0){?>
                                        <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                        title="Detail" href="#modaldetail1<?= $spl->id_surat_perintah_lembur ?>"></a>
                                    <?php if($spl->keterangan_spl == 1){?>
                                        <?php if($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" ||
                                                $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                                $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                                title="Edit" href="#modaledit1<?= $spl->id_surat_perintah_lembur ?>"></a>
                                            <?php if($spl->keterangan_spl == 1 || $spl->keterangan_spl == 0 || $spl->keterangan_spl == 2){?>
                                                <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                                title="Hapus" href="#modalhapus1<?= $spl->id_surat_perintah_lembur ?>"></a>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if($_SESSION['nama_jabatan'] == "PIC Line Cutting" && $_SESSION['nama_departemen'] == "Produksi" || 
                                            $_SESSION['nama_jabatan'] == "PIC Line Bonding" && $_SESSION['nama_departemen'] == "Produksi" ||
                                            $_SESSION['nama_jabatan'] == "PIC Line Sewing" && $_SESSION['nama_departemen'] == "Produksi" ||
                                            $_SESSION['nama_jabatan'] == "PIC Line Assy" && $_SESSION['nama_departemen'] == "Produksi" || 
                                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                                <button type="button" class="bpros_klik col-lg-3 btn btn-success fa fa-gear" 
                                                id="bpros<?= $spl->id_surat_perintah_lembur?>" value="<?= $spl->id_surat_perintah_lembur?>" title="Proses"></button>
                                    <?php }?>
                                <!--- STATUS 1 -->
                                <?php }  else if($spl->status_spl == 1){?>
                                        <button type="button" class="bdet1_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                        id="bdet1<?= $spl->id_surat_perintah_lembur?>" value="<?= $spl->id_surat_perintah_lembur?>" title="Detail"></button>
                                    <?php if($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" ||
                                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                        <a class="modal-with-form col-lg-3 btn btn-success fa fa-check-square"
                                            title="Konfirmasi" href="#modalsetuju<?= $spl->id_surat_perintah_lembur ?>"></a>
                                    <?php } ?>
                                    <?php if($_SESSION['nama_jabatan'] == "PIC Line Cutting" && $_SESSION['nama_departemen'] == "Produksi" || 
                                        $_SESSION['nama_jabatan'] == "PIC Line Bonding" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "PIC Line Sewing" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "PIC Line Assy" && $_SESSION['nama_departemen'] == "Produksi" ||
                                        $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                        $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                            <button type="button" class="bedit1_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                                id="bedit1<?= $spl->id_surat_perintah_lembur?>" value="<?= $spl->id_surat_perintah_lembur?>" title="Edit"></button>
                                    <?php }?>
                                <!--- STATUS 2 -->
                                <?php } else if($spl->status_spl == 2){?>
                                    <button type="button" class="bdet1_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                        id="bdet1<?= $spl->id_surat_perintah_lembur?>" value="<?= $spl->id_surat_perintah_lembur?>" title="Detail"></button>
                                    <?php if($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" ||
                                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                                <a class="modal-with-form col-lg-3 btn btn-danger fa  fa-times-circle"
                                                title="Belum Dikonfirmasi" href="#modalunsetuju<?= $spl->id_surat_perintah_lembur?>"></a>
                                    <?php } ?>
                                    <?php if($_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management" ||
                                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" ){?>
                                        <a class="modal-with-form col-lg-3 btn btn-success fa fa-check-square"
                                        title="Konfirmasi" href="#modalkonfirmasi<?= $spl->id_surat_perintah_lembur?>"></a>
                                    <?php } ?>
                                <!--- STATUS 3 - 5 -->
                                <?php } else if($spl->status_spl >= 3){?>
                                        <button type="button" class="bdet1_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                        id="bdet1<?= $spl->id_surat_perintah_lembur?>" value="<?= $spl->id_surat_perintah_lembur?>" title="Detail"></button>
                                        <form method="POST" action="<?= base_url()?>suratPerintahLembur/print">
                                            <input type="hidden" name="id" value="<?= $spl->id_surat_perintah_lembur?>">
                                            <button type="submit" class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                            title="Print"></button>
                                        </form> 
                                <?php } ?>
                            </td>
                        </tr>

                        <!-- modal detail untuk SPL 0 -->
                        <div id='modaldetail1<?= $spl->id_surat_perintah_lembur ?>' class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Detail Surat Perintah Lembur</h2>
                                </header>

                                <div class="panel-body">
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input class="form-control col-md-5" type="date"
                                            value="<?= $spl->tanggal?>" readonly> 
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Line</label>
                                        <div class="col-sm-9">
                                            <input class="form-control col-md-5" type="text"
                                            value="<?= $spl->nama_line?>" readonly> 
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Waktu</label>
                                        <div class="col-sm-9">
                                            <input class="form-control col-md-5" type="text"
                                            value="<?= $spl->waktu_lembur?>" readonly> 
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" data-plugin-textarea-autosize readonly><?= $spl->keterangan_perintah?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Status<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                        <input class="form-control col-md-5" type="text" value="Belum Diproses" readonly> 
                                        </div>
                                    </div>
                                </div>

                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="button" class="btn btn-default modal-dismiss" value="Ok">
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>

                        <!-- modal edit untuk SPL yang belum diproses -->
                        <div id='modaledit1<?= $spl->id_surat_perintah_lembur?>' class="modal-block modal-block-primary mfp-hide">
                            <form method="POST" action="<?= base_url()?>suratPerintahLembur/edit_spl">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Surat Perintah Lembur</h2>
                                    </header>

                                    <div class="panel-body">
                                        <input class="form-control col-md-5" type="hidden" id="id_spl" name="id_spl"
                                        value="<?= $spl->id_surat_perintah_lembur?>" required>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input class="form-control col-md-5" type="date" id="tanggal" name="tanggal"
                                            value="<?= $spl->tanggal?>" min="<?= $tudei?>" onchange="cek_tanggal()" required> 
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Line</label>
                                        <div class="col-sm-9">
                                            <select name="id_line" id="id_line" class="form-control mb-md" onchange="cek_tanggal()" required>
                                                <?php foreach($line as $ln){
                                                    if($ln->id_line == $spl->id_line){
                                                ?>
                                                    <option value="<?= $ln->id_line ?>" selected>
                                                        <?= $ln->nama_line ?>
                                                    </option>
                                                <?php 
                                                    } else{
                                                ?>
                                                    <option value="<?= $ln->id_line ?>">
                                                        <?= $ln->nama_line ?>
                                                    </option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Waktu</label>
                                        <div class="col-sm-9">
                                            <input class="form-control col-md-5" type="text" id="waktu_lembur" name="waktu_lembur"
                                            value="<?= $spl->waktu_lembur?>" readonly> 
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" data-plugin-textarea-autosize
                                            id="keterangan" name="keterangan"><?= $spl->keterangan_perintah?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Status<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                        <input class="form-control col-md-5" type="text" value="Belum Diproses" readonly> 
                                        </div>
                                    </div>
                                </div>

                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <input type="submit" class="btn btn-primary" value="Simpan" id="button_edit_ppic">
                                                <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                                            </div>
                                        </div>
                                    </footer>
                                </section>
                            </form>
                        </div>

                        <!-- modal delete untuk SPL yang belum diproses -->
                        <div id="modalhapus1<?= $spl->id_surat_perintah_lembur?>" class="modal-block modal-block-sm mfp-hide">
                            <form method="POST" action="<?= base_url()?>suratPerintahLembur/delete_spl">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Hapus Data Surat Perintah Lembur</h2>
                                    </header>

                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <input type="hidden" name="id_spl" value="<?= $spl->id_surat_perintah_lembur?>">
                                                    <p>Apakah anda yakin akan menghapus data surat perintah lembur untuk 
                                                    <?= $spl->nama_line ?> pada tanggal <?= $spl->tanggal?>?</p>
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

                        <!-- modal setuju PPIC -->
                        <div id="modalsetuju<?= $spl->id_surat_perintah_lembur?>" class="modal-block modal-block-sm mfp-hide">
                            <form method="POST" action="<?= base_url()?>suratPerintahLembur/ppic_setuju">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Konfirmasi Surat Perintah Lembur</h2>
                                    </header>

                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <input type="hidden" name="id_spl" value="<?= $spl->id_surat_perintah_lembur?>"> 
                                                    <p>Apakah anda yakin akan mengkonfirmasi surat printah lembur untuk <?= $spl->nama_line ?> pada tanggal <?= $spl->tanggal?>?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <input type="submit" class="btn btn-primary" value="Ya">
                                                    <button class="btn btn-default modal-dismiss">Batal</button>
                                                </div>
                                            </div>
                                        </footer>
                                </section>
                            </form>
                        </div>

                        <!-- modal unsetuju PPIC -->
                        <div id="modalunsetuju<?= $spl->id_surat_perintah_lembur?>" class="modal-block modal-block-sm mfp-hide">
                            <form method="POST" action="<?= base_url()?>suratPerintahLembur/ppic_unsetuju">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Konfirmasi Surat Perintah Lembur</h2>
                                    </header>

                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <input type="hidden" name="id_spl" value="<?= $spl->id_surat_perintah_lembur?>"> 
                                                    <p>Apakah anda yakin akan membatalkan konfirmasi terhadap surat printah lembur untuk 
                                                    <?= $spl->nama_line?> pada tanggal <?=  $spl->tanggal?>?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <input type="submit" class="btn btn-primary" value="Ya">
                                                    <button class="btn btn-default modal-dismiss">Batal</button>
                                                </div>
                                            </div>
                                        </footer>
                                </section>
                            </form>
                        </div>

                        <!-- modal konfirmasi manager -->
                        <div id="modalkonfirmasi<?= $spl->id_surat_perintah_lembur?>" class="modal-block modal-block-sm mfp-hide">
                            <form method="POST" action="<?= base_url()?>suratPerintahLembur/manager_konfirmasi">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title">Konfirmasi Surat Perintah Lembur</h2>
                                    </header>

                                        <div class="panel-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-text">
                                                    <input type="hidden" name="id_spl" value="<?= $spl->id_surat_perintah_lembur?>"> 
                                                    <p>Apakah anda yakin akan mengkonfirmasi surat printah lembur untuk <?= $spl->nama_line ?> pada tanggal <?= $spl->tanggal?>?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <input type="submit" class="btn btn-primary" value="Ya">
                                                    <button class="btn btn-default modal-dismiss">Batal</button>
                                                </div>
                                            </div>
                                        </footer>
                                </section>
                            </form>
                        </div>

                    <?php $no++; } ?>

                </tbody>
	        </table>
        </div>
    </div>
    
    <!-- modal proses pic -->
    <div class="modal" id="modalproses" role="dialog">
        <div class="modal-dialog modal-xl" style="width:60%">
            <form method="POST" action="<?= base_url()?>suratPerintahLembur/simpan_karyawan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Proses Surat Perintah Lembur</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_spl_pros" id="id_spl_pros">  
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="date" id="tanggal_pros"
                                value="20-07-2020" readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Line<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="line_pros"
                                value="Line Cutting" readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Waktu<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" id="waktu_pros"
                                value="Hari Kerja" readonly> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Keterangan<span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" id="keterangan_pros"
                                data-plugin-textarea-autosize required readonly></textarea>
                            </div>
                        </div>

                        <br>
                        <div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">
                            <div class="col-md-5 form-group" id="ganti_kar">
                                <select class="form-control" name="select_karyawan" id="select_karyawan">
                                    <option value="">Nama Karyawan</option>
                                </select>
                            </div>
                            <div class="col-md-1 form-group">
                                <button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"
                                title="Add"  onclick="add_karyawan()"></button>
                            </div>
                        </div>
                    <br>
                    
                    <div id="table_karyawan">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th class="col-sm-1" style="text-align: center;vertical-align: middle;">No</th>
                                    <th class="col-sm-4" style="text-align: center;vertical-align: middle;">Nama Karyawan</th>
                                    <th class="col-sm-1" style="text-align: center;vertical-align: middle;">Planning Lembur (jam)</th>
                                    <th class="col-sm-3" style="text-align: center;vertical-align: middle;">Jam Lembur (IN)</th>
                                    <th class="col-sm-3" style="text-align: center;vertical-align: middle;">Keterangan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                        <input type="hidden" id="jumlah_karyawan" name="jumlah_karyawan" value="0">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" onclick="reload()" value="Batal">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal detail2 -->
    <div class="modal" id="modaldetail2" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Surat Perintah Lembur</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input class="form-control col-md-5" type="date" id="det2_tanggal"
                            readonly> 
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Line</label>
                        <div class="col-sm-9">
                            <input class="form-control col-md-5" type="text" id="det2_line"
                            readonly> 
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Waktu</label>
                        <div class="col-sm-9">
                            <input class="form-control col-md-5" type="text" id="det2_waktu"
                            readonly> 
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" id="det2_keterangan" data-plugin-textarea-autosize required readonly></textarea>
                        </div>
                    </div>

                    <br>
                    <div id="table_detail2"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit pic -->
    <div class="modal" id="modaleditpic" role="dialog">
        <div class="modal-dialog modal-xl" style="width:60%">
            <form method="POST" action="<?= base_url()?>suratPerintahLembur/edit_pic">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Proses Surat Perintah Lembur</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="ed_id_spl" id="ed_id_spl">
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="date" readonly
                                name="ed_tanggal" id="ed_tanggal"> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Line</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" readonly
                                name="ed_line" id="ed_line"> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Waktu</label>
                            <div class="col-sm-9">
                                <input class="form-control col-md-5" type="text" readonly
                                name="ed_waktu" id="ed_waktu"> 
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="ed_keterangan" id="ed_keterangan"
                                data-plugin-textarea-autosize readonly></textarea>
                            </div>
                        </div>
                        
                        <br>

                        <div class="row" style="font-size:10px;background-color:#e1e2e3;padding-top:17px;margin: 0px 5px 0px 5px;border-radius:5px">
                            <div class="col-md-5 form-group" id="ganti_kar">
                                <select class="form-control" name="ed_select_karyawan" id="ed_select_karyawan">
                                    <option value="">Nama Karyawan</option>
                                    <?php foreach ($karyawan as $kr){?>
                                        <option value="<?= $kr->id_karyawan ?>"><?= $kr->nama_karyawan ?></option>
                                    <?php } ?>
                                </select>
                                <?php foreach($karyawan as $k){?>
                                    <input type="hidden" id="ed_kar<?= $k->id_karyawan?>" value="<?= $k->nama_karyawan ?>">
                                <?php } ?>
                            </div>
                            <div class="col-md-1 form-group">
                                <button type="button" class="btn btn-success fa fa-plus-square-o" style="color:white"
                                title="Add"  onclick="ed_add_karyawan()"></button>
                            </div>
                        </div>

                        <br>
                        <div id="table_edit2"></div>
                        <input type="hidden" name="ed_jumkar" id="ed_jumkar">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" onclick="reload()" value="Batal">
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

<script>
    function cek_tanggal(){
        var tanggal = $("#tanggal").val();
        var id_line = $("#id_line").val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratPerintahLembur/cek_tanggal",
            dataType: "JSON",
            data: {tanggal:tanggal,id_line:id_line},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, surat perintah lembur untuk tanggal dan line tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    reload();
                }
                else{
                    $("#waktu_lembur").val(respond['harinya']);
                }
            }
        });
    }

</script>

<!-- cek tanggal untuk edit spl ppic -->
<script>
    function cek_tanggal(){
        var tanggal = $("#tanggal").val();
        var id_line = $("#id_line").val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratPerintahLembur/cek_tanggal",
            dataType: "JSON",
            data: {tanggal:tanggal,id_line:id_line},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, surat perintah lembur untuk tanggal dan line tersebut tidak dapat didaftarkan lagi karena sudah terdaftar");
                    reload();
                }
                else{
                    $("#waktu_lembur").val(respond['harinya']);
                }
            }
        });

        simpan();
    }

</script>

<!-- proses spl -->
<script>
     $('.bpros_klik').click(function(){
        var id = $(('#bpros')+$(this).attr('value')).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratPerintahLembur/get_spl",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#id_spl_pros").val(respond['spl'][0]['id_surat_perintah_lembur']);
                $("#tanggal_pros").val(respond['spl'][0]['tanggal']);
                $("#line_pros").val(respond['spl'][0]['nama_line']);
                $("#waktu_pros").val(respond['spl'][0]['waktu_lembur']);
                $("#keterangan_pros").val(respond['spl'][0]['keterangan_perintah']);

                $isi_select ="";
                $nmkar = "";

                for($i=0;$i<respond['jm_karyawan'];$i++){
                    $isi_select = $isi_select +
                    '<option value="'+respond['karyawan'][$i]['id_karyawan']+'" >'+
                        respond['karyawan'][$i]['nama_karyawan']+
                    '</option>';
                    
                    $nmkar = $nmkar +
                    '<input type="hidden" id="kar'+respond['karyawan'][$i]['id_karyawan']+'" value="'+respond['karyawan'][$i]['nama_karyawan']+'">';
                }

                $select = '<select class="form-control" name="select_karyawan" id="select_karyawan">'+
                                    '<option value="">Nama Karyawan</option>'+
                                    $isi_select+
                            '</select>'+
                            $nmkar;

                $("#ganti_kar").html($select);
                
                $("#modalproses").modal();
            }
        });
        

     });
</script>

<!-- add karyawan insert-->
<script>
    function add_karyawan(){
        $id_karyawan = $("#select_karyawan").val();

        if($id_karyawan != ""){
            $nama_karyawan   = $("#kar"+$id_karyawan).val();
            $jumlah_karyawan = $("#jumlah_karyawan").val();

            if($jumlah_karyawan == 0){
                $jumlah_now = 1;
                $lama = "";
                $isi ='<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_now+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                '<input type="hidden" value="'+$id_karyawan+'" id="idkar'+$jumlah_now+'" name="idkar'+$jumlah_now+'" '+
                                'class="form-control" readonly>'+
                                '<input type="hidden" value="'+$nama_karyawan+'" id="nmkar'+$jumlah_now+'" name="nmkar'+$jumlah_now+'" '+
                                'class="form-control" readonly>'+
                                $nama_karyawan+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="number" id="jam'+$jumlah_now+'" name="jam'+$jumlah_now+'" min="1" max="24"'+
                            'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="time" id="in'+$jumlah_now+'" name="in'+$jumlah_now+'" '+
                            'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<textarea class="form-control" rows="2" id="ket'+$jumlah_now+'" name="ket'+$jumlah_now+'" '+
                                'data-plugin-textarea-autosize></textarea>'+
                            '</center>'+
                        '</td>'+
                    '</tr>';

                    $("#jumlah_karyawan").val($jumlah_now);
            }
            else{
                $hitung = 0;
                 for($i=1;$i<=$jumlah_karyawan;$i++){
                     if($("#idkar"+$i).val() == $id_karyawan){
                         $hitung++;
                     }
                 }

                 if($hitung == 0){
                    $lama = "";
                    
                    $jumlah_now_ = parseInt($jumlah_karyawan);
                    $jumlah_now = $jumlah_now_ + 1;

                    for($i=1;$i<=$jumlah_now_;$i++){
                        $id_karyawan_tam   = $("#idkar"+$i).val();
                        $nama_karyawan_tam = $("#nmkar"+$i).val();
                        $jam_tam           = $("#jam"+$i).val();
                        $in_tam            = $("#in"+$i).val();
                        $out_tam           = $("#out"+$i).val();
                        $ket_tam           = $("#ket"+$i).val();

                        $lama = $lama +
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $i+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                    '<input type="hidden" value="'+$id_karyawan_tam+'" id="idkar'+$i+'" name="idkar'+$i+'" '+
                                    'class="form-control" readonly>'+
                                    '<input type="hidden" value="'+$nama_karyawan_tam+'" id="nmkar'+$i+'" name="nmkar'+$i+'" '+
                                    'class="form-control" readonly>'+
                                    $nama_karyawan_tam+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<input type="number" id="jam'+$i+'" name="jam'+$i+'" value="'+$jam_tam+'" '+
                                'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<input type="time" id="in'+$i+'" name="in'+$i+'" value="'+$in_tam+'" '+
                                'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;" >'+
                                '<center>'+
                                '<textarea class="form-control" rows="2" id="ket'+$i+'" name="ket'+$i+'" '+
                                    'data-plugin-textarea-autosize>'+$ket_tam+'</textarea>'+
                                '</center>'+
                            '</td>'+
                        '</tr>';

                        $isi =
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $jumlah_now+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                    '<input type="hidden" value="'+$id_karyawan+'" id="idkar'+$jumlah_now+'" name="idkar'+$jumlah_now+'" '+
                                    'class="form-control" readonly>'+
                                    '<input type="hidden" value="'+$nama_karyawan+'" id="nmkar'+$jumlah_now+'" name="nmkar'+$jumlah_now+'" '+
                                    'class="form-control" readonly>'+
                                    $nama_karyawan+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<input type="number" id="jam'+$jumlah_now+'" name="jam'+$jumlah_now+'" '+
                                'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<input type="time" id="in'+$jumlah_now+'" name="in'+$jumlah_now+'" '+
                                'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<textarea class="form-control" rows="2" id="ket'+$jumlah_now+'" name="ket'+$jumlah_now+'" '+
                                    'data-plugin-textarea-autosize></textarea>'+
                                '</center>'+
                            '</td>'+
                        '</tr>';

                        $("#jumlah_karyawan").val($jumlah_now);
                     }
                 } else{
                     alert("Mohon maaf karyawan tidak dapat didaftarkan lagi karena sudah terdaftar");
                 }

            }

            $tablenya = 
            '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                '<thead>'+
                    '<tr>'+
                        '<th class="col-sm-1" style="text-align: center;vertical-align: middle;">No</th>'+
                        '<th class="col-sm-4" style="text-align: center;vertical-align: middle;">Nama Karyawan</th>'+
                        '<th class="col-sm-1" style="text-align: center;vertical-align: middle;">Planning Lembur (jam)</th>'+
                        '<th class="col-sm-3" style="text-align: center;vertical-align: middle;">Jam Lembur (IN)</th>'+
                        '<th class="col-sm-3" style="text-align: center;vertical-align: middle;">Keterangan</th>'+
                    '</tr>'+
                '<tbody>'+
                $lama+
                $isi+
                '</tbody>'+
                '</thead>'+
            '</table>';

            $("#table_karyawan").html($tablenya);
            
        }
        else{
            alert("Silakan pilih karyawan terlebih dahulu");
        }
    }
</script>

<!-- detail kalo 1 -->
<script>
    $('.bdet1_klik').click(function(){
        //SPL-1
        var id = $(('#bdet1')+$(this).attr('value')).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratPerintahLembur/detail_spl_dspl",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#det2_tanggal").val(respond['spl'][0]['tanggal']);
                $("#det2_line").val(respond['spl'][0]['nama_line']);
                $("#det2_waktu").val(respond['spl'][0]['waktu_lembur']);
                $("#det2_keterangan").val(respond['spl'][0]['keterangan_perintah']);

                $isi = "";

                for($i=0;$i<respond['jm_dspl'];$i++){
                   // alert($i);
                   $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1) +
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['nama_karyawan'] +
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['planning_lembur']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_in_plan']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['waktu_out_plan']+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['dspl'][$i]['keterangan_plan']+
                        '</td>'+
                    '</tr>';
                }


                $tablenya = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">Nama Karyawan</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">Planning Lembur (jam)</th>'+
                            '<th colspan="2" style="text-align: center;vertical-align: middle;">Jam Lembur</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">Keterangan</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">IN</th>'+
                            '<th style="text-align: center;vertical-align: middle;">OUT</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi+
                    '</tbody>'+
                '</table>';

                $("#table_detail2").html($tablenya);

                $("#modaldetail2").modal();
            }
        });
        
    });
</script>

<!-- edit PIC -->
<script>
    $('.bedit1_klik').click(function(){
        var id = $(('#bedit1')+$(this).attr('value')).val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>suratPerintahLembur/detail_spl_dspl",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#ed_id_spl").val(id);

                $("#ed_tanggal").val(respond['spl'][0]['tanggal']);
                $("#ed_line").val(respond['spl'][0]['nama_line']);
                $("#ed_waktu").val(respond['spl'][0]['waktu_lembur']);
                $("#ed_keterangan").val(respond['spl'][0]['keterangan_perintah']);


                $isi = "";

                for($i=0;$i<respond['jm_dspl'];$i++){
                   $isi = $isi + 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1) +
                            '<input type="hidden" name="stat_kar'+$i+'" id="stat_kar'+$i+'" value="1">'+
                            '<input type="hidden" name="id_dspl'+$i+'" id="id_dspl'+$i+'" value="'+respond['dspl'][$i]['id_detail_surat_perintah_lembur']+'">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                '<input type="hidden" value="'+respond['dspl'][$i]['id_karyawan'] +'" id="ed_idkar'+$i+'" name="ed_idkar'+$i+'" '+
                                'class="form-control" readonly>'+
                                '<input type="hidden" value="'+respond['dspl'][$i]['nama_karyawan'] +'" id="ed_nmkar'+$i+'" name="ed_nmkar'+$i+'" '+
                                'class="form-control" readonly>'+
                                respond['dspl'][$i]['nama_karyawan'] +
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="number" id="ed_jam'+$i+'" name="ed_jam'+$i+'" min="1" max="24" value="'+respond['dspl'][$i]['planning_lembur']+'"'+
                            'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="time" id="ed_in'+$i+'" name="ed_in'+$i+'" value="'+ respond['dspl'][$i]['waktu_in_plan']+'"'+
                            'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<textarea class="form-control" rows="2" id="ed_ket'+$i+'" name="ed_ket'+$i+'" '+
                                'data-plugin-textarea-autosize>'+respond['dspl'][$i]['keterangan_plan']+'</textarea>'+
                            '</center>'+
                        '</td>'+
                        '<td>'+
                            '<input type="checkbox" id="del'+$i+'" name="del'+$i+'"> hapus'+
                        '</td>'+
                    '</tr>';
                }

                $tablenya = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Nama Karyawan</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Planning Lembur (jam)</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Jam Lembur (IN)</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Keterangan</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $isi+
                    '</tbody>'+
                '</table>';

                $("#table_edit2").html($tablenya);
                $("#ed_jumkar").val(respond['jm_dspl']);
                $("#modaleditpic").modal();

            }
        });
    });
</script>

<!-- add karyawan edit -->
<script>
    function ed_add_karyawan(){
        $id_karyawan = $("#ed_select_karyawan").val();

        if($id_karyawan != ""){
            $nama_karyawan   = $("#ed_kar"+$id_karyawan).val();
            $jumlah_karyawan = $("#ed_jumkar").val();

            if($jumlah_karyawan == 0){
                $jumlah_now = 1;
                $lama = "";

                $isi =
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_now+
                            '<input type="hidden" name="stat_kar'+($jumlah_now-1)+'" value="2">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                '<input type="hidden" value="'+$id_karyawan+'" id="ed_idkar'+($jumlah_now-1)+'" name="ed_idkar'+($jumlah_now-1)+'" '+
                                'class="form-control" readonly>'+
                                '<input type="hidden" value="'+$nama_karyawan +'" id="ed_nmkar'+($jumlah_now-1)+'" name="ed_nmkar'+($jumlah_now-1)+'" '+
                                'class="form-control" readonly>'+
                                $nama_karyawan +
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="number" id="ed_jam'+($jumlah_now-1)+'" name="ed_jam'+($jumlah_now-1)+'" min="1" max="24" '+
                            'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="time" id="ed_in'+($jumlah_now-1)+'" name="ed_in'+($jumlah_now-1)+'" '+
                            'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<textarea class="form-control" rows="2" id="ed_ket'+($jumlah_now-1)+'" name="ed_ket'+($jumlah_now-1)+'" '+
                                'data-plugin-textarea-autosize></textarea>'+
                            '</center>'+
                        '</td>'+
                        '<td>'+
                            '<input type="checkbox" id="del'+($jumlah_now-1)+'" name="del'+($jumlah_now-1)+'" > hapus'+
                        '</td>'+
                    '</tr>';
                    $("#ed_jumkar").val(1);
            }
            else{
                $hitung = 0;
                 for($i=0;$i<$jumlah_karyawan;$i++){
                     if($("#ed_idkar"+$i).val() == $id_karyawan){
                         $hitung++;
                     }
                 }
                 
                 if($hitung == 0){
                    $lama = "";

                    $jumlah_now_ = parseInt($jumlah_karyawan);
                    $jumlah_now = $jumlah_now_ + 1;

                    for($i=0;$i<$jumlah_now_;$i++){
                        $status_tam        = $("#stat_kar"+$i).val();
                        $id_karyawan_tam   = $("#ed_idkar"+$i).val();
                        $nama_karyawan_tam = $("#ed_nmkar"+$i).val();
                        $jam_tam           = $("#ed_jam"+$i).val();
                        $in_tam            = $("#ed_in"+$i).val();
                        $ket_tam           = $("#ed_ket"+$i).val();

                        if($("#del"+$i).prop("checked") == true){
                            $deletenya = '<input type="checkbox" id="del'+$i+'" name="del'+$i+'" checked> hapus';
                        }
                        else{
                            $deletenya = '<input type="checkbox" id="del'+$i+'" name="del'+$i+'"> hapus';
                        }
                        //
                        
                       if($status_tam == 1){
                            $lama = $lama +
                            '<tr>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    ($i+1) +
                                    '<input type="hidden" name="stat_kar'+$i+'" id="stat_kar'+$i+'" value="'+$status_tam+'">'+
                                    '<input type="hidden" name="id_dspl'+$i+'" id="id_dspl'+$i+'" value="'+$("#id_dspl"+$i).val()+'">'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center>'+
                                        '<input type="hidden" value="'+$id_karyawan_tam+'" id="ed_idkar'+$i+'" name="ed_idkar'+$i+'" '+
                                        'class="form-control" readonly>'+
                                        '<input type="hidden" value="'+$nama_karyawan_tam+'" id="ed_nmkar'+$i+'" name="ed_nmkar'+$i+'" '+
                                        'class="form-control" readonly>'+
                                        $nama_karyawan_tam+
                                    '</center>'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center>'+
                                    '<input type="number" id="ed_jam'+$i+'" name="ed_jam'+$i+'" min="1" max="24" value="'+$jam_tam+'"'+
                                    'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                    '</center>'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center>'+
                                    '<input type="time" id="ed_in'+$i+'" name="ed_in'+$i+'" value="'+ $in_tam+'"'+
                                    'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                    '</center>'+
                                '</td>'+
                                '<td style="text-align: center;vertical-align: middle;">'+
                                    '<center>'+
                                    '<textarea class="form-control" rows="2" id="ed_ket'+$i+'" name="ed_ket'+$i+'" '+
                                        'data-plugin-textarea-autosize>'+$ket_tam+'</textarea>'+
                                    '</center>'+
                                '</td>'+
                                '<td>'+
                                    $deletenya+
                                '</td>'+
                            '</tr>';
                       }
                       else{
                        $lama = $lama +
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                ($i+1) +
                                '<input type="hidden" name="stat_kar'+$i+'" id="stat_kar'+$i+'" value="'+$status_tam+'">'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                    '<input type="hidden" value="'+$id_karyawan_tam+'" id="ed_idkar'+$i+'" name="ed_idkar'+$i+'" '+
                                    'class="form-control" readonly>'+
                                    '<input type="hidden" value="'+$nama_karyawan_tam+'" id="ed_nmkar'+$i+'" name="ed_nmkar'+$i+'" '+
                                    'class="form-control" readonly>'+
                                    $nama_karyawan_tam+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<input type="number" id="ed_jam'+$i+'" name="ed_jam'+$i+'" min="1" max="24" value="'+$jam_tam+'"'+
                                'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<input type="time" id="ed_in'+$i+'" name="ed_in'+$i+'" value="'+ $in_tam+'"'+
                                'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                                '</center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center>'+
                                '<textarea class="form-control" rows="2" id="ed_ket'+$i+'" name="ed_ket'+$i+'" '+
                                    'data-plugin-textarea-autosize>'+$ket_tam+'</textarea>'+
                                '</center>'+
                            '</td>'+
                            '<td>'+
                                $deletenya+
                            '</td>'+
                        '</tr>';
                       }
                    
                    }
                    
                    $isi = 
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $jumlah_now+
                            '<input type="hidden" name="stat_kar'+($jumlah_now-1)+'" id="stat_kar'+($jumlah_now-1)+'" value="2">'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                                '<input type="hidden" value="'+$id_karyawan+'" id="ed_idkar'+($jumlah_now-1)+'" name="ed_idkar'+($jumlah_now-1)+'" '+
                                'class="form-control" readonly>'+
                                '<input type="hidden" value="'+$nama_karyawan +'" id="ed_nmkar'+($jumlah_now-1)+'" name="ed_nmkar'+($jumlah_now-1)+'" '+
                                'class="form-control" readonly>'+
                                $nama_karyawan +
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="number" id="ed_jam'+($jumlah_now-1)+'" name="ed_jam'+($jumlah_now-1)+'" min="1" max="24" '+
                            'style="width:70px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<input type="time" id="ed_in'+($jumlah_now-1)+'" name="ed_in'+($jumlah_now-1)+'" '+
                            'style="width:95px;height:30px;background:transparent;margin-left:-3px" class="form-control" required>'+
                            '</center>'+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            '<center>'+
                            '<textarea class="form-control" rows="2" id="ed_ket'+($jumlah_now-1)+'" name="ed_ket'+($jumlah_now-1)+'" '+
                                'data-plugin-textarea-autosize></textarea>'+
                            '</center>'+
                        '</td>'+
                        '<td>'+
                            '<input type="checkbox" id="del'+$i+'" name="del'+$i+'"> hapus'+
                        '</td>'+
                    '</tr>';

                    $("#ed_jumkar").val($jumlah_now);
                 }
                 else{
                    alert("Mohon maaf karyawan tidak dapat didaftarkan lagi karena sudah terdaftar");
                 }
            }

            $tablenya = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">No</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Nama Karyawan</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Planning Lembur (jam)</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Jam Lembur (IN)</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Keterangan</th>'+
                            '<th style="text-align: center;vertical-align: middle;">Aksi</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                    $lama+
                    $isi+
                    '</tbody>'+
                '</table>';
                $("#table_edit2").html($tablenya);
        }
        else{
            alert("Silakan pilih karyawan terlebih dahulu");
        }
    }
</script>




    