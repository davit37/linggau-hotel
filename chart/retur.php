<?php
if(empty($_SESSION['idpelanggan'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
			$sql = "select * from retur where idretur='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "Kirim";
	}?>



	<!--kolom kiri-->

		<h2> Masukkan Data Retur</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="chart/retur_action.php">
	
		<?php	$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
	<div class="control-group">
			<label class="control-label" for="noinvoice">Nomor Invoice</label>
			<div class="controls">
				<select class="form-control" name='noinvoice'>
                      
							
                             <?php
							 $id=$_SESSION['idpelanggan'];
								 
								$sql = "select * from invoice where idpelanggan='$id' ";
									$hasil = mysql_query($sql);		
									while($hs = mysql_fetch_array($hasil))
									{
									?>
									<option value=<?php echo $hs[noinvoice];?> ><?php echo $hs[noinvoice];?></option>
									<?php } ?>
										
                          </select>
			</div>
		</div>
         <div class="control-group">
			<label class="control-label" for="nm_produk">Nama Produk</label>
			<div class="controls">
				<input type="text" name='nm_produk'  placeholder="Masukkan Nama Produk" value='<?php echo $data->nm_produk;?>'class='required'
				>
			</div>
		</div>
        
        <div class="control-group">
			<label class="control-label" for="sn_produk">S/N Produk</label>
			<div class="controls">
				<input type="text" name='sn_produk'  placeholder="Masukkan Nomor Seri Produk" value='<?php echo $data->sn_produk;?>'class='required'
				>
			</div>
		</div>
        
        <div class="control-group">
			<label class="control-label" for="jml">Jumlah</label>
			<div class="controls">
				<input type="number"  name='jml' class="input-mini" min="1"  value='<?php echo $data->jml;?>'class='required'>
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="foto">Foto</label>
			<div class="controls">
				<input type="file" name='foto' 
				>
			</div>
		</div>
		
	
		<div class="control-group">
			<label class="control-label" for="keterangan">Keterangan</label>
			<div class="controls">
				<textarea name='keterangan' class="input-xxlarge"><?php echo trim($data->keterangan)?></textarea>
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