<!-- Navigation -->
<nav class="navbar navbar-sg navbar-static-top" role="navigation" style="margin-bottom: 0">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo site_url('admin/index'); ?>">

		</a>
	</div>

	<ul class="nav navbar-nav navbar-right">
		<li class = 'dropdown'>
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="capitalize">
					<?php echo $this->session->Name; ?>
				</span>
			</a>
		</li>
		<li>
			<a  class ='nav-a-top' href="<?php echo site_url('admin/logout'); ?>">
				Cerrar sesión
			</a>
		</li>
	</ul>


	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="<?php echo site_url('admin/index'); ?>"><i class="fa fa-fw fa-home"></i> Inicio</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-fw fa-gear"></i> Configuración<span class="fa arrow"></span>
					</a>
					<ul class="nav nav-second-level">
						<li>
						<a href="#"><i class="fa fa-file"></i> Usuarios<span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
								<li>
									<a href="<?php echo site_url('admin/admins'); ?>">Administradores</a>
								</li>
								<li>
									<a href="<?php echo site_url('admin/users'); ?>">Usuarios</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

</nav>

