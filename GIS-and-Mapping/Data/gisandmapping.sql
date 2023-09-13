-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 01:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gisandmapping`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `tile` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthday` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','lgu') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `birthday`, `username`, `password`, `role`, `created_at`) VALUES
(4, 'rando', 'rando', 'rando', '2023-09-13', 'rando', '$2y$10$/PC1FYkC4V2/mw65tP5p3eaEgErZNVzd2a7ZaSy2Ye0dbOj/zWQ32', 'lgu', '2023-09-08 03:02:43'),
(64, 'mike', 'mike', 'watowski', '2014-05-05', 'mike', '$2y$10$kKqllMqO5GbKkgqo/d8aLulqq6qXsq206..crZBolvKEnVhyArj3W', 'user', '2023-09-05 06:42:06'),
(92, 'harold', 'mat', 'mattoy', '1994-02-04', 'harold', '$2y$10$2vlgDeH0v825Ro4yHNC8uuva9qXQmCxfYv.EwWW5kvKV23K/FIOku', 'admin', '2023-09-05 08:25:15'),
(517, 'gust', 'of', 'wind', '2023-09-01', 'rock', '$2y$10$t/l8T2/51QMdvTgyza5jb.YBZx8RRuH1n7grB26e/94xIOIJPvCre', 'user', '2023-09-07 05:51:27'),
(9038, 'smiley', 's', 'sadness', '2000-10-19', 'hello', '$2y$10$euREPVWWjF852UVFe9WS9.FUtPD9Podhz5mLiJco3ee2R5BIuAkT6', 'lgu', '2023-09-08 03:18:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
