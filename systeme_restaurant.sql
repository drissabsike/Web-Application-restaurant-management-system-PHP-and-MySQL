-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 03 mai 2020 à 18:28
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `systeme_restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `activation` int(11) NOT NULL DEFAULT 0,
  `datecreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `ville`, `address`, `codepostale`, `email`, `password`, `token`, `activation`, `datecreate`) VALUES
(27, 'absike', 'idriss', 'rabat', 'el nahda 3', 10210, 'absike30@gmail.com', '6351bf9dce654515bf1ddbd6426dfa97', '', 1, '2020-04-24 16:29:21'),
(28, 'ayman', 'kamoun', 'Rabat', 'temara', 10250, 'ayman@gmail.com', '6351bf9dce654515bf1ddbd6426dfa97', '', 1, '2020-04-29 16:38:13');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `date_achat` timestamp NOT NULL DEFAULT current_timestamp(),
  `nom_client` varchar(30) NOT NULL,
  `prenom_client` varchar(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date_achat`, `nom_client`, `prenom_client`, `price`) VALUES
(1, '2020-04-28 16:46:47', 'absike', 'idriss', 227),
(2, '2020-04-28 16:51:55', 'absike', 'idriss', 227),
(5, '2020-04-28 20:43:24', 'absike', 'idriss', 221),
(6, '2020-04-28 20:45:25', 'absike', 'idriss', 0),
(7, '2020-04-28 20:46:46', 'absike', 'idriss', 221),
(8, '2020-04-29 15:17:02', 'absike', 'idriss', 230),
(9, '2020-04-29 15:32:19', 'absike', 'idriss', 230),
(10, '2020-04-29 15:32:37', 'absike', 'idriss', 230),
(11, '2020-04-29 15:35:19', 'absike', 'idriss', 230),
(12, '2020-04-29 16:06:51', 'absike', 'idriss', 230),
(20, '2020-05-03 15:34:06', 'absike', 'idriss', 108),
(21, '2020-05-03 16:25:25', 'ayman', 'kamoun', 58);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expiry` varchar(10) NOT NULL,
  `cvc` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prixttc` float NOT NULL,
  `Livraison` varchar(20) NOT NULL,
  `date_facture` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `nom`, `prenom`, `cardnumber`, `expiry`, `cvc`, `address`, `ville`, `zipcode`, `email`, `prixttc`, `Livraison`, `date_facture`) VALUES
(4, 'absike', 'idriss', '8ad563ed076d03d06d9d', '12/2020', '115', 'hah nayda 3', 'Rabat', 10210, 'absike30@gmail.com', 232, 'gratuit', '2020-04-29 14:52:37'),
(16, 'absike', 'idriss', '522c88530c38f56f72e6', '12/2019', '123', 'hah nayda 3', 'Rabat', 10210, 'absike30@gmail.com', 230, 'express', '2020-04-29 15:32:37'),
(19, 'absike', 'idriss', '1234123521351236', '12/2019', '124', 'hah nayda 3', 'Rabat', 10210, 'absike30@gmail.com', 230, 'express', '2020-04-29 16:37:07'),
(25, 'test', 'test', '1996 1996 1996 1996', '20/200/20', '215', 'test', 'Agadir', 10210, 'test@gmail.com', 14, 'express', '2020-05-02 00:06:58'),
(26, 'absike', 'idriss', '1234 1334 5698 4577', '12/2020', '123', 'el nahda 3', 'rabat', 10210, 'absike30@gmail.com', 108, 'express', '2020-05-03 15:34:06'),
(27, 'ayman', 'kamoun', '1234 5697 8589 6532', '12/2020', '115', 'temara', 'Rabat', 10250, 'ayman@gmail.com', 58, 'express', '2020-05-03 16:25:25');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `jours_livraison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `mode`, `price`, `jours_livraison`) VALUES
(1, 'La livraison express', 30, 1),
(2, 'La livraison gratuite', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_m` int(11) NOT NULL,
  `nomm` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` float NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_m`, `nomm`, `description`, `price`, `photo`) VALUES
(1, 'Petit déjeuner', 'Le meilleur petit déjeuner à Rabat ,jus d\'orange + 2 œuf avec tomate + du lait chocolat + 3 pièce pain de mie ', 39, '\\coffee\\coffee\\img\\pd.png'),
(2, 'Crêpe choco-Banane', 'La crêpe banane chocolat ... simple, délicieux, renversant ! les adjectifs ne manquent pas, alors si vous invitez du monde pour passer un moment conviviale, n’hésitez pas à augmenter les doses…une crêpe banane chocolat par personne risque de ne pas suffire', 32, '\\coffee\\coffee\\img\\pd2.png'),
(3, 'Crêpe framboise', 'Je vous parlais il y a peu de mon amour pour les fruits rouges, je reviens aujourd\'hui avec une recette de crêpes aux framboises ... vu la saison vous vous doutez que ce sont avec des framboises surgelées, mais ça reste tout de même un vrai régal ! D\'ailleurs je compte bien m\'en refaire bientôt ...', 20, '\\coffee\\coffee\\img\\pd3.png'),
(4, 'Crêpe fromage', 'Les crêpes au fromage c’est un plat simple, pas très long et qui plaît au plus grand nombre. Les crêpes sont roulées puis fourrées d’une béchamel onctueuse au fromage', 30, '\\coffee\\coffee\\img\\pd4.png'),
(5, 'croissant', 'Croissant (pâtisserie) : Le croissant est une viennoiserie à base d\'une pâte levée ou feuilletée, abaissée en triangle, roulée sur elle-même.', 2, '\\coffee\\coffee\\img\\pd6.png'),
(6, 'croissant chocolat', 'Le pain au chocolat, chocolatine Écouter ou couque au chocolat est une viennoiserie constituée d\'une pâte levée feuilletée, identique à celle du croissant, rectangulaire et enroulée sur une ou plusieurs barres de chocolat.', 2.5, '\\coffee\\coffee\\img\\pd5.png');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nom_produit` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `qte` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_client`, `nom_produit`, `price`, `qte`) VALUES
(34, 27, 'Petit déjeuner', 39, 1),
(37, 27, 'Crêpe fromage', 30, 1),
(41, 27, 'Mocha', 8, 1),
(44, 28, 'Cappuccino Batsam', 4, 3),
(45, 28, 'Crêpe choco-Banane', 32, 1),
(47, 28, 'croissant', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_p` int(11) NOT NULL,
  `nomp` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_p`, `nomp`, `description`, `price`, `photo`) VALUES
(1, 'Cappuccino Batsam', 'Découvrez le cappuccino crème instantané Batsam, c’est une délicieuse combinaison de café pré-dosé avec du lait, légèrement sucré.', 4, '\\coffee\\coffee\\img\\cap.png'),
(2, 'Chcolat Batsam', 'Le chocolat chaud instantané Batsam en cup augmentera votre vitalité et égaiera votre journée. De plus, il est bon pour la santé car il est riche en antioxydants.', 5, '\\coffee\\coffee\\img\\cap2.png'),
(3, 'Espresso', 'Nous avons sélectionné les meilleurs verres espresso afin de vous proposer un large choix de verres simple et double paroi, qui conservent le liquide chaud ou froid.', 5, '\\coffee\\coffee\\img\\cap3.png'),
(4, 'Macchiato', 'Ensemble Latte Macchiato Cono Blomus - Cet élégant ensemble Macchiato de Blomus est un atout dans la cuisine. Grâce à son design, le verre est agréabl', 7, '\\coffee\\coffee\\img\\cap4.png'),
(5, 'Mocha', 'Mettez deux pipettes de sirop de Chocolat Blanc au fond du verre. Ajoutez l\'espresso puis le Lait. Disposez votre crème fouettée puis le coulis de Chocolat.\r\n', 8, '\\coffee\\coffee\\img\\cap5.png'),
(6, 'Coffee Latte', 'Caffé Italia Roma - 2X Tasse Verre Double Paroi 250 ML - Tasse Cafe pour de Latte Macchiato, Boissons Chaudes et Froides - Lavable au Lave-Vaisselle.\r\n', 5, '\\coffee\\coffee\\img\\cap6.png'),
(7, 'Piccolo Latte', 'Une autre boisson au café qui est une boisson d\'évolution qui a gagné en popularité au cours des dix dernières années en Australie, est le Piccolo Latte.\r\n', 15, '\\coffee\\coffee\\img\\cap7.png'),
(8, 'Affogato', 'Une gourmandise très originale et du plus bel effet : un simple boule de crème glacée posée au fond d’un verre et arrosée d’un bon espresso, idéal pour une verrine.\r\n', 20, '\\coffee\\coffee\\img\\cap8.png'),
(9, 'Cortado', 'Le Cortado est une boisson au café expresso, coupée avec une petite quantité de lait cuit à la vapeur.\r\n', 13, '\\coffee\\coffee\\img\\cap9.png');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `tele` int(10) NOT NULL,
  `nbr_personne` int(11) NOT NULL,
  `date_res` varchar(200) NOT NULL,
  `heur_res` int(11) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `nom`, `prenom`, `tele`, `nbr_personne`, `date_res`, `heur_res`, `description`) VALUES
(8, 'absike', 'idriss', 653278903, 1, '2020/06/12', 15, '3creps + 3 caffee esspres'),
(9, 'absike', 'idriss', 653278903, 2, '2020/02/02', 15, 'reunion ');

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `id` int(11) NOT NULL,
  `tva` float NOT NULL DEFAULT 1.2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`id`, `tva`) VALUES
(1, 1.2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_m`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tva`
--
ALTER TABLE `tva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
