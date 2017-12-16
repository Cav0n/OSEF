-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 16 déc. 2017 à 11:33
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
-- Structure de la table `flux`
--

DROP TABLE IF EXISTS `flux`;
CREATE TABLE IF NOT EXISTS `flux` (
  `url` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `titre` varchar(200) NOT NULL,
  `url` varchar(300) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`titre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`titre`, `url`, `categorie`, `description`) VALUES
('test', 'http://www.google.fr', 'Actus', 'test'),
('attention', 'http://www.google.fr', 'Actus', 'attention hein'),
('uiqfhqiuf', 'http://www.google.fr', 'Actus', 'iqsehfoqifs'),
('fqsgsq', 'http://www.google.fr', 'Actus', 'qsdgqsg'),
('qgfsgqshq', 'http://www.google.fr', 'Actus', 'qgqsgsgqg'),
('qsdgqgqsg', 'http://www.google.fr', 'Actus', 'qfshqhqshqs'),
('qgfgsqg', 'http://www.google.fr', 'Actus', 'qfgqgqgsq'),
('sdfhdhdsh', 'http://www.google.fr', 'Actus', 'shsdfhdshf'),
('gssqgrqh', 'http://www.google.fr', 'Actus', 'hqehqhrah');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
