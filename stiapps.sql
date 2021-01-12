-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 03:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stiapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `dospem`
--

CREATE TABLE `dospem` (
  `id_dospem` int(11) NOT NULL,
  `noInduk` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namaDospem` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL,
  `pendaftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dospem`
--

INSERT INTO `dospem` (`id_dospem`, `noInduk`, `password`, `namaDospem`, `kuota`, `pendaftar`) VALUES
(1, 'noorfalih', '$2y$10$obpgtyBGTmPsItIZyeA/nuhK.65AxovUVY39hB1fpUvR1aRr2vPra', 'Noor Falih', 20, 0),
(2, 'titinpramiyati', '$2y$10$k9eshInLF5FswMudscBF8OoZYjQL.yETLvok8AInkir1itqCX7JVW', 'Titin Pramiyati', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `judul`
--

CREATE TABLE `judul` (
  `id_judul` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_dospem` int(11) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `judulprop` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `penerimaan` varchar(1) NOT NULL,
  `pengesahan` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul`
--

INSERT INTO `judul` (`id_judul`, `id_mhs`, `id_dospem`, `penulis`, `judulprop`, `kategori`, `penerimaan`, `pengesahan`) VALUES
(5, 1, 1, 'Jamalul Ikhsan', 'Test', 'Data Scientist', '0', '-'),
(6, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '1', '0'),
(7, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '1', '0'),
(8, 1, 2, 'Jamalul Ikhsan', 'Test', 'Software Engineer', '1', '0'),
(9, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '0', '-'),
(10, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '0', '-'),
(11, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '0', '-'),
(12, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '0', '-'),
(13, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '0', '-'),
(14, 2, 1, 'Aldilla Gardika Pramesta', 'Mengidentifikasi Penyakit Padi', 'AI', '0', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id_kaprodi` int(11) NOT NULL,
  `noInduk` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namaKaprodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaprodi`
--

INSERT INTO `kaprodi` (`id_kaprodi`, `noInduk`, `password`, `namaKaprodi`) VALUES
(1, 12345678, '$2y$10$xItfkhMDu..V6DjjIkDA3.1q099muAWne2h3uOMbei86yIJQqLitK', 'Anita');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `noInduk` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namaMhs` varchar(255) NOT NULL,
  `hasDaftar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `noInduk`, `password`, `namaMhs`, `hasDaftar`) VALUES
(1, '1810511099', '$2y$10$.8MwREIZvItopo.0bb7e3ukZauP8XpRUXAzcnpOqagmY0UTbLyzQi', 'Jamalul Ikhsan', 0),
(2, '1810511108', '$2y$10$QFRM4xYuYCdJXQ7VW0qxM.5I5JkhT55D/pigrmXH6.E7rxyF4Pbgi', 'Aldilla Gardika Pramesta', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dospem`
--
ALTER TABLE `dospem`
  ADD PRIMARY KEY (`id_dospem`),
  ADD UNIQUE KEY `username` (`noInduk`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id_judul`),
  ADD KEY `id_mhs_idx` (`id_mhs`),
  ADD KEY `id_dospem_idx` (`id_dospem`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id_kaprodi`),
  ADD UNIQUE KEY `noInduk` (`noInduk`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `username` (`noInduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dospem`
--
ALTER TABLE `dospem`
  MODIFY `id_dospem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id_kaprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `judul`
--
ALTER TABLE `judul`
  ADD CONSTRAINT `id_dospem_idx` FOREIGN KEY (`id_dospem`) REFERENCES `dospem` (`id_dospem`),
  ADD CONSTRAINT `id_mhs_idx` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
