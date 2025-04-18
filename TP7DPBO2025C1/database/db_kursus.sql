-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2025 at 05:15 PM
-- Server version: 11.7.2-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `nama_kursus` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `nama_kursus`, `deskripsi`, `harga`, `kuota`) VALUES
(1, 'Advanced Rizz Techniques', 'Masterclass in social interaction and absolute sigma energy', '500000.00', 20),
(2, 'Meme Economy Fundamentals', 'Learn how to convert internet humor into financial success', '450000.00', 25),
(3, 'Copium and Hopium Trading', 'Strategies for surviving existential crisis through meme culture', '400000.00', 15),
(4, 'Sigma Male Programming', 'Coding bootcamp for true grindset warriors', '600000.00', 18),
(5, 'Post-Ironic Communication', 'Decoding the language of modern internet discourse', '550000.00', 22);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `peserta_id` int(11) DEFAULT NULL,
  `kursus_id` int(11) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('Menunggu','Dikonfirmasi','Ditolak') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `peserta_id`, `kursus_id`, `tanggal_daftar`, `status`) VALUES
(1, 1, 1, '2025-04-18 15:41:12', 'Dikonfirmasi'),
(2, 2, 2, '2025-04-18 15:41:12', 'Menunggu'),
(3, 3, 3, '2025-04-18 15:41:12', 'Dikonfirmasi'),
(4, 4, 4, '2025-04-18 15:41:12', 'Menunggu'),
(5, 5, 5, '2025-04-18 15:41:12', 'Dikonfirmasi'),
(6, 1, 3, '2025-04-18 15:41:12', 'Menunggu'),
(7, 2, 5, '2025-04-18 15:41:12', 'Dikonfirmasi'),
(8, 3, 4, '2025-04-18 15:41:12', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `email`, `no_telepon`, `asal_sekolah`, `tanggal_lahir`) VALUES
(1, 'Sigma Grindset Jones', 'gigachad@rizz.sigma', '08123456789', 'SMA Meme Academy', '2005-04-20'),
(2, 'No Bitches Brian', 'no.bitches@brainrot.com', '08987654321', 'SMA Grass Toucher', '2004-09-15'),
(3, 'Rizz Lord Supreme', 'absolute.rizz@memeland.com', '08567890123', 'SMA Femboy High', '2005-01-30'),
(4, 'Bread Pill Believer', 'bread.pill@copium.net', '08234567890', 'SMA Basement Dweller', '2004-11-25'),
(5, 'Ironic Memer', 'irony@postironic.meme', '08345678901', 'SMA Based Institute', '2005-07-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_id` (`peserta_id`),
  ADD KEY `kursus_id` (`kursus_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`kursus_id`) REFERENCES `kursus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
