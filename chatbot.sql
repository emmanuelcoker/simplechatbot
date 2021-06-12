-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 04:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `message` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `username`, `created_at`) VALUES
(1, 'hello', 'david', '2021-06-11 02:24:30.284394'),
(2, 'whatsup', 'david', '2021-06-11 02:24:30.284394'),
(3, 'anyone here?', 'david', '2021-06-11 02:24:30.284394'),
(4, 'hi David', 'emmanuelcoker', '2021-06-11 02:24:30.284394'),
(5, 'how are you doing?', 'emmanuelcoker', '2021-06-11 02:24:30.284394'),
(6, 'im cool bro', 'david', '2021-06-11 02:24:30.284394'),
(7, 'thats good to hear', 'emmanuelcoker', '2021-06-11 02:24:30.284394'),
(8, 'hey bro you there?', 'david', '2021-06-11 02:59:56.128890'),
(9, 'yeah man', 'emmanuelcoker', '2021-06-11 03:00:33.649751'),
(10, 'Hello emmanuelcoker and david', 'Oscarwilson', '2021-06-11 07:05:30.295105'),
(11, 'hello everyone', 'Oscarwilson', '2021-06-11 08:06:01.975970'),
(12, 'im good oscar', 'emmanuelcoker', '2021-06-11 08:06:38.280822'),
(13, 'kk', 'opeyemi', '2021-06-11 09:23:25.415856');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'david', 'david@gmail.com', 'password'),
(2, 'emmanuelcoker', 'emmanuelcoker420@gmail.com', 'password'),
(3, 'Oscarwilson', 'oscarwilson@gmail.com', 'password'),
(4, 'opeyemi', 'opeyemi@gmail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
