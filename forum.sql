-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 12:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `id` int(11) NOT NULL,
  `opis` text NOT NULL,
  `vreme_unosa` datetime NOT NULL,
  `email_korisnika` varchar(50) NOT NULL,
  `id_teme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `email` varchar(50) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `registrationtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`email`, `username`, `password`, `registrationtime`) VALUES
('dimitrijeradojkovic8@gmail.com', 'dimi', '$2y$10$xNgcwgE7pZ0GwPA84pw4TO1sLEFVetUCgqIyHroP6ba1TxJLANAYu', '2023-12-28 11:24:21'),
('djordjebisercic06@gmail.com', 'djordje', '$2y$10$3acRE4t0lCK6JWTmKMAiXeUuK3uqUbuExSJY6il7ks/Bx3rM4Uscq', '2024-01-30 17:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `teme`
--

CREATE TABLE `teme` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `opis` text NOT NULL,
  `vreme_unosa` datetime NOT NULL,
  `email_korisnika` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teme`
--

INSERT INTO `teme` (`id`, `naziv`, `opis`, `vreme_unosa`, `email_korisnika`) VALUES
(9, 'nesto4', 'hgjhgjhjhgjghgjhgjhhghghhhghhgfggggfgg', '2024-02-01 15:20:49', 'dimitrijeradojkovic8@gmail.com'),
(10, 'hfghgf', 'gfh', '2024-02-01 15:26:41', 'dimitrijeradojkovic8@gmail.com'),
(11, 'jkljkliuo', 'sgsscsc', '2024-02-01 15:35:48', 'dimitrijeradojkovic8@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `teme`
--
ALTER TABLE `teme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teme`
--
ALTER TABLE `teme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
