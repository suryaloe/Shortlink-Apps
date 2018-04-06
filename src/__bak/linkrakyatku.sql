-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2017 at 01:23 PM
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
  `level` varchar(10) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ADMIN_USER`
--

INSERT INTO `ADMIN_USER` (`id`, `username`, `password`, `email`, `level`, `last_login`) VALUES
(1, 'suryaloe', 'm4+InUrhXhOHYF2HGTbUzmfAqWFCSZ7q7x5nYj64KYs6EUAbwFU8RgQOzDGZV30nN7wtJZCyYI+zhYZ0CctJHQ==', 'me@suryaloe.id', 'admin', '2017-11-04 11:44:16');

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

--
-- Dumping data for table `DETAIL_LINK`
--

INSERT INTO `DETAIL_LINK` (`id`, `link_id`, `ip_address`, `referer`, `browser`, `platform`, `countries`) VALUES
(1, 15, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(2, 13, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(3, 17, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(4, 14, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(5, 17, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(6, 16, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(7, 18, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(8, 19, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(9, 18, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(10, 20, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(11, 21, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(12, 23, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(13, 23, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL),
(14, 23, '127.0.0.1', 'Direct', 'Chrome', 'Linux', NULL);

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

--
-- Dumping data for table `LINK`
--

INSERT INTO `LINK` (`id`, `created_date`, `user_id`, `count`, `shortcut`, `original_url`) VALUES
(13, '2017-11-03 17:07:28', 1, 1, 'ItphRNCd', 'http://tekno.rakyatku.com/read/72433/2017/11/03/whatsapp-down-di-seluruh-dunia'),
(14, '2017-11-03 17:07:42', 1, 3, 'IEmk2hon', 'http://news.rakyatku.com/read/72431/2017/11/03/operasi-pekat-lipu-polrestabes-makassar-1-anak-ditetapkan-tersangka'),
(15, '2017-11-03 17:08:24', 1, 1, 'D6c2ccj1', 'http://pilkada.rakyatku.com/read/72430/2017/11/03/syl-hanya-koruptor-yang-pilih-koruptor'),
(16, '2017-11-03 17:08:32', 1, 1, 'nq6sWIuj', 'http://news.rakyatku.com/read/72429/2017/11/03/dinkes-makassar-akan-sunat-410-anak-gratis-'),
(17, '2017-11-03 18:28:27', 0, 2, 'BQoAQAv1', 'http://inspirasi.rakyatku.com/read/72368/2017/11/03/mengungkap-fakta-unik-7-wali-kota-makassar-dari-masa-ke-masa'),
(18, '2017-11-04 09:58:31', 2, 2, 'kRyk6LPe', 'http://pilkada.rakyatku.com/read/72495/2017/11/04/setelah-puji-ichsan-cakka-kini-kahfi-jempoli-nurdin-sudirman'),
(19, '2017-11-04 09:59:12', 2, 1, 'P3DpOpOn', 'http://news.rakyatku.com/read/72480/2017/11/04/gedung-workshop-blk-bulukumba-butuh-renovasi'),
(20, '2017-11-04 11:26:35', 2, 1, '63cQZ91y', 'http://pilkada.rakyatku.com/read/72495/2017/11/04/setelah-puji-ichsan-cakka-kini-kahfi-jempoli-nurdin-sudirman'),
(21, '2017-11-04 11:33:59', 2, 1, 'Bvqle7kP', 'http://bola.rakyatku.com/read/72487/2017/11/04/5-sebab-persib-kalah-dari-persija-'),
(22, '2017-11-04 11:41:05', 0, 0, 'NoFBa1eh', 'http://bola.rakyatku.com/read/72515/2017/11/04/jadwal-el-clasico-la-liga-spanyol'),
(23, '2017-11-04 11:42:31', 0, 3, 'w0z9I55J', 'http://tekno.rakyatku.com/read/72514/2017/11/04/sempat-down-begini-tanggapan-whatsapp');

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
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `nama`, `email`, `username`, `password`, `reset_token`, `last_login`, `session_login`) VALUES
(1, 'Surya Loe', 'me.suryaloe@gmail.com', 'surya_loe', 'm4+InUrhXhOHYF2HGTbUzmfAqWFCSZ7q7x5nYj64KYs6EUAbwFU8RgQOzDGZV30nN7wtJZCyYI+zhYZ0CctJHQ==', '', '2017-11-04 11:34:30', ''),
(2, 'Akbar Gazali', 'test@gmail.com', 'babang', 'm4+InUrhXhOHYF2HGTbUzmfAqWFCSZ7q7x5nYj64KYs6EUAbwFU8RgQOzDGZV30nN7wtJZCyYI+zhYZ0CctJHQ==', '', '2017-11-04 11:26:11', ''),
(3, 'Sono Marso', 'test@gmail.com', 'nunu', 'm4+InUrhXhOHYF2HGTbUzmfAqWFCSZ7q7x5nYj64KYs6EUAbwFU8RgQOzDGZV30nN7wtJZCyYI+zhYZ0CctJHQ==', '', '2017-11-04 10:02:46', ''),
(4, 'Asrul Ilyas', 'test@gmail.com', 'asrul', 'm4+InUrhXhOHYF2HGTbUzmfAqWFCSZ7q7x5nYj64KYs6EUAbwFU8RgQOzDGZV30nN7wtJZCyYI+zhYZ0CctJHQ==', '', NULL, '');

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
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `DETAIL_LINK`
--
ALTER TABLE `DETAIL_LINK`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `LINK`
--
ALTER TABLE `LINK`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
