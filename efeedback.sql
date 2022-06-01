-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 10:05 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `efeedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `subjectname` varchar(50) DEFAULT NULL,
  `subjectcode` varchar(50) DEFAULT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fname`, `subjectname`, `subjectcode`, `sem`, `branch`) VALUES
(1, 'wasif', 'ada', 'cs301', '6', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `feedbackgrade` varchar(50) DEFAULT NULL,
  `facultyname` varchar(50) DEFAULT NULL,
  `subjectid` varchar(50) DEFAULT NULL,
  `fdate` varchar(50) DEFAULT NULL,
  `studentid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedbackgrade`, `facultyname`, `subjectid`, `fdate`, `studentid`) VALUES
(1, '4', 'wasif', 'ada', '14-04-19', '0198cs161019'),
(2, '18', 'wasif', 'ada', '17-04-19', '0198cs161028'),
(3, '17', 'wasif', 'ada', '20-04-19', '0198cs161030');

-- --------------------------------------------------------

--
-- Table structure for table `siteuser`
--

CREATE TABLE IF NOT EXISTS `siteuser` (
  `username` varchar(30) NOT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `hintq` varchar(255) DEFAULT NULL,
  `hinta` varchar(255) DEFAULT NULL,
  `emailadd` varchar(50) DEFAULT NULL,
  `smsno` varchar(15) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteuser`
--

INSERT INTO `siteuser` (`username`, `pwd`, `dob`, `gender`, `hintq`, `hinta`, `emailadd`, `smsno`, `role`) VALUES
('preeti', 'preeti', '1989-12-04', 'female', 'name', 'preeti', 'preeti@gmail.com', '9229465037', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `enrollmentno` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `attendance` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`enrollmentno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`enrollmentno`, `password`, `sem`, `branch`, `contact`, `attendance`) VALUES
('0198cs161024', '0198cs161024', '6', 'CS', '9229465038', '70'),
('0198cs161025', '0198cs161025', '6', 'CS', '9229465039', '85'),
('0198cs161026', '0198cs161026', '6', 'CS', '9229465040', '73'),
('0198cs161028', '0198cs161028', '6', 'CS', '9229465039', '70'),
('0198cs161029', '0198cs161029', '6', 'CS', '9229465038', '70'),
('0198cs161030', '0198cs161030', '6', 'CS', '9229460388', '85'),
('0198cs161031', '0198cs161031', '6', 'CS', '9229465040', '73'),
('0198cs161032', '0198cs161032', '6', 'CS', '9229465038', '70'),
('0198cs161034', '0198cs161034', '6', 'CS', '9229465040', '73');

-- --------------------------------------------------------

--
-- Table structure for table `tg`
--

CREATE TABLE IF NOT EXISTS `tg` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tgname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sem` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `course` varchar(30) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tg`
--

INSERT INTO `tg` (`id`, `tgname`, `password`, `sem`, `branch`, `course`, `contact`) VALUES
(3, 'sana', 'sana', '6', 'CS', 'BE', '7415757615');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
