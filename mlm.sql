-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2015 at 10:06 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mlm`
--
CREATE DATABASE IF NOT EXISTS `mlm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mlm`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `address` varchar(1000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `mob_no` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`, `city`, `state`, `pin`, `mob_no`, `dob`, `district`) VALUES
(1, 'Mangalore', 'Mangalore', 'Karnataka', '575004', '789451236', 'aegdfsgd', 'D.K.'),
(2, 'sdgdfh', 'sdsgvb', 'dsggs', 'dsgdf', '5725472', '53', 'sdgfd'),
(3, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '825649549', '', 'D.K.'),
(4, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '147852369', '', 'D.K.'),
(5, '', '', '0', '', '', '', ''),
(6, '0', '0', '0', '0', '0', '', ''),
(7, 'Djitsoft', 'Mangalore', '0', '575001', '825649549', '', ''),
(8, 'afa', 'dsvfd', '0', '241', 'dsfds', '', ''),
(9, 'sdgfds', 'asfasd', '0', 'asfsd', '36534', '', ''),
(10, 'ewtyear', 'reyre', '0', 'ewter', 'egyera', '', ''),
(11, 'ewtw', 'ewtw', '0', 'wetew', 'ewtw', '', ''),
(12, 'wewq', 'wqqw', 'qwqw', 'wwq221', 'fewf', '', ''),
(13, 'Mangalore', 'Mangalore', 'Karnataka', '575003', '8892347351', '', 'D.K.'),
(14, 'Djitsoft,3rd Floor pio Mall', 'Mangalore', 'Karnataka', '575004', '825649549', '', ''),
(15, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(16, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(17, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(18, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(19, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(20, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(21, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(22, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(23, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(24, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(25, 'Mangalore', 'Mangalore', 'Karnataka', '575004', '825649549', '', ''),
(26, 'Mangalore', 'Mangalore', 'Karnataka', '575004', '825649549', '', ''),
(27, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '825649549', '', ''),
(28, 'jyukhjg', 'tyjd', 'thrdg', 'ty454', '5474', '', ''),
(29, 'eriu', 'fgrthyfiu', '', '', 'fghjklgj', '', ''),
(30, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '825649549', '', ''),
(31, '0', '0', '0', '0', '0', '', ''),
(32, 'Mangalore', 'Mangalore', 'Karnataka', '65432', '89876543', '', ''),
(33, 'Mangalore', 'Mangalore', 'Karnataka', '575004', '89876543', '', ''),
(34, 'Mangalore', 'Mangalore', 'Karnataka', '575004', '956789', '', ''),
(35, 'Mangalore', 'Mangalore', 'Karnataka', '3546879', '89876543', '', ''),
(36, '0', '0', '0', '0', '0', '', ''),
(37, 'Mangalore', 'Mangalore', 'Karnataka', '575004', '89876543', '', ''),
(38, '', '', '', '0', '0', '', ''),
(39, '', '', '', '0', '0', '', ''),
(40, 'Mangalore', 'Mangalore', 'Karnataka', '575004', '89876543', '', ''),
(41, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(42, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(43, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(44, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(45, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(46, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '8892347351', '', 'D.K.'),
(47, 'Mangalore', 'Mangalore', 'Karnataka', '575001', '89876543', '', ''),
(48, 'gf', 'sege', 'reger', 'sdgvdf', 'rger', '', 'dsgf'),
(49, 'Djitsoft,3rd Floor pio Mall', 'mangalore', 'Karnataka', '575004', '43456776787', '', 'd.k');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `deleted` varchar(10) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Name`, `Description`, `deleted`) VALUES
(1, 'FOOD', '  About Food items. ', 'no'),
(2, 'BOOKS', 'About Books. ', 'no'),
(3, 'DRESS', ' about dress', 'no'),
(26, 'ELECTRONICS', '  Its  All about electronic items', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `changes`
--

CREATE TABLE IF NOT EXISTS `changes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(300) NOT NULL,
  `desc` text NOT NULL,
  `done` varchar(20) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `changes`
--

INSERT INTO `changes` (`id`, `cust_id`, `cust_name`, `desc`, `done`) VALUES
(1, 1, 'Company', ' Please change mobile number to 789451236', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `material` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `referd_no` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pack` int(10) NOT NULL,
  `unseen` varchar(10) NOT NULL DEFAULT 'yes',
  `pos` varchar(10) NOT NULL,
  `sponser` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `address_id`, `user_id`, `gender`, `dob`, `material`, `name`, `email_id`, `ref_no`, `referd_no`, `password`, `pack`, `unseen`, `pos`, `sponser`, `image`) VALUES
(1, 1, 25, '', '', '', 'Company', 'company@gmail.com', 'UR-001', '000', 'e10adc3949ba59abbe56e057f20f883e', 1, 'no', 'L', '000', 'uploads/Chrysanthemum.jpg'),
(2, 42, 26, '', '', '', 'user1', 'user1@gmail.com', 'UR-002', 'UR-001', 'e10adc3949ba59abbe56e057f20f883e', 1, 'no', 'R', '000', 'uploads/Desert.jpg'),
(3, 43, 27, '', '', '', 'user2', 'user2@gmail.com', 'UR-003', 'UR-001', 'e10adc3949ba59abbe56e057f20f883e', 1, 'no', 'L', 'UR-001', 'uploads/Hydrangeas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cust_bank`
--

CREATE TABLE IF NOT EXISTS `cust_bank` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `acno` varchar(100) NOT NULL,
  `acname` varchar(100) NOT NULL,
  `ifs` varchar(100) NOT NULL,
  `cust_id` int(10) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cust_bank`
--

INSERT INTO `cust_bank` (`bid`, `bname`, `branch`, `acno`, `acname`, `ifs`, `cust_id`) VALUES
(1, 'SBI', 'Mangalore', '4535646456', 'Company', '2sgfre33', 1),
(2, 'ssss', 'ssdsss', '4535646456', 'sowmya', '2sgfre33', 2),
(3, 'ssss', 'ssdsss', '4535646456', 'sowmya', '2sgfre33', 3);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` varchar(10) NOT NULL,
  `gname` varchar(200) NOT NULL,
  `gemail` varchar(200) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`gid`, `address_id`, `gname`, `gemail`) VALUES
(1, '47', 'jeethesh', 'jeeth@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`module_id`),
  KEY `module_id` (`module_id`),
  KEY `module_id_2` (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`) VALUES
(1, 'login'),
(2, 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `onum` varchar(500) NOT NULL,
  `odate_time` varchar(500) NOT NULL,
  `odate` date NOT NULL,
  `total` varchar(100) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `d_id` int(20) NOT NULL,
  `seen` varchar(20) NOT NULL DEFAULT 'no',
  `delivery` varchar(10) NOT NULL DEFAULT 'no',
  `discount` varchar(10) NOT NULL DEFAULT '0',
  `grand_tot` varchar(20) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`oid`, `onum`, `odate_time`, `odate`, `total`, `designation`, `d_id`, `seen`, `delivery`, `discount`, `grand_tot`) VALUES
(1, '0001', '29/09/2015 12:36:32', '2015-09-29', '18999', 'customer', 28, 'yes', 'yes', '0', '17099.1'),
(2, '0002', '29/09/2015 12:37:12', '2015-09-29', '18999', 'customer', 28, 'yes', 'yes', '0', '18999'),
(3, '0003', '29/09/2015 12:39:47', '2015-09-29', '18999', 'customer', 28, 'yes', 'yes', '0', '18999'),
(4, '0004', '29/09/2015 12:40:50', '2015-09-29', '18999', 'customer', 28, 'yes', 'yes', '0', '18999'),
(5, '0005', '09/10/2015 12:01:32', '2015-10-09', '86999', 'customer', 25, 'yes', 'no', '20', '69599.2'),
(6, '0006', '17/10/2015 06:24:04', '2015-10-17', '100000', 'Guest', 1, 'yes', 'no', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(10) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `price` varchar(300) NOT NULL,
  `productid` int(10) NOT NULL,
  `quantity` int(20) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`item_id`, `oid`, `product_code`, `price`, `productid`, `quantity`) VALUES
(1, 1, '123456', '18999', 4, 1),
(2, 2, '123456', '18999', 4, 1),
(3, 3, '123456', '18999', 4, 1),
(4, 3, '123456', '18999', 3, 1),
(5, 5, '001', '50000', 1, 1),
(6, 5, '002', '18000', 2, 1),
(7, 5, '123456', '18999', 4, 1),
(8, 6, '001', '50000', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pack`
--

CREATE TABLE IF NOT EXISTS `pack` (
  `pack_id` int(11) NOT NULL AUTO_INCREMENT,
  `pack_name` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `pv` varchar(100) NOT NULL,
  `deleted` varchar(10) NOT NULL DEFAULT 'no',
  `payout` varchar(100) NOT NULL,
  `binary` varchar(100) NOT NULL,
  PRIMARY KEY (`pack_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pack`
--

INSERT INTO `pack` (`pack_id`, `pack_name`, `amount`, `pv`, `deleted`, `payout`, `binary`) VALUES
(1, 'Regular', '3500', '150', 'no', '200', '500'),
(2, 'Advance', '5000', '200', 'no', '300', '700'),
(4, 'Ultimate', '7500', '300', 'no', '500', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

CREATE TABLE IF NOT EXISTS `payout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `L` int(30) NOT NULL,
  `R` int(30) NOT NULL,
  `Total` int(30) NOT NULL,
  `binary` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `payout`
--

INSERT INTO `payout` (`id`, `cust_id`, `L`, `R`, `Total`, `binary`) VALUES
(9, 1, 500, 200, 0, '500'),
(10, 2, 200, 500, 0, '500'),
(11, 3, 200, 0, 0, ''),
(12, 4, 0, 0, 0, ''),
(13, 5, 0, 0, 0, ''),
(14, 6, 0, 0, 0, ''),
(15, 7, 0, 0, 0, ''),
(16, 8, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `module_id` int(10) NOT NULL,
  `designation` varchar(20) CHARACTER SET utf8 NOT NULL,
  `madd` tinyint(1) NOT NULL,
  `mview` tinyint(1) NOT NULL,
  `medit` tinyint(1) NOT NULL,
  `mdelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`module_id`,`designation`),
  KEY `module_id` (`module_id`,`designation`),
  KEY `designation` (`designation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`module_id`, `designation`, `madd`, `mview`, `medit`, `mdelete`) VALUES
(1, 'admin', 1, 1, 1, 1),
(2, 'admin', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `misc` text NOT NULL,
  `description` text NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `received_price` varchar(100) NOT NULL,
  `pv` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat` varchar(10) NOT NULL,
  `pack_id` int(10) NOT NULL,
  `deleted` varchar(10) NOT NULL DEFAULT 'no',
  `stock` varchar(10) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `code`, `pname`, `misc`, `description`, `selling_price`, `received_price`, `pv`, `image`, `cat_id`, `sub_cat`, `pack_id`, `deleted`, `stock`) VALUES
(1, '001', 'Television', 'FOOD SUPPLEMENT BITTER GOURD & JAVA PLUM JUICE', '     TV @31 inches LED ', '50000', '45000', '100', 'images/tv.png', 1, '1', 1, 'no', '10'),
(2, '002', 'Camera', 'Camera @21MP Good clarity ', '  Camera @21MP Good clarity ', '18000', '10000', '100', 'images/camera.png', 26, '', 1, 'no', '60'),
(4, '123456', 'MOTO X PLAY', ' Operating System:Android 5.1.1', ' Operating System:Android 5.1.1, Lollipop\n RAM:2GB\nStorage(ROM):16GB/32GB', '19000', '17000', '10', 'images/moto2.png', 3, '', 1, 'no', '10'),
(5, '147852369', 'ELECTRONIC', 'hgiuerwhghreihoih', 'kjdfsiohouerwgh ', '10000', '9800', '100', 'images/watch2.png', 2, '', 1, 'no', '10'),
(6, '1010', 'Laptop', 'Details about laptop', ' Details about laptop \r\nRam:4GB\r\nHard Disk :500GB', '35000', '30000', '100', 'images/laptop.png', 26, '', 2, 'no', '10'),
(7, 'B001', 'Bicycle', 'sdfseTGFsegzdsfg', ' fcxbzdfhdffg', '10000', '8000', '100', 'images/bike.jpg', 2, '', 1, 'no', '10'),
(8, 's001', 'snacks', 'low calorie', ' low calorie health supplement, snacks', '55', '40', '10', 'images/fruit-group.png', 1, '', 1, 'no', '10'),
(9, 'ft01', 'Fastrack  Watch', 'womens watch', 'womens watch with silver dial fastrack ', '2000', '1700', '20', 'images/watch3.png', 26, '', 2, 'no', '10'),
(10, 'ft002', 'Fastrack Silver Dial Analog Watch', 'aaaaaaaaaaaaaaaaa', 'sgjh ygjuyghhijuh uhjuhjkjhy  ', '2222', '2000', '22', 'images/watch4.png', 26, '', 1, 'no', '11');

-- --------------------------------------------------------

--
-- Table structure for table `pv`
--

CREATE TABLE IF NOT EXISTS `pv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(30) NOT NULL,
  `L` varchar(10) NOT NULL DEFAULT '0',
  `R` varchar(10) NOT NULL DEFAULT '0',
  `Total` int(30) NOT NULL DEFAULT '0',
  `direct` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pv`
--

INSERT INTO `pv` (`id`, `cust_id`, `L`, `R`, `Total`, `direct`) VALUES
(1, 1, '117', '0', 0, '360'),
(2, 2, '0', '67', 0, '150'),
(3, 3, '0', '15', 0, '150'),
(4, 4, '0', '0', 0, '170'),
(5, 5, '0', '0', 0, '150'),
(6, 6, '0', '0', 0, '200'),
(7, 7, '0', '0', 0, '150'),
(8, 8, '0', '0', 0, '200');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `staff_name` varchar(50) NOT NULL DEFAULT '0',
  `staff_email` varchar(50) NOT NULL DEFAULT '0',
  `staff_password` varchar(50) NOT NULL DEFAULT '0',
  `address_id` int(11) NOT NULL,
  `deleted` varchar(50) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `user_id`, `staff_name`, `staff_email`, `staff_password`, `address_id`, `deleted`) VALUES
(1, 6, 'Demo_staff', 'demostaff', '1a712b63db3d83b0ee24f8b898c2454b', 1, 'no'),
(2, 7, 'etyeryhs', 'gdhdfbgbh', 'aa6d6fe7b1af2bd573ea6664a9dc69e7', 2, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `sub_cat` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cat_id`, `sub_cat`) VALUES
(1, 1, 'sssss'),
(2, 3, 'dreeeeee'),
(3, 1, 'gggg'),
(4, 2, 'Novels');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `active` tinyint(5) NOT NULL DEFAULT '0',
  `designation` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email_id`, `active`, `designation`, `created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0, 'admin', '0000-00-00 00:00:00'),
(28, 'user3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user3@gmail.com', 0, 'customer', '2015-09-29 11:48:50'),
(27, 'user2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user2@gmail.com', 0, 'customer', '2015-09-29 11:44:37'),
(25, 'company@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'company@gmail.com', 0, 'customer', '2015-09-29 11:37:56'),
(26, 'user1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user1@gmail.com', 0, 'customer', '2015-09-29 11:42:52'),
(29, 'JeetheshKarkera', 'e10adc3949ba59abbe56e057f20f883e', 'JeetheshKarkera', 0, 'customer', '2015-10-13 11:05:22'),
(30, 'jeetheshk', 'e10adc3949ba59abbe56e057f20f883e', 'jeetheshk', 0, 'customer', '2015-10-15 05:14:31'),
(31, 'dfsfas', '2d9c686368b83f363d6f862a0c4748c4', 'dfsfas', 0, 'customer', '2015-10-19 11:49:15'),
(32, 'soumidas.km@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'soumidas.km@gmail.com', 0, 'customer', '2015-10-24 06:47:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
