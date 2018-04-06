-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2018 at 10:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5079407_linkrakyatku`
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
  `level` varchar(10) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY_FBGROUP`
--

CREATE TABLE `CATEGORY_FBGROUP` (
  `id` bigint(255) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DETAIL_LINK`
--

CREATE TABLE `DETAIL_LINK` (
  `id` bigint(20) NOT NULL,
  `link_id` bigint(255) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `referer` varchar(200) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `countries` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `FB_GROUP`
--

CREATE TABLE `FB_GROUP` (
  `id` bigint(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `id_group` varchar(500) DEFAULT NULL,
  `category` bigint(255) NOT NULL,
  `user` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LINK`
--

CREATE TABLE `LINK` (
  `id` bigint(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `user_id` bigint(255) NOT NULL,
  `count` bigint(255) NOT NULL,
  `shortcut` varchar(50) NOT NULL,
  `original_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `REPORT_SOSMED`
--

CREATE TABLE `REPORT_SOSMED` (
  `id` bigint(255) NOT NULL,
  `facebook` int(100) DEFAULT NULL,
  `twitter` int(100) DEFAULT NULL,
  `instagram_story` int(100) DEFAULT NULL,
  `instagram_post` int(100) DEFAULT NULL,
  `line_broadcast` int(100) DEFAULT NULL,
  `line_post` int(100) DEFAULT NULL,
  `youtube` int(100) DEFAULT NULL,
  `link_attach` varchar(500) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SETTING`
--

CREATE TABLE `SETTING` (
  `id` int(100) NOT NULL,
  `the_key` varchar(200) DEFAULT NULL,
  `value` varchar(1000) DEFAULT NULL
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
  `last_login` datetime DEFAULT NULL,
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
-- Indexes for table `CATEGORY_FBGROUP`
--
ALTER TABLE `CATEGORY_FBGROUP`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DETAIL_LINK`
--
ALTER TABLE `DETAIL_LINK`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FB_GROUP`
--
ALTER TABLE `FB_GROUP`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LINK`
--
ALTER TABLE `LINK`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `REPORT_SOSMED`
--
ALTER TABLE `REPORT_SOSMED`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SETTING`
--
ALTER TABLE `SETTING`
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
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `CATEGORY_FBGROUP`
--
ALTER TABLE `CATEGORY_FBGROUP`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `DETAIL_LINK`
--
ALTER TABLE `DETAIL_LINK`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1547596;
--
-- AUTO_INCREMENT for table `FB_GROUP`
--
ALTER TABLE `FB_GROUP`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `LINK`
--
ALTER TABLE `LINK`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20106;
--
-- AUTO_INCREMENT for table `REPORT_SOSMED`
--
ALTER TABLE `REPORT_SOSMED`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `SETTING`
--
ALTER TABLE `SETTING`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

INSERT INTO `ADMIN_USER` (`id`, `username`, `password`, `email`, `level`, `last_login`) VALUES
(1, 'suryaloe', 'dBuiLxMTWGbtdylBe1M/r9YioUCG1wCwBPQkJ5chVYI/kvAxCYd8YrGkVkmJ7LatcYZzwHOftrvKzD/cED2mYw==', 'me@suryaloe.id', 'admin', '2018-04-06 11:53:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
