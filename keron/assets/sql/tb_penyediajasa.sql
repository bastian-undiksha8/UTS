-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 03:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kerjon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyediajasa`
--

CREATE TABLE `tb_penyediajasa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` char(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jasa` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyediajasa`
--

INSERT INTO `tb_penyediajasa` (`id`, `nama`, `nik`, `email`, `jasa`, `gambar`) VALUES
(18, 'I Putu Bastian AP', '823782739', 'badiputra8@gmail.com', 'WEB', 'user.png'),
(20, 'suhishd', '823782739', 'badiputra8@gmail.com', 'QWWQ', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_penyediajasa`
--
ALTER TABLE `tb_penyediajasa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penyediajasa`
--
ALTER TABLE `tb_penyediajasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
