<?php session_start();
ob_start();

$posts = new Blog();
$entradas = $posts->getPosts();

if (!$entradas) {
	echo '<div class="hidden"><script language="javascript">alert("No hay artículos");</script></div>';
}

require 'views/blog/index.php';
ob_end_flush();
?>
