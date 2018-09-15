

<?php 
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
//===========CODE DELETE RECORD ================

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from fasilitas_hotel where id_fasilitas='$id' ";
	mysql_query($sql) or die(mysql_error());

}
//==========================================
?>

	<h2 id="headings"> Data fasilitas</h2>

	<table  class="table table-striped table-bordered table-condensed">
		<thead>
		<th><td><h4>Nama Hotel </h4></td><td>nama fasilitas<td><h4>Aksi</h4></td></th>
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
$id_hotel=$_SESSION[id_hotel];
if ($_SESSION['status'] == 0) {
	$query="SELECT `hotel`.`nama_hotel`,`fasilitas_hotel`.*, fasilitas.* FROM hotel JOIN fasilitas_hotel ON hotel.id_hotel=fasilitas_hotel.id_hotel JOIN fasilitas ON fasilitas.id_fasilitas=fasilitas_hotel.id_fasilitas limit $posisi,$batas ";
}else{
	$query="SELECT `hotel`.`nama_hotel`,`fasilitas_hotel`.*, fasilitas.* FROM hotel JOIN fasilitas_hotel ON hotel.id_hotel=fasilitas_hotel.id_hotel  JOIN fasilitas ON fasilitas.id_fasilitas=fasilitas_hotel.id_fasilitas where hotel.id_hotel=$id_hotel limit $posisi,$batas ";
}
	
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo $posisi+$no
			?></td>
			<td><?php echo $rows->nama_hotel; ?></td>
			<td><?php echo $rows->nama_fasilitas; ?></td>
			
			
			
			<td><a href="index.php?mod=fasilitas&pg=fasilitas_form&id=<?php echo $rows -> id_fasilitas; ?>"
				 class='btn btn-warning'><i class="icon-pencil"></i></a><a href="index.php?mod=fasilitas&pg=fasilitas_view&act=del&id=<?php echo $rows -> id_fasilitas; ?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?php $no++;
		}
	?>

		<tr>
			<td colspan='3' ></td><td><a href="index.php?mod=fasilitas&pg=fasilitas_form"
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


