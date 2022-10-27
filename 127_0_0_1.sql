-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 sep. 2022 à 12:55
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
-- Base de données : `caleb22`
--
CREATE DATABASE IF NOT EXISTS `caleb22` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `caleb22`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--
-- Erreur de lecture de structure pour la table caleb22.category : #1146 - La table 'caleb22.category' n'existe pas
-- Erreur de lecture des données pour la table caleb22.category : #1064 - Erreur de syntaxe près de 'FROM `caleb22`.`category`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--
-- Erreur de lecture de structure pour la table caleb22.doctrine_migration_versions : #1146 - La table 'caleb22.doctrine_migration_versions' n'existe pas
-- Erreur de lecture des données pour la table caleb22.doctrine_migration_versions : #1064 - Erreur de syntaxe près de 'FROM `caleb22`.`doctrine_migration_versions`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--
-- Erreur de lecture de structure pour la table caleb22.messenger_messages : #1146 - La table 'caleb22.messenger_messages' n'existe pas
-- Erreur de lecture des données pour la table caleb22.messenger_messages : #1064 - Erreur de syntaxe près de 'FROM `caleb22`.`messenger_messages`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `product`
--
-- Erreur de lecture de structure pour la table caleb22.product : #1146 - La table 'caleb22.product' n'existe pas
-- Erreur de lecture des données pour la table caleb22.product : #1064 - Erreur de syntaxe près de 'FROM `caleb22`.`product`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
-- Erreur de lecture de structure pour la table caleb22.user : #1146 - La table 'caleb22.user' n'existe pas
-- Erreur de lecture des données pour la table caleb22.user : #1064 - Erreur de syntaxe près de 'FROM `caleb22`.`user`' à la ligne 1
--
-- Base de données : `calebinfo`
--
CREATE DATABASE IF NOT EXISTS `calebinfo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `calebinfo`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--
-- Erreur de lecture de structure pour la table calebinfo.category : #1146 - La table 'calebinfo.category' n'existe pas
-- Erreur de lecture des données pour la table calebinfo.category : #1064 - Erreur de syntaxe près de 'FROM `calebinfo`.`category`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--
-- Erreur de lecture de structure pour la table calebinfo.doctrine_migration_versions : #1146 - La table 'calebinfo.doctrine_migration_versions' n'existe pas
-- Erreur de lecture des données pour la table calebinfo.doctrine_migration_versions : #1064 - Erreur de syntaxe près de 'FROM `calebinfo`.`doctrine_migration_versions`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--
-- Erreur de lecture de structure pour la table calebinfo.messenger_messages : #1146 - La table 'calebinfo.messenger_messages' n'existe pas
-- Erreur de lecture des données pour la table calebinfo.messenger_messages : #1064 - Erreur de syntaxe près de 'FROM `calebinfo`.`messenger_messages`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `product`
--
-- Erreur de lecture de structure pour la table calebinfo.product : #1146 - La table 'calebinfo.product' n'existe pas
-- Erreur de lecture des données pour la table calebinfo.product : #1064 - Erreur de syntaxe près de 'FROM `calebinfo`.`product`' à la ligne 1

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
-- Erreur de lecture de structure pour la table calebinfo.user : #1146 - La table 'calebinfo.user' n'existe pas
-- Erreur de lecture des données pour la table calebinfo.user : #1064 - Erreur de syntaxe près de 'FROM `calebinfo`.`user`' à la ligne 1
--
-- Base de données : `kaboum`
--
CREATE DATABASE IF NOT EXISTS `kaboum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kaboum`;

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `name`, `first_name`) VALUES
(1, 'ANDRIAMBOLA', 'Radoniaina Michael'),
(2, 'ANDRIAMBOLA', 'Hery'),
(3, 'ANDRIAMBOLA', 'Rado'),
(4, 'ANDRIAMBOLA', 'Ando'),
(5, 'ANDRIAMBOLA', 'Ranto'),
(6, 'ANDRIAMBOLA', 'Oly'),
(7, 'ANDRIAMBOLA', 'Fitahiana'),
(8, 'ANDRIAMBOLA', 'Fanantenana');

-- --------------------------------------------------------

--
-- Structure de la table `categorie2`
--

DROP TABLE IF EXISTS `categorie2`;
CREATE TABLE IF NOT EXISTS `categorie2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie2`
--

INSERT INTO `categorie2` (`id`, `name`) VALUES
(2, 'Caleb'),
(3, 'Rado'),
(4, 'Michael');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Carte Mere (CM)'),
(2, 'Processeur (CPU)'),
(3, 'Alimentation (PSU)'),
(4, 'Ram'),
(5, 'HDD'),
(6, 'SSD'),
(7, 'SSD M2');

-- --------------------------------------------------------

--
-- Structure de la table `categories3`
--

DROP TABLE IF EXISTS `categories3`;
CREATE TABLE IF NOT EXISTS `categories3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220819103553', '2022-08-19 10:36:14', 37),
('DoctrineMigrations\\Version20220819105444', '2022-08-19 10:54:52', 44),
('DoctrineMigrations\\Version20220822082224', '2022-08-22 08:22:34', 55),
('DoctrineMigrations\\Version20220822082357', '2022-08-22 08:24:04', 47),
('DoctrineMigrations\\Version20220822082723', '2022-08-22 08:27:31', 45),
('DoctrineMigrations\\Version20220906105120', '2022-09-06 10:51:38', 587),
('DoctrineMigrations\\Version20220906105130', '2022-09-06 10:56:29', 197),
('DoctrineMigrations\\Version20220906105401', '2022-09-06 10:56:29', 424),
('DoctrineMigrations\\Version20220906105624', '2022-09-07 05:32:18', 180),
('DoctrineMigrations\\Version20220907053013', '2022-09-07 05:32:18', 131),
('DoctrineMigrations\\Version20220907055224', '2022-09-07 05:52:32', 163),
('DoctrineMigrations\\Version20220907055722', '2022-09-07 05:57:32', 892),
('DoctrineMigrations\\Version20220907124744', '2022-09-07 12:47:55', 1334),
('DoctrineMigrations\\Version20220907130246', '2022-09-07 13:02:52', 387),
('DoctrineMigrations\\Version20220907130625', '2022-09-07 13:06:33', 834),
('DoctrineMigrations\\Version20220914081202', '2022-09-14 08:12:24', 414),
('DoctrineMigrations\\Version20220915072432', '2022-09-15 07:24:39', 491),
('DoctrineMigrations\\Version20220922115831', '2022-09-22 12:15:16', 590),
('DoctrineMigrations\\Version20220922121501', '2022-09-22 12:16:33', 249);

-- --------------------------------------------------------

--
-- Structure de la table `identite`
--

DROP TABLE IF EXISTS `identite`;
CREATE TABLE IF NOT EXISTS `identite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04ADA21214B7` (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `illustration`, `categories_id`) VALUES
(1, 'Asrock Z370 Pro 4', 120000, 'asrock z370 Pro4.jpg', 1),
(2, 'Asus Prime B360 Plus', 45000, 'asus prime B360 plus.png', 1),
(3, 'Asus Tuf B360 Gaming', 90000, 'Asus Tuf b360 gaming plus.png', 1),
(4, 'Asus Z370 E-Gaming', 24000, 'asus z370 e-gaming.png', 1),
(5, 'Gigabite G1 B7 Sniper', 45000, 'Giabite G1 b7 sniper.png', 1),
(6, 'Gygabite B450 Aorus', 24000, 'Gygabite B450 Aorus pro.png', 1),
(7, 'MSI B150 Krait Gaming', 45000, 'MSI B150 KRAIT GAMING.jpg', 1),
(8, 'Intel Core i5-10400F', 90000, 'I5 10.jpg', 2),
(9, 'Intel Core i7-10700K', 120000, 'I7 10.jpg', 2),
(10, 'Intel Core i9-12900K', 45000, 'i9 12.jpg', 2),
(11, 'AMD Ryzen 5 5500', 78000, 'Ryzen 5.jpg', 2),
(12, 'AMD Ryzen 7 5800X', 90000, 'ryzen 7.jpg', 2),
(13, 'Cooler Master 750W', 78000, 'Z370-DRAGON.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `recette_depense`
--

DROP TABLE IF EXISTS `recette_depense`;
CREATE TABLE IF NOT EXISTS `recette_depense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `quantite` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recette` double DEFAULT NULL,
  `depense` double DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recette_depense`
--

INSERT INTO `recette_depense` (`id`, `date`, `quantite`, `designation`, `recette`, `depense`, `observation`) VALUES
(1, '2017-01-01', 1, 'PSU 450w', 450, NULL, NULL),
(2, '2024-09-12', 1, 'PSU 450w', 70000, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `spent_day`
--

DROP TABLE IF EXISTS `spent_day`;
CREATE TABLE IF NOT EXISTS `spent_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depense` double NOT NULL,
  `date` datetime NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
--
-- Base de données : `kaboum23`
--
CREATE DATABASE IF NOT EXISTS `kaboum23` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kaboum23`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Recettes'),
(2, 'Dépenses');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220923072621', '2022-09-23 07:26:29', 488),
('DoctrineMigrations\\Version20220923073622', '2022-09-23 07:36:29', 168),
('DoctrineMigrations\\Version20220923074145', '2022-09-23 07:41:52', 731),
('DoctrineMigrations\\Version20220923130127', '2022-09-23 13:01:42', 335);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recette_depense`
--

DROP TABLE IF EXISTS `recette_depense`;
CREATE TABLE IF NOT EXISTS `recette_depense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `quantite` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recettedepense_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F07D4D2DBF92DAB0` (`recettedepense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recette_depense`
--

INSERT INTO `recette_depense` (`id`, `date`, `quantite`, `designation`, `recettedepense_id`, `price`) VALUES
(5, '2022-09-23', 1, 'GTX 970', 2, 256000),
(6, '2022-09-22', 1, 'Ram 8go ddr4', 1, 50000),
(7, '2022-09-26', 3, 'GTX 970', 1, 10000),
(8, '2022-09-22', 1, 'Cable sata', 1, 5000);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recette_depense`
--
ALTER TABLE `recette_depense`
  ADD CONSTRAINT `FK_F07D4D2DBF92DAB0` FOREIGN KEY (`recettedepense_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
