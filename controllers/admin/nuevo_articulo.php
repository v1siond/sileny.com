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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

	$titulo = limpiarDatos($_POST['titulo']);
	$texto = $_POST['texto'];
	$img = @getimagesize($_FILES['blog_img']['tmp_name']);
	$carpeta_destino = 'assets/images/posts/';
	$archivo_subido = $carpeta_destino . $_FILES['blog_img']['name'];
	move_uploaded_file($_FILES['blog_img']['tmp_name'], $archivo_subido);
	$id = $admin['id'];

	$guardado = $conexion->prepare(
		'INSERT INTO post (id_post, autor, title, body, imagen_entrada, created_at)
			VALUES (null, :autor, :titulo, :entrada, :imagen, now())'
	);
	$guardado->execute(array(
		':autor' => $id,
		':entrada' => $texto,
		':imagen' => $_FILES['blog_img']['name'],
		':titulo' => $titulo,
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

require 'views/admin/nuevo_post.php';
?>