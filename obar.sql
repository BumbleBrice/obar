-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Juillet 2016 à 10:11
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
  `quartiers` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'img/defaut_bar.jpeg',
  `description` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `scheduleOpen` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `y` varchar(255) NOT NULL,
  `google_url` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `bar`
--

INSERT INTO `bar` (`id`, `quartiers`, `name`, `picture`, `description`, `phone`, `adress`, `schedule`, `scheduleOpen`, `x`, `y`, `google_url`, `date`, `url`) VALUES
(4, 'saintpierre', 'Le Wine Bar', 'img/bar-123456789.jpg', 'Le Win Bar, vous accueille au coeur du vieux Bordeaux, dans le quartier historique de Saint Pierre.\r\nIci, le vin et les spécialités Italiennes sont à l''honneur !', '06 76 00 50 54', '19, Rue des Bahutiers', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '30.636650390625', '33.05', 'https://www.google.fr/maps/place/19, Rue des Bahutiers/', '2016-07-03 18:26:32', 'http://www.lewinebar-bordeaux.com/'),
(5, 'saintpierre', 'La Comtesse', 'img/bar-1467540990.jpg', 'Un lieu atypique où vous trouverez des mojitos au goût délicieux !', '05 56 51 03 07', '25 rue Parlement Saint-Pierre33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '36.636650390625', '37.25', 'https://www.google.fr/maps/place/25 rue Parlement Saint-Pierre33000 Bordeaux/', '2016-07-03 18:24:27', 'https://fr-fr.facebook.com/La-Comtesse-164106890312521/'),
(6, 'saintpierre', 'L''Alchismiste', 'img/bar-1467542885.jpg', 'Bar à cocktails dans un endroit cozy et authentique !', '05 56 48 11 82', '16 rue Parlement Saint-Pierre33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '17.6566650390625', '41.53666687011719', 'https://www.google.fr/maps/place/16 rue Parlement Saint-Pierre33000 Bordeaux/', '2016-07-03 12:48:05', 'http://www.lachimistebordeaux.com/'),
(7, 'saintpierre', 'Cafécito', 'img/bar-1467542904.jpg', 'Le Café Cito, bar à bière ou à vin, cocktails et tapas situé dans les rues piétonnes, Place Saint Pierre, vous réserve un accueil des plus chaleureux.', '05 56 44 43 89', '7 Rue Parlement Saint-Pierre33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '19.6566650390625', '48.166665649414064', 'https://www.google.fr/maps/place/7 Rue Parlement Saint-Pierre33000 Bordeaux/', '2016-07-03 12:48:24', 'http://www.cafecito-bar-vins-bieres-bordeaux.fr/'),
(8, 'saintpierre', 'The Black Velvet Bar', 'img/bar-1467542935.jpg', 'Irish Pub\r\nVous pourrez y apprécier une bonne pint bien fraîche de Guinness en écoutant de la bonne musique ou en regardant un match sur grand écran.', '09 51 34 28 73', '9 Rue du Chai des Farines, 33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '17.836650390625', '54.05', 'https://www.google.fr/maps/place/9 Rue du Chai des Farines, 33000 Bordeaux/', '2016-07-03 18:27:08', 'http://www.blackvelvetbar.fr/'),
(9, 'saintpaul', 'Vintage Bar', 'img/bar-1467542953.png', 'Bar à bières et rhums !\r\nHAPPY HOURS proposés tous le jours de 16h à 20h.\r\nLe VINTAGE BAR est l''endroit idéal pour passer des soirées conviviales et animées sur des airs de reggae, rock, soul, funk tout en dégustant d''excellents breuvages.', '( pas de tél )', '45 Rue Saint-James, 33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '42.654375', '19.06875', 'https://www.google.fr/maps/place/45 Rue Saint-James, 33000 Bordeaux/', '2016-07-03 18:43:09', 'http://www.vintage-bar.fr/'),
(10, 'saintpaul', 'Wine more time', 'img/bar-1467542968.jpg', 'Bar à vins et cave décoré dans un style contemporain propose des vins au verre différents chaque semaine.', '05 56 52 85 61', '8 Rue Saint-James, 33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '29.254375', '20.26875', 'https://www.google.fr/maps/place/8 Rue Saint-James, 33000 Bordeaux/', '2016-07-03 18:43:29', 'http://winemoretime.blogspot.fr/'),
(11, 'saintpaul', 'Ô plafond, bar éphémère', 'img/bar-8965412.jpg', 'Association culturelle proposant des apéros chaleureux et convivaux.', '06 68 09 80 38', '14 Rue Saint-Vincent-de-Paul, 33800 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '9.436650390625', '16.85', 'https://www.google.fr/maps/place/14 Rue Saint-Vincent-de-Paul, 33800 Bordeaux/', '2016-07-03 18:40:25', 'http://o.bar.le.plafond.free.fr/'),
(12, 'saintpaul', 'Le Chabi', 'img/bar-1467542983.jpg', 'Bar tabac proposant une terrasse ensoleillée pour partager un verre entre amis.', '05 56 52 88 61', '24 Rue Sainte-Colombe, 33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '74.636650390625', '43.65', 'https://www.google.fr/maps/place/24 Rue Sainte-Colombe, 33000 Bordeaux/', '2016-07-03 18:40:45', 'http://www.pagesjaunes.fr/pros/07100951'),
(13, 'saintpaul', 'Purple Wine', 'img/bar-1467542856.jpg', 'Bar à vins, bar lounge & restaurant\r\nNiché dans une bâtisse du XVe siècle, ce restaurant français au cadre design sert une cuisine du marché.', '05 56 43 17 49', '23 Rue Neuve, 33000 Bordeaux', 'Lundi, Samedi, Dimanche', '8h à 12h et de 13h à 23h', '53.436650390625005', '45.25', 'https://www.google.fr/maps/place/23 Rue Neuve, 33000 Bordeaux/', '2016-07-03 18:39:23', 'https://m.facebook.com/Le-Purple-Wine-368780786472782/?ref=stream'),
(19, 'saintpierre', 'Calle-Ocho', 'img/bar-1467543059.jpg', 'Ce bar cubain sert dans une ambiance latine des cocktails traditionnels et organise des soirées tapas & salsa', '05 56 81 89 99', '24 Rue Piliers des Tutelles', 'Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi', '17h à 22h', '62.4566650390625', '19.4066650390625', 'https://www.google.fr/maps/place/24 Rue Piliers des Tutelles/', '2016-07-03 12:50:59', 'http://http://www.calle-ocho.eu/'),
(20, 'saintpierre', 'Le Café Brun', 'img/bar-1467540711.jpg', 'Pour des soirées jazz, des soirées rock, des soirées musique, venez aux apéros concert du bar Le Café Brun.', '05 56 52 00 40', '45 rue Saint-Rémi, 33000 Bordeaux', 'Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, Dimanche', '9h à 2h', '61.874150390625005', '36.64583129882813', 'https://www.google.fr/maps/place/45 rue Saint-Rémi, 33000 Bordeaux/', '2016-07-03 18:28:19', 'http://www.cafebrun.fr/');

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
  `message_state` enum('Lu','Non lu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `content`, `date_add`, `message_state`) VALUES
(4, 'Bumble', 'Brice', 'collilieux.brice@gmail.com', 'dftytrytryeytr', '2016-07-02 11:24:45', 'Non lu'),
(5, 'Bumble', 'Brice', 'collilieux.brice@gmail.com', 'hioioyuioi', '2016-07-02 11:27:50', 'Non lu'),
(6, 'Jennifer', 'Villeroy', 'jennifer.villeroy@gmail.com', 'test djfkjfkldfhjfhjfhgkjhutuirfhkg fhkhfkghrghru hdrgj', '2016-07-03 11:19:05', 'Non lu'),
(7, 'Gghfghfgh', 'Fghfghfghfghgh', 'toto@toto.fr', 'fgdegsdfgdfgdfgdfgdfgdfgdfgdfgdfgdfg', '2016-07-04 09:24:33', 'Non lu'),
(8, 'Jackie', 'Etmichelle', 'jackie@etmichelle.fr', 'azertyuiop', '2016-07-04 09:29:30', 'Non lu');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `what` varchar(255) NOT NULL,
  `bar` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `what`, `bar`, `msg`) VALUES
(1, 'evenement', 'Le Petit Brun', 'Concert tous les dimanches à 19h'),
(2, 'nouveau', 'Le Wine Bar', 'Pour les amoureux de vins en toutes sortes.'),
(3, 'evenement', 'Le Velvet Bar', 'Ecran géant pendant l''Euro 2016 !');

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
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `obar_desc`
--

INSERT INTO `obar_desc` (`id`, `name`, `description`, `phone`, `address`, `email`) VALUES
(1, 'Ô Bar', 'Ô Bar, vous propose une sélection de bars de Bordeaux selon vos quartiers de prédilection.\r\nVenez découvrir des lieux aussi atypes que vintage !', '05 56 52 01 02', '88 rue Abbé de l''Epée, 33000 Bordeaux', 'contact@obar.fr');

-- --------------------------------------------------------

--
-- Structure de la table `token_confirm`
--

CREATE TABLE `token_confirm` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `date_exp` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL
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
  `picture` varchar(255) DEFAULT 'img/defaut_profil.jpg',
  `role` enum('user','owner','admin') NOT NULL,
  `confirm` tinyint(1) NOT NULL,
  `friends` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `firstname`, `lastname`, `email`, `password`, `picture`, `role`, `confirm`, `friends`) VALUES
(11, 'Alexis', 'Alexis', 'Meunier', 'meunier_33@live.fr', '$2y$10$GRDPx0eiNDQIep2JjCAGg./HRcPjrt19Tmj.o/S2r/CCoevqaqCFy', 'img/Avatar_Alexis.png', 'admin', 1, ''),
(12, 'Bumble', 'Brice', 'Collilieux', 'collilieux.brice@gmail.fr', '$2y$10$3GcwqsE51a4N3xA5Jk/X5Ov0Cfq/P3jRK8Bzb0VlRfwCHJDpieeCi', 'img/Avatar_Brice.png', 'admin', 1, ''),
(13, 'Jenjen', 'Elodie', 'Villeroy', 'jenniferwf3@projet.fr', '$2y$10$KHaGjIcBRc8ger.JmO9tM.p1nWqhBTIZxIL4S0iBGPBiWcknxzol6', 'img/Jen_avatar.jpg', 'admin', 1, ''),
(14, 'Yoan', 'Yoan', 'Garcia', 'yoan.gcia@hotmail.fr', '$2y$10$/0XS.OxWzkqEAM49EFzBX.imQVNr7S3DrfutkXZD7bdyn524oMTa6', 'img/Avatar_yoan.jpg', 'admin', 1, '12,11,13'),
(15, 'Blablabla', 'Membre', 'Membre', 'membre@membre.fr', '$2y$10$14tMuS0WCZsP3AA.3E5QEO8LPYh5k240idmJiVhdjOwG043eHBwtK', 'img/defaut_profil.jpg', 'user', 1, ''),
(17, 'Billy', 'Billy', 'Jean', 'billy.jean@gmail.fr', '$2y$10$.0zSC7kIfqwmdo4N7KaFU.wm3ejAYr7C1LXLxBLFyy9NKtEfAlota', 'img/user-1467618135.gif', 'user', 0, ''),
(18, 'Hélène24', 'Hélène', 'Gryst', 'helene.grist@gmail.fr', '$2y$10$LgWxdq/2vFYn0J58dC6BhOfe5UzYgOhOo1HgJwZWkWi6InD2r9HZa', 'img/user-1467618243.jpg', 'user', 0, ''),
(19, 'Benji', 'Benjamin', 'Torbi', 'benjamin.torbi@gmail.fr', '$2y$10$kxtRt6NIBi9hJwpfeia5n.eJp1zhwoszjeMlWxuWr4pUqQYeL0dt.', 'img/user-1467618297.jpg', 'user', 0, ''),
(20, 'Théo12', 'Théo', 'menhié', 'theo.mehie@gmail.fr', '$2y$10$0Db9xBI3c1FBA5saHSuoiuiUcyRbTPOsqSDyWWZ8x5gWchH9umIt2', 'img/user-1467618348.png', 'user', 0, ''),
(21, 'Marine99', 'Marine', 'Duman', 'marine.duman@gmail.fr', '$2y$10$BilDnNm5CueN83zG4QZewO1mxjWCXcDHKB1c5GjAyOYwTJSVnXI7C', 'img/user-1467618387.jpg', 'user', 0, ''),
(22, 'Paul4', 'Paul', 'Jirka', 'paul.jirka@gmail.fr', '$2y$10$ezeI95LXTOpTXd6HSe2mPe6SgLF4XVvJI1kRszNdGU.El2OrevXP6', 'img/user-1467618572.jpg', 'user', 0, ''),
(23, 'Matt@', 'Mathieu', 'boset', 'mathieu.boset@gmail.fr', '$2y$10$Iys.pZvnkeEN/aJfZH.x/..WbpuX/9VQwHvENMjew5tvkYhzUo2KC', 'img/user-1467618646.png', 'user', 0, ''),
(24, 'YopDonald', 'Donald', 'Oten', 'donald.oten@gmail.fr', '$2y$10$FxyvC.XJsqyFkobMg7eXCube5gm5Ml7q1/Q0NKKYXXSfJ8lCiQvDm', 'img/user-1467618700.jpg', 'user', 0, '');

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
-- Index pour la table `news`
--
ALTER TABLE `news`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;