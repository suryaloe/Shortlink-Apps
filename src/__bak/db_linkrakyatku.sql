-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2017 at 01:19 PM
-- Server version: 10.1.26-MariaDB-1
-- PHP Version: 7.0.22-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkrakyatku`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN_USER`
--

CREATE TABLE `ADMIN_USER` (
  `id` bigint(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DETAIL_LINK`
--

CREATE TABLE `DETAIL_LINK` (
  `id` bigint(20) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `referer` varchar(200) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `countries` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LINK`
--

CREATE TABLE `LINK` (
  `id` bigint(255) NOT NULL,
  `user_id` bigint(255) NOT NULL,
  `count` bigint(255) NOT NULL,
  `detail_link_id` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `id` bigint(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `reset_token` varchar(1000) NOT NULL,
  `last_login` datetime NOT NULL,
  `session_login` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN_USER`
--
ALTER TABLE `ADMIN_USER`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DETAIL_LINK`
--
ALTER TABLE `DETAIL_LINK`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LINK`
--
ALTER TABLE `LINK`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADMIN_USER`
--
ALTER TABLE `ADMIN_USER`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DETAIL_LINK`
--
ALTER TABLE `DETAIL_LINK`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LINK`
--
ALTER TABLE `LINK`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
