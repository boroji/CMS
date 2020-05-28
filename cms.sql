-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 04:30 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'architecture'),
(5, 'tea'),
(14, 'coffee');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 10, 'Hossein', 'test@test.com', 'wow thats cool', 'unapprove', '2020-05-20'),
(4, 9, 'Sandy', 'test@test.com', 'I love you', 'approved', '2020-05-28'),
(7, 9, 'cindy', 'test@test.com', 'i love you even more', 'approved', '2020-05-28'),
(9, 17, 'Sandy', 'test@test.com', 'I also love coffee too', 'approved', '2020-05-28'),
(10, 16, 'cindy', 'test@test.com', 'this is amazing', 'approved', '2020-05-28'),
(11, 16, 'Sandy', 'test@test.com', 'you are right, this is amazing', 'unapproved', '2020-05-28'),
(12, 19, 'Mimo', 'test@test.com', 'Soooooooo white wow', 'approved', '2020-05-28'),
(13, 16, 'Roxanne', 'myemail@test.com', 'This is soooooo cool', 'unapproved', '2020-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_counts` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_counts`, `post_status`) VALUES
(16, 2, 'design', 'Architecture', '2020-05-28', 'architecture.jpg', 'This is amazing building', 'Architecture', 3, 'Draft'),
(17, 14, 'Coffee is the Best', 'Coffee lover', '2020-05-28', 'coffee.jpg', 'I like dark coffee        \r\n                \r\n        ', 'coffee', 1, 'Draft'),
(19, 2, 'digital', 'Architecture', '2020-05-28', 'architecture-.jpg', 'This is white', 'white', 1, 'published'),
(20, 2, 'MTM 1526', 'Architecture', '2020-05-28', 'architecture-2.jpg', 'Sky is blue or white ?', 'Sky', 0, 'Draft'),
(21, 14, 'Lonely Coffee', 'Coffee lover', '2020-05-28', 'coffee-2.jpg', 'I like coffee a lot        \r\n                \r\n        ', 'coffee', 0, 'Draft'),
(22, 14, 'Group Coffee', 'Coffee lover', '2020-05-28', 'coffee-3.jpg', 'we drink coffee toegther.        \r\n                \r\n        ', 'group of friends', 0, 'Draft'),
(23, 5, 'Herbal tea', 'TeaBie', '2020-05-28', 'tea-2.jpg', 'This is amazing tea', 'Herbal', 0, 'Draft'),
(24, 5, 'Blue Tea', 'TeaBie', '2020-05-28', 'tea-3.jpg', 'I love tea with sugar         ', 'Tea lover', 0, 'published');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
