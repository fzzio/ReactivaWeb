/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `reactiva`;
CREATE DATABASE IF NOT EXISTS `reactiva` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `reactiva`;

CREATE TABLE IF NOT EXISTS `acc_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'md5',
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `last_ip` varchar(45) NOT NULL,
  `last_login` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 for active/0 inactive',
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `acc_med` (
  `id_med` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'md5',
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `last_ip` varchar(45) NOT NULL,
  `last_login` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 for active/0 inactive',
  PRIMARY KEY (`id_med`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Login session for doctos and nurses/assistants';

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `game_exercise` (
  `id_exercise` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` mediumtext,
  `id_limb` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_exercise`),
  KEY `FK_game_exercise_game_limb` (`id_limb`),
  CONSTRAINT `FK_game_exercise_game_limb` FOREIGN KEY (`id_limb`) REFERENCES `game_limb` (`id_limb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `game_limb` (
  `id_limb` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_limb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `geo_city` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `id_province` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `geo_province` (
  `id_province` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_province`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  CONSTRAINT `FK_log_actions_admins` FOREIGN KEY (`user`) REFERENCES `acc_admin` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `patient_consult` (
  `id_consult` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) DEFAULT NULL,
  `id_doctor_created` int(11) DEFAULT NULL,
  `id_doctor_attended` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_attended` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `next` tinyint(4) DEFAULT NULL COMMENT 'If a next consult is programmed',
  `diagnosis` text,
  PRIMARY KEY (`id_consult`),
  KEY `FK_patient_consult_patient` (`id_patient`),
  KEY `FK_patient_consult_acc_doctor` (`id_doctor_created`),
  KEY `FK_patient_consult_acc_doctor_2` (`id_doctor_attended`),
  CONSTRAINT `FK_patient_consult_acc_doctor` FOREIGN KEY (`id_doctor_created`) REFERENCES `acc_med` (`id_med`),
  CONSTRAINT `FK_patient_consult_acc_doctor_2` FOREIGN KEY (`id_doctor_attended`) REFERENCES `acc_med` (`id_med`),
  CONSTRAINT `FK_patient_consult_patient` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `comment` text,
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

CREATE TABLE IF NOT EXISTS `rbac_admin_group` (
  `id_admin` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`,`id_group`),
  KEY `FK_rbac_admin_group_rbac_group` (`id_group`),
  CONSTRAINT `FK_rbac_admin_group_acc_admin` FOREIGN KEY (`id_admin`) REFERENCES `acc_admin` (`id_admin`),
  CONSTRAINT `FK_rbac_admin_group_rbac_group` FOREIGN KEY (`id_group`) REFERENCES `rbac_group` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rbac_group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='rbac control for admins';

CREATE TABLE IF NOT EXISTS `rbac_group_rol` (
  `id_group` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_group`,`id_rol`),
  KEY `FK_rbac_group_rol_rbac_rol` (`id_rol`),
  CONSTRAINT `FK_rbac_group_rol_rbac_group` FOREIGN KEY (`id_group`) REFERENCES `rbac_group` (`id_group`),
  CONSTRAINT `FK_rbac_group_rol_rbac_rol` FOREIGN KEY (`id_rol`) REFERENCES `rbac_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rbac_med_group` (
  `id_group` int(11) NOT NULL,
  `id_acc` int(11) NOT NULL,
  PRIMARY KEY (`id_group`,`id_acc`),
  KEY `FK_rbac_med_group_acc_med` (`id_acc`),
  CONSTRAINT `FK_rbac_med_group_acc_med` FOREIGN KEY (`id_acc`) REFERENCES `acc_med` (`id_med`),
  CONSTRAINT `FK_rbac_med_group_rbac_group` FOREIGN KEY (`id_group`) REFERENCES `rbac_group` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rbac_permission` (
  `id_permission` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='rbac control for admins';

CREATE TABLE IF NOT EXISTS `rbac_rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rbac_rol_permission` (
  `id_rol` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_permission`),
  KEY `FK_rbac_rol_permission_rbac_permission` (`id_permission`),
  CONSTRAINT `FK_rbac_rol_permission_rbac_permission` FOREIGN KEY (`id_permission`) REFERENCES `rbac_permission` (`id_permission`),
  CONSTRAINT `FK_rbac_rol_permission_rbac_rol` FOREIGN KEY (`id_rol`) REFERENCES `rbac_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `web_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `message` text,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40000 ALTER TABLE `acc_admin` DISABLE KEYS */;
INSERT INTO `acc_admin` (`id_admin`, `username`, `email`, `password`, `name`, `lastname`, `last_ip`, `last_login`, `status`) VALUES
  (1, 'mvelasco', 'madelyne@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Madelyne', 'Velasco', '', '0000-00-00 00:00:00', 1);
/*!40000 ALTER TABLE `acc_admin` ENABLE KEYS */;

/*!40000 ALTER TABLE `acc_med` DISABLE KEYS */;
INSERT INTO `acc_med` (`id_med`, `username`, `email`, `password`, `name`, `lastname`, `last_ip`, `last_login`, `status`) VALUES
  (1, 'mvelasco', 'madelyne@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Madelyne', 'Velasco', '', '0000-00-00 00:00:00', 1);
/*!40000 ALTER TABLE `acc_med` ENABLE KEYS */;

/*!40000 ALTER TABLE `game_exercise` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_exercise` ENABLE KEYS */;

/*!40000 ALTER TABLE `game_limb` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_limb` ENABLE KEYS */;

/*!40000 ALTER TABLE `geo_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `geo_city` ENABLE KEYS */;

/*!40000 ALTER TABLE `geo_province` DISABLE KEYS */;
/*!40000 ALTER TABLE `geo_province` ENABLE KEYS */;

/*!40000 ALTER TABLE `log_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_actions` ENABLE KEYS */;

/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;

/*!40000 ALTER TABLE `patient_consult` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_consult` ENABLE KEYS */;

/*!40000 ALTER TABLE `patient_therapy` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_therapy` ENABLE KEYS */;

/*!40000 ALTER TABLE `rbac_admin_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `rbac_admin_group` ENABLE KEYS */;

/*!40000 ALTER TABLE `rbac_group` DISABLE KEYS */;
INSERT INTO `rbac_group` (`id_group`, `name`) VALUES
  (1, 'Super Administrator'),
  (2, 'Administrator'),
  (3, 'Staff'),
  (4, 'Doctor'),
  (5, 'Therapist');
/*!40000 ALTER TABLE `rbac_group` ENABLE KEYS */;

/*!40000 ALTER TABLE `rbac_group_rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rbac_group_rol` ENABLE KEYS */;

/*!40000 ALTER TABLE `rbac_med_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `rbac_med_group` ENABLE KEYS */;

/*!40000 ALTER TABLE `rbac_permission` DISABLE KEYS */;
INSERT INTO `rbac_permission` (`id_permission`, `name`) VALUES
  (1, 'Acceder CRUD acc_med'),
  (2, 'Acceder CRUD acc_admin');
/*!40000 ALTER TABLE `rbac_permission` ENABLE KEYS */;

/*!40000 ALTER TABLE `rbac_rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rbac_rol` ENABLE KEYS */;

/*!40000 ALTER TABLE `rbac_rol_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `rbac_rol_permission` ENABLE KEYS */;

/*!40000 ALTER TABLE `web_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `web_contact` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
