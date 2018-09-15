<?php
// memanggil library FPDF
require('../inc/fpdf181/fpdf.php');
include ('../inc/config.php');
include ('../inc/function.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();

//Menambahkan Gambar


// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(190,7,'',0,1,'C');

$pdf->SetFont('Arial','B',14);

if(empty($_GET['id'])){
$pdf->Cell(190,7,'KOTA LUBUKLINGGAU',0,1,'C');
}else{
	$query_hotel="SELECT * FROM hotel where id_hotel='$_GET[id]'";
	$result = mysql_query($query_hotel) or die(mysql_error());
	$data = mysql_fetch_object($result);
	// mencetak string 
	$pdf->Cell(190,7,"Hotel $data->nama_hotel",0,1,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(190,7," $data->alamat",0,1,'C');
	$pdf->Cell(190,7," $data->no_telpon",0,1,'C');
}
$pdf->SetFont('Arial','',10);
$pdf->Cell(190,7,'',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(200,1,'============================================================================',0,1,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,3,'',0,1,'C');
// mencetak string 
$pdf->Cell(190,7,'LAPORAN DATA TRANSAKSI',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$id_hotel=$_SESSION['id_hotel'];

$pdf->SetFont('Arial','',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(20,6,'Nama ',1,0,'C');
$pdf->Cell(30,6,'kd Checkin',1,0,'C');
$pdf->Cell(34,6,'Tanggal check in',1,0,'C');
$pdf->Cell(34,6,'Tanggal Check out',1,0,'C');
$pdf->Cell(34,6,'Total',1,0,'C');
$pdf->Cell(30,6,'deposit ',1,1,'C');
$pdf->SetFont('Arial','',10);




$a = $_GET['tgl_awal'];
	 $b = $_GET['tgl_akhir'];

	 

	 echo $id_hotel;
	 if($a == "" && $b == ""  && empty($_GET['id']))
	 {
		 $query="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan ";
	 }else if ($a == "" && $b == ""  && isset($_GET['id'])) {
			 $query="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan JOIN kamar ON kamar.id_kamar=check_in.id_kamar  and kamar.id_hotel='$_GET[id]' ";
	 }else if ($a != "" && $b != ""  && isset($_GET['id'])) {
		 $query="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan JOIN kamar ON kamar.id_kamar=check_in.id_kamar   and kamar.id_hotel='$_GET[id]' and  check_in.tanggal_check_in >= '$a' and check_in.tanggal_check_in <='$b' ";
	 }else 
	 {
		 $query ="SELECT * from check_in JOIN pelanggan ON check_in.id_pelanggan=pelanggan.idpelanggan JOIN kamar ON kamar.id_kamar=check_in.id_kamar  and  check_in.tanggal_check_in >= '$a' and check_in.tanggal_check_in <='$b'  ";
	 }
$result=mysql_query($query) or die(mysql_error());
$no=0;
$no=$no+1;
$pdf->SetFont('Arial','',8);
while ($row = mysql_fetch_array($result)){

    $pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(20,6,$row['nama'],1,0,'C');
	$pdf->Cell(30,6,$row['kd_invoicer'],1,0,'C');
	$pdf->Cell(34,6,$row['tanggal_check_in'],1,0,'C');
	$pdf->Cell(34,6,$row[ 'tanggal_check_out'] ,1,0,'C');
	$pdf->Cell(34,6,format_rupiah($row['bayar']),1,0,'C');
	$pdf->Cell(30,6,format_rupiah($row['deposit']),1,1,'C');

	$no++; 
	}

$pdf->SetFont('Arial','',10);
$pdf->Cell(200,1,'',0,1,'L');
$pdf->Cell(200,1,'',0,1,'L');
$pdf->SetX(135);
$pdf->Cell(200,10,'Lubuklinggau, '. date("j F Y"),0,1,'L');
$pdf->SetX(135);
$pdf->Cell(200,1,'Mengetahui,',0,1,'L');
$pdf->SetX(135);
$pdf->Cell(200,40,'(................................................)',0,1,'L');

$pdf->Output();
?>