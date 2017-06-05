<div class="container">
	<div class = 'row pt-150'>
		<div class="col-md-4 col-md-offset-4">
<!-- 
<img class="img-responsive" src="<?php echo base_url('assets/img/dh.png'); ?>">
-->
</div>
</div>

<div class="row pt-80">
	<div class= "col-md-4 col-md-offset-4">
		<?php echo form_open('admin/authenticate' , array('id' => 'frm-login')); ?>  
		<fieldset>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<?php echo form_input(array(
					'name' => 'ra_username',
					'value' => '',
					'required' => 'required',
					'placeholder' => 'Usuario',
					'class' => 'form-control input-sgl',
					));?>
				</div>
				<div class="clearfix"></div><br>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<?php echo form_password(array(
						'name' => 'ra_password',
						'value' => '',
						'required' => 'required',
						'placeholder' => 'contraseña',
						'class' => 'form-control input-sgl',
						));?>
					</div>
					<div class="clearfix"></div><br>
					<!--
					<div class="input-group">
						<div class="checkbox">
							<label>
								<input name="remember" type="checkbox" value="Recuerdame" id="remember"> Recuérdame
							</label>
						</div>
					</div>
					-->
					<div class="clearfix"></div><br>
					<div class="input-group pull-right">
						<button type="submit" class="btn btn-cdr btn-sgl">Iniciar sesión</button>
					</div>
				</fieldset>
				<?php echo form_close(); ?>
			</div>
		</div>

	</div>