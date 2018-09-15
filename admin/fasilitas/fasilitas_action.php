<?php
 
include ('../../inc/config.php');
include ('../../inc/function.php');
//data dari stok
if(isset($_POST)){

$aksi = $_POST['aksi'];
$id = $_POST['id'];

$sql = null;

if ($aksi == 'tambah') {
	if(isset($_POST['wifi'])){
		$sql = "INSERT INTO fasilitas_hotel(id_fasilitas, id_hotel)
		VALUES('$_POST[wifi]','$_POST[id_hotel]')";
		$result = mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['lift'])){
		$sql = "INSERT INTO fasilitas_hotel(id_fasilitas, id_hotel)
		VALUES('$_POST[lift]','$_POST[id_hotel]')";
		$result = mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['parkir'])){
		$sql = "INSERT INTO fasilitas_hotel(id_fasilitas, id_hotel)
		VALUES('$_POST[parkir]','$_POST[id_hotel]')";
		$result = mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['restoran'])){
		$sql = "INSERT INTO fasilitas_hotel(id_fasilitas, id_hotel)
		VALUES('$_POST[restoran]','$_POST[id_hotel]')";
		$result = mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['laundri'])){
		$sql = "INSERT INTO fasilitas_hotel(id_fasilitas, id_hotel)
		VALUES('$_POST[laundri]','$_POST[id_hotel]')";
		$result = mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['metting'])){
		$sql = "INSERT INTO fasilitas_hotel(id_fasilitas, id_hotel)
		VALUES('$_POST[metting]','$_POST[id_hotel]')";
		$result = mysql_query($sql) or die(mysql_error());
	}
	
} else if ($aksi == 'edit') {

	$sql = "update stok set idproduk='$idproduk',
	harga_beli='$harga_beli',jumlah='$jumlah',harga_jual='$harga_jual',harga_mitra='$harga_mitra'
	where idstok='$id'";

}



//check if query successful
if ($result) {
	header('location:../index.php?mod=fasilitas&pg=fasilitas_view&status=0');
} else {
	header('location:../index.php?mod=fasilitas&pg=fasilitas_view&status=1');
}
}
?>
