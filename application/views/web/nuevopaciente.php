<div id="page-wrapper" class="page-patient">
	<div class="col-md-11">
	<?php echo form_open_multipart('web/newPatient' , array('id' => 'frm-new')); ?>
		<div class="row">
			<div class="col-md-8 pl-0 ml-0">
				<h3 class="title">Nuevo registro de paciente</h3>
			</div>
			<div class="col-md-2 mt-20">
				<button type="submit" class="btn btn-default btn-primary btn-general">
					<span class="glyphicon glyphicon-download-alt " aria-hidden="true"></span> Guardar
				</button>
			</div>
			<div class="col-md-2 mt-20">
				<a type="button" class="btn btn-default btn-danger btn-general" >
					<span class="glyphicon glyphicon-remove-sign " aria-hidden="true"></span> Cancelar
				</a>
			</div>
		</div>

		<div class = 'row'>
			<h4 class = 'title'>Datos personales y de contacto</h4>
			<hr>
		</div>
		<div class = 'row'>
			<div class = 'col-md-2'>
				<img src = "<?php echo base_url('assets/img/web/rea-profile.png'); ?>" class ="img-responsive ">
				<label class="btn btn-primary btn-upload" for="pax-photo">
				    <input id="pax-photo" type="file" style="display:none" 
				    onchange="$('#upload-file-info').html(this.files[0].name)">
				    Subir archivo
				</label>
<span class='label label-info' id="upload-file-info"></span>
			</div>
			<div class = 'col-md-5'>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-3'>
							<label for="pax-name" class = 'pax-label'>Nombres</label>
						</div>
						<div class = 'col-xs-9'>
							<input class="form-control patient-input" type="text" placeholder="" id="pax-name" name= 'pax-name' required="true">
						</div>
				
					</div>
				</div>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-3'>
							<label for="pax-lastname" class = 'pax-label'>Apellidos</label>
						</div>
						<div class = 'col-xs-9'>
							<input class="form-control patient-input" type="text" placeholder="" id="pax-lastname" name= 'pax-lastname' required="true">
						</div>
				
					</div>
				</div>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-3'>
							<label for="pax-ci" class = 'pax-label'>Cédula</label>
						</div>
						<div class = 'col-xs-9'>
							<input class="form-control patient-input" type="text" placeholder="" id="pax-ci" name= 'pax-ci' required="true">
						</div>
				
					</div>
				</div>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-3'>
							<label for="pax-born" class = 'pax-label'>Fecha de nacimiento</label>
						</div>
						<div class = 'col-xs-3 pr-0'>
							<input class="form-control patient-input" type="numeric" placeholder="DD" id="pax-born-dd" name= 'pax-born-dd' required="true">
						</div>
						<div class = 'col-xs-3 pr-0'>
							<input class="form-control patient-input" type="numeric" placeholder="MM" id="pax-born-mm" name= 'pax-born-mm' required="true">
						</div>
						<div class = 'col-xs-3 pr-0'>
							<input class="form-control patient-input" type="numeric" placeholder="AAAA" id="pax-born-yy" name= 'pax-born-yy' required="true">
						</div>
				
					</div>
				</div>
			</div>
			<div class = 'col-md-5'>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-4'>
							<label for="pax-phone" class = 'pax-label'>Teléfono</label>
						</div>
						<div class = 'col-xs-8'>
							<input class="form-control patient-input" type="text" placeholder="" id="pax-phone" name= 'pax-phone' required="true">
						</div>
				
					</div>
				</div>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-4'>
							<label for="pax-cellphone" class = 'pax-label'>Celular</label>
						</div>
						<div class = 'col-xs-8'>
							<input class="form-control patient-input" type="text" placeholder="" id="pax-cellphone" name= 'pax-cellphone' required="true">
						</div>
				
					</div>
				</div>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-4'>
							<label for="pax-mail" class = 'pax-label'>Mail</label>
						</div>
						<div class = 'col-xs-8'>
							<input class="form-control patient-input" type="mail" placeholder="" id="pax-mail" name= 'pax-mail' required="true">
						</div>
				
					</div>
				</div>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-4'>
							<label for="pax-address" class = 'pax-label'>Domicilio</label>
						</div>
						<div class = 'col-xs-8'>
							<input class="form-control patient-input" type="text" placeholder="" id="pax-address" name= 'pax-address' required="true">
						</div>
				
					</div>
				</div>
			</div>
		</div>
		<div class = 'row'>
			<h4 class = 'title'>Información clínica</h4>
			<hr>
		</div>
		<div class = 'row'>
			<div class = 'col-md-4'>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-4'>
							<label for="pax-gender" class = 'pax-label'>Sexo</label>
						</div>
							<div class = 'col-xs-8'>
							<select id="pax-gender" class="form-control patient-input" name="pax-gender">
								<option id= '0' value = '0'>Femenino</option>
								<option id= '1' value = '1'>Masculino</option>
							</select>
						</div>
					</div>
				</div>
				
				
			</div>

		</div>
		<div class = 'row'>
			<div class = 'col-md-4'>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-4'>
							<label for="pax-blood" class = 'pax-label'>Tipo de sangre</label>
						</div>
							<div class = 'col-xs-8'>
							<select id="pax-blood" class="form-control patient-input" name="pax-blood">
								<option id= 'O' value = 'O'>O</option>
								<option id= 'A' value = 'A'>A</option>
								<option id= 'B' value = 'B'>B</option>
								<option id= 'AB' value = 'AB'>AB</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class = 'col-md-4'>
				<div class = 'row pb-10'>
					<div class="form-group">
						<div class = 'col-xs-4'>
							<label for="pax-rh" class = 'pax-label'>Factor RH</label>
						</div>
							<div class = 'col-xs-8'>
							<select id="pax-rh" class="form-control patient-input" name="pax-rh">
								<option id= '+' value = '+'>+</option>
								<option id= '-' value = '-'>-</option>

							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = 'row'>
			<div class = 'col-md-6'>
				<div class="form-group">
					<label for="pax-allergies" class = 'pax-label'>Alergias</label>
					<textarea class="form-control patient-input" id="pax-allergies" name = 'pax-allergies' rows="3"></textarea>
				</div>
			</div>
			<div class = 'col-md-6'>
				<div class="form-group">
					<label for="pax-illness" class = 'pax-label'>Enfermedades</label>
					<textarea class="form-control patient-input" id="pax-illness" name = 'pax-illness' rows="3" ></textarea>
				</div>
			</div>
			<div class = 'col-md-6'>
				<div class="form-group">
					<label for="pax-observation" class = 'pax-label'>Observaciones y comentarios</label>
					<textarea class="form-control patient-input" id="pax-observation" name = 'pax-observation' rows="3" ></textarea>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
	</div>
</div>
