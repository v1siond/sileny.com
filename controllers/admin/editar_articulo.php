<?php session_start();
ob_start();

$conexion = conexion($db_config);

if (!$conexion) {

	header('Refresh: 1; url=http://www.sileny.com/error.php');
}

sesion();
$usuario = $_SESSION['user'];
$adm = obtenerAdmin($conexion, $usuario);
$id_articulo = articulo($_GET['id']);

if (!$adm) {
	header('Refresh: 1; url=' . route_admin);
}

if (empty($id_articulo)) {
	header('Refresh: 1; url=' . route_admin);
}
$admin = $adm[0];
$post = obtenerEntradaId($conexion, $id_articulo);

if (!$post) {
	header('Refresh: 1; url=' . route_admin);
}

$post = $post[0];
$contador = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$titulo = limpiarDatos($_POST['titulo']);
	$id = limpiarDatos($_POST['id']);
	$texto = $_POST['texto'];
	$img_guardada = $_POST['old_img'];
	$img = @getimagesize($_FILES['blog_img']['tmp_name']);

	if (empty($img)) {
		$img = $img_guardada;
	} else {
		$carpeta_destino = 'assets/images/posts/';
		$archivo_subido = $carpeta_destino . $_FILES['blog_img']['name'];
		move_uploaded_file($_FILES['blog_img']['tmp_name'], $archivo_subido);
		$img = $_FILES['blog_img']['name'];
	}

	$guardado = $conexion->prepare('UPDATE post SET
			body = :texto,
			title = :titulo,
			imagen_entrada = :imagen
			WHERE id_post = :id');

	$guardado->execute(array(
		':texto' => $texto,
		':titulo' => $titulo,
		':imagen' => $img,
		':id' => $id,
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

require 'views/admin/editar_post.php';
?>