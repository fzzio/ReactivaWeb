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

-- Dumping data for table reactiva.account: ~7 rows (approximately)
DELETE FROM `account`;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id_account`, `username`, `email`, `password`, `name`, `lastname`, `last_ip`, `last_login`, `status`, `id_group`) VALUES
	(1, 'mvelasco', 'madelyne@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Madelyne', 'Velasco', '', '0000-00-00 00:00:00', 1, 1),
	(2, 'forrala', 'fabricio@cajanegra.com.ec', '21232f297a57a5a743894a0e4a801fc3', 'Fabricio', 'Orrala', '127.0.0.1', '0000-00-00 00:00:00', 1, 2),
	(3, 'fndos', 'fndos@espol.edu.ec', '21232f297a57a5a743894a0e4a801fc3', 'Fernando', 'Sanchez', '', '0000-00-00 00:00:00', 1, 4),
	(4, 'izurita', 'izurita@espol.edu.ec', '21232f297a57a5a743894a0e4a801fc3', 'Israel', 'Zurita', '', '0000-00-00 00:00:00', 1, 5),
	(5, 'ejrocafuerte', 'ejrocafuerte@espol.edu.ec', '21232f297a57a5a743894a0e4a801fc3', 'Erick', 'Rocafuerte', '', '0000-00-00 00:00:00', 1, 1),
	(6, 'gadacast', 'gadacast@espol.edu.ec', '21232f297a57a5a743894a0e4a801fc3', 'Galo', 'Castillo', '', '0000-00-00 00:00:00', 1, 2),
	(7, 'jcedeno', 'jcedeno@espol.edu.ec', '21232f297a57a5a743894a0e4a801fc3', 'Jorge', 'Cedeño', '', '0000-00-00 00:00:00', 0, 2);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping data for table reactiva.game_exercise: ~1 rows (approximately)
DELETE FROM `game_exercise`;
/*!40000 ALTER TABLE `game_exercise` DISABLE KEYS */;
INSERT INTO `game_exercise` (`id_exercise`, `name`, `description`, `script_name`, `img`) VALUES
	(1, 'Osa perezosa', 'Movimiento de las extremidades superiores', 'osa_brazo.js', NULL),
	(2, 'Escalones', 'Movimiento de las extremidades inferiores', 'ladder.js', NULL);
/*!40000 ALTER TABLE `game_exercise` ENABLE KEYS */;

-- Dumping data for table reactiva.game_exercise_limb: ~0 rows (approximately)
DELETE FROM `game_exercise_limb`;
/*!40000 ALTER TABLE `game_exercise_limb` DISABLE KEYS */;
INSERT INTO `game_exercise_limb` (`id_game`, `id_limb`) VALUES
	(1, 1),
	(1, 2),
	(2, 14),
	(2, 15);
/*!40000 ALTER TABLE `game_exercise_limb` ENABLE KEYS */;

-- Dumping data for table reactiva.game_limb: ~16 rows (approximately)
DELETE FROM `game_limb`;
/*!40000 ALTER TABLE `game_limb` DISABLE KEYS */;
INSERT INTO `game_limb` (`id_limb`, `name`, `icon`, `description`) VALUES
	(1, 'Brazo derecho', '678ff-cuerpo-brazo-der.png', NULL),
	(2, 'Brazo izquierdo', '9a45f-cuerpo-brazo-izq.png', NULL),
	(3, 'Cadera', 'ed2fa-cuerpo-cadera.png', NULL),
	(4, 'Codo derecho', '4d634-cuerpo-codo-der.png', NULL),
	(5, 'Codo izquierdo', '146d9-cuerpo-codo-izq.png', NULL),
	(6, 'Columna', '7532b-cuerpo-columna.png', NULL),
	(7, 'Cuello cabeza', 'd3709-cuerpo-cuello-cabeza.png', NULL),
	(8, 'Espalda', '9aff4-cuerpo-espalda.png', NULL),
	(9, 'Mano derecha', 'a63ab-cuerpo-mano-der.png', NULL),
	(10, 'Mano izquierda', 'ce2c2-cuerpo-mano-izq.png', NULL),
	(11, 'Pie derecho', '3f5a2-cuerpo-pie-der.png', NULL),
	(12, 'Pie izquierdo', '71ec2-cuerpo-pie-izq.png', NULL),
	(13, 'Pierna derecha', '86478-cuerpo-pierna-der.png', NULL),
	(14, 'Pierna izquierda', 'dd53b-cuerpo-pierna-izq.png', NULL),
	(15, 'Talón derecho', 'a50be-cuerpo-talon-der.png', NULL),
	(16, 'Talón izquierdo', 'b75d3-cuerpo-talon-izq.png', NULL);
/*!40000 ALTER TABLE `game_limb` ENABLE KEYS */;

-- Dumping data for table reactiva.log_actions: ~0 rows (approximately)
DELETE FROM `log_actions`;
/*!40000 ALTER TABLE `log_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_actions` ENABLE KEYS */;

-- Dumping data for table reactiva.patient: ~13 rows (approximately)
DELETE FROM `patient`;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` (`id_patient`, `ci`, `name`, `lastname`, `born`, `gender`, `phone`, `cellphone`, `emergency_contact`, `emergency_phone`, `address`, `blood`, `rh`, `allergies`, `allergies_med`, `observations`, `illness`, `img`, `deleteInfo_ci`, `email`) VALUES
	(1, '0926803990', 'Madelyne Carolina', 'Velasco Mite', '1993-04-12', 0, '042875667', '0987643543', 'Victor Hugo Velasco Mite', '0997567453', 'Km 8.5 Vía a Daule Cdla. Colinas al Sol', 'A', '+', 'Alergia al polen', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'm_velasco93@live.com'),
	(2, '0926804006', 'Edgar Daniel', 'Moreira Apolo', '1992-01-19', 1, '0422509032', '0956100742', 'Magdalena Rosa Moreira Apolo', '0988765472', 'Av. Carlos Luis Plaza Dañín y Francisco Boloña', 'B', '+', 'Alergia a los ácaros del polvo', 'Insulina', 'Ninguna', 'Ninguna', NULL, NULL, 'emoreira@gmail.com'),
	(3, '0909033425', 'Fabricio Andrés', 'Orrala Parrales', '1989-06-25', 1, '042254895', '0942254895', 'Julio Antonio Orrala Plúas', '0978768546', 'Av. 25 de Julio y Ernesto Albán', 'A', '-', 'Alergia al polen', 'Insulina', 'Ninguna', 'Ninguna', NULL, NULL, 'fabricio@cajanegra.com.ec'),
	(4, '0907976698', 'Henry Manuel', 'Lomas Sánchez', '1985-04-23', 1, '042876857', '0987654234', 'Mario Johan Mieles Castañeda', '0981254634', 'Av. Victor Emilio Estrada y Av. Las Monjas', 'A', '+', 'Alergia a las picaduras de los insectos', 'Insulina', 'Ninguna', 'Ninguna', NULL, NULL, 'henry@live.com'),
	(5, '0907896609', 'Nicole Rosaura', 'Velasco Espinoza', '1995-02-28', 0, '042678546', '0988765321', 'Carlos Luis Manosalvas Host', '0987645365', 'Km. 25 Vía Perimetral E/ Av. Casuarina y Modesto Luque', 'O', '+', 'Alergia a las picaduras de los insectos', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'nicole@gmail.com'),
	(6, '0909044565', 'Fabricio Antonio', 'Layedra Montoya', '1997-07-25', 1, '042354895', '0985644763', 'Oscar Daniel Moreno Abad', '0984567878', 'Benjamín Carrión s/n y Av. Felipe Pezo', 'A', '+', 'Alergia a los ácaros del polvo', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'flayedra@live.com'),
	(7, '0923783557', 'María Belén', 'Guaranda Guaranda', '1998-06-04', 0, '042789895', '9758647632', 'Ruben Dario Suarez Beltrán', '0987654325', 'Av. Juan Tanca Marengo y Av. Constitución', 'O', '+', 'Alergia a los ácaros del polvo', 'Penicilina', 'Ninguna', 'Ninguna', NULL, NULL, 'mbguaranda@live.com'),
	(8, '0980855678', 'Oswaldo Alberto', 'Salazar Aguilar', '1996-12-05', 1, '042785676', '0987765743', 'José Antonio Viteri Cuenca', '0977623215', 'Urbanización Porto Fino Vía a la Costa C.C. Plaza Colonia', 'O', '+', 'Alergia a las picaduras de los insectos', 'Sulfamidas', 'Ninguna', 'Ninguna', NULL, NULL, 'oaguilar@hotmail.com'),
	(9, '0903066789', 'Viviana Andrea', 'Laurido Aguirre', '1996-12-12', 0, '042361112', '0981265432', 'Ivan Alejandro Mera Maldonado', '0978667311', 'Benjamín Carrión s/n y Av. Felipe Pezo', 'B', '+', 'Alergia al polen', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'vlaurido@hotmail.com'),
	(10, '0873645775', 'Rodrigo Manuel', 'Castro Reyes', '1993-05-30', 1, '042252638', '0976578243', 'Juan Elias Alvarado Triana', '0987566221', 'Urbanización Porto Fino Vía a la Costa C.C. Plaza Colonia', 'AB', '+', 'Alergia a los ácaros del polvo', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'rodfcast@live.com'),
	(11, '0909033426', 'María Angélica', 'Velasco Reyes', '1996-05-25', 0, '042889765', '0988765672', 'Julian Erick Adams Escobar', '0997654325', 'Av. Francisco de Orellana y Av. Guillermo Pareja Local', 'O', '+', 'Alergia a los ácaros del polvo', 'Penicilina', 'Ninguna', 'Ninguna', NULL, NULL, 'mbguaranda@hotmail.com'),
	(12, '0873645778', 'José Luis', 'Masson Martinez', '1997-12-24', 1, '042556889', '0997688574', 'Joselín Carolina Durán Sánchez', '0978765584', 'Av. Victor Emilio Estrada y Av. Las Monjas', 'O', '+', 'Alergia a los ácaros del polvo', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'jlmasson@hotmail.com'),
	(13, '0920142049', 'Gustavo Andrés', 'Palacios Rosado', '1994-08-20', 1, '042128675', '0978765221', 'Jorge Javier Sánchez Plúas', '0987635477', 'Km. 25 Vía Perimetral E/ Av. Casuarina y Modesto Luque', 'A', '-', 'Alergia al polen', 'Penicilina', 'Ninguna', 'Ninguna', NULL, NULL, 'gross@gmail.com'),
	(14, '0911168680', 'Nadia Lucía', 'Pezantes Romero', '1995-12-24', 0, '042788224', '0911172332', 'José Gabriel Cedeño Vargas', '0966755889', 'Av. 25 de Julio S/N', 'O', '+', 'Alergia al polen', 'Penicilina', 'Ninguna', 'Ninguna', NULL, NULL, 'npezantes@gmail.com'),
	(15, '0915162549', 'Ángel Orlando', 'Peña García', '1982-12-24', 1, '042998667', '0988765421', 'Edisón André Mora Cazar', '0972165443', 'Av. Francisco de Orellana y Av. Guillermo Pareja Local', 'O', '+', 'Alergia a las picaduras de los insectos', 'Sulfamidas', 'Ninguna', 'Ninguna', NULL, NULL, 'aorlando@live.com'),
	(16, '0901752832', 'Erasmo Israel', 'Pezantes Montero', '1991-12-24', 1, '042768889', '0981152632', 'Ricardo Raúl Ponce Sánchez', '0975665773', 'Av. Daule Km. 9.5 diagonal al Fuerte Huancavilca', 'B', '+', 'Alergia a los ácaros del polvo', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'ipezantes@gmail.com'),
	(17, '0912474079', 'Julia Acela', 'Espinoza Puertas', '1979-12-24', 0, '042118234', '0981542112', 'Kively Jenifer Chabla Rugel', '0921776872', 'Av. Francisco de Orellana y Av. Guillermo Pareja Local A16', 'O', '+', 'Alergia al polen', 'Sulfamidas', 'Ninguna', 'Ninguna', NULL, NULL, 'jespinoza@gmail.com'),
	(18, '0912474087', 'Jonathan Andrew', 'Allen Lertora', '1972-12-24', 1, '042989117', '0987654356', 'Carlos David Maridueña Bodero', '0917678871', 'Av. 25 de Julio S/N. Centro Comercial Riocentro Sur, local 1.', 'B', '+', 'Alergia al polen', 'Sulfamidas', 'Ninguna', 'Ninguna', NULL, NULL, 'jallen@live.com'),
	(19, '0908903230', 'Jorgue Enrique', 'Alvarado Macías', '1961-12-24', 1, '042778117', '0986544372', 'Kelly Ariana Cedeño Hidalgo', '0989887646', 'Urbanización Porto Fino Vía a la Costa C.C. Plaza Colonia', 'A', '+', 'Alergia al polen', 'Sulfamidas', 'Ninguna', 'Ninguna', NULL, NULL, 'jalvarado@live.com'),
	(20, '0917778581', 'Michelle Gabriela', 'Espinoza Martinez', '1995-12-24', 0, '042776894', '0998346578', 'Nicole Denisse Zambrano Ramirez', '0917625536', 'Av. Carlos Luis Plaza Dañín y Francisco Boloña', 'AB', '+', 'Alergia a las picaduras de los insectos', 'Anticonvulsivos', 'Ninguna', 'Ninguna', NULL, NULL, 'gespinoza@gmail.com');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_consult: ~3 rows (approximately)
DELETE FROM `patient_consult`;
/*!40000 ALTER TABLE `patient_consult` DISABLE KEYS */;
INSERT INTO `patient_consult` (`id_consult`, `id_patient`, `id_doctor_created`, `id_doctor_attended`, `date_created`, `date_planned`, `date_attended`, `status`, `diagnosis`, `observations`) VALUES
	(1, 1, 3, 3, '2017-08-19 22:15:12', '2017-08-20 08:15:00', '2017-08-20 08:20:00', 2, 'Vitíligo', 'Enfermedad en la piel'),
	(2, 2, 3, 3, '2017-08-20 22:20:11', '2017-08-21 08:15:00', '2017-08-21 08:20:00', 2, 'Fisura en la rodilla izquierda', 'Indica fuerte dolor en la rodilla izquierda'),
	(3, 3, 3, 3, '2017-08-21 22:24:59', '2017-08-22 08:15:00', '2017-08-22 08:20:00', 2, 'Dolor muscular', 'El dolor lleva una semana'),
	(4, 4, 3, 3, '2017-08-22 22:31:45', '2017-08-23 08:15:00', '2017-08-23 08:20:00', 2, 'Mano derecha fracturada', 'Fuerte dolor en la mano derecha'),
	(5, 5, 3, 3, '2017-08-23 22:42:43', '2017-08-24 08:15:00', '2017-08-24 08:20:00', 2, 'Esguince grado I', 'Le duele cuando respira'),
	(6, 6, 3, 3, '2017-08-24 23:12:44', '2017-08-25 08:15:00', '2017-08-25 08:20:00', 2, 'Calambre muscular', 'Generado por la falta de potasio'),
	(7, 7, 3, 3, '2017-08-25 23:15:19', '2017-08-26 08:15:00', '2017-08-26 08:20:00', 2, 'Sobrepeso', 'Le duelen las rodillas'),
	(8, 8, 3, 3, '2017-08-26 23:17:22', '2017-08-27 08:15:00', '2017-08-27 08:20:00', 2, 'Muñeca fracturada', 'Hueso resentido'),
	(9, 9, 3, 3, '2017-08-27 23:19:21', '2017-08-28 08:15:00', '2017-08-28 08:20:00', 2, 'Rodilla fisurada', 'Coloracion de la piel morada'),
	(10, 10, 3, 3, '2017-08-28 22:15:12', '2017-08-29 08:15:00', '2017-08-29 08:20:00', 2, 'Estiramiento de tendón', 'No puede mover mucho las extremidades superiores'),
	(11, 11, 3, 3, '2017-08-29 22:20:11', '2017-08-30 08:15:00', '2017-08-30 08:20:00', 2, 'Inflamacion del músculo', 'Esta hinchado'),
	(12, 12, 3, 3, '2017-08-30 22:24:59', '2017-08-31 08:15:00', '2017-08-31 08:20:00', 2, 'Derivado a un especialista', 'No se ha identificado la causa del dolor'),
	(13, 13, 3, 3, '2017-08-31 22:31:45', '2017-09-01 08:15:00', '2017-09-01 08:20:00', 2, 'Esguince grado II', 'Tres dias sin terapia'),
	(14, 14, 3, 3, '2017-09-01 22:42:43', '2017-09-02 08:15:00', '2017-09-02 08:20:00', 2, 'Vítíligo', 'La coloración de la piel en la mano ha empeorado'),
	(15, 15, 3, 3, '2017-09-02 23:12:44', '2017-09-03 08:15:00', '2017-09-03 08:20:00', 2, 'Mentón fracturado', 'Protuberancia en el area afectada'),
	(16, 16, 3, 3, '2017-09-03 23:15:19', '2017-09-04 08:15:00', '2017-09-04 08:20:00', 2, 'Derivado a un especialista', 'No se sabe origen del dolor'),
	(17, 17, 3, 3, '2017-09-04 23:17:22', '2017-09-05 08:15:00', '2017-09-05 08:20:00', 2, 'Trauma cervical', 'Tiene varios dias sin bañarse por el dolor'),
	(18, 18, 3, 3, '2017-09-05 23:19:21', '2017-09-06 08:15:00', '2017-09-06 08:20:00', 2, 'Trauma en el codo', 'Necesita reposar durante cada sesión'),
	(19, 19, 3, 3, '2017-09-06 22:15:12', '2017-09-07 08:15:00', '2017-09-07 08:20:00', 2, 'Irritaciòn en la piel', 'Tiene varios dias sin bañarse por la irritación'),
	(20, 20, 3, 3, '2017-09-07 22:20:11', '2017-09-08 08:15:00', '2017-09-08 08:20:00', 2, 'Dolor muscular', 'Se siente adolorido');


	
/*!40000 ALTER TABLE `patient_consult` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_consult_limb: ~4 rows (approximately)
DELETE FROM `patient_consult_limb`;
/*!40000 ALTER TABLE `patient_consult_limb` DISABLE KEYS */;
INSERT INTO `patient_consult_limb` (`id_consult`, `id_limb`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 7),
	(8, 8),
	(9, 9),
	(10, 10),
	(11, 11),
	(12, 12),
	(13, 13),
	(14, 14),
	(15, 15),
	(16, 16);
/*!40000 ALTER TABLE `patient_consult_limb` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy: ~3 rows (approximately)
DELETE FROM `patient_therapy`;
/*!40000 ALTER TABLE `patient_therapy` DISABLE KEYS */;
INSERT INTO `patient_therapy` (`id_therapy`, `id_consulta`, `id_patient`, `date_created`, `id_doctor_created`, `id_doctor_attended`, `eta`, `etf`, `comment`, `sendmail`, `status`, `valoration`, `time_elapse`) VALUES
	(1, 1, 1, '2017-09-10 11:33:38', 3, 4, '2017-09-12 14:00:00', '2017-09-12 15:00:00', 'Emperó el dolor en la rodilla', 1, 2, 2, '01:00:00'),
	(2, 2, 2, '2017-09-10 11:36:26', 3, 4, '2017-09-12 15:00:00', '2017-09-12 16:00:00', 'Coloración morada en la piel', 1, 2, 1, '01:00:00'),
	(3, 3, 3, '2017-09-10 11:49:52', 3, 4, '2017-09-12 16:00:00', '2017-09-12 17:00:00', 'No pudo terminar la terapia por el dolor', 1, 2, 2, '01:00:00'),
	(4, 4, 4, '2017-09-10 11:20:52', 3, 4, '2017-09-13 09:00:00', '2017-09-13 10:00:00', 'No sintio dolor en esta sesión', 1, 2, 0, '01:00:00'),
	(5, 5, 5, '2017-09-10 11:22:52', 3, 4, '2017-09-13 10:00:00', '2017-09-13 11:00:00', 'Esta es la última sesión del paciente', 1, 2, 0, '01:00:00'),
	(6, 6, 6, '2017-09-10 11:23:52', 3, NULL, '2017-09-14 07:00:00', '2017-09-14 08:00:00', '', 1, 0, NULL, NULL),
	(7, 7, 7, '2017-09-10 11:25:52', 3, NULL, '2017-09-14 08:15:00', '2017-09-14 08:45:00', '', 1, 0, NULL, NULL),
	(8, 8, 8, '2017-09-10 11:26:52', 3, NULL, '2017-09-14 09:00:00', '2017-09-14 10:00:00', '', 1, 0, NULL, NULL),
	(9, 9, 9, '2017-09-10 11:29:52', 3, NULL, '2017-09-14 10:15:00', '2017-09-14 10:45:00', '', 1, 0, NULL, NULL),
	(10, 1, 1, '2017-09-10 11:31:52', 3, NULL, '2017-09-15 07:15:00', '2017-09-15 07:45:00', '', 1, 0, NULL, NULL),
	(11, 2, 2, '2017-09-10 11:32:52', 3, NULL, '2017-09-15 08:00:00', '2017-09-15 08:30:00', '', 1, 0, NULL, NULL),
	(12, 3, 3, '2017-09-10 11:36:52', 3, NULL, '2017-09-15 09:00:00', '2017-09-15 10:00:00', '', 1, 0, NULL, NULL),
	(13, 4, 4, '2017-09-10 11:42:52', 3, NULL, '2017-09-15 10:15:00', '2017-09-15 11:15:00', '', 1, 0, NULL, NULL),
	(14, 5, 5, '2017-09-10 11:44:52', 3, NULL, '2017-09-15 11:30:00', '2017-09-15 12:00:00', '', 1, 0, NULL, NULL),
	(15, 6, 6, '2017-09-10 11:23:52', 3, NULL, '2017-09-15 12:15:00', '2017-09-15 13:15:00', '', 1, 0, NULL, NULL),
	(16, 7, 7, '2017-09-10 11:25:52', 3, NULL, '2017-09-15 13:30:00', '2017-09-15 14:00:00', '', 1, 0, NULL, NULL),
	(17, 8, 8, '2017-09-10 11:26:52', 3, NULL, '2017-09-15 14:15:00', '2017-09-15 14:45:00', '', 1, 0, NULL, NULL),
	(18, 9, 9, '2017-09-10 11:29:52', 3, NULL, '2017-09-15 15:00:00', '2017-09-15 15:50:00', '', 1, 0, NULL, NULL),
	(19, 10, 10, '2017-09-10 11:31:52', 3, NULL, '2017-09-15 16:00:00', '2017-09-15 17:00:00', '', 1, 0, NULL, NULL),
	(20, 11, 11, '2017-09-10 11:32:52', 3, NULL, '2017-09-16 09:00:00', '2017-09-16 09:45:00', '', 1, 0, NULL, NULL),
	(21, 12, 12, '2017-09-10 11:36:52', 3, NULL, '2017-09-16 10:15:00', '2017-09-16 10:45:00', '', 1, 0, NULL, NULL),
	(22, 13, 13, '2017-09-10 11:42:52', 3, NULL, '2017-09-16 11:00:00', '2017-09-16 11:30:00', '', 1, 0, NULL, NULL),
	(23, 14, 14, '2017-09-10 11:44:52', 3, NULL, '2017-09-16 12:00:00', '2017-09-16 12:30:00', '', 1, 0, NULL, NULL),
	(24, 15, 15, '2017-09-10 11:23:52', 3, NULL, '2017-09-16 13:00:00', '2017-09-16 13:45:00', '', 1, 0, NULL, NULL),
	(25, 16, 16, '2017-09-10 11:25:52', 3, NULL, '2017-09-16 14:00:00', '2017-09-16 15:00:00', '', 1, 0, NULL, NULL),
	(26, 17, 17, '2017-09-10 11:26:52', 3, NULL, '2017-09-16 15:15:00', '2017-09-16 15:45:00', '', 1, 0, NULL, NULL),
	(27, 18, 18, '2017-09-10 11:29:52', 3, NULL, '2017-09-16 16:00:00', '2017-09-16 16:45:00', '', 1, 0, NULL, NULL),
	(28, 19, 19, '2017-09-10 11:31:52', 3, NULL, '2017-09-16 17:00:00', '2017-09-16 17:30:00', '', 1, 0, NULL, NULL),
	(29, 20, 20, '2017-09-10 11:32:52', 3, NULL, '2017-09-16 17:45:00', '2017-09-16 18:15:00', '', 1, 0, NULL, NULL),
	(30, 10, 10, '2017-09-10 11:36:52', 3, NULL, '2017-09-16 18:30:00', '2017-09-16 19:00:00', '', 1, 0, NULL, NULL),
	(31, 11, 11, '2017-09-10 11:42:52', 3, NULL, '2017-09-18 12:00:00', '2017-09-18 12:30:00', '', 1, 0, NULL, NULL),
	(32, 12, 12, '2017-09-10 11:44:52', 3, NULL, '2017-09-18 16:00:00', '2017-09-18 17:00:00', '', 1, 0, NULL, NULL),
	(33, 13, 13, '2017-09-10 11:32:52', 3, NULL, '2017-09-19 16:00:00', '2017-09-19 16:00:00', '', 1, 0, NULL, NULL),
	(34, 14, 14, '2017-09-10 11:36:52', 3, NULL, '2017-09-19 16:00:00', '2017-09-19 16:00:00', '', 1, 0, NULL, NULL),
	(35, 15, 15, '2017-09-10 11:42:52', 3, NULL, '2017-09-19 09:00:00', '2017-09-19 09:50:00', '', 1, 0, NULL, NULL),
	(36, 16, 16, '2017-09-10 11:44:52', 3, NULL, '2017-09-19 10:00:00', '2017-09-19 10:50:00', '', 1, 0, NULL, NULL),
	(37, 17, 17, '2017-09-10 11:23:52', 3, NULL, '2017-09-19 11:00:00', '2017-09-19 11:50:00', '', 1, 0, NULL, NULL),
	(38, 18, 18, '2017-09-10 11:25:52', 3, NULL, '2017-09-19 12:00:00', '2017-09-19 12:50:00', '', 1, 0, NULL, NULL),
	(39, 19, 19, '2017-09-10 11:26:52', 3, NULL, '2017-09-19 13:00:00', '2017-09-19 13:50:00', '', 1, 0, NULL, NULL),
	(40, 20, 20, '2017-09-10 11:29:52', 3, NULL, '2017-09-19 14:00:00', '2017-09-19 14:50:00', '', 1, 0, NULL, NULL),
	(41, 10, 10, '2017-09-10 11:31:52', 3, NULL, '2017-09-21 16:00:00', '2017-09-21 17:00:00', '', 1, 0, NULL, NULL),
	(42, 11, 11, '2017-09-10 11:32:52', 3, NULL, '2017-09-22 07:00:00', '2017-09-22 08:00:00', '', 1, 0, NULL, NULL),
	(43, 12, 12, '2017-09-10 11:36:52', 3, NULL, '2017-09-22 09:00:00', '2017-09-22 10:00:00', '', 1, 0, NULL, NULL),
	(44, 13, 13, '2017-09-10 11:42:52', 3, NULL, '2017-09-22 13:00:00', '2017-09-22 14:00:00', '', 1, 0, NULL, NULL),
	(45, 14, 14, '2017-09-10 11:44:52', 3, NULL, '2017-09-22 14:15:00', '2017-09-22 14:45:00', '', 1, 0, NULL, NULL),
	(47, 15, 15, '2017-09-10 11:32:52', 3, NULL, '2017-09-22 16:00:00', '2017-09-22 16:50:00', '', 1, 0, NULL, NULL),
	(48, 16, 16, '2017-09-10 11:36:52', 3, NULL, '2017-09-26 08:00:00', '2017-09-26 09:00:00', '', 1, 0, NULL, NULL),
	(49, 17, 17, '2017-09-10 11:42:52', 3, NULL, '2017-09-28 09:00:00', '2017-09-28 09:50:00', '', 1, 0, NULL, NULL),
	(50, 10, 10, '2017-09-10 11:31:52', 3, NULL, '2017-09-28 10:00:00', '2017-09-28 10:50:00', '', 1, 0, NULL, NULL),
	(51, 11, 11, '2017-09-10 11:32:52', 3, NULL, '2017-09-28 11:00:00', '2017-09-28 11:50:00', '', 1, 0, NULL, NULL),
	(52, 12, 12, '2017-09-10 11:36:52', 3, NULL, '2017-09-28 12:00:00', '2017-09-28 12:50:00', '', 1, 0, NULL, NULL),
	(53, 13, 13, '2017-09-10 11:42:52', 3, NULL, '2017-09-28 13:00:00', '2017-09-28 13:50:00', '', 1, 0, NULL, NULL),
	(54, 14, 14, '2017-09-10 11:44:52', 3, NULL, '2017-09-28 14:00:00', '2017-09-28 14:50:00', '', 1, 0, NULL, NULL),
	(55, 15, 15, '2017-09-10 11:32:52', 3, NULL, '2017-09-28 15:00:00', '2017-09-28 15:50:00', '', 1, 0, NULL, NULL),
	(56, 16, 16, '2017-09-10 11:36:52', 3, NULL, '2017-09-28 16:00:00', '2017-09-28 16:50:00', '', 1, 0, NULL, NULL),
	(57, 17, 17, '2017-09-10 11:42:52', 3, NULL, '2017-09-30 12:00:00', '2017-09-30 13:00:00', '', 1, 0, NULL, NULL),
	(58, 18, 18, '2017-09-10 11:36:52', 3, NULL, '2017-09-30 14:00:00', '2017-09-30 15:00:00', '', 1, 0, NULL, NULL),
	(59, 19, 19, '2017-09-10 11:42:52', 3, NULL, '2017-09-30 15:10:00', '2017-09-30 15:50:00', '', 1, 0, NULL, NULL),
	(60, 20, 20, '2017-09-10 11:49:52', 3, NULL, '2017-09-30 16:00:00', '2017-09-30 17:00:00', '', 1, 0, NULL, NULL);
/*!40000 ALTER TABLE `patient_therapy` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy_comment: ~0 rows (approximately)
DELETE FROM `patient_therapy_comment`;
/*!40000 ALTER TABLE `patient_therapy_comment` DISABLE KEYS */;
INSERT INTO `patient_therapy_comment` (`id_therapy`, `date`, `msg`) VALUES
	(1, '2017-09-12 14:19:22', 'Ha mejorado considerablemente');
/*!40000 ALTER TABLE `patient_therapy_comment` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy_exer: ~0 rows (approximately)
DELETE FROM `patient_therapy_exer`;
/*!40000 ALTER TABLE `patient_therapy_exer` DISABLE KEYS */;
INSERT INTO `patient_therapy_exer` (`id_therapy`, `id_exercise`, `difficulty`, `param0`, `param1`, `duration`) VALUES
	(1, 1, 0, NULL, NULL, '01:00:00'),
	(2, 1, 1, NULL, NULL, '01:00:00'),
	(3, 1, 2, NULL, NULL, '01:00:00'),
	(4, 2, 1, NULL, NULL, '01:00:00'),
	(5, 2, 2, NULL, NULL, '01:00:00');
/*!40000 ALTER TABLE `patient_therapy_exer` ENABLE KEYS */;

-- Dumping data for table reactiva.patient_therapy_photo: ~0 rows (approximately)
DELETE FROM `patient_therapy_photo`;
/*!40000 ALTER TABLE `patient_therapy_photo` DISABLE KEYS */;
INSERT INTO `patient_therapy_photo` (`id_therapy`, `date`, `img`, `comment`) VALUES
	(1, '2017-09-12 14:15:00', 'brazo-izquierdo.jpg', 'Le duele el brazo izquierdo');
/*!40000 ALTER TABLE `patient_therapy_photo` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_group: ~5 rows (approximately)
DELETE FROM `rbac_group`;
/*!40000 ALTER TABLE `rbac_group` DISABLE KEYS */;
INSERT INTO `rbac_group` (`id_group`, `name`) VALUES
	(1, 'Super administrador'),
	(2, 'Administrador'),
	(3, 'Staff'),
	(4, 'Doctor'),
	(5, 'Terapista');
/*!40000 ALTER TABLE `rbac_group` ENABLE KEYS */;

-- Dumping data for table reactiva.rbac_group_permission: ~16 rows (approximately)
DELETE FROM `rbac_group_permission`;
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
DELETE FROM `rbac_permission`;
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

-- Dumping data for table reactiva.web_contact: ~0 rows (approximately)
DELETE FROM `web_contact`;
/*!40000 ALTER TABLE `web_contact` DISABLE KEYS */;
INSERT INTO `web_contact` (`id`, `date`, `name`, `message`, `email`) VALUES
	(1, '2017-06-18 22:09:27', 'Fernando Sánchez', '', 'ferissan@fiec.espol.edu.ec');
/*!40000 ALTER TABLE `web_contact` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
