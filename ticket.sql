-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Bulan Mei 2020 pada 18.44
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(3, 'Pesta', '2020-05-19 10:23:34', '2020-05-19 10:23:34'),
(4, 'Buku', '2020-05-19 12:00:22', '2020-05-19 12:00:22'),
(5, 'Coba', '2020-05-21 14:59:48', '2020-05-21 15:40:00'),
(13, 'dsd', '2020-05-21 16:45:27', '2020-05-21 16:45:27'),
(14, 'sas', '2020-05-21 16:46:06', '2020-05-21 16:46:06'),
(15, 'Kaos', '2020-05-21 16:46:28', '2020-05-21 16:46:28'),
(16, 'dsds', '2020-05-21 17:04:19', '2020-05-21 17:04:19'),
(17, 'feyto', '2020-05-21 17:09:45', '2020-05-21 17:09:45'),
(18, 'dskds', '2020-05-21 17:15:02', '2020-05-21 17:15:02'),
(21, 'oke', '2020-05-21 17:40:38', '2020-05-21 17:40:38'),
(22, 'djs', '2020-05-21 17:40:38', '2020-05-21 17:40:38'),
(23, 'dsjd', '2020-05-21 17:40:38', '2020-05-21 17:40:38'),
(24, 'dsjd', '2020-05-21 17:40:38', '2020-05-21 17:40:38'),
(25, 'oke', '2020-05-21 17:41:29', '2020-05-21 17:41:29'),
(26, 'djs', '2020-05-21 17:41:29', '2020-05-21 17:41:29'),
(27, 'dsjd', '2020-05-21 17:41:29', '2020-05-21 17:41:29'),
(28, 'dsjd', '2020-05-21 17:41:29', '2020-05-21 17:41:29'),
(29, 'oke', '2020-05-21 17:42:30', '2020-05-21 17:42:30'),
(30, 'djs', '2020-05-21 17:42:30', '2020-05-21 17:42:30'),
(31, 'dsjd', '2020-05-21 17:42:30', '2020-05-21 17:42:30'),
(32, 'dsjd', '2020-05-21 17:42:30', '2020-05-21 17:42:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'seller', NULL, NULL),
(3, 'manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log_activity`
--

INSERT INTO `log_activity` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mengedit Category Pesta', 'http://localhost:8000/update-category/3', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-21 18:43:29', '2020-05-21 18:43:29'),
(2, 'Mengupdate data  feyto', 'http://localhost:8000/update-profile', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 06:42:46', '2020-05-22 06:42:46'),
(3, 'Mengubah Password  ', 'http://localhost:8000/update-password', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 06:44:31', '2020-05-22 06:44:31'),
(4, 'Mengedit Ticket Konser', 'http://localhost:8000/update-ticket/3', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 06:45:42', '2020-05-22 06:45:42'),
(5, 'Mengupdate Setting  ', 'http://localhost:8000/update-setting/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 06:54:53', '2020-05-22 06:54:53'),
(6, 'Melakukan Transaksi Yolls', 'http://localhost:8000/save-transaction', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 07:05:27', '2020-05-22 07:05:27'),
(7, 'Menghapus Transaksi customer Yolls', 'http://localhost:8000/delete-transaction/3', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 07:07:47', '2020-05-22 07:07:47'),
(8, 'Melakukan Transaksi Yolla', 'http://localhost:8000/save-transaction', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 07:08:40', '2020-05-22 07:08:40'),
(9, 'Melakukan Transaksi sandika', 'http://localhost:8000/save-transaction', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 07:08:52', '2020-05-22 07:08:52'),
(10, 'Menghapus Transaksi customer sandika', 'http://localhost:8000/delete-transaction/5', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 07:09:01', '2020-05-22 07:09:01'),
(11, 'Menguproaf Transaksi customer ', 'http://localhost:8000/transaction_finish', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 07:16:55', '2020-05-22 07:16:55'),
(12, 'Mengubah Password  ', 'http://localhost:8000/update-password', 'PUT', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 7, '2020-05-22 07:22:06', '2020-05-22 07:22:06'),
(13, 'Melakukan Transaksi xz', 'http://localhost:8000/save-transaction', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 12:51:40', '2020-05-22 12:51:40'),
(14, 'Melakukan Transaksi feyto', 'http://localhost:8000/save-transaction', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 12:52:39', '2020-05-22 12:52:39'),
(15, 'Melakukan Transaksi feyto jhj', 'http://localhost:8000/save-transaction', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 12:52:49', '2020-05-22 12:52:49'),
(16, 'Menghapus Transaksi customer feyto jhj', 'http://localhost:8000/delete-transaction/6', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 12:54:56', '2020-05-22 12:54:56'),
(17, 'Menghapus Transaksi customer xz', 'http://localhost:8000/delete-transaction/5', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-22 12:55:04', '2020-05-22 12:55:04'),
(18, 'Mengupdate Setting  ', 'http://localhost:8000/update-setting/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-23 14:32:29', '2020-05-23 14:32:29'),
(19, 'Mengubah Password  ', 'http://localhost/tiket/public/update-password', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 5, '2020-05-25 20:38:23', '2020-05-25 20:38:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_19_144425_create_categories_table', 2),
(5, '2020_05_19_153347_create_tickets_table', 3),
(6, '2020_05_19_192945_create_transactions_table', 4),
(7, '2020_05_21_010925_create_levels_table', 5),
(8, '2020_05_21_102427_create_settings_table', 6),
(9, '2020_05_21_222132_create_log_activity_table', 7),
(10, '2020_05_22_014219_create_log_activity_table', 8);

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
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dashboard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navbar_right` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navbar_left` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `title_admin`, `title_login`, `dashboard`, `category`, `ticket`, `transaction`, `report`, `user`, `setting`, `my_profile`, `change_password`, `navbar_right`, `navbar_left`, `created_at`, `updated_at`) VALUES
(1, 'Ticket', 'Ticket Aplication', 'fa fa-dashboard', 'fa fa-file-text', 'fa fa-pie-chart', 'fa fa-shopping-cart', 'fa fa-book', 'fa fa-users', 'fa fa-cog', 'fa fa-user-times', 'fa fa-user', '#3c8dbc', '#357ca5', '2020-05-21 14:23:02', '2020-05-23 14:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `number_of_tickets` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_name`, `ticket_price`, `ticket_type`, `category_id`, `number_of_tickets`, `created_at`, `updated_at`) VALUES
(3, 'Konser', '90.000', 'VIP', 3, '90', '2020-05-19 12:07:22', '2020-05-22 06:45:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `seller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `ticket_id`, `seller`, `customer`, `qty`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'feyto', 'Yolla', '2', '2020-04-10', 1, '2020-05-20 07:01:55', '2020-05-20 07:09:50'),
(2, 3, 'feyto', 'Ninda', '2', '2020-05-20', 1, '2020-05-20 07:12:29', '2020-05-20 07:12:48'),
(4, 3, 'feyto', 'Yolla', '1', '2020-05-22', 1, '2020-05-22 07:08:40', '2020-05-22 07:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'feyto', 'feyto@gmail.com', 1, NULL, '$2y$10$e205.IFL2tMR2xXbtyhOZeymTb/4SDJlfAe5X6jYRzwE4Jy7l8Ddq', NULL, '2020-05-21 18:34:56', '2020-05-25 20:38:23'),
(6, 'wikrama', 'wikrama@gmail.com', 2, NULL, '$2y$10$8BJCnDxHdLNubWJ0fkLCR.SPkj60MBmCw/ucO2eWCX6I/EdS5XLp6', NULL, '2020-05-22 06:30:23', '2020-05-22 07:23:56'),
(7, 'wikrama1', 'wikrama1@gmail.com', 3, NULL, '$2y$10$QxKD5.B08NQtCuGT67VsRuMdT.G6UaYNc0cC1pOTnZ/joqFSXXE96', NULL, '2020-05-22 07:21:34', '2020-05-22 07:22:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_activity_user_id_foreign` (`user_id`);

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
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_ticket_id_foreign` (`ticket_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD CONSTRAINT `log_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
