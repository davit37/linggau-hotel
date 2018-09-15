<?php

// memanggil library FPDF
include('inc/function.php');
require('../fpdf181/fpdf.php');
$conn = new mysqli("127.0.0.1", "root", "", "reservasi_hotel");
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm',array(120,100));
// membuat halaman baru
$pdf->AddPage();

//Menambahkan Gambar


// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',12);
// mencetak string 


$pdf->SetFont('Arial','B',13);
$pdf->SetX(30);
$pdf->Cell(40,7,'struk pemesanan kamar ',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetY(30);

$pdf->SetFont('Arial','',10);


$query = $conn->query("select pelanggan.nama, check_in.*, kamar.jenis_kamar,hotel.nama_hotel 
        from pelanggan INNER JOIN check_in ON pelanggan.idpelanggan=check_in.id_pelanggan
         INNER JOIN kamar ON check_in.id_kamar=kamar.id_kamar JOIN 
         hotel ON kamar.id_hotel=hotel.id_hotel where check_in.id_checkin='$_GET[id]'");

$obj=$query->fetch_object();

$pdf->Cell(20,7 ,"Nomor Transaksi                      : #$obj->kd_invoicer",0,1);
$pdf->Cell(20,7 ,"Nama Pemesan                        : $obj->nama",0,1);
$pdf->Cell(20,7 ,"Jumlah Kamar                           : $obj->jumlah_kamar_checkin",0,1);
$pdf->Cell(20,7 ,"Jumlah Orang                            : $obj->jumlah_orang",0,1);
$pdf->Cell(20,7 ,"Total Bayar                                : ".format_rupiah($obj->bayar),0,1);
$pdf->Cell(20,7 ,"Deposit                                      : ".format_rupiah($obj->deposit),0,1);
$pdf->Cell(20,7 ,"Tanggal Check In                     : $obj->tanggal_check_in",0,1);
$pdf->Cell(20,7 ,"Tanggal Check Out                    : $obj->tanggal_check_out",0,1);






		

$pdf->Output();
?>