-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2020 at 12:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_complete_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(3, 'bakra markit'),
(2, 'basic tech'),
(1, 'share markit'),
(4, 'Silicon vally');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(30) NOT NULL,
  `image` text NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES
(1, '2019-08-10 07:02:31', 'shoaib', 'shoaib', 1, 'shoaib@gmail.com', 'shoaib.com', 'author.jpg', 'its very wealthy', 'pending'),
(4, '2019-08-10 07:02:32', 'shoaib', 'shoaibi', 1, 'shoaib@gmail.com', 'shoaib.com', 'author.jpg', 'its very wealthy', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `name`) VALUES
(34, 'home3-banner3.jpg'),
(35, 'home3-banner4.jpg'),
(36, 'home3-banner5.jpg'),
(37, 'home5-banner1.jpg'),
(38, '4.jpg'),
(39, '5.jpg'),
(40, '460baf339a0.jpg'),
(41, 'blog04.jpg'),
(42, '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(30) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `post_data` text NOT NULL,
  `views` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `date`, `title`, `author`, `author_image`, `image`, `categories`, `tags`, `post_data`, `views`, `status`) VALUES
(1, '2020-05-18 17:06:34', 'how share markit works', 'shoaib', 'author.jpg', 'home3-banner2.jpg', 'share markit', 'share markit', 'asdfjasldfals asdfjlsak jdfljas flas dlkfjasd f', 116, 'publish'),
(2, '2020-05-18 15:55:52', 'how to locak a dore', 'shoaib', 'author.jpg', 'service9.jpg', 'share markit', 'share marki,urdu tutorial', 'My dear I appreciate your mail to me how are you and your health which is very important to me I hope fine inch Allah, My dear I know that this mail will be a surprise to you and I am sure that you would hardly expect such mail from me since we are just new friends but I am doing it because of the situation at hand and decided to let you know every thing about me because I believe it is masha Allah(that Which Allah wills)which makes me know you after some prayers with fasting to him, I am also ready to be with you if you accept me with all your heart. ', 57, 'publish'),
(3, '2020-05-19 05:29:07', 'how to invest in share markit', 'shoaib', 'author.jpg', 'service10.jpg', 'share markit', 'share marki,urdu tutorial', 'My dear I appreciate your mail to me how are you and your health which is very important to me I hope fine inch Allah, My dear I know that this mail will be a surprise to you and I am sure that you would hardly expect such mail from me since we are just new friends but I am doing it because of the situation at hand and decided to let you know every thing about me because I believe it is masha Allah(that Which Allah wills)which makes me know you after some prars with fasting to him, I am also ready to be with you if you accept me with all your heart. ', 21, 'publish'),
(4, '2019-07-22 11:44:58', 'how to remve folder', 'shoaib', 'author.jpg', 'service10.jpg', 'basic tech', 'basic tech,urdu tutorial', 'My dear I appreciate your mail to me how are you and your health which is very important to me I hope fine inch Allah, My dear I know that this mail will be a surprise to you and I am sure that you would hardly expect such mail from me since we are just new friends but I am doing it because of the situation at hand and decided to let you know every thing about me because I believe it is masha Allah(that Which Allah wills)which makes me know you after some prars with fasting to him, I am also ready to be with you if you accept me with all your heart. ', 27, 'publish'),
(5, '2020-05-18 13:25:07', 'how to reverse age', 'shoaib', 'author.jpg', 'service2.jpg', 'basic tech', 'reverse age,urdu tutorial', 'My dear I appreciate your mail to me how are you and your health which is very important to me I hope fine inch Allah, My dear I know that this mail will be a surprise to you and I am sure that you would hardly expect such mail from me since we are just new friends but I am doing it because of the situation at hand and decided to let you know every thing about me because I believe it is masha Allah(that Which Allah wills)which makes me know you after some prars with fasting to him, I am also ready to be with you if you accept me with all your heart. ', 27, 'publish'),
(25, '2019-07-22 11:47:18', 'jhhkgj', 'arfa', '14569700054_3239d48fda_k.jpg', 'related2.jpg', 'basic tech', 'basic tech', 'kldf sasfhas  asfdjask f', 7, 'publish'),
(26, '2019-07-22 11:53:32', 'cryptocruncy me invest kren', 'arfa', '14569700054_3239d48fda_k.jpg', 'related1.jpg', 'Silicon vally', '', 'asfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifjasfkjs fjaslfia fadif aslfjalf asif ajf lsajf sa fjsajf adifj', 16, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `salt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `date`, `fname`, `lname`, `username`, `email`, `image`, `password`, `role`, `details`, `salt`) VALUES
(7, 1234567899, 'muhammad', 'shoaib_shebi', 'aliraza', 'shoa@gmail.com', '460baf339a0.jpg', 'shoaib123', 'admin', '', ''),
(8, 1234567899, 'muhammad', 'shoaibr', 'aliraz', 'sho@gmail.com', '2tDso26.jpg', 'shoaib123', 'admin', '', ''),
(10, 1563628184, 'ali', 'kk', 'shoaib', 'shoaib@gmail.com', 'mh.jpg', 'shoaib123', 'admin', 'its very glad to see you\r\nits very glad to see youits very glad to see youits very glad to see youits very glad to see youits very glad to see you', ''),
(11, 1563729191, 'aiza', 'khan', 'aizakhan', 'aiza@gmail.com', '3.jpg', 'shoaib123', 'admin', '', ''),
(12, 1563784709, 'arfa', 'arfa', 'arfa', 'arfa@gmail.com', '14569700054_3239d48fda_k.jpg', 'shoaib123', 'author', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
