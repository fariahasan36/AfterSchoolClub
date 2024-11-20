-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 04:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fhtalukder`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `active`) VALUES
(1, 'Sports', 1),
(2, 'Learning', 1),
(3, 'Special Interest', 1),
(4, 'Softskill', 1),
(5, 'Community Activity', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `days` varchar(100) NOT NULL,
  `fromTime` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `fromAge` int(10) NOT NULL,
  `toAge` int(10) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `toTime` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `name`, `category_id`, `benefits`, `days`, `fromTime`, `fromAge`, `toAge`, `location`, `toTime`, `price`) VALUES
(1, 'Football', 2, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-20 16:57:20.000000', 5, 40, 'Campus football field.', '2023-12-20 21:30:00.000000', 20),
(2, 'Cricket', 1, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-20 12:58:00.000000', 5, 30, 'Campus football field.', '2023-12-20 18:30:00.000000', 17.5),
(3, 'Tennis', 1, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-18 12:58:12.185187', 5, 30, 'Campus football field.', '2023-12-17 18:30:00.037000', 17.5),
(4, 'Vollyball', 1, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-18 12:57:44.726821', 5, 30, 'Campus football field.', '2023-12-17 18:30:00.037000', 17.5),
(5, 'Programming', 2, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-18 12:58:00.950888', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(6, 'English Spelling', 2, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-18 12:59:00.177577', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(7, 'Coloring', 2, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(8, 'Maths', 2, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(9, 'Sewing', 3, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(10, 'Sclupture', 3, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(11, 'Gardening', 3, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(12, 'Drama/Theatre', 3, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(13, 'Presentation Skill', 4, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(14, 'Leadership', 4, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(15, 'Writing', 4, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(16, 'Reading', 4, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(17, 'Cleaning', 5, 'Communication, Reduce obesity and any chronic diseases .', 'Monday - Sunday.', '2023-12-03 13:00:00.308000', 5, 30, 'Campus football field.', '2023-12-17 15:30:00.037000', 17.5),
(28, 'Cloth Collecting', 5, 'Communication ', 'Monday - Friday', '2023-12-19 08:47:00.000000', 5, 30, 'Football Club', '2023-12-19 13:50:00.000000', 20.98);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedback`) VALUES
(9, 16, 'I want to join cricket club. I do not know how to join in the cricket club. I would like to know the full procedure of joining a club. I also want to know the price and total course days of the club. Please send me an email at your earliest possible time.'),
(11, 22, 'I want to join cricket club. I do not know how to join in the cricket club. I would like to know the full procedure of joining a club. I also want to know the price and total course days of the club. Please send me an email at your earliest possible time.'),
(12, 20, 'I want to join cricket club. I do not know how to join in the cricket club. I would like to know the full procedure of joining a club. I also want to know the price and total course days of the club. Please send me an email at your earliest possible time.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `first_name`, `last_name`, `email`, `password`, `active`, `admin`) VALUES
(16, 'faria', 'Faria', 'Hasan Talukder', 'faria@gmail.com', '$2y$10$L5f9zIbLAT7BgmZMC5RuQ.OzNGqnHJlYpasL7QcQFbV5ouViwQDS2', 1, 0),
(19, 'admin', 'Bristy', 'Sushan', 'bristy@gmail.com', '$2y$10$JXA3rS4G.GNOAIiUf5cQ7Occfvm2zsWh6PgXjwFRMWReZMDgQTFVa', 1, 1),
(20, 'laila', 'Laila', 'Shimu', 'laila@gmail.com', '$2y$10$AK1IceLgStMHHt7Ho3XyZet/yhp/dQ.D3w2VPt4r2Yi/n0M8FMa7.', 1, 0),
(22, 'ireen', 'Afifa', 'Ireen', 'ireen@gmail.com', '$2y$10$cItSyWBMwacXboq86UhBkO4BGDPpWDwllL2TJR7VUpy0VdK1/KH4.', 1, 0),
(23, 'hosneara', 'Hosne', 'Ara', 'hosneara@gmail.com', '$2y$10$DcNDvsW1lDuNJvUfuV9no.6lQUNZ5RV8OxDiYxz4PNjkeXgcKdboG', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_club`
--

CREATE TABLE `user_club` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_club`
--

INSERT INTO `user_club` (`id`, `user_id`, `club_id`, `active`) VALUES
(1, 16, 28, 1),
(3, 19, 8, 1),
(4, 20, 14, 1),
(5, 22, 28, 1),
(6, 16, 5, 1),
(7, 20, 3, 1),
(8, 23, 16, 1),
(9, 23, 5, 1),
(10, 23, 10, 1),
(11, 23, 11, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`),
  ADD KEY `fk_category_id` (`category_id`) USING BTREE;

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_club`
--
ALTER TABLE `user_club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_club_id` (`club_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_club`
--
ALTER TABLE `user_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_club`
--
ALTER TABLE `user_club`
  ADD CONSTRAINT `fk_club_id` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`club_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
