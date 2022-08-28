-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 04:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pcipnu`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(2, 'Keanggotaan', '2022-07-03 19:27:19', '2022-07-03 19:27:19'),
(3, 'Rapat', '2022-07-03 19:27:19', '2022-07-03 19:27:19'),
(5, 'Pengkaderan Formal', '2022-07-30 18:29:01', '2022-07-30 18:29:01'),
(6, 'Pengkaderan Informal', '2022-07-30 18:29:25', '2022-07-30 18:29:25'),
(7, 'Pengkaderan Non Formal', '2022-07-30 18:29:39', '2022-07-30 18:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kuota_peserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_user`, `nama_kegiatan`, `lokasi`, `keterangan`, `tanggal`, `kuota_peserta`, `gambar`, `id_kategori`, `created_at`, `updated_at`) VALUES
(3, 1, 'LAKMUD (Latihan Kader Muda)', 'Karang Peranti, Kec. Pajarakan, Kab. Probolinggo', 'LAKMUD adalah Latihan kader muda dimana kegiatan di dilaksanakan untuk melanjutkan jenjang pengkaderan ketika angota sudah selesai mengikuti MAKESTA (Masa Kesetiaan Anggota)', '2022-06-09 05:00:00', '30', 'kegiatan_1659230783.jpeg', 7, '2022-07-30 17:08:07', '2022-07-31 01:26:23'),
(4, 1, 'Madrasah Jurnalis', 'Kantor PC NU Kota Kraksaan', 'Kegiatan yang bertujuan untuk melatih Tulis meulis', '2022-07-14 01:00:00', '12', 'kegiatan_1659230754.jpeg', 7, '2022-07-31 00:38:24', '2022-07-31 01:25:54'),
(5, 1, 'Rakercab (Rapat Kerja Cabang)', 'Pondok Pesantren Darullughah Wal Karomah', 'kegiatan organisasi dalam merancang perogram kegiatan', '2022-02-24 01:00:00', '50', 'kegiatan_1659230726.jpeg', 7, '2022-07-31 00:50:19', '2022-07-31 01:25:26'),
(6, 1, '9 Kirab Panji dan perintah ader', 'kantor PCNU kota KRaksaan', 'Ikatan silaturrahmi dari pcnu kepada mwc-mwcdibawah naungan PCNU Kota Kraksaan', '2022-05-27 11:45:00', '100', 'kegiatan_1659230704.jpeg', 7, '2022-07-31 00:56:43', '2022-07-31 01:25:04'),
(7, 7, 'MAKESTA', 'Kantor desa besuk', 'kegiatan pengkaderan yang orentasinya lebih kepada penjagaan', '2022-06-12 01:00:00', '30', 'kegiatan_1659230907.jpeg', 7, '2022-07-31 00:58:18', '2022-08-08 09:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` bigint(20) UNSIGNED NOT NULL,
  `id_kegiatan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_kegiatan`, `id_user`, `komentar`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 'dgyfgysfdys', '2022-07-31 01:30:27', '2022-07-31 01:30:27'),
(5, 7, 1, 'egdyuwgfdywefd', '2022-07-31 01:31:16', '2022-07-31 01:31:16'),
(6, 6, 1, 'mantap', '2022-07-31 01:31:37', '2022-07-31 01:31:37'),
(7, 5, 1, 'ALhamdulillah terlaksana dengan lancar', '2022-07-31 01:32:13', '2022-07-31 01:32:13'),
(8, 4, 1, 'Semoga bisa berjalan dengan lancar', '2022-07-31 01:32:47', '2022-07-31 01:32:47');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_26_054939_create_kategori_table', 2),
(5, '2022_06_13_235200_create_kegiatan_table', 2),
(6, '2022_06_13_235506_create_komentar_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('user','admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `jk`, `no_hp`, `jabatan`, `avatar`, `username`, `password`, `roles`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fikitur Rohman', 'L', '081368821694', 'Adminstrator', 'avatar_1659226841.jpg', 'admin', '$2y$10$Thq2S52v0P31wuH.VLWpdOumag1NpZa6rEUq/kOLPjWyTqWyOcp7e', 'admin', '1', 'yiiI0ZnvgnDyCh1MRjd0Dtba7jh4uDJrAGE0a4dwneVchPFEGtMPeyDFG7jt', '2022-07-03 19:27:20', '2022-07-31 00:21:28'),
(2, 'Zainur Rohman', 'L', '085330256000', 'Sekertaris PC IPNU', 'default.jpg', 'petugas', '$2y$10$ABZtGqfWW.1wqarv0LgQRuj1q/HR6gOU5pHURF0nd3Zl70pDkO7zW', 'petugas', '1', NULL, '2022-07-03 19:27:20', '2022-07-31 06:33:51'),
(5, 'Rizal Efendi', 'L', '085330256312', 'Anggota IPNU', 'default.jpg', 'user1', '$2y$10$wBGvvXqRsIvw0YB0a7Ul1eUqoXARSeiChzUYGb6k8GjBG2TMS0M3.', 'user', '1', NULL, '2022-07-03 23:45:54', '2022-07-03 23:45:54'),
(7, 'Fikitur Rohman', 'L', '082635821642', 'WASEK 5', 'default.jpg', 'Fikitur', '$2y$10$OkLK9gLPrU8ex89P4fYoPOrxRtys2Ey2IAOf0kqXd6VGXJMmMST86', 'admin', '1', NULL, '2022-07-31 06:12:11', '2022-07-31 06:12:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `kegiatan_id_user_foreign` (`id_user`),
  ADD KEY `kegiatan_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komentar_id_kegiatan_foreign` (`id_kegiatan`),
  ADD KEY `komentar_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `kegiatan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_id_kegiatan_foreign` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
