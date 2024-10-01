-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 07:55 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `civdiv`
--

-- --------------------------------------------------------

--
-- Table structure for table `inhuman`
--

CREATE TABLE `inhuman` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `nik` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inhuman`
--

INSERT INTO `inhuman` (`ID`, `Nama`, `nik`) VALUES
(1, 'Andi', 221958),
(2, 'Budi', 744167),
(3, 'Citra', 210268),
(4, 'Dewi', 621430),
(5, 'Eko', 187498),
(6, 'Fajar', 378167),
(7, 'Gita', 141090),
(8, 'Hani', 891743),
(9, 'Iwan', 203355),
(10, 'Joko', 521909),
(11, 'Kiki', 358795),
(12, 'Lina', 970910),
(13, 'Mira', 484681),
(14, 'Nina', 691723),
(15, 'Oki', 419030),
(16, 'Putu', 431236),
(17, 'Qori', 628178),
(18, 'Rani', 449457),
(19, 'Siti', 765987),
(20, 'Toni', 798361),
(21, 'Udin', 831912),
(22, 'Vina', 672843),
(23, 'Wawan', 356508),
(24, 'Xena', 922352),
(25, 'Yudi', 560337),
(26, 'Zahra', 308261),
(27, 'Ardi', 864469),
(28, 'Bella', 538974),
(29, 'Cici', 302283),
(30, 'Deni', 587879),
(31, 'Ema', 664685),
(32, 'Fina', 567281),
(33, 'Gilang', 707086),
(34, 'Saddam', 155347),
(35, 'Hussein', 155348);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inhuman`
--
ALTER TABLE `inhuman`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inhuman`
--
ALTER TABLE `inhuman`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
