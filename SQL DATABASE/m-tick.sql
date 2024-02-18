-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m-tick`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-02-16-022038', 'App\\Database\\Migrations\\UserTable', 'default', 'App', 1708052144, 1),
(2, '2024-02-16-023958', 'App\\Database\\Migrations\\CreateBiodataTable', 'default', 'App', 1708052144, 1),
(3, '2024-02-16-023959', 'App\\Database\\Migrations\\TiketTable', 'default', 'App', 1708052145, 1),
(4, '2024-02-16-024011', 'App\\Database\\Migrations\\PemesananTable', 'default', 'App', 1708052144, 1),
(7, '2024-02-16-024028', 'App\\Database\\Migrations\\TransaksiTable', 'default', 'App', 1708155182, 2),
(8, '2024-02-18-135826', 'App\\Database\\Migrations\\CreateOtpTable', 'default', 'App', 1708266621, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_biodata`
--

CREATE TABLE `t_biodata` (
  `id_biodata` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nomor_ktp` varchar(20) NOT NULL,
  `foto_ktp` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `t_biodata`
--

INSERT INTO `t_biodata` (`id_biodata`, `user_id`, `no_telepon`, `nama_lengkap`, `tanggal_lahir`, `alamat`, `nomor_ktp`, `foto_ktp`, `created_at`) VALUES
(11, 6, '08989889898', 'Moch Syarif Hidayat', '1999-12-12', 'Jl Diponegoro Kp Baru Kelurahan Kesenden Kecamatn Kejaksan Kota Cirebon 45121', '32323232323232323', '1708097476_7bed9b4a0ae1aaa1a3ec.png', '2024-02-16 22:31:16'),
(12, 7, '089888773674', 'Ahmad Rizky', '2000-02-12', 'Bogor', '327401130600023', '1708097509_b7602799d3934f1488d6.png', '2024-02-16 22:31:49'),
(13, 8, '08982828733', 'Alvi Ridho', '2000-06-12', 'Testing', '327401130600023', '1708098090_47023f42369db644216d.png', '2024-02-16 22:41:30'),
(14, 9, '08988889898', 'Web Crafser', '2000-12-12', 'Cirebon', '327401130600023', '1708109238_1797bc08931964f6cc0e.png', '2024-02-17 01:47:18'),
(15, 10, '08989889898', 'Mosyahizuku', '1999-12-12', 'Tasikmalaya', '32323232323232323', '1708109275_a596c786a48b0282987d.png', '2024-02-17 01:47:55'),
(23, 38, '0888877888911', 'Reyhan', '1999-12-12', 'Crbn', '3274011306000231122', '1708270760_3ba0ec3c541111ac8905.png', '2024-02-18 22:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `t_otp`
--

CREATE TABLE `t_otp` (
  `id_otp` int(5) UNSIGNED NOT NULL,
  `otp` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE `t_pemesanan` (
  `id_pemesanan` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `biodata_id` int(5) UNSIGNED NOT NULL,
  `tiket_id` int(5) UNSIGNED NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`id_pemesanan`, `user_id`, `biodata_id`, `tiket_id`, `tanggal_pembelian`, `tanggal_selesai`, `created_at`) VALUES
(92, 10, 15, 5, '2024-02-17', '2024-02-18', '2024-02-17 16:25:14'),
(99, 6, 11, 1, '2024-02-17', '2024-02-18', '2024-02-17 17:03:32'),
(101, 6, 11, 3, '2024-02-17', '2024-02-18', '2024-02-17 18:26:53'),
(103, 10, 15, 5, '2024-02-18', '2024-02-19', '2024-02-18 13:24:45'),
(105, 8, 13, 3, '2024-02-18', '2024-02-19', '2024-02-18 15:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `t_tiket`
--

CREATE TABLE `t_tiket` (
  `id_tiket` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `biodata_id` int(10) UNSIGNED NOT NULL,
  `nama_tiket` varchar(150) NOT NULL,
  `jenis_tiket` varchar(10) NOT NULL,
  `jenis_transportasi` varchar(10) NOT NULL,
  `harga_tiket` varchar(50) NOT NULL,
  `jumlah_tiket` varchar(15) NOT NULL,
  `alamat_tiket` text NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `t_tiket`
--

INSERT INTO `t_tiket` (`id_tiket`, `user_id`, `biodata_id`, `nama_tiket`, `jenis_tiket`, `jenis_transportasi`, `harga_tiket`, `jumlah_tiket`, `alamat_tiket`, `no_telepon`, `created_at`) VALUES
(1, 6, 11, 'Kereta Sawunggalih', '1', '2', '180000', '10', 'Cirebon - Jakarta', '08989889898', '2024-02-16 23:56:58'),
(3, 6, 11, 'Kapal Pesiar', '2', '4', '160000', '10', 'Cirebon - Padang', '08989889898', '2024-02-17 00:18:35'),
(4, 6, 11, 'Airlines', '3', '5', '2550000', '12', 'Indonesia - Australia', '08989889898', '2024-02-17 00:56:48'),
(5, 10, 15, 'Angkot 008', '1', '3', '50000', '10', 'Suranenggala - Jamblang', '08989889898', '2024-02-17 01:52:29'),
(7, 10, 15, 'Kapal tongkang', '2', '4', '750000', '10', 'Sumatera - Manado', '08989889898', '2024-02-17 01:53:45'),
(8, 9, 14, 'Garuda Airlines', '3', '5', '2700000', '10', 'Indonesia - Arab Saudi', '08988889898', '2024-02-17 01:54:23'),
(9, 9, 14, 'Kereta Jayabaya', '1', '2', '375000', '1', 'Jogja - Malang', '08988889898', '2024-02-18 14:29:39'),
(10, 9, 14, 'Pesiar Eksekutif', '2', '4', '750000', '12', 'Cirebon', '08988889898', '2024-02-18 14:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `tiket_id` int(5) UNSIGNED NOT NULL,
  `pemesanan_id` int(5) UNSIGNED NOT NULL,
  `order_id` int(30) NOT NULL,
  `jumlah_transaksi` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `user_id`, `tiket_id`, `pemesanan_id`, `order_id`, `jumlah_transaksi`, `metode_pembayaran`, `status_pembayaran`, `created_at`) VALUES
(73, 10, 5, 92, 1708161914, '50000', 'Midtrans', 'Pending', '2024-02-17 16:25:14'),
(80, 6, 1, 99, 1708164212, '180000', 'QRIS', 'Success', '2024-02-17 17:03:32'),
(82, 6, 3, 101, 1708169212, '160000', 'QRIS', 'Success', '2024-02-17 18:26:53'),
(84, 10, 5, 103, 1708237484, '50000', 'QRIS', 'Success', '2024-02-18 13:24:45'),
(86, 8, 3, 105, 1708244553, '160000', 'QRIS', 'Success', '2024-02-18 15:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('1','2','3') NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama`, `email`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$TDx5zQLDe/T7/3PnHba4Ke11msS3gQ87Y/.XmozbUqN7YMK596qBG', '1', '1', '2024-02-16 09:57:55'),
(6, 'Moch Syarif Hidayat', 'testing@gmail.com', '$2y$10$7vZmzRntNWcoyd7AjRkEy.qDlIkZaQEKCkpf5K7ReiQ/eQroBHNz.', '2', '1', '2024-02-16 22:31:16'),
(7, 'Ahmad Rizky', 'testing2@gmail.com', '$2y$10$1ZB2W24RZDXW3tQ.G7Ans.8/jt8UmIFErLS4ByaNeyK.zvkk5/BDe', '3', '1', '2024-02-16 22:31:49'),
(8, 'Alvi Ridho', 'alvi@gmail.com', '$2y$10$kVqb2yf1ZX31jznWNJ/vQ.E1UM8C.PCX99BLDCuI5bNLYhakjrKDy', '3', '1', '2024-02-16 22:41:30'),
(9, 'Web Crafser', 'webcrafser@gmail.com', '$2y$10$CzEfVu9u8z52X2k.1jZbS.lT4zh9hiySx9iiutnoTnldDrCPiipie', '2', '1', '2024-02-17 01:47:18'),
(10, 'Mosyahizuku', 'mosyahi@gmail.com', '$2y$10$mkVWb7P.vx5ie30Rh3HHnebZGoz.zWwaNPikL9XkzHRqbpHxt780q', '2', '1', '2024-02-17 01:47:55'),
(11, 'Testing', 'mosyahichannel@gmail.com', '$2y$10$Tngy5U8nLX.3CJi.3eI12.Dqc8KKhuPOgpzC78lOkaD37G3IesIYm', '2', '1', '2024-02-17 21:02:04'),
(12, 'Testing', 'mosyahichannel@gmail.com', '$2y$10$2y6r.Os7rkL6Md5qO7iHoO8BCUsdMNs/CReRuzKJSPqX/.qNgPDuO', '2', '1', '2024-02-17 21:02:26'),
(14, 'Testing', 'testingg@gmail.com', '$2y$10$bgFcChL3h/OCmNhTEOQjNuCtd2Mpag6HW3IlFvB0Mg9hg2qv4OepC', '2', '1', '2024-02-18 12:54:14'),
(38, 'Reyhan', 'mosyahizuku@gmail.com', '$2y$10$dovj9ibtTUH0uvhQ1QTnm.xNvHEITKXQrQQ/sqYnznQHiFxbd5beq', '3', '1', '2024-02-18 22:39:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_biodata`
--
ALTER TABLE `t_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `t_biodata_user_id_foreign` (`user_id`);

--
-- Indexes for table `t_otp`
--
ALTER TABLE `t_otp`
  ADD PRIMARY KEY (`id_otp`);

--
-- Indexes for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `t_pemesanan_user_id_foreign` (`user_id`),
  ADD KEY `t_pemesanan_biodata_id_foreign` (`biodata_id`),
  ADD KEY `t_pemesanan_tiket_id_foreign` (`tiket_id`);

--
-- Indexes for table `t_tiket`
--
ALTER TABLE `t_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `t_tiket_user_id_foreign` (`user_id`),
  ADD KEY `t_tiket_biodata_id_foreign` (`biodata_id`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `t_transaksi_user_id_foreign` (`user_id`),
  ADD KEY `t_transaksi_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `t_transaksi_tiket_id_foreign` (`tiket_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_biodata`
--
ALTER TABLE `t_biodata`
  MODIFY `id_biodata` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `t_otp`
--
ALTER TABLE `t_otp`
  MODIFY `id_otp` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `id_pemesanan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `t_tiket`
--
ALTER TABLE `t_tiket`
  MODIFY `id_tiket` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_biodata`
--
ALTER TABLE `t_biodata`
  ADD CONSTRAINT `t_biodata_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `t_biodata` (`id_biodata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pemesanan_tiket_id_foreign` FOREIGN KEY (`tiket_id`) REFERENCES `t_tiket` (`id_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pemesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_tiket`
--
ALTER TABLE `t_tiket`
  ADD CONSTRAINT `t_tiket_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `t_biodata` (`id_biodata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_tiket_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `t_transaksi_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `t_pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_transaksi_tiket_id_foreign` FOREIGN KEY (`tiket_id`) REFERENCES `t_tiket` (`id_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
