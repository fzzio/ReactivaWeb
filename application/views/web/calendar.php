<div id="page-wrapper" class = 'page-calendar mt-0 pt-0 mb-0 pb-0 pr-0 mr-0'>
<!-- Nav tabs -->
		<div class="calendar-nav ml-0 pl-0">
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active">
			  	<a href="#calendar" aria-controls="calendar" role="tab" data-toggle="tab">CITAS DEL DIA</a>
			  </li>
			  <li role="presentation">
			  	<a href="#therapy" aria-controls="therapy" role="tab" data-toggle="tab">AGENDAR TERAPIAS</a>
			  </li>
			</ul>
		</div>
<!-- Page Content -->

	<div class="container col-md-offset-1 col-md-10">
		<!-- Tab panes -->
		<div class="tab-content">
		  <div role="tabpanel" class="tab-pane active" id="calendar">
		  	<div id="calendar_div">
		  		<?php echo $controller->getCalender(); ?>
		  	</div><!-- /.container-fluid -->
		  </div><!-- /.tab-pane -->

		  <div role="tabpanel" class="tab-pane" id="therapy">
		  	<!--Therapy-->
		  </div><!-- /.tab-pane -->

		</div>

	</div>


	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header nueva-cite-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Agendación de una nueva cita</h4>
				</div>
			<div class="modal-body">
				<p>One fine body&hellip;</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Guardar</button>
				<button type="button" class="btn btn-primary">Cancelar</button>
			</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</div>