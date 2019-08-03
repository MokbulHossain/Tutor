-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2019 at 06:45 AM
-- Server version: 10.2.26-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shunnoso_tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_qualification`
--

CREATE TABLE `academic_qualification` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `degree_name` varchar(100) NOT NULL,
  `institute` varchar(500) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `passing_year` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_qualification`
--

INSERT INTO `academic_qualification` (`id`, `tutor_id`, `degree_name`, `institute`, `grade`, `passing_year`) VALUES
(3, 2, 'SSC', 'rajshahi high school', '5.00', '2011'),
(23, 1, 'Bsc', 'Daffodil  International University', '3.70', '2017-2019'),
(22, 1, 'SSC', 'nischintopur high school', '4.63', '2011'),
(21, 1, 'HSC', 'bonpara degree collage', '4.00', '2013');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mohim', 'admin@gmail.com', '$2y$10$OQ3wS3JMYIRxymKQI76MYObNGCbidG4v6prPiazT/C0OkU3DUCAAO', '', 0, NULL, NULL),
(6, 'Maruf', 'mokbul15-469@diu.edu.bd', '$2y$10$ekwy8QCfTH70dmn1HPt5PeUPgJzk0IXqGvUYhWvKKmrPJGkmbGB2C', '5678999', 1, '2019-06-11 08:53:15', '2019-06-11 08:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avilabilities`
--

CREATE TABLE `avilabilities` (
  `id` int(11) NOT NULL,
  `tutor_id` bigint(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `avilable_time1` tinyint(4) DEFAULT 0,
  `avilable_time2` tinyint(4) DEFAULT 0,
  `avilable_time3` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avilabilities`
--

INSERT INTO `avilabilities` (`id`, `tutor_id`, `day`, `avilable_time1`, `avilable_time2`, `avilable_time3`) VALUES
(1, 1, 'TUE', 1, 1, 0),
(3, 1, 'SUN', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Completed', 'upcoming', '2019-05-17 04:33:41', '2019-05-17 04:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `category_posts`
--

CREATE TABLE `category_posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_posts`
--

INSERT INTO `category_posts` (`post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-05-17 04:36:03', '2019-05-17 04:36:03'),
(2, 1, '2019-06-09 23:15:29', '2019-06-09 23:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `web_url` varchar(150) DEFAULT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `web_url`, `message`) VALUES
(2, 'sds', 'siamsaif4@gmail.com', '5678999', NULL, 'a'),
(3, 'mohim', 'siamsaif4@gmail.com', '56789', 'http://tutor.shunnosoft.com/tutor_details/1', 'aA');

-- --------------------------------------------------------

--
-- Table structure for table `hires`
--

CREATE TABLE `hires` (
  `id` int(11) NOT NULL,
  `tutor_id` bigint(20) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `review` varchar(1000) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hires`
--

INSERT INTO `hires` (`id`, `tutor_id`, `parent_id`, `student_id`, `status`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 0, 'Accepted', NULL, NULL, '2019-07-10 23:43:01', '2019-07-11 01:07:04'),
(3, 1, 0, 6, 'Pending', NULL, NULL, '2019-07-11 00:02:06', '2019-07-11 00:02:06'),
(4, 1, 0, 6, 'Pending', NULL, NULL, '2019-07-23 14:31:16', '2019-07-23 14:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_02_21_050920_create_posts_table', 1),
(44, '2019_02_21_052333_create_tags_table', 1),
(45, '2019_02_21_052529_create_categories_table', 1),
(46, '2019_02_21_052649_create_category_posts_table', 1),
(47, '2019_02_21_052839_create_post_tags_table', 1),
(48, '2019_02_21_053040_create_admins_table', 1),
(49, '2019_02_21_053353_create_roles_table', 1),
(50, '2019_02_21_053510_create_admin_roles_table', 1),
(51, '2019_06_10_023510_create_permissions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `student_school_name` varchar(100) DEFAULT NULL,
  `lati` double DEFAULT NULL,
  `longi` double DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `name`, `email`, `password`, `phone`, `address`, `student_name`, `student_school_name`, `lati`, `longi`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'parent', 'parent@gmail.com', '$2y$10$UsbvAaNBSSnSZmsEQ5q8OO7GfBBkxn.qvMW9rDZnKy0k8KHgiV94a', '1111111111', 'mirpur-1,D block Dhaka', 'Nurun Nahar Sonia', 'mmmm', NULL, NULL, 'img/parent/1562776606parent@gmail.com.PNG', '2019-06-27 04:01:31', '2019-07-10 23:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `for`, `created_at`, `updated_at`) VALUES
(3, 'post-create', 'post', '2019-06-09 21:56:47', '2019-06-09 22:01:52'),
(4, 'user-create', 'user', '2019-06-09 22:08:56', '2019-06-09 22:08:56'),
(5, 'tag-crud', 'user', '2019-06-09 22:20:33', '2019-06-09 22:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(8, 3),
(8, 4),
(8, 5),
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `dislike` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `slug`, `body`, `status`, `posted_by`, `image`, `like`, `dislike`, `created_at`, `updated_at`) VALUES
(1, 'Business Hours', 'sub titlehg', 'ongoing', '<p>We are Web Developers!</p>', 1, NULL, NULL, NULL, NULL, '2019-05-17 04:36:02', '2019-05-17 04:36:02'),
(2, 'Business Hours', 'let\'s do some development', 'upcoming', '<p>Its a Dummy Post</p>', 1, NULL, NULL, NULL, NULL, '2019-06-09 23:15:29', '2019-06-09 23:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-05-17 04:36:03', '2019-05-17 04:36:03'),
(2, 1, '2019-06-09 23:15:29', '2019-06-09 23:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `qualififations`
--

CREATE TABLE `qualififations` (
  `id` int(11) NOT NULL,
  `tutor_id` bigint(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `qualification_level` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `grade` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualififations`
--

INSERT INTO `qualififations` (`id`, `tutor_id`, `subject`, `qualification_level`, `price`, `grade`) VALUES
(1, 1, 'Bangla', 'A-level (A2)', '38', 3),
(2, 1, 'English', '1st', '20taka/hr', 0),
(3, 1, 'Biology', 'A', '500', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `tutor_id` bigint(20) NOT NULL,
  `question_title` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Editor', '2019-06-09 22:16:49', '2019-06-09 22:16:49'),
(7, 'publisher', '2019-06-09 22:20:56', '2019-06-09 22:20:56'),
(8, 'Ongoing', '2019-06-09 22:27:53', '2019-06-09 22:27:53'),
(9, 'User Creator', '2019-06-09 22:31:21', '2019-06-09 22:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `media_name` varchar(50) NOT NULL,
  `media_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ongoing', 'tryout', '2019-05-17 04:33:57', '2019-05-17 04:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `charge_per_houre` varchar(50) DEFAULT NULL,
  `institute_name` varchar(100) DEFAULT NULL,
  `about` varchar(2000) DEFAULT NULL,
  `about_my_session` varchar(1000) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `lati` double DEFAULT NULL,
  `longi` double DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `name`, `email`, `password`, `charge_per_houre`, `institute_name`, `about`, `about_my_session`, `address`, `lati`, `longi`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Md   Hossain', 'tutor@gmail.com', '$2y$10$YMHkEfXSP96rPR3vS7QuwOT5pA7L00OOfZN4dwe4bcogFcifyNxlC', '£18 - £20 /hr', 'English Literature (Bachelors) - Bristol University', '<p>I am currently a 5th year Medical student at the University of Birmingham. I have also completed a BSc in Medical Biochemistry at the University of Birmingham gaining a 2.1(honours) classification. I am happy to teach biology and human biology at GCSE and A-level and also chemistry and maths up to GCSE level and science and maths for younger years. I also can provide help to students wanting to apply to medicine including reviewing personal statements, providing interview practice and tips and general advice about applications. I am very enthusiastic about my work and take great pride in learning about new subjects and sharing that with others. I always want students to achieve the best they can and provide encouragement and strategies that help students understand material better</p>', '<p>I am currently a 5th year Medical student at the University of Birmingham. I have also completed a BSc in Medical Biochemistry at the University of Birmingham gaining a 2.1(honours) classification. I am happy to teach biology and human biology at GCSE and A-level and also chemistry and maths up to GCSE level and science and maths for younger years. I also can provide help to students wanting to apply to medicine including reviewing personal statements, providing interview practice and tips and general advice about applications. I am very enthusiastic about my work and take great pride in learning about new subjects and sharing that with others. I always want students to achieve the best they can and provide encouragement and strategies that help students understand material better</p>', 'mirpur-1,D block Dhaka', 23.7956, 90.3537, 'img/tutor/1563279122tutor@gmail.com.png', '2019-06-27 05:34:52', '2019-07-16 19:12:02'),
(2, 'Maruf', 'maruf.mahadi1@gmail.com', '$2y$10$E3pg17JVI1OLoFairc18QePZJiUUJz7Owxg/f9tTk4TB/Vv3x9oMO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 22:49:06', '2019-07-04 22:49:06'),
(3, 'Maruf', 'tutor@gmail.com', '$2y$10$vgzqkSiIYGFTzTLJxKNioufEO1ms3NfZkTJjpZ..9BUBWQZlxokBK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 22:51:27', '2019-07-04 22:51:27'),
(4, 'fahim', 'fahim@gmail.com', '$2y$10$s5cGBaedDMLkmcP1Z6ClNu8jOd8/EraxMA/yjNFKFAZiv/nCUvwom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-22 09:59:35', '2019-07-22 09:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lati` double DEFAULT NULL,
  `longi` double DEFAULT NULL,
  `school_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `DOB`, `phone`, `address`, `lati`, `longi`, `school_name`, `school_location`, `parent_name`, `parent_email`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohim', 'niloytahsin5@gmail.com', '$2y$10$/HBJCKKimxvyjLc5pHDv0uKqjLw3lJTMYtAcEV4YQ2ULYcFpmTAe.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-17 04:20:41', '2019-05-17 04:20:41'),
(2, 'jibon', 'hassan15-497@diu.edu.bd', '$2y$10$Cg3XrcrMbsQnKHFK35WSlut2tWjqTJnIVdaMACXUZQq4mPzmn0Kza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-18 11:14:03', '2019-05-18 11:14:03'),
(5, 'mokbul', 'mokbul@gmail.com', '$2y$10$Pe/LXZQtivZYOq4QOU26ae4Igq7keSvYQDlZGAbM9vPHHqIZApaEu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dbtZCPXBAIULh2RedkQdF6WBzXcShQg4t5zKaUaTPabrRp1l87dHhQMH48iL', '2019-06-26 06:08:19', '2019-06-26 06:08:19'),
(6, 'student', 'student@gmail.com', '$2y$10$KA7GlgsRZEESwQFQLEgRwuh5boojmRwLtwkHv2MMb5ySiFOZ4Lqw.', '2019-07-09', '22222222', 'Dhaka', NULL, NULL, 'sdd', 'dd', 'ff', 'ff@gmail.com', 'img/student/1562588608student@gmail.com.jpg', 'FsSsXFQaxz8fUbuDvl8Wt6S0hq0ndWuTCM3IradudvPEy4aPGBNA3mnT20VO', '2019-06-27 05:36:58', '2019-07-08 19:52:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avilabilities`
--
ALTER TABLE `avilabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD KEY `category_posts_post_id_index` (`post_id`),
  ADD KEY `category_posts_category_id_index` (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hires`
--
ALTER TABLE `hires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post_tags_post_id_index` (`post_id`),
  ADD KEY `post_tags_tag_id_index` (`tag_id`);

--
-- Indexes for table `qualififations`
--
ALTER TABLE `qualififations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
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
-- AUTO_INCREMENT for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avilabilities`
--
ALTER TABLE `avilabilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hires`
--
ALTER TABLE `hires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualififations`
--
ALTER TABLE `qualififations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD CONSTRAINT `category_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
