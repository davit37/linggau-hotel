<?php 
include ('../inc/config.php');
include('../inc/function.php');

$aksi = $_POST['aksi'];
//data dari produk


if(isset($_POST)){
    $sql = null;
    if($aksi == 'kirim') {
        $sql = "INSERT INTO check_in(kd_invoicer,id_pelanggan,id_kamar,tanggal_check_in,tanggal_check_out,jumlah_kamar_checkin,jumlah_orang,bayar,deposit)
            VALUES('$_POST[kd_invoice]','$_POST[idpelanggan]','$_POST[id]','$_POST[tanggal_checkin]','$_POST[tanggal_checkout]','$_POST[jumlah_kamar]','$_POST[jumlah_orang]','$_POST[bayar]','$_POST[deposit]')";
    }

    $sql_select="select kamar.jumlah_kamar from kamar where id_kamar='$_POST[id]'";
		$result3 = mysql_query($sql_select) or die(mysgl_error());
		$rows3 = mysql_fetch_row($result3);
        $kurang=(int)$rows3[0]-(int)$_POST['jumlah_kamar'];
        
        $update="update kamar set jumlah_kamar='$kurang' where id_kamar='$_POST[id]'";
		 $result4 = mysql_query($update) or die(mysql_error());

    $result = mysql_query($sql) or die(mysql_error());


//check if query successful
if($result) {
echo '<script language="javascript"> alert("transaksi berhasil"); document.location="../index.php?mod=chart&pg=finish&total_bayar='.$_POST[deposit].'&kd_transaksi='.$_POST[kd_invoice].'";</script>';
} else {
	header('location:../index.php?mod=produk&pg=produk_view&status=1');
	
}

}