-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2016 at 10:36 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos_fingerprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `icon` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `stok`, `kategori`, `icon`) VALUES
(1, 'gula impor', 5000, 45, 'gula', ''),
(2, 'gula lokal', 4000, 50, 'gula', '');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE IF NOT EXISTS `histori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kuantitas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_barang` (`id_barang`),
  KEY `fk_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id`, `id_user`, `id_barang`, `tanggal`, `kuantitas`) VALUES
(1, 1, 1, '2016-08-30 13:00:00', 2),
(2, 1, 2, '2016-08-30 13:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik_ktp` varchar(30) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `nik_ktp`, `saldo`, `nama`) VALUES
(1, '123456789101', 60000, 'budi'),
(2, '97364876232098', 4000, 'susi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histori`
--
ALTER TABLE `histori`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `userdata` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
