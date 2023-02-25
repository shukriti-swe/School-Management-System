-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2023 at 12:49 PM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_others`
--

CREATE TABLE `admin_others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_others`
--

INSERT INTO `admin_others` (`id`, `setting_name`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'teacher', '<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use kidspreneurship if you do not agree to take all of the terms and conditions stated on this page. updated<br></p>', '2022-06-12 12:19:57', '2022-07-21 09:11:34'),
(2, 'student', '<p>We employ the use of cookies. By accessing kidspreneurship, you agreed to use cookies in agreement with the kidspreneurship\'s Privacy Policy.</p><p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies. updateed</p>', '2022-06-12 12:19:57', '2022-07-21 09:14:40'),
(3, 'school', '<p>Unless otherwise stated, kidspreneurship and/or its licensors own the intellectual property rights for all material on kidspreneurship. All intellectual property rights are reserved. You may access this from kidspreneurship for your own personal use subjected to restrictions set in these terms and conditions. update<br></p>', '2022-06-12 12:19:57', '2022-06-21 14:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `age_groups`
--

CREATE TABLE `age_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_groups`
--

INSERT INTO `age_groups` (`id`, `age`, `creator_id`, `creator`, `created_at`, `updated_at`) VALUES
(2, '7-9 years', 1, 'Super Admin', '2022-07-07 23:35:12', '2022-07-07 23:35:12'),
(3, '10-12 years', 1, 'Super Admin', '2022-07-07 23:35:32', '2022-07-07 23:35:32'),
(4, '13-15 years', 1, 'Super Admin', '2022-07-07 23:35:43', '2022-07-07 23:35:43'),
(5, '16-18 years', 1, 'Super Admin', '2022-07-07 23:35:57', '2022-07-07 23:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `allocation_event`
--

CREATE TABLE `allocation_event` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_color` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocation_event`
--

INSERT INTO `allocation_event` (`id`, `school_id`, `event_name`, `event_date`, `event_color`, `created_at`, `updated_at`) VALUES
(2, 1, 'Movie Watching', '2022-07-27', NULL, '2022-07-03 00:00:00', '2022-07-03 00:00:00'),
(6, 1, 'Makers Session', '2022-07-13', 'rgb(255,215,0)', '2022-07-06 00:00:00', '2022-07-06 00:00:00'),
(8, 1, 'Case Study', '2022-07-11', 'rgb(0, 86, 179)', '2022-07-06 00:00:00', '2022-07-06 00:00:00'),
(9, 9, 'Guest Speaker', '2022-07-14', 'rgb(0,128,0)', '2022-07-07 00:00:00', '2022-07-07 00:00:00'),
(10, 9, 'Makers Session', '2022-07-20', 'rgb(255,215,0)', '2022-07-07 00:00:00', '2022-07-07 00:00:00'),
(11, 1, 'Kid Talk', '2022-07-25', 'rgb(0,128,128)', '2022-07-07 00:00:00', '2022-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `title`, `school_id`, `grade_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'class ten (chapter 3)', 1, 1, 'Please solved this problem as soon as possible', '2022-06-26 10:03:43', '2022-06-26 10:03:43'),
(2, 'class ten (chapter 4)', 1, 1, 'comment', '2022-06-27 09:23:47', '2022-06-27 09:23:47'),
(3, 'class ten (chapter 5)', 2, 2, 'kgjht', '2022-06-27 09:24:23', '2022-06-27 09:24:23'),
(4, 'class ten (chapter 6)', 3, 3, 'fhnh', '2022-06-27 09:24:51', '2022-06-27 09:24:51'),
(5, 'class ten (chapter 7)', 4, 4, 'uiyugj', '2022-06-27 09:25:08', '2022-06-27 09:25:08'),
(6, 'class ten (chapter 8)', 1, 1, 'new ass', '2022-06-27 10:44:49', '2022-06-27 10:44:49'),
(7, 'class ten (chapter 9)', 1, 3, '<p>This is first assignment.</p>', '2022-06-30 13:53:37', '2022-06-30 13:53:37'),
(8, 'class ten (chapter 10)', 1, 1, '<p>This is our second assignment.</p><p>This is our second assignment.</p><hr><p>This is our second assignment.</p><hr><p>This is our second assignment.</p><hr><p>This is our second assignment.</p><hr><p>This is our second assignment.<br></p>', '2022-06-30 14:09:59', '2022-06-30 14:09:59'),
(9, 'class ten (chapter 10)', 1, 1, '<p>hello description</p>', '2022-07-02 05:01:19', '2022-07-02 05:01:19'),
(10, 'class ten (chapter 11)', 1, 1, '<p>ghgh</p>', '2022-07-02 05:03:26', '2022-07-02 05:03:26'),
(11, 'class ten (chapter 12)', 7, 2, '<p>good good</p>', '2022-07-02 06:04:15', '2022-07-02 06:04:15'),
(12, 'class ten (chapter 13)', 12, 3, '<p>jtujkt&nbsp; u ytu</p>', '2022-07-02 06:05:04', '2022-07-02 06:05:04'),
(13, 'hello test6', 1, 1, '<p>yedrte</p>', '2022-07-07 18:34:47', '2022-07-07 18:34:47'),
(14, 'hello test3212', 1, 1, 'fdgdftgd', '2022-07-07 18:36:10', '2022-07-07 18:36:10'),
(15, 'New assignment for test', 1, 1, '<p>yhghghg</p>', '2022-07-07 23:20:57', '2022-07-07 23:20:57'),
(16, 'hello bd', 1, 1, '<p>gerdsfvsd</p>', '2022-07-07 23:21:52', '2022-07-07 23:21:52'),
(17, 'LBS Internation Title', 9, 7, '<p>sdfasdfasdf</p>', '2022-07-07 23:25:57', '2022-07-07 23:25:57'),
(18, 'July 8th Assignment', 9, 7, '<p>Let\'s see which students can see this assignment. All the best</p>', '2022-07-08 14:23:42', '2022-07-08 14:23:42'),
(19, '2nd assignment for July 8th', 9, 7, 'Akkad bakkad bamme bo', '2022-07-08 14:25:38', '2022-07-08 14:25:38'),
(20, 'This is a Testing assignement', 1, 6, 'I want to learn how this assignment works ?', '2022-07-19 10:59:36', '2022-07-19 10:59:36'),
(21, 'This is a Testing assignement', 9, 7, '<p>sahckwdjejvoejvdmxm&nbsp; wduwehn,c , wfkweufkiwj</p>', '2022-07-19 11:06:45', '2022-07-19 11:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentsfiles`
--

CREATE TABLE `assignmentsfiles` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignmentsfiles`
--

INSERT INTO `assignmentsfiles` (`id`, `assignment_id`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 1, 'image/assignment/assignment_oZLUvAgI5q.png', '2022-06-26 10:03:43', '2022-06-26 10:03:43'),
(2, 1, 'image/assignment/assignment_lrOXum5g5G.png', '2022-06-26 10:03:43', '2022-06-26 10:03:43'),
(3, 1, 'image/assignment/assignment_fXGN5PxxyO.png', '2022-06-26 10:03:43', '2022-06-26 10:03:43'),
(4, 1, 'image/assignment/assignment_zSmZJAZ8xI.png', '2022-06-26 10:03:43', '2022-06-26 10:03:43'),
(5, 13, 'image/assignment/assignment_Zsz2Ki1FZ0.docx', '2022-07-07 18:34:47', '2022-07-07 18:34:47'),
(6, 14, 'image/assignment/assignment_J1LCBnaeeo.docx', '2022-07-07 18:36:10', '2022-07-07 18:36:10'),
(7, 15, 'image/assignment/assignment_UmYPWLKMFV.docx', '2022-07-07 23:20:57', '2022-07-07 23:20:57'),
(8, 16, 'image/assignment/assignment_LziDob3xpm.docx', '2022-07-07 23:21:52', '2022-07-07 23:21:52'),
(9, 17, 'image/assignment/assignment_ulUcWUiWZr.jpg', '2022-07-07 23:25:57', '2022-07-07 23:25:57'),
(10, 18, 'image/assignment/assignment_U5mdfQvKJL.doc', '2022-07-08 14:23:42', '2022-07-08 14:23:42'),
(11, 20, 'image/assignment/assignment_JueyyHBDJF.png', '2022-07-19 10:59:36', '2022-07-19 10:59:36'),
(12, 21, 'image/assignment/assignment_dWpMNQhLyQ.png', '2022-07-19 11:06:45', '2022-07-19 11:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_comment`
--

CREATE TABLE `assignment_comment` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_comment`
--

INSERT INTO `assignment_comment` (`id`, `assignment_id`, `reciever_id`, `sender_id`, `message`, `created_at`, `updated_at`) VALUES
(43, 2, 5, 1, 'aa', '2022-07-03 04:51:47', '2022-07-03 04:51:47'),
(44, 2, 12, 1, 'aa', '2022-07-03 04:59:57', '2022-07-03 04:59:57'),
(45, 2, 1, 12, 'bb', '2022-07-03 04:59:57', '2022-07-03 04:59:57'),
(46, 2, 12, 1, 'cc', '2022-07-03 04:59:57', '2022-07-03 04:59:57'),
(47, 2, 1, 12, 'dd', '2022-07-03 04:59:57', '2022-07-03 04:59:57'),
(48, 2, 1, 12, 'zzzzzzzzzzzz', '2022-07-03 09:50:34', '2022-07-03 09:50:34'),
(49, 2, 1, 12, 'zzzzz', '2022-07-03 09:55:37', '2022-07-03 09:55:37'),
(50, 2, 1, 12, 'hello voldimir rafi da', '2022-07-03 09:57:17', '2022-07-03 09:57:17'),
(51, 2, 1, 12, 'dfdfc', '2022-07-03 09:57:44', '2022-07-03 09:57:44'),
(52, 2, 12, 1, 'vv', '2022-07-03 13:31:53', '2022-07-03 13:31:53'),
(53, 2, 12, 1, 'nn', '2022-07-03 13:32:15', '2022-07-03 13:32:15'),
(54, 2, 12, 1, 'mm', '2022-07-03 13:32:51', '2022-07-03 13:32:51'),
(55, 2, 12, 1, 'xcvxvcb', '2022-07-03 13:34:35', '2022-07-03 13:34:35'),
(56, 2, 12, 1, 'hh', '2022-07-03 13:35:15', '2022-07-03 13:35:15'),
(57, 2, 12, 1, 't', '2022-07-03 13:37:07', '2022-07-03 13:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_details`
--

CREATE TABLE `assignment_details` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `read_status` tinyint(2) DEFAULT NULL,
  `comment_status` tinyint(2) DEFAULT NULL COMMENT 'complete = 1, uncomplete = 2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_details`
--

INSERT INTO `assignment_details` (`id`, `student_id`, `assignment_id`, `read_status`, `comment_status`, `created_at`, `updated_at`) VALUES
(12, 102, 10, 1, 1, '2022-07-07 21:56:03', '2022-07-07 21:56:05'),
(13, 102, 6, 1, 1, '2022-07-07 21:56:38', '2022-07-07 21:56:38'),
(14, 117, 17, 1, 1, '2022-07-07 23:51:05', '2022-07-07 23:53:09'),
(15, 117, 19, 1, 1, '2022-07-08 14:27:50', '2022-07-19 06:23:14'),
(16, 117, 18, 1, 1, '2022-07-19 06:23:15', '2022-07-19 06:23:16'),
(17, 93, 18, 1, 1, '2022-07-19 06:23:15', '2022-07-19 06:23:16'),
(18, 5, 1, 1, 1, '2022-07-19 06:23:15', '2022-07-21 14:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`id`, `school_id`, `day`, `grade`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(28, 5, '6', NULL, '10:00', '12:00', '2022-06-30 00:00:00', '2022-06-30 00:00:00'),
(29, 5, '1', NULL, '11:00', '12:00', '2022-06-30 00:00:00', '2022-06-30 00:00:00'),
(30, 5, '2', NULL, '15:00', '16:00', '2022-06-30 00:00:00', '2022-06-30 00:00:00'),
(31, 5, '3', NULL, '16:00', '17:00', '2022-06-30 00:00:00', '2022-06-30 00:00:00'),
(98, 7, '6', NULL, '08:00', '09:00', '2022-07-06 00:00:00', '2022-07-06 00:00:00'),
(110, 23, '1', NULL, '10:00', '11:00', '2022-07-12 08:44:45', '2022-07-12 08:44:45'),
(111, 23, '1', NULL, '11:00', '12:00', '2022-07-12 08:44:45', '2022-07-12 08:44:45'),
(133, 1, '5', 1, '10:00', '11:00', '2022-07-16 10:37:54', '2022-07-16 10:37:54'),
(134, 1, '5', 1, '11:00', '12:00', '2022-07-16 10:37:54', '2022-07-16 10:37:54'),
(135, 1, '2', 2, '11:00', '12:00', '2022-07-16 10:37:54', '2022-07-16 10:37:54'),
(136, 1, '1', 3, '08:05', '10:05', '2022-07-16 10:37:54', '2022-07-16 10:37:54'),
(137, 1, '4', 4, '09:00', '11:00', '2022-07-16 10:37:54', '2022-07-16 10:37:54'),
(153, 9, '1', 7, '10:00', '11:00', '2022-07-26 08:19:16', '2022-07-26 08:19:16'),
(154, 9, '1', 8, '11:00', '12:00', '2022-07-26 08:19:16', '2022-07-26 08:19:16'),
(155, 9, '2', 6, '11:00', '12:00', '2022-07-26 08:19:16', '2022-07-26 08:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `commentable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `ageGroup_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `video_status` int(11) DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worksheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learning_object` text COLLATE utf8mb4_unicode_ci,
  `outcome_session` text COLLATE utf8mb4_unicode_ci,
  `question_access_knowledge` text COLLATE utf8mb4_unicode_ci,
  `introduce_topic_student` text COLLATE utf8mb4_unicode_ci,
  `related_activity_one` text COLLATE utf8mb4_unicode_ci,
  `related_activity_two` text COLLATE utf8mb4_unicode_ci,
  `vocabulary` text COLLATE utf8mb4_unicode_ci,
  `tips_of_parents` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `description`, `ageGroup_id`, `stream_id`, `trainer_id`, `video_status`, `video`, `worksheet`, `learning_object`, `outcome_session`, `question_access_knowledge`, `introduce_topic_student`, `related_activity_one`, `related_activity_two`, `vocabulary`, `tips_of_parents`, `created_at`, `updated_at`) VALUES
(1, 'seassion nul', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">hello frndssssssssssssssssssss</font></p>', 2, 2, 1, 1, '2219339.jpg', 'weaver-basket-rattan-Malaysia.jpg', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Hello frnds</font></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">Hello frnds1</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">Hello frnds2</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">Hello frnds3</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">Hello frnd4</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">Hello frnd5</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">Hello frnd6</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">Hello frnds7</span><br></p>', '2022-06-23 22:38:55', '2022-07-18 13:06:12'),
(2, 'jlkhyhn', '<p>sttihkbhthmvhg</p>', 3, 3, 1, 1, '173475800_458657715215749_3548517102131010374_n (1).mp4', 'file-sample_100kB.doc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-24 20:32:45', '2022-07-07 23:40:48'),
(3, 'account', '<p>&nbsp; v teg te</p>', 3, 4, NULL, NULL, '173475800_458657715215749_3548517102131010374_n (1).mp4', 'aaa.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-14 09:43:31', '2022-07-14 09:43:31'),
(4, 'My test', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">here&nbsp; is good</font></p><p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">good is good</font></p><p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">not good</font></p><p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">very happy</font></p>', 3, 4, NULL, NULL, '1653479228106.mp4', 'task3.zip', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-14 09:53:00', '2022-07-14 10:04:39'),
(5, 'Test', NULL, 2, 2, NULL, NULL, 'istockphoto-1257442559-640_adpp_is.mp4', 'confusion add content.docx', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">This is one</font></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">This is two</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">This is three</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">This is four</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">This is five</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">This is six</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">This is seven</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(255, 255, 0);\">This is eight</span><br></p>', '2022-07-18 12:53:03', '2022-07-18 12:53:03'),
(6, 'Content Test', NULL, 5, 5, NULL, NULL, 'istockphoto-1257442559-640_adpp_is.mp4', 'confusion  student progress (1).docx', '<p><font color=\"#000000\" style=\"background-color: rgb(107, 165, 74);\">Testings new</font></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(107, 165, 74);\">Testings1</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(107, 165, 74);\">Testings2</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(107, 165, 74);\">Testings3</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(107, 165, 74);\">Testings4</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(107, 165, 74);\">Testings5</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(107, 165, 74);\">Testings6</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); background-color: rgb(107, 165, 74);\">Testings7</span><br></p>', '2022-07-18 17:11:30', '2022-07-18 17:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_description` text COLLATE utf8mb4_unicode_ci,
  `group` int(11) DEFAULT NULL COMMENT 'Admin=1,School=2,Trainer=3,Student=4\r\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`id`, `name`, `mail_address`, `mail_description`, `group`, `created_at`, `updated_at`) VALUES
(1, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'Trainer Name: Shukriti Ranjan Das<br>Your Username: shukriti@sahajjo.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-06-23 21:06:02', '2022-06-23 21:06:02'),
(2, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 3, '2022-06-23 21:15:42', '2022-06-23 21:15:42'),
(3, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: nazmul@sahajjo.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-06-23 21:16:07', '2022-06-23 21:16:07'),
(4, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 3, '2022-06-23 21:16:11', '2022-06-23 21:16:11'),
(5, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'Trainer Name: Shukriti Ranjan Das<br>Your Username: shukriti@sahajjo.com<br>Your Password: 123456<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/login\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-06-23 21:18:50', '2022-06-23 21:18:50'),
(6, 'rafi', 'ajaxrafi@sahajjo.com', 'Trainer Name: rafi<br>Your Username: ajaxrafi@sahajjo.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'http://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-06-23 21:23:21', '2022-06-23 21:23:21'),
(7, 'National ideal', 'nazmul@sahajjo.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 2, '2022-06-23 21:27:41', '2022-06-23 21:27:41'),
(8, 'National ideal', 'nazmul@sahajjo.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 2, '2022-06-23 21:27:57', '2022-06-23 21:27:57'),
(9, 'Mamun Hossain Student', 'pyqtdsxbuwjucmutex@bvhrk.com', 'Student Name: Mamun Hossain Student<br>Student Username: pyqtdsxbuwjucmutex@bvhrk.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 21:33:33', '2022-06-23 21:33:33'),
(10, 'Rahim Mia Student', 'wxtmniqdwhzjbcpndx@kvhrs.com', 'Student Name: Rahim Mia Student<br>Student Username: wxtmniqdwhzjbcpndx@kvhrs.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 21:33:33', '2022-06-23 21:33:33'),
(11, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-23 21:37:11', '2022-06-23 21:37:11'),
(12, 'Mamun Hossain Student', 'pyqtdsxbuwjucmutex@bvhrk.com', 'Student Name: Mamun Hossain Student<br>Student Username: pyqtdsxbuwjucmutex@bvhrk.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 22:11:33', '2022-06-23 22:11:33'),
(13, 'Rahim Mia Student', 'wxtmniqdwhzjbcpndx@kvhrs.com', 'Student Name: Rahim Mia Student<br>Student Username: wxtmniqdwhzjbcpndx@kvhrs.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 22:11:34', '2022-06-23 22:11:34'),
(14, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-23 22:11:34', '2022-06-23 22:11:34'),
(15, 'Rafi Student', 'kugpvasdhzkmobawtn@bvhrk.com', 'Student Name: Rafi Student<br>Student Username: kugpvasdhzkmobawtn@bvhrk.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 22:35:09', '2022-06-23 22:35:09'),
(16, 'Shukriti Student', 'pjxxumsuulkwhcijzb@nvhrw.com', 'Student Name: Shukriti Student<br>Student Username: pjxxumsuulkwhcijzb@nvhrw.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 22:35:10', '2022-06-23 22:35:10'),
(17, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-23 22:35:10', '2022-06-23 22:35:10'),
(18, 'National ideal', 'nazmul@sahajjo.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 2, '2022-06-23 22:47:34', '2022-06-23 22:47:34'),
(19, 'National ideal', 'nazmul@sahajjo.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 2, '2022-06-23 22:47:41', '2022-06-23 22:47:41'),
(20, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 3, '2022-06-23 22:47:50', '2022-06-23 22:47:50'),
(21, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 3, '2022-06-23 22:47:55', '2022-06-23 22:47:55'),
(22, 'Rafi Student', 'student@sahajjo.com', 'Student Name: Rafi Student<br>Student Username: student@sahajjo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'http://schoolmanagement.com/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 13:59:15', '2022-06-23 13:59:15'),
(23, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-23 13:59:15', '2022-06-23 13:59:15'),
(24, 'Rafi Student', 'student2@sahajjo.com', 'Student Name: Rafi Student<br>Student Username: student2@sahajjo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'http://schoolmanagement.com/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-23 14:14:54', '2022-06-23 14:14:54'),
(25, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-23 14:14:54', '2022-06-23 14:14:54'),
(26, 'Rafi Student', 'lhkxbuttkmovcgbgjz@kvhrw.com', 'Student Name: Rafi Student<br>Student Username: lhkxbuttkmovcgbgjz@kvhrw.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-24 00:26:00', '2022-06-24 00:26:00'),
(27, 'Shukriti Student', 'bnuzbzknxvtdegwsnd@kvhrr.com', 'Student Name: Shukriti Student<br>Student Username: bnuzbzknxvtdegwsnd@kvhrr.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-24 00:26:01', '2022-06-24 00:26:01'),
(28, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-24 00:26:01', '2022-06-24 00:26:01'),
(29, 'Rafi Student', 'afiqur@sahajjo.com', 'Student Name: Rafi Student<br>Student Username: afiqur@sahajjo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-24 00:32:59', '2022-06-24 00:32:59'),
(30, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-24 00:32:59', '2022-06-24 00:32:59'),
(31, 'hjhjhjhjhj', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: xeheg71348@runqx.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-06-24 16:29:02', '2022-06-24 16:29:02'),
(32, 'hjhjhjhjhj', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi hjhjhjhjhj</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-24 17:24:31', '2022-06-24 17:24:31'),
(33, 'hjhjhjhjhj', 'xeheg71348@runqx.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 2, '2022-06-24 17:26:05', '2022-06-24 17:26:05'),
(34, 'hjhjhjhjhj', 'xeheg71348@runqx.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 2, '2022-06-24 17:26:16', '2022-06-24 17:26:16'),
(35, 'Trainer 05', 'xaniv50587@runqx.com', 'Trainer Name: Trainer 05<br>Your Username: xaniv50587@runqx.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-06-24 17:27:21', '2022-06-24 17:27:21'),
(36, 'Trainer 05', 'xaniv50587@runqx.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 3, '2022-06-24 17:30:00', '2022-06-24 17:30:00'),
(37, 'Trainer 05', 'xaniv50587@runqx.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 3, '2022-06-24 17:30:23', '2022-06-24 17:30:23'),
(38, 'zcsdvfasc', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: cowono2551@serosin.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-06-24 20:21:37', '2022-06-24 20:21:37'),
(39, 'mkhugjbu', 'coxeye9925@exoacre.com', 'Trainer Name: mkhugjbu<br>Your Username: coxeye9925@exoacre.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-06-24 20:23:06', '2022-06-24 20:23:06'),
(40, 'zcsdvfasc', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi zcsdvfasc</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-24 20:29:45', '2022-06-24 20:29:45'),
(41, 'Rafi Student', 'womjixsonffntshwqv@kvhrs.com', 'Student Name: Rafi Student<br>Student Username: womjixsonffntshwqv@kvhrs.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-25 16:03:52', '2022-06-25 16:03:52'),
(42, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-25 16:03:52', '2022-06-25 16:03:52'),
(43, 'Rafi Student', 'gxoejykfcxxbapkrjl@bvhrs.com', 'Student Name: Rafi Student<br>Student Username: gxoejykfcxxbapkrjl@bvhrs.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-25 16:14:14', '2022-06-25 16:14:14'),
(44, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-25 16:14:14', '2022-06-25 16:14:14'),
(45, 'asdfasdf', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: asdfsdf@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-06-26 00:03:22', '2022-06-26 00:03:22'),
(46, 'asdfasdf', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi asdfasdf</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-26 00:06:14', '2022-06-26 00:06:14'),
(47, 'asdfasdf', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi asdfasdf</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-26 00:07:33', '2022-06-26 00:07:33'),
(48, 'Rafi Student', 'afiqur5@sahajjo.com', 'Student Name: Rafi Student<br>Student Username: afiqur5@sahajjo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-06-26 00:25:12', '2022-06-26 00:25:12'),
(49, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-06-26 00:25:12', '2022-06-26 00:25:12'),
(50, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 00:50:00', '2022-07-06 00:50:00'),
(51, 'bonosriAkbor', 'akbor@gmail.com', 'Trainer Name: bonosriAkbor<br>Your Username: akbor@gmail.com<br>Your Password: 123456<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/login\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-06 15:04:48', '2022-07-06 15:04:48'),
(52, 'Test Trainer', 'afiqur+6@sahajjo.com', 'Trainer Name: Test Trainer<br>Your Username: afiqur+6@sahajjo.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-06 15:29:31', '2022-07-06 15:29:31'),
(53, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 16:29:14', '2022-07-06 16:29:14'),
(54, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 16:29:42', '2022-07-06 16:29:42'),
(55, 'Trainer 5', 'afiqur+11@sahajjo.com', 'Trainer Name: Trainer 5<br>Your Username: afiqur+11@sahajjo.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-06 16:51:54', '2022-07-06 16:51:54'),
(56, 'Test school', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: afiqur+12@sahajjo.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-06 16:56:34', '2022-07-06 16:56:34'),
(57, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'Trainer Name: Shukriti Ranjan Das<br>Your Username: shukriti@sahajjo.com<br>Your Password: 123456<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/login\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-06 17:27:56', '2022-07-06 17:27:56'),
(58, 'National ideal', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideal</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 19:18:19', '2022-07-06 19:18:19'),
(59, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 19:22:20', '2022-07-06 19:22:20'),
(60, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: roweg90454@hekarro.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-06 22:15:40', '2022-07-06 22:15:40'),
(61, 'Anshika singh', 'wadij43188@lankew.com', 'Student Name: Anshika singh<br>Student Username: wadij43188@lankew.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-06 22:19:39', '2022-07-06 22:19:39'),
(62, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:24:46', '2022-07-06 22:24:46'),
(63, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:43:16', '2022-07-06 22:43:16'),
(64, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:43:39', '2022-07-06 22:43:39'),
(65, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:44:37', '2022-07-06 22:44:37'),
(66, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:46:19', '2022-07-06 22:46:19'),
(67, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:46:56', '2022-07-06 22:46:56'),
(68, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:48:20', '2022-07-06 22:48:20'),
(69, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 22:49:38', '2022-07-06 22:49:38'),
(70, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 23:01:12', '2022-07-06 23:01:12'),
(71, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 23:16:51', '2022-07-06 23:16:51'),
(72, 'Rafi Student', 'afiqur88888@sahajjo.com', 'Student Name: Rafi Student<br>Student Username: afiqur88888@sahajjo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-06 23:17:48', '2022-07-06 23:17:48'),
(73, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 23:17:48', '2022-07-06 23:17:48'),
(74, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 23:19:54', '2022-07-06 23:19:54'),
(75, 'National academy', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National academy</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-06 23:22:07', '2022-07-06 23:22:07'),
(76, 'Central school', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: markevil07@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-07 14:53:24', '2022-07-07 14:53:24'),
(77, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: officialbentic@yahoo.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-07 15:13:45', '2022-07-07 15:13:45'),
(78, 'Grace murphy', 'gracemurphy321@yahoo.com', 'Trainer Name: Grace murphy<br>Your Username: gracemurphy321@yahoo.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-07 15:18:02', '2022-07-07 15:18:02'),
(79, 'Alfie soloman', 'alfiesolomon391@yahoo.com', 'Student Name: Alfie soloman<br>Student Username: alfiesolomon391@yahoo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-07 15:28:41', '2022-07-07 15:28:41'),
(80, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-07 15:28:42', '2022-07-07 15:28:42'),
(81, 'National school and college', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: nazmulsahajjo@yahoo.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-07 15:51:36', '2022-07-07 15:51:36'),
(82, 'National school and colleges', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: nazmul+1@sahajjo.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-07 15:52:49', '2022-07-07 15:52:49'),
(83, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-07 16:02:59', '2022-07-07 16:02:59'),
(84, 'National ideals', 'nazmul@sahajjo.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 2, '2022-07-08 12:45:32', '2022-07-08 12:45:32'),
(85, 'David mosley', 'mosleyofficial1@gmail.com', 'Student Name: David mosley<br>Student Username: mosleyofficial1@gmail.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-08 13:54:45', '2022-07-08 13:54:45'),
(86, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-08 13:54:46', '2022-07-08 13:54:46'),
(87, 'David mosley', 'poposi6934@meidir.com', 'Student Name: David mosley<br>Student Username: poposi6934@meidir.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://aptest.therssoftware.com/kidsinterpreneurship/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-08 14:01:17', '2022-07-08 14:01:17'),
(88, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-08 14:01:18', '2022-07-08 14:01:18'),
(89, 'Kidspreneurship', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: swati@kidspreneurship.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-08 14:30:48', '2022-07-08 14:30:48'),
(90, 'New National school and college', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: amtsrivastava007@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-08 15:40:06', '2022-07-08 15:40:06'),
(91, 'National school and college new', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: amtsrivastava007@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-08 15:44:46', '2022-07-08 15:44:46'),
(92, 'New National school and college', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: amtsrivastava007@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-08 15:51:17', '2022-07-08 15:51:17'),
(93, 'New National ideals bangladesh', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: amtsrivastava007@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-08 16:04:53', '2022-07-08 16:04:53'),
(94, 'Another', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: robelsust+52@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-09 08:14:47', '2022-07-09 08:14:47'),
(95, 'G D Goenka', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: jacobsmithtemp@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-11 10:18:01', '2022-07-11 10:18:01'),
(96, 'G D Goenka', 'jacobsmithtemp@gmail.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 2, '2022-07-11 10:23:42', '2022-07-11 10:23:42'),
(97, 'G D Goenka', 'jacobsmithtemp@gmail.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 2, '2022-07-11 10:24:00', '2022-07-11 10:24:00'),
(98, 'G D Goenka', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi G D Goenka</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-11 13:05:00', '2022-07-11 13:05:00'),
(99, 'William Bentic', 'officialbentic@gmail.com', 'Student Name: William Bentic<br>Student Username: officialbentic@gmail.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-11 13:11:27', '2022-07-11 13:11:27'),
(100, 'G D Goenka', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi G D Goenka</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-11 13:11:30', '2022-07-11 13:11:30'),
(101, 'Test School', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: robelsust+52@gmail.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-11 23:52:03', '2022-07-11 23:52:03');
INSERT INTO `email_info` (`id`, `name`, `mail_address`, `mail_description`, `group`, `created_at`, `updated_at`) VALUES
(102, 'Test School', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi Test School</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-11 23:56:25', '2022-07-11 23:56:25'),
(103, 'Test School', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi Test School</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-11 23:56:46', '2022-07-11 23:56:46'),
(104, 'Rafi Student', 'robelsust+55@gmail.com', 'Student Name: Rafi Student<br>Student Username: robelsust+55@gmail.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-11 23:57:22', '2022-07-11 23:57:22'),
(105, 'Test School', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi Test School</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-11 23:57:26', '2022-07-11 23:57:26'),
(106, 'Thomas ', 'sheltommy673@gmail.com', 'Student Name: Thomas <br>Student Username: sheltommy673@gmail.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-12 08:41:13', '2022-07-12 08:41:13'),
(107, 'G D Goenka', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi G D Goenka</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-12 08:41:17', '2022-07-12 08:41:17'),
(108, 'G D Goenka', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi G D Goenka</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-12 08:44:50', '2022-07-12 08:44:50'),
(109, 'Grace murphy', 'gracemurphy321@yahoo.com', 'Please contact Kidspreneurship administrator <br>Thanks <br> Kidspreneurship', 3, '2022-07-12 08:57:52', '2022-07-12 08:57:52'),
(110, 'Grace murphy', 'gracemurphy321@yahoo.com', 'Welcome To Kidspreneurship <br>Thanks <br> Kidspreneurship', 3, '2022-07-12 08:58:17', '2022-07-12 08:58:17'),
(111, 'Nihar Trainer test', 'robelsust+59@gmail.com', 'Trainer Name: Nihar Trainer test<br>Your Username: robelsust+59@gmail.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-12 21:10:43', '2022-07-12 21:10:43'),
(112, 'Nihar Trainer test', 'robelsust+59@gmail.com', 'Trainer Name: Nihar Trainer test<br>Your Username: robelsust+59@gmail.com<br>Your Password: 123456<br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/login\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-12 21:11:58', '2022-07-12 21:11:58'),
(113, 'Rs it', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: nazmul+1@sahajjo.com<br>\r\nPassword: school\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 2, '2022-07-14 08:22:50', '2022-07-14 08:22:50'),
(114, 'Shukriti SWE', 'shukriti+1@sahajjo.com', 'Trainer Name: Shukriti SWE<br>Your Username: shukriti+1@sahajjo.com<br>Your Password: trainer<br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 3, '2022-07-14 08:27:10', '2022-07-14 08:27:10'),
(115, 'Anthony Gomes', 'shukriti+2@sahajjo.com', 'Student Name: Anthony Gomes<br>Student Username: shukriti+2@sahajjo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/admin/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-14 08:40:22', '2022-07-14 08:40:22'),
(116, 'Rampura', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi Rampura</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-14 08:40:25', '2022-07-14 08:40:25'),
(117, 'Limia jones', 'shukriti+4@sahajjo.com', 'Student Name: Limia jones<br>Student Username: shukriti+4@sahajjo.com<br>Student Password: student <br>Please login your dashboard by clicking this link <a href=\'https://q-study.com/kids/public/school/dashboard\'>click here</a> <br>Thanks <br> Kidspreneurship', 4, '2022-07-14 09:06:45', '2022-07-14 09:06:45'),
(118, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-14 09:06:49', '2022-07-14 09:06:49'),
(119, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-14 12:17:58', '2022-07-14 12:17:58'),
(120, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-14 12:24:39', '2022-07-14 12:24:39'),
(121, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-14 12:24:51', '2022-07-14 12:24:51'),
(122, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-14 14:28:14', '2022-07-14 14:28:14'),
(123, 'National ideals', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi National ideals</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-16 10:37:56', '2022-07-16 10:37:56'),
(124, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-25 10:46:21', '2022-07-25 10:46:21'),
(125, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-25 10:51:23', '2022-07-25 10:51:23'),
(126, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-25 13:44:56', '2022-07-25 13:44:56'),
(127, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-25 13:57:53', '2022-07-25 13:57:53'),
(128, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-26 08:17:30', '2022-07-26 08:17:30'),
(129, 'LBS International', NULL, '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi LBS International</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by Super admin. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\nkidspreneurship \r\n</p>                                          ', 2, '2022-07-26 08:19:20', '2022-07-26 08:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `email_notifications`
--

CREATE TABLE `email_notifications` (
  `id` int(11) NOT NULL,
  `mail_sub` text,
  `mail_body` text,
  `mail_tags` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_notifications`
--

INSERT INTO `email_notifications` (`id`, `mail_sub`, `mail_body`, `mail_tags`) VALUES
(1, 'New School create ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear School Administrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: {email}<br>\r\nPassword: {pass}\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url'),
(2, 'Password reset link provided by {app_name}', '                               \r\n          <p>Hi {receiver_name}</p>\r\n\r\n          <p>Your request for reset password has been approved from {app_name}. Press the button below to reset the password.</p>\r\n          <p><a href=\"{link}\" class=\"btn btn-primary btn-sm\">Reset Password</a></p>\r\n          <p>We are highly expecting you as soon as possible. Hope you\'ll join us.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                   ', 'app_name,app_logo,receiver_name,reset_password_url'),
(3, 'You have been invited to join {app_name} by {action_by}', '                                    <p><img src=\"http://property_final2.com/uploads/empty_image.jpg\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\"><br></p>                                       <p class=\"text_add\"><br></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>Your Login credentials are given,\r\n          Email : {email}\r\n          Password : {password}\r\n          To set up your account, please use these credentials and go to the following link.</p>\r\n\r\n          <p><button class=\"btn btn-primary btn-sm\">Go to your account</button></p>\r\n          <p>You can change your password from your account password settings.</p>\r\n          <p>Hope you will find useful!</p>\r\n          <p>Thanks for being with us.</p>\r\n          <p>Regards,</p>  \r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                    ', 'action_by,app_name,app_logo,receiver_name,invitation_url,email,password'),
(4, 'Invoice {invoice_number} for due {date}', '                                            <p class=\"text_add\"><img src=\"#\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\">{invoice_number}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>I hope you’re well!\r\n          Please see attached invoice {invoice_number}.\r\n          Don’t hesitate to contact us if you have any questions.</p>\r\n\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                           ', 'app_name,app_logo,receiver_name,invoice_number,date'),
(5, 'Payment reminder for invoice {invoice_number}', '                                      <p class=\"text_add\">{app_name}{date}{receiver_name}<img src=\"#\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\">{date}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>We hope that you’re enjoying our service\r\n          We did want to quickly mention that we haven’t received payment from you yet.</p>\r\n          <p>If you have any questions don’t hesitate to reply to this email.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                        ', 'app_name,app_logo,receiver_name,invoice_number,date'),
(6, 'Registration Confirmed', '<p><img src=\"http://property_final.com/uploads/avater.png\" alt=\"app_logo\" height=\"50px\" style=\"border:1px solid black;\"></p><p>Hi {receiver_name}</p>\r\n\r\n          <p>Welcome to our {app_name}.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p><p></p> ', 'name,action_by,app_name,app_logo,receiver_name,resource_url'),
(7, 'A new roles has been created in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>                   ', 'name,action_by,app_name,app_logo,receiver_name,resource_url'),
(8, 'A roles has been updated in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>         ', 'name,action_by,app_name,app_logo,receiver_name,resource_url'),
(9, 'A roles has been deleted in {app_name}', '          <p class=\"text_add\">{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>We are going to inform you that a roles named has been deleted from our application by {action_by}.</p>\r\n\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>         ', 'name,action_by,app_name,app_logo,receiver_name'),
(10, 'New School Edited ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi {receiver_name}</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited school to our application by {action_by}. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\n{app_name} \r\n</p>                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url'),
(11, 'New Trainer Edited ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Hi {receiver_name}</p>\r\n<p>Hope this mail finds you well and healthy. We are informing you that you\'ve been edited Trainerto our application by {action_by}. It\'ll be a great opportunity to work with you.<br>\r\nThanks &amp; Regards,\r\n{app_name} \r\n</p>                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url'),
(12, 'New Trainer create ', '                                                                      <p><img src=\"http://schoolmanagement.com/image/school.png\" alt=\"app_logo\" height=\"50px\" style=\"\"></p><p>Dear Trainer\r\nAdministrator,</p>\r\n<p>Your profile has been created with Kidspreneurship. This helps you give access to entrepreneurship education to your students.</p>\r\n <p>To get started, please <a href=\"{{route(\'backend.dashboard\')}}\">click here</a> and complete registration process using below login info</p>\r\n<p>\r\nEmail: {email}<br>\r\nPassword: {pass}\r\n</p>\r\n<p>\r\nThanks & Regards,<br>\r\nTeam Kidspreneurship\r\n</p>\r\n                                          ', 'action_by,app_name,app_logo,receiver_name,invitation_url');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_last_date` date DEFAULT NULL,
  `event_address` varchar(255) DEFAULT NULL,
  `landing_page` varchar(255) DEFAULT NULL,
  `event_fee` varchar(255) DEFAULT NULL,
  `event_poster` text,
  `event_description` text,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_date`, `event_last_date`, `event_address`, `landing_page`, `event_fee`, `event_poster`, `event_description`, `created_at`, `updated_at`) VALUES
(1, 'Computer Programming c', 'image/event/eventimage_vs79IGU1A3.jpg', '2022-06-30', '2022-06-25', 'Ghulsan,Banani', 'https://www.fb.com', '5000', 'image/event/poster/poster_CZiKAlaBSl.jpg', '<p>hello frrnds</p>', '2022-06-23 18:42:49', '2022-06-23 18:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

CREATE TABLE `event_registration` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `person` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `position` tinyint(2) NOT NULL,
  `booking_agree` tinyint(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_registration`
--

INSERT INTO `event_registration` (`id`, `event_id`, `student_id`, `name`, `email`, `person`, `date`, `position`, `booking_agree`, `created_at`, `updated_at`) VALUES
(1, 1, 90, 'aaa', 'dd@gmail.com', 1, '2022-06-28', 2, 1, '2022-06-28 09:14:31', '2022-06-28 09:14:31'),
(5, 3, 90, 'aa', 'fb_user@gmail.com', 2, '2022-06-28', 2, 1, '2022-06-28 11:14:42', '2022-06-28 11:14:42'),
(6, 1, 93, 'Rafi Test Event', 'rafitestevent@gmail.com', 4, '2022-06-28', 1, 1, '2022-06-28 13:38:16', '2022-06-28 13:38:16'),
(7, 1, 117, 'Alfie soloman', 'alfiesolomon391@yahoo.com', 1, '2022-07-07', 3, 1, '2022-07-07 16:29:12', '2022-07-07 16:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'Grade 1', NULL, NULL),
(2, 'Grade 2', NULL, NULL),
(3, 'Grade 3', NULL, NULL),
(4, 'Grade 4', NULL, NULL),
(5, 'Grade 5', NULL, NULL),
(6, 'Grade 6', NULL, NULL),
(7, 'Grade 7', NULL, NULL),
(8, 'Grade 8', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_11_062135_create_posts_table', 1),
(4, '2018_03_12_062135_create_categories_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_02_19_152418_create_permission_tables', 1),
(7, '2020_02_19_173115_create_activity_log_table', 1),
(8, '2020_02_19_173641_create_settings_table', 1),
(9, '2020_02_19_173700_create_userprofiles_table', 1),
(10, '2020_02_19_173711_create_notifications_table', 1),
(11, '2020_02_22_115918_create_user_providers_table', 1),
(12, '2020_05_01_163442_create_tags_table', 1),
(13, '2020_05_01_163833_create_polymorphic_taggables_table', 1),
(14, '2020_05_04_151517_create_comments_table', 1),
(15, '2020_10_27_155557_create_media_table', 1),
(17, '2022_06_05_132819_create_student_grades_table', 2),
(19, '2022_06_05_162030_create_grades_table', 4),
(22, '2022_06_05_132628_create_schools_table', 6),
(27, '2014_10_12_000000_create_users_table', 8),
(31, '2022_06_05_152719_create_trainers_table', 9),
(33, '2022_06_08_193404_create_streams_table', 10),
(34, '2022_06_08_194038_create_contents_table', 10),
(35, '2022_06_08_193252_create_age_groups_table', 11),
(36, '2022_06_11_195059_create_admin_others_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 0),
(40, 'App\\Models\\User', 0),
(1, 'App\\Models\\User', 13),
(40, 'App\\Models\\User', 13),
(1, 'App\\Models\\User', 14),
(40, 'App\\Models\\User', 14),
(1, 'App\\Models\\User', 15),
(40, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 16),
(40, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 17),
(40, 'App\\Models\\User', 17),
(1, 'App\\Models\\User', 18),
(40, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 19),
(40, 'App\\Models\\User', 19),
(1, 'App\\Models\\User', 20),
(40, 'App\\Models\\User', 20),
(1, 'App\\Models\\User', 21),
(40, 'App\\Models\\User', 21),
(1, 'App\\Models\\User', 22),
(40, 'App\\Models\\User', 22),
(1, 'App\\Models\\User', 23),
(40, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 24),
(40, 'App\\Models\\User', 24),
(1, 'App\\Models\\User', 25),
(40, 'App\\Models\\User', 25),
(1, 'App\\Models\\User', 26),
(40, 'App\\Models\\User', 26),
(1, 'App\\Models\\User', 27),
(40, 'App\\Models\\User', 27),
(1, 'App\\Models\\User', 28),
(40, 'App\\Models\\User', 28),
(1, 'App\\Models\\User', 29),
(40, 'App\\Models\\User', 29),
(1, 'App\\Models\\User', 30),
(40, 'App\\Models\\User', 30),
(1, 'App\\Models\\User', 31),
(40, 'App\\Models\\User', 31),
(1, 'App\\Models\\User', 32),
(40, 'App\\Models\\User', 32),
(1, 'App\\Models\\User', 33),
(40, 'App\\Models\\User', 33),
(1, 'App\\Models\\User', 38),
(40, 'App\\Models\\User', 38),
(1, 'App\\Models\\User', 62),
(40, 'App\\Models\\User', 62),
(1, 'App\\Models\\User', 66),
(40, 'App\\Models\\User', 66),
(1, 'App\\Models\\User', 67),
(40, 'App\\Models\\User', 67),
(1, 'App\\Models\\User', 68),
(40, 'App\\Models\\User', 68),
(1, 'App\\Models\\User', 69),
(40, 'App\\Models\\User', 69),
(1, 'App\\Models\\User', 70),
(40, 'App\\Models\\User', 70),
(1, 'App\\Models\\User', 71),
(40, 'App\\Models\\User', 71),
(1, 'App\\Models\\User', 72),
(40, 'App\\Models\\User', 72),
(1, 'App\\Models\\User', 73),
(40, 'App\\Models\\User', 73),
(1, 'App\\Models\\User', 74),
(40, 'App\\Models\\User', 74),
(1, 'App\\Models\\User', 75),
(40, 'App\\Models\\User', 75),
(1, 'App\\Models\\User', 76),
(40, 'App\\Models\\User', 76),
(1, 'App\\Models\\User', 77),
(40, 'App\\Models\\User', 77),
(1, 'App\\Models\\User', 78),
(40, 'App\\Models\\User', 78),
(1, 'App\\Models\\User', 79),
(42, 'App\\Models\\User', 79),
(1, 'App\\Models\\User', 80),
(40, 'App\\Models\\User', 80),
(1, 'App\\Models\\User', 87),
(42, 'App\\Models\\User', 87),
(1, 'App\\Models\\User', 88),
(42, 'App\\Models\\User', 88),
(1, 'App\\Models\\User', 90),
(42, 'App\\Models\\User', 90),
(1, 'App\\Models\\User', 91),
(42, 'App\\Models\\User', 91),
(1, 'App\\Models\\User', 92),
(42, 'App\\Models\\User', 92),
(1, 'App\\Models\\User', 93),
(42, 'App\\Models\\User', 93),
(1, 'App\\Models\\User', 94),
(40, 'App\\Models\\User', 94),
(1, 'App\\Models\\User', 95),
(40, 'App\\Models\\User', 95),
(1, 'App\\Models\\User', 96),
(40, 'App\\Models\\User', 96),
(1, 'App\\Models\\User', 97),
(40, 'App\\Models\\User', 97),
(1, 'App\\Models\\User', 98),
(42, 'App\\Models\\User', 98),
(1, 'App\\Models\\User', 99),
(42, 'App\\Models\\User', 99),
(1, 'App\\Models\\User', 100),
(40, 'App\\Models\\User', 100),
(1, 'App\\Models\\User', 102),
(42, 'App\\Models\\User', 102),
(1, 'App\\Models\\User', 103),
(40, 'App\\Models\\User', 103),
(1, 'App\\Models\\User', 104),
(42, 'App\\Models\\User', 104),
(1, 'App\\Models\\User', 105),
(42, 'App\\Models\\User', 105),
(1, 'App\\Models\\User', 106),
(40, 'App\\Models\\User', 106),
(1, 'App\\Models\\User', 107),
(40, 'App\\Models\\User', 107),
(1, 'App\\Models\\User', 108),
(40, 'App\\Models\\User', 108),
(1, 'App\\Models\\User', 109),
(40, 'App\\Models\\User', 109),
(1, 'App\\Models\\User', 110),
(40, 'App\\Models\\User', 110),
(1, 'App\\Models\\User', 111),
(40, 'App\\Models\\User', 111),
(1, 'App\\Models\\User', 112),
(42, 'App\\Models\\User', 112),
(1, 'App\\Models\\User', 113),
(42, 'App\\Models\\User', 113),
(1, 'App\\Models\\User', 114),
(40, 'App\\Models\\User', 114),
(1, 'App\\Models\\User', 115),
(40, 'App\\Models\\User', 115),
(1, 'App\\Models\\User', 116),
(40, 'App\\Models\\User', 116),
(1, 'App\\Models\\User', 117),
(42, 'App\\Models\\User', 117),
(1, 'App\\Models\\User', 118),
(40, 'App\\Models\\User', 118),
(1, 'App\\Models\\User', 119),
(40, 'App\\Models\\User', 119),
(1, 'App\\Models\\User', 120),
(42, 'App\\Models\\User', 120),
(1, 'App\\Models\\User', 121),
(42, 'App\\Models\\User', 121),
(1, 'App\\Models\\User', 122),
(40, 'App\\Models\\User', 122),
(1, 'App\\Models\\User', 123),
(40, 'App\\Models\\User', 123),
(1, 'App\\Models\\User', 124),
(40, 'App\\Models\\User', 124),
(1, 'App\\Models\\User', 125),
(40, 'App\\Models\\User', 125),
(1, 'App\\Models\\User', 126),
(40, 'App\\Models\\User', 126),
(1, 'App\\Models\\User', 127),
(40, 'App\\Models\\User', 127),
(1, 'App\\Models\\User', 128),
(40, 'App\\Models\\User', 128),
(1, 'App\\Models\\User', 129),
(40, 'App\\Models\\User', 129),
(1, 'App\\Models\\User', 130),
(40, 'App\\Models\\User', 130),
(1, 'App\\Models\\User', 131),
(40, 'App\\Models\\User', 131),
(1, 'App\\Models\\User', 132),
(40, 'App\\Models\\User', 132),
(1, 'App\\Models\\User', 133),
(40, 'App\\Models\\User', 133),
(1, 'App\\Models\\User', 134),
(40, 'App\\Models\\User', 134),
(1, 'App\\Models\\User', 135),
(42, 'App\\Models\\User', 135),
(1, 'App\\Models\\User', 136),
(40, 'App\\Models\\User', 136),
(1, 'App\\Models\\User', 137),
(42, 'App\\Models\\User', 137),
(1, 'App\\Models\\User', 138),
(42, 'App\\Models\\User', 138),
(1, 'App\\Models\\User', 139),
(40, 'App\\Models\\User', 139),
(1, 'App\\Models\\User', 140),
(40, 'App\\Models\\User', 140),
(1, 'App\\Models\\User', 141),
(40, 'App\\Models\\User', 141),
(1, 'App\\Models\\User', 142),
(42, 'App\\Models\\User', 142),
(1, 'App\\Models\\User', 143),
(42, 'App\\Models\\User', 143);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(6, 'App\\Models\\User', 0),
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 9),
(6, 'App\\Models\\User', 13),
(6, 'App\\Models\\User', 14),
(6, 'App\\Models\\User', 15),
(6, 'App\\Models\\User', 16),
(6, 'App\\Models\\User', 17),
(6, 'App\\Models\\User', 18),
(6, 'App\\Models\\User', 19),
(6, 'App\\Models\\User', 20),
(7, 'App\\Models\\User', 21),
(7, 'App\\Models\\User', 22),
(7, 'App\\Models\\User', 23),
(7, 'App\\Models\\User', 24),
(6, 'App\\Models\\User', 25),
(7, 'App\\Models\\User', 26),
(7, 'App\\Models\\User', 27),
(7, 'App\\Models\\User', 28),
(7, 'App\\Models\\User', 29),
(7, 'App\\Models\\User', 30),
(7, 'App\\Models\\User', 31),
(6, 'App\\Models\\User', 32),
(6, 'App\\Models\\User', 33),
(6, 'App\\Models\\User', 38),
(6, 'App\\Models\\User', 62),
(7, 'App\\Models\\User', 66),
(6, 'App\\Models\\User', 67),
(7, 'App\\Models\\User', 68),
(7, 'App\\Models\\User', 69),
(7, 'App\\Models\\User', 70),
(7, 'App\\Models\\User', 71),
(6, 'App\\Models\\User', 72),
(6, 'App\\Models\\User', 73),
(6, 'App\\Models\\User', 74),
(6, 'App\\Models\\User', 75),
(6, 'App\\Models\\User', 76),
(7, 'App\\Models\\User', 77),
(6, 'App\\Models\\User', 78),
(8, 'App\\Models\\User', 79),
(6, 'App\\Models\\User', 80),
(8, 'App\\Models\\User', 87),
(8, 'App\\Models\\User', 88),
(8, 'App\\Models\\User', 90),
(8, 'App\\Models\\User', 91),
(8, 'App\\Models\\User', 92),
(8, 'App\\Models\\User', 93),
(7, 'App\\Models\\User', 94),
(6, 'App\\Models\\User', 95),
(7, 'App\\Models\\User', 96),
(6, 'App\\Models\\User', 97),
(8, 'App\\Models\\User', 98),
(8, 'App\\Models\\User', 99),
(7, 'App\\Models\\User', 100),
(8, 'App\\Models\\User', 102),
(7, 'App\\Models\\User', 103),
(8, 'App\\Models\\User', 104),
(8, 'App\\Models\\User', 105),
(6, 'App\\Models\\User', 106),
(6, 'App\\Models\\User', 107),
(6, 'App\\Models\\User', 108),
(6, 'App\\Models\\User', 109),
(7, 'App\\Models\\User', 110),
(7, 'App\\Models\\User', 111),
(8, 'App\\Models\\User', 112),
(8, 'App\\Models\\User', 113),
(7, 'App\\Models\\User', 114),
(7, 'App\\Models\\User', 115),
(6, 'App\\Models\\User', 116),
(8, 'App\\Models\\User', 117),
(7, 'App\\Models\\User', 118),
(7, 'App\\Models\\User', 119),
(8, 'App\\Models\\User', 120),
(8, 'App\\Models\\User', 121),
(7, 'App\\Models\\User', 122),
(7, 'App\\Models\\User', 123),
(7, 'App\\Models\\User', 124),
(7, 'App\\Models\\User', 125),
(7, 'App\\Models\\User', 126),
(7, 'App\\Models\\User', 127),
(7, 'App\\Models\\User', 128),
(7, 'App\\Models\\User', 129),
(7, 'App\\Models\\User', 130),
(7, 'App\\Models\\User', 131),
(7, 'App\\Models\\User', 132),
(7, 'App\\Models\\User', 133),
(7, 'App\\Models\\User', 134),
(8, 'App\\Models\\User', 135),
(7, 'App\\Models\\User', 136),
(8, 'App\\Models\\User', 137),
(8, 'App\\Models\\User', 138),
(6, 'App\\Models\\User', 139),
(7, 'App\\Models\\User', 140),
(6, 'App\\Models\\User', 141),
(8, 'App\\Models\\User', 142),
(8, 'App\\Models\\User', 143);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_info`
--

CREATE TABLE `notification_info` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `receiver_status` int(11) DEFAULT NULL COMMENT '1=>''School'',2=>''Trainer'',\r\n3=>''Student''',
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `creator_id` int(11) DEFAULT NULL COMMENT 'Admin=1,School=2,Trainer=3,\r\nStudent=4',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_info`
--

INSERT INTO `notification_info` (`id`, `school_id`, `grade_id`, `receiver_id`, `receiver_status`, `title`, `description`, `creator_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 2, '2022-07-02 13:37:22', '2022-07-02 13:37:22'),
(2, 1, 1, 7, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 2, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(3, 1, 1, 8, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 2, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(4, 1, 1, 9, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 2, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(5, 1, 1, 10, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 2, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(6, 1, 1, 11, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 3, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(7, 1, 1, 13, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 3, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(8, 1, 1, 14, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 3, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(9, 1, 1, 15, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 3, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(10, 1, 1, 16, 3, 'Trainer test', 'Hello student how are you? Please submitted all project within 11th July. Your trainer Jon Doe', 3, '2022-07-02 13:37:23', '2022-07-02 13:37:23'),
(15, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign Trainer 05.Class Schedule at09:00 to 11:00', 1, '2022-07-03 09:17:37', '2022-07-03 09:17:37'),
(16, 0, 0, 3, 2, 'New Trainer Allocate', 'You have assisgn this National ideal.Your Class Schedule at09:00 to 11:00', 1, '2022-07-03 09:17:37', '2022-07-03 09:17:37'),
(17, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign Shukriti Ranjan Das.Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:26:52', '2022-07-06 23:26:52'),
(18, 0, 0, 1, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:26:52', '2022-07-06 23:26:52'),
(19, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign Shukriti Ranjan Das.Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:29:38', '2022-07-06 23:29:38'),
(20, 0, 0, 1, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:29:38', '2022-07-06 23:29:38'),
(21, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign Shukriti Ranjan Das.Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:32:13', '2022-07-06 23:32:13'),
(22, 0, 0, 1, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:32:13', '2022-07-06 23:32:13'),
(23, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign Shukriti Ranjan Das.Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:53:34', '2022-07-06 23:53:34'),
(24, 0, 0, 1, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at08:05 to 10:05', 1, '2022-07-06 23:53:34', '2022-07-06 23:53:34'),
(25, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at10:00 to 11:00', 1, '2022-07-07 15:56:33', '2022-07-07 15:56:33'),
(27, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at10:00 to 11:00', 1, '2022-07-07 16:03:34', '2022-07-07 16:03:34'),
(29, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign bonosriAkbor.Class Schedule at08:05 to 10:05', 1, '2022-07-07 16:56:53', '2022-07-07 16:56:53'),
(30, 0, 0, 5, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at08:05 to 10:05', 1, '2022-07-07 16:56:53', '2022-07-07 16:56:53'),
(31, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign mkhugjbu.Class Schedule at09:00 to 11:00', 1, '2022-07-07 21:19:04', '2022-07-07 21:19:04'),
(32, 0, 0, 5, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at09:00 to 11:00', 1, '2022-07-07 21:19:04', '2022-07-07 21:19:04'),
(33, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at11:00 to 12:00', 1, '2022-07-07 22:48:17', '2022-07-07 22:48:17'),
(35, 0, 0, 23, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at10:00 to 11:00', 1, '2022-07-12 08:45:39', '2022-07-12 08:45:39'),
(37, 0, 0, 23, 1, 'New Trainer Allocate', 'New trainer assign bonosriAkbor.Class Schedule at11:00 to 12:00', 1, '2022-07-12 08:45:47', '2022-07-12 08:45:47'),
(38, 0, 0, 5, 2, 'New Trainer Allocate', 'You have assisgn this G D Goenka.Your Class Schedule at11:00 to 12:00', 1, '2022-07-12 08:45:47', '2022-07-12 08:45:47'),
(39, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign Shukriti Ranjan Das.Class Schedule at08:05 to 10:05', 1, '2022-07-14 12:39:46', '2022-07-14 12:39:46'),
(41, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign Shukriti Ranjan Das.Class Schedule at11:00 to 12:00', 1, '2022-07-14 12:40:31', '2022-07-14 12:40:31'),
(43, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign bonosriAkbor.Class Schedule at09:00 to 11:00', 1, '2022-07-14 12:40:57', '2022-07-14 12:40:57'),
(44, 0, 0, 5, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at09:00 to 11:00', 1, '2022-07-14 12:40:57', '2022-07-14 12:40:57'),
(45, 0, 0, 1, 1, 'New Trainer Allocate', 'New trainer assign bonosriAkbor.Class Schedule at10:00 to 11:00', 1, '2022-07-14 12:42:32', '2022-07-14 12:42:32'),
(46, 0, 0, 5, 2, 'New Trainer Allocate', 'You have assisgn this National ideals.Your Class Schedule at10:00 to 11:00', 1, '2022-07-14 12:42:32', '2022-07-14 12:42:32'),
(49, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at10:00 to 11:00', 1, '2022-07-19 11:04:59', '2022-07-19 11:04:59'),
(51, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at11:00 to 12:00', 1, '2022-07-19 11:05:07', '2022-07-19 11:05:07'),
(53, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at10:00 to 11:00', 1, '2022-07-25 10:47:38', '2022-07-25 10:47:38'),
(55, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at11:00 to 12:00', 1, '2022-07-25 10:47:45', '2022-07-25 10:47:45'),
(57, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at11:00 to 12:00', 1, '2022-07-25 13:40:25', '2022-07-25 13:40:25'),
(58, 0, 0, 8, 2, 'New Trainer Allocate', 'You have assisgn this LBS International.Your Class Schedule at11:00 to 12:00', 1, '2022-07-25 13:40:25', '2022-07-25 13:40:25'),
(59, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at10:00 to 11:00', 1, '2022-07-25 13:45:28', '2022-07-25 13:45:28'),
(60, 0, 0, 8, 2, 'New Trainer Allocate', 'You have assisgn this LBS International.Your Class Schedule at10:00 to 11:00', 1, '2022-07-25 13:45:28', '2022-07-25 13:45:28'),
(61, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at11:00 to 12:00', 1, '2022-07-25 13:48:36', '2022-07-25 13:48:36'),
(62, 0, 0, 8, 2, 'New Trainer Allocate', 'You have assisgn this LBS International.Your Class Schedule at11:00 to 12:00', 1, '2022-07-25 13:48:36', '2022-07-25 13:48:36'),
(63, 0, 0, 9, 1, 'New Trainer Allocate', 'New trainer assign Grace murphy.Class Schedule at11:00 to 12:00', 1, '2022-07-26 08:19:43', '2022-07-26 08:19:43'),
(64, 0, 0, 8, 2, 'New Trainer Allocate', 'You have assisgn this LBS International.Your Class Schedule at11:00 to 12:00', 1, '2022-07-26 08:19:43', '2022-07-26 08:19:43');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_backend', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(2, 'edit_settings', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(3, 'view_logs', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(4, 'view_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(5, 'add_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(6, 'edit_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(7, 'delete_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(8, 'restore_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(9, 'block_users', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(10, 'view_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(11, 'add_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(12, 'edit_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(13, 'delete_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(14, 'restore_roles', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(15, 'view_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(16, 'add_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(17, 'create_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(18, 'download_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(19, 'delete_backups', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(20, 'view_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(21, 'add_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(22, 'edit_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(23, 'delete_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(24, 'restore_posts', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(25, 'view_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(26, 'add_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(27, 'edit_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(28, 'delete_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(29, 'restore_categories', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(30, 'view_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(31, 'add_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(32, 'edit_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(33, 'delete_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(34, 'restore_tags', 'web', '2022-06-04 07:31:04', '2022-06-04 07:31:04'),
(35, 'view_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(36, 'add_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(37, 'edit_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(38, 'delete_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(39, 'restore_comments', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(40, 'trainer_edit', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(41, 'school_edit', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05'),
(42, 'student_edit', 'web', '2022-06-04 07:31:05', '2022-06-04 07:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_og_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_og_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `moderated_by` int(10) UNSIGNED DEFAULT NULL,
  `moderated_at` datetime DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_by_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectfiles`
--

CREATE TABLE `projectfiles` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectfiles`
--

INSERT INTO `projectfiles` (`id`, `project_id`, `student_id`, `attachment`, `created_at`, `updated_at`) VALUES
(17, 2, 12, 'image/project/project_ARniZH9QIC.jpg', '2022-06-28 12:36:34', '2022-06-28 12:36:34'),
(18, 2, 12, 'image/project/project_mjEzscwsXo.jpg', '2022-06-28 12:47:05', '2022-06-28 12:47:05'),
(19, 4, 12, 'image/project/project_Xb1eGVEe1v.jpg', '2022-06-29 06:37:55', '2022-06-29 06:37:55'),
(20, 4, 12, 'image/project/project_srdngYeCc8.jpg', '2022-06-29 06:37:55', '2022-06-29 06:37:55'),
(21, 5, 19, 'image/project/project_ZY7bQK2Gc5.png', '2022-07-07 16:57:52', '2022-07-07 16:57:52'),
(23, 6, 7, 'image/project/project_gmz473xUUI.docx', '2022-07-07 23:33:22', '2022-07-07 23:33:22'),
(24, 7, 7, 'image/project/project_jVUj6dZN0x.docx', '2022-07-07 23:34:06', '2022-07-07 23:34:06'),
(25, 7, 7, 'image/project/project_LrSpXo1OdE.docx', '2022-07-07 23:34:06', '2022-07-07 23:34:06'),
(26, 8, 15, 'image/project/project_eRZEP7qsZT.docx', '2022-07-07 23:40:33', '2022-07-07 23:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `project_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `student_id`, `title`, `description`, `project_status`, `created_at`, `updated_at`) VALUES
(2, 12, 'Make a robot for new janaration', 'Make a robot for new janaration', 0, '2022-06-27 11:26:34', '2022-06-29 12:35:49'),
(4, 12, 'Test project', '<p>This is a test project</p>', 0, '2022-06-29 06:37:55', '2022-06-29 12:36:01'),
(5, 19, 'Project X', '<p>This is testing project X.&nbsp;</p>', 1, '2022-07-07 16:57:52', '2022-07-07 16:59:58'),
(6, 7, 'Only my project', 'Here is no sujogs', 0, '2022-07-07 22:27:51', '2022-07-07 23:33:22'),
(7, 7, 'Rs software', '<p>Here is many sujog</p>', 0, '2022-07-07 23:34:06', '2022-07-07 23:34:06'),
(8, 15, 'Biology for mine', '<p>here tis my project</p>', 0, '2022-07-07 23:40:33', '2022-07-07 23:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2022-06-14 07:44:18', '2022-06-14 07:44:18'),
(2, 'administrator', 'web', '2022-06-14 07:44:18', '2022-06-14 07:44:18'),
(3, 'manager', 'web', '2022-06-14 07:44:18', '2022-06-14 07:44:18'),
(4, 'executive', 'web', '2022-06-14 07:44:18', '2022-06-14 07:44:18'),
(5, 'user', 'web', '2022-06-14 07:44:18', '2022-06-14 07:44:18'),
(6, 'trainer', 'web', '2022-06-14 07:49:07', '2022-06-14 07:49:07'),
(7, 'school', 'web', '2022-06-14 07:49:28', '2022-06-14 07:49:28'),
(8, 'student', 'web', '2022-06-23 21:51:00', '2022-06-23 21:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(1, 3),
(1, 4),
(1, 6),
(40, 6),
(1, 7),
(41, 7),
(1, 8),
(42, 8);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_email_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_plan` int(11) DEFAULT NULL,
  `school_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_establish` int(11) DEFAULT NULL,
  `incharge_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incharge_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_per_student` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `kidspreneurship_representative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entrepreneurship_lab` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekly_class_for_grade` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `user_id`, `school_name`, `city`, `principle_name`, `official_email_id`, `contact_number`, `number_of_student`, `country`, `membership_plan`, `school_address`, `year_establish`, `incharge_name`, `incharge_email`, `fee_per_student`, `kidspreneurship_representative`, `course_start_date`, `entrepreneurship_lab`, `school_logo`, `school_cover_image`, `weekly_class_for_grade`, `status`, `created_at`, `updated_at`) VALUES
(1, 79, 'National ideals', 'Dhaka', 'Nazmul', 'nazmul@sahajjo.com', '01785657575', '300', 'Bangladesh', NULL, 'bonosri', 2002, 'Mahbub adnan', 'nazmul@sahajjo.com', '500', 'Keya khan tewst', '2022-06-27', 'later', 'image/school/school_K8UZKE0Ubu.jpg', 'image/school/cover_image/cover_tNHUO8IdrW.jpg', '{\"day\":[\"5\",\"2\",\"1\",\"0\",\"1\"],\"start_time\":[\"10:00\",\"11:00\",\"20:05\",\"10:00\",\"14:00\"],\"end_time\":[\"11:00\",\"12:00\",\"08:05\",\"12:00\",\"15:00\"],\"grade\":[\"7\",\"7\",\"1\",\"1\",\"2\"],\"sec\":[\"A\",\"A\",\"A\",\"B\",\"C\"],\"number_student\":[\"11\",\"11\",\"30\",\"30\",\"30\"]}', 1, '2022-06-23 21:16:06', '2022-07-16 10:37:54'),
(9, 115, 'LBS International', 'Lucknow', 'Mr. Bahadur', 'officialbentic@yahoo.com', '9898987456', '400', 'India', NULL, 'Lucknow street 147', 1989, 'Mr. Chandu', 'kuchbhi198@gmail.com', '5', 'swati', '2022-07-07', 'yes', 'image/school/school_yrezCIY2as.png', 'image/school/cover_image/cover_DlqJvBQmNB.jpg', NULL, 1, '2022-07-07 15:13:45', '2022-07-26 08:19:16'),
(23, 134, 'G D Goenka', 'Lucknow', 'Mr. Jacob smith', 'jacobsmithtemp@gmail.com', '98989775621', '300', 'India', NULL, 'Lucknow. Street 27', 1990, 'Mr. Mosley', 'mosleyofficia3l1@gmail.com', '1000', 'Swati', '2022-07-11', 'yes', 'image/school/school_fFhPfemoH3.png', 'image/school/cover_image/cover_zTN2Whb8dL.jpg', NULL, 1, '2022-07-11 10:17:58', '2022-07-12 08:44:45'),
(24, 136, 'Test School', 'Dhaka', 'Sapnil Test', 'robelsust+52@gmail.com', '91112222', '30', 'Bangladesh', NULL, 'Dhaka \r\nBangladesh', 2018, 'Sapnil test', 'robelsust+53@gmail.com', '20', 'Sapnil test', '2022-07-31', 'later', NULL, NULL, NULL, 0, '2022-07-11 23:52:00', '2022-07-11 23:57:22'),
(25, 140, 'Rampura', 'Rampura', 'Lillith Salazar', 'nazmul+1@sahajjo.com', '0111111119', '400', 'Bangladesh', 1, 'Bonosri ,Rampura', 2022, 'Aphrodite Vinson', 'shukriti+33', '200', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-14 08:22:47', '2022-07-14 08:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `type` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `title`, `creator_id`, `creator`, `created_at`, `updated_at`) VALUES
(2, 'Entrepreneurial Mindset', 1, 'Super Admin', '2022-07-07 23:36:37', '2022-07-07 23:36:37'),
(3, 'Entrepreneurial Skills – Non-Cognitive', 1, 'Super Admin', '2022-07-07 23:36:53', '2022-07-07 23:36:53'),
(4, 'Entrepreneurial Skills – Cognitive', 1, 'Super Admin', '2022-07-07 23:37:09', '2022-07-07 23:37:09'),
(5, 'Entrepreneurial Knowledge', 1, 'Super Admin', '2022-07-07 23:37:27', '2022-07-07 23:37:27'),
(6, 'Entrepreneurship in Action', 1, 'Super Admin', '2022-07-07 23:37:40', '2022-07-07 23:37:40'),
(7, 'Short Term Programs', 1, 'Super Admin', '2022-07-07 23:37:51', '2022-07-07 23:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `assignment` int(11) DEFAULT '0',
  `section` varchar(50) DEFAULT NULL,
  `classes_held` int(11) DEFAULT NULL,
  `classes_attended` int(11) DEFAULT NULL,
  `attendance` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `overal_grade` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `address` text,
  `blood_group` varchar(100) DEFAULT NULL,
  `activity_incharge` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `school_id`, `grade_id`, `project`, `assignment`, `section`, `classes_held`, `classes_attended`, `attendance`, `name`, `overal_grade`, `father_name`, `mother_name`, `address`, `blood_group`, `activity_incharge`, `image`, `created_at`, `updated_at`) VALUES
(5, 85, 1, 1, 1, NULL, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-06-23 22:35:09', '2022-07-06 17:30:05'),
(6, 86, 1, 2, 2, 1, NULL, 10, 8, '80%', 'Shukriti Student', 'A-', 'Kamal Mia', 'Ramia Begum', 'Malibag, Dhaka', 'B+', 'alex brad', 'no_image', '2022-06-23 22:35:10', '2022-06-23 22:35:10'),
(7, 87, 1, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-06-23 13:53:14', '2022-06-23 13:53:14'),
(9, 90, 1, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-06-23 14:14:54', '2022-06-23 14:14:54'),
(10, 91, 1, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-06-24 00:26:00', '2022-06-24 00:26:00'),
(12, 93, 1, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi update', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'A+', 'alex brad', 'image/student/thumbnail/1657806915.png', '2022-06-24 00:32:59', '2022-07-14 16:55:15'),
(13, 98, 1, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-06-25 16:03:52', '2022-06-25 16:03:52'),
(15, 102, 1, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-06-26 00:25:12', '2022-06-26 00:25:12'),
(17, 112, 7, 7, 1, 1, NULL, 20, 8, '40%', 'Anshika singh', 'A', 'Rupesh', 'Raani', 'Lucknow', 'O', 'Kuch bhi', 'no_image', '2022-07-06 22:19:38', '2022-07-06 22:19:38'),
(18, 113, 7, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-07-06 23:17:47', '2022-07-06 23:17:47'),
(19, 117, 9, 7, 1, 1, NULL, 10, 8, '80%', 'Alfie soloman', 'A', 'David soloman', 'Polly soloman', 'Lucknow', 'O', 'Kuch bhi', 'no_image', '2022-07-07 15:28:41', '2022-07-07 16:41:27'),
(20, 120, 9, 7, 2, 2, NULL, 20, 8, '40%', 'Denver rooki', 'B', 'Charlie mosley', 'Sean Mosley', 'Lucknow', 'O', 'Mr. Daisy', 'no_image', '2022-07-08 13:54:44', '2022-07-08 14:20:10'),
(21, 121, 9, 7, 2, 2, NULL, 20, 8, '40%', 'David mosley', 'B', 'Charlie mosley', 'Sean Mosley', 'Lucknow', 'O', 'Mr. Daisy', 'no_image', '2022-07-08 14:01:17', '2022-07-08 14:01:17'),
(22, 135, 23, 7, 1, 1, NULL, 20, 8, '40%', 'William Bentic', 'A', 'John', 'Merry', 'Lucknow', 'O', 'Mr. Chaand', 'no_image', '2022-07-11 13:11:25', '2022-07-11 13:11:25'),
(23, 137, 24, 1, 1, 1, NULL, 10, 8, '70%', 'Rafi Student', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-07-11 23:57:19', '2022-07-11 23:57:19'),
(24, 138, 23, 7, 1, 1, NULL, 20, 8, '40%', 'Thomas ', 'A', 'Jonathan', 'Mac Carthy', 'Lucknow', 'O', 'Mr. Chaand', 'no_image', '2022-07-12 08:41:10', '2022-07-12 08:41:10'),
(25, 142, 25, 1, 1, 1, NULL, 10, 8, '70%', 'Anthony Gomes', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-07-14 08:40:20', '2022-07-14 08:40:20'),
(26, 143, 1, 1, 1, 1, NULL, 10, 8, '70%', 'Limia jones', 'A', 'Jamal Mia', 'Khadija Khatun', 'Rampura, Dhaka', 'C', 'alex brad', 'no_image', '2022-07-14 09:06:42', '2022-07-14 09:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `attend_status` int(11) NOT NULL COMMENT '1=Present, 2=Absent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `trainer_id`, `class_no`, `attend_status`, `created_at`, `updated_at`) VALUES
(9, 12, 1, 1, 1, '2022-07-05 12:11:41', '2022-07-05 14:28:37'),
(13, 12, 1, 2, 1, '2022-07-05 13:45:33', '2022-07-05 13:45:33'),
(14, 12, 1, 3, 1, '2022-07-05 14:04:23', '2022-07-05 14:04:23'),
(15, 12, 1, 4, 1, '2022-07-05 14:04:24', '2022-07-05 14:04:24'),
(16, 12, 1, 5, 1, '2022-07-05 14:06:19', '2022-07-05 14:06:19'),
(17, 5, 1, 6, 2, '2022-07-05 14:06:22', '2022-07-05 14:06:22'),
(18, 5, 1, 7, 2, '2022-07-06 00:51:51', '2022-07-06 00:51:51'),
(19, 5, 1, 8, 1, '2022-07-06 00:51:53', '2022-07-06 00:51:53'),
(20, 5, 1, 7, 1, '2022-07-06 00:52:04', '2022-07-06 00:52:04'),
(21, 5, 8, 14, 1, '2022-07-19 13:19:17', '2022-07-19 13:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `student_feedback`
--

CREATE TABLE `student_feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `year` varchar(30) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `assessment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_feedback`
--

INSERT INTO `student_feedback` (`id`, `student_id`, `year`, `level`, `feedback`, `grade`, `assessment`, `created_at`, `updated_at`) VALUES
(18, 12, '2021', 'L1', 'Successfully done level one assesment.', 'A-', 1, '2021-03-01 00:00:00', '2021-03-01 00:00:00'),
(19, 12, '2021', 'L2', 'Successfully done level two assesment.', 'A+', 1, '2021-06-01 00:00:00', '2021-06-01 00:00:00'),
(20, 12, '2021', 'L3', 'Successfully done level three assesment.', 'B', 1, '2021-09-01 00:00:00', '2021-09-01 00:00:00'),
(21, 12, '2021', 'L4', 'Successfully done level four assesment.', 'C', 1, '2022-02-01 00:00:00', '2022-02-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `todo_name` varchar(100) DEFAULT NULL,
  `todo_done` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `todo_name`, `todo_done`, `created_at`, `updated_at`) VALUES
(1, 'Library', 1, '2022-06-23 00:00:00', '2022-06-26 00:00:00'),
(2, 'Sports Club', 1, '2022-06-23 00:00:00', '2022-07-04 00:00:00'),
(4, 'Task testing 001', 1, '2022-07-07 00:00:00', '2022-07-07 00:00:00'),
(5, 'Attend Zoom Session', 0, '2022-07-19 05:16:22', '2022-07-19 05:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `trainer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `official_email_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incharge_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_fee` double(10,2) NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `no_of_hour_per_week` int(11) NOT NULL DEFAULT '0',
  `assessment_done` int(11) DEFAULT NULL,
  `demo_video` int(11) DEFAULT NULL,
  `training_hour` int(11) DEFAULT NULL,
  `past_achievements` text COLLATE utf8mb4_unicode_ci,
  `expertise` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `user_id`, `trainer_name`, `official_email_id`, `incharge_email`, `trainer_fee`, `contact_no`, `address`, `city`, `join_date`, `date_of_birth`, `image`, `mode`, `type`, `status`, `no_of_hour_per_week`, `assessment_done`, `demo_video`, `training_hour`, `past_achievements`, `expertise`, `created_at`, `updated_at`) VALUES
(1, 78, 'Shukriti Ranjan Das', 'shukriti@sahajjo.com', 'begy@mailinator.com', 222.00, '01782782217', 'Rampura', 'Dhaka', '2022-06-22', '2022-07-19', 'image/trainer/thumbnail/1657092476.jpg', 2, 3, 1, 30, 1, 0, 1, '<p><span style=\"font-size: 17.6px;\">Achievements&nbsp;</span>dsfdasd</p>', '<p><span style=\"font-size: 17.6px;\">Expertise&nbsp;</span>sdadsada</p>', '2022-06-23 21:06:02', '2022-07-19 16:40:26'),
(3, 95, 'Trainer 05', 'xaniv50587@runqx.com', NULL, 300.00, '7418529630', NULL, 'chittagong', NULL, NULL, NULL, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2022-06-24 17:27:20', '2022-06-24 17:27:20'),
(4, 97, 'mkhugjbu', 'coxeye9925@exoacre.com', NULL, 100.00, '1452369874', NULL, 'Dhaka', NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, '2022-06-24 20:23:06', '2022-06-29 10:13:01'),
(5, 106, 'bonosriAkbor', 'akbor@gmail.com', 'akborali@gmail.com', 300.00, '016547456353', 'bonosri', 'Lucknow', '2022-07-04', NULL, 'abc.jpg', 3, 3, 1, 10, 0, 0, 0, NULL, NULL, '2022-07-04 09:55:19', '2022-07-08 13:13:19'),
(7, 109, 'Trainer 5', 'afiqur+11@sahajjo.com', NULL, 100.00, '01569874561', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2022-07-06 16:51:53', '2022-07-06 16:51:53'),
(8, 116, 'Grace murphy', 'gracemurphy321@yahoo.com', 'adityasrivastava17051993@gmail.com', 450.00, '9898963258', 'Lucknow', 'Lucknow', '2022-07-07', '2000-12-14', '1657173075.jpg', 3, 1, 1, 16, NULL, NULL, NULL, NULL, NULL, '2022-07-07 15:18:02', '2022-07-07 15:51:15'),
(9, 139, 'Nihar Trainer test', 'robelsust+59@gmail.com', 'robelsust+59@gmail.com', 2000.00, '2122222111', 'Dhaka, Bangladesh', 'Dhaka', '2022-07-21', NULL, NULL, 1, 1, 1, 40, NULL, NULL, NULL, NULL, NULL, '2022-07-12 21:10:40', '2022-07-12 21:11:55'),
(10, 141, 'Shukriti SWE', 'shukriti+1@sahajjo.com', NULL, 200.00, '01782782217', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, '2022-07-14 08:27:07', '2022-07-14 08:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_allocation`
--

CREATE TABLE `trainer_allocation` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `class_schedule` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `class_date` date DEFAULT NULL,
  `class_duration` int(11) DEFAULT NULL,
  `class_start` varchar(50) DEFAULT NULL,
  `class_end` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_allocation`
--

INSERT INTO `trainer_allocation` (`id`, `school_id`, `trainer_id`, `class_schedule`, `day`, `grade`, `class_date`, `class_duration`, `class_start`, `class_end`, `created_at`, `updated_at`) VALUES
(29, 1, 1, 'class time:grade3(08:05-10:05)', 1, 'grade3', '2022-07-04', 2, '08:05', '10:05', '2022-05-01 12:39:46', '2022-07-14 12:39:46'),
(30, 1, 1, 'class time:grade2(11:00-12:00)', 2, 'grade2', '2022-07-12', 1, '11:00', '12:00', '2022-06-01 12:40:31', '2022-07-14 12:40:31'),
(31, 1, 5, 'class time:grade4(09:00-11:00)', 4, 'grade4', '2022-07-14', 2, '09:00', '11:00', '2022-07-14 12:40:57', '2022-07-14 12:40:57'),
(32, 1, 5, 'class time:grade1(10:00-11:00)', 5, 'grade1', '2022-07-15', 1, '10:00', '11:00', '2022-07-14 12:42:32', '2022-07-14 12:42:32'),
(33, 1, 8, 'class time:grade1(11:00-12:00)', 5, 'grade1', '2022-07-08', 1, '11:00', '12:00', '2022-07-14 14:29:29', '2022-07-14 14:29:29'),
(36, 9, 8, 'class time:grade7(10:00-11:00)', 1, 'grade7', '2022-08-01', 1, '10:00', '11:00', '2022-07-25 10:47:38', '2022-07-25 10:47:38'),
(37, 9, 8, 'class time:grade8(11:00-12:00)', 1, 'grade8', '2022-08-01', 1, '11:00', '12:00', '2022-07-25 10:47:45', '2022-07-25 10:47:45'),
(41, 9, 8, 'class time:grade6(11:00-12:00)', 2, 'grade6', '2022-08-09', 1, '11:00', '12:00', '2022-07-26 08:19:43', '2022-07-26 08:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_education_background`
--

CREATE TABLE `trainer_education_background` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_location` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `pass_year` varchar(50) DEFAULT NULL,
  `gread` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_education_background`
--

INSERT INTO `trainer_education_background` (`id`, `trainer_id`, `school_name`, `school_location`, `degree`, `pass_year`, `gread`, `created_at`, `updated_at`) VALUES
(2, 8, NULL, NULL, NULL, NULL, NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00'),
(7, 1, 'Dhaka cantoment', 'adamje', 'jsc', '2012', 'A+', '2022-07-19 16:40:26', '2022-07-19 16:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_past_achievements`
--

CREATE TABLE `trainer_past_achievements` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `city_municipality` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer_past_achievements`
--

INSERT INTO `trainer_past_achievements` (`id`, `trainer_id`, `job_title`, `employer`, `city_municipality`, `country`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(82, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00'),
(83, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00'),
(84, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-07 00:00:00', '2022-07-07 00:00:00'),
(94, 1, 'Programmer language', 'Ahmudulallah', 'Dhaka', 'Bangladeshs', '2022-07-19', '2022-07-22', '2022-07-19 16:40:26', '2022-07-19 16:40:26'),
(95, 1, 'here', 'dfsd', 'sfsd', 'fsfsdf', '2022-07-19', '2022-07-30', '2022-07-19 16:40:26', '2022-07-19 16:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

CREATE TABLE `userprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_metadata` text COLLATE utf8mb4_unicode_ci,
  `last_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `user_id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile`, `gender`, `url_website`, `url_facebook`, `url_twitter`, `url_instagram`, `url_linkedin`, `date_of_birth`, `address`, `bio`, `avatar`, `user_metadata`, `last_ip`, `login_count`, `last_login`, `email_verified_at`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super Admin', 'Super', 'Admin', '100001', 'super@admin.com', '(463) 722-1356', 'Male', NULL, NULL, NULL, NULL, NULL, '2012-04-16', NULL, NULL, 'img/default-avatar.jpg', NULL, '103.126.14.39', 139, '2022-07-29 18:25:04', NULL, 1, NULL, 1, NULL, '2022-06-14 07:44:17', '2022-07-29 18:25:04', NULL),
(2, 2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '470-751-2659', 'Male', NULL, NULL, NULL, NULL, NULL, '1972-11-19', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-14 07:44:18', '2022-06-14 07:44:18', NULL),
(3, 3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '(347) 631-1528', 'Male', NULL, NULL, NULL, NULL, NULL, '1975-03-01', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-14 07:44:18', '2022-06-14 07:44:18', NULL),
(4, 4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '534-638-4543', 'Female', NULL, NULL, NULL, NULL, NULL, '1982-01-17', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-14 07:44:18', '2022-06-14 07:44:18', NULL),
(5, 5, 'General User', 'General', 'User', '100005', 'user@user.com', '567.884.7515', 'Other', NULL, NULL, NULL, NULL, NULL, '1986-08-02', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, '2022-06-14 07:44:18', '2022-06-14 07:44:18', NULL),
(6, 77, 'National ideal', NULL, NULL, '100077', 'nazmul@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 78, 'Shukriti Ranjan Das', NULL, NULL, '100078', 'shukriti@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 66, '2022-07-23 08:25:12', NULL, 1, 1, 78, NULL, '0000-00-00 00:00:00', '2022-07-23 08:25:12', NULL),
(8, 79, 'National ideals', NULL, NULL, '100079', 'nazmul@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 68, '2022-07-23 08:24:00', NULL, 1, 1, 79, NULL, '0000-00-00 00:00:00', '2022-07-23 08:24:00', NULL),
(9, 80, 'rafi', NULL, NULL, '100080', 'ajaxrafi@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 81, 'Mamun Hossain Student', NULL, NULL, NULL, 'pyqtdsxbuwjucmutex@bvhrk.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '203.76.221.62', 1, '0000-00-00 00:00:00', NULL, 1, 1, 81, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 82, 'Rahim Mia Student', NULL, NULL, NULL, 'wxtmniqdwhzjbcpndx@kvhrs.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(47, 83, 'Mamun Hossain Student', NULL, NULL, NULL, 'pyqtdsxbuwjucmutex@bvhrk.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-06-23 22:11:33', '2022-06-23 22:11:33', NULL),
(48, 84, 'Rahim Mia Student', NULL, NULL, NULL, 'wxtmniqdwhzjbcpndx@kvhrs.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-06-23 22:11:34', '2022-06-23 22:11:34', NULL),
(49, 85, 'Rafi Student', NULL, NULL, NULL, 'kugpvasdhzkmobawtn@bvhrk.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '203.76.221.62', 1, '2022-06-23 22:39:11', NULL, 1, 1, 85, NULL, '2022-06-23 22:35:09', '2022-06-23 22:39:11', NULL),
(50, 86, 'Shukriti Student', NULL, NULL, NULL, 'pjxxumsuulkwhcijzb@nvhrw.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '203.76.221.62', 3, '2022-07-14 16:54:01', NULL, 1, 1, 86, NULL, '2022-06-23 22:35:10', '2022-07-14 16:54:01', NULL),
(51, 87, 'Rafi Student', NULL, NULL, '100087', 'student@test.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '116.204.154.114', 3, '2022-07-07 23:41:49', NULL, 1, 1, 87, NULL, '2022-06-23 13:53:14', '2022-07-07 23:41:49', NULL),
(52, 88, 'Rafi Student', NULL, NULL, '100088', 'student@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 2, '2022-06-23 14:05:19', NULL, 1, 1, 88, NULL, '2022-06-23 13:59:14', '2022-06-23 14:05:19', NULL),
(53, 90, 'Rafi Student', NULL, NULL, '100090', 'student2@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 3, '2022-06-28 00:15:07', NULL, 1, 79, 90, NULL, '2022-06-23 14:14:54', '2022-06-28 00:15:07', NULL),
(54, 91, 'Rafi Student', NULL, NULL, '100091', 'lhkxbuttkmovcgbgjz@kvhrw.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-06-24 00:26:00', '2022-06-24 00:26:00', NULL),
(55, 92, 'Shukriti Student', NULL, NULL, '100092', 'bnuzbzknxvtdegwsnd@kvhrr.com', '1789562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1992-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 1, '2022-06-24 00:27:09', NULL, 1, 1, 92, NULL, '2022-06-24 00:26:00', '2022-06-24 00:27:09', NULL),
(56, 93, 'Rafi Student', NULL, NULL, '100093', 'afiqur@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 38, '2022-07-23 08:03:54', NULL, 1, 1, 93, NULL, '2022-06-24 00:32:58', '2022-07-23 08:03:54', NULL),
(57, 94, 'hjhjhjhjhj', NULL, NULL, '100094', 'xeheg71348@runqx.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 2, '2022-07-03 12:50:47', NULL, 1, 1, 94, NULL, '2022-06-24 16:29:01', '2022-07-03 12:50:47', NULL),
(58, 95, 'Trainer 05', NULL, NULL, '100095', 'xaniv50587@runqx.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '127.0.0.1', 2, '2022-07-03 12:52:00', NULL, 1, 1, 95, NULL, '2022-06-24 17:27:20', '2022-07-03 12:52:01', NULL),
(59, 96, 'zcsdvfasc', NULL, NULL, '100096', 'cowono2551@serosin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '183.83.42.47', 1, '2022-06-24 20:22:21', NULL, 1, 1, 1, NULL, '2022-06-24 20:21:36', '2022-06-24 20:26:44', NULL),
(60, 97, 'mkhugjbu', NULL, NULL, '100097', 'coxeye9925@exoacre.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '116.204.154.117', 3, '2022-07-21 10:05:05', NULL, 1, 1, 97, NULL, '2022-06-24 20:23:06', '2022-07-21 10:05:05', NULL),
(61, 98, 'Rafi Student', NULL, NULL, '100098', 'womjixsonffntshwqv@kvhrs.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 1, '2022-06-25 16:05:03', NULL, 1, 1, 98, NULL, '2022-06-25 16:03:51', '2022-06-25 16:05:03', NULL),
(62, 99, 'Rafi Student', NULL, NULL, '100099', 'gxoejykfcxxbapkrjl@bvhrs.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 1, '2022-06-25 16:15:29', NULL, 1, 79, 99, NULL, '2022-06-25 16:14:13', '2022-06-25 16:15:29', NULL),
(63, 100, 'asdfasdf', NULL, NULL, '100100', 'asdfsdf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-06-26 00:03:22', '2022-06-26 00:03:22', NULL),
(64, 102, 'Rafi Student', NULL, NULL, '100102', 'afiqur5@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '116.204.154.114', 4, '2022-07-07 23:39:54', NULL, 1, 1, 102, NULL, '2022-06-26 00:25:11', '2022-07-07 23:39:54', NULL),
(65, 103, 'Batara School', NULL, NULL, '100103', 'batara@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-06-30 05:27:20', '2022-06-30 05:27:20', NULL),
(66, 104, 'Rafi Student', NULL, NULL, '100104', 'afiqur4564@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-06-30 10:44:42', '2022-06-30 10:44:42', NULL),
(67, 105, 'Grace Murphy', NULL, NULL, '100105', 'graceofficial1714', '9.17585E+11', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-02 04:46:13', '2022-07-02 04:46:13', NULL),
(68, 106, 'bonosriAkbor', NULL, NULL, '100106', 'akbor@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-04 09:55:18', '2022-07-06 15:04:47', NULL),
(69, 109, 'Trainer 5', NULL, NULL, '100109', 'afiqur+11@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 2, '2022-07-07 22:39:39', NULL, 1, 1, 109, NULL, '2022-07-06 16:51:53', '2022-07-07 22:39:39', NULL),
(70, 110, 'Test school', NULL, NULL, '100110', 'afiqur+12@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-06 16:56:34', '2022-07-06 16:56:34', NULL),
(71, 111, 'National academy', NULL, NULL, '100111', 'roweg90454@hekarro.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 3, '2022-07-06 22:31:48', NULL, 1, 1, 111, NULL, '2022-07-06 22:15:39', '2022-07-06 23:19:01', NULL),
(72, 112, 'Anshika singh', NULL, NULL, '100112', 'wadij43188@lankew.com', '9.19855E+11', 'Female', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '106.214.242.169', 1, '2022-07-06 22:21:26', NULL, 1, 111, 112, NULL, '2022-07-06 22:19:38', '2022-07-06 22:21:26', NULL),
(73, 113, 'Rafi Student', NULL, NULL, '100113', 'afiqur88888@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-06 23:17:47', '2022-07-06 23:17:47', NULL),
(74, 114, 'Central school', NULL, NULL, '100114', 'markevil07@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-07 14:53:23', '2022-07-07 14:53:23', NULL),
(75, 115, 'LBS International', NULL, NULL, '100115', 'officialbentic@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '223.236.170.85', 14, '2022-07-26 08:19:04', NULL, 1, 1, 115, NULL, '2022-07-07 15:13:45', '2022-07-26 08:19:04', NULL),
(76, 116, 'Grace murphy', NULL, NULL, '100116', 'gracemurphy321@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '122.163.175.100', 18, '2022-07-28 13:13:07', NULL, 1, 1, 116, NULL, '2022-07-07 15:18:01', '2022-07-28 13:13:07', NULL),
(77, 117, 'Alfie soloman', NULL, NULL, '100117', 'alfiesolomon391@yahoo.com', '9.19875E+11', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '58.182.50.43', 16, '2022-08-01 13:50:44', NULL, 1, 115, 117, NULL, '2022-07-07 15:28:41', '2022-08-01 13:50:44', NULL),
(78, 118, 'National school and college', NULL, NULL, '100118', 'nazmulsahajjo@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 1, '2022-07-07 16:16:10', NULL, 1, 1, 118, NULL, '2022-07-07 15:51:35', '2022-07-07 16:16:10', NULL),
(79, 119, 'National school and colleges', NULL, NULL, '100119', 'nazmul+1@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-07 15:52:48', '2022-07-07 15:52:48', NULL),
(80, 120, 'David mosley', NULL, NULL, '100120', 'mosleyofficial1@gmail.com', '9.20E+11', 'Male', NULL, NULL, NULL, NULL, NULL, '2010-12-07', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 115, 115, NULL, '2022-07-08 13:54:44', '2022-07-08 13:54:44', NULL),
(81, 121, 'David mosley', NULL, NULL, '100121', 'poposi6934@meidir.com', '9.20E+11', 'Male', NULL, NULL, NULL, NULL, NULL, '2010-12-07', NULL, NULL, 'img/default-avatar.jpg', NULL, '27.57.118.21', 1, '2022-07-08 14:01:41', NULL, 1, 115, 121, NULL, '2022-07-08 14:01:17', '2022-07-08 14:01:41', NULL),
(82, 122, 'Kidspreneurship', NULL, NULL, '100122', 'swati@kidspreneurship.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 14:30:47', '2022-07-08 14:30:47', NULL),
(83, 123, 'New National school and college', NULL, NULL, '100123', 'amtsrivastava007@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 15:40:05', '2022-07-08 15:40:05', NULL),
(84, 124, 'National school and college new', NULL, NULL, '100124', 'amtsrivastava007@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 15:44:45', '2022-07-08 15:44:45', NULL),
(85, 125, 'New National school and college', NULL, NULL, '100125', 'amtsrivastava007@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 15:51:16', '2022-07-08 15:51:16', NULL),
(86, 126, 'New National ideals bangladesh', NULL, NULL, '100126', 'amtsrivastava007@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 16:04:52', '2022-07-08 16:04:52', NULL),
(87, 127, 'National school and college fgdfgdfg', NULL, NULL, '100127', 'hossainnazmul191@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 16:20:23', '2022-07-08 16:20:23', NULL),
(88, 128, 'National school and college fgdfgdfg', NULL, NULL, '100128', 'hossainnazmul191+1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 16:21:56', '2022-07-08 16:21:56', NULL),
(89, 129, 'National school and college fgdfgdfg', NULL, NULL, '100129', 'hossainnazmul191+2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 16:29:54', '2022-07-08 16:29:54', NULL),
(90, 130, 'National school and college fgdfgdfg', NULL, NULL, '100130', 'hossainnazmul191+6@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 16:36:29', '2022-07-08 16:36:29', NULL),
(91, 131, 'National school and college fgdfgdfg', NULL, NULL, '100131', 'hossainnazmul191+123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-08 13:04:32', '2022-07-08 13:04:32', NULL),
(92, 132, 'My super test', NULL, NULL, '100132', 'robelsust+51@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-09 07:53:06', '2022-07-09 07:53:06', NULL),
(93, 133, 'Another', NULL, NULL, '100133', 'robelsust+52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-09 08:14:44', '2022-07-09 08:14:44', NULL),
(94, 134, 'G D Goenka', NULL, NULL, '100134', 'jacobsmithtemp@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '106.202.130.97', 3, '2022-07-12 08:38:47', NULL, 1, 1, 134, NULL, '2022-07-11 10:17:58', '2022-07-12 08:38:47', NULL),
(95, 135, 'William Bentic', NULL, NULL, '100135', 'officialbentic@gmail.com', '91899954781', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, NULL, 0, NULL, NULL, 1, 1, 1, NULL, '2022-07-11 13:11:25', '2022-07-11 13:11:25', NULL),
(96, 136, 'Test School', NULL, NULL, '100136', 'robelsust+52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '103.112.54.213', 1, '2022-07-11 23:52:48', NULL, 1, 1, 136, NULL, '2022-07-11 23:52:00', '2022-07-11 23:52:48', NULL),
(97, 137, 'Rafi Student', NULL, NULL, '100137', 'robelsust+55@gmail.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '103.112.54.213', 1, '2022-07-11 23:58:03', NULL, 1, 136, 137, NULL, '2022-07-11 23:57:19', '2022-07-11 23:58:03', NULL),
(98, 138, 'Thomas', NULL, NULL, '100138', 'sheltommy673@gmail.com', '9.19899E+11', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '106.202.130.97', 1, '2022-07-12 08:42:10', NULL, 1, 134, 138, NULL, '2022-07-12 08:41:10', '2022-07-12 08:42:10', NULL),
(99, 139, 'Nihar Trainer test', NULL, NULL, '100139', 'robelsust+59@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '103.112.54.213', 2, '2022-07-12 21:14:35', NULL, 1, 1, 139, NULL, '2022-07-12 21:10:40', '2022-07-12 21:14:35', NULL),
(100, 140, 'Rampura', NULL, NULL, '100140', 'nazmul+1@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '116.204.154.117', 2, '2022-07-21 09:54:01', NULL, 1, 1, 140, NULL, '2022-07-14 08:22:47', '2022-07-21 09:54:01', NULL),
(101, 141, 'Shukriti SWE', NULL, NULL, '100141', 'shukriti+1@sahajjo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 1, '2022-07-14 08:29:08', NULL, 1, 1, 141, NULL, '2022-07-14 08:27:07', '2022-07-14 08:29:08', NULL),
(102, 142, 'Anthony Gomes', NULL, NULL, '100142', 'shukriti+2@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 1, '2022-07-14 08:52:04', NULL, 1, 1, 142, NULL, '2022-07-14 08:40:20', '2022-07-14 08:52:04', NULL),
(103, 143, 'Limia jones', NULL, NULL, '100143', 'shukriti+4@sahajjo.com', '1790562315', 'Male', NULL, NULL, NULL, NULL, NULL, '1995-12-12', NULL, NULL, 'img/default-avatar.jpg', NULL, '203.76.221.62', 1, '2022-07-14 09:08:31', NULL, 1, 79, 143, NULL, '2022-07-14 09:06:42', '2022-07-14 09:08:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'img/default-avatar.jpg',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `group` int(11) NOT NULL DEFAULT '1' COMMENT 'Super Admin=1,School=2,Trainer=3,Student=4, Admin=5',
  `suspend` tinyint(2) DEFAULT '2' COMMENT 'suspend = 1, unsuspend = 2',
  `termandcondition` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile`, `gender`, `date_of_birth`, `email_verified_at`, `password`, `avatar`, `status`, `group`, `suspend`, `termandcondition`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'Super', 'Admin', '100001', 'education@therssoftware.com', '(463) 722-1356', 'Male', '2012-04-16', '2022-06-14 07:44:17', '$2y$10$iz2B2lGwMNVVQErs8xmuv.3.wqZB1tJinuAakISrPGNxMJnpz8woi', 'asset/dist/img/user2-160x160.jpg', 1, 1, 2, 0, NULL, '2022-06-14 07:44:17', '2022-06-14 07:44:17', NULL),
(2, 'Admin Istrator', 'Admin', 'Istrator', '100002', 'admin@admin.com', '470-751-2659', 'Male', '1972-11-19', '2022-06-14 07:44:17', '$2y$10$Be8nLIzHKSf./Ad/yAV4c.n6IsXULdvJxSMSrgMvbR8MfyIS2h6me', 'img/default-avatar.jpg', 1, 5, 2, 0, NULL, '2022-06-14 07:44:17', '2022-06-14 07:44:17', NULL),
(3, 'Manager', 'Manager', 'User User', '100003', 'manager@manager.com', '(347) 631-1528', 'Male', '1975-03-01', '2022-06-14 07:44:17', '$2y$10$miKLt4sGBf3BHktj45dI5enPhTDcSaadh/NsMgWXgBpJpIw6MixqS', 'img/default-avatar.jpg', 1, 5, 2, 0, NULL, '2022-06-14 07:44:17', '2022-06-14 07:44:17', NULL),
(4, 'Executive User', 'Executive', 'User', '100004', 'executive@executive.com', '534-638-4543', 'Female', '1982-01-17', '2022-06-14 07:44:17', '$2y$10$IGHBIWtdD.ANt1Yb0oa2Te4x7UgXzcAfGccKAFJpqwxaXIzYi7dV.', 'img/default-avatar.jpg', 1, 5, 2, 0, NULL, '2022-06-14 07:44:17', '2022-06-14 07:44:17', NULL),
(5, 'General User', 'General', 'User', '100005', 'user@user.com', '567.884.7515', 'Other', '1986-08-02', '2022-06-14 07:44:17', '$2y$10$1TOswbYd/vqBw3o6h2139O.lLd47a5a/d08d9VmPw8VU0J8vXq9Ga', 'img/default-avatar.jpg', 1, 5, 2, 0, NULL, '2022-06-14 07:44:17', '2022-06-14 07:44:17', NULL),
(78, 'Shukriti Ranjan Das', NULL, NULL, '100078', 'shukriti@sahajjo.com', NULL, NULL, NULL, NULL, '$2y$10$gb/sn8GzsvbO4ctLs9eqF.zGiFf9Sg4Il4AykYwlaIkxL/C4P/eEC', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-06-23 21:06:02', '2022-07-21 09:12:49', NULL),
(79, 'National ideals', NULL, NULL, '100079', 'nazmul@sahajjo.com', NULL, NULL, NULL, NULL, '$2y$10$wyZco/B6rvQCOIKY.1E.lePDlQYXaw08GJt9pS1jYFH.Y1C7P3I9W', 'img/default-avatar.jpg', 1, 2, 2, 0, NULL, '2022-06-23 21:16:06', '2022-07-21 09:14:04', NULL),
(85, 'Rafi Students', NULL, NULL, NULL, 'kugpvasdhzkmobawtn@bvhrk.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$MrufgauZeKKD6B6KMQ1YeuvacUx3FetOPQuXbkEFJzjx0emESKVY2', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-23 22:35:09', '2022-07-21 09:16:15', NULL),
(86, 'Shukriti Student', NULL, NULL, NULL, 'pjxxumsuulkwhcijzb@nvhrw.com', '1789562315', 'Male', '1992-12-12 00:00:00', NULL, '$2y$10$flaXtSe7mQmTp5SNNi3dRegSjaTYn7YmOvaLwNqRwGNVQ6dh37w.2', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-23 22:35:10', '2022-07-21 09:16:15', NULL),
(87, 'Rafi Student', NULL, NULL, '100087', 'student@test.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$EfiCOxT1umnc46SHnGW5BebRvfKtRKo5lvAsj89esZlP/1IS6ZNWu', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-23 13:53:13', '2022-07-21 09:16:15', NULL),
(89, 'Rafi Student', NULL, NULL, NULL, 'student1@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$Pi7e31PsgerYsDB5tAc1tuG2fvU//SCKk0UyLJwvmZ1u8fiCZIdzW', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-23 14:13:05', '2022-07-21 09:16:15', NULL),
(90, 'Rafi Student', NULL, NULL, '100090', 'student2@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$yxIfjtrIL/hr5hCiLCP4geUXOO9teIRVF.MZjOJlME90ztRvM1mvu', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-23 14:14:54', '2022-07-21 09:16:15', NULL),
(91, 'Rafi Student', NULL, NULL, '100091', 'lhkxbuttkmovcgbgjz@kvhrw.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$4EsuMlAwCfLUdRQqEMIgX.tSo84u.4o9Gi8arI0qgss5j1WLEdLqK', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-24 00:25:59', '2022-07-21 09:16:15', NULL),
(93, 'Rafi update', NULL, NULL, '100093', 'afiqur@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$XVJBUaZUVWcSFS.lpHVoSe7BGPNBT7E9ysXWw6N.2NLgt109psRzW', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-24 00:32:58', '2022-07-21 09:16:15', NULL),
(95, 'Trainer 05', NULL, NULL, '100095', 'xaniv50587@runqx.com', NULL, NULL, NULL, NULL, '$2y$10$JjP9sytjAPQwIbSU5RF6eerqGpBprNkP/pkezotGI.K90oQt/TI0m', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-06-24 17:27:20', '2022-07-21 09:12:49', NULL),
(97, 'mkhugjbu', NULL, NULL, '100097', 'coxeye9925@exoacre.com', NULL, NULL, NULL, NULL, '$2y$10$sA2UXStOVgt7nBLDp73MHO2awKvYJEJc5wJBodBcAC5H.bYtpgbjS', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-06-24 20:23:06', '2022-07-21 09:12:49', NULL),
(98, 'Rafi Student', NULL, NULL, '100098', 'womjixsonffntshwqv@kvhrs.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$JQxIkyLLOXVZnKIu2Y2A2OsD2Eqjb4tMWUdtWN/95eZNXs4rpMjx2', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-25 16:03:51', '2022-07-21 09:16:15', NULL),
(102, 'Rafi Student', NULL, NULL, '100102', 'afiqur5@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$XVJBUaZUVWcSFS.lpHVoSe7BGPNBT7E9ysXWw6N.2NLgt109psRzW', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-26 00:25:11', '2022-07-21 09:16:15', NULL),
(104, 'Rafi Student', NULL, NULL, '100104', 'afiqur4564@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$Td1/FDvYXDukTCgCcIybKOTR1rMSsQ4Vunn3fTISGdQv3UwxustvG', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-06-30 10:44:41', '2022-07-21 09:16:15', NULL),
(106, 'bonosriAkbor', NULL, NULL, '100106', 'akbor@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$fIZ7w5Hn5DeGQVzPssssm.ORwCUPijpqe.o6DewfrEtXsqgexZreq', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-07-04 09:55:18', '2022-07-21 09:12:49', NULL),
(109, 'Trainer 5', NULL, NULL, '100109', 'afiqur+11@sahajjo.com', NULL, NULL, NULL, NULL, '$2y$10$yOAxRG3S547zrmLl.n.uWOPfqjgZHheyy0Zup5Cna232IkjFdh/6e', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-07-06 16:51:53', '2022-07-21 09:12:49', NULL),
(112, 'Anshika singh', NULL, NULL, '100112', 'wadij43188@lankew.com', '9.19855E+11', 'Female', '1995-12-12 00:00:00', NULL, '$2y$10$ZZPQ8di2m7T9kEI5IctPBO9kj0OHMryS0NAaz2F4Y.tgSARW3mnV2', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-06 22:19:38', '2022-07-21 09:16:15', NULL),
(113, 'Rafi Student', NULL, NULL, '100113', 'afiqur88888@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$boqqdMbopCiXOV/OXP0GauO/R.FmFqDvnYldbofMxt9.judYJvpgO', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-06 23:17:47', '2022-07-21 09:16:15', NULL),
(115, 'LBS International', NULL, NULL, '100115', 'officialbentic@yahoo.com', NULL, NULL, NULL, NULL, '$2y$10$XiKBle5ZjalBFcYAeqFpSeIcjg6EQPAeXanuxfsti0CjAYClrIlDi', 'img/default-avatar.jpg', 1, 2, 2, 0, NULL, '2022-07-07 15:13:45', '2022-07-21 09:14:04', NULL),
(116, 'Grace murphy', NULL, NULL, '100116', 'gracemurphy321@yahoo.com', NULL, NULL, NULL, NULL, '$2y$10$ke5fh5.2yRzfKUpxkj6r5OR2YKQlz0o7N7qNYsJKNl3iTX4pLVBnS', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-07-07 15:18:01', '2022-07-21 09:12:49', NULL),
(117, 'Alfie soloman', NULL, NULL, '100117', 'alfiesolomon391@yahoo.com', '9.19875E+11', 'Male', '2010-12-02 00:00:00', NULL, '$2y$10$a4csKP52OZvy4zxdAXsvhuxQK/X1Jk6QQvypRVmhphGw1HV5.sc4.', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-07 15:28:41', '2022-07-21 09:16:15', NULL),
(120, 'Denver rooki', NULL, NULL, '100120', 'mosleyofficial1@gmail.com', '9.20E+11', 'Male', '2010-12-07 00:00:00', NULL, '$2y$10$/XtHGPlsxh1ASPFNgizu2usvrnduBrl09gZmrFKbAQxdkR6AN1KPm', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-08 13:54:44', '2022-07-21 09:16:15', NULL),
(121, 'David mosley', NULL, NULL, '100121', 'poposi6934@meidir.com', '9.20E+11', 'Male', '2010-12-07 00:00:00', NULL, '$2y$10$lXUxjpqiHB40MXl2vQ2UyeZgakJ/nEcnhuppe4888aDWpeCVnp21u', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-08 14:01:17', '2022-07-21 09:16:15', NULL),
(132, 'My super test', NULL, NULL, '100132', 'robelsust+51@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$jXgcpamC2rda2LBT37hmd.i8QI6ZvIBregpKKKntPIq8iLVg0r6Bm', 'img/default-avatar.jpg', 1, 2, NULL, 0, NULL, '2022-07-09 07:53:06', '2022-07-21 09:14:04', NULL),
(134, 'G D Goenka', NULL, NULL, '100134', 'jacobsmithtemp@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$gchzYJGEcEn9yj.OrDVViOuGuxW75xfYNC2JSpc/b5Cz4Qtt0w4QK', 'img/default-avatar.jpg', 1, 2, 2, 0, NULL, '2022-07-11 10:17:58', '2022-07-21 09:14:04', NULL),
(135, 'William Bentic', NULL, NULL, '100135', 'officialbentic@gmail.com', '91899954781', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$27o56Wy5BeOwks.KuaR25u6aXrTNelPItjdPLwhN5rOWmZSTRfFm6', 'img/default-avatar.jpg', 1, 4, NULL, 0, NULL, '2022-07-11 13:11:25', '2022-07-21 09:16:15', NULL),
(136, 'Test School', NULL, NULL, '100136', 'robelsust+52@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$DI8ClvfLqxFm4Y7VqL5eiOE8l2qeLDUCGV6ER4wFBaLuRcMTYmkZq', 'img/default-avatar.jpg', 1, 2, 2, 0, NULL, '2022-07-11 23:52:00', '2022-07-21 09:14:04', NULL),
(137, 'Rafi Student', NULL, NULL, '100137', 'robelsust+55@gmail.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$Q6uYmKeYSplA04.CUysTwejfqcZe/BujyH7nW7ajn32T79fH/WEYG', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-11 23:57:19', '2022-07-21 09:16:15', NULL),
(138, 'Thomas ', NULL, NULL, '100138', 'sheltommy673@gmail.com', '9.19899E+11', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$KJPCdYZ7x3JcYgUWgWvREe7wWoER6NUJRRTM30EKtTonLhFeKsbhO', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-12 08:41:10', '2022-07-21 09:16:15', NULL),
(139, 'Nihar Trainer test', NULL, NULL, '100139', 'robelsust+59@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$Zvi4OKCJmEcwDFyUyvoTie8Ffmx3EEnjIm04vFyTKW9VIn5IFCHsq', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-07-12 21:10:40', '2022-07-21 09:12:49', NULL),
(140, 'Rampura', NULL, NULL, '100140', 'nazmul+1@sahajjo.com', NULL, NULL, NULL, NULL, '$2y$10$Yf5SRDDf08Kqe9osepM9su13KUoujCUJZxhMjemKqmUdmVpNR20R6', 'img/default-avatar.jpg', 1, 2, 2, 0, NULL, '2022-07-14 08:22:47', '2022-07-21 09:14:04', NULL),
(141, 'Shukriti SWE', NULL, NULL, '100141', 'shukriti+1@sahajjo.com', NULL, NULL, NULL, NULL, '$2y$10$QmxIldFSI7FJzSMnTioFAeFCfGo4oNPCs6Va6oRo54Aw8fNbXR.Hm', 'img/default-avatar.jpg', 1, 3, 2, 0, NULL, '2022-07-14 08:27:07', '2022-07-21 09:12:49', NULL),
(142, 'Anthony Gomes', NULL, NULL, '100142', 'shukriti+2@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$rAzZpbGDML01yl.BTA8dtOAawjKjniOmenQ8zLAV91Wn3UR5h3Fta', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-14 08:40:20', '2022-07-21 09:16:15', NULL),
(143, 'Limia jones', NULL, NULL, '100143', 'shukriti+4@sahajjo.com', '1790562315', 'Male', '1995-12-12 00:00:00', NULL, '$2y$10$9ocZrHWsuAwopB28YrgaeulXmGYt3uWdI.aaDG3hvJXqpyoUomsJy', 'img/default-avatar.jpg', 1, 4, 2, 0, NULL, '2022-07-14 09:06:42', '2022-07-21 09:16:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_providers`
--

CREATE TABLE `user_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indexes for table `admin_others`
--
ALTER TABLE `admin_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocation_event`
--
ALTER TABLE `allocation_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignmentsfiles`
--
ALTER TABLE `assignmentsfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_comment`
--
ALTER TABLE `assignment_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_details`
--
ALTER TABLE `assignment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_notifications`
--
ALTER TABLE `email_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `notification_info`
--
ALTER TABLE `notification_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `projectfiles`
--
ALTER TABLE `projectfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_allocation`
--
ALTER TABLE `trainer_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_education_background`
--
ALTER TABLE `trainer_education_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_past_achievements`
--
ALTER TABLE `trainer_past_achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_providers`
--
ALTER TABLE `user_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_providers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_others`
--
ALTER TABLE `admin_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `allocation_event`
--
ALTER TABLE `allocation_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `assignmentsfiles`
--
ALTER TABLE `assignmentsfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assignment_comment`
--
ALTER TABLE `assignment_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `assignment_details`
--
ALTER TABLE `assignment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `email_notifications`
--
ALTER TABLE `email_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_info`
--
ALTER TABLE `notification_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectfiles`
--
ALTER TABLE `projectfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_feedback`
--
ALTER TABLE `student_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainer_allocation`
--
ALTER TABLE `trainer_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `trainer_education_background`
--
ALTER TABLE `trainer_education_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainer_past_achievements`
--
ALTER TABLE `trainer_past_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `userprofiles`
--
ALTER TABLE `userprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
