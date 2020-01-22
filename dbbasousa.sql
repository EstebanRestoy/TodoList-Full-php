-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 17 Décembre 2019 à 18:50
-- Version du serveur :  10.1.41-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbbasousa`
--

-- --------------------------------------------------------

--
-- Structure de la table `List`
--

CREATE TABLE `List` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `owner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `List`
--

INSERT INTO `List` (`id`, `name`, `owner`) VALUES
(1, 'coucou', 1),
(2, 'dad', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `List_Task`
--

CREATE TABLE `List_Task` (
  `id_list` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `List_Task`
--

INSERT INTO `List_Task` (`id_list`, `id_item`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Task`
--

CREATE TABLE `Task` (
  `id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `isMade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Task`
--

INSERT INTO `Task` (`id`, `content`, `isMade`) VALUES
(1, 'Ma tache', 0),
(2, 'coucou ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pwd` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id`, `email`, `pwd`) VALUES
(1, 'blabla@blabla.blabla', '$2y$10$KW88h/vmmC0zZPKDr2PulOK9Ij2f8hwqz8yxWmyCCThPUOq81kF0y'),
(2, 'e@gmail.com', '$2y$10$n0SqVQQlEq9akxME2DLBBe2aBIuObkDz1ZK.ABBfEx4w/2Glfbx1W'),
(4, 'test@gmail.com', '$2y$10$aAKxAZzFbiJ4M8vrB8V1seFXT1q5EL4QA4./H4cz4TmqKYB0trweC'),
(5, 'daudad@gmafafz.com', '$2y$10$QR98jYmNOZHZpNBHnZ2j6O6/5EPzsHi8sl8Let7b/Ztr0MOLvVKyO');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `List`
--
ALTER TABLE `List`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OwnerConstraint` (`owner`);

--
-- Index pour la table `List_Task`
--
ALTER TABLE `List_Task`
  ADD PRIMARY KEY (`id_list`,`id_item`),
  ADD KEY `RefTask` (`id_item`);

--
-- Index pour la table `Task`
--
ALTER TABLE `Task`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `List`
--
ALTER TABLE `List`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Task`
--
ALTER TABLE `Task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `List`
--
ALTER TABLE `List`
  ADD CONSTRAINT `OwnerConstraint` FOREIGN KEY (`owner`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `List_Task`
--
ALTER TABLE `List_Task`
  ADD CONSTRAINT `RefList` FOREIGN KEY (`id_list`) REFERENCES `List` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RefTask` FOREIGN KEY (`id_item`) REFERENCES `Task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
