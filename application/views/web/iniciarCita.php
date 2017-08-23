<div id="page-wrapper" class="page-main mt-0 pt-0 mb-0 pb-120 pr-0 mr-0">
	<div class = 'row pr-0 mr-0 pl-0 ml-0'>
	<div class="col-md-offset-1 col-md-10">
		<div class="row">
			<div class="col-md-10 pl-0 ml-0">
				<h2 class="title">Diagnóstico de la cita</h2>
			</div>
			<div class="col-md-2 mt-20">
				<button type="submit" class="btn btn-default btn-primary btn-general">
					<span class="glyphicon glyphicon-download-alt " aria-hidden="true"></span> Guardar
				</button>
			</div>
		</div>
		<h3 class="title">Datos del Paciente</h3>
		<hr class = 'mt-0'>
		<div class = 'row'>
			<div class = 'col-md-5'>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Paciente:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $patient['fullname'] ?></span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Hora de la cita:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $consult['hour'] ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Sexo:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $patient['gender'] ?></span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Fecha de nacimiento:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $patient['born'] ?></span> </p>
					</div>
				</div>
				
			</div>
			<div class = 'col-md-5'>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Cédula:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $patient['ci'] ?></span> </p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Celular:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'><?php echo $patient['cellphone'] ?></span></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Email:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'></span><?php echo $patient['email'] ?></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-label'>Observaciones:</span></p>
					</div>
					<div class = 'col-xs-6'>
						<p><span class = 'patient-content'></span><?php echo $consult['observations'] ?></p>
					</div>
				</div>

			</div>
		</div>
		<?php echo form_open_multipart('web/addDiagnostic' , array('id' => 'frm-new')); ?>
		<h3 class="title">Diagnóstico </h3>
		<hr class = 'mt-0'>
		<div class = 'row'>
			<div class = 'col-md-12'>
				<div class="form-group">
					<label for="pax-observation" class = 'pax-label pull-right-label'>Información </label>
					<textarea class="form-control patient-input" id="pax-observation" name = 'pax-observation' rows="3" ></textarea>
				</div>
			</div>
		</div>
		<div class = 'row'>
			<div class = 'col-md-12'>
			<label for="pax-observation" class = 'pax-label pull-right-label'>Partes del cuerpo afectadas </label>
				<ul class = 'list-unstyled'>
				<?php foreach($limbs as $lb){ ?>
					<li class = 'col-xs-4 pb-10'>
						<input type="checkbox" id="<?php echo $lb['id_limb'] ?>" />
    						<label for="<?php echo $lb['id_limb'] ?>"><img src="<?php echo $lb['icon'] ?>" /> <?php echo $lb['name'] ?>
    					</label>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>

		<?php echo form_close(); ?>
	</div>
	</div>
</div>