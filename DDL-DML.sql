-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2018 at 10:36 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
                       `id` int(11) NOT NULL,
                       `nama` varchar(150) NOT NULL,
                       `spesifikasi` varchar(150) NOT NULL,
                       `harga` int(30) NOT NULL,
                       `kuantitas` int(10) NOT NULL,
                       `supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `spesifikasi`, `harga`, `kuantitas`, `supplier`) VALUES
(1, 'Cotton', 'Ini jenis bahan yang jadi andalan buat distro-distro', 30000, 200, 5),
(2, 'Polyester', 'Jenis bahan ini terbuat dari serat sintetis atau buatan dari hasil minyak bumi untuk dibuat bahan berupa serat fiber poly dan yang untuk produk plasti', 45000, 150, 5),
(3, 'Denim', 'Mempunyai material kain yang sangat kuat terbuat dari katun twill', 60000, 175, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
                         `id` int(11) NOT NULL,
                         `nama` varchar(130) NOT NULL,
                         `tipe` varchar(30) NOT NULL,
                         `bahan` int(11) NOT NULL,
                         `spesifikasi` varchar(150) NOT NULL,
                         `ukuran` varchar(10) NOT NULL,
                         `gambar` varchar(130) NOT NULL,
                         `kuantitas` int(11) NOT NULL,
                         `harga` int(11) NOT NULL,
                         `author` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
                         `id` int(11) NOT NULL,
                         `nama` varchar(150) NOT NULL,
                         `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                         `gambar` varchar(150) NOT NULL,
                         `tipe` varchar(30) NOT NULL,
                         `ukuran` varchar(10) NOT NULL,
                         `status` varchar(30) NOT NULL,
                         `pelanggan` int(10) DEFAULT NULL,
                         `bahan` int(10) DEFAULT NULL,
                         `penjahit` int(11) DEFAULT NULL,
                         `jumlah` int(10) NOT NULL,
                         `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE `resi` (
                      `id` int(11) NOT NULL,
                      `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      `pelanggan` int(11) NOT NULL,
                      `kasir` int(11) DEFAULT NULL,
                      `penjahit` int(11) DEFAULT NULL,
                      `pesanan` int(11) DEFAULT NULL,
                      `pakaian` int(11) DEFAULT NULL,
                      `total` int(10) NOT NULL,
                      `harga` int(30) NOT NULL,
                      `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
                         `id` varchar(40) NOT NULL,
                         `ip_address` varchar(45) NOT NULL,
                         `timestamp` int(100) NOT NULL,
                         `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                      `id` int(10) NOT NULL,
                      `username` varchar(30) NOT NULL,
                      `email` varchar(120) NOT NULL,
                      `nama` varchar(120) NOT NULL,
                      `password` varchar(30) NOT NULL,
                      `privilege` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `nama`, `password`, `privilege`) VALUES
(4, 'kasir', 'kasir@gmail.com', 'Pak Kasir', '1234', 'Kasir'),
(5, 'supplier', 'supplier@gmail.com', 'Pak supplier', '1234', 'Supplier'),
(6, 'penjahit', 'penjahit@gmail.com', 'Pak Penjahit', '1234', 'Penjahit'),
(11, 'pelanggan', 'pelanggan@gmail.com', 'Mbak pelanggan', '1234', 'Pelanggan'),
(12, 'admin', 'admin@gmail.com', 'Bang admin', '1234', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `pelanggan_id` (`pelanggan`),
  ADD KEY `penjahit_id` (`penjahit`),
  ADD KEY `bahan_id` (`bahan`);

--
-- Indexes for table `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan`),
  ADD KEY `penjahit_id` (`penjahit`),
  ADD KEY `resi_ibfk_3` (`pesanan`),
  ADD KEY `kasir_id` (`kasir`),
  ADD KEY `pakaian_id` (`pakaian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resi`
--
ALTER TABLE `resi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan`
--
ALTER TABLE `bahan`
  ADD CONSTRAINT `bahan_ibfk_1` FOREIGN KEY (`supplier`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`penjahit`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`bahan`) REFERENCES `bahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resi`
--
ALTER TABLE `resi`
  ADD CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resi_ibfk_2` FOREIGN KEY (`penjahit`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `resi_ibfk_3` FOREIGN KEY (`pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `resi_ibfk_4` FOREIGN KEY (`kasir`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `resi_ibfk_5` FOREIGN KEY (`pakaian`) REFERENCES `pakaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
