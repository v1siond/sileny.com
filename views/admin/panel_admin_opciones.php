<div class="panel-o">
	<?php $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$host = str_replace("&login=success", "", $host);
if ($host == "www.zilene.com/index.php?view=admin" || $host == "zilene.com/index.php?view=admin" || $host == 'http://localhost/zilene/index.php?view=admin' || $host == 'localhost/zilene/index.php?view=admin') {?>
			<a class="default-button animate-button -panel" href="#edit_user">Editar usuario</a>
			<a class="default-button -panel" href="<?php echo route_nuevo_articulo; ?>">Nuevo Artículo</a>
			<a class="default-button animate-button -panel" href="#posts" data-posts="<?php if (!empty($data_template) && isset($data_template)) {echo htmlspecialchars($data_template, ENT_QUOTES, 'UTF-8');}?>">Mis Artículos</a>
			<a class="default-button -pane animate-button -panel" href="#new_plan">Nueva Oferta</a>
			<a class="default-button animate-button -panel" href="#plans">Mis Ofertas</a>
			<a class="default-button -panel animate-button -panel" href="#new_media">Nueva Red Social</a>
			<a class="default-button animate-button -panel" href="#social_media">Mis Redes Sociales</a>
			<a class="default-button -danger -panel" href="<?php echo route_cerrar_session; ?>" onclick="return confirm('¿Estás Seguro?');">Cerrar Sesión</a>
	<?php
} else {?>
			<a class="default-button -panel" href="<?php echo route_admin; ?>">Atrás</a>
			<a class="default-button -danger -panel" href="<?php echo route_cerrar_session; ?>" onclick="return confirm('¿Estás Seguro?');">Cerrar Sesión</a>
	<?php
}
?>
</div>