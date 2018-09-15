<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>

<?php 
//===========CODE DELETE RECORD ================


$a ='';
	 $b ='' ;
	if(isset( $_POST['tgl_awal'])&&isset($_POST['tgl_akhir'])){
		$a= $_POST['tgl_awal'];
		$b=$_POST['tgl_akhir'];
	}
	$id_hotel=$_SESSION['id_hotel'];
?>


<div>
	<h2 id="headings"> Data Transaksi</h2>
    
    <form action="" method="post" name="form1" class="form-horizontal">
				  <input type="date" name="tgl_awal" class="form-control" placeholder="Tgl. Awal">               
               	  <input type="date" name="tgl_akhir" class="form-control" placeholder="Tgl. Akhir">                
				  <input type="submit" class="btn btn-success btn-sm" name="cari" value="Cari" />
                  <a href="cetak_transaksi.php?tgl_awal=<?php echo $a ?>&tgl_akhir=<?php echo $b ?>&id=<?php echo $id_hotel ?>" target="_blank" class="btn btn-success btn-sm"> Cetak</a> 
                  </form>
    
	<!--<a href='index.php?mod=invoice&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>Kd Checkin</b></td><td><b>Tanggal check in</b></td><td><b>Tanggal Check out</b></td><td><b>Total</b></td><td><b>deposit</b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='5';
$tabel="invoice";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}

	 $c = $_POST['id_kategori'];
	 echo $a." ".$b;

	
	 
	if($a == "" && $b == "" && $_SESSION['status'] == 0)
	{
		$query="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan ";
	}else if ($a == "" && $b == ""  && $_SESSION['status'] == 1) {
			$query="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan JOIN kamar ON kamar.id_kamar=check_in.id_kamar  and kamar.id_hotel=$id_hotel ";
	}else if ($a != "" && $b != ""  && $_SESSION['status'] == 1) {
		$query="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan JOIN kamar ON kamar.id_kamar=check_in.id_kamar   and kamar.id_hotel=$id_hotel and  check_in.tanggal_check_in >= '$a' and check_in.tanggal_check_in <='$b' ";
	}else 
	{
		$query ="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan JOIN kamar ON kamar.id_kamar=check_in.id_kamar  and  check_in.tanggal_check_in >= '$a' and check_in.tanggal_check_in <='$b'  ";
	}
$result=mysql_query($query) or die(mysql_error());
$no=1;
echo $id_hotel;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){
	if($rows->status_bayar==0){
		$btn="<a href='invoice/invoice_action.php?&act=bayar&id=$rows->kd_invoicer' 
		onclick='tandai()';
		class='btn btn-success'> <i class='icon-ok'></i>Sudah bayar</a>";
	}else if($rows->status_bayar==1){
		$btn='';
	}

			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			
				<td><?php echo $rows -> nama; ?></td>
			<td><?php echo $rows -> kd_invoicer; ?></td>
			<td><?php echo $rows -> tanggal_check_in; ?></td>
				<td><?php echo $rows -> tanggal_check_out ; ?></td>
		
			<td><?php echo format_rupiah($rows -> bayar); ?></td>
			<td><?php echo format_rupiah($rows -> deposit); ?>
				
				</td>

			
				<td>	
				
				<?php 
				if($rows->status_pesanan!=1){
				echo $btn; 
				if($rows->status_kamar==0){

				?>
				
				<a href="invoice/invoice_action.php?act=keluar&id=<?php echo $rows -> kd_invoicer.'&id_kamar='.$rows -> id_kamar.'&jumlah_kamar='.$rows -> jumlah_kamar_checkin; ?>"
				onclick="return confirm('Tandai check out?') ";
				class='btn btn-success'> <i class="icon-ok"></i>Check out</a>
				<?php }
				}
				
				?>
				
				<a href="invoice/invoice_action.php?act=del&id=<?php echo $rows -> id_checkin.'&id_kamar='.$rows -> id_kamar.'&jumlah_kamar='.$rows -> jumlah_kamar_checkin; ?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash"></i></a>
				</td>
			</tr>
			<?php $no++;
				}

			
			?>

			
		</tbody>
	</table>
	<?php //=============CUT HERE for paging====================================
	$tampil2 = mysql_query("SELECT noinvoice from invoice");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "invoice"); ?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata; ?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database
?>

</div>
<script>
	function tandai(){
		confirm('Tandai sudah Bayar')

	}
</script>
