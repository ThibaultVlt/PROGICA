-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2025 at 09:55 AM
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
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `name`, `departement_id`, `created_at`, `updated_at`) VALUES
(1, 'Paris', 75, NULL, NULL),
(2, 'Marseille', 13, NULL, NULL),
(3, 'Lyon', 69, NULL, NULL),
(4, 'Toulouse', 32, NULL, NULL),
(5, 'Nice', 6, NULL, NULL),
(6, 'Nantes', 45, NULL, NULL),
(7, 'Montpellier', 35, NULL, NULL),
(8, 'Strasbourg', 67, NULL, NULL),
(9, 'Bordeaux', 34, NULL, NULL),
(10, 'Lille', 60, NULL, NULL),
(11, 'Rennes', 36, NULL, NULL),
(12, 'Toulon', 83, NULL, NULL),
(13, 'Saint-Étienne', 43, NULL, NULL),
(14, 'Le Havre', 76, NULL, NULL),
(15, 'Dijon', 22, NULL, NULL),
(16, 'Grenoble', 39, NULL, NULL),
(17, 'Angers', 50, NULL, NULL),
(18, 'Reims', 52, NULL, NULL),
(19, 'Rouen', 76, NULL, NULL),
(20, 'Clermont-Ferrand', 63, NULL, NULL),
(21, 'Évreux', 28, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villes_departement_id_foreign` (`departement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
