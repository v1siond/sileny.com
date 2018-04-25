<?php session_start();
ob_start();

$posts = new Blog();
$entradas = $posts->getPosts();

if (!$entradas) {
	$flash_message = flashMessage('No hay Artículos', 'error');
	echo $flash_message;
}

if ($_POST && $_POST['admin'] == true) {
	// Admin
	switch ($_POST['action']) {
	case 'info':
		require 'views/blog/info.php';
		break;
	case 'new':
		if (!empty($_POST['titulo']) && !empty($_POST['texto']) && !empty($_FILES["blog_img"])) {
			$titulo = limpiarDatos($_POST['titulo']);
			$texto = $_POST['texto'];
			$img = $_FILES["blog_img"];
			$sql = $posts->savePost($titulo, $texto, $img);
			if ($sql == 1) {
				$entradas = $posts->getPosts();
				$flash_message = flashMessage('Artículo creado exitosamente', 'success');
				echo $flash_message;
				require 'views/blog/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			require 'views/blog/new.php';
		}
		break;
	case 'update':
		if (!empty($_POST['id']) && !empty($_POST['titulo']) && !empty($_POST['texto']) && !empty($_FILES["blog_img"])) {
			$titulo = limpiarDatos($_POST['titulo']);
			$texto = $_POST['texto'];
			$id = $_POST['id'];
			$img = $_FILES["blog_img"];
			$sql = $posts->updatePost($titulo, $texto, $img, $id);
			if ($sql > 0) {
				$post = $posts->getPost($sql);
				$parsedown = new Parsedown();
				$adminLayout = true;
				$flash_message = flashMessage('Artículo actualizado exitosamente', 'success');
				echo $flash_message;
				require 'views/blog/show.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			$post = $posts->getPost($_POST['id']);
			require 'views/blog/update.php';
		}
		break;
	case 'delete':
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$sql = $posts->deletePost($id);
			if ($sql > 1) {
				$entradas = $posts->getPosts();
				$flash_message = flashMessage("Artículo: $id borrado exitosamente", 'success');
				echo $flash_message;
				require 'views/blog/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		}
		break;
	}
} else {
	$entradas_last = $posts->getPostsLast();
	if (!empty($_GET['layout']) && $_GET['layout'] == 'show') {
		if (empty($_GET['id'])) {
			echo 'ERROR';
		} else {
			$next_post = $posts->getNextPost($_GET['id']);
			$prev_post = $posts->getPrevPost($_GET['id']);
			$parsedown = new Parsedown();
			$post = $posts->getPost($_GET['id']);
			require 'views/blog/show.php';
		}
	} else {
		//index
		require 'views/blog/index.php';
	}

}

ob_end_flush();
?>
