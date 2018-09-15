<?php
include ('../inc/config.php');
include('../inc/function.php');
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$password = md5($_POST['password']);
$telp=$_POST['telp'];
$kodepos=$_POST['kodepos'];
$kelamin=$_POST['kelamin'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];
$kota=$_POST['kota'];

$sql = "update pelanggan set nama='$nama',kota='$kota',kelamin='$kelamin',
	email='$email',alamat='$alamat',telp='$telp', password='$password'
	where idpelanggan='$id'";
	
$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=user&pg=profil');
} else {
	header('location:../index.php?mod=user&pg=profil');
}

