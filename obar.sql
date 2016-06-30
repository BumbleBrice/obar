-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Juin 2016 à 13:02
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

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
  `scheduleOpen` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `y` varchar(255) NOT NULL,
  `google_url` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `bar`
--

INSERT INTO `bar` (`id`, `name`, `picture`, `description`, `phone`, `adress`, `scheduleOpen`, `schedule`, `x`, `y`, `google_url`, `date`) VALUES
(2, 'bar2', 'assets/img/bar-1467013790jpg', 'ceci est un test2', '0123456789', '2 route du chemin', '14h', '', '0', '0', '', '0000-00-00 00:00:00'),
(3, 'bar3.1', 'assets/img/bar-1467014268jpg', 'ceci est un test3', '0123456789', '3 route du chemin', '16h', '', '0', '0', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL,
  `message_state` enum('read','unread') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `obar_desc`
--

CREATE TABLE `obar_desc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `news` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `obar_desc`
--

INSERT INTO `obar_desc` (`id`, `name`, `description`, `news`, `phone`, `address`, `email`) VALUES
(1, 'ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ', 'ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...  ôuiyui Bar, presentation...  ô Bar, presentation...  ô Bar, presentation...', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `token_confirm`
--

CREATE TABLE `token_confirm` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `date_exp` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `token_pswd`
--

CREATE TABLE `token_pswd` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `date_exp` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` enum('user','owner','admin') NOT NULL,
  `confirm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `firstname`, `lastname`, `email`, `password`, `picture`, `role`, `confirm`) VALUES
(9, 'ADMIN', 'Admin', 'Admin', 'admin@admin.fr', '0123Admin', 'assets/img/user-1467282923jpg', 'user', 0),
(10, 'BillyJean', 'Billy', 'Jean', 'billy@jean.fr', '0123User', 'assets/img/user-1467187434jpg', 'user', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `obar_desc`
--
ALTER TABLE `obar_desc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `token_confirm`
--
ALTER TABLE `token_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `token_pswd`
--
ALTER TABLE `token_pswd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bar`
--
ALTER TABLE `bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `obar_desc`
--
ALTER TABLE `obar_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `token_confirm`
--
ALTER TABLE `token_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `token_pswd`
--
ALTER TABLE `token_pswd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
