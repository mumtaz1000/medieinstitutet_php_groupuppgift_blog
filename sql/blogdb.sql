-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 10:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_id` int(11) NOT NULL,
  `Comment_content` varchar(50) DEFAULT NULL,
  `Comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Comment_Post_id` int(11) NOT NULL,
  `Comment_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_id`, `Comment_content`, `Comment_date`, `Comment_Post_id`, `Comment_User_id`) VALUES
(7, 'Comment no 2', '2021-03-05 11:49:18', 50, 3),
(9, 'comment 4', '2021-03-05 11:49:38', 50, 3),
(10, 'This is a test comment', '2021-03-08 10:35:37', 52, 1),
(11, 'Nice work', '2021-03-08 10:47:46', 52, 3),
(13, 'Posting it...', '2021-03-09 09:00:24', 52, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Post_id` int(11) NOT NULL,
  `Post_title` tinytext NOT NULL,
  `Post_description` varchar(50) DEFAULT NULL,
  `Post_image` varchar(255) DEFAULT NULL,
  `Post_category` tinytext DEFAULT NULL,
  `Post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Post_User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post_id`, `Post_title`, `Post_description`, `Post_image`, `Post_category`, `Post_date`, `Post_User_id`) VALUES
(48, 'Checking creating post', 'No idea update 2', '../images/img_chania.jpg', 'Testing.....', '2021-03-02 12:25:18', 3),
(50, 'Place', 'This is admin editing post description. ', '../images/karsten-winegeart-stB6muBBXMc-unsplash.jpg', 'Place', '2021-03-03 10:41:50', 3),
(52, 'Admin is creating a post', 'It is a test to check a user name functionality', '../images/Palm-Phone-9-of-13-1340x754.jpg', 'Testing.....', '2021-03-08 10:32:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(30) NOT NULL,
  `User_email` varchar(30) NOT NULL,
  `User_password` varchar(50) NOT NULL,
  `User_role` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_email`, `User_password`, `User_role`) VALUES
(1, 'mumtaz', 'shereenfatima1000@gmail.com', '28ee0a7865c9a89679e3d53fbc860848', 'Admin'),
(3, 'momo', 'mail@hotmail.com', '73a08322d81f37776cf9897b479cbdf6', 'User'),
(5, 'user123', 'user123@email.com', '73a08322d81f37776cf9897b479cbdf6', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_id`),
  ADD KEY `Comment_Post_id` (`Comment_Post_id`),
  ADD KEY `Comment_User_id` (`Comment_User_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_id`),
  ADD KEY `Post_User_id` (`Post_User_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Comment_Post_id`) REFERENCES `posts` (`Post_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Comment_User_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Post_User_id`) REFERENCES `users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
