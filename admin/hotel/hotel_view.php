

<?php 
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
//===========CODE DELETE RECORD ================

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from hotel where id_hotel='$id' ";
	mysql_query($sql) or die(mysql_error());

}
//==========================================
?>

	<h2 id="headings"> Data Hotel</h2>

	<table  class="table table-striped table-bordered table-condensed">
		<thead>
		<th><td><h4>Nama Hotel </h4></td><td><h4>Aksi</h4></td></th>
		</thead>
		<tbody>
		<?php
						//bata paging 
	$batas=5;
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}
$query="SELECT * from hotel limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo $posisi+$no
			?></td>
			<td><?php echo $rows -> nama_hotel; ?></td>
			
			
			
			<td><a href="index.php?mod=hotel&pg=hotel_form&id=<?php echo $rows -> id_hotel; ?>"
				 class='btn btn-warning'><i class="icon-pencil"></i></a><a href="index.php?mod=hotel&pg=hotel_view&act=del&id=<?php echo $rows -> id_hotel; ?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?php $no++;
		}
	?>

		<tr>
			<td colspan='2' ></td><td><a href="index.php?mod=hotel&pg=hotel_form"
			class='btn btn-primary'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>

	
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("select idkategori from kategori");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php
pagination($halaman, $jumlah_halaman,"kategori");
?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata;?> </strong></div>
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


