-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 11:59 AM
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
('3111329701586544243', '5381586544244.pet.jpg'),
('6698861701586688797', '8721586688797.pet.jpg'),
('6698861701586688797', '2331586688797.pet.jpg'),
('1129607961587720825', '6001587720825.pet.jpg'),
('1129607961587720825', '7871587720825.pet.jpg');

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
  `color` varchar(30) DEFAULT NULL,
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
  `adoption_rules` varchar(300) DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_info`
--

INSERT INTO `ad_info` (`ad_id`, `user_id`, `pet_name`, `pet_category`, `breed`, `color`, `gender`, `age`, `age_type`, `size`, `vaccinated`, `neutured`, `weight`, `city_village`, `district`, `state`, `description`, `about_pet`, `adoption_rules`, `available`) VALUES
('1129607961587720825', '9', 'aa', 'Dog', 'dogbreed1', NULL, '0', 2, 'Month(s)', 2, 1, 1, 1, 'aaa', 'Bardez', 'Karnataka', 'xczczxczxc', '', '', NULL),
('1446376271586532131', 'niteesh', 'aa', 'Dog', 'dogbreed2', NULL, '1', 2, 'Month(s)', 1, -1, -1, -1, 'aaa', 'Bardez', 'Goa', 'aasssasa', 'asasasas', 'assasas', NULL),
('1867174551586532890', 'niteesh', 'aa', 'Dog', 'dogbreed1', NULL, '0', 2, 'Month(s)', 2, 1, 1, 3, 'aaa', 'Bardez', 'Karnataka', 'adasdsd', 'sadsad', 'sadadad', NULL),
('2577214841586533732', 'niteesh', 'aa', 'Fish', 'fishbreed1', NULL, '1', 1, 'Month(s)', 2, 1, 1, 1, 'aaa', 'Bardez', 'Goa', 'adddaaa', 'adadaad', 'addadad', NULL),
('3111329701586544243', 'niteesh', 'aa', 'Dog', 'dogbreed1', NULL, '1', 1, 'Month(s)', 1, 1, 0, 1, 'aaa', 'aaa', 'Maharastra', 'jhghjk', '', '', NULL),
('6698861701586688797', '8', 'aa', 'Dog', 'dogbreed2', NULL, '1', 1, 'Month(s)', 2, 0, 0, 2, 'aaa', 'Bardez', 'Maharastra', 'aaaaassasa', '', '', NULL),
('7075340891586533065', 'niteesh', 'aa', 'Fish', 'fishbreed1', NULL, '0', 1, 'Month(s)', 2, 1, 1, 2, 'aaa', 'Bardez', 'Karnataka', 'saadasd', 'asdadsad', 'sadassa', NULL),
('7344662611586533418', 'niteesh', 'aa', 'Fish', 'fishbreed2', NULL, '1', 1, 'Month(s)', 2, 0, 1, 1, 'aaa', 'Bardez', 'Maharastra', 'sfdgfukjjj', 'dadsss', 'asa', NULL),
('7509654121586543483', 'niteesh', 'aa', 'Dog', 'dogbreed2', NULL, '0', 2, 'Month(s)', 1, 1, 0, 2, 'aaa', 'Bardez', 'Karnataka', 'sasas', '', '', NULL),
('7899709091586533285', 'niteesh', 'aa', 'Fish', 'fishbreed1', NULL, '1', 1, 'Month(s)', 1, 0, 0, 1, 'aaa', 'Bardez', 'Karnataka', 'adsaad', 'adasdad', 'adadads', NULL),
('8016917361586543483', 'niteesh', 'aa', 'Dog', 'dogbreed2', NULL, '0', 2, 'Month(s)', 1, 1, 0, 2, 'aaa', 'Bardez', 'Karnataka', 'sasas', '', '', NULL),
('9375583291586541852', 'niteesh', 'aa', 'Fish', 'fishbreed2', NULL, '1', 1, 'Month(s)', 2, 0, 1, 2, 'aaa', 'Bardez', 'Maharastra', 'ggikhkj', '', '', NULL),
('9737032241586543420', 'niteesh', 'aa', 'Dog', 'dogbreed1', NULL, '1', 1, 'Month(s)', 2, 0, 1, 1, 'aaa', 'Bardez', 'Maharastra', 'adad', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `First_name` varchar(50) DEFAULT NULL,
  `Last_name` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone_number` int(15) DEFAULT NULL,
  `Website` varchar(200) DEFAULT NULL,
  `Date_created` timestamp NULL DEFAULT NULL,
  `Date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `First_name`, `Last_name`, `Email`, `Phone_number`, `Website`, `Date_created`, `Date_updated`) VALUES
(1, 'klsdajfls', 'dsjflksjfkl', 'dslsjskjdl', 123456789, 'flkdjfskljsf', '0000-00-00 00:00:00', '2020-07-02 12:10:09'),
(2, 'dskflkasfjl', 'msdnaflnsaf', 'nsdfns', 122222, NULL, NULL, '2020-07-02 12:10:09');

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
  `address` varchar(255) NOT NULL,
  `profile_img_url` varchar(35) NOT NULL DEFAULT 'profile_img/default.jpg',
  `update_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `profile_img_url`, `update_timestamp`) VALUES
(2, 'Niteesh ', 'niteeshmahato15@gmail.com', 'a02cc9a3fc5def5275b5ca22f0d8f414', '9647899012', 'Siolim', 'Goa', 'profile_img/default.jpg', '2020-05-05 15:23:55'),
(5, 'Niteesh .', 'niteeshmahato16@gmail.com', '70873e8580c9900986939611618d7b1e', '9647899012', 'Siolim', 'Goa', 'profile_img/default.jpg', '2020-05-05 15:23:55'),
(9, 'Blinsia Pereira', 'blins12111@gmail.com', '897c8fde25c5cc5270cda61425eed3c8', '9647899012', 'Bengaluru', 'Karnataka', 'profile_img/default.jpg', '2020-05-05 15:23:55'),
(10, 'nit', 'nit@gmail.com', '897c8fde25c5cc5270cda61425eed3c8', '9672345612', 'siolim', 'Goa', 'profile_img/101589640192.jpg', '2020-05-16 16:43:12');

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

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) NOT NULL,
  `ad_id` varchar(50) NOT NULL,
  `user_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `ad_id`, `user_id`) VALUES
(24, '1129607961587720800', '10'),
(32, '1446376271586532000', '10'),
(33, '6698861701586689000', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_info`
--
ALTER TABLE `ad_info`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
