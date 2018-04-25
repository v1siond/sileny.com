<?php session_start();
ob_start();

sesion();

if ($_POST && $_POST['admin'] == true) {
	// Admin
	switch ($_POST['action']) {
	case 'update':
		if (!empty($_POST['id'])) {
			$first_name = limpiarDatos($_POST['first_name']);
			$last_name = limpiarDatos($_POST['last_name']);
			$email = limpiarDatos($_POST['email']);
			$new_avatar = @getimagesize($_FILES['new_avatar']['tmp_name']);
			$old_avatar = limpiarDatos($_POST['old_avatar']);
			$old_pass = limpiarDatos($_POST['pass_v']);
			$new_pass = limpiarDatos($_POST['pass_n']);
			$confirm_new = limpiarDatos($_POST['pass_c']);
			$bio = limpiarDatos($_POST['bio']);
			$phone = limpiarDatos($_POST['phone']);
			$skype = limpiarDatos($_POST['skype']);
			$error = '';
			$old_values = array($admin['first_name'], $admin['last_name'], $admin['email'], $admin['avatar'], $admin['password'], $admin['bio'], $admin['phone'], $admin['skype']);
			$user_id = $_POST['id'];

			$fields = array($first_name, $last_name, $email, $new_avatar, $new_pass, $bio, $phone, $skype);

			for ($i = 0; $i < 7; $i++) {
				if (empty($fields[$i]) || $fields[$i] == '') {
					$fields[$i] = $old_values[$i];
				}
			}

			if (!empty($new_pass) || $new_pass != '') {
				$old_pass = hash('sha512', $old_pass);
				$new_pass = hash('sha512', $new_pass);
				$confirm_new = hash('sha512', $confirm_new);
				if ($old_pass != $old_values[4] || $new_pass != $confirm_new) {
					$error = 'Contraseña no actualizada - Error: Los nuevos valores no coinciden';
					$fields[4] = $old_values[4];
				} else {
					$fields[4] = $new_pass;
				}
			}

			if (empty($new_avatar)) {
				$fields[3] = $old_avatar;
			} else {
				$carpeta_destino = 'assets/images/';
				$archivo_subido = $carpeta_destino . $_FILES['new_avatar']['name'];
				move_uploaded_file($_FILES['new_avatar']['tmp_name'], $archivo_subido);
				$fields[3] = $_FILES['new_avatar']['name'];
			}
			$sql = $adm->updateAdmin($fields[0], $fields[1], $fields[2], $fields[3], $fields[4], $fields[5], $fields[6], $fields[7], $user_id);
			if ($sql > 0) {
				if ($error == '') {
					$flash_message = flashMessage('Admin actualizado exitosamente', 'success');
				} else {
					$flash_message = flashMessage("Proceso finalizado con errores: {$error}", 'success');
				}
				echo $flash_message;
				header("Refresh:0; url=" . route_admin);
			} else {
				$flash_message = flashMessage($sql, 'error');
				echo $flash_message;
			}
		} else {
			require 'views/admin/update.php';
		}
		break;
	}
} else {
	require 'views/admin/index.php';
}

ob_end_flush();
?>