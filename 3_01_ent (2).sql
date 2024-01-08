-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 jan. 2024 à 13:58
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
-- Base de données : `3.01_ent`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id_actu` int NOT NULL AUTO_INCREMENT,
  `url_actu` varchar(16) NOT NULL,
  `theme_actu` varchar(16) NOT NULL,
  `date_actu` date NOT NULL,
  `contenu_actu` text NOT NULL,
  `titre_actu` varchar(128) NOT NULL,
  PRIMARY KEY (`id_actu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int NOT NULL AUTO_INCREMENT,
  `contenu_commentaire` text NOT NULL,
  `date_commentaire` date NOT NULL,
  `id_post` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `fk_commentaire_utilisateur` (`id_utilisateur`),
  KEY `fk_commentaire_post` (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `id_devoir` int NOT NULL AUTO_INCREMENT,
  `matiere` varchar(16) NOT NULL,
  `dare_rendu` date NOT NULL,
  `url_depot` varchar(16) NOT NULL,
  `explication` varchar(120) NOT NULL,
  PRIMARY KEY (`id_devoir`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `id_materiel` int NOT NULL AUTO_INCREMENT,
  `nom_materiel` varchar(16) NOT NULL,
  `numero_materiel` int NOT NULL,
  `url_materiel` varchar(128) NOT NULL,
  PRIMARY KEY (`id_materiel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nom_menu` varchar(16) NOT NULL,
  `ingredient` varchar(1024) NOT NULL,
  `date_menu` date NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int NOT NULL AUTO_INCREMENT,
  `detail_note` varchar(255) NOT NULL,
  `nom_cours` varchar(16) NOT NULL,
  `note` float NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `contenu_post` text NOT NULL,
  `categorie_post` varchar(16) NOT NULL,
  `date_post` date NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_post_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation_materiel`
--

DROP TABLE IF EXISTS `reservation_materiel`;
CREATE TABLE IF NOT EXISTS `reservation_materiel` (
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_reservation` int NOT NULL,
  `id_materiel` int NOT NULL,
  KEY `fk_reservation_materiel_id_reservation` (`id_reservation`),
  KEY `fk_reservation_materiel_id_materiel` (`id_materiel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation_salle`
--

DROP TABLE IF EXISTS `reservation_salle`;
CREATE TABLE IF NOT EXISTS `reservation_salle` (
  `date_debut_s` date NOT NULL,
  `date_fin_s` date NOT NULL,
  `horaire_debut_s` time NOT NULL,
  `horaire_fin_s` time NOT NULL,
  `id_salle` int NOT NULL,
  `id_reservation` int NOT NULL,
  KEY `fk_reservation_salle_id_salle` (`id_salle`),
  KEY `fk_reservation_salle_id_reservation` (`id_reservation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id_restaurant` int NOT NULL AUTO_INCREMENT,
  `nom_restaurant` varchar(120) NOT NULL,
  `horaire` varchar(1024) NOT NULL,
  `adresse_restaurant` varchar(128) NOT NULL,
  PRIMARY KEY (`id_restaurant`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `numero_salle` int NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(16) NOT NULL,
  `age` int NOT NULL,
  `url_pp` varchar(128) NOT NULL,
  `adresse` varchar(128) NOT NULL,
  `formation` varchar(32) NOT NULL,
  `numero_etudiant` int NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `permission_level` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
