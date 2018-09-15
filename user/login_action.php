 
<?php
session_start();
if(isset($_POST)){
include ('../inc/config.php');
include('../inc/function.php');
$email = $_POST['email'];
$password = md5(trim($_POST['password']));

$sql = "select  * from pelanggan
  where email='$email'
  and password='$password' ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if (mysql_num_rows($sql_login) == 1) {
	$_SESSION['email'] = $email;
		$_SESSION['nama'] = $hasil->nama;
	$_SESSION['idpelanggan'] = $hasil->idpelanggan;
//memanggil status login 
update_status_login("1",$_SESSION['idpelanggan']);
echo '<script language="javascript"> alert("Selamat, Login Sukses..."); document.location="../index.php?";</script>';	

} else {

echo '<script language="javascript"> alert("Maaf, Usename atau Password Anda Salah.!!!"); document.location="../index.php?mod=user&pg=login&loginerror=1";</script>';

}
}
?>

