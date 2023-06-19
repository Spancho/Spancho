-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2015 at 11:01 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmersunion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(250) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(54) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(15) NOT NULL,
  `stat` int(11) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`, `lastname`, `firstname`, `middlename`, `stat`) VALUES
(1, 'admin', 'admin', 'administrator', 'admin', 'senior', 1),
(2, 'spana', 'spana', 'sipanera', 'liberty', 'rasta', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `customid` int(11) NOT NULL,
  `prdct` varchar(40) NOT NULL,
  `qnty` int(11) NOT NULL,
  `costperUnit` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tym` int(30) NOT NULL,
  `nam` varchar(30) NOT NULL,
  `msg` varchar(1500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `tym`, `nam`, `msg`) VALUES
(1, 1428713479, 'aluis', 'hi collegues'),
(2, 1429542194, 'aluis', 'jjjkk'),
(3, 1429542629, 'aluis', 'yaah'),
(4, 1429543097, 'aluis', 'fff'),
(5, 1429543227, 'aluis', 'final'),
(6, 1429543230, 'aluis', 'final'),
(7, 1429543231, 'aluis', 'final'),
(8, 1429887112, 'aluis', 'early planting in progress'),
(9, 1429957033, 'aluis', 'fafgsass'),
(10, 1429957040, 'aluis', 'fafgsass');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comm` text NOT NULL,
  `dat` date NOT NULL,
  `cid` varchar(40) NOT NULL,
  `stat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comm`, `dat`, `cid`, `stat`) VALUES
(3, 'We as the Government we are working for total empowerment with a high percentage to the youth.', '2014-04-26', '2742819', 0),
(5, 'Working towards political and economic freedom. Rate this please', '2014-04-27', '1511888', 0),
(6, 'what do you think about the recently introduced youth policy', '2014-04-28', '2098438', 1),
(7, 'whats your take on the ongoing mdc breakout', '2014-04-30', '4017948', 0),
(8, 'sssss', '2015-03-22', '2310228', 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `location` varchar(90) NOT NULL,
  `phone` varchar(90) NOT NULL,
  `address` varchar(90) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(70) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(90) NOT NULL,
  `paypal_email` varchar(90) NOT NULL,
  `masterCard_Id` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `location`, `phone`, `address`, `email`, `type`, `username`, `password`, `paypal_email`, `masterCard_Id`) VALUES
(1, 'agrico', 'harare', '0777234567', '3425 cresent workington', 'agrico@agrico.co.zw', 'buyer', 'admin', 'agricooo', '12@paypal.com', '12'),
(2, 'K2 seeds', 'Harare', '0772411539', 'office 13 zimpost', 'www.spancho@gmail.com', 'Seller', 'K2', 'from0774965258', 'www.spancho@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nam` varchar(50) NOT NULL,
  `fn` text NOT NULL,
  `dat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `nam`, `fn`, `dat`) VALUES
(1, 'security', 'Computer security handbook.pdf', '2015-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE IF NOT EXISTS `farmer` (
  `farmerid` int(250) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `idno` int(12) NOT NULL,
  `province` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `address` varchar(75) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lmark` varchar(30) NOT NULL,
  `centre` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `bdate` date NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `paypal_email` varchar(90) NOT NULL,
  `masterCard_Id` varchar(60) NOT NULL,
  `stat` int(11) NOT NULL,
  PRIMARY KEY (`farmerid`),
  UNIQUE KEY `idno` (`idno`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmerid`, `firstname`, `lastname`, `idno`, `province`, `location`, `mobile`, `address`, `email`, `lmark`, `centre`, `gender`, `bdate`, `occupation`, `username`, `password`, `paypal_email`, `masterCard_Id`, `stat`) VALUES
(32, 'zacharia', 'kipruto', 28022522, 'Trans Nzoia', 'Ziwa', 716654532, 'P.o Box 1125 Eldoret', 'kipruzac@gmail.com', 'Ziwa Machine Cereals Board', 'Ziwa Machine', 'Male', '1983-05-05', 'Farmer', 'kip', 'kip', '', '', 0),
(33, 'KIPCHUMBA', 'CHERWON', 29057857, 'Homabay', 'KAPCHORWA', 2147483647, 'p.O BX 11938 AALT', 'KIPCHUMBA@YAHOO.COM', 'ROPTA TALL TREE', 'KAPCHORWA', 'Male', '1995-05-01', 'FARMER', 'CHUMBA', 'CH', '', '', 1),
(34, 'Muhindi', 'Paul', 27044531, 'Nyandarua', 'Njabini', 716816917, '397', 'palmuhindi@gmail.com', 'Sasumua Dam', 'Njabini', 'Male', '1989-05-18', 'Farmer', 'palmuhindi', '12345', '', '', 1),
(35, 'alu', 'muk', 63, 'Trans Nzoia', 'harare', 777234567, '3425 cresent workington', 'alumukwembi@yahoo.com', 'fg', '12', 'Male', '0000-00-00', 'tec', 'aluis', 'aluis', '23@paypal.com', '23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `usr` varchar(30) DEFAULT NULL,
  `msg` text,
  `dat` date DEFAULT NULL,
  `tym` time DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pic` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`usr`, `msg`, `dat`, `tym`, `id`, `pic`) VALUES
('tinah', 'ahhjja', '2014-04-25', '11:36:38', 4, 'no-avatar.JPG'),
('spana', 'riozim products ka1 ', '2014-05-01', '20:35:40', 6, 'no-avatar.JPG'),
('', 'hello farmers', '2015-04-24', '14:39:28', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `forum2`
--

CREATE TABLE IF NOT EXISTS `forum2` (
  `usr` varchar(30) DEFAULT NULL,
  `msg` text,
  `dat` date DEFAULT NULL,
  `tym` time DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pic` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `forum2`
--

INSERT INTO `forum2` (`usr`, `msg`, `dat`, `tym`, `id`, `pic`) VALUES
('Spanna', 'hello duys', '2014-04-30', '12:27:05', 6, 'no-avatar.jpg'),
('Ministry', 'new products are now available ', '2014-04-30', '12:30:51', 7, 'no-avatar.jpg'),
('aluis', 'how far?', '2015-03-27', '13:20:55', 9, '14274623831350594762_pass.jpg'),
('', 'welcome to ZFU', '2015-04-24', '14:40:18', 10, ''),
('', 'helo', '2015-04-24', '14:44:05', 11, ''),
('', 'gsajdhjds', '2015-04-25', '10:13:24', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toh` varchar(100) NOT NULL,
  `fro` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `sub` varchar(100) NOT NULL,
  `dat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `toh`, `fro`, `msg`, `sub`, `dat`) VALUES
(1, 'palmuhindi@gmail.com', 'aluis', 'fhgjhhkkkkkkk', 'testing', '2015-04-24'),
(2, 'aluis', 'palmuhindi', 'gfhjhkjklkl', 'testing2', '2015-04-24'),
(3, 'admin', 'palmuhindi', 'sfyghhjhlkjk', 'quotation request ', '2015-04-24'),
(4, 'palmuhindi', 'admin', 'ur request is being processed', 'reply', '2015-04-24'),
(5, 'admin', 'palmuhindi', 'ok', 'noted', '2015-04-24'),
(6, 'aluis', 'K2', 'hande kusadza', 'sadza', '2015-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news`) VALUES
(1, 'Riozim has introduced new products.         ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `category` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `units` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`category`, `pname`, `id`, `pic`, `description`, `price`, `stock`, `companyid`, `units`) VALUES
('crops', 'maize', 4, 'imagesjpg56.jpg', 'fresh maize', 1, 300, 1, 'kgs'),
('crops', 'nzungu', 3, 'url.JPG', 'dfggfghghgjhhjhk', 12, 4, 1, 'bags');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `product` varchar(40) NOT NULL,
  `quant` int(11) NOT NULL,
  `priceperunit` double NOT NULL,
  `total` double NOT NULL,
  `transport_status` varchar(90) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `customerid`, `date`, `product`, `quant`, `priceperunit`, `total`, `transport_status`) VALUES
(2, 6, '02-04 -2015', 'nzungu', 100, 456, 45600, ''),
(3, 35, '20-04 -2015', 'nzungu', 1, 12, 12, ''),
(10, 2, '25-04 -2015', 'nzungu', 3, 12, 36, 'own Transport'),
(9, 1, '25-04 -2015', 'nzungu', 1, 12, 12, 'deliver');
