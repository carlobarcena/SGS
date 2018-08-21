-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2018 at 07:58 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Firstname',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lastname',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email@email.com',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `idcode`, `firstname`, `lastname`, `username`, `email`, `created_at`, `updated_at`) VALUES
(1, 'PENDING', 'Firstname', 'Lastname', 'Carlo', 'email@email.com', '2018-04-16 18:55:12', '2018-04-16 18:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `sectionname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `sectionname`, `created_at`, `updated_at`) VALUES
(1, '1-A', '2018-04-16 18:55:12', '2018-04-16 18:55:12'),
(2, '1-B', '2018-04-16 18:55:12', '2018-04-16 18:55:12'),
(3, '1-C', '2018-04-16 18:55:12', '2018-04-16 18:55:12'),
(4, '1-D', '2018-04-16 18:55:13', '2018-04-16 18:55:13'),
(5, '1-F', '2018-04-16 18:55:13', '2018-04-16 18:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mark_id` int(10) UNSIGNED NOT NULL,
  `mark_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` int(10) UNSIGNED NOT NULL,
  `mark1` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `mark2` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `mark3` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `mark4` double(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `mark_username`, `subject`, `mark1`, `mark2`, `mark3`, `mark4`, `created_at`, `updated_at`) VALUES
(1, 'student1', 1, 80.00, 87.00, 87.00, 88.00, '2018-04-16 20:42:37', '2018-04-16 20:42:37'),
(2, 'student1', 2, 85.00, 90.00, 92.00, 87.00, '2018-04-16 20:42:37', '2018-04-16 20:42:37'),
(3, 'student1', 3, 87.00, 89.00, 85.00, 87.00, '2018-04-16 20:42:37', '2018-04-16 20:42:37'),
(4, 'student1', 4, 78.00, 80.00, 87.00, 89.00, '2018-04-16 20:42:37', '2018-04-16 20:42:37'),
(5, 'student1', 5, 88.00, 85.00, 83.00, 85.00, '2018-04-16 20:42:38', '2018-04-16 20:42:38'),
(6, 'student2', 1, 90.00, 0.00, 0.00, 0.00, '2018-04-16 20:42:53', '2018-04-16 20:42:53'),
(7, 'student2', 2, 80.00, 0.00, 0.00, 0.00, '2018-04-16 20:42:53', '2018-04-16 20:42:53'),
(8, 'student2', 3, 70.00, 0.00, 0.00, 0.00, '2018-04-16 20:42:53', '2018-04-16 20:42:53'),
(9, 'student2', 4, 76.00, 0.00, 0.00, 0.00, '2018-04-16 20:42:53', '2018-04-16 20:42:53'),
(10, 'student2', 5, 85.00, 0.00, 0.00, 0.00, '2018-04-16 20:42:53', '2018-04-16 20:42:53'),
(11, 'student3', 1, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:07', '2018-04-16 20:43:07'),
(12, 'student3', 2, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:07', '2018-04-16 20:43:07'),
(13, 'student3', 3, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:07', '2018-04-16 20:43:07'),
(14, 'student3', 4, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:07', '2018-04-16 20:43:07'),
(15, 'student3', 5, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:07', '2018-04-16 20:43:07'),
(16, 'student4', 1, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:22', '2018-04-16 20:43:22'),
(17, 'student4', 2, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:22', '2018-04-16 20:43:22'),
(18, 'student4', 3, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:22', '2018-04-16 20:43:22'),
(19, 'student4', 4, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:22', '2018-04-16 20:43:22'),
(20, 'student4', 5, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:22', '2018-04-16 20:43:22'),
(21, 'student5', 1, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:36', '2018-04-16 20:43:36'),
(22, 'student5', 2, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:36', '2018-04-16 20:43:36'),
(23, 'student5', 3, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:36', '2018-04-16 20:43:36'),
(24, 'student5', 4, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:36', '2018-04-16 20:43:36'),
(25, 'student5', 5, 0.00, 0.00, 0.00, 0.00, '2018-04-16 20:43:36', '2018-04-16 20:43:36');

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
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2018_04_16_004656_create_teachers_table', 1),
(40, '2018_04_16_004657_create_admins_table', 1),
(41, '2018_04_16_004658_create_subjects_table', 1),
(42, '2018_04_16_004718_create_groups_table', 1),
(43, '2018_04_16_004722_create_students_table', 1),
(44, '2018_04_16_004723_create_subteach_table', 1),
(45, '2018_04_16_004733_create_marks_table', 1);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_idcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Firstname',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LastName',
  `student_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email@email.com',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_idcode`, `firstname`, `lastname`, `student_username`, `email`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'student-0001', 'Firstname', 'LastName', 'student1', 'email@email.com', 1, '2018-04-16 20:42:37', '2018-04-16 20:42:37'),
(2, 'student-0002', 'Firstname', 'LastName', 'student2', 'email@email.com', 2, '2018-04-16 20:42:53', '2018-04-16 20:42:53'),
(3, 'student-0003', 'Firstname', 'LastName', 'student3', 'email@email.com', 3, '2018-04-16 20:43:07', '2018-04-16 20:43:07'),
(4, 'student-0004', 'Firstname', 'LastName', 'student4', 'email@email.com', 4, '2018-04-16 20:43:21', '2018-04-16 20:43:21'),
(5, 'student-0005', 'Firstname', 'LastName', 'student5', 'email@email.com', 5, '2018-04-16 20:43:36', '2018-04-16 20:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Math', '2018-04-16 18:55:13', '2018-04-16 18:55:13'),
(2, 'Science', '2018-04-16 18:55:13', '2018-04-16 18:55:13'),
(3, 'History', '2018-04-16 18:55:13', '2018-04-16 18:55:13'),
(4, 'English', '2018-04-16 18:55:13', '2018-04-16 18:55:13'),
(5, 'Physical Education', '2018-04-16 18:55:13', '2018-04-16 18:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `subteachs`
--

CREATE TABLE `subteachs` (
  `subteach_id` int(10) UNSIGNED NOT NULL,
  `subteach_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subteachs`
--

INSERT INTO `subteachs` (`subteach_id`, `subteach_username`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'teacher1', 1, '2018-04-16 20:41:26', '2018-04-16 20:41:26'),
(2, 'teacher2', 2, '2018-04-16 20:41:41', '2018-04-16 20:41:41'),
(3, 'teacher3', 3, '2018-04-16 20:41:55', '2018-04-16 20:41:55'),
(4, 'teacher4', 4, '2018-04-16 20:42:09', '2018-04-16 20:42:09'),
(5, 'teacher5', 5, '2018-04-16 20:42:22', '2018-04-16 20:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_idcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Firstname',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lastname',
  `teacher_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email@email.com',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_idcode`, `firstname`, `lastname`, `teacher_username`, `email`, `created_at`, `updated_at`) VALUES
(1, 'teacher-0001', 'Firstname', 'Lastname', 'teacher1', 'email@email.com', '2018-04-16 20:41:26', '2018-04-16 20:41:26'),
(2, 'teacher-0002', 'Firstname', 'Lastname', 'teacher2', 'email@email.com', '2018-04-16 20:41:41', '2018-04-16 20:41:41'),
(3, 'teacher-0003', 'Firstname', 'Lastname', 'teacher3', 'email@email.com', '2018-04-16 20:41:55', '2018-04-16 20:41:55'),
(4, 'teacher-0004', 'Firstname', 'Lastname', 'teacher4', 'email@email.com', '2018-04-16 20:42:09', '2018-04-16 20:42:09'),
(5, 'teacher-0005', 'Firstname', 'Lastname', 'teacher5', 'email@email.com', '2018-04-16 20:42:22', '2018-04-16 20:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '12345',
  `role` enum('admin','teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Carlo', '$2y$10$.iY9gH4o/TpwNTS/HRQ84O5GlfUn575iuiKD6aVHlzhyeejyPNo.6', 'admin', 'v94mo568jwikJiTSuKHB8mwQnqUGRCybQXmNn8doNjQHj1aTsJyE6SUeZXkA', '2018-04-16 18:55:12', '2018-04-16 18:55:12'),
(2, 'teacher1', '$2y$10$71lu/.RUCfXr..1cMmHqqOVjwTEyj9fHCEudvjhOm9m2TC1dLhXS.', 'teacher', 'IRNngHgqCrAjDfZPayhqwKwJX7qtZIdWW7XEOpKFpVzTvlw3VwQz4YzzaTfQ', '2018-04-16 20:41:26', '2018-04-16 20:41:26'),
(3, 'teacher2', '$2y$10$vp5SnHOfqW0mIrUroV1QSORQWXk6b7GhcJh6xmH3ynth7b5ygsqG6', 'teacher', 'uVSuZ9LWndYWBIFu1PQNrEfDLBUPfKGgckqLVHoOdD8entsnlYV7xftJ9Ph0', '2018-04-16 20:41:41', '2018-04-16 20:41:41'),
(4, 'teacher3', '$2y$10$m1aV1IZnelabpI1L6Tebnua5trBYTMyzdIQXiKd611.iAIYORo1xW', 'teacher', '7rv0BIaa5L9XtYEGf2lxylOTH68tX4QFhi9UCvxnFj78ytvfbtGIT8IwAH4O', '2018-04-16 20:41:54', '2018-04-16 20:41:54'),
(5, 'teacher4', '$2y$10$OCYv0Ks3F1TybkXrCZ/mkum8JQhTAcQvxPfzLr5jLSXT5NsKSp9si', 'teacher', 'vLRhJZMMtO6Sn0ct07tupKFc8As2P1m64ntWtuHlGyILff18zBvvRGBY0iz6', '2018-04-16 20:42:09', '2018-04-16 20:42:09'),
(6, 'teacher5', '$2y$10$J4NV4jzmrIG6s2OCnvTKceQDUR4I1Orxt7LHliYq01/c8IIn98YKW', 'teacher', 'tdODkEiHaVKPefh4RdYw254QRtcj2JLyOhnyEbupOUUD0lVJSOq7oLMqkXNf', '2018-04-16 20:42:22', '2018-04-16 20:42:22'),
(7, 'student1', '$2y$10$lOlo0j6EqsbY9D54OpucAO3QKRBHe3fSG9LRRxJp2GhYP/m8GFPTe', 'student', 'TSpbZqRcb1njZ2pw7pQikVJ16lEz2VzebhlEkBbHJ6kKJ29CVQ2OHuF13feb', '2018-04-16 20:42:37', '2018-04-16 20:42:37'),
(8, 'student2', '$2y$10$vkk4AdX4XCEKlTIgoB2dm.W4WPgwUBqR.aDY8OD3EREmmq3yFNgKu', 'student', 'x6Bo3cMWKNqh1xWCKLhf1Py98ny1t2vPizgEt7P4CzqJreR809BPG1FOBMYR', '2018-04-16 20:42:53', '2018-04-16 20:42:53'),
(9, 'student3', '$2y$10$s0FMhQwmj3KFCudBNnOhau32Ao8scVBcHCxGEe83cghJK6TkrMYzS', 'student', NULL, '2018-04-16 20:43:07', '2018-04-16 20:43:07'),
(10, 'student4', '$2y$10$N7.8WWqO9EteQ0QVGvUiCu7FYQ3wV9acA4qlQgCIrosTsDUNTfB2m', 'student', NULL, '2018-04-16 20:43:21', '2018-04-16 20:43:21'),
(11, 'student5', '$2y$10$BPqmdrfRLJu/E8VSKqAaY.PWhddduAw53iBi5Wan.BApeg7tv7582', 'student', NULL, '2018-04-16 20:43:36', '2018-04-16 20:43:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`),
  ADD KEY `marks_mark_username_foreign` (`mark_username`),
  ADD KEY `marks_subject_foreign` (`subject`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `students_student_username_unique` (`student_username`),
  ADD KEY `students_group_id_foreign` (`group_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subteachs`
--
ALTER TABLE `subteachs`
  ADD KEY `subteachs_subteach_username_foreign` (`subteach_username`),
  ADD KEY `subteachs_subteach_id_foreign` (`subteach_id`),
  ADD KEY `subteachs_group_id_foreign` (`group_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teachers_teacher_username_unique` (`teacher_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_mark_username_foreign` FOREIGN KEY (`mark_username`) REFERENCES `students` (`student_username`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_subject_foreign` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_student_username_foreign` FOREIGN KEY (`student_username`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `subteachs`
--
ALTER TABLE `subteachs`
  ADD CONSTRAINT `subteachs_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subteachs_subteach_id_foreign` FOREIGN KEY (`subteach_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subteachs_subteach_username_foreign` FOREIGN KEY (`subteach_username`) REFERENCES `teachers` (`teacher_username`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_teacher_username_foreign` FOREIGN KEY (`teacher_username`) REFERENCES `users` (`username`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
