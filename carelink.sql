-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 08:24 PM
-- Server version: 10.4.28-MariaDB-log
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carelink`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `notes`, `submission_date`, `read_status`) VALUES
(2, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'Donasi', 'nyobaa', '2024-06-11 05:05:02', 1),
(3, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'Donasi', 'nyobaa', '2024-06-11 05:11:49', 1),
(6, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:12:58', 0),
(7, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:18:02', 0),
(8, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:18:54', 0),
(9, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:20:15', 0),
(10, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:20:23', 0),
(11, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:20:41', 0),
(12, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'hmm', 'hmmmm', '2024-06-11 05:41:59', 0),
(13, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'hmm', 'hmmmm', '2024-06-11 05:43:38', 0),
(14, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'hmm', 'coba dulu', '2024-06-12 12:21:11', 0),
(15, 'oca', 'septiarosalia493@gmail.com', 'nyoba', 'bisaaa', '2024-06-13 16:12:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `jumlah_donasi` double NOT NULL,
  `target_donasi` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `validation_status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `name`, `status`, `date_time`, `jumlah_donasi`, `target_donasi`, `email`, `notes`, `validation_status`) VALUES
(1, 'oca', 'Sedang dikonfirmasi', '2024-06-13 23:09:06', 2000000, 'Lingkungan', 'septiarosalia493@gmail.com', 'b', 'valid'),
(2, 'oca', 'Sedang dikonfirmasi', '2024-06-13 23:12:08', 2000000, 'Lingkungan', 'septiarosalia493@gmail.com', 'b', 'valid'),
(3, '', 'Sedang dikonfirmasi', '2024-06-13 23:12:51', 1000000, 'Kebencanaan', '2222@222.com', 'a', 'valid'),
(4, 'Septia Rosalia', 'Sedang dikonfirmasi', '2024-06-13 23:26:24', 2000000, 'Lingkungan', 'septiarosalia493@gmail.com', 'bisaa', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'oca', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
