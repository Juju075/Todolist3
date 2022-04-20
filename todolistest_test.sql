-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 09 avr. 2022 à 16:08
-- Version du serveur : 8.0.22
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolistest_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `user_id`, `created_at`, `title`, `content`, `is_done`, `updated_at`) VALUES
(1, 1, '2021-05-16 22:42:35', 'odio', 'Maiores incidunt cumque cupiditate qui reiciendis aut. Magnam quia et beatae non voluptatem qui cupiditate. Ut quia unde ea voluptate eum. Necessitatibus dolor occaecati animi culpa quam mollitia. Veniam sed nulla est architecto corporis.', 0, '2022-04-09 16:04:42'),
(2, 1, '2021-12-23 06:38:07', 'impedit', 'Inventore dignissimos ratione voluptas consequuntur quod. Doloremque voluptatibus velit vitae accusantium nostrum. Quis adipisci vero voluptatum minima. Autem hic vitae earum aut facilis asperiores autem.', 0, '2022-04-09 16:04:42'),
(3, 1, '2021-05-29 00:02:40', 'omnis', 'Dicta provident repellendus odio provident voluptatem qui. Et ullam qui qui ipsam dolor. Magnam dolorum saepe non consequuntur fugit fugiat. Excepturi iusto aut ea quasi non mollitia.', 0, '2022-04-09 16:04:42'),
(4, 1, '2021-06-08 15:19:04', 'optio', 'Voluptates autem optio et accusamus optio vel. Non labore recusandae enim quia harum aliquam eius. Sit quia quod odit optio consectetur impedit dolorem. Odit et beatae quibusdam dolorem. Totam ullam quo ex labore aperiam sit est.', 0, '2022-04-09 16:04:42'),
(5, 1, '2022-01-10 06:44:04', 'quis', 'Quo architecto quisquam ut ut qui saepe laborum. Praesentium fugit reiciendis et molestias. Facilis rem libero quam veniam distinctio odit vitae. Ducimus est distinctio omnis ullam.', 0, '2022-04-09 16:04:42'),
(6, 1, '2021-04-18 19:09:27', 'pariatur', 'Molestias praesentium cumque voluptate rerum fugit qui. Incidunt nisi molestiae architecto ea labore fugit et. Sunt quo odit repudiandae. Qui explicabo quisquam aperiam distinctio qui temporibus ratione.', 0, '2022-04-09 16:04:42'),
(7, 2, '2021-11-28 05:18:55', 'quos', 'Rerum dolorem non quam qui qui magni dolor. Et non accusantium labore blanditiis quidem. Magni eaque quia aut blanditiis exercitationem. Occaecati porro quia doloribus nihil animi ut ab. Quia dignissimos saepe sed numquam et.', 0, '2022-04-09 16:04:42'),
(8, 2, '2021-09-11 05:12:41', 'iusto', 'Optio et beatae ut itaque. Veniam soluta doloribus minima unde ducimus nostrum. Occaecati quia reiciendis quod.', 0, '2022-04-09 16:04:42'),
(9, 2, '2021-09-03 07:57:26', 'ut', 'Inventore voluptas eaque saepe quia dolor accusantium. Et in et eos. Voluptas non adipisci est minima ad quas. At repellendus molestias voluptatem fugiat quaerat fugiat.', 0, '2022-04-09 16:04:42'),
(10, 2, '2021-10-10 12:15:06', 'dolore', 'Nesciunt esse itaque quasi quasi cupiditate. Unde sint tempora rem accusamus qui aut. Qui voluptas dolorem consequatur reiciendis. Aut et praesentium velit laboriosam id dolor qui dolores. Delectus asperiores nihil nihil facere.', 0, '2022-04-09 16:04:42'),
(11, 2, '2021-07-20 17:40:54', 'accusantium', 'Ipsum voluptatem at nobis molestiae est voluptatem. Cumque consectetur blanditiis omnis. Esse explicabo magnam aliquid et consectetur laboriosam.', 0, '2022-04-09 16:04:42'),
(12, 3, '2022-01-12 03:36:17', 'exercitationem', 'Nam et facilis iste necessitatibus. Velit et tenetur consectetur rerum asperiores voluptates itaque. At explicabo quia aut.', 0, '2022-04-09 16:04:42'),
(13, 3, '2021-09-04 03:54:49', 'sequi', 'Nobis voluptatem et debitis itaque. Molestiae laudantium aut sunt sapiente odio. Ipsum ipsa aut fuga.', 0, '2022-04-09 16:04:42'),
(14, 3, '2021-12-13 23:09:34', 'unde', 'Quia sit voluptas dolor sit. Fugit ducimus animi officiis labore ratione voluptates. Unde eveniet tempore hic repellat et sed.', 0, '2022-04-09 16:04:42'),
(15, 3, '2022-01-23 11:50:26', 'vel', 'Ipsa accusamus praesentium doloribus amet. Voluptatem in facere eos. Commodi culpa repellendus ducimus cum totam natus atque nulla. Accusamus necessitatibus quisquam eligendi quia nisi.', 0, '2022-04-09 16:04:42'),
(16, 4, '2021-07-22 12:12:11', 'cumque', 'Velit aut cum autem quia alias repudiandae. Cum aut sit omnis qui cupiditate aliquid rerum possimus. Voluptate nihil occaecati pariatur est voluptas.', 0, '2022-04-09 16:04:42'),
(17, 4, '2022-03-07 20:20:45', 'provident', 'Ipsa minima quibusdam eligendi facere sint libero autem. Consequatur tempore animi possimus ea rerum rerum quia beatae. Sit dolorem omnis quis quo eveniet. Eum voluptatem id doloremque aut voluptas magnam dolor.', 0, '2022-04-09 16:04:42'),
(18, 4, '2021-06-23 21:47:37', 'autem', 'Expedita dolorem quam sed. Eos quia et quidem adipisci voluptas rerum culpa. Nisi ipsum aut voluptatum. Enim corrupti et omnis omnis optio. Non temporibus quia minus doloremque.', 0, '2022-04-09 16:04:42'),
(19, NULL, '2021-10-21 16:14:32', 'dolorem', 'Anonymous content_0', 0, '2022-04-09 16:04:42'),
(20, NULL, '2022-02-06 15:39:39', 'ut', 'Anonymous content_1', 0, '2022-04-09 16:04:42'),
(21, NULL, '2022-02-01 12:21:34', 'ea', 'Anonymous content_2', 0, '2022-04-09 16:04:42'),
(22, NULL, '2021-10-04 15:06:55', 'adipisci', 'Anonymous content_3', 0, '2022-04-09 16:04:42'),
(23, NULL, '2021-10-16 19:13:00', 'voluptatem', 'Anonymous content_4', 0, '2022-04-09 16:04:42');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `roles`, `password`, `created_at`, `updated_at`) VALUES
(1, 'leveque.lucy', 'admin@todolist.com', '[\"ROLE_ADMIN\"]', '$2y$04$.ZiIEfW98GpiXd4BUfVEGOuT6tZpjIcEde474X2s0G4FiKRg2.gL6', '2022-04-09 16:04:41', '2022-04-09 16:04:41'),
(2, 'ferreira.gabriel', 'john.doe@testexample.com', '[\"ROLE_USER\"]', '$2y$04$QxDqNk0cgX02bYgJShEKmuVSYCW2CTMrD4lDePz1A5.95LeMbQpZC', '2022-04-09 16:04:41', '2022-04-09 16:04:41'),
(3, 'honore15', 'bernard.rousset@julien.org', '[\"ROLE_USER\"]', '$2y$04$SHnU2QkxP3C6VplP5vV2uu1aowjwN51n3rm4Qc0Vm8E4PRbG2xeu.', '2022-04-09 16:04:41', '2022-04-09 16:04:41'),
(4, 'margot32', 'xdelaunay@becker.com', '[\"ROLE_USER\"]', '$2y$04$GKX8v4TP/0Jg4pixli/f2./Bcuay8U0O5bpwcoCT03H1qw20Xo9eS', '2022-04-09 16:04:41', '2022-04-09 16:04:41');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_527EDB25A76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_527EDB25A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
