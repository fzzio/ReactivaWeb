<!-- Navigation -->
<nav  class="navbar" role="navigation" style="margin-bottom: 0" >
	<div class="navbar-default sidebar admin-sidebar mt-0" role="navigation" >
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
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
	</div>
</nav>