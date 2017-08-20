<div id="page-wrapper" class = 'page-calendar mt-0 pt-0 mb-0 pb-120 pr-0 mr-0'>
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
			<?php echo form_open_multipart('target' , array('id' => 'frm-nueva-cita')); ?>
				<div class="modal-body">
					<div class = 'row'>
						<div class = 'col-xs-12'>
							<div class="form-group">
							
									<label for="autocomplete-paciente" class = 'pax-label'>Paciente</label>
							
								<div class = 'col-xs-10'>
									<input class="form-control patient-input" type="text" placeholder="" id="autocomplete-paciente" name= 'autocomplete-pacient' required>
									<input  type = "hidden" name = "id-patient" id = "id-patient" required>
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
					<a type="button" class="btn btn-default btn-danger btn-general" aria-hidden="true" data-dismiss="modal" >
						<span class="glyphicon glyphicon-remove" ></span> Cancelar
					</a>
				</div>
			<?php echo form_close(); ?>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<div class="modal fade" id="verCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content pb-20">
				<div class="modal-header nueva-cite-header">
					<h4 class="modal-title">Cita del día</h4>
				</div>
				<div class="modal-body">
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Paciente:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-fullname' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Hora de la cita:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-date' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Sexo:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-gender' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Fecha de nacimiento:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-born' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Cédula:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-ci' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Celular:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-cellphone' class = 'patient-content'></p>
						</div>
					</div>
					<div class = 'row'>
						<div class = 'col-xs-4'>
							<p><span class = 'pax-label-modal'>Email:</span></p>
						</div>
						<div class = 'col-xs-8 ml-0 pl-0'>
							<p id = 'modal-email' class = 'patient-content'></p>
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
						<p class="" id="modal-observations" ></p>
					</div>
				</div>
				<div class = 'row'>
					<div class = 'col-xs-offset-1 col-xs-10'>
						<div class = 'col-xs-4'>
							<a class = 'align-center btn-turquoise'>
								<span class = 'glyphicon glyphicon-asterisk' href = '#'></span> Iniciar cita
							</a>
						</div>
						<div class = 'col-xs-4'>
							<a class = 'align-center btn-green'>
								<span class = 'glyphicon glyphicon-calendar' href = '#'></span> Reagendar
							</a>
						</div>
						<div class = 'col-xs-4'>
							<a type = 'button' class = 'align-center btn-red' href = '#'>
								<span class = 'glyphicon glyphicon-remove' onClick='javascript:return confirm("¿Estás seguro que deseas cancelar la cita?;")'></span> Cancelar
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>