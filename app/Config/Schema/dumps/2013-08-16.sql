-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2013 at 05:51 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 80),
(2, 1, NULL, NULL, 'Account', 2, 15),
(3, 2, NULL, NULL, 'register', 3, 4),
(4, 2, NULL, NULL, 'activate', 5, 6),
(5, 2, NULL, NULL, 'index', 7, 8),
(6, 2, NULL, NULL, 'login', 9, 10),
(7, 2, NULL, NULL, 'change_password', 11, 12),
(8, 2, NULL, NULL, 'logout', 13, 14),
(10, 1, NULL, NULL, 'Config', 16, 17),
(11, 1, NULL, NULL, 'Contact', 18, 21),
(12, 11, NULL, NULL, 'index', 19, 20),
(13, 1, NULL, NULL, 'Home', 22, 25),
(14, 13, NULL, NULL, 'index', 23, 24),
(15, 1, NULL, NULL, 'Pages', 26, 29),
(16, 15, NULL, NULL, 'display', 27, 28),
(18, 1, NULL, NULL, 'Roles', 30, 41),
(19, 18, NULL, NULL, 'index', 31, 32),
(20, 18, NULL, NULL, 'view', 33, 34),
(21, 18, NULL, NULL, 'add', 35, 36),
(22, 18, NULL, NULL, 'edit', 37, 38),
(23, 18, NULL, NULL, 'delete', 39, 40),
(24, 1, NULL, NULL, 'Users', 42, 53),
(25, 24, NULL, NULL, 'index', 43, 44),
(26, 24, NULL, NULL, 'view', 45, 46),
(27, 24, NULL, NULL, 'add', 47, 48),
(28, 24, NULL, NULL, 'edit', 49, 50),
(29, 24, NULL, NULL, 'delete', 51, 52),
(30, 1, NULL, NULL, 'AclExtras', 54, 55),
(31, 1, NULL, NULL, 'Blog', 56, 69),
(32, 31, NULL, NULL, 'Blog', 57, 68),
(33, 32, NULL, NULL, 'index', 58, 59),
(34, 32, NULL, NULL, 'view', 60, 61),
(35, 32, NULL, NULL, 'add', 62, 63),
(36, 32, NULL, NULL, 'edit', 64, 65),
(37, 32, NULL, NULL, 'delete', 66, 67),
(38, 1, NULL, NULL, 'DebugKit', 70, 77),
(40, 38, NULL, NULL, 'ToolbarAccess', 71, 76),
(41, 40, NULL, NULL, 'history_state', 72, 73),
(42, 40, NULL, NULL, 'sql_explain', 74, 75),
(43, 1, NULL, NULL, 'Recaptcha', 78, 79);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `created`, `updated`) VALUES
(1, 'admin', '2013-08-13 11:17:17', '2013-08-13 11:22:03');

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
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `confirmation_key` varchar(255) DEFAULT NULL,
  `is_email_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `first_name`, `last_name`, `email_address`, `password`, `created`, `updated`, `confirmation_key`, `is_email_confirmed`) VALUES
(1, 1, 'Dax', 'Panganiban', 'dax@dax.com', '3581dfec2ae50ee97eeb531c44097f28fedad6ad', '2013-08-01 15:51:12', '2013-08-13 12:16:57', '23dcee5afd0207370e89c26b6369ef7c', 1),
(2, 1, 'John', 'Doe', 'john@test.com', '47056910acfb2435dc50b98d11e93e9dc2eb63c9', '2013-08-13 12:30:19', '2013-08-13 13:30:49', NULL, 0);

