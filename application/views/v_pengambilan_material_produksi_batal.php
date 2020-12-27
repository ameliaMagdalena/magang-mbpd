<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengambilan Material Batal</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pengambilan Material Batal</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Pengambilan Material Batal</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Kode Pengambilan Material</th>
                        <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Status Permintaan</th>
                        <th  style="text-align: center;vertical-align: middle;">Status Pengambilan</th>
                        <th  style="text-align: center;vertical-align: middle;">Status Keluar</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($pengambilan_material as $x){
                            if($x->status_keluar == 2){
                    ?>
                        <tr>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $no ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->id_pengambilan_material ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?= $x->nama_sub_jenis_material ?>
                                <input type="hidden" name="id<?=$no;?>" id="id<?=$no;?>" value="<?= $x->id_pengambilan_material?>">
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php 
                                    $waktu = $x->tanggal_ambil;

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
                                <?php if($x->status_permintaan == 0){?>
                                    Berdasarkan Perencanaan
                                <?php } else{?>
                                    Tambahan
                                <?php } ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                <?php if($x->status_pengambilan == 0){?>
                                    Cutting Kain
                                <?php } else{?>
                                    Lainnya
                                <?php } ?>
                            </td>
                            <td  style="text-align: center;vertical-align: middle;">
                                Batal
                            </td>
                            <td class="col-lg-3"> 
                                <button type="button" class="bdet_klik col-lg-3 btn btn-primary fa fa-info-circle" 
                                    value="<?= $no;?>" title="Detail" style="margin-right:5px;margin-bottom:5px"></button>
                                <!-- jika belum diambil dan normal case-->
                                <?php if($x->status_keluar == 0 && $x->status_permintaan == 0){?>
                                    <button type="button" class="bedit_klik col-lg-3 btn btn-warning fa fa-pencil-square-o" 
                                        value="<?= $no;?>" title="Edit" style="margin-right:5px;margin-bottom:5px"></button>
                                    <button type="button" class="bdelete_normal_klik col-lg-3 btn btn-danger fa fa-trash-o" 
                                        value="<?= $no;?>" title="Delete" style="margin-right:5px;margin-bottom:5px"></button>
                                <?php } ?>
                                <!-- jika belum diambil dan tambahan -->
                                <?php if($x->status_keluar == 0 && $x->status_permintaan == 1){?>
                                    <button type="button" class="bdelete_tambahan_klik col-lg-3 btn btn-danger fa fa-trash-o" 
                                        value="<?= $no;?>" title="Delete" style="margin-right:5px;margin-bottom:5px"></button>
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
                    <h4 class="modal-title"><b>Detail Pengambilan Material</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kode Pengambilan Material</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="kode_pengmat" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Kode Detail Permintaan Material</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="kode_detpermat" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Material</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_material" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tanggal" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Dari Inventory Line</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="jm_inline" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Dari Gudang</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="jm_gudang" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Satuan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="satuan" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="keterangan" readonly></textarea>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status Permintaan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="status_permintaan" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status Pengambilan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="status_pengambilan" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status Keluar</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="status_keluar" readonly>
                        </div>
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
        <div class="modal-dialog modal-xl" style="width:90%">
            <form method="POST" action="<?= base_url()?>pengambilanMaterialProduksi/edit_permintaan_pengambilan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Edit Permintaan Pengambilan Material</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nomor Permintaan Material</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_permat_add" readonly>
                                <input type="hidden" class="form-control" id="status_pengambilan" name="status_pengambilan" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Kode PO</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="kode_po_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Nama Line</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama_line_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Permintaan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_permintaan_add" name="tanggal_permintaan_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Tanggal Produksi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="tanggal_produksi_add" name="tanggal_produksi_add" readonly>
                            </div>
                        </div>
                        <div class="form-group mt-lg">
                            <label class="col-sm-5 control-label">Jumlah Minta</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="jumlah_minta_add" readonly>
                            </div>
                        </div>
                        <br>
                        
                        <div id="table_edit"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                        <input type="button" class="btn btn-default modal-dismiss" value="Batal" onclick="reload()">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- modal delete normal -->
    <div class="modal" id="modaldeletenormal" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>pengambilanMaterialProduksi/delete_permintaan_pengambilan_normal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Hapus Data Permintaan Pengambilan Material</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-text">
                            <input type="hidden" name="id_delete_normal" id="id_delete_normal">
                            <p>Apakah anda yakin akan menghapus data permintaan pengambilan material dengan nomor <span id="no_delete_normal"></span> ?</p>
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

    <!-- modal delete tambahan -->
    <div class="modal" id="modaldeletetambahan" role="dialog">
        <div class="modal-dialog modal-xl" style="width:35%">
            <form method="POST" action="<?= base_url()?>pengambilanMaterialProduksi/delete_permintaan_pengambilan_tambahan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b>Hapus Data Permintaan Pengambilan Material</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-text">
                            <input type="hidden" name="id_delete_tambah" id="id_delete_tambah">
                            <p>Apakah anda yakin akan menghapus data permintaan pengambilan material dengan nomor <span id="no_delete_tambah"></span> ?</p>
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

<!-- detail pengambilan material -->
<script>
    $('.bdet_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>pengambilanMaterialProduksi/detail_pengambilan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#kode_pengmat").val(respond['pengmat'][0]['id_pengambilan_material']);
                $("#kode_detpermat").val(respond['pengmat'][0]['id_detail_permintaan_material']);
                $("#nama_material").val(respond['pengmat'][0]['nama_sub_jenis_material']);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['pengmat'][0]['tanggal_ambil']).getDate();
                var xhari = new Date(respond['pengmat'][0]['tanggal_ambil']).getDay();
                var xbulan = new Date(respond['pengmat'][0]['tanggal_ambil']).getMonth();
                var xtahun = new Date(respond['pengmat'][0]['tanggal_ambil']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggalnya = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal").val($tanggalnya);
                $("#jm_inline").val(respond['pengmat'][0]['stok_wip']);
                $("#jm_gudang").val(respond['pengmat'][0]['jumlah_ambil']);
                $("#satuan").val(respond['pengmat'][0]['satuan_keluar']);
                $("#keterangan").val(respond['pengmat'][0]['keterangan']);

                if(respond['pengmat'][0]['status_permintaan'] == 0){
                    $("#status_permintaan").val("Berdasarkan Perencanaan");
                } else if(respond['pengmat'][0]['status_permintaan'] == 1){
                    $("#status_permintaan").val("Permintaan Tambahan");
                }

                if(respond['pengmat'][0]['status_pengambilan'] == 0){
                    $("#status_pengambilan").val("Cutting Kain");
                } else if(respond['pengmat'][0]['status_pengambilan'] == 1){
                    $("#status_pengambilan").val("Lainnya");
                }

                if(respond['pengmat'][0]['status_keluar'] == 0){
                    $("#status_keluar").val("Belum Diambil");
                } else if(respond['pengmat'][0]['status_keluar'] == 1){
                    $("#status_keluar").val("Sudah Diambil");
                }  else if(respond['pengmat'][0]['status_keluar'] == 2){
                    $("#status_keluar").val("Batal");
                }

                $("#modaldetail").modal();
            }
        });  
    });
</script>


<!-- edit pengambilan material (normal case) -->
<script>
    $('.bedit_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();

        $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>pengambilanMaterialProduksi/detail_permintaan_pengambilan",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#no_permat_add").val(respond['permat'][0]['id_permintaan_material']);
                $("#kode_po_add").val(respond['permat'][0]['kode_purchase_order_customer']);
                $("#nama_line_add").val(respond['permat'][0]['nama_line']);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['permat'][0]['tanggal_permintaan']).getDate();
                var xhari = new Date(respond['permat'][0]['tanggal_permintaan']).getDay();
                var xbulan = new Date(respond['permat'][0]['tanggal_permintaan']).getMonth();
                var xtahun = new Date(respond['permat'][0]['tanggal_permintaan']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggal_permintaan = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_permintaan_add").val($tanggal_permintaan);

                var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

                var tanggal = new Date(respond['permat'][0]['tanggal_produksi']).getDate();
                var xhari = new Date(respond['permat'][0]['tanggal_produksi']).getDay();
                var xbulan = new Date(respond['permat'][0]['tanggal_produksi']).getMonth();
                var xtahun = new Date(respond['permat'][0]['tanggal_produksi']).getYear();
                
                var hari = hari[xhari];
                var bulan = bulan[xbulan];
                var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

                $tanggal_produksi = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;

                $("#tanggal_produksi_add").val($tanggal_produksi);
                $("#jumlah_minta_add").val(respond['permat'][0]['jumlah_minta']);

                if(respond['permat'][0]['nama_line'] == "Line Cutting" || respond['permat'][0]['nama_line'] == "Line Bonding" || respond['permat'][0]['nama_line'] == "Line Assy"){
                    $("#status_pengambilan").val(1);
                }
                else{
                    $("#status_pengambilan").val($("#keterangan_pengambilan").val());
                }

                $isi = "";
                $id_one_pengmat = respond['one_pengmat'][0]['id_detail_permintaan_material'];
                for($i=0;$i<respond['jm_detpermat'];$i++){
                    if(respond['detpermat'][$i]['id_detail_permintaan_material'] == $id_one_pengmat){
                        //telah diambil
                        $cari                 = 0;
                        $jumlah_sebelum       = 0;
                        for($o=0;$o<respond['jm_pengmat'];$o++){
                            if(respond['pengmat'][$o]['id_detail_permintaan_material'] == respond['detpermat'][$i]['id_detail_permintaan_material']){                
                                $jumlah_sebelum          = parseFloat(respond['pengmat'][$o]['jumlah_keluar']) + parseFloat(respond['pengmat'][$o]['jumlah_wip_ambil']);
                                $cari++;
                            }

                            if($cari > 0){
                                $jumlah_sebelum = $jumlah_sebelum;
                            }
                            else{
                                $jumlah_sebelum = 0;
                            }
                        }

                        //telah diambil dari inventory line
                        for($k=0;$k<respond['jm_det_inline'];$k++){
                            if(respond['det_inline'][$k]['id_detail_permintaan_material'] == respond['detpermat'][$i]['id_detail_permintaan_material'] &&
                            respond['det_inline'][$k]['status'] == 1){
                                $jumlah_sebelum = parseFloat($jumlah_sebelum) + parseFloat(respond['det_inline'][$k]['jumlah_material']);
                            }
                        }

                        //wip
                            $cari_wip = 0;
                            $wip = 0;
                            for($p=0;$p<respond['jm_wip'];$p++){
                                if(respond['wip'][$p]['id_sub_jenis_material']  == respond['detpermat'][$i]['id_sub_jenis_material']){
                                    $wip = respond['wip'][$p]['total_material'];
                                    $cari_wip++;
                                }

                                if($cari_wip > 0){
                                    $wip = $wip;
                                }
                                else{
                                    $wip = 0;
                                }
                            }
                        //tutup wip

                        $jumlah_ambil_sebelum = parseFloat(respond['one_pengmat'][0]['stok_wip']) + parseFloat(respond['one_pengmat'][0]['jumlah_ambil']);
                        $wipnya = parseFloat($wip) + parseFloat(respond['one_pengmat'][0]['stok_wip']);
                        $batas_ambil = respond['detpermat'][$i]['needs'] - $jumlah_sebelum + $jumlah_ambil_sebelum;

                        $isi = $isi +
                        '<tr>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                ($i+1)+
                                '<input type="hidden" id="stat_km" value="'+respond['detpermat'][$i]['status_konsumsi']+'" >'+
                                '<input type="hidden" name="id_pengmat_ed" value="'+respond['one_pengmat'][0]['id_pengambilan_material']+'" >'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['detpermat'][$i]['id_detail_permintaan_material']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="id_det_permat" value="'+respond['detpermat'][$i]['id_detail_permintaan_material']+'">'+
                                '<input type="hidden" name="id_sub_jenmat" value="'+respond['detpermat'][$i]['id_sub_jenis_material']+'">'+
                                respond['detpermat'][$i]['nama_sub_jenis_material']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['detpermat'][$i]['jumlah_konsumsi']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['detpermat'][$i]['needs']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $jumlah_sebelum+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<input type="hidden" name="wip" value="'+$wip+'">'+
                                $wipnya+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                $batas_ambil+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<center><input type="number" min="0" max="'+$batas_ambil+'" step=".01" class="form-control" name="ambil" id="ambil'+$i+'" oninput="cek()" value="'+$jumlah_ambil_sebelum+'"></center>'+
                                '<center><input type="hidden" min="0" step=".01" class="form-control" name="jumlah_lama" id="jumlah_lama" value="'+$jumlah_ambil_sebelum+'" readonly></center>'+
                                '<center><input type="hidden" min="0" step=".01" class="form-control" name="jumlah_wip_lama" id="jumlah_wip_lama" value="'+respond['one_pengmat'][0]['stok_wip']+'" readonly></center>'+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                respond['detpermat'][$i]['satuan_keluar']+
                            '</td>'+
                            '<td style="text-align: center;vertical-align: middle;">'+
                                '<textarea class="form-control" name="keterangan" rows="3" id="textareaDefault">'+respond['one_pengmat'][0]['keterangan']+'</textarea>'+
                            '</td>'+
                        '</tr>';
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
                                        'Kode Detail Permintaan Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Nama Material'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Konsumsi'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Permintaan'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Telah Diambil'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'WIP Line'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Batas Ambil'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Akan Diambil'+
                                    '</th>'+
                                    '<th style="text-align: center;vertical-align: middle;">'+
                                        'Satuan Konsumsi'+
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
                '<input type="hidden" name="jumlah_detpermat" id="jumlah_detpermat" value="'+respond['jm_detpermat']+'">';

                $("#table_edit").html($table);
                $("#modaledit").modal();
            }
        });  
    });
</script>

<!-- cek -->
<script>
    function cek(){
        $jumlah_detpermat = $("#jumlah_detpermat").val();

        $terisi = 0;
        for($i=0;$i<$jumlah_detpermat;$i++){
            if($("#ambil"+$i).val() > 0){
                $terisi++;
            }
        }

        if($terisi > 0){
            $("#tambah").prop('disabled',false);
        }
        else{
            $("#tambah").prop('disabled',true);
        }
    }
</script>

<!-- delete tambahan-->
<script>
    $('.bdelete_tambahan_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $("#id_delete_tambah").val(id);
        $("#no_delete_tambah").html(id);

        $("#modaldeletetambahan").modal();
    
    });
</script>

<!-- delete normal -->
<script>
    $('.bdelete_normal_klik').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#id"+no).val();
        
        $("#id_delete_normal").val(id);
        $("#no_delete_normal").html(id);

        $("#modaldeletenormal").modal();
    
    });
</script>




    