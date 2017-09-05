<!-- Page Content -->
<div id="page-wrapper" class="page-main mt-0 pt-0 mb-0 pb-120 pr-0 mr-0">
	<div class = 'row pr-0 mr-0 pl-0 ml-0'>
	<div class="col-md-offset-1 col-md-10 ">
		<h2 class="title">Datos del Paciente</h2>
		<div class="row pt-20">
			<div class="col-md-2">
				<a type="button" class="btn btn-success btn-general mb-10" href="<?php echo site_url('web/editarPaciente/').$paciente->getId(); ?>"><span class="glyphicon glyphicon-pencil"></span>Editar datos</a>
				<a type="button" class="btn btn-danger btn-general mb-10" href="<?php echo site_url('web/deletePatient/').$paciente->getId(); ?>"><span class="glyphicon glyphicon-remove"></span>Eliminar</a>
				<img src = "<?php echo $paciente->getImagen() ?>" class ="img-responsive ">
			</div>
			<div class = 'col-md-4'>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Nombres:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getName() ?></span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Apellidos:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getLastName() ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Cédula:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getCI() ?></span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Fecha de nacimiento:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getBorn() ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Contacto de emergencia:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getEmergency_contact() ?></span> </p>
					</div>
				</div>
			</div>
			<div class = 'col-md-5'>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Teléfono:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getPhone() ?> </span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Celular:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getCellphone() ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Email:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getEmail() ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Domicilio:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getAddress() ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Teléfono de emergencia:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getEmergency_phone() ?></span> </p>
					</div>
				</div>
			</div>
		</div>
		<h4 class="sub-title pt-15">HISTORIAL DE CITAS Y TERAPIAS</h4>
		<table class="table consult">
			<thead>
				<tr class = 'mt-0 pt-0'>
					<th></th>
					<th>TIPO</th>
					<th>FECHA</th>
					<th>DOCTOR/TERAPEUTA</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($lista as $item){ ?>
				<tr>
					<td>
						<button type="button" class="btn btn-xs btn-primary" data-toggle='modal' 
						<?php  if($item['type'] == "Consulta"){
							echo "data-target='#verCita' onclick = 'updateConsultInfo(".$item['id'].")'";
						}else{
							echo "data-target='#verTerapia' onclick = 'updateTherapyInfo(".$item['id'].")'";
						}
							?>
						
						>
							<span class="glyphicon glyphicon-eye-open"></span>
						</button>
					</td>
					<td class = 'left-cell'><?php echo $item['type'] ?></td>
					<td><?php echo $item['date'] ?></td>
					<td><?php echo $item['doctor'] ?></td>

				</tr>
			  <?php } ?>
			</tbody>
		</table>
		<h4 class="sub-title pt-15">Información clínica</h3>

		<div class="row">
			<div class = 'col-md-4'>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Sexo:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php if($paciente->getGender()== 0){ echo "Femenino";}else{ echo "Masculino";} ?> </span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Tipo de sangre:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getBlood().$paciente->getRh() ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Alergias:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getAllergies_med() ?></span> </p>
					</div>
				</div>
			</div>
			
			<div class="col-md-5">
				<h5 class="title-3">Observaciones</h5>
				<p class = 'p-5 patient-input'><?php echo $paciente->getObservations() ?></p>
				<h5 class="title-3">Enfermedades</h5>
				<p class = 'p-5 patient-input'><?php echo $paciente->getIllness() ?></p>
			</div>
		</div>



	<div class="modal fade" id="verCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content pb-20">
				<div class="modal-header nueva-cite-header">
					<h4 class="modal-title">Información de la cita</h4>
				</div>
				<div class="modal-body">
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Fecha de la cita:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-date' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Estado:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-status' class = 'patient-content'></p>
						</div>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class = 'pax-label-modal-right'>Observaciones</p>
					</div>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class="" id="modal-observation" ></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class = 'pax-label-modal-right'>Diagnóstico</p>
					</div>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class="" id="modal-diagnosis" ></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class = 'pax-label-modal-right'>Partes del cuerpo afectadas: </p>
					</div>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class="" id="modal-body" ></p>
					</div>
				</div>
			</div>
		</div>

	</div>


	<div class="modal fade" id="verTerapia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content pb-20">
				<div class="modal-header nueva-cite-header">
					<h4 class="modal-title">Información de la terapia</h4>
				</div>
				<div class="modal-body">
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Fecha de la terapia:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'the-date' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Estado:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'the-status' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Evaluación:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'the-evaluation' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p class = 'pax-label-modal'>Atentido por: </p>
						</div>
						<div class = 'col-xs-8  ml-0 pl-0'>
							<p class="patient-content" id="the-attended" ></p>
						</div>
					</div>
				</div>
				
				<div class = 'row'>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class = 'pax-label-modal-right'>Comentarios: </p>
					</div>
					<div class = 'col-xs-offset-2 col-xs-8'>
						<p class="" id="the-comments" ></p>
					</div>
				</div>
			</div>
		</div>

	</div>

	</div>
	</div>
</div>