<?php 
include ('../inc/config.php');
include('../inc/function.php');
//data dari produk
if(isset($_POST)){
$noinvoice=$_POST['noinvoice'];
$nm_produk=$_POST['nm_produk'];
$sn_produk=$_POST['sn_produk'];
$jml=$_POST['jml'];
$keterangan=$_POST['keterangan'];

$aksi = $_POST['aksi'];
$id = $_POST['id'];

$lokasi_file = $_FILES['foto']['tmp_name'];
$foto_file = $_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$direktori = "../upload/retur/$foto_file";
$sql = null;
$MAX_FILE_SIZE = 1000000;
//100kb
if($ukuran_file > $MAX_FILE_SIZE) {
	header("Location:../index.php?mod=produk&pg=produk_form&status=1");
	exit();
}
$sql = null;
if($ukuran_file > 0) {
	move_uploaded_file($lokasi_file, $direktori);
}


	$sql = "INSERT INTO retur(tanggal,noinvoice,nm_produk,sn_produk,jml,keterangan,foto)
		VALUES(curdate(),'$noinvoice','$nm_produk','$sn_produk','$jml','$keterangan','$foto_file')";



$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
echo '<script language="javascript"> alert("Retur Berhasil Dikirim"); document.location="../cetak.php";</script>';
	
} else {
	header('location:../index.php?mod=produk&pg=produk_view&status=1');
}
}
?>
