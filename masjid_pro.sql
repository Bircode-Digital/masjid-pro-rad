-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 07:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masjid_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel_masjid`
--

CREATE TABLE `artikel_masjid` (
  `id` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `isi_konten` text NOT NULL,
  `gambar_thumbnail` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `tanggal_posting` datetime NOT NULL,
  `jumlah_view` int(11) NOT NULL,
  `jumlah_like` int(11) NOT NULL,
  `masjid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banner_donasi`
--

CREATE TABLE `banner_donasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `link_tombol` varchar(100) NOT NULL,
  `label_tombol` varchar(20) NOT NULL,
  `masjid_id` int(11) NOT NULL,
  `foto_banner` varchar(50) NOT NULL,
  `jumlah_donasi` decimal(10,2) NOT NULL,
  `target_donasi` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_banner`
--

CREATE TABLE `data_banner` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `link_tombol` varchar(100) NOT NULL,
  `label_tombol` varchar(20) NOT NULL,
  `masjid_id` int(11) NOT NULL,
  `foto_banner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_masjid`
--

CREATE TABLE `data_masjid` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `deskripsi_profile` text NOT NULL,
  `domain_link` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_masjid`
--

INSERT INTO `data_masjid` (`id`, `nama`, `alamat`, `lokasi`, `deskripsi_profile`, `domain_link`, `status`) VALUES
(2, '', '', '', '', '', ''),
(3, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_menus`
--

CREATE TABLE `data_menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `link_redirect` varchar(100) NOT NULL,
  `masjid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_masjid`
--

CREATE TABLE `info_masjid` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `nama_penceramah` varchar(30) NOT NULL,
  `alamat_penceramah` varchar(30) NOT NULL,
  `jam_mulai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `muadzin` varchar(30) NOT NULL,
  `imam` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_jumat` date NOT NULL,
  `masjid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `masjid_id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2024-11-06 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `masjid_id`, `foto`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `role`) VALUES
(1, 'fifi', 'fiilut5@gmail.com', '$2y$10$aMRsVN1MdWytKPdzEcNtKeNT1D0u1sAqsbHG74svhEJtfndYr.A4O', 3, '', '355cddc3d273224549eeb5f33690beeb', NULL, '2024-11-06 00:00:00', NULL, 'admin'),
(3, 'tes', 'tes@gmail.com', '$2y$10$trxtePkgMuI24Qu.A2MQNe73rF5HAQMxfmBrnxhPby0CW2Pd3jvdm', 3, '', '326b75831dc30793e5cfb102e9de64e2', NULL, '2024-11-06 00:00:00', NULL, 'admin-masjid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel_masjid`
--
ALTER TABLE `artikel_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_donasi`
--
ALTER TABLE `banner_donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_banner`
--
ALTER TABLE `data_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_masjid`
--
ALTER TABLE `data_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_menus`
--
ALTER TABLE `data_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_masjid`
--
ALTER TABLE `info_masjid`
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
-- AUTO_INCREMENT for table `artikel_masjid`
--
ALTER TABLE `artikel_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner_donasi`
--
ALTER TABLE `banner_donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_banner`
--
ALTER TABLE `data_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_masjid`
--
ALTER TABLE `data_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_menus`
--
ALTER TABLE `data_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_masjid`
--
ALTER TABLE `info_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
