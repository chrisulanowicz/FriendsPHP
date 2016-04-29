-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 29, 2016 at 05:02 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`user_id`, `friend_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(3, 1),
(3, 4),
(3, 5),
(4, 1),
(4, 3),
(5, 3),
(5, 6),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `alias`, `email`, `password`, `birthday`, `created_at`, `updated_at`) VALUES
(1, 'Barry Allen', 'Flash', 'ballen@dc.com', '$2y$10$mWiymKwnnufuByKDcTnI6uRuNr5uTcpAAtDNgXiYoKwfqCpX09t2e', '1988-05-31', '2016-04-28 18:43:30', '2016-04-28 18:43:30'),
(2, 'Cisco Ramon', 'Reverb', 'cramon@dc.com', '$2y$10$c8qzqM7v0.l5n7BopWIhl.zNCpy10cKY6cvN5jr2cd4HcUMoTsEuK', '1988-08-24', '2016-04-28 19:11:02', '2016-04-28 19:11:02'),
(3, 'Harrison Wells', 'Reverse-Flash', 'hwells@dc.com', '$2y$10$eFwLu41bTu846Q40CmLgZORqv/4G3dVqhctlkqX0FZspKyXa25yye', '1978-12-21', '2016-04-28 19:11:51', '2016-04-28 19:11:51'),
(4, 'Leonard Snart', 'Captain Cold', 'lsnart@dc.com', '$2y$10$QGzLHO0SObZqN.Pj6lKUteGM5WFM3VFWPJC8X0It8s9ydT9NhQ/UG', '1984-01-02', '2016-04-28 19:12:43', '2016-04-28 19:12:43'),
(5, 'Kendra Saunders', 'Hawkgirl', 'ksaunders@dc.com', '$2y$10$XdziCGds2tcnZz0KtXfWBenoVG2tjXeSzX/bg6ytRgXdamf0yv2G.', '1991-10-16', '2016-04-28 19:13:51', '2016-04-28 19:13:51'),
(6, 'Mark Mardon', 'Weather Wizard', 'mmardon@dc.com', '$2y$10$/1EOPN0m5PWKeMZRhabB0ODgf5kqT.FgwLs0MqcuUcd2.D1QBtEUy', '1987-10-23', '2016-04-28 21:48:09', '2016-04-28 21:48:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD KEY `users.id` (`user_id`,`friend_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
