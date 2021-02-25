-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 03:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `Title`, `Description`, `Priority`, `created_at`, `updated_at`) VALUES
(1, 3, 'Informal cross-border traders need a tailored Covid-19 recovery packag', 'The recommitment comes at the time researchers have found out that Covid-19 restrictions, especially border closures in the East African region, have had widespread consequences on cross-border traders.\\nIn the wake of the Covid-19 outbreak, East African countries have been forced to close their borders as part of the efforts to control the virus spread.\\n\\n \\nWhile cargo truck drivers have continued to operate, the movement of informal cross-border traders, who use motorcycles, bicycles, and even foot to transport their goods was halted, thus affecting their businesses and livelihoods', 'HIGH', '2021-02-21 07:30:54', '2021-02-21 09:48:38'),
(4, 1, 'Rwanda’s robotic advancements in response to Covid-19', 'According to information from the World Health Organization, one of the challenges brought about by the Covid-19 pandemic is a stout chain of transmission, especially the rate of infection of health professionals while treating Covid-19 patients.\nThis, experts argue, has seen countries, including Rwanda, adopt the science of robotic systems as part of the ways to offer effective treatment at the same time strengthening the fight against the pandemic.\n\n \nRobotic systems have not been common in Rwanda in the past, until recently when the country launched UAV drones in the health care sector.\n\n \nHowever, as epidemics escalate, reports indicate that the potential roles of robotics are becoming increasingly clear.', 'HIGH', '2021-02-21 07:38:55', '2021-02-21 07:38:55'),
(5, 2, 'Covid-19: Schools, places of worship reopen', 'A cabinet meeting held on Friday, February 19, among others resolved that effective Tuesday, February 23, all schools in Kigali and places of worship will reopen\nSince January 18, schools in the capital have not been operating, a decision that was taken to prevent the spread of Covid-19.\n\n \nAlthough places of worship were given a green light after almost a month of closure, going forward, they will be operating at 30 percent capacity.\n\n \nThe cabinet also resolved that civil and religious weddings will be allowed but should not exceed 20 persons and must comply with all Covid-19 preventive measures.', 'HIGH', '2021-02-21 07:43:06', '2021-02-21 07:43:06'),
(6, 2, 'FIFA opens Regional Development Office in Kigali', 'The signing and inauguration of the office was attended by delegates from the FIFA Member Associations Presidents in the CECAFA region as well government officials including Sports Minister Aurore Mimosa Munyangaju and Foreign Affairs Minister Vincent Biruta as well FERWAFA President Rtd Brig. \nFIFA’s regional office in Kigali will have the mandate to coordinate all its related activities in specific regions, provide strategic guidance to regional Member Associations, and provide recommendations to FIFA Headquarters for development support in the region\nGeneral Jean-Damascene Sekamana.', 'MEDIUM', '2021-02-21 07:44:37', '2021-02-21 07:44:37'),
(10, 1, 'Distributing vaccination to people', 'this is new initiative taken after thousands of do', 'HIGH', '2021-02-24 15:37:35', '2021-02-25 10:11:03'),
(11, 10, 'embracing programming culture', 'I am glad to ennounce that this year i will be pursuing master degree at cmu africa', 'MEDIUM', '2021-02-24 15:40:42', '2021-02-24 15:40:42'),
(12, 1, 'testing purpose', 'This is used for testing', 'HIGH', '2021-02-25 10:20:28', '2021-02-25 10:20:28'),
(13, 1, 'second test', 'this is for testing purpose', 'LOW', '2021-02-25 10:40:33', '2021-02-25 10:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_20_203338_create_articles_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', 'f44a2a3a94421f7adeba5c1c180347d7d7c16eb71261453dcb9a6732c5d26061', '[\"*\"]', NULL, '2021-02-21 04:45:36', '2021-02-21 04:45:36'),
(2, 'App\\Models\\User', 2, 'MyApp', 'ae558137accd294bd3e76f58853fc278eb0e6cba8e9014f381af0bceb0da0e61', '[\"*\"]', NULL, '2021-02-21 04:46:18', '2021-02-21 04:46:18'),
(3, 'App\\Models\\User', 3, 'MyApp', '488ffcc2725159917804085bacc1b7aae766146b8bec19dcd1320fcfc84ada49', '[\"*\"]', NULL, '2021-02-21 04:47:02', '2021-02-21 04:47:02'),
(4, 'App\\Models\\User', 4, 'MyApp', 'ca9d9b68907b76f27960cf1d63df8c3ba1dc07564f77d47c03bb43833ae835a6', '[\"*\"]', NULL, '2021-02-21 04:47:47', '2021-02-21 04:47:47'),
(5, 'App\\Models\\User', 3, 'MyApp', '97ed8458c1cffa999495e76e62b23882407fecb1cab8591c227a9ace97bbffcb', '[\"*\"]', '2021-02-21 07:33:24', '2021-02-21 04:50:39', '2021-02-21 07:33:24'),
(6, 'App\\Models\\User', 1, 'MyApp', '1a4b981ad517dbb6ba2d2f029a6d5d4f4315fd1852db4cacc7717c5b8f56809e', '[\"*\"]', '2021-02-21 07:38:55', '2021-02-21 07:34:54', '2021-02-21 07:38:55'),
(7, 'App\\Models\\User', 2, 'MyApp', '931e8d31cd7aa8c963e5b387b05636f11735af95bd54ba2ec9b4d1f49c4e39bd', '[\"*\"]', '2021-02-21 07:44:37', '2021-02-21 07:40:55', '2021-02-21 07:44:37'),
(8, 'App\\Models\\User', 4, 'MyApp', '1a1b96280d92ef4024c2f4da9fe5f4c4c3d4d2e950685137ee1524d3a15a28b8', '[\"*\"]', '2021-02-21 07:50:39', '2021-02-21 07:49:08', '2021-02-21 07:50:39'),
(9, 'App\\Models\\User', 5, 'MyApp', '9db3e1b669e590acfb86cdd450bbc77db0ce045e0f060b3b2be7e661ecef9af3', '[\"*\"]', NULL, '2021-02-21 07:55:56', '2021-02-21 07:55:56'),
(10, 'App\\Models\\User', 6, 'MyApp', '98e122116d91fb1b48d1c1b8375825591a544c41be7f0416e3ea306633a228ad', '[\"*\"]', NULL, '2021-02-21 08:16:15', '2021-02-21 08:16:15'),
(11, 'App\\Models\\User', 8, 'MyApp', '26ed089c527022541f1dd86c089b2f1e97eaeb7fc72e1c198d14efe79fcd6936', '[\"*\"]', NULL, '2021-02-21 08:38:26', '2021-02-21 08:38:26'),
(12, 'App\\Models\\User', 9, 'MyApp', '38804afa8c44fa56b8030c734c74709f0b45d9bf0bed7875339b2a9281e43bf3', '[\"*\"]', NULL, '2021-02-21 08:39:54', '2021-02-21 08:39:54'),
(13, 'App\\Models\\User', 1, 'MyApp', '67ed1b0e28f9fda24b91d5711f55ac9763bb144ecab7a50d5b4d689ebf151329', '[\"*\"]', '2021-02-21 14:11:07', '2021-02-21 10:06:07', '2021-02-21 14:11:07'),
(14, 'App\\Models\\User', 1, 'MyApp', 'd075bb9bd05ba785464117463451263438a142a94e62e52140e0c2d6f4816429', '[\"*\"]', '2021-02-24 11:10:25', '2021-02-24 11:09:40', '2021-02-24 11:10:25'),
(15, 'App\\Models\\User', 10, 'MyApp', '91c5b0302a8533e2322e0ae328102acf4a05f126fa467c577acff45633c2de9e', '[\"*\"]', NULL, '2021-02-24 15:06:45', '2021-02-24 15:06:45'),
(16, 'App\\Models\\User', 10, 'MyApp', 'f43f74d69adbacbbd6062fe88b342ce312a680b0d78d98c8ccadb234032a469b', '[\"*\"]', NULL, '2021-02-24 15:10:19', '2021-02-24 15:10:19'),
(17, 'App\\Models\\User', 1, 'MyApp', '67fc1d79feb0e56e6faf2d8c19022106ab7fe7ca99e5b40b57b7e3c5f20062e6', '[\"*\"]', NULL, '2021-02-24 15:36:04', '2021-02-24 15:36:04'),
(18, 'App\\Models\\User', 10, 'MyApp', '5e43bb566e9dafdd88884fcef1c1583cd92fcd612b0d9ce9f2d6efd603e239c6', '[\"*\"]', NULL, '2021-02-24 15:39:09', '2021-02-24 15:39:09'),
(19, 'App\\Models\\User', 1, 'MyApp', 'bf83f613b35a6890d53398936337de2822ea393c7f6c318b288f29fd1c9efa96', '[\"*\"]', NULL, '2021-02-25 09:31:02', '2021-02-25 09:31:02'),
(20, 'App\\Models\\User', 1, 'MyApp', 'f0e46c72f3a0c33ef792c63003c903847ca88056e53c61672ac66d06ad9f146a', '[\"*\"]', NULL, '2021-02-25 10:36:48', '2021-02-25 10:36:48'),
(21, 'App\\Models\\User', 1, 'MyApp', 'b575269983e5f042c8921d708c8d78ccaa1ff814cb4c4e62f3c3da2af4cbfe1a', '[\"*\"]', NULL, '2021-02-25 10:40:25', '2021-02-25 10:40:25');

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
(1, 'Edison', 'edisonwacavan2015@gmail.com', NULL, '$2y$10$8Wf0cfGItfq32xXGal9/..xOFmywaD/fqSiXfDLHUb/gyiy8dDYta', NULL, '2021-02-21 04:45:36', '2021-02-21 04:45:36'),
(2, 'James', 'irambonajames@gmail.com', NULL, '$2y$10$29xD44xI9/t0iwXq.mhWkOgvEEFisYGwDOcoQAJPh6f.UYx50Cdv.', NULL, '2021-02-21 04:46:18', '2021-02-21 04:46:18'),
(3, 'Philius', 'hakizaphilius@gmail.com', NULL, '$2y$10$/eBs2l6E4TOk3ahps0MxKeBSlI55yBO4s5E7ZSW..2Tx/icro0nIq', NULL, '2021-02-21 04:47:02', '2021-02-21 04:47:02'),
(4, 'Patrick', 'patty@gmail.com', NULL, '$2y$10$yAONiT/1j6oUqpkxswuhMOsMojI.Ph1MudulXSklhd9.3z3P/bzYa', NULL, '2021-02-21 04:47:47', '2021-02-21 04:47:47'),
(6, 'Thiery', 'bikindi@gmail.com', NULL, '$2y$10$0gwBZ/E5QpKVNLhhpL8QLOa/Li83yY8aNsewS1PpsKHgCpDTLOXN2', NULL, '2021-02-21 08:16:14', '2021-02-21 08:16:14'),
(8, 'Theophile', 'niyigena@gmail.com', NULL, '$2y$10$D25vl25RY/xejaQDmT6yROgUSPYzVOtUeSz/XjCmS693sp5ddZsCu', NULL, '2021-02-21 08:38:25', '2021-02-21 08:38:25'),
(9, 'Daniel', 'danny@gmail.co', NULL, '$2y$10$x48U9lfEhDpZYIap.cAmUetPj5WepQ7q1jsRLgRsnHPhW.XeocLnu', NULL, '2021-02-21 08:39:54', '2021-02-21 08:39:54'),
(10, 'nishimirwe', 'nishimirwe@gmail.com', NULL, '$2y$10$CScZs1/Kjdy5w/RlBYVmieRGIF1sTTsjkVjJ9PHNDpKBGJzUPPBE2', NULL, '2021-02-24 15:06:45', '2021-02-24 15:06:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
