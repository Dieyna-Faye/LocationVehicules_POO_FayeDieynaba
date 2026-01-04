-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 03 jan. 2026 à 12:41
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location_vehicules`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `date_inscription` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `idx_nom` (`nom`,`prenom`),
  KEY `idx_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `date_inscription`) VALUES
(1, 'Diop', 'Amadou', 'amadou.diop@email.com', '771234567', '15 Rue de la Médina, Dakar', '2025-12-16 12:25:15'),
(2, 'Ndiaye', 'Fatou', 'fatou.ndiaye@email.com', '772345678', '25 Avenue Blaise Diagne, Dakar', '2025-12-16 12:25:15'),
(3, 'Sow', 'Mamadou', 'mamadou.sow@email.com', '773456789', '10 Rue Parchappe, Dakar', '2025-12-16 12:25:15'),
(4, 'Fall', 'Aissatou', 'aissatou.fall@email.com', '774567890', '8 Boulevard de la République, Dakar', '2025-12-16 12:25:15'),
(5, 'Kane', 'Ibrahima', 'ibrahima.kane@email.com', '775678901', '30 Rue Moussé Diop, Dakar', '2025-12-16 12:25:15'),
(7, 'faye', '', 'fayedieynaba030@gmail.com', '77 890 67 59', '', '2026-01-02 00:24:12'),
(9, 'Abou Seck', '', 'fayedieynaba030@gdrfil.com', '77 890 67 59', '', '2026-01-02 00:26:07');

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `vehicule_id` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_retour_effectif` datetime DEFAULT NULL,
  `prix_total` decimal(10,2) NOT NULL,
  `statut` enum('en_cours','terminee','annulee') DEFAULT 'en_cours',
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_client` (`client_id`),
  KEY `idx_vehicule` (`vehicule_id`),
  KEY `idx_dates` (`date_debut`,`date_fin`),
  KEY `idx_statut` (`statut`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`id`, `client_id`, `vehicule_id`, `date_debut`, `date_fin`, `date_retour_effectif`, `prix_total`, `statut`, `date_creation`) VALUES
(1, 1, 1, '2024-12-10', '2024-12-15', NULL, 225.00, '', '2025-12-16 12:25:15'),
(2, 2, 6, '2024-12-12', '2024-12-14', NULL, 70.00, '', '2025-12-16 12:25:15'),
(3, 3, 9, '2024-12-01', '2024-12-05', NULL, 675.00, 'terminee', '2025-12-16 12:25:15'),
(4, 2, 11, '2025-12-24', '2025-12-23', NULL, 50000.00, '', '2025-12-30 02:44:28'),
(5, 3, 11, '2025-12-24', '2025-12-18', NULL, 50000.00, '', '2025-12-30 02:45:46'),
(6, 1, 11, '2025-12-22', '2025-12-23', NULL, 50000.00, '', '2025-12-30 02:46:04'),
(7, 5, 5, '2025-12-23', '2025-12-26', NULL, 270.00, '', '2025-12-30 23:00:38'),
(8, 5, 11, '2025-12-31', '2026-01-03', NULL, 150000.00, 'en_cours', '2025-12-30 23:09:56'),
(9, 5, 17, '2025-12-28', '2025-12-26', NULL, 50090.00, '', '2025-12-31 02:12:41'),
(10, 9, 18, '2026-01-23', '2026-01-14', NULL, 50000.00, 'en_cours', '2026-01-02 00:34:21'),
(11, 9, 25, '2026-01-02', '2026-01-03', NULL, 30000.00, 'en_cours', '2026-01-02 16:42:29'),
(12, 9, 25, '2026-01-02', '2026-01-03', NULL, 30000.00, 'en_cours', '2026-01-02 16:44:58');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modele` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int NOT NULL,
  `immatriculation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_jour` decimal(10,2) NOT NULL,
  `type` enum('voiture','moto','camion') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT '1',
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `immatriculation` (`immatriculation`),
  KEY `idx_type` (`type`),
  KEY `idx_disponible` (`disponible`),
  KEY `idx_marque` (`marque`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `marque`, `modele`, `annee`, `immatriculation`, `prix_jour`, `type`, `image`, `disponible`, `date_creation`) VALUES
(1, 'Peugeot', '208', 2022, 'AB-123-CD', 45.00, 'voiture', NULL, 1, '2025-12-16 12:25:13'),
(5, 'Mercedes', 'Classe A', 2023, 'QR-345-ST', 90.00, 'voiture', NULL, 1, '2025-12-16 12:25:13'),
(6, 'Yamaha', 'MT-07', 2022, 'UV-678-WX', 35.00, 'moto', NULL, 1, '2025-12-16 12:25:13'),
(9, 'Iveco', 'Daily', 2021, 'GH-567-IJ', 120.00, 'camion', NULL, 1, '2025-12-16 12:25:13'),
(11, 'range', '65tyg', 0, 'ADBCFG', 50000.00, 'voiture', NULL, 1, '2025-12-30 02:10:13'),
(17, 'range', 'unmbv', 0, 'nmhp', 50090.00, 'moto', '1767145004-téléchargement (3).jfif', 1, '2025-12-31 01:21:05'),
(18, 'rang', 'Serie 3', 0, 'AV-78-TY', 50000.00, 'voiture', '1767313169-téléchargement (2).jfif', 1, '2026-01-02 00:12:46'),
(19, 'Mercedes', 'Serie 3', 0, 'DC-HG-ui', 90000.00, 'voiture', '1767314154-téléchargement (3).jfif', 1, '2026-01-02 00:35:54'),
(24, 'Mercedes', '65tyg', 2020, 'DV-BN-90', 20000.00, 'voiture', '1767370409-Ford Edge goes from dull to dynamic with ST performance package.jpg', 1, '2026-01-02 16:13:29'),
(25, 'Mercedes', 'Serie 3', 2023, 'CV-FG-HJ', 30000.00, 'voiture', '1767371967-Ford Edge goes from dull to dynamic with ST performance package.jpg', 1, '2026-01-02 16:39:27');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
