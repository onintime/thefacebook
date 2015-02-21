-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2015 at 10:52 AM
-- Server version: 5.5.40-MariaDB-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountstatus`
--

CREATE TABLE IF NOT EXISTS `accountstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `accountstatus`
--

INSERT INTO `accountstatus` (`id`, `name`) VALUES
(1, 'Registered'),
(2, 'Confirmed'),
(3, 'School Admin'),
(9, 'Super Admin'),
(-1, 'Deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `schoolid` bigint(20) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=256 ;

-- --------------------------------------------------------

--
-- Table structure for table `classlink`
--

CREATE TABLE IF NOT EXISTS `classlink` (
  `userid` bigint(20) NOT NULL,
  `classid` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=486 ;

-- --------------------------------------------------------

--
-- Table structure for table `confirmationemail`
--

CREATE TABLE IF NOT EXISTS `confirmationemail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `confirmnumber` bigint(20) NOT NULL,
  `codenumber` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `creatorid` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pictureid` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventlink`
--

CREATE TABLE IF NOT EXISTS `eventlink` (
  `userid` bigint(20) NOT NULL,
  `eventid` bigint(20) NOT NULL,
  `statusid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventlinkstatus`
--

CREATE TABLE IF NOT EXISTS `eventlinkstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fridge`
--

CREATE TABLE IF NOT EXISTS `fridge` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET cp1251 COLLATE cp1251_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

--
-- Table structure for table `fridgelink`
--

CREATE TABLE IF NOT EXISTS `fridgelink` (
  `userid` bigint(20) NOT NULL,
  `fridgeid` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`,`fridgeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

-- --------------------------------------------------------

--
-- Table structure for table `highschool`
--

CREATE TABLE IF NOT EXISTS `highschool` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=466 ;

--
-- Dumping data for table `highschool`
--

INSERT INTO `highschool` (`id`, `name`) VALUES
(465, '');

-- --------------------------------------------------------

--
-- Table structure for table `hitsperday`
--

CREATE TABLE IF NOT EXISTS `hitsperday` (
  `hits` bigint(21) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hitspermonth`
--

CREATE TABLE IF NOT EXISTS `hitspermonth` (
  `hits` bigint(21) DEFAULT NULL,
  `date` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hits_per_day`
--

CREATE TABLE IF NOT EXISTS `hits_per_day` (
  `hits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hits_Per_Day`
--

CREATE TABLE IF NOT EXISTS `Hits_Per_Day` (
  `hits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hits_per_month`
--

CREATE TABLE IF NOT EXISTS `hits_per_month` (
  `hits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hits_Per_Month`
--

CREATE TABLE IF NOT EXISTS `Hits_Per_Month` (
  `hits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interestedin`
--

CREATE TABLE IF NOT EXISTS `interestedin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `interestedinlink`
--

CREATE TABLE IF NOT EXISTS `interestedinlink` (
  `userid` bigint(20) NOT NULL,
  `interestedinid` bigint(20) NOT NULL,
  KEY `userid` (`userid`,`interestedinid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET cp1251 COLLATE cp1251_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

-- --------------------------------------------------------

--
-- Table structure for table `interestslink`
--

CREATE TABLE IF NOT EXISTS `interestslink` (
  `userid` bigint(20) NOT NULL,
  `interestsid` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`,`interestsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1254 ;

-- --------------------------------------------------------

--
-- Table structure for table `lastactivity`
--

CREATE TABLE IF NOT EXISTS `lastactivity` (
  `last` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lastupdate`
--

CREATE TABLE IF NOT EXISTS `lastupdate` (
  `last` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `last_activity`
--

CREATE TABLE IF NOT EXISTS `last_activity` (
  `last` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_update`
--

CREATE TABLE IF NOT EXISTS `last_update` (
  `last` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `last_update`
--

INSERT INTO `last_update` (`last`, `user_id`) VALUES
('2015-02-07 12:04:52', 717573339),
('2015-02-11 11:09:16', 100002070630629),
('2015-02-08 08:17:33', 1357729593),
('2015-02-08 08:13:00', 100008643187739),
('2015-02-06 13:55:33', 2),
('2015-02-07 05:10:34', 100008857772572),
('2015-02-06 13:55:40', 3),
('2015-02-07 05:20:03', 100008857772573),
('2015-02-11 09:53:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page` text NOT NULL,
  `ip` varchar(16) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `get` text NOT NULL,
  `post` text NOT NULL,
  `ref` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `idx_refs` (`timestamp`,`ref`(20),`id`),
  KEY `idx_times` (`timestamp`),
  KEY `idx_times_ip` (`timestamp`,`ip`),
  KEY `idx_ip` (`ip`),
  KEY `idx_times_userid` (`timestamp`,`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1157969 ;

--
-- Triggers `log`
--
DROP TRIGGER IF EXISTS `log_trigger`;
DELIMITER //
CREATE TRIGGER `log_trigger` AFTER INSERT ON `log`
 FOR EACH ROW BEGIN
REPLACE INTO `last_activity` (`last`, `user_id`) VALUES (NOW(), NEW.userid);
IF (Select count(1) from `Hits_Per_Day` WHERE `date`=CURDATE())=0 THEN
	INSERT INTO `Hits_Per_Day` (`date`,`hits`) VALUES (CURDATE(),'1');
ELSE
	UPDATE `Hits_Per_Day` SET `hits`=`hits`+1 WHERE `date`=CURDATE();
END IF;
IF (Select count(1) from `Hits_Per_Month` WHERE `date`=concat(YEAR(curdate()),"-",month(curdate()),"-0"))=0 THEN
	INSERT INTO `Hits_Per_Month` (`date`,`hits`) VALUES (concat(YEAR(curdate()),"-",month(curdate()),"-0"),'1');
ELSE
	UPDATE `Hits_Per_Month` SET `hits`=`hits`+1 WHERE `date`=concat(YEAR(curdate()),"-",month(curdate()),"-0");
END IF;
IF NEW.userid>0 AND (Select count(1) from `log` WHERE `userid`=NEW.userid AND `timestamp`>CURDATE())=1 THEN
	IF (Select count(1) from `Users_Per_Day` WHERE `date`=CURDATE())=0 THEN
		INSERT INTO `Users_Per_Day` (`date`,`hits`) VALUES (CURDATE(),'1');
	ELSE
		UPDATE `Users_Per_Day` SET `hits`=`hits`+1 WHERE `date`=CURDATE();
	END IF;
END IF;
IF (Select count(1) from `log` WHERE `ip`=NEW.ip AND `timestamp`>CURDATE())=1 THEN
	IF (Select count(1) from `Uniques_Per_Day` WHERE `date`=CURDATE())=0 THEN
		INSERT INTO `Uniques_Per_Day` (`date`,`hits`) VALUES (CURDATE(),'1');
	ELSE
		UPDATE `Uniques_Per_Day` SET `hits`=`hits`+1 WHERE `date`=CURDATE();
	END IF;
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lookingfor`
--

CREATE TABLE IF NOT EXISTS `lookingfor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lookingfor`
--

INSERT INTO `lookingfor` (`id`, `name`) VALUES
(1, 'Friendship'),
(2, 'Relationship'),
(3, 'Dating'),
(4, 'Hooking-up'),
(5, 'Moral Support'),
(6, 'Parties');

-- --------------------------------------------------------

--
-- Table structure for table `lookingforlink`
--

CREATE TABLE IF NOT EXISTS `lookingforlink` (
  `userid` bigint(20) NOT NULL,
  `lookingforid` bigint(20) NOT NULL,
  KEY `userid` (`userid`,`lookingforid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `senderid` bigint(20) NOT NULL,
  `receiverid` bigint(20) NOT NULL,
  `messagestatusid` int(11) NOT NULL,
  `subject` text NOT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `senderid` (`senderid`,`receiverid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=571 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `senderid`, `receiverid`, `messagestatusid`, `subject`, `text`, `timestamp`) VALUES
(566, 100008857772572, 100008857772572, 2, 'Hi mukti', 'dsadasdasdfas', '2015-02-07 11:54:18'),
(565, 100008857772573, 100008857772572, 1, 'Hi this is test mail', 'Hello Jehal,\r\nIts test mail for you', '2015-02-07 13:53:24'),
(564, 3, 2, 1, 'Hi mukti', 'Hello mi', '2015-02-06 22:38:48'),
(567, 100008857772572, 100008857772573, 2, 'Hi mukti', 'Will you be my friend?', '2015-02-07 12:08:27'),
(568, 100008857772573, 100008857772572, 1, 'RE:Hi mukti', 'I accepted you request', '2015-02-07 14:08:41'),
(569, 1, 2, 2, 'Hi this is test mail', 'hi', '2015-02-07 20:19:30'),
(570, 2, 1, 2, 'RE:Hi this is test mail', 'hi', '2015-02-07 20:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `messagestatus`
--

CREATE TABLE IF NOT EXISTS `messagestatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messagestatus`
--

INSERT INTO `messagestatus` (`id`, `name`) VALUES
(1, 'Sent'),
(2, 'Read'),
(3, 'Replied');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET cp1251 COLLATE cp1251_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

-- --------------------------------------------------------

--
-- Table structure for table `musiclink`
--

CREATE TABLE IF NOT EXISTS `musiclink` (
  `userid` bigint(20) NOT NULL,
  `musicid` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`,`musicid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1208 ;

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `userid` bigint(20) NOT NULL,
  `lastactive` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phoneprovider`
--

CREATE TABLE IF NOT EXISTS `phoneprovider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `textext` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `albumid` bigint(20) NOT NULL,
  `link` text NOT NULL,
  `thumb` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23100 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `userid`, `albumid`, `link`, `thumb`) VALUES
(23082, 717573339, 0, '6917991_268221_64054566', ''),
(23083, 100002070630629, 0, '7912884_9808919_73745329', ''),
(23084, 1357729593, 0, '1378022_5831521_35224666', ''),
(23085, 717573339, 0, '9488542_9528078_59651857', ''),
(23086, 717573339, 0, '3663452_3611785_46751711', ''),
(23087, 717573339, 0, '2393401_2485035_77089578', ''),
(23088, 100002070630629, 0, '5494376_781146_59050462', ''),
(23089, 1357729593, 0, '7483770_7208849_53770681', ''),
(23090, 717573339, 0, '489070_5964378_85983730', ''),
(23091, 100002070630629, 0, '7188050_7876293_39189036', ''),
(23092, 717573339, 0, '6064659_8254615_87605379', ''),
(23093, 100002070630629, 0, '6971095_5024359_61684785', ''),
(23094, 100002070630629, 0, '7471431_6556596_65709125', ''),
(23095, 717573339, 0, '8830068_7162199_70843644', ''),
(23096, 717573339, 0, '6961163_9138206_14031721', ''),
(23097, 1357729593, 0, '9748406_5742872_46198736', ''),
(23098, 1357729593, 0, '3932781_854074_31692466', ''),
(23099, 100002070630629, 0, '1002781_9448459_96784763', '');

-- --------------------------------------------------------

--
-- Table structure for table `political`
--

CREATE TABLE IF NOT EXISTS `political` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `political`
--

INSERT INTO `political` (`id`, `name`) VALUES
(1, 'Very Liberal'),
(2, 'Liberal'),
(3, 'Middle of the road'),
(4, 'Conservative'),
(5, 'Very Conservative');

-- --------------------------------------------------------

--
-- Table structure for table `premiumlogin`
--

CREATE TABLE IF NOT EXISTS `premiumlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `activation_key` varchar(50) NOT NULL,
  `activation_state` tinyint(1) NOT NULL,
  `social_id` varchar(50) NOT NULL,
  `social_type` varchar(10) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `about` varchar(150) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `premiumlogin`
--

INSERT INTO `premiumlogin` (`id`, `username`, `email`, `password`, `user_type`, `activation_key`, `activation_state`, `social_id`, `social_type`, `avatar`, `fullname`, `phone`, `location`, `about`, `gender`, `join_date`) VALUES
(1, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', 1, '', 'normal', '', '', '', '', '', '', '2014-05-13 18:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE IF NOT EXISTS `privacy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `network` int(11) NOT NULL,
  `searchable` tinyint(4) NOT NULL,
  `visibility` int(11) NOT NULL,
  `newsletter` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profileupdates`
--

CREATE TABLE IF NOT EXISTS `profileupdates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26984 ;

--
-- Dumping data for table `profileupdates`
--

INSERT INTO `profileupdates` (`id`, `userid`, `timestamp`) VALUES
(26939, 717573339, '2015-02-01 22:22:41'),
(26940, 100002070630629, '2015-02-01 22:23:30'),
(26941, 1357729593, '2015-02-01 22:25:59'),
(26942, 1357729593, '2015-02-01 23:20:54'),
(26943, 1357729593, '2015-02-01 23:21:02'),
(26944, 1357729593, '2015-02-01 23:21:12'),
(26945, 717573339, '2015-02-02 20:52:43'),
(26946, 717573339, '2015-02-02 23:07:49'),
(26947, 717573339, '2015-02-02 23:51:53'),
(26948, 100008643187739, '2015-02-03 00:36:52'),
(26949, 100002070630629, '2015-02-03 00:44:07'),
(26950, 1357729593, '2015-02-03 00:54:32'),
(26951, 717573339, '2015-02-03 00:56:32'),
(26952, 2, '2015-02-04 11:41:28'),
(26953, 2, '2015-02-04 11:41:37'),
(26954, 2, '2015-02-04 11:42:52'),
(26955, 100002070630629, '2015-02-04 11:43:20'),
(26956, 2, '2015-02-04 12:56:30'),
(26957, 100008857772572, '2015-02-04 12:56:58'),
(26958, 100008857772572, '2015-02-04 12:57:11'),
(26959, 100008857772572, '2015-02-04 12:57:22'),
(26960, 3, '2015-02-06 22:54:35'),
(26961, 3, '2015-02-06 22:54:51'),
(26962, 3, '2015-02-06 22:55:06'),
(26963, 2, '2015-02-06 22:55:26'),
(26964, 2, '2015-02-06 22:55:33'),
(26965, 3, '2015-02-06 22:55:40'),
(26966, 717573339, '2015-02-06 23:01:25'),
(26967, 100002070630629, '2015-02-06 23:01:47'),
(26968, 100002070630629, '2015-02-06 23:04:20'),
(26969, 100002070630629, '2015-02-06 23:04:28'),
(26970, 100002070630629, '2015-02-07 12:59:44'),
(26971, 717573339, '2015-02-07 13:20:51'),
(26972, 100008857772572, '2015-02-07 14:10:34'),
(26973, 100008857772573, '2015-02-07 14:20:03'),
(26974, 717573339, '2015-02-07 21:04:52'),
(26975, 1357729593, '2015-02-08 00:34:19'),
(26976, 100008643187739, '2015-02-08 17:13:00'),
(26977, 1357729593, '2015-02-08 17:17:33'),
(26978, 1, '2015-02-11 18:42:00'),
(26979, 1, '2015-02-11 18:42:03'),
(26980, 1, '2015-02-11 18:43:37'),
(26981, 1, '2015-02-11 18:44:06'),
(26982, 1, '2015-02-11 18:53:31'),
(26983, 100002070630629, '2015-02-11 20:09:16');

--
-- Triggers `profileupdates`
--
DROP TRIGGER IF EXISTS `lu_trigger`;
DELIMITER //
CREATE TRIGGER `lu_trigger` AFTER INSERT ON `profileupdates`
 FOR EACH ROW BEGIN
REPLACE INTO `last_update` (`last`, `user_id`) VALUES (DATE_ADD(NOW(), INTERVAL 1 HOUR), NEW.userid);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `senderid` bigint(20) NOT NULL,
  `receiverid` bigint(20) NOT NULL,
  `realtionshiptypeid` int(11) NOT NULL,
  `confirmed` int(11) NOT NULL,
  KEY `senderid` (`senderid`,`receiverid`),
  KEY `send_rec_idx` (`senderid`,`receiverid`,`confirmed`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relationshiptype`
--

CREATE TABLE IF NOT EXISTS `relationshiptype` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `relationshiptype`
--

INSERT INTO `relationshiptype` (`id`, `name`) VALUES
(1, 'Friends'),
(2, 'Casually dating'),
(3, 'In a serious relationship'),
(4, 'Friends with benefits'),
(5, 'Best Friends'),
(6, 'Rivals'),
(7, 'Enemies'),
(8, 'Engaged'),
(9, 'Married');

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE IF NOT EXISTS `residence` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=287 ;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`id`, `name`) VALUES
(285, ''),
(286, 'Valsad');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `emailextension` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17126641 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `emailextension`) VALUES
(-1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schoolstatus`
--

CREATE TABLE IF NOT EXISTS `schoolstatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `schoolstatus`
--

INSERT INTO `schoolstatus` (`id`, `name`) VALUES
(1, 'Student'),
(2, 'Alumnus/Alumna'),
(3, 'Faculty'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `schoolsuggestions`
--

CREATE TABLE IF NOT EXISTS `schoolsuggestions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `school` text NOT NULL,
  `dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9168 ;

--
-- Dumping data for table `schoolsuggestions`
--

INSERT INTO `schoolsuggestions` (`id`, `email`, `school`, `dtime`) VALUES
(9167, '', 'test', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `screenname`
--

CREATE TABLE IF NOT EXISTS `screenname` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `site_on` tinyint(4) NOT NULL,
  `email_alerts` tinyint(4) NOT NULL,
  `launch_date` text NOT NULL,
  `registration_on` tinyint(4) NOT NULL,
  `login_on` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_on`, `email_alerts`, `launch_date`, `registration_on`, `login_on`) VALUES
(1, 0, '2011-04-06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE IF NOT EXISTS `sex` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `name`) VALUES
(1, 'Female'),
(2, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `Uniques_Per_Day`
--

CREATE TABLE IF NOT EXISTS `Uniques_Per_Day` (
  `hits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `accountstatusid` tinyint(4) NOT NULL,
  `registerdate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `schoolid` bigint(20) NOT NULL,
  `phone` text NOT NULL,
  `phoneproviderid` int(11) NOT NULL,
  `graduationyear` varchar(4) NOT NULL,
  `schoolstatusid` tinyint(4) NOT NULL,
  `sexid` tinyint(4) NOT NULL,
  `residenceid` bigint(20) NOT NULL,
  `birthday` date NOT NULL,
  `hometown` text NOT NULL,
  `highschoolid` bigint(20) NOT NULL,
  `screennameid` bigint(20) NOT NULL,
  `websites` text NOT NULL,
  `politicalid` bigint(20) NOT NULL,
  `newsletters` int(11) NOT NULL,
  `posttofb` int(11) NOT NULL,
  `location` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `idx_reg_date` (`id`,`accountstatusid`,`registerdate`),
  KEY `idx_name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE IF NOT EXISTS `userstatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `text` text NOT NULL,
  `dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Users_Per_Day`
--

CREATE TABLE IF NOT EXISTS `Users_Per_Day` (
  `hits` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whatcamefirstodayratings`
--

CREATE TABLE IF NOT EXISTS `whatcamefirstodayratings` (
  `id` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `whatcamefirsttoday`
--

CREATE TABLE IF NOT EXISTS `whatcamefirsttoday` (
  `id` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
