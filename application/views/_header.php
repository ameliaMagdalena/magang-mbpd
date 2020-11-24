<body>
	<section class="body">
        <section>
            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                        <a href="<?= base_url()?>dashboard" class="logo">
                            <img src="<?= base_url('assets/images/logombp.png')?>" width="10%" height="50%" />
                            <span id="nama">PT Maju Bersama Persada Dayamu</span>
                        </a>
                        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">
                    <span class="separator"></span>
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="<?= base_url('assets/images/fotoprofil/male_dark.png')?>" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/fotoprofil/male.png" />
                            </figure>
                            <div class="profile-info">
                                <span class="name">
                                    <?php echo $_SESSION['nama_user'];?>
                                </span>
                                <span class="role">
                                    <?php if($_SESSION['nama_jabatan'] == "PIC"){ 
                                        echo $_SESSION['nama_departemen'] . " - " . $_SESSION['nama_jabatan'] . " ".$_SESSION['nama_line'];
                                    }
                                    else{
                                        echo $_SESSION['nama_departemen'] . " - " . $_SESSION['nama_jabatan'];
                                    }
                                    ?>
                                </span>
                            </div>
                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a class="modal-sizes" role="menuitem" tabindex="-1" href="#myprofile"><i class="fa fa-user"></i>  Profil Saya</a>
                                </li>
                                <li>
                                    <a class="modal-sizes" role="menuitem" tabindex="-1" href="#editprofile"><i class="fa fa-pencil-square-o"></i>  Edit Profil</a>
                                </li>
                                <li>
                                    <a class="modal-sizes" role="menuitem" tabindex="-1" href="#changepassword"><i class="fa fa-key"></i>  Ganti Kata Sandi</a>
                                </li>
                                <li>
                                    <a class="modal-sizes" role="menuitem" tabindex="-1" href="#kelolaakun"><i class="fa fa-cog"></i>  Kelola Akun</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url()?>akses/logout"><i class="fa fa-power-off"></i>  Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->


                <div id="myprofile" class="modal-block modal-block-sm mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Profil Saya</h2>
                        </header>
                        <div class="panel-body">
                                <div class="modal-wrapper">
                                    <div class="modal-text">
                                        <center>
                                            <figure>
                                                <img class="profile-data-picture" src="<?= base_url('assets/images/fotoprofil/male_dark.png')?>" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/fotoprofil/male.png" />
                                            </figure>
                                            <br>
                                            <table>
                                                <tr>
                                                    <td><b>Nama User</b></td>
                                                    <td><b>:</b></td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp; <?= $_SESSION['nama_user'];?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Jabatan</b></td> 
                                                    <td><b>:</b></td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp; 
                                                        <?php if($_SESSION['nama_jabatan'] == "PIC"){ 
                                                            echo $_SESSION['nama_jabatan'] ." ";
                                                            echo $_SESSION['nama_line'];
                                                        }
                                                        else{
                                                            echo $_SESSION['nama_jabatan'];
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Department</b></td>
                                                    <td><b>:</b></td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp; <?= $_SESSION['nama_departemen'];?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email</b></td>
                                                    <td><b>:</b></td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp; <?= $_SESSION['email_user'];?></td>
                                                </tr>
                                            </table>
                                        </center>

                                    </div>
                                </div>
                            </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-default modal-dismiss">Ok</button>
                                </div>
                            </div>
                        </footer>
                    </section>
                </div>

                <div id='editprofile' class="modal-block modal-block-primary mfp-hide">
                    <form method="POST" action="<?= base_url()?>profile/edit_profile">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Edit Profil</h2>
                            </header>
                            <div class="panel-body">
                                <div class="form-group mt-lg">
                                    <div class="col-sm-9">
                                        <input type="hidden" name="id_user" id="id_user" class="form-control"
                                        value="<?php echo $_SESSION['id_user'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Nama<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_user" id="nama" class="form-control"
                                        placeholder="ketik nama" value="<?php echo $_SESSION['nama_user'];?>" required>
                                    </div>
                                </div>
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Email<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email_user" id="email_user" class="form-control"
                                        onchange="cek_email_edit()" placeholder="ketik email" value="<?php echo $_SESSION['email_user'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </form>
                </div>

                <div id='kelolaakun' class="modal-block modal-block-primary mfp-hide">
                    <form method="POST" action="<?= base_url()?>akses/ganti_login">
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">Kelola Akun</h2>
                            </header>
                            <div class="panel-body">
                                <div class="form-group mt-lg">
                                    <label class="col-sm-5 control-label">Login Sebagai:</label>
                                    <div class="col-sm-7">
                                        <?php for($i=0;$i<$_SESSION['jumlah_jabatan'];$i++){
                                            if($_SESSION['jabatan_user'][$i]['id_jabatan_karyawan'] == $_SESSION['id_jabatan_karyawan']){?>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="login_sebagai" checked
                                                        value="<?= $_SESSION['jabatan_user'][$i]['id_jabatan_karyawan']?>">
                                                        <?= $_SESSION['jabatan_user'][$i]['nama_departemen']?> -
                                                        <?= $_SESSION['jabatan_user'][$i]['nama_jabatan']?>
                                                    </label>
                                                </div>
                                            <?php } else {?>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="login_sebagai" 
                                                        value="<?= $_SESSION['jabatan_user'][$i]['id_jabatan_karyawan']?>">
                                                        <?= $_SESSION['jabatan_user'][$i]['nama_departemen']?> -
                                                        <?= $_SESSION['jabatan_user'][$i]['nama_jabatan']?>
                                                    </label>
                                                </div>
                                        <?php } }?>
                                    </div>
                                </div>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <button type="button" class="btn btn-default modal-dismiss"  onclick="reload()">Batal</button>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </form>
                </div>

                <div id='changepassword' class="modal-block modal-block-primary mfp-hide">
                    <form method="POST" action="<?= base_url()?>profile/change_password">
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                </div>

                                <h2 class="panel-title">Ganti Kata Sandi</h2>
                            </header>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Kata Sandi Saat Ini <span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <div class="input-group  mb-md">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <input type="password" name="old" id="old" 
                                            oninput="cek_old()" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label"> Kata Sandi Baru <span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <div class="input-group mb-md">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <input type="password" name="new" id="new" 
                                            class="form-control" oninput="cek_new_confirm()" required min="8"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Konfirmasi Kata Sandi Baru <span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <div class="input-group  mb-md">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key"></i>
                                            </span>
                                            <input type="password" name="confirm" id="confirm" class="form-control"
                                            required  oninput="cek_new_confirm()" min="8"/>
                                        </div>
                                    </div>
                                </div>
                                <p id="pemberitahuan1" style="font-size:10px; color:red"></p>
                                <p id="pemberitahuan2" style="font-size:10px; color:red"></p>
                                <p id="pemberitahuan3" style="font-size:10px; color:red"></p>
                            </div>
                            <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" class="btn btn-primary" id="ganti_pass" value="Save" disabled>
                                            <button type="button" class="btn btn-default modal-dismiss" onclick="reload()">Cancel</button>
                                        </div>
                                    </div>
                            </footer>
                        </section>
                    </form>
                </div>
            </header>
            <!-- end: header -->
        </section>

<script>
    function cek_old(){
        var lama = $("#old").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>profile/cek_oldpass",
            dataType: "JSON",
            data: {lama:lama},

            success: function(respond){
                if(respond['res'] == 1){
                    $("#pemberitahuan1").html("");
                    cek_terisi();
                }
                else if(respond['res'] == 0){
                    $("#pemberitahuan1").html("*Kata sandi saat ini yang anda masukkan tidak sesuai.");
                    $('#ganti_pass').attr("disabled", true);
                }
            }
        });
    }
</script>

<script>
    function cek_new_confirm(){
        var baru = $("#new").val();
        var konfirmasi = $("#confirm").val();

        if(baru != "" && konfirmasi != ""){
            if(baru == konfirmasi){
                $("#pemberitahuan2").html("");

                if(baru.length < 8 && konfirmasi.length <8){
                    $("#pemberitahuan3").html("*Kata sandi baru dan kata sandi konfirmasi minimal 8 karakter");
                    $('#ganti_pass').attr("disabled", true);
                }
                else{
                    $("#pemberitahuan3").html("");
                    cek_terisi();
                }
            }
            else{
                $("#pemberitahuan2").html("*Kata sandi baru dan kata sandi baru konfirmasi yang anda masukkan tidak sesuai.");
                $('#ganti_pass').attr("disabled", true);
            }
        }
    }
</script>

<script>
    function cek_terisi(){
        var lama = $("#old").val();
        var baru = $("#new").val();
        var konfirmasi = $("#confirm").val();

        if(lama != "" && baru != "" && konfirmasi != ""){
            $('#ganti_pass').attr("disabled", false);
        }
        else{
            $('#ganti_pass').attr("disabled", true);
        }
    }
</script>

<script>
    function cek_email_edit(){
        var email_edit = $("#email_user").val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url() ?>profile/cek_email_edit",
            dataType: "JSON",
            data: {email_edit:email_edit},

            success: function(respond){
                if(respond['res'] == 1){
                    alert("Mohon maaf, email tersebut sudah terdaftar untuk user yang lain. Silahkan coba dengan email yang lain");
                }
                reload();
            }
        });
    }
</script>