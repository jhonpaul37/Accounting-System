-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 04:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting_budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_entry`
--

CREATE TABLE `accounting_entry` (
  `UACS_code` int(20) NOT NULL,
  `Account_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `burs`
--

CREATE TABLE `burs` (
  `Amount` int(20) NOT NULL,
  `Particulars` varchar(200) NOT NULL,
  `Office` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Payee` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disbursement_voucher`
--

CREATE TABLE `disbursement_voucher` (
  `Jev_No` varchar(100) NOT NULL,
  `date_created` date DEFAULT NULL,
  `Address` varchar(5) NOT NULL,
  `Employee_No` varchar(50) NOT NULL,
  `MOP` varchar(20) NOT NULL,
  `F_cluster` varchar(10) NOT NULL,
  `Payee` varchar(30) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `descrip` varchar(100) NOT NULL,
  `div_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disbursement_voucher`
--

INSERT INTO `disbursement_voucher` (`Jev_No`, `date_created`, `Address`, `Employee_No`, `MOP`, `F_cluster`, `Payee`, `amount`, `descrip`, `div_number`) VALUES
('23135', '2024-01-22', '', '', '', 'Cluster 07', 'Zed', 5000, 'Office supplies', ''),
('2401', '2024-01-02', '', '', '', 'Cluster 01', 'jhnpaul', 500000, 'Office supplies', ''),
('2402', '2024-02-03', '', '', '', 'Cluster 05', 'Zed', 1000000, 'ICT Books', ''),
('2403', '2024-03-13', '', '', '', 'Cluster 01', 'Zed', 1000000, 'ICT Books', ''),
('2404', '2024-04-15', '', '', '', 'Cluster 01', 'Zed', 13546, 'ICT Books', ''),
('2405', '2024-03-13', '', '', '', 'Cluster 01', 'Zed', 1000, 'ICT Books', ''),
('2406', '2024-05-16', '', '', '', 'Cluster 01', 'Zed', 15003, 'ICT Books', ''),
('2407', '2024-06-22', '', '', '', 'Cluster 01', 'Zed', 150046, 'ICT Books', ''),
('2408', '2024-07-10', '', '', '', 'Cluster 01', 'Zed', 1567446, 'ICT Books', '');

-- --------------------------------------------------------

--
-- Table structure for table `div_transaction`
--

CREATE TABLE `div_transaction` (
  `div_number` varchar(100) NOT NULL,
  `date_transaction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fund_clusters`
--

CREATE TABLE `fund_clusters` (
  `F_cluster` varchar(10) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fund_clusters`
--

INSERT INTO `fund_clusters` (`F_cluster`, `Description`, `amount`) VALUES
('Cluster 01', 'Regular GAA', 1054100),
('Cluster 05', 'STF', 1505756),
('Cluster 06', 'IGP', 1605322),
('Cluster 07', 'TF', 5567024);

-- --------------------------------------------------------

--
-- Table structure for table `jev_transaction`
--

CREATE TABLE `jev_transaction` (
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `Jev_No` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_entry`
--
ALTER TABLE `accounting_entry`
  ADD PRIMARY KEY (`UACS_code`);

--
-- Indexes for table `burs`
--
ALTER TABLE `burs`
  ADD PRIMARY KEY (`Amount`);

--
-- Indexes for table `disbursement_voucher`
--
ALTER TABLE `disbursement_voucher`
  ADD PRIMARY KEY (`Jev_No`),
  ADD KEY `fund_cluster` (`F_cluster`);

--
-- Indexes for table `div_transaction`
--
ALTER TABLE `div_transaction`
  ADD PRIMARY KEY (`div_number`);

--
-- Indexes for table `fund_clusters`
--
ALTER TABLE `fund_clusters`
  ADD PRIMARY KEY (`F_cluster`);

--
-- Indexes for table `jev_transaction`
--
ALTER TABLE `jev_transaction`
  ADD KEY `Jev_number` (`Jev_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_entry`
--
ALTER TABLE `accounting_entry`
  MODIFY `UACS_code` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `burs`
--
ALTER TABLE `burs`
  MODIFY `Amount` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disbursement_voucher`
--
ALTER TABLE `disbursement_voucher`
  ADD CONSTRAINT `fund_cluster` FOREIGN KEY (`F_cluster`) REFERENCES `fund_clusters` (`F_cluster`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jev_transaction`
--
ALTER TABLE `jev_transaction`
  ADD CONSTRAINT `Jev_number` FOREIGN KEY (`Jev_No`) REFERENCES `disbursement_voucher` (`Jev_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
