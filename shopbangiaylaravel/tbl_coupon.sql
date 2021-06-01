-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 23, 2021 lúc 03:37 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elaravel_auth`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_coupon`
--

DROP TABLE IF EXISTS `tbl_coupon`;
CREATE TABLE IF NOT EXISTS `tbl_coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(150) NOT NULL,
  `coupon_date_end` varchar(50) NOT NULL,
  `coupon_date_start` varchar(50) NOT NULL,
  `coupon_time` int(50) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_status` int(11) NOT NULL DEFAULT 1,
  `coupon_used` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`coupon_id`, `coupon_name`, `coupon_date_end`, `coupon_date_start`, `coupon_time`, `coupon_condition`, `coupon_number`, `coupon_code`, `coupon_status`, `coupon_used`) VALUES
(1, 'Giảm giá black friday', '26/11/2020', '19/11/2020', 94, 1, 10, 'HDH375Y', 1, NULL),
(6, 'Giảm giá noel', '25/11/2020', '19/11/2020', 49, 2, 200000, 'COVID99', 1, ',8,8,8,8,8,8,8,8,8,8,4,4,4,4'),
(7, 'Giảm giá ngày lễ', '30/11/2020', '26/11/2020', 99, 1, 20, 'GIANGAYLE4512', 1, ',8'),
(8, 'Giảm 50%', '31/05/2021', '23/05/2021', 1, 1, 50, 'GIAM50', 1, ',4,4,4,4,4,4,4,4,4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
