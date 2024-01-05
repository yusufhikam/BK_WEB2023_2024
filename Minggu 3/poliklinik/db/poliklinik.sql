-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 01:41 PM
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
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `id_poli` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_poli`, `id_jadwal`, `keluhan`, `no_antrian`, `status`) VALUES
(10, 6, 2, 3, 'mata kiri merah karena terkena abu rokok\r\n', 1, 1),
(14, 7, 2, 2, 'mata merah setelah terkena abu rokok', 1, 0),
(16, 7, 3, 4, 'mual dan muntah', 1, 0),
(17, 6, 1, 2, 'gigi ngilu', 1, 1),
(19, 6, 2, 3, 'mata merah dan gatal', 2, 0),
(20, 17, 2, 1, 'mata iritasi', 1, 1),
(21, 17, 2, 3, 'asdasd', 3, 0),
(22, 17, 2, 3, 'fff', 4, 1),
(23, 16, 2, 1, 'sakit', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_periksa` int(10) UNSIGNED NOT NULL,
  `id_obat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(5, 11, 6),
(12, 19, 6),
(26, 33, 2),
(37, 46, 6),
(38, 47, 6);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `id_poli` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`, `id_poli`) VALUES
(10, 'Maylinda', 'Pamotan', '09872625777', 2),
(11, 'Yusuf', 'Rembang', '09876543321', 1),
(14, 'Faidah', 'Rembang', '0897644212', 3),
(16, 'Reza', 'Rembang', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 10, 'Senin', '13:30:00', '01:02:00'),
(2, 11, 'Selasa', '09:00:00', '09:30:00'),
(3, 10, 'Senin', '13:00:00', '13:30:00'),
(4, 14, 'Selasa', '08:30:00', '09:00:00'),
(8, 10, 'Rabu', '12:30:00', '14:00:00'),
(9, 10, 'Selasa', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(2, 'Ultra Flu', 'tablet', 6000),
(3, 'Polysilane', 'Tablet', 10000),
(6, 'Imodium 2 mg', 'Tablet', 15000),
(7, 'Bodrex', 'Tablet', 5000),
(11, 'Cendo Protagenta Minidose 0.6 ml', 'Botol', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_rm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(1, 'Reno Pratama', 'Rembang', '8267177189110929', '089513108192', '112262'),
(3, 'Rendi Setyo', 'Rembang', '9882982081729279', '828329232382', '123333'),
(5, 'Agung Pambudi', 'Rembang', '676721372138123', '09876542325', '44220012'),
(6, 'Yusuf Hikam', 'Rembang', '123456789', '0895', '202312-001'),
(7, 'Siti Nur Faidah', 'Sluke', '123334455', '123', '202312-002'),
(8, 'Reni Pramesti', 'Lasem', '22334551212', '088922', '202312-003'),
(9, 'Andi Pratama', 'Sluke', '1234455', '099922', '202312-004'),
(15, 'Sonia Naeli Syifa', 'Lasem', '213237231', '0877790', '202312-005'),
(16, 'Farid', 'Lasem', '1233217', '123', '202312-006'),
(17, 'Andi', 'Rembang', '761239', '0999', '202312-007');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_daftar_poli` int(11) UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL,
  `biaya_periksa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`) VALUES
(11, 10, '2024-01-04 00:00:00', 'ggdfsdf', 150000),
(19, 20, '2024-01-05 00:00:00', 'teteskan ke mata', 150000),
(33, 10, '2024-01-05 00:00:00', 'asd', 150000),
(46, 23, '2024-01-05 00:00:00', 'a', 165000),
(47, 20, '2024-01-05 14:22:00', 'hahaha', 165000);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(1, 'Poli Gigi', 's'),
(2, 'Poli Mata', 's'),
(3, 'Poli Kandungan', 'Poli kandungan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` enum('admin','dokter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_dokter`, `username`, `password`, `role`) VALUES
(7, 10, 'maylinda', '123', 'dokter'),
(8, NULL, 'admin', 'admin', 'admin'),
(9, 16, 'reza', '123', 'dokter'),
(10, 11, 'yusuf', '123', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pasien_daftar_poli` (`id_pasien`),
  ADD KEY `fk_id_jadwal_daftar_poli` (`id_jadwal`),
  ADD KEY `fk_id_poli_poli` (`id_poli`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_obat_detail_periksa` (`id_obat`),
  ADD KEY `fk_id_periksa_detail_periksa` (`id_periksa`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_poli_dokter` (`id_poli`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_dokter_jadwal_periksa` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_daftar_poli_periksa` (`id_daftar_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_dokter_dokter` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_id_jadwal_daftar_poli` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `fk_id_pasien_daftar_poli` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `fk_id_poli_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `fk_id_obat_detail_periksa` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_id_periksa_detail_periksa` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_id_poli_dokter` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Constraints for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `fk_id_dokter_jadwal_periksa` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_id_daftar_poli_periksa` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_dokter_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
