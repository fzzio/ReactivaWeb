<div id="page-wrapper" class="col-lg-10 col-md-10">
	<div class="container-fluid">
		<!-- <div class="col-sm-3 col-lg-2">
			<nav class = "navbar navbar-default navbar-fixed-side" role = "navigation">

				<div class = "navbar-header">
					<button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#example-navbar-collaps">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">REACTIVA</a>
				</div>

				<div class = "collapse navbar-collapse" id = "example-navbar-collapse">
					<ul class = "nav navbar-nav">
						<li><a href = "#">Pacientes</a></li>
						<li><a href = "#">Agenda</a></li>
						<li><a href = "#">Diagnosticos</a></li>	
					</ul>
				</div>
			</nav>
		</div> -->
		<!-- <div class="col-sm-9 col-lg-10"> -->
		<div>
			<div>
				<div class="row" >
					<div class="col-sm-6 col-md-8">
						<h1>Nuevo registro de paciente</h1>	
					</div>
					<div class="col-sm-6 col-md-4" id="dosbtns">
						<div id="btnguardar">
							<button type="button" class="btn btn-primary btn-md">
								<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span><b>  GUARDAR</b>
							</button>
						</div>
						<div id="btncancelar">
							<button type="button" class="btn btn-danger btn-md">
								<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span><b>  CANCELAR</b>
							</button>
						</div>
					</div>
				</div>
				<section>
					<div class="datapersonal">
						<h2>Datos personales y de contacto</h2>
						<hr>
					</div>
					<div class="form-horizontal">
						<div class="col-sm-2">
							<!-- <div class="datoscontacto imagenclass"> -->
							<form>
								<div class="form-group" id="dataphoto" >
									<!-- <img src="img/profile.png"> -->
									<div class="cuadrado"></div>
									<div>
										<div>
											<button class="btn btn-primary btn-xs btnimg">Tomar Foto</button>
											<!-- <input type="file" name="userphoto" class="input-file" /> -->
										</div>
										<div>
											<button class="btn btn-primary btn-xs btnimg">Subir Archivo</button>
											<!-- <span>
												<label class="btn btn-primary btn-xs input-file">
												<input type="file" id="input-photo"  class="input-file"/>Subir Archivo</label>
											</span> -->
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- <div class="datoscontacto infopersonal"> -->

						<div class="col-sm-6">
							<div class="form-group">
								<label  class="col-sm-5 control-label">Nombres</label>
								<div class="col-sm-7">
									<input  class="form-control inputbasic" type="text">
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-5 control-label">Apellidos</label>
								<div class="col-sm-7">
									<input  class="form-control inputbasic" type="text">
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-5 control-label">Ced/RUC</label>
								<div class="col-sm-7">
									<input class="form-control inputbasic" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Fecha nac</label>
								<div class="col-sm-7">
									<div class="col-sm-4">
										<input class=" col-sm-4 form-control inputbasic" type="text">
									</div>
									<div class="col-sm-4">
										<input class=" col-sm-4 form-control inputbasic" type="text">
									</div>
									<div class="col-sm-4">
										<input class=" col-sm-4 form-control inputbasic" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-5 control-label">Cont emerg</label>
								<div class="col-sm-7">
									<input class="form-control inputbasic" type="text">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-sm-4 control-label">Telf fijo</label>
								<div class="col-sm-8">
									<input class="form-control inputcontact" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Celular</label>
								<div class="col-sm-8">
									<input class="form-control inputcontact" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Email</label>
								<div class="col-sm-8">
									<input class="form-control inputcontact" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="MainContent_text_reg_cp" class="col-sm-4 control-label">Domicilio</label>
								<div class="col-sm-8">
									<input class="form-control inputcontact" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="MainContent_text_reg_cp" class="col-sm-4 control-label">Telf contacto</label>
								<div class="col-sm-8">
									<input class="form-control inputcontact" type="text">
								</div>
							</div>
						</div>
					</div>
				</section>
				<section>
					<!-- <div class="tinfoclinica"> -->
					<h2>Información clínica</h2>
					<hr>
					<div class="form-horizontal">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-sm-4 control-label">Sexo</label>
								<div class="col-sm-8">
									<select class="form-control" >
										<option>Sleccionar</option>
										<option>Masculino</option>
										<option>Femenino</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Tipo Sangre</label>
								<div class="col-sm-8">
									<select class="form-control" >
										<option>Sleccionar</option>
										<option>O+</option>
										<option>B+</option>
										<option>B-</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label  class="col-sm-4 control-label">Alergias a medicamentos</label>
								<div class="form-horizontal">
									<div class="col-sm-3">
										<select class="form-control" >
											<option>Si</option>
											<option>No</option>
										</select>
									</div>
									<div class="col-sm-5">
										<input class="form-control" type="text" placeholder="Especifique">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Otras Alergias</label>
								<div class="col-sm-3">
									<select class="form-control" data-width="15%" >
										<option>Si</option>
										<option>No</option>
									</select>
								</div>
								<div class="col-sm-5">
									<input class="form-control" type="text"  placeholder="Especifique">
								</div>
							</div>
						</div>
						<div class="tinfoclinica">
							<div class="form-horizontal">
								<div class="col-sm-6 col-md-6">
									<div class="datosinfoclinica">
										<form>
											<div class="form-group" id="dataenfermedades">
												<label for="exampleInputEmail1">Enfermedades</label>
												<textarea class="form-control" rows="2"></textarea>
											</div>
										</form>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="datosinfoclinica">
										<form>
											<div class="form-group" id="datacomentarios">
												<label for="exampleInputEmail1">Observaciones y comentarios</label>
												<textarea class="form-control" rows="2"></textarea>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>	
		</div>
	</div>
</div>
