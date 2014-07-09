-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2014 at 05:26 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alphacrm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tcompany`
--

CREATE TABLE IF NOT EXISTS `tcompany` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `preName` varchar(150) DEFAULT NULL,
  `Name` varchar(250) NOT NULL,
  `RegType` varchar(300) DEFAULT NULL,
  `StreetA` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tcompany`
--

INSERT INTO `tcompany` (`ID`, `preName`, `Name`, `RegType`, `StreetA`) VALUES
(1, 'The', 'Pie Company', 'LLC', 'Fen Street'),
(2, 'The only', 'TMIT', 'Ltd', '42 Lily Close'),
(3, 'La', 'Monde Reale', 'LLC', 'Rue De LAu'),
(4, NULL, 'Burger Jack', 'Inc', 'King Lane'),
(5, 'The', 'Really Great Car', 'Co', 'Pickle Ave.'),
(6, NULL, 'Fish', 'PLC', 'Cod Row'),
(7, NULL, 'Extravaganza', NULL, 'Superheros Road'),
(8, '3954 MWh', 'Burkina Faso', 'Coal, Diesel, Solar, Hydropower', '4, Diesel and Coal'),
(9, 'Thes', 'Quiche  Place', 'PLC', '1999 Main st');

-- --------------------------------------------------------

--
-- Table structure for table `tperson`
--

CREATE TABLE IF NOT EXISTS `tperson` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Population` varchar(26) DEFAULT NULL,
  `Policies` varchar(500) DEFAULT NULL,
  `Points of Contact` varchar(600) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `Companies in Energy` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tperson`
--

INSERT INTO `tperson` (`ID`, `Population`, `Policies`, `Points of Contact`, `CompanyID`, `Companies in Energy`) VALUES
(1, 'Mr', 'Mike', 'Freighn', 4, '302'),
(3, 'Ms', 'Zeta', 'Flowers', 1, '302'),
(5, 'Mrs', 'Harriet', 'Hennesey', 3, '302'),
(8, '17,000,232', 'Renewable Energy Outlook 2020', 'Phone: Email: ', 0, 'SONABEL, '),
(10, 'Prof', 'Russell', 'Tandie', 2, '302'),
(15, 'Mr', 'Peter', 'Flynn', 5, '302'),
(16, 'Mr', 'Kate', 'Blanket', 6, '302-5100-6623'),
(17, 'Mr', 'Bill', 'Blass', 7, '82520-952-6223'),
(19, 'Miss', 'Juli', 'Riviera', 9, ''),
(20, 'Mr', 'Jack', 'Retriever', 10, '785-965-6236'),
(21, '17,000,232', 'Renewable Energy Outlook 2020', 'Phone: Email: ', 8, 'SONABEL, ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
