<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	

				$aksi = 'tambah';
				if(isset($_GET['id'])) {
					$aksi = "edit";
					$id = $_GET['id'];
					//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
					$sql = "SELECT * FROM hotel WHERE id_hotel='$id' ";
					$result = mysql_query($sql) or die(mysql_error());
					$baris = mysql_fetch_object($result);

				} else {
					$aksi = "tambah";
				}?>

<form  id="form1" class="form-horizontal" method="POST" 
enctype="multipart/form-data" action="hotel/hotel_action.php">
	<legend>
		kategori
	</legend>
	<input type='hidden' name='id' value="<?php echo $id?>">
	<div class="control-group">
		<label class="control-label" for="nama">Nama hotel</label>
		<div class="controls">
			<input type="text" name='nama_hotel'
			palceholder='Masukan nama hotel' value='<?php echo $baris->nama_hotel;?>'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="nama">Alamat</label>
		<div class="controls">
			<input type="text" name='alamat'
			palceholder='Masukan alamat'value='<?php echo $baris->alamat;?>'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="nama">Nama pimpinan</label>
		<div class="controls">
			<input type="text" name='nama_pimpinan'
			palceholder='Masukan nama pimpinan' required value='<?php echo $baris->nama_pimpinan;?>'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="nama">No Telpon</label>
		<div class="controls">
			<input type="text" name='no_telpon'
			palceholder='Masukan nomor telpon' value='<?php echo $baris->no_telpon;?>'
			>
		</div>
	</div>
	<div class="control-group">
			<label class="control-label" for="foto">Gambar 1</label>
			<div class="controls">
				<input type="file"  name='foto1'>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="foto">Gambar 2</label>
			<div class="controls">
				<input type="file" name='foto2'>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="foto">Gambar 3</label>
			<div class="controls">
				<input type="file"  name='foto3'>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="foto">Gambar 4</label>
			<div class="controls">
				<input type="file" name='foto4'>
			</div>
		</div>
	

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success" name='aksi'value=<?php echo $aksi?>>
			<?php echo $aksi
			?>
			</button>
			</div>
			</div>
			</form>
			