-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 07:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS book_review_db;
USE book_review_db;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_review_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `description`, `cover_image`, `publication_year`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'Beneath Crimson Skies', 'Ava Montgomery', 'Fiction', 'Ava Montgomery', 'covers/JVobrSI9zNbR6MAPpVX3ME5J44ue5xHrL5vyC3cx.jpg', 2020, '2025-07-17 14:20:43', '2025-07-17 18:58:13', NULL),
(3, 'Code of Shadows', 'Marcus Weller', 'Thriller', 'Code of Shadows', 'covers/lozWNv4OY4BGDrP2WlbV1pZyV9ee5UfAFBTLcYOz.png', 2023, '2025-07-17 14:21:31', '2025-07-17 18:56:58', NULL),
(10, 'The Whispering Library', 'Eleanor Grey', 'Mystery', 'Mystery', 'covers/Cc25e3c3XvTCPfVC7fCv7lySt7ip5JFNhj5RFk5O.jpg', 2022, '2025-07-17 18:21:49', '2025-07-17 18:55:19', 1),
(11, 'The Hunger Games (The Hunger Games, #1)', 'Suzanne Collins', 'Novel', 'Winning means fame and fortune. Losing means certain death. The Hunger Games have begun. . . .\r\n\r\nIn the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts.', 'covers/H9BpN2wwudNjiS5C4cZ8ow207kSaWx48oeiC2WOQ.jpg', 2000, '2025-07-18 12:06:48', '2025-07-18 12:06:48', 1),
(12, 'Harry Potter Series Box Set', 'J.K. Rowling', 'Novel', 'All seven eBooks in the multi-award winning, internationally bestselling Harry Potter series, available as one download with stunning cover art by Olly Moss. Enjoy the stories that have captured the imagination of millions worldwide.', 'covers/48ZyfoYDl7x1gYf3aQHd8RI1Bitu1FZEHr50yPZO.jpg', 2003, '2025-07-18 12:08:06', '2025-07-18 12:08:06', 1),
(13, 'Percy Jackson Collection', 'Rick Riordan', 'Fantasy', 'Lightning Thief, Sea of Monsters, Titan\'s Curse, Battle of the Labyrinth, Last Olympian, Greek Heroes, Greek Gods\r\nGenres', 'covers/wjNiuKsL9PKnX7Yi932IIjIwEMl3dAm80iibWyq8.jpg', 1991, '2025-07-18 12:09:40', '2025-07-18 12:09:40', 1),
(14, 'The Son of Neptune: The Graphic Novel', 'Robert Venditti', 'Novel', 'Percy is confused. When he awoke after his long sleep, he didn’t know much more than his name. His brain-fuzz is lingering, even after the wolf Lupa told him he is a demigod and trained him to fight. Somehow Percy manages to make it to the camp for half-bloods, despite the fact that he had to continually kill monsters that, annoyingly, would not stay dead. But the camp doesn’t ring any bells with him.\r\n\r\nHazel is supposed to be dead. When she lived before, she didn’t do a very good job of it. When the Voice took over her mother and commanded Hazel to use her “gift” for an evil purpose, Hazel couldn’t say no. Now, because of her mistake, the future of the world is at risk.\r\n\r\nFrank is a klutz. His grandmother claims he is descended from ancient heroes and can be anything he wants to be, but he doesn’t see it. He doesn’t even know who his father is. He keeps hoping Apollo will claim him, because the only thing he is good at is archery―although not good enough to help the Fifth Cohort win at war games. His big and bulky physique makes him feel like a clumsy ox, especially in front of Hazel, his closest friend at camp. He trusts her completely―enough, even, to share the secret he holds close to his heart.\r\n\r\n\r\nFeaturing a faithful adaptation by Robert Venditti, and incredible artwork by Antoine Dodé and Orpheus Collar, Rick Riordan\'s blockbuster book comes to life in The Son of Neptune, The Graphic Novel .', 'covers/04iFeRDpDlFqxT2OVoXzRME7Kr2h785BBcdLQBRk.jpg', 2000, '2025-07-18 12:11:01', '2025-07-18 12:11:01', 1),
(15, 'The Mark of Athena Excerpt', 'Rick Riordan', 'Novel', 'Exclusive Excerpt from chapter 10 from The Heroes of Olympus, Book Three: The Mark of Athena', 'covers/7Vsfy6c1y3nCEsOPPFYiSZs6frtwnWMT9n36JVQD.jpg', 2000, '2025-07-18 12:12:15', '2025-07-18 12:12:15', 1),
(16, 'The Lost Hero', 'Robert Venditti', 'Novel', 'The Lost Hero', 'covers/uR6Qh0HChYC75WaXkxsPeFeinBNbGpjl9t3vHbeN.jpg', 1991, '2025-07-18 12:13:34', '2025-07-18 12:13:34', 1),
(17, 'Bad Company: Private Equity and the Death of the American Dream', 'Megan Greenwell', 'Business', 'Megan Greenwell', 'covers/1EAAI7xRqyMNpPfPZEY3UTVF8Wua7yDb1kC7RwT3.jpg', 1991, '2025-07-18 12:14:54', '2025-07-18 12:14:54', 1),
(18, 'Murderland: Crime and Bloodlust in the Time of Serial Killers', 'Caroline Fraser', 'Crime', 'Murderland: Crime and Bloodlust in the Time of Serial Killers\r\n\r\nCaroline Fraser', 'covers/mgvyr9I8dlII9KLTLANieUEofBH2Cqewf5GyBLA5.jpg', 2024, '2025-07-18 12:15:59', '2025-07-18 12:15:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_17_045722_create_books_table', 2),
(5, '2025_07_17_050944_add_is_admin_to_users_table', 3),
(6, '2025_07_17_053908_create_reviews_table', 4),
(7, '2025_07_17_111551_add_user_id_to_books_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 3, 'good', '2025-07-17 14:22:25', '2025-07-17 17:59:43'),
(2, 1, 2, 5, 'hi', '2025-07-17 15:07:48', '2025-07-17 17:42:05'),
(4, 1, 3, 5, 'done', '2025-07-17 16:50:23', '2025-07-17 17:00:11'),
(5, 1, 3, 3, 'gjjj', '2025-07-17 17:42:30', '2025-07-17 17:42:30'),
(6, 1, 10, 3, 'good', '2025-07-17 18:22:23', '2025-07-17 18:22:23'),
(7, 1, 18, 5, 'good', '2025-07-18 12:16:24', '2025-07-18 12:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('WW8wUdAjT8SQ7wSssoCrKgbYKxFZc2eVXlISEkv5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidlFwZkN2RllTMkZ5NUhXak9LTGpqVU15Yk9Qc0pQMVViZW9MN2ZjTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29rcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1752815787);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', 'admin@com', NULL, '$2y$12$8/VjCg9CG/BftifVr4dwvOjUMRSAAq0yu8EZxRc1Bkts7Js4MykVC', NULL, '2025-07-17 12:05:21', '2025-07-17 13:56:43', 1),
(2, 'Tayyeba Rehman', 'tobhakhan@gmail.com', NULL, '$2y$12$GpzEIaxxY9ETAEiF2apf..Fohp.xTlFdPdBJtd2jrKeINV9HdzdUO', NULL, '2025-07-17 13:18:04', '2025-07-17 13:18:04', 0),
(3, 'test', 'test@com', NULL, '$2y$12$M8fyDzsmcDkVarramxgA1.BtiZ5fsxTPd4WGFGRnjX1PcmA7KpeWq', NULL, '2025-07-17 18:50:24', '2025-07-17 18:50:24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
