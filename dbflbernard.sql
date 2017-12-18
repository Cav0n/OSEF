-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 déc. 2017 à 10:13
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Email` varchar(200) NOT NULL,
  `Mdp` varchar(400) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Email`, `Mdp`, `Nom`) VALUES
('Cav0n@hotmail.fr', '$2y$10$7rto23Z2/PWPGXVjG3m2KuxT/lHp3STyvUoKt3liJCyYQVSPEBbWO', 'Florian');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `nbNewsParPage` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `config`
--

INSERT INTO `config` (`nbNewsParPage`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `flux`
--

DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `url` varchar(300) NOT NULL,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `titre` varchar(100) NOT NULL,
  `url` varchar(256) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`titre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`titre`, `url`, `categorie`, `description`, `date`) VALUES
('test', 'http://www.google.fr', 'Actus', 'test Rajout de date', '2017-12-08'),
('qqgqsg', 'http://www.google.fr', 'High-Tech', 'qhqshsqgq', '2017-12-07'),
('apapappaa', 'http://www.google.fr', 'High-Tech', 'zgiuezrhaie', '2017-12-11');

-- --------------------------------------------------------

--
-- Structure de la table `newsbackup`
--

DROP TABLE IF EXISTS `newsbackup`;
CREATE TABLE IF NOT EXISTS `newsbackup` (
  `titre` varchar(200) NOT NULL,
  `url` varchar(300) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`titre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `newsbackup`
--

INSERT INTO `newsbackup` (`titre`, `url`, `categorie`, `description`, `date`) VALUES
('test', 'http://www.google.fr', 'Actus', 'test', 0),
('attention', 'http://www.google.fr', 'Actus', 'attention hein', 0),
('uiqfhqiuf', 'http://www.google.fr', 'Actus', 'iqsehfoqifs', 0),
('fqsgsq', 'http://www.google.fr', 'Actus', 'qsdgqsg', 0),
('qgfsgqshq', 'http://www.google.fr', 'Actus', 'qgqsgsgqg', 0),
('qsdgqgqsg', 'http://www.google.fr', 'Actus', 'qfshqhqshqs', 0),
('qgfgsqg', 'http://www.google.fr', 'Actus', 'qfgqgqgsq', 0),
('sdfhdhdsh', 'http://www.google.fr', 'Actus', 'shsdfhdshf', 0),
('gssqgrqh', 'http://www.google.fr', 'Actus', 'hqehqhrah', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
