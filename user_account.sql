-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.0.24a-community-nt - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for user
CREATE DATABASE IF NOT EXISTS `user` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `user`;

-- Dumping structure for table user.user_account
CREATE TABLE IF NOT EXISTS `user_account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `address` varchar(50) default NULL,
  `phone` varchar(50) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table user.user_account: ~4 rows (approximately)
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` (`username`, `password`, `fullname`, `email`, `address`, `phone`) VALUES
	('admin@co', 'admin', 'Admin', 'admin@co', 'adminadmin', '081230'),
	('admin@coa', 'aaaa', 'Admin Coa', 'admin@coa', 'awdawdawdawdawdawd', '1051235'),
	('kristian_yosef@yahoo.com', 'anda', 'Yosef Adrian', 'kristian_yosef@yahoo.com', 'awdawdawdawd', '23123'),
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
