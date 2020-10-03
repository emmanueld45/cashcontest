-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 01:49 PM
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
-- Database: `contests10`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `data` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `userid`, `message`, `type`, `time`, `date`, `status`, `data`) VALUES
(95, '5f53e185bd81a', 'Just joined a memory contest', 'memory_contest', '1601704443', '03-10-20', '0', '5f7811f81b829'),
(96, '5f53e185bd81a', 'joined a typing contest', 'typing_contest', '1601705333', '03-10-20', '0', '5f781571649c7'),
(97, '5ef9e0bba9cbe', 'joined a typing contest', 'typing_contest', '1601713553', '03-10-20', '0', '5f783565b4bb5'),
(98, '5ef9e0bba9cbe', 'Just joined a memory contest', 'memory_contest', '1601716248', '03-10-20', '0', '5f784010ef162'),
(99, '5efa668ebd5c6', 'Just joined a memory contest', 'memory_contest', '1601716333', '03-10-20', '0', '5f784010ef162'),
(100, '5f13130e4619e', 'Just joined a memory contest', 'memory_contest', '1601716474', '03-10-20', '0', '5f784010ef162'),
(101, '5f13133e990df', 'Just joined a memory contest', 'memory_contest', '1601716566', '03-10-20', '0', '5f784010ef162'),
(102, '5efa668ebd5c6', 'won a memory contest', 'memory_contest_win', '1601716840', '03-10-20', '0', '5f784010ef162'),
(103, '5ef9e0bba9cbe', 'joined a typing contest', 'typing_contest', '1601717436', '03-10-20', '0', '5f7844b7d46c0'),
(104, '5efa668ebd5c6', 'joined a typing contest', 'typing_contest', '1601717507', '03-10-20', '0', '5f7844b7d46c0'),
(105, '5f13130e4619e', 'joined a typing contest', 'typing_contest', '1601717588', '03-10-20', '0', '5f7844b7d46c0'),
(106, '5f13133e990df', 'joined a typing contest', 'typing_contest', '1601717666', '03-10-20', '0', '5f7844b7d46c0'),
(107, '5f13133e990df', 'won a typing contest', 'typing_contest_win', '1601718490', '03-10-20', '0', '5f7844b7d46c0'),
(108, '5f13133e990df', 'deposited N300 for topup', 'coupon_payment', '1601724853', '03-10-20', '0', 'empty'),
(109, '5f13133e990df', 'deposited N500 for topup', 'coupon_payment', '1601725123', '03-10-20', '0', 'empty'),
(110, '5f13133e990df', 'withdrew N400 airtime', 'airtime_withdrawal', '1601725282', '03-10-20', '0', 'empty'),
(111, '5f13133e990df', 'withdrew N1000 airtime', 'airtime_withdrawal', '1601725349', '03-10-20', '0', 'empty'),
(112, '5f13133e990df', 'withdrew N2000 cash', 'cash_withdrawal', '1601725613', '03-10-20', '0', 'empty');

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
(1, '1670', '6100', '600', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `airtime_withdrawals`
--

CREATE TABLE `airtime_withdrawals` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `network` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airtime_withdrawals`
--

INSERT INTO `airtime_withdrawals` (`id`, `userid`, `amount`, `network`, `phone`, `status`, `time`, `date`) VALUES
(1, 'duhfakjsdhkaj', '200', 'MTN', '08801268919', 'unsettled', '1598248764', '24-08-20'),
(2, '5ef9e0bba9cbe', '100', 'airtel', '080238476327', 'unsettled', '1598331124', '25-08-20'),
(10, '5ef9e0bba9cbe', '100', 'mtn', '0806871634178', 'unsettled', '1598333720', '25-08-20'),
(11, '5ef9e0bba9cbe', '100', 'mtn', '08087566567', 'unsettled', '1598333752', '25-08-20'),
(12, '5ef9e0bba9cbe', '100', 'mtn', '', 'unsettled', '1598333843', '25-08-20'),
(13, '5ef9e0bba9cbe', '100', 'mtn', '090376371877', 'unsettled', '1599222192', '04-09-20'),
(14, '5f13133e990df', '400', 'mtn', '08014897124891', 'unsettled', '1601725282', '03-10-20'),
(15, '5f13133e990df', '1000', 'mtn', '080238476327', 'unsettled', '1601725349', '03-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `cash_withdrawals`
--

CREATE TABLE `cash_withdrawals` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `account_name` varchar(500) NOT NULL,
  `account_number` varchar(500) NOT NULL,
  `account_type` varchar(500) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_withdrawals`
--

INSERT INTO `cash_withdrawals` (`id`, `userid`, `amount`, `account_name`, `account_number`, `account_type`, `bank_name`, `status`, `time`, `date`) VALUES
(3, '5ef9e0bba9cbe', '1000', 'Emmy james', '72139871283', 'Savings', 'First Bank', 'unsettled', '1598331586', '25-08-20'),
(8, '5ef9e0bba9cbe', '1100', 'Mary Agbe', '2111665824', 'Savings', 'Gtbank', 'unsettled', '1598333554', '25-08-20'),
(10, '5f13133e990df', '2000', 'Emmanuel Danjumbo', '0182126712671', 'Savings', 'UBA', 'unsettled', '1601725613', '03-10-20');

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
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(500) NOT NULL,
  `coin_price` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `coin_price`, `status`) VALUES
(2, '2Z4EPK721W', '500', 'used');

-- --------------------------------------------------------

--
-- Table structure for table `live_feed_notifications`
--

CREATE TABLE `live_feed_notifications` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `live_feed_notifications`
--

INSERT INTO `live_feed_notifications` (`id`, `userid`, `status`) VALUES
(4, '5ef9e0bba9cbe', 'unseen'),
(5, '5efa668ebd5c6', 'seen'),
(6, '5f13130e4619e', 'unseen'),
(7, '5f13133e990df', 'seen'),
(8, '5f53e185bd81a', 'unseen'),
(9, '5ef9e0bba9cbe', 'unseen'),
(10, '5efa668ebd5c6', 'seen'),
(11, '5f13130e4619e', 'unseen'),
(12, '5f13133e990df', 'seen'),
(13, '5f53e185bd81a', 'unseen'),
(14, '5ef9e0bba9cbe', 'unseen'),
(15, '5efa668ebd5c6', 'unseen'),
(16, '5f13130e4619e', 'unseen'),
(17, '5f13133e990df', 'seen'),
(18, '5f53e185bd81a', 'unseen'),
(19, '5ef9e0bba9cbe', 'unseen'),
(20, '5efa668ebd5c6', 'unseen'),
(21, '5f13130e4619e', 'unseen'),
(22, '5f13133e990df', 'seen'),
(23, '5f53e185bd81a', 'unseen'),
(24, '5ef9e0bba9cbe', 'unseen'),
(25, '5efa668ebd5c6', 'unseen'),
(26, '5f13130e4619e', 'unseen'),
(27, '5f13133e990df', 'seen'),
(28, '5f53e185bd81a', 'unseen'),
(29, '5ef9e0bba9cbe', 'unseen'),
(30, '5efa668ebd5c6', 'unseen'),
(31, '5f13130e4619e', 'unseen'),
(32, '5f13133e990df', 'seen'),
(33, '5f53e185bd81a', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `memory_contest`
--

CREATE TABLE `memory_contest` (
  `id` int(11) NOT NULL,
  `contest_id` varchar(500) NOT NULL,
  `contest_code` varchar(500) NOT NULL,
  `contest_image` varchar(500) NOT NULL,
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

INSERT INTO `memory_contest` (`id`, `contest_id`, `contest_code`, `contest_image`, `contest_category`, `time`, `date`, `status`, `start_time`, `end_time`, `have_results`) VALUES
(176, '5f554fcf7f2ec', '#SRC238', 'contestimages/contestimg3.jpg', 'Diamond', '1599426511', '06-09-20', 'Ended', '1599426511', '1599426571', 'yes'),
(179, '5f555012c2a08', '#28GQF8', 'contestimages/contestimg3.jpg', 'Diamond', '1599426578', '06-09-20', 'Ended', '1599426578', '1599426878', 'yes'),
(184, '5f55d4ca46d9e', '#348EVC', 'contestimages/contestimg1.jpg', 'Silver', '1599460554', '07-09-20', 'Ended', '1599460554', '1599460674', 'yes'),
(190, '5f7811f81b829', '#36NJ1U', 'contestimages/contestimg2.jpg', 'Silver', '1601704440', '03-10-20', 'Ended', '1601704440', '1601704560', 'yes'),
(195, '5f784010ef162', '#ND78P0', 'contestimages/contestimg3.jpg', 'Gold', '1601716240', '03-10-20', 'Ended', '1601716240', '1601716840', 'yes'),
(204, '5f785010b1344', '#0W4D1F', 'contestimages/contestimg1.jpg', 'Gold', '1601720336', '03-10-20', 'Running', '1601720336', '1601720936', 'no'),
(205, '5f785010b2a7a', '#48N0ZE', 'contestimages/contestimg2.jpg', 'Silver', '1601720336', '03-10-20', 'Running', '1601720336', '1601720936', 'no');

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
(56, '5f53fbbec7685', '5f53e185bd81a', '0', 'pending', '0', 'no'),
(57, '5f5545a94024a', '5f53e185bd81a', '0', 'pending', '0', 'no'),
(58, '5f5546ef877e9', '5ef9e0bba9cbe', '2', 'pending', '0', 'no'),
(59, '5f554fcf7f2ec', '5ef9e0bba9cbe', '2', 'pending', '0', 'no'),
(60, '5f555012c2a08', '5ef9e0bba9cbe', '40', 'played', '160', 'yes'),
(61, '5f55d4ca46d9e', '5f53e185bd81a', '33', 'played', '50', 'yes'),
(62, '5f7811f81b829', '5f53e185bd81a', '10', 'pending', '50', 'yes'),
(63, '5f784010ef162', '5ef9e0bba9cbe', '25', 'played', '0', 'no'),
(64, '5f784010ef162', '5efa668ebd5c6', '20', 'played', '320', 'yes'),
(65, '5f784010ef162', '5f13130e4619e', '27', 'played', '0', 'no'),
(66, '5f784010ef162', '5f13133e990df', '22', 'played', '0', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `transaction_type` varchar(500) NOT NULL,
  `sub_type` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userid`, `transaction_type`, `sub_type`, `amount`, `time`, `date`) VALUES
(1, '5f53e185bd81a', 'deposit', 'Online', '300', '8:21 AM', '07-09-20'),
(2, '5f13133e990df', 'deposit', 'Coupon', '300', '0:34 PM', '03-10-20'),
(3, '5f13133e990df', 'deposit', 'Coupon', '500', '0:38 PM', '03-10-20'),
(4, '5f13133e990df', 'withdrawal', 'Airtime', '400', '0:41 PM', '03-10-20'),
(5, '5f13133e990df', 'withdrawal', 'Airtime', '1000', '0:42 PM', '03-10-20'),
(6, '5f13133e990df', 'withdrawal', 'Cash', '2000', '0:46 PM', '03-10-20');

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
(99, '5f55d59f27de2', '#TZF895', 'contestimages/contestimg2.jpg', 'Gold', 'Ended', '1599460767', '07-09-20', '1599460767', '1599460827', 'yes'),
(103, '5f55d77d775e6', '#0YG1M2', 'contestimages/contestimg3.jpg', 'Gold', 'Ended', '1599461245', '07-09-20', '1599461245', '1599461365', 'yes'),
(107, '5f55db679c103', '#VY9L00', 'contestimages/contestimg2.jpg', 'Gold', 'Ended', '1599462247', '07-09-20', '1599462247', '1599462367', 'yes'),
(112, '5f780e149b6e6', '#9LRB87', 'contestimages/contestimg3.jpg', 'Silver', 'Ended', '1601703444', '03-10-20', '1601703444', '1601703564', 'yes'),
(114, '5f780ed3a91f7', '#702XRK', 'contestimages/contestimg2.jpg', 'Silver', 'Ended', '1601703635', '03-10-20', '1601703635', '1601703755', 'yes'),
(115, '5f781571649c7', '#AZ9U69', 'contestimages/contestimg1.jpg', 'Gold', 'Ended', '1601705329', '03-10-20', '1601705329', '1601705449', 'yes'),
(120, '5f783565b4bb5', '#IQ145Y', 'contestimages/contestimg1.jpg', 'Silver', 'Ended', '1601713509', '03-10-20', '1601713509', '1601713629', 'yes'),
(123, '5f7844b7d46c0', '#0SQO96', 'contestimages/contestimg3.jpg', 'Gold', 'Ended', '1601717431', '03-10-20', '1601717431', '1601718031', 'yes'),
(131, '5f78500878d27', '#2V56CM', 'contestimages/contestimg1.jpg', 'Gold', 'Running', '1601720328', '03-10-20', '1601720328', '1601720928', 'no'),
(132, '5f7850087d588', '#Q6B2X9', 'contestimages/contestimg1.jpg', 'Silver', 'Running', '1601720328', '03-10-20', '1601720328', '1601720928', 'no');

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
(46, '5f53e185bd81a', '5f55d59f27de2', '68', 'played', '100', 'yes'),
(47, '5f53e185bd81a', '5f55d77d775e6', '58', 'played', '100', 'yes'),
(48, '5f53e185bd81a', '5f55db679c103', '48', 'played', '100', 'yes'),
(49, '5f53e185bd81a', '5f780e149b6e6', '33', 'pending', '50', 'yes'),
(50, '5f53e185bd81a', '5f780ed3a91f7', '17', 'pending', '50', 'yes'),
(51, '5f53e185bd81a', '5f781571649c7', '8', 'pending', '100', 'yes'),
(52, '5ef9e0bba9cbe', '5f783565b4bb5', '9', 'pending', '50', 'yes'),
(53, '5ef9e0bba9cbe', '5f7844b7d46c0', '37', 'played', '0', 'no'),
(54, '5efa668ebd5c6', '5f7844b7d46c0', '37', 'played', '0', 'no'),
(55, '5f13130e4619e', '5f7844b7d46c0', '38', 'played', '0', 'no'),
(56, '5f13133e990df', '5f7844b7d46c0', '34', 'played', '320', 'yes');

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
(74, '5f16cd5896f8b', 'what would you do with 10million naira today'),
(75, '5f19e87a74909', 'what would you do with 10million naira today'),
(76, '5f19e87a74909', 'Typing contest is sending cash prizes to persons'),
(77, '5f19e87a74909', 'Typing contest is sending cash prizes to persons'),
(78, '5f19e87a74909', 'what would you do with 10million naira today'),
(79, '5f19e87a74909', 'Would you share every post of typing contest'),
(80, '5f19e87a7a562', 'Would you share every post of typing contest'),
(81, '5f19e87a7a562', 'Typing contest is sending cash prizes to persons'),
(82, '5f19e87a7a562', 'what would you do with 10million naira today'),
(83, '5f19e87a7a562', 'Would you share every post of typing contest'),
(84, '5f19e87a7a562', 'Would you share every post of typing contest'),
(85, '5f19e9610e750', 'Typing contest is sending cash prizes to persons'),
(86, '5f19e9610e750', 'what would you do with 10million naira today'),
(87, '5f19e9610e750', 'Typing contest is sending cash prizes to persons'),
(88, '5f19e9610e750', 'what would you do with 10million naira today'),
(89, '5f19e9610e750', 'Typing contest is sending cash prizes to persons'),
(90, '5f19e96115035', 'Would you share every post of typing contest'),
(91, '5f19e96115035', 'Typing contest is sending cash prizes to persons'),
(92, '5f19e96115035', 'Typing contest is sending cash prizes to persons'),
(93, '5f19e96115035', 'what would you do with 10million naira today'),
(94, '5f19e96115035', 'what would you do with 10million naira today'),
(95, '5f19eacc70dce', 'Would you share every post of typing contest'),
(96, '5f19eacc70dce', 'Would you share every post of typing contest'),
(97, '5f19eacc70dce', 'what would you do with 10million naira today'),
(98, '5f19eacc70dce', 'Typing contest is sending cash prizes to persons'),
(99, '5f19eacc70dce', 'Would you share every post of typing contest'),
(100, '5f19eacc75cb2', 'Typing contest is sending cash prizes to persons'),
(101, '5f19eacc75cb2', 'Typing contest is sending cash prizes to persons'),
(102, '5f19eacc75cb2', 'Would you share every post of typing contest'),
(103, '5f19eacc75cb2', 'what would you do with 10million naira today'),
(104, '5f19eacc75cb2', 'Would you share every post of typing contest'),
(105, '5f19eacc79476', 'Typing contest is sending cash prizes to persons'),
(106, '5f19eacc79476', 'Would you share every post of typing contest'),
(107, '5f19eacc79476', 'Typing contest is sending cash prizes to persons'),
(108, '5f19eacc79476', 'Typing contest is sending cash prizes to persons'),
(109, '5f19eacc79476', 'Typing contest is sending cash prizes to persons'),
(110, '5f19eb460f26d', 'what would you do with 10million naira today'),
(111, '5f19eb460f26d', 'Typing contest is sending cash prizes to persons'),
(112, '5f19eb460f26d', 'Typing contest is sending cash prizes to persons'),
(113, '5f19eb460f26d', 'what would you do with 10million naira today'),
(114, '5f19eb460f26d', 'Would you share every post of typing contest'),
(115, '5f19eb461432d', 'what would you do with 10million naira today'),
(116, '5f19eb461432d', 'what would you do with 10million naira today'),
(117, '5f19eb461432d', 'Would you share every post of typing contest'),
(118, '5f19eb461432d', 'Would you share every post of typing contest'),
(119, '5f19eb461432d', 'Would you share every post of typing contest'),
(120, '5f19eb46179d6', 'Typing contest is sending cash prizes to persons'),
(121, '5f19eb46179d6', 'Typing contest is sending cash prizes to persons'),
(122, '5f19eb46179d6', 'Typing contest is sending cash prizes to persons'),
(123, '5f19eb46179d6', 'what would you do with 10million naira today'),
(124, '5f19eb46179d6', 'Typing contest is sending cash prizes to persons'),
(125, '5f19ed201062e', 'Would you share every post of typing contest'),
(126, '5f19ed201062e', 'what would you do with 10million naira today'),
(127, '5f19ed201062e', 'Typing contest is sending cash prizes to persons'),
(128, '5f19ed201062e', 'Would you share every post of typing contest'),
(129, '5f19ed201062e', 'what would you do with 10million naira today'),
(130, '5f19ed2013fb2', 'Typing contest is sending cash prizes to persons'),
(131, '5f19ed2013fb2', 'Typing contest is sending cash prizes to persons'),
(132, '5f19ed2013fb2', 'what would you do with 10million naira today'),
(133, '5f19ed2013fb2', 'what would you do with 10million naira today'),
(134, '5f19ed2013fb2', 'Typing contest is sending cash prizes to persons'),
(135, '5f19ed20175f6', 'Typing contest is sending cash prizes to persons'),
(136, '5f19ed20175f6', 'Typing contest is sending cash prizes to persons'),
(137, '5f19ed20175f6', 'what would you do with 10million naira today'),
(138, '5f19ed20175f6', 'Would you share every post of typing contest'),
(139, '5f19ed20175f6', 'Typing contest is sending cash prizes to persons'),
(140, '5f19eef00ef2e', 'Typing contest is sending cash prizes to persons'),
(141, '5f19eef00ef2e', 'Typing contest is sending cash prizes to persons'),
(142, '5f19eef00ef2e', 'Typing contest is sending cash prizes to persons'),
(143, '5f19eef00ef2e', 'Typing contest is sending cash prizes to persons'),
(144, '5f19eef00ef2e', 'Would you share every post of typing contest'),
(145, '5f19eef01391c', 'Typing contest is sending cash prizes to persons'),
(146, '5f19eef01391c', 'Typing contest is sending cash prizes to persons'),
(147, '5f19eef01391c', 'Would you share every post of typing contest'),
(148, '5f19eef01391c', 'Typing contest is sending cash prizes to persons'),
(149, '5f19eef01391c', 'Would you share every post of typing contest'),
(150, '5f19eef016a93', 'Typing contest is sending cash prizes to persons'),
(151, '5f19eef016a93', 'what would you do with 10million naira today'),
(152, '5f19eef016a93', 'what would you do with 10million naira today'),
(153, '5f19eef016a93', 'what would you do with 10million naira today'),
(154, '5f19eef016a93', 'Would you share every post of typing contest'),
(155, '5f19f3ad0ed5a', 'Would you share every post of typing contest'),
(156, '5f19f3ad0ed5a', 'Would you share every post of typing contest'),
(157, '5f19f3ad0ed5a', 'what would you do with 10million naira today'),
(158, '5f19f3ad0ed5a', 'Would you share every post of typing contest'),
(159, '5f19f3ad0ed5a', 'Typing contest is sending cash prizes to persons'),
(160, '5f19f3ad121b0', 'Would you share every post of typing contest'),
(161, '5f19f3ad121b0', 'what would you do with 10million naira today'),
(162, '5f19f3ad121b0', 'Typing contest is sending cash prizes to persons'),
(163, '5f19f3ad121b0', 'Would you share every post of typing contest'),
(164, '5f19f3ad121b0', 'Typing contest is sending cash prizes to persons'),
(165, '5f19f3ad1476c', 'Would you share every post of typing contest'),
(166, '5f19f3ad1476c', 'what would you do with 10million naira today'),
(167, '5f19f3ad1476c', 'what would you do with 10million naira today'),
(168, '5f19f3ad1476c', 'Typing contest is sending cash prizes to persons'),
(169, '5f19f3ad1476c', 'Typing contest is sending cash prizes to persons'),
(170, '5f19f76211470', 'Would you share every post of typing contest'),
(171, '5f19f76211470', 'Typing contest is sending cash prizes to persons'),
(172, '5f19f76211470', 'what would you do with 10million naira today'),
(173, '5f19f76211470', 'Typing contest is sending cash prizes to persons'),
(174, '5f19f76211470', 'what would you do with 10million naira today'),
(175, '5f19f76217005', 'Would you share every post of typing contest'),
(176, '5f19f76217005', 'Typing contest is sending cash prizes to persons'),
(177, '5f19f76217005', 'Typing contest is sending cash prizes to persons'),
(178, '5f19f76217005', 'Would you share every post of typing contest'),
(179, '5f19f76217005', 'what would you do with 10million naira today'),
(180, '5f19f762220d7', 'Would you share every post of typing contest'),
(181, '5f19f762220d7', 'Typing contest is sending cash prizes to persons'),
(182, '5f19f762220d7', 'what would you do with 10million naira today'),
(183, '5f19f762220d7', 'Would you share every post of typing contest'),
(184, '5f19f762220d7', 'what would you do with 10million naira today'),
(185, '5f19fe2614148', 'Would you share every post of typing contest'),
(186, '5f19fe2614148', 'what would you do with 10million naira today'),
(187, '5f19fe2614148', 'Typing contest is sending cash prizes to persons'),
(188, '5f19fe2614148', 'what would you do with 10million naira today'),
(189, '5f19fe2614148', 'what would you do with 10million naira today'),
(190, '5f19fe261860e', 'Typing contest is sending cash prizes to persons'),
(191, '5f19fe261860e', 'Would you share every post of typing contest'),
(192, '5f19fe261860e', 'Typing contest is sending cash prizes to persons'),
(193, '5f19fe261860e', 'what would you do with 10million naira today'),
(194, '5f19fe261860e', 'what would you do with 10million naira today'),
(195, '5f19fe261b00f', 'what would you do with 10million naira today'),
(196, '5f19fe261b00f', 'Would you share every post of typing contest'),
(197, '5f19fe261b00f', 'Would you share every post of typing contest'),
(198, '5f19fe261b00f', 'what would you do with 10million naira today'),
(199, '5f19fe261b00f', 'Would you share every post of typing contest'),
(200, '5f1a01e7a130d', 'what would you do with 10million naira today'),
(201, '5f1a01e7a130d', 'Typing contest is sending cash prizes to persons'),
(202, '5f1a01e7a130d', 'Would you share every post of typing contest'),
(203, '5f1a01e7a130d', 'Would you share every post of typing contest'),
(204, '5f1a01e7a130d', 'Typing contest is sending cash prizes to persons'),
(205, '5f1a01e7a49e1', 'what would you do with 10million naira today'),
(206, '5f1a01e7a49e1', 'what would you do with 10million naira today'),
(207, '5f1a01e7a49e1', 'Typing contest is sending cash prizes to persons'),
(208, '5f1a01e7a49e1', 'Would you share every post of typing contest'),
(209, '5f1a01e7a49e1', 'what would you do with 10million naira today'),
(210, '5f1a01e7a764a', 'Would you share every post of typing contest'),
(211, '5f1a01e7a764a', 'what would you do with 10million naira today'),
(212, '5f1a01e7a764a', 'Would you share every post of typing contest'),
(213, '5f1a01e7a764a', 'Would you share every post of typing contest'),
(214, '5f1a01e7a764a', 'Typing contest is sending cash prizes to persons'),
(215, '5f1a067b24055', 'what would you do with 10million naira today'),
(216, '5f1a067b24055', 'Would you share every post of typing contest'),
(217, '5f1a067b24055', 'what would you do with 10million naira today'),
(218, '5f1a067b24055', 'Typing contest is sending cash prizes to persons'),
(219, '5f1a067b24055', 'what would you do with 10million naira today'),
(220, '5f1a067b27a08', 'Would you share every post of typing contest'),
(221, '5f1a067b27a08', 'Typing contest is sending cash prizes to persons'),
(222, '5f1a067b27a08', 'Typing contest is sending cash prizes to persons'),
(223, '5f1a067b27a08', 'Would you share every post of typing contest'),
(224, '5f1a067b27a08', 'Would you share every post of typing contest'),
(225, '5f1a067b2a78b', 'what would you do with 10million naira today'),
(226, '5f1a067b2a78b', 'Would you share every post of typing contest'),
(227, '5f1a067b2a78b', 'Would you share every post of typing contest'),
(228, '5f1a067b2a78b', 'Would you share every post of typing contest'),
(229, '5f1a067b2a78b', 'Typing contest is sending cash prizes to persons'),
(230, '5f40df63deb20', 'what would you do with 10million naira today'),
(231, '5f40df63deb20', 'what would you do with 10million naira today'),
(232, '5f40df63deb20', 'what would you do with 10million naira today'),
(233, '5f40df63deb20', 'Would you share every post of typing contest'),
(234, '5f40df63deb20', 'Would you share every post of typing contest'),
(235, '5f40df63e2c87', 'Would you share every post of typing contest'),
(236, '5f40df63e2c87', 'Typing contest is sending cash prizes to persons'),
(237, '5f40df63e2c87', 'Would you share every post of typing contest'),
(238, '5f40df63e2c87', 'Would you share every post of typing contest'),
(239, '5f40df63e2c87', 'what would you do with 10million naira today'),
(240, '5f40df63e5b6e', 'what would you do with 10million naira today'),
(241, '5f40df63e5b6e', 'what would you do with 10million naira today'),
(242, '5f40df63e5b6e', 'what would you do with 10million naira today'),
(243, '5f40df63e5b6e', 'what would you do with 10million naira today'),
(244, '5f40df63e5b6e', 'Would you share every post of typing contest'),
(245, '5f40dfc6d301f', 'Typing contest is sending cash prizes to persons'),
(246, '5f40dfc6d301f', 'what would you do with 10million naira today'),
(247, '5f40dfc6d301f', 'Typing contest is sending cash prizes to persons'),
(248, '5f40dfc6d301f', 'Would you share every post of typing contest'),
(249, '5f40dfc6d301f', 'what would you do with 10million naira today'),
(250, '5f40dfc6d846a', 'Would you share every post of typing contest'),
(251, '5f40dfc6d846a', 'Typing contest is sending cash prizes to persons'),
(252, '5f40dfc6d846a', 'Typing contest is sending cash prizes to persons'),
(253, '5f40dfc6d846a', 'Typing contest is sending cash prizes to persons'),
(254, '5f40dfc6d846a', 'Typing contest is sending cash prizes to persons'),
(255, '5f40dfc6dc21b', 'Would you share every post of typing contest'),
(256, '5f40dfc6dc21b', 'what would you do with 10million naira today'),
(257, '5f40dfc6dc21b', 'Typing contest is sending cash prizes to persons'),
(258, '5f40dfc6dc21b', 'Would you share every post of typing contest'),
(259, '5f40dfc6dc21b', 'what would you do with 10million naira today'),
(260, '5f40e012bb153', 'Would you share every post of typing contest'),
(261, '5f40e012bb153', 'Would you share every post of typing contest'),
(262, '5f40e012bb153', 'Would you share every post of typing contest'),
(263, '5f40e012bb153', 'Would you share every post of typing contest'),
(264, '5f40e012bb153', 'what would you do with 10million naira today'),
(265, '5f40e0a9b88a5', 'Would you share every post of typing contest'),
(266, '5f40e0a9b88a5', 'Would you share every post of typing contest'),
(267, '5f40e0a9b88a5', 'Typing contest is sending cash prizes to persons'),
(268, '5f40e0a9b88a5', 'what would you do with 10million naira today'),
(269, '5f40e0a9b88a5', 'Would you share every post of typing contest'),
(270, '5f40e0a9bb3b8', 'Typing contest is sending cash prizes to persons'),
(271, '5f40e0a9bb3b8', 'what would you do with 10million naira today'),
(272, '5f40e0a9bb3b8', 'what would you do with 10million naira today'),
(273, '5f40e0a9bb3b8', 'Typing contest is sending cash prizes to persons'),
(274, '5f40e0a9bb3b8', 'Typing contest is sending cash prizes to persons'),
(275, '5f40e0a9c03a1', 'Would you share every post of typing contest'),
(276, '5f40e0a9c03a1', 'Would you share every post of typing contest'),
(277, '5f40e0a9c03a1', 'Would you share every post of typing contest'),
(278, '5f40e0a9c03a1', 'Would you share every post of typing contest'),
(279, '5f40e0a9c03a1', 'Typing contest is sending cash prizes to persons'),
(280, '5f40e2b30cefa', 'Typing contest is sending cash prizes to persons'),
(281, '5f40e2b30cefa', 'what would you do with 10million naira today'),
(282, '5f40e2b30cefa', 'Would you share every post of typing contest'),
(283, '5f40e2b30cefa', 'Typing contest is sending cash prizes to persons'),
(284, '5f40e2b30cefa', 'what would you do with 10million naira today'),
(285, '5f40e36dbd88d', 'Typing contest is sending cash prizes to persons'),
(286, '5f40e36dbd88d', 'Typing contest is sending cash prizes to persons'),
(287, '5f40e36dbd88d', 'what would you do with 10million naira today'),
(288, '5f40e36dbd88d', 'Typing contest is sending cash prizes to persons'),
(289, '5f40e36dbd88d', 'Typing contest is sending cash prizes to persons'),
(290, '5f40e36dc5152', 'what would you do with 10million naira today'),
(291, '5f40e36dc5152', 'what would you do with 10million naira today'),
(292, '5f40e36dc5152', 'Would you share every post of typing contest'),
(293, '5f40e36dc5152', 'Would you share every post of typing contest'),
(294, '5f40e36dc5152', 'Typing contest is sending cash prizes to persons'),
(295, '5f40e3bcbf819', 'what would you do with 10million naira today'),
(296, '5f40e3bcbf819', 'Typing contest is sending cash prizes to persons'),
(297, '5f40e3bcbf819', 'Would you share every post of typing contest'),
(298, '5f40e3bcbf819', 'Typing contest is sending cash prizes to persons'),
(299, '5f40e3bcbf819', 'what would you do with 10million naira today'),
(300, '5f40ee386d5c4', 'Would you share every post of typing contest'),
(301, '5f40ee386d5c4', 'what would you do with 10million naira today'),
(302, '5f40ee386d5c4', 'what would you do with 10million naira today'),
(303, '5f40ee386d5c4', 'what would you do with 10million naira today'),
(304, '5f40ee386d5c4', 'Would you share every post of typing contest'),
(305, '5f40ee3870a15', 'Typing contest is sending cash prizes to persons'),
(306, '5f40ee3870a15', 'Typing contest is sending cash prizes to persons'),
(307, '5f40ee3870a15', 'what would you do with 10million naira today'),
(308, '5f40ee3870a15', 'Would you share every post of typing contest'),
(309, '5f40ee3870a15', 'what would you do with 10million naira today'),
(310, '5f40ee38739ea', 'Typing contest is sending cash prizes to persons'),
(311, '5f40ee38739ea', 'Would you share every post of typing contest'),
(312, '5f40ee38739ea', 'Typing contest is sending cash prizes to persons'),
(313, '5f40ee38739ea', 'what would you do with 10million naira today'),
(314, '5f40ee38739ea', 'Would you share every post of typing contest'),
(315, '5f40ef1cd390d', 'Would you share every post of typing contest'),
(316, '5f40ef1cd390d', 'what would you do with 10million naira today'),
(317, '5f40ef1cd390d', 'Would you share every post of typing contest'),
(318, '5f40ef1cd390d', 'Would you share every post of typing contest'),
(319, '5f40ef1cd390d', 'Would you share every post of typing contest'),
(320, '5f44ad0eb6355', 'Typing contest is sending cash prizes to persons'),
(321, '5f44ad0eb6355', 'Typing contest is sending cash prizes to persons'),
(322, '5f44ad0eb6355', 'what would you do with 10million naira today'),
(323, '5f44ad0eb6355', 'what would you do with 10million naira today'),
(324, '5f44ad0eb6355', 'what would you do with 10million naira today'),
(325, '5f44ad0ebce60', 'Typing contest is sending cash prizes to persons'),
(326, '5f44ad0ebce60', 'what would you do with 10million naira today'),
(327, '5f44ad0ebce60', 'Would you share every post of typing contest'),
(328, '5f44ad0ebce60', 'Typing contest is sending cash prizes to persons'),
(329, '5f44ad0ebce60', 'Typing contest is sending cash prizes to persons'),
(330, '5f44ad0ebff9d', 'what would you do with 10million naira today'),
(331, '5f44ad0ebff9d', 'Would you share every post of typing contest'),
(332, '5f44ad0ebff9d', 'Typing contest is sending cash prizes to persons'),
(333, '5f44ad0ebff9d', 'Would you share every post of typing contest'),
(334, '5f44ad0ebff9d', 'what would you do with 10million naira today'),
(335, '5f44adfd3ad22', 'Would you share every post of typing contest'),
(336, '5f44adfd3ad22', 'what would you do with 10million naira today'),
(337, '5f44adfd3ad22', 'what would you do with 10million naira today'),
(338, '5f44adfd3ad22', 'what would you do with 10million naira today'),
(339, '5f44adfd3ad22', 'Would you share every post of typing contest'),
(340, '5f44adfd40287', 'what would you do with 10million naira today'),
(341, '5f44adfd40287', 'Would you share every post of typing contest'),
(342, '5f44adfd40287', 'what would you do with 10million naira today'),
(343, '5f44adfd40287', 'Typing contest is sending cash prizes to persons'),
(344, '5f44adfd40287', 'what would you do with 10million naira today'),
(345, '5f44adfd44adf', 'what would you do with 10million naira today'),
(346, '5f44adfd44adf', 'Would you share every post of typing contest'),
(347, '5f44adfd44adf', 'Typing contest is sending cash prizes to persons'),
(348, '5f44adfd44adf', 'what would you do with 10million naira today'),
(349, '5f44adfd44adf', 'what would you do with 10million naira today'),
(350, '5f44ae6681501', 'Typing contest is sending cash prizes to persons'),
(351, '5f44ae6681501', 'what would you do with 10million naira today'),
(352, '5f44ae6681501', 'Typing contest is sending cash prizes to persons'),
(353, '5f44ae6681501', 'what would you do with 10million naira today'),
(354, '5f44ae6681501', 'what would you do with 10million naira today'),
(355, '5f44ae6684e6d', 'Would you share every post of typing contest'),
(356, '5f44ae6684e6d', 'what would you do with 10million naira today'),
(357, '5f44ae6684e6d', 'Typing contest is sending cash prizes to persons'),
(358, '5f44ae6684e6d', 'Typing contest is sending cash prizes to persons'),
(359, '5f44ae6684e6d', 'what would you do with 10million naira today'),
(360, '5f44ae6688dfb', 'Would you share every post of typing contest'),
(361, '5f44ae6688dfb', 'what would you do with 10million naira today'),
(362, '5f44ae6688dfb', 'Would you share every post of typing contest'),
(363, '5f44ae6688dfb', 'Would you share every post of typing contest'),
(364, '5f44ae6688dfb', 'Typing contest is sending cash prizes to persons'),
(365, '5f44b7bc84960', 'Would you share every post of typing contest'),
(366, '5f44b7bc84960', 'Typing contest is sending cash prizes to persons'),
(367, '5f44b7bc84960', 'what would you do with 10million naira today'),
(368, '5f44b7bc84960', 'what would you do with 10million naira today'),
(369, '5f44b7bc84960', 'what would you do with 10million naira today'),
(370, '5f44b7bc897b3', 'Typing contest is sending cash prizes to persons'),
(371, '5f44b7bc897b3', 'Typing contest is sending cash prizes to persons'),
(372, '5f44b7bc897b3', 'what would you do with 10million naira today'),
(373, '5f44b7bc897b3', 'Typing contest is sending cash prizes to persons'),
(374, '5f44b7bc897b3', 'what would you do with 10million naira today'),
(375, '5f44b7bc8d71d', 'Would you share every post of typing contest'),
(376, '5f44b7bc8d71d', 'Typing contest is sending cash prizes to persons'),
(377, '5f44b7bc8d71d', 'Typing contest is sending cash prizes to persons'),
(378, '5f44b7bc8d71d', 'Typing contest is sending cash prizes to persons'),
(379, '5f44b7bc8d71d', 'what would you do with 10million naira today'),
(380, '5f5230565822c', 'Would you share every post of typing contest'),
(381, '5f5230565822c', 'Typing contest is sending cash prizes to persons'),
(382, '5f5230565822c', 'what would you do with 10million naira today'),
(383, '5f5230565822c', 'what would you do with 10million naira today'),
(384, '5f5230565822c', 'what would you do with 10million naira today'),
(385, '5f5230566148d', 'what would you do with 10million naira today'),
(386, '5f5230566148d', 'what would you do with 10million naira today'),
(387, '5f5230566148d', 'what would you do with 10million naira today'),
(388, '5f5230566148d', 'Typing contest is sending cash prizes to persons'),
(389, '5f5230566148d', 'Would you share every post of typing contest'),
(390, '5f5230566431e', 'Typing contest is sending cash prizes to persons'),
(391, '5f5230566431e', 'Would you share every post of typing contest'),
(392, '5f5230566431e', 'Typing contest is sending cash prizes to persons'),
(393, '5f5230566431e', 'what would you do with 10million naira today'),
(394, '5f5230566431e', 'what would you do with 10million naira today'),
(395, '5f523203b749e', 'what would you do with 10million naira today'),
(396, '5f523203b749e', 'Would you share every post of typing contest'),
(397, '5f523203b749e', 'Typing contest is sending cash prizes to persons'),
(398, '5f523203b749e', 'Typing contest is sending cash prizes to persons'),
(399, '5f523203b749e', 'Would you share every post of typing contest'),
(400, '5f523203bd3a0', 'Would you share every post of typing contest'),
(401, '5f523203bd3a0', 'Typing contest is sending cash prizes to persons'),
(402, '5f523203bd3a0', 'what would you do with 10million naira today'),
(403, '5f523203bd3a0', 'what would you do with 10million naira today'),
(404, '5f523203bd3a0', 'Would you share every post of typing contest'),
(405, '5f523203c1490', 'Would you share every post of typing contest'),
(406, '5f523203c1490', 'Typing contest is sending cash prizes to persons'),
(407, '5f523203c1490', 'what would you do with 10million naira today'),
(408, '5f523203c1490', 'what would you do with 10million naira today'),
(409, '5f523203c1490', 'Would you share every post of typing contest'),
(410, '5f53f985a0048', 'Would you share every post of typing contest'),
(411, '5f53f985a0048', 'Typing contest is sending cash prizes to persons'),
(412, '5f53f985a0048', 'Would you share every post of typing contest'),
(413, '5f53f985a0048', 'what would you do with 10million naira today'),
(414, '5f53f985a0048', 'Would you share every post of typing contest'),
(415, '5f53f985a5436', 'what would you do with 10million naira today'),
(416, '5f53f985a5436', 'Typing contest is sending cash prizes to persons'),
(417, '5f53f985a5436', 'Typing contest is sending cash prizes to persons'),
(418, '5f53f985a5436', 'Typing contest is sending cash prizes to persons'),
(419, '5f53f985a5436', 'Typing contest is sending cash prizes to persons'),
(420, '5f53fa6123812', 'Would you share every post of typing contest'),
(421, '5f53fa6123812', 'Typing contest is sending cash prizes to persons'),
(422, '5f53fa6123812', 'Would you share every post of typing contest'),
(423, '5f53fa6123812', 'what would you do with 10million naira today'),
(424, '5f53fa6123812', 'Typing contest is sending cash prizes to persons'),
(425, '5f53fa612747f', 'Would you share every post of typing contest'),
(426, '5f53fa612747f', 'what would you do with 10million naira today'),
(427, '5f53fa612747f', 'Would you share every post of typing contest'),
(428, '5f53fa612747f', 'what would you do with 10million naira today'),
(429, '5f53fa612747f', 'Typing contest is sending cash prizes to persons'),
(430, '5f54f183b4507', 'Typing contest is sending cash prizes to persons'),
(431, '5f54f183b4507', 'Would you share every post of typing contest'),
(432, '5f54f183b4507', 'Typing contest is sending cash prizes to persons'),
(433, '5f54f183b4507', 'what would you do with 10million naira today'),
(434, '5f54f183b4507', 'Would you share every post of typing contest'),
(435, '5f54f183d2646', 'Would you share every post of typing contest'),
(436, '5f54f183d2646', 'what would you do with 10million naira today'),
(437, '5f54f183d2646', 'what would you do with 10million naira today'),
(438, '5f54f183d2646', 'what would you do with 10million naira today'),
(439, '5f54f183d2646', 'Would you share every post of typing contest'),
(440, '5f554ee1ae2e3', 'what would you do with 10million naira today'),
(441, '5f554ee1ae2e3', 'Typing contest is sending cash prizes to persons'),
(442, '5f554ee1ae2e3', 'Would you share every post of typing contest'),
(443, '5f554ee1ae2e3', 'Would you share every post of typing contest'),
(444, '5f554ee1ae2e3', 'Would you share every post of typing contest'),
(445, '5f554ee1b2fed', 'what would you do with 10million naira today'),
(446, '5f554ee1b2fed', 'what would you do with 10million naira today'),
(447, '5f554ee1b2fed', 'Typing contest is sending cash prizes to persons'),
(448, '5f554ee1b2fed', 'what would you do with 10million naira today'),
(449, '5f554ee1b2fed', 'what would you do with 10million naira today'),
(450, '5f554f1e9e471', 'what would you do with 10million naira today'),
(451, '5f554f1e9e471', 'what would you do with 10million naira today'),
(452, '5f554f1e9e471', 'what would you do with 10million naira today'),
(453, '5f554f1e9e471', 'Would you share every post of typing contest'),
(454, '5f554f1e9e471', 'Typing contest is sending cash prizes to persons'),
(455, '5f554f1ea5380', 'Would you share every post of typing contest'),
(456, '5f554f1ea5380', 'Typing contest is sending cash prizes to persons'),
(457, '5f554f1ea5380', 'Typing contest is sending cash prizes to persons'),
(458, '5f554f1ea5380', 'what would you do with 10million naira today'),
(459, '5f554f1ea5380', 'Would you share every post of typing contest'),
(460, '5f554f5b9e6f8', 'what would you do with 10million naira today'),
(461, '5f554f5b9e6f8', 'Typing contest is sending cash prizes to persons'),
(462, '5f554f5b9e6f8', 'Typing contest is sending cash prizes to persons'),
(463, '5f554f5b9e6f8', 'what would you do with 10million naira today'),
(464, '5f554f5b9e6f8', 'Typing contest is sending cash prizes to persons'),
(465, '5f554f5ba1a93', 'Would you share every post of typing contest'),
(466, '5f554f5ba1a93', 'Would you share every post of typing contest'),
(467, '5f554f5ba1a93', 'what would you do with 10million naira today'),
(468, '5f554f5ba1a93', 'what would you do with 10million naira today'),
(469, '5f554f5ba1a93', 'what would you do with 10million naira today'),
(470, '5f55d59f27de2', 'what would you do with 10million naira today'),
(471, '5f55d59f27de2', 'Would you share every post of typing contest'),
(472, '5f55d59f27de2', 'Would you share every post of typing contest'),
(473, '5f55d59f27de2', 'what would you do with 10million naira today'),
(474, '5f55d59f27de2', 'Would you share every post of typing contest'),
(475, '5f55d59f473c5', 'Would you share every post of typing contest'),
(476, '5f55d59f473c5', 'Typing contest is sending cash prizes to persons'),
(477, '5f55d59f473c5', 'Typing contest is sending cash prizes to persons'),
(478, '5f55d59f473c5', 'Would you share every post of typing contest'),
(479, '5f55d59f473c5', 'Typing contest is sending cash prizes to persons'),
(480, '5f55d60778cc9', 'Typing contest is sending cash prizes to persons'),
(481, '5f55d60778cc9', 'Typing contest is sending cash prizes to persons'),
(482, '5f55d60778cc9', 'Typing contest is sending cash prizes to persons'),
(483, '5f55d60778cc9', 'Would you share every post of typing contest'),
(484, '5f55d60778cc9', 'Typing contest is sending cash prizes to persons'),
(485, '5f55d6077bb4a', 'Typing contest is sending cash prizes to persons'),
(486, '5f55d6077bb4a', 'what would you do with 10million naira today'),
(487, '5f55d6077bb4a', 'what would you do with 10million naira today'),
(488, '5f55d6077bb4a', 'what would you do with 10million naira today'),
(489, '5f55d6077bb4a', 'what would you do with 10million naira today'),
(490, '5f55d77d775e6', 'what would you do with 10million naira today'),
(491, '5f55d77d775e6', 'Typing contest is sending cash prizes to persons'),
(492, '5f55d77d775e6', 'what would you do with 10million naira today'),
(493, '5f55d77d775e6', 'Would you share every post of typing contest'),
(494, '5f55d77d775e6', 'Typing contest is sending cash prizes to persons'),
(495, '5f55d77d7c647', 'Typing contest is sending cash prizes to persons'),
(496, '5f55d77d7c647', 'what would you do with 10million naira today'),
(497, '5f55d77d7c647', 'Would you share every post of typing contest'),
(498, '5f55d77d7c647', 'what would you do with 10million naira today'),
(499, '5f55d77d7c647', 'Would you share every post of typing contest'),
(500, '5f55d7f67c6d0', 'what would you do with 10million naira today'),
(501, '5f55d7f67c6d0', 'what would you do with 10million naira today'),
(502, '5f55d7f67c6d0', 'Typing contest is sending cash prizes to persons'),
(503, '5f55d7f67c6d0', 'Would you share every post of typing contest'),
(504, '5f55d7f67c6d0', 'what would you do with 10million naira today'),
(505, '5f55d7f67fe65', 'Typing contest is sending cash prizes to persons'),
(506, '5f55d7f67fe65', 'Typing contest is sending cash prizes to persons'),
(507, '5f55d7f67fe65', 'Typing contest is sending cash prizes to persons'),
(508, '5f55d7f67fe65', 'Typing contest is sending cash prizes to persons'),
(509, '5f55d7f67fe65', 'what would you do with 10million naira today'),
(510, '5f55db679c103', 'Typing contest is sending cash prizes to persons'),
(511, '5f55db679c103', 'Would you share every post of typing contest'),
(512, '5f55db679c103', 'Would you share every post of typing contest'),
(513, '5f55db679c103', 'what would you do with 10million naira today'),
(514, '5f55db679c103', 'Typing contest is sending cash prizes to persons'),
(515, '5f55db67a1774', 'what would you do with 10million naira today'),
(516, '5f55db67a1774', 'Typing contest is sending cash prizes to persons'),
(517, '5f55db67a1774', 'what would you do with 10million naira today'),
(518, '5f55db67a1774', 'what would you do with 10million naira today'),
(519, '5f55db67a1774', 'Typing contest is sending cash prizes to persons'),
(520, '5f55dbe031281', 'what would you do with 10million naira today'),
(521, '5f55dbe031281', 'what would you do with 10million naira today'),
(522, '5f55dbe031281', 'Would you share every post of typing contest'),
(523, '5f55dbe031281', 'Would you share every post of typing contest'),
(524, '5f55dbe031281', 'what would you do with 10million naira today'),
(525, '5f55dbe034b33', 'what would you do with 10million naira today'),
(526, '5f55dbe034b33', 'what would you do with 10million naira today'),
(527, '5f55dbe034b33', 'what would you do with 10million naira today'),
(528, '5f55dbe034b33', 'what would you do with 10million naira today'),
(529, '5f55dbe034b33', 'what would you do with 10million naira today'),
(530, '5f780e14908e8', 'what would you do with 10million naira today'),
(531, '5f780e14908e8', 'Would you share every post of typing contest'),
(532, '5f780e14908e8', 'Would you share every post of typing contest'),
(533, '5f780e14908e8', 'what would you do with 10million naira today'),
(534, '5f780e14908e8', 'Typing contest is sending cash prizes to persons'),
(535, '5f780e149b6e6', 'Would you share every post of typing contest'),
(536, '5f780e149b6e6', 'Would you share every post of typing contest'),
(537, '5f780e149b6e6', 'what would you do with 10million naira today'),
(538, '5f780e149b6e6', 'Would you share every post of typing contest'),
(539, '5f780e149b6e6', 'Would you share every post of typing contest'),
(540, '5f780ed3a43b3', 'what would you do with 10million naira today'),
(541, '5f780ed3a43b3', 'what would you do with 10million naira today'),
(542, '5f780ed3a43b3', 'Would you share every post of typing contest'),
(543, '5f780ed3a43b3', 'Would you share every post of typing contest'),
(544, '5f780ed3a43b3', 'Would you share every post of typing contest'),
(545, '5f780ed3a91f7', 'what would you do with 10million naira today'),
(546, '5f780ed3a91f7', 'Typing contest is sending cash prizes to persons'),
(547, '5f780ed3a91f7', 'what would you do with 10million naira today'),
(548, '5f780ed3a91f7', 'Typing contest is sending cash prizes to persons'),
(549, '5f780ed3a91f7', 'Typing contest is sending cash prizes to persons'),
(550, '5f781571649c7', 'Would you share every post of typing contest'),
(551, '5f781571649c7', 'what would you do with 10million naira today'),
(552, '5f781571649c7', 'Would you share every post of typing contest'),
(553, '5f781571649c7', 'Typing contest is sending cash prizes to persons'),
(554, '5f781571649c7', 'Would you share every post of typing contest'),
(555, '5f781571688c8', 'Typing contest is sending cash prizes to persons'),
(556, '5f781571688c8', 'what would you do with 10million naira today'),
(557, '5f781571688c8', 'what would you do with 10million naira today'),
(558, '5f781571688c8', 'what would you do with 10million naira today'),
(559, '5f781571688c8', 'Would you share every post of typing contest'),
(560, '5f782e5251024', 'Would you share every post of typing contest'),
(561, '5f782e5251024', 'Would you share every post of typing contest'),
(562, '5f782e5251024', 'Typing contest is sending cash prizes to persons'),
(563, '5f782e5251024', 'Would you share every post of typing contest'),
(564, '5f782e5251024', 'what would you do with 10million naira today'),
(565, '5f782e52564c8', 'what would you do with 10million naira today'),
(566, '5f782e52564c8', 'what would you do with 10million naira today'),
(567, '5f782e52564c8', 'what would you do with 10million naira today'),
(568, '5f782e52564c8', 'Would you share every post of typing contest'),
(569, '5f782e52564c8', 'Would you share every post of typing contest'),
(570, '5f783565af488', 'Typing contest is sending cash prizes to persons'),
(571, '5f783565af488', 'what would you do with 10million naira today'),
(572, '5f783565af488', 'what would you do with 10million naira today'),
(573, '5f783565af488', 'what would you do with 10million naira today'),
(574, '5f783565af488', 'what would you do with 10million naira today'),
(575, '5f783565b4bb5', 'what would you do with 10million naira today'),
(576, '5f783565b4bb5', 'Typing contest is sending cash prizes to persons'),
(577, '5f783565b4bb5', 'Would you share every post of typing contest'),
(578, '5f783565b4bb5', 'what would you do with 10million naira today'),
(579, '5f783565b4bb5', 'Typing contest is sending cash prizes to persons'),
(580, '5f783a3f5e41f', 'what would you do with 10million naira today'),
(581, '5f783a3f5e41f', 'Would you share every post of typing contest'),
(582, '5f783a3f5e41f', 'Typing contest is sending cash prizes to persons'),
(583, '5f783a3f5e41f', 'Typing contest is sending cash prizes to persons'),
(584, '5f783a3f5e41f', 'Typing contest is sending cash prizes to persons'),
(585, '5f783a3f62cd4', 'Typing contest is sending cash prizes to persons'),
(586, '5f783a3f62cd4', 'Typing contest is sending cash prizes to persons'),
(587, '5f783a3f62cd4', 'Would you share every post of typing contest'),
(588, '5f783a3f62cd4', 'Would you share every post of typing contest'),
(589, '5f783a3f62cd4', 'what would you do with 10million naira today'),
(590, '5f7844b7d46c0', 'Would you share every post of typing contest'),
(591, '5f7844b7d46c0', 'Would you share every post of typing contest'),
(592, '5f7844b7d46c0', 'Typing contest is sending cash prizes to persons'),
(593, '5f7844b7d46c0', 'Typing contest is sending cash prizes to persons'),
(594, '5f7844b7d46c0', 'what would you do with 10million naira today'),
(595, '5f7844b7d88f1', 'Typing contest is sending cash prizes to persons'),
(596, '5f7844b7d88f1', 'Typing contest is sending cash prizes to persons'),
(597, '5f7844b7d88f1', 'Would you share every post of typing contest'),
(598, '5f7844b7d88f1', 'what would you do with 10million naira today'),
(599, '5f7844b7d88f1', 'Would you share every post of typing contest'),
(600, '5f7847145d9b3', 'Would you share every post of typing contest'),
(601, '5f7847145d9b3', 'Would you share every post of typing contest'),
(602, '5f7847145d9b3', 'what would you do with 10million naira today'),
(603, '5f7847145d9b3', 'Typing contest is sending cash prizes to persons'),
(604, '5f7847145d9b3', 'Typing contest is sending cash prizes to persons'),
(605, '5f7847146c4c8', 'Would you share every post of typing contest'),
(606, '5f7847146c4c8', 'what would you do with 10million naira today'),
(607, '5f7847146c4c8', 'what would you do with 10million naira today'),
(608, '5f7847146c4c8', 'Typing contest is sending cash prizes to persons'),
(609, '5f7847146c4c8', 'what would you do with 10million naira today'),
(610, '5f78498ee6cac', 'Would you share every post of typing contest'),
(611, '5f78498ee6cac', 'Typing contest is sending cash prizes to persons'),
(612, '5f78498ee6cac', 'what would you do with 10million naira today'),
(613, '5f78498ee6cac', 'Typing contest is sending cash prizes to persons'),
(614, '5f78498ee6cac', 'Would you share every post of typing contest'),
(615, '5f78498eee886', 'Typing contest is sending cash prizes to persons'),
(616, '5f78498eee886', 'Would you share every post of typing contest'),
(617, '5f78498eee886', 'Typing contest is sending cash prizes to persons'),
(618, '5f78498eee886', 'Would you share every post of typing contest'),
(619, '5f78498eee886', 'what would you do with 10million naira today'),
(620, '5f784bf89ae96', 'what would you do with 10million naira today'),
(621, '5f784bf89ae96', 'Typing contest is sending cash prizes to persons'),
(622, '5f784bf89ae96', 'what would you do with 10million naira today'),
(623, '5f784bf89ae96', 'Would you share every post of typing contest'),
(624, '5f784bf89ae96', 'Would you share every post of typing contest'),
(625, '5f784bf8a22f3', 'what would you do with 10million naira today'),
(626, '5f784bf8a22f3', 'what would you do with 10million naira today'),
(627, '5f784bf8a22f3', 'Would you share every post of typing contest'),
(628, '5f784bf8a22f3', 'what would you do with 10million naira today'),
(629, '5f784bf8a22f3', 'what would you do with 10million naira today'),
(630, '5f78500878d27', 'Would you share every post of typing contest'),
(631, '5f78500878d27', 'Would you share every post of typing contest'),
(632, '5f78500878d27', 'what would you do with 10million naira today'),
(633, '5f78500878d27', 'Typing contest is sending cash prizes to persons'),
(634, '5f78500878d27', 'Typing contest is sending cash prizes to persons'),
(635, '5f7850087d588', 'Would you share every post of typing contest'),
(636, '5f7850087d588', 'Typing contest is sending cash prizes to persons'),
(637, '5f7850087d588', 'Typing contest is sending cash prizes to persons'),
(638, '5f7850087d588', 'Typing contest is sending cash prizes to persons'),
(639, '5f7850087d588', 'Typing contest is sending cash prizes to persons');

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
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
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

INSERT INTO `users` (`id`, `uniqueid`, `firstname`, `lastname`, `phone`, `email`, `password`, `image`, `coins`, `withdrawable_balance`, `status`, `time`, `date`, `new`, `total_received`, `airtime_balance`) VALUES
(1, '5ef9e0bba9cbe', 'Emmanuel', 'Danjumbo', '08162383712', 'emmy@gmail.com', '$2y$10$ja0tx24oC8SpOUFYhZeG1upHAQQJSZETAlIdDbpcuwIBFjSS.pAzy', 'profileimages/banner3.jpg', '1200', '3800', 'active', '1593434299', '29-06-20', 'yes', '0', '30'),
(2, '5efa668ebd5c6', 'Mary', 'Jones', '09012781267', 'mary@gmail.com', '$2y$10$6OOykyksqeRXqXDkW0Hy7ujxzGlu.dskIaUG0Qur1kAEXdkiuWSgO', 'profileimages/chelsea1.png', '400', '1510', 'active', '1593468558', '30-06-20', 'yes', '0', ''),
(3, '5f13130e4619e', 'Sarah', 'Paul', '0902189822', 'sarah@gmail.com', '$2y$10$q9JqlXP.D/ctlqSGkhcGdOl6mrwEmnnUju3br5Bvfo0efTKRmqD7C', 'profileimages/c.png', '400', '930', 'active', '1595085582', '18-07-20', 'yes', '0', '0'),
(4, '5f13133e990df', 'James', 'Gilbert', '07026712617', 'james@gmail.com', '$2y$10$rtacAwZKXeSUTFkrMxRJme8MGqm4ZPNpK1j40qfZlVkWA3yrYu9Yq', 'profileimages/fresa.png', '1200', '2000', 'active', '1595085630', '18-07-20', 'yes', '0', '0'),
(6, '5f53e185bd81a', 'Oge', 'Cue', '08011111111', 'oge@gmail.com', '$2y$10$/xV6YnKqYzaEGcD08WdMjuIDPI2wjqtcDpCY/VZegBP6o79jCmdka', 'profileimages/bayern1.png', '1000', '0', 'active', '1599332741', '05-09-20', 'yes', '0', '0');

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
(1, '5ef9e0bba9cbe', '400', 'memory_contest', '1595176593', '19-07-20'),
(2, '5efa668ebd5c6', '320', 'memory_contest', '1601716840', '03-10-20'),
(3, '5f13133e990df', '320', 'typing_contest', '1601718490', '03-10-20');

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
-- Indexes for table `airtime_withdrawals`
--
ALTER TABLE `airtime_withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_withdrawals`
--
ALTER TABLE `cash_withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_requests`
--
ALTER TABLE `challenge_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_feed_notifications`
--
ALTER TABLE `live_feed_notifications`
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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airtime_withdrawals`
--
ALTER TABLE `airtime_withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cash_withdrawals`
--
ALTER TABLE `cash_withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `challenge_requests`
--
ALTER TABLE `challenge_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `live_feed_notifications`
--
ALTER TABLE `live_feed_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `memory_contest`
--
ALTER TABLE `memory_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `memory_contest_participants`
--
ALTER TABLE `memory_contest_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `typing_contest`
--
ALTER TABLE `typing_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `typing_contest_participants`
--
ALTER TABLE `typing_contest_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `typing_contest_sentences`
--
ALTER TABLE `typing_contest_sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;

--
-- AUTO_INCREMENT for table `typing_sentences`
--
ALTER TABLE `typing_sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `winners_history`
--
ALTER TABLE `winners_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
