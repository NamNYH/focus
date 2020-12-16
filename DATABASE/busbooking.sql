-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2020 lúc 02:55 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `busbooking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `availability`
--

CREATE TABLE `availability` (
  `id` int(10) UNSIGNED NOT NULL,
  `bus` int(10) UNSIGNED DEFAULT NULL,
  `route` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `amount` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `availability`
--

INSERT INTO `availability` (`id`, `bus`, `route`, `date`, `time`, `amount`, `status`) VALUES
(1, 1, 1, '2018-05-20', '13:00:00', '1', 'available'),
(2, 1, 2, '2018-05-22', '20:00:00', '2', 'not available'),
(3, 2, 1, '2018-06-05', '13:00:00', '1', 'available');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_number` int(10) UNSIGNED DEFAULT NULL,
  `fullname` int(10) UNSIGNED DEFAULT NULL,
  `phone` int(10) UNSIGNED DEFAULT NULL,
  `date` int(10) UNSIGNED DEFAULT 1,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `amount` varchar(40) DEFAULT NULL,
  `date_booked` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `id_number`, `fullname`, `phone`, `date`, `time`, `amount`, `date_booked`) VALUES
(1, 1, 1, 1, 2, 2, '2', NULL),
(2, 1, 1, 1, 1, 1, '1', NULL),
(3, 1, 1, 1, 1, 1, '1', NULL),
(4, 1, 1, 1, 3, 3, '3', NULL),
(5, 2, 2, 2, 3, 3, '3', '2018-05-20'),
(6, 3, 3, 3, 3, 3, '3', '2018-05-20'),
(7, 2, 2, 2, 1, 1, '1', '2018-05-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buses`
--

CREATE TABLE `buses` (
  `id` int(10) UNSIGNED NOT NULL,
  `Xe_so` varchar(40) DEFAULT NULL,
  `Luot_di` varchar(1000) NOT NULL,
  `Luot_ve` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `buses`
--

INSERT INTO `buses` (`id`, `Xe_so`, `Luot_di`, `Luot_ve`) VALUES
(3, '01', 'Bến công trường Mê Linh – Thi Sách – Công trường Mê Linh – Tôn Đức Thắng – Nguyễn Huệ – Lê Lợi – vòng xoay – trạm Bến Thành – Trần Hưng Đạo – Nguyễn Tri Phương – Trần Phú – Trần Hưng Đạo – Châu Văn Liêm – Hải Thượng Lãn Ông – Trang Tử – Ga Chợ Lớn A.', 'Ga Chợ Lớn A – Lê Quang Sung – Nguyễn Hữu Thận – Tháp Mười – Hải Thượng Lãn Ông – Châu Văn Liêm – Nguyễn Trãi – Nguyễn Tri Phương – Trần Phú – Trần Hưng Đạo – trạm Bến Thành – Lê Lợi – Nguyễn Huệ – Tôn Đức Thắng – Hai Bà Trưng – Đông Du – Thi Sách – Bến Công trường Mê Linh.'),
(4, '02', 'hỗ đậu xe buýt trên đường Thi Sách - Thi Sách - Công trường Mê Linh - Tôn Đức Thắng - Nguyễn Huệ - Lê Lợi - (vòng xoay) - trạm Bến Thành - Trần Hưng Đạo - Phạm Ngũ Lão - Nguyễn Thị Nghĩa -  Nguyễn Trãi - Cống Quỳnh - Nguyễn Thị Minh Khai-Nguyễn Thiện Thuật – Điện Biên Phủ - Cao Thắng - 3/2 - Minh Phụng - Hậu Giang - Kinh Dương Vương - Bến xe Miền Tây (trả khách) - Kinh Dương Vương - bãi đỗ xe buýt tại Bến xe Miền Tây.', 'Bãi đỗ xe buýt tại Bến xe Miền Tây - Kinh Dương Vương - Hậu Giang - Minh Phụng - 3/2 - Cao Thắng - Cống Quỳnh - Nguyễn Trãi - Lê Lai (vòng xoay) - Trần Hưng Đạo - Phạm Ngũ Lão – Yersin - Trần Hưng Đạo - Trạm Bến Thành - Lê Lợi - Nguyễn Huệ - Tôn Đức Thắng - Hai Bà Trưng - Đông Du - Thi Sách - Chỗ đậu xe buýt trên đường Thi Sách.'),
(5, '03', 'Công viên 23/9 – Lê Lai – vòng xoay công trường Quách Thị Trang – Phó Đức Chính – Lê Thị Hồng Gấm – Calmette – trạm Bến Thành – Hàm Nghi – Hồ Tùng Mậu – đường nhánh S2 – Tôn Đức Thắng – Hai Bà Trưng – Phan Đình Phùng – Nguyễn Kiệm – Nguyễn Thái Sơn – Phạm Ngũ Lão – Nguyễn Oanh – Hà Huy Giáp – Thạnh Lộc 30 – Bến Thạnh Lộc 29.', 'Bến Thạnh Lộc 29 – Thạnh Lộc 30 – Hà Huy Giáp – Nguyễn Oanh – Nguyễn Kiệm – Hoàng Minh Giám – Đào Duy Anh – Hồ Văn Huê – Hoàng Văn Thụ – Phan Đình Phùng – Hai Bà Trưng – Tôn Đức Thắng – Hàm Nghi – trạm Bến Thành – Trần Hưng Đạo – Phạm Ngũ Lão – Ga hành khách xe buýt Sài Gòn (Công viên 23/9).');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `id_number` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `phone`, `id_number`) VALUES
(1, 'Davin Louis', '0712345678', '4410109291020'),
(2, 'Kelvin Kevoh', '0792323200', '33767192'),
(3, 'mukangara wenyagauri', '0734123453', '552211133445');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership_grouppermissions`
--

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT 0,
  `allowEdit` tinyint(4) NOT NULL DEFAULT 0,
  `allowDelete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `membership_grouppermissions`
--

INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 2, 'buses', 1, 3, 3, 3),
(2, 2, 'seats', 1, 3, 3, 3),
(3, 2, 'availability', 1, 3, 3, 3),
(4, 2, 'bookings', 1, 3, 3, 3),
(5, 2, 'routes', 1, 3, 3, 3),
(6, 2, 'customers', 1, 3, 3, 3),
(19, 3, 'buses', 0, 3, 0, 0),
(20, 3, 'seats', 0, 3, 0, 0),
(21, 3, 'availability', 0, 3, 0, 0),
(22, 3, 'bookings', 1, 1, 1, 1),
(23, 3, 'routes', 0, 3, 0, 0),
(24, 3, 'customers', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupID` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `membership_groups`
--

INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`) VALUES
(1, 'anonymous', 'Anonymous group created automatically on 2018-05-20', 0, 0),
(2, 'Admins', 'Admin group created automatically on 2018-05-20', 0, 1),
(3, 'customers', 'contains all customers', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership_userpermissions`
--

CREATE TABLE `membership_userpermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `memberID` varchar(20) NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT 0,
  `allowEdit` tinyint(4) NOT NULL DEFAULT 0,
  `allowDelete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership_userrecords`
--

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) UNSIGNED NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(20) DEFAULT NULL,
  `dateAdded` bigint(20) UNSIGNED DEFAULT NULL,
  `dateUpdated` bigint(20) UNSIGNED DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `membership_userrecords`
--

INSERT INTO `membership_userrecords` (`recID`, `tableName`, `pkValue`, `memberID`, `dateAdded`, `dateUpdated`, `groupID`) VALUES
(1, 'buses', '1', 'admin', 1526809520, 1526809520, 2),
(2, 'seats', '1', 'admin', 1526809541, 1526809541, 2),
(3, 'seats', '2', 'admin', 1526809550, 1526809550, 2),
(4, 'seats', '3', 'admin', 1526809559, 1526809559, 2),
(5, 'seats', '4', 'admin', 1526809568, 1526809568, 2),
(6, 'seats', '5', 'admin', 1526809577, 1526809577, 2),
(7, 'seats', '6', 'admin', 1526809587, 1526809587, 2),
(8, 'seats', '7', 'admin', 1526809597, 1526809597, 2),
(9, 'seats', '8', 'admin', 1526809605, 1526809605, 2),
(10, 'seats', '9', 'admin', 1526809615, 1526809615, 2),
(11, 'seats', '10', 'admin', 1526809623, 1526809623, 2),
(12, 'routes', '1', 'admin', 1526809669, 1526809669, 2),
(13, 'routes', '2', 'admin', 1526809686, 1526809686, 2),
(14, 'availability', '1', 'admin', 1526809809, 1526810984, 2),
(15, 'availability', '2', 'admin', 1526809852, 1526810962, 2),
(16, 'customers', '1', 'admin', 1526810032, 1526810032, 2),
(17, 'bookings', '1', 'admin', 1526810611, 1526810611, 2),
(18, 'bookings', '2', 'admin', 1526812595, 1526812595, 2),
(19, 'bookings', '3', 'admin', 1526812704, 1526812704, 2),
(20, 'buses', '2', 'admin', 1526820828, 1526820828, 2),
(21, 'availability', '3', 'admin', 1526820876, 1526820876, 2),
(22, 'bookings', '4', 'admin', 1526820948, 1526820948, 2),
(23, 'customers', '2', 'kevoh', 1526822459, 1526822459, 3),
(24, 'bookings', '5', 'kevoh', 1526824428, 1526824428, 3),
(25, 'customers', '3', 'admin', 1526845211, 1526845211, 2),
(26, 'bookings', '6', 'admin', 1526845238, 1526845238, 2),
(27, 'bookings', '7', 'admin', 1526885955, 1526885955, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership_users`
--

CREATE TABLE `membership_users` (
  `memberID` varchar(20) NOT NULL,
  `passMD5` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text DEFAULT NULL,
  `custom2` text DEFAULT NULL,
  `custom3` text DEFAULT NULL,
  `custom4` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `pass_reset_key` varchar(100) DEFAULT NULL,
  `pass_reset_expiry` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `membership_users`
--

INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`, `pass_reset_key`, `pass_reset_expiry`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '2018-05-20', 2, 0, 1, NULL, NULL, NULL, NULL, 'Admin member created automatically on 2018-05-20\nRecord updated automatically on 2018-05-20', NULL, NULL),
('duynam', '96ae7b6fe6489d06da29d4cc231227d3', 'nam656567@gmail.com', '2020-09-22', 3, 0, 1, '', '', '', '', 'member signed up through the registration form.\nmember updated his profile on 10/13/2020, 08:56 am from IP address ::1', 'db67dbec19090a637049d0b15755db60', 1602667288),
('guest', NULL, NULL, '2018-05-20', 1, 0, 1, NULL, NULL, NULL, NULL, 'Anonymous member created automatically on 2018-05-20', NULL, NULL),
('kaddy', '827ccb0eea8a706c4c34a16891f84e7b', 'kaddy@gmail.com', '2018-05-21', 3, 0, 1, '', '', '', '', 'member signed up through the registration form.', NULL, NULL),
('kevoh', '827ccb0eea8a706c4c34a16891f84e7b', 'kevo@gmail.com', '2018-05-20', 3, 0, 1, '', '', '', '', 'member signed up through the registration form.', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ma_so_tuyen` int(11) NOT NULL,
  `Ten_tuyen` varchar(100) DEFAULT NULL,
  `Thoi_gian` varchar(40) DEFAULT NULL,
  `Gia_ve` varchar(40) DEFAULT NULL,
  `Don_vi_dam_nhan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `routes`
--

INSERT INTO `routes` (`id`, `Ma_so_tuyen`, `Ten_tuyen`, `Thoi_gian`, `Gia_ve`, `Don_vi_dam_nhan`) VALUES
(1, 1, 'Bến Thành- BX Chợ Lớn', '05:00 - 20:30', '5.000 VNĐ', 'Công ty Cổ phần Xe khách Sài Gòn'),
(2, 2, 'Bến Thành- BX Miền Tây', '04:45 - 18:30', '5.000 VNĐ', 'Công ty TNHH Vận tải Ngôi sao Sài Gòn'),
(3, 3, 'Bến Thành- Thạnh Lộc', '04:15 - 20:45', '5.000 VNĐ', 'Công ty TNHH Vận tải Ngôi sao Sài Gòn'),
(7, 4, 'Bến Thành- Cộng Hòa- An Sương', '05:00 - 20:30', '5.000 VNĐ', 'Công ty TNHH Vận tải Ngôi sao Sài Gòn'),
(8, 5, ' Bến xe Chợ Lớn - Biên Hòa', '04:50 - 17:50', '5.000 VNĐ', 'Hợp tác xã vận tải xe buýt Quyết Thắng'),
(9, 6, 'Bến xe Chợ Lớn- Đại học Nông Lâm', '04:55 - 21:00', '6.000 VNĐ', 'Hợp tác xã vận tải xe buýt Quyết Thắng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus` (`bus`),
  ADD KEY `route` (`route`);

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_number` (`id_number`);

--
-- Chỉ mục cho bảng `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Chỉ mục cho bảng `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Chỉ mục cho bảng `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Chỉ mục cho bảng `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  ADD PRIMARY KEY (`recID`),
  ADD UNIQUE KEY `tableName_pkValue` (`tableName`,`pkValue`),
  ADD KEY `pkValue` (`pkValue`),
  ADD KEY `tableName` (`tableName`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Chỉ mục cho bảng `membership_users`
--
ALTER TABLE `membership_users`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Chỉ mục cho bảng `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  MODIFY `recID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
