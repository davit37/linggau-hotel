<a href='index.php?mod=chart&pg=invoice' class='btn btn-warning'>
		<i class='icon-arrow-left icon-white'></i>Back</a>
<?php
if(empty($_SESSION['idpelanggan'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	$aksi = null;
	
		
		

	?>



	<!--kolom kiri-->

		<h4>Konfirmasi Alamat</h4>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="chart/ongkir_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
        
        <div class="control-group">
			<label class="control-label" for="alamat">No Invoice</label>
			<div class="controls">
				<input type='text' readonly name='noinvoice' id="noinvoice" value='<?php echo $_GET['kd_transaksi']?>' >
			</div>
		</div>
       <div class="control-group">
			<label class="control-label" for="kota">Kota Asal</label>
			<div class="controls">
				<input type='hidden' id='asal'  readonly value='242' >
				<input type='text'  name='asal'readonly value='Lubuk linggau' >
                <br /><br />
        </div>  
	<div class="control-group">
			<label class="control-label" for="kdinvoice">Provinsi</label>
			<div class="controls">
				<?php
						//Get Data Provinsi
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key:f993f0d31f1bebd7c494adc3cb7a3ca6"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	echo "<select name='provinsi' id='provinsi'>";
	echo "<option>Pilih Provinsi Tujuan</option>";
	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
	}
	echo "</select><br>";
	//Get Data Provinsi
	
	?>
			</div>
		</div>
	
	 		
		
        <div class="control-group">
			<label class="control-label" for="kota">Kota Tujuan</label>
			<div class="controls">
				<select id="kabupaten" name="kota_tujuan"></select>
        </div>
		</div>
        <div class="control-group">
			<label class="control-label" for="kota">Jasa pengiriman </label>
			<div class="controls">
				<select id="kurir" name="kurir">
			<option value="jne">JNE</option>
			<option value="tiki">TIKI</option>
			<option value="pos">POS INDONESIA</option>
		</select>
        </div>
		</div>
        <div class="control-group">
			<label class="control-label" for="kodepos">Kode Pos</label>
			<div class="controls">
					<input type='text' name='kodepos' id="biaya"  value='' class='required' >
			</div>
		</div>
        <div class="control-group">
			<label class="control-label" for="alamat">Alamat</label>
			<div class="controls">
				<textarea name='alamat' class="input-xlarge"></textarea>
			</div>
		</div>
        <?php
		$aksi = "kirim";
		$id = $_GET['kd_transaksi'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
			$sql = "select transaksi.*,invoice.*, produk.berat_produk from transaksi,invoice, produk where transaksi.noinvoice=invoice.noinvoice and transaksi.idproduk=produk.idproduk and transaksi.noinvoice='$id' ";
$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);
		$sum = "SELECT Sum( berat_produk ) AS berat
FROM transaksi, invoice, produk
WHERE transaksi.noinvoice = invoice.noinvoice
AND transaksi.idproduk = produk.idproduk
AND transaksi.noinvoice ='$id'";
		
		$resultsum = mysql_query($sum) or die(mysql_error());
		$datasum = mysql_fetch_object($resultsum);
		
		?>
        <div class="control-group">
			<label class="control-label" for="kecamatan">Berat</label>
			<div class="controls">
					<input id="berat" type="text" name="berat" readonly value='<?php echo $datasum->berat?>' class='required' />
			</div>
		</div>
        
		<div class="control-group">
			<label class="control-label" for="alamat">Biaya ongkir</label>
			<div class="controls">
            	<input type='hidden' name='ongkir' id="ongkir1" readonly value='' >
				<input type='text'  id="ongkir" readonly value='' >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="alamat">Total Belanja</label>
			<div class="controls">
            <input type='hidden'   name="tot"id='total' readonly value='<?php echo $data->totalbayar?>'class='required' >
				<input type='text'   readonly value='<?php echo "Rp.".number_format($data->totalbayar)?>'class='required' >
			</div>
		</div>
        <div class="control-group">
			<label class="control-label" for="alamat">Total Transaksi</label>
			<div class="controls">
            	<input type='hidden' name='totaltransaksi' id="totaltransaksi1" readonly value='' >
				<input type='text' id="totaltransaksi" readonly value='' >
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
 <script type="text/javascript">

	$(document).ready(function(){
	/*
		$('#provinsi').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
			var prov = $('#provinsi').val();
			console.log(prov);
			console.log($('#kabupaten').html());

      		$.ajax({
            	type : 'GET',
           		url : 'http://localhost/rajaongkir/cek_kabupaten.php',
            	data :  'prov_id=' + prov,
					success: function (data) {
					console.log(data);

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		}); */
		
		var namaProvinsi = document.getElementById('provinsi');
		var kec = document.getElementById('kabupaten');
		var asal=document.getElementById('kota_asal');
		var asal1=document.getElementById('asal');
		var prov ;
	
		
		function getKec()
			{
				prov = namaProvinsi.value;
				
				console.log(namaProvinsi.value);
				var request =new XMLHttpRequest();
				request.open('GET','inc/cek_kabupaten.php?prov_id='+prov, false);
				request.send();
				kec.innerHTML= request.responseText;
				}
				namaProvinsi.addEventListener('click', getKec);
		
		$("#kurir").click(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();
			
			var tot = Number.parseInt(document.getElementById('total').value);
			
			
			console.log(tot);
			      		$.ajax({
            	type : 'POST',
           		url : 'inc/cek_ongkir.php',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {
					console.log(data);
					console.log(prov);
					let ongkos = 0;
					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					if(prov==="33"){
					
						$("#ongkir").val("Rp."+ongkos);
						$("#ongkir1").val(ongkos);
					}else{
						ongkos = data;
						$("#ongkir").val("Rp."+Number.parseInt(ongkos).toLocaleString('id-ID'));
						$("#ongkir1").val(ongkos);
					}
					console.log(ongkos);
					$('#totaltransaksi').val("Rp."+(tot+Number.parseInt(ongkos)).toLocaleString('id-ID'));
					$('#totaltransaksi1').val(tot+Number.parseInt(ongkos));
				}
				
          	});
			

		});
	});
	
</script>
		