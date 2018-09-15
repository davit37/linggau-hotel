
<?php

function kd_transaksi() {
	$kode_temp = fetch_row("SELECT noinvoice FROM invoice ORDER BY noinvoice DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "T00001";
	else {
		$jum = substr($kode_temp, 1, 6);
		$jum++;
		if ($jum <= 9)
			$kode = "T0000" . $jum;
		elseif ($jum <= 99)
			$kode = "T000" . $jum;
		elseif ($jum <= 999)
			$kode = "T00" . $jum;
		elseif ($jum <= 9999)
			$kode = "T0" . $jum;
		elseif ($jum <= 99999)
			$kode = "T" . $jum;
		else
			die("Kode pemesanan melebihi batas");
	}
	return $kode;
}

function writeShoppingchart() {
	$chart = $_SESSION['chart'];
	if (!$chart) {
		return '<p>Anda belum membeli apapun</p>';
	} else {
		// Parse the chart session variable
		$items = explode(',', $chart);
		$s = (count($items) > 1) ? 's' : '';
		return '<h3>Ada <a href="index.php?mod=chart&pg=chart">' . count($items) . ' barang ' . ' di chart</a></h3>';
	}
}

function chartNotification() {
	$chart = $_SESSION['chart'];
	if (!$chart) {
		return '0';
	} else {
		// Parse the chart session variable
		$items = explode(',', $chart);

		return count($items);
	}
}

function getQty() {
	$chart = $_SESSION['chart'];
	if (!$chart) {
		return 0;
	} else {
		// Parse the chart session variable
		$items = explode(',', $chart);
		$s = (count($items) > 1) ? 's' : '';
		return count($items);
	}
}

function showchart() {


	$chart = $_SESSION['chart'];
//	print_r($chart);
	if ($chart) {
	
		
				
		
		$items = explode(',', $chart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = "<table class=\"table table-striped \">";
		$output[] = "<th><td>Nama Produk</td><td> Harga</td><td>Jumlah</td><td>Subtotal</td><td>Aksi</td></th>";
		$output[] = '<form action="index.php?mod=chart&pg=chart&action=update" method="post" id="chart">';
		$no = 1;
		foreach ($contents as $id => $qty) {
		

			$idpelanggan=$_SESSION['idpelanggan'];
				$query2 = "select pelanggan.level from pelanggan where pelanggan.idpelanggan='$idpelanggan'";
				$result2 = mysql_query($query2) or die(mysgl_error());
				$rows2 = mysql_fetch_row($result2);
				
			$sql = "SELECT produk .*,stok.* from produk,stok WHERE stok.idproduk='$id' and produk.idproduk= '$id'";
			$result = mysql_query($sql);
			$row = mysql_fetch_object($result);
			
			if($rows2[0]=='mitra_kerja') {
								$harga=$row->harga_mitra;
							} else{
								$harga=$row->harga_jual;
							}  
			
			$output[] = '<tr><td>' . $no . '</td>'.$kurang."";
		
			$output[] = '<td><img src=\'upload/produk/'. $row ->foto ;
			
			$output[] = '\' width=\'128px\' height=\'128px\'><br> '.$row ->nama_produk. 
			
			'</td><td>' . format_rupiah($harga) . '</td>';
			$output[] = '<td><input type="number"   class="input-mini" min="1" max="'.$row->jumlah.'"  name="qty' . $id . '"  value="' . $qty . '"  /></td>';

			$output[] = '<td>' . format_rupiah($harga * $qty) . '</td>';
			$total += $harga * $qty;

			$output[] = '<td><a href="index.php?mod=chart&pg=chart&action=delete&id=' . $id . '" class="btn btn-danger">Hapus</a></td></tr>';
			$no++;
		}
		$output[] = "</table>";
		$qty = getQty();

		$output[] = '<h3>Total	Transaksi	: ' . format_rupiah($total) . '</h3>';

		$_SESSION['totalbayar'] = $total;
		$output[] = '<button type="submit" class=\'btn btn-primary\'>Update cart</button>';
		$output[] = '</form>';
		$output[] ='<a href=\'chart/chart_action.php\' class=\'btn btn-primary\'>Check out</a>';
	} else {
		$output[] = '<p>Keranjang belanja masih kosong.</p>';
	}
	return join('', $output);
}

function insertToDB($kd_transaksi, $idpelanggan, $totalbayar) {

	$chart = $_SESSION['chart'];
	if ($chart) {
		$items = explode(',', $chart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}

		$sql_transaksi = "insert into invoice (noinvoice,tanggal,totalbayar,idpelanggan) 
		values( '$kd_transaksi', now(),'$totalbayar','$idpelanggan')";
		
		
		//echo "SQL transaksi:".$sql_transaksi;
		mysql_query($sql_transaksi) or die(mysql_error());
		foreach ($contents as $id => $qty) {
		$sql_select="select stok.jumlah from stok where idproduk='$id'";
		$result3 = mysql_query($sql_select) or die(mysgl_error());
		$rows3 = mysql_fetch_row($result3);
		$kurang=(int)$rows3[0]-(int)$qty;
		
		
		 $update="update stok set jumlah='$kurang' where idproduk='$id'";
		 $result4 = mysql_query($update) or die(mysql_error());
			$sql = "insert into transaksi(noinvoice,idproduk,jumla)
			values('$kd_transaksi','$id','$qty')";
			//		echo "SQL transaksi:".$sql;
			$result = mysql_query($sql) or die(mysql_error());
		}
	} else {
		$output[] = '<p>Keranjang belanja masih kosong.</p>';
	}

}
?>