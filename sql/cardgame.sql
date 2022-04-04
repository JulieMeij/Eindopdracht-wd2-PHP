-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 04, 2022 at 09:06 AM
-- Server version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(2) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `number`, `name`, `colour`, `type`, `price`) VALUES
(1, 2, '2', 'red', 'hearts', 10),
(2, 3, '3', 'red', 'hearts', 10),
(3, 4, '4', 'red', 'hearts', 10),
(4, 5, '5', 'red', 'hearts', 10),
(5, 6, '6', 'red', 'hearts', 10),
(6, 7, '7', 'red', 'hearts', 10),
(7, 8, '8', 'red', 'hearts', 10),
(8, 9, '9', 'red', 'hearts', 10),
(9, 10, '10', 'red', 'hearts', 10),
(10, 11, 'J', 'red', 'hearts', 10),
(11, 12, 'Q', 'red', 'hearts', 10),
(12, 13, 'K', 'red', 'hearts', 10),
(13, 14, 'A', 'red', 'hearts', 10),
(14, 2, '2', 'red', 'diams', 10),
(15, 3, '3', 'red', 'diams', 10),
(16, 4, '4', 'red', 'diams', 10),
(17, 5, '5', 'red', 'diams', 10),
(18, 6, '6', 'red', 'diams', 10),
(19, 7, '7', 'red', 'diams', 10),
(20, 8, '8', 'red', 'diams', 10),
(21, 9, '9', 'red', 'diams', 10),
(22, 10, '10', 'red', 'diams', 10),
(23, 11, 'J', 'red', 'diams', 10),
(24, 12, 'Q', 'red', 'diams', 10),
(25, 13, 'K', 'red', 'diams', 10),
(26, 14, 'A', 'red', 'diams', 10),
(27, 2, '2', 'black', 'clubs', 10),
(28, 3, '3', 'black', 'clubs', 10),
(29, 4, '4', 'black', 'clubs', 10),
(30, 5, '5', 'black', 'clubs', 10),
(31, 6, '6', 'black', 'clubs', 10),
(32, 7, '7', 'black', 'clubs', 10),
(33, 8, '8', 'black', 'clubs', 10),
(34, 9, '9', 'black', 'clubs', 10),
(35, 10, '10', 'black', 'clubs', 10),
(36, 11, 'J', 'black', 'clubs', 10),
(37, 12, 'Q', 'black', 'clubs', 10),
(38, 13, 'K', 'black', 'clubs', 10),
(39, 14, 'A', 'black', 'clubs', 10),
(40, 2, '2', 'black', 'spades', 10),
(41, 3, '3', 'black', 'spades', 10),
(42, 4, '4', 'black', 'spades', 10),
(43, 5, '5', 'black', 'spades', 10),
(44, 6, '6', 'black', 'spades', 10),
(45, 7, '7', 'black', 'spades', 10),
(46, 8, '8', 'black', 'spades', 10),
(47, 9, '9', 'black', 'spades', 10),
(48, 10, '10', 'black', 'spades', 10),
(49, 11, 'J', 'black', 'spades', 10),
(50, 12, 'Q', 'black', 'spades', 10),
(51, 13, 'K', 'black', 'spades', 10),
(52, 14, 'A', 'black', 'spades', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(999) NOT NULL,
  `points` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `points`, `type`) VALUES
(5, 'julie', '$2y$10$reoNrvraAKCPR4Fn2vnTt.j7.c5Xai9i..rRA9JvUr5VN81FVLbzy', 169, 'admin'),
(6, 'jantje', '$2y$10$droX9FJGS.KlYp/WJ/dXEe.h0JXqmVN028wjUnE84RjCpXcAta12O', 999999, 'user'),
(10, 'pietje', '$2y$10$D7kMQ8o.QV9tl.Z.FV6/kucMA2YmziAqp56rF7qEAm.nLu.iOFScm', 100, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
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
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
