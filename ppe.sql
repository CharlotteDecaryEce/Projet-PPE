-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 11 avr. 2019 à 10:16
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
(1, 'Bienvenu!', 'Comme tu le sais, une entreprie est faite d\'allers et venues. Pour inclure tout le monde et faire en sorte que l\'ambiance de travail soit la plus seine possible, tu as deux semaines pour dejeuner avec un collegue qui est l\'entreprise depuis moins de 6 mois. Il se sentira valorise et ce dejeuner sera l\'occasion pour vous deux de mieux vous connaitre.', 'Disponibilite', 10, 1),
(2, 'Bien joue!', 'Savoir relever les points positifs de son equipe et valoriser leur travail est une force et une grande source de motivaiton pour avancer. C\'est pourquoi, tu dois, lors de la prochaine reunion que tu animes, pendant les 10-15 premieres minutes, enumerer l\'ensemble des bons points. Ceux qui ont permi de conclure un contrat, faire avancer une negociaiton, une progrssion significative dans un projet et bien d\'autres. Tous points positifs et valorisants le travail des autres est bon a etre dit haut et fort! ', 'Motivation', 10, 2),
(3, 'Let\'s go out ', 'Pourquoi se cantoner à ses collegues de travail au travail? Rien de mieux que vous connaitre sous un autre angle et dans un autre atmosphere que celui des locaux de travail. Une bonne ambiance et une relation sincere en dehors du lieu de travail est un grand facteur de reussite dans vos objectifs professionells. Tu as 1 mois pour organiser une activie exterieure avec minimum 15 de tes collegues. Pour t\'aider tu trouveras ici quelques idees: afterwork dans un bar, escape game, cours de cuisine, cours d\'improvisation théatrale... ', 'Sociabilite', 20, 3),
(4, 'Soyez fier de votre entreprise!', 'Montre nous a quel point tu es fier de travailler chez nous et clame le haut et fort. Comme tu le sais, nous participons a de nombreux evenements sportifs, carritatifs... Pendant les 6 prochains mois fais valoir les valeurs de l\'entreprise au grand public en prenant part au depart d\'un marathon dont nous sommes partenaires, en consacrant du temps aux enfants des associaitons que nous soutenons... Libre a toi de participer aux differentes actions, il t\'en faut une! ', 'Communication', 180, 4),
(5, 'Travaillez sur vous!', 'Vous etes paralyses par le stress? Il vous angoisse? Vous handicape? Ce Defis est fait pour vous! Quand vous le commencez, vous vous engangez sur deux semaines à faire l\'ensemble des etapes suivantes, les effet seront immediats. A partir de ce soir, vous vous endormez a maximum 23H. C\'est l\'heure a laquelle vous devez avoir eteint votre telephone et tout objets qui peut parasiter votre endormissement et votre sommeil. Venez 15 minute plus tot au travail que votre horraire habituel, elles seront precieuses, croyez Inuit. Profitez en pour organiser votre journee, ranger votre bureau et anticipier aux mieux les echeances de la journee. Faites une pause de 15 minutes entre 10H45 et 11H15 et une autre entre 16H et 16H30. Tout au long de la journee, respirez, prenez du recul. Pret - feux - Partez!', 'Gestion_du_stress', 10, 5),
(6, 'Be the boss', 'Vous ne voyez pas le bout du tunnel, regarder en arrière le vendredi soir et avoir la sensation de ne pas avoir fait tout ce que vous deviez accomplir... Suivez Inuit! Commencez par faire le challenge \"Travaillez sur vous\" avant celui la! Sur cette lancée, continuez! Comment produire plus? Lisez, beaucoup, vraiment beaucoup! En commenant par \"Six thinking hats\" de Edward de bono, priorisez vos tâches, fixez vous des échéances personelles, sachez dire non et surtout, prenez de l\'avance, anticipez! Suivez ces 5 conseils et partagez avec Inuit vos exploits!', 'Efficacite', 15, 6),
(7, 'Think out of the box...', 'Attention, defis tres court! Planifiez des maintenant une réunion avec votre equipe dans un mois pour vous leur presenter votre - vos idees! Durant le mois qui va suivre, impresionnez votre equipe! Trouvez un nouveau produit, une nouvelle strategie marketing, un super outil de communication, un nouveau packaging ou.. libre a vous de creer ce que vous voulez! Emerveillez vous, soyez a l\'affut des nouveautees, de ce qui se fait dans les autres secteurs, regardez autour de vous, dehors, chez vous, au supermarche.. le temps tourne et le rendez vous est prit avec vote equipe! Faites savoir a Inuit vos idees et les reactions de vos collegues!', 'Creativite', 20, 9),
(8, 'Toujours plus haut, toujours plus loin, toujours plus fort!', 'Prenez part à une initiative de votre entreprise sans se soucier du regard des autres, n\'ayez pas peur de bien faire, soyez sur de vous! Osez faire, posez des questions! Relativiser l’échec possible. Imaginer la conséquence la pire, et se rendre compte que ce n’est pas si grave! Saisissez les opportuniés qui vous sont proposées! Positivez, ayez le sourire, voyagez, partagez vos expériences et impactez votre manière de travailler positivement!', 'Audace', 5, 10),
(9, 'Think it, Post it, Read it!', 'Ecrire sur des post it chaque vendredi 4 choses\r\npositives qui sont arrivees cette semaine! \r\nPetit sourire assure le Lundi \r\na votre retour au travail!', 'Optimisme', 20, 8),
(10, 'Yes you can!', 'Decouvrez comment avoir confiance en vous en laissant les autres travailler... Le FEEDBACK! Prenez l\'habitude de demandez un retour a vos interlocuteurs lorsque vous faites une reeunion, un rendez vous, rendez un projet, un rapport, a la suite d\'un appel telephonique.. vous verez que vous etes tres bon, et l\'entendre... ca fait du bien! Relativisez, collectez les likes sur Inuit, gardez une bonne cadence de defis releves et peu à peu, vous serez confiant tel David face a Goliath!', 'Confiance', 10, 12),
(11, 'On garde la peche !', 'Prenez un fruit que vous posez devant vous.\r\nPensez à une peche parfaitement mûre. \r\nLa couleur, la forme, la dimension … \r\nPrenez votre temps pour bien integrer \r\nces elements. \r\nObservez cette peche dans chaque détail. \r\nDe quelle couleur est-elle ? \r\nQuel est son parfum ? \r\nQue gout a-t-elle ? Est-elle juteuse?  \r\nGoutez-la et appreciez sa saveur.\r\nPuis, fermez les yeux et detendez-vous ! \r\nRememorez-vous le fruit \r\nen commencant par la pensee. \r\nNe forcez pas ! Essayez de vous rappeler !', 'Visualisation', 20, 11),
(12, 'Free time!', 'Soyez clair et organise, n\'oubliez pas que votre journée sera principalement faite d\'imprevus! Sachez etre disponible et laxiste. Soyez ouvert d\'esprit et acceptez d\'aider un collegue, de lui donner du temps, d\'accueillir les nouveaux de la meilleure manière qu\'il soit! Etre disponible est une grande force au travail! Prouvez que vous en etes capable! C\'est une grande force que vous etes entrain d\'acquerir... Merci Inuit', 'Disponibilite', 10, 1),
(13, 'Cofee time', 'C\'est votre tournee! Vous avez une semaine pour, lors d\'une pause avec votre équipe, embarquer tout le monde pour prendre un cafe (offert par vous si c\'est payant)! Quoi de mieux qu\'une bonne pause cafe avec toute l\'equipe... Poroftez en pour ne pas forcement parler boulot mais vie quotidienne, prochaine vacances ou dire du mal de votre boss!', 'Sociabilite', 5, 3),
(14, 'Un pour tous, tous pour un!', 'La motivation s\'inscrit dans un cercle de mobilisation! Soyez mobilisé, concentré et mettez toutes votre énergie au service de l\'équipe! Discutez avec chacun des objectifs a atteindre et FONCEZ!', 'Motivation', 5, 2),
(15, 'Ambassadeur', 'Dress up! Pendant une journée de la semaine qui suit, vous devez porter un habil au couleur de votre entreprise et si possible un de votre entreprise! Tout est bienvenu, tee shirt, sweat shirt, pull, bonnet, tout! Soyez fier et portez haut les couleurs de votre entreprise!', 'Communication', 5, 4),
(16, 'Investissez sur vous!', 'Le meilleure investiseement à faire.. c\'est sur vous! Vous ne trouverez pas plus rentable! Equipez vous de votre anti-stress le plus éfficace, une photo de famille dans votre portefeuille, une balle anti-stress, un repose poignet pour souris d\'odinateur et soulager votre poignet, un rubik\'s cube... Tout est bon pour laissez glisser le stress!', 'Gestion_du_stress', 10, 5),
(17, 'Performance et rien d\'autre!', 'Travaillez avec des outils performants! Ne soyez pas decourage par les outils, logiciels, materiels avec lesquels vous travailler. N\'hesitez pas a aller voir votre manager et lui faire comprendre que vous etes a 100% mais qu\'il est primordial que vos outils de travail le soit tout autant! Dites lui dealement ce que vous voudriez, les raisons et les impacts! Il sera comprehensif et fera surement tout pour optimiser ce materiel... Une fois les changements faits.. plus d\'excuse.. vous devez etre le number one!', 'Efficacite', 20, 6),
(18, 'Vous etes une étoile dans la galaxie de l\'entreprise!', 'Faire briller les autres pour briller a son tour! N\'hesitez pas a jouer collectif ! Soyez assertif, prenez le lead si c\'est nécéssaire, Inuit compte sur vous, votre entreprise et votre manager aussi! N’oubliez pas, selon le principe de Pareto, 20 % de votre travail apportera 80% des résultats, votre objectif ici est donc d’identifier ces 20% de tâches, et de les traiter comme si votre job en dépendait.', 'Présence', 10, 15),
(19, 'Here I am', 'Etre present, donner de son temps, de sa bonne humeur et de ses idees. Si peu couteux et si simple! Vous devez, sans faute et sans manquement, etre present aux trois prochains evenements organises par l \'entreprise. SI ce n\'est pas deja fait, notez le sur votre calendrier, ou votre sous main, comme vous l\'a suggere le defis \"visualisation\". Allez a ces evenements, montrez que vous etes content d\'y etre et de representer votre entreprise. Cela peut etre un evenement exterieur mais aussi un evenement interieur, comme participer a une photo de groupe, prendre part a un projet etc.. Laissez vous aller, ne soyez pas sans cesse dans le controle. Votre entreprise et Inuit vous apprecient comme vous etes, alors soyez vous meme et prenez part a la magnifique vie qui vous est proposee chaque jour.', 'Présence', 15, 15),
(20, 'Pot d\'part', 'Vous le savez, une entrepriese est faite de departs et d\'arrivees. Les departs peuvent etre celui d\'un stagiaire, d\'une femme enceinte pur conge maternite, d\'un depart en retraite etc.. Vous avez la charge d\'organiser le pot de depart d\'un de vos collegues, au bureau ou dans un lieu exterieur, reunissant le plus grand nombre pour temoigner de l\'importance des etoiles dans la galaxie qui est l\'entreprise. Vous pouvez evidemment associer des collègues a votre mission, mais l\'inititative doit venir de vous! L\'objectif etant de laisser un bon souvenirs à votre collegue, faites de votre mieux.', 'Empathie', 20, 13),
(21, 'Salut, ca va? ', 'C\'est generalement ce qu\'on dit a tout le monde le matin, sans meme vraiment chercher a savoir si ca va vraiment... mechaniquement, votre interlocuteur va repondre oui. Pendant une semaine, vous allez devoir faire l\'effort de consacrer 5 petites minutes à 5 personnes differentes par jour et avec qui vous n\'avez pas l\'habitude de discuter et ou un simple \"ca va et toi?\" s\'echange. Connaitre reellement ses collaborateurs, savoir si tout va bien, reellement, est tres important à la bonne cohesion des equipes et au moral general!', 'Empathie', 5, 13),
(22, 'Soyez flex!', 'Nous sommes ce que nous repetons chaque jour. L’excellence n’est alors plus un acte, mais une habitude. » – Aristote\r\nChangez, bougez, innovez! Vous avez 10 jours pour modifier votre maniere de travailler, physiquement. Prenez le pas et travaillez dans des open space, en ne se souciant pas de la place que vous aurez le lendemain, debout, sur une table haute, dans un petit box au clame... Qui sait, votre nouvelle disposition de travail vous orientera vers un autre cote de la rue sur laquelle le bureau donne et en y jetant un coup d\'oeil, vous aurez l\'idee du siecle qui revolutionnera votre service ou votre entreprise. Modifiez vous habitudes, adaptez vous, ouvrez vous.. Inuit en est temoin, vous ne serez que gagnant!', 'Adaptabilite', 10, 14),
(24, 'Wiki 5', 'Wikigame: Lancer le mode aleatoire sur \r\nWikipedia, et deriver d\'un article à l\'autre 5 fois.\r\nFaites un resume de 5 lignes liant les 5 articles \r\nsur lesquels vous avez clique.', 'Curiosite', 5, 7),
(25, 'Day off', 'Decouvrir, s\'interesser, comprendre... Dans les deux prochains mois, bloquez une demie journée. Pendant celle-ci, vous devrez la passer dans un autre service que le votre. Comprendre le quotidien de ses collègues, voir les problemes auxquels ils font fasse, la maniere dont ils les resolvent, leur capacite d\'action, l\'ambiance d\'equipe etc... Vous en sortire grandit! Cette demie journée vous rapprochera de vos collègues et sera temoin de votre implication dans la vie de l\'entreprise', 'Curiosite', 40, 7),
(26, 'La vie est belle', 'Paper Board!!! Rien de mieux quun grand tableau blanc et des feutres de couleurs! A vous de choisir, en debut de semaine le lundi et ou en fin de semaine le vendredi, reunissez votre equipe, faites un point sur ce qui va bien et ce qui va moins bien, les échéances de la semaine qui arrive, les points sur lesquels il va falloir se concentrer et surtout, l\'HUMEUR DU JOUR! Disposez ce Paper Board de manière à ce qu\'il soit visible de tous toute la semaine!', 'Optimisme', 20, 8),
(27, 'Reporting', 'Dans la poursuite de ton premier défis crétivité, vous devez créer un rapport! C\'est bien vague, Inuit est d\'accord! Rien de mieux que des chiffres qui parlent d\'eux memes. Vous devrez donc, dans les deux prochains mois, imaginer et réaliser un nouveau rapport, sur des données financières, des stocks, des heures passees à faire quelque chose, des couts particuliers... tout est bon à prendre et qui sait, des économies ou une meilleure gestion seront peut etres faites grace a votre rapport! A vos stats!', 'Creativite', 40, 9),
(28, 'Meeting', 'Etre dans une situation inconfortable n\'est jamais agréable... et pourtant, c\'est probablement dans celle-ci que nous apprenons le plus. Inuit est derriere vous, croit en vous et vous pousse dans vos retranchements. C\'est le moment de montrer tout ce que vous avez appris grace a Inuit! Vous allez donc présenter un projet, une tache sur laquelle vous travaillez ou encore le rapport que vous avez cree avec le challenge creativite devant votre manager! Montre lui que vous etes un maillon essentiel et indispensable de l\'entreprise, de part le super travail que vous fournissez chaque jour mais aussi de part votre créativité et capacité a etre audacieux!', 'Audace', 15, 10),
(29, 'Prevoyez', 'Simple et efficace, prenez un calendrier comme sous main! Rien de mieux qu\'un grand sous main avec les l\'ensemble des jours de l\'année, les vacances et jours feries! Dessus, ecrivez, stabilotez, hachurez... tout est bon pour qu\'en un coup d\'oeil vous puissiez facilement visualiser les prochaines echeances, prochains rendez vous...', 'Visualisation', 5, 11),
(30, 'You are the best', 'Devenez un mentor! Nombreuses les jeunes recrues qui ont du mal a se mettre dans le bain,a acquerir les nouveaux termes, les nouveaux outils... Soyez la pour eux! Mentorez les plus jeunes!', 'Confiance', 10, 12),
(31, 'A demain, bon courage!', 'Cette sensation d\'avoir fait tout ce dont on avait a faire pendant la journee et de pouvoir rentrer chez soit est si jouissive! Pourquoi ne pas aider ses collegues a connaitre aussi cette sensation. Etes vous tous les jours a 30 minutes pres? Inuit n\'est pas sur.. C\'est pourquoi, pendant le prochain mois, vous devez, a 2 reprises, lorsque vous etes sur le depart, ne pas machinalement rentrer chez vous, mais prendre 30 minutes pour aider un de vos collegues (de votre service ou non) a finir la tache qui le fera rentrer tard chez lui. Une entreprise c\'est une grande famille, une equipe, montrez que c\'est le cas! On est plus fort ensemble, alors aidez le. Vous serez si content de l\'avoir aidé, il le sera tout autant de ne pas faire une nuit blanche au bureau. Asseyez-vous a cote de lui, comprenez la problematique et l\'objectif de la tache.. et c\'est parti! Merci pour tout, Inuit est fier de vous!', 'Adaptabilite', 20, 14);

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
(19, 12, 1, '5,3', '', '1', '2,4,5,,12,1', 'ECE', 1, 'employe', 'Emmanuelle', 'Thiroloix', 'Optimisme,Confiance,Sociabilite', 'emmanuelle.jpg', 'manouel', 'manouel', 'Gestion_du_stress,Sociabilite'),
(20, 0, 30, '3', '3', '', '2,12,1,14,13', 'ECE', 1, 'manager', 'Charlotte', 'Decary', 'Optimisme,Confiance,Sociabilite,Empathie,Communication,Efficacite', 'charlotte_decary.png', 'chacha', 'chacha', 'Sociabilite'),
(21, 4, 26, '5', '9', '', '1,4,10,12,2', 'ECE', 1, 'administrateur', 'Thibault', 'Magnen', 'Efficacité, motivation, disponibilité, Sociabilite, Audace', 'user8.png', 'thib', 'thib', 'Presence, Empathie'),
(22, 10, 20, '2', '3', '', '11,8,6,5,15', 'ECE', 1, 'employe', 'Baptiste', 'Grobon', 'Confiance, visualisation, creativite, optimisme ', 'user.png', 'bapt', 'bapt', 'adaptabilite, Curiosite, Communication'),
(23, 2, 28, '3', '1', '', '9,8,4,7', 'ECE', 1, 'employe', 'Raphael', 'Guez', 'Visualisation, Presence, Audace, Empathie, disponibilite', 'user7.png', 'raph', 'raph', 'Creativite, Motivation');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
