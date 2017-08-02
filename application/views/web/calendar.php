<!-- Nav tabs -->
		<div class="calendar-nav col-lg-10 col-md-10">
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
<div id="page-wrapper" class="page-calendar col-lg-10 col-md-10">
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