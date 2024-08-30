-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 30 août 2024 à 16:12
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espaceadmin`
--

-- --------------------------------------------------------

--
-- Structure de la table `autorisation`
--

CREATE TABLE `autorisation` (
  `autorisation_id` int(11) NOT NULL,
  `autorisation_label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `autorisation`
--

INSERT INTO `autorisation` (`autorisation_id`, `autorisation_label`) VALUES
(1, 'ajout'),
(2, 'suppression'),
(3, 'modification'),
(4, 'edition'),
(5, 'lecture');

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE `possede` (
  `autorisation_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`autorisation_id`, `r_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 6),
(5, 1),
(5, 2),
(5, 3),
(5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `r_id` int(11) NOT NULL,
  `r_label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`r_id`, `r_label`) VALUES
(1, 'super_admin'),
(2, 'admin'),
(3, 'invite'),
(6, 'moderateur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`u_id`, `email`, `password`, `r_id`) VALUES
(2, 'admin@admin.admin', 'topaze8', 1),
(3, 'randUser1', '123456', 1),
(4, 'mob.admin@mob.com', 'defaultPassword', 2),
(5, 'userToadd', 'passwordtoadd', 2),
(11, 'updatedUser', 'password', 2),
(12, 'user1', '458588', 2),
(14, 'user2', 'uopuop', 2),
(15, 'inviteUser', 'invitepassword', 3),
(16, 'mod69', 'motdepasse', 6),
(19, 'invite2', 'passordinvite', 3),
(20, 'anotherUser', 'anotherpassword', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `autorisation`
--
ALTER TABLE `autorisation`
  ADD PRIMARY KEY (`autorisation_id`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`autorisation_id`,`r_id`),
  ADD KEY `possede_role0_FK` (`r_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `user_role_FK` (`r_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `autorisation`
--
ALTER TABLE `autorisation`
  MODIFY `autorisation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_autorisation_FK` FOREIGN KEY (`autorisation_id`) REFERENCES `autorisation` (`autorisation_id`),
  ADD CONSTRAINT `possede_role0_FK` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_FK` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
