-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 07:07 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.14-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudOOP`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `akses_id` int(50) NOT NULL,
  `suka` int(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `akses_id`, `suka`, `gambar`) VALUES
(2, 'user', 'user', 1, 34, 'img/LogoSample_ByTailorBrands (2).jpg'),
(3, 'triatopx', 'admin', 2, 78, 'img/LogoSample_ByTailorBrands.jpg'),
(5, 'nandapuspitarana@gmail.com', 'hai', 1, 1, ''),
(8, 'toor', 'toor', 2, 2, ''),
(10, 'ismedF', 'ismed', 1, 1, ''),
(11, 'sdn', 'ds', 2, 2, ''),
(13, 'amdin', 'amdin', 2, 1, ''),
(14, 's', 's', 2, 1, ''),
(17, 'sd', 'ds', 1, 0, 'segitiga-pascal.png'),
(21, 'fg', 'gt', 1, 0, 'img/segitiga-pascal.png'),
(22, 'admin', 'admin', 2, 1, ''),
(23, 'admina', 'admins', 1, 0, 'img/LogoSample_ByTailorBrands (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `kategori` int(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(50) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
