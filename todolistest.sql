-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 25 mars 2022 à 21:01
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
  `user_id` int NOT NULL,
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
(1, 1, '2021-04-10 18:43:51', 'perferendis', 'Laboriosam quis molestias sit est animi qui temporibus sed.', 1, '2022-03-25 20:29:10'),
(2, 1, '2021-07-21 02:58:48', 'maxime', 'Quibusdam minus unde repudiandae inventore rerum amet ut qui. Omnis et nemo vel. Mollitia cumque ratione aspernatur repellat tenetur neque debitis minus. Culpa temporibus tempore aut.', 0, '2022-03-20 21:36:24'),
(3, 1, '2022-03-10 12:17:27', 'optio', 'Incidunt velit ab sunt reprehenderit dolorem. Eligendi et est illo voluptates itaque sit.', 0, '2022-03-20 21:36:24'),
(4, 1, '2021-04-16 23:29:41', 'aspernatur', 'Perferendis aspernatur tempora quis inventore doloremque iure. Et fuga molestias aspernatur repellat iusto repellendus. Architecto explicabo commodi quia.', 0, '2022-03-20 21:36:24'),
(5, 1, '2021-04-02 13:33:03', 'non', 'Dolorem suscipit sint et error. Reiciendis facere amet culpa ut a quod nihil. Voluptas minus mollitia est autem ipsum voluptas. Aut eum sed ab iste et est. Magni voluptas deleniti quam.', 0, '2022-03-20 21:36:24'),
(6, 1, '2021-08-09 20:13:10', 'neque', 'Qui nulla sint error omnis assumenda. Odio voluptatem earum aperiam voluptate dolores impedit. Molestiae quis qui iste veritatis. Porro amet et consectetur qui harum eos qui. Nostrum voluptatem quia vel corrupti odio delectus.', 0, '2022-03-20 21:36:24'),
(7, 2, '2021-05-02 09:52:01', 'odit', 'Autem omnis commodi quia doloremque eum. Neque ut neque perferendis. Dolore omnis voluptatem doloribus.', 0, '2022-03-20 21:36:24'),
(8, 2, '2022-02-01 14:53:42', 'deleniti', 'Optio ad adipisci perspiciatis culpa eum assumenda beatae. Sunt dolores ut sed natus eius voluptatum.', 0, '2022-03-20 21:36:24'),
(9, 2, '2021-04-05 01:57:37', 'quod', 'Est quibusdam autem nostrum perspiciatis ab ad quibusdam. Nisi praesentium quas sunt saepe accusamus. Ratione dolorum odio voluptates. Rem impedit sit voluptates ullam magni dicta provident.', 0, '2022-03-20 21:36:24'),
(10, 2, '2022-02-26 03:24:20', 'vero', 'Nulla dolor in aut et. Officia quia officia eaque est et. A dicta cumque est quia quia voluptatem.', 0, '2022-03-20 21:36:24'),
(11, 2, '2022-01-28 08:14:17', 'magnam', 'Accusamus illo omnis eligendi ab saepe sint sit. Laudantium debitis voluptatum assumenda eaque reprehenderit. Reiciendis inventore et ipsa ratione. Quibusdam corporis voluptatem et. At eos rerum laboriosam ab.', 0, '2022-03-20 21:36:24'),
(12, 2, '2022-01-12 14:46:05', 'iusto', 'Ut voluptas tempore non inventore. Aut et quos omnis. Non consequatur non vel praesentium. Consequuntur vel quia dolore voluptatem.', 0, '2022-03-20 21:36:24'),
(13, 3, '2022-03-13 21:47:23', 'quis', 'Neque eum eligendi dolorem tempora qui est fuga porro. Et modi doloremque distinctio expedita ut sed et. Occaecati quia odio quaerat qui dignissimos. Voluptas dolor non earum in ea.', 0, '2022-03-20 21:36:24'),
(14, 3, '2021-10-24 12:12:18', 'quod', 'Itaque nemo sunt fugiat culpa. Incidunt eligendi eligendi est consequatur ea deleniti autem. Aut rerum repellat voluptatem cupiditate. Velit voluptatem laudantium ad quisquam. Asperiores molestias voluptatem nobis.', 0, '2022-03-20 21:36:24'),
(15, 3, '2021-03-27 20:37:23', 'in', 'Officiis laborum nam atque consectetur. Qui et natus sint omnis odit accusamus. Sint odit enim repellendus exercitationem sit ut. Consequatur quod sed odit. Voluptates suscipit quibusdam fugiat est ut numquam.', 0, '2022-03-20 21:36:24'),
(16, 3, '2022-01-24 03:27:55', 'quo', 'Blanditiis ipsam et voluptas dolorum doloremque in deserunt. Quidem ut nemo reprehenderit. Et sapiente iste sint cumque id voluptatem in repellat. Cupiditate aut recusandae ab assumenda est.', 0, '2022-03-20 21:36:24'),
(17, 3, '2021-07-28 19:40:10', 'quas', 'Doloribus et non quisquam vel ut. Aliquid autem magnam quia nisi ea. Magnam asperiores est tempora impedit. Aut saepe omnis veniam similique placeat ut laudantium debitis.', 0, '2022-03-20 21:36:24'),
(18, 4, '2021-09-29 06:42:40', 'dolores', 'Sed eum fugit eligendi itaque culpa. Voluptas deleniti nulla nemo dignissimos. Qui aliquid iste quibusdam neque quia impedit eius.', 0, '2022-03-20 21:36:24'),
(19, 4, '2021-08-05 09:22:34', 'aut', 'Assumenda quisquam voluptatum ab nisi voluptas. Quia sint sapiente eligendi aspernatur eos impedit aut.', 0, '2022-03-20 21:36:24'),
(20, 4, '2021-06-25 10:00:55', 'aut', 'Qui sed delectus vel dolorem excepturi. Illum qui animi error voluptas adipisci ut. Architecto nostrum omnis aliquam.', 0, '2022-03-20 21:36:24'),
(21, 4, '2021-05-24 12:42:42', 'corporis', 'Itaque et eius fugiat culpa quia quo. In ut dignissimos molestias voluptatem dignissimos. Maxime impedit facere molestias esse vel et. Incidunt voluptatem numquam sit sequi impedit non eos omnis.', 0, '2022-03-20 21:36:24'),
(22, 4, '2021-05-04 17:40:42', 'ducimus', 'A dolores rem aspernatur odit corporis eos ab. Aperiam autem quae saepe. Omnis esse rerum soluta culpa. Non dolore asperiores omnis iste dolores maiores. Quia est non voluptas est et. Et est sed quia nihil accusantium accusantium ratione.', 0, '2022-03-20 21:36:24'),
(24, 1, '2022-03-21 13:18:53', 'et', 'Omnis fugiat esse ipsam. Magnam dolor vel facere voluptates voluptatem nobis voluptatibus minima. Eius et autem at eius ut numquam. Nisi enim perspiciatis deserunt ad.', 0, '2022-03-21 13:18:53'),
(25, 1, '2022-03-21 13:51:08', 'vel', 'Debitis assumenda harum quas. Aut quam ea ab similique voluptatibus similique. Omnis quos consequatur iste qui in. Qui est voluptate quo reprehenderit mollitia aut.', 0, '2022-03-21 13:51:09'),
(26, 1, '2022-03-21 16:13:03', 'voluptatem', 'Reprehenderit minima consequatur nostrum. Ut expedita id aspernatur ea eum qui. Ut et rerum est itaque enim impedit aut. Dolores provident praesentium deserunt amet saepe aut est est.', 0, '2022-03-21 16:13:03'),
(27, 1, '2022-03-21 16:18:06', 'aliquam', 'Iusto et sunt non ut minus. Fugiat ullam eligendi rem quia vel. Fuga quidem nam aut. Nostrum impedit est animi.', 0, '2022-03-21 16:18:07'),
(28, 1, '2022-03-21 18:09:33', 'deleniti', 'Sit necessitatibus perspiciatis illo. Sunt nemo repudiandae necessitatibus et nulla.', 0, '2022-03-21 18:09:34'),
(29, 1, '2022-03-23 12:07:02', 'eum', 'Soluta quia quam rerum nostrum qui sunt sed. Illo in reiciendis aut at eum quia beatae. Placeat consequatur esse distinctio aut dignissimos. Facilis commodi aut quasi quidem dolor placeat.', 0, '2022-03-23 12:07:02'),
(30, 1, '2022-03-23 12:09:36', 'voluptas', 'Quae et iure voluptas voluptatem fuga et. Id omnis dignissimos dolore. Enim ex et qui aut dolor illum impedit facilis.', 0, '2022-03-23 12:09:36'),
(31, 1, '2022-03-23 12:12:45', 'illo', 'Id explicabo rem ut ut rerum. Cumque quisquam sapiente sit. Similique eum saepe voluptatem libero.', 0, '2022-03-23 12:12:45'),
(32, 1, '2022-03-23 12:13:13', 'deleniti', 'Voluptas iste blanditiis similique sequi nesciunt dolorem nihil amet. Minima sed molestiae fugit. Qui aut quaerat vero molestias est omnis odit.', 0, '2022-03-23 12:13:13'),
(33, 1, '2022-03-23 12:15:26', 'dolorem', 'Ut vel ullam est similique ipsum. Voluptas eius velit nihil nostrum aut qui. Fugit voluptates pariatur fugit optio culpa cumque molestiae. Possimus recusandae cumque necessitatibus consectetur in occaecati recusandae.', 0, '2022-03-23 12:15:26'),
(34, 1, '2022-03-25 19:51:09', 'ad', 'Libero dicta id perferendis nulla autem nam magni. Asperiores commodi ut sequi excepturi quia explicabo. Est officia et nesciunt mollitia aperiam doloremque impedit illum.', 0, '2022-03-25 19:51:09'),
(35, 1, '2022-03-25 20:25:30', 'nemo', 'Quasi enim architecto quia. Laborum laboriosam dolor aut.', 0, '2022-03-25 20:25:30'),
(36, 1, '2022-03-25 20:29:09', 'officiis', 'Aut nulla hic deleniti rem vel laborum corrupti molestiae. Unde molestias qui ab ea aut enim. Similique ut voluptas vel omnis architecto dignissimos nobis.', 0, '2022-03-25 20:29:09');

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
(1, 'sabine.lemaire', 'admin@todolist.com', '[\"ROLE_ADMIN\"]', '$2y$04$xNU1JOLu4vlEFfNYi3RLlueZ3wh2CY5ALM5GZkyHpH3FMC97I5t.e', '2022-03-20 21:36:24', '2022-03-20 21:36:24'),
(2, 'alfred85', 'john.doe@testexample.com', '[\"ROLE_USER\"]', '$2y$04$Mwll97K8HIpP3xly4vTSZeF1N1b3Bj0bJtMVMVTckoDWirr7IXZai', '2022-03-20 21:36:24', '2022-03-20 21:36:24'),
(3, 'marcel.arnaud', 'maillard.simone@marin.org', '[\"ROLE_USER\"]', '$2y$04$tcloQT969m5NNAtjY8Fc2Oui07zaRKwO6BXjTavzj39nOlO/3FSb2', '2022-03-20 21:36:24', '2022-03-20 21:36:24'),
(4, 'lrousset', 'samson.suzanne@henry.fr', '[\"ROLE_USER\"]', '$2y$04$.1mh8xO8vYT/sIkvJddvCOfrViNWiUYcx.WD2v/S.EIArp/t8CBIe', '2022-03-20 21:36:24', '2022-03-20 21:36:24'),
(5, 'hoareau.gabriel', 'mmenard@hotmail.fr', '[\"ROLE_USER\"]', '$2y$04$0qPdmHyC0cvFYbbp8bykQeALMMuY1kEWmdGD8iTJxRfH4kj5yz0fW', '2022-03-21 13:18:51', '2022-03-21 13:18:51'),
(6, 'laure.blanchard', 'margaret.gosselin@live.com', '[\"ROLE_USER\"]', '$2y$04$4xAm.Qd0kGKDOaq0xdncKe7TTRU12b0FRy.I1MTls5BCRavduELoO', '2022-03-21 13:51:07', '2022-03-21 13:51:07'),
(7, 'nbernard', 'joly.robert@hotmail.fr', '[\"ROLE_USER\"]', '$2y$04$S0vOd.IdIPEQAYYzX2LD.eC7JSqmLmcov9xnJhoVet8GTsYmhKXWO', '2022-03-21 16:13:00', '2022-03-21 16:13:00'),
(8, 'maurice27', 'antoinette27@club-internet.fr', '[\"ROLE_USER\"]', '$2y$04$LNQM5MMzwMcLWx0MHu6fhejx2PzMFQiwTRUmf5rvo6u1zHTNmmLY6', '2022-03-21 16:18:04', '2022-03-21 16:18:04'),
(9, 'qleroy', 'genevieve.marchand@gmail.com', '[\"ROLE_USER\"]', '$2y$04$2kaWaLNP87OiU/RJBCN.WeUHltiJ9De5ktA53TFwpVkGAo8SFwPA6', '2022-03-21 18:09:31', '2022-03-21 18:09:31'),
(10, 'gros.elisabeth', 'cdeschamps@noos.fr', '[\"ROLE_USER\"]', '$2y$04$z09ItmX92ZKbw4HVXvN5le/XO3p8InV6m9Gt1W5Qvnmr1xOwssAVK', '2022-03-23 12:06:59', '2022-03-23 12:06:59'),
(11, 'alexandrie.meyer', 'julien79@sfr.fr', '[\"ROLE_USER\"]', '$2y$04$r9eYlATbqC/QGLFGKiugwORyC7u8Xs7do4ViFGBAxw46FqsF28t7.', '2022-03-23 12:09:34', '2022-03-23 12:09:34'),
(12, 'hgoncalves', 'mhardy@club-internet.fr', '[\"ROLE_USER\"]', '$2y$04$CVs.GWp22cobWHQeYxKrVegZhSy71Fw0STXl8lNosP6Z7L.60Lxle', '2022-03-23 12:12:43', '2022-03-23 12:12:43'),
(13, 'virginie67', 'renard.stephane@sfr.fr', '[\"ROLE_USER\"]', '$2y$04$uW92br0a/Gz7g8IJkXYiVeAD3sRAwwDlLMqKjgA15peC7Pq0phg7S', '2022-03-23 12:13:11', '2022-03-23 12:13:11'),
(14, 'sabine91', 'emile65@orange.fr', '[\"ROLE_USER\"]', '$2y$04$n0mzLs26V87oIffktcB1C.AybbOSfcxel/T70szdq1ySlzzM1YzyW', '2022-03-23 12:15:24', '2022-03-23 12:15:24'),
(15, 'lefort.adrienne', 'bodin.laurence@yahoo.fr', '[\"ROLE_USER\"]', '$2y$04$8SLbm/DGV469ro8RkYFqlOXzuFcLKPnCUyqXsI6KE3QVnLwZImBqS', '2022-03-25 19:51:06', '2022-03-25 19:51:06'),
(16, 'kmorel', 'igilles@free.fr', '[\"ROLE_USER\"]', '$2y$04$tnTR5Rc7oGQ8ARzzPVwJeO022pE62MP0wmJGRSZ7HkieqZW1FVO.2', '2022-03-25 20:25:27', '2022-03-25 20:25:27'),
(17, 'eugene20', 'benoit.bigot@live.com', '[\"ROLE_USER\"]', '$2y$04$w5cuAcrnLmca/DInk7dBd.3hWAdPTWod9a2am.rtmFqexpvQXgkvi', '2022-03-25 20:29:07', '2022-03-25 20:29:07');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
