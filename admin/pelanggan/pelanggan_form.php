<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

$aksi = null;
if (isset($_GET['id'])) {
	$aksi = "edit";
	$id = $_GET['id'];
	//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
	$sql = "select * from pelanggan where idpelanggan='$id' ";
	$result = mysql_query($sql) or die(mysql_error());
	$data = mysql_fetch_object($result);

} else {
	$aksi = "tambah";
}
?>

<!--kolom kiri-->

<h2> Form pelanggan</h2>

<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="pelanggan/pelanggan_action.php">

	<?php $id = $_GET['id']; ?>
	<input type='hidden' name='id' value="<?php echo $id?>">
	<div class="control-group">
		<label class="control-label" for="nama">Nama Pelanggan</label>
		<div class="controls">
			<input type="text" name='nama' value='<?php echo $data->nama?>'class='required'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Jenis Kelamin</label>
		<div class="controls">
			<select name='kelamin' >
				<option value='L'>Laki laki</option>
				<option value='P'>Perempuan</option>
			</select>
			
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="alamat">Alamat</label>
		<div class="controls"><textarea name='alamat' class="input-xxlarge"><?php echo trim($data->alamat)?></textarea>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" >Kota</label>
		<div class="controls">
			<input type="text" name='kota' id='kota' value='<?php echo $data->kota?>' class='required'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Kode Post</label>
		<div class="controls">
			<input type="text" name='kodepos' id='kodepos' value='<?php echo $data->kodepos?>' class='required'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Telepon</label>
		<div class="controls">
			<input type="text" name='telp' id='telp' value='<?php echo $data->telp?>' class='required'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >E-Mail</label>
		<div class="controls">
			<input type="text" name='email' id='email' value='<?php echo $data->email?>' class='input-xlarge required email'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Password</label>
		<div class="controls">
			<input type="text" name='password' id='password' value='<?php echo $data->password?>' class='required'
			>
		</div>
	</div>

<div class="form-group">
          <label for="" class="col-sm-2 control-label">Lavel</label>
          <div class="controls">
            <select name="level" class="form-control select2" style="width:20%;">
                  <option ></option>
                  <option value="mitra_kerja">Mitra Kerja</option>
                  <option value="pelanggan">Pelanggan</option>
                  </select>
		  </div>
        </div>
<br />
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success" name='aksi'value='<?php echo $aksi?>'>
				<?php echo $aksi ?>
			</button>
		</div>
	</div>

</form>
</div>