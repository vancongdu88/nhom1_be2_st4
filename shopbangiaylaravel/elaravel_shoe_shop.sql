-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 19, 2021 lúc 09:21 AM
-- Phiên bản máy phục vụ: 8.0.21
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elaravel_shoe_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2021_05_17_143552_create_tbl_product', 2),
(8, '2021_05_17_152228_create_tbl_brand_product', 3),
(9, '2021_05_17_152918_create_tbl_category_product', 4),
(10, '2021_05_17_153459_create_tbl_admin', 5),
(11, '2021_05_17_153800_create_tbl_customers', 6),
(12, '2021_05_17_171125_create_tbl_gallery', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '01338649', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_slug`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'adidas', 'adidas', 0, NULL, NULL),
(2, 'Nike', 'nike', 'Nike', 0, NULL, NULL),
(3, 'Vans', 'vans', 'Vans', 0, NULL, NULL),
(5, 'GUCCI', 'gucci', 'GUCCI', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

DROP TABLE IF EXISTS `tbl_category_product`;
CREATE TABLE IF NOT EXISTS `tbl_category_product` (
  `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_category_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_parent` int UNSIGNED NOT NULL,
  `category_status` int NOT NULL,
  `category_order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `meta_keywords`, `category_name`, `slug_category_product`, `category_desc`, `category_parent`, `category_status`, `category_order`, `created_at`, `updated_at`) VALUES
(1, 'Giày thể thao', 'Giày thể thao', 'giay-the-thao', 'Giày thể thao', 0, 0, 0, NULL, NULL),
(2, 'Giày nữ', 'Giày nữ', 'giay-nu', 'Giày nữ năng động', 0, 0, 0, NULL, NULL),
(3, 'Giày nam', 'Giày nam', 'giay-nam', 'Giày nam năng động', 0, 0, 0, NULL, NULL),
(4, 'giày nữ\r\ngiày cao gót', 'Giày Cao Gót', 'giay-cao-got', 'Giày Cao Gót', 0, 0, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_vip` int DEFAULT NULL,
  `customer_token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `customer_picture`, `customer_vip`, `customer_token`, `created_at`, `updated_at`) VALUES
(1, 'Tấn Quy', 'nguyentanquy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0316646494', NULL, NULL, NULL, NULL, NULL),
(2, 'Công Dự', 'vancongdu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '21646366631', NULL, NULL, NULL, '2021-05-17 17:31:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_gallery`
--

DROP TABLE IF EXISTS `tbl_gallery`;
CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `gallery_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_name`, `gallery_image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1_279.jpg', '1_279.jpg', 2, NULL, NULL),
(2, '9_263.jpg', '9_263.jpg', 3, NULL, NULL),
(3, '1_159.jpg', '1_159.jpg', 4, NULL, NULL),
(4, '1_293.jpg', '1_293.jpg', 6, NULL, NULL),
(5, '3_130.jpg', '3_130.jpg', 7, NULL, NULL),
(6, '3_138.jpg', '3_138.jpg', 8, NULL, NULL),
(7, '4_140.jpg', '4_140.jpg', 9, NULL, NULL),
(8, '8_27.jpg', '8_27.jpg', 10, NULL, NULL),
(9, '8_142.jpg', '8_142.jpg', 11, NULL, NULL),
(10, '4_259.jpg', '4_259.jpg', 12, NULL, NULL),
(11, '5_16.jpg', '5_16.jpg', 13, NULL, NULL),
(12, '6_275.jpg', '6_275.jpg', 14, NULL, NULL),
(13, '6_276.jpg', '6_276.jpg', 15, NULL, NULL),
(14, '6_286.jpg', '6_286.jpg', 16, NULL, NULL),
(15, '6_187.jpg', '6_187.jpg', 17, NULL, NULL),
(16, '6_184.jpg', '6_184.jpg', 18, NULL, NULL),
(17, '1248.jpg', '1248.jpg', 19, NULL, NULL),
(18, '1338.jpg', '1338.jpg', 20, NULL, NULL),
(19, '1447.jpg', '1447.jpg', 21, NULL, NULL),
(20, '1595.png', '1595.png', 22, NULL, NULL),
(21, '1684.jpg', '1684.jpg', 23, NULL, NULL),
(22, '1771.jpg', '1771.jpg', 24, NULL, NULL),
(23, '1824.jpg', '1824.jpg', 25, NULL, NULL),
(24, '1930.jpg', '1930.jpg', 26, NULL, NULL),
(25, '2010.jpg', '2010.jpg', 27, NULL, NULL),
(26, '2112.png', '2112.png', 28, NULL, NULL),
(27, '227.jpg', '227.jpg', 29, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_quantity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sold` int DEFAULT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `price_cost` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_views` int DEFAULT NULL,
  `product_status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_tags`, `product_quantity`, `product_sold`, `product_slug`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `price_cost`, `product_image`, `product_file`, `product_views`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas N100', 'giày adidas,giày thể thao', '20', NULL, 'adidas-n100', 1, 1, '<p>Adidas N100</p>', '<p>Adidas N100</p>', 2000000, '2100000', '1_220.jpg', NULL, NULL, 0, NULL, NULL),
(3, 'Womens adidas Superstar Athletic', 'adidassupertar', '5', NULL, 'womens-adidas-superstar-athletic', 2, 1, '<h1>Womens adidas Superstar Athletic</h1>', '<h1>Womens adidas Superstar Athletic</h1>', 22000000, '20000000', '9_263.jpg', NULL, NULL, 0, NULL, NULL),
(4, 'adidas Superstars Celebrating Inclusivity', 'adidas', '5', NULL, 'adidas-superstars-celebrating-inclusivity', 3, 1, '<p>adidas Superstars Celebrating Inclusivity</p>', '<p>adidas Superstars Celebrating Inclusivity</p>', 15000000, '13000000', '1_159.jpg', NULL, NULL, 0, NULL, NULL),
(5, 'Nike Jordan 1 Mid Smoke Grey', 'Nike', '10', NULL, 'nike-jordan-1-mid-smoke-grey', 3, 2, '<p>Nike Jordan 1 Mid Smoke Grey</p>', '<p>Nike Jordan 1 Mid Smoke Grey</p>', 3300000, '4200000', '7_277.jpg', NULL, NULL, 0, NULL, NULL),
(6, 'Nike Jordan 1 Mid Smoke Grey', 'Nike', '10', NULL, 'nike-jordan-1-mid-smoke-grey', 3, 2, '<p>Nike Jordan 1 Mid Smoke Grey</p>', '<p>Nike Jordan 1 Mid Smoke Grey</p>', 3300000, '4200000', '1_293.jpg', NULL, NULL, 0, NULL, NULL),
(7, 'Nike Air Force 1 X Dragon Para Noise', 'Nike', '7', NULL, 'nike-air-force-1-x-dragon-para-noise', 3, 2, '<h2><a href=\"https://giaygiare.vn/nike-air-force-1-x-gdragon-para-noise.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Nike Air Force 1 X Dragon Para Noise\">Nike Air Force 1 X Dragon Para Noise</a></h2>', '<h2><a href=\"https://giaygiare.vn/nike-air-force-1-x-gdragon-para-noise.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Nike Air Force 1 X Dragon Para Noise\">Nike Air Force 1 X Dragon Para Noise</a></h2>', 16000000, '185000000', '3_130.jpg', NULL, NULL, 0, NULL, NULL),
(8, 'Adidas Yeezy 700 V2 Static', 'Adidas', '3', NULL, 'adidas-yeezy-700-v2-static', 3, 1, '<h2><a href=\"https://giaygiare.vn/adidas-yeezy-700-v2-static-trang-bac-nam-nu.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Adidas Yeezy 700 V2 Static\">Adidas Yeezy 700 V2 Static</a></h2>', '<h2><a href=\"https://giaygiare.vn/adidas-yeezy-700-v2-static-trang-bac-nam-nu.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Adidas Yeezy 700 V2 Static\">Adidas Yeezy 700 V2 Static</a></h2>', 17000000, '14500000', '3_213.jpg', NULL, NULL, 0, NULL, NULL),
(9, 'Adidas Ultra Boost 5.0 Core Black', 'Adidas', '13', NULL, 'adidas-ultra-boost-50-core-black', 3, 1, '<h2><a href=\"https://giaygiare.vn/adidas-ultra-boost-5-0-den-de-trang-rep-1-1-2019.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Adidas Ultra Boost 5.0 Core Black\">Adidas Ultra Boost 5.0 Core Black</a></h2>', '<h2><a href=\"https://giaygiare.vn/adidas-ultra-boost-5-0-den-de-trang-rep-1-1-2019.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Adidas Ultra Boost 5.0 Core Black\">Adidas Ultra Boost 5.0 Core Black</a></h2>', 5000000, '4000000', '4_140.jpg', NULL, NULL, 0, NULL, NULL),
(10, 'Adidas Yeezy 350 Static - Phản quang', 'Adidas', '4', NULL, 'adidas-yeezy-350-static-phan-quang', 1, 1, '<h2><a href=\"https://giaygiare.vn/adidas-yeezy-boost-350-v2-static-nam-nu-rep-1-1-full-phan-quang.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Adidas Yeezy 350 Static - Phản quang\">Adidas Yeezy 350 Static - Phản quang</a></h2>', '<h2><a href=\"https://giaygiare.vn/adidas-yeezy-boost-350-v2-static-nam-nu-rep-1-1-full-phan-quang.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"Adidas Yeezy 350 Static - Phản quang\">Adidas Yeezy 350 Static - Phản quang</a></h2>', 11000000, '7000000', '5_224.jpg', NULL, NULL, 0, NULL, NULL),
(11, 'Vans Era N110', 'vans', '12', NULL, 'vans-era-n110', 3, 3, '<h2><strong>Vans Era</strong></h2>', '<h2><strong>Vans Era</strong></h2>', 3000000, '2500000', '8_142.jpg', NULL, NULL, 0, NULL, NULL),
(12, 'Vans Old Skool', 'vans', '10', NULL, 'vans-old-skool', 1, 3, '<h2><strong>Vans Old Skool</strong></h2>', '<h2><strong>Vans Old Skool</strong></h2>', 2000000, '1700000', '4_259.jpg', NULL, NULL, 0, NULL, NULL),
(13, 'Vans Authentic', 'vans', '5', NULL, 'vans-authentic', 2, 3, '<h2><strong>Vans Authentic</strong></h2>', '<h2><strong>Vans Authentic</strong></h2>', 2300000, '1900000', '5_16.jpg', NULL, NULL, 0, NULL, NULL),
(14, 'Giày Cao Gót Slingback Gót', 'Giày nữ', '8', NULL, 'giày-cao-gót-slingback-got', 4, 5, '<h1>Giày Cao Gót Slingback G&oacute;t 2 M&agrave;u</h1>', '<h1>Giày Cao Gót Slingback G&oacute;t 2 M&agrave;u</h1>', 300000, '250000', '6_275.jpg', NULL, NULL, 0, NULL, NULL),
(18, 'Giày Cao Gót Khóa Trang Trí Họa Tiết Mê Cung', 'giàynu ,giàycaogot,gucci', '10', NULL, 'giày-cao-gót-khoa-trang-tri-hoa-tiet-me-cung', 4, 5, '<h1>Giày Cao Gót Kh&oacute;a Trang Tr&iacute; Họa Tiết M&ecirc; Cung</h1>', '<h1>Giày Cao Gót Kh&oacute;a Trang Tr&iacute; Họa Tiết M&ecirc; Cung</h1>', 500000, '350000', '6_184.jpg', NULL, NULL, 0, NULL, NULL),
(19, 'Giày Cao Gót Gót Trụ Khóa Trang Trí', 'giaynu,giaycaogot,gucci', '5', NULL, 'giày-cao-gót-got-tru-khoa-trang-tri', 4, 5, '<h1>Giày Cao Gót G&oacute;t Trụ Kh&oacute;a Trang Tr&iacute;</h1>', '<h1>Giày Cao Gót G&oacute;t Trụ Kh&oacute;a Trang Tr&iacute;</h1>', 340000, '250000', '1248.jpg', NULL, NULL, 0, NULL, NULL),
(17, 'Giày Cao Gót Khóa Trang Trí Họa Tiết Mê Cung', 'giàynu,giàycaogot,guci', '10', NULL, 'giày-cao-gót-khoa-trang-tri-hoa-tiet-me-cung', 4, 4, '<h1>Giày Cao Gót Kh&oacute;a Trang Tr&iacute; Họa Tiết M&ecirc; Cung</h1>', '<h1>Giày Cao Gót Kh&oacute;a Trang Tr&iacute; Họa Tiết M&ecirc; Cung</h1>', 500000, '350000', '6_187.jpg', NULL, NULL, 0, NULL, NULL),
(20, 'Giày Cao Gót Gót Thanh Trang Trí Đính Đá', 'giaynu,giaycaogot,gucci', '10', NULL, 'giày-cao-gót-got-thanh-trang-tri-dinh-da', 4, 5, '<h1>Giày Cao Gót G&oacute;t Thanh Trang Tr&iacute; Đ&iacute;nh Đ&aacute;</h1>', '<h1>Giày Cao Gót G&oacute;t Thanh Trang Tr&iacute; Đ&iacute;nh Đ&aacute;</h1>', 500000, '430000', '1338.jpg', NULL, NULL, 0, NULL, NULL),
(21, 'Vans Oldskool Style 36 Redline VNOA3DZ3OXV5 Màu Trắng', 'vans,giàynam', '15', NULL, 'vans-oldskool-style-36-redline-vnoa3dz3oxv5-mau-trang', 3, 3, '<h1>Vans Oldskool Style 36 Redline VNOA3DZ3OXV5 M&agrave;u Trắng</h1>', '<h1>Vans Oldskool Style 36 Redline VNOA3DZ3OXV5 M&agrave;u Trắng</h1>', 2500000, '2000000', '1447.jpg', NULL, NULL, 0, NULL, NULL),
(22, 'Vans SK8-HI', 'vans,giaynam,giàynam,SK8-HI', '13', NULL, 'vans-sk8-hi', 3, 3, '<p>SK8-HI</p>', '<h1>SK8-HI</h1>', 3500000, '2900000', '1595.png', NULL, NULL, 0, NULL, NULL),
(23, 'Nike giày thể thao Air Max 1 HD', 'Nike,giàythethao,giaynam', '12', NULL, 'nike-giay-the-thao-air-max-1-hd', 1, 2, '<p>Nike gi&agrave;y thể thao Air Max 1 HD</p>', '<p>Nike gi&agrave;y thể thao Air Max 1 HD</p>', 2500000, '1900000', '1684.jpg', NULL, NULL, 0, NULL, NULL),
(24, 'Giày Thể Thao Bóng Rổ Air Jordan 11 Aj11 Ar0715-100', 'jodar ,giaythethao,giaynam', '20', NULL, 'giay-the-thao-bong-ro-air-jordan-11-aj11-ar0715-100', 1, 2, '<p>Gi&agrave;y Thể Thao B&oacute;ng Rổ Air Jordan 11 Aj11 Ar0715-100</p>', '<p>Gi&agrave;y Thể Thao B&oacute;ng Rổ Air Jordan 11 Aj11 Ar0715-100</p>', 4300000, '3300000', '1771.jpg', NULL, NULL, 0, NULL, NULL),
(25, 'Adidas Stan Smith Trainers', 'Adidas,giaynu,giaythethao', '20', NULL, 'adidas-stan-smith-trainers', 2, 1, '<h2><strong>Adidas Stan Smith Trainers</strong></h2>', '<h2><strong>Adidas Stan Smith Trainers</strong></h2>', 14000000, '10000000', '1824.jpg', NULL, NULL, 0, NULL, NULL),
(26, 'Adidas Yeezy Boost 350 Trainers', 'giaynu,adidas', '12', NULL, 'adidas-yeezy-boost-350-trainers', 2, 1, '<h2><strong>Adidas Yeezy Boost 350 Trainers</strong></h2>', '<h2><strong>Adidas Yeezy Boost 350 Trainers</strong></h2>', 12000000, '10000000', '1930.jpg', NULL, NULL, 0, NULL, NULL),
(27, 'Gucci Sneakers', 'GUCCI,giaynu', '15', NULL, 'gucci-sneakers', 2, 5, '<h2><strong>Gucci Sneakers</strong></h2>', '<h2><strong>Gucci Sneakers</strong></h2>', 13000000, '9000000', '2010.jpg', NULL, NULL, 0, NULL, NULL),
(28, 'VANS CLASSIC SLIP-ON TRUE WHITE', 'vans,giaynu', '12', NULL, 'vans-classic-slip-on-true-white', 2, 3, '<h1>VANS CLASSIC SLIP-ON TRUE WHITE</h1>', '<h1>VANS CLASSIC SLIP-ON TRUE WHITE</h1>', 2300000, '1900000', '2112.png', NULL, NULL, 0, NULL, NULL),
(29, 'VANS DALLAS CLAYTON AUTHENTIC RAINBOW TRUE WHITE', 'vans,giaynu', '10', NULL, 'vans-dallas-clayton-authentic-rainbow-true-white', 2, 3, '<h1>VANS DALLAS CLAYTON AUTHENTIC RAINBOW TRUE WHITE</h1>', '<h1>VANS DALLAS CLAYTON AUTHENTIC RAINBOW TRUE WHITE</h1>', 1600000, '1400000', '227.jpg', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
