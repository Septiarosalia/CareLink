-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 09:12 AM
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
(4, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'Donasi', 'nyobaa', '2024-06-11 05:12:37', 0),
(5, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'Donasi', 'nyobaa', '2024-06-11 05:12:41', 0),
(6, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:12:58', 0),
(7, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:18:02', 0),
(8, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:18:54', 0),
(9, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:20:15', 0),
(10, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:20:23', 0),
(11, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'apa ya', 'cobacoba\r\n', '2024-06-11 05:20:41', 0),
(12, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'hmm', 'hmmmm', '2024-06-11 05:41:59', 0),
(13, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'hmm', 'hmmmm', '2024-06-11 05:43:38', 0),
(14, 'Septia Rosalia', 'septiarosalia493@gmail.com', 'hmm', 'coba dulu', '2024-06-12 12:21:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `nama_donasi` varchar(100) NOT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `target` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `nama_donasi`, `deskripsi`, `target`) VALUES
(1, 'Bantu Renovasi Mushola', 'Musholla menjadi salah satu rumah atau tempat ibadah bagi umat Muslim. Namun di Indonesia sendiri dengan mayoritas penduduk muslim nomor 1 terbanyak di dunia, tidak semua wilayah memiliki Musholla yang layak. Terlebih di daerah-daerah terpencil yang sulit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_donasi`
--

CREATE TABLE `log_donasi` (
  `id_log_donasi` int(11) NOT NULL,
  `nama_donator` varchar(50) DEFAULT NULL,
  `id_donasi` int(11) NOT NULL,
  `tanggal_waktu_donasi` datetime NOT NULL,
  `jumlah_donasi` double NOT NULL,
  `email_donator` varchar(100) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_donasi`
--

INSERT INTO `log_donasi` (`id_log_donasi`, `nama_donator`, `id_donasi`, `tanggal_waktu_donasi`, `jumlah_donasi`, `email_donator`, `catatan`) VALUES
(1, 'Anonim', 1, '2024-06-13 00:43:11', 50000, NULL, NULL),
(2, 'Test', 1, '2024-06-13 01:19:20', 1000000, 'test@test.com', NULL),
(3, 'Untitled', 1, '2024-06-13 01:19:59', 1000, 'untitled@untitled.co.un', NULL),
(4, 'Nicholas Vitto Adrianto', 1, '2024-06-13 01:20:40', 50000, 'nvittoa@gmail.com', 'Semangat untuk kedepannya! Semoga sukses!'),
(5, 'Edge', 1, '2024-06-13 01:21:55', 1000000000, 'edge@microsoft.com', 'One billion dollars wkwkwk'),
(6, 'Anonim', 1, '2024-06-13 13:49:01', 50000, NULL, 'Semangat untuk kedepannya!'),
(7, 'SUATU NAMA', 1, '2024-06-13 13:55:59', 69420, NULL, 'Nice'),
(8, 'Nicholas Vitto Adrianto', 1, '2024-06-13 13:57:08', 5000, 'nvittoa@gmail.com', 'seamngat'),
(9, 'Nicholas Vitto Adrianto', 1, '2024-06-13 13:57:26', 5000, 'nvittoa@gmail.com', 'seamngat');

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
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `log_donasi`
--
ALTER TABLE `log_donasi`
  ADD PRIMARY KEY (`id_log_donasi`),
  ADD KEY `FK_donasi` (`id_donasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_donasi`
--
ALTER TABLE `log_donasi`
  MODIFY `id_log_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_donasi`
--
ALTER TABLE `log_donasi`
  ADD CONSTRAINT `FK_donasi` FOREIGN KEY (`id_donasi`) REFERENCES `donasi` (`id_donasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
