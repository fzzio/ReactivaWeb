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
			<li><a href="<?php echo site_url('admin/accounts'); ?>" class = "#"><i class="fa fa-file"></i> Usuarios</a></li>
			<!--Pacientes-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-book"></i> Pacientes<span class="caret"></span></a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/patients'); ?>">Pacientes</a></li>
          <li><a href="<?php echo site_url('admin/appointments'); ?>">Consultas</a></li>
          <li><a href="<?php echo site_url('admin/app_limbs'); ?>">Extremidades Asociadas a Consultas</a></li>
        </ul>
      </li><!--/Pacientes-->
      <!--Terapias-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-book"></i> Terapias<span class="caret"></span></a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/therapies'); ?>">Terapias</a></li>
          <li><a href="<?php echo site_url('admin/comments'); ?>">Comentarios Asociados a Terapias</a></li>
          <li><a href="<?php echo site_url('admin/th_exercises'); ?>">Ejercicios Asociados a Terapias</a></li>
          <li><a href="<?php echo site_url('admin/photos'); ?>">Fotos Asociados a Terapias</a></li>
        </ul>
      </li><!--/Terapias-->
      <!--Ejercicios-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-info"></i> Ejercicios<span class="caret"></span></a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/exercises'); ?>">Ejercicios</a></li>
          <li><a href="<?php echo site_url('admin/limbs'); ?>">Extremidades</a></li>
          <li><a href="<?php echo site_url('admin/games'); ?>">Extremidades Asociadas a Ejercicios</a></li>
        </ul>
      </li><!--/Ejercicios-->
      <!--Web-->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-info"></i> Web<span class="caret"></span></a>
        <ul class="nav nav-third-level">
          <li><a href="<?php echo site_url('admin/contacts'); ?>"> Contactos</a></li>
        </ul>
      </li><!--/Web-->
			<!--Cerrar sesión-->
			<li id="logout" class = '#'><a href="<?php echo site_url('admin/logout'); ?>"> Cerrar sesión</a></li>
		</ul>
	</div>
</nav>

