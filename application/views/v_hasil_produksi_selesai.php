<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Hasil Produksi Selesai</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span> Hasil Produksi Selesai</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">

        <header class="panel-heading">
            <h2 class="panel-title">Data Hasil Produksi Selesai</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead> 
                    <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                        <tr>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                No
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Tanggal Produksi
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Status Laporan
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Laporan
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Aksi
                            </th>
                        </tr>
                    <?php } else if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                        <tr>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                No
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Tanggal Produksi
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Status Laporan
                            </th>
                            <th colspan="3" style="text-align: center;vertical-align: middle;">
                                Laporan
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Aksi
                            </th>
                        </tr>
                    <?php } else{?>
                        <tr>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                No
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Tanggal Produksi
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Status Laporan
                            </th>
                            <th colspan="4" style="text-align: center;vertical-align: middle;">
                                Laporan
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Aksi
                            </th>
                        </tr>
                    <?php } ?>
        
                    <tr>
                        <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                            <th style="text-align: center;vertical-align: middle;">
                                Assy
                            </th>
                        <?php } else if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                            <th style="text-align: center;vertical-align: middle;">
                                Cut
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Bond
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Sew
                            </th>
                        <?php } else{?>
                            <th style="text-align: center;vertical-align: middle;">
                                Cut
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Bond
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Sew
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Assy
                            </th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no =1;
                        foreach($produksi as $p){
                            if($p->status_laporan == 3){
                    ?>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">
                                    <?= $no; ?>
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <?php 
                                        $waktu = $p->tanggal;

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
                                    <input type="hidden" id="id<?= $no ?>" value="<?= $p->id_produksi ?>">
                                    <input type="hidden" id="tgl<?= $no ?>" value="<?= $p->tanggal ?>">
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <?php if($p->status_laporan == 0){?>
                                        Belum Ada
                                    <?php } else if($p->status_laporan == 1){?>
                                        Belum Lengkap
                                    <?php } else if($p->status_laporan == 2){?>
                                        Lengkap
                                    <?php } else{?>
                                        Selesai
                                    <?php } ?>
                                </td>
                                <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Assy"){  
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>
                                <?php } else if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Cutting"){  
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Bonding"){   
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Sewing"){   
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>
                                <?php } else{?>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Cutting"){  
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Bonding"){   
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Sewing"){   
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <?php foreach($produksi_line as $pl){
                                                if($pl->id_produksi == $p->id_produksi){
                                                    if($pl->nama_line == "Line Assy"){  
                                                        if($pl->status_laporan == 1){
                                        ?>
                                            <i class="fa  fa-check"></i>
                                        <?php }}}} ?>
                                    </td>

                                <?php } ?>
                                
                                <td class="col-lg-3">
                                    <?php if($p->status_laporan < 2){?>
                                        <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good" || 
                                        $_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi" || 
                                        $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                        $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management"){?>
                                            <button type="button" class="badd_klik col-lg-3 btn btn-success fa fa-plus-square-o" 
                                            value="<?= $no;?>" title="Buat Laporan Hasil Produksi" style="margin-right:5px;margin-bottom:5px"></button>
                                        <?php } ?>
                                    <?php } ?>
                                    <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                        value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                    <!-- if status 1 & 2 & untuk admin finish good & admin produksi -->
                                        <?php if(($p->status_laporan == 1 || $p->status_laporan == 2) && 
                                                ($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good" 
                                                || $_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi")){?>
                                            <?php 
                                                $hitung = 0;
                                                foreach($permohonan_akses as $peraks){
                                                if($peraks->id_data == $p->id_produksi){
                                                    $hitung++;
                                                }}

                                                if($hitung > 0){
                                                    foreach($permohonan_akses as $peraks){
                                                        if($peraks->id_data == $p->id_produksi){
                                            ?>
                                                <?php if($peraks->status_permohonan == 0){?>
                                                    <input type="hidden" id="id_peraks_tam<?= $no; ?>" value="<?= $peraks->id_permohonan_akses?>">
                                                    <button type="button" class="bbatalpermaks_klik col-lg-3 btn btn-danger fa fa-pencil-square-o" 
                                                        value="<?= $no;?>" title="Batalkan Permintaan Akses" style="margin-right:5px;margin-bottom:5px"></button>
                                                <?php } else if($peraks->status_permohonan == 1){?>
                                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                                        value="<?= $no;?>" title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                                <?php } ?>
                                            <?php }}} else{ ?>
                                                <button type="button" class="bpermaks_klik col-lg-3 btn btn-success fa fa-pencil-square-o" 
                                                    value="<?= $no;?>" title="Buat Permintaan Akses" style="margin-right:5px;margin-bottom:5px"></button>
                                            <?php } ?>
                                        <?php } ?>
                                    <!-- tutup -->
                                    <!-- if status 1 & 2 & untuk direktur & manajemen -->
                                        <?php if($p->status_laporan == 1 || $p->status_laporan == 2 && 
                                            ($_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management")){ ?>
                                                <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                                    value="<?= $no;?>" title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                        <?php } ?>
                                    <!-- tutup -->
                                    <?php if($p->status_laporan == 2 && ($_SESSION['nama_jabatan'] == "PPIC" && $_SESSION['nama_departemen'] == "Produksi" ||
                                            $_SESSION['nama_jabatan'] == "Direktur" && $_SESSION['nama_departemen'] == "Management" || 
                                            $_SESSION['nama_jabatan'] == "Manager" && $_SESSION['nama_departemen'] == "Management")){?>
                                        <button type="button" class="bse7_klik col-lg-3 btn btn-success fa fa-check-square" 
                                            value="<?= $no;?>" title="Disetujui" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php } ?>
                                    <?php if($p->status_laporan == 3){?>
                                        <button type="button" class="bprint_klik col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                            value="<?= $no;?>" title="Print" style="margin-right:5px;margin-bottom:5px"></button>
                                    <?php } ?>
                                </td>
                            </tr>
                    <?php $no++; }} ?>
                </tbody>
	        </table>
        </div>
    </div>

    <!-- modal detail -->
    <div class="modal" id="modaldetail" role="dialog">
        <div class="modal-dialog modal-xl" style="width:50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Detail Hasil Produksi</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Produksi</label>
                    <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="tanggal_det" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status Laporan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            id="status_det" readonly>
                        </div>
                    </div>

                    <br>
                    <div id="table_detail">
                    
                    </div>
                    
                    <div id="table_detail2"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default modal-dismiss" value="Ok" onclick="reload()">
                </div>
            </div>
        </div>
    </div>

    <!-- modal tambah -->
    <div class="modal" id="modaltambah" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <form method="POST" action="<?= base_url()?>hasilProduksi/coba_tambah_hasil_produksi">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Buat Laporan Hasil Produksi</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Produksi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_add" name="tanggal_add" readonly>
                                <input type="hidden" class="form-control" id="id_add" name="id_add" readonly>
                                <input type="hidden" class="form-control" id="id_pl" name="id_pl" readonly>
                                <input type="hidden" class="form-control" id="total_pt" name="total_pt" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Line</label>
                            <div class="col-sm-7">
                                <select class="form-control mb-md" id="id_line" onchange="ganti()">
                                    <option value="kosong">Pilih Line</option>
                                    <?php 
                                        $c=1;
                                        foreach($line as $ln){
                                            if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){
                                                if($ln->nama_line == "Line Assy"){
                                    ?>
                                        <option id="opt<?= $c;?>" value="<?= $ln->id_line?>"><?= $ln->nama_line?></option>
                                    <?php
                                                }
                                            }
                                            else if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){
                                                if($ln->nama_line == "Line Cutting" || $ln->nama_line == "Line Bonding" || $ln->nama_line == "Line Sewing"){
                                    ?>
                                        <option id="opt<?= $c;?>" value="<?= $ln->id_line?>"><?= $ln->nama_line?></option>
                                    <?php
                                                }
                                            }
                                    ?>
                                    <?php $c++; } ?>
                                </select>
                                <div id="select_line"></div>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="keterangan_umum" rows="3" id="textareaDefault">
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div id="table_tambah">
                        
                        </div>
                        <input type="hidden" id="jumlah_detail" name="jumlah_detail">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan" disabled>
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal" id="modaledit" role="dialog">
        <div class="modal-dialog modal-xl" style="width:70%">
            <form method="POST" action="<?= base_url()?>hasilProduksi/edit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Laporan Hasil Produksi</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Produksi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_edit" name="tanggal_edit" readonly>
                                <input type="hidden" class="form-control" id="id_edit" name="id_edit" readonly>
                                <input type="hidden" class="form-control" id="id_pl_edit" name="id_pl_edit" readonly>
                                <input type="hidden" class="form-control" id="total_pt_edit" name="total_pt_edit" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Line</label>
                            <div class="col-sm-7">
                                <select class="form-control mb-md" id="id_line_edit" onchange="ganti_edit()">
                                    <option value="kosong">Pilih Line</option>
                                    <?php 
                                        $c=1;
                                        foreach($line as $ln){
                                            if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){
                                                if($ln->nama_line == "Line Assy"){
                                    ?>
                                        <option id="opt_edit<?= $c;?>" value="<?= $ln->id_line?>"><?= $ln->nama_line?></option>
                                    <?php
                                                }
                                            }
                                            else if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){
                                                if($ln->nama_line == "Line Cutting" || $ln->nama_line == "Line Bonding" || $ln->nama_line == "Line Sewing"){
                                    ?>
                                        <option id="opt_edit<?= $c;?>" value="<?= $ln->id_line?>"><?= $ln->nama_line?></option>
                                    <?php
                                                }
                                            }
                                    ?>
                                    <?php $c++; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Keterangan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="keterangan_umum_edit" id="keterangan_umum_edit" rows="3" id="textareaDefault">
                                </textarea>
                            </div>
                        </div>

                        <br>

                        <div id="table_edit">
                        
                        </div>
                        <input type="hidden" id="jumlah_detail_edit" name="jumlah_detail_edit">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="bedit" class="btn btn-primary" value="Simpan" disabled>
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal permintaan akses -->
    <div class="modal" id="modalpermintaanakses" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>permohonanAkses/insert">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Permohonan Akses</b></h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan mengirimkan permintaan akses edit untuk data 
                        <b>hasil produksi</b> dengan tanggal produksi <span id="tanggal_peraks"></span>? </p>
                        <input type="hidden" name="id_peraks" id="id_peraks">
                        <input type="hidden" name="nama_permohonan_peraks" value="Edit Hasil Produksi">

                        <p>Keterangan:</p>
                        <div class="form-group mt-lg">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="5" name="ket_peraks" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="edit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal batal permintaan akses -->
    <div class="modal" id="modalpermintaanaksesbatal" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>permohonanAkses/delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Pembatalan Permintaan Akses Edit Data</b></h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan membatalkan permintaan akses edit untuk data
                        <b>hasil produksi</b> dengan tanggal produksi <span id="tanggal_peraks_batal"></span>? </p>
                        <input type="hidden" name="id_peraks_batal" id="id_peraks_batal">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="edit" class="btn btn-primary" value="Ya">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal se7 -->
    <div class="modal" id="modalse7" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>hasilProduksi/konfirmasi_ppic">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Terima Laporan Hasil Produksi</b></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_produksinya" id="id_produksinya">
                        <p>Apakah anda yakin akan menerima laporan hasil produksi dengan tanggal produksi <span id="tanggal_produksinya"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="edit" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- modal print -->
    <div class="modal" id="modalprint" role="dialog">
            <div class="modal-dialog modal-xl" style="width:50%">
                <form method="POST" action="<?= base_url()?>hasilProduksi/print">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b>Print Data Hasil Produksi</b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_invoice_print" id="id_invoice_print"> 
                            <div class="form-group mt-lg">
                                <label class="col-sm-5 control-label">Nama Line</label>
                                <div class="col-sm-7">
                                    <select id="id_line" name="id_line"
                                        required class="form-control mb-md">
                                        <?php 
                                            $count = 1;
                                            foreach($line as $ln){?>
                                            <option value="<?= $ln->id_line ?>">
                                                <?= $ln->nama_line ?>
                                            </option>
                                        <?php $count++; } ?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="id_produksi" id="id_produksi"> 
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" id="button_print" value="Print">
                            <button class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <!-- -->

    <div id='modaldetail1' class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Produksi</h2>
            </header>

            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Tanggal Produksi</label>
                <div class="col-sm-7">
                        <input type="text" class="form-control"
                        value="Selasa, 07-07-2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Status Laporan</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="Belum Ada" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Keterangan</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" rows="3" id="textareaDefault" disabled>-
                        </textarea>
                    </div>
                </div>

                <br>

                <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                No
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Nama Line
                            </th>
                            <th colspan="2" style="text-align: center;vertical-align: middle;">
                                Total Waktu Proses
                            </th>
                            <th colspan="2" style="text-align: center;vertical-align: middle;">
                                Efisiensi
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Status Perencanaan
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: center;vertical-align: middle;">
                                Plan
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Aktual
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Plan
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Aktual
                            </th>
                        </tr>
                        <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Line Sewing</td>
                                <td style="text-align: center;vertical-align: middle;">9 jam (32.400 dtk) </td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">112,5%</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">Overtime</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Line Assy</td>
                                <td style="text-align: center;vertical-align: middle;">8 jam (28.800 dtk) </td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">100%</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">Tidak Overtime</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Line Cutting</td>
                                <td style="text-align: center;vertical-align: middle;">8 jam (28.800 dtk) </td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">100%</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">Tidak Overtime</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Line Bonding</td>
                                <td style="text-align: center;vertical-align: middle;">8 jam (28.800 dtk) </td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">100%</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">Tidak Overtime</td>
                            </tr>
                        <?php } ?>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
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

    <div id='modaldetail2' class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Produksi</h2>
            </header>

            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Tanggal Produksi</label>
                <div class="col-sm-7">
                        <input type="text" class="form-control"
                        value="Selasa, 07-07-2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Status Laporan</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="Belum Lengkap" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Keterangan</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" rows="3" id="textareaDefault" disabled>-
                        </textarea>
                    </div>
                </div>

                <br>

                <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                <thead>
                        <tr>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                No
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Nama Line
                            </th>
                            <th colspan="2" style="text-align: center;vertical-align: middle;">
                                Total Waktu Proses
                            </th>
                            <th colspan="2" style="text-align: center;vertical-align: middle;">
                                Efisiensi
                            </th>
                            <th rowspan="2" style="text-align: center;vertical-align: middle;">
                                Status Perencanaan
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: center;vertical-align: middle;">
                                Plan
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Aktual
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Plan
                            </th>
                            <th style="text-align: center;vertical-align: middle;">
                                Aktual
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Line Sewing</td>
                                <td style="text-align: center;vertical-align: middle;">9 jam (32.400 dtk) </td>
                                <td style="text-align: center;vertical-align: middle;">9 jam (32.400 dtk)</td>
                                <td style="text-align: center;vertical-align: middle;">112,5%</td>
                                <td style="text-align: center;vertical-align: middle;">112,5%</td>
                                <td style="text-align: center;vertical-align: middle;">Overtime</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Line Assy</td>
                                <td style="text-align: center;vertical-align: middle;">8 jam (28.800 dtk) </td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">100%</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">Tidak Overtime</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Line Cutting</td>
                                <td style="text-align: center;vertical-align: middle;">8 jam (28.800 dtk) </td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">100%</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">Tidak Overtime</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Line Bonding</td>
                                <td style="text-align: center;vertical-align: middle;">-</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">-</td>
                                <td style="text-align: center;vertical-align: middle;"></td>
                                <td style="text-align: center;vertical-align: middle;">-</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
    
    <div id='modaltambah1' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>hasilProduksi/coba_tambah_hasil_produksi">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Buat Laporan Hasil Produksi</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Produksi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Selasa, 07-07-2020" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Line</label>
                        <div class="col-sm-7">
                            <select class="form-control mb-md">
                            <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                                <option>Line Assy</option>
                            <?php } ?>
                            
                            <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                                <option>Line Cutting</option>
                                <option>Line Bonding</option>
                                <option>Line Sewing</option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault">
                            </textarea>
                        </div>
                    </div>

                    <br>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">
                                    No
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Nama Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Perencanaan (pcs)
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Aktual (pcs)
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Merah</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Putih</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td  style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Hitam</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Cream</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">5</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Abu-abu</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    *Aktual harus terisi. Jika aktual produksi untuk suatu item tidak ada, silahkan masukkan 0


                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                            <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <div id='modaltambah2' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>hasilProduksi/coba_tambah_hasil_produksi">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Buat Laporan Hasil Produksi</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Produksi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Selasa, 07-07-2020" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Line</label>
                        <div class="col-sm-7">
                            <select class="form-control mb-md">
                            <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                                <option>Line Assy</option>
                            <?php } ?>
                            
                            <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                                <option>Line Cutting</option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault">
                            </textarea>
                        </div>
                    </div>

                    <br>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">
                                    No
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Nama Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Perencanaan (pcs)
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Aktual (pcs)
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Merah</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Putih</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Hitam</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Cream</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">5</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Abu-abu</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;"><input type="number" class="form-control" style="width:60px;height:25px" required></td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    *Aktual harus terisi. Jika aktual produksi untuk suatu item tidak ada, silahkan masukkan 0


                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                            <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <div id='modaledit1' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>hasilProduksi/edit_hasil_produksi">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Laporan Hasil Produksi</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal Produksi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Selasa, 07-07-2020" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Line</label>
                        <div class="col-sm-7">
                            <select class="form-control mb-md">
                                <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){?>
                                    <option>Line Sewing</option>
                                <?php } ?>
                                
                                <?php if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){?>
                                    <option>Line Cutting</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault">-
                            </textarea>
                        </div>
                    </div>

                    <br>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">
                                    No
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Nama Produk
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Perencanaan (pcs)
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Aktual (pcs)
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Merah</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="text" class="form-control" style="width:60px;height:25px" required
                                    value="50">
                                </td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Putih</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="text" class="form-control" style="width:60px;height:25px" required
                                    value="50">
                                </td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Hitam</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="text" class="form-control" style="width:60px;height:25px" required
                                    value="50">
                                </td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Cream</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="text" class="form-control" style="width:60px;height:25px" required
                                    value="50">
                                </td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">5</td>
                                <td style="text-align: center;vertical-align: middle;">Compact Mattress Aoki Abu-abu</td>
                                <td style="text-align: center;vertical-align: middle;">50</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <input type="text" class="form-control" style="width:60px;height:25px" required
                                    value="50">
                                </td>
                                <td style="text-align: center;vertical-align: middle;"><textarea type="text" class="form-control" ></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    *Aktual harus terisi. Jika aktual produksi untuk suatu item tidak ada, silahkan masukkan 0


                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                            <button type="button" class="btn btn-default modal-dismiss">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>
    
    <div id="modalkonfirmasi" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>hasilProduksi/konfirmasi">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Permintaan Akses Edit Data</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Apakah anda yakin akan mengirimkan permintaan akses edit untuk data 
                                <b>hasil produksi</b> dengan tanggal produksi Selasa, 05-05-2020? </p>
                                
                                <p>Keterangan:</p>
                                <div class="col-sm-12">
                                    <textarea class="form-control" rows="3" id="textareaDefault" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" class="btn btn-primary hapus" value="Kirim">
                                <button class="btn btn-default modal-dismiss">Batal</button>
                            </div>
                        </div>
                    </footer>
            </section>
        </form>

    </div>

    <div id="modalbatalkonfirmasi" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>hasilProduksi/konfirmasi">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Pembatalan Permintaan Akses Edit Data</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Apakah anda yakin akan membatalkan permintaan akses edit untuk data 
                                <b>hasil produksi</b> dengan tanggal produksi Selasa, 05-05-2020? </p>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" class="btn btn-primary hapus" value="Ya">
                                <button class="btn btn-default modal-dismiss">Tidak</button>
                            </div>
                        </div>
                    </footer>
            </section>
        </form>

    </div>

    <div class="modal" id="modallog" role="dialog">
        <div class="modal-dialog modal-xl" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Laporan Hasil Produksi</h4>
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

<!-- detail hasil produksi -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>hasilProduksi/detail_hasil_produksi1",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $status = "";

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['p'][0]['tanggal']).getDate();
                var xhari = new Date(respond['p'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['p'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['p'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_det").val($tanggalnya);
                if(respond['p'][0]['status_laporan'] == 0){
                    $status = "Belum Ada";
                } else if(respond['p'][0]['status_laporan'] == 1){
                    $status = "Belum Lengkap";
                } else if(respond['p'][0]['status_laporan'] == 2){
                    $status = "Lengkap";
                } else{
                    $status = "Selesai";
                }

                $("#status_det").val($status);

                $isi = "";

                for($i=0;$i<respond['jm_pl'];$i++){
                    if(respond['pl'][$i]['status_perencanaan'] == 0){
                        $twp_show = "-";
                        $twa_show = "-";
                        $efa = "-";
                        $efp = "-";
                    }
                    else{
                        $angka = (respond['pl'][$i]['total_waktu_perencanaan'])/3600;
                        $twpj = $angka.toFixed(2);
                        $twp_show = $twpj+ " jam ("+ respond['pl'][$i]['total_waktu_perencanaan'] + " dtk)";

                        $efp = respond['pl'][$i]['efisiensi_perencanaan']+ " %";

                        if(respond['pl'][$i]['status_laporan'] == 0){
                            $twa_show = " ";
                            $efa = " ";
                        }
                        else{
                            $angka = (respond['pl'][$i]['total_waktu_aktual'])/3600;
                            $twaj  = $angka.toFixed(2);
                            $twa_show = $twaj+ " jam ("+ respond['pl'][$i]['total_waktu_aktual'] + " dtk)";

                            $efa = respond['pl'][$i]['efisiensi_aktual']+ " %";
                        }
                    }

                    if(respond['pl'][$i]['status_perencanaan'] == 0){
                        $status = "Tidak Ada Perencanaan";
                    }
                    else if(respond['pl'][$i]['status_perencanaan'] == 1){
                        $status = "Tidak Overtime";
                    }
                    else{
                        $status = "Overtime";
                    }

                    $isi = $isi +
                    '<tr>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            ($i+1)+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            respond['pl'][$i]['nama_line'] +
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $twp_show+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $twa_show+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $efp+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $efa+
                        '</td>'+
                        '<td style="text-align: center;vertical-align: middle;">'+
                            $status+
                        '</td>'+
                    '</tr>';
                }
                
                $table = 
                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                    '<thead>'+
                        '<tr>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'No'+
                            '</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Nama Line'+
                            '</th>'+
                            '<th colspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Total Waktu Proses'+
                            '</th>'+
                            '<th colspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Efisiensi'+
                            '</th>'+
                            '<th rowspan="2" style="text-align: center;vertical-align: middle;">'+
                                'Status Perencanaan'+
                            '</th>'+
                        '</tr>'+
                        '<tr>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Plan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Aktual'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Plan'+
                            '</th>'+
                            '<th style="text-align: center;vertical-align: middle;">'+
                                'Aktual'+
                            '</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        $isi+
                    '</tbody>'+
                '</table>';

                $table_detail = "";
                
                for($k=0;$k<respond['jm_pl'];$k++){
                    if(respond['pl'][$k]['status_laporan'] == 1){
                        $nama_line = respond['pl'][$k]['nama_line'];

                        $isi_detail   = "";
                        $hitung = 0; 
                        for($t=0;$t<respond['jm_dpl'];$t++){
                            if(respond['dpl'][$t]['id_produksi_line'] == respond['pl'][$k]['id_produksi_line']){
                                if(respond['dpl'][$t]['jumlah_item_perencanaan'] > 0){
                                    $namanya = "";

                                    //nama produk
                                    if(respond['dpl'][$t]['keterangan'] == 0){
                                        $id_ukuran = respond['dpl'][$t]['id_ukuran'];
                                        $id_warna  = respond['dpl'][$t]['id_warna'];

                                        for($l=0;$l<respond['jmukuran'];$l++){
                                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                                            }
                                        }

                                        for($w=0;$w<respond['jmwarna'];$w++){
                                            if(respond['warna'][$w]['id_warna'] == $id_warna){
                                                $warnanya = respond['warna'][$w]['nama_warna'];
                                            }
                                        }

                                        $namanya = respond['dpl'][$t]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                                    }
                                    else if(respond['dpl'][$t]['keterangan'] == 1){
                                        $id_ukuran = respond['dpl'][$t]['id_ukuran'];

                                        for($l=0;$l<respond['jmukuran'];$l++){
                                            if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                                $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                                $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                                $ukurannya = $nama_ukuran + $satuan_ukuran;
                                            }
                                        }

                                        $namanya = respond['dpl'][$t]['nama_produk'] + $ukurannya;

                                    }
                                    else if(respond['dpl'][$t]['keterangan'] == 2){
                                        $id_warna  = respond['dpl'][$t]['id_warna'];

                                        for($w=0;$w<respond['jmwarna'];$w++){
                                            if(respond['warna'][$w]['id_warna'] == $id_warna){
                                                $warnanya = respond['warna'][$w]['nama_warna'];
                                            }
                                        }

                                        $namanya = respond['dpl'][$t]['nama_produk'] + " (" + $warnanya + ")";
                                    }
                                    else{
                                        $namanya = respond['dpl'][$t]['nama_produk'];
                                    }
                            

                                    $hitung++; 
                                    $isi_detail = $isi_detail + 
                                    '<tr>'+
                                        '<td style="text-align: center;vertical-align: middle;">'+
                                            $hitung+
                                        '</td>'+
                                        '<td style="text-align: center;vertical-align: middle;">'+
                                            $namanya+
                                        '</td>'+
                                        '<td style="text-align: center;vertical-align: middle;">'+
                                            respond['dpl'][$t]['jumlah_item_perencanaan']+
                                        '</td>'+
                                        '<td style="text-align: center;vertical-align: middle;">'+
                                            respond['dpl'][$t]['jumlah_item_aktual']+
                                        '</td>'+
                                        '<td style="text-align: center;vertical-align: middle;">'+
                                            respond['dpl'][$t]['keterangan_aktual']+
                                        '</td>'+
                                    '</tr>';
                                }
                            }
                        }

                        if(respond['pl'][$k]['keterangan_laporan'] != ""){
                            $keterangan = respond['pl'][$k]['keterangan_laporan'];
                        } else{
                            $keterangan = "";
                        }
                        

                        $table_detail = $table_detail+
                        '<hr>'+
                        '<b>Hasil Produksi '+ $nama_line+'</b><br><br>'+
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
                                    'Perencanaan (pcs)'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Aktual (pcs)'+
                                '</th>'+
                                '<th style="text-align: center;vertical-align: middle;">'+
                                    'Keterangan'+
                                '</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            $isi_detail+
                        '</tbody>'+
                    '</table>'+
                    '<p><b>Keterangan: </b>'+$keterangan+'</p>';
                    }
                }


                $("#table_detail2").html($table_detail);
                $("#table_detail").html($table);
                $("#modaldetail").modal();
            }
        });  
       
    });
</script>

<!-- add -->
<script>
    $('.badd_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
    
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>hasilProduksi/detail_hasil_produksi1",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['pl'][0]['tanggal']).getDate();
                var xhari = new Date(respond['pl'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['pl'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['pl'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_add").val($tanggalnya);
                $("#id_add").val(id);

                for($i=0;$i<respond['jm_pl'];$i++){
                    for($k=1;$k<=4;$k++){
                        if(respond['pl'][$i]['id_line'] == $("#opt"+$k).val()){
                            if(respond['pl'][$i]['status_laporan'] == 1){
                                $("#opt"+$k).prop('disabled',true);
                            }
                        }
                    }
                }
                $("#modaltambah").modal();
            }
        });  
    });
</script>

<!-- ganti add -->
<script>
    function ganti(){
        if($("#id_line").val() == "kosong"){          
            $("#table_tambah").html("");
            $("#tambah").prop('disabled',true);
        }
        else{
            var id_produksi = $("#id_add").val();
            var id_line     = $("#id_line").val();

            $("#tambah").prop('disabled',false);

            $.ajax({
                type:"post",
                url:"<?php echo base_url() ?>hasilProduksi/detail_hasil_produksi2",
                dataType: "JSON",
                data: {id_produksi:id_produksi,id_line:id_line},

                success: function(respond){
                    if(respond['pl'][0]['status_perencanaan'] > 0){
                        $isi = "";
                        $hitung=0;

                        $num = 0;
                        for($i=0;$i<respond['jm_dpl'];$i++){
                            if(respond['dpl'][$i]['jumlah_item_perencanaan'] != 0){
                                $num++;
                                $namanya = "";

                                //nama produk
                                if(respond['dpl'][$i]['keterangan'] == 0){
                                    $id_ukuran = respond['dpl'][$i]['id_ukuran'];
                                    $id_warna  = respond['dpl'][$i]['id_warna'];

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

                                    $namanya = respond['dpl'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + ")";
                                }
                                else if(respond['dpl'][$i]['keterangan'] == 1){
                                    $id_ukuran = respond['dpl'][$i]['id_ukuran'];

                                    for($l=0;$l<respond['jmukuran'];$l++){
                                        if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                            $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                            $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                            $ukurannya = $nama_ukuran + $satuan_ukuran;
                                        }
                                    }

                                    $namanya = respond['dpl'][$i]['nama_produk'] + $ukurannya;

                                }
                                else if(respond['dpl'][$i]['keterangan'] == 2){
                                    $id_warna  = respond['dpl'][$i]['id_warna'];

                                    for($k=0;$k<respond['jmwarna'];$k++){
                                        if(respond['warna'][$k]['id_warna'] == $id_warna){
                                            $warnanya = respond['warna'][$k]['nama_warna'];
                                        }
                                    }

                                    $namanya = respond['dpl'][$i]['nama_produk'] + " (" + $warnanya + ")";
                                }
                                else{
                                    $namanya = respond['dpl'][$i]['nama_produk'];
                                }
                                
                                $max = respond['dpl'][$i]['jumlah_item_perencanaan'];

                                $id_linenya    = id_line;
                                $id_produknya  = respond['dpl'][$i]['id_produk'];

                                for($y=0;$y<respond['jm_ct'];$y++){
                                    if(respond['ct'][$y]['id_line'] == $id_linenya && respond['ct'][$y]['id_produk'] == $id_produknya){
                                        $cycle_timenya = respond['ct'][$y]['cycle_time'];
                                    }
                                }

                                $isi = $isi +
                                '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        $num+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="id_dpl'+$hitung+'" value="'+respond['dpl'][$i]['id_detail_produksi_line']+'">'+
                                        $namanya+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="jm_perc'+$hitung+'" value="'+respond['dpl'][$i]['jumlah_item_perencanaan']+'">'+
                                        respond['dpl'][$i]['jumlah_item_perencanaan']+ " pcs"+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" id="ct'+$hitung+'" value="'+$cycle_timenya+'">'+
                                        '<input type="hidden" name="wkt_aktual'+$hitung+'" id="wkt'+$hitung+'">'+
                                        '<center><input type="number" min="0" max="'+$max+'" name="jm_aktual'+$hitung+'" id="'+$hitung+'" oninput="hitung_ef(this)" class="form-control" style="width:80px;height:25px" required></center>'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<textarea type="text" class="form-control" name="ket'+$hitung+'"></textarea>'+
                                    '</td>'+
                                '</tr>';
                                $hitung++;
                            }
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
                                        'Perencanaan (pcs)'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Aktual (pcs)'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Keterangan'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi+
                            '</tbody>'+
                        '</table>'+
                        '*Aktual harus terisi. Jika aktual produksi untuk suatu item tidak ada, silahkan masukkan 0';

                        $("#jumlah_detail").val($hitung);
                        $("#id_pl").val(respond['dpl'][0]['id_produksi_line']);
                        $("#total_pt").val(respond['dpl'][0]['total_processing_time']);

                        $("#table_tambah").html($table);
                    } else{
                        $("#tambah").prop('disabled',true);
                        $("#table_tambah").html("");
                        alert("Mohon maaf tidak ada perencanaan produksi untuk line di hari yang dipilih");
                    }
                    
                }
            }); 
        }
    }
</script>

<!-- hitung efisiensi add -->
<script>
    function hitung_ef(obj){
        var count = obj.id;

        $jumlah_aktual = $("#"+count).val();
        $cycle_time    = $("#ct"+count).val();

        $total_waktu = parseInt($jumlah_aktual) * parseInt($cycle_time);
        
        $("#wkt"+count).val($total_waktu);
    }
</script>

<!-- edit -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>hasilProduksi/detail_hasil_produksi1",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['pl'][0]['tanggal']).getDate();
                var xhari = new Date(respond['pl'][0]['tanggal']).getDay();
                var xbulan = new Date(respond['pl'][0]['tanggal']).getMonth();
                var xtahun = new Date(respond['pl'][0]['tanggal']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_edit").val($tanggalnya);
                $("#id_edit").val(id);

                for($i=0;$i<respond['jm_pl'];$i++){
                    for($k=1;$k<=4;$k++){
                        if(respond['pl'][$i]['id_line'] == $("#opt_edit"+$k).val()){
                            if(respond['pl'][$i]['status_laporan'] == 0){
                                $("#opt_edit"+$k).prop('disabled',true);
                            }
                        }
                    }
                }
                
                $("#modaledit").modal();
            }
        });  
        
    });
</script>

<!-- ganti edit -->
<script>
    function ganti_edit(){
        if($("#id_line_edit").val() == "kosong"){
                            
            $("#table_edit").html("");
            $("#bedit").prop('disabled',true);
        }
        else{
            var id_produksi = $("#id_edit").val();
            var id_line     = $("#id_line_edit").val();

            if($("#id_line_edit").val() != "-"){
                $("#bedit").prop('disabled',false);

                $.ajax({
                    type:"post",
                    url:"<?php echo base_url() ?>hasilProduksi/detail_hasil_produksi2",
                    dataType: "JSON",
                    data: {id_produksi:id_produksi,id_line:id_line},

                    success: function(respond){
                        $("#keterangan_umum_edit").val(respond['pl'][0]['keterangan_laporan']);

                        $isi = "";
                        $hitung=0;
                        $count =0;

                        for($i=0;$i<respond['jm_dpl'];$i++){
                            if(respond['dpl'][$i]['jumlah_item_perencanaan'] != 0){
                                
                                $namanya = "";

                                //nama produk
                                if(respond['dpl'][$i]['keterangan'] == 0){
                                    $id_ukuran = respond['dpl'][$i]['id_ukuran'];
                                    $id_warna  = respond['dpl'][$i]['id_warna'];

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

                                    $namanya = respond['dpl'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + ")";
                                }
                                else if(respond['dpl'][$i]['keterangan'] == 1){
                                    $id_ukuran = respond['dpl'][$i]['id_ukuran'];

                                    for($l=0;$l<respond['jmukuran'];$l++){
                                        if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                            $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                            $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                            $ukurannya = $nama_ukuran + $satuan_ukuran;
                                        }
                                    }

                                    $namanya = respond['dpl'][$i]['nama_produk'] + $ukurannya;

                                }
                                else if(respond['dpl'][$i]['keterangan'] == 2){
                                    $id_warna  = respond['dpl'][$i]['id_warna'];

                                    for($k=0;$k<respond['jmwarna'];$k++){
                                        if(respond['warna'][$k]['id_warna'] == $id_warna){
                                            $warnanya = respond['warna'][$k]['nama_warna'];
                                        }
                                    }

                                    $namanya = respond['dpl'][$i]['nama_produk'] + " (" + $warnanya + ")";
                                }
                                else{
                                    $namanya = respond['dpl'][$i]['nama_produk'];
                                }

                                $hitung++; 
                                $max = respond['dpl'][$i]['jumlah_item_perencanaan'];

                                $id_linenya    = id_line;
                                $id_produknya  = respond['dpl'][$i]['id_produk'];

                                for($y=0;$y<respond['jm_ct'];$y++){
                                    if(respond['ct'][$y]['id_line'] == $id_linenya && respond['ct'][$y]['id_produk'] == $id_produknya){
                                        $cycle_timenya = respond['ct'][$y]['cycle_time'];
                                    }
                                }

                                $isi = $isi +
                                '<tr>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        ($count+1)+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="id_dpl'+$count+'" value="'+respond['dpl'][$i]['id_detail_produksi_line']+'">'+
                                        $namanya+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" name="jm_perc'+$count+'" value="'+respond['dpl'][$i]['jumlah_item_perencanaan']+'">'+
                                        respond['dpl'][$i]['jumlah_item_perencanaan']+ " pcs"+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<input type="hidden" id="ct'+$count+'" value="'+$cycle_timenya+'">'+
                                        '<input type="hidden" name="wkt_aktual'+$count+'" id="wkt'+$count+'" value="'+respond['dpl'][$i]['waktu_proses_aktual']+'">'+
                                        '<center><input type="number" min="0" max="'+$max+'" name="jm_aktual'+$count+'" id="'+$count+'" '+
                                        ' value="'+respond['dpl'][$i]['jumlah_item_aktual']+'" oninput="hitung_ef(this)" class="form-control" style="width:80px;height:25px" required></center>'+
                                    '</td>'+
                                    '<td style="text-align: center;vertical-align: middle;">'+
                                        '<textarea type="hidden" class="form-control" name="ket'+$count+'">'+respond['dpl'][$i]['keterangan_aktual']+'</textarea>'+
                                    '</td>'+
                                '</tr>';

                                $count++;
                            }
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
                                        'Perencanaan (pcs)'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Aktual (pcs)'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Keterangan'+
                                    '</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                $isi+
                            '</tbody>'+
                        '</table>'+
                        '*Aktual harus terisi. Jika aktual produksi untuk suatu item tidak ada, silahkan masukkan 0';

                        $("#jumlah_detail_edit").val($count);
                        $("#id_pl_edit").val(respond['dpl'][0]['id_produksi_line']);
                        $("#total_pt_edit").val(respond['dpl'][0]['total_processing_time']);

                        $("#table_edit").html($table);
                    }
                }); 
            }
            
        }
    }
</script>

<!-- request permintaan akses -->
<script>
    $('.bpermaks_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        var tgl     = $("#tgl"+no).val();

        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        var tanggal = new Date(tgl).getDate();
        var xhari = new Date(tgl).getDay();
        var xbulan = new Date(tgl).getMonth();
        var xtahun = new Date(tgl).getYear();
        
        var hari = hari[xhari];
        var bulan = bulan[xbulan];
        var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

        $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

        $("#id_peraks").val(id);
        $("#tanggal_peraks").html($tanggalnya);

        $("#modalpermintaanakses").modal();
        
    });
</script>

<!-- batal permintaan akses -->
<script>
    $('.bbatalpermaks_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id_peraks_tam"+no).val();
        var tgl     = $("#tgl"+no).val();

        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        var tanggal = new Date(tgl).getDate();
        var xhari = new Date(tgl).getDay();
        var xbulan = new Date(tgl).getMonth();
        var xtahun = new Date(tgl).getYear();
        
        var hari = hari[xhari];
        var bulan = bulan[xbulan];
        var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

        $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

        $("#id_peraks_batal").val(id);
        $("#tanggal_peraks_batal").html($tanggalnya);

        $("#modalpermintaanaksesbatal").modal();
        
    });
</script> 

<!-- setuju-->
<script>
    $('.bse7_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        var tgl      = $("#tgl"+no).val();
                
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>hasilProduksi/konsumsi_material",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(tgl).getDate();
                var xhari = new Date(tgl).getDay();
                var xbulan = new Date(tgl).getMonth();
                var xtahun = new Date(tgl).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#id_produksinya").val(id);
                $("#tanggal_produksinya").html($tanggalnya);
                $("#tanggalnya").val($tanggalnya);

                //cek apakah ada permintaan_material yang minus dari yang seharusnya
                $cek = 0;
                $jumlah_detail = 0;

                $konsumsi_material = "";
                $ke = 1;
                for($i=0;$i<respond['jm_total_dpl'];$i++){
                    $km_per_line = "";
                    for($k=0;$k<respond['jm_dpl'];$k++){
                        $isi_km = "";
                        if(respond['total_dpl'][$i]['id_detail_produk'] == respond['dpl'][$k]['id_detail_produk'] 
                        && respond['total_dpl'][$i]['jumlah_produk'] != 0
                        && respond['dpl'][$k]['id_detail_purchase_order'] == respond['total_dpl'][$i]['id_detail_purchase_order']){
                            //isi table konsumsi material
                            $nomor = 1;
                            for($t=0;$t<respond['jm_km'];$t++){
                                if(respond['dpl'][$k]['id_produk'] == respond['km'][$t]['id_produk'] && respond['dpl'][$k]['id_line'] == respond['km'][$t]['id_line'] 
                                && respond['dpl'][$k]['jumlah_item_perencanaan'] != 0 && respond['km'][$t]['status_konsumsi'] == 1){
                                    $jumlah_konsumsi_seharusnya = respond['km'][$t]['jumlah_konsumsi'] * respond['dpl'][$k]['jumlah_item_aktual'];
                                    $ukuran_satuan_keluar       = respond['km'][$t]['ukuran_satuan_keluar'];
                                    $jumlah_detail++;
                                    //material dari gudang material
                                    $cari_pm = 0;
                                    $material_gudang = 0;
                                    for($p=0;$p<respond['jm_pm'];$p++){
                                        if(respond['pm'][$p]['id_detail_purchase_order_customer'] == respond['dpl'][$k]['id_detail_purchase_order'] 
                                            && respond['pm'][$p]['id_line'] == respond['dpl'][$k]['id_line'] 
                                            && respond['pm'][$p]['id_konsumsi_material'] == respond['km'][$t]['id_konsumsi_material']){
                                                $cari_pm++;
                                                $material_gudang = respond['pm'][$p]['total_keluar'];
                                                $id_line = respond['pm'][$p]['id_line'];
                                        }
                                    }

                                    //material dari inventory line
                                    $from_inli = 0;

                                    //konsumsi gudang material
                                    $ambilnya = Math.ceil(parseFloat($material_gudang)/parseFloat($ukuran_satuan_keluar));

                                    //wipnya
                                    $wip = parseFloat($from_inli) + ($ambilnya * $ukuran_satuan_keluar) - parseFloat($jumlah_konsumsi_seharusnya);


                                    if($wip < 0){
                                        $cek++;
                                    }
                                    
                                    $isi_km = $isi_km+
                                    '<tr>'+
                                        '<td>'+
                                            '<center>'+$nomor+'</center>'+
                                        '</td>'+
                                        '<td>'+
                                            '<center>'+
                                                respond['km'][$t]['nama_sub_jenis_material']+
                                                '<input type="text" name="id_line'+$jumlah_detail+'" value="'+$id_line+'">'+
                                                '<input type="text" name="id_sub_jm'+$jumlah_detail+'" value="'+respond['km'][$t]['id_sub_jenis_material']+'">'+
                                            '</center>'+
                                        '</td>'+
                                        '<td>'+
                                            '<center>'+respond['km'][$t]['jumlah_konsumsi']+'</center>'+
                                        '</td>'+
                                        '<td>'+
                                            '<center>'+$jumlah_konsumsi_seharusnya+'</center>'+
                                        '</td>'+
                                        '<td>'+
                                            '<center>'+0+'</center>'+
                                        '</td>'+
                                        '<td>'+
                                            '<center>'+($ambilnya * $ukuran_satuan_keluar)+'</center>'+
                                        '</td>'+
                                        '<td>'+
                                            '<center>'+$wip+'</center>'+
                                            '<input type="text" name="wip'+$jumlah_detail+'" value="'+$wip+'">'+
                                        '</td>'+
                                    '</tr>';

                                    $nomor++;
                                }
                            }

                            if(respond['dpl'][$k]['jumlah_item_perencanaan'] > 0){
                                $km_per_line = $km_per_line +
                                respond['dpl'][$k]['nama_line']+' ('+respond['dpl'][$k]['jumlah_item_aktual']+' pcs)'+
                                '<table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'No'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Nama Material'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Konsumsi Material'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Konsumsi Seharusnya'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Konsumsi Inventory Line'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Konsumsi Gudang Material'+
                                            '</th>'+
                                            '<th style="text-align: center;vertical-align: middle;">'+
                                                'Sisa Material Di Line'+
                                            '</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody>'+
                                        $isi_km+
                                    '</tbody>'+
                                '</table><br>';
                            }
                        }
                    }

                    //nama produk
                        if(respond['total_dpl'][$i]['keterangan'] == 0){
                            $id_ukuran = respond['total_dpl'][$i]['id_ukuran'];
                            $id_warna  = respond['total_dpl'][$i]['id_warna'];

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

                            $namanya = respond['total_dpl'][$i]['nama_produk'] + $ukurannya + " (" + $warnanya + " )";
                        }
                        else if(respond['total_dpl'][$i]['keterangan'] == 1){
                            $id_ukuran = respond['total_dpl'][$i]['id_ukuran'];

                            for($l=0;$l<respond['jmukuran'];$l++){
                                if(respond['ukuran'][$l]['id_ukuran'] == $id_ukuran){
                                    $nama_ukuran   = respond['ukuran'][$l]['ukuran_produk'];
                                    $satuan_ukuran = respond['ukuran'][$l]['satuan_ukuran'];

                                    $ukurannya = $nama_ukuran + $satuan_ukuran;
                                }
                            }

                            $namanya = respond['total_dpl'][$i]['nama_produk'] + $ukurannya;

                        }
                        else if(respond['total_dpl'][$i]['keterangan'] == 2){
                            $id_warna  = respond['total_dpl'][$i]['id_warna'];

                            for($k=0;$k<respond['jmwarna'];$k++){
                                if(respond['warna'][$k]['id_warna'] == $id_warna){
                                    $warnanya = respond['warna'][$k]['nama_warna'];
                                }
                            }

                            $namanya = respond['total_dpl'][$i]['nama_produk'] + " (" + $warnanya + ")";
                        }
                        else{
                            $namanya = respond['total_dpl'][$i]['nama_produk'];
                        }
                    //tutup nama produk

                    if(respond['total_dpl'][$i]['jumlah_produk'] != 0){
                        $konsumsi_material = $konsumsi_material +
                        '<hr><h5><b>'+($ke)+'. '+$namanya+'</b></h5>'+
                        $km_per_line;
                        $ke++;
                    }
                }

                $("#konsumsi_material").html($konsumsi_material);

                if($cek != 0){
                    $("#alert").show();
                    $("#setuju").prop('disabled',true);
                } else{
                    $("#alert").hide();
                    $("#setuju").prop('disabled',false);
                }

                $("#jumlah_detail_se7").val($jumlah_detail);
                $("#modalse7").modal();
            }
        });
    });
</script>

<!-- print -->
<script>
    $('.bprint_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $("#id_produksi").val(id);
        $("#modalprint").modal();
    });
</script>