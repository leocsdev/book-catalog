-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2020 at 11:35 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_catalog`
--
CREATE DATABASE IF NOT EXISTS `book_catalog` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `book_catalog`;

-- --------------------------------------------------------

--
-- Table structure for table `books_list`
--

CREATE TABLE `books_list` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `isbn` varchar(50) COLLATE utf8_bin NOT NULL,
  `author` varchar(255) COLLATE utf8_bin NOT NULL,
  `publisher` varchar(255) COLLATE utf8_bin NOT NULL,
  `year_published` varchar(50) COLLATE utf8_bin NOT NULL,
  `category` varchar(255) COLLATE utf8_bin NOT NULL,
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `books_list`
--

INSERT INTO `books_list` (`id`, `title`, `isbn`, `author`, `publisher`, `year_published`, `category`, `added_at`) VALUES
(1, 'Mathematics in Action', '11223344556', 'Math Teacher', 'DIWA', '2012', 'Math', '2020-09-19 10:42:28'),
(2, 'Tess of the Storm Country', '98-561-6352', 'Teodora Carnalan', 'Yodoo', '2006', 'Sales', '2020-09-19 10:42:28'),
(3, 'Hotel', '30-916-4305', 'Bradney Dearman', 'Skibox', '2011', 'Human Resources', '2020-09-19 10:42:28'),
(4, 'Immigrant, The', '58-126-3378', 'Field Bagguley', 'Browsebug', '2005', 'Support', '2020-09-19 10:42:28'),
(5, 'Walking and Talking', '26-414-6523', 'Loralie Leverington', 'Roodel', '2010', 'Business Development', '2020-09-19 10:42:28'),
(6, 'S. Darko (S. Darko: A Donnie Darko Tale)', '14-410-7971', 'Elsie Izzat', 'Quimba', '2001', 'Research and Development', '2020-09-19 10:42:28'),
(7, 'Tyler Perry\'s The Single Moms Club', '23-066-1473', 'Wes Boyes', 'Zooveo', '1994', 'Legal', '2020-09-19 10:42:28'),
(8, 'Amer', '81-113-6697', 'Salaidh Cello', 'Meejo', '2006', 'Sales', '2020-09-19 10:42:28'),
(9, 'Mall Girls (Galerianki)', '33-789-2358', 'Evelyn Davidovich', 'Minyx', '1992', 'Support', '2020-09-19 10:42:28'),
(10, 'Fragile Trust', '58-080-9114', 'Alexandros Starbuck', 'Twimbo', '2011', 'Training', '2020-09-19 10:42:28'),
(33, 'a', '1', 'b', 'c', '1999', 'd', '2020-09-19 18:08:23'),
(34, 'aaa', '222', 'bbb', 'ccc', '2012', 'ddd', '2020-09-19 19:18:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_list`
--
ALTER TABLE `books_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_list`
--
ALTER TABLE `books_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
