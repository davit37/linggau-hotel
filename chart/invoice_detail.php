<?php
cek_status_login($_SESSION['idpelanggan']);
?>


<section class="main-content">
<a href='index.php?mod=chart&pg=invoice' class='btn btn-warning'>
		<i class='icon-arrow-left icon-white'></i>Back</a>
        
       
	<div class="row">
		<div class="span9">

	

	
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped">
		<thead>
			<th><td><b>Nama </b></td><td><b>Harga Satuan</b></td><td><b>Jumlah</b></td><td class='pull-right'><b>Total Belanja</b></td></th>
		</thead>
		<tbody>
<?php
$id=$_GET['id'];
$query="SELECT produk . * , transaksi . * , stok . * , invoice . * , pelanggan . level 
FROM produk, transaksi, stok, invoice, pelanggan
WHERE produk.idproduk = transaksi.idproduk
AND produk.idproduk = stok.idproduk
AND transaksi.noinvoice = invoice.noinvoice
AND invoice.idpelanggan = pelanggan.idpelanggan
AND transaksi.noinvoice =  '$id'";

$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
$total=0;
while($rows=mysql_fetch_object($result)){
	if($rows->level=='mitra_kerja'){
										$harga=$rows->harga_mitra;
									} else{
										$harga=$rows->harga_jual;
									}
$subtotal= $harga * $rows -> jumla;
$total=$total+$subtotal;
			?>
			<tr>
				<td><?php echo $result+$no
				?></td>
			
				<td>
					<img src='upload/produk/<?php echo $rows ->foto ?>'  width='128px' height='128px' />
					<br>
					<?php echo $rows -> nama_produk; ?></td>
			<td><?php echo format_rupiah($harga); ?></td>
			<td><?php echo $rows -> jumla; ?></td>
			<td class='pull-right'><?php echo format_rupiah($subtotal); ?></td>
			
				
				
			</tr>
			
			<?php	$no++;
				}
			?>
<tr><td>Total</td><td colspan='4'  ><p class='pull-right'><?php echo format_rupiah($total);?></p></td></tr>
<br />

 <a href='index.php?mod=chart&pg=finish&total_bayar=<?php echo $_GET['total']; ?>&kd_transaksi=<?php echo $_GET['id'];?>' class='btn btn-warning'>Pembayaran</a>
 
 <h4 id="headings"> Detail Invoice dengan nomor <?=$_GET['id']?></h4>       			
		</tbody>
	</table>
</div>

<?php
include('inc/sidebar-front.php');
?>
	</div>
</section>	
