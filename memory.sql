-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 01 fév. 2022 à 17:28
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `id_utilisateurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `score`, `id_utilisateurs`) VALUES
(2, 14, 1),
(17, 18, 1),
(21, 13, 1),
(22, 30, NULL),
(23, 31, NULL),
(24, 4, NULL),
(25, 5, NULL),
(26, 36, NULL),
(27, 37, NULL),
(28, 6, 12),
(29, 7, 12),
(30, 1, 12),
(31, 1, 12),
(32, 8, 12),
(33, 9, 12),
(34, 6, 12),
(35, 7, 12),
(36, 5, 12),
(37, 6, 12),
(38, 5, 12),
(39, 6, 12);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'laura', 'lolo'),
(12, 'test', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;