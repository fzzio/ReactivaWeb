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

	<div class="container col-lg-9 col-md-9">
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

</div>