<?php
// memanggil library FPDF
require('inc/fpdf181/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();

//Menambahkan Gambar


// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(190,7,'TOKO PULAU MAS INDAH ELEKTRONIK',0,1,'C');

$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(190,7,'KOTA LUBUKLINGGAU',0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(190,7,'Jl. Yos Sudarso No. 107 Kel. Jawa Kanan Kec. Lubuklinggau Timur II Telp :(0733) 321-362',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(200,1,'============================================================================',0,1,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,3,'',0,1,'C');
// mencetak string 
$pdf->Cell(190,7,'BUKTI SAH DATA RETUR',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(20,6,'Tanggal',1,0,'C');
$pdf->Cell(20,6,'No Invoice',1,0,'C');
$pdf->Cell(35,6,'Nama Pelanggan',1,0,'C');
$pdf->Cell(35,6,'Nama Produk',1,0,'C');
$pdf->Cell(25,6,'S/N Produk',1,0,'C');
$pdf->Cell(15,6,'Jumlah',1,0,'C');
$pdf->Cell(35,6,'Keterangan',1,1,'C');


include ('inc/config.php');
include ('inc/function.php');
$a = $_GET['tgl_awal'];
	 $b = $_GET['tgl_akhir'];

	 
	 
	if($a == "" && $b == "")
	{
	$query="SELECT retur.*, invoice.idpelanggan, pelanggan.nama from retur, invoice, pelanggan where retur.noinvoice=invoice.noinvoice 
	and invoice.idpelanggan= pelanggan.idpelanggan";
	}
	else
	{
		$query = "SELECT retur.idretur, retur.tanggal,retur.noinvoice, invoice.noinvoice, pelanggan . * , retur.keterangan, transaksi . * , produk.nama_produk, kategori.nama_kategori
FROM retur, invoice, pelanggan, transaksi, produk, kategori
WHERE retur.noinvoice = invoice.noinvoice
AND invoice.noinvoice = transaksi.noinvoice
AND transaksi.idproduk = produk.idproduk
AND produk.idkategori=kategori.idkategori 
AND invoice.idpelanggan = pelanggan.idpelanggan
and  retur.tanggal >= '$a' and retur.tanggal <='$b'  ";
	}
$result=mysql_query($query) or die(mysql_error());
$no=0;
$no=$no+1;
$pdf->SetFont('Arial','',8);
while ($row = mysql_fetch_array($result)){
if($row['level']=='mitra_kerja'){
										$harga=$row['harga_mitra'];
									} else{
										$harga=$row['harga_jual'];
									}
    $pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(20,6,$row['tanggal'],1,0);
	$pdf->Cell(20,6,$row['noinvoice'],1,0);
	$pdf->Cell(35,6,$row['nama'],1,0);
	$pdf->Cell(35,6,$row['nm_produk'],1,0);
	$pdf->Cell(25,6,$row['sn_produk'],1,0);
	$pdf->Cell(15,6,$row['jml'],1,0);
	$pdf->Cell(35,6,$row['keterangan'],1,1);
    
	$no++; 
	}

$pdf->SetFont('Arial','',12);

$pdf->SetX(135);
$pdf->Cell(200,10,'Lubuklinggau, '. date("j F Y"),0,1,'L');
$pdf->SetX(135);
$pdf->Cell(200,1,',',0,1,'L');
$pdf->SetX(135);
$pdf->Cell(200,30,'',0,1,'L');

$pdf->Output();
?>