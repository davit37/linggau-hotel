<?php //===========CODE DELETE RECORD ================
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from kamar where id_kamar='$id' ";
	mysql_query($sql) or die(mysql_error());

}
?>



<div>
	<h2 id="headings"> Data Kamar</h2>
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table class="table table-striped table-condensed">
		<thead>
			<th>
				<td>
					<b>Nama Hotel</b>
				</td>
				<td>Jumlah Kamar
					<b></b>
				</td>
				<td>
					<b>Jenis Kamar</b>
				</td>
				<td>
					<b>Harga Kamar</b>
				</td>
				<td>
					<b>Fasilitas</b>
				</td>
				<td style='min-width: 100px'>
					<b>Aksi</b>
				</td>
			</th>
		</thead>
		<tbody>
			<?php
$batas = '10';
$tabel = "produk";
$halaman = $_GET['halaman'];
$posisi = null;

if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}
else {
	$posisi = ($halaman - 1) * $batas;
}
$query=null;
$id_hotel=$_SESSION[id_hotel];
if ($_SESSION['status'] == 0) {
	$query = "SELECT kamar.*, hotel.nama_hotel
			from kamar,hotel
			where kamar.id_hotel=hotel.id_hotel order by nama_hotel
			limit $posisi,$batas ";
}else{
	$query = "SELECT kamar.*, hotel.nama_hotel
			from kamar,hotel
			where kamar.id_hotel=hotel.id_hotel and kamar.id_hotel=$id_hotel order by nama_hotel
			limit $posisi,$batas ";
}


$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
				<tr>
					<td>
						<?php echo $posisi+$no
				?>
					</td>
					<td>
						<?php echo $rows ->nama_hotel; ?>
					</td>
					<td>
						<?php echo $rows ->jumlah_kamar; ?>
					</td>
					<td>
						<?php echo $rows ->jenis_kamar; ?>
					</td>
					<td>
						<?php echo $rows ->harga_kamar; ?>
					</td>
					<td>
						<?php echo $rows ->fasilitas; ?>
					</td>

					<td>

						<a href="index.php?mod=kamar&pg=kamar_form&id=<?php echo $rows ->id_kamar; ?>" class='btn btn-warning'>
							<i class="icon-pencil"></i>
						</a>
						<a href="index.php?mod=kamar&pg=kamar_view&act=del&id=<?php echo $rows->id_kamar; ?>" onclick="return confirm('Yakin data akan dihapus?') "
						    ; class='btn btn-danger'>
							<i class="icon-trash"></i>
						</a>
					</td>
				</tr>
				<?php $no++;
				}
			?>

				<tr>
					<td colspan='6'></td>
					<td>
						<a href="index.php?mod=kamar&pg=kamar_form" class='btn btn-primary'>
							<i class="icon-plus"></i>
						</a>
					</td>
				</tr>
		</tbody>
	</table>
	<?php //=============CUT HERE for paging====================================
	$tampil2 = mysql_query("SELECT id_kamar from kamar");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
	<div class='pagination'>
		<ul>
			<?php pagination($halaman, $jumlah_halaman, "produk"); ?>
		</ul>
	</div>
	<div class='well'>Jumlah data :
		<strong>
			<?php echo $jmldata; ?> </strong>
	</div>
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