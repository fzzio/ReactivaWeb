<!-- Page Content -->
<div id="page-wrapper" class="page-main mt-0 pt-0 mb-0 pb-0 pr-0 mr-0">

	<div class="col-md-offset-1 col-md-10 ">
		<h2 class="title">Datos del Paciente</h2>
		<div class="row pt-20">
			<div class="col-md-2">
				<a type="button" class="btn btn-success btn-general mb-10" href="<?php echo site_url('web/editarPaciente/').$paciente->getId(); ?>"><span class="glyphicon glyphicon-pencil"></span>Editar datos</a>
				<a type="button" class="btn btn-danger btn-general mb-10" href="<?php echo site_url('web/eliminarPaciente/').$paciente->getId(); ?>"><span class="glyphicon glyphicon-remove"></span>Eliminar</a>
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
			  <tr>
			  	<td>
			  		<button type="button" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button>
			  	</td>
			    <td class = 'left-cell'>Consulta</td>
			    <td>16-06-2017</td>
			    <td>Daniel García</td>
			   
			  </tr>
			  <tr>
			  	<td>
			  		<button type="button" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button>
			  	</td>
			    <td class = 'left-cell'>Terapia</td>
			    <td>01-08-2017</td>
			    <td>Erick Cedeño</td>

			  </tr>
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
				<p class = 'p-5 patient-input'><?php echo $paciente->getAllergies() ?></p>
			</div>
		</div>
	</div>
</div>