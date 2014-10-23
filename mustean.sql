-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2014 at 12:48 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mustean`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notif` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `notif`, `date`) VALUES
(1, 'Hello from comment', 10009, 1000001, 1, '2014-10-23 01:24:34'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 10009, 1000001, 1, '2014-10-23 01:29:45'),
(5, 'HAHAHA... maka comment na.', 10009, 1000001, 0, '2014-10-23 02:30:12'),
(21, 'para asa na?', 10011, 1000001, 0, '2014-10-23 02:53:47'),
(27, 'na fix na..', 10012, 1000001, 0, '2014-10-23 03:01:15'),
(28, 'test', 10010, 1000001, 0, '2014-10-23 03:26:12'),
(29, '@#DS#$%', 10016, 1000006, 0, '2014-10-23 05:04:30'),
(30, 'alert(''Hello'')', 10016, 1000006, 0, '2014-10-23 05:04:43'),
(31, 'unta', 10015, 1000001, 0, '2014-10-23 09:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user`, `friend`, `status`) VALUES
(1, 1000001, 1000001, 1),
(2, 1000005, 1000005, 1),
(17, 1000001, 1000005, 1),
(18, 1000005, 1000001, 1),
(19, 1000006, 1000006, 1),
(20, 1000007, 1000007, 1),
(21, 1000008, 1000008, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notif` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1090 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `notif`, `date`) VALUES
(1035, 10007, 1000005, 0, '2014-10-22 15:55:04'),
(1036, 10005, 1000005, 1, '2014-10-22 15:55:11'),
(1074, 10006, 1000001, 1, '2014-10-22 17:45:24'),
(1089, 10000, 1000001, 1, '2014-10-22 17:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `mustean_sessions`
--

CREATE TABLE IF NOT EXISTS `mustean_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mustean_sessions`
--

INSERT INTO `mustean_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('cc50a73f1d0423d068ba760f77169f0c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.104 Safari/537.36', 1414039558, 'a:4:{s:9:"user_data";s:0:"";s:8:"username";s:7:"gremdev";s:2:"id";s:7:"1000001";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text,
  `date_posted` datetime NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10017 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_posted`, `photo`, `user_id`) VALUES
(10000, NULL, '2014-10-21 23:43:45', 'f9b151d25c755cd676e83f11dac51c39.png', 1000001),
(10001, 'Hello World ...', '2014-10-21 23:45:55', NULL, 1000005),
(10002, 'I want to go to outer space :!', '2014-10-22 00:55:27', '4314ca1f9341eb91f49ad98aa6771d2a.png', 1000001),
(10005, NULL, '2014-10-22 01:38:26', '39cf6c2b4b9fc5f542ec446626b9bb58.png', 1000005),
(10006, 'Need to rest ..', '2014-10-22 01:54:44', NULL, 1000001),
(10007, NULL, '2014-10-22 12:18:10', '0716cf69935b5bef3d78b970476604a6.png', 1000001),
(10008, 'chfghfgh', '2014-10-22 18:58:38', NULL, 1000001),
(10009, NULL, '2014-10-22 22:17:10', '7140ae5267ebc58107eb31718b78d55c.jpg', 1000001),
(10010, 'Test :DD', '2014-10-23 01:34:00', NULL, 1000001),
(10011, NULL, '2014-10-23 02:53:11', '3ed97c4b7a4306ba44728b306f8f37a3.jpg', 1000005),
(10012, 'Tsk.. Kapoya.. Dli nko gakawala ang comment nga naa sa input box', '2014-10-23 02:54:37', NULL, 1000001),
(10013, NULL, '2014-10-23 03:08:43', '09ec208fdb7939a9582f9bc957e687a5.png', 1000001),
(10014, 'Yahhhhhhooooooooo. Taas2 na ang progress..', '2014-10-23 03:26:46', NULL, 1000001),
(10015, 'Gamay2 nlang !!!! Kaya lge ni..', '2014-10-23 04:04:40', NULL, 1000005),
(10016, 'Hello! From ricky...', '2014-10-23 05:03:56', 'e901d847fbb148ee2379b1abcaf91de8.png', 1000006);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE IF NOT EXISTS `reserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reserve_word` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `reserve_word`) VALUES
(1, 'login'),
(2, 'logout'),
(3, 'signup'),
(4, 'profile'),
(5, 'auth'),
(6, 'main'),
(7, 'index'),
(8, 'status'),
(9, 'data'),
(10, 'public'),
(11, 'newsfeed'),
(12, 'search'),
(13, 'blog'),
(14, 'submit');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `about` text,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'public/img/default-avatar.jpg',
  `course` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000009 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `password`, `email`, `fullname`, `address`, `birthday`, `about`, `profile_pic`, `course`, `year`) VALUES
(1000001, 'gremdev', '81dc9bdb52d04dc20036dbd8313ed055', 'grem.ociones@gmail.com', 'Gremeir Mitz Ociones', '#32 Zone 8 Cugman, Cagayan de Oro City', '1994-12-14', NULL, 'public/uploads/4314ca1f9341eb91f49ad98aa6771d2a.png', NULL, NULL),
(1000005, 'kakat', '81dc9bdb52d04dc20036dbd8313ed055', 'kakat.downy@gmail.com', 'kathlyn huavas', 'bugo, cdo', '1995-04-12', NULL, 'public/img/default-avatar.jpg', NULL, NULL),
(1000006, 'ricky', '81dc9bdb52d04dc20036dbd8313ed055', 'ricky.pantuan@gmail.com', 'ricky pantuan', 'bugo, cdo', '2312-12-13', NULL, 'public/img/default-avatar.jpg', NULL, NULL),
(1000007, 'jessa', '81dc9bdb52d04dc20036dbd8313ed055', 'jessa.vasallo@gmail.com', 'jessa mae vasallo', 'bugo, cdo', '5452-12-31', NULL, 'public/img/default-avatar.jpg', NULL, NULL),
(1000008, 'vanbautista', '81dc9bdb52d04dc20036dbd8313ed055', 'van.bautista@gmail.com', 'van bautista', 'cagayan de oro', '1990-02-12', NULL, 'public/img/default-avatar.jpg', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
