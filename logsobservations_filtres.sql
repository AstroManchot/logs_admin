-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 29 jan. 2020 à 00:14
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `omm`
--

-- --------------------------------------------------------

--
-- Structure de la table `logsobservations_filtres`
--

CREATE TABLE `logsobservations_filtres` (
  `filtre_id` int(11) NOT NULL,
  `instrument` text NOT NULL,
  `filtres` text NOT NULL,
  `filtername_inst` text,
  `plage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logsobservations_filtres`
--

INSERT INTO `logsobservations_filtres` (`filtre_id`, `instrument`, `filtres`, `filtername_inst`, `plage`) VALUES
(1, 'Pesto', 'g\' (Pos. 1) 401-550 nm', 'g\'', ''),
(2, 'Pesto', 'r\' (Pos. 2) 562-695 nm', 'r\'', ''),
(3, 'Pesto', 'i\' (Pos. 3) 695-844 nm', 'i\'', ''),
(4, 'Pesto', 'z\' (Pos. 4) 826-920 nm', 'z\'', ''),
(5, 'Pesto', 'H&alpha; (Pos. 5) 656.3 nm', 'Ha\'', ''),
(6, 'Pesto', 'Ouvert (Pos. 6)', 'open', ''),
(7, 'Cpapir', 'I (0.85 &mu;m)', NULL, ''),
(8, 'Cpapir', 'J (1.25 &mu;m)', NULL, ''),
(9, 'Cpapir', 'Pa&beta;(1.2814 &mu;m)', NULL, ''),
(10, 'Cpapir', 'CH4 (1.57 &mu;m)', NULL, ''),
(11, 'Cpapir', 'H (1.65 &mu;m)', NULL, ''),
(12, 'Cpapir', 'CONT2 (2.033 &mu;m)', NULL, ''),
(13, 'Cpapir', 'HeI (2.062 &mu;m)', NULL, ''),
(14, 'Cpapir', 'CIV (2.081 &mu;m)', NULL, ''),
(15, 'Cpapir', 'H2 (2.122 &mu;m)', NULL, ''),
(16, 'Cpapir', 'Ks (2.150 &mu;m)', NULL, ''),
(17, 'Cpapir', 'Br&gamma; (2.165 &mu;m)', NULL, ''),
(18, 'Cpapir', 'HeII (2.192 &mu;m)', NULL, ''),
(19, 'Cpapir', 'CONT1 (2.255 &mu;m)', NULL, ''),
(20, 'Spectro', 'Aucun', NULL, ''),
(21, 'Spectro', 'BG12', NULL, ''),
(22, 'Spectro', 'BG38', NULL, ''),
(23, 'Spectro', 'GG395', NULL, ''),
(24, 'Spectro', 'GG495', NULL, ''),
(25, 'Spectro', 'CuSO4', NULL, ''),
(40, 'test', '324', '234', '234'),
(41, 'test', '324', '234', '234324'),
(43, '435', '432', '', '324');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logsobservations_filtres`
--
ALTER TABLE `logsobservations_filtres`
  ADD PRIMARY KEY (`filtre_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logsobservations_filtres`
--
ALTER TABLE `logsobservations_filtres`
  MODIFY `filtre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
