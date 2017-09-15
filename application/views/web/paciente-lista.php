<div id="page-wrapper" class="page-main mt-0 pt-0 mb-0 pb-120 pr-0 mr-0">
	<div class = 'row pr-0 mr-0 pl-0 ml-0'>
		<div class="col-md-offset-1 col-md-10 ">
			<div class = 'row '>
				<h2 class="title mayusc">Administrar pacientes</h2>
				<a type="button" class="btn btn-nuevo mt-10" href="<?php echo site_url('web/nuevoPaciente'); ?>">
					<div class = 'glyphicon-ring'>
						<span class="glyphicon glyphicon-plus glyphicon-bordered" ></span>
					</div>
					NUEVO REGISTRO

				</a>
				<table id = "list-patient" class="patient mt-20">
					<thead>
							<th class = 'text-center'>Nombres</th>
							<th class = 'text-center'>Apellidos</div></th>
							<th class = 'text-center'>Edad</th>
							<th class = 'text-center'>Cédula</th>
							<th class = 'text-center'>Email</div></th>
							<th></th>
					</thead>
					<tfoot>
		            <tr>
		                <th>Nombres</th>
		                <th>Apellidos</th>
		                <th>Edad</th>
		                <th>Cédula</th>
		                <th>Email</th>
		                <th></th>
		            </tr>
		        </tfoot>
					<tbody>

						<?php foreach($results as $pax){ ?>
						<tr>
							
							<td class = 'text-center left-cell'><?php echo $pax['name'];?></td>
							<td class = 'text-center'><?php echo $pax['lastname'];?></td>
							<td class = 'text-center'><?php echo $pax['born'];?></td>
							<td class = 'text-center'><?php echo $pax['ci'];?></td>
							<td class = 'text-center'><?php echo $pax['email'];?></td>
							<td>	
								<a type="button" href="<?php echo site_url('web/paciente/').$pax['id_patient']; ?>" class="btn btn-xs btn-primary">
									<span class="glyphicon glyphicon-eye-open"></span>
								</a>
								<a type="button" class="btn btn-xs btn-success" href="<?php echo site_url('web/editarPaciente/').$pax['id_patient']; ?>">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
								<a type="button" class="btn btn-xs btn-danger" href="<?php echo site_url('web/deletePatient/').$pax['id_patient']; ?>" >
									<span class="glyphicon glyphicon-remove" onClick='javascript:return confirm("¿Estás seguro que deseas borrar?;")' ></span>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>