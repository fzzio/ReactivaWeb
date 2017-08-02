<!-- Page Content -->
<div id="page-wrapper" class="page-main col-lg-10 col-md-10">

<div class="col-lg-10 col-md-10 ">
	<h3 class="title mayusc">Administrar pacientes</h3>
	<a type="button" class="btn btn-nuevo" href="<?php echo site_url('web/nuevoPaciente'); ?>">
		<div class = 'glyphicon-ring'>
			<span class="glyphicon glyphicon-plus glyphicon-bordered" ></span>
		</div>
		NUEVO REGISTRO

	</a>
	<table class="table patient mt-20">
		<thead>
			<tr>
				<th></th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>EDAD</th>
				<th>CÉDULA</th>
				<th>EMAIL</th>
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
				<td><?php echo $pax['name'];?></td>
				<td><?php echo $pax['lastname'];?></td>
				<td><?php echo $pax['born'];?></td>
				<td><?php echo $pax['ci'];?></td>
				<td><?php echo $pax['email'];?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<p><?php echo $links; ?></p>
</div>


