-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 09:33 AM
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
(32, '2017-DTS-IN-00032', 'Invitation', '2017-12-07', 'Hand Carry', 'Sample', 'Sample Address', 'Joshua Mark - LS', 5, 'sample only', 4, '2017-12-06 07:23:10'),
(33, '2017-DTS-IN-00033', 'Memorandum', '2017-12-12', 'Email', 'Sample Name', 'Sample Address', 'Mary Elisse Gonzales - LS', 2, 'sample document', 4, '2017-12-06 16:30:22'),
(34, '2017-DTS-IN-00034', 'For Information', '2017-12-09', 'Hand Carry', 'Angelina Jolie', 'Universal Studios', 'Mary Elisse Gonzales - LS', 2, 'sample document only', 4, '2017-12-06 16:32:23'),
(35, '2017-DTS-IN-00035', 'Job Orders', '2017-12-10', 'Email', 'Lee Soo Man', 'SM Entertainment', 'Mary Elisse Gonzales - LS', 2, 'sm global audition', 4, '2017-12-06 16:44:19'),
(37, '2017-DTS-IN-00037', 'Request and Invitation', '2017-12-15', 'Hand Carry', 'Lee Sajangnim', 'LOEN Entertainment', 'Mary Claude Padasas - FD', 8, 'this is a sample document.  a sample document', 4, '2017-12-09 09:22:50'),
(38, '2017-DTS-IN-00038', 'Request and Invitation', '2017-12-14', 'Hand Carry', 'Jahmicah Boo', 'University of Southeastern Philippines', 'Jethro Bernardo - KMD', 9, 'this is a sample document. a sample document', 3, '2017-12-10 10:40:35'),
(39, '2017-DTS-IN-00039', 'Purchase Requests', '2017-12-17', 'Email', 'Jomari Ondap', 'Obrero Company', 'Jethro Bernardo - KMD', 9, 'this is a sample document for a sample transaction', 4, '2017-12-10 10:47:29'),
(41, '2017-DTS-IN-00041', 'For Information', '2017-12-13', 'Email', 'Brad Pitt', 'Universal Studios', 'Mary Elisse Gonzales - LS', 2, 'this is a sample document', 4, '2017-12-11 20:58:58'),
(42, '2017-DTS-IN-00042', 'Request and Invitation', '2017-12-19', 'Hand Carry', 'Lee Ji Eun', 'LOEN Entertainment', 'Jethro Bernardo - KMD', 9, 'sample docu', 4, '2017-12-12 00:02:42'),
(44, '2017-DTS-IN-00044', 'Request', 'N/A', 'Post Mail', 'Lee Soo Man', 'SM Entertainment', 'Jethro Bernardo - KMD', 9, 'sample', 3, '2017-12-13 16:19:22'),
(58, '2017-DTS-IN-00058', 'For Information', 'N/A', 'Post Mail', 'Lee Sajangnim', 'LOEN Entertainment', 'Shann Kirby Locsin - LS', 10, 'sampl pls', 4, '2017-12-14 03:50:49'),
(59, '2017-DTS-IN-00059', 'Request and Invitation', '2017-12-19', 'Hand Carry', 'Joshua Mark', 'Sandawa', 'Jethro Bernardo - KMD', 9, 'sample', 1, '2017-12-17 21:05:27'),
(60, '2017-DTS-IN-00060', 'Memorandum', 'N/A', 'Hand Carry', 'Jahmicah Boo', 'Buhangin', 'Mary Elisse Gonzales - LS', 2, 'sample only', 1, '2017-12-17 21:07:01'),
(61, '2017-DTS-IN-00061', 'Request and Invitation', 'N/A', 'Hand Carry', 'Mary Claudewyn Padasas', 'Obrero Company', 'Jethro Bernardo - KMD', 9, 'sample only', 3, '2017-12-17 21:15:01'),
(62, '2017-DTS-IN-00062', 'Job Orders', 'N/A', 'Hand Carry', 'Shann Locsin', 'Sample Address', 'Jethro Bernardo - KMD', 9, 'test', 3, '2017-12-17 21:22:24'),
(64, '2017-DTS-IN-00064', 'Invitation', '2017-12-25', 'Email', 'Testing', 'DOST', 'Testing - FD', 16, 'Sample', 4, '2017-12-17 23:48:46'),
(65, '2017-DTS-IN-00065', 'Request', '2017-12-20', 'Hand Carry', 'Shann Locsin', 'USeP', 'Testing - FD', 16, 'sample only', 2, '2017-12-17 23:58:23'),
(66, '2017-DTS-IN-00066', 'For Information', '2017-12-22', 'Post Mail', 'Brad Pitt', 'USA', 'Testing - FD', 16, 'hello', 4, '2017-12-18 00:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(11) UNSIGNED NOT NULL,
  `docu_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT 'Unititled.txt',
  `filetype` varchar(10) NOT NULL,
  `filesize` bigint(20) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `docu_id`, `file`, `filename`, `filetype`, `filesize`, `created`) VALUES
(21, 35, '18456-lesson01.pdf', 'lesson01.pdf', 'applicatio', 102016, '2017-12-11 16:07:00'),
(22, 42, '23272-01 Building a simple PhoneGap application.pdf', '01 Building a simple PhoneGap application.pdf', 'applicatio', 340892, '2017-12-13 06:22:36'),
(26, 61, '41979-NETWORK_CABLE_STANDARDS.pdf', 'NETWORK_CABLE_STANDARDS.pdf', 'applicatio', 207026, '2017-12-17 21:21:51'),
(27, 62, '4576-NETWORK_CABLE_STANDARDS.pdf', 'NETWORK_CABLE_STANDARDS.pdf', 'applicatio', 207026, '2017-12-17 21:22:36'),
(29, 64, '66141-Communications_and_Networking_Models_Part_2.pdf', 'Communications_and_Networking_Models_Part_2.pdf', 'applicatio', 551311, '2017-12-17 23:51:22'),
(30, 65, '87671-4._Network_Management.pdf', '4._Network_Management.pdf', 'applicatio', 1295504, '2017-12-17 23:58:36'),
(31, 66, '59252-Communications_and_Networking_Models_Part_2.pdf', 'Communications_and_Networking_Models_Part_2.pdf', 'applicatio', 551311, '2017-12-18 00:08:19');

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
(17, 32, 5, 4),
(18, 32, 8, 4),
(19, 33, 2, 4),
(20, 34, 2, 4),
(21, 35, 2, 4),
(22, 34, 5, 4),
(23, 37, 8, 4),
(24, 35, 8, 4),
(25, 38, 9, 3),
(26, 39, 9, 4),
(27, 41, 2, 4),
(30, 41, 9, 4),
(31, 42, 9, 4),
(32, 44, 9, 3),
(45, 58, 10, 4),
(46, 58, 9, 4),
(47, 61, 9, 3),
(48, 62, 9, 3),
(49, 64, 16, 4),
(50, 65, 16, 2),
(51, 64, 9, 4),
(52, 66, 16, 4),
(53, 66, 9, 4);

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
(62, 32, '2017-12-06 07:23:10', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(63, 32, '2017-12-06 07:23:44', 'RO', 'Joshua Mark Barrios Moldez', 'LS', 'forwarded', '00:00:00'),
(64, 32, '2017-12-06 07:24:03', 'LS', 'Joshua Mark', 'N/A', 'Document Received', '00:00:00'),
(65, 32, '2017-12-06 07:24:44', 'LS', 'Joshua Mark', 'FD', 'to claude', '00:00:00'),
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
(82, 37, '2017-12-09 09:22:50', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(83, 37, '2017-12-09 09:25:03', 'RO', 'Joshua Mark Barrios Moldez', 'FD', 'forwarded to claude', '00:00:00'),
(84, 37, '2017-12-09 14:13:30', 'FD', 'Mary Claude Padasas', 'N/A', 'Document Received', '00:00:00'),
(85, 35, '2017-12-10 10:24:34', 'LS', 'Mary Elisse Gonzales', 'FD', 'forwarded to claude', '00:00:00'),
(86, 38, '2017-12-10 10:40:35', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(87, 38, '2017-12-10 10:42:03', 'RO', 'Joshua Mark Barrios Moldez', 'KMD', 'forwarded to jethro', '00:00:00'),
(88, 38, '2017-12-14 03:50:06', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00:04:01'),
(89, 39, '2017-12-10 10:47:29', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(90, 39, '2017-12-10 10:48:17', 'RO', 'Joshua Mark Barrios Moldez', 'KMD', 'forwarded to jethro', '00:00:00'),
(91, 39, '2017-12-10 10:49:05', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00:00:00'),
(92, 39, '2017-12-10 10:56:58', 'KMD', 'Jethro Bernardo', 'N/A', 'purchased na jom. that something', '00:00:00'),
(93, 35, '2017-12-11 16:07:33', 'FD', 'Mary Claude Padasas', 'N/A', 'Document Received', '00:00:00'),
(95, 41, '2017-12-11 20:58:58', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(96, 41, '2017-12-11 20:59:19', 'RO', 'Joshua Mark Barrios Moldez', 'LS', 'Forwarded to Mary Elisse', '00:00:00'),
(97, 41, '2017-12-11 21:00:32', 'LS', 'Mary Elisse Gonzales', 'N/A', 'Document Received', '00:00:00'),
(100, 41, '2017-12-11 21:08:51', 'LS', 'Mary Elisse Gonzales', 'KMD', 'Forwarded to Jethro', '00:00:00'),
(101, 41, '2017-12-11 21:09:16', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00:00:00'),
(102, 41, '2017-12-11 21:10:52', 'KMD', 'Jethro Bernardo', 'N/A', 'My Remarks', '00:00:00'),
(103, 42, '2017-12-12 00:02:42', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(104, 42, '2017-12-12 00:03:16', 'RO', 'Joshua Mark Barrios Moldez', 'KMD', 'forwarded to jethro', '00:00:00'),
(105, 42, '2017-12-12 00:08:53', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00:00:00'),
(107, 44, '2017-12-13 16:19:22', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', '00:00:00'),
(108, 44, '2017-12-13 16:20:07', 'RO', 'Joshua Mark Barrios Moldez', 'KMD', 'forwarded to jethro', '00:00:00'),
(109, 44, '2017-12-13 16:21:27', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00:00:00'),
(135, 58, '2017-12-14 03:50:49', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', 'N/A'),
(136, 58, '2017-12-14 03:51:26', 'RO', 'Joshua Mark Barrios Moldez', 'LS', 'sample', '00:00:37'),
(137, 58, '2017-12-14 03:54:19', 'LS', 'Shann Kirby Locsin', 'N/A', 'Document Received', '00:02:51'),
(138, 58, '2017-12-14 03:56:02', 'LS', 'Shann Kirby Locsin', 'KMD', 'forwarded to jethro', '00:01:43'),
(139, 58, '2017-12-14 03:57:30', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00:01:27'),
(140, 42, '2017-12-14 03:58:02', 'KMD', 'Jethro Bernardo', 'N/A', 'ended', '03:49:09'),
(141, 33, '2017-12-14 04:03:09', 'LS', 'Mary Elisse Gonzales', 'N/A', 'ended', '11:19:38'),
(142, 35, '2017-12-14 04:04:00', 'LS', 'Mary Elisse Gonzales', 'N/A', 'ended', 'N/A'),
(143, 37, '2017-12-14 04:05:06', 'FD', 'Mary Claude Padasas', 'N/A', 'ended', '04 day/s 13:51:35'),
(144, 59, '2017-12-17 21:05:27', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', 'N/A'),
(145, 60, '2017-12-17 21:07:01', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', 'N/A'),
(146, 61, '2017-12-17 21:15:01', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', 'N/A'),
(147, 61, '2017-12-17 21:15:15', 'RO', 'Joshua Mark Barrios Moldez', 'KMD', 'forwarded to jethro', '00 day/s 00:00:13'),
(148, 61, '2017-12-17 21:17:24', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00 day/s 00:02:09'),
(149, 62, '2017-12-17 21:22:24', 'RO', 'Joshua Mark Barrios Moldez', 'N/A', 'N/A', 'N/A'),
(150, 62, '2017-12-17 21:23:13', 'RO', 'Joshua Mark Barrios Moldez', 'KMD', 'forwarded to jethro', '00 day/s 00:00:49'),
(151, 62, '2017-12-17 21:24:08', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00 day/s 00:00:55'),
(152, 58, '2017-12-17 21:25:34', 'KMD', 'Jethro Bernardo', 'N/A', 'ended', '03 day/s 17:28:04'),
(154, 64, '2017-12-17 23:48:46', 'RO', 'Record Off', 'N/A', 'N/A', 'N/A'),
(155, 64, '2017-12-17 23:52:25', 'RO', 'Record Off', 'FD', 'please facilitate', '00 day/s 00:03:38'),
(156, 65, '2017-12-17 23:58:23', 'RO', 'Record Off', 'N/A', 'N/A', 'N/A'),
(157, 65, '2017-12-17 23:58:54', 'RO', 'Record Off', 'FD', 'forwarded to testing', '00 day/s 00:00:30'),
(158, 64, '2017-12-18 00:01:46', 'FD', 'Testing', 'N/A', 'Document Received', '00 day/s 00:09:20'),
(159, 64, '2017-12-18 00:02:07', 'FD', 'Testing', 'KMD', 'to jethro', '00 day/s 00:00:20'),
(160, 64, '2017-12-18 00:03:25', 'FD', 'Testing', 'N/A', 'done', '00 day/s 00:01:17'),
(161, 66, '2017-12-18 00:08:11', 'RO', 'Record Off', 'N/A', 'N/A', 'N/A'),
(162, 66, '2017-12-18 00:08:31', 'RO', 'Record Off', 'FD', 'forwarded', '00 day/s 00:00:20'),
(163, 66, '2017-12-18 00:08:49', 'FD', 'Testing', 'N/A', 'Document Received', '00 day/s 00:00:18'),
(164, 66, '2017-12-18 00:09:31', 'FD', 'Testing', 'KMD', 'to jethro. end', '00 day/s 00:00:41'),
(165, 66, '2017-12-18 00:09:45', 'KMD', 'Jethro Bernardo', 'N/A', 'Document Received', '00 day/s 00:00:14'),
(166, 66, '2017-12-18 00:09:54', 'KMD', 'Jethro Bernardo', 'N/A', 'end document', '00 day/s 00:00:08');

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
(2, 'mryelisse', 'maryelisse@gmail.com', 'Mary Elisse G. Gonzales', 'Legal Services', 'User', 'Vice-President', '$2y$10$chJtiZUtt2vacpI7..rAkuLBZwzjR93A1wOre2LtVNf4JTICjS51.', '2017-11-21 23:26:06'),
(6, 'joshua', 'j.markmoldez@gmail.com', 'Joshua Mark Barrios Moldez', 'Record Office', 'Records Officer', 'Records Officer', '$2y$10$wOcB6/b/bgZ7GvFI6hgg0uvnJV2D1UUTyGgmgnRcuYpXQXuI64JiC', '2017-11-29 14:34:46'),
(7, 'admin', 'admin@gmail.com', 'Admin Name', 'Knowledge Management Division', 'Admin', 'Administratives', '$2y$10$4w1jviEAmwakcycGDHm9Wugooc4u/80B/0cwtPdOWTaZvvpAmfqE6', '2017-12-04 23:29:00'),
(8, 'maryclaude', 'maryclaude@gmail.com', 'Mary Claude Padasas', 'Finance Division', 'User', 'Documenter', '$2y$10$oeaBe9MYWGa0yoaI87AKD.mzA05RnSxOj8kXsUyZL0rnx.Z4gm9aC', '2017-12-06 09:38:02'),
(9, 'jethro', 'jet@gmail.com', 'Jethro Bernardo', 'Knowledge Management Division', 'User', 'Developer', '$2y$10$z0LALG/qOJFgCfGV42KlneyZk6PIrdfWv7YqwlajIw8WldfeqKKo.', '2017-12-10 18:38:25'),
(10, 'shann03', 'shannlocsin@gmail.com', 'Shann Kirby Locsin', 'Legal Services', 'User', 'Judger', '$2y$10$CnYB2yJggf9cKlOO5LhnCuh893OhNjLWPvrMEqKKZvKOnVH1ANcxu', '2017-12-12 05:33:05'),
(15, 'marny', 'marny@gmail.com', 'marnela regalado', 'Legal Services', 'User', 'Straight', '$2y$10$.3EI44iMun6lMyQmZ0vgReQLQMC/29ztCAzIPSetObg5PM7p.XjsS', '2017-12-18 06:00:31'),
(16, 'testing', 'testing@gmail.com', 'Testing', 'Finance Division', 'User', 'Accountant', '$2y$10$SLuGk0hxfeWVenMZ1RK/tejJ7mCUE6qVdXQrSI5wfcU2w1evKx4i2', '2017-12-18 07:28:04'),
(17, 'record', 'record@gmail.com', 'Record Off', 'Record Office', 'Records Officer', 'Records Officer', '$2y$10$YDbKd6Qmt9o1/AQXhKHaj.lkRWyxNxgGgB.L24u2/asP/FDrTK5K.', '2017-12-18 07:35:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`docu_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

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
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `docu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `reciTable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
