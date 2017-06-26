<div class = 'container-fluid login'>
	<div class ='row' >
		<div class = 'col-md-6 login-left login ml-0 mr-0 '>
			<div class = 'center-row'>
			<p class = 'align-center inicia'>
				Inicia sesión
			</p>

			<div class ='row mt-20'>
				<div class = 'col-md-offset-3 col-md-6'>
				<?php echo form_open('' , array('id' => 'frm-login')); ?>  
				<fieldset>
					<label class ='label-input'>Usuario</label>
					<div class="input-group align-center">
						<?php echo form_input(array(
							'id' => 'ra_username',
							'name' => 'ra_username',
							'value' => '',
							'required' => 'required',
							'placeholder' => 'Usuario',
							'class' => 'form-control  ',
							));?>
					</div>
					<div class="clearfix"></div><br>
					<label class ='label-input'>Contraseña</label>
					<div class="input-group align-center">
						<?php echo form_password(array(
							'id' => 'ra_password',
							'name' => 'ra_password',
							'value' => '',
							'required' => 'required',
							'placeholder' => 'Contraseña',
							'class' => 'form-control ',
							));?>
					</div>
					<div class="clearfix"></div><br>
					<a href = "" class = 'a-forget  align-center'>¿Olvidaste tu contraseña?</a>
					<div class="clearfix"></div><br>
					<div class="input-group  align-center">
						<div class="checkbox ">
							<label>
								<input name="remember" type="checkbox" value="Recuerdame" id="remember"> Recordarme
							</label>
						</div>
					</div>
					<div class="input-group  align-center">
						<button type="submit" class="btn login-btn">Ingresar</button>
					</div>
				</fieldset>
				<?php echo form_close(); ?>
				</div>
			</div>
			</div>
		</div>
		<div class = 'col-md-6 login-right login ml-0 mr-0'>
			<div class = 'center-row'>
				<div class = 'row'>
					<div class = 'col-md-offset-2 col-md-8'>
						<img src = "<?php echo base_url('assets/img/web/rea-login.png'); ?>" class ="img-responsive">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>