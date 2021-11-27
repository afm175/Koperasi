-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 12:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `gadai`
--

CREATE TABLE `gadai` (
  `id_gadai` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `lama_gadai` int(255) NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gadai`
--

INSERT INTO `gadai` (`id_gadai`, `username`, `barang`, `lama_gadai`, `tgl_pengajuan`) VALUES
(1, '', 'Motor', 5, '0000-00-00'),
(2, 'jan', 'Sepatu', 4, '0000-00-00'),
(3, 'jan', 'Motor', 5, '0000-00-00'),
(4, 'jan', 'Mobil', 10, '0000-00-00'),
(5, 'jan', 'Hamster', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `date` date NOT NULL,
  `keterangan` text NOT NULL,
  `cicil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `username`, `nominal`, `date`, `keterangan`, `cicil`) VALUES
(84, 'abi', 5000000, '2021-11-25', 'Mau moobil', 23),
(85, 'abi', 5000000, '2021-11-19', 'Mau ngabers', 23),
(88, 'jan', 2000, '2021-11-27', 'Beli Harley', 23),
(89, 'abi', 20000, '0000-00-00', 'Nabung Makan', 20),
(90, 'abi', 32000, '0000-00-00', 'Nabung Makan', 21),
(91, 'abi', 20000, '0000-00-00', 'Nabung Makan', 20),
(92, 'hai', 20000, '0000-00-00', 'Nabung Makan', 20),
(93, 'hai', 25000, '0000-00-00', 'Nabung Beli macan', 21),
(94, 'hai', 20000, '0000-00-00', 'Nabung Makan', 20),
(95, 'jan', 0, '2021-11-27', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `simpan`
--

CREATE TABLE `simpan` (
  `id_simpan` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `cicil` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpan`
--

INSERT INTO `simpan` (`id_simpan`, `username`, `nominal`, `date`, `keterangan`, `cicil`) VALUES
(350, 'abi', '20000', '20-12-2021', 'Nabung Makan', 20),
(351, 'hai', '2000020000', '22-12-2021', 'Nabung Civic Turbo', 50),
(352, 'jan', '212000', '20-12-2021', 'Nabung Beli Agrera', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `telpon` int(20) NOT NULL,
  `alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `pass`, `telpon`, `alamat`) VALUES
(12, 'jan', 'jan@jan', 'fa27ef3ef6570e32a79e', 0, ''),
(14, 'b', 'ran@gmail.com', '2ab4f27ab1ffdcdad8ed', 812394949, 'tandur'),
(15, 'c', 'c@c.com', '4a8a08f09d37b7379564', 0, 'c'),
(16, 'abi', 'abi@gmail', '19a9228dbbbe3b613190', 2147483647, 'jalan kenangan'),
(17, 'hai', 'hai@gmail.com', '42810cb02db3bb2cbb42', 0, 'hai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gadai`
--
ALTER TABLE `gadai`
  ADD PRIMARY KEY (`id_gadai`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `cicilan` (`id_pinjam`);

--
-- Indexes for table `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`id_simpan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gadai`
--
ALTER TABLE `gadai`
  MODIFY `id_gadai` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `simpan`
--
ALTER TABLE `simpan`
  MODIFY `id_simpan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
