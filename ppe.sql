-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2019 at 01:05 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppe`
--

-- --------------------------------------------------------

--
-- Table structure for table `defis`
--

DROP TABLE IF EXISTS `defis`;
CREATE TABLE IF NOT EXISTS `defis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `resume` longtext NOT NULL,
  `competences_acquises` set('Optimisme','Confiance','Sociabilite','Empathie','Communication','Efficacite','Gestion_du_stress','Creativite','Audace','Motivation','Visualisation','Présence','Adaptabilite','Curiosite','Disponibilite') NOT NULL,
  `duree` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `likes_recus` int(11) NOT NULL,
  `likes_distrib` int(11) NOT NULL,
  `defis_realises` set('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30') NOT NULL,
  `defis_en_cours` int(11) NOT NULL,
  `entreprise` text NOT NULL,
  `equipe` int(11) NOT NULL,
  `type` set('utilisateur','administrateur','manager') NOT NULL,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `competences` set('Optimisme','Confiance','Sociabilite','Empathie','Communication','Efficacite','Gestion_du_stress','Creativite','Audace','Motivation','Visualisation','Présence','Adaptabilite','Curiosite','Disponibilite') NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'user.png',
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `competences_acquises` set('Optimisme','Confiance','Sociabilite','Empathie','Communication','Efficacite','Gestion_du_stress','Creativite','Audace','Motivation','Visualisation','Présence','Adaptabilite','Curiosite','Disponibilite') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `likes_recus`, `likes_distrib`, `defis_realises`, `defis_en_cours`, `entreprise`, `equipe`, `type`, `prenom`, `nom`, `competences`, `photo`, `username`, `password`, `competences_acquises`) VALUES
(19, 0, 0, '', 0, 'ECE', 1, 'utilisateur', 'Emmanuelle', 'Thiroloix', 'Confiance,Empathie,Communication,Creativite,Audace,Motivation,Visualisation,Présence,Curiosite', 'user.png', 'manouel', 'manouel', ''),
(20, 0, 30, '', 0, 'ECE', 1, 'manager', 'Charlotte', 'Decary', 'Sociabilite', 'charlotte_decary.png', 'chacha', 'chacha', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `texte` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL,
  `type` enum('Ajout','Emploi') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
CREATE TABLE IF NOT EXISTS `relations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_1` int(10) NOT NULL,
  `id_2` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `id_1`, `id_2`) VALUES
(1, 7, 9),
(2, 7, 12),
(3, 7, 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
