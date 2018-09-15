<?php
include ('../../inc/config.php');

if(isset($_POST)){
$id=$_POST['id'];
$aksi=$_POST['aksi'];
$sql = null;

$lokasi_file1   = $_FILES['foto1']['tmp_name'];
$foto_file1     = $_FILES['foto1']['name'];
$tipe_file1     = $_FILES['foto1']['type'];
$ukuran_file1   = $_FILES['foto1']['size'];
$direktori1     = "../../upload/hotel/$foto_file1";

$lokasi_file2   = $_FILES['foto2']['tmp_name'];
$foto_file2     = $_FILES['foto2']['name'];
$tipe_file2     = $_FILES['foto2']['type'];
$ukuran_file2   = $_FILES['foto2']['size'];
$direktori2     = "../../upload/hotel/$foto_file2";

$lokasi_file3   = $_FILES['foto3']['tmp_name'];
$foto_file3     = $_FILES['foto3']['name'];
$tipe_file3     = $_FILES['foto3']['type'];
$ukuran_file3   = $_FILES['foto3']['size'];
$direktori3     = "../../upload/hotel/$foto_file3";

$lokasi_file4   = $_FILES['foto4']['tmp_name'];
$foto_file4     = $_FILES['foto4']['name'];
$tipe_file4     = $_FILES['foto4']['type'];
$ukuran_file4   = $_FILES['foto4']['size'];
$direktori4     = "../../upload/hotel/$foto_file4";
$sql           = null;
$MAX_FILE_SIZE = 1000000;
//100kb
if ($ukuran_file > $MAX_FILE_SIZE) {
	header("Location:../index.php?mod=hotel&pg=hotel_form&status=1");
	exit();
}


	move_uploaded_file($lokasi_file1, $direktori1);
	move_uploaded_file($lokasi_file2, $direktori2);
	move_uploaded_file($lokasi_file3, $direktori3);
	move_uploaded_file($lokasi_file4, $direktori4);


if($aksi == 'tambah') {
	
		$sql = "INSERT INTO `hotel`(`nama_hotel`,`alamat`,`nama_pimpinan`,`no_telpon`,`foto1`,`foto2`,`foto3`,`foto4`)VALUES('$_POST[nama_hotel]','$_POST[alamat]','$_POST[nama_pimpinan]','$_POST[no_telpon]','$foto_file1','$foto_file2','$foto_file3','$foto_file4')";
	
}else if($aksi=='edit'){
	if ($ukuran_file1 > 0 && $ukuran_file2 > 0 && $ukuran_file2 > 0 && $ukuran_file3 > 0 && $ukuran_file4 > 0) {
	$sql="UPDATE hotel set nama_hotel='$_POST[nama_hotel]', alamat='$_POST[alamat]', nama_pimpinan='$_POST[nama_pimpinan]',
	no_telpon='$_POST[no_telpon]'  ,`foto1`='$foto_file1',`foto2`='$foto_file2',`foto3`='$foto_file3',`foto4`='$foto_file4' where id_hotel='$id'";
	}else{
		$sql="UPDATE hotel set nama_hotel='$_POST[nama_hotel]', alamat='$_POST[alamat]', nama_pimpinan='$_POST[nama_pimpinan]',
	no_telpon='$_POST[no_telpon]'  where id_hotel='$id'";
	}
}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=hotel&pg=hotel_view&status=0');
} else {
	header('location:../index.php?mod=hotel&pg=hotel_form&status=1');
}
}
?>
