<!-- <!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url()?>assets/vendor/daypilot/main.css?v=2020.3.4594" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"/>
    <script src="<?php echo base_url()?>assets/javascripts/daypilot-all.min.js?v=2020.3.4594"></script>

    <style>
        .scheduler_default_corner div:nth-of-type(2) {
            display: none !important;
        }
    </style>

</head> -->

<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->]
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perencanaan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perencanaan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<h1>Detail Perencanaan</h1>
<hr>


<form class="form-horizontal mb-lg" action="<?php //echo base_url()?>" method="post">
    <div class="panel-body">
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">ID Permintaan Material</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="idpermintaan" value="<?php echo $id_permintaan ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Produk</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $permintaan_material[0]['nama_produk'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Jumlah</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" value="<?php echo $permintaan_material[0]['jumlah_minta'] ?>" readonly>
            </div>
        </div>
        <div class="form-group mt-lg">
            <label class="col-sm-3 control-label">Tanggal Produksi</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" value="<?php echo $permintaan_material[0]['tanggal_produksi'] ?>" readonly>
            </div>
        </div>

        <div class="form-group mt-lg">
            <center><h4> Daftar Material </h4></center>
        </div>


<!-- ****************************************** DAFTAR MATERIAL ************************************** -->
        <?php for($x=0; $x<count($detail); $x++){ ?>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <!-- <a href="#" class="fa fa-times"></a> -->
                </div>

                <h2 class="panel-title"><?php echo $detail[$x]['nama_sub_jenis_material'] ?></h2>
            </header>

            <div class="panel-body">
                <input type="text" name="id_detail" class="form-control" value="<?php echo $detail[$x]['id_detail_permintaan_material'] ?>" readonly>
            
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Kebutuhan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php $produksi=$detail[$x]['needs']; //needs dengan satuan keluar
                            $ukuran=$detail[$x]['ukuran_satuan_keluar']; //ukuran satuan keluar
                            $needmaterial=$produksi/$ukuran; //needs dengan satuan ukuran
                            $needs = ceil($needmaterial);
                            echo $needs; //ceil=roundup ?>"
                        readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Satuan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php echo $detail[$x]['satuan_ukuran'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Sudah Diambil</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php $diambil=0;
                            for($y=0; $y<count($pengambilan); $y++){
                                if ($pengambilan[$y]['id_detail_permintaan_material'] == $detail[$x]['id_detail_permintaan_material']){
                                    if ($pengambilan[$y]['status_keluar'] == 1){
                                        $jumlahambil = $pengambilan[$y]['jumlah_keluar']; //jumlah dengan satuan ukuran
                                        $diambil=$diambil+$jumlahambil;
                                    }
                                }
                            } echo $diambil ?>"
                        readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Belum Diambil</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php $belumambil=$needs-$diambil; 
                            echo $belumambil?>" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Stok di Gudang</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="ambil dari ketersediaan" readonly>
                        <span class="required">*</span> <?php ?>ajax
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <table class="table table-bordered table-striped table-hover" border="1">
                        <thead>
                            <tr>
                                <th style="text-align:center" class="col-lg-3">Tanggal Pengambilan</th>
                                <th style="text-align:center" class="col-lg-1">Jumlah</th>
                                <th style="text-align:center" class="col-lg-1">Satuan</th>
                                <th style="text-align:center" class="col-lg-3">Status Pengambilan</th>
                                <th style="text-align:center" class="col-lg-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($pengambilan)==0){ ?>
                                <tr>
                                    <td colspan='5' style="text-align:center"> Belum Ada Permintaan Pengambilan </td>
                                </tr>
                            <?php }else{ ?>
                            <?php for($z=0; $z<count($pengambilan); $z++){ 
                                    if ($pengambilan[$z]['id_detail_permintaan_material'] == $detail[$x]['id_detail_permintaan_material']){ ?>
                                        <input type="hidden" id="idmaterial<?= $z ?>" value="<?php echo $detail[$x]['id_sub_jenis_material'] ?>">
                                        <input type="hidden" id="idd<?= $z ?>" value="<?php echo $pengambilan[$z]['id_pengambilan_material'] ?>" >
                                        <input type="hidden" id="uksatuan<?= $z ?>" value="<?php echo $detail[$x]['ukuran_satuan_keluar'] ?>" >
                            <tr>
                                <td><?php echo "test" //$pengambilan[$z]['tanggal_ambil'] ?>
                                </td>
                                <td><?php $jlhsatu = 0;
                                    for($a=0; $a<count($pengambilan); $a++){
                                        if ($pengambilan[$a]['id_sub_jenis_material'] == $detail[$x]['id_sub_jenis_material']){
                                            $jlhsatu = $jlhsatu + $pengambilan[$a]['jumlah_ambil']; //jumlah dengan satuan keluar
                                        }
                                    }
                                    $uk=$detail[$x]['ukuran_satuan_keluar']; //ukuran satuan keluar
                                    $jlhnya=$jlhsatu/$uk; //jumlah dengan satuan ukuran
                                    $jumlahnya = ceil($jlhnya); //ceil=roundup
                                    echo $jumlahnya;
                                ?></td>
                                <td><?php echo $detail[$x]['satuan_ukuran'] ?></td>
                                <td><?php
                                    if ($pengambilan[$z]['status_keluar'] == 0){
                                        echo "Belum Diambil";
                                    } else{
                                        echo "Sudah Diambil";
                                    } ?>
                                </td>
                                <td>
                                    <!-- <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                        title="Detail" href="#modaldetail"></a> -->
                                    <button type="button" class="ambilz col-lg-3 btn btn-success fa fa-check" 
                                        value="<?php echo $z ?>" title="Ambil"></button>
                                    <button type="button" class="batalz col-lg-3 btn btn-danger fa fa-times" 
                                        value="<?php echo $z ?>" title="Batal"></button>
                                </td>
                            </tr>
                            
                            <!-- ******************************** MODAL AMBIL ***************************** -->
                            <!-- ************************************************************************** -->
                            <div id='modalambil' class="modal" role="dialog">
                                <div class="modal-dialog modal-xl" style="width:50%">
                                    <form class="form-horizontal mb-lg" action="<?php echo base_url()?>PengambilanMaterial/diambil" method="post">
                                        
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><b>Pengambilan Material</b></h4>
                                            </div>
                                    
                                            <div class="modal-body">
                                                <input type="hidden" name="id_permintaan" id="idminta" class="form-control" value="" readonly>
                                                <input type="hidden" name="id_pengambilan" id="idambil" class="form-control" value="" readonly>
                                                <input type="hidden" name="status" class="form-control" value="1" readonly>
                                                
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Material</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="material" id="amaterial" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Line</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="line" id="aline" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Tanggal Pengambilan</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="tgl_ambil" id="atgl_ambil" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Jumlah</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="jumlah" id="ajumlah" class="form-control"  value="" readonly>
                                                        <small>Belum diambil : 15.24 m3</small>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Satuan</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="satuan" id="asatuan" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div id="isiambil"></div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <input type="submit" id="tambah" class="btn btn-primary" value="Lanjutkan">
                                                        <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ****************************** END MODAL AMBIL *************************** -->
                            <!-- ************************************************************************** -->

                            <?php } } } ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="text-center">
                        <button type="button" class="modal-with-form btn btn-primary" href="#modalbeli<?php echo $detail[$x]['id_detail_permintaan_material'] ?>">Request Pembelian</button>
                        <button type="button" class="modal-with-form btn btn-primary" href="#modaljadwal<?php echo $detail[$x]['id_detail_permintaan_material'] ?>">Tambah Jadwal Pengambilan</button>
                        
                        <!-- ******************************** MODAL BELI ****************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modalbeli<?php echo $detail[$x]['id_detail_permintaan_material'] ?>' class="modal-block modal-block-md mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Request Pembelian Material</h2>
                                </header>

                                <div class="panel-body">
                                    <input type="hidden" name="id_material" class="form-control" value="" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Material</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="material" class="form-control"
                                            value="Reb 55" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Jumlah Material</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="jabatan" class="form-control"
                                            placeholder="Stok Max: 30 m3">
                                            Stok Di Gudang : 15 m3
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-primary" value="Request" onclick="reload()">
                                            <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>
                        <!-- ****************************** END MODAL BELI **************************** -->
                        <!-- ************************************************************************** -->

                        <!-- ****************************** MODAL JADWAL ****************************** -->
                        <!-- ************************************************************************** -->
                        <div id='modaljadwal<?php echo $detail[$x]['id_detail_permintaan_material'] ?>' class="modal-block modal-block-md mfp-hide">
                            <section class="panel">
                            
                            <form class="form-horizontal mb-lg" action="<?php echo base_url()?>" method="post">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Tambah Jadwal Pengambilan Material</h2>
                                </header>
                                
                                <div class="panel-body">
                                    <input type="hidden" name="id_detail_permintaan_material" class="form-control" value="<?php echo $detail[$x]['id_detail_permintaan_material'] ?>" readonly>
                                    <input type="hidden" name="id_pengambilan_material" class="form-control" value="AMBIL-" readonly>
                                    
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Material</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="material" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Line</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="line" class="form-control" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl_ambil" class="form-control"
                                            value="" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-lg">
                                        <label class="col-sm-3 control-label">Jumlah Material</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="jumlah" class="form-control"
                                            placeholder="Stok Max: 30 m3">
                                            Stok Di Gudang : 15 m3
                                        </div>
                                    </div>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" id="tambah" class="btn btn-primary" value="Tambah" onclick="reload()">
                                            <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                                        </div>
                                    </div>
                                </footer>
                                </form>
                            </section>
                        </div>
                        <!-- **************************** END MODAL JADWAL **************************** -->
                        <!-- ************************************************************************** -->
                    
                    </div>
                </div>
            </div>
                
        </section>
        <?php } ?>
<!-- *************************************** END DAFTAR MATERIAL ************************************** -->


    </div>
</form>



<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>


<script>
    $('.ambilz').click(function(){
        var no = $(this).attr('value');
        var id = $("#idd"+no).val();
        var idminta = $("#idpermintaan").val();
        var mat = $("#idmaterial"+no).val();
        var ukuran = $("#uksatuan"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax_ambil",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#amaterial").val(respond['ambil'][0]['nama_sub_jenis_material']);
                $("#aline").val(respond['ambil'][0]['nama_line']);
                //$("#atgl_ambil").val(respond['ambil'][0]['tanggal_ambil']);
                $("#asatuan").val(respond['ambil'][0]['satuan_ukuran']);

                jlhsatu = respond['ambil'][0]['jumlah_ambil'];
                uk=ukuran; //ukuran satuan keluar
                jlhnya=jlhsatu/uk; //jumlah dengan satuan ukuran
                jumlahnya = Math.ceil(jlhnya);
                $("#ajumlah").val(jumlahnya);

                $isi = 'Status Pengambilan Material akan diubah menjadi <b>Sudah Diambil</b>.';
                $("#isiambil").html($isi);
                $("#idambil").val(id);
                $("#idminta").val(idminta);
                $("#modalambil").modal();
            }
        }); 
    });
</script>


<script>
    $('.batalz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax_ambil",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $isi = 'Anda akan membatalkan Permintaan Material dengan No. Form <b>'+respond['permat'][0]['id_permintaan_material']+'</b>?';
                $("#isibatal").html($isi);
                $("#idbatal").val(id);
                $("#modalbatal").modal();
            }
        }); 
    });
</script>

<script>
    function reload() {
        location.reload();
    }
</script>