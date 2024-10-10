-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 oct. 2024 à 00:26
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
-- Base de données : `offre_emploi`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `user_id_fk` int(11) DEFAULT NULL,
  `offre_id_fk` int(11) DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `m_motivation` mediumtext DEFAULT NULL,
  `statut` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='statut 1=en cours 2=acceptee 3=refusée';

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` int(11) NOT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `salaire` int(11) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='cover = link to cover';

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id`, `auteur_id`, `title`, `content`, `salaire`, `cover`, `localisation`) VALUES
(1, 3, 'Offre Test', 'TESST contenu + contenu contenuu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu + contenu conteu +', 1600, 'https://cupitol.com/wp-content/uploads/2019/08/tea-drinking-1.jpg', '(66;66)'),
(2, 3, 'test 2', 'plus de contenu', 1700, 'https://cupitol.com/wp-content/uploads/2019/08/tea-drinking-1.jpg', '(33;33)'),
(3, 2, 'adminOffre', 'Offfre content', 999, 'https://cupitol.com/wp-content/uploads/2019/08/tea-drinking-1.jpg', 'link'),
(4, 3, 'Title', 'coooooooooooooooooooooooooooooteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeennnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', 8000, 'liiii bk', '78964654');

-- --------------------------------------------------------

--
-- Structure de la table `required_skills`
--

CREATE TABLE `required_skills` (
  `id` int(11) NOT NULL,
  `skill_id_fk` int(11) DEFAULT NULL,
  `offre_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `label`) VALUES
(1, 'admin'),
(2, 'entreprise'),
(3, 'etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `spe_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `label`, `spe_id_fk`) VALUES
(1, 'PHP', 1),
(2, 'Javascript', 1),
(3, 'Photoshop', 2),
(4, '3Ds MAX', 2);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `label`) VALUES
(1, 'Programmation'),
(2, 'Designer');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id_fk` int(11) DEFAULT NULL COMMENT '1=admin 2=entreprise 3=etudiant',
  `spe_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `last_login`, `role_id_fk`, `spe_id_fk`) VALUES
(2, 'admin', '$2y$10$1679YDAdZ/lye/tdpXIFfOrJ.Vrszud5GNP4W3fYxtj2SI88o2i1S', 'admin@admin.admin', '2024-10-10 21:31:43', 1, NULL),
(3, 'entreprise', '$2y$10$r9i/NqEUP8Sb0.SR1VeBeu6s.r5mbTDITBlvvPPr5VlXeTewEW38a', 'entreprise@entreprise.fr', '2024-10-09 12:22:23', 2, 1),
(5, 'userTest', '$2y$10$ZBRTJbMZxod8aYBNHNkE0.5icWH6TchaZhS8ZP6vuQgFehKNYVZ8i', 'user@user.user', '2024-10-09 14:31:39', 3, 1),
(6, 'another Entreprise', '$2y$10$eHA0//t/rb6lZAsIvNVO.ujq/nie0o6T5mxN0X6LlwvY0m79fdlS2', 'another@another.com', '2024-10-10 21:05:28', 2, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `offre_id_fk` (`offre_id_fk`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `required_skills`
--
ALTER TABLE `required_skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `skill_id_fk` (`skill_id_fk`),
  ADD KEY `offre_id_fk` (`offre_id_fk`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `spe_id_fk` (`spe_id_fk`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `role_id_fk` (`role_id_fk`),
  ADD KEY `spe_id_fk` (`spe_id_fk`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `required_skills`
--
ALTER TABLE `required_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `candidature_ibfk_2` FOREIGN KEY (`offre_id_fk`) REFERENCES `offres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `required_skills`
--
ALTER TABLE `required_skills`
  ADD CONSTRAINT `required_skills_ibfk_1` FOREIGN KEY (`skill_id_fk`) REFERENCES `skills` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `required_skills_ibfk_2` FOREIGN KEY (`offre_id_fk`) REFERENCES `offres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`spe_id_fk`) REFERENCES `specialite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`spe_id_fk`) REFERENCES `specialite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
