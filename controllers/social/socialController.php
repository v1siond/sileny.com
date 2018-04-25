<?php session_start();
ob_start();

$socials = new Social();
if ($_POST && $_POST['admin'] == true) {
	// Admin
	switch ($_POST['action']) {
	case 'info':
		$socialMedia = $socials->getSocials();
		require 'views/social/info.php';
		break;
	case 'new':
		if (!empty($_POST['admin_id']) && !empty($_POST['name']) && !empty($_POST['link']) && !empty($_POST['arroba']) && !empty($_POST['icono'])) {
			$admin_id = limpiarDatos($_POST['admin_id']);
			$name = limpiarDatos($_POST['name']);
			$link = limpiarDatos($_POST['link']);
			$arroba = limpiarDatos($_POST['arroba']);
			$icono = limpiarDatos($_POST['icono']);
			$sql = $socials->saveSocial($admin_id, $name, $link, $arroba, $icono);
			if ($sql == 1) {
				$socialMedia = $socials->getSocials();
				$flash_message = flashMessage('Red social creado exitosamente', 'success');
				echo $flash_message;
				require 'views/social/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			require 'views/social/new.php';
		}
		break;
	case 'update':
		if (!empty($_POST['name']) && !empty($_POST['link']) && !empty($_POST['arroba']) && !empty($_POST['icono'])) {
			$id = limpiarDatos($_POST['id']);
			$name = limpiarDatos($_POST['name']);
			$link = limpiarDatos($_POST['link']);
			$arroba = limpiarDatos($_POST['arroba']);
			$icono = limpiarDatos($_POST['icono']);
			$sql = $socials->updateSocial($name, $link, $arroba, $icono, $id);
			if ($sql == 1) {
				$socialMedia = $socials->getsocials();
				$flash_message = flashMessage('Red social actualizada exitosamente', 'success');
				echo $flash_message;
				require 'views/social/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			$social = $socials->getSocial($_POST['id']);
			$social = $social[0];
			require 'views/social/update.php';
		}
		break;
	case 'delete':
		if (!empty($_POST['id'])) {
			$id = $_POST['id'];
			$sql = $socials->deleteSocial($id);
			if ($sql > 1) {
				$socialMedia = $socials->getsocials();
				$flash_message = flashMessage("Red social: $id borrada exitosamente", 'success');
				echo $flash_message;
				require 'views/social/info.php';
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		}
		break;
	}
}

ob_end_flush();
?>
