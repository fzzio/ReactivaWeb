<!-- Page Content -->
<div id="page-wrapper" class="page-patient col-lg-10 col-md-10">
	<div class="col-md-11">
		<h3 class="title">Datos del Paciente</h3>
		<div class="row">
			<div class="col-md-2">
				<button type="button" class="btn btn-success btn-general"><span class="glyphicon glyphicon-pencil"></span>Editar datos</button>
				<button type="button" class="btn btn-danger btn-general"><span class="glyphicon glyphicon-remove"></span>Eliminar</button>
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
			</div>
		</div>
		<h4 class="sub-title">HISTORIAL DE CITAS Y TERAPIAS</h3>
		<table class="table consult">
	    <thead>
	      <tr>
	      	<th></th>
	        <th>TIPO</th>
	        <th style="width: 100px;">FECHA</th>
	        <th>DOCTOR/TERAPEUTA</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	      	<td>
	      		<button type="button" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button>
	      	</td>
	        <td>Consulta</td>
	        <td>16-06-2017</td>
	        <td>Daniel García</td>
	       
	      </tr>
	      <tr>
	      	<td>
	      		<button type="button" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button>
	      	</td>
	        <td>Terapia</td>
	        <td>01-08-2017</td>
	        <td>Erick Cedeño</td>

	      </tr>
	    </tbody>
	  </table>
		<h4 class="sub-title">Información clínica</h3>
		<div class="row">
			<div class = 'col-md-4'>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Sexo:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getGender() ?> </span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Tipo de sangre:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getBlood() ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Alergias:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $paciente->getAllergies() ?></span> </p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-4">
				<h5 class="title-3">Observaciones</h5>
				<textarea class="patient-textarea" rows="6" cols="50">At vero eos et accusamus et justo odio dignissimos ducimus qui blanditilis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint accaecati cupiditate non provident. similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</textarea>
			</div>
		</div>
	</div>
</div>