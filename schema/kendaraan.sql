-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 10:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `nomor_registrasi_kendaraan` varchar(20) NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `merk_kendaraan` varchar(50) NOT NULL,
  `tahun_pembuatan` year(4) NOT NULL,
  `kapasitas_silinder` int(11) NOT NULL,
  `warna_kendaraan` enum('Merah','Hitam','Biru','Abu-Abu') NOT NULL,
  `bahan_bakar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`nomor_registrasi_kendaraan`, `nama_pemilik`, `alamat`, `merk_kendaraan`, `tahun_pembuatan`, `kapasitas_silinder`, `warna_kendaraan`, `bahan_bakar`) VALUES
('A-1234-XYZ', 'Adam', 'Jalan Suka Maju No. 1, Ambon', 'Suzuki Athlete', 2021, 125, 'Merah', 'Bensin'),
('B-2345-YZA', 'Budi', 'Jalan Damai No. 2, Bekasi', 'Honda Beat', 2020, 125, 'Hitam', 'Bensin'),
('C-3456-ZAB', 'Cici', 'Jalan Baru No. 3, Cimahi', 'Honda CBR', 2019, 150, 'Biru', 'Bensin'),
('D-4567-ABC', 'Dodi', 'Jalan Makmur No. 4, Demak', 'Yamaha Delight', 2018, 125, 'Abu-Abu', 'Bensin'),
('E-5678-BCD', 'Eko', 'Jalan Kenangan No. 5, Ende', 'Yamaha Ego Avantiz', 2017, 125, 'Merah', 'Bensin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`nomor_registrasi_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
