<?php
include('../../inc/config.php');
include('../../inc/function.php');
//data dari produk
if (isset($_POST)) {
    $aksi=$_POST['aksi'];
    
   
    
    if ($aksi == 'tambah') {
        $sql = "INSERT INTO map(id_hotel,kordinat)VALUES('$_POST[id_hotel]','$_POST[kordinat]')";
    } else if ($aksi == 'edit') {
        if ($ukuran_file > 0) {
            $sql = "UPDATE kamar set id_hotel='$_POST[id_hotel]',jumlah_kamar='$_POST[jumlah_kamar]',jenis_kamar='$_POST[jenis_kamar]',fasilitas='$_POST[fasilitas]',foto='$foto_file',harga_kamar='$_POST[harga_kamar]'
               where id_kamar='$id'";
            
        } else {
            $sql = "UPDATE kamar set id_hotel='$_POST[id_hotel]',jumlah_kamar='$_POST[jumlah_kamar]',jenis_kamar='$_POST[jenis_kamar]',fasilitas='$_POST[fasilitas]',harga_kamar='$_POST[harga_kamar]'
            where id_kamar='$id'";
            
        }
    }
    
    $result = mysql_query($sql) or die(mysql_error());
    
    
    //check if query successful
    if ($result) {
        header('location:../index.php?mod=map&pg=map_view&status=0');
    } else {
        header('location:../index.php?mod=map&pg=map_view&status=1');
    }
}
?>