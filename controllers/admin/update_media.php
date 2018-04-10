<?php session_start();
ob_start();
$conexion = conexion($db_config);

if (!$conexion) {

	header('Refresh: 1; url=http://www.sileny.com/error.php');
}

sesion();
$usuario = $_SESSION['user'];
$adm = obtenerAdmin($conexion, $usuario);
$admin = $adm[0];
$id_media = articulo($_GET['id']);

if (!$adm) {
	//header('Refresh: 1; url=' . route_admin);
}

if (!$id_media) {
	//header('Refresh: 1; url=' . route_admin);
}

$media = obtenerSocialMediaId($conexion, $id_media);

if (!$media) {
	//header('Refresh: 1; url=' . route_admin);
}

$media = $media[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$link = limpiarDatos($_POST['link']);
	$arroba = limpiarDatos($_POST['arroba']);
	$icono = limpiarDatos($_POST['icono']);
	$id_red = limpiarDatos($_POST['id']);

	$guardado = $conexion->prepare('UPDATE social_media SET
      link = :link,
      arroba = :arroba,
      icon_name = :icono
      WHERE id_red = :id');

	$guardado->execute(array(
		':link' => $link,
		':arroba' => $arroba,
		':icono' => $icono,
		':id' => $id_red,
	));

	$error = $guardado->errorInfo();
	if (empty($error) || $error[0] == 0) {
		$error = '';
		header('Location: ' . route_admin . '?status=success');
	} else {
		$errores = '';
		foreach ($error as $errore) {
			$errores = $errore;
		}
		header('Location: ' . route_admin . '?status=' . $errores);
	}
}

require 'views/admin/update_media.php';
?>