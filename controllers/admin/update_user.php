<?php session_start();
ob_start();
$conexion = conexion($db_config);

if (!$conexion) {
	//header('Refresh: 1; url=http://www.sileny.com/error.php');
}

sesion();

$usuario = $_SESSION['user'];

$adm = obtenerAdmin($conexion, $usuario);
if (!$adm) {
	//header('Refresh: 1; url=http://www.sileny.com/error.php');
}
$admin = $adm[0];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST["edit_user"])) {
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

		if (isset($admin)) {
			$old_values = array($admin['first_name'], $admin['last_name'], $admin['email'], $admin['avatar'], $admin['password'], $admin['bio'], $admin['phone'], $admin['skype']);
			$user_id = $admin['id'];
		}

		$fields = array($first_name, $last_name, $email, $new_avatar, $new_pass, $bio, $phone, $skype);

		for ($i = 0; $i < 7; $i++) {
			if (empty($fields[$i]) || $fields[$i] == '') {
				$fields[$i] = $old_values[$i];
			}
		}

		$error = '';

		if (empty($new_pass) || $new_pass == '') {
			$old_pass = hash('sha512', $old_pass);
			$new_pass = hash('sha512', $new_pass);
			$confirm_new = hash('sha512', $confirm_new);
			if ($old_pass != $old_values[4] && $new_pass != $confirm_new) {
				$error .= 'Las contraseñas no son iguales';
				header('Location: ' . route_admin . '?status=' . $error);
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

		if ($error == '') {
			$guardado = $conexion->prepare('UPDATE admin SET
          first_name = :first_name,
          last_name = :last_name,
          email = :email,
          avatar = :avatar,
          password = :password,
          bio = :bio,
          phone = :phone,
          skype = :skype
          WHERE id = :id');

			$guardado->execute(array(
				':first_name' => $fields[0],
				':last_name' => $fields[1],
				':email' => $fields[2],
				':avatar' => $fields[3],
				':password' => $fields[4],
				':bio' => $fields[5],
				':phone' => $fields[6],
				':skype' => $fields[7],
				':id' => $user_id,
			));
			if (isset($guardado)) {
				$error = $guardado->errorInfo();
				if (empty($error) || $error[0] == 0) {
					$error = '';
					header('Location: ' . route_admin . '?status=success');
				} else {
					$errores = '';
					foreach ($error as $errore) {
						echo $errore . ' - ';
						$errores = $errore;
					}
					header('Location: ' . route_admin . '?status=' . $errores);
				}
			}
		}
	}
}
ob_end_flush();
?>


