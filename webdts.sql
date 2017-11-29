-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 04:06 PM
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
(1, '2017-DTS-IN01', 'Invitation', '12/1/2017', 'Email', 'Lee Sajangnim', 'LOEN Entertainment', 'Joshua Mark - LS', 5, 'This is the invitation for the Melon Music Awards ', 1, '2017-11-29 08:22:28'),
(5, '2017-DTS-IN01', 'Request', '1/1/2017', 'Post Mail', 'C', 'B', 'Joshua Mark - LS', 5, 'X', 1, '2017-11-29 09:55:51'),
(6, '2017-DTS-IN01', 'Request and Invitation', '1/1/2017', 'Hand Carry', 'Yang Hyuk Suk', 'YG Entertainment', 'Jethro Bernardo - FD', 3, 'mixnine', 1, '2017-11-29 09:57:13');

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
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'maryelisse', 'maryelisse@gmail.com', 'Mary Elisse Gonzales', 'Legal Services', 'User', 'Secretary', '$2y$10$chJtiZUtt2vacpI7..rAkuLBZwzjR93A1wOre2LtVNf4JTICjS51.', '2017-11-21 23:26:06'),
(3, 'jethro', 'jeth@gmail.com', 'Jethro Bernardo', 'Finance Division', 'User', 'Secretary', '$2y$10$ET6goVL3CJM0GzNuZMGpMeAQ7RA9fRxNmZPbUpwK13pLDJghPCuPG', '2017-11-22 08:11:18'),
(4, 'yeosinb', 'sinb@gmail.com', 'Hwang Eun Bi', 'Knowledge Management Division', 'Admin', 'Designer', '$2y$10$JrWLMoNbRuJBtFesyLCQ5ut5293E3cGvtz3tthIWodzbTbIZbibPq', '2017-11-24 23:28:35'),
(5, 'moldezjosh', 'j.markmoldez@gmail.com', 'Joshua Mark', 'Legal Services', 'User', 'Secretary', '$2y$10$GuNOMO0aP8ZM20gn3cgnY..Mcd53Efav9GYfchpuMdfuDf1vD43d6', '2017-11-27 16:44:27'),
(6, 'joshua', 'j.markmoldez@gmail.com', 'Joshua Mark Moldez', 'Record Office', 'Records Officer', 'Records Officer', '$2y$10$aRWPC2g5XfHZQerCgiU30exPeCE6X6RfDG4wjvdXGXKkNtT3AO1eK', '2017-11-29 14:34:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`docu_id`);

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
  MODIFY `docu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
