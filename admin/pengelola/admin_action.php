<?php

include ('../../inc/config.php');
//data dari pengelola

if (isset($_POST)) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5(trim($_POST['password']));
	$aksi = $_POST['aksi'];
	$id = $_POST['id'];

	//echo $password;
	//exit;
	$sql = null;
	if ($aksi == 'tambah') {
		$sql = "INSERT INTO pengelola(nama,username,password,status)
		VALUES('$nama','$username', '$password','$_POST[status]')";
	} else if ($aksi == 'edit') {
		$sql = "update pengelola set username='$username', nama='$nama',
			password='$password' where idpengelola='$id'";

	}

	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
	
		header('location:../index.php?mod=pengelola&pg=admin_view&level=0');
	} else {
		header('location:../index.php?mod=pengelola&pg=admin_view&level=1');
	}
}
?>
