<div id="page-wrapper" class = 'page-calendar mt-0 pt-0 mb-0 pb-0 pr-0 mr-0'>
<!-- Nav tabs -->
		<div class="calendar-nav ml-0 pl-0">
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active">
			  	<a href="#calendar" aria-controls="calendar" role="tab" data-toggle="tab">CITAS DEL DIA</a>
			  </li>
			  <li role="presentation">
			  	<a href="#therapy" aria-controls="therapy" role="tab" data-toggle="tab">AGENDAR TERAPIAS</a>
			  </li>
			</ul>
		</div>
<!-- Page Content -->

	<div class="container col-md-offset-1 col-md-10">
		<!-- Tab panes -->
		<div class="tab-content">
		  <div role="tabpanel" class="tab-pane active" id="calendar">
		  	<div id="calendar_div">
		  		<?php echo $controller->getCalender(); ?>
		  	</div><!-- /.container-fluid -->
		  </div><!-- /.tab-pane -->

		  <div role="tabpanel" class="tab-pane" id="therapy">
		  	<!--Therapy-->
		  </div><!-- /.tab-pane -->

		</div>

	</div>


	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header nueva-cite-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Agendación de una nueva cita</h4>
				</div>
			<?php echo form_open_multipart('target' , array('id' => 'frm-new')); ?>
				<div class="modal-body">
					<div class = 'row'>
						<div class = 'col-xs-12'>
							<div class="form-group">
								<div class = 'col-xs-2 pr-0 mr-0'>
									<label for="pax-paciente" class = 'pax-label'>Paciente</label>
								</div>
								<div class = 'col-xs-10'>
									<input class="form-control patient-input" type="text" placeholder="" id="pax-paciente" name= 'pax-paciente' required>
									
								</div>
							</div>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-12'>
							<div class="form-group">
								<div class = 'col-xs-2 pr-0 mr-0'>
									<label for="pax-paciente" class = 'pax-label'>Hora</label>
								</div>
								<div class = 'col-xs-3 pr-0'>
									<input class="form-control patient-input" type="numeric" placeholder="HH:MM" id="pax-init" name= 'pax-init' required>
								</div>
								<div class = 'col-xs-3 pr-0'>
									<input class="form-control patient-input" type="numeric" placeholder="HH:MM" id="pax-end" name= 'pax-end' required>
								</div>
								<div class = 'col-xs-4'>
									(Formato 24H)
								</div>
							</div>
						</div>
					</div>
					<div class = 'row'>
	
					<div class = 'col-xs-12'>
						<div class="form-group">
							<label for="pax-observation" class = 'pax-label pull-right-label'>Observaciones</label>
							<textarea class="form-control patient-input" id="pax-observation" name = 'pax-observation' rows="3" ></textarea>
						</div>
					</div>
		</div>
					
		</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-primary btn-general">
						<span class="glyphicon glyphicon-download-alt " aria-hidden="true"></span> Guardar
					</button>
					<a type="button" class="btn btn-default btn-danger btn-general" >
						<span class="glyphicon glyphicon-remove " aria-hidden="true"></span> Cancelar
					</a>
				</div>
			<?php echo form_close(); ?>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<div class="modal fade" id="verCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header nueva-cite-header">
					<h4 class="modal-title">Cita del día</h4>
				</div>
				<div class="modal-body">
					<div class = 'row'>
						<div class = 'col-xs-3'>
							<p><span class = 'pax-label'>Paciente:</span></p>
						</div>
						<div class = 'col-xs-9'>
							<p><span class = 'patient-content'>Andres Felipe Gallego</span></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-3'>
							<p><span class = 'pax-label'>Hora de la cita:</span></p>
						</div>
						<div class = 'col-xs-9'>
							<p><span class = 'patient-content'>9:00 - 10:00</span></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-3'>
							<p><span class = 'pax-label'>Sexo:</span></p>
						</div>
						<div class = 'col-xs-9'>
							<p><span class = 'patient-content'>Femenino</span></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-3'>
							<p><span class = 'pax-label'>Fecha de nacimiento:</span></p>
						</div>
						<div class = 'col-xs-9'>
							<p><span class = 'patient-content'>14/11/1996</span></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-3'>
							<p><span class = 'pax-label'>Cédula:</span></p>
						</div>
						<div class = 'col-xs-9'>
							<p><span class = 'patient-content'>0927856770</span></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-3'>
							<p><span class = 'pax-label'>Celular:</span></p>
						</div>
						<div class = 'col-xs-9'>
							<p><span class = 'patient-content'>0927856770</span></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-3'>
							<p><span class = 'pax-label'>Email:</span></p>
						</div>
						<div class = 'col-xs-9'>
							<p><span class = 'patient-content'>adrelik@gmail.com</span></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>