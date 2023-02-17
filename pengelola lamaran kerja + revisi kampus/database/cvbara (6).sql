-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 02:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvbara`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` varchar(5) NOT NULL,
  `Nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `Nama`) VALUES
('DIV01', 'Web Developer'),
('DIV02', 'Mobile Apps Developer'),
('DIV03', 'Desktop Apps Developer');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_pelamar` varchar(10) CHARACTER SET latin1 NOT NULL,
  `ijazah` text NOT NULL,
  `cv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_pelamar`, `ijazah`, `cv`) VALUES
(1, '1296382204', 'Get_Started_With_Smallpdf.pdf', 'CV_Raihan Martin Permana.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` varchar(5) NOT NULL,
  `id_divisi` varchar(30) NOT NULL,
  `kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_divisi`, `kriteria`) VALUES
('LOW01', 'DIV01', 'Memahami konsep OOP, PHP (Laravel), JavaScript (ReactJS), pengalaman menggunakan database (RDBMS) minimal MYSQL                            '),
('LOW02', 'DIV02', 'Membuat dan mengembangkan aplikasi mobile; Mendesain dan mengimplementasikan UI/UX, Mengintegrasikan Application Programming Interfaces (APIs), Bahasa Pemrogramman Java/Swift                            '),
('LOW03', 'DIV03', 'Menguasai Bahasa Pemrograman: PowerBuilder atau bahasa pemrograman desktop lain seperti VB.Net, Java, C                            ');

-- --------------------------------------------------------

--
-- Table structure for table `magang`
--

CREATE TABLE `magang` (
  `id_magang` int(11) NOT NULL,
  `id_pelamar` varchar(10) NOT NULL,
  `durasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magang`
--

INSERT INTO `magang` (`id_magang`, `id_pelamar`, `durasi`) VALUES
(5, '2128645562', '2022-11-09 - 2022-11-13'),
(9, '519070154', '2022-11-21 - 2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_divisi` varchar(5) NOT NULL,
  `gaji` varchar(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `upload` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nama`, `email`, `deskripsi`, `id_divisi`, `gaji`, `jenis`, `status`, `upload`) VALUES
('1296382204', 'Raihan Martin Permana', 'raihanmartin88@gmail.com', '3217062206000024', 'DIV01', '', 'Karyawan', 'Sedang Interview', '27-12-2022'),
('2128645562', 'sani sana', 'sani@gmail.com', 'abcd', 'DIV01', '', 'Magang', 'Diterima', ''),
('2145025434', 'Raihan Martin Perman', 'raihanmartin88@gmail.com', '3217062206000024', 'DIV01', '', 'Karyawan', 'Ditolak', ''),
('243781448', 'Gumelar Gilang Ramadhan', 'gumelargilang@gmail.com', '3217062206000025', 'DIV01', '', 'Karyawan', 'Diterima', ''),
('502844138', 'Raihan Martin ', 'raihanmartin88@gmail.com', 'abcd', 'DIV01', '', 'Karyawan', 'Interview', ''),
('519070154', 'Martin', 'martin@gmail.com', '3217062206000025', 'DIV02', '', 'Magang', 'Diterima', ''),
('7117622', 'ehun', 'ehun@gmail.com', 'abcd', 'DIV02', '', 'Karyawan', 'Ditolak', ''),
('779120913', 'deni solihin', 'deni@gmailc.om', 'abcd', 'DIV03', '', 'Karyawan', 'Diterima', ''),
('873623999', 'Raka Marlindo ', 'Raka@gmail.com', 'abcd', 'DIV01', '', 'Karyawan', 'Ditolak', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_users`, `subjek`, `isi`, `jenis`) VALUES
(1, 1, 'Syarat Tidak Memenuhi', 'Terima kasih atas ketertarikan Anda untuk melamar di perusahaan kami. Kami telah membaca lamaran Anda, namun tidak dapat meneruskannya ke seleksi tahap selanjutnya di karenakan syarat anda tidak memenuhi. ', 'Tolak'),
(2, 1, 'Kriteria Tidak Memenuhi', 'Terima kasih atas ketertarikan Anda untuk melamar di perusahaan kami. Kami telah membaca lamaran Anda, namun tidak dapat meneruskannya ke seleksi tahap selanjutnya di karenakan kriteria anda tidak memenuhi. ', 'Tolak');

-- --------------------------------------------------------

--
-- Table structure for table `porto`
--

CREATE TABLE `porto` (
  `no` int(11) NOT NULL,
  `id_pelamar` varchar(10) NOT NULL,
  `porto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porto`
--

INSERT INTO `porto` (`no`, `id_pelamar`, `porto`) VALUES
(1, '502844138', 'abcd'),
(9, '873623999', 'abcd'),
(10, '779120913', 'abcd'),
(15, '2128645562', 'abcd'),
(19, '7117622', 'abcd'),
(20, '2145025434', 'jl.cibogo atas no 76 rt 05 rw '),
(23, '243781448', 'jl.citerep'),
(24, '519070154', 'jl.setia budi '),
(25, '1296382204', 'sukajadi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `notelepon` varchar(13) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `notelepon`, `email`, `username`, `password`, `role`) VALUES
(1, 'Admin Bara', '0816593922', 'admin@bara.co.id', 'adminbara', 'ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6STFOaUo5LmV5SnBZWFFpT2pFek5UWTVPVGsxTWpRc0ltNWlaaUk2TVRNMU56QXdNREF3TUN3aWRXbGtJam9pWVdSdGFXNWlZWEpoSWl3aWNHRnpjM2R2Y21RaU9pSm9iR3RPYnpOSk1IbGFUWE42WlcxcFpVRlBNRXgzUFQwaWZRLmxOUEJ5UGhNX2x0c1JtRklRUy1LNUk5Vnh4aEI0YjBvRXoxN0xzU19qRjg=', 'ADMIN'),
(4, 'HRD BARA', '088384284782', 'hrdbara@gmail.com', 'hrdbara', 'ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6STFOaUo5LmV5SnBZWFFpT2pFek5UWTVPVGsxTWpRc0ltNWlaaUk2TVRNMU56QXdNREF3TUN3aWRXbGtJam9pYUhKa1ltRnlZU0lzSW5CaGMzTjNiM0prSWpvaVJqVXdTRlpOUW1WNEwyWnRUbVU1YW1wbFIwcDJRVDA5SW4wLi1xT3VPejdrZXROR2VINWpzb011RDZFNk9FWkhsTGJlXzNqSkhGZjNXVUU=', 'HRD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `porto`
--
ALTER TABLE `porto`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `magang`
--
ALTER TABLE `magang`
  MODIFY `id_magang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `porto`
--
ALTER TABLE `porto`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Constraints for table `magang`
--
ALTER TABLE `magang`
  ADD CONSTRAINT `magang_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `porto`
--
ALTER TABLE `porto`
  ADD CONSTRAINT `porto_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
