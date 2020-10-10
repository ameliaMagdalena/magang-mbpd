<?php if($ln->nama_line == "Line Cutting" || $ln->nama_line == "Line Bonding" || $ln->nama_line == "Line Sewing"){ 
    if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Produksi"){
?>
    '<option value="<?= $ln->id_line ?>"><?= $ln->nama_line ?></option>'+
<?php }} else if($ln->nama_line == "Line Assy"){
    if($_SESSION['nama_jabatan'] == "Admin" && $_SESSION['nama_departemen'] == "Finish Good"){
?>
    '<option value="<?= $ln->id_line ?>"><?= $ln->nama_line ?></option>'+
<?php }} ?>