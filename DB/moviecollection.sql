-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 12:33 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviecollection`
--

-- --------------------------------------------------------

--
-- Table structure for table `casts`
--

CREATE TABLE `casts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `casts`
--

INSERT INTO `casts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Ian McKellen', '2019-03-13 07:39:23', '2019-03-13 07:39:23'),
(6, 'Martin Freeman', '2019-03-13 07:39:29', '2019-03-13 07:39:29'),
(7, 'Christian Bale', '2019-03-13 07:40:33', '2019-03-13 07:40:33'),
(8, 'Heath Ledger', '2019-03-13 07:40:40', '2019-03-13 07:40:40'),
(9, 'Bradley Cooper', '2019-03-13 07:43:26', '2019-03-13 07:43:26'),
(10, 'Amy Adams', '2019-03-13 07:43:32', '2019-03-13 07:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `cast_movie`
--

CREATE TABLE `cast_movie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `cast_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cast_movie`
--

INSERT INTO `cast_movie` (`id`, `movie_id`, `cast_id`, `created_at`, `updated_at`) VALUES
(84, 16, 5, NULL, NULL),
(85, 16, 6, NULL, NULL),
(86, 17, 7, NULL, NULL),
(87, 17, 8, NULL, NULL),
(88, 26, 7, NULL, NULL),
(89, 26, 9, NULL, NULL),
(90, 26, 10, NULL, NULL),
(92, 27, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Action', '2019-03-08 15:42:04', '2019-03-09 11:44:51'),
(2, 'Comedy', '2019-03-09 16:47:24', '2019-03-09 16:47:24'),
(3, 'Drama', '2019-03-09 16:47:25', '2019-03-12 18:34:32'),
(4, 'Adventure', '2019-03-13 07:38:16', '2019-03-13 07:38:16'),
(5, 'Fantasy', '2019-03-13 07:38:23', '2019-03-13 07:38:23'),
(6, 'Crime', '2019-03-13 07:40:50', '2019-03-13 07:40:50'),
(7, 'Sci-Fi', '2019-03-13 07:45:35', '2019-03-13 07:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Turkish', '2019-03-08 15:42:11', '2019-03-08 15:42:11'),
(2, 'English', '2019-03-08 15:42:14', '2019-03-08 15:42:14'),
(3, 'French', '2019-03-13 07:45:25', '2019-03-13 07:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `lang_movie`
--

CREATE TABLE `lang_movie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lang_movie`
--

INSERT INTO `lang_movie` (`id`, `movie_id`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 4, 1, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 5, 2, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 1, NULL, NULL),
(14, 14, 1, NULL, NULL),
(21, 15, 1, NULL, NULL),
(22, 15, 2, NULL, NULL),
(84, 16, 1, NULL, NULL),
(85, 16, 2, NULL, NULL),
(86, 17, 1, NULL, NULL),
(87, 17, 2, NULL, NULL),
(90, 26, 1, NULL, NULL),
(91, 26, 2, NULL, NULL),
(93, 27, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_06_080317_create_movies_table', 1),
(4, '2019_03_06_081832_create_genres_table', 1),
(5, '2019_03_06_081841_create_casts_table', 1),
(6, '2019_03_06_081906_create_langs_table', 1),
(7, '2019_03_06_084556_create_movie_cast_pivot_table', 1),
(8, '2019_03_06_084624_create_movie_langs_pivot_table', 1),
(9, '2019_03_13_192854_create_roles_table', 2),
(10, '2019_03_13_193327_create_role_user_table', 2),
(11, '2019_03_13_194151_create_roles_table', 3),
(12, '2019_03_13_194515_create_user_role_pivot_table', 3),
(13, '2019_03_13_200352_create_role_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `genre_id`, `director`, `description`, `poster`, `created_at`, `updated_at`) VALUES
(16, 'The Hobbit: The Desolation of Smaug', '2013', 4, 'Peter Jackson', 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring.', 'posters/Hobbit1552146307.jpg', '2019-03-08 20:04:56', '2019-03-13 07:39:10'),
(17, 'The Dark Knight', '2008', 1, 'Christopher Nolan', 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'posters/Batman1552146543.jpg', '2019-03-09 11:56:18', '2019-03-13 07:41:27'),
(26, 'American Hustle', '2013', 6, 'David O. Russell', 'A con man, Irving Rosenfeld, along with his seductive partner Sydney Prosser, is forced to work for a wild F.B.I. Agent, Richie DiMaso, who pushes them into a world of Jersey powerbrokers and the Mafia.', 'posters/American Hustle1552473795.jpg', '2019-03-13 07:43:15', '2019-03-13 07:43:15'),
(27, 'Arrival', '2016', 7, 'Denis Villeneuve', 'A linguist is recruited by the military to communicate with alien lifeforms after twelve mysterious spacecrafts land around the world.', 'posters/Arrival1552473918.jpg', '2019-03-13 07:45:18', '2019-03-13 07:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-03-13 18:28:38', '2019-03-13 18:28:38'),
(2, 'user ', '2019-03-13 18:28:38', '2019-03-13 18:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, NULL, NULL),
(8, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$vZaH88hjaxOBIaIXnHKKkeBhsoNuoxp/6qaFbg1Ypun21or09Y.Zm', NULL, '2019-03-13 18:28:38', '2019-03-13 18:28:38'),
(2, 'user', 'user@user.com', NULL, '$2y$10$RYzp2MRIh9Qr7k.wO9TpROTsCoka4j7R/yBMBS3lbwRwNvEfw579S', NULL, '2019-03-13 18:28:38', '2019-03-13 18:28:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casts`
--
ALTER TABLE `casts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast_movie`
--
ALTER TABLE `cast_movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_movie`
--
ALTER TABLE `lang_movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casts`
--
ALTER TABLE `casts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cast_movie`
--
ALTER TABLE `cast_movie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lang_movie`
--
ALTER TABLE `lang_movie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
