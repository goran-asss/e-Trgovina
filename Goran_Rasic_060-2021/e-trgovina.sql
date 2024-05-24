-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2024 at 03:57 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-trgovina`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `korisnik_id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`korisnik_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `prezime`, `email`, `password`) VALUES
(9, 'Milica', 'Jankovic', 'mj@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 'Mirko', 'Petrovic', 'mp@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'Goran', 'Rasic', 'goranrasic@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

DROP TABLE IF EXISTS `proizvod`;
CREATE TABLE IF NOT EXISTS `proizvod` (
  `proizvod_id` int NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL,
  `dostupnost` tinyint(1) DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`proizvod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvod_id`, `naziv`, `cena`, `dostupnost`, `slika`) VALUES
(10, 'Prime Pro PBC 7800X3D32G1T4070', 1299.99, 1, 'imgs/6643b95181242_image662b5aedbb398.jpg'),
(9, 'Prime Pro Lambda Računar', 1059.99, 1, 'imgs/6643b9256750f_image65814faf7958f.jpg'),
(12, 'HP 255 G9 R5/8/512 6S6F5EA', 699.99, 1, 'imgs/6643b9b95cede_image65b38ac032ee3.jpg'),
(13, 'ACER Nitro 5 AN515 R5/16/512/3070Ti NH.QH1EX.00C', 1634.99, 1, 'imgs/6643b9cc5967e_image64abc96e3f518.jpg'),
(14, 'ACER Nitro 5 AN515-45 R5/16/512 NH.QB9EX.00J/16', 1100.00, 1, 'imgs/6643b9e494cf2_image64e47d3ea9fb7.png'),
(15, 'ACER Aspire A315-44P-R4N4 R7/32/512GB NX.KSJEX.009/32', 719.99, 0, 'imgs/6643ba0365678_image65f42fb635bf8.jpg'),
(16, 'ACER Extensa EX215 i7/8/512', 810.00, 0, 'imgs/6643ba18072b9_image651c0331c21a7.jpg'),
(17, 'HP 15-fc0031nm R5/8/512 8D8E9EA', 660.00, 1, 'imgs/6643ba2964342_image654e013178548.jpg'),
(18, 'DELL Vostro 3520 i5/16/512', 660.99, 1, 'imgs/6643ba3c2f6ef_image656704c2230de.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recenzije`
--

DROP TABLE IF EXISTS `recenzije`;
CREATE TABLE IF NOT EXISTS `recenzije` (
  `recenzija_id` int NOT NULL AUTO_INCREMENT,
  `proizvod_id` int DEFAULT NULL,
  `korisnik_id` int DEFAULT NULL,
  `ocena` int DEFAULT NULL,
  `komentar` text,
  PRIMARY KEY (`recenzija_id`),
  KEY `proizvod_id` (`proizvod_id`),
  KEY `korisnik_id` (`korisnik_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recenzije`
--

INSERT INTO `recenzije` (`recenzija_id`, `proizvod_id`, `korisnik_id`, `ocena`, `komentar`) VALUES
(28, 10, 9, 5, 'Previse dobro da bi bilo istinito!'),
(25, 9, 7, 3, 'Dobar, ali je cena previsoka.'),
(27, 10, 8, 4, 'Savrsen odnos cene i kvaliteta!'),
(24, 12, 7, 1, 'Los laptop!'),
(23, 10, 7, 5, 'Bas dobar racunar!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
