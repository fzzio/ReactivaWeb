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

-- Dumping data for table reactiva.account: ~1 rows (approximately)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id_account`, `username`, `email`, `password`, `name`, `lastname`, `last_ip`, `last_login`, `status`) VALUES
	(1, 'mvelasco', 'madelyne@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Madelyne', 'Velasco', '', '0000-00-00 00:00:00', 1),
	(2, 'forrala', 'fabricio@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Fabricio', 'Orrala', '127.0.0.1', '0000-00-00 00:00:00', 1);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping data for table reactiva.game_exercise: ~0 rows (approximately)
/*!40000 ALTER TABLE `game_exercise` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_exercise` ENABLE KEYS */;

-- Dumping data for table reactiva.game_limb: ~2 rows (approximately)
/*!40000 ALTER TABLE `game_limb` DISABLE KEYS */;
INSERT INTO `game_limb` (`id_limb`, `name`) VALUES
	(1, 'Brazo'),
	(2, 'Pierna');
/*!40000 ALTER TABLE `game_limb` ENABLE KEYS */;

-- Dumping data for table reactiva.geo_city: ~0 rows (approximately)
/*!40000 ALTER TABLE `geo_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `geo_city` ENABLE KEYS */;

-- Dumping data for table reactiva.geo_country: ~0 rows (approximately)
/*!40000 ALTER TABLE `geo_country` DISABLE KEYS */;
/*!40000 ALTER TABLE `geo_country` ENABLE KEYS */;

-- Dumping data for table reactiva.geo_province: ~0 rows (approximately)
/*!40000 ALTER TABLE `geo_province` DISABLE KEYS */;
/*!40000 ALTER TABLE `geo_province` ENABLE KEYS */;

-- Dumping data for table reactiva.log_actions: ~0 rows (approximately)
/*!40000 ALTER TABLE `log_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_actions` ENABLE KEYS */;

-- Dumping data for table reactiva.patient: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` (`id_patient`, `ci`, `name`, `lastname`, `born`, `gender`, `phone`, `cellphone`, `adress`, `email`) VALUES
	(1, '0926803990', 'Made', 'Velasco Mite', '2017-06-15', 0, '123123', '123123', 'Km 8.5 Via a Daule Cdla Colinas al Sol, Ave 1ra 317 y calle 3ra', 'm_velasco93@live.com');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_consult: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_consult` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_consult` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_therapy` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_therapy` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy_exer: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_therapy_exer` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_therapy_exer` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy_photo: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_therapy_photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_therapy_photo` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_account_group: ~0 rows (approximately)
/*!40000 ALTER TABLE `rbac_account_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `rbac_account_group` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_group: ~5 rows (approximately)
/*!40000 ALTER TABLE `rbac_group` DISABLE KEYS */;
INSERT INTO `rbac_group` (`id_group`, `name`) VALUES
	(1, 'Super Administrator'),
	(2, 'Administrator'),
	(3, 'Staff'),
	(4, 'Doctor'),
	(5, 'Therapist');
/*!40000 ALTER TABLE `rbac_group` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_group_permission: ~90 rows (approximately)
/*!40000 ALTER TABLE `rbac_group_permission` DISABLE KEYS */;
INSERT INTO `rbac_group_permission` (`id_group`, `id_permission`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 11),
	(1, 12),
	(1, 13),
	(1, 14),
	(1, 15),
	(1, 16),
	(1, 17),
	(1, 18),
	(1, 19),
	(1, 20),
	(1, 21),
	(1, 22),
	(1, 23),
	(1, 24),
	(1, 25),
	(1, 26),
	(1, 27),
	(1, 28),
	(1, 29),
	(1, 30),
	(2, 1),
	(2, 2),
	(2, 3),
	(2, 4),
	(2, 5),
	(2, 6),
	(2, 7),
	(2, 8),
	(2, 9),
	(2, 10),
	(2, 11),
	(2, 12),
	(2, 13),
	(2, 14),
	(2, 15),
	(2, 16),
	(2, 17),
	(2, 18),
	(2, 19),
	(2, 20),
	(2, 21),
	(2, 22),
	(2, 23),
	(2, 24),
	(2, 25),
	(2, 26),
	(3, 9),
	(3, 10),
	(3, 11),
	(3, 12),
	(3, 13),
	(3, 14),
	(3, 15),
	(3, 16),
	(3, 17),
	(3, 18),
	(3, 19),
	(3, 20),
	(3, 21),
	(3, 22),
	(4, 9),
	(4, 10),
	(4, 11),
	(4, 12),
	(4, 13),
	(4, 14),
	(4, 15),
	(4, 16),
	(4, 17),
	(4, 18),
	(4, 19),
	(4, 20),
	(4, 21),
	(4, 22),
	(5, 17),
	(5, 18),
	(5, 19),
	(5, 20),
	(5, 21),
	(5, 22);
/*!40000 ALTER TABLE `rbac_group_permission` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_permission: ~30 rows (approximately)
/*!40000 ALTER TABLE `rbac_permission` DISABLE KEYS */;
INSERT INTO `rbac_permission` (`id_permission`, `name`, `description`) VALUES
	(1, 'CRUD account', NULL),
	(2, 'CRUD game_exercise', NULL),
	(3, 'CRUD game_limb', NULL),
	(4, 'CRUD patient', NULL),
	(5, 'CRUD patient_consult', NULL),
	(6, 'CRUD patient_therapy_exer', NULL),
	(7, 'CRUD patient_therapy_phot', NULL),
	(8, 'CRUD web_contact', NULL),
	(9, 'Create patient', NULL),
	(10, 'Edit patient', NULL),
	(11, 'View patients', NULL),
	(12, 'Delete patient', NULL),
	(13, 'Create consult', NULL),
	(14, 'Edit consult', NULL),
	(15, 'Delete consult', NULL),
	(16, 'View consult', NULL),
	(17, 'Add therapy', NULL),
	(18, 'Edit therapy', NULL),
	(19, 'View therapy', NULL),
	(20, 'Start therapy', NULL),
	(21, 'End therapy', NULL),
	(22, 'Delete therapy', NULL),
	(23, 'Add administrator', NULL),
	(24, 'Edit administrator', NULL),
	(25, 'Delete administrator', NULL),
	(26, 'View administrator', NULL),
	(27, 'Add super administrator', NULL),
	(28, 'Edit super administrator', NULL),
	(29, 'Delete super administrator', NULL),
	(30, 'View super administrator', NULL);
/*!40000 ALTER TABLE `rbac_permission` ENABLE KEYS */;

-- Dumping data for table reactiva.web_contact: ~0 rows (approximately)
/*!40000 ALTER TABLE `web_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `web_contact` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
