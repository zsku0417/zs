-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2023 at 04:35 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_cn_num` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_email_add` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_gender` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_staffposs` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_home_add` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_dob` date NOT NULL,
  `a_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `a_username` (`a_username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_username`, `a_full_name`, `a_cn_num`, `a_email_add`, `a_gender`, `a_staffposs`, `a_home_add`, `a_dob`, `a_password`) VALUES
(1, 'zsku', 'ZS KU', '0182726353', 'zs@gmail.com', 'Male', 'Director/Administrator', 'Endah Ria', '2023-03-29', '1234'),
(2, 'yuan', 'Tan Qi Yuan', '0176354647', 'yuan@gmail.com', 'Male', 'Director/Administrator', 'OUG', '2023-03-06', 'yuan'),
(3, 'jeck', 'Jeckson Liew', '0108685352', 'jeck@gmail.com', 'Male', 'Director/Administrator', 'Cheras', '2022-09-08', 'jeck'),
(4, 'rachel', 'Rachel', '0182726222', 'rachel@gmail.com', 'Female', 'Manager', 'Bukit Jalil', '2022-05-09', 'rachel'),
(5, 'caryn', 'Caryn', '0182726222', 'caryn@gmail.com', 'Female', 'Manager', 'Bukit Jalil', '2021-11-04', 'caryn'),
(6, 'jeff', 'Jeff Tan', '0182726353', 'jeff@gmail.com', 'Male', 'Staff', 'Johor', '2023-03-30', 'jeff'),
(7, 'hairul', 'Hairul Bin Moha', '0192827262', 'hairul@gmail.com', 'Male', 'Staff', 'Penang', '2023-03-30', 'hairul'),
(9, 'sophia', 'Sophia Leok', '0192827222', 'sophia@gmail.com', 'Female', 'Staff', 'Selangor', '2023-03-30', 'sophia'),
(10, 'angela', 'Angela Lee', '0120282222', 'angela@gmail.com', 'Female', 'Staff', 'Kuala Lumppur', '2023-03-29', 'angela'),
(11, 'penny', 'Penny Tan', '0109282722', 'penny@gmail.com', 'Female', 'Staff', 'Kuala Lumpur', '2023-03-30', 'penny'),
(12, 'vishal', 'Vishal A/L Nare', '0192726222', 'vishal@gmail.com', 'Male', 'Staff', 'Kelantan', '2014-04-02', 'vishal'),
(13, 'narend', 'Narend', '0182726252', 'narend@gmail.com', 'Male', 'Intern', 'Kuala Lumpur', '2023-04-14', 'narend'),
(14, 'saki', 'Saki', '0192827262', 'saki@gmail.com', 'Male', 'Intern', 'Kuala Lumpur', '2023-03-29', 'saki'),
(15, 'testadmin', 'Testing Admin', '0192827222', 'testingadmin@gmail.com', 'Male', 'Intern', 'APU', '2023-04-17', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `doc_app`
--

DROP TABLE IF EXISTS `doc_app`;
CREATE TABLE IF NOT EXISTS `doc_app` (
  `app_id` int NOT NULL AUTO_INCREMENT,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `appreason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p_id` int NOT NULL,
  `p_full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `action` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`app_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`),
  KEY `p_id_3` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_app`
--

INSERT INTO `doc_app` (`app_id`, `appdate`, `apptime`, `appreason`, `p_id`, `p_full_name`, `action`) VALUES
(1, '2023-04-01', '12:02:00', 'sick', 1, 'Ali', 'Accepted'),
(3, '2023-04-03', '14:07:00', 'headache', 2, 'Amir', 'Accepted'),
(4, '2023-04-03', '17:08:00', 'want to see doctor lee', 3, 'Johnson Lee', 'Accepted'),
(5, '2023-04-04', '14:09:00', 'Sakit perut..', 4, 'Tan Yu Ki', 'Accepted'),
(6, '2023-04-05', '18:15:00', 'not feeling well', 5, 'Alice Tan', 'Accepted'),
(7, '2023-04-06', '13:11:00', 'headache', 6, 'Siti', 'Accepted'),
(8, '2023-04-07', '13:10:00', 'sakit....', 7, 'Amiru', 'Pending'),
(9, '2023-04-08', '15:11:00', 'kaki patah', 8, 'Jomy Lee ', 'Pending'),
(10, '2023-04-10', '21:11:00', 'head not feeling well..', 9, 'Tay Tiong Yi', 'Pending'),
(11, '2023-04-10', '15:12:00', 'gigi baru patah, sakit..., keep blooding', 10, 'Lee Zi Xu', 'Pending'),
(12, '2023-04-14', '14:13:00', 'headache', 11, 'Lim Viola', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `forum_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `p_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `a_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`forum_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `p_id`, `p_name`, `file_name`, `question`, `answer`, `a_name`) VALUES
(1, 1, 'Ali', 'uploads/360_F_287862761_whorBmaBidxn6wxYftLfNcu6ZcPLAY9x.jpg', 'Can somebody answer me what is the function of this medicine???', 'This is harmful...Dont use', 'ZS KU'),
(2, 2, 'Amir', NULL, 'Why my appointment details still in pending....', 'Be Patient.. we will arrange our consultant to meet you for your desired time', 'Tan Qi Yuan'),
(3, 3, 'Johnson Lee', NULL, 'What is the available time for doctors appointment???', 'Its 24 hours available, thank you.', 'Jeckson Liew'),
(4, 8, 'Jomy Lee ', NULL, 'For the doctor\'s appointment, is everyone can book appointment??? Please Reply me ASAP!', 'Everyone can book, its benefits for u all. Thank u!', 'Rachel'),
(5, 5, 'Alice Tan', 'uploads/Logo1111.png', 'who design this logo?? its awesome!!', 'Its me!!! thank you for prasing!!!! Appreciated!', 'Caryn'),
(6, 10, 'Lee Zi Xu', NULL, 'why everyday need keep fill health status....', NULL, NULL),
(7, 9, 'Tay Tiong Yi', 'uploads/677763.jpg', 'Happy Nurse Day!!! BTW how many nurse in this club??', NULL, NULL),
(8, 11, 'Lim Viola', 'uploads/NursingHomes.jpg', 'what they doing???', NULL, NULL),
(9, 6, 'Siti', 'uploads/41808433_l.jpg', 'What is the name of this doctor?', NULL, NULL),
(10, 4, 'Tan Yu Ki', NULL, 'I am too boring.. Any activities suggested???', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `p_height` int NOT NULL,
  `p_weight` int NOT NULL,
  `p_blood` int NOT NULL,
  `p_heart` int NOT NULL,
  `p_temp` float(3,1) NOT NULL,
  `p_oxy` int NOT NULL,
  `p_date` date NOT NULL,
  `p_sysm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p_full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `p_id` int NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`),
  KEY `p_id_3` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_height`, `p_weight`, `p_blood`, `p_heart`, `p_temp`, `p_oxy`, `p_date`, `p_sysm`, `p_full_name`, `p_id`) VALUES
(176, 67, 98, 98, 36.4, 99, '2023-04-16', 'none', 'Ali', 1),
(173, 69, 33, 33, 37.5, 99, '2023-04-17', 'fever', 'Amir', 2),
(178, 67, 55, 55, 36.5, 99, '2023-04-17', 'cough', 'Johnson Lee', 3),
(166, 55, 88, 88, 36.5, 99, '2023-04-17', 'nausea', 'Tan Yuki', 4),
(167, 59, 55, 55, 37.5, 99, '2023-04-17', 'headache', 'Alice Tan', 5),
(166, 50, 40, 44, 39.5, 99, '2023-04-17', 'fatigue', 'Siti', 6),
(170, 67, 70, 77, 36.5, 99, '2023-04-17', 'vomiting', 'Amiru', 7),
(187, 88, 66, 77, 36.5, 99, '2023-04-17', 'dizziness', 'Jomy Lee', 8),
(179, 66, 66, 66, 36.0, 99, '2023-04-17', 'none', 'Tay Tiong Yi', 9),
(188, 78, 62, 80, 38.0, 99, '2023-04-17', 'none', 'Lee Zi Xu', 10),
(166, 45, 62, 78, 36.0, 99, '2023-04-17', 'nonee', 'Lim Viola', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `u_username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_cn_num` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_email_add` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_age` int NOT NULL,
  `u_gender` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_home_add` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u_dob` date NOT NULL,
  `u_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_username` (`u_username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_username`, `u_full_name`, `u_cn_num`, `u_email_add`, `u_age`, `u_gender`, `u_home_add`, `u_dob`, `u_password`) VALUES
(1, 'ali', 'ZS KU', '0182726252', 'ali@gmail.com', 64, 'Male', 'Endah Ria', '1955-04-17', '1234'),
(2, 'amir', 'Amir', '0162543827', 'amir@gmail.com', 76, 'Male', 'Kuala Lumpur', '1933-03-28', 'amir'),
(3, 'johnson', 'Johnson Lee', '0187265243', 'johnson@gmail.com', 80, 'Male', 'Pahang', '1966-06-06', 'johnson'),
(4, 'yuki', 'Tan Yu Ki', '0183736353', 'yuki@gmail.com', 69, 'Female', 'Penang', '1945-04-17', 'yuki'),
(5, 'alice', 'Alice Tan', '0162837365', 'alice@gmail.com', 78, 'Female', 'Kelantan', '1945-03-29', 'alice'),
(6, 'siti', 'Siti', '0109373823', 'siti@gmail.com', 89, 'Female', 'Kuala Lumpur', '1956-04-01', 'siti'),
(7, 'amiru', 'Amiru', '0198276534', 'amiru@gmail.com', 93, 'Female', 'Parkhill', '1935-03-29', 'amiru'),
(8, 'jomy', 'Jomy Lee ', '0192827363', 'jomy@gmail.com', 87, 'Male', 'Kelantan', '1955-03-31', 'jomy'),
(9, 'tty', 'Tay Tiong Yi', '0192827262', 'tty@gmail.com', 66, 'Male', 'Endah Promenade', '1973-01-06', 'tty'),
(10, 'zixu', 'Lee Zi Xu', '0192827222', 'zixu@gmail.com', 66, 'Male', 'Cheras', '1973-03-07', 'zixu'),
(11, 'viola', 'Lim Viola', '0182726252', 'viola@gmail.com', 60, 'Female', 'Puchong', '1931-11-18', 'viola'),
(12, 'test', 'Testing', '0182726222', 'testuser@gmail.com', 55, 'Male', 'APU', '2023-04-17', 'pass');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc_app`
--
ALTER TABLE `doc_app`
  ADD CONSTRAINT `doc_app_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `user` (`u_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `user` (`u_id`) ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `user` (`u_id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
