-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2018 at 09:26 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservasi_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_kirim`
--

CREATE TABLE IF NOT EXISTS `alamat_kirim` (
  `id_kirim` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `noinvoice` varchar(15) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kota_tujuan` varchar(25) NOT NULL,
  `jasa_pengiriman` varchar(15) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `biaya_ongkir` int(11) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id_kirim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `alamat_kirim`
--

INSERT INTO `alamat_kirim` (`id_kirim`, `tanggal`, `noinvoice`, `kota_asal`, `provinsi`, `kota_tujuan`, `jasa_pengiriman`, `kodepos`, `alamat`, `biaya_ongkir`, `total_belanja`, `total_transaksi`) VALUES
(1, '2018-01-22', 'T00001', '2', '17', '172', 'pos', '12312', 'lalu', 210000, 8500000, 8710000),
(2, '2018-01-23', 'T00002', '2', '13', '466', 'tiki', '9999999', 'b', 255000, 1750000, 2005000),
(3, '2018-01-22', 'T00003', '242', '33', '316', 'tiki', '32161', 'jl. daktau', 0, 1500000, 1500000),
(4, '2018-01-22', 'T00004', '3', '16', '450', 'tiki', '7667', 'dakjsacjgf', 0, 1800000, 1800000),
(6, '2018-01-23', 'T00009', '487', '13', '18', 'jne', '9898', 'mmm', 360000, 1450000, 1810000),
(8, '2018-01-23', 'T00011', 'Lubuk linggau', '10', '250', 'tiki', '755', 'mmm', 175000, 7500000, 7675000),
(9, '2018-01-24', 'T00012', 'Lubuk linggau', '4', '63', 'pos', '321213', 'jl.gvsgsvdc', 427500, 1980000, 2407500);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `idberita` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idberita`, `id_hotel`, `tanggal`, `judul`, `isi`, `aktif`, `gambar`) VALUES
(2, 3, '2018-04-29 13:29:26', 'promosio awal bulan', '', 1, ''),
(4, 5, '2018-06-24 17:17:51', 'Promo Bulan Agustus', '<p><span style="font-size: small;"><strong>Menginap Satu Malam Free dua Malam</strong></span></p>', 1, 'city.brosur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE IF NOT EXISTS `bukti_pembayaran` (
  `idpembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_checkin` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  PRIMARY KEY (`idpembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`idpembayaran`, `tanggal`, `id_checkin`, `foto`, `keterangan`) VALUES
(1, '2018-07-25', 0, 'IMG-20180622-WA0002.jpg', 'sudah bayar'),
(3, '2018-07-25', 5, 'IMG-20180622-WA0002.jpg', 'sudah bayar'),
(4, '2018-07-25', 5, 'standard.jpg', 'sudah'),
(5, '2018-07-25', 5, 'standard.jpg', 'qwr'),
(7, '2018-07-25', 9, 'standard.jpg', 'sudah'),
(8, '2018-07-26', 12, 'standard.jpg', 'suudah'),
(9, '2018-07-26', 13, 'IMG-20180622-WA0002.jpg', 'dsfsfsf'),
(10, '2018-07-26', 14, 'IMG-20180622-WA0002.jpg', 'wewe'),
(11, '2018-07-26', 15, 'delux ro0m.jpg', 'fdsf');

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE IF NOT EXISTS `check_in` (
  `id_checkin` int(11) NOT NULL AUTO_INCREMENT,
  `kd_invoicer` varchar(5) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal_check_in` date NOT NULL,
  `tanggal_check_out` date NOT NULL,
  `jumlah_kamar_checkin` int(11) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `status_kamar` int(11) NOT NULL,
  PRIMARY KEY (`id_checkin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`id_checkin`, `kd_invoicer`, `id_pelanggan`, `id_kamar`, `tanggal_check_in`, `tanggal_check_out`, `jumlah_kamar_checkin`, `jumlah_orang`, `bayar`, `deposit`, `status_bayar`, `status_kamar`) VALUES
(3, '76RO5', 9, 9, '2018-06-21', '2018-06-22', 2, 2, 700000, 200000, 1, 1),
(5, 'TMADV', 12, 2, '2018-07-26', '2018-07-27', 1, 1, 420000, 400000, 1, 0),
(6, 'JXLWF', 12, 6, '2018-07-26', '2018-07-27', 2, 2, 990000, 400000, 0, 0),
(8, '1LRJ5', 12, 7, '2018-07-26', '2018-07-13', 4, 5, 18356000, 7878, 0, 0),
(9, '5VL7W', 12, 6, '2018-08-24', '2018-07-28', 1, 1, 13365000, 100000, 0, 1),
(10, 'IFK61', 12, 6, '2018-07-26', '2018-07-27', 2, 2, 990000, 500000, 0, 1),
(11, '247R1', 12, 6, '2018-07-27', '2018-07-28', 1, 1, 495000, 200000, 0, 1),
(14, 'DKYFF', 12, 4, '2018-07-28', '2018-07-29', 1, 1, 750000, 300000, 0, 0),
(15, 'NFAPC', 12, 10, '2018-07-27', '2018-07-28', 1, 2, 220000, 200000, 0, 0),
(16, 'CWLV6', 13, 6, '2018-07-28', '2018-07-29', 1, 1, 495000, 400000, 0, 0),
(17, 'AD2I3', 13, 3, '2018-07-28', '2018-07-29', 1, 2, 850000, 600000, 0, 0),
(18, 'RZM22', 13, 2, '2018-07-30', '2018-07-31', 1, 2, 420000, 400000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_fasilitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(1, 'Wifi area'),
(2, 'Lift'),
(3, 'Parkir'),
(4, 'Restoran'),
(5, 'Laundri'),
(6, 'Mitting room');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_hotel`
--

CREATE TABLE IF NOT EXISTS `fasilitas_hotel` (
  `id_hotel` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_hotel`, `id_fasilitas`) VALUES
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(8, 1),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hotel` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(20) NOT NULL,
  `no_telpon` int(11) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  PRIMARY KEY (`id_hotel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `alamat`, `nama_pimpinan`, `no_telpon`, `foto1`, `foto2`, `foto3`, `foto4`) VALUES
(5, 'city', 'lubuk aman', 'davit', 2147483647, 'WhatsApp Image 2018-06-21 at 15.12.30.jpeg', 'WhatsApp Image 2018-06-21 at 15.14.32.jpeg', 'WhatsApp Image 2018-06-21 at 15.15.14.jpeg', 'WhatsApp Image 2018-06-21 at 15.17.33.jpeg'),
(6, '929', 'Jln. Trans Sumatra KM. 5 (Belalau I) SuMSEL', 'Jimmy Iskandar', 2147483647, 'WhatsApp Image 2018-06-21 at 15.43.08.jpeg', 'WhatsApp Image 2018-06-21 at 15.43.47.jpeg', 'WhatsApp Image 2018-06-21 at 15.44.52.jpeg', 'WhatsApp Image 2018-06-21 at 16.01.26.jpeg'),
(8, 'Linggau Hotel', 'Jln. Yos Sudarso RT.04 No.06 Kel. Taba Jemekeh', 'Berita Harahap, ST', 869869090, 'IMG-20180622-WA0002.jpg', 'delux ro0m.jpg', 'standard.jpg', 'superior.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `jumlah_kamar` int(11) DEFAULT NULL,
  `jenis_kamar` varchar(20) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `fasilitas` varchar(200) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_hotel`, `jumlah_kamar`, `jenis_kamar`, `harga_kamar`, `fasilitas`, `foto`) VALUES
(2, 5, 7, 'Standard', 420000, 'tv. Ac Wifi Sower Panas dingin', 'WhatsApp Image 2018-06-21 at 15.17.33.jpeg'),
(3, 5, 9, 'City Room deluxw', 850000, 'TV. AC WIFI', 'WhatsApp Image 2018-06-21 at 15.14.32.jpeg'),
(4, 5, 19, 'City Room', 750000, 'WIFI. AC. TV', 'WhatsApp Image 2018-06-21 at 15.15.14.jpeg'),
(6, 6, 9, 'Deluxe ', 495000, 'Ac. Tv, Wifi, Sower', 'WhatsApp Image 2018-06-21 at 15.44.52.jpeg'),
(7, 6, 15, 'STANDAR', 353000, 'Ac, Tv, Wifi, Sower', 'WhatsApp Image 2018-06-21 at 16.01.26.jpeg'),
(10, 8, 2, 'Standard', 220000, 'Tv, Ac, Wifi', 'standard.jpg'),
(11, 6, 5, 'FAMILY ROOM', 1550000, 'Ac, Tv, Wifi, Kulkas, shuttel air port', 'city.familly room.jpg'),
(12, 8, 16, 'SUPERIOR', 250000, 'Tv, AC, Wifi, ', 'superior.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id_map` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) NOT NULL,
  `kordinat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_map`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id_map`, `id_hotel`, `kordinat`) VALUES
(3, 5, '-3.2862553,102.8829023'),
(6, 6, '-3.2523586,102.8511986');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `idpelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `kelamin` set('L','P') NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kodepos` varchar(6) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `telp` varchar(200) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`idpelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama`, `kelamin`, `email`, `alamat`, `kodepos`, `kota`, `telp`, `tanggal_daftar`, `password`, `status`, `level`) VALUES
(7, 'ani', 'L', 'ani@gmail.com', 'lkjkljklj', '879789', 'llg', '0990908', '2018-01-11', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(8, 'deni', 'L', 'denni@gmail.com', 'lkjlkuhgjyft', '123213', 'llg', '098980980', '2018-01-14', '202cb962ac59075b964b07152d234b70', 0, 'pelanggan'),
(9, 'ayu', 'P', 'ayu@gmail.com', 'dfhjlkkklyujyrghfc', '31617', 'llg', '12345678', '2018-01-18', '202cb962ac59075b964b07152d234b70', 1, 'pelanggan'),
(11, 'Alviansyah', 'L', 'alviansyah@gmail.com', 'lubuklinggau no.11', '214235', 'lubuklinggau', '099808797', '2018-01-22', '202cb962ac59075b964b07152d234b70', 1, 'pelanggan'),
(12, 'rani', 'L', 'rani@gmail.com', 'Sumsel', '12367', 'LUBUK KUPang', '0832124345', '2018-07-25', '8daed774c333aeac3b87b539f04966b2', 0, 'pelanggan'),
(13, 'jaka', 'L', 'jaka@gmail.com', 'llg', '0', 'llg', '09878899090', '2018-07-27', '9d83066da00b7c7fa9de34117f488653', 0, 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE IF NOT EXISTS `pengelola` (
  `idpengelola` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) DEFAULT NULL,
  `nama` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idpengelola`),
  KEY `id_hotel` (`id_hotel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`idpengelola`, `id_hotel`, `nama`, `username`, `password`, `status`) VALUES
(1, NULL, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(9, 5, 'doni', 'City', '96aa80f105dc423db8572f26e0caf995', 1),
(10, 6, 'Dani', '929', '38668f6b0d9b54734a4a4ffd67bef73d', 1),
(11, 8, 'Hotel linggau', 'linggau', 'cb0f0be5a281fb212673e280004f3149', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengelola_hotel`
--

CREATE TABLE IF NOT EXISTS `pengelola_hotel` (
  `id_pengelola_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `idpengelola` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  PRIMARY KEY (`id_pengelola_hotel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pengelola_hotel`
--

