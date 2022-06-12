-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 07, 2022 at 05:57 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hunting Runs`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_ranges`
--

CREATE TABLE `age_ranges` (
  `age_id` int(11) NOT NULL,
  `ages` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `age_ranges`
--

INSERT INTO `age_ranges` (`age_id`, `ages`) VALUES
(1, '11 and Under'),
(2, '11-14'),
(3, '15-18'),
(4, '18-25'),
(5, '26-35'),
(6, '36 and Up');

-- --------------------------------------------------------

--
-- Table structure for table `Court`
--

CREATE TABLE `Court` (
  `court_id` int(11) NOT NULL,
  `court_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Court`
--

INSERT INTO `Court` (`court_id`, `court_name`) VALUES
(1, 'Hillcrest'),
(2, 'Christie Pitts'),
(3, 'Dufferin Grove');

-- --------------------------------------------------------

--
-- Table structure for table `Game`
--

CREATE TABLE `Game` (
  `game_id` int(11) NOT NULL,
  `court_id` int(11) NOT NULL,
  `game_date` date NOT NULL,
  `game_time` time NOT NULL,
  `age_range` int(11) NOT NULL,
  `skill_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skill_level`
--

CREATE TABLE `skill_level` (
  `skill_id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_level`
--

INSERT INTO `skill_level` (`skill_id`, `level`) VALUES
(1, 'Beginner'),
(2, 'Intermediate'),
(3, 'Advanced');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Court`
--
ALTER TABLE `Court`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Court`
--
ALTER TABLE `Court`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Game`
--
ALTER TABLE `Game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
