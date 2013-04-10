-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2012 at 09:44 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_access_levels`
--

CREATE TABLE IF NOT EXISTS `cms_access_levels` (
  `access_lvl` tinyint(4) NOT NULL AUTO_INCREMENT,
  `access_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`access_lvl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_access_levels`
--

INSERT INTO `cms_access_levels` (`access_lvl`, `access_name`) VALUES
(1, 'Users'),
(2, 'Moderator'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `cms_articles`
--

CREATE TABLE IF NOT EXISTS `cms_articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `date_submitted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_published` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` mediumtext NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `IdxArticle` (`author_id`,`date_submitted`),
  FULLTEXT KEY `IdxText` (`title`,`body`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cms_articles`
--

INSERT INTO `cms_articles` (`article_id`, `author_id`, `is_published`, `date_submitted`, `date_published`, `title`, `body`) VALUES
(7, 1, 1, '2012-10-24 14:28:51', '2012-10-24 14:29:40', 'Entry 2', '<p>\r\n	New entry with CK editor!</p>\r\n<p>\r\n	<span style="color:#808080;"><span style="font-family: tahoma,geneva,sans-serif;"><u><span style="background-color:#ffff00;">Test of formatting.</span></u></span></span></p>\r\n'),
(6, 1, 1, '2012-10-24 13:06:00', '2012-10-24 13:21:30', 'Hello World!', 'Hello world first post ever! '),
(8, 1, 0, '2012-10-25 02:28:52', '0000-00-00 00:00:00', '', ''),
(9, 3, 1, '2012-10-25 05:30:25', '2012-10-25 05:30:39', 'Picture!', '<p>\r\n	<img alt="" height="482" src="http://payload41.cargocollective.com/1/7/224531/3139336/Scenic_Canoe_900.jpg" width="364" /></p>\r\n<p>\r\n	Testing the adding of a picture from an online source/link.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cms_comments`
--

CREATE TABLE IF NOT EXISTS `cms_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_user` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `IdxComment` (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cms_comments`
--

INSERT INTO `cms_comments` (`comment_id`, `article_id`, `comment_date`, `comment_user`, `comment`) VALUES
(1, 6, '2012-10-24 13:51:02', 1, '1st comment!'),
(2, 7, '2012-10-25 05:21:11', 1, 'This is a cool use of CKeditor.'),
(3, 7, '2012-10-25 05:23:06', 1, 'Comment number two.'),
(4, 7, '2012-10-25 05:24:15', 3, 'First comment here with normal user JB 2.'),
(5, 9, '2012-10-25 06:06:08', 1, 'Cool photograph!');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE IF NOT EXISTS `cms_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `access_lvl` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`user_id`, `email`, `password`, `name`, `access_lvl`) VALUES
(1, 'jbern468@uwsp.edu', 'temp', 'Justin Bernklau', 3),
(3, 'justin@bernklausurveying.com', 'cms', 'JB 2', 1),
(7, 'temp@uwsp.edu', 'user', 'User', 2);
