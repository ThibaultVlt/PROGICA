-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2025 at 09:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progica`
--

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `name`, `code`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Ain', '01', 1, NULL, NULL),
(2, 'Aisne', '02', 6, NULL, NULL),
(3, 'Allier', '03', 1, NULL, NULL),
(4, 'Alpes-de-Haute-Provence', '04', 12, NULL, NULL),
(5, 'Hautes-Alpes', '05', 12, NULL, NULL),
(6, 'Alpes-Maritimes', '06', 12, NULL, NULL),
(7, 'Ardèche', '07', 1, NULL, NULL),
(8, 'Ardennes', '08', 5, NULL, NULL),
(9, 'Ariège', '09', 10, NULL, NULL),
(10, 'Aube', '10', 5, NULL, NULL),
(11, 'Aude', '11', 10, NULL, NULL),
(12, 'Aveyron', '12', 10, NULL, NULL),
(13, 'Bouches-du-Rhône', '13', 12, NULL, NULL),
(14, 'Calvados', '14', 8, NULL, NULL),
(15, 'Cantal', '15', 1, NULL, NULL),
(16, 'Charente', '16', 9, NULL, NULL),
(17, 'Charente-Maritime', '17', 9, NULL, NULL),
(18, 'Cher', '18', 4, NULL, NULL),
(19, 'Corrèze', '19', 9, NULL, NULL),
(20, 'Corse-du-Sud', '2B', 13, NULL, NULL),
(21, 'Haute-Corse', '2A', 13, NULL, NULL),
(22, 'Côte-d\'Or', '21', 2, NULL, NULL),
(23, 'Côtes d\'Armor', '22', 3, NULL, NULL),
(24, 'Creuse', '23', 9, NULL, NULL),
(25, 'Dordogne', '24', 9, NULL, NULL),
(26, 'Doubs', '25', 2, NULL, NULL),
(27, 'Drôme', '26', 1, NULL, NULL),
(28, 'Eure', '27', 8, NULL, NULL),
(29, 'Eure-et-Loir', '28', 4, NULL, NULL),
(30, 'Finistère', '29', 3, NULL, NULL),
(31, 'Gard', '30', 10, NULL, NULL),
(32, 'Haute-Garonne', '31', 10, NULL, NULL),
(33, 'Gers', '32', 10, NULL, NULL),
(34, 'Gironde', '33', 9, NULL, NULL),
(35, 'Hérault', '34', 10, NULL, NULL),
(36, 'Ille-et-Vilaine', '35', 3, NULL, NULL),
(37, 'Indre', '36', 4, NULL, NULL),
(38, 'Indre-et-Loire', '37', 4, NULL, NULL),
(39, 'Isère', '38', 1, NULL, NULL),
(40, 'Jura', '39', 2, NULL, NULL),
(41, 'Landes', '40', 9, NULL, NULL),
(42, 'Loir-et-Cher', '41', 4, NULL, NULL),
(43, 'Loire', '42', 1, NULL, NULL),
(44, 'Haute-Loire', '43', 1, NULL, NULL),
(45, 'Loire-Atlantique', '44', 11, NULL, NULL),
(46, 'Loiret', '45', 4, NULL, NULL),
(47, 'Lot', '46', 10, NULL, NULL),
(48, 'Lot-et-Garonne', '47', 9, NULL, NULL),
(49, 'Lozère', '48', 10, NULL, NULL),
(50, 'Maine-et-Loire', '49', 11, NULL, NULL),
(51, 'Manche', '50', 8, NULL, NULL),
(52, 'Marne', '51', 5, NULL, NULL),
(53, 'Haute-Marne', '52', 5, NULL, NULL),
(54, 'Mayenne', '53', 11, NULL, NULL),
(55, 'Meurthe-et-Moselle', '54', 5, NULL, NULL),
(56, 'Meuse', '55', 5, NULL, NULL),
(57, 'Morbihan', '56', 3, NULL, NULL),
(58, 'Moselle', '57', 5, NULL, NULL),
(59, 'Nièvre', '58', 2, NULL, NULL),
(60, 'Nord', '59', 6, NULL, NULL),
(61, 'Oise', '60', 6, NULL, NULL),
(62, 'Pas-de-Calais', '62', 6, NULL, NULL),
(63, 'Puy-de-Dôme', '63', 1, NULL, NULL),
(64, 'Pyrénées-Atlantiques', '64', 9, NULL, NULL),
(65, 'Hautes-Pyrénées', '65', 10, NULL, NULL),
(66, 'Pyrénées-Orientales', '66', 10, NULL, NULL),
(67, 'Bas-Rhin', '67', 5, NULL, NULL),
(68, 'Haut-Rhin', '68', 5, NULL, NULL),
(69, 'Rhône', '69', 1, NULL, NULL),
(70, 'Haute-Saône', '70', 2, NULL, NULL),
(71, 'Saône-et-Loire', '71', 2, NULL, NULL),
(72, 'Sarthe', '72', 11, NULL, NULL),
(73, 'Savoie', '73', 1, NULL, NULL),
(74, 'Haute-Savoie', '74', 1, NULL, NULL),
(75, 'Paris', '75', 7, NULL, NULL),
(76, 'Seine-Maritime', '76', 8, NULL, NULL),
(77, 'Seine-et-Marne', '77', 7, NULL, NULL),
(78, 'Yvelines', '78', 7, NULL, NULL),
(79, 'Deux-Sèvres', '79', 9, NULL, NULL),
(80, 'Somme', '80', 6, NULL, NULL),
(81, 'Tarn', '81', 10, NULL, NULL),
(82, 'Tarn-et-Garonne', '82', 10, NULL, NULL),
(83, 'Var', '83', 12, NULL, NULL),
(84, 'Vaucluse', '84', 12, NULL, NULL),
(85, 'Vendée', '85', 11, NULL, NULL),
(86, 'Vienne', '86', 9, NULL, NULL),
(87, 'Haute-Vienne', '87', 9, NULL, NULL),
(88, 'Vosges', '88', 5, NULL, NULL),
(89, 'Yonne', '89', 2, NULL, NULL),
(90, 'Territoire de Belfort', '90', 2, NULL, NULL),
(91, 'Essonne', '91', 7, NULL, NULL),
(92, 'Hauts-de-Seine', '92', 7, NULL, NULL),
(93, 'Seine-St-Denis', '93', 7, NULL, NULL),
(94, 'Val-de-Marne', '94', 7, NULL, NULL),
(95, 'Val-D\'Oise', '95', 7, NULL, NULL),
(96, 'Orne', '61', 8, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_region_id_foreign` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
