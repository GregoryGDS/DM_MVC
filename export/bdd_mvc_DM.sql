-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mariadb
-- Généré le :  Dim 03 nov. 2019 à 22:09
-- Version du serveur :  10.4.8-MariaDB-1:10.4.8+maria~bionic
-- Version de PHP :  7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_mvc_DM`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'ANIMAUX'),
(3, 'COLLECTION'),
(1, 'TEST'),
(11, 'TEST ADD CAT');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `idPost` int(11) DEFAULT NULL,
  `idAuthor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `idPost`, `idAuthor`) VALUES
(1, 'Je trouve ce test de post très utile.\r\n', 1, 7),
(3, 'test', 21, 5),
(5, 'TROP BELLE &lt;3', 18, 9),
(8, 'J\'adore cette image xD', 32, 9),
(9, 'verif que tout fonctionne', 34, 9);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `imagePath`, `title`, `content`, `idCategory`, `idUser`) VALUES
(1, 'img/BDD/identite.jpg', 'Titre Test', 'Ceci est une description de test.\r\nMerci de votre compréhension ', 1, 5),
(2, 'img/BDD/identite.jpg', 'encore un test', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 1, 7),
(3, 'img/BDD/identite.jpg', 'toujours pareil :)', 'testtesttesttesttesttesttesttest', 1, 5),
(4, 'img/BDD/identite.jpg', 'c\'est encore moi', '<0/<0/<0/<0/<0/<0/<0/<0/<0/<0/<0/<0/<0/', 1, 5),
(18, 'img/BDD/nova.jpg', 'Ma Nova', 'Petite chienne qui va sur ses 3 ans, tÃªtue et voleuse mais on l\'aime ^^', 2, 9),
(19, 'img/BDD/hinata_tsume.jpg', 'Hinata - Tsume', '(ma premiÃ¨re statuette)\r\nSplendide statuette de Hinata du manga Naruto Shippuden. CrÃ©Ã©e par Tsume, sculpture trÃ¨s dÃ©taillÃ©e, dont la peinture offre de nombreux dÃ©gradÃ©s pour agrÃ©menter le rendu.\r\n\r\nCeci Ã©tant, cette derniÃ¨re piÃ¨ce pousse leur travail encore un peu plus loin, avec un nouveau rendu sur les reflets des cheveux, plus proches des effets visibles dans un anime.\r\n\r\n----description reprise sur la page de Tsume----', 3, 9),
(20, 'img/BDD/link_f4f.jpg', 'Statuette Link', 'Magnifique statuette de Link du jeu &quot;The Legend of Zelda : Breath of the Wild&quot; que je ne me lasse pas de regarder.', 3, 9),
(21, 'img/BDD/zelda_f4f.jpg', 'Zelda', 'Je viens de me rendre compte qu\'elle allait sortir en fin d\'annÃ©e et je l\'ai trouvÃ© Ã  bon prix sur le site de la Fnac.\r\n\r\nJe me tÃ¢te Ã  l\'acheter pour qu\'elle rejoigne ma collection et le Link du mÃªme jeu o.o', 3, 9),
(27, 'img/BDD/loup.jpg', 'Loup', 'Magnifique loup prit en photo au zoo de Jurques <3', 2, 9),
(29, 'img/BDD/test.jpg', 'test new parametre edit', 'j\'ai rajoutÃ© un paramÃ¨tre edit Ã  la fonction de l\'image.\r\nJe test si l\'ajout de post marche toujour.', 1, 7),
(30, 'img/BDD/test.jpg', 'test de redirection', 'redirection aprÃ¨s mÃ j de post', 1, 7),
(32, 'img/BDD/remplir.jpg', 'Remplissage - plus d\'idÃ©e', 'Je veux juste avoir plus de 10 posts Â¯\\_(ãƒ„)_/Â¯', 1, 5),
(34, 'img/BDD/test.jpg', 'test presque final', 'plus que l\'affichage 10 par 10 et peut-Ãªtre le mdp oubliÃ© ?_? \r\n', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(5, 'test', 'test@gmail.com', '$2y$10$SmBNsA/a7zkxOOXvAka9Xua1AGIAcL11Rz1U.1MV9o3n7KfruwEg.'),
(6, 'Va', 'Valkovski@gmail.com', '$2y$10$j7za9N3x6V49kXqPZcxS9eooYHxT7fuP689YlTh0wP6jVfVK6QtO.'),
(7, 'test2', 'test2@gmail.com', '$2y$10$JYPBvrmgrI9ZyZxmBadUyudFjIANALu1Iwgtxj.TvY.qsVl6SIVmC'),
(9, 'GrÃ©gory', 'gregory.dossantos98@gmail.com', '$2y$10$MFwXwYxdu2FvOhJi1S9G7eKUlUd/5j32GJsaQTwjvx23qKrM1riAO'),
(10, 'testNew', 'testNew@gmail.com', '$2y$10$lSKidn7p/zPg1ao0sGXh0erk.jz99mLJuIuI0pAKyPCNaesFADVd6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPost` (`idPost`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `posts` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
