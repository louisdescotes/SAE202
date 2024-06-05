-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 04 juin 2024 à 19:22
-- Version du serveur : 10.3.29-MariaDB-0+deb10u1
-- Version de PHP : 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `juntea`
--

-- --------------------------------------------------------

--
-- Structure de la table `PARCELLE`
--

CREATE TABLE `PARCELLE` (
  `idParcelle` int(11) NOT NULL,
  `nomParcelle` varchar(45) NOT NULL,
  `nbPersonneParcelle` int(11) NOT NULL,
  `superficieParcelle` int(11) NOT NULL,
  `villeParcelle` varchar(50) NOT NULL,
  `CPParcelle` int(8) NOT NULL,
  `adresseParcelle` varchar(100) NOT NULL,
  `_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `PARCELLE`
--

INSERT INTO `PARCELLE` (`idParcelle`, `nomParcelle`, `nbPersonneParcelle`, `superficieParcelle`, `villeParcelle`, `CPParcelle`, `adresseParcelle`, `_id_user`) VALUES
(31, 'LePetitJard', 1, 100, 'Troyes', 10000, '5 Rue Brulard', 2),
(32, 'LaGrandeMaison', 3, 300, 'Troyes', 10000, '10 Rue de la Paix', 3),
(33, 'LaBelleVue', 2, 150, 'Troyes', 10000, '15 Avenue Victor Hugo', 4),
(34, 'LaPetiteFerme', 4, 200, 'Troyes', 10000, '20 Rue des Champs', 5),
(35, 'LeCoinTranquille', 2, 120, 'Troyes', 10000, '25 Rue des Lilas', 6),
(36, 'LaMaisonBlanche', 5, 400, 'Troyes', 10000, '30 Rue du Commerce', 7),
(37, 'LeJardinSecret', 2, 180, 'Troyes', 10000, '35 Rue des Roses', 8),
(38, 'LaPetiteCabane', 3, 250, 'Troyes', 10000, '40 Rue des Violettes', 9),
(39, 'LeCoindeParadis', 4, 300, 'Troyes', 10000, '45 Rue du Paradis', 10),
(40, 'LaGrangeRustique', 6, 500, 'Troyes', 10000, '50 Rue de la Grange', 11);

-- --------------------------------------------------------

--
-- Structure de la table `PLANTE`
--

CREATE TABLE `PLANTE` (
  `idPlante` int(11) NOT NULL,
  `nomPlante` varchar(45) NOT NULL,
  `nomLatinPlante` varchar(75) NOT NULL,
  `photoPlante` varchar(75) NOT NULL,
  `endroitPlante` varchar(100) NOT NULL,
  `terrainPlante` varchar(100) NOT NULL,
  `besoinDeauPlante` varchar(45) NOT NULL,
  `impactEnvPlante` varchar(30) NOT NULL,
  `_id_parcelle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `TYPE_PLANTE`
--

CREATE TABLE `TYPE_PLANTE` (
  `idTypePlante` int(11) NOT NULL,
  `nomTypePlante` varchar(45) NOT NULL,
  `origineTypePlante` varchar(45) NOT NULL,
  `_id_plante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(45) NOT NULL,
  `prenomUser` varchar(45) NOT NULL,
  `emailUser` varchar(75) NOT NULL,
  `mdpUser` varchar(45) NOT NULL,
  `photoUser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `USER`
--

INSERT INTO `USER` (`idUser`, `nomUser`, `prenomUser`, `emailUser`, `mdpUser`, `photoUser`) VALUES
(2, 'Dylan', 'Bob', 'bobdylan@contact.fr', '123', 'ppone.png'),
(3, 'Lataupe', 'René', 'renelataupe@contact.fr', '123', 'pptwo.png'),
(4, 'Ochon', 'Paul', 'paulochon@contact.fr', '123', 'ppthree.png'),
(5, 'Suffy', 'Sam', 'samsuffy@contact.fr', '123', 'ppfour.png'),
(6, 'Point', 'Théo', 'theopoint@contact.fr', '123', 'ppfive.png'),
(7, 'Tag', 'Bill', 'billtag@contact.fr', '123', 'ppsix.png'),
(8, 'Blink', 'Zack', 'zackblink@contact.fr', '123', 'ppseven.png'),
(9, 'Bulga', 'Zoe', 'zoebulga@contact.fr', '123', 'ppeight.png'),
(10, 'Patos', 'Sandy', 'sandypatos@contact.fr', '123', 'ppnine.png'),
(11, 'Dupond', 'Polux', 'poluxdupond@contact.fr', '123', 'ppten.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  ADD PRIMARY KEY (`idParcelle`),
  ADD KEY `_id_user` (`_id_user`);

--
-- Index pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  ADD PRIMARY KEY (`idPlante`),
  ADD KEY `_id_parcelle` (`_id_parcelle`);

--
-- Index pour la table `TYPE_PLANTE`
--
ALTER TABLE `TYPE_PLANTE`
  ADD PRIMARY KEY (`idTypePlante`),
  ADD KEY `_id_plante` (`_id_plante`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  MODIFY `idParcelle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  MODIFY `idPlante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TYPE_PLANTE`
--
ALTER TABLE `TYPE_PLANTE`
  MODIFY `idTypePlante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `PARCELLE`
--
ALTER TABLE `PARCELLE`
  ADD CONSTRAINT `_id_user` FOREIGN KEY (`_id_user`) REFERENCES `USER` (`idUser`);

--
-- Contraintes pour la table `PLANTE`
--
ALTER TABLE `PLANTE`
  ADD CONSTRAINT `_id_parcelle` FOREIGN KEY (`_id_parcelle`) REFERENCES `PARCELLE` (`idParcelle`);

--
-- Contraintes pour la table `TYPE_PLANTE`
--
ALTER TABLE `TYPE_PLANTE`
  ADD CONSTRAINT `_id_plante` FOREIGN KEY (`_id_plante`) REFERENCES `PLANTE` (`idPlante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
