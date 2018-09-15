<?php 
include ('../inc/config.php');
include('../inc/function.php');
//data dari produk
if(isset($_POST['id'])){
    $query=mysql_query("UPDATE check_in set status_pesanan='1' where id_checkin='$_POST[id]'");
    if($query==true){


           
            $id_kamar = $_POST['id_kamar'];
            $sql2 = "select kamar.jumlah_kamar from kamar where id_kamar= $id_kamar";
            $result2=mysql_query($sql2) or die(mysql_error());
            $rows2=mysql_fetch_object($result2);
            $jumlah_kamar=$rows2->jumlah_kamar+$_POST['jumlah_kamar'];
            echo $jumlah_kamar;
            
            
            $sql3 = "update kamar set jumlah_kamar=$jumlah_kamar where id_kamar=$id_kamar ";
            //echo $sql;
            $result=mysql_query($sql3) or die(mysql_error());
            if($result){
            
                    $sql = "update check_in set status_kamar='1' where kd_invoicer='$_POST[id]' ";
                    //echo $sql;
                    $result=mysql_query($sql) or die(mysql_error());
                    if($result){
                        echo '<script language="javascript"> alert("Pembatalan pesanan Berhasil"); document.location="../index.php?mod=chart&pg=invoice";</script>';
                    }
            }
        
    }
}
?>
