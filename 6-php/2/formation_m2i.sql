-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 25 nov. 2019 à 15:33
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formation_m2i`
--

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  `team` smallint(6) NOT NULL,
  `points` int(11) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `zipcode` varchar(5) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `created_at`, `name`, `team`, `points`, `mail`, `zipcode`, `is_enabled`) VALUES
(1, '2019-10-18 10:31:16', 'Thor', 1, 50, 'thor@asgard.space', '62000', 1),
(2, '2019-10-18 10:31:16', 'Hulk', 1, 15, 'hulk@mail.fr', '59800', 1),
(3, '2019-10-18 10:31:48', 'Bambi', 1, 35, NULL, '59000', 0),
(4, '2019-10-18 10:32:28', 'Marie-Jeanne', 1, 10, 'mj@mail.fr', '75000', 1),
(5, '2019-10-18 10:33:16', 'Superman', 1, 5, NULL, '62000', 1),
(6, '2019-10-18 10:33:34', 'Superwomen', 2, 30, NULL, '75000', 1),
(7, '2019-10-18 10:33:48', 'Batman', 3, 22, NULL, '59000', 1),
(8, '2019-10-18 10:34:11', 'Biloute', 3, 6, NULL, '75000', 1),
(9, '2019-10-18 10:34:36', 'Kevin', 2, 9, NULL, '75000', 1),
(10, '2019-10-18 10:35:03', 'Michel', 1, 5, 'michmich@mail.fr', '62000', 1),
(11, '2019-10-18 10:35:40', 'Neo', 3, 35, NULL, '59000', 1),
(12, '2019-10-18 10:35:58', 'Gérad', 1, 32, NULL, '62000', 1),
(13, '2019-10-18 10:37:09', 'Dr Strange', 3, 0, NULL, '59000', 1),
(14, '2019-10-18 10:37:52', 'Ironmail', 2, 42, NULL, '75000', 1),
(15, '2019-10-18 16:37:29', 'Prout', 2, 99, NULL, '62000', 1);

-- --------------------------------------------------------

--
-- Structure de la table `player_weapon`
--

CREATE TABLE `player_weapon` (
  `player_id` int(11) NOT NULL,
  `weapon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `player_weapon`
--

INSERT INTO `player_weapon` (`player_id`, `weapon_id`) VALUES
(2, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `created_at`, `name`, `level`) VALUES
(1, '2019-10-18 14:46:31', 'Team rouge', 2),
(2, '2019-10-18 14:46:31', 'Team bleue', 3),
(3, '0000-00-00 00:00:00', 'Team jaune', 2),
(4, '0000-00-00 00:00:00', 'Team orange', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `is_enabled` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `created_at`, `name`, `email`, `is_enabled`) VALUES
(1, '2019-10-17 12:01:29', 'Toto le retour', 'toto@mail.fr', 1),
(3, '0000-00-00 00:00:00', 'Jean', NULL, 0),
(4, '2019-10-17 14:15:00', 'Jean', NULL, 0),
(5, '2019-10-17 14:15:00', 'Jean', NULL, 0),
(6, '2019-10-17 14:15:00', '', 'jean@mail.fr', 1),
(7, '2019-10-17 14:37:00', 'Toto', 'toto@mail.fr', 1),
(8, '2019-10-17 16:45:21', 'John', 'john@mail.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `weapon`
--

CREATE TABLE `weapon` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `weapon`
--

INSERT INTO `weapon` (`id`, `created_at`, `name`) VALUES
(1, '0000-00-00 00:00:00', 'Arc'),
(2, '0000-00-00 00:00:00', 'Épée');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TEAM` (`team`);

--
-- Index pour la table `player_weapon`
--
ALTER TABLE `player_weapon`
  ADD PRIMARY KEY (`player_id`,`weapon_id`),
  ADD KEY `FK_WEAPON` (`weapon_id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weapon`
--
ALTER TABLE `weapon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `weapon`
--
ALTER TABLE `weapon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_TEAM` FOREIGN KEY (`team`) REFERENCES `team` (`id`);

--
-- Contraintes pour la table `player_weapon`
--
ALTER TABLE `player_weapon`
  ADD CONSTRAINT `FK_PLAYER` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`),
  ADD CONSTRAINT `FK_WEAPON` FOREIGN KEY (`weapon_id`) REFERENCES `weapon` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
