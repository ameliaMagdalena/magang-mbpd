<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Material Yang Belum Disetujui</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Permintaan Material Yang Belum Disetujui</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Permintaan Material Yang Belum Disetujui</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Nama Produk</th>
                        <th  style="text-align: center;vertical-align: middle;">Jumlah Produk</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <input type="hidden" id="id_produk1" value="PRODUK-1">
                        <td  style="text-align: center;vertical-align: middle;">1</td>
                        <td  style="text-align: center;vertical-align: middle;">Senin, 05-05-2020</td>
                        <td  style="text-align: center;vertical-align: middle;">Commpact Mattress Aoki Merah</td>
                        <td  style="text-align: center;vertical-align: middle;">20 pcs</td>
                        <td  style="text-align: center;vertical-align: middle;">Belum Disetujui Gudang Material</td>
                        <td class="col-lg-3"> 
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail1"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus"></a>
                            <a class="col-lg-3 btn fa fa-print" style="background-color:#E56B1F;color:white;"
                                title="Print" href="<?= base_url()?>permintaanMaterialProduksi/print_permintaan_material"></a>
                            <button type="button" class="blog_klik col-lg-3 btn btn-info fa fa-file" 
                            title="Log" id="blog" value=""></button>
                        </td>
                    </tr>
                </tbody>
	        </table>
        </div>
    </div>
    
    <div id='modaldetail1' class="modal-block modal-block-primary mfp-hide">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Detail Permintaan Material</h2>
            </header>

            <div class="panel-body">
                <div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal & Waktu Permintaan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Selasa, 07-07-2020 | 12:00" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Commpact Mattress Aoki Merah" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="20 pcs" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Belum Disetujui Gudang Material" readonly>
                        </div>
                    </div>
                    <br>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th  style="text-align: center;vertical-align: middle;">No</th>
                                <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                                <th  style="text-align: center;vertical-align: middle;">Jumlah Material</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Kain Polos</td>
                                <td style="text-align: center;vertical-align: middle;">500 pcs</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Karton Protector</td>
                                <td style="text-align: center;vertical-align: middle;">200 pcs</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Benang Putih</td>
                                <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Plastik Pembungkus</td>
                                <td style="text-align: center;vertical-align: middle;">50 pcs</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

    <div id='modaledit' class="modal-block modal-block-primary mfp-hide">
        <form method="POST" action="<?= base_url()?>suratJalan/semua_surat_jalan">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Permintaan Material</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Tanggal & Waktu Permintaan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Selasa, 07-07-2020 | 12:00" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Commpact Mattress Aoki Merah" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Jumlah Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="20 pcs" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control"
                            value="Belum Disetujui Gudang Material" readonly>
                        </div>
                    </div>

                    <br>

                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th  style="text-align: center;vertical-align: middle;">No</th>
                                <th  style="text-align: center;vertical-align: middle;">Nama Material</th>
                                <th  style="text-align: center;vertical-align: middle;">Jumlah Material (pcs)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Kain Polos</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" value="500" style="width:100px;height:30px" required>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Karton Protector</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" value="200" style="width:100px;height:30px" required>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">3</td>
                                <td style="text-align: center;vertical-align: middle;">Benang Putih</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" value="50" style="width:100px;height:30px" required>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">4</td>
                                <td style="text-align: center;vertical-align: middle;">Plastik Pembungkus</td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <center>
                                        <input type="number" class="form-control" value="50" style="width:100px;height:30px" required>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    *Jumlah material harus terisi. Jika jumlah material tidak ada, silahkan masukkan 0
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

    <div id="modalhapus" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>permintaanMaterialProduksi/delete">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data Permintaan Material</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Apakah anda yakin akan menghapus data permintaan material untuk produk compact mattress aoki ?</p>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" class="btn btn-primary hapus" value="Hapus">
                                <button class="btn btn-default modal-dismiss">Batal</button>
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
                    <h4 class="modal-title">Log Permintaan Material</h4>
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


<script>
    $('.blog_klik').click(function(){
        var id = $(('#blog')+$(this).attr('value')).val();
        $('#id_terpilih').val(id);

        /*
        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>line/ambil_data_log",
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
                                $nama_user       = respond['user'][$j]['nama_user'];
                                $jabatan_user    = respond['user'][$j]['nama_jabatan'];
                                $department_user = respond['user'][$j]['nama_department'];
                            }
                        } 

                        $tanggal = respond['log'][$i]['waktu_add'];
                        $user = " "+$nama_user +" ("+ $department_user + "-"+ $jabatan_user+")";
                        $data = "Nama Line (" + respond['log'][$i]['nama_line'] +
                        ") , Jumlah Team (" + respond['log'][$i]['jumlah_team'] + ") , "+
                        "Total Processing Time (jam) (" + respond['log'][$i]['total_processing_time'] +
                        ") , Satuan Biaya (" + respond['log'][$i]['satuan_biaya'] +
                        ") , Jumlah Pekerja Per Team (" + respond['log'][$i]['jumlah_pekerja_per_team'] + ")";

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td>'+ $tanggal +'</td>' +
                        '<td>'+ $user +'</td>' +
                        '<td>'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td>'+ $data +'</td>' +
                        '</tr>'
                    }

                    else{
                        for($j=0;$j<$jumlah_user;$j++){
                            if(respond['log'][$i]['user_edit'] == respond['user'][$j]['id_user']){
                                $nama_user       = respond['user'][$j]['nama_user'];
                                $jabatan_user    = respond['user'][$j]['nama_jabatan'];
                                $department_user = respond['user'][$j]['nama_department'];
                            }
                        } 
                        
                        $user = " "+$nama_user +" ("+ $department_user + "-"+ $jabatan_user+")";

                        
                        //compare dengan sebelumnya
                        $data = " ";
                        $count = 0;
                        if(respond['log'][$i]['jumlah_team'] == respond['log'][$i+1]['jumlah_team']){
                           $data = $data;
                        }
                        else{
                            $data = "Jumlah Team (" + respond['log'][$i]['jumlah_team'] + ")";
                            $count++;
                        }

                        if(respond['log'][$i]['total_processing_time'] == respond['log'][$i+1]['total_processing_time']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Total Processing Time (" + respond['log'][$i]['total_processing_time'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Total Processing Time (jam) (" + respond['log'][$i]['total_processing_time'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['satuan_biaya'] == respond['log'][$i+1]['satuan_biaya']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Satuan Biaya (" + respond['log'][$i]['satuan_biaya'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Satuan Biaya (" + respond['log'][$i]['satuan_biaya'] + ")";
                            }
                            $count++;
                        }

                        if(respond['log'][$i]['jumlah_pekerja_per_team'] == respond['log'][$i+1]['jumlah_pekerja_per_team']){
                           $data =$data;
                        }
                        else{
                            if($count == 0){
                                $data = "Jumlah Pekerja Per Team (" + respond['log'][$i]['jumlah_pekerja_per_team'] + ")";
                            }
                            else{
                                $data = $data + ", "+ "Jumlah Pekerja Per Team (" + respond['log'][$i]['jumlah_pekerja_per_team'] + ")";
                            }
                            $count++;
                        }
                        

                        $tampung_isi = $tampung_isi + 
                        '<tr>'+
                        '<td>'+ respond['log'][$i]['waktu_edit'] +'</td>' +
                        '<td>'+ $user +'</td>' +
                        '<td>'+ respond['log'][$i]['keterangan_log'] +'</td>' +
                        '<td>'+ $data +'</td>' +
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
        */

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
                    '</tbody>' +
                '</table>';

                $("#isi_log").html($isi);
                
                $("#modallog").modal();

    });
</script>
    


    