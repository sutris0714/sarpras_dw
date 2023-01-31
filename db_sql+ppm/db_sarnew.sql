-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2023 pada 07.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.29

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
-- Struktur dari tabel `alat`
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
-- Struktur dari tabel `angkutan`
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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_brng`, `nama_barang`, `merk`, `spesifikasi`, `jumlah_barang`, `sumber`, `tgl_beli`, `harga_satuan`, `foto`, `barcode`, `penempatan`) VALUES
(2, 'PC', 'Simbada', '(PC Rakitan) i5 Ram ', '5', 'BOS Reguler thp 2', '2023-01-02', '6.700.000', 'http://localhost/sarprasnew/uploads/files/a4npju278e5fhv9.jpg', 'http://localhost/sarprasnew/uploads/files/604o3kxisy1z_lp.png', 'TU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_atk`
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
-- Struktur dari tabel `barang_lainnya`
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
-- Struktur dari tabel `buku`
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
-- Struktur dari tabel `elektronik`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `habis_pakai`
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
-- Struktur dari tabel `lab_ipa`
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
-- Struktur dari tabel `pengajuan_barang`
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
-- Dumping data untuk tabel `pengajuan_barang`
--

INSERT INTO `pengajuan_barang` (`id_peng`, `nama_barang`, `merk`, `spesifikasi`, `jumlah_barang`, `harga_satuan`, `penempatan`, `tipe_barang`, `yg_mengajukan`) VALUES
(14, 'Speaker portable 12 inc', 'Hardwell Artist 12A', '- 1unit speaker port', '1', '5.000.000', 'Ekskul Paduan Suara', 'Elektronik', 'Maria Titi Hapsari'),
(15, 'wireles  spaeker ONYX 7', 'Harman Kardon Onyx studio 7', 'Transduser:woofer 1x', '1buah', 'Rp 4.499.000,00', 'ekstrakurikuler Tari kreasi', 'Elektronik', 'Margaretha Hermin K'),
(16, 'Bola Futsal', 'Molten', 'Futsal 1500', '5', '450000', 'gudang olah raga', 'Lainnya', 'Yohanes Wakidi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_kamar_mandi_wc`
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
-- Struktur dari tabel `ruang_kepsek_guru`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_kls`
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
-- Dumping data untuk tabel `ruang_kls`
--

INSERT INTO `ruang_kls` (`jenis_prasarana`, `kode_ruang`, `nama_ruang`, `registrasi_ruang`, `Lantai_ke`, `panjang`, `lebar`, `luas`, `kapasitas`, `luas_plester`, `luas_plafon`, `luas_dinding`, `luas_daun_jendela`, `luas_daun_pintu`, `panjang_kusen`, `luas_tutup_lantai`, `luas_instalasi_listrik`, `jml_instalasi_listrik`, `panjang_instalasi_air`, `jml_instalasi_air`, `panjang_drainase`, `luas_finish_struktur`, `luas_finish_plafon`, `luas_finish_dinding`, `id_rkel`) VALUES
('Ruang Teori/Kelas', '107', 'Ruang Kelas 7A', 'Ruang 7A', '1', '8', '8', '64', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_lab`
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
-- Struktur dari tabel `ruang_penunjang`
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
-- Struktur dari tabel `ruang_perpustakaan`
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
-- Struktur dari tabel `tanah_bangunan`
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
-- Dumping data untuk tabel `tanah_bangunan`
--

INSERT INTO `tanah_bangunan` (`id_tb`, `jenis_prasarana`, `nama`, `no_serti`, `panjang`, `lebar`, `luas`, `luas_lahan_tersedia`, `kepemilikan`, `ket_tanah`, `alamat_jln`, `rt`, `rw`, `nama_dusun`, `kelurahan`, `kode_pos`) VALUES
(1, 'Tanah', 'Tanah Sekolah SMP Katolik Santo Paulus', '09050305310603', '86', '56', '4816', '4816', 'Milik', 'Sertifikat', 'Jl. Danau Agung 13 Blok E9', '3', '3', '', 'Sunter Agung', '14350');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_us`, `username`, `password`, `email`, `photo`, `level`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`) VALUES
(1, 'admin', '$2y$10$mFieALHcKjii0yMX0oN8P.t/ZNYpXbiagAaoGoGR85xXZ34xCpz5C', 'admin.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/lnwjzr209mboy5e.jpg', 'Administrator', NULL, NULL, '2023-04-18 00:00:00', NULL),
(2, 'user', '$2y$10$MBg82IZUqFIXLMIsvyx5sen8g/kP/Kt9RBudGEeyHd08GS7rVEmoq', 'user@gmail.com', 'http://localhost/sarprasnew/uploads/files/xeu6pa15rg49sn8.jpg', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(3, 'anastasia', '$2y$10$6.zPBj.7LKdkV9v9Qo5h6O7ol43tx6wN3Vq4Az6Q.2DogkVUP9cBS', 'anastasia.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/0k_abednv5hzslf.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(4, 'arief', '$2y$10$gjo76ucavuDepFi2WrUFouFNhf03ink3vben7uaDo5ny16vTWXqu2', 'arief.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/42rcfliuhvyw_ds.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(5, 'bartholomeus', '$2y$10$PwIgp0Sw6ielFokKRIlL/uYg.iGqpiUrqinF5fk9fesa6HUHL0JAO', 'bartholomeus.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/h18ti9xmpl5jd4b.png', 'Administrator', NULL, NULL, '2023-04-18 00:00:00', NULL),
(6, 'bonefasius', '$2y$10$iJfU7x/8pvTiNtThNJV.T.O3loKG/eK.iWbJ.qf.FkdKEvOvp0kt2', 'bonefasius.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/z704ithlsuk_36r.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(7, 'caroline', '$2y$10$wC1l0pvqg2e5sJzD5P50ZumAn7Q1LWgnwxBptQr/n4UC96s4Z47bW', 'caroline.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/s1y6ukaw0vho84m.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(8, 'fransiskus', '$2y$10$98kKUx.J9jjn.gwQVPBqSe300VkErI5ReUlI3Pld/DQA6Hc.0ev6K', 'fransiskus.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/45hyj29wmr7a8on.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(9, 'gabriel', '$2y$10$EYoRUayfbZ7hkwGQRkZN8eRc916Wc9L4xasz2AiYeBHwspnGYGJhC', 'gabriel.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/5f7ldqa3chezw_9.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(10, 'iswanta', '$2y$10$1SgzcX/XNcXd2RwhOdLfve1SWQLCmStRjBUrhf1nx3g1DNjbXbqGS', 'iswanta.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/oitxkhr0j837wd4.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(11, 'josua', '$2y$10$4pqwo0CKwjhIH8PXG5RhoeaCtvqPFm.ymXXZSxn8NJeVBNTQVuJvi', 'josua.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/2gpajnix3y068r7.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(12, 'lamria', '$2y$10$6ywDXotsd/j4GQR8xoMBBe1bFEmcGVegPIc7eS/dBt2qRzYI17QpW', 'lamria.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/9n7wlrtv2g4cfmy.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(13, 'laurentius', '$2y$10$mTKroFv2vp5yfEYhDqpl1O0..q0rodIG9sdH8h5n1YEDS89RNiqhe', 'laurentius.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/wzphktqs6oi7c5u.png', 'Administrator', NULL, NULL, '2023-04-18 00:00:00', NULL),
(14, 'limbertus', '$2y$10$0epnjQSVxhmd/PjYzqQaq.Is8ycP2rVsz2wF1yJ2l3R8Xgw0EP3We', 'limbertus.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/jw852ub4eo0ix79.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(15, 'margaretha', '$2y$10$7t0N2g9JcSwqk/vBZEOSLu/MRQV/VUTu.eCp783HZdpqIJoVj3VbC', 'margaretha.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/sgxm1a_ocdhk48i.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(16, 'maria', '$2y$10$ShJsnRMqMd4fR2j6ckiFKOZXwa2/isaPEnVB5tPBeNMOJ1UJ91j/W', 'maria.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/fs3xarleijcqpw2.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(17, 'kepsek', '$2y$10$.3WjT2qiF5z5fT2OwJRIr.YXpROOrt1/pU//b9Rq6IOBdeSe4hdzi', 'kepsek.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/oyakhpg8quw91c_.png', 'Administrator', NULL, NULL, '2023-04-18 00:00:00', NULL),
(18, 'theresia', '$2y$10$CtPiAFstcLwKXjNvkHEkIODCbpog.2AWkowEFKpzdQb6SXOKxXzMW', 'theresia.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/r63yep0b_2947c1.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(19, 'yohanes', '$2y$10$Do1FhWIPKexKgpCsuoKK0e1xxNifhKnRK47gMzJGSEPf70GCHIqYO', 'yohanes.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/z8_jmkf0v1aywpn.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(20, 'yoyu', '$2y$10$jUzIODNbdvTTcGV2e6pJqOq7agwXstz4yVR1sTB4vGzZsOCvxCf7a', 'yoyu.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/4261ymc0ouansf5.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(21, 'anung', '$2y$10$YvBMyyVL.Mcur4oM65AtP..AC.795CuNM3XRVPKKEIWgF7ihPCt32', 'anung.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/bei81g2a4630xtz.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(22, 'harto', '$2y$10$dsbhPI7jBu.oQju78ZSsE.0EJLy7vZrUJx5V6NDOE9UC0K44UNaJa', 'harto.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/lhon_js6yd90mtp.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(23, 'deni', '$2y$10$dsdPr.Jx/QGvksHs06MYXuqBUcTorofJ1jpd9Flt9uf25eUmG7Mn.', 'deni.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/g_jh28autdimcr7.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL),
(24, 'mita', '$2y$10$N2MdecWIu54q4RyT9Yp79uifCv2qzNCR9Pn0Q3ibcciNW1TEAMTzW', 'mita.saintpaul@gmail.com', 'http://localhost/sarprasnew/uploads/files/76xvftcdwo_mqyb.png', 'User', NULL, NULL, '2023-04-18 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `angkutan`
--
ALTER TABLE `angkutan`
  ADD PRIMARY KEY (`id_angkut`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brng`);

--
-- Indeks untuk tabel `barang_atk`
--
ALTER TABLE `barang_atk`
  ADD PRIMARY KEY (`id_batk`);

--
-- Indeks untuk tabel `barang_lainnya`
--
ALTER TABLE `barang_lainnya`
  ADD PRIMARY KEY (`id_lain`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indeks untuk tabel `elektronik`
--
ALTER TABLE `elektronik`
  ADD PRIMARY KEY (`id_elek`);

--
-- Indeks untuk tabel `habis_pakai`
--
ALTER TABLE `habis_pakai`
  ADD PRIMARY KEY (`id_hp`);

--
-- Indeks untuk tabel `lab_ipa`
--
ALTER TABLE `lab_ipa`
  ADD PRIMARY KEY (`id_labipa`);

--
-- Indeks untuk tabel `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD PRIMARY KEY (`id_peng`);

--
-- Indeks untuk tabel `ruang_kamar_mandi_wc`
--
ALTER TABLE `ruang_kamar_mandi_wc`
  ADD PRIMARY KEY (`id_wc`);

--
-- Indeks untuk tabel `ruang_kepsek_guru`
--
ALTER TABLE `ruang_kepsek_guru`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indeks untuk tabel `ruang_kls`
--
ALTER TABLE `ruang_kls`
  ADD PRIMARY KEY (`id_rkel`);

--
-- Indeks untuk tabel `ruang_lab`
--
ALTER TABLE `ruang_lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indeks untuk tabel `ruang_penunjang`
--
ALTER TABLE `ruang_penunjang`
  ADD PRIMARY KEY (`id_pnunjng`);

--
-- Indeks untuk tabel `ruang_perpustakaan`
--
ALTER TABLE `ruang_perpustakaan`
  ADD PRIMARY KEY (`id_perpus`);

--
-- Indeks untuk tabel `tanah_bangunan`
--
ALTER TABLE `tanah_bangunan`
  ADD PRIMARY KEY (`id_tb`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `angkutan`
--
ALTER TABLE `angkutan`
  MODIFY `id_angkut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang_atk`
--
ALTER TABLE `barang_atk`
  MODIFY `id_batk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `elektronik`
--
ALTER TABLE `elektronik`
  MODIFY `id_elek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `habis_pakai`
--
ALTER TABLE `habis_pakai`
  MODIFY `id_hp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lab_ipa`
--
ALTER TABLE `lab_ipa`
  MODIFY `id_labipa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  MODIFY `id_peng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ruang_kamar_mandi_wc`
--
ALTER TABLE `ruang_kamar_mandi_wc`
  MODIFY `id_wc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruang_kepsek_guru`
--
ALTER TABLE `ruang_kepsek_guru`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruang_kls`
--
ALTER TABLE `ruang_kls`
  MODIFY `id_rkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ruang_lab`
--
ALTER TABLE `ruang_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruang_penunjang`
--
ALTER TABLE `ruang_penunjang`
  MODIFY `id_pnunjng` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruang_perpustakaan`
--
ALTER TABLE `ruang_perpustakaan`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tanah_bangunan`
--
ALTER TABLE `tanah_bangunan`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
