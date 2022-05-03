-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 avr. 2022 à 16:33
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discord`
--

-- --------------------------------------------------------

--
-- Structure de la table `espace`
--

CREATE TABLE `espace` (
  `id_espace` int(11) UNSIGNED NOT NULL,
  `prive` tinyint(1) DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_id_type_espace` int(11) UNSIGNED NOT NULL,
  `fk_id_serveur` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) UNSIGNED NOT NULL,
  `contenu_message` text COLLATE utf8_unicode_ci NOT NULL,
  `date_message` date NOT NULL,
  `fk_id_type_message` int(11) UNSIGNED NOT NULL,
  `fk_id_espace` int(11) UNSIGNED NOT NULL,
  `fk_id_utilisateur` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `serveur`
--

CREATE TABLE `serveur` (
  `id_serveur` int(11) UNSIGNED NOT NULL,
  `nom_serveur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intitule` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_espace`
--

CREATE TABLE `type_espace` (
  `id_type_espace` int(11) UNSIGNED NOT NULL,
  `nom_type_espace` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_message`
--

CREATE TABLE `type_message` (
  `id_type_message` int(11) UNSIGNED NOT NULL,
  `nom_type_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) UNSIGNED NOT NULL,
  `nom_utilisateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_utilisateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_utilisateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_utilisateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_utilisateur` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_contact`
--

CREATE TABLE `utilisateur_contact` (
  `id_utilisateur` int(11) UNSIGNED NOT NULL,
  `fk_id_utilisateur1` int(11) UNSIGNED NOT NULL,
  `fk_id_utilisateur2` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_espace`
--

CREATE TABLE `utilisateur_espace` (
  `id_utilisateur_espace` int(11) UNSIGNED NOT NULL,
  `fk_id_utilisateur` int(11) UNSIGNED NOT NULL,
  `fk_id_espace` int(11) UNSIGNED NOT NULL,
  `autorisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_serveur`
--

CREATE TABLE `utilisateur_serveur` (
  `id_utilisateur_serveur` int(11) UNSIGNED NOT NULL,
  `fk_id_utilisateur` int(11) UNSIGNED NOT NULL,
  `fk_id_serveur` int(11) UNSIGNED NOT NULL,
  `autorisation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `espace`
--
ALTER TABLE `espace`
  ADD PRIMARY KEY (`id_espace`),
  ADD KEY `fk_id_serveur` (`fk_id_serveur`),
  ADD KEY `fk_id_type_espace` (`fk_id_type_espace`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `fk_id_type_message` (`fk_id_type_message`),
  ADD KEY `fk_id_espace` (`fk_id_espace`),
  ADD KEY `fk_id_utilisateur` (`fk_id_utilisateur`);

--
-- Index pour la table `serveur`
--
ALTER TABLE `serveur`
  ADD PRIMARY KEY (`id_serveur`);

--
-- Index pour la table `type_espace`
--
ALTER TABLE `type_espace`
  ADD PRIMARY KEY (`id_type_espace`);

--
-- Index pour la table `type_message`
--
ALTER TABLE `type_message`
  ADD PRIMARY KEY (`id_type_message`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `utilisateur_contact`
--
ALTER TABLE `utilisateur_contact`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `fk_id_utilisateur1` (`fk_id_utilisateur1`),
  ADD KEY `fk_id_utilisateur2` (`fk_id_utilisateur2`);

--
-- Index pour la table `utilisateur_espace`
--
ALTER TABLE `utilisateur_espace`
  ADD PRIMARY KEY (`id_utilisateur_espace`),
  ADD KEY `fk_id_utilisateur` (`fk_id_utilisateur`),
  ADD KEY `fk_id_espace` (`fk_id_espace`);

--
-- Index pour la table `utilisateur_serveur`
--
ALTER TABLE `utilisateur_serveur`
  ADD PRIMARY KEY (`id_utilisateur_serveur`),
  ADD KEY `fk_id_utilisateur` (`fk_id_utilisateur`),
  ADD KEY `fk_id_serveur` (`fk_id_serveur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `espace`
--
ALTER TABLE `espace`
  MODIFY `id_espace` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `serveur`
--
ALTER TABLE `serveur`
  MODIFY `id_serveur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_espace`
--
ALTER TABLE `type_espace`
  MODIFY `id_type_espace` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_message`
--
ALTER TABLE `type_message`
  MODIFY `id_type_message` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur_contact`
--
ALTER TABLE `utilisateur_contact`
  MODIFY `id_utilisateur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur_espace`
--
ALTER TABLE `utilisateur_espace`
  MODIFY `id_utilisateur_espace` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur_serveur`
--
ALTER TABLE `utilisateur_serveur`
  MODIFY `id_utilisateur_serveur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `espace`
--
ALTER TABLE `espace`
  ADD CONSTRAINT `fk_id_serveur_contrainte` FOREIGN KEY (`fk_id_serveur`) REFERENCES `serveur` (`id_serveur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_type_espace_contrainte` FOREIGN KEY (`fk_id_type_espace`) REFERENCES `type_espace` (`id_type_espace`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_id_espace_contrainte` FOREIGN KEY (`fk_id_espace`) REFERENCES `espace` (`id_espace`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_type_message_contrainte` FOREIGN KEY (`fk_id_type_message`) REFERENCES `type_message` (`id_type_message`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_utilisateur_contrainte` FOREIGN KEY (`fk_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_contact`
--
ALTER TABLE `utilisateur_contact`
  ADD CONSTRAINT `fk_id_utilisateur1_contrainte` FOREIGN KEY (`fk_id_utilisateur1`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_utilisateur2_contrainte` FOREIGN KEY (`fk_id_utilisateur2`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_espace`
--
ALTER TABLE `utilisateur_espace`
  ADD CONSTRAINT `fk_id_espace_contrainte2` FOREIGN KEY (`fk_id_espace`) REFERENCES `espace` (`id_espace`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_utilisateur_contrainte2` FOREIGN KEY (`fk_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur_serveur`
--
ALTER TABLE `utilisateur_serveur`
  ADD CONSTRAINT `fk_id_serveur_contrainte2` FOREIGN KEY (`fk_id_serveur`) REFERENCES `serveur` (`id_serveur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_utilisateur_contrainte3` FOREIGN KEY (`fk_id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
