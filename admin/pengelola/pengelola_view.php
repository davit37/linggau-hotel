<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
		//===========CODE DELETE RECORD ================
	
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from pengelola where idpengelola='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
?>

	<h2 id="headings"> Data Pengelola Hotel</h2>
	<table  class="table table-condensed table-striped table-hover">
		<thead>
		<th class='info'><td><b>Nama Hotel</b></td><td><b>Nama </b></td><td><b>Username</b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
		<?php
$query="select hotel.nama_hotel,pengelola.* from hotel JOIN pengelola ON hotel.id_hotel=pengelola.id_hotel ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo $no	?></td>
			<td><?php echo $rows->nama_hotel ;?></td>
			<td><b><?php echo $rows ->nama;?><b></td>
			<td><?php echo $rows ->username;?></td>
			<td><a href="index.php?mod=pengelola&pg=pengelola_form&id=
				<?php echo	$rows -> idpengelola;?>" class='btn btn-warning'><i class="icon-pencil"></i></a><a href="index.php?mod=pengelola&pg=pengelola_view&act=del&id=<?php echo	$rows -> idpengelola;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?php
	$no++;
	}?>

		<tr>
			<td colspan="4" ></td><td><a href="index.php?mod=pengelola&pg=pengelola_form"
			class='btn btn-primary'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
	<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}


//close database	?>


