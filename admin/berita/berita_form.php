<?php
cek_status_login($_SESSION['username']); 

$id_hotel=$_SESSION[id_hotel];
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
		$sql = "select * from berita where idberita='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>
	<script type="text/javascript" src="../assets/bootstrap/js/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src='../assets/bootstrap/js/editor.js'></script> 

<form  class="form-horizontal" method="POST" id="form1" action="berita/berita_action.php" enctype="multipart/form-data">
 <legend>Form Berita</legend>
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
    <label class="control-label" for="judul">Judul</label>
    <div class="controls">
      <input type="text" name='judul' id="judul" class='input-xxlarge' value='<?php echo $data->judul?>'>
    </div>
   </div>
    
  <div class="control-group">
    <label class="control-label" for="gambar">Gambar</label>
    <div class="controls">
      <input type="file" name='gambar' id="gambar" value='<?php echo $data->gambar?>'>
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="isi">Isi</label>
    <div class="controls">
      <textarea name='isi'  rows="20" class='input-xxlarge'value='<?php echo $data->isi?>'></textarea>
     
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
     
      <button type="submit" class="btn btn-success" name='aksi'value=<?php echo $aksi?> ><?php echo $aksi?></button>
    </div>
  </div>
</form>

<div id="form1_errorloc"  class="text-error"></div>
