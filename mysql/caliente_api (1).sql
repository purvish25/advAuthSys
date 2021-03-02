-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2017 at 03:30 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caliente_api`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`caliente`@`localhost` PROCEDURE `api_check`(IN `name` VARCHAR(255), IN `akey` VARCHAR(255), IN `token` VARCHAR(255))
    NO SQL
begin
select * from apiusers where app_name=name and app_key=akey and app_token=token and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `app_check`(IN `name` VARCHAR(255))
    NO SQL
begin
select * from apiusers where app_name=name and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `blank_check`(IN `uid` INT(11), IN `ip1` INT(11), IN `ip2` INT(11), IN `ip3` INT(11), IN `ip4` INT(11), IN `ip5` INT(11), IN `ip6` INT(11), IN `ip7` INT(11), IN `ip8` INT(11), IN `ip9` INT(11))
    NO SQL
begin
select * from blanks where user_id=uid and i1=ip1 and i2=ip2 and i3=ip3 and i4=ip4 and i5=ip5 and i6=ip6 and i7=ip7 and i8=ip8 and i9=ip9 and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `color_check`(IN `id` INT(11), IN `color` VARCHAR(255))
    NO SQL
begin
select * from color where pass=color and user_id=id and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `forgot_check`(IN `user` VARCHAR(255), IN `que` INT(11), IN `ans` VARCHAR(255))
    NO SQL
begin
select * from users where user_que=que and user_name=user and user_ans=ans and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `gesture_check`(IN `uid` INT(11), IN `pat` INT(11))
    NO SQL
begin
select * from gesture where user_id=uid and pattern=pat and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `get_image`(IN `uid` INT(11))
    NO SQL
begin
select * from grid where user_id=uid and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `insert_api`(IN `app_name` VARCHAR(255), IN `app_key` VARCHAR(255), IN `app_token` VARCHAR(255), IN `redirect_url` VARCHAR(255), IN `user_id` INT(11))
    NO SQL
begin
insert into apiusers (app_name,app_key,app_token,redirect_url,user_id) values (app_name,app_key,app_token,redirect_url,user_id);
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `insert_blanks`(IN `user_id` INT(11), IN `i1` INT(11), IN `i2` INT(11), IN `i3` INT(11), IN `i4` INT(11), IN `i5` INT(11), IN `i6` INT(11), IN `i7` INT(11), IN `i8` INT(11), IN `i9` INT(11))
    NO SQL
begin
insert into blanks (user_id,i1,i2,i3,i4,i5,i6,i7,i8,i9) values (user_id,i1,i2,i3,i4,i5,i6,i7,i8,i9);
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `insert_color`(IN `id` INT(11), IN `color` VARCHAR(255))
    NO SQL
begin
insert into color (user_id,pass) values (id,color);
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `insert_gesture`(IN `uid` INT(11), IN `pattern` INT(11))
    NO SQL
begin
insert into gesture (user_id,pattern) values (uid,pattern);
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `insert_image`(IN `uid` INT(11), IN `fname` VARCHAR(255), IN `x` DOUBLE, IN `y` DOUBLE)
    NO SQL
begin
insert into grid (pic_url,x,y,user_id) values (fname,x,y,uid);
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `insert_user`(IN `user_name` VARCHAR(255), IN `user_mail` VARCHAR(255), IN `user_dob` DATE, IN `user_phone` VARCHAR(255), IN `val_type` INT(11), IN `user_que` INT(11), IN `user_ans` VARCHAR(255), IN `user_pass` VARCHAR(255))
    NO SQL
begin
DECLARE LID int;

insert into users (user_name,user_mail,user_dob,user_phone,val_type,user_que,user_ans,user_pass) values (user_name,user_mail,user_dob,user_phone,val_type,user_que,user_ans,user_pass);

SET LID = LAST_INSERT_ID();
select LID;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `login_check`(IN `user` VARCHAR(255), IN `pass` VARCHAR(255))
    NO SQL
begin
select * from users where user_name=user and user_pass=pass and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `select_ques`()
    NO SQL
begin
select * from questions;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `select_types`()
    NO SQL
begin
select * from val_type;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `session_check`(IN `id` INT(11), IN `user` VARCHAR(255), IN `pass` VARCHAR(255), IN `val` INT(11))
    NO SQL
begin
select * from users where user_id=id and user_name=user and user_pass=pass and val_type=val and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `update_pass`(IN `uid` INT(11), IN `val` INT(11), IN `pass` VARCHAR(255))
    NO SQL
begin
update users set val_type=val,user_pass=pass where user_id=uid and status=1;
end$$

CREATE DEFINER=`caliente`@`localhost` PROCEDURE `user_check`(IN `uname` VARCHAR(255))
    NO SQL
begin
select * from users where user_name=uname and status=1;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `apiusers`
--

CREATE TABLE IF NOT EXISTS `apiusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(255) NOT NULL,
  `app_key` varchar(255) NOT NULL,
  `app_token` varchar(255) NOT NULL,
  `redirect_url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `apiusers`
--

INSERT INTO `apiusers` (`id`, `app_name`, `app_key`, `app_token`, `redirect_url`, `user_id`, `status`) VALUES
(1, 'testapi', '119089', 'mdFUq9lpRf7GcRoyVW58', 'http://www.calienteitech.in/api1', 15, 1),
(2, 'test2', '814844', 'W5xziIO5pLrTvJj9bkHb', 'http://localhost/api1', 15, 1),
(3, 'truss', '940396', 'mb00u0X9z4uivCroYwgY', 'http://localhost/api1', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blanks`
--

CREATE TABLE IF NOT EXISTS `blanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `i1` int(11) NOT NULL,
  `i2` int(11) NOT NULL,
  `i3` int(11) NOT NULL,
  `i4` int(11) NOT NULL,
  `i5` int(11) NOT NULL,
  `i6` int(11) NOT NULL,
  `i7` int(11) NOT NULL,
  `i8` int(11) NOT NULL,
  `i9` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `pass`, `user_id`, `status`) VALUES
(1, '#000000', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gesture`
--

CREATE TABLE IF NOT EXISTS `gesture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `gesture`
--

INSERT INTO `gesture` (`id`, `pattern`, `user_id`, `status`) VALUES
(9, 1478, 16, 1),
(11, 12369, 25, 1),
(12, 1258, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grid`
--

CREATE TABLE IF NOT EXISTS `grid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_url` varchar(255) NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `grid`
--

INSERT INTO `grid` (`id`, `pic_url`, `x`, `y`, `user_id`, `status`) VALUES
(1, '2017-03-07 11:48:4507-03-2017-1488883538.jpg', 228, 103, 18, 1),
(3, '2017-03-08 10:15:1901.jpg', 196, 128, 21, 1),
(4, '2017-03-08 10:45:3701.jpg', 178, 157, 23, 1),
(5, '2017-03-08 11:06:59a23_lot58_1-max.jpg', 352, 217, 24, 1),
(6, '2017-03-11 09:10:44condition (1).jpg', 73, 107, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`) VALUES
(1, 'What is the name of your last school?'),
(2, 'What is the name of your childhood friend?'),
(3, 'Which is your favorite movie?'),
(4, 'Which is your favorite sport?'),
(5, 'What is the name of our pet?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `val_type` int(11) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_que` int(11) NOT NULL,
  `user_ans` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `val_id` (`user_que`),
  KEY `user_que` (`user_que`),
  KEY `val_type` (`val_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_mail`, `user_dob`, `user_phone`, `val_type`, `user_pass`, `user_que`, `user_ans`, `status`) VALUES
(15, 'truss', 'trushal.s007@gmail.com', '1994-10-06', '88888888', 3, 'truss', 1, 'sirjj', 1),
(16, 'john', 'jay@gmail.com', '1994-10-06', '76765656', 3, 'john', 1, 'sirjj', 1),
(17, 'pratik', 'pratik@gmil.com', '1994-10-06', '8888888', 2, 'pratik', 1, 'sirjj', 1),
(18, 'chako', 'chako@gmail.com', '1994-10-06', '7557656', 1, 'chako', 1, 'sirjj', 1),
(21, 'parth', 'parth2gmail.com', '1994-10-06', '9429479463', 1, '@463parth', 1, 'Ppsv', 1),
(23, 'pa', 'pa@gmail.com', '1994-10-06', '942947', 1, '@463parth', 1, 'Ppsv', 1),
(24, 'nago', 'nago@gmail.com', '1994-10-06', '980', 1, '1234', 1, 'Ppsv', 1),
(25, 'test', 'trushal.s007@gmail.com', '1994-10-06', '88967677', 3, 'test', 1, 'sirjj', 1),
(26, 'test2', 'wdchfhdc@ncdng', '1994-10-06', '776576567', 1, 'test2', 1, 'sirjj', 1);

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `delete_vals`;
DELIMITER //
CREATE TRIGGER `delete_vals` AFTER UPDATE ON `users`
 FOR EACH ROW begin
if old.val_type=1
then
delete from grid where grid.user_id=new.user_id;
else if old.val_type=2
then
delete from color where color.user_id=new.user_id;
else if old.val_type=3
then
delete from gesture where gesture.user_id=new.user_id;
else if old.val_type=4
then
delete from blanks where blanks.user_id=new.user_id;
end if;
end if;
end if;
end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `val_type`
--

CREATE TABLE IF NOT EXISTS `val_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `val_type`
--

INSERT INTO `val_type` (`id`, `type`) VALUES
(1, 'Image Grid'),
(2, 'Color'),
(3, 'Gesture'),
(4, 'Blanks');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apiusers`
--
ALTER TABLE `apiusers`
  ADD CONSTRAINT `apiusers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blanks`
--
ALTER TABLE `blanks`
  ADD CONSTRAINT `blanks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gesture`
--
ALTER TABLE `gesture`
  ADD CONSTRAINT `gesture_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grid`
--
ALTER TABLE `grid`
  ADD CONSTRAINT `grid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`val_type`) REFERENCES `val_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_que`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
