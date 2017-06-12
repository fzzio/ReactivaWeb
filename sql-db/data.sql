INSERT INTO `patient` (`ci`, `name`, `lastname`, `born`, `gender`, `phone`, `cellphone`,`adress`,`email`) VALUES
	( '0924262397', 'Israel', 'Zurita', '2016-09-23','1','072421191','0988829914','La Troncal', 'izurita@espol.edu.ec');
    
INSERT INTO `acc_med` (`username`, `email`, `password`, `name`, `lastname`, `last_ip`, `last_login`, `status`) VALUES
	('izurita', 'izurita@espol.edu.ec', '21232f297a57a5a743894a0e4a801fc3', 'Israel', 'Zurita', '8.8.8.8', '0000-00-00 00:00:00', 1);
    
    
INSERT INTO `patient_therapy` (`id_therapy`, `id_patient`, `date_created`, `id_doctor_created`, `id_med_attended`, `eta`, `etf`, `starttime`, `finishtime`,`comment`,`sendmail`,`status` ) VALUES
	(1, 1, '20170607', 3, 4, '2017-06-12 19:30:00', '2017-06-12 20:30:00', '19:00:00', '20:00:00','Calentar las extremidades', 1,1);


INSERT INTO `game_limb` (`id_limb`, `name`) VALUES (1, 'Juego De la Tortuga');
INSERT INTO `game_exercise` (`id_exercise`, `name`, `description`, `id_limb`) VALUES (1, 'Movimientos de Pierna', 'Mover las piernas en distintos angulos', '1');