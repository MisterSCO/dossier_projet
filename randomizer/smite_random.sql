-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 juin 2021 à 15:09
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
-- Base de données : `smite_random`
--

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(32) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_class`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id_class`, `label`, `id_type`) VALUES
(1, 'mage', 2),
(2, 'warrior', 1),
(3, 'support', 2),
(4, 'hunter', 1),
(5, 'assassin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `gods`
--

DROP TABLE IF EXISTS `gods`;
CREATE TABLE IF NOT EXISTS `gods` (
  `id_god` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `picture_god` varchar(256) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id_god`),
  KEY `id_class` (`id_class`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gods`
--

INSERT INTO `gods` (`id_god`, `name`, `picture_god`, `id_class`) VALUES
(1, 'Bellone', 'https://webcdn.hirezstudios.com/smite/god-skins/bellona_standard-bellona.jpg', 2),
(2, 'Ra', 'https://webcdn.hirezstudios.com/smite/god-skins/ra_standard-ra.jpg', 1),
(3, 'Cupidon', 'https://webcdn.hirezstudios.com/smite/god-skins/cupid_standard-cupid.jpg', 4),
(4, 'Cabrakan', 'https://webcdn.hirezstudios.com/smite/god-skins/cabrakan_standard-cabrakan.jpg', 3),
(5, 'Discordia', 'https://webcdn.hirezstudios.com/smite/god-skins/discordia_standard-discordia.jpg', 1),
(6, 'Loki', 'https://webcdn.hirezstudios.com/smite/god-skins/loki_standard-loki.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `picture_item` varchar(256) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id_item`, `name`, `picture_item`, `id_type`) VALUES
(1, 'Arc d\'atlante', 'https://webcdn.hirezstudios.com/smite/item-icons/atalantas-bow.jpg', 1),
(2, 'Ichaival', 'https://webcdn.hirezstudios.com/smite/item-icons/ichaival.jpg', 1),
(3, 'Livre de Thot', 'https://webcdn.hirezstudios.com/smite/item-icons/book-of-thoth.jpg', 2),
(4, 'Pièce de Pythagore', 'https://webcdn.hirezstudios.com/smite/item-icons/pythagorems-piece.jpg', 2),
(5, 'Serre de Bancroft', 'https://webcdn.hirezstudios.com/smite/item-icons/bancrofts-talon.jpg', 2),
(6, 'Pierre du vide', 'https://webcdn.hirezstudios.com/smite/item-icons/void-stone.jpg', 2),
(7, 'Lance du mage', 'https://webcdn.hirezstudios.com/smite/item-icons/spear-of-the-magus.jpg', 2),
(8, 'Bottes du mage', 'https://webcdn.hirezstudios.com/smite/item-icons/shoes-of-the-magi.jpg', 2),
(9, 'Bâton du sorcier', 'https://webcdn.hirezstudios.com/smite/item-icons/warlocks-staff.jpg', 2),
(10, 'Saïs de quin', 'https://webcdn.hirezstudios.com/smite/item-icons/qins-sais.jpg', 1),
(11, 'L\'écraseur', 'https://webcdn.hirezstudios.com/smite/item-icons/the-crusher.jpg', 1),
(12, 'Transcendance', 'https://webcdn.hirezstudios.com/smite/item-icons/transcendence.jpg', 1),
(13, 'Marteau gelé', 'https://webcdn.hirezstudios.com/smite/item-icons/frostbound-hammer.jpg', 1),
(14, 'Epée briseroche', 'https://webcdn.hirezstudios.com/smite/item-icons/stone-cutting-sword.jpg', 1),
(15, 'Lame dorée', 'https://webcdn.hirezstudios.com/smite/item-icons/golden-blade.jpg', 1),
(16, 'Ruine Divine', 'https://webcdn.hirezstudios.com/smite/item-icons/divine-ruin.jpg', 2),
(17, 'Gemme des ames', 'https://webcdn.hirezstudios.com/smite/item-icons/soul-gem.jpg', 2),
(18, 'Pièce de Charon', 'https://webcdn.hirezstudios.com/smite/item-icons/charons-coin.jpg', 2),
(19, 'Couronne de lotus', 'https://webcdn.hirezstudios.com/smite/item-icons/lotus-crown.jpg', 2),
(20, 'Colère de Jotunn', 'https://webcdn.hirezstudios.com/smite/item-icons/jotunns-wrath.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `name`) VALUES
(1, 'physic'),
(2, 'magic');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `gods`
--
ALTER TABLE `gods`
  ADD CONSTRAINT `gods_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`);

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
