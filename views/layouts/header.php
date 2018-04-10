<header class="main-header">
	<div class="fade-screen"></div>
  <nav class="nav-menu">
  	<div class="limited-container -between">
			<h1 class="nav-logo">
				<a class="default-link -logo" href="<?php echo route_index; ?>">Psicología Online</a>
			  <label class="bar-menu" aria-hidden="true"><i class="fas fa-bars" aria-hidden="true"></i></label>
			</h1>
			<ul class="menu-list">
				<li class="option"><a class="default-link animate-link -golden" href="<?php echo route_index ?>#about">Sobre mi</a></li>
				<li class="option"><a class="default-link animate-link -golden" href="<?php echo route_index ?>#online">Online</a></li>
				<li class="option"><a class="default-link animate-link -golden" href="<?php echo route_index ?>#service">Servicios</a></li>
				<li class="option"><a class="default-link animate-link -golden" href="<?php echo route_index ?>#pricing">Tarifas</a></li>
				<li class="option"><a class="default-link -golden" href="<?php echo route_blog_index; ?>">Blog</a></li>
				<li class="option"><a class="default-link animate-link -golden" href="<?php echo route_index ?>#contact">Contacto</a></li>
				<?php if (isset($_SESSION['user'])) {?>
					<li class="option"><a class="default-link -golden" id="perfil" href="<?php echo route_admin; ?>">Panel</a></li>
				<?php } else {?>
					<li class="option"><a class="default-link -golden" id="login" href="<?php echo route_login; ?>">Login</a></li>
				<?php }?>
			</ul>
  	</div>
	</nav>
</header>