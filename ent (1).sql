-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 jan. 2024 à 22:35
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ent`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id_actu` int NOT NULL AUTO_INCREMENT,
  `url_actu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `theme_actu` varchar(16) NOT NULL,
  `date_actu` date NOT NULL,
  `contenu_actu` text NOT NULL,
  `titre_actu` varchar(128) NOT NULL,
  PRIMARY KEY (`id_actu`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actu`, `url_actu`, `theme_actu`, `date_actu`, `contenu_actu`, `titre_actu`) VALUES
(1, 'https://www.google.com/search?sca_esv=597300995&rlz=1C1YTUH_frFR1040FR1040&sxsrf=ACQVn09Nrc_yunjN8EMrbOgq3-9QkOxftw:1704919789710&q=JO&tbm=isch&source=lnms&sa=X&ved=2ahUKEwi4p76T2dODAxUzTaQEHYCmDt4Q0pQJegQIDRAB&biw=1536&bih=730&dpr=1.25#imgrc=RfHoqjTjdWzt1M', 'sport', '2024-01-10', 'Les aventures commencent bientot ! venez rejoindre l\'équipe sportive du BDE de l\'ESIEE le Lundi et Vendredi de 20h à 22h. ', 'JO 2024'),
(2, 'https://img-3.journaldesfemmes.fr/nvUq91h2KhRQd4PAAhJAhGZPiBU=/1500x/smart/3ffba7140c1a4d1cbbef3427a9806d3c/ccmcms-jdf/36619254.jpg', '', '2024-01-10', 'Festival de la cuisine asiatique et libanaise dans les jardins de l\'Université Gustave Eiffel. Une immense tablée, pleins de plats et de saveurs ! Venez nombreux ! ', 'Cuisine gastronomique'),
(3, 'https://img.filmsactu.net/datas/films/p/l/player-one/xl/player-one-5aa6eabcc222d.jpg', '', '2024-01-10', 'Venez découvrir en pleins airs les coulisses du film de Luc Besson, Ready Player One. Un film de science fiction de Spielberg !', 'CinÃ©ma ');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id_materiel`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`id_materiel`, `nom_materiel`, `numero_materiel`) VALUES
(1, 'Zoom', 1),
(2, 'Caméra', 2),
(3, 'Trépieds Photo', 3),
(4, 'Osmo', 4),
(5, 'Back Light', 5),
(6, 'Casque', 6),
(7, 'Appareil Photo', 7),
(8, 'Casque', 8),
(9, 'Carte SD', 9),
(10, 'Drone', 10),
(11, 'Micro', 11);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nom_menu` varchar(20) NOT NULL,
  `entree_menu` varchar(30) NOT NULL,
  `plat1_menu` varchar(30) NOT NULL,
  `plat2_menu` varchar(30) NOT NULL,
  `dessert_menu` varchar(30) NOT NULL,
  `date_menu` date NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom_menu`, `entree_menu`, `plat1_menu`, `plat2_menu`, `dessert_menu`, `date_menu`) VALUES
(1, 'Menu d\'Asie', 'Nems aux crevettes', 'Poulet au curry thaï', 'Nouilles sautées aux légumes', 'Mochi glacé ', '2024-01-10'),
(2, 'Menu Méditerranée', 'Salade grecque', 'Moussaka végétarienne ', 'Poisson grillé ', 'Baklava', '2024-01-10'),
(3, 'Menu du Terroir', 'Terrine', 'Coq au vin', 'Ratatouille', 'Tarte au pommes', '2024-01-10'),
(5, 'Menu du Terroir', 'Terrine', 'Coq au vin', 'Ratatouille', 'Tarte au pommes', '2024-01-11'),
(6, 'Menu Végétalien', 'Velouté de tomates', 'Risotto aux champignons', 'Chili sin carne', 'Crumble aux fruits rouges', '2024-01-10'),
(7, 'Menu Végétalien', 'Velouté de tomates', 'Risotto aux champignons', 'Chili sin carne', 'Crumble aux fruits rouges', '2024-01-11'),
(8, 'Menu Méditerranée', 'Salade grecque', 'Moussaka végétarienne ', 'Poisson grillé ', 'Baklava', '2024-01-11'),
(9, 'Menu d\'Asie', 'Nems aux crevettes', 'Poulet au curry thaï', 'Nouilles sautées aux légumes', 'Mochi glacé ', '2024-01-11'),
(10, 'Menu Méditerranée', 'Carpaccio de tomates et moza', 'Pizza', 'Paella', 'Panna cotta', '2024-01-12'),
(11, 'Menu d\'Asie', 'Rouleaux de printemps', 'Saumon teriyaki', 'Pad thaï au poulet', 'Beignet', '2024-01-12'),
(12, 'Menu Végétalien', 'Salade de quinoa', 'Tofu sauté et légumes', 'Curry de pois chiches', 'Sorbet aux fruits ', '2024-01-12'),
(13, 'Menu du Terroir', 'Quiche lorraine', 'Blanquette de veau', 'Gratin dauphinois', 'Crème brulée', '2024-01-12'),
(15, 'Estival', 'Salade de tomate', 'Pâte carbonara', 'Pizza ', 'Tiramisu', '2024-01-26');

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
  `login` varchar(32) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id_note`, `detail_note`, `nom_cours`, `note`, `login`) VALUES
(58, 'Portfolio', 'D.back', 11, 'admin'),
(59, 'Flyers', 'Graphisme', 14, 'admin'),
(56, 'Livre des mots', 'C.Artistique', 15, 'admin'),
(57, 'Droit', 'Intégration', 9, 'admin '),
(54, 'Boostrap', 'Intégration', 15, 'admin'),
(55, 'Entretient', 'anglais', 13, 'admin'),
(52, 'Flyers', 'Graphisme', 15, 'idriss'),
(53, 'SAE Campagne', 'Intégration', 14, 'idriss'),
(51, 'Journal', 'C.Artistique', 14, 'idriss'),
(50, 'Contrôle', 'C.numérique', 16, 'idriss'),
(49, 'Oral Boostrap', 'Intégration', 15, 'idriss'),
(48, 'Oral', 'anglais', 16, 'lou-anne'),
(47, 'SAE 3.01', 'D.WEB', 16, 'lou-anne'),
(46, 'SAE 2.02', 'Intégration', 16, 'lou-anne'),
(45, 'SAE 1.03', 'Intégration', 12, 'lou-anne'),
(44, 'SAE 1.06', 'Intégration', 15, 'lou-anne'),
(43, 'SAE 1.03', 'Intégration', 14, 'lou-anne'),
(42, 'SAE 2.03', 'Intégration', 14, 'nahina'),
(41, 'SAE Podcast', 'audiovisuel', 16, 'nahina'),
(40, 'SAE 1.06', 'Intégration', 11, 'nahina'),
(39, 'SAE 1', 'C.numérique', 13, 'nahina'),
(38, 'SAE 1.05 Site de musique', 'Intégration', 12, 'nahina');

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
  `titre_post` varchar(30) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_post_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `contenu_post`, `categorie_post`, `date_post`, `id_utilisateur`, `titre_post`) VALUES
(1, 'Allez au parc en pleins printemps quel super idée ! L\'association sportive du BDE Gustave Eiffel vous invite à un picnic en pleins air', 'sortie', '2024-01-10', 4, 'Printemps');

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
  `date_debut_m` date NOT NULL,
  `date_fin_m` date NOT NULL,
  `horaire_debut_m` time NOT NULL,
  `horaire_fin_m` time NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_materiel` int NOT NULL,
  KEY `fk_reservation_materiel_id_utilisateur` (`id_utilisateur`),
  KEY `fk_reservation_materiel_id_materiel` (`id_materiel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation_materiel`
--

INSERT INTO `reservation_materiel` (`date_debut_m`, `date_fin_m`, `horaire_debut_m`, `horaire_fin_m`, `id_utilisateur`, `id_materiel`) VALUES
('2024-01-20', '2024-01-12', '00:00:16', '00:00:13', 0, 0),
('2024-01-20', '2024-01-12', '00:00:16', '00:00:13', 0, 0),
('2024-02-10', '2024-02-01', '00:00:17', '00:00:13', 0, 0),
('2024-02-10', '2024-02-01', '00:00:17', '00:00:13', 0, 0),
('2024-01-12', '2024-01-18', '00:00:16', '00:00:13', 0, 0),
('2024-01-25', '2024-01-18', '00:00:13', '00:00:18', 0, 0),
('2024-01-13', '2024-01-13', '00:00:13', '00:00:16', 0, 0),
('2024-01-21', '2024-01-12', '00:00:16', '00:00:15', 0, 0),
('2024-01-13', '2024-01-05', '00:00:13', '00:00:13', 0, 0),
('2024-01-19', '2024-01-28', '00:00:16', '00:00:14', 0, 0),
('2024-01-06', '2024-01-14', '00:00:14', '00:00:18', 0, 0),
('2024-01-21', '2024-01-19', '00:00:14', '00:00:14', 0, 0),
('2024-01-19', '2024-01-06', '00:00:17', '00:00:14', 0, 0),
('2024-01-13', '2024-01-12', '00:00:15', '00:00:14', 0, 0),
('2024-01-28', '2024-01-18', '00:00:14', '00:00:14', 0, 0),
('2024-02-10', '2024-02-01', '00:00:18', '00:00:14', 0, 0),
('3220-03-03', '6000-12-02', '00:00:12', '00:00:20', 0, 0),
('2024-01-12', '2024-01-27', '00:00:15', '00:00:15', 0, 0),
('2024-01-17', '2024-01-17', '17:59:00', '20:57:00', 7, 6),
('2024-01-10', '2024-01-13', '22:35:00', '22:35:00', 4, 6),
('2024-01-19', '2024-01-27', '22:47:00', '01:44:00', 4, 5),
('2024-01-19', '2024-01-19', '01:57:00', '01:57:00', 4, 4),
('2024-01-20', '2024-01-26', '03:02:00', '02:02:00', 4, 6);

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
  `id_utilisateur` int NOT NULL,
  KEY `fk_reservation_salle_id_utilisateur` (`id_utilisateur`),
  KEY `fk_reservation_salle_id_salle` (`id_salle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservation_salle`
--

INSERT INTO `reservation_salle` (`date_debut_s`, `date_fin_s`, `horaire_debut_s`, `horaire_fin_s`, `id_salle`, `id_utilisateur`) VALUES
('2024-02-01', '2024-01-04', '18:08:00', '14:11:00', 0, 0),
('2024-01-22', '2024-01-04', '15:32:00', '15:31:00', 0, 0),
('2024-01-25', '2024-01-20', '22:32:00', '02:29:00', 0, 0),
('2024-01-10', '2024-01-18', '22:33:00', '22:34:00', 0, 0),
('2024-01-20', '2024-01-27', '01:33:00', '22:37:00', 0, 0),
('2024-01-19', '2024-01-26', '22:36:00', '22:36:00', 0, 0),
('2024-01-19', '2024-01-20', '01:34:00', '01:34:00', 0, 0),
('2024-01-30', '2024-02-06', '22:43:00', '22:39:00', 0, 0),
('2024-01-19', '2024-01-27', '22:42:00', '22:43:00', 0, 0),
('2024-01-12', '2024-01-27', '22:42:00', '22:43:00', 0, 0),
('2024-01-19', '2024-01-20', '00:40:00', '01:40:00', 0, 0),
('2024-01-20', '2024-01-19', '22:44:00', '22:44:00', 0, 0),
('2024-01-05', '2024-01-27', '22:47:00', '22:50:00', 0, 0),
('2024-01-13', '2024-01-26', '01:47:00', '01:47:00', 0, 0),
('2024-01-20', '2024-01-31', '01:50:00', '22:51:00', 0, 0),
('2024-01-19', '2024-02-01', '23:06:00', '02:02:00', 0, 0),
('2024-01-05', '2024-01-24', '01:04:00', '02:04:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `id_restaurant` int NOT NULL AUTO_INCREMENT,
  `nom_restaurant` varchar(120) NOT NULL,
  `type_restaurant` varchar(14) NOT NULL,
  `heure_ouverture` time NOT NULL,
  `heure_fermeture` time NOT NULL,
  `adresse_restaurant` varchar(128) NOT NULL,
  PRIMARY KEY (`id_restaurant`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id_restaurant`, `nom_restaurant`, `type_restaurant`, `heure_ouverture`, `heure_fermeture`, `adresse_restaurant`) VALUES
(1, 'Cafèt Copernic', 'cafet', '08:30:00', '16:00:00', ' 5 boulevard Descartes 77420 Champs-sur-Marne'),
(2, 'L\'Arlequin - Copernic', 'resto', '11:30:00', '14:00:00', ' 5 boulevard Descartes 77420 Champs-sur-Marne'),
(3, 'Cafèt IUT', 'cafet', '10:00:00', '14:00:00', '2 rue Albert Einstein 77420 Champs-sur-Marne'),
(4, 'Lavoisier Express', 'cafet', '08:30:00', '16:00:00', 'Lavosier, rue Galilée 77420 Champs-sur-Marne'),
(5, 'Crous - Bienvenüe', 'resto', '11:30:00', '14:00:00', '10 boulevard Newton 77420 Champs-sur-Marne'),
(6, 'Resto U - ESIEE', 'resto', '11:30:00', '14:00:00', '2 boulevard Blaise Pascal 93160 Noisy le Grand'),
(7, 'Cafèt ESIEE', 'cafet', '10:30:00', '15:30:00', '2 boulevard Blaise Pascal 93160 Noisy le Grand'),
(8, 'Cafèt ENSG', 'cafet', '08:00:00', '18:00:00', '12 Boulevard Copernic 77420 Champs-sur-Marne');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `numero_salle` int NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `numero_salle`) VALUES
(1, 120),
(2, 121),
(3, 123),
(4, 124),
(5, 125),
(6, 126),
(7, 201),
(8, 169),
(9, 22),
(10, 23),
(11, 24),
(12, 26),
(13, 157),
(14, 25),
(15, 223);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(16) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `url_pp` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT './img/profil_lambda.png',
  `adresse` varchar(128) DEFAULT NULL,
  `formation` varchar(32) DEFAULT NULL,
  `numero_etudiant` int DEFAULT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT '0',
  `info_generales` text NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `nom`, `prenom`, `age`, `url_pp`, `adresse`, `formation`, `numero_etudiant`, `mot_de_passe`, `isAdmin`, `info_generales`) VALUES
(3, 'truc', 'Truc ', 'Truc', 22, './img/profil_lambda.png', '33 rue du truc 75013 Paris', 'BUT MMI', 216544, '$2y$10$j15xxPTaE1bqmIu5rGJ7keVuTCVaIklT5B7mfXof.dyPy7tPnUd7G', 0, 'Étudiant motivé en recherche d\'alternance'),
(4, 'admin', 'Admin', 'Admin', 19, './img/profil_admin.png', '33 rue Admin 77420 Chelles', 'BUT Informatique', 125649, '$2y$10$kc/KKAggfxb9UfGQrlvNaeImmjvI4xTtwl8DfMYGshGd5xj9LIzly', 1, 'Gérant du site de l\'ENT depuis décembre 2023'),
(7, 'nahina', 'Boireau', 'Nahina', 20, './img/profil_lambda.png', '72 rue du dessous des berges 77420 Chelles', 'BUT MMI', 272269, '$2y$10$10JinVzC1ZG0IWkDIgZsPeAXLkDAtMHInK9FkH.YH2vhuKtLvHzIu', 0, 'Étudiante passionnée de vidéo'),
(8, 'lou-anne', 'Dubille', 'Lou-Anne', 19, './img/profil_lambda.png', '15 rue de Noisiel 77240 Noisy-Champs', 'BUT MMI', 675849, '$2y$10$wBh8XGwjJpqpmeKQO69/zeKTd1uJji9/VimuJhqmYtuXoLh6XvXLO', 0, 'Rentrer les informations...'),
(9, 'idriss', 'Merouane', 'Idriss', 19, './img/profil_lambda.png', '32 rue Albert Einstein 75015 Paris', 'BUT MMI', 231156, '$2y$10$onfluit73ef8IUpUICGNFOs2QXhVMz4BhIdwF4n2q/ylwgv6XCeKm', 0, 'Étudiant passionné de photographie');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
