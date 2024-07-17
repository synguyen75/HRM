-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2024 lúc 11:55 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projcet_quanly`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`, `mo_ta`, `created_at`, `updated_at`) VALUES
(2, 'Trưởng phòng', 'Người điều hành phòng', NULL, '2024-07-16 03:24:41'),
(3, 'Phó phòng', 'Người hỗ trợ cho trưởng phòng', NULL, NULL),
(4, 'Nhân viên', 'Người thức hiện các công việc do trưởng phòng và phó phòng giao', NULL, NULL),
(8, 'Bảo vệ', 'Bảo vệ', '2024-07-16 01:16:57', '2024-07-16 01:16:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khen_thuongs`
--

CREATE TABLE `khen_thuongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nhan_vien` bigint(20) UNSIGNED DEFAULT NULL,
  `id_nguoi_khen_thuong` bigint(20) UNSIGNED DEFAULT NULL,
  `ngay_khen_thuong` date NOT NULL,
  `noi_dung` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ky_luats`
--

CREATE TABLE `ky_luats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nhan_vien` bigint(20) UNSIGNED DEFAULT NULL,
  `id_nguoi_thuc_hien` bigint(20) UNSIGNED DEFAULT NULL,
  `ngay_ky_luat` date NOT NULL,
  `noi_dung` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luongs`
--

CREATE TABLE `luongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nhan_vien` bigint(20) UNSIGNED NOT NULL,
  `muc_luong_theo_ngay` double(8,2) NOT NULL,
  `muc_luong` decimal(10,2) NOT NULL,
  `ngay_cong` int(11) NOT NULL,
  `ngay_hieu_luc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luongs`
--

INSERT INTO `luongs` (`id`, `id_nhan_vien`, `muc_luong_theo_ngay`, `muc_luong`, `ngay_cong`, `ngay_hieu_luc`, `created_at`, `updated_at`) VALUES
(1, 63, 500.05, 16705.45, 30, '1981-05-25', NULL, '2024-07-16 03:24:30'),
(2, 85, 794.59, 15891.80, 20, '2021-02-15', NULL, NULL),
(6, 68, 770.96, 16190.16, 21, '2019-04-30', NULL, NULL),
(7, 82, 632.97, 18989.10, 30, '2017-05-13', NULL, NULL),
(8, 68, 652.25, 16958.50, 26, '1990-01-02', NULL, NULL),
(9, 88, 262.31, 7344.68, 28, '1992-12-07', NULL, NULL),
(10, 63, 433.65, 11274.90, 26, '1999-01-31', NULL, NULL),
(11, 73, 973.75, 20448.75, 21, '1999-02-24', NULL, NULL),
(12, 86, 483.54, 11121.42, 23, '1984-08-02', NULL, NULL),
(13, 73, 361.83, 10493.07, 29, '1991-01-08', NULL, NULL),
(14, 83, 784.63, 19615.75, 25, '2022-03-09', NULL, NULL),
(15, 67, 652.14, 18912.06, 29, '2018-11-28', NULL, NULL),
(16, 86, 181.85, 3637.00, 20, '1993-07-12', NULL, NULL),
(17, 80, 668.12, 16034.88, 24, '2005-06-12', NULL, NULL),
(19, 79, 544.01, 14144.26, 26, '1985-12-20', NULL, NULL),
(20, 63, 247.60, 6437.60, 26, '1990-07-25', NULL, NULL),
(21, 89, 220.76, 5519.00, 25, '2011-01-23', NULL, NULL),
(22, 83, 610.30, 15867.80, 26, '1974-05-03', NULL, NULL),
(23, 87, 192.35, 5770.50, 30, '1978-12-21', NULL, NULL),
(24, 68, 785.58, 15711.60, 20, '2007-07-17', NULL, NULL),
(25, 66, 760.47, 20532.69, 27, '1974-03-15', NULL, NULL),
(26, 78, 440.19, 10124.37, 23, '1987-08-24', NULL, NULL),
(27, 84, 460.41, 10129.02, 22, '1992-01-13', NULL, NULL),
(28, 62, 697.09, 13941.80, 20, '1989-09-05', NULL, NULL),
(29, 67, 226.38, 6112.26, 27, '1980-10-24', NULL, NULL),
(30, 72, 505.06, 14141.68, 28, '2011-11-09', NULL, NULL),
(31, 62, 100.00, 1200.00, 12, '2024-07-16', '2024-07-16 07:27:50', '2024-07-16 07:27:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2024_07_14_091913_create_phong_bans_table', 1),
(30, '2024_07_14_091923_create_chuc_vus_table', 1),
(31, '2024_07_14_091959_create_nhom_nhan_viens_table', 1),
(32, '2024_07_14_092543_create_nhan_viens', 1),
(33, '2024_07_14_092619_create_luongs', 1),
(34, '2024_07_14_092654_create_khen_thuongs', 1),
(35, '2024_07_14_092710_create_ky_luats', 1),
(36, '2024_07_14_092901_create_tai_khoans', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_viens`
--

CREATE TABLE `nhan_viens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `bang_cap` enum('THCS','THPT','Cao Đẳng','Đại Học','Thạc Sĩ') NOT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `id_phong_ban` bigint(20) UNSIGNED DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_chuc_vus` bigint(20) UNSIGNED DEFAULT NULL,
  `anh_dai_dien` varchar(255) DEFAULT 'storage/images/avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_viens`
--

INSERT INTO `nhan_viens` (`id`, `ho_ten`, `bang_cap`, `so_dien_thoai`, `dia_chi`, `id_phong_ban`, `trang_thai`, `created_at`, `updated_at`, `id_chuc_vus`, `anh_dai_dien`) VALUES
(62, 'Ms. Irma Bartell', 'THCS', '+1.228.930.9956', '41745 Chet Mill Suite 344Port Coltenbury, MN 07684-4165', 2, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(63, 'Moriah Batz', 'Thạc Sĩ', '+1-629-673-8974', '837 Kory Highway Apt. 886\nMaxfurt, FL 71604-4090', 3, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(64, 'Sincere Roob', 'THCS', '+1-551-323-3088', '2850 Romaguera Rue Suite 219\nLake Cassieshire, NM 62429-0834', 4, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(65, 'Colton Feeney', 'THCS', '(804) 396-2867', '374 Rasheed Flat\nFramiside, CO 23017-3792', 4, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(66, 'Nash Grady', 'Cao Đẳng', '(786) 592-3472', '28220 Marks Falls\nEast Joseph, SD 24356', 4, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(67, 'Miss Imelda Kshlerin', 'THPT', '(215) 812-2241', '1590 Carole Expressway Suite 769\nKendallfort, SC 55792-8036', 2, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(68, 'Brooklyn Parisian', 'Đại Học', '1-856-217-5067', '6623 Brenda Freeway Suite 026\nSouth Ilamouth, DE 72348-9830', 4, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(70, 'Mr. Mario Hoppe', 'THPT', '+1-731-950-2169', '32141 Wilderman Pine Suite 799\nSchneiderchester, WV 87515', 4, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(71, 'Sterling Morar', 'Thạc Sĩ', '1-971-658-6589', '20173 Lenora Harbors\nRobertomouth, VA 38952', 2, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(72, 'Mr. Wilfredo Green', 'Đại Học', '1-385-848-0031', '3270 Wuckert Prairie Suite 796\nNew Jeraldtown, OH 11288', 4, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(73, 'Abel Jacobi', 'Đại Học', '+1 (802) 748-8554', '28358 Garrick Ford\nNorth Kelvin, MT 31638', 4, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(74, 'Lavon Rutherford', 'THPT', '+14102195130', '8529 Zakary Garden Apt. 394\nEast Jeromychester, NE 35863', 4, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(75, 'Miss Christina Pouros', 'Đại Học', '417-942-8062', '4808 Rowan Park\nEast Esperanza, NV 43296-9891', 2, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(76, 'Prof. Alexandria Halvorson DVM', 'THPT', '(930) 275-5344', '55132 Mariam Shoal\nAdellberg, NM 87220-2914', 4, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(77, 'Madge Roberts', 'THCS', '341-206-2998', '9211 Ceasar Pine Apt. 244\nNorth Eulah, KY 19107-4980', 4, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(78, 'Joanny Anderson', 'THCS', '772.431.8666', '2743 Ortiz Harbors Suite 884\nEast Clairville, AK 88550', 4, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(79, 'Rasheed Yundt', 'Đại Học', '1-534-339-6777', '183 Heber Mountain\nShanelmouth, DC 18198', 4, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(80, 'Marques Labadie', 'Thạc Sĩ', '+1-785-630-4352', '57784 Enid Burg\nHicklefort, AL 70166-6839', 2, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(81, 'Buster Rosenbaum', 'THPT', '1-502-351-7224', '8020 Gulgowski Meadow\nPort Jasen, VT 45559-7240', 3, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(82, 'Natalia Donnelly', 'Đại Học', '1-847-845-3374', '240 Kennith Village Apt. 938\nCormierborough, NC 25871-2912', 3, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(83, 'Seamus Ward', 'Thạc Sĩ', '1-321-804-3708', '83249 Kathleen Route Apt. 431\nAntoniettaborough, NJ 65275', 4, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(84, 'Lucy Larkin', 'Thạc Sĩ', '+1.515.752.9840', '802 Jedediah Haven Suite 890\nAmparomouth, AZ 99394', 2, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(85, 'Meaghan Schumm', 'Đại Học', '(229) 375-9981', '9180 Vincenzo Forest\nBlandaborough, OR 19954-9605', 3, 1, NULL, NULL, 2, 'storage/images/avatar.png'),
(86, 'Syble Berge', 'THPT', '541-577-3895', '91512 Violette Courts\nGleichnerstad, HI 15351', 2, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(87, 'Gideon Jacobs', 'THPT', '(252) 818-0007', '83998 Lind Row\nKevenfort, GA 12895', 3, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(88, 'Katrine Corkery V', 'THPT', '364-363-1390', '9427 Douglas Mountains\nKeeblerfurt, IN 10542-9866', 3, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(89, 'Tyrel Morissette', 'THCS', '1-352-318-0324', '75804 Jonathan Port\nMyrtlefort, WV 69933-0740', 2, 1, NULL, NULL, 4, 'storage/images/avatar.png'),
(93, 'Sỹdsada', 'Cao Đẳng', '098798655751', 'Hà nội', 2, 1, NULL, NULL, 3, 'storage/images/avatar.png'),
(94, 'San', 'Thạc Sĩ', '09879865575', 'Hà nội', 2, 1, NULL, NULL, 2, 'storage/images/2mqEO8AKGfBM1sZsuxAnb9tGlQjfAyPwfmfqa7Zo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom_nhan_viens`
--

CREATE TABLE `nhom_nhan_viens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_nhom` varchar(255) NOT NULL,
  `cong_viec` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_nhan_vien` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_bans`
--

CREATE TABLE `phong_bans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_phong_ban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_bans`
--

INSERT INTO `phong_bans` (`id`, `ten_phong_ban`, `created_at`, `updated_at`) VALUES
(2, 'Phòng kế toán', NULL, NULL),
(3, 'Phòng nhân sự', NULL, NULL),
(4, 'Phòng IT', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nhan_vien` bigint(20) UNSIGNED DEFAULT NULL,
  `ten_tai_khoan` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `quyen_han` enum('Admin','User') NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `id_nhan_vien`, `ten_tai_khoan`, `mat_khau`, `quyen_han`, `trang_thai`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, NULL, 'sy123', '$2y$10$d5M47GcquWayefZdjksRw.ohPxlluZJSz07hgxjNLmLVAJxVisn62', 'Admin', 1, 'sy@gmail.com', NULL, '2024-07-15 01:04:17', '2024-07-15 01:04:17'),
(5, NULL, 'User', '$2y$10$VFxBmlO8ZYEGPJWcQfcinOtRGv88CJ6s1Uj6UIFsLI7S6jijtzMyq', 'User', 1, 'user@gmail.com', NULL, '2024-07-15 01:57:08', '2024-07-15 01:57:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khen_thuongs`
--
ALTER TABLE `khen_thuongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khen_thuongs_id_nhan_vien_foreign` (`id_nhan_vien`),
  ADD KEY `khen_thuongs_id_nguoi_khen_thuong_foreign` (`id_nguoi_khen_thuong`);

--
-- Chỉ mục cho bảng `ky_luats`
--
ALTER TABLE `ky_luats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ky_luats_id_nhan_vien_foreign` (`id_nhan_vien`),
  ADD KEY `ky_luats_id_nguoi_thuc_hien_foreign` (`id_nguoi_thuc_hien`);

--
-- Chỉ mục cho bảng `luongs`
--
ALTER TABLE `luongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_nhan_vien_luongs` (`id_nhan_vien`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_viens`
--
ALTER TABLE `nhan_viens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhan_viens_id_phong_ban_foreign` (`id_phong_ban`),
  ADD KEY `fk_id_chuc_vus` (`id_chuc_vus`);

--
-- Chỉ mục cho bảng `nhom_nhan_viens`
--
ALTER TABLE `nhom_nhan_viens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_nhan_vien` (`id_nhan_vien`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phong_bans`
--
ALTER TABLE `phong_bans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tai_khoans_email_unique` (`email`),
  ADD KEY `tai_khoans_id_nhan_vien_foreign` (`id_nhan_vien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khen_thuongs`
--
ALTER TABLE `khen_thuongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ky_luats`
--
ALTER TABLE `ky_luats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `luongs`
--
ALTER TABLE `luongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `nhan_viens`
--
ALTER TABLE `nhan_viens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `nhom_nhan_viens`
--
ALTER TABLE `nhom_nhan_viens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phong_bans`
--
ALTER TABLE `phong_bans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `khen_thuongs`
--
ALTER TABLE `khen_thuongs`
  ADD CONSTRAINT `khen_thuongs_id_nguoi_khen_thuong_foreign` FOREIGN KEY (`id_nguoi_khen_thuong`) REFERENCES `nhan_viens` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `khen_thuongs_id_nhan_vien_foreign` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_viens` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `ky_luats`
--
ALTER TABLE `ky_luats`
  ADD CONSTRAINT `ky_luats_id_nguoi_thuc_hien_foreign` FOREIGN KEY (`id_nguoi_thuc_hien`) REFERENCES `nhan_viens` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ky_luats_id_nhan_vien_foreign` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_viens` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `luongs`
--
ALTER TABLE `luongs`
  ADD CONSTRAINT `fk_id_nhan_vien_luongs` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_viens` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhan_viens`
--
ALTER TABLE `nhan_viens`
  ADD CONSTRAINT `fk_id_chuc_vus` FOREIGN KEY (`id_chuc_vus`) REFERENCES `chuc_vus` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `nhan_viens_id_phong_ban_foreign` FOREIGN KEY (`id_phong_ban`) REFERENCES `phong_bans` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `nhom_nhan_viens`
--
ALTER TABLE `nhom_nhan_viens`
  ADD CONSTRAINT `fk_id_nhan_vien` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_viens` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `tai_khoans_id_nhan_vien_foreign` FOREIGN KEY (`id_nhan_vien`) REFERENCES `nhan_viens` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
