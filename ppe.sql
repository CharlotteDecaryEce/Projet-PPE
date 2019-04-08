-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2019 at 10:09 AM
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
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` datetime(6) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `id_post` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `intitule` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `avantages` varchar(255) NOT NULL,
  `salaire` varchar(255) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `langues` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `diplome` varchar(255) NOT NULL,
  `qualites` varchar(255) NOT NULL,
  `exigences` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emploi`
--

INSERT INTO `emploi` (`intitule`, `type`, `avantages`, `salaire`, `secteur`, `langues`, `lieu`, `diplome`, `qualites`, `exigences`, `id`) VALUES
('Vendeur', 'CDD', 'Tickets restaurant', '10euros de l\'heure', 'Vente', 'Francais, anglais', 'Paris', 'Pas de diplome requis', 'Sociable, aimable', 'Non', 1),
('Responsable des ventes', 'CDD', 'Tickets restaurant et remboursement pass navigo', '10euros de l\'heure', 'Vente', 'Francais, anglais', 'Paris', 'Pas de diplome requis', 'Sociable, aimable', 'Non', 2),
('Freelance content researcher', 'Stage', 'Club de sport', '80 a 100 euros par mois', 'Formation', 'Anglais, Espagnol, Francais', 'Paris', 'Grandes Ecoles', 'Passioné de culture, maitrise des langues', 'Non', 3),
('Recruteur de donateur', 'CDI', 'remboursement titre de transport', '13euros de lheure', 'Prospection', 'Francais', 'Paris', 'Pas de diplome requis', 'Esprit equipe', 'Non', 4),
('Office manager', 'CDD Temps plein', 'Tickets restaurant', '15000 a 20000 par an', 'Administration', 'Anglais, Francais', 'Paris', 'BTS', 'Expérience office manager', 'Bilingue', 5),
('Startup objets connectés', 'Stage', 'Remboursement titre de transport', 'Pas payé', 'Ingénierie', 'Anglais, Francais', 'Paris', 'Grandes ecoles ingénieurs', 'Expérience', 'Motivé', 6),
('', '', '', '', '', '', '', '', '', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `poste` varchar(30) NOT NULL,
  `entreprise` varchar(30) NOT NULL,
  `lieu` varchar(30) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`poste`, `entreprise`, `lieu`, `date_debut`, `date_fin`, `description`, `id`, `username`) VALUES
('Stage', 'Mobil\'Affiche', 'Paris', '2012-05-08', '2012-06-10', 'Stage', 1, 'lele'),
('Stage', 'BHV Marais', 'Paris', '2016-01-08', '2016-03-06', 'Stage de vente', 2, 'lele'),
('Secretaire GÃ©nÃ©rale', 'BDE Lutece', 'Paris', '2018-04-01', '2019-04-01', 'Gestion du bde ECE paris', 3, 'manouel'),
('Developpeur', 'Crystal-Societe d\'avocats', 'Paris 16', '2017-03-05', '2017-06-16', 'Developpement d\'un site web', 4, 'manouel'),
('Stage', 'GreenFlex', 'Paris', '2017-10-01', '2017-12-28', 'Stage', 5, 'chachou'),
('Stage', 'Unilever Food Solutions', 'Londres', '2017-12-05', '2018-02-06', 'Stage a l\'etranger', 6, 'chachou'),
('', '', '', '0000-00-00', '0000-00-00', '', 7, 'chachou');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ecole` varchar(20) NOT NULL,
  `diplome` enum('Master-1','Master-2','Licence','Bac','Bac+1','Bac+2','Bac+3','Bac+4','Bac+5') NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `associations` set('BDE','BDS','Caves','Yacht','BDA','AEIP','FEDE','SDI','NOISE','JOBSERVICE','ENTREPRINE','MUSIQUE') NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `description` text NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `ecole`, `diplome`, `domaine`, `associations`, `date_debut`, `date_fin`, `description`, `username`) VALUES
(2, 'Ieseg', 'Master-1', 'Commerce', 'AEIP,FEDE,MUSIQUE', '2018-05-10', '2018-05-15', 'Yolo', 'chachou'),
(4, 'DCU', 'Master-1', 'Ingenerie', 'BDE,Caves,Yacht,BDA,FEDE', '2018-05-18', '2018-05-24', 'salut ca va', 'lele'),
(5, 'ECE', 'Master-1', 'Ingenieur', 'BDE,BDS,Caves,Yacht,BDA', '2018-05-12', '2018-05-23', '', 'manouel'),
(6, 'sqde', 'Bac+2', 'da', 'BDS', '2233-03-23', '2233-03-23', 'sefezf', 'chachou'),
(7, 'ECE PARIS', 'Master-1', 'Commerce', 'BDE', '2015-01-01', '2018-05-02', '', 'manouel'),
(8, 'DCU', 'Bac+3', 'Ingenerie', 'Caves', '2017-09-08', '2018-02-22', 'Super Ã©change Ã  l\'Ã©tranger', 'manouel');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone` text NOT NULL,
  `sexe` enum('M','F') NOT NULL,
  `promo` enum('ING1','ING2','ING3','ING4','ING5','ING6','Autre') NOT NULL,
  `pays` enum('France','Angleterre','Irlande','Espagne') NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `profession` enum('Etudiant(e) Licence','Etudiant(e) Master','Etudiant(e) Apprenti','Etudiant(e) en cherche d''un Stage','Enseignant','Employé de l''école') NOT NULL,
  `type` enum('auteur','administrateur') NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'user.png',
  `image_fond` varchar(100) NOT NULL,
  `competences` set('Resolution de problemes','Confiance','Intelligence Emotionelle','Empathie','Communication','Gestion du temps','Gestion du stress','Creativite','Esprit d entreprendre','Audace','Motivation','Visualisation','Présence','Sens du collectif','Curiosite') NOT NULL,
  `interets` set('Ingénérie','Animaux','Sport','Musique','Cuisine','Jardinage','Médecine','Astro-physique','Mode','Voyage','Dessin','Peinture','Sculpture','Astrologie','Jeux vidéo','Cinéma','Réseaux sociaux','Architechture') NOT NULL,
  `resume` longtext NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reset_token` varchar(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`nom`, `prenom`, `date_naissance`, `telephone`, `sexe`, `promo`, `pays`, `cp`, `adresse`, `profession`, `type`, `photo`, `image_fond`, `competences`, `interets`, `resume`, `email`, `password`, `username`, `id`, `reset_token`, `reset_at`, `remember_token`, `admin`, `ville`) VALUES
('Thiroloix', 'Emmanuelle', '2018-06-06', '0676916066', 'F', 'ING4', 'France', 92300, '12 rue edouard vaillant', 'Etudiant(e) Licence', 'administrateur', 'user.png', '', 'Confiance,Empathie', '', '', '', 'manouel', 'manouel', 19, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_post` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mp_expediteur` int(11) NOT NULL,
  `mp_receveur` int(11) NOT NULL,
  `mp_titre` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_text` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_time` int(11) NOT NULL,
  `mp_lu` enum('0','1') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `partages`
--

DROP TABLE IF EXISTS `partages`;
CREATE TABLE IF NOT EXISTS `partages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `membre_id` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `heure` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `membre_id` (`membre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `membre_id` int(10) NOT NULL,
  `id_experience` int(10) NOT NULL,
  `id_formation` int(10) NOT NULL,
  `id_partage` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_emploi` int(11) NOT NULL,
  `id_commentaire` int(10) NOT NULL,
  `id_notification` int(10) NOT NULL,
  PRIMARY KEY (`membre_id`,`id_experience`,`id_formation`),
  KEY `membre_id` (`membre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `membre_id` int(10) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `heure` datetime(6) NOT NULL,
  `sentiment` varchar(200) NOT NULL,
  `fichier` varchar(255) NOT NULL COMMENT 'liens des images ou videos que l''utilisateur souhaite partager ',
  `lieu` varchar(100) NOT NULL,
  `username` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `membre_id`, `texte`, `heure`, `sentiment`, `fichier`, `lieu`, `username`) VALUES
(1, 9, 'Je recherche actuellement un poste dans le domaine du numérique', '0000-00-00 00:00:00.000000', 'Humeur', '', 'Paris', 'chachou'),
(2, 11, 'J\'ai décroche un job!!!', '0000-00-00 00:00:00.000000', 'Fatigué(e)', '', 'Versailles', 'manouel'),
(3, 14, 'Je suis en recherche d\'un stage de 6 mois dans le domaine de l\'intelligence artificielle', '0000-00-00 00:00:00.000000', 'Humeur', '', 'Paris', 'diego'),
(8, 0, 'Bonjour je suis Emmanuelle', '0000-00-00 00:00:00.000000', 'Humeur', '', '', ''),
(9, 0, 'Smoothie elle est trop belle', '2018-05-05 00:00:00.000000', 'Fier(e)', 'smoothie.JPG', 'Chez manouel', ''),
(10, 0, 'Chacha t\'es hyper moche sur cette photo', '0000-00-00 00:00:00.000000', 'MotivÃ©(e)', 'charlotte_decary.jpg', 'Smoothie', '');

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
