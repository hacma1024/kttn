-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 24, 2018 lúc 08:33 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id867113_tracnghiem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcauhoi`
--

CREATE TABLE `tblcauhoi` (
  `id` int(11) NOT NULL,
  `mach` varchar(6) NOT NULL,
  `cauhoi` varchar(1000) NOT NULL,
  `madethi` varchar(10) NOT NULL,
  `dangch` int(11) NOT NULL,
  `hinhanh` varchar(500) NOT NULL,
  `dapan1` varchar(500) NOT NULL,
  `dapan2` varchar(500) NOT NULL,
  `dapan3` varchar(500) NOT NULL,
  `dapan4` varchar(500) NOT NULL,
  `dapandung` int(11) NOT NULL,
  `xao` tinyint(1) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  `chuthich` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Cấu trúc bảng cho bảng `tbldethi`
--

CREATE TABLE `tbldethi` (
  `id` int(11) NOT NULL,
  `madethi` varchar(10) NOT NULL,
  `chude` varchar(200) NOT NULL,
  `socauhoi` int(11) NOT NULL,
  `mon` int(11) NOT NULL,
  `lop` int(11) NOT NULL DEFAULT '6',
  `thoigian` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  `mand` int(11) NOT NULL,
  `xemda` tinyint(1) NOT NULL,
  `ktthoigian` int(11) NOT NULL,
  `ktxemlai` tinyint(1) NOT NULL,
  `ttfile` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Cấu trúc bảng cho bảng `tbldiem`
--

CREATE TABLE `tbldiem` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `lop` varchar(50) NOT NULL,
  `diem` float NOT NULL,
  `madethi` varchar(10) NOT NULL,
  `thoigian` varchar(20) NOT NULL,
  `thoigianlambai` varchar(50) NOT NULL,
  `lichsu` text NOT NULL,
  `maxemlai` varchar(20) NOT NULL,
  `namhoc` varchar(10) NOT NULL,
  `linkfile` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Cấu trúc bảng cho bảng `tblgopy`
--

CREATE TABLE `tblgopy` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Cấu trúc bảng cho bảng `tblluottruycap`
--

CREATE TABLE `tblluottruycap` (
  `id` int(11) NOT NULL,
  `soluot` int(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Cấu trúc bảng cho bảng `tblmon`
--

CREATE TABLE `tblmon` (
  `id` int(11) NOT NULL,
  `mon` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblmon`
--

INSERT INTO `tblmon` (`id`, `mon`) VALUES
(1, 'Toán'),
(2, 'Ngữ văn'),
(3, 'Anh văn'),
(4, 'Vật lí'),
(5, 'Hóa học'),
(6, 'Tin học'),
(7, 'Sinh học'),
(8, 'Công nghệ'),
(9, 'GDCD'),
(10, 'Địa lí'),
(11, 'Lịch sử');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnguoidung`
--

CREATE TABLE `tblnguoidung` (
  `id` int(11) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `quyen` int(11) NOT NULL,
  `hovaten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Cấu trúc bảng cho bảng `tbltailieu`
--

CREATE TABLE `tbltailieu` (
  `id` int(11) NOT NULL,
  `tensach` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tomtat` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `lop` int(11) NOT NULL,
  `tacgia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `thutu` int(11) NOT NULL,
  `mand` int(11) NOT NULL,
  `mon` int(11) NOT NULL,
  `linkdown` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Cấu trúc bảng cho bảng `tbluseronline`
--

CREATE TABLE `tbluseronline` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgtmp` int(11) NOT NULL,
  `local` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbluseronline`
--

INSERT INTO `tbluseronline` (`id`, `ip`, `tgtmp`, `local`) VALUES
(1050, '14.165.33.186', 1521880382, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblcauhoi`
--
ALTER TABLE `tblcauhoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbldethi`
--
ALTER TABLE `tbldethi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbldiem`
--
ALTER TABLE `tbldiem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblgopy`
--
ALTER TABLE `tblgopy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblluottruycap`
--
ALTER TABLE `tblluottruycap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblmon`
--
ALTER TABLE `tblmon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblnguoidung`
--
ALTER TABLE `tblnguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbltailieu`
--
ALTER TABLE `tbltailieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbluseronline`
--
ALTER TABLE `tbluseronline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblcauhoi`
--
ALTER TABLE `tblcauhoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1215;

--
-- AUTO_INCREMENT cho bảng `tbldethi`
--
ALTER TABLE `tbldethi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `tbldiem`
--
ALTER TABLE `tbldiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2903;

--
-- AUTO_INCREMENT cho bảng `tblgopy`
--
ALTER TABLE `tblgopy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tblluottruycap`
--
ALTER TABLE `tblluottruycap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tblmon`
--
ALTER TABLE `tblmon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tblnguoidung`
--
ALTER TABLE `tblnguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbltailieu`
--
ALTER TABLE `tbltailieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `tbluseronline`
--
ALTER TABLE `tbluseronline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1051;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
