-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 11:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_des` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_des`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'I know about how you download vs code editor ', 1, 1, '2024-09-03 11:30:32'),
(2, 'I also know about that', 1, 1, '2024-09-03 11:37:21'),
(3, '&lt;script&gt;I also know &lt;/script&gt;', 1, 1, '2024-09-03 11:38:16'),
(4, 'fsdfjksdjfsk', 2, 2, '2024-09-04 10:38:56'),
(5, 'jkflsjdlf', 3, 4, '2024-09-07 15:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sno` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` int(15) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sno`, `username`, `email`, `password`, `number`, `comment`, `timestamp`) VALUES
(1, 'shivam', 'sh@gmail.com', '1', 55421222, 'kjsdkfj', '2024-09-05 12:48:19'),
(2, 'shivamkumar', 'shivamkumar@gmail.com', '$2y$10$ETUnEYvu6LjHxhCWK7fwxOCLBVpB6hCix2v9wvEKyOu496mZDkPIi', 6655555, 'fskjlf', '2024-09-05 12:50:40'),
(3, 'shivamkumar', 'm@gmail.com', '$2y$10$VO2I6fTNITHxr2tBoEQ.SOKN1GcsqZQ3y77zKzqvS2LBkP4lTNO0C', 548, 'fjskl', '2024-09-05 13:08:11'),
(4, 'monu', 'mn@gmail.com', '$2y$10$543U8cjm9GaEdZe8SCk/wOVa6Uw.iaIRbXzre8H6Fqlnb1MPLN3TO', 548, 'fjks', '2024-09-06 10:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `iforum`
--

CREATE TABLE `iforum` (
  `catagory_id` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `catagory_description` varchar(255) NOT NULL,
  `timestamp` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iforum`
--

INSERT INTO `iforum` (`catagory_id`, `catagory_name`, `catagory_description`, `timestamp`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.', '2024-08-26 14:48:35.000000'),
(2, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.It is plateform independent.', '2024-08-26 14:48:35.000000'),
(3, 'Node.js', 'Node.js is a cross-platform, open-source JavaScript runtime environment that can run on Windows, Linux, Unix, macOS, and more. Ryan Dahl is the creator of Node.js', '0000-00-00 00:00:00.000000'),
(4, 'SQL', 'Structured Query Language is a domain-specific language used to manage data, especially in a relational database management system.SQL was initially developed at IBM by Donald D. Chamberlin ', '0000-00-00 00:00:00.000000'),
(5, 'jQuery', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animations, and Ajax.John Resig was lead for making JQuery.', '0000-00-00 00:00:00.000000'),
(6, 'React', 'React is a free and open-source front-end JavaScript library for building user interfaces based on components by Facebook Inc.Jordan Walke, a software engineer at Facebook, is considered the father of React: ', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_des` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_des`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'vs code download', 'Please suggest me how we can download vs code in my laptop.', 1, 1, '2024-09-03 11:29:28'),
(2, 'gdjfkdlj', 'djlfjslk', 2, 2, '2024-09-04 10:38:31'),
(3, 'dlkwj', 'dlwk', 1, 4, '2024-09-07 15:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'shivamkumar', '$2y$10$P.N6Mt3jKEGGJHLOXs.yLeSnGEFPnOW1By9O2JVPBhyuv7jZ2Retq', '2024-09-03 11:25:51'),
(2, 's@gmail.com', '$2y$10$.BdAf17hvqkG5JgrrRmRxeNTK2McsrrSP7P52zFFu9OjE8mCt4.Ry', '2024-09-04 10:37:09'),
(3, 'sk', '$2y$10$nFpbFpjlsWQHDUkwEXV/l.oQE2UVe.qqo6MFjwnN/ISgzhBJfliju', '2024-09-05 12:33:22'),
(4, 'A@gmail.com', '$2y$10$OISDGbZVh1BrPb54CLCPvOn6dXeKsjTf4VQLY4vzb5vFXSYiX1I8K', '2024-09-07 14:58:24'),
(5, 'ritikj', '$2y$10$WE1NU3r4pXbDCe/.FHc4z.OiRa4sZsBu0ed3ZbInE.ZVScZSECcyq', '2024-09-10 09:38:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `iforum`
--
ALTER TABLE `iforum`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_des`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iforum`
--
ALTER TABLE `iforum`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
