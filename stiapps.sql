-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 12:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, '12345678', '12345678', 'Noor Falih', 19, 0),
(2, '1234567', '1234567', 'Titin Pramiyati', 20, 0),
(4, '123456', '123456', 'Mayanda Mega Santoni', 25, 0);

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
  `hasDaftar` tinyint(1) NOT NULL,
  `isTolak` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `noInduk`, `password`, `namaMhs`, `hasDaftar`, `isTolak`) VALUES
(7, '1810511099', '1810511099', 'Jamalul Ikhsan', 0, '0'),
(8, '1810511108', '1810511108', 'Aldilla Gardika Pramesta', 0, '0'),
(9, '1810511055', '1810511055', 'Lois Mikael Camdesus', 0, '0'),
(10, '1810511057', '1810511057', 'Fajar Akbardipura', 0, '0'),
(11, '1810511056', '1810511056', 'Hashfi Ashfahan', 0, '0');

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
  MODIFY `id_dospem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id_kaprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
