-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2020 at 04:54 
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE IF NOT EXISTS `tb_presensi` (
  `id_presensi` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(200) NOT NULL,
  `presensi_masuk` datetime NOT NULL,
  `presensi_pulang` datetime DEFAULT NULL,
  PRIMARY KEY (`id_presensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `id_user`, `presensi_masuk`, `presensi_pulang`) VALUES
(1, 'sigitsuryono25', '2020-09-27 00:00:00', '2020-09-27 17:00:00'),
(3, 'rizal14', '2020-09-27 09:00:00', '2020-09-27 18:00:00'),
(4, 'rizal14', '2020-09-27 09:00:00', '2020-09-27 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `terdaftar_pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `nama`, `password`, `color`, `terdaftar_pada`) VALUES
('rizal14', 'Bunyamin Fakhrurrizal Alghifari', '827ccb0eea8a706c4c34a16891f84e7b', '#03fc2c', '2020-09-27 04:38:49'),
('sigitsuryono25', 'Sigit Suryono', '827ccb0eea8a706c4c34a16891f84e7b', '#fc9403', '2020-09-26 02:25:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
