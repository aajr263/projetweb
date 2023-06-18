-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 juin 2023 à 21:53
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_université`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `mail` varchar(50) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prénom` varchar(50) DEFAULT NULL,
  `Motdepass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`mail`, `Nom`, `Prénom`, `Motdepass`) VALUES
('frz@htma.com', 'KOUADIO', 'rebecca', 'ba3c24c47e7e477d5d2ecd1a28e22a9a7f20d188'),
('adamafanta12@gmail.com', 'ADAMA', 'rebecca', 'e9f159657ec00a0f093a746f0d62a384e0e74f88');

-- --------------------------------------------------------

--
-- Structure de la table `compte_etud`
--

DROP TABLE IF EXISTS `compte_etud`;
CREATE TABLE IF NOT EXISTS `compte_etud` (
  `Matricule` varchar(12) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filière`
--

DROP TABLE IF EXISTS `filière`;
CREATE TABLE IF NOT EXISTS `filière` (
  `id_filière` int NOT NULL AUTO_INCREMENT,
  `Nom_filière` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_filière`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `filière`
--

INSERT INTO `filière` (`id_filière`, `Nom_filière`) VALUES
(1, 'science informatique'),
(3, 'science mathematique'),
(4, 'science mecanique'),
(5, 'science biologique'),
(6, 'science chimique'),
(7, 'genie civil');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `Matricule` varchar(12) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prénom` varchar(25) NOT NULL,
  `Niveau` varchar(25) NOT NULL,
  `Mail` varchar(25) NOT NULL,
  `Contact` int NOT NULL,
  `Genre` varchar(25) NOT NULL,
  `Message` varchar(25) DEFAULT NULL,
  `id_Filière` int NOT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `id_filière` (`id_Filière`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`Matricule`, `Nom`, `Prénom`, `Niveau`, `Mail`, `Contact`, `Genre`, `Message`, `id_Filière`) VALUES
('124589RA', 'AMIAN', 'raissa', 'Licence 3', 'amianraissa18@gmail.com', 7372856, 'F', '', 1),
('123456LA', 'ADAMA', 'Fanta', 'Licence 2', 'adamafanta12@gmail.com', 98776470, 'F', '', 4),
('452367TK', 'TRAH', 'kris', 'Master 1', 'trahkris@gmail.com', 708903421, 'M', '', 4),
('345467YM', 'Yayo', 'melissa', 'Master 2', 'yayomelissa23@gmail.com', 2147483647, 'F', '', 6),
('345678KD', 'Koutouan', 'Doriane', 'Master 1', 'koutouandoriane12@gmail.c', 803564312, 'F', '', 7),
('100896KR ', 'KONAN', 'REBECA', 'Licence 2', 'konanrebeca12@gmail.com', 709676410, 'F', '', 5),
('110876YT', 'TRAORE', 'SOULEYMANE', 'Licence 2', 'traoresouleymane34@gmail.', 675532134, 'M', '', 4),
('127865', 'Sey', 'loraine', 'Licence 2', 'seyloraine13@gmail.com', 1236787, 'F', '', 7);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `Id_note` int NOT NULL AUTO_INCREMENT,
  `Matricule` varchar(50) NOT NULL,
  `Nom` varchar(12) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Niveau` varchar(50) NOT NULL,
  `id_filière` int NOT NULL,
  `Matière` varchar(50) NOT NULL,
  `Credit` int NOT NULL,
  `Note` int NOT NULL,
  PRIMARY KEY (`Id_note`),
  KEY `id_filière` (`id_filière`),
  KEY `Matricule` (`Matricule`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`Id_note`, `Matricule`, `Nom`, `Prénom`, `Niveau`, `id_filière`, `Matière`, `Credit`, `Note`) VALUES
(5, '452367TK', 'TRAH', 'kris', 'Master 1', 4, 'probabilité', 6, 14),
(4, '452367TK', 'TRAH', 'kris', 'Master 1', 4, 'physique', 3, 13),
(6, '1234567LA', 'ADAMA', 'Fanta', 'Licence 2', 5, 'svt', 4, 11);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `Matricule` varchar(12) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prénom` varchar(25) NOT NULL,
  `Mail` varchar(25) NOT NULL,
  `Contact` int NOT NULL,
  `totalpaye` int DEFAULT NULL,
  `versement` int DEFAULT NULL,
  `Restepaye` int DEFAULT NULL,
  `Datepaiem` date DEFAULT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`Matricule`, `Nom`, `Prénom`, `Mail`, `Contact`, `totalpaye`, `versement`, `Restepaye`, `Datepaiem`) VALUES
('452367TK', 'TRAH', 'kris', 'trahkris@gmail.com', 708903421, 200000, 100000, 50000, '2023-06-18'),
('123456K', 'amian', 'raissa', 'amianraissa26@gmail.com', 708964565, 100000, 2000000, 100000, '2023-06-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
