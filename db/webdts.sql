-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 10:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdts`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attach_id` int(11) NOT NULL,
  `docu_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `docu_id` int(11) NOT NULL,
  `docu_code` varchar(50) NOT NULL,
  `docu_type` varchar(50) NOT NULL,
  `deadline` varchar(50) NOT NULL,
  `deli_type` varchar(50) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_address` varchar(50) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `reci_id` int(11) NOT NULL,
  `details` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`docu_id`, `docu_code`, `docu_type`, `deadline`, `deli_type`, `sender_name`, `sender_address`, `recipient`, `reci_id`, `details`, `status`, `dateAdded`) VALUES
(31, '2017-DTS-IN-00031', 'For Information', '2017-12-08', 'Hand Carry', 'Shann Locsin', 'Institute of Computing', 'Mary Claude Padasas - FD', 8, 'sample document only', 4, '2017-12-06 01:41:12'),
(32, '2017-DTS-IN-00032', 'Invitation', '2017-12-07', 'Hand Carry', 'Sample', 'Sample Address', 'Joshua Mark - LS', 5, 'sample only', 4, '2017-12-06 07:23:10'),
(33, '2017-DTS-IN-00033', 'Memorandum', '2017-12-12', 'Email', 'Sample Name', 'Sample Address', 'Mary Elisse Gonzales - LS', 2, 'sample document', 3, '2017-12-06 16:30:22'),
(34, '2017-DTS-IN-00034', 'For Information', '2017-12-09', 'Hand Carry', 'Angelina Jolie', 'Universal Studios', 'Mary Elisse Gonzales - LS', 2, 'sample document only', 4, '2017-12-06 16:32:23'),
(35, '2017-DTS-IN-00035', 'Job Orders', '2017-12-10', 'Email', 'Lee Soo Man', 'SM Entertainment', 'Mary Elisse Gonzales - LS', 2, 'sm global audition', 3, '2017-12-06 16:44:19'),
(37, '2017-DTS-IN-00037', 'Request and Invitation', '2017-12-15', 'Hand Carry', 'Lee Sajangnim', 'LOEN Entertainment', 'Mary Claude Padasas - FD', 8, 'this is a sample document.  a sample document', 2, '2017-12-09 09:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `reciTable_id` int(11) NOT NULL,
  `docu_id` int(11) NOT NULL,
  `reci_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`reciTable_id`, `docu_id`, `reci_id`, `status`) VALUES
(15, 31, 8, 4),
(16, 31, 2, 4),
(17, 32, 5, 4),
(18, 32, 8, 4),
(19, 33, 2, 3),
(20, 34, 2, 4),
(21, 35, 2, 3),
(22, 34, 5, 4),
(23, 37, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transact_id` int(11) NOT NULL,
  `docu_id` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` varchar(50) NOT NULL,
  `person_ic` varchar(50) NOT NULL,
  `route` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transact_id`, `docu_id`, `dateAdded`, `location`, `person_ic`, `route`, `remarks`, `duration`) VALUES
(57, 31, '2017-12-06 01:41:12', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(58, 31, '2017-12-06 01:43:14', 'RO', 'Joshua Mark Barrios Moldez', 'FD', 'forwarded to mary', '00:00:00'),
(59, 31, '2017-12-06 02:18:26', 'FD', 'Mary Claude Padasas', 'N/A', 'Document Received', '00:00:00'),
(60, 31, '2017-12-06 02:22:55', 'FD', 'Mary Claude Padasas', 'LS', 'hi powhsz', '00:00:00'),
(61, 31, '2017-12-06 02:23:48', 'LS', 'Mary Elisse Gonzales', 'N/A', 'Document Received', '00:00:00'),
(62, 32, '2017-12-06 07:23:10', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(63, 32, '2017-12-06 07:23:44', 'RO', 'Joshua Mark Barrios Moldez', 'LS', 'forwarded', '00:00:00'),
(64, 32, '2017-12-06 07:24:03', 'LS', 'Joshua Mark', 'N/A', 'Document Received', '00:00:00'),
(65, 32, '2017-12-06 07:24:44', 'LS', 'Joshua Mark', 'FD', 'to claude', '00:00:00'),
(66, 31, '2017-12-06 09:11:08', 'LS', 'Mary Elisse Gonzales', 'N/A', 'shann ended', '00:00:00'),
(67, 32, '2017-12-06 16:20:43', 'FD', 'Mary Claude Padasas', 'N/A', 'Document Received', '00:00:00'),
(68, 32, '2017-12-06 16:26:09', 'FD', 'Mary Claude Padasas', 'N/A', 'ended docu', '00:00:00'),
(69, 33, '2017-12-06 16:30:22', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(70, 33, '2017-12-06 16:30:50', 'RO', 'Joshua Mark Barrios Moldez', 'LS', 'forwarded to elisse', '00:00:00'),
(71, 34, '2017-12-06 16:32:23', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(72, 34, '2017-12-06 16:33:29', 'RO', 'Joshua Mark Barrios Moldez', 'LS', 'forwarded to mary elisse', '00:00:00'),
(73, 34, '2017-12-06 16:37:56', 'LS', 'Mary Elisse Gonzales', 'N/A', 'Document Received', '00:00:00'),
(74, 33, '2017-12-06 16:43:29', 'LS', 'Mary Elisse Gonzales', 'N/A', 'Document Received', '00:00:00'),
(75, 35, '2017-12-06 16:44:19', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(76, 35, '2017-12-06 16:44:46', 'RO', 'Joshua Mark Barrios Moldez', 'LS', 'forwarded the docu to elisse', '00:00:00'),
(77, 35, '2017-12-06 16:45:37', 'LS', 'Mary Elisse Gonzales', 'N/A', 'Document Received', '00:00:00'),
(78, 34, '2017-12-06 16:47:20', 'LS', 'Mary Elisse Gonzales', 'LS', 'sample to joshua', '00:00:00'),
(79, 34, '2017-12-06 16:48:37', 'LS', 'Joshua Mark', 'N/A', 'Document Received', '00:00:00'),
(80, 34, '2017-12-06 16:48:57', 'LS', 'Joshua Mark', 'N/A', 'i already received the docu', '00:00:00'),
(82, 37, '2017-12-09 09:22:50', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', 'N/A'),
(83, 37, '2017-12-09 09:25:03', 'RO', 'Joshua Mark Barrios Moldez', 'FD', 'forwarded to claude', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `office` varchar(50) NOT NULL,
  `userType` varchar(30) NOT NULL,
  `position` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `office`, `userType`, `position`, `password`, `created_at`) VALUES
(2, 'maryelisse', 'maryelisse@gmail.com', 'Mary Elisse Gonzales', 'Legal Services', 'User', 'Vice-President', '$2y$10$chJtiZUtt2vacpI7..rAkuLBZwzjR93A1wOre2LtVNf4JTICjS51.', '2017-11-21 23:26:06'),
(5, 'moldezjosh', 'j.markmoldez@gmail.com', 'Joshua Mark', 'Legal Services', 'User', 'Secretary', '$2y$10$GuNOMO0aP8ZM20gn3cgnY..Mcd53Efav9GYfchpuMdfuDf1vD43d6', '2017-11-27 16:44:27'),
(6, 'joshua', 'j.markmoldez@gmail.com', 'Joshua Mark Barrios Moldez', 'Record Office', 'Records Officer', 'Records Officer', '$2y$10$wOcB6/b/bgZ7GvFI6hgg0uvnJV2D1UUTyGgmgnRcuYpXQXuI64JiC', '2017-11-29 14:34:46'),
(7, 'admin', 'admin@gmail.com', 'Admin Name', 'Knowledge Management Division', 'Admin', 'Administrative', '$2y$10$4w1jviEAmwakcycGDHm9Wugooc4u/80B/0cwtPdOWTaZvvpAmfqE6', '2017-12-04 23:29:00'),
(8, 'maryclaude', 'maryclaude@gmail.com', 'Mary Claude Padasas', 'Finance Division', 'User', 'Documenter', '$2y$10$oeaBe9MYWGa0yoaI87AKD.mzA05RnSxOj8kXsUyZL0rnx.Z4gm9aC', '2017-12-06 09:38:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`docu_id`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`reciTable_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `docu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `reciTable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
