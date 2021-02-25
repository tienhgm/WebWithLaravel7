-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 25, 2021 lúc 09:08 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravelpro_mart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_post`
--

INSERT INTO `category_post` (`id`, `name`, `created_at`, `updated_at`) VALUES
(9, 'Thời trang mùa đông', '2021-02-05 08:37:54', '2021-02-05 08:38:35'),
(10, 'Thời trang mùa hè', '2021-02-05 08:38:27', '2021-02-05 08:38:27'),
(11, 'Thời trang hot 2021', '2021-02-05 08:38:46', '2021-02-05 08:38:46'),
(12, 'Thời trang hot 2020', '2021-02-05 08:38:55', '2021-02-05 08:38:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Jacket', '2021-02-04 19:41:43', '2021-02-04 19:41:43'),
(6, 'Sweater', '2021-02-04 19:41:51', '2021-02-04 19:41:51'),
(7, 't-shirt', '2021-02-04 19:42:31', '2021-02-04 19:42:31'),
(8, 'Suit', '2021-02-04 19:42:54', '2021-02-04 19:45:25'),
(9, 'Bra', '2021-02-17 03:56:26', '2021-02-17 03:56:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_30_054534_add_soft_delete_to_users', 2),
(5, '2021_01_30_114250_create_category_post_table', 3),
(6, '2021_01_30_120140_create_post_table', 4),
(7, '2021_01_30_120950_create_post_table', 5),
(8, '2021_02_01_053736_add_image_to_post_table', 6),
(9, '2021_02_01_055051_add_status_to_post', 7),
(10, '2021_02_01_080602_create_post_table', 8),
(11, '2021_02_01_083953_add_cate_id_to_post', 9),
(12, '2021_02_01_142539_add_status_to_post', 10),
(13, '2021_02_03_032147_create_products_table', 11),
(14, '2021_02_03_040717_create_category_product_table', 12),
(15, '2021_02_03_041042_add_cate_product_id_to_products', 13),
(16, '2021_02_04_024917_add_photo_to_table', 14),
(17, '2021_02_05_033742_add_authority_to_users', 15),
(18, '2021_02_05_040017_create_roles_table', 16),
(19, '2021_02_05_040133_add_role_id_to_users', 17),
(20, '2021_02_08_033007_create_shoppingcart_table', 18),
(21, '2021_02_09_011814_create_payment_table', 19),
(22, '2021_02_09_011857_create_orders_table', 19),
(23, '2021_02_09_011924_create_orderdetails_table', 19),
(24, '2021_02_09_021024_add_foreign_key_to_orderdetails', 20),
(25, '2021_02_09_034157_add_user_name_to_orderdetails_table', 21),
(26, '2021_02_15_203301_add_soft_delete_to_orders', 22),
(27, '2021_02_17_101914_add_soft_delete_to_products', 23),
(28, '2021_02_17_110642_create_wishlists_table', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderdetails_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `price`, `quantity`, `order_id`, `product_id`, `product_name`, `product_photo`, `created_at`, `updated_at`) VALUES
(24, 790000, 3, 30, 8, 'Sweater hockie women', '1612707770.jpeg', '2021-02-15 13:54:24', NULL),
(25, 990000, 2, 31, 10, 'Sweater jankie hood', '1612708620.jpeg', '2021-02-15 14:23:27', NULL),
(26, 1190000, 1, 31, 9, 'Jacket 1', '1612537278.jpeg', '2021-02-15 14:23:27', NULL),
(27, 890000, 18, 32, 7, 'Sweater nữ', '1612493435.jpeg', '2021-02-15 15:38:06', NULL),
(28, 1190000, 9, 33, 9, 'Jacket 1', '1612537278.jpeg', '2021-02-15 15:38:25', NULL),
(29, 890000, 100, 34, 7, 'Sweater nữ', '1612493435.jpeg', '2021-02-16 08:12:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_total`, `order_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 8, 2370000, 1, '2021-02-14 13:54:24', '2021-02-16 08:46:00', NULL),
(31, 8, 3170000, 1, '2021-02-14 14:23:27', '2021-02-15 14:23:44', NULL),
(32, 15, 16020000, 1, '2021-02-15 15:38:06', '2021-02-15 15:39:32', NULL),
(33, 16, 10710000, 0, '2021-02-15 15:38:25', '2021-02-17 03:03:20', '2021-02-17 03:03:20'),
(34, 16, 89000000, 1, '2021-02-16 08:12:26', '2021-02-16 08:13:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `thumbnail`, `cate_id`, `status`, `created_at`, `updated_at`) VALUES
(29, 'bai viet 1', 'noi dung bai viet 1', '1612539639.jpeg', 12, 1, '2021-02-05 08:40:39', '2021-02-05 08:41:23'),
(30, 'bai viet 2', 'noi dung bai viet 2', '1612539657.jpeg', 10, 1, '2021-02-05 08:40:57', '2021-02-05 08:40:57'),
(31, 'Bài viết 3', 'noi dung bai viet 3', '1612539680.jpeg', 11, 1, '2021-02-05 08:41:20', '2021-02-05 08:41:20'),
(32, 'bai viet 4', 'noi dung bai viet 4', '1612539705.jpeg', 9, 1, '2021-02-05 08:41:45', '2021-02-05 08:41:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `cate_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `price`, `quantity`, `status`, `cate_product_id`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Sweater nữ', 'Áo len nữ 2021', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, quibusdam harum incidunt consectetur sequi quos quas sapiente doloribus. Explicabo accusantium at architecto commodi. Temporibus nam quia, rem veniam eligendi similique.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. ', 890000, 6, 1, 6, '1612493435.jpeg', '2021-02-04 19:50:35', '2021-02-07 07:40:29', NULL),
(8, 'Sweater hockie women', 'Áo sweater nữ 2019', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint, quibusdam harum incidunt consectetur sequi quos quas sapiente doloribus. Explicabo accusantium at architecto commodia 21.', 790000, 3, 1, 6, '1612707770.jpeg', '2021-02-04 19:51:42', '2021-02-07 07:25:36', NULL),
(9, 'Jacket 1', 'Jacket hot năm 2020', 'Jacket Hot 2020 sản xuất tại UK', 1190000, 5, 1, 5, '1612537278.jpeg', '2021-02-05 08:01:18', '2021-02-05 08:01:23', NULL),
(10, 'Sweater jankie hood', 'Sweater nữ', 'Sweater thuộc bộ sưu tập jankie mamoe 2020 - bộ sưu tập lớn nhất của hãng walkie', 990000, 3, 1, 6, '1612708620.jpeg', '2021-02-07 07:37:00', '2021-02-17 03:52:38', NULL),
(11, 'Bra women', 'Bra collection 2021', 'Bra collection 2021 in paris fashion week', 290000, 10, 1, 9, '1613534177.jpeg', '2021-02-17 03:56:17', '2021-02-17 03:57:16', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admintrator', NULL, NULL),
(2, 'subcriber', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `address`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Nguyễn Mạnh Tiến', 'support_tienhg@gmail.com', NULL, '$2y$10$fh7ooDj386iqizw6x1wgm.Oj9dcH8TxlomCoU2B9sZ3obKgsXTbxO', NULL, 1, NULL, NULL, '2021-02-04 21:15:01', '2021-02-16 08:47:14', '2021-02-16 08:47:14'),
(8, 'Thúy Hiền', 'thuyhienhg@gmail.com', NULL, '$2y$10$q2aPQsGP9TeGgp..O7Lo/eor418vtP7FFJkywYE16t4mEVozGT4By', NULL, 2, 'Tuyên Quang ', 842432000, '2021-02-04 21:16:22', '2021-02-04 21:16:22', NULL),
(9, 'Tiến Nguyễn', 'support_tien@gmail.com', NULL, '$2y$10$a9CLaXXFp64wiykuBI6adOq1RkCfYaktsl4mC/2PvRLDUd16CRQ3e', NULL, 1, NULL, NULL, '2021-02-05 07:06:04', '2021-02-05 07:59:58', NULL),
(15, 'Hoàng Đức Mạnh', 'hdm@gmail.com', NULL, '$2y$10$OWIyowXpkzGjF3rN1YZMRupN0iChxvUvjlasZ8YHQSUCLMD/R3.hm', NULL, 2, 'Cổ Nhuế', 333959200, '2021-02-15 15:32:59', '2021-02-15 15:50:28', NULL),
(16, 'Phạm Thái Hoàng', 'pth@gmail.com', NULL, '$2y$10$BjHg3JeTJnqeiuwufVL.XeOnDGjJCsyscZNbtO8GyPMTH6uXMZd1a', NULL, 2, 'Hà Giang', 12365489, '2021-02-15 15:37:31', '2021-02-15 15:37:31', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`),
  ADD KEY `orderdetails_order_id_foreign` (`order_id`),
  ADD KEY `orderdetails_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_product_id_foreign` (`cate_product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderdetails_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `category_post` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_product_id_foreign` FOREIGN KEY (`cate_product_id`) REFERENCES `category_product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
