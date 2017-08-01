<!-- Page Content -->
<div id="page-wrapper" class="page-main col-lg-10 col-md-10">

<div class="col-lg-10 col-md-10 ">
	<h3 class="title">ADMINISTRAR PACIENTES</h3>
	<a type="button" class="btn btn-nuevo" href="<?php echo site_url('web/nuevoPaciente'); ?>"><span class="glyphicon glyphicon-plus"  ></span> NUEVO REGISTRO</a>
	<table class="table patient">
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
			<?php foreach($patients as $pax){ ?>
			<tr>
				<td>
					<a type="button" href="<?php echo site_url('web/paciente/').$pax['id_patient']; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
					<button type="button" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
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

</div>


