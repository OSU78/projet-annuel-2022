-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 juin 2022 à 11:22
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gravure`
--

-- --------------------------------------------------------

--
-- Structure de la table `adress`
--

DROP TABLE IF EXISTS `adress`;
CREATE TABLE IF NOT EXISTS `adress` (
  `idAdress` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `postalCode` int(11) NOT NULL,
  `numVoice` int(11) NOT NULL,
  `twon` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `voice` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdress`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adress`
--

INSERT INTO `adress` (`idAdress`, `idUser`, `postalCode`, `numVoice`, `twon`, `country`, `voice`) VALUES
(1, 1, 51100, 4, 'REIMS', 'france', 'place de luniversité');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCmd` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idCmd`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lign_commande`
--

DROP TABLE IF EXISTS `lign_commande`;
CREATE TABLE IF NOT EXISTS `lign_commande` (
  `idProd` int(11) NOT NULL,
  `idCmd` int(11) NOT NULL,
  `dateCmd` timestamp NOT NULL,
  `priceTotal` float NOT NULL,
  `quantityCmd` int(11) NOT NULL,
  KEY `cle_etrangere_cmd` (`idCmd`),
  KEY `cle_etrangere_prod` (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `nomProd` varchar(150) NOT NULL,
  `priceProd` float NOT NULL,
  `imgLink` text NOT NULL,
  `description` text NOT NULL,
  `quantityProd` int(11) NOT NULL,
  PRIMARY KEY (`idProd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tel1` int(11) DEFAULT NULL,
  `tel2` int(11) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `email`, `password`, `tel1`, `tel2`, `firstname`, `lastname`) VALUES
(1, 'omdousmane@gmail.com', '123456', NULL, NULL, NULL, ''),
(2, 'omdousmane@yahoo.com', '$argon2i$v=19$m=65536,t=4,p=1$ZXpPRGV4bGdMT3ZYdUZJMw$j4bbOV7sxhKIBNIi9Q3Qp0H0rvPFRMfqQV6SdwX+waA', NULL, NULL, NULL, ''),
(9, 'omdousmane@yahoo.comd', '$argon2i$v=19$m=65536,t=4,p=1$TFlmeVJXQjFubjVMNGJ3dw$sDTxVlHsHM6vk9ZSTVPWdr85KR+ggai5k5YenAAU1IY', NULL, NULL, NULL, NULL),
(12, 'omdousmane@yahoo.comD', '$argon2i$v=19$m=65536,t=4,p=1$enJqOFJrczBUOXB1b3NrLw$NAstlJbO38qf4vM/ay079QkW91MpIt8MM+HYEdZYyvE', NULL, NULL, NULL, NULL),
(13, 'omdousmane@yahoo.comV', '$argon2i$v=19$m=65536,t=4,p=1$N29aeW9uTWpxR1Y3OGhYOA$8sl5WcvS3BR1C6K/p09qxAJFPt95hx5naIhkd8pduFQ', NULL, NULL, NULL, NULL),
(14, 'omdousmane@yahoo.com', '$argon2i$v=19$m=65536,t=4,p=1$QzlHMHNGWDB1QlM4ZHN4YQ$e45AIJXYA2uKPrQ0mt8bZqK4Sfhuv4TphnINXHpkj/A', NULL, NULL, NULL, NULL),
(15, 'omdousmane@yahoo.com', '$argon2i$v=19$m=65536,t=4,p=1$dUQwMVVaT3ZYUE9IQVVtcg$1EXLW2MWfnhcJa2otRq5vR1EpeUmj9u9wSIco7csQVg', NULL, NULL, NULL, NULL),
(16, 'omdousmane@yahooe.com', '$argon2i$v=19$m=65536,t=4,p=1$NjAuU3dZYVE2SU9JbW9sQg$UxYUCHVRElH2REmjmP17rQvaipTY3IKnJ95BS8I0b2k', NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `adress_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lign_commande`
--
ALTER TABLE `lign_commande`
  ADD CONSTRAINT `cle_etrangere_cmd` FOREIGN KEY (`idCmd`) REFERENCES `commande` (`idCmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cle_etrangere_prod` FOREIGN KEY (`idProd`) REFERENCES `products` (`idProd`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
