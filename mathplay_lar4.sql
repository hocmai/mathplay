-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 05:55 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mathplay_lar4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `email`, `password`, `username`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'tantanb2@gmail.com', '$2y$10$z8PvIU0SNN52Qt4g253qdOZ7kZjIltnAaoaqCYX8Vseg2ic9BSpa2', 'tantan', NULL, NULL, '2017-08-24 04:45:57', '2017-08-24 07:15:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `author_id`, `subject_id`, `title`, `description`, `slug`, `weight`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Các số đến 10. Hình vuông + Hình tròn + Hình tam giác', '', 'cac-so-den-10-hinh-vuong-hinh-tron-hinh-tam-giac', NULL, 1, NULL, '2017-08-24 05:04:52', '2017-08-24 05:04:52'),
(2, 1, 1, 'Phép cộng, Phép trừ trong phạm vi 10', '', 'phep-cong-phep-tru-trong-pham-vi-10', NULL, 1, NULL, '2017-08-24 05:05:58', '2017-08-24 05:05:58'),
(3, 1, 2, 'Phép cộng, phép trừ trong phạm vi 100. Đo thời gian', '', 'phep-cong-phep-tru-trong-pham-vi-100-do-thoi-gian', NULL, 1, NULL, '2017-08-24 05:06:57', '2017-08-24 05:06:57'),
(4, 1, 1, 'Các số trong phạm vi 100. Đo độ dài. Giải bài toán', '', 'cac-so-trong-pham-vi-100-do-do-dai-giai-bai-toan', NULL, 1, NULL, '2017-08-24 05:09:41', '2017-08-24 05:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci,
  `collection` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE `difficulty` (
  `diff_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `author` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `fid` int(10) UNSIGNED NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `filemime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filesize` int(11) NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `author_id`, `title`, `description`, `slug`, `weight`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lớp 1', 'Các môn học lớp 1', 'lop-1', NULL, 1, NULL, '2017-08-24 04:58:48', '2017-08-24 04:58:48'),
(2, 1, 'Lớp 2', '', 'lop-2', NULL, 1, NULL, '2017-08-24 04:58:57', '2017-08-24 04:58:57'),
(3, 1, 'Lớp 3', '', 'lop-3', NULL, 1, NULL, '2017-08-24 04:59:05', '2017-08-24 04:59:05'),
(4, 1, 'Lớp 4', '', 'lop-4', NULL, 1, NULL, '2017-08-24 04:59:12', '2017-08-24 04:59:12'),
(5, 1, 'Lớp 5', '', 'lop-5', NULL, 1, NULL, '2017-08-24 04:59:21', '2017-08-24 04:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `lessions`
--

CREATE TABLE `lessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `config` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lessions`
--

INSERT INTO `lessions` (`id`, `title`, `description`, `chapter_id`, `author_id`, `slug`, `weight`, `status`, `deleted_at`, `created_at`, `updated_at`, `config`) VALUES
(14, 'Nhiều hơn, ít hơn', '', 1, 1, 'nhieu-hon-it-hon', NULL, 1, NULL, '2017-08-28 09:13:36', '2017-08-28 09:13:36', '{\"num_question\":\"20\",\"score_limit\":\"100\"}');

-- --------------------------------------------------------

--
-- Table structure for table `lession_question`
--

CREATE TABLE `lession_question` (
  `lession_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `config` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lession_question`
--

INSERT INTO `lession_question` (`lession_id`, `qid`, `config`) VALUES
(14, 20, '{\"question_start\":\"1\",\"question_end\":\"5\",\"answer_type\":\"true_false\",\"min_value\":\"2\",\"max_value\":\"5\"}'),
(14, 21, '{\"question_start\":\"6\",\"question_end\":\"15\",\"answer_type\":\"true_false\",\"min_value\":\"5\",\"max_value\":\"10\"}');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `mid` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `menu_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option` longtext COLLATE utf8_unicode_ci,
  `weight` int(11) NOT NULL DEFAULT '0',
  `depth` smallint(6) DEFAULT NULL,
  `has_children` tinyint(4) DEFAULT NULL,
  `expanded` tinyint(4) NOT NULL DEFAULT '1',
  `p1` int(11) DEFAULT NULL COMMENT 'The first mid in the materialized path. If N = depth, then pN must equal the mlid. If depth > 1 then p(N-1) must equal the parent link mlid. All pX where X > depth must equal zero. The columns p1 .. p5 are also called the parents.',
  `p2` int(11) DEFAULT NULL COMMENT 'The second mlid in the materialized path. See p1',
  `p3` int(11) DEFAULT NULL COMMENT 'The second mlid in the materialized path. See p1',
  `p4` int(11) DEFAULT NULL COMMENT 'The second mlid in the materialized path. See p1',
  `p5` int(11) DEFAULT NULL COMMENT 'The second mlid in the materialized path. See p1',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_11_16_021117_create_roles_table', 1),
('2016_01_12_135210_create_admins_table', 1),
('2017_08_04_071454_create_difficulty', 1),
('2017_08_04_071509_create_lession_question_table', 1),
('2017_08_04_071542_create_file_table', 1),
('2017_08_04_071550_create_relations_table', 1),
('2017_08_04_071610_create_study_history_table', 1),
('2017_08_04_071626_create_config_table', 1),
('2017_08_05_024000_create_menu_table', 1),
('2017_08_20_174509_create_subjects_table', 1),
('2017_08_20_191611_create_grades_table', 1),
('2017_08_20_212237_create_chapters_table', 1),
('2017_08_20_230930_create_lessions_table', 1),
('2017_08_22_114339_create_questions_table', 1),
('2017_08_28_145558_add_config_column_lesstion_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `config` longtext COLLATE utf8_unicode_ci,
  `author_id` int(10) UNSIGNED NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `type`, `content`, `config`, `author_id`, `weight`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(20, 'Số nào là số lớn hơn?', 'SoSanh2HinhAnh', '', NULL, 0, NULL, 1, NULL, '2017-08-28 09:13:36', '2017-08-28 09:13:36'),
(21, 'Số nào là số lớn hơn?', 'SoSanh2HinhAnh', NULL, NULL, 0, NULL, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `source_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `source_id` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `target_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `target_id` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Role is Admin', NULL, '2017-08-24 04:45:57', '2017-08-24 04:45:57'),
(2, 'Editor', 'Role is Editor', NULL, '2017-08-24 04:45:57', '2017-08-24 04:45:57'),
(3, 'Seo', 'Role is Seo', NULL, '2017-08-24 04:45:57', '2017-08-24 04:45:57'),
(4, 'Admin', 'Role is Admin', NULL, '2017-08-24 04:56:44', '2017-08-24 04:56:44'),
(5, 'Editor', 'Role is Editor', NULL, '2017-08-24 04:56:44', '2017-08-24 04:56:44'),
(6, 'Seo', 'Role is Seo', NULL, '2017-08-24 04:56:44', '2017-08-24 04:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `study_history`
--

CREATE TABLE `study_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `lession_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) DEFAULT NULL,
  `current_question` int(11) DEFAULT NULL,
  `completed` int(11) DEFAULT NULL,
  `difficult` int(11) DEFAULT NULL,
  `time_use` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `grade_id`, `author_id`, `status`, `weight`, `title`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, 'Toán lớp 1', 'toan-lop-1', 'Học và làm bài tập Toán lớp 1 Online. Các dạng Toán lớp 1 từ cơ bản đến nâng cao. Bài kiểm tra Toán lớp 1. Ôn tập hè môn Toán với mathplay.vn', NULL, '2017-08-24 05:02:09', '2017-08-24 05:05:28'),
(2, 2, 1, 1, NULL, 'Toán lớp 2', 'toan-lop-2', 'Học và làm bài tập Toán lớp 2 Online. Các dạng Toán lớp 2 từ cơ bản đến nâng cao. Bài kiểm tra Toán lớp 2. Ôn tập hè môn Toán với mathplay.vn', NULL, '2017-08-24 05:02:28', '2017-08-24 05:02:28'),
(3, 3, 1, 1, NULL, 'Toán lớp 3', 'toan-lop-3', 'Học và làm bài tập Toán lớp 3 Online. Các dạng Toán lớp 3 từ cơ bản đến nâng cao. Bài kiểm tra Toán lớp 3. Ôn tập hè môn Toán với mathplay.vn', NULL, '2017-08-24 05:02:50', '2017-08-24 05:02:50'),
(4, 4, 1, 1, NULL, 'Toán lớp 4', 'toan-lop-4', 'Học và làm bài tập Toán lớp 4 Online. Các dạng Toán lớp 4 từ cơ bản đến nâng cao. Bài kiểm tra Toán lớp 4. Ôn tập hè môn Toán với mathplay.vn', NULL, '2017-08-24 05:03:09', '2017-08-24 05:03:09'),
(5, 5, 1, 1, NULL, 'Toán lớp 5', 'toan-lop-5', 'Học và làm bài tập Toán lớp 5 Online. Các dạng Toán lớp 5 từ cơ bản đến nâng cao. Bài kiểm tra Toán lớp 5. Ôn tập hè môn Toán với mathplay.vn', NULL, '2017-08-24 05:03:31', '2017-08-24 05:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 'bell55', 'von.jordon@hotmail.com', '', NULL, NULL, '2017-08-24 04:56:45', '2017-08-24 04:56:45', 1),
(2, 'ycronin', 'wilma.grant@larkin.info', '', NULL, NULL, '2017-08-24 04:56:45', '2017-08-24 04:56:45', 1),
(3, 'elijah.feil', 'christophe37@hegmann.com', '', NULL, NULL, '2017-08-24 04:56:45', '2017-08-24 04:56:45', 1),
(4, 'kulas.favian', 'estrella49@harber.info', '', NULL, NULL, '2017-08-24 04:56:45', '2017-08-24 04:56:45', 1),
(5, 'grady.marcelina', 'frankie.abbott@hickle.org', '', NULL, NULL, '2017-08-24 04:56:45', '2017-08-24 04:56:45', 1),
(6, 'tantan', 'tantanb2@gmail.com', '', NULL, NULL, '2017-08-24 06:49:00', '2017-08-24 06:49:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chapters_slug_unique` (`slug`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`diff_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `file_uri_unique` (`uri`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_slug_unique` (`slug`);

--
-- Indexes for table `lessions`
--
ALTER TABLE `lessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lessions_slug_unique` (`slug`);

--
-- Indexes for table `lession_question`
--
ALTER TABLE `lession_question`
  ADD PRIMARY KEY (`lession_id`,`qid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `menu_mid_parent_url_has_children_p1_p2_p3_p4_p5_index` (`mid`,`parent`,`url`,`has_children`,`p1`,`p2`,`p3`,`p4`,`p5`),
  ADD KEY `menu_parent_index` (`parent`),
  ADD KEY `menu_menu_name_index` (`menu_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD KEY `relations_source_name_source_id_target_name_target_id_index` (`source_name`,`source_id`,`target_name`,`target_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_history`
--
ALTER TABLE `study_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_history_author_index` (`author`),
  ADD KEY `study_history_grade_id_index` (`grade_id`),
  ADD KEY `study_history_subject_id_index` (`subject_id`),
  ADD KEY `study_history_chapter_id_index` (`chapter_id`),
  ADD KEY `study_history_lession_id_index` (`lession_id`),
  ADD KEY `study_history_difficult_index` (`difficult`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `diff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `fid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lessions`
--
ALTER TABLE `lessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `mid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `study_history`
--
ALTER TABLE `study_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
