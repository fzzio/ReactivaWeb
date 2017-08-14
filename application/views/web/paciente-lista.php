<div id="page-wrapper" class="page-main mt-0 pt-0 mb-0 pb-0 pr-0 mr-0">
	<div class = 'row'>
	<div class="col-md-offset-1 col-md-10 ">
		<div class = 'row'>
		<h2 class="title mayusc">Administrar pacientes</h2>
		<a type="button" class="btn btn-nuevo mt-10" href="<?php echo site_url('web/nuevoPaciente'); ?>">
			<div class = 'glyphicon-ring'>
				<span class="glyphicon glyphicon-plus glyphicon-bordered" ></span>
			</div>
			NUEVO REGISTRO

		</a>
		<table id = "list-patient" class="table patient mt-20">
			<thead>
				<tr class = 'search-row'>
					<td></td>
					<td class = 'text-center'>NOMBRES <div class = 'search-table'></div></td>
					<td class = 'text-center'>APELLIDOS <div class = 'search-table'></div></td>
					<td class = 'text-center'>EDAD <div class = 'search-table'></div></td>
					<td class = 'text-center'>CÉDULA <div class = 'search-table'></div></td>
					<td class = 'text-center'>EMAIL <div class = 'search-table'></div></td>
				</tr>
				
			</thead>
			<tbody>

				<?php foreach($results as $pax){ ?>
				<tr>
					<td>
						<a type="button" href="<?php echo site_url('web/paciente/').$pax['id_patient']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
						<a type="button" class="btn btn-xs btn-success" href="<?php echo site_url('web/editarPaciente/').$pax['id_patient']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
						<button type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
					</td>
					<td class = 'text-center left-cell'><?php echo $pax['name'];?></td>
					<td class = 'text-center'><?php echo $pax['lastname'];?></td>
					<td class = 'text-center'><?php echo $pax['born'];?></td>
					<td class = 'text-center'><?php echo $pax['ci'];?></td>
					<td class = 'text-center'><?php echo $pax['email'];?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

			
		</div>
	</div>

	</div>
</div>