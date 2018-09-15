<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	$id_hotel=$_SESSION[id_hotel];
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		

	} else {
		$aksi = "tambah";
	}?>



	<!--kolom kiri-->

		<h2> Form fasilitas</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="fasilitas/fasilitas_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">

		<?php if($_SESSION['status']==0){
			echo"
        <div class='control-group'>
			<label class='control-label' for='idkategori'>Hotel</label>
			<div class='controls'>
				<select id='idkategori' name='id_hotel' class='required ' >";
					
    					combo_hotel($data->id_hotel);
   				echo"	
				</select>
			</div>
		</div>";}
		else{
			echo"<input type='hidden' name='id_hotel' value= $id_hotel>
			";
		}
		?>
				
		<div class="control-group">
			<label class="control-label" for="deskripsi">Nama Fasilitas</label>
			<div class="controls">
			<input type="checkbox" class="css-checkbox" id="checkbox1"  name="wifi" value='1'/>
						<label for="checkbox1" name="checkbox1_lbl" class="css-label lite-green-check">Wifi</label>
			</div>
		
			<div class="controls">
			<input type="checkbox" class="css-checkbox" id="checkbox2" name='lift' value='2'/>
						<label for="checkbox2" name="checkbox1_lbl" class="css-label lite-green-check">Lift</label>
			</div>
			<div class="controls">
			<input type="checkbox" class="css-checkbox" id="checkbox3" name='parkir' value='3'/>
						<label for="checkbox3" name="checkbox1_lbl" class="css-label lite-green-check">Parkir</label>
			</div>
			<div class="controls">
			<input type="checkbox" class="css-checkbox" id="checkbox4" name="restoran" value="4" />
						<label for="checkbox4" name="checkbox1_lbl" class="css-label lite-green-check">Restoran</label>
			</div>
			<div class="controls">
			<input type="checkbox" class="css-checkbox" id="checkbox5" name="laundri" value="5" />
						<label for="checkbox5" name="checkbox1_lbl" class="css-label lite-green-check">Laundri</label>
			</div>
			<div class="controls">
			<input type="checkbox" class="css-checkbox" id="checkbox6" name="metting" value="6" />
						<label for="checkbox6" name="checkbox1_lbl" class="css-label lite-green-check">Mitting Room</label>
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