-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 03:33 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `ticket_type_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `description`, `price`, `ticket_type_id`, `created`, `modified`) VALUES
(1, 'Ada Art gallery exhibition', 'Art exhibition', '10000', 4, '2019-01-10 07:40:26', '2019-01-10 06:40:26'),
(2, 'Chief Daddy', 'A movie comedy by Mo Abudu', '2499', 2, '2019-01-10 07:40:26', '2019-01-10 06:40:26'),
(3, 'Axis fashion show', 'A fashion show by Axis fashion line ', '2999', 1, '2019-01-10 07:40:26', '2019-01-10 06:40:26'),
(4, 'Night of a thousand laugh', 'A comedy concert(Regular tickets)', '4999', 3, '2019-01-10 07:40:26', '2019-01-10 06:40:26'),
(5, 'Aristocrat Art display ', 'Art exhibition', '4999', 4, '2019-01-10 07:40:26', '2019-01-10 06:40:26'),
(65, 'Tola Art gallery', 'display of art works by tola and other artists', '4999', 4, '2019-01-18 12:12:26', '2019-01-10 11:12:34'),
(66, '', '', '0', 0, '2019-01-10 13:32:11', '2019-01-10 12:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_type`
--

INSERT INTO `ticket_type` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Fashion_shows', 'for fashion related shows and events', '2019-01-10 07:22:29', '2019-01-10 06:22:29'),
(2, 'Movie_tickets', 'action,romance, bollywood and many more ', '2019-01-10 07:23:29', '2019-01-10 06:23:29'),
(3, 'Concert_tickets', 'artists performance,musical concerts, comdey concerts', '2019-01-10 07:24:29', '2019-01-10 06:24:29'),
(4, 'Exhibition_tickets', 'art and other related exhibitions', '2019-01-10 07:25:29', '2019-01-10 06:25:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
