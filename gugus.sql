-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13 Des 2019 pada 09.40
-- Versi Server: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gugus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `id_akun` varchar(255) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `total_stock` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `id_akun`, `nama_akun`, `perusahaan`, `total_stock`, `created_at`, `updated_at`) VALUES
(17, '00000001', 'Celana Pendek', 'Grap - Store', 4, '2019-12-11 21:43:44', '2019-12-12 04:43:44'),
(18, '00000002', 'Celana Panjang', 'Grap - Store', 7, '2019-12-11 21:44:00', '2019-12-12 04:44:00'),
(19, '00000003', 'Celana Jeans', 'Grap - Store', 0, '2019-12-11 21:44:16', '2019-12-12 04:44:16'),
(20, '00000004', 'Rok Panjang', 'Grap - Store', 0, '2019-12-11 21:44:25', '2019-12-12 04:44:25'),
(21, '00000005', 'Jilbab', 'Grap - Store', 0, '2019-12-11 21:44:34', '2019-12-12 04:44:34'),
(22, '00000006', 'Hem Pria', 'Grap - Store', 0, '2019-12-11 21:44:42', '2019-12-12 04:44:42'),
(23, '00000007', 'Hem Wanita', 'Grap - Store', 0, '2019-12-11 21:44:50', '2019-12-12 04:44:50'),
(24, '00000008', 'Kaos Lengan Pendek', 'Grap - Store', 0, '2019-12-11 21:45:05', '2019-12-12 04:45:05'),
(25, '00000009', 'Kaos Lengan Panjang', 'Grap - Store', 0, '2019-12-11 21:45:17', '2019-12-12 04:45:17'),
(26, '00000010', 'Topi Base Ball', 'Grap - Store', 0, '2019-12-11 21:45:34', '2019-12-12 04:45:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pesanan`
--

INSERT INTO `data_pesanan` (`id`, `id_pesanan`, `id_barang`, `banyak_barang`, `perusahaan`, `created_at`, `updated_at`) VALUES
(1, '0000001', '00000001', 3, 'Grap - Store', '2019-12-12 15:50:28', '2019-12-12 22:50:28'),
(2, '0000001', '00000002', 2, 'Grap - Store', '2019-12-12 15:50:38', '2019-12-12 22:50:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `id_transaksi`, `id_barang`, `banyak_barang`, `perusahaan`, `created_at`, `updated_at`) VALUES
(1, '00000001', '00000001', 2, 'Grap - Store', '2019-12-12 15:48:36', '2019-12-12 22:48:36'),
(2, '00000001', '00000002', 1, 'Grap - Store', '2019-12-12 15:48:45', '2019-12-12 22:48:45'),
(3, '00000001', '00000001', 1, 'Grap - Store', '2019-12-12 15:52:50', '2019-12-12 22:52:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_jual`
--

CREATE TABLE `harga_jual` (
  `id` int(20) NOT NULL,
  `id_barang` int(255) NOT NULL,
  `harga_per_satuan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `perusahaan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `harga_jual`
--

INSERT INTO `harga_jual` (`id`, `id_barang`, `harga_per_satuan`, `perusahaan`, `created_at`, `updated_at`) VALUES
(6, 1, 'Rp 30.000', 'Grap - Store', '2019-12-11 23:15:27', '2019-12-11 23:18:01'),
(7, 2, 'Rp 45.000', 'Grap - Store', '2019-12-12 15:48:15', '2019-12-12 22:48:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(20) NOT NULL,
  `id_pesanan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nama_pemesan` varchar(255) CHARACTER SET latin1 NOT NULL,
  `alamat_pemesan` text CHARACTER SET latin1 NOT NULL,
  `tanggal_diambil` date DEFAULT NULL,
  `lunas_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `perusahaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_pesanan`, `nama_pemesan`, `alamat_pemesan`, `tanggal_diambil`, `lunas_tanggal`, `perusahaan`, `created_at`, `updated_at`) VALUES
(1, '0000001', 'Gugus', 'jl katu', '2019-12-20', '2019-12-12 22:50:18', 'Grap - Store', '2019-12-12 15:50:18', '2019-12-12 16:48:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_barang`
--

CREATE TABLE `stock_barang` (
  `id` bigint(20) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `harga_satuan` varchar(255) NOT NULL,
  `total_barang` int(255) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock_barang`
--

INSERT INTO `stock_barang` (`id`, `id_barang`, `harga_barang`, `harga_satuan`, `total_barang`, `tanggal_beli`, `perusahaan`, `created_at`, `updated_at`) VALUES
(14, '00000001', 'Rp 200.000', 'Rp 20.000', 10, '2019-09-09', 'Grap - Store', '2019-12-11 23:04:04', '2019-12-12 06:04:04'),
(15, '00000002', 'Rp 300.000', 'Rp 30.000', 10, '2019-11-10', 'Grap - Store', '2019-12-12 15:47:00', '2019-12-12 22:47:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko_akun`
--

CREATE TABLE `toko_akun` (
  `id` int(11) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `tanggal_input` varchar(20) NOT NULL,
  `tanggal_update` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko_akun`
--

INSERT INTO `toko_akun` (`id`, `nama_akun`, `tanggal_input`, `tanggal_update`) VALUES
(3, 'Printer', '2019-11-22 07:41:58', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_transaksi`, `perusahaan`, `created_at`, `updated_at`) VALUES
(1, '00000001', 'Grap - Store', '2019-12-12 15:48:27', '2019-12-12 17:11:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usertoko`
--

CREATE TABLE `usertoko` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `nama_perusahaan` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `usertoko`
--

INSERT INTO `usertoko` (`id`, `username`, `password`, `nama_perusahaan`, `created_at`, `updated_at`) VALUES
(1, 'Gugus', '$2y$10$h5Tu4Pfh0UJzvo3tB/KzP.3M8eH5Unc6u.OFRylHGe.02wU4lkjAa', 'Grap - Store', '2019-12-07 04:53:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko_akun`
--
ALTER TABLE `toko_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertoko`
--
ALTER TABLE `usertoko`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `harga_jual`
--
ALTER TABLE `harga_jual`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usertoko`
--
ALTER TABLE `usertoko`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
