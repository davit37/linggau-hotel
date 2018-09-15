<?php 
include ('../inc/config.php');
include('../inc/function.php');
//data dari produk
if(isset($_POST)){
$noinvoice=$_POST['noinvoice'];
$kota_asal=$_POST['asal'];
$provinsi=$_POST['provinsi'];
$kota_tujuan=$_POST['kota_tujuan'];
$jasa_pengiriman=$_POST['kurir'];
$kodepos=$_POST['kodepos'];
$alamat=$_POST['alamat'];
$biaya_ongkir=$_POST['ongkir'];
$total_belanja=$_POST['tot'];
$total_transaksi=$_POST['totaltransaksi'];

$id = $_POST['id'];

$cek = "select * from alamat_kirim where noinvoice='$noinvoice'";
$result2 = mysql_query($cek);
$num =mysql_num_rows($result2);
if($num){
        

$sql = "UPDATE alamat_kirim set tanggal=curdate(), kota_asal='$kota_asal', provinsi='$provinsi', kota_tujuan='$kota_tujuan', 		jasa_pengiriman='$jasa_pengiriman', kodepos='$kodepos', alamat='$alamat', biaya_ongkir='$biaya_ongkir',total_belanja='$total_belanja', total_transaksi='$total_transaksi' where noinvoice='$noinvoice'";
  
  }
  else{

$sql = "INSERT INTO alamat_kirim (tanggal,noinvoice,kota_asal,provinsi,kota_tujuan,jasa_pengiriman,kodepos,alamat,biaya_ongkir,total_belanja,total_transaksi)
		VALUES(curdate(),'$noinvoice','$kota_asal','$provinsi','$kota_tujuan','$jasa_pengiriman','$kodepos','$alamat','$biaya_ongkir','$total_belanja','$total_transaksi')";
}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
echo '<script language="javascript"> alert("Alamat Detail Berhasil Dikirim"); document.location="../index.php?mod=chart&pg=finish&total_bayar='.$total_transaksi.'&kd_transaksi='.$noinvoice.'";</script>';
} else {
	header('location:../index.php?mod=produk&pg=produk_view&status=1');
	
}
}
?>
