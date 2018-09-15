<section class="main-content">
	<div class="row tengah_woooy">
		
		<div class="span7">
			<h4 class="title">
				<span class="text">
					<strong>Register</strong> Form</span>
			</h4>
			<?php
						//jika login gagal 
						if(isset($_GET['status'])){
							if($_GET['status']==0){
								echo "<p class='text-success'>Proses Registrasi  Berhasil, Silahkan Login!</p>";
							}else {
							echo "<p class='text-error'>Proses Registrasi  Gagal!</p>";
							}						}	?>
				<form action="user/register_action.php" id='form2' method="post" class="form-horizontal">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="nama">Nama Pelanggan</label>
							<div class="controls">
								<input type="text" name='nama' placeholder='Masukkan Nama' class='required'>
							</div>



						</div>
						<div class="control-group">
							<label class="control-label">Jenis Kelamin</label>
							<div class="controls">
								<select name='kelamin'>
									<option value='L'>Laki laki</option>
									<option value='P'>Perempuan</option>
								</select>

							</div>
						</div>
						<div class="control-group">
							<label class="control-label">E_Mail</label>
							<div class="controls">
								<input type="text" name='email' id='email' placeholder='Masukkan E_Mail' class='required email'>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Password</label>
							<div class="controls">
								<input type="password" name='password' id='password' placeholder='Masukkan Password' class='required'>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Telepon</label>
							<div class="controls">
								<input type="text" name='telp' id='telp' placeholder='Masukkan Telp' class='required'>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Kota</label>
							<div class="controls">
								<input type="text" name='kota' id='kota' placeholder='Masukkan Kota' class='required'>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="alamat">Alamat</label>
							<div class="controls">
								<textarea name='alamat' class="input-xlarge" placeholder='Masukkan Alamat'></textarea>
							</div>
						</div>





						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn btn-success" name='aksi' value='register'>
									Register
								</button>
							</div>
						</div>
					</fieldset>
				</form>
		</div>
	</div>
</section>