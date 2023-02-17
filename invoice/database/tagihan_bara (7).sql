-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 02:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tagihan_bara`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` varchar(11) NOT NULL,
  `nama_bank` varchar(31) NOT NULL,
  `kantor` varchar(30) NOT NULL,
  `rek` varchar(30) NOT NULL,
  `nama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `kantor`, `rek`, `nama`) VALUES
('bca', 'PT. Bank Central Asia (BCA) Tbk', 'KCP Setiabudi', 'No. Rek. 233 003 31 96', 'a/n Moch Gani Setiawan'),
('mandiri', 'PT. Bank Mandiri (Persero) Tbk', 'mandiri', 'No. Rek. 132 002 626 2262', 'a/n PT. BARA PRIMA MULTI TEKNOVASI');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `no` int(11) NOT NULL,
  `id_klien` varchar(5) NOT NULL,
  `nama_perusahaan` varchar(35) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`no`, `id_klien`, `nama_perusahaan`, `nama`, `kota`, `telepon`, `email`, `bank`, `status`) VALUES
(31, 'KL1', 'Martin Forklift', 'Raihan Martin Permana', 'bandung', '098991873', 'martin@forklift.com', 'mandiri', 1),
(38, 'KL2', 'PT Matahari Barat', 'Rehan', 'Jakarta', '988676456', 'rakaasew@doclo.com', 'bca', 1),
(39, 'KL3', 'Revo Barat', 'Rheynaldi El Nino', 'Ciwidey', '089766635224', 'rheynaldiberasa98@gm', 'bca', 1),
(40, 'KL4', 'raihan ', 'Rehan', 'Bandung', '087396661636', 'martinposa@gmail.com', 'mandiri', 1),
(41, 'KL5', 'Polo Amstar', 'Ardan', 'Lombok', '098765432112', 'ardan@gmail.com', 'bca', 1),
(42, 'KL6', 'Greek', 'Nyx', 'Olympus', '011234436', 'nyx@mail.com', 'bca', 1),
(43, 'KL7', 'Marlindo Gaming', 'Rehan', 'Cimahi', '089264552512', 'rehanngab@gmail.com', 'mandiri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tagihan`
--

CREATE TABLE `detail_tagihan` (
  `no` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `unit` text NOT NULL,
  `deskripsi` varchar(20) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `total` varchar(20) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_tagihan`
--

INSERT INTO `detail_tagihan` (`no`, `id_tagihan`, `unit`, `deskripsi`, `quantity`, `nama_perusahaan`, `total`, `status`) VALUES
(1, 1, 'Paket', 'desain', '3', 'Martin Forklift', '6000', 1),
(12, 8, 'Bulan', 'qwerty', '3', 'PT Matahari Barat', '180000', 1),
(13, 9, 'Unit', 'sa', '3', 'PT Matahari Barat', '90000', 1),
(14, 9, 'Paket', 'desain', '2', 'PT Matahari Barat', '100000', 1),
(15, 10, 'Paket', 'fjekja', '3', 'Revo Barat', '21000000', 1),
(16, 10, 'Bulan', 'K3H2', '4', 'Revo Barat', '320000', 1),
(17, 11, 'Unit', 'KHAHJHA', '8', 'Revo Barat', '7200000', 1),
(18, 12, 'Paket', 'hdiad', '2', 'raihan', '1200000', 1),
(19, 12, 'Bulan', 'oijdahk', '2', 'raihan', '140000', 1),
(20, 13, 'Unit', 'baik', '5', 'raihan', '4500000', 1),
(21, 14, 'Bulan', 'Injeksi', '2', 'Polo Amstar', '600000', 1),
(22, 14, 'Paket', 'Ef.Ay', '1', 'Polo Amstar', '500000', 1),
(23, 15, 'Paket', 'Earth', '4', 'Greek', '2800000', 1),
(24, 15, 'Bulan', 'Realm', '7', 'Greek', '5600000', 1),
(25, 16, 'Bulan', 'Moon', '5', 'Greek', '2500000', 1),
(26, 17, 'Paket', 'abc', '2', 'Marlindo Gaming', '1800000', 1),
(27, 18, 'Unit', 'sa', '3', 'Marlindo Gaming', '2400000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `remainder`
--

CREATE TABLE `remainder` (
  `no` int(11) NOT NULL,
  `id_remainder` varchar(30) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `id_klien` varchar(5) NOT NULL,
  `due_date` varchar(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remainder`
--

INSERT INTO `remainder` (`no`, `id_remainder`, `no_invoice`, `id_klien`, `due_date`, `status`) VALUES
(1, 'RINV1', '001/BE-INV/14-XI/2022', 'KL1', '2022-11-27', 1),
(9, 'RINV2', '002/BE-INV/16-XI/2022', 'KL2', '2022-12-05', 1),
(10, 'RINV3', '003/BE-INV/16-XI/2022', 'KL2', '2022-12-07', 1),
(11, 'RINV4', '004/BE-INV/22-XI/2022', 'KL3', '2022-12-10', 1),
(12, 'RINV5', '005/BE-INV/23-XI/2022', 'KL3', '2022-12-09', 1),
(13, 'RINV6', '006/BE-INV/23-XI/2022', 'KL4', '2022-12-06', 1),
(14, 'RINV7', '007/BE-INV/23-XI/2022', 'KL4', '2022-12-08', 1),
(15, 'RINV8', '008/BE-INV/27-XI/2022', 'KL5', '2022-12-02', 1),
(16, 'RINV9', '009/BE-INV/28-XI/2022', 'KL6', '2022-12-08', 1),
(17, 'RINV10', '0010/BE-INV/28-XI/2022', 'KL6', '2022-12-04', 1),
(18, 'RINV11', '0011/BE-INV/01-XII/2022', 'KL7', '2022-12-21', 1),
(19, 'RINV12', '0012/BE-INV/01-XII/2022', 'KL7', '2022-12-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `no_invoice`, `nama_perusahaan`, `tanggal_invoice`, `status`) VALUES
(1, '001/BE-INV/14-XI/2022', 'Martin Forklift', '2022-11-14', 1),
(8, '002/BE-INV/16-XI/2022', 'PT Matahari Barat', '2022-11-16', 1),
(9, '003/BE-INV/16-XI/2022', 'PT Matahari Barat', '2022-11-16', 1),
(10, '004/BE-INV/22-XI/2022', 'Revo Barat', '2022-11-22', 1),
(11, '005/BE-INV/23-XI/2022', 'Revo Barat', '2022-11-23', 1),
(12, '006/BE-INV/23-XI/2022', 'raihan', '2022-11-23', 1),
(13, '007/BE-INV/23-XI/2022', 'raihan', '2022-11-23', 1),
(14, '008/BE-INV/27-XI/2022', 'Polo Amstar', '2022-11-27', 1),
(15, '009/BE-INV/28-XI/2022', 'Greek', '2022-11-28', 1),
(16, '0010/BE-INV/28-XI/2022', 'Greek', '2022-11-28', 1),
(17, '0011/BE-INV/01-XII/2022', 'Marlindo Gaming', '2022-12-01', 1),
(18, '0012/BE-INV/01-XII/2022', 'Marlindo Gaming', '2022-12-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` varchar(30) NOT NULL,
  `nama_unit` varchar(30) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`, `harga`) VALUES
('unit1', 'paket', '2000000'),
('unit2', 'bulan', '1500000'),
('unit3', 'unit', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `jabatan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `telepon`, `jabatan`) VALUES
(1, 'Raka Asew', 'rakamarlindo0714@gmail.com', '$2y$10$474wlruGOUwsG6vciQz0fOdVgavqVga1EvdGIyFb7Qw.voyjz7jwi', '089327423742', 'Admin'),
(2, 'Raihan Martinda', 'rehanngab@gmail.com', '$2y$10$ftq.P7Npjfa4SYNF9JepLOFPyRoub6IIkewaRv94AVTKJKKTOsNcK', '0893234324', 'Manager'),
(3, 'Gumelar', 'gumelar@gmail.com', '$2y$10$da59mHlMzh7YH7s0BjnuRuoyuHbObsfgcUWIlRwFp8OZCuaH.X.US', '0877656445', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `remainder`
--
ALTER TABLE `remainder`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `detail_tagihan`
--
ALTER TABLE `detail_tagihan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `remainder`
--
ALTER TABLE `remainder`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
