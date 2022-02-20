-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2021 at 12:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ninja_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `type`) VALUES
(1, 'Pizza Hut'),
(2, 'Domino'),
(3, 'Xianglan Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `email`, `created_at`) VALUES
(5, 'hello', 'cheese  egg mushroom', 'yicong@gmail.com', '2021-11-08 22:22:32'),
(8, 'BBQ Chicken Pizza', 'tofu cheese', 'quxianglan55@gmail.com', '2021-11-22 05:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL,
  `postName` varchar(255) NOT NULL,
  `postText` varchar(255) NOT NULL,
  `otherOption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`posts_id`, `topics_id`, `postName`, `postText`, `otherOption`) VALUES
(1, 1, 'Cheap coupons', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN', NULL),
(2, 1, 'WingStreet Flavours!', 'Get Saucy With Our Fly New WingStreet Flavours, Korean BBQ & Mango Habanero! Pizza Hut will help satisfy your hunger. Shop now for contactless delivery!', NULL),
(3, 1, 'YES PLEASE!', '3 Reasons Why You Should Say YES PLEASE To Our Mac And Cheese. Pizza Hut will help satisfy your hunger. Shop now for contactless delivery!', NULL),
(4, 2, 'WOW Come', '3 Reasons Why You Should Say YES PLEASE To Our Mac And Cheese. Pizza Hut will help satisfy your hunger. Shop now for contactless delivery!', NULL),
(5, 2, 'Mango Habanero!', '4 Things You Didn’t Know About SpongeBob SquarePants... Pizza Hut will help satisfy your hunger and you could also win some epic prizes. Shop now!', NULL),
(6, 2, 'HAKUNAMATATA', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(7, 3, 'HAKUNAMATATA', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(8, 3, 'Lunchtime Delivery', 'VB and Pizza Hut are giving you the chance to experience the State of Origin like never before! Order a 6-pack of VB with your Pizza Hut for a chance to win.', NULL),
(9, 3, 'Hut & VB', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(10, 4, ' App Clips', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(11, 4, 'HAKUNAMATATA', 'VB and Pizza Hut are giving you the chance to experience the State of Origin like never before! Order a 6-pack of VB with your Pizza Hut for a chance to win.', NULL),
(12, 4, 'Lunchtime Delivery', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(13, 5, 'HAKUNAMATATA', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(14, 5, 'Lunchtime Delivery', 'VB and Pizza Hut are giving you the chance to experience the State of Origin like never before! Order a 6-pack of VB with your Pizza Hut for a chance to win.', NULL),
(15, 5, 'Hut & VB', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(16, 6, ' App Clips', 'For a chance to WIN 1 of 5 Coca-Cola prize packs, simply purchase a Coca-Cola No Sugar from Pizza Hut to get access to the AR Filter. Scan, Tag, Share, WIN.', NULL),
(17, 6, 'HAKUNAMATATA', 'VB and Pizza Hut are giving you the chance to experience the State of Origin like never before! Order a 6-pack of VB with your Pizza Hut for a chance to win.', NULL),
(18, 1, 'great pizza', 'Pizza (Italian: Neapolitan: is a dish of Italian origin consisting of a usually round, flat base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', NULL),
(19, 1, 'Neapolitan pizza', 'Pizza (Italian:  Neapolitan:  is a dish of Italian origin consisting of a usually round, flat base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', NULL),
(20, 4, 'great pizza', 'Pizza (Italian:  Neapolitan:  is a dish of Italian origin consisting of a usually round, flat base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', NULL),
(21, 6, 'great pizza', 'Pizza (Italian: Neapolitan:  is a dish of Italian origin consisting of a usually round, flat base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topics_id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `topic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topics_id`, `categories_id`, `topic`) VALUES
(1, 1, 'Coupons'),
(2, 2, 'History'),
(3, 3, 'Feedback'),
(4, 1, 'Menu'),
(5, 2, 'Blog'),
(6, 3, 'Contactus'),
(8, 1, 'Welcome'),
(9, 3, 'Info');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topics_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
