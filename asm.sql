-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 02, 2018 lúc 05:35 AM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(30) NOT NULL,
  `Description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `Description`) VALUES
(1, 'Maserati', 'Build ultra-luxury performance automobiles with timeless Italian style, accommodating bespoke interiors, and effortless, signature sounding power'),
(2, 'Lamborghini', 'Automobili Lamborghini S.p.A. is an Italian brand and manufacturer of luxury sports cars'),
(3, 'Koenigsegg', 'Koenigsegg Automotive AB is a Swedish manufacturer of high-performance sports cars, based in Ängelholm, Skåne County, Sweden');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `CustID` int(11) NOT NULL,
  `Fullname` varchar(60) CHARACTER SET utf8 NOT NULL,
  `Birthdate` datetime NOT NULL,
  `Address` varchar(40) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `City` varchar(30) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Fax` varchar(10) DEFAULT NULL,
  `Account` varchar(60) NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`CustID`, `Fullname`, `Birthdate`, `Address`, `City`, `Country`, `Phone`, `Fax`, `Account`, `Password`) VALUES
(1, 'James Bond', '0000-00-00 00:00:00', '15 Hyde st', 'London', 'England', '041127842', '1152', 'bondaccount', 3071975),
(2, 'Bruce Wayne', '0000-00-00 00:00:00', '15 First st', 'Gotham', 'US', '051127345', '4367', 'wayneaccount', 181977),
(3, 'Tony Stark', '0000-00-00 00:00:00', 'Los Angeles', 'California', 'US', '041232318', '2215', 'starkaccount', 771969);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(40) NOT NULL,
  `Manufacturer` varchar(40) NOT NULL,
  `Unitprice` int(11) NOT NULL,
  `Image` varchar(40) NOT NULL,
  `Stock` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Manufacturer`, `Unitprice`, `Image`, `Stock`, `CategoryID`) VALUES
(1, 'Maserati Granturismo', 'Automotive', 132000, 'img/granturismo.jpg', 20, 1),
(2, 'Maserati QuattroPorte', 'Automotive', 300000, 'img/quattroporte.jpg', 5, 1),
(3, 'Maserati Levante', 'Automotive', 400000, 'img/levante.jpg', 4, 1),
(4, 'Maserati Ghibli', 'Automotive', 250000, 'img/ghibli.jpg', 30, 1),
(5, 'Lamborghini Aventador', 'Automotive', 700000, 'img/aventador.jpg', 7, 2),
(6, 'Lamborghini Veneno', 'Automotive', 800000, 'img/veneno.jpg', 3, 2),
(7, 'Lamborghini Huracan', 'Automotive', 300000, 'img/huracan.jpg', 6, 2),
(8, 'Lamborghini Sesto Elemento', 'Automotive', 1000000, 'img/elemento.jpg', 3, 2),
(9, 'Koenigsegg Agera', 'Automotive', 300000, 'img/agera.jpg', 4, 3),
(10, 'Koenigsegg One', 'Automotive', 750000, 'img/one.jpg', 5, 3),
(11, 'Koenigsegg CCX', 'Automotive', 300000, 'img/ccx.jpg', 8, 3),
(12, 'Koenigsegg Trevita', 'Automotive', 950000, 'img/trevita.jpg', 5, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `fk_CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `CustID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
