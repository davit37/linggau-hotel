<?php
if(empty($_SESSION['idpelanggan'])){
	echo
	"
	 <script>
	 alert('Anda Harus Login');
	 window.location ='index.php?mod=user&pg=login'
	 </script>
	";
		exit();		
	}
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "kirim";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
			$sql = "select * from kamar where id_kamar='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "Kirim";
	}?>



	<!--kolom kiri-->

		<h2> Masukkan Data Pemesanan</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="chart/cehckin_action.php">
	
		<?php	$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">
		<input type='hidden' name='kd_invoice' id='kd_invoice'value="">
		<input type='hidden' name='idpelanggan' value="<?php echo $_SESSION['idpelanggan'];?>">
	<div class="control-group">
			<label class="control-label" for="noinvoice">Tanggal check in</label>
			<div class="controls">
				<input type="date" name="tanggal_checkin" id="tanggal_checkin">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="noinvoice">Tanggal check out</label>
			<div class="controls">
				<input type="date" name="tanggal_checkout" id="tanggal_checkout">
			</div>
		</div> 
		<div class="control-group">
			<label class="control-label" for="noinvoice">Jumlah kamar</label>
			<div class="controls">
				<input type="number" name="jumlah_kamar" min=1 max="<?php echo $data->jumlah_kamar; ?> "id="jumlah_kamar">
			</div>
		</div> 
		<div class="control-group">
			<label class="control-label" for="noinvoice">Jumlah Orang</label>
			<div class="controls">
				<input type="number" name="jumlah_orang"   id="">
			</div>
		</div> 
		<div class="control-group">
			<label class="control-label" for="noinvoice">Total Bayar Rp.</label>
			<div class="controls">
				<input type="text" name="" id="total_bayar" readonly>
				<input type="hidden" name="bayar" id="bayar" readonly>
			</div>
		</div> 
		<div class="control-group">
			<label class="control-label" for="noinvoice">Deposit</label>
			<div class="controls">
				<input type="number" name="deposit" id="">
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
<script>
	let jumlahKamar = document.getElementById('jumlah_kamar');
	let totalBayar = document.getElementById('total_bayar');
	let Bayar = document.getElementById('bayar');
	let tanggalCheckIn = document.getElementById('tanggal_checkin');
	let tanggalCheckout = document.getElementById('tanggal_checkout');
	let harga = '<?php echo $data->harga_kamar;?>';

	function total(){

		var startdate = new Date(tanggalCheckIn.value);
		var enddate = new Date(tanggalCheckout.value);
		var selisihTanggal = startdate- enddate;
		var satuHari = 1000*60*60*24;
		var selisihHari = Math.abs(selisihTanggal/satuHari);
		
		var hitung=Number.parseInt(harga) * Number.parseInt(jumlahKamar.value)*selisihHari;
		bayar.value=hitung;
		console.log(hitung);
		if(Number.isNaN(hitung)){
			totalBayar.value= "";
		}else{
			totalBayar.value=hitung.toLocaleString('id-ID');
		}
		
	}
	jumlahKamar.addEventListener('keyup',total);
	jumlahKamar.addEventListener('change',total);
	tanggalCheckIn .addEventListener('change',total);
	tanggalCheckout.addEventListener('change',total);

	 var kode = document.getElementById('kd_invoice');
	 var acak = 0;
                    var code = [
                        'A', 'B', 'C', 'D', 'F', 'G', 'F', 'H', 'J', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
                        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
                    ];
                    var h = '';

                    

                    function generate() {
                        for (var i = 0; i <= 5; i++) {
                            var acak = Math.floor(Math.random() * 36);
                            h += code[acak];
                        }
                        kode.value=h;
                    }

                window.addEventListener('load', generate);
	
</script>