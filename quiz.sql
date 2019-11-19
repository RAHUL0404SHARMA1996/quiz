-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 07:12 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'zotak007');

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id` int(100) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id`, `data`) VALUES
(1, 'quiz1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `date` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`date`, `email`, `name`, `message`) VALUES
('2019-Apr-Wed 07:57:47pm', 'spsouravpal1@gmail.com', 'pal', 'hi'),
('2019-Apr-Wed 07:58:14pm', 'spsouravpal1@gmail.com', 'pal', 'ASDFGHJ'),
('2019-Apr-Wed 09:58:12pm', 'spsouravpal1@gmail.com', 'pal', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `front`
--

CREATE TABLE `front` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `qoute` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front`
--

INSERT INTO `front` (`id`, `image`, `qoute`) VALUES
(1, '4.jpg', 'O YES!'),
(2, '6.jpg', '\"WORK UNTIL YOUR IDOLS BECOME YOUR RIVALS\"'),
(3, '10.jpeg', '\"WITH THE NEW DAY COMES NEW STRENGTH AND NEW THOUGHTS.\" '),
(4, '1.jpg', '\"A GOAL WITHOUT A PLAN IS JUST A WISH\"'),
(5, '3.jpg', '\"THE IDEA OF WAITING FOR SOMETHING<br><br>MAKES IT MORE FASCINATING.\"');

-- --------------------------------------------------------

--
-- Table structure for table `quiz1`
--

CREATE TABLE `quiz1` (
  `id` int(100) NOT NULL,
  `dataset_id` int(100) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz1`
--

INSERT INTO `quiz1` (`id`, `dataset_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `correct`) VALUES
(1, 1, 'css stands for?', 'Computer Styled Sections', 'Cascading Style Sheets', 'Crazy Solid Shapes', 'None of the above', 'b'),
(2, 1, 'Internet Explorer 6 was released in-', '2001', '1998', '2002', '2004', 'a'),
(3, 1, 'SEO Stand for?', 'Secret Enterprise Organizations', 'Special Endowment Opportunity', 'Search Engine Optimization', 'Seals End Olives', 'c'),
(4, 1, 'i tag is used for', 'increment', 'italic', 'initialize ', 'none', 'b'),
(5, 1, 'class selector is used with which symbol', '#(hash)', ';(semicolon)', '-(dash)', '.(dot)', 'd'),
(7, 1, 'Choose the correct HTML element to define important text', 'important', 'br', 'b', 'strong', 'd'),
(8, 1, 'How can you open a link in a new tab/browser window?', 'a href=\"url\" target=\"_blank\"', 'a href=\"url\" new', 'a href=\"url\" target=\"new', 'none', 'a'),
(9, 1, 'What is the correct HTML element for playing audio files?', 'audio', 'mp3', 'media', 'none', 'a'),
(10, 1, 'The HTML canvas element is used to:', 'create draggable elements', 'draw graphics', ' display database records', 'manipulate data in MySQL', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_master`
--

CREATE TABLE `quiz_master` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `password` varchar(10) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `dataset_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_master`
--

INSERT INTO `quiz_master` (`id`, `title`, `date`, `password`, `duration`, `dataset_id`) VALUES
(17, 'battle', '2019-04-21', '123', '50', 1),
(19, 'war', '2019-04-21', '345', '34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` varchar(200) NOT NULL,
  `contest` varchar(100) NOT NULL,
  `marks` float NOT NULL,
  `contest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `email`, `date`, `contest`, `marks`, `contest_id`) VALUES
(3, 'zotak007@gmail.com', '2019-Apr-Wed 08:55:14pm', 'BATTLE', 13, 17),
(7, 'spsouravpal1@gmail.com', '2019-Apr-Wed 10:07:12pm', 'BATTLE', 8, 17);

-- --------------------------------------------------------

--
-- Table structure for table `temp_data`
--

CREATE TABLE `temp_data` (
  `email` varchar(100) NOT NULL,
  `dataset_id` int(100) NOT NULL,
  `qid` int(100) NOT NULL,
  `user_answer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front`
--
ALTER TABLE `front`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz1`
--
ALTER TABLE `quiz1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_master`
--
ALTER TABLE `quiz_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front`
--
ALTER TABLE `front`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz1`
--
ALTER TABLE `quiz1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_master`
--
ALTER TABLE `quiz_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
