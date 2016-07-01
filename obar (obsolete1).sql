-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2016 at 03:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bar`
--

CREATE TABLE `bar` (
  `id` int(11) NOT NULL,
  `quartiers` enum('saintpierre','saintpaul','quinconces','meriadeck','gambetta','hoteldeville','saintmichel') NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
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
-- Dumping data for table `bar`
--

INSERT INTO `bar` (`id`, `quartiers`, `name`, `picture`, `description`, `phone`, `adress`, `schedule`, `scheduleOpen`, `x`, `y`, `google_url`, `date`, `url`) VALUES
(4, 'saintpierre', 'Le Wine Bar', '', 'Le Win Bar, vous accueille au coeur du vieux Bordeaux, dans le quartier historique de Saint Pierre.\r\nIci, le vin et les spécialités Italiennes sont à l''honneur ! ', '06 76 00 50 54', '19, Rue des Bahutiers', '', '', '', '', '', '0000-00-00 00:00:00', 'http://www.lewinebar-bordeaux.com/'),
(5, 'saintpierre', 'La Contesse', '', 'Un lieu atypique où vous trouverez des mojitos au goût délicieux !', '05 56 51 03 07', '25 rue Parlement Saint-Pierre\r\n33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', 'https://fr-fr.facebook.com/La-Comtesse-164106890312521/'),
(6, 'saintpierre', 'L''Alchismiste', '', 'Bar à cocktails dans un endroit cozy et authentique !', '05 56 48 11 82', '16 rue Parlement Saint-Pierre\r\n33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', 'http://www.lachimistebordeaux.com/'),
(7, 'saintpierre', 'Cafécito', '', 'Le Café Cito, bar à bière ou à vin, cocktails et tapas situé dans les rues piétonnes, Place Saint Pierre, vous réserve un accueil des plus chaleureux.', '05 56 44 43 89', '7 Rue Parlement Saint-Pierre\r\n33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', 'http://www.cafecito-bar-vins-bieres-bordeaux.fr/'),
(8, 'saintpierre', 'The Black Velvet Bar', '', 'Irish Pub\r\nVous pourrez y apprécier une bonne pint bien fraîche de Guinness en écoutant de la bonne musique ou en regardant un match sur grand écran.', '09 51 34 28 73', '9 Rue du Chai des Farines, 33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', 'http://www.blackvelvetbar.fr/'),
(9, 'saintpaul', 'Vintage Bar', '', 'Bar à bières et rhums !\r\nHAPPY HOURS proposés tous le jours de 16h à 20h.\r\nLe VINTAGE BAR est l''endroit idéal pour passer des soirées conviviales et animées sur des airs de reggae, rock, soul, funk tout en dégustant d''excellents breuvages.', '', '45 Rue Saint-James, 33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', 'http://www.vintage-bar.fr/'),
(10, 'saintpaul', 'Wine more time', '', 'Bar à vins et cave décoré dans un style contemporain propose des vins au verre différents chaque semaine.', '05 56 52 85 61', '8 Rue Saint-James, 33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', 'http://winemoretime.blogspot.fr/'),
(11, 'saintpaul', 'Ô plafond, bar éphémère', '', 'Association culturelle proposant des apéros chaleureux et convivaux.', '06 68 09 80 38', '14 Rue Saint-Vincent-de-Paul, 33800 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', 'http://o.bar.le.plafond.free.fr/'),
(12, 'saintpaul', 'Le Chabi', '', 'Bar tabac proposant une terrasse ensoleillée pour partager un verre entre amis.', '', '24 Rue Sainte-Colombe, 33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(13, '', 'Purple Wine ', '', 'Bar à vins, bar lounge & restaurant\r\nNiché dans une bâtisse du XVe siècle, ce restaurant français au cadre design sert une cuisine du marché.', '05 56 43 17 49', '23 Rue Neuve, 33000 Bordeaux', '', '', '', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
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

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `what` varchar(255) NOT NULL,
  `bar` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `what`, `bar`, `msg`) VALUES
(1, 'evenement', 'Le Petit Brun', 'Concert tous les dimanches à 19h'),
(2, 'nouveau', 'Le Wine Bar', 'Pour les amoureux de vins en toutes sortes.'),
(3, 'evenement', 'Le Velvet Bar', 'Ecran géant pendant l''Euro 2016 !');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `obar_desc`
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
-- Dumping data for table `obar_desc`
--

INSERT INTO `obar_desc` (`id`, `name`, `description`, `phone`, `address`, `email`) VALUES
(1, 'Ô Bar', 'Ô Bar, vous propose une sélection de bars de Bordeaux selon vos quartiers de prédilection.\nVenez découvrir des lieux aussi atypes que vintage !', '05 56 52 01 02', '88 rue Abbé de l''Epée, 33000 Bordeaux', 'contact@obar.fr');

-- --------------------------------------------------------

--
-- Table structure for table `token_confirm`
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
-- Table structure for table `token_pswd`
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `firstname`, `lastname`, `email`, `password`, `picture`, `role`, `confirm`) VALUES
(11, 'Alexis', 'Alexis', 'Meunier', 'meunier_33@live.fr', '$2y$10$hlb929Kvi1yCu0uXUJhWcuWOF.9YquKOmGsXf3aqXQsmdgfcTBfLC', '', 'admin', 1),
(12, 'Bumble', 'Brice', 'Collilieux', 'collilieux.brice@gmail.fr', '$2y$10$hlb929Kvi1yCu0uXUJhWcuWOF.9YquKOmGsXf3aqXQsmdgfcTBfLC', '', 'admin', 1),
(13, 'Jenjen', 'Jennifer', 'Villeroy', 'jennifer.villeroy@gmail.com', '$2y$10$hlb929Kvi1yCu0uXUJhWcuWOF.9YquKOmGsXf3aqXQsmdgfcTBfLC', '', 'admin', 1),
(14, 'Yoan', 'Yoan', 'Garcia', 'yoan.gcia@hotmail.fr', '$2y$10$hlb929Kvi1yCu0uXUJhWcuWOF.9YquKOmGsXf3aqXQsmdgfcTBfLC', '', 'admin', 1),
(15, 'Blablabla', 'Membre', 'Membre', 'membre@membre.fr', '$2y$10$ZugNygRl/mOBuMkbC2qMCeSbUyyxrypUxJ0eSVqTuTh5wr8L2CS6a', '', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obar_desc`
--
ALTER TABLE `obar_desc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `token_confirm`
--
ALTER TABLE `token_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_pswd`
--
ALTER TABLE `token_pswd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bar`
--
ALTER TABLE `bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `obar_desc`
--
ALTER TABLE `obar_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `token_confirm`
--
ALTER TABLE `token_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `token_pswd`
--
ALTER TABLE `token_pswd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
