-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 01:38 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uploadfile`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachement`
--

CREATE TABLE `attachement` (
  `ID` int(11) NOT NULL,
  `FILE_NAME` varchar(50) NOT NULL,
  `FILE_DATA` blob NOT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `size` int(20) NOT NULL,
  `download` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `download`) VALUES
(1, 'Demo.txt', 3099, '1'),
(2, 'uploadFile.zip', 124377, '3'),
(3, 'Demo.txt', 3099, '0'),
(4, 'Decryption.docx', 154177, '0'),
(5, 'Demo.txt', 3099, '0'),
(6, 'geo_fence.sql', 1937, '0'),
(7, 'file.txt', 5796, '0'),
(8, 'file.txt', 5796, '0'),
(9, 'file.txt', 5796, '0'),
(10, 'file.txt', 5796, '0'),
(11, 'file.txt', 5796, '0'),
(12, 'file.txt', 5796, '0'),
(13, 'file.txt', 5796, '0'),
(14, 'geo_fence.sql', 1937, '0'),
(15, 'file.txt', 5796, '0'),
(16, 'file.txt', 5796, '0'),
(17, 'car-145008_640.png', 82253, '0'),
(18, 'file.txt', 5796, '0');

-- --------------------------------------------------------

--
-- Table structure for table `spilt_file_details`
--

CREATE TABLE `spilt_file_details` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filepath` varchar(100) DEFAULT NULL,
  `filesize` varchar(100) NOT NULL,
  `spilt_file` varchar(250) DEFAULT NULL,
  `spilt_filename` varchar(250) DEFAULT NULL,
  `spilt_filepath` varchar(250) DEFAULT NULL,
  `spilt_filesize` varchar(40) NOT NULL,
  `spilt_order` int(3) NOT NULL,
  `downloads` int(5) NOT NULL,
  `create_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spilt_file_details`
--

INSERT INTO `spilt_file_details` (`id`, `filename`, `filepath`, `filesize`, `spilt_file`, `spilt_filename`, `spilt_filepath`, `spilt_filesize`, `spilt_order`, `downloads`, `create_date`) VALUES
(1, 'file.txt', NULL, '5796', 'uploads/file-part-0.txt', NULL, NULL, '1852', 1, 3, '2021-07-12'),
(2, 'file.txt', NULL, '5796', 'uploads/file-part-1.txt', NULL, NULL, '1852', 2, 3, '2021-07-12'),
(3, 'file.txt', NULL, '5796', 'uploads/file-part-2.txt', NULL, NULL, '1852', 3, 3, '2021-07-12'),
(4, 'file.txt', NULL, '5796', 'uploads/file-part-3.txt', NULL, NULL, '1852', 4, 3, '2021-07-12'),
(5, 'file.txt', NULL, '5796', 'uploads/file-part-4.txt', NULL, NULL, '1852', 5, 3, '2021-07-12'),
(6, 'file.txt', NULL, '5796', 'uploads/file-part-5.txt', NULL, NULL, '1228', 6, 3, '2021-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `split file`
--

CREATE TABLE `split file` (
  `id` int(20) NOT NULL,
  `splitfname` varchar(30) NOT NULL,
  `path` varchar(30) NOT NULL,
  `mainfname` varchar(30) NOT NULL,
  `priority` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `file` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'santosh', 'santosh@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-07-12 11:02:29'),
(3, 'abc12345', 'abc@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-07-12 11:13:52'),
(4, 'shoaib', 'shoaib@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-07-12 11:54:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spilt_file_details`
--
ALTER TABLE `spilt_file_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `split file`
--
ALTER TABLE `split file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `spilt_file_details`
--
ALTER TABLE `spilt_file_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `split file`
--
ALTER TABLE `split file`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
