-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 juil. 2021 à 22:06
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vivouche`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `note` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `name`, `description`, `image`, `price`, `category`, `color`, `note`) VALUES
(1, 'Ordinateur tout-en-un ASUS V241EAK-WA094T ', 'Processeur : Intel Core i3 Résolution : 1920 x 1080 pixels Taille de l\'écran : 24\' soit environ 61 cm Type de résolution : Full HD', 'https://www.cdiscount.com/pdt2/4/3/t/1/700x700/v241eakwa043t/rw/pc-tout-en-un-asus-vivo-v241eak-wa043t-23-8-fhd.jpg', 1000, 'Ordinateur fixe', 'blanc ', 4),
(2, 'Surface Laptop 3', 'Fin et élégant, disponible avec un écran tactile de 13,5\" ou 15\", des options de couleurs riches et deux finitions durables. Affirmez-vous et bénéficiez d’une vitesse, de performances et d’une autonomie accrues tout au long de la journée.', 'https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYjc?ver=e1aa&q=90&m=6&h=270&w=270&b=%23FFFFFFFF&o=f&aim=true', 900, 'laptop', 'gris', 4),
(3, 'OnePlus 9', 'Appareil photo Hasselblad pour smartphone\r\nPerformances Fluides et Rapides\r\nCharge Ultra Rapide\r\nDesign Haut de Gamme', 'https://cdn.opstatics.com/store/20170907/assets/images/events/2021/03/9/common/camera-story-pc-0c4e39.jpg.webp', 834, 'android', 'violet', NULL),
(4, 'iPhone 12', 'La vitesse 5G. Une puce A14 Bionic, la plus rapide sur smartphone. Un écran OLED bord à bord. Le Ceramic Shield, qui multiplie par quatre la résistance aux chutes. Et le mode Nuit sur chaque appareil photo. L’iPhone 12 a tout, en deux tailles parfaites.', 'https://img.bfmtv.com/c/0/0/10dc0411/5edbae773828ebeef505b30b.jpg', 800, 'iOS', 'noir', NULL),
(5, 'Razer DeathAdder V2', 'Razer DeathAdder V2 - Souris de Jeu avec Ergonomie Optimale (Souris Gaming avec nouveau switches optique, Capteur optique 20.000 DPI, Câble Razer Speedflex ét RGB Chroma). Forme ergonomique optimale: Grâce à nos innombrables prototypes et phases de test, nos scientifiques et designers spécialisés en ergonomie ont créé la construction la plus confortable et légère, qui vous permet de jouer à votre meilleur niveau, et plus longtemps. Pieds de souris: 100% PTFE ', 'https://static.fnac-static.com/multimedia/Images/13/13/32/95/9777683-1505-1540-1/tsp20181022231645/Razer-DeathAdder-standard-Souris-gamer-6400dpi-Noir.jpg', 70, 'souris', 'vert', NULL),
(6, 'Clavier Logitech G213', 'Premier clavier de la nouvelle gamme Prodigy de Logitech, le G213 est principalement conçu pour le jeu vidéo. Il n\'emploie néanmoins pas les très à la mode interrupteurs mécaniques, mais des interrupteurs à dômes en caoutchouc, plus économiques et plus silencieux, mais aussi un peu moins réactifs. Voyons donc si ce nouveau venu saura satisfaire les joueurs.', 'https://dyw7ncnq1en5l.cloudfront.net/optim/test/13/13725/logitech_g213-prodigy_test_01__w800.webp', 45, 'clavier', 'noir', NULL),
(7, 'MacBook Pro 13 2020', 'Apple a enfin sorti ses premiers Mac équipés du processeur maison Apple M1 qui promet des gains impressionnants. Si l\'extérieur reste le même, l\'intérieur devrait changer la donne en termes de performances et d\'autonomie. Voici notre bilan après tests...', 'https://dyw7ncnq1en5l.cloudfront.net/optim/test/15/157641/74707d4f-macbook-pro-13-2020-apple-fait-sa-revolution-avec-son-processeur-m1__w800_wtmk.webp', 1300, 'mac', 'gris', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `idItem` int(11) NOT NULL COMMENT 'ID de l''item qu''a acheté l''utilisateur',
  `nom` varchar(255) NOT NULL COMMENT 'Nom de l''utilisateur',
  `prenom` varchar(255) NOT NULL COMMENT 'Prenom de l''utilisateur',
  `email` varchar(255) NOT NULL COMMENT 'Mail de l''utilisateur',
  `postale` varchar(255) NOT NULL COMMENT 'Adresse postale de l''utilisateur',
  `num` varchar(255) NOT NULL COMMENT 'Téléphone de l''utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `idItem`, `nom`, `prenom`, `email`, `postale`, `num`) VALUES
(6, 1, 'Tang', 'Victor', 'niterx@hotmail.fr', '10 Boulevard de la Villette', '0778798302'),
(14, 3, 'Doe', 'John', 'John.Doe@johndoe.fr', '123 rue du monde', '1234567890');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` enum('1','2','3','4','5') NOT NULL,
  `comment` text NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `name`, `note`, `comment`, `id_article`) VALUES
(1, 'Benoit Charroux', '5', 'Très bel ordinateur et très fonctionnel. Je recommande pour toute personne voulant découvrir un ordinateur d\'une grande qualité !', 1),
(2, 'Victor Tang', '2', 'Très mauvaise expérience, l\'écran possède une luminosité beaucoup trop faible. \r\nJe ne recommande pas cet ordinateur aux personnes qui utilisent leur ordinateur avec une luminosité ambiante élevée. Vous n\'y verrez rien à votre écran.', 1),
(3, 'Clara Saccoman', '3', 'Fonctionnel, mais je préfère mon ancien PC qui coutait moins cher...', 1),
(17, 'John Doe', '5', 'I have never seen such a good computer! ', 1),
(19, 'Victor Tang', '4', 'Très pratique et léger, parfait pour accompagner vos projets d\'école! :-)', 2);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `strength` text NOT NULL,
  `weakness` text NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `strength`, `weakness`, `id_article`) VALUES
(1, '+ Un joli design\r\n+ Le revêtement mat\r\n+ L\'écran à bord fin\r\n+ Le petit adaptateur secteur', '- La luminosité de l\'écran trop juste\r\n- La manque de capacité de stockage\r\n- Les performances 3D\r\n- Le prix un peu élevé', 1),
(2, '+ L\'affichage superbe et réactif en utilisation tactile.\r\n+ L\'intégration judicieuse des nouveaux\r\nCPU Ice Lake\r\n+ Des performances vidéoludiques en net progrès.\r\n+ La partie audio très soignée.\r\n+ Le design sobre et élégant.\r\n+ Plus de choix de matières et de coloris.\r\n+ Pas ou peu de nuisances sonores.\r\n', '- On attendait mieux des nouveaux CPU Ice Lake.\r\n- Les bords larges en 2019, c\'est compliqué.\r\n- Une autonomie toujours décevante.\r\n- Châssis démontable… mais pas par l\'utilisateur.\r\n- La connectique réduite au strict minimum… et aucun accessoire pour compenser.\r\n', 2),
(3, '+ Finitions premiums.\r\n+ Écran d\'excellente facture.\r\n+ Performances au top.\r\n+ Belle polyvalence en photo.\r\n+ 5G.\r\n+ Étanche (IP68).\r\n', '- Module principal un peu limité de nuit.\r\n- Autonomie beaucoup trop faible.\r\n', 3),
(4, '+ Écran Oled parfaitement calibré.\r\n+ Excellentes photos de jour.\r\n+ Autonomie correcte.\r\n+ Excellentes performances.\r\n+ Finitions exemplaires.\r\n+ Compatible 5G.\r\n+ Certifié IP68.\r\n', '- Pas de chargeur dans la boite.\r\n- Temps de charge plus long que chez la concurrence, même en 20 W.\r\n- Photos floues en périphérie de nuit.\r\n- Pas de mini-jack ni d\'adaptateur.\r\n', 4),
(5, '+ Technologie sans-fil Hyperspeed aussi rapide qu\'une liaison filaire.\r\n+ Capteur optique très performant.\r\n+ Légère pour une souris sans-fil de ce gabarit.\r\n+ Molette bien crantée.\r\n+ Larges boutons de tranche.\r\n+ Interrupteurs optiques.\r\n+ Larges grips en élastomère sur les tranches.\r\n+ Bluetooth également disponible pour un usage bureautique.\r\n+ Logement pour ranger le dongle USB sous la souris.\r\n', '- Base de charge non fournie (option).\r\n- Impossible d\'utiliser un câble micro-USB standard.\r\n', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
