<?php
include ('../../inc/config.php');
if (isset($_GET['act'])) {
	$act=$_GET['act'];
	if($act=='del'){
		$id = $_GET['id'];
		
		
		
		$sql = "delete from check_in where id_checkin='$id' ";
		$result=mysql_query($sql) or die(mysql_error());
		if($result){
            $id = $_GET['id'];
			$id_kamar = $_GET['id_kamar'];
			$sql2 = "select kamar.jumlah_kamar from kamar where id_kamar= $id_kamar";
			$result2=mysql_query($sql2) or die(mysql_error());
			$rows2=mysql_fetch_object($result2);
			$jumlah_kamar=$rows2->jumlah_kamar+$_GET['jumlah_kamar'];
			echo $jumlah_kamar;
			
			
			$sql3 = "update kamar set jumlah_kamar=$jumlah_kamar where id_kamar=$id_kamar ";
			//echo $sql;
			$result=mysql_query($sql3) or die(mysql_error());
			if($result){
			
					$sql = "update check_in set status_kamar='1' where kd_invoicer='$id' ";
					//echo $sql;
					$result=mysql_query($sql) or die(mysql_error());
					if($result){
						header('location:../index.php?mod=invoice&pg=invoice_view');
					}
			}
					
		}

		
		
		
		
		
	}
	else if($act=='bayar'){
		$id = $_GET['id'];
		$sql = "update  check_in set status_bayar='1' where kd_invoicer='$id' ";
		$result=mysql_query($sql) or die(mysql_error());
		//kode untuk mengurangi barang 
		//1. dapatkan idbarang dan jumlah pada transaksi tersebut 
		
		if($result){
            header('location:../index.php?mod=invoice&pg=invoice_view&status=0');
			
		}
	
		
	}else if($act=='keluar'){
	$id = $_GET['id'];
	$id_kamar = $_GET['id_kamar'];
	$sql2 = "select kamar.jumlah_kamar from kamar where id_kamar= $id_kamar";
	$result2=mysql_query($sql2) or die(mysql_error());
	$rows2=mysql_fetch_object($result2);
	$jumlah_kamar=$rows2->jumlah_kamar+$_GET['jumlah_kamar'];
	echo $jumlah_kamar;
	
	
	$sql3 = "update kamar set jumlah_kamar=$jumlah_kamar where id_kamar=$id_kamar ";
	//echo $sql;
    $result=mysql_query($sql3) or die(mysql_error());
    if($result){
	
            $sql = "update check_in set status_kamar='1' where kd_invoicer='$id' ";
            //echo $sql;
            $result=mysql_query($sql) or die(mysql_error());
            if($result){
                header('location:../index.php?mod=invoice&pg=invoice_view');
            }
     }


	}
	

}