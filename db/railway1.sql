-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2022 at 10:28 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(100) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `a_designation` varchar(100) NOT NULL,
  `a_dob` date NOT NULL,
  `a_gender` varchar(100) NOT NULL,
  `a_doj` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `f_name`, `m_name`, `l_name`, `a_designation`, `a_dob`, `a_gender`, `a_doj`, `email`, `password`, `phone`) VALUES
(3, 'Nitesh', 'Kr', 'Singh', 'Admin', '1996-02-07', 'Male', '2020-03-04', 'ns@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '9887653210');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `coachid` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `coachtype` varchar(100) NOT NULL,
  PRIMARY KEY (`coachid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coachid`, `age`, `color`, `coachtype`) VALUES
('20015', '4 years', 'RED', 'LHB Non AC'),
('20019', '8 years', 'RED', 'LHB AC');

-- --------------------------------------------------------

--
-- Table structure for table `duty`
--

DROP TABLE IF EXISTS `duty`;
CREATE TABLE IF NOT EXISTS `duty` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `empid` varchar(100) NOT NULL,
  `dutytype` varchar(100) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `frm` varchar(100) NOT NULL,
  `upto` varchar(100) NOT NULL,
  `adminid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empid` (`empid`),
  KEY `adminid` (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duty`
--

INSERT INTO `duty` (`id`, `empid`, `dutytype`, `shift`, `frm`, `upto`, `adminid`) VALUES
(23, '1001', 'seekline', 'morning', '2022-07-18', '2022-07-19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `empid` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `doj` date NOT NULL,
  `bgroup` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `fname`, `mname`, `lname`, `designation`, `dob`, `gender`, `doj`, `bgroup`, `email`, `password`, `contact`, `address`, `district`, `state`, `country`, `pin`, `created_on`) VALUES
('1001', 'Surajit', '', 'Baruah', 'Employee', '1997-02-03', 'Male', '2020-02-04', 'o+', 'sb@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543210', 'Chabua', 'Dibrugarh', 'Assam', 'India', '786600', '2022-07-20 14:17:09'),
('1004', 'Ankur', '', 'Saikia', 'Employee', '1998-02-05', 'Male', '2021-04-06', 'B+', 'as@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '9878675676', 'Sivsagar', 'Sivsagar', 'Assam', 'India', '786666', '2022-07-19 02:01:01'),
('1003', 'Chinmoy', '', 'Dewgharia', 'Employee', '1996-02-04', 'Male', '2022-06-07', 'o+', 'cd@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '8798786709', 'Sonari', 'Charaidew', 'Assam', 'India', '786004', '2022-07-23 16:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `todate` varchar(100) NOT NULL,
  `fromdate` varchar(100) NOT NULL,
  `adminremark` varchar(100) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `leaveid` int(100) NOT NULL,
  `adminid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empid` (`empid`),
  KEY `leaveid` (`leaveid`),
  KEY `adminid` (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `todate`, `fromdate`, `adminremark`, `empid`, `leaveid`, `adminid`) VALUES
(14, '2022-07-24', '2022-07-23', 'Report on 25/07/2022', '1004', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

DROP TABLE IF EXISTS `leavetype`;
CREATE TABLE IF NOT EXISTS `leavetype` (
  `leaveid` int(100) NOT NULL AUTO_INCREMENT,
  `leavetype` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`leaveid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`leaveid`, `leavetype`, `description`, `creationdate`) VALUES
(1, 'Casual Leave', 'Provided for urgent or unforeseen matters to the employees.', '2020-11-01 12:07:56'),
(2, 'Medical Leave', 'Related to Health Problems of employees.', '2020-11-06 13:16:09'),
(3, 'Restricted Holiday', 'Holiday that is optional', '2020-11-06 13:16:38'),
(5, 'Paternity Leave', 'To take care of newborns', '2021-03-03 10:46:31'),
(6, 'Bereavement Leave', 'Grieve their loss of losing loved ones', '2021-03-03 10:47:48'),
(7, 'Compensatory Leave', 'For Overtime workers', '2021-03-03 10:48:37'),
(8, 'Maternity Leave', 'Taking care of newborn ,recoveries', '2021-03-03 10:50:17'),
(9, 'Religious Holidays', 'Based on employee\'s followed religion', '2021-03-03 10:51:26'),
(10, 'Adverse Weather Leave', 'In terms of extreme weather conditions', '2021-03-03 13:18:26'),
(11, 'Voting Leave', 'For official election day', '2021-03-03 13:19:06'),
(12, 'Self-Quarantine Leave', 'Related to COVID-19 issues', '2021-03-03 13:19:48'),
(13, 'Personal Time Off', 'To manage some private matters', '2021-03-03 13:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `repairschedule`
--

DROP TABLE IF EXISTS `repairschedule`;
CREATE TABLE IF NOT EXISTS `repairschedule` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `coachid` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `adminid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `coachid` (`coachid`),
  KEY `adminid` (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repairschedule`
--

INSERT INTO `repairschedule` (`id`, `coachid`, `date`, `schedule`, `type`, `comments`, `status`, `adminid`) VALUES
(39, '20015', '2022-07-19', '6 months', 'Fan,AC,Bulb', 'Repaired AC fan', 'Repaired', '1'),
(40, '20016', '2022-07-19', 'monthly', 'All electric parts', 'repaired on 18/07/2022', 'Repaired', '1'),
(42, '20018', '2022-07-19', 'monthly', 'Fan,Bulb', '', 'Pending', '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
