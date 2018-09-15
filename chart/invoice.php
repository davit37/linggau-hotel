<?php
cek_status_login($_SESSION['idpelanggan']);
?>
<section class="main-content" style="height: 1040px;">

	<div class="row">
		<div class="span10">

	


	<h4 id="headings"> Data Check In</h4>
	<!--<a href='index.php?mod=invoice&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>Kode Checkin</b></td><td><b>Nama hotel</b></td><td><b>Tanggal Transaksi</b></td><td><b>Total Transaksi</b></td><td><b>Deposit</b></td><td><b>Status Bayar</b></td><td><b>Konfirmasi</b></td><td><b></b></td></th>
		</thead>
		<tbody>
<?php

$id=$_SESSION['idpelanggan'];
$query="select pelanggan.nama, check_in.*, kamar.jenis_kamar,hotel.nama_hotel 
from pelanggan INNER JOIN check_in ON pelanggan.idpelanggan=check_in.id_pelanggan
 INNER JOIN kamar ON check_in.id_kamar=kamar.id_kamar JOIN 
 hotel ON kamar.id_hotel=hotel.id_hotel where check_in.id_pelanggan='$id'
";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
			<td><?php echo $result+$no
				?></td>
			
			<td><?php echo $rows -> nama; ?></td>
			<td><a href='index.php?mod=chart&pg=finish&total_bayar=<?php echo $rows -> deposit; ?>&kd_transaksi=<?php echo $rows -> kd_invoicer;?>'><?php echo $rows -> kd_invoicer; ?></a></td><td><?php echo $rows ->nama_hotel; ?></td>
			<td><?php echo $rows ->tanggal_check_in; ?></td>
			<td><?php echo format_rupiah($rows ->bayar); ?></td>
			<td><?php echo format_rupiah($rows -> deposit); ?></td>
			<td><?php 
			$status="Sudah bayar";
			if( $rows -> status_bayar==0){
						$status="Belum";
			
			}echo $status;?>
			  
			</td>
			<?php
			if($rows ->status_pesanan!=1)
				 {?>
				<td>
				<?php
				 if($rows -> status_bayar==0)
				 {?>
                 
				 <a title='Konfirmasi Bukti Pembayaran'href="index.php?mod=chart&pg=konfirmasi&id=<?php echo $rows -> id_checkin; ?>"><button type="submit" class="btn btn-primary btn-xs" ><i class="fas fa-pencil"></i>Bukti Bayar</button></a>
				<?php

				 }elseif($rows -> status_bayar==1){
					 ?>
					 <a title='cetak struk 'href="cetak_struk.php?id=<?php echo $rows -> id_checkin; ?>"><button type="submit" class="btn btn-primary btn-xs" ><i class="fa fa-print"></i> Cetak struk</button></a>
					 <?php
				 }
				 ?>
				
				 </td>
				 <td> <form  action='chart/batal.php'  method='post'>
						<input type='hidden' name='id'value='<?php echo $rows -> id_checkin; ?>'>
						<input type='hidden' name='id_kamar'value='<?php echo $rows -> id_kamar; ?>'>
						<input type='hidden' name='jumlah_kamar'value='<?php echo $rows -> jumlah_kamar_checkin; ?>'>
						<button type="submit"class="btn btn-primary">Batalkan</button>
						</form></td>
				 <?php }	?>
				
			</tr>
			<?php $no++;
				}
			?>

			
		</tbody>
	</table>


</div>
	

	</div>
</section>	
