<?php session_start();
ob_start();
require_once 'lib/parsedown.php';

$conexion = conexion($db_config);
$id_articulo = articulo($_GET['id']);

if (!$conexion) {
	//header('Refresh: 1; url=http://www.sileny.com/error.php');
}

if (empty($id_articulo)) {
	header('Refresh: 1; url=' . route_blog_index);
}

$post = obtenerEntradaId($conexion, $id_articulo);
$author = obtainOwner($conexion);
$admin = $author[0];
if (!$post) {
	header('Refresh: 1; url=' . route_blog_index);
}
$parsedown = new Parsedown();
$post = $post[0];
$contador = 0;
$limite = 10;
$previous = obtenerNextPost($conexion, $id_articulo);
$next = obtenerPrevPost($conexion, $id_articulo);
if ($next) {
	$next_post = $next[0];
}
if ($previous) {
	$prev_post = $previous[0];
}

require 'views/blog/ver_post.php';
ob_end_flush();
?>