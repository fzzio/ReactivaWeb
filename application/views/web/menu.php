<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Top Menu Items -->

    <div class="collapse navbar-collapse navbar-ex1-collapse admin-sidebar">
		<ul class="nav navbar-nav side-nav" id="side-menu">
			<li id="index">
				<a href="<?php echo site_url('web/index'); ?>">REACTIVA</a>
			</li>
			<li>
				<a href="<?php echo site_url('web/pacientes'); ?>" class = "<?php if ($selection == 'patient'){echo 'active';}?>">Pacientes</a>
			</li>
			<li>
				<a href="<?php echo site_url('web/calendar'); ?>" class = "<?php if ($selection == 'calendar'){echo 'active';}?>">Agenda</a>
			</li>
			<li>
				<a href="#">Diagnósticos</a>
			</li>
			<li id="logout" class = ''>
				<a href="<?php echo site_url('web/logout'); ?>">Cerrar sesión</a>
			</li>
		</ul>
	</div>
</nav>