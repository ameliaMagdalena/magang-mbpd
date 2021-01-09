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
                <input type="hidden" name="id_detail" id="id_detail<?= $x ?>" class="form-control" value="<?php echo $detail[$x]['id_detail_permintaan_material'] ?>" readonly>
            
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
                                        /*$jumlahambil = $pengambilan[$y]['jumlah_keluar']; //jumlah dengan satuan ukuran
                                        $diambil=$diambil+$jumlahambil; */

                                        for ($aa=0; $aa<count($pengeluaran); $aa++){
                                            $diambil = $diambil+$pengeluaran[$aa]['jumlah_keluar'];
                                        } //jumlah dengan satuan ukuran

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
                <!--<div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Stok di Gudang</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="<?php  $ketersediaan = 0;
                            for($mat=0; $mat<count($material); $mat++){
                                if($detail[$y]['id_sub_jenis_material'] == $material[$mat]['id_sub_jenis_material']){
                                    $ketersediaan = $ketersediaan+1;
                                }
                            } echo $ketersediaan;
                        ?>" readonly>
                    </div>
                </div>-->
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
                                <td><?php echo $pengambilan[$z]['tanggal_ambil'] ?>
                                </td>
                                <td><?php
                                    $jlhsatu = $pengambilan[$z]['jumlah_ambil'];
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
                                    <?php if ($pengambilan[$z]['status_keluar'] == 0){ ?>
                                        <button type="button" class="ambilz col-lg-3 btn btn-success fa fa-check" 
                                            value="<?php echo $z ?>" title="Ambil"></button>
                                        <button type="button" class="batalz col-lg-3 btn btn-danger fa fa-times" 
                                            value="<?php echo $z ?>" title="Tolak"></button>
                                    <?php } ?>
                                </td>
                            </tr>
                            
                            <!-- ******************************** MODAL AMBIL ***************************** -->
                            <!-- ************************************************************************** -->
                            <div id='modalambil' class="modal" role="dialog">
                                <div class="modal-dialog modal-xl" style="width:50%">
                                    <form class="" action="<?php echo base_url()?>PengambilanMaterial/diambil" method="post">
                                        
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
                                                        <input type="text" name="amaterial" id="amaterial" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Line</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="aline" id="aline" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Tanggal Pengambilan</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="atgl_ambil" id="atgl_ambil" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Jumlah</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="ajumlah" id="ajumlah" class="form-control"  value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label">Satuan</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="asatuan" id="asatuan" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div id="isiambil" style="text-align: center"></div>
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

                <?php if(($_SESSION['nama_jabatan'] == "PPIC") && ($_SESSION['nama_departemen'] == "Material") || 
                    ($_SESSION['nama_jabatan'] == "Direktur") && ($_SESSION['nama_departemen'] == "Management")){?>
                    <div class="row">
                        <div class="text-center">
                            <button type="button" class="beliz btn btn-primary" value="<?php echo $x ?>">Request Pembelian</button>

                            <!-- ******************************** MODAL BELI ****************************** -->
                            <!-- ************************************************************************** -->
                            <div id='modalbeli' class="modal" role="dialog">
                                <div class="modal-dialog modal-xl" style="width:50%">
                                
                                    <form class="" action="<?php echo base_url()?>PermintaanPembelianMaterial/insert" method="post">
                                            
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><b>Request Pembelian Material</b></h4>
                                            </div>

                                            <div class="modal-body">
                                                <input type="hidden" name="idmaterial" id="idmaterial" class="form-control" value="<?php echo $detail[$x]['id_sub_jenis_material'] ?>" readonly>
                                                <input type="hidden" name="iddetail" id="iddetail" class="form-control" value="" readonly>
                                                
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label" style="text-align: right">Material<span class="required">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="materialz" id="materialz" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label" style="text-align: right">Jumlah Material<span class="required">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="jumlahz" id="jumlahz" class="form-control"
                                                        placeholder="" value="" min="1" required>
                                                        <span id="spjumlah"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label" style="text-align: right">Satuan<span class="required">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="satuanz" id="satuanz" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label" style="text-align: right">Tanggal Penerimaan<span class="required">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="terimaz" id="terimaz" class="form-control" value="" max="<?php echo $permintaan_material[0]['tanggal_produksi'] //date('Y-m-d', strtotime('-1 days', strtotime($permintaan_material[0]['tanggal_produksi'])));  ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-lg">
                                                    <label class="col-sm-4 control-label" style="text-align: right">Keterangan</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="keteranganz" id="keteranganz" class="form-control"
                                                        placeholder="" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <input type="submit" id="tambah" class="btn btn-primary" value="Request">
                                                        <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Batal</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- ****************************** END MODAL BELI **************************** -->
                            <!-- ************************************************************************** -->

                        </div>
                    </div>
                <?php } ?>
                
            </div>
                
        </section>
        <?php } ?>
<!-- *************************************** END DAFTAR MATERIAL ************************************** -->


    </div>



<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>

<script>
    $('.beliz').click(function(){
        var no = $(this).attr('value');
        var id = $("#id_detail"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax_detail",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#iddetail").val(id);
                $("#idmaterial").val(respond['dett'][0]['id_sub_jenis_material']);
                $("#satuanz").val(respond['dett'][0]['satuan_ukuran']);
                $("#materialz").val(respond['dett'][0]['nama_sub_jenis_material']);
                $("#jumlahz").attr("placeholder", "Stok Max: "+respond['dett'][0]['max_stok']);
                $("#modalbeli").modal();
            }
        }); 
    });
</script>

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
                $("#amaterial").val(respond['ambil'][0]['id_sub_jenis_material']);
                $("#aline").val(respond['ambil'][0]['nama_line']);
                $("#atgl_ambil").val(respond['ambil'][0]['tanggal_ambil']);
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
    /* $('.beliz').click(function(){
        var no      = $(this).attr('value');
        var id      = $("#idd"+no).val();

         $.ajax({
            type:"post",    
            url:"<?php echo base_url() ?>PermintaanMaterial/ajax",
            dataType: "JSON",
            data: {id:id},

            success: function(respond){
                $("#materialz").val($isi);
                $("#idsedia").val(id);
                $("#sedia").modal();
            }
        }); 
    }); */
</script>

<script>
    function reload() {
        location.reload();
    }
</script>