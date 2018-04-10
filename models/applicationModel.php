<?php
class ApplicationModel extends Schema {

	public function CheckView() {
		if (isset($_GET['view']) && $_GET['view'] == 'admin' && isset($_SESSION['id']) && isset($_SESSION['user'])) {
			return true;
		} else {
			return 2;
		}
	}

}
?>