<div id="page-wrapper" class="col-lg-10 col-md-10">
	<div class="container-fluid" id="newpatientcontainer">
			<div>
				<div>
					<div class="row">
						<div class="col-sm-6 col-md-8">
							<h1 class="titulosfont">Nuevo registro de paciente</h1>	
						</div>
						<div class="col-sm-3 col-md-2 dosbtns">
							<div id="btnguardar">
								<button type="button" class="btn btn-default btn-md" id="btnsavenewpat">
									<span class="glyphicon glyphicon-download-alt btntextwiht" aria-hidden="true"></span><b class="btntextwiht">  GUARDAR</b>
								</button>
							</div>
						</div>
						<div class="col-sm-3 col-md-2 dosbtns">
							<div id="btncancelar">
								<button type="button" class="btn btn-default btn-md" id="btncancelarnewpat">
									<span class="glyphicon glyphicon-remove-sign btntextwiht" aria-hidden="true"></span><b class="btntextwiht"> CANCELAR</b>
								</button>
							</div>
						</div>
					</div>
					<section>
						<div class="datapersonal">
							<h2 class="titulosfont">Datos personales y de contacto</h2>
							<hr>
						</div>
						<div class="form-horizontal">
							<div class="col-sm-2 col-md-2">
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

							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<label  class="col-sm-5 control-label textlabels">Nombres</label>
									<div class="col-sm-7">
										<input  class="form-control inputbasic input-sm" type="text">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-5 control-label">Apellidos</label>
									<div class="col-sm-7">
										<input  class="form-control inputbasic input-sm" type="text">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-5 control-label">Ced/RUC</label>
									<div class="col-sm-7">
										<input class="form-control inputbasic input-sm" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-5  control-label">Fecha nac</label>
									<div class="col-sm-7">
										<div class="col-sm-4 col-md-4" id="inputdia">
											<input class=" col-sm-4 form-control inputbasic input-sm" type="text" placeholder="DD">
										</div>
										<div class="col-sm-4 col-md-4" id="inputmes">
											<input class=" col-sm-4 form-control inputbasic input-sm" type="text" placeholder="MM">
										</div>
										<div class="col-sm-4 col-md-4" id="inputanio">
											<input class=" col-sm-4 form-control inputbasic input-sm" type="text" placeholder="AA">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-5 control-label">Cont emerg</label>
									<div class="col-sm-7">
										<input class="form-control inputbasic input-sm" type="text">
									</div>
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="form-group">
									<label class="col-sm-4 control-label">Telf fijo</label>
									<div class="col-sm-8">
										<input class="form-control inputcontact input-sm" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Celular</label>
									<div class="col-sm-8">
										<input class="form-control inputcontact input-sm" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Email</label>
									<div class="col-sm-8">
										<input class="form-control inputcontact input-sm" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Domicilio</label>
									<div class="col-sm-8">
										<input class="form-control inputcontact input-sm" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Telf contacto</label>
									<div class="col-sm-8">
										<input class="form-control inputcontact input-sm" type="text">
									</div>
								</div>
							</div>
						</div>
					</section>
					<section>
						<h2 class="titulosfont">Información clínica</h2>
						<hr>
						<div class="form-horizontal">
							
						
							<div class="row">
								<div class="form-group col-md-4">
									<label class="col-sm-4 control-label">Sexo</label>
									<div class="col-sm-8">
										<select class="form-control selectfontc input-sm" >
											<option>Sleccionar</option>
											<option>Masculino</option>
											<option>Femenino</option>
										</select>
									</div>
								</div>
								<div class="form-group col-md-8">
									<label  class="col-sm-4 control-label">Alergias a medicamentos</label>
									<div class="form-horizontal">
										<div class="col-sm-3">
											<select class="form-control selectfontc input-sm" >
												<option>Si</option>
												<option>No</option>
											</select>
										</div>
										<div class="col-sm-5">
											<input class="form-control input-sm" type="text" placeholder="Especifique">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-4">
									<label class="col-sm-4 control-label">Tipo Sangre</label>
									<div class="col-sm-8">
										<select class="form-control selectfontc input-sm" >
											<option>Sleccionar</option>
											<option>O+</option>
											<option>B+</option>
											<option>B-</option>
										</select>
									</div>
								</div>
								<div class="form-group col-md-8">	
										<label class="col-sm-4 col-md-4 control-label">Otras Alergias</label>
										<div class="col-sm-3 col-md-3">
											<select class="form-control selectfontc input-sm" data-width="15%" >
												<option>Si</option>
												<option>No</option>
											</select>
										</div>
										<div class="col-sm-5 col-md-5">
											<input class="form-control input-sm" type="text"  placeholder="Especifique">
										</div>
								</div>
							</div>
								
							
							<div class="row">
							
									<div class="col-sm-6 col-md-6">
													<label class="col-sm-6 col-md-6">Enfermedades</label>
													<textarea class="col-sm-6 col-md-6 form-control selectfontc textareaf" rows="2"></textarea>
									</div>
									<div class="col-sm-6 col-md-6">
													<label class="col-sm-6 col-md-6">Observaciones</label>
													<textarea class="col-sm-6 col-md-6 form-control selectfontc textareaf" rows="2"></textarea>
									</div>
							</div>
						</div>
					</section>
				</div>	
			</div>
		</div>
</div>
