-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 08:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `rechnungseingang`
--

CREATE TABLE `rechnungseingang` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `IBAN` varchar(255) DEFAULT NULL,
  `falligkeit` date DEFAULT NULL,
  `verwendungszweck` varchar(255) DEFAULT NULL,
  `beitrag` varchar(255) DEFAULT NULL,
  `zahlungszweck` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `checks` varchar(255) DEFAULT NULL,
  `rechnungspath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rechnungseingang`
--
ALTER TABLE `rechnungseingang`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rechnungseingang`
--
ALTER TABLE `rechnungseingang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
