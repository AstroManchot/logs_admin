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
-- Structure de la table `logsobservations_instruments`
--

CREATE TABLE `logsobservations_instruments` (
  `instrument_id` int(11) NOT NULL,
  `instrument_name` text NOT NULL,
  `instrument_statut` text NOT NULL,
  `instrument_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logsobservations_instruments`
--

INSERT INTO `logsobservations_instruments` (`instrument_id`, `instrument_name`, `instrument_statut`, `instrument_date`) VALUES
(1, 'Cpapir', 'Actif', '2000-01-01'),
(2, 'Pesto', 'Actif', '2016-06-01'),
(3, 'Spectro', 'Actif', '1820-01-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logsobservations_instruments`
--
ALTER TABLE `logsobservations_instruments`
  ADD PRIMARY KEY (`instrument_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logsobservations_instruments`
--
ALTER TABLE `logsobservations_instruments`
  MODIFY `instrument_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
