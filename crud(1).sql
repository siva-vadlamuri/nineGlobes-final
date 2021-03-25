-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 08:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin@ait.com', 'aitsol@7274');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'none' COMMENT 'Call Back, Demo',
  `comments` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `message`, `action_type`, `course_name`, `created`, `modified`, `status`, `comments`) VALUES
(26, 'Shreyas', 'shreays@gmail.com', '9657013436', NULL, '', 'web development', '2021-02-15 05:28:25', '2021-02-16 06:40:35', 'demo done', 'He went to his home town for election. he will call back.      .Arrange Demo at 2-3 PM (15-02-21).      .He went to his home town for election. he will call back.      .Arrange Demo at 2-3 PM (15-02-21).      ..      .He went to his home town for election'),
(27, 'Venu Gopal', 'venugopal@gmail.com', '7036644307', NULL, '', 'web development', '2021-02-15 05:31:34', '2021-02-15 05:31:34', 'call back', 'He went is home town , so he will call back '),
(28, 'Anshu Kumar', 'anshukumar@gmail.com', '7004625186', NULL, '', 'ui development', '2021-02-15 05:33:10', '2021-02-20 13:55:51', 'call back', 'He came at sunday, but the trainer is busy.      .He is too busy.      .He came at sunday, but the trainer is busy.      .He is too busy.      .He came at sunday, but the trainer is busy.      .He is too busy.      .He came at sunday, but the trainer is b'),
(29, 'ramesh', 'ramesh@gmail.com', '7488344822', NULL, '', 'web development', '2021-02-15 11:24:24', '2021-02-20 13:54:37', 'call back', 'send the curriculum.      ..      .called him 2 times. he is not picking the call.      .send the curriculum.      ..      .called him 2 times. he is not picking the call'),
(30, 'Ran brother', 'ran@gmail.com', '9739983124', NULL, '', 'web development', '2021-02-15 11:25:32', '2021-02-15 11:26:01', 'none', 'send curriculum.      .'),
(31, 'abijith', 'abijith@gmail.com', '9535476439', NULL, '', 'ui development', '2021-02-16 06:13:38', '2021-02-23 05:59:00', 'arrange demo', 'Arrange a Demo conform lead.      .He will come on monday (22-02-21).      .Arrange a Demo conform lead.      .He will come on monday (22-02-21).      .Call is not picking '),
(32, 'Mythraryee USA', 'mythrayee@gmail.com', '+1 510 417 7076', NULL, '', 'UI Development', '2021-02-16 06:40:17', '2021-02-22 08:11:13', 'enrolled', 'Asked for  curriculum details, demo timing.      .Asked for  curriculum details, demo timing'),
(33, 'k balaji', 'kbalaji@gmail.com', '8919832902', NULL, '', 'ui development', '2021-02-16 06:44:48', '2021-02-20 13:56:17', 'call back', 'He want clear idea about ui development, he will attend demo in 2 days.      .he is in hosiptial,so he will come for next batch.      .He want clear idea about ui development, he will attend demo in 2 days.      .he is in hosiptial,so he will come for nex'),
(34, 'Madhu Chandana', 'madhu@gmail.com', '8897799670', NULL, '', 'Ui development', '2021-02-16 06:51:40', '2021-02-16 06:51:40', 'enrolled', 'Enrolled on feb 16 and total fee is 17,000, for enroll they paid 7000'),
(35, 'S krishnaveni', 'krishnaveni@gmail.com', '7993099303', NULL, '', 'web development', '2021-02-16 06:54:59', '2021-02-16 06:54:59', 'enrolled', 'enrolled on feb 16th, final fee is 17,000 and for enrollment they paid 7000'),
(36, 'suchitra', 'suchitra@gmail.com', '6302610388', NULL, '', 'web development', '2021-02-16 06:57:10', '2021-02-20 13:53:19', 'enrolled', 'have to enroll on 17th feb or 18th feb.      .have to enroll on 17th feb or 18th feb'),
(37, 'kamesh k', 'kamesh@gmail.com', '9999999999', NULL, '', 'Ui Development', '2021-02-17 08:21:47', '2021-02-20 13:54:18', 'enrolled', 'Paid 4800 to Chaitnya, Remaining 1200.      .And he paid to Murali Sir'),
(38, 'preeti', 'preeti@gmail.com', '7032280986', NULL, '', 'ui development', '2021-02-18 14:14:10', '2021-02-22 06:57:13', 'enrolled', 'She Will attend 2 classes for demo purpose.      .She will come from monday (22-02-21).      .Paid 6000 To Mohan Sir'),
(39, 'keral person', 'keral@gmail.com', '7306039465', NULL, '', 'ui development', '2021-02-18 14:18:49', '2021-02-18 14:18:49', 'arrange demo', 'We will call  back before saturday  (20-02-2021)'),
(40, 'Sai Krishna', 'saikrishna@gmail.com', '9908423030', NULL, '', 'UI Deve', '2021-02-18 14:32:17', '2021-02-18 14:32:17', 'call back', 'Call back on March, shifting his domain to ui development'),
(41, 'Moni Sing', 'moni@gmail.com', '8518075991', NULL, '', 'ui', '2021-02-20 13:39:13', '2021-02-20 13:39:13', 'arrange demo', 'She will attend demo on monday'),
(42, 'Robert', 'robert@gmail.com', '9513027059', NULL, '', 'ui development', '2021-02-20 13:43:27', '2021-02-20 13:43:27', 'arrange demo', 'He will come on Monday (22-02-21) He has 10 years gap and he complete his 10+2'),
(43, 'Riya Gupta', 'riyagupta@gmail.com', '7483427958', NULL, '', 'ui development', '2021-02-20 13:48:28', '2021-02-20 13:48:28', 'demo done', 'Call back her on Sunday (21-02-21)'),
(44, 'sandhya', 'sandhya@gmail.com', '7019565853', NULL, '', 'ui development', '2021-02-22 08:13:52', '2021-02-24 07:26:12', 'demo done', 'She has interest follow up.      .She will join after one month. So call her at end of march'),
(45, 'vinay v', 'vinayv@gmail.com', '8217348562', NULL, '', 'ui development', '2021-02-23 05:54:15', '2021-02-23 05:54:15', 'arrange demo', 'Share the Location and he will come demo on Wednesday (24-02-21)'),
(46, 'B Krishna', 'bkrishna@gmail.com', '7780440555', NULL, '', 'ui development', '2021-02-23 06:01:54', '2021-02-23 09:38:18', 'demo done', 'He will come within 1 hour (23-02-21).      .Inform him when the next batch starts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
