<?php session_start();
ob_start();

$conexion = conexion($db_config);

if (!$conexion) {
	//header('Refresh: 1; url=http://www.sileny.com/error.php');
}

sesion();

$usuario = $_SESSION['user'];
$adm = obtenerAdmin($conexion, $usuario);
if (!$adm) {
	header('Refresh: 1; url=' . route_admin);
}
$admin = $adm[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$admin_id = limpiarDatos($_POST['admin_id']);
	$name = limpiarDatos($_POST['name']);
	$link = limpiarDatos($_POST['link']);
	$arroba = limpiarDatos($_POST['arroba']);
	$icono = limpiarDatos($_POST['icono']);

	if (empty($admin_id) || empty($name) || empty($link) || empty($arroba) || empty($icono)) {
		$error = 'Alguno de los campos está vacío';
		header('Location: ' . route_admin . '?status=' . $error);
	} else {
		$guardado = $conexion->prepare('INSERT INTO social_media (id_red, admin_id, name, link, arroba, icon_name, deleted, created_at)
      VALUES (null, :admin_id, :name, :link, :arroba, :icon_name, 0, now())'
		);
		$guardado->execute(array(
			':admin_id' => $admin_id,
			':name' => $name,
			':link' => $link,
			':arroba' => $arroba,
			':icon_name' => $icono,
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
}
?>