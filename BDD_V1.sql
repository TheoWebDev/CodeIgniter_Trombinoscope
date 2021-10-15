-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 13 oct. 2021 à 07:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trombi_lamanu`
--

-- --------------------------------------------------------

--
-- Structure de la table `golden_book`
--

DROP TABLE IF EXISTS `golden_book`;
CREATE TABLE IF NOT EXISTS `golden_book` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_content` varchar(200) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `u_id` (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `manu_users`
--

DROP TABLE IF EXISTS `manu_users`;
CREATE TABLE IF NOT EXISTS `manu_users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_lastname` varchar(50) NOT NULL,
  `u_firstname` varchar(50) NOT NULL,
  `u_campus` varchar(50) NOT NULL,
  `u_promo` varchar(50) NOT NULL,
  `u_photo` varchar(100) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `manu_users`
--

INSERT INTO `manu_users` (`u_id`, `u_lastname`, `u_firstname`, `u_campus`, `u_promo`, `u_photo`) VALUES
(1, 'Dupont', 'Jean', 'Amiens', 'P5', 'test.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
