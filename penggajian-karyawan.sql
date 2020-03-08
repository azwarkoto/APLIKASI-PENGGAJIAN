-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 08:51 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian-karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(20) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL,
  `tgl_tahun` date NOT NULL,
  `jumlah_kehadiran` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nama_karyawan`, `waktu_masuk`, `waktu_keluar`, `tgl_tahun`, `jumlah_kehadiran`) VALUES
(3, 'fazri', '00:00:10', '00:00:10', '2019-10-10', 20),
(4, 'ss', '21:23:00', '00:00:10', '0000-00-00', 20),
(5, 'ss', '00:00:00', '00:00:20', '0000-00-00', 20),
(6, 'ss', '00:00:00', '00:00:10', '0000-00-00', 20),
(7, 'abdul', '23:20:00', '23:30:00', '2019-09-02', 20);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `id_transaksi` int(12) NOT NULL,
  `id_karyawan` int(12) NOT NULL,
  `id_absen` int(12) NOT NULL,
  `id_jabatan` int(12) NOT NULL,
  `gaji_pokok` varchar(20) NOT NULL,
  `tunjanggan_jabatan` varchar(20) NOT NULL,
  `potongan` varchar(20) NOT NULL,
  `gaji_bersih` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_karyawan`
--

INSERT INTO `gaji_karyawan` (`id_transaksi`, `id_karyawan`, `id_absen`, `id_jabatan`, `gaji_pokok`, `tunjanggan_jabatan`, `potongan`, `gaji_bersih`) VALUES
(0, 1, 2, 2, '200.000', '20', '20', '30');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(20) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `gaji_pokok` int(100) NOT NULL,
  `tgl_gjian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(20) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(64) NOT NULL,
  `alamat_karyawan` varchar(64) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(21) NOT NULL,
  `foto` longblob NOT NULL,
  `id_jabatan` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat_karyawan`, `no_hp`, `email`, `password`, `foto`, `id_jabatan`) VALUES
(0, 'fazri', 'cirebon', '1998-09-07', 'islam', 'ds. surakarta', '089', 'nuris.akbar@gmail.com', 'dff', 0x4361707475722e4a5047, 2),
(1, 'fazri', 'cirebon', '0000-00-00', 'islam', 'ds. surakarta', '089', 'abdulrobipadri06@gmail.com', 'ss', 0x7373, 1),
(2, 'sayudin', 'cirebon', '0000-00-00', 'islam', 'ds. surakarta', '089', 'abdulrobipadri06@gmail.com', 'dff', 0x7373, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunjangan_jabatan` int(20) NOT NULL,
  `besar_tunjangan` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`) VALUES
(2, 'gemalyn@gmail.com', 'cepe', 'Gemalyn Cepe'),
(4, 'tim@gmail.com', '123', 'abdul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan_jabatan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
