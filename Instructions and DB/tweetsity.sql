-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2020 at 10:01 AM
-- Server version: 5.7.29
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tweetsity`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is just an example', 'Amazing entry!!', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(2, 1, 'This is just another example', 'Wowwwww amazing entry again!!', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(3, 1, 'Improvements part 1', 'I would have liked to add location to the entries.', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(4, 1, 'Improvements part 2', 'I want the articles to have images.', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(5, 2, 'Kurt Suggestions', 'I want to share my content in Twitter automatically.', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(6, 2, 'Kurt Suggestions II', 'I love my music.', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(7, 3, 'Moon', 'Becoming a wolf while I am writing this.', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(8, 3, 'Pop king', 'I want to populate this blog.', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(9, 4, 'Oscar', 'I have some cool movies to share with you.', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(10, 4, 'Oscar', 'I am very famous!', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(11, 5, 'Horror', 'What a character!', '2020-02-07 09:24:09', '2020-02-07 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `hidden_tweets`
--

CREATE TABLE `hidden_tweets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tweet_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hidden_tweets`
--

INSERT INTO `hidden_tweets` (`id`, `user_id`, `tweet_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1061806902827347968', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(2, 1, '1084946054494277634', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(3, 2, '834103150688743426', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(4, 2, '831928317360078848', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(5, 2, '831563672996691968', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(6, 3, '13007071611985920', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(7, 3, '110943334817734657', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(8, 3, '2412781442', '2020-02-07 09:24:09', '2020-02-07 09:24:09');

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
(1, '2020_02_04_000000_create_users_table', 1),
(2, '2020_02_04_100000_create_password_resets_table', 1),
(3, '2020_02_04_200000_create_entries_table', 1),
(4, '2020_02_04_300000_create_hidden_tweets_table', 1),
(5, '2020_02_04_400000_create_contact_forms_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `twitter_username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rodrigo', 'Vidal', 'rodrigoovidal', 'rodrigoovidal', 'rodrigovidal05@gmail.com', '2020-02-07 09:24:09', '$2y$10$fhj.6r1PVGGyIzeSUWQC9.k.h.6Ek/iaxNVm1PqZa9IivGOCxGyZq', 'UgY2ACaYWAgUnRzqC17zTkVilCa3zCF4l9yz472i7a7BzGOK6ybTyIgguong', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(2, 'Kurt', 'Cobain', 'kurtcobain', 'kurtcobain', 'kurtcobain@gmail.com', '2020-02-07 09:24:09', '$2y$10$yUrXW4CTp4DisECCcMcCZOoV0SVj4zjoEMUj59p8MZgum3k66o9Qy', 'EqR0JZN6sM', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(3, 'Michael', 'Jackson', 'michaeljackson', 'micheljackson', 'michaeljackson@gmail.com', '2020-02-07 09:24:09', '$2y$10$JQU/Y3ls5/Ba9w2hmbFaD.AW10eEt3oHmKixhGlB3O/0ImKj8VXyK', 'hsnb8A0eyi', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(4, 'John', 'Travolta', 'johntravolta', 'johntravolta', 'johntravolta@gmail.com', '2020-02-07 09:24:09', '$2y$10$g5N8UsltfglRdd3XbRW4EuzRA9/LByXygRY7nsKmHfIe/Cc8Hy10G', 'hL6msayOdW', '2020-02-07 09:24:09', '2020-02-07 09:24:09'),
(5, 'Freddy', 'Krugger', 'freddykrugger', 'freddykrugger', 'freddykrugger@gmail.com', '2020-02-07 09:24:09', '$2y$10$.Qi89KcnN4Vzj1YKd8rh1.Bar6HcB7w3//yivS2dh3jVzetE0iYEC', 'Z3JQuQCGCj', '2020-02-07 09:24:09', '2020-02-07 09:24:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entries_user_id_foreign` (`user_id`);

--
-- Indexes for table `hidden_tweets`
--
ALTER TABLE `hidden_tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hidden_tweets_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hidden_tweets`
--
ALTER TABLE `hidden_tweets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hidden_tweets`
--
ALTER TABLE `hidden_tweets`
  ADD CONSTRAINT `hidden_tweets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
