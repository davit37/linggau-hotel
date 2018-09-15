<?php //===========CODE DELETE RECORD ================
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from retur where idretur='$id' ";
	mysql_query($sql) or die(mysql_error());

}
					?>

<div>
	<h2 id="headings"> Data Retur</h2>
    
    <form action="" method="post" name="form1" class="form-horizontal">
				  <input type="date" name="tgl_awal" class="form-control" placeholder="Tgl. Awal">               
               	  <input type="date" name="tgl_akhir" class="form-control" placeholder="Tgl. Akhir">                
				  <input type="submit" class="btn btn-success btn-sm" name="cari" value="Cari" />
                  <a href="cetak_retur.php?tgl_awal=<?php echo $_POST['tgl_awal']; ?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>" target="_blank" class="btn btn-success btn-sm"> Cetak</a> 
                  </form>
    
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th> <td><b>ID Retur </b></td><td><b>Tanggal </b></td><td><b>Nomor Invoice</b></td><td><b>Keterangan</b></td><td style='min-width: 100px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$tabel="retur";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$a = $_POST['tgl_awal'];
	 $b = $_POST['tgl_akhir'];
	 
	 echo $a." ".$b;
	 
	if($a == "" && $b == "")
{
$query="SELECT *from retur
 limit $posisi,$batas ";
 }
 else
	{
		$query = "select retur.idretur,retur.tanggal,invoice.noinvoice,pelanggan.*,retur.keterangan
 from retur,invoice,pelanggan
 where retur.noinvoice=invoice.noinvoice and invoice.idpelanggan=pelanggan.idpelanggan  and  retur.tanggal >= '$a' and retur.tanggal <='$b'  ";
	}
 
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
                <td><a href='index.php?mod=retur&pg=retur_detail&id=<?php echo $rows -> idretur; ?>'><?php echo $rows -> idretur; ?></a></td>
				<td><?php echo $rows -> tanggal; ?></td>
				<td><?php echo $rows ->noinvoice; ?></td>
			
		
			<td><?php echo $rows -> keterangan; ?></td>
			
				<td>	
					
				<a href="index.php?mod=retur&pg=retur_view&act=del&id=<?php echo $rows -> idretur; ?>"
				onclick="return confirm('Yakin data retur akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php $no++;
				}
			?>

			
		</tbody>
	</table>
	<?php //=============CUT HERE for paging====================================
	$tampil2 = mysql_query("SELECT idretur from retur");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "retur"); ?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata; ?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database
?>

</div>
