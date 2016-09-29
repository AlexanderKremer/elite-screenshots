-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2016 at 05:39 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elite_screenshots`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(250) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(28, 'Awesome!!', 9, 25, '2016-08-26 03:10:44', '2016-08-26 03:10:44'),
(29, 'Really good', 14, 25, '2016-08-26 03:34:26', '2016-08-26 03:34:26'),
(30, 'Amazing how much detail is modelled', 14, 33, '2016-08-26 03:35:10', '2016-08-26 03:35:10'),
(31, 'Need to buy a python again, miss that ship', 9, 31, '2016-08-26 03:35:46', '2016-08-26 03:35:46'),
(32, 'Beautiful', 9, 34, '2016-08-26 03:36:15', '2016-08-26 03:36:15'),
(33, 'Need to go there some day', 15, 35, '2016-08-26 03:38:13', '2016-08-26 03:38:13'),
(34, 'Badass', 15, 27, '2016-08-26 03:38:25', '2016-08-26 03:38:25'),
(35, 'So clean looking', 15, 26, '2016-08-26 03:39:12', '2016-08-26 03:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `title`, `description`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(25, 'witchspace', 'Vulture about to enter witchspace', '57bfb28c3b8a9.jpg', 8, '2016-08-26 03:07:56', '2016-08-26 03:07:56'),
(26, 'Ice', 'Gas giant ice rings are truly a sight to behold', '57bfb318448ac.jpg', 9, '2016-08-26 03:10:16', '2016-08-26 03:10:16'),
(27, 'Diamondback', '', '57bfb4b195383.jpg', 10, '2016-08-26 03:17:05', '2016-08-26 03:17:05'),
(28, 'Viper glamour shot', '', '57bfb5228e425.jpg', 11, '2016-08-26 03:18:58', '2016-08-26 03:18:58'),
(29, 'Fireworks', 'Max chaff in the Anaconda', '57bfb5d90687e.jpg', 12, '2016-08-26 03:22:01', '2016-08-26 03:22:01'),
(30, 'Battlecruiser', 'Conflict zone with federation battlecruiser bringing freedom', '57bfb64a3d025.jpg', 13, '2016-08-26 03:23:54', '2016-08-26 03:23:54'),
(31, 'Python', 'My brand new python in ice white', '57bfb69dacd99.jpg', 14, '2016-08-26 03:25:17', '2016-08-26 03:25:17'),
(32, 'Horsehead nebula', 'The beauty of the horsehead nebula', '57bfb6f294e73.jpg', 9, '2016-08-26 03:26:42', '2016-08-26 03:26:42'),
(33, 'Details', '', '57bfb73064798.jpg', 14, '2016-08-26 03:27:44', '2016-08-26 03:27:44'),
(34, 'Rings', '', '57bfb776ad5f0.jpg', 15, '2016-08-26 03:28:54', '2016-08-26 03:28:54'),
(35, 'sagittarius A*', '', '57bfb7c662c0e.jpg', 15, '2016-08-26 03:30:14', '2016-08-26 03:30:14'),
(36, 'Patrol', '', '57bfb82635152.jpg', 12, '2016-08-26 03:31:50', '2016-08-26 03:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `privilege` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `privilege`) VALUES
(7, 'Admin', 'admin@gmail.com', '$2y$10$UKtZ00UuQGiStEL9pUVVsufCqpMQEg8ebrEv1SWFK3exQN31Oidba', 'admin'),
(8, 'loaf of paint', 'loaf@gmail.com', '$2y$10$tjngZ8ymX7Yp8m469qVbL.V.kRzdQI4QvypS/wQduGKBssgVb9Ii6', 'user'),
(9, 'Ricky bobby', 'Riccky.b@gmail.com', '$2y$10$HNHyTc0sMI7a62.z9Hpq9eaPw6co1.HKEavwRJRmhlGf1n0J87SNm', 'user'),
(10, 'Alec', 'Alec@yahoo.co.au', '$2y$10$UaO6WxMvS7hwD9ebHOQY3u5Wsz4p8eQxcSHHhNVXzI9k/Id1P446u', 'user'),
(11, 'Isaiah Evanson', 'isaiah@gmail.com', '$2y$10$gij.dF9/xJjL.OKPdxMqdu5UJw6X/KCbHBcjNJJCkRk4Gz9dN2Xty', 'user'),
(12, 'FruityMilk', 'Fruity@gmail.com', '$2y$10$ulVtbmHBsj7NvXnP0.IlvuwhlhxyE9d4flEWt8q/bAoTcpTCFXkgq', 'user'),
(13, 'Affinity', 'affinity@yahoo.co.nz', '$2y$10$LGQ9hfEB2GGZ11U8xJV/Du8Y/orKwHXmOMYJjEEkOHeUuUn3ZhrRa', 'user'),
(14, 'Bacon_Cone', 'Bacon@gmail.com', '$2y$10$N85en8mJiWEAb/4zJ9PiqutXlTJohStE.UHM44MrLO5URC8oca652', 'admin'),
(15, 'cobra', 'cobra@yahoo.com', '$2y$10$AHohXbS1BlaVdGNTI8CtgunCQEJSelKhxpQdVv4NHhLdQ9Ut4vRwW', 'user');

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
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `uploads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
