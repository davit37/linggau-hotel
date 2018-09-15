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
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
			$sql = "select * from kamar JOIN hotel ON kamar.id_hotel= hotel.id_hotel where id_kamar='$id'  ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>



	<!--kolom kiri-->

		<h2> Form peta</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="map/map_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
		<?php if($_SESSION['status']==0){
			echo"
        <div class='control-group'>
			<label class='control-label' for='idkategori'>Hotel</label>
			<div class='controls'>
				<select  name='id_hotel' class='required ' >";
					
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
			<label class="control-label" for="">Kordinat Hotel</label>
			<div class="controls">
				<input type="text" name="kordinat"  value='' required placeholder="masukan kordinat">
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