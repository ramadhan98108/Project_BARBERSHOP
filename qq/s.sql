-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Sep 2018 pada 07.50
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `id_lokasi` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `stok`, `harga_beli`, `id_lokasi`, `date_added`) VALUES
(36, 'Gunting Potong Calysta 7', 1, 4, '20000', '2', '2018-09-13 16:12:51'),
(37, 'Gunting Sasak Calysta 5.5', 1, 2, '10000', '2', '2018-09-13 16:13:04'),
(38, 'Sisir Ganggang Creative Art 600A', 1, 2, '6000', '2', '2018-09-13 16:12:51'),
(39, 'Sisir Creative Art 0409', 1, 2, '5000', '1', '2018-08-13 08:36:53'),
(40, 'Kuas Sabun Kecil', 1, 2, '6000', '1', '2018-08-16 12:25:04'),
(41, 'Jepit Bebek', 1, 4, '3000', '1', '2018-08-13 08:39:38'),
(42, 'Bedak ', 1, 2, '10000', '1', '2018-08-13 08:40:17'),
(43, 'Botol Spray', 1, 2, '2000', '1', '2018-08-13 08:41:26'),
(44, 'Jepitan Jemuran', 1, 2, '3000', '1', '2018-08-13 08:42:08'),
(45, 'Kep Polos', 1, 4, '10000', '1', '2018-08-13 08:43:01'),
(46, 'Handuk Cotton', 2, 15, '20000', '1', '2018-08-13 08:43:44'),
(47, 'Botol Shampo ', 2, 2, '15000', '1', '2018-08-13 08:44:56'),
(48, 'Botol Minyak Rambut', 1, 4, '20000', '1', '2018-08-13 08:47:05'),
(49, 'Razor/Pisau Lipat Isi Ulang', 1, 3, '10000', '1', '2018-08-13 08:47:49'),
(50, 'Silet Treet Platinum', 1, 10, '10000', '1', '2018-08-13 08:51:08'),
(51, 'Mesin Cukur', 1, 4, '50000', '1', '2018-08-13 08:51:52'),
(52, 'Minyak Pelumas Mesin Potong', 1, 1, '15000', '1', '2018-08-13 08:52:17'),
(53, 'Sepatu  Sisir 4"', 1, 2, '5000', '1', '2018-08-13 08:52:43'),
(54, 'Sepatu Sisir 6"', 1, 2, '5000', '1', '2018-08-13 08:53:11'),
(55, 'Sisir Bulat/Keramas', 1, 2, '10000', '1', '2018-08-13 08:53:48'),
(56, 'Cermin Muka', 1, 3, '10000', '1', '2018-08-13 08:54:37'),
(57, 'Gunting Potong Calysta 7" Supercut', 1, 2, '20000', '2', '2018-08-13 08:57:36'),
(58, 'Gunting Sasak Calysta 5.5" supecut', 1, 2, '10000', '2', '2018-08-13 08:58:12'),
(59, 'Sisir Ganggang Creative Art 600A', 1, 2, '5000', '2', '2018-08-13 08:59:13'),
(60, 'Sisir Creative Art 0409', 1, 2, '5000', '2', '2018-08-13 09:00:05'),
(61, 'Kuas Sabun Kecil', 1, 2, '6000', '2', '2018-08-13 09:00:30'),
(62, 'Jepit Bebek', 1, 2, '3000', '2', '2018-08-13 09:00:52'),
(63, 'Bedak ', 1, 2, '10000', '2', '2018-08-13 09:01:19'),
(64, 'Botol Spray', 1, 2, '2000', '2', '2018-08-13 09:01:40'),
(65, 'Jepitan Jemuran', 1, 2, '3000', '2', '2018-08-13 09:02:21'),
(66, 'Kep Polos', 1, 4, '10000', '2', '2018-08-13 09:02:43'),
(67, 'Handuk Cotton', 2, 15, '20000', '2', '2018-08-13 09:03:10'),
(68, 'Botol Shampo ', 2, 2, '15000', '2', '2018-08-13 09:03:37'),
(69, 'Botol Minyak Rambut', 1, 2, '20000', '2', '2018-08-13 09:04:17'),
(70, 'Razor/Pisau Lipat Isi Ulang', 1, 2, '10000', '2', '2018-08-13 09:04:53'),
(71, 'Silet Treet Platinum', 1, 10, '10000', '2', '2018-08-13 09:05:14'),
(72, 'Mesin Cukur', 1, 2, '50000', '2', '2018-08-13 09:05:37'),
(73, 'Minyak Pelumas Mesin Potong', 1, 2, '15000', '2', '2018-08-13 09:06:04'),
(74, 'Sepatu  Sisir 4"', 1, 2, '5000', '2', '2018-08-13 09:06:37'),
(75, 'Sepatu Sisir 6"', 1, 2, '5000', '2', '2018-08-13 09:07:08'),
(76, 'Sisir Bulat/Keramas', 2, 2, '10000', '2', '2018-08-13 09:07:40'),
(77, 'Cermin Muka', 1, 2, '10000', '2', '2018-08-13 09:08:07'),
(78, 'Bantal', 1, 2, '20000', '1', '2018-08-13 14:54:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'ALAT CUKUR'),
(2, 'ALAT BILAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `status` int(11) NOT NULL,
  `keterangan` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`status`, `keterangan`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `alamat`) VALUES
(1, 'solo'),
(2, 'boyolali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `harga_jual` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `keterangan`, `harga_jual`) VALUES
(6, 'Biasa', 'Cukur Biasa', '15000'),
(7, 'Premium', 'Cukur,Styling Pomade,Cuci Rambut,Pijat Kepala', '20000'),
(8, 'Anak Biasa', 'Cukur Biasa', '10000'),
(9, 'Anak Premium', 'Cukur,Styling Pomade,Cuci Rambut,Pijat Kepala', '12000'),
(10, 'Ayah dan Anak', 'Full Servis', '30000'),
(11, 'Styling Pomade', 'Styling Pomade', '5000'),
(12, 'Cuci Rambut', 'Cuci Rambut', '5000'),
(14, 'Colouring/Semir', 'Colouring/Semir', '30000'),
(15, 'Pijat', 'pijat', '2000'),
(16, 'cukur jenggot', 'cukur jenggot', '5000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_transaksi`
--

CREATE TABLE IF NOT EXISTS `sub_transaksi` (
  `id_subtransaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `no_invoice` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_transaksi`
--

INSERT INTO `sub_transaksi` (`id_subtransaksi`, `id_paket`, `id_transaksi`, `jumlah_beli`, `total_harga`, `no_invoice`) VALUES
(17, 8, 14, 1, '450000', '15/AF/2/18/02/18/21'),
(18, 6, 14, 2, '460000', '15/AF/2/18/02/18/21'),
(19, 6, 15, 2, '460000', '15/AF/4/18/07/57/25'),
(20, 8, 15, 1, '450000', '15/AF/4/18/07/57/25'),
(21, 9, 0, 2, '240000', '17/AF/7/18/08/31/49'),
(22, 10, 0, 2, '300000', '17/AF/7/18/08/33/29'),
(23, 10, 16, 2, '300000', '17/AF/9/18/08/36/59'),
(24, 8, 17, 2, '900000', '17/AF/9/18/08/37/21'),
(25, 7, 18, 1, '140000', '17/AF/9/18/08/43/55'),
(26, 9, 19, 2, '240000', '17/AF/7/18/08/45/25'),
(27, 12, 19, 2, '2800000', '17/AF/7/18/08/45/25'),
(28, 7, 19, 1, '140000', '17/AF/7/18/08/45/25'),
(29, 8, 20, 2, '900000', '17/AF/8/18/08/49/42'),
(30, 9, 21, 2, '240000', '17/AF/7/18/08/52/17'),
(31, 9, 22, 2, '240000', '17/AF/7/18/08/54/18'),
(32, 9, 23, 2, '240000', '17/AF/7/18/09/18/08'),
(33, 9, 24, 2, '240000', '17/AF/9/18/09/22/38'),
(34, 9, 25, 2, '240000', '17/AF/9/18/09/23/21'),
(35, 12, 26, 2, '10000', '17/AF/7/18/09/30/11'),
(36, 14, 27, 1, '30000', '17/AF/9/18/09/31/48'),
(37, 8, 28, 2, '20000', '17/AF/9/18/09/32/34'),
(38, 12, 29, 1, '5000', '18/AF/7/18/02/58/59'),
(39, 9, 30, 2, '24000', '18/AF/9/18/03/00/04'),
(40, 9, 31, 2, '24000', '18/AF/7/18/03/03/49'),
(41, 12, 32, 2, '10000', '18/AF/9/18/03/04/30'),
(42, 9, 33, 2, '24000', '18/AF/8/18/03/09/38'),
(43, 8, 34, 2, '20000', '18/AF/9/18/03/15/31'),
(44, 8, 35, 2, '20000', '18/AF/8/18/03/24/24'),
(45, 7, 36, 2, '40000', '18/AF/7/18/03/42/04'),
(46, 7, 37, 1, '20000', '18/AF/7/18/03/42/35'),
(47, 7, 38, 2, '40000', '18/AF/9/18/03/43/37'),
(48, 7, 39, 1, '20000', '18/AF/8/18/03/46/00'),
(49, 15, 39, 1, '2000', '18/AF/8/18/03/46/00'),
(50, 14, 39, 1, '30000', '18/AF/8/18/03/46/00'),
(51, 7, 40, 1, '20000', '18/AF/9/18/03/52/25'),
(52, 7, 41, 1, '20000', '18/AF/7/18/03/56/53'),
(53, 7, 42, 1, '20000', '18/AF/7/18/04/13/34'),
(54, 7, 43, 2, '40000', '18/AF/7/18/04/19/35'),
(55, 7, 44, 1, '20000', '18/AF/9/18/04/24/15'),
(56, 7, 45, 2, '40000', '18/AF/7/18/04/26/22'),
(57, 15, 45, 2, '4000', '18/AF/7/18/04/26/22'),
(58, 7, 46, 1, '20000', '18/AF/8/18/04/55/14'),
(59, 7, 47, 2, '40000', '18/AF/7/18/04/59/53'),
(60, 15, 47, 1, '2000', '18/AF/7/18/04/59/53'),
(61, 7, 48, 1, '20000', '18/AF/7/18/05/03/38'),
(62, 7, 49, 2, '40000', '18/AF/7/18/05/11/15'),
(63, 7, 50, 2, '40000', '18/AF/7/18/05/33/17'),
(64, 7, 51, 2, '40000', '18/AF/9/18/05/33/46'),
(65, 7, 52, 2, '40000', '18/AF/8/18/05/55/07'),
(66, 7, 53, 2, '40000', '18/AF/8/18/06/04/39'),
(67, 14, 54, 1, '30000', '18/AF/8/18/06/04/59'),
(68, 7, 55, 1, '20000', '18/AF/7/18/06/15/20'),
(69, 7, 56, 2, '40000', '20/AF/7/18/05/02/03'),
(70, 14, 56, 2, '60000', '20/AF/7/18/05/02/03'),
(71, 15, 56, 1, '2000', '20/AF/7/18/05/02/03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempo`
--

CREATE TABLE IF NOT EXISTS `tempo` (
  `id_subtransaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `trx` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempo`
--

INSERT INTO `tempo` (`id_subtransaksi`, `id_paket`, `jumlah_beli`, `total_harga`, `trx`) VALUES
(8, 10, 33, '990000', '17/AF/10/1'),
(9, 6, 33, '495000', '17/AF/10/1'),
(10, 11, 22, '110000', '17/AF/10/1'),
(18, 8, 19, '190000', '18/AF/14/1'),
(19, 9, 13, '156000', '18/AF/14/1'),
(20, 12, 10, '50000', '18/AF/14/1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode_kasir` int(11) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `kode_kasir`, `total_bayar`, `no_invoice`, `id`, `id_lokasi`) VALUES
(14, '2018-01-15 01:18:21', 2, '910000', '15/AF/2/18/02/18/21', 'athoul muwafiq', 0),
(15, '2018-01-15 06:57:25', 4, '910000', '15/AF/4/18/07/57/25', 'afiq', 0),
(16, '2018-09-17 18:36:59', 9, '300000', '17/AF/9/18/08/36/59', 'eka', 0),
(17, '2018-09-17 18:37:21', 9, '900000', '17/AF/9/18/08/37/21', 'dian', 0),
(18, '2018-09-17 18:43:55', 9, '140000', '17/AF/9/18/08/43/55', '8', 0),
(19, '2018-09-17 18:45:25', 7, '3180000', '17/AF/7/18/08/45/25', '10', 0),
(20, '2018-09-17 18:49:42', 8, '900000', '17/AF/8/18/08/49/42', '8', 0),
(21, '2018-09-17 18:52:17', 7, '240000', '17/AF/7/18/08/52/17', '11', 0),
(22, '2018-09-17 18:54:18', 7, '240000', '17/AF/7/18/08/54/18', '11', 1),
(23, '2018-09-17 19:18:08', 7, '240000', '17/AF/7/18/09/18/08', '11', 1),
(24, '2018-09-17 19:22:38', 9, '240000', '17/AF/9/18/09/22/38', '13', 2),
(25, '2018-09-17 19:23:21', 9, '240000', '17/AF/9/18/09/23/21', '13', 2),
(26, '2018-09-17 11:00:00', 7, '10000', '17/AF/7/18/09/30/11', '11', 1),
(27, '2018-09-17 11:00:00', 9, '30000', '17/AF/9/18/09/31/48', '13', 2),
(28, '2018-09-17 11:00:00', 9, '20000', '17/AF/9/18/09/32/34', '13', 2),
(29, '2018-09-17 11:00:00', 7, '5000', '18/AF/7/18/02/58/59', '11', 1),
(30, '2018-09-17 11:00:00', 9, '24000', '18/AF/9/18/03/00/04', '13', 2),
(31, '2018-09-17 11:00:00', 7, '24000', '18/AF/7/18/03/03/49', '11', 1),
(32, '2018-09-17 11:00:00', 9, '10000', '18/AF/9/18/03/04/30', '13', 2),
(33, '2018-09-17 11:00:00', 8, '24000', '18/AF/8/18/03/09/38', '13', 2),
(34, '2018-09-17 11:00:00', 9, '20000', '18/AF/9/18/03/15/31', '13', 2),
(35, '2018-09-17 11:00:00', 8, '20000', '18/AF/8/18/03/24/24', '13', 2),
(36, '2018-09-17 11:00:00', 7, '40000', '18/AF/7/18/03/42/04', '11', 1),
(37, '2018-09-17 11:00:00', 7, '20000', '18/AF/7/18/03/42/35', '12', 1),
(38, '2018-09-17 11:00:00', 9, '40000', '18/AF/9/18/03/43/37', '13', 2),
(39, '2018-09-17 11:00:00', 8, '52000', '18/AF/8/18/03/46/00', '13', 2),
(40, '2018-09-17 11:00:00', 9, '20000', '18/AF/9/18/03/52/25', '13', 2),
(41, '2018-09-17 11:00:00', 7, '20000', '18/AF/7/18/03/56/53', '12', 1),
(42, '2018-09-17 11:00:00', 7, '20000', '18/AF/7/18/04/13/34', '11', 1),
(43, '2018-09-17 11:00:00', 7, '40000', '18/AF/7/18/04/19/35', '12', 1),
(44, '2018-09-17 11:00:00', 9, '20000', '18/AF/9/18/04/24/15', '13', 2),
(45, '2018-09-17 11:00:00', 7, '44000', '18/AF/7/18/04/26/22', '12', 1),
(46, '2018-09-17 11:00:00', 8, '20000', '18/AF/8/18/04/55/14', '13', 2),
(47, '2018-09-17 11:00:00', 7, '42000', '18/AF/7/18/04/59/53', '12', 1),
(48, '2018-09-17 11:00:00', 7, '20000', '18/AF/7/18/05/03/38', '12', 1),
(49, '2018-09-17 11:00:00', 7, '40000', '18/AF/7/18/05/11/15', '12', 1),
(50, '2018-09-17 11:00:00', 7, '40000', '18/AF/7/18/05/33/17', '12', 1),
(51, '2018-09-17 11:00:00', 9, '40000', '18/AF/9/18/05/33/46', '13', 2),
(52, '2018-09-17 11:00:00', 8, '40000', '18/AF/8/18/05/55/07', '13', 2),
(53, '2018-09-17 11:00:00', 8, '40000', '18/AF/8/18/06/04/39', '13', 2),
(54, '2018-09-17 11:00:00', 8, '30000', '18/AF/8/18/06/04/59', '13', 2),
(55, '2018-09-17 11:00:00', 7, '20000', '18/AF/7/18/06/15/20', '12', 1),
(56, '2018-09-19 17:00:00', 7, '102000', '20/AF/7/18/05/02/03', '12', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_lokasi` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `date_created`, `id_lokasi`, `nama`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2018-09-18 02:52:36', 1, 'admin'),
(6, 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 1, '2018-09-17 18:48:57', 2, 'admin2'),
(7, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 2, '2018-09-17 18:25:29', 1, 'kasir'),
(8, 'kasir2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 2, '2018-09-17 18:49:10', 2, 'kasir2'),
(9, 'kasir3', 'dd4fab4a0925326b97aeb5435b0016b1f4ad9863', 2, '2018-09-17 19:20:15', 2, 'kasir3'),
(10, 'kasir4', '5db85626fdf0bbfafe45e77eeba3efdd26c8985b', 2, '2018-09-17 18:37:51', 1, 'kasir4'),
(11, 'pemotong1', 'bf2a421ca054b96feabafc16ef8ce2252ffbbb39', 2, '2018-09-17 18:46:10', 1, 'pemotong1'),
(12, 'pemotong2', '1065e57b8528b6eb74784b50babab3f740bf3c37', 2, '2018-09-17 18:46:24', 1, 'pemotong2'),
(13, 'pemotong3', '589b0a4017026c84fb73f06335571e6ca9d4f89f', 2, '2018-09-17 19:00:32', 2, 'pemotong3'),
(15, 'pemotong4', 'b9b8e67d2738ba269c113d05ab5145eed5536283', 2, '2018-09-18 01:51:48', 2, 'pemotong4'),
(16, 'admin3', '33aab3c7f01620cade108f488cfd285c0e62c1ec', 1, '2018-09-18 02:26:40', 1, 'admin3'),
(17, 'owner', '579233b2c479241523cba5e3af55d0f50f2d6414', 3, '2018-09-18 02:56:19', 0, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `sub_transaksi`
--
ALTER TABLE `sub_transaksi`
  ADD PRIMARY KEY (`id_subtransaksi`);

--
-- Indexes for table `tempo`
--
ALTER TABLE `tempo`
  ADD PRIMARY KEY (`id_subtransaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sub_transaksi`
--
ALTER TABLE `sub_transaksi`
  MODIFY `id_subtransaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tempo`
--
ALTER TABLE `tempo`
  MODIFY `id_subtransaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
