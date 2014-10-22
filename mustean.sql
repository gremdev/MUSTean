-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2014 at 01:16 PM
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
  `comment` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notif` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user`, `friend`, `status`) VALUES
(1, 1000001, 1000001, 1),
(2, 1000005, 1000005, 1),
(17, 1000001, 1000005, 1),
(18, 1000005, 1000001, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `notif`, `date`) VALUES
(1, 10007, 1000001, 0, '2014-10-22 13:11:45');

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
('81ed83b36fde736d31b7d4b2ba5ce0bb', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.104 Safari/537.36', 1413954523, 'a:4:{s:9:"user_data";s:0:"";s:8:"username";s:7:"gremdev";s:2:"id";s:7:"1000001";s:9:"logged_in";b:1;}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10008 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_posted`, `photo`, `user_id`) VALUES
(10000, NULL, '2014-10-21 23:43:45', 'f9b151d25c755cd676e83f11dac51c39.png', 1000001),
(10001, 'Hello World ...', '2014-10-21 23:45:55', NULL, 1000005),
(10002, 'I want to go to outer space :!', '2014-10-22 00:55:27', '4314ca1f9341eb91f49ad98aa6771d2a.png', 1000001),
(10005, NULL, '2014-10-22 01:38:26', '39cf6c2b4b9fc5f542ec446626b9bb58.png', 1000005),
(10006, 'Need to rest ..', '2014-10-22 01:54:44', NULL, 1000001),
(10007, NULL, '2014-10-22 12:18:10', '0716cf69935b5bef3d78b970476604a6.png', 1000001);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000006 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `password`, `email`, `fullname`, `address`, `birthday`, `about`, `profile_pic`, `course`, `year`) VALUES
(1000001, 'gremdev', '81dc9bdb52d04dc20036dbd8313ed055', 'grem.ociones@gmail.com', 'Gremeir Mitz Ociones', '#32 Zone 8 Cugman, Cagayan de Oro City', '1994-12-14', NULL, 'public/img/default-avatar.jpg', NULL, NULL),
(1000005, 'kakat', '81dc9bdb52d04dc20036dbd8313ed055', 'kakat.downy@gmail.com', 'kathlyn huavas', 'bugo, cdo', '1995-04-12', NULL, 'public/img/default-avatar.jpg', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
