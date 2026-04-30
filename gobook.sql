-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2026 at 11:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gobook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `commenter` varchar(255) DEFAULT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL,
  `username2` varchar(100) DEFAULT NULL,
  `fullname2` varchar(255) DEFAULT NULL,
  `profile_pic2` varchar(255) DEFAULT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'sent',
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `username2` varchar(100) DEFAULT NULL,
  `profileImg` varchar(255) DEFAULT NULL,
  `profileImg2` varchar(255) DEFAULT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_type` varchar(100) DEFAULT NULL,
  `page_description` text DEFAULT NULL,
  `page_cover_photo` varchar(255) DEFAULT NULL,
  `pr_pic` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `page_link` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `page_name`, `page_type`, `page_description`, `page_cover_photo`, `pr_pic`, `username`, `whatsapp`, `phone`, `email`, `page_link`, `datetime`) VALUES
(1, 1, 'Coding community', 'Tech', 'A community where tech bros and girls can connect', 'undraw_dev-productivity_5wps-sbvwf.png', 'aremoji15.jpg', 'lawrencejr', '09025816161', '09025816161', 'oputalawrence@gmail.com', 'https://oputalawrence.lawjun.ng', '2026-04-30 10:03:39'),
(2, 1, 'Vibes with xander', 'Podcast', 'Fuck y\'all', 'vibes_with_xander-bs2vu.jpg', 'aremoji15.jpg', 'lawrencejr', '', '', '', 'Not Provided', '2026-04-30 10:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `page_followers`
--

CREATE TABLE `page_followers` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `follower_username` varchar(100) DEFAULT NULL,
  `follower_img` varchar(255) DEFAULT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_posts`
--

CREATE TABLE `page_posts` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_pr_pic` varchar(255) DEFAULT NULL,
  `page_photo` varchar(255) DEFAULT NULL,
  `page_text` text DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_posts_likes`
--

CREATE TABLE `page_posts_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `liker_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_post_comment`
--

CREATE TABLE `page_post_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `commenter_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `poster_img` varchar(255) DEFAULT NULL,
  `text_post` text DEFAULT NULL,
  `public` varchar(10) DEFAULT NULL,
  `img_post` varchar(255) DEFAULT NULL,
  `anonymous` varchar(10) DEFAULT NULL,
  `verified` varchar(50) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `poster`, `poster_img`, `text_post`, `public`, `img_post`, `anonymous`, `verified`, `datetime`) VALUES
(1, 1, 'lawrencejr', 'aremoji15.jpg', 'Hey fam, what\'s popping, just revived Gobook, feeling really nostalgic', 'yes', '-idg24.', 'no', 'yes', '2026-04-30 09:49:44'),
(2, 2, 'big_x', 'aremoji4.jpg', 'Keep streaming vibes with xander!!', 'yes', 'vibes_with_xander-g7y3v.jpg', 'no', 'no', '2026-04-30 10:28:09'),
(3, 1, 'lawrencejr', 'aremoji15.jpg', 'Really go to have you all back', 'yes', '-yg2hh.', 'no', 'yes', '2026-04-30 10:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `hostel` varchar(150) DEFAULT NULL,
  `sec_sch` varchar(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `school_set` varchar(100) DEFAULT NULL,
  `department` varchar(150) DEFAULT NULL,
  `faculty` varchar(255) NOT NULL,
  `verified` enum('no','yes','','') NOT NULL DEFAULT 'no',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `reg_no`, `gender`, `password`, `username`, `phone`, `email`, `dob`, `bio`, `hostel`, `sec_sch`, `state`, `profile_pic`, `school_set`, `department`, `faculty`, `verified`, `datetime`) VALUES
(1, 'ifeanyi oputa', 'u19/nas/csc/158', 'Male', 'law3221211', 'lawrencejr', '09025816161', 'oputalawrence@gmail.com', '2002-11-23', 'I am the founder of gobook', 'Our saviours', 'St patricks college', 'Delta', 'aremoji15.jpg', '2019', 'Computer Science', '', 'yes', '2026-04-30 09:48:48'),
(2, 'nnamani chidubem', 'u19/nas/csc/057', 'Male', '12345678', 'big_x', '08064655017', 'nnamanichidubem@gmail.com', '2003-06-27', 'I\'m gay', 'Off camp', 'Don\'t know', 'Enugu', 'aremoji4.jpg', '2019', 'Computer Science', '', 'no', '2026-04-30 10:19:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `page_followers`
--
ALTER TABLE `page_followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Indexes for table `page_posts`
--
ALTER TABLE `page_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `page_posts_likes`
--
ALTER TABLE `page_posts_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `liker_id` (`liker_id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `page_post_comment`
--
ALTER TABLE `page_post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `commenter_id` (`commenter_id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_followers`
--
ALTER TABLE `page_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_posts`
--
ALTER TABLE `page_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_posts_likes`
--
ALTER TABLE `page_posts_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_post_comment`
--
ALTER TABLE `page_post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `friend_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friend_requests_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_followers`
--
ALTER TABLE `page_followers`
  ADD CONSTRAINT `page_followers_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_followers_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_posts`
--
ALTER TABLE `page_posts`
  ADD CONSTRAINT `page_posts_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_posts_likes`
--
ALTER TABLE `page_posts_likes`
  ADD CONSTRAINT `page_posts_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `page_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_posts_likes_ibfk_2` FOREIGN KEY (`liker_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_posts_likes_ibfk_3` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_post_comment`
--
ALTER TABLE `page_post_comment`
  ADD CONSTRAINT `page_post_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `page_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_post_comment_ibfk_2` FOREIGN KEY (`commenter_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_post_comment_ibfk_3` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
