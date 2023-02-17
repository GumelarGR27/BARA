-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2022 pada 16.52
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

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
-- Struktur dari tabel `cv`
--

CREATE TABLE `cv` (
  `no` int(11) NOT NULL,
  `id_pelamar` varchar(10) NOT NULL,
  `cv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cv`
--

INSERT INTO `cv` (`no`, `id_pelamar`, `cv`) VALUES
(1, '502844138', 'Get_Started_With_Smallpdf.pdf'),
(8, '1759683731', 'Get_Started_With_Smallpdf.pdf'),
(9, '873623999', 'Get_Started_With_Smallpdf.pdf'),
(10, '779120913', 'Get_Started_With_Smallpdf.pdf'),
(15, '2128645562', 'Get_Started_With_Smallpdf.pdf'),
(19, '7117622', 'Get_Started_With_Smallpdf.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` varchar(5) NOT NULL,
  `Nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `Nama`) VALUES
('DIV01', 'Web Developer'),
('DIV02', 'Mobile Apps Developer'),
('DIV03', 'Desktop Apps Developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` varchar(5) NOT NULL,
  `id_divisi` varchar(30) NOT NULL,
  `kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_divisi`, `kriteria`) VALUES
('LOW01', 'DIV01', 'Memahami konsep OOP, PHP (Laravel), JavaScript (ReactJS), pengalaman menggunakan database (RDBMS) minimal MYSQL                            '),
('LOW02', 'DIV02', 'Membuat dan mengembangkan aplikasi mobile; Mendesain dan mengimplementasikan UI/UX, Mengintegrasikan Application Programming Interfaces (APIs), Bahasa Pemrogramman Java/Swift                            '),
('LOW03', 'DIV03', 'Menguasai Bahasa Pemrograman: PowerBuilder atau bahasa pemrograman desktop lain seperti VB.Net, Java, C                            ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `magang`
--

CREATE TABLE `magang` (
  `id_magang` int(11) NOT NULL,
  `id_pelamar` varchar(10) NOT NULL,
  `durasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `magang`
--

INSERT INTO `magang` (`id_magang`, `id_pelamar`, `durasi`) VALUES
(5, '2128645562', '2022-11-09 - 2022-11-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_divisi` varchar(5) NOT NULL,
  `cv` text NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nama`, `email`, `deskripsi`, `id_divisi`, `cv`, `jenis`, `status`) VALUES
('1759683731', 'rheylandi Berasa', 'hyung@gmail.om', 'abcd', 'DIV02', 'Get_Started_With_Smallpdf.pdf', 'Karyawan', 'Diterima'),
('2128645562', 'sani sana', 'sani@gmail.com', 'abcd', 'DIV01', 'Get_Started_With_Smallpdf.pdf', 'Magang', 'Diterima'),
('502844138', 'raihan Martin ', 'raihanmartin88@gmail.com', 'abcd', 'DIV01', 'Get_Started_With_Smallpdf.pdf', 'Karyawan', 'Ditolak'),
('7117622', 'ehun', 'ehun@gmail.com', 'abcd', 'DIV02', 'Get_Started_With_Smallpdf.pdf', 'Karyawan', 'Ditolak'),
('779120913', 'deni solihin', 'deni@gmailc.om', 'abcd', 'DIV03', 'Get_Started_With_Smallpdf.pdf', 'Karyawan', 'Ditolak'),
('873623999', 'Raka Marlindo ', 'Raka@gmail.com', 'abcd', 'DIV01', 'Get_Started_With_Smallpdf.pdf', 'Karyawan', 'Belum Interview');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `subjek`, `isi`, `jenis`) VALUES
(1, 'Syarat Tidak Memenuhi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit odit nesciunt magni hic eveniet ex voluptatum accusamus eum temporibus illum! Explicabo quis odio nobis nam, ea mollitia reiciendis excepturi quaerat!', 'Tolak'),
(2, 'Kriteria Tidak Memenuhi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit odit nesciunt magni hic eveniet ex voluptatum accusamus eum temporibus illum! Explicabo quis odio nobis nam, ea mollitia reiciendis excepturi quaerat!', 'Tolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `porto`
--

CREATE TABLE `porto` (
  `no` int(11) NOT NULL,
  `id_pelamar` varchar(10) NOT NULL,
  `porto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `porto`
--

INSERT INTO `porto` (`no`, `id_pelamar`, `porto`) VALUES
(1, '502844138', 'abcd'),
(8, '1759683731', 'abcd'),
(9, '873623999', 'abcd'),
(10, '779120913', 'abcd'),
(15, '2128645562', 'abcd'),
(19, '7117622', 'abcd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `notelepon` varchar(13) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `notelepon`, `email`, `username`, `password`, `role`) VALUES
(1, 'Admin Bara', '0816593922', 'admin@bara.co.id', 'adminbara', 'ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6STFOaUo5LmV5SnBZWFFpT2pFek5UWTVPVGsxTWpRc0ltNWlaaUk2TVRNMU56QXdNREF3TUN3aWRXbGtJam9pWVdSdGFXNWlZWEpoSWl3aWNHRnpjM2R2Y21RaU9pSm9iR3RPYnpOSk1IbGFUWE42WlcxcFpVRlBNRXgzUFQwaWZRLmxOUEJ5UGhNX2x0c1JtRklRUy1LNUk5Vnh4aEI0YjBvRXoxN0xzU19qRjg=', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indeks untuk tabel `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `porto`
--
ALTER TABLE `porto`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cv`
--
ALTER TABLE `cv`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `magang`
--
ALTER TABLE `magang`
  MODIFY `id_magang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `porto`
--
ALTER TABLE `porto`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);

--
-- Ketidakleluasaan untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Ketidakleluasaan untuk tabel `magang`
--
ALTER TABLE `magang`
  ADD CONSTRAINT `magang_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);

--
-- Ketidakleluasaan untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Ketidakleluasaan untuk tabel `porto`
--
ALTER TABLE `porto`
  ADD CONSTRAINT `porto_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
