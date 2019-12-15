-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 01:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schetes`
--

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `nama_partner` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `nama_partner`, `created_at`, `updated_at`) VALUES
(1, 'Telin', '2019-12-15 04:12:17', '0000-00-00 00:00:00'),
(3, 'Telkom Telstra', '2019-12-15 00:57:54', '2019-12-15 00:57:54'),
(4, 'Telstra', '2019-12-15 00:58:03', '2019-12-15 00:58:03'),
(5, 'AT&T', '2019-12-15 00:58:12', '2019-12-15 00:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_schetes`
--

CREATE TABLE `pengajuan_schetes` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `date` date NOT NULL,
  `waktu` time NOT NULL,
  `pic` varchar(50) NOT NULL,
  `partner` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `teknisi` text,
  `status` varchar(50) DEFAULT NULL,
  `gambar` text,
  `tipe_test` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_schetes`
--

INSERT INTO `pengajuan_schetes` (`id`, `nama_customer`, `alamat`, `date`, `waktu`, `pic`, `partner`, `no_hp`, `teknisi`, `status`, `gambar`, `tipe_test`, `created_at`, `updated_at`) VALUES
(13, 'AirportHub Bali', 'SIta Room Ngurahrai Bali', '2019-12-15', '12:12:00', 'Asep', 'Telkom Telstra', '082173102809', 'Fitroh', 'Approved', '19734-2019-12-15-11-58-37.png', 'pIng test', '2019-12-15 12:10:50', '2019-12-15 05:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gambar`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$o0ABlt.eDOKORRTtmaL8reNiXthwQl4KYbdBKzKbv79cFeXLRO2ru', '46927-2019-10-30-15-38-08.png', 'Admin', 't56NT57Vq300ccyWBrazZtqrp9pdpVKq0I4vakEuEwpmjRteWhs9xdMeW23C', '2019-04-25 01:02:24', '2019-12-15 04:45:05'),
(47, 'vendor', 'vendor12', 'vendor@gmail.com', '$2y$10$q4PTZLBaVLpeolz87DyCIunktyqdkpvQzjzAZoUmowi9SIDnaigLO', '62297-2019-12-15-09-38-05.png', 'Vendor', NULL, '2019-12-15 02:38:05', '2019-12-15 02:38:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_schetes`
--
ALTER TABLE `pengajuan_schetes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajuan_schetes`
--
ALTER TABLE `pengajuan_schetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
