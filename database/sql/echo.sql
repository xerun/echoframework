-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2020 at 10:47 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echo`
--
CREATE DATABASE IF NOT EXISTS `echo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `echo`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `p2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p2` ()  BEGIN  
    SELECT * FROM tbluser;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbladvert`
--

DROP TABLE IF EXISTS `tbladvert`;
CREATE TABLE IF NOT EXISTS `tbladvert` (
  `AdvertUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertPanelUUID` varchar(255) NOT NULL DEFAULT '0',
  `AdvertName` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertType` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertPicture` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertClickURL` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertToolTip` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertIsActive` int(11) NOT NULL DEFAULT '0',
  `UserUUID` varchar(255) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`AdvertUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbladvert`
--

INSERT INTO `tbladvert` (`AdvertUUID`, `AdvertPanelUUID`, `AdvertName`, `AdvertType`, `AdvertPicture`, `AdvertClickURL`, `AdvertToolTip`, `AdvertIsActive`, `UserUUID`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
('032CA8F4-CD36-E4F5-A55A-518BBF29A2A7', '53435310-45B2-9017-3EEC-A25E2CD36399', 'Google', 'Image', 'google.gif', 'http://www.google.com', 'Google', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-08-16 11:19:57', '2012-09-26 13:16:00', '2012-09-26 13:16:00'),
('FF78188B-C6DB-5CE5-8792-6FE26978E99C', 'A56FD29A-530A-F186-806A-503D1E2CC323', 'Facebook', 'Image', 'facebook1.gif', 'http://www.facebook.com', 'Flash', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-08-17 11:25:46', '2016-08-11 15:18:08', '2016-08-11 15:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbladvertpanel`
--

DROP TABLE IF EXISTS `tbladvertpanel`;
CREATE TABLE IF NOT EXISTS `tbladvertpanel` (
  `AdvertPanelUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertPanelName` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertPanelIdentifire` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `AdvertWidth` int(11) NOT NULL DEFAULT '0',
  `AdvertHeight` int(11) NOT NULL DEFAULT '0',
  `AdvertPanelMaxNumber` int(11) NOT NULL DEFAULT '0',
  `AdvertPanelIsVertical` int(11) NOT NULL DEFAULT '0',
  `AdvertPanelIsActive` int(11) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`AdvertPanelUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbladvertpanel`
--

INSERT INTO `tbladvertpanel` (`AdvertPanelUUID`, `AdvertPanelName`, `AdvertPanelIdentifire`, `AdvertWidth`, `AdvertHeight`, `AdvertPanelMaxNumber`, `AdvertPanelIsVertical`, `AdvertPanelIsActive`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
('7655E33E-9FA6-7BF9-DAA6-31EDA5E5F770', 'Top', 'TOP', 150, 100, 2, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-08-16 10:53:36', '2007-08-16 10:54:35', '2007-08-16 10:54:35'),
('56291E79-47CB-2324-FF9D-08F19BF52C33', 'Bottom', 'BOTTOM', 150, 100, 2, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-08-16 10:53:56', '2012-06-07 11:53:19', '2012-06-07 11:53:19'),
('53435310-45B2-9017-3EEC-A25E2CD36399', 'Left', 'LEFT', 150, 120, 15, 1, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-08-16 10:54:12', '2012-09-26 12:25:45', '2012-09-26 12:25:45'),
('A56FD29A-530A-F186-806A-503D1E2CC323', 'Right', 'RIGHT', 150, 120, 15, 1, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-08-16 10:54:27', '2012-09-26 12:25:50', '2012-09-26 12:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicationsetting`
--

DROP TABLE IF EXISTS `tblapplicationsetting`;
CREATE TABLE IF NOT EXISTS `tblapplicationsetting` (
  `ApplicationSettingUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `ApplicationSettingName` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `ApplicationSettingValue` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `ApplicationSettingDescription` text CHARACTER SET latin1 NOT NULL,
  `ApplicationSettingInputTypeName` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `ApplicationSettingIsHidden` int(11) NOT NULL DEFAULT '0',
  `ApplicationSettingIsLocked` int(11) NOT NULL DEFAULT '0',
  `ApplicationSettingIsActive` int(11) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IsParmanent` int(11) NOT NULL DEFAULT '0' COMMENT 'Determines if the record is erasable',
  PRIMARY KEY (`ApplicationSettingUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblapplicationsetting`
--

INSERT INTO `tblapplicationsetting` (`ApplicationSettingUUID`, `ApplicationSettingName`, `ApplicationSettingValue`, `ApplicationSettingDescription`, `ApplicationSettingInputTypeName`, `ApplicationSettingIsHidden`, `ApplicationSettingIsLocked`, `ApplicationSettingIsActive`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`, `IsParmanent`) VALUES
('C2453B02-F24C-67AA-2533-3920AF9235F3', 'DatagridRowsDefault', '20', '', 'Intiger', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-07-29 16:53:24', '2012-09-26 12:24:14', '2012-09-26 12:24:14', 1),
('{700A614F-7E02-4494-A336-575D19890801}', 'ShortURL', 'true', 'The value for this is true or false. If it is true it will make the URL SEO friendly and if false it will show the old style URL', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:32:09', '2012-09-26 13:07:46', '2012-09-26 13:07:46', 1),
('{420ACE08-3463-444B-B66E-85E2FD4CD15A}', 'DaysToWaitForRegistrationConfirmation', '30', 'After a user has registered the system will wait 30 days for the user to confirm their email address.', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:32:38', '2012-05-31 10:48:18', '2012-05-31 10:48:18', 1),
('{E970584F-5673-46B4-8AE7-111C2720B490}', 'UploadPath', 'upload/', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:35:29', '2012-05-31 10:38:33', '2012-05-31 10:38:33', 1),
('{11A4DCF1-A4F3-4FDE-942A-C0C3B83891A9}', 'LanguageCodeDefault', 'EN-US', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:37:42', '2012-05-30 16:37:42', '2012-05-30 16:37:42', 1),
('{2D7989DB-883C-4E2C-A2AF-6E226E2E7EDB}', 'UserTypeIDGuest', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:37:54', '2012-05-30 16:37:54', '2012-05-30 16:37:54', 1),
('{376792A1-DEE6-442E-9E22-922A2C0AF39A}', 'UserTypeNameGuest', 'Guest', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:38:03', '2012-09-26 12:26:12', '2012-09-26 12:26:12', 1),
('{272E779E-8E33-4AF2-B532-8D5FD9C198E2}', 'UserTypeIDSuperAdmin', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:38:13', '2012-05-30 16:38:13', '2012-05-30 16:38:13', 1),
('{F17D4069-C33D-462F-AACD-488853C56D4D}', 'UserTypeIDAdmin', 'A7598650-2674-1770-1391-F5DF64B73540', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:38:36', '2012-05-30 16:38:36', '2012-05-30 16:38:36', 1),
('{0B59444E-203E-4560-A2E3-32BE3CF47073}', 'UserEmailGuest', 'guest@domain.com', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:40:12', '2012-05-30 16:40:12', '2012-05-30 16:40:12', 1),
('{7DE5B25C-5792-4DB4-B985-0BA783A41CC1}', 'EmailContact', 'info@domain.com', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:40:26', '2012-05-30 16:40:26', '2012-05-30 16:40:26', 1),
('{B0D4F53C-E961-48F2-AC30-1BE0ACF547D5}', 'EmailSupport', 'support@domain.com', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:40:39', '2012-05-30 16:40:39', '2012-05-30 16:40:39', 1),
('{30C0BEF9-DD6B-4E14-B527-4995A174D41E}', 'SessionTimeout', '20', 'The session time in minutes after which the site session will automatically expire.', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:41:00', '2012-05-31 10:46:35', '2012-05-31 10:46:35', 1),
('{447E362B-4CA1-4B66-A9BD-647B9FF27DEB}', 'Title', 'ECHO Framework', 'The name of the site', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-30 16:43:48', '2013-01-06 09:17:40', '2013-01-06 09:17:40', 1),
('{5328F87E-19B8-49E3-86A4-5D499231C599}', 'UserTypeIDMember', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-06-07 10:37:52', '2012-06-07 10:37:52', '2012-06-07 10:37:52', 1),
('{0D224F05-AFA2-4952-BBD7-DC5F4C252941}', 'MultipleTemplates', 'false', 'if the site uses more than one template then give the value true or else give the value false. This will only apply if the Short URL is set to true', '', 0, 0, 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-10-23 13:12:38', '2012-10-23 13:47:17', '2012-10-23 13:47:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcountry`
--

DROP TABLE IF EXISTS `tblcountry`;
CREATE TABLE IF NOT EXISTS `tblcountry` (
  `CountryUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `CountryName` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `CountryPicture` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `CountryIsActive` int(11) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IsParmanent` int(11) NOT NULL DEFAULT '0' COMMENT 'Determines if the record is erasable',
  PRIMARY KEY (`CountryUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcountry`
--

INSERT INTO `tblcountry` (`CountryUUID`, `CountryName`, `CountryPicture`, `CountryIsActive`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`, `IsParmanent`) VALUES
('4b570246-e7a8-1029-9be9-4fc904b88e9e', 'United States of America', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5803ba-e7a8-1029-9be9-4fc904b88e9e', 'United Kingdom', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b590454-e7a8-1029-9be9-4fc904b88e9e', 'Bangladesh', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b6004bc-e7a8-1029-9be9-4fc904b88e9e', 'Australia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b610522-e7a8-1029-9be9-4fc904b88e9e', 'Austria', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b620589-e7a8-1029-9be9-4fc904b88e9e', 'Bahrain', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b6305f2-e7a8-1029-9be9-4fc904b88e9e', 'Canada', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b640656-e7a8-1029-9be9-4fc904b88e9e', 'China', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b6506ba-e7a8-1029-9be9-4fc904b88e9e', 'Cyprus', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b66071f-e7a8-1029-9be9-4fc904b88e9e', 'Egypt', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b670787-e7a8-1029-9be9-4fc904b88e9e', 'France', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b6807ec-e7a8-1029-9be9-4fc904b88e9e', 'Germany', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b690850-e7a8-1029-9be9-4fc904b88e9e', 'Ghana', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b7008b3-e7a8-1029-9be9-4fc904b88e9e', 'Greece', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b71091a-e7a8-1029-9be9-4fc904b88e9e', 'Hong Kong', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b720980-e7a8-1029-9be9-4fc904b88e9e', 'India', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b7309e3-e7a8-1029-9be9-4fc904b88e9e', 'Indonesia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b740a47-e7a8-1029-9be9-4fc904b88e9e', 'Italy', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b750aae-e7a8-1029-9be9-4fc904b88e9e', 'Japan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b760b14-e7a8-1029-9be9-4fc904b88e9e', 'Jordan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b770b7a-e7a8-1029-9be9-4fc904b88e9e', 'Kenya', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b780bde-e7a8-1029-9be9-4fc904b88e9e', 'Korea', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b790c44-e7a8-1029-9be9-4fc904b88e9e', 'Kuwait', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b800ca9-e7a8-1029-9be9-4fc904b88e9e', 'Lebanon', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b810d0d-e7a8-1029-9be9-4fc904b88e9e', 'Malaysia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b820d73-e7a8-1029-9be9-4fc904b88e9e', 'Malta', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b830dd7-e7a8-1029-9be9-4fc904b88e9e', 'Morocco', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b841357-e7a8-1029-9be9-4fc904b88e9e', 'New Zealand', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b8513bf-e7a8-1029-9be9-4fc904b88e9e', 'Nigeria', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b861426-e7a8-1029-9be9-4fc904b88e9e', 'Nordic', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57148a-e7a8-1029-9be9-4fc904b88e8e', 'Oman', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5714ee-e7a8-1029-9be9-4fc904b88e7e', 'Pakistan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571550-e7a8-1029-9be9-4fc904b88e6e', 'Philippines', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5715b6-e7a8-1029-9be9-4fc904b88e5e', 'Qatar', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571619-e7a8-1029-9be9-4fc904b88e4e', 'Russia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57167d-e7a8-1029-9be9-4fc904b88e3e', 'Saudi Arabia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5716e1-e7a8-1029-9be9-4fc904b88e2e', 'Scandinavia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571749-e7a8-1029-9be9-4fc904b88e1e', 'Singapore', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5717ad-e7a8-1029-9be9-4fc904b88e0e', 'South Afric', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571812-e7a8-1029-9be9-4fc904b8810e', 'Sri Lanka', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571885-e7a8-1029-9be9-4fc904b88e9q', 'Sudan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5718f7-e7a8-1029-9be9-4fc904b88e9w', 'Switzerland', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57195d-e7a8-1029-9be9-4fc904b88e9r', 'Syria', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5719c2-e7a8-1029-9be9-4fc904b88e9s', 'Tanzania', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571a25-e7a8-1029-9be9-4fc904b88e9x', 'Thailand', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571a8c-e7a8-1029-9be9-4fc904b88e9u', 'Turkey', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571af0-e7a8-1029-9be9-4fc904b88e9n', 'Afghanistan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571c4b-e7a8-1029-9be9-4fc904b88e9m', 'Albania', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571d11-e7a8-1029-9be9-4fc904b88e9o', 'Algeria', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571dc8-e7a8-1029-9be9-4fc904b88e9p', 'Andorra', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571e7c-e7a8-1029-9be9-4fc904b88e9i', 'Angola', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571f30-e7a8-1029-9be9-4fc904b88e9y', 'Argentina', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b571fe6-e7a8-1029-9be9-4fc904b88e9t', 'Armenia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572099-e7a8-1029-9be9-4fc904b88e9l', 'Azerbaijan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572609-e7a8-1029-9be9-4fc904b88e9f', 'Bahamas', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572609-e7a8-2029-9be9-4fc904b88e9f', 'Barbados', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572825-e7a8-3029-9be9-4fc904b88e9e', 'Belarus', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5728d8-e7a8-4029-9be9-4fc904b88e9e', 'Belgium', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57298c-e7a8-5029-9be9-4fc904b88e9e', 'Bhutan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572a3c-e7a8-6029-9be9-4fc904b88e9e', 'Bolivia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572aec-e7a8-7029-9be9-4fc904b88e9e', 'Bosnia & Herzegovina', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572b9f-e7a8-8029-9be9-4fc904b88e9e', 'Brazil', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572c4e-e7a8-9029-9be9-4fc904b88e9e', 'Brunei', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572d04-e7a8-1129-9be9-4fc904b88e9e', 'Bulgaria', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572dbb-e7a8-1229-9be9-4fc904b88e9e', 'Burma', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572e6e-e7a8-1329-9be9-4fc904b88e9e', 'Cambodia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572f20-e7a8-1429-9be9-4fc904b88e9e', 'Cameroon', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b572fd2-e7a8-1529-9be9-4fc904b88e9e', 'Catalonia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57308a-e7a8-1629-9be9-4fc904b88e9e', 'Chile', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57313d-e7a8-1729-9be9-4fc904b88e9e', 'Colombia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5731ef-e7a8-1829-9be9-4fc904b88e9e', 'Congo', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5732a5-e7a8-1929-9be9-4fc904b88e9e', 'Costa Rica', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b573357-e7a8-2129-9be9-4fc904b88e9e', 'Croatia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57340a-e7a8-2229-9be9-4fc904b88e9e', 'Czechoslovakia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5734be-e7a8-2329-9be9-4fc904b88e9e', 'Denmark', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b573571-e7a8-2429-9be9-4fc904b88e9e', 'Dominica', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b573622-e7a8-2629-9be9-4fc904b88e9e', 'Ethiopia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5736d6-e7a8-2529-9be9-4fc904b88e9e', 'Fiji', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57378a-e7a8-2729-9be9-4fc904b88e9e', 'Finland', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57383d-e7a8-2829-9be9-4fc904b88e9e', 'Gambia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b573d9d-e7a8-2929-9be9-4fc904b88e9e', 'Georgia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b573e55-e7a8-3029-9be9-4fc904b88e9e', 'Grenada', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b573f25-e7a8-3129-9be9-4fc904b88e9e', 'Guatemala', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b573fd9-e7a8-3329-9be9-4fc904b88e9e', 'Haiti', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57408b-e7a8-3229-9be9-4fc904b88e9e', 'Hungary', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57413f-e7a8-3529-9be9-4fc904b88e9e', 'Iceland', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5742d4-e7a8-3729-9be9-4fc904b88e9e', 'Iran', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b574387-e7a8-3829-9be9-4fc904b88e9e', 'Iraq', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57443e-e7a8-3929-9be9-4fc904b88e9e', 'Ireland', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5744f1-e7a8-4129-9be9-4fc904b88e9e', 'Israel', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5745a5-e7a8-4229-9be9-4fc904b88e9e', 'Jamaica', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b574657-e7a8-4329-9be9-4fc904b88e9e', 'Kazakhstan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b57470a-e7a8-4429-9be9-4fc904b88e9e', 'Kyrgyzstan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5747bc-e7a8-4529-9be9-4fc904b88e9e', 'Laos', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b574872-e7a8-4629-9be9-4fc904b88e9e', 'Latvia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b574924-e7a8-4729-9be9-4fc904b88e9e', 'Liberia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b5749d5-e7a8-4829-9be9-4fc904b88e9e', 'Libya', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58b938-e7a8-4929-9be9-4fc904b88e9e', 'Lithuania', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58ba15-e7a8-5129-9be9-4fc904b88e9e', 'Luxembourg', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58bac5-e7a8-5229-9be9-4fc904b88e9e', 'Macedonia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58bb7d-e7a8-5329-9be9-4fc904b88e9e', 'Maldives', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58bc48-e7a8-5429-9be9-4fc904b88e9e', 'Mexic', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58bcfb-e7a8-5529-9be9-4fc904b88e9e', 'Monaco', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58bdaa-e7a8-5629-9be9-4fc904b88e9e', 'Mongolia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58be5c-e7a8-5729-9be9-4fc904b88e9e', 'Namibia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58bf0d-e7a8-5829-9be9-4fc904b88e9e', 'Nauru', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58bfbd-e7a8-5929-9be9-4fc904b88e9e', 'Nepal', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58c54a-e7a8-6129-9be9-4fc904b88e9e', 'Netherlands', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58c5fe-e7a8-6229-9be9-4fc904b88e9e', 'North Korea', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58c6b0-e7a8-6329-9be9-4fc904b88e9e', 'Norway', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58c763-e7a8-6429-9be9-4fc904b88e9e', 'Palestine', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58c810-e7a8-6529-9be9-4fc904b88e9e', 'Panama', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58c8c0-e7a8-6629-9be9-4fc904b88e9e', 'Papua New Guinea', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58c96e-e7a8-6729-9be9-4fc904b88e9e', 'Paraguay', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58ca1e-e7a8-6829-9be9-4fc904b88e9e', 'Peru', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58cace-e7a8-6929-9be9-4fc904b88e9e', 'Poland', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58cb7d-e7a8-7129-9be9-4fc904b88e9e', 'Portugal', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58cc2d-e7a8-7229-9be9-4fc904b88e9e', 'Romania', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58ccde-e7a8-7329-9be9-4fc904b88e9e', 'Rwanda', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58cda2-e7a8-7429-9be9-4fc904b88e9e', 'San Marino', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58ce75-e7a8-7529-9be9-4fc904b88e9e', 'Scotland', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58cf4e-e7a8-7629-9be9-4fc904b88e9e', 'Senegal', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d037-e7a8-7729-9be9-4fc904b88e9e', 'Serbia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d108-e7a8-7829-9be9-4fc904b88e9e', 'Sierra Leone', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d1e9-e7a8-7929-9be9-4fc904b88e9e', 'Slovakia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d2d0-e7a8-1029-9be9-4fc904b88e9e', 'Somalia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d3cf-e7a8-1029-7be9-4fc904b88e9e', 'South Korea', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d4b4-e7a8-1029-8be9-4fc904b88e9e', 'Spain', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d580-e7a8-1029-6be9-4fc904b88e9e', 'Sweden', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58d66c-e7a8-1029-5be9-4fc904b88e9e', 'Taiwan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58dafc-e7a8-1029-4be9-4fc904b88e9e', 'Tajikistan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58dbb5-e7a8-1029-3be9-4fc904b88e9e', 'Togo', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58dc66-e7a8-1029-2be9-4fc904b88e9e', 'Tonga', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58dd16-e7a8-1029-1be9-4fc904b88e9e', 'Tunisia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e2d1-e7a8-1029-0be9-4fc904b88e9e', 'Uganda', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e3c1-e7a8-1029-9be8-4fc904b88e9e', 'Uruguay', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e496-e7a8-1029-9be7-4fc904b88e9e', 'Uzbekistan', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e56d-e7a8-1029-9be6-4fc904b88e9e', 'Vatican City', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e61f-e7a8-1029-9be5-4fc904b88e9e', 'Venezuela', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e6ca-e7a8-1029-9be4-4fc904b88e9e', 'Vietnam', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e77b-e7a8-1029-9be3-4fc904b88e9e', 'Wales', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e82a-e7a8-1029-9be2-4fc904b88e9e', 'Yemen', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e8d9-e7a8-1029-9be1-4fc904b88e9e', 'Zambia', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
('4b58e987-e7a8-1029-9be0-4fc904b88e9e', 'Zimbabwe', '', 0, '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllanguage`
--

DROP TABLE IF EXISTS `tbllanguage`;
CREATE TABLE IF NOT EXISTS `tbllanguage` (
  `LanguageUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `LanguageName` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `LanguageCode` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `LanguageIsActive` int(11) NOT NULL DEFAULT '0',
  `LanguagePicture` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllanguage`
--

INSERT INTO `tbllanguage` (`LanguageUUID`, `LanguageName`, `LanguageCode`, `LanguageIsActive`, `LanguagePicture`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
('ae0a2e74-03ca-102a-b78c-b9cfe0f62f08', 'English (USA)', 'EN-US', 1, '', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-02-02 11:01:53', '0000-00-00 00:00:00', '2007-02-02 11:01:53'),
('ae0a33ec-03ca-102a-b78c-b9cfe0f62f08', 'Bengali', 'BN-BD', 1, '', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-02-02 11:01:53', '0000-00-00 00:00:00', '2007-02-02 11:01:53'),
('', 'German', 'DE', 1, '', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('', 'Japanese', 'JP', 1, '', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

DROP TABLE IF EXISTS `tblmenu`;
CREATE TABLE IF NOT EXISTS `tblmenu` (
  `MenuUUID` varchar(36) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `MenuParentUUID` varchar(36) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `MenuPosition` varchar(100) DEFAULT NULL,
  `MenuName` varchar(255) DEFAULT NULL,
  `MenuUrl` varchar(255) DEFAULT NULL,
  `MenuIsActive` int(11) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(36) NOT NULL,
  `UserUUIDUpdated` varchar(36) NOT NULL,
  `UserUUIDLocked` varchar(36) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`MenuUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`MenuUUID`, `MenuParentUUID`, `MenuPosition`, `MenuName`, `MenuUrl`, `MenuIsActive`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
('3c5a3756-b2a9-11e5-818f-fcaa1424fffa', '', 'Manage', 'Manage Advert', 'advertmanage', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2016-01-04 12:05:41', '2016-08-11 15:23:38', '2016-08-11 15:23:38'),
('D604D30F-BCD5-4EE8-AA22-EA54D1914691', '', 'Admin', 'Manage User Type', 'usertypemanage', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2016-01-04 11:42:49', '2016-08-11 15:24:47', '2016-08-11 15:24:47'),
('0B8272C5-7003-4756-AD2F-1D961DEE88C3', '', 'Admin', 'Manage User', 'usermanage', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2016-01-04 11:42:49', '2016-08-11 15:24:37', '2016-08-11 15:24:37'),
('B9170F3F-D89E-45F9-B125-CF9AB336594C', '', 'Admin', 'Profile Info', 'userprofile', 0, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2016-01-04 11:42:49', '2016-08-11 15:09:34', '2016-08-11 15:09:34'),
('01677AB3-87E5-429F-9B7A-C14EE3556F23', '', 'Admin', 'Application Setting', 'applicationsettingmanage', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2016-01-04 11:42:49', '2016-08-11 15:23:15', '2016-08-11 15:23:15'),
('85F863D2-D95C-4ABF-9B29-22EEEE4F31E5', '', 'Admin', 'Role Permission', 'rolepermission', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2016-01-04 11:42:49', '2016-08-11 15:25:01', '2016-08-11 15:25:01'),
('79F76742-F345-49AD-9069-C634871CA3B6', '', 'Admin', 'Change Password', 'passwordreset', 0, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2016-01-04 11:42:49', '2016-08-11 15:23:24', '2016-08-11 15:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

DROP TABLE IF EXISTS `tblpayment`;
CREATE TABLE IF NOT EXISTS `tblpayment` (
  `PaymentUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `PaymentPurpose` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `PaymentDescription` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserUUID` varchar(255) NOT NULL,
  `AmountPayable` decimal(11,2) NOT NULL DEFAULT '0.00',
  `AmountPaid` decimal(11,2) NOT NULL DEFAULT '0.00',
  `DatePaid` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CouponCode` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `CouponDiscountPercentile` decimal(11,2) NOT NULL DEFAULT '0.00',
  `CouponDiscountAmount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`PaymentUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`PaymentUUID`, `PaymentPurpose`, `PaymentDescription`, `UserUUID`, `AmountPayable`, `AmountPaid`, `DatePaid`, `CouponCode`, `CouponDiscountPercentile`, `CouponDiscountAmount`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
('', 'asdfasd', 'adsf asdfkj aosjd fjaspodjfoasj dofjasod jfasjd fojas j', '1', '1.00', '1.00', '0000-00-00 00:00:00', '2312312', '1.00', '1.00', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpermission`
--

DROP TABLE IF EXISTS `tblpermission`;
CREATE TABLE IF NOT EXISTS `tblpermission` (
  `PermissionUUID` varchar(36) NOT NULL,
  `UserTypeUUID` varchar(36) NOT NULL,
  `UserUUID` varchar(36) DEFAULT NULL,
  `Page` varchar(255) NOT NULL,
  `DateInserted` datetime NOT NULL,
  PRIMARY KEY (`PermissionUUID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpermission`
--

INSERT INTO `tblpermission` (`PermissionUUID`, `UserTypeUUID`, `UserUUID`, `Page`, `DateInserted`) VALUES
('', '', '', '', '0000-00-00 00:00:00'),
('505a69de-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'activetoggle', '2017-05-14 12:33:59'),
('505ebca6-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertdelete', '2017-05-14 12:33:59'),
('5061fdc5-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertinsertupdate', '2017-05-14 12:33:59'),
('50651b83-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertinsertupdateaction', '2017-05-14 12:33:59'),
('50671ab8-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertmanage', '2017-05-14 12:33:59'),
('506a269f-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertpaneldelete', '2017-05-14 12:33:59'),
('506c3b73-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertpanelinsertupdate', '2017-05-14 12:33:59'),
('506f4686-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertpanelinsertupdateaction', '2017-05-14 12:34:00'),
('50714487-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'advertpanelmanage', '2017-05-14 12:34:00'),
('50745037-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'ajaxlist', '2017-05-14 12:34:00'),
('50765d2a-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'applicationsettingdelete', '2017-05-14 12:34:00'),
('50796d00-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'applicationsettinginsertupdate', '2017-05-14 12:34:00'),
('507b88e5-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'applicationsettinginsertupdateaction', '2017-05-14 12:34:00'),
('507e83b5-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'applicationsettingmanage', '2017-05-14 12:34:00'),
('508085a8-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'data-table', '2017-05-14 12:34:00'),
('508395d8-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'gridtextupdate', '2017-05-14 12:34:00'),
('50859b73-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'home', '2017-05-14 12:34:00'),
('5088ac50-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'imagestorebrowser', '2017-05-14 12:34:00'),
('508ab269-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'login', '2017-05-14 12:34:00'),
('508dc107-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'loginaction', '2017-05-14 12:34:00'),
('508fc8c7-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'logout', '2017-05-14 12:34:00'),
('5092ea5e-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'menudelete', '2017-05-14 12:34:00'),
('5094e023-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'menuinsertupdate', '2017-05-14 12:34:00'),
('5097eee5-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'menuinsertupdateaction', '2017-05-14 12:34:00'),
('5099ff97-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'menumanage', '2017-05-14 12:34:00'),
('509d0b14-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'passwordcreate', '2017-05-14 12:34:00'),
('509f0f3f-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'passwordcreateaction', '2017-05-14 12:34:00'),
('50a21ced-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'passwordrecover', '2017-05-14 12:34:00'),
('50a42ca2-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'passwordrecoveraction', '2017-05-14 12:34:00'),
('50a74858-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'passwordreset', '2017-05-14 12:34:00'),
('50a94d9d-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'passwordresetupdate', '2017-05-14 12:34:00'),
('50ac467f-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'plupload_upload', '2017-05-14 12:34:00'),
('50ae518e-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'rolepermission', '2017-05-14 12:34:00'),
('50b15c6a-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'rolepermissionload', '2017-05-14 12:34:00'),
('50b36c6c-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'rolepermissionupdate', '2017-05-14 12:34:00'),
('50b67cd2-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'signup', '2017-05-14 12:34:00'),
('50b88730-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'signupaction', '2017-05-14 12:34:00'),
('50bb8cd6-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'signupconfirm', '2017-05-14 12:34:00'),
('50bd94f0-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'staticcontentedit', '2017-05-14 12:34:00'),
('50c0a550-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'staticcontenteditaction', '2017-05-14 12:34:00'),
('50c2a9b1-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'userdelete', '2017-05-14 12:34:00'),
('50c5bc1c-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'userinsertupdate', '2017-05-14 12:34:00'),
('50c7bff6-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'userinsertupdateaction', '2017-05-14 12:34:00'),
('50cad180-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'userloadbytype', '2017-05-14 12:34:00'),
('50ccd6b2-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'usermanage', '2017-05-14 12:34:00'),
('50cfeaa4-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'userprofile', '2017-05-14 12:34:00'),
('50d1ef58-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'userprofileupdate', '2017-05-14 12:34:00'),
('50d501b0-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'usertypedelete', '2017-05-14 12:34:00'),
('50d7083c-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'usertypeinsertupdate', '2017-05-14 12:34:00'),
('50da25c0-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'usertypeinsertupdateaction', '2017-05-14 12:34:00'),
('50df28cd-386f-11e7-ae18-fcaa1424fffa', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', '', 'usertypemanage', '2017-05-14 12:34:00'),
('58499f83-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'activetoggle', '2017-05-14 12:34:13'),
('584d6ead-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertdelete', '2017-05-14 12:34:13'),
('584f6f6f-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertinsertupdate', '2017-05-14 12:34:13'),
('58514dd3-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertinsertupdateaction', '2017-05-14 12:34:13'),
('5853422e-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertmanage', '2017-05-14 12:34:13'),
('58551c70-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertpaneldelete', '2017-05-14 12:34:13'),
('58571293-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertpanelinsertupdate', '2017-05-14 12:34:13'),
('5858dd45-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertpanelinsertupdateaction', '2017-05-14 12:34:13'),
('585ae6e9-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'advertpanelmanage', '2017-05-14 12:34:13'),
('585cb484-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'ajaxlist', '2017-05-14 12:34:13'),
('585ebcce-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'data-table', '2017-05-14 12:34:13'),
('5860815d-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'gridtextupdate', '2017-05-14 12:34:13'),
('5862848a-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'home', '2017-05-14 12:34:13'),
('58645177-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'imagestorebrowser', '2017-05-14 12:34:13'),
('586665f5-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'login', '2017-05-14 12:34:13'),
('58683950-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'loginaction', '2017-05-14 12:34:13'),
('586a2ea5-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'logout', '2017-05-14 12:34:13'),
('586bf2ea-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'passwordcreate', '2017-05-14 12:34:13'),
('586df62b-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'passwordcreateaction', '2017-05-14 12:34:13'),
('586fd137-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'passwordrecover', '2017-05-14 12:34:13'),
('5871d24c-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'passwordrecoveraction', '2017-05-14 12:34:13'),
('58739547-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'passwordreset', '2017-05-14 12:34:13'),
('58759b13-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'passwordresetupdate', '2017-05-14 12:34:13'),
('587764f4-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'plupload_upload', '2017-05-14 12:34:13'),
('58798ad0-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'signup', '2017-05-14 12:34:13'),
('587b37f4-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'signupaction', '2017-05-14 12:34:13'),
('587d3a67-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'signupconfirm', '2017-05-14 12:34:13'),
('587f0778-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'staticcontentedit', '2017-05-14 12:34:13'),
('5881151f-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'staticcontenteditaction', '2017-05-14 12:34:13'),
('5882dcb2-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'userdelete', '2017-05-14 12:34:13'),
('5884e51c-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'userinsertupdate', '2017-05-14 12:34:13'),
('5886b321-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'userinsertupdateaction', '2017-05-14 12:34:13'),
('5888ad9f-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'usermanage', '2017-05-14 12:34:13'),
('588a802d-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'userprofile', '2017-05-14 12:34:13'),
('588c7c79-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'userprofileupdate', '2017-05-14 12:34:13'),
('588e4ea6-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'usertypedelete', '2017-05-14 12:34:13'),
('589053f2-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'usertypeinsertupdate', '2017-05-14 12:34:13'),
('58921fe2-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'usertypeinsertupdateaction', '2017-05-14 12:34:13'),
('58942547-386f-11e7-ae18-fcaa1424fffa', 'A7598650-2674-1770-1391-F5DF64B73540', '', 'usertypemanage', '2017-05-14 12:34:13'),
('5fa9e4c2-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'activetoggle', '2017-05-14 12:34:25'),
('5fabe011-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'data-table', '2017-05-14 12:34:25'),
('5fadbd2b-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'home', '2017-05-14 12:34:25'),
('5fafa1dd-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'login', '2017-05-14 12:34:25'),
('5fb1902e-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'loginaction', '2017-05-14 12:34:25'),
('5fb37b5a-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'logout', '2017-05-14 12:34:25'),
('5fb55a78-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'passwordcreate', '2017-05-14 12:34:25'),
('5fb749a3-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'passwordcreateaction', '2017-05-14 12:34:25'),
('5fb9521a-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'passwordrecover', '2017-05-14 12:34:25'),
('5fbb3d93-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'passwordrecoveraction', '2017-05-14 12:34:25'),
('5fbcfedd-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'passwordreset', '2017-05-14 12:34:25'),
('5fbee4e6-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'passwordresetupdate', '2017-05-14 12:34:25'),
('5fc0d2c0-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'signup', '2017-05-14 12:34:25'),
('5fc2b7a8-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'signupaction', '2017-05-14 12:34:25'),
('5fc4a46b-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'signupconfirm', '2017-05-14 12:34:25'),
('5fc68bb8-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'staticcontentedit', '2017-05-14 12:34:25'),
('5fcbca7c-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'staticcontenteditaction', '2017-05-14 12:34:25'),
('5fced1d6-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'userprofile', '2017-05-14 12:34:25'),
('5fd0c7b2-386f-11e7-ae18-fcaa1424fffa', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 'userprofileupdate', '2017-05-14 12:34:25'),
('7366d8be-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'activetoggle', '2016-01-03 10:28:17'),
('736a1ad8-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'ajax.area', '2016-01-03 10:28:17'),
('736e7dca-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'ajaxlist', '2016-01-03 10:28:17'),
('7371bee0-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'brick', '2016-01-03 10:28:17'),
('73761980-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'contentdelete', '2016-01-03 10:28:17'),
('737961ce-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'contentinsertupdate', '2016-01-03 10:28:17'),
('7381b01b-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'contentinsertupdateaction', '2016-01-03 10:28:17'),
('73861e1d-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'contentmanage', '2016-01-03 10:28:17'),
('738dc9d0-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'flexigrid', '2016-01-03 10:28:17'),
('73956257-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'home', '2016-01-03 10:28:17'),
('7399bd38-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'login', '2016-01-03 10:28:17'),
('739d0394-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'loginaction', '2016-01-03 10:28:17'),
('73a15b2c-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'logout', '2016-01-03 10:28:17'),
('73a49d60-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'passwordcreate', '2016-01-03 10:28:17'),
('73a8ff4e-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'passwordcreateaction', '2016-01-03 10:28:17'),
('73ac412b-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'passwordrecover', '2016-01-03 10:28:17'),
('73b09f8d-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'passwordrecoveraction', '2016-01-03 10:28:17'),
('73b3e25e-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'passwordreset', '2016-01-03 10:28:17'),
('73b84070-b1d2-11e5-818f-fcaa1424fffa', '7f4ec281-3b60-11e5-b226-b82a72d5221f', '', 'passwordresetupdate', '2016-01-03 10:28:17'),
('7c0c0f46-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'brick', '2016-01-03 10:28:31'),
('7c12a6f6-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'home', '2016-01-03 10:28:31'),
('7c1bea60-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'login', '2016-01-03 10:28:32'),
('7c2387ce-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'loginaction', '2016-01-03 10:28:32'),
('7c26cff5-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'passwordcreate', '2016-01-03 10:28:32'),
('7c2b218d-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'passwordcreateaction', '2016-01-03 10:28:32'),
('7c2e685d-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'passwordrecover', '2016-01-03 10:28:32'),
('7c32c43e-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'passwordrecoveraction', '2016-01-03 10:28:32'),
('7c360853-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'paymentlander', '2016-01-03 10:28:32'),
('7c3a63da-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'paypalipn', '2016-01-03 10:28:32'),
('7c3da74e-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'signup', '2016-01-03 10:28:32'),
('7c420c6e-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'signupaction', '2016-01-03 10:28:32'),
('7c454f7f-b1d2-11e5-818f-fcaa1424fffa', '4b570246-e7a8-1029-9be9-4fc904b88e9e', '', 'signupconfirm', '2016-01-03 10:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaticcontent`
--

DROP TABLE IF EXISTS `tblstaticcontent`;
CREATE TABLE IF NOT EXISTS `tblstaticcontent` (
  `StaticContentUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `StaticContentName` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `StaticContentTitle` varchar(255) NOT NULL,
  `StaticContent` longtext CHARACTER SET latin1 NOT NULL,
  `LanguageUUID` varchar(255) NOT NULL,
  `StaticContentPicture` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `StaticContentIsActive` int(11) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`StaticContentUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstaticcontent`
--

INSERT INTO `tblstaticcontent` (`StaticContentUUID`, `StaticContentName`, `StaticContentTitle`, `StaticContent`, `LanguageUUID`, `StaticContentPicture`, `StaticContentIsActive`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
('{EA19EFA1-70B9-4282-A061-E55E8CEEBC57}', 'Home', '', '<div id=\"three-container\"></div>', 'ae0a2e74-03ca-102a-b78c-b9cfe0f62f08', '', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-05-17 12:37:19', '2020-05-11 10:46:37', '2020-05-11 10:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `UserUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserName` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserPassword` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserEmail` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserDescription` text CHARACTER SET latin1 NOT NULL,
  `UserTypeUUID` varchar(255) NOT NULL,
  `UserPicture` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserIsActive` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Street` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `City` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `ZIP` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `State` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `CountryUUID` varchar(255) NOT NULL,
  `PhoneHome` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `PhoneOffice` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `PhoneMobile` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `PhoneDay` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `FAX` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `Website` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `DateBorn` date NOT NULL DEFAULT '0000-00-00',
  `UserRegistrationCode` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserIsRegistered` int(11) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IsParmanent` int(11) NOT NULL DEFAULT '0',
  `UserLastActivity` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`UserUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserUUID`, `UserName`, `UserPassword`, `UserEmail`, `UserDescription`, `UserTypeUUID`, `UserPicture`, `UserIsActive`, `Name`, `Street`, `City`, `ZIP`, `State`, `CountryUUID`, `PhoneHome`, `PhoneOffice`, `PhoneMobile`, `PhoneDay`, `FAX`, `Website`, `DateBorn`, `UserRegistrationCode`, `UserIsRegistered`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`, `IsParmanent`, `UserLastActivity`) VALUES
('A56FD29A-530A-F186-806A-503D1E2CC323', 'Guest', '', 'guest@echo.com', '', '0a09cbd1-e7ac-1029-9be9-4fc904b88e9e', '', 1, 'Guest', '', '', '', '', '4b570454-e7a8-1029-9be9-4fc904b88e9e', '', '', '', '', '', '', '1991-02-04', '', 1, '0', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2006-12-28 16:12:00', '0000-00-00 00:00:00', '2007-02-04 18:03:09', 1, '0000-00-00 00:00:00'),
('0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', 'sadmin', '092c79e8f80e559e404bcf660c48f3522b67aba9ff1484b0367e1a4ddef7431d', 'sadmin@echo.com', '', '0a09d254-e7ac-1029-9be9-4fc904b88e9e', 'c450f272303512d5cd4e3bcfb0cc2bbc_ugibd_logo_msn.gif', 1, 'Super Admin', '', '', '', '', '4b590454-e7a8-1029-9be9-4fc904b88e9e', '', '', '', '', '', '', '1900-07-11', '', 1, '0', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2006-12-28 16:12:00', '2016-08-11 15:19:17', '2016-08-11 15:19:17', 1, '0000-00-00 00:00:00'),
('691D3533-35CB-44E3-32EB-B90258BE9EE7', 'admin', '092c79e8f80e559e404bcf660c48f3522b67aba9ff1484b0367e1a4ddef7431d', 'admin@echo.com', '', 'A7598650-2674-1770-1391-F5DF64B73540', '', 1, 'Administrator', '', '', '', '', '4b570454-e7a8-1029-9be9-4fc904b88e9e', '', '', '', '', '', '', '1978-03-12', '9E53CD07-D41A-AC15-5065-AE725B99F299D57F2D06-2BAE-D320-88E5-B82FBA09D3E7', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-03-12 16:14:42', '2012-09-26 12:29:33', '2012-09-26 12:29:33', 1, '0000-00-00 00:00:00'),
('36FDC192-2E35-4B69-BEF3-8FFBE5AEE7C8', 'member', '092c79e8f80e559e404bcf660c48f3522b67aba9ff1484b0367e1a4ddef7431d', 'user@echo.com', '', 'F5CEC80A-C2EC-4B27-9715-D6875745D8AA', '', 1, 'Member', '', '', '', '', '4b590454-e7a8-1029-9be9-4fc904b88e9e', '', '', '', '', '', '', '2012-06-07', '', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-06-07 10:33:37', '2016-08-11 15:20:20', '2016-08-11 15:20:20', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

DROP TABLE IF EXISTS `tblusertype`;
CREATE TABLE IF NOT EXISTS `tblusertype` (
  `UserTypeUUID` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserTypeName` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserTypeDescription` text CHARACTER SET latin1 NOT NULL,
  `UserTypePicture` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `UserTypeIsActive` int(11) NOT NULL DEFAULT '0',
  `UserUUIDInserted` varchar(50) NOT NULL,
  `UserUUIDUpdated` varchar(50) NOT NULL,
  `UserUUIDLocked` varchar(50) NOT NULL,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`UserTypeUUID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`UserTypeUUID`, `UserTypeName`, `UserTypeDescription`, `UserTypePicture`, `UserTypeIsActive`, `UserUUIDInserted`, `UserUUIDUpdated`, `UserUUIDLocked`, `DateInserted`, `DateUpdated`, `DateLocked`) VALUES
('4b570246-e7a8-1029-9be9-4fc904b88e9e', 'Guest', 'Users have access to public area only without having to log in', '', 1, '0', '0', '0', '2006-12-28 16:12:00', '0000-00-00 00:00:00', '2006-12-28 16:12:00'),
('0a09d254-e7ac-1029-9be9-4fc904b88e9e', 'Super Admin', 'Users have unrestricted full access to the application', '', 1, '0', '0', '0', '2006-12-28 16:12:00', '0000-00-00 00:00:00', '2006-12-28 16:12:00'),
('A7598650-2674-1770-1391-F5DF64B73540', 'Admin', '', '', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2007-03-18 16:03:21', '2012-06-07 11:53:02', '2012-06-07 11:53:02'),
('F5CEC80A-C2EC-4B27-9715-D6875745D8AA', 'Member', 'All the member will be here', '', 1, '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0a0a5d38-e7ac-1029-9be9-4fc904b88e9e', '0', '2012-06-07 10:34:14', '2016-02-18 14:52:40', '2016-02-18 14:52:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
