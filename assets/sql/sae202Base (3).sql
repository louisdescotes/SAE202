-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 14 juin 2024 à 13:36
-- Version du serveur : 10.3.39-MariaDB-0+deb10u2
-- Version de PHP : 8.3.3-1+0~20240216.17+debian10~1.gbp87e37b

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202Base`
--

-- --------------------------------------------------------

--
-- Structure de la table `JARDIN`
--

CREATE TABLE `JARDIN` (
  `idJardin` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ville` varchar(50) NOT NULL,
  `CP` int(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `taille` int(25) NOT NULL,
  `max` int(10) NOT NULL,
  `img` varchar(100) DEFAULT 'default.png',
  `ownerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `JARDIN`
--

INSERT INTO `JARDIN` (`idJardin`, `name`, `ville`, `CP`, `adresse`, `taille`, `max`, `img`, `ownerId`) VALUES
(96, 'Le Petit Jard', 'Troyes', 10000, '5 rue Brulard', 45, 4, '2024_06_14_12_31_14---1.jpeg', 1),
(97, 'La Grande Maison', 'Troyes', 10000, '10 Rue de la Paix', 78, 6, '2024_06_14_12_31_47---2.jpeg', 2),
(98, 'La Belle Vue', 'Troyes', 10000, '15 Avenue Victor Hugo', 53, 5, '2024_06_14_12_32_18---3.jpeg', 3),
(99, 'La Petite Ferme', 'Troyes', 10000, '20 rue des Champs', 62, 6, '2024_06_14_12_32_58---4.jpeg', 4),
(100, 'Le Coin Tranquille', 'Troyes', 10000, '25 Rue des Lilas', 24, 3, '2024_06_14_12_33_55---5.jpeg', 5),
(101, 'La Maison Blanche', 'Troyes', 10000, '30 Rue du Commerce', 90, 8, '2024_06_14_12_34_36---6.jpeg', 6),
(102, 'Le Jardin Secret', 'Troyes', 10000, '35 rue des Roses', 34, 3, '2024_06_14_12_35_05---7.jpeg', 7),
(103, 'La Petite Cabane', 'Troyes', 10000, '40 Rue des Violettes', 76, 5, '2024_06_14_12_35_49---8.jpeg', 8),
(104, 'Le Coin de Paradis', 'Troyes', 10000, '45 Rue du Paradis', 50, 4, '2024_06_14_12_36_19---9.jpeg', 9),
(105, 'La Grande Rustique', 'Troyes', 10000, '50 rue de la Grange', 89, 6, '2024_06_14_12_36_43---10.jpeg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `PARCELLE`
--

CREATE TABLE `PARCELLE` (
  `idParcelle` int(11) NOT NULL,
  `superficie` int(25) DEFAULT NULL,
  `jardinId` int(11) DEFAULT NULL,
  `occupantId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `PARCELLE`
--

INSERT INTO `PARCELLE` (`idParcelle`, `superficie`, `jardinId`, `occupantId`) VALUES
(209, 45, 96, NULL),
(210, 45, 96, NULL),
(211, 45, 96, NULL),
(212, 45, 96, NULL),
(213, 78, 97, 1),
(214, 78, 97, NULL),
(215, 78, 97, NULL),
(216, 78, 97, NULL),
(217, 78, 97, NULL),
(218, 78, 97, NULL),
(219, 53, 98, NULL),
(220, 53, 98, NULL),
(221, 53, 98, NULL),
(222, 53, 98, NULL),
(223, 53, 98, NULL),
(224, 62, 99, NULL),
(225, 62, 99, NULL),
(226, 62, 99, NULL),
(227, 62, 99, NULL),
(228, 62, 99, NULL),
(229, 62, 99, NULL),
(230, 24, 100, 7),
(231, 24, 100, NULL),
(232, 24, 100, NULL),
(233, 90, 101, NULL),
(234, 90, 101, NULL),
(235, 90, 101, NULL),
(236, 90, 101, NULL),
(237, 90, 101, NULL),
(238, 90, 101, NULL),
(239, 90, 101, NULL),
(240, 90, 101, NULL),
(241, 34, 102, NULL),
(242, 34, 102, NULL),
(243, 34, 102, NULL),
(244, 76, 103, NULL),
(245, 76, 103, NULL),
(246, 76, 103, NULL),
(247, 76, 103, NULL),
(248, 76, 103, NULL),
(249, 50, 104, NULL),
(250, 50, 104, NULL),
(251, 50, 104, NULL),
(252, 50, 104, NULL),
(253, 89, 105, NULL),
(254, 89, 105, NULL),
(255, 89, 105, NULL),
(256, 89, 105, NULL),
(257, 89, 105, NULL),
(258, 89, 105, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `PLANTE`
--

CREATE TABLE `PLANTE` (
  `idPlante` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `typePlanteId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `PLANTE`
--

INSERT INTO `PLANTE` (`idPlante`, `name`, `img`, `typePlanteId`) VALUES
(9, 'Origan doré', '2024_06_12_19_03_30---origan-dore5.jpg', 4),
(10, 'Thym citron argenté', '2024_06_12_19_04_39---thym-citron25.jpg', 4),
(11, 'TRIO d&#039;Origans', '2024_06_12_19_05_23---trio-origans400_1_3.jpg', 4),
(12, 'Thym commun', '2024_06_12_19_05_50---thym-commun-leaderplant.jpg', 4),
(13, 'Périlla Vert de Nankin - Shiso', '2024_06_12_19_06_37---perilla-vert-nankin-shiso1.jpg', 5),
(14, 'Camomille romaine', '2024_06_12_19_08_14---camomille-romaine1.jpg', 6),
(15, 'Herbe à Chats Neptune', '2024_06_12_19_09_16---nepeta-neptune1.jpg', 4),
(16, 'Thym laineux rampant Woody', '2024_06_12_19_09_51---thym-woody1.jpg', 4),
(17, 'Jiaogulan / Herbe de l\'immortalité', '2024_06_14_13_34_56---gymnostemma6.jpg', 7),
(18, 'Menthe poivrée', '2024_06_12_19_10_56---menthe-poivree1.jpg', 8),
(19, 'Monarde Rouge', '2024_06_12_19_11_29---monarda-bee-happy15.jpg', 9),
(20, 'Agastache réglisse', '2024_06_12_19_11_56---agastache-reglisse1_2.jpg', 4),
(21, 'Herbe du tigre', '2024_06_12_19_12_30---centella-asiatica1_2.jpg', 5),
(22, 'Marjolaine', '2024_06_12_19_12_58---marjolaine30.jpg', 4),
(23, 'Verveine Hollywood menthe', '2024_06_12_19_13_49---verveine-hollywood-menthe15.jpg', 10),
(24, 'Thym citron', '2024_06_12_19_46_12---thym-citron3.jpg', 4),
(25, 'Mélisse Citronnelle', '2024_06_12_19_46_41---melisse-aromatique-feuillage-leaderplant.jpg', 5),
(26, 'Agastache violette naine Beelicious Purple', '2024_06_12_19_47_19---agastache-beelicious-purple1.jpg', 4),
(27, 'Camphrier', '2024_06_12_19_47_47---cinnamomum-camphora_1.jpg', 11),
(28, 'Agastache fenouil Golden Jubilée', '2024_06_12_19_48_12---agastache-golden-jubilee-leaderplant.jpg', 4),
(29, 'Verveine odorante citronnelle', '2024_06_12_19_48_51---verveine-citronnelle.jpg', 10),
(30, 'Grand galanga', '2024_06_12_19_49_21---alpinia-galanga-3.jpg', 12),
(31, 'Citronnelle', '2024_06_12_19_49_44---citronnelle-gabon.jpg', 13),
(32, 'Menthe marocaine', '2024_06_12_19_50_05---menthe-marocaine4.jpg', 4),
(33, 'Thym Creeping Red', '2024_06_12_19_50_25---thym-creeping-red2_2.jpg', 4),
(34, 'Thym Nitens', '2024_06_12_19_51_24---thymus_nitens-wb-aromatiques-_gout-potager-sante-allelo-leaderplant-compressed_2.jpg', 4),
(35, 'Monarde fistuleuse', '2024_06_12_19_51_50---monarde-fistuleuse1_3.jpg', 9),
(36, 'Theier arbre a the', '2024_06_12_19_52_44---camelia-sinensis-1.jpg', 14),
(37, 'Thym commun Tabor', '2024_06_12_19_53_07---thym-tabor-floraison-leaderplant.jpg', 4),
(38, 'Origan panache', '2024_06_12_19_54_25---origan-panache8.jpg', 4),
(40, 'Thym serpolet', '2024_06_12_19_55_02---thymus_serpyllum_leaderplant_fleurs_1__1.jpg', 4),
(41, 'Agastache Black Adder', '2024_06_12_19_55_22---agastache-rugosa-black-adder-eaderplant_1_.jpg', 4),
(42, 'Bruyere commune Marlies', '2024_06_12_19_56_05---bruyere-marlies10.jpg', 15),
(43, 'Sauge officinale', '2024_06_12_19_56_20---sauge-officinale.jpg', 4),
(44, 'Sarriette rampante', '2024_06_12_19_56_38---sarriette-rampante2.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `RECETTE`
--

CREATE TABLE `RECETTE` (
  `idRecette` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `creatorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `RECETTE`
--

INSERT INTO `RECETTE` (`idRecette`, `name`, `description`, `img`, `creatorId`) VALUES
(43, 'Thé au Thym Citron et à la Menthe Poivrée', 'Infuser quelques feuilles de thym citron et de menthe poivrée dans de l\'eau chaude pendant 5-7 minutes. Filtrer et déguster.', '2024_06_14_13_23_29---the1.png', 1),
(44, 'Thé à la Camomille et à la Verveine Citronnelle', 'Infuser des fleurs de camomille et de la verveine citronnelle dans de l\'eau chaude pendant 5 minutes. Filtrer et servir.', '2024_06_14_13_24_46---the2.jpeg', 1),
(45, 'Thé à l\'Agastache Réglisse et à la Monarde Rouge', 'Faire infuser les feuilles d\'agastache réglisse et les pétales de monarde rouge dans de l\'eau chaude pendant 7-10 minutes. Filtrer avant de servir.', '2024_06_14_13_26_34---the3.jpeg', 1),
(46, 'Thé à l\'Agastache Réglisse et à la Monarde Rouge', 'Faire infuser les feuilles d\'agastache réglisse et les pétales de monarde rouge dans de l\'eau chaude pendant 7-10 minutes. Filtrer avant de servir.', '2024_06_14_13_27_34---the3.jpeg', 1),
(47, 'Thé au Jiaogulan et au Thym Laineux', 'Infuser les feuilles de jiaogulan et de thym laineux dans de l\'eau chaude juste sous le point d\'ébullition pendant 5 minutes. Filtrer et déguster.', '2024_06_14_13_28_56---the4.jpeg', 10),
(48, 'Thé à la Verveine Hollywood Menthe et au Thym Commun', 'Faire infuser les feuilles de verveine hollywood menthe et de thym commun dans de l\'eau chaude pendant 5-7 minutes. Filtrer avant de servir.', '2024_06_14_13_29_32---the5.jpeg', 10),
(49, 'Thé à la Verveine Odorante Citronnelle et à la Menthe Marocaine', 'Infuser les feuilles de verveine odorante citronnelle et de menthe marocaine dans de l\'eau chaude pendant 5 minutes. Filtrer et servir.', '2024_06_14_13_30_24---the6.jpeg', 2),
(50, 'Thé au Thym Citron Argenté et à la Sauge Officinale', 'Faire infuser le thym citron argenté et la sauge officinale dans de l\'eau chaude pendant 7 minutes. Filtrer avant de déguster.', '2024_06_14_13_30_52---the7.jpeg', 2),
(51, 'Thé au Périlla Vert de Nankin - Shiso et au Camphrier', 'Infuser les feuilles de périlla vert de Nankin - shiso et de camphrier dans de l\'eau chaude pendant 5-7 minutes. Filtrer avant de servir.', '2024_06_14_13_31_31---the8.jpeg', 7);

-- --------------------------------------------------------

--
-- Structure de la table `RECETTE_PLANTE`
--

CREATE TABLE `RECETTE_PLANTE` (
  `idRecette` int(11) DEFAULT NULL,
  `idPlante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `RECETTE_PLANTE`
--

INSERT INTO `RECETTE_PLANTE` (`idRecette`, `idPlante`) VALUES
(43, 18),
(43, 24),
(44, 14),
(44, 29),
(46, 19),
(46, 20),
(47, 16),
(47, 17),
(48, 23),
(48, 37),
(49, 29),
(49, 32),
(50, 10),
(50, 43),
(51, 13),
(51, 27);

-- --------------------------------------------------------

--
-- Structure de la table `RESERVATION`
--

CREATE TABLE `RESERVATION` (
  `ReservationId` int(11) NOT NULL,
  `nameJardin` varchar(100) NOT NULL,
  `villeJardin` varchar(50) NOT NULL,
  `CPJardin` int(10) NOT NULL,
  `adresseJardin` varchar(100) NOT NULL,
  `tailleJardin` int(25) NOT NULL,
  `maxJardin` int(10) NOT NULL,
  `imgJardin` varchar(100) NOT NULL,
  `_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_PLANTE`
--

CREATE TABLE `TYPE_PLANTE` (
  `idTypePlante` int(11) NOT NULL,
  `typeName` varchar(100) DEFAULT NULL,
  `origineName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `TYPE_PLANTE`
--

INSERT INTO `TYPE_PLANTE` (`idTypePlante`, `typeName`, `origineName`) VALUES
(4, 'Lamiacées', 'Bassin Méditerranéen'),
(5, 'Labiacées', 'Asie'),
(6, 'Asteracées', 'Europe'),
(7, 'Cucurbitacées', 'Asie'),
(8, 'Lamiacées', 'Moyen Orient'),
(9, 'Lamiacées', 'Amérique'),
(10, 'Verbenacées', 'Amerique du sud'),
(11, 'Labiacées', 'Chine'),
(12, 'Zingibéracées', 'Thaïlande'),
(13, 'Poacées', 'Afrique'),
(14, 'Theacées', 'Orient'),
(15, 'Ericacées', 'Europe');

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `idUser` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `forname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`idUser`, `name`, `forname`, `email`, `password`) VALUES
(1, 'Roblabla', 'Pauline', 'roblablapauline@contact.fr', '123'),
(2, 'Dylan', 'Bob', 'bobdylan@contact.fr', '123'),
(3, 'Lataupe', 'René', 'renelataupe@contact.fr', '123'),
(4, 'Ochon', 'Paul', 'paulochon@contact.fr', '123'),
(5, 'Suffy', 'Sam', 'samsuffy@contact.fr', '123'),
(6, 'Point', 'Théo', 'theopoint@contact.fr', '123'),
(7, 'Tag', 'Bill', 'billtag@contact.fr', '123'),
(8, 'Blink', 'Zack', 'zackblink@contact.fr', '123'),
(9, 'Bulga', 'Zoe', 'zoebulga@contact.fr', '123'),
(10, 'Patos', 'Sandy', 'sandypatos@contact.fr', '123'),
(11, 'Dupond', 'Polux', 'poluxdupond@contact.fr', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `JARDIN`
--
ALTER TABLE `JARDIN`
  ADD PRIMARY KEY (`idJardin`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Index pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  ADD PRIMARY KEY (`idParcelle`),
  ADD KEY `jardinId` (`jardinId`),
  ADD KEY `occupantId` (`occupantId`);

--
-- Index pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  ADD PRIMARY KEY (`idPlante`),
  ADD KEY `typePlanteId` (`typePlanteId`);

--
-- Index pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `creatorId` (`creatorId`);

--
-- Index pour la table `RECETTE_PLANTE`
--
ALTER TABLE `RECETTE_PLANTE`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idPlante` (`idPlante`);

--
-- Index pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD PRIMARY KEY (`ReservationId`),
  ADD KEY `_id_user` (`_idUser`);

--
-- Index pour la table `TYPE_PLANTE`
--
ALTER TABLE `TYPE_PLANTE`
  ADD PRIMARY KEY (`idTypePlante`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `JARDIN`
--
ALTER TABLE `JARDIN`
  MODIFY `idJardin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  MODIFY `idParcelle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  MODIFY `idPlante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `TYPE_PLANTE`
--
ALTER TABLE `TYPE_PLANTE`
  MODIFY `idTypePlante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `JARDIN`
--
ALTER TABLE `JARDIN`
  ADD CONSTRAINT `JARDIN_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `USER` (`idUser`);

--
-- Contraintes pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  ADD CONSTRAINT `PARCELLE_ibfk_1` FOREIGN KEY (`jardinId`) REFERENCES `JARDIN` (`idJardin`),
  ADD CONSTRAINT `PARCELLE_ibfk_2` FOREIGN KEY (`occupantId`) REFERENCES `USER` (`idUser`);

--
-- Contraintes pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  ADD CONSTRAINT `PLANTE_ibfk_1` FOREIGN KEY (`typePlanteId`) REFERENCES `TYPE_PLANTE` (`idTypePlante`);

--
-- Contraintes pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  ADD CONSTRAINT `RECETTE_ibfk_1` FOREIGN KEY (`creatorId`) REFERENCES `USER` (`idUser`);

--
-- Contraintes pour la table `RECETTE_PLANTE`
--
ALTER TABLE `RECETTE_PLANTE`
  ADD CONSTRAINT `RECETTE_PLANTE_ibfk_1` FOREIGN KEY (`idRecette`) REFERENCES `RECETTE` (`idRecette`),
  ADD CONSTRAINT `RECETTE_PLANTE_ibfk_2` FOREIGN KEY (`idPlante`) REFERENCES `PLANTE` (`idPlante`);

--
-- Contraintes pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD CONSTRAINT `_id_user` FOREIGN KEY (`_idUser`) REFERENCES `USER` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
