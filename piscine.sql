-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 05 Mai 2018 à 23:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` datetime(6) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `id_post` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `emploi`
--

INSERT INTO `emploi` (`intitule`, `type`, `avantages`, `salaire`, `secteur`, `langues`, `lieu`, `diplome`, `qualites`, `exigences`, `id`) VALUES
('Vendeur', 'CDD', 'Tickets restaurant', '10euros de l''heure', 'Vente', 'Francais, anglais', 'Paris', 'Pas de diplome requis', 'Sociable, aimable', 'Non', 1),
('Responsable des ventes', 'CDD', 'Tickets restaurant et remboursement pass navigo', '10euros de l''heure', 'Vente', 'Francais, anglais', 'Paris', 'Pas de diplome requis', 'Sociable, aimable', 'Non', 2),
('Freelance content researcher', 'Stage', 'Club de sport', '80 a 100 euros par mois', 'Formation', 'Anglais, Espagnol, Francais', 'Paris', 'Grandes Ecoles', 'Passioné de culture, maitrise des langues', 'Non', 3),
('Recruteur de donateur', 'CDI', 'remboursement titre de transport', '13euros de lheure', 'Prospection', 'Francais', 'Paris', 'Pas de diplome requis', 'Esprit equipe', 'Non', 4),
('Office manager', 'CDD Temps plein', 'Tickets restaurant', '15000 a 20000 par an', 'Administration', 'Anglais, Francais', 'Paris', 'BTS', 'Expérience office manager', 'Bilingue', 5),
('Startup objets connectés', 'Stage', 'Remboursement titre de transport', 'Pas payé', 'Ingénierie', 'Anglais, Francais', 'Paris', 'Grandes ecoles ingénieurs', 'Expérience', 'Motivé', 6),
('', '', '', '', '', '', '', '', '', '', 7);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `experience`
--

INSERT INTO `experience` (`poste`, `entreprise`, `lieu`, `date_debut`, `date_fin`, `description`, `id`, `username`) VALUES
('Stage', 'Mobil''Affiche', 'Paris', '2012-05-08', '2012-06-10', 'Stage', 1, 'lele'),
('Stage', 'BHV Marais', 'Paris', '2016-01-08', '2016-03-06', 'Stage de vente', 2, 'lele'),
('Secretaire GÃ©nÃ©rale', 'BDE Lutece', 'Paris', '2018-04-01', '2019-04-01', 'Gestion du bde ECE paris', 3, 'manouel'),
('Developpeur', 'Crystal-Societe d''avocats', 'Paris 16', '2017-03-05', '2017-06-16', 'Developpement d''un site web', 4, 'manouel'),
('Stage', 'GreenFlex', 'Paris', '2017-10-01', '2017-12-28', 'Stage', 5, 'chachou'),
('Stage', 'Unilever Food Solutions', 'Londres', '2017-12-05', '2018-02-06', 'Stage a l''etranger', 6, 'chachou'),
('', '', '', '0000-00-00', '0000-00-00', '', 7, 'chachou');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id`, `ecole`, `diplome`, `domaine`, `associations`, `date_debut`, `date_fin`, `description`, `username`) VALUES
(2, 'Ieseg', 'Master-1', 'Commerce', 'AEIP,FEDE,MUSIQUE', '2018-05-10', '2018-05-15', 'Yolo', 'chachou'),
(4, 'DCU', 'Master-1', 'Ingenerie', 'BDE,Caves,Yacht,BDA,FEDE', '2018-05-18', '2018-05-24', 'salut ca va', 'lele'),
(5, 'ECE', 'Master-1', 'Ingenieur', 'BDE,BDS,Caves,Yacht,BDA', '2018-05-12', '2018-05-23', '', 'manouel'),
(6, 'sqde', 'Bac+2', 'da', 'BDS', '2233-03-23', '2233-03-23', 'sefezf', 'chachou'),
(7, 'ECE PARIS', 'Master-1', 'Commerce', 'BDE', '2015-01-01', '2018-05-02', '', 'manouel'),
(8, 'DCU', 'Bac+3', 'Ingenerie', 'Caves', '2017-09-08', '2018-02-22', 'Super Ã©change Ã  l''Ã©tranger', 'manouel');

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

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
  `competences` set('Pack Office','C','C++','Java','HTML/CSS','Espagnol','Anglais','Allemand','Matlab','Gestion de projet','Analyse financière','Design Thinking','Prototypage','Big Data','BlockChain','Entreprenariat','SQL','Leadership','Linux','Web Design','WordPress','Applications mobiles') NOT NULL,
  `interets` set('Ingénérie','Animaux','Sport','Musique','Voyage','Cuisine','Jardinage','Médecine','Astro-physique','Mode','Voyage','Dessin','Peinture','Sculpture','Astrologie','Jeux vidéo','Cinéma','Réseaux sociaux','Architechture') NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `informations`
--

INSERT INTO `informations` (`nom`, `prenom`, `date_naissance`, `telephone`, `sexe`, `promo`, `pays`, `cp`, `adresse`, `profession`, `type`, `photo`, `image_fond`, `competences`, `interets`, `resume`, `email`, `password`, `username`, `id`, `reset_token`, `reset_at`, `remember_token`, `admin`, `ville`) VALUES
('Thiroloix', 'Emmanuelle', '1996-11-07', '0676916066', 'F', 'ING1', 'France', 92300, '12 rue Edouard Vaillant', 'Etudiant(e) Licence', 'administrateur', 'emmanuelle.jpg', '', 'C,C++,HTML/CSS,SQL,Leadership,Linux', '', 'bonjour je suis emmanuelle j''aime smoothie plusque tout et ca me saoule ce projet', 'emmanuelle.thiroloix@gmail.com', '10012012', 'manouel', 7, NULL, NULL, 'IUONr0poT9vbpTkzeqMW9i5gbHd4ZYHZTfQ9v6TSKFIzKXXaZ0NjwvQAvISIZgnkVBAuuPXZKeDEDTGxAuEyChfkgiGtZFSlVNGxthtqgNzFF46h3cH69Jbf0yQov8RYQE1MGVbmV3AyDnbcLp1ev23mfkQo1WHa98FgYni6jjJWxfnp2fWIURtWMitkfoZ1cF1zsfRUsnV6zpviK9w86WrZGENmZ4rahAvKHN6MxY63x1CHBxB9al0DjV', NULL, 'Levallois'),
('Blanchard', 'Lea', '1997-05-10', '0672219012', 'F', 'ING3', 'France', 75015, '26 rue desnouettes', 'Etudiant(e) Licence', 'administrateur', 'lea_blanchard.jpg', '', 'C,C++,Java,HTML/CSS,Espagnol,Anglais,Matlab,SQL,WordPress', 'Ingénérie,Sport,Voyage,Astrologie', '', 'lea10.blanchard@gmail.com', 'lele', 'lele', 9, NULL, NULL, NULL, NULL, 'PARIS'),
('Decary ', 'Charlotte', '1997-05-02', '07 88 98 77 66', 'F', 'ING5', 'France', 75116, '11 rue de sontay', 'Etudiant(e) Master', 'administrateur', 'charlotte_decary.jpeg', '', 'Analyse financière,Design Thinking,Prototypage,Big Data', 'Voyage,Mode,Dessin', '', 'charlotte.decary@edu.ece.fr', 'charlotte', 'chacha', 10, NULL, NULL, NULL, NULL, 'Paris'),
('Belland', 'Eugenie', '1996-12-07', '', 'F', 'ING3', 'France', 75015, '24 avenue de Suffren', 'Etudiant(e) Master', 'auteur', 'user.png', '', 'C++,Java,HTML/CSS,Espagnol,Anglais', 'Ingénérie,Animaux,Sport,Musique', '', 'eugenie.belland@edu.ece.fr', 'eugenie', 'gege', 11, NULL, NULL, NULL, NULL, 'Paris'),
('Halbeher', 'Clement', '1996-01-13', '', 'M', 'ING3', 'France', 78000, '98 avenue de la foret', 'Etudiant(e) Master', 'auteur', 'niebeu.png', '', 'Web Design,Applications mobiles', 'Musique,Jardinage,Médecine', '', 'clement.halbeher@edu.ece.fr', 'clement', '', 12, NULL, NULL, NULL, NULL, 'Paris'),
('Fremez', 'Clarisse', '1997-11-07', '', 'F', 'ING3', 'France', 92000, 'Avenue jean bouin', 'Etudiant(e) Master', 'auteur', 'user.png', '', 'Linux,Web Design', 'Jeux vidéo,Cinéma,Réseaux sociaux', '', 'clarisse.fremez@edu.ece.fr', 'clarisse', 'clarisse', 13, NULL, NULL, NULL, NULL, 'Paris'),
('Bazin', 'Diego', '1997-05-01', '', 'M', 'ING3', 'France', 92000, 'rue de la mouette', 'Etudiant(e) Master', 'auteur', 'user.png', '', 'Design Thinking,Big Data,Web Design', 'Ingénérie,Animaux,Musique', '', 'diego.bazin@edu.ece.fr', 'diego', 'diego', 14, NULL, NULL, NULL, NULL, 'Paris'),
('Rouaix', 'Alienor', '1997-02-19', '', 'F', 'ING3', 'France', 75016, 'avenue wagram', 'Etudiant(e) Master', 'auteur', 'user.png', '', 'Pack Office,C,C++,Java,HTML/CSS,Espagnol,Anglais,Allemand,Matlab,Gestion de projet,Analyse financière,Design Thinking,Prototypage,Big Data,BlockChain,Entreprenariat,SQL,Leadership,Linux', 'Animaux', '', 'alienor.rouaix@edu.ece.fr', 'alienor', 'alienor', 15, NULL, NULL, NULL, NULL, 'Paris'),
('Dubesset', 'Hugo', '1997-08-03', '', 'M', 'ING3', 'France', 92000, 'rue rue', 'Etudiant(e) Master', 'auteur', 'user.png', '', 'Web Design', 'Animaux', '', 'hugo.dubesset@edu.ece.fr', 'hugo', 'hugo', 16, NULL, NULL, NULL, NULL, 'Paris'),
('Balle Lebert', 'Pichot ', '2000-10-01', '', 'M', 'ING1', 'France', 92000, 'avenue des coteaux', 'Etudiant(e) Licence', 'auteur', 'user.png', '', 'Java', 'Cinéma', '', 'pichot.balle-lebert@edu.ece.fr', 'pichot', 'pichot', 17, NULL, NULL, NULL, NULL, 'Rueil'),
('Stadler', 'Raphael', '1997-06-23', '', 'M', 'ING3', 'France', 75015, '13 rue de lourmel', 'Etudiant(e) Master', 'auteur', 'user.png', '', 'C++,Java', 'Ingénérie,Animaux,Sport,Musique', '', 'raphael.stadler@edu.ece.fr', 'raphael', 'raphael', 18, NULL, NULL, NULL, NULL, 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_post` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mp_expediteur` int(11) NOT NULL,
  `mp_receveur` int(11) NOT NULL,
  `mp_titre` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_text` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_time` int(11) NOT NULL,
  `mp_lu` enum('0','1') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `texte` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL,
  `type` enum('Ajout','Emploi') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `partages`
--

CREATE TABLE IF NOT EXISTS `partages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `membre_id` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `heure` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `membre_id` (`membre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

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
-- Structure de la table `posts`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `membre_id`, `texte`, `heure`, `sentiment`, `fichier`, `lieu`, `username`) VALUES
(1, 9, 'Je recherche actuellement un poste dans le domaine du numérique', '0000-00-00 00:00:00.000000', 'Humeur', '', 'Paris', 'chachou'),
(2, 11, 'J''ai décroche un job!!!', '0000-00-00 00:00:00.000000', 'Fatigué(e)', '', 'Versailles', 'manouel'),
(3, 14, 'Je suis en recherche d''un stage de 6 mois dans le domaine de l''intelligence artificielle', '0000-00-00 00:00:00.000000', 'Humeur', '', 'Paris', 'diego'),
(8, 0, 'Bonjour je suis Emmanuelle', '0000-00-00 00:00:00.000000', 'Humeur', '', '', ''),
(9, 0, 'Smoothie elle est trop belle', '2018-05-05 00:00:00.000000', 'Fier(e)', 'smoothie.JPG', 'Chez manouel', ''),
(10, 0, 'Chacha t''es hyper moche sur cette photo', '0000-00-00 00:00:00.000000', 'MotivÃ©(e)', 'charlotte_decary.jpg', 'Smoothie', '');

-- --------------------------------------------------------

--
-- Structure de la table `relations`
--

CREATE TABLE IF NOT EXISTS `relations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_1` int(10) NOT NULL,
  `id_2` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `relations`
--

INSERT INTO `relations` (`id`, `id_1`, `id_2`) VALUES
(1, 7, 9),
(2, 7, 12),
(3, 7, 13);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
