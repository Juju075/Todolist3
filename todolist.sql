-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 09 avr. 2022 à 16:07
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
-- Base de données : `todolist`
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
(1, 1, '2021-08-25 13:18:02', 'magnam', 'Aut qui aspernatur ut vitae vel vitae cupiditate non. A dolore impedit numquam et consequuntur tempore. Et explicabo mollitia sit est et dolores fugiat voluptas.', 0, '2022-04-09 16:03:23'),
(2, 1, '2021-09-07 12:54:22', 'voluptatum', 'Accusantium optio tempore autem et quo nostrum et. Officia iusto soluta quia amet sit voluptatum consequatur sit. Quidem cupiditate ut harum possimus commodi deleniti. Aut alias aut neque eos.', 0, '2022-04-09 16:03:23'),
(3, 1, '2021-12-10 17:47:40', 'aut', 'Assumenda consequuntur veritatis voluptatem soluta voluptas sint recusandae quibusdam. Qui adipisci est aut non eius. Dolor harum amet molestias itaque odit vel ut. Et dolores pariatur repellendus quis tempore ut.', 0, '2022-04-09 16:03:23'),
(4, 1, '2021-05-17 19:11:33', 'facilis', 'Tenetur odio adipisci omnis iusto iure. Voluptatem consequatur aut rerum voluptate. Voluptas aliquid ut quia quod ut minus ipsum.', 0, '2022-04-09 16:03:23'),
(5, 2, '2021-05-08 15:46:57', 'harum', 'Sint voluptas sequi non rerum repellendus. Omnis repellendus corporis et ab nostrum ut. Labore laboriosam dolorem tempora voluptatem qui qui. Cumque qui voluptatibus alias pariatur illo.', 0, '2022-04-09 16:03:23'),
(6, 2, '2021-10-07 15:56:09', 'tenetur', 'Quis est voluptatum unde placeat excepturi vel modi. Ut architecto eos quis a deleniti labore voluptatum. Sit recusandae est sequi.', 0, '2022-04-09 16:03:23'),
(7, 2, '2021-04-23 16:17:00', 'ad', 'Et et rem reprehenderit quod laudantium commodi est facilis. Aut eaque sit blanditiis ut eum repellendus minima ut. Necessitatibus quas eveniet sit sit.', 0, '2022-04-09 16:03:23'),
(8, 2, '2022-02-26 09:53:31', 'eligendi', 'Vero mollitia dolorem ut reprehenderit expedita quam quas. Placeat qui vel laudantium excepturi. Minima quia sit vero impedit distinctio quibusdam. Pariatur tempora temporibus vero.', 0, '2022-04-09 16:03:23'),
(9, 2, '2021-09-23 17:53:37', 'omnis', 'Rerum ipsam et et quibusdam quas. Repellat a et dolores. Rem inventore alias quo neque a sunt.', 0, '2022-04-09 16:03:23'),
(10, 2, '2021-06-29 07:02:29', 'ea', 'Placeat possimus sed consectetur et at rerum cumque. Dolores odio nostrum qui corrupti et ducimus vel. Aut enim et dolorem consequuntur. Et culpa sequi qui voluptas suscipit similique.', 0, '2022-04-09 16:03:23'),
(11, 3, '2021-12-24 03:38:01', 'saepe', 'Impedit sapiente vel consequuntur corporis. Ex perferendis est ut eligendi quam eligendi recusandae. Et animi sunt omnis debitis repellendus eaque culpa. Voluptas ut modi doloremque quia dolorem.', 0, '2022-04-09 16:03:23'),
(12, 3, '2021-08-24 19:21:13', 'vel', 'Maiores aut iste commodi impedit et aut voluptatum. Veniam sit rem voluptas cumque eligendi et voluptates. Eius aut est sint consequatur. Molestiae excepturi sequi enim ad esse quia id.', 0, '2022-04-09 16:03:23'),
(13, 3, '2021-05-31 07:29:09', 'optio', 'Est sed minus placeat similique. Eos debitis et aut est ipsum dolores nihil. Dolorem laboriosam maiores ut amet atque earum tempore. Molestiae perferendis autem iusto ut laudantium.', 0, '2022-04-09 16:03:23'),
(14, 3, '2022-01-23 10:35:13', 'et', 'Fugiat eaque voluptas veritatis cumque a vel. Numquam architecto pariatur sit sunt accusantium doloremque iusto. Expedita inventore nostrum maiores est modi.', 0, '2022-04-09 16:03:23'),
(15, 3, '2021-12-30 23:30:51', 'aut', 'Modi voluptate laboriosam consequuntur illum quo neque similique. Quam et debitis asperiores voluptates aliquid consequuntur corporis esse. Aperiam numquam quia ipsum qui modi.', 0, '2022-04-09 16:03:23'),
(16, 3, '2022-04-08 13:10:29', 'est', 'Dolor et qui ducimus sint ipsam inventore. Eligendi molestiae perspiciatis officiis suscipit culpa laboriosam iste. In corporis similique et earum aut. Sed facere facilis et consectetur aperiam et alias.', 0, '2022-04-09 16:03:23'),
(17, 4, '2021-07-22 13:25:33', 'culpa', 'Rerum ut nihil earum. Alias officia laboriosam veritatis pariatur. Cumque corrupti architecto et aut autem asperiores. Maxime sed distinctio quidem asperiores fugit consequatur eum.', 0, '2022-04-09 16:03:23'),
(18, 4, '2021-04-14 04:30:55', 'aut', 'Quas beatae facere laboriosam consequuntur aut dolorum veritatis. Labore architecto dolor qui itaque. Incidunt ut corrupti eveniet ex consequatur.', 0, '2022-04-09 16:03:23'),
(19, 4, '2021-12-12 07:16:14', 'ipsa', 'Sed repudiandae impedit ut incidunt id. Delectus sint qui quibusdam iusto. Et voluptatem quia inventore repellendus. Ex ex provident illo reprehenderit.', 0, '2022-04-09 16:03:23'),
(20, 4, '2021-09-16 08:13:32', 'quis', 'Dolore et ipsum cupiditate libero nisi dolores tempore quam. Quibusdam suscipit nihil ratione tempora possimus quis molestiae. Quia commodi ab et reiciendis et quisquam. Odio illum et sunt dolorum ex.', 0, '2022-04-09 16:03:23'),
(21, 4, '2021-12-01 14:17:44', 'eaque', 'Velit nisi debitis ut hic et deserunt repellat. Minus qui repellendus facere facere impedit.', 0, '2022-04-09 16:03:23'),
(22, 4, '2022-01-26 16:40:08', 'excepturi', 'Et reprehenderit voluptas quis aliquid non. Alias cumque at itaque quia pariatur aut id. Voluptatem voluptate repellat ipsum dignissimos exercitationem voluptas commodi. Qui consequatur tenetur dolores similique.', 0, '2022-04-09 16:03:23'),
(23, NULL, '2021-06-30 04:28:43', 'odio', 'Anonymous content_0', 0, '2022-04-09 16:03:23'),
(24, NULL, '2022-01-18 08:42:31', 'qui', 'Anonymous content_1', 0, '2022-04-09 16:03:23'),
(25, NULL, '2022-02-11 14:20:16', 'quasi', 'Anonymous content_2', 0, '2022-04-09 16:03:23'),
(26, NULL, '2021-06-21 14:56:51', 'tempora', 'Anonymous content_3', 0, '2022-04-09 16:03:23'),
(27, NULL, '2021-05-28 19:14:20', 'iste', 'Anonymous content_4', 0, '2022-04-09 16:03:23');

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
(1, 'wmorel', 'admin@todolist.com', '[\"ROLE_ADMIN\"]', '$2y$13$91spPqBaCZjs30r00yguEeKL/kdG/ZvnntORvDBBFAq.PvRKn5BVO', '2022-04-09 16:03:21', '2022-04-09 16:03:21'),
(2, 'hleveque', 'john.doe@testexample.com', '[\"ROLE_USER\"]', '$2y$13$U779OMTYqTOIe6ExbDzRZOJo5kS7WnL/R6VopyE5XQHZjX7Y4PtEe', '2022-04-09 16:03:22', '2022-04-09 16:03:22'),
(3, 'veronique.thomas', 'rbousquet@lacroix.com', '[\"ROLE_USER\"]', '$2y$13$d7v3E7SqAaeuk49NMRxw1.QgsMqYottJaWp.8b7wnNR.0BdJEMo2m', '2022-04-09 16:03:22', '2022-04-09 16:03:22'),
(4, 'tessier.jean', 'perrier.emmanuel@hotmail.fr', '[\"ROLE_USER\"]', '$2y$13$IytWKEbNjStYc/AnxtH8RuBKHaR0/zV1fGN6o9Z9sGracQ/oIirmK', '2022-04-09 16:03:23', '2022-04-09 16:03:23');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
