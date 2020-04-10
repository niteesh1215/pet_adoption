-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 10:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `ad_id` varchar(50) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`ad_id`, `image_url`) VALUES
('1446376271586532131', '9381586532131.pet.jpg'),
('1446376271586532131', '9891586532132.pet.jpg'),
('1446376271586532131', '2931586532132.pet.jpg'),
('1446376271586532131', '3921586532132.pet.jpg'),
('1446376271586532131', '8621586532132.pet.jpg'),
('1867174551586532890', '6741586532890.pet.jpg'),
('7075340891586533065', '9751586533065.pet.jpg'),
('7899709091586533285', '9671586533285.pet.jpg'),
('7344662611586533418', '4061586533418.pet.jpg'),
('2577214841586533732', '4631586533732.pet.jpg'),
('9375583291586541852', '3471586541852.pet.jpg'),
('9737032241586543420', '2441586543420.pet.jpg'),
('9737032241586543420', '8771586543420.pet.jpg'),
('9737032241586543420', '9661586543421.pet.jpg'),
('9737032241586543420', '9011586543421.pet.jpg'),
('8016917361586543483', '4471586543483.pet.jpg'),
('7509654121586543483', '6071586543483.pet.jpg'),
('7509654121586543483', '4601586543483.pet.jpg'),
('7509654121586543483', '5151586543494.pet.jpg'),
('3111329701586544243', '6861586544244.pet.jpg'),
('3111329701586544243', '2591586544244.pet.jpg'),
('3111329701586544243', '2881586544244.pet.jpg'),
('3111329701586544243', '5381586544244.pet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ad_info`
--

CREATE TABLE `ad_info` (
  `ad_id` varchar(50) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `pet_name` varchar(100) NOT NULL DEFAULT 'unknown',
  `pet_category` varchar(10) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` tinyint(1) NOT NULL,
  `age_type` varchar(8) NOT NULL,
  `size` tinyint(1) NOT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  `neutured` tinyint(1) NOT NULL,
  `weight` tinyint(1) NOT NULL,
  `city_village` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `about_pet` varchar(600) DEFAULT NULL,
  `adoption_rules` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_info`
--

INSERT INTO `ad_info` (`ad_id`, `user_id`, `pet_name`, `pet_category`, `breed`, `gender`, `age`, `age_type`, `size`, `vaccinated`, `neutured`, `weight`, `city_village`, `district`, `state`, `description`, `about_pet`, `adoption_rules`) VALUES
('1446376271586532131', 'niteesh', 'aa', 'Dog', 'dogbreed2', '1', 2, 'Month(s)', 1, -1, -1, -1, 'aaa', 'Bardez', 'Goa', 'aasssasa', 'asasasas', 'assasas'),
('1867174551586532890', 'niteesh', 'aa', 'Dog', 'dogbreed1', '0', 2, 'Month(s)', 2, 1, 1, 3, 'aaa', 'Bardez', 'Karnataka', 'adasdsd', 'sadsad', 'sadadad'),
('2577214841586533732', 'niteesh', 'aa', 'Fish', 'fishbreed1', '1', 1, 'Month(s)', 2, 1, 1, 1, 'aaa', 'Bardez', 'Goa', 'adddaaa', 'adadaad', 'addadad'),
('3111329701586544243', 'niteesh', 'aa', 'Dog', 'dogbreed1', '1', 1, 'Month(s)', 1, 1, 0, 1, 'aaa', 'aaa', 'Maharastra', 'jhghjk', '', ''),
('7075340891586533065', 'niteesh', 'aa', 'Fish', 'fishbreed1', '0', 1, 'Month(s)', 2, 1, 1, 2, 'aaa', 'Bardez', 'Karnataka', 'saadasd', 'asdadsad', 'sadassa'),
('7344662611586533418', 'niteesh', 'aa', 'Fish', 'fishbreed2', '1', 1, 'Month(s)', 2, 0, 1, 1, 'aaa', 'Bardez', 'Maharastra', 'sfdgfukjjj', 'dadsss', 'asa'),
('7509654121586543483', 'niteesh', 'aa', 'Dog', 'dogbreed2', '0', 2, 'Month(s)', 1, 1, 0, 2, 'aaa', 'Bardez', 'Karnataka', 'sasas', '', ''),
('7899709091586533285', 'niteesh', 'aa', 'Fish', 'fishbreed1', '1', 1, 'Month(s)', 1, 0, 0, 1, 'aaa', 'Bardez', 'Karnataka', 'adsaad', 'adasdad', 'adadads'),
('8016917361586543483', 'niteesh', 'aa', 'Dog', 'dogbreed2', '0', 2, 'Month(s)', 1, 1, 0, 2, 'aaa', 'Bardez', 'Karnataka', 'sasas', '', ''),
('9375583291586541852', 'niteesh', 'aa', 'Fish', 'fishbreed2', '1', 1, 'Month(s)', 2, 0, 1, 2, 'aaa', 'Bardez', 'Maharastra', 'ggikhkj', '', ''),
('9737032241586543420', 'niteesh', 'aa', 'Dog', 'dogbreed1', '1', 1, 'Month(s)', 2, 0, 1, 1, 'aaa', 'Bardez', 'Maharastra', 'adad', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pet_characteristics`
--

CREATE TABLE `pet_characteristics` (
  `id` int(11) NOT NULL,
  `ad_id` varchar(30) NOT NULL,
  `characteristics` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_info`
--
ALTER TABLE `ad_info`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_characteristics`
--
ALTER TABLE `pet_characteristics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_id` (`ad_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pet_characteristics`
--
ALTER TABLE `pet_characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
