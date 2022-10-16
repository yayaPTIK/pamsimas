-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2021 pada 16.54
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www_pamsimas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Wage', NULL, NULL),
(3, 'Cibangunan', '2021-11-28 12:25:32', '2021-11-28 12:25:32'),
(4, 'Situ RT 1', '2021-11-28 12:25:49', '2021-11-28 12:25:49'),
(5, 'Situ RT 2', '2021-11-28 12:25:58', '2021-11-28 12:25:58'),
(6, 'Situ RT 3', '2021-11-28 12:26:10', '2021-11-28 12:26:10'),
(7, 'Kramat RT 1', '2021-11-28 12:26:24', '2021-11-28 12:26:24'),
(8, 'Kramat RT 2', '2021-11-28 12:26:38', '2021-11-28 12:26:38'),
(9, 'Situ RT 4', '2021-11-28 12:28:16', '2021-11-28 12:28:16'),
(10, 'Kramat RT 3', '2021-11-28 12:28:33', '2021-11-28 12:28:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulans`
--

CREATE TABLE `bulans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bulans`
--

INSERT INTO `bulans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Jan', NULL, NULL),
(2, 'Feb', NULL, NULL),
(3, 'Mart', NULL, NULL),
(4, 'Apr', NULL, NULL),
(5, 'Mei', NULL, NULL),
(6, 'Jun', NULL, NULL),
(7, 'Jul', NULL, NULL),
(8, 'Aug', NULL, NULL),
(9, 'Sep', NULL, NULL),
(10, 'Okt', NULL, NULL),
(11, 'Nov', NULL, NULL),
(12, 'Des', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permeter` int(11) NOT NULL,
  `abodamen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanans`
--

INSERT INTO `layanans` (`id`, `name`, `permeter`, `abodamen`, `created_at`, `updated_at`) VALUES
(1, 'Reguler', 3000, NULL, NULL, NULL),
(2, 'Sarana Ibadah', 2500, 0, NULL, NULL),
(3, 'Warga Sepuh', 3000, 5000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2021_11_16_074407_create_tagihans_table', 1),
(25, '2021_11_16_123840_create_layanans_table', 1),
(26, '2021_11_27_055824_create_blocks_table', 1),
(27, '2021_11_30_081933_create_bulans_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihans`
--

CREATE TABLE `tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaksiID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_lalu` int(11) NOT NULL,
  `m_ini` int(11) NOT NULL,
  `pemakaian` int(11) NOT NULL,
  `permeter` int(11) NOT NULL,
  `abodamen` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tagihans`
--

INSERT INTO `tagihans` (`id`, `user_id`, `transaksiID`, `name`, `block`, `bulan`, `tahun`, `m_lalu`, `m_ini`, `pemakaian`, `permeter`, `abodamen`, `denda`, `diskon`, `total`, `status`, `created_at`, `updated_at`) VALUES
(18, 5, 'ID081220211', 'Nur edit', 'Wage', 'Januari', '2021', 0, 12, 12, 2500, 0, 0, 0, 30000, 0, '2021-12-08 10:29:52', '2021-12-08 10:29:52'),
(19, 4, 'ID081220212', 'Yaya suryana', 'Situ RT 4', 'Januari', '2021', 0, 2, 2, 3000, 5000, 0, 0, 11000, 0, '2021-12-08 10:30:30', '2021-12-08 10:30:30'),
(20, 4, 'ID081220213', 'Yaya suryana', 'Situ RT 4', 'Agustus', '2021', 2, 4, 2, 3000, 5000, 0, 0, 11000, 0, '2021-12-08 12:38:53', '2021-12-08 12:38:53'),
(21, 2, 'ID081220214', 'Rahma', 'Wage', 'Maret', '2021', 0, 2, 2, 3000, 13000, 0, 0, 19000, 0, '2021-12-08 13:31:26', '2021-12-08 13:31:26'),
(22, 2, 'ID081220215', 'Rahma', 'Wage', 'Agustus', '2021', 2, 3, 1, 3000, 14000, 0, 0, 17000, 0, '2021-12-08 14:40:30', '2021-12-08 14:40:30'),
(23, 5, 'ID081220216', 'Nur', 'Wage', 'Juli', '2021', 12, 12, 0, 2500, 0, 0, 0, 0, 0, '2021-12-08 14:42:22', '2021-12-08 14:42:22'),
(24, 5, 'ID081220217', 'Nur', 'Wage', 'November', '2021', 12, 13, 1, 2500, 0, 0, 0, 2500, 0, '2021-12-08 14:43:05', '2021-12-08 14:43:05'),
(25, 7, 'ID081220218', 'zeni', 'Situ RT 4', 'Juni', '2021', 0, 100, 100, 3000, 5000, 0, 0, 305000, 0, '2021-12-08 14:44:57', '2021-12-08 14:44:57'),
(26, 6, 'ID081220219', 'Nunu', 'Situ RT 4', 'Agustus', '2021', 0, 12, 12, 3000, 5000, 0, 0, 41000, 0, '2021-12-08 14:46:08', '2021-12-08 14:46:08'),
(27, 2, 'ID0812202110', 'Rahma', 'Wage', 'Agustus', '2021', 3, 4, 1, 3000, 14000, 0, 0, 17000, 0, '2021-12-08 15:03:16', '2021-12-08 15:03:16'),
(28, 4, 'ID0812202111', 'Yaya suryana', 'Situ RT 4', 'Juni', '2021', 4, 5, 1, 3000, 5000, 0, 0, 8000, 0, '2021-12-08 15:03:45', '2021-12-08 15:03:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layanan_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `layanan_id`, `name`, `username`, `hp`, `alamat`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin', '089636003290', 'Wage', '1', NULL, '$2y$10$6cZWm7YJCcYzsDHLONMkw.EwhEmWY4spG8jcXKxwnhgmC2iJCYOvq', NULL, '2021-11-28 06:06:04', '2021-11-28 06:06:04'),
(2, 1, 'Rahma', 'rahma', '12345678', 'Wage', '0', NULL, '$2y$10$OHKpztW4eVFjj.HJ9EX9HezTn6Up6sg8YA.rXrhxL.uEkT3XYlkeK', NULL, '2021-11-28 10:34:44', '2021-11-28 10:34:44'),
(3, 2, 'Adam', 'adam', '087723721718', 'Kramat RT 1', '0', NULL, '$2y$10$xmEwWlDom5s5LUhWhlNCmOxq9VMUtLOqBJOVuavnE68dvz8sA9/Fq', NULL, '2021-11-28 12:27:41', '2021-11-28 12:27:41'),
(4, 3, 'Yaya suryana', 'yaya', '089636003290', 'Situ RT 4', '0', NULL, '$2y$10$3cEdegLFL2ucRkEXB1RAMu0nRJ1w7mW.AB70JGuO0FRdflXo688.W', NULL, '2021-11-28 12:29:28', '2021-12-06 09:47:43'),
(5, 2, 'Nur', 'nur', '087737731989', 'Wage', '0', NULL, '$2y$10$a0eEPloZ/7wLQtrqGsAB2.6oGBO7xSvQZEAf4E8XPZaiNGCoFedfa', NULL, '2021-11-28 12:45:22', '2021-12-08 13:24:10'),
(6, 1, 'Nunu', 'nunu', '089636003290', 'Situ RT 4', '0', NULL, '$2y$10$0OsyzjJvWreLWVmz.763oOrNwoqVFoDOzY6hlWLZkUOezEMAGh0Fa', NULL, '2021-12-08 13:04:00', '2021-12-08 13:04:00'),
(7, 1, 'zeni', 'zeni', '089636003290', 'Situ RT 4', '0', NULL, '$2y$10$utdNjOA8ROVmAKp8Bho81ee2pn4Wteh3D4VJKA6cKyJYelJykiyTK', NULL, '2021-12-08 13:35:13', '2021-12-08 13:35:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bulans`
--
ALTER TABLE `bulans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tagihans_transaksiid_unique` (`transaksiID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `bulans`
--
ALTER TABLE `bulans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
