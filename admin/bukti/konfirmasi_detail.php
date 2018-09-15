<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>

<div>
	<a href='index.php?mod=bukti&pg=konfirmasi_view' class='btn btn-primary'>
		<i class='icon-arrow-left'>Back</i></a>
	<h2 id="headings"> Detail Bukti Pembayaran Dengan Nomor <?php echo $_GET['id']?></h2>
	<table  class="table table-striped ">
		<thead>
			<th><td><b>Nama</b></td><td><b>Keterangan</b></td><td><b>Foto</b></td></th>
		</thead>
		<tbody>
<?php
$id=$_GET['id'];
$query="SELECT check_in.*, bukti_pembayaran.*,pelanggan.nama from check_in JOIN bukti_pembayaran ON check_in.id_checkin=bukti_pembayaran.id_checkin JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan where bukti_pembayaran.idpembayaran=$id";

$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){           											
			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			        <td><?php echo $rows ->nama;?></td>
				   
			        <td><?php echo $rows ->keterangan;?></td>	
				<td>
					<a href="../upload/buktibayar/<?php echo $rows ->foto ?>"><img src='../upload/buktibayar/<?php echo $rows ->foto ?>'  width='96px' height='128px'>
					</a></td>
			</tr>
			
			<?php	$no++;
				}
			?>
			
		</tbody>
	</table>


</div>
