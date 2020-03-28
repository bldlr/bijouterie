-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 28 mars 2020 à 19:57
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bijouterie2`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `categories_id`, `nom`, `description`, `genre`, `matiere`, `prix`, `image`, `updated_at`) VALUES
(2, 1, 'Chevalière Gravity Symfox', 'Chevalière en or avec la lettre G gravée sous un fond noir', 'homme', 'or', 999.99, '5e0758cd81503087890563.jpg', '2019-12-28 14:29:49'),
(3, 2, 'Boucles d\'oreilles Luxony topaze', 'Boucles d\'oreilles Luxony en argent avec des topazes', 'femme', 'topaze', 499.99, '5e07596776c8e070655054.jpg', '2019-12-28 14:32:23'),
(4, 4, 'Collier Symfox larmes d\'amour', 'Collier Symfox en argent et en forme de larme', 'femme', 'argent', 179.99, '5e075a2fdc939529853477.jpg', '2019-12-28 14:35:43'),
(5, 5, 'Montre Symfox dorée cuir', 'Montre Symfox en or avec bracelet en cuir', 'homme', 'or', 129.99, '5e0760d32f1d8510372750.png', '2019-12-28 15:04:03'),
(6, 3, 'Bracelet Symfox matelot breton', 'Bracelet Symfox en acier style matelot breton', 'homme', 'acier', 99.99, '5e0761ed19778858453649.jpg', '2019-12-28 15:08:44'),
(7, 4, 'Collier Symfox simple', 'Collier Symfox en argent simple motif', 'femme', 'argent', 269.99, '5e0762a2792af972918575.jpg', '2019-12-28 15:11:46'),
(8, 1, 'Bague Symfox double coeur', 'Bague Symfox en argent avec comme motif deux coeurs', 'femme', 'argent', 119.99, '5e0764ac47cf3184240852.jpg', '2019-12-28 15:20:28'),
(9, 3, 'Bracelet Symfox fissure', 'Bracelet Symfox en argent fissurés en trois parties', 'femme', 'argent', 279.99, '5e07656586d5e285673580.jpg', '2019-12-28 15:23:33'),
(10, 5, 'Montre Luxony argenté', 'Montre Luxony cadran argent et bracelet argent', 'homme', 'argent', 299.99, '5e0765a47f2c8658352276.png', '2019-12-28 15:24:36'),
(11, 1, 'Bague Luxony emeraude', 'Bague Luxony en or avec des emeraudes', 'femme', 'émeraude', 769.99, '5e0766224cee8402117317.jpg', '2019-12-28 15:26:42'),
(12, 3, 'Bracelet Symfox gold', 'Bracelet Symfox en or magnifique', 'femme', 'or', 299.99, '5e0767182543c921297693.jpg', '2019-12-28 15:30:48'),
(13, 4, 'Collier Symfox saphir etoile', 'Collier Symfox en argent avec un saphir vert en forme d\'étoile', 'femme', 'saphir', 599.99, '5e0767795c75e843252219.jpg', '2019-12-28 15:32:25'),
(14, 1, 'Solitaire Symfox', 'Solitaire Symfox en argent avec un diamant', 'femme', 'diamant', 259.99, '5e0768280ccd6803114742.jpg', '2019-12-28 15:35:19'),
(15, 3, 'Bracelet Symfox cercle', 'Bracelet Symfox en acier avec des formes rondes', 'femme', 'argent', 219.99, '5e076881253c5888081797.jpg', '2019-12-28 15:36:49'),
(16, 4, 'Collier Luxony perle', 'Collier Luxony composé d\'une grande perle', 'femme', 'perle', 399.99, '5e0768f9b6310298592431.jpg', '2019-12-28 15:38:49'),
(17, 3, 'Bracelet Symfox noir', 'Bracelet Symfox en acier avec de l\'acier teint en noir', 'homme', 'acier', 89.99, '5e07699354a00955316447.jpg', '2019-12-28 15:41:23'),
(18, 5, 'Montre Symfox argenté', 'Montre Symfox en argent avec bracelet argenté', 'homme', 'argent', 429.99, '5e076a1803499685105558.png', '2019-12-28 15:43:35'),
(19, 1, 'Bague Luxony jumelle saphir', 'Bague Luxony en or avec deux saphirs', 'femme', 'saphir', 739.99, '5e076a5ac6119124205650.jpg', '2019-12-28 15:44:42'),
(20, 1, 'Bague Luxony sublime', 'Bague Luxony en or', 'femme', 'or', 999.99, '5e0776bc4158f913243687.jpg', '2019-12-28 16:37:32'),
(21, 4, 'Collier Luxony rubis larme', 'Collier Luxony en argent avec une larme en rubis vert', 'femme', 'rubis', 259.99, '5e077aa353628928799875.jpg', '2019-12-28 16:54:11'),
(22, 2, 'Boucles d\'oreilles Luxony rubis bleu océan', 'Boucles d\'oreilles Luxony en argent avec un rubis couleur bleu océan', 'femme', 'rubis', 899.99, '5e077b44ea118569774083.jpg', '2019-12-28 16:56:52'),
(23, 3, 'Bracelet Symfox infini', 'Bracelet Symfox en argent en forme infini', 'femme', 'argent', 299.99, '5e077b9f0862a863807072.jpg', '2019-12-28 16:58:22'),
(24, 4, 'Collier Symfox triple cercle', 'Collier Symfox en or composé de trois cercles', 'femme', 'or', 289.99, '5e077bf67a50a967535579.jpg', '2019-12-28 16:59:50'),
(25, 1, 'Bague Luxony rosa', 'Bague Luxony en or avec des quartz roses', 'femme', 'quartz', 479.99, '5e077c3c8a2cc781769924.jpg', '2019-12-28 17:01:00'),
(26, 3, 'Bracelet Symfox petits motifs', 'Bracelet Symfox en acier avec des petits objets intégrés', 'femme', 'acier', 99.99, '5e077cbece803487156431.jpg', '2019-12-28 17:03:10'),
(27, 2, 'Boucles d\'oreilles Symfox rubis rouge', 'Boucles d\'oreilles Symfox en argent avec un rubis rouge', 'femme', 'rubis', 859.99, '5e077d1058b4f343917443.jpg', '2019-12-28 17:04:32'),
(28, 1, 'Bague Luxony saphir', 'Bague Luxony en or avec un saphir bleu', 'femme', 'saphir', 589.99, '5e077d6e8b5f2712010347.jpg', '2019-12-28 17:06:06'),
(29, 4, 'Collier Symfox diamant', 'Collier Symfox en argent avec un grand diamant', 'femme', 'diamant', 229.99, '5e077dc373baa435042185.jpg', '2019-12-28 17:07:31'),
(30, 3, 'Bracelet Luxony sublima', 'Bracelet Luxony en or avec des magnifiques petits diamants', 'femme', 'diamant', 359.99, '5e077e065f24b609503746.jpg', '2019-12-28 17:08:38'),
(31, 1, 'Bague Symfox infini', 'Bague Symfox en or avec de nombreux quartz transparents en forme d\'infini', 'femme', 'quartz', 329.99, '5e077e66391a2085723037.jpg', '2019-12-28 17:10:14'),
(32, 2, 'Boucles d\'oreilles Symfox topaze diamant', 'Boucles d\'oreilles Symfox en topaze avec des diamants intégrés', 'femme', 'topaze', 799.99, '5e077ef089c5b894694485.jpg', '2019-12-28 17:12:32'),
(33, 5, 'Montre Symfox cuir', 'Montre Symfox avec un bracelet en cuir marron', 'homme', 'argent', 499.99, '5e077f474884d761241392.png', '2019-12-28 17:13:59'),
(34, 1, 'Bague Symfox 4 pierres', 'Bague Symfox en argent avec 4 quartz transparents encastrés', 'femme', 'quartz', 139.99, '5e077fbbb3bd1620260944.jpg', '2019-12-28 17:15:55'),
(35, 3, 'Bracelet Luxony silver', 'Bracelet Luxony en argent fin et magnifique', 'femme', 'argent', 499.99, '5e077ffd296c7269909251.jpg', '2019-12-28 17:17:01'),
(36, 4, 'Collier Symfox double cercle', 'Collier Symfox en argent avec un double cercle', 'femme', 'argent', 149.99, '5e07805e36e90473741661.jpg', '2019-12-28 17:18:38'),
(37, 2, 'Boucles d\'oreilles Symfox saphir océan', 'Boucles d\'oreilles Symfox en argent avec un saphir bleu océan', 'homme', 'saphir', 959.99, '5e0780b778d7e972674134.jpg', '2019-12-28 17:20:07'),
(38, 3, 'Bracelet Symfox coeur', 'Bracelet Symfox en acier avec des coeurs', 'femme', 'acier', 89.99, '5e0780ff72fac320712721.jpg', '2019-12-28 17:21:19'),
(39, 3, 'Bracelet Luxony sublimo', 'Bracelet Luxony en argent avec des magnifiques petits diamants', 'homme', 'diamant', 249.99, '5e07814a07a05779881693.jpg', '2019-12-28 17:22:33'),
(40, 4, 'Collier Luxony diamond heart', 'Collier Luxony en argent en forme de coeur avec un diamant', 'femme', 'diamant', 629.99, '5e0781bf99a75666720270.jpg', '2019-12-28 17:24:31'),
(41, 1, 'Bague Luxony double anneau', 'Bague Luxony en argent avec comme motif un double annea', 'femme', 'argent', 199.99, '5e0781f4dc296873605419.jpg', '2019-12-28 17:25:24'),
(42, 2, 'Boucles d\'oreilles Symfox saphir bleu', 'Boucles d\'oreilles Symfox en argent un grand saphir bleu', 'femme', 'saphir', 629.99, '5e0782353e96f392999328.jpg', '2019-12-28 17:26:29'),
(43, 3, 'Bracelet Luxony black and gold', 'Bracelet Luxony en or et tissé d\'un cuir noir', 'homme', 'or', 149.99, '5e0782681f43a550329862.jpg', '2019-12-28 17:27:20'),
(44, 4, 'Collier Symfox angel', 'Collier Symfox en or en forme d\'ange', 'femme', 'or', 329.99, '5e0782a0c9c0e029624980.jpg', '2019-12-28 17:28:16'),
(45, 1, 'Solitaire Luxony luxe', 'Solitaire Luxony en argent deux rangées avec un diamant', 'femme', 'diamant', 259.99, '5e0782dfce5b1101417333.jpg', '2019-12-28 17:29:19'),
(46, 4, 'Collier Symfox gold', 'Collier Symfox large en or', 'femme', 'or', 499.99, '5e07831f23ce0515682275.jpg', '2019-12-28 17:30:23'),
(47, 2, 'Boucles d\'oreilles Luxony saphir jaune', 'Boucles d\'oreilles Luxony en argent un grand saphir orange', 'femme', 'saphir', 229.99, '5e078373552ff379494575.jpg', '2019-12-28 17:31:47'),
(48, 1, 'Bague Symfox anneau', 'Bague Symfox en acier avec un motif rouge à point', 'homme', 'acier', 79.99, '5e0783aabc49b002617124.jpg', '2019-12-28 17:32:42'),
(49, 2, 'Boucles d\'oreilles Luxony perle', 'Boucles d\'oreilles Luxony en perle pendantes', 'femme', 'perle', 199.99, '5e0783dfa653b161754736.jpg', '2019-12-28 17:33:35'),
(50, 4, 'Collier Luxony diamond larme', 'Collier Luxony en argent avec un grand diamant en forme de larme', 'femme', 'diamant', 599.99, '5e07842209633929601551.jpg', '2019-12-28 17:34:41'),
(51, 4, 'Collier Symfox diamond', 'Collier Symfox en argent avec un grand diamant', 'femme', 'diamant', 699.99, '5e0784a59d577373803143.jpg', '2019-12-28 17:36:53'),
(52, 5, 'Montre argenté bleu océan', 'Montre avec cadran bleu océan et bracelet argenté', 'homme', 'argent', 499.99, '5e0784e79b1ee099825930.png', '2019-12-28 17:37:59'),
(53, 1, 'Bague Symfox infin', 'Bague Symfox en argent avec des anneaux enroulés', 'femme', 'argent', 539.99, '5e078523cdcf1622855665.jpg', '2019-12-28 17:38:59'),
(54, 3, 'Bracelet Luxony petits coeurs', 'Bracelet Luxony en acier avec des petits coeurs', 'femme', 'acier', 79.99, '5e07855e94975794337554.jpg', '2019-12-28 17:39:58'),
(55, 4, 'Collier Luxony perla', 'Collier Luxony en argent avec une belle perle', 'femme', 'perle', 229, '5e07858e3d8d0316771668.jpg', '2019-12-28 17:40:46'),
(56, 1, 'Bague Symfox diamant', 'Bague Symfox en argent avec un diamant intégré', 'femme', 'diamant', 819.99, '5e07967ebe3ce638098355.jpg', '2019-12-28 18:53:02'),
(57, 3, 'Bracelet Luxony gol', 'Bracelet Luxony en or sublime', 'femme', 'or', 359.99, '5e0796c41137e365764679.jpg', '2019-12-28 18:54:11'),
(58, 4, 'Collier Symfox heart', 'Collier Symfox en argent en forme d\'un magnifique coeur', 'femme', 'argent', 139.99, '5e0796fa58a9d964156191.jpg', '2019-12-28 18:55:06'),
(59, 2, 'Boucles d\'oreilles Symfox rondes', 'Boucles d\'oreilles Symfox en acier en forme de boule', 'femme', 'acier', 159.99, '5e07973ad37c2796996318.jpg', '2019-12-28 18:56:10'),
(60, 3, 'Bracelet Symfox fantaisie', 'Bracelet Symfox en acier en forme fantaisie', 'femme', 'acier', 89.99, '5e079778044a4712455763.jpg', '2019-12-28 18:57:11'),
(61, 4, 'Collier Luxony eye', 'Collier Luxony en or avec un oeil en topaz', 'femme', 'topaze', 525.99, '5e0797b306448416446863.jpg', '2019-12-28 18:58:10'),
(62, 1, 'Bague Symfox double cercl', 'Bague Symfox en argent et avec comme motif un double cercle', 'femme', 'argent', 189.99, '5e0797ee54bbf347978036.jpg', '2019-12-28 18:59:10'),
(63, 2, 'Boucles d\'oreilles Symfox flower', 'Boucles d\'oreilles Symfox en diamant en forme de fleur', 'femme', 'diamant', 999.99, '5e07982310309472580368.jpg', '2019-12-28 19:00:02'),
(64, 4, 'Collier Symfox double coeurs', 'Collier Symfox en argent un coeur dans un autre', 'femme', 'argent', 149.99, '5e07985e11953005725790.jpg', '2019-12-28 19:01:01'),
(65, 1, 'Bague Luxony flower emeraude', 'Bague Luxony en argent en motif de fleur avec un emeraude', 'femme', 'emeraude', 859.99, '5e0798a5e331e580292537.jpg', '2019-12-28 19:02:13'),
(66, 3, 'Bracelet Luxony larme', 'Bracelet Luxony en argent en forme de larmes', 'femme', 'argent', 239.99, '5e0798e0ce176977717907.jpg', '2019-12-28 19:03:12'),
(67, 3, 'Bracelet Luxony rose', 'Bracelet Luxony en argent en forme de rose', 'femme', 'argent', 199.99, '5e07993788ba0614246321.jpg', '2019-12-28 19:04:39'),
(68, 1, 'Bague Symfox 1000 pierres', 'Bague Symfox en argent avec de nombreux quartz transparents', 'femme', 'quartz', 259.99, '5e079966c9948209432830.jpg', '2019-12-28 19:05:26'),
(69, 4, 'Collier Symfox silver heart', 'Collier Symfox en acier en forme d\'un coeur', 'femme', 'acier', 69.99, '5e07999f5bf46772278107.jpg', '2019-12-28 19:06:23'),
(70, 3, 'Bracelet Luxony papillo', 'Bracelet Luxony en acier avec des papillons', 'femme', 'acier', 79.99, '5e0799d35d285792543873.jpg', '2019-12-28 19:07:15'),
(71, 2, 'Boucles d\'oreilles Luxony emeraude', 'Boucles d\'oreilles Luxony en argent avec des emeraudes', 'femme', 'emeraude', 229.99, '5e079a0a4503d312999886.jpg', '2019-12-28 19:08:10'),
(72, 1, 'Bague Symfox fantaisie', 'Bague Symfox en argent avec des quartz intégrées', 'femme', 'quartz', 259.99, '5e079b2368dca193771493.jpg', '2019-12-28 19:12:51'),
(73, 4, 'Collier Luxony circle heart', 'Collier Luxony en acier avec un coeur dans un cercle', 'femme', 'acier', 39.99, '5e079b73ac4e9878981268.jpg', '2019-12-28 19:14:11'),
(74, 3, 'Bracelet Luxony tissé', 'Bracelet Luxony en acier en forme tissé', 'homme', 'acier', 139.99, '5e079bac9ae3c626738942.jpg', '2019-12-28 19:15:08'),
(75, 2, 'Boucles d\'oreilles Luxony saphir rouge', 'Boucles d\'oreilles Luxony en argent un grand saphir rouge', 'femme', 'saphir', 699.99, '5e079bfd54f39659796395.jpg', '2019-12-28 19:16:29'),
(76, 3, 'Bracelet Luxony etoile', 'Bracelet Luxony en acier avec de magnifiques petites étoiles', 'femme', 'acier', 79.99, '5e079c4d6d7a8083646494.jpg', '2019-12-28 19:17:49'),
(77, 1, 'Bague Luxony scarabée', 'Bague Luxony en or avec un emeraude en forme de scarabé', 'femme', 'emeraude', 699.99, '5e079c94ea6ac237898554.jpg', '2019-12-28 19:19:00'),
(78, 5, 'Montre Cuir marron', 'Montre en or en cuir marron', 'homme', 'or', 299.99, '5e079cdabbf9d604603810.png', '2019-12-28 19:20:10'),
(79, 4, 'Collier Luxony coeur', 'Collier Luxony en acier en forme de coeur', 'femme', 'acier', 35.99, '5e079d671b530232615525.jpg', '2019-12-28 19:22:31'),
(80, 4, 'Collier Symfox medaillon', 'Collier Symfox en or en forme de medaillon', 'femme', 'or', 369.99, '5e079f844a592425043642.jpg', '2019-12-28 19:31:32'),
(81, 3, 'Bracelet Symfox square', 'Bracelet Symfox en argent avec comme motif des carrés', 'femme', 'argent', 599.99, '5e079fc576b3a069371338.jpg', '2019-12-28 19:32:37'),
(82, 1, 'Solitaire Luxony multi rangée', 'Solitaire Luxony en or multi rangée avec un diamant', 'femme', 'diamant', 679.99, '5e079fff07306430886306.jpg', '2019-12-28 19:33:34'),
(83, 3, 'Bracelet Luxony circle', 'Bracelet Luxony en acier avec des formes ronde', 'femme', 'argent', 259.99, '5e07a036059f0613396380.jpg', '2019-12-28 19:34:29'),
(84, 4, 'Collier Luxony double alliance', 'Collier Luxony en or avec deux alliance', 'femme', 'or', 329.99, '5e07a07e2df7a153075650.jpg', '2019-12-28 19:35:42'),
(85, 1, 'Bague Luxony queen', 'Bague Luxony en argent avec des pierres topaze bleu clair', 'femme', 'topaze', 329.99, '5e07a0b1eab06832221190.jpg', '2019-12-28 19:36:33'),
(86, 2, 'Boucles d\'oreilles Symfox saphir viole', 'Boucles d\'oreilles Symfox en argent un grand saphir viole', 'femme', 'saphir', 599.99, '5e07a0f36d623566414713.jpg', '2019-12-28 19:37:39'),
(87, 3, 'Bracelet Luxony galet', 'Bracelet Luxony en acier avec des galets', 'femme', 'acier', 199.99, '5e07a18c0afa8884070395.jpg', '2019-12-28 19:40:11'),
(88, 4, 'Collier Luxony goldmen XL', 'Collier Luxony large en or', 'homme', 'or', 179.99, '5e07a1d7a30dc455478399.jpg', '2019-12-28 19:41:27'),
(89, 1, 'olitaire Luxony double rangée', 'Solitaire Luxony en argent double rangée avec un diamant', 'femme', 'diamant', 459.99, '5e07a20b4063f925115930.jpg', '2019-12-28 19:42:19'),
(90, 2, 'Boucles d\'oreilles Symfox rubis bleu', 'Boucles d\'oreilles Symfox en argent des un grand rubis bleu', 'femme', 'rubis', 799.99, '5e07a2516bac6143816852.jpg', '2019-12-28 19:43:29'),
(91, 3, 'Bracelet Luxony clefs', 'Bracelet Luxony en acier avec des clefs', 'femme', 'acier', 79.99, '5e07a29eed8ed849294883.jpg', '2019-12-28 19:44:46'),
(92, 1, 'Collier Symfox rubis vert', 'Collier Symfox en argent avec un grand rubis vert', 'femme', 'argent', 499.99, '5e07a2f050440015070558.jpg', '2019-12-28 19:46:08'),
(93, 3, 'Bracelet Symfox gold silver', 'Bracelet Symfox en or et épais', 'homme', 'or', 199.99, '5e07a3865274d084037988.jpg', '2019-12-28 19:48:38'),
(94, 1, 'Bague Symfox triple alliance larg', 'Bague Symfox qui regroupe 3 anneaux épais', 'femme', 'or', 799.99, '5e07a3c1563c2270563329.jpg', '2019-12-28 19:49:37'),
(95, 4, 'Collier Luxony arbre', 'Collier Luxony en argent en forme d\'arbre de vie', 'femme', 'argent', 149.99, '5e0868ca81f0e387647742.jpg', '2019-12-29 09:50:18'),
(96, 1, 'Bague Symfox eye', 'Bague Symfox en or avec un grand diamant', 'femme', 'diamant', 429.99, '5e086918780da432584928.jpg', '2019-12-29 09:51:36'),
(97, 3, 'Bracelet Luxony dorée', 'Bracelet Luxony en or avec des pierres intégrées', 'femme', 'or', 169.99, '5e086998b8630362430379.jpg', '2019-12-29 09:53:44'),
(98, 4, 'Collier Luxony goldmen XS', 'Collier Luxony fin en or', 'homme', 'or', 199.99, '5e086a2e58268176826396.jpg', '2019-12-29 09:56:14'),
(99, 3, 'Bracelet Symfox flower', 'Bracelet Symfox en argent en forme de fleurs', 'femme', 'argent', 249.99, '5e086a72c10d6925808366.jpg', '2019-12-29 09:57:22'),
(100, 2, 'Boucles d\'oreilles Luxony lady', 'Boucles d\'oreilles Luxony en argent pendantes', 'femme', 'argent', 329.99, '5e086aaf19643396661003.jpg', '2019-12-29 09:58:23'),
(101, 1, 'Bague Symfox triple alliance', 'Bague Symfox qui regroupe 3 anneaux fins', 'femme', 'or', 759.99, '5e086adf0fc91648977486.jpg', '2019-12-29 09:59:10'),
(102, 5, 'Montre Symfox blanc', 'Montre Symfox avec bracelet blanc', 'homme', 'acier', 199.99, '5e086b1edea55104325215.png', '2019-12-29 10:00:14'),
(103, 1, 'Solitaire Symfox trile diamant', 'Solitaire Symfox en argent avec 3 diamants intégrés', 'femme', 'diamant', 319.99, '5e086b68eced5339152522.jpg', '2019-12-29 10:01:28'),
(104, 4, 'Collier Luxony papillon', 'Collier Luxony en argent un papillon dans un cercle', 'femme', 'argent', 159.99, '5e086ba89eecc469357651.jpg', '2019-12-29 10:02:32'),
(105, 4, 'Collier Symfox coeurs', 'Collier Symfox en argent avec un coeur dans un autre', 'femme', 'argent', 179.99, '5e086bd5a19da295890602.jpg', '2019-12-29 10:03:17'),
(106, 4, 'Collier Symfox etoile', 'Collier Symfox en or en forme d\'étoile de mer', 'femme', 'or', 169.99, '5e086ca8875aa100924114.jpg', '2019-12-29 10:06:48'),
(107, 3, 'Bracelet Luxony slim', 'Bracelet Luxony en or, très fin', 'femme', 'or', 399.99, '5e086cef25ed0745479070.jpg', '2019-12-29 10:07:59'),
(108, 5, 'Montre Luxony cuir', 'Montre Luxony avec bracelet en cuir marron', 'homme', 'argent', 199.99, '5e086d2b67e2d692474182.png', '2019-12-29 10:08:59'),
(109, 1, 'Solitaire Luxony spirale', 'Solitaire Luxony en or avec un magnifique diamant', 'femme', 'diamant', 719.99, '5e086d6b0e969091065288.jpg', '2019-12-29 10:10:02'),
(110, 2, 'Boucles d\'oreilles Luxony saphir noir', 'Boucles d\'oreilles Luxony en argent un grand saphir noir', 'femme', 'saphir', 99.99, '5e086da5745fd684205230.jpg', '2019-12-29 10:11:01'),
(111, 4, 'Collier Luxony star', 'Collier Luxony en argent en forme d\'étoile', 'femme', 'argent', 169.99, '5e086ddfeb6d4174616363.jpg', '2019-12-29 10:11:59'),
(112, 1, 'Bague Symfox double diamants', 'Bague Symfox en argent avec deux rangées de diamants', 'femme', 'diamant', 599.99, '5e086e3221643680091509.jpg', '2019-12-29 10:13:22'),
(113, 5, 'Montre Symfoxy cuir', 'Montre Symfoxy avec bracelet en cuir marron', 'homme', 'argent', 349.99, '5e086e8340c9a070106953.png', '2019-12-29 10:14:43'),
(114, 4, 'Collier Luxony infini', 'Collier Luxony en acier en forme infini', 'femme', 'acier', 129.99, '5e086ecc162ee306204981.jpg', '2019-12-29 10:15:55'),
(115, 3, 'Bracelet Symfox acier', 'Bracelet Symfox en acier en forme de chaînes', 'homme', 'acier', 139.99, '5e086f10d705d754534841.jpg', '2019-12-29 10:17:04'),
(116, 1, 'Bague Symfox passion', 'Bague Symfox en argent avec un grand saphir rouge', 'femme', 'saphir', 349.99, '5e086f42d862e058774087.jpg', '2019-12-29 10:17:54'),
(117, 4, 'Collier Luxony saphir vert', 'Collier Luxony en argent avec plusieurs saphirs verts', 'femme', 'saphir', 399.99, '5e086f7a2ce72425031837.jpg', '2019-12-29 10:18:50'),
(118, 1, 'Bague Luxony multi rangées', 'Bague Luxony en argent avec 4 anneaux', 'femme', 'argent', 499.99, '5e086fb219de4759841787.jpg', '2019-12-29 10:19:46'),
(119, 2, 'Boucles d\'oreilles Symfox pendantes rondes', 'Boucles d\'oreilles Symfox en acier pendantes rondes', 'femme', 'acier', 229.99, '5e087006b3a5c954993898.jpg', '2019-12-29 10:21:10'),
(120, 4, 'Collier Luxony multi circle', 'Collier Luxony en argent en forme de multi cercles', 'femme', 'argent', 249.99, '5e08703cde48d767253660.jpg', '2019-12-29 10:22:04'),
(121, 5, 'Montre Luxony marron', 'Montre Luxony avec un bracelet marron', 'homme', 'acier', 129.99, '5e08706d1e83e344242586.png', '2019-12-29 10:22:53'),
(122, 1, 'Bague Symfox flower', 'Bague Symfox en argent en motif de fleur', 'femme', 'argent', 799.99, '5e0870985c86b431772333.jpg', '2019-12-29 10:23:36'),
(124, 4, 'Collier Luxony maille', 'Collier en or pour homme', 'homme', 'or', 199.99, '5e494aff97e18789118107.jpg', '2020-02-16 15:00:31'),
(126, 3, 'Chevalière G', 'Chevalière en or avec la lettre G', 'femme', 'diamant', 199.99, 'imageDefault.png', '2020-02-16 16:42:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29A5EC27A21214B7` (`categories_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC27A21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
