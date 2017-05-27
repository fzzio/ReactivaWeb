<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top nav-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				<!--
				 <a href ="<?php echo site_url('admin/index'); ?>"><img alt="DataHits" src="<?php echo base_url('assets/img/dh-white.png'); ?>"  class = 'img-responsive ml-20 mr-20' style="max-height:60px"></a>
				 -->
		</div>

		<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
			
			<ul class="nav navbar-nav navbar-right">
				<li><a class = 'name-text'><span class="capitalize">
					<?php echo $this->session->Name; ?>
				</span>
				</a></li>
				<li><a  class ='nav-a-top' href="<?php echo site_url('admin/logout'); ?>">Cerrar sesión</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

