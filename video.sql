-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 07:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `sl` int(11) NOT NULL,
  `postby` text NOT NULL,
  `title` text NOT NULL,
  `descrip` text NOT NULL,
  `videoname` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`sl`, `postby`, `title`, `descrip`, `videoname`, `date_time`) VALUES
(1, 'Suvendu Chowdhury', 'h1', 'h1', 'WhatsApp_Video_2022-05-21_at_8.37.38_PM_(2)1653196951.mp4', '2022-05-22 10:52:31'),
(2, 'Suvendu Chowdhury', 'h2', 'h2', 'WhatsApp_Video_2022-05-21_at_8.37.38_PM_(1)1653196980.mp4', '2022-05-22 10:53:00'),
(3, 'Suvendu ', 'h3', 'h3', 'WhatsApp_Video_2022-05-21_at_8.37.38_PM1653197054.mp4', '2022-05-22 10:54:14'),
(4, 'Supratim', 'h4', 'h4', 'WhatsApp_Video_2022-05-21_at_8.37.37_PM1653197093.mp4', '2022-05-22 10:54:53'),
(5, 'rahul', 'h5', 'h5', 'tony1653197214.mp4', '2022-05-22 10:56:54'),
(6, 'tiger', 'h6', 'h6', 'tig1653197303.mp4', '2022-05-22 10:58:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
