-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 06:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5583841_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `constructionelectivecerts`
--

CREATE TABLE `constructionelectivecerts` (
  `Certs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `constructionmandatorycerts`
--

CREATE TABLE `constructionmandatorycerts` (
  `ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course1` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course2` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course3` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course4` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course5` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course6` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course7` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course8` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course9` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course10` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course11` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course12` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course13` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course14` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course15` varchar(7) NOT NULL DEFAULT 'N/A',
  `Course16` varchar(7) NOT NULL DEFAULT 'N/A',
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course1`, `Course2`, `Course3`, `Course4`, `Course5`, `Course6`, `Course7`, `Course8`, `Course9`, `Course10`, `Course11`, `Course12`, `Course13`, `Course14`, `Course15`, `Course16`, `id`) VALUES
('ENG4U0', 'MCV4U0', 'TMJ4MR', 'TMJ3MR', 'SCH4UR', 'TDJ4MR', 'TDJ3MR', 'ENG3U0', 'COP4XC', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'DavidS'),
('N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'JSmith'),
('N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'JSun'),
('N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'NikS'),
('ENG4U0', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'OmidI'),
('N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'RCricket');

-- --------------------------------------------------------

--
-- Table structure for table `coursetypes`
--

CREATE TABLE `coursetypes` (
  `English` tinyint(1) NOT NULL DEFAULT '0',
  `Math` tinyint(1) NOT NULL DEFAULT '0',
  `Manufacturing` tinyint(1) NOT NULL DEFAULT '0',
  `Construction` tinyint(1) NOT NULL DEFAULT '0',
  `Justice` tinyint(1) NOT NULL DEFAULT '0',
  `Science` tinyint(1) NOT NULL DEFAULT '0',
  `Co-op` tinyint(1) NOT NULL DEFAULT '0',
  `Course` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetypes`
--

INSERT INTO `coursetypes` (`English`, `Math`, `Manufacturing`, `Construction`, `Justice`, `Science`, `Co-op`, `Course`) VALUES
(0, 0, 0, 0, 0, 0, 1, 'COP2XC'),
(0, 0, 0, 0, 0, 0, 4, 'COP4XC'),
(1, 0, 0, 0, 0, 0, 0, 'ENG3U0'),
(1, 0, 0, 0, 0, 0, 0, 'ENG4U0'),
(0, 1, 0, 0, 0, 0, 0, 'MCV4U0'),
(0, 0, 0, 0, 0, 1, 0, 'SCH3UR'),
(0, 0, 0, 0, 0, 1, 0, 'SCH4UR'),
(0, 0, 1, 0, 0, 0, 0, 'TDJ3MR'),
(0, 0, 1, 0, 0, 0, 0, 'TDJ4MR'),
(0, 0, 1, 0, 0, 0, 0, 'TMJ3MR'),
(0, 0, 1, 0, 0, 0, 0, 'TMJ4MR');

-- --------------------------------------------------------

--
-- Table structure for table `electivecerts`
--

CREATE TABLE `electivecerts` (
  `id` varchar(10) NOT NULL,
  `Cert1` varchar(128) NOT NULL DEFAULT 'N/A',
  `Cert2` varchar(128) NOT NULL DEFAULT 'N/A',
  `Cert3` varchar(128) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electivecerts`
--

INSERT INTO `electivecerts` (`id`, `Cert1`, `Cert2`, `Cert3`) VALUES
('DavidS', 'Canadian Welding Bureau', 'Basic Safety Orientation', 'computer-aided design and computer-aided manufacturing'),
('JSmith', 'N/A', 'N/A', 'N/A'),
('JSun', 'N/A', 'N/A', 'N/A'),
('NikS', 'handling dangerous substances', 'N/A', 'N/A'),
('OmidI', 'advanced training in a technique', 'N/A', 'N/A'),
('RCricket', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `justiceelectivecerts`
--

CREATE TABLE `justiceelectivecerts` (
  `Certs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `justiceelectivecerts`
--

INSERT INTO `justiceelectivecerts` (`Certs`) VALUES
('advanced training in a technique'),
('ambulation, lifting, and transfer'),
('animal first aid'),
('basic electrical safety'),
('compass/map/global positioning system'),
('concussion awareness'),
('confined space awareness'),
('customer service'),
('defensive driving'),
('emergency preparedness - basic');

-- --------------------------------------------------------

--
-- Table structure for table `justicemandatorycerts`
--

CREATE TABLE `justicemandatorycerts` (
  `ID` varchar(10) NOT NULL,
  `CPR C includes AED` tinyint(1) NOT NULL DEFAULT '0',
  `WHMIS - Genreic` tinyint(1) NOT NULL DEFAULT '0',
  `Conflict Resolution` tinyint(1) NOT NULL DEFAULT '0',
  `Standard First Aid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `justicemandatorycerts`
--

INSERT INTO `justicemandatorycerts` (`ID`, `CPR C includes AED`, `WHMIS - Genreic`, `Conflict Resolution`, `Standard First Aid`) VALUES
('OmidI', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Teacher` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `FirstName`, `LastName`, `password`, `Teacher`) VALUES
('123p10', 'Owen', 'Brake', '$2y$10$/.BzIHqBRWXWj6vnobj7..HzZRDvGtNFcnpqxcaubM4T4mraViGuG', 1),
('DavidS', 'David', 'Sun', '$2y$10$MiDz80uBJGJ/CaJ6/AeILuhprDry0/SAK4lMzO1r5lqFqKShMSS8u', 0),
('JamesT', 'James', 'Templemann', '$2y$10$tjAcQPUxT1qdqkQY.3TSZurL.crcgz6qAFlTCvjqpkCasf41ztJaW', 1),
('JSmith', 'John', 'Smith', '$2y$10$AxYrlscR0/Tl16o2ye0stObHj6.TzqcCB1T3Oq4FfGPnOAl24vNGe', 0),
('NikS', 'Nikash', 'Sharma', '$2y$10$n08q776bkHdB0fLMU8bxHumNgvibHTNG2w4gXC4TRU8sY0BBB81.2', 0),
('OmidI', 'Omid', 'Interzam', '$2y$10$8MHzopUJ0nOUuuvjwtEa4O5RCiQL4/5AlxePo3HM3RFDwEvRWwlsm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mandatorycourses`
--

CREATE TABLE `mandatorycourses` (
  `Program` varchar(20) NOT NULL,
  `English` int(11) NOT NULL DEFAULT '0',
  `Manufacturing` int(11) NOT NULL DEFAULT '0',
  `Construction` tinyint(4) NOT NULL DEFAULT '0',
  `Math` int(11) NOT NULL DEFAULT '0',
  `Science` int(11) NOT NULL DEFAULT '0',
  `Co-op` int(11) NOT NULL DEFAULT '0',
  `Justice` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandatorycourses`
--

INSERT INTO `mandatorycourses` (`Program`, `English`, `Manufacturing`, `Construction`, `Math`, `Science`, `Co-op`, `Justice`) VALUES
('Construction', 0, 0, 0, 0, 0, 0, 0),
('Justice', 1, 4, 0, 1, 0, 2, 0),
('Manufacturing', 1, 4, 0, 1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturingelectivecerts`
--

CREATE TABLE `manufacturingelectivecerts` (
  `Certs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturingelectivecerts`
--

INSERT INTO `manufacturingelectivecerts` (`Certs`) VALUES
('basic electrical safety'),
('Basic Safety Orientation'),
('Canadian Welding Bureau'),
('computer-aided design and computer-aided manufacturing'),
('confined space awareness'),
('customer service'),
('elevated work platforms'),
('fall protection'),
('fire safety and fire extinguisher use'),
('handling dangerous substances');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturingmandatorycerts`
--

CREATE TABLE `manufacturingmandatorycerts` (
  `ID` varchar(10) NOT NULL,
  `CPR C includes AED` tinyint(1) NOT NULL,
  `Standard First Aid` tinyint(1) NOT NULL,
  `WHMIS - General` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `manufacturingmandatorycerts`
--

INSERT INTO `manufacturingmandatorycerts` (`ID`, `CPR C includes AED`, `Standard First Aid`, `WHMIS - General`) VALUES
('DavidS', 1, 1, 1),
('JSmith', 0, 0, 0),
('NikS', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentperms`
--

CREATE TABLE `studentperms` (
  `ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Construction` tinyint(4) NOT NULL DEFAULT '0',
  `Justice` tinyint(1) NOT NULL DEFAULT '0',
  `Manufacturing` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentperms`
--

INSERT INTO `studentperms` (`ID`, `Construction`, `Justice`, `Manufacturing`) VALUES
('DavidS', 0, 0, 1),
('JSmith', 0, 0, 1),
('NikS', 0, 0, 1),
('OmidI', 0, 1, 0),
('OwenB', 0, 0, 1),
('RCricket', 0, 0, 0),
('TarjTandel', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacherperms`
--

CREATE TABLE `teacherperms` (
  `ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Construction` tinyint(4) NOT NULL DEFAULT '0',
  `Manufacturing` tinyint(1) NOT NULL,
  `Justice` tinyint(1) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherperms`
--

INSERT INTO `teacherperms` (`ID`, `Construction`, `Manufacturing`, `Justice`, `Admin`) VALUES
('123p10', 0, 1, 1, 1),
('JamesT', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `coursetypes`
--
ALTER TABLE `coursetypes`
  ADD UNIQUE KEY `Course` (`Course`);

--
-- Indexes for table `electivecerts`
--
ALTER TABLE `electivecerts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `justiceelectivecerts`
--
ALTER TABLE `justiceelectivecerts`
  ADD UNIQUE KEY `ManufacturingCerts` (`Certs`);

--
-- Indexes for table `justicemandatorycerts`
--
ALTER TABLE `justicemandatorycerts`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mandatorycourses`
--
ALTER TABLE `mandatorycourses`
  ADD UNIQUE KEY `Program` (`Program`);

--
-- Indexes for table `manufacturingelectivecerts`
--
ALTER TABLE `manufacturingelectivecerts`
  ADD UNIQUE KEY `Certs` (`Certs`);

--
-- Indexes for table `manufacturingmandatorycerts`
--
ALTER TABLE `manufacturingmandatorycerts`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `studentperms`
--
ALTER TABLE `studentperms`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `teacherperms`
--
ALTER TABLE `teacherperms`
  ADD UNIQUE KEY `ID` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
