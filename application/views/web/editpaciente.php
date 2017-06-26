
<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">EDITAR</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar Paciente</h4>
			</div>
			<div class="modal-body" style="background-color: #50bfa3;">
				<div class="container-fluid">
					<section>
						<div class="form-horizontal">
						
							<!-- <div class="datoscontacto infopersonal"> -->
							
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label  class="col-sm-5 col-md-3 control-label">Nombres</label>
									<div class="col-sm-7 col-md-9">
										<input  class="form-control inputbasic" type="text">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-5 col-md-3 control-label">Apellidos</label>
									<div class="col-sm-7 col-md-9">
										<input  class="form-control inputbasic" type="text">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-5  col-md-3 control-label">Ced/RUC</label>
									<div class="col-sm-7 col-md-9">
										<input class="form-control inputbasic" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-5 col-md-3 control-label">Fecha nac</label>
									<div class="col-sm-7 col-md-9">
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
									<label class="col-sm-5  col-md-3 control-label">Cont emerg</label>
									<div class="col-sm-7 col-md-9">
										<input class="form-control inputbasic" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 col-md-3 control-label">Telf fijo</label>
									<div class="col-sm-8 col-md-9">
										<input class="form-control inputcontact" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 col-md-3 control-label">Celular</label>
									<div class="col-sm-8 col-md-9">
										<input class="form-control inputcontact" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 col-md-3 control-label">Email</label>
									<div class="col-sm-8 col-md-9">
										<input class="form-control inputcontact" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 col-md-3 control-label">Domicilio</label>
									<div class="col-sm-8 col-md-9">
										<input class="form-control inputcontact" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4  col-md-3 control-label">Telf contacto</label>
									<div class="col-sm-8 col-md-9">
										<input class="form-control inputcontact" type="text">
									</div>
								</div>
							</div>
						</div>
					</section>
					<section>
						<hr>
						<br>
						<hr>
						<div class="form-horizontal">
							<div class="col-sm-4 col-md-6">
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
							<div class="col-sm-8 col-md-6">
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
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
				<button type="button" class="btn btn-primary">GUARDAR</button>
			</div>
		</div>

	</div>
</div>
