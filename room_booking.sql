-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 08:21 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `room_num` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `session` varchar(15) NOT NULL,
  `pin` varchar(4) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `staff_id`, `student_id`, `student_name`, `room_num`, `date`, `session`, `pin`, `status`) VALUES
(4, '111070822', '2018697658', 'Tuan Muhammad Amirdanial Bin Tuan Zakaria', '002', '2021-03-28', '14:00 - 15:00', '4141', 'Session End'),
(16, '111070822', '2019885876', 'Muhammad Haziq Tmat', '001', '2021-04-01', '17:00 - 18:00', '5555', 'Session End'),
(17, '111070822', '999865', 'aziq', '001', '2021-04-04', '10:00 - 11:00', '5141', 'Session End'),
(18, '111070822', '98866', 'amir', '001', '2021-04-04', '11:00 - 12:00', '5141', 'Session End'),
(24, '111070822', '2020457811', 'Muhammad Amir Luqman Bin Haziq Danial', '001', '2021-04-05', '10:00 - 11:00', '70', 'Session End'),
(25, '111070822', '999865', 'Haziq', '001', '2021-04-05', '14:00 - 15:00', '1123', 'Session End'),
(26, '111070822', '2020935468', 'Khalid Al-Walid', '001', '2021-04-06', '10:00 - 11:00', 'AA44', 'Session End'),
(28, '111070822', '999865', 'Muhammad Haziq Tmat', '001', '2021-04-06', '11:00 - 12:00', 'EEEE', 'Session End'),
(46, '2020697658', '0091', 'amir', '001', '2021-04-06', '16:00 - 17:00', '5555', 'Session End'),
(49, '111070822', '2018999', 'Haziq Luqman', '001', '2021-04-23', '10:00 - 11:00', '1111', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `room_pic` blob DEFAULT NULL,
  `room_num` varchar(50) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_desc` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`room_pic`, `room_num`, `room_name`, `room_desc`, `status`) VALUES
(NULL, '001', 'Bilik 1', 'Bilik', 'Available'),
(NULL, '002', 'Bilik 2', 'Bilik', 'Available'),
(NULL, '003', 'Bilik 3', 'Bilik', 'Available'),
(NULL, '004', 'Bilik 4', 'Bilik 4', 'Available'),
(NULL, '005', 'Bilik 5', 'Bilik', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nric_num` varchar(13) NOT NULL,
  `id_num` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `email`, `phone`, `nric_num`, `id_num`, `user_type`) VALUES
('Haziq', 'Luqman', 'haziq@luqman.my', '+601131246853', ' 000624110073', '111070822', 'staff'),
('Amir', 'Danial', 'amir@danial.my', '+60198865231', ' 000623119999', '111070825', 'staff'),
('Akmal', 'Suriani', 'Akmal@Suriani.my', '+601132035124', ' 00012311456', '2020123456', 'staff'),
('Ali', 'Abu', 'ali@abu.my', '+60199868775', ' 000624110073', '2020697658', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `room_num` (`room_num`),
  ADD KEY `staff_id` (`staff_id`) USING BTREE;

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`room_num`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `user` (`id_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_num`) REFERENCES `room_details` (`room_num`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
