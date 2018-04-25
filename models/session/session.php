<?php

class Access extends ApplicationModel {
	private $email;
	private $user;
	private $pass;

	public function __construct() {
		parent::__construct('admin');
	}

	private function encryptPass($password) {
		return hash('sha512', $password);
	}

	public function login() {

		try {
			if (($_POST['usuario'] != null || $_POST['usuario'] != "") && ($_POST['contra'] != null || $_POST['contra'] != "")) {
				$this->user = limpiarDatos($_POST['usuario']);
				$this->pass = $this->encryptPass(limpiarDatos($_POST['contra']));
				$sql = $this->db->query("SELECT * FROM `admin`
          WHERE username = '$this->user' AND password = '$this->pass'
          OR email = '$this->user' AND password = '$this->pass'");
				if ($this->rows($sql) > 0) {
					$user = $this->run($sql);
					$_SESSION['id'] = $user['id'];
					$_SESSION['user'] = $user['username'];
					$flash_message = flashMessage("Bienvenido {$user['username']}", 'success');
					echo $flash_message;
					header("Refresh:2; url=" . route_admin);
				} else {
					$flash_message = flashMessage('Datos incorrectos', 'error');
					echo $flash_message;
					header("Refresh:2; url=" . route_login);
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