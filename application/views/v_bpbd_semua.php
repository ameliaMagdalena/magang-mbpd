<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua BPBD</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Semua BPBD</span></span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
    <div name="isi_halaman">
        <header class="panel-heading">
            <h2 class="panel-title">Data Semua BPBD</h2>
        </header>

        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th  style="text-align: center;vertical-align: middle;">No</th>
                        <th  style="text-align: center;vertical-align: middle;">Nomor BPBD</th>
                        <th  style="text-align: center;vertical-align: middle;">Tanggal</th>
                        <th  style="text-align: center;vertical-align: middle;">Status</th>
                        <th  style="text-align: center;vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  style="text-align: center;vertical-align: middle;">1</td>
                        <td  style="text-align: center;vertical-align: middle;">BPBD-0162</td>
                        <td  style="text-align: center;vertical-align: middle;">Kamis, 01-07-2020</td>
                        <td  style="text-align: center;vertical-align: middle;">
                            
                        </td>
                        <td class="col-lg-3"> 
                            <a class="modal-with-form col-lg-3 btn btn-primary fa fa-info-circle"
                                title="Detail" href="#modaldetail1"></a>
                            <a class="modal-with-form col-lg-3 btn btn-warning fa fa-pencil-square-o"
                                title="Edit" href="#modaledit"></a>
                            <a class="modal-with-form col-lg-3 btn btn-danger fa fa-trash-o"
                                title="Delete" href="#modalhapus"></a>
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
                <h2 class="panel-title">Detail BPBJ</h2>
            </header>

            <div class="panel-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Nomor BPBD</label>
                <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="BPBJ-0017" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Hari/Tanggal</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="Rabu, 01-04-2020" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Status BPBD</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control"
                        value="" readonly>
                    </div>
                </div>
                <div class="form-group mt-lg">
                    <label class="col-sm-5 control-label">Keterangan</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" rows="3" id="textareaDefault" disabled>Keterangan diisi disini
                        </textarea>
                    </div>
                </div>
                <div>
                    <table class="table table-bordered table-striped mb-none" id="datatable-default" style="font-size:12px">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">No</th>
                                <th style="text-align: center;vertical-align: middle;">Item</th>
                                <th style="text-align: center;vertical-align: middle;">Qty</th>
                                <th style="text-align: center;vertical-align: middle;">Unit</th>
                                <th style="text-align: center;vertical-align: middle;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">1</td>
                                <td style="text-align: center;vertical-align: middle;">Bantal Datron Ligna</td>
                                <td style="text-align: center;vertical-align: middle;">20</td>
                                <td style="text-align: center;vertical-align: middle;">Pcs</td>
                                <td style="text-align: center;vertical-align: middle;">-</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">2</td>
                                <td style="text-align: center;vertical-align: middle;">Ride 5B 120 Midili Green</td>
                                <td style="text-align: center;vertical-align: middle;">30</td>
                                <td style="text-align: center;vertical-align: middle;">Pcs</td>
                                <td style="text-align: center;vertical-align: middle;">-</td>
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
        <form method="POST" action="<?= base_url()?>bpbd/edit_semua_bpbd">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit BPBD</h2>
                </header>

                <div class="panel-body">
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">No BPBD</label>
                    <div class="col-sm-7">
                            <input type="text" name="no_bpbj" id="no_bpbj" class="form-control"
                            value="BPBJ-0017" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Hari/Tanggal:</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" class="form-control"
                            value="Selasa, 09-06-2020" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-lg">
                        <label class="col-sm-5 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="3" id="textareaDefault">Keterangan diisi disini
                            </textarea>
                        </div>
                    </div>
                <div>
                    <div>
                        <table class="table table-bordered table-striped mb-none" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th style="text-align: center;vertical-align: middle;">No</th>
                                    <th style="text-align: center;vertical-align: middle;">Nama Produk</th>
                                    <th style="text-align: center;vertical-align: middle;">Jumlah Produk (pcs)</th>
                                    <th style="text-align: center;vertical-align: middle;">Unit</th>
                                    <th style="text-align: center;vertical-align: middle;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;vertical-align: middle;">1</td>
                                    <td style="text-align: center;vertical-align: middle;">Bantal Datron Ligna</td>
                                    <td style="text-align: center;vertical-align: middle;"><p id="cek">30</p></td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="number" class="form-control" style="width:50%"
                                        id="check1" onchange="jumlah_produk()" value="20" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;vertical-align: middle;">2</td>
                                    <td style="text-align: center;vertical-align: middle;">Ride 5B 120 Midili Green </td>
                                    <td style="text-align: center;vertical-align: middle;">38</td>
                                    <td style="text-align: center;vertical-align: middle;">
                                        <input type="number" class="form-control" style="width:50%"
                                        id="check1" onchange="jumlah_produk()" value="30" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="submit" id="tambah" class="btn btn-primary" value="Simpan">
                            <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>

    <div id="modalhapus" class="modal-block modal-block-sm mfp-hide">
        <form method="POST" action="<?= base_url()?>bpbj/delete_semua_bpbj">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Hapus Data BPBJ</h2>
                </header>

                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p>Apakah anda yakin akan menghapus data bpbj dengan nomor BPBJ-0017 ?</p>
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
                    <h4 class="modal-title">Log BPBJ</h4>
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
    


    