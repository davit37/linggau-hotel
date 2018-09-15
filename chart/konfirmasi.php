<a href='index.php?mod=chart&pg=invoice' class='btn btn-warning'>
		<i class='icon-arrow-left icon-white'></i>Back</a>
<?php
if(empty($_SESSION['idpelanggan'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	$aksi = null;
	
		$aksi = "kirim";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
			$sql = "select * from check_in where id_checkin='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	?>



	<!--kolom kiri-->

		<h4> Konfirmasi Bukti Bayar</h4>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="chart/konfirmasi_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
	<div class="control-group">
			<label class="control-label" for="kdinvoice">Nomor invoice</label>
			<div class="controls">
				<input type="text" name='noinvoice' readonly value='<?php echo $data->kd_invoicer;?>'class='required'
				>
				<input type="hidden" name='id_checkin' readonly value='<?php echo $_GET['id'];?>'class='required'
				>
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="foto">Foto Bukti Bayar</label>
			<div class="controls">
				<input type="file" name='foto' 
				>
			</div>
		</div>
		
	
		<div class="control-group">
			<label class="control-label" for="keterangan">Keterangan</label>
			<div class="controls">
				<textarea name='keterangan' class="input-xxlarge"></textarea>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?php echo $aksi?>'>
				<?php echo $aksi?>
				</button>
			</div>
		</div>

</form>
</div>