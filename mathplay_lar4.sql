-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 12:59 PM
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
(1, 1, 'tantanb2@gmail.com', '$2y$10$z8PvIU0SNN52Qt4g253qdOZ7kZjIltnAaoaqCYX8Vseg2ic9BSpa2', 'tantan', 'xC5S4YfDEDSOmze1j27n1Ud0JHmZS8OrFJukgt0wQWNV9NI4k74R61DEDrmm', NULL, '2017-08-24 04:45:57', '2017-09-01 06:52:51', 1);

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
(1, 1, 1, 'Tập đếm và các số tự nhiên', '', 'tap-dem-va-cac-so-tu-nhien', NULL, 1, NULL, '2017-08-24 05:04:52', '2017-08-31 15:44:52'),
(2, 1, 1, 'Phép tính cộng ', '', 'phep-tinh-cong', NULL, 1, NULL, '2017-08-24 05:05:58', '2017-08-31 15:45:26'),
(3, 1, 2, 'Phép tính trừ', '', 'phep-tinh-tru', NULL, 1, NULL, '2017-08-24 05:06:57', '2017-08-31 15:45:49'),
(4, 1, 1, 'Kỹ năng giải bài toán', '', 'ky-nang-giai-bai-toan', NULL, 1, NULL, '2017-08-24 05:09:41', '2017-08-31 15:46:40'),
(5, 1, 1, 'test', 'tsetset', 'test', NULL, 1, '2017-08-31 15:30:32', '2017-08-29 07:11:10', '2017-08-31 15:30:32'),
(6, 1, 1, 'Các biểu thức toán học', '', 'cac-bieu-thuc-toan-hoc', NULL, 1, NULL, '2017-08-31 15:47:32', '2017-08-31 15:47:32'),
(7, 1, 1, 'Phép so sánh', '', 'phep-so-sanh', NULL, 1, NULL, '2017-08-31 15:48:06', '2017-08-31 15:48:06'),
(8, 1, 1, 'Ước lượng', '', 'uoc-luong', NULL, 1, NULL, '2017-08-31 15:48:28', '2017-08-31 15:48:28'),
(9, 1, 1, 'Nhận biết không gian', '', 'nhan-biet-khong-gian', NULL, 1, NULL, '2017-08-31 15:50:03', '2017-08-31 15:50:03'),
(10, 1, 1, 'Tiền tệ', '', 'tien-te', NULL, 1, NULL, '2017-08-31 15:50:28', '2017-08-31 15:50:28'),
(11, 1, 1, 'Thời gian', '', 'thoi-gian', NULL, 1, NULL, '2017-08-31 15:50:46', '2017-08-31 15:50:46');

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
(14, 'Nhiều hơn, ít hơn', 'test 2222', 1, 1, 'nhieu-hon-it-hon', NULL, 0, '2017-08-31 15:21:34', '2017-08-28 09:13:36', '2017-08-31 15:21:34', '{\"number_ques\":\"10\",\"max_score\":\"100\"}'),
(15, 'test câu hỏi', '', 5, 1, 'test-cau-hoi', NULL, 1, '2017-08-31 15:21:39', '2017-08-29 07:15:11', '2017-08-31 15:21:39', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(16, 'test', 'sdf', 2, 1, 'test', NULL, 1, '2017-08-31 15:28:17', '2017-08-31 15:28:05', '2017-08-31 15:28:17', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(17, 'Đếm Các số đến 10', '', 1, 1, 'dem-cac-so-den-10', NULL, 1, NULL, '2017-08-31 15:33:21', '2017-08-31 15:36:44', '{\"number_ques\":\"20\",\"max_score\":\"100\"}'),
(18, 'Đếm các số hàng chục', '', 1, 1, 'dem-cac-so-hang-chuc', NULL, 1, NULL, '2017-08-31 15:54:22', '2017-08-31 15:54:22', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(19, 'Đếm Các số đến 40', '', 1, 1, 'dem-cac-so-den-40', NULL, 1, NULL, '2017-08-31 15:55:47', '2017-08-31 15:55:47', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(20, 'Đếm các số tròn chục', '', 1, 1, 'dem-cac-so-tron-chuc', NULL, 1, NULL, '2017-08-31 15:57:32', '2017-08-31 15:57:32', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(21, 'Dãy số liền kề', '', 1, 1, 'day-so-lien-ke', NULL, 1, NULL, '2017-08-31 15:59:14', '2017-08-31 15:59:14', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(22, 'Bài tập về tia số', '', 1, 1, 'bai-tap-ve-tia-so', NULL, 1, NULL, '2017-08-31 16:00:28', '2017-08-31 16:00:28', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(23, 'Tập đếm tới 100', '', 1, 1, 'tap-dem-toi-100', NULL, 1, NULL, '2017-08-31 16:01:34', '2017-08-31 16:01:34', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(24, 'Đếm các số theo quy luật', '', 1, 1, 'dem-cac-so-theo-quy-luat', NULL, 1, NULL, '2017-08-31 16:02:58', '2017-08-31 16:02:58', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(25, 'Các dãy số theo quy luật', '', 1, 1, 'cac-day-so-theo-quy-luat', NULL, 1, NULL, '2017-08-31 16:03:58', '2017-08-31 16:03:58', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(26, 'Tìm màu sắc', '', 1, 1, 'tim-mau-sac', NULL, 1, NULL, '2017-08-31 16:04:51', '2017-08-31 16:04:51', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(27, 'Phép cộng 1 chữ số', '', 2, 1, 'phep-cong-1-chu-so', NULL, 1, NULL, '2017-08-31 16:05:51', '2017-08-31 16:05:51', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(28, 'Biểu thức phép cộng', '', 2, 1, 'bieu-thuc-phep-cong', NULL, 1, NULL, '2017-08-31 16:08:18', '2017-08-31 16:08:18', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(29, 'Tia số và phép cộng', '', 2, 1, 'tia-so-va-phep-cong', NULL, 1, NULL, '2017-08-31 16:09:30', '2017-08-31 16:09:30', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(30, 'Tính tổng 2 số', '', 2, 1, 'tinh-tong-2-so', NULL, 1, NULL, '2017-08-31 16:10:33', '2017-08-31 16:10:33', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(31, 'Tính chất giao hoán', '', 4, 1, 'tinh-chat-giao-hoan', NULL, 1, NULL, '2017-08-31 16:11:54', '2017-08-31 16:11:54', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(32, 'Biểu thức tính tổng', '', 6, 1, 'bieu-thuc-tinh-tong', NULL, 1, NULL, '2017-08-31 16:13:13', '2017-08-31 16:13:13', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(33, 'Tìm số hạng', '', 6, 1, 'tim-so-hang', NULL, 1, NULL, '2017-08-31 16:14:15', '2017-08-31 16:14:15', '{\"num_question\":\"20\",\"score_limit\":\"100\"}'),
(34, 'Giải bài toán với lời văn', '', 4, 1, 'giai-bai-toan-voi-loi-van', NULL, 1, NULL, '2017-08-31 16:16:14', '2017-08-31 16:16:14', '{\"num_question\":\"20\",\"score_limit\":\"100\"}');

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
(17, 27, '{\"question_start\":\"1\",\"question_end\":\"2\",\"empty\":\"\"}'),
(17, 29, '{\"question_start\":\"2\",\"question_end\":\"3\",\"empty\":\"\"}'),
(18, 32, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(19, 33, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(20, 34, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(21, 35, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(22, 36, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(23, 37, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(24, 38, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(25, 39, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(26, 40, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(27, 41, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(28, 42, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(29, 43, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(30, 44, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(31, 45, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(32, 46, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(33, 47, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}'),
(34, 48, '{\"question_start\":\"\",\"question_end\":\"\",\"empty\":\"\"}');

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
(27, 'Có bao nhiêu hình trong khung bên dưới?', 'DemSoTrongKhung10', '', NULL, 0, NULL, 1, NULL, '2017-08-31 15:33:21', '2017-09-01 07:51:58'),
(29, 'Phải vẽ thêm vào bao nhiêu ô để đầy khung bên dưới?', 'DemSoTrongKhung10', '', NULL, 0, NULL, 1, NULL, '2017-08-31 15:36:44', '2017-09-01 07:51:58'),
(32, 'Điền vào chỗ trống để có biểu thức đúng', 'DienSoHangChucVaDonVi', '', NULL, 0, NULL, 1, NULL, '2017-08-31 15:54:22', '2017-08-31 15:54:22'),
(33, 'Có bao nhiêu chấm tròn trung khung hình?', 'DemSoTrongKhung10', '', NULL, 0, NULL, 1, NULL, '2017-08-31 15:55:47', '2017-08-31 15:55:47'),
(34, 'Có bao nhiêu hình bên dưới', 'DemHangChuc', '', NULL, 0, NULL, 1, NULL, '2017-08-31 15:57:32', '2017-08-31 15:57:32'),
(35, 'Đằng sau số 3 là số mấy?', 'DemSoLonNhoVoiDonVi', '', NULL, 0, NULL, 1, NULL, '2017-08-31 15:59:14', '2017-08-31 15:59:14'),
(36, 'Điền số còn thiếu vào ô trống', 'TimSoTrenTiaSo', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:00:28', '2017-08-31 16:00:28'),
(37, 'Điền số còn thiếu vào ô trống', 'DienSoConThieu100', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:01:34', '2017-08-31 16:01:34'),
(38, 'Mỗi tòa nhà có 4 tầng. Hỏi 6 tòa nhà có bao nhiêu tầng?', 'TimSoTheoQuyLuat', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:02:58', '2017-08-31 16:02:58'),
(39, 'Tìm số còn thiếu trong dãy số sau', 'TimSoTrongDaySoCoQuyLuat', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:03:58', '2017-08-31 16:03:58'),
(40, 'Tìm màu cho ô bên dưới', 'ChonMauSacPhuHop', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:04:51', '2017-08-31 16:04:51'),
(41, 'Tính tổng', 'Cong2HinhAnh', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:05:51', '2017-08-31 16:05:51'),
(42, 'Nhập biểu thức đúng cho phép tính cộng bên dưới', 'DienBieuThuc', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:08:18', '2017-08-31 16:08:18'),
(43, 'Chọn biểu thức đúng cho phép cộng', 'ChonBieuThucVoiTiaSo', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:09:30', '2017-08-31 16:09:30'),
(44, 'Tổng của 2 số dưới đây là bao nhiêu?', 'TinhTongDonGian', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:10:33', '2017-08-31 16:10:33'),
(45, 'Điền biểu thức còn thiếu cho phép tính tổng dưới đây', 'DienBieuThucTinhTongConThieu', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:11:54', '2017-08-31 16:11:54'),
(46, 'Tìm biểu thức đúng cho giá trị dưới đây', 'TimBieuThucCoTongDung', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:13:13', '2017-08-31 16:13:13'),
(47, 'Điền số còn thiếu để được phép tính đúng', 'SoHangConThieu', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:14:15', '2017-08-31 16:14:15'),
(48, 'Bạn Tân có 3 quả cam, bạn Tiến có 4 quả cam. Hỏi 2 bạn có tổng bao nhiêu quả cam?', 'TimDapSoDungVoiCauHoi', '', NULL, 0, NULL, 1, NULL, '2017-08-31 16:16:14', '2017-08-31 16:16:14');

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
(6, 'tantan', 'tantanb2@gmail.com', '$2y$10$z8PvIU0SNN52Qt4g253qdOZ7kZjIltnAaoaqCYX8Vseg2ic9BSpa2', NULL, NULL, '2017-08-24 06:49:00', '2017-08-24 06:49:00', 1),
(7, 'pollich.esperanza', 'feil.van@hotmail.com', '', NULL, NULL, '2017-09-01 07:02:30', '2017-09-01 07:02:30', 1),
(8, 'buckridge.gianni', 'braun.jillian@cartwright.com', '', NULL, NULL, '2017-09-01 07:02:30', '2017-09-01 07:02:30', 1),
(9, 'rmacejkovic', 'veda07@gmail.com', '', NULL, NULL, '2017-09-01 07:02:30', '2017-09-01 07:02:30', 1),
(10, 'ncronin', 'keebler.joshua@armstrong.info', '', NULL, NULL, '2017-09-01 07:02:30', '2017-09-01 07:02:30', 1),
(11, 'rita.johns', 'chanel08@hotmail.com', '', NULL, NULL, '2017-09-01 07:02:31', '2017-09-01 07:02:31', 1),
(12, 'qwiegand', 'pjacobs@yahoo.com', '', NULL, NULL, '2017-09-01 07:03:10', '2017-09-01 07:03:10', 1),
(13, 'qmclaughlin', 'hbode@gmail.com', '', NULL, NULL, '2017-09-01 07:03:11', '2017-09-01 07:03:11', 1),
(14, 'kunze.tobin', 'llewellyn.yundt@yahoo.com', '', NULL, NULL, '2017-09-01 07:03:11', '2017-09-01 07:03:11', 1),
(15, 'dallin.hane', 'luna13@hane.com', '', NULL, NULL, '2017-09-01 07:03:11', '2017-09-01 07:03:11', 1),
(16, 'everette.boehm', 'srussel@johnston.com', '', NULL, NULL, '2017-09-01 07:03:11', '2017-09-01 07:03:11', 1),
(17, 'oreilly.zola', 'katheryn09@kris.info', '', NULL, NULL, '2017-09-01 07:04:14', '2017-09-01 07:04:14', 1);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `mid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
