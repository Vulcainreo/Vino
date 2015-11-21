-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2015 at 04:10 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vino`
--

-- --------------------------------------------------------

--
-- Table structure for table `bouteille`
--

CREATE TABLE IF NOT EXISTS `bouteille` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `qrcode` varchar(20) NOT NULL,
  `region` int(20) NOT NULL,
  `type` int(20) NOT NULL,
  `millenisme` int(4) NOT NULL,
  `cepage` int(20) NOT NULL,
  `contenance` int(20) NOT NULL,
  `volumeAlcool` int(11) NOT NULL,
  `temperatureService` int(20) NOT NULL,
  `stock` int(20) NOT NULL,
  `emplacement` varchar(200) NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bouteille`
--

INSERT INTO `bouteille` (`id`, `nom`, `photo`, `qrcode`, `region`, `type`, `millenisme`, `cepage`, `contenance`, `volumeAlcool`, `temperatureService`, `stock`, `emplacement`) VALUES
(1, 'PETIT MIRACLE', '/vino/data/bouteille/petitmiracle.png', '', 2, 2, 2010, 1, 0, 0, 0, 0, '1||3;4|2;6|3;7|5;4'),
(4, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(5, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(7, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, ''),
(8, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cepage`
--

CREATE TABLE IF NOT EXISTS `cepage` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `surface` float NOT NULL,
  `annee` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cepage`
--

INSERT INTO `cepage` (`id`, `nom`, `surface`, `annee`) VALUES
(1, 'ALIGOTE B', 1.929, 2006);

-- --------------------------------------------------------

--
-- Table structure for table `emplacement`
--

CREATE TABLE IF NOT EXISTS `emplacement` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `tailleX` int(20) NOT NULL,
  `tailleY` int(20) NOT NULL,
  `lieu` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `emplacement`
--

INSERT INTO `emplacement` (`id`, `nom`, `tailleX`, `tailleY`, `lieu`) VALUES
(1, 'Cube 1', 7, 7, 1),
(2, 'Cube 2', 7, 5, 1),
(3, 'Cube 3', 3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lieu`
--

INSERT INTO `lieu` (`id`, `nom`, `description`) VALUES
(1, 'Garage', 'Garage - Au fond à droite'),
(2, 'Salon', 'Salon - Première partie à gauche en rentrant.');

-- --------------------------------------------------------

--
-- Table structure for table `millenisme`
--

CREATE TABLE IF NOT EXISTS `millenisme` (
  `date` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `millenisme`
--

INSERT INTO `millenisme` (`date`) VALUES
(2010),
(2011);

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE IF NOT EXISTS `qrcode` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `qrcode` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region`) VALUES
(1, 'Champagne-Ardennes'),
(2, 'Bordeaux');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'Rouge'),
(2, 'Blanc'),
(3, 'Rosé'),
(4, 'Mousseux');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
