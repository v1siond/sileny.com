<?php

class Social extends ApplicationModel {
	private $user;
	private $page_start;
	private $page_limit;
	private $adminId;
	private $name;
	private $link;
	private $arroba;
	private $iconName;
	private $deleted;

	public function __construct() {
		parent::__construct('social_media');
	}

	public function getSocial($id) {
		try {
			$social = $this->getBy('id_red', $id);
			if (!is_string($social)) {
				return $social;
			} else {
				$flash_message = flashMessage('Error al leer el social', 'error');
				echo $flash_message;
			}
		} catch (Exception $socials) {
			echo $socials->getMessage();
		}
	}

	public function getSocials() {
		try {
			$consult = ["admin_id = 1 AND", " deleted = 0", "ORDER BY id_red DESC"];
			$socials = $this->getMultiple($consult);
			if (!is_string($socials)) {
				return $socials;
			} else {
				$flash_message = flashMessage('Error al leer la Red Social', 'error');
				echo $flash_message;
			}
		} catch (Exception $socials) {
			echo $socials->getMessage();
		}
	}

	public function saveSocial($admin_id, $name, $link, $arroba, $icono) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$this->adminId = $admin_id;
				$this->name = $name;
				$this->link = $link;
				$this->arroba = $arroba;
				$this->iconName = $icono;
				$sql2 = $this->db->query("INSERT INTO social_media (id_red, admin_id, name, link, arroba, icon_name, deleted, created_at) VALUES (null, '$this->adminId', '$this->name', '$this->link', '$this->arroba', '$this->iconName', 0, now());") or die(mysqli_error($this->db));
				if ($sql2 == 1) {
					return 1;
				} else {
					return false;
				}
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $socials) {
			echo $socials->getMessage();
		}
	}

	public function updateSocial($name, $link, $arroba, $icono, $id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$this->name = $name;
				$this->link = $link;
				$this->arroba = $arroba;
				$this->iconName = $icono;
				$sql2 = $this->db->query("UPDATE social_media SET name = '$this->name', link = '$this->link', arroba = '$this->arroba', icon_name = '$this->iconName' WHERE id_red = {$id};") or die(mysqli_error($this->db));
				return $sql2;
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $socials) {
			echo $socials->getMessage();
		}
	}

	public function deleteSocial($id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$sql2 = $this->deleteBy('id_red', $id);
				if ($sql2 == 1) {
					return $id;
				} else {
					return $sql2;
				}
			} else {
				$flash_message = flashMessage('Error', 'error');
				echo $flash_message;
			}
		} catch (Exception $socials) {
			echo $socials->getMessage();
		}
	}
}

?>