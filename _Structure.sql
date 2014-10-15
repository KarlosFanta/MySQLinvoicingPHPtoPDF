-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2014 at 08:35 PM
-- Server version: 5.5.28-log
-- PHP Version: 5.4.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kc`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajaxsuggest`
--

CREATE TABLE IF NOT EXISTS `ajaxsuggest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `summary` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `aproof`
--

CREATE TABLE IF NOT EXISTS `aproof` (
  `ProofNo` varchar(11) NOT NULL DEFAULT '',
  `CustNo` int(11) DEFAULT NULL,
  `ProofDate` date NOT NULL DEFAULT '0000-00-00',
  `Amt` float DEFAULT NULL,
  `TransNo` varchar(20) NOT NULL,
  `Notes` varchar(500) DEFAULT NULL,
  `PMethod` varchar(30) DEFAULT NULL,
  `InvNoA` varchar(50) DEFAULT NULL,
  `InvNoAincl` float DEFAULT NULL,
  `InvNoB` varchar(11) DEFAULT NULL,
  `InvNoBincl` float DEFAULT NULL,
  `InvNoC` varchar(11) DEFAULT NULL,
  `InvNoCincl` float DEFAULT NULL,
  `InvNoD` varchar(11) DEFAULT NULL,
  `InvNoDincl` float DEFAULT NULL,
  `InvNoE` varchar(11) DEFAULT NULL,
  `InvNoEincl` float DEFAULT NULL,
  `InvNoF` varchar(11) DEFAULT NULL,
  `InvNoFincl` float DEFAULT NULL,
  `InvNoG` varchar(11) DEFAULT NULL,
  `InvNoGincl` float DEFAULT NULL,
  `InvNoH` varchar(11) DEFAULT NULL,
  `InvNoHincl` float DEFAULT NULL,
  `Priority` varchar(30) DEFAULT NULL,
  `CustSDR` varchar(100) NOT NULL,
  PRIMARY KEY (`ProofNo`),
  UNIQUE KEY `ProofNo` (`ProofNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `message` varchar(19000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=519 ;

-- --------------------------------------------------------
--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `CustNo` int(11) NOT NULL AUTO_INCREMENT,
  `CustFN` varchar(100) DEFAULT NULL,
  `CustLN` varchar(100) DEFAULT NULL,
  `CustTel` varchar(100) DEFAULT NULL,
  `CustCell` varchar(70) DEFAULT NULL,
  `CustEmail` varchar(150) DEFAULT NULL,
  `CustAddr` varchar(300) DEFAULT NULL,
  `CustIDdoc` varchar(100) DEFAULT NULL,
  `CustDetails` text,
  `CustDetailsTXT` text,
  `CustPW` varchar(300) DEFAULT NULL,
  `Distance` varchar(20) DEFAULT NULL,
  `ADSLTel` varchar(200) DEFAULT NULL,
  `Important` text NOT NULL,
  `ABBR` varchar(10) NOT NULL,
  `u1` varchar(20) NOT NULL,
  `u2` varchar(40) NOT NULL,
  `topup` text,
  `adslinv` varchar(200) DEFAULT NULL,
  `ae` varchar(15) DEFAULT NULL,
  `dotdot` varchar(3) DEFAULT NULL,
  `L1` varchar(1000) DEFAULT NULL,
  `ae2` varchar(20) DEFAULT NULL,
  `invD2` varchar(140) DEFAULT NULL,
  `invD3` varchar(140) NOT NULL,
  `ae3` varchar(20) NOT NULL,
  `invD4` varchar(140) NOT NULL,
  `ae4` varchar(20) NOT NULL,
  `invD5` varchar(140) NOT NULL,
  `ae5` varchar(20) NOT NULL,
  `invD6` varchar(140) NOT NULL,
  `ae6` varchar(20) NOT NULL,
  `invD7` varchar(140) NOT NULL,
  `ae7` varchar(20) NOT NULL,
  `invD8` varchar(140) NOT NULL,
  `ae8` varchar(20) NOT NULL,
  `Extra` text NOT NULL,
  `Confid` varchar(1200) NOT NULL,
  PRIMARY KEY (`CustNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=315 ;

-- --------------------------------------------------------

--
-- Table structure for table `customerbkp`
--

CREATE TABLE IF NOT EXISTS `customerbkp` (
  `CustNo` int(11) NOT NULL AUTO_INCREMENT,
  `CustFN` varchar(100) DEFAULT NULL,
  `CustLN` varchar(100) DEFAULT NULL,
  `CustTel` varchar(100) DEFAULT NULL,
  `CustCell` varchar(70) DEFAULT NULL,
  `CustEmail` varchar(150) DEFAULT NULL,
  `CustAddr` varchar(100) DEFAULT NULL,
  `CustIDdoc` varchar(30) DEFAULT NULL,
  `CustDetails` text,
  `CustDetailsTXT` text,
  `CustPW` varchar(300) DEFAULT NULL,
  `Distance` varchar(20) DEFAULT NULL,
  `ADSLTel` varchar(200) DEFAULT NULL,
  `Important` text NOT NULL,
  `ABBR` varchar(10) NOT NULL,
  `u1` varchar(20) NOT NULL,
  `u2` varchar(20) NOT NULL,
  `topup` varchar(100) DEFAULT NULL,
  `adslinv` varchar(200) DEFAULT NULL,
  `ae` varchar(15) DEFAULT NULL,
  `dotdot` varchar(2) DEFAULT NULL,
  `L1` varchar(1000) DEFAULT NULL,
  `ae2` varchar(20) DEFAULT NULL,
  `invD2` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`CustNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=220 ;

-- --------------------------------------------------------


--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `EventNo` int(11) NOT NULL,
  `CustNo` int(11) DEFAULT NULL,
  `EDate` date NOT NULL DEFAULT '0000-00-00',
  `ENotes` varchar(1000) DEFAULT NULL,
  `Priority` varchar(100) DEFAULT NULL,
  `Destination` varchar(120) NOT NULL,
  PRIMARY KEY (`EventNo`),
  UNIQUE KEY `EventNo` (`EventNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Table structure for table `expensesh`
--

CREATE TABLE IF NOT EXISTS `expensesh` (
  `ExpNo` int(11) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `ExpDesc` varchar(500) NOT NULL,
  `SerialNo` varchar(40) NOT NULL,
  `SupCode` varchar(30) NOT NULL,
  `PurchDate` date NOT NULL,
  `ProdCostExVAT` varchar(15) NOT NULL,
  `Notes` varchar(500) NOT NULL,
  `CustNo` varchar(10) NOT NULL,
  PRIMARY KEY (`ExpNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `h2e`
--

CREATE TABLE IF NOT EXISTS `h2e` (
  `EventNo` int(11) NOT NULL,
  `CustNo` int(11) DEFAULT NULL,
  `EDate` date NOT NULL DEFAULT '0000-00-00',
  `ENotes` varchar(1000) DEFAULT NULL,
  `Priority` varchar(100) DEFAULT NULL,
  `Destination` varchar(120) NOT NULL,
  PRIMARY KEY (`EventNo`),
  UNIQUE KEY `EventNo` (`EventNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `h2eadv`
--

CREATE TABLE IF NOT EXISTS `h2eadv` (
  `A1` varchar(100) NOT NULL,
  `B1` varchar(100) NOT NULL,
  `C1` varchar(100) NOT NULL,
  `D1` varchar(100) NOT NULL,
  `E1` varchar(100) NOT NULL,
  `F1` varchar(100) NOT NULL,
  `G1` varchar(100) NOT NULL,
  `H1` varchar(100) NOT NULL,
  `I1` varchar(100) NOT NULL,
  `J1` varchar(100) NOT NULL,
  `K1` varchar(100) NOT NULL,
  `L1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `sheetid` varchar(255) NOT NULL DEFAULT '',
  `columnid` int(11) NOT NULL DEFAULT '0',
  `label` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  PRIMARY KEY (`sheetid`,`columnid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hprofits`
--

CREATE TABLE IF NOT EXISTS `hprofits` (
  `ExpNo` int(11) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `ExpDesc` varchar(500) NOT NULL,
  `SerialNo` varchar(40) NOT NULL,
  `SupCode` varchar(30) NOT NULL,
  `PurchDate` date NOT NULL,
  `ProdCostExVAT` varchar(15) NOT NULL,
  `Notes` varchar(500) NOT NULL,
  `CustNo` varchar(10) NOT NULL,
  PRIMARY KEY (`ExpNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `InvNo` int(11) NOT NULL,
  `CustNo` int(11) NOT NULL,
  `InvDate` date DEFAULT NULL,
  `Summary` varchar(200) DEFAULT NULL,
  `InvPdStatus` varchar(200) DEFAULT NULL,
  `D1` varchar(500) DEFAULT NULL,
  `Q1` float DEFAULT NULL,
  `ex1` varchar(15) DEFAULT NULL,
  `D2` varchar(500) DEFAULT NULL,
  `Q2` float DEFAULT NULL,
  `ex2` varchar(15) DEFAULT NULL,
  `D3` varchar(500) DEFAULT NULL,
  `Q3` float DEFAULT NULL,
  `ex3` varchar(15) DEFAULT NULL,
  `D4` varchar(500) DEFAULT NULL,
  `Q4` float DEFAULT NULL,
  `ex4` float DEFAULT NULL,
  `D5` varchar(200) DEFAULT NULL,
  `Q5` float DEFAULT NULL,
  `ex5` float DEFAULT NULL,
  `D6` varchar(200) DEFAULT NULL,
  `Q6` float DEFAULT NULL,
  `ex6` float DEFAULT NULL,
  `D7` varchar(200) DEFAULT NULL,
  `Q7` float DEFAULT NULL,
  `ex7` float DEFAULT NULL,
  `D8` varchar(200) DEFAULT NULL,
  `Q8` float DEFAULT NULL,
  `ex8` float DEFAULT NULL,
  `TotAmt` float DEFAULT NULL,
  `SDR` text NOT NULL,
  `Draft` varchar(11) NOT NULL,
  PRIMARY KEY (`InvNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobcard`
--

CREATE TABLE IF NOT EXISTS `jobcard` (
  `JCNo` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Detail` text NOT NULL,
  `Priority` varchar(10) NOT NULL,
  `Deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jqinv`
--

CREATE TABLE IF NOT EXISTS `jqinv` (
  `id` int(11) NOT NULL,
  `invsugg` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProdID` varchar(10) NOT NULL,
  `ProdDesc` varchar(200) DEFAULT NULL,
  `SupCode` varchar(10) DEFAULT NULL,
  `PurchDate` date DEFAULT NULL,
  `ProdCostPrice` float DEFAULT NULL,
  `ProdSalesPrice` float DEFAULT NULL,
  `TotQtyOnOrder` float DEFAULT NULL,
  `TotQtySuppliedToDate` float DEFAULT NULL,
  `MinQty` float DEFAULT NULL,
  `MAxQty` float DEFAULT NULL,
  `CustNo` varchar(50) NOT NULL,
  `Cu` varchar(50) NOT NULL,
  `Route` varchar(50) NOT NULL,
  `Ve` varchar(50) NOT NULL,
  PRIMARY KEY (`ProdID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `QuoNo` int(11) NOT NULL AUTO_INCREMENT,
  `CustNo` int(11) DEFAULT NULL,
  `QDate` date NOT NULL DEFAULT '0000-00-00',
  `QNotes` text,
  `Priority` varchar(100) DEFAULT NULL,
  `Summary` varchar(200) DEFAULT NULL,
  `D1` varchar(200) DEFAULT NULL,
  `Q1` float DEFAULT NULL,
  `ex1` float DEFAULT NULL,
  `D2` varchar(200) DEFAULT NULL,
  `Q2` float DEFAULT NULL,
  `ex2` float DEFAULT NULL,
  `D3` varchar(200) DEFAULT NULL,
  `Q3` float DEFAULT NULL,
  `ex3` float DEFAULT NULL,
  `D4` varchar(200) DEFAULT NULL,
  `Q4` float DEFAULT NULL,
  `ex4` float DEFAULT NULL,
  `D5` varchar(200) DEFAULT NULL,
  `Q5` float DEFAULT NULL,
  `ex5` float DEFAULT NULL,
  `D6` varchar(200) DEFAULT NULL,
  `Q6` float DEFAULT NULL,
  `ex6` float DEFAULT NULL,
  `D7` varchar(200) DEFAULT NULL,
  `Q7` float DEFAULT NULL,
  `ex7` float DEFAULT NULL,
  `D8` varchar(200) DEFAULT NULL,
  `Q8` float DEFAULT NULL,
  `ex8` float DEFAULT NULL,
  `TotAmt` float DEFAULT NULL,
  `SDR` text,
  PRIMARY KEY (`QuoNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `materialID` int(11) NOT NULL,
  `Start` time NOT NULL,
  `End` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setts1`
--

CREATE TABLE IF NOT EXISTS `setts1` (
  `CompName` varchar(200) NOT NULL,
  `CompDetails` varchar(1000) NOT NULL,
  `CompLogo` varchar(500) NOT NULL,
  `Website` varchar(200) NOT NULL,
  `ContactNumbers` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `PaymentEmail` varchar(200) NOT NULL,
  `Other` varchar(500) NOT NULL,
  `TermsWeblink` varchar(300) NOT NULL,
  `SupportLink` varchar(300) NOT NULL,
  `Currency` varchar(10) NOT NULL,
  `DateFormat` varchar(10) NOT NULL,
  `Director` varchar(300) NOT NULL,
  `SecretaryEmail` varchar(300) NOT NULL,
  `DirectorsTel` varchar(200) NOT NULL,
  `DirectorsCell` varchar(200) NOT NULL,
  `BankAccName` varchar(200) NOT NULL,
  `BankAccNo` varchar(200) NOT NULL,
  `AccType` varchar(200) NOT NULL,
  `Bank` varchar(200) NOT NULL,
  `BrCode` varchar(200) NOT NULL,
  `OtherBrCodes` varchar(300) NOT NULL,
  `VATNo` varchar(300) NOT NULL,
  `CKTaxRegNo` varchar(300) NOT NULL,
  `DefaultCustomerFolder` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `SupCode` varchar(30) NOT NULL,
  `SupName` varchar(200) NOT NULL,
  `SupTel` varchar(100) NOT NULL,
  `SupEmail` varchar(120) NOT NULL,
  `SupAddress` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `TransNo` int(11) NOT NULL,
  `CustNo` int(11) DEFAULT NULL,
  `TransDate` date NOT NULL DEFAULT '0000-00-00',
  `AmtPaid` float DEFAULT NULL,
  `Notes` varchar(500) DEFAULT NULL,
  `TMethod` varchar(30) DEFAULT NULL,
  `InvNoA` varchar(50) DEFAULT NULL,
  `InvNoAincl` float DEFAULT NULL,
  `InvNoB` varchar(11) DEFAULT NULL,
  `InvNoBincl` float DEFAULT NULL,
  `InvNoC` varchar(11) DEFAULT NULL,
  `InvNoCincl` float DEFAULT NULL,
  `InvNoD` varchar(11) DEFAULT NULL,
  `InvNoDincl` float DEFAULT NULL,
  `InvNoE` varchar(11) DEFAULT NULL,
  `InvNoEincl` float DEFAULT NULL,
  `InvNoF` varchar(11) DEFAULT NULL,
  `InvNoFincl` float DEFAULT NULL,
  `InvNoG` varchar(11) DEFAULT NULL,
  `InvNoGincl` float DEFAULT NULL,
  `InvNoH` varchar(11) DEFAULT NULL,
  `InvNoHincl` float DEFAULT NULL,
  `Priority` varchar(30) DEFAULT NULL,
  `CustSDR` varchar(100) NOT NULL,
  PRIMARY KEY (`TransNo`),
  UNIQUE KEY `TransNo` (`TransNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tz_todo`
--

CREATE TABLE IF NOT EXISTS `tz_todo` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(8) unsigned NOT NULL DEFAULT '0',
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `apikey` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `secret` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `CustNo` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`CustNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
