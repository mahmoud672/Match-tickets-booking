-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 سبتمبر 2019 الساعة 15:52
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- بنية الجدول `messages_table`
--

CREATE TABLE IF NOT EXISTS `messages_table` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_email` varchar(100) NOT NULL,
  `msg_content` text NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- إرجاع أو استيراد بيانات الجدول `messages_table`
--

INSERT INTO `messages_table` (`msg_id`, `sender_email`, `msg_content`) VALUES
(3, 'ahmed@yahoo.com', 'content'),
(4, 'aaa@aaa.ccx', 'ddddddddddd'),
(5, 'hamed@ww.ccc', 'dddddddddd'),
(6, 'qqq2qqq@www.cc', 'ffff');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_admins`
--

CREATE TABLE IF NOT EXISTS `tbl_admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(500) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_telephone` varchar(250) NOT NULL,
  `admin_last_login_time` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_admins`
--

INSERT INTO `tbl_admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_telephone`, `admin_last_login_time`) VALUES
(1, 'Ahmed Hamed', 'hamed@gmail.com', '12345678', '0123548765', '2019-09-02 15:50:31'),
(3, 'Ibrahim', 'ibrahim@gmail.com', '12345678', '0125874555', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `level1_details` int(11) NOT NULL,
  `level2_details` int(11) NOT NULL,
  `level3_details` int(11) NOT NULL,
  `booking_time` datetime NOT NULL,
  `booking_status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`booking_id`),
  KEY `fk_matchid` (`match_id`),
  KEY `fk_userid` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `user_id`, `match_id`, `level1_details`, `level2_details`, `level3_details`, `booking_time`, `booking_status`) VALUES
(1, 3, 20, 10, 5, 10, '2016-06-06 06:00:00', 1),
(3, 3, 21, 2, 1, 0, '2016-06-05 06:00:00', 1),
(4, 3, 21, 2, 1, 0, '2016-06-05 06:00:00', 1),
(24, 3, 23, 1000, 2000, 2000, '2016-07-02 11:07:25', 0),
(25, 3, 23, 1000, 3000, 0, '2016-07-02 11:10:49', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_champions`
--

CREATE TABLE IF NOT EXISTS `tbl_champions` (
  `champion_id` int(11) NOT NULL AUTO_INCREMENT,
  `champion_name` varchar(500) NOT NULL,
  PRIMARY KEY (`champion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_champions`
--

INSERT INTO `tbl_champions` (`champion_id`, `champion_name`) VALUES
(3, 'super'),
(4, 'cup'),
(5, 'league');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_levels`
--

CREATE TABLE IF NOT EXISTS `tbl_levels` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(500) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_levels`
--

INSERT INTO `tbl_levels` (`level_id`, `level_name`) VALUES
(1, 'Level 1'),
(2, 'Level 2 '),
(3, 'Level 3');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_levels_ticket_prices`
--

CREATE TABLE IF NOT EXISTS `tbl_levels_ticket_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `level_1_details` varchar(50) NOT NULL COMMENT 'num_tickets/price',
  `level_2_details` varchar(50) NOT NULL COMMENT 'num_tickets/price',
  `level_3_details` varchar(50) NOT NULL COMMENT 'num_tickets/price',
  PRIMARY KEY (`id`),
  KEY `fk_match_id` (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_levels_ticket_prices`
--

INSERT INTO `tbl_levels_ticket_prices` (`id`, `match_id`, `level_1_details`, `level_2_details`, `level_3_details`) VALUES
(4, 21, '1000/100', '5000/75', '2000/25'),
(6, 23, '2000/100', '5000/10', '2000/15'),
(10, 20, '200/100', '150/75', '150/25');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_match`
--

CREATE TABLE IF NOT EXISTS `tbl_match` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `match_name` varchar(500) NOT NULL,
  `match_time` datetime NOT NULL,
  `tickets_numbers` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `champion_id` int(11) NOT NULL,
  PRIMARY KEY (`match_id`),
  KEY `fk_teamid` (`team1_id`),
  KEY `fk_team2id` (`team2_id`),
  KEY `fk_championid` (`champion_id`),
  KEY `fk_placeid` (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_match`
--

INSERT INTO `tbl_match` (`match_id`, `match_name`, `match_time`, `tickets_numbers`, `place_id`, `team1_id`, `team2_id`, `champion_id`) VALUES
(20, 'Ahly vs Zamlek', '2016-06-15 00:00:00', 500, 3, 1, 2, 3),
(21, 'Zamlek vs Ismaali', '2018-03-05 13:00:00', 8000, 2, 2, 3, 3),
(22, 'test vs test', '2018-03-05 13:00:00', 7000, 3, 3, 6, 3),
(23, 'testtt vs testttt', '2016-06-15 00:00:00', 9000, 3, 3, 1, 3),
(24, 'qwewq vs rr3rewre ', '2016-07-04 14:03:00', 50, 2, 6, 2, 3),
(27, 'غزل المحلة والمصري', '2016-08-21 18:01:00', 300, 5, 7, 10, 4);

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(400) NOT NULL,
  `news_description` text NOT NULL,
  `news_date` datetime NOT NULL,
  `news_image` varchar(400) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_description`, `news_date`, `news_image`) VALUES
(3, 'Super MAtch', 'Lorem ipsum dolor sit amet, menandri iracundia qui ne. His ad populo perfecto intellegat. Sit ea audiam mnesarchum, liber suscipiantur has id, primis scripserit eos ne. Putant maiorum ad mel.\n\nEi vel velit insolens, nobis ubique ut mei. Id pri vitae primis possim, duo no utamur equidem graecis. Mel lorem nemore ne. Nulla officiis sea no. Cum ad graeco officiis erroribus, cu vim labitur appetere principes.\nS', '2017-02-02 13:00:00', 'booking1466381663.jpg'),
(4, 'Omar Gaber Ubsent', 'Lorem ipsum dolor sit amet, menandri iracundia qui ne. His ad populo perfecto intellegat. Sit ea audiam mnesarchum, liber suscipiantur has id, primis scripserit eos ne. Putant maiorum ad mel.\n\nEi vel velit insolens, nobis ubique ut mei. Id pri vitae primis possim, duo no utamur equidem graecis. Mel lorem nemore ne. Nulla officiis sea no. Cum ad graeco officiis erroribus, cu vim labitur appetere principes.\n', '2017-02-02 13:00:00', 'booking00000.jpg'),
(5, 'هناك وقفة جديدة سميت ب وقفة رمضان', ' قام اللاعب الاهلاوي الكبير رمضان صبحي بالوقوف على الكرة مما أذهل الناس كلها من حركة فريدة من نوعها', '2016-07-06 09:10:00', 'booking1467528005.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_places`
--

CREATE TABLE IF NOT EXISTS `tbl_places` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(500) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_places`
--

INSERT INTO `tbl_places` (`place_id`, `place_name`) VALUES
(2, 'Cairo Stad'),
(3, 'Borg El-Arb'),
(4, 'ستاد الكلية الحربية'),
(5, 'ستاد بيترو سبورت');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_teams`
--

CREATE TABLE IF NOT EXISTS `tbl_teams` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(500) NOT NULL,
  `team_logo` varchar(500) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_teams`
--

INSERT INTO `tbl_teams` (`team_id`, `team_name`, `team_logo`) VALUES
(1, 'Ahly', 'booking1466711282.png'),
(2, 'zamlek', 'booking111.png'),
(3, 'Ismaali', 'booking222.png'),
(6, 'Talaa Geesh', 'booking333.png'),
(7, 'غزل المحلة', 'booking1467527503.jpg'),
(8, 'بيتروجيت', 'booking1467527521.jpg'),
(9, 'طلائع الجيش', 'booking1467527690.png'),
(10, 'المصري', 'booking1467527708.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_telephone` varchar(250) NOT NULL,
  `user_last_login_time` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_telephone`, `user_last_login_time`) VALUES
(1, 'Ebrahim Mostafa', 'ebrahim@gmail.com', '12345678', '01458872654', '2019-09-02 15:48:12'),
(3, 'Ahmed Hamed', 'ahmed@gmail.com', '12345678', '01458872654', '2016-07-02 05:42:29'),
(5, 'ibrahim', 'ibrahim@micro.com', '12345678', '012458701555', '2016-07-01 14:43:10'),
(6, 'gad', 'gad@micro.com', '123456', '2554', '2016-07-01 14:45:38'),
(7, 'mahmoud', 'mahmoud@gmail.com', '01245678', '000000011', '2016-07-01 14:46:15'),
(8, 'samy', 'samy@samy.com', '123', '011111111111', '2016-07-03 08:25:37');

-- --------------------------------------------------------

--
-- بنية الجدول `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_url` varchar(500) NOT NULL,
  `video_description` text NOT NULL,
  `match_id` int(11) NOT NULL,
  PRIMARY KEY (`video_id`),
  KEY `fk_matchid_2` (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- إرجاع أو استيراد بيانات الجدول `tbl_videos`
--

INSERT INTO `tbl_videos` (`video_id`, `video_url`, `video_description`, `match_id`) VALUES
(12, 'https://www.youtube.com/watch?v=YIfvIAV-whQ', 'watch ahly vs zmalek match bla bla', 20),
(13, 'https://www.youtube.com/watch?v=YIfvIAV-whQ', ' AL Ahly SC VS Zamalek SC ▷ Promo 2015', 20);

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `fk_matchid` FOREIGN KEY (`match_id`) REFERENCES `tbl_match` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `tbl_levels_ticket_prices`
--
ALTER TABLE `tbl_levels_ticket_prices`
  ADD CONSTRAINT `fk_match_id` FOREIGN KEY (`match_id`) REFERENCES `tbl_match` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `tbl_match`
--
ALTER TABLE `tbl_match`
  ADD CONSTRAINT `fk_championid` FOREIGN KEY (`champion_id`) REFERENCES `tbl_champions` (`champion_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_placeid` FOREIGN KEY (`place_id`) REFERENCES `tbl_places` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_team2id` FOREIGN KEY (`team2_id`) REFERENCES `tbl_teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teamid` FOREIGN KEY (`team1_id`) REFERENCES `tbl_teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_match_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `tbl_places` (`place_id`),
  ADD CONSTRAINT `tbl_match_ibfk_2` FOREIGN KEY (`team1_id`) REFERENCES `tbl_teams` (`team_id`),
  ADD CONSTRAINT `tbl_match_ibfk_3` FOREIGN KEY (`team2_id`) REFERENCES `tbl_teams` (`team_id`),
  ADD CONSTRAINT `tbl_match_ibfk_4` FOREIGN KEY (`champion_id`) REFERENCES `tbl_champions` (`champion_id`);

--
-- القيود للجدول `tbl_videos`
--
ALTER TABLE `tbl_videos`
  ADD CONSTRAINT `fk_matchid_2` FOREIGN KEY (`match_id`) REFERENCES `tbl_match` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_videos_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `tbl_match` (`match_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
