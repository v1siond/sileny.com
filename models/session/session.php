<?php

class Access extends ApplicationModel {
	private $email;
	private $user;
	private $pass;

	private function encryptPass($password) {
		return hash('sha512', $password);
	}

	public function login() {

		try {
			if (($_POST['usuario'] != null || $_POST['usuario'] != "") && ($_POST['contra'] != null || $_POST['contra'] != "")) {
				$db = new Conexion();
				$this->user = limpiarDatos($_POST['usuario']);
				$this->pass = $this->encryptPass(limpiarDatos($_POST['contra']));
				$sql = $db->query("SELECT * FROM `admin`
          WHERE username = '$this->user' AND password = '$this->pass'
          OR email = '$this->user' AND password = '$this->pass'");
				if ($db->rows($sql) > 0) {
					$user = $db->run($sql);
					$_SESSION['id'] = $user['id'];
					$_SESSION['user'] = $user['username'];
					header('Location: ' . route_admin . '&login=success');
				} else {
					$flash_message = flashMessage('login');
					header('Location: ' . route_login . '&login=error');
				}
			} else {
				throw new Exception("Error: Campos vacíos", 1);
			}
		} catch (Exception $login) {
			echo $login->getMessage();
		}
	}

	public function resetPassword() {

	}

	public function signup() {

	}
}

?>