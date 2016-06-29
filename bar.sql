-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Juin 2016 à 15:38
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `obar`
--

-- --------------------------------------------------------

--
-- Structure de la table `bar`
--

CREATE TABLE `bar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  `x` varchar(255) NOT NULL,
  `y` varchar(255) NOT NULL,
  `google_url` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `bar`
--

INSERT INTO `bar` (`id`, `name`, `picture`, `description`, `phone`, `adress`, `schedule`, `open`, `close`, `x`, `y`, `google_url`, `date`) VALUES
(2, 'bar2', 'assets/img/bar-1467013790jpg', 'ceci est un test2', '0123456789', '2 route du chemin', '14h', '00:00:00', '00:00:00', '0', '0', '', '0000-00-00 00:00:00'),
(3, 'bar3.1', 'assets/img/bar-1467014268jpg', 'ceci est un test3', '0123456789', '3 route du chemin', '16h', '00:00:00', '00:00:00', '0', '0', '', '0000-00-00 00:00:00'),
(4, 'firstBarDeTest', 'assets/img/bar-1467204136bar-1467031525jpg', 'Ceci est le test pour les bars', '0123456789', '12 route de azvvbgnfd', '14h', '05:36:24', '22:45:30', '40.065625', '42.365625', '', '2016-06-29 13:41:48');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bar`
--
ALTER TABLE `bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
