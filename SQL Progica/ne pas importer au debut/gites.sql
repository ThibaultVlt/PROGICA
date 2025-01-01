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
-- Table structure for table `gites`
--

CREATE TABLE `gites` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` int NOT NULL,
  `bedrooms` int NOT NULL,
  `bed` int NOT NULL,
  `pets` tinyint(1) NOT NULL DEFAULT '0',
  `dishwasher` tinyint(1) NOT NULL DEFAULT '0',
  `washing_machine` tinyint(1) NOT NULL DEFAULT '0',
  `air_conditioning` tinyint(1) NOT NULL DEFAULT '0',
  `tv` tinyint(1) NOT NULL DEFAULT '0',
  `terrace` tinyint(1) NOT NULL DEFAULT '0',
  `barbecue` tinyint(1) NOT NULL DEFAULT '0',
  `private_pool` tinyint(1) NOT NULL DEFAULT '0',
  `shared_pool` tinyint(1) NOT NULL DEFAULT '0',
  `tennis` tinyint(1) NOT NULL DEFAULT '0',
  `tennis_table` tinyint(1) NOT NULL DEFAULT '0',
  `end_cleaning` tinyint(1) NOT NULL DEFAULT '0',
  `linen_rental` tinyint(1) NOT NULL DEFAULT '0',
  `internet` tinyint(1) NOT NULL DEFAULT '0',
  `price` int NOT NULL,
  `ville_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gites`
--

INSERT INTO `gites` (`id`, `title`, `description`, `surface`, `bedrooms`, `bed`, `pets`, `dishwasher`, `washing_machine`, `air_conditioning`, `tv`, `terrace`, `barbecue`, `private_pool`, `shared_pool`, `tennis`, `tennis_table`, `end_cleaning`, `linen_rental`, `internet`, `price`, `ville_id`, `created_at`, `updated_at`) VALUES
(2, 'Le gîte de la sorcière', 'Gîte Auvergnat en plein coeur de Clermont-Ferrand', 110, 2, 6, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 125, 20, '2024-12-24 08:11:07', '2024-12-24 09:01:28'),
(3, 'Le gîte du coq', 'Gites normand en plein coeur de Rouen', 110, 2, 6, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 220, 19, '2024-12-24 08:21:58', '2024-12-24 08:21:58'),
(4, 'Le gîte à Didi', 'Gîte familiale', 300, 4, 12, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 340, 21, '2024-12-24 09:30:35', '2024-12-24 09:30:35'),
(5, 'Le gîte de la Mamuche', 'Petit gîte en plein coeur de notre belle capitale', 120, 2, 6, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 250, 1, '2024-12-24 09:32:41', '2024-12-24 09:32:41'),
(6, 'Le Normand', 'Gite dans la banlieue d\'Évreux avec plein de charme.', 220, 4, 16, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 1, 380, 21, '2024-12-24 09:34:12', '2024-12-24 09:34:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gites`
--
ALTER TABLE `gites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gites_ville_id_foreign` (`ville_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gites`
--
ALTER TABLE `gites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gites`
--
ALTER TABLE `gites`
  ADD CONSTRAINT `gites_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
