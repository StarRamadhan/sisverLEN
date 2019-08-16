-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 08:46 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_verif_len`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `tanggal_masuk` date NOT NULL,
  `kode_verifikasi` int(11) NOT NULL,
  `nomor_dokumen` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(15) NOT NULL,
  `mata_uang` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal_out_verif` date NOT NULL,
  `tanggal_out_jurnal` date DEFAULT NULL,
  `tanggal_out_manager` date DEFAULT NULL,
  `status_dok_jurnal` varchar(10) DEFAULT NULL,
  `status_dok_manager` varchar(10) DEFAULT NULL,
  `no_revisi` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE `revisi` (
  `no_dokumen` varchar(50) DEFAULT NULL,
  `no_revisi` int(11) DEFAULT NULL,
  `ket_revisi` text,
  `tgl_revisi` date DEFAULT NULL,
  `nilai_revisi` int(20) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `tgl_out_verif` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_enc` varchar(60) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `position` enum('manager','verifikasi1','verifikasi2','verifikasi3','jurnal','admin','guest') NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `status` enum('active','nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_enc`, `password`, `position`, `phone_number`, `status`) VALUES
(1, 'ba', '3d2172418ce305c7d16d4b05597c6a59', '22222', 'verifikasi2', '89534060766422', 'nonactive'),
(2, 'Ba', 'dbc4d84bfcfe2284ba11beffb853a8c4', '4444', 'manager', '0897954652154', 'active'),
(3, 'Admin', 'B59C67BF196A4758191E42F76670CEBA', '1111', 'admin', '0849879879878', ''),
(4, 'Junaidi', '2BE9BD7A3434F7038CA27D1918DE58BD', '3333', 'jurnal', '0849879875852', ''),
(5, 'Sumarnia', '6074C6AA3488F3C2DDDFF2A7CA821AAB', '5555', 'verifikasi2', '0899996645212', ''),
(6, 'Haniatuns', 'E9510081AC30FFA83F10B68CDE1CAC07', '6666', 'verifikasi3', '0812125487888', ''),
(7, 'starrr', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'verifikasi1', '0897954652154', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`nomor_dokumen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD KEY `no_dokumen` (`no_dokumen`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`no_dokumen`) REFERENCES `dokumen` (`nomor_dokumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
