-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 18, 2023 lúc 08:27 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(1000) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_library`
--

INSERT INTO `image_library` (`id`, `product_id`, `path`, `created_time`, `last_updated`) VALUES
(6, 2, 'uploads/18-11-2021/air-jordan-xxxvi-psychic-energy-basketball-shoes-1D0pp7_(1).jpg', 1637200055, 1637200055),
(7, 2, 'uploads/18-11-2021/air-jordan-xxxvi-psychic-energy-basketball-shoes-1D0pp7_(2).jpg', 1637200055, 1637200055),
(8, 2, 'uploads/18-11-2021/air-jordan-xxxvi-psychic-energy-basketball-shoes-1D0pp7_(3).jpg', 1637200055, 1637200055),
(9, 2, 'uploads/18-11-2021/air-jordan-xxxvi-psychic-energy-basketball-shoes-1D0pp7_(4).jpg', 1637200055, 1637200055),
(10, 2, 'uploads/18-11-2021/air-jordan-xxxvi-psychic-energy-basketball-shoes-1D0pp7_(5).jpg', 1637200055, 1637200055),
(21, 5, 'uploads/18-11-2021/air-jordan-1-hi-flyease-older-shoes-LdMh25_(1).jpg', 1637201682, 1637201682),
(22, 5, 'uploads/18-11-2021/air-jordan-1-hi-flyease-older-shoes-LdMh25_(2).jpg', 1637201682, 1637201682),
(23, 5, 'uploads/18-11-2021/air-jordan-1-hi-flyease-older-shoes-LdMh25_(3).jpg', 1637201682, 1637201682),
(24, 5, 'uploads/18-11-2021/air-jordan-1-hi-flyease-older-shoes-LdMh25_(4).jpg', 1637201682, 1637201682),
(25, 5, 'uploads/18-11-2021/air-jordan-1-hi-flyease-older-shoes-LdMh25_(5).jpg', 1637201682, 1637201682),
(31, 7, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(7).jpg', 1637203393, 1637203393),
(32, 7, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(8).jpg', 1637203393, 1637203393),
(33, 7, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(9).jpg', 1637203393, 1637203393),
(34, 7, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(10).jpg', 1637203393, 1637203393),
(35, 7, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(11).jpg', 1637203393, 1637203393),
(36, 8, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(13).jpg', 1637203538, 1637203538),
(37, 8, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(14).jpg', 1637203538, 1637203538),
(38, 8, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(15).jpg', 1637203538, 1637203538),
(39, 8, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(16).jpg', 1637203538, 1637203538),
(40, 8, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(17).jpg', 1637203538, 1637203538),
(41, 9, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(19).jpg', 1637203901, 1637203901),
(42, 9, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(21).jpg', 1637203901, 1637203901),
(43, 9, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(22).jpg', 1637203901, 1637203901),
(44, 9, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(23).jpg', 1637203901, 1637203901),
(45, 9, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(24).jpg', 1637203901, 1637203901),
(46, 10, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(26).jpg', 1637204051, 1637204051),
(47, 10, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(27).jpg', 1637204051, 1637204051),
(48, 10, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(28).jpg', 1637204051, 1637204051),
(49, 10, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(29).jpg', 1637204051, 1637204051),
(50, 10, 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(30).jpg', 1637204051, 1637204051),
(51, 11, 'uploads/18-04-2023/jordan_low_1.png', 1681839972, 1681839972),
(52, 11, 'uploads/18-04-2023/jordan_low_3.png', 1681839972, 1681839972),
(53, 11, 'uploads/18-04-2023/jordan_low_4.png', 1681839972, 1681839972),
(54, 11, 'uploads/18-04-2023/jordan_low_5.png', 1681839972, 1681839972),
(71, 16, 'uploads/18-04-2023/Jordan_4_1.png', 1681840964, 1681840964),
(72, 16, 'uploads/18-04-2023/Jordan_4_2.png', 1681840964, 1681840964),
(73, 16, 'uploads/18-04-2023/Jordan_4_3.png', 1681840964, 1681840964),
(74, 16, 'uploads/18-04-2023/Jordan_4_4.png', 1681840964, 1681840964),
(75, 17, 'uploads/18-04-2023/Jordan_4_1.png', 1681840986, 1681840986),
(76, 17, 'uploads/18-04-2023/Jordan_4_2.png', 1681840986, 1681840986),
(77, 17, 'uploads/18-04-2023/Jordan_4_3.png', 1681840986, 1681840986),
(78, 17, 'uploads/18-04-2023/Jordan_4_4.png', 1681840986, 1681840986);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `link`, `position`, `created_time`, `last_updated`) VALUES
(1, 0, 'Level 1', '', 0, 1635386203, 1635256379),
(2, 1, 'Level 2', '', 0, 1635386203, 1635256379),
(3, 2, 'Level 3', '', 0, 1635386203, 1635256379),
(4, 3, 'Level 4', '', 0, 1635386203, 1635256379);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mail` varchar(250) NOT NULL,
  `address` varchar(500) NOT NULL,
  `note` mediumtext NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url_match` varchar(255) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `privilege`
--

INSERT INTO `privilege` (`id`, `group_id`, `name`, `url_match`, `created_time`, `last_updated`) VALUES
(1, 1, 'Danh sách danh mục', 'menu_listing\\.php$', 1635386203, 1635386203),
(2, 1, 'Thêm danh mục', 'menu_editing\\.php$', 1635386203, 1635386203),
(3, 1, 'Sửa danh mục', 'menu_editing\\.php\\?id=\\d+$', 1635386203, 1635386203),
(4, 1, 'Xoá danh mục', 'menu_delete\\.php\\?id=\\d+$', 1635386203, 1635386203),
(5, 2, 'Danh sách sản phẩm', 'product_listing\\.php$', 1635386203, 1635386203),
(6, 2, 'Thêm sản phẩm', 'product_editing\\.php$|product_editing\\.php\\?action=add$', 1635386203, 1635386203),
(7, 2, 'Sửa sản phẩm', 'product_editing\\.php\\?id=\\d+$|product_editing\\.php\\?action=edit&id=\\d+$', 1635386203, 1635386203),
(8, 2, 'Xoá sản phẩm', 'product_delete\\.php\\?id=\\d+$', 1635386203, 1635386203),
(9, 3, 'Danh sách đơn hàng', 'order_listing\\.php$', 1635386203, 1635386203),
(10, 4, 'Phân quyền quản trị', 'member_privilege\\.php\\?id=\\d+$|member_privilege\\.php\\?action=save$', 1635386203, 1635386203),
(11, 4, 'Danh sách thành viên', 'member_listing\\.php$', 1635386203, 1635386203),
(12, 4, 'Thêm thành viên', 'member_editing\\.php$|member_editing\\.php\\?action=add$', 1635386203, 1635386203),
(13, 4, 'Sửa thành viên', 'member_editing\\.php\\?id=\\d+$|member_editing\\.php\\?action=edit&id=\\d+$', 1635386203, 1635386203),
(14, 4, 'Xoá thành viên', 'member_delete\\.php\\?id=\\d+$', 1635386203, 1635386203);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege_group`
--

CREATE TABLE `privilege_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `privilege_group`
--

INSERT INTO `privilege_group` (`id`, `name`, `position`, `created_time`, `last_updated`) VALUES
(1, 'Danh mục', 1, 1635386203, 1635386203),
(2, 'Sản phẩm', 2, 1635386203, 1635386203),
(3, 'Đơn Hàng', 3, 1635386203, 1635386203),
(4, 'Thành viên', 4, 1635386203, 1635386203);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `quantity`, `content`, `created_time`, `last_updated`) VALUES
(2, 'Giày Air Jordan XXXVI', 'uploads/18-11-2021/air-jordan-xxxvi-psychic-energy-basketball-shoes-1D0pp7.jpg', 4000000, 30, '<p style=\"text-align: justify;\"><span style=\"color:#FFFFFF\"><span style=\"font-family:helvetica neue,helvetica,arial,sans-serif; font-size:16px\">Jordan nhẹ nhất cho đến nay, n&oacute; c&oacute; một phần tr&ecirc;n mỏng, tối thiểu được gia cố bằng một dải ruy băng bao quanh của TPU để ổn định b&ecirc;n cạnh</span></span></p>\r\n', 1637200055, 1637200068),
(5, 'Jordan High 03 (SZ41)', 'uploads/18-11-2021/air-jordan-1-hi-flyease-older-shoes-LdMh25.jpg', 1000000, 30, '<p style=\"text-align:justify\"><span style=\"color:#FFFFFF\"><span style=\"font-family:helvetica neue,helvetica,arial,sans-serif; font-size:16px\">Air Jordan 1 Hi FlyEase cung cấp cho bạn một c&aacute;ch nhanh ch&oacute;ng để c&oacute; được v&agrave;o gi&agrave;y thể thao của bạn trong khi duy tr&igrave; sự hấp dẫn vượt thời gian của bản gốc</span></span></p>\r\n', 1637201682, 1681839343),
(7, 'Jordan Mid 00 (SZ41)', 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(6).jpg', 800000, 30, '<p style=\"text-align:justify\"><span style=\"color:#FFFFFF\"><span style=\"font-family:helvetica neue,helvetica,arial,sans-serif; font-size:16px\">Air Jordan 1 Mid mang đến phong c&aacute;ch đầy đủ t&ograve;a &aacute;n v&agrave; sự thoải m&aacute;i cao cấp cho một c&aacute;i nh&igrave;n mang t&iacute;nh biểu tượng</span></span></p>\r\n', 1637203393, 1681839264),
(8, 'Jordan Mid 03 (SZ41)', 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(12).jpg', 800000, 30, '<p style=\"text-align:justify\"><span style=\"color:#FFFFFF\"><span style=\"font-family:helvetica neue,helvetica,arial,sans-serif; font-size:16px\">Air Jordan 1 Mid mang đến phong c&aacute;ch đầy đủ t&ograve;a &aacute;n v&agrave; sự thoải m&aacute;i cao cấp cho một c&aacute;i nh&igrave;n mang t&iacute;nh biểu tượng</span></span></p>\r\n', 1637203538, 1681839228),
(9, 'Jordan Mid 02 (SZ41)', 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(18).jpg', 800000, 30, '<p style=\"text-align:justify\"><span style=\"color:#FFFFFF\"><span style=\"font-family:helvetica neue,helvetica,arial,sans-serif; font-size:16px\">Air Jordan 1 Mid mang đến phong c&aacute;ch đầy đủ t&ograve;a &aacute;n v&agrave; sự thoải m&aacute;i cao cấp cho một c&aacute;i nh&igrave;n mang t&iacute;nh biểu tượng</span></span></p>\r\n', 1637203901, 1681839203),
(10, 'Jordan Mid 01 (SZ42)', 'uploads/18-11-2021/air-jordan-1-mid-shoe-86f1ZW_(25).jpg', 800000, 30, '<p style=\"text-align:justify\"><span style=\"color:#FFFFFF\"><span style=\"font-family:helvetica neue,helvetica,arial,sans-serif; font-size:16px\">Air Jordan 1 Mid Red mang đến sự trẻ trung v&agrave; phong c&aacute;ch thời trang mới mẻ.</span></span></p>\r\n', 1637204051, 1681839111),
(11, 'Jordan Low 05 (SZ41)', 'uploads/18-04-2023/jordan_low_2.png', 600000, 30, '<p><span style=\"color:#FFFFFF\">Mang phong c&aacute;ch thời trang trẻ trung, cuốn h&uacute;t.</span></p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 36px; left: 295.2px;\"><img src=\"chrome-extension://cianljdimgjlpmjllcbahmpdnicglaap/logo/48.png\" /></div>\r\n', 1681839972, 1681840828),
(16, 'Jordan 4 (SZ41)', 'uploads/18-04-2023/Jordan_4.png', 1500000, 30, '<p><span style=\"color:#FFFFFF\">Mang phong c&aacute;ch khoẻ khoắn</span></p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 39px; left: 194.188px;\"><img src=\"chrome-extension://cianljdimgjlpmjllcbahmpdnicglaap/logo/48.png\" /></div>\r\n', 1681840964, 1681840964),
(17, 'Jordan 4 (SZ42)', 'uploads/18-04-2023/Jordan_4.png', 1500000, 30, '<p><span style=\"color:#FFFFFF\">Mang phong c&aacute;ch khoẻ khoắn</span></p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 32px; left: 194.188px;\"><img src=\"chrome-extension://cianljdimgjlpmjllcbahmpdnicglaap/logo/48.png\" /></div>\r\n', 1681840986, 1681840986);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(10000) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `birthday`, `image`, `created_time`, `last_updated`) VALUES
(1, 'ADMIN', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', '0000-00-00', 'uploads/17-11-2021/logo.jpg', 1635386203, 1635386203),
(3, 'long', '827ccb0eea8a706c4c34a16891f84e7b', 'Mai Đức Long', '2001-11-29', 'uploads/18-04-2023/328249124_1903369176663162_3025948636413951298_n.jpg', 1681841549, 1681841549);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_privilege`
--

CREATE TABLE `user_privilege` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_privilege`
--

INSERT INTO `user_privilege` (`id`, `user_id`, `privilege_id`, `created_time`, `last_updated`) VALUES
(1, 1, 1, 1635386203, 1635386203),
(2, 1, 2, 1635386203, 1635386203),
(3, 1, 3, 1635386203, 1635386203),
(4, 1, 4, 1635386203, 1635386203),
(5, 1, 5, 1635386203, 1635386203),
(6, 1, 6, 1635386203, 1635386203),
(7, 1, 7, 1635386203, 1635386203),
(8, 1, 8, 1635386203, 1635386203),
(9, 1, 9, 1635386203, 1635386203),
(10, 1, 10, 1635386203, 1635386203),
(11, 1, 11, 1635386203, 1635386203),
(12, 1, 12, 1635386203, 1635386203),
(13, 1, 13, 1635386203, 1635386203),
(14, 1, 14, 1635386203, 1635386203),
(15, 3, 1, 1595430953, 1595430953),
(16, 3, 2, 1595430953, 1595430953),
(17, 3, 3, 1595430953, 1595430953),
(18, 3, 4, 1595430953, 1595430953),
(19, 3, 5, 1595430953, 1595430953),
(20, 3, 6, 1595430953, 1595430953),
(21, 3, 7, 1595430953, 1595430953),
(22, 3, 8, 1595430953, 1595430953),
(23, 3, 9, 1595430953, 1595430953),
(24, 3, 10, 1595430953, 1595430953),
(25, 3, 11, 1595430953, 1595430953),
(26, 3, 12, 1595430953, 1595430953),
(27, 3, 13, 1595430953, 1595430953),
(28, 3, 14, 1595430953, 1595430953);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Chỉ mục cho bảng `privilege_group`
--
ALTER TABLE `privilege_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_privilege_ibfk_1` (`user_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `privilege_group`
--
ALTER TABLE `privilege_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `privilege_group` (`id`);

--
-- Các ràng buộc cho bảng `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD CONSTRAINT `user_privilege_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_privilege_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
