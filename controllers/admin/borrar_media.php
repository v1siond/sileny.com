<?php session_start();
ob_start();

sesion();

$conexion = conexion($db_config);

if (!$conexion) {
	header('Location: http://www.sileny.com/error.php');
}
sesion();

$usuario = $_SESSION['user'];
$adm = obtenerAdmin($conexion, $usuario);
$admin = $adm[0];
$admin_id = $admin['id'];
$id = limpiarDatos($_GET['id']);

if (!$id) {
	//header('Location: http://www.sileny.com/error.php');
} else {
	$consulta = $conexion->prepare('UPDATE social_media
    SET deleted = 1,
    icon_name = :id
    WHERE id_red = :id');
	$consulta->execute(array(':id' => $id));
	$error = $consulta->errorInfo();
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
ob_end_flush();
?>
