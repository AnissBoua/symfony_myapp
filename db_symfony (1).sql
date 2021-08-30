-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Creato il: Ago 30, 2021 alle 19:01
-- Versione del server: 5.7.31
-- Versione PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_symfony`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `auto`
--

DROP TABLE IF EXISTS `auto`;
CREATE TABLE IF NOT EXISTS `auto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modele` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance` int(11) NOT NULL,
  `prix` double NOT NULL,
  `pays` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_66BA25FA12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `auto`
--

INSERT INTO `auto` (`id`, `marque`, `modele`, `puissance`, `prix`, `pays`, `image`, `category_id`) VALUES
(214, 'cr n° 1', 'bdn', 579, 120772, 'Germany', '1065467.jpg', 1),
(215, 'Marque n° 2', 'Modele n° 2', 776, 37448, 'Germany', 'ajin-lee-.jpg', 3),
(216, 'Marque n° 3', 'Modele n° 3', 410, 87164, 'Italy', '1066798.jpg', 1),
(217, 'Marque n° 4', 'Modele n° 4', 139, 18653, 'Italy', 'ajin-lee-.jpg', 2),
(218, 'Marque n° 5', 'Modele n° 5', 444, 109438, 'Germany', '1065467.jpg', 3),
(219, 'Marque n° 6', 'Modele n° 6', 305, 116476, 'France', '1066798.jpg', 3),
(220, 'Marque n° 7', 'Modele n° 7', 305, 126646, 'Morocco', '1042734.jpg', 1),
(221, 'Marque n° 8', 'Modele n° 8', 184, 25669, 'Morocco', '1042734.jpg', 2),
(222, 'Marque n° 9', 'Modele n° 9', 990, 102920, 'France', '1065466.jpg', 2),
(223, 'Marque n° 10', 'Modele n° 10', 122, 32539, 'Italy', '1065466.jpg', 1),
(224, 'Marque n° 11', 'Modele n° 11', 938, 6812, 'Morocco', '1630234605.jpg', 3),
(225, 'Marque n° 12', 'Modele n° 12', 574, 61265, 'Germany', '1630234605.jpg', 3),
(226, 'Marque n° 13', 'Modele n° 13', 240, 61160, 'Germany', '777105.png', 3),
(227, 'Marque n° 14', 'Modele n° 14', 918, 132140, 'Germany', '1065466.jpg', 2),
(228, 'Marque n° 15', 'Modele n° 15', 524, 117110, 'U.S.A', '1066798.jpg', 2),
(229, 'Marque n° 16', 'Modele n° 16', 612, 49630, 'France', '747068.png', 2),
(230, 'Marque n° 17', 'Modele n° 17', 292, 104123, 'France', '1066798.jpg', 3),
(231, 'Marque n° 18', 'Modele n° 18', 871, 106961, 'U.S.A', '1066798.jpg', 3),
(232, 'Marque n° 19', 'Modele n° 19', 702, 94006, 'Morocco', '1065466.jpg', 2),
(233, 'Marque n° 20', 'Modele n° 20', 459, 12608, 'Italy', 'ajin-lee-.jpg', 1),
(234, 'Marque n° 21', 'Modele n° 21', 685, 123726, 'Germany', '1065467.jpg', 2),
(235, 'Marque n° 22', 'Modele n° 22', 690, 33520, 'France', '1065467.jpg', 1),
(236, 'Marque n° 23', 'Modele n° 23', 207, 134299, 'U.S.A', '1042734.jpg', 2),
(237, 'Marque n° 24', 'Modele n° 24', 711, 144179, 'France', '1630234605.jpg', 1),
(238, 'Marque n° 25', 'Modele n° 25', 736, 76042, 'France', '1042734.jpg', 1),
(239, 'Marque n° 26', 'Modele n° 26', 501, 26462, 'U.S.A', '777105.png', 1),
(240, 'Marque n° 27', 'Modele n° 27', 645, 122001, 'Germany', '777105.png', 1),
(241, 'Marque n° 28', 'Modele n° 28', 347, 129657, 'Italy', '1630234605.jpg', 1),
(242, 'Marque n° 29', 'Modele n° 29', 402, 104773, 'Italy', '1630234605.jpg', 3),
(243, 'Marque n° 30', 'Modele n° 30', 303, 37927, 'Germany', 'ajin-lee-.jpg', 1),
(244, 'Marque n° 31', 'Modele n° 31', 652, 109039, 'France', '1630234605.jpg', 3),
(245, 'Marque n° 32', 'Modele n° 32', 745, 16153, 'U.S.A', '777105.png', 2),
(246, 'Marque n° 33', 'Modele n° 33', 419, 30340, 'Italy', '1065467.jpg', 2),
(247, 'Marque n° 34', 'Modele n° 34', 135, 23938, 'Morocco', 'ajin-lee-.jpg', 3),
(248, 'Marque n° 35', 'Modele n° 35', 386, 109260, 'Italy', '1630234605.jpg', 3),
(249, 'Marque n° 36', 'Modele n° 36', 407, 54201, 'Morocco', '1042734.jpg', 1),
(250, 'Marque n° 37', 'Modele n° 37', 322, 70133, 'France', '747068.png', 3),
(251, 'Marque n° 38', 'Modele n° 38', 683, 47943, 'Germany', 'ajin-lee-.jpg', 1),
(252, 'Marque n° 39', 'Modele n° 39', 703, 84424, 'France', '747068.png', 3),
(253, 'Marque n° 40', 'Modele n° 40', 420, 87051, 'Germany', 'ajin-lee-.jpg', 1),
(254, 'Marque n° 41', 'Modele n° 41', 460, 89341, 'France', '1066798.jpg', 3),
(255, 'Marque n° 42', 'Modele n° 42', 941, 148819, 'Morocco', 'ajin-lee-.jpg', 3),
(256, 'Marque n° 43', 'Modele n° 43', 797, 22540, 'Morocco', '927608.jpg', 2),
(257, 'Marque n° 44', 'Modele n° 44', 886, 60457, 'Italy', '1065466.jpg', 1),
(258, 'Marque n° 45', 'Modele n° 45', 784, 20010, 'Germany', '1065466.jpg', 1),
(259, 'Marque n° 46', 'Modele n° 46', 162, 37782, 'Italy', '1065466.jpg', 2),
(260, 'Marque n° 47', 'Modele n° 47', 262, 115730, 'France', '1630234605.jpg', 2),
(261, 'Marque n° 48', 'Modele n° 48', 122, 71958, 'Morocco', '1066798.jpg', 3),
(262, 'Marque n° 49', 'Modele n° 49', 472, 9394, 'France', '747068.png', 1),
(263, 'Marque n° 50', 'Modele n° 50', 755, 70252, 'Italy', '927608.jpg', 3),
(264, 'Marque n° 51', 'Modele n° 51', 950, 12244, 'U.S.A', '927608.jpg', 1),
(265, 'Marque n° 52', 'Modele n° 52', 976, 105505, 'U.S.A', '777105.png', 1),
(266, 'Marque n° 53', 'Modele n° 53', 471, 112134, 'Germany', '1042734.jpg', 2),
(267, 'Marque n° 54', 'Modele n° 54', 436, 41918, 'Italy', '1065466.jpg', 2),
(268, 'Marque n° 55', 'Modele n° 55', 826, 128756, 'Morocco', '1042734.jpg', 2),
(269, 'Marque n° 56', 'Modele n° 56', 172, 100683, 'U.S.A', '747068.png', 2),
(270, 'Marque n° 57', 'Modele n° 57', 245, 27786, 'U.S.A', '1066798.jpg', 2),
(271, 'Marque n° 58', 'Modele n° 58', 377, 75840, 'France', '927608.jpg', 1),
(272, 'Marque n° 59', 'Modele n° 59', 871, 117282, 'U.S.A', '1066798.jpg', 2),
(273, 'Marque n° 60', 'Modele n° 60', 187, 52551, 'Morocco', 'ajin-lee-.jpg', 1),
(274, 'Marque n° 61', 'Modele n° 61', 872, 140314, 'France', '1042734.jpg', 2),
(275, 'Marque n° 62', 'Modele n° 62', 691, 106641, 'France', '1630234605.jpg', 1),
(276, 'Marque n° 63', 'Modele n° 63', 592, 129201, 'Germany', '777105.png', 3),
(277, 'Marque n° 64', 'Modele n° 64', 799, 132269, 'France', '1066798.jpg', 3),
(278, 'Marque n° 65', 'Modele n° 65', 606, 82246, 'France', '1065467.jpg', 2),
(279, 'Marque n° 66', 'Modele n° 66', 758, 98231, 'France', '1065467.jpg', 3),
(280, 'Marque n° 67', 'Modele n° 67', 107, 138711, 'Germany', '927608.jpg', 3),
(281, 'Marque n° 68', 'Modele n° 68', 245, 140974, 'Morocco', '1065467.jpg', 2),
(282, 'Marque n° 69', 'Modele n° 69', 866, 66646, 'Germany', '777105.png', 3),
(283, 'Marque n° 70', 'Modele n° 70', 889, 52071, 'Morocco', 'ajin-lee-.jpg', 1),
(284, 'Marque n° 71', 'Modele n° 71', 918, 106324, 'France', '777105.png', 3),
(285, 'Marque n° 72', 'Modele n° 72', 871, 149094, 'Morocco', '1066798.jpg', 1),
(286, 'Marque n° 73', 'Modele n° 73', 276, 83046, 'Germany', '1042734.jpg', 1),
(287, 'Marque n° 74', 'Modele n° 74', 984, 34756, 'Germany', 'ajin-lee-.jpg', 2),
(288, 'Marque n° 75', 'Modele n° 75', 798, 98343, 'Italy', '1065467.jpg', 2),
(289, 'Marque n° 76', 'Modele n° 76', 483, 58631, 'Morocco', '1066798.jpg', 3),
(290, 'Marque n° 77', 'Modele n° 77', 608, 139922, 'U.S.A', '747068.png', 1),
(291, 'Marque n° 78', 'Modele n° 78', 984, 145777, 'U.S.A', '1065466.jpg', 1),
(292, 'Marque n° 79', 'Modele n° 79', 561, 56279, 'France', '777105.png', 3),
(293, 'Marque n° 80', 'Modele n° 80', 670, 42393, 'Italy', '1065466.jpg', 1),
(294, 'Marque n° 81', 'Modele n° 81', 177, 61593, 'Italy', '1065467.jpg', 3),
(295, 'Marque n° 82', 'Modele n° 82', 892, 117985, 'Germany', '1065467.jpg', 1),
(296, 'Marque n° 83', 'Modele n° 83', 275, 108514, 'Morocco', '1042734.jpg', 1),
(297, 'Marque n° 84', 'Modele n° 84', 514, 68368, 'U.S.A', '1065466.jpg', 3),
(298, 'Marque n° 85', 'Modele n° 85', 234, 107231, 'Morocco', '1065466.jpg', 2),
(299, 'Marque n° 86', 'Modele n° 86', 614, 91555, 'France', '1065466.jpg', 3),
(300, 'Marque n° 87', 'Modele n° 87', 972, 86826, 'France', '1065466.jpg', 1),
(301, 'Marque n° 88', 'Modele n° 88', 934, 78667, 'France', '1630234605.jpg', 2),
(302, 'Marque n° 89', 'Modele n° 89', 934, 136475, 'Germany', '1066798.jpg', 3),
(303, 'Marque n° 90', 'Modele n° 90', 364, 34766, 'Morocco', '1065467.jpg', 3),
(304, 'Marque n° 91', 'Modele n° 91', 253, 27841, 'Morocco', '1066798.jpg', 2),
(305, 'Marque n° 92', 'Modele n° 92', 629, 112802, 'Germany', '927608.jpg', 2),
(306, 'Marque n° 93', 'Modele n° 93', 684, 41054, 'Italy', '1066798.jpg', 1),
(307, 'Marque n° 94', 'Modele n° 94', 265, 117219, 'Germany', '1630234605.jpg', 3),
(308, 'Marque n° 95', 'Modele n° 95', 842, 55970, 'France', '1066798.jpg', 3),
(309, 'Marque n° 96', 'Modele n° 96', 255, 38764, 'France', '747068.png', 3),
(310, 'Marque n° 97', 'Modele n° 97', 245, 118041, 'France', '1065467.jpg', 1),
(311, 'Marque n° 98', 'Modele n° 98', 585, 60714, 'Germany', '1065467.jpg', 2),
(312, 'Marque n° 99', 'Modele n° 99', 454, 103195, 'France', '777105.png', 3),
(313, 'Marque n° 100', 'Modele n° 100', 945, 82773, 'U.S.A', '747068.png', 2),
(314, 'jdfnvj', 'jnknjkv', 51564, 4564, 'dfvfd', '1630261659.jpg', 2),
(315, 'njkfdnv', 'nkjdnv', 45454, 546465, 'hdcbjcd', '1630261870.jpg', 1),
(316, 'jbjhbjh', 'hbfjhv', 54545, 454545, 'jdhfvbdjf', '1630262699.jpg', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'Luxe', '2021-08-29 13:35:27'),
(2, 'Sport', '2021-08-29 13:35:27'),
(3, 'Neuve', '2021-08-29 13:35:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210819125145', '2021-08-20 08:26:01', 51),
('DoctrineMigrations\\Version20210820104750', '2021-08-20 10:48:44', 57),
('DoctrineMigrations\\Version20210829131621', '2021-08-29 13:19:24', 87),
('DoctrineMigrations\\Version20210830125657', '2021-08-30 12:57:56', 77);

-- --------------------------------------------------------

--
-- Struttura della tabella `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diplome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naiss` date NOT NULL,
  `contrat` tinyint(1) DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Anis', 'anissbouainbi@hotmail.it', 'john0513'),
(2, 'user', 'user@gmail.com', 'anis'),
(3, 'bdfvhjb', 'hbhjbv@gmail.com', 'anis'),
(4, 'vdfhbj', 'dvfhb@gmail.com', '$2y$13$B21K5dJ6IpZdjanIWHk//OHs/CHffOLC74HG2hDnUShE0ovL77Vaa'),
(5, 'admin', 'admin@gmail.com', '$2y$13$PXFkVpON3HbJtthpjV6CuOkTQrJ09ZqaHzAW6nr2VKzjVnVqCSOxO'),
(6, 'anis', 'anissbouainbi@hotmail.it', '$2y$13$yIGmxf.1tczFo.5.HKP8L.Uu5NaI93nh6WHg6SkvpA3V1B4e37KXe'),
(7, 'anis', 'anissbouainbi@hotmail.it', '$2y$13$yx8h9kCAhKM0jbl1JwgDx.ggfZGd6HTdcisc6RyYMf3ff4f4p9oAq'),
(8, 'anis', 'bhfvjhd@gmail.com', '$2y$13$unGTO21BT.LO.2LFlxeTm.9ciJx2ch.EuQJh0wjOmopDxS/rv1eIy');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `FK_66BA25FA12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
