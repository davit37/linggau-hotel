<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>

<div>
	<a href='index.php?mod=invoice&pg=invoice_view' class='btn btn-primary'>
		<i class='icon-arrow-left'>Back</i></a>
	<h2 id="headings"> Detail Invoice dengan nomor <?php echo $_GET['id']?></h2>
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped ">
		<thead>
			<th><td><b>Nama </b></td><td><b>harga satuan</b></td><td><b>Jumlah</b></td><td><b>Subtotal</b></td></th>
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

$subtotal= $harga* $rows -> jumla;
$total+=$total+$subtotal;
			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			
				<td>
					<img src='../upload/produk/<?php echo $rows ->foto ?>'  width='128px' height='128px'>
					<br>
					<?php echo $rows -> nama_produk; ?></td>
                    
			<td><?php echo format_rupiah($harga); ?></td>
			<td><?php echo $rows -> jumla; ?></td>
			<td class='pull-right'><?php echo format_rupiah($subtotal); ?></td>
			
				
				
			</tr>
			
			<?php	$no++;
				}
			?>
<tr><td>Total</td><td colspan='5'  ><p class='pull-right'><?php echo format_rupiah($total);?></p></td></tr>
			
		</tbody>
	</table>


</div>
