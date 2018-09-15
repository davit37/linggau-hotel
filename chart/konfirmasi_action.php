<?php 
include ('../inc/config.php');
include('../inc/function.php');
//data dari produk
if(isset($_POST)){
$noinvoice=$_POST['noinvoice'];
$keterangan=$_POST['keterangan'];
$aksi = $_POST['aksi'];
$id_checkin = $_POST['id_checkin'];

$lokasi_file = $_FILES['foto']['tmp_name'];
$foto_file = $_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$direktori = "../upload/buktibayar/$foto_file";
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

if($aksi == 'kirim') {
	$sql = "INSERT INTO bukti_pembayaran(id_checkin,foto,keterangan,tanggal)
		VALUES('$id_checkin','$foto_file','$keterangan',curdate())";
}else if($aksi== 'ttt') {
	if($ukuran_file > 0){
	$sql = "update produk set nama_produk='$nama_produk',foto='$foto_file',
	idkategori='$idkategori',deskripsi='$deskripsi'
	where idproduk='$id'";

	}else{
		$sql = "update produk set nama_produk='$nama_produk',
	deskripsi='$deskripsi',idkategori='$idkategori'
	where idproduk='$id'";
	
	}
}

$result = mysql_query($sql) or die(mysql_error());
echo $result;

//check if query successful
if($result) {
echo '<script language="javascript"> alert("Bukti Pembayaran Berhasil Dikirim"); document.location="../index.php?mod=chart&pg=invoice";</script>';
} else {
	header('location:../index.php?mod=produk&pg=produk_view&status=1');
	
}
}
?>
