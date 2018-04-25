<div class="panel-o">
	<?php if ($view == 'admin') {?>
			<a class="default-button animate-button -panel" href="#admin" data-action="<?php echo update; ?>">Editar usuario</a>
			<a class="default-button animate-button -panel" href="#blog" data-action="<?php echo nuevo; ?>">Nuevo Artículo</a>
			<a class="default-button animate-button -panel" href="#blog" data-action="<?php echo info; ?>">Mis Artículos</a>
			<a class="default-button animate-button -panel" href="#plan" data-action="<?php echo nuevo; ?>">Nueva Oferta</a>
			<a class="default-button animate-button -panel" href="#plan" data-action="<?php echo info; ?>">Mis Ofertas</a>
			<a class="default-button -panel animate-button -panel" href="#social" data-action="<?php echo nuevo; ?>">Nueva Red Social</a>
			<a class="default-button animate-button -panel" href="#social" data-action="<?php echo info; ?>">Mis Redes Sociales</a>
			<a class="default-button -danger -panel" href="<?php echo route_close_session; ?>" onclick="return confirm('¿Estás Seguro?');">Cerrar Sesión</a>
	<?php
} else {?>
			<a class="default-button -panel" href="<?php echo route_admin; ?>">Atrás</a>
			<a class="default-button -danger -panel" href="<?php echo route_close_session; ?>" onclick="return confirm('¿Estás Seguro?');">Cerrar Sesión</a>
	<?php
}
?>
</div>