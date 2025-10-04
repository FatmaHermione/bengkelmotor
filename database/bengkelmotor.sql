-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20250927.af95a2e028
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2025 at 10:31 AM
-- Server version: 9.1.0
-- PHP Version: 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkelmotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailservis`
--

CREATE TABLE `detailservis` (
  `idTransaksi` int NOT NULL,
  `idServis` int DEFAULT NULL,
  `hargaTransaksiServis` decimal(12,2) DEFAULT NULL,
  `jumlahJualSparepart` int DEFAULT NULL,
  `tanggalTransaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailservis`
--

INSERT INTO `detailservis` (`idTransaksi`, `idServis`, `hargaTransaksiServis`, `jumlahJualSparepart`, `tanggalTransaksi`) VALUES
(1, 1, 90000.00, 1, '2025-09-20'),
(2, 2, 150000.00, 1, '2025-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `idKasir` int NOT NULL,
  `namaKasir` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `noTelp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`idKasir`, `namaKasir`, `noTelp`) VALUES
(1, 'Dewi', '083333333'),
(2, 'Rina', '084444444');

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `idMontir` int NOT NULL,
  `namaMontir` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `noTelp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`idMontir`, `namaMontir`, `noTelp`) VALUES
(1, 'Andi', '081111111'),
(2, 'Rudi', '082222222');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `IdMotor` int NOT NULL,
  `idPelanggan` int DEFAULT NULL,
  `noPlat` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenisMotor` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`IdMotor`, `idPelanggan`, `noPlat`, `jenisMotor`) VALUES
(1, 1, 'B1234XYZ', 'Honda Beat'),
(2, 2, 'D9876ABC', 'Yamaha NMax');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` int NOT NULL,
  `namaPelanggan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `noTelp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `namaPelanggan`, `alamat`, `noTelp`) VALUES
(1, 'Siti Sugianti', 'JL. Panggodean No.10', '08134433485'),
(2, 'Sri Mulyani', 'JL. Panggodean No.20', '083472184788');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `idServis` int NOT NULL,
  `idMotor` int DEFAULT NULL,
  `idMontir` int DEFAULT NULL,
  `idSparepart` int DEFAULT NULL,
  `tanggalServis` date DEFAULT NULL,
  `totalHarga` decimal(12,2) DEFAULT NULL,
  `jumlahSparepart` int DEFAULT NULL,
  `keluhan` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`idServis`, `idMotor`, `idMontir`, `idSparepart`, `tanggalServis`, `totalHarga`, `jumlahSparepart`, `keluhan`) VALUES
(1, 1, 1, 1, '2025-09-20', 90000.00, 1, 'Ganti oli'),
(2, 2, 2, 2, '2025-09-21', 150000.00, 1, 'Ganti kampas rem');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `idSparepart` int NOT NULL,
  `namaSparepart` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `harga` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`idSparepart`, `namaSparepart`, `stok`, `harga`) VALUES
(1, 'Oli Yamalube', 50, 45000.00),
(2, 'Kampas Rem', 30, 75000.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int NOT NULL,
  `totalHarga` int DEFAULT NULL,
  `jumlahJualSparepart` int DEFAULT NULL,
  `tanggalTransaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `totalHarga`, `jumlahJualSparepart`, `tanggalTransaksi`) VALUES
(1, 90000, 1, '2025-09-20'),
(2, 150000, 1, '2025-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `transaksipenjualansparepart`
--

CREATE TABLE `transaksipenjualansparepart` (
  `idTransaksi` int NOT NULL,
  `idSparepart` int NOT NULL,
  `jumlah` int DEFAULT NULL,
  `hargaTransaksi` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksipenjualansparepart`
--

INSERT INTO `transaksipenjualansparepart` (`idTransaksi`, `idSparepart`, `jumlah`, `hargaTransaksi`) VALUES
(1, 1, 1, 45000.00),
(2, 2, 1, 75000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailservis`
--
ALTER TABLE `detailservis`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idServis` (`idServis`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`idKasir`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`idMontir`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`IdMotor`),
  ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`idServis`),
  ADD KEY `idMotor` (`idMotor`),
  ADD KEY `idMontir` (`idMontir`),
  ADD KEY `idSparepart` (`idSparepart`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`idSparepart`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `transaksipenjualansparepart`
--
ALTER TABLE `transaksipenjualansparepart`
  ADD PRIMARY KEY (`idTransaksi`,`idSparepart`),
  ADD KEY `idSparepart` (`idSparepart`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailservis`
--
ALTER TABLE `detailservis`
  ADD CONSTRAINT `detailservis_ibfk_1` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`),
  ADD CONSTRAINT `detailservis_ibfk_2` FOREIGN KEY (`idServis`) REFERENCES `servis` (`idServis`);

--
-- Constraints for table `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`);

--
-- Constraints for table `servis`
--
ALTER TABLE `servis`
  ADD CONSTRAINT `servis_ibfk_1` FOREIGN KEY (`idMotor`) REFERENCES `motor` (`IdMotor`),
  ADD CONSTRAINT `servis_ibfk_2` FOREIGN KEY (`idMontir`) REFERENCES `montir` (`idMontir`),
  ADD CONSTRAINT `servis_ibfk_3` FOREIGN KEY (`idSparepart`) REFERENCES `sparepart` (`idSparepart`);

--
-- Constraints for table `transaksipenjualansparepart`
--
ALTER TABLE `transaksipenjualansparepart`
  ADD CONSTRAINT `transaksipenjualansparepart_ibfk_1` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`),
  ADD CONSTRAINT `transaksipenjualansparepart_ibfk_2` FOREIGN KEY (`idSparepart`) REFERENCES `sparepart` (`idSparepart`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
