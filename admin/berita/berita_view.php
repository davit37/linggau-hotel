<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
		//===========CODE DELETE RECORD ================
			
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from berita where idberita='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
				//==========================================?>
<div class='bs-docs-example'>
	<h2 id="headings"> Data Berita</h2>
	<table  class="table table-striped table-condensed">
		<thead>
		<th><td><h4>nama hotel </h4></td><td><h4>Judul Berita </h4></td><td><h4>Aksi</h4></td></th>
		</thead>
		<tbody>
		<?php
				//bata paging 
$batas='10';
$tabel="berita";
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
$query="SELECT `hotel`.`nama_hotel`, `berita`.* from hotel JOIN berita ON `hotel`.`id_hotel`=`berita`.`id_hotel` order by tanggal desc limit $posisi,$batas ";
}else{
	$query="SELECT `hotel`.`nama_hotel`, `berita`.* from hotel JOIN berita ON `hotel`.`id_hotel`=`berita`.`id_hotel`  Where berita.id_hotel='$id_hotel' order by tanggal desc limit $posisi,$batas ";

}

$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo $posisi+$no
			?></td>
			<td><?php echo $rows->nama_hotel?></td>
			<td><?php		echo $rows -> judul;?></td>
			
			<td><a href="index.php?mod=berita&pg=berita_form&id=<?php echo	$rows -> idberita;?>" 
				class='btn btn-warning'><i class="icon-pencil"></i></a><a href="index.php?mod=berita&pg=berita_view&act=del&id=<?php echo	$rows -> idberita;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?php
	$no++;
	}?>

		<tr>
			<td colspan='3' ></td><td><a href="index.php?mod=berita&pg=berita_form"
			class='btn btn-success'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>

		<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("select idberita from berita");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php
pagination($halaman, $jumlah_halaman,"berita");
?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata;?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " ";
	} else {
		echo "operasi gagal";
	}
}

//close database	?>

</div>
