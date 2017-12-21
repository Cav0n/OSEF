-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 21 Décembre 2017 à 15:43
-- Version du serveur :  5.7.20-0ubuntu0.17.10.1
-- Version de PHP :  7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbflbernard`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(200) NOT NULL,
  `Mdp` varchar(400) NOT NULL,
  `Nom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`Email`, `Mdp`, `Nom`) VALUES
('Cav0n@hotmail.fr', '$2y$10$7rto23Z2/PWPGXVjG3m2KuxT/lHp3STyvUoKt3liJCyYQVSPEBbWO', 'Florian');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `nbNewsParPage` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`nbNewsParPage`) VALUES
(5);

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

CREATE TABLE `flux` (
  `url` varchar(300) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `flux`
--

INSERT INTO `flux` (`url`, `nom`) VALUES
('http://hitek.fr/rss', 'hitek');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `titre` varchar(100) NOT NULL,
  `url` varchar(256) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`titre`, `url`, `categorie`, `description`, `date`) VALUES
('Suicidez-le', 'http://www.jeuxvideo.com/', 'Actus', 'Nouvel icone favori de ces ... personnes speciales de JVC.', '2017-12-20'),
('Les pulls du BDE', 'https://www.facebook.com/BDEAlpic/', 'Economie', 'Les pulls du BDE segfault[ ] sont enfin disponible a 25 euros au local du dit BDE.', '2017-12-20'),
('Nouveau jeu', 'https://www.youtube.com/watch?v=iPtP-b1nzbY', 'Games', 'Un jeu ou David-Lafarge doit eliminer le nouveau copin de Miss jirachi.', '2017-12-20'),
('Projet Robot', 'https://opale.u-clermont1.fr/info/wiki/doku.php?id=projets:robots:start', 'High-Tech', 'Nouveau moyen de s\'amuser avec le simulateur creer par l\'equipe du projet 19.', '2017-12-01'),
('La johnny mania c\'est fini...', 'https://www.youtube.com/watch?v=21VopdemljE', 'Actus', 'La mort du \"mickael jackson\" francais metun terme a la joie de beaucoup de francais... mais pas la mienne.', '2017-12-07'),
('Les partiels arrivent...', 'https://www.youtube.com/watch?v=dj20Ao4Vw9w&index=23&list=PLzFQDC7lSNLYNgsr_wGX-ZAGNZhgFp61A', 'Comedie', 'Preparez vous carvous n\'etes pas pret !', '2017-12-20'),
('Thimote est en deche', 'https://www.caf.fr/', 'Economie', 'L\'argent de Thimote est parti loin... Tres loin...', '2017-12-12'),
('Nouveau type de pile', 'https://www.youtube.com/watch?v=214rZ1SWewg&index=43&list=PLzFQDC7lSNLYNgsr_wGX-ZAGNZhgFp61A', 'Comedie', 'Voici un journaliste commentant le nouveau type de piles par rapport aux anciennes.', '2017-12-03'),
('Le php rend fou !', 'https://www.youtube.com/watch?v=SRs3CJwV2Ec', 'High-Tech', 'Plusieurs cas d\'eleve lancant leur PC et binomes de TP par la fenetre apres deux heures de travail infructueuses sur le parser.', '2017-11-06');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Index pour la table `flux`
--
ALTER TABLE `flux`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`titre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
