-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 05:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'LUTFI', '$2y$10$r7kVq0/PNiW6BQTqMmenre9UzK5tH6xGLTfMn2i5NZGeUFktflqkW'),
(2, 'camalia', '$2y$10$WmXTkv6Rf3jXzG6VahC5/uMxA5XuEtRLKoAV7xCt5/JjsaPM7bdK2'),
(3, 'indah', '$2y$10$2GzXJxBuiyoCtYsXwjvfL.wshwQJyZ1Llgsdt8tacemvBrwado2x.'),
(4, 'amir', '$2y$10$ICu/cbgpv6rF6jjqrEBKb.HjMYjbXms3ftxHMXAwlZDa3RsBozKmK'),
(5, 'ZAKUWAN', '$2y$10$Z7GTrTClKZlw6TMpyXOkSumWGI7nVPK1nVlOm4KvAyAqL.1lzDqg6');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `login_id` int(3) NOT NULL,
  `admin_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_register`
--

CREATE TABLE `patient_register` (
  `register_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `medical_history` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `name`, `gender`, `phone`, `email`, `date`, `medical_history`, `password`) VALUES
(3, 'alyea', 'FEMALE', '111', 'yeaa@gmail.com', '', 'fever', '$2y$10$o5iRNgxX8nnDp'),
(6, 'ALYA', 'female', '0135504603', 'aaa@mail.com', '2025-01-27', 'accident', '$2y$10$UZkSBsd.7CXtWq1u7pb0Z.M6t6qaDAAv5sIUeLLgyTLBcmAUx4qrO'),
(7, 'zakwan', 'MALE', '0198879000', 'ke@gmail.com', '4/2/2025', 'accident/hand', ''),
(8, 'melati', 'FEMALE', '0112347890', 'mai@gmail.com', '2 FEB 2025', 'accident/hand', '$2y$10$SElRcuKoLmydFrNM.OLVU.zVd74U3MCHAbZ1./8OSO.cZIcovRZdi'),
(9, 'NUR KASIH ALICIA', 'FEMALE', '0125567890', 'LYCIA@yahoo.com', '5/2/2025', 'fever/hb low', ''),
(10, 'ahmad amirul', 'MALE', '0174100156', 'amirul@mail.com', '5/2/2025', 'medical checkup', '$2y$10$dfdoTP6zlGnLUoQUvqsp5eE4RTw0VOP.lQxjnmYG6atVO6brXdvrO'),
(11, 'linda', 'FEMALE', '0174100156', 'lyn@mail.com', '5/2/2025', 'medical checkup/hblow', ''),
(12, 'amalia', 'FEMALE', '0174100134', 'amalia@mail.com', '4/2/2025', 'medical checkup', '$2y$10$WcZxLXA3cherCGc0zRZ8Tuu5LPtZWwFbg39u.tCAPFUc241tsYAI2'),
(13, 'melur', 'FEMALE', '0156790204', 'melur@mil.com', '2 FEB 2025', 'medical checkup', ''),
(14, 'AMALIYA', 'FEMALE', '0194516689', 'amaliya@mail.com', '20 FEB 2025', 'fever/hb low', '$2y$10$BPYif5pTgd/81emQPp8A6.rMyPyY04AHfkZtXxebqlqiqWQCuXX0i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `patient_register`
--
ALTER TABLE `patient_register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `login_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_register`
--
ALTER TABLE `patient_register`
  MODIFY `register_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD CONSTRAINT `login_admin_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_register`
--
ALTER TABLE `patient_register`
  ADD CONSTRAINT `patient_register_ibfk_1` FOREIGN KEY (`register_id`) REFERENCES `register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
