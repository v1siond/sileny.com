 <?php

function conexion($db_config) {

	try {
		$conexion = new PDO('mysql:host=localhost;dbname=' . $db_config['basedatos'], $db_config['user'], $db_config['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
		return $conexion;
	} catch (Exception $e) {
		echo $e . getMessage();
		return false;
	}

}

function limpiarDatos($datos) {

	$datos = trim($datos);
	$datos = stripslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}

/*function paginaActual() {

return isset($_GET['p']) ? (int) $_GET['p'] : 1;

}

function numeroPaginas($post_por_pagina, $conexion) {

$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
$total_post->execute();
$total_post = $total_post->fetch()['total'];

$numero_paginas = ceil($total_post / $post_por_pagina);
return $numero_paginas;
}

function obtenerPost($post_por_pagina, $conexion) {

$inicio = (paginaActual() > 1) ? (paginaActual() * $post_por_pagina - $post_por_pagina) : 0;
$posts = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM post p LEFT JOIN admin a ON p.autor = a.id WHERE p.deleted = 0 ORDER BY p.id_post DESC LIMIT $inicio, $post_por_pagina");
$posts->execute();
return $posts->fetchAll();

}*/

function articulo($id) {
	return (int) limpiarDatos($id);
}

function obtenerEntradaId($conexion, $id) {

	$post = $conexion->query("SELECT * FROM post p LEFT JOIN admin a ON p.autor = a.id WHERE p.id_post = '$id' AND p.deleted = 0 GROUP BY p.id_post LIMIT 1");
	$post = $post->fetchAll();
	return ($post) ? $post : false;
}

function obtenerEntradaAutor($post_por_pagina, $conexion, $user) {

	$inicio = (paginaActual() > 1) ? (paginaActual() * $post_por_pagina - $post_por_pagina) : 0;
	$postAdmin = $conexion->prepare("SELECT * FROM post p LEFT JOIN admin a ON p.autor = a.id WHERE p.deleted = 0 GROUP BY p.id_post ORDER BY p.id_post DESC LIMIT $inicio, $post_por_pagina");
	$postAdmin->execute();
	return $postAdmin->fetchAll();
}

function obtenerNextPost($conexion, $id) {

	$nextPost = $conexion->prepare("SELECT * FROM post
 			WHERE id_post < '$id' AND deleted = 0 LIMIT 1");
	$nextPost->execute();
	return $nextPost->fetchAll();

}

function obtenerPrevPost($conexion, $id) {

	$prevPost = $conexion->prepare("SELECT * FROM post
 			WHERE id_post > '$id' AND deleted = 0 LIMIT 1");
	$prevPost->execute();
	return $prevPost->fetchAll();

}

function obtenerAdmin($conexion, $user) {

	$admin = $conexion->prepare("SELECT * FROM admin
 			WHERE username = '$user' OR email = '$user' LIMIT 1
 			");
	$admin->execute();
	return $admin->fetchAll();
}

function obtainOwner($conexion) {

	$adminBio = $conexion->prepare("SELECT * FROM admin
 			WHERE id = 1 LIMIT 1
 			");
	$adminBio->execute();
	return $adminBio->fetchAll();
}

function obtenerPricing($conexion) {

	$plans = $conexion->prepare("SELECT * FROM pricing
 			WHERE deleted = 0");
	$plans->execute();
	return $plans->fetchAll();
}

function obtainPricingVe($conexion) {

	$plans = $conexion->prepare("SELECT * FROM pricing
 			WHERE deleted = 0 AND region = 1");
	$plans->execute();
	return $plans->fetchAll();
}

function obtenerFeatures($conexion, $price_id) {

	$features = $conexion->prepare("SELECT * FROM features
 			WHERE price_id = '$price_id' ORDER BY id_feature
 			");
	$features->execute();
	return $features->fetchAll();
}

function obtenerSocialMedia($conexion, $user_id) {
	$media = $conexion->prepare("SELECT id_red, name, icon_name, link, arroba FROM social_media
 			WHERE admin_id = '$user_id' AND deleted = 0 ORDER BY id_red
 			");
	$media->execute();
	return $media->fetchAll();
}

function obtenerSocialMediaId($conexion, $id) {
	$media = $conexion->prepare("SELECT * FROM social_media
 			WHERE id_red = '$id' AND deleted = 0 ORDER BY id_red LIMIT 1
 			");
	$media->execute();
	return $media->fetchAll();
}

function sesion() {
	if (!isset($_SESSION['user'])) {
		header('Location:' . route_login);
	}
}

function validarEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL)
	&& preg_match('/@.+\./', $email);
}

function getMimeType($archivo) {
	$mimetype = false;
	if (function_exists('finfo_fopen')) {
		// open with FileInfo
	} elseif (function_exists('getimagesize')) {
		// open with GD
	} elseif (function_exists('exif_imagetype')) {
		// open with EXIF
	} elseif (function_exists('mime_content_type')) {
		$mimetype = mime_content_type($archivo);
	}
	return $mimetype;
}

function flashMessage($zona) {
	if (!empty($_GET)) {
		$_SESSION['status'] = $_GET;

		switch ($zona) {
		case 'login':
			header('Refresh: 1; url=' . route_login);
			break;
		case 'index':
			header('Refresh: 1; url=' . route_index);
			break;
		default:
			header('Refresh: 1; url=' . route_admin);
			break;
		}
		die;
	} else {
		if (!empty($_SESSION['status'])) {
			$_GET = $_SESSION['status'];
			unset($_SESSION['status']);
		}
	}

	if (isset($_GET['status'])) {
		if ($_GET['status'] == 'success') {
			return '<p class="flash-message">Operación realizada con éxito</p>';
		} else {
			$flash_message = $_GET['status'];
			return '<p class="flash-message -danger">' . $flash_message . '</p>';
		}
	}
	if (isset($_GET['login'])) {
		if ($_GET['login'] == 'success') {
			return '<p class="flash-message">Ingreso Exitoso</p>';
		} else {
			$flash_message = 'usuario no existe o datos incorrectos';
			return '<p class="flash-message -danger">' . $flash_message . '</p>';
		}
	}
	if (isset($_GET['logout'])) {
		if ($_GET['logout'] == 'success') {
			return '<p class="flash-message">Logout Exitoso</p>';
		} else {
			$flash_message = $_GET['logout'];
			return '<p class="flash-message -danger">' . $flash_message . '</p>';
		}
	}
}

?>