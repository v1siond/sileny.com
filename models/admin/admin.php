<?php

class Admin extends ApplicationModel {
	private $admin_id;

	//Get Admin Info
	public function getAdmin() {

		try {
			$db = new Conexion();
			if ($this->CheckView() === true) {
				$this->admin_id = $_SESSION['id'];
			} else {
				$this->admin_id = 1;
			}
			$sql = $db->query("SELECT * FROM admin
        WHERE id = '$this->admin_id' LIMIT 1
      ");
			if ($db->rows($sql) > 0) {
				$admin = $db->run($sql);
				return $admin;
			} else {
				if ($this->CheckView() == true) {
					$flash_message = flashMessage('admin');
					header('Location: ' . route_admin . '&status=error');
				} else {
					$flash_message = flashMessage('index');
					header('Location: ' . route_index . '&status=error');
				}
			}
		} catch (Exception $admin) {
			echo $admin->getMessage();
		}
	}

	public function resetPassword() {

	}

	public function signup() {

	}
}

?>