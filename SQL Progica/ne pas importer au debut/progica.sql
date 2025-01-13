-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2025 at 09:53 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_23_084124_create_regions_table', 1),
(6, '2024_12_23_084140_create_departements_table', 1),
(7, '2024_12_23_084152_create_villes_table', 1),
(8, '2024_12_23_143920_create_gites_table', 1),
(10, '2024_12_23_153523_add_default_values_to_gites_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Auvergne-Rhône-Alpes', NULL, NULL),
(2, 'Bourgogne-Franche-Comté', NULL, NULL),
(3, '	Bretagne', NULL, NULL),
(4, 'Centre-Val de Loire', NULL, NULL),
(5, 'Grand Est', NULL, NULL),
(6, 'Hauts-de-France', NULL, NULL),
(7, 'Île-de-France	', NULL, NULL),
(8, 'Normandie', NULL, NULL),
(9, 'Nouvelle-Aquitaine', NULL, NULL),
(10, 'Occitanie', NULL, NULL),
(11, 'Pays de la Loire', NULL, NULL),
(12, 'Provence-Alpes-Côte d’Azur', NULL, NULL),
(13, 'Corse', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_region_id_foreign` (`region_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gites`
--
ALTER TABLE `gites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gites_ville_id_foreign` (`ville_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gites`
--
ALTER TABLE `gites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gites`
--
ALTER TABLE `gites`
  ADD CONSTRAINT `gites_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
