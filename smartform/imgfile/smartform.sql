-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2012 at 05:49 PM
-- Server version: 5.1.50
-- PHP Version: 5.3.8-ZS5.5.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartform`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(44) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `privilege` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `privilege`) VALUES
(1, 'admin', 'mail@123', '1'),
(2, 'Ravi', 'ravi@123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `register_table`
--

CREATE TABLE IF NOT EXISTS `register_table` (
  `ID` int(200) NOT NULL AUTO_INCREMENT,
  `active` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL,
  `fee` varchar(200) DEFAULT NULL,
  `addres` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fphone` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `doj` varchar(255) DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `coursecomplete` varchar(200) DEFAULT NULL,
  `placedstatus` varchar(200) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `resume` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `register_table`
--

INSERT INTO `register_table` (`ID`, `active`, `name`, `course`, `fee`, `addres`, `phone`, `fphone`, `email`, `doj`, `doc`, `coursecomplete`, `placedstatus`, `note`, `resume`, `photo`) VALUES
(1, 'yes', 'magesh', 'CCNA', '5000', 'dsfasdf', '111111111111111', '9791111373', 'magesh@gmail.com', '', '', 'Discontinued', 'Yes', 'sdfasfsdf', '', ''),
(2, 'yes', 'sathish', 'CCNA', '52525255', 'sdfsdafsd', '22222222222', '4354235435', 'sfsdaf@fsdaf.gfdgd', '21/08/2012', '31/08/2012', 'Yes', 'Yes', 'ewrfwerq', '', 'img 001.jpg'),
(3, 'yes', 'sathish', 'CCNA', '5000', 'dfasfsad', '6666666666', '4354235435', 'sfsdaf@fsdaf.gfdgd', NULL, NULL, 'Yes', 'Yes', 'dsfasdfsf', '', ''),
(4, 'yes', 'sathishraj', 'MCITP', '5000', 'sdfsdf', '979111113535353', '345435435435', 'sathishbba2010@yahoo.co.in', '01/08/2012', '31/08/2012', 'Yes', 'Yes', 'sdfsdafasddsf', '', '2163.jpg'),
(5, 'yes', 'Rajesh', 'MCITP', '5000', '339/5', '9840663533', '9789257000', 'sathishbba2010@yahoo.co.in', NULL, NULL, 'Yes', 'Yes', 'hi this test', 'BHARATHI RAJA.docx', ''),
(6, 'yes', 'Rajesh', 'MCITP', '10000000000', '339/5', '6676766767', '4535435', 'sathishbba2010@yahoo.co.in', '', '', 'Yes', 'Yes', 'hi this test', '', 'diagram-lan.jpg'),
(7, 'yes', 'Vignesh', 'CCNA', '6000', '336', '9840663533', '456464645645645645', 'vignesh@gmail.com', NULL, NULL, 'Discontinued', 'No', 'tishi rewrew', '', 'body-henna.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `Active` varchar(255) DEFAULT NULL,
  `FName` varchar(255) DEFAULT NULL,
  `LName` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Married` varchar(255) DEFAULT NULL,
  `Contact` varchar(200) DEFAULT NULL,
  `Acontact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Caddress` varchar(255) DEFAULT NULL,
  `Paddress` varchar(255) DEFAULT NULL,
  `DOJ` varchar(255) DEFAULT NULL,
  `DOR` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Reporting` varchar(255) DEFAULT NULL,
  `Resume` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `privilege` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `Active`, `FName`, `LName`, `Gender`, `Married`, `Contact`, `Acontact`, `email`, `Caddress`, `Paddress`, `DOJ`, `DOR`, `Department`, `Reporting`, `Resume`, `Photo`, `username`, `password`, `privilege`) VALUES
(1, 'yes', 'sathish', 'Kumar', 'male', '', '9791111373', '9840663533', 'rajesh@yahoo.co.in', 'sdfasd', 'sdfasdf', '08/08/2008', NULL, 'Web Developer', 'Xavier Morais', '', '', 'sathish', '', 'admin'),
(2, 'yes', 'Jose', 'Raj', 'male', '', '9791111373', '9840663533', 'sathishbba2010@yahoo.co.in', 'dsfas', 'dsfa', '08/14/2012', '31/08/2012', 'dfdafdas', 'sdfaasdsad', '', '2163.jpg', 'jose', 'mail@123', 'staff'),
(3, 'yes', 'Antony', 'Raj', 'male', 'unmarried', '9840663533', '9840663533', 'sathishbba2010@yahoo.co.in', 'sdfads', 'sdafasdf', '08/08/2008', NULL, 'Web Developer', 'Xavier Morais', 'BHARATHI RAJA (2).docx', 'img 001.jpg', 'Antony', 'entry!@#', 'staff'),
(4, 'yes', 'Ravi', 'Kumar', 'male', '', '9791111373', '9940556622', 'sathish@vforutechnology.com', 'yhjg', 'gjghgjg', '16/08/2012', '25/08/2012', 'Development', 'sathish', '', 'Joker-the-joker.jpg', 'Ravi Raj', 'ravi@123', '');
