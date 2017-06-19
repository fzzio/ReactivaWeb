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

-- Dumping data for table reactiva.account: ~4 rows (approximately)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id_account`, `username`, `email`, `password`, `name`, `lastname`, `last_ip`, `last_login`, `status`, `id_group`) VALUES
	(1, 'mvelasco', 'madelyne@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Madelyne', 'Velasco', '', '0000-00-00 00:00:00', 1, 1),
	(2, 'forrala', 'fabricio@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Fabricio', 'Orrala', '127.0.0.1', '0000-00-00 00:00:00', 1, 2),
	(3, 'fndos', 'fndos@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Fernando', 'Sanchez', '', '0000-00-00 00:00:00', 1, 4),
	(4, 'izurita', 'izurita@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Israel', 'Zurita', '', '0000-00-00 00:00:00', 1, 4);
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

-- Dumping data for table reactiva.patient: ~2 rows (approximately)
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` (`id_patient`, `ci`, `name`, `lastname`, `born`, `gender`, `phone`, `cellphone`, `adress`, `deleteInfo_ci`, `email`) VALUES
	(1, '0926803990', 'Made', 'Velasco Mite', '2017-06-15', 0, '123123', '123123', 'Km 8.5 Via a Daule Cdla Colinas al Sol, Ave 1ra 317 y calle 3ra', NULL, 'm_velasco93@live.com'),
	(2, '0926804006', 'Edgar', 'Moreira', '2017-01-19', 1, '042250902', '7596100742', 'Gladstone Terrace, 4', NULL, 'emoreira@gmail.com');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_consult: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_consult` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_consult` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy: ~2 rows (approximately)
/*!40000 ALTER TABLE `patient_therapy` DISABLE KEYS */;
INSERT INTO `patient_therapy` (`id_therapy`, `id_patient`, `date_created`, `id_doctor_created`, `id_doctor_attended`, `eta`, `etf`, `comment`, `sendmail`, `status`) VALUES
	(4, 1, '2017-06-19 00:33:38', 4, 3, '2017-06-19 00:33:52', '2017-06-19 00:33:55', 'qwe', 0, 0),
	(5, 2, '2017-06-19 00:36:26', 3, 4, '2017-06-20 00:00:00', '2017-06-19 00:00:00', '<p>\r\n	qwe</p>\r\n', 0, 0);
/*!40000 ALTER TABLE `patient_therapy` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy_exer: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_therapy_exer` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_therapy_exer` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy_photo: ~0 rows (approximately)
/*!40000 ALTER TABLE `patient_therapy_photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_therapy_photo` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_group: ~5 rows (approximately)
/*!40000 ALTER TABLE `rbac_group` DISABLE KEYS */;
INSERT INTO `rbac_group` (`id_group`, `name`) VALUES
	(1, 'Super administrador'),
	(2, 'Administrador'),
	(3, 'Staff'),
	(4, 'Doctor'),
	(5, 'Terapista');
/*!40000 ALTER TABLE `rbac_group` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_group_permission: ~18 rows (approximately)
/*!40000 ALTER TABLE `rbac_group_permission` DISABLE KEYS */;
INSERT INTO `rbac_group_permission` (`id_group`, `id_permission`) VALUES
	(1, 1),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(2, 2),
	(2, 3),
	(2, 4),
	(2, 5),
	(2, 6),
	(2, 7),
	(2, 8),
	(2, 9),
	(2, 10);
/*!40000 ALTER TABLE `rbac_group_permission` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_permission: ~24 rows (approximately)
/*!40000 ALTER TABLE `rbac_permission` DISABLE KEYS */;
INSERT INTO `rbac_permission` (`id_permission`, `name`, `description`) VALUES
	(1, 'CRUD accounts full', 'Incluye super adminsitrador'),
	(2, 'CRUD accounts', 'Solo hasta administrador'),
	(3, 'View Admin Index', 'Ver el index del administrador'),
	(4, 'CRUD game_exercise', NULL),
	(5, 'CRUD game_limb', NULL),
	(6, 'CRUD patient', NULL),
	(7, 'CRUD patient_consult', NULL),
	(8, 'CRUD patient_therapy_exer', NULL),
	(9, 'CRUD patient_therapy_photo', NULL),
	(10, 'CRUD web_contact', 'Ver los contactos a la página'),
	(11, 'Create patient', NULL),
	(12, 'Edit patient', NULL),
	(13, 'View patients', NULL),
	(14, 'Delete patient', NULL),
	(15, 'Create consult', NULL),
	(16, 'Edit consult', NULL),
	(17, 'Delete consult', NULL),
	(18, 'View consult', NULL),
	(19, 'Add therapy', NULL),
	(20, 'Edit therapy', NULL),
	(21, 'View therapy', NULL),
	(22, 'Start therapy', NULL),
	(23, 'End therapy', NULL),
	(24, 'Delete therapy', NULL);
/*!40000 ALTER TABLE `rbac_permission` ENABLE KEYS */;

-- Dumping data for table reactiva.web_contact: ~1 rows (approximately)
/*!40000 ALTER TABLE `web_contact` DISABLE KEYS */;
INSERT INTO `web_contact` (`id`, `date`, `name`, `message`, `email`) VALUES
	(1, '2017-06-18 22:09:27', 'Fernando Sánchez', 'Hola', 'fndos@gmail.com');
/*!40000 ALTER TABLE `web_contact` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
