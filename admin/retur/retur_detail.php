<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>

<div>
	<a href='index.php?mod=retur&pg=retur_view' class='btn btn-primary'>
		<i class='icon-arrow-left'>Back</i></a>
	<h2 id="headings"> Detail Retur Dengan Nomor <?php echo $_GET['id']?></h2>
	<table  class="table table-striped ">
		<thead>
			<th><td><b>Nama </b></td><td><b>Foto</b></td><td><b>Keterangan</b></td></th>
		</thead>
		<tbody>
<?php
$id=$_GET['id'];
$query="SELECT retur.*,invoice.*,pelanggan.* from retur,invoice,pelanggan
where retur.noinvoice=invoice.noinvoice and invoice.idpelanggan=pelanggan.idpelanggan and retur.idretur='$id'";

$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){           											
			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			<td><?php echo $rows -> nama; ?></td>
				<td>
					<img src='../upload/retur/<?php echo $rows ->foto ?>'  width='128px' height='128px'>
					<br></td>
					
			<td><?php echo $rows -> keterangan; ?></td>
				
				
			</tr>
			
			<?php	$no++;
				}
			?>
			
		</tbody>
	</table>


</div>
