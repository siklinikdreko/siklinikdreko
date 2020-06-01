-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 09:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `nip` char(5) NOT NULL,
  `id_user` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `poli` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`nip`, `id_user`, `nama`, `tgl_lahir`, `tgl_registrasi`, `alamat`, `poli`, `status`) VALUES
('74325', 'U7794', 'Rendy Efendi', '1991-12-02', '2020-05-29', 'Nganjuk', 'Gigi', 'Masuk'),
('88920', 'U6952', 'Andy Subagio', '1992-12-08', '2020-05-29', 'Surabaya', 'Umum', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `id_pasien` char(5) NOT NULL,
  `no_antrian` char(4) NOT NULL,
  `keluhan` text NOT NULL,
  `poli` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` char(5) NOT NULL,
  `id_user` char(5) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `umur` decimal(10,0) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `keluhan` text NOT NULL,
  `alergi_obat` text NOT NULL,
  `poli` varchar(5) NOT NULL,
  `status_pasien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` char(5) NOT NULL,
  `nip` char(5) NOT NULL,
  `id_pasien` char(5) NOT NULL,
  `keluhan` text NOT NULL,
  `alergi_obat` text NOT NULL,
  `resep_obat` text NOT NULL,
  `tgl_periksa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`) VALUES
('U1016', 'superadmin', '71e23baee837c5d2952f93a29b113cab', 'Fahri Andrian', 'admin'),
('U6532', 'arias', 'da79a7ce06b982dce606e6c552b27c42', 'Aria Sanjaya', 'pasien'),
('U6952', 'andys', '627eb7cfc8221ed018b2c4cb368a2afb', 'Andy Subagio', 'dokter'),
('U7794', 'rendye', '0c4f26fc818211936ada134f8a3cb516', 'Rendy Efendi', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
