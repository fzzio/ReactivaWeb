<!-- Page Content -->
<div id="page-wrapper" class="page-patient col-lg-10 col-md-10">
	<div class="col-lg-9 col-md-9 container">
		<h3 class="title">Datos del Paciente</h3>
		<div class="row">
			<div class="info-left col-lg-2 col-md-2">
				<button type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Editar datos</button>
				<button type="button" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span> &nbsp; Eliminar</button>
				<img src = "<?php echo base_url('assets/img/web/rea-profile.png'); ?>" class ="img-responsive">
			</div>
			<div class="info col-lg-4 col-md-4">
				<p>Nombres: <input class="patient-input" type="text" value="María De Los Ángeles"></p>
				<p>Apellidos: <input class="patient-input" type="text" value="Hermenejido Montero"></p>
				<p>Ced/RUC: <input class="patient-input" type="text" value="999999999"></p>
				<p>Fecha nac: <input class="patient-input" type="text" value="12/11/1990"></p>
				<p>Cont emerg: <input class="patient-input" type="text" value="Lucia Solis"></p>
			</div>
			<div class="info col-lg-4 col-md-4">
				<p>Telf fijo: <input class="patient-input" type="text" value="042983882"></p>
				<p>Celular: <input class="patient-input" type="text" value="0983738738"></p>
				<p>Email: <input class="patient-input" type="text" value="algo@algo.com"></p>
				<p>Domicilio: <input class="patient-input" type="text" value="Urdesa, Ficus y Mirtus"></p>
				<p>Telf contac: <input class="patient-input" type="text" value="09898736454"></p>
			</div>
		</div>
		<h4 class="sub-title">HISTORIAL DE CITAS Y TERAPIAS</h3>
		<table class="table consult">
	    <thead>
	      <tr>
	      	<th></th>
	        <th>TIPO</th>
	        <th style="width: 100px;">FECHA</th>
	        <th>DOCTOR/TERAPEUTA</th>
	        <th>COMENTARIO</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	      	<td>
	      		<button type="button" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button>
	      	</td>
	        <td>Consulta</td>
	        <td>16-06-2017</td>
	        <td>Daniel García</td>
	        <td>Dolor de pierna, rigidez, hinchazon, posible rotura de tobillo, falta de movilidad</td>
	      </tr>
	      <tr>
	      	<td>
	      		<button type="button" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button>
	      	</td>
	        <td>Terapia</td>
	        <td>01-08-2017</td>
	        <td>Erick Cedeño</td>
	        <td>Tobillo</td>
	      </tr>
	    </tbody>
	  </table>
		<h4 class="sub-title">Información clínica</h3>
		<div class="row">
			<div class="info-left col-lg-5 col-md-5">
				<p>Sexo: <input class="patient-input" type="text" value="Femenino"><p>
				<p>Tipo sangre: <input class="patient-input" type="text" value="O+"><p>
				<p>Algergias medic: <input class="patient-input" type="text" value="Penicilina"><p>
				<p>Algergias: <input class="patient-input" type="text" value="Polen"><p>
			</div>
			<div class="info-right col-lg-4 col-md-4">
				<h5 class="title-3">Observaciones</h5>
				<textarea class="patient-textarea" rows="6" cols="50">At vero eos et accusamus et justo odio dignissimos ducimus qui blanditilis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint accaecati cupiditate non provident. similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</textarea>
			</div>
		</div>
	</div>
</div>