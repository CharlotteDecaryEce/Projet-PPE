-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 10 avr. 2019 à 13:52
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `PPE`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `importance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `defis`
--

CREATE TABLE `defis` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `resume` longtext NOT NULL,
  `competences_acquises` set('Optimisme','Confiance','Sociabilite','Empathie','Communication','Efficacite','Gestion_du_stress','Creativite','Audace','Motivation','Visualisation','Présence','Adaptabilite','Curiosite','Disponibilite') NOT NULL,
  `duree` int(11) NOT NULL,
  `importance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `defis`
--

INSERT INTO `defis` (`id`, `nom`, `resume`, `competences_acquises`, `duree`, `importance`) VALUES
(1, 'Bienvenu!', 'Comme tu le sais, une entreprie est faite d\'allers et venues. Pour inclure tout le monde et faire en sorte que l\'ambiance de travail soit la plus seine possible, tu as deux semaines pour dejeuner avec un collegue qui est l\'entreprise depuis moins de 6 mois. Il se sentira valorise et ce dejeuner sera l\'occasion pour vous deux de mieux vous connaitre.', 'Disponibilite', 10, 2),
(2, 'Bien joue!', 'Savoir relever les points positifs de son equipe et valoriser leur travail est une force et une grande source de motivaiton pour avancer. C\'est pourquoi, tu dois, lors de la prochaine reunion que tu animes, pendant les 10-15 premieres minutes, enumerer l\'ensemble des bons points. Ceux qui ont permi de conclure un contrat, faire avancer une negociaiton, une progrssion significative dans un projet et bien d\'autres. Tous points positifs et valorisants le travail des autres est bon a etre dit haut et fort! ', 'Motivation', 10, 1),
(3, 'Let\'s go out ', 'Pourquoi se cantoner à ses collegues de travail au travail? Rien de mieux que vous connaitre sous un autre angle et dans un autre atmosphere que celui des locaux de travail. Une bonne ambiance et une relation sincere en dehors du lieu de travail est un grand facteur de reussite dans vos objectifs professionells. Tu as 1 mois pour organiser une activie exterieure avec minimum 15 de tes collegues. Pour t\'aider tu trouveras ici quelques idees: afterwork dans un bar, escape game, cours de cuisine, cours d\'improvisation théatrale... ', 'Sociabilite', 20, 3),
(4, 'Soyez fier de votre entreprise!', 'Montre nous a quel point tu es fier de travailler chez nous et clame le haut et fort. Comme tu le sais, nous participons a de nombreux evenements sportifs, carritatifs... Pendant les 6 prochains mois fais valoir les valeurs de l\'entreprise au grand public en prenant part au depart d\'un marathon dont nous sommes partenaires, en consacrant du temps aux enfants des associaitons que nous soutenons... Libre a toi de participer aux differentes actions, il t\'en faut une! ', 'Communication', 180, 7),
(5, 'Travaillez sur vous!', 'Vous êtes paralysés par le stress? Il vous angoisse? Vous handicape? Ce Défis est fait pour vous! Quand vous le commencez, vous vous engangez sur deux semaines à faire l\'ensemble des étapes suivantes, les effet seront immédiats. A partir de ce soir, vous vous endormez à maximum 23H. C\'est l\'heure à laquelle vous devez avoir éteint votre téléphone et tout objets qui peut parasiter votre endormissement et votre sommeil. Venez 15 minute plus tôt au travail que votre horraire habituel, elles seront précieuses, croyez Inuit. Profitez en pour organiser votre journée, ranger votre bureau et anticipier aux mieux les échéances de la journée. Faites une pause de 15minutes entre 10H45 et 11H15 et une autre entre 16H et 16H30. Tout au long de la journée, respirez, prenez du recul. Prêt - feux - Partez!', 'Gestion_du_stress', 10, 4),
(6, 'Be the boss', 'Vous ne voyez pas le bout du tunnel, regarder en arrière le vendredi soir et avoir la sensation de ne pas avoir fait tout ce que vous deviez accomplir... Suivez Inuit! Commencez par faire le challenge \"Travaillez sur vous\" avant celui la! Sur cette lancée, continuez! Comment produire plus? Lisez, beaucoup, vraiment beaucoup! En commenant par \"Six thinking hats\" de Edward de bono, priorisez vos tâches, fixez vous des échéances personelles, sachez dire non et surtout, prenez de l\'avance, anticipez! Suivez ces 5 conseils et partagez avec Inuit vos exploits!', 'Efficacite', 15, 5),
(7, 'Think out of the box...', 'Attention, defis tres court! Planifiez des maintenant une réunion avec votre equipe dans un mois pour vous leur presenter votre - vos idees! Durant le mois qui va suivre, impresionnez votre equipe! Trouvez un nouveau produit, une nouvelle strategie marketing, un super outil de communication, un nouveau packaging ou.. libre a vous de creer ce que vous voulez! Emerveillez vous, soyez a l\'affut des nouveautees, de ce qui se fait dans les autres secteurs, regardez autour de vous, dehors, chez vous, au supermarche.. le temps tourne et le rendez vous est prit avec vote equipe! Faites savoir a Inuit vos idees et les reactions de vos collegues!', 'Creativite', 20, 9),
(8, 'Toujours plus haut, toujours plus loin, toujours plus fort!', 'Prenez part à une initiative de votre entreprise sans se soucier du regard des autres, n\'ayez pas peur de bien faire, soyez sur de vous! Osez faire, posez des questions! Relativiser l’échec possible. Imaginer la conséquence la pire, et se rendre compte que ce n’est pas si grave! Saisissez les opportuniés qui vous sont proposées! Positivez, ayez le sourire, voyagez, partagez vos expériences et impactez votre manière de travailler positivement!', 'Audace', 5, 10),
(9, 'Think it, Post it, Read it!', 'Ecrire sur des post it chaque vendredi 4 choses\r\npositives qui sont arrivees cette semaine! \r\nPetit sourire assure le Lundi \r\na votre retour au travail!', 'Optimisme', 20, 8),
(10, 'Yes you can!', 'Decouvrez comment avoir confiance en vous en laissant les autres travailler... Le FEEDBACK! Prenez l\'habitude de demandez un retour a vos interlocuteurs lorsque vous faites une reeunion, un rendez vous, rendez un projet, un rapport, a la suite d\'un appel telephonique.. vous verez que vous etes tres bon, et l\'entendre... ca fait du bien! Relativisez, collectez les likes sur Inuit, gardez une bonne cadence de defis releves et peu à peu, vous serez confiant tel David face a Goliath!', 'Confiance', 10, 6),
(11, 'On garde la peche !', 'Prenez un fruit que vous posez devant vous.\r\nPensez à une peche parfaitement mûre. \r\nLa couleur, la forme, la dimension … \r\nPrenez votre temps pour bien integrer \r\nces elements. \r\nObservez cette peche dans chaque détail. \r\nDe quelle couleur est-elle ? \r\nQuel est son parfum ? \r\nQue gout a-t-elle ? Est-elle juteuse?  \r\nGoutez-la et appreciez sa saveur.\r\nPuis, fermez les yeux et detendez-vous ! \r\nRememorez-vous le fruit \r\nen commencant par la pensee. \r\nNe forcez pas ! Essayez de vous rappeler !', 'Visualisation', 20, 11),
(12, 'Free time!', 'Soyez clair et organise, n\'oubliez pas que votre journée sera principalement faite d\'imprevus! Sachez etre disponible et laxiste. Soyez ouvert d\'esprit et acceptez d\'aider un collegue, de lui donner du temps, d\'accueillir les nouveaux de la meilleure manière qu\'il soit! Etre disponible est une grande force au travail! Prouvez que vous en etes capable! C\'est une grande force que vous etes entrain d\'acquerir... Merci Inuit', 'Disponibilite', 10, 1),
(13, 'Cofee time', 'C\'est votre tournee! Vous avez une semaine pour, lors d\'une pause avec votre équipe, embarquer tout le monde pour prendre un cafe (offert par vous si c\'est payant)! Quoi de mieux qu\'une bonne pause cafe avec toute l\'equipe... Poroftez en pour ne pas forcement parler boulot mais vie quotidienne, prochaine vacances ou dire du mal de votre boss!', 'Sociabilite', 5, 3),
(14, 'Un pour tous, tous pour un!', 'La motivation s\'inscrit dans un cercle de mobilisation! Soyez mobilisé, concentré et mettez toutes votre énergie au service de l\'équipe! Discutez avec chacun des objectifs a atteindre et FONCEZ!', 'Motivation', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

CREATE TABLE `informations` (
  `id` int(10) NOT NULL,
  `likes_recus` int(11) NOT NULL,
  `likes_distrib` int(11) NOT NULL DEFAULT '0',
  `defis_realises` varchar(255) NOT NULL,
  `defis_en_cours` varchar(255) NOT NULL,
  `defis_non_realises` varchar(255) NOT NULL,
  `defis_en_attente` varchar(255) NOT NULL,
  `entreprise` text NOT NULL,
  `equipe` int(11) NOT NULL,
  `type` set('employe','administrateur','manager') NOT NULL,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `competences` varchar(255) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'user.png',
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `competences_acquises` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `likes_recus`, `likes_distrib`, `defis_realises`, `defis_en_cours`, `defis_non_realises`, `defis_en_attente`, `entreprise`, `equipe`, `type`, `prenom`, `nom`, `competences`, `photo`, `username`, `password`, `competences_acquises`) VALUES
(19, 12, 1, '5', '1', '', '2,3,4,5,', 'ECE', 1, 'employe', 'Emmanuelle', 'Thiroloix', '', 'user.png', 'manouel', 'manouel', 'Gestion_du_stress'),
(20, 0, 30, '', '', '', '3,3,3,3,3', 'ECE', 1, 'manager', 'Charlotte', 'Decary', 'Sociabilite', 'charlotte_decary.png', 'chacha', 'chacha', '');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL,
  `type` enum('Ajout','Emploi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relations`
--

CREATE TABLE `relations` (
  `id` int(10) NOT NULL,
  `id_1` int(10) NOT NULL,
  `id_2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `relations`
--

INSERT INTO `relations` (`id`, `id_1`, `id_2`) VALUES
(1, 7, 9),
(2, 7, 12),
(3, 7, 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `defis`
--
ALTER TABLE `defis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `defis`
--
ALTER TABLE `defis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
