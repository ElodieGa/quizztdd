-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 oct. 2023 à 17:46
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizztdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `nom`) VALUES
(1, 'Combien de minutes y a-t-il dans une semaine ?'),
(2, 'Combien d\'éléments y a-t-il dans la table périodique ?'),
(3, 'Quelle entreprise était originellement appelée Cadabra ?'),
(4, 'Combien de points ont deux paires de dés ?'),
(5, 'Quelle est la planète la plus proche du Soleil ?'),
(6, 'De quelle couleur sont les étoiles sur le drapeau des États-Unis ?'),
(7, 'À quoi font référence les initiales DC (films) ?'),
(8, 'Quel pays a inventé le thé ?');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `nom`, `is_correct`, `id_question`) VALUES
(1, '10080', 1, 1),
(2, '20360', 0, 1),
(3, '5800', 0, 1),
(4, '13600', 0, 1),
(5, '118', 1, 2),
(6, '119', 0, 2),
(7, '120', 0, 2),
(8, '117', 0, 2),
(9, 'Amazon', 1, 3),
(10, 'Ebay', 0, 3),
(11, 'Google', 0, 3),
(12, 'Abra', 0, 3),
(13, '42', 1, 4),
(14, '21', 0, 4),
(15, '17', 0, 4),
(16, '37', 0, 4),
(17, 'Mercure', 1, 5),
(18, 'Saturne', 0, 5),
(19, 'Mars', 0, 5),
(20, 'Venus', 0, 5),
(21, 'Blanches', 1, 6),
(22, 'Rouges', 0, 6),
(23, 'Bleues', 0, 6),
(24, 'Jaunes', 0, 6),
(25, 'Detective Comics', 1, 7),
(26, 'Dangerous Comics', 0, 7),
(27, 'Dark Champions', 0, 7),
(28, 'Daring Champions', 0, 7),
(29, 'La Chine', 1, 8),
(30, 'L\'Angleterre', 0, 8),
(31, 'L\'Italie', 0, 8),
(32, 'La Bulgarie', 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `reponses_user`
--

CREATE TABLE `reponses_user` (
  `id` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `score` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses_user`
--
ALTER TABLE `reponses_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `reponses_user`
--
ALTER TABLE `reponses_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
