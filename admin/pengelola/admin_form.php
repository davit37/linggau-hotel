<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
		$sql = "select * from pengelola where idpengelola='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$baris = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>

<form  class="form-horizontal" method="POST" id="form1" action="pengelola/admin_action.php">
 <legend> Form Pengelola</legend>
	<input type='hidden' name='id' value="<?php echo $id?>">
 
   <div class="control-group">
   <label class="control-label" for="nama">Nama</label>
    <div class="controls">
         <input type="text" name='nama' class="required" 
      value=<?php echo $baris->nama;?> > 
    </div>
  </div>
  <div class="control-group">
   <label class="control-label" for="username">Username</label>
    <div class="controls">
         <input type="text" name='username' class="required" 
      value=<?php echo $baris->username;?> > 
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
         <input type="password" name='password' class="required" minlength="5"
      >    
    </div>
  </div>
 <input type="hidden" name="status" value="0">
  <div class="control-group">
    <div class="controls">
     
      <button type="submit" class="btn btn-success" name='aksi'value=<?php echo $aksi?> ><?php echo $aksi?></button>
    </div>
  </div>
</form>

