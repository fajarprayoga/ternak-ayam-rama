-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 02:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ternak_ayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak_kandang`
--

CREATE TABLE `anak_kandang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anak_kandang`
--

INSERT INTO `anak_kandang` (`id`, `nama`, `tanggal_lahir`, `email`, `password`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Suparsana Made', '1999-05-29', 'suparsana@gmail.com', '$2y$10$2SPmB//7iBI6XMo9Xu5ppeRKVLY17G8c.66i2SpJh1fI5VfiX05nW', 'Dalung', '2021-05-22 21:25:21', '2021-05-23 01:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `bayaran`
--

CREATE TABLE `bayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anak_kandang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bayaran`
--

INSERT INTO `bayaran` (`id`, `anak_kandang_id`, `jumlah`, `keterangan`, `tanggal`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 1, 500000, 'Gaji Mei 2021', '2021-05-30', 'GAJI', '2021-05-23 02:29:19', '2021-05-23 02:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `tanggal`, `jenis_jadwal`, `jumlah_ayam`, `harga`, `created_at`, `updated_at`, `status`, `jadwal_id`) VALUES
(1, '2021-06-05', 'DOC', 2200, 50000, '2021-05-22 23:39:26', '2021-05-23 02:44:14', 'DISETUJUI', NULL),
(3, '2021-05-31', 'PANEN', 2000, 600000, '2021-05-22 23:57:42', '2021-05-22 23:57:42', 'MENUNGGU KONFIRMASI', NULL),
(4, '2021-07-26', 'PENJARINGAN', 200, 50000, '2021-05-23 01:02:21', '2021-05-23 01:02:21', 'MENUNGGU KONFIRMASI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anak_kandang_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `anak_kandang_id`, `title`, `keluhan`, `obat_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Flu', 'flu', 1, '2021-05-23 02:14:11', '2021-05-23 02:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `keluhans`
--

CREATE TABLE `keluhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anak_kandang_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_05_23_025138_create_anak_kandangs_table', 1),
(4, '2021_05_23_025641_create_jadwals_table', 1),
(5, '2021_05_23_025917_create_pengeluarans_table', 1),
(6, '2021_05_23_030259_create_obats_table', 1),
(7, '2021_05_23_031742_create_stok_pakans_table', 1),
(8, '2021_05_23_070051_add_column_status_in_jadwal', 2),
(9, '2021_05_23_085210_add_column_jadwal_id_in_jadwal', 3),
(10, '2021_05_23_092021_add_column_status_in_pengeluaran', 4),
(12, '2021_05_23_094716_create_keluhans_table', 5),
(14, '2021_05_23_102000_create_bayarans_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Obat Flu', 'OBAT', '2021-05-23 00:51:23', '2021-05-23 00:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anak_kandang_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `judul`, `jumlah`, `jadwal_id`, `created_at`, `updated_at`, `anak_kandang_id`, `status`) VALUES
(1, 'Listrik', 600000, 1, '2021-05-23 00:43:16', '2021-05-23 00:43:16', NULL, 'TERCATAT'),
(2, 'Susu', 25000, 1, '2021-05-23 01:31:53', '2021-05-23 01:35:45', 1, 'TERCATAT'),
(3, 'Air', 25000, 1, '2021-05-23 04:06:10', '2021-05-23 04:06:17', 1, 'TERCATAT');

-- --------------------------------------------------------

--
-- Table structure for table `stok_pakan`
--

CREATE TABLE `stok_pakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_stok` date NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Baru', 'admin@email.com', '$2y$12$0ZSgl.sqF.NWQcLMpG2Ta.on4QYbNeourzOZ2vuCbQx6TdQgAxXSO', 'ADMIN', NULL, NULL, '2021-05-22 20:54:57'),
(4, 'Owner', 'owner@email.com', '$2y$10$0VdLVHy8RSISXRoxigbGK.MF/E0wl0zKObER7IIVel.ZEWZYNd/2q', 'OWNER', NULL, '2021-05-23 02:43:29', '2021-05-23 02:43:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_kandang`
--
ALTER TABLE `anak_kandang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anak_kandang_email_unique` (`email`);

--
-- Indexes for table `bayaran`
--
ALTER TABLE `bayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhans`
--
ALTER TABLE `keluhans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_pakan`
--
ALTER TABLE `stok_pakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak_kandang`
--
ALTER TABLE `anak_kandang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bayaran`
--
ALTER TABLE `bayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keluhans`
--
ALTER TABLE `keluhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok_pakan`
--
ALTER TABLE `stok_pakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
