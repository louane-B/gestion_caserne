-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 25 fév. 2026 à 16:21
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qc_rescue`
--
CREATE DATABASE IF NOT EXISTS `qc_rescue` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `qc_rescue`;

-- --------------------------------------------------------

--
-- Structure de la table `caserne`
--

CREATE TABLE `caserne` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `caserne`
--

INSERT INTO `caserne` (`id`, `nom`, `adresse`, `ville`, `province`, `code_postal`, `telephone`) VALUES
(1, 'Caserne 01 Rivière-du-Loup', '45 Rue des Sapeurs', 'Rivière-du-Loup', 'Québec', 'G5R 2B3', '418-555-1020'),
(2, 'Caserne 02 Québec', '1200 Avenue des Pompiers', 'Québec', 'Québec', 'G1K 3A5', '418-555-2040'),
(3, 'Caserne 03 Montréal', '250 Boulevard des Secours', 'Montréal', 'Québec', 'H2X 1Y4', '514-555-3300'),
(4, 'Caserne 04 Sherbrooke', '78 Rue du Feu', 'Sherbrooke', 'Québec', 'J1H 4M2', '819-555-4500'),
(5, 'Caserne 05 Trois-Rivières', '3000 Rue des Flammes', 'Trois-Rivières', 'Québec', 'G8Z 2T6', '819-555-5600'),
(6, 'Caserne 12 – Rivière-du-Loup', '45 Rue des Sapeurs', 'Rivière-du-Loup', 'Québec', 'G5R 3Y7', '418-555-1298');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `id` int NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL,
  `type_intervention` varchar(100) NOT NULL,
  `id_caserne` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`id`, `adresse`, `dateTime`, `type_intervention`, `id_caserne`) VALUES
(1, '200 Rue Principale, Rivière-du-Loup', '2024-02-10 14:30:00', 'Incendie de bâtiment', 1),
(2, '55 Boulevard Charest, Québec', '2024-03-02 09:15:00', 'Feu de véhicule', 2),
(3, '800 Rue Sainte-Catherine, Montréal', '2024-01-28 22:45:00', 'Feu de cuisine', 3),
(4, '12 Rue des Bois, Sherbrooke', '2024-02-18 16:10:00', 'Feu de forêt', 4),
(5, '450 Rue des Prairies, Trois-Rivières', '2024-03-05 11:50:00', 'Sauvetage technique', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caserne`
--
ALTER TABLE `caserne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caserne` (`id_caserne`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caserne`
--
ALTER TABLE `caserne`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `intervention_ibfk_1` FOREIGN KEY (`id_caserne`) REFERENCES `caserne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
