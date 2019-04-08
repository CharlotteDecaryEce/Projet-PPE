-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 08 avr. 2019 à 13:19
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `defis`
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
-- Déchargement des données de la table `defis`
--

INSERT INTO `defis` (`id`, `nom`, `resume`, `competences_acquises`, `duree`) VALUES
(1, 'Bienvenu!', 'Comme tu le sais, une entreprise est faite d\'allers et venues. Pour inclure tout le monde et faire en sorte que l\'ambiance de travail soit la plus seine possible, tu as deux semaines pour déjeuner avec un collègue qui est l\'entreprise depuis moins de 6 mois. Il se sentira valorisé et ce déjeuner sera l\'occasion pour vous deux de mieux vous connaitre.', 'Disponibilite', 10),
(3, 'Bien joué!', 'Savoir relever les points positifs de son équipe et valoriser leur travail est une force et une grande source de motivation pour avancer. C\'est pourquoi, tu dois, lors de la prochaine réunion que tu animes, pendant les 10-15 premières minutes, énumérer l\'ensemble des bons points. Ceux qui ont permis de conclure un contrat, faire avancer une négociation, une progression significative dans un projet et bien d\'autres. Tous points positifs et valorisants le travail des autres est bon à être dit haut et fort! ', 'Motivation', 10),
(4, 'Let\'s go out ', 'Pourquoi se cantonner à ses collègues de travail au travail? Rien de mieux que vous connaître sous un autre angle et dans un autre atmosphère que celui des locaux de travail. Une bonne ambiance et une relation sincère en dehors du lieu de travail est un grand facteur de réussite dans vos objectifs professionnels. Tu as 1 mois pour organiser une activité extérieure avec minimum 15 de tes collègues. Pour t\'aider tu trouveras ici quelques idées: afterwork dans un bar, escape game, cours de cuisine, cours d\'improvisation théatrale... ', 'Sociabilite', 20);

-- --------------------------------------------------------

--
-- Structure de la table `informations`
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
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `likes_recus`, `likes_distrib`, `defis_realises`, `defis_en_cours`, `entreprise`, `equipe`, `type`, `prenom`, `nom`, `competences`, `photo`, `username`, `password`, `competences_acquises`) VALUES
(19, 0, 0, '', 0, 'ECE', 1, 'utilisateur', 'Emmanuelle', 'Thiroloix', 'Confiance,Empathie,Communication,Creativite,Audace,Motivation,Visualisation,Présence,Curiosite', 'user.png', 'manouel', 'manouel', ''),
(20, 0, 30, '', 0, 'ECE', 1, 'manager', 'Charlotte', 'Decary', 'Sociabilite', 'charlotte_decary.png', 'chacha', 'chacha', '');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
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
-- Structure de la table `relations`
--

DROP TABLE IF EXISTS `relations`;
CREATE TABLE IF NOT EXISTS `relations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_1` int(10) NOT NULL,
  `id_2` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `relations`
--

INSERT INTO `relations` (`id`, `id_1`, `id_2`) VALUES
(1, 7, 9),
(2, 7, 12),
(3, 7, 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
