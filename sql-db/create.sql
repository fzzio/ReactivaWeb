-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.2.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for reactiva
DROP DATABASE IF EXISTS `reactiva`;
CREATE DATABASE IF NOT EXISTS `reactiva` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `reactiva`;

-- Dumping structure for table reactiva.account
CREATE TABLE IF NOT EXISTS `account` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'md5',
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `last_ip` varchar(45) NOT NULL,
  `last_login` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 for active/0 inactive',
  `id_group` int(11) NOT NULL DEFAULT 5,
  PRIMARY KEY (`id_account`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_account_rbac_group` (`id_group`),
  CONSTRAINT `FK_account_rbac_group` FOREIGN KEY (`id_group`) REFERENCES `rbac_group` (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.game_exercise
CREATE TABLE IF NOT EXISTS `game_exercise` (
  `id_exercise` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `id_limb` int(11) DEFAULT NULL,
  `script_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_exercise`),
  KEY `FK_game_exercise_game_limb` (`id_limb`),
  CONSTRAINT `FK_game_exercise_game_limb` FOREIGN KEY (`id_limb`) REFERENCES `game_limb` (`id_limb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.game_limb
CREATE TABLE IF NOT EXISTS `game_limb` (
  `id_limb` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_limb`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.geo_city
CREATE TABLE IF NOT EXISTS `geo_city` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `id_province` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_city`),
  KEY `FK_geo_city_geo_province` (`id_province`),
  CONSTRAINT `FK_geo_city_geo_province` FOREIGN KEY (`id_province`) REFERENCES `geo_province` (`id_province`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.geo_country
CREATE TABLE IF NOT EXISTS `geo_country` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.geo_province
CREATE TABLE IF NOT EXISTS `geo_province` (
  `id_province` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_province`),
  KEY `FK_geo_province_geo_country` (`id_country`),
  CONSTRAINT `FK_geo_province_geo_country` FOREIGN KEY (`id_country`) REFERENCES `geo_country` (`id_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.log_actions
CREATE TABLE IF NOT EXISTS `log_actions` (
  `id` int(11) NOT NULL,
  `logType` varchar(255) NOT NULL,
  `logMessage` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `custom` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_log_actions_admins` (`user`),
  CONSTRAINT `FK_log_actions_admins` FOREIGN KEY (`user`) REFERENCES `account` (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.patient
CREATE TABLE IF NOT EXISTS `patient` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(10) NOT NULL COMMENT 'CI',
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `born` date NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `cellphone` varchar(50) NOT NULL,
  `adress` text NOT NULL,
  `deleteInfo_ci` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_patient`),
  UNIQUE KEY `ci` (`ci`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.patient_consult
CREATE TABLE IF NOT EXISTS `patient_consult` (
  `id_consult` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) DEFAULT NULL,
  `id_doctor_created` int(11) DEFAULT NULL,
  `id_doctor_attended` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_attended` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  PRIMARY KEY (`id_consult`),
  KEY `FK_patient_consult_patient` (`id_patient`),
  KEY `FK_patient_consult_acc_doctor` (`id_doctor_created`),
  KEY `FK_patient_consult_acc_doctor_2` (`id_doctor_attended`),
  CONSTRAINT `FK_patient_consult_acc_doctor` FOREIGN KEY (`id_doctor_created`) REFERENCES `acc_med` (`id_med`),
  CONSTRAINT `FK_patient_consult_acc_doctor_2` FOREIGN KEY (`id_doctor_attended`) REFERENCES `acc_med` (`id_med`),
  CONSTRAINT `FK_patient_consult_patient` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.patient_therapy
CREATE TABLE IF NOT EXISTS `patient_therapy` (
  `id_therapy` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `id_doctor_created` int(11) NOT NULL COMMENT 'Doctor who assigned appointment',
  `id_med_attended` int(11) DEFAULT NULL COMMENT 'Staff who attended the therapy',
  `eta` datetime NOT NULL COMMENT 'Estimated time to start',
  `etf` datetime NOT NULL COMMENT 'Estimated time to finish',
  `starttime` datetime DEFAULT NULL COMMENT 'If attended, start time',
  `finishtime` datetime DEFAULT NULL COMMENT 'If attended, finish time',
  `comment` text DEFAULT NULL,
  `sendmail` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_therapy`),
  KEY `FK_patient_therapy_patient` (`id_patient`),
  KEY `FK_patient_therapy_acc_med` (`id_doctor_created`),
  KEY `FK_patient_therapy_acc_med_2` (`id_med_attended`),
  CONSTRAINT `FK_patient_therapy_acc_med` FOREIGN KEY (`id_doctor_created`) REFERENCES `acc_med` (`id_med`),
  CONSTRAINT `FK_patient_therapy_acc_med_2` FOREIGN KEY (`id_med_attended`) REFERENCES `acc_med` (`id_med`),
  CONSTRAINT `FK_patient_therapy_patient` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.patient_therapy_exer
CREATE TABLE IF NOT EXISTS `patient_therapy_exer` (
  `id_therapy` int(11) NOT NULL,
  `id_exercise` int(11) NOT NULL,
  `difficulty` int(11) NOT NULL DEFAULT 0,
  `param0` varchar(50) DEFAULT '' COMMENT 'Depends on the ex',
  `param1` varchar(50) DEFAULT '' COMMENT 'Depends on the ex',
  `duration` time DEFAULT '00:00:00',
  PRIMARY KEY (`id_therapy`,`id_exercise`),
  KEY `FK_patient_therapy_exer_game_exercise` (`id_exercise`),
  CONSTRAINT `FK_patient_therapy_exer_game_exercise` FOREIGN KEY (`id_exercise`) REFERENCES `game_exercise` (`id_exercise`),
  CONSTRAINT `FK_patient_therapy_exer_patient_therapy` FOREIGN KEY (`id_therapy`) REFERENCES `patient_therapy` (`id_therapy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.patient_therapy_photo
CREATE TABLE IF NOT EXISTS `patient_therapy_photo` (
  `id_therapy` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `comment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_therapy`,`img`),
  CONSTRAINT `FK_patient_therapy_photo_patient_therapy` FOREIGN KEY (`id_therapy`) REFERENCES `patient_therapy` (`id_therapy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.rbac_group
CREATE TABLE IF NOT EXISTS `rbac_group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='rbac control for admins';

-- Data exporting was unselected.
-- Dumping structure for table reactiva.rbac_group_permission
CREATE TABLE IF NOT EXISTS `rbac_group_permission` (
  `id_group` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  PRIMARY KEY (`id_group`,`id_permission`),
  KEY `FK__rbac_permission` (`id_permission`),
  CONSTRAINT `FK__rbac_group` FOREIGN KEY (`id_group`) REFERENCES `rbac_group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__rbac_permission` FOREIGN KEY (`id_permission`) REFERENCES `rbac_permission` (`id_permission`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table reactiva.rbac_permission
CREATE TABLE IF NOT EXISTS `rbac_permission` (
  `id_permission` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='rbac control for admins';

-- Data exporting was unselected.
-- Dumping structure for table reactiva.web_contact
CREATE TABLE IF NOT EXISTS `web_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
