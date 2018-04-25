<?php

class Admin extends ApplicationModel {
	private $admin_id;
	private $table;
	private $first_name;
	private $last_name;
	private $email;
	private $new_avatar;
	private $old_avatar;
	private $old_pass;
	private $new_pass;
	private $confirm_new;
	private $bio;
	private $phone;
	private $skype;
	private $image;
	public function __construct() {
		$this->table = 'admin';
		parent::__construct('admin');
	}
	//Get Admin Info
	public function getAdmin() {

		try {
			if ($this->CheckView() === true) {
				$this->admin_id = $_SESSION['id'];
			} else {
				$this->admin_id = 1;
			}
			$sql = $this->db->query("SELECT * FROM admin
        WHERE id = '$this->admin_id' LIMIT 1
      ");
			if ($this->rows($sql) > 0) {
				$admin = $this->run($sql);
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

	public function updateAdmin($first_name, $last_name, $email, $avatar, $pass, $bio, $phone, $skype, $id) {
		try {
			$sql = $this->getUser();
			if ($this->rows($sql) > 0) {
				$this->first_name = $first_name;
				$this->last_name = $last_name;
				$this->email = $email;
				$this->avatar = $avatar;
				$this->password = $pass;
				$this->bio = $bio;
				$this->phone = $phone;
				$this->skype = $skype;

				$sql2 = $this->db->query("UPDATE admin SET
          first_name ='$this->first_name',
          last_name = '$this->last_name',
          email = '$this->email',
          avatar = '$this->avatar',
          password = '$this->password',
          bio = '$this->bio',
          phone = '$this->phone',
          skype = '$this->skype'
          WHERE id = {$id}") or die(mysqli_error($this->db));
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

	public function resetPassword() {

	}

}

?>