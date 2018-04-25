<?php

class Blog extends ApplicationModel {
	private $user;
	private $page_start;
	private $page_limit;
	private $autor;
	private $titulo;
	private $entrada;
	private $imagen;
	private $now;

	public function __construct() {
		parent::__construct('post');
	}

	public function getPost($id) {
		try {
			$sql = $this->db->query("SELECT * FROM post p LEFT JOIN admin a ON p.autor = a.id WHERE p.id_post = '$id' AND p.deleted = 0 GROUP BY p.id_post LIMIT 1") or die(mysqli_error($this->db));
			if ($this->rows($sql) > 0) {
				$post = $this->run($sql);
				return $post;
			} else {
				$flash_message = flashMessage('Error al leer el Artículo', 'error');
				echo $flash_message;
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function getNextPost($id) {
		try {
			$sql = $this->db->query("SELECT * FROM post WHERE id_post < '$id' AND deleted = 0 LIMIT 1") or die(mysqli_error($this->db));
			if ($this->rows($sql) > 0) {
				$post = $this->run($sql);
				return $post;
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function getPrevPost($id) {
		try {
			$sql = $this->db->query("SELECT * FROM post
 			WHERE id_post > '$id' AND deleted = 0 LIMIT 1") or die(mysqli_error($this->db));
			if ($this->rows($sql) > 0) {
				$post = $this->run($sql);
				return $post;
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function getPosts() {
		try {
			$this->page_limit = 6;
			$this->page_start = ($this->paginaActual() > 1) ? ($this->paginaActual() * $page_limit - $page_limit) : 0;
			$joinQuery = 'p LEFT JOIN admin a ON p.autor';
			$consult = ["autor = 1 AND", "deleted = 0", "ORDER BY id_post DESC", "LIMIT {$this->page_start}, {$this->page_limit}"];
			$posts = $this->getMultipleJoin($consult, $joinQuery);
			if (is_string($posts)) {
				$flash_message = flashMessage('Error al leer los Artículos', 'error');
				echo $flash_message;
			} else {
				return $posts;
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function getPostsLast() {
		try {
			$joinQuery = 'p LEFT JOIN admin a ON p.autor';
			$consult = ["autor = 1 AND", "deleted = 0", "ORDER BY id_post DESC", "LIMIT 1, 3"];
			$posts = $this->getMultipleJoin($consult, $joinQuery);
			if (is_string($posts)) {
				$flash_message = flashMessage('Error al leer los Artículos', 'error');
				echo $flash_message;
			} else {
				return $posts;
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function savePost($titulo, $texto, $img) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$id = $this->run($sql);
				$carpeta_destino = 'assets/images/posts/';
				$archivo_subido = $carpeta_destino . $img['name'];
				move_uploaded_file($img['tmp_name'], $archivo_subido);
				$this->autor = $id['id'];
				$this->titulo = $titulo;
				$this->entrada = $texto;
				$this->imagen = $img['name'];
				$sql2 = $this->db->query("INSERT INTO post (id_post, autor, title, body, imagen_entrada, created_at)
          VALUES (null, '$this->autor', '$this->titulo', '$this->entrada', '$this->imagen', now());") or die(mysqli_error($this->db));
				return $sql2;
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function updatePost($titulo, $texto, $img, $id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$post = $this->getPost($id);
				if ($post['imagen_entrada'] != $img['name']) {
					$carpeta_destino = 'assets/images/posts/';
					$delete_image = './' . $carpeta_destino . $post['imagen_entrada'];
					unlink($delete_image);
					$archivo_subido = $carpeta_destino . $img['name'];
					move_uploaded_file($img['tmp_name'], $archivo_subido);
					$this->imagen = $img['name'];
				} else {
					$this->imagen = $post['imagen_entrada'];
				}
				$this->titulo = $titulo;
				$this->entrada = $texto;
				$sql2 = $this->db->query("UPDATE post SET body = '$this->entrada', title = '$this->titulo', imagen_entrada = '$this->imagen' WHERE id_post = {$id};") or die(mysqli_error($this->db));
				if ($sql2 == 1) {
					return $id;
				}
				return $sql2;
			} else {
				$flash_message = flashMessage('Error', 'error');
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}

	public function deletePost($id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$sql2 = $this->deleteBy('id_post', $id);
				if ($sql2 == 1) {
					return $id;
				} else {
					return $sql2;
				}
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $posts) {
			echo $posts->getMessage();
		}
	}
}

?>