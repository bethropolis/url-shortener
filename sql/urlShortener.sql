-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 08:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE `urlShortener`; 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urlShortener`
--
USE `urlShortener`; 
-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `user` varchar(21) NOT NULL,
  `url` text NOT NULL,
  `slug` varchar(18) NOT NULL,
  `visits` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `user`, `url`, `slug`, `visits`) VALUES
(2, 'blup', 'https://bluppy.com', 'blup', 0),
(4, 'test', 'https://google.com/', 'google', 1),
(6, 'test', 'https://twitter.com/home', 'twitter', 0),
(7, 'test', 'https://facebook.com', 'fb', 2),
(8, 'test', 'https://gitlab.com', 'gitlab', 1),
(9, 'test', 'https://instagram.com', 'gram', 2),
(10, 'test', 'https://amazon.com', 'a', 1),
(12, 'test', 'https://tumblr.com', 'tumblr', 1),
(13, 'test', 'https://adidas.com', 'ad', 0),
(17, 'bethuel', 'https://github.com', 'github', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
