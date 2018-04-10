<?php

class Blog extends ApplicationModel {
	private $page_start;
	private $page_limit;

	private function paginaActual() {

		return isset($_GET['p']) ? (int) $_GET['p'] : 1;

	}

	public function getPosts() {

		try {
			$this->page_limit = 6;
			$db = new Conexion();
			$this->page_start = ($this->paginaActual() > 1) ? ($this->paginaActual() * $page_limit - $page_limit) : 0;
			$sql = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM post
        WHERE autor = {$_SESSION['id']} AND deleted = 0
        ORDER BY id_post DESC
        LIMIT {$this->page_start}, {$this->page_limit}");
			if ($db->rows($sql) > 0) {
				$posts = $db->runMultiple($sql);
				return $posts;
			} else {
				if ($this->CheckView() == true) {
					$flash_message = flashMessage('Error al leer los Artículos');
					header('Location: ' . route_admin . '&status=error');
				} else {
					$flash_message = flashMessage('Error al leer los Artículos');
					header('Location: ' . route_blog_index . '&status=error');
				}
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function resetPassword() {

	}

	public function signup() {

	}
}

?>