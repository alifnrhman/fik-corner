-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 02:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fik_corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status_organisasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama_lengkap`, `prodi`, `email`, `status_organisasi`) VALUES
(1, '2310512173', 'Alif Nurahman', 'S1 Sistem Informasi', '2310512173@mahasiswa.upnvj.ac.id', NULL),
(2, '2310512168', 'M. Cahaya Epril', 'S1 Sistem Informasi', '2310512168@mahasiswa.upnvj.ac.id', NULL),
(3, '2310512152', 'Tsaqif Rakha Harli', 'S1 Sistem Informasi', '2310512152@mahasiswa.upnvj.ac.id', 'BEM-F');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `password`, `nama_lengkap`) VALUES
(1, '2310512173', '123', 'Alif Nurahman'),
(2, '2310512168', '12345', 'M. Cahaya Epril'),
(3, '2310512152', '123', 'Tsaqif Rakha Harli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nama_lengkap` (`nama_lengkap`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nim` (`nim`),
  ADD KEY `fk_nama_lengkap` (`nama_lengkap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_nama_lengkap` FOREIGN KEY (`nama_lengkap`) REFERENCES `mahasiswa` (`nama_lengkap`),
  ADD CONSTRAINT `fk_nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
