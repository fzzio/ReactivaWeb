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
			<!--Home-->
			<li id="index"><a href="<?php echo site_url('admin/index'); ?>">REACTIVA</a></li>
			<!--Usuarios-->
			<li><a href="<?php echo site_url('admin/accounts'); ?>" class = "#">Usuarios</a></li>
			<!--Pacientes-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consulta Interna<span class="caret"></span> </a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/patients'); ?>">PACIENTES</a></li>
          <li><a href="<?php echo site_url('admin/appointments'); ?>">CONSULTAS</a></li>
          <li><a href="<?php echo site_url('admin/app_limbs'); ?>">EXTREMIDADES</a></li>
        </ul>
      </li><!--/Pacientes-->
      <!--Terapias-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rehabilitación<span class="caret"></span> </a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/therapies'); ?>">TERAPIAS</a></li>
          <li><a href="<?php echo site_url('admin/th_exercises'); ?>">EJERCICIOS</a></li>
          <li><a href="<?php echo site_url('admin/comments'); ?>">COMENTARIOS</a></li>
          <li><a href="<?php echo site_url('admin/photos'); ?>">FOTOS</a></li>
        </ul>
      </li><!--/Terapias-->
      <!--Ejercicios-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuración<span class="caret"></span></a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/exercises'); ?>">EJERCICIOS</a></li>
          <li><a href="<?php echo site_url('admin/limbs'); ?>">EXTREMIDADES</a></li>
          <li><a href="<?php echo site_url('admin/games'); ?>">JUEGOS</a></li>
        </ul>
      </li><!--/Ejercicios-->
      <!--Web-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Web<span class="caret"></span></a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/contacts'); ?>">CONTACTOS</a></li>
        </ul>
      </li><!--/Web-->
			<!--Cerrar sesión-->
			<li id="logout" class = '#'><a href="<?php echo site_url('admin/logout'); ?>">CERRAR SESIÓN</a></li>
		</ul>
	</div>
</nav>