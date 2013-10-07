-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2013 at 05:28 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rc-cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 98),
(2, 1, NULL, NULL, 'Account', 2, 17),
(3, 2, NULL, NULL, 'register', 3, 4),
(4, 2, NULL, NULL, 'activate', 5, 6),
(5, 2, NULL, NULL, 'index', 7, 8),
(6, 2, NULL, NULL, 'login', 9, 10),
(7, 2, NULL, NULL, 'change_password', 11, 12),
(8, 2, NULL, NULL, 'logout', 13, 14),
(9, 2, NULL, NULL, 'forgot_password', 15, 16),
(10, 1, NULL, NULL, 'Config', 18, 21),
(11, 10, NULL, NULL, 'index', 19, 20),
(12, 1, NULL, NULL, 'Contact', 22, 25),
(13, 12, NULL, NULL, 'index', 23, 24),
(14, 1, NULL, NULL, 'Home', 26, 29),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 1, NULL, NULL, 'Pages', 30, 33),
(17, 16, NULL, NULL, 'display', 31, 32),
(18, 1, NULL, NULL, 'Permissions', 34, 47),
(19, 18, NULL, NULL, 'index', 35, 36),
(20, 18, NULL, NULL, 'show_aco_tree', 37, 38),
(21, 18, NULL, NULL, 'add', 39, 40),
(22, 18, NULL, NULL, 'delete', 41, 42),
(23, 18, NULL, NULL, 'show_aro', 43, 44),
(24, 18, NULL, NULL, 'aco_sync', 45, 46),
(25, 1, NULL, NULL, 'Roles', 48, 59),
(26, 25, NULL, NULL, 'index', 49, 50),
(27, 25, NULL, NULL, 'view', 51, 52),
(28, 25, NULL, NULL, 'add', 53, 54),
(29, 25, NULL, NULL, 'edit', 55, 56),
(30, 25, NULL, NULL, 'delete', 57, 58),
(31, 1, NULL, NULL, 'Users', 60, 71),
(32, 31, NULL, NULL, 'index', 61, 62),
(33, 31, NULL, NULL, 'view', 63, 64),
(34, 31, NULL, NULL, 'add', 65, 66),
(35, 31, NULL, NULL, 'edit', 67, 68),
(36, 31, NULL, NULL, 'delete', 69, 70),
(37, 1, NULL, NULL, 'AclExtras', 72, 73),
(38, 1, NULL, NULL, 'Blog', 74, 87),
(39, 38, NULL, NULL, 'Blog', 75, 86),
(40, 39, NULL, NULL, 'index', 76, 77),
(41, 39, NULL, NULL, 'view', 78, 79),
(42, 39, NULL, NULL, 'add', 80, 81),
(43, 39, NULL, NULL, 'edit', 82, 83),
(44, 39, NULL, NULL, 'delete', 84, 85),
(45, 1, NULL, NULL, 'DebugKit', 88, 95),
(46, 45, NULL, NULL, 'ToolbarAccess', 89, 94),
(47, 46, NULL, NULL, 'history_state', 90, 91),
(48, 46, NULL, NULL, 'sql_explain', 92, 93),
(49, 1, NULL, NULL, 'Recaptcha', 96, 97);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, NULL, 1, 10),
(2, NULL, 'Role', 2, NULL, 11, 12),
(3, 1, 'User', 3, NULL, 2, 3),
(5, 1, 'User', 5, NULL, 6, 7),
(6, 1, 'User', 6, NULL, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 1, 2, '1', '1', '1', '1'),
(3, 1, 14, '1', '1', '1', '1'),
(4, 2, 1, '-1', '-1', '-1', '-1'),
(5, 2, 2, '-1', '-1', '-1', '-1'),
(6, 2, 14, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `created_by` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `config_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `var` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `created`, `updated`) VALUES
(1, 'admin', '2013-08-28 16:04:01', '2013-08-28 16:04:01'),
(2, 'user', '2013-08-28 16:04:10', '2013-08-28 16:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(32) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `confirmation_key` varchar(255) DEFAULT NULL,
  `is_email_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `first_name`, `last_name`, `email_address`, `password`, `phone`, `address`, `city`, `state`, `zip`, `country`, `created`, `updated`, `confirmation_key`, `is_email_confirmed`, `is_active`) VALUES
(1, 1, 'Dax', 'Panganiban', 'dax1216@gmail.com', '47056910acfb2435dc50b98d11e93e9dc2eb63c9', NULL, NULL, NULL, NULL, NULL, NULL, '2013-08-28 16:07:48', '2013-08-28 16:21:29', '91da817cc99d0ac75df94949a92b14f1', 0, 1),
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;