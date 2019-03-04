-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 01:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `future`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `aid` int(11) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `acontact` bigint(20) NOT NULL,
  `alocation` varchar(255) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `apin` varchar(2000) NOT NULL,
  `apassword` varchar(255) NOT NULL,
  `nsales` int(11) NOT NULL,
  `emp_status` varchar(45) NOT NULL,
  `experience` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `aqualification` varchar(255) NOT NULL,
  `adob` varchar(255) NOT NULL,
  `aaddress` varchar(255) NOT NULL,
  `alicense` int(11) NOT NULL DEFAULT '0',
  `apan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`aid`, `aemail`, `acontact`, `alocation`, `aname`, `apin`, `apassword`, `nsales`, `emp_status`, `experience`, `sid`, `aqualification`, `adob`, `aaddress`, `alicense`, `apan`) VALUES
(58, 'SIRGAURAV3@GMAIL.COM', 7758849973, '', 'Gaurav', '', '202cb962ac59075b964b07152d234b70', 15, 'unemployed', 2, 19, '', '', '', 0, ''),
(59, 'aayushvirkar123@gmail.com', 9876543210, '', 'Aayush', '', '202cb962ac59075b964b07152d234b70', 4, 'employed', 1, 19, '', '', '', 0, ''),
(60, 'shivamshishangia@gmail.com', 8793339625, '', 'Shivam', '', '202cb962ac59075b964b07152d234b70', 22, 'unemployed', 0, 19, '', '', '', 0, ''),
(10, 'mihirsase01@gmail.com', 8411863858, '', 'Mihir', '', '202cb962ac59075b964b07152d234b70', 11, 'employed', 4, 19, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `agentdoc`
--

CREATE TABLE `agentdoc` (
  `aid` int(11) NOT NULL,
  `adoc` varchar(255) NOT NULL,
  `atype` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agentdoc`
--

INSERT INTO `agentdoc` (`aid`, `adoc`, `atype`) VALUES
(43, '1.jpg', 'IC38'),
(43, '4qsjzu8t3ze01.jpg', 'PAN'),
(43, '640x1138_1389717082_sunrise-on-a-lake.jpg', 'Aadhar'),
(43, '2160x1920-Wallpaper_AppsApk_-333.jpg', 'Marksheet'),
(43, 'android-logo-4.jpg', 'cheque');

-- --------------------------------------------------------

--
-- Table structure for table `agentstatus`
--

CREATE TABLE `agentstatus` (
  `aid` int(11) NOT NULL,
  `acontact` varchar(45) NOT NULL,
  `ARF` int(11) NOT NULL DEFAULT '0',
  `shortARF` int(11) NOT NULL DEFAULT '0',
  `ic38` int(11) NOT NULL DEFAULT '0',
  `adocument` int(11) NOT NULL DEFAULT '0',
  `aupload` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL,
  `apayment` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agentstatus`
--

INSERT INTO `agentstatus` (`aid`, `acontact`, `ARF`, `shortARF`, `ic38`, `adocument`, `aupload`, `sid`, `apayment`) VALUES
(10, '8411863858', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `acontact` bigint(20) NOT NULL,
  `apassword` varchar(255) NOT NULL,
  `aemail` varchar(255) NOT NULL,
  `averified` int(11) NOT NULL DEFAULT '0',
  `avkey` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`acontact`, `apassword`, `aemail`, `averified`, `avkey`) VALUES
(8793339625, '202cb962ac59075b964b07152d234b70', 'shivamshishangia@gmail.com', 1, 'fea2af9d95dac43f66bda861754cc582'),
(9876543210, '202cb962ac59075b964b07152d234b70', 'aayushvirkar123@gmail.com', 1, 'c7643797e6fc30b6e60b8d68c1e0c24a'),
(7758849973, '202cb962ac59075b964b07152d234b70', 'SIRGAURAV3@GMAIL.COM', 1, '356c809bfb566e173c3453dc11752d8d'),
(8411863858, '202cb962ac59075b964b07152d234b70', 'mihirsase01@gmail.com', 1, '5aa336a5dab93a1e2d2bfc612853c8b7');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `ans_id`) VALUES
(1, 'Thirty Percent', 1),
(2, 'Twenty percent', 1),
(3, 'Thirty Five Percent', 1),
(4, 'None of this', 1),
(5, 'Non participatory', 2),
(6, 'Money back', 2),
(7, 'Whole life', 2),
(8, 'None of the above', 2),
(9, 'Whether it is participating in profits or not', 3),
(10, 'The date of commencement and the date of maturity', 3),
(11, 'Any special clauses or conditions', 3),
(12, 'All the above', 3),
(13, 'death is certain', 4),
(14, 'death is uncertain', 4),
(15, 'the timing of death is uncertain', 4),
(16, 'Death is the solution', 4),
(17, 'Capital Appreciation', 5),
(18, 'Capital Profit', 5),
(19, 'Capital Benefit', 5),
(20, 'Capital addition', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bmanager`
--

CREATE TABLE `bmanager` (
  `bid` int(11) NOT NULL,
  `bemail` varchar(255) NOT NULL,
  `bpassword` varchar(255) NOT NULL,
  `bcontact` bigint(20) NOT NULL,
  `bbranch` varchar(255) NOT NULL,
  `blocation` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmanager`
--

INSERT INTO `bmanager` (`bid`, `bemail`, `bpassword`, `bcontact`, `bbranch`, `blocation`, `bname`) VALUES
(0, 'wanianurag2@gmail.com', '202cb962ac59075b964b07152d234b70', 9762375482, 'kothrud', 'pune', 'anurag');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `aid` int(11) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mid` int(11) NOT NULL,
  `mtype` varchar(255) NOT NULL,
  `mname` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mid`, `mtype`, `mname`) VALUES
(1, 'ic38', 'AHEnglish.pdf'),
(56, 'ic38', 'AHEnglish.pdf'),
(4, 'ic38', 'IRDA  IC 38 EXAM - Imp Qu.mp4'),
(5, 'ic38', 'IRDA IC 38 GENERAL INSURA.mp4'),
(26, 'Vehicle', 'Car-TwoWheeler-ProposalForm.pdf'),
(28, 'Vehicle', 'MotorClaimForm-CFMT03.pdf'),
(23, 'Home', 'HomeSecure-ClaimForm.pdf'),
(24, 'Home', 'HomeSecure-eBrochure.pdf'),
(25, 'Health', 'FutureHealthSuraksha_Individual_Prospectus_cum_Proposal.pdf'),
(27, 'Health', 'FutureHospiCash-eBrochure.pdf'),
(33, 'Vehicle', 'MotorSecure-eBrochure.pdf'),
(52, 'ic38', 'ANLEnglish.pdf'),
(55, 'ic38', 'ic38book.png'),
(51, 'ic38', 'ANLEnglish.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `aid` int(11) NOT NULL,
  `astatus` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `ans_id`) VALUES
(1, 'An Agent can receive maximum of ________ %of the premium as commission in the first year', 3),
(2, 'Which kind policies are not entitled bonuses?', 5),
(3, 'A life insurance policy shall clearly state the following', 12),
(4, 'Human beings need life insurance because________', 15),
(5, 'Harris bought a share for Rs.110 and he sold when it was Rs.630.What is the benefit called?', 17);

-- --------------------------------------------------------

--
-- Table structure for table `salesmanager`
--

CREATE TABLE `salesmanager` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `scontact` bigint(20) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `sverified` int(11) NOT NULL DEFAULT '0',
  `spassword` varchar(255) NOT NULL,
  `slocation` varchar(255) NOT NULL,
  `sbranch` varchar(255) NOT NULL,
  `svkey` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesmanager`
--

INSERT INTO `salesmanager` (`sid`, `sname`, `scontact`, `semail`, `sverified`, `spassword`, `slocation`, `sbranch`, `svkey`) VALUES
(17, 'Gaurav Ingale', 7758849973, 'sirgaurav3@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 'pune', 'kothrud', '25ed5e0a48132f2da5992e5a6e21f6fd'),
(16, 'Sahil Sehgal ', 7350083672, 'sahilsehgal115@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 'pune', 'kothrud', '3af87afc41011f913a98a1eb283c5517'),
(18, 'Ishita Trivedi', 9130291932, 'ishita.trivedi10@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 'pune', 'kothrud', '15ead43d1ec9c7dc248d77dea42e7556'),
(20, 'Anurag Wani', 8149828172, 'wanianurag3@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 'pune', 'kothrud', '523f371e82cc79c6c30420952c50c93a'),
(19, 'Shivam Shishangia', 8793339625, 'shivamshishangia@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 'pune', 'kothrud', '7e456edd257f4340a974dae0c7659181'),
(21, 'Popatlal', 9000000001, 'popatlal@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 'pune', 'kothrud', '2862f52878869e110d7d005204a43ebc'),
(22, 'Shinchan', 9000000002, 'shinchan@gmail.com', 1, '202cb962ac59075b964b07152d234b70', 'pune', 'kothrud', 'edb7a9a04bc6e6982be29257a9ce3ef1'),
(23, 'Jay', 9000000003, 'jay@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 'pune', 'fc road', 'faeb1bf90aa20863579ef53fd20d4294');

-- --------------------------------------------------------

--
-- Table structure for table `tteam`
--

CREATE TABLE `tteam` (
  `tid` int(11) NOT NULL,
  `tpassword` varchar(255) NOT NULL,
  `temail` varchar(255) NOT NULL,
  `tcontact` bigint(20) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `tverified` varchar(255) NOT NULL,
  `tlocation` varchar(255) NOT NULL,
  `tbranch` varchar(255) NOT NULL,
  `tvkey` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tteam`
--

INSERT INTO `tteam` (`tid`, `tpassword`, `temail`, `tcontact`, `tname`, `tverified`, `tlocation`, `tbranch`, `tvkey`) VALUES
(6, '202cb962ac59075b964b07152d234b70', 'wanianurag3@gmail.com', 9762375482, 'Anurag Wani', '1', 'pune', 'kothrud', '0358626ab05d0610ed1e3d97f95bccf1'),
(11, '202cb962ac59075b964b07152d234b70', 'wanianurag4@gmail.com', 8149828172, 'Suneet', '1', 'pune', 'kothrud', 'aaee7ffdac93a66f5358a91cb7e9fc10'),
(12, '202cb962ac59075b964b07152d234b70', 'shivamshishangia@gmail.com', 8793339625, 'Shivam Shishangia', '1', 'pune', 'kothrud', '8a07749b060930c90f1a9ef2ef66bc3b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`acontact`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `salesmanager`
--
ALTER TABLE `salesmanager`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tteam`
--
ALTER TABLE `tteam`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesmanager`
--
ALTER TABLE `salesmanager`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tteam`
--
ALTER TABLE `tteam`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
