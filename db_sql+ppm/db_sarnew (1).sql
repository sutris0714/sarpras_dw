-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 08:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sarnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `Ruang` varchar(40) NOT NULL,
  `jenis_sarana` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `Spesifikasi` varchar(60) NOT NULL,
  `kepemilikan` varchar(20) NOT NULL,
  `peminjam_yang_meminjamkan` varchar(80) NOT NULL,
  `jumlah_total` varchar(20) NOT NULL,
  `jumlah_laik` varchar(20) NOT NULL,
  `jumlah_rusak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `angkutan`
--

CREATE TABLE `angkutan` (
  `id_angkut` int(11) NOT NULL,
  `jenis_sarana` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `spesifikasi` varchar(40) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `no_polisi` varchar(20) NOT NULL,
  `no_BPKB` varchar(30) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `kepemilikan` varchar(40) NOT NULL,
  `peminjam_yang_meminjamkan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_logs`
--

CREATE TABLE `app_logs` (
  `log_id` int(11) NOT NULL,
  `Timestamp` varchar(255) DEFAULT NULL,
  `Action` varchar(255) DEFAULT NULL,
  `TableName` varchar(255) DEFAULT NULL,
  `RecordID` varchar(255) DEFAULT NULL,
  `SqlQuery` varchar(255) DEFAULT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `ServerIP` varchar(255) DEFAULT NULL,
  `RequestUrl` text DEFAULT NULL,
  `RequestData` text DEFAULT NULL,
  `RequestCompleted` varchar(255) DEFAULT NULL,
  `RequestMsg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_logs`
--

INSERT INTO `app_logs` (`log_id`, `Timestamp`, `Action`, `TableName`, `RecordID`, `SqlQuery`, `UserID`, `ServerIP`, `RequestUrl`, `RequestData`, `RequestCompleted`, `RequestMsg`) VALUES
(1, '2023-01-20 07:51:18', 'userlogin', 'user', NULL, 'SELECT   * FROM user WHERE  username = ?  OR email = ?  LIMIT 1', 'Administrator', '192.168.100.100', 'index/login/', '{\"username\":\"admin\",\"password\":\"$2y$10$mFieALHcKjii0yMX0oN8P.t\\/ZNYpXbiagAaoGoGR85xXZ34xCpz5C\"}', 'true', NULL),
(2, '2023-01-20 08:06:57', 'userlogout', 'user', NULL, NULL, 'Administrator', '::1', 'index/logout', '[]', 'true', NULL),
(3, '2023-01-20 08:07:18', 'userlogin', 'user', NULL, 'SELECT   * FROM user WHERE  username = ?  OR email = ?  LIMIT 1', 'User', '::1', 'index/login/', '{\"username\":\"user\",\"password\":\"$2y$10$MBg82IZUqFIXLMIsvyx5sen8g\\/kP\\/Kt9RBudGEeyHd08GS7rVEmoq\"}', 'true', NULL),
(4, '2023-01-26 01:36:56', 'userlogin', 'user', NULL, 'SELECT   * FROM user WHERE  username = ?  OR email = ?  LIMIT 1', 'User', '192.168.100.99', 'index/login/', '{\"username\":\"anastasia.saintpaul@gmail.com\",\"password\":\"$2y$10$6.zPBj.7LKdkV9v9Qo5h6O7ol43tx6wN3Vq4Az6Q.2DogkVUP9cBS\"}', 'true', NULL),
(5, '2023-01-28 04:45:16', 'userlogin', 'user', NULL, 'SELECT   * FROM user WHERE  username = ?  OR email = ?  LIMIT 1', 'User', '192.168.100.99', 'index/login/', '{\"username\":\"anastasia.saintpaul@gmail.com\",\"password\":\"$2y$10$6.zPBj.7LKdkV9v9Qo5h6O7ol43tx6wN3Vq4Az6Q.2DogkVUP9cBS\"}', 'true', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brng` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `jumlah_barang` varchar(20) NOT NULL,
  `sumber` varchar(30) NOT NULL,
  `tgl_beli` date NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `barcode` varchar(80) NOT NULL,
  `penempatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brng`, `nama_barang`, `merk`, `spesifikasi`, `jumlah_barang`, `sumber`, `tgl_beli`, `harga_satuan`, `foto`, `barcode`, `penempatan`) VALUES
(2, 'PC', 'Simbada', '(PC Rakitan) i5 Ram ', '5', 'BOS Reguler thp 2', '2023-01-02', '6.700.000', 'http://localhost/sarprasnew/uploads/files/a4npju278e5fhv9.jpg', 'http://localhost/sarprasnew/uploads/files/604o3kxisy1z_lp.png', 'TU');

-- --------------------------------------------------------

--
-- Table structure for table `barang_atk`
--

CREATE TABLE `barang_atk` (
  `id_batk` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `jumlah_barang` varchar(20) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `tipe_barang` varchar(60) NOT NULL,
  `tgl_realisasi` date NOT NULL,
  `foto_barang` varchar(120) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `yg_mengajukan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang_lainnya`
--

CREATE TABLE `barang_lainnya` (
  `id_lain` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `jumlah_barang` varchar(20) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `tipe_barang` varchar(60) NOT NULL,
  `tgl_realisasi` date NOT NULL,
  `foto_barang` varchar(120) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `yg_mengajukan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_bk` int(11) NOT NULL,
  `judul_buku` varchar(120) NOT NULL,
  `penerbit` varchar(60) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `jumlah_total` varchar(40) NOT NULL,
  `pinjam_yang_meminjamkan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elektronik`
--

CREATE TABLE `elektronik` (
  `id_elek` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `jumlah_barang` varchar(20) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `tipe_barang` varchar(60) NOT NULL,
  `tgl_realisasi` varchar(255) NOT NULL,
  `foto_barang` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `yg_mengajukan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elektronik`
--

INSERT INTO `elektronik` (`id_elek`, `nama_barang`, `merk`, `spesifikasi`, `jumlah_barang`, `harga_satuan`, `penempatan`, `keterangan`, `tipe_barang`, `tgl_realisasi`, `foto_barang`, `barcode`, `yg_mengajukan`) VALUES
(9, 'Amplop Coklat A4', 'Garda', 'A4', '3 pak', 'Rp 5.000', 'Lemari TU', 'Belum', 'ATK', '2023-01-19', '', '', 'Bartholomeus Yosua Lina');

-- --------------------------------------------------------

--
-- Table structure for table `habis_pakai`
--

CREATE TABLE `habis_pakai` (
  `id_hp` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `jumlah_barang` varchar(20) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `tipe_barang` varchar(60) NOT NULL,
  `tgl_realisasi` date NOT NULL,
  `foto_barang` varchar(120) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `yg_mengajukan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_ipa`
--

CREATE TABLE `lab_ipa` (
  `id_labipa` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `jumlah_barang` varchar(20) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `tipe_barang` varchar(60) NOT NULL,
  `tgl_realisasi` date NOT NULL,
  `foto_barang` varchar(120) NOT NULL,
  `barcode` varchar(120) NOT NULL,
  `yg_mengajukan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_barang`
--

CREATE TABLE `pengajuan_barang` (
  `id_peng` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `jumlah_barang` varchar(20) NOT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `tipe_barang` varchar(255) NOT NULL,
  `yg_mengajukan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_barang`
--

INSERT INTO `pengajuan_barang` (`id_peng`, `nama_barang`, `merk`, `spesifikasi`, `jumlah_barang`, `harga_satuan`, `penempatan`, `tipe_barang`, `yg_mengajukan`) VALUES
(14, 'Speaker portable 12 inc', 'Hardwell Artist 12A', '- 1unit speaker port', '1', '5.000.000', 'Ekskul Paduan Suara', 'Elektronik', 'Maria Titi Hapsari'),
(15, 'wireles  spaeker ONYX 7', 'Harman Kardon Onyx studio 7', 'Transduser:woofer 1x', '1buah', 'Rp 4.499.000,00', 'ekstrakurikuler Tari kreasi', 'Elektronik', 'Margaretha Hermin K'),
(16, 'Bola Futsal', 'Molten', 'Futsal 1500', '5', '450000', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(17, 'Bola Voli', 'Mikasa', 'Super Gold MV 2200', '5', '774900', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(18, 'Bola Basket', 'Spalding', 'Excel TF 500', '5', '1123200', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(19, 'bet tenis meja', 'Stayer 101 Butterfly', 'bet pingpong shakeha', '2', '245.000', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(20, 'bola tenis meja', 'nittaku', 'Nittaku 40 japan', '12', '15.500', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(21, 'pemukul kasti', 'pro champo', 'pemukul kasti bahan ', '2', '30.000', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(22, 'pemukul rounders/baseball', ' SLUGGER ', 'pajang 80 cm', '2', '105.000', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(23, 'bola kasti', 'dunlop fort all court', 'bola karet, bola kec', '20', '4.990', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(24, 'Makey Makey Starter Kit Kickstarter Trainier Electronic Micro', 'Makey Makey', 'Perangkat yang mampu', '8', '350000', 'Laboratorium Komputer', 'Elektronik', 'Arief Setiawan Mukti R.'),
(25, 'Wireless Speaker (Bluetooth Speaker)', 'Harman Kardon Onyx 7', 'Speaker bluetooth po', '10', '3.500.000', 'Ruang kelas 7-9', 'Elektronik', 'Arief Setiawan Mukti R.'),
(26, 'Reagen Benedict ', 'ROFA', 'Grade: Laboratory Re', '2 liter', '55.000/500 ml', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(27, 'Reagen Lugol', 'ROFA', 'Grade: Laboratory Re', '2 Liter', '200.000/ 500 ml', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(28, 'Larutan Glukosa', 'ROFA', 'Grade: Laboratory Re', '2 Liter', '100.000/ liter', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(29, 'Reagen Biuret', 'ROFA', 'Grade: Laboratory Re', '2 Liter', 'Rp.250.000', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(30, 'Alat disectio', 'Gold Cross', 'Diagnostik Set', '3 set', '200.000/ set', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(31, 'Pipet tetes', 'OneMed Tebal ', 'Pipet tetes kaca pan', '1 boks  isi 50 pcs', '300.000/boks', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(32, 'Set Serum Uji Golongan Darah', 'ROFA', 'Blood Type Test Seru', '1 set', '550.000', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(33, 'Drawing Pen', 'Snowman 007', 'drawing pen 0,5', '5 ', 'Rp 11.000', 'Lemari TU', 'ATK', 'Bartholomeus Yosua Lina'),
(34, 'blood lancet (jarum) ', 'Onehealth Blood Lancets ', 'bentuk: jarum', '1 boks isi 100', '50.000/boks', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(35, 'Baterai ', 'Alkalin', '1,5 V', '50 pcs', '15.000/pcs', 'Laboratorium IPA', 'Lab IPA', 'Lamria Tambunan'),
(36, 'Kertas A4', 'Paper One', 'A4 75 gr/m2', '5 dus', 'Rp 50.000', 'Ruang TU', 'ATK', 'Bartholomeus Yosua Lina'),
(37, 'Amplop Coklat A4', 'Garda', 'A4', '3 pak', 'Rp 5.000', 'Lemari TU', 'ATK', 'Bartholomeus Yosua Lina'),
(38, 'Amplop Coklat F4', 'Garda', 'Amplop Coklat F4', '3 pak', 'Rp 5.500', 'Lemari TU', 'ATK', 'Bartholomeus Yosua Lina'),
(39, 'Map Plastik Business File Biru', 'Agatha Felix', 'No. 340H F/C', '8 lusin', 'Rp 5.000', 'Lemari TU', 'ATK', 'Bartholomeus Yosua Lina'),
(40, 'Map Folio Transparan Clear Sleeves', 'Agatha Felix', 'Map L Folio transpar', '24 pak', 'Rp 27.000/pak', 'Lemari TU', 'ATK', 'Bartholomeus Yosua Lina'),
(41, 'Drum Elektrik', 'Yamaha', 'DTX6KX/DTX6-K /DTX 6', '1', 'Rp9.490.000', 'ruang guru', 'Elektronik', 'Gabriel Frans Posenti'),
(42, 'Speaker aktif', 'mobil HARMAN infinity', '6520 alpha original ', '1', 'Rp775.000', 'Meja guru', 'Elektronik', 'Gabriel Frans Posenti'),
(43, 'Buku Tulis HVS Folio', 'Paperline', 'HVS 310x210mm', '3 pak', 'Rp 86.000/pak', 'Lemari TU', 'ATK', 'Bartholomeus Yosua Lina'),
(44, 'Kipas Angin', 'Kris', 'kipas angin Ftc3-m/p', '1', 'Rp 750.000,-', 'Ruang OSIS', 'Elektronik', 'LIMBERTUS UMBER'),
(45, 'Cat', 'sakura koi', 'water color', '1', '445.000', 'Guru seni rupa', 'Lainnya', 'Gabriel Frans Posenti'),
(46, 'Pensil warna', 'Feber castel', 'clasic', '1', '169.000', 'Guru seni rupa', 'ATK', 'Gabriel Frans Posenti'),
(47, 'Buku gambar', 'skets book', 'skets book', '1', '60.000', 'Guru seni rupa', 'ATK', 'Gabriel Frans Posenti'),
(48, 'Plastik Mika Lentur ( Plastik Curtain 0,50Mm )', 'OME', 'Strip Curtain Transp', '1 Roll', 'Rp. 138.000', 'Ruang Perpustakaan', 'ATK', 'Anastasia Rina Puspita'),
(49, 'Kok Badminton / Shuttlecock', 'Samurai Hijau - Gajahmada Bahan', 'Gajahmada Bahan : Bu', '36', '10.000', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(50, 'Kok Badminton / Shuttlecock', 'Samurai Hijau - Gajahmada Bahan', 'Gajahmada Bahan : Bu', '36', '10.000', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi'),
(51, 'Kertas Lebel A4 warna Ornge', 'SiDu', 'Daya resap tinta bag', '3 Pak ', 'Rp. 1.500', 'Ruang Perpustakaan', 'ATK', 'Anastasia Rina Puspita'),
(52, 'Buku ', 'Novel Si Anak Pelangi', 'Tere Liye', '2 Exp', 'Rp. 23.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(53, 'Buku', 'Novel Laskar Dan Jingga ', 'Tresia', '2 Exp', 'Rp. 66.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(54, 'Buku', 'Novel Laskar Pelangi The Rainbow Troops', 'Andrea Hirata', '2 Exp', 'Rp. 107.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(55, 'Buku', 'Sang Pemimpi (Novel yang Menggugah Semangat)', 'Andrea Hirata', '2 Exp ', 'Rp. 89.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(56, 'Buku', 'Edensor', 'Andrea Hirata', '2 Exp', 'Rp. 30.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(57, 'Buku', 'Guru Aini', 'Andrea Hirata', '2 Exp', 'Rp. 77.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(58, 'Buku', 'Orang-Orang Biasa', 'Andrea Hirata', '2 Exp', 'Rp. 77.800', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(59, 'Buku', 'Rantau 1 Muara', 'Andrea Hirata', '2 Exp', 'Rp. 83.300', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(60, 'Buku', 'Negeri 5 Menara-Cover Baru', 'Ahmad Faudi', '2 Exp', 'Rp. 106.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(61, 'Buku', 'Ranah 3 Warna-Cover Baru', 'Ahmad Faudi', '2 Exp', 'Rp. 102.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(62, 'Buku', 'Never Let Me Go by Ishiguro, Kazuo', 'Kazuo Ishiguro', '2 Exp', 'Rp. 59.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(63, 'Buku', 'Buku 100 Tokoh Paling Berpengaruh di Dunia Edisi R', 'Michael H Hart', '2 Exp', 'Rp. 110.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(64, 'Buku', 'Paket Seri Dilan (Milea TTD+Dilan 1&2)', 'Pidi Baqi', '2 Exp', 'Rp. 180.000', 'Ruang Perpustakaan', 'Lainnya', 'Anastasia Rina Puspita'),
(65, 'Speaker aktif ', 'Harman Kardon', 'Onyx 4', '6', '3000000', '6 ruang kelas', 'Elektronik', 'Laurentius Edy Wuryanto'),
(66, 'Handle pintu', 'solid', 'full set', '5', '150000', 'pintu lab komputer, kelas 8C , 3 cadangan', 'Lainnya', 'Laurentius Edy Wuryanto'),
(67, 'Unit CCTV', 'HIKVISION', 'PAKET IP CAMERA 24 K', '1 ', '320025000', '9 kelas, 8 lorong, 7 ruang tambahan', 'Elektronik', 'Laurentius Edy Wuryanto'),
(68, 'Loker besi lemari sekolah', 'CN production', 'Loker besi 12 pintu', '3', '4000000', '3 ruang kelas', 'Lainnya', 'Laurentius Edy Wuryanto'),
(69, 'AC', 'Panasonic', '2 PK', '1', '6100000', 'Lab Komputer', 'Elektronik', 'Laurentius Edy Wuryanto');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kamar_mandi_wc`
--

CREATE TABLE `ruang_kamar_mandi_wc` (
  `id_wc` int(11) NOT NULL,
  `jenis_prasarana` varchar(30) NOT NULL,
  `kode_ruang` varchar(30) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `registrasi_ruang` varchar(50) NOT NULL,
  `Lantai_ke` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `luas_plester` varchar(20) NOT NULL,
  `luas_plafon` varchar(20) NOT NULL,
  `luas_dinding` varchar(20) NOT NULL,
  `luas_daun_jendela` varchar(20) NOT NULL,
  `luas_daun_pintu` varchar(20) NOT NULL,
  `panjang_kusen` varchar(20) NOT NULL,
  `luas_tutup_lantai` varchar(20) NOT NULL,
  `luas_instalasi_listrik` varchar(20) NOT NULL,
  `jml_instalasi_listrik` varchar(20) NOT NULL,
  `panjang_instalasi_air` varchar(20) NOT NULL,
  `jml_instalasi_air` varchar(20) NOT NULL,
  `panjang_drainase` varchar(20) NOT NULL,
  `luas_finish_struktur` varchar(20) NOT NULL,
  `luas_finish_plafon` varchar(20) NOT NULL,
  `luas_finish_dinding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kepsek_guru`
--

CREATE TABLE `ruang_kepsek_guru` (
  `id_kepsek` int(11) NOT NULL,
  `jenis_prasarana` varchar(30) NOT NULL,
  `kode_ruang` varchar(30) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `registrasi_ruang` varchar(50) NOT NULL,
  `Lantai_ke` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `luas_plester` varchar(20) NOT NULL,
  `luas_plafon` varchar(20) NOT NULL,
  `luas_dinding` varchar(20) NOT NULL,
  `luas_daun_jendela` varchar(20) NOT NULL,
  `luas_daun_pintu` varchar(20) NOT NULL,
  `panjang_kusen` varchar(20) NOT NULL,
  `luas_tutup_lantai` varchar(20) NOT NULL,
  `luas_instalasi_listrik` varchar(20) NOT NULL,
  `jml_instalasi_listrik` varchar(20) NOT NULL,
  `panjang_instalasi_air` varchar(20) NOT NULL,
  `jml_instalasi_air` varchar(20) NOT NULL,
  `panjang_drainase` varchar(20) NOT NULL,
  `luas_finish_struktur` varchar(20) NOT NULL,
  `luas_finish_plafon` varchar(20) NOT NULL,
  `luas_finish_dinding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang_kepsek_guru`
--

INSERT INTO `ruang_kepsek_guru` (`id_kepsek`, `jenis_prasarana`, `kode_ruang`, `nama_ruang`, `registrasi_ruang`, `Lantai_ke`, `panjang`, `lebar`, `luas`, `kapasitas`, `luas_plester`, `luas_plafon`, `luas_dinding`, `luas_daun_jendela`, `luas_daun_pintu`, `panjang_kusen`, `luas_tutup_lantai`, `luas_instalasi_listrik`, `jml_instalasi_listrik`, `panjang_instalasi_air`, `jml_instalasi_air`, `panjang_drainase`, `luas_finish_struktur`, `luas_finish_plafon`, `luas_finish_dinding`) VALUES
(1, 'Ruang Kepala Sekolah', '103', 'Kepala Sekolah', 'Kepala Sekolah', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_kls`
--

CREATE TABLE `ruang_kls` (
  `jenis_prasarana` varchar(30) NOT NULL,
  `kode_ruang` varchar(30) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `registrasi_ruang` varchar(50) NOT NULL,
  `Lantai_ke` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `luas_plester` varchar(20) NOT NULL,
  `luas_plafon` varchar(20) NOT NULL,
  `luas_dinding` varchar(20) NOT NULL,
  `luas_daun_jendela` varchar(20) NOT NULL,
  `luas_daun_pintu` varchar(20) NOT NULL,
  `panjang_kusen` varchar(20) NOT NULL,
  `luas_tutup_lantai` varchar(20) NOT NULL,
  `luas_instalasi_listrik` varchar(20) NOT NULL,
  `jml_instalasi_listrik` varchar(20) NOT NULL,
  `panjang_instalasi_air` varchar(20) NOT NULL,
  `jml_instalasi_air` varchar(20) NOT NULL,
  `panjang_drainase` varchar(20) NOT NULL,
  `luas_finish_struktur` varchar(20) NOT NULL,
  `luas_finish_plafon` varchar(20) NOT NULL,
  `luas_finish_dinding` varchar(20) NOT NULL,
  `id_rkel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang_kls`
--

INSERT INTO `ruang_kls` (`jenis_prasarana`, `kode_ruang`, `nama_ruang`, `registrasi_ruang`, `Lantai_ke`, `panjang`, `lebar`, `luas`, `kapasitas`, `luas_plester`, `luas_plafon`, `luas_dinding`, `luas_daun_jendela`, `luas_daun_pintu`, `panjang_kusen`, `luas_tutup_lantai`, `luas_instalasi_listrik`, `jml_instalasi_listrik`, `panjang_instalasi_air`, `jml_instalasi_air`, `panjang_drainase`, `luas_finish_struktur`, `luas_finish_plafon`, `luas_finish_dinding`, `id_rkel`) VALUES
('Ruang Teori/Kelas', '107', 'Ruang Kelas 7A', 'Ruang 7A', '1', '8', '8', '64', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruang_lab`
--

CREATE TABLE `ruang_lab` (
  `id_lab` int(11) NOT NULL,
  `jenis_prasarana` varchar(30) NOT NULL,
  `kode_ruang` varchar(30) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `registrasi_ruang` varchar(50) NOT NULL,
  `Lantai_ke` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `luas_plester` varchar(20) NOT NULL,
  `luas_plafon` varchar(20) NOT NULL,
  `luas_dinding` varchar(20) NOT NULL,
  `luas_daun_jendela` varchar(20) NOT NULL,
  `luas_daun_pintu` varchar(20) NOT NULL,
  `panjang_kusen` varchar(20) NOT NULL,
  `luas_tutup_lantai` varchar(20) NOT NULL,
  `luas_instalasi_listrik` varchar(20) NOT NULL,
  `jml_instalasi_listrik` varchar(20) NOT NULL,
  `panjang_instalasi_air` varchar(20) NOT NULL,
  `jml_instalasi_air` varchar(20) NOT NULL,
  `panjang_drainase` varchar(20) NOT NULL,
  `luas_finish_struktur` varchar(20) NOT NULL,
  `luas_finish_plafon` varchar(20) NOT NULL,
  `luas_finish_dinding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang_penunjang`
--

CREATE TABLE `ruang_penunjang` (
  `id_pnunjng` int(11) NOT NULL,
  `jenis_prasarana` varchar(30) NOT NULL,
  `kode_ruang` varchar(30) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `registrasi_ruang` varchar(50) NOT NULL,
  `Lantai_ke` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `luas_plester` varchar(20) NOT NULL,
  `luas_plafon` varchar(20) NOT NULL,
  `luas_dinding` varchar(20) NOT NULL,
  `luas_daun_jendela` varchar(20) NOT NULL,
  `luas_daun_pintu` varchar(20) NOT NULL,
  `panjang_kusen` varchar(20) NOT NULL,
  `luas_tutup_lantai` varchar(20) NOT NULL,
  `luas_instalasi_listrik` varchar(20) NOT NULL,
  `jml_instalasi_listrik` varchar(20) NOT NULL,
  `panjang_instalasi_air` varchar(20) NOT NULL,
  `jml_instalasi_air` varchar(20) NOT NULL,
  `panjang_drainase` varchar(20) NOT NULL,
  `luas_finish_struktur` varchar(20) NOT NULL,
  `luas_finish_plafon` varchar(20) NOT NULL,
  `luas_finish_dinding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang_perpustakaan`
--

CREATE TABLE `ruang_perpustakaan` (
  `id_perpus` int(11) NOT NULL,
  `jenis_prasarana` varchar(30) NOT NULL,
  `kode_ruang` varchar(30) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `registrasi_ruang` varchar(50) NOT NULL,
  `Lantai_ke` varchar(20) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `luas_plester` varchar(20) NOT NULL,
  `luas_plafon` varchar(20) NOT NULL,
  `luas_dinding` varchar(20) NOT NULL,
  `luas_daun_jendela` varchar(20) NOT NULL,
  `luas_daun_pintu` varchar(20) NOT NULL,
  `panjang_kusen` varchar(20) NOT NULL,
  `luas_tutup_lantai` varchar(20) NOT NULL,
  `luas_instalasi_listrik` varchar(20) NOT NULL,
  `jml_instalasi_listrik` varchar(20) NOT NULL,
  `panjang_instalasi_air` varchar(20) NOT NULL,
  `jml_instalasi_air` varchar(20) NOT NULL,
  `panjang_drainase` varchar(20) NOT NULL,
  `luas_finish_struktur` varchar(20) NOT NULL,
  `luas_finish_plafon` varchar(20) NOT NULL,
  `luas_finish_dinding` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tanah_bangunan`
--

CREATE TABLE `tanah_bangunan` (
  `id_tb` int(11) NOT NULL,
  `jenis_prasarana` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_serti` varchar(25) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `luas` varchar(20) NOT NULL,
  `luas_lahan_tersedia` varchar(20) NOT NULL,
  `kepemilikan` varchar(30) NOT NULL,
  `ket_tanah` varchar(20) NOT NULL,
  `alamat_jln` varchar(80) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `nama_dusun` varchar(60) NOT NULL,
  `kelurahan` varchar(60) NOT NULL,
  `kode_pos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanah_bangunan`
--

INSERT INTO `tanah_bangunan` (`id_tb`, `jenis_prasarana`, `nama`, `no_serti`, `panjang`, `lebar`, `luas`, `luas_lahan_tersedia`, `kepemilikan`, `ket_tanah`, `alamat_jln`, `rt`, `rw`, `nama_dusun`, `kelurahan`, `kode_pos`) VALUES
(1, 'Tanah', 'Tanah Sekolah SMP Katolik Santo Paulus', '09050305310603', '86', '56', '4816', '4816', 'Milik', 'Sertifikat', 'Jl. Danau Agung 13 Blok E9', '3', '3', '', 'Sunter Agung', '14350');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_us` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `photo` varchar(120) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2023-04-18 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_us`, `username`, `password`, `email`, `photo`, `level`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`) VALUES
(1, 'admin', '$2y$10$mFieALHcKjii0yMX0oN8P.t/ZNYpXbiagAaoGoGR85xXZ34xCpz5C', 'admin.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/lnwjzr209mboy5e.jpg', 'Administrator', NULL, NULL, '2023-04-18 00:00:00', NULL),
(2, 'user', '$2y$10$MBg82IZUqFIXLMIsvyx5sen8g/kP/Kt9RBudGEeyHd08GS7rVEmoq', 'user@gmail.com', 'http://localhost/sarprasnew/uploads/files/xeu6pa15rg49sn8.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(3, 'anastasia', '$2y$10$6.zPBj.7LKdkV9v9Qo5h6O7ol43tx6wN3Vq4Az6Q.2DogkVUP9cBS', 'anastasia.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/70sartzkom8hvc_.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(4, 'arief', '$2y$10$gjo76ucavuDepFi2WrUFouFNhf03ink3vben7uaDo5ny16vTWXqu2', 'arief.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/dzhxjs4iayvbgn8.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(5, 'bartholomeus', '$2y$10$PwIgp0Sw6ielFokKRIlL/uYg.iGqpiUrqinF5fk9fesa6HUHL0JAO', 'bartholomeus.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/7ye2flmghp3r541.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(6, 'bonefasius', '$2y$10$iJfU7x/8pvTiNtThNJV.T.O3loKG/eK.iWbJ.qf.FkdKEvOvp0kt2', 'bonefasius.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/ufq75j3zgitxcb8.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(7, 'caroline', '$2y$10$wC1l0pvqg2e5sJzD5P50ZumAn7Q1LWgnwxBptQr/n4UC96s4Z47bW', 'caroline.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/uxwk79dp5ns8ja6.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(8, 'fransiskus', '$2y$10$98kKUx.J9jjn.gwQVPBqSe300VkErI5ReUlI3Pld/DQA6Hc.0ev6K', 'fransiskus.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/4c7f3pkqs1w2hxd.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(9, 'gabriel', '$2y$10$EYoRUayfbZ7hkwGQRkZN8eRc916Wc9L4xasz2AiYeBHwspnGYGJhC', 'gabriel.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/v2048adufxlrpns.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(10, 'iswanta', '$2y$10$1SgzcX/XNcXd2RwhOdLfve1SWQLCmStRjBUrhf1nx3g1DNjbXbqGS', 'iswanta.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/ny0d6c7ih1mwr4x.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(11, 'josua', '$2y$10$4pqwo0CKwjhIH8PXG5RhoeaCtvqPFm.ymXXZSxn8NJeVBNTQVuJvi', 'josua.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/gyk4iqmo9fendpr.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(12, 'lamria', '$2y$10$6ywDXotsd/j4GQR8xoMBBe1bFEmcGVegPIc7eS/dBt2qRzYI17QpW', 'lamria.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/w0gukih698dyet5.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(13, 'laurentius', '$2y$10$mTKroFv2vp5yfEYhDqpl1O0..q0rodIG9sdH8h5n1YEDS89RNiqhe', 'laurentius.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/tmeypas6q1w2gr3.jpg', 'Administrator', NULL, NULL, '2023-04-18 00:00:00', NULL),
(14, 'limbertus', '$2y$10$0epnjQSVxhmd/PjYzqQaq.Is8ycP2rVsz2wF1yJ2l3R8Xgw0EP3We', 'limbertus.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/3vhx749twc_l6rn.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(15, 'margaretha', '$2y$10$7t0N2g9JcSwqk/vBZEOSLu/MRQV/VUTu.eCp783HZdpqIJoVj3VbC', 'margaretha.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/3fgqkivx8zeo7ht.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(16, 'maria', '$2y$10$ShJsnRMqMd4fR2j6ckiFKOZXwa2/isaPEnVB5tPBeNMOJ1UJ91j/W', 'maria.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/a9ikqv1fo47r5sc.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(17, 'kepsek', '$2y$10$.3WjT2qiF5z5fT2OwJRIr.YXpROOrt1/pU//b9Rq6IOBdeSe4hdzi', 'kepsek.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/w0ud6s93ve7iq2p.jpg', 'Administrator', NULL, NULL, '2023-04-18 00:00:00', NULL),
(18, 'theresia', '$2y$10$CtPiAFstcLwKXjNvkHEkIODCbpog.2AWkowEFKpzdQb6SXOKxXzMW', 'theresia.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/te9qhacxp08wj5b.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(19, 'yohanes', '$2y$10$Do1FhWIPKexKgpCsuoKK0e1xxNifhKnRK47gMzJGSEPf70GCHIqYO', 'yohanes.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/b9gvpa8m356un74.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(20, 'yoyu', '$2y$10$jUzIODNbdvTTcGV2e6pJqOq7agwXstz4yVR1sTB4vGzZsOCvxCf7a', 'yoyu.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/2_cmh5k86jfxobu.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(21, 'anung', '$2y$10$YvBMyyVL.Mcur4oM65AtP..AC.795CuNM3XRVPKKEIWgF7ihPCt32', 'anung.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/bei81g2a4630xtz.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(22, 'harto', '$2y$10$dsbhPI7jBu.oQju78ZSsE.0EJLy7vZrUJx5V6NDOE9UC0K44UNaJa', 'harto.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/lhon_js6yd90mtp.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(23, 'deni', '$2y$10$dsdPr.Jx/QGvksHs06MYXuqBUcTorofJ1jpd9Flt9uf25eUmG7Mn.', 'deni.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/g_jh28autdimcr7.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(24, 'mita', '$2y$10$N2MdecWIu54q4RyT9Yp79uifCv2qzNCR9Pn0Q3ibcciNW1TEAMTzW', 'mita.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/h3cfy2nrdvgk1z0.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `angkutan`
--
ALTER TABLE `angkutan`
  ADD PRIMARY KEY (`id_angkut`);

--
-- Indexes for table `app_logs`
--
ALTER TABLE `app_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brng`);

--
-- Indexes for table `barang_atk`
--
ALTER TABLE `barang_atk`
  ADD PRIMARY KEY (`id_batk`);

--
-- Indexes for table `barang_lainnya`
--
ALTER TABLE `barang_lainnya`
  ADD PRIMARY KEY (`id_lain`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indexes for table `elektronik`
--
ALTER TABLE `elektronik`
  ADD PRIMARY KEY (`id_elek`);

--
-- Indexes for table `habis_pakai`
--
ALTER TABLE `habis_pakai`
  ADD PRIMARY KEY (`id_hp`);

--
-- Indexes for table `lab_ipa`
--
ALTER TABLE `lab_ipa`
  ADD PRIMARY KEY (`id_labipa`);

--
-- Indexes for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD PRIMARY KEY (`id_peng`);

--
-- Indexes for table `ruang_kamar_mandi_wc`
--
ALTER TABLE `ruang_kamar_mandi_wc`
  ADD PRIMARY KEY (`id_wc`);

--
-- Indexes for table `ruang_kepsek_guru`
--
ALTER TABLE `ruang_kepsek_guru`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indexes for table `ruang_kls`
--
ALTER TABLE `ruang_kls`
  ADD PRIMARY KEY (`id_rkel`);

--
-- Indexes for table `ruang_lab`
--
ALTER TABLE `ruang_lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `ruang_penunjang`
--
ALTER TABLE `ruang_penunjang`
  ADD PRIMARY KEY (`id_pnunjng`);

--
-- Indexes for table `ruang_perpustakaan`
--
ALTER TABLE `ruang_perpustakaan`
  ADD PRIMARY KEY (`id_perpus`);

--
-- Indexes for table `tanah_bangunan`
--
ALTER TABLE `tanah_bangunan`
  ADD PRIMARY KEY (`id_tb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `angkutan`
--
ALTER TABLE `angkutan`
  MODIFY `id_angkut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_logs`
--
ALTER TABLE `app_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_atk`
--
ALTER TABLE `barang_atk`
  MODIFY `id_batk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elektronik`
--
ALTER TABLE `elektronik`
  MODIFY `id_elek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `habis_pakai`
--
ALTER TABLE `habis_pakai`
  MODIFY `id_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_ipa`
--
ALTER TABLE `lab_ipa`
  MODIFY `id_labipa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  MODIFY `id_peng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `ruang_kamar_mandi_wc`
--
ALTER TABLE `ruang_kamar_mandi_wc`
  MODIFY `id_wc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang_kepsek_guru`
--
ALTER TABLE `ruang_kepsek_guru`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruang_kls`
--
ALTER TABLE `ruang_kls`
  MODIFY `id_rkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruang_lab`
--
ALTER TABLE `ruang_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang_penunjang`
--
ALTER TABLE `ruang_penunjang`
  MODIFY `id_pnunjng` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang_perpustakaan`
--
ALTER TABLE `ruang_perpustakaan`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanah_bangunan`
--
ALTER TABLE `tanah_bangunan`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
