-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 31, 2020 lúc 09:32 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` varchar(5) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `GiaDatHang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` varchar(5) NOT NULL,
  `MSKH` varchar(5) NOT NULL,
  `MSNV` varchar(5) DEFAULT NULL,
  `NgayDH` datetime NOT NULL,
  `TrangThai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MSKH` varchar(5) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `SoLuong` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` tinyint(4) NOT NULL,
  `MaNhom` varchar(5) NOT NULL,
  `Hinh` varchar(50) NOT NULL,
  `MoTaHH` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES
('ADD01', 'Áo Đôi Tay Dài', 300000, 12, 'AODOI', 'product-images/ADD01.jpg', NULL),
('ADN01', 'Áo Đôi Tay Ngắn', 300000, 19, 'AODOI', 'product-images/ADN01.jpg', NULL),
('GAK01', 'Áo Khoác Nữ GAK01', 300000, 13, 'KHOAC', 'product-images/GAK01.jpg', NULL),
('GAS01', 'Áo Sơ Mi GAS01', 180000, 15, 'DONU', 'product-images/GAS01.jpg', NULL),
('GAT01', 'Áo Thun GAT01', 150000, 18, 'DONU', 'product-images/GAT01.jpg', NULL),
('GCV01', 'Chân Váy GCV01', 180000, 29, 'DONU', 'product-images/GCV01.jpg', NULL),
('GQJ01', 'Quần Jean GQJ01', 200000, 25, 'DONU', 'product-images/GQJ01.jpg', NULL),
('TAK01', 'Áo Khoác Nam TAK01', 300000, 16, 'KHOAC', 'product-images/TAK01.jpg', NULL),
('TAS01', 'Áo Sơ Mi TAS01', 200000, 14, 'DONAM', 'product-images/TAS01.jpg', NULL),
('TAT01', 'Áo Thun TAT01', 180000, 13, 'DONAM', 'product-images/TAT01.jpg', NULL),
('TQJ01', 'Quần Jean TQJ01', 200000, 14, 'DONAM', 'product-images/TQJ01.jpg', NULL),
('TQJ02', 'Quần Jean TQJ02', 250000, 15, 'DONAM', 'product-images/TQJ02.jpg', NULL),
('TQS01', 'Quần Short TQS01', 100000, 25, 'DONAM', 'product-images/TQS01.jpg', NULL),
('TQS02', 'Quần Short TQS02', 110000, 32, 'DONAM', 'product-images/TQS02.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(5) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `MatKhau` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `DiaChi`, `SoDienThoai`, `MatKhau`) VALUES
('vmt', 'Võ Minh Thông', 'KTX A, ĐHCT', '1234567899', '387b321aef9c0aa2fcea5e8c13b2567d24449262'),
('vmt2', 'vv', 'vv', '0376347326', '387b321aef9c0aa2fcea5e8c13b2567d24449262');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(5) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL,
  `MK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `MK`) VALUES
('nv01', 'Võ Nhân Viên', 'Nhân Viên', 'Ký Túc Xá Khu A, Đại Học Cần Thơ.', '0376347333', '1'),
('nv02', 'Võ Nhân Viên 2', 'Nhân Viên', 'Ký Túc B, ĐHCT', '0376363323', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(5) NOT NULL,
  `TenNhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES
('AODOI', 'Áo Đôi'),
('DONAM', 'Đồ Nam'),
('DONU', 'Đồ Nữ'),
('KHOAC', 'Áo Khoác');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `fk_ChiTietDatHANG_HangHoa` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `fk_DatHang_KhachHang` (`MSKH`),
  ADD KEY `fk_DatHang_NhanVien` (`MSNV`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MSKH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `fk_HangHoa_NhomHangHoa` (`MaNhom`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Chỉ mục cho bảng `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `fk_ChiTietDatHANG_DatHang` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ChiTietDatHANG_HangHoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `fk_DatHang_KhachHang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_DatHang_NhanVien` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `fk_HangHoa_NhomHangHoa` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
