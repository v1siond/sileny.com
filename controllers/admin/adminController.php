<?php session_start();
ob_start();

sesion();

//Admin Info
$adm = new Admin();
$admin = $adm->getAdmin();

//Admin Posts

$posts = new Blog();
$list_post = $posts->getPosts();
$data_template = "";
if (!empty($list_post) && isset($list_post)) {
	foreach ($list_post as $post) {
		$data_template .= '
    <article class="panel-list-item">
      <div class="info">
        <p class="default-text -scorpion -small -admin"><strong>Título: </strong><a href=" ' . route_ver_post . '?id=' . $post['id_post'] . '"> ' . $post['title'] . '</a></p>
        <p class="default-text -scorpion -small -admin"><strong>Fecha: </strong> <span>' . $post['created_at'] . '</span></p>
        <p class="default-text -scorpion -small -admin"><strong>Editado: </strong> <span>' . $post['updated_at'] . '</span></p>
      </div>
      <div class="options">
        <a class="default-button -panel" href="' . route_ver_post . '?id=' . $post['id_post'] . '">ver</a>
        <a class="default-button -panel" href="' . route_editar_articulo . '?id=' . $post['id_post'] . '">editar</a>
        <a class="default-button -panel -danger" href="' . route_borrar_post . '/?id=' . $post['id_post'] . '" onclick="return confirm("¿Estás Seguro?");">Borrar</a>
      </div>
    </article>';
	}
}

require 'views/admin/index.php';
ob_end_flush();
?>