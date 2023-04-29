-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 08:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(50) NOT NULL,
  `id_pengguna` int(50) NOT NULL,
  `id_slot` int(50) NOT NULL,
  `no_plat` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `waktu_masuk` varchar(50) NOT NULL,
  `waktu_keluar` varchar(50) DEFAULT NULL,
  `durasi` varchar(100) DEFAULT NULL,
  `biaya` int(50) DEFAULT 0,
  `metode_bayar` varchar(100) DEFAULT NULL,
  `status_booking` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_pengguna`, `id_slot`, `no_plat`, `tanggal`, `waktu_masuk`, `waktu_keluar`, `durasi`, `biaya`, `metode_bayar`, `status_booking`) VALUES
(2, 22, 14, 'BK 123 LL', '02 April 2023', '18:40', NULL, NULL, 0, NULL, 'Cancel'),
(3, 1, 10, 'BK 1986 OJ', '05 April 2023', '20:30', '22:58', '2 jam 28 menit', 6000, 'Cash', 'Finish'),
(4, 22, 7, 'BK 223 LB', '05 April 2023', '12:17', '22:59', '10 jam 42 menit', 22000, 'Cash', 'Finish'),
(6, 1, 16, 'BK 1212 AA', '05 April 2023', '19:45', '22:59', '3 jam 14 menit', 12000, 'E-money', 'Finish'),
(10, 1, 6, 'AS 112 QW', '08 April 2023', '00:00', '00:21', '0 jam 21 menit', 2000, 'E-money', 'Finish'),
(11, 2, 6, 'BK 09 LL', '08 April 2023', '00:00', '00:12', '0 jam 12 menit', 2000, 'E-money', 'Finish'),
(12, 22, 17, 'BK 11 AA', '08 April 2023', '00:00', '00:21', '0 jam 21 menit', 3000, 'E-money', 'Finish'),
(13, 2, 16, 'AS 888 BK', '08 April 2023', '00:13', '00:24', '0 jam 11 menit', 3000, 'Cash', 'Finish'),
(14, 1, 5, 'WE 12 AS', '08 April 2023', '00:22', NULL, NULL, 0, NULL, 'Cancel'),
(15, 22, 16, 'LL 12 AS', '08 April 2023', '01:14', '02:47', '1 jam 33 menit', 6000, 'Cash', 'Finish'),
(16, 22, 16, 'BK 122 AS', '09 April 2023', '20:25', '20:27', '0 jam 2 menit', 3000, 'E-money', 'Finish'),
(17, 2, 20, 'B 123 AA', '10 April 2023', '20:46', '20:53', '0 jam 7 menit', 4000, 'E-money', 'Finish'),
(18, 22, 18, 'AA 11 AA', '10 April 2023', '21:20', '21:33', '0 jam 13 menit', 4000, 'E-money', 'Finish'),
(23, 14, 19, 'AS 12 AS', '11 April 2023', '23:34', NULL, NULL, 0, NULL, 'Cancel'),
(24, 1, 10, 'AS 12 AA', '14 April 2023', '20:20', '20:21', '0 jam 1 menit', 2000, 'Cash', 'Finish'),
(25, 1, 6, 'AA 12 AA', '14 April 2023', '20:22', NULL, NULL, 0, NULL, 'Cancel'),
(26, 22, 23, 'AA 11 AA', '14 April 2023', '20:24', NULL, NULL, 0, NULL, 'Cancel'),
(27, 1, 24, 'AS 33 AA', '14 April 2023', '20:25', '20:25', '0 jam 0 menit', 0, 'Cash', 'Finish'),
(29, 19, 30, 'AA 11 AA', '14 April 2023', '20:43', '20:44', '0 jam 1 menit', 4000, 'E-money', 'Finish'),
(30, 22, 5, 'AS 1235 AA', '19 April 2023', '16:47', '20:47', '4 jam 0 menit', 20000, 'Cash', 'Finish'),
(32, 22, 31, 'WD 341 ZZ', '20 April 2023', '19:45', '21:45', '2 jam 0 menit', 8000, 'Cash', 'Finish'),
(33, 22, 15, 'BK 909 LM', '22 April 2023', '16:15', '21:31', '5 jam 16 menit', 18000, 'Cash', 'Finish');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lokasi`
--

CREATE TABLE `detail_lokasi` (
  `id_slot` int(10) NOT NULL,
  `id_lokasi` int(10) NOT NULL,
  `nama_slot` varchar(100) NOT NULL,
  `status_slot` varchar(100) NOT NULL,
  `lantai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_lokasi`
--

INSERT INTO `detail_lokasi` (`id_slot`, `id_lokasi`, `nama_slot`, `status_slot`, `lantai`) VALUES
(5, 5, 'J1', 'Available', 1),
(6, 7, 'Depan Ahok', 'Available', 1),
(7, 7, 'Depan Suto', 'Available', 1),
(10, 7, 'Samping Toko Kertas Bukit Jaya Abadi', 'Available', 1),
(14, 9, 'B1', 'Available', 2),
(15, 9, 'B2', 'Available', 2),
(16, 9, 'B3', 'Available', 2),
(17, 9, 'C1', 'Available', 1),
(18, 11, 'Samping Misop', 'Available', 1),
(19, 11, 'Depan Penjual Telor', 'Available', 1),
(20, 5, 'J2', 'Available', 1),
(21, 5, 'K1', 'Available', 2),
(22, 5, 'K2', 'Available', 2),
(23, 12, 'No. 11 A', 'Available', 1),
(24, 12, 'No. 12 A', 'Available', 1),
(25, 13, 'Depan Methodist-2 (1)', 'Available', 1),
(26, 13, 'Depan Methodist-2 (2)', 'Available', 1),
(30, 15, 'Semarang 1', 'Available', 1),
(31, 15, 'Semarang 2', 'Available', 1),
(32, 15, 'Dekat Simpang', 'Available', 1),
(33, 16, 'Samping Vihara', 'Available', 1),
(34, 16, 'Depan Vihara', 'Available', 1),
(35, 16, 'Belakang Vihara', 'Available', 1),
(36, 17, 'Slot 1', 'Available', 1),
(37, 17, 'Slot 2', 'Available', 1),
(38, 17, 'Slot 3', 'Available', 1),
(39, 17, 'SLot 4', 'Available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `jam_operasional` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `tarif` int(20) NOT NULL,
  `foto_lokasi` varchar(1000) NOT NULL DEFAULT 'nopic.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `alamat`, `jam_operasional`, `tipe`, `tarif`, `foto_lokasi`) VALUES
(5, 'Deli Park', 'Jl. Putri Hijau No.1, Kesawan, Kota Medan, Sumatera Utara 20111', '09:00-22:00', 'gedung', 5000, 'delipark.jpg'),
(7, 'Jalan Sutomo', 'Jalan Sutomo No. 92 ABDD', '07:00-21:30', 'jalanan', 2000, 'jalan_sutomo.jpg'),
(9, 'Sun Plaza', 'Jl. KH. Zainul Arifin No.7', '10:00-21:00', 'gedung', 3000, 'sunplaza.jpg'),
(11, 'Pasar Rame', 'JL. MH Thamrin Baru, No. 1', '07:00-23:00', 'jalanan', 4000, 'pasar_rame.jpg'),
(12, 'Jalan Adam Malik', 'Jalan Adam Malik (Depan Adipura)', '10:00-24:00', 'jalanan', 1000, 'adam_malik.jpg'),
(13, 'Jalan M.H. Thamrin', 'Jalan M.H. Thamrin', '11:00-15:00', 'jalanan', 3000, 'mh_thamrin.jpeg'),
(15, 'Semarang', 'Jalan Semarang', '18:00-23:59', 'jalanan', 4000, 'semarang.jpg'),
(16, 'Vihara Maitreya', 'Komplek Perumahan Cemara Asri No. 8, Jl. Cemara Asri Boulevard Raya', '07:00-22:00', 'jalanan', 2000, 'vihara.jpg'),
(17, 'Metropawllys', 'Jl. K.H. Wahid Hasyim No.6, Merdeka', '10:00-21:00', 'jalanan', 3000, 'metropawllys.jpeg'),
(21, 'Zambu', 'Jl. Zainul', '00:00-23:00', 'gedung', 10000, 'tes.jpg'),
(23, 'Aryaduta Medan', 'Jl. Kapten Maulana Lubis No.8, Petisah Tengah, Kec. Medan Petisah', '08:00-23:59', 'gedung', 3000, 'aryaduta.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(50) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `e_money` int(255) NOT NULL DEFAULT 0,
  `password` varchar(100) NOT NULL,
  `foto_pengguna` varchar(1000) NOT NULL DEFAULT 'user.png',
  `role` varchar(100) NOT NULL DEFAULT 'User',
  `status_pengguna` varchar(100) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_depan`, `nama_belakang`, `email`, `no_telp`, `e_money`, `password`, `foto_pengguna`, `role`, `status_pengguna`) VALUES
(1, 'dericky', 'chainatraaa', 'derickchainatra@gmail.com', '0822151511', 6000, 'd759eaf0519d7babeb7d0bbe5342d3ef924d321da546ffb6e1febdca8460cc5f', '123.png', 'User', 'Active'),
(2, 'Budi123', 'Salim', 'derick_chainatra@yahoo.com', '082312312345', 109000, '123d784226840b0a87bf4526495c5dc542d3bf11c343b2a93361725aacdad952', '2021-08-30 (1).png', 'User', 'Active'),
(13, 'Depin', 'Pinpin', 'pinpinpo@ipin.com', '0821456987', 0, 'c7c7bc6acac385984d88366cdb672eb5487ed3dad1f3b2e1866bf8824581c7d4', 'user.png', 'User', 'Inactive'),
(14, 'Sudirman', 'Men', 'admin@admin', '081111111111', 25000, '1b5cd042828b2f7563f6836f62fc3844ffe55bff6c70ac39c82a0fb29ac653dc', 'user.png', 'Admin', 'Active'),
(19, 'aa', 'aa', 'aa@gmail.com', '0556219591', 16000, '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'user.png', 'User', 'Inactive'),
(20, 'Marcel', 'Lius', 'marcel@lius.com', '0823123123', 50000, 'd958ca296b11c130507bb77b7af1de642bb0514b1e0a48e6f443fa0a8def4ac3', 'user.png', 'Admin', 'Inactive'),
(22, 'Derock', 'Dric', 'realma@gmail.com', '0821456987', 16000, '0186335267f378bb07e27c6f540bedf45526c4de8907a67c260e9070c7dd1ed8', 'avatar.png', 'User', 'Active'),
(25, 'Broby', 'Nasusion', 'broby@gmail.com', '0823456789', 0, '785b29e8e0d95912e88d19e6a9503d0f2d589f8adc56b1e26d236ac45d35d0a8', '', 'User', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_pengguna_FK_1` (`id_pengguna`),
  ADD KEY `id_slot_FK_1` (`id_slot`);

--
-- Indexes for table `detail_lokasi`
--
ALTER TABLE `detail_lokasi`
  ADD PRIMARY KEY (`id_slot`),
  ADD KEY `id_lokasi_FK_1` (`id_lokasi`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `detail_lokasi`
--
ALTER TABLE `detail_lokasi`
  MODIFY `id_slot` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `id_pengguna_FK_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `id_slot_FK_1` FOREIGN KEY (`id_slot`) REFERENCES `detail_lokasi` (`id_slot`);

--
-- Constraints for table `detail_lokasi`
--
ALTER TABLE `detail_lokasi`
  ADD CONSTRAINT `id_lokasi_FK_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
