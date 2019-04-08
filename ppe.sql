-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2019 at 03:25 PM
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
  `duree` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defis`
--

INSERT INTO `defis` (`id`, `nom`, `resume`, `competences_acquises`, `duree`) VALUES
(1, 'Bienvenu!', 'Comme tu le sais, une entreprise est faite d\'allers et venues. Pour inclure tout le monde et faire en sorte que l\'ambiance de travail soit la plus seine possible, tu as deux semaines pour déjeuner avec un collègue qui est l\'entreprise depuis moins de 6 mois. Il se sentira valorisé et ce déjeuner sera l\'occasion pour vous deux de mieux vous connaitre.', 'Disponibilite', 10),
(2, 'Bien joue!', 'Savoir relever les points positifs de son équipe et valoriser leur travail est une force et une grande source de motivation pour avancer. C\'est pourquoi, tu dois, lors de la prochaine réunion que tu animes, pendant les 10-15 premières minutes, énumérer l\'ensemble des bons points. Ceux qui ont permis de conclure un contrat, faire avancer une négociation, une progression significative dans un projet et bien d\'autres. Tous points positifs et valorisants le travail des autres est bon à être dit haut et fort! ', 'Motivation', 10),
(3, 'Let\'s go out ', 'Pourquoi se cantonner à ses collègues de travail au travail? Rien de mieux que vous connaître sous un autre angle et dans un autre atmosphère que celui des locaux de travail. Une bonne ambiance et une relation sincère en dehors du lieu de travail est un grand facteur de réussite dans vos objectifs professionnels. Tu as 1 mois pour organiser une activité extérieure avec minimum 15 de tes collègues. Pour t\'aider tu trouveras ici quelques idées: afterwork dans un bar, escape game, cours de cuisine, cours d\'improvisation théatrale... ', 'Sociabilite', 20);

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `likes_recus` int(11) NOT NULL,
  `likes_distrib` int(11) NOT NULL DEFAULT '0',
  `defis_realises` varchar(255) NOT NULL,
  `defis_en_cours` varchar(255) NOT NULL,
  `entreprise` text NOT NULL,
  `equipe` int(11) NOT NULL,
  `type` set('employe','administrateur','manager') NOT NULL,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `competences` varchar(255) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'user.png',
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `competences_acquises` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `likes_recus`, `likes_distrib`, `defis_realises`, `defis_en_cours`, `entreprise`, `equipe`, `type`, `prenom`, `nom`, `competences`, `photo`, `username`, `password`, `competences_acquises`) VALUES
(19, 12, 0, '3,2,1', '', 'ECE', 1, 'employe', 'Emmanuelle', 'Thiroloix', 'Adaptabilite', 'user.png', 'manouel', 'manouel', 'Disponibilite,Sociabilite,Disponibilite'),
(20, 0, 30, '', '', 'ECE', 1, 'manager', 'Charlotte', 'Decary', 'Sociabilite', 'charlotte_decary.png', 'chacha', 'chacha', '');

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
