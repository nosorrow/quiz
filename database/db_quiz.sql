-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране:  9 окт 2022 в 18:13
-- Версия на сървъра: 10.4.22-MariaDB
-- Версия на PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `3943646_quiz`
--

-- --------------------------------------------------------

--
-- Структура на таблица `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `quiz_id`, `total`, `score`, `created_at`, `updated_at`) VALUES
(3, 5, 1, 3, 2, '2022-10-09 06:27:37', '2022-10-09 06:27:37'),
(4, 5, 1, 3, 1, '2022-10-09 06:30:56', '2022-10-09 06:30:56');

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_05_172214_create_roles_table', 1),
(6, '2022_10_05_201214_create_files_table', 1),
(7, '2022_10_07_171001_create_quizzes_table', 1),
(8, '2022_10_08_080429_create_questions_table', 1),
(9, '2022_10_08_081859_create_question_options_table', 2),
(10, '2022_10_09_082705_create_histories_table', 3);

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `questions`
--

INSERT INTO `questions` (`id`, `question`, `quiz_id`, `points`, `created_at`, `updated_at`) VALUES
(9, 'What is Array', 1, 1, '2022-10-08 13:51:04', '2022-10-08 13:51:04'),
(16, 'C is correct', 6, 1, '2022-10-08 16:37:50', '2022-10-08 16:37:50'),
(17, 'B is correct', 1, 1, '2022-10-09 03:28:51', '2022-10-09 03:28:51'),
(18, 'A is correct', 1, 1, '2022-10-09 03:29:18', '2022-10-09 03:29:18');

-- --------------------------------------------------------

--
-- Структура на таблица `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `correct` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `question_options`
--

INSERT INTO `question_options` (`id`, `title`, `question_id`, `correct`, `created_at`, `updated_at`) VALUES
(4, 'Хаш', 9, 0, '2022-10-08 13:51:05', '2022-10-08 13:51:05'),
(5, 'Масив', 9, 1, '2022-10-08 13:51:05', '2022-10-08 13:51:05'),
(6, 'Друго', 9, 0, '2022-10-08 13:51:05', '2022-10-08 13:51:05'),
(25, 'a', 16, 0, '2022-10-08 16:37:50', '2022-10-08 16:37:50'),
(26, 'b', 16, 0, '2022-10-08 16:37:50', '2022-10-08 16:37:50'),
(27, 'c', 16, 1, '2022-10-08 16:37:50', '2022-10-08 16:37:50'),
(28, 'a', 17, 0, '2022-10-09 03:28:51', '2022-10-09 03:28:51'),
(29, 'b', 17, 1, '2022-10-09 03:28:51', '2022-10-09 03:28:51'),
(30, 'c', 17, 0, '2022-10-09 03:28:51', '2022-10-09 03:28:51'),
(31, 'a', 18, 1, '2022-10-09 03:29:18', '2022-10-09 03:29:18'),
(32, 'b', 18, 0, '2022-10-09 03:29:18', '2022-10-09 03:29:18'),
(33, 'c', 18, 0, '2022-10-09 03:29:18', '2022-10-09 03:29:18');

-- --------------------------------------------------------

--
-- Структура на таблица `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Quiz A', 1, '2022-10-08 08:50:57', '2022-10-08 08:50:57'),
(6, 'Test A', 1, '2022-10-08 16:11:03', '2022-10-08 16:11:03');

-- --------------------------------------------------------

--
-- Структура на таблица `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'manager', NULL, NULL),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Администратор', 1, 'admin@gmail.com', '2022-10-08 05:18:09', '$2y$10$bb0QwZG/NKJyr62CPcG25.vJcS6RhY9DDhyWUCCWXCTH7ofSgIzNy', '6PKBhNKYSc583Ta5CEpiZKxMlckW9wirEqvq0eS9fWUZq7mLWlkmxFMBh1zD', '2022-10-08 05:18:09', '2022-10-08 05:18:09'),
(2, 'Rosalinda Bogan V', 3, 'frida.kuvalis@example.com', '2022-10-08 05:18:09', '$2y$10$wBP37yK/YixyZpRlLno7OOVy7BSvexaZPhRh7y1kWXEnZhMfLBarm', 'qqy2sNuC1M', '2022-10-08 05:18:09', '2022-10-08 05:18:09'),
(3, 'Vivien Ryan', 3, 'manager1@gmail.com', '2022-10-08 05:18:09', '$2y$10$Fuanf5aRdtvFZF5NqXN59eS6J9sTxoRJf94f.uYMKfjKaYUdoZpyG', 'NQVVJvS3qK', '2022-10-08 05:18:09', '2022-10-08 05:18:09'),
(4, 'Marcelo Murray', 2, 'manager@gmail.com', '2022-10-08 05:18:09', '$2y$10$mKfSy5kU.gSmF4ATygBCVObClyEVYsB7iuxWt99la2VXZCPK4SnhK', '5ificAAlkPVowP4GDcXYO70XIt9fyVC2EOXTl4Fmn1ylrkNtP9y4JuRWpgAj', '2022-10-08 05:18:09', '2022-10-08 05:18:09'),
(5, 'Пламен Петков', 3, 'user@gmail.com', '2022-10-08 05:18:09', '$2y$10$mKfSy5kU.gSmF4ATygBCVObClyEVYsB7iuxWt99la2VXZCPK4SnhK', 'GfE28gyLdBUJvzi6sUuD5uqgT3w5bsgwV5L9EqMy3NFwcbUcLEoUA7Efhm9P', '2022-10-08 05:18:09', '2022-10-08 05:18:09');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индекси за таблица `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

--
-- Индекси за таблица `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_user_id_foreign` (`user_id`),
  ADD KEY `histories_quiz_id_foreign` (`quiz_id`);

--
-- Индекси за таблица `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индекси за таблица `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индекси за таблица `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Индекси за таблица `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_options_question_id_foreign` (`question_id`);

--
-- Индекси за таблица `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_user_id_foreign` (`user_id`);

--
-- Индекси за таблица `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
