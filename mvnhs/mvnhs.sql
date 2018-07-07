-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for mvnhs
DROP DATABASE IF EXISTS `mvnhs`;
CREATE DATABASE IF NOT EXISTS `mvnhs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mvnhs`;


-- Dumping structure for table mvnhs.activities
DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `AID` int(11) DEFAULT NULL,
  `name` text,
  `officer` text,
  `description` text,
  `location` text,
  `hours` double DEFAULT NULL,
  `spots` int(11) DEFAULT NULL,
  `closed` tinyint(4) DEFAULT NULL,
  `day` tinyint(4) DEFAULT NULL,
  `month` tinyint(4) DEFAULT NULL,
  `year` smallint(6) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `start_ap` varchar(1) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `end_ap` varchar(1) DEFAULT NULL,
  `done` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mvnhs.activities: ~0 rows (approximately)
DELETE FROM `activities`;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;


-- Dumping structure for table mvnhs.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `hours` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mvnhs.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `fname`, `lname`, `email`, `pass`, `hours`, `admin`) VALUES
	(1, 'Ganesh', 'Valliappan', 'ganeshv757@gmail.com', '126b527edb50d271381aa21c0b08d1b374edb4ca', '5', 1),
	(2, 'Mac', 'Linerven', 'xdtooproxd@gmail.com', '126b527edb50d271381aa21c0b08d1b374edb4ca', '5', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table mvnhs.users_record
DROP TABLE IF EXISTS `users_record`;
CREATE TABLE IF NOT EXISTS `users_record` (
  `ID` int(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `so1` double DEFAULT NULL,
  `so2` double DEFAULT NULL,
  `ju1` double DEFAULT NULL,
  `ju2` double DEFAULT NULL,
  `se1` double DEFAULT NULL,
  `se2` double DEFAULT NULL,
  `start_sem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mvnhs.users_record: ~2 rows (approximately)
DELETE FROM `users_record`;
/*!40000 ALTER TABLE `users_record` DISABLE KEYS */;
INSERT INTO `users_record` (`ID`, `fname`, `lname`, `email`, `so1`, `so2`, `ju1`, `ju2`, `se1`, `se2`, `start_sem`) VALUES
	(1, 'Ganesh', 'Valliappan', 'ganeshv757@gmail.com', 5, 6, 7, 8, 7, 8, 1),
	(2, 'Mac', 'Linerven', 'xdtooproxd@gmail.com', 5, 5, 5, 5, 5, 5, 2);
/*!40000 ALTER TABLE `users_record` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
