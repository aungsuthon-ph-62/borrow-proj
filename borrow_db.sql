-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql202.epizy.com
-- Generation Time: Nov 04, 2021 at 08:17 AM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30103930_borrow_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_transaction`
--

CREATE TABLE `borrow_transaction` (
  `b_id` int(11) NOT NULL COMMENT 'borrower ID',
  `device_id` int(11) NOT NULL COMMENT 'รหัสอุปกรณ์ที่ยืม',
  `borrower_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผู้ยืม',
  `borrow_date` date NOT NULL COMMENT 'วันเดือนปีที่ยืม',
  `t_approve` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ผู้อนุมัติ',
  `return_date` date NOT NULL,
  `borrow_status` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrow_transaction`
--

INSERT INTO `borrow_transaction` (`b_id`, `device_id`, `borrower_id`, `borrow_date`, `t_approve`, `return_date`, `borrow_status`) VALUES
(4, 16, '4', '2021-10-19', '2', '2021-10-27', '2'),
(5, 18, '3', '2021-10-19', '2', '2021-10-20', '1'),
(6, 9, '4', '2021-10-19', '2', '2021-10-25', '1'),
(8, 15, '4', '2021-10-19', '1', '2021-10-29', '2'),
(9, 21, '2', '2021-10-20', '0', '2021-10-21', '0'),
(10, 20, '2', '2021-10-20', '1', '2021-10-24', '2'),
(11, 12, '2', '2021-10-20', '1', '2021-10-24', '2'),
(12, 19, '13', '2021-10-20', '0', '2047-12-20', '0'),
(13, 16, '13', '2021-10-20', '1', '2166-12-20', '2'),
(14, 23, '14', '2021-10-20', '1', '2021-10-27', '2'),
(16, 21, '13', '2021-10-20', '1', '2021-10-21', '2'),
(17, 16, '13', '2021-10-20', '2', '2021-10-24', '2'),
(19, 3, '13', '2021-10-20', '5', '2021-10-20', '1'),
(20, 23, '18', '2021-10-20', '1', '2021-10-23', '2'),
(21, 20, '18', '2021-10-20', '1', '2021-10-21', '2'),
(22, 20, '18', '2021-10-20', '0', '2021-10-21', '0'),
(23, 3, '18', '2021-10-20', '0', '2021-10-31', '0'),
(24, 23, '17', '2021-10-20', '2', '2021-10-20', '2'),
(25, 24, '22', '2021-10-20', '1', '2021-10-30', '2'),
(26, 24, '5', '2021-10-20', '0', '2021-10-20', '0'),
(27, 24, '1', '2021-10-20', '0', '2021-10-22', '0'),
(28, 24, '23', '2021-10-20', '1', '2021-10-21', '1'),
(29, 23, '24', '2021-10-27', '2', '2021-10-06', '1');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `pur_yrs` date NOT NULL COMMENT 'ปีที่จัดซื้อ พศ',
  `device_no` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเลขวัสดุ/ครุภัณฑ์',
  `device_cat` int(11) NOT NULL COMMENT 'ลักษณะอุปกรณ์',
  `device_type` tinyint(4) DEFAULT NULL COMMENT 'ประเภทอุปกรณ์',
  `model` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อรุ่น ',
  `status` int(11) DEFAULT '1' COMMENT 'สถานะ',
  `store_at` int(11) NOT NULL COMMENT 'จัดเก็บที่ใด',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อมูลรูปภาพอุปกรณ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `pur_yrs`, `device_no`, `device_cat`, `device_type`, `model`, `status`, `store_at`, `img`) VALUES
(3, '2021-10-19', 'nito5-223', 4, 2, 'Gaming Notebook | Nitro 5 AN515-57-58LR (Black)', 1, 1, '19-10-2021673542579.jpg'),
(4, '2021-10-13', 'ATG-102', 4, 2, 'ASUS TUF Gaming A15 out of the competition', 1, 1, '19-10-202137736370.jpg'),
(6, '2020-10-19', 'LG-265', 4, 2, 'Lenovo Gaming 3 15IHU6 82K100DFTA (Shadow Black)', 1, 1, '19-10-2021209479311.png'),
(8, '2021-04-09', 'SGT7-582', 2, 2, 'Samsung Galaxy Tab S7', 1, 5, '19-10-2021854315741.jpg'),
(11, '2020-06-17', 'OP9-427', 1, 1, 'OnePlus 10 Pro', 3, 1, '19-10-2021857920661.jpg'),
(12, '2021-10-19', 'HP-1007', 4, 2, 'HP  Pavilion Intel Core i5 รุ่น 15-EG0033TX', 1, 4, '19-10-20212027306751.jpg'),
(13, '2021-10-19', 'VR-1008', 6, 1, 'VR Box 2.0 3D', 1, 1, '19-10-20211781247652.jpg'),
(14, '2018-01-19', 'P520', 3, 2, 'ThinkStation P520 Workstation', 1, 1, '19-10-20211785028656.jpg'),
(15, '2021-08-05', 'SG21-863', 1, 2, 'Samsung Galaxy S21 Ultra', 1, 4, '19-10-2021223685607.jpg'),
(16, '2018-06-19', 'IMac-27', 3, 2, 'IMac 27', 1, 5, '19-10-20211691280114.png'),
(18, '2021-02-19', 'ESC500 G4', 3, 2, 'ASUS ESC500 G4', 2, 4, '19-10-20211331064127.png'),
(19, '2021-10-30', 'VX207DE', 7, 2, 'ASUS VX207DE', 1, 8, '20-10-2021244619323.png'),
(20, '2021-10-20', 'Oculus-1010', 6, 2, 'Oculus Quest 2', 1, 8, '20-10-2021175563934.jpg'),
(21, '2020-06-08', 'VL249HE', 7, 2, 'ASUS VL249HE', 1, 5, '20-10-202156266398.png'),
(22, '2021-03-11', 'iphone11-332', 1, 2, 'iphone 11 pro', 1, 7, '20-10-2021588707760.png'),
(23, '2021-07-22', 'iphone12-475', 2, 2, 'iphone 12 pro', 1, 1, '20-10-2021215391654.jpg'),
(24, '2021-10-20', 'MBP-0001', 4, 2, 'Macbook Pro M1 Max 16 inch', 1, 2, '20-10-202126279588.jpg'),
(25, '2021-10-22', 'Carbon G9', 4, 2, 'ThinkPad X1 Carbon Gen 9', 3, 6, '20-10-20211654500115.png'),
(27, '2021-10-21', 'TEST-12346', 4, 1, 'Macbook Pro M1 Max 16 inch', 2, 2, '20-10-20211863535380.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `device_category`
--

CREATE TABLE `device_category` (
  `id` int(11) NOT NULL,
  `device_cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device_category`
--

INSERT INTO `device_category` (`id`, `device_cat_name`) VALUES
(1, 'Mobile'),
(2, 'Tablet'),
(3, 'PC'),
(4, 'Laptop'),
(5, 'Game Console'),
(6, 'VR'),
(7, 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `device_room`
--

CREATE TABLE `device_room` (
  `id` int(11) NOT NULL,
  `room` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อห้องอุปกรณ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device_room`
--

INSERT INTO `device_room` (`id`, `room`) VALUES
(1, 'ส่วนกลาง'),
(2, 'ห้องพัก ผศ.ชยาพร'),
(4, 'ห้องพัก อ.ธวัชชัย'),
(5, 'ห้องพัก อ.ชาญชัย'),
(6, 'ห้องพัก อ.อนุพงษ์'),
(7, 'ห้องพัก อ.กุลธรา'),
(8, 'ห้องพัก อ.พิชิต');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  `sname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(32) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `stype` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `email`, `password`, `sname`, `lname`, `tel`, `stype`, `status`) VALUES
(1, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 'Admin', 'ปี 4', 2),
(3, '62114340128', 'narinthon.va.62@ubu.ac.th', '304037e225657fb6614a9a17cc19232f', 'ณรินทร์ทร', 'เวชกามา', '0810574021', 'ปี 3', 1),
(4, '62114340357', 'refresh0612@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'วุฒิชัย', 'มิ่งขวัญ', '0610975932', 'ปี 3', 1),
(5, '62114340087', 'chiraphat.ph.62@ubu.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'จิรภัทร', 'ภายศรี', '0631469333', 'ปี 3', 1),
(6, '-', 'admin_lucky@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Lucky', '-', 'ปี 4', 2),
(7, '-', 'admin_dragonish@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Dragonish', '-', 'ปี 4', 2),
(8, '-', 'admin_refresh@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Refresh', '-', 'ปี 4', 2),
(13, '63144740610', 'superfiakak@gmail.com', '162ed1aaf8e348b503f1d674a286612d', 'นาย ชนม์ชนก', 'พุทธเสน', '0638020803', 'ปี 1', 1),
(14, '62114340069', 'modfc24@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'คมกฤษณ์', 'มุธาพร', '0933533055', 'ปี 3', 1),
(17, '62114340302', 'lima.sh.62@ubu.ac.th', 'c9e1766a1a92ae9c30ee48834956c080', 'ลีมา', 'ศรีภักดี', '0902823919', 'ปี 3', 1),
(18, '62114340014', 'kanok@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'กนกพร', 'ศิลธร', '0936068617', 'ปี 3', 1),
(20, '62114340368', 'earnearn1901@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Sasithorn ', 'Donkwuang ', '0959402817', 'ปี 3', 1),
(21, '63144540098', 'nongveanlor@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'น้องฟลุค', 'เเหวนหล่อ', '0912345678', 'ปี 1', 1),
(22, '63144740087', 'veanlor@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'น้องฟลุค', 'เเหวนหล่อ', '0912345678', 'ปี 1', 1),
(23, '62114340410', 'aungsuthon.ph.62@ubu.ac.th', 'd2cca59727fd0b3ca4b48591c83c0cd0', 'Aungsuthon', 'Phosu', '0622200843', 'ปี 3', 1),
(24, '62114340666', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'Test', '0944688941', 'ปี 4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `t_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่ออาจารย์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `t_name`) VALUES
(1, 'ผู้ช่วยศาสตราจารย์ ชยาพร แก่นสาร์'),
(2, 'อาจารย์ ธวัชชัย สรางสิงห์'),
(4, 'รองศาสตราจารย์ ชาญชัย ศุภอรรถกร'),
(5, 'อาจารย์ อนุพงษ์ รัฐิรมย์'),
(6, 'อาจารย์ พิชิต โสภากันต์'),
(7, 'อาจารย์ กุลธรา มหาดิลกรัตน์'),
(10, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_transaction`
--
ALTER TABLE `borrow_transaction`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_category`
--
ALTER TABLE `device_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_room`
--
ALTER TABLE `device_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow_transaction`
--
ALTER TABLE `borrow_transaction`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'borrower ID', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `device_category`
--
ALTER TABLE `device_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `device_room`
--
ALTER TABLE `device_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
