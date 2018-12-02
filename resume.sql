-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2018 at 12:21 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `address1` text,
  `uni_ug` varchar(45) DEFAULT NULL,
  `high_school` varchar(45) DEFAULT NULL,
  `interns` mediumtext,
  `uni_pg` varchar(45) DEFAULT NULL,
  `skills` text,
  `achievements` mediumtext,
  `work_exp` mediumtext,
  `languages` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `about` varchar(250) DEFAULT NULL,
  `objectives` text,
  `u_id` varchar(55) NOT NULL,
  `projects` text,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`address1`, `uni_ug`, `high_school`, `interns`, `uni_pg`, `skills`, `achievements`, `work_exp`, `languages`, `hobbies`, `about`, `objectives`, `u_id`, `projects`) VALUES
('#156-157,OM SADANA, 2ND CROSS, RAMDEV GARDEN,KACHARAKANAHALLI', 'BNM Institute of Technology - 9.0 CGPA', 'CMR NPS (2013) - 9.0 CGPA', 'CISCO', '', 'Python, Java, C, C++, HTML, CSS, MySQL', 'Cuber', NULL, 'English, Telugu, Kannada, Hindi', 'Gaming', 'Hello this is me', NULL, '620162a0-f629-11e8-a0f2-54e1add87be4', 'CG project'),
('Malleshwara', '', 'Kadambi - 92%', '', '', '', '', NULL, '', '', 'Am a rider', NULL, '7907b918-f629-11e8-a0f2-54e1add87be4', ''),
('basaveshwaranagara', 'rnsit - 9 gpa', NULL, 'Semantically', 'USC - 3 GPA', 'Python, Java, C, C++, HTML, CSS, MySQL, Bootstrap', 'Gamer', 'betsol and semantically', 'English, Telugu, Kannada, Hindi, Tamil', NULL, NULL, 'UID designer', 'dccfc189-f628-11e8-a0f2-54e1add87be4', 'UI UX projects');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `temp_id` int(11) NOT NULL,
  `temp_name` varchar(15) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `uid` varchar(55) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(55) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `mobile`) VALUES
('620162a0-f629-11e8-a0f2-54e1add87be4', 'Kaushal', 'B', 'asd@gmail.com', '9483951039'),
('7907b918-f629-11e8-a0f2-54e1add87be4', 'Anirudha', 'R', 'hey@gmail.com', '12334'),
('dccfc189-f628-11e8-a0f2-54e1add87be4', 'Karan', 'Kowshik', 'bankaushal@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
