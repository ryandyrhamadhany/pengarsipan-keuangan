-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jan 2026 pada 00.29
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_keuangan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `archive_files`
--

CREATE TABLE `archive_files` (
  `id` bigint UNSIGNED NOT NULL,
  `folder_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indeks1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indeks2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_item` int DEFAULT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_spm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_spm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_sp2d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tingkat_pertimbangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_halaman` int DEFAULT NULL,
  `retensi_arsip_aktif` year DEFAULT NULL,
  `retensi_arsip_inaktif` year DEFAULT NULL,
  `nasib_akhir_arsip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klasifikasi_keamanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_rak` bigint UNSIGNED DEFAULT NULL,
  `folder` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `archive_files`
--

INSERT INTO `archive_files` (`id`, `folder_id`, `file_name`, `file_path`, `description`, `created_at`, `updated_at`, `kode_klasifikasi`, `indeks1`, `indeks2`, `no_item`, `uraian`, `no_spm`, `jenis_spm`, `nilai_sp2d`, `tgl_terima`, `tingkat_pertimbangan`, `jumlah_halaman`, `retensi_arsip_aktif`, `retensi_arsip_inaktif`, `nasib_akhir_arsip`, `klasifikasi_keamanan`, `status`, `keterangan`, `jenis_rak`, `folder`) VALUES
(20, 17, 'Dokumen test 3', 'archive/NO085.pdf', 'test', '2026-01-07 18:09:24', '2026-01-07 18:09:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 17, 'Dokumen test 2', 'archive/NO086.pdf', 'test', '2026-01-07 18:09:45', '2026-01-07 18:09:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabinets`
--

CREATE TABLE `cabinets` (
  `id` bigint UNSIGNED NOT NULL,
  `cabinet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabinet_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_racks` int DEFAULT NULL,
  `total_document` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cabinets`
--

INSERT INTO `cabinets` (`id`, `cabinet_name`, `cabinet_code`, `total_racks`, `total_document`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Filling Cabinet test', 'cabinet_123', 0, NULL, 'test 1', '2025-12-18 07:29:53', '2026-01-07 18:50:29'),
(2, 'Filling Cabinet PNBP 1', 'PNBP 1', 0, NULL, 'test cabinet', '2026-01-05 23:40:45', '2026-01-05 23:40:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('pengarsipan_keuangan_cache_passwordkeuangan@gmail.com|127.0.0.1', 'i:2;', 1768224307),
('pengarsipan_keuangan_cache_passwordkeuangan@gmail.com|127.0.0.1:timer', 'i:1768224307;', 1768224307);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `cabinet_id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_id` bigint UNSIGNED DEFAULT NULL,
  `funding_source_id` bigint UNSIGNED DEFAULT NULL,
  `url_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `cabinet_id`, `category_name`, `sub_category`, `year`, `payment_method_id`, `funding_source_id`, `url_icon`, `path_icon`, `description`, `created_at`, `updated_at`) VALUES
(13, 2, 'test category', NULL, NULL, NULL, NULL, NULL, NULL, 'test', '2026-01-05 23:44:33', '2026-01-05 23:44:33'),
(15, 1, 'UP Bendahara', 'KKP', '2025', NULL, NULL, NULL, NULL, 'test', '2026-01-07 18:07:28', '2026-01-07 18:48:23'),
(16, 1, 'LS', NULL, '2026', 1, NULL, NULL, NULL, 'test', '2026-01-07 18:07:47', '2026-01-12 02:19:07'),
(17, 1, 'UP Bendahara', 'RM', '2025', NULL, NULL, NULL, NULL, NULL, '2026-01-07 18:08:07', '2026-01-12 02:18:58'),
(18, 1, 'LS', NULL, '2014', 1, NULL, NULL, NULL, NULL, '2026-01-07 18:08:46', '2026-01-12 02:19:07'),
(19, 1, 'UP Bendahara', 'KKP', '2026', NULL, NULL, NULL, NULL, NULL, '2026-01-07 18:24:48', '2026-01-07 18:48:23'),
(20, 1, 'UP Bendahara', 'RM', '2027', NULL, NULL, NULL, NULL, NULL, '2026-01-07 18:24:55', '2026-01-12 02:18:58'),
(24, 1, 'RM', NULL, '2026', NULL, 1, NULL, NULL, NULL, '2026-01-11 23:09:38', '2026-01-12 02:18:58'),
(25, 1, 'UP Bendahara', 'LS', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-11 23:50:13', '2026-01-12 02:19:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `digital_archives`
--

CREATE TABLE `digital_archives` (
  `id` bigint UNSIGNED NOT NULL,
  `category_payment_id` bigint UNSIGNED DEFAULT NULL,
  `category_funding_id` bigint UNSIGNED DEFAULT NULL,
  `archive_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submiter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finance_officer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revenue_officer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path_archive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archive_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int NOT NULL,
  `archive_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disposal_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indeks1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indeks2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_item` int DEFAULT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_spm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_spm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_sp2d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tingkat_pertimbangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_halaman` int DEFAULT NULL,
  `retensi_arsip_aktif` year DEFAULT NULL,
  `retensi_arsip_inaktif` year DEFAULT NULL,
  `nasib_akhir_arsip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klasifikasi_keamanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_rak` bigint UNSIGNED DEFAULT NULL,
  `folder` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `digital_archives`
--

INSERT INTO `digital_archives` (`id`, `category_payment_id`, `category_funding_id`, `archive_name`, `from_divisi`, `submiter_name`, `finance_officer_name`, `revenue_officer_name`, `file_path_archive`, `archive_code`, `nominal`, `archive_by`, `disposal_date`, `created_at`, `updated_at`, `kode_klasifikasi`, `indeks1`, `indeks2`, `no_item`, `uraian`, `no_spm`, `jenis_spm`, `nilai_sp2d`, `tgl_terima`, `tingkat_pertimbangan`, `jumlah_halaman`, `retensi_arsip_aktif`, `retensi_arsip_inaktif`, `nasib_akhir_arsip`, `klasifikasi_keamanan`, `status`, `keterangan`, `jenis_rak`, `folder`) VALUES
(1, NULL, NULL, 'Pembelian alat', NULL, 'User_Test', 'keuangan Test', 'Bendahara Keuangan', 'archive/1762222418427_No. 077 MO II.16 TVRI 2022 (1) (1).pdf', '001122/KW/2025', 20000000, 'Bendahara Keuangan', '2031-01-11', '2026-01-11 04:17:35', '2026-01-11 04:17:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 'Pembelian alat', NULL, 'User_Test', 'keuangan Test', 'Bendahara Keuangan', 'archive/1762222418427_No. 077 MO II.16 TVRI 2022 (1) (1).pdf', '001122/KW/2025', 200000, 'Bendahara Keuangan', '2031-01-11', '2026-01-11 04:21:26', '2026-01-11 04:21:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, 'Pembelian alat', NULL, 'User_Test', 'keuangan Test', 'Bendahara Keuangan', 'archive/1762222418427_No. 077 MO II.16 TVRI 2022 (1) (1).pdf', 'KWT/2024/00111', 140000, 'Bendahara Keuangan', '2031-01-12', '2026-01-12 00:34:56', '2026-01-12 00:34:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, 'Pembelian alat', NULL, 'User_Test', 'keuangan Test', 'Bendahara Keuangan', 'archive/1762222418427_No. 077 MO II.16 TVRI 2022 (1) (1).pdf', '001122/KW/2025', 20000, 'Bendahara Keuangan', '2031-01-12', '2026-01-12 00:37:06', '2026-01-12 00:37:06', NULL, NULL, NULL, NULL, NULL, 'SPM/2026/0011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, 'Pembelian alat', NULL, 'User_Test', 'keuangan Test', 'Bendahara Keuangan', 'archive/1762222418427_No. 077 MO II.16 TVRI 2022 (1) (1).pdf', '001122/KW/2025', 5000, 'Bendahara Keuangan', '2031-01-12', '2026-01-12 00:49:10', '2026-01-12 00:49:10', NULL, NULL, NULL, NULL, NULL, 'SPM/2026/0011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 16, 24, 'Pembelian alat', NULL, 'User_Test', 'keuangan Test', 'Bendahara Keuangan', 'archive/1762222418427_No. 077 MO II.16 TVRI 2022 (1) (1).pdf', '001122/KW/2025', 5000, 'Bendahara Keuangan', '2031-01-12', '2026-01-12 02:20:16', '2026-01-12 02:20:16', NULL, NULL, NULL, NULL, NULL, 'SPM/2026/0011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 16, 24, 'Shooting', NULL, 'User_Test', 'keuangan Test', 'Bendahara Keuangan', 'archive/1762154250013_No. 013 MO II.16 TVRI 2022 (1).pdf', '001122/KW/2025', 500000, 'Bendahara Keuangan', '2031-01-12', '2026-01-12 20:26:28', '2026-01-12 20:26:28', NULL, NULL, NULL, NULL, NULL, 'SPM/2026/0011', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `document_folders`
--

CREATE TABLE `document_folders` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `rack_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `document_folders`
--

INSERT INTO `document_folders` (`id`, `category_id`, `rack_name`, `folder_name`, `description`, `created_at`, `updated_at`) VALUES
(17, 16, 'Rak 1', 'folder 1', 'test', '2026-01-07 18:08:53', '2026-01-07 18:09:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `funding_sources`
--

CREATE TABLE `funding_sources` (
  `id` bigint UNSIGNED NOT NULL,
  `funding_source_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `funding_sources`
--

INSERT INTO `funding_sources` (`id`, `funding_source_name`, `sub_category`, `description`, `created_at`, `updated_at`) VALUES
(1, 'RM', NULL, NULL, '2026-01-11 05:35:25', '2026-01-11 05:35:25'),
(3, 'PNBP', NULL, NULL, '2026-01-12 00:52:25', '2026-01-12 00:52:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_12_015621_create_cabinets_table', 1),
(5, '2025_11_12_021737_create_categories_table', 1),
(6, '2025_11_12_021737_create_sub_categories_table', 1),
(7, '2025_11_12_022737_create_years_table', 1),
(8, '2025_11_13_003718_create_document_racks_table', 1),
(9, '2025_11_13_025257_create_document_folders_table', 1),
(10, '2025_11_13_064915_create_archive_files_table', 1),
(11, '2025_12_02_020704_create_pengajuans_table', 1),
(13, '2025_12_17_055801_create_digital_archives_table', 2),
(14, '2025_12_17_060458_add_digital_archive_to_pengajuan', 3),
(15, '2025_12_29_020426_add_kolom_to_pengajuan', 4),
(18, '2025_12_30_011644_add_new_kolom_to_pengajuan', 5),
(19, '2025_12_30_011717_add_sub_role_to_user', 5),
(20, '2025_12_30_070302_add_privileged_to_user', 6),
(21, '2026_01_05_031122_create_categories_table', 7),
(22, '2026_01_05_031902_create_document_folders_table', 7),
(23, '2026_01_07_022250_add_folder_id_to_archive', 8),
(30, '2026_01_08_035032_create_digital_archives_table', 9),
(31, '2026_01_11_035900_create_payment_methods_table', 9),
(32, '2026_01_11_035920_create_funding_sources_table', 9),
(34, '2026_01_11_050329_add_assigned_to_pengajuans', 10),
(35, '2026_01_11_145554_add_new_column_to_archive_files', 11),
(36, '2026_01_11_145639_add_new_column_to_digital_archive', 11),
(37, '2026_01_12_022237_add_code_category_to_category', 12),
(38, '2026_01_12_022406_add_divisi_to_digitalarchive', 12),
(41, '2026_01_12_054514_add_double_colum_category', 13),
(42, '2026_01_12_054611_add_double_colum_digital_archives', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_method_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method_name`, `sub_category`, `description`, `created_at`, `updated_at`) VALUES
(1, 'LS', NULL, NULL, '2026-01-11 05:34:44', '2026-01-11 18:49:31'),
(5, 'UP', NULL, NULL, '2026-01-12 00:52:10', '2026-01-12 00:52:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `finance_officers_id` bigint UNSIGNED DEFAULT NULL,
  `revenue_officer_id` bigint UNSIGNED DEFAULT NULL,
  `pengajuan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int DEFAULT NULL,
  `assigned_payment_method` bigint UNSIGNED DEFAULT NULL,
  `assigned_funding_source` bigint UNSIGNED DEFAULT NULL,
  `path_file_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kelengkapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` tinyint(1) NOT NULL,
  `path_file_status_kelengkapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_diarsipkan` tinyint(1) DEFAULT NULL,
  `is_marked` tinyint(1) NOT NULL,
  `status_dikembalikan` tinyint(1) DEFAULT NULL,
  `digital_archive_id` bigint UNSIGNED DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuans`
--

INSERT INTO `pengajuans` (`id`, `user_id`, `finance_officers_id`, `revenue_officer_id`, `pengajuan_name`, `nominal`, `assigned_payment_method`, `assigned_funding_source`, `path_file_pengajuan`, `status_kelengkapan`, `status_verifikasi`, `path_file_status_kelengkapan`, `status_diarsipkan`, `is_marked`, `status_dikembalikan`, `digital_archive_id`, `message`, `created_at`, `updated_at`) VALUES
(19, 2, 1, 4, 'Pembelian alat', 5000, 1, 1, 'pengajuan/1762222418427_No. 077 MO II.16 TVRI 2022 (1) (1).pdf', 'Lengkap', 1, 'metadata_pengajuan/Pembelian_alat_CHECKLIST.xlsx', 1, 1, 0, NULL, 'sudah', '2026-01-10 22:39:36', '2026-01-12 02:20:15'),
(20, 2, 1, 4, 'Shooting', 500000, 1, 1, 'pengajuan/1762154250013_No. 013 MO II.16 TVRI 2022 (1).pdf', 'Lengkap', 1, 'metadata_pengajuan/Shooting_CHECKLIST.xlsx', 1, 1, 0, NULL, NULL, '2026-01-12 20:23:38', '2026-01-12 20:26:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6D7Yl0qHSZJltqTrxK3yRhgahZhXzbx8J3cAGSKp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzViWnlGY0lEVmZYcmJTVGN3Zm9jMkR4Tmhpd21VdUVtRmdNYXlHTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9fQ==', 1768224415);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_privileged` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `sub_role`, `is_privileged`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'keuangan Test', 'keuangan@gmail.com', NULL, '$2y$12$Mk3nzmmzrRMjryZhNU2XOuLTZJP6kqgRnfzEY4K2AhscXveRSeZ56', 'Keuangan', 'WA', 0, NULL, '2025-12-15 06:09:27', '2026-01-11 04:58:05'),
(2, 'User_Test', 'usertest@gmail.com', NULL, '$2y$12$wQLGzA0XMsUlfaeiFaQjk.jUbt0I6fyFON6o9Q7t39B7Cnn5VNxn.', 'Program', 'WA', 0, NULL, '2025-12-15 06:15:54', '2026-01-11 04:58:15'),
(3, 'Administrator', 'admin@gmail.com', NULL, '$2y$12$kaR.ZCS66pDRjjQIRl4ZQOBjLxEzF1zInJyhWw/ZNyJrcg6AJqnJy', 'Admin', 'WA', 0, NULL, '2025-12-15 17:27:36', '2026-01-11 04:58:35'),
(4, 'Bendahara Keuangan', 'bendahara@gmail.com', NULL, '$2y$12$G0wcYz3LBTJVE5Zih364qeGQOAdeOyDLPpOMkqUXWT/UetfpkJX1y', 'Bendahara', 'WA', 1, NULL, '2025-12-15 18:58:36', '2026-01-11 04:58:23'),
(5, 'BendaharaUP', 'Bendaharaup@gmail.com', NULL, '$2y$12$2oKXwUbKY1Y8dcQr622iP.iYvvFsMWQMOGV8ElHG9mhL6gn0hmpU6', 'Bendahara', 'WA', 1, NULL, '2026-01-08 18:38:13', '2026-01-11 04:58:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `archive_files`
--
ALTER TABLE `archive_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archive_files_folder_id_foreign` (`folder_id`),
  ADD KEY `archive_files_jenis_rak_foreign` (`jenis_rak`),
  ADD KEY `archive_files_folder_foreign` (`folder`);

--
-- Indeks untuk tabel `cabinets`
--
ALTER TABLE `cabinets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_cabinet_id_foreign` (`cabinet_id`),
  ADD KEY `categories_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `categories_funding_source_id_foreign` (`funding_source_id`);

--
-- Indeks untuk tabel `digital_archives`
--
ALTER TABLE `digital_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `digital_archives_jenis_rak_foreign` (`jenis_rak`),
  ADD KEY `digital_archives_folder_foreign` (`folder`),
  ADD KEY `digital_archives_category_payment_id_foreign` (`category_payment_id`),
  ADD KEY `digital_archives_category_funding_id_foreign` (`category_funding_id`);

--
-- Indeks untuk tabel `document_folders`
--
ALTER TABLE `document_folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_folders_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `funding_sources`
--
ALTER TABLE `funding_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuans_user_id_foreign` (`user_id`),
  ADD KEY `pengajuans_finance_officers_id_foreign` (`finance_officers_id`),
  ADD KEY `pengajuans_digital_archive_id_foreign` (`digital_archive_id`),
  ADD KEY `pengajuans_revenue_officer_id_foreign` (`revenue_officer_id`),
  ADD KEY `pengajuans_assigned_payment_method_foreign` (`assigned_payment_method`),
  ADD KEY `pengajuans_assigned_funding_source_foreign` (`assigned_funding_source`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `archive_files`
--
ALTER TABLE `archive_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `cabinets`
--
ALTER TABLE `cabinets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `digital_archives`
--
ALTER TABLE `digital_archives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `document_folders`
--
ALTER TABLE `document_folders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `funding_sources`
--
ALTER TABLE `funding_sources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `archive_files`
--
ALTER TABLE `archive_files`
  ADD CONSTRAINT `archive_files_folder_foreign` FOREIGN KEY (`folder`) REFERENCES `document_folders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `archive_files_folder_id_foreign` FOREIGN KEY (`folder_id`) REFERENCES `document_folders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archive_files_jenis_rak_foreign` FOREIGN KEY (`jenis_rak`) REFERENCES `document_folders` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_cabinet_id_foreign` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_funding_source_id_foreign` FOREIGN KEY (`funding_source_id`) REFERENCES `funding_sources` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `digital_archives`
--
ALTER TABLE `digital_archives`
  ADD CONSTRAINT `digital_archives_category_funding_id_foreign` FOREIGN KEY (`category_funding_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `digital_archives_category_payment_id_foreign` FOREIGN KEY (`category_payment_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `digital_archives_folder_foreign` FOREIGN KEY (`folder`) REFERENCES `document_folders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `digital_archives_jenis_rak_foreign` FOREIGN KEY (`jenis_rak`) REFERENCES `document_folders` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `document_folders`
--
ALTER TABLE `document_folders`
  ADD CONSTRAINT `document_folders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD CONSTRAINT `pengajuans_assigned_funding_source_foreign` FOREIGN KEY (`assigned_funding_source`) REFERENCES `funding_sources` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuans_assigned_payment_method_foreign` FOREIGN KEY (`assigned_payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuans_finance_officers_id_foreign` FOREIGN KEY (`finance_officers_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuans_revenue_officer_id_foreign` FOREIGN KEY (`revenue_officer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
