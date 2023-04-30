-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 30 avr. 2023 à 07:33
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bazire_david_site_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `password`) VALUES
('admin', '$2y$10$7v.KKoFwngisXj2HnmqOEuowuHkIZVhjcaLxoGgc5lJ/KZfOV49j2');

-- --------------------------------------------------------

--
-- Structure de la table `galerie_images`
--

CREATE TABLE `galerie_images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `galerie_images`
--

INSERT INTO `galerie_images` (`id`, `filename`, `description`) VALUES
(1, 'pose_d\'un_revetement.jpg', 'Pose d\'un revêtement de sol en dalles vinyles 30x60.'),
(2, 'implantion_cloisons.jpg', 'Implantation de cloisons sur pavillon neuf.'),
(3, 'amenagement_de_combles_photo_1_.jpg', 'Aménagement de combles.'),
(4, 'amenagement_de_combles_photo_2.jpg', 'Aménagement de combles.'),
(5, 'amenagement_de_combles_photo_3_.jpg', 'Aménagement de combles avec vide sur séjour.');

-- --------------------------------------------------------

--
-- Structure de la table `tabledetest`
--

CREATE TABLE `tabledetest` (
  `id` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tabledetest2`
--

CREATE TABLE `tabledetest2` (
  `id` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `galerie_images`
--
ALTER TABLE `galerie_images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tabledetest`
--
ALTER TABLE `tabledetest`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tabledetest2`
--
ALTER TABLE `tabledetest2`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
