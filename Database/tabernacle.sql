-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 12:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabernacle`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit`
--

CREATE TABLE `bank_deposit` (
  `ID` int(100) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Amount` int(15) NOT NULL,
  `Deposit_by` varchar(50) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_deposit`
--

INSERT INTO `bank_deposit` (`ID`, `Category`, `Amount`, `Deposit_by`, `Created_at`) VALUES
(1, 'cheque', 25000, 'Chris Juma', '2023-11-03 07:42:21'),
(2, 'cheque', 2000, 'Mark Juma', '2023-11-03 07:44:07'),
(4, 'Cash', 5000, 'Alice Juma', '2023-11-03 07:46:43'),
(5, 'cash', 3000, 'Winscovia Mmbone', '2023-11-03 19:26:35'),
(8, 'cash', 45000, 'Ann Nyawino', '2023-11-05 19:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `baptism`
--

CREATE TABLE `baptism` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` varchar(5) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Baptism_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baptism`
--

INSERT INTO `baptism` (`ID`, `Name`, `Age`, `Phone`, `Email`, `Baptism_date`) VALUES
(1, 'Emmanuel Kisagi', '16', '0746269463', 'kisagi@gmail.com', '2023-11-26'),
(2, 'Jayden Mwangi', '18', '0114587690', 'mwangi@gmail.com', '2023-12-03'),
(4, 'Joel Owino', '43', '0123899762', 'joel@gmail.com', '2023-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` int(15) NOT NULL,
  `Reason` text NOT NULL,
  `Expense` text NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`ID`, `Date`, `Amount`, `Reason`, `Expense`, `Category`) VALUES
(1, '2023-11-19', 500, 'for Sunday school use', 'Paper and pens', 'Equipment'),
(2, '2023-11-26', 15000, 'For Church rent', 'Rent', 'The church');

-- --------------------------------------------------------

--
-- Table structure for table `marriage`
--

CREATE TABLE `marriage` (
  `ID` int(11) NOT NULL,
  `Groom_name` varchar(40) NOT NULL,
  `Groom_phone` varchar(15) NOT NULL,
  `Bride_name` varchar(40) NOT NULL,
  `Bride_phone` varchar(15) NOT NULL,
  `Marriage_date` date NOT NULL,
  `Officiator` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriage`
--

INSERT INTO `marriage` (`ID`, `Groom_name`, `Groom_phone`, `Bride_name`, `Bride_phone`, `Marriage_date`, `Officiator`) VALUES
(1, 'Glad Juma', '0723456712', 'Lynn Achieng', '0112347679', '2023-12-17', 'Stephen Chomba'),
(2, 'Glan Juma', '0756980813', 'Gift Wesonga', '0114534679', '2024-01-07', 'Mark Juma'),
(3, 'Mark kimani', '01123567432', 'Juliet Nyambura', '01145672365', '2024-12-14', 'Stephen Chomba');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `Name`, `Phone`, `Email`, `Address`, `Created_at`) VALUES
(1, 'Mark Juma', '0727262611', 'mark@gmail.com', 'Umoja III, Nairobi', '2023-10-20'),
(2, 'Alice Juma', '0728925698', 'alice@gmail.com', 'Kasarani, Nairobi', '2023-10-20'),
(3, 'Hemstone Omamo', '0789765423', 'omamo@gmail.com', 'Donholm, Nairobi', '2023-10-20'),
(4, 'Genevive Okoth', '0790123456', 'okoth@gmail.com', 'Makadara, Nairobi', '2023-10-20'),
(5, 'Vero Wambui', '0734768932', 'wambui@gmail.com', 'Kayole, Nairobi', '2023-10-20'),
(13, 'Jayden Glan', '0789564323', 'jayden@gmail.com', 'Ruiru, Nairobi', '2023-10-20'),
(15, 'Watson Luchisoyi', '0746269463', 'luchisoyi69@gmail.com', 'Muthaiga North Rd, Nairobi', '2023-10-20'),
(16, 'Stephen chomba', '0734765412', 'chomba@gmail.com', 'Kayole spine road, Nairobi', '2023-10-21'),
(18, 'Mark Nasongo', '0112347890', 'nasongo@gmail.com', 'Kasarani, Nairobi', '2023-10-21'),
(19, 'Ann Nyawino', '0734567312', 'nyawino@gmail.com', 'Muthaiga Rd, Nairobi', '2023-11-05'),
(20, 'Wafula Julius', '0756345423', 'wafula@gmqil.com', 'Muthaiga North Rd', '2023-11-15'),
(21, 'Renata Ron', '01145673212', 'renata@gmail.com', 'Kayole Rd', '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `pledges`
--

CREATE TABLE `pledges` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Pledge` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pledges`
--

INSERT INTO `pledges` (`ID`, `Name`, `Phone`, `Pledge`) VALUES
(3, 'Wafula julius', '0789765645', 10000),
(4, 'Winscovia Mmbone', '0123456576', 23000),
(5, 'Glad Juma', '0789674312', 13500),
(6, 'Stephen chomba', '0798876518', 5600),
(8, 'Watson Luchisoyi', '0746269463', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `UserName`, `Name`, `password`) VALUES
(1, 'admin', 'Watson Luchisoyi', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `baptism`
--
ALTER TABLE `baptism`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `marriage`
--
ALTER TABLE `marriage`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Marriage_date` (`Marriage_date`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `pledges`
--
ALTER TABLE `pledges`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `baptism`
--
ALTER TABLE `baptism`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marriage`
--
ALTER TABLE `marriage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pledges`
--
ALTER TABLE `pledges`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
