-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 06:35 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `login_id` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `nextofkin_phone` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `date_of_birth` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `place_of_birth` varchar(60) NOT NULL,
  `home_country` varchar(50) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `session` varchar(30) NOT NULL,
  `payment_status` varchar(10) NOT NULL DEFAULT 'false',
  `admission_status` varchar(10) NOT NULL DEFAULT 'false',
  `date_of_application` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `login_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `nextofkin_phone`, `address`, `email`, `date_of_birth`, `gender`, `marital_status`, `place_of_birth`, `home_country`, `programme`, `session`, `payment_status`, `admission_status`, `date_of_application`) VALUES
(1, '2011513335', 'Emeka', 'jnkjn', 'kjnkjn', 'kjkj', 'kjjk', 'kk', ',mnm,', 'njbm', 'male', 'single', 'jknk', 'jbkj', 'Computer Science', 'kjnk', 'true', 'true', '2018-06-03 04:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `article_text` mediumtext NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `login_id`, `article_text`, `submit_date`) VALUES
(2, '2011513335', '              Electronic bulletin boards (also known as message boards or as computer forums) are online communication systems where one can share, request, or discuss information on just about any subject. E-mail is a way to converse privately with one or more people over the Internet; electronic bulletin boards are public.', '2018-05-15 11:49:21'),
(3, '2011513335', '              Some threads continue on for days or weeks or months. Sometimes a poster with a question or a statement, however, is completely ignored. The longer threads tend to find people responding not only to the original post but to subsequent replies as well. ', '2018-05-15 11:49:48'),
(4, '2011513334', '              Videoconferencing implies the use of this technology for a group or organizational meeting rather than for individuals, in a videoconference. Video telephony comprises the technologies for the reception and transmission of audio-video signals by users at different locations, for communication between people in real time.', '2018-05-15 11:53:42'),
(5, '2011513334', 'It was one of the first methods to postulate the separation of concerns that defines its various models - requirements, conceptual, navigation, abstract interface and implementation. OOHDM, and its successor, SHDM (Semantic Hypermedia Design Method, which uses Semantic Web models) are supported by an open source, freely available environment, HyperDE. The Object-Oriented Hypermedia Design Method is a model-based approach for building hypermedia applications. ', '2018-06-02 13:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `login_id` varchar(60) NOT NULL,
  `comment_text` mediumtext NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `login_id`, `comment_text`, `comment_date`) VALUES
(1, 4, '2011513335', '         Information can be said to be any statement that convey a message or that makes sense', '2018-05-15 15:23:38'),
(2, 4, '2011513334', ' Information Technology means the processing and distribution of data using computer hardware and software, telecommunications, and digital electronics. ', '2018-05-15 15:28:11'),
(3, 2, '2011513334', '              Yes, it is equally know as Forum', '2018-05-15 16:07:37'),
(4, 3, '2011513334', '              It comprises four different activities namely conceptual design, navigational design, abstract interface design and implementation.', '2018-06-02 13:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` int(11) NOT NULL,
  `programme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `programme`) VALUES
(1, 'Computer Science'),
(2, 'Mass Communication'),
(3, 'Economics'),
(4, 'Human Relations');

-- --------------------------------------------------------

--
-- Table structure for table `user_info_table`
--

CREATE TABLE `user_info_table` (
  `login_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_table`
--

INSERT INTO `user_info_table` (`login_id`, `password`, `first_name`, `last_name`, `access_level`) VALUES
('2011513334', '123', 'Kenneth', 'Ogbeche', 2),
('2011513335', '123', 'Chijioke', 'Okwuosa', 1),
('Ok43', '12345', 'John', 'Okenwa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info_table`
--
ALTER TABLE `user_info_table`
  ADD PRIMARY KEY (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
