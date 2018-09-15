<?php
include('../../inc/config.php');
include('../../inc/function.php');
//data dari kmar
if (isset($_POST)) {
    
    
    $aksi = $_POST['aksi'];
    $id   = $_POST['id'];
    
    $lokasi_file   = $_FILES['foto']['tmp_name'];
    $foto_file     = $_FILES['foto']['name'];
    $tipe_file     = $_FILES['foto']['type'];
    $ukuran_file   = $_FILES['foto']['size'];
    $direktori     = "../../upload/foto/$foto_file";
    $sql           = null;
    $MAX_FILE_SIZE = 1000000;
    //100kb
    if ($ukuran_file > $MAX_FILE_SIZE) {
        header("Location:../index.php?mod=kamar&pg=kamar_form&status=1");
        exit();
    }
    $sql = null;
    if ($ukuran_file > 0) {
        move_uploaded_file($lokasi_file, $direktori);
    }
    
    if ($aksi == 'tambah') {
        $sql = "INSERT INTO kamar(jumlah_kamar,id_hotel,jenis_kamar,fasilitas,harga_kamar,foto)VALUES('$_POST[jumlah_kamar]','$_POST[id_hotel]','$_POST[jenis_kamar]','$_POST[fasilitas]','$_POST[harga_kamar]','$foto_file')";
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
        header('location:../index.php?mod=kamar&pg=kamar_view&status=0');
    } else {
        header('location:../index.php?mod=kamar&pg=kamar_view&status=1');
    }
}
?>