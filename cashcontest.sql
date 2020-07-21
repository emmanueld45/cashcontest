-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 04:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashcontest`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `sub_type` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `data` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `userid`, `type`, `sub_type`, `time`, `date`, `status`, `data`) VALUES
(2, '', 'contest', 'memory_contest', '1595068832', '18-07-20', '0', '5f107419a1327'),
(3, '', 'contest', 'memory_contest', '1595076671', '18-07-20', '0', '5f107419a1327'),
(4, '', 'contest', 'memory_contest', '1595077197', '18-07-20', '0', '5f107419a1327'),
(5, '', 'contest', 'memory_contest', '1595077277', '18-07-20', '0', '5f107419a1327'),
(9, '', 'contest', 'memory_contest', '1595085813', '18-07-20', '0', '5f107419a1327'),
(10, '', 'contest', 'memory_contest', '1595085978', '18-07-20', '0', '5f107419a1327'),
(15, '', 'contest', 'memory_challenge', '1595178630', '19-07-20', '0', '5f11b20b7a1e7'),
(16, '', 'contest', 'memory_challenge', '1595179684', '19-07-20', '0', '5f11b20b7a1e7'),
(17, '', 'contest', 'memory_contest', '1595224425', '20-07-20', '0', '5f107419a1327'),
(18, '', 'contest', 'memory_contest', '1595224549', '20-07-20', '0', '5f107419a1327'),
(19, '', 'contest', 'memory_contest', '1595224629', '20-07-20', '0', '5f107419a1327'),
(20, '', 'contest', 'memory_contest', '1595224738', '20-07-20', '0', '5f107419a1327'),
(21, '', 'contest', 'memory_contest', '1595224948', '20-07-20', '0', '5f107419a1327'),
(22, '', 'contest', 'memory_contest', '1595225044', '20-07-20', '0', '5f107419a1327'),
(23, '', 'contest', 'memory_challenge', '1595226086', '20-07-20', '0', '5f11b20b7a1e7'),
(24, '', 'contest', 'memory_challenge', '1595226162', '20-07-20', '0', '5f11b20b7a1e7'),
(25, '', 'contest', 'memory_challenge', '1595226242', '20-07-20', '0', '5f11b20b7a1e7'),
(26, '', 'contest', 'memory_challenge', '1595226959', '20-07-20', '0', '5f11b20b7a1e7'),
(27, '', 'contest', 'memory_challenge', '1595227094', '20-07-20', '0', '5f11b20b7a1e7'),
(28, '', 'contest', 'memory_challenge', '1595227317', '20-07-20', '0', '5f11b20b7a1e7'),
(29, '', 'contest', 'typing_contest', '1595249187', '20-07-20', '0', '5f158ed502acb'),
(30, '', 'contest', 'typing_contest', '1595253285', '20-07-20', '0', '5f158ed502acb'),
(31, '', 'contest', 'typing_contest', '1595323525', '21-07-20', '0', '5f158ed502acb'),
(32, '', 'challenge', 'typing_challenge', '1595327145', '21-07-20', '0', '5f16c1863940e'),
(33, '', 'challenge', 'typing_challenge', '1595327268', '21-07-20', '0', '5f16c1863940e'),
(34, '', 'challenge', 'typing_challenge', '1595327364', '21-07-20', '0', '5f16c1863940e'),
(35, '5ef9e0bba9cbe', 'contest', 'memory_contest', '1595328549', '21-07-20', '0', '5f16c789a7fc5'),
(36, '5efa668ebd5c6', 'contest', 'memory_contest', '1595328645', '21-07-20', '0', '5f16c789a7fc5'),
(37, '5f13130e4619e', 'contest', 'memory_contest', '1595328709', '21-07-20', '0', '5f16c789a7fc5'),
(38, '5f13133e990df', 'contest', 'memory_contest', '1595328777', '21-07-20', '0', '5f16c789a7fc5'),
(39, '5ef9e0bba9cbe', 'contest', 'memory_challenge', '1595329121', '21-07-20', '0', '5f16ca0c1b075'),
(40, '5efa668ebd5c6', 'contest', 'memory_challenge', '1595329203', '21-07-20', '0', '5f16ca0c1b075'),
(41, '5f13133e990df', 'contest', 'memory_challenge', '1595329477', '21-07-20', '0', '5f16ca0c1b075'),
(42, '5ef9e0bba9cbe', 'contest', 'typing_contest', '1595329937', '21-07-20', '0', '5f16cd5896f8b'),
(43, '5efa668ebd5c6', 'contest', 'typing_contest', '1595330042', '21-07-20', '0', '5f16cd5896f8b'),
(44, '5f13133e990df', 'contest', 'typing_contest', '1595330133', '21-07-20', '0', '5f16cd5896f8b'),
(45, '5f13130e4619e', 'contest', 'typing_contest', '1595330204', '21-07-20', '0', '5f16cd5896f8b'),
(46, '5ef9e0bba9cbe', 'challenge', 'typing_challenge', '1595330499', '21-07-20', '0', '5f16cfa4144f6'),
(47, '5efa668ebd5c6', 'challenge', 'typing_challenge', '1595330592', '21-07-20', '0', '5f16cfa4144f6');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `main_balance` varchar(500) NOT NULL,
  `users_balance` varchar(500) NOT NULL,
  `airtime_balance` varchar(500) NOT NULL,
  `free_airtime_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `main_balance`, `users_balance`, `airtime_balance`, `free_airtime_status`) VALUES
(1, '1100', '0', '0', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_requests`
--

CREATE TABLE `challenge_requests` (
  `id` int(11) NOT NULL,
  `challenge_type` varchar(500) NOT NULL,
  `challenge_id` varchar(500) NOT NULL,
  `sender_id` varchar(500) NOT NULL,
  `receiver_id` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenge_requests`
--

INSERT INTO `challenge_requests` (`id`, `challenge_type`, `challenge_id`, `sender_id`, `receiver_id`, `time`, `date`) VALUES
(2, 'memory_challenge', '5f11b20b7a1e7', '5efa668ebd5c6', '5ef9e0bba9cbe', '1595220209', '20-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `memory_challenge`
--

CREATE TABLE `memory_challenge` (
  `id` int(11) NOT NULL,
  `challenge_id` varchar(500) NOT NULL,
  `creator_id` varchar(500) NOT NULL,
  `coin_price` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `start_time` varchar(500) NOT NULL,
  `end_time` varchar(500) NOT NULL,
  `min_participants` varchar(500) NOT NULL,
  `max_participants` varchar(500) NOT NULL,
  `accessibility` varchar(500) NOT NULL,
  `have_results` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memory_challenge`
--

INSERT INTO `memory_challenge` (`id`, `challenge_id`, `creator_id`, `coin_price`, `time`, `date`, `status`, `start_time`, `end_time`, `min_participants`, `max_participants`, `accessibility`, `have_results`) VALUES
(3, '5f16ca0c1b075', '5ef9e0bba9cbe', '200', '1595329036', '21-07-20', 'Running', '1595329036', '300', '2', '5', 'public', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `memory_challenge_participants`
--

CREATE TABLE `memory_challenge_participants` (
  `id` int(11) NOT NULL,
  `challenge_id` varchar(500) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `finish_time` varchar(500) NOT NULL,
  `finish_status` varchar(500) NOT NULL,
  `amount_won` varchar(500) NOT NULL,
  `won` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memory_challenge_participants`
--

INSERT INTO `memory_challenge_participants` (`id`, `challenge_id`, `userid`, `finish_time`, `finish_status`, `amount_won`, `won`) VALUES
(10, '5f16ca0c1b075', '5ef9e0bba9cbe', '41', 'played', '0', 'no'),
(11, '5f16ca0c1b075', '5efa668ebd5c6', '67', 'played', '0', 'no'),
(12, '5f16ca0c1b075', '5f13133e990df', '40', 'played', '480', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `memory_contest`
--

CREATE TABLE `memory_contest` (
  `id` int(11) NOT NULL,
  `contest_id` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `contest_category` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `start_time` varchar(500) NOT NULL,
  `end_time` varchar(500) NOT NULL,
  `have_results` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memory_contest`
--

INSERT INTO `memory_contest` (`id`, `contest_id`, `image`, `contest_category`, `time`, `date`, `status`, `start_time`, `end_time`, `have_results`) VALUES
(51, '5f16c789a7fc5', 'contestimages/contestimg1.jpg', 'Gold', '1595328393', '21-07-20', 'Running', '1595328393', '60', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `memory_contest_participants`
--

CREATE TABLE `memory_contest_participants` (
  `id` int(11) NOT NULL,
  `contest_id` varchar(500) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `finish_time` varchar(500) NOT NULL,
  `finish_status` varchar(500) NOT NULL,
  `amount_won` varchar(500) NOT NULL,
  `won` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memory_contest_participants`
--

INSERT INTO `memory_contest_participants` (`id`, `contest_id`, `userid`, `finish_time`, `finish_status`, `amount_won`, `won`) VALUES
(41, '5f16c789a7fc5', '5ef9e0bba9cbe', '31', 'played', '0', 'no'),
(42, '5f16c789a7fc5', '5efa668ebd5c6', '28', 'played', '0', 'no'),
(43, '5f16c789a7fc5', '5f13130e4619e', '24', 'played', '320', 'yes'),
(44, '5f16c789a7fc5', '5f13133e990df', '27', 'played', '0', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `typing_challenge`
--

CREATE TABLE `typing_challenge` (
  `id` int(11) NOT NULL,
  `challenge_id` varchar(500) NOT NULL,
  `creator_id` varchar(500) NOT NULL,
  `coin_price` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `start_time` varchar(500) NOT NULL,
  `end_time` varchar(500) NOT NULL,
  `min_participants` varchar(500) NOT NULL,
  `max_participants` varchar(500) NOT NULL,
  `accessibility` varchar(500) NOT NULL,
  `have_results` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typing_challenge`
--

INSERT INTO `typing_challenge` (`id`, `challenge_id`, `creator_id`, `coin_price`, `time`, `date`, `status`, `start_time`, `end_time`, `min_participants`, `max_participants`, `accessibility`, `have_results`) VALUES
(6, '5f16cfa4144f6', '5ef9e0bba9cbe', '150', '1595330468', '21-07-20', 'Running', '1595330468', '300', '3', '5', 'public', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `typing_challenge_participants`
--

CREATE TABLE `typing_challenge_participants` (
  `id` int(11) NOT NULL,
  `challenge_id` varchar(500) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `finish_time` varchar(500) NOT NULL,
  `finish_status` varchar(500) NOT NULL,
  `amount_won` varchar(500) NOT NULL,
  `won` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typing_challenge_participants`
--

INSERT INTO `typing_challenge_participants` (`id`, `challenge_id`, `userid`, `finish_time`, `finish_status`, `amount_won`, `won`) VALUES
(4, '5f16cfa4144f6', '5ef9e0bba9cbe', '48', 'played', '150', 'yes'),
(5, '5f16cfa4144f6', '5efa668ebd5c6', '43', 'played', '150', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `typing_challenge_sentences`
--

CREATE TABLE `typing_challenge_sentences` (
  `id` int(11) NOT NULL,
  `challenge_id` varchar(500) NOT NULL,
  `sentence` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typing_challenge_sentences`
--

INSERT INTO `typing_challenge_sentences` (`id`, `challenge_id`, `sentence`) VALUES
(26, '5f16cfa4144f6', 'Typing contest is sending cash prizes to persons'),
(27, '5f16cfa4144f6', 'Would you share every post of typing contest'),
(28, '5f16cfa4144f6', 'Typing contest is sending cash prizes to persons'),
(29, '5f16cfa4144f6', 'Typing contest is sending cash prizes to persons'),
(30, '5f16cfa4144f6', 'Typing contest is sending cash prizes to persons');

-- --------------------------------------------------------

--
-- Table structure for table `typing_contest`
--

CREATE TABLE `typing_contest` (
  `id` int(11) NOT NULL,
  `contest_id` varchar(500) NOT NULL,
  `contest_code` varchar(500) NOT NULL,
  `contest_image` varchar(500) NOT NULL,
  `contest_category` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `start_time` varchar(500) NOT NULL,
  `end_time` varchar(500) NOT NULL,
  `have_results` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typing_contest`
--

INSERT INTO `typing_contest` (`id`, `contest_id`, `contest_code`, `contest_image`, `contest_category`, `status`, `time`, `date`, `start_time`, `end_time`, `have_results`) VALUES
(19, '5f16cd5896f8b', 'TD9I12', 'contestimages/contestimg2.jpg', 'Silver', 'Running', '1595329880', '21-07-20', '1595329880', '120', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `typing_contest_participants`
--

CREATE TABLE `typing_contest_participants` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `contest_id` varchar(500) NOT NULL,
  `finish_time` varchar(500) NOT NULL,
  `finish_status` varchar(500) NOT NULL,
  `amount_won` varchar(500) NOT NULL,
  `won` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typing_contest_participants`
--

INSERT INTO `typing_contest_participants` (`id`, `userid`, `contest_id`, `finish_time`, `finish_status`, `amount_won`, `won`) VALUES
(17, '5ef9e0bba9cbe', '5f16cd5896f8b', '39', 'played', '80', 'yes'),
(18, '5efa668ebd5c6', '5f16cd5896f8b', '61', 'played', '0', 'no'),
(19, '5f13133e990df', '5f16cd5896f8b', '40', 'played', '0', 'no'),
(20, '5f13130e4619e', '5f16cd5896f8b', '39', 'played', '80', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `typing_contest_sentences`
--

CREATE TABLE `typing_contest_sentences` (
  `id` int(11) NOT NULL,
  `contest_id` varchar(500) NOT NULL,
  `sentence` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typing_contest_sentences`
--

INSERT INTO `typing_contest_sentences` (`id`, `contest_id`, `sentence`) VALUES
(70, '5f16cd5896f8b', 'what would you do with 10million naira today'),
(71, '5f16cd5896f8b', 'what would you do with 10million naira today'),
(72, '5f16cd5896f8b', 'what would you do with 10million naira today'),
(73, '5f16cd5896f8b', 'Would you share every post of typing contest'),
(74, '5f16cd5896f8b', 'what would you do with 10million naira today');

-- --------------------------------------------------------

--
-- Table structure for table `typing_sentences`
--

CREATE TABLE `typing_sentences` (
  `id` int(11) NOT NULL,
  `sentence` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typing_sentences`
--

INSERT INTO `typing_sentences` (`id`, `sentence`) VALUES
(1, 'Typing contest is sending cash prizes to persons'),
(2, 'Would you share every post of typing contest'),
(3, 'what would you do with 10million naira today');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `coins` varchar(500) NOT NULL,
  `withdrawable_balance` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `new` varchar(500) NOT NULL,
  `total_received` varchar(500) NOT NULL,
  `airtime_balance` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uniqueid`, `name`, `phone`, `email`, `password`, `image`, `coins`, `withdrawable_balance`, `status`, `time`, `date`, `new`, `total_received`, `airtime_balance`) VALUES
(1, '5ef9e0bba9cbe', 'Emmanuel Danjumbo', '08162383712', 'emmy@gmail.com', '$2y$10$ja0tx24oC8SpOUFYhZeG1upHAQQJSZETAlIdDbpcuwIBFjSS.pAzy', 'userimages/default-image.jpeg', '0', '1150', 'active', '1593434299', '29-06-20', 'yes', '0', '0'),
(2, '5efa668ebd5c6', 'Mary Jones', '09012781267', 'mary@gmail.com', '$2y$10$6OOykyksqeRXqXDkW0Hy7ujxzGlu.dskIaUG0Qur1kAEXdkiuWSgO', 'userimages/default-image.jpeg', '0', '1190', 'active', '1593468558', '30-06-20', 'yes', '0', ''),
(3, '5f13130e4619e', 'Sarah', '0902189822', 'sarah@gmail.com', '$2y$10$q9JqlXP.D/ctlqSGkhcGdOl6mrwEmnnUju3br5Bvfo0efTKRmqD7C', 'userimages/default-image.jpeg', '350', '930', 'active', '1595085582', '18-07-20', 'yes', '0', '0'),
(4, '5f13133e990df', 'James', '07026712617', 'james@gmail.com', '$2y$10$rtacAwZKXeSUTFkrMxRJme8MGqm4ZPNpK1j40qfZlVkWA3yrYu9Yq', 'userimages/default-image.jpeg', '150', '1610', 'active', '1595085630', '18-07-20', 'yes', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `winners_history`
--

CREATE TABLE `winners_history` (
  `id` int(11) NOT NULL,
  `winner_id` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `history_type` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winners_history`
--

INSERT INTO `winners_history` (`id`, `winner_id`, `amount`, `history_type`, `time`, `date`) VALUES
(1, '5ef9e0bba9cbe', '400', 'memory_contest', '1595176593', '19-07-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_requests`
--
ALTER TABLE `challenge_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memory_challenge`
--
ALTER TABLE `memory_challenge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memory_challenge_participants`
--
ALTER TABLE `memory_challenge_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memory_contest`
--
ALTER TABLE `memory_contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memory_contest_participants`
--
ALTER TABLE `memory_contest_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typing_challenge`
--
ALTER TABLE `typing_challenge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typing_challenge_participants`
--
ALTER TABLE `typing_challenge_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typing_challenge_sentences`
--
ALTER TABLE `typing_challenge_sentences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typing_contest`
--
ALTER TABLE `typing_contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typing_contest_participants`
--
ALTER TABLE `typing_contest_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typing_contest_sentences`
--
ALTER TABLE `typing_contest_sentences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typing_sentences`
--
ALTER TABLE `typing_sentences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners_history`
--
ALTER TABLE `winners_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `challenge_requests`
--
ALTER TABLE `challenge_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `memory_challenge`
--
ALTER TABLE `memory_challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `memory_challenge_participants`
--
ALTER TABLE `memory_challenge_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `memory_contest`
--
ALTER TABLE `memory_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `memory_contest_participants`
--
ALTER TABLE `memory_contest_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `typing_challenge`
--
ALTER TABLE `typing_challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `typing_challenge_participants`
--
ALTER TABLE `typing_challenge_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `typing_challenge_sentences`
--
ALTER TABLE `typing_challenge_sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `typing_contest`
--
ALTER TABLE `typing_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `typing_contest_participants`
--
ALTER TABLE `typing_contest_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `typing_contest_sentences`
--
ALTER TABLE `typing_contest_sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `typing_sentences`
--
ALTER TABLE `typing_sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `winners_history`
--
ALTER TABLE `winners_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
