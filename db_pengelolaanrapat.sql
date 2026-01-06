-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2026 at 04:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengelolaanrapat`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `nik_nim` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `role` enum('admin','peserta') DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `username`, `nik_nim`, `email`, `no_hp`, `jabatan`, `role`, `password`) VALUES
(1, 'dio', '3312501097', 'dio@gmail.com', '086002345980', 'Mahasiswa', 'admin', 'karina'),
(12, 'opsi', '3312501096', 'opsi@gmail.com', '080987654321', 'Staf TU', 'peserta', 'joymen'),
(13, 'laura', '33125010097', 'dby@gmail.com', '081357008642', 'Mahasiswa', 'peserta', 'batagor'),
(33, 'fany', '3312501106', 'dio@gmail.com', '082812873169', 'Mahasiswa', 'peserta', 'pakaian'),
(36, 'jeje', '3312501089', 'jjmayo@gmail.com', '081250506699', 'Dosen', 'peserta', 'risolmayyo'),
(37, 'coba', '33125454567', 'coba@gmail.com', '081240409798', 'Staf TU', 'peserta', 'cobacoba'),
(41, 'fajar', '3312401096', 'fajar@gmail.com', '089537', 'Dosen', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `rapats`
--

CREATE TABLE `rapats` (
  `id_rapat` int NOT NULL,
  `judul_rapat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `pimpinan` varchar(100) DEFAULT NULL,
  `peserta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rapats`
--

INSERT INTO `rapats` (`id_rapat`, `judul_rapat`, `tanggal`, `waktu`, `tempat`, `pimpinan`, `peserta`) VALUES
(30, 'Mobile Legend Malaysia', '2025-12-05', '05:10:00', 'Kuala Lumpur', 'Tok Dalang', 'Dio Kurniawan, Opsi Adi Ramadhan, Hayatul Husna, Muflih Anwar, Andini'),
(38, 'M7 World MLBB Indonesia', '2026-01-10', '15:00:00', 'Jakarta', 'Pak AP', 'Dio Kurniawan, Opsi Adi Ramadhan, Hayatul Husna, Muflih Anwar, Diar Dina'),
(39, 'Gacoan', '2025-12-31', '15:35:00', 'Batu Aji', 'Orang Baik', 'dio, laura, jeje'),
(41, 'PKM 2030', '2025-12-31', '16:37:00', 'Gedung Tecno', 'ketua bem', 'opsi, fany, coba');

-- --------------------------------------------------------

--
-- Table structure for table `rapat_peserta`
--

CREATE TABLE `rapat_peserta` (
  `id` int NOT NULL,
  `rapat_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `rapats`
--
ALTER TABLE `rapats`
  ADD PRIMARY KEY (`id_rapat`);

--
-- Indexes for table `rapat_peserta`
--
ALTER TABLE `rapat_peserta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `rapats`
--
ALTER TABLE `rapats`
  MODIFY `id_rapat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `rapat_peserta`
--
ALTER TABLE `rapat_peserta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
